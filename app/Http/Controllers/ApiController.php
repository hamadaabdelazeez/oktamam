<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
use \App\Http\Resources\companies;
use \App\Http\Resources\employees;

class ApiController extends Controller
{
    public function companies()
    {
    	$getCompany = companies::collection(Company::with('employees')->paginate());
    	return  ApiResponse(200,[],$getCompany);
    }
    public function employees()
    {
    	$geEemployees = employees::collection(Employee::with('company')->paginate());
    	return  ApiResponse(200,[],$geEemployees);
    }
    public function company($company)
    {
    	$getCompany = Company::where('id',$company)->first();
    	if (!empty($getCompany->id)) 
    	{
    		return  ApiResponse(200,[],new companies($getCompany));
    	}
    	else{
    		return  ApiResponse(404,['error' => 'invalid company'],[]);
    	}
    	
    }
    public function employee($employee)
    {
    	$getEmployee = Employee::where('id',$employee)->first();

	    	if (!empty($getEmployee->id)) 
	    	{
	    		return  ApiResponse(200,[],new employees($getEmployee));
	    	}
	    	else
	    	{
	    		return  ApiResponse(404,['error' => 'invalid employee'],[]);
	    	}
    		
    }
}
