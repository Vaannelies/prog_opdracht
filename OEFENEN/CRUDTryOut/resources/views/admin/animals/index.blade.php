@extends('layouts.animal')

@section('content')
<title>View</title>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Species</th>
                <th>Last updated at</th>
                <th>Created at</th>
            </tr>
        </thead>

        <tbody>
            @foreach($animals as $animal)
            <tr>
                <td>{{$animal->id}}</td>
                <td><a href="{{action('Admin\AnimalsController@show', $animal['id'])}}" >{{$animal->name}}</a></td>
                <td>{{$animal->species->name}}</td>
                <td>{{$animal->updated_at}}</td>
                <td>{{$animal->created_at}}</td>
                <td><a href="{{action('Admin\AnimalsController@edit', $animal['id'])}}" class="tbl-button">Edit</a></td>
                <td>
                    <form method="post" class="delete_form" action="{{action('Admin\AnimalsController@destroy', $animal['id'])}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="tbl-button" style="background-color:#DD5555;">Delete</button>
                    </form>
                </td>
          
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>

$(document).ready(function(){
    $('.delete_form').on('submit', function(){
        if(confirm("Are you sure you want to delete it?"))
        {
            return true;
        }
        else
        {
            return false;
        }
    });
});

</script>


@endsection

