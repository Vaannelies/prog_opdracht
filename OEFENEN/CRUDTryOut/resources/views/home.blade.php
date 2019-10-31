@extends('layouts.homestyle')



<!--    ADMIN   -->

@can('login-admins')


    @section('content')
    <title>Admin Page</title>
    <div class="title m-b-md">
                    Admin
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Select</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif

                            <div class="links">
                                <a href="{{route('admin.employees.index')}}"><button class="button">Employees</button></a>
                                <a href="{{route('admin.animals.index')}}"><button class="button">Animals</button></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endcan


<!--    EMPLOYEE    -->

@can('login-employees')


       @section('content')
    <title>Employee Page</title>
    <div class="title m-b-md">
                    Employee
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            <p>Hello [[dit werkt nog niet]]!</p>
            
                <div class="card">
                    <div class="card-header">Select</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif

                            <div class="links">
                                <a href="{{route('employee.personal')}}"><button class="button">You</button></a>
                                <a href="{{route('employee.dashboard')}}"><button class="button">Animals</button></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

 
@endcan



