<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Employee;
use App\SalonCategory;
use App\Service;
use App\User;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $response = array();
        $user = User::all();
        $Reva = Appointment::Where('status', '!=', 2)->get();

        $today = Carbon::today();
        $todayEnd = Carbon::today()->addHours(22);
        $tomorrow = Carbon::tomorrow();
        $tomorrowEnd = Carbon::tomorrow()->addHours(22);
        $todayApp = DB::select("select * from `appointment` where   `start_time` >= '$today' and `start_time` <= '$todayEnd' AND status != 2  GROUP BY appoiment_no");
        $tommorowApp = DB::select("select * from `appointment` where   `start_time` >= '$tomorrow' and `start_time` <= '$tomorrowEnd' AND status != 2  GROUP BY appoiment_no");
        $statusChart = array();
        $tempPush = array(
            'label' => 'complate',
            'value' => count(Appointment::where('status', '=', 1)->groupBy('appoiment_no')->orderBy('id', 'desc')->get()),
        );
        array_push($statusChart, $tempPush);

        $tempPush = array(
            'label' => 'cancel',
            'value' => count(Appointment::where('status', '=', 2)->groupBy('appoiment_no')->orderBy('id', 'desc')->get()),
        );
        array_push($statusChart, $tempPush);
        $tempPush = array(
            'label' => 'waiting',
            'value' => count(Appointment::where('status', '=', 0)->groupBy('appoiment_no')->orderBy('id', 'desc')->get()),
        );
        array_push($statusChart, $tempPush);

        $availableChart = array();
        $tempPush = array(
            'label' => 'Women',
            'value' => count(Service::where('service_for', '=', 'Women')->get()),
        );
        array_push($availableChart, $tempPush);

        $tempPush = array(
            'label' => 'Men',
            'value' => count(Service::where('service_for', '=', 'Men')->get()),
        );
        array_push($availableChart, $tempPush);
        $tempPush = array(
            'label' => 'Both',
            'value' => count(Service::where('service_for', '=', 'Both')->get()),
        );
        array_push($availableChart, $tempPush);
        $empWorkChart = array();
        $employee = Employee::all();
        foreach ($employee as $key => $value) {

            $tempPush = array(
                'x' => $value['name'],
                'y' => count(Appointment::where([['status', '=', 1], ['emp_id', '=', $value['id']]])->groupBy('appoiment_no')->get()),
            );
            array_push($empWorkChart, $tempPush);
        }
        // {
        //     x: 'emp_name',
        //     y: 'work',
        // }
        $response['total'] = $Reva->sum('total');
        $response['user'] = count($user);
        $response['today'] = count($todayApp);
        $response['emp'] = count(Employee::all());
        $response['ser'] = count(Service::all());
        $response['cat'] = count(SalonCategory::all());
        $response['tomorrow'] = count($tommorowApp);
        $response['statusChart'] = json_encode($statusChart);
        $response['available_for'] = json_encode($availableChart);
        $response['empWOrk'] = json_encode($empWorkChart);
        return view('dashboard')->withdata($response);
        //return $statusChart;

    }
}
