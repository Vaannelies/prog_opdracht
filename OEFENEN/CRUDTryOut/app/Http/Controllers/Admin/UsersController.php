<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.employees.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $roles = Role::all();
    
        return view('admin.employees.create', compact('roles'));
       
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
            'date_birth'        =>  'required',
            'gender'            =>  'required',
            'employee_since'    =>  'required',
            'roles'             =>  'required'
        ]);
        $user = new User([
            'firstname'         =>  $request->get('firstname'),
            'lastname'          =>  $request->get('lastname'),
            'email'             =>  $request->get('email'),
            'password'          =>  Hash::make($request->get('password')),
            'date_birth'        =>  $request->get('date_birth'),
            'gender'            =>  $request->get('gender'),
            'employee_since'    =>  $request->get('employee_since'),
            'active'            =>  ($request->get('active') == null) ? 0 : 1
                    ]);

        
        $user->save();
        $user->roles()->attach($request->get('roles'));
        return redirect()->route('admin.employees.index')->with('success', 'Data Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
 

    public function edit($id)
    {
        if(Gate::denies('edit-users'))
        {
            return redirect(route('admin.employees.index'));
        }
        else
        {
            $roles = Role::all();
            $user = User::find($id);
            if($user != "")
            {
                return view('admin.employees.edit', compact('user', 'roles','id'));
            }
            else
            {
                return redirect()->route('admin.employees.index');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
   
        $this->validate($request, [
            'firstname'         =>  'required',
            'lastname'          =>  'required',
            'email'             =>  'required',
            'date_birth'        =>  'required',
            'gender'            =>  'required',
            'employee_since'    =>  'required',
            'roles'             =>  'required'
        ]);
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        $user->firstname        =       $request->get('firstname');
        $user->lastname         =       $request->get('lastname');      
        $user->email            =       $request->get('email');
        $user->date_birth       =       $request->get('date_birth');
        $user->gender           =       $request->get('gender');
        $user->employee_since   =       $request->get('employee_since');
        $user->active           =      ($request->get('active') == null) ? 0 : 1;
        $user->save();
        return redirect()->route('admin.employees.index')->with('success', 'Data Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-users'))
        {
            return redirect(route('admin.employees.index'));
        }

        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Data Deleted');
    }

         /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //
    {
        $user = User::find($id);

        if($user != "")
        {
            return view('admin.employees.details', compact('user', 'id'));
        } 
        else
        {
            return redirect()->route('admin.employees.index');
        }

    }

    public function showMe()
    {

        $user = auth()->user();

        if(Gate::denies('profile-admins'))
        {
            return view('employee.personal', compact('user'));
           
        }
        elseif(Gate::denies('profile-employees'))
        {        
            return view('admin.personal', compact('user'));
        }
    
    }



    public function updateStatus(Request $request) 
    { 
     
        $user = User::find($request->id);
        $user->active = $request->active;
        $user->save();
        
        return redirect()->route('admin.employees.index')->with('success', 'Data Updated');
    }


}
