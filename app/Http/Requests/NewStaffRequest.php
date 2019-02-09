<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\newStaffRule;
use Request;

class NewStaffRequest extends FormRequest
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
      $staffNumber = strtoupper(substr(request()->fname,0,1)). request()->lname.studly_case(date('d-m-y',strTotime(request()->dob)));
        return [
          'role'    => 'required',
          'title'   => 'required',
          'fname'   => 'required|string|max:20',
          'lname'   => 'required|string|max:20',
          'dob'     => 'required|date',
          'gender'  => 'required',
          'mobile'  => ['required','regex:/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/'],
          'email'   => 'required|email',
          'house'   => 'required|max:4',
          'address' => 'required',
          'postcode'=> [ 'required', 'regex:~^(?:gir(?: *0aa)?|[a-pr-uwyz](?:[a-hk-y]?[0-9]+|[0-9][a-hjkstuw]|[a-hk-y][0-9][abehmnprv-y])(?: *[0-9][abd-hjlnp-uw-z]{2})?)$~i', ],
          'staff_number'=>[new newStaffRule($staffNumber)],
      ];
    }
}
