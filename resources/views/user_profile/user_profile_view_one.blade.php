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

<!-- END PAGE TITLE-->
<?php /*
<div class="col-md-12 fixed-height" id="staffView_StaffInfo" style="display: block;">
        <div class="headRightDetails" style="display: none;">
            <table>
                <tbody><tr id="staffView_ProcessorBar"><td class="" style="padding-right:10px;"><img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="15-076" src="assets/photos/hcm/150x150/staff/1014.png" width="42"></td><td class="staffView_StaffName"><a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="MHF" data-staffid="615" data-staffgtid="15-076">Muhammad Faisal</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="m.faisal2">MHF</small><br><small class="shortHeight"><span class="tooltips" data-container="body" data-placement="top" data-original-title="Head, Digital Systems">Digital Infrastructures: Head, Digital Systems</span></small></td></tr>
            </tbody></table><!-- col-md-4 -->
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-6 MobPaddingRight0">
                <div class="profile-sidebar-portlet portlet light fixedHeight3">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="assets/photos/hcm/500x500/staff/1014.jpg" class="img-responsive" alt=""> 
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">Muhammad Faisal</div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                </div><!-- fixedHeight250 -->
            </div><!-- col-md-3 -->
            <div class="col-md-3 paddingRight0 col-xs-6">
                <div class="portlet light fixedHeight3 paddingLeft10 paddingTop0">
                    <div class="margin-top-10 profile-desc-link ">
                        <i class="icon-credit-card tooltips" data-container="body" data-placement="bottom" data-original-title="GT ID"></i>
                        <span class="linkLookalike profile-usertitle-gtid">15-076 (T-CPM)</span>
                    </div><!--  -->
                    <div class="margin-top-10 profile-desc-link ">
                        <i class="icon-envelope tooltips" data-container="body" data-placement="bottom" data-original-title="GU ID"></i>
                        <span class="linkLookalike profile-usertitle-email">m.faisal2</span>
                    </div><!--  -->
                    <div class="margin-top-10 profile-desc-link ">
                        <i class="fa fa-map-marker tooltips" data-container="body" data-placement="bottom" data-original-title="Campus"></i>
                        <span class="linkLookalike profile-usertitle-campus">South</span>
                    </div><!--  -->
                    <div class="margin-top-10 profile-desc-link ">
                        <i class="fa fa-phone-square tooltips" data-container="body" data-placement="bottom" data-original-title="Mobile"></i>
                        <span class="profile-usertitle-mobilePhone linkLookalike">0300-8276434</span>
                    </div><!--  -->
                </div><!-- fixedHeight250 -->
            </div><!-- col-md-3 -->
            <div class="col-md-3 paddingRight0">
                <div class="portlet light fixedHeight3 paddingRight0 paddingLeft10 paddingTop0">
                    <div class="margin-top-10 profile-desc-link pull-left width100">
                        <span class="pull-left width20"><img src="img/designationIcon.png" width="19px" class="tooltips" data-container="body" data-placement="bottom" data-original-title="Bottom Line: Top Line"></span>
                        <span class="pull-left width80 linkLookalike profile-usertitle-bottomline">Digital Infrastructures:<br>Head, Digital Systems<br></span>
                        <span class="pull-left width20">&nbsp;</span>
                        <small class="italicGray tooltips width80 pull-left" data-container="body" data-placement="bottom" data-original-title="Reporting to"><span class="profile-userrole-report-one">→Shoaib Siddiqui</span></small>
                    </div>
                    <div class="margin-top-10 profile-desc-link pull-left">
                        <i class="icon-user-following tooltips" data-container="body" data-placement="bottom" data-original-title="Timing Profile"></i>
                        <span class="linkLookalike profile-user-detail">N/A</span>
                    </div><!--  -->
                    <div class="margin-top-10 profile-desc-link pull-left">
                        <span style="width:22px; text-align:center; float:left;" class="profile-user-attendance"><img style="margin-top: 0px;" src="http://10.10.10.50/gsims/public/metronic/pages/img/OnTimeicon.png" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In Tap In at 06:53 AM" data-original-title="On Time" width="20"></span>
                        <span class="" style="float:left;margin-top:0px;margin-left:4px;font-size: 14px;font-weight: 600;color: #5b9bd1;">  
                            <span class=" tooltips" data-container="body" data-placement="top" data-original-title="10 day status">10</span> | <span class=" tooltips" data-container="body" data-placement="top" data-original-title="60 day status">60</span>
                        </span>
                    </div>
                </div><!-- portlet light -->
            </div><!-- col-md-3 -->
            <div class="col-md-3 paddingRight0 ">
                <div class="portlet light fixedHeight3 paddingLeft10 paddingRight0 paddingTop0">
                    <div class="margin-top-10 profile-desc-link pull-left width100">
                        <div class="flowidth100">
                            <span class="pull-left width20 profile-userrole-role-one-img" style=""><img src="img/role.png" width="19px" class="tooltips" data-container="body" data-placement="bottom" data-original-title="Role 1"></span>
                            <span class="pull-left width80 linkLookalike profile-userrole-role-one">Head Digital Systems</span><br>
                        </div><!-- flowidth100 -->
                        <div class="flowidth100">
                            <span class="pull-left width20">&nbsp;</span>
                            <small class="italicGray tooltips" data-container="body" data-placement="bottom" data-original-title="Reporting to"><span class="pull-left width80 profile-userrole-role-one-report">→Shoaib Siddiqui</span></small>
                        </div><!-- flowidth100 -->
                    </div><!--  profile-desc-link pull-left -->
                    <div class="margin-top-10 profile-desc-link pull-left width100">
                        <div class="flowidth100">
                            <span class="pull-left width20 profile-userrole-role-two-img" style=""><img src="img/role.png" width="19px" class="tooltips" data-container="body" data-placement="bottom" data-original-title="Role 2"></span>
                            <span class="pull-left width80 linkLookalike profile-userrole-role-two">Head Digital Systems </span><br>
                        </div><!-- flowidth100 -->
                        <div class="flowidth100">
                            <span class="pull-left width20">&nbsp;</span>
                            <small class="italicGray tooltips" data-container="body" data-placement="bottom" data-original-title="Reporting to"><span class="pull-left width80 profile-userrole-role-two-report">→Kashif Shamim</span></small>
                        </div><!-- flowidth100 -->
                    </div><!--  profile-desc-link pull-left -->
                    
                </div><!-- portlet light -->
            </div><!-- col-md-3 -->
        </div><!-- row -->




        
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-body padding20">
                        <ul class="nav nav-tabs fullWidthTabs" id="staffViewTabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"> TIF-B </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_2" data-toggle="tab" aria-expanded="false"> TIF-A </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_3" data-toggle="tab" aria-expanded="false"> Attendance </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_4" data-toggle="tab" aria-expanded="false"> Process </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab_1_1">
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs ">
                                        <li class="">
                                            <a href="#tab_basic" data-toggle="tab" aria-expanded="true"> <span aria-hidden="true" class="icon-info"></span> Basics </a>
                                        </li>
                                        <li class="">
                                            <a href="#tab_education" data-toggle="tab" aria-expanded="true"> <span aria-hidden="true" class="icon-graduation"></span> Education </a>
                                        </li>
                                        <li class="">
                                            <a href="#tab_employment" data-toggle="tab" aria-expanded="true"> <span aria-hidden="true" class="icon-briefcase"></span> Employments </a>
                                        </li>
                                        <li class="">
                                            <a href="#tab_parent" data-toggle="tab" aria-expanded="true"> <span aria-hidden="true" class="icon-users"></span> Parent / Spouse </a>
                                        </li>
                                        <li class="">
                                            <a href="#tab_children" data-toggle="tab" aria-expanded="true"> <i class="fa fa-child"></i> Children </a>
                                        </li>
                                        <li class="">
                                            <a href="#tab_alternate" data-toggle="tab" aria-expanded="true"> <i class="fa fa-phone"></i> Alternate Contacts </a>
                                        </li>
                                        <li class="active">
                                            <a href="#tab_other" data-toggle="tab" aria-expanded="true"> <span aria-hidden="true" class="icon-plus"></span> Other </a>
                                        </li>
                                    </ul><!-- nav -->
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab_basic">
                                            <div class="form-body">
                                                <h3 class="form-section marginTop0 headingBorderBottom">Person Info</h3>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Full Name:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-fullName">Muhammad Faisal</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">CNIC:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-nic">42101-1624929-5</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Religion:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-religion">Muslim</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Nationality:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-nationality">PAK</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Gender:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-gender">M</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">DOB <small>(as per NIC)</small>:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-dob">18-Nov-1980</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Marital Status:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-maritalStatus">Married</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                
                                                <h3 class="form-section headingBorderBottom">Contact Info</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Mobile: </label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-mobilePhone">0300-8276434</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Landline:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-landLine">N/A</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Email <small>(personal)</small>:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-personalEmail">mfaisal1pk@hotmail.com</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <h3 class="form-section headingBorderBottom">Address Info</h3>
                                                
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Apartment No:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-apartmentNo">N/A</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Street Name:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-streetName">Block-I</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Building Name:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-buildingName">N/A</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Plot No:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-plotNo">C-157/1</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Region:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-region">North Nazimabad</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Sub Region:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-subRegion">N/A</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                
                                                <h3 class="form-section headingBorderBottom">Official Info</h3>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Name Code:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-nameCode">MHF</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Employment Status:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-empStatus">Permanent</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                
                                            </div><!-- form-body -->
                                        </div><!-- tab_basic -->
                                        <div class="tab-pane" id="tab_education"><h4 class="form-section headingBorderBottom">Others</h4><div class="row"></div><h4 class="form-section headingBorderBottom">Professional</h4><div class="row"></div><h4 class="form-section headingBorderBottom">University</h4><div class="row"></div><h4 class="form-section headingBorderBottom">College</h4><div class="row"></div><h4 class="form-section headingBorderBottom">School</h4><div class="row"></div></div><!-- tab_education -->
                                        <div class="tab-pane" id="tab_employment"></div><!-- tab_employment -->
                                        <div class="tab-pane" id="tab_parent">
                                            <table width="100%" border="0" class="table table-bordered">
                                              <thead class="bg-grey">
                                                  <tr>
                                                    <th class="text-center" width="40%">Father</th>
                                                    <th class="text-center" width="20%">&nbsp;</th>
                                                    <th class="text-center" width="40%">Spouse</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="tab_parent_table"></tbody>
                                            </table>
                                        </div><!-- tab_parent -->
                                        <div class="tab-pane" id="tab_children">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light portlet-fit">
                                                        <div class="portlet-body padding0">
                                                            <div class="mt-element-card mt-element-overlay">
                                                                <div class="row" id="tab_staff_child"></div><!-- row -->
                                                            </div><!-- mt-element-card -->
                                                        </div><!-- portlet-body -->
                                                    </div><!-- portlet -->
                                                </div><!-- col-md-12 -->
                                            </div><!-- row -->
                                        </div><!-- tab_children -->
                                        <div class="tab-pane" id="tab_alternate">
                                            <table width="100%" border="0" class="table table-bordered">
                                              <thead class="bg-grey">
                                                  <tr>
                                                    <th class="text-center" width="40%">Next of Kin</th>
                                                    <th class="text-center" width="20%">&nbsp;</th>
                                                    <th class="text-center" width="40%">Emergency Contact</th>
                                                  </tr>
                                              </thead>
        
                                              <tbody id="tab_alternate_contact"></tbody>
                                            </table>
                                        </div><!-- tab_alternate -->
                                        <div class="tab-pane active" id="tab_other"></div><!-- tab_other -->
                                    </div><!-- tab-content -->
                                </div><!-- tabbable-line -->
                            </div><!-- tab_1_1 -->
                            <div class="tab-pane fade" id="tab_1_2">
                              <div class="RightInformation">
                                  <div class="RightInformation_contentSection" style="padding:0;">
                                      
                                        <div class="summarySection col-md-12">
                                          <div class="col-md-6">
                                              <div class="col-md-6 paddingLeft0">
                                                  <div class="primaryReporting">
                                                        <h4 class="PrimaryName"><span class="namePrimaryCode">SSD</span>Shoaib Siddiqui</h4>
                                                        <h5 class="PrimaryTopLine">Director</h5>
                                                        <h5 class="PrimaryBottomLine">Generation's School</h5>
                                                    </div><!-- primaryReporting -->
                                                </div><!-- col-md-6 -->
                                                <div class="col-md-6 paddingRight0">
                                                  <div class="reportingPersonal">
                                                        <h4 class="PrimaryName"><span class="namePrimaryCode">MHF</span>Muhammad Faisal</h4>
                                                        <h5 class="PrimaryTopLine">Head, Digital Systems</h5>
                                                        <h5 class="PrimaryBottomLine">Digital Infrastructures</h5>
                                                    </div><!-- primaryReporting -->
                                                </div><!-- col-md-6 -->
                                            </div><!-- col-md-6 -->
                                            <div class="col-md-6">
                                              <div class="col-md-6 paddingLeft0 paddingRight0">
                                                  <h6 class="normalFont pull-right"><span class="leftLab3">Fundamental Reportees:</span> <strong> 5 </strong></h6>
                                                    <h6 class="normalFont pull-right"><span class="leftLab3">Primary Reportees:</span> <strong> 5 </strong></h6>
                                                    <h6 class="normalFont pull-right"><span class="leftLab3">Total Reportees:</span> <strong> 6 </strong></h6>
                                                    <h6 class="normalFont pull-right"><span class="leftLab3">Total Members:</span> <strong> 10 </strong></h6>
                                                </div><!-- -->
                                                <div class="col-md-6 paddingLeft0 paddingRight0">
                                                    <h6 class="normalFont pull-right"><span class="leftLab3"> Total Teaching Roles:</span> <strong>0 </strong></h6>
                                                    <h6 class="normalFont pull-right"><span class="leftLab3">Class Role:</span> <strong> - </strong></h6>
                                                    <h6 class="normalFont pull-right"><span class="leftLab3">Total Teaching Blocks:</span> <strong>0 </strong></h6>
                                                    <h6 class="normalFont pull-right"><span class="leftLab3">Total Teaching Students:</span> <strong> 0 </strong></h6>
                                                    <h6 class="normalFont pull-right"><span class="leftLab3">Total Unique Students:</span> <strong> 0 </strong></h6>
                                                    <h6 class="normalFont pull-right"><span class="leftLab3">Total Student Blocks:</span> <strong> 0 </strong></h6>
                                                </div><!-- -->
                                            </div><!-- col-md-6 -->
                                        </div><!-- summarySection -->
                                      <hr style="margin-top: 5px;">
                                        <div class="TimingSection col-md-12">
                                          <div class="col-md-3 paddingLeft0 text-center ">
                                              <h5>Timing Profile &amp; Hours</h5>
                                                <table width="100%" border="0" class="TimingSectionTable">
                                                  <tbody><tr>
                                                    <td colspan="2">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2">Timing Profile</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2"><h4 style="margin:0;font-size:16px;font-weight:bold;">  </h4></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2">Average Weekly Hours</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2"><h4 style="margin:0;font-size:16px;font-weight:bold;">  </h4></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2">&nbsp;</td>
                                                  </tr>
                                                </tbody></table>
                                            </div><!-- col-md-3 -->
                                            <div class="col-md-3 paddingLeft0 text-center">
                                              <h5>Full Time Parameters</h5>
                                                <table width="100%" border="0" class="TimingSectionTable">
                                                  <tbody><tr>
                                                    <td colspan="2">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-left">Standard IN</td>
                                                    <td class="text-right"><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-left">Standard OUT</td>
                                                    <td class="text-right"><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-left">Friday OUT</td>
                                                    <td class="text-right"><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-left">Saturday Hrs</td>
                                                    <td class="text-right"><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2">&nbsp;</td>
                                                  </tr>
                                                </tbody></table>
                                            </div><!-- col-md-3 -->
                                            <div class="col-md-3 paddingLeft0 text-center">
                                              <h5>Secondary Parameters</h5>
                                                <table width="100%" border="0" class="TimingSectionTable">
                                                  <tbody><tr>
                                                    <td colspan="2">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-left">Sats Working</td>
                                                    <td class="text-right"><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-left">Sats Off</td>
                                                    <td class="text-right"><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-left">Ext. Out</td>
                                                    <td class="text-right"><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-left">Ext. FREQ</td>
                                                    <td class="text-right"><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="text-left">July Category</td>
                                                    <td class="text-right"><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2">&nbsp;</td>
                                                  </tr>
                                                </tbody></table>
                                            </div><!-- col-md-3 -->
                                            <div class="col-md-3 paddingLeft0 text-center">
                                              <h5>Custom Timings</h5>
                                                <table width="100%" border="0" class="TimingSectionTable">
                                                  <tbody><tr>
                                                    <td colspan="3">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Mon</td>
                                                    <td><strong>  </strong></td>
                                                    <td><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Tue</td>
                                                    <td><strong>  </strong></td>
                                                    <td><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Wed</td>
                                                    <td><strong>  </strong></td>
                                                    <td><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Thu</td>
                                                    <td><strong>  </strong></td>
                                                    <td><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Fri</td>
                                                    <td><strong>  </strong></td>
                                                    <td><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Sat</td>
                                                    <td><strong>  </strong></td>
                                                    <td><strong>  </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                </tbody></table>

                                            </div><!-- col-md-3 -->
                                        </div><!-- TimingSection -->
                                        <hr style="margin-top: 5px;"><div class="MatrixRolesSection">
                                          <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Matrix Role(s) <small>for Classes and Groups</small></h4>
                                            <div class="col-md-12 paddingBottom40">
                                              <div class="col-md-6 col-md-offset-3 paddingLeft0 paddingRight0"></div><!-- col-md-6 -->
                                            </div><!-- col-md-12 -->
                                            <div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --><div class="col-md-12 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                
                                            </div><!-- col-md-12 --></div><!-- MatrixRolesSection -->
                                        <hr style="margin-top: 5px;">
                                        <div class="orgChartSection">
                                          <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Org Chart Roles(s) <small>for Non-Classroom Roles</small> | Role 1</h4>
                                          <div class="no-padding col-md-10 col-md-offset-1">
                                                <div class="blackSolidBorder">&nbsp;</div>
                                                <div class="graySolidBorder">&nbsp;</div>
                                                <div class="grayDashedBorder">&nbsp;</div>
                                              <div class="col-md-12 ">
                                                  <div class="col-md-6 text-center">
                                                      <table width="100%" border="1" class="secondLevelReporting">
                                                          <tbody><tr>
                                                            <td colspan="3"><h5>PRIMARY GRANDREPORTOO</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40">M-BD-A-01</td>
                                                            <td width="30%">OPQ</td>
                                                            <td width="30%">1</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30">Principal</td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40">GT 90-001</td>
                                                            <td colspan="2">DGS</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30">Ghazala Siddiqui</td>
                                                          </tr>
                                                        </tbody></table>
                                      
                                                    </div><!-- col-md-6 -->
                                                    <div class="col-md-6 text-center">
                                                      <table width="100%" border="1" class="secondLevelReporting">
                                                          <tbody><tr>
                                                            <td colspan="3"><h5>SECONDARY GRANDREPORTOO</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40">M-BD-C-01</td>
                                                            <td width="30%">OPQ</td>
                                                            <td width="30%">4</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30">Director</td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40">GT 90-003</td>
                                                            <td colspan="2">SSD</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30">Shoaib Siddiqui</td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                </div><!-- col-md-12 -->
                                                <div class="col-md-12 paddingTop50">
                                                  <div class="col-md-6 text-center">
                                                      <table width="100%" border="1" class="firstLevelReporting">
                                                          <tbody><tr>
                                                            <td colspan="3"><h5>PRIMARY REPORTOO</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40" bgcolor="#e5d998">M-BD-C-01</td>
                                                            <td width="30%" bgcolor="#ffff00">OPQ</td>
                                                            <td width="30%" bgcolor="#ffff00">2</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30" bgcolor="#e5d998">Director</td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40" bgcolor="#f4ecfd">GT 90-003</td>
                                                            <td colspan="2" bgcolor="#f4ecfd">SSD</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30" bgcolor="#f4ecfd">Shoaib Siddiqui</td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                    <div class="col-md-6 text-center">
                                                      <table width="100%" border="1" class="firstLevelReporting">
                                                          <tbody><tr>
                                                            <td colspan="3"><h5>SECONDARY REPORTOO</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40">M-AD-E-01</td>
                                                            <td width="30%">OPQ</td>
                                                            <td width="30%">5</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30">Senior General Manager</td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40">GT 15-067</td>
                                                            <td colspan="2">KSM</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30">Kashif Shamim</td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                </div><!-- col-md-12 -->
                                                <div class="col-md-12 paddingTop50">
                                                  <div class="col-md-6 col-md-offset-3 text-center" style="background:#e2e2e2;padding:15px;">
                                                      <table width="100%" border="1" bgcolor="#fff" class="firstLevelReporting" style="background:#fff;">
                                                          <tbody><tr>
                                                            <td bgcolor="#ade4f2"><h5 style="color:#;">FR</h5></td>
                                                            <td colspan="2" bgcolor="#ade4f2"><h5>ROLE A</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40" bgcolor="#e5d998">Y-SW-G-01</td>
                                                            <td width="30%" bgcolor="#ffff00">OPQ</td>
                                                            <td width="30%" bgcolor="#ffff00">3</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30" bgcolor="#e5d998">Head, Digital Systems</td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40" bgcolor="#ade4f2">MHF-A</td>
                                                            <td colspan="2" bgcolor="#f4ecfd">Muhammad Faisal</td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                </div><!-- col-md-12 -->
                                                <div class="col-md-12 paddingTop50">
                                                  <div class="col-md-6 col-md-offset-3 text-center" style="background:none;padding:15px;">
                                                      <table width="100%" border="1">
                                                          <tbody><tr>
                                                            <td colspan="2" width="33%" height="90">Fundamental<br>Primary<br><h5><strong>4</strong></h5></td>
                                                            <td colspan="2" width="33%" height="90">Total<br>Primary<br><h5><strong>4</strong></h5></td>
                                                            <td colspan="2" width="33%" height="90">Total<br>Reportee<br><h5><strong>5</strong></h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" width="50%" height="80">Total Staff<br>Members<br><h5><strong>5</strong></h5></td>
                                                            <td colspan="3" width="50%" height="80">Total Student<br>Members<br><h5><strong>0</strong></h5></td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                </div><!-- col-md-12 -->
                                            </div><!-- col-md-12 -->
                                            <hr class="smallHR">
                                              <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                                <div class="col-md-6"><table width="100%" border="1" class="text-center" style="height:70px;color:#000;font-size:12px;">
                                                    <tbody><tr>
                                                      <td width="10%" bgcolor="#f5f5f5">1</td>
                                                      <td width="10%" bgcolor="#f5f5f5">FP</td>
                                                      <td width="40%" bgcolor="#f4ecfd"><strong>Atif Naseem Ahmed</strong></td>
                                                      <td width="20%" bgcolor="#ade4f2">ANA-I</td>
                                                      <td width="20%" bgcolor="#ade4f2"> 0 (0) </td>
                                                    </tr>
                                                    <tr>
                                                      <td bgcolor="#ffff00">OPQ</td><td bgcolor="#ffff00"></td><td bgcolor="#e5d998">Team Lead</td>
                                                      <td colspan="2" bgcolor="#e5d998">Y-SW-J-01</td>
                                                    </tr>
                                                  </tbody></table></div><!-- col-md-6 -->
                                                <div class="col-md-6"><table width="100%" border="1" class="text-center" style="height:70px;color:#000;font-size:12px;">
                                                    <tbody><tr>
                                                      <td width="10%" bgcolor="#f5f5f5">9</td>
                                                      <td width="10%" bgcolor="#f5f5f5">SC</td>
                                                      <td width="40%" bgcolor="#f4ecfd"><strong>Muhammad Saqib</strong></td>
                                                      <td width="20%" bgcolor="#ade4f2">MSQ-A</td>
                                                      <td width="20%" bgcolor="#ade4f2"> 0 (0) </td>
                                                    </tr>
                                                    <tr>
                                                      <td bgcolor="#ffff00">OPQ</td><td bgcolor="#ffff00"></td><td bgcolor="#e5d998">Facilitator</td>
                                                      <td colspan="2" bgcolor="#e5d998">Y-CD-J-03</td>
                                                    </tr>
                                                  </tbody></table></div><!-- col-md-6 -->
                                              </div><!-- col-md-12 -->
                                              <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                                <div class="col-md-6"><table width="100%" border="1" class="text-center" style="height:70px;color:#000;font-size:12px;">
                                                    <tbody><tr>
                                                      <td width="10%" bgcolor="#f5f5f5">2</td>
                                                      <td width="10%" bgcolor="#f5f5f5">FP</td>
                                                      <td width="40%" bgcolor="#f4ecfd"><strong>Kashif Mustafa</strong></td>
                                                      <td width="20%" bgcolor="#ade4f2">KMS-I</td>
                                                      <td width="20%" bgcolor="#ade4f2"> 0 (0) </td>
                                                    </tr>
                                                    <tr>
                                                      <td bgcolor="#ffff00">OPQ</td><td bgcolor="#ffff00"></td><td bgcolor="#e5d998">Software Developer</td>
                                                      <td colspan="2" bgcolor="#e5d998">Y-SW-N-02</td>
                                                    </tr>
                                                  </tbody></table></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                              </div><!-- col-md-12 -->
                                              <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                                <div class="col-md-6"><table width="100%" border="1" class="text-center" style="height:70px;color:#000;font-size:12px;">
                                                    <tbody><tr>
                                                      <td width="10%" bgcolor="#f5f5f5">3</td>
                                                      <td width="10%" bgcolor="#f5f5f5">FP</td>
                                                      <td width="40%" bgcolor="#f4ecfd"><strong>Muhammad Haris Ola</strong></td>
                                                      <td width="20%" bgcolor="#ade4f2">MHO-I</td>
                                                      <td width="20%" bgcolor="#ade4f2"> 0 (0) </td>
                                                    </tr>
                                                    <tr>
                                                      <td bgcolor="#ffff00">OPQ</td><td bgcolor="#ffff00"></td><td bgcolor="#e5d998">Software Developer</td>
                                                      <td colspan="2" bgcolor="#e5d998">Y-SW-N-01</td>
                                                    </tr>
                                                  </tbody></table></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                              </div><!-- col-md-12 -->
                                              <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                                <div class="col-md-6"><table width="100%" border="1" class="text-center" style="height:70px;color:#000;font-size:12px;">
                                                    <tbody><tr>
                                                      <td width="10%" bgcolor="#f5f5f5">4</td>
                                                      <td width="10%" bgcolor="#f5f5f5">FP</td>
                                                      <td width="40%" bgcolor="#f4ecfd"><strong>Rohail Aslam</strong></td>
                                                      <td width="20%" bgcolor="#ade4f2">ROA-I</td>
                                                      <td width="20%" bgcolor="#ade4f2"> 0 (0) </td>
                                                    </tr>
                                                    <tr>
                                                      <td bgcolor="#ffff00">OPQ</td><td bgcolor="#ffff00"></td><td bgcolor="#e5d998">Software Developer</td>
                                                      <td colspan="2" bgcolor="#e5d998">Y-SW-N-03</td>
                                                    </tr>
                                                  </tbody></table></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                              </div><!-- col-md-12 -->
                                              <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                              </div><!-- col-md-12 -->
                                        </div><!-- orgChartSection -->
                                        <hr style="margin-top: 5px;"><div class="orgChartSection">
                                          <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Org Chart Roles(s) <small>for Non-Classroom Roles</small> | Role 2</h4>
                                          <div class="no-padding col-md-10 col-md-offset-1">
                                                <div class="blackSolidBorder">&nbsp;</div>
                                                <div class="graySolidBorder">&nbsp;</div>
                                                <div class="grayDashedBorder">&nbsp;</div>
                                              <div class="col-md-12 ">
                                                  <div class="col-md-6 text-center">
                                                      <table width="100%" border="1" class="secondLevelReporting">
                                                          <tbody><tr>
                                                            <td colspan="3"><h5>PRIMARY GRANDREPORTOO</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40">M-BD-C-01</td>
                                                            <td width="30%">OPQ</td>
                                                            <td width="30%">1</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30">Director</td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40">GT 90-003</td>
                                                            <td colspan="2">SSD</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30">Shoaib Siddiqui</td>
                                                          </tr>
                                                        </tbody></table>
                                      
                                                    </div><!-- col-md-6 -->
                                                    <div class="col-md-6 text-center">
                                                      <table width="100%" border="1" class="secondLevelReporting">
                                                          <tbody><tr>
                                                            <td colspan="3"><h5>SECONDARY GRANDREPORTOO</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40"></td>
                                                            <td width="30%"></td>
                                                            <td width="30%">4</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30"></td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40"></td>
                                                            <td colspan="2"></td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30"></td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                </div><!-- col-md-12 -->
                                                <div class="col-md-12 paddingTop50">
                                                  <div class="col-md-6 text-center">
                                                      <table width="100%" border="1" class="firstLevelReporting">
                                                          <tbody><tr>
                                                            <td colspan="3"><h5>PRIMARY REPORTOO</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40" bgcolor="#e5d998">M-AD-E-01</td>
                                                            <td width="30%" bgcolor="#ffff00">OPQ</td>
                                                            <td width="30%" bgcolor="#ffff00">2</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30" bgcolor="#e5d998">Senior General Manager</td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40" bgcolor="#f4ecfd">GT 15-067</td>
                                                            <td colspan="2" bgcolor="#f4ecfd">KSM</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30" bgcolor="#f4ecfd">Kashif Shamim</td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                    <div class="col-md-6 text-center">
                                                      <table width="100%" border="1" class="firstLevelReporting">
                                                          <tbody><tr>
                                                            <td colspan="3"><h5>SECONDARY REPORTOO</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40"></td>
                                                            <td width="30%"></td>
                                                            <td width="30%">5</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30"></td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40"></td>
                                                            <td colspan="2"></td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30"></td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                </div><!-- col-md-12 -->
                                                <div class="col-md-12 paddingTop50">
                                                  <div class="col-md-6 col-md-offset-3 text-center" style="background:#e2e2e2;padding:15px;">
                                                      <table width="100%" border="1" bgcolor="#fff" class="firstLevelReporting" style="background:#fff;">
                                                          <tbody><tr>
                                                            <td colspan="3" bgcolor=""><h5>ROLE 2</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="30%" height="40" bgcolor="">N-DI-G-01</td>
                                                            <td width="30%" bgcolor="">OPQ</td>
                                                            <td width="30%" bgcolor="">3</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" height="30" bgcolor="">Head, Digital Systems </td>
                                                          </tr>
                                                          <tr>
                                                            <td height="40" bgcolor="">MHF-B</td>
                                                            <td colspan="2" bgcolor="">Muhammad Faisal</td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                </div><!-- col-md-12 -->
                                                <div class="col-md-12 paddingTop50">
                                                  <div class="col-md-6 col-md-offset-3 text-center" style="background:none;padding:15px;">
                                                      <table width="100%" border="1">
                                                          <tbody><tr>
                                                            <td colspan="2" width="33%" height="90">Fundamental<br>Primary<br><h5>1</h5></td>
                                                            <td colspan="2" width="33%" height="90">Total<br>Primary<br><h5>1</h5></td>
                                                            <td colspan="2" width="33%" height="90">Total<br>Reportee<br><h5>1</h5></td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="3" width="50%" height="80">Total Staff<br>Members<br><h5>5</h5></td>
                                                            <td colspan="3" width="50%" height="80">Total Student<br>Members<br><h5>0</h5></td>
                                                          </tr>
                                                        </tbody></table>
                                                    </div><!-- col-md-6 -->
                                                </div><!-- col-md-12 -->
                                            </div><!-- col-md-12 -->
                                            <hr class="smallHR"><div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                              <div class="col-md-6"><table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                                    <tbody><tr>
                                                      <td width="10%" bgcolor="#f5f5f5">1</td>
                                                      <td width="10%" bgcolor="#f5f5f5">FP</td>
                                                      <td width="40%" bgcolor="#f4ecfd"><strong>Syed Asder Ahmed</strong></td>
                                                      <td width="20%" bgcolor="#ade4f2">SAA-A</td>
                                                      <td width="20%" bgcolor="#ade4f2"> 5 (5) </td>
                                                    </tr>
                                                    <tr>
                                                      <td bgcolor="#ffff00">OPQ</td><td bgcolor="#ffff00"></td><td bgcolor="#e5d998">Incharge</td>
                                                      <td colspan="2" bgcolor="#e5d998">N-DI-J-01</td>
                                                    </tr>
                                                  </tbody></table></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                              </div><!-- col-md-12 --><div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                              </div><!-- col-md-12 --><div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                              <div class="col-md-6"></div><!-- col-md-6 -->
                                                <div class="col-md-6"></div><!-- col-md-6 -->
                                              </div><!-- col-md-12 --></div><!-- orgChartSection --></div><!-- .RightInformation_contentSection -->
                              </div><!-- RightInformation -->
                            </div><!-- tab_1_2 -->
                            <div class="tab-pane fade" id="tab_1_3">
                                <h4 class="text-center bold marginTop20"><i class="icon-user-following"></i>&nbsp;&nbsp; Admin/SIS/Tamkeen</h4>
                                <div class="row list-separated profile-stat" style="padding-top:12px;">
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 07:00 AM </div>
                                        <div class="uppercase profile-stat-text"> Standard IN </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 04:00 PM </div>
                                        <div class="uppercase profile-stat-text"> Standard OUT </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 04:00 PM </div>
                                        <div class="uppercase profile-stat-text"> Friday OUT </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 4.5 </div>
                                        <div class="uppercase profile-stat-text"> Saturday Hours </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 2 </div>
                                        <div class="uppercase profile-stat-text"> Off Saturdays </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 4.5 </div>
                                        <div class="uppercase profile-stat-text"> Saturday Hours </div>
                                    </div>
                                </div>
                                <h4 class="text-center marginTop20 bold">For the Month of July</h4>
                                <div class="row list-separated profile-stat" style="padding-top:12px;">
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 2 </div>
                                        <div class="uppercase profile-stat-text"> Late(s) </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 1 </div>
                                        <div class="uppercase profile-stat-text"> Casual Leaves </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 0 </div>
                                        <div class="uppercase profile-stat-text"> Short Leaves </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 1 </div>
                                        <div class="uppercase profile-stat-text"> Half Day </div>
                                    </div>
                                </div>
                                <h4 class="text-center marginTop20 bold">Attendance Policy</h4>
                                <div class="row list-separated profile-stat" style="padding-top:12px;">
                                    <div class="col-md-12">
                                         <div class="contentArea">
                                            <div class="text-center col-md-12"><h4>Regularity &amp; Punctuality</h4></div>
                                            <div class="col-md-12">
                                              <ul class="policyList">
                                                <li>
                                                    <strong>Late</strong>: Late time period = <a nref="#" class="editable">15</a> minutes from time In. Accumulation of <a nref="#" class="editable">4</a> late(s) in a <a nref="#" class="editable">quarter</a> is equivalent to one day ABSENCE
                                                </li>
                                                <li>
                                                    <strong>Short Leave</strong> SL time period = <a href="#" class="editable">2</a> hours from time In or Out. Accumulation of <a nref="#" class="editable">3</a> SL is equivalent to <a nref="#" class="editable">1</a> day ABSENCE
                                                </li>
                                                <li>
                                                    <strong>Half Day</strong>: HD period = More the <a href="#" class="editable">2</a> hours from time In or Out. Half day deduction / half CL will be adjusted.
                                                </li>
                                                <li>In  case of late arrival or absence, staff member needs to inform HR office,  respective Section Head/ HOD prior to <a href="#" class="editable">7:30am</a>.</li>
                                              </ul>
                                            </div>
                                        </div><!-- contentArea -->
                                    </div><!-- -->
                                </div>
                            </div><!-- tab_1_3 -->
                            <div class="tab-pane fade" id="tab_1_4">
                                <div class="portlet box light">
                                    <div class="portlet-body padding0">
                                        <div class="panel-group accordion" id="accordion3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1" aria-expanded="false"> Admission </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_3_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <table width="100%" border="0" class="table bordered accessTable">
                                                          <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th width="10%" class="text-center">Create</th>
                                                                <th width="10%" class="text-center">Read</th>
                                                                <th width="10%" class="text-center">Update</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody><tr>
                                                            <td>Issuance Form</td>
                                                            <td class="text-center"><i class="icon-plus font-green-jungle fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-eye font-green-jungle fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-reload font-green-jungle fontSize20"></i></td>
                                                          </tr>
                                                          <tr>
                                                            <td>Submission Form</td>
                                                            <td class="text-center"><i class="icon-plus font-green-jungle fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-eye font-green-jungle fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-reload font-green-jungle fontSize20"></i></td>
                                                          </tr>
                                                          <tr>
                                                            <td>Followup Form</td>
                                                            <td class="text-center"><i class="icon-plus font-green-jungle fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-eye font-green-jungle fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-reload font-red-thunderbird fontSize20"></i></td>
                                                          </tr>
                                                          <tr>
                                                            <td>AnD Process Form</td>
                                                            <td class="text-center"><i class="icon-plus font-green-jungle fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-eye font-red-thunderbird fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-reload font-red-thunderbird fontSize20"></i></td>
                                                          </tr>
                                                          <tr>
                                                            <td>Admin Authority Form</td>
                                                            <td class="text-center"><i class="icon-plus font-red-thunderbird fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-eye font-red-thunderbird fontSize20"></i></td>
                                                            <td class="text-center"><i class="icon-reload font-red-thunderbird fontSize20"></i></td>
                                                          </tr>
                                                        </tbody></table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2" aria-expanded="false"> HR </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_3_2" class="panel-collapse collapse" aria-expanded="false">
                                                    <div class="panel-body" style="height:200px; overflow-y:auto;">
                                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. </p>
                                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                                        <p>
                                                            <a class="btn blue" href="ui_tabs_accordions_navs.html#collapse_3_2" target="_blank"> Activate this section via URL </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3" aria-expanded="false"> Finance </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_3_3" class="panel-collapse collapse" aria-expanded="false">
                                                    <div class="panel-body">
                                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor. </p>
                                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                                        <p>
                                                            <a class="btn green" href="ui_tabs_accordions_navs.html#collapse_3_3" target="_blank"> Activate this section via URL </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4" aria-expanded="false"> SIS </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_3_4" class="panel-collapse collapse" aria-expanded="false">
                                                    <div class="panel-body">
                                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                            eiusmod. Brunch 3 wolf moon tempor. </p>
                                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                                        <p>
                                                            <a class="btn red" href="ui_tabs_accordions_navs.html#collapse_3_4" target="_blank"> Activate this section via URL </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- tab_1_4 -->
                        </div><!-- tab-content -->
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div>
    */ ?>



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
                                    <a href="#tab_1_2-2" data-toggle="tab">Change Password</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab"> Attendance </a>
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
                            <?php /* 
                            <div class="tab-pane fade active in" id="tab_1_3_1">
                               <h4 class="text-center bold marginTop20"><i class="icon-user-following"></i>&nbsp;&nbsp; Admin/SIS/Tamkeen</h4>
                               <div class="row list-separated profile-stat" style="padding-top:12px;">
                                  <div class="col-md-2 col-sm-2 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 07:00 AM </div>
                                     <div class="uppercase profile-stat-text"> Standard IN </div>
                                  </div>
                                  <div class="col-md-2 col-sm-2 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 04:00 PM </div>
                                     <div class="uppercase profile-stat-text"> Standard OUT </div>
                                  </div>
                                  <div class="col-md-2 col-sm-2 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 04:00 PM </div>
                                     <div class="uppercase profile-stat-text"> Friday OUT </div>
                                  </div>
                                  <div class="col-md-2 col-sm-2 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 4.5 </div>
                                     <div class="uppercase profile-stat-text"> Saturday Hours </div>
                                  </div>
                                  <div class="col-md-2 col-sm-2 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 2 </div>
                                     <div class="uppercase profile-stat-text"> Off Saturdays </div>
                                  </div>
                                  <div class="col-md-2 col-sm-2 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 4.5 </div>
                                     <div class="uppercase profile-stat-text"> Saturday Hours </div>
                                  </div>
                               </div>
                               <h4 class="text-center marginTop20 bold">For the Month of July</h4>
                               <div class="row list-separated profile-stat" style="padding-top:12px;">
                                  <div class="col-md-3 col-sm-3 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 2 </div>
                                     <div class="uppercase profile-stat-text"> Late(s) </div>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 1 </div>
                                     <div class="uppercase profile-stat-text"> Casual Leaves </div>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 0 </div>
                                     <div class="uppercase profile-stat-text"> Short Leaves </div>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-6">
                                     <div class="uppercase profile-stat-title"> 1 </div>
                                     <div class="uppercase profile-stat-text"> Half Day </div>
                                  </div>
                               </div>
                               <h4 class="text-center marginTop20 bold">Attendance Policy</h4>
                               <div class="row list-separated profile-stat" style="padding-top:12px;">
                                  <div class="col-md-12">
                                     <div class="contentArea">
                                        <div class="text-center col-md-12">
                                           <h4>Regularity & Punctuality</h4>
                                        </div>
                                        <div class="col-md-12">
                                           <ul class="policyList">
                                              <li>
                                                 <strong>Late</strong>: Late time period = <a nref="#" class="editable">15</a> minutes from time In. Accumulation of <a nref="#" class="editable">4</a> late(s) in a <a nref="#" class="editable">quarter</a> is equivalent to one day ABSENCE
                                              </li>
                                              <li>
                                                 <strong>Short Leave</strong> SL time period = <a href="#" class="editable">2</a> hours from time In or Out. Accumulation of <a nref="#" class="editable">3</a> SL is equivalent to <a nref="#" class="editable">1</a> day ABSENCE
                                              </li>
                                              <li>
                                                 <strong>Half Day</strong>: HD period = More the <a href="#" class="editable">2</a> hours from time In or Out. Half day deduction / half CL will be adjusted.
                                              </li>
                                              <li>In  case of late arrival or absence, staff member needs to inform HR office,  respective Section Head/ HOD prior to <a href="#" class="editable">7:30am</a>.</li>
                                           </ul>
                                        </div>
                                     </div>
                                     <!-- contentArea -->
                                  </div>
                                  <!-- -->
                               </div>
                            </div>
                            <!-- tab_1_3_1 -->
                            */ ?>
                            <div class="tab-pane fade active in" id="tab_1_3_3">
                              <div class="portlet-body">
                                  
                                    <div class="row">
                                    
                                    <div id="datepaginator"> </div>
                                    
                                        <div class="col-md-12" style="margin-top:20px;">
                                        
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
                      <!-- tabbable-line -->
                   </div>   
                                <!-- END CHANGE AVATAR TAB -->
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
    if ( me.data('staffView_staffInfo_requestRunning') ) {
        return;
    }
    me.data('staffView_staffInfo_requestRunning', true);
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

            // Absentia Response
            if(data['absentia']){

                var absentiaHTML = '';
 
                for(var i=0; i< data['absentia'].length; i++){
                
                absentiaHTML = absentiaHTML + '<tr class="absentia_table_row" id="absentia_table_row_'+data['absentia'][i].Absenia_id+'"><td>'+data['absentia'][i].title +'</td><td>'+data['absentia'][i].date +'</td><td>'+
                  changeTimeFormat(data['absentia'][i].From_time)  +'</td><td>'+changeTimeFormat(data['absentia'][i].to_time) +'</td><td>'+data['absentia'][i].description +'</td><td><a onClick="Edit_Absentia('+data['absentia'][i].Absenia_id +','+data['absentia'][i].Staff_id +')"><i class="fa fa-edit"></i></a> | <a onClick="delete_Absentia('+data['absentia'][i].Absenia_id +','+data['absentia'][i].Staff_id +')"><i class="fa fa-close"></i></a></td></tr>';

                }
          
                $('#absentia_table tbody').html(absentiaHTML);
            }
        },
        /***** Further Requests of AJAX *****/
        complete: function() {
            me.data('staffView_staffInfo_requestRunning', false);
        }
        /***** Stop Further Request of AJAX *****/

    });
}



 var changeTimeFormat = function changeTimeFormat(time){

    time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

    if (time.length > 1) { // If time format correct
     time = time.slice (1);  // Remove full string match value
     time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
     time[0] = +time[0] % 12 || 12; // Adjust hours
    }
    return time.join (''); // return adjusted time or original string

 }





$(document).ready(function() {
    App.init();
    loadajax();
   
   /*************** Attendnance *********************/

   var staffID = {{ $user['info'][0]->id }};


   /*************** End Attendance ******************/




    /***** BEGIN - on Tab Change *****/
    // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    //     var selectedTab = $.trim($(e.target).text()); // activated tab
    //     var GTID = $('.profile-usertitle-gtid').html().substr(0, 6); // getting staff GT-ID

    //     if(selectedTab === 'TIF-A'){

    //         get_Staff_TIFA(GTID);
    //     }if(selectedTab === 'TIF-B'){
    //         var staffID = $('#tab_1_1').data('staffID');
    //         get_Staff_TIFB(staffID);
    //     }
    // });
    /***** END - on Tab Change *****/






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
