@extends('layouts.employee')

@section('content')
<title>Add</title>
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Add Data</h3>
        <br />
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        @endif
        @if(\Session::has('succes'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <form method="post" action="{{route('admin.employees.index')}}"> <!-- of animals/create? -->
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="name" class="textbox"
                placeholder="Enter name"/>

                <input type="email" name="email" class="textbox"
                placeholder="Enter email"/>

                <input type="password" name="password" class="textbox"
                placeholder="Enter password"/>

                <input type="text" name="job_title" class="textbox"
                placeholder="Enter job title"/>

                <input type="submit" class="button" value="Add"/>
            </div>
        </form>
    </div>
</div>

@endsection

