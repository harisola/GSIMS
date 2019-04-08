<div class="row">
    <div class="col-md-6 paddingBottom10">
        <div class="form-group">
        <label class="">Form #:</label>
        <div class="">
        <input type="text" class="form-control" disabled="" name="" id="form_number_exceptional_adjustment_a" value="<?= 
        App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(5); ?>" data-id="">
        </div>
        <div class="">
        <input type="text" class="form-control" name="" id="form_number_exceptional_adjustment_b" data-id="">
        </div>
        </div>                                                 
        <div class="form-group">
          <label class="">Title:</label>
          <div class="">
             <input type="text" class="form-control" name="" id="multiple_adjustment_title" data-id="">
          </div>
       </div>
       <!-- form-group -->
    </div>
    <!-- col-md-6 -->
    <div class="col-md-6 paddingBottom10">
       <div class="form-group">
          <label class="">Adjustment for <small>(no of days)</small>:</label>
          <div class="input-group">
             <input id="multiple_adjustment_no" type="number" class="form-control" placeholder="">
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
             <textarea id="multiple_adjustment_description" cols="85" rows="5"></textarea>
          </div>
       </div>
       <!-- form-group -->
    </div>
    <!-- col-md-6 -->
 </div>
 <!-- row -->
