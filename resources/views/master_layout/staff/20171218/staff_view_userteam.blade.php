<!-- BEGIN PAGE LEVEL STYLES -->
<style>
/***** BEGIN - Search Result Highlight CSS *****/
span.match{
    background-color:#f8dda9;
    border:1px solid #edd19b;
    margin:-1px;
    color:#390705;
}
/***** END - Search Result Highlight CSS *****/
</style>

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
            <span>Staff List</span>
        </li>
    </ul><!-- page-breadcrumb -->
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div><!-- dashboard-report-range -->
    </div><!-- page-toolbar -->
</div><!-- page-bar -->
<!-- END PAGE BAR -->





<!-- BEGIN PAGE TITLE-->
<?php /* <h1 class="page-title">&nbsp;
</h1>*/ ?>
<!-- END PAGE TITLE-->





<!-- BEGIN USE PROFILE -->
<div class="row marginTop20">
    <div class="col-md-4 borderRightDashed">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered fixed-height-NoScroll marginBottom0">
            <h3 class="headTitle">Staff List</h3>
            <div class="portlet-title">
                <div class="caption caption-md">
                    <h3 id="staffView_StaffList_Total" class="marginTop0 marginBottom0">Staff List</h3>
                </div>
            </div><!-- portlet-title -->
            <div class="portlet-body">
                <div class="inputs">
                    <div class="portlet-input">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input id="staffView_StaffList_Search" type="text" class="form-control form-control-solid" placeholder="Search..."> </div>
                    </div>


                    <div class="theme-panel hidden-xs hidden-sm"  style="right:33px;">
                        <div class="toggler"> </div>
                        <div class="toggler-close"> </div>
                        <div class="theme-options">
                            <div class="theme-option">
                                <span> Profile </span>
                                <select data-attribute="profile" multiple="multiple" id="StaffView_Filter_Profile" class="ddlFilterTableRow layout-option form-control input-sm">
                                    @foreach ($filter['tt_profile'] as $d)
                                    <option value="{{ $d->name }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Department </span>
                                <select data-attribute="department" multiple="multiple" id="StaffView_Filter_Department" class="ddlFilterTableRow layout-option form-control input-sm">
                                    @foreach ($filter['department'] as $d)
                                    <option value="{{ $d->c_bottomline }}">{{ $d->c_bottomline }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Campus </span>
                                <select  data-attribute="campus" multiple="multiple" id="StaffView_Filter_Campus" class="ddlFilterTableRow page-header-option form-control input-sm">
                                    <option value="South">South</option>
                                    <option value="North">North</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Attendance Status </span>
                                <select  data-attribute="attendance" multiple="multiple" id="StaffView_Filter_AtdStd" class="ddlFilterTableRow page-header-option form-control input-sm">
                                    <option value="On Time">On Time</option>
                                    <option value="LATE">Late</option>
                                    <option value="ABSENT">Absent</option>
                                    <option value="HALFDAY">Half Day</option>
                                    <option value="SHORTLEAVE">Short Leave</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Staff Status </span>
                                <select  data-attribute="staff" multiple="multiple" id="StaffView_Filter_StaffStd" class="ddlFilterTableRow page-header-option form-control input-sm">
                                    <option value="s">S</option>
                                    <option value="c">C</option>
                                    <option value="x">X</option>
                                    <option value="f">F</option>
                                </select>
                            </div>
                            <div class="theme-option text-center" id="staffView_filter_btn">
                                <a href="javascript:;" class="btn uppercase green-jungle applyFilter">Apply Filter</a>
                                <a href="javascript:;" class="btn uppercase grey-salsa clearFilter">Clear Filter</a>
                            </div>
                            
                        </div><!-- theme-options -->
                    </div><!-- theme-panel -->


                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="toggler2"> </div>
                        <div class="toggler2-close"> </div>
                        <div class="theme-options2">
                            <div class="theme-option">
                                <span> By Name </span>
                                <select id="StaffView_Sort_Name" class="layout-option form-control input-sm">
                                   <option value="A to Z">Ascending order (A to Z)</option>
                                   <option value="Z to A">Descending order (Z to A)</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> By Department Name </span>
                                <select id="StaffView_Sort_Department" class="layout-option form-control input-sm">
                                   <option value="A to Z">Ascending order (A to Z)</option>
                                   <option value="Z to A">Descending order (Z to A)</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> By Attendance Score</span>
                                <select id="StaffView_Sort_AtdScore" class="page-header-option form-control input-sm">
                                    <option value="H to L">High to Low</option>
                                    <option value="L to H">Low to High</option>
                                </select>
                            </div>
                            <div class="theme-option text-center" id="staffView_sort_btn">
                                <a href="javascript:;" class="btn uppercase green-jungle applySort">Apply Sorters</a>
                                <a href="javascript:;" class="btn uppercase grey-salsa clearSort">Clear Sorters</a>
                            </div>
                            
                        </div><!-- theme-options -->
                    </div>
                    <!-- updated sorter -->



                    <?php /* ?>
                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="sorter"> </div>
                        <div class="sorter-close"> </div>
                        <div class="sorter-options">
                            <div class="theme-option">
                                <span> Profile </span>
                                <select id="StaffView_Filter_Profile" class="layout-option form-control input-sm">
                                    @foreach ($filter['tt_profile'] as $d)
                                    <option value="{{ $d->name }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Department </span>
                                <select id="StaffView_Filter_Department" class="layout-option form-control input-sm">
                                    @foreach ($filter['department'] as $d)
                                    <option value="{{ $d->c_bottomline }}">{{ $d->c_bottomline }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Campus </span>
                                <select id="StaffView_Filter_Campus" class="page-header-option form-control input-sm">
                                    <option value="South">South</option>
                                    <option value="North">North</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Attendance Status </span>
                                <select id="StaffView_Filter_AtdStd" class="page-header-option form-control input-sm">
                                    <option value="OT">On TIme</option>
                                    <option value="LATE">Late</option>
                                    <option value="ABSENT">Absent</option>
                                    <option value="HALFDAY">Half Day</option>
                                    <option value="SHORTLEAVE">Short Leave</option>
                                </select>
                            </div>
                            <div class="theme-option text-center" id="staffView_filter_btn">
                                <a href="javascript:;" class="btn uppercase green-jungle applyFilter">Apply Filter</a>
                                <a href="javascript:;" class="btn uppercase grey-salsa clearFilter">Clear Filter</a>
                            </div>
                            
                        </div><!-- theme-options -->
                    </div><!-- theme-panel -->
                    <?php */ ?>
                </div><!-- inputs -->
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-hover table-light sortable" id="staffView_Table_StaffList">
                        <thead>
                            <tr class="uppercase">
                                <th colspan="2"> Staff </th>
                                <th class="text-center NoShowOnMob" colspan="2"> Atd. Status </th>
                                <th class="text-center ShowOnMob" colspan="2"> Atd. </th>
                            </tr>
                        </thead>
                        
                        <!-- Static Table Row -->
                        <?php /*
                        <tr>
                            <td class="fit">
                                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="16-070" src="http://10.10.10.50/gsims/public/assets/photos/hcm/150x150/staff/1159.png"> </td>
                            <td>
                                <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="MHO">Muhammad Haris Ola</a> - <span class="nameCodeOption tooltips" data-container="body" data-placement="top" data-original-title="h.ola">MHO</span><br />
                                <small class="shortHeight"><span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="T-CPM">T</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">R</span> Front End Developer, Software</small>
                            </td>
                            <td class="text-center" colspan="2"> 
                                <span class="AttStatusNew">
                                    <span class="currentAttStatus"><img style="" src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png"  class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap in awaited" data-original-title="Absent" width="16" /></span>
                                    <span class="tenDayAttStatus">10</span>
                                    <span class="sixtyDayAttStatus">60</span>
                                </span>
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="fit">
                                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="16-070" src="http://10.10.10.50/gsims/public/assets/photos/hcm/150x150/staff/1159.png"> </td>
                            <td>
                                <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="MHO">Muhammad Haris Ola</a> - <span class="nameCodeOption tooltips" data-container="body" data-placement="top" data-original-title="h.ola">MHO</span><br />
                                <small class="shortHeight"><span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="T-CPM">T</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">R</span> Front End Developer, Software</small>
                            </td>
                            <td class="text-center" colspan="2"> 
                                <span style="width:30px; text-align:center; float:left;">
                                <img style="margin-top: 6px;" src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png"  class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap in awaited" data-original-title="Absent" width="25" />
                                </span>
                                <span class="AttStatusNeww">
                                    <span class="tenDayAttStatuss">10</span>
                                    <span class="sixtyDayAttStatuss">60</span>
                                </span>
                            </td>
                            
                        </tr>
                        
                        <tr>
                            <td class="fit">
                                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="16-070" src="http://10.10.10.50/gsims/public/assets/photos/hcm/150x150/staff/1159.png"> </td>
                            <td>
                                <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="MHO">Muhammad Haris Ola</a><br />
                                <small style="float:left;margin-left:20px;" class="shortHeight">Front End Developer, Software</small>
                            </td>
                            <td class="text-center"> <img src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png"  class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap in awaited" data-original-title="Absent" width="25" /> </td>
                            <td class="text-center">
                                <span class="bold theme-font">80%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fit">
                                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="16-070" src="http://10.10.10.50/gsims/public/assets/photos/hcm/150x150/staff/1159.png"> </td>
                            <td>
                                <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="MHO">Muhammad Haris Ola</a><br />
                                <small style="float:left;margin-left:20px;" class="shortHeight">Front End Developer, Software</small>
                            </td>
                            <td class="text-center"> <img src="http://10.10.10.50/gsims/public/metronic/pages/img/HalfDay.png" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In at 12:30 pm" data-original-title="Half Day" width="25" /> </td>
                            <td class="text-center">
                                <span class="bold theme-font">80%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fit">
                                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="16-070" src="http://10.10.10.50/gsims/public/assets/photos/hcm/150x150/staff/1159.png"> </td>
                            <td>
                                <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="MHO">Muhammad Haris Ola</a><br />
                                <small style="float:left;margin-left:20px;" class="shortHeight">Front End Developer, Software</small>
                            </td>
                            <td class="text-center"> <img src="http://10.10.10.50/gsims/public/metronic/pages/img/ShortLeaveIcon.png" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In at 11:59 am" data-original-title="Short Leave" width="25" /> </td>
                            <td class="text-center">
                                <span class="bold theme-font">80%</span>
                            </td>
                        </tr>
                        <!-- End Static Table Row -->
                        */ ?>


                        @foreach ($staff as $data)
                        <tr class="Row" data-attendance="{{ $data['atd_title'] }}"   data-campus="{{ $data['campus'] }}" data-profile="{{ $data['tt_profile_name'] }}" data-department="{{ $data['c_topline'] }}, {{ $data['c_bottomline'] }}">
                            <td class="">
                                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="{{ $data['gt_id'] }}" src="{{ $data['photo150'] }}">
                            </td>
                            <td class="staffView_StaffName">
                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="{{ $data['name_code'] }}" data-staffID="{{ $data['staff_id'] }}" data-staffGTID="{{ $data['gt_id'] }}" data-src="{{url('metronic/pages/img') }}/{{ $data['atd_icon'] }}" data-content="Tap In {{ $data['atd_content'] }}" data-title="{{ $data['atd_title'] }}">{{ $data['abridged_name'] }}</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data['email'] }}">{{ $data['name_code'] }}</small><br />
                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="{{ $data['status_description'] }}">{{ $data['status_name_code'] }}</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">R</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="{{ $data['c_topline'] }}, {{ $data['c_bottomline'] }}">{{ $data['c_bottomline'] }}: {{ $data['c_topline'] }}</span></small>
                            </td>
                            <td class="text-center" colspan="2">
                                <span style="width:30px; text-align:center; float:left;">
                                <img style="margin-top: 6px;" src="{{ url('metronic/pages/img') }}/{{ $data['atd_icon'] }}" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In {{ $data['atd_content'] }}" data-original-title="{{ $data['atd_title'] }}" width="25" />
                                </span>
                                <span class="AttStatusNeww">
                                    <span class="tenDayAttStatuss tooltips" data-container="body" data-placement="top" data-original-title="10 day status">10</span>
                                    <span class="sixtyDayAttStatuss tooltips" data-container="body" data-placement="top" data-original-title="60 day status">60</span>
                                </span>
                                
                            </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data['name_code'] }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data['gt_id'] }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data['tt_profile_name'] }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data['c_bottomline'] }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data['campus'] }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data['atd_title'] }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data['abridged_name'] }} </td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div><!-- table-scrollable-borderless -->
            </div><!-- portlet-body -->
        </div><!-- portlet -->
    </div><!-- col-md-4 -->




    <div class="col-md-8 fixed-height" id="staffView_StaffInfo">
        <div class="headRightDetails">
            <table>
                <tr id="staffView_ProcessorBar">
                    <td class="" style="padding-right:10px;">
                        <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="12-057" src="assets/photos/hcm/150x150/staff/745.png" width="42">
                    </td>
                    <td class="staffView_StaffName">
                        <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="745" data-staffid="295" data-staffgtid="12-057">Abdul Kalam</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="745">745</small><br>
                        <small class="shortHeight"><span class="tooltips" data-container="body" data-placement="top" data-original-title="Peon, South Campus, Operations &amp; Housekeeping">Operations &amp; Housekeeping: Peon, South Campus</span></small>
                    </td>
                </tr>
            </table><!-- col-md-4 -->
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-6 MobPaddingRight0">
                <div class="profile-sidebar-portlet portlet light fixedHeight3">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="" class="img-responsive" alt=""> 
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"></div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                </div><!-- fixedHeight250 -->
            </div><!-- col-md-3 -->
            <div class="col-md-3 paddingRight0 col-xs-6">
                <div class="portlet light fixedHeight3 paddingLeft10 paddingTop0">
                    <div class="margin-top-10 profile-desc-link ">
                        <i class="icon-credit-card tooltips" data-container="body" data-placement="bottom" data-original-title="GT ID"></i>
                        <span class="linkLookalike profile-usertitle-gtid"></span>
                    </div><!--  -->
                    <div class="margin-top-10 profile-desc-link ">
                        <i class="icon-envelope tooltips" data-container="body" data-placement="bottom" data-original-title="GU ID"></i>
                        <span class="linkLookalike profile-usertitle-email"></span>
                    </div><!--  -->
                    <div class="margin-top-10 profile-desc-link ">
                        <i class="fa fa-map-marker tooltips" data-container="body" data-placement="bottom" data-original-title="Campus"></i>
                        <span class="linkLookalike profile-usertitle-campus"> Campus</span>
                    </div><!--  -->
                    <div class="margin-top-10 profile-desc-link ">
                        <i class="fa fa-phone-square tooltips" data-container="body" data-placement="bottom" data-original-title="Mobile"></i>
                        <span class="profile-usertitle-mobilePhone linkLookalike"></span>
                    </div><!--  -->
                </div><!-- fixedHeight250 -->
            </div><!-- col-md-3 -->
            <div class="col-md-3 paddingRight0">
                <div class="portlet light fixedHeight3 paddingRight0 paddingLeft10 paddingTop0">
                    <div class="margin-top-10 profile-desc-link pull-left width100">
                        <span class="pull-left width20"><img src="img/designationIcon.png" width="19px" class="tooltips" data-container="body" data-placement="bottom" data-original-title="Bottom Line: Top Line" /></span>
                        <span class="pull-left width80 linkLookalike profile-usertitle-bottomline"></span>
                        <span class="pull-left width20">&nbsp;</span>
                        <small  class="italicGray tooltips width80 pull-left" data-container="body" data-placement="bottom" data-original-title="Reporting to"><span class="profile-userrole-report-one"></span></small>
                    </div>
                    <div class="margin-top-10 profile-desc-link pull-left">
                        <i class="icon-user-following tooltips" data-container="body" data-placement="bottom" data-original-title="Timing Profile"></i>
                        <span class="linkLookalike profile-user-detail"></span>
                    </div><!--  -->
                    <div class="margin-top-10 profile-desc-link pull-left">
                        <span style="width:22px; text-align:center; float:left;" class="profile-user-attendance">
                        </span>
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
                            <span class="pull-left width20 profile-userrole-role-one-img" style="display:none"><img src="img/role.png" width="19px" class="tooltips" data-container="body" data-placement="bottom" data-original-title="Role 1" /></span>
                            <span class="pull-left width80 linkLookalike profile-userrole-role-one"></span><br />
                        </div><!-- flowidth100 -->
                        <div class="flowidth100">
                            <span class="pull-left width20">&nbsp;</span>
                            <small class="italicGray tooltips" data-container="body" data-placement="bottom" data-original-title="Reporting to"><span class="pull-left width80 profile-userrole-role-one-report"></span></small>
                        </div><!-- flowidth100 -->
                    </div><!--  profile-desc-link pull-left -->
                    <div class="margin-top-10 profile-desc-link pull-left width100">
                        <div class="flowidth100">
                            <span class="pull-left width20 profile-userrole-role-two-img" style="display:none"><img src="img/role.png" width="19px" class="tooltips" data-container="body" data-placement="bottom" data-original-title="Role 2" /></span>
                            <span class="pull-left width80 linkLookalike profile-userrole-role-two"></span><br />
                        </div><!-- flowidth100 -->
                        <div class="flowidth100">
                            <span class="pull-left width20">&nbsp;</span>
                            <small class="italicGray tooltips" data-container="body" data-placement="bottom" data-original-title="Reporting to"><span class="pull-left width80 profile-userrole-role-two-report"></span></small>
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
                                <a href="#tab_1_1" data-toggle="tab"> TIF-B </a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab"> TIF-A </a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab"> Attendance </a>
                            </li>
                            <li>
                                <a href="#tab_1_4" data-toggle="tab"> Process </a>
                            </li>
							 <li>
								<a href="#tab_1_6" data-toggle="tab" id="rolesRelation" class="rolesRelation"> Relationships </a>
							 </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab_1_1">
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs ">
                                        <li class="active">
                                            <a href="#tab_basic" data-toggle="tab"> <span aria-hidden="true" class="icon-info"></span> Basics </a>
                                        </li>
                                        <li>
                                            <a href="#tab_education" data-toggle="tab"> <span aria-hidden="true" class="icon-graduation"></span> Education </a>
                                        </li>
                                        <li>
                                            <a href="#tab_employment" data-toggle="tab"> <span aria-hidden="true" class="icon-briefcase"></span> Employments </a>
                                        </li>
                                        <li class="">
                                            <a href="#tab_parent" data-toggle="tab"> <span aria-hidden="true" class="icon-users"></span> Parent / Spouse </a>
                                        </li>
                                        <li>
                                            <a href="#tab_children" data-toggle="tab"> <i class="fa fa-child"></i> Children </a>
                                        </li>
                                        <li>
                                            <a href="#tab_alternate" data-toggle="tab"> <i class="fa fa-phone"></i> Alternate Contacts </a>
                                        </li>
                                        <li>
                                            <a href="#tab_other" data-toggle="tab"> <span aria-hidden="true" class="icon-plus"></span> Other </a>
                                        </li>
                                    </ul><!-- nav -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_basic">
                                            <div class="form-body">
                                                <h3 class="form-section marginTop0 headingBorderBottom">Person Info</h3>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Full Name:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-fullName"> Afsar Ilyas </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">CNIC:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-nic"> 42501-4559651-3 </p>
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
                                                                <p class="form-control-static bold tifb-basics-religion"> Islam </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Nationality:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-nationality"> PAK </p>
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
                                                                <p class="form-control-static bold tifb-basics-gender"> Male: </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">DOB <small>(as per NIC)</small>:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-dob"> 23 Feb 1977 </p>
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
                                                                <p class="form-control-static bold tifb-basics-maritalStatus"> Single </p>
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
                                                                <p class="form-control-static bold tifb-basics-mobilePhone"> 0332-2536406 </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Landline:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-landLine"> 021-34615130 </p>
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
                                                                <p class="form-control-static bold tifb-basics-personalEmail"> harisola@gmail.com </p>
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
                                                                <p class="form-control-static bold tifb-basics-apartmentNo"> - </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Street Name:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-streetName"> - </p>
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
                                                                <p class="form-control-static bold tifb-basics-buildingName"> - </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Plot No:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-plotNo"> E-33/1 </p>
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
                                                                <p class="form-control-static bold tifb-basics-region"> Nazimabad </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Sub Region:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-subRegion"> Block 7 </p>
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
                                                                <p class="form-control-static bold tifb-basics-nameCode"> Single </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5 text-right paddingRight0">Employment Status:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold tifb-basics-empStatus"> 0 </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                
                                            </div><!-- form-body -->
                                        </div><!-- tab_basic -->
                                        <div class="tab-pane" id="tab_education">
                                            <h4 class="form-section headingBorderBottom">Others</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered lowPadding">
                                                            <div class="portlet-body">
                                                                <div class="col-md-3 padding0">
                                                                    <img src="http://10.10.10.50/gsims/public/metronic/pages/img/schoolIcon.jpg" class="SchoolPlaceHolder" />
                                                                </div><!-- col-md-3 -->
                                                                <div class="col-md-9 paddingRight0">
                                                                    <h5 class=" marginBottom0"><strong>Skill Development Council</strong></h5>
                                                                    <h5 class="font-grey-cascade"><strong>Certification</strong>, HRM</h5>
                                                                    <div class="col-md-6 padding0">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-graduation"></span>&nbsp;&nbsp;&nbsp;1st Division</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-calendar"></span>&nbsp;&nbsp;&nbsp;2010</h5>
                                                                    </div>
                                                                </div><!-- col-md-9 -->
                                                            </div><!-- portlet-body -->
                                                        </div><!-- portlet -->
                                                    </div><!-- col-md-6 -->
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered lowPadding">
                                                            <div class="portlet-body">
                                                                <div class="col-md-3 padding0">
                                                                    <img src="http://10.10.10.50/gsims/public/metronic/pages/img/schoolIcon.jpg" class="SchoolPlaceHolder" />
                                                                </div><!-- col-md-3 -->
                                                                <div class="col-md-9 paddingRight0">
                                                                    <h5 class=" marginBottom0"><strong>Skill Development Council</strong></h5>
                                                                    <h5 class="font-grey-cascade"><strong>Certification</strong>, Essentials of Management</h5>
                                                                    <div class="col-md-6 padding0">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-graduation"></span>&nbsp;&nbsp;&nbsp;1st Division</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-calendar"></span>&nbsp;&nbsp;&nbsp;2011</h5>
                                                                    </div>
                                                                </div><!-- col-md-9 -->
                                                            </div><!-- portlet-body -->
                                                        </div><!-- portlet -->
                                                    </div><!-- col-md-6 -->
                                                </div><!-- row -->
                                            <h4 class="form-section headingBorderBottom">Professional</h4>
                                                
                                            <h4 class="form-section headingBorderBottom">University</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered lowPadding">
                                                            <div class="portlet-body">
                                                                <div class="col-md-3 padding0">
                                                                    <img src="http://10.10.10.50/gsims/public/metronic/pages/img/uoklogo.png" class="SchoolPlaceHolder" />
                                                                </div><!-- col-md-3 -->
                                                                <div class="col-md-9 paddingRight0">
                                                                    <h5 class=" marginBottom0"><strong>University of Karachi</strong></h5>
                                                                    <h5 class="font-grey-cascade"><strong>M.P.A</strong>, Public Administration</h5>
                                                                    <div class="col-md-6 padding0">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-graduation"></span>&nbsp;&nbsp;&nbsp;2nd Division</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-calendar"></span>&nbsp;&nbsp;&nbsp;2001</h5>
                                                                    </div>
                                                                </div><!-- col-md-9 -->
                                                            </div><!-- portlet-body -->
                                                        </div><!-- portlet -->
                                                    </div><!-- col-md-6 -->
                                                </div><!-- row -->
                                            <h4 class="form-section headingBorderBottom">College</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered lowPadding">
                                                            <div class="portlet-body">
                                                                <div class="col-md-3 padding0">
                                                                    <img src="http://10.10.10.50/gsims/public/metronic/pages/img/schoolIcon.jpg" class="SchoolPlaceHolder" />
                                                                </div><!-- col-md-3 -->
                                                                <div class="col-md-9 paddingRight0">
                                                                    <h5 class=" marginBottom0"><strong>P.A.F (Faisal Base)</strong></h5>
                                                                    <h5 class="font-grey-cascade"><strong>B.Sc</strong>, Computer Science, Economics & Maths</h5>
                                                                    <div class="col-md-6 padding0">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-graduation"></span>&nbsp;&nbsp;&nbsp;2nd Division</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-calendar"></span>&nbsp;&nbsp;&nbsp;1997</h5>
                                                                    </div>
                                                                </div><!-- col-md-9 -->
                                                            </div><!-- portlet-body -->
                                                        </div><!-- portlet -->
                                                    </div><!-- col-md-6 -->
                                                </div><!-- row -->
                                            <h4 class="form-section headingBorderBottom">School</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="portlet light bordered lowPadding">
                                                            <div class="portlet-body">
                                                                <div class="col-md-3 padding0">
                                                                    <img src="http://10.10.10.50/gsims/public/metronic/pages/img/schoolIcon.jpg" class="SchoolPlaceHolder" />
                                                                </div><!-- col-md-3 -->
                                                                <div class="col-md-9 paddingRight0">
                                                                    <h5 class=" marginBottom0"><strong>National High School</strong></h5>
                                                                    <h5 class="font-grey-cascade"><strong>Matric</strong>, Science</h5>
                                                                    <div class="col-md-6 padding0">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-graduation"></span>&nbsp;&nbsp;&nbsp;1st Division</h5>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-calendar"></span>&nbsp;&nbsp;&nbsp;1991</h5>
                                                                    </div>
                                                                </div><!-- col-md-9 -->
                                                            </div><!-- portlet-body -->
                                                        </div><!-- portlet -->
                                                    </div><!-- col-md-6 -->
                                                </div><!-- row -->
                                            <?php /* ?>
                                            <table width="100%" border="0" class="table table-bordered">
                                                <thead class="bg-grey">
                                                    <tr>
                                                        <th class="" width="40%">Institute</th>
                                                        <th width="20%">Subjects</th>
                                                        <th width="20%">Qualification</th>
                                                        <th width="10%">Result</th>
                                                        <th width="10%">Year of<br>Completion</th>
                                                    </tr>
                                                </thead><!-- thead -->
                                                <tbody>
                                                    <tr class="bBottomD">
                                                        <td colspan="5" class=""><strong>School</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>National High School</td>
                                                        <td>Science</td>
                                                        <td>Matric</td>
                                                        <td>Ist-Div</td>
                                                        <td>1992</td>
                                                    </tr>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr class="bBottomD">
                                                        <td colspan="5" class=""><strong>College</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>P.A.F (Faisl Base)</td>
                                                        <td>Computer Science, Economics &amp; Maths</td>
                                                        <td>B.Sc.</td>
                                                        <td>IInd-Div</td>
                                                        <td>1997</td>
                                                    </tr>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr class="bBottomD">
                                                        <td colspan="5" class=""><strong>University</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>University of Karachi  UoK  Karachi</td>
                                                        <td>Public Administration</td>
                                                        <td>M.P.A</td>
                                                        <td>IInd-Div</td>
                                                        <td>2001</td>
                                                    </tr>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr class="bBottomD">
                                                        <td colspan="5" class=""><strong>Professional</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr class="bBottomD">
                                                        <td colspan="5" class=""><strong>Others</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Skill Development Council</td>
                                                        <td>HRM</td>
                                                        <td>Certification</td>
                                                        <td>Ist-Div</td>
                                                        <td>2010</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Skill Development Council</td>
                                                        <td>Essentials of Management</td>
                                                        <td>Certification</td>
                                                        <td>Ist-Div</td>
                                                        <td>2011</td>
                                                    </tr>
                                                </tbody><!-- tbody -->
                                            </table><!-- tale -->
                                            <?php */ ?>
                                        </div><!-- tab_education -->
                                        <div class="tab-pane" id="tab_employment">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light lowPadding2 onlyBorderBottom marginBottom0">
                                                        <div class="portlet-body">
                                                            <div class="col-md-1 padding0">
                                                                <img src="http://10.10.10.50/gsims/public/metronic/pages/img/aflogo.jpg" class="SchoolPlaceHolder" />
                                                            </div><!-- col-md-3 -->
                                                            <div class="col-md-11 paddingRight0">
                                                                <h5 class=" marginBottom0 font-grey-mint marginTop0"><strong>IT Business Analyst</strong> at <strong>Assessment Fund</strong></h5>
                                                                <h5 class="font-grey-salsa marginBottom4">
                                                                    <span class="positionDetail"><i class="fa fa-money tooltips" data-container="body" data-placement="top" data-original-title="Sallary"></i> <strong>10,000</strong></span>
                                                                    <span class="positionDetail"><i class="fa fa-calendar tooltips" data-container="body" data-placement="top" data-original-title="Tenure"></i> <strong>2001</strong> to <strong>2005</strong></span>
                                                                    <span class="positionDetail"><img src="http://10.10.10.50/gsims/public/metronic/pages/img/blackboard.png" width="20" class="tooltips" data-container="body" data-placement="top" data-original-title="Classes Taught" /> <strong>10,000</strong></span>
                                                                    <span class="positionDetail"><i class="icon-book-open tooltips" data-container="body" data-placement="top" data-original-title="Subjects Taught"></i> <strong>Islamiat, Islamiat English, Urdu</strong></span>
                                                                </h5>
                                                                <p class="font-grey-salsa marginBottom0">Reason for Leaving: <span class="font-grey-mint">Lorem Ipsum dolor sit amet, Lorem Ipsum dolor sit amet Lorem Ipsum dolor</span> </p>
                                                            </div><!-- col-md-9 -->
                                                        </div><!-- portlet-body -->
                                                    </div><!-- portlet -->
                                                </div><!-- col-md-6 -->
                                            </div><!-- row -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light lowPadding2 onlyBorderBottom marginBottom0">
                                                        <div class="portlet-body">
                                                            <div class="col-md-1 padding0">
                                                                <img src="http://10.10.10.50/gsims/public/metronic/pages/img/BriefacaseIcon.jpg" class="SchoolPlaceHolder" />
                                                            </div><!-- col-md-3 -->
                                                            <div class="col-md-11 paddingRight0">
                                                                <h5 class=" marginBottom0 font-grey-mint marginTop0">Formerly worked at <strong>HireLabs</strong> on the position of <strong>UI/UX Lead</strong></h5>
                                                                <h5 class="font-grey-salsa marginBottom4">
                                                                    <span class="positionDetail"><i class="fa fa-money tooltips" data-container="body" data-placement="top" data-original-title="Sallary"></i> <strong>10,000</strong></span>
                                                                    <span class="positionDetail"><i class="fa fa-calendar tooltips" data-container="body" data-placement="top" data-original-title="Tenure"></i> <strong>2001</strong> to <strong>2005</strong></span>
                                                                    <span class="positionDetail"><img src="http://10.10.10.50/gsims/public/metronic/pages/img/blackboard.png" width="20" class="tooltips" data-container="body" data-placement="top" data-original-title="Classes Taught" /> <strong>I, II, III </strong></span>
                                                                    <span class="positionDetail"><i class="icon-book-open tooltips" data-container="body" data-placement="top" data-original-title="Subjects Taught"></i> <strong>Islamiat, Islamiat English, Urdu</strong></span>
                                                                </h5>
                                                                <p class="font-grey-salsa marginBottom0">Reason for Leaving: <span class="font-grey-mint">-</span> </p>
                                                            </div><!-- col-md-9 -->
                                                        </div><!-- portlet-body -->
                                                    </div><!-- portlet -->
                                                </div><!-- col-md-6 -->
                                            </div><!-- row -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light lowPadding2 marginBottom0">
                                                        <div class="portlet-body">
                                                            <div class="col-md-1 padding0">
                                                                <img src="http://10.10.10.50/gsims/public/metronic/pages/img/BriefacaseIcon.jpg" class="SchoolPlaceHolder" />
                                                            </div><!-- col-md-3 -->
                                                            <div class="col-md-11 paddingRight0">
                                                                <h5 class=" marginBottom0 font-grey-mint marginTop0">Web Developer at <strong>TechiBits</strong></h5>
                                                                <h5 class="font-grey-salsa marginBottom4">
                                                                    <span class="positionDetail"><i class="fa fa-money tooltips" data-container="body" data-placement="top" data-original-title="Sallary"></i> <strong>10,000</strong></span>
                                                                    <span class="positionDetail"><i class="fa fa-calendar tooltips" data-container="body" data-placement="top" data-original-title="Tenure"></i> <strong>2001</strong> to <strong>2005</strong></span>
                                                                    <span class="positionDetail"><img src="http://10.10.10.50/gsims/public/metronic/pages/img/blackboard.png" width="20" class="tooltips" data-container="body" data-placement="top" data-original-title="Classes Taught" /> <strong>10,000</strong></span>
                                                                    <span class="positionDetail"><i class="icon-book-open tooltips" data-container="body" data-placement="top" data-original-title="Subjects Taught"></i> <strong>Islamiat, Islamiat English, Urdu</strong></span>
                                                                </h5>
                                                                <p class="font-grey-salsa marginBottom0">Reason for Leaving: <span class="font-grey-mint">Personal Growth</span> </p>
                                                            </div><!-- col-md-9 -->
                                                        </div><!-- portlet-body -->
                                                    </div><!-- portlet -->
                                                </div><!-- col-md-6 -->
                                            </div><!-- row -->
                                            <!-- 
                                            <table width="100%" border="0" class="table table-bordered">
                                                <thead class="bg-grey">
                                                    <tr>
                                                        <th class="">Institution</th>
                                                        <th>Designation</th>
                                                        <th>Class(s)<br>taught</th>
                                                        <th>Subject(s)<br>taught</th>
                                                        <th>Salary</th>
                                                        <th>From<br><small>(year)</small></th>
                                                        <th>To<br><small>(year)</small></th>
                                                        <th>Reasons for Leaving</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Mobilink GSM (POS)</td>
                                                        <td>Proprietor</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>100000</td>
                                                        <td>2001</td>
                                                        <td>2009</td>
                                                        <td>Security Reasons....</td>
                                                    </tr>        
                                                </tbody>
                                            </table>
                                            -->
                                        </div><!-- tab_employment -->
                                        <div class="tab-pane " id="tab_parent">
                                            <table width="100%" border="0" class="table table-bordered">
                                              <thead class="bg-grey">
                                                  <tr>
                                                    <th class="text-center" width="40%">Father</th>
                                                    <th class="text-center" width="20%">&nbsp;</th>
                                                    <th class="text-center" width="40%">Spouse</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="tab_parent_table">
                                                  <tr>
                                                    <td class="">Ilyas Ahmed Khan (Late)</td>
                                                    <td class="text-center"><strong>Name</strong></td>
                                                    <td class="">Sana Afsar</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Bureaucrats</td>
                                                    <td class="text-center"><strong>Profession</strong></td>
                                                    <td>Housewife</td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td class="text-center"><strong>Qualification</strong></td>
                                                    <td>Bachelors</td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td class="text-center"><strong>Designation</strong></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td class="text-center"><strong>Department</strong></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td class="text-center"><strong>Organisation</strong></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td class="text-center"><strong>CNIC</strong></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td class="text-center"><strong>Mobile</strong></td>
                                                    <td>0300-2333365</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td class="text-center"><strong>Address</strong></td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                              </tbody>
                                            </table>
                                        </div><!-- tab_parent -->
                                        <div class="tab-pane" id="tab_children">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light portlet-fit">
                                                        <div class="portlet-body padding0">
                                                            <div class="mt-element-card mt-element-overlay">
                                                                <div class="row" id="tab_staff_child">
                                                                    <div class="col-md-3">
                                                                        <div class="mt-card-item">
                                                                            <div class="mt-card-avatar mt-overlay-4">
                                                                                <img src="http://10.10.10.50/gsims/public/assets/photos/sis/500x500/student/2416.jpg" />
                                                                                <div class="mt-overlay">
                                                                                    <h2>11-C <span class="font-yellow-lemon">(Jinnah)</span></h2>
                                                                                    <div class="mt-info font-white">
                                                                                        <div class="mt-card-content">
                                                                                            <p class="mt-card-desc font-white">GF-ID: <strong>16-249</strong> (1/3)</p>
                                                                                            <div class="mt-card-social">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div><!-- mt-overlay -->
                                                                            </div><!-- mt-card-avatar -->
                                                                            <div class="mt-card-content">
                                                                                <h3 class="mt-card-name">Suleman Atif</h3>
                                                                                <p class="mt-card-desc font-grey-mint">GS-ID: <strong>10-102</strong> (S-CFS)</p>
                                                                            </div><!-- mt-card-content -->
                                                                        </div><!-- mt-card-item -->
                                                                    </div><!-- col-md-3 -->
                                                                    <div class="col-md-3">
                                                                        <div class="mt-card-item alumni">
                                                                            <div class="mt-card-avatar mt-overlay-4">
                                                                                <img src="http://10.10.10.50/gsims/public/assets/photos/sis/500x500/student/494.jpg" />
                                                                                <div class="mt-overlay">
                                                                                    <h2>Alumni</h2>
                                                                                    <div class="mt-info font-white">
                                                                                        <div class="mt-card-content">
                                                                                            <p class="mt-card-desc font-white">GF-ID: <strong>02-596</strong> (2/3)</p>
                                                                                            <div class="mt-card-social">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div><!-- mt-overlay -->
                                                                            </div><!-- mt-card-avatar -->
                                                                            <div class="mt-card-content">
                                                                                <h3 class="mt-card-name">Mushtaq Atif</h3>
                                                                                <p class="mt-card-desc font-grey-mint">GS-ID: <strong>10-102</strong> (A-GRD)</p>
                                                                            </div><!-- mt-card-content -->
                                                                        </div><!-- mt-card-item -->
                                                                    </div><!-- col-md-3 -->
                                                                    <div class="col-md-3">
                                                                        <div class="mt-card-item">
                                                                            <div class="mt-card-avatar mt-overlay-4">
                                                                                <img src="http://10.10.10.50/gsims/public/assets/photos/sis/500x500/student/2416.jpg" />
                                                                                <div class="mt-overlay">
                                                                                    <h2>11-C <span class="font-yellow-lemon">(Jinnah)</span></h2>
                                                                                    <div class="mt-info font-white">
                                                                                        <div class="mt-card-content">
                                                                                            <p class="mt-card-desc font-white">GF-ID: <strong>16-249</strong> (1/3)</p>
                                                                                            <div class="mt-card-social">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div><!-- mt-overlay -->
                                                                            </div><!-- mt-card-avatar -->
                                                                            <div class="mt-card-content">
                                                                                <h3 class="mt-card-name">Suleman Atif</h3>
                                                                                <p class="mt-card-desc font-grey-mint">GS-ID: <strong>10-102</strong> (S-CFS)</p>
                                                                            </div><!-- mt-card-content -->
                                                                        </div><!-- mt-card-item -->
                                                                    </div><!-- col-md-3 -->
                                                                    <div class="col-md-3">
                                                                        <div class="mt-card-item">
                                                                            <div class="mt-card-avatar mt-overlay-4">
                                                                                <img src="http://10.10.10.50/gsims/public/assets/photos/sis/500x500/student/494.jpg" />
                                                                                <div class="mt-overlay">
                                                                                    <h2>Alumni</h2>
                                                                                    <div class="mt-info font-white">
                                                                                        <div class="mt-card-content">
                                                                                            <p class="mt-card-desc font-white">GF-ID: <strong>02-596</strong> (2/3)</p>
                                                                                            <div class="mt-card-social">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div><!-- mt-overlay -->
                                                                            </div><!-- mt-card-avatar -->
                                                                            <div class="mt-card-content">
                                                                                <h3 class="mt-card-name">Mushtaq Atif</h3>
                                                                                <p class="mt-card-desc font-grey-mint">GS-ID: <strong>10-102</strong> (A-GRD)</p>
                                                                            </div><!-- mt-card-content -->
                                                                        </div><!-- mt-card-item -->
                                                                    </div><!-- col-md-3 -->
                                                                </div><!-- row -->
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
        
                                              <tbody id="tab_alternate_contact">
                                                  <tr>
                                                    <td>Mrs Farida Ilyas</td>
                                                    <td class="text-center"><strong>Name</strong></td>
                                                    <td>Dr Altaf Ahmed</td>
                                                  </tr>
                                                  <tr>
                                                    <td>E-33/1, Block-7, Gulshan-e-Iqbal, Karachi</td>
                                                    <td class="text-center"><strong>Address</strong></td>
                                                    <td>A- , Block-2, Gulshan-e-Iqbal, Karachi</td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td class="text-center"><strong>Email</strong></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <td>0300-8226220</td>
                                                    <td class="text-center"><strong>Mobile</strong></td>
                                                    <td>0300-8291947</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Mother</td>
                                                    <td class="text-center"><strong>Relationship</strong></td>
                                                    <td>Brother-in-Law</td>
                                                  </tr>
                                              </tbody>
                                            </table>
                                        </div><!-- tab_alternate -->
                                        <div class="tab-pane" id="tab_other">
                                            <div class="form-body">
                                                <h3 class="form-section marginTop0 headingBorderBottom">Other Details</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Provident Fund :</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> No </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">NTN:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> 42501-4559651-3 </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">EOBI/SESSI number: </label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> 0100H477722 </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                
                                                <h3 class="form-section headingBorderBottom">Bank Details</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Bank Name : </label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> Meezan Bank </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Branch :</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> Block-F, North Nazimabad </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Account Number :</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> 0001-3101-0026-0704 </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <h3 class="form-section headingBorderBottom">Takaful</h3>
                                                
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Self :</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> Yes </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Spouse :</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> Yes </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Children :</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> Yes </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Certificate :</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static bold"> - </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                            </div><!-- form-body -->
                                        </div><!-- tab_other -->
                                    </div><!-- tab-content -->
                                </div><!-- tabbable-line -->
                            </div><!-- tab_1_1 -->
                            <div class="tab-pane fade" id="tab_1_2">
                                <div class="summarySection col-md-12">
                                    <div class="col-md-6 paddingRight0">
                                        <div class="col-md-6 paddingLeft0">
                                            <div class="primaryReporting">
                                                <h4 class="PrimaryName"><span class="namePrimaryCode">KNN</span>Khadija Noorani</h4>
                                                <h5 class="PrimaryTopLine">Vice Principal</h5>
                                                <h5 class="PrimaryBottomLine">Starter & Junior Section</h5>
                                            </div><!-- primaryReporting -->
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6 paddingRight0">
                                            <div class="reportingPersonal">
                                                <h4 class="PrimaryName"><span class="namePrimaryCode">SSD</span>Shoaib Siddiqui</h4>
                                                <h5 class="PrimaryTopLine">Coordinator, Academics</h5>
                                                <h5 class="PrimaryBottomLine">Starter Section</h5>
                                            </div><!-- primaryReporting -->
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="col-md-6 paddingLeft0 paddingRight0">
                                            <h6 class="normalFont pull-right"><span class="leftLab3">Fundamental Reportees:</span> <strong>2</strong></h6>
                                            <h6 class="normalFont pull-right"><span class="leftLab3">Primary Reportees:</span> <strong>4</strong></h6>
                                            <h6 class="normalFont pull-right"><span class="leftLab3">Total Reportees:</span> <strong>5</strong></h6>
                                            <h6 class="normalFont pull-right"><span class="leftLab3">Total Members:</span> <strong>6</strong></h6>
                                        </div><!-- -->
                                        <div class="col-md-6 paddingLeft0 paddingRight0">
                                            <h6 class="normalFont pull-right"><span class="leftLab3">Class Role:</span> <strong>06-070</strong></h6>
                                            <h6 class="normalFont pull-right"><span class="leftLab3"> Total Teaching Roles:</span> <strong>06-070</strong></h6>
                                            <h6 class="normalFont pull-right"><span class="leftLab3">Total Teaching Blocks:</span> <strong>06-070</strong></h6>
                                            <h6 class="normalFont pull-right"><span class="leftLab3">Total Teaching Students:</span> <strong>06-070</strong></h6>
                                            <h6 class="normalFont pull-right"><span class="leftLab3">Total Unique Students:</span> <strong>06-070</strong></h6>
                                            <h6 class="normalFont pull-right"><span class="leftLab3">Total Student Blocks:</span> <strong>06-070</strong></h6>
                                        </div><!-- -->
                                    </div><!-- col-md-6 -->
                                </div><!-- summarySection -->
                                <hr style="margin-top: 5px;" />
                                <div class="TimingSection col-md-12">
                                    <div class="col-md-3 paddingLeft0 text-center ">
                                        <h5>Timing Profile & Hours</h5>
                                        <table width="100%" border="0" class="TimingSectionTable">
                                          <tr>
                                            <td colspan="2">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">Timing Profile</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2"><h4 style="margin:0;font-size:16px;">Heads</h4></td>
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
                                            <td colspan="2"><h4 style="margin:0;font-size:16px;">53:00</h4></td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">&nbsp;</td>
                                          </tr>
                                        </table>
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3 paddingLeft0 text-center">
                                        <h5>Full Time Parameters</h5>
                                        <table width="100%" border="0" class="TimingSectionTable">
                                          <tr>
                                            <td colspan="2">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td class="text-left">Standard IN</td>
                                            <td class="text-right"><strong>07:30</strong></td>
                                          </tr>
                                          <tr>
                                            <td class="text-left">Standard OUT</td>
                                            <td class="text-right"><strong>15:30</strong></td>
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
                                            <td class="text-right"><strong>14:30</strong></td>
                                          </tr>
                                          <tr>
                                            <td class="text-left">Saturday Hrs</td>
                                            <td class="text-right"><strong>5.0</strong></td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">&nbsp;</td>
                                          </tr>
                                        </table>
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3 paddingLeft0 text-center">
                                        <h5>Secondary Parameters</h5>
                                        <table width="100%" border="0" class="TimingSectionTable">
                                          <tr>
                                            <td colspan="2">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td class="text-left">Sat's Working</td>
                                            <td class="text-right"><strong>2</strong></td>
                                          </tr>
                                          <tr>
                                            <td class="text-left">Sat's Off</td>
                                            <td class="text-right"><strong>-</strong></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td class="text-left">Ext. Out</td>
                                            <td class="text-right"><strong>15:30</strong></td>
                                          </tr>
                                          <tr>
                                            <td class="text-left">Ext. FREQ</td>
                                            <td class="text-right"><strong>2</strong></td>
                                          </tr>
                                          <tr>
                                            <td class="text-left">July Category</td>
                                            <td class="text-right"><strong>W2</strong></td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">&nbsp;</td>
                                          </tr>
                                        </table>
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3 paddingLeft0 text-center">
                                        <h5>Custom Timings</h5>
                                        <table width="100%" border="0" class="TimingSectionTable">
                                          <tr>
                                            <td colspan="3">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td>Mon</td>
                                            <td><strong>07:00</strong></td>
                                            <td><strong>14:00</strong></td>
                                          </tr>
                                          <tr>
                                            <td>Tue</td>
                                            <td><strong>07:00</strong></td>
                                            <td><strong>14:00</strong></td>
                                          </tr>
                                          <tr>
                                            <td>Wed</td>
                                            <td><strong>07:00</strong></td>
                                            <td><strong>14:00</strong></td>
                                          </tr>
                                          <tr>
                                            <td>Thu</td>
                                            <td><strong>07:00</strong></td>
                                            <td><strong>14:00</strong></td>
                                          </tr>
                                          <tr>
                                            <td>Fri</td>
                                            <td><strong>07:00</strong></td>
                                            <td><strong>14:00</strong></td>
                                          </tr>
                                          <tr>
                                            <td>Sat</td>
                                            <td><strong>07:00</strong></td>
                                            <td><strong>14:00</strong></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>
                                        </table>
            
                                    </div><!-- col-md-3 -->
                                </div><!-- TimingSection -->
                                <hr style="margin-top: 5px;" />
                                <div class="MatrixRolesSection">
                                    <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Matrix Role(s) <small>for Classes and Groups</small></h4>
                                    <div class="col-md-12 paddingBottom40">
                                        <div class="col-md-6 col-md-offset-3 paddingLeft0 paddingRight0">
                                            <table width="100%" border="0" class="FunDaMentalReporting">
                                              <tr>
                                                <td class="text-center FunRep">FR</td>
                                                <td class="text-center ClassTeach">CLT</td>
                                                <td class="text-center ClassHere">IV-G</td>
                                                <td class="text-center ClassSectionHere">IV-CLT-0-G</td>
                                                <td class="text-center StuStrength">28</td>
                                                <td class="text-center TopBottomLine">YT, Grade IV<br />Sadia Ashar</td>
                                                <td class="text-center ReportingCodeName">SAS</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap" style="border:1px solid #000;">
                                              <tr>
                                                <td class="text-center SRNO">2</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep">FR</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">14</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">3</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">15</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">4</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">16</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">5</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">17</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">6</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">18</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">7</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">19</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">8</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">20</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">9</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">21</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">10</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">22</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">11</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">23</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">12</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">24</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">13</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                                <td class="text-center FunRep White"></td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="0" class="FunDaMentalReportingChap">
                                              <tr>
                                                <td class="text-center SRNO">25</td>
                                                <td class="text-center SubjectName">X-PHYS-A-1</td>
                                                <td class="text-center StuStrength">29</td>
                                                <td class="text-center Blocks">3</td>
                                                <td class="text-center TopBottomLine">LT, Physics<br />Rukhsana Hai</td>
                                                <td class="text-center NameCodeHere">RHI</td>
                                                <td class="text-center RankHere">7</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                </div><!-- MatrixRolesSection -->
                                <hr style="margin-top: 5px;" />
                                <div class="orgChartSection">
                                    <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Org Chart Roles(s) <small>for Non-Classroom Roles</small> | Role 1</h4>
                                    <?php /* ?><?php */ ?>
                                    <div class="no-padding col-md-10 col-md-offset-1">
                                        <div class="blackSolidBorder">&nbsp;</div>
                                        <div class="graySolidBorder">&nbsp;</div>
                                        <div class="grayDashedBorder">&nbsp;</div>
                                        <div class="col-md-12 ">
                                            <div class="col-md-6 text-center">
                                                <table width="100%" border="1" class="secondLevelReporting">
                                                  <tr>
                                                    <td colspan="3"><h5>PRIMARY GRANDREPORTOO</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40">JN-T001</td>
                                                    <td width="30%">OPQ</td>
                                                    <td width="30%">2</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Vice Principal, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40">GT 10-567</td>
                                                    <td colspan="2">KHN</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Khadija Noorani</td>
                                                  </tr>
                                                </table>
                                                
                                            </div><!-- col-md-6 -->
                                            <div class="col-md-6 text-center">
                                                <table width="100%" border="1" class="secondLevelReporting">
                                                  <tr>
                                                    <td colspan="3"><h5>SECONDARY GRANDREPORTOO</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40">JN-T001</td>
                                                    <td width="30%">OPQ</td>
                                                    <td width="30%">2</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Vice Principal, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40">GT 10-567</td>
                                                    <td colspan="2">KHN</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Khadija Noorani</td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                        </div><!-- col-md-12 -->
                                        <div class="col-md-12 paddingTop50">
                                            <div class="col-md-6 text-center">
                                                <table width="100%" border="1" class="firstLevelReporting">
                                                  <tr>
                                                    <td colspan="3"><h5>PRIMARY REPORTOO</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40" bgcolor="#e5d998">JN-T001</td>
                                                    <td width="30%" bgcolor="#ffff00">OPQ</td>
                                                    <td width="30%" bgcolor="#ffff00">2</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30" bgcolor="#e5d998">Vice Principal, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40" bgcolor="#f4ecfd">GT 10-567</td>
                                                    <td colspan="2" bgcolor="#f4ecfd">KHN</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30" bgcolor="#f4ecfd">Khadija Noorani</td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                            <div class="col-md-6 text-center">
                                                <table width="100%" border="1" class="firstLevelReporting">
                                                  <tr>
                                                    <td colspan="3"><h5>SECONDARY REPORTOO</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40">JN-T001</td>
                                                    <td width="30%">OPQ</td>
                                                    <td width="30%">2</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Vice Principal, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40">GT 10-567</td>
                                                    <td colspan="2">KHN</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Khadija Noorani</td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                        </div><!-- col-md-12 -->
                                        <div class="col-md-12 paddingTop50">
                                            <div class="col-md-6 col-md-offset-3 text-center" style="background:#e2e2e2;padding:15px;">
                                                <table width="100%" border="1" bgcolor="#fff" class="firstLevelReporting" style="background:#fff;" >
                                                  <tr>
                                                    <td bgcolor="#ade4f2"><h5 style="color:#;">FR</h5></td>
                                                    <td colspan="2" bgcolor="#ade4f2"><h5>ROLE A</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40" bgcolor="#e5d998">JN-B-01</td>
                                                    <td width="30%" bgcolor="#ffff00">OPQ</td>
                                                    <td width="30%" bgcolor="#ffff00">4</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30" bgcolor="#e5d998">Headmistress, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40" bgcolor="#ade4f2">ZHA-A</td>
                                                    <td colspan="2" bgcolor="#f4ecfd">Zillehuma Asif</td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                        </div><!-- col-md-12 -->
                                        <div class="col-md-12 paddingTop50">
                                            <div class="col-md-6 col-md-offset-3 text-center" style="background:none;padding:15px;">
                                                <table width="100%" border="1">
                                                  <tr>
                                                    <td colspan="2" width="33%" height="90">Fundamental<br />Primary<br /><h5>06</h5></td>
                                                    <td colspan="2" width="33%" height="90">Total<br />Primary<br /><h5>06</h5></td>
                                                    <td colspan="2" width="33%" height="90">Total<br />Reportee<br /><h5>06</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" width="50%"  height="80">Total Staff<br />Members<br /><h5>200</h5></td>
                                                    <td colspan="3" width="50%"  height="80">Total Student<br />Members<br /><h5>1382</h5></td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                        </div><!-- col-md-12 -->
                                    </div><!-- col-md-12 -->
                                    <hr class="smallHR" />
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td bgcolor="#f5f5f5">1</td>
                                                <td bgcolor="#f5f5f5">P</td>
                                                <td bgcolor="#f4ecfd"><strong>Rakhshanda Ovais</strong></td>
                                                <td bgcolor="#ade4f2">ROV-B</td>
                                                <td bgcolor="#ade4f2">3 (25)</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#ffff00">IND</td>
                                                <td bgcolor="#ffff00">(ARS)</td>
                                                <td bgcolor="#e5d998">Headmistress</td>
                                                <td colspan="2" bgcolor="#e5d998">N-ML-M01</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td bgcolor="#f5f5f5">1</td>
                                                <td bgcolor="#f5f5f5">P</td>
                                                <td bgcolor="#f4ecfd"><strong>Rakhshanda Ovais</strong></td>
                                                <td bgcolor="#ade4f2">ROV-B</td>
                                                <td bgcolor="#ade4f2">3 (25)</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#ffff00">IND</td>
                                                <td bgcolor="#ffff00">(ARS)</td>
                                                <td bgcolor="#e5d998">Headmistress</td>
                                                <td colspan="2" bgcolor="#e5d998">N-ML-M01</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td bgcolor="#f5f5f5">1</td>
                                                <td bgcolor="#f5f5f5">P</td>
                                                <td bgcolor="#f4ecfd"><strong>Rakhshanda Ovais</strong></td>
                                                <td bgcolor="#ade4f2">ROV-B</td>
                                                <td bgcolor="#ade4f2">3 (25)</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#ffff00">IND</td>
                                                <td bgcolor="#ffff00">(ARS)</td>
                                                <td bgcolor="#e5d998">Headmistress</td>
                                                <td colspan="2" bgcolor="#e5d998">N-ML-M01</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td bgcolor="#f5f5f5">1</td>
                                                <td bgcolor="#f5f5f5">P</td>
                                                <td bgcolor="#f4ecfd"><strong>Rakhshanda Ovais</strong></td>
                                                <td bgcolor="#ade4f2">ROV-B</td>
                                                <td bgcolor="#ade4f2">3 (25)</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#ffff00">IND</td>
                                                <td bgcolor="#ffff00">(ARS)</td>
                                                <td bgcolor="#e5d998">Headmistress</td>
                                                <td colspan="2" bgcolor="#e5d998">N-ML-M01</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                </div><!-- orgChartSection -->
                                <hr style="margin-top: 5px;" />
                                <div class="orgChartSection">
                                    <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Org Chart Roles(s) <small>for Non-Classroom Roles</small> | Role 2</h4>
                                    <?php /* ?><?php */ ?>
                                    <div class="no-padding col-md-10 col-md-offset-1">
                                        <div class="blackSolidBorder">&nbsp;</div>
                                        <div class="graySolidBorder">&nbsp;</div>
                                        <div class="grayDashedBorder">&nbsp;</div>
                                        <div class="col-md-12 ">
                                            <div class="col-md-6 text-center">
                                                <table width="100%" border="1" class="secondLevelReporting">
                                                  <tr>
                                                    <td colspan="3"><h5>PRIMARY GRANDREPORTOO</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40">JN-T001</td>
                                                    <td width="30%">OPQ</td>
                                                    <td width="30%">2</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Vice Principal, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40">GT 10-567</td>
                                                    <td colspan="2">KHN</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Khadija Noorani</td>
                                                  </tr>
                                                </table>
                                                
                                            </div><!-- col-md-6 -->
                                            <div class="col-md-6 text-center">
                                                <table width="100%" border="1" class="secondLevelReporting">
                                                  <tr>
                                                    <td colspan="3"><h5>SECONDARY GRANDREPORTOO</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40">JN-T001</td>
                                                    <td width="30%">OPQ</td>
                                                    <td width="30%">2</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Vice Principal, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40">GT 10-567</td>
                                                    <td colspan="2">KHN</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Khadija Noorani</td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                        </div><!-- col-md-12 -->
                                        <div class="col-md-12 paddingTop50">
                                            <div class="col-md-6 text-center">
                                                <table width="100%" border="1" class="firstLevelReporting">
                                                  <tr>
                                                    <td colspan="3"><h5>PRIMARY REPORTOO</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40" bgcolor="">JN-T001</td>
                                                    <td width="30%" >OPQ</td>
                                                    <td width="30%" >2</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30" bgcolor="">Vice Principal, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40" >GT 10-567</td>
                                                    <td colspan="2" bgcolor="#d1fbfb" ><strong>KHN</strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Khadija Noorani</td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                            <div class="col-md-6 text-center">
                                                <table width="100%" border="1" class="firstLevelReporting">
                                                  <tr>
                                                    <td colspan="3"><h5>SECONDARY REPORTOO</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40">JN-T001</td>
                                                    <td width="30%">OPQ</td>
                                                    <td width="30%">2</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Vice Principal, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40">GT 10-567</td>
                                                    <td colspan="2">KHN</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30">Khadija Noorani</td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                        </div><!-- col-md-12 -->
                                        <div class="col-md-12 paddingTop50">
                                            <div class="col-md-6 col-md-offset-3 text-center" style="background:#e2e2e2;padding:15px;">
                                                <table width="100%" border="1" bgcolor="#fff" class="firstLevelReporting" style="background:#fff;" >
                                                  <tr>
                                                    <td colspan="3" bgcolor=""><h5>ROLE 2</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="30%" height="40" bgcolor="">JN-B-01</td>
                                                    <td width="30%" bgcolor="">OPQ</td>
                                                    <td width="30%" bgcolor="">4</td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" height="30" bgcolor="">Headmistress, Junior Section</td>
                                                  </tr>
                                                  <tr>
                                                    <td height="40" bgcolor="">ZHA-A</td>
                                                    <td colspan="2" bgcolor="">Zillehuma Asif</td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                        </div><!-- col-md-12 -->
                                        <div class="col-md-12 paddingTop50">
                                            <div class="col-md-6 col-md-offset-3 text-center" style="background:none;padding:15px;">
                                                <table width="100%" border="1">
                                                  <tr>
                                                    <td colspan="2" width="33%" height="90">Fundamental<br />Primary<br /><h5>06</h5></td>
                                                    <td colspan="2" width="33%" height="90">Total<br />Primary<br /><h5>06</h5></td>
                                                    <td colspan="2" width="33%" height="90">Total<br />Reportee<br /><h5>06</h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3" width="50%"  height="80">Total Staff<br />Members<br /><h5>200</h5></td>
                                                    <td colspan="3" width="50%"  height="80">Total Student<br />Members<br /><h5>1382</h5></td>
                                                  </tr>
                                                </table>
                                            </div><!-- col-md-6 -->
                                        </div><!-- col-md-12 -->
                                    </div><!-- col-md-12 -->
                                    <hr class="smallHR" />
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
            
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                    <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                        <div class="col-md-6">
                                            <table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                              <tr>
                                                <td width="15%" bgcolor="#f5f5f5">1</td>
                                                <td width="15%" bgcolor="#f5f5f5">P</td>
                                                <td width="15%" bgcolor="">INDIR</td>
                                                <td width="15%" bgcolor="">ARS</td>
                                                <td width="40%" bgcolor="#f5f5f5">Admin Coordinator</td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#e1e1e1" colspan="2">MULTI(4)</td>
                                                <td bgcolor="#e1e1e1">16 (300)</td>
                                                <td bgcolor="#f5f5f5"><strong>MNH</strong></td>
                                                <td colspan="" bgcolor="#f5f5f5">Mehmood Hussain</td>
                                              </tr>
                                            </table>
                                        </div><!-- col-md-6 -->
                                    </div><!-- col-md-12 -->
                                </div><!-- orgChartSection -->
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
                                            <div class="text-center col-md-12"><h4>Regularity & Punctuality</h4></div>
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
                                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"> Admission </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_3_1" class="panel-collapse in">
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
                                                          <tr>
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
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"> HR </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_3_2" class="panel-collapse collapse">
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
                                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3"> Finance </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_3_3" class="panel-collapse collapse">
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
                                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4"> SIS </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_3_4" class="panel-collapse collapse">
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
                        
						
						
						
						
						
						<style>
