<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppHelper;
use App\SalonCategory;
use Illuminate\Http\Request;

class SalonCategoryController extends Controller
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
            // SalonCategory::all();
            $responce = array();
            $responce['status'] = true;
            $responce['data'] = SalonCategory::where('status', '=', 'on')->with('subCategory')->get();
            return $responce;

        }
        $data = SalonCategory::all();
        return view('salonCategory')->withData($data);
    }
    public function display()
    {
        //
        $data = SalonCategory::all();
        return $data;
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
            'name' => 'bail|required|unique:service_cat,name',
            'status' => 'nullable|',
            'description' => 'bail|required|min:20|max:500',
        ]);
        $reqData = $request->all();
        $reqData['image'] = "default.jpg";
        if ($request->image != "undefined" && $request->image) {
            $reqData['image'] = (new AppHelper)->saveImage($request);
        }
        if (SalonCategory::create($reqData)) {
            $responce = array();
            $responce['msg'] = "Record Inserted!!";
            $responce['data'] = SalonCategory::all();
            return $responce;
            // return $data;
            // return $data;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalonCategory  $salonCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SalonCategory $salonCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalonCategory  $salonCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = SalonCategory::findOrFail($id);

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalonCategory  $salonCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalonCategory $salonCategory,$id)
    {
        // $request->validate([
        //     'name' => 'bail|required',
        //     ]);
        $update = SalonCategory::findOrFail($id);
        $reqData = $request->all();
        $reqData['image'] = $update['image'];
        if ($request->image != "undefined" && $request->image) {
            $result = (new AppHelper)->deleteFile($reqData['image']);
            $reqData['image'] = (new AppHelper)->saveImage($request);
        }
        $update->update($reqData);
        $responce = array();
        $responce['msg'] = "Record Updated!!!";
        $responce['data'] = SalonCategory::all();
        return $responce;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalonCategory  $salonCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            
            $delete = SalonCategory::findOrFail($id)->delete();
            $data = SalonCategory::all();
            $res = array();
            $res['data'] = $data;
            $res['msg'] = "Record is deleted";
            return $res;
        }
        catch(\Exception $e ){
           // $res['data'] = $data;
        return response('Data is Connected with other Data', 400);

        }
      

    }
}
