@extends('layouts.employee')

@section('content')

<title>Employee: {{$user->firstname}}</title>
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
                    <td>First name:</td>
                    <td>{{$user->firstname}}</td>
            </tr>
            <tr>    
                    <td>Last name:</td>
                    <td>{{$user->lastname}}</td>
            </tr>
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
            <tr>
                    <td>Last updated at:</td>
                    <td>{{$user->updated_at}}</td>
            </tr>
            <tr>
                    <td>Created at:</td>
                    <td>{{$user->created_at}}</td>
            </tr>
            <tr>
                    <td>Active:</td>
                    <td>
                    @if($user->active == 0) 
                          No
                    @else
                          Yes
                    @endif
                    </td>  
            </tr>
            <tr>
                    <td>Role:</td>
                    <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
            </tr>
        </table>
    </div>
</div>

<br>
<div>
    
    <a href="{{route('admin.employees.index')}}" class="tbl-button"> Back </a>
 
</div>

@endsection

