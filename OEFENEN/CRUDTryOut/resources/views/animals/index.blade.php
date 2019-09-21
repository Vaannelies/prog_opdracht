@extends('animal')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Animal Data</h3>
        <br />
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($animals as $animal)
            <tr>
                <td>{{$animal['name']}}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection

