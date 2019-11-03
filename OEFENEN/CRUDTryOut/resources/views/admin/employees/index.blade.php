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
                                           
                                        <form method="" action="{{action('\App\Http\Controllers\Admin\UsersController@updateStatus', $user['id'])}}">
                                            {{csrf_field()}}
                                            <label id="switch" class="switch">
                                            <input type="hidden" name="id" value="{{$user->id}}"/>
                                            <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="1" data-off="0" {{ $user->active ? 'checked' : '' }}/>
                                            <span class="slider"></span>
                                            </label>
                                        </form>

                            
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
<script>  

    $(function() {

$('.toggle-class').change(function() {
    


    var active = $(this).prop('checked') == true ? 1 : 0; 

    var id = $(this).data('id'); 

     

    $.ajax({

        type: "POST",

        dataType: "json",

        url: 'employees/update',

        data: { '_token' : '{{csrf_token()}}',
                'active': active, 
                'id': id
              },

        success: function(data){

          console.log(data.success)

        }
    });

})

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
