@extends('layouts.animal')

@section('content')
<title>Add</title>
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Add animal</h3>
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
        <form id="create_form" method="post" action="{{route('admin.animals.index')}}"> <!-- of animals/create? -->
            {{csrf_field()}}
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="textbox"
                placeholder="Enter name"/>

                <label>Date of birth</label>
                <input type="date" name="date_birth" class="textbox"
                placeholder="Enter date of birth"/>

                <label>Gender</label>
                <select name="gender" class="textbox">
                    <option value="" disabled selected>Select gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select> 

                <label>Species</label>
                <select name="species_id" class="textbox">
                     <option value="" disabled selected>Select species</option>
                 
                    
                    @foreach($species as $specie)
                  
                  <option value="{{$specie->id}}">{{$specie->name}}</option>
                  @endforeach
     
                </select> 
                <label>Food</label>
                <input type="text" name="food" class="textbox"
                placeholder="Enter food"/>

                <label>Description</label>
                <textarea rows="4" cols="50" name="description" form="create_form" placeholder="Enter description..." class="textbox"></textarea>

                <input type="submit" class="button" value="Add"/>
            </div>
        </form>
    </div>
</div>

@endsection

