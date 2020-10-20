<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile_no','verify','gender','image','password','fev_stylist','fev_service','facebook_token','google_token','OTP','device_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','OTP'
    ];
    protected $appends = ['fevStylists','imagePath','fevServices'];
    public $timestamps = true;
    public function getFevStylistsAttribute()
    {


            $data=Employee::whereIn('id',explode(",", $this->attributes['fev_stylist']))->get();
            return $data;

    }
    public function getFevServicesAttribute()
    {


            $data=Service::whereIn('id',explode(",", $this->attributes['fev_service']))->get();
            return $data;

    }
    public function getImagePathAttribute()
    {
        return url('public/uploadedimages/') . '/';
    }

}
