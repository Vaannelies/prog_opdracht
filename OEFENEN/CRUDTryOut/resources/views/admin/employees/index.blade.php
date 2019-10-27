@extends('layouts.employee')

@section('content')
<div class="container">
    <div class="container-head">
  
        </div>

        <div class="container-body">
         

        </div>
 
        <br>
        <br>

            @if(isset($employees))
      
                
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
                    
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                   
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->updated_at}}</td>
                                    <td>{{$employee->created_at}}</td>

                                    <td><a href="{{action('\App\Http\Controllers\EmployeesController@edit', $employee['id'])}}" class="tbl-button">Edit</a></td>
                                    <td>
                                        <form method="post" class="delete_form" action="{{action('\App\Http\Controllers\EmployeesController@destroy', $employee['id'])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button type="submit" class="tbl-button" style="background-color:#DD5555;">Delete</button>
                                        </form>
                                    </td>

                            
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
       
            
</div>
        @endsection
