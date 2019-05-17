<div id="content" style="opacity: 1;"><link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Adjustment Approval</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<style type="text/css">
#sample_4 th {
    background: #ebebeb;
    color: #888;
}
#sample_4 tbody tr td {vertical-align: middle;}

.btn-group>.dropdown-menu, .dropdown-toggle>.dropdown-menu, .dropdown>.dropdown-menu {
    margin-top: 10px;
    left: 0px;
}
.tooltip {z-index: 99999}
.customRow {
  padding: 20px;
  background: #e8bc40;
  margin: -10px 0 0 0;
}
.portlet.light>.portlet-title {
    padding: 10px 20px 0 !important;
}
.contentArea {
	padding:20px;
}
div#PendingAprovalsAdjustments_filter {
	float:right;
}
span.staffImg img {
	width: 60px;
    border: 1px solid #ccc;
}
span.staffImg {
    float: left;
    margin-right: 10px;
}
strong.light {
	color: #909090;
    font-weight: 500;
}
td.MissedTapEvent {
    border-left: 2px solid #01a1ff !important;
}
td.ExceptionalAdjEvent {
	border-left: 2px solid #58af34  !important;
}
</style>
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-12 fixed-height" id="" style="">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title tabbable-line">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Adjustment Approvals
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#portlet_tab1" data-toggle="tab"> Pending Approvals </a>
                            </li>
                            <li>
                                <a href="#portlet_tab2" data-toggle="tab"> Approved </a>
                            </li>
                            <li >
                                <a href="#portlet_tab3" data-toggle="tab"> Disapproved </a>
                            </li>
                            <li >
                                <a href="#portlet_tab4" data-toggle="tab"> Unattended </a>
                            </li>
                        </ul>
                    </div><!-- portlet-title -->
                    <div class="portlet-body" >
                    	<div class="tab-content">
                            <div class="tab-pane active" id="portlet_tab1">
                            	<div class="row customRow">
                                  <div class="col-md-2">
                                    <label>GT-ID</label>
                                    <input type="text" class="form-control" value="" id="gt_id">
                                  </div>
                                  <div class="col-md-2" id="">
                                    <label>Adjustment Type</label>
                                    <select id="adjustment_type"  class="form-control">
                                        <option value="">Select </option>
                                        <option value="Miss Tap">Miss Tap</option>
                                        <option value="Exceptional Adjustment">Exceptional Adjustment</option>
                                    </select>
                                  </div>
                                  <div class="col-md-2">
                                    <label>From</label>
                                    <input type="date" class="form-control" id="from_date">
                                  </div>
                                  <div class="col-md-2">
                                    <label>To</label>
                                    <input type="date" class="form-control" id="to_date">
                                  </div>
                                  <div class="col-md-2">
                                    <label>Approval Status</label>
                                    <select id="approval_status"  class="form-control">
                                        <option value="">Select </option>
                                        <option value="0">Pending</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Disapproved</option>
                                        <option value="3">Unattended</option>
                                    </select>
                                  </div>
                                  <div class="col-md-2">
                                    <label>&nbsp;</label><br />
                                    <input type="button" id="" data-re_generate="0" class="btn btn-group green get_result" value="Filter Results" style="width: 100%;">
                                  </div>
                                </div><!-- row -->
                                <div class="contentArea">
                                	<table class="table table-striped table-bordered table-hover" id="PendingAprovalsAdjustments">
                                            <thead>
                                                <tr>
                                                    <th width="10" style="text-align:center;">S No.</th>
                                                    <th> Person info </th>
                                                    <th> Approval For </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                               
                                            </tbody>
                                        </table>
                                </div><!-- contentArea -->
                            </div>
                            <div class="tab-pane" id="portlet_tab2">
                                <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                                    ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo. </p>
                                <p>
                                    <a class="btn red" href="ui_tabs_accordions_navs.html#portlet_tab2" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div>
                            <div class="tab-pane" id="portlet_tab3">
                                <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                    consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
                                <p>
                                    <a class="btn blue" href="ui_tabs_accordions_navs.html#portlet_tab3" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div>
                            <div class="tab-pane" id="portlet_tab4">
                                <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                    consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
                                <p>
                                    <a class="btn blue" href="ui_tabs_accordions_navs.html#portlet_tab3" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div>
                        </div>
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->


