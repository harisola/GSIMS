<script type="text/javascript">
   
$(document).ready(function() {
    var table = $('#adjustmentTableAbsentiaLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 8, 'desc' ]],
        "displayLength": 11,
    } );
} );
$(document).ready(function() {
    var table = $('#adjustmentTableLeavesLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 9, 'desc' ]],
        "displayLength": 11,
    } ); 
} );
$(document).ready(function() {
    var table = $('#adjustmentTableUnauthorizedLeavesLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 8, 'desc' ]],
        "displayLength": 11,
    } ); 
} );
$(document).ready(function() {
    var table = $('#exceptionAdjustmentTableLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 7, 'desc' ]],
        "displayLength": 10,
    } ); 
} );
$(document).ready(function() {
    var table = $('#missTapEventTableLog').DataTable({
        "columnDefs": [
            //{ "visible": false, "targets": 2 }
        ],
        "order": [[ 7, 'desc' ]],
        "displayLength": 10,
    } ); 
} );
</script>

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

