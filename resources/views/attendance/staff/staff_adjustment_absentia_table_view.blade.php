<script type="text/javascript">
   
    $(document).ready(function() {
         var table = $('#adjustmentTableAbsentia').DataTable({
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
                                '<tr class="group"><td colspan="7">'+group+'</td></tr>'
                            );
         
                            last = group;
                        }
                    } );
                }
            } );
    } );
</script>
<table id="adjustmentTableAbsentia" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
    <thead>
        <tr>
            <th style="display: none;">No</th>
            <th width="400 ">Staff</th>
            <th>Title</th>
            <th>Created</th>
            <th width="150" >From <small>(time)</small></th>
            <th width="150" >To <small>(time)</small></th>
            <th width="150" >Apply Date</th>
            
            <th>Description</th>
            <th width="180" >Action</th> <!---->
            <th style="display: none;">Modified On</th>
        </tr>
    </thead>

    <tbody>
        @foreach($absentia_data as $key => $data) 
        <tr id="absentia_table_row_{{$data->absentia_id}}" {{($data->saoDeleted == 1 && $data->saiDeleted == 1) ? 'class=deleted' : ''}}>
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
            <td><strong>{{$data->aiaStamp}}</strong></td>
            <td id="absentia_aiaStart_time_{{$data->absentia_id}}">{{$data->aiaStart_time}}</td>
            <td id="absentia_aiaEnd_time_{{$data->absentia_id}}">{{$data->aiaEnd_time}}</td>
            <td id="absentia_aiaStamp_{{$data->absentia_id}}">{{$data->applyDate}}</td>
            
            <td id="absentia_description_{{$data->absentia_id}}">{{$data->description}}</td>
            
            @if($data->saoDeleted == 1 && $data->saiDeleted == 1)
            <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="{{$data->deleted_by}}">{{$data->deleted_by}}</strong><br><small>on</small> <strong>{{$data->deleted_on}}</strong> </td>
            @else 
            <td align="center" id="deleted_absentia_{{$data->absentia_id}}"><a onclick="Edit_Absentia({{$data->absentia_id}}, {{$data->staff_id}})"><i class="fa fa-edit"></i></a> | <a onclick="delete_Absentia({{$data->absentia_id}}, {{$data->staff_id}})" ><i class="fa fa-trash-o"></i></a><div id="absentia_modifiedOn_{{$data->absentia_id}}">{{$data->aiaModifiedStamp}}</div></td> <!---->
            
            @endif
            <td style="display: none;">{{$data->aiaModifiedOn}}</td>
        </tr>
      @endforeach
       
    </tbody>
</table>