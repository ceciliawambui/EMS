<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('department', 'App\Http\Controllers\DepartmentController');
Route::post('department/search', 'App\Http\Controllers\DepartmentController@search')->name('department.search');
Route::post('delete-department', 'App\Http\Controllers\DepartmentController@destroy');

Route::resource('jobtitles', 'App\Http\Controllers\JobTitlesController');
Route::post('jobtitles/search', 'App\Http\Controllers\JobTitlesController@search')->name('jobtitles.search');
Route::post('delete-jobtitle', 'App\Http\Controllers\JobTitlesController@destroy');

Route::resource('employees', 'App\Http\Controllers\EmployeesController');
Route::post('employees/search', 'App\Http\Controllers\EmployeesController@search')->name('employees.search');
Route::post('delete-employee', 'App\Http\Controllers\EmployeesController@destroy');


Route::get('send-email', function () {
   
    $details = [
        'title' => 'Mail from Sky Technologies',
        'body' => 'Congratulations! Welcome to Sky Technologies. '
    ];
   
    \Mail::to('wambuicecilia36@gmail.com')->send(new \App\Mail\NotifyMail($details));
   
    dd("Email is Sent.");
});

// soft delete route
// Route::get("softdelete", function(){
//     Employee::find(2)->delete();
//  });

// //  get deleted record
//  Route::get("get_deleted_record", function(){
//     return Employee::onlyTrashed()->get();
//  });

// //  restore deleted data
//  Route::get("restore", function(){
//     Employee::withTrashed()->restore();
//  });

// //  force delete records
//  Route::get("forcedelete", function(){
//     Employee::withTrashed()->find(1)->forceDelete();
//  });
// Route::post('jobtitles/search', 'App\Http\Controllers\JobTitlesController@search')->name('jobtitles.search');

Route::get('employees', 'App\Http\Controllers\EmployeesController@index')->name('employees.index');
Route::delete('employees/{id}', 'App\Http\Controllers\EmployeesController@destroy')->name('employees.destroy');
Route::get('employees/restore/{id}', 'App\Http\Controllers\EmployeesController@restore')->name('employees.restore');
Route::get('employees/restore-all', 'App\Http\Controllers\EmployeesController@restoreAll')->name('employees.restoreAll');