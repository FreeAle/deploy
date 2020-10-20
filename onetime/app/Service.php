<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'name','time' ,'price','image','cover_image','is_image_available','status','service_for','emp','catID','description',
    ];
    protected $table = 'services_tbl';
    protected $appends = ['catName','imagePath','employees','avgReview','ReviewDetail'];

    public $timestamps = true;
    
    public function salonCategorys()
    {
        return $this->belongsTo('App\SalonCategory','catID','id');
    }
    
    public function getCatNameAttribute()
    {
    
            $data=SalonCategory::find($this->attributes['catID']);
            return $data['name'];
     
    }
    public function getAvgReviewAttribute()
    {
        $s = ServiceReview::where('service_id', $this->attributes['id'])->get();
        if (count($s) > 0) {
            return ceil($s->sum('star') / count($s));
        }
        else{
            return 0;
        }

    }
    public function getEmployeesAttribute()
    {
    
                
            $data=Employee::whereIn('id',explode(",", $this->attributes['emp']))->get();
            return $data;
     
    }
    public function getReviewDetailAttribute()
    {
        return serviceReview::where('service_id', '=', $this->attributes['id'])->inRandomOrder()->limit(10)->get();
    }
    

    public function getImagePathAttribute()
    {
        return url('public/uploadedimages/') . '/';
    }
    // public function getRatingAvgAttribute()
    // {
    //     $r = Rating::where('restaurant_id', $this->attributes['id'])->get();
    //     if (count($r) > 0) {
    //         return ceil($r->sum('rate') / count($r));
    //     }
    // }

}
