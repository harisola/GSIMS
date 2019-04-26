<?php 
	 $format_code=App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(4);

	$form_number=explode($format_code, $form_number);
 ?>

<div class="row">
	<div class="col-md-12 paddingBottom10">
		<!-- form-group -->
	   <div class="form-group">
		  <label class="">Form Number:</label>
		  <div class="">
				<input type="text" class="form-control form_part_a form_number_miss_tap_a" name="form_number_miss_tap_a" id="form_number_miss_tap_a" value="<?php echo e($format_code); ?>" disabled="" />
				<input type="text" class="form-control form_part_b form_number_miss_tap_b" name="form_number_miss_tap_b" id="form_number_miss_tap_b" value="<?php echo e(@$form_number[1]); ?>" />
				<input type="hidden" class="form-control mis_pvs_form_no" name="pvs_form_no" id="mis_pvs_form_no" value="<?php echo e(@$form_number[1]); ?>" />

		  </div>
	   </div>
		<!-- form-group -->

	   <div class="form-group">
		  <label class="">Attendance Date:</label>
		  <div class="">
			<input type="hidden" id="manual_id_edit" value='<?php echo e($Action_id); ?>' />
			<input type="hidden" id="tap_id_edit" value='<?php echo e($Tap_id); ?>' />
			
			<input type="hidden" id="Missed_id_edit" value='<?php echo e($Missed_id); ?>' />
			<input type="hidden" id="Table_name_edit" value='<?php echo e($Table_name); ?>' />
			
			 <input type="date" class="form-control"  id="manual_attendance_edit" value="<?php echo e($Dated); ?>" />
		  </div>
	   </div>
	   <!-- form-group -->
	</div>
	<!-- col-md-6 -->
	</div>
	<!-- row -->
	<div class="row">
	<div class="col-md-6 paddingBottom10">
	   <div class="form-group">
		  <label class="">Tap :</label>
		  <div class="">
		  	<?php// $manual_time= date('h:i', strtotime($manual_time)); ?>
			 <input type="time" class="form-control" name="" id="manual_missTap_edit" data-id="" 
			 value="<?php echo e($manual_time); ?>" />
		  </div>
	   </div>
	</div>
	</div>
	<div class="row">
	<div class="col-md-12 paddingBottom10">
	   <div class="form-group">
		  <label class="">Information regarding missed tap event:</label>
		  <div class="">
			 <textarea id="manual_description_edit" cols="85" rows="5"><?php echo e($description); ?></textarea>
		  </div>
	   </div>
	</div>
</div>