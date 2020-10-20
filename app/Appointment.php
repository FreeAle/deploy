<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
        'appoiment_no', 'user_id', 'emp_id', 'service_id', 'total', 'discount', 'start_time', 'end_time', 'payment_status', 'status', 'state',
    ];
    protected $table = 'appointment';
    protected $appends = ['empName', 'serviceName', 'reviewOnMe', 'UserName'];
    public $timestamps = true;
    public function getEmpNameAttribute()
    {
        $data = Employee::find($this->attributes['emp_id']);
        return $data['name'];
    }
    public function getUserNameAttribute()
    {
        $data = User::find($this->attributes['user_id']);
        return $data['name'];
    }
    public function getServiceNameAttribute()
    {
        $data = Service::find($this->attributes['service_id']);
        return $data['name'];
    }

    public function getReviewOnMeAttribute()
    {
        $data = array();
        $data['employeeReview'] = EmployeeReview::where('appointment_id', '=', $this->attributes['appoiment_no'])->get();
        $data['service'] = serviceReview::where('appointment_id', '=', $this->attributes['appoiment_no'])->get();
        return $data;
    }

    // public function getUserNameAttribute()
    // {
    //     $data= User::Where('id','=',$this->attributes['user_id'])->get();
    //     return $data['name'];
    // }
}
