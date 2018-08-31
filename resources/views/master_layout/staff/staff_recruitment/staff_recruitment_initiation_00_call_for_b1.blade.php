 <div id="main_div_0" class="relative">
   <table class="table table-bordered" style="margin-bottom: 0;">
      <tr>
         <td rowspan="2" width="25%"><h3 class="text-center">Call for<br />Part B</h3>
            <div class="text-center">
               <img src="img/AllocationIcon.png" />&nbsp;&nbsp;
               <img src="img/CommunicationIcon.png" />&nbsp;&nbsp;
               <img src="img/PresenceIcon.png" />&nbsp;&nbsp;
               <img src="img/FollowUpIcon.png" />&nbsp;&nbsp;
            </div>
         </td>
      </tr>
      <tr>
         
         <td>
            <div class="row">
               <h5 class="text-center">Next Step Allocation</h5>
               <div class="col-md-6 " style="padding-right:5px;">
                  <input type="date" class="form-control" id="applicant_next_step_allocation_date_11">
               </div><!-- col-md-6 -->
               <div class="col-md-6  " style="padding-left:5px;">
                  <input type="time" class="form-control" id="applicant_next_step_allocation_time_11">
               </div><!-- col-md-6 -->
               <div class="col-md-12 marginTop10 " style="">
                  <select class="form-control" id="applicant_next_step_allocated_campus_11">
                   <option value="" disabled selected>Select Campus</option>
                   <?php foreach($campus as $branch)  {?>
                   <option value="<?php echo $branch->id ?>" ><?php echo $branch->short_name ?></option>

                   <?php } ?>

                   </select>
               </div><!-- col-md-6 -->
               <div class="col-md-12 marginTop10" style="">
                  <textarea class="form-control" id="applicant_next_step_allocated_comment_11"></textarea>
               </div><!-- col-md-6 -->
            </div><!-- row -->
         </td>
         <td>
            <div class="row">
               <h5 class="text-center">Next Step Comments</h5>
               <div class="col-md-12 " style="">
                  <textarea class="form-control" id="applicant_next_step_comment_11"></textarea>
               </div><!-- col-md-6 -->
               <div class="col-md-12 text-center marginTop20">
                  <input id="button_11" type="button" class="btn btn-group green" value="Submit" onClick="insertForm(11,10,10)">
               </div><!-- col-md-12 -->
            </div><!-- row -->
         </td>
      </tr>
   </table>
</div><!-- FormScreening -->

             