<!-- BEGIN PAGE LEVEL STYLES -->

<link href="{{ URL::to('/css/ProfileDefinition.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::to('/metronic/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::to('/metronic/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
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
                                @foreach ($staff as $data)
                                  <option value="{{ $data->staff_id }}"> {{ $data->abridged_name }}<small> - {{ $data->name_code }}</small></option>
                                @endforeach                   
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
                            @foreach ($staff as $data)
                                <option value="{{ $data->staff_id }}"> {{ $data->abridged_name }}<small> - {{ $data->name_code }}</small></option>
                            @endforeach                             
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
                                              @foreach ($staff as $data)
                                                  <option value="{{ $data->staff_id }}"> {{ $data->abridged_name }}<small> - {{ $data->name_code }}</small></option>
                                              @endforeach 
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
                            @foreach ($staff as $data)
                                <option value="{{ $data->staff_id }}"> {{ $data->abridged_name }}<small> - {{ $data->name_code }}</small></option>
                            @endforeach 
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
                            @foreach ($staff as $data)
                                <option value="{{ $data->staff_id }}"> {{ $data->abridged_name }}<small> - {{ $data->name_code }}</small></option>
                            @endforeach                             
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
                                                @foreach($absentia as $key => $data) 
                                                <tr id="absentia_table_row_{{$data->absentia_id}}" {{($data->saoDeleted == 1 && $data->saiDeleted == 1) ? 'class=deleted' : ''}}>
                                                    <td style="display: none;">{{$key}}</td>
                                                    <td>
                                                        <table class="absentia_staff_{{$data->staff_id}}">
                                                            <tr >
                                                                <td>
                                                                    <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                                </td>
                                                                <td class="staffView_StaffName" >
                                                                    <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                    <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td id="absentia_title_{{$data->absentia_id}}">{{$data->aiaTitle}}</td>
                                                    <td><strong>{{$data->aiaStamp}}</strong></td>
                                                    <td id="absentia_aiaStart_time_{{$data->absentia_id}}">{{$data->aiaStart_time}}</td>
                                                    <td id="absentia_aiaEnd_time_{{$data->absentia_id}}">{{$data->aiaEnd_time}}</td>
                                                    <td id="absentia_aiaStamp_{{$data->absentia_id}}">{{$data->applyDate}}</td>
                                                    
                                                    <td id="absentia_description_{{$data->absentia_id}}">{{$data->description}}</td>
                                                    
                                                    @if($data->saoDeleted == 1 && $data->saiDeleted == 1)
                                                    <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="{{$data->deleted_by}}">{{$data->deleted_by}}</strong><br><small>on</small> <strong>{{$data->deleted_on}}</strong> </td>
                                                    @else 
                                                    <td align="center" id="deleted_absentia_{{$data->absentia_id}}"><a onclick="Edit_Absentia({{$data->absentia_id}}, {{$data->staff_id}})"><i class="fa fa-edit"></i></a> | <a onclick="delete_Absentia({{$data->absentia_id}}, {{$data->staff_id}})" ><i class="fa fa-trash-o"></i></a><div id="absentia_modifiedOn_{{$data->absentia_id}}">{{$data->aiaModifiedStamp}}</div></td> <!---->
                                                    
                                                    @endif
                                                    <td  style="display: none;" >{{$data->aiaModifiedOn}}</td>
                                                    <td  style="display: none;" >{{strtotime($data->aiaModifiedOn)}}</td>
                                                </tr>
                                              @endforeach
                                               
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
                                                
                                                @foreach($leave as $key => $data) 
                                                <tr {{($data->rd == 1) ? 'class=deleted' : ''}}  data-id="{{$data->leave_id}}">
                                                    <td style="display: none;">{{$key}}</td>
                                                    <td>
                                                        <table class="leave_staff_{{$data->leave_id}}">
                                                            <tr>
                                                                <td>
                                                                    <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                                </td>
                                                                <td class="staffView_StaffName" >
                                                                    <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                    <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td id="leave_title_{{$data->leave_id}}">{{$data->leave_title}}</td>
                                                    <td id="leave_laStamp_{{$data->leave_id}}" ><strong>{{$data->laStamp}}</strong></td>
                                                    <td id="leave_compensation_{{$data->leave_id}}">{{($data->paid_compensation == 1) ? 'NO' : 'YES' }}</td>
                                                    <td id="leave_startDate_{{$data->leave_id}}">{{$data->startDate}}</td>
                                                    <td id="leave_endDate_{{$data->leave_id}}">{{$data->endDate}}</td>
                                                    
                                                    <td id="leave_description_{{$data->leave_id}}">{{ $data->leave_description }}</td>
                                                     @if($data->rd == 1)
                                                    <td align="center" ><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="{{$data->deleted_by}}">{{$data->deleted_by}}</strong><br><small>on</small> <strong>{{$data->deleted_on}}</strong> </td>
                                                    @else 
                                                    <td align="center" id="deleted_{{$data->leave_id}}" ><a onClick="ReWriteLeave({{$data->leave_id}})" ><i class="fa fa-edit"></i></a> | <a onClick="delectLeave({{$data->leave_id}})" ><i class="fa fa-trash-o"></i></a><div id="leave_modifiedOn_{{$data->leave_id}}">{{$data->modifiedStamp}}</div></td> <!---->
            
                                                    @endif <!---->
                                                    <td style="display: none;">{{$data->laModifiedOn}}</td>
                                                </tr>
                                                @endforeach
             
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
                                                @foreach($penalty as $data) 
                                                <tr id="penalty_table_row_{{$data->penalty_id}}" {{($data->rd == 1) ? 'class=deleted' : ''}}>
                                                    <td style="display: none;">{{$key}}</td>
                                                    <td>
                                                        <table class="penalty_staff_view_{{$data->penalty_id}}">
                                                            <tr >
                                                                <td>
                                                                    <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                                </td>
                                                                <td class="staffView_StaffName" >
                                                                    <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                    <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td id="penalty_title_{{$data->penalty_id}}">{{$data->penalty_title}}</td>
                                                    <td ><strong>{{$data->startDate}}</strong></td>
                                                    <td id="penalty_from_{{$data->penalty_id}}">{{$data->penalty_from}}</td>
                                                    <td id="penalty_to_{{$data->penalty_id}}">{{$data->penalty_to}}</td>
                                                    <td>{{$data->dpStamp}}</td>
                                                    <td id="penalty_description_{{$data->penalty_id}}">{{$data->penalty_description}}</td>
                                                      @if($data->rd == 1)
                                                    <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->deleted_by}}</strong><br><small>on</small> <strong>{{$data->deleted_on}}</strong> </td>
                                                    @else 
                                                    <td id="deleted_penalty_{{$data->penalty_id}}"  align="center"><a onclick="ReWriteLeavePenalties({{$data->penalty_id}})" ><i class="fa fa-edit"></i></a> | <a onclick="deleteLeavePenalties({{$data->penalty_id}})" ><i class="fa fa-trash-o"></i></a>
                                                      <div id="penalty_modifiedOn_{{$data->penalty_id}}">{{$data->dpModifiedStamp}}</div>
                                                      
                                                    </td> <!---->
                                                    
                                                    @endif <!---->
                                                    <td style="display: none;">{{$data->dpModifiedOn}}</td>
                                                </tr>
                                                @endforeach
            
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
                                              @foreach($exception as $key => $data) 
                                              <tr id="exception_table_row_{{$data->exceptional_id}}" {{($data->rd == 1) ? 'class=deleted' : ''}}>
                                                  <td style="display: none;">{{$key}}</td>
                                                  <td>
                                                      <table class="adjustment_staff_{{$data->exceptional_id}}">
                                                          <tr >
                                                              <td>
                                                                  <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                              </td>
                                                              <td class="staffView_StaffName" >
                                                                  <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                  <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                              </td>
                                                          </tr>
                                                      </table>
                                                  </td>
                                                  <td id="adjustment_staff_title_{{$data->exceptional_id}}">{{$data->adjustment_title}}</td>
                                                  <td><strong>{{$data->onDate}}</strong></td>
                                                  <td id="adjustment_staff_day_{{$data->exceptional_id}}">{{$data->adjustment_day}}</td>
                                                  <td>{{$data->eaStamp}}</td>
                                                  <td id="adjustment_staff_description_{{$data->exceptional_id}}">{{$data->adjustment_description}}</td>
                                                    @if($data->rd == 1)
                                                  <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->deleted_by}}</strong><br><small>on</small> <strong>{{$data->deleted_on}}</strong> </td>
                                                  @else 
                                                  <td id="deleted_adjustment_{{$data->exceptional_id}}"  align="center"><a onclick="ReWriteAdjustment({{$data->exceptional_id}})"><i class="fa fa-edit"></i></a> | <a onclick="deleteAdjustment({{$data->exceptional_id}})" ><i class="fa fa-trash-o"></i></a>
                                                    <div id="adjustment_modifiedOn_{{$data->exceptional_id}}">{{$data->eaModifiedStamp}}</div>
                                                  </td> <!---->
            
                                                  @endif <!---->
                                                  <td style="display: none;">{{$data->eaModifiedOn}}</td>
                                              </tr>
                                              @endforeach
            
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
                                              @foreach($misstap as $key => $data) 
                                              <tr id="manual_table_row_{{$data->Missed_id}}" {{($data->rd == 1) ? 'class=deleted' : ''}}>
                                                <td style="display: none;">{{$key}}</td>
                                                  <td>
                                                      <table id="manual_staff_view_{{$data->Missed_id}}">
                                                          <tr >
                                                              <td>
                                                                  <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                              </td>
                                                              <td class="staffView_StaffName" >
                                                                  <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                  <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                              </td>
                                                          </tr>
                                                      </table>
                                                  </td>
                                                
                                                  
                                                  <td id="manual_missTap_date_{{$data->Missed_id}}">{{$data->missTap_date}}</td>
                                                  <td><strong>{{$data->missTap_date}}</strong></td>
                                                  <td id="manual_time_{{$data->Missed_id}}">{{$data->manual_time}}</td>
                                                  <td>{{$data->mtStamp}}</td>
                                                  <td id="manual_description_{{$data->Missed_id}}">{{$data->manual_description}}</td>
                                                    @if($data->rd == 1)
                                                  <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->deleted_by}}</strong><br><small>on</small> <strong>{{$data->deleted_on}}</strong> </td>
                                                  @else 
                                                  <td id="deleted_manual_{{$data->Missed_id}}"  align="center"><a onclick="editAddManual({{$data->Manual_id}},{{$data->Missed_id}},'{{$data->Table_name}}')" ><i class="fa fa-edit"></i></a> | <a onclick="deleteAddManual({{$data->Manual_id}},{{$data->Missed_id}},'{{$data->Table_name}}')" ><i class="fa fa-trash-o"></i></a><div id="misstap_modifiedOn_{{$data->Missed_id}}">{{$data->modifiedStamp}}</div></td> <!---->
            
                                                  @endif <!---->
                                                  <td style="display: none;">{{$data->misstapModifiedOn}}</td>
                                              </tr>
                                              @endforeach
            
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
                                                    @php $records = []; @endphp
                                                    @foreach($absentiaLogs as $key => $data) 
                                                    <tr class="absentia_mainRow absentia_table_row_{{$data->absentia_id}} {{($data->inDeleted == 1 && $data->outDeleted == 1) ? 'deleted' : ''}}" data-history="absentia_table_row_{{$data->absentia_id}}">
                                                        
                                                        <td style="display: none;">{{$key}}</td>
                                                        <td>
                                                            <table class="absentia_staff_{{$data->staff_id}}">
                                                                <tr >
                                                                    <td>
                                                                        <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                                    </td>
                                                                    <td class="staffView_StaffName" >
                                                                        <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                        <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td id="absentia_title_{{$data->absentia_id}}">{{$data->aiaTitle}}</td>
                                                        <td><strong>{{$data->applyDate}}</strong></td>
                                                        <td id="absentia_aiaStart_time_{{$data->absentia_id}}">{{$data->aiaStart_time}}</td>
                                                        <td id="absentia_aiaEnd_time_{{$data->absentia_id}}">{{$data->aiaEnd_time}}</td>
                                                       
                                                        <td id="absentia_description_{{$data->absentia_id}}">{{$data->aiaDescription}}</td>
                                                        
                                                        @if ( ($data->inDeleted == 1) && ($data->outDeleted == 1) )

                                                        <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="{{$data->modify_by}}">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                          <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableAbsentiaLog', 'absentia_mainRow')">Show All</a>
                                                          <a class="showHistory" onclick="showHistory('absentia_table_row_{{$data->absentia_id}}', 'adjustmentTableAbsentiaLog', 'absentia_mainRow')">View history</a> </td>
                                                          <td  style="display: none;">{{$data->usortModify}}</td>
                                                        @else 
                                                        
                                                        @if (in_array($data->absentia_id, $records))
                                                                                                            
                                                                                                      
                                                        <td align="center"><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="{{$data->modify_by}}">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                          <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableAbsentiaLog', 'absentia_mainRow')">Show All</a>
                                                          <a class="showHistory" onclick="showHistory('absentia_table_row_{{$data->absentia_id}}', 'adjustmentTableAbsentiaLog', 'absentia_mainRow')" >View history</a> </td>
                                                          <td  style="display: none;">{{$data->usortModify}}</td>
                                                          @else 
                                                          @php 
                                                           array_push($records, $data->absentia_id);
                                                          @endphp
                                                        <td align="center"><small> Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="{{$data->modify_by}}">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                          <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableAbsentiaLog', 'absentia_mainRow')">Show All</a>
                                                          <a class="showHistory" onclick="showHistory('absentia_table_row_{{$data->absentia_id}}', 'adjustmentTableAbsentiaLog', 'absentia_mainRow')" >View history</a> </td>
                                                            <td style="display: none;" >{{$data->usortCreate}}</td>
                                                           @endif

                                                        @endif

                                                        
                                                        
                                                    </tr>
                                                  	@endforeach
                                                   
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
                                                    @php $leaveRecords = []; @endphp
                                                    @foreach($leaveLogs as $key => $data) 
                                                    <tr class="leave_mainRow leave_table_row_{{$data->leave_id}} {{($data->rd == 1) ? 'deleted ' : ''}}"   data-id="{{$data->leave_id}}" data-history="leave_table_row_{{$data->leave_id}}">
                                                        <td style="display: none;">{{$key}}</td>
                                                        <td>
                                                            <table class="leave_staff_{{$data->leave_id}}">
                                                                <tr>
                                                                    <td>
                                                                        <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                                    </td>
                                                                    <td class="staffView_StaffName" >
                                                                        <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                        <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td id="leave_title_{{$data->leave_id}}">{{$data->leave_title}}</td>
                                                        <td><strong>{{$data->startDate}}</strong></td>
                                                        <td id="leave_compensation_{{$data->leave_id}}">{{($data->paid_compensation == 1) ? 'YES' : 'NO' }}</td>
                                                        <td>
                                                        <table width="100%" border="0" class="" style="margin:0;"><tbody><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested From"></i> &nbsp;{{$data->startDate}}</td></tr>

                                                          @if(!empty($data->approve_to))
                                                          <tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved From"></i> &nbsp; {{$data->approve_to}}</td></tr>
                                                          @endif
                                                        </tbody></table>
                                                      </td>
                                                      <td>
                                                        <table width="100%" border="0" class="" style="margin:0;"><tbody><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested From"></i> &nbsp;{{$data->endDate}}</td></tr>

                                                          @if(!empty($data->approve_from))
                                                          <tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved From"></i> &nbsp; {{$data->approve_from}}</td></tr>
                                                          @endif

                                                        </tbody></table>
                                                      </td>
                                                   

                                                        <td id="leave_description_{{$data->leave_id}}">{{ $data->leave_description }}</td>
                                                        
                                                        @if ($data->rd == 1)  
                                                            <td align="center" ><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="{{$data->modify_by}}">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br /><a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableLeavesLog', 'leave_mainRow')">Show All</a>
                                                              <a class="showHistory" onclick="showHistory('leave_table_row_{{$data->leave_id}}', 'adjustmentTableLeavesLog', 'leave_mainRow')">View history</a> </td> 
                                                        @else 
                                                            @if (in_array($data->leave_id, $leaveRecords))
                                                                  <td align="center" ><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="{{$data->modify_by}}">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br /><a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableLeavesLog', 'leave_mainRow')">Show All</a>
                                                                  <a class="showHistory" onclick="showHistory('leave_table_row_{{$data->leave_id}}', 'adjustmentTableLeavesLog', 'leave_mainRow')" >View history</a> </td>
                                                            @else 
                                                              @php 
                                                               array_push($leaveRecords, $data->leave_id);
                                                              @endphp
                                                                <td align="center" ><small>Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="{{$data->modify_by}}">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br /><a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableLeavesLog', 'leave_mainRow')">Show All</a>
                                                                  <a class="showHistory" onclick="showHistory('leave_table_row_{{$data->leave_id}}', 'adjustmentTableLeavesLog', 'leave_mainRow')" >View history</a> </td> 
                                                              @endif   
                                                        @endif
                                                        <td style="display: none;">{{$data->usort}}</td>

                                                    </tr>
                                                    @endforeach
                 
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
                                                    @php $penaltyRecords = []; @endphp
                                                    @foreach($penaltyLogs as $data) 
                                                    <tr data-history="penalty_table_row_{{$data->penalty_id}}" class="penalty_table_row_{{$data->penalty_id}} penalty_mainRow {{($data->rd == 1) ? 'deleted' : ''}}" >
                                                        <td style="display: none;">{{$key}}</td>
                                                        <td>
                                                            <table class="penalty_staff_view_{{$data->penalty_id}}">
                                                                <tr >
                                                                    <td>
                                                                        <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                                    </td>
                                                                    <td class="staffView_StaffName" >
                                                                        <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                        <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td id="penalty_title_{{$data->penalty_id}}">{{$data->penalty_title}}</td>
                                                        <td ><strong>{{$data->startDate}}</strong></td>
                                                        <td id="penalty_from_{{$data->penalty_id}}">{{$data->startDate}}</td>
                                                        <td id="penalty_to_{{$data->penalty_id}}">{{$data->endDate}}</td>
                                                        
                                                        <td id="penalty_description_{{$data->penalty_id}}">{{$data->penalty_description}}</td>

                                                        @if ($data->rd == 1)  
                                                            <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br /><a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">Show All</a>
                                                              <a  class="showHistory" onclick="showHistory('penalty_table_row_{{$data->penalty_id}}', 'adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">View history</a> </td> 
                                                        @else 
                                                            @if (in_array($data->penalty_id, $penaltyRecords))
                                                                <td align="center"><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                                  <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">Show All</a>
                                                                  <a  class="showHistory" onclick="showHistory('penalty_table_row_{{$data->penalty_id}}', 'adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">View history</a> </td>
                                                                @else
                                                                  @php 
                                                                   array_push($penaltyRecords, $data->penalty_id);
                                                                  @endphp                                                            
                                                                  <td align="center"><small>Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                                  <a class="hideHistory"  style="display: none;" onclick="showAll('adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">Show All</a>
                                                                  <a  class="showHistory" onclick="showHistory('penalty_table_row_{{$data->penalty_id}}', 'adjustmentTableUnauthorizedLeavesLog', 'penalty_mainRow')">View history</a> </td>                                                            
                                                                @endif 
                                                        @endif                                                    
                                                       

                                                        <td style="display: none;">{{$data->usort}}</td>
                                                    </tr>
                                                    @endforeach
                
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
                                                  @php $adjustmentRecords = []; @endphp
                                                  @foreach($exceptionLogs as $key => $data) 
                                                  <tr data-history="exception_table_row_{{$data->exceptional_id}}" class="exceptional_mainRow exception_table_row_{{$data->exceptional_id}} {{($data->rd == 1) ? 'deleted' : ''}}" >
                                                      <td style="display: none;">{{$key}}</td>
                                                      <td>
                                                          <table class="adjustment_staff_{{$data->exceptional_id}}">
                                                              <tr >
                                                                  <td>
                                                                      <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                                  </td>
                                                                  <td class="staffView_StaffName" >
                                                                      <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                      <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                                  </td>
                                                              </tr>
                                                          </table>
                                                      </td>
                                                      <td id="adjustment_staff_title_{{$data->exceptional_id}}">{{$data->adjustment_title}}</td>
                                                      <td><strong>{{$data->onDate}}</strong></td>
                                                      <td id="adjustment_staff_day_{{$data->exceptional_id}}">{{$data->adjustment_day}}</td>
                                                      
                                                      <td id="adjustment_staff_description_{{$data->exceptional_id}}">{{$data->adjustment_description}}</td>
                                                        @if ($data->rd == 1)  
                                                            <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                              <a class="hideHistory"  style="display: none;" onclick="showAll('exceptionAdjustmentTableLog', 'exceptional_mainRow')">Show All</a>

                                                              <a class="showHistory" onclick="showHistory('exception_table_row_{{$data->exceptional_id}}', 'exceptionAdjustmentTableLog', 'exceptional_mainRow')">View history</a> </td>
                                                        @else
                                                             @if (in_array($data->exceptional_id, $adjustmentRecords)) 
                                                            <td align="center"><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                              <a class="hideHistory"  style="display: none;" onclick="showAll('exceptionAdjustmentTableLog', 'exceptional_mainRow')">Show All</a>

                                                              <a class="showHistory" onclick="showHistory('exception_table_row_{{$data->exceptional_id}}', 'exceptionAdjustmentTableLog', 'exceptional_mainRow')">View history</a> </td>
                                                              @else

                                                                  @php 
                                                                   array_push($adjustmentRecords, $data->exceptional_id);
                                                                  @endphp
                                                                    <td align="center">
                                                                        <small>Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                                        <a class="hideHistory"  style="display: none;" onclick="showAll('exceptionAdjustmentTableLog', 'exceptional_mainRow')">Show All</a>

                                                                        <a class="showHistory" onclick="showHistory('exception_table_row_{{$data->exceptional_id}}', 'exceptionAdjustmentTableLog', 'exceptional_mainRow')">View history</a> 
                                                                  </td>

                                                               @endif   
                                                        @endif
                                                      
                                                        <td style="display: none;"> {{$data->usort}} </td>
                                                  </tr>
                                                  @endforeach
                
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
                                                  @php $missedRecords = []; @endphp
                                                  @foreach($misstapLogs as $key => $data) 
                                                  <tr data-history="manual_table_row_{{$data->Missed_id}}" class="manual_table_row_{{$data->Missed_id}} manual_mainRow {{($data->rd == 1) ? 'deleted' : ''}}" >
                                                    <td style="display: none;">{{$key}}</td>
                                                      <td>
                                                          <table id="manual_staff_view_{{$data->Missed_id}}">
                                                              <tr >
                                                                  <td>
                                                                      <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-059" src="assets/photos/hcm/150x150/staff/{{$data->employee_id}}.png">
                                                                  </td>
                                                                  <td class="staffView_StaffName" >
                                                                      <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ALB" data-staffid="382" data-staffgtid="13-059" data-content="Tap In awaited" data-title="">{{$data->name}}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.khan2">{{$data->name_code}}</small><br>
                                                                      <small style="margin-left: 10px;color: #888;"><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->c_bottomline }}">{{ $data->c_bottomline }}</span></small>
                                                                  </td>
                                                              </tr>
                                                          </table>
                                                      </td>
                                                    
                                                      
                                                      <td id="manual_missTap_date_{{$data->Missed_id}}">{{$data->missTap_date}}</td>
                                                      <td><strong>{{$data->missTap_date}}</strong></td>
                                                      <td id="manual_time_{{$data->Missed_id}}">{{$data->manual_time}}</td>
                                                     
                                                      <td id="manual_description_{{$data->Missed_id}}">{{$data->manual_description}}</td>
                                                      
                                                       @if ($data->rd == 1)  
                                                            <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                              <a class="hideHistory" style="display: none;" onclick="showAll('missTapEventTableLog', 'manual_mainRow')">Show All</a>

                                                              <a class="showHistory" onclick="showHistory('manual_table_row_{{$data->Missed_id}}', 'missTapEventTableLog', 'manual_mainRow')">View history</a> </td>
                                                        @else 
                                                            @if (in_array($data->Missed_id, $missedRecords)) 
                         
                                                                <td align="center"><small>Update by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                                  <a class="hideHistory"  style="display: none;" onclick="showAll('missTapEventTableLog', 'manual_mainRow')">Show All</a>
                                                                  <a class="showHistory"  onclick="showHistory('manual_table_row_{{$data->Missed_id}}', 'missTapEventTableLog', 'manual_mainRow')">View history</a> </td>
                                                           
                                                            @else
                                                                @php 
                                                                    array_push($missedRecords, $data->Missed_id);
                                                                @endphp
                                                                    <td align="center">
                                                                      <small>Created by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->modify_by}}</strong><br><small>on</small> <strong>{{$data->modify_on}}</strong><br />
                                                                      <a class="hideHistory"  style="display: none;" onclick="showAll('missTapEventTableLog', 'manual_mainRow')">Show All</a>
                                                                      <a class="showHistory"  onclick="showHistory('manual_table_row_{{$data->Missed_id}}', 'missTapEventTableLog', 'manual_mainRow')">View history</a> 
                                                                    </td>                                                            
                                                            
                                                            @endif                                       

                                                        @endif
                                                      

                                                        <td style="display: none;" >{{$data->usort}}</td>
                                                  </tr>
                                                  @endforeach
                
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
  @include('attendance.staff.modals.absentia_edit_modal')
<!-- End Edit Absenia_id-->

<!-- Leave Application Edit Functionality Modal-->
                         
<div class="modal fade" id="LeaveAppForEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 class="modal-title">Leave Application</h3>
            </div>
            <div class="modal-body" style="float:left;width:100%;">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i><font id="">Leave form</font>
                        </div>
                    </div>
                    <!-- portlet-title -->
                    <div class="headRightDetailsInner">
                        <table class="leave_staff_view">
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
                        <div class="form-body" id="Leave_main_containter">
                        </div>
                        <!-- form-body -->
                    </div>
                    <!-- portlet-body fixedHeightmodalPortlet-->
                </div>
            </div>
            <div class="modal-footer text-center" style="text-align:center;">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                <button onClick="edit_leave()" type="button" class="btn dark btn-outline active" data-dismiss=""> Update </button>
                <!--button type="button" class="btn green">Add Badge</button -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
                                            
<!-- End Leave Applicaiton Modal -->

<!-- Exceptional Edit Functionality Modal-->
<div class="modal fade" id="ExceptionalAdjustmentFormEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="float:left;width:100%;">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i><font id="">Adjustments</font>
                        </div>
                    </div>
                    <!-- portlet-title -->
                    <div class="headRightDetailsInner">
                        <table class="adjustment_staff_view">
                            <tbody>
                                <tr id="">
                                    <td class="" style="padding-right:10px;">
                                        <img class="user-pic rounded  absentia_staff_img tooltips" data-container="body" data-placement="top" data-original-title="12-045" src="assets/photos/hcm/150x150/staff/782.png" width="42">
                                    </td>
                                    <td class="staffView_StaffName">
                                        <a href="javascript:;" class="primary-link absentia_staff_name tooltips" data-container="body" data-placement="top" data-original-title="AHK" data-staffid="289" data-staffgtid="12-045"></a> - <small class="tooltips absentia_name_code" data-container="body" data-placement="top" data-original-title="a.hussain"></small><br><small class="shortHeight"><span class="tooltips absentia_bottom_line" data-container="body" data-placement="top" data-original-title="Manager, Operations"></span></small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- col-md-4 -->
                    </div>
                    <!-- headRightDetailsInner -->
                    <div class="portlet-body fixedHeightmodalPortlet">
                        <div class="form-body" id="Adjustment_Contents">
                        </div>
                        <!-- form-body -->
                    </div>
                    <!-- portlet-body fixedHeightmodalPortlet-->
                </div>
            </div>
            <div class="modal-footer text-center" style="text-align:center;">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                <button onClick="editAdjustment()" type="button" class="btn dark btn-outline active">Update</button>
                <!--button type="button" class="btn green">Add Badge</button -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Exceptional Modal -->
