<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentController extends Controller
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
    public function index(Request $request){
        if(request()->ajax()) {
            $departments = Department::query();
            return datatables()->of($departments)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedDepartments){
                        $trashedDepartments->onlyTrashed();
                    });
                })
                ->addColumn('action', function($departments) use($request) {
                    return view('department.action', [
                        'id' => $departments->id,
                        'trashed' => $request->trashed,
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }


        return view('department.index');
    }

    public function restore($id )
    {
        // Employee::withTrashed()->find($id)->restore();
        Department::where('id', $id)->withTrashed()->restore();

        return redirect()->route('department.index');
    }
    public function forceDelete($id)
    {
        Department::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('department.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $request->validate([
            'department_no' => 'required',
            'name' => 'required',
        ]);
        $departments = new Department;
        $departments->department_no = $request->department_no;
        $departments->name = $request->name;
        $departments->save();
        return redirect()->route('department.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $departments){
        return view('department.show',compact('departments'));
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

    public function edit(Department $department){
        return view('department.edit',compact('department'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'department_no' => 'required',
            'name' => 'required',
        ]);
        $departments = Department::find($id);
        $departments->department_no = $request->department_no;
        $departments->name = $request->name;
        $departments->save();
        return redirect()->route('department.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request){
        $com = Department::where('id',$request->id)->delete();
        return Response()->json($com);

    }

    /**
     * Search department from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    // public function search(Request $request) {
    //     $constraints = [
    //         'name' => $request['name']
    //         ];

    //    $departments = $this->doSearchingQuery($constraints);
    //    return view('department/index', ['departments' => $departments, 'searchingVals' => $constraints]);
    // }

    // private function doSearchingQuery($constraints) {
    //     $query = department::query();
    //     $fields = array_keys($constraints);
    //     $index = 0;
    //     foreach ($constraints as $constraint) {
    //         if ($constraint != null) {
    //             $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
    //         }

    //         $index++;
    //     }
    //     return $query->paginate(20);
    // }
    private function validateInput($request) {
        $this->validate($request, [
            'department_no' => 'required',
            'name' => 'required'
    ]);
    }
}
