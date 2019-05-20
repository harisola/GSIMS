<?php $i=0; ?>
<?php //print_r($data); ?>
@foreach($data as $approval_data)
<?php $count=$i++; ?>
{{-- <?php echo($approval_data['adjustment_type']); ?> --}}
@if($approval_data['adjustment_type']=="Missed Tap")
<?php $time_details=explode("///", $approval_data['time_details']); ?>
<tr class="odd gradeX">
        <td style="text-align:center;vertical-align:middle;">{{$count+1}}</td>
        <td style="vertical-align:middle;">
            <span class="staffImg"><img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="18-052" src="assets/photos/hcm/150x150/staff/{{$approval_data['employee_id']}}.png"></span>
            <strong>{{$approval_data['NAME']}} - <small>{{$approval_data['name_code']}}</small></strong><br />
            <span><strong>GT ID:</strong>{{$approval_data['gt_id']}}</span><br />
            <small><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{$approval_data['designation']}}">{{$approval_data['designation']}}</span></small>
        </td>
        <td class="MissedTapEvent">
            <span class="adjType"><strong class="light">Form #: </strong>{{$approval_data['form_number']}}</span><br />
            <span class="adjType"><strong class="light">Adjustment Type: </strong>{{$approval_data['adjustment_type']}}</span><br />
            <span class="MissedTap">
                <span><strong class="light">Attendance Date: </strong>{{$approval_data['missed_tap_date']}}</span><br />

                <span><strong class="light">Missed Tap Time: </strong>{{date('h:i:s a', strtotime($time_details[0]))}}</span><br />
                <span><strong class="light">Entry by: </strong><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{$approval_data['enter_by']}}">{{$approval_data['enter_by']}}</span></span><br />
                <span><strong class="light">Added on: </strong>{{$approval_data['date_format']}}, at {{date('h:i:s a', strtotime($approval_data['time']))}}</span><br />
                <span><strong class="light">Additional Comments: </strong>{{$approval_data['additional_comments']}}</span>
            </span><!-- MissedTap -->
        </td>
        <td style="vertical-align:middle;">
            <!-- <span class="label label-sm label-success"> Approved </span> -->
        <span class="approve_btn pointer" 
            data-Approval_id='{{$approval_data['effected_table_id']}}'
            data-operation='Missed Tap Event'
            data-effected_date='{{$approval_data['date']}}'
             href="#">Approve</span> | <span class="disapprove_btn pointer"  href="#">Disapprove</span>        
         </td>
    </tr>
@else
    <tr class="odd gradeX">
        <td style="text-align:center;vertical-align:middle;">{{$count+1}}</td>
        <td style="vertical-align:middle;">
            <span class="staffImg"><img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="18-052" src="assets/photos/hcm/150x150/staff/{{$approval_data['employee_id']}}.pngf"></span>
            <strong>{{$approval_data['NAME']}} - <small>{{$approval_data['name_code']}}</small></strong><br />
            <span><strong>GT ID:</strong>{{$approval_data['gt_id']}}</span><br />
            <small><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{$approval_data['designation']}}">{{$approval_data['designation']}}</span></small>
        </td>
        <td class="ExceptionalAdjEvent">
            <span class="adjType"><strong class="light">Form #: </strong>{{$approval_data['form_number']}}</span><br />

            <span class="adjType"><strong class="light">Adjustment Type: </strong>{{$approval_data['adjustment_type']}}</span><br />
            <span class="MissedTap">
                <span><strong class="light">Title: </strong>{{$approval_data['type_title']}}</span><br />
                <span><strong class="light">No of days:</strong>{{$approval_data['no_of_days']}}</span><br />
                <span><strong class="light">Entry by: </strong><span class="tooltips" data-container="body" data-placement="top" data-original-title="{{$approval_data['enter_by']}}">{{$approval_data['enter_by']}}</span></span><br />
                <span><strong class="light">Added on: </strong>{{$approval_data['date_format']}}, at {{date('h:i:s a', strtotime($approval_data['time']))}}</span><br />
                
                <span><strong class="light">Additional Comments: </strong>{{$approval_data['additional_comments']}}</span>
            </span><!-- MissedTap -->
        </td>
        <td style="vertical-align:middle;">
            <!-- <span class="label label-sm label-success"> Approved </span> -->
                <span class="approval_modal pointer" 
                data-Approval_id='{{$approval_data['effected_table_id']}}'
                data-operation='Exceptional Adjustments'
                data-effected_date='{{$approval_data['date']}}'
                href="#"
                data-toggle="modal" data-target="#myModal"
                >Approve</span> 
                | <span class="disapprove_btn pointer" href="#">Disapprove</span>  
        </td>
    </tr>
@endif
@endforeach