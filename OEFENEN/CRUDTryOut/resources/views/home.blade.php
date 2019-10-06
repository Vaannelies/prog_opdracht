
@extends('layouts.adminstyle');

@section('content')
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
                            <a href="{{route('animals.create')}}"><button class="button">Employees</button></a>
                            <a href=""><button class="button">Animals</button></a>
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