<!-- Edit Penalties -->
<div class="modal fade" id="UnAuthLeavePenEdit" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-body" style="float:left;width:100%;">
        <div class="portlet box blue-hoki">
           <div class="portlet-title">
             <div class="caption">
               <i class="fa fa-user"></i><font id="">Penalty</font>
             </div>
           </div>
           <div class="headRightDetailsInner">
             <table class="penalty_staff_view">
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
             <div class="form-body" id="Penalties_Contents">
              
             </div>
           </div>
        </div>
      </div>
      <div class="modal-footer text-center" style="text-align:center;">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
        <button onCLick="editPenalty()" type="button" class="btn dark btn-outline active" data-dismiss=""> Update </button>
      </div>
    </div>
  </div>
</div>
<!-- End Penalties -->
<!-- Edit Manual Attendance -->
<div class="modal fade" id="ManualAttendanceFormEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="float:left;width:100%;">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i><font id="">Manual</font>
                        </div>
                    </div>
                    <!-- portlet-title -->
                    <div class="headRightDetailsInner">
                        <table id="manual_staff_view">
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
                        <div class="form-body" id="Manual_Form_Entry">
                        </div>
                        <!-- form-body -->
                    </div>
                    <!-- portlet-body fixedHeightmodalPortlet-->
                </div>
            </div>
            <div class="modal-footer text-center" style="text-align:center;">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn dark btn-outline active" data-dismiss="" onClick="edit_manual()"> Update </button>
                <!--button type="button" class="btn green">Add Badge</button -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Manual Attendance modal -->

