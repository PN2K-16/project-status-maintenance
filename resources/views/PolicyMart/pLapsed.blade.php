@extends('master') 






@section('css')

        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/select2/select2-bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/dropzonejs/dropzone.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
       


@endsection



@section('title')

 

Premium Lapsed

@endsection


@section('subtitle')

 Policies Mart


@endsection


 



@section('crumbs')

 <ol class="breadcrumb push-10-t">
                                <li>Policies Mart</li>
                                <li><a class="link-effect" href="#">Premium Lapsed</a></li>
                            </ol>

@endsection




@section('content')


<div class="block">
 
<div class="block-content block-content-full">
<table class="table  table-borderless table-vcenter table-responsive table-hover">
<thead>
<tr>
<th colspan="3"  style="align:left">SHARED SERVICES</th>
 
<th class="text-center col-md-2 " style=" ">Incharge</th>
<th class="text-center col-md-1 " style=" ">  Expected</th>
       <th class="text-center hidden-xs hidden-sm col-md-1" style=" ">Percentage</th>
<th class="text-center col-md-1 " style="  ">Status</th>
    <th></th>
</tr>
</thead>
<tbody>
    
    <?php  ; 
    
      $s1 = 0;

    
    ?>
@foreach($shared as $s) 
    
    <?php
    if(($s1 % 2)=='1'){
    $class2 = "active";
    }
else{
  $class2 = "";

}
$s1++;
    ?>
    
<tr class="{{$class2}}" data-toggle="collapse" data-target=".{{$s->id}}">
<td class="  " style="width: 75px;">
    @if($s->status == 'Done')
<i class="si si-check fa-2x"></i>
    @else
    @if($s->status == 'In-Progress')
   
    <i class=" si si-settings fa-2x"></i>
    @else
      <i class=" si si-bell fa-2x"></i>
    @endif
    @endif
</td>
<td class=" " colspan="2">
<h4 class="h5 font-w600 push-5  ">
<a href="#">{{$s->name}}</a>
</h4>
<div class="font-s13 text-muted">{{$s->remarks}}</div>
</td>
    <td class="text-center ">
        
        
<a class="font-w600" href="javascript:void(0)">{{$s->incharge}} </a>
 
</td>
<td class="text-center  ">
    
    <?php 
    
      $newDate2 = date("d-M-Y", strtotime($s->expected));
    
    
    
    ?>
    
    
<span class="font-w600" href="javascript:void(0)">{{$newDate2}} </span>
</td>
<td class="text-center hidden-xs hidden-sm ">
<div class="progress progress-mini">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
</div>
</td>
<td class="   "  >
    
    <?php             
    
    
$date12=date_create(date("Y-m-d"));
$date22=date_create($s->expected);
$diff2=date_diff($date12,$date22);
    
    //$date1=date_create("2013-03-15");
//$date2=date_create("2013-12-12");
//$diff=date_diff($date1,$date2);
//result +272 days

//if minus comes overdue
$stat2 =  $diff2->format("%R%a");
    ?>
     
    @if($s->status != 'Done' &&  $stat2 < 0)
    
       <a class="  btn btn-danger btn-block " href="javascript:void(0)">Overdue </a>
    @else
    @if($s->status == 'Done')
    
     <a class="  btn btn-success btn-block " href="javascript:void(0)">Completed </a>
    
    @else
      @if($s->status == 'In-Progress')
     <a class="  btn btn-info btn-block " href="javascript:void(0)">{{$s->status}} </a>
    
    
    @else
     @if($s->status == 'Pending')
     <a class="  btn btn-warning btn-block " href="javascript:void(0)">{{$s->status}} </a>
    @else
     <a class="  btn btn-danger btn-block " href="javascript:void(0)">{{$s->status}} </a>
    @endif
    
    @endif
    @endif
    
    @endif
    
    
    
 
</td>
    <td> <button class="btn btn-danger " onclick="del('{{$s->id}}')">Delete </button></td>
    
</tr>
    <?php $ssub =  DB::table('project_sub')->where('main_id','=',$s->id)->get(); 
    
    $ssubcount = 0;
    ?>
    
    @foreach($ssub as $ss)
    
    <?php  $ssubcount++;   ?>
   <tr    class="hiddenRow collapse {{$s->id }}" >
             <td    >
                
            </td>
       
            <td   style="border-bottom:rgba(163, 194, 194,0.1) solid 1px; width: 500px; ">
                <div style="padding-left:2%" ><i class=" fa fa-angle-right"></i> &nbsp; &nbsp;{{$ss->sub_name}} 
                    
                   
                
                
                </div>
            </td>
       <td style="border-bottom:rgba(163, 194, 194,0.1) solid 1px;" >
       
        @if($ss->status == 'Done')
                    
                    
                    <span class="badge badge-success"><i class="fa fa-check"></i> Completed on {{$ss->finished}}</span>
                    
                    @else
                    
                      <span class="badge badge-warning"><i class="fa fa-exclamation-circle"></i> Pending </span>
                   
                    
                    @endif
                
       
       </td>
            <td colspan="4">  
       </td>
        </tr>  
    
    @endforeach
    
    
@endforeach
    

    </tbody>
    </table>
 











</div>
</div>









<div class="block">
 
<div class="block-content block-content-full">
<table class="table  table-borderless table-vcenter table-responsive table-hover">
<thead>
<tr>
<th colspan="3"  style="align:left">MOTOR</th>
 
<th class="text-center col-md-2 " style=" ">Incharge</th>
<th class="text-center col-md-1 " style=" ">  Expected</th>
       <th class="text-center hidden-xs hidden-sm col-md-1" style=" ">Percentage</th>
<th class="text-center col-md-1 " style="  ">Status</th>
    
    <th></th>
</tr>
</thead>
<tbody>
    
    <?php $class = 'active'; 
    
     $m1=0;
        $l1 = 0;

    
    ?>
@foreach($motor as $m) 
    
    <?php
    if(($m1 % 2)=='1'){
    $class = "active";
    }
else{
  $class = "";

}
$m1++;
    ?>
    
<tr class="{{$class}}" data-toggle="collapse" data-target=".{{$m->id}}">
<td class="  " style="width: 75px;">
    @if($m->status == 'Done')
<i class="si si-check fa-2x"></i>
    @else
    @if($m->status == 'In-Progress')
   
    <i class=" si si-settings fa-2x"></i>
    @else
      <i class=" si si-bell fa-2x"></i>
    @endif
    @endif
</td>
<td class=" " colspan="2">
<h4 class="h5 font-w600 push-5  ">
<a href="#">{{$m->name}}</a>
</h4>
<div class="font-s13 text-muted">{{$m->remarks}}</div>
</td>
    <td class="text-center ">
        
        
<a class="font-w600" href="javascript:void(0)">{{$m->incharge}} </a>
 
</td>
<td class="text-center  ">
    
    <?php 
    
      $newDate = date("d-M-Y", strtotime($m->expected));
    
    
    
    ?>
    
    
<span class="font-w600" href="javascript:void(0)">{{$newDate}} </span>
</td>
<td class="text-center hidden-xs hidden-sm ">
<div class="progress progress-mini">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
</div>
</td>
<td class="   "  >
    
    <?php             
    
    
$date1=date_create(date("Y-m-d"));
$date2=date_create($m->expected);
$diff=date_diff($date1,$date2);
    
    //$date1=date_create("2013-03-15");
//$date2=date_create("2013-12-12");
//$diff=date_diff($date1,$date2);
//result +272 days

//if minus comes overdue
$stat =  $diff->format("%R%a");
    ?>
     
    @if($m->status != 'Done' &&  $stat < 0)
    
       <a class="  btn btn-danger btn-block " href="javascript:void(0)">Overdue </a>
    @else
    @if($m->status == 'Done')
    
     <a class="  btn btn-success btn-block " href="javascript:void(0)">Completed </a>
    
    @else
      @if($m->status == 'In-Progress')
     <a class="  btn btn-info btn-block " href="javascript:void(0)">{{$m->status}} </a>
    
    
    @else
     @if($m->status == 'Pending')
     <a class="  btn btn-warning btn-block " href="javascript:void(0)">{{$m->status}} </a>
    @else
     <a class="  btn btn-danger btn-block " href="javascript:void(0)">{{$m->status}} </a>
    @endif
    
    @endif
    @endif
    
    @endif
 
</td>
    <td><button class="btn btn-danger btn-block" onclick="del('{{$s->id}}')"> </button></td>
    
</tr>
    <?php $msub =  DB::table('project_sub')->where('main_id','=',$m->id)->get(); 
    
    $subcount = 0;
    ?>
    
    @foreach($msub as $ms)
    
    <?php  $subcount++;   ?>
   <tr    class="hiddenRow collapse {{$m->id }}" >
             <td    >
                
            </td>
       
            <td   style="border-bottom:rgba(163, 194, 194,0.1) solid 1px; width: 500px; ">
                <div style="padding-left:2%" ><i class=" fa fa-angle-right"></i> &nbsp; &nbsp;{{$ms->sub_name}} 
                    
                   
                
                
                </div>
            </td>
       <td style="border-bottom:rgba(163, 194, 194,0.1) solid 1px;" >
       
        @if($ms->status == 'Done')
                    
                    
                    <span class="badge badge-success"><i class="fa fa-check"></i> Completed on {{$ms->finished}}</span>
                    
                    @else
                    
                      <span class="badge badge-warning"><i class="fa fa-exclamation-circle"></i> Pending </span>
                   
                    
                    @endif
                
       
       </td>
            <td colspan="4">  
       </td>
        </tr>  
    
    @endforeach
    
    
@endforeach
    

    </tbody>
    </table>
 











</div>
</div>

 



<div class="block">
 
<div class="block-content block-content-full">
<table class="table  table-borderless table-vcenter table-responsive table-hover">
<thead>
<tr>
<th colspan="3"  style="align:left">LIFE</th>
 
<th class="text-center col-md-2 " style=" ">Incharge</th>
<th class="text-center col-md-1 " style=" ">  Expected</th>
       <th class="text-center hidden-xs hidden-sm col-md-1" style=" ">Percentage</th>
<th class="text-center col-md-1 " style="  ">Status</th>
</tr>
</thead>
<tbody>
    
 
@foreach($life as $l) 
    
    <?php
    if(($l1 % 2)=='1'){
    $class1 = "active";
    }
else{
  $class1 = "";

}
$l1++;
    ?>
    
<tr class="{{$class1}}" data-toggle="collapse" data-target=".{{$l->id}}">
<td class="  " style="width: 75px;">
    @if($l->status == 'Done')
<i class="si si-check fa-2x"></i>
    @else
    @if($l->status == 'In-Progress')
   
    <i class=" si si-settings fa-2x"></i>
    @else
      <i class=" si si-bell fa-2x"></i>
    @endif
    @endif
</td>
<td class=" " colspan="2">
<h4 class="h5 font-w600 push-5  ">
<a href="#">{{$l->name}}</a>
</h4>
<div class="font-s13 text-muted">{{$l->remarks}}</div>
</td>
    <td class="text-center ">
        
        
<a class="font-w600" href="javascript:void(0)">{{$l->incharge}} </a>
 
</td>
<td class="text-center  ">
    
    <?php 
    
      $newDate1 = date("d-M-Y", strtotime($l->expected));
    
    
    
    ?>
    
    
<span class="font-w600" href="javascript:void(0)">{{$newDate1}} </span>
</td>
<td class="text-center hidden-xs hidden-sm ">
<div class="progress progress-mini">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
</div>
</td>
<td class="   "  >
    
    <?php             
    
    
$date11=date_create(date("Y-m-d"));
$date21=date_create($l->expected);
$diff1=date_diff($date11,$date21);
    
    //$date1=date_create("2013-03-15");
//$date2=date_create("2013-12-12");
//$diff=date_diff($date1,$date2);
//result +272 days

