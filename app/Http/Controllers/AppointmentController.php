<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\MainSetting;
use App\Notifications\AppointmentCancel;
use App\Notifications\AppointmentDone;
use App\Service;
use App\User;
use Carbon\Carbon;
use Cartalyst\Stripe\Stripe;
use DB;
use Illuminate\Http\Request;
use OneSignal;

class AppointmentController extends Controller
{

    public function index(Request $request)
    {
        $temp = array();
        if ($request->is('api/*')) {
            for ($i = 0; $i < 3; $i++) {
                $groupData = Appointment::where([['user_id', '=', $request->user()->id], ['status', '=', $i]])->groupBy('appoiment_no')->orderBy('id', 'desc')->get();
                foreach ($groupData as $key => $value) {
                    $eachData = Appointment::where('appoiment_no', '=', $value['appoiment_no'])->get();
                    // array_push($temp,$eachData);
                    $tempStart = array_first($eachData);
                    $tempEnd = end($eachData);
                    $tempEnd = end($tempEnd);
                    $value['grandTotal'] = $eachData->sum('total');
                    $value['grandDiscount'] = $eachData->sum('discount');
                    $value['orignalStartTime'] = $tempStart['start_time'];
                    $value['orignalEndTime'] = $tempEnd['end_time'];
                    $value['data'] = $eachData;
                }
                if ($i == 0) {
                    $temp['upcoming'] = $groupData;
                } elseif ($i == 1) {
                    $temp['complate'] = $groupData;
                } else {
                    $temp['cancel'] = $groupData;
                }
            }
            $responce = array();
            $responce['data'] = $temp;
            $responce['status'] = true;
            return $responce;
        }
        $groupData = Appointment::groupBy('appoiment_no')->orderBy('id', 'desc')->get();
        foreach ($groupData as $key => $value) {
            $eachData = Appointment::where('appoiment_no', '=', $value['appoiment_no'])->get();
            array_push($temp, $eachData);
            $tempStart = array_first($eachData);
            $tempEnd = end($eachData);
            $tempEnd = end($tempEnd);
            $value['grandTotal'] = $eachData->sum('total');
            $value['grandDiscount'] = $eachData->sum('discount');
            $value['orignalStartTime'] = $tempStart['start_time'];
            $value['orignalEndTime'] = $tempEnd['end_time'];
            $value['data'] = $eachData;
        }
        return view('appointment')->withdata($groupData);
    }
    public function chkAvailability(Request $request)
    {
        $date1 = new Carbon($request['start_time']);
        $liveTime = new Carbon($request['live_time']);
        if ($date1 > $liveTime) {

            $dt = new Carbon($request['start_time']);
            $tempDate = new Carbon();
            $master = json_decode($request['master'], true);
            $der = $master;
            $date2 = new Carbon($request['start_time']);
            $data = MainSetting::find(1);

            for ($i = 0; $i < count($master); $i++) {
                $ser = Service::where('id', '=', $der[$i]['id']);
                $date2->addMinutes($der[$i]['time']);
                $dt2 = $date2->copy();
                $results = DB::select("select * from `appointment` where   `start_time` >= '$date1' and `start_time` <= '$date2' or end_time >= '$date1' AND end_time <=  '$date2' or start_time <= '$date1' and end_time >= '$date1' or start_time <= '$date2' and end_time >='$date2' AND status != 2");
                $temp = json_encode($results);
                $flag = true;
                $result = json_decode($temp, true);
                foreach ($result as $key => $value) {
                    if ($value['emp_id'] == $der[$i]['emp_id']) {
                        $flag = false;
                    }
                }
                if ($flag == true && $dt->format('H:m:s') > $data["open_time"] && $dt2->format('H:m:s') < $data['close_time']) {
                    $der[$i]['available'] = true;
                    $date1->addMinutes($der[$i]['time']);
                } else {
                    $der[$i]['available'] = false;
                    $date2 = $date1->copy();
                }

            }
            $response = array();
            $responce['status'] = true;
            $responce['data'] = $der;
            // var_dump( $responce);
            return $responce;
        }
        $response = array();
        $responce['status'] = false;
        $responce['msg'] = "You Are To late Please Select Right Time";
        return $responce;
    }
    public function bookAppointment(Request $request)
    {
        $newToken;
        $date2 = new Carbon($request['start_time']);
        $temp;
        $date1 = new Carbon($request['start_time']);
        $last = Appointment::latest()->first();
        $newNo = 0;
        if ($last) {
            $newNo = $last['appoiment_no'];
        } else {
            $newNo = 999;
        }
        $newNo = $newNo + 1;
        $master = json_decode($request['master'], true);
        $newToken = $master['0']['payment_token'];
        if ($master['0']['payment_method'] == 'STRIPE') {
            $newToken = $this->paymentWithStripe($master['0']['payment_token'], $request['total']);
        }

        for ($i = 0; $i < count($master); $i++) {
            $date2->addMinutes($master[$i]['time']);
            $master[$i]['appoiment_no'] = $newNo;
            $master[$i]['user_id'] = $request->user()->id;
            $master[$i]['start_time'] = $date1;
            $master[$i]['end_time'] = $date2;
            $master[$i]['payment_token'] = $newToken;
            $temp = $master[$i]['time'];
            unset($master[$i]['time']);
            Appointment::insert($master[$i]);
            $date1->addMinutes($temp);
        }
        $responce['status'] = true;
        $responce['msg'] = "Thenkyou for booking";
        $user = User::Find($request->user()->id);
        if (MainSetting::where('email_status', '=', 'on')->first()) {
            try {
                $user->notify(new AppointmentDone());

            } catch (\Exception $e) {

            }

        }
        if (MainSetting::where('notification_status', '=', 'on')->first()) {
            try {
                OneSignal::sendNotificationToUser("Your Booking is Confirm at " . MainSetting::find(1)->name, $user->device_token, $url = null, $data = null, $buttons = null, $schedule = null);

            } catch (\Exception $e) {

            }

        }

        return $responce;
    }
    public function updateAppointment($id)
    {
        if (Appointment::where('appoiment_no', $id)
            ->update(['status' => 1], ['payment_status' => 1])) {
            Appointment::where('appoiment_no', $id)
                ->update(['payment_status' => 1]);
            return "true";
        }
    }
    public function updateAppointmentCancel($id)
    {
        if (Appointment::where('appoiment_no', $id)
            ->update(['status' => 2], ['payment_status' => 1])) {
            $app = Appointment::where('appoiment_no', '=', $id)->first();
            $user = User::Find($app['user_id']);
            if (MainSetting::where('email_status', '=', 'on')->first()) {
                $user->notify(new AppointmentCancel($id));
            }
            if (MainSetting::where('notification_status', '=', 'on')->first()) {

                OneSignal::sendNotificationToUser("Your Appointment is Cancel at " . MainSetting::find(1)->name, $user->device_token, $url = null, $data = null, $buttons = null, $schedule = null);
            }

            return redirect('/appointment');
        }
    }
    public function InvoiceData($id)
    {
        $temp = array();
        //   ->groupBy('account_id')
        $groupData = Appointment::where('appoiment_no', '=', $id)->groupBy('appoiment_no')->orderBy('id', 'desc')->get();
        for ($i = 0; $i < count($groupData); $i++) {
            $eachData = Appointment::where('appoiment_no', '=', $groupData[$i]['appoiment_no'])->get();
            foreach ($eachData as $key => $value) {
                $value['subTotal'] = $value['total'] + $value['discount'];
            }
            array_push($temp, $eachData);
            $tempStart = array_first($eachData);
            $tempEnd = end($eachData);
            $tempEnd = end($tempEnd);
            $groupData[$i]['grandTotal'] = $eachData->sum('total');
            $groupData[$i]['subTotal'] = $eachData->sum('total') + $eachData->sum('discount');
            $groupData[$i]['grandDiscount'] = $eachData->sum('discount');
            $groupData[$i]['orignalStartTime'] = $tempStart['start_time'];
            $groupData[$i]['orignalEndTime'] = $tempEnd['end_time'];
            $groupData[$i]['data'] = $eachData;
            $data = MainSetting::find(1);
            $groupData[$i]['salonName'] = $data['name'];
            $groupData[$i]['salonAddress'] = $data['address'];
            $groupData[$i]['salonState'] = $data['state'];
            $groupData[$i]['salonCity'] = $data['city'];
            $groupData[$i]['salonemail'] = $data['email'];
        }
        return view('invoice')->withdata($groupData);
    }
    public function test()
    {
        $der = array(
            "id" => "tok_1D9WgRH0rcONYHtvKv3UhwlI",

        );
        $stripe = new Stripe('sk_test_oB3TiMnK3Etq7UlFQ61jL6Bx');
        $charge1 = $stripe->charges()->create([
            // 'customer' => 'cus_4EBumIjyaKooft',
            'currency' => 'USD',
            'amount' => 1000 / 100,
            'source' => 'tok_1D9XOuGg3Z8ScBOFY2yRXQH2',
        ]);
        echo $charge1['id'];
        $charge = $stripe->charges()->find($charge1['id']);
        dd($charge);
    }
    public function paymentWithStripe($token, $total)
    {

        $key = MainSetting::find(1);
        $stripe = new Stripe($key['strip_api_key']);
        $charge1 = $stripe->charges()->create([
            // 'customer' => 'cus_4EBumIjyaKooft',
            'currency' => 'USD',
            'amount' => (float) $total / 100,
            'source' => $token,
        ]);

        // var_dump( $responce);
        return $charge1['id'];
    }
}
