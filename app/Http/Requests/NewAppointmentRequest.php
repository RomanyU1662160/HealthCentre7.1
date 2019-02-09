<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\PatientAppointment;
use Request;
use Carbon\carbon;
use App\Rules\NewAppointmentRule;
use App\Rules\NewAppointmentStarttimeRule;


class NewAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
  // $appointmentRefrence = $request->input('patient_number').studly_case($request->input('appointment-date').$request->input('start_at').$request->input('end_at'));
  $appointmentRefrence = request()->patient_number.studly_case(request()->appointment_date.request()->start_at);
  $startWorkingTime = 8;
  $endWorkingTime = 17;
  $submittedTime = Carbon::parse(request()->start_at)->format('H');
        return [
                'appointment_refrence'=>[new NewAppointmentRule($appointmentRefrence)],
                'appointment_date'=>'required|date|after:today',
                'start_at'=> ['required', new NewAppointmentStarttimeRule('8:00','17:00')],


          ];
    }
}
