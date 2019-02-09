<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Redirect;
use Validator;
use DataTables;


/*
 Romany notes:
search is done in the index page for each model using jquery ajax.
this controller is created to test and learn laravel datatable.
in order to use this controller add the following in the navbar to show the views

<li class="nav-item  mr-2  btn btn-outline-romany">
  <a class="nav-link " href="{{route('search.ajax')}}">  Search</a>
</li>

<li class="nav-item  mr-2  btn btn-outline-romany">
  <a class="nav-link " href="{{route('search.getTable')}}"> Find patient</a>
</li>
<li class="nav-item  mr-2  btn btn-outline-romany">
  <a class="nav-link " href="{{route('search.appointments')}}"> Find Appointment</a>
</li>
*/

class SearchController extends Controller
{

  public function viewSearchForm(){
    return view('search.index');
  }

  public function search( Request $request){
   $model = $request->input('model');
    Validator::make($request->all(),[
       'search'=>'required',

     ]);
     $q = $request->input('search');

    $appointments = Appointment::where('refrence','LIKE',"%{$q}%")->paginate(4);
     //$results =  Appointment::search($request->input('search'))->paginate(6);

   $x =1;
     return view ('search.index',compact(['appointments','x']));
   }


   public function viewdataTable(){
     return view('search.dataTable');
   }

//search patients
   public function getResults()
   {
     $data = Datatables::eloquent(Patient::query())->make(true);
     return $data;
   }

   public function searchAppointments(){
     return view('search.appointments');
   }

   //search patients
      public function AppointmentsResults()
      {
         $data = Datatables::eloquent(Appointment::query())->make(true);
         return $data;
      }


}#
