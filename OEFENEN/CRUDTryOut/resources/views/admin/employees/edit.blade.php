@extends('layouts.employee')

@section('content')

<title>Edit</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">Edit Data</h3>
        <br/>

        @if(count($errors) > 0)

            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>

        @endif
       
        <form method="post" action="{{action('\App\Http\Controllers\EmployeesController@update', $id)}}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="hidden" name="_method" value="PATCH" />

                
                    <input type="text" name="firstname" class="textbox"
                    value="{{$employee->firstname}}" placeholder="Enter first name"/>
                    
                    <input type="text" name="lastname" class="textbox"
                    value="{{$employee->lastname}}" placeholder="Enter last name"/>

                    <input type="email" name="email" class="textbox"
                    value="{{$employee->email}}" placeholder="Enter email"/>

                    <input type="text" name="job_title" class="textbox"
                    placeholder="Enter job title" value="{{$employee->job_title}}"/>

                    <input type="date" name="date_birth" class="textbox"
                    placeholder="Enter date of birth" value="{{$employee->date_birth}}"/>

                    <select name="gender" class="textbox">

                    @if($employee['gender']=='Female') <!--selected value says female-->
                        <option value="" disabled selected>Select gender</option>
                        <option value="Female" selected>Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                    @elseif($employee['gender']=='Male') <!--selected value says male-->
                        <option value="" disabled selected>Select gender</option>
                        <option value="Female">Female</option>
                        <option value="Male" selected>Male</option>
                        <option value="Other">Other</option>
                    @elseif($employee['gender']=='Other') <!--selected value says male-->
                        <option value="" disabled selected>Select gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other" selected>Other</option>
                    @endif
                    

                    <input type="date" name="employee_since" class="textbox" 
                    value="{{$employee->employee_since}}" placeholder="Employee since..."/>

                    <h3>Active?</h3>
                    <label id="switch" class="switch">
                    <input id="check" type="checkbox" name="active" class="textbox" value="1"/>
                    <span class="slider"></span>
                    </label>

                    <input type="submit" class="button" value="Submit"/>
            </div>
        </form>
        
    </div>
</div>

<script>
    window.addEventListener("load", function(){
        if($epmloyee['active']==null)
        {
            document.getElementById("check").checked = true;
        } else { 
            document.getElementById("check").checked = false;
        }
    })
</script>

@endsection


