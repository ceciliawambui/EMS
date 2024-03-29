<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\JobTitle;
use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use DB;
use SoftDeletes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countEmployees = Employee::withoutTrashed()->count();
        $countDepartment =Department::withoutTrashed()->count();
        $countJobTitles = JobTitle::withoutTrashed()->count();
        $countCompanies= Company::withoutTrashed()->count();
        $countCompanyusers = CompanyUser::withoutTrashed()->count();

        return view('home', compact('countEmployees', 'countDepartment', 'countJobTitles', 'countCompanies', 'countCompanyusers'));
    }


}
