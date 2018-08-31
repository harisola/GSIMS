<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ URL::to('metronic') }}/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<link href="{{ URL::to('/css/staffLayout.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Profile</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<style>
.page-content {
    background: #eef1f5 !important;
}
</style>
<!-- BEGIN PAGE TITLE-->

<h1 class="page-title"> User Profile
</h1>




<!-- BEGIN USE PROFILE -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?php echo $user['photo500']; ?>" class="img-responsive" alt=""> </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> <?php echo $user['info'][0]->abridged_name; ?> </div>
                    <div class="profile-usertitle-job"> <?php echo $user['info'][0]->c_topline; ?> </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#user_profile">
                                <i class="icon-settings"></i> Perosnal Information </a>
                        </li>
                        <li>
                            <a href="#user_profile">
                                <i class="icon-info"></i> Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light fixed-height">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1-1" data-toggle="tab">Personal Info</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab"> Attendance </a>
                                </li>
                                <li>
                                    <a href="#tab_1_2-2" data-toggle="tab">Change Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1-1">
                                	<h3 class="form-section marginTop0 headingBorderBottom">Person Info</h3>
                                	<table width="100%" border="0" class="table-striped table greyBorder">
                                    	<tbody>
                                            <tr>
                                                <td class="col-md-6"><span class="labelHere">Full Name:</span> <strong><?php echo $user['info'][0]->name; ?></strong></td>
                                                <td class="col-md-6"><span class="labelHere">CNIC:</span> <strong><?php echo $user['info'][0]->nic; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td><span class="labelHere">Name Code:</span> <strong><?php echo $user['info'][0]->name_code; ?></strong></td>
                                                <td><span class="labelHere">Gender:</span> <strong><?php echo $user['info'][0]->staff_gender; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td><span class="labelHere">DOB<small> (as per NIC)</small>:</span> <strong><?php echo $user['info'][0]->dob; ?></strong></td>
                                                <td><span class="labelHere">Status:</span> <strong><?php echo $user['info'][0]->status_code; ?></strong></td>
                                            </tr>
                                   		</tbody>
                                    </table>
                                    <h3 class="form-section marginTop0 headingBorderBottom">Contact Info</h3>
                                	<table width="100%" border="0" class="table-striped table greyBorder">
                                    	<tbody>
                                            <tr>
                                                <td class="col-md-6"><span class="labelHere">Mobile number:</span> <strong><?php echo $user['info'][0]->mobile_phone; ?></strong></td>
                                                <td class="col-md-6"><span class="labelHere">Landline Number:</span> <strong><?php echo $user['info'][0]->land_line; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td><span class="labelHere">Email:</span> <strong><?php echo $user['info'][0]->full_email; ?></strong></td>
                                                <td></td>
                                            </tr>
                                   		</tbody>
                                    </table>
                                    <h3 class="form-section marginTop0 headingBorderBottom">Address Info</h3>
                                	<table width="100%" border="0" class="table-striped table greyBorder">
                                    	<tbody>
                                            <tr>
                                                <td class="col-md-6"><span class="labelHere">Apartment No:</span> <strong><?php echo $user['info'][0]->apartment_no; ?></strong></td>
                                                <td class="col-md-6"><span class="labelHere">Street Name:</span> <strong><?php echo $user['info'][0]->street_name; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td><span class="labelHere">Building Name:</span> <strong><?php echo $user['info'][0]->building_name; ?></strong></td>
                                                <td><span class="labelHere">Plot No:</span> <strong><?php echo $user['info'][0]->plot_no; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td><span class="labelHere">Region:</span> <strong><?php echo $user['info'][0]->region; ?></strong></td>
                                                <td><span class="labelHere">Sub Region:</span> <strong><?php echo $user['info'][0]->sub_region; ?></strong></td>
                                            </tr>
                                   		</tbody>
                                    </table>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2-2">
                                    <div id="alert_password_success" class="custom-alerts alert alert-success fade in" style="display: none;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Your password has been changed successfully.</div>
                                    <div id="alert_password_error" class="custom-alerts alert alert-danger fade in" style="display: none;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>You are using the old password for your new password. Please change the password again.</div>
                                    <form action="#">
                                        <div class="form-group">
                                            <label class="control-label">Current Password</label>
                                            <input id="current_password" type="password" class="form-control" /> </div>
                                        <div class="form-group col-md-6 paddingLeft0">
                                            <label class="control-label">New Password</label>
                                            <input id="new_password" type="password" class="form-control" /> </div>
                                        <div class="form-group col-md-6 paddingRight0">
                                            <label class="control-label">Re-type New Password</label>
                                            <input id="new_cpassword" type="password" class="form-control" /> </div>
                                        <div class="margin-top-10 text-center">
                                            <a id="btn_change_password" href="javascript:;" class="btn green"> Change Password </a>
                                            <a id="btn_password_clear" href="javascript:;" class="btn default"> Clear </a>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- Attendance Module -->
                                <div class="tab-pane fade" id="tab_1_3">
                                    <div class="tabbable-line">
                                         <ul class="nav nav-tabs" id="">
                                            <?php /* 
                                            <li class="active">
                                               <a href="#tab_1_3_1" data-toggle="tab"> Policy </a>
                                            </li> */?>
                                            <li class="active">
                                               <a href="#tab_1_3_3" data-toggle="tab"> Attendance Breakdown </a>
                                            </li>
                                            <li>
                                               <a href="#tab_1_3_2" data-toggle="tab"> Absentia </a>
                                            </li>
                                            
                                            <li>
                                               <a href="#tab_1_3_4" data-toggle="tab"> Leave Applications </a>
                                            </li>
                                            <li>
                                               <a href="#tab_1_3_5" data-toggle="tab"> Exceptional Adjustments </a>
                                            </li>
                                            <li>
                                               <a href="#tab_1_3_6" data-toggle="tab"> Missed Tap Event </a>
                                            </li>
                                         </ul>
                                         <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab_1_3_3">
                                              <div class="portlet-body">
                                                    <div class="row">
                                                    <div id="datepaginator"> </div>
                                                        <div class="col-md-12">
                                                        
                                                           <!-- BEGIN PORTLET-->
                                                           <div class="portlet light form-fit bordered">
                                                              <div class="portlet-title">
                                                                 <div class="caption">
                                                                    <i class="icon-settings font-dark"></i>
                                                                    <span class="caption-subject font-dark sbold uppercase date_label">Attendance for <?php echo date('D F,d Y') ?></span>
                                                                 </div>
                                                              </div><!-- portlet-title -->
                                                              <div class="portlet-body form">
                                                                 <div class="opardiv"></div>
                                                                 <form role="form" class="form-horizontal form-bordered">
                                                                    <div class="form-body">
                                                                       <div class="form-group">
                                                                          <div class="col-md-3">
                                                                             Expected Time
                                                                          </div>
                                                                          <div class="col-md-9" style="height: 84px;">
                                                                             <!-- <input id="range_3" type="text" value="" /> -->
                                                                             <div id="weeklySlider"></div>
                                                                          </div>
                                                                       </div>
                                                                       <!-- form-group -->
                                                                       <div class="form-group">
                                                                          <div class="col-md-3">
                                                                             Tap IN/OUT Attendance
                                                                          </div>
                                                                          <div class="col-md-9">
                                                                             <div id="tapSlider"></div>
                                                                             <!-- <input id="range_3_1" type="text" value="" /> -->
                                                                          </div>
                                                                       </div>
                                                                       <!-- form-group -->
                                                                       <div class="form-group">
                                                                          <div class="col-md-3">
                                                                             Absentia Attendance
                                                                          </div>
                                                                          <div class="col-md-9">
                                                                             <!-- <input id="range_3_2" type="text" value="" /> -->
                                                                             <div id="AiAabsentia"></div>
                                                                          </div>
                                                                       </div>
                                                                       <!-- form-group -->
                                                                       <div class="form-group">
                                                                          <div class="col-md-3">
                                                                             Buffer Time Utilization
                                                                          </div>
                                                                          <div class="col-md-9">
                                                                             <!-- <input id="range_3_3" type="text" value="" /> -->
                                                                             <div id="bufferTime"></div>
                                                                          </div>
                                                                       </div>
                                                                       <!-- form-group -->
                                                                       <div class="form-group">
                                                                          <div class="col-md-3">
                                                                             Payroll Attendance
                                                                          </div>
                                                                          <div class="col-md-9">
                                                                             <!-- <input id="range_3_4" type="text" value="" /> -->
                                                                             <div id="PayrollAttendance"></div>
                                                                          </div>
                                                                       </div>
                                                                       <!-- form-group -->
                                                                       <div class="form-group">
                                                                          <div class="col-md-3">
                                                                             Complaince
                                                                          </div>
                                                                          <div class="col-md-9">
                                                                             <div class="col-md-2 text-center">
                                                                                <img src="img/complaint.png" width="24" class="compliance_one_img" /><br /><small>In Compliance</small>
                                                                             </div>
                                                                             <div class="col-md-8 text-center">
                                                                                <img src="img/noncomplaint.png" width="24" class="compliance_duration_img" /><br /><small>Duration Compliance</small>
                                                                             </div>
                                                                             <div class="col-md-2 text-center">
                                                                                <img src="img/complaint.png" width="24" class="compliance_two_img"  /><br /><small>Out Compliance</small>
                                                                             </div>
                                                                          </div>
                                                                       </div>
                                                                    </div>
                                                                    <!-- form-body -->
                                                                 </form>
                                                                 <!-- form-horizontal -->
                                                                 <div style="padding:10px 20px;">
                                                                 <h4 class="text-center">Compensation & Proportion details</h4>
                                                                 <table class="table table-striped table-hover table-bordered">
                                                                    <thead style="background: #efefef;">
                                                                       <tr>
                                                                           <!--  <th width="25%" class="text-center">Attendance Complaince<br />Proportion</th> -->
                                                                            <th width="33%" class="text-center">Non Compliant<br />Adjustment Factor</th>
                                                                            <th width="33%" class="text-center">Attendance Compensation<br />Proportion</th>
                                                                            <th width="34%" class="text-center">Attendance Deduction<br />Proportion</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                       <tr>
                                                                          <!-- <td class="text-center">0.89</td> -->
                                                                            <td class="text-center">0.8</td>
                                                                            <td class="text-center factor_remaining_deduction"></td>
                                                                            <td class="text-center factor_deduction_from"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                 </table>
                                                                 
                                                                 <h4 class="text-center">Leaves status & Buffer details</h4>
                                                                 <table class="table table-striped table-hover table-bordered">
                                                                    <thead style="background: #efefef;">
                                                                       <tr>
                                                                            <th width="25%" class="text-center">Previous EL<br />Balance</th>
                                                                            <th width="25%" class="text-center">Current EL<br />Balance</th>
                                                                            <th width="25%" class="text-center">Daily Buffer Used<br /><small class="daily_buffer_assign"></small></th>
                                                                            <th width="25%" class="text-center">Remaining Buffer<br /><small class="monthly_buffer_assign"></small></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                       <tr>
                                                                          <td class="text-center previous_el_balance"></td>
                                                                            <td class="text-center current_el_balance"></td>
                                                                            <td class="text-center daily_buffer_used" ><strong>0 min</strong> <small>/</small> <strong>5 min</strong></td>
                                                                            <td class="text-center monthly_buffer_used"><strong>0 min</strong> <small>/</small> <strong>15 min</strong></td>
                                                                        </tr>
                                                                    </tbody>
                                                                 </table>
                                                                 </div>
                                                              </div><!-- portlet-body -->
                                                           </div><!-- portlet -->
                                                           <!-- END PORTLET-->
                                                        </div><!-- col-md-12 -->
                                                    </div><!-- row -->
                                              </div>
                                            </div>
                                            <!-- tab_1_3_3 -->
                                            <div class="tab-pane" id="tab_1_3_2">
                                               <div class="portlet light bordered padding0 marginBottom0">
                                                  <div class="portlet-title">
                                                     <div class="caption">
                                                        <i class="icon-users font-dark"></i>
                                                        <span class="caption-subject font-dark sbold uppercase">Absentia </span>
                                                     </div>
                                                     <div class="actions">
                                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                           <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                                                           <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Add Absentia" data-toggle="modal" href="#AddAIA" id="">Add Absentia</button>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <!-- portlet-title -->
                                                  <div class="portlet-body" style="padding:15px;">
                                                     <table width="100%" border="0" class="table table-striped table-hover table-bordered" id="absentia_table">
                                                        <thead>
                                                           <tr>
                                                              <th width="15%">Title</th>
                                                              <th width="15%">Date</th>
                                                              <th width="15%">From <small>(time)</small></th>
                                                              <th width="15%">To <small>(time)</small></th>
                                                              <th width="30%">Description</th>
                                                              <th width="30%">Action</th>
                                                           </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                     </table>
                                                  </div>
                                                  <!-- portlet-body -->
                                                  <div class="modal fade" id="AddAIA" tabindex="-1" role="basic" aria-hidden="true">
                                                     <div class="modal-dialog">
                                                        <div class="modal-content">
                                                           <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                              <h3 class="modal-title">Add Absentia</h3>
                                                           </div>
                                                           <div class="modal-body" style="float:left;width:100%;">
                                                              <div class="portlet box blue-hoki">
                                                                 <div class="portlet-title">
                                                                    <div class="caption">
                                                                       <i class="fa fa-user"></i><font id="selected_individuals">Attendance in Absentia form</font>
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
                                                                 <div class="portlet-body fixedHeightmodalPortlet">
                                                                    <div class="form-body">
                                                                       <div class="row">
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">Title:</label>
                                                                                <div class="">
                                                                                   <input type="text" class="form-control" name="" id="absentia_title" data-id="">
                                                                                </div>
                                                                             </div>
                                                                             <!-- form-group -->
                                                                          </div>
                                                                          <!-- col-md-6 -->
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">Date:</label>
                                                                                <div class="">
                                                                                   <input type="date" class="form-control" name="" id="absentia_date" data-id="">
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
                                                                                   <input type="time" class="form-control" name="" id="absentia_startTime" data-id="">
                                                                                </div>
                                                                             </div>
                                                                             <!-- form-group -->
                                                                          </div>
                                                                          <!-- col-md-6 -->
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">End Time:</label>
                                                                                <div class="">
                                                                                   <input type="time" class="form-control" name="" id="absentia_endTime" data-id="">
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
                                                                                   <textarea id="absentia_description" cols="85" rows="5"></textarea>
                                                                                </div>
                                                                             </div>
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
                                                              <button onclick="addAbsentia()" type="button" class="btn dark btn-outline active" data-dismiss="">Add</button>
                                                              <!--button type="button" class="btn green">Add Badge</button -->
                                                           </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                     </div>
                                                     <!-- /.modal-dialog -->
                                                  </div>
                                                  <!-- Start Edit Absenia_id -->
                                                  <div class="modal fade" id="AddAIAE" tabindex="-1" role="basic" aria-hidden="true">
                                                      <input type="hidden" name="Edit_Absentia_id_hidden" id="Edit_Absentia_id_hidden" value="0" />
                                                      <input type="hidden" name="Edit_Absentia_id_staff_id_hidden" id="Edit_Absentia_id_staff_id_hidden" value="0" />
                                                      
                                                      
                                                               <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                     <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <h3 class="modal-title">Edit Absentia</h3>
                                                                     </div>
                                                                     <div class="modal-body" style="float:left;width:100%;">
                                                                        <div class="portlet box blue-hoki">
                                                                           <div class="portlet-title">
                                                                              <div class="caption">
                                                                                 <i class="fa fa-user"></i><font id="selected_individuals">Attendance in Absentia form</font>
                                                                              </div>
                                                                           </div>
                                                                           <!-- portlet-title -->
                                                                           <div class="headRightDetailsInner">
                                                                              <table>
                                                                                 <tbody>
                                                                                    <tr id="">
                                                                                       <td class="" style="padding-right:10px;">
                                                                                          <img class="user-pic rounded absentia_staff_img tooltips" data-container="body" data-placement="top" src="" width="42">
                                                                                       </td>
                                                                                       <td class="staffView_StaffName">
                                                                                          <a href="javascript:;" class="primary-link tooltips absentia_staff_name" data-container="body" data-placement="top" ></a> - <small class="absentia_name_code tooltips" data-container="body" data-placement="top" data-original-title="" ></small><br><small class="shortHeight"><span class="absentia_bottom_line tooltips" data-container="body" data-placement="top" ></span></small>
                                                                                       </td>
                                                                                    </tr>
                                                                                 </tbody>
                                                                              </table>
                                                                              <!-- col-md-4 -->
                                                                           </div>
                                                                           <div class="portlet-body fixedHeightmodalPortlet">
                                                                              <div class="form-body" id="Absenia_Contents"> </div>
                                                                              <!-- form-body -->
                                                                           </div>
                                                                           <!-- portlet-body fixedHeightmodalPortlet-->
                                                                        </div>
                                                                     </div>
                                                                     <div class="modal-footer text-center" style="text-align:center;">
                                                                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                                                                        <button onclick="addAbsentiaE()" type="button" class="btn dark btn-outline active" data-dismiss="">Update</button>
                                                                        <!--button type="button" class="btn green">Add Badge</button -->
                                                                     </div>
                                                                  </div>
                                                                  <!-- /.modal-content -->
                                                               </div>
                                                               <!-- /.modal-dialog -->
                                                            </div>
                                                  <!-- End Edit Absenia_id-->
                                                </div>
                                               <!-- portlet -->
                                            </div>
                                            <!-- tab_1_3_2 -->
                                            
                                            <div class="tab-pane" id="tab_1_3_4">
                                               <div class="portlet light bordered padding0">
                                                  <div class="portlet-title">
                                                     <div class="caption">
                                                        <i class="icon-users font-dark"></i>
                                                        <span class="caption-subject font-dark sbold uppercase"> Leave Applications </span>
                                                     </div>
                                                     <div class="actions">
                                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                           <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                                                           <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Leave Application" data-toggle="modal" href="#LeaveApp" onClick="clearLeave()">Apply for Leave</button>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <!-- portlet-title -->
                                                  <div class="portlet-body" style="padding:15px;">
                                                     <table width="100%" border="0" class="table table-striped table-hover table-bordered" id="leave_table">
                                                        <thead>
                                                           <tr>
                                                              <th width="15%">Title <small>(type)</small></th>
                                                              <th width="12%">Compensation</th>
                                                              <th width="15%">From </th>
                                                              <th width="13%">To </th>
                                                              <th width="30%">Additional Comments</th>
                                                              <th width="9%" class="text-center">Action</th>
                                                           </tr>
                                                        </thead>
                                                        <tbody class="font-grey-mint">
                                              
                                                        </tbody>
                                                     </table>
                                                  </div>
                                         
                                                  <!-- portlet-body -->
                                                  <div class="modal fade" id="LeaveApproval" tabindex="-1" role="basic" aria-hidden="true">
                                                     <div class="modal-dialog">
                                                        <div class="modal-content">
                                                           <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                              <h3 class="modal-title">Leave Application Approval</h3>
                                                           </div>
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
                                                                                <label class="">From:</label>
                                                                                <div class="">
                                                                                   <input type="date" class="form-control"  id="leave_from_update" data-id="" disabled="disabled">
                                                                                </div>
                                                                             </div>
                                                                             <!-- form-group -->
                                                                          </div>
                                                                          <!-- col-md-6 -->
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">To:</label>
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
                                                                                   <label class="">Approved From:</label>
                                                                                   <div class="">
                                                                                      <input type="date" class="form-control" id="approve_from">
                                                                                   </div>
                                                                                </div>
                                                                                <!-- form-group -->
                                                                             </div>
                                                                             <!-- col-md-6 -->
                                                                             <div class="col-md-6 paddingBottom10">
                                                                                <div class="form-group">
                                                                                   <label class="">Approved To:</label>
                                                                                   <div class="">
                                                                                      <input type="date" class="form-control" id="approve_to">
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
                                                                                      <input type="number" class="form-control" id="paid_compensation_percentage">
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
                                                           </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                     </div>
                                                     <!-- /.modal-dialog -->
                                                  </div>
                                                  
                                         
                                                <div class="modal fade" id="LeaveApp" tabindex="-1" role="basic" aria-hidden="true">
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
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">Leave Title:</label>
                                                                                <div class="">
                                                                                   <input type="text" class="form-control" name="" id="leave_title" >
                                                                                </div>
                                                                             </div>
                                                                             <!-- form-group -->
                                                                          </div>
                                                                          <!-- col-md-6 -->
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">Leave Type:</label>
                                                                                <div class="leave_type">
                                                                                   <select class="form-control">
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
                                                                                <label class="">From:</label>
                                                                                <div class="">
                                                                                   <input type="date" class="form-control" name="" id="leave_from">
                                                                                </div>
                                                                             </div>
                                                                             <!-- form-group -->
                                                                          </div>
                                                                          <!-- col-md-6 -->
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">To:</label>
                                                                                <div class="">
                                                                                   <input type="date" class="form-control" name="" id="leave_to">
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
                                                                                   <textarea id="leave_comment" cols="85" rows="5"></textarea>
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
                                                                                   <input type="checkbox" class="make-switch" data-on-text="Yes" data-off-text="No" id="limit">
                                                                                </div>
                                                                             </div>
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
                                                              <button onClick="add_leave()" type="button" class="btn dark btn-outline active" data-dismiss="">Add</button>
                                                              <!--button type="button" class="btn green">Add Badge</button -->
                                                           </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                     </div>
                                                     <!-- /.modal-dialog -->
                                                </div>
                                              
                                                <!-- Kashif Solangi Leave Application Edit Functionality Modal-->
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
                                               <!-- End Kashi Solangi Leave Applicaiton Modal -->
                                                </div>
                                               <!-- portlet -->
                                               <div class="portlet light bordered padding0">
                                                  <div class="portlet-title">
                                                     <div class="caption">
                                                        <i class="icon-users font-dark"></i>
                                                        <span class="caption-subject font-dark sbold uppercase"> Unauthorized Leave Penalties </span>
                                                     </div>
                                                     <div class="actions">
                                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                           <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                                                           <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Unauthorized Leave Penalty" data-toggle="modal" href="#UnAuthLeavePen" id="">Penalty</button>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <!-- portlet-title -->
                                                  <div class="portlet-body" style="padding:15px;">
                                                     <table width="100%" border="0" class="table table-striped table-hover table-bordered" id="penaltyTable">
                                                        <thead>
                                                           <tr>
                                                               <th width="15%">Penalty Title</th>
                                                              <th width="10%" scope="row">Penalty <br /> (no of days)</th>
                                                              <th width="15%">From - To </th>
                                                              <th width="15%">Timestamp </th>
                                                              <th width="22%">Additional Comments</th>
                                                              <th width="10%">Action</th>
                                                           </tr>
                                                        </thead>
                                                        <tbody class="font-grey-mint">

                                                        </tbody>
                                                     </table>
                                                  </div>
                                                  <!-- portlet-body -->
                                                  <div class="modal fade" id="UnAuthLeavePen" tabindex="-1" role="basic" aria-hidden="true">
                                                     <div class="modal-dialog">
                                                        <div class="modal-content">
                                                           <!-- <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                              <h3 class="modal-title">Leave Application Approval</h3>
                                                              </div> -->
                                                           <div class="modal-body" style="float:left;width:100%;">
                                                              <div class="portlet box blue-hoki">
                                                                 <div class="portlet-title">
                                                                    <div class="caption">
                                                                       <i class="fa fa-user"></i><font id="">Penalty</font>
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
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">Penalty Title:</label>
                                                                                <div class="">
                                                                                   <input type="text" class="form-control" name="" id="penalty_title">
                                                                                </div>
                                                                             </div>
                                                                             <!-- form-group -->
                                                                          </div>
                                                                          <!-- col-md-6 -->
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">Penalty for <small>(no of days)</small>:</label>
                                                                                <div class="input-group">
                                                                                   <input type="number" class="form-control" id="penalty_day">
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
                                                                                   <input type="date" class="form-control"  id="penalty_from">
                                                                                </div>
                                                                             </div>
                                                                             <!-- form-group -->
                                                                          </div>
                                                                          <!-- col-md-6 -->
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">Penalty to:</label>
                                                                                <div class="">
                                                                                   <input type="date" class="form-control" id="penalty_to">
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
                                                                                   <textarea cols="85" rows="5" id="penalty_description"></textarea>
                                                                                </div>
                                                                             </div>
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
                                                              <button onCLick="addPenalty()" type="button" class="btn dark btn-outline active" data-dismiss="">Submit</button>
                                                              <!--button type="button" class="btn green">Add Badge</button -->
                                                           </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                     </div>
                                                     <!-- /.modal-dialog -->
                                                  </div>
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
                                               </div>
                                               <!-- portlet -->
                                            </div>
                                            <!-- tab_1_3_4 -->
                                            <div class="tab-pane" id="tab_1_3_5">
                                               <div class="portlet light bordered padding0">
                                                  <div class="portlet-title">
                                                     <div class="caption">
                                                        <i class="icon-users font-dark"></i>
                                                        <span class="caption-subject font-dark sbold uppercase"> Exceptional Adjustments </span>
                                                     </div>
                                                     <div class="actions">
                                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                           <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                                                           <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Add Exceptional Adjustment" data-toggle="modal" href="#ExceptionalAdjustmentForm" onClick="clearAdjustment()">Adjustments</button>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <!-- portlet-title -->
                                                  <div class="portlet-body" style="padding:15px;">
                                                     <table width="100%" border="0" class="table table-striped table-hover table-bordered" id="adjustment_table">
                                                        <thead>
                                                           <tr>
                                                             <th width="15%">Adjustment Title</th>
                                                              <th width="10%">Adjustment <br />(no of days)</th>
                                                              <th width="15%">Timestamp </th>
                                                              <th width="22%">Additional Comments</th>
                                                              <th width="10%">Action</th>
                                                           </tr>
                                                        </thead>
                                                        <tbody class="font-grey-mint">
                                                        </tbody>
                                                     </table>
                                                  </div>
                                                  <!-- portlet-body -->
                                                  <div class="modal fade" id="ExceptionalAdjustmentForm" tabindex="-1" role="basic" aria-hidden="true">
                                                     <div class="modal-dialog">
                                                        <div class="modal-content">
                                                           <!-- <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                              <h3 class="modal-title">Leave Application Approval</h3>
                                                              </div> -->
                                                           <div class="modal-body" style="float:left;width:100%;">
                                                              <div class="portlet box blue-hoki">
                                                                 <div class="portlet-title">
                                                                    <div class="caption">
                                                                       <i class="fa fa-user"></i><font id="">Adjustments</font>
                                                                    </div>
                                                                 </div>
                                                                 <!-- portlet-title -->
                                                                 <div class="headRightDetailsInner">
                                                                    <table>
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
                                                                    <div class="form-body">
                                                                       <div class="row">
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">Title:</label>
                                                                                <div class="">
                                                                                   <input type="text" class="form-control" name="" id="adjustment_title" >
                                                                                </div>
                                                                             </div>
                                                                             <!-- form-group -->
                                                                          </div>
                                                                          <!-- col-md-6 -->
                                                                          <div class="col-md-6 paddingBottom10">
                                                                             <div class="form-group">
                                                                                <label class="">Adjustment for <small>(no of days)</small>:</label>
                                                                                <div class="input-group">
                                                                                   <input type="number" class="form-control" id="adjustment_no">
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
                                                                                   <textarea id="adjustment_description" cols="85" rows="5"></textarea>
                                                                                </div>
                                                                             </div>
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
                                                              <button onClick="addAdjustment()" type="button" class="btn dark btn-outline active">Submit</button>
                                                              <!--button type="button" class="btn green">Add Badge</button -->
                                                           </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                     </div>
                                                     <!-- /.modal-dialog -->
                                                  </div>
                                                  <!-- portlet-body -->
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
                                                                    <table>
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
                                                </div>
                                               <!-- portlet -->
                                            </div>
                                            <!-- tab_1_3_5 -->
                                            <div class="tab-pane" id="tab_1_3_6">
                                               <div class="portlet light bordered padding0">
                                                  <div class="portlet-title">
                                                     <div class="caption">
                                                        <i class="icon-users font-dark"></i>
                                                        <span class="caption-subject font-dark sbold uppercase"> Missed Tap Event </span>
                                                     </div>
                                                     <div class="actions">
                                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                           <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                                                           <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Add Exceptional Adjustment" data-toggle="modal" href="#ManualAttendanceForm" onClick="clearManual()">Attendance</button>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <!-- portlet-title -->
                                                  <div class="portlet-body" style="padding:15px;">
                                         
                                                     <input type="hidden" name="Missed_id" id="Missed_id" value="0" />
                                                     <input type="hidden" name="Table_name" id="Table_name" value="0" />
                                         
                                                     <table width="100%" border="0" class="table table-striped table-hover table-bordered" id="manual_table">
                                                        <thead>
                                                          
                                                           <tr>
                                                              <th width="15%">Attendance Date </th>
                                                              <th width="12%">Tap</th>
                                                              <th width="15%">Timestamp </th>
                                                              <th width="23%">Additional Comments</th>
                                                              <th width="10%">Action</th>
                                                           </tr>
                                                        </thead>
                                                     
                                                        <tbody class="font-grey-mint">
                                                           <!-- <tr class="">
                                                              <td>
                                                                 Mon Oct 09, 2017
                                                              </td>
                                                              <td>
                                                                 07:23 am
                                                              </td>
                                                              <td>
                                                                 04:05 pm
                                                              </td>
                                                              <td>
                                                                 <strong>Mon Oct 09, 2017</strong> at <strong>07:23 am</strong>
                                                              </td>
                                                              <td>
                                                                 Lorem ipsum dolor sit amet
                                                              </td>
                                                           </tr>
                                                           <tr class="">
                                                              <td>
                                                                 Mon Oct 09, 2017
                                                              </td>
                                                              <td>
                                                                 07:23 am
                                                              </td>
                                                              <td>
                                                                 04:05 pm
                                                              </td>
                                                              <td>
                                                                 <strong>Mon Oct 09, 2017</strong> at <strong>07:23 am</strong>
                                                              </td>
                                                              <td>
                                                                 Lorem ipsum dolor sit amet
                                                              </td>
                                                           </tr>
                                                           <tr class="">
                                                              <td>
                                                                 Mon Oct 09, 2017
                                                              </td>
                                                              <td>
                                                                 07:23 am
                                                              </td>
                                                              <td>
                                                                 04:05 pm
                                                              </td>
                                                              <td>
                                                                 <strong>Mon Oct 09, 2017</strong> at <strong>07:23 am</strong>
                                                              </td>
                                                              <td>
                                                                 Lorem ipsum dolor sit amet
                                                              </td>
                                                           </tr> -->
                                                        </tbody>
                                                     </table>
                                                  </div>
                                                  <!-- portlet-body -->
                                                  <div class="modal fade" id="ManualAttendanceForm" tabindex="-1" role="basic" aria-hidden="true">
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
                                                                                <label class="">Attendance Date:</label>
                                                                                <div class="">
                                                                                   <input type="date" class="form-control"  id="manual_attendance">
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
                                                                                <label class="">Tap :</label>
                                                                                <div class="">
                                                                                   <input type="time" class="form-control" name="" id="manual_missTap" data-id="">
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
                                                                                <label class="">Information regarding missed tap event:</label>
                                                                                <div class="">
                                                                                   <textarea id="manual_description" cols="85" rows="5"></textarea>
                                                                                </div>
                                                                             </div>
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
                                                              <button type="button" class="btn dark btn-outline active" data-dismiss="" onClick="insert_manual()">Submit</button>
                                                              <!--button type="button" class="btn green">Add Badge</button -->
                                                           </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                     </div>
                                                     <!-- /.modal-dialog -->
                                                  </div>
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
                                                  </div> <!-- End ManualAttendanceFormEdit modal -->
                                         
                                                </div>
                                               <!-- portlet -->
                                            </div>
                                            <!-- tab_1_3_6 -->
                                         </div>
                                         <!-- tab-content -->
                                    </div>
                                </div>
                                <!-- End Attendance Module -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div><!-- col-md-12 -->