.padRight1 {
   padding-right:1%; 
   text-align:right;
   width:49%;
}
.padLeft1 {
   padding-left:1%;
   width:49%;  
}
.currentStaff tbody {
   background:#f5eba3;  
}
.innerTbodyStaff {
   text-align: left;
    padding: 4px;
    float: left;
    width: 100%;
   border: 1px solid #e0dfdf;
   height: 55px;
   background: #efefef;
}
.innerTbodyStaff .user-pic {
    height: 43px !important;
}
.rolesTable tr.pBottom10 {
    width: 100%;
   height: 60px;
}
.rolesTable td.staffView_StaffName {
    padding-left: 6px;
   width:100%;
}
.innerTbodyStaff .row td {
   float:left; 
}
.innerTbodyStaff .row tdLlast-child {
   float:right;
   width:15%;
      
}
.leftInformationRoleStaff {
   float:left;
}
.rightInformationRoleStaff {
    float: right;
    padding: 12px 10px;
    font-weight: bold;
    color: #717171;
    font-size: 14px;
    border: 1px solid #c3c3c3;
    background: #d0d0d0;
}
</style>                     
                     <div class="tab-pane fade" id="tab_1_6">
                        <div id="content_role_position_distance"> 
						
                           <div class="portlet-body padding0">
                              <table width="100%" class="rolesTable">
                                 <tr class="pBottom10">
                                       <td class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="VP/HM" data-department="Principal, Generation's School" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="90-001" src="assets/photos/hcm/150x150/staff/973.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="DGS" data-staffid="19" data-staffgtid="90-001" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Ghazala Siddiqui</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="g.siddiqui">DGS</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">20 B</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Principal, Generation's School">Generation's School: Principal</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    20 B
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->                                                             
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    <!-- -->
                                    <tr class="pBottom10">
                                       <td width="50%" class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="VP/HM" data-department="Principal, Generation's School" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="90-001" src="assets/photos/hcm/150x150/staff/973.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="DGS" data-staffid="19" data-staffgtid="90-001" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Ghazala Siddiqui</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="g.siddiqui">DGS</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">20 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Principal, Generation's School">Generation's School: Principal</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    20 A
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff --> 
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td width="50%" class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="VP/HM" data-department="Director, Generation's School" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="90-003" src="assets/photos/hcm/150x150/staff/299.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="SSD" data-staffid="15" data-staffgtid="90-003" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Shoaib Siddiqui</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="s.siddiqui">SSD</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">20 B</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Director, Generation's School">Generation's School: Director</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    20 B
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    <!-- -->
                                    <tr class="pBottom10">
                                       <td width="50%" class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="VP/HM" data-department="Director, Generation's School" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="90-003" src="assets/photos/hcm/150x150/staff/299.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="SSD" data-staffid="15" data-staffgtid="90-003" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Shoaib Siddiqui</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="s.siddiqui">SSD</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">10 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Director, Generation's School">Generation's School: Director</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    10 A
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td width="50%" class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="" data-department="Senior General Manager, Generation's School">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="15-067" src="assets/photos/hcm/150x150/staff/1010.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="KSM" data-staffid="606" data-staffgtid="15-067" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Kashif Shamim</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="k.shamim">KSM</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">10 B</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Senior General Manager, Generation's School">Generation's School: Senior General Manager</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    10 B
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->
                                                         </td>
                                                     
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    <!-- -->
                                    <tr class="pBottom10 currentStaff">
                                       <td width="50%" class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row " data-attendance="Absent" data-campus="South" data-profile="Software Team" data-department="Head, Digital Systems, Digital Infrastructures">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="15-076" src="assets/photos/hcm/150x150/staff/1014.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="MHF" data-staffid="615" data-staffgtid="15-076" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Muhammad Faisal</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="m.faisal2">MHF</small><br>
                                                            <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">R</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Head, Digital Systems, Digital Infrastructures">Digital Infrastructures: Head, Digital Systems</span></small>
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td width="50%" class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row " data-attendance="Absent" data-campus="South" data-profile="Software Team" data-department="Head, Digital Systems, Digital Infrastructures">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="15-076" src="assets/photos/hcm/150x150/staff/1014.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="MHF" data-staffid="615" data-staffgtid="15-076" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Muhammad Faisal</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="m.faisal2">MHF</small><br>
                                                            <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">R</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Head, Digital Systems, Digital Infrastructures">Digital Infrastructures: Head, Digital Systems</span></small>
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    <!-- -->
                                    <tr class="pBottom10">
                                       <td width="50%" class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="Software test Profile" data-department="Software, Team Lead, Software">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="09-008" src="assets/photos/hcm/150x150/staff/298.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ANA" data-staffid="1" data-staffgtid="09-008" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Atif Naseem Ahmed</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.naseem">ANA</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">10 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Software, Team Lead, Software">Software: Software, Team Lead</span></small>
                                                            </span>
                                                            <span class="rightInformationRoleStaff">
                                                               <span class="rolesRelations">
                                                                    10 A
                                                                </span>   
                                                            </span><!-- rightInformationRoleStaff -->
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td width="50%" class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="DI" data-department="IT Incharge, Digital Infrastructures">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="12-043" src="assets/photos/hcm/150x150/staff/714.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="SAA" data-staffid="287" data-staffgtid="12-043" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Syed Asder Ahmed</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="s.a.ahmed">SAA</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">10 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="IT Incharge, Digital Infrastructures">Digital Infrastructures: IT Incharge</span></small>
                                                            </span>
                                                            <span class="rightInformationRoleStaff">
                                                               <span class="rolesRelations">
                                                                    10 A
                                                                </span>   
                                                            </span><!-- rightInformationRoleStaff -->
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    <!-- -->
                                    <tr class="pBottom10">
                                       <td width="50%" class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="Software test Profile" data-department="Software Developer, Software" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="16-009" src="assets/photos/hcm/150x150/staff/1103.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="KMS" data-staffid="774" data-staffgtid="16-009" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Kashif Mustafa</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="k.mustafa">KMS</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">10 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Software Developer, Software">Software: Software Developer</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    10 A
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td width="50%" class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="" data-department="CCTV Technician, Digital Infrastructures">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="15-195" src="assets/photos/hcm/150x150/staff/1076.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="MAV" data-staffid="737" data-staffgtid="15-195" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Amin Vohra</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.vohra">MAV</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">13 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="CCTV Technician, Digital Infrastructures">Digital Infrastructures: CCTV Technician</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    13 A
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->     
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    <!-- -->
                                    <tr class="pBottom10">
                                       <td width="50%" class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="Digital Infrastructure" data-department="Software Developer, Software" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="16-070" src="assets/photos/hcm/150x150/staff/1159.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="HOL" data-staffid="835" data-staffgtid="16-070" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Muhammad Haris Ola</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="h.ola">HOL</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">10 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Software Developer, Software">Software: Software Developer</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    10 A
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->  
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td width="50%" class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="Digital Infrastructure" data-department="IT Administrator, Digital Infrastructures">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-025" src="assets/photos/hcm/150x150/staff/818.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="RHA" data-staffid="350" data-staffgtid="13-025" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">M Rehan Akhtar</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="r.akhtar">RHA</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">13 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="IT Administrator, Digital Infrastructures">Digital Infrastructures: IT Administrator</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    13 A
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff --> 
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    <!-- -->
                                    <tr class="pBottom10">
                                       <td width="50%" class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="Lead Teachers SC" data-department="Software Developer, Software" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="16-008" src="assets/photos/hcm/150x150/staff/1104.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ROA" data-staffid="773" data-staffgtid="16-008" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Rohail Aslam</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="r.aslam">ROA</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">10 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Software Developer, Software">Software: Software Developer</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    10 A
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->  
                                                         </td>
                                                     
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td width="50%" class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="Digital Infrastructure" data-department="IT Administrator, Digital Infrastructures" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="16-010" src="assets/photos/hcm/150x150/staff/1105.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="NAB" data-staffid="775" data-staffgtid="16-010" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Mirza Numair</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="m.numair">NAB</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">13 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="IT Administrator, Digital Infrastructures">Digital Infrastructures: IT Administrator</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    13 A
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->  
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    <!-- -->
                                    <tr class="pBottom10">
                                       <td width="50%" class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="Software Team" data-department="SIS Officer, Coordination">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="13-035" src="assets/photos/hcm/150x150/staff/878.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="MSQ" data-staffid="2" data-staffgtid="13-035" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Muhammad Saqib</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="m.saqib">MSQ</small><br>
                                                               <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">10 C</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="SIS Officer, Coordination">Coordination: SIS Officer</span></small>
                                                           </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    10 C
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->   
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td width="50%" class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="North" data-profile="" data-department="IT Administrator, Digital Infrastructures" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="12-034" src="assets/photos/hcm/150x150/staff/718.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="KAM" data-staffid="278" data-staffgtid="12-034" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Khurram Majeed</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="k.a.majeed">KAM</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">C</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">13 C</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="IT Administrator, Digital Infrastructures">Digital Infrastructures: IT Administrator</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    13 C
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->  
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    <!-- -->
                                    <tr class="pBottom10">
                                       <td width="50%" class="padRight1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    <tr class="Row" data-attendance="Absent" data-campus="South" data-profile="Software test Profile" data-department="Software Developer, Software" style="display: table-row;">
                                                         <td class="">
                                                            <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="17-066" src="assets/photos/hcm/150x150/staff/male.png">
                                                         </td>
                                                         <td class="staffView_StaffName">
                                                            <span class="leftInformationRoleStaff">
                                                                <a href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="ABL" data-staffid="933" data-staffgtid="17-066" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">Asim Bilal</a> - <small class="tooltips" data-container="body" data-placement="top" data-original-title="a.bilal2">ABL</small><br>
                                                                <small class="shortHeight"><span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-TPB: Probation">T</span> <span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">10 A</span> <span class="tooltips" data-container="body" data-placement="top" data-original-title="Software Developer, Software">Software: Software Developer</span></small>
                                                            </span><!-- leftInformation -->
                                                            <span class="rightInformationRoleStaff">
                                                                <span class="rolesRelations">
                                                                    10 A
                                                                </span>  
                                                            </span><!-- rightInformationRoleStaff -->  
                                                         </td>
                                                   </tr>
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padRight1 -->
                                        <td width="50%" class="padLeft1">
                                          <table width="100%">
                                             <tbody class="innerTbodyStaff">
                                                    
                                                </tbody><!-- tbody .innerTbodyStaff -->
                                            </table><!-- table -->
                                        </td><!-- padLeft1 -->
                                    </tr>
                                    
                                    <!-- -->
                                </table>
                           </div>
                           <!-- portlet-body-->
                        </div>
                        <!-- portlet -->
                     </div>
                     <!-- tab_1_6 -->
                 
				 
				 
						</div><!-- tab-content -->
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- END USE PROFILE -->












