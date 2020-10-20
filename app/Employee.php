<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'name','mobile_no' ,'gender','image','cover_image','is_image_available','status','detail','service','city','state',
    ];
    protected $table = 'salon_emp';
    protected $appends = ['totalReview','avgReview','imagePath','reviewDetail'];
    public $timestamps = true;
    public function getAvgReviewAttribute()
    {
        $s = EmployeeReview::where('emp_id', $this->attributes['id'])->get();
        if (count($s) > 0) {
            return ceil($s->sum('star') / count($s));
        }
        else{
            return 0;
        }

    }
    public function getImagePathAttribute()
    {
        return url('public/uploadedimages/') . '/';
    }
    public function getReviewDetailAttribute()
    {
        return EmployeeReview::where('emp_id', '=', $this->attributes['id'])->inRandomOrder()->limit(10)->get();
    }
    public function getTotalReviewAttribute()
    {
        $s = EmployeeReview::where('emp_id', '=',$this->attributes['id'])->get();
        return count($s);
    }
    // public function services()
    // {
    
    //         //     echo $this->attributes['id'];
    //         //     exit();
    //         // $data=Service::whereIn('id',explode(",", $this->attributes['service']))->get();
    //         // return $data;
     
    // }
   
   
    
}
