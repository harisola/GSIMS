<link href="{{ URL::to('/css/ProfileDefinition.css') }}" rel="stylesheet" type="text/css" />
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #e6e6e6 !important;
}
#daterange {
        background: url(img/dateRangeIcon.jpg);
    position: absolute;
    right: 102px;
    top: 23px;
    width: 32px;
    border: 0 none;
    height: 32px;
    text-indent: 999px;
}
.modal-dialog {
    width: 600px;
    margin: 30px auto;
}
#weekly_timesheet_table tr td {
    text-align:center;  
}
#weekly_timesheet_table tr td:first-child {
    text-align:left;    
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
            <span>Weekly Timesheet</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN USE PROFILE -->

<div class="row marginTop20">

    <div class="col-md-12 fixed-height">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit bordered">
            
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-calendar font-dark"></i>
                    <span class="total-record caption-subject sbold uppercase font-dark">Weekly Timesheet - 357 </span>
                </div>
                <div class="actions col-md-3">
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
                                <select multiple="multiple" id="StaffView_Filter_Profile" class="layout-option form-control input-sm">
                                    
                                    @foreach($profile_detail as $profile) { ?>
                                    <option value="{{ $profile->name }}" >{{ $profile->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Department </span>
                                <select multiple="multiple" id="StaffView_Filter_Department" class="layout-option form-control input-sm">
                                    @foreach($staff as $staff_detail) { ?>
                                        <option value="{{ $staff_detail->c_bottomline }}"> {{ $staff_detail->c_bottomline }} </option>
                                    @endforeach
                                   <option value=""></option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Campus </span>
                                <select id="StaffView_Filter_Campus" class="page-header-option form-control input-sm">
                                    <option value="South">South</option>
                                    <option value="North">North</option>
                                </select>
                            </div>
                            <div class="theme-option text-center" id="staffView_filter_btn">
                                <a href="javascript:;" class="btn uppercase green-jungle applyFilter">Apply Filter</a>
                                <a id="staffWeeksheet_btn" href="javascript:;" class="btn uppercase grey-salsa clearFilter">Clear Filter</a>
                            </div>
                            
                        </div><!-- theme-options -->
                    </div><!-- theme-panel -->


                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="toggler2"> </div>
                        <div class="toggler2-close"> </div>
                        <div class="theme-options2">
                            <div class="theme-option">
                                <span> By Name </span>
                                <select id="sort_name" class="layout-option form-control input-sm">
                                   <option value="Ascending">Ascending order (A to Z)</option>
                                   <option value="Descending">Descending order (Z to A)</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> By Department Name </span>
                                <select id="sort_department" class="layout-option form-control input-sm">
                                   <option value="Ascending">Ascending order (A to Z)</option>
                                   <option value="Descending">Descending order (Z to A)</option>
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
                </div>
            </div>
                <input id="daterange" type="text" name="daterange"  />
                <input type="hidden" name="startDate" id="startDate">
                <input type="hidden" name="endDate" id="endDate">
            <div class="portlet-body">

                <table class="table table-striped table-hover table-bordered" id="weekly_timesheet_table">
                    <thead>
                    @php $holidayHtml = [];  @endphp 
                        <tr>
                        <th width="20%"> Name </th>
                        <th style="display: none;"> Name </th>
                        <th style="display: none;"> Profile Name </th>
                        @foreach ($get_weeks as  $key => $week)

                            <th class="text-center" data-id="{{ $week->id }}"> {{ date('D',strtotime($week->date)) }} 
                            <br />
                            <small> {{ date('d M Y',strtotime($week->date))  }}</small> </th>

                            @php

                            $datsDates[$key] = $week->date;
                            if (in_array($week->date, $holidaysDates)) {

                                $holidayHtml[$key] = '<a class="tooltips" data-placement="bottom" data-original-title="Provicial Holiday"><img src="img/sun.png" width="20" /></a>';
                            }
                            else {
                                $holidayHtml[$key] = '';
                            }
                             

                            @endphp                       
                        @endforeach 
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($weeklyTimeSheetData as $item)


                        <tr> 
                            <td> <strong>{{$item->abridged_name}}</strong> <br /><small><strong>Dept: {{$item->c_bottomline}}</strong></small><br /><small><strong>Desg: {{$item->c_topline}}</strong></small><br /><small><strong>Profile: {{$item->tt_profile_name}}</strong></small> </td>
                            <td style="display:none">{{$item->c_bottomline}}</td>
                            <td style="display:none">{{$item->tt_profile_name}}</td>

                            <td class="text-center ">
                                <div class="input-group">
                                    <input type="hidden" id="{{$item->d1_id}}_in" value="0">
                                    <input type="hidden" id="{{$item->d1_id}}_out" value="0">
                                    <input  {{ ($holidayHtml[0] == '' || $item->d1_holidayFlag != 0 ) ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d1_id.'_in") ' }}   class="form-control input-sm"  @php 
                                    echo ($item->d1_id != '') ? 'onChange="updateData('. $item->d1_id .',&apos;time_in&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_in&apos;,&apos;d1&apos;,&apos;'.$item->d1_date.'&apos;)"';
                                    @endphp 
                                    id="{{ $item->d1_id == '' ? 'd1_timeIn_'.$item->staff_id:$item->d1_id . '_timeIn' }}"   value="{{ $holidayHtml[0] == '' || $item->d1_holidayFlag != 0  ? $item->d1_in : 'N/A' }}" />
                                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                                </div><!-- input-group --> 
                                <div class="input-group">
                                    <input  {{ ($holidayHtml[0] == '' || $item->d1_holidayFlag != 0 ) ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d1_id.'_out") ' }}   @php 
                                    echo ($item->d1_id != '') ? 'onChange="updateData('. $item->d1_id .',&apos;time_out&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_out&apos;,&apos;d1&apos;,&apos;'.$item->d1_date.'&apos;)"';
                                    @endphp 
                                     id="{{ $item->d1_id == '' ? 'd1_timeOut_'.$item->staff_id:$item->d1_id . '_timeOut' }}" class="form-control input-sm"   value="{{ $holidayHtml[0] == ''   || $item->d1_holidayFlag != 0 ? $item->d1_out : 'N/A' }}" />
                                    <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                                </div><!-- input-group --> 
                                 @php  echo ($item->d1_on_leave == 1 )? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>'.$item->d1_perc.'%</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>';  @endphp  
                                
                                <?php  echo $holidayHtml[0]; ?>
                                
                            </td>  
                            <td class="text-center ">
                                <div class="input-group">
                                    <input type="hidden" id="{{$item->d2_id}}_in" value="0">
                                    <input type="hidden" id="{{$item->d2_id}}_out" value="0">
                                    <input {{ $holidayHtml[1] == ''   || $item->d2_holidayFlag != 0  ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d2_id.'_in") ' }}
                                    @php 
                                    echo ($item->d2_id != '') ? 'onChange="updateData('. $item->d2_id .',&apos;time_in&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_in&apos;,&apos;d2&apos;,&apos;'.$item->d2_date.'&apos;)"';
                                    @endphp 
                                      id="{{ $item->d2_id == '' ? 'd2_timeIn_'.$item->staff_id:$item->d2_id . '_timeIn' }}" class="form-control input-sm"  value="{{ $holidayHtml[1] == '' || $item->d2_holidayFlag != 0  ? $item->d2_in : 'N/A' }}" />
                                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                                </div><!-- input-group -->  
                                <div class="input-group">
                                    <input {{ $holidayHtml[1] == '' || $item->d2_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d2_id.'_out") ' }}    @php 
                                    echo ($item->d2_id != '') ? 'onChange="updateData('. $item->d2_id .',&apos;time_out&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_out&apos;,&apos;d2&apos;,&apos;'.$item->d2_date.'&apos;)"';
                                    @endphp

                                     id="{{ $item->d2_id == '' ? 'd2_timeOut_'.$item->staff_id:$item->d2_id . '_timeOut' }}" class="form-control input-sm"   value="{{ $holidayHtml[1] == '' || $item->d2_holidayFlag != 0 ? $item->d2_out : 'N/A' }}"/>
                                    <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                                </div><!-- input-group --> 
                                @php  echo ($item->d2_on_leave == 1 )? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>'.$item->d2_perc.' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>';  @endphp
                                 <?php  echo  $holidayHtml[1]; ?>
                            </td>  
                            <td class="text-center ">
                                <div class="input-group">
                                    <input type="hidden" id="{{$item->d3_id}}_in" value="0">
                                    <input type="hidden" id="{{$item->d3_id}}_out" value="0">
                                    <input {{ $holidayHtml[2] == '' || $item->d3_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d3_id.'_in")' }}  @php 
                                    echo ($item->d3_id != '') ? 'onChange="updateData('. $item->d3_id .',&apos;time_in&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_in&apos;,&apos;d3&apos;,&apos;'.$item->d3_date.'&apos;)"';
                                    @endphp
                                     id="{{ $item->d3_id == '' ? 'd3_timeIn_'.$item->staff_id:$item->d3_id . '_timeIn' }}" class="form-control input-sm"  value="{{ $holidayHtml[2] == '' || $item->d3_holidayFlag != 0 ? $item->d3_in : 'N/A' }}" />
                                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                                </div><!-- input-group -->  
                                <div class="input-group">

                                    <input {{ $holidayHtml[2] == '' || $item->d3_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d3_id.'_out")' }} @php 
                                    echo ($item->d3_id != '') ? 'onChange="updateData('. $item->d3_id .',&apos;time_out&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_out&apos;,&apos;d3&apos;,&apos;'.$item->d3_date.'&apos;)"';
                                    @endphp  id="{{ $item->d3_id == '' ? 'd3_timeOut_'.$item->staff_id:$item->d3_id . '_timeOut' }}" class="form-control input-sm" 
                                    value="{{ $holidayHtml[2] == '' || $item->d3_holidayFlag != 0 ? $item->d3_out : 'N/A' }}"  />
                                    <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                                </div><!-- input-group --> 
                                @php  echo ($item->d3_on_leave == 1 )? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>'.$item->d3_perc.' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>';  @endphp
                                 <?php  echo  $holidayHtml[2]; ?>
                            </td> 
                            <td class="text-center">
                                <div class="input-group">
                                    <input type="hidden" id="{{$item->d4_id}}_in" value="0">
                                    <input type="hidden" id="{{$item->d4_id}}_out" value="0">                                   
                                    <input {{ $holidayHtml[3] == '' || $item->d4_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d4_id.'_in")' }} @php 
                                    echo ($item->d4_id != '') ? 'onChange="updateData('. $item->d4_id .',&apos;time_in&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_in&apos;,&apos;d4&apos;,&apos;'.$item->d4_date.'&apos;)"';
                                    @endphp

                                     id="{{ $item->d4_id == '' ? 'd4_timeIn_'.$item->staff_id:$item->d4_id . '_timeIn' }}" class="form-control input-sm" value="{{ $holidayHtml[3] == '' || $item->d4_holidayFlag != 0 ? $item->d4_in : 'N/A' }}" />
                                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                                </div><!-- input-group --> 
                                <div class="input-group">   
                                    <input {{ $holidayHtml[3] == '' || $item->d4_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d4_id.'_out")' }} @php 
                                    echo ($item->d4_id != '') ? 'onChange="updateData('. $item->d4_id .',&apos;time_out&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_out&apos;,&apos;d4&apos;,&apos;'.$item->d4_date.'&apos;)"';
                                    @endphp

                                     id="{{ $item->d4_id == '' ? 'd4_timeOut_'.$item->staff_id:$item->d4_id . '_timeOut' }}" class="form-control input-sm" value="{{ $holidayHtml[3] == '' || $item->d4_holidayFlag != 0 ? $item->d4_out : 'N/A' }}"  />
                                    <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                                </div><!-- input-group --> 
                                @php  echo ($item->d4_on_leave == 1 )? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>'.$item->d4_perc.' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>';  @endphp
                                 <?php  echo $holidayHtml[3]; ?>
                            </td>
                            <td class="text-center ">
                                <div class="input-group">
                                    <input type="hidden" id="{{$item->d5_id}}_in" value="0">
                                    <input type="hidden" id="{{$item->d5_id}}_out" value="0">                                
                                    <input {{ $holidayHtml[4] == '' || $item->d5_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d5_id.'_in")' }} @php 
                                    echo ($item->d5_id != '') ? 'onChange="updateData('. $item->d5_id .',&apos;time_in&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_in&apos;,&apos;d5&apos;,&apos;'.$item->d5_date.'&apos;)"';
                                    @endphp

                                    id="{{ $item->d5_id == '' ? 'd5_timeIn_'.$item->staff_id:$item->d5_id . '_timeIn' }}" class="form-control input-sm" value="{{ $holidayHtml[4] == '' || $item->d5_holidayFlag != 0 ? $item->d5_in : 'N/A' }}"  />
                                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                                </div><!-- input-group --> 
                                <div class="input-group">
                                    <input {{ $holidayHtml[4] == '' || $item->d5_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d5_id.'_out")' }}  @php 
                                    echo ($item->d5_id != '') ? 'onChange="updateData('. $item->d5_id .',&apos;time_out&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_out&apos;,&apos;d5&apos;,&apos;'.$item->d5_date.'&apos;)"';
                                    @endphp

                                      id="{{ $item->d5_id == '' ? 'd5_timeOut_'.$item->staff_id:$item->d5_id . '_timeOut' }}" class="form-control input-sm" value="{{ $holidayHtml[4] == '' || $item->d5_holidayFlag != 0 ? $item->d5_out : 'N/A' }}"   />
                                    <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                                </div><!-- input-group --> 
                                @php  echo ($item->d5_on_leave == 1 )? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>'.$item->d5_perc.' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>';  @endphp
                                 <?php  echo  $holidayHtml[4]; ?>
                            </td>
                            <td class="text-center ">
                                <div class="input-group">
                                    <input type="hidden" id="{{$item->d6_id}}_in" value="0">
                                    <input type="hidden" id="{{$item->d6_id}}_out" value="0">                                
                                    <input {{ $holidayHtml[5] == '' || $item->d6_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d6_id.'_in")' }}  @php 
                                    echo ($item->d6_id != '') ? 'onChange="updateData('. $item->d6_id .',&apos;time_in&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_in&apos;,&apos;d6&apos;,&apos;'.$item->d6_date.'&apos;)"';
                                    @endphp
                                     id="{{ $item->d6_id == '' ? 'd6_timeIn_'.$item->staff_id:$item->d6_id . '_timeIn' }}" class="form-control input-sm" value="{{ $holidayHtml[5] == '' || $item->d6_holidayFlag != 0 ? $item->d6_in : 'N/A' }}"/>
                                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                                </div><!-- input-group --> 
                                <div class="input-group">
                                    <input {{ $holidayHtml[5] == '' || $item->d6_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d6_id.'_out")' }} @php 
                                    echo ($item->d6_id != '') ? 'onChange="updateData('. $item->d6_id .',&apos;time_out&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_out&apos;,&apos;d6&apos;,&apos;'.$item->d6_date.'&apos;)"';
                                    @endphp
                                     id="{{ $item->d6_id == '' ? 'd6_timeOut_'.$item->staff_id:$item->d6_id . '_timeOut' }}" class="form-control input-sm"  value="{{ $holidayHtml[5] == '' || $item->d6_holidayFlag != 0 ? $item->d6_out : 'N/A' }}"  />
                                    <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                                </div><!-- input-group --> 
                                @php   echo ($item->d6_on_leave == 1 )? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>'.$item->d6_perc.' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>';  @endphp
                                 <?php  echo $holidayHtml[5]; ?>
                            </td> 
                            <td class="text-center">
                                <div class="input-group">
                                    <input type="hidden" id="{{$item->d7_id}}_in" value="0">
                                    <input type="hidden" id="{{$item->d7_id}}_out" value="0">                                
                                    <input {{ $holidayHtml[6] == '' || $item->d7_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d7_id.'_in")' }} @php 
                                    echo ($item->d7_id != '') ? 'onChange="updateData('. $item->d7_id .',&apos;time_in&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_in&apos;,&apos;d7&apos;,&apos;'.$item->d7_date.'&apos;)"';
                                    @endphp
                                      id="{{ $item->d7_id == '' ? 'd7_timeIn_'.$item->staff_id:$item->d7_id . '_timeIn' }}" class="form-control input-sm"  value="{{ $holidayHtml[6] == '' || $item->d7_holidayFlag != 0 ? $item->d7_in : 'N/A' }}"   />
                                    <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                                </div><!-- input-group --> 
                                <div class="input-group">
                                    <input  {{ $holidayHtml[6] == '' || $item->d7_holidayFlag != 0 ? 'type=time' : 'type=text onclick=removeHoliday(this,"'.$item->d7_id.'_out")' }}   @php 
                                    echo ($item->d7_id != '') ? 'onChange="updateData('. $item->d7_id .',&apos;time_out&apos;, this)" ' : 'onChange="addData('.$item->staff_id.',&apos;time_out&apos;,&apos;d7&apos;,&apos;'.$item->d7_date.'&apos;)"';
                                    @endphp id="{{ $item->d7_id == '' ? 'd7_timeOut_'.$item->staff_id:$item->d7_id . '_timeOut' }}" class="form-control input-sm" value="{{ $holidayHtml[6] == '' || $item->d7_holidayFlag != 0 ? $item->d7_out : 'N/A' }}"   />
                                    <span class="input-group-addon"><i class="fa fa-sign-out"></i></span>
                                </div><!-- input-group --> 
                                @php  echo ($item->d7_on_leave == 1 )? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>'.$item->d7_perc.'%</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>'  ;  @endphp
                                                 <?php  echo  $holidayHtml[6]; ?>
                                
                            </td>                                                                  

                        </tr>
                    @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<style>
.input-group-addon {
    position: absolute;
    z-index: 9;
    right: 1px;
    width: 20px;
    padding: 6px 19px 6px 6px;
    border: 0;
    top: 1px;
    color: #000;
    background: #fff;
}
tr td .input-group {
    margin-bottom:5px;
    width:100%;    
}
</style>
<!-- END USE PROFILE -->
<script src="{{ URL::to('metronic') }}/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">
// $(document).ready(function() {
//     var table = $('#example').DataTable( {
//         scrollY:        "300px",
//         scrollX:        true,
//         scrollCollapse: true,
//         paging:         false,
//         fixedColumns:   {
//             leftColumns: 2
//         }
//     } );
// } );

$('input').on('focusin', function(){

    $(this).data('val', $(this).val());
});
$('input').on('focusout', function(){

    $(this).data('val', $(this).val());
});

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
                                    loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction)
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
<script src="{{ URL::to('metronic') }}/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/spin/spin.js" type="text/javascript"></script>
<script type="text/javascript">
    var pagefunction = function() {
        loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", userFormScript);

        function userFormScript() {
        }
    }
    pagefunction();
</script>
<script type="text/javascript">
    Dashboard.init();
    App.init();
</script>
<script type="text/javascript">

    var opts = {
        lines: 13, // The number of lines to draw
        length: 20, // The length of each line
        width: 10, // The line thickness
        radius: 30, // The radius of the inner circle
        corners: 1, // Corner roundness (0..1)
        rotate: 0, // The rotation offset
        direction: 1, // 1: clockwise, -1: counterclockwise
        color: '#000', // #rgb or #rrggbb or array of colors
        speed: 1, // Rounds per second
        trail: 60, // Afterglow percentage
        shadow: false, // Whether to render a shadow
        hwaccel: false, // Whether to use hardware acceleration
        className: 'spinner', // The CSS class to assign to the spinner
        zIndex: 2e9, // The z-index (defaults to 2000000000)
        top: '50%', // Top position relative to parent
        left: '50%' // Left position relative to parent
    };
    var target = document.body;
    var spinner = new Spinner(opts);

    var removeHoliday = function removeHoliday(obj,id){
        $(obj).attr('value', '');  
        $(obj).prop("type", "time");
        $('#'+id).val(1);
    }
    var updateHolidayFlag= function updateHolidayFlag(id){

        $.ajax({
            type: "POST",
            url: "{{url('/weekly_timesheet/update_weekly_sheet_holidayFlag')}}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id' : id,
                'holidayFlag' : 1
                },
            success: function(res){

            }
        });
    }

    /*
    *
    * Name: Update Data
    * Description: Post Data to update weekly sheet time method
    * Params: id        (Integer) 
    *         type      (String) 
    *         obj       (Object)    
    *
    */
     
    var updateData = function updateData(id, type, obj){
    
        var timeIn = $( '#'+id+'_timeIn' ).val();
        var timeOut = $( '#'+id+'_timeOut' ).val();

        if(timeIn > timeOut){
            var prev = $(obj).data('val');
            $( obj ).val(prev);
            alert("Time Mismatch");
        } else {
            var time = $( obj ).val();
            spinner.spin(target);
            $.ajax({
                type: "POST",
                url: "{{url('/weekly_timesheet/update_weekly_sheet_time')}}",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'type' : type, 
                    'id' : id,
                    'time' : time
                    },
                success: function(res){
                    if($('#'+id+'_in').val() == 1 && $('#'+id+'_out').val() == 1){
                        updateHolidayFlag(id);      
                    }
                    $('#'+id+'_timeIn').data('val', $('#'+id+'_timeIn').val());
                    $('#'+id+'_timeOut').data('val', $('#'+id+'_timeOut').val());
                   spinner.stop(); 
                }
            });            
        }

    }

</script>
<!-- END PAGE LEVEL PLUGINS -->

<script type="text/javascript">

    var addData = function addData(id, type, no,date){
        
        var timeIn = $('#'+no+'_timeIn_'+id).val();
        var timeOut = $('#'+no+'_timeOut_'+id).val();
        if( (timeIn != '' && timeOut != '') && timeIn > timeOut  ){
            var prevtimeIn = $('#'+no+'_timeIn_'+id).data('val');
            $('#'+no+'_timeIn_'+id).val(prevtimeIn);
            var prevtimeOut = $('#'+no+'_timeOut_'+id).data('val');
            $('#'+no+'_timeOut_'+id).val(prevtimeOut);            
            alert("Time Mismatch");    
        } else {
            if (timevalidation(timeIn) && timevalidation(timeOut) )  {
                
                spinner.spin(target);
                $.ajax({
                    type: "POST",
                    url: "{{url('/weekly_timesheet/add_weekly_sheet_time')}}",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'staff_id' : id, 
                        'date': date,
                        'time_in' : timeIn,
                        'time_out' : timeOut,
                        'holidayFlag' : 1
                        },
                    success: function(res){

                        $('#'+no+'_timeIn_'+id).replaceWith( '<input class="form-control input-sm" onchange="updateData('+res+',&apos;time_in&apos;, this)" id="'+res+'_timeIn" type="time" value="'+timeIn+'">' );
                        $('#'+no+'_timeOut_'+id).replaceWith( '<input class="form-control input-sm" onchange="updateData('+res+',&apos;time_out&apos;, this)" id="'+res+'_timeOut" type="time" value="'+timeOut+'">' );
                       spinner.stop(); 

                    }
                });
            } 
        }


    }

    var timevalidation = function timevalidation(time){
        if(time !== undefined){
            var valid = (time.search(/^\d{2}:\d{2}$/) != -1) &&
            (time.substr(0,2) >= 0 && time.substr(0,2) <= 24) &&
            (time.substr(3,2) >= 0 && time.substr(3,2) <= 59) 
            return valid;  

        }
    } 


