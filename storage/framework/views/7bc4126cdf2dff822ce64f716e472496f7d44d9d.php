
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
		<?php $__currentLoopData = $staffFilter['Staff_info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <tr class="odd">                                               
		        <td style="vertical-align: middle;"> <?php echo e($staff_info->gt_id); ?> </td>
		        <td style="vertical-align: middle;"> <?php echo e($staff_info->abridged_name); ?> </td>
		        <td style="vertical-align: middle;" class="text-center"> <?php echo e($staff_info->name_code); ?> </td>
		        <td style="vertical-align: middle;"> <?php echo e($staff_info->c_topline); ?><br /><small><?php echo e($staff_info->c_bottomline); ?></small> </td>
		        <td style="vertical-align: middle;" class="text-center"> <?php echo e($staff_info->tmp_card_no); ?> </td>
		        <td style="vertical-align: middle;"> <?php echo e($staff_info->date); ?><br /><small> <?php echo e($staff_info->time); ?></small> </td>
		    </tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>

    
