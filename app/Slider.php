<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable = [
        'title','image','id',
    ];
    protected $table = 'slider_tbl';
    protected $appends = ['imagePath'];

    public $timestamps = true;
    public function getImagePathAttribute()
    {
        return url('public/uploadedimages/') . '/';
    }
}
