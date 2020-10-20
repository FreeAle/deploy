<?php

namespace App\Http\Controllers;

use App\EmployeeReview;
use OneSignal;
use Illuminate\Http\Request;


class EmployeeReviewController extends Controller
{
    public function store(Request $request)
    {
        //
       $temp= EmployeeReview::where([['user_id','=',$request->user_id],['emp_id','=',$request->emp_id],['appointment_id','=',$request->appointment_id]])->get();
       if(count($temp)==0){
        $request->validate([
            'user_id' => 'bail|required|',
            'emp_id' => 'bail|required|',
            'appointment_id' => 'bail|required|',
           'star'=>'bail|required|',
            ]);
            EmployeeReview::create($request->all());
        $responce=array();
        $responce['msg']="Thankyou!!!";
        $responce['status']=true;
        
             return $responce;
        }
        $responce['msg']="We have already your review";
        $responce['status']=false;
        return $responce;
        
    }
    public function delete($id){
        EmployeeReview::findOrFail($id)->delete();
        return "true";
    }
    
}
