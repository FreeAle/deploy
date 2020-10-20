<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeReview extends Model
{
    //
    protected $fillable = [
        'name','user_id' ,'emp_id','star','comment','appointment_id'
    ];
    protected $table = 'review_for_emp';
    protected $appends = ['EmpName1','userName','imagePath','user'];
    public $timestamps = true;
    public function getEmpName1Attribute()
    {
        $data= Employee::findorFail($this->attributes['emp_id']);
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