</div><!-- row -->
<!-- END USE PROFILE -->






<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::to('metronic') }}/pages/scripts/profile.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->


<!-- BEGIN APP LEVEL SCRIPTS -->
<script src="{{ URL::to('metronic') }}/global/scripts/app.min.js" type="text/javascript"></script>
<script type="text/javascript">
/*
* Name: Set Not Acceptable
* Description: Used to set N/A on json object values if they are empty or null
*
*/

var setNotAcceptable = function setNotAcceptable(jsonObj){
    for (var key in jsonObj) {
      if (jsonObj.hasOwnProperty(key)) {
        if( jsonObj[key] === '' || jsonObj[key] === null) 
            jsonObj[key] = 'N/A';
      }
    }
    return jsonObj;
}



var clearStaffInfo = function() {
    $('.profile-userpic img').attr("src", '');
    $('.profile-usertitle-name').text('');
    $('.profile-usertitle-job').text('');
    $('.profile-usertitle-gtid').text('');
    $('.profile-usertitle-email').text('');
    $('.profile-usertitle-campus').text('');
    $('.profile-usertitle-mobilePhone').text('');
    $('.profile-usertitle-bottomline').text('');

    /***** TIF-B: Personal Info *****/
    $('.tifb-basics-fullName').html('');
    $('.tifb-basics-religion').html('');
    $('.tifb-basics-gender').html('');
    $('.tifb-basics-maritalStatus').html('');
    $('.tifb-basics-nic').html('');
    $('.tifb-basics-nationality').html('');
    $('.tifb-basics-dob').html('');

    /***** TIF-B: Contact Info *****/
    $('.tifb-basics-mobilePhone').html('');
    $('.tifb-basics-landLine').html('');
    $('.tifb-basics-personalEmail').html('');

    /***** TIF-B: Address Info ****/
    $('.tifb-basics-apartmentNo').html('');
    $('.tifb-basics-buildingName').html('');
    $('.tifb-basics-region').html('');
    $('.tifb-basics-streetName').html('');
    $('.tifb-basics-plotNo').html('');
    $('.tifb-basics-subRegion').html('');

    /***** TIF-B: Official Info ****/
    $('.tifb-basics-nameCode').html('');
    $('.tifb-basics-empStatus').html('');

    /****** Roles ******************/
    $('.profile-userrole-report-one').html('');

    /********* Role 1 **************/
    $('.profile-userrole-role-one-img').css('display','none');
    $('.profile-userrole-role-one').html('');
    $('.profile-userrole-role-one-report').html('');

    /************ Role 2 **********/
    $('.profile-userrole-role-two-img').css('display','none');
    $('.profile-userrole-role-two').html('');
    $('.profile-userrole-role-two-report').html('');

    /*********** Profile Description ***********/

    $('.profile-user-detail').html('');

    /********* Attendance Status ****************/

    $('.profile-user-attendance img').attr('src','');




    /***** TIF-A: Clear All ****/
    $('#tab_1_2').html('');
};

