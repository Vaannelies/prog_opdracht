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
            'firstname'         =>  'required',
            'lastname'          =>  'required',
            'email'             =>  'required',
            'password'          =>  'required',
            'job_title'         =>  'required',
            'date_birth'        =>  'required',
            'gender'            =>  'required',
            'employee_since'    =>  'required'
        ]);
        $employee = new Employee([
            'firstname'         =>  $request->get('firstname'),
            'lastname'          =>  $request->get('lastname'),
            'email'             =>  $request->get('email'),
            'password'          =>  Hash::make($request->get('password')),
            'job_title'         =>  $request->get('job_title'),
            'date_birth'        =>  $request->get('date_birth'),
            'gender'            =>  $request->get('gender'),
            'employee_since'    =>  $request->get('employee_since'),
            'active'            =>  $request->get('active')


        ]);
        $employee->save();
        return redirect()->route('admin.employees.index')->with('success', 'Data Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        if($employee != "")
        {
            return view('admin.employees.edit', compact('employee', 'id'));
        }
        else
        {
            return redirect()->route('admin.employees.index');
        }
    }



     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'email' => 'required',
            'job_title' => 'required'
        ]);
        $employee = Employee::find($id);
        $employee->name         =       $request->get('name');
        $employee->email        =       $request->get('email');
        $employee->job_title    =       $request->get('job_title');
        $employee->save();
        return redirect()->route('admin.employees.index')->with('success', 'Data Updated');
    }


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Data Deleted');
    }
  
    

}
