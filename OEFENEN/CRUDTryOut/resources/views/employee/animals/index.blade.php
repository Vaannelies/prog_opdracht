@extends('layouts.animal')

@section('content')
<title>View</title>
<div class="container">
    <div class="container-head">
        @if(!isset($myanimals))
            <a href="{{route('employee.dashboard')}}" class="button">
                Back
            </a>
        @endif

        @if(isset($myanimals))
            <form style="display:flex; justify-content: flex-end" action="" method="">
                {{csrf_field()}}

                <select name="sort" class="textbox">

                    <option value="" disabled selected>Select sorting method</option>
                    <option value="Female">Youngest to oldest</option>
                    <option value="Male" selected>Oldest to youngest</option>
          
                </select> 

                <button type="submit" class="button">Sort</button>
            </form>
        @endif

        <form style="display:flex; justify-content: flex-end" action="{{action('Admin\AnimalsController@getSearch')}}" method="post">
            {{csrf_field()}}
            
            <input class="textbox" style=height:20px;" type="text" name="search" placeholder="Search">

            <button style="height:42px; width:50px;" type="submit" class="button">
            <img style="height: 100%" src="https://www.uvm.edu/www/images/map/search-white.png">
            </button>
        </form>

        
    </div>

    <div class="container-body">

    <!-- Show selected filters -->
    @if(isset($specieName))
            @foreach($specieName as $specieNameItem)
                <div class="filter">
                    {{$specieNameItem->name}} 
                    <a href="" style="padding-left:10px; padding-right:0px;">X</a>
                </div>
            @endforeach
    @endif

    <!--            -->

    </div>
 
    <br>
    <br>

    @if(isset($myanimals))
        
            @if(isset($search))
                <h1>Search results for: <strong>{{$search}}</strong></h1>
            @endif
          
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Last updated at</th>
                        <th>Created at</th>
                        <th>Is Active</th>
                    </tr>
                </thead>

                <tbody>
            
                    @foreach($myanimals as $myanimal)
                        <tr>
                            <td>{{$myanimal->id}}</td>
                            <td><a class="text-button" href="{{action('Admin\AnimalsController@show', $myanimal['id'])}}" >{{$myanimal->name}}</a></td>
                            <td>{{$myanimal->species->name}}</td>
                            <td>{{$myanimal->updated_at}}</td>
                            <td>{{$myanimal->created_at}}</td>



                            <td>
                                <form method="post" action="{{action('Admin\AnimalsController@updateStatus')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="name" value="gert"/>
                                    <input type="hidden" name="id" value="{{$myanimal->id}}"/>
                                    <button type="submit" class="tbl-button"> Activate </button>
                                </form>
                            </td>





                            <td><a href="{{action('Admin\AnimalsController@edit', $myanimal['id'])}}" class="tbl-button">Edit</a></td>
                            <td>
                                <form method="post" class="delete_form" action="{{action('Admin\AnimalsController@destroy', $myanimal['id'])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="tbl-button" style="background-color:#DD5555;">Delete</button>
                                </form>
                                
                            </td>
                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
    @else
        @if(isset($search))
        <h1>There are no results for "{{$search}}"</h1>
        @elseif(isset($animalSpecies))
        <h1>There are no animals.</h1>
        @endif
    @endif
     
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


 