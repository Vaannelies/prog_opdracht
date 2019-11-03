@extends('layouts.employee')

@section('content')
<title>Add</title>
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Add Data</h3>
        <br />
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        @endif
        @if(\Session::has('succes'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <form method="post" action="{{route('admin.employees.index')}}"> <!-- of animals/create? -->
            {{csrf_field()}}
            <div class="form-group">
                <label>First name</label>
                <input type="text" name="firstname" class="textbox"
                placeholder="Enter first name"/>

                <label>Last name</label>
                <input type="text" name="lastname" class="textbox"
                placeholder="Enter last name"/>

                <label>E-mail</label>
                <input type="email" name="email" class="textbox"
                placeholder="Enter e-mail"/>

                <label>Password</label>
                <input type="password" name="password" class="textbox"
                placeholder="Enter password"/>

                <label>Date of birth</label>
                <input type="date" name="date_birth" class="textbox"
                placeholder="Enter date of birth"/>

                <label>Gender</label>
                <select name="gender" class="textbox">
                    <option value="" disabled selected>Select gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Other">Other</option>
                </select> 

                <label>Employee since</label>
                <input type="date" name="employee_since" class="textbox"
                placeholder="Employee since..."/>

                    <div style="display:flex; justify-content:center;">
                            <div style="display:flex; flex-direction: column; width:100%">   
                                    <div style="">
                                        <div style="display:flex; flex-direction: row; align-items:center; justify-content:space-between">
                                            <label>Active?</label>
                                            <label id="switch" class="switch">

                                            <input id="check" type="checkbox" name="active" class="textbox" value="1"
                                            placeholder="Active?"/>
                                            <span class="slider"></span>

                                            </label>
                                        </div>
                                    </div>

                                

                                    <div style="">
                                        
                                        <div style="display:flex; flex-direction: row; align-items:center; justify-content:space-between">
                                        <label>Role</label>
                                            <select name="roles" class="textbox" style="width: 50%;">
                                            @foreach($roles as $role)
                                                <div>
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                </div>
                                            @endforeach
                                            <select>
                                        </div>
                                    </div>


                                    <div style="">
                                        
                                        <div style="display:flex; flex-direction: row; align-items:center; justify-content:space-between">
                                        <label>Species</label>
                                            
                                            <select name="species_id" class="textbox" style="width: 50%;">
                                            @foreach($species as $specie)
                                                <option value="{{$specie->id}}">{{$specie->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                    </div>

                <input type="submit" class="button" value="Add"/>
            </div>
        </form>
    </div>
</div>


@endsection

