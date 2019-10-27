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
        $this->middleware('auth');

        $this->middleware('auth:employee', ['only' => [
            'showMe'
        ]]);

        $this->middleware('auth', ['except' => [
            'showMe'
        ]]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showMe()
    {
        $employee = Employee::all();
        return view('employee.dashboard', compact('employee'));
    
    }

    public function index(){
        $users = Employee::all();
        return view('admin.employees.index', compact('users'));
    }
}
