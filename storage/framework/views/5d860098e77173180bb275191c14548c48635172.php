<link href="<?php echo e(URL::to('/css/ProfileDefinition.css')); ?>" rel="stylesheet" type="text/css" />
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #d4d4d4 !important;
}
</style>
<!-- Weekly Timesheet CSS END  -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>TT Profile Definition</span>
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

<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-4 borderRightDashed">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered fixed-height marginBottom0 padding0 fixed-height-NoScroll">
            
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Staff Profile</span>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                            <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Add new profile" id="profileDefinationAdd">Add New Profile</button>
                    </div>
                </div>
            </div>
            <div class="portlet-body customPadding">
                <div class="inputs">
                    <div class="portlet-input">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input id="staffView_StaffList_Search" type="text" class="form-control form-control-solid" placeholder="Search..."> </div>
                    </div>
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

                            <div class="theme-option text-center" id="staffView_search_btn">
                                <a href="javascript:;" class="btn uppercase green-jungle applySort">Apply Sorters</a>
                                <a href="javascript:;" class="btn uppercase grey-salsa clearSearch">Clear Sorters</a>
                            </div>
                            
                        </div><!-- theme-options -->
                    </div>
                    <!-- updated sorter -->



                    
                </div><!-- inputs -->
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-hover table-light" id="table_staffList">

                        <!-- End Profile Allocated Detail -->
                    </table>
                </div>
            </div><!-- portlet-body -->
        </div><!-- portlet -->
    </div><!-- col-md-4 -->
    <div class="col-md-8 fixed-height" id="profileDetail_Left" style="display:none">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile"></span>
                        </div>
                    </div><!-- portlet-title -->
                    <div class="portlet-body padding20">
                        <div class="form-body">
                        <div class="alert alert-success callout" style="display:none">
                            <strong>Success!</strong> The Profile has been inserted.
                        </div>
                        <form action=""  id="profileDefination_form">
                            <div class="row marginBottom20">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                        <div class="visual">
                                            <i class="icon-clock"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup"  id="counter_mon_thu_hrs">0 </span><small class="hoursmin"> &nbsp;hours</small> &nbsp;<span id="counter_mon_thu_min">0 </span><small class="hoursmin"> &nbsp;mins</small>
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
                                            <div class="number">
                                                <span data-counter="counterup"  id="counter_fri_hrs">0 </span><small class="hoursmin"> &nbsp;hours</small> &nbsp;<span id="counter_fri_min">0 </span><small class="hoursmin"> &nbsp;mins</small>
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
                                            <div class="number">
                                                <span data-counter="counterup" data-value="1349" id="counter_avg_hrs">0 </span><small class="hoursmin"> &nbsp;hours</small> &nbsp;<span id="counter_avg_min">0 </span><small class="hoursmin"> &nbsp;mins</small>
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
                                            <input type="text" class="form-control" name="profileDefination_name" id="profileDefination_name" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 paddingBottom10">
                                    <div class="form-group">
                                        <label class="control-label col-md-5 text-right paddingRight0">Profile Type:</label>
                                        <div class="col-md-7">
                                            <select class="form-control" id="profileTypeSelector" name="profileDefination_type">
                                                <option value="">Select</option>
<!--                                                 <option value="standardProfile" data-profileDefination-type="1">Standard</option>
                                                <option value="customProfile" data-profileDefination-type="2">Custom</option>
                                                <option value="parttimeProfile" data-profileDefination-type="3">Part Time</option> -->

                                                <?php $__currentLoopData = $profile_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($profile_type->javascript_displayToggle); ?>" data-profileDefination-type="<?php echo e($profile_type->id); ?>"><?php echo e($profile_type->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
                                            <label class="control-label col-md-5 text-right paddingRight0">Standard IN <span class="required">*</span>:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name="morning_time" id="morning_time">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Standard OUT <span class="required">*</span>:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name="afternoon_time" id="afternoon_time">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <!--/span-->
                                     <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Monday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name='mon_time' id="mon_time">
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
                                                <input type="time" class="form-control" name='tues_time' id="tues_time">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Wednesday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name='wed_time' id="wed_time">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Thursday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name="thus_time" id="thus_time">
                                            </div>
                                        </div>
                                    </div>

                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Friday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name="fri_time" id="fri_time">
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
                                                <input type="number" class="form-control" placeholder="" id="std_daily_relax_in">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">OUT Daily Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="std_daily_relax_out">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">IN Monthly Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="std_monthly_relax_in">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">OUT Monthly Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="std_monthly_relax_out">
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
                                                <input type="time" class="form-control" id="ext_time">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Frequency:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="ext_frequency">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Flexy Time:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" id="flexy_time_std">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
<!--                                     <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Relaxation Time:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" id="relaxation_time_std">
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">July Start:</label>
                                            <div class="col-md-7">
                                                <input type="date" class="form-control" id="july_start" max="2017-07-31">
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
                                                <input type="number" class="form-control" id="sat_hour">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Off:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="sat_off">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Working:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="sat_on">
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
                                                <p class="form-control-static bold" id="mon_thurs_hours"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Fri Hours:</label>
                                            <div class="col-md-7">
                                                <p class="form-control-static bold" id="fri_hrs"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Avg Weekly Hours:</label>
                                            <div class="col-md-7">
                                                <p class="form-control-static bold" id="avg_hrs"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </div><!-- standardProfile -->
                                                        <div id="customProfile" class="profileTypeArea">
                                <h4 class="form-section headingBorderBottom">Custom Timings</h4>
                                
                                <div class="row">
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Custom IN:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" id="cus_morning" name="custom_morning">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Custom OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" id="cus_afternoon" name="custom_afternoon">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <!-- <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Wednesday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" id="cus_wed" name="custom_wed">
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--/span-->
                                   <!--  <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Friday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" id="cus_fri" name="custom_fri">
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--/span-->

                                 <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>
                                    <!--/span-->
                                     <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Monday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name='cus_mon' id="cus_mon">
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
                                                <input type="time" class="form-control" name='cus_tues' id="cus_tues">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Wednesday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name='cus_wed' id="cus_wed">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Thursday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name="cus_thus" id="cus_thus">
                                            </div>
                                        </div>
                                    </div>

                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        &nbsp;
                                    </div>

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Friday OUT:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" name="cus_fri" id="cus_fri">
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
                                                <input type="number" class="form-control" id="cus_daily_relax_in">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">OUT Daily Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="cus_daily_relax_out">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">IN Monthly Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="cus_monthly_relax_in">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">OUT Monthly Relax Limit:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="cus_monthly_relax_out">
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
                                                <input type="time" class="form-control" id="cus_ext_time" name ="custom_ext_time">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Frequency:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="cus_ext_freq" name="custom_ext_frequency">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Flexy Time:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" id="flexy_time_cus">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
<!--                                     <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Relaxation Time:</label>
                                            <div class="col-md-7">
                                                <input type="time" class="form-control" id="relaxation_time_cus">
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">July Start:</label>
                                            <div class="col-md-7">
                                                <input type="date" class="form-control" id="cus_july_start" name="custom_july_start" max="2017-07-31">
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
                                                <input type="number" class="form-control" id="cus_sat_hour" name="custom_sat_hour">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Off:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="cus_sat_off" name="custom_sat_off">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6 paddingBottom10">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 text-right paddingRight0">Working:</label>
                                            <div class="col-md-7">
                                                <input type="number" class="form-control" id="cus_sat_working" name="custom_sat_working">
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
                                                <p class="form-control-static bold" id="cus_mon_thu_hrs"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Fri Hours:</label>
                                            <div class="col-md-7">
                                                <p class="form-control-static bold" id="cus_fri_hrs"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Avg Weekly Hours:</label>
                                            <div class="col-md-7">
                                                <p class="form-control-static bold" id="cus_avg_weekly"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                            </div><!-- customProfile --> 
                            <div id="parttimeProfile" class="profileTypeArea">
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
                                        <input type="time" class="form-control" id="MonIN">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="MonOUT">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Tuesday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="TueIN">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="TueOUT">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Wednesday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="WedIN">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="WedOUT">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Thursday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="ThuIN">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="ThuOUT">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Friday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="FriIN">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="FriOUT">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->
                                <div class="row marginBottom20">
                                    <div class="col-md-3 text-right marginTop5">
                                        Saturday
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="SatIN">
                                    </div><!-- col-md-3 -->
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" id="SatOUT">
                                    </div><!-- col-md-3 -->
                                </div><!-- row -->

                                <h4 class="form-section headingBorderBottom">Calculations</h4>
                                <div class="row">
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">M-T Hours: </label>
                                            <div class="col-md-7">
                                                <p class="form-control-static bold" id="part_time_mon_thu"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Fri Hours:</label>
                                            <div class="col-md-7">
                                                <p class="form-control-static bold" id="part_time_fri"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-4 padding0">
                                        <div class="form-group">
                                            <label class="control-label col-md-5 paddingRight0 text-right">Avg Weekly Hours:</label>
                                            <div class="col-md-7">
                                                <p class="form-control-static bold" id="part_time_avg"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>

                            </div><!-- parttimeProfile -->  

                            </form>                         
                        </div><!-- form-body -->
                        <div class="form-actions">
                          <div class="alert alert-success callout-updated" style="display:none">
                            <strong>Success!</strong> The Profile has been Updated.
                            </div>
                            <button type="submit" class="btn blue profileDefination_insertProfileClass" id="profileDefination_insertProfile">Add Profile</button>
                            <button type="button" class="btn default clearbtn">Clear</button>
                        </div>
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

