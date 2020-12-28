<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

//Route::post('login/custom', [App\Http\Controllers\auth\LoginController2::class, 'login'])->name('login.custom');
Route::post('login', [App\Http\Controllers\auth\LoginController::class, 'login'])->name('login');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/home',function(){
        return view('home');
    })->name('home');

    Route::get('/w2/{userType}',function($userType='0'){
        if($userType==1){
            return view('home');
        }
        if($userType==5){
            return redirect()->route('w');
        }
    
    })->name('w2');

});

//Route::post('/jsonReg','WorkerController@jsonRegPost');
//Route::get('/jsonReg','WorkerController@jsonRegGet');
Route::get('/users',"HomeController@users");

Route::get('/',"WorkerController@index")->name('w');

Route::get('/edit/{id}',"WorkerController@edit");

Route::get('/test',"HomeController@test");

Route::get('/excel',"WorkerController@excel");
Route::get('/word',"WorkerController@word");
Route::get('/pdf',"WorkerController@pdf");

Route::get('/show/{id}',"WorkerController@show");
Route::get('/show/salaryDetails/{id}',"WorkerController@salaryDetails");

Route::get('/create',"WorkerController@create");

Route::get('/dashboard',"WorkerController@dashboard");

//Route::get('/showAccess',"WorkerController@showAccess");
//Route::post('/saveAccess/{id}',"WorkerController@saveAccess");


Route::get('/access',"HomeController@access");
Route::get('/access/Details/{id}',"HomeController@accessDetails");
Route::get('/access/toAdd',"HomeController@toAdd");
Route::post('/access/addNewAccess',"HomeController@addNewAccess");
Route::get('/roles/deleteFunction/{permissionName}/{function}',"HomeController@deleteFunctionFromPermission")->name('deletef');
Route::get('/access/toAddFunction/{permissionName}',"HomeController@toAddFunction");
Route::post('/access/addFunction',"HomeController@addFunction");
Route::get('//access/Remove/{permissionName}',"HomeController@removePermission");

Route::get('/roles',"HomeController@roles");
Route::get('/roles/Details/{id}',"HomeController@rolesDetails");
Route::get('/roles/toAdd2',"HomeController@toAdd2");
Route::post('/roles/addNewRole',"HomeController@addNewRole");
Route::get('/roles/addPermission/{id}',"HomeController@addPermissionToRole");
Route::post('/roles/addPermission/{id}',"HomeController@addPermissionToRolePost");
Route::get('/roles/deletePermission/{permissionName}/{roleID}',"HomeController@deletePermissionFromRole")->name('deleteP');
Route::get('/roles/Remove/{id}',"HomeController@removeRole");

Route::get('/addRoleToUser/{id}',"HomeController@addRoleToUser");
Route::post('/users/addRoleToUser/{id}',"HomeController@addRoleToUser2");

Route::post('/store',"WorkerController@store");

Route::post('/update/{id}',"WorkerController@update");

Route::get('/delete/{id}',"WorkerController@delete");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cs',"WorkerController@cs");
Route::get('/it',"WorkerController@it");
Route::get('/hr',"WorkerController@hr");

Route::post('/search',"WorkerController@search");