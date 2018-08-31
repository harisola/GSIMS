<script type="text/javascript">
   
    $(document).ready(function() {
        var table = $('#missTapEventTable').DataTable({
            "columnDefs": [
                { "visible": false, "targets": 0 }
            ],
            "order": [[ 8, 'desc' ]],
            "displayLength": 10,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
     
                api.column(8, {page:'current'} ).data().each( function ( group, i ) {
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
        @foreach($misstap_data as $key => $data) 
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