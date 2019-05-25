<style>

.table-fixed-column-outter {
  position: relative;
}

.table-fixed-column-inner {
  overflow-x: scroll;
  overflow-y: visible;
      width: 80%;
    margin-left: 700px;
}

table.table-fixed-column {
  table-layout: fixed;
  width: 100%
}

table#harisOla td,
table#harisOla th {
  width: 200px;
  text-align:center;
}

table#harisOla th:first-child,
table#harisOla tr td:first-child {
    position: absolute;
    left: 0;
    width: 60px;
    text-align:left;
    height: 37px;
    line-height: 22px;
    background: #f1f1f1;
    border: 1px solid #e6e6e6;
    text-align: center;
}
table#harisOla td {
    color:#888; 
}
table#harisOla th:nth-child(2),
table#harisOla tr td:nth-child(2) {
    position: absolute;
    left: 60px;
    width: 60px;
    text-align:left;
    height: 37px;
    overflow: hidden;
    line-height: 22px;
    background: #f1f1f1;
    border: 1px solid #e6e6e6;
    text-align: center;
}
table#harisOla th:nth-child(3),
table#harisOla tr td:nth-child(3) {
    position: absolute;
    left: 120px;
    width: 60px;
    text-align:left;
    height: 37px;
    overflow: hidden;
    line-height: 22px;
    background: #f1f1f1;
    border: 1px solid #e6e6e6;
    text-align: center;
}
table#harisOla th:nth-child(4),
table#harisOla tr td:nth-child(4) {
    position: absolute;
    left: 180px;
    width: 60px;
    text-align:left;
    height: 37px;
    overflow: hidden;
    line-height: 22px;
    background: #f1f1f1;
    border: 1px solid #e6e6e6;
    text-align: center;
}
table#harisOla th:nth-child(5),
table#harisOla tr td:nth-child(5) {
    position: absolute;
    left: 240px;
    width: 60px;
    text-align:left;
    height: 37px;
    overflow: hidden;
    line-height: 22px;
    background: #f1f1f1;
    border: 1px solid #e6e6e6;
    text-align: center;
}
table#harisOla th:nth-child(6),
table#harisOla tr td:nth-child(6) {
    position: absolute;
    left: 300px;
    width: 250px;
    text-align:left;
    height: 37px;
    overflow: hidden;
    line-height: 22px;
    background: #f1f1f1;
    border: 1px solid #e6e6e6;
}
table#harisOla th:nth-child(7),
table#harisOla tr td:nth-child(7) {
    position: absolute;
    left: 550px;
    width: 150px;
    text-align:left;
    height: 37px;
    overflow: hidden;
    line-height: 22px;
    background: #f1f1f1;
    border: 1px solid #e6e6e6;
}
#SSP .modal-dialog {
    width: 70%;
    margin: 30px auto;
}
#SSPTable {
	width: 100%;
}
#SSPTable td {
	vertical-align: middle;
}
#SSPTable td:nth-child(n+2),
#SSPTable th:nth-child(n+2) {
	text-align: center;
	width: 150px;
}
.SSPOFF {
	background: #CCC !important;
}
.SSPON {
	background: #9fd4a5 !important;
}
.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-primary {
    color: #fff !important;
    background: #9fd4a5 !important;
}
@media screen and (max-width: 1822px) {
	.table-fixed-column-inner {
	  overflow-x: scroll;
	  overflow-y: visible;
	      width: 70%;
	    margin-left: 700px;
	}
}
@media screen and (max-width: 1550px) {
	.table-fixed-column-inner {
	  overflow-x: scroll;
	  overflow-y: visible;
	      width: 65%;
	    margin-left: 700px;
	}
}
@media screen and (max-width: 1450px) {
	.table-fixed-column-inner {
	  overflow-x: scroll;
	  overflow-y: visible;
	      width: 55%;
	    margin-left: 700px;
	}
}
@media screen and (max-width: 1270px) {
	.table-fixed-column-inner {
	  overflow-x: scroll;
	  overflow-y: visible;
	      width: 45%;
	    margin-left: 700px;
	}
}
</style>
<link rel="stylesheet" type="text/css" href="{{url('metronic')}}/global/css/x-editable/bootstrap-editable.css">
<div class="page-bar" style="margin-bottom:20px; ">
   <ul class="page-breadcrumb">
      <li>
         <a href="index.html">Home</a>
         <i class="fa fa-circle"></i>
      </li>
      <li>
         <span>Timing Super Profile</span>
      </li>
   </ul>
   <!-- page-breadcrumb -->
