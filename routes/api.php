<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes();

Route::middleware('auth:api')->get('', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'user'], function () {
     Route::group(['middleware' => ['auth:api']], function () {
        Route::get('/test/{id}', function (Request $request) {
            Hash::make($id);
        });
    Route::get('/category', 'SalonCategoryController@index');
    Route::get('/employee', 'EmployeeController@index');
    Route::get('/service', 'ServiceController@index');
    Route::get('/mybookings', 'AppointmentController@index');
    Route::get('/favorite/employee/{id}', 'UserController@userFevStylist');
    Route::get('/favorite/service/{id}', 'UserController@userFevService');
    Route::get('/slider', 'SliderController@index');



    Route::post('/employee', 'EmployeeController@getOneEmployee');
    Route::post('/appointment/checkavailability', 'AppointmentController@chkAvailability');
    Route::post('/appointment/book', 'AppointmentController@bookAppointment');
    Route::post('/stripe', 'AppointmentController@paymentWithStripe');
    Route::post('/update', 'UserController@update');
    Route::post('/review/service', 'ServiceReviewController@store');
    Route::post('/review/employee', 'EmployeeReviewController@store');
    Route::post('/update/image', 'UserController@imageUPD');
     });
});

Route::get('/main', 'MainSettingController@index');
Route::post('/register', 'UserController@newUser');
Route::post('/login', 'UserController@login');
Route::post('/forgot/verify', 'UserController@VerifyEmail');
Route::post('/forgot', 'UserController@forgotReq');
Route::post('/verify', 'UserController@VerifyEmail');
Route::post('/sendagain', 'UserController@forgotReq');

