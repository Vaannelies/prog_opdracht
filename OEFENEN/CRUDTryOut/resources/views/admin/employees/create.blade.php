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
                placeholder="Enter firstname"/>

                <input type="text" name="lastname" class="textbox"
                placeholder="Enter lastname"/>

                <input type="email" name="email" class="textbox"
                placeholder="Enter email"/>

                <input type="password" name="password" class="textbox"
                placeholder="Enter password"/>

                <input type="text" name="job_title" class="textbox"
                placeholder="Enter job title"/>

                <input type="date" name="date_birth" class="textbox"
                placeholder="Enter date of birth"/>

                <select name="gender" class="textbox">
                    <option value="" disabled selected>Select gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Male">Other</option>
                </select> 

                <input type="date" name="employee_since" class="textbox"
                placeholder="Employee since..."/>


                <h3>Active?</h3>
                <label class="switch">
                <input type="checkbox" name="active" class="textbox"
                placeholder="Active?"/>
                <span class="slider"></span>
                </label>


                <input type="submit" class="button" value="Add"/>
            </div>
        </form>
    </div>
</div>

@endsection

