@extends('layouts.employeestyle')

@section('content')

<title>Animal: {{$employee->name}}</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">About {{$employee->name}}</h3>
        <br/>
       
        <table>
            <tr>
                    <td>ID:</td>
                    <td>{{$employee->id}}</td>
            </tr>
            <tr>    
                    <td>Name:</td>
                    <td>{{$employee->name}}</td>
            </tr>
            <tr>
                    <td>Date of birth:</td>
                    <td>{{$employee->date_birth}}</td>
            </tr>
            <tr>
                    <td>Gender:</td>
                    <td>{{$employee->gender}}</td>
            </tr>
            <tr>
                    <td>Food:</td>
                    <td>{{$employee->food}}</td>
            </tr>
            <tr>
                    <td>Last updated at:</td>
                    <td>{{$employee->updated_at}}</td>
            </tr>
            <tr>
                    <td>Created at:</td>
                    <td>{{$employee->created_at}}</td>
            </tr>
            <tr>
                    <td>Species id:</td>
                    <td>{{$employee->species_id}}</td>
            </tr>
            <tr>
                    <td>Species:</td>
                    <td>{{$employee->species->name}}</td>
            </tr>
            <tr>
                    <td>Enclosure:</td>
                    <td>{{$employee->species->enclosure_name}}</td>
            </tr>
            <tr>
                    <td>Area:</td>
                    <td>{{$employee->species->area}}</td>
            </tr>
        </table>
    </div>
</div>

<br>
<div>
    <!-- <a href="/Laravel/GitHub/prog_opdracht/OEFENEN/CRUDTryOut/public/animals/{{$animal->id - 1}}" class="tbl-button">Previous</a> -->
    <a href="{{route('employee.dashboard')}}" class="tbl-button"> Back </a>
    <!-- <a href="/Laravel/GitHub/prog_opdracht/OEFENEN/CRUDTryOut/public/animals/{{$animal->id + 1}}" class="tbl-button">Next</a> -->
</div>

@endsection