//if minus comes overdue
$stat1 =  $diff1->format("%R%a");
    ?>
     
    @if($l->status != 'Done' &&  $stat1 < 0)
    
       <a class="  btn btn-danger btn-block " href="javascript:void(0)">Overdue </a>
    @else
    @if($l->status == 'Done')
    
     <a class="  btn btn-success btn-block " href="javascript:void(0)">Completed </a>
    
    @else
      @if($l->status == 'In-Progress')
     <a class="  btn btn-info btn-block " href="javascript:void(0)">{{$l->status}} </a>
    
    
    @else
     @if($l->status == 'Pending')
     <a class="  btn btn-warning btn-block " href="javascript:void(0)">{{$l->status}} </a>
    @else
     <a class="  btn btn-danger btn-block " href="javascript:void(0)">{{$l->status}} </a>
    @endif
    
    @endif
    @endif
    
    @endif
 
</td>
    <td><button class="btn btn-danger btn-block" onclick="del('{{$s->id}}')"> </button></td>
</tr>
    <?php $lsub =  DB::table('project_sub')->where('main_id','=',$l->id)->get(); 
    
    $subcount1 = 0;
    ?>
    
    @foreach($lsub as $ls)
    
    <?php  $subcount1++;   ?>
   <tr    class="hiddenRow collapse {{$l->id }}" >
             <td    >
                
            </td>
       
            <td   style="border-bottom:rgba(163, 194, 194,0.1) solid 1px; width: 500px; ">
                <div style="padding-left:2%" ><i class=" fa fa-angle-right"></i> &nbsp; &nbsp;{{$ls->sub_name}} 
                    
                   
                
                
                </div>
            </td>
       <td style="border-bottom:rgba(163, 194, 194,0.1) solid 1px;" >
       
        @if($ls->status == 'Done')
                    
                    
                    <span class="badge badge-success"><i class="fa fa-check"></i> Completed on {{$ls->finished}}</span>
                    
                    @else
                    
                      <span class="badge badge-warning"><i class="fa fa-exclamation-circle"></i> Pending </span>
                   
                    
                    @endif
                
       
       </td>
            <td colspan="4">  
       </td>
        </tr>  
    
    @endforeach
    
    
@endforeach
    

    </tbody>
    </table>
 











</div>
</div>

<div class="modal fade" id="mod">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&close;</button>
        <h4 class="modal-title">Are you sure?</h4>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" id="del11" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>





@endsection




@section('js')

<script>
            $(function () {
                // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
                App.initHelpers(['datepicker', 'colorpicker', 'select2', 'masked-inputs', 'tags-inputs']);
            });
    
    
    
    
    
    function del(a){
    
    document.getElementById("del11").setAttribute("onclick","del1('"+a+"')");
    $('#mod').modal('show');
   
    }
    
    function del1(){
    
    
    $.ajax({
                type: "get",
                url: "save_main",
                data: data,
                success: function (data) {
                    
                    document.getElementById('successL').innerHTML = '	<div class="alert alert-dismissible alert-success"    >  <button type="button" class="close" data-dismiss="alert">×</button>  <strong>Well done!</strong> You have successfully <a href="#" class="alert-link">added a new Project.</a>. </div>';
                 document.getElementById('main').value = data;
                    document.getElementById('modal1').removeAttribute("disabled",true);
                     document.getElementById('s2').setAttribute("disabled",true);
               
                },
                error: function (xhr, ajaxOptions, thrownError) {
                     // document.getElementById("svbtn").removeAttribute("hidden",false);
                    console.log(thrownError);
      document.getElementById('successL').innerHTML = '	<div class="alert alert-dismissible alert-danger"    >  <button type="button" class="close" data-dismiss="alert">×</button>  <strong>Oops!</strong> omething went wrong. <a href="#" class="alert-link">Please contact your system administrator.</a>. </div>';
                }
            });  
    
    
    
    }
    
    
    
        </script>


@endsection




@section('init')


    document.getElementById("pmart").click();
    document.getElementById("pmart3").setAttribute("class","active");

@endsection






@section('scripts')
            


        <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/dropzonejs/dropzone.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
           
            
            
            
            
            
@endsection      


