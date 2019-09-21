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
                <td>
                    <form method="post" class="delete_form" action="{{action('AnimalsController@destroy', $animal['id'])}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="tbl-button">Delete</button>
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

