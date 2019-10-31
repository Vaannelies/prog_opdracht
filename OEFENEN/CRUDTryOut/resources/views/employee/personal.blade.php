@extends('layouts.employeestyle')

@section('content')

<title>User: {{$user->name}}</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">About {{$user->name}}</h3>
        <br/>
       
        <table>
            <tr>
                    <td>ID:</td>
                    <td>{{$user->id}}</td>
            </tr>
            <tr>    
                    <td>Name:</td>
                    <td>{{$user->firstname}}</td>
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
                    <td>Last updated at:</td>
                    <td>{{$user->updated_at}}</td>
            </tr>
            <tr>
                    <td>Created at:</td>
                    <td>{{$user->created_at}}</td>
            </tr>
        </table>
    </div>
</div>

<br>
<div>
   
    <a href="{{route('employee.dashboard')}}" class="tbl-button"> Back </a>
 
</div>

@endsection

