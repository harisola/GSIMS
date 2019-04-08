<div class="row">
    <div class="col-md-6 paddingBottom10">
      <div class="form-group">
          <label class="">Form #:</label>
          <div class="">
             <input type="text" class="form-control" disabled="" name="" id="form_number_penalty_a" value="<?= 
              App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(3); ?>" data-id="">
          </div>
          <div class="">
             <input type="text" class="form-control" name="" id="form_number_penalty_b" data-id="">
          </div>
       </div>                                                
        <div class="form-group">
          <label class="">Penalty Title:</label>
          <div class="">
             <input type="text" class="form-control" name="" id="multiple_penalty_title" data-id="">
          </div>
       </div>
       <!-- form-group -->
    </div>
    <!-- col-md-6 -->
    <div class="col-md-6 paddingBottom10">
       <div class="form-group">
          <label class="">Penalty for <small>(no of days)</small>:</label>
          <div class="input-group">
             <input id="multiple_penalty_day" type="number" class="form-control" placeholder="">
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
    <div class="col-md-6 paddingBottom10">
       <div class="form-group">
          <label class="">Penalty from:</label>
          <div class="">
             <input type="date" class="form-control" name="" id="multiple_penalty_from" data-id="">
          </div>
       </div>
       <!-- form-group -->
    </div>
    <!-- col-md-6 -->
    <div class="col-md-6 paddingBottom10">
       <div class="form-group">
          <label class="">Penalty to:</label>
          <div class="">
             <input id="multiple_penalty_to" type="date" class="form-control" placeholder="">
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
          <label class="">Information regarding Penalty:</label>
          <div class="">
             <textarea id="multiple_penalty_description" cols="85" rows="5"></textarea>
          </div>
       </div>
       <!-- form-group -->
    </div>
    <!-- col-md-6 -->
 </div>
 <!-- row -->