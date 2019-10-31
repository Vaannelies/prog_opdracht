@can('login-admins')

    @extends('layouts.adminstyle')

    @section('content')
    <title>Admin Page</title>

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

@can('login-employees')
    @extends('layouts.employeestyle')

    @section('content')
    <title>Employee Page</title>

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
                                <a href="{{route('employee.dashboard')}}"><button class="button">You</button></a>
                                <a href="{{route('employee.dashboard')}}"><button class="button">Animals</button></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endcan



