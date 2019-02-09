<?php

namespace App\Policies;

use App\Models\User;
use App\Appointment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the appointment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Appointment  $appointment
     * @return mixed
     */
    public function view(User $user, Appointment $appointment)
    {
        //
    }

    /**
     * Determine whether the user can create appointments.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role->name === 'Receptionist' ;
    }

    /**
     * Determine whether the user can update the appointment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Appointment  $appointment
     * @return mixed
     */
    public function update(User $user, Appointment $appointment)
    {
       return $user->role_id === 2;
    }

    /**
     * Determine whether the user can delete the appointment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Appointment  $appointment
     * @return mixed
     */
    public function delete(User $user, Appointment $appointment)
    {
        //
    }
}
