<link rel="stylesheet" href="../../gsims/public/js/multiple-select.css" />
<script src="../../gsims/public/js/multiple-select.js"></script>
<script>
    $(function() {
        $('.ms').change(function() {
            //console.log($(this).val());
        }).multipleSelect({
            width: '100%',
            filter: true,
            multiple: true
        });
    });
</script>

          <div id="form_screen_overlay" class="FormScreeningArea">
            <div id="previous_process_1" class="relative processSkipped">
              <div class="overlayTOP" id="skip_msg_1">
                  <span class="centerPosition"><strong>Form Screening</strong> 
              </div>
            </div>
          </div>

            <div id="main_div_1" class="relative FormScreeningArea">
               <table class="table table-bordered" style="margin-bottom: 0;">
                  <tr>
                     <td rowspan="2" width="25%"><h3 class="text-center">Form<br />Screening</h3>
                        <div class="text-center">
                           <div class="col-md-12 KashifSolangi">
                             <select placeholder="Area" class="form-control" id="career_id_1">
                              <option value="" disabled > Select Area</option>
                                <?php foreach($career_area as $career_area1){ ?>
                                     <option value="<?php echo $career_area1['id']; ?>"><?php echo $career_area1['area']; ?></option>
                                <?php } ?>
                             </select>
                             <br />
                                <div id="ajax_depart">
                                </div>
                                <div id="depart_1">
                                </div>
                                  <br />
                                <div id="level_1">                                
                                </div>
                              <br />
                           </div>
                        </div>
                     </td>
                     <td width="25%">
                        <div class="row">
                        <input type="hidden" id="form_id">
                           <h5 class="text-center">Applicant Tagging</h5>
                           <div class="col-md-12 KashifSolangi" >

                              <select  id="ms_1" multiple="multiple" class="form-control ms">
                              

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
                              <select class="form-control" id="allocation_staff_1">
                              <option value="">Select Allocation</option>
                              <?php foreach($career_allocation as $career_allocation) { ?>
                                <option value="<?php echo $career_allocation->id ?>"><?php echo $career_allocation->name ?></option>
                              <?php  } ?>

                              </select>
                           </div><!-- col-md-6 -->
                           <div class="col-md-6 KashifSolangi" style="padding-left: 5px;">
                              <select class="form-control " id="allocation_grade_1">
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
                              <textarea class="form-control" id="applicant_comment_1"></textarea>
                           </div><!-- col-md-12 -->
                        </div><!-- row -->
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <div class="row">
                           <h5 class="text-center">Next Step Decision</h5>
                           <div class="col-md-12 KashifSolangi" style="">
                              <select class="form-control" id="applicant_status_1">
                              <?php foreach($status as $status)  { ?>
                                  <?php if($status->id > 1)  {?>
                                    <option value="<?php echo $status->id ?>" ><?php echo $status->name ?></option>
                                  <?php } ?>
                              <?php } ?>
                              </select>
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 marginTop10" style="">
                              <textarea class="form-control" id="applicant_status_comment_1"></textarea>
                           </div><!-- col-md-6 -->
                        </div><!-- row -->
                     </td>
                     <td>
                        <div class="row">
                           <h5 class="text-center">Next Step Allocation</h5>


                           <div class="col-md-6 KashifSolangi" style="padding-right:5px;">
                              <input type="date" class="form-control" min="{{ date('Y-m-d') }}" id="applicant_next_step_allocation_date_1"  >
                           </div><!-- col-md-6 -->
                           <div class="col-md-6  KashifSolangi" style="padding-left:5px;">
                              <input type="time" class="form-control" id="applicant_next_step_allocation_time_1">
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 marginTop10 KashifSolangi" style="">
                              <select class="form-control" id="applicant_next_step_allocated_campus_1">
                               <option value="" disabled selected>Select Campus</option>
                               <?php foreach($campus as $branch)  {?>
                               <option value="<?php echo $branch->id ?>" ><?php echo $branch->short_name ?></option>

                               <?php } ?>

                               </select>
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 marginTop10" style="">
                              <textarea class="form-control" id="applicant_next_step_allocated_comment_1"></textarea>
                           </div><!-- col-md-6 -->
                        </div><!-- row -->
                     </td>
                     <td>
                        <div class="row">
                           <h5 class="text-center">Next Step Comments</h5>
                           <div class="col-md-12 " style="">
                              <textarea class="form-control" id="applicant_next_step_comment_1"></textarea>
                           </div><!-- col-md-6 -->
                           <div class="col-md-12 text-center marginTop20">
                              <input  id="button_1" type="button" class="btn btn-group green screening_inter" value="Submit" onClick="insertForm(1,1,8)">
                           </div><!-- col-md-12 -->
                        </div><!-- row -->
                     </td>
                  </tr>
               </table>
            </div><!-- FormScreening -->


 <script type='text/javascript'>
/*var toggleElements = function () {
  var value = $( "#career_id_1 option:selected" ).text();

  // var value = $('#career_id_1').find(":selected").text();
 // alert(value);
 var formdata =  'career_id_1='+$('#career_id_1').val();
     console.log('form data=> '+formdata);
    $.ajax({
        type:'get',
         url:'/gsims/public/get_dept',
          data:formdata,
        success:function(data){
            console.log(data);
            if(data){
               $('#depart').html(data);
            }
            else{
                $('#query').html(data.query);
            }   
        },
        error:function(data){
            console.log(data.responseText); 
        }
    });
};

$('#career_id_1').on('change', toggleElements);

$(document).ready(toggleElements);*/


  // $('#career_id_1').on('change', function(){
  //   $('#depart_1').hide();
  //   $('#level_1').hide();

    
  //   var formdata =  'career_id_1='+$('#career_id_1').val()
  //    console.log('form data=> '+formdata);
  //   $.ajax({
  //       type:'get',
  //        url:'/gsims/public/get_dept',
  //         data:formdata,
  //       success:function(data){

  //           console.log(data);
  //           if(data){
  //             // $('#depart').show();
  //             // $('#level').show();
  //              $('#ajax_depart').html(data);
  //           }
  //           else{
  //               $('#query').html(data.query);
  //           }   
  //       },
  //       error:function(data){
  //           console.log(data.responseText); 
  //       }
  //   });
  //   });

  
  </script>