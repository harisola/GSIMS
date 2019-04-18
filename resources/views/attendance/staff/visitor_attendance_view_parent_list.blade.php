
	<thead>
		<tr>
		<!-- <th style="vertical-align: middle;"> GF ID </th> -->
		<th style="vertical-align: middle;"> Name </th>
		<th style="vertical-align: middle;" class="text-center"> NIC </th>
		<th style="vertical-align: middle;"> Card Type <br /><small>Card No </small> </th>
		<th style="vertical-align: middle;" class="text-center"> Visit Depart  </th>
		<th style="vertical-align: middle;" class="text-center"> Purpose </th>
		<th style="vertical-align: middle;"> Date <br /><small>Time</small> </th>
		</tr>
	</thead>
	<tbody class="parent_tbody" >
		@foreach ($ParentFilter as $parent_info)
		    <tr class="odd">                                               
				<!-- <td style="vertical-align: middle;"> {{ $parent_info->gf_id }} </td> -->
		        <td style="vertical-align: middle;"> {{ $parent_info->name }} </td>
		        <td style="vertical-align: middle;" class="text-center"> {{ $parent_info->nic }} </td>
		        <td style="vertical-align: middle;"> {{ $parent_info->cardtype }}<br /><small>{{ $parent_info->card_no }}</small> </td>
		        <td style="vertical-align: middle;" class="text-center"> {{ $parent_info->contact_department }} </td>
		        <td style="vertical-align: middle;" class="text-center"> {{ $parent_info->purpose }} </td>
		        <td style="vertical-align: middle;"> {{ $parent_info->cre_date }}<br /><small> {{ $parent_info->timeIn }}</small> </td>
		    </tr>
		@endforeach
	</tbody>

    