<script type="text/javascript">

loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/datatable.js", function(){
    loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/datatables/datatables.min.js", function(){
        loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
			loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/table-datatables-editable.min.js", function(){
				loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/profile.js", function(){
					loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/table-datatables-managed.js", function(){
						loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/bootbox/bootbox.min.js", function(){
							loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery.sparkline.min.js", function(){
								loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
									loadScript("<?php echo e(URL::to('metronic')); ?>/layouts/layout/scripts/demo.min.js", function(){
										loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/datatable-expand.js", function(){
                                            loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/app.min.js", pagefunction);
                                        });
									});
								});
							});
						}); /*End Bootbox*/
					});
				});
			});
        });
    });
});


$(document).on('click','.get_result',function(){
    var main_url=$('.main_url').val();
var gt_id=$('#gt_id').val();
var adjustment_type=$('#adjustment_type').val();
var from_date=$('#from_date').val();
var to_date=$('#to_date').val();
var approval_status=$('#approval_status').val()

var data={
            'gt_id':gt_id,
            'adjustment_type':adjustment_type,
            'from_date':from_date,
            'to_date':to_date,
            'approval_status':approval_status,
        };
           $.ajax({
                data:data,
                method:'GET',
                url:main_url+'/adjustment_approval_table_rows',
                    success:function(response){
                            $('#PendingAprovalsAdjustments tbody').html("");
                            $('#PendingAprovalsAdjustments tbody').append(response);                
                            
                    }
                
             });




})



