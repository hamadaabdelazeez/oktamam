<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Storage;
use App\Company;

class Employees extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('Employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id');
        return view('Employees.create',compact('companies'));
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
            'first_name'    => 'required',
            'last_name'     => 'required',
            'company_id'    => 'required|exists:companies,id',
            'email'         => 'nullable|email|unique:employees,email',
            'phone'         => 'nullable|digits:11',


        ]);
        $employee     = Employee::create($request->all());
        return redirect()->route('employees.index')->with('success','employee created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $companies = Company::pluck('name','id');
        return view('Employees.show',compact('employee','companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
         $companies = Company::pluck('name','id');
        return view('Employees.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {

        $request->validate(
        [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'company_id'    => 'required|exists:companies,id',
            'email'         => "nullable|email|unique:employees,email,{$employee->id}",
            'phone'         => 'nullable|digits:11',

        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success','employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success','employee deleted successfully');
    }
}
