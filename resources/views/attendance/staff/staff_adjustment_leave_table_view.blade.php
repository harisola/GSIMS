<script type="text/javascript">
   
    $(document).ready(function() {
        var table = $('#adjustmentTableLeaves').DataTable({
            "columnDefs": [
                //{ "visible": false, "targets": 2 }
            ],
            "order": [[ 9, 'desc' ]],
            "displayLength": 10,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
     
                api.column(9, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="8">'+group+'</td></tr>'
                        );
     
                        last = group;
                    }
                } );
            }
        } );
    } );
</script>
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
        
        @foreach($leaves_data as $key => $data) 
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