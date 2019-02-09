<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use Laravel\Scout\Searchable;
use Carbon\carbon;


class Appointment extends Model
{
 use Searchable;



    protected $fillable=[
      'date','start_at','end_at','patient_attend','doctor_attend','notes','doctor_id','patient_id','refrence'];

    protected $dates = ['date'];
    protected $times = ['start_at','end_at',];

// set the elequent relationship  with patients table (many to one)


    public function patient(){
      return $this->belongsTo(Patient::class);
    }

// set the elequent relationship  with doctors table (many to one)
    public function doctor(){
      return $this->belongsTo(Doctor::class);
    }

public function prescription(){
  return $this->hasOne(Prescription::class);
}

public function hasPrescription(){
return ($this->prescription()->count()>0)? true : false;

}
public function isEditable(){
 $time = $this->date->format('Y-m-d' ).' '.$this->start_at;
 $time = Carbon::parse($time)->subHour();
return $time->gt(Carbon::now());
}


}#
