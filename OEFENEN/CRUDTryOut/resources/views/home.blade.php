
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
                            <a href="{{route('admin.users.index')}}"><button class="button">Employees</button></a>
                            <a href="{{route('admin.animals.index')}}"><button class="button">Animals</button></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        
           
               
                </div>
            </div>
        
    </div>
</div>
@endsection