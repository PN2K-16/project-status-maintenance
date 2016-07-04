@extends('master') 


@section('css')

        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/select2/select2-bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/dropzonejs/dropzone.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
       


@endsection

 




@section('content')

<div class="col-md-offset-2 col-md-8 col-xs-12"> 
   
<div class="block">
      
                                
                                <div class="block-content  ">
   
                                     <h2>Add Project</h2>
                                    <br>
                                    <div id="successL"></div>
                                    
                                    <form class="form-horizontal push-5-t"    id="leadf" onsubmit="return save()">
<div class="form-group">
<label class="col-xs-12" for="register1-username">Project Title</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="register1-username" name="title" placeholder="Enter  Project Title" required>
</div>
</div>
<div class="form-group">
<label class="col-xs-12" for="register1-email">Incharge</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="register1-email" name="incharge" placeholder="Name of the person Incharge"  >
</div>
</div>
                                        
                                        
                                        <div class="form-group">
<label class="col-xs-12  " for="example-datepicker1">Finishing Date</label>
<div class="col-xs-12">
<input class="js-datepicker form-control" type="text" id="example-datepicker1" name="expected" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
</div>
</div>
       <div class="form-group">
<label class="col-xs-12" for="percentage">Percentage</label>
<div class="col-xs-12">
<input class="form-control" type="text"   name="percentage" placeholder="Percentage">
</div>
</div>
                                        
                                       
       <div class="form-group">
<label class="col-xs-12" for="status">Status</label>
<div class="col-xs-12">
<select class="form-control"    name="status"  >
    
    <option value="In-Progress">In-Progress</option>
      <option value="Done">Completed</option>
      <option value="Pending">Pending</option>
    
    </select>
</div>
</div>
                                        
                                             <div class="form-group">
<label class="col-xs-12" for="dept">Department</label>
<div class="col-xs-12">
<select class="form-control"     name="dept"  >
    
    <option value="Life">Life</option>
      <option value="Motor">Motor</option>
      <option value="Shared">Shared Services</option>
    
    </select>
</div>
</div>
                                          
                                              <div class="form-group">
<label class="col-xs-12" for="remarks">Remarks</label>
<div class="col-xs-12">
<textarea class="form-control"    name="remarks"  >
 
    </textarea>
</div>
</div>                                  
 
 
<div class="form-group">
    <div class="col-md-8 ">
    </div>
<div class="col-md-4 ">
<button class="btn btn-block btn-success pull-right" type="submit" id="s2" > Save </button>
</div>
</div>
</form>
        <button class="btn btn-block btn-info" data-toggle="modal" id="modal1" data-target="#modal-top" type="button" disabled>Add New Sub Task</button>
                                    
                                    
                                    <div id="successL1" ></div>                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                
                                </div>
    <br>
    <div class="container-fluid "   >
    
    <table class="table table-hover  table-striped">
        <thead>
        
        <th>Sub Task Name</th>
              <th>Status</th>
              <th>Finish Date</th>
        
        </thead>
        <tbody id="tb">
        
        
        </tbody>
        
        </table>
    
    
    
    </div>
    
                            </div>
</div>
 <div class="modal fade" id="modal-top">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Sub Tasks</h4>
      </div>
        <form id="sub" onsubmit="return sub()" class="form-horizontal push-5-t">
      <div class="modal-body">
          <input id="main" name="main" type="text" hidden="true">
          <div class="form-group">
<label class="col-xs-12" for="register1-email">Sub Task Name</label>
<div class="col-xs-12">
<input class="form-control" type="text"  name="subname" placeholder="Name of the Sub Task"  >
</div>
</div>
               <div class="form-group">
<label class="col-xs-12" for="status">Status</label>
<div class="col-xs-12">
<select class="form-control"    name="status1"  >
    
    <option value="In-Progress">In-Progress</option>
      <option value="Done">Completed</option>
      <option value="Pending">Pending</option>
    
    </select>
</div>
</div>
                                        <div class="form-group">
<label class="col-xs-12  " for="example-datepicker1">Finished Date</label>
<div class="col-xs-12">
<input class="js-datepicker form-control" type="text"   name="finished" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
</div>
</div>     
          
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
            </form>
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
    
    
    
    
    
    function save(){
    
    
    
     document.getElementById('successL').innerHTML = '	<div class="alert alert-dismissible alert-success"    >  <button type="button" class="close" data-dismiss="alert">×</button>  <a href="#" class="alert-link">Loading...</a>. </div>';
        var data = $('#leadf').serialize();
        
        console.log(data);
        
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
       
    
        
    
    
    return false;

    
    
    }
    
     
    function sub(){
    
    
    
     document.getElementById('successL1').innerHTML = '	<div class="alert alert-dismissible alert-success"    >  <button type="button" class="close" data-dismiss="alert">×</button>  <a href="#" class="alert-link">Loading...</a>. </div>';
        var data = $('#sub').serialize();
        
        console.log(data);
        
             $.ajax({
                type: "get",
                url: "save_sub",
                data: data,
                success: function (data) {
                    
                    document.getElementById('successL1').innerHTML = '	<div class="alert alert-dismissible alert-success"    >  <button type="button" class="close" data-dismiss="alert">×</button>  <strong>Well done!</strong> You have successfully <a href="#" class="alert-link">added a Sub Task.</a>. </div>';
                    var body ="";
                    
                    for(var i = 0; i< data.length; i++){
                    body += '<tr> <td>'+data[i].sub_name+' </td> <td>'+data[i].status+' </td> <td>'+data[i].finished+' </td>';
                    
                    }
                    document.getElementById("tb").innerHTML= body;
                    
                      $("modal-top").modal("hide");
               
                    
                    
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                     // document.getElementById("svbtn").removeAttribute("hidden",false);
                    console.log(thrownError);
      document.getElementById('successL1').innerHTML = '	<div class="alert alert-dismissible alert-danger"    >  <button type="button" class="close" data-dismiss="alert">×</button>  <strong>Oops!</strong> omething went wrong. <a href="#" class="alert-link">Please contact your system administrator.</a>. </div>';
                }
            });  
       
    
        
    
    
    return false;

    
    
    }
    
    
        </script>







@endsection




@section('init')


    document.getElementById("pmart").click();
    document.getElementById("pmart4").setAttribute("class","active");

@endsection






@section('scripts')
            


        <script src="{{ URL::asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/dropzonejs/dropzone.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
           
            
            
            
            
            
@endsection    





