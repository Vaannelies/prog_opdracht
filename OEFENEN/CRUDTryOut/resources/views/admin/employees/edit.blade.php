@extends('layouts.employee')

@section('content')

<title>Edit</title>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">Edit Data</h3>
        <br/>

        @if(count($errors) > 0)

            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>

        @endif
       
        <form method="post" action="{{action('\App\Http\Controllers\Admin\UsersController@update', $id)}}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="hidden" name="_method" value="PATCH" />

                
                    <input type="text" name="firstname" class="textbox"
                    value="{{$user->firstname}}" placeholder="Enter first name"/>
                    
                    <input type="text" name="lastname" class="textbox"
                    value="{{$user->lastname}}" placeholder="Enter last name"/>

                    <input type="email" name="email" class="textbox"
                    value="{{$user->email}}" placeholder="Enter email"/>

                    <input type="date" name="date_birth" class="textbox"
                    placeholder="Enter date of birth" value="{{$user->date_birth}}"/>

                    <select name="gender" class="textbox">

                    @if($user['gender']=='Female') <!--selected value says female-->
                        <option value="" disabled selected>Select gender</option>
                        <option value="Female" selected>Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                    @elseif($user['gender']=='Male') <!--selected value says male-->
                        <option value="" disabled selected>Select gender</option>
                        <option value="Female">Female</option>
                        <option value="Male" selected>Male</option>
                        <option value="Other">Other</option>
                    @elseif($user['gender']=='Other') <!--selected value says male-->
                        <option value="" disabled selected>Select gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other" selected>Other</option>
                    @endif
                    

                    <input type="date" name="employee_since" class="textbox" 
                    value="{{$user->employee_since}}" placeholder="Employee since..."/>

                    <div>
                    <h3>Active?</h3>
                    <label id="switch" class="switch">
                    <input id="check" type="checkbox" name="active" class="textbox" value="1"/>
                    <span class="slider"></span>
                    </label>
                    </div>
                  

                    <div style="display:flex; justify-content: center;">
                        <h3>Roles</h3>
                        <div style="display:flex; flex-direction: column">
                            @foreach($roles as $role)
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if($user->roles->contains($role->id)) checked=checked @endif/>
                                <label>{{$role->name}}</label>
                            @endforeach
                        </div>
                    </div>

                    <div style="display:flex; justify-content: center;">
                    
                        <div style="display:flex; flex-direction: row; align-items:center;">
                            <h3>Species</h3>
                            
                            <select name="species">
                            @foreach($species as $specie)
                              
                                <option value="{{$specie->id}}"   
                                @if($user->species->contains($specie->id)) 
                                selected 
                                @endif
                                >
                                {{$specie->name}}</option>
                              
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="button" value="Submit"/>
            </div>
        </form>
        
    </div>
</div>

<script>
    window.addEventListener("load", function(){

        var employee_status = <?php echo $user['active']?>;
        if(employee_status == 0)
        {
            document.getElementById("check").checked = false;
        } else { 
            document.getElementById("check").checked = true;
        }
    })
</script>

@endsection


