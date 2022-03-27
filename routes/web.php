<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\auth\AuthController;
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

// Authentication routes
Auth::routes(['verify' => true]);

// Verification Routes

// Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
// Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');


Route::get('/', 'App\Http\Controllers\auth\AuthController@index')->name('login');
Route::post('post-login', 'App\Http\Controllers\auth\AuthController@postLogin')->name('login.post');
Route::get('registration', 'App\Http\Controllers\auth\AuthController@registration')->name('register');
Route::post('post-registration', 'App\Http\Controllers\auth\AuthController@postRegistration')->name('register.post');
Route::get('dashboard', 'App\Http\Controllers\auth\AuthController@dashboard');
Route::get('logout', 'App\Http\Controllers\auth\AuthController@logout')->name('logout');
// Route::get('upload', [AuthController::class, 'upload'])->name('upload');
Route::get('edit', 'App\Http\Controllers\auth\AuthController@edit')->name('edit');
Route::post('update', 'App\Http\Controllers\auth\AuthController@update')->name('update');
// Route::resource('user', 'App\Http\Controllers\Auth\AuthController');

// Change Password
Route::get('change-password', 'App\Http\Controllers\ChangePasswordController@index');
Route::post('change-password', 'App\Http\Controllers\ChangePasswordController@store')->name('change.password');



Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

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

// Companies Routes
Route::resource('companies', 'App\Http\Controllers\CompanyController');
Route::post('delete-company', 'App\Http\Controllers\CompanyController@destroy');
Route::get('companies/restore/{id}', 'App\Http\Controllers\CompanyController@restore')->name('companies.restore');
Route::get('companies/forceDelete/{id}', 'App\Http\Controllers\CompanyController@forceDelete')->name('companies.forceDelete');
Route::get('companies/restore-all', 'App\Http\Controllers\CompanyController@restoreAll')->name('companies.restoreAll');
Route::get('companies/softDelete', 'App\Http\Controllers\CompanyController@softDelete')->name('companies.softDelete');

// Company_users Routes
Route::resource('company_users', 'App\Http\Controllers\CompanyUserController');
Route::post('delete-company-users', 'App\Http\Controllers\CompanyUserController@destroy');
Route::get('company_users/restore/{id}', 'App\Http\Controllers\CompanyUserController@restore')->name('company_users.restore');
Route::get('company_users/forceDelete/{id}', 'App\Http\Controllers\CompanyUserController@forceDelete')->name('company_users.forceDelete');
Route::get('company_users/restore-all', 'App\Http\Controllers\CompanyUserController@restoreAll')->name('company_users.restoreAll');
Route::get('company_users/softDelete', 'App\Http\Controllers\CompanyUserController@softDelete')->name('company_users.softDelete');


// sample mailing using gmail
Route::get('send-email', function () {

    $details = [
        'title' => 'Mail from Sky Technologies',
        'body' => 'Congratulations! Welcome to Sky Technologies. '
    ];

    \Mail::to('wambuicecilia36@gmail.com')->send(new \App\Mail\NotifyMail($details));

    dd("Email is Sent.");
});


