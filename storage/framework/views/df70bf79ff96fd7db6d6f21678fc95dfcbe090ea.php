
	<thead>
		<tr>
		<th style="vertical-align: middle;"> GF ID </th>
		<th style="vertical-align: middle;"> Name </th>
		<th style="vertical-align: middle;" class="text-center"> NIC </th>
		<th style="vertical-align: middle;"> Card Type <br /><small>Card No </small> </th>
		<th style="vertical-align: middle;" class="text-center"> Visit Depart </th>
		<th style="vertical-align: middle;" class="text-center"> Purpose </th>
		<th style="vertical-align: middle;"> Date <br /><small>Time</small> </th>
		</tr>
	</thead>
	<tbody class="parent_tbody" >
		<?php $__currentLoopData = $ParentFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <tr class="odd">                                               
		        <td style="vertical-align: middle;"> <?php echo e($parent_info->gf_id); ?> </td>
		        <td style="vertical-align: middle;"> <?php echo e($parent_info->name); ?> </td>
		        <td style="vertical-align: middle;" class="text-center"> <?php echo e($parent_info->nic); ?> </td>
		        <td style="vertical-align: middle;"> <?php echo e($parent_info->cardtype); ?><br /><small><?php echo e($parent_info->card_no); ?></small> </td>
		        <td style="vertical-align: middle;" class="text-center"> <?php echo e($parent_info->contact_department); ?> </td>
		       <!--  <td style="vertical-align: middle;" class="text-center"> <?php echo e($parent_info->no_of_persons); ?> </td> -->
		        <td style="vertical-align: middle;" class="text-center"> <?php echo e($parent_info->purpose); ?> </td>
		        <td style="vertical-align: middle;"> <?php echo e($parent_info->cre_date); ?><br /><small> <?php echo e($parent_info->timeIn); ?></small> </td>
		    </tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>

    
