<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Appointment;
use App\Models\User;
use App\Models\Drug;
use Calendar;
use Carbon\carbon;
use App\Http\Requests\NewAppointmentRequest;


class AppointmentController extends Controller
{
  protected $slots=[];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::orderby('date','asc')->get();
        $x =1;

        return view ('appointments.index',compact(['appointments','x']));

    }


    public function ShowDatatable()
    {
        $appointments = Appointment::paginate(30);
        $x =1;

        return view ('appointments.dataTable',compact(['appointments','x']));

    }

public function  createCalendar(){
        $appointments = Appointment::all();
        foreach($appointments as $appointment){

          $slot = Calendar::event('Dr.'.$appointment->doctor->fname .' - '. ' Patient:'.  $appointment->patient->fname,
          false,
            $appointment->date->format('Y-m-d'). $appointment->start_at,
            $appointment->date->format('Y-m-d'). $appointment->end_at,
           $appointment->id,
           [
             'url'=> route('appointment.details',$appointment),
           ]
         );
           $this->slots[]= $slot;
        }

        return $calendar = Calendar::addEvents($this->slots);
      }

      /**
       * show The appointments calendar.
       *
       * @return \Illuminate\Http\Response
       */
    public function viewCalendar()
    {
        $calendar = $this->createCalendar();
        return view ('appointments.calendar',compact('calendar'));
    }

    public function getPrescription(Appointment $appointment){

    return $prescritpion = $appointment->prescription()->get();

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
      if ($appointment->hasPrescription()) {
        $prescritpion = $appointment->prescription;
        $appointment_drugs = $appointment->prescription->drugs;
      }else{
        $appointment_drugs = [];

      }
      $drugs = Drug::all();
      return view('appointments.details', compact(['appointment','appointment_drugs','drugs']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
      // dd($appointment);
       $patient = $appointment->patient;
       //dd($patient);
       $doctors = User::doctors()->get();
       $appointment = new AppointmentController;
       $calendar =  $appointment->createCalendar();
      return view('appointments.update',compact(['appointment','patient','doctors','calendar']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Appointment $appointment ,NewAppointmentRequest $request)
    {

        // code...

      //create unique appointment reference
 $appointmentRefrence = request()->patient_number . studly_case(request()->appointment_date.request()->start_at);

// create Carbon from start-at
 $start_at = request()->start_at;
 $appointmentDate = new Carbon($request->input('appointment_date'));

 $appointmentDiff = $appointmentDate->diffForHumans();
 $appointmentDate = $appointmentDate->format('d-M-Y');

// create Carbon from end-at and add 15 minutes
 $end_at = new Carbon($request->input('start_at'));
 $end_at = $end_at->addMinutes(30)->format('H:i');

      $appointment->update([
          'refrence'=>$appointmentRefrence,
          'date'=>$request->input('appointment_date'),
          'start_at'=>$request->input('start_at'),
          'end_at'=>$end_at,
          'doctor_id'=>$request->input('appointment-doctor'),
          ]);
          return redirect()->back()->with('reference',$appointmentRefrence)
          ->with('success', " Appointment succesfully updated.")
          ->with('info', " ◙ Booking Reference is : [ {$appointmentRefrence} ]  ◙ Date: [ {$appointmentDate} ]  ◙ Time : {$start_at}  ||  ({$appointmentDiff} ) ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function addNotes(Appointment $appointment, Request $request ){
  $this->validate($request , [
    'notes'=>'required|min:3'
  ]);
$notes=  $request->input('notes');

 $appointment->update([
   'notes' => $notes,
 ]);
 return redirect()->back()->with('success', ' Notes succesfully added to this appointment');
}

    public function destroy( Appointment $appointment )
    {
        $appointment->delete();
        return redirect()->back()->with('success', ' Appointment succesfully deleted',compact('appointment'));
}

}#
