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
        $this->middleware('auth:employee'); //als je dit verandert naar
        // 'auth:web' dan werkt het ook voor de adminpagina (admin.employees.index werkt dan dus wel)
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = Employee::all();
        return view('employee.dashboard', compact('employee'));
    
    }

    public function indexAdmin(){
        $users = Employee::all();
        return view('admin.employees.index', compact('users'));
    }
}
