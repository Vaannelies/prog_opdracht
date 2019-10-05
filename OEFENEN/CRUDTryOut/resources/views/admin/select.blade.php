@extends('animal');
@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select</div>

                <div class="card-body">
                <div class="links">
              
              <a href="{{route('animals.create')}}">ADD</a>
              <a href="{{route('animals.index')}}">VIEW</a>
          </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection