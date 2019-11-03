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

                    <label>First name</label>
                    <input type="text" name="firstname" class="textbox"
                    value="{{$user->firstname}}" placeholder="Enter first name"/>
                    
                    <label>Last name</label>
                    <input type="text" name="lastname" class="textbox"
                    value="{{$user->lastname}}" placeholder="Enter last name"/>

                    <label>E-mail</label>
                    <input type="email" name="email" class="textbox"
                    value="{{$user->email}}" placeholder="Enter email"/>

                    <label>Date of birth</label>
                       <input type="date" name="date_birth" class="textbox"
                    placeholder="Enter date of birth" value="{{$user->date_birth}}"/>


                    <label>Gender</label>
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
                    </select>
                    
                    <label>Employee since</label>
                    <input type="date" name="employee_since" class="textbox" 
                    value="{{$user->employee_since}}" placeholder="Employee since..."/>
                   



                    <div style="display:flex; justify-content:center;">
                            <div style="display:flex; flex-direction: column; width:100%">   
                                    <div style="">
                                    <div style="display:flex; flex-direction: row; align-items:center; justify-content:space-between">
                                            <label>Active?</label>
                                            <label id="switch" class="switch">
                                            <input id="check" type="checkbox" name="active" class="textbox" value="1"/>
                                            <span class="slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                

                                    <div style="">
                                    
                                    <div style="display:flex; flex-direction: row; align-items:center; justify-content:space-between">
                                            <label>Role</label>
                                            <select name="roles" class="textbox" style="width: 50%;">
                                                @foreach($roles as $role)
                                                    <div>
                                                        <option value="{{$role->id}}"
                                                        @if($user->roles->contains($role->id)) 
                                                        selected 
                                                        @endif
                                                        >{{$role->name}}</option>
                                                    </div>
                                                @endforeach
                                            <select>
                            
                                        </div>
                                    </div>

                                

                                    <div style="">
                                    
                                    <div style="display:flex; flex-direction: row; align-items:center; justify-content:space-between">
                                        <label>Species</label>
                                            
                                        <select name="species" class="textbox" style="width: 50%;">
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


