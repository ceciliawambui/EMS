<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use Illuminate\Http\Request;

class CompanyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax()) {
            $companyUser = CompanyUser::query();
            return datatables()->of($companyUser)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedCompanyUsers){
                        $trashedCompanyUsers->onlyTrashed();
                    });
                })
                ->addColumn('action', function($companyUser) use($request) {
                    return view('company_users.action', [
                        'id' => $companyUser->id,
                        'trashed' => $request->trashed,
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('company_users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company_users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $companyUser = new CompanyUser;
        $companyUser->name = $request->name;
        $companyUser->save();
        return redirect()->route('company_users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyUser  $companyUser
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyUser $companyUser)
    {
        // return view('company_users.show', compact('companyUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyUser  $companyUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyUser $companyUser)
    {
        return view('company_users.edit', compact('companyUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyUser  $companyUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyUser $companyUser)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $companyUser->name = $request->name;
        $companyUser->save();
        return redirect()->route('company_users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyUser  $companyUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyUser $companyUser, Request $request)
    {
        $com = CompanyUser::where('id',$request->id)->delete();
        return Response()->json($com);
    }
    public function restore($id )
    {
        CompanyUser::where('id', $id)->withTrashed()->restore();

        return redirect()->route('company_users.index');
    }

    public function forceDelete($id)
    {
        CompanyUser::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('company_users.index');
    }
    private function validateInput($request) {
        $this->validate($request, [
            'name' => 'required'
    ]);
    }
}
