@extends('animal')

@section('content')

<title>Animal: {{$animal->name}}</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">About {{$animal->name}}</h3>
        <br/>
       
        <table>
            <tr>
                    <td>ID:</td>
                    <td>{{$animal->id}}</td>
            </tr>
            <tr>    
                    <td>Name:</td>
                    <td>{{$animal->name}}</td>
            </tr>
            <tr>
                    <td>Date of birth:</td>
                    <td>{{$animal->date_birth}}</td>
            </tr>
            <tr>
                    <td>Last updated at:</td>
                    <td>{{$animal->updated_at}}</td>
            </tr>
            <tr>
                    <td>Created at:</td>
                    <td>{{$animal->created_at}}</td>
            </tr>
        </table>
    </div>
</div>

<br>
<div>
    <!-- <a href="/Laravel/GitHub/prog_opdracht/OEFENEN/CRUDTryOut/public/animals/{{$animal->id - 1}}" class="tbl-button">Previous</a> -->
    <a href="{{route('animals.index')}}" class="tbl-button"> Back </a>
    <!-- <a href="/Laravel/GitHub/prog_opdracht/OEFENEN/CRUDTryOut/public/animals/{{$animal->id + 1}}" class="tbl-button">Next</a> -->
</div>

@endsection

