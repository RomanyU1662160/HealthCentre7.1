<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_number','password',
        'fname', 'lname','title', 'email', 'gender','mobile','house','address','postcode','dob','avatar','role_id',
    ];

    protected $dates=['dob'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

public function role(){
  return $this->BelongsTo(Role::class);
}


    public function avatar()
      {
        return "https://www.gravatar.com/avatar/{{md5(trim($this->fname))}}?d=mm&s=40" ;
      }

      public function fullName(){
        return $this->title.' '. $this->fname. ' '. $this->lname ;
      }

      // The User age (Carbon)
            public function age(){
              return $this->dob->age;
            }


            public function scopeDoctors($query){
               return $query->where('role_id',2);
          }

          // get the User Address

                public function fullAddress(){

                  return ' '.$this->house. ' '. $this->address. ', '. $this->postcode;
                }




}#
