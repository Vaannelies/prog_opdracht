@extends('layouts.animal')

@section('content')
<title>View</title>

<h1>Your animal species: {{$myspecies[0]->name}}</h1>
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

        <form style="display:flex; justify-content: flex-end" action="{{action('Admin\AnimalsController@getSearchEmployee')}}" method="post">
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
                    </tr>
                </thead>

                <tbody>
            
                    @foreach($myanimals as $myanimal)
                        <tr>
                            <td>{{$myanimal->id}}</td>
                            <td>
                                <form action="{{action('Admin\AnimalsController@detailsEmployee')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$myanimal->id}}">
                                <input type="submit" value="{{$myanimal->name}}" class="tbl-button">
                                </form>
                            </td>
                        
                            <td>{{$myanimal->species->name}}</td>
                          

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


</script>


@endsection


 