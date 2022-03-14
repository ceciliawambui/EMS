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
                        $trashedEmployees->onlyTrashed();
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
                        'trashed' => $request->trashed,

                    ]);

                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('employees.index');
    }
    public function restore($id )
    {
        Employee::where('id', $id)->withTrashed()->restore();

        return redirect()->route('employees.index');
    }
    public function forceDelete($id)
    {
        Employee::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('employees.index');
    }
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
        return view('employees/create', [ 'departments' => $departments,'jobtitles' => $jobtitles]);
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
        'nssf' => 'required|numeric',
        'nhif' => 'required|numeric',
        'kra_pin' => 'required',
        'account_number' => 'required|numeric',
        'bank' => 'required',
        'salary' => 'required|numeric',
        'job_title_id' => 'required',
        'department_id' => 'required'
        ]);
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->nssf = $request->nssf;
        $employee->nhif = $request->nhif;
        $employee->kra_pin = $request->kra_pin;
        $employee->account_number = $request->account_number;
        $employee->bank = $request->bank;
        $employee->salary = $request->salary;
        $employee->job_title_id = $request->job_title_id;
        $employee->department_id = $request->department_id;
        $employee->save();
        return redirect()->route('employees.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee){
        return view('employees.show',compact('employee'));
    }

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
            'nssf' => 'required|numeric',
            'nhif' => 'required|numeric',
            'kra_pin' => 'required',
            'account_number' => 'required|numeric',
            'bank' => 'required',
            'salary' => 'required|numeric',
            'job_title_id' => 'required',
            'department_id' => 'required'
        ]);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->nssf = $request->nssf;
        $employee->nhif = $request->nhif;
        $employee->kra_pin = $request->kra_pin;
        $employee->account_number = $request->account_number;
        $employee->bank = $request->bank;
        $employee->salary = $request->salary;
        $employee->job_title_id = $request->job_title_id;
        $employee->department_id = $request->department_id;
        $employee->save();

        return redirect()->route('employees.index');

    }


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

    /**
     * Search employee from database base on some specific constraints
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
            'nssf' => 'required|numeric',
            'nhif' => 'required|numeric',
            'kra_pin' => 'required',
            'account_number' => 'required|numeric',
            'bank' => 'required',
            'salary' => 'required|numeric',
            'job_title_id' => 'required',
            'department_id' => 'required'

    ]);
    }
}
