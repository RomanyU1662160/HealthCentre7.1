<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NewPatientRule;
use Request;


class AddNewPatientRequest extends FormRequest
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
      $patient_number = request()->fname .request()->lname. studly_case(request()->dob);
    return [
          'fname'   => 'required|string|max:255',
          'lname'   => 'required|string|max:255',
          'patient_number'=>['unique:patients',new NewPatientRule($patient_number)],
          'gender'  => 'required',
          'mobile'  => ['required','regex:/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/'],
          'email'   => 'required|email',
          'house'   => 'required',
          'address' => 'required',
          'postcode'=> [ 'required', 'regex:~^(?:gir(?: *0aa)?|[a-pr-uwyz](?:[a-hk-y]?[0-9]+|[0-9][a-hjkstuw]|[a-hk-y][0-9][abehmnprv-y])(?: *[0-9][abd-hjlnp-uw-z]{2})?)$~i', ],
          'dob'     => 'required|date',
          'family-doctor'  => 'required',
        ];
    }


}#
