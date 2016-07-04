@extends('master') 


 



@section('content')

       
 
@endsection




@section('js')

<script>
     function clear123(){
     
     
     document.getElementById("searchf").reset();
     
     
     }       
            
            
</script>

@endsection




@section('init')


    document.getElementById("pmart").click();
    document.getElementById("pmart1").setAttribute("class","active");

@endsection
            
            
            