/***** BEGIN - Tab Information - TIF-B *****/
var get_Staff_TIFB = function(staffID) {
    var html = '';
    var educationSections = ['Others', 'Professional', 'University', 'College', 'School'];
    var educationNumbers = [5, 4, 3, 2, 1]

    $.ajax({
        type:"POST",
        cache:true,
        url:"{{url('/masterLayout/staff/getStaff_tifB')}}",
        data:{
            staff_id:staffID,
            "_token": "{{ csrf_token() }}",
        },
        success:function(result){

            var data = jQuery.parseJSON(result);



            for(var j=0; j < educationSections.length; j++) {
                html = html+'<h4 class="form-section headingBorderBottom">'+educationSections[j]+'</h4><div class="row">';
                for (var i = 0; i < data['education'].length; i++) {
                    if(data['education'][i]['level'] === educationNumbers[j]) {
                        data['education'][i] = setNotAcceptable(data['education'][i]);
                        html = html+'<div class="col-md-6"><div class="portlet light bordered lowPadding"><div class="portlet-body"><div class="col-md-3 padding0"><img src="{{ url("/metronic/pages/img/schoolIcon.jpg") }}" class="SchoolPlaceHolder" /></div><!-- col-md-3 --><div class="col-md-9 paddingRight0"><h5 class=" marginBottom0"><strong>'+data['education'][i]['institute']+'</strong></h5><h5 class="font-grey-cascade"><strong>'+data['education'][i]['qualification']+'</strong>, '+data['education'][i]['subjects']+'</h5><div class="col-md-6 padding0"><h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-graduation"></span>&nbsp;&nbsp;&nbsp;'+data['education'][i]['result']+'</h5></div><div class="col-md-6"><h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-calendar"></span>&nbsp;&nbsp;&nbsp;'+data['education'][i]['year_of_completion']+'</h5></div></div><!-- col-md-9 --></div><!-- portlet-body --></div><!-- portlet --></div><!-- col-md-6 -->';
                    }
                }
                html = html+'</div>';
            }
            $('#tab_education').html(html);




            html = '';
            if(data['employment'][0]['organization'] != null){
                for (var i = 0; i < data['employment'].length; i++) {
                    data['employment'][i] = setNotAcceptable(data['employment'][i]);
                    html = html+'<div class="row">';
                    html = html+'<div class="col-md-12"><div class="portlet light lowPadding2 onlyBorderBottom marginBottom0"><div class="portlet-body"><div class="col-md-1 padding0"><img src="{{ url("/metronic/pages/img/BriefacaseIcon.jpg") }}" class="SchoolPlaceHolder" /></div><!-- col-md-3 --><div class="col-md-11 paddingRight0"><h5 class=" marginBottom0 font-grey-mint marginTop0"><strong>'+data['employment'][i]['organization']+'</strong> on the position of <strong>'+data['employment'][i]['designation']+'</strong></h5><h5 class="font-grey-salsa marginBottom4"><span class="positionDetail"><i class="fa fa-money tooltips" data-container="body" data-placement="top" data-original-title="Sallary"></i> <strong>'+data['employment'][i]['salary']+'</strong></span><span class="positionDetail"><i class="fa fa-calendar tooltips" data-container="body" data-placement="top" data-original-title="Tenure"></i> <strong>'+data['employment'][i]['from_year']+'</strong> to <strong>'+data['employment'][i]['to_year']+'</strong></span><span class="positionDetail"><img src="http://10.10.10.50/gsims/public/metronic/pages/img/blackboard.png" width="20" class="tooltips" data-container="body" data-placement="top" data-original-title="Classes Taught" /> <strong>'+data['employment'][i]['classes_taught']+' </strong></span><span class="positionDetail"><i class="icon-book-open tooltips" data-container="body" data-placement="top" data-original-title="Subjects Taught"></i> <strong>'+data['employment'][i]['subject_taught']+'</strong></span></h5><p class="font-grey-salsa marginBottom0">Reason for Leaving: <span class="font-grey-mint">'+data['employment'][i]['reason_for_leaving']+'</span> </p></div><!-- col-md-9 --></div><!-- portlet-body --></div><!-- portlet --></div><!-- col-md-6 -->';
                    html = html+'</div><!-- row -->';
                }
            }
            $('#tab_employment').html(html);





            html = '';
            if(data['fs'][0]['name'] != null){

                data['fs'][0] = setNotAcceptable(data['fs'][0]);
                data['fs'][1] = setNotAcceptable(data['fs'][1]);

                html = '<tr><td class="">'+data['fs'][0]['name']+'</td><td class="text-center"><strong>Name</strong></td><td class="">'+data['fs'][1]['name']+'</td></tr><tr><td>'+data['fs'][0]['profession']+'</td><td class="text-center"><strong>Profession</strong></td><td>'+data['fs'][1]['profession']+'</td></tr><tr><td>'+data['fs'][0]['qualification']+'</td><td class="text-center"><strong>Qualification</strong></td><td>'+data['fs'][1]['qualification']+'</td></tr><tr><td>'+data['fs'][0]['designation']+'</td><td class="text-center"><strong>Designation</strong></td><td>'+data['fs'][1]['designation']+'</td></tr><tr><td>'+data['fs'][0]['department']+'</td><td class="text-center"><strong>Department</strong></td><td>'+data['fs'][1]['department']+'</td></tr><tr><td>'+data['fs'][0]['company']+'</td><td class="text-center"><strong>Organisation</strong></td><td>'+data['fs'][1]['company']+'</td></tr><tr><td>'+data['fs'][0]['nic']+'</td><td class="text-center"><strong>CNIC</strong></td><td>'+data['fs'][1]['nic']+'</td></tr><tr><td>'+data['fs'][0]['mobile_phone']+'</td><td class="text-center"><strong>Mobile</strong></td><td>'+data['fs'][1]['mobile_phone']+'</td></tr><tr><td>'+data['fs'][0]['address']+'</td><td class="text-center"><strong>Address</strong></td><td>'+data['fs'][1]['address']+'</td></tr>';
            }
            $('#tab_parent_table').html(html);





            html = '';
            if(data['sc'][0]['gs_id'] != null){
                for (var i = 0; i < data['sc'].length; i++) {
                    data['sc'][i] = setNotAcceptable(data['sc'][i]);
                    html = html+'<div class="col-md-3"><div class="mt-card-item '+data['sc'][i]['html_class']+'"><div class="mt-card-avatar mt-overlay-4"><img src="{{ url("") }}/'+data['sc'][i]['photo500']+'" /><div class="mt-overlay"><h2>'+data['sc'][i]['class']+' <span class="font-yellow-lemon">('+data['sc'][i]['house_name']+')</span></h2><div class="mt-info font-white"><div class="mt-card-content"><p class="mt-card-desc font-white">GF-ID: <strong>'+data['sc'][i]['gfid']+'</strong> ('+(i+1)+'/'+data['sc'].length+')</p><div class="mt-card-social"></div></div></div></div><!-- mt-overlay --></div><!-- mt-card-avatar --><div class="mt-card-content"><h3 class="mt-card-name">'+data['sc'][i]['abridged_name']+'</h3><p class="mt-card-desc font-grey-mint">GS-ID: <strong>'+data['sc'][i]['gs_id']+'</strong> ('+data['sc'][i]['std_status_code']+')</p></div><!-- mt-card-content --></div><!-- mt-card-item --></div><!-- col-md-3 -->';
                }
            }
            $('#tab_staff_child').html(html);





            html = '';
            if(data['ac'][0]['name'] != null){
                data['ac'][0] = setNotAcceptable(data['ac'][0]);
                data['ac'][1] = setNotAcceptable(data['ac'][1]);
                html = '<tr><td>'+data['ac'][0]['name']+'</td><td class="text-center"><strong>Name</strong></td><td>'+data['ac'][1]['name']+'</td></tr><tr><td>'+data['ac'][0]['address']+'</td><td class="text-center"><strong>Address</strong></td><td>'+data['ac'][1]['address']+'</td></tr><tr><td>'+data['ac'][0]['email']+'</td><td class="text-center"><strong>Email</strong></td><td>'+data['ac'][1]['email']+'</td></tr><tr><td>'+data['ac'][0]['phone']+'</td><td class="text-center"><strong>Mobile</strong></td><td>'+data['ac'][1]['phone']+'</td></tr><tr><td>'+data['ac'][0]['relationships']+'</td><td class="text-center"><strong>Relationship</strong></td><td>'+data['ac'][1]['relationships']+'</td></tr>';
            }
            $('#tab_alternate_contact').html(html);



            data['other'][0] = setNotAcceptable(data['other'][0]);
            html = '<div class="form-body"><h3 class="form-section marginTop0 headingBorderBottom">Other Details</h3><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Provident Fund :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['pf']+' </p></div></div></div><!--/span--><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">NTN:</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['ntn']+' </p></div></div></div><!--/span--></div><!--/row--><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">EOBI/SESSI number: </label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['eobi']+' / '+data['other'][0]['sessi']+'</p></div></div></div><!--/span--></div><!--/row--><h3 class="form-section headingBorderBottom">Bank Details</h3><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Bank Name : </label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['bank_name']+' </p></div></div></div><!--/span--><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Branch :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['bank_branch']+' </p></div></div></div><!--/span--></div><!--/row--><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Account Number :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['account_number']+' </p></div></div></div><!--/span--></div><!--/row--><h3 class="form-section headingBorderBottom">Takaful</h3><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Self :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['takaful_self']+' </p></div></div></div><!--/span--><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Spouse :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['takaful_spouse']+' </p></div></div></div><!--/span--></div><!--/row--><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Children :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['takaful_children']+' </p></div></div></div><!--/span--><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Certificate :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['takaful_crt']+' </p></div></div></div><!--/span--></div><!--/row--></div><!-- form-body -->';
            $('#tab_other').html(html);
        }
    });
};
/***** END - Tab Information - TIF-B *****/