var getData = function getData(){
    var startDate = $('#startDate').val()
    spinner.spin(target);

    $.ajax({
        type: "POST",
        url: "{{url('/weekly_timesheet/get_weekly_sheet_time')}}",
        data: {
            '_token': '{{ csrf_token() }}',
            'startDate' : startDate
            },
        success: function(data){
            
            var  template = '';
            //$("#weekly_timesheet_table tbody").empty();
            var dates =  data['dates'].split(',');
            var holidaysDates = [];
            data['holidaysDates'].forEach(function(date, index) {
                holidaysDates[index] = new Date(date).getTime();
            });
            var dt = [];
            dates.forEach(function(date, index) {

               dt[index] =  new Date(date.replace(/'/g , "")).getTime();
            });

            var weekTemplate = '<tr><th width="20%"> Name </th><th style="display: none;"> Name </th> <th style="display: none;"> Profile Name </th>';
            var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
            var holidayHtml = [];


            dt.forEach(function(date, index) {

                if( holidaysDates.indexOf(date) != -1 ) {

                    holidayHtml.push('<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/sun.png" width="20" /></a>');
                    
                } else {
                    holidayHtml.push('');
                }
                var d = new Date(date);
                d.setDate(d.getDate());
                var dayName = days[d.getDay()];

                weekTemplate = weekTemplate + '<th class="text-center" data-id="'+dayName+'">'+ dayName +' <br /><small>'+d.getDate()+' '+monthNames[d.getMonth()]+' '+ d.getFullYear()+'</small> </th>';
            });
            weekTemplate = weekTemplate + '</tr>'

            var table = $('#weekly_timesheet_table').DataTable( );
            table
                .clear()
                .draw();
            data['weeklyTimeSheetData'].forEach(function(item, index) {
                
                 table.row.add( [
                            '<strong>'+ item['abridged_name'] + '</strong> <br /><small><strong>Dept: '+ item['c_bottomline'] +' </strong></small><br /><small><strong>Desg: '+ item['c_topline'] +' </strong></small><br /><small><strong>Profile: '+ item['tt_profile_name'] +' </strong></small>',
                            '<span style="display:none;">'+ item['c_bottomline']+'</span>' ,
                            '<span style="display:none;">'+ item['tt_profile_name']+'</span>',
                            '<div class="input-group"><input type="hidden" id="'+item['d1_id']+'_in" value="0"><input type="hidden" id="'+item['d1_id']+'_out" value="0"><input  '+ (holidayHtml[0] == '' || item['d1_holidayFlag'] != 0 ? 'type="time"' : 'type="text" onclick="removeHoliday(this,&apos;'+item['d1_id']+'_in&apos;)"')+ ( (item['d1_id'] != null) ? 'onChange="updateData('+ item['d1_id'] +',&apos;time_in&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_in&apos;,&apos;d1&apos;,&apos;'+item['d1_date']+'&apos;)"' )+ 'id="'+( item['d1_id'] == null ? 'd1_timeIn_'+item['staff_id']:item['d1_id'] + '_timeIn')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[0] == '' || item['d1_holidayFlag'] != 0 ? item['d1_in']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-in"></i></span></div><!-- input-group --> <div class="input-group"><input '+ (holidayHtml[0] == '' || item['d1_holidayFlag'] != 0 ? 'type="time"' : 'type="text" onclick="removeHoliday(this,&apos;'+item['d1_id']+'_out&apos;)"')+ ( (item['d1_id'] != null) ? 'onChange="updateData('+ item['d1_id'] +',&apos;time_out&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_out&apos;,&apos;d1&apos;,&apos;'+item['d1_date']+'&apos;)"' )+ 'id="'+( item['d1_id'] == null ? 'd1_timeOut_'+item['staff_id']:item['d1_id'] + '_timeOut')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[0] == '' || item['d1_holidayFlag'] != 0 ? item['d1_out']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-out"></i></span></div><!-- input-group -->'+ ( (item['d1_on_leave'] == 1 ) ? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>' + item['d1_perc'] + ' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>') +holidayHtml[0],'<div class="input-group"><input '+ (holidayHtml[1] == '' || item['d2_holidayFlag'] != 0 ? 'type="time"' : 'type="text" onclick="removeHoliday(this,&apos;'+item['d2_id']+'_in&apos;)"') + ( (item['d2_id'] != null) ? 'onChange="updateData('+ item['d2_id'] +',&apos;time_in&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_in&apos;,&apos;d2&apos;,&apos;'+item['d2_date']+'&apos;)"' )+ 'id="'+( item['d2_id'] == null ? 'd2_timeIn_'+item['staff_id']:item['d2_id'] + '_timeIn')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[1] == '' || item['d2_holidayFlag'] != 0 ? item['d2_in']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-in"></i></span></div><!-- input-group -->  <div class="input-group"><input type="hidden" id="'+item['d2_id']+'_in" value="0"><input type="hidden" id="'+item['d2_id']+'_out" value="0"><input '+ (holidayHtml[1] == '' || item['d2_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d2_id']+'_out&apos;)"')+ ( (item['d2_id'] != null) ? 'onChange="updateData('+ item['d2_id'] +',&apos;time_out&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_out&apos;,&apos;d2&apos;,&apos;'+item['d2_date']+'&apos;)"' )+ 'id="'+( item['d2_id'] == null ? 'd2_timeOut_'+item['staff_id']:item['d2_id'] + '_timeOut')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[1] == '' || item['d2_holidayFlag'] != 0 ? item['d2_out']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-out"></i></span></div><!-- input-group -->'+((item['d2_on_leave'] == 1 ) ? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>' + item['d2_perc'] + ' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>') +holidayHtml[1],'<div class="input-group"><input '+ (holidayHtml[2] == '' || item['d3_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d3_id']+'_in&apos;)"')+ ( (item['d3_id'] != null) ? 'onChange="updateData('+ item['d3_id'] +',&apos;time_in&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_in&apos;,&apos;d3&apos;,&apos;'+item['d3_date']+'&apos;)"' )+ 'id="'+( item['d3_id'] == null ? 'd3_timeIn_'+item['staff_id']:item['d3_id'] + '_timeIn')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[2] == '' || item['d3_holidayFlag'] != 0 ? item['d3_in']: "N/A" ) +'" /><span class="input-group-addon"><i class="fa fa-sign-in"></i></span></div><!-- input-group --> <div class="input-group"><input type="hidden" id="'+item['d3_id']+'_in" value="0"><input type="hidden" id="'+item['d3_id']+'_out" value="0"><input '+ (holidayHtml[2] == '' || item['d3_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d3_id']+'_out&apos;)"')+ ( (item['d3_id'] != null) ? 'onChange="updateData('+ item['d3_id'] +',&apos;time_out&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_out&apos;,&apos;d3&apos;,&apos;'+item['d3_date']+'&apos;)"' )+ 'id="'+( item['d3_id'] == null ? 'd3_timeOut_'+item['staff_id']:item['d3_id'] + '_timeOut')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[2] == '' || item['d3_holidayFlag'] != 0 ? item['d3_out']: "N/A" ) +'" /><span class="input-group-addon"><i class="fa fa-sign-out"></i></span></div><!-- input-group -->'+ ((item['d3_on_leave'] == 1 ) ? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>' + item['d3_perc'] + ' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>' )+ holidayHtml[2],'<div class="input-group"><input '+ (holidayHtml[3] == '' || item['d4_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d4_id']+'_in&apos;)"')+ ( (item['d4_id'] != null) ? 'onChange="updateData('+ item['d4_id'] +',&apos;time_in&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_in&apos;,&apos;d4&apos;,&apos;'+item['d4_date']+'&apos;)"' )+ 'id="'+( item['d4_id'] == null ? 'd4_timeIn_'+item['staff_id']:item['d4_id'] + '_timeIn')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[3] == '' || item['d4_holidayFlag'] != 0 ? item['d4_in']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-in"></i></span></div><!-- input-group --><div class="input-group"><input type="hidden" id="'+item['d4_id']+'_in" value="0"><input type="hidden" id="'+item['d4_id']+'_out" value="0"><input '+ (holidayHtml[3] == '' || item['d4_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d4_id']+'_out&apos;)"')+ ( (item['d4_id'] != null) ? 'onChange="updateData('+ item['d4_id'] +',&apos;time_out&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_out&apos;,&apos;d4&apos;,&apos;'+item['d4_date']+'&apos;)"' )+ 'id="'+( item['d4_id'] == null ? 'd4_timeOut_'+item['staff_id']:item['d4_id'] + '_timeOut')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[3] == '' || item['d4_holidayFlag'] != 0 ? item['d4_out']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-out"></i></span></div><!-- input-group -->'+((item['d4_on_leave'] == 1 ) ? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>' + item['d4_perc'] + ' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>' )+holidayHtml[3],'<div class="input-group"><input type="hidden" id="'+item['d5_id']+'_in" value="0"><input type="hidden" id="'+item['d5_id']+'_out" value="0"><input '+ (holidayHtml[4] == '' || item['d5_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d5_id']+'_in&apos;)"')+ ( (item['d5_id'] != null) ? 'onChange="updateData('+ item['d5_id'] +',&apos;time_in&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_in&apos;,&apos;d5&apos;,&apos;'+item['d5_date']+'&apos;)"' )+ 'id="'+( item['d5_id'] == null ? 'd5_timeIn_'+item['staff_id']:item['d5_id'] + '_timeIn')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[4] == '' || item['d5_holidayFlag'] != 0 ? item['d5_in']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-in"></i></span></div><!-- input-group --><div class="input-group"><input '+ (holidayHtml[4] == '' || item['d5_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d5_id']+'_out&apos;)"')+ ( (item['d5_id'] != null) ? 'onChange="updateData('+ item['d5_id'] +',&apos;time_out&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_out&apos;,&apos;d5&apos;,&apos;'+item['d5_date']+'&apos;)"' )+ 'id="'+( item['d5_id'] == null ? 'd5_timeOut_'+item['staff_id']:item['d5_id'] + '_timeOut')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[4] == '' || item['d5_holidayFlag'] != 0 ? item['d5_out']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-out"></i></span></div><!-- input-group -->'+((item['d5_on_leave'] == 1 ) ? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>' + item['d5_perc'] + ' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>') +holidayHtml[4],'<div class="input-group"><input type="hidden" id="'+item['d6_id']+'_in" value="0"><input type="hidden" id="'+item['d6_id']+'_out" value="0"><input '+ (holidayHtml[5] == '' || item['d6_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d6_id']+'_in&apos;)"')+ ( (item['d6_id'] != null) ? 'onChange="updateData('+ item['d6_id'] +',&apos;time_in&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_in&apos;,&apos;d6&apos;,&apos;'+item['d6_date']+'&apos;)"' )+ 'id="'+( item['d6_id'] == null ? 'd6_timeIn_'+item['staff_id']:item['d6_id'] + '_timeIn')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[5] == '' || item['d6_holidayFlag'] != 0 ? item['d6_in']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-in"></i></span></div><!-- input-group --><div class="input-group"><input '+ (holidayHtml[5] == '' || item['d6_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d6_id']+'_out&apos;)"')+ ( (item['d6_id'] != null) ? 'onChange="updateData('+ item['d6_id'] +',&apos;time_out&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_out&apos;,&apos;d6&apos;,&apos;'+item['d6_date']+'&apos;)"' )+ 'id="'+( item['d6_id'] == null ? 'd6_timeOut_'+item['staff_id']:item['d6_id'] + '_timeOut')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[5] == '' || item['d6_holidayFlag'] != 0 ? item['d6_out']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-out"></i></span></div><!-- input-group -->'+((item['d6_on_leave'] == 1 ) ? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>' + item['d6_perc'] + ' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>') +holidayHtml[5],'<div class="input-group"><input type="hidden" id="'+item['d7_id']+'_in" value="0"><input type="hidden" id="'+item['d7_id']+'_out" value="0"><input '+ (holidayHtml[6] == '' || item['d7_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d7_id']+'_in&apos;)"')+ ( (item['d7_id'] != null) ? 'onChange="updateData('+ item['d7_id'] +',&apos;time_in&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_in&apos;,&apos;d7&apos;,&apos;'+item['d7_date']+'&apos;)"' )+ 'id="'+( item['d7_id'] == null ? 'd7_timeIn_'+item['staff_id']:item['d7_id'] + '_timeIn')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[6] == '' || item['d7_holidayFlag'] != 0 ? item['d7_in']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-in"></i></span></div><!-- input-group --><div class="input-group"><input '+ (holidayHtml[6] == '' || item['d7_holidayFlag'] != 0 ? 'type="time"' : 'type=text onclick="removeHoliday(this,&apos;'+item['d7_id']+'_out&apos;)"')+ ( (item['d7_id'] != null) ? 'onChange="updateData('+ item['d7_id'] +',&apos;time_out&apos;, this)"' : 'onChange="addData('+ item['staff_id'] + ',&apos;time_out&apos;,&apos;d7&apos;,&apos;'+item['d7_date']+'&apos;)"' )+ 'id="'+( item['d7_id'] == null ? 'd7_timeOut_'+item['staff_id']:item['d7_id'] + '_timeOut')+'" class="form-control input-sm" type="time" value="'+(holidayHtml[6] == '' || item['d7_holidayFlag'] != 0 ? item['d7_out']: 'N/A' ) +'" /><span class="input-group-addon"><i class="fa fa-sign-out"></i></span></div><!-- input-group -->'+((item['d7_on_leave'] == 1 ) ? '<a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="<h5>Authorized Leave for the day with a <strong>' + item['d7_perc'] + ' %</strong> paid compensation.</h5>" data-original-title="<h4 style=&#39;margin:0;&#39;>Leave Status</h4>" data-html="true"><img src="img/LeaveIconApplied.png" width="20"></a>': '<a class="tooltips" data-placement="bottom" data-original-title="Leave Status"><img src="img/LeaveIcon.png" width="20"></a>' )+holidayHtml[6],

                        ] ).draw( true );

                
              

            });




            $("#weekly_timesheet_table thead").html(weekTemplate)
            spinner.stop();         

        }
    });
}

