<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\carbon;

class NewAppointmentStarttimeRule implements Rule
{
  protected $startWorkingTime;
  protected $endWorkingTime;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($startWorkingTime, $endWorkingTime)
    {
        //$this->submittedTime = $submittedTime;
        $this->startWorkingTime = Carbon::parse($startWorkingTime);
        $this->endWorkingTime = Carbon::parse($endWorkingTime);
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
      $value = Carbon::parse($value);
      return $value->between($this->startWorkingTime, $this->endWorkingTime);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
      $start = $this->startWorkingTime->format('H:i');
      $end = $this->endWorkingTime->format('H:i');
        return "The time required is out of the working hours, time must be between $start to $end ";
    }
}
