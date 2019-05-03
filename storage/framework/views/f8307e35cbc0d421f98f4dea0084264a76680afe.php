<!-- BEGIN PAGE LEVEL STYLES -->

<link href="<?php echo e(URL::to('/css/ProfileDefinition.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::to('/metronic/global/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::to('/metronic/global/plugins/select2/css/select2-bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Staff Payroll Adjustments</span>
        </li>
    </ul><!-- page-breadcrumb -->
</div><!-- page-bar -->
<!-- END PAGE BAR -->
<script>

</script>
<style>
textarea.error, input.error {
  border: 1px solid #ff0000;
}
.user-pic {
    height: 43px !important;
}
tr td {
    vertical-align: middle;
}
td.staffView_StaffName {
    padding-left: 10px;
}
.headRightDetailsInner2 {
	background: #fff;
    float: left;
    margin-bottom: 0;
    padding-top: 20px;	
}
.input-group.select2-bootstrap-append {
    padding: 0 15px;
}
th:first-child + th + th,
td:first-child + td + td {
  display:none;
} 

tr.group,
tr.group:hover {
    background-color: #fdf1c8bf !important;
    text-align: center;
    color: #a7a6a2;
}
tr.group td {
	padding:0 !important;	
}
.logTables tr td table tr td{
	text-align:left !important;	
}
.logTables td,
.logTables th {
	vertical-align:middle !important;	
	text-align:center !important;
	color:#888;
}
.dataTables_filter {
	text-align:right;
}
.deleted {
	    border-left: 5px solid red;
    /* border-right: 5px solid red; */
    background: #f9e8e8 !important;
}	
.headRightDetailsInner {
    background: #dedede;
    width: 100%;
    padding: 5px 15px;
    border-bottom: 1px solid #eef1f5;
    z-index: 999;
    margin-top: 0px;
}
.portlet .tabbable-line.customTabbale>.tab-content {
    padding-bottom: 0;
    float: left;
    width: 100%;
    padding-top: 0;
}
.customTabContent {
    padding: 20px 20px 0;
    border: 1px solid #ddd;
    float: left;
    width: 100%;
    border-top: 0 none;
}
</style>



<!-- BEGIN PAGE TITLE-->

