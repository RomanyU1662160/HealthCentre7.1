<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class newStaffRule implements Rule
{

  protected $staff_number;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($staff_number)
    {
      $this->staff_number = $staff_number;
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
        $value = $this->staff_number;
        return  DB::table('users')->where('staff_number', $value)->count() ==0;
        //dd($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A staff member is already registered with the same details';
    }
}
