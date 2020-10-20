<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
    

class MainSetting extends Model
{
    //
    use Notifiable;
    protected $fillable = [
        'name','mobile_no' ,'address','state','city','open_time','close_time','email','contect_person','status','available_for','detail','profile_image','cover_image','google_client_id','facebook_app_name','facebook_app_id','razorpay_key','strip_publish_key','paypal_sendbox_id','paypal_production_id','password','OTP','notification_status','email_status','strip_api_key',
    ];
    protected $table = 'salon_master';
     protected $appends = ['imagePath'];
    public $timestamps = true;
    protected $hidden = [
        'password','OTP',
    ];
    public function getImagePathAttribute()
    {
        return url('public/uploadedimages/') . '/';
    }
}