var pagefunction = function() {
    staffProfileAllocated();
    Demo.init();
    App.init();


   
    // Show Left Panel
    $('#profileDefinationAdd').click(function(){
        $('.caption-subject').text('Add New Profile');
        $('#profileDetail_Left').css('display','');
        $('.add_profile_label').css('display','');
        removeSelected('staffDefination_profile_id',null);
        resetAll();
    });

    };



        // Profile Insertion

    $(document).on('click','.profileDefination_insertProfileClass',function(e){
        e.preventDefault();
        var profile_type_id = $('#profileTypeSelector option:selected').attr('data-profileDefination-type');

        // Validation of form

        var $form = $('#profileDefination_form');
        var validator = $form.validate({

          rules:{
            profileDefination_name:"required",
            profileDefination_type:"required",
            morning_time:"required",
            afternoon_time:"required",
            custom_morning : "required",
            custom_afternoon:"required",
            
          },
          messages:{
            profileDefination_name:"Please Enter Profile Name",
            profileDefination_type:"Please Select the Profile",
            morning_time:"Enter Time",
            afternoon_time:"Enter  Time",
            custom_morning: "Enter Time",
            custom_afternoon:"Enter Time"

          },


        });

        //validate the form
        validator.form();

        if($form.valid() == true){

            insertProfile(profile_type_id);
        }

    });


    $(function() {

        $('#profileTypeSelector').change(function(){
            $('.profileTypeArea').hide();
            $('#' + $(this).val()).show();
        });

    });

    // PROFILE INSERTION
    function insertProfile(profile_type_id){

      var profile_type_id = profile_type_id;  
      var profile_name =  $('#profileDefination_name').val();


      /***** Further Requests of AJAX *****/
        var me = $(this);
        if ( me.data('staffView_staffInfo_requestRunning') ) {
            return;
        }
        me.data('staffView_staffInfo_requestRunning', true);
        /***** Stop Further Request of AJAX *****/

        $.ajax({
            type:"POST",
            cache:false,
            url:"<?php echo e(url('/profileDefination/insertProfile')); ?>",
            data:{
                profile_name:profile_name,
                profile_type_id:profile_type_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success:function(profile_id){

                if(profile_type_id == 1 && profile_id != '0'){
                    standardProfileTimeInsert(profile_id);
                }

                if(profile_type_id == 2 && profile_id != '0'){
                    CustomProfileTimeInsert(profile_id);
                }

                if(profile_type_id == 3 && profile_id != '0'){
                    PartTimerTimeInsert(profile_id);
                }
                $('.callout').css('display','');
                $('.callout').fadeOut(5000);
                resetAll();
                staffProfileAllocated();

            },
            /***** Further Requests of AJAX *****/
            complete: function() {
                me.data('staffView_staffInfo_requestRunning', false);
            }
            /***** Stop Further Request of AJAX *****/
        });


    }

    // STANDARD PROFILE INSERTION  AJAX CALL

    function standardProfileTimeInsert(profile_id){

      var morning_time = $('#morning_time').val();
      var afternoon_time = $('#afternoon_time').val();
      var mon_time_out = $('#mon_time').val();
      var tues_time_out = $('#tues_time').val();
      var wed_time = $('#wed_time').val();
      var thurs_time_out = $('#thus_time').val();
      var fri_time = $('#fri_time').val();
      var ext_time = $('#ext_time').val();
      var ext_frequency = $('#ext_frequency').val();
      var july_start = $('#july_start').val();
      var sat_hour = $('#sat_hour').val();
      var sat_off = $('#sat_off').val();
      var sat_on = $('#sat_on').val();
      var avg_hrs = $('#avg_hrs').text();
      var flexy_time = $('#flexy_time_std').val();
     // var relaxtion_time = $('#relaxation_time_std').val();


      var daily_relax_in = $('#std_daily_relax_in').val();
      var daily_relax_out = $('#std_daily_relax_out').val();
      var monthly_relax_in = $('#std_monthly_relax_in').val();
      var monthly_relax_out = $('#std_monthly_relax_out').val();


      /***** Further Requests of AJAX *****/
        var me = $(this);
        if ( me.data('staffView_staffInfo_requestRunning_Standard') ) {
            return;
        }
        me.data('staffView_staffInfo_requestRunning_Standard', true);
        /***** Stop Further Request of AJAX *****/

        $.ajax({
            type:"POST",
            cache:false,
            url:"<?php echo e(url('/profileDefination/insertStandardProfile')); ?>",
            data:{
                profile_id:profile_id,
                morning_time:morning_time,
                afternoon_time:afternoon_time,
                mon_time_out:mon_time_out,
                tues_time_out:tues_time_out,
                wed_time:wed_time,
                fri_time:fri_time,
                thurs_time_out:thurs_time_out,
                ext_time:ext_time,
                ext_frequency:ext_frequency,
                july_start:july_start,
                sat_hour:sat_hour,
                sat_off:sat_off,
                sat_on:sat_on,
                avg_hrs:avg_hrs,
                flexy_time:flexy_time,
                //relaxtion_time:relaxtion_time,
                daily_relax_in:daily_relax_in,
                daily_relax_out:daily_relax_out,
                monthly_relax_in:monthly_relax_in,
                monthly_relax_out:monthly_relax_out,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success:function(){

            },
            /***** Further Requests of AJAX *****/
            complete: function() {
                me.data('staffView_staffInfo_requestRunning_Standard', false);
            }
            /***** Stop Further Request of AJAX *****/
        });
    }


    // CUSTOM PROFILE INSERT AJAX CALL

    function CustomProfileTimeInsert(profile_id){

        console.log("At Custom Profile");
                
        var profile_name = $('#profile_name').val();
        var morning_time  = $('#cus_morning').val();
        var afternoon_time = $('#cus_afternoon').val();
        var mon_time_out = $('#cus_mon').val();
        var tues_time_out = $('#cus_tues').val();
        var wed_time = $('#cus_wed').val();
        var thurs_time_out = $('#cus_thus').val();
        var fri_time = $('#cus_fri').val();
        var cus_ext_time = $('#cus_ext_time').val();
        var cus_ext_freq = $('#cus_ext_freq').val();
        var cus_july_start = $('#cus_july_start').val();
        var cus_sat_hour = $('#cus_sat_hour').val();
        var cus_sat_off = $('#cus_sat_off').val();
        var cus_sat_working = $('#cus_sat_working').val();
        var avg_hrs = $('#cus_avg_weekly').text();
        var flexy_time = $('#flexy_time_cus').val();
        var daily_relax_in = $('#cus_daily_relax_in').val();
        var daily_relax_out = $('#cus_daily_relax_out').val();
        var monthly_relax_in = $('#cus_monthly_relax_in').val();
        var monthly_relax_out = $('#cus_monthly_relax_out').val();

        $.ajax({

            type:"POST",
            cache:false,
            url:"<?php echo e(url('/profileDefination/insertCustomProfile')); ?>",
            data:{
  
              profile_id:profile_id,
              morning_time:morning_time,
              afternoon_time:afternoon_time,
              mon_time_out:mon_time_out,
              tues_time_out:tues_time_out,
              wed_time:wed_time,
              fri_time:fri_time,
              thurs_time_out:thurs_time_out,
              ext_time:cus_ext_time,
              ext_frequency:cus_ext_freq,
              july_start:cus_july_start,
              sat_hour:cus_sat_hour,
              sat_off:cus_sat_off,
              sat_on:cus_sat_working,
              avg_hrs:avg_hrs,
              flexy_time:flexy_time,
             // relaxtion_time:relaxtion_time,
              daily_relax_in:daily_relax_in,
              daily_relax_out:daily_relax_out,
              monthly_relax_in:monthly_relax_in,
              monthly_relax_out:monthly_relax_out,
              "_token":"<?php echo e(csrf_token()); ?>",
            },
            success:function(){

            },
            /***** Further Requests of AJAX *****/
            complete: function() {
                
            }
            /***** Stop Further Request of AJAX *****/

        });

    }

    //Part Timer Time Insert

    function PartTimerTimeInsert(profile_id){

        var profile_id = profile_id;
        var mon_in = $('#MonIN').val();
        var mon_out = $('#MonOUT').val();
        var tue_in = $('#TueIN').val();
        var tue_out = $('#TueOUT').val();
        var wed_in = $('#WedIN').val();
        var wed_out = $('#WedOUT').val();
        var thu_in = $('#ThuIN').val();
        var thu_out = $('#ThuOUT').val();
        var fri_in = $('#FriIN').val();
        var fri_out = $('#FriOUT').val();
        var sat_in = $('#SatIN').val();
        var sat_out = $('#SatOUT').val();
        var avg_weekly = $('#part_time_avg').text();

        $.ajax({

            type:"POST",
            cache:false,
            url:"<?php echo e(url('/profileDefination/insertPartTimerProfile')); ?>",
            data:{
                profile_id:profile_id,
                mon_in:mon_in,
                mon_out:mon_out,
                tue_in:tue_in,
                tue_out:tue_out,
                wed_in:wed_in,
                wed_out:wed_out,
                thu_in:thu_in,
                thu_out:thu_out,
                fri_in:fri_in,
                fri_out:fri_out,
                sat_in:sat_in,
                sat_out:sat_out,
                avg_weekly:avg_weekly,
              "_token":"<?php echo e(csrf_token()); ?>",
            },
            success:function(){

            },
            /***** Further Requests of AJAX *****/
            complete: function() {
                
            }
            /***** Stop Further Request of AJAX *****/

        });

    }

    function removeSelected(elem,elemSelected){
        var a = $("."+elem+"").parent().parent().removeClass('selected');
        
        if(elemSelected != null){
            $(elemSelected).parent().parent().addClass('selected');
        }
        
    }

    // SELECT PROFILE BY CLICKING THE EVENT
      $(document).on('click','.staffDefination_profile_id',function(){

        removeSelected('staffDefination_profile_id',this);
        resetAll();
        var profile_id = $(this).attr('data-id');
        var profile_type_id = $(this).attr('data-type-id');
        var profile_name = $(this).attr('data-original-title');
        $('#profileDetail_Left').css('display','none');
        $('#profileDetail_Left').css('display','');
       // $('.add_profile_label').css('display','none');
        $('#profileDefination_name').val(profile_name);

        $('.caption add_profile_label').css('display','');
        $('.caption_subject_profile').text(profile_name);

        $('#profileTypeSelector').prop('disabled',true);
        $('#profileTypeSelector option[data-profiledefination-type="'+profile_type_id+'"]').prop('selected',true);
        $('#profileDefination_name').attr('data-id',profile_id);


        if(profile_type_id == 1){
            $('#standardProfile').show();
            $('#customProfile').hide();
            $('#parttimeProfile').hide();
        }else if(profile_type_id == 2){
            $('#customProfile').show();
            $('#standardProfile').hide();
            $('#parttimeProfile').hide();
        }else if(profile_type_id == 3){
            $('#parttimeProfile').show();
            $('#standardProfile').hide();
            $('#customProfile').hide();
        }

        /***** Further Requests of AJAX *****/
        var me = $(this);
        if ( me.data('staffView_staffInfo_requestRunning') ) {
            return;
        }
        me.data('staffView_staffInfo_requestRunning', true);
        /***** Stop Further Request of AJAX *****/


        $.ajax({
            type:"POST",
            cache:false,
            url:"<?php echo e(url('/profileDefination/profile_description')); ?>",
            data:{
                profile_id:profile_id,
                "_token":"<?php echo e(csrf_token()); ?>",
            },
            success:function(profileDesc){
                var profile_obj = jQuery.parseJSON(profileDesc);
                if(profile_type_id == 1){
                    UpdationDataStandard(profile_obj);
                }

                if(profile_type_id == 2){
                    UpdationDataCustom(profile_obj);
                }

                if(profile_type_id == 3){
                    UpdationDataPartTime(profile_obj);
                }
            },
            /***** Further Requests of AJAX *****/
            complete: function() {
                me.data('staffView_staffInfo_requestRunning', false);
            }
            /***** Stop Further Request of AJAX *****/

        });

    });

    // UPDATION STANDARD DATA
    function UpdationDataStandard(profile_obj){
        clearAll();
        $('#morning_time').attr('id','morning_time_update');
        $('#afternoon_time').attr('id','afternoon_time_update');
        $('#mon_time').attr('id','mon_time_update');
        $('#tues_time').attr('id','tues_time_update');
        $('#thus_time').attr('id','thus_time_update');
        $('#wed_time').attr('id','wed_time_update');
        $('#ext_time').attr('id','ext_time_update');
        $('#fri_time').attr('id','fri_time_update');
        $('#ext_frequency').attr('id','ext_frequency_update');
        $('#flexy_time_std').attr('id','flexy_time_std_upd');
        //$('#relaxation_time_std').attr('id','relaxation_time_std_upd');
        $('#july_start').attr('id','july_start_update');
        $('#sat_hour').attr('id','sat_hour_update');
        $('#sat_off').attr('id','sat_off_update');
        $('#sat_on').attr('id','sat_on_update');
        $('#std_daily_relax_in').attr('id','std_daily_relax_in_update');
        $('#std_daily_relax_out').attr('id','std_daily_relax_out_update');
        $('#std_monthly_relax_in').attr('id','std_monthly_relax_in_update');
        $('#std_monthly_relax_out').attr('id','std_monthly_relax_out_update');


        $('.profileDefination_insertProfileClass').attr('class','profileDefination_editProfileClass btn blue');
        $('.profileDefination_editProfileClass').text('Update');

        console.log(profile_obj[0]);

        if(profile_obj[0]['is_on_mon'] == 1){
            $('#morning_time_update').val(profile_obj[0]['mon_in']);
            $('#mon_time_update').val(profile_obj[0]['mon_out']);
        }else{
            $('#morning_time_update').val('');
            $('#mon_time_update').val('');
        }


        // Tuesday out
        if(profile_obj[0]['is_on_tue'] == 1){
            $('#morning_time_update').val(profile_obj[0]['mon_in']);
            $('#tues_time_update').val(profile_obj[0]['tue_out']);
        }else{
            $('#morning_time_update').val('');
            $('#tues_time_update').val('');
        }

        // Wednesday out
        if(profile_obj[0]['is_on_wed'] == 1){
            $('#morning_time_update').val(profile_obj[0]['mon_in']);
            $('#wed_time_update').val(profile_obj[0]['wed_out']);
        }else{
            $('#morning_time_update').val('');
            $('#wed_time_update').val('');
        }


        // Thursday out
        if(profile_obj[0]['is_on_thu'] == 1){
            $('#morning_time_update').val(profile_obj[0]['mon_in']);
            $('#thus_time_update').val(profile_obj[0]['thu_out']);
        }else{
            $('#morning_time_update').val('');
            $('#thus_time_update').val('');
        }

        // Friday out
        if(profile_obj[0]['is_on_fri'] == 1){
            $('#morning_time_update').val(profile_obj[0]['mon_in']);
            $('#fri_time_update').val(profile_obj[0]['fri_out']);
        }else{
            $('#morning_time_update').val('');
            $('#fri_time_update').val('');
        }

        if(profile_obj[0]['standard_out'] != '00:00:00'){
            $('#morning_time_update').val(profile_obj[0]['mon_in']);
            $('#afternoon_time_update').val(profile_obj[0]['standard_out']);
        }else{
            $('#morning_time_update').val('');
            $('#afternoon_time_update').val('');
        }




        if(profile_obj[0]['use_ext'] == 1){
            $('#ext_time_update').val(profile_obj[0]['ext_time']);
        }else{
            $('#ext_time_update').val('');
        }

        if(profile_obj[0]['ext_frequency'] != 0){
            $('#ext_frequency_update').val(profile_obj[0]['ext_frequency']);
        }else{
            $('#ext_frequency_update').val('');
        }

        if(profile_obj[0]['is_on_flexy'] == 1){
            $('#flexy_time_std_upd').val(profile_obj[0]['flexy_time']);
        }else{
            $('#flexy_time_std_upd').val('');
        }

        // if(profile_obj[0][' is_on_relaxation'] == 1){
        //     $('#relaxation_time_std_upd').val(profile_obj[0]['relaxation_time']);
        // }else{
        //     $('#relaxation_time_std_upd').val('');
        // }

        if(profile_obj[0]['daily_relax_in'] != 0){
            $('#std_daily_relax_in_update').val(profile_obj[0]['daily_relax_in']);
        }else{
            $('#std_daily_relax_in_update').val('');
        }

        if(profile_obj[0]['daily_relax_out'] != 0){
            $('#std_daily_relax_out_update').val(profile_obj[0]['daily_relax_out']);
        }else{
            $('#std_daily_relax_out_update').val('');
        }

        if(profile_obj[0]['monthly_relax_in'] != 0){
            $('#std_monthly_relax_in_update').val(profile_obj[0]['monthly_relax_in']);
        }else{
            $('#std_monthly_relax_in_update').val('');
        }


        if(profile_obj[0]['monthly_relax_out'] != 0){
            $('#std_monthly_relax_out_update').val(profile_obj[0]['monthly_relax_out']);
        }else{
            $('#std_monthly_relax_out_update').val('');
        }

        if(profile_obj[0]['ext_july'] != '1970-01-01'){
            $('#july_start_update').val(profile_obj[0]['ext_july']);
        }else{
            $('#july_start_update').val('');
        }

        if(profile_obj[0]['sat_hrs'] != 0){  
            $('#sat_hour_update').val(profile_obj[0]['sat_hrs']);
        }else{
            $('#sat_hour_update').val('');
        }

        if(profile_obj[0]['sat_off'] != 0){
            $('#sat_off_update').val(profile_obj[0]['sat_off']);
        }else{
            $('#sat_off_update').val('');
            $('#sat_off_update').prop('disabled',true);
        }

        if(profile_obj[0]['sat_working'] != 0){
            $('#sat_on_update').val(profile_obj[0]['sat_working']);
        }else{
            $('#sat_on_update').val('');
            $('#sat_on_update').prop('disabled',true);
        }

        if(profile_obj[0]['sat_off'] == 0 && profile_obj[0]['sat_working'] == 0){
            $('#sat_on_update').prop('disabled',false);
            $('#sat_off_update').prop('disabled',false);
        }

        if(profile_obj[0]['avg_week_hrs'] != null){
            $('#avg_hrs').text(profile_obj[0]['avg_week_hrs']);
        }else{
            $('#avg_hrs').text('');
        }
        
        //Comments by rohail.... 
        standardCalculation();
    }

    // UPDATION STANDARD CALCULATION
    function standardCalculation(){

      var morning_time = $('#morning_time_update').val();
      var afternoon_time = $('#afternoon_time_update').val();
      var fri_hours = $('#fri_time_update').val();
      var mon_time = $('#mon_time_update').val();
      var tue_time = $('#tues_time_update').val();
      var wed_time = $('#wed_time_update').val();
      var thus_time = $('#thus_time_update').val();
      var sat_hours = $('#sat_hour_update').val();
      var sat_off = $('#sat_off_update').val();
      var sat_on = $('#sat_on_update').val();
      var ext_time = $('#ext_time_update').val();
      var ext_frequency = $('#ext_frequency_update').val();

       // Calculate AVG WEEK HOUR New Layout

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
        if(morning_time.length != 0 && fri_hours.length != 0){
            friday_weekly_time.push(time_difference(morning_time,fri_hours));
        }


        var hour_minute =  sum_time(average_weekly_time);
        var hour_minute_friday = sum_time(friday_weekly_time);


        // Pasting the Mon Thursday Hour

        $('#counter_mon_thu_hrs').text(hour_minute.hour);
        $('#counter_mon_thu_min').text(hour_minute.minute);

        // Pasting Average Mon Thursday hour in below

        $('#mon_thurs_hours').text((hour_minute.hour+":"+hour_minute.minute));  

        // Pasting the Friday Hour

        $('#counter_fri_hrs').text(hour_minute_friday.hour);
        $('#counter_fri_min').text(hour_minute_friday.minute);

        // Pasting Friday hour in below

        $('#fri_hrs').text((hour_minute_friday.hour+":"+hour_minute_friday.minute));



       // Standard Morning And Afternoon Timing Comments 
       if(morning_time.length != 0 && afternoon_time.length != 0){
            var p = "1/1/1970 ";
            difference_mt = new Date(new Date(p+afternoon_time) - new Date(p+morning_time)).toUTCString().split(" ")[4];
            difference_f = new Date(new Date(p+fri_hours) - new Date(p+morning_time)).toUTCString().split(" ")[4];
            console.log("Difference of Mon-Thur"+difference_mt);

                                 
                var t1 = difference_mt.split(':');
                var t2 = difference_f.split(':');
                // $('#counter_mon_thu_hrs').text(t1[0]);
                // $('#counter_mon_thu_min').text(t1[1]);
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
                console.log(sat);
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
                    difference_ext = new Date(new Date(p+ext_time) - new Date(p+afternoon_time)).toUTCString().split(" ")[4];
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
            
                $('#counter_avg_hrs').text(hrs);
                $('#counter_avg_min').text(mins);
                $('#avg_hrs').text(t1);
       }
   
               
    }

    //UPDATION CUSTOM DATA
    function UpdationDataCustom(profile_obj){
        //console.log(profile_obj);
        clearAll();
        $('#cus_morning').attr('id','custom_morning_update');
        $('#cus_afternoon').attr('id','custom_afternoon_udpate');

        $('#cus_mon').attr('id','cus_mon_update');
        $('#cus_tues').attr('id','cus_tues_update');
        $('#cus_thus').attr('id','cus_thus_update');

        $('#cus_wed').attr('id','cus_wed_update');
        $('#cus_ext_time').attr('id','cus_ext_time_update');
        $('#cus_fri').attr('id','cus_fri_update');
        $('#cus_ext_freq').attr('id','cus_ext_freq_update');
        $('#flexy_time_cus').attr('id','flexy_time_cus_upd');
        //$('#relaxation_time_cus').attr('id','relaxation_time_cus_upd');
        $('#cus_july_start').attr('id','cus_july_start_update');
        $('#cus_sat_hour').attr('id','cus_sat_hour_update');
        $('#cus_sat_off').attr('id','cus_sat_off_update');
        $('#cus_sat_working').attr('id','cus_sat_working_update');

        $('#cus_daily_relax_in').attr('id','cus_daily_relax_in_update');
        $('#cus_daily_relax_out').attr('id','cus_daily_relax_out_update');
        $('#cus_monthly_relax_in').attr('id','cus_monthly_relax_in_update');
        $('#cus_monthly_relax_out').attr('id','cus_monthly_relax_out_update');


       
        $('.profileDefination_insertProfileClass').attr('class','profileDefination_editProfileClass btn blue');
        $('.profileDefination_editProfileClass').text('Edit Profile');


        //  Monday In

        if(profile_obj[0]['is_on_mon'] == 1){
            $('#custom_morning_update').val(profile_obj[0]['mon_in']);
            $('#cus_mon_update').val(profile_obj[0]['mon_out']);
        }else{
            $('#custom_morning_update').val('');
            $('#cus_mon_update').val('');
        }


        // Tuesday Out

        if(profile_obj[0]['is_on_tue'] == 1){
            $('#custom_morning_update').val(profile_obj[0]['mon_in']);
            $('#cus_tues_update').val(profile_obj[0]['tue_out']);
        }else{
            $('#custom_morning_update').val('');
            $('#cus_tues_update').val('');
        }


        // Wednesday Out

        if(profile_obj[0]['is_on_wed'] == 1){
            $('#custom_morning_update').val(profile_obj[0]['mon_in']);
            $('#cus_wed_update').val(profile_obj[0]['wed_out']);
        }else{
            $('#custom_morning_update').val('');
            $('#cus_wed_update').val('');
        }

        // Thursday out

        if(profile_obj[0]['is_on_thu'] == 1){
            $('#custom_morning_update').val(profile_obj[0]['mon_in']);
            $('#cus_thus_update').val(profile_obj[0]['thu_out']);
        }else{
            $('#custom_morning_update').val('');
            $('#cus_thus_update').val('');
        }


        // Friday Out

        if(profile_obj[0]['is_on_fri'] == 1){
            $('#custom_morning_update').val(profile_obj[0]['mon_in']);
            $('#cus_fri_update').val(profile_obj[0]['fri_out']);
        }else{
            $('#custom_morning_update').val('');
            $('#cus_fri_update').val('');
        }

        if(profile_obj[0]['standard_out'] != '00:00:00'){
            $('#morning_time_update').val(profile_obj[0]['mon_in']);
            $('#custom_afternoon_udpate').val(profile_obj[0]['standard_out']);
        }else{
            $('#morning_time_update').val('');
            $('#custom_afternoon_udpate').val('');
        }

        if(profile_obj[0]['use_ext'] == 1){
            $('#cus_ext_time_update').val(profile_obj[0]['ext_time']);
        }else{
            $('#cus_ext_time_update').val('');
        }

        if(profile_obj[0]['ext_frequency'] != 0){
            $('#cus_ext_freq_update').val(profile_obj[0]['ext_frequency']);
        }else{
            $('#cus_ext_freq_update').val('');
        }

        if(profile_obj[0]['is_on_flexy'] == 1){
            $('#flexy_time_cus_upd').val(profile_obj[0]['flexy_time']);
        }else{
            $('#flexy_time_cus_upd').val('');
        }

        // if(profile_obj[0]['is_on_relaxation'] == 1){
        //     $('#relaxation_time_cus_upd').val(profile_obj[0]['relaxation_time']);
        // }else{
        //     $('#relaxation_time_cus_upd').val('');
        // }

        if(profile_obj[0]['daily_relax_in'] != 0){
            $('#cus_daily_relax_in_update').val(profile_obj[0]['daily_relax_in']);
        }else{
            $('#cus_daily_relax_in_update').val('');
        }

        if(profile_obj[0]['daily_relax_out'] != 0){
            $('#cus_daily_relax_out_update').val(profile_obj[0]['daily_relax_out']);
        }else{
            $('#cus_daily_relax_out_update').val('');
        }

        if(profile_obj[0]['monthly_relax_in'] != 0){
            $('#cus_monthly_relax_in_update').val(profile_obj[0]['monthly_relax_in']);
        }else{
            $('#cus_monthly_relax_in_update').val('');
        }

        if(profile_obj[0]['monthly_relax_out'] != 0){
            $('#cus_monthly_relax_out_update').val(profile_obj[0]['monthly_relax_out']);
        }else{
            $('#cus_monthly_relax_out_update').val('');
        }


        if(profile_obj[0]['ext_july'] != '1970-01-01'){
            $('#cus_july_start_update').val(profile_obj[0]['ext_july']);
        }else{
            $('#cus_july_start_update').val('');
        }

        if(profile_obj[0]['sat_hrs'] != 0){  
            $('#cus_sat_hour_update').val(profile_obj[0]['sat_hrs']);
        }else{
            $('#cus_sat_hour_update').val('');
        }

        if(profile_obj[0]['sat_off'] != 0){
            $('#cus_sat_off_update').val(profile_obj[0]['sat_off']);
        }else{
            $('#cus_sat_off_update').val('');
            $('#cus_sat_off_update').prop('disabled',true);
        }

        if(profile_obj[0]['sat_working'] != 0){
            $('#cus_sat_working_update').val(profile_obj[0]['sat_working']);
        }else{
            $('#cus_sat_working_update').val('');
            $('#cus_sat_working_update').prop('disabled',true);
        }
        
        if(profile_obj[0]['sat_off'] == 0 && profile_obj[0]['sat_working'] == 0){
            $('#cus_sat_working_update').prop('disabled',false);
            $('#cus_sat_off_update').prop('disabled',false);
        }

        if(profile_obj[0]['avg_week_hrs'] != null){
            $('#cus_avg_weekly').text(profile_obj[0]['avg_week_hrs']);
        }else{
            $('#cus_avg_weekly').text('');
        }

        customCalculation();
    }

    // UPDATION CUSTOM CALCULATION
    function customCalculation(){

            var custom_morning = $('#custom_morning_update').val();
              var custom_afternoon = $('#custom_afternoon_udpate').val();
              
              var mon_time = $('#cus_mon_update').val();
              var tue_time = $('#cus_tues_update').val();
              var wed_time = $('#cus_wed_update').val();
              var thus_time = $('#cus_thus_update').val();
              var custom_friday = $('#cus_fri_update').val();

              var sat_hours = $('#cus_sat_hour_update').val();
              var sat_off = $('#cus_sat_off_update').val();
              var sat_on = $('#cus_sat_working_update').val();
              var ext_time = $('#cus_ext_time_update').val();
              var ext_frequency = $('#cus_ext_freq_update').val();
              var difference_time;


           // Calculate AVG WEEK HOUR New Layout

        var average_weekly_time = [];
        var friday_weekly_time = [];

        // Mon time
        if(custom_morning.length != 0 && mon_time.length != 0){
            average_weekly_time.push(time_difference(custom_morning,mon_time));
        }

        // Tue Time
        if(custom_morning.length != 0 && tue_time.length != 0){
            average_weekly_time.push(time_difference(custom_morning,tue_time));
        }

        // Wed Time
        if(custom_morning.length != 0 && wed_time.length != 0){
            average_weekly_time.push(time_difference(custom_morning,wed_time));
        }

        // Thurs Time
        if(custom_morning.length != 0 && thus_time.length != 0){
            average_weekly_time.push(time_difference(custom_morning,thus_time));
        }

        // Fri Time
        if(custom_morning.length != 0 && custom_friday.length != 0){
            friday_weekly_time.push(time_difference(custom_morning,custom_friday));
        }


        var hour_minute =  sum_time(average_weekly_time);
        var hour_minute_friday = sum_time(friday_weekly_time);


        // Pasting the Mon Thursday Hour

        $('#counter_mon_thu_hrs').text(hour_minute.hour);
        $('#counter_mon_thu_min').text(hour_minute.minute);

        // Pasting Average Mon Thursday hour in below

        $('#cus_mon_thu_hrs').text((hour_minute.hour+":"+hour_minute.minute));  

        // Pasting the Friday Hour

        $('#counter_fri_hrs').text(hour_minute_friday.hour);
        $('#counter_fri_min').text(hour_minute_friday.minute);

        // Pasting Friday hour in below

        $('#cus_fri_hrs').text((hour_minute_friday.hour+":"+hour_minute_friday.minute));


        var p = "1/1/1970 ";
        difference_mt = new Date(new Date(p+custom_afternoon) - new Date(p+custom_morning)).toUTCString().split(" ")[4];
        difference_f = new Date(new Date(p+custom_friday) - new Date(p+custom_morning)).toUTCString().split(" ")[4];
        

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
      
        $('#cus_avg_weekly').text(t1);
        $('#counter_avg_hrs').text(hrs);
        $('#counter_avg_min').text(mins);


         

      
    }

    //UPDATION DATA PART TIMER
    function UpdationDataPartTime(profile_obj){

        clearAll();
        $('#MonIN').attr('id','MonInUpdate');
        $('#MonOUT').attr('id','MonOUTUpdate');    
        $('#TueIN').attr('id','TueINUpdate');    
        $('#TueOUT').attr('id','TueOUTUpdate');    
        $('#WedIN').attr('id','WedINUpdate');    
        $('#WedOUT').attr('id','WedOUTUpdate');    
        $('#ThuIN').attr('id','ThuINUpdate');    
        $('#ThuOUT').attr('id','ThuOUTUpdate');    
        $('#FriIN').attr('id','FriINUpdate');    
        $('#FriOUT').attr('id','FriOUTUpdate');    
        $('#SatIN').attr('id','SatINUpdate');            
        $('#SatOUT').attr('id','SatOUTUpdate');


        $('.profileDefination_insertProfileClass').attr('class','profileDefination_editProfileClass btn blue');
        $('.profileDefination_editProfileClass').text('Edit Profile');

        if(profile_obj[0]['is_on_mon'] == 1){
            $('#MonInUpdate').val(profile_obj[0]['mon_in']);
            $('#MonOUTUpdate').val(profile_obj[0]['mon_out']);       
        }else{
            $('#MonInUpdate').val('');
            $('#MonOUTUpdate').val('');
        }

        if(profile_obj[0]['is_on_tue'] == 1){
            $('#TueINUpdate').val(profile_obj[0]['tue_in']);
            $('#TueOUTUpdate').val(profile_obj[0]['tue_out']); 
        }else{
            $('#TueINUpdate').val('');
            $('#TueOUTUpdate').val(''); 
        }

        if(profile_obj[0]['is_on_wed'] == 1){
            $('#WedINUpdate').val(profile_obj[0]['wed_in']);
            $('#WedOUTUpdate').val(profile_obj[0]['wed_out']); 
        }else{
            $('#WedINUpdate').val('');
            $('#WedOUTUpdate').val('');
        }

        if(profile_obj[0]['is_on_thu'] == 1){
            $('#ThuINUpdate').val(profile_obj[0]['thu_in']);
            $('#ThuOUTUpdate').val(profile_obj[0]['thu_out']); 
        }else{
            $('#ThuINUpdate').val('');
            $('#ThuOUTUpdate').val('');
        }

        if(profile_obj[0]['is_on_fri'] == 1){
            $('#FriINUpdate').val(profile_obj[0]['fri_in']);
            $('#FriOUTUpdate').val(profile_obj[0]['fri_out']); 
        }else{
            $('#FriINUpdate').val('');
            $('#FriOUTUpdate').val('');
        }

        if(profile_obj[0]['is_on_sat'] == 1){
            $('#SatINUpdate').val(profile_obj[0]['sat_in']);
            $('#SatOUTUpdate').val(profile_obj[0]['sat_out']); 
        }else{
            $('#SatINUpdate').val('');
            $('#SatOUTUpdate').val('');
        }

        partTimerCalculation();        
    }

    //UPDATION DATA PART TIMER CALCULATION
    function partTimerCalculation(){

          var mon_in = $('#MonInUpdate').val();
          var mon_out = $('#MonOUTUpdate').val();
          var tue_in = $('#TueINUpdate').val();
          var tue_out = $('#TueOUTUpdate').val();
          var wed_in = $('#WedINUpdate').val();
          var wed_out = $('#WedOUTUpdate').val();
          var thu_in = $('#ThuINUpdate').val();
          var thu_out = $('#ThuOUTUpdate').val();
          var fri_in = $('#FriINUpdate').val();
          var fri_out = $('#FriOUTUpdate').val();
          var sat_in = $('#SatINUpdate').val();
          var sat_out = $('#SatOUTUpdate').val(); 

          console.log(mon_in);
          if(fri_in.length != 0 && fri_out.length != 0){
            var p = "1/1/1970 ";
            difference = new Date(new Date(p+fri_out) - new Date(p+fri_in)).toUTCString().split(" ")[4];            
            $('#part_time_fri').text(difference);
            $('#counter_fri_hrs').text(difference.split(':')[0]);
            $('#counter_fri_min').text(difference.split(':')[1]);

          }


          // Monday Time Difference Calculation

          var time_out_mon;
          var time_in_mon;

          if(mon_out.length != 0 && mon_in.length != 0){
            time_out_mon = mon_out;
          }else{
            time_out_mon = '00:00:00';
          }

          if(mon_out.length != 0 && mon_in.length != 0){
            time_in_mon = mon_in;
          }else{
            time_in_mon = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_mon = new Date(new Date(p+time_out_mon) - new Date(p+time_in_mon)).toUTCString().split(" ")[4];


          // Tuesday Time Difference Calculation

          var time_out_tue;
          var time_in_tue;

          if(tue_out.length != 0 && tue_in.length != 0){
            time_out_tue = tue_out;
          }else{
            time_out_tue = '00:00:00';
          }

          if(tue_out.length != 0 && tue_in.length != 0){
            time_in_tue = tue_in;
          }else{
            time_in_tue = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_tue = new Date(new Date(p+time_out_tue) - new Date(p+time_in_tue)).toUTCString().split(" ")[4];


          // Wednesday Time Difference Calculation

          var time_out_wed;
          var time_in_wed;

          if(wed_out.length != 0 && wed_in.length != 0){
            time_out_wed = wed_out;
          }else{
            time_out_wed = '00:00:00';
          }

          if(wed_out.length != 0 && wed_in.length != 0){
            time_in_wed = wed_in;
          }else{
            time_in_wed = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_wed = new Date(new Date(p+time_out_wed) - new Date(p+time_in_wed)).toUTCString().split(" ")[4];


          // Thursday Time Difference Calculation

          var time_out_thu;
          var time_in_thu;

          if(thu_out.length != 0 && thu_in.length != 0){
            time_out_thu = thu_out;
          }else{
            time_out_thu = '00:00:00';
          }

          if(thu_out.length != 0 && thu_in.length != 0){
            time_in_thu = thu_in;
          }else{
            time_in_thu = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_thu = new Date(new Date(p+time_out_thu) - new Date(p+time_in_thu)).toUTCString().split(" ")[4];


          // Friday Time Difference Calculation

          var time_out_fri;
          var time_in_fri;

          if(fri_out.length != 0 && fri_in.length != 0){
            time_out_fri = fri_out;
          }else{
            time_out_fri = '00:00:00';
          }

          if(fri_out.length != 0 && fri_in.length != 0){
            time_in_fri = fri_in;
          }else{
            time_in_fri = '00:00:00';
          }

          var p = "1/1/1970 ";
          var difference_fri = new Date(new Date(p+time_out_fri) - new Date(p+time_in_fri)).toUTCString().split(" ")[4];


          $('#part_time_avg').val(difference_fri);


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


          
          // Calculated Total Average Weekly Hours


           var time1 = difference_mon;
           var time2 = difference_tue;
           var time3 = difference_wed;
           var time4 = difference_thu;
           var time5 = difference_fri;
           var time6 = difference_sat;

           if(typeof(time1)  != 'undefined'){
                time1 = difference_mon;
           }else{
                time1 = '00:00:00';
           }

           if(typeof(time2)  != 'undefined'){
                time2 = difference_tue;
           }else{
                time2 = '00:00:00';
           }


          if(typeof(time3)  != 'undefined'){
                time3 = difference_wed;
           }else{
                time3 = '00:00:00';
           }

           if(typeof(time4)  != 'undefined'){
                time4 = difference_thu;
           }else{
                time4 = '00:00:00';
           }

           if(typeof(time5)  != 'undefined'){
                time5 = difference_fri;
           }else{
                time5 = '00:00:00';
           }

           if(typeof(time6)  != 'undefined'){
                time6 = difference_sat;
           }else{
                time6 = '00:00:00';
           }
            
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
            
            if(spliting[1].length == 1){
              t1 = hrs+':'+'0'+mins;
            }else{
              t1 = hrs+':'+mins;
            }
            $('#part_time_avg').text(t1);
            $('#counter_avg_hrs').text(hrs);
            $('#counter_avg_min').text(mins);


            // Calculated Mon Thursday Hours

            mins = Number(splitTime1[1]) + Number(splitTime2[1]) + Number(splitTime3[1]) + Number(splitTime4[1]);
            minhrs = Math.floor(parseInt(mins / 60));
            hrs = Number(splitTime1[0]) + Number(splitTime2[0]) + Number(splitTime3[0]) + Number(splitTime4[0])  + minhrs;
            mins = mins % 60;
            var mon_thu = hrs+':'+mins;

            var spliting = mon_thu.split(':');
            
            if(spliting[1].length == 1){
              mon_thu = hrs+':'+'0'+mins;
            }else{
              mon_thu = hrs+':'+mins;
            }




          $('#part_time_mon_thu').text(mon_thu);
          $('#counter_mon_thu_hrs').text(mon_thu.split(":")[0]);
          $('#counter_mon_thu_min').text(difference_mt.split(":")[1]);   

    }

    //CLEAR ALL
    function clearAll(){

        // Standard Clear
        $('#morning_time').val('');
        $('#afternoon_time').val('');
        $('#mon_time').val('');
        $('#tues_time').val('');
        $('#thus_time').val('');
        $('#wed_time').val('');
        $('#fri_time').val('');
        $('#ext_time').val('');
        $('#ext_frequency').val('');
        $('#flexy_time_std').val('');
        //$('#relaxation_time_std').val('');
        $('#july_start').val('');
        $('#sat_hour').val('');
        $('#sat_off').val('');
        $('#sat_on').val('');
        $('#mon_thurs_hours').text('');
        $('#fri_hrs').text('');
        $('#avg_hrs').text('');
        $('#sat_on_update').prop('disabled',false);
        $('#sat_off_update').prop('disabled',false);
        $('#std_daily_relax_in').val('');
        $('#std_daily_relax_out').val('');
        $('#std_monthly_relax_in').val('');
        $('#std_monthly_relax_out').val('');


        // Custom Clear
        $('#cus_morning').val('');
        $('#cus_afternoon').val('');
        $('#cus_mon').val('');
        $('#cus_tues').val('');
        $('#cus_wed').val('');
        $('#cus_thus').val('');
        $('#cus_fri').val('');
        $('#cus_ext_time').val('');
        $('#cus_ext_freq').val('');
        $('#flexy_time_cus').val('');
        //$('#relaxation_time_cus').val('');
        $('#cus_july_start').val('');
        $('#cus_sat_hour').val('');
        $('#cus_sat_off').val('');
        $('#cus_sat_working').val('');
        $('#cus_mon_thu_hrs').text('');
        $('#cus_fri_hrs').text('');
        $('#cus_avg_weekly').text('');
        $('#cus_sat_working_update').prop('disabled',false);
        $('#cus_sat_off_update').prop('disabled',false);
        $('#cus_daily_relax_in').val('');
        $('#cus_daily_relax_out').val('');
        $('#cus_monthly_relax_in').val('');
        $('#cus_monthly_relax_out').val('');


        // Part Timer Clear
        $('#MonIN').val('');
        $('#MonOUT').val('');    
        $('#TueIN').val('');    
        $('#TueOUT').val('');    
        $('#WedIN').val('');    
        $('#WedOUT').val('');    
        $('#ThuIN').val('');    
        $('#ThuOUT').val('');    
        $('#FriIN').val('');    
        $('#FriOUT').val('');    
        $('#SatIN').val('');            
        $('#SatOUT').val('');
        $('#part_time_mon_thu').text('');
        $('#part_time_fri').text('');
        $('#part_time_avg').text('');
       
    }



    $(document).on('click','.profileDefination_editProfileClass',function(e){

        var profile_name = $('#profileDefination_name').val();
        var profile_id = $('#profileDefination_name').attr('data-id');
        var profile_type_id = $('#profileTypeSelector option:selected').attr('data-profileDefination-type');
        var $form = $('#profileDefination_form');

          var validator = $form.validate({

          rules:{
            profileDefination_name:"required",
            profileDefination_type:"required",
            morning_time:"required",
            afternoon_time:"required",
            custom_morning:"required",
            custom_afternoon:"required"
  
          },
          messages:{
            profileDefination_name:"Please Enter Profile Name",
            profileDefination_type:"Please Select the Profile",
            morning_time:"Enter Time",
            afternoon_time:"Enter  Time",
            custom_morning:"Enter Time",
            custom_afternoon:"Enter Time"
          },


        });

        validator.form();

        if($form.valid() == true){
            updateProfile(profile_id,profile_type_id);
        }
    });

    // PROFILE NAME UPDATION
    function updateProfile(profile_id,profile_type_id){

      var profile_name =  $('#profileDefination_name').val();


      /***** Further Requests of AJAX *****/
        var me = $(this);
        if ( me.data('staffView_staffInfo_requestRunning') ) {
            return;
        }
        me.data('staffView_staffInfo_requestRunning', true);
        /***** Stop Further Request of AJAX *****/

        $.ajax({
            type:"POST",
            cache:false,
            url:"<?php echo e(url('/profileDefination/updateProfile')); ?>",
            data:{
                profile_name:profile_name,
                profile_type_id:profile_type_id,
                profile_id:profile_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success:function(){
                if(profile_type_id == 1){
                    updateStandardProfile(profile_id);
                }

                if(profile_type_id == 2){
                    updateCustomProfile(profile_id);
                }

                if(profile_type_id == 3){
                    updatePartTimeProfile(profile_id);
                }
                staffProfileAllocated();
                $('.callout-updated').css('display','');
                $('.callout-updated').fadeOut(5000);

            },
            /***** Further Requests of AJAX *****/
            complete: function() {
                me.data('staffView_staffInfo_requestRunning', false);
            }
            /***** Stop Further Request of AJAX *****/
        });
    }

    // Standard Profile Updated.
    function updateStandardProfile(profile_id){
        var morning_time = $('#morning_time_update').val();
        var afternoon_time = $('#afternoon_time_update').val();
        var mon_time_out =  $('#mon_time_update').val();
        var tue_time_out =  $('#tues_time_update').val();
        var wed_time_out = $('#wed_time_update').val();
        var thus_time_out = $('#thus_time_update').val();
        var fri_time_out = $('#fri_time_update').val();
        var ext_time = $('#ext_time_update').val();
        var ext_frequency = $('#ext_frequency_update').val();
        var july_start = $('#july_start_update').val();
        var sat_hour = $('#sat_hour_update').val();
        var sat_off = $('#sat_off_update').val();
        var sat_on = $('#sat_on_update').val();
        var avg_hrs = $('#avg_hrs').val();
        var flexy_time = $('#flexy_time_std_upd').val();
        //var relaxtion_time = $('#relaxation_time_std_upd').val();

        var daily_relax_in = $('#std_daily_relax_in_update').val();
        var daily_relax_out = $('#std_daily_relax_out_update').val();
        var monthly_relax_in = $('#std_monthly_relax_in_update').val();
        var monthly_relax_out = $('#std_monthly_relax_out_update').val();


        $.ajax({
            type:"POST",
            cache:false,
            url:"<?php echo e(url('/profileDefination/updateStandardProfile')); ?>",
            data:{
                profile_id:profile_id,
                morning_time:morning_time,
                afternoon_time:afternoon_time,
                mon_time_out:mon_time_out,
                tue_time_out:tue_time_out,
                wed_time_out:wed_time_out,
                thus_time_out:thus_time_out,
                fri_time_out:fri_time_out,
                ext_time:ext_time,
                ext_frequency:ext_frequency,
                july_start:july_start,
                sat_hour:sat_hour,
                sat_off:sat_off,
                sat_on:sat_on,
                avg_hrs:avg_hrs,
                flexy_time:flexy_time,
                daily_relax_in:daily_relax_in,
                daily_relax_out:daily_relax_out,
                monthly_relax_in:monthly_relax_in,
                monthly_relax_out:monthly_relax_out,
                //relaxtion_time:relaxtion_time,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success:function(){


            },

        });
    }

    // Custom Profile Updated
    function updateCustomProfile(profile_id){
        var morning_time = $('#custom_morning_update').val();
        var afternoon_time = $('#custom_afternoon_udpate').val();
        var cus_mon_time = $('#cus_mon_update').val();
        var cus_tue_time = $('#cus_tues_update').val();
        var wed_time = $('#cus_wed_update').val();
        var cus_thus_time = $('#cus_thus_update').val();
        var fri_time = $('#cus_fri_update').val();
        var ext_time = $('#cus_ext_time_update').val();
        var ext_frequency = $('#cus_ext_freq_update').val();
        var july_start = $('#cus_july_start_update').val();
        var sat_hour = $('#cus_sat_hour_update').val();
        var sat_off = $('#cus_sat_off_update').val();
        var sat_on = $('#cus_sat_working_update').val();
        var avg_hrs = $('#cus_avg_weekly').text();
        var flexy_time = $('#flexy_time_cus_upd').val();
        //var relaxtion_time = $('#relaxation_time_cus_upd').val();

        var daily_relax_in = $('#cus_daily_relax_in_update').val();
        var daily_relax_out = $('#cus_daily_relax_out_update').val();
        var monthly_relax_in = $('#cus_monthly_relax_in_update').val();
        var monthly_relax_out = $('#cus_monthly_relax_out_update').val();



        $.ajax({
            type:"POST",
            cache:false,
            url:"<?php echo e(url('/profileDefination/updateCustomProfile')); ?>",
            data:{
                profile_id:profile_id,
                morning_time:morning_time,
                afternoon_time:afternoon_time,
                mon_time:cus_mon_time,
                tue_time:cus_tue_time,
                wed_time:wed_time,
                thus_time:cus_thus_time,
                fri_time:fri_time,
                ext_time:ext_time,
                ext_frequency:ext_frequency,
                july_start:july_start,
                sat_hour:sat_hour,
                sat_off:sat_off,
                sat_on:sat_on,
                avg_hrs:avg_hrs,
                flexy_time:flexy_time,
                //relaxtion_time:relaxtion_time,
                daily_relax_in:daily_relax_in,
                daily_relax_out:daily_relax_out,
                monthly_relax_in:monthly_relax_in,
                monthly_relax_out:monthly_relax_out,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success:function(){


            },

        });
    }

    // Part timer Update
    function updatePartTimeProfile(profile_id){

        var mon_in = $('#MonInUpdate').val();
        var mon_out = $('#MonOUTUpdate').val();
        var tue_in = $('#TueINUpdate').val();
        var tue_out = $('#TueOUTUpdate').val();
        var wed_in = $('#WedINUpdate').val();
        var wed_out = $('#WedOUTUpdate').val();
        var thu_in = $('#ThuINUpdate').val();
        var thu_out = $('#ThuOUTUpdate').val();
        var fri_in = $('#FriINUpdate').val();
        var fri_out = $('#FriOUTUpdate').val();
        var sat_in = $('#SatINUpdate').val();
        var sat_out = $('#SatOUTUpdate').val();
        var part_time_avg = $('#part_time_avg').text();

        $.ajax({
            type:"POST",
            cache:false,
            url:"<?php echo e(url('/profileDefination/updatePartTimerProfile')); ?>",
            data:{
                profile_id:profile_id,
                mon_in:mon_in,
                mon_out:mon_out,
                tue_in:tue_in,
                tue_out:tue_out,
                wed_in:wed_in,
                wed_out:wed_out,
                thu_in:thu_in,
                thu_out:thu_out,
                fri_in:fri_in,
                fri_out:fri_out,
                sat_in:sat_in,
                sat_out:sat_out,
                part_time_avg:part_time_avg,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success:function(){

            },

        });
    }

    // Reset All 
    function resetAll(){
        clearAll();
        clearUpdate();
    }

    // Clear Update Data
    function clearUpdate(){

        $('#morning_time_update').val('');
        $('#afternoon_time_update').val('');
        $('#mon_time_update').val('');
        $('#tues_time_update').val('');
        $('#wed_time_update').val('');
        $('#thus_time_update').val('');
        $('#fri_time_update').val('');
        $('#ext_time_update').val('');
        $('#ext_frequency_update').val('');
        $('#flexy_time_std_upd').val('');
        //$('#relaxation_time_std_upd').val('');
        $('#july_start_update').val('');
        $('#sat_hour_update').val('');
        $('#sat_off_update').val('');
        $('#sat_on_update').val('');
        $('#mon_thurs_hours').text('');
        $('#fri_hrs').text('');
        $('#avg_hrs').text('');
        $('#std_daily_relax_in_update').val('');
        $('#std_daily_relax_out_update').val('');
        $('#std_monthly_relax_in_update').val('');
        $('#std_monthly_relax_out_update').val('');


        $('#profileDefination_name').val('');
        $('#profileTypeSelector option[value=""]').prop('selected',true);

        $('#morning_time_update').attr('id','morning_time');
        $('#afternoon_time_update').attr('id','afternoon_time');
        $('#wed_time_update').attr('id','wed_time');
        $('#ext_time_update').attr('id','ext_time');
        $('#fri_time_update').attr('id','fri_time');
        $('#ext_frequency_update').attr('id','ext_frequency');
        $('#flexy_time_std_upd').attr('id','flexy_time_std');
        //$('#relaxation_time_std_upd').attr('id','relaxation_time_std');
        $('#july_start_update').attr('id','july_start');
        $('#sat_hour_update').attr('id','sat_hour');
        $('#sat_off_update').attr('id','sat_off');
        $('#sat_on_update').attr('id','sat_on');
        $('#std_daily_relax_in_update').attr('id','std_daily_relax_in');
        $('#std_daily_relax_out_update').attr('id','std_daily_relax_out');
        $('#std_monthly_relax_in_update').attr('id','std_monthly_relax_in');
        $('#std_monthly_relax_out_update').attr('id','std_monthly_relax_out');


        $('.profileDefination_editProfileClass').attr('class','profileDefination_insertProfileClass btn blue');
        $('.profileDefination_insertProfileClass').text('Add Profile');


        // Custom

        $('#custom_morning_update').val('');
        $('#custom_afternoon_udpate').val('');
        $('#cus_mon_update').val('');
        $('#cus_tues_update').val('');
        $('#cus_thus_update').val('');
        $('#cus_wed_update').val('');
        $('#cus_fri_update').val('');
        $('#cus_ext_time_update').val('');
        $('#cus_ext_freq_update').val('');
        $('#flexy_time_cus_upd').val('');
        //$('#relaxation_time_cus_upd').val('');
        $('#cus_july_start_update').val('');
        $('#cus_sat_hour_update').val('');
        $('#cus_sat_off_update').val('');
        $('#cus_sat_working_update').val('');
        $('#cus_mon_thu_hrs').text('');
        $('#cus_fri_hrs').text('');
        $('#cus_avg_weekly').text('');
        $('#cus_daily_relax_in_update').val('');
        $('#cus_daily_relax_out_update').val('');
        $('#cus_monthly_relax_in_update').val('');
        $('#cus_monthly_relax_out_update').val('');


        $('#custom_morning_update').attr('id','cus_morning');
        $('#custom_afternoon_udpate').attr('id','cus_afternoon');
        $('#cus_wed_update').attr('id','cus_wed');
        $('#cus_ext_time_update').attr('id','cus_ext_time');
        $('#cus_fri_update').attr('id','cus_fri');
        $('#cus_ext_freq').attr('id','cus_ext_freq');
        $('#flexy_time_cus').attr('id','flexy_time_cus');
        //$('#relaxation_time_cus').attr('id','relaxation_time_cus');
        $('#cus_july_start').attr('id','cus_july_start');
        $('#cus_sat_hour').attr('id','cus_sat_hour');
        $('#cus_sat_off').attr('id','cus_sat_off');
        $('#cus_sat_working').attr('id','cus_sat_working');
        $('#cus_daily_relax_in_update').attr('id','cus_daily_relax_in');
        $('#cus_daily_relax_out_update').attr('id','cus_daily_relax_out');
        $('#cus_monthly_relax_in_update').attr('id','cus_monthly_relax_in');
        $('#cus_monthly_relax_out_update').attr('id','cus_monthly_relax_out');



        //Part timer

        $('#MonInUpdate').val('');
        $('#MonOUTUpdate').val('');    
        $('#TueINUpdate').val('');    
        $('#TueOUTUpdate').val('');    
        $('#WedINUpdate').val('');    
        $('#WedOUTUpdate').val('');    
        $('#ThuINUpdate').val('');    
        $('#ThuOUTUpdate').val('');    
        $('#FriINUpdate').val('');    
        $('#FriOUTUpdate').val('');    
        $('#SatINUpdate').val('');            
        $('#SatOUTUpdate').val('');
        $('#part_time_mon_thu').text('');
        $('#part_time_fri').text('');
        $('#part_time_avg').text('');

        $('#MonInUpdate').attr('id','MonIN');
        $('#MonOUTUpdate').attr('id','MonOUT');    
        $('#TueINUpdate').attr('id','TueIN');    
        $('#TueOUTUpdate').attr('id','TueOUT');    
        $('#WedINUpdate').attr('id','WedIN');    
        $('#WedOUTUpdate').attr('id','WedOUT');    
        $('#ThuINUpdate').attr('id','ThuIN');    
        $('#ThuOUTUpdate').attr('id','ThuOUT');    
        $('#FriINUpdate').attr('id','FriIN');    
        $('#FriOUTUpdate').attr('id','FriOUT');    
        $('#SatINUpdate').attr('id','SatIN');            
        $('#SatOUTUpdate').attr('id','SatOUT');

        $('#standardProfile').hide();
        $('#customProfile').hide();
        $('#parttimeProfile').hide();

        $('#counter_mon_thu_hrs').text('');
        $('#counter_mon_thu_min').text('');

        $('#counter_avg_hrs').text('');
        $('#counter_avg_min').text('');
            
        $('#counter_fri_hrs').text('');
        $('#counter_fri_min').text('');
        $('#profileTypeSelector').prop('disabled',false);
    }


    // Calculating Average Hours,Mon-Thurs,Fri Hours
    $(document).on('keypress change keyup','#morning_time,#afternoon_time,#mon_time,#tues_time,#wed_time,#thus_time,#fri_time,#cus_morning,#cus_afternoon,#cus_mon,#cus_tues,#cus_wed,#cus_thus,#cus_fri,#sat_hour,#sat_on,#sat_off,#ext_frequency,#ext_time,#cus_ext_time,#cus_ext_freq,#cus_sat_hour,#cus_sat_off,#cus_sat_working',function(e){
        
       var morning_time = $('#morning_time').val();
       var afternoon_time = $('#afternoon_time').val();
       
       var target = e.target.id;
       if(target == 'afternoon_time'){
            $('#mon_time').val(afternoon_time);
            $('#tues_time').val(afternoon_time);
            $('#wed_time').val(afternoon_time);
            $('#thus_time').val(afternoon_time);
            $('#fri_time').val(afternoon_time);
        }

       var mon_time = $('#mon_time').val();
       var tue_time = $('#tues_time').val();
       var wed_time = $('#wed_time').val();
       var thus_time = $('#thus_time').val();
       var fri_hours = $('#fri_time').val();

       var sat_hours = $('#sat_hour').val();
       var sat_off = $('#sat_off').val();
       var sat_on = $('#sat_on').val();
       var ext_time = $('#ext_time').val();
       var ext_frequency = $('#ext_frequency').val();
       
       

       
       var custom_morning = $('#cus_morning').val();
       var custom_afternoon = $('#cus_afternoon').val();
       var custom_friday = $('#cus_fri').val();
       var difference_time;

       // Calculate AVG WEEK HOUR New Layout

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
        if(morning_time.length != 0 && fri_hours.length != 0){
            friday_weekly_time.push(time_difference(morning_time,fri_hours));
        }


        var hour_minute =  sum_time(average_weekly_time);
        var hour_minute_friday = sum_time(friday_weekly_time);


        // Pasting the Mon Thursday Hour

        $('#counter_mon_thu_hrs').text(hour_minute.hour);
        $('#counter_mon_thu_min').text(hour_minute.minute);

        // Pasting Average Mon Thursday hour in below

        $('#mon_thurs_hours').text((hour_minute.hour+":"+hour_minute.minute));  

        // Pasting the Friday Hour

        $('#counter_fri_hrs').text(hour_minute_friday.hour);
        $('#counter_fri_min').text(hour_minute_friday.minute);

        // Pasting Friday hour in below

        $('#fri_hrs').text((hour_minute_friday.hour+":"+hour_minute_friday.minute));



       // Standard Morning And Afternoon Timing Comments 
       if(morning_time.length != 0 && afternoon_time.length != 0){
            var p = "1/1/1970 ";
            difference_mt = new Date(new Date(p+afternoon_time) - new Date(p+morning_time)).toUTCString().split(" ")[4];
            difference_f = new Date(new Date(p+fri_hours) - new Date(p+morning_time)).toUTCString().split(" ")[4];
            console.log("Difference of Mon-Thur"+difference_mt);

                                 
                var t1 = difference_mt.split(':');
                var t2 = difference_f.split(':');
                // $('#counter_mon_thu_hrs').text(t1[0]);
                // $('#counter_mon_thu_min').text(t1[1]);
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
                console.log(sat);
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
                    difference_ext = new Date(new Date(p+ext_time) - new Date(p+afternoon_time)).toUTCString().split(" ")[4];
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
            
                $('#counter_avg_hrs').text(hrs);
                $('#counter_avg_min').text(mins);
                $('#avg_hrs').text(t1);
       }
       // End Comments



        // Custom Morning And Afternoon Timing



        if(custom_morning.length != 0 && custom_afternoon.length != 0){

            var sat_hours = $('#cus_sat_hour').val();
            var sat_off = $('#cus_sat_off').val();
            var sat_on = $('#cus_sat_working').val();
            var ext_time = $('#cus_ext_time').val();
            var ext_frequency = $('#cus_ext_freq').val();

            if(target == 'cus_afternoon'){
                $('#cus_mon').val(custom_afternoon);
                $('#cus_tues').val(custom_afternoon);
                $('#cus_wed').val(custom_afternoon);
                $('#cus_thus').val(custom_afternoon);
                $('#cus_fri').val(custom_afternoon);
            }

           var mon_time = $('#cus_mon').val();
           var tue_time = $('#cus_tues').val();
           var wed_time = $('#cus_wed').val();
           var thus_time = $('#cus_thus').val();
           var fri_hours = $('#cus_fri').val();

           // Calculate AVG WEEK HOUR New Layout

        var average_weekly_time = [];
        var friday_weekly_time = [];

        // Mon time
        if(custom_morning.length != 0 && mon_time.length != 0){
            average_weekly_time.push(time_difference(custom_morning,mon_time));
        }

        // Tue Time
        if(custom_morning.length != 0 && tue_time.length != 0){
            average_weekly_time.push(time_difference(custom_morning,tue_time));
        }

        // Wed Time
        if(custom_morning.length != 0 && wed_time.length != 0){
            average_weekly_time.push(time_difference(custom_morning,wed_time));
        }

        // Thurs Time
        if(custom_morning.length != 0 && thus_time.length != 0){
            average_weekly_time.push(time_difference(custom_morning,thus_time));
        }

        // Fri Time
        if(custom_morning.length != 0 && fri_hours.length != 0){
            friday_weekly_time.push(time_difference(custom_morning,fri_hours));
        }


        var hour_minute =  sum_time(average_weekly_time);
        var hour_minute_friday = sum_time(friday_weekly_time);


        // Pasting the Mon Thursday Hour

        $('#counter_mon_thu_hrs').text(hour_minute.hour);
        $('#counter_mon_thu_min').text(hour_minute.minute);

        // Pasting Average Mon Thursday hour in below

        $('#cus_mon_thu_hrs').text((hour_minute.hour+":"+hour_minute.minute));  

        // Pasting the Friday Hour

        $('#counter_fri_hrs').text(hour_minute_friday.hour);
        $('#counter_fri_min').text(hour_minute_friday.minute);

        // Pasting Friday hour in below

        $('#cus_fri_hrs').text((hour_minute_friday.hour+":"+hour_minute_friday.minute));


        var p = "1/1/1970 ";
        difference_mt = new Date(new Date(p+custom_afternoon) - new Date(p+custom_morning)).toUTCString().split(" ")[4];
        difference_f = new Date(new Date(p+custom_friday) - new Date(p+custom_morning)).toUTCString().split(" ")[4];
        
    
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
          
            $('#cus_avg_weekly').text(t1);
            $('#counter_avg_hrs').text(hrs);
            $('#counter_avg_min').text(mins);

        }

    });

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

//====================== Calculating In  Updation Change ===================//
//=========================================================================//

  // Commit By Rohail 
  // Standard Updation
  
  

   $(document).on('keypress change keyup','#morning_time_update,#afternoon_time_update,#mon_time_update,#tues_time_update,#wed_time_update,#thus_time_update,#fri_time_update,#sat_hour_update,#ext_time_update,#ext_frequency_update,#sat_off_update,#sat_on_update',function(e){
   
   var morning_time = $('#morning_time_update').val();
   var afternoon_time = $('#afternoon_time_update').val();
   var fri_hours = $('#fri_time_update').val();
   var mon_time = $('#mon_time_update').val();
   var tue_time = $('#tues_time_update').val();
   var wed_time = $('#wed_time_update').val();
   var thus_time = $('#thus_time_update').val();
   var sat_hours = $('#sat_hour_update').val();
   var sat_off = $('#sat_off_update').val();
   var sat_on = $('#sat_on_update').val();
   var ext_time = $('#ext_time_update').val();
   var ext_frequency = $('#ext_frequency_update').val();
   
   
 

     // Calculate AVG WEEK HOUR New Layout

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
    if(morning_time.length != 0 && fri_hours.length != 0){
        friday_weekly_time.push(time_difference(morning_time,fri_hours));
    }


    var hour_minute =  sum_time(average_weekly_time);
    var hour_minute_friday = sum_time(friday_weekly_time);


    // Pasting the Mon Thursday Hour

    $('#counter_mon_thu_hrs').text(hour_minute.hour);
    $('#counter_mon_thu_min').text(hour_minute.minute);

    // Pasting Average Mon Thursday hour in below

    $('#mon_thurs_hours').text((hour_minute.hour+":"+hour_minute.minute));  

    // Pasting the Friday Hour

    $('#counter_fri_hrs').text(hour_minute_friday.hour);
    $('#counter_fri_min').text(hour_minute_friday.minute);

    // Pasting Friday hour in below

    $('#fri_hrs').text((hour_minute_friday.hour+":"+hour_minute_friday.minute));



   // Standard Morning And Afternoon Timing Comments 
   if(morning_time.length != 0 && afternoon_time.length != 0){
        var p = "1/1/1970 ";
        difference_mt = new Date(new Date(p+afternoon_time) - new Date(p+morning_time)).toUTCString().split(" ")[4];
        difference_f = new Date(new Date(p+fri_hours) - new Date(p+morning_time)).toUTCString().split(" ")[4];
        console.log("Difference of Mon-Thur"+difference_mt);

                             
            var t1 = difference_mt.split(':');
            var t2 = difference_f.split(':');
            // $('#counter_mon_thu_hrs').text(t1[0]);
            // $('#counter_mon_thu_min').text(t1[1]);
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
            console.log(sat);
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
                difference_ext = new Date(new Date(p+ext_time) - new Date(p+afternoon_time)).toUTCString().split(" ")[4];
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
        
            $('#counter_avg_hrs').text(hrs);
            $('#counter_avg_min').text(mins);
            $('#avg_hrs').text(t1);
   }
   // End Comments

});


    // Custom Updation
    $(document).on('keypress change','#custom_morning_update,#custom_afternoon_udpate,#cus_mon_update,#cus_tues_update,#cus_wed_update,#cus_thus_update,#cus_fri_update,#cus_sat_hour_update,#cus_ext_time_update,#cus_ext_freq_update,#cus_sat_off_update,#cus_sat_working_update',function(){

      var custom_morning = $('#custom_morning_update').val();
      var custom_afternoon = $('#custom_afternoon_udpate').val();
      
      var mon_time = $('#cus_mon_update').val();
      var tue_time = $('#cus_tues_update').val();
      var wed_time = $('#cus_wed_update').val();
      var thus_time = $('#cus_thus_update').val();
      var custom_friday = $('#cus_fri_update').val();

      var sat_hours = $('#cus_sat_hour_update').val();
      var sat_off = $('#cus_sat_off_update').val();
      var sat_on = $('#cus_sat_working_update').val();
      var ext_time = $('#cus_ext_time_update').val();
      var ext_frequency = $('#cus_ext_freq_update').val();
      var difference_time;


       // Calculate AVG WEEK HOUR New Layout

    var average_weekly_time = [];
    var friday_weekly_time = [];

    // Mon time
    if(custom_morning.length != 0 && mon_time.length != 0){
        average_weekly_time.push(time_difference(custom_morning,mon_time));
    }

    // Tue Time
    if(custom_morning.length != 0 && tue_time.length != 0){
        average_weekly_time.push(time_difference(custom_morning,tue_time));
    }

    // Wed Time
    if(custom_morning.length != 0 && wed_time.length != 0){
        average_weekly_time.push(time_difference(custom_morning,wed_time));
    }

    // Thurs Time
    if(custom_morning.length != 0 && thus_time.length != 0){
        average_weekly_time.push(time_difference(custom_morning,thus_time));
    }

    // Fri Time
    if(custom_morning.length != 0 && custom_friday.length != 0){
        friday_weekly_time.push(time_difference(custom_morning,custom_friday));
    }


    var hour_minute =  sum_time(average_weekly_time);
    var hour_minute_friday = sum_time(friday_weekly_time);


    // Pasting the Mon Thursday Hour

    $('#counter_mon_thu_hrs').text(hour_minute.hour);
    $('#counter_mon_thu_min').text(hour_minute.minute);

    // Pasting Average Mon Thursday hour in below

    $('#cus_mon_thu_hrs').text((hour_minute.hour+":"+hour_minute.minute));  

    // Pasting the Friday Hour

    $('#counter_fri_hrs').text(hour_minute_friday.hour);
    $('#counter_fri_min').text(hour_minute_friday.minute);

    // Pasting Friday hour in below

    $('#cus_fri_hrs').text((hour_minute_friday.hour+":"+hour_minute_friday.minute));


    var p = "1/1/1970 ";
    difference_mt = new Date(new Date(p+custom_afternoon) - new Date(p+custom_morning)).toUTCString().split(" ")[4];
    difference_f = new Date(new Date(p+custom_friday) - new Date(p+custom_morning)).toUTCString().split(" ")[4];
    

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
  
    $('#cus_avg_weekly').text(t1);
    $('#counter_avg_hrs').text(hrs);
    $('#counter_avg_min').text(mins);


        

    });

    // PART TIME UPDATION CALCULATED
    $(document).on('keypress change keyup','#MonInUpdate,#MonOUTUpdate,#TueINUpdate,#TueOUTUpdate,#WedINUpdate,#WedOUTUpdate,#ThuINUpdate,#ThuOUTUpdate,#FriINUpdate,#FriOUTUpdate,#SatINUpdate,#SatOUTUpdate',function(f){


       var mon_in= $('#MonInUpdate').val();
       var mon_out = $('#MonOUTUpdate').val();
       var tue_in = $('#TueINUpdate').val();
       var tue_out = $('#TueOUTUpdate').val();
       var wed_in = $('#WedINUpdate').val();
       var wed_out = $('#WedOUTUpdate').val();
       var thu_in = $('#ThuINUpdate').val();
       var thu_out = $('#ThuOUTUpdate').val();
       var fri_in = $('#FriINUpdate').val();
       var fri_out = $('#FriOUTUpdate').val();
       var sat_in = $('#SatINUpdate').val();
       var sat_out = $('#SatOUTUpdate').val();


      if(fri_in.length != 0 && fri_out.length != 0){
        var p = "1/1/1970 ";
        difference = new Date(new Date(p+fri_out) - new Date(p+fri_in)).toUTCString().split(" ")[4];           
        $('#part_time_fri').text(difference);
        $('#counter_fri_hrs').text(difference.split(':')[0]);
        $('#counter_fri_min').text(difference.split(':')[1]);
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


      $('#part_time_avg').text(difference_fri);


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
        
        if(spliting[1].length == 1){
          t1 = hrs+':'+'0'+mins;
        }else{
          t1 = hrs+':'+mins;
        }
        $('#part_time_avg').text(t1);
        $('#counter_avg_hrs').text(hrs);
        $('#counter_avg_min').text(mins);



        // Calculated Mon Thursday Hours

        mins = Number(splitTime1[1]) + Number(splitTime2[1]) + Number(splitTime3[1]) + Number(splitTime4[1]);
        minhrs = Math.floor(parseInt(mins / 60));
        hrs = Number(splitTime1[0]) + Number(splitTime2[0]) + Number(splitTime3[0]) + Number(splitTime4[0])  + minhrs;
        mins = mins % 60;
        var mon_thu = hrs+':'+mins;

        var spliting = mon_thu.split(':');
        
        if(spliting[1].length == 1){
          mon_thu = hrs+':'+'0'+mins;
        }else{
          mon_thu = hrs+':'+mins;
        }

      $('#part_time_mon_thu').text(mon_thu);
      $('#counter_mon_thu_hrs').text(mon_thu.split(":")[0]);
      $('#counter_mon_thu_min').text(mon_thu.split(":")[1]);

  });


    // PART TIME CALCULATED
    $(document).on('keypress change keyup','#MonIN,#MonOUT,#TueIN,#TueOUT,#WedIN,#WedOUT,#ThuIN,#ThuOUT,#FriIN,#FriOUT,#SatIN,#SatOUT',function(f){


           var mon_in= $('#MonIN').val();
           var mon_out = $('#MonOUT').val();
           var tue_in = $('#TueIN').val();
           var tue_out = $('#TueOUT').val();
           var wed_in = $('#WedIN').val();
           var wed_out = $('#WedOUT').val();
           var thu_in = $('#ThuIN').val();
           var thu_out = $('#ThuOUT').val();
           var fri_in = $('#FriIN').val();
           var fri_out = $('#FriOUT').val();
           var sat_in = $('#SatIN').val();
           var sat_out = $('#SatOUT').val();


          if(fri_in.length != 0 && fri_out.length != 0){
            var p = "1/1/1970 ";
            difference = new Date(new Date(p+fri_out) - new Date(p+fri_in)).toUTCString().split(" ")[4];           
            $('#part_time_fri').text(difference);
            $('#counter_fri_hrs').text(difference.split(':')[0]);
            $('#counter_fri_min').text(difference.split(':')[1]);
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


          $('#part_time_avg').text(difference_fri);


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
            
            if(spliting[1].length == 1){
              t1 = hrs+':'+'0'+mins;
            }else{
              t1 = hrs+':'+mins;
            }
            $('#part_time_avg').text(t1);
                        $('#counter_avg_hrs').text(hrs);
            $('#counter_avg_min').text(mins);



            // Calculated Mon Thursday Hours

            mins = Number(splitTime1[1]) + Number(splitTime2[1]) + Number(splitTime3[1]) + Number(splitTime4[1]);
            minhrs = Math.floor(parseInt(mins / 60));
            hrs = Number(splitTime1[0]) + Number(splitTime2[0]) + Number(splitTime3[0]) + Number(splitTime4[0])  + minhrs;
            mins = mins % 60;
            var mon_thu = hrs+':'+mins;

            var spliting = mon_thu.split(':');
            
            if(spliting[1].length == 1){
              mon_thu = hrs+':'+'0'+mins;
            }else{
              mon_thu = hrs+':'+mins;
            }

          $('#part_time_mon_thu').text(mon_thu);
          $('#counter_mon_thu_hrs').text(mon_thu.split(":")[0]);
          $('#counter_mon_thu_min').text(mon_thu.split(":")[1]);


      });

//========= Disable The text box  On =================//
//==================================================//
  

  // Standard Profile
  $(document).on('keypress change','#sat_off,#sat_on',function(e){

    var sat_off = $('#sat_off').val();
    var sat_on = $('#sat_on').val();

    if(sat_off != ''){
      $("#sat_on").attr('disabled','disabled');
    }

    if(sat_on != ''){
      $('#sat_off').attr('disabled','disabled');
    }

    if(sat_off == '' && sat_on == ''){
      $("#sat_off").removeAttr('disabled');
      $("#sat_on").removeAttr('disabled');
    }

  });

  // Custom Profile

  $(document).on('keypress change','#cus_sat_off,#cus_sat_working',function(e){

    var sat_off = $('#cus_sat_off').val();
    var sat_on = $('#cus_sat_working').val();

    if(sat_off != ''){
      $("#cus_sat_working").attr('disabled','disabled');
    }

    if(sat_on != ''){
      $('#cus_sat_off').attr('disabled','disabled');
    }

    if(sat_off == '' && sat_on == ''){
      $("#cus_sat_off").removeAttr('disabled');
      $("#cus_sat_working").removeAttr('disabled');
    }

  });


  // Standard Profile Update

    $(document).on('keypress change','#sat_off_update,#sat_on_update',function(e){

    var sat_off = $('#sat_off_update').val();
    var sat_on = $('#sat_on_update').val();

    if(sat_off != ''){
      $("#sat_on_update").attr('disabled','disabled');
    }

    if(sat_on != ''){
      $('#sat_off_update').attr('disabled','disabled');
    }

    if(sat_off == '' && sat_on == ''){
      $("#sat_off_update").removeAttr('disabled');
      $("#sat_on_update").removeAttr('disabled');
    }

  });

  // Custom Profile Update

    $(document).on('keypress change','#cus_sat_off_update,#cus_sat_working_update',function(e){

        var sat_off = $('#cus_sat_off_update').val();
        var sat_on = $('#cus_sat_working_update').val();

        if(sat_off != ''){
          $("#cus_sat_working_update").attr('disabled','disabled');
        }

        if(sat_on != ''){
          $('#cus_sat_off_update').attr('disabled','disabled');
        }

        if(sat_off == '' && sat_on == ''){
          $("#cus_sat_off_update").removeAttr('disabled');
          $("#cus_sat_working_update").removeAttr('disabled');
        }

      });

    // Browser Updation
    function staffProfileAllocated(){
        $.ajax({
            type:"post",
            cache:false,
            url:"<?php echo e(url('/profileDefination/staffProfileAllocated')); ?>",
            data:{
                "_token":"<?php echo e(csrf_token()); ?>"
            },
            success:function(e){
                var profileAllocation = JSON.parse(e);
                var table = '';
                var i = 1;
                table += '<thead>';
                table += '<tr class="uppercase">';
                table += '<th colspan=""> S.No </th>';
                table += '<th colspan=""> Profile </th>';
                table += '<th class="text-center"> Allocated to </th>';
                table += '</tr>';
                table += '</thead>';
                $.map(profileAllocation,function(value,index){
                   
                    table += '<tr>';
                    table += '<td>'+(i++)+'</td>';
                    table += '<td><a href="javascript:void(0)" class="primary-link tooltips staffDefination_profile_id" data-toggle="tooltip" data-placement="top" data-id="'+value.id+'" data-type-id="'+value.profile_type_id+'" data-original-title="'+value.tooltip+'">'+value.name+'</a></td>';
                    table += '<td class="text-center">'+value.staff_allocation+'</td>';
                    table += '</tr>';
                });


                $('#table_staffList').html(table);
                $('.tooltips').tooltip();
            }

        });
    }

    // Searching  In a Profile Defination Table
    $('#staffView_StaffList_Search').keyup(function() {
        var $rows = $('#table_staffList >tbody >tr');
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });

    var sortTable = function (f,n){
    var rows = $('#table_staffList tbody  tr').get();
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
        var v = $(elm).children('td').eq(1).text().toUpperCase();
        
        if($.isNumeric(v)){
            v = parseInt(v,10);
        }
        return v;
    }

    $.each(rows, function(index, row) {
        $('#table_staffList').children('tbody').append(row);
    });

    }

    $(document).on('click','.applySort',function(){


    var sortName = $('#StaffView_Sort_Name').find(":selected").val();
        if(sortName != null){
            if(sortName === 'A to Z'){
                sortTable(1,9);
            }else if(sortName === 'Z to A'){
                sortTable(-1,9);
            }
        }

    });

    $(document).on('click','.clearbtn',function(){
        resetAll();
        removeSelected('staffDefination_profile_id',null);
    });

    $(document).on('click','.clearSearch',function(){
        sortTable(1,9);
        $('#StaffView_Sort_Name').val('');
    });

var pagedestroy = function(){
}

loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/datatable.js", function(){
    loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/datatables/datatables.min.js", function(){
        loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/profile.js", function(){
                loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/table-datatables-managed.js", function(){
                    loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("<?php echo e(URL::to('metronic')); ?>/layouts/layout/scripts/demo.min.js", function(){
                                loadScript("<?php echo e(URL::to('')); ?>/js/jquery.filtertable.min.js", function(){
                                    loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery-validation/js/jquery.validate.min.js",function(){
                                         loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/app.min.js", pagefunction)
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
<!-- END PAGE LEVEL PLUGINS -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php 
/************************************
* Another Example of Script loading
*************************************/ ?>

<!-- END PAGE LEVEL PLUGINS -->