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
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Last updated at</th>
                                <th>Created at</th>
                                <th>Is Active</th>
                            </tr>
                        </thead>

                        <tbody>
                    
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                   
                                    
                                        <td><a class="text-button" href="{{action('\App\Http\Controllers\EmployeesController@show', $employee['id'])}}">{{$employee->firstname}}</a></td>
                                        <td>{{$employee->lastname}}</td>
                                        <td>{{$employee->updated_at}}</td>


                                    <td>{{$employee->created_at}}</td>
                                    <td>
                                            @if($employee->active == 0) <!-- No double brackets needed, since you don't actually SHOW the value of $employee->active. It's not that dangerous. (OWASP) -->
                                                No
                                            @else 
                                                Yes
                                            @endif

                                            <label id="switch" class="switch">
                                            <input id="check[{{$employee->id}}]" type="checkbox" name="active" class="textbox" value="1"/>
                                            <span class="slider"></span>
                                            </label>
                                    </td>

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
<script>            //WERKT NIET!
    window.addEventListener("load", function(){
        for(let i = 0; i < count(<?php echo $employees?>); i++);
        var employee_status<?php echo $employee['id']?> = <?php echo $employee['active']?>;
        console.log(employee_status<?php echo $employee['id']?>)
        if(employee_status == 0)
        {
            document.getElementById("check[<?php echo $employee['id']?>]").checked = false;
        } else { 
            document.getElementById("check[<?php echo $employee['id']?>]").checked = true;
        }
    })
</script>
        @endsection
