@extends('animal')

@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach($animals as $animal)
            <tr>
                <td>1</td>
                <td>{{$animal->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