<script type="text/javascript">
    // setTimeout(function(){
    //   $(".form_part_b").inputmask("mask", {
    //     "mask": "9999-999"
    //   });
    // },500)
   
    $(".saveMultipleLeave").click(function() {

        var inputID = $('#saveMultipleLeaveForm').validate({
          rules:{
            leave_title:{ required: true  },
            leave_type:{ required: true },
            leave_to:{ required: true },
            leave_from:{ required: true },
            leave_comment:{ required: true  },
            leaveSelect : { required: true  }
            },

            messages:{
              leave_title:{ required: 'Title required' },
              leave_type:{ required: '' },
              leave_to:{ required: 'To date required' },
              leave_from:{ required: 'From date required' },
              leave_comment:{ required: 'Comment required' },
              leaveSelect : { required: '' }            
            }
          
        });

          inputID.form();

          if($('#saveMultipleLeaveForm').valid()){
              bootbox.dialog({
                message: "Are you sure you want to save multiple leave?",
                title: "Please Confirm.",
                buttons: {
                    confirm: {
                        label: "Yes! Save Leaves",
                        callback: function () {
                           var staff_ids = $('.leaveSelect').val();

                           for (var i = 0; i < staff_ids.length; i++) {

                               $("#multiple_limit").bootstrapSwitch();
                               var paid_compensation = $('#multiple_limit').bootstrapSwitch('state'); //returns true or false
                               if (paid_compensation == true) {
                                   paid_compensation = 1;
                               } else {
                                   paid_compensation = 0;
                               }

                               var staffID = staff_ids[i];

                               var leave_title = $('#multiple_leave_title').val();
                               var leave_type = $('.multiple_leave_type option:selected').val();
                               var leave_from = $('#multiple_leave_from').val();
                               var leave_to = $('#multiple_leave_to').val();
                               var leave_comment = $('#multiple_leave_comment').val();

                               var paid_compensation_display;
                               if (paid_compensation == 1) {
                                   paid_compensation_display = 'Yes';
                               } else {
                                   paid_compensation_display = 'No';
                               }


                               if (leave_type != '' && leave_title != '' && leave_from != '' && leave_to != '') {

                                   $.ajax({
                                       type: "POST",
                                       cache: true,
                                       url: "{{url('/masterLayout/staff/addLeave')}}",
                                       data: {
                                           "staff_id": staffID,
                                           "leave_title": leave_title,
                                           "leave_type": leave_type,
                                           "leave_from": leave_from,
                                           "leave_to": leave_to,
                                           "leave_comment": leave_comment,
                                           "paid_compensation": paid_compensation,
                                           "_token": "{{ csrf_token() }}"
                                       },
                                       success: function(result) {

                                         reloadLeavesTable();
                                         resetEntryForm();
                                         reloadLogsTable();
                                       }

                                   });
                               }
                           }
                           $('#ProcessEntry').modal('toggle'); 
                        }
                    },
                    cancel: {
                        label: "Cancel",
                        callback: function () {}
                    },

                }
              });         
          }
       
    });
   $(".saveMultipleAbsentia").click(function() {
    

        var inputID = $('#saveMultipleAbsentiaForm').validate({
          rules:{
            absentia_title:{ required: true  },
            absentia_date:{ required: true },
            absentia_startTime:{ required: true },
            absentia_endTime:{ required: true },
            absentia_description:{ required: true }
            },

            messages:{
              absentia_title:{ required: 'Title required' },
              absentia_date:{ required: 'Date required' },
              absentia_startTime:{ required: 'Start time required' },
              absentia_endTime:{ required: 'End time required' },
              absentia_description:{ required: 'Description required' }       
            }
          
        });

        inputID.form();

        if($('#saveMultipleAbsentiaForm').valid()){
            bootbox.dialog({
                message: "Are you sure you want to save multiple absentia?",
                title: "Please Confirm.",
                buttons: {
                    confirm: {
                        label: "Yes! Save Absentia",
                        callback: function () {
                            var staff_ids = $('.absentiaSelect').val();

                            for (var i = 0; i < staff_ids.length; i++) {


                                 var date = $("#multiple_absentia_date").val();
                                 var title = $("#multiple_absentia_title").val();
                                 var start_time = $("#multiple_absentia_startTime").val();
                                 var end_time = $("#multiple_absentia_endTime").val();
                                 var description = $("#multiple_absentia_description").val();
                                 var staffID = staff_ids[i];
                                 if (date !== '' && title !== '' && start_time !== '' && end_time !== '') {

                                     $.ajax({
                                         type: "POST",
                                         cache: true,
                                         url: "{{url('/masterLayout/staff/addAbsentia')}}",
                                         data: {
                                             "staff_id": staffID,
                                             "date": date,
                                             "title": title,
                                             "start_time": start_time,
                                             "end_time": end_time,
                                             "description": description,
                                             "_token": "{{ csrf_token() }}"
                                         },
                                         success: function(result) {

                                            reloadAbsentiaTable();
                                            resetEntryForm();
                                            reloadLogsTable();
                                         }
                                     });
                                 }
                            }

                            $('#ProcessEntry').modal('toggle');                       
                          }
                    },
                    cancel: {
                        label: "Cancel",
                        callback: function () {}
                    },

                }
            });
        }    
    
   });


   $(".saveMultiplePenalty").click(function() {


        var inputID = $('#saveMultiplePenaltyForm').validate({
          rules:{
            penalty_title:{ required: true  },
            penalty_day:{ required: true },
            penalty_from:{ required: true },
            penalty_to:{ required: true  },
            penalty_description : { required: true  }
            },
            messages:{
              penalty_title:{ required: 'Title required' },
              penalty_day:{ required: 'Day required' },
              penalty_from:{ required: 'From date required' },
              penalty_to:{ required: 'To date required' },
              penalty_description:{ required: 'Description required' }            
            }
          
          });

          inputID.form();

          if($('#saveMultiplePenaltyForm').valid()){
              bootbox.dialog({
                message: "Are you sure you want to save multiple penalty?",
                title: "Please Confirm.",
                buttons: {
                    confirm: {
                        label: "Yes! Save Penalty",
                        callback: function () {
                           var staff_ids = $('.selectPenalty').val();

                           for (var i = 0; i < staff_ids.length; i++) {

                               var penalty_title = $('#multiple_penalty_title').val();
                               var penalty_day = $('#multiple_penalty_day').val();
                               var penalty_from = $('#multiple_penalty_from').val();
                               var penalty_to = $('#multiple_penalty_to').val();
                               var penalty_description = $('#multiple_penalty_description').val();
                               var staff_id = staff_ids[i];
                               // console.log(penalty_to);

                               if (staff_id != '' && penalty_title != '' && penalty_from != '' && penalty_to != '' && penalty_day != '') {
                                   $.ajax({
                                       type: "POST",
                                       cache: true,
                                       url: "{{url('/masterLayout/addPenalty')}}",
                                       data: {
                                           "penalty_title": penalty_title,
                                           "penalty_day": penalty_day,
                                           "penalty_from": penalty_from,
                                           "penalty_to": penalty_to,
                                           "penalty_description": penalty_description,
                                           "staff_id": staff_id,
                                           "_token": "{{ csrf_token() }}"
                                       },
                                       success: function(e) {
                                          reloadUnauthorizedAdjustmentTable();
                                          resetEntryForm();
                                          reloadLogsTable();

                                       }
                                   });
                               }
                           }
                           $('#ProcessEntry').modal('toggle');                     
                          }
                    },
                    cancel: {
                        label: "Cancel",
                        callback: function () {}
                    },

                }
            });
          }
       
   });

   $(".saveMultipleAdjustment").click(function() {
      
        var inputID = $('#saveMultipleAdjustmentForm').validate({
          rules:{
            adjustment_title:{ required: true  },
            adjustment_no:{ required: true },
            adjustment_description:{ required: true }
            },

            messages:{
              adjustment_title:{ required: 'Title required' },
              adjustment_no:{ required: 'No of days required' },
              adjustment_description:{ required: 'Description required' }           
            }
          
        });
        inputID.form();

        if($('#saveMultipleAdjustmentForm').valid()){ 
            bootbox.dialog({
              message: "Are you sure you want to save multiple exceptional adjustments?",
              title: "Please Confirm.",
              buttons: {
                  confirm: {
                      label: "Yes! Save Adjustments",
                      callback: function () {

                          var staff_ids = $('.selectAdjustments').val();

                          for (var i = 0; i < staff_ids.length; i++) {
                               var adjustment_title = $('#multiple_adjustment_title').val();
                               var adjustment_no = $('#multiple_adjustment_no').val();
                               var adjustment_description = $('#multiple_adjustment_description').val();
                               var staff_id = staff_ids[i];
                               if (adjustment_title != '' && adjustment_no != '') {
                                   $.ajax({
                                       type: "POST",
                                       cache: true,
                                       data: {
                                           "adjustment_title": adjustment_title,
                                           "adjustment_no": adjustment_no,
                                           "adjustment_description": adjustment_description,
                                           "staff_id": staff_id,
                                           "_token": "{{csrf_token()}}"
                                       },
                                       url: "{{url('/masterLayout/addAdjustment')}}",
                                       success: function(e) {
                                          reloadExceptionAdjustmentTable();
                                          resetEntryForm();
                                          reloadLogsTable();
                                       }

                                   });
                               }
                          }
                          $('#ProcessEntry').modal('toggle');                    
                        }
                  },
                  cancel: {
                      label: "Cancel",
                      callback: function () {}
                  },

              }
            });
        }       
   });

   $(".saveMultipleManual").click(function() {


        var inputID = $('#saveMultipleManualForm').validate({
          rules:{
            manual_tap:{ required: true  },
            manual_description:{ required: true },
            manual_attendance:{ required: true }
            },

            messages:{
              manual_tap:{ required: 'Tap required' },
              manual_description:{ required: 'Description required' },
              manual_attendance:{ required: 'Attendance required' }           
            }
          
        });
        inputID.form();

        if($('#saveMultipleManualForm').valid()){ 
            bootbox.dialog({
              message: "Are you sure you want to save multiple missed tap?",
              title: "Please Confirm.",
              buttons: {
                  confirm: {
                      label: "Yes! Save Missed Tap",
                      callback: function () {

                         var staff_ids = $('.selectManual').val();

                         for (var i = 0; i < staff_ids.length; i++) {
                             var date = $("#multiple_manual_attendance").val();
                             var missTap = $("#multiple_manual_tap").val();

                             var description = $("#multiple_manual_description").val();
                             var staffID = staff_ids[i];

                             if (date != '' && missTap != '' && staffID != '') {
                                 $.ajax({
                                     type: "POST",
                                     cache: true,
                                     url: "{{url('/masterLayout/staff/addManual')}}",
                                     data: {
                                         "staff_id": staffID,
                                         "date": date,
                                         "missTap": missTap,
                                         "description": description,
                                         "_token": "{{ csrf_token() }}"
                                     },
                                     success: function(result) {

                                          reloadMisstapTable();
                                          resetEntryForm();
                                          reloadLogsTable();
                          
                                     }

                                 });
                             }
                         }
                         $('#ProcessEntry').modal('toggle');                    
                      }
                  },
                  cancel: {
                      label: "Cancel",
                      callback: function () {}
                  },

              }
            });  
        }     
  

   });
   var reloadMisstapTable = function reloadMisstapTable(){
      var missTapTable = $(".missTapEventTableView");

        $.ajax({
            type: "POST",
            url : "{{url('/masterLayout/staff/getMisstap')}}",
            data: {
            _token: "{{ csrf_token() }}"},
            dataType: "HTML",

            success: function(res){

                 reloadLogsTable();
                 missTapTable.html(res);

            },

            error:function(){}
        });
   } 
   var reloadExceptionAdjustmentTable = function reloadExceptionAdjustmentTable(){
      var adjustmentTable = $(".exceptionAdjustmentTableView");

        $.ajax({
            type: "POST",
            url : "{{url('/masterLayout/staff/getAdjustment')}}",
            data: {
            _token: "{{ csrf_token() }}"},
            dataType: "HTML",

            success: function(res){
                 
                 adjustmentTable.html(res);

            },

            error:function(){}
        });
   } 
   var reloadUnauthorizedAdjustmentTable = function reloadUnauthorizedAdjustmentTable(){
      var unauthorizedTable = $(".adjustmentTableUnauthorizedLeavesView");

        $.ajax({
            type: "POST",
            url : "{{url('/masterLayout/staff/getUnauthorized')}}",
            data: {
            _token: "{{ csrf_token() }}"},
            dataType: "HTML",

            success: function(res){
                 
                 unauthorizedTable.html(res);

            },

            error:function(){}
        });
   }  
   var reloadLeavesTable = function reloadLeavesTable(){
      var leavesTable = $(".adjustmentTableLeavesView");

        $.ajax({
            type: "POST",
            url : "{{url('/masterLayout/staff/getLeaves')}}",
            data: {
            _token: "{{ csrf_token() }}"},
            dataType: "HTML",

            success: function(res){
                 
                 leavesTable.html(res);
            },

            error:function(){}
        });
   }          
   var reloadAbsentiaTable = function reloadAbsentiaTable(){
    
      var absentiaTable = $(".adjustmentTableAbsentiaView");

        $.ajax({
            type: "POST",
            url : "{{url('/masterLayout/staff/getAbsentia')}}",
            data: {
            _token: "{{ csrf_token() }}"},
            dataType: "HTML",

            success: function(res){
                 absentiaTable.html(res);
                
            },

            error:function(){}
        });
   }
   var resetEntryForm = function resetEntryForm(){
      //Absentia Form Fields
      $("#multiple_absentia_date").val('');
      $("#multiple_absentia_title").val('');
      $("#multiple_absentia_startTime").val('');
      $("#multiple_absentia_endTime").val('');
      $("#multiple_absentia_description").val(''); 
      $(".absentiaSelect").val(null).trigger("change"); 

      //Leave Form Fields

      $('#multiple_leave_title').val('');
      $('.multiple_leave_type option').val('');
      $('#multiple_leave_from').val('');
      $('#multiple_leave_to').val('');
      $('#multiple_leave_comment').val('');
      $(".leaveSelect").val(null).trigger("change");

      //Adjustment Form Fields
      $('#multiple_adjustment_title').val('');
      $('#multiple_adjustment_no').val('');
      $('#multiple_adjustment_description').val(''); 
      $(".selectAdjustments").val(null).trigger("change");  

      //Penalty Form Fields
      $('#multiple_penalty_title').val('');
      $('#multiple_penalty_day').val('');
      $('#multiple_penalty_from').val('');
      $('#multiple_penalty_to').val('');
      $('#multiple_penalty_description').val(''); 
      $(".selectPenalty").val(null).trigger("change");

      //Manual Form Fields
      $("#multiple_manual_attendance").val('');
      $("#multiple_manual_tap").val('');
      $("#multiple_manual_description").val('');
      $(".selectManual").val(null).trigger("change");     
   }  
   var reloadLogsTable = function reloadLogsTable(){
      var logsTable = $(".logsTableView");

        $.ajax({
            type: "POST",
            url : "{{url('/masterLayout/staff/getLogs')}}",
            data: {
            _token: "{{ csrf_token() }}"},
            dataType: "HTML",

            success: function(res){
                 
                 logsTable.html(res);

            },

            error:function(){}
        });
   }       
