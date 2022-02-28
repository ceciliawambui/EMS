<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    public function index(Request $request)
    {
        if(request()->ajax()) {
            $employees = Employee::with(['department', 'jobTitle']);

            return datatables()->of($employees)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedEmployees){
                        $trashedEmployees->withTrashed();
                    });
                })
                ->editColumn('job_title', function($employee){
                    return $employee->jobTitle?->name ?? "NA";
                })
                ->editColumn('department', function($employee){
                    return $employee->department?->name ?? "NA";
                })
                ->addColumn('action', function($employee) use($request) {
                    return view('employees.action', [
                        'id' => $employee->id,
                        'trashed' => $request->trashed
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('employees.index');
    }
    public function archive(){
        // $employees = Employee::latest();

        // if($this->get('status') == 'archived') {
        //     $employees = $employees->onlyTrashed();
        // }

        if(request()->ajax()) {
            
            $employees = Employee::with(['department', 'jobTitle']);
            // get only trashed
            if ($request->has('trashed')) {
                $employees = Post::onlyTrashed()
                    ->get();
            } else {
                $employees = Employee::get();
            }

            // $employees = Employee::onlyTrashed()->get();

            return datatables()->of($employees)
                ->editColumn('job_title', function($employee){
                    return $employee->jobTitle?->name ?? "NA";
                })
                ->editColumn('department', function($employee){
                    return $employee->department?->name ?? "NA";
                })
                ->addColumn('action', 'employees.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('employees.archive');
    }
    public function restore($id) 
    {
        Employee::where('id', $id)->withTrashed()->restore();

        return redirect()->route('employees.index');
    }
    // public function forceDelete($id) 
    // {
    //     Employee::where('id', $id)->withTrashed()->forceDelete();

    //     return redirect()->route('employees.index', ['status' => 'archived'])
    //         ->withSuccess(__('Employee force deleted successfully.'));
    // }
    public function restoreAll() 
    {
        Employee::onlyTrashed()->restore();

        return redirect()->route('employees.index')->withSuccess(__('All employees restored successfully.'));
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
    public function store(Request $request){
        $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'salary' => 'required',
        'job_title_id' => 'required',
        'department_id' => 'required'
        ]);
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->salary = $request->salary;
        $employee->job_title_id = $request->job_title_id;
        $employee->department_id = $request->department_id;
        // $company->email = $request->email;
        // $company->address = $request->address;
        $employee->save();
        return redirect()->route('employees.index');
        // ->with('success','Employee has been created successfully.');
    }
    // public function store(EmployeeRequest $request)
    // {        
    //     $employee = Employee::create([
    //         'first_name' => $request['first_name'],
    //         'last_name' => $request['last_name'],
    //         'salary' => $request['salary'],
    //         'job_title_id' => $request['job_title_id'],
    //         'department_id' => $request['department_id'],
    //         'email' => $request['email']
    //     ]);
        
    //     $employee->notify(new SendEmployeeNotification());

    //     return redirect()->intended('employees');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee){
        return view('employees.show',compact('employee'));
    } 
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee){
        $departments = Department::all();
        $jobtitles = JobTitle::all(); 
        return view('employees.edit',compact('employee','departments', 'jobtitles'));
    }
    // public function edit($id)
    // {
        
    //     $departments = Department::all(); // get all the departments
    //     $jobtitles = JobTitle::all(); 
    //     $employees = Employee::findOrFail($id);


    //     return view('employees/edit', [ 'departments' => $departments,'jobtitles' => $jobtitles, 'employees' => $employees]);
    //     // $employees = Employee::findOrFail($id);

    //     // return view('employees/edit', ['employees' => $employees]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Employee $employee){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'salary' => 'required',
            'job_title_id' => 'required',
            'department_id' => 'required'
        ]);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->salary = $request->salary;
        $employee->job_title_id = $request->job_title_id;
        $employee->department_id = $request->department_id;
        $employee->save();

        return redirect()->route('employees.index');
        // ->with('success','Employee has been updated successfully.');
    }

    // public function update(Request $request, $id)
    // {
    //     $employees = Employee::findOrFail($id);
    //     $this->validateInput($request);
    //     $input = [
    //         'first_name' => $request['first_name'],
    //         'last_name' => $request['last_name'],
    //         'salary' => $request['salary'],
    //         'job_title_id' => $request['job_title_id'],
    //         'department_id' => $request['department_id'],
    //         'email' => $request['email']
    //     ];
    //     Employee::where('id', $id)
    //         ->update($input);
        
    //     return redirect()->intended('employees');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $com = Employee::where('id',$request->id)->delete();
        return Response()->json($com);
        
    }

    // public function destroy($id)
    // {
    //     Employee::where('id', $id)->delete();
    //      return redirect()->intended('employees');
    // }

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
