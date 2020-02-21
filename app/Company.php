<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Company extends Model
{
	protected $table    = "companies";
    protected $fillable = ['name', 'email', 'logo','website'];


    public function employees()
    {
    	return $this->hasMany(Employee::class,'company_id','id');
    }

}
