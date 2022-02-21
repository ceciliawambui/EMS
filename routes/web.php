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

Route::resource('jobtitles', 'App\Http\Controllers\JobTitlesController');
Route::post('jobtitles/search', 'App\Http\Controllers\JobTitlesController@search')->name('jobtitles.search');

Route::resource('employees', 'App\Http\Controllers\EmployeesController');
Route::post('employees/search', 'App\Http\Controllers\EmployeesController@search')->name('employees.search');


Route::get('send-email', function () {
   
    $details = [
        'title' => 'Mail from Sky Technologies',
        'body' => 'Congratulations! Welcome to Sky Technologies. '
    ];
   
    \Mail::to('wambuicecilia36@gmail.com')->send(new \App\Mail\NotifyMail($details));
   
    dd("Email is Sent.");
});