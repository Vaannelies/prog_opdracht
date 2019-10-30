@extends('layouts.employee')

@section('content')

<title>Employee: {{$employee->name}}</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">About {{$employee->name}}</h3>
        <br/>
       
        <table>
            <tr>
                    <td>ID:</td>
                    <td>{{$employee->id}}</td>
            </tr>
            <tr>    
                    <td>First name:</td>
                    <td>{{$employee->firstname}}</td>
            </tr>
            <tr>    
                    <td>Last name:</td>
                    <td>{{$employee->lastname}}</td>
            </tr>
                    <td>E-mail:</td>
                    <td>{{$employee->email}}</td>
            </tr>
            <tr>
                    <td>Date of birth:</td>
                    <td>{{$employee->date_birth}}</td>
            </tr>
            <tr>
                    <td>Gender:</td>
                    <td>{{$employee->gender}}</td>
            </tr>
            <tr>
                    <td>Employee since:</td>
                    <td>{{$employee->employee_since}}</td>
            </tr>
            <tr>
                    <td>Last updated at:</td>
                    <td>{{$employee->updated_at}}</td>
            </tr>
            <tr>
                    <td>Created at:</td>
                    <td>{{$employee->created_at}}</td>
            </tr>
            <tr>
                    <td>Job title:</td>
                    <td>{{$employee->job_title}}</td>
            </tr>
            <tr>
                    <td>Active:</td>
                    <td>{{$employee->active}}</td>
            </tr>
        </table>
    </div>
</div>

<br>
<div>
    
    <a href="{{route('admin.employees.index')}}" class="tbl-button"> Back </a>
 
</div>

@endsection