var edit_manual = function (ID) {

    var date = $("#manual_attendance_edit").val();
    var missTap = $("#manual_missTap_edit").val();
    var description = $("#manual_description_edit").val();
    var Manual_id = $('#manual_id_edit').val();
    var Tap_id = $('#tap_id_edit').val();
    var Missed_id = $('#Missed_id_edit').val();
    var Table_name = $('#Table_name_edit').val();
    var form_number_a=$('#form_number_miss_tap_a').val();
    var form_number_b=$('#form_number_miss_tap_b').val();
    var form_number=form_number_a+form_number_b;


    bootbox.dialog({
        message: "Are you sure you want to edit this Missed Tap?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Edit Missed Tap",
                callback: function () {


                    if (date != '' && missTap != '' && Tap_id != '') {
                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: "{{url('/masterLayout/staff/OverRightAddManual')}}",
                            data: {
                                "Manual_id": Manual_id,
                                "Tap_id": Tap_id,
                                "Missed_id": Missed_id,
                                "Table_name": Table_name,
                                "date": date,
                                "missTap": missTap,
                                "description": description,
                                "form_number": form_number,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (result) {

                                $("#manual_description_"+Missed_id).text(description);
                                $("#manual_missTap_date_"+Missed_id).text(formatDate(new Date(date)));
                                $("#manual_time_"+Missed_id).text(format_time(missTap))
                                $('#misstap_modifiedOn_'+Missed_id).text(getModifiedDate())

                                $("#manual_attendance_edit").val('');
                                $("#manual_missTap_edit").val('');
                                $("#manual_description_edit").val('');
                                $('#ManualAttendanceFormEdit').modal('toggle');
                                reloadLogsTable();
                            }

                        });
                    }


                }
            },
            cancel: {
                label: "Cancel",
                callback: function () {}
            },

        }
    });
}  
var editAddManual = function(ID,Missed_id,Table_name){
    $.ajax({
       type:"POST",
       cache:true,
       url:"{{url('/masterLayout/staff/editAddManual')}}",
       data:{
       "ID":ID,
       "Missed_id":Missed_id,
       "Table_name":Table_name,
       "_token": "{{ csrf_token() }}"
       },
       success:function(res){
       $("#Manual_Form_Entry").html('');
       $("#Manual_Form_Entry").html(res);
       $("#manual_staff_view").html($('#manual_staff_view_'+Missed_id).html())
       $("#ManualAttendanceFormEdit").modal('toggle');
       }
    });
}  
var editPenalty = function () {

    var penalty_title = $('#penalty_title_edit').val();
    var penalty_day = $('#penalty_day_edit').val();
    var penalty_from = $('#penalty_from_edit').val();
    var penalty_to = $('#penalty_to_edit').val();
    var penalty_description = $('#penalty_description_edit').val();

    var penalty_id_edit = $('#penalty_id_edit').val();
    var Staff_id = $('#staff_id_edit').val();
    var form_number_a=$('#form_number_penalty_a').val();
    var form_number_b=$('#form_number_penalty_b').val();
    var form_number=form_number_a+form_number_b;

    // console.log(penalty_to);

    bootbox.dialog({
        message: "Are you sure you want to edit this Penalty?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Edit Penalty",
                callback: function () {


                    if (penalty_id_edit != '' && penalty_title != '' && penalty_from != '' && penalty_to != '' && penalty_day != '') {
                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: "{{url('/masterLayout/staff/OverRightPenalties')}}",
                            data: {
                                "penalty_id_edit": penalty_id_edit,
                                "form_number": form_number,
                                "Staff_id": Staff_id,
                                "penalty_title": penalty_title,
                                "penalty_day": penalty_day,
                                "penalty_from": penalty_from,
                                "penalty_to": penalty_to,
                                "penalty_description": penalty_description,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (e) {
                              
                                $('#penalty_title_'+penalty_id_edit).text(penalty_title)
                                $('#penalty_from_'+penalty_id_edit).text(penalty_from)
                                $('#penalty_to_'+penalty_id_edit).text(penalty_to)
                                $('#penalty_description_'+penalty_id_edit).text(penalty_description)
                                $('#penalty_modifiedOn_'+penalty_id_edit).text(getModifiedDate())

                                $('#penalty_title_edit').val('');
                                $('#penalty_day_edit').val('');
                                $('#penalty_from_edit').val('');
                                $('#penalty_to_edit').val('');
                                $('#penalty_description_edit').val('');
                                $("#UnAuthLeavePenEdit").modal('toggle');
                                reloadLogsTable();
                            }
                        });
                    }


                }
            },
            cancel: {
                label: "Cancel",
                callback: function () {}
            },

        }
    });
}  
var ReWriteLeavePenalties = function(ID){
    $.ajax({
       type:"POST",
       cache:true,
       url:"{{url('/masterLayout/staff/editPenalties')}}",
       data:{
       "ID":ID,
       "_token": "{{ csrf_token() }}"
       },
       success:function(res){
       $("#Penalties_Contents").html(res);
       $(".penalty_staff_view").html($('.penalty_staff_view_'+ID).html())
       $("#UnAuthLeavePenEdit").modal('toggle');
       }
    });
}  
var editAdjustment = function () {

    var adjustment_title = $('#adjustment_title_edit').val();
    var adjustment_no = $('#adjustment_no_edit').val();
    var adjustment_description = $('#adjustment_description_edit').val();

    var adjustment_id = $('#adjustment_id_edit').val();
    var staff_id = $('#adjustment_staff_edit').val();
    var form_number_a=$('#form_number_exceptional_adjustment_a').val();
    var form_number_b=$('#form_number_exceptional_adjustment_b').val();

    var form_number=form_number_a+form_number_b;

    bootbox.dialog({
        message: "Are you sure you want to edit this Adjustment?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Edit Adjustment",
                callback: function () {

                    if (adjustment_title != '' && adjustment_no != '') {
                        $.ajax({
                            type: "POST",
                            cache: true,
                            data: {
                                "form_number": form_number,
                                "adjustment_title": adjustment_title,
                                "adjustment_no": adjustment_no,
                                "adjustment_description": adjustment_description,
                                "staff_id": staff_id,
                                "adjustment_id": adjustment_id,
                                "_token": "{{csrf_token()}}"
                            },
                            url: "{{url('/masterLayout/staff/OverRightAdjustment')}}",
                            success: function (e) {

                                $('#adjustment_staff_title_'+adjustment_id).text(adjustment_title)
                                $('#adjustment_staff_description_'+adjustment_id).text(adjustment_description)
                                $('#adjustment_staff_day_'+adjustment_id).text(adjustment_no)
                                $('#adjustment_modifiedOn_'+adjustment_id).text(getModifiedDate())


                                $('#adjustment_title_edit').val('');
                                $('#adjustment_no_edit').val('');
                                $('#adjustment_description_edit').val('');
                                $('#adjustment_id_edit').val('');
                                $('#adjustment_staff_edit').val('');
                                $('#ExceptionalAdjustmentFormEdit').modal('toggle');
                                reloadLogsTable();
                            }
                        });
                    }


                }
            },
            cancel: {
                label: "Cancel",
                callback: function () {}
            },

        }
    });
}   
var ReWriteAdjustment = function(ID){
    $.ajax({
       type:"POST",
       cache:true,
       url:"{{url('/masterLayout/staff/editAdjustment')}}",
       data:{
       "ID":ID,
       "_token": "{{ csrf_token() }}"
       },
       success:function(res){
       // var data = jQuery.parseJSON(res);
       $('.adjustment_staff_view').html($('.adjustment_staff_'+ID).html())
       $("#Adjustment_Contents").html('');
       $("#Adjustment_Contents").html(res);
       $("#ExceptionalAdjustmentFormEdit").modal('toggle');
       }
    });
}  
var edit_leave = function () {


    $("#limit_edit").bootstrapSwitch();
    var paid_compensation = $('#limit_edit').bootstrapSwitch('state'); //returns true or false
    if (paid_compensation == true) {
        paid_compensation = 1;
    } else {
        paid_compensation = 0;
    }

    var Leave_Application_id = $('#Leave_Application_id').val();

    var staffID = $('#tab_1_3').data('staffID');
    var leave_title = $('#leave_title_edit').val();
    var leave_type = $('#Select_Leave_Type_edit option:selected').val();
    var leave_from = $('#leave_from_edit').val();
    var leave_to = $('#leave_to_edit').val();
    var leave_comment = $('#leave_comment_edit').val();


    var paid_compensation_percentage = $('#paid_percentage_edit').val();
    var leave_approve_status_edit = $('#leave_approve_status_edit').val();
    var approve_from = $('#leave_approve_date_from_edit').val();
    var approve_to = $('#leave_approve_date_to_edit').val();

    var form_number_a=$('#form_number_leave_application_a').val();
    var form_number_b=$('#form_number_leave_application_b').val();

    var form_number=form_number_a+form_number_b;


    var paid_compensation_display;
    if (paid_compensation == 1) {
        paid_compensation_display = 'Yes';
    } else {
        paid_compensation_display = 'No';
    }


    bootbox.dialog({
        message: "Are you sure you want to edit this Leaves?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Edit Leaves",
                callback: function () {


                    if (leave_type != '' && leave_title != '' && leave_from != '' && leave_to != '') {

                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: "{{url('/masterLayout/staff/RWriteLeave')}}",
                            data: {
                                "staff_id": staffID,
                                "Leave_Application_id": Leave_Application_id,
                                "leave_title": leave_title,
                                "leave_type": leave_type,
                                "leave_from": leave_from,
                                "leave_to": leave_to,
                                "leave_comment": leave_comment,
                                "paid_compensation": paid_compensation,
                                "form_number": form_number,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (result) {
                                var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                var d = new Date(leave_from);
                                leave_from = days[d.getDay()] + ", " + formatDate(new Date(leave_from));
                                var d = new Date(leave_to);
                                leave_to = days[d.getDay()] + ", " + formatDate(new Date(leave_to));

                                $('#leave_title_'+Leave_Application_id).text(leave_title)
                                $('#leave_startDate_'+Leave_Application_id).text(leave_from)
                                $('#leave_endDate_'+Leave_Application_id).text(leave_to)
                                $('#leave_description_'+Leave_Application_id).text(leave_comment)
                                $('#leave_compensation_'+Leave_Application_id).text((paid_compensation == 1) ? 'NO' : 'YES' )
                                $('#leave_modifiedOn_'+Leave_Application_id).text(getModifiedDate()) 
                                
                                $('#leave_table > tbody tr').each(function (index) {
                                    var $this = $(this);
                                    var filter = $this.attr('data-id');
                                    var id = Leave_Application_id;
                                    if (filter == id) {
                                        var leaveHTML = '';

                                        leaveHTML = leaveHTML + '<tr  class="approvedBorder" data-id=' + id + '><td>' + leave_title + '</small></td><td class=""><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested Compensation"></i>   ' + paid_compensation_display + ' </td></tr>';
                                        if (leave_approve_status_edit == 1) {
                                            leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved Compensation"></i>   ' + paid_compensation_percentage + '<span>% paid</span></td></tr>';
                                        }

                                        leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested From"></i>  ' + formatDate(leave_from) + '</td></tr>';

                                        if (leave_approve_status_edit == 1) {
                                            leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved From"></i>   ' + formatDate(approve_from) + ' </td></tr>';
                                        }

                                        leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested till"></i>   ' + formatDate(leave_to) + '</td></tr>';

                                        if (leave_approve_status_edit == 1) {
                                            leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved till"></i>  ' + formatDate(approve_to) + ' </td> </tr>';
                                        }

                                        //leaveHTML = leaveHTML + '</table></td><td>'+leave_comment+'</td><td class="text-center"><a href="#" data-container="body" data-placement="bottom" data-original-title="Print Leave Application" class="tooltips" ><span aria-hidden="true" class="icon-printer"></span></a> | <a href="#LeaveApproval" data-toggle="modal" data-container="body" data-placement="bottom" data-original-title="Leave Approval" class="tooltips" onClick="updateLeave('+id+')" ><i class="fa fa-check"></i></a></td></tr>';

                                        leaveHTML = leaveHTML + '</table></td><td>' + leave_comment + '</td><td class="text-center"><a onClick="ReWriteLeave(' + id + ')"><i class="fa fa-edit"></i></a> | <a href="#" data-container="body" data-placement="bottom" data-original-title="Print Leave Application" class="tooltips" ><span aria-hidden="true" class="icon-printer"></span></a> | <a href="#LeaveApproval" data-toggle="modal" data-container="body" data-placement="bottom" data-original-title="Leave Approval" class="tooltips" onClick="updateLeave(' + id + ')" ><i class="fa fa-check"></i></a> | <a onClick="delectLeave(' + id + ')"><i class="fa fa-close"></i></a></td></tr>';
                                        $(this).replaceWith(leaveHTML);
                                    }

                                });
                                $('#LeaveAppForEdit').modal('toggle');

                            }

                        });
                    }


                }
            },
            cancel: {
                label: "Cancel",
                callback: function () {}
            },

        }
    });
}  
var ReWriteLeave = function(id){
     var update_id =  id;
     $.ajax({
         type:"POST",
         url:"{{url('/masterLayout/staff/ReWriteLeave')}}",
         data:{
            "id":id,
            "_token": "{{ csrf_token() }}"
         },
         success:function(e){

          var data = JSON.parse(e);
         $('.leave_staff_view').html($('.leave_staff_'+id).html())
         $("#Leave_main_containter").html( data.LT );
         $('#LeaveAppForEdit').modal('toggle');
         
         var paid_percentage_edit = $("#paid_compensation_edit").val();
         
         $("#limit_edit").bootstrapSwitch();
         
         if( paid_percentage_edit == 1){ 
            $("#limit_edit").bootstrapSwitch('state', true);
         }else{
            $("#limit_edit").bootstrapSwitch('state', false);
         }  
         
         
          



         }

     });
}
var Edit_Absentia = function(Absentia_id, Staff_id ){
    $(".absentia_staff_view").html($(".absentia_staff_"+Staff_id).html())
    $("#Edit_Absentia_id_hidden").val(Absentia_id);
    $("#Edit_Absentia_id_staff_id_hidden").val(Staff_id);
        if( Staff_id > 0 ){
            $.ajax({
               type:"POST",
               cache:true,
               url:"{{url('/masterLayout/staff/Edit_Get_Absentia')}}",
               data:{
                "staff_id":Staff_id,
                "Absentia_id":Absentia_id,
                "_token": "{{ csrf_token() }}"
               },
               success:function(result){
              // var data = jQuery.parseJSON(result);
              $('#Absenia_Contents').html(result);
              $('#AddAIAE').modal('toggle');
                    $(".form_part_b").inputmask("mask", {
        "mask": "9999-999"
      });
               }
            });
        }
}  
function format_time(time) {
  // formats a javascript Date object into a 12h AM/PM time string
  time = time.split(":");
  var hour = time[0];
  var minute =  time[1];
  var amPM = (hour > 11) ? "PM" : "AM";
  if(hour > 12) {
    hour -= 12;
  } else if(hour == 0) {
    hour = "12";
  }

  return hour + ":" + minute + " "+ amPM;
}   
var addAbsentiaE = function addAbsentiaE() {

    var Attendance_in_id = $("#Attendance_in_id").val();
    var Attendance_out_id = $("#Attendance_out_id").val();
    var Attendance_des_id = $("#Attendance_des_id").val();
    var Edit_Absentia_id_hidden = $("#Edit_Absentia_id_hidden").val();
    var Edit_Absentia_id_staff_id_hidden = $("#Edit_Absentia_id_staff_id_hidden").val();
    var date = $("#absentia_date_edit").val();
    var titles = $("#absentia_title_edit").val();
    var start_time = $("#absentia_startTime_edit").val();
    var end_time = $("#absentia_endTime_edit").val();
    var description = $("#absentia_description_edit").val();
    var staffID = Edit_Absentia_id_staff_id_hidden;
    var form_number_a=$('#form_number_absentia_a').val();
    var form_number_b=$('#form_number_absentia_b').val();
    var form_number=form_number_a+form_number_b;

    bootbox.dialog({
        message: "Are you sure you want to change this Absentia?",
        title: "Please Confirm.",
        buttons: {
            confirm: {
                label: "Yes! Change Absentia",
                callback: function() {
                    if (Attendance_in_id !== '' && Attendance_out_id !== '' && Attendance_des_id !== '' && end_time !== '') {
                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: "{{url('/masterLayout/staff/editAbsentia')}}",
                            data: {
                                "staff_id": staffID,
                                "form_number": form_number,
                                "date": date,
                                "title": titles,
                                "start_time": start_time,
                                "end_time": end_time,
                                "description": description,
                                "Attendance_in_id": Attendance_in_id,
                                "Attendance_out_id": Attendance_out_id,
                                "Attendance_des_id": Attendance_des_id,
                                "Edit_Absentia_id_hidden": Edit_Absentia_id_hidden,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(result) {


                                    $('#absentia_title_'+Edit_Absentia_id_hidden).text(titles);
                                    $('#absentia_aiaStamp_'+Edit_Absentia_id_hidden).text( formatDate(new Date(date)));
                                    $('#absentia_aiaStart_time_'+Edit_Absentia_id_hidden).text(format_time(start_time));
                                    $('#absentia_aiaEnd_time_'+Edit_Absentia_id_hidden).text(format_time(end_time));
                                    $('#absentia_description_'+Edit_Absentia_id_hidden).text(description); 
                                    $('#absentia_modifiedOn_'+Edit_Absentia_id_hidden).text(getModifiedDate());                                        

                      
                                
                                $('#AddAIAE').modal('toggle');
                                $("#absentia_date_edit").val('');
                                $("#absentia_title_edit").val('');
                                $("#absentia_startTime_edit").val('');
                                $("#absentia_endTime_edit").val('');
                                $("#absentia_description_edit").val('');
                                reloadLogsTable();
                            }
                        });
                    }

                } // Call Back
            }, //end Confirm
            cancel: {
                label: "Cancel",
                callback: function() {}
            },

        }
    });
}
var getModifiedDate = function getModifiedDate(){
    var d = new Date();
    var weekday = new Array(7);
        weekday[0] =  "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
    
    var month = new Array();
        month[0] = "Jan";
        month[1] = "Feb";
        month[2] = "Mar";
        month[3] = "Apr";
        month[4] = "May";
        month[5] = "Jun";
        month[6] = "Jul";
        month[7] = "Aug";
        month[8] = "Sep";
        month[9] = "Oct";
        month[10] = "Nov";
        month[11] = "Dec";

    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    seconds = seconds < 10 ? '0'+seconds : seconds;
    var currentTime = hours + ':' + minutes + ":"+seconds+ ' ' + ampm;

    var dayName = weekday[d.getDay()];
    var daynth = nth( d.getDate() );
    var dayNumber =  d.getDate()
    var monthName = month[d.getMonth()];  
    var year = d.getFullYear(); 


    return (dayName + ', ' + dayNumber+daynth + ' '+ monthName+ ' '+year + ' at '+ currentTime);


}

