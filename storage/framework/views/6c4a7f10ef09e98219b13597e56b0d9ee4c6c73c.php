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
.pointer{
        cursor: pointer;
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
                    </div><!-- portlet-title -->
                    <div class="portlet-body" >
                        <div class="row customRow">
                          <div class="col-md-2">
                            <label>GT-ID</label>
                            <input type="text" class="form-control" value="" id="gt_id">
                          </div>
                          <div class="col-md-2" id="">
                            <label>Adjustment Type</label>
                            <select id="adjustment_type"  class="form-control">
                                <option value="">Select </option>
                                <option value="Miss Tap">Missed Tap</option>
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
                            <table class="table table-striped table-bordered table-hover" id="PendingAprovalsAdjustmentsT">
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

                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adjustment Approval</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="Approval_id" id="Approval_id">
            <input type="hidden" name="operation" id="operation">
            <input type="hidden" name="effected_date" id="effected_date">
          <p><input type="radio" name="adjustment" value="1" class="adjustment">  Effect on leave</p>
          <p><input type="radio" name="adjustment" value="2" class="adjustment">  Effect on Pay role</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info exceptional_approve" data-dismiss="modal">Approve</button>
        </div>
      </div>
      
    </div>
  </div>

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
$("#gt_id").inputmask("mask", {
            "mask": "99-999"
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
             App.startPageLoading(); 

           $.ajax({
                data:data,
                method:'GET',
                url:main_url+'/adjustment_approval_table_rows',
                    success:function(response){
   

                            setTimeout(function(){
                                    $('#PendingAprovalsAdjustmentsT').DataTable().destroy();

                                    $('#PendingAprovalsAdjustmentsT tbody').html("");
                            $('#PendingAprovalsAdjustmentsT tbody').append(response);
                                  $('#PendingAprovalsAdjustmentsT').DataTable();
                                                                 App.stopPageLoading(); 

                            //     if( ! $.fn.DataTable.isDataTable( '#PendingAprovalsAdjustmentsT' ) ) {
                            //       $('#PendingAprovalsAdjustmentsT').DataTable().destroy()
                            //       $('#PendingAprovalsAdjustmentsT').DataTable();
                            //      }
                            },1000)
                            
             
                            
                    }
                
             });




})



$(document).on('click','.approve_btn',function(){
    var main_url=$('.main_url').val();
    var table_id=$(this).data('approval_id');
    var operation_name=$(this).data('operation');
    var effected_date=$(this).data('effected_date');
    var data={
            'Approval_id':table_id,
            'Operation':operation_name,
            'Adjust_Effect':effected_date
        };
         App.startPageLoading(); 

           $.ajax({
                data:data,
                method:'GET',
                url:main_url+'/adjustment_approval_Operation',
                    success:function(response){
                     App.stopPageLoading(); 
                     $('.div_'+table_id).html('<p>Status Approved</p>')
                     // $(this).html()
                      // noty({text: 'Approved Successfully', layout: 'topRight', type: 'success' , timeout: 4000,});
                    }
                
             });
    return false;
});

$(document).on('click','.disapprove_btn',function(){
    var main_url=$('.main_url').val();
    var table_id=$(this).data('approval_id');
    var operation_name=$(this).data('operation');
    var effected_date=$(this).data('effected_date');
    var data={
            'Approval_id':table_id,
            'Operation':operation_name,
            'Adjust_Effect':effected_date
        };
         App.startPageLoading(); 

           $.ajax({
                data:data,
                method:'GET',
                url:main_url+'/adjustment_disapproval_Operation',
                    success:function(response){
                     App.stopPageLoading(); 
                     $('.div_'+table_id).html('<p>Status Disapproved</p>')
                     // $(this).html()
                      // noty({text: 'Approved Successfully', layout: 'topRight', type: 'success' , timeout: 4000,});
                    }
                
             });
    return false;
});

$(document).on('click','.approval_modal',function(){
    var main_url=$('.main_url').val();
    var table_id=$(this).data('approval_id');
    var operation_name=$(this).data('operation');
    var effected_date=$(this).data('effected_date');
    $('#Approval_id').val(table_id);
    $('#operation').val(operation_name);
    $('#effected_date').val(effected_date);


           
    return false;
});




$(document).on('click','.exceptional_approve',function(){
    var main_url=$('.main_url').val();
    var approval_id=$('#Approval_id').val();
    var operation=$('#operation').val();
    var effected_date=$('#effected_date').val();
    var adjustment_type=$('.adjustment:checked').val();

    var data={
        'adjustment_type':adjustment_type,
        'Approval_id':approval_id,
        'Operation':operation,
        'Adjust_Effect':adjustment_type
    };
     App.startPageLoading(); 
$.ajax({
                data:data,
                method:'GET',
                url:main_url+'/adjustment_approval_Operation',
                    success:function(response){
                           App.stopPageLoading(); 
                         // noty({text: 'Approved Successfully', layout: 'topRight', type: 'success' , timeout: 4000,});
                          $('.div_'+approval_id).html('<p>Status Approved</p>')


     
                            
                    }
                
             });

});

var pagefunction = function() {


    Demo.init();
    App.init();






 



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

