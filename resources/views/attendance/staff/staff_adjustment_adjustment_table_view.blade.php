<script type="text/javascript">
   
    $(document).ready(function() {
        var table = $('#exceptionAdjustmentTable').DataTable({
            "columnDefs": [
                //{ "visible": false, "targets": 2 }
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
<table id="exceptionAdjustmentTable" class="display table table-striped table-hover table-bordered logTables" cellspacing="0" width="100%" >
  <thead>
      <tr>
          <th style="display: none;">No</th>
          <th width="400 ">Staff</th>
          <th>Title</th>
          <th>Date</th>
          <th width="150" >Day</th>
          <th width="150" >Stamp</th>
          <th>Description</th>
          <th width="180" >Action</th> <!---->
          <th style="display: none;">Modified On</th>
      </tr>
  </thead>

  <tbody>
      @foreach($adjustment_data as $key => $data) 
      <tr id="exception_table_row_{{$data->exceptional_id}}" {{($data->rd == 1) ? 'class=deleted' : ''}}>
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
          <td>{{$data->eaStamp}}</td>
          <td id="adjustment_staff_description_{{$data->exceptional_id}}">{{$data->adjustment_description}}</td>
            @if($data->rd == 1)
          <td align="center"><small>Deleted by </small><strong class="tooltips" data-container="body" data-placement="top" data-original-title="Aalia Begum">{{$data->deleted_by}}</strong><br><small>on</small> <strong>{{$data->deleted_on}}</strong> </td>
          @else 
          <td id="deleted_adjustment_{{$data->exceptional_id}}"  align="center"><a onclick="ReWriteAdjustment({{$data->exceptional_id}})"><i class="fa fa-edit"></i></a> | <a onclick="deleteAdjustment({{$data->exceptional_id}})" ><i class="fa fa-trash-o"></i></a>
            <div id="adjustment_modifiedOn_{{$data->exceptional_id}}">{{$data->eaModifiedStamp}}</div>
          </td> <!---->

          @endif <!---->
          <td style="display: none;">{{$data->eaModifiedOn}}</td>
      </tr>
      @endforeach

  </tbody>
</table>