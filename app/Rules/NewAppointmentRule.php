<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;


class NewAppointmentRule implements Rule
{
  protected $appointmentRefrence;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($appointmentRefrence)
    {
        return $this->appointmentRefrence = $appointmentRefrence;
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
      $value = $this->appointmentRefrence;
      // dd($value);
    return  DB::table('appointments')->where('refrence',$value)->count()<1;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Cannot book this appointment,  patient has another apponitment at the same time ';
    }
}
