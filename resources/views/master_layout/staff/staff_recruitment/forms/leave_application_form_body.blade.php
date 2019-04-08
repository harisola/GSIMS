<div class="row">
    <div class="col-md-6 paddingBottom10">
      <div class="form-group">
          <label class="">Form #:</label>
          <div class="">
             <input type="text" class="form-control" disabled="" name="" id="form_number_leave_application_a" value="<?= 
              App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(2); ?>" data-id="">
          </div>
          <div class="">
             <input type="text" class="form-control" name="" id="form_number_leave_application_b" data-id="">
          </div>
       </div>

       <div class="form-group">
          <label class="">Leave Title:</label>
          <div class="">
             <input type="text" class="form-control" name="leave_title" id="multiple_leave_title" data-id="">
          </div>
       </div>
       <!-- form-group -->
    </div>
    <!-- col-md-6 -->
    <div class="col-md-6 paddingBottom10">
       <div class="form-group">
          <label class="">Leave Type:</label>
          <div class="">
             <select class="form-control multiple_leave_type">
             @foreach($leaveType as $type)
                            <option value="{{$type->id}}">{{$type->leave_type_name}}</option>
                         @endforeach
             </select>
             <!-- select -->
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
          <label class="">From:</label>
          <div class="">
             <input type="date" class="form-control" name="" id="multiple_leave_from" data-id="">
          </div>
       </div>
       <!-- form-group -->
    </div>
    <!-- col-md-6 -->
    <div class="col-md-6 paddingBottom10">
       <div class="form-group">
          <label class="">To:</label>
          <div class="">
             <input type="date" class="form-control" name="" id="multiple_leave_to" data-id="">
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
          <label class="">Additional Comments <small>(if any)</small>:</label>
          <div class="">
             <textarea id="multiple_leave_comment" cols="85" rows="5"></textarea>
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
          <label class="">Request for a paid Compensation</label>
          <div class="">
             <input id="multiple_limit" type="checkbox" class="make-switch" data-on-text="Yes" data-off-text="No">
          </div>
       </div>
       <!-- form-group -->
    </div>
    <!-- col-md-6 -->
 </div>
 <!-- row -->