<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;
use Laravel\Scout\Searchable;


class Patient extends Model
{
 use Searchable;

      protected $fillable = [
    'fname', 'lname', 'email', 'gender','mobile','house','postcode','address','dob','avatar',  'patient_number','doctor_id'
    ];
      protected $dates = ['dob'];

// set the elequent relationship  with doctors table (many to one)
      public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
      }

// set the elequent relationship  with doctors table (one to many)
      public function appointments(){
        return $this->hasMany(Appointment::class);
      }

// return all the prescriptions issued to the patient through the intermediate class Appointment
      public function prescriptions()
         {
            return $this->hasManyThrough( Prescription::class, Appointment::class);
         }


// get the patient profile image
      public function avatar(){
        if($this->avatar){
          return asset('/avatars/patients/'.$this->avatar);
         }else{
           return "https://www.gravatar.com/avatar/{{md5(trim($this->fname))}}?d=mm&s=150" ;
         }
      }

// The patient age (Carbon)
      public function age(){
        return $this->dob->age;
      }

      // get the Patient full name
      //return string  (fname .lname)
            public function fullName(){
            $title =  ($this->gender=='Male')? 'Mr.': 'Ms.';
              return $title.' '.$this->fname. ' '. $this->lname ;
            }


            // get the Patient Address

                  public function fullAddress(){

                    return ' '.$this->house. ' '. $this->address. ', '. $this->postcode;
                  }


    public function nextAppointment(){
    $Fappointment=  $this->appointments()->where('date','>',Carbon::now())->orderby('date','asc')->first();
    return $Fappointment;

    }
//return all appointments for today

    public function todayAppointments(){
      $today = Carbon::today()->format('Y-m-d');
//dd($today);
  return  $this->appointments()->whereDate('date',$today)->orderby('date','asc');
  }

  public function todayFirstAppointment(){
    $today = Carbon::today()->format('Y-m-d');
//dd($today);
return $appointment =  $this->todayAppointments()->first();
//dd($appointment);
}

  }#
