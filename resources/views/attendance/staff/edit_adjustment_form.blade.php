 <?php 
	 @$format_code=App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(4);
	 @$form_number=explode($format_code, $form_number);
 ?>
  <div class="row">
	<div class="col-md-6 paddingBottom10">
		<div class="form-group">
		  <label class="">Form Number:</label>
		  <div class="">
				<input type="text" class="form-control form_part_a" name="form_number_exceptional_adjustment_a" id="form_number_exceptional_adjustment_a" value="{{$format_code}}" disabled="" />
				<input type="text" class="form-control form_part_b" name="form_number_exceptional_adjustment_b" id="form_number_exceptional_adjustment_b" value="{{@$form_number[1]}}" />
		  </div>
	   </div>
	   <div class="form-group">
		  <label class="">Title:</label>
		  <div class="">
		  <input type="hidden" id="adjustment_id_edit" value="{{$ID}}" />
		  <input type="hidden" id="adjustment_staff_edit" value="{{$Staff_id}}" />
		  
			 <input type="text" class="form-control" name="" id="adjustment_title_edit" value="{{$Adjustment_Title}}" />
		  </div>
	   </div>
	   <!-- form-group -->
	</div>
	<!-- col-md-6 -->
	<div class="col-md-6 paddingBottom10">
	   <div class="form-group">
		  <label class="">Adjustment for <small>(no of days)</small>:</label>
		  <div class="input-group">
			 <input type="number" class="form-control" id="adjustment_no_edit" value="{{$Adjustment_Day}}" />
			 <span class="input-group-addon">
			 <i class="fa fa-hashtag"></i>
			 </span>
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
		  <label class="">Information regarding Adjustments:</label>
		  <div class="">
			 <textarea id="adjustment_description_edit" cols="85" rows="5">{{$Adjustment_Description}}</textarea>
		  </div>
	   </div>
	   <!-- form-group -->
	</div>
	<!-- col-md-6 -->
</div>