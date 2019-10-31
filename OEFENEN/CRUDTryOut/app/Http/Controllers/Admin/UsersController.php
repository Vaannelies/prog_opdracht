<?php

namespace App\Http\Controllers\Admin;
use App\Role;
use App\User;
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
 

    public function edit($id)
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
            'employee_since'    =>  'required'
        ]);
        $user = User::find($id);
        $user->firstname        =       $request->get('firstname');
        $user->lastname         =       $request->get('lastname');      
        $user->email            =       $request->get('email');
        $user->date_birth       =       $request->get('date_birth');
        $user->gender           =       $request->get('gender');
        $user->employee_since   =       $request->get('employee_since');
        $user->active           =       ($request->get('active') == null) ? 0 : 1;
        $user->save();
        return redirect()->route('admin.employees.index')->with('success', 'Data Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