var pagefunction = function() {


    Demo.init();
    App.init();






 
//var OP_function = function Operations(Operation, Approval_id, Adjustments_Effect=null)
//    {
//        
//
//        // alert( Approval_id )
//        // alert( Operation )
//
//
//            $.ajax({
//                type:"POST",
//                cache:true,
//                beforeSend:function()
//                { 
//                    App.startPageLoading(); 
//                },
//                url:"<?php echo e(url('/adjustment_approval_Operation')); ?>",
//                data:{
//                    Operation:Operation,Approval_id:Approval_id,Adjust_Effect:Adjustments_Effect,
//                    "_token": "<?php echo e(csrf_token()); ?>",
//                },
//                
//                success:function(result)
//                { 
//
//                },
//                error: function() 
//                { 
//                    // alert("Error occured.please try again");
//                    // $(placeholder).append(xhr.statusText + xhr.responseText);
//                    // $(placeholder).removeClass('loading');
//
//                },
//                complete: function() { App.stopPageLoading(); },
//            });
//            
//
//
//    }
//
//
//    var Delete_operation = function delete_approve_request(Approval_id,OType)
//    {
//
//
//            $.ajax({
//                type:"POST",
//                cache:true,
//                beforeSend:function()
//                { 
//                    App.startPageLoading(); 
//                },
//                url:"<?php echo e(url('/delete_approval_Operation')); ?>",
//                data:{
//                    Approval_id:Approval_id,OType:OType,
//                    "_token": "<?php echo e(csrf_token()); ?>",
//                },
//                
//                success:function(result)
//                { 
//
//                },
//                error: function() 
//                { 
//                    // alert("Error occured.please try again");
//                    // $(placeholder).append(xhr.statusText + xhr.responseText);
//                    // $(placeholder).removeClass('loading');
//
//                },
//                complete: function() { App.stopPageLoading(); },
//            });
//
//
//
//    }
//
//
// 
//
//
//
//    $(document).on("click", ".Adjustment_Operation", function(){
//        
//        
//        var $row = $(this).closest("tr");
//        var Approval_id = parseInt( $row.data('rowid') );
//
//        var Operation = $(this).data('name')
//        var OType = $row.data('type');
//
//
//        var Edit_id        =  $row.data('editid');
//        var Edit_type      =  $row.data('edittype');
//        var Eattendance_id =  $row.data('eattendance_id');
//
//
//        // alert( OType );
//        // alert( Operation );
//
//
//        // alert( Edit_id );
//        // alert( Edit_type );
//        // alert( Eattendance_id );
//
//        //alert( Approval_id );
//
//
//
//       if( OType =='Exceptional Adjustments')
//        {
//
//
//            bootbox.prompt({
//                title: "Adjustments Effect?",
//                inputType: 'radio',
//                inputOptions: [
//                 
//                {
//                    text: 'Effect on Staff Pay Role',
//                    value: 1,
//                },
//                {
//                    text: 'Effect on Staff Leave Balance',
//                    value: 2,
//                },
//
//                ],
//                callback: function (result) {
//                    
//                     
//                    if( result !== null ) 
//                    {
//                        $row.fadeOut(300, function() { $row.remove(); });
//                        OP_function(OType, Approval_id, result);    
//                    }
//                    
//                }
//            });
//
//
//
//        } 
//        else if( OType =='Absentia' )
//        {
//
//        }
//        else if( OType =='Unauthorized Leave Penalties' )
//        {
//
//        }
//        else if( OType =='Leave Applications' )
//        {
// 
// 
//
// 
//        }
//        else
//        {
//
//          // Missed Tap Event
//
//          
//          if( Operation == 'Operation_Edit')
//          {
//            editAddManual(Edit_id, Eattendance_id, Edit_type);
//          }
//          else if( Operation == 'Operation_Delete')
//          {
//            
//
//
//            bootbox.confirm({
//                title: "Approve",
//                message: "Yes Approve Request.",
//                buttons: {
//                    cancel: {
//                        label: '<i class="fa fa-times"></i> Cancel'
//                    },
//                    confirm: {
//                        label: '<i class="fa fa-check"></i> Confirm'
//                    }
//                },
//                callback: function (result) {
//                   
//
//                    if( result==true ) 
//                    {
//                      $row.fadeOut(300, function() { $row.remove(); });
//                      Delete_operation(Approval_id,5);
//                      deleteMistapRequest(Edit_id, Eattendance_id, Edit_type);
//
//                    }
//
//               
//
//
//                }
//            });
//
//
//
//          }
//          else
//          {
//            
//            bootbox.confirm({
//                title: "Approve",
//                message: "Yes Approve Request.",
//                buttons: {
//                    cancel: {
//                        label: '<i class="fa fa-times"></i> Cancel'
//                    },
//                    confirm: {
//                        label: '<i class="fa fa-check"></i> Confirm'
//                    }
//                },
//                callback: function (result) {
//                   
//
//                    if( result==true ) 
//                    {
//                       $row.fadeOut(300, function() { $row.remove(); });
//                       OP_function(OType, Approval_id);
//                    }
//
//               
//
//
//                }
//            });
//
//
//
//          } // end else Operation
//
//          
//
//
//
//
//        }
//
//
//
//           
//
//
//
//
//
//
//
//       
//
//        
//
//    });


}
</script>
<!-- Start Edit Absenia_id -->
  <?php echo $__env->make('attendance.staff.modals.absentia_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- End Edit Absenia_id-->

<!-- Leave Application Edit Functionality Modal-->
                         
<?php echo $__env->make('attendance.staff.modals.leave_application_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                
<!-- End Leave Applicaiton Modal -->

<!-- Exceptional Edit Functionality Modal-->
<?php echo $__env->make('attendance.staff.modals.exceptional_adjustment_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- End Exceptional Modal -->

<!-- Edit Penalties -->
<?php echo $__env->make('attendance.staff.modals.penalty_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- End Penalties -->
<!-- Edit Manual Attendance -->
<?php echo $__env->make('attendance.staff.modals.miss_tap_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- End Manual Attendance modal -->
<?php echo $__env->make('master_layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(URL::to('metronic')); ?>/global/scripts/hr_forms.js" type="text/javascript"></script>
<script src="<?php echo e(URL::to('metronic')); ?>/global/scripts/global_functions.js" type="text/javascript"></script>

