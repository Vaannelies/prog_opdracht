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

                
                    <input type="text" name="name" class="textbox"
                    value="{{$employee->name}}" placeholder="Enter name"/>



                    <input type="email" name="email" class="textbox"
                    value="{{$employee->email}}" placeholder="Enter email"/>


                    <input type="text" name="job_title" class="textbox"
                    placeholder="Enter job title" value="{{$employee->job_title}}"/>

                    <input type="submit" class="button" value="Submit"/>
            </div>
        </form>
        
    </div>
</div>

@endsection


