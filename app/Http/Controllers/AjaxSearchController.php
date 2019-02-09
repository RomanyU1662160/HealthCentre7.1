<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Response;

class AjaxSearchController extends Controller
{
    public function viewSearch(){
      return view('search.search');
    }



    public function searchAppointment(Request $request)

      {

      if($request->ajax())

      {

      $output="";
      $q = $request->input('search');
      $appointments = Appointment::where('refrence','LIKE',"%{$q}%")->paginate(5);
      //$appointments=DB::table('appointments')->where('refrence','LIKE','%'.$request->search."%")->get();

      // if($appointments)
      //
      // {
      //
      // foreach ($appointments as $key => $appointment) {
      //
      // $output.="<a href='route(appointment.show,$appointment->id)' ><tr>".
      //
      // '<td>'.$appointment->id.'</td>'.
      //
      // '<td>'.$appointment->refrence.'</td>'.
      //
      // '<td>'.$appointment->date.'</td>'.
      //
      // '<td>'.$appointment->start_at.'</td>'.
      // '<td>'.$appointment->patient->fname.'</td>'.
      //
      // '</tr> </a>';
      //
      // }

      //return response($output);

  //  }
        return Response::json('$appointments');
     }

    }





 }#
