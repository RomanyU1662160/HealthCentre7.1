<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Patient;
use App\Models\Slot;
use Laravel\Scout\Searchable;


class Doctor extends User
{
  protected $table = 'users';

 use Searchable;
// set the elequent relationship  with patients table (one to many)
  public function patients(){
    return $this->hasMany(Patient::class, 'doctor_id');
  }

// set the elequent relationship  with appointements table (one to many)
 public function appointments(){
   return $this->hasMany(Appointment::class, 'doctor_id');
 }


 // // get all doctor slottimes
 //     public function slots(){
 //       return $this->belongsToMany(Slot::class,'user_slot','user_id','slot_id')->withPivot('date');
 //     }
 //
 //     public function freeSlots($date){
 //      return $freeSlots = $this->belongsToMany(Slot::class,'user_slot','user_id','slot_id')->wherePivot('date','=',$date)->where('booked',false);
 //       // return dd($freeSlots);
 //     }

} #
