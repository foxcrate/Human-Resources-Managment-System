<?php

use Illuminate\Support\Facades\Route;

use App\Mail\elBaz;
use App\Models\Worker;
use App\Models\User;

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

Route::get('/addNewUser',"HomeController@addNewUser");
Route::post('/addNewUser',"HomeController@addNewUserPOST");

Auth::routes();
//['register' => false]

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('login', [App\Http\Controllers\auth\LoginController::class, 'login'])->name('login');

Route::get('/users',"HomeController@users");

Route::get('/test',"HomeController@test");

Route::get('/access',"HomeController@access");
Route::get('/access/Details/{id}',"HomeController@accessDetails");
Route::get('/access/toAddPermission',"HomeController@toAddPermission");
Route::post('/access/addNewAccess',"HomeController@addNewAccess");
Route::get('/roles/deleteFunction/{permissionName}/{function}',"HomeController@deleteFunctionFromPermission")->name('deletef');
Route::get('/access/toAddFunction/{permissionName}',"HomeController@toAddFunction");
Route::post('/access/addFunction/{id}',"HomeController@addFunction");
Route::get('//access/Remove/{permissionName}',"HomeController@removePermission");

Route::get('/roles',"HomeController@roles");
Route::get('/roles/Details/{id}',"HomeController@rolesDetails");
Route::get('/roles/toAddRole',"HomeController@toAddRole");
Route::post('/roles/addNewRole',"HomeController@addNewRole");
Route::get('/roles/addPermission/{id}',"HomeController@addPermissionToRole");
Route::post('/roles/addPermission/{id}',"HomeController@addPermissionToRolePost");
Route::get('/roles/deletePermission/{permissionName}/{roleID}',"HomeController@deletePermissionFromRole")->name('deleteP');
Route::get('/roles/Remove/{id}',"HomeController@removeRole");

Route::get('/addRoleToUser/{id}',"HomeController@addRoleToUser");
Route::post('/users/addRoleToUser/{id}',"HomeController@addRoleToUser2");

Route::get('/password',"HomeController@changePassword");
Route::get('/changePasswordForUser/{id}',"HomeController@changePasswordForUser");
Route::post('/changePasswordForUser/{id}',"HomeController@changePasswordForUserPOST");

/* Route::get('/', function () {
    return view('welcome');
}); */

/*Route::group(['middleware'=>'auth'],function(){

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

});*/

Route::get('/index',"WorkerController@index");
Route::get('/web',"WorkerController@web");
Route::get('/andriod',"WorkerController@andriod");
Route::get('/hr',"WorkerController@hr");
Route::get('/lw',"WorkerController@lw");

Route::get('/',"WorkerController@dashboard");

Route::get('/edit/{id}',"WorkerController@edit");

Route::get('/excel',"WorkerController@excel");
Route::get('/word',"WorkerController@word");
Route::get('/pdf',"WorkerController@pdf");

Route::get('/show/{id}',"WorkerController@show");
Route::get('/show/salaryDetails/{id}',"WorkerController@salaryDetails");

Route::get('/create',"WorkerController@create");

Route::get('/dashboard',"WorkerController@dashboard");
Route::get('/todaySalaries',"WorkerController@todaySalaries");

Route::get('/workerAttend/{id}',"WorkerController@workerAttend");
Route::get('/workerLeave/{id}',"WorkerController@workerLeave");

Route::post('/store',"WorkerController@store");

Route::post('/update/{id}',"WorkerController@update");

Route::get('/delete/{id}',"WorkerController@delete");

Route::post('/search',"WorkerController@search");

Route::get('/attend',"WorkerController@attend");
Route::get('/addAttend/{id}',"WorkerController@addAttend");
Route::get('/addLeave/{id}',"WorkerController@addLeave");
Route::get('/attendanceDetails',"WorkerController@attendanceDetails");

Route::get('/toStatistics',"WorkerController@toStatistics");
Route::post('/statisticsDetails',"WorkerController@statisticsDetails");
Route::get('/toSingleStatistics',"WorkerController@toSingleStatistics");
Route::post('/singleStatisticsDetails',"WorkerController@singleStatisticsDetails");

Route::post('/changeAttendance55',"WorkerController@changeAttendance55")->name('changeAttendance55');
Route::post('/changeAttendance/{workerID}/{attendanceID}',"WorkerController@changeAttendance")->name('changeAttendance');
Route::get('/changeAttendance2/{fromDate}',"WorkerController@changeAttendance2");


Route::get('/bst',"WorkerController@attendbst");

/*Route::get('/email',function(){
    $id=1;
    Mail::to('ahmedmustafa.pro19@gmail.com')->send(new elBaz('printSalaryDetails',$id));
    //return new elBaz();
});*/

Route::get('/toCompanyMail',"WorkerController@toCompanyMail");
Route::post('/companyMail',"WorkerController@companyMail");

Route::get('/emailSalaryDetails',"WorkerController@emailSalaryDetailsGet");
Route::get('/printSalaryDetails/{id}',"WorkerController@pdf2");
//Route::get('/emailSalaryDetails/{id}',"WorkerController@emailSalaryDetails");
Route::get('/emailSalaryDetails/{id}',function($id){
    $worker1=Worker::find($id);
    $admin=User::find(2);
    //dd($admin);
    //dd($admin->emailPassword);
    $email='ahmedfocus19@gmail.com';
    $password='bsbsnaw123456789';
    config(['mail.mailers.smtp.username'=>$admin->email]);
    config(['mail.mailers.smtp.password'=>$admin->emailPassword]);
    Mail::to($worker1->email)->send(new elBaz('printSalaryDetails',$id));
    return redirect()->back();
});

Route::get('/nexmo',"NexmoController@show")->name('nexmo');
Route::post('/nexmo',"NexmoController@verify")->name('nexmo');