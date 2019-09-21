@extends('animal')

@section('content')
<title>View</title>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last updated at</th>
                <th>Created at</th>
            </tr>
        </thead>

        <tbody>
            @foreach($animals as $animal)
            <tr>
                <td>{{$animal->id}}</td>
                <td>{{$animal->name}}</td>
                <td>{{$animal->updated_at}}</td>
                <td>{{$animal->created_at}}</td>
                <td><a href="{{action('AnimalsController@edit', $animal['id'])}}" class="tbl-button">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