<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">

    //Show total count of table records
    var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
    $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow); 

    //Create all select box to multi select with checkbox 
    $('#StaffView_Filter_Profile').multiselect({ numberDisplayed: 1 });
    $('#StaffView_Filter_Department').multiselect({ numberDisplayed: 1 });
    $('#StaffView_Filter_Campus').multiselect({ numberDisplayed: 1 });
    $('#StaffView_Filter_AtdStd').multiselect({ numberDisplayed: 1 });
    $('#StaffView_Filter_StaffStd').multiselect({ numberDisplayed: 1 });

    //Assign table rows to tableRecords
    var tableRecords = $('#staffView_Table_StaffList').find('.Row');

    //Multi Filter prototype
    String.prototype.replaceAll = function(search, replacement) {
        var target = this;
        return target.replace(new RegExp(search, 'g'), replacement);
    };

    //Add css class selected when click on table row
    $("tbody tr").click(function() {

        $(this).addClass('selected').siblings().removeClass("selected");
    });

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

/***** BEGIN - Search Result Highlight Function *****
* Author: Atif Naseem (Thu Jul 20, 2017)
* Email: atif.naseem22@gmail.com
* Cel: +92-313-5521122
* Description: Highlight all the search text
*              in table columns.
****************************************************/

var highlightSearchResult = function() {

    var search = $('#staffView_StaffList_Search'),
        content = $('#staffView_Table_StaffList'),
        matches = $(), index = 0;
    // Listen for the text input event
    search.on('input', function(e) {
        // Only search for strings 2 characters or more
        if (search.val().length >= 2) {
            // Use the highlight plugin
            content.highlight(search.val(), function(found) {                
                //found.parent().parent().css('background','yellow');
            });
        }
        else {
            content.highlightRestore();
        }
    });

    var termPattern;
    $.fn.highlight = function(term, callback) {
        return this.each(function() {
            var elem = $(this);
            if (!elem.data('highlight-original')) {
                // Save the original element content
                elem.data('highlight-original', elem.html());
            } else {
                // restore the original content
                elem.highlightRestore();
            }
            termPattern = new RegExp('(' + term + ')', 'ig');
            // Search the element's contents
            walk(elem);
            // Trigger the callback
            callback && callback(elem.find('.match'));
        });
    };


    $.fn.highlightRestore = function() {
        return this.each(function() {
            var elem = $(this);
            elem.html(elem.data('highlight-original'));
        });
    };



    function walk(elem) {
        elem.contents().each(function() {
            if (this.nodeType == 3) { // text node
                if (termPattern.test(this.nodeValue)) {
                    $(this).replaceWith(this.nodeValue.replace(termPattern, '<span class="match">$1</span>'));
                }
            } else {
                walk($(this));
            }
        });
    }
};
/***** END - Search Result Highlight Function *****/




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
            $('#tab_education').html('');
            $('#tab_employment').html('');
            $('#tab_parent_table').html('');
            $('#tab_staff_child').html('');
            $('#tab_alternate_contact').html('');
            $('#tab_other').html('');

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










