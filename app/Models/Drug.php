<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Prescription;

class Drug extends Model
{
      protected $fillable =[
        'name','minimum_age','description',
      ];

public function prescriptions(){
  return $this->belongsToMany(Prescription::class)->withPivot('notes');
}

}#