<!-- END PAGE TITLE-->
<div class="modal fade 100pxwidth" id="ProcessEntry" tabindex="-1" role="basic" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h3 class="modal-title">Entry Forms</h3>
         </div>
         <div class="modal-body" style="float:left;width:100%;">
           <div class="tabbable-line">
                <ul class="nav nav-tabs" id="staffViewTabs">
                     <li class="active">
                        <a href="#tab_5_1" data-toggle="tab"> Att in Absentia </a>
                     </li>
                     <li class="">
                        <a href="#tab_5_2" data-toggle="tab"> Leave Application </a>
                     </li>
                     <li>
                        <a href="#tab_5_3" data-toggle="tab"> Unauthorized Leave Penalty </a>
                     </li>
                     <li>
                        <a href="#tab_5_4" data-toggle="tab"> Missed Tap Event. </a>
                     </li>
                     <li>
                        <a href="#tab_5_5" data-toggle="tab"> Exceptional Adjustments </a>
                     </li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_5_1">
                    <div class="portlet box blue-hoki">
                       <div class="portlet-title">
                          <div class="caption">
                             <i class="fa fa-user"></i><font id="selected_individuals">Attendance in Absentia form</font>
                          </div>
                       </div>
                       <!-- portlet-title -->
                       <div class="headRightDetailsInner2 form-group">
                          <div class="input-group select2-bootstrap-append">
                            <select id="multi-append" class="form-control select2 absentiaSelect" multiple>
                                <option></option>
                                <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($data->staff_id); ?>"> <?php echo e($data->abridged_name); ?><small> - <?php echo e($data->name_code); ?></small></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                            </select>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" data-select2-open="multi-append">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                       </div><!-- -->
                        <div class="portlet-body fixedHeightmodalPortlet">
                          <form id="saveMultipleAbsentiaForm">
                              <div class="form-body">
                                 <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                       <div class="form-group">
                                          <label class="">Title:</label>
                                          <div class="">
                                             <input type="text" class="form-control" name="absentia_title" id="multiple_absentia_title" data-id="">
                                          </div>
                                       </div>
                                       <!-- form-group -->
                                    </div>
                                    <!-- col-md-6 -->
                                    <div class="col-md-6 paddingBottom10">
                                       <div class="form-group">
                                          <label class="">Date:</label>
                                          <div class="">
                                             <input type="date" class="form-control" name="absentia_date" id="multiple_absentia_date" data-id="">
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
                                          <label class="">Start Time:</label>
                                          <div class="">
                                             <input type="time" class="form-control" name="absentia_startTime" id="multiple_absentia_startTime" data-id="">
                                          </div>
                                       </div>
                                       <!-- form-group -->
                                    </div>
                                    <!-- col-md-6 -->
                                    <div class="col-md-6 paddingBottom10">
                                       <div class="form-group">
                                          <label class="">End Time:</label>
                                          <div class="">
                                             <input type="time" class="form-control" name="absentia_endTime" id="multiple_absentia_endTime" data-id="">
                                          </div>
                                       </div>
                                       <!-- form-group -->
                                    </div>
                                    <!-- col-md-6 -->
                                 </div>
                                 <!-- row -->
                                 <div class="row">
                                    <div class="col-md-12 paddingBottom10">
                                       <div class="form-group">
                                          <label class="">Description:</label>
                                          <div class="">
                                             <textarea name="absentia_description" id="multiple_absentia_description" cols="85" rows="5"></textarea>
                                          </div>
                                       </div>
                                       <!-- form-group -->
                                    </div>
                                    <!-- col-md-6 -->
                                 </div>
                                 <!-- row -->
                              </div>
                              
                              <!-- form-body -->
                              <div class="form-actions">
                                <button type="button" class="btn blue saveMultipleAbsentia" >Submit</button>
                                <button  onclick="resetEntryForm()"  type="button" class="btn default" data-dismiss="modal">Cancel</button>
                              </div>
                          </form>
                       </div>
                       <!-- portlet-body fixedHeightmodalPortlet-->
                       
                    </div>
                  </div><!-- tab_5_1 -->
                  <div class="tab-pane" id="tab_5_2">
                    <div class="portlet box blue-hoki">
                       <div class="portlet-title">
                          <div class="caption">
                             <i class="fa fa-user"></i><font id="">Leave form</font>
                          </div>
                       </div>
                       <!-- portlet-title -->
                       <div class="headRightDetailsInner2 form-group">
                      <div class="input-group select2-bootstrap-append">
                        <select id="multi-append" class="form-control select2 leaveSelect" multiple name="leaveSelect">
                            <option></option>
                            <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->staff_id); ?>"> <?php echo e($data->abridged_name); ?><small> - <?php echo e($data->name_code); ?></small></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                             
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" data-select2-open="multi-append">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                   </div><!-- -->
                       <!-- headRightDetailsInner -->
                       <div class="portlet-body fixedHeightmodalPortlet">
                          <form method="POST" id="saveMultipleLeaveForm">
                            <div class="form-body">
                               <div class="row">
                                  <div class="col-md-6 paddingBottom10">
                                     <div class="form-group">
                                        <label class="">Leave Title:</label>
                                        <div class="">
                                           <input type="text" class="form-control" name="leave_title" id="multiple_leave_title" data-id="" required>
                                        </div>
                                     </div>
                                     <!-- form-group -->
                                  </div>
                                  <!-- col-md-6 -->
                                  <div class="col-md-6 paddingBottom10">
                                     <div class="form-group">
                                        <label class="">Leave Type:</label>
                                        <div class="">
                                           <select class="form-control multiple_leave_type" name="leave_type">
                                           <?php $__currentLoopData = $leaveType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                          <option value="<?php echo e($type->id); ?>"><?php echo e($type->leave_type_name); ?></option>
                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <label class="">From:</label>
                                        <div class="">
                                           <input type="date" class="form-control" name="leave_from" id="multiple_leave_from" data-id="">
                                        </div>
                                     </div>
                                     <!-- form-group -->
                                  </div>
                                  <!-- col-md-6 -->
                                  <div class="col-md-6 paddingBottom10">
                                     <div class="form-group">
                                        <label class="">To:</label>
                                        <div class="">
                                           <input type="date" class="form-control" name="leave_to" id="multiple_leave_to" data-id="">
                                        </div>
                                     </div>
                                     <!-- form-group -->
                                  </div>
                                  <!-- col-md-6 -->
                               </div>
                               <!-- row -->
                               <div class="row">
                                  <div class="col-md-12 paddingBottom10">
                                     <div class="form-group">
                                        <label class="">Additional Comments <small>(if any)</small>:</label>
                                        <div class="">
                                           <textarea id="multiple_leave_comment" name="leave_comment" cols="85" rows="5"></textarea>
                                        </div>
                                     </div>
                                     <!-- form-group -->
                                  </div>
                                  <!-- col-md-6 -->
                               </div>
                               <!-- row -->
                               <div class="row">
                                  <div class="col-md-12 paddingBottom10">
                                     <div class="form-group">
                                        <label class="">Request for a paid Compensation</label>
                                        <div class="">
                                           <input id="multiple_limit" type="checkbox" class="make-switch" data-on-text="Yes" data-off-text="No">
                                        </div>
                                     </div>
                                     <!-- form-group -->
                                  </div>
                                  <!-- col-md-6 -->
                               </div>
                               <!-- row -->
                            </div>
                            <!-- form-body -->
                            <div class="form-actions">
                              <button type="button" class="btn blue saveMultipleLeave">Submit</button>
                              <button  onclick="resetEntryForm()"  type="button" class="btn default" data-dismiss="modal">Cancel</button>
                            </div>
                          </form>
                       </div>
                       <!-- portlet-body fixedHeightmodalPortlet-->
                       
                    </div>
                  </div><!-- tab_5_2 -->
                  <div class="tab-pane" id="tab_5_3">
                    <div class="portlet box blue-hoki">
                       <div class="portlet-title">
                          <div class="caption">
                             <i class="fa fa-user"></i><font id="">Penalty</font>
                          </div>
                       </div>
                       <!-- portlet-title -->
                        
                            <div class="headRightDetailsInner2 form-group">

                                    <div class="input-group select2-bootstrap-append">
                                      <select id="multi-append" class="form-control select2 selectPenalty" multiple>
                                          <option></option>
                                              <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($data->staff_id); ?>"> <?php echo e($data->abridged_name); ?><small> - <?php echo e($data->name_code); ?></small></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                      </select>
                                      <span class="input-group-btn">
                                          <button class="btn btn-default" type="button" data-select2-open="multi-append">
                                              <span class="glyphicon glyphicon-search"></span>
                                          </button>
                                      </span>
                                    </div>
                            </div>

                           <!-- headRightDetailsInner -->
                            <div class="portlet-body fixedHeightmodalPortlet">
                              <form method="POST" id="saveMultiplePenaltyForm">
                                <div class="form-body">
                                   <div class="row">
                                      <div class="col-md-6 paddingBottom10">
                                         <div class="form-group">
                                            <label class="">Penalty Title:</label>
                                            <div class="">
                                               <input type="text" class="form-control" name="penalty_title" id="multiple_penalty_title" data-id="">
                                            </div>
                                         </div>
                                         <!-- form-group -->
                                      </div>
                                      <!-- col-md-6 -->
                                      <div class="col-md-6 paddingBottom10">
                                         <div class="form-group">
                                            <label class="">Penalty for <small>(no of days)</small>:</label>
                                            <div class="input-group">
                                               <input id="multiple_penalty_day" type="number" class="form-control" placeholder="" name="penalty_day">
                                               <span class="input-group-addon">
                                               <i class="fa fa-hashtag"></i>
                                               </span>
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
                                            <label class="">Penalty from:</label>
                                            <div class="">
                                               <input type="date" class="form-control" name="penalty_from" id="multiple_penalty_from" data-id="">
                                            </div>
                                         </div>
                                         <!-- form-group -->
                                      </div>
                                      <!-- col-md-6 -->
                                      <div class="col-md-6 paddingBottom10">
                                         <div class="form-group">
                                            <label class="">Penalty to:</label>
                                            <div class="">
                                               <input id="multiple_penalty_to" type="date" class="form-control" placeholder="" name="penalty_to">
                                            </div>
                                         </div>
                                         <!-- form-group -->
                                      </div>
                                      <!-- col-md-6 -->
                                   </div>
                                   <!-- row -->
                                   <div class="row">
                                      <div class="col-md-12 paddingBottom10">
                                         <div class="form-group">
                                            <label class="">Information regarding Penalty:</label>
                                            <div class="">
                                               <textarea name="penalty_description" id="multiple_penalty_description" cols="85" rows="5"></textarea>
                                            </div>
                                         </div>
                                         <!-- form-group -->
                                      </div>
                                      <!-- col-md-6 -->
                                   </div>
                                   <!-- row -->
                                </div>
                                <!-- form-body -->
                                <div class="form-actions">
                                  <button type="button" class="btn blue saveMultiplePenalty">Submit</button>
                                  <button  onclick="resetEntryForm()"  type="button" class="btn default" data-dismiss="modal">Cancel</button>
                                </div>
                              </form>
                            </div>
                        
                       <!-- portlet-body fixedHeightmodalPortlet-->
                       
                    </div>
                  </div><!-- tab_5_3 -->
                  <div class="tab-pane" id="tab_5_4">
                    <div class="portlet box blue-hoki">
                       <div class="portlet-title">
                          <div class="caption">
                             <i class="fa fa-user"></i><font id="">Missed Tap</font>
                          </div>
                       </div>
                       <!-- portlet-title -->
                       <div class="headRightDetailsInner2 form-group">
                      <div class="input-group select2-bootstrap-append">
                        <select id="multi-append" class="form-control select2 selectManual" multiple>
                            <option></option>
                            <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->staff_id); ?>"> <?php echo e($data->abridged_name); ?><small> - <?php echo e($data->name_code); ?></small></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" data-select2-open="multi-append">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                   </div>
                       <!-- headRightDetailsInner -->
                       <div class="portlet-body fixedHeightmodalPortlet">
                          <form method="POST" id="saveMultipleManualForm">
                          <div class="form-body">
                             <div class="row">
                                <div class="col-md-12 paddingBottom10">
                                   <div class="form-group">
                                      <label class="">Attendance Date:</label>
                                      <div class="">
                                         <input type="date" class="form-control" name="manual_attendance" id="multiple_manual_attendance" data-id="">
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
                                      <label class="">Miss Tap:</label>
                                      <div class="">
                                         <input type="time" class="form-control" name="manual_tap" id="multiple_manual_tap" data-id="">
                                      </div>
                                   </div>
                                   <!-- form-group -->
                                </div>
            
            
                                <!-- col-md-6 -->
                             </div>
                             <!-- row -->
                             <div class="row">
                                <div class="col-md-12 paddingBottom10">
                                   <div class="form-group">
                                      <label class="">Information regarding manual attendance:</label>
                                      <div class="">
                                         <textarea name="manual_description" id="multiple_manual_description" cols="85" rows="5"></textarea>
                                      </div>
                                   </div>
                                   <!-- form-group -->
                                </div>
                                <!-- col-md-6 -->
                             </div>
                             <!-- row -->
                          </div>
                          <!-- form-body -->
                          <div class="form-actions">
                            <button type="button" class="btn blue saveMultipleManual">Submit</button>
                            <button  onclick="resetEntryForm()"  type="button" class="btn default" data-dismiss="modal">Cancel</button>
                          </div>
                          </form>
                       </div>
                       <!-- portlet-body fixedHeightmodalPortlet-->
                       
                    </div>
                  </div><!-- tab_5_4 -->
                  <div class="tab-pane" id="tab_5_5">
                    <div class="portlet box blue-hoki">
                       <div class="portlet-title">
                          <div class="caption">
                             <i class="fa fa-user"></i><font id="">Adjustments</font>
                          </div>
                       </div>
                       <!-- portlet-title -->
                       <div class="headRightDetailsInner2 form-group">
                      <div class="input-group select2-bootstrap-append">
                        <select id="multi-append" class="form-control select2 selectAdjustments" multiple>
                            <option></option>
                            <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->staff_id); ?>"> <?php echo e($data->abridged_name); ?><small> - <?php echo e($data->name_code); ?></small></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                             
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" data-select2-open="multi-append">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                   </div>
                       <!-- headRightDetailsInner -->
                       <div class="portlet-body fixedHeightmodalPortlet">
                          <form method="POST" id="saveMultipleAdjustmentForm">
                            <div class="form-body">
                               <div class="row">
                                  <div class="col-md-6 paddingBottom10">
                                     <div class="form-group">
                                        <label class="">Title:</label>
                                        <div class="">
                                           <input type="text" class="form-control" name="adjustment_title" id="multiple_adjustment_title" data-id="">
                                        </div>
                                     </div>
                                     <!-- form-group -->
                                  </div>
                                  <!-- col-md-6 -->
                                  <div class="col-md-6 paddingBottom10">
                                     <div class="form-group">
                                        <label class="">Adjustment for <small>(no of days)</small>:</label>
                                        <div class="input-group">
                                           <input name="adjustment_no" id="multiple_adjustment_no" type="number" class="form-control" placeholder="">
                                           <span class="input-group-addon">
                                           <i class="fa fa-hashtag"></i>
                                           </span>
                                        </div>
                                     </div>
                                     <!-- form-group -->
                                  </div>
                                  <!-- col-md-6 -->
                               </div>
                               <!-- row -->
                               <div class="row">
                                  <div class="col-md-12 paddingBottom10">
                                     <div class="form-group">
                                        <label class="">Information regarding Adjustments:</label>
                                        <div class="">
                                           <textarea name="adjustment_description" id="multiple_adjustment_description" cols="85" rows="5"></textarea>
                                        </div>
                                     </div>
                                     <!-- form-group -->
                                  </div>
                                  <!-- col-md-6 -->
                               </div>
                               <!-- row -->
                            </div>
                            <!-- form-body -->
                            <div class="form-actions">
                              <button type="button" class="btn blue saveMultipleAdjustment">Submit</button>
                              <button onclick="resetEntryForm()" type="button" class="btn default" data-dismiss="modal">Cancel</button>
                            </div>
                          </form>
                       </div>
                       <!-- portlet-body fixedHeightmodalPortlet-->
                       
                    </div>
                  </div><!-- tab_5_5 -->
                </div><!-- tab-content -->
            </div><!-- tabbable-line -->
            
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- BEGIN USE PROFILE -->
<div class="row marginTop20">
    <div class="col-md-12">
        <div class="portlet light bordered fixed-height-NoScroll marginBottom0">
        <div class="portlet-title" style="padding: 10px 0;margin-bottom: 30px;">
            <div class="caption">
                <i class="icon-wrench font-blue-sharp"></i>&nbsp;
                <span class="caption-subject font-blue-sharp bold uppercase">Staff Payroll Adjustments & Logs</span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                    <i class="icon-cloud-upload"></i>
                </a>
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                    <i class="icon-wrench"></i>
                </a>
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                    <i class="icon-trash"></i>
                </a>
            </div>
        </div>
            <ul class="nav nav-tabs marginBottom0 " id="" >
            	<li class="active">
                    <a href="#PayrollAdjustments" data-toggle="tab">Adjustments</a>
                </li>
                <li class="">
                    <a href="#Logs" data-toggle="tab">Logs</a>
                </li>
                <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm pull-right" data-placement="bottom" data-original-title="Add new profile"data-toggle="modal" href="#ProcessEntry" id="">Entry Forms</button>
            </ul>
            
            <div class="tab-content customTabContent">
            	<div class="tab-pane fade active in" id="PayrollAdjustments">
                	<div class="tabbable-line customTabbale">
                        <ul class="nav nav-tabs " id="" style="margin-bottom:0 !important;">
                            <li class="active">
                                <a href="#Attendance_in_Absentia" data-toggle="tab"> Attendance in Absentia </a>
                            </li>
                            <li class="">
                                <a href="#Leave_Application" data-toggle="tab" data-staff="382"> Leave Applications </a>
                            </li>
                            <li>
                                <a href="#Unauthorized_Leave_Penalties" data-toggle="tab"> Unauthorized Leave Penalties </a>
                            </li>
                            <li>
                                <a href="#Exceptional_Adjustments" data-toggle="tab"> Exceptional Adjustments </a>
                            </li>
                            <li>
                                <a href="#Missed_Tap_Event" data-toggle="tab"> Missed Tap Event </a>
                            </li>
                        </ul><!-- nav-tabs -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="Attendance_in_Absentia">
                                <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                    <div class="portlet-title">
                                       <div class="caption">
                                          <i class="icon-users font-dark"></i>
                                          <span class="caption-subject font-dark sbold uppercase">Absentia </span>
                                       </div>
                                    </div>
                                    <!-- portlet-title -->
                                    <div class="portlet-body adjustmentTableAbsentiaView" style="padding:15px;">
                                        <table id="adjustmentTableAbsentia" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">No</th>
                                                    <th width="400 ">Staff</th>
                                                    <th>Title</th>
                                                    <th>Created</th>
                                                    <th width="150" >From <small>(time)</small></th>
                                                    <th width="150" >To <small>(time)</small></th>
                                                    <th width="150" >Apply Date</th>
                                                    
                                                    <th>Description</th>
                                                    <th width="180" >Action</th> <!---->
                                                    <th style="display: none;" >Modified On</th>
                                                    <th style="display: none;" >Modified On STR</th>
                                                </tr>
                                            </thead>
                    
                                            <tbody>
                                                <?php $__currentLoopData = $absentia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <tr id="absentia_table_row_<?php echo e($data->absentia_id); ?>" <?php echo e(($data->saoDeleted == 1 && $data->saiDeleted == 1) ? 'class=deleted' : ''); ?>>
                                                    <td style="display: none;"><?php echo e($key); ?></td>
                                                    <td>
                                                        <table class="absentia_staff_<?php echo e($data->staff_id); ?>">
                                                            <tr >
                                                                <td>
                                                                    <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                                </td>
                                                                <td class="staffView_StaffName" >
                                                                    <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                    <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td id="absentia_title_<?php echo e($data->absentia_id); ?>"><?php echo e($data->aiaTitle); ?></td>
                                                    <td><strong><?php echo e($data->aiaStamp); ?></strong></td>
                                                    <td id="absentia_aiaStart_time_<?php echo e($data->absentia_id); ?>"><?php echo e($data->aiaStart_time); ?></td>
                                                    <td id="absentia_aiaEnd_time_<?php echo e($data->absentia_id); ?>"><?php echo e($data->aiaEnd_time); ?></td>
                                                    <td id="absentia_aiaStamp_<?php echo e($data->absentia_id); ?>"><?php echo e($data->applyDate); ?></td>
                                                    
                                                    <td id="absentia_description_<?php echo e($data->absentia_id); ?>"><?php echo e($data->description); ?></td>
                                                    
                                                    <?php if($data->saoDeleted == 1 && $data->saiDeleted == 1): ?>
                                                    <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->deleted_by); ?>"><?php echo e($data->deleted_by); ?></strong><br><small>on</small> <strong><?php echo e($data->deleted_on); ?></strong> </td>
                                                    <?php else: ?> 
                                                    <td align="center" id="deleted_absentia_<?php echo e($data->absentia_id); ?>"><a onclick="Edit_Absentia(<?php echo e($data->absentia_id); ?>, <?php echo e($data->staff_id); ?>)"><i class="fa fa-edit"></i></a> | <a onclick="delete_Absentia(<?php echo e($data->absentia_id); ?>, <?php echo e($data->staff_id); ?>)" ><i class="fa fa-trash-o"></i></a><div id="absentia_modifiedOn_<?php echo e($data->absentia_id); ?>"><?php echo e($data->aiaModifiedStamp); ?></div></td> <!---->
                                                    
                                                    <?php endif; ?>
                                                    <td  style="display: none;" ><?php echo e($data->aiaModifiedOn); ?></td>
                                                    <td  style="display: none;" ><?php echo e(strtotime($data->aiaModifiedOn)); ?></td>
                                                </tr>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- portlet-body -->
                                </div>
                            </div><!-- Attendance_in_Absentia -->
                            <div class="tab-pane fade" id="Leave_Application">
                                <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                    <div class="portlet-title">
                                       <div class="caption">
                                          <i class="icon-users font-dark"></i>
                                          <span class="caption-subject font-dark sbold uppercase">Leave Applications </span>
                                       </div>
                                    </div>
                                    <!-- portlet-title -->
                                    <div class="portlet-body adjustmentTableLeavesView" style="padding:15px;">
                                        <table id="adjustmentTableLeaves" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">No</th>
                                                    <th width="400 ">Staff</th>
                                                    <th>Title</th>
                                                    <th>Apply Date</th>
                                                    <th width="100" >Compensation<br />Request</th>
                                                    <th width="150" >From <small>(time)</small></th>
                                                    <th width="150" >To <small>(time)</small></th>
                                                    
                                                    <th>Description</th>
                                                    <th width="180" >Action</th> <!---->
                                                    <th style="display: none;">Modified On</th>
                                                </tr>
                                            </thead>
                    
                                            <tbody>
                                                
                                                <?php $__currentLoopData = $leave; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <tr <?php echo e(($data->rd == 1) ? 'class=deleted' : ''); ?>  data-id="<?php echo e($data->leave_id); ?>">
                                                    <td style="display: none;"><?php echo e($key); ?></td>
                                                    <td>
                                                        <table class="leave_staff_<?php echo e($data->leave_id); ?>">
                                                            <tr>
                                                                <td>
                                                                    <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                                </td>
                                                                <td class="staffView_StaffName" >
                                                                    <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                    <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td id="leave_title_<?php echo e($data->leave_id); ?>"><?php echo e($data->leave_title); ?></td>
                                                    <td id="leave_laStamp_<?php echo e($data->leave_id); ?>" ><strong><?php echo e($data->laStamp); ?></strong></td>
                                                    <td id="leave_compensation_<?php echo e($data->leave_id); ?>"><?php echo e(($data->paid_compensation == 1) ? 'NO' : 'YES'); ?></td>
                                                    <td id="leave_startDate_<?php echo e($data->leave_id); ?>"><?php echo e($data->startDate); ?></td>
                                                    <td id="leave_endDate_<?php echo e($data->leave_id); ?>"><?php echo e($data->endDate); ?></td>
                                                    
                                                    <td id="leave_description_<?php echo e($data->leave_id); ?>"><?php echo e($data->leave_description); ?></td>
                                                     <?php if($data->rd == 1): ?>
                                                    <td align="center" ><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->deleted_by); ?>"><?php echo e($data->deleted_by); ?></strong><br><small>on</small> <strong><?php echo e($data->deleted_on); ?></strong> </td>
                                                    <?php else: ?> 
                                                    <td align="center" id="deleted_<?php echo e($data->leave_id); ?>" ><a onClick="ReWriteLeave(<?php echo e($data->leave_id); ?>)" ><i class="fa fa-edit"></i></a> | <a onClick="delectLeave(<?php echo e($data->leave_id); ?>)" ><i class="fa fa-trash-o"></i></a><div id="leave_modifiedOn_<?php echo e($data->leave_id); ?>"><?php echo e($data->modifiedStamp); ?></div></td> <!---->
            
                                                    <?php endif; ?> <!---->
                                                    <td style="display: none;"><?php echo e($data->laModifiedOn); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- portlet-body -->
                                </div>
                            </div><!-- Leave_Application -->
                            <div class="tab-pane fade" id="Unauthorized_Leave_Penalties">
                                <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                    <div class="portlet-title">
                                       <div class="caption">
                                          <i class="icon-users font-dark"></i>
                                          <span class="caption-subject font-dark sbold uppercase">Unauthorized Leave Penalties </span>
                                       </div>
                                    </div>
                                    <!-- portlet-title -->
                                    <div class="portlet-body adjustmentTableUnauthorizedLeavesView" style="padding:15px;">
                                        <table id="adjustmentTableUnauthorizedLeaves" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">No</th>
                                                    <th width="400 ">Staff</th>
                                                    <th>Title</th>
                                                    <th>Date</th>
                                                    <th width="150" >From <small>(time)</small></th>
                                                    <th width="150" >To <small>(time)</small></th>
                                                    <th width="150" >Created</th>
                                                    <th>Description</th>
                                                    <th width="180" >Action</th> <!---->
                                                    <th style="display: none;">Modified On</th>
                                                </tr>
                                            </thead>
                    
                                            <tbody>
                                                <?php $__currentLoopData = $penalty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <tr id="penalty_table_row_<?php echo e($data->penalty_id); ?>" <?php echo e(($data->rd == 1) ? 'class=deleted' : ''); ?>>
                                                    <td style="display: none;"><?php echo e($key); ?></td>
                                                    <td>
                                                        <table class="penalty_staff_view_<?php echo e($data->penalty_id); ?>">
                                                            <tr >
                                                                <td>
                                                                    <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                                </td>
                                                                <td class="staffView_StaffName" >
                                                                    <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                    <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td id="penalty_title_<?php echo e($data->penalty_id); ?>"><?php echo e($data->penalty_title); ?></td>
                                                    <td ><strong><?php echo e($data->startDate); ?></strong></td>
                                                    <td id="penalty_from_<?php echo e($data->penalty_id); ?>"><?php echo e($data->penalty_from); ?></td>
                                                    <td id="penalty_to_<?php echo e($data->penalty_id); ?>"><?php echo e($data->penalty_to); ?></td>
                                                    <td><?php echo e($data->dpStamp); ?></td>
                                                    <td id="penalty_description_<?php echo e($data->penalty_id); ?>"><?php echo e($data->penalty_description); ?></td>
                                                      <?php if($data->rd == 1): ?>
                                                    <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->deleted_by); ?></strong><br><small>on</small> <strong><?php echo e($data->deleted_on); ?></strong> </td>
                                                    <?php else: ?> 
                                                    <td id="deleted_penalty_<?php echo e($data->penalty_id); ?>"  align="center"><a onclick="ReWriteLeavePenalties(<?php echo e($data->penalty_id); ?>)" ><i class="fa fa-edit"></i></a> | <a onclick="deleteLeavePenalties(<?php echo e($data->penalty_id); ?>)" ><i class="fa fa-trash-o"></i></a>
                                                      <div id="penalty_modifiedOn_<?php echo e($data->penalty_id); ?>"><?php echo e($data->dpModifiedStamp); ?></div>
                                                      
                                                    </td> <!---->
                                                    
                                                    <?php endif; ?> <!---->
                                                    <td style="display: none;"><?php echo e($data->dpModifiedOn); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- portlet-body -->
                                </div>
                            </div><!-- Unauthorized_Leave_Penalties -->
                            <div class="tab-pane fade" id="Exceptional_Adjustments">
                                
                                <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                  <div class="portlet-title">
                                     <div class="caption">
                                        <i class="icon-users font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Exceptional Adjustments </span>
                                     </div>
                                  </div>
                                  <!-- portlet-title -->
                                  <div class="portlet-body exceptionAdjustmentTableView" style="padding:15px;">
                                      <table id="exceptionAdjustmentTable" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                          <thead>
                                              <tr>
                                                  <th style="display: none;">No</th>
                                                  <th width="400 ">Staff</th>
                                                  <th>Title</th>
                                                  <th>Date</th>
                                                  <th width="150" >Day</th>
                                                  <th width="150" >Stamp</th>
                                                  <th>Description</th>
                                                  <th width="180" >Action</th> <!---->
                                                  <th style="display: none;">Modified On</th>
                                              </tr>
                                          </thead>
                  
                                          <tbody>
                                              <?php $__currentLoopData = $exception; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                              <tr id="exception_table_row_<?php echo e($data->exceptional_id); ?>" <?php echo e(($data->rd == 1) ? 'class=deleted' : ''); ?>>
                                                  <td style="display: none;"><?php echo e($key); ?></td>
                                                  <td>
                                                      <table class="adjustment_staff_<?php echo e($data->exceptional_id); ?>">
                                                          <tr >
                                                              <td>
                                                                  <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                              </td>
                                                              <td class="staffView_StaffName" >
                                                                  <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                  <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                              </td>
                                                          </tr>
                                                      </table>
                                                  </td>
                                                  <td id="adjustment_staff_title_<?php echo e($data->exceptional_id); ?>"><?php echo e($data->adjustment_title); ?></td>
                                                  <td><strong><?php echo e($data->onDate); ?></strong></td>
                                                  <td id="adjustment_staff_day_<?php echo e($data->exceptional_id); ?>"><?php echo e($data->adjustment_day); ?></td>
                                                  <td><?php echo e($data->eaStamp); ?></td>
                                                  <td id="adjustment_staff_description_<?php echo e($data->exceptional_id); ?>"><?php echo e($data->adjustment_description); ?></td>
                                                    <?php if($data->rd == 1): ?>
                                                  <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->deleted_by); ?></strong><br><small>on</small> <strong><?php echo e($data->deleted_on); ?></strong> </td>
                                                  <?php else: ?> 
                                                  <td id="deleted_adjustment_<?php echo e($data->exceptional_id); ?>"  align="center"><a onclick="ReWriteAdjustment(<?php echo e($data->exceptional_id); ?>)"><i class="fa fa-edit"></i></a> | <a onclick="deleteAdjustment(<?php echo e($data->exceptional_id); ?>)" ><i class="fa fa-trash-o"></i></a>
                                                    <div id="adjustment_modifiedOn_<?php echo e($data->exceptional_id); ?>"><?php echo e($data->eaModifiedStamp); ?></div>
                                                  </td> <!---->
            
                                                  <?php endif; ?> <!---->
                                                  <td style="display: none;"><?php echo e($data->eaModifiedOn); ?></td>
                                              </tr>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                                          </tbody>
                                      </table>
                                  </div>
                                  <!-- portlet-body -->
                                </div>                    
                            </div><!-- Exceptional_Adjustments -->
                            <div class="tab-pane fade" id="Missed_Tap_Event">
                                                    <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                  <div class="portlet-title">
                                     <div class="caption">
                                        <i class="icon-users font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Missed Tap Event </span>
                                     </div>
                                  </div>
                                  <!-- portlet-title -->
                                  <div class="portlet-body missTapEventTableView" style="padding:15px;">
                                      <table id="missTapEventTable" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                          <thead>
                                              <tr>
                                                  <th style="display: none;">No</th>
                                                  <th width="400 ">Staff</th>
                                                  <th>Attendance Date</th>
                                                  <th>Attendance Date</th>
                                                  <th width="150" >Tap</th>
                                                  <th width="150" >Created</th>
                                                  <th>Additional Comments</th>
                                                  <th width="180" >Action</th> <!---->
                                                  <th style="display: none;">Modified On</th>
                                              </tr>
                                          </thead>
                  
                                          <tbody>
                                              <?php $__currentLoopData = $misstap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                              <tr id="manual_table_row_<?php echo e($data->Missed_id); ?>" <?php echo e(($data->rd == 1) ? 'class=deleted' : ''); ?>>
                                                <td style="display: none;"><?php echo e($key); ?></td>
                                                  <td>
                                                      <table id="manual_staff_view_<?php echo e($data->Missed_id); ?>">
                                                          <tr >
                                                              <td>
                                                                  <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                              </td>
                                                              <td class="staffView_StaffName" >
                                                                  <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                  <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                              </td>
                                                          </tr>
                                                      </table>
                                                  </td>
                                                
                                                  
                                                  <td id="manual_missTap_date_<?php echo e($data->Missed_id); ?>"><?php echo e($data->missTap_date); ?></td>
                                                  <td><strong><?php echo e($data->missTap_date); ?></strong></td>
                                                  <td id="manual_time_<?php echo e($data->Missed_id); ?>"><?php echo e($data->manual_time); ?></td>
                                                  <td><?php echo e($data->mtStamp); ?></td>
                                                  <td id="manual_description_<?php echo e($data->Missed_id); ?>"><?php echo e($data->manual_description); ?></td>
                                                    <?php if($data->rd == 1): ?>
                                                  <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->deleted_by); ?></strong><br><small>on</small> <strong><?php echo e($data->deleted_on); ?></strong> </td>
                                                  <?php else: ?> 
                                                  <td id="deleted_manual_<?php echo e($data->Missed_id); ?>"  align="center"><a onclick="editAddManual(<?php echo e($data->Manual_id); ?>,<?php echo e($data->Missed_id); ?>,'<?php echo e($data->Table_name); ?>')" ><i class="fa fa-edit"></i></a> | <a onclick="deleteAddManual(<?php echo e($data->Manual_id); ?>,<?php echo e($data->Missed_id); ?>,'<?php echo e($data->Table_name); ?>')" ><i class="fa fa-trash-o"></i></a><div id="misstap_modifiedOn_<?php echo e($data->Missed_id); ?>"><?php echo e($data->modifiedStamp); ?></div></td> <!---->
            
                                                  <?php endif; ?> <!---->
                                                  <td style="display: none;"><?php echo e($data->misstapModifiedOn); ?></td>
                                              </tr>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                                          </tbody>
                                      </table>
                                  </div>
                                  <!-- portlet-body -->
                                </div> 
                            </div><!-- Missed_Tap_Event -->
                        </div><!-- tab-content -->
                    </div><!-- tabbable-line -->
                </div><!-- PayrollAdjustments -->
                
                    <div class="tab-pane fade" id="Logs">
                      <div class="logsTableView">
                    	<div class="tabbable-line customTabbale">
                            <ul class="nav nav-tabs " id="" style="margin-bottom:0 !important;">
                                <li class="active">
                                    <a href="#Attendance_in_AbsentiaLog" data-toggle="tab"> Attendance in Absentia </a>
                                </li>
                                <li class="">
                                    <a href="#Leave_ApplicationLog" data-toggle="tab" data-staff="382"> Leave Applications </a>
                                </li>
                                <li>
                                    <a href="#Unauthorized_Leave_PenaltiesLog" data-toggle="tab"> Unauthorized Leave Penalties </a>
                                </li>
                                <li>
                                    <a href="#Exceptional_AdjustmentsLog" data-toggle="tab"> Exceptional Adjustments </a>
                                </li>
                                <li>
                                    <a href="#Missed_Tap_EventLog" data-toggle="tab"> Missed Tap Event </a>
                                </li>
                            </ul><!-- nav-tabs -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="Attendance_in_AbsentiaLog">
                                    <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                        <div class="portlet-title">
                                           <div class="caption">
                                              <i class="icon-users font-dark"></i>
                                              <span class="caption-subject font-dark sbold uppercase">Absentia </span>
                                           </div>
                                        </div>
                                        <!-- portlet-title -->
                                        <div class="portlet-body" style="padding:15px;">
                                            <table id="adjustmentTableAbsentiaLog" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                                <thead>
                                                    <tr>
                                                        
                                                        <th style="display: none;">No</th>
                                                        <th width="400 ">Staff</th>
                                                        <th>Title</th>
                                                        <th>Date</th>
                                                        <th width="150" >From <small>(time)</small></th>
                                                        <th width="150" >To <small>(time)</small></th>
                                                      
                                                        <th>Description</th>
                                                        <th width="180" >Action</th> <!---->
                                                        <th  style="display: none;">SNo</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                                    <?php  $records = [];  ?>
                                                    <?php $__currentLoopData = $absentiaLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                    <tr class="absentia_mainRow absentia_table_row_<?php echo e($data->absentia_id); ?> <?php echo e(($data->inDeleted == 1 && $data->outDeleted == 1) ? 'deleted' : ''); ?>" data-history="absentia_table_row_<?php echo e($data->absentia_id); ?>">
                                                        
                                                        <td style="display: none;"><?php echo e($key); ?></td>
                                                        <td>
                                                            <table class="absentia_staff_<?php echo e($data->staff_id); ?>">
                                                                <tr >
                                                                    <td>
                                                                        <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                                    </td>
                                                                    <td class="staffView_StaffName" >
                                                                        <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                        <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td id="absentia_title_<?php echo e($data->absentia_id); ?>"><?php echo e($data->aiaTitle); ?></td>
                                                        <td><strong><?php echo e($data->applyDate); ?></strong></td>
                                                        <td id="absentia_aiaStart_time_<?php echo e($data->absentia_id); ?>"><?php echo e($data->aiaStart_time); ?></td>
                                                        <td id="absentia_aiaEnd_time_<?php echo e($data->absentia_id); ?>"><?php echo e($data->aiaEnd_time); ?></td>
                                                       
                                                        <td id="absentia_description_<?php echo e($data->absentia_id); ?>"><?php echo e($data->aiaDescription); ?></td>
                                                        
                                                        <?php if( ($data->inDeleted == 1) && ($data->outDeleted == 1) ): ?>

                                                        <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->modify_by); ?>"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                          <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableAbsentiaLog', 'absentia_mainRow')">Show All</a>
                                                          <a class="showHistory" onclick="showHistory('absentia_table_row_<?php echo e($data->absentia_id); ?>', 'adjustmentTableAbsentiaLog', 'absentia_mainRow')">View history</a> </td>
                                                          <td  style="display: none;"><?php echo e($data->usortModify); ?></td>
                                                        <?php else: ?> 
                                                        
                                                        <?php if(in_array($data->absentia_id, $records)): ?>
                                                                                                            
                                                                                                      
                                                        <td align="center"><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->modify_by); ?>"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                          <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableAbsentiaLog', 'absentia_mainRow')">Show All</a>
                                                          <a class="showHistory" onclick="showHistory('absentia_table_row_<?php echo e($data->absentia_id); ?>', 'adjustmentTableAbsentiaLog', 'absentia_mainRow')" >View history</a> </td>
                                                          <td  style="display: none;"><?php echo e($data->usortModify); ?></td>
                                                          <?php else: ?> 
                                                          <?php  
                                                           array_push($records, $data->absentia_id);
                                                           ?>
                                                        <td align="center"><small> Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->modify_by); ?>"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                          <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableAbsentiaLog', 'absentia_mainRow')">Show All</a>
                                                          <a class="showHistory" onclick="showHistory('absentia_table_row_<?php echo e($data->absentia_id); ?>', 'adjustmentTableAbsentiaLog', 'absentia_mainRow')" >View history</a> </td>
                                                            <td style="display: none;" ><?php echo e($data->usortCreate); ?></td>
                                                           <?php endif; ?>

                                                        <?php endif; ?>

                                                        
                                                        
                                                    </tr>
                                                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- portlet-body -->
                                    </div>
                                </div><!-- Attendance_in_Absentia -->
                                <div class="tab-pane fade" id="Leave_ApplicationLog">
                                    <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                        <?php /* <div class="portlet-title">
                                           <div class="caption">
                                              <i class="icon-users font-dark"></i>
                                              <span class="caption-subject font-dark sbold uppercase">Leave Applications </span>
                                           </div>
                                        </div> */?>
                                        <!-- portlet-title -->
                                        <div class="portlet-body" style="padding:15px;">
                                            <table id="adjustmentTableLeavesLog" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                                <thead>
                                                    <tr>
                                                        <th style="display: none;">No</th>
                                                        <th width="400 ">Staff</th>
                                                        <th>Title</th>
                                                        <th>Date</th>
                                                        <th width="100" >Compensation<br />Request</th>
                                                        <th width="150" >From <small>(time)</small></th>
                                                        <th width="150" >To <small>(time)</small></th>
                                                        
                                                        <th>Description</th>
                                                        <th width="180" >Action</th> <!---->
                                                        <th style="display: none;">Sort</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                                    <?php  $leaveRecords = [];  ?>
                                                    <?php $__currentLoopData = $leaveLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                    <tr class="leave_mainRow leave_table_row_<?php echo e($data->leave_id); ?> <?php echo e(($data->rd == 1) ? 'deleted ' : ''); ?>"   data-id="<?php echo e($data->leave_id); ?>" data-history="leave_table_row_<?php echo e($data->leave_id); ?>">
                                                        <td style="display: none;"><?php echo e($key); ?></td>
                                                        <td>
                                                            <table class="leave_staff_<?php echo e($data->leave_id); ?>">
                                                                <tr>
                                                                    <td>
                                                                        <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                                    </td>
                                                                    <td class="staffView_StaffName" >
                                                                        <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                        <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td id="leave_title_<?php echo e($data->leave_id); ?>"><?php echo e($data->leave_title); ?></td>
                                                        <td><strong><?php echo e($data->startDate); ?></strong></td>
                                                        <td id="leave_compensation_<?php echo e($data->leave_id); ?>"><?php echo e(($data->paid_compensation == 1) ? 'YES' : 'NO'); ?></td>
                                                        <td>
                                                        <table width="100%" border="0" class="" style="margin:0;"><tbody><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested From"></i> &nbsp;<?php echo e($data->startDate); ?></td></tr>

                                                          <?php if(!empty($data->approve_to)): ?>
                                                          <tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved From"></i> &nbsp; <?php echo e($data->approve_to); ?></td></tr>
                                                          <?php endif; ?>
                                                        </tbody></table>
                                                      </td>
                                                      <td>
                                                        <table width="100%" border="0" class="" style="margin:0;"><tbody><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested From"></i> &nbsp;<?php echo e($data->endDate); ?></td></tr>

                                                          <?php if(!empty($data->approve_from)): ?>
                                                          <tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved From"></i> &nbsp; <?php echo e($data->approve_from); ?></td></tr>
                                                          <?php endif; ?>

                                                        </tbody></table>
                                                      </td>
                                                   

                                                        <td id="leave_description_<?php echo e($data->leave_id); ?>"><?php echo e($data->leave_description); ?></td>
                                                        
                                                        <?php if($data->rd == 1): ?>  
                                                            <td align="center" ><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->modify_by); ?>"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br /><a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableLeavesLog', 'leave_mainRow')">Show All</a>
                                                              <a class="showHistory" onclick="showHistory('leave_table_row_<?php echo e($data->leave_id); ?>', 'adjustmentTableLeavesLog', 'leave_mainRow')">View history</a> </td> 
                                                        <?php else: ?> 
                                                            <?php if(in_array($data->leave_id, $leaveRecords)): ?>
                                                                  <td align="center" ><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->modify_by); ?>"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br /><a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableLeavesLog', 'leave_mainRow')">Show All</a>
                                                                  <a class="showHistory" onclick="showHistory('leave_table_row_<?php echo e($data->leave_id); ?>', 'adjustmentTableLeavesLog', 'leave_mainRow')" >View history</a> </td>
                                                            <?php else: ?> 
                                                              <?php  
                                                               array_push($leaveRecords, $data->leave_id);
                                                               ?>
                                                                <td align="center" ><small>Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->modify_by); ?>"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br /><a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableLeavesLog', 'leave_mainRow')">Show All</a>
                                                                  <a class="showHistory" onclick="showHistory('leave_table_row_<?php echo e($data->leave_id); ?>', 'adjustmentTableLeavesLog', 'leave_mainRow')" >View history</a> </td> 
                                                              <?php endif; ?>   
                                                        <?php endif; ?>
                                                        <td style="display: none;"><?php echo e($data->usort); ?></td>

                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- portlet-body -->
                                    </div>
                                </div><!-- Leave_Application -->
                                <div class="tab-pane fade" id="Unauthorized_Leave_PenaltiesLog">
                                    <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                        <div class="portlet-title">
                                           <div class="caption">
                                              <i class="icon-users font-dark"></i>
                                              <span class="caption-subject font-dark sbold uppercase">Unauthorized Leave Penalties </span>
                                           </div>
                                        </div>
                                        <!-- portlet-title -->
                                        <div class="portlet-body" style="padding:15px;">
                                            <table id="adjustmentTableUnauthorizedLeavesLog" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                                <thead>
                                                    <tr>
                                                        <th style="display: none;">No</th>
                                                        <th width="400 ">Staff</th>
                                                        <th>Title</th>
                                                        <th>Date</th>
                                                        <th width="150" >From <small>(time)</small></th>
                                                        <th width="150" >To <small>(time)</small></th>
                                                        
                                                        <th>Description</th>
                                                        <th width="180" >Action</th> <!---->
                                                        <th style="display: none;">Sort</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                                    <?php  $penaltyRecords = [];  ?>
                                                    <?php $__currentLoopData = $penaltyLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                    <tr data-history="penalty_table_row_<?php echo e($data->penalty_id); ?>" class="penalty_table_row_<?php echo e($data->penalty_id); ?> penalty_mainRow <?php echo e(($data->rd == 1) ? 'deleted' : ''); ?>" >
                                                        <td style="display: none;"><?php echo e($key); ?></td>
                                                        <td>
                                                            <table class="penalty_staff_view_<?php echo e($data->penalty_id); ?>">
                                                                <tr >
                                                                    <td>
                                                                        <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                                    </td>
                                                                    <td class="staffView_StaffName" >
                                                                        <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                        <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td id="penalty_title_<?php echo e($data->penalty_id); ?>"><?php echo e($data->penalty_title); ?></td>
                                                        <td ><strong><?php echo e($data->startDate); ?></strong></td>
                                                        <td id="penalty_from_<?php echo e($data->penalty_id); ?>"><?php echo e($data->startDate); ?></td>
                                                        <td id="penalty_to_<?php echo e($data->penalty_id); ?>"><?php echo e($data->endDate); ?></td>
                                                        
                                                        <td id="penalty_description_<?php echo e($data->penalty_id); ?>"><?php echo e($data->penalty_description); ?></td>

                                                        <?php if($data->rd == 1): ?>  
                                                            <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br /><a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">Show All</a>
                                                              <a  class="showHistory" onclick="showHistory('penalty_table_row_<?php echo e($data->penalty_id); ?>', 'adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">View history</a> </td> 
                                                        <?php else: ?> 
                                                            <?php if(in_array($data->penalty_id, $penaltyRecords)): ?>
                                                                <td align="center"><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                                  <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">Show All</a>
                                                                  <a  class="showHistory" onclick="showHistory('penalty_table_row_<?php echo e($data->penalty_id); ?>', 'adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">View history</a> </td>
                                                                <?php else: ?>
                                                                  <?php  
                                                                   array_push($penaltyRecords, $data->penalty_id);
                                                                   ?>                                                            
                                                                  <td align="center"><small>Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                                  <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">Show All</a>
                                                                  <a  class="showHistory" onclick="showHistory('penalty_table_row_<?php echo e($data->penalty_id); ?>', 'adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">View history</a> </td>                                                            
                                                                <?php endif; ?> 
                                                        <?php endif; ?>                                                    
                                                       

                                                        <td style="display: none;"><?php echo e($data->usort); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- portlet-body -->
                                    </div>
                                </div><!-- Unauthorized_Leave_Penalties -->
                                <div class="tab-pane fade" id="Exceptional_AdjustmentsLog">
                                    
                                    <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                      <div class="portlet-title">
                                         <div class="caption">
                                            <i class="icon-users font-dark"></i>
                                            <span class="caption-subject font-dark sbold uppercase">Exceptional Adjustments </span>
                                         </div>
                                      </div>
                                      <!-- portlet-title -->
                                      <div class="portlet-body" style="padding:15px;">
                                          <table id="exceptionAdjustmentTableLog" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                              <thead>
                                                  <tr>
                                                      <th style="display: none;">No</th>
                                                      <th width="400 ">Staff</th>
                                                      <th>Title</th>
                                                      <th>Date</th>
                                                      <th width="150" >Day</th>
                                                      
                                                      <th>Description</th>
                                                      <th width="180" >Action</th> <!---->
                                                      <th style="display: none;">Sort</th>
                                                  </tr>
                                              </thead>
                      
                                              <tbody>
                                                  <?php  $adjustmentRecords = [];  ?>
                                                  <?php $__currentLoopData = $exceptionLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                  <tr data-history="exception_table_row_<?php echo e($data->exceptional_id); ?>" class="exceptional_mainRow exception_table_row_<?php echo e($data->exceptional_id); ?> <?php echo e(($data->rd == 1) ? 'deleted' : ''); ?>" >
                                                      <td style="display: none;"><?php echo e($key); ?></td>
                                                      <td>
                                                          <table class="adjustment_staff_<?php echo e($data->exceptional_id); ?>">
                                                              <tr >
                                                                  <td>
                                                                      <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                                  </td>
                                                                  <td class="staffView_StaffName" >
                                                                      <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                      <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                                  </td>
                                                              </tr>
                                                          </table>
                                                      </td>
                                                      <td id="adjustment_staff_title_<?php echo e($data->exceptional_id); ?>"><?php echo e($data->adjustment_title); ?></td>
                                                      <td><strong><?php echo e($data->onDate); ?></strong></td>
                                                      <td id="adjustment_staff_day_<?php echo e($data->exceptional_id); ?>"><?php echo e($data->adjustment_day); ?></td>
                                                      
                                                      <td id="adjustment_staff_description_<?php echo e($data->exceptional_id); ?>"><?php echo e($data->adjustment_description); ?></td>
                                                        <?php if($data->rd == 1): ?>  
                                                            <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                              <a class="hideHistory"  style="display: none;" onclick="showAll('exceptionAdjustmentTableLog', 'exceptional_mainRow')">Show All</a>

                                                              <a class="showHistory" onclick="showHistory('exception_table_row_<?php echo e($data->exceptional_id); ?>', 'exceptionAdjustmentTableLog', 'exceptional_mainRow')">View history</a> </td>
                                                        <?php else: ?>
                                                             <?php if(in_array($data->exceptional_id, $adjustmentRecords)): ?> 
                                                            <td align="center"><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                              <a class="hideHistory"  style="display: none;" onclick="showAll('exceptionAdjustmentTableLog', 'exceptional_mainRow')">Show All</a>

                                                              <a class="showHistory" onclick="showHistory('exception_table_row_<?php echo e($data->exceptional_id); ?>', 'exceptionAdjustmentTableLog', 'exceptional_mainRow')">View history</a> </td>
                                                              <?php else: ?>

                                                                  <?php  
                                                                   array_push($adjustmentRecords, $data->exceptional_id);
                                                                   ?>
                                                                    <td align="center">
                                                                        <small>Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                                        <a class="hideHistory"  style="display: none;" onclick="showAll('exceptionAdjustmentTableLog', 'exceptional_mainRow')">Show All</a>

                                                                        <a class="showHistory" onclick="showHistory('exception_table_row_<?php echo e($data->exceptional_id); ?>', 'exceptionAdjustmentTableLog', 'exceptional_mainRow')">View history</a> 
                                                                  </td>

                                                               <?php endif; ?>   
                                                        <?php endif; ?>
                                                      
                                                        <td style="display: none;"> <?php echo e($data->usort); ?> </td>
                                                  </tr>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                              </tbody>
                                          </table>
                                      </div>
                                      <!-- portlet-body -->
                                    </div>                    
                                </div><!-- Exceptional_Adjustments -->
                                <div class="tab-pane fade" id="Missed_Tap_EventLog">
                                                        <div class="portlet light bordered padding0 marginBottom0" style="border:1px solid #ddd !important;border-top:0 none !important;">
                                      <div class="portlet-title">
                                         <div class="caption">
                                            <i class="icon-users font-dark"></i>
                                            <span class="caption-subject font-dark sbold uppercase">Missed Tap Event </span>
                                         </div>
                                      </div>
                                      <!-- portlet-title -->
                                      <div class="portlet-body" style="padding:15px;">
                                          <table id="missTapEventTableLog" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
                                              <thead>
                                                  <tr>
                                                      <th style="display: none;">No</th>
                                                      <th width="400 ">Staff</th>
                                                      <th>Attendance Date</th>
                                                      <th>Attendance Date</th>
                                                      <th width="150" >Tap</th>
                                                      
                                                      <th>Additional Comments</th>
                                                      <th width="180" >Action</th> <!---->
                                                      <th  style="display: none;" >sort</th>
                                                  </tr>
                                              </thead>
                      
                                              <tbody>
                                                  <?php  $missedRecords = [];  ?>
                                                  <?php $__currentLoopData = $misstapLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                  <tr data-history="manual_table_row_<?php echo e($data->Missed_id); ?>" class="manual_table_row_<?php echo e($data->Missed_id); ?> manual_mainRow <?php echo e(($data->rd == 1) ? 'deleted' : ''); ?>" >
                                                    <td style="display: none;"><?php echo e($key); ?></td>
                                                      <td>
                                                          <table id="manual_staff_view_<?php echo e($data->Missed_id); ?>">
                                                              <tr >
                                                                  <td>
                                                                      <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/<?php echo e($data->employee_id); ?>.png">
                                                                  </td>
                                                                  <td class="staffView_StaffName" >
                                                                      <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title=""><?php echo e($data->name); ?></a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2"><?php echo e($data->name_code); ?></small><br>
                                                                      <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="<?php echo e($data->c_bottomline); ?>"><?php echo e($data->c_bottomline); ?></span></small>
                                                                  </td>
                                                              </tr>
                                                          </table>
                                                      </td>
                                                    
                                                      
                                                      <td id="manual_missTap_date_<?php echo e($data->Missed_id); ?>"><?php echo e($data->missTap_date); ?></td>
                                                      <td><strong><?php echo e($data->missTap_date); ?></strong></td>
                                                      <td id="manual_time_<?php echo e($data->Missed_id); ?>"><?php echo e($data->manual_time); ?></td>
                                                     
                                                      <td id="manual_description_<?php echo e($data->Missed_id); ?>"><?php echo e($data->manual_description); ?></td>
                                                      
                                                       <?php if($data->rd == 1): ?>  
                                                            <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                              <a class="hideHistory" style="display: none;" onclick="showAll('missTapEventTableLog', 'manual_mainRow')">Show All</a>

                                                              <a class="showHistory" onclick="showHistory('manual_table_row_<?php echo e($data->Missed_id); ?>', 'missTapEventTableLog', 'manual_mainRow')">View history</a> </td>
                                                        <?php else: ?> 
                                                            <?php if(in_array($data->Missed_id, $missedRecords)): ?> 
                         
                                                                <td align="center"><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                                  <a class="hideHistory"  style="display: none;" onclick="showAll('missTapEventTableLog', 'manual_mainRow')">Show All</a>
                                                                  <a class="showHistory"  onclick="showHistory('manual_table_row_<?php echo e($data->Missed_id); ?>', 'missTapEventTableLog', 'manual_mainRow')">View history</a> </td>
                                                           
                                                            <?php else: ?>
                                                                <?php  
                                                                    array_push($missedRecords, $data->Missed_id);
                                                                 ?>
                                                                    <td align="center">
                                                                      <small>Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum"><?php echo e($data->modify_by); ?></strong><br><small>on</small> <strong><?php echo e($data->modify_on); ?></strong><br />
                                                                      <a class="hideHistory"  style="display: none;" onclick="showAll('missTapEventTableLog', 'manual_mainRow')">Show All</a>
                                                                      <a class="showHistory"  onclick="showHistory('manual_table_row_<?php echo e($data->Missed_id); ?>', 'missTapEventTableLog', 'manual_mainRow')">View history</a> 
                                                                    </td>                                                            
                                                            
                                                            <?php endif; ?>                                       

                                                        <?php endif; ?>
                                                      

                                                        <td style="display: none;" ><?php echo e($data->usort); ?></td>
                                                  </tr>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                                              </tbody>
                                          </table>
                                      </div>
                                      <!-- portlet-body -->
                                    </div> 
                                </div><!-- Missed_Tap_Event -->
                            </div><!-- tab-content -->
                        </div><!-- tabbable-line -->
                      </div>
                    </div>

            </div>
      
        </div><!-- portlet Light -->
    </div><!-- col-md-12 v-->
</div><!-- .row -->
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
