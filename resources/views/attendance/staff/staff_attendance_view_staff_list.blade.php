
	<thead>
		<tr>
		<th style="vertical-align: middle;"> GT ID </th>
		<th style="vertical-align: middle;"> Staff Name </th>
		<th style="vertical-align: middle;" class="text-center"> Name Code </th>
		<th style="vertical-align: middle;"> Designation<br /><small>Department </small> </th>
		<th style="vertical-align: middle;" class="text-center"> Interim Card # </th>
		<th style="vertical-align: middle;"> Date<br /><small>Time</small> </th>
		</tr>
	</thead>
	<tbody class="staff_tbody" >
		@foreach ($staffFilter['Staff_info'] as $staff_info)
		    <tr class="odd">                                               
		        <td style="vertical-align: middle;"> {{ $staff_info->gt_id }} </td>
		        <td style="vertical-align: middle;"> {{ $staff_info->abridged_name }} </td>
		        <td style="vertical-align: middle;" class="text-center"> {{ $staff_info->name_code }} </td>
		        <td style="vertical-align: middle;"> {{ $staff_info->c_topline }}<br /><small>{{ $staff_info->c_bottomline }}</small> </td>
		        <td style="vertical-align: middle;" class="text-center"> {{ $staff_info->tmp_card_no }} </td>
		        <td style="vertical-align: middle;"> {{ $staff_info->date }}<br /><small> {{ $staff_info->time }}</small> </td>
		    </tr>
		@endforeach
	</tbody>

    