var nth = function nth(n){
  return["st","nd","rd"][((n+90)%100-10)%10-1]||"th"
}

var deleteAddManual = function(Action_id, Missed_id, Table_name) {

   
    bootbox.dialog({
            message: "Are you sure you want to delete this Missed Tap?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Remove Missed Tap",
                callback: function() { 
        
        
        
   if( Action_id > 0){
      $.ajax({
         type:"POST",
         cache:true,
         url:"{{url('/masterLayout/staff/deleteAddManual')}}",
         data:{ 
            "Action_id":Action_id, 
            "Missed_id":Missed_id, 
            "Table_name":Table_name, 
            "_token": "{{ csrf_token() }}" 
            },
         success:function(result){
          
          var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
          var deleted_on = formatDate(new Date());  
          $('#deleted_manual_'+Missed_id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')                
          $("#manual_table_row_"+Missed_id).addClass('deleted'); 
          reloadLogsTable();

         }
      });
   }
   
  }
                },
    cancel: {
                label: "Cancel",
                callback: function() { }
              },
              
            }
        });

    
}

var deleteAdjustment = function(Action_id) {

  if( Action_id > 0){
    $.ajax({
      type:"POST",
      cache:true,
      url:"{{url('/masterLayout/staff/deleteAdjustment')}}",
      data:{ "Action_id":Action_id, "_token": "{{ csrf_token() }}" },
      success:function(result){
          var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
          var deleted_on = formatDate(new Date());  
          $('#deleted_adjustment_'+Action_id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')                
          
          $("#exception_table_row_"+Action_id).addClass('deleted'); 
          reloadLogsTable();
       }
    });
  }
}  
var delete_Absentia = function(Absentia_id, Staff_id ){
   
   
      bootbox.dialog({
            message: "Are you sure you want to delete this Absentia?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Remove Absentia",
                callback: function() { 
     
                 if( Absentia_id > 0){
                  $.ajax({
                    type:"POST",
                    cache:true,
                    url:"{{url('/masterLayout/staff/deleteAbsentia')}}",
                    data:{ "Absentia_id":Absentia_id, "Staff_id":Staff_id, "_token": "{{ csrf_token() }}" },
                    success:function(result){ 
                      
                      var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
                      var deleted_on = formatDate(new Date());  
                      $('#deleted_absentia_'+Absentia_id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')                
                      
                      $("#absentia_table_row_"+Absentia_id).addClass('deleted'); 
                      reloadLogsTable();
                    }
                  });
          }
        }
              },
        cancel: {
                label: "Cancel",
                callback: function() { }
              },
              
            }
        });
    
    
}  
var delectLeave = function(Action_id) {
     
      
    
     bootbox.dialog({
            message: "Are you sure you want to delete this Leave?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Remove Leave",
                callback: function() { 
        
        
          if( Action_id > 0){
            
           $.ajax({
            type:"POST",
            cache:true,
            url:"{{url('/masterLayout/staff/deleteLeaveApp')}}",
            data:{ "Action_id":Action_id, "_token": "{{ csrf_token() }}" },
            success:function(result){ 
            
            
             $('#adjustmentTableLeaves > tbody tr').each(function(index) {
              var $this = $(this);
              var filter = $this.attr('data-id');
              var id = Action_id;
              if(filter == id){ $this.addClass('deleted');
                var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
                var deleted_on = formatDate(new Date());  
                $('#deleted_'+id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')
                reloadLogsTable();
               }
            });
            
            }
           });
          }
         }
                },
    cancel: {
                label: "Cancel",
                callback: function() { }
              },
              
            }
        });
      
      
   }
