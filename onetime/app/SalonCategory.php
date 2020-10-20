<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonCategory extends Model
{
    //
    protected $fillable = [
        'name','id' ,'status','description','image',
    ];
    protected $table = 'service_cat';
    protected $appends = ['imagePath'];
    
    public $timestamps = true;
    public function subCategory()
    {
        //$this->hasMany('App\Comment', 'foreign_key', 'local_key');
        return $this->hasMany('App\Service','catID','id');
    }
    
    public function getImagePathAttribute()
    {
        return url('public/uploadedimages/') . '/';
    }

}
