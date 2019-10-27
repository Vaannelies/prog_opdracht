<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    public function __construct()
    {
        $this->middleware('auth:employee')->only('showMe');
        $this->middleware('auth');


 
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    /**
     * Shows an employee their own personal information.
     */
    public function showMe()
    {
        $employee = "HOI";
        return view('employee.dashboard', compact('employee'));
    
    }

    /**
     * Shows an admin everything about all employees.
     */

    public function index(){
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }
}
