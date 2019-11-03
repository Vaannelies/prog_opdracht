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
                <input type="text" name="firstname" class="textbox"
                placeholder="Enter first name"/>

                <input type="text" name="lastname" class="textbox"
                placeholder="Enter last name"/>

                <input type="email" name="email" class="textbox"
                placeholder="Enter email"/>

                <input type="password" name="password" class="textbox"
                placeholder="Enter password"/>

                <input type="date" name="date_birth" class="textbox"
                placeholder="Enter date of birth"/>

                <select name="gender" class="textbox">
                    <option value="" disabled selected>Select gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Other">Other</option>
                </select> 

                <input type="date" name="employee_since" class="textbox"
                placeholder="Employee since..."/>

                <div style="display:flex; justify-content: center;">
                    <div style="display:flex; flex-direction: row; align-items:center">
                        <h3>Active?</h3>
                        <label id="switch" class="switch">

                        <input id="check" type="checkbox" name="active" class="textbox" value="1"
                        placeholder="Active?"/>
                        <span class="slider"></span>

                        </label>
                    </div>
                </div>

                <div style="display:flex; justify-content: center;">
                    
                    <div style="display:flex; flex-direction: row; align-items:center;">
                        <h3>Roles:</h3>
                        @foreach($roles as $role)
                            <div>
                                <label>{{$role->name}}</label>
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}"/>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div style="display:flex; justify-content: center;">
                    
                    <div style="display:flex; flex-direction: row; align-items:center;">
                        <h3>Species</h3>
                        
                        <select name="species_id">
                        @foreach($species as $specie)
                            <option value="{{$specie->id}}">{{$specie->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <input type="submit" class="button" value="Add"/>
            </div>
        </form>
    </div>
</div>


@endsection

