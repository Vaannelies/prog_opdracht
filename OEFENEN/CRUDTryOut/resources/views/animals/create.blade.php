@extends('animal')

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
        <form method="post" action="{{url('animals')}}"> <!-- of animals/create? -->
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="name" class="textbox"
                placeholder="Enter name"/>
                <input type="date" name="date_birth" class="textbox"
                placeholder="Enter date of birth"/>
                <select name="gender" class="textbox">
                    <option value="" disabled selected>Select gender</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select> 
                <input type="submit" class="button" value="Add"/>
            </div>
        </form>
    </div>
</div>

@endsection

