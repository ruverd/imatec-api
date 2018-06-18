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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('access_token', 'Api\AuthController@accessToken')->name('access_token');
Route::post('refresh_token', 'Api\AuthController@refreshToken')->name('refresh_token');

//List Organizations
// Route::get('organizations','OrganizationController@index'); //get all
// Route::get('organization/{id}','OrganizationController@show'); //get a single
// Route::post('organization','OrganizationController@store'); //create
// Route::put('organization','OrganizationController@store'); //update
// Route::delete('organization/{id}','OrganizationController@destroy'); //delete

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('user', function () {
        return Auth::guard('api')->user();
    })->name('user');

    Route::get('acl', 'AclController@index')->name('acl');
    Route::get('organizations','OrganizationController@index'); //get all
    Route::get('organization/{id}','OrganizationController@show'); //get a single
    Route::post('organization','OrganizationController@store'); //create
    Route::put('organization','OrganizationController@store'); //update
    Route::delete('organization/{id}','OrganizationController@destroy'); //delete
});