/***** BEGIN - Tab Information - TIF-B *****/
var get_Staff_TIFA = function(GTID) {
    /***** Posting GT-ID and retrieving data ****/
    $.ajax({
        url: "{{url('/masterLayout/staff/getStaff_tifA')}}",
        type:"POST",
        cache:true,
        data: {
          GTID: GTID,
          "_token": "{{ csrf_token() }}",
        },
        success: function (response) {
            $('#tab_1_2').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Something wrong! error: ' + textStatus);
        }
    });
};
/***** END - Tab Information - TIF-B *****/

function loadajax(){
    /***** Further Requests of AJAX *****/
    var me = $(this);
    if ( me.data('staffView_staffInfo_requestRunning_one') ) {
        return;
    }
    me.data('staffView_staffInfo_requestRunning_one', true);
    /***** Stop Further Request of AJAX *****/

    clearStaffInfo();

    var staffID = <?php echo $user['info'][0]->staff_id; ?>;
    var staffGTID = $(this).attr('data-staffGTID');
    var staffAtd_detail = $(this).attr('data-src');
    var staffAtd_status = $(this).attr('data-title');
    var staffAtd_content = $(this).attr('data-content');

    $('.profile-userpic img').attr("src", "<?php echo url('/assets/img/loading.png'); ?>");
    $.ajax({
        type:"POST",
        cache:true,
        url:"{{url('/masterLayout/staff/getStaffInfo')}}",
        data:{
            staff_id:staffID,
            "_token": "{{ csrf_token() }}",
        },
        success:function(result){
            var data = jQuery.parseJSON(result);
            data['info'][0] = setNotAcceptable(data['info'][0]);
            
            // (1) display staff information
            $('.profile-userpic img').attr("src", data['info'][0]['photo500']);
            $('.profile-usertitle-name').text(data['info'][0]['abridged_name']);
            $('.profile-usertitle-job').text(data['info'][0]['c_topline']);
            $('.profile-usertitle-gtid').html(data['info'][0]['gt_id'] + " (" + data['info'][0]['status_code'] + ")");
            $('.profile-usertitle-email').html(data['info'][0]['email']);
                $('.profile-usertitle-email').prop("href", 'mailto:'+data['info'][0]['email']+'@generations.edu.pk');
            $('.profile-usertitle-campus').html(data['info'][0]['campus']);
            $('.profile-usertitle-mobilePhone').html(data['info'][0]['mobile_phone']);
            $('.profile-usertitle-bottomline').html(data['info'][0]['c_bottomline']+':<br>'+data['info'][0]['c_topline']+'</br>');
            $('.tap_in_campus').text(data['info'][0]['campus']);


            /***** TIF-B: Personal Info *****/
            $('.tifb-basics-fullName').html(data['info'][0]['name']);
            $('.tifb-basics-religion').html(data['info'][0]['religion']);
            $('.tifb-basics-gender').html(data['info'][0]['gender']);
            $('.tifb-basics-maritalStatus').html(data['info'][0]['marital_status']);
            $('.tifb-basics-nic').html(data['info'][0]['nic']);
            $('.tifb-basics-nationality').html(data['info'][0]['nationality']);
            $('.tifb-basics-dob').html(data['info'][0]['dob']);


            /***** TIF-B: Contact Info *****/
            $('.tifb-basics-mobilePhone').html(data['info'][0]['mobile_phone']);
            $('.tifb-basics-landLine').html(data['info'][0]['land_line']);
            $('.tifb-basics-personalEmail').html(data['info'][0]['emailpersonal']);

            /***** TIF-B: Official Info ****/
            $('.tifb-basics-nameCode').html(data['info'][0]['name_code']);
            $('.tifb-basics-empStatus').html(data['info'][0]['staff_status_name']);

            /***** TIF-B: Address Info ****/
            $('.tifb-basics-apartmentNo').html(data['info'][0]['apartment_no']);
            $('.tifb-basics-buildingName').html(data['info'][0]['building_name']);
            $('.tifb-basics-region').html(data['info'][0]['region']);
            $('.tifb-basics-streetName').html(data['info'][0]['street_name']);
            $('.tifb-basics-plotNo').html(data['info'][0]['plot_no']);
            $('.tifb-basics-subRegion').html(data['info'][0]['sub_region']);



            /***** Processor Bar *****/
            $('#staffView_ProcessorBar').html('');
            var html = '<td class="" style="padding-right:10px;"><img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="'+data['info'][0]['gt_id']+'" src="'+data['info'][0]['photo150']+'" width="42"></td><td class="staffView_StaffName"><a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="'+data['info'][0]['name_code']+'" data-staffid="'+data['info'][0]['staff_id']+'" data-staffgtid="'+data['info'][0]['gt_id']+'">'+data['info'][0]['abridged_name']+'</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="'+data['info'][0]['email']+'">'+data['info'][0]['name_code']+'</small><br><small class="shortHeight"><span class="tooltips" data-container="body" data-placement="top" data-original-title="'+data['info'][0]['c_topline']+'">'+data['info'][0]['c_bottomline']+': '+data['info'][0]['c_topline']+'</span></small></td>';
            $('#staffView_ProcessorBar').html(html);

            /***** Roles *******/
            if(data['roles'][0]['pm_report_to']){

                data['reporting1'][0] = setNotAcceptable(data['reporting1'][0]);
                data['roles'][0] = setNotAcceptable(data['roles'][0]);

                if(data['reporting1'][0]['abridged_name']){
                    $('.profile-userrole-report-one').html('&#8594;'+data['reporting1'][0]['abridged_name']);
                }else{
                    $('.profile-userrole-report-one').html('N/A');
                }
                
            }else{
                $('.profile-userrole-report-one').html('&#8594;'+'N/A');
            }
            /***** Role 1 *******/
            
            if(data['reporting1']){
                
                data['reporting1'][0] = setNotAcceptable(data['reporting1'][0]);
                data['roles'][0] = setNotAcceptable(data['roles'][0]);
                
                $('.profile-userrole-role-one-img').css('display','');
                $('.profile-userrole-role-one').html(data['roles'][0]['role_title_tl']+' '+data['roles'][0]['role_title_bl']);
                /**
                   Description: IF abridge Name is Null 
                **/
                if(data['reporting1'][0]['abridged_name']){
                    $('.profile-userrole-role-one-report').html('&#8594;'+data['reporting1'][0]['abridged_name']);
                }else{
                    $('.profile-userrole-role-one-report').html('N/A');
                } // end if else abridged Name
                
            } // End if of reporting 1


            /**********Role 2**********/
            
            if(data['reporting2']){
                
                data['reporting2'][0] = setNotAcceptable(data['reporting2'][0]);
                data['roles'][1] = setNotAcceptable(data['roles'][1]);
                
                $('.profile-userrole-role-two-img').css('display','');
                $('.profile-userrole-role-two').html(data['roles'][1]['role_title_tl']+' '+data['roles'][1]['role_title_bl']);
                /**
                   Description: IF abridge Name is Null 
                **/
                if(data['reporting2'][0]['abridged_name']){
                    $('.profile-userrole-role-two-report').html('&#8594;'+data['reporting2'][0]['abridged_name']);
                }else{
                    $('.profile-userrole-role-two-report').html('');
                } // End if else abridged Name
                
            } // End if of reporting 2

            
            /************ Profile Details ***************/

            if(data['profile_description']){
                data['profile_description'][0] = setNotAcceptable(data['profile_description'][0]);
                $('.profile-user-detail').html(data['profile_description'][0]['time_profile']);
            }else{
                $('.profile-user-detail').html('N/A');
            }

            /**************** User Attendance ********************/

            
            if(staffAtd_detail){
                
                $('.profile-user-attendance').html('<img style="margin-top: 0px;" src="'+staffAtd_detail+'" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In '+staffAtd_content+'" data-original-title="'+staffAtd_status+'" width="20" />');

                $('.popovers').popover({
                    container: 'body'
                });
            }



            var activeTab = $.trim($('#staffViewTabs li.active').text());
            if(activeTab === 'TIF-B'){
                get_Staff_TIFB(staffID);
                $('#tab_1_1').data('staffID',staffID);
            }else if(activeTab === 'TIF-A'){
                get_Staff_TIFA(staffGTID);
            }
        },
        /***** Further Requests of AJAX *****/
        complete: function() {
            me.data('staffView_staffInfo_requestRunning_one', false);
        }
        /***** Stop Further Request of AJAX *****/

    });
}









