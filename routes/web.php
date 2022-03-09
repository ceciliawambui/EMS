<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\User;


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
// Route::get('/', function () {
//     return view('auth.login');
// });


Auth::routes();
// Authentication routes
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('upload', [AuthController::class, 'upload'])->name('upload');
Route::get('edit', 'App\Http\Controllers\Auth\AuthController@edit')->name('edit');
Route::post('update', 'App\Http\Controllers\Auth\AuthController@update')->name('update');
// Route::resource('user', 'App\Http\Controllers\Auth\AuthController');

// Change Password
Route::get('change-password', 'App\Http\Controllers\ChangePasswordController@index');
Route::post('change-password', 'App\Http\Controllers\ChangePasswordController@store')->name('change.password');



Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile(not used at the moment)
Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

// Department routes
Route::resource('department', 'App\Http\Controllers\DepartmentController');
Route::post('delete-department', 'App\Http\Controllers\DepartmentController@destroy');
Route::get('department/restore/{id}', 'App\Http\Controllers\DepartmentController@restore')->name('department.restore');
Route::get('department/forceDelete/{id}', 'App\Http\Controllers\DepartmentController@forceDelete')->name('department.forceDelete');
Route::get('department/restore-all', 'App\Http\Controllers\DepartmentController@restoreAll')->name('department.restoreAll');

// Job Titles route
Route::resource('jobtitles', 'App\Http\Controllers\JobTitlesController');
Route::post('delete-jobtitle', 'App\Http\Controllers\JobTitlesController@destroy');
Route::get('jobtitles/restore/{id}', 'App\Http\Controllers\JobTitlesController@restore')->name('jobtitles.restore');
Route::get('jobtitles/forceDelete/{id}', 'App\Http\Controllers\JobTitlesController@forceDelete')->name('jobtitles.forceDelete');
Route::get('jobtitles/restore-all', 'App\Http\Controllers\JobTitlesController@restoreAll')->name('jobtitles.restoreAll');

// Employees routes
Route::resource('employees', 'App\Http\Controllers\EmployeesController');
Route::post('delete-employee', 'App\Http\Controllers\EmployeesController@destroy');
Route::get('employees/restore/{id}', 'App\Http\Controllers\EmployeesController@restore')->name('employees.restore');
Route::get('employees/forceDelete/{id}', 'App\Http\Controllers\EmployeesController@forceDelete')->name('employees.forceDelete');
Route::get('employees/restore-all', 'App\Http\Controllers\EmployeesController@restoreAll')->name('employees.restoreAll');
Route::get('employees/softDelete', 'App\Http\Controllers\EmployeesController@softDelete')->name('employees.softDelete');

// sample mailing using gmail
Route::get('send-email', function () {

    $details = [
        'title' => 'Mail from Sky Technologies',
        'body' => 'Congratulations! Welcome to Sky Technologies. '
    ];

    \Mail::to('wambuicecilia36@gmail.com')->send(new \App\Mail\NotifyMail($details));

    dd("Email is Sent.");
});


