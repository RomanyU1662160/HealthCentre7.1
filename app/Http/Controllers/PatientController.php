<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Validator;
use App\Traits\PatientAppointmentTrait;
use App\Http\Requests\AddNewPatientRequest;
use App\Http\Controllers\AppointmentController;
use Twilio\Rest\Client;
use Carbon\carbon;


class PatientController extends Controller
{

  use PatientAppointmentTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $patients = Patient::all();
      $doctors =  Doctor::all();
      $appointment = new AppointmentController;

      $calendar =  $appointment->createCalendar();
      $x=1;
      return view('patients.index',compact(['patients','x','doctors','calendar']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MyPrescritptions(Patient $patient)
    {
      $prescriptions = $patient->prescriptions()->paginate(10);
      $x= 1;
      return view('patients.prescriptions.index',compact(['prescriptions','patient','x']));
    }

    /**
     * Show the form for creating a new sms msg.
     *
     * @return \Illuminate\Http\Response
     */


    public function getSendMsg(Patient $patient){
      return view('patients.msg.sms',compact('patient'));
    }

    public  function sendMsg(Request $request, Patient $patient)
      {

        $accountSid =  'AC24361ed5204817d323cdfd9028780134';
        $authToken  =  'abbf9737d52d5f6ec38383b76e42ef32';
        $sendingNumber = '+441183241051';

        $twilioClient = new Client($accountSid, $authToken);
        //dd($twilioClient);
        $twilioClient->messages->create(
            $patient->mobile, [
                "from" => $sendingNumber,
                "body" => $request->input('message'),
              ]);
        return redirect()->back()->with('success', ' An SMS message  sent to the mobile device. ');
      }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $doctors = User::doctors()->get();

      return view('patients.profile.add_new',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewPatientRequest $request)
    {
      $patient_number = request()->fname.request()->lname.studly_case(request()->dob);
      $patient = Patient::create([
          'fname'   => $request->input('fname'),
          'lname'   => $request->input('lname'),
          'patient_number' =>$patient_number,
          'dob'     => $request->input('dob'),
          'gender'  => $request->input('gender'),
          'mobile'  => $request->input('mobile'),
          'email'   => $request->input('email'),
          'postcode'=> $request->input('postcode'),
          'house'   => $request->input('house'),
          'address' => $request->input('address'),
          'doctor_id' => $request->input('family-doctor'),
        ]);

      return redirect()->route('patient.show',$patient)->with('success', 'New Patient Added Susccefully')
      ->with('info',"Patient unique number : $patient_number ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
      return view('patients.page',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
      return view('patients.profile.edit_profile', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Patient $patient,Request $request)
    {
      Validator::make($request->all(),[
        'mobile'  => ['required','regex:/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/'],
        'email'   => 'required|email',
        'house'   => 'required',
        'address' => 'required',
        'postcode'=> [ 'required', 'regex:~^(?:gir(?: *0aa)?|[a-pr-uwyz](?:[a-hk-y]?[0-9]+|[0-9][a-hjkstuw]|[a-hk-y][0-9][abehmnprv-y])(?: *[0-9][abd-hjlnp-uw-z]{2})?)$~i', ],
        ])->validate();
        $patient->update([
          'mobile'  => $request->input('mobile'),
          'email'   => $request->input('email'),
          'postcode'=> $request->input('postcode'),
          'house'   => $request->input('house'),
          'address' => $request->input('address'),
        ]);
          return redirect()->back()->with('success', 'Patient profile updated Susccefully.');
    }


 public function ShowDelete(Patient $patient){
   return view('patients.profile.remove_profile',compact('patient'));
 }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
     $patient->delete();
      return redirect()->route('home')->with('success','Patient Profile Deleted');
    }


   public function showAvatar(Patient $patient){
     return view('patients.profile.add_avatar',compact('patient'));
   }

   public function showCheckIn(){
     return view('patients.checkin');
   }


///
   public function postCheckIn(Request $request)
   {
     $this->validate($request,[
       'name'=>'required | min:3',
       'postcode'=> [ 'required', 'regex:~^(?:gir(?: *0aa)?|[a-pr-uwyz](?:[a-hk-y]?[0-9]+|[0-9][a-hjkstuw]|[a-hk-y][0-9][abehmnprv-y])(?: *[0-9][abd-hjlnp-uw-z]{2})?)$~i', ],
     ]);
        $patient = Patient::where('patient_number','LIKE',"%{$request->input('name')}%")
        ->where('postcode',$request->input('postcode'))->first();
        //$patient = array_collapse($patient);

    if(!isset($patient)){
   return redirect()->route('patient.checkin')->with('warning', 'No patient found with these details, please try again ');
  }else{
        $appointment = $patient->todayFirstAppointment();
        $avilableCheckingTime = Carbon::now()->addMinutes(60)->format('h:i:s');
        $lastAvilableCheckingTime= Carbon::now()->format('h:i:s');
        //dd($lastAvilableCheckingTime);

        if ($appointment == null) {
            return redirect()->route('patient.checkin')->with('warning', 'Cannot Find any appointments for you today ');
        }

        elseif ($appointment->patient_attend == true) {
          return redirect()->route('patient.checkin')->with('warning', 'You are already checked in ');
        }
        elseif ($appointment->start_at > $avilableCheckingTime ) {
          return redirect()->route('patient.checkin')->with('warning', 'Cannot check you in, your appointment is due after more than an hour');
        }
        elseif ($appointment->start_at < $lastAvilableCheckingTime ) {
            return redirect()->route('patient.checkin')->with('warning', 'Cannot check you in. You are late, Receptionist can help you to book a new appointment');

        }

        else{


        $appointment->update([
          'patient_attend'=> true,
        ]);
        return redirect()->route('patient.checkin')->with('success', 'You have succesfully checked in ');
   }
 };
}




}#
