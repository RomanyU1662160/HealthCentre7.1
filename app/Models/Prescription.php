<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;
use App\Models\Drug;

class Prescription extends Model
{
  protected $fillable =[
    'appointment_id',
  ];

public function appointment(){
  return $this->belongsTo( Appointment::class);
}

public function drugs(){
  return $this->belongsToMany(Drug::class)->withPivot('notes');
}

}#
