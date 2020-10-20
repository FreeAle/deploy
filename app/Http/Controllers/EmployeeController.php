<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Controllers\AppHelper;
use App\Service;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->is('api/*')) {
            // SalonCategory::all();
            $responce = array();
            $responce['status'] = true;
            $responce['data'] = Employee::where('status', '=', 'on')->get();
            return $responce;
        }
        $data = Employee::get();
        return view('employee')->withData($data);
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
            'name' => 'bail|required|unique:salon_emp,name',
            'mobile_no' => 'bail|required|numeric',
            'detail' => 'bail|required|min:20',
            'gender' => 'bail|required|',
            'city' => 'bail|required|',
            'state' => 'bail|required|',
        ]);
        $reqData = $request->all();
        $reqData['image'] = "default.jpg";
        $reqData['cover_image'] = "default.jpg";

        if ($request->image && $request->image != "undefined") {
            $reqData['image'] = (new AppHelper)->saveImage($request);
        }
        if ($request->cover_image && $request->cover_image != "undefined") {
            $reqData['cover_image'] = (new AppHelper)->saveCoverImage($request);
        }
        if (Employee::create($reqData)) {
            $data = Employee::all();
            return view('service')->withData($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Employee::findOrFail($id);

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
        $update = Employee::findOrFail($id);
        $reqData = $request->all();
        $reqData['image'] = $update['image'];
        $reqData['cover_image'] = $update['cover_image'];

        if ($request->image && $request->image != "undefined") {
            $result = (new AppHelper)->deleteFile($reqData['image']);
            $reqData['image'] = (new AppHelper)->saveImage($request);
        }
        if ($request->cover_image && $request->cover_image != "undefined") {
            $result = (new AppHelper)->deleteFile($reqData['cover_image']);
            $reqData['cover_image'] = (new AppHelper)->saveCoverImage($request);
        }
        $update->update($reqData);
        // $update ->update($reqData);
        return 'true';
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
        $delete = Employee::findOrFail($id)->delete();
        $data = Employee::all();
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
    public function findServiceOfEmployee($id)
    {

        $employee = Employee::findOrFail($id);
        $newService = explode(",", $employee['service']);
        $selectedEMP = Service::whereIn('id', $newService)->get();
        $unselectedEMP = Service::whereNotIn('id', $newService)->get();
        $responce = array();
        $responce['selected'] = $selectedEMP;
        $responce['unselected'] = $unselectedEMP;
        $responce['employee_name'] = $employee['name'];
        $responce['id'] = $employee['id'];
        return view('employeeForService')->withData($responce);
        //return redirect('/serviceForEmployee')->with('data', $responce);

    }
    public function serviceOnEmployee(Request $request, $id)
    {
        $add = Employee::findOrFail($request['id']);
        $newService = explode(",", $request['service']);
        $oldService = explode(",", $add['service']);
        $result = array_merge(array_diff($newService, $oldService), array_diff($oldService, $newService));
        if ($add->update($request->all())) {
            foreach ($result as $value) {
                if ($value != null) {
                    $updateData = array();
                    $update = Service::findOrFail($value);
                    $updateData = Service::findOrFail($value);
                    $oldEmp = explode(",", $updateData['emp']);
                    if (in_array($request['id'], $oldEmp)) {
                        $newData = str_replace($request['id'], "", $updateData['emp']);
                        $newData = ltrim($newData, ',');
                        $newData = rtrim($newData, ',');
                        $updateData['emp'] = str_replace(",,", ",", $newData);
                    } else {
                        $updateData['emp'] = $updateData['emp'] . "," . $request['id'];
                        $updateData['emp'] = ltrim($updateData['emp'], ',');
                        $updateData['emp'] = rtrim($updateData['emp'], ',');
                        $updateData['emp'] = str_replace(",,", ",", $updateData['emp']);
                    }
                    $update->update($updateData->toArray());
                }
            }
            // $this->response['msg'] = "Record Updated";
            // $this->response['success'] = true;
            return "true";
        }
        return "true";
    }
    public function getOneEmployee(Request $request)
    {
        $data = Employee::findOrFail($request['id']);
        $service = Service::whereIn('id', explode(",", $data['service']))->get();
        $data['service'] = $service;
        $responce = array();
        $responce['status'] = true;
        $responce['data'] = $data;
        return $responce;
    }
}
