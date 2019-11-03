@extends('layouts.animal')

@section('content')
<title>View</title>
<div class="container">
    <div class="container-head">
        @if(!isset($animals))
            <a href="{{route('admin.animals.index')}}" class="button">
                Back
            </a>
        @endif

        @if(isset($animals))
           

            <div class="dropdown">
        <button class="button">Filter</button>
        <div class="dropdown-content">
            <!-- <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
            <input type="checkbox" name="gorilla"> -->
                <form method="post" action="{{action('Admin\AnimalsController@getFilter')}}">
                    {{csrf_field()}}
                    @foreach($species as $specie)
                     <ul> {{$specie->name}} <input type="checkbox" name="speciesId[]" value="{{$specie->id}}"> </ul>
                    @endforeach

                    @if(isset($search))
                    <input type="hidden" name="search" value="{{$search}}">
                    @endif
                    <button type="submit" class="button">Go</button>
                </form>
        </div>
    </div> 
    
        @endif

        <form style="display:flex; justify-content: flex-end" action="{{action('Admin\AnimalsController@getSearch')}}" method="post">
            {{csrf_field()}}
            
            <input class="textbox" style=height:20px;" type="text" name="search" placeholder="Search">
            @if(isset($animalSpecies))
                @foreach($animalSpecies as $animalSpecie)
            <input type="hidden" name="speciesId[]" value="{{$animalSpecie}}">
                @endforeach
            @endif

            <button style="height:42px; width:50px;" type="submit" class="button">
            <img style="height: 100%" src="https://www.uvm.edu/www/images/map/search-white.png">
            </button>
        </form>

        
    </div>

    <div class="container-body">

    <!-- Show selected filters -->
    @if(isset($specieName))
           
                <div class="filter">
                @foreach($specieName as $specieNameItem)
                   |  {{$specieNameItem->name}}  |
                @endforeach
                    <a href="" style="padding-left:10px; padding-right:0px;">X</a>
                </div>
          
    @endif

    <!--            -->

    </div>
 
    <br>
    <br>

    @if(isset($animals))
        
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
         
    @else
        @if(isset($search))
        <h1>There are no results for "{{$search}}"</h1>
        @elseif(isset($animalSpecies))
        <h1>There are no animals.</h1>
        @endif
    @endif
     
</div>
<div class="container-bottom">



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

