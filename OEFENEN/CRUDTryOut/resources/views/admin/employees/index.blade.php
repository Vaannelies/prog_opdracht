@extends('layouts.employee')

@section('content')
<div class="container">
    <div class="container-head">
  
        </div>

        <div class="container-body">
         

        </div>
 
        <br>
        <br>

            @if(isset($users))
      
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Role</th>
                                <th>Last updated at</th>
                                <th>Created at</th>
                                <th>Is Active</th>
                            </tr>
                        </thead>

                        <tbody>
                    
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                   
                                    
                                        <td><a class="text-button" href="{{action('\App\Http\Controllers\Admin\UsersController@show', $user['id'])}}">{{$user->firstname}}</a></td>
                                        <td>{{$user->lastname}}</td>

                                        <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                        <td>{{$user->updated_at}}</td>


                                    <td>{{$user->created_at}}</td>
                                    <td>
                                            @if($user->active == 0) <!-- No double brackets needed, since you don't actually SHOW the value of $user->active. It's not that dangerous. (OWASP) -->
                                                No
                                            @else 
                                                Yes
                                            @endif

                                            <label id="switch" class="switch">
                                            <input id="check[{{$user->id}}]" type="checkbox" name="active" class="textbox" value="1"/>
                                            <span class="slider"></span>
                                            </label>
                                    </td>

                                    <td><a href="{{action('\App\Http\Controllers\Admin\UsersController@edit', $user['id'])}}" class="tbl-button">Edit</a></td>
                               
                                    <td>
                                        <form method="post" class="delete_form" action="{{action('\App\Http\Controllers\Admin\UsersController@destroy', $user['id'])}}">
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
        for(let i = 0; i < count(<?php echo $users?>); i++);
        var employee_status<?php echo $user['id']?> = <?php echo $user['active']?>;
        console.log(employee_status<?php echo $user['id']?>)
        if(employee_status == 0)
        {
            document.getElementById("check[<?php echo $user['id']?>]").checked = false;
        } else { 
            document.getElementById("check[<?php echo $user['id']?>]").checked = true;
        }
    })



    //Ask if someone really wants to delete something
    
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
