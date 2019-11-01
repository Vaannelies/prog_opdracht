<p>

</p>

@if(isset($myanimals))
        
       
      
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
                        <td>{{$myanimal->name}}</td>
                        <td>{{$myanimal->species->name}}</td>



                        
                
                    </tr>
                @endforeach
            </tbody>
        </table>
@else
   
    <h1>There are no animals.</h1>
    
@endif
 