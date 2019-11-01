@extends('layouts.employeestyle')

@section('content')

<title>User: {{$user->name}}</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">About {{$user->firstname}}</h3>
        <br/>
       
        <table>
            <tr>
                    <td>ID:</td>
                    <td>{{$user->id}}</td>
            </tr>
            <tr>    
                    <td>Name:</td>
                    <td>{{$user->firstname}} {{$user->lastname}}</td>
            </tr>
            <tr>
                    <td>E-mail:</td>
                    <td>{{$user->email}}</td>
            </tr>
            <tr>
                    <td>Date of birth:</td>
                    <td>{{$user->date_birth}}</td>
            </tr>
            <tr>
                    <td>Gender:</td>
                    <td>{{$user->gender}}</td>
            </tr>
            <tr>
                    <td>Employee since:</td>
                    <td>{{$user->employee_since}}</td>
            </tr>
         
        </table>
    </div>
</div>

<br>
<div>
   
    <a href="{{route('employee.dashboard')}}" class="tbl-button"> Back </a>
 
</div>

@endsection

