<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Storage;

class Companies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with('employees')->paginate(10);
        return view('Companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'name'      => 'required',
            'email'     => 'nullable|email|unique:companies,email',
            'website'   => 'nullable|active_url',
            'logo'      => 'nullable|image|mimes:jpeg,jpg,png,gif|dimensions:min_width=100,min_height=200',

        ]);
        if (!empty($request->logo)) {
          $request->merge(
            ['logo' => Storage::disk('local')->put('/public', $request->logo)]
            );
        }
        $company     = Company::create($request->request->all());
        return redirect()->route('companies.index')->with('success','company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('Companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
       return view('Companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate(
        [
            'name'      => 'required',
            'email'     => "nullable|email|unique:companies,email,{$company->id}",
            'website'   => 'nullable|active_url',
            'logo'      => 'nullable|mimes:jpeg,jpg,png,gif|image|dimensions:min_width=100,min_height=100'
        ]);
        if (!empty($request->logo)) {
          $request->merge(
            ['logo' => Storage::disk('local')->put('/public', $request->logo)]
            );
        }  
       $company->update($request->request->all());
        return redirect()->route('companies.index')->with('success','company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success','company deleted successfully');
    }
}
