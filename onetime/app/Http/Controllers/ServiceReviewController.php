<?php

namespace App\Http\Controllers;

use App\serviceReview;
use App\EmployeeReview;

use Illuminate\Http\Request;

class ServiceReviewController extends Controller
{
    public function store(Request $request)
    {
        //
       $temp= serviceReview::where([['user_id','=',$request->user_id],['service_id','=',$request->service_id],['appointment_id','=',$request->appointment_id]])->get();
       if(count($temp)==0){
        $request->validate([
            'user_id' => 'bail|required|',
            'service_id' => 'bail|required|',
            'appointment_id' => 'bail|required|',
           'star'=>'bail|required|',
            ]);
        serviceReview::create($request->all());
        $responce=array();
        $responce['msg']="Thankyou!!!";
        $responce['status']=true;
        
             return $responce;
        }
        $responce['msg']="We have already your review";
        $responce['status']=false;
        return $responce;
        
    }
    public function fatchAllReview(){
        $data=array();
        $data['service']=serviceReview::all();
        $data['emp']=EmployeeReview::all();
        //return $data;
       return view('review')->withdata($data);
    }
    public function delete($id){
        serviceReview::findOrFail($id)->delete();
        return "true";
    }
}
