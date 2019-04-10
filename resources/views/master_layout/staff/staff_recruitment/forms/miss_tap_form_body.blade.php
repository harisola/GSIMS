<div class="row">
           <div class="form-group">
              <label class="">Form #:</label>
              <div class="">
                 <input type="text" class="form-control" disabled="" name="" id="form_number_miss_tap_a" value="<?= 
                  App\Models\Staff\Staff_Information\hr_form_number_format::getFormNumberFormat(4); ?>" data-id="">
              </div>
              <div class="">
                 <input type="text" class="form-control" name="" id="form_number_miss_tap_b" data-id="">
              </div>
           </div>

          <div class="col-md-12 paddingBottom10">
             <div class="form-group">
                <label class="">Attendance Date:</label>
                <div class="">
                   <input type="date" class="form-control" name="" id="multiple_manual_attendance" data-id="">
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
                <label class="">Miss Tap:</label>
                <div class="">
                   <input type="time" class="form-control" name="" id="multiple_manual_tap" data-id="">
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
                <label class="">Information regarding manual attendance:</label>
                <div class="">
                   <textarea id="multiple_manual_description" cols="85" rows="5"></textarea>
                </div>
             </div>
             <!-- form-group -->
          </div>
          <!-- col-md-6 -->
       </div>
       <!-- row -->