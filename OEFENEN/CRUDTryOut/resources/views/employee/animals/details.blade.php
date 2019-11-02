@extends('layouts.animal')

@section('content')

<title>Animal: {{$myanimal->name}}</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">About {{$myanimal->name}}</h3>
        <br/>
       
        <table>
            <tr>
                    <td>ID:</td>
                    <td>{{$myanimal->id}}</td>
            </tr>
            <tr>    
                    <td>Name:</td>
                    <td>{{$myanimal->name}}</td>
            </tr>
            <tr>
                    <td>Date of birth:</td>
                    <td>{{$myanimal->date_birth}}</td>
            </tr>
            <tr>
                    <td>Gender:</td>
                    <td>{{$myanimal->gender}}</td>
            </tr>
            <tr>
                    <td>Food:</td>
                    <td>{{$myanimal->food}}</td>
            </tr>
            <tr>
                    <td>Last updated at:</td>
                    <td>{{$myanimal->updated_at}}</td>
            </tr>
            <tr>
                    <td>Created at:</td>
                    <td>{{$myanimal->created_at}}</td>
            </tr>
            <tr>
                    <td>Species id:</td>
                    <td>{{$myanimal->species_id}}</td>
            </tr>
            <tr>
                    <td>Species:</td>
                    <td>{{$myanimal->species->name}}</td>
            </tr>
            <tr>
                    <td>Enclosure:</td>
                    <td>{{$myanimal->species->enclosure_name}}</td>
            </tr>
            <tr>
                    <td>Area:</td>
                    <td>{{$myanimal->species->area}}</td>
            </tr>
        </table>
    </div>
</div>

<br>
<div>
    <!-- <a href="/Laravel/GitHub/prog_opdracht/OEFENEN/CRUDTryOut/public/animals/{{$myanimal->id - 1}}" class="tbl-button">Previous</a> -->
    <a href="{{route('admin.animals.index')}}" class="tbl-button"> Back </a>
    <!-- <a href="/Laravel/GitHub/prog_opdracht/OEFENEN/CRUDTryOut/public/animals/{{$myanimal->id + 1}}" class="tbl-button">Next</a> -->
</div>

@endsection

