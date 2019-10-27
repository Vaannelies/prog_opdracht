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



                            
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
       
            
</div>
        @endsection
