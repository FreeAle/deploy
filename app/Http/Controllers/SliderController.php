<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->is('api/*')) {
            $responce = array();
            $responce['status'] = true;
            $responce['data'] =  Slider::all();
            return $responce;
        }
        $data = Slider::all();
     //   $foo = new Service();
        //$data=$foo->SalonCategory();
        return view('slider')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'bail|required|min:5|max:250',   
        ]);
        $reqData = $request->all();
        $reqData['image'] = "default.jpg";
        if ($request->image && $request->image != "undefined") {
            $reqData['image']=(new AppHelper)->saveImage($request);
        }
        if (Slider::create($reqData)) {
            $responce = array();
            $responce['msg'] = "Record Inserted!!";
            $responce['data'] = Slider::all();
            $data = Slider::all();
            return view('service')->withData($data);
            // return $data;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Slider::findOrFail($id);
        $data = Slider::all();
        $res['data'] = $data;
        $result = (new AppHelper)->deleteFile($delete['image']);
        $delete->delete();  
        $res['msg'] = "Record is deleted";
        
        return $res;
    }
}
