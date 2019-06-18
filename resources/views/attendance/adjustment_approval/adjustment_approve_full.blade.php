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
                                <option value="Leave Application">Leave Application</option>
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
 <div class="modal fade" id="LeaveApproval" tabindex="-1" role="basic" aria-hidden="true">
                                     <div class="modal-dialog">
                                        <div class="modal-content">
                                           <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                              <h3 class="modal-title">Leave Application Approval</h3>
                                           </div><!-- modal-header -->
                                           <div class="modal-body" style="float:left;width:100%;">
                                              <div class="portlet box blue-hoki">
                                                 <div class="portlet-title">
                                                    <div class="caption">
                                                       <i class="fa fa-user"></i><font id="">Leave Approval</font>
                                                    </div>
                                                 </div>
                                                 <!-- portlet-title -->
                                                 <div class="headRightDetailsInner">
                                                    <table>
                                                       <tbody>
                                                          <tr id="">
                                                             <td class="" style="padding-right:10px;">
                                                                <img class="user-pic rounded absentia_staff_img tooltips" data-container="body" data-placement="top" data-original-title="12-045" src="" width="42">
                                                             </td>
                                                             <td class="staffView_StaffName">
                                                                <a href="javascript:;" class="primary-link tooltips absentia_staff_name" data-container="body" data-placement="top" data-original-title="AHK" data-staffid="289" data-staffgtid="12-045"></a> - <small class="absentia_name_code tooltips" data-container="body" data-placement="top" data-original-title="" ></small><br><small class="shortHeight"><span class="absentia_bottom_line tooltips" data-container="body" data-placement="top" data-original-title="Manager, Operations"></span></small>
                                                             </td>
                                                          </tr>
                                                       </tbody>
                                                    </table>
                                                    <!-- col-md-4 -->
                                                 </div>
                                                 <!-- headRightDetailsInner -->
                                                 <div class="portlet-body fixedHeightmodalPortlet">
                                                    <div class="form-body">
                                                       <div class="row">
                                                          <div class="col-md-12 paddingBottom10">
                                                             <div class="form-group">
                                                                <label class="">Leave Status</label>
                                                                <div class="">
                                                                   <span class="switch-box">
                                                                   <input type="checkbox" data-on-text="Approve" data-off-text="Disapprove" id="change-color-switch" class="ck-in switch-box a1">
                                                                   </span>
                                                                </div>
                                                             </div>
                                                             <!-- form-group -->
                                                          </div>
                                                          <!-- col-md-6 -->
                                                       </div>
                                                       <!-- row -->
                                                       <!-- form no -->
                                                       <div class="row">
                                                        <div class="col-md-6 paddingBottom10">
                                                          <div class="form-group">
                                                            <label class="">Form No:</label>
                                                            <div class="">
                                                              <input type="text" class="form-control" id="leave_form_no" disabled />
                                                            </div>
                                                          </div>
                                                        </div>
                                                       </div>
                                                       <div class="row">
                                                          <div class="col-md-6 paddingBottom10">
                                                             <div class="form-group">
                                                                <label class="">Leave Title:</label>
                                                                <div class="">
                                                                   <input type="hidden" id="leave_title_id"/>
                                                                   <input type="text" class="form-control" id="leave_title_update"  disabled="disabled">
                                                                </div>
                                                             </div>
                                                             <!-- form-group -->
                                                          </div>
                                                          <!-- col-md-6 -->
                                                          <div class="col-md-6 paddingBottom10">
                                                             <div class="form-group">
                                                                <label class="">Leave Type:</label>
                                                                <div class="">
                                                                   <select class="form-control" id="leave_type_update">
                                                                   <option selected disabled value="0">Select Leave Type</option>
                                                                   @foreach($leaveType as $type)
                                                                      <option value="{{$type->id}}">{{$type->leave_type_name}}</option>
                                                                   @endforeach
                                                                   </select>
                                                                   <!-- select -->
                                                                </div>
                                                             </div>
                                                             <!-- form-group -->
                                                          </div>
                                                          <!-- col-md-6 -->
                                                       </div>
                                                       <!-- row -->
                                                       <div class="row">
                                                          <div class="col-md-6 paddingBottom10">
                                                             <div class="form-group">
                                                                <label class="">From date:</label>
                                                                <div class="">
                                                                   <input type="date" class="form-control"  id="leave_from_update" data-id="" disabled="disabled">
                                                                </div>
                                                             </div>
                                                             <!-- form-group -->
                                                          </div>
                                                          <!-- col-md-6 -->
                                                          <div class="col-md-6 paddingBottom10">
                                                             <div class="form-group">
                                                                <label class="">To date:</label>
                                                                <div class="">
                                                                   <input type="date" class="form-control"  id="leave_to_update" data-id="" disabled="disabled">
                                                                </div>
                                                             </div>
                                                             <!-- form-group -->
                                                          </div>
                                                          <!-- col-md-6 -->
                                                       </div>
                                                       <!-- row -->
                                                       <div class="no-padding" id="approvedformShow" style="display:none;">
                                                          <div class="row">
                                                             <div class="col-md-6 paddingBottom10">
                                                                <div class="form-group">
                                                                   <label class="">Approved From date:</label>
                                                                   <div class="">
                                                                      <input type="date" class="form-control" id="approve_from">
                                                                   </div>
                                                                </div>
                                                                <!-- form-group -->
                                                             </div>
                                                             <!-- col-md-6 -->
                                                             <div class="col-md-6 paddingBottom10">
                                                                <div class="form-group">
                                                                   <label class="">Approved To date:</label>
                                                                   <div class="">
                                                                      <input type="date" class="form-control" id="approve_to">
                                                                   </div>
                                                                </div>
                                                                <!-- form-group -->
                                                             </div>
                                                             <!-- col-md-6 -->
                                                          </div>
                                                          <!-- row -->
                                                          <!-- row -->
                                                          <div class="row">
                                                            <div class="col-md-6 paddingBottom10">
                                                               <div class="form-group">
                                                                  <label class="">From Time:</label>
                                                                  <div class="">
                                                                     <input type="time" class="form-control"  id="time_from_update" data-id="" disabled="disabled">
                                                                  </div>
                                                               </div>
                                                               <!-- form-group -->
                                                            </div>
                                                            <!-- col-md-6 -->
                                                            <div class="col-md-6 paddingBottom10">
                                                               <div class="form-group">
                                                                  <label class="">To Time:</label>
                                                                  <div class="">
                                                                     <input type="time" class="form-control"  id="time_to_update" data-id="" disabled="disabled">
                                                                  </div>
                                                               </div>
                                                               <!-- form-group -->
                                                            </div>
                                                            <!-- col-md-6 --> 
                                                        </div>
                                                        <!-- row -->
                                                        <div class="row">
                                                            <div class="col-md-6 paddingBottom10">
                                                               <div class="form-group">
                                                                  <label class="">Approved From Time:</label>
                                                                  <div class="">
                                                                     <input type="time" class="form-control"  id="time_approval_from_update">
                                                                  </div>
                                                               </div>
                                                               <!-- form-group -->
                                                            </div>
                                                            <!-- col-md-6 -->
                                                            <div class="col-md-6 paddingBottom10">
                                                               <div class="form-group">
                                                                  <label class="">Approved To Time:</label>
                                                                  <div class="">
                                                                     <input type="time" class="form-control"  id="time_approval_to_update">
                                                                  </div>
                                                               </div>
                                                               <!-- form-group -->
                                                            </div>
                                                            <!-- col-md-6 --> 
                                                        </div>
                                                        <!-- row -->
                                                          <div class="row">
                                                             <div class="col-md-6 paddingBottom10">
                                                                <div class="form-group">
                                                                   <label class="">Paid Compensation:</label>
                                                                   <div class="">
                                                                      <span class="switch-box">
                                                                      <input type="checkbox" data-on-text="Yes" data-off-text="No" id="changeSwitch" class="ck-in switch-box a1">
                                                                      </span>
                                                                   </div>
                                                                </div>
                                                                <!-- form-group -->
                                                             </div>
                                                             <!-- col-md-6 -->
                                                             <div class="col-md-6 paddingBottom10" id="paidField" style="display:none;">
                                                                <div class="form-group">
                                                                   <label class="">Paid Percent:</label>
                                                                   <div class="input-group">
                                                                    <select class="form-control" id="paid_compensation_percentage">
                                                                      <option value="0">0</option>
                                                                      <option value="50">50</option>
                                                                      <option value="100">100</option>

                                                                    </select>
                                                                      <span class="input-group-addon">
                                                                      <i class="fa fa-percent"></i>
                                                                      </span>
                                                                   </div>
                                                                </div>
                                                                <!-- form-group -->
                                                             </div>
                                                             <!-- col-md-6 -->
                                                          </div>
                                                          <!-- row -->
                                                       </div>
                                                       <div class="row">
                                                          <div class="col-md-12 paddingBottom10">
                                                             <div class="form-group">
                                                                <label class="">Additional Comments <small>(if any)</small>:</label>
                                                                <div class="">
                                                                   <textarea id="leave_comment_update" cols="85" rows="5"></textarea>
                                                                </div>
                                                             </div>
                                                             <input type="hidden" name="" class="staff_id">
                                                             <input type="hidden" name="" class="effected_table_id">
                                                             <!-- form-group -->
                                                          </div>
                                                          <!-- col-md-6 -->
                                                       </div>
                                                       <!-- row -->
                                                    </div>
                                                    <!-- form-body -->
                                                 </div>
                                                 <!-- portlet-body fixedHeightmodalPortlet-->
                                              </div>
                                           </div>
                                           <div class="modal-footer text-center" style="text-align:center;">
                                              <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                                              <button onClick="LeaveUpdateById()" type="button" class="btn dark btn-outline active" data-dismiss="">Submit</button>
                                              <!--button type="button" class="btn green">Add Badge</button -->
                                           </div><!-- modal-footer -->
                                        </div><!-- /.modal-content -->
                                     </div><!-- /.modal-dialog -->
                                  </div><!-- modal -->

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

loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
			loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-editable.min.js", function(){
				loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){
					loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){
						loadScript("{{ URL::to('metronic') }}/global/plugins/bootbox/bootbox.min.js", function(){
							loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
								loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
									loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
										loadScript("{{ URL::to('metronic') }}/pages/scripts/datatable-expand.js", function(){
                                            loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction);
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
 $("#change-color-switch").bootstrapSwitch();

  $(document).on("click",".bootstrap-switch-container",function(){
      console.log("asdasd")
    var state=$('#changeSwitch').bootstrapSwitch('state');
    if(state==false){
             $('#paid_compensation_percentage').val('0')
    }

  })
  $('#change-color-switch').on('switchChange.bootstrapSwitch', function (e, data) {
   var state=$(this).bootstrapSwitch('state');//returns true or false
    if(state)
      {
         $("#approvedformShow").show();
      }
    else
      {
         $("#approvedformShow").hide();
         $('#approve_from').val('');
         $('#approve_to').val('');
         $('#paid_compensation_percentage').val('');
      }
  });

 
$("#changeSwitch").bootstrapSwitch();
$("#gt_id").inputmask("mask", {
            "mask": "99-999"
});

$('#changeSwitch').on('switchChange.bootstrapSwitch', function (e, data) {
   var state=$(this).bootstrapSwitch('state');//returns true or false
    if(state)
      {
         $("#paidField").show();
      }
    else
      {
         $("#paidField").hide();
      }
  });

 var LeaveUpdateById = function(){

    var staffID = $('.staff_id').val();
    var id =  $('.effected_table_id').val();
    var leave_title = $('#leave_title_update').val();
    var leave_type = $('#leave_type_update option:selected').val();
    var leave_from = $('#leave_from_update').val();
    var leave_to = $('#leave_to_update').val();
    var leave_comment =  $('#leave_comment_update').val();
    var approve_from = $('#approve_from').val();
    var approve_to = $('#approve_to').val();
    var paid_compensation_percentage = $('#paid_compensation_percentage').val();
    var time_from = $('#time_from_update').val();
    var time_to = $('#time_to_update').val();
    var time_approval_from_update = $('#time_approval_from_update').val();
    var time_approval_to_update = $('#time_approval_to_update').val();



    if(time_from == ''){
      time_from = null;
    }

    if(time_to == ''){
      time_to = null;
    }

    if(time_approval_from_update == ''){
      time_approval_from_update = null;
    }

    if(time_approval_to_update == ''){
      time_approval_to_update = null;
    }




    // For Approval
    $("#change-color-switch").bootstrapSwitch();
    var  LeaveApproval =$('#change-color-switch').bootstrapSwitch('state');//returns true or false
    if(LeaveApproval == true){
       LeaveApproval = 1;

    if(approve_from==""){
         return window.applyRequiredError("id","approve_from","Please enter approve from");
    }else if(approve_to==""){
         return window.applyRequiredError("id","approve_to","Please enter approve to");
         
    }else if(time_from!=null && time_approval_from_update==null){
         return window.applyRequiredError("id","time_approval_from_update","Please enter approve time");
         
    }else if(time_to!=null && time_approval_to_update==null){
         return window.applyRequiredError("id","time_approval_to_update","Please enter approve time to");
         
    }




    }else{
       LeaveApproval = 0;
    }


    // For Paid Compensation

    $("#changeSwitch").bootstrapSwitch();
    var  paid_compensation =$('#changeSwitch').bootstrapSwitch('state');//returns true or false
    if(paid_compensation == true){
       paid_compensation = 1;
    }else{
       paid_compensation = 0;

    }


    if(leave_type != '' && leave_title != '' && leave_from != '' && leave_to != ''){

    /***** Further Requests of AJAX *****/
    var me = $(this);
    if (me.data('staffView_staffInfo_requestLeave')){
       return;
    }
    me.data('staffView_staffInfo_requestLeave', true);
      /***** Stop Further Request of AJAX *****/
    $.ajax({
       type:"POST",
       cache:true,
       url:"{{url('/masterLayout/staff/LeaveUpdate')}}",
       data:{
          "id":id,
          "leave_title":leave_title,
          "staffID" :staffID,
          "leave_type":leave_type,
          "leave_from":leave_from,
          "leave_to":leave_to,
          "leave_comment":leave_comment,
          "approve_from":approve_from,
          "approve_to":approve_to,
          "paid_compensation":paid_compensation,
          "paid_compensation_percentage" :paid_compensation_percentage,
          "LeaveApproval":LeaveApproval,
          "leave_approve_time_from":time_approval_from_update,
          "leave_approve_time_to":time_approval_to_update,
          "_token" : "{{ csrf_token() }}"

       },
      
       success:function(e){
          //clearLeave();
           $('#LeaveApproval').modal('toggle');

          if(paid_compensation == 1){
             paid_compensation = 'Yes';
          }else{
             paid_compensation = 'No';
          }

       $('#leave_table > tbody tr').each(function(index) {
          var $this = $(this);
          var filter = $this.attr('data-id');
          if(filter == id){
             var leaveHTML = '';
          if(LeaveApproval==1){ 
          var tr1 = 'approvedBorder';
          }else{
             var tr1 = 'PendingapprovedBorder';
          }
          

             leaveHTML = leaveHTML + '<tr  class="'+tr1+'" data-id='+id+'><td>'+leave_title+'</small></td><td class=""><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested Compensation"></i> &nbsp; '+paid_compensation+' </td></tr>';
             if(LeaveApproval==1){
                leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved Compensation"></i> &nbsp; '+paid_compensation_percentage+'<span>% paid</span></td></tr>';
               }

             leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested From"></i> &nbsp;'+formatDate(leave_from)+'</td></tr>';

             if(approve_from){
                leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved From"></i> &nbsp; '+formatDate(approve_from)+' </td></tr>';
               }

             leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested till"></i> &nbsp; '+formatDate(leave_to)+'</td></tr>';

             if(approve_to){
                leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved till"></i> &nbsp;'+formatDate(approve_to)+' </td> </tr>';
               }

           
         leaveHTML = leaveHTML + '</table></td><td>'+leave_comment+'</td><td class="text-center"> <a class="edit_btn" onClick="ReWriteLeave('+id+')"><i class="fa fa-edit"></i></a> | <a href="#" data-container="body" data-placement="bottom" data-original-title="Print Leave Application" class="tooltips" ><span aria-hidden="true" class="icon-printer"></span></a> | <a href="#LeaveApproval" data-toggle="modal" data-container="body" data-placement="bottom" data-original-title="Leave Approval" class="tooltips" onClick="updateLeave('+id+')" ><i class="fa fa-check"></i> | <a class="del_btn" onClick="delectLeave('+id+')"><i class="fa fa-close"> </a></td></tr>';

              $(this).replaceWith(leaveHTML);
          }

       });  

       },
       complete: function() {
          me.data('staffView_staffInfo_requestLeave', false);
       }
    });

    }
 }


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


 var updateLeave = function(id,staff_id){
   var update_id =  id;
   $('.staff_id').val(staff_id);
   $('.effected_table_id').val(id);

   $.ajax({
       type:"POST",
       url:"{{url('/masterLayout/staff/get_updateLeave')}}",
       data:{
          "id":id,
          "_token": "{{ csrf_token() }}"
       },
       success:function(e){

          var data = JSON.parse(e);

          $('#leave_title_id').val(data[0].id);
          $('#leave_title_update').val(data[0].leave_title);
          $('#leave_form_no').val(data[0].form_no);

          $('#leave_type_update').prop('disabled',true);
          $("#leave_type_update option[value='"+data[0].leave_type+"']").prop('selected', true);

          $('#leave_type_update').val(data[0].leave_type);
          $('#leave_from_update').val(data[0].leave_from);
          $('#leave_to_update').val(data[0].leave_to);
          $('#leave_comment_update').val(data[0].leave_description);
          $('#approve_from').val(data[0].leave_approve_date_from);
          $('#approve_to').val(data[0].leave_approve_date_to);
          $('#paid_compensation_percentage').val(data[0].paid_percentage);
          $('#time_from_update').val(data[0].time_from);
          $('#time_to_update').val(data[0].time_to);
          $('#time_approval_from_update').val(data[0].leave_approve_time_from);
          $('#time_approval_to_update').val(data[0].leave_approve_time_to);

          // Set Input Box to disable And Enable
          if(data[0].time_from == null){
            $('#time_approval_from_update').prop('disabled',true);
          }else{
            $('#time_approval_from_update').prop('disabled',false);
          }

          if(data[0].time_to == null){
            $('#time_approval_to_update').prop('disabled',true);
          }else{
            $('#time_approval_to_update').prop('disabled',false);
          }

          $("#changeSwitch").bootstrapSwitch();
          if(data[0].paid_compensation == 1){
             $("#changeSwitch").bootstrapSwitch('state', true);
          }else{
             $("#changeSwitch").bootstrapSwitch('state', false);
          }


         $("#change-color-switch").bootstrapSwitch();
          if(data[0].leave_approve_status == 1){
             $("#change-color-switch").bootstrapSwitch('state', true);
          }else{
             $("#change-color-switch").bootstrapSwitch('state', false);
          }



       }

   });
 }

var pagefunction = function() {


    Demo.init();
    App.init();






 



}
</script>
<!-- Start Edit Absenia_id -->
  @include('attendance.staff.modals.absentia_edit_modal')
<!-- End Edit Absenia_id-->

<!-- Leave Application Edit Functionality Modal-->
                         
@include('attendance.staff.modals.leave_application_edit_modal')
                                
<!-- End Leave Applicaiton Modal -->

<!-- Exceptional Edit Functionality Modal-->
@include('attendance.staff.modals.exceptional_adjustment_edit_modal')

<!-- End Exceptional Modal -->

<!-- Edit Penalties -->
@include('attendance.staff.modals.penalty_edit_modal')
<!-- End Penalties -->
<!-- Edit Manual Attendance -->
@include('attendance.staff.modals.miss_tap_edit_modal')

<!-- End Manual Attendance modal -->
@include('master_layout.footer')
<script src="{{ URL::to('metronic') }}/global/scripts/hr_forms.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/scripts/global_functions.js" type="text/javascript"></script>