</div>
<!-- END PAGE BAR -->

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Timing Super Profile</h4>
            </div>

                <form class="form-horizontal" role="form" id="insert_super_profile">

                <div class="form-body" style="padding:20px 0;">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Name <span class="required">*</span>:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="super_profile_name" placeholder="Enter Super Profile Name" id="super_profile">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" id="super_profile_desc">Description:</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" id="super_descr"></textarea>
                        </div>
                    </div>

                </div>
                
                <div id="message">
                </div>

                </form>

            <div class="modal-footer" style="text-align:center;">
                
                <button type="button" class="btn green" onClick="insertSuper()" id="super_profile" >Insert Super Profile</button>
                <button type="button" class="btn gray btn-outline close2" data-dismiss="modal" >Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Added by HOL -->
<div class="modal fade" id="SSP" tabindex="-1" role="basic" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="0" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Schedule Super Profile</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="">
                	<table class="table table-striped table-bordered" id="SSPTable">
                		<thead>
                			<tr>
                				<th>TT Profiles</th>
                				<th>Level 0</th>
                				<th>Level 1</th>
                				<th>Level 2</th>
                				<th>Level 3</th>
                				<th>Level 4</th>
                			</tr>
                		</thead>
                		<tbody>
                    @foreach($profileDetail as $profile)
                      <tr>
                        <td>{{$profile->name}}</td>
                        <td><input type="checkbox" @if($profile->level_0=='1') checked @endif class="make-switch myswicth" data-profile_id="{{$profile->id}}" 
                          data-column_name="level_0" id="{{$profile->id}}" data-size="small"></td>
                        <td><input type="checkbox" @if($profile->level_1=='1') checked @endif class="make-switch myswicth" data-profile_id="{{$profile->id}}" 
                          data-column_name="level_1" id="{{$profile->id}}" data-size="small"></td>
                        <td><input type="checkbox" @if($profile->level_2=='1') checked @endif class="make-switch myswicth" data-profile_id="{{$profile->id}}" 
                          data-column_name="level_2" id="{{$profile->id}}" data-size="small"></td>
                        <td><input type="checkbox" @if($profile->level_3=='1') checked @endif class="make-switch myswicth" data-profile_id="{{$profile->id}}" 
                          data-column_name="level_3" id="{{$profile->id}}" data-size="small"></td>
                        <td><input type="checkbox" @if($profile->level_4=='1') checked @endif class="make-switch myswicth" data-profile_id="{{$profile->id}}" 
                          data-column_name="level_4" id="{{$profile->id}}" data-size="small"></td>
                      </tr>
                    @endforeach            


                		</tbody>
                	</table>
                  <input type="hidden" name="url" value="{{url('/')}}" class="main_url">

                </form>
            </div>
            <div class="modal-footer" style="text-align:center;">
                
                <button type="button" class="btn green" onClick="insertSuper()" id="super_profile" >Save Changes</button>
{{--                 <button type="button" class="btn gray btn-outline close2" data-dismiss="modal" >Close</button>
 --}}                <button type="button" class="btn close2" id="0" data-dismiss="modal" >Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Schedule Profile Modal -->
<div class="portlet light bordered fixed-height marginBottom0">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bubble font-green-sharp"></i>
            <span class="caption-subject font-green-sharp sbold">Super Profile</span>
        </div>
        <div class="actions">
            <div class="btn-group">
               <a class="btn red btn-outline sbold" data-toggle="modal" href="#basic"> Add Super Profile</a>
            </div>
            <div class="btn-group">
               <a class="btn red btn-outline sbold sp_modal" data-toggle="modal" href="#SSP"> Schedule Super Profile</a>
            </div>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
          <div class="col-md-9" id="Super_Profile_Container">
            <div class="table-fixed-column-outter">
              <div class="table-fixed-column-inner">
                <?php $TTpush = array(); ?>
                        <?php $SUpush = array(); ?>
                <table class="table-fixed-column table table-bordered table-striped" id="harisOla">
                  <thead style="">
                    <tr>
                      <th>Level 0</th>
                      <th>Level 1</th>
                      <th>Level 2</th>
                      <th>Level 3</th>
                      <th>Level 4</th>
                      <th>TT Profiles</th>
                      <th>TT Profile Timings</th>
                      <?php if(!empty($superProfile)) { ?>
                      <?php foreach($superProfile as $p) { ?>
                      <th><?php echo  ucwords($p->cat_name) ?></th>
                      <?php } ?>
                    </tr>
                    <?php } ?>
                    <!-- </tr> -->
                  </thead>
                  <tbody>
                    <?php if(!empty($profileDetail)) { ?>
                    <?php foreach($profileDetail as $profile) { ?>
                      <?php $profile_flag = 0; ?>
                      <tr>
                      	<td class="@if($profile->level_0==1) SSPON @else SSPOFF @endif">&nbsp;</td>
                      	<td class="@if($profile->level_1==1) SSPON @else SSPOFF @endif">&nbsp;</td>
                      	<td class="@if($profile->level_2==1) SSPON @else SSPOFF @endif">&nbsp;</td>
                      	<td class="@if($profile->level_3==1) SSPON @else SSPOFF @endif">&nbsp;</td>
                      	<td class="@if($profile->level_4==1) SSPON @else SSPOFF @endif">&nbsp;</td>
                        <td><span class="tooltips" data-original-title="<?=ucwords($profile->name) ?>"><?=ucwords($profile->name) ?></span></td>
                        <td><?php echo date('g:i A',strtotime($profile->mon_in)) ?>-<?php echo date('g:i A',strtotime($profile->mon_out)) ?></td>
                        <?php foreach($superProfile as $super) { ?>
                <?php $super_flag = 0; ?>
                            <?php foreach($getSuperProfileDetails as $superDetail) { ?>
                                    <?php if($superDetail->super_profile_id ==  $super->ID && $superDetail->profile_id == $profile->id ) {  ?>

                    <?php $profile_flag = 1 ?>
                    <?php $super_flag = 1 ?>

                                    <td>
                          <?php if($superDetail->is_on_mon == 1) {?>
                              <a href="javascript:void(0)"  class="MonIN" data-placement="bottom" data-title="Morning" data-profile_id ="<?php  echo $superDetail->profile_id ?>" data-super_profile="<?php echo $superDetail->super_profile_id ?>" data-pk="<?php echo $superDetail->id ?>" data-type="combodate"><?php echo date("g:i A",strtotime($superDetail->mon_in)) ?>
                              </a> &nbsp; - &nbsp; <a href="javascript:void(0)"  class="MonOUT" data-placement="bottom" data-title="Afternoon" data-profile_id ="<?php  echo $superDetail->profile_id ?>" data-super_profile="<?php echo $superDetail->super_profile_id ?>" data-pk="<?php echo $superDetail->id ?>" data-type="combodate">
                               <?php echo date("g:i A",strtotime($superDetail->mon_out)) ?>
                               </a>
                          <?php  } else { ?>
                            <a href="javascript:void(0)"  class="MonIN" data-placement="bottom" data-title="Morning" data-profile_id ="<?php  echo $superDetail->profile_id ?>" data-super_profile="<?php echo $superDetail->super_profile_id ?>" data-pk="<?php echo $superDetail->id ?>" data-type="combodate">00:00:00
                              </a> &nbsp; - &nbsp; <a href="javascript:void(0)"  class="MonOUT" data-placement="bottom" data-title="Afternoon" data-profile_id ="<?php  echo $superDetail->profile_id ?>" data-super_profile="<?php echo $superDetail->super_profile_id ?>" data-pk="<?php echo $superDetail->id ?>" data-type="combodate"> 00:00:00
                               </a>

                          <?php }  ?>
                  </td>
                          <?php } ?>

                              <?php } ?>

                              <?php if($super_flag == 0) { ?>
                              <td>
                               <a href="javascript:void(0)"  class="MonINInsert" data-placement="bottom" data-title="Morning" data-profile ="<?php echo $profile->id ?>" data-super="<?php echo $super->ID ?>" data-pk="1"  data-type="combodate" data-url="{{url('/InsertTimeIn')}}">00:00:00
                              </a> &nbsp; - &nbsp; <a href="javascript:void(0)"  class="MonOUTInsert" data-placement="bottom" data-title="Afternoon" data-profile ="<?php echo $profile->id ?>" data-super="<?php echo $super->ID ?>" data-pk="1" data-type="combodate" data-url="{{url('/InsertTimeOut')}}"> 00:00:00
                               </a>
                              </td>
                              <?php } ?>

                        <?php } ?>


                    </tr>
                    <?php }?>

                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

</div>
    </div><!-- -->



<script type="text/javascript">


var pagefunction = function() {
    Demo.init();
    App.init();
    editableMonInOut();
    editableInsertMonInOut();



};



var insertSuper =  function(){
    var $form = $('#insert_super_profile');
    var validator = $form.validate({
        rules:{super_profile_name:"required"},
        messages:{ super_profile_name:"Please Enter Super Profile Name", },
        
    });

    //validate the form
    validator.form();

    if($form.valid()){
        var super_profile = $('#super_profile').val();
        var super_profile_desc = $('#super_profile_desc').val();
        $.ajax({
            type:"POST",
            url:"{{ url('/insertSuperProfile')}}",
            data:{
                super_profile:super_profile,
                super_profile_desc:super_profile_desc,
                 "_token": "{{ csrf_token() }}",
            },
            success:function(e){
                var html = '';
                html = html + '<div class="alert alert-info" style="margin-bottom: 0;text-align: center;"><strong>Success!</strong> A new Super Profile named <strong>"' + super_profile + '"</strong> has added successfully. </div>';
                $('#message').html(html);
            }
            



        });
    }
}



$(".myswicth").on('switchChange.bootstrapSwitch', function (event, state) {

  var column_name=$(this).data('column_name');
  var profile_id=$(this).data('profile_id');
  var status=$(this).is(':checked');
  if(status==true){
    var level_status=1;
  }else{
    var level_status=0;
    }

  var data={
      'column_name':column_name,
      'profile_id':profile_id,
      'status':level_status,
  
    }

      $.ajax({
                data:data,
                method:'GET',
                url:$('.main_url').val()+'/updateLevel',
                    success:function(response){
            
                    }
             });
  

});  



$('.close').click(function(){
 
    $.ajax({
        type:"POST",
        url:"{{url('/getSuperProfileInteface')}}",
        data:{
            "_token": "{{ csrf_token() }}",
        },
        success:function(res){
        console.log(res);
        $('#Super_Profile_Container').html('');
        $("#Super_Profile_Container").html(res);
        editableMonInOut();
        editableInsertMonInOut();
        }

    }); // end replace html ajax 
     

});
$('.close2').click(function(){
  
    $.ajax({
        type:"POST",
        url:"{{url('/getSuperProfileInteface')}}",
        data:{
            "_token": "{{ csrf_token() }}",
        },
        success:function(res){
        console.log(res);
        $('#Super_Profile_Container').html('');
        $("#Super_Profile_Container").html(res);
        editableMonInOut();
        editableInsertMonInOut();
        }

    }); // end replace html ajax 
  
     

});


    $(document).on('click','.sbold',function(){
        $('#super_profile').val('');
        $('#super_descr').val('');
    });

    $(document).on('click','.sp_modal',function(){

    //   $.ajax({
    //     type:"GET",
    //     url:"{{url('/get_super_profile_modal')}}",
    //     success:function(res){
    //     console.log(res);
    //     $("#SSPTable tbody").html("");
    //     $("#SSPTable tbody").html(res);
        
    //     }

    // }); // end replace html ajax 

    });








     function editableMonInOut(){

        $('.MonIN').editable({
            type: 'text',
            format:'h:mm A',
            viewformat:'h:mm A',
            template: 'h:mm a',
            name:'mon_in',
            params:{
                "_token":"{{ csrf_token() }}"
            },
            url:"{{url('/updateTimeIn')}}",
            success: function(e){
                    console.log(e)
            }
        });

        $('.MonOUT').editable({

            type: 'text',
            format:'h:mm A',
            viewformat:'h:mm A',
            template: 'h:mm a',
            params:{
                "_token":"{{ csrf_token() }}"
            },
            name:'mon_in',
            url:"{{url('/updateTimeOut')}}",
            success: function(e){
                console.log(e)
            }

        });

        }


       function  editableInsertMonInOut(){
        $('.MonINInsert').editable({
            type: 'text',
            format:'h:mm A',
            viewformat:'h:mm A',
            template: 'h:mm a',
            name:'mon_in',
            params: function(params){
            params.profile_id = $(this).editable().data('profile');
            params.super_profile_id = $(this).editable().data('super');
            params._token ="{{ csrf_token() }}"
                return params;
            }

        });

        $('.MonOUTInsert').editable({
            type: 'text',
            format:'h:mm A',
            viewformat:'h:mm A',
            template: 'h:mm a',
            name:'mon_in',
            params: function(params){
            params.profile_id = $(this).editable().data('profile');
            params.super_profile_id = $(this).editable().data('super');
            params._token ="{{ csrf_token() }}"
            return params;
            }

        });
    }


var pagedestroy = function(){
}

loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){
                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
                                loadScript("{{ URL::to('metronic') }}/global/plugins/jquery-validation/js/jquery.validate.min.js",function(){
                                    loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
                                        loadScript("{{ URL::to('metronic') }}/global/plugins/x-editable/bootstrap-editable.min.js",function(){
                                            loadScript("{{ URL::to('metronic') }}/global/plugins/x-editable/moment.min.js",function(){
                                                loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction);
                                            });
                                        });
                                    });
                                });
                            });
                        });
                    });
                });
            });
        });
    });
});

</script>