<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmployeeNotification;

class EmployeesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = DB::table('employees')
        ->leftJoin('jobtitles', 'employees.job_title_id', '=', 'jobtitles.id')
        ->leftJoin('department', 'employees.department_id', '=', 'department.id')
        ->select('employees.*', 'department.department as department', 'department.id as department_id', 'jobtitles.jobtitle as jobtitle', 'jobtitles.id as job_title_id')
        ->paginate(20);
        // $employee = Employee::paginate(20);

        return view('employees/index', ['employee' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $departments = Department::all(); // get all the departments
        $jobtitles = JobTitle::all(); 
        // dd($departments); //same as var_dump
        return view('employees/create', [ 'departments' => $departments,'jobtitles' => $jobtitles]);
        // return view('employees/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {        
        $employee = Employee::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'salary' => $request['salary'],
            'job_title_id' => $request['job_title_id'],
            'department_id' => $request['department_id'],
            'email' => $request['email']
        ]);
        
        $employee->notify(new SendEmployeeNotification());

        return redirect()->intended('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $departments = Department::all(); // get all the departments
        $jobtitles = JobTitle::all(); 
        $employees = Employee::findOrFail($id);


        return view('employees/edit', [ 'departments' => $departments,'jobtitles' => $jobtitles, 'employees' => $employees]);
        // $employees = Employee::findOrFail($id);

        // return view('employees/edit', ['employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employees = Employee::findOrFail($id);
        $this->validateInput($request);
        $input = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'salary' => $request['salary'],
            'job_title_id' => $request['job_title_id'],
            'department_id' => $request['department_id'],
            'email' => $request['email']
        ];
        Employee::where('id', $id)
            ->update($input);
        
        return redirect()->intended('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id', $id)->delete();
         return redirect()->intended('employees');
    }

    /**
     * Search department from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'first_name' => $request['first_name']
            ];

       $departments = $this->doSearchingQuery($constraints);
       return view('employees/index', ['employee' => $employee, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = employees::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(20);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'job_title_id' => 'required',
        'department_id' => 'required',
        'salary' => 'required'

    ]);
    }
}