var sortTable = function (f,n){
    var rows = $('#staffView_Table_StaffList tbody  tr').get();
    rows.sort(function(a, b) {
        var A = getVal(a);
        var B = getVal(b);

        if(A < B) {
            return -1*f;
        }
        if(A > B) {
            return 1*f;
        }
        return 0;
    });

    function getVal(elm){
        var v = $(elm).children('td').eq(n).text().toUpperCase();
        if($.isNumeric(v)){
            v = parseInt(v,10);
        }
        return v;
    }

    $.each(rows, function(index, row) {
        $('#staffView_Table_StaffList').children('tbody').append(row);
    });
}







var pagefunction = function() {
    Demo.init();
    App.init();



    $('#staffView_StaffInfo').hide();

    /***** BEGIN - OnClick of Staff Name *****/
    $('.staffView_StaffName a').click(function(e) {
        e.preventDefault();
        clearStaffInfo();
        $('#staffView_StaffInfo').show();


        /***** Further Requests of AJAX *****/
        var me = $(this);
        if ( me.data('staffView_staffInfo_requestRunning') ) {
            return;
        }
        me.data('staffView_staffInfo_requestRunning', true);
        /***** Stop Further Request of AJAX *****/


        var staffID = $(this).attr('data-staffID');
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

                console.log(staffAtd_detail);
                if(staffAtd_detail){
                    
                    $('.profile-user-attendance').html('<img style="margin-top: 0px;" src="'+staffAtd_detail+'" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In '+staffAtd_content+'" data-original-title="'+staffAtd_status+'" width="20" />');

                    $('.popovers').popover({
                        container: 'body'
                    });
                }



                var activeTab = $.trim($('#staffViewTabs li.active').text());
                if(activeTab === 'TIF-B'){
                    get_Staff_TIFB(staffID);
                }else if(activeTab === 'TIF-A'){
                    get_Staff_TIFA(staffGTID);
                }
            },
            /***** Further Requests of AJAX *****/
            complete: function() {
                me.data('staffView_staffInfo_requestRunning', false);
            }
            /***** Stop Further Request of AJAX *****/

        });
    });
    /***** END - OnClick of Staff Name *****/    













    /***** BEGIN - on Tab Change *****/
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var selectedTab = $.trim($(e.target).text()); // activated tab
        var GTID = $('.profile-usertitle-gtid').html().substr(0, 6); // getting staff GT-ID

        if(selectedTab === 'TIF-A'){
            get_Staff_TIFA(GTID);
        }if(selectedTab === 'TIF-B'){
            get_Staff_TIFB(GTID);
        }
    });
    /***** END - on Tab Change *****/


    $("#staffView_StaffList_Search").keyup(function(){
        
        var searchText = $("#staffView_StaffList_Search").val();

        //First letter of each word should be capital
        var arr = searchText.split(' ');
        var result = "";
        for (var x=0; x<arr.length; x++)
            result+=arr[x].substring(0,1).toUpperCase()+arr[x].substring(1)+' ';
        searchText = result.substring(0, result.length-1);

        $(tableRecords).each(function(){
            var lineStr = $(this).text();
            if( lineStr.indexOf(searchText) === -1 ){
                $(this).hide();
            } else {

                //Get Html of profile_StaffName
                var src_str = $(this).find('.profile_StaffName').html();
                //Remove mark if html already contains
                src_str = src_str.replace("<mark>", "" );
                src_str = src_str.replace("</mark>", "" );
                //Add mark on search words 
                if(searchText !== ""){
                    src_str = src_str.replace(searchText, "<mark>" + searchText + "</mark>");

                }
                //Update new html with mark on it
                $(this).find('.profile_StaffName').html(src_str)               
                $(this).show();
            }
        });
        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow); 

    })

  
    $("#sparkline_bar").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12], {
        type: 'bar',
        width: '100',
        barWidth: 5,
        height: '55',
        barColor: '#f36a5b',
        negBarColor: '#e02222'
    });

    $("#sparkline_bar2").sparkline([9, 11, 12, 11, 12, 10, 10, 14, 12, 11, 11, 12], {
        type: 'bar',
        width: '100',
        barWidth: 5,
        height: '55',
        barColor: '#5c9bd1',
        negBarColor: '#e02222'
    });

    /*
    * Function Name : removeMark
    * Description:  remove Mark is used to remove highlight from staff name
    */

    var removeMark = function removeMark() {

        var b = document.getElementsByTagName('mark');

        while(b.length) {
            var parent = b[ 0 ].parentNode;
            while( b[ 0 ].firstChild ) {
                parent.insertBefore(  b[ 0 ].firstChild, b[ 0 ] );
            }
             parent.removeChild( b[ 0 ] );
        }
    }

    /*
    * Function Name : multiFilter
    * Description:  Multiple select checkbox filter function used to filter data on table using multiple values from one or more select checkboxes
    */
    var multiFilter = function multiFilter(){

        var ddlFilterTableRow = $('select.ddlFilterTableRow');


        ddlFilterTableRow.attr('disabled', 'disabled');

        var records = $('#staffView_Table_StaffList').find('.Row');
        records.hide();

        var critriaAttributes = [];
        ddlFilterTableRow.each(function() {
            var $this = $(this),
                $selectedLength = $this.find(':selected').length,
                $critriaAttribute = '';

            if ($selectedLength > 0 && $this.val() != '0') {
                if ($selectedLength == 1) {
                    $critriaAttribute += '[data-' + $this.data('attribute') + '*="' + $this.val() + '"]';
                } else {
                    var $startDataAttribute = '[data-' + $this.data('attribute') + '*="',
                        $endDataAttribute = '"]',
                        $selectedValues = $this.val().toString();

                    $critriaAttribute += $startDataAttribute + $selectedValues.replaceAll(',', ($endDataAttribute + ',' + $startDataAttribute)) + $endDataAttribute;
                }
                critriaAttributes.push($critriaAttribute);
            }
        });
                    

        var $showRecords = records;
        if (critriaAttributes.length > 0) {
            $.each(critriaAttributes, function(i, filterValue) {
                $showRecords = $showRecords.filter(filterValue);
            });
        }

        tableRecords = $showRecords.show();

        ddlFilterTableRow.removeAttr('disabled');
    }

    /***** BEGIN - Apply filter searching *****/
    $('#staffView_filter_btn .applyFilter').click(function() {
        //Remove mark
        removeMark();
        multiFilter();

        $('.toggler').show();
        $('.toggler-close').hide();
        $('.theme-panel > .theme-options').hide();
        $('#staffView_StaffList_Search').val('');

        $('.toggler2').show();
        $('.toggler2-close').hide();
        $('.theme-panel > .theme-options2').hide();
        $('#staffView_StaffList_Search').val('');

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
    });
    /***** END - Apply filter searching *****/




    /***** BEGIN - Cancel filter searching *****/
    $('#staffView_filter_btn .clearFilter').click(function() {
        
        //Remove mark
        removeMark();

        //Deselect all if selected 
        $('#StaffView_Filter_Profile').multiselect("deselectAll", false).multiselect("refresh");
        $('#StaffView_Filter_Department').multiselect("deselectAll", false).multiselect("refresh");
        $('#StaffView_Filter_Campus').multiselect("deselectAll", false).multiselect("refresh");
        $('#StaffView_Filter_AtdStd').multiselect("deselectAll", false).multiselect("refresh");
        $('#StaffView_Filter_StaffStd').multiselect("deselectAll", false).multiselect("refresh");

        $('#StaffView_Filter_Profile').val('');
        $('#StaffView_Filter_Department').val('');
        $('#StaffView_Filter_Campus').val('');
        $('#StaffView_Filter_AtdStd').val('');
        

        $('#staffView_StaffList_Search').val('');
        tableRecords = $('#staffView_Table_StaffList').find('.Row');
        tableRecords.show();

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
    });
    /***** END - Cancel filter searching *****/




    /***** BEGIN - Apply Searching *****/
    $('#staffView_sort_btn .applySort').click(function() {
       
        //Remove mark
        removeMark();

        $('.toggler').show();
        $('.toggler-close').hide();
        $('.theme-panel > .theme-options').hide();
        $('#staffView_StaffList_Search').val('');

        $('.toggler2').show();
        $('.toggler2-close').hide();
        $('.theme-panel > .theme-options2').hide();
        $('#staffView_StaffList_Search').val('');



        /**********************************
        * 0: Image
        * 1: Name and Card Bottom Line
        * 2: Attendance title and score
        * 3: Name Code
        * 4: GT-ID
        * 5: TT Profile Name
        * 6: Card Bottom Line (Department)
        * 7: Campus
        * 8: Attendance Title
        * 9: Abridged Name
        **********************************/
        var sortName = $('#StaffView_Sort_Name').find(":selected").val();
        if(sortName != null){
            if(sortName === 'A to Z'){
                sortTable(1,9);
            }else if(sortName === 'Z to A'){
                sortTable(-1,9);
            }
        }
        var sortDepartment = $('#StaffView_Sort_Department').find(":selected").val();
        if(sortDepartment != null){
            if(sortDepartment === 'A to Z'){
                sortTable(1,6);
            }else if(sortDepartment === 'Z to A'){
                sortTable(-1,6);
            }
        }
        var sortAtdScore= $('#StaffView_Sort_AtdScore').find(":selected").val();
        if(sortAtdScore != null){
            if(sortAtdScore === 'L to H'){
                sortTable(1,8);
            }else if(sortAtdScore === 'H to L'){
                sortTable(-1,8);
            }
        }
        

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
    });
    /***** END - Apply Searching *****/




    /***** BEGIN - Cancel Searching *****/
    $('#staffView_sort_btn .clearSort').click(function() {
        //Remove mark
        removeMark();
        //Sort table in Ascending order (A to Z)
        sortTable(1,9);
        
        $('#StaffView_Sort_Name').val('');
        $('#StaffView_Sort_Department').val('');
        $('#StaffView_Sort_AtdScore').val('');

        $('#staffView_StaffList_Search').val('');
        //tableRecords = $('#staffView_Table_StaffList').find('.Row');
        tableRecords.show();

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
    });
    /***** END - Cancel Searching *****/
	/* Staff List Left Section Scroll Header */
    $('.fixed-height-NoScroll').scroll(function() {
        var y = $(this).scrollTop(); 
        if (y >= 200) {
            var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
            $('.headTitle').text('STAFF LIST - ' + totalRow);
            $('.headTitle').fadeIn(); 
        } else {
            $('.headTitle').fadeOut();
        }
    });
    
    /* Staff Detail Right Section Scroll Header */
    $('#staffView_StaffInfo').scroll(function() {
        var y = $(this).scrollTop(); 
        if (y >= 100) {
            //var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
            //$('.headTitle').text('STAFF LIST - ' + totalRow);
            $('.headRightDetails').fadeIn(); 
        } else {
            $('.headRightDetails').fadeOut();
        }
    }); 
	
	
	
	
	
	/*
   Following functionalities are developed by Kashif Solangi
*/   
 

 
var Edit_Absentia = function(Absentia_id, Staff_id ){
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
		var data = jQuery.parseJSON(result);
		$('#Absenia_Contents').html(data["h"]);
		$('#AddAIAE').modal('toggle');
	   }
	});
	}
}



   
   var addAbsentiaE = function addAbsentiaE(){
      
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
     
	  bootbox.dialog({
            message: "Are you sure you want to change this Absentia?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
					label: "Yes! Change Absentia",
					callback: function() { 
						if( Attendance_in_id !== '' && Attendance_out_id !== '' && Attendance_des_id !== '' && end_time !== ''){
							$.ajax({
							   type:"POST",
							   cache:true,
							   url:"{{url('/masterLayout/staff/editAbsentia')}}",
							   data:{
								   "staff_id":staffID,
								   "date" : date,
								   "title" : titles,
								   "start_time" : start_time,
								   "end_time" : end_time,
								   "description" : description,
								   "Attendance_in_id" : Attendance_in_id,
								   "Attendance_out_id" : Attendance_out_id,
								   "Attendance_des_id" : Attendance_des_id,
								   "Edit_Absentia_id_hidden" : Edit_Absentia_id_hidden,
									"_token": "{{ csrf_token() }}"
							   },
							   success:function(result){
									$('#absentia_table > tbody tr').each(function(index) { 
										var $this = $(this);
										var filter = $this.attr('id');
										var id = "absentia_table_row_"+Edit_Absentia_id_hidden;
										if(filter == id){
										  var leaveHTML = '';
										  leaveHTML = '<tr class="absentia_table_row" id="absentia_table_row_'+Edit_Absentia_id_hidden+'"> <td>'+ titles +'</td> <td>'+ formatDate(date) +'</td> <td>'+ changeTimeFormat(start_time) +'<br /></td> <td>'+ changeTimeFormat(end_time) +'</td> <td>'+ description +'</td><td><a onClick="Edit_Absentia('+Edit_Absentia_id_hidden+','+staffID+')"><i class="fa fa-edit"></i></a> | <a onClick="delete_Absentia('+Edit_Absentia_id_hidden+','+staffID+')"><i class="fa fa-close"></i></a></td> </tr>';
										  $(this).replaceWith(leaveHTML);
										}
									});
									$('#AddAIAE').modal('toggle');   
									$("#absentia_date_edit").val('');
									$("#absentia_title_edit").val('');
									$("#absentia_startTime_edit").val('');
									$("#absentia_endTime_edit").val('');
									$("#absentia_description_edit").val('');
							   }
						   });
						}
	 
					}// Call Back
              	},//end Confirm
				cancel: { label: "Cancel", callback: function() { } },
              
            }
        });
	}
 
    /*$('#demo_5_Testing').click(function(){
        bootbox.dialog({
            message: "I am a custom dialog",
            title: "Custom title",
            buttons: {
              success: {
                label: "Success!",
                className: "green",
                callback: function() {
                  alert("great success");
                }
              },
              danger: {
                label: "Danger!",
                className: "red",
                callback: function() {
                  alert("uh oh, look out!");
                }
              },
              main: {
                label: "Click ME!",
                className: "blue",
                callback: function() {
                  alert("Primary button");
                }
              }
            }
        });
    });*/
	
  
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
							success:function(result){ $("#absentia_table_row_"+Absentia_id).remove(); }
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
   
   
   
   
   var edit_leave = function(){


      $("#limit_edit").bootstrapSwitch();
      var  paid_compensation=$('#limit_edit').bootstrapSwitch('state');//returns true or false
      if(paid_compensation == true){
         paid_compensation = 1;
      }else{
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
     
     

      var paid_compensation_display;
      if(paid_compensation == 1){
         paid_compensation_display = 'Yes';
      }else{
         paid_compensation_display = 'No';
      }
	  
	  
	  bootbox.dialog({
            message: "Are you sure you want to edit this Leaves?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Edit Leaves",
                callback: function() { 
				
	  
     if(leave_type != '' && leave_title != '' && leave_from != '' && leave_to != ''){

      $.ajax({
            type:"POST",
            cache:true,
            url:"{{url('/masterLayout/staff/RWriteLeave')}}",
            data:{
               "staff_id":staffID,
            "Leave_Application_id":Leave_Application_id,
               "leave_title":leave_title,
               "leave_type":leave_type,
               "leave_from":leave_from,
               "leave_to":leave_to,
               "leave_comment":leave_comment,
               "paid_compensation":paid_compensation,
                "_token": "{{ csrf_token() }}"
            },
            success:function(result){

				$('#leave_table > tbody tr').each(function(index) {
					var $this = $(this);
					var filter = $this.attr('data-id');
				 var id = Leave_Application_id;
					if(filter == id){
					   var leaveHTML = '';

					   leaveHTML = leaveHTML + '<tr  class="approvedBorder" data-id='+id+'><td>'+leave_title+'</small></td><td class=""><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested Compensation"></i> &nbsp; '+paid_compensation_display+' </td></tr>';
					   if(leave_approve_status_edit==1){
						  leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved Compensation"></i> &nbsp; '+paid_compensation_percentage+'<span>% paid</span></td></tr>';
						 }

					leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested From"></i> &nbsp;'+formatDate(leave_from)+'</td></tr>';

					   if(leave_approve_status_edit==1){
						  leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved From"></i> &nbsp; '+formatDate(approve_from)+' </td></tr>';
						 }

					   leaveHTML = leaveHTML + '</table></td><td><table width="100%" border="0" class="" style="margin:0;"><tr><td><i class="fa fa-file-text-o tooltips" data-placement="bottom" data-original-title="Requested till"></i> &nbsp; '+formatDate(leave_to)+'</td></tr>';

					   if(leave_approve_status_edit==1){
						  leaveHTML = leaveHTML + '<tr><td class="font-green-jungle "><i class="fa fa-check tooltips" data-placement="bottom" data-original-title="Approved till"></i> &nbsp;'+formatDate(approve_to)+' </td> </tr>';
						 }

					   //leaveHTML = leaveHTML + '</table></td><td>'+leave_comment+'</td><td class="text-center"><a href="#" data-container="body" data-placement="bottom" data-original-title="Print Leave Application" class="tooltips" ><span aria-hidden="true" class="icon-printer"></span></a> | <a href="#LeaveApproval" data-toggle="modal" data-container="body" data-placement="bottom" data-original-title="Leave Approval" class="tooltips" onClick="updateLeave('+id+')" ><i class="fa fa-check"></i></a></td></tr>';
					
					leaveHTML = leaveHTML + '</table></td><td>'+leave_comment+'</td><td class="text-center"><a onClick="ReWriteLeave('+id+')"><i class="fa fa-edit"></i></a> | <a href="#" data-container="body" data-placement="bottom" data-original-title="Print Leave Application" class="tooltips" ><span aria-hidden="true" class="icon-printer"></span></a> | <a href="#LeaveApproval" data-toggle="modal" data-container="body" data-placement="bottom" data-original-title="Leave Approval" class="tooltips" onClick="updateLeave('+id+')" ><i class="fa fa-check"></i></a> | <a onClick="delectLeave('+id+')"><i class="fa fa-close"></i></a></td></tr>';
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
                callback: function() { }
              },
              
            }
        });
		
		
		
		

   }
   
   
   var delectLeave = function(Action_id)
   {
     
      
	  
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
						
						
						 $('#leave_table > tbody tr').each(function(index) {
							var $this = $(this);
							var filter = $this.attr('data-id');
							var id = Action_id;
							if(filter == id){ $this.remove(); }
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
   var data = jQuery.parseJSON(res);
   $("#Penalties_Contents").html('');
   $("#Penalties_Contents").html(data.h);
   $("#UnAuthLeavePenEdit").modal('toggle');
   }
});
}

   var editPenalty = function(){

      var penalty_title = $('#penalty_title_edit').val();
      var penalty_day =  $('#penalty_day_edit').val();
      var penalty_from = $('#penalty_from_edit').val();
      var penalty_to = $('#penalty_to_edit').val();
      var penalty_description = $('#penalty_description_edit').val();
     
      var penalty_id_edit = $('#penalty_id_edit').val();
     var Staff_id = $('#staff_id_edit').val();
     
      // console.log(penalty_to);

	   bootbox.dialog({
            message: "Are you sure you want to edit this Penalty?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Edit Penalty",
                callback: function() { 
				
				
      if(penalty_id_edit != '' && penalty_title != '' && penalty_from != '' && penalty_to != '' && penalty_day != ''){
         $.ajax({
            type:"POST",
            cache:true,
            url:"{{url('/masterLayout/staff/OverRightPenalties')}}",
            data:{
            "penalty_id_edit":penalty_id_edit,
            "Staff_id":Staff_id,
               "penalty_title":penalty_title,
               "penalty_day":penalty_day,
               "penalty_from":penalty_from,
               "penalty_to":penalty_to,
               "penalty_description":penalty_description,
               "_token":"{{ csrf_token() }}"
            },
            success:function(e){
               var curdate = new Date();
               var hours = AddZeroDate(curdate.getHours());
               var min = AddZeroDate(curdate.getMinutes());
               var time = changeTimeFormat(hours+ ":" +min);
            
            
          
            
            
         $('#penaltyTable > tbody tr').each(function(index) {
            var $this = $(this);
            var filter = $this.attr('data-id');
         var id = penalty_id_edit;
            if(filter == id){
            var leaveHTML = '';
            leaveHTML = leaveHTML + '<tr class="penaltyRowClass" data-id="'+penalty_id_edit+'"><td>'+penalty_title+'</td><td>'+penalty_day+'</td><td>'+formatDate(penalty_from)+'-'+formatDate(penalty_to)+'</td><td>'+formatDate(curdate)+'<span> at <span>'+changeTimeFormat(time)+'</td><td>'+penalty_description+'</td> <td class="text-center"><a onClick="ReWriteLeavePenalties('+penalty_id_edit+')"><i class="fa fa-edit"></i></a> | <a onClick="delectLeavePenalties('+penalty_id_edit+')"><i class="fa fa-close"></i></a> </td> </tr>';
            $(this).replaceWith(leaveHTML);
            }
         });
         $('#penalty_title_edit').val('');
            $('#penalty_day_edit').val('');
            $('#penalty_from_edit').val('');
            $('#penalty_to_edit').val('');
            $('#penalty_description_edit').val('');
         $("#UnAuthLeavePenEdit").modal('toggle');
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
   
var delectLeavePenalties = function(Action_id){
   



 bootbox.dialog({
            message: "Are you sure you want to delete this Absentia?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Remove Absentia",
                callback: function() { 
				
if( Action_id > 0){
   $.ajax({
      type:"POST",
      cache:true,
      url:"{{url('/masterLayout/staff/deletePenalties')}}",
      data:{ "Action_id":Action_id, "_token": "{{ csrf_token() }}" },
      success:function(result){ 
	  
	  $('#penaltyTable > tbody tr').each(function(index) {
	   var $this = $(this);
	   var filter = $this.attr('data-id');
	   var id = Action_id;
	   if(filter == id){ $this.remove(); }

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
   var data = jQuery.parseJSON(res);
   $("#Adjustment_Contents").html('');
   $("#Adjustment_Contents").html(data.h);
   $("#ExceptionalAdjustmentFormEdit").modal('toggle');
   }
});
}
   
   
var editAdjustment = function(){
   
     var adjustment_title = $('#adjustment_title_edit').val();
      var adjustment_no = $('#adjustment_no_edit').val();
      var adjustment_description = $('#adjustment_description_edit').val();
     
     var adjustment_id = $('#adjustment_id_edit').val();
      var staff_id = $('#adjustment_staff_edit').val();
     
      bootbox.dialog({
            message: "Are you sure you want to edit this Adjustment?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Edit Adjustment",
                callback: function() { 
				
      if(adjustment_title != '' && adjustment_no != ''){
         $.ajax({
            type:"POST",
            cache:true,
            data:{
               "adjustment_title":adjustment_title,
               "adjustment_no":adjustment_no,
               "adjustment_description":adjustment_description,
               "staff_id":staff_id,
            "adjustment_id":adjustment_id,
               "_token":"{{csrf_token()}}"
            },
            url:"{{url('/masterLayout/staff/OverRightAdjustment')}}",
            success:function(e){
            var data = JSON.parse(e);
            var Last_id = data.id;
            var date = new Date();
            var hours = AddZeroDate(date.getHours());
            var min = AddZeroDate(date.getMinutes());
            var time = changeTimeFormat(hours+ ":" +min);
            
            $('#adjustment_table > tbody tr').each(function(index) {
            var $this = $(this);
            var filter = $this.attr('data-id');
         var id = Last_id;
            if(filter == id){
            var leaveHTML = '';
            leaveHTML = leaveHTML + '<tr class="AddAdjustment" data-id="'+Last_id+'"><td>'+adjustment_title+'</td><td>'+adjustment_no+'days</td><td>'+formatDate(date)+'<span> at </span>'+time+'</td><td>'+adjustment_description+'</td> <td class="text-center"><a onClick="ReWriteAdjustment('+Last_id+')"><i class="fa fa-edit"></i></a> | <a onClick="deleteAdjustment('+Last_id+')"><i class="fa fa-close"></i></a> </td> </tr>';
            $(this).replaceWith(leaveHTML);
            }
         });
         $('#adjustment_title_edit').val('');
            $('#adjustment_no_edit').val('');
            $('#adjustment_description_edit').val('');
            $('#adjustment_id_edit').val('');
            $('#adjustment_staff_edit').val('');
         $('#ExceptionalAdjustmentFormEdit').modal('toggle');
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
   
var deleteAdjustment = function(Action_id)
{

   
   
   
    bootbox.dialog({
            message: "Are you sure you want to delete this Adjustment?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Remove Adjustment",
                callback: function() { 
				
				
   if( Action_id > 0){
      $.ajax({
         type:"POST",
         cache:true,
         url:"{{url('/masterLayout/staff/deleteAdjustment')}}",
         data:{ "Action_id":Action_id, "_token": "{{ csrf_token() }}" },
         success:function(result){ 
		 
		 
		 
		    $('#adjustment_table > tbody tr').each(function(index) {
			  var $this = $(this);
			  var filter = $this.attr('data-id');
			  var id = Action_id;
			  if(filter == id){ $this.remove(); }
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
   var data = jQuery.parseJSON(res);
   $("#Manual_Form_Entry").html('');
   $("#Manual_Form_Entry").html(data.h);
   $("#ManualAttendanceFormEdit").modal('toggle');
   }
});
}






var edit_manual = function(ID){
   
var date = $("#manual_attendance_edit").val();
var missTap = $("#manual_missTap_edit").val();
var description = $("#manual_description_edit").val();
var Manual_id = $('#manual_id_edit').val();
var Tap_id = $('#tap_id_edit').val();

var Missed_id = $('#Missed_id_edit').val();
var Table_name = $('#Table_name_edit').val();


 bootbox.dialog({
            message: "Are you sure you want to edit this Missed Tap?",
            title: "Please Confirm.",
            buttons: {
              confirm: {
                label: "Yes! Edit Missed Tap",
                callback: function() { 
				
				
				
if(date != '' && missTap != '' && Tap_id != ''){
   $.ajax({
      type:"POST",
      cache:true,
      url:"{{url('/masterLayout/staff/OverRightAddManual')}}",
      data:{
         "Manual_id":Manual_id,
         "Tap_id":Tap_id,
         "Missed_id":Missed_id,
         "Table_name":Table_name,
         "date" : date,
         "missTap" : missTap,
         "description" : description,
         "_token": "{{ csrf_token() }}"
      },
      success:function(result){
        var time = new Date();
        var hours = AddZeroDate(time.getHours());
        var min = AddZeroDate(time.getMinutes());
        time = changeTimeFormat(hours+ ":" +min);
        if(missTap == ''){
          missTap = 'no tap in';
        }else{
          missTap = changeTimeFormat(missTap);
        }
         var r = JSON.parse(result);
         var Last_id = r.id;
         
         var Missed_id = r.Missed_id;
         var Table_name = r.Table_name;
         
        
         $('#manual_table > tbody tr').each(function(index) {
            var $this = $(this);
            var filter = $this.attr('data-id');
         var id = Last_id;
            if(filter == id){
            var leaveHTML = '';
            leaveHTML = leaveHTML + '<tr class="missedTapEven" data-id="'+Last_id+'"><td>'+formatDate(date)+'</td><td>'+missTap+'</td><td><strong>'+ '<small class="tooltips" data-original-title="abridged_name"> name_code </small> - '+ formatDate(date)+'</strong> at <strong>'+time+'</strong></td><td>'+description+'</td><td><a onClick="editAddManual('+Last_id+','+Missed_id+',\''+Table_name+'\')"><i class="fa fa-edit"></i></a> | <a onClick="deleteAddManual('+Last_id+','+Missed_id+',\''+Table_name+'\')"><i class="fa fa-close"></i></a></td> </tr>';
            $(this).replaceWith(leaveHTML);
            }
         });
         
         
         
         $("#manual_attendance_edit").val('');
         $("#manual_missTap_edit").val('');
         $("#manual_description_edit").val('');
         $('#ManualAttendanceFormEdit').modal('toggle');
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




var deleteAddManual = function(Action_id, Missed_id, Table_name)
{

   
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
			 
			 
			 $('#manual_table > tbody tr').each(function(index) {
			  var $this = $(this);
			  var filter = $this.attr('data-id');
			  var id = Action_id;
			  if(filter == id){ $this.remove(); }
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


$(".rolesRelation").click(
	function(){ Staff_Role_Distance() }
);

function Staff_Role_Distance()
{
	$.ajax({
        type:"POST",
        url:"{{url('/masterLayout/staff/role_distance2')}}",
        data:{
			"_token": "{{ csrf_token() }}"
        },
		success:function(res){
		var d =  jQuery.parseJSON(res);
		$("#content_role_position_distance").html('');
		$("#content_role_position_distance").html( d.ht );
		}
	});
		   
		   
		   
}


/* ========================= End Kashif Solangi  */
	
	
};




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
                                loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
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
</script>
<!-- END PAGE LEVEL PLUGINS -->