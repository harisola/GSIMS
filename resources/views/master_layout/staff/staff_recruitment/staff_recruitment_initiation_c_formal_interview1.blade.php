
            <div id="previous_process_message_3" class="relative processSkipped FormalInterviewArea" style="display: none;">
              <div class="overlayTOP">
                  <span class="centerPosition"><strong>Formal Interview</strong> Skipped. 
               </div>
            </div>  

<!--                         <div id="skipped_process_3" class="relative processSkipped">
              <div class="overlayTOP">
                  <span class="centerPosition"><strong>Intial Interview:</strong> Skipped
               </div>
            </div> -->
           
            <div id="previous_process_3" class="relative processSkipped FormalInterviewArea">
              <div class="overlayTOP">
                  <span class="centerPosition"><strong>Formal Interview</strong> 
               </div>
            </div>              
            <div style="display: none;" id="presence_3" class="relative processPresence FormalInterviewArea">
              <div class="overlayTOP">
                  <span class="centerPosition"><strong>Formal Interview</strong> <br /><input type="button" class="btn btn-group green mark_present fomal_inter" value="Mark as Present" name="" data-id="3" ></span>
               </div>
            </div>
            <div id="main_div_3" class="relative hide FormalInterviewArea">
<!--              <div class="overlayTOP">
                  <span class="centerPosition">Expected Presence on <strong>25th March 2018</strong> at <strong>02:00 PM</strong><br /><br /><input type="button" class="btn btn-group green" value="Mark as Present" name=""></span>
               </div> -->
               <table class="table table-bordered" style="margin-bottom: 0;">
                  <tr>
                     <td rowspan="2" width="25%"><h3 class="text-center">Formal <br />Interview</h3>

                      <select placeholder="Area" class="form-control" id="career_id_3">
                        <option value="" disabled > Select Area</option>
                                <?php foreach($career_area as $career_area2){ ?>
                                     <option value="<?php echo $career_area2['id']; ?>"><?php echo $career_area2['area']; ?></option>
                                         <?php } ?>
                             </select>
                             <br />
                                <div id="ajax_depart_3">
                                </div>
                                <div id="depart_3">
                                </div>
                                  <br />
                                <div id="level_3">                                
                                </div>
                              <br />

                        <div class="text-center">
                           <img id="status3_1" src="img/AllocationIcon.png" />&nbsp;&nbsp;
                           <img id="status3_2" src="img/CommunicationIcon.png" />&nbsp;&nbsp;
                           <img id="status3_3" src="img/ReminderIcon.png" />&nbsp;&nbsp;
                           <img id="status3_4" src="img/PresenceIcon.png" />&nbsp;&nbsp;
                           <img id="status3_5" src="img/FollowUpIcon.png" />&nbsp;&nbsp;
                        </div>
                     </td>
                     <td width="25%">
                        <div class="row">
                        <input type="hidden" id="form_id">
                           <h5 class="text-center">Applicant Tagging</h5>
                           <div class="col-md-12 KashifSolangi">

                              <select  id="ms_3" multiple="multiple" class="form-control ms">
                                 
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
                           <div class="col-md-6 KashifSolangi" style="padding-right: 5px;">
                              <select class="form-control" id="allocation_staff_3">
                              <option value="">Select Allocation</option>
                              <?php foreach($career_allocation as $career_allocation) { ?>
                                <option value="<?php echo $career_allocation->id ?>"><?php echo $career_allocation->name ?></option>
                              <?php  } ?>
                              </select>
                           </div><!-- col-md-6 -->
                           <div class="col-md-6 KashifSolangi" style="padding-left: 5px;">
                              <select class="form-control" id="allocation_grade_3">
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
                              <textarea class="form-control" id="applicant_comment_3"></textarea>
                           </div><!-- col-md-12 -->
                        </div><!-- row -->
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="row">
                           <h5 class="text-center">Next Step Decision</h5>
                           <div class="col-md-12 KashifSolangi" style="">
                              <select class="form-control" id="applicant_status_3">
                              <?php foreach($status as $status)  { ?>
                                  <?php if($status->id > 3)  {?>
                                    <option value="<?php echo $status->id ?>" ><?php echo $status->name ?></option>
                                  <?php } ?>
                              <?php } ?>
                              </select>
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 marginTop10" style="">
                              <textarea class="form-control" id="applicant_status_comment_3"></textarea>
                           </div><!-- col-md-6 -->
                        </div><!-- row -->
                     </td>
                     <td>
                        <div class="row">
                           <h5 class="text-center">Next Step Allocation</h5>
                           <div class="col-md-6 KashifSolangi" style="padding-right:5px;">
                              <input type="date" class="form-control" min="{{ date('Y-m-d') }}" id="applicant_next_step_allocation_date_3">
                           </div><!-- col-md-6 -->
                           <div class="col-md-6  KashifSolangi" style="padding-left:5px;">
                              <input type="time" class="form-control" id="applicant_next_step_allocation_time_3">
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 marginTop10 KashifSolangi" style="">
                              <select class="form-control" id="applicant_next_step_allocated_campus_3">
                               <option value="" disabled selected>Select Campus</option>
                               <?php foreach($campus as $branch)  {?>
                               <option value="<?php echo $branch->id ?>" ><?php echo $branch->short_name ?></option>

                               <?php } ?>

                               </select>
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 marginTop10" style="">
                              <textarea class="form-control" id="applicant_next_step_allocated_comment_3"></textarea>
                           </div><!-- col-md-6 -->
                        </div><!-- row -->
                     </td>
                     <td>
                        <div class="row">
                           <h5 class="text-center">Next Step Comments</h5>
                           <div class="col-md-12 " style="">
                              <textarea class="form-control" id="applicant_next_step_comment_3"></textarea>
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 text-center marginTop20">
                              <input id="button_3" type="button" class="btn btn-group green" value="Submit" onClick="insertForm(3,1,8)">
                           </div><!-- col-md-12 -->
                        </div><!-- row -->
                     </td>
                  </tr>
               </table>
            </div><!-- FormScreening -->
<script type="text/javascript">

// setTimeout(function(){

// if($(".fomal_inter").is(":visible")){
// $('#career_id_2').prop("disabled", false);
// $('#depart_id_2').prop("disabled", false);
// $('#level_id_2').prop("disabled", false);
// } else{
// $('#career_id_2').prop("disabled", true);
// $('#depart_id_2').prop("disabled", true);
// $('#level_id_2').prop("disabled", true);

// }



// }, 5000);
</script>