@extends('layouts.animal')

@section('content')

<title>Animal: {{$myanimal->name}}</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">Edit {{$myanimal->name}}'s description</h3>
        <br/>
       
        <table>
          
            <tr>
                    <td>Description:</td>
                    <td>{{$myanimal->description}}</td>
                    @can('write-comment')
                        <td>
                                <form id="edit_description" action="{{action('Admin\AnimalsController@updateDescription')}}" method="post">
                                        <input type="hidden" name="id" value="{{$myanimal->id}}">
                                          
                                        <textarea rows="4" cols="50" name="description" form="edit_description" placeholder="Enter description" class="textbox">
                                        {{$myanimal->description}}
                                        </textarea>

                                        <input type="submit" value="Submit">
                                </form>
                        </td>
                    @endcan
            </tr>
     
        </table>
    </div>
</div>

<br>
<div>
    <!-- <a href="/Laravel/GitHub/prog_opdracht/OEFENEN/CRUDTryOut/public/animals/{{$myanimal->id - 1}}" class="tbl-button">Previous</a> -->
    <a href="{{route('employee.animals.index')}}" class="tbl-button"> Back </a>
    <!-- <a href="/Laravel/GitHub/prog_opdracht/OEFENEN/CRUDTryOut/public/animals/{{$myanimal->id + 1}}" class="tbl-button">Next</a> -->
</div>

@endsection

