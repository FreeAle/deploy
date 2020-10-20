<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Controllers\AppHelper;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
            $responce['data'] = Service::where('status', '=', 'on')->with('SalonCategorys')->get();
            return $responce;
        }
        $data = Service::with('SalonCategorys')->get();
        $foo = new Service();
        //$data=$foo->SalonCategory();
        return view('service')->withData($data);
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
            'name' => 'bail|required|unique:services_tbl,name',
            'status' => 'bail|required|',
            'time' => 'bail|required|numeric',
            'price' => 'bail|required|numeric',
            'description' => 'bail|required|min:20',
            'service_for' => 'bail|required|',
        ]);
        $reqData = $request->all();
        $reqData['image'] = "default.jpg";
        $reqData['cover_image'] = "default.jpg";
        if ($request->image && $request->image != "undefined") {
            $reqData['image']=(new AppHelper)->saveImage($request);
        }if ($request->cover_image && $request->cover_image != "undefined") {
            $reqData['cover_image'] = (new AppHelper)->saveCoverImage($request);
        }
        if (Service::create($reqData)) {
            $responce = array();
            $responce['msg'] = "Record Inserted!!";
            $responce['data'] = Service::all();
            $data = Service::all();
            return view('service')->withData($data);
            // return $data;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Service::findOrFail($id);

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'bail|required',
            'status' => 'bail|required|',
            'time' => 'bail|required|numeric',
            'price' => 'bail|required|numeric',
            'description' => 'bail|required|min:20',
            'service_for' => 'bail|required|',
        ]);
        //
        $update = Service::findOrFail($id);
        $reqData = $request->all();
        $reqData['image'] = $update['image'];
        $reqData['cover_image'] = $update['cover_image'];
        if ($request->image && $request->image != "undefined") {
            $result = (new AppHelper)->deleteFile($reqData['image']);
            $reqData['image'] = (new AppHelper)->saveImage($request);
        }if ($request->cover_image && $request->cover_image != "undefined") {
            $result = (new AppHelper)->deleteFile($reqData['cover_image']);
            $reqData['cover_image'] = (new AppHelper)->saveCoverImage($request);
        }

        //  return view('service')->withData($data);
        $update->update($reqData);
        $responce = array();
        $responce['msg'] = "Record Updated!!!";
        $data = Service::all();
        return redirect('/service')->with('data', $data);
        // return redirect()->route('service');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
        $delete = Service::findOrFail($id)->delete();
        $data = Service::all();
        $res = array();
        $res['data'] = $data;
        $res['msg'] = "Record is deleted";
        $data = Service::all();
        return $res;
    }
    catch(\Exception $e ){
       // $res['data'] = $data;
    return response('Data is Connected with other Data', 400);

    }
    }
    public function findEmployeeOfService($id)
    {
        $service = Service::findOrFail($id);
        $newService = explode(",", $service['emp']);
        $selectedEMP = Employee::whereIn('id', $newService)->get();
        $unselectedEMP = Employee::whereNotIn('id', $newService)->get();
        $responce = array();
        $responce['selected'] = $selectedEMP;
        $responce['unselected'] = $unselectedEMP;
        $responce['service_name'] = $service['name'];
        $responce['id'] = $service['id'];
        return view('serviceForEmployee')->withData($responce);
        //return redirect('/serviceForEmployee')->with('data', $responce);

    }
    public function employeeOnService(Request $request, $id)
    {
        $add = Service::findOrFail($request['id']);
        $newService = explode(",", $request['emp']);
        $oldService = explode(",", $add['emp']);
        $result = array_merge(array_diff($newService, $oldService), array_diff($oldService, $newService));
        var_dump($result);
        if ($add->update($request->all())) {
            foreach ($result as $value) {
                $updateData = array();
                echo $value;
                if ($value != null) {
                    $update = Employee::findOrFail($value);
                    $updateData = Employee::findOrFail($value);

                    $oldSer = explode(",", $updateData['service']);
                    if (in_array($request['id'], $oldSer)) {
                        $newData = str_replace($request['id'], "", $updateData['service']);
                        $newData = ltrim($newData, ',');
                        $newData = rtrim($newData, ',');
                        $updateData['service'] = str_replace(",,", ",", $newData);
                        echo $updateData['service'];
                    } else {

                        $updateData['service'] = $updateData['service'] . "," . $request['id'];
                        $updateData['service'] = ltrim($updateData['service'], ',');
                        $updateData['service'] = rtrim($updateData['service'], ',');
                        $updateData['service'] = str_replace(",,", ",", $updateData['service']);
                    }

                    $update->update($updateData->toArray());
                }
            }

            return "true";
        }
        return "true";

    }
}
