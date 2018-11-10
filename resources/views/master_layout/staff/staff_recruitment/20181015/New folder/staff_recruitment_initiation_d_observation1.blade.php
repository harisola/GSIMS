            <div id="previous_process_message_4" class="relative processSkipped ObservationArea" style="display: none;">
              <div class="overlayTOP">
                  <span class="centerPosition"><strong>Observation</strong> Skipped. 
               </div>
            </div>  
<!-- 
                        <div id="skipped_process_4" class="relative processSkipped">
              <div class="overlayTOP">
                  <span class="centerPosition"><strong>Observation:</strong> Skipped
               </div>
            </div> -->
           
            <div id="previous_process_4" class="relative processSkipped ObservationArea">
              <div class="overlayTOP">
                  <span class="centerPosition"><strong>Observation</strong> 
               </div>
            </div>              
            <div style="display: none;" id="presence_4" class="relative processPresence ObservationArea">
              <div class="overlayTOP">
                  <span class="centerPosition"><strong>Observation</strong> <br /><input type="button" class="btn btn-group green mark_present" value="Mark as Present" name="" data-id="4" ></span>
               </div>
            </div>
            <div id="main_div_4" class="relative hide ObservationArea">
<!--              <div class="overlayTOP">
                  <span class="centerPosition">Expected Presence on <strong>25th March 2018</strong> at <strong>02:00 PM</strong><br /><br /><input type="button" class="btn btn-group green" value="Mark as Present" name=""></span>
               </div> -->
               <table class="table table-bordered" style="margin-bottom: 0;">
                  <tr>
                     <td rowspan="2" width="25%"><h3 class="text-center"> <br/>Observation</h3>
                         <div class="text-center">
                           <img id="status4_1" src="img/AllocationIcon.png" />&nbsp;&nbsp;
                           <img id="status4_2" src="img/CommunicationIcon.png" />&nbsp;&nbsp;
                           <img id="status4_3" src="img/ReminderIcon.png" />&nbsp;&nbsp;
                           <img id="status4_4" src="img/PresenceIcon.png" />&nbsp;&nbsp;
                           <img id="status4_5" src="img/FollowUpIcon.png" />&nbsp;&nbsp;
                        </div>
                     </td>
                     <td width="25%">
                        <div class="row">
                        <input type="hidden" id="form_id">
                           <h5 class="text-center">Applicant Tagging</h5>
                           <div class="col-md-12">

                              <select  id="ms_4" multiple="multiple" class="form-control ms">
                                 
                              <?php foreach($tag as $tag)  {?>
                                <?php echo $tag->html_tag ?>
                              <?php } ?>
                             </select>
                           </div>
                        </div><!-- row -->
                     </td>
                     <td width="25%">
                        <div class="row">
                           <h5 class="text-center">Applicant Allocation</h5>
                           <div class="col-md-6" style="padding-right: 5px;">
                              <select class="form-control" id="allocation_staff_4">
                              <option value="">Select Allocation</option>
                              <?php foreach($career_allocation as $career_allocation) { ?>
                                <option value="<?php echo $career_allocation->id ?>"><?php echo $career_allocation->name ?></option>
                              <?php  } ?>
                              </select>
                           </div><!-- col-md-6 -->
                           <div class="col-md-6" style="padding-left: 5px;">
                              <select class="form-control" id="allocation_grade_4">
                              <option value="" disabled selected>Select Grade</option>
                              <?php foreach($grade as $grading) { ?>
                                <option value="<?php echo $grading->id ?>"><?php echo $grading->name ?></option>
                              <?php  } ?>
                              </select>
                           </div><!-- col-md-6 -->
                        </div><!-- row -->
                     </td>
                     <td width="25%">
                        <div class="row">
                           <h5 class="text-center">Applicant Comments</h5>
                           <div class="col-md-12">
                              <textarea class="form-control" id="applicant_comment_4"></textarea>
                           </div><!-- col-md-12 -->
                        </div><!-- row -->
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="row">
                           <h5 class="text-center">Next Step Decision</h5>
                           <div class="col-md-12 " style="">
                              <select class="form-control" id="applicant_status_4">
                              <?php foreach($status as $status)  { ?>
                                  <?php if($status->id > 4)  {?>
                                    <option value="<?php echo $status->id ?>" ><?php echo $status->name ?></option>
                                  <?php } ?>
                              <?php } ?>
                              </select>
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 marginTop10" style="">
                              <textarea class="form-control" id="applicant_status_comment_4"></textarea>
                           </div><!-- col-md-6 -->
                        </div><!-- row -->
                     </td>
                     <td>
                        <div class="row">
                           <h5 class="text-center">Next Step Allocation</h5>
                           <div class="col-md-6 " style="padding-right:5px;">
                              <input type="date" class="form-control" id="applicant_next_step_allocation_date_4">
                           </div><!-- col-md-6 -->
                           <div class="col-md-6  " style="padding-left:5px;">
                              <input type="time" class="form-control" id="applicant_next_step_allocation_time_4">
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 marginTop10 " style="">
                              <select class="form-control" id="applicant_next_step_allocated_campus_4">
                               <option value="" disabled selected>Select Campus</option>
                               <?php foreach($campus as $branch)  {?>
                               <option value="<?php echo $branch->id ?>" ><?php echo $branch->short_name ?></option>

                               <?php } ?>

                               </select>
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 marginTop10" style="">
                              <textarea class="form-control" id="applicant_next_step_allocated_comment_4"></textarea>
                           </div><!-- col-md-6 -->
                        </div><!-- row -->
                     </td>
                     <td>
                        <div class="row">
                           <h5 class="text-center">Next Step Comments</h5>
                           <div class="col-md-12 " style="">
                              <textarea class="form-control" id="applicant_next_step_comment_4"></textarea>
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 text-center marginTop20">
                              <input id="button_4" type="button" class="btn btn-group green" value="Submit" onClick="insertForm(4,1,8)">
                           </div><!-- col-md-12 -->
                        </div><!-- row -->
                     </td>
                  </tr>
               </table>
            </div><!-- FormScreening -->
          