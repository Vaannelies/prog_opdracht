@extends('animal')

@section('content')

<title>Edit</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">Edit Data</h3>
        <br/>

        @if(count($errors) > 0)

            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>

        @endif
       
        <form method="post" action="{{action('AnimalsController@update', $id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH" />
                <input type="text" name="name" class="textbox"
                value="{{$animal->name}}" placeholder="Enter name"/>
                <input type="date" name="date_birth" class="textbox"
                value="{{$animal->date_birth}}" placeholder="Enter date of birth"/>
                <select name="gender" class="textbox">

                @if($animal['gender']=='female') <!--value says female-->
                    <option value="">Select gender</option>
                    <option value="female" selected>Female</option>
                    <option value="male">Male</option>
                @endif

                @if($animal['gender']=='male') <!--value says male-->
                    <option value="">Select gender</option>
                    <option value="female">Female</option>
                    <option value="male" selected>Male</option>
                @endif
                </select> 
                <input type="submit" class="button" value="Submit"/>
        </form>
    </div>
</div>

@endsection


