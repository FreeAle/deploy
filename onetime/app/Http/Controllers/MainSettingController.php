<?php

namespace App\Http\Controllers;

use App\MainSetting;
use App\Notifications\ForgotPassword;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class MainSettingController extends Controller
{
    //

    public function index(Request $request)
    {
        if ($request->is('api/*')) {
            $responce = array();
            $responce['status'] = true;
            $responce['data'] = MainSetting::find(1);
            $responce['data']['oneSignal'] = $this->onePlusRead();

            return $responce;
        }
        $data['data'] = MainSetting::find(1);
        $data['env'] = $this->envRead();
        $data['oneSignal'] = $this->onePlusRead();
        //   return $data;
        return view('mainSetting')->withData($data);
    }
    public function update(Request $request, $id)
    {
        $update = MainSetting::findOrFail($id);
        $reqData = $request->all();
        $reqData['image'] = $update['image'];
        $reqData['cover_image'] = $update['cover_image'];
        if ($request->image != "undefined" && $request->image
        ) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $request->image->move(public_path('/uploadedimages'), $imageName);
            $reqData['profile_image'] = $imageName;
        }
        if ($request->cover_image != "undefined" && $request->cover_image) {

            $file = $request->cover_image;
            $ext = $file->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $request->cover_image->move(public_path('/uploadedimages'), $imageName);
            $reqData['cover_image'] = $imageName;
        }
        $update->update($reqData);
        $data = MainSetting::find(1);
        return "true";

    }
    public function updateSocialSetting(Request $request, $id)
    {
        $update = MainSetting::findOrFail($id)->update($request->all());
        return "true";
    }
    public function updatePaymentSetting(Request $request, $id)
    {
        $update = MainSetting::findOrFail($id)->update($request->all());
        return "true";

    }
    public function envRead()
    {
        $data = [
            'MAIL_HOST' => "smtp_host",
            'MAIL_PORT' => "smtp_port",
            'MAIL_USERNAME' => "smtp_port",
            'MAIL_PASSWORD' => "smtp_port",
        ];
        $resData = [];
        if (count($data) > 0) {
            // Read .env-file
            if (is_writeable("../.env")) {

                $env = file_get_contents('../.env');

                // Split string on every " " and write into array
                $env = preg_split('/\s+/', $env);

                // Loop through given data
                foreach ((array) $data as $key => $value) {

                    // Loop through .env-data
                    foreach ($env as $env_key => $env_value) {

                        // Turn the value into an array and stop after the first split
                        // So it's not possible to split e.g. the App-Key by accident
                        $entry = explode("=", $env_value, 2);

                        // Check, if new key fits the actual .env-key
                        if ($entry[0] == $key) {
                            $data[$key] = $entry[1];
                            // If yes, overwrite it with the new one
                            // $env[$env_key] = $key . "=" . $value;
                        }
                    }
                }

                return $data;
            } else {
                $resData['status'] = 'fail';
                $resData['data'] = 'dont have write purmision.';
            }
        } else {
            $resData['status'] = 'fail';
            $resData['data'] = 'paramater is missing.';
        }
        return $resData;
    }
    public function mailEnvUpdate(Request $request)
    {
        $request->validate([
            'MAIL_HOST' => 'bail|required|',
            'MAIL_PORT' => 'bail|required|numeric',
            'MAIL_USERNAME' => 'bail|required|',
            'MAIL_PASSWORD' => 'bail|required|',

        ]);
        $data = [
            'MAIL_HOST' => $request->MAIL_HOST,
            'MAIL_PORT' => $request->MAIL_PORT,
            'MAIL_USERNAME' => $request->MAIL_USERNAME,
            'MAIL_PASSWORD' => $request->MAIL_PASSWORD,
        ];
        $resData = [];

        // Read .env-file
        if (is_writeable("../.env")) {

            $env = file_get_contents('../.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);

            // Loop through given data
            foreach ((array) $data as $key => $value) {

                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents('../.env', $env);
            $admin = MainSetting::find(1);
            // $admin->notify(new ForgotPassword($password));
            $admin->email_status = $request['email_status'];
            $admin->save();
            $resData['status'] = 'success';
            $resData['data'] = 'env file updated successfully.';
        } else {
            $resData['status'] = 'fail';
            $resData['data'] = 'dont have write purmision.';
            return response('dont have write purmision', 400);
        }
        return "true";
    }
    public function onePlusRead()
    {
        $response = array();
        $response['app_id'] = Config::get('onesignal.app_id');
        $response['rest_api_key'] = Config::get('onesignal.rest_api_key');
        $response['user_auth_key'] = Config::get('onesignal.user_auth_key');
        return $response;

    }
    public function onePlusUpdate(Request $request)
    {
        $data = "<?php
        return array(
            'app_id' =>'" . $request['app_id'] . "',
            'rest_api_key' => '" . $request['rest_api_key'] . "',
            'user_auth_key' => '" . $request['user_auth_key'] . "'
        );";
        if (file_put_contents('../config/onesignal.php', $data)) {
            $admin = MainSetting::find(1);
            // $admin->notify(new ForgotPassword($password));
            $admin->notification_status = $request['notification_status'];
            $admin->save();
            return "true";
        }

        return response('Somethig went wrong', 400);

    }
    public function login(Request $request)
    {

        if (!Session::has('adminName')) {
            $admin = MainSetting::where('email', '=', $request->email)->first();
            if ($admin && Hash::check($request->password, $admin['password'])) {

                $request->session()->put('adminId', $admin['id']);
                $request->session()->put('adminName', $admin['name']);
                $request->session()->put('adminEmail', $admin['email']);
                $request->session()->put('adminContect_person', $admin['contect_person']);
                $request->session()->forget('error');
                return redirect('/dashboard');

            } else {
                $response['msg'] = "Email or Password is worng";
                $response['success'] = false;
                // return  $response;
                $request->session()->put('error', "Email Or Password is wrong");
                return redirect('/');
            }
        } else {
            return redirect('/dashboard');
        }

    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
    public function newPassword(Request $request)
    {
        $request->validate([
            'password' => 'bail|required|min:8|max:50|',

        ]);
        $admin = MainSetting::find(1);
        if ($admin && Hash::check($request->old_password, $admin['password'])) {
            $admin->password = Hash::make($request->password);
            $admin->save();
            return "true";
        } else {
            return response('Same On You Old Password is wrong', 400);
        }
    }
    public function createOTP(Request $request)
    {
        $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $password = substr($string_shuffled, 1, 7);
        $admin = MainSetting::find(1);
        $admin->notify(new ForgotPassword($password));
        $admin->OTP = $password;
        $admin->save();
        $request->session()->put('msg', 'Email is sent');
        return redirect('/forgot');

    }
    public function validateOTP(Request $request)
    {
        $request->validate([
            'password' => 'bail|required|min:8|max:50|',
            'OTP' => 'bail|required|exists:salon_master,OTP',
        ]);
        $admin = MainSetting::find(1);
        $admin->OTP = null;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect('/');
    }
}
