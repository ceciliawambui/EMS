<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobTitlesController extends Controller
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
            $jobtitle = JobTitle::query();
            return datatables()->of($jobtitle)
            ->filter(function($query) use($request){
                $query->when($request->trashed == 1, function($trashedJobtitles){
                    $trashedJobtitles->onlyTrashed();
                });
            })
            ->addColumn('action', function($jobtitle) use($request) {
                return view('jobtitles.action', [
                    'id' => $jobtitle->id,
                    'trashed' => $request->trashed,
                ]);

            })
        
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            }
        return view('jobtitles.index');
    }
    // public function index()
    // {
    //     // return view('jobtitles.index', [
    //     //     'jobtitles' => DB::table('jobtitles')->paginate(5)
    //     // ]);
    //     // $jobs = JobTitle::paginate(20);

    //     return view('jobtitles/index', ['jobs' => $jobs]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobtitles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
        'name' => 'required',
        // 'email' => 'required',
        // 'address' => 'required'
        ]);
        $jobtitle = new JobTitle;
        $jobtitle->name = $request->name;
        // $company->email = $request->email;
        // $company->address = $request->address;
        $jobtitle->save();
        return redirect()->route('jobtitles.index');
        // ->with('success','Job Title has been created successfully.');
    }
    // public function store(Request $request)
    // {
    //     $this->validateInput($request);
    //      JobTitle::create([
    //         'name' => $request['name']
    //     ]);

    //     return redirect()->intended('jobtitles');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }
    public function show(JobTitle $jobtitle){
        return view('jobtitles.show',compact('jobtitle'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JobTitle $jobtitle){
        return view('jobtitles.edit',compact('jobtitle'));
    }
    // public function edit($id)
    // {
    //     $jobtitles = JobTitle::findOrFail($id);

    //     return view('jobtitles/edit', ['jobtitles' => $jobtitles]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
        'name' => 'required',
        // 'email' => 'required',
        // 'address' => 'required'
        ]);
        $jobtitle = JobTitle::find($id);
        $jobtitle->name = $request->name;
        // $company->email = $request->email;
        // $company->address = $request->address;
        $jobtitle->save();
        return redirect()->route('jobtitles.index');
        // ->with('success','Job Title Has Been updated successfully');
    }
    // public function update(Request $request, $id)
    // {
    //     $jobtitles = JobTitle::findOrFail($id);
    //     $this->validateInput($request);
    //     $input = [
    //         'name' => $request['name']
    //     ];
    //     JobTitle::where('id', $id)
    //         ->update($input);
        
    //     return redirect()->intended('jobtitles');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request){
        $com = JobTitle::where('id',$request->id)->delete();
        return Response()->json($com);
        
    }
    // public function destroy($id)
    // {
    //     JobTitle::where('id', $id)->delete();
    //     return redirect()->intended('jobtitles');
    // }

    /**
     * Search department from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $jobs = $this->doSearchingQuery($constraints);
       return view('jobtitles/index', ['jobs' => $jobs, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = name::query();
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
        'name' => 'required|max:60|unique:jobtitles'
    ]);
    }
}