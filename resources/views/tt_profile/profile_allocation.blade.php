<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ URL::to('/css/profileAllocation.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>TT Profile Allocation</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->







<!-- BEGIN PAGE TITLE-->
<?php /*
<h1 class="page-title"> Dashboard
    <small>dashboard & statistics</small>
</h1>
*/?>
<!-- END PAGE TITLE-->







<!-- BEGIN USE PROFILE -->
<div class="row">
</div>
<!-- END USE PROFILE -->
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-4 borderRightDashed">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered fixed-height-NoScroll marginBottom0">
            <div class="portlet-title padding0">
                <div class="caption">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Staff List</span>
                </div>
                <div class="actions">
                    <div class="btn-group " data-toggle="buttons">
                        <a  class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Allocate Profile" data-toggle="modal" href="#allocateProfileModal">Allocate Profile</a>
                    </div>
                </div>
            </div><!-- portlet-title -->
            <div class="modal fade" id="allocateProfileModal" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                         <h3 class="modal-title">Allocating Profile</h3>
                        </div>
                        <div class="modal-body"> 
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-user"></i><font id="selected_individuals">Selected Individuals - 0</font></div>
                                </div><!-- portlet-title -->
                                <div class="portlet-body fixedHeightmodalPortlet">
                                    <table class="table table-hover table-light" id="staff_allocation_list_table">
                                        <thead>
                                            <tr class="uppercase">
                                                <th colspan="2"> Staff </th>
                                                <th class="text-center" colspan="2"> Profile </th>
                                            </tr>
                                        </thead>
                                        <!-- Static Table Row -->

        
                       
                                        <!-- End Static Table Row -->
                                    </table>
                                    <span id="showAllocationMessage">Staff not selected</span>
                                </div><!-- portlet-body fixedHeightmodalPortlet-->
                            </div>
                            <div class="selectFromHere cl-md-6 col-md-offset-2">
                                <div class="form-group  text-center">
                                    <select id="staffProfiles" class="form-control input-large">
                                        <option>Select Profile</option>
                                        @foreach ($filter['tt_profile'] as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- selectFromHere -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                            <button id="updateAllocateProfile" onclick="updateProfile()" type="button" class="btn dark btn-outline active" data-dismiss="">Allocate</button>
                            <!--button type="button" class="btn green">Add Badge</button -->
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
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
                                <select  data-attribute="profile" multiple="multiple" id="StaffView_Filter_Profile" class="ddlFilterTableRow layout-option form-control input-sm">
                                    @foreach ($filter['tt_profile'] as $d)
                                    <option value="{{ $d->name }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Department </span>
                                <select  data-attribute="department" multiple="multiple" id="StaffView_Filter_Department" class="ddlFilterTableRow layout-option form-control input-sm" >
                                    @foreach ($filter['department'] as $d)
                                    <option value="{{ $d->c_bottomline }}">{{ $d->c_bottomline }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Campus </span>
                                <select  multiple="multiple"  data-attribute="campus" id="StaffView_Filter_Campus" class=" ddlFilterTableRow page-header-option form-control input-sm">
                                    <option value="South">South</option>
                                    <option value="North">North</option>
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



                </div><!-- inputs -->
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-hover table-light" id="staffView_Table_StaffList">
                        <thead>
                            <tr class="uppercase">
                                <th colspan="2"> Staff </th>
                                <th class="text-center" colspan="2"> Profile </th>
                            </tr>
                        </thead>
                        
                        <!-- Static Table Row -->                     

                         @foreach ($staff as $data)
                        <tr style="display: none;" id="map{{ $data->staff_id }}">
                            <td class="fit">
                                <div class="roundedTwo tooltips" style="background:url({{ $data->photo150 }}); background-size: contain;" data-container="body" data-placement="top" data-original-title="16-070">
                                  <input  disabled="disabled" class="allocationCheckbox" onchange="unmarkCheckbox('roundedTwo_{{ $data->staff_id }}', 'roundedTwo{{ $data->staff_id }}', {{ $data->staff_id }}), updateCount()" type="checkbox" value="{{ $data->staff_id }}" id="roundedTwo{{ $data->staff_id }}" name="check[]" />
                                  <label for="roundedTwo{{ $data->staff_id }}"></label>
                                </div>
                            </td>
                            <td>
                                <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->tt_profile_name }}"></a> {{ $data->abridged_name }} - <span class="nameCodeOption tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->atd_title }}">{{ $data->name_code }}</span><br />
                                <small class="shortHeight"> {{ $data->c_topline }}, {{ $data->c_bottomline }}</small>
                            </td>
                            
                             <td class="text-center  staff_{{ $data->staff_id }}" colspan="2">
                                    <span class="nameCodeOption tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->tt_profile_name}}">{{ str_limit($data->tt_profile_name , 20) }}</span>
                                </td>
                                            
                        </tr>
                        <tr class="Row" data-attendance="{{ $data->atd_title }}"   data-campus="{{ $data->campus }}" data-profile="{{ $data->tt_profile_name }}" data-department="{{ $data->c_topline }}, {{ $data->c_bottomline }}">
                            <td class="fit">
                                <div class="roundedTwo tooltips" style="background:url({{ $data->photo150 }}); background-size: contain;" data-container="body" data-placement="top" data-original-title="16-070">
                                  <input  onchange="markCheckbox('roundedTwo{{ $data->staff_id }}', {{ $data->staff_id }} ), updateCount()" type="checkbox" value="{{ $data->staff_id }}" id="roundedTwo_{{ $data->staff_id }}" name="check[]" />
                                    <label for="roundedTwo_{{ $data->staff_id }}"></label>
                                </div>
                            </td>
                            <td>
                                <a onclick="get_tt_profile_time_staff({{ $data->staff_id }})" href="javascript:;" class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="{{ $data->atd_title }}">{{ $data->abridged_name }}</a> - <span class="nameCodeOption tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->email }}">{{ $data->name_code }}</span><br />
                                <small class="shortHeight">{{ $data->c_topline }}</small>
                            </td>
                            <td class="text-center  staff_{{ $data->staff_id }}" colspan="2"> 
                                <span class="nameCodeOption tooltips" data-container="body" data-placement="top" data-original-title="{{ $data->tt_profile_name}}">{{ str_limit($data->tt_profile_name , 20) }}</span>             
                            </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data->name_code }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data->gt_id }} </td>
                            <td class="text-center staff_{{ $data->staff_id }}" style="display:none;"> <span aria-hidden="true"></span> {{ $data->tt_profile_name }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data->c_bottomline }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data->campus }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data->atd_title }} </td>
                            <td class="text-center" style="display:none;"> <span aria-hidden="true"></span> {{ $data->abridged_name }} </td>
                        </tr> 
                        @endforeach   
                        <!-- End Static Table Row -->
                        
                    </table>
                </div><!-- table-scrollable-borderless -->
            </div><!-- portlet-body -->
        </div><!-- portlet -->
    </div><!-- col-md-4 -->
    <div class="col-md-8 fixed-height" id="StudentView_StuInfo">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase">Profile Information</span>
                        </div>
                    </div><!-- portlet-title -->
                    <div class="portlet-body padding20">
                        <div class="form-body">
                            <div class="row marginBottom20">
                                <div class="col-md-12 paddingBottom10" style="padding-bottom:30px !important;">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 text-right paddingRight0">Profile Type:</label>
                                        <div class="col-md-5">
                                            <select onchange="get_tt_profile_time(this)" class="form-control" id="profileTypeSelector1">
                                            <option>Select Profile</option>
                                            @foreach ($filter['tt_profile'] as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                        <div class="visual">
                                            <i class="icon-clock"></i>
                                        </div>
                                        <div class="details" >
                                            <div class="number" id="hoursNmin">
                                                <span data-counter="counterup" data-value="1349" >05 <small class="hoursmin">hours</small> 30 <small class="hoursmin">mins</small></span>
                                            </div>
                                            <div class="desc"> Mon to Thu </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                        <div class="visual">
                                            <i class="icon-clock"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number" id="frihoursNmin">
                                                <span data-counter="counterup" data-value="1349">05 <small class="hoursmin">hours</small> 30 <small class="hoursmin">mins</small></span>
                                            </div>
                                            <div class="desc"> Friday </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                        <div class="visual">
                                            <i class="icon-clock"></i>

                                        </div>
                                        <div class="details">
                                            <div class="number" id="weekhoursNmin">
                                                <span data-counter="counterup" data-value="1349">30 <small class="hoursmin">hours</small> 30 <small class="hoursmin">mins</small></span>
                                            </div>
                                            <div class="desc"> Weekly average </div>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- row -->
                            <h4 class="form-section headingBorderBottom">Profile Details</h4>
                            
                            <div class="row">
                                <div class="col-md-6 paddingBottom10">
                                    <div class="form-group">
                                        <label class="control-label col-md-5 text-right paddingRight0">Profile Name:</label>
                                        <div class="col-md-7">
                                            <input disabled="disabled" type="text" class="form-control profile_name" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6 paddingBottom10">
                                    <div class="form-group">
                                        <label class="control-label col-md-5 text-right paddingRight0">Profile Type:</label>
                                        <div class="col-md-7">
                                            <select disabled="disabled" class="form-control" id="profileTypeSelector">
                                                <option value="">Select</option>
                                                <option value="standardProfile">Standard</option>
                                                <option value="customProfile">Custom</option>
                                                <option value="parttimeProfile">Part Time</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div><!-- -->
                            <div id="standardProfile" class="profileTypeArea">
                                <h4 class="form-section headingBorderBottom">Standard Timings</h4>
                                
                               <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Standard IN:</label>
                                            <div class="col-md-7">
                                                <input name="mon_in" type="time" class="form-control morning" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>                                
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Standard OUT:</label>
                                            <div class="col-md-7">
                                                <input name="thu_out" type="time" class="form-control afternoon" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Monday OUT:</label>
                                            <div class="col-md-7">
                                                 <input name="mon-out" type="time" class="form-control monday" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>                                    

                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Tuesday OUT:</label>
                                            <div class="col-md-7">
                                                 <input name="mon-out" type="time" class="form-control tuesday" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>   

                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Wednesday OUT:</label>
                                            <div class="col-md-7">
                                                 <input name="wed_out" type="time" class="form-control wednesday" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Thursday OUT:</label>
                                            <div class="col-md-7">
                                                 <input name="wed_out" type="time" class="form-control thurday" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Friday OUT:</label>
                                            <div class="col-md-7">
                                                <input name="fri_out" type="time" class="Friday form-control" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div><!-- -->
                                <h4 class="form-section headingBorderBottom">Relaxation</h4>
                                <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">IN Daily Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input name="daily_relax_in" type="number" class="daily_relax_in form-control" placeholder="" id="daily_relax_in">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">OUT Daily Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input name="daily_relax_out" type="number" class="daily_relax_out form-control" id="daily_relax_out">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">IN Monthly Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input name="monthly_relax_in" type="number" class="monthly_relax_in form-control" id="monthly_relax_in">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">OUT Monthly Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input name="monthly_relax_out" type="number" class="monthly_relax_out form-control" id="monthly_relax_out">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section headingBorderBottom">Extension</h4>
                                <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Time:</label>
                                            <div class="col-md-7">
                                                <input name="ext_time" type="time" class="form-control ext_time" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Frequency:</label>
                                            <div class="col-md-7">
                                                <input name="ext_frequency" type="number" class="ext_frequency form-control" placeholder="-">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Flexy Time:</label>
                                            <div class="col-md-7">
                                                <input name="flexy_time" type="time" class="flexy_time form-control" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">July Start:</label>
                                            <div class="col-md-7">
                                                <input name="ext_july" type="date" class="ext_july form-control" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <h4 class="form-section headingBorderBottom">Saturdays</h4>
                                <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Hours:</label>
                                            <div class="col-md-7">
                                                <input name="sat_hrs" type="number" class="sat_hrs form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Off:</label>
                                            <div class="col-md-7">
                                                <input name="sat_on" type="hidden" class="sat_on form-control" placeholder="-">
                                                <input name="sat_off" type="number" class="sat_off form-control" placeholder="-">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Working:</label>
                                            <div class="col-md-7">
                                                <input name="sat_working" type="number" class="sat_working form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                
                                <h4 class="form-section headingBorderBottom">Calculations</h4>
                                <div class="row">
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">M-T Hours: </label>
                                            <div class="col-md-7">
                                                <p class="mon_thu_hrs form-control-static bold"> 06:00:00 </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Fri Hours:</label>
                                            <div class="col-md-7">
                                                <p class="fri_hours form-control-static bold"> 05:30:00 </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Avg Weekly Hours:</label>
                                            <div class="col-md-7">
                                                <p class="weekly_hours form-control-static bold"> 30:30 </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="form-actions">
                                    <button type="submit" id="add_profile" class="btn blue">Add Profile</button>
                                    <button type="button" class="btn default">Clear</button>
                                </div>                                 
                            </div><!-- standardProfile -->
                            <form method='post' id='customProfileForm'>
                            <div id="customProfile" class="profileTypeArea">
                                <h4 class="form-section headingBorderBottom">Custom Timings</h4>
                                <input type="hidden" name="staff_id" id="customProfile_staff_id">
                                <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Custom IN:</label>
                                            <div class="col-md-7">
                                                <input name="mon_in" type="time" class="form-control morning morning_custom" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>                                
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Custom OUT:</label>
                                            <div class="col-md-7">
                                                <input name="thu_out" type="time" class="form-control afternoon afternoon_custom" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Monday OUT:</label>
                                            <div class="col-md-7">
                                                 <input name="wed_out" type="time" class="form-control monday monday_custom" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Tuesday OUT:</label>
                                            <div class="col-md-7">
                                                 <input name="wed_out" type="time" class="form-control tuesday tuesday_custom" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Wednesday OUT:</label>
                                            <div class="col-md-7">
                                                 <input name="wed_out" type="time" class="form-control wednesday wednesday_custom" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Thursday OUT:</label>
                                            <div class="col-md-7">
                                                 <input name="wed_out" type="time" class="form-control thurday thursday_custom" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Friday OUT:</label>
                                            <div class="col-md-7">
                                                <input name="fri_out" type="time" class="Friday Friday_custom form-control" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div><!-- -->
                                <h4 class="form-section headingBorderBottom">Relaxation</h4>
                                <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">IN Daily Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input name="daily_relax_in" type="number" class="daily_relax_in form-control" placeholder="" id="daily_relax_in">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">OUT Daily Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input name="daily_relax_out" type="number" class="daily_relax_out form-control" id="daily_relax_out">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">IN Monthly Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input name="monthly_relax_in" type="number" class="monthly_relax_in form-control" id="monthly_relax_in">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">OUT Monthly Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input name="monthly_relax_out" type="number" class="monthly_relax_out form-control" id="monthly_relax_out">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section headingBorderBottom">Extension</h4>
                                <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Time:</label>
                                            <div class="col-md-7">
                                                <input name="ext_time" type="time" class="form-control ext_time" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Frequency:</label>
                                            <div class="col-md-7">
                                                <input name="ext_frequency" type="number" class="ext_frequency form-control" placeholder="-">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Flexy Time:</label>
                                            <div class="col-md-7">
                                                <input id="flexy_time" name="flexy_time" type="time" class="flexy_time form-control" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">July Start:</label>
                                            <div class="col-md-7">
                                                <input name="ext_july" type="date" class="ext_july form-control" placeholder="07:30 AM">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <h4 class="form-section headingBorderBottom">Saturdays</h4>
                                <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Hours:</label>
                                            <div class="col-md-7">
                                                <input name="sat_hrs" type="number" step="0.01" class="sat_hrs form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Off:</label>
                                            <div class="col-md-7">
                                                <input name="sat_off" type="number" class="sat_off form-control" placeholder="-">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Working:</label>
                                            <div class="col-md-7">
                                                <input name="sat_working" type="number" class="sat_working form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                
                                <h4 class="form-section headingBorderBottom">Calculations</h4>
                                <div class="row">
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">M-T Hours: </label>
                                            <div class="col-md-7">
                                                <p class="mon_thu_hrs form-control-static bold"> 06:00:00 </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Fri Hours:</label>
                                            <div class="col-md-7">
                                                <p class="fri_hours form-control-static bold"> 05:30:00 </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Avg Weekly Hours:</label>
                                            <div class="col-md-7">
                                                <p id="weekly_hours" class="form-control-static bold"> 30:30 </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="form-actions">
                                    <button type="button" onclick="postData('customProfileForm')" id="add_profile" class="btn blue">Add Profile</button>
                                    <button type="button" class="btn default">Clear</button>
                                </div>                                 
                            </div><!-- customProfile --> 
                            </form>
                            <form method='post' id='parttimeProfileForm'>
                            <div id="parttimeProfile" class="profileTypeArea">
                                <input type="hidden" name="staff_id" id="parttimeProfile_staff_id">
                                <h4 class="form-section headingBorderBottom">Part Time Timings</h4>
                                <div class="row marginBottom20">
                                    <div class="col-md-3">
                                    
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3 text-center">
                                        <strong>IN</strong>
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3 text-center">
                                        <strong>OUT</strong>
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Monday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="mon_in" class="mon_in form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="mon_out" class="mon_out  form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Tuesday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="tue_in" class="tue_in form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="tue_out" class="tue_out form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Wednesday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="wed_in" class="wed_in form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="wed_out" class="wed_out form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Thursday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="thu_in" class="thu_in form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="thu_out" class="thu_out form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Friday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input name="fri_in" type="time" class="fri_in form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="fri_out" class="fri_out form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Saturday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="sat_in" class="sat_in form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="sat_out" class="sat_out form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Sunday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="sun_in" class="sun_in form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" name="sun_out" class="sun_out form-control" placeholder="07:30 AM">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="alert alert-success msg-success" style="display: none">
                                    <strong>Success!</strong> Data Insert Successfully.
                                </div>
                                <div class="form-actions">
                                    <button type="button" onclick="postData('parttimeProfileForm')" id="add_profile" class="btn blue">Add Profile</button>
                                    <button type="button" class="btn default">Clear</button>
                                </div>                                
                            </div><!-- parttimeProfile -->
                            </form>                           
                        </div><!-- form-body -->
                        
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->









<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">

    //Create all select box to multi select with checkbox 
    $('#StaffView_Filter_Profile').multiselect({ numberDisplayed: 1 });
    $('#StaffView_Filter_Department').multiselect({ numberDisplayed: 1 });
    $('#StaffView_Filter_Campus').multiselect({ numberDisplayed: 1 });
    
var pagefunction = function() {
    Demo.init();
    App.init();
};
$(function() {
	$('#profileTypeSelector').change(function(){
		$('.profileTypeArea').hide();
		$('#' + $(this).val()).show();
	});
});

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

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php 
/************************************
* Another Example of Script loading
*************************************/ ?>
<script type="text/javascript">
    var pagefunction1 = function() {
        loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", userFormScript);
        function userFormScript() {
        }
    }
    pagefunction();
</script>
<script type="text/javascript">
    var pagefunction = function() {
        loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", userFormScript);
        function userFormScript() {
        }
    }
    pagefunction();
    var updateCount = function updateCount() {
        var numberOfChecked = $('.allocationCheckbox:input:checkbox:checked').length;
        $('#selected_individuals').text('Selected Individuals - '+numberOfChecked);
        if(numberOfChecked == 0){
            $('#showAllocationMessage').text("Staff not selected")
            
        } else {
            $('#showAllocationMessage').text(" ")

        }


        
    }
    $("#staffView_Table_StaffList tr").click(function(){
        $(this).addClass("selected").siblings().removeClass("selected");
    });
    //Multi Filter prototype
    String.prototype.replaceAll = function(search, replacement) {
        var target = this;
        return target.replace(new RegExp(search, 'g'), replacement);
    };

    //Assign table rows to tableRecords
    var tableRecords = $('#staffView_Table_StaffList').find('.Row');
    
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
    
    /*
    *
    * Name : Get TT Profile Time 
    * Description : Get TT Profile Time by profile id 
    *
    */    

    var get_tt_profile_time = function get_tt_profile_time(obj){
        
        $('.morning, .afternoon, .Friday, .sat_hrs, .sat_off, .sat_on, .ext_time, .ext_frequency,.mon_in,.tue_in,.wed_in,.thu_in,.fri_in,.sat_in,.mon_out,.tue_out,.wed_out,.thu_out,.fri_out,.sat_out,.wednesday, .sat_working, .ext_july,.sun_in, .sun_out, .profile_name, .flexy_time ').val('');
        $('#profileTypeSelector option:selected').removeAttr('selected');
        var profile_id =  $("#"+obj.id).val();
        if(profile_id !== ""){
            $.ajax({
                url: "{{url('/ttprofile_allocation/ttProfileTime_get')}}",
                type:"POST",
                cache:true,
                
                data: {
                    '_token': '{{ csrf_token() }}',
                    'profile_id' : profile_id
                },
                success: function (response) {

                    var data = response[0]
                    var profileID = data.profile
                    profileID = profileID.toLowerCase().split(' ').join('')+"Profile";
                    if( profileID == "standardProfile" ){
                        setData(data, profileID)
                        $('.profileTypeArea').hide();
                        $('#'+profileID).show();
                        $('#add_profile').hide();
                        standardCalculation();
                    } if( profileID == "customProfile"){
                        setData(data, profileID)
                        $('.profileTypeArea').hide();
                        $('#'+profileID).show();
                        $('#add_profile').hide();
                        standardCalculation();
                    } if( profileID == "parttimeProfile") {
                        setData(data, profileID)
                        $('.profileTypeArea').hide();
                        $('#'+profileID).show();
                        $('#add_profile').hide();
                        partTimeCalculation();
                    }
                   
                    $('#profileTypeSelector').val(profileID);
                    $('#profileTypeSelector option[value='+profileID+']').attr('selected','selected');
                    $('#' +profileID).show();
                    $('#add_profile').hide();                 

                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(errorThrown)
                }
            });
        }
           

    }
    
    /*
    *
    * Name : Get TT Profile Time Staff
    * Description : Get TT Profile Time Staff by staff id 
    *
    */      
    var get_tt_profile_time_staff = function get_tt_profile_time_staff(staff_id){

        $('#profileTypeSelector option:selected').removeAttr('selected');
        $('.morning, .afternoon, .morning_custom,.monday ,.tuesday ,.wednesday,.thurday, .afternoon_custom,.Friday_custom,.wednesday_custom,.Friday, .sat_hrs, .sat_off, .sat_on, .ext_time, .ext_frequency,.mon_in,.tue_in,.wed_in,.thu_in,.fri_in,.sat_in,.mon_out,.tue_out,.wed_out,.thu_out,.fri_out,.sat_out,.wednesday, .sat_working, .ext_july, .profile_name, .sun_in ,.sun_out, .flexy_time ').val('');

        $('#hoursNmin').html(hoursminTemplate("00", "00"));
        $('#frihoursNmin').html(hoursminTemplate("00", "00"));
        $('#weekhoursNmin').html(hoursminTemplate("00", "00"));

        $.ajax({
            url: "{{url('/ttprofile_allocation/ttProfileTimeStaff_get')}}",
            type:"POST",
            cache:true,
            
            data: {
                '_token': '{{ csrf_token() }}',
                'staff_id' : staff_id
            },
            success: function (response) {
                    
                if(response.length != 0){

                    var data = response[0];

                    if(typeof data.profile !== undefined){
                        var profileID = data.profile
                        profileID = profileID.toLowerCase().split(' ').join('')+"Profile"; 
                        
                        if( profileID == "standardProfile" ){
                            setData(data, profileID)
                            $('.profileTypeArea').hide();
                            $('#'+profileID).show();
                            $('#add_profile').hide();
                            standardCalculation();
                        } if( profileID == "customProfile"){
                            setData(data, profileID)
                            $('.profileTypeArea').hide();
                            $('#'+profileID).show();
                            $('#add_profile').show();
                            standardCalculation();
                        } if( profileID == "parttimeProfile") {
                            setData(data, profileID)
                            $('.profileTypeArea').hide();
                            $('#'+profileID).show();
                            $('#add_profile').show();
                            partTimeCalculation();
                        }
                    }
                    
                    $('#parttimeProfile_staff_id').val(staff_id); 
                    $('#customProfile_staff_id').val(staff_id); 
                    $('#profileTypeSelector').val(profileID);
                    $('#profileTypeSelector option[value='+profileID+']').attr('selected','selected');
                     $('#profileTypeSelector1 option')[0].selected = true;
                    $('#' +profileID).show();
                    
                } else {
                    $('.profileTypeArea').hide();
                }

                

            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(errorThrown)
            }
        });           

    }

    /*
    *
    * Name : Set Data
    * Description : Set data on form which is get from api
    *
    */
    var setData = function setData(data,type){
        console.log(data);
        if(type != "parttimeProfile"){

            if(data.is_on_mon == 1){
                $('.morning').val(data.mon_in);
                $('.monday').val(data.mon_out);
            }

            if(data.is_on_mon == 1){
                $('.morning').val(data.mon_in);
                $('.afternoon').val(data.standard_out);
                console.log("fa"+data.standard_out);
            }

            if(data.is_on_tue == 1){
                $('.tuesday').val(data.tue_out);
            }

            if (data.is_on_wed == 1) {
                $('.wednesday').val(data.wed_out);
            }

            if (data.is_on_thu == 1) {
                $('.thurday').val(data.thu_out);
            }
            if (data.is_on_fri == 1) {
                $('.Friday').val(data.fri_out);
            }
            if(data.use_ext != 0){
                $('.ext_time').val(data.ext_time);
            }
            if(data.ext_frequency != 0){
                $('.ext_frequency').val(data.ext_frequency);
            }
            if(data.ext_july != '1970-01-01'){
                $('.ext_july').val(data.ext_july);
            }
            if(data.sat_hrs != 0){
                $('.sat_hrs').val(data.sat_hrs);
            }
            if(data.sat_off != 0){
                $('.sat_off').val(data.sat_off);
            }
            if(data.sat_working != 0){
                $('.sat_working').val(data.sat_working);
            }
            if(data.is_on_flexy == 1){
                $('.flexy_time').val(data.flexy_time);
            } 
            
            $('.sat_on').val(data.sat_on);                          
            $('.profile_name').val(data.profile_name);
            $('.daily_relax_in').val(data.daily_relax_in);
            $('.daily_relax_out').val(data.daily_relax_out);
            $('.monthly_relax_in').val(data.monthly_relax_in);
            $('.monthly_relax_out').val(data.monthly_relax_out); 

        } else {
            if(data.is_on_mon == 1){
                $('.mon_in').val(data.mon_in);
                $('.mon_out').val(data.mon_out);
            }
            if(data.is_on_tue == 1){
                $('.tue_in').val(data.tue_in);
                $('.tue_out').val(data.tue_out);
            }
            if(data.is_on_wed == 1){
                $('.wed_in').val(data.wed_in);
                $('.wed_out').val(data.wed_out);
            }
            if(data.is_on_thu == 1){
                $('.thu_in').val(data.thu_in);
                $('.thu_out').val(data.thu_out);
            }
            if(data.is_on_fri == 1){
                $('.fri_in').val(data.fri_in);
                $('.fri_out').val(data.fri_out);
            }
            if(data.is_on_sat == 1){
                $('.sat_in').val(data.sat_in);
                $('.sat_out').val(data.sat_out);
            }
            if(data.is_on_sun == 1){
                $('.sun_in').val(data.sun_in);
                $('.sun_out').val(data.sun_out);
            }
            $('.profile_name').val(data.profile);
  
        }

    }


    /*
    *
    * Name : Update Profile
    * Description : Update profile by profile allocation modal
    *
    */

    var updateProfile = function updateProfile(){

        $('#updateAllocateProfile').prop('disabled', true);
        var staff_profile = $( "#staffProfiles" ).val();
        var checked_vals = $('.allocationCheckbox:input:checkbox:checked').map(function() {
            return this.value;
        }).get();

        var staff_ids = checked_vals.join(",")
        
        
        if( staff_ids != "" && staff_profile != "Select Profile"){
            
            $.ajax({
                url: "{{url('/ttprofile_allocation/ttProfile_update')}}",
                type:"POST",
                cache:true,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'staff_ids' : staff_ids,
                    'staff_profile' : staff_profile
                },
                success: function (response) {
                    staff_ids = staff_ids.split(",");
                    //Replace staff profile from table 
                    for (var i = 0; i < staff_ids.length; i++) {
                        $(".staff_"+staff_ids[i]).text($("#staffProfiles option[value="+staff_profile+"]").text());
                        $(".staff_"+staff_ids[i]).data('profile',$("#staffProfiles option[value="+staff_profile+"]").text());

                    }
                    
                    $('#staffProfiles option')[0].selected = true;
                    $('input:checkbox').prop('checked', false);
                    $('#allocateProfileModal').modal('toggle');
                    $('#updateAllocateProfile').prop('disabled', false);
                    $( "#staff_allocation_list_table tr" ).remove();
                    $('#selected_individuals').text('Selected Individuals - 0');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(errorThrown)
                }
            });      

        }
    }

    /*
    *
    * Name : Set Part Time Is On
    * Description : Set is_on values for each day if their in and out time are set
    *
    */

    var setPartTimeIsOn = function setPartTimeIsOn(data){


        if( $('.mon_in').val() !== "" && $('.mon_out').val() !== "" ){
            data["is_on_mon"] = 1; 
        }else{
            data["is_on_mon"] = 0;
        }
        if( $('.tue_in').val() !== "" && $('.tue_out').val() !== ""  ){
            data["is_on_tue"] = 1; 
        }else{
            data["is_on_tue"] = 0;
        }
        if( $('.wed_in').val() !== "" && $('.wed_out').val() !== ""  ){
            data["is_on_wed"] = 1; 
        }else{
             data["is_on_wed"] = 0;
        }
        if( $('.thu_in').val() !== "" && $('.thu_out').val() !== ""  ){
            data["is_on_thu"] = 1; 
        }else{
            data["is_on_thu"] = 0;
        }
        if( $('.fri_in').val() !== "" && $('.fri_out').val() !== ""  ){
            data["is_on_fri"] = 1; 
        }else{
            data["is_on_fri"] = 0;
        }
        if( $('.sat_in').val() !== "" && $('.sat_out').val() !== ""  ){
            data["is_on_sat"] = 1; 
        }else{
            data["is_on_sat"] = 0;
        }
        if( $('.sun_in').val() !== "" && $('.sun_out').val() !== ""  ){
            data["is_on_sun"] = 1; 
        }else{
            data["is_on_sun"] = 0;
        }
        return data;
    }

    /*
    *
    * Name : Set Custom Is On
    * Description : Set is_on values for each day if their in and out time are set
    *
    */

    var setCustomIsOn = function setCustomIsOn(data){
        
        if( $('.morning_custom').val() !== "" ){
            data["mon_in"] = $('.morning_custom').val();
            data["tue_in"] = $('.morning_custom').val();
            data["thu_in"] = $('.morning_custom').val();
            //data["wed_in"] = $('.morning_custom').val();
            data["fri_in"] = $('.morning_custom').val();
            data["sun_in"] = $('.morning_custom').val();
            data["is_on_mon"] = 1; 
        } else{
            data["is_on_mon"] = 0;

        }

        if( $('.afternoon_custom').val() !== "" ){
            data["mon_out"] = $('.afternoon_custom').val();
            console.log("data[]"+data["mon_out"])
            data["tue_out"] = $('.afternoon_custom').val();
            data["thu_out"] = $('.afternoon_custom').val();
            data["is_on_thu"] = 1;  
        } else{
            data["is_on_thu"] = 0; 
        } 

        if( $('.wednesday_custom').val() !== "" ){
            data["wed_out"] = $('.wednesday_custom').val();
            data["is_on_wed"] = 1;  
        } else {
            data["is_on_wed"] = 0;
        }

        if( $('.Friday_custom').val() !== "" ){
            data["fri_out"] = $('.Friday_custom').val();
            data["is_on_fri"] = 1;  
        } else {
            data["is_on_fri"] = 0;
        }

        var fromdt="2017/01/01 " + $('#flexy_time').val();
        var todt="2017/01/01 " + $('.morning_custom').val();
        var from = new Date(Date.parse(fromdt));
        var to = new Date(Date.parse(todt));

        if (from > to){
            data["is_on_flexy"] = 1; 
        } else {
            data["is_on_flexy"] = 0;       
        }


        return data;
    }
    /*
    *
    * Name : Post Data
    * Description : Update form data using form id
    *
    */

    var postData = function postData(form_id){ 
        
        var $inputs = $('#'+form_id +' :input');
        var data = {};
        $inputs.each(function() {
            if(this.name != ""){
                data[this.name] = $(this).val();
            }            
        });   
        data['_token'] = '{{ csrf_token() }}';
        data['form_type'] = form_id;
        
        //Set is_on values for week days
        if(form_id == "parttimeProfileForm"){
            data = setPartTimeIsOn(data);
        } else if(form_id == "customProfileForm") {
            data = setCustomIsOn(data);
        }
       
        $.ajax({
            url: "{{url('/ttprofile_allocation/ttCustomProfile_update')}}",
            type:"POST",
            cache:true,
            data: data,
            success: function (response) {
                $('.msg-success').show();
                $(".msg-success").fadeOut(3000);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(errorThrown)
            }
        });             
    } 

    /*
    *
    * Name : Hours Min Template
    * Description : Set hours and minute template for report
    *
    */
    var hoursminTemplate = function hoursminTemplate(hr, min){
        
        var html =  hr + '<span data-counter="counterup" data-value="1349" > <small class="hoursmin">hours</small> '+ min +' <small class="hoursmin">mins</small></span>';
        return html;
    }

   // PART TIME CALCULATED
    $(document).on('keypress change keyup','.mon_in,.tue_in,.wed_in,.thu_in,.fri_in,.sat_in,.mon_out,.tue_out,.wed_out,.thu_out,.fri_out,.sat_out',function(f){

        partTimeCalculation();
    });
    var partTimeCalculation = function partTimeCalculation(){

           var mon_in= $('.mon_in').val();
           var mon_out = $('.mon_out').val();
           var tue_in = $('.tue_in').val();
           var tue_out = $('.tue_out').val();
           var wed_in = $('.wed_in').val();
           var wed_out = $('.wed_out').val();
           var thu_in = $('.thu_in').val();
           var thu_out = $('.thu_out').val();
           var fri_in = $('.fri_in').val();
           var fri_out = $('.fri_out').val();
           var sat_in = $('.sat_in').val();
           var sat_out = $('.sat_out').val();


          if(fri_in.length != 0 && fri_out.length != 0){
            var p = "1/1/1970 ";
            difference = new Date(new Date(p+fri_out) - new Date(p+fri_in)).toUTCString().split(" ")[4];           
            $('#part_time_fri').text(difference);
          }


          // Monday Time Difference Calculation

          var time_out_mon;
          var time_in_mon;

          if(mon_in.length != '0' && mon_out.length != '0'){
            time_out_mon = mon_out;
          }else{
            time_out_mon = '00:00:00';
          }

          if(mon_in.length != '0' && mon_out.length != '0'){
            time_in_mon = mon_in;
          }else{
            time_in_mon = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_mon = new Date(new Date(p+time_out_mon) - new Date(p+time_in_mon)).toUTCString().split(" ")[4];
          console.log(difference_mon);


          // Tuesday Time Difference Calculation

          var time_out_tue;
          var time_in_tue;

          if(tue_out && tue_in){
            time_out_tue = tue_out;
          }else{
            time_out_tue = '00:00:00';
          }

          if(tue_out && tue_in){
            time_in_tue = tue_in;
          }else{
            time_in_tue = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_tue = new Date(new Date(p+time_out_tue) - new Date(p+time_in_tue)).toUTCString().split(" ")[4];


          // // Wednesday Time Difference Calculation

          var time_out_wed;
          var time_in_wed;

          if(wed_out && wed_in){
            time_out_wed = wed_out;
          }else{
            time_out_wed = '00:00:00';
          }

          if(wed_out && wed_in){
            time_in_wed = wed_in;
          }else{
            time_in_wed = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_wed = new Date(new Date(p+time_out_wed) - new Date(p+time_in_wed)).toUTCString().split(" ")[4];


          // // Thursday Time Difference Calculation

          var time_out_thu;
          var time_in_thu;

          if(thu_out && thu_in){
            time_out_thu = thu_out;
          }else{
            time_out_thu = '00:00:00';
          }

          if(thu_out != 0 && thu_in != 0){
            time_in_thu = thu_in;
          }else{
            time_in_thu = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_thu = new Date(new Date(p+time_out_thu) - new Date(p+time_in_thu)).toUTCString().split(" ")[4];


          // // Friday Time Difference Calculation

          var time_out_fri;
          var time_in_fri;

          if(fri_out && fri_in){
            time_out_fri = fri_out;
          }else{
            time_out_fri = '00:00:00';
          }

          if(fri_out && fri_in){
            time_in_fri = fri_in;
          }else{
            time_in_fri = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_fri = new Date(new Date(p+time_out_fri) - new Date(p+time_in_fri)).toUTCString().split(" ")[4];
            var friTime = difference_fri.split(":");
            
          $('#frihoursNmin').html(hoursminTemplate(friTime[0], friTime[1]));


          // Saturday Time Difference Calculation

          var time_out_sat;
          var time_in_sat;

          if(sat_out.length != 0 && sat_in.length != 0){
            time_out_sat = sat_out;
          }else{
            time_out_sat = '00:00:00';
          }

          if(sat_out.length != 0 && sat_in.length != 0){
            time_in_sat = sat_in;
          }else{
            time_in_sat = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_sat = new Date(new Date(p+time_out_sat) - new Date(p+time_in_sat)).toUTCString().split(" ")[4];
          console.log(difference_sat);


          
          // Calculated Total Average Weekly Hours


           var time1 = difference_mon;
           var time2 = difference_tue;
           var time3 = difference_wed;
           var time4 = difference_thu;
           var time5 = difference_fri;
           var time6 = difference_sat;
            
            var hour=0;
            var minute=0;
            var second=0;
            
            var splitTime1= time1.split(':');
            var splitTime2= time2.split(':');
            var splitTime3= time3.split(':');
            var splitTime4= time4.split(':');
            var splitTime5= time5.split(':');
            var splitTime6= time6.split(':');

            
            mins = Number(splitTime1[1]) + Number(splitTime2[1]) + Number(splitTime3[1]) + Number(splitTime4[1]) + Number(splitTime5[1]) + Number(splitTime6[1]);
            minhrs = Math.floor(parseInt(mins / 60));
            hrs = Number(splitTime1[0]) + Number(splitTime2[0]) + Number(splitTime3[0]) + Number(splitTime4[0]) + Number(splitTime5[0]) + Number(splitTime6[0]) + minhrs;
            mins = mins % 60;
            t1 = hrs+':'+mins;

            var spliting = t1.split(':');
            var weekHtml = "";
            if(spliting[1].length == 1){
              t1 = hrs+':'+'0'+mins;
              weekHtml = hoursminTemplate(hrs, '0'+mins)
            }else{
              t1 = hrs+':'+mins;
              weekHtml = hoursminTemplate(hrs, mins)
            }

            $('#weekhoursNmin').html(weekHtml);



            // Calculated Mon Thursday Hours

            mins = Number(splitTime1[1]) + Number(splitTime2[1]) + Number(splitTime3[1]) + Number(splitTime4[1]);
            minhrs = Math.floor(parseInt(mins / 60));
            hrs = Number(splitTime1[0]) + Number(splitTime2[0]) + Number(splitTime3[0]) + Number(splitTime4[0])  + minhrs;
            mins = mins % 60;
            var mon_thu = hrs+':'+mins;

            var spliting = mon_thu.split(':');
            var html = "";
            if(spliting[1].length == 1){
                mon_thu = hrs+':'+'0'+mins;
                html = hoursminTemplate(hrs, '0'+mins);

            } else{
                html = hoursminTemplate(hrs, mins);
                mon_thu = hrs+':'+mins;
            }
            $('#hoursNmin').html(html)

    }
    $(document).on('keypress change keyup','.morning, .afternoon, .Friday, .sat_hrs, .sat_off, .sat_on, .ext_time, .ext_frequency, .afternoon_custom , .morning_custom , .Friday_custom',function(f){

        standardCalculation();
    });    
    var standardCalculation = function standardCalculation(){
      var profile_type = $('#profileTypeSelector').val();
      var morning_time = profile_type == 'customProfile' ? $('.morning_custom').val() :  $('.morning').val();
      var afternoon_time = profile_type == 'customProfile' ? $('.afternoon_custom').val() : $('.afternoon').val();
      var fri_time = profile_type == 'customProfile' ? $('.Friday_custom').val() : $('.Friday').val();

      //console.log("fri_hours"+fri_hours);

      var mon_time = $('.monday').val();
      var tue_time = $('.tuesday').val();
      var wed_time = $('.wednesday').val();
      var thus_time = $('.thurday').val();

      var sat_hours = $('.sat_hrs').val();
      var sat_off = $('.sat_off').val();
      var sat_on = $('.sat_on').val();
      var ext_time = $('.ext_time').val();
      var ext_frequency = $('.ext_frequency').val();
   
          
   
       // if(morning_time.length != 0 && afternoon_time.length != 0){
       //  var p = "1/1/1970 ";
       //  difference_mt = new Date(new Date(p+afternoon_time) - new Date(p+morning_time)).toUTCString().split(" ")[4];
       //  difference_f = new Date(new Date(p+fri_hours) - new Date(p+morning_time)).toUTCString().split(" ")[4];
       //  var mon_thu_time = difference_mt.split(":");

       //  $('.mon_thu_hrs').text(difference_mt);
       //  console.log("hoursNMin"+difference_f);
       //  $('#hoursNmin').html(hoursminTemplate(mon_thu_time[0], mon_thu_time[1]));   
              
       //    var t1 = difference_mt.split(':');
       //    var t2 = difference_f.split(':');
       //    console.log(difference_f);
       //    if(difference_f == '17:00:00'){
       //      t2 = "00:00:00";
       //    }
       //    mins = Number(t1[1]*4) + Number(t2[1]);
       //    minhrs = Math.floor(parseInt(mins / 60));
       //    hrs = Number(t1[0]*4) + Number(t2[0]) + minhrs;
       //    mins = mins % 60;
       //    t1 = hrs + ':' + mins

       //    if(sat_on.length > 0){
       //    var sat = sat_hours * sat_on;
       //    sat = sat/4;
       //    console.log(sat);
       //    var n = new Date(0,0);
       //    n.setSeconds(+sat * 60 * 60);
       //    var sat_avg = (n.toTimeString().slice(0, 8));
       //  }else{

       //    var sat = sat_hours * (4-sat_off);
       //    sat = sat/4;
       //    var n = new Date(0,0);
       //    n.setSeconds(+sat * 60 * 60);
       //    var sat_avg = (n.toTimeString().slice(0, 8));

       //  }

       //  if(ext_frequency.length > 0){
       //    var p = "1/1/1970 ";
       //    difference_ext = new Date(new Date(p+ext_time) - new Date(p+afternoon_time)).toUTCString().split(" ")[4];
       //    var arr = difference_ext.split(':');
       //    var ext_working_hours =  parseFloat(parseInt(arr[0], 10) + '.' + parseInt((arr[1]/6)*10, 10));
       //    ext_working_hours = ext_working_hours * ext_frequency;
       //    var n = new Date(0,0);
       //    n.setSeconds(+ext_working_hours * 60 * 60);
       //    var ext_avg = (n.toTimeString().slice(0, 8));
       //    console.log(ext_avg);
       //  }else{
       //    var  ext_avg = '00:00:00';
       //  }


       //    var time1 = t1;
       //    var time2 = sat_avg;
       //    var time3 = ext_avg;
          
       //    var hour=0;
       //    var minute=0;
       //    var second=0;
          
       //    var splitTime1= time1.split(':');
       //    var splitTime2= time2.split(':');
       //    var splitTime3= time3.split(':');

       //    console.log(splitTime1);
       //    console.log(splitTime2);
       //    console.log(splitTime3);

       //    mins = Number(splitTime1[1]) + Number(splitTime2[1]) + Number(splitTime3[1]);
       //    minhrs = Math.floor(parseInt(mins / 60));
       //    hrs = Number(splitTime1[0]) + Number(splitTime2[0]) + Number(splitTime3[0]) + minhrs;
       //    mins = mins % 60;
       //    t1 = hrs+':'+mins;
              
       //      $('#weekhoursNmin').html(hoursminTemplate(hrs, mins));
       //      $('#weekly_hours').text(t1);
       //      }

       //     // Standard Friday Timing
       //      if(fri_hours.length != 0){
       //      difference = new Date(new Date(p+fri_hours) - new Date(p+morning_time)).toUTCString().split(" ")[4];
       //      $('.fri_hours').text(difference);
       //      var fri_time = difference.split(":");
       //      $('#frihoursNmin').html(hoursminTemplate(fri_time[0], fri_time[1]));
       //      }

         var average_weekly_time = [];
        var friday_weekly_time = [];

        // Mon time
        if(morning_time.length != 0 && mon_time.length != 0){
            average_weekly_time.push(time_difference(morning_time,mon_time));
        }

        // Tue Time
        if(morning_time.length != 0 && tue_time.length != 0){
            average_weekly_time.push(time_difference(morning_time,tue_time));
        }

        // Wed Time
        if(morning_time.length != 0 && wed_time.length != 0){
            average_weekly_time.push(time_difference(morning_time,wed_time));
        }

        // Thurs Time
        if(morning_time.length != 0 && thus_time.length != 0){
            average_weekly_time.push(time_difference(morning_time,thus_time));
        }

        // Fri Time
        if(morning_time.length != 0 && fri_time.length != 0){
            friday_weekly_time.push(time_difference(morning_time,fri_time));
        }


        var hour_minute =  sum_time(average_weekly_time);
        var hour_minute_friday = sum_time(friday_weekly_time);


        // Pasting the Mon Thursday Hour

        // $('#counter_mon_thu_hrs').text(hour_minute.hour);
        // $('#counter_mon_thu_min').text(hour_minute.minute);

        $('#hoursNmin').html(hoursminTemplate(hour_minute.hour, hour_minute.minute));

        // Pasting Average Mon Thursday hour in below

        // $('#cus_mon_thu_hrs').text((hour_minute.hour+":"+hour_minute.minute));  

        // Pasting the Friday Hour

        // $('#counter_fri_hrs').text(hour_minute_friday.hour);
        // $('#counter_fri_min').text(hour_minute_friday.minute);

         $('#frihoursNmin').html(hoursminTemplate(hour_minute_friday.hour, hour_minute_friday.minute));

        // Pasting Friday hour in below

        // $('#cus_fri_hrs').text((hour_minute_friday.hour+":"+hour_minute_friday.minute));


        var p = "1/1/1970 ";
        difference_mt = new Date(new Date(p+afternoon_time) - new Date(p+morning_time)).toUTCString().split(" ")[4];
        difference_f = new Date(new Date(p+afternoon_time) - new Date(p+morning_time)).toUTCString().split(" ")[4];
        

        var t1 = difference_mt.split(':');
        var t2 = difference_f.split(':');
        if(difference_f == '17:00:00'){
            t2 = "00:00:00";
        }
        mins = Number(t1[1]*4) + Number(t2[1]);
        minhrs = Math.floor(parseInt(mins / 60));
        hrs = Number(t1[0]*4) + Number(t2[0]) + minhrs;
        mins = mins % 60;
        t1 = hrs + ':' + mins

        if(sat_on.length > 0){
            var sat = sat_hours * sat_on;
            sat = sat/4;
            var n = new Date(0,0);
            n.setSeconds(+sat * 60 * 60);
            var sat_avg = (n.toTimeString().slice(0, 8));
        }else{
            var sat = sat_hours * (4-sat_off);
            sat = sat/4;
            var n = new Date(0,0);
            n.setSeconds(+sat * 60 * 60);
            var sat_avg = (n.toTimeString().slice(0, 8));
        }

          if(ext_frequency.length > 0){
            var p = "1/1/1970 ";
            difference_ext = new Date(new Date(p+ext_time) - new Date(p+custom_afternoon)).toUTCString().split(" ")[4];
            var arr = difference_ext.split(':');
            var ext_working_hours =  parseFloat(parseInt(arr[0], 10) + '.' + parseInt((arr[1]/6)*10, 10));
            ext_working_hours = ext_working_hours * ext_frequency;
            var n = new Date(0,0);
            n.setSeconds(+ext_working_hours * 60 * 60);
            var ext_avg = (n.toTimeString().slice(0, 8));
            console.log(ext_avg);
          }else{
            var  ext_avg = '00:00:00';
          }

            var time1 = t1;
            var time2 = sat_avg;
            var time3 = ext_avg;
            
            var hour=0;
            var minute=0;
            var second=0;
            
            var splitTime1= time1.split(':');
            var splitTime2= time2.split(':');
            var splitTime3= time3.split(':');

            mins = Number(splitTime1[1]) + Number(splitTime2[1]) + Number(splitTime3[1]);
            minhrs = Math.floor(parseInt(mins / 60));
            hrs = Number(splitTime1[0]) + Number(splitTime2[0]) + Number(splitTime3[0]) + minhrs;
            mins = mins % 60;
            t1 = hrs+':'+mins;

            $('#weekhoursNmin').html(hoursminTemplate(hrs, mins));
          
    }

     // Calculating difference In Attendance

    function time_difference(morning_time,out_time){
        var p = "1/1/1970 ";
        difference = new Date(new Date(p+out_time) - new Date(p+morning_time)).toUTCString().split(" ")[4];
        return difference;
    }

   // Convert a time in hh:mm format to minutes
    function timeToMins(time) {
      var b = time.split(':');
      return b[0]*60 + +b[1];
    }

    // Convert minutes to a time in format hh:mm
    // Returned value is in range 00  to 24 hrs
    function timeFromMins(mins) {
      function z(n){return (n<10? '0':'') + n;}
      var h = (mins/60 |0) % 24;
      var m = mins % 60;
      return z(h) + ':' + z(m);
    }

    // Add two times in hh:mm format
    function addTimes(t0, t1) {
      return timeFromMins(timeToMins(t0) + timeToMins(t1));
    }

    // Sum of Time

    function sum_time(time_array){

        // New Function of add array
        
        var time =  [];
        var hour = [];
        var minute = [];
        var second = [];
        var splitTime1 = [];
        var splitTime2 = [];
        var splitTime3 = [];

        for (var i = 0 ; i < time_array.length; i++){
            splitTime1.push(time_array[i].split(':'));
        }

        for (var j = 0 ; j < time_array.length ; j++){
          
                hour.push(splitTime1[j][0]);
                minute.push(splitTime1[j][1]);
                second.push(splitTime1[j][2]);
        }



        var sum_of_hour = 0;
        var sum_of_minute = 0;
        var sum_of_second = 0;
        var calculate_hour = 0;
        var calculate_minute = 0;


        // Sum of Hours
        for (var i = 0 ; i < hour.length;i++){
            sum_of_hour += parseInt(hour[i]);
        }

        // Sum of minute

        for(var i = 0 ; i < minute.length; i++){
            sum_of_minute += parseInt(minute[i]);
        }


        hour = sum_of_hour + sum_of_minute/60;
        minute = sum_of_minute%60;

        var mon_thurs_avg_hour = {
            hour:parseInt(hour),
            minute:minute
        };

        return mon_thurs_avg_hour;


    }


    var markCheckbox= function markCheckbox( id, staff_id ){
        if ($('#'+id).is(':checked')) {
            $('#'+id).prop("disabled", true);
            $('#'+id).prop('checked', false);
            $('#allocation_staff_'+staff_id).remove();

        } else{
            var staff_template =  $( "#map"+staff_id ).html();
            $( "#staff_allocation_list_table" ).append( '<tr id="allocation_staff_'+staff_id+'" >' + staff_template + '</tr>' );
            $('#'+id).prop("disabled", false);
            $('#'+id).prop('checked', true);
        }
    }  
    var unmarkCheckbox= function unmarkCheckbox( id, checkBox_id, staff_id ){
        if ($('#'+id).is(':checked')) {
            $('#'+checkBox_id).prop("disabled", true);
            $('#'+id).prop('checked', false);
            $('#allocation_staff_'+staff_id).remove();

        } 
    }
    
    /***** BEGIN - Cancel filter searching *****/
    $('#staffView_filter_btn .clearFilter').click(function() {
        
        //Remove mark
        removeMark();

        //Deselect all if selected 
        $('#StaffView_Filter_Profile').multiselect("deselectAll", false).multiselect("refresh");
        $('#StaffView_Filter_Department').multiselect("deselectAll", false).multiselect("refresh");
        $('#StaffView_Filter_Campus').multiselect("deselectAll", false).multiselect("refresh");


        $('#StaffView_Filter_Profile').val('');
        $('#StaffView_Filter_Department').val('');
        $('#StaffView_Filter_Campus').val('');
        

        $('#staffView_StaffList_Search').val('');
        tableRecords = $('#staffView_Table_StaffList').find('.Row');
        tableRecords.show();

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
    });                   
</script>
<!-- END PAGE LEVEL PLUGINS -->