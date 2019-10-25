
@extends('layouts.animal')

@section('content')
<title>View</title>
<div class="container">
    <div class="container-head">
    
    </div>

    <div class="container-body">


    </div>
 
    <br>
    <br>


          
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-mail</th>
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
 
</div>



<script>


</script>


@endsection

