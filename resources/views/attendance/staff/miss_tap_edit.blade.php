<?php 
	 $format_code=App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(5);

	$form_number=explode($format_code, $form_number);
 ?>

<div class="row">
	<div class="col-md-12 paddingBottom10">
		<!-- form-group -->
	   <div class="form-group">
		  <label class="">Form Number:</label>
		  <div class="">
				<input type="text" class="form-control form_part_a" name="form_number_miss_tap_a" id="form_number_miss_tap_a" value="{{$format_code}}" disabled="" />
				<input type="text" class="form-control form_part_b" name="form_number_miss_tap_b" id="form_number_miss_tap_b" value="{{@$form_number[1]}}" />
		  </div>
	   </div>
		<!-- form-group -->

	   <div class="form-group">
		  <label class="">Attendance Date:</label>
		  <div class="">
			<input type="hidden" id="manual_id_edit" value='{{$Action_id}}' />
			<input type="hidden" id="tap_id_edit" value='{{$Tap_id}}' />
			
			<input type="hidden" id="Missed_id_edit" value='{{$Missed_id}}' />
			<input type="hidden" id="Table_name_edit" value='{{$Table_name}}' />
			
			 <input type="date" class="form-control"  id="manual_attendance_edit" value="{{$Dated}}" />
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
			 value="{{$manual_time}}" />
		  </div>
	   </div>
	</div>
	</div>
	<div class="row">
	<div class="col-md-12 paddingBottom10">
	   <div class="form-group">
		  <label class="">Information regarding missed tap event:</label>
		  <div class="">
			 <textarea id="manual_description_edit" cols="85" rows="5">{{$description}}</textarea>
		  </div>
	   </div>
	</div>
</div>