<?php
namespace App\Traits ;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use App\Http\Controllers\AppointmentController;
use App\Http\Requests\NewAppointmentRequest;
use Illuminate\Http\Request;
use Carbon\carbon;
use Auth;
/**
 * This Trait will deal with all the methods between PatientController and AppointmentController
 * extended in the PatientController
 */


trait PatientAppointmentTrait
{

  /**
   * Show the form for creating a new appointment.
   *
   * @return \Illuminate\Http\Response
   */
    public function ShowBookAppointmentForm(Patient $patient)
    {

      $appointment = new AppointmentController;
      $calendar =  $appointment->createCalendar();
      $doctors = User::doctors()->get();
      
      return view('patients.appointments.new_appointment',compact(['patient','doctors','calendar']));
    }





    /**
     * Create New Appointment for this Patient
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function SubmitBookAppointmentForm(Patient $patient, NewAppointmentRequest $request)
    {
      //create unique appointment reference
 $appointmentRefrence = request()->patient_number . studly_case(request()->appointment_date.request()->start_at);

// create Carbon from start-at
 $start_at = request()->start_at;
 $appointmentDate = new Carbon($request->input('appointment_date'));

 $appointmentDiff = $appointmentDate->diffForHumans();
 $appointmentDate = $appointmentDate->format('d-M-Y');

// create Carbon from end-at and add 15 minutes
 $end_at = new Carbon($request->input('start_at'));
 $end_at = $end_at->addMinutes(15)->format('H:i');

      $newAppointment= new Appointment ([
          'refrence'=>$appointmentRefrence,
          'date'=>$request->input('appointment_date'),
          'start_at'=>$request->input('start_at'),
          'end_at'=>$end_at,
          'doctor_id'=>$request->input('appointment-doctor'),
          ]);
          $patient->appointments()->save($newAppointment);
          // return  redirect()->route('patient.show',$patient)->with('success', 'New appointment succesfully created');
          return redirect()->back()->with('reference',$appointmentRefrence)
          ->with('success', "New appointment succesfully created.")
          ->with('info', " ◙ Booking Reference is : [ {$appointmentRefrence} ]  ◙ Date: [ {$appointmentDate} ]  ◙ Time : {$start_at}  ||  ({$appointmentDiff} ) ");
    }


    /**
     * Show patient's all appointments table.
    */
    public function AllAppointments(Patient $patient){
      $appointments = $patient->appointments()->orderby('date')->paginate(25);
       $x =1;
      return  view('patients.appointments.all',compact(['patient','appointments','x']));
    }

    /**
     * Show patient's future appointments table.
    * @return \Illuminate\Http\Response
    */

    public function FutureAppointments(Patient $patient){

        $appointments = $patient->appointments()->where('date','>',Carbon::now())->orderby('date','desc')->paginate(25);
        //dd($appointments);
       $x =1;
      return  view('patients.appointments.future',compact(['patient','appointments','x']));

    }

    /**
     * Show patient's future appointments table.
    * @return \Illuminate\Http\Response
    */

    public function PassedAppointments(Patient $patient){

        $appointments = $patient->appointments()->where('date','<',Carbon::now())->orderby('date','desc')->paginate(25);
        //dd($appointments);
        $x =1;
        return  view('patients.appointments.passed',compact(['patient','appointments','x']));

    }

    //
    // public function showSlotsForm(Patient $patient){
    //     $doctors = User::doctors()->get();
    //   return view('patients.appointments.findSlot',compact(['patient','doctors']));
    // }
    //
    // public function postSlotTimes(Request $request, Patient $patient){
    //   $doctors = User::doctors()->get();
    //   $date = $request->input('date');
    //   $doctor= Doctor::find($request->input('doctor'));
    //   $slots = $doctor->freeSlots($date)->get();
    //   return view('patients.appointments.new_appointment',compact(['patient','doctor','date','slots','doctors']));
    //
    // }

}#



 ?>
