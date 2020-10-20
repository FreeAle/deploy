<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('test', 'AppointmentController@test');

Route::get('/', function () {
    if(!Session::has('adminName')){
    return view('login');}
    else{
         return redirect('dashboard');
    }
});
Route::get('/forgot', function () {
    return view('forgot');
});
Route::get('otp/validate', function () {
    return view('otpValidation');
});

Route::get('configration', function () {
    return view('installer');
});

Route::post('login', 'MainSettingController@login');
Route::post('/otp/validate', 'MainSettingController@validateOTP');

// Auth::routes();
Route::group(['middleware' => ['SessionCheck']], function () { 

Route::get('/password',  function () {
   return view('changePassword');
});
Route::get('user', function () {
    return view('user')->withdata(\App\User::all());
});
Route::resource('category', 'SalonCategoryController');
Route::resource('employee', 'EmployeeController');
Route::resource('category', 'SalonCategoryController');
Route::resource('service', 'ServiceController');
Route::resource('slider', 'SliderController');

//----***********************ALL GET ROUTE START IS HERE************************--------
Route::get('/appointment', 'AppointmentController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/giveOTP', 'MainSettingController@createOTP');
Route::get('/logout', 'MainSettingController@logout');
Route::get('/appointment/done/{id}', 'AppointmentController@updateAppointment');
Route::get('/appointment/cancel/{id}', 'AppointmentController@updateAppointmentCancel');
Route::get('/appointment/invoice/{id}', 'AppointmentController@InvoiceData');
// Route::get('test', 'AppointmentController@test');
Route::get('cat/bind', function () {
   //return "\App\SalonCategory::all()";
    return \App\SalonCategory::all();
});
//Route::get('/category/bind', 'SalonCategoryController@display');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/setting', 'MainSettingController@index');
Route::get('/service/employee/{id}', 'ServiceController@findEmployeeOfService');
Route::get('/employee/service/{id}', 'EmployeeController@findServiceOfEmployee');
Route::get('/time', 'AppointmentController@chkAvailability');
Route::get('/mainSetting', 'MainSettingController@index');
Route::get('/review/employee/delete/{id}', 'EmployeeReviewController@delete');
Route::get('/review', 'ServiceReviewController@fatchAllReview');
Route::get('/review/service/delete/{id}', 'ServiceReviewController@delete');
//----***********************ALL GET ROUTE END IS HERE************************--------

                    // ---___LOVE FROM CODER12895 & TEAM___---

//----***********************ALL POST ROUTE SRTART IS HERE************************--------
Route::post('service/{id}', 'ServiceController@update');
Route::post('service/employee/{id}', 'ServiceController@employeeOnService');
Route::post('employee/service/{id}', 'EmployeeController@serviceOnEmployee');
Route::post('/setting/update/{id}', 'MainSettingController@update');
Route::post('/setting/update/social/{id}', 'MainSettingController@updateSocialSetting');
Route::post('/setting/update/payment/{id}', 'MainSettingController@updatePaymentSetting');

Route::post('/setting/mail', 'MainSettingController@mailEnvUpdate');
Route::post('/setting/db', 'InstallerController@dbEnvUpdate');
Route::post('/password', 'MainSettingController@newPassword');
Route::post('/onesignal', 'MainSettingController@onePlusUpdate');
//----***********************ALL POST ROUTE END IS HERE************************--------

// Route::get('/test', 'EmployeeReviewController@test');
});