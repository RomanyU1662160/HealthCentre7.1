<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
Use Request;
Use DB;

class NewPatientRule implements Rule
{
  protected $patient_number;

    /**
     * Create a new rule instance.
     *
     * @return void
     */


public function __construct($patient_number){
return $this->patient_number = $patient_number;
}
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
      $value =  $this->patient_number;
      // dd($value);
    return   DB::table('patients')->where('patient_number',$value)->count() < 1;
    //dd($patient);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This patient is already registered ';
    }
}
