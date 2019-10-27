<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

//  EMPLOYEE

    /**
     * Shows an employee their own personal information.
     */
    public function showMe()
    {
        $employee = "HOI";
        return view('employee.dashboard', compact('employee'));
    
    }

//  ADMIN

    /**
     * Shows an admin everything about all employees.
     * 
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'email' => 'required',
            'password' => 'required',
            'job_title' => 'required'
        ]);
        $employee = new Employee([
            'name'  =>  $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'job_title' => $request->get('job_title')

        ]);
        $employee->save();
        return redirect()->route('admin.employees.index')->with('success', 'Data Added');
    }

}