$(function() {
    $('input[name="daterange"]').daterangepicker({
        //minDate:new Date(),
        "dateLimit": {
            "days": 6
        }, locale: {
            format: 'YYYY-MM-DD'
        }
    },function(start, end, label) {

        $('#startDate').val(start.format('YYYY-MM-DD'));
        $('#endDate').val(end.format('YYYY-MM-DD'));
        getData();

    });
});

        $('#StaffView_Filter_Profile').multiselect({numberDisplayed: 1 
        });
        $('#StaffView_Filter_Department').multiselect({numberDisplayed: 1 
        });
        setTimeout(function() {
            var table = jQuery("#weekly_timesheet_table").dataTable({"columnDefs": [

                {
                    "targets": [1],
                    "visible": false
                },{
                    "targets": [2],
                    "visible": false
                }
            ]
        });
            $('#weekly_timesheet_table_filter').hide();
            $('#weekly_timesheet_table_length').hide();
            //Set data table total record count 
            $('.total-record').text('Weekly Timesheet - ' + table.fnGetData().length)
        }, 20000);

        /***** BEGIN - Apply filter searching *****/
        $('.applyFilter').click(function() {

            var profiles = $('#StaffView_Filter_Profile option:selected');
            var departments = $('#StaffView_Filter_Department option:selected');
            var selectedProfiles = [];
            var selectedDepartments = [];
            
            $(profiles).each(function(index, profile) {
                selectedProfiles.push([$(this).val()]);
            });

            $(departments).each(function(index, department) {
                selectedDepartments.push([$(this).val()]);
            });

            var profileRegex = selectedProfiles.join("|");
            var departmentRegex = selectedDepartments.join("|");
            var table = jQuery("#weekly_timesheet_table").dataTable();

            table.fnFilter(profileRegex, 2, true, false);
            table.fnFilter(departmentRegex, 1, true, false);
            
            //Set data table total record count 
            $('.total-record').text('Weekly Timesheet - ' + table.fnSettings().aiDisplay.length)

        });  

        /***** BEGIN - Apply Sort *****/
        $('.applySort').click(function() {
            
            $('.toggler').show();
            $('.toggler-close').hide();
            $('.theme-panel > .theme-options').hide();

            $('.toggler2').show();
            $('.toggler2-close').hide();
            $('.theme-panel > .theme-options2').hide();

            var sortName = $('#sort_name').find(":selected").val();
            var sortDepartment = $('#sort_department').find(":selected").val();
            if(sortName != null){
                sortDepartment = null;
                if(sortName === 'Ascending'){
                    jQuery("#weekly_timesheet_table").dataTable().fnSort([ [0,'asc']] );
                }else if(sortName === 'Descending'){
                    jQuery("#weekly_timesheet_table").dataTable().fnSort([ [0,'desc']] );
                }
            }
            
            if(sortDepartment != null){
                sortName = null;
                if(sortDepartment === 'Ascending'){
                    jQuery("#weekly_timesheet_table").dataTable().fnSort([ [1,'asc']] );
                }else if(sortDepartment === 'Descending'){
                    jQuery("#weekly_timesheet_table").dataTable().fnSort([ [1,'desc']] );
                }
            }

        });          

        $('#staffView_StaffList_Search').on( 'keyup', function () {
            var table = $('#weekly_timesheet_table').DataTable();
            table.search( this.value, true, false ).draw();
            //Set data table total record count after search filter
            $('.total-record').text('Weekly Timesheet - ' + table.page.info().recordsDisplay)
        } );
        $('#staffWeeksheet_btn').click(function() {
            
            var table = $('#weekly_timesheet_table').dataTable();
            
            $('#sort_name').val('');
            $('#sort_department').val('');

            table.search( '' ).columns().search( '' ).draw();
        });        
</script>