@extends('animal')

@section('content')

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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

