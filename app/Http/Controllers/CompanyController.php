<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax()) {
            $company = Company::with(['companyUser']);
            return datatables()->of($company)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedCompanies){
                        $trashedCompanies->onlyTrashed();
                    });
                })
                ->editColumn('company_user', function($companyUser){
                    return $companyUser->companyUser?->name ?? "NA";
                })
                ->addColumn('action', function($company) use($request) {
                    return view('companies.action', [
                        'id' => $company->id,
                        'trashed' => $request->trashed,
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('companies.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyusers = CompanyUser::all(); // get all the company users
        return view('companies.create', [ 'companyusers' => $companyusers]);

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
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|unique:companies',
            'address' => 'required|numeric',
            'location' => 'required',
            'contact_person' => 'required',
            'company_user_id' => 'required',
        ]);
        $company = new Company;
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->location = $request->location;
        $company->contact_person = $request->contact_person;
        $company->company_user_id = $request->company_user_id;
        $company->save();
        return redirect()->route('companies.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $companyusers = CompanyUser::all(); // get all the company users
        return view('companies.edit',compact('company', 'companyusers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required',
            'address' => 'required|numeric',
            'location' => 'required',
            'contact_person' => 'required',
            'company_user_id' => 'required',
        ]);
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->location = $request->location;
        $company->contact_person = $request->contact_person;
        $company->company_user_id = $request->company_user_id;
        $company->save();
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Request $request)
    {
        $com = Company::where('id',$request->id)->delete();
        return Response()->json($com);

    }

    public function restore($id )
    {
        Company::where('id', $id)->withTrashed()->restore();

        return redirect()->route('companies.index');
    }

    public function forceDelete($id)
    {
        Company::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('companies.index');
    }

    // public function restoreAll()
    // {
    //     Company::onlyTrashed()->restore();

    //     return redirect()->route('companies.index')->withSuccess(__('All Companies restored successfully.'));
    // }

    private function validateInput($request) {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|unique:companies',
            'address' => 'required|numeric',
            'location' => 'required',
            'contact_person' => 'required',
            'company_user_id' => 'required',
    ]);
}

}
