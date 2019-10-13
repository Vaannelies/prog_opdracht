@extends('layouts.animal')

@section('content')
<title>View</title>
<div class="container">

    <form style="display:flex; justify-content: flex-end" action="{{route('admin.animals.index')}}" method="post">
         {{csrf_field()}}
        <input class="textbox" style=height:20px;" type="text" name="request" placeholder="Search">

        <button style="height:42px; width:50px;" type="submit" class="button">
        <img style="height: 100%" src="https://www.uvm.edu/www/images/map/search-white.png">
        </button>


    </form>
    <br>
    <br>
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
                <td><a class="text-button" href="{{action('Admin\AnimalsController@show', $animal['id'])}}" >{{$animal->name}}</a></td>
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