var deleteLeavePenalties = function(Action_id){
  
$('#penaltyTable > tbody tr').each(function(index) {
  var $this = $(this);
  var filter = $this.attr('data-id');
  var id = Action_id;
  if(filter == id){ $this.remove(); }
});
if( Action_id > 0){
  $.ajax({
    type:"POST",
    cache:true,
    url:"{{url('/masterLayout/staff/deletePenalties')}}",
    data:{ "Action_id":Action_id, "_token": "{{ csrf_token() }}" },
    success:function(result){


      var name_code = "<?php  echo $userInfo[0]->name_code; ?>";
      var deleted_on = formatDate(new Date());  
      $('#deleted_penalty_'+Action_id).html('<small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="'+name_code+'">'+name_code+' </strong><br><small>on</small> <strong>'+deleted_on+'</strong>')                
      
      $("#penalty_table_row_"+Action_id).addClass('deleted'); 
      reloadLogsTable();
     }
  });
}

}   
function formatDate(date) {
  var monthNames = [
    "Jan", "Feb", "Mar",
    "Apr", "May", "Jun", "Jul",
    "Aug", "Sep", "Oct",
    "Nov", "Dec"
  ];

  var day = date.getDate();
  var monthIndex = date.getMonth();
  var year = date.getFullYear();

  return day + ' ' + monthNames[monthIndex] + ' ' + year;
}   

function showAll(tableId, rowName){

    var table = $('#'+tableId).DataTable();
    $.fn.dataTable.ext.search.pop();
    table.draw();    
    $('.hideHistory').hide()

    $('.showHistory').show()    
}
function showHistory(name, tableId, rowName){

 
    var table = $('#'+tableId).DataTable();
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
          return $(table.row(dataIndex).node()).attr('data-history') == name;
      });
     table.draw();

    $('.hideHistory').show()

    $('.showHistory').hide()
    
}


  
loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){ 
                  loadScript("{{ URL::to('metronic') }}/global/plugins/bootbox/bootbox.min.js", function(){ 
                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
								loadScript("{{ URL::to('metronic') }}/global/plugins/select2/js/select2.full.min.js", function(){
                                	loadScript("{{ URL::to('metronic') }}/pages/scripts/components-select2.min.js", function(){
                                		loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
											loadScript("{{ URL::to('metronic') }}/pages/scripts/datatable-expand.js", function(){
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
});

</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
