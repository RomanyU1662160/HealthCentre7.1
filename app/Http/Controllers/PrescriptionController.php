<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Drug;
use App\Models\Appointment;


class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $prescriptions = Prescription::paginate(25);
      $x =1;
      return view('prescriptions.index',compact(['prescriptions','x']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Appointment $appointment )
    {

      $this->validate($request, [
        'drug1'=>'required_without_all:drug2,drug3',
      ] );

      if ($appointment->prescription) {
      $prescription = $appointment->prescription;
      }
       else{
         $prescription = Prescription::create([
           'renewal'=>'0',
          'appointment_id'=>$appointment->id,
           ]) ;
       }
       $drugs =[];

           if ($request->filled('drug1')) {
         $drugs[] = Drug::find($request->input('drug1'));
          }
           if ($request->filled('drug2')) {
           $drugs[]  = Drug::find($request->input('drug2'));
           }
          if ($request->filled('drug3')) {
         $drugs[]  = Drug::find($request->input('drug3'));
          }

       $prescription->drugs()->saveMany($drugs);


       return redirect()->back()->with('success',' New prescription added to this appointment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
