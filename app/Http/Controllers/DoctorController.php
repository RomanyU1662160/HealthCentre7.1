<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\NewStaffRequest;
use App\Models\User;
use Calendar;


use Illuminate\Http\Request;

class DoctorController extends Controller
{

  protected $mySlots=[];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Doctor $doctor)
    {
      //$patients = $doctor->patients()->paginate(2);
      $doctors = $this->alldoctors();
  return view('doctors.index',compact(['doctors']));
    }

      public function allDoctors(){
            return $doctors = User::doctors()->get();
      }


    public function MyPatients(Doctor $doctor){

      $patients = $doctor->patients()->paginate(3);
      return view ('doctors.myPatients',compact(['patients','doctor']))->with('user',$doctor);
    }


public function CreateMySlotsCalendar(Doctor $doctor){
 $appointments = $doctor->appointments;
 foreach ($appointments  as $appointment) {
   $slot = Calendar::event(
    'Patient: '. $appointment->patient->fname,
    false,
    $appointment->date->format('Y-m-d'). $appointment->start_at,
    $appointment->date->format('Y-m-d'). $appointment->end_at,
   $appointment->id,
   [
     'url'=> '',
   ]
 );
     $this->mySlots[]= $slot;
 }
return $calendar = Calendar::addEvents($this->mySlots);
}

public function viewMySlotsCalendar(Doctor $doctor)
{

    $calendar = $this->CreateMySlotsCalendar($doctor);
    $user = $doctor;
    return view ('doctors.myslots',compact(['calendar','doctor','user']));

}


// public function getFreeSlotsForm(Doctor $doctor){
//   return view('doctors.myslots',compact('doctor'));
// }
//
// public function MyFreeSlots(Request $request){
// $date = $request->input('date');
// $doctor= Doctor::find($request->input('doctor'));
// $slots = $doctor->freeSlots($date)->get();
// return redirect()->back()->with('slots',$slots);
// }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //return view('doctors.profile.add_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
     public function show(Doctor $doctor)
     {


   return view('doctors.page',compact(['doctor']));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }


}#