$(document).ready(function() {
    App.init();
    loadajax();

    var dailyReport = function(date,staffID){
        $.ajax({
           type:"POST",
           cache:true,
           data:{ 
            "date":date,
            "staff_id":staffID,
            "_token":"{{csrf_token()}}" 
           },
           url:"{{ url('/masterLayout/getDailyReport')}}",
           success:function(e){
           $('.noShow').removeClass('noShow');
           var data = JSON.parse(e);
           if(data.length != 0){
                 
              console.log(data);


               // Weekly Time Sheet
                    var weekly_time_sheet_in = timeToMinute(data[0].day_time_in);
                    var weekly_time_sheet_out = timeToMinute(data[0].day_time_out);

                    var range = [];
                    if(weekly_time_sheet_in && weekly_time_sheet_out){
                      range.push(parseInt(parseInt(weekly_time_sheet_in)-parseInt(60)));
                      range.push(parseInt(parseInt(weekly_time_sheet_out)+parseInt(60)));
                    }else{
                      $('#weeklySlider').addClass('noShow');
                      range.push(360);
                      range.push(1000);
                    }

                    var compliance_in = data[0].compliance_in;
                    var compliance_out = data[0].compliance_out;
                    var compliance_duration = data[0].compliance_duration;
                    var is_on_flexy = data[0].is_on_flexy;

                    

                    var buffer_used = data[0].buffer_minutes_in;
                    var buffer_used_out = data[0].buffer_minutes_out;

                    if(buffer_used_out == ''){
                      buffer_used_out = 0
                    }

                    if(buffer_used == ''){
                      buffer_used = 0;
                    }

                    var factor = data[0].fuctor;
                    var factor_deduction = data[0].fuctor_nod;
                    var previous_leave = data[0].prv_rem_leaves;
                    var current_leave = data[0].rem_leaves;
                    var currentDateFlag = 0;




                    // Actual Tap In And Tapout
                    var time = data[0].tap_time;
                    console.log('time ------'+time);
                    var time_flag = data[0].tap_io;
                    if(time){
                       time = time.split(',');
                       var timeMinute = timeToMinuteForArray(time);
                       
                    }
                    if(time_flag){
                       time_flag = time_flag.split(',');
                    }

                    




                     // Absentia Allocated

                    var absentia_allocated_time = data[0].ab_rec_time;
                    var absentia_flag = data[0].ab_rec_io;

                    if(absentia_allocated_time){
                         absentia_allocated_time = absentia_allocated_time.split(',');
                         var absentia_allocated = timeToMinuteForArray(absentia_allocated_time);
                    }else{
                       absentia_allocated_time = '';
                    }

                    if(absentia_flag){
                       absentia_flag = absentia_flag.split(',');
                    }


                    // Buffer Utilization
                    
                    if(buffer_used != 0 || buffer_used_out != 0 && data[0].holiday == null){
                       var buffer_array = [];
                       var buffer_connect = [false];
                       var buffer_tooltip = [];
                       var buffer_in = parseInt(buffer_used);
                       var buffer_out = parseInt(buffer_used_out);
                       var buffer_tooltip_diplay = [];
                       if(buffer_in != 0){
                                                
                          buffer_tooltip_diplay.push(buffer_used);
                          buffer_array.push(weekly_time_sheet_in);
                          buffer_in = parseInt(weekly_time_sheet_in)+parseInt(buffer_used);
                          buffer_array.push(buffer_in);
                          buffer_connect.push(true,false);
                          buffer_tooltip.push(false,true);
                          
                       }

                       if(buffer_out != 0){
                          
                          buffer_tooltip_diplay.push(buffer_used_out);
                          buffer_array.push(weekly_time_sheet_out);
                          buffer_out = parseInt(weekly_time_sheet_out)+parseInt(buffer_out);
                          buffer_array.push(buffer_out);
                          buffer_connect.push(true,false);
                          buffer_tooltip.push(false,true);
                          
                       }
                       
                       
                       bufferInOut(buffer_array,buffer_connect,buffer_tooltip,buffer_tooltip_diplay);
                       
                    }else if(buffer_used != 0 || buffer_used_out != 0 && data[0].holiday != null && data[0].holidayflag == 0){
                      
                      //Case # 1 Holiday and is off for Particular Staff
                       buffer_used = 0;
                       buffer_used_out = 0;
                       bufferInOut([0,0],false,false,false);
                    }else if(buffer_used != 0 || buffer_used_out != 0 && data[0].holiday != null && data[0].holidayflag == 1){
                       
                       var buffer_array = [];
                       var buffer_connect = [false];
                       var buffer_tooltip = [];
                       var buffer_in = parseInt(buffer_used);
                       var buffer_out = parseInt(buffer_used_out);
                       var buffer_tooltip_diplay = [];
                       if(buffer_in != 0){
                          
                          buffer_tooltip_diplay.push(buffer_used);
                          buffer_array.push(weekly_time_sheet_in);
                          buffer_in = parseInt(weekly_time_sheet_in)+parseInt(buffer_used);
                          buffer_array.push(buffer_in);
                          buffer_connect.push(true,false);
                          buffer_tooltip.push(false,true);
                          
                       }

                       if(buffer_out != 0){
                          
                          buffer_tooltip_diplay.push(buffer_used_out);
                          buffer_array.push(weekly_time_sheet_out);
                          buffer_out = parseInt(weekly_time_sheet_out)+parseInt(buffer_out);
                          buffer_array.push(buffer_out);
                          buffer_connect.push(true,false);
                          buffer_tooltip.push(false,true);
                          
                       }
                       
                       
                       bufferInOut(buffer_array,buffer_connect,buffer_tooltip,buffer_tooltip_diplay);

                    }else{

                       buffer_used = 0;
                       buffer_used_out = 0;
                       bufferInOut([0,0],false,false,false);
                    }


                     // PayRoll Attendace Without Flexy

                    if(is_on_flexy == 0){
                        if(time.length > 0 && data[0].holiday == null){

                          var connectPayRoll = [false];
                          var classPayRoll = [];
                          var payRollAttendance = data[0].payroll_time_slot;
                          payRollAttendance = payRollAttendance.split(',')
                          var  payRollAttendanceArray = timeToMinuteForArray(payRollAttendance);
                          console.log("payRollAttendanceArrayBefore"+payRollAttendanceArray);

                          var payRollFlag = data[0].payroll_time_code;
                          payRollFlag = payRollFlag.split(',');

                          // Arranging PayRoll Flag if Actual Time is Greater Then Expected Time

                          for(var i = 0 ; i< payRollFlag.length ; i++){
                             if(payRollFlag[i] == 'Ei' &&  payRollAttendanceArray[i+1] < payRollAttendanceArray[i]){
                                payRollAttendanceArray[i+1] = payRollAttendanceArray[i];
                               }

                             if(payRollFlag[i] == 'Eo' && payRollAttendanceArray[i-1] > payRollAttendanceArray[i]){

                                for(j = payRollFlag.length ; j > 0 ; j--){
                                   if(payRollAttendanceArray[j-1] > payRollAttendanceArray[j])
                                   payRollAttendanceArray[j-1] = payRollAttendanceArray[j];
                                }


                                
                             }

                             if(payRollFlag[i] == 'Ei' && buffer_used != 0){
                                payRollAttendanceArray[i+1] = parseInt(payRollAttendanceArray[i+1])-parseInt(buffer_used);
                             }


                             if(payRollFlag[i] == 'Eo' && buffer_used_out != 0){
                                payRollAttendanceArray[i-1] = parseInt(payRollAttendanceArray[i-1])+parseInt(buffer_used_out);
                             }

                             if(payRollFlag[i] && payRollFlag[i] == 'Eo' ){
                                var addMinute = parseInt(payRollAttendanceArray[i]) + parseInt(1);
                                if(addMinute == payRollAttendanceArray[i+1]){
                                   payRollFlag.splice(i,2);
                                   payRollAttendanceArray.splice(i,2);
                                }
                             }


                             

                          }

                          if((Date.parse(date) == Date.parse(data[0].today_date)) && payRollFlag.indexOf('0') == -1 ){
                             console.log('at today date');
                             var index =   payRollFlag.indexOf('Eo');
                             var EoValue = payRollAttendanceArray[index];
                             payRollFlag.splice(index, 1);
                             payRollAttendanceArray.splice(index, 1);

                             var OutIndex = payRollFlag.indexOf('0');
                             var OutIndexManual = payRollFlag.indexOf('9');
                             if(OutIndex == -1 && OutIndexManual){
                                var InIndex =  payRollFlag.indexOf('1');
                                var InValue = payRollAttendanceArray[InIndex];
                                currentDateFlag = 1;
                                payRollFlag.push('0');
                                payRollAttendanceArray.push(InValue);

                              }

                          }

                          
                          console.log("payRollAttendanceArrayAfter--------"+payRollAttendanceArray);
                          console.log("payRollAttendanceArrayAfter--------"+payRollFlag);


                          if(payRollFlag.length > 0 && data[0].holiday == null){
                              
                             for(var i = 0 ; i < payRollFlag.length ; i++){

                                if(payRollFlag[i] == 'Ei'){
                                   connectPayRoll.push(true);
                                   classPayRoll.push('red-color');

                                }

                                if(payRollFlag[i] == '1' || payRollFlag[i] == '8'){
                                   connectPayRoll.push(true);
                                   classPayRoll.push('green-color');

                                }

                                if((payRollFlag[i] == '0' ||  payRollFlag[i] == '9') && currentDateFlag == '0' ){
                                    console.log('At Current Date Flag = 0');
                                   connectPayRoll.push(true);
                                   classPayRoll.push('red-color');
                                }

                                if((payRollFlag[i] == '0' ||  payRollFlag[i] == '9') && currentDateFlag == '1' ){
                                   connectPayRoll.push(false);
                                   classPayRoll.push('red-color');
                                   console.log('At Current Date Flag = 1');

                                }

                                if(payRollFlag[i] == 'Eo'){
                                   connectPayRoll.push(false);
                                   classPayRoll.push('grey-color');

                                }

                                if(payRollFlag[i] == 'Ao'){

                                   connectPayRoll.push(true);
                                   classPayRoll.push('red-color');

                                }

                                if(payRollFlag[i] == 'ARo'){

                                   connectPayRoll.push(true);
                                   classPayRoll.push('green-color');


                                }

                                if(payRollFlag[i] == 'ARi'){

                                   if(payRollFlag[i+1] == 'Ai'){
                                      classPayRoll.push('red-color');
                                   }else{
                                      classPayRoll.push('green-color');
                                   }
                                   connectPayRoll.push(true);
                                }

                                if(payRollFlag[i] == 'Ai'){


                                   connectPayRoll.push(true);
                                   classPayRoll.push('green-color');


                                }
                             }

                            PayRollAttendanceSlider(payRollAttendanceArray,connectPayRoll,classPayRoll,range);
                          }else if(data[0].holiday != null && data[0].holidayflag == 0){
                            //Case # 1 Holiday and is off for Particular Staff
                            PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                          }else if(data[0].holiday != null && data[0].holidayflag == 1){
                            //Case # 2 Holiday and is on for Particular Staff
                              console.log('at case 2');
                              for(var i = 0 ; i < payRollFlag.length ; i++){

                                if(payRollFlag[i] == 'Ei'){
                                   connectPayRoll.push(true);
                                   classPayRoll.push('red-color');

                                }

                                if(payRollFlag[i] == '1' || payRollFlag[i] == '8'){
                                   connectPayRoll.push(true);
                                   classPayRoll.push('green-color');

                                }

                                if((payRollFlag[i] == '0' ||  payRollFlag[i] == '9') && currentDateFlag == '0' ){
                                    console.log('At Current Date Flag = 0');
                                   connectPayRoll.push(true);
                                   classPayRoll.push('red-color');
                                }

                                if((payRollFlag[i] == '0' ||  payRollFlag[i] == '9') && currentDateFlag == '1' ){
                                   connectPayRoll.push(false);
                                   classPayRoll.push('red-color');
                                   console.log('At Current Date Flag = 1');

                                }

                                if(payRollFlag[i] == 'Eo'){
                                   connectPayRoll.push(false);
                                   classPayRoll.push('grey-color');

                                }

                                if(payRollFlag[i] == 'Ao'){

                                   connectPayRoll.push(true);
                                   classPayRoll.push('red-color');

                                }

                                if(payRollFlag[i] == 'ARo'){

                                   connectPayRoll.push(true);
                                   classPayRoll.push('green-color');


                                }

                                if(payRollFlag[i] == 'ARi'){

                                   if(payRollFlag[i+1] == 'Ai'){
                                      classPayRoll.push('red-color');
                                   }else{
                                      classPayRoll.push('green-color');
                                   }
                                   connectPayRoll.push(true);
                                }

                                if(payRollFlag[i] == 'Ai'){


                                   connectPayRoll.push(true);
                                   classPayRoll.push('green-color');


                                }
                             }

                            PayRollAttendanceSlider(payRollAttendanceArray,connectPayRoll,classPayRoll,range);
                          }

                       }else if((data[0].holiday != null && data[0].holidayflag == 0) || isNaN(weekly_time_sheet_in)){
                            $('#PayrollAttendance').addClass('noShow');
                            PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                       }else{

                          if(Date.parse(date) > Date.parse(data[0].today_date)){
                            $('#PayrollAttendance').addClass('noShow');
                            PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                          }else{
                            PayRollAttendanceSlider([weekly_time_sheet_in,weekly_time_sheet_out],[false,true,false],['red-color'],range);
                          }
                       }
                    }else{

                       // Status for Flexy
                       // Same For In Flexy
                       // Out Ef For Flexy
                       if(time.length > 0){
                          var flexyForOut = data[0].payroll_time_out;
                          flexyForOut = timeToMinute(flexyForOut);
                          var tap_max = data[0].tap_max;
                          tap_max = timeToMinute(tap_max);
                          var connectPayRollFlexy = [false];
                          var classPayRollFlexy = [];
                          var payRollAttendanceFlexy = data[0].payroll_time_slot;
                          payRollAttendanceFlexy = payRollAttendanceFlexy.split(',')
                          var  payRollAttendanceArrayFlexy = timeToMinuteForArray(payRollAttendanceFlexy);
                          console.log("payRollAttendanceArrayBefore"+payRollAttendanceArrayFlexy);
                          var payRollFlagFlexy = data[0].payroll_time_code;
                          payRollFlagFlexy = payRollFlagFlexy.split(',');
                          // Arranging PayRoll Flag if Actual Time is Greater Then Expected Time
                             for(var i = 0 ; i< payRollFlagFlexy.length ; i++){
                                if(payRollFlagFlexy[i] == 'Ei' &&  payRollAttendanceArrayFlexy[i+1] < payRollAttendanceArrayFlexy[i]){
                                   payRollAttendanceArrayFlexy[i+1] = payRollAttendanceArrayFlexy[i];
                                }

                                if(payRollFlagFlexy[i] == 'Eo' && payRollAttendanceArrayFlexy[i-1] > payRollAttendanceArrayFlexy[i]){

                                   for(j = payRollFlagFlexy.length ; j > 0 ; j--){
                                      if(payRollAttendanceArrayFlexy[j-1] > payRollAttendanceArrayFlexy[j])
                                      payRollAttendanceArrayFlexy[j-1] = payRollAttendanceArrayFlexy[j];
                                   }
                                   
                                }


                                if(payRollFlagFlexy[i] == 'Ei' && buffer_used != 0){
                                   payRollAttendanceArrayFlexy[i+1] = parseInt(payRollAttendanceArrayFlexy[i+1])-parseInt(buffer_used);
                                }


                                if(payRollFlagFlexy[i] == 'Eo' && buffer_used_out != 0){
                                   payRollAttendanceArrayFlexy[i-1] = parseInt(payRollAttendanceArrayFlexy[i-1])+parseInt(buffer_used_out);
                                }

                                if(payRollFlagFlexy[i]){
                                   var addMinute = parseInt(payRollAttendanceArrayFlexy[i]) + parseInt(1);
                                   if(addMinute == payRollAttendanceArrayFlexy[i+1]){
                                      payRollFlagFlexy.splice(i,2);
                                      payRollAttendanceArrayFlexy.splice(i,2);
                                   }
                                }

                                if(payRollFlagFlexy[i] == 'Eo' && tap_max > payRollAttendanceArrayFlexy[i]){
                                    payRollFlagFlexy.push('Tm');
                                    
                                    if(tap_max >= flexyForOut){
                                      payRollAttendanceArrayFlexy.push(flexyForOut);
                                    }else{
                                      payRollAttendanceArrayFlexy.push(tap_max);
                                    }
                                    
                                }

                             }

                             // ADD OUT TIME AND STATUS FOR FLEXY
                             payRollAttendanceArrayFlexy.push(flexyForOut);
                             payRollFlagFlexy.push("Ef");

                             console.log("payRollAttendanceArrayFlexy"+payRollAttendanceArrayFlexy)
                             console.log("payRollFlagFlexy"+payRollFlagFlexy)

                             if(payRollFlagFlexy.length > 0 && data[0].holiday == null){

                                for(var i = 0 ; i < payRollFlagFlexy.length ; i++){

                                   if(payRollFlagFlexy[i] == 'Ei'){
                                      
                                      if(flexyForOut == weekly_time_sheet_out){
                                         classPayRollFlexy.push('red-color');
                                      }else{
                                          classPayRollFlexy.push('yelow-color');
                                      }
                                      connectPayRollFlexy.push(true);
                                   }

                                   if(payRollFlagFlexy[i] == '1' || payRollFlagFlexy[i] == '8'){
                                      connectPayRollFlexy.push(true);
                                      classPayRollFlexy.push('green-color');
                                   }

                                   if(payRollFlagFlexy[i] == '0' ||  payRollFlagFlexy[i] == '9'){
                                      connectPayRollFlexy.push(true);
                                      classPayRollFlexy.push('red-color');
                                   }

                                   if(payRollFlagFlexy[i] == 'Eo'){

                                      connectPayRollFlexy.push(true);
                                      if(payRollAttendanceArrayFlexy[i] >= tap_max){
                                        console.log('tap Max less Than '+tap_max);
                                        classPayRollFlexy.push('red-color');
                                      }else{
                                        classPayRollFlexy.push('yelow-color');
                                      }
                                   }

                                   if(payRollFlagFlexy[i] == 'Tm'){
                                      connectPayRollFlexy.push(true);
                                      classPayRollFlexy.push('red-color');
                                   }

                                   if(payRollFlagFlexy[i] == 'Ao'){

                                      connectPayRollFlexy.push(true);
                                      classPayRollFlexy.push('red-color');
                                   }

                                   if(payRollFlagFlexy[i] == 'ARo'){

                                      connectPayRollFlexy.push(true);
                                      classPayRollFlexy.push('green-color');


                                   }

                                   if(payRollFlagFlexy[i] == 'ARi'){

                                      if(payRollFlagFlexy[i+1] == 'Ai'){
                                         classPayRollFlexy.push('red-color');
                                      }else{
                                         classPayRollFlexy.push('green-color');
                                      }
                                      connectPayRollFlexy.push(true);
                                   }

                                   if(payRollFlagFlexy[i] == 'Ai'){

                                      connectPayRollFlexy.push(true);
                                      classPayRollFlexy.push('green-color');

                                   }

                                   if(payRollFlagFlexy[i] == 'Ef'){
                                      connectPayRollFlexy.push(false);
                                      classPayRollFlexy.push('green-color');

                                   }


                                }
                                PayRollAttendanceSlider(payRollAttendanceArrayFlexy,connectPayRollFlexy,classPayRollFlexy,range);
                             }else if((data[0].holiday != null && data[0].holidayflag == 0) || isNan(weekly_time_sheet_in) ){
                            //Case # 1 Holiday and is off for Particular Staff
                             $('#PayrollAttendance').addClass('noShow');
                            PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                          }else if(data[0].holiday != null && data[0].holidayflag == 1){
                            for(var i = 0 ; i < payRollFlagFlexy.length ; i++){

                               if(payRollFlagFlexy[i] == 'Ei'){
                                  
                                  if(flexyForOut == weekly_time_sheet_out){
                                     classPayRollFlexy.push('red-color');
                                  }else{
                                      classPayRollFlexy.push('yelow-color');
                                  }
                                  connectPayRollFlexy.push(true);
                               }

                               if(payRollFlagFlexy[i] == '1' || payRollFlagFlexy[i] == '8'){
                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('green-color');
                               }

                               if(payRollFlagFlexy[i] == '0' ||  payRollFlagFlexy[i] == '9'){
                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('red-color');
                               }

                               if(payRollFlagFlexy[i] == 'Eo'){

                                  connectPayRollFlexy.push(true);
                                  if(payRollAttendanceArrayFlexy[i] >= tap_max){
                                    console.log('tap Max less Than '+tap_max);
                                    classPayRollFlexy.push('red-color');
                                  }else{
                                    classPayRollFlexy.push('yelow-color');
                                  }
                               }

                               if(payRollFlagFlexy[i] == 'Tm'){
                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('red-color');
                               }

                               if(payRollFlagFlexy[i] == 'Ao'){

                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('red-color');
                               }

                               if(payRollFlagFlexy[i] == 'ARo'){

                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('green-color');
                               }

                               if(payRollFlagFlexy[i] == 'ARi'){

                                  if(payRollFlagFlexy[i+1] == 'Ai'){
                                     classPayRollFlexy.push('red-color');
                                  }else{
                                     classPayRollFlexy.push('green-color');
                                  }
                                  connectPayRollFlexy.push(true);
                               }

                               if(payRollFlagFlexy[i] == 'Ai'){

                                  connectPayRollFlexy.push(true);
                                  classPayRollFlexy.push('green-color');
                               }

                               if(payRollFlagFlexy[i] == 'Ef'){
                                  connectPayRollFlexy.push(false);
                                  classPayRollFlexy.push('green-color');
                               }


                            }
                            PayRollAttendanceSlider(payRollAttendanceArrayFlexy,connectPayRollFlexy,classPayRollFlexy,range);
                          }
                       }else{

                        if(Date.parse(date) > Date.parse(data[0].today_date)){
                            $('#PayrollAttendance').addClass('noShow');
                            PayRollAttendanceSlider([0,0],[false,false,false],['red-color'],range);
                          }else{
                            PayRollAttendanceSlider([weekly_time_sheet_in,weekly_time_sheet_out],[false,true,false],['red-color'],range);
                          }
                       }




                    }



                    
                 //// ================ Weekly Tap in ==============//
                 ////================================================//


                    if(weekly_time_sheet_in && weekly_time_sheet_out && data[0].holiday == null ){

                       var tap = [weekly_time_sheet_in,weekly_time_sheet_out];
                       var connect = [false,true,false];
                       weeklyTapInTapOut(tap,connect,range);

                    }else if(data[0].holiday != null && data[0].holidayflag == 0 && weekly_time_sheet_in && weekly_time_sheet_out){

                       //Case # 1 Holiday and is off for Particular Staff
                       weeklyTapInTapOut([0,0],false,range);
                       $('#weeklySlider').addClass('noShow');

                    }else if(data[0].holiday != null && data[0].holidayflag == 1 && weekly_time_sheet_in && weekly_time_sheet_out){

                      //Case # 2 Holiday and is on for Particular Staff
                       var tap = [weekly_time_sheet_in,weekly_time_sheet_out];
                       var connect = [false,true,false];
                       weeklyTapInTapOut(tap,connect,range);

                    }else{
                      weeklyTapInTapOut([0,0],false,range);
                    }




                 //// ================ Actual Tap In And Tapout ==============//
                 ////==============================================================//




                    if(time_flag){
                    var miss_tap_index = time_flag.indexOf('9');
                    var connect1 = [false];
                    var classes = [];
                    var uihandle = [];
                    var noUitooltip =[];
                    for(var i = 0 ; i < time_flag.length;i++){
                       if(time_flag[i] == '8'){
                             connect1.push(true);
                             classes.push('green-color');
                             uihandle.push('red-bar');
                             noUitooltip.push('In');
                       }

                       if(time_flag[i] == '1'){
                             connect1.push(true);
                             classes.push('green-color');
                             uihandle.push('normal-bar');
                             noUitooltip.push('In');
                       }



                    if(time_flag[i] == '0'){         
                          connect1.push(true);
                          classes.push('grey-color');
                          uihandle.push('normal-bar');
                          noUitooltip.push('Out');              
                       }

                    if(time_flag[i] == '9'){
                             connect1.push(true);

                             var class_push_flag = 0;
                              
                             for(var j = i+1 ; j < time_flag.length;j++){
                                if(time_flag[j] == '1' || time_flag[j] == '8'){
                                   class_push_flag =1;
                                }
                             }
                             if(class_push_flag == 1){
                                 classes.push('grey-color');
                             }else{
                                 classes.push('green-color');
                             }

                            
                             uihandle.push('red-bar');
                             noUitooltip.push('Out');  
                       }

                    }

                    console.log('connnect1'+connect1);
                    connect1.splice(connect1.length-1);
                    connect1.push(false)

                    if(miss_tap_index !== -1){
                       console.log(miss_tap_index);
                       classes[miss_tap_index-1] = 'green-color';
                       console.log(classes);
                    }

                    console.log('noUitooltip'+noUitooltip);
                    actualTapInTapOut(timeMinute,connect1,classes,uihandle,noUitooltip,range)  

                 }else{
                    actualTapInTapOut([0,0,0,0],false,'','','',range);
                    $('#tapSlider').addClass('noShow');
                 }

                 // ================= ABSENTIA ALLOCATED TIME =====================//
                 //===============================================================//




                  if(absentia_flag && data[0].holiday == null){

                       var connect_abasentia = [false];
                       //var classes_absentia = [];

                       for(var i = 0 ; i < absentia_flag.length ; i++){
                          if(absentia_flag[i] == '7'){
                               connect_abasentia.push(true);
                          }

                          if(absentia_flag[i] == '6'){
                             connect_abasentia.push(false);
                             
                          }
                       }

                       absentiaAllocatedTap(absentia_allocated,connect_abasentia,range);


                    }else if(data[0].holiday != null && data[0].holidayflag == 0 && absentia_flag){
                      //Case # 1 Holiday and is off for Particular Staff
                      absentiaAllocatedTap([0,0,0,0],false,range);
                      $('#AiAabsentia').addClass('noShow');
                    }else if (data[0].holiday != null && data[0].holidayflag == 1 && absentia_flag){
                      //Case # 2 Holiday and is on for Particular Staff
                      var connect_abasentia = [false];
                       for(var i = 0 ; i < absentia_flag.length ; i++){
                          if(absentia_flag[i] == '7'){
                               connect_abasentia.push(true);
                          }

                          if(absentia_flag[i] == '6'){
                             connect_abasentia.push(false);
                             
                          }
                       }

                      absentiaAllocatedTap(absentia_allocated,connect_abasentia,range);
                    }else{
                      absentiaAllocatedTap([0,0,0,0],false,range);
                      $('#AiAabsentia').addClass('noShow');
                    }


                  // Daily Buffer And Monthly Buffer

                 var daily_relax_in = data[0].daily_relax_in;
                 var monthly_relax_in = data[0].monthly_relax_in;
                 var buffer_minutes_in = data[0].buffer_minutes_in;
                 var rem_buffer_in = data[0].rem_buffer_in;

                 if(buffer_minutes_in == ''){
                    buffer_minutes_in = 0
                 }

                 $('.daily_buffer_used').text(buffer_minutes_in+"min / "+daily_relax_in+"min");
                 $('.monthly_buffer_used').text(rem_buffer_in+"min / "+monthly_relax_in+"min");
                 $('.daily_buffer_assign').text(daily_relax_in+"min");
                 $('.monthly_buffer_assign').text(rem_buffer_in+"min");

                  

                 // Compilance_in
                 if( (data[0].holiday == null || data[0].holidayflag == 1) && isNaN(weekly_time_sheet_in) == false ){
                    
                    if(data[0].tap_io == '' && Date.parse(date) > Date.parse(data[0].today_date)){
                       $('.compliance_one_img').attr("src", "<?php echo url('/img/complaint_gray.png'); ?>");
                    }else{

                     if(compliance_in == 1){
                        $('.compliance_one_img').attr("src", "<?php echo url('/img/complaint.png'); ?>");
                     }else if(compliance_in == 0){
                        $('.compliance_one_img').attr("src", "<?php echo url('/img/noncomplaint.png'); ?>");
                     }
                    }
                 }else if ((data[0].holiday != null && data[0].holidayflag == 0) || isNaN(weekly_time_sheet_in) == true  ){
                  $('.compliance_one_img').attr("src", "<?php echo url('/img/complaint_gray.png'); ?>");
                 }

                 
                 // Compilance_out
                if((data[0].holiday == null || data[0].holidayflag == 1) && isNaN(weekly_time_sheet_in) == false){ 
                  if(data[0].tap_io == '' && Date.parse(date) > Date.parse(data[0].today_date)){
                       $('.compliance_two_img').attr("src", "<?php echo url('/img/complaint_gray.png'); ?>");
                    }else{
                     if(compliance_out == 1){
                        $('.compliance_two_img').attr("src", "<?php echo url('/img/complaint.png'); ?>");
                     }else if(compliance_out == 0){
                        $('.compliance_two_img').attr("src", "<?php echo url('/img/noncomplaint.png'); ?>");
                     }
                   }
                }else if((data[0].holiday != null && data[0].holidayflag == 0) || isNaN(weekly_time_sheet_in) == true){
                  $('.compliance_two_img').attr("src", "<?php echo url('/img/complaint_gray.png'); ?>");
                }

                // Compilance_duration 
                if((data[0].holiday == null || data[0].holidayflag == 1) && isNaN(weekly_time_sheet_in) == false){
                  if(data[0].tap_io == '' && Date.parse(date) > Date.parse(data[0].today_date)){
                        $('.compliance_duration_img').attr("src", "<?php echo url('/img/complaint_gray.png'); ?>");
                    }else{
                  if(compliance_duration == 1){
                      $('.compliance_duration_img').attr("src", "<?php echo url('/img/complaint.png'); ?>");
                  }else if(compliance_duration == 0){
                      $('.compliance_duration_img').attr("src", "<?php echo url('/img/noncomplaint.png'); ?>");
                  }
                }
                }else if((data[0].holiday != null && data[0].holidayflag == 0) || isNaN(weekly_time_sheet_in) == true){
                  $('.compliance_duration_img').attr("src", "<?php echo url('/img/complaint_gray.png'); ?>");
                }

                              // Factor Mapping

                if(factor){
                 $('.factor_remaining_deduction').text(factor);
                }else{
                 $('.factor_remaining_deduction').text('0');
                }

                if(new Date(date) < new Date(data[0].today_date)){
                  if(factor_deduction){
                   $('.factor_deduction_from').text(factor_deduction);
                  }else{
                   $('.factor_deduction_from').text('0');
                  }
                }else{
                  $('.factor_deduction_from').text('0');
                }


                // Leave Mapping                           
                if(new Date(date) < new Date(data[0].today_date)){
                  $('.previous_el_balance').text(previous_leave);
                  $('.current_el_balance').text(current_leave);
                  $('.currentLeave').text(current_leave + ' / 10');

                }else{
                  $('.previous_el_balance').text(previous_leave);
                  $('.current_el_balance').text(previous_leave);
                  $('.currentLeave').text(previous_leave + ' / 10');
                }
                


              }

           }
        });
    }
    /*
    setTimeout(function(){
       loadajax();
    },10000); // milliseconds
    */


    //$(document).on('ready',function(e){
        var staffID = {{ $user['info'][0]->id }};
         $.ajax({
         type:"POST",
         cache:true,
         url:"{{url('/masterLayout/staff/getStaffInfo')}}",
         data:{
             staff_id: staffID,
             "_token": "{{ csrf_token() }}",
         },
         success:function(result){
            var data = jQuery.parseJSON(result);
            console.log(data);
            $('#Generations_AjaxLoader').hide();
            data['info'][0] = setNotAcceptable(data['info'][0]);

            dailyReport(data['get_cut_date'][0]['currentDate'],staffID);
             
             // (1) display staff information


             $('.profile-userpic img').attr("src", data['info'][0]['photo500']);
             $('.profile-usertitle-name').text(data['info'][0]['abridged_name']);
             $('.profile-usertitle-job').text(data['info'][0]['c_topline']);
             $('.profile-usertitle-gtid').html(data['info'][0]['gt_id'] + " (" + data['info'][0]['status_code'] + ")");
             $('.profile-usertitle-email').html(data['info'][0]['email']);
                 $('.profile-usertitle-email').prop("href", 'mailto:'+data['info'][0]['email']+'@generations.edu.pk');
             $('.profile-usertitle-campus').html(data['info'][0]['campus']);
             $('.currentLeave').text(data['current_leave'][0]['currentLeave']);
             $('.profile-usertitle-mobilePhone').html(data['info'][0]['mobile_phone']);
             $('.profile-usertitle-bottomline').html(data['info'][0]['c_bottomline']+':<br>'+data['info'][0]['c_topline']+'</br>');
             $('.tap_in_campus').text(data['info'][0]['campus']);
             $('.absentia_staff_img').attr("src", data['info'][0]['photo500']);
             $('.absentia_staff_name').text(data['info'][0]['abridged_name']);
             $('.absentia_name_code').text(data['info'][0]['name_code']);
             $('.absentia_bottom_line').html(data['info'][0]['c_bottomline']+' & '+data['info'][0]['c_topline']);
 
 
 
 
             /***** TIF-B: Personal Info *****/
             $('.tifb-basics-fullName').html(data['info'][0]['name']);
             $('.tifb-basics-religion').html(data['info'][0]['religion']);
             $('.tifb-basics-gender').html(data['info'][0]['gender']);
             $('.tifb-basics-maritalStatus').html(data['info'][0]['marital_status']);
             $('.tifb-basics-nic').html(data['info'][0]['nic']);
             $('.tifb-basics-nationality').html(data['info'][0]['nationality']);
             $('.tifb-basics-dob').html(data['info'][0]['dob']);
 
 
             /***** TIF-B: Contact Info *****/
             $('.tifb-basics-mobilePhone').html(data['info'][0]['mobile_phone']);
             $('.tifb-basics-landLine').html(data['info'][0]['land_line']);
             $('.tifb-basics-personalEmail').html(data['info'][0]['emailpersonal']);
 
             /***** TIF-B: Official Info ****/
             $('.tifb-basics-nameCode').html(data['info'][0]['name_code']);
             $('.tifb-basics-empStatus').html(data['info'][0]['staff_status_name']);
 
             /***** TIF-B: Address Info ****/
             $('.tifb-basics-apartmentNo').html(data['info'][0]['apartment_no']);
             $('.tifb-basics-buildingName').html(data['info'][0]['building_name']);
             $('.tifb-basics-region').html(data['info'][0]['region']);
             $('.tifb-basics-streetName').html(data['info'][0]['street_name']);
             $('.tifb-basics-plotNo').html(data['info'][0]['plot_no']);
             $('.tifb-basics-subRegion').html(data['info'][0]['sub_region']);
 
 
 
             /***** Processor Bar *****/
             $('#staffView_ProcessorBar').html('');
             var html = '<td class="" style="padding-right:10px;"><img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="'+data['info'][0]['gt_id']+'" src="'+data['info'][0]['photo150']+'" width="42"></td><td class="staffView_StaffName"><a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="'+data['info'][0]['name_code']+'" data-staffid="'+data['info'][0]['staff_id']+'" data-staffgtid="'+data['info'][0]['gt_id']+'">'+data['info'][0]['abridged_name']+'</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="'+data['info'][0]['email']+'">'+data['info'][0]['name_code']+'</small><br><small class="shortHeight"><span class="tooltips" data-container="body" data-placement="top" data-original-title="'+data['info'][0]['c_topline']+'">'+data['info'][0]['c_bottomline']+': '+data['info'][0]['c_topline']+'</span></small></td>';
             $('#staffView_ProcessorBar').html(html);
 
             /***** Roles *******/
             if(data['roles'][0]['pm_report_to']){
 
                 data['reporting1'][0] = setNotAcceptable(data['reporting1'][0]);
                 data['roles'][0] = setNotAcceptable(data['roles'][0]);
 
                 if(data['reporting1'][0]['abridged_name']){
                     $('.profile-userrole-report-one').html('&#8594;'+data['reporting1'][0]['abridged_name']);
                 }else{
                     $('.profile-userrole-report-one').html('N/A');
                 }      
             }else{
                 $('.profile-userrole-report-one').html('&#8594;'+'N/A');
             }
             /***** Role 1 *******/
             
             if(data['reporting1']){
                 
                 data['reporting1'][0] = setNotAcceptable(data['reporting1'][0]);
                 data['roles'][0] = setNotAcceptable(data['roles'][0]);
                 
                 $('.profile-userrole-role-one-img').css('display','');
                 $('.profile-userrole-role-one').html(data['roles'][0]['role_title_tl']+' '+data['roles'][0]['role_title_bl']);
                 /**
                    Description: IF abridge Name is Null 
                 **/
                 if(data['reporting1'][0]['abridged_name']){
                     $('.profile-userrole-role-one-report').html('&#8594;'+data['reporting1'][0]['abridged_name']);
                 }else{
                     $('.profile-userrole-role-one-report').html('N/A');
                 } // end if else abridged Name
                 
             } // End if of reporting 1
 
 
             /**********Role 2**********/
             
             if(data['reporting2']){
                 
                 data['reporting2'][0] = setNotAcceptable(data['reporting2'][0]);
                 data['roles'][1] = setNotAcceptable(data['roles'][1]);
                 
                 $('.profile-userrole-role-two-img').css('display','');
                 $('.profile-userrole-role-two').html(data['roles'][1]['role_title_tl']+' '+data['roles'][1]['role_title_bl']);
                 /**
                    Description: IF abridge Name is Null 
                 **/
                 if(data['reporting2'][0]['abridged_name']){
                     $('.profile-userrole-role-two-report').html('&#8594;'+data['reporting2'][0]['abridged_name']);
                 }else{
                     $('.profile-userrole-role-two-report').html('');
                 } // End if else abridged Name
                 
             } // End if of reporting 2
 
             
             /************ Profile Details ***************/
 
             if(data['profile_description']){
                 data['profile_description'][0] = setNotAcceptable(data['profile_description'][0]);
                 $('.profile-user-detail').html(data['profile_description'][0]['time_profile']);
             }else{
                 $('.profile-user-detail').html('N/A');
             }
 
             /**************** User Attendance ********************/
             // if(staffAtd_detail){
                 
             //     $('.profile-user-attendance').html('<img style="margin-top: 0px;" src="'+staffAtd_detail+'" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In '+staffAtd_content+'" data-original-title="'+staffAtd_status+'" width="20" />');
 
             //     $('.popovers').popover({
             //         container: 'body'
             //     });
             // }
 
                // Absentia Response
             if(data['absentia']){

                 var absentiaHTML = '';
 
                 for(var i=0; i< data['absentia'].length; i++){
                
          
          
                absentiaHTML = absentiaHTML + '<tr class="absentia_table_row" id="absentia_table_row_'+data['absentia'][i].Absenia_id+'"><td>'+data['absentia'][i].title +'</td><td>'+data['absentia'][i].date +'</td><td>'+
                  changeTimeFormat(data['absentia'][i].From_time)  +'</td><td>'+changeTimeFormat(data['absentia'][i].to_time) +'</td><td>'+data['absentia'][i].description +'</td><td><a onClick="Edit_Absentia('+data['absentia'][i].Absenia_id +','+data['absentia'][i].Staff_id +')"><i class="fa fa-edit"></i></a> | <a onClick="delete_Absentia('+data['absentia'][i].Absenia_id +','+data['absentia'][i].Staff_id +')"><i class="fa fa-close"></i></a></td></tr>';

             }
          
           $('#absentia_table tbody').html(absentiaHTML);
             }

             // Manual Response
             if(data['manual']){


                 var manualHTML = '';
                 var fromTime;
                 var toTime;
              var Tablename='';
 
                 for(var i=0; i< data['manual'].length; i++){
                
             var Missedid=data['manual'][i].Missed_id;
                
             if( data['manual'][i].Table_name == 'In_Table' ){
                var Tablename='In_Table';
             }else{
                var Tablename='Out_Table';
             }
             var Manual_id=data['manual'][i].Manual_id;
             manualHTML = manualHTML + '<tr class="missedTapEven" data-missed_id="'+Missedid+'" data-table_name="'+Tablename+'" data-id="'+data['manual'][i].Manual_id+'"><td>'+data['manual'][i].date +'</td><td>'+data['manual'][i].manual_time 
                       +'</td><td><small class="tooltips" data-original-title="'+data['info'][0]['abridged_name']+'">'+data['info'][0]['name_code']+' </small> - '+data['manual'][i].created_time +'</td><td>'+(data['manual'][i].description === null ? '': data['manual'][i].description) +'</td> <td><a onClick="editAddManual('+Manual_id+','+Missedid+',\''+Tablename+'\')"><i class="fa fa-edit"></i></a> | <a onClick="deleteAddManual('+Manual_id+','+Missedid+',\''+Tablename+'\')"><i class="fa fa-close"></i></a></td> </tr>';
                 }
             
          $('#Missed_id').val(Missedid);
          $('#Table_name').val(Tablename);
                $('#manual_table tbody').html(manualHTML);
             }


             // Comments Response
             if(data['comments']){
                 var commentsHTML = '';
 
                 for(var i=0; i< data['comments'].length; i++){
                     
                     if(data['comments'][i].flag == 'system' && data['comments'][i].thresholdTapIN == 'Threshold Tap In' ){
 
                         commentsHTML = commentsHTML + '<li class="in commentsLI" data-val='+data['comments'][i].date+'><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> Threshold  </a><span class="datetime"> at <strong>'+ data['comments'][i].time_12hr+ '</strong> on <strong>'+ data['comments'][i].date_format +'</strong> </span><span class="body"> '+data['comments'][i].title +'. ' + data['comments'][i].name +' '+ data['comments'][i].date_format +' Threshold tap-in '+ data['comments'][i].time_12hr +'</span><input type="hidden" class="dateSearch" value='+data['comments'][i].date+' /></div></li>';
                     } else if(data['comments'][i].flag == 'system' && data['comments'][i].thresholdTapOut == 'Threshold Tap Out' ){
                         commentsHTML = commentsHTML + '<li class="in commentsLI"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> Threshold  </a><span class="datetime"> at <strong>'+ data['comments'][i].time_12hr+ '</strong> on <strong>'+data['comments'][i].date_format + '</strong> </span><span class="body"> '+data['comments'][i].title +'. ' + data['comments'][i].name +' '+ data['comments'][i].date_format +' Threshold tap-out '+ data['comments'][i].time_12hr +'</span><input type="hidden" class="dateSearch" value='+data['comments'][i].date+' /></div></li>';
                     } else if(data['comments'][i].flag == 'system' && data['comments'][i].poTapIn == 'Po Tap In' ){
                         commentsHTML = commentsHTML + '<li class="in commentsLI"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> Principal Office  </a><span class="datetime"> at <strong>'+ data['comments'][i].time_12hr+ '</strong> on <strong>'+data['comments'][i].date_format + '</strong> </span><span class="body"> '+data['comments'][i].title +'. ' + data['comments'][i].name +' '+ data['comments'][i].date_format +' Principal Office tap-in '+ data['comments'][i].time_12hr +'</span><input type="hidden" class="dateSearch" value='+data['comments'][i].date+' /></div></li>';
                     } else if(data['comments'][i].flag == 'system' && data['comments'][i].poTapOut == 'Po Tap out' ){
                         commentsHTML = commentsHTML + '<li class="in commentsLI"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> Principal Office  </a><span class="datetime"> at <strong>'+ data['comments'][i].time_12hr+ '</strong> on <strong>'+ data['comments'][i].date_format + '</strong> </span><span class="body"> '+data['comments'][i].title +'. ' + data['comments'][i].name +' '+ data['comments'][i].date_format+' Principal Office tap-out '+ data['comments'][i].time_12hr +'</span><input type="hidden" class="dateSearch" value='+data['comments'][i].date+' /></div></li>';
                     } else if(data['comments'][i].flag == 'system' && data['comments'][i].vehicleTap == 'vehicle Tap IN' ){
                         commentsHTML = commentsHTML + '<li class="in commentsLI"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> Vehicle  </a><span class="datetime"> at <strong>'+ data['comments'][i].time_12hr+ '</strong> on <strong>'+ data['comments'][i].date_format + '</strong> </span><span class="body"> '+data['comments'][i].title +'. ' + data['comments'][i].name +' '+ data['comments'][i].date_format +' Vehicle tap-in '+ data['comments'][i].time_12hr +'</span><input type="hidden" class="dateSearch" value='+data['comments'][i].date+' /></div></li>';
                     } else if(data['comments'][i].flag == 'system' && data['comments'][i].vehicleTap == 'vehicle Tap Out' ){
                         commentsHTML = commentsHTML + '<li class="in commentsLI"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> Vehicle  </a><span class="datetime"> at <strong>'+ data['comments'][i].time_12hr+ '</strong> on <strong>'+ data['comments'][i].date_format + '</strong> </span><span class="body"> '+data['comments'][i].title +'. ' + data['comments'][i].date_format +' Vehicle tap-out '+ data['comments'][i].time_12hr +'</span><input type="hidden" class="dateSearch" value='+data['comments'][i].date+' /></div></li>';
                     } else if (data['comments'][i].flag == 'user' && data['comments'][i].comments != '') {
 
                         commentsHTML = commentsHTML + '<li class="out commentsLI"> <img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/'+ data['comments'][i].emp_id+'.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>'+data['comments'][i].title +'. ' + data['comments'][i].name +'</strong> </a><span class="datetime"> at <strong>'+ data['comments'][i].time_12hr + '</strong> on <strong>'+ data['comments'][i].date_format +'</strong> </span><span class="body">' + data['comments'][i].comments + '</span><span class="commentCat"> '+data['comments'][i].comments_categories+' </span><input type="hidden" class="dateSearch" value='+data['comments'][i].date+' /></div></li>';
                     }
                     
                                                       
                 }
 
                 $('#stories').html(commentsHTML);
             }

             
          
           // leave Response
            
             if(data['leave_description']){
                  
                var leaveHTML = '';

                for(var i = 0 ;i < data['leave_description'].length;i++){
             if(data['leave_description'][i].leave_approve_status==1){ 
                var tr = 'approvedBorder'; 
             }  else{
                var tr = 'PendingapprovedBorder'; 
             }
                leaveHTML = leaveHTML + '<tr  class="'+tr+'" data-id='+data['leave_description'][i].id+'><td>'+data['leave_description'][i].leave_title+'</small></td><td class=""><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested Compensation"></i> &nbsp; '+data['leave_description'][i].paid_compensation+' </td></tr>';
                if(data['leave_description'][i].leave_approve_status==1){
                   leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved Compensation"></i> &nbsp; '+data['leave_description'][i].paid_percentage+'</td></tr>';
                }

                leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested From"></i> &nbsp;'+data['leave_description'][i].leave_from+'</td></tr>';

                if(data['leave_description'][i].leave_approve_date_from){
                   leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved From"></i> &nbsp; '+data['leave_description'][i].leave_approve_date_from+' </td></tr>';
                }

                leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested till"></i> &nbsp; '+data['leave_description'][i].leave_to+'</td></tr>';

                if(data['leave_description'][i].leave_approve_date_to){
                   leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved till"></i> &nbsp;'+data['leave_description'][i].leave_approve_date_to+' </td> </tr>';
                }

                leaveHTML = leaveHTML + '</table></td><td>'+data['leave_description'][i].leave_description+'</td><td class="text-center"><a onClick="ReWriteLeave('+data['leave_description'][i].id+')"><i class="fa fa-edit"></i></a> | <a href="#" data-container="body" data-placement="bottom" data-original-title="Print Leave Application" class="tooltips" ><span aria-hidden="true" class="icon-printer"></span></a> | <a href="#LeaveApproval" data-toggle="modal" data-container="body" data-placement="bottom" data-original-title="Leave Approval" class="tooltips" onClick="updateLeave('+data['leave_description'][i].id+')" ><i class="fa fa-check"></i></a> | <a onClick="delectLeave('+data['leave_description'][i].id+')"><i class="fa fa-close"></i></a></td></tr>';

                }

                $('#leave_table tbody').html(leaveHTML);
             }

             // Penalty Response
             if(data['penalty']){
                var penaltyHTML = '';
                for(var i = 0 ; i < data['penalty'].length; i++){
                   penaltyHTML = penaltyHTML + '<tr class="penaltyRowClass" data-id="'+data['penalty'][i].id+'"><td>'+data['penalty'][i].penalty_title+'</td><td>'+data['penalty'][i].penalty_day+'</td><td><strong>'+data['penalty'][i].penalty_date+'</td><td>'+data['penalty'][i].timestamp+'</td><td>'+data['penalty'][i].penalty_description+'</td> <td class="text-center"><a onClick="ReWriteLeavePenalties('+data['penalty'][i].id+')"><i class="fa fa-edit"></i></a> | <a onClick="delectLeavePenalties('+data['penalty'][i].id+')"><i class="fa fa-close"></i></a> </td> </tr>';
                }

                $('#penaltyTable tbody').html(penaltyHTML);   
             }

             // Exception Adjustment

             if(data['exception_adjustment']){
             var exception_adjustment = '';
          for (var i = 0 ; i < data['exception_adjustment'].length; i++){
             exception_adjustment = exception_adjustment + '<tr class="AddAdjustment" data-id="'+data['exception_adjustment'][i].id+'"><td>'+data['exception_adjustment'][i].adjustment_title+'</td><td>'+data['exception_adjustment'][i].adjustment_day+'days</td><td>'+data['exception_adjustment'][i].created+'</td><td>'+data['exception_adjustment'][i].adjustment_description+'</td> <td class="text-center"><a onClick="ReWriteAdjustment('+data['exception_adjustment'][i].id+')"><i class="fa fa-edit"></i></a> | <a onClick="deleteAdjustment('+data['exception_adjustment'][i].id+')"><i class="fa fa-close"></i></a> </td> </tr>';
              }

                $('#adjustment_table tbody').html(exception_adjustment);
             }

                            // GET CUTDATE

             if(data['get_cut_date']){
              for(var i = 0 ; i < data['get_cut_date'].length;i++){
                // Absentia
                if(data['get_cut_date'][i].name == 'absentia'){
                  if(data['get_cut_date'][i].to_date >= data['get_cut_date'][i].currentDate){
                    $('#absentia_date').attr('min' , data['get_cut_date'][i].from_date);
                  }else{
                    $('#absentia_date').attr('min' , data['get_cut_date'][i].new_payroll_start);
                  }
                }

                // Leave
                if(data['get_cut_date'][i].name == 'leave'){
                  if(data['get_cut_date'][i].to_date >= data['get_cut_date'][i].currentDate){
                    $('#leave_from').attr('min' , data['get_cut_date'][i].from_date);
                    $('#leave_to').attr('min' , data['get_cut_date'][i].from_date);
                  }else{
                    $('#leave_from').attr('min' , data['get_cut_date'][i].new_payroll_start);
                    $('#leave_to').attr('min' , data['get_cut_date'][i].new_payroll_start);
                  }
                }

                // Miss Tap
                if(data['get_cut_date'][i].name == 'miss tap'){
                   if(data['get_cut_date'][i].to_date >= data['get_cut_date'][i].currentDate){
                    $('#manual_attendance').attr('min' , data['get_cut_date'][i].from_date);
                  }else{
                    $('#manual_attendance').attr('min' , data['get_cut_date'][i].new_payroll_start);
                  }
                }

                // Penalty
                if(data['get_cut_date'][i].name == 'penalty'){
                  if(data['get_cut_date'][i].to_date >= data['get_cut_date'][i].currentDate){
                    $('#penalty_from').attr('min' , data['get_cut_date'][i].from_date);
                    $('#penalty_to').attr('min' , data['get_cut_date'][i].from_date);
                  }else{
                    $('#penalty_from').attr('min' , data['get_cut_date'][i].new_payroll_start);
                    $('#penalty_to').attr('min' , data['get_cut_date'][i].new_payroll_start);
                  }
                }
              }
             }

             // GET  TIF B ON CLICK EVENT 

             get_Staff_TIFB(staffID);
          
          
             // Daily Attendance Report
             //console.log(data['daily_report_attendance']);
             // if(data['daily_report_attendance'].length > 0){

             //    $('.previous_el_balance').text(data['daily_report_attendance'][0].remaining_leave);
             //    $('.current_el_balance').text('0');
             // }
     
             var activeTab = $.trim($('#staffViewTabs li.active').text());
             $("a[href='#tab_1_1']").attr('data-staff',staffID);

             if(activeTab === 'TIF-B'){
                 get_Staff_TIFB(staffID);
                 $('#tab_1_1').data('staffID',staffID);
             }
             else if(activeTab === 'TIF-A'){
                 get_Staff_TIFA(staffGTID);
             
             }



          },


             
         
 
     // });
    });

      // ================ Weekly Slider ========================//
 //=====================================================//

 var weeklyTapInTapOut = function(tap,connect1,range){
       
       var slider = document.getElementById('weeklySlider');
       slider.noUiSlider.updateOptions({
       start: tap,
       connect:connect1,
       range: {
         'min': parseInt(range[0]),
         'max': parseInt(range[1])
       },
       tooltips: [true, true]

       });

          var connect = slider.querySelectorAll('.noUi-connect');
          var classes = ['green-color'];

          for ( var i = 0; i < connect.length; i++ ) {
              connect[i].classList.add(classes[i]);
          }


 }

 //====================== Actual TapIn And Actual TapOut ==============//
 //===============================================================//

 

    var actualTapInTapOut = function(time,connect1,classes,uihandle,tooltip,range){
         console.log('time_actual_tap'+time);
         console.log('connect1_actual_tap'+connect1)
         console.log('classes_actual_tap'+classes) 
         console.log('uihandle_actual_tap'+uihandle) 

        tapSlider.noUiSlider.destroy();
        var slider = document.getElementById('tapSlider');
        noUiSlider.create(slider,{
          start: time,
          connect: connect1,
          range: {
            'min': parseInt(range[0]),
            'max': parseInt(range[1])
          },
          tooltips:true,
          pips: {
            mode: 'steps',
            //values: [0, 720, 1439],
            filter: function filter(value, type) {
            //  console.log(type, value, value % 60);
              return value % (60 * 2) === 0 ? 1 : value % 60 === 0 ? 2 : 0;
            },
            //density: 2,
            format: {
              to: function to(value) {
                if (value % (60 * 2) === 0) {
                  return moment().startOf('day').add(value, 'minutes').format('HH:mm');
                }
                return '';
              },
              from: function from(value) {
                return value;
              }
            }
          },
          format: {
            to: function to(value) {
              //return value + ',-';
              return moment().startOf('day').add(value, 'minutes').format('HH:mm');
            },
            from: function from(value) {
              return value;
            }
          }

        });
 
          var connect = slider.querySelectorAll('.noUi-connect');
          var anchorhandle = slider.querySelectorAll('.noUi-handle');
          var tool = slider.querySelectorAll('.noUi-tooltip');


       for ( var i = 0; i < connect.length; i++ ) {
           connect[i].classList.add(classes[i]);
       }

       for ( var i = 0; i < anchorhandle.length; i++ ) {
           anchorhandle[i].classList.add(uihandle[i]);
       }

       for ( var i = 0; i < tool.length; i++ ) {
           tool[i].classList.add(tooltip[i]);
       }
    }




          //=============== Absentia Allocated =======================//
    //=======================================================//

    var absentiaAllocatedTap = function(tap,connect,range){
       AiAabsentia.noUiSlider.destroy();
       var  aiAabsentia = document.getElementById('AiAabsentia');
       noUiSlider.create(AiAabsentia, {
       start: tap,
       connect:connect,
       tooltips:true,
       range: {
         'min': parseInt(range[0]),
         'max': parseInt(range[1])
       },
       format: {
             to: function to(value) {
              //return value + ',-';
              return moment().startOf('day').add(value, 'minutes').format('HH:mm');
             },
             from: function from(value) {
              return value;
             }
       }
       });


    }


    //====================== Buffer In Buffer Out ======================//
    //=================================================================//
    

    var bufferInOut = function(tap,connect1,tooltip1,bufferUsed){
       bufferTime.noUiSlider.destroy();
       var buffer = document.getElementById('bufferTime');
          noUiSlider.create(buffer, {
          start: tap,
          tooltips: tooltip1,
          connect:connect1,
          range: {
            'min': 360,
            'max': 1000,
          },
          format: {
             to: function to(value) {
              //return value + ',-';
              return moment().startOf('day').add(value, 'minutes').format('HH:mm');
             },
             from: function from(value) {
              return value;
             }
          }
       });

       var connect = bufferTime.querySelectorAll('.noUi-handle');
       for ( var i = 0; i < connect.length; i++ ) {
           connect[i].classList.add('no-anchor');
       }

                // Minutes Show In ToolTips
       var tool = bufferTime.querySelectorAll('.noUi-tooltip');
       for(var i = 0 ; i < tool.length;i++){
          tool[i].innerHTML = bufferUsed[i]+' min';
       }


    }

    //================= PayRoll Attendance ========================//
    //=============================================================//

    function PayRollAttendanceSlider(payRollAttendanceArray,connectPayRoll,classPayRoll,range){

           if(typeof payrollSlider != undefined){
                payrollSlider.noUiSlider.destroy();
           }
          
          var PayrollSliderCreate1 = document.getElementById('PayrollAttendance');
          noUiSlider.create(PayrollSliderCreate1, {
          start: payRollAttendanceArray,
          tooltips: true,
          connect:connectPayRoll,
          range: {
            'min': parseInt(range[0]),
            'max': parseInt(range[1]),
          },
          format: {
             to: function to(value) {
              //return value + ',-';
              return moment().startOf('day').add(value, 'minutes').format('HH:mm');
             },
             from: function from(value) {
              return value;
             }
          }
       });

       var connect = PayrollSliderCreate1.querySelectorAll('.noUi-connect');

       for ( var i = 0; i < connect.length; i++ ) {
           connect[i].classList.add(classPayRoll[i]);
       }
    }

     var timeToMinute = function(hms){
        var a = hms.split(':'); // split it at the colons

        var minutes = (+a[0]) * 60 + (+a[1]);

        var convert = minutes;

        return convert;
     }


     function timeToMinuteForArray(time){


        //var hms = time;   // your input string
        var min = [];
        console.log(time);
        console.log(time.length);
        for(var i =0 ; i < time.length;i++){
        var a = time[i].split(':'); // split it at the colons

        // Hours are worth 60 minutes.
        var minutes = (+a[0]) * 60 + (+a[1]);

        min.push(minutes);

        }

        console.log(min);

        return min;

     }









    $(document).on("click","#btn_change_password",function() {
        $('#alert_password_error').hide();
        $('#alert_password_success').hide();        

        var cPassword = $('#current_password').val();
        var nPassword = $('#new_password').val();
        var ncPassword = $('#new_cpassword').val();

        var PasswordErrCounter = 0;
        var PasswordErrorMsgs = '';
        var PasswordBR = false;

        if(nPassword.length < 7){
            PasswordErrCounter++;
            PasswordErrorMsgs += PasswordErrCounter + '. Password must contain 7 to 15 characters.';
            PasswordBR = true;
            $("#new_password").focus();
        }

        if(ncPassword != nPassword){
            if(PasswordBR){
                PasswordErrorMsgs = PasswordErrorMsgs + '<br />';
            }
            PasswordErrCounter++;
            PasswordErrorMsgs = PasswordErrorMsgs + PasswordErrCounter + '. Re-type Password is not matched with the New Password';
            PasswordBR = true;
            $("#new_cpassword").focus();
        }


        //PasswordErrCounter = 0;
        if(PasswordErrCounter > 0){
            $('#alert_password_error').show();
            $('#alert_password_error').html(PasswordErrorMsgs);
        }else{
            $.ajax({
                type: "POST",
                url: "{{url('/changePassword')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    old_password: cPassword,
                    new_password: nPassword,
                    password_confirmation: ncPassword
                },
                success: function(data)
                {
                    if(data == "CN"){
                        $('#alert_password_error').hide();
                        $('#alert_password_success').show();
                        $("#current_password").val('');
                        $("#new_password").val('');
                        $("#new_cpassword").val('');
                    }else{
                        $('#alert_password_success').hide();
                        $('#alert_password_error').show();
                        $('#alert_password_error').html(data);
                    }
                }
            });
        }
        
    });

    $(document).on("click","#btn_password_clear",function() {
        $("#current_password").val('');
        $("#new_password").val('');
        $("#new_cpassword").val('');
        $("#current_password").focus();
    });


    $(document).on( 'shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
        var tab = $(this).text();
        if(tab == 'Change Password'){
            $("#current_password").val('');
            $("#new_password").val('');
            $("#new_cpassword").val('');
            $("#current_password").focus();
        }
    });
});
</script>
<!-- END APP LEVEL SCRIPTS -->
