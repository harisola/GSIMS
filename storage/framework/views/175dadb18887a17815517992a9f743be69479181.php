   <div class="row">

         
      <div class="col-md-6 paddingBottom10">
        <div class="form-group">
            <label class="">Form #:</label>
            <div class="">
               <input type="text" class="form-control" disabled="" name="" id="form_number_absentia_a" value="<?= 
                App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(1); ?>" data-id="">
            </div>
            <div class="">
               <input type="text" class="form-control" name="" id="form_number_absentia_b" data-id="">
            </div>
         </div>
         <div class="form-group">
            <label class="">Title:</label>
            <div class="">
               <input type="text" class="form-control" name="" id="multiple_absentia_title" data-id="">
            </div>
         </div>

         <!-- form-group -->
      </div>
      <!-- col-md-6 -->
      <div class="col-md-6 paddingBottom10">
         <div class="form-group">
            <label class="">Date:</label>
            <div class="">
               <input type="date" class="form-control" name="" id="multiple_absentia_date" data-id="">
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
               <input type="time" class="form-control" name="" id="multiple_absentia_startTime" data-id="">
            </div>
         </div>
         <!-- form-group -->
      </div>
      <!-- col-md-6 -->
      <div class="col-md-6 paddingBottom10">
         <div class="form-group">
            <label class="">End Time:</label>
            <div class="">
               <input type="time" class="form-control" name="" id="multiple_absentia_endTime" data-id="">
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
               <textarea id="multiple_absentia_description" cols="85" rows="5"></textarea>
            </div>
         </div>
         <!-- form-group -->
      </div>
      <!-- col-md-6 -->
   </div>
   <!-- row -->