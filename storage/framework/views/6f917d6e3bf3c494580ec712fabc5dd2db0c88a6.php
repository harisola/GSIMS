
<?php 
	 $format_code=App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(1);
	$form_number=explode($format_code, $SData[0]->form_number);
	// print_r($form_number);
 ?>
<div class="row">
		<div class="col-md-6 paddingBottom10">
			<!-- form-group -->
			   <div class="form-group">
				  <label class="">Form Number:</label>
				  <div class="">
						<input type="text" class="form-control form_part_a form_number_absentia_a" name="form_number_absentia_a" id="form_number_absentia_a" value="<?php echo e($format_code); ?>" disabled="" />
						<input type="text" class="form-control form_part_b form_number_absentia_b" name="form_number_absentia_b" id="form_number_absentia_b" value="<?php echo e(@$form_number[1]); ?>" />
						
						<input type="hidden" class="form-control  absentia_pvs_form_no" name="pvs_form_no" value="<?php echo e(@$form_number[1]); ?>" />
				  </div>
			   </div>
			   <!-- form-group -->
		   <div class="form-group">
			  <label class="">Title:</label>
			  <div class="">
			  <input type="hidden" name="Attendance_in_id" id="Attendance_in_id" value="<?php echo e($SData[0]->IN_id); ?>" />
			  <input type="hidden" name="Attendance_out_id" id="Attendance_out_id" value="<?php echo e($SData[0]->Out_id); ?>" />
			  <input type="hidden" name="Attendance_des_id" id="Attendance_des_id" value="<?php echo e($SData[0]->Des_id); ?>" />
			  
				 <input type="text" class="form-control" name="absentia_title_edit" id="absentia_title_edit" value="<?php echo e($SData[0]->D_Title); ?>" />
			  </div>
		   </div>
		   

		</div>
		<!-- col-md-6 -->
		<div class="col-md-6 paddingBottom10">
		   <div class="form-group">
			  <label class="">Date:</label>
			  <div class="">
				 <input type="date" class="form-control" name="absentia_date_edit" id="absentia_date_edit" value="<?php echo e($SData[0]->In_Date); ?>" />
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
			  <label class="">Start Time:</label>
			  <div class="">
				 <input type="time" class="form-control" name="absentia_startTime_edit" id="absentia_startTime_edit" value="<?php echo e($SData[0]->Out_Time); ?>" />
			  </div>
		   </div>
		   <!-- form-group -->
		</div>
		<!-- col-md-6 -->
		<div class="col-md-6 paddingBottom10">
		   <div class="form-group">
			  <label class="">End Time:</label>
			  <div class="">
				 <input type="time" class="form-control" name="absentia_endTime_edit" id="absentia_endTime_edit" value="<?php echo e($SData[0]->In_Time); ?>" />
			  </div>
		   </div>
		   <!-- form-group -->
		</div>
		<!-- col-md-6 -->
	 </div>
	 <!-- row -->
	 <div class="row">
		<div class="col-md-12 paddingBottom10">
		   <div class="form-group">
			  <label class="">Description:</label>
			  <div class="">
				 <textarea id="absentia_description_edit" cols="85" rows="5"><?php echo e($SData[0]->D_Des); ?></textarea>
			  </div>
		   </div>
		   <!-- form-group -->
		</div>
		<!-- col-md-6 -->
</div>
	 <!-- row -->