<?php 
	 @$format_code=App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(3);
	 @$form_number=explode($format_code, $form_number);
 ?>
<div class="row">
	<div class="col-md-6 paddingBottom10">
		<div class="form-group">
		  <label class="">Form Number:</label>
		  <div class="">
				<input type="text" class="form-control form_part_a form_number_penalty_a" name="form_number_penalty_a" id="form_number_penalty_a" value="{{@$format_code}}" disabled="" />
				<input type="text" class="form-control form_part_b form_number_penalty_b" name="form_number_penalty_b" id="form_number_penalty_b" value="{{@$form_number[1]}}" />
				<input type="hidden" class="form-control penalty_pvs_form_no" name="pvs_form_no" id="penalty_pvs_form_no" value="{{@$form_number[1]}}" />
		  </div>
	   </div>
	   <div class="form-group">
		  <label class="">Penalty Title:</label>
		  <div class="">
		  <input type="hidden" name="staff_id_edit" id="staff_id_edit" value="{{$Staff_id}}" />
		  <input type="hidden" name="penalty_id_edit" id="penalty_id_edit" value="{{$Action_id}}" />
			 <input type="text" class="form-control" name="" id="penalty_title_edit" value="{{$Penalty_Title}}" />

		  </div>
	   </div>
	</div>
	<div class="col-md-6 paddingBottom10">
	   <div class="form-group">
		  <label class="">Penalty for <small>(no of days)</small>:</label>
		  <div class="input-group">
			 <input type="number" class="form-control" id="penalty_day_edit" value="{{$Penalty_Day}}" />
			 <span class="input-group-addon">
			 <i class="fa fa-hashtag"></i>
			 </span>
		  </div>
	   </div>
	  
	</div>

 </div>

 <div class="row">
	<div class="col-md-6 paddingBottom10">
	   <div class="form-group">
		  <label class="">Penalty from:</label>
		  <div class="">
			 <input type="date" class="form-control"  id="penalty_from_edit" value="{{$Penalty_From}}" />
		  </div>
	   </div>
	   
	</div>
	
	<div class="col-md-6 paddingBottom10">
	   <div class="form-group">
		  <label class="">Penalty to:</label>
		  <div class="">
			 <input type="date" class="form-control" id="penalty_to_edit" value="{{$Penalty_To}}" />
		  </div>
	   </div>
	
	</div>
	
 </div>

 <div class="row">
	<div class="col-md-12 paddingBottom10">
	   <div class="form-group">
		  <label class="">Information regarding Penalty:</label>
		  <div class="">
			 <textarea cols="85" rows="5" id="penalty_description_edit">{{$Penalty_Description}}</textarea>
		  </div>
	   </div>
	</div>
 </div>