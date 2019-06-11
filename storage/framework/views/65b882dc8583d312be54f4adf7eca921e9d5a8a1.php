<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 class="modal-title family_gf_id"></h3>
    </div>
    <div class="modal-body interim_card_div interim_carddiv" style="float:left;width:100%;">
        <!-- tab_basic_edit Start -->
        <div class="col-md-12" id="parents_data">
            <div class="col-md-6 text-center">
                <!-- <img src= "http://10.10.10.63/gs/assets/photos/sis/150x150/father/166309.png" class="imageCenterDefaultParent" /> -->
                <!-- <?php echo e($stdfamilyinfo["family"][2]->gr_no); ?> -->
                <img id="fatherimg" src="<?php echo e($fatherpic); ?>" class="imageCenterDefaultParent" />
                <h5 class="father_name"><?php echo e($Father_name); ?></h5>
            </div><!-- col-md-6 -->
            <div class="col-md-6 text-center">
                <!-- <img src="http://10.10.10.63/gs/assets/photos/sis/150x150/mother/166309.png" class="imageCenterDefaultParent"> -->
                <img id="motherimg" src="<?php echo e($motherpic); ?>" class="imageCenterDefaultParent" />
                <h5 class="mother_name"><?php echo e($Mother_name); ?></h5>
            </div><!-- col-md-6 -->
        </div><!-- col-md-12 -->
        <hr />
        <div class="col-md-12 text-center">
            <ul class="childList">
            <?php if(empty($stdfamilyinfo["student"])): ?>
            <!-- <ul class="childList"> -->
                <li class="eachChild">
                    <span class="childInfo">
                        <img id="child1_img" src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/NoPic.png" class="imageCenterDefaultChild">
                        <span class="ChildName ">Child Name Not Found</span><br />
                        <span class="childGS">Null</span> | <span class="stuStatus">Null</span>
                    </span><!-- childInfo -->
                </li><!-- eachChild -->
            <!-- </ul> -->
            <?php else: ?>
            <!-- <ul class="childList"> -->
                <?php $__currentLoopData = $stdfamilyinfo["student"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="eachChild">
                    <span class="childInfo">
                        <img id="child1_img" src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/<?php echo e($student->gr_no); ?>.png" class="imageCenterDefaultChild">
                        <span class="ChildName "><?php echo e($student->call_name); ?></span><br />
                        <span class="childGS"><?php echo e($student->gs_id); ?></span> | <span class="stuStatus"><?php echo e($student->std_status_code); ?></span>
                    </span><!-- childInfo -->
                </li><!-- eachChild -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- </ul> -->
            <?php endif; ?>
                <!-- <li class="eachChild">
                    <span class="childInfo">
                        <img id="child2_img" src="" class="imageCenterDefaultChild">
                        <span class="ChildName">Saleem Qureshi</span><br />
                        <span class="childGS">16-070</span> | <span class="stuStatus">S-CFS</span>
                    </span>
                </li>
                <li class="eachChild">
                    <span class="childInfo">
                        <img id="child3_img" src="" class="imageCenterDefaultChild">
                        <span class="ChildName">Saleem Qureshi</span><br />
                        <span class="childGS">16-070</span> | <span class="stuStatus">S-CFS</span>
                    </span>
                </li>
                <li class="eachChild">
                    <span class="childInfo">
                        <img id="child4_img" src="" class="imageCenterDefaultChild">
                        <span class="ChildName">Saleem Qureshi</span><br />
                        <span class="childGS">16-070</span> | <span class="stuStatus">S-CFS</span>
                    </span>
                </li>
                <li class="eachChild">
                    <span class="childInfo">
                        <img id="child5_img" src="" class="imageCenterDefaultChild">
                        <span class="ChildName">Saleem Qureshi</span><br />
                        <span class="childGS">16-070</span> | <span class="stuStatus">S-CFS</span>
                    </span>
                </li> -->
            </ul> <!-- ul -->
        </div><!-- col-md-12 -->
        <hr />
        <div class="col-md-12">
            <!-- <form action="parent_save_data" class="horizontal-form"> -->
            <div class="horizontal-form"> 
                <div class="form-body">
                    <h3 class="form-section marginHead">Visiting Form</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Location</label>
                                <select class="form-control" required="" name="location_id_parent" id="location_id_parent">
                                     <option value="" disabled="disabled" selected="">Select Location</option>
                                    <?php $__currentLoopData = $stdfamilyinfo['attendance_location']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($attendance_location->id); ?>"><?php echo e($attendance_location->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Visitor</label>
                                <select class="form-control" required="" id="visitor_id">
                                    <option value="" disabled="disabled" selected="">Select Visitor</option>
                                    <option value="F">Father</option>
                                    <option value="M">Mother</option>
                                    <option value="B">Both</option>
                                    <option value="O">Other/Guardian</option>
                                </select>
                            </div>
                        </div><!--/span-->
                    </div><!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Visiting Purpose</label>
                                <input type="text" id="visiting_purpose" maxlength="40" class="form-control" placeholder="Visiting Purpose">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Person Name</label>
                                <input type="text" id="person_name" class="form-control" placeholder="Person Name">
                            </div>
                        </div><!--/span-->
                    </div><!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Visiting Department</label>
                                <input type="text" id="visiting_department" maxlength="20" class="form-control" placeholder="Visiting Purpose">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Card No</label>
                                <input type="text" id="family_RFID_no" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                
                                <input type="hidden" class="fname" id="fname" value="<?php echo e($stdfamilyinfo["family_info"][0]->name); ?>" />
                                <input type="hidden" class="mname" id="mname" value="<?php echo e($stdfamilyinfo["family_info"][1]->name); ?>" />
                                <input type="hidden" class="fmobile" id="fmobile" value="<?php echo e($stdfamilyinfo["family_info"][0]->mobile_phone); ?>" />
                                <input type="hidden" class="mmobile" id="mmobile" value="<?php echo e($stdfamilyinfo["family_info"][1]->mobile_phone); ?>" />
                                <input type="hidden" class="fnic" id="fnic" value="<?php echo e($stdfamilyinfo["family_info"][0]->nic); ?>" />
                                <input type="hidden" class="mnic" id="mnic" value="<?php echo e($stdfamilyinfo["family_info"][1]->nic); ?>" />

                                
                            </div>
                        </div><!--/span-->
                    </div><!--/row-->
                    
                </div>

                <div class="form-actions right">
                    <button type="button" class="btn default">Cancel</button>
                    <button type="submit" class="btn blue Parent_daypass_btn" id="parents_btn" >
                        <i class="fa fa-check"></i> Submit</button>
                </div><!-- form-actions -->
            </div>
            <!-- </form> -->
        </div><!-- col-md-12 -->
        
        <!-- tab_basic_edit End -->
    </div><!-- modal-body -->
</div><!-- modal-content -->

<script type="text/javascript">
    $(document).ready(function(){

        //diable keyboard on textbox
        var delay = (function(){
            var timer = 0;
            return function(callback, ms){
                clearTimeout (timer);
                timer = setTimeout(callback, ms);
            };
        })();

        $("#family_RFID_no").on("input", function() {
           delay(function(){
              if ($("#family_RFID_no").val().length < 8) {
                  $("#family_RFID_no").val("");
              }
           }, 20 );
        });

        $('.family_gf_id').html('Assign Daypass for GF-ID <strong>'+select_gfid+'</strong>');
    });

    // Check Validation Parents
    function check_validation_parents(e){
        var isValid = true;
        $('#location_id_parent,#visitor_id,#visiting_purpose,#person_name,#visiting_department,#family_RFID_no').each(function () {
            if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE"
                });
            }
            else {
                $(this).css({
                    "border": "",
                    "background": ""
                });
            }
        });
        if (isValid == false)
            e.preventDefault();
    
    }

    //Parents save data ajax
    function parents_foam(){

        if($('#family_RFID_no').val() != '' && $('#family_RFID_no').val().length >9)
        {
            $('#Generations_AjaxLoader').show();
            var gf_id = $('.gf_id').val();
            var location = $("#location_id_parent").val();
            var visitor = $("#visitor_id").val();
            var purpose = $("#visiting_purpose").val();
            var person = $("#person_name").val();
            var department = $("#visiting_department").val();
            var RFID_no = $("#family_RFID_no").val();
            var fathername = $("#fname").val();
            var mothername = $("#mname").val();
            var fathermobile = $("#fmobile").val();
            var mothermobile = $("#mmobile").val();
            var fathernic = $("#fnic").val();
            var mothernic = $("#mnic").val();

            // console.log($("#location_id_parent").val());
            //for Assgin DayPass Parents save data from ajax save data
            $.ajax({
                cache:true,
                url:"<?php echo e(url('/parent_save_data')); ?>",
                data:{ 
                    "gf_id":gf_id,
                    "location":location,
                    "visitor":visitor,
                    "purpose":purpose,
                    "person":person,
                    "department":department,
                    "RFID_no":RFID_no,
                    "fathername":fathername,
                    "mothername":mothername,
                    "fathermobile":fathermobile,
                    "mothermobile":mothermobile,
                    "fathernic":fathernic,
                    "mothernic":mothernic,
                    // "_token": "<?php echo e(csrf_token()); ?>",
                },
                method:"GET",
                success:function(data)
                {
                    // alert('Data save success');
                    $('#Generations_AjaxLoader').hide();
                    $('.parents_interimcard_modal').fadeOut();  
                    // $('.parents_interimcard_modal').html(data);
                    console.log(data);
                    myTimeOut();
                // $('#StaffList_ZiaKashif').html(data);
                },
                complete:function(){
                    
                }
            });
            $('#search_student_name').text('');
            $('#search_student_name').val('');

        }else{
                // $("#search_student_name").attr("placeholder", "Please select Student Name first");
                // $("#search_student_name").css({"background-color": "#f5ef3e","color": "black"});
        
        }
        myStopTimeOut();
        Parent_Interim_table();
    
    }

    //Zk family_RFID_no
    //Parent Daypass card Change Event
    $('#family_RFID_no').on('input', function() {
        check_validation_parents();
        parents_foam();
    
    });

    //Parents button click event
    $('#parents_btn').click(function (e) {

        check_validation_parents();
        
    });

</script>