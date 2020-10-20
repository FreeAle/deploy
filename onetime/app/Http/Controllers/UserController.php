<?php

namespace App\Http\Controllers;

use App\Notifications\UserOTP;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function newUser(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'email' => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|min:8|max:255|',
            'mobile_no' => 'bail|required|unique:users,mobile_no',
            'verify' => 'bail|required|',
        ]);
        $all = $request->all();
        $reqData['image'] = "default.jpg";

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_no' => $request->mobile_no,
            'device_token' => $request->device_token,
            'verify' => $request->verify,
            'image' => 'default.jpg',

        ]);
        $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $password = substr($string_shuffled, 1, 7);
        $user = User::Where('email', '=', $request->email)->first();
        try {
            $user->notify(new UserOTP($password));

        } catch (\Exception $e) {

        }

        $user->OTP = $password;
        $user->save();
        // $request->session()->put('msg', 'Email is sent');

        $responce = array();
        $responce['msg'] = "Please Your Verify Your Email...";
        $responce['status'] = true;
        return $responce;
    }
    public function login(Request $request)
    {
        if ($request->provider == "google") {
            $user = User::where('google_token', '=', $request->provider_id)->first();
        } else if ($request->provider == "facebook") {
            $user = User::where('facebook_token', '=', $request->provider_id)->first();
        } else {
            $detail = array(
                "email" => $request->email,
            );
            $user = User::where($detail)->first();
            if ($user && Hash::check($request->password, $user['password'])) {
                if ($user['verify'] == '0') {
                    // $response['token'] = $user->createToken('Happytrimming')->accessToken;
                    // $response['data'] = $user;
                    $response['msg'] = "Please Your Verify Your Email...";
                    $response['success'] = true;
                    return $response;
                }
                $responce = array();
                $response['token'] = $user->createToken('Happytrimming')->accessToken;
                $response['data'] = $user;
                $response['msg'] = "You are now login!!!";

                $response['success'] = true;
                if ($user->device_token != $request->device_token) {
                    $user->device_token = $request->device_token;
                    $user->save();
                }
                return $response;
                // return response()->json(['success' => $success], 200);
            } else {
                $response['msg'] = "Email or Password is worng";
                $response['success'] = false;
                return $response;
            }
        }
        if ($user) {

            $responce = array();
            $response['token'] = $user->createToken('Happytrimming')->accessToken;
            $response['data'] = $user;
            $response['msg'] = "You are now login!!!";
            $response['success'] = true;
            if ($user->device_token != $request->device_token) {
                $user->device_token = $request->device_token;
                $user->save();
            }
            return $response;
        } else {
            if ($request->provider == "facebook" || $request->provider == "google") {
                $request->validate([
                    'name' => 'bail|required',
                    'email' => 'bail|required|email|unique:users,email',
                    'password' => 'bail|required|min:8|max:255|',
                    //'mobile_no' => 'bail|required|unique:users,mobile_no',
                    'provider' => 'bail|required|',
                ]);
                if ($request->provider == "facebook") {
                    User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'mobile_no' => $request->mobile_no,
                        'facebook_token' => $request->facebook_token,
                        'device_token' => $request->device_token,
                        'verify' => $request->verify,
                        'image' => 'default.jpg',

                    ]);
                    $user = User::where('facebook_token', '=', $request->provider_id)->first();
                } else {
                    User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'mobile_no' => $request->mobile_no,
                        'google_token' => $request->google_token,
                        'device_token' => $request->device_token,
                        'verify' => $request->verify,
                        'image' => 'default.jpg',

                    ]);
                }
                $user = User::where('google_token', '=', $request->provider_id)->first();
            }
            $responce = array();
            $response['token'] = $user->createToken('Happytrimming')->accessToken;
            $response['data'] = $user;
            $response['msg'] = "You are now login!!!";
            $response['success'] = true;
            return $response;
        }
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'gender' => 'bail|required|',
        ]);
        if (User::findOrfail($request->user()->id)
            ->update($request->all())) {
            $responce = array();
            $response['data'] = User::findOrfail($request->user()->id);
            $response['msg'] = "Profile is updated";
            $response['success'] = true;
            return $response;
        }
    }
    public function userFevStylist(Request $request, $id)
    {
        $data = User::findOrfail($request->user()->id);
        $temp = $data['fev_stylist'];
        $oldfev = explode(",", $data['fev_stylist']);
        if (in_array($id, $oldfev)) {
            $temp = str_replace($id, "", $data['fev_stylist']);
            $temp = ltrim($temp, ',');
            $temp = rtrim($temp, ',');
            $temp = str_replace(",,", ",", $temp);
            $data->fev_stylist = $temp;
            $data->save();
        } else {
            $temp = $data['fev_stylist'] . ',' . $id;
            $temp = ltrim($temp, ',');
            $temp = rtrim($temp, ',');
            $temp = str_replace(",,", ",", $temp);
            $data->fev_stylist = $temp;
            $data->save();
        }
        $responce = array();
        $response['data'] = User::findOrfail($request->user()->id);
        $response['msg'] = "Choise is yours!!";
        $response['success'] = true;
        return $response;
    }
    public function userFevService(Request $request, $id)
    {
        $temp = '';
        $data = User::findOrfail($request->user()->id);
        $temp = $data['fev_service'];
        $oldfev = explode(",", $data['fev_service']);
        if (in_array($id, $oldfev)) {
            $temp = str_replace($id, "", $data['fev_service']);
            $temp = ltrim($temp, ',');
            $temp = rtrim($temp, ',');
            $temp = str_replace(",,", ",", $temp);

            $data->fev_service = $temp;
            $data->save();
        } else {
            $temp = $data['fev_service'] . ',' . $id;
            $temp = ltrim($temp, ',');
            $temp = rtrim($temp, ',');
            $temp = str_replace(",,", ",", $temp);
            $data->fev_service = $temp;
            $data->save();
        }
        $responce = array();
        $response['data'] = User::findOrfail($request->user()->id);
        $response['msg'] = "Choise is yours!!";
        $response['success'] = true;
        return $response;
    }
    public function imageUPD(Request $request)
    {
        $img = $request->image;
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $Iname = uniqid();
        $file = public_path('/uploadedimages/') . $Iname . ".png";
        $success = file_put_contents($file, $data);
        $update = User::findOrFail($request->user()->id);
        $update['image'] = $Iname . ".png";
        $update->save();
        $responce = array();
        $response['data'] = User::findOrfail($request->user()->id);
        $response['msg'] = "Profile Picture is Updated!!";
        $response['success'] = true;
        return $response;

    }
    public function VerifyEmail(Request $request)
    {
        if ($request->dvp == 'forgot') {
            $request->validate([
                'OTP' => 'bail|required|min:5',
                'password' => 'bail|required|min:8|max:255|',

            ]);
            $user = User::where([['OTP', '=', $request['OTP']], ['email', '=', $request['email']]])->first();
            if ($user) {
                $user->OTP = null;
                $user->password = Hash::make($request->password);
                $user->save();
                $response['msg'] = "Password is Change ";
                $response['success'] = true;
                return $response;
            } else {
                $response['msg'] = "OTP or EMAIL is wrong";
                $response['success'] = false;
                return $response;
            }
        }
        $request->validate([
            'OTP' => 'bail|required|min:5',
        ]);
        $user = User::where([['verify', '=', '0'], ['email', '=', $request['email']]])->first();

        if ($user && $user['OTP'] == $request['OTP']) {
            $user->OTP = null;
            $user->verify = '1';
            $user->save();
            $responce = array();
            $response['msg'] = "You are now verfied ";
            $response['success'] = true;
            return $response;
        } else {
            if (User::where([['verify', '=', '1'], ['email', '=', $request['email']]])->first()) {
                $response['msg'] = "You are already verfied ";
                $response['success'] = true;
                return $response;
            }
            $response['msg'] = "OTP or EMAIL is wrong";
            $response['success'] = false;
            return $response;
        }

    }
    public function forgotReq(Request $request)
    {
        $request->validate([

            'email' => 'bail|required|email',

        ]);
        $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $user = User::Where('email', '=', $request->email)->first();

        $string_shuffled = str_shuffle($string);
        $password = substr($string_shuffled, 1, 7);

        if ($user) {

            $user->OTP = $password;
            $user->save();
            try {
                $user->notify(new UserOTP($password));

            } catch (\Exception $e) {

            }

            $responce = array();
            //  $response['data'] = User::findOrfail($request->user()->id);
            $response['msg'] = "OTP send to register EMAIL";
            $response['success'] = true;
            return $response;
        } else {
            $response['msg'] = "Something Went Wrong!!!";
            $response['success'] = true;
            return $response;
        }
    }

}
