<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceReview extends Model
{
    //
    protected $fillable = [
        'name','user_id' ,'service_id','star','comment','appointment_id',
    ];
    protected $table = 'review_for_service';
    protected $appends = ['serviceName','userName','imagePath','user'];
    public $timestamps = true;
    public function getServiceNameAttribute()
    {
        $data= Service::findorFail($this->attributes['service_id']);
        return  $data['name'];
    }
    public function getUserNameAttribute()
    {
        $temp=array();
        $data= User::findorFail($this->attributes['user_id']);
        $temp['name']=$data['name'];
        $temp['image']=$data['image'];
        return   $temp;
    }
    public function getUserAttribute()
    {
       
        $data= User::findorFail($this->attributes['user_id']);
       
        return $data['name'];
    }
    public function getImagePathAttribute()
    {
        return url('public/uploadedimages/') . '/';
    }
   

}
