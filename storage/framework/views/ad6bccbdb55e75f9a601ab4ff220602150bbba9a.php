<!-- <?php echo e($next_row_id=0); ?> -->
                                <!-- zk tab_education_edit Start -->
                                <div class="tab-pane" id="tab_education_edit">
                                  <form class="form-horizontal">
                                    <!-------------------------------------------- School ----------------------------------------------------------->

                                    <h4 class="form-section headingBorderBottom School">School</h4>
                                    <?php $school=1; ?>
                                   <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($educations->level==1): ?>
                                    <div class="row school_row" style="padding-bottom: 20px;" id="add_school_more">
                                      <div class="form-body">
                                        <?php $school_inc=$school++; ?>
                                        <div class="col-md-12 school_row_<?php echo e($school_inc); ?>" >
                                          <div class="col-md-4 school_name_<?php echo e($school_inc); ?> ">
                                            <!-- zkkk -->
                                              <label class="control-label">School Name <span class="required">*</span></label>
                                              <select class="schoolName form-control" id="txt_schName" data-rowid=<?php echo e($school_inc); ?> data-school_dd_name='school_dd<?php echo e($school_inc); ?> '>
                                                <option <?php if ($educations->title == "ACE_School" ) echo 'selected' ; ?> value="<?php echo e($educations->institute); ?>">ACE School</option>
                                                <option <?php if ($educations->title == "Army_Public_School" ) echo 'selected' ; ?> value="Army_Public_School"> ArmyPublic School </option>
                                                <option <?php if ($educations->title == "Aga_Khan_Education" ) echo 'selected' ; ?> value="Aga_Khan_Education"> Aga KhanEducation </option>
                                                <option <?php if ($educations->title == "Aga_Khan_Higher_Secondary_School" ) echo 'selected' ; ?> value="Aga_Khan_Higher_Secondary_School"> Aga Khan Higher Secondary School </option>
                                                <option <?php if ($educations->title == "Aga_Khan_School" ) echo 'selected' ; ?> value="Aga_Khan_School"> Aga Khan School </option>
                                                <option <?php if ($educations->title == "Agha_Khan_School" ) echo 'selected' ; ?> value="Agha_Khan_School"> Agha Khan School </option>
                                                <option <?php if ($educations->title == "Ahsan_Public_Secondary_School" ) echo 'selected' ; ?> value="Ahsan_Public_Secondary_School"> Ahsan Public Secondary School </option>
                                                <option <?php if ($educations->title == "Aisha_Bawany_Academy_Boys_Campus" ) echo 'selected' ; ?> value="Aisha_Bawany_Academy_Boys_Campus"> Aisha Bawany Academy Boys Campus </option>
                                                <option <?php if ($educations->title == "Al_Saqib_Public_School" ) echo 'selected' ; ?> value="Al_Saqib_Public_School"> Al Saqib Public School </option>
                                                <option <?php if ($educations->title == "Almurtaza_School" ) echo 'selected' ; ?> value="Almurtaza_School"> Almurtaza School </option>
                                                <option <?php if ($educations->title == "ASF_Public_School" ) echo 'selected' ; ?> value="ASF_Public_School"> ASF Public School </option>
                                                <option <?php if ($educations->title == "B_V_S_Parsi_High_School_Saddar" ) echo 'selected' ; ?> value="B_V_S_Parsi_High_School_Saddar"> B.V.S Parsi High School Saddar </option>
                                                <option <?php if ($educations->title == "Bay_View_Academy" ) echo 'selected' ; ?> value="Bay_View_Academy"> Bay View Academy </option>

                                                <option <?php if ($educations->title == "Beaconhouse_School" ) echo 'selected' ; ?> value="Beaconhouse_School"> Beaconhouse School </option>  
                                                <option <?php if ($educations->title == "DHA_Model_High_School" ) echo 'selected' ; ?> value="DHA_Model_High_School"> DHA Model High School </option>  
                                                <option <?php if ($educations->title == "Education_Bay" ) echo 'selected' ; ?> value="Education_Bay"> Education Bay </option>  
                                                <option <?php if ($educations->title == "Falcon_House_Grammar_School" ) echo 'selected' ; ?> value="Falcon_House_Grammar_School"> Falcon House Grammar School </option>  
                                                <option <?php if ($educations->title == "Falconhouse_Grammar_School" ) echo 'selected' ; ?> value="Falconhouse_Grammar_School"> Falconhouse Grammar School </option>  
                                                <option <?php if ($educations->title == "Fatimiyah_School" ) echo 'selected' ; ?> value="Fatimiyah_School"> Fatimiyah School </option>  
                                                <option <?php if ($educations->title == "Foundation_Public_School" ) echo 'selected' ; ?> value="Foundation_Public_School"> Foundation Public School </option>  
                                                <option <?php if ($educations->title == "Generations_School" ) echo 'selected' ; ?> value="Generations_School"> Generations School </option>  
                                                <option <?php if ($educations->title == "Government_Delhi_Boys_Secondary_School" ) echo 'selected' ; ?> value="Government_Delhi_Boys_Secondary_School"> Government Delhi Boys Secondary School </option>
                                                <option <?php if ($educations->title == "Government_Delhi_Girls_Secondary_School" ) echo 'selected' ; ?> value="Government_Delhi_Girls_Secondary_School"> Government Delhi Girls Secondary School </option>
                                                <option <?php if ($educations->title == "Government_Pilot_High_School_Dadu" ) echo 'selected' ; ?> value="Government_Pilot_High_School_Dadu"> Government Pilot High School Dadu </option>  
                                                <option <?php if ($educations->title == "Habib_Public_School" ) echo 'selected' ; ?> value="Habib_Public_School"> Habib Public School </option>  
                                                <option <?php if ($educations->title == "Habib_Public_School_HPS" ) echo 'selected' ; ?> value="Habib_Public_School_HPS"> Habib Public School HPS </option>  
                                                <option <?php if ($educations->title == "Hamdard_Public_School" ) echo 'selected' ; ?> value="Hamdard_Public_School"> Hamdard Public School </option>  
                                                <option <?php if ($educations->title == "_Madinat_ul_Hikmah" ) echo 'selected' ; ?> value="Hamdard_Public_School,_Madinat_ul_Hikmah"> Hamdard Public School, Madinat ul Hikmah </option>
                                                <option <?php if ($educations->title == "Happy_Palace_Grammar_School" ) echo 'selected' ; ?> value="Happy_Palace_Grammar_School"> Happy Palace Grammar School </option>  
                                                <option <?php if ($educations->title == "Hyderi_Public_School_Saddar" ) echo 'selected' ; ?> value="Hyderi_Public_School_Saddar"> Hyderi Public School Saddar </option>  
                                                <option <?php if ($educations->title == "Indus_Academy" ) echo 'selected' ; ?> value="Indus_Academy"> Indus Academy </option>  
                                                <option <?php if ($educations->title == "Karachi_Grammar_School" ) echo 'selected' ; ?> value="Karachi_Grammar_School"> Karachi Grammar School </option>  
                                                <option <?php if ($educations->title == "Ladybird_Grammar_School" ) echo 'selected' ; ?> value="Ladybird_Grammar_School"> Ladybird Grammar School </option>  
                                                <option <?php if ($educations->title == "Little_Folks_School" ) echo 'selected' ; ?> value="Little_Folks_School"> Little Folks School </option>  
                                                <option <?php if ($educations->title == "Meritorious_School" ) echo 'selected' ; ?> value="Meritorious_School"> Meritorious School </option>  
                                                <option <?php if ($educations->title == "Metropolis_Academy" ) echo 'selected' ; ?> value="Metropolis_Academy"> Metropolis Academy </option>  
                                                <option <?php if ($educations->title == "Metropolitan_Academy" ) echo 'selected' ; ?> value="Metropolitan_Academy"> Metropolitan Academy </option>  
                                                <option <?php if ($educations->title == "NAKHLAH_Educational_House" ) echo 'selected' ; ?> value="NAKHLAH_Educational_House"> NAKHLAH Educational House </option>  
                                                <option <?php if ($educations->title == "Nasra_School" ) echo 'selected' ; ?> value="Nasra_School"> Nasra School </option>  
                                                <option <?php if ($educations->title == "Nixor_College" ) echo 'selected' ; ?> value="Nixor_College"> Nixor College </option>  
                                                <option <?php if ($educations->title == "Progressive_Childrens_Academy" ) echo 'selected' ; ?> value="Progressive_Childrens_Academy"> Progressive Childrens Academy </option>  
                                                <option <?php if ($educations->title == "Progressive_Public_School" ) echo 'selected' ; ?> value="Progressive_Public_School"> Progressive Public School </option>  
                                                <option <?php if ($educations->title == "Reflections" ) echo 'selected' ; ?> value="Reflections"> Reflections </option>  
                                                <option <?php if ($educations->title == "Sadequain_Academy" ) echo 'selected' ; ?> value="Sadequain_Academy"> Sadequain Academy </option>  
                                                <option <?php if ($educations->title == "Saqib_Public_School" ) echo 'selected' ; ?> value="Saqib_Public_School"> Saqib Public School </option>  
                                                <option <?php if ($educations->title == "Shaheen_Cambridge" ) echo 'selected' ; ?> value="Shaheen_Cambridge"> Shaheen Cambridge </option>  
                                                <option <?php if ($educations->title == "Shaheen_Cambridge_School" ) echo 'selected' ; ?> value="Shaheen_Cambridge_School"> Shaheen Cambridge School </option>  
                                                <option <?php if ($educations->title == "Shaheen_Public_School" ) echo 'selected' ; ?> value="Shaheen_Public_School"> Shaheen Public School </option>  
                                                <option <?php if ($educations->title == "Shaheen_Public_School_Campus" ) echo 'selected' ; ?> value="Shaheen_Public_School_Campus"> Shaheen Public School Campus </option>  
                                                <option <?php if ($educations->title == "Shahwilayat_Public_School" ) echo 'selected' ; ?> value="Shahwilayat_Public_School"> Shahwilayat Public School </option>  
                                                <option <?php if ($educations->title == "Sindh_Madrasa_tul_Islam" ) echo 'selected' ; ?> value="Sindh_Madrasa_tul_Islam"> Sindh Madrasa tul Islam </option>  
                                                <option <?php if ($educations->title == "Sir_Syed_Childrens_Academy" ) echo 'selected' ; ?> value="Sir_Syed_Childrens_Academy"> Sir Syed Childrens Academy </option>  
                                                <option <?php if ($educations->title == "St_Josephs_School" ) echo 'selected' ; ?> value="St_Josephs_School"> St Josephs School </option>  
                                                <option <?php if ($educations->title == "St_Patricks_High_School" ) echo 'selected' ; ?> value="St_Patricks_High_School"> St Patricks High School </option>  
                                                <option <?php if ($educations->title == "St_Peters_High_School" ) echo 'selected' ; ?> value="St_Peters_High_School"> St Peters High School </option>  
                                                <option <?php if ($educations->title == "St_Johns_High_School" ) echo 'selected' ; ?> value="St_Johns_High_School"> St Johns High School </option>  
                                                <option <?php if ($educations->title == "St_Judes_High_School" ) echo 'selected' ; ?> value="St_Judes_High_School"> St Judes High School </option>  
                                                <option <?php if ($educations->title == "St_Lawrences" ) echo 'selected' ; ?> value="St_Lawrences"> St Lawrences </option>  
                                                <option <?php if ($educations->title == "St_Michaels_Convent_School" ) echo 'selected' ; ?> value="St_Michaels_Convent_School"> St Michaels Convent School </option>  
                                                <option <?php if ($educations->title == "St_Patricks_High_School" ) echo 'selected' ; ?> value="St_Patricks_High_School"> St Patricks High School </option>  
                                                <option <?php if ($educations->title == "St_Pauls_High_School" ) echo 'selected' ; ?> value="St_Pauls_High_School"> St Pauls High School </option>  
                                                <option <?php if ($educations->title == "Sultan_Mohammed_Shah_Aga_Khan_School" ) echo 'selected' ; ?> value="Sultan_Mohammed_Shah_Aga_Khan_School"> Sultan Mohammed Shah Aga Khan School </option>
                                                <option <?php if ($educations->title == "The_Academy" ) echo 'selected' ; ?> value="The_Academy"> The Academy </option>  
                                                <option <?php if ($educations->title == "The_British_International_School" ) echo 'selected' ; ?> value="The_British_International_School"> The British International School </option>  
                                                <option <?php if ($educations->title == "The_City_School" ) echo 'selected' ; ?> value="The_City_School"> The City School </option>  
                                                <option <?php if ($educations->title == "The_City_School_Paf_Chapter" ) echo 'selected' ; ?> value="The_City_School_Paf_Chapter"> The City School Paf Chapter </option>  
                                                <option <?php if ($educations->title == "The_Educators" ) echo 'selected' ; ?> value="The_Educators"> The Educators </option>  
                                                <option <?php if ($educations->title == "The_Intellect_School" ) echo 'selected' ; ?> value="The_Intellect_School"> The Intellect School </option>  
                                                <option <?php if ($educations->title == "The_Knowledge_Academy" ) echo 'selected' ; ?> value="The_Knowledge_Academy"> The Knowledge Academy </option>  
                                                <option <?php if ($educations->title == "The_Mama_Parsi" ) echo 'selected' ; ?> value="The_Mama_Parsi"> The Mama Parsi </option>  
                                                <option <?php if ($educations->title == "The_Metropolis_Academy" ) echo 'selected' ; ?> value="The_Metropolis_Academy"> The Metropolis Academy </option>  
                                                <option <?php if ($educations->title == "The_Metropolitan_Academy" ) echo 'selected' ; ?> value="The_Metropolitan_Academy"> The Metropolitan Academy </option>  
                                                <option <?php if ($educations->title == "The_Suffah_Academy" ) echo 'selected' ; ?> value="The_Suffah_Academy"> The Suffah Academy </option>  
                                                <option <?php if ($educations->title == "Trinity_Private_School" ) echo 'selected' ; ?> value="Trinity_Private_School"> Trinity Private School </option>  
                                                <option <?php if ($educations->title == "Trinity_Private_School_Karachi" ) echo 'selected' ; ?> value="Trinity_Private_School_Karachi"> Trinity Private School Karachi </option>  
                                                <option <?php if ($educations->title == "Yaqeen_Education_Foundation" ) echo 'selected' ; ?> value="Yaqeen_Education_Foundation"> Yaqeen Education Foundation </option>  
                                                <!-- <option < //?/php if ($educations->title == $educations->title ) echo 'selected' ; ?> value="$educations->title"> <?php echo e($educations->institute); ?> </option> -->
                                                <option value="Other"> Other </option>

                                              </select><!-- -->
                                              <input type="text" class="form-control school_text_name_<?php echo e($school_inc); ?>" id="schoolname_textbox" style="display: none;">
                                              <label class="control-label close_school_name close_school_name_<?php echo e($school_inc); ?>" id="<?php echo e($school_inc); ?>" style="display: none;">Close</label>
                                              <!-- <a href="" class="closeOther" id="close_school_name" style="display: none;">close</a> -->
                                          </div><!-- col-md-4 zk -->
                                          <div class="col-md-2 school_qua_<?php echo e($school_inc); ?>">
                                              <label class="control-label">Qualification <span class="required">*</span></label>
                                              <select name="schoolQualification[]" class="schoolQualification valid form-control" data-rowid=<?php echo e($school_inc); ?> data-school_dd_qua='school_qua_dd<?php echo e($school_inc); ?> ' id="schoolQ">
                                                  <option value="A_Level" <?php if( $educations->qualification=="A_Level" ){ echo "selected"; }?>> A Level </option>
                                                  <option value="O_Level" <?php if( $educations->qualification=="O_Level" ){ echo "selected"; }?>> O Level </option>
                                                  <option value="Matric" <?php if( $educations->qualification=="Matric" ){ echo "selected"; }?>> Matric  </option>
                                                  <option value="Other"> Other </option>
                                              </select><!-- -->
                                              <input type="text" class="form-control school_text_qualification_<?php echo e($school_inc); ?>" id="txt_qualification" style="display: none;">
                                              <label class="control-label close_school_qua close_school_qua_<?php echo e($school_inc); ?>" id="<?php echo e($school_inc); ?>" style="display: none;">Close</label>
                                              <!-- <a href="#" class="closeOther" style="display: none;">close</a> -->
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 school_sub_<?php echo e($school_inc); ?>">
                                              <label class="control-label">Subject <span class="required">*</span></label>
                                              <select name="schoolSubject[]" class="schoolSubject valid form-control " data-rowid=<?php echo e($school_inc); ?> data-school_dd_subject='school_sub_dd<?php echo e($school_inc); ?> ' id="schoolS" >
                                                  <option value="Science" <?php if( $educations->subjects=="Science" ){ echo "selected"; }?>> Science </option>
                                                  <option value="Arts" <?php if( $educations->subjects=="Arts" ){ echo "selected"; }?>> Arts </option>
                                                  <option value="Other"> Other </option>
                                              </select>
                                              <input type="text" class="form-control school_text_subject_<?php echo e($school_inc); ?>" id="txt_subject" style="display: none;">
                                              <label class="control-label close_school_sub close_school_sub_<?php echo e($school_inc); ?>" id="<?php echo e($school_inc); ?>" style="display: none;">Close</label>
                                              <!-- <a href="#" class="closeOther" style="display: none;">close</a> -->
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 school_result_<?php echo e($school_inc); ?>">
                                              <label class="control-label">Result <span class="required">*</span></label>
                                              <input type="text" class="form-control school_result_<?php echo e($school_inc); ?>" name="" id="result_school" value="<?php echo e($educations->result); ?>">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 school_year_<?php echo e($school_inc); ?>">
                                              <label class="control-label">Year <span class="required">*</span></label>
                                              <input type="text" id="school_year" class="form-control school_year" name="school_year" value="<?php echo e($educations->year_of_completion); ?>">
                                          </div><!-- col-md-2 -->
                                        </div>
                                      </div><!-- form-body -->
                                    </div>
                                    <!-- row -->
                                    <!-- for testing purpose only -->
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Add another School -->
                                     <div class="new_row_school"></div>
                                      <div class="row">
                                        <div class="col-md-12 text-right">
                                          <div class="col-md-12">
                                           <!-- <a href="" class="btn btn-group green school-btn" id="add_other_school">+ Add Another School</a> -->
                                           <input type="button" id="add_other_school"  value="+ Add Another School" class="btn btn-group green school_btn" name="addAnotherSchool">
                                           <!-- <input type="submit" value="Add Another School" id="add_other_school" class="btn btn-group green" /> -->
                                          </div><!-- col-md-12 -->
                                        </div><!-- col-md-12 -->
                                      </div><!-- row -->
                                    <!-------------------------------------------- College ----------------------------------------------------------->
                                    <h4 class="form-section headingBorderBottom College">College</h4>
                                    <?php $college=1; ?>
                                    <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($educations->level==2): ?>
                                    <div class="row college_row" style="padding-bottom: 20px;" id="add_college_more">
                                      <div class="form-body">
                                        <?php $college_inc=$college++; ?>
                                        <div class="col-md-12 college_row_<?php echo e($college_inc); ?>" >
                                          <div class="col-md-4 college_name_<?php echo e($college_inc); ?>" >
                                              <label class="control-label">College Name <span class="required">*</span></label>
                                              <input type="text" class="form-control college_text_name_<?php echo e($college_inc); ?>" id="college_name"  value="<?php echo e($educations->institute); ?>">
                                          </div><!-- col-md-4 -->
                                          <div class="col-md-2 college_qua_<?php echo e($college_inc); ?>">
                                              <label class="control-label">Qualification <span class="required">*</span></label>
                                              <select name="collegeQualification[]" class="collegeQ valid form-control college_qualification_<?php echo e($college_inc); ?>" data-rowid=<?php echo e($college_inc); ?> data-college_dd_qua='college_qua_dd<?php echo e($college_inc); ?> ' id="collegeQ">
                                                <!-- <option value="<?php echo e($educations->qualification); ?>"><?php echo e($educations->qualification); ?></option> -->
                                                <option value="Intermediate" <?php if( $educations->qualification== "Intermediate" ) { echo "selected"; }?>> Intermediate </option>
                                                <option value="Diploma" <?php if( $educations->qualification== "Diploma" ) { echo "selected"; }?>> Diploma </option>
                                                <option value="Other" <?php if( $educations->qualification== "Other" ) { echo "selected"; }?>> Other </option>
                                              </select><!-- -->
                                              <input type="text" class="form-control college_text_qualification_<?php echo e($college_inc); ?>" id="txt_qualification" style="display: none;">
                                              <label class="control-label close_college_qua close_college_qua_<?php echo e($college_inc); ?>" id="<?php echo e($college_inc); ?>" style="display: none;">Close</label>
                                              <!-- <a href="#" class="closeOther" style="display: none;">close</a> -->
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 college_sub_<?php echo e($college_inc); ?>">
                                              <label class="control-label">Subject <span class="required">*</span></label>
                                              <select name="collegeSubject[]" class="collegeS slct_clgSub valid form-control college_subject_<?php echo e($college_inc); ?>" data-rowid=<?php echo e($college_inc); ?> data-college_dd_subject='college_sub_dd<?php echo e($college_inc); ?> ' id="collegeS">
                                                <option value="Pre_Engineering" <?php if( $educations->subjects== "Pre_Engineering" ) { echo "selected"; }?>> Pre Engineering </option>
                                                <option value="Pre_Medical" <?php if( $educations->subjects== "Pre_Medical" ) { echo "selected"; }?>> Pre Medical </option>
                                                <option value="Computer" <?php if( $educations->subjects== "Computer" ) { echo "selected"; }?>> Computer </option>
                                                <option value="Commerce" <?php if( $educations->subjects== "Commerce" ) { echo "selected"; }?>> Commerce </option>
                                                <option value="Arts" <?php if( $educations->subjects== "Arts" ) { echo "selected"; }?>> Arts </option>
                                                <option value="Other" <?php if( $educations->subjects== "Other" ) { echo "selected"; }?>> Other </option>
                                              </select>
                                              <input type="text" class="form-control college_text_subject_<?php echo e($college_inc); ?>" id="txt_subject"  style="display: none;">
                                              <label class="control-label close_college_sub close_college_sub_<?php echo e($college_inc); ?>" id="<?php echo e($college_inc); ?>" style="display: none;">Close</label>
                                              <!-- <a href="#" class="closeOther" style="display: none;">close</a> -->
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 college_result_<?php echo e($college_inc); ?>">
                                              <label class="control-label">Result <span class="required">*</span></label>
                                              <input type="text" class="form-control college_result_<?php echo e($college_inc); ?>" name="" id="result_college" value="<?php echo e($educations->result); ?>">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 college_year_<?php echo e($college_inc); ?>">
                                              <label class="control-label">Year <span class="required">*</span></label>
                                              <input type="text" class="form-control college_year" name="" id="year_college" value="<?php echo e($educations->year_of_completion); ?>">
                                          </div><!-- col-md-2 -->
                                        </div>
                                      </div><!-- form-body -->
                                    </div>
                                    <!-- row -->
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Add another College --> 
                                    <div class="new_row_college"></div>
                                    <div class="row">
                                      <div class="col-md-12 text-right">
                                        <div class="col-md-12">
                                          <!-- <a href="#" class="btn btn-group green">+ Add College</a> -->
                                          <input type="button" id="add_other_college"  value="+ Add Another College" class="btn btn-group green college_btn" name="addAnotherCollege">
                                        </div><!-- col-md-12 -->
                                      </div><!-- col-md-12 -->
                                    </div><!-- row -->
                                    <!-------------------------------------------- University ----------------------------------------------------------->
                                    <h4 class="form-section headingBorderBottom University">University</h4>
                                    <?php $university=1; ?>
                                    <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($educations->level==3): ?>
                                    <div class="row university_row" style="padding-bottom: 20px;" id="add_university_more">
                                      <div class="form-body">
                                        <?php $university_inc=$university++; ?>
                                        <div class="col-md-12 university_row_<?php echo e($university_inc); ?>" >
                                          <div class="col-md-4 university_name_<?php echo e($university_inc); ?>" >
                                              <label class="control-label">University Name <span class="required">*</span></label>
                                              <select name="universityName[]" class="universityN slct_uniname form-control" data-rowid=<?php echo e($university_inc); ?> data-university_dd_name='university_dd<?php echo e($university_inc); ?> ' id="university_name">
                                                <option <?php if ($educations->title == "Air_University_AU_Islamabad" ) echo 'selected' ; ?> value="Air_University_AU_Islamabad"> Air University AU Islamabad </option>
                                                <option <?php if ($educations->title == "Allama_Iqbal_Open_University_AIOU_Islamabad" ) echo 'selected' ; ?> value="Allama_Iqbal_Open_University_AIOU_Islamabad"> Allama Iqbal Open University AIOU Islamabad </option>
                                                <option <?php if ($educations->title == "Bahria_University_BU_Islamabad" ) echo 'selected' ; ?> value="Bahria_University_BU_Islamabad"> Bahria University BU Islamabad </option> 
                                                <option <?php if ($educations->title == "COMSATS_Institute_of_Information_Technology_Islamabad" ) echo 'selected' ; ?> value="COMSATS_Institute_of_Information_Technology_Islamabad"> COMSATS Institute of Information Technology Islamabad </option>  
                                                <option <?php if ($educations->title == "Federal_Urdu_University_of_Arts_Sciences_and_Technology_Islamabad" ) echo 'selected' ; ?> value="Federal_Urdu_University_of_Arts_Sciences_and_Technology_Islamabad"> Federal Urdu University of Arts Sciences and Technology Islamabad </option>  
                                                <option <?php if ($educations->title == "Foundation_University_Islamabad" ) echo 'selected' ; ?> value="Foundation_University_Islamabad"> Foundation University Islamabad </option>  
                                                <option <?php if ($educations->title == "Institute_of_Space_Technology__IST__Islamabad" ) echo 'selected' ; ?> value="Institute_of_Space_Technology__IST__Islamabad"> Institute of Space Technology  IST  Islamabad </option>  
                                                <option <?php if ($educations->title == "International_Islamic_University__IIU__Islamabad" ) echo 'selected' ; ?> value="International_Islamic_University__IIU__Islamabad"> International Islamic University  IIU  Islamabad </option>  
                                                <option <?php if ($educations->title == "National_University_of_Computer_and_Emerging_Sciences_Islamabad" ) echo 'selected' ; ?> value="National_University_of_Computer_and_Emerging_Sciences_Islamabad"> National University of Computer and Emerging Sciences Islamabad </option>  
                                                <option <?php if ($educations->title == "National_University_of_Modern_Languages_Islamabad" ) echo 'selected' ; ?> value="National_University_of_Modern_Languages_Islamabad"> National University of Modern Languages Islamabad </option>  
                                                <option <?php if ($educations->title == "" ) echo 'selected' ; ?> value="Pakistan_Institute_of_Engineering_&amp;_Applied_Sciences_Islamabad"> Pakistan Institute of Engineering &amp; Applied Sciences Islamabad </option>  
                                                <option <?php if ($educations->title == "Quaid_i_Azam_University_Islamabad" ) echo 'selected' ; ?> value="Quaid_i_Azam_University_Islamabad"> Quaid i Azam University Islamabad </option>  
                                                <option <?php if ($educations->title == "Riphah_International_University__Islamabad" ) echo 'selected' ; ?> value="Riphah_International_University__Islamabad"> Riphah International University  Islamabad </option>  
                                                <option <?php if ($educations->title == "Bahauddin_Zakariya_University__Multan" ) echo 'selected' ; ?> value="Bahauddin_Zakariya_University__Multan"> Bahauddin Zakariya University  Multan </option>  
                                                <option <?php if ($educations->title == "Beaconhouse_National_University__BNU__Lahore" ) echo 'selected' ; ?> value="Beaconhouse_National_University__BNU__Lahore"> Beaconhouse National University  BNU  Lahore </option>  
                                                <option <?php if ($educations->title == "College_of_Buisness_Administration&amp;_Economics__NCBA&amp;E__Lahore" ) echo 'selected' ; ?> value="College_of_Buisness_Administration&amp;_Economics__NCBA&amp;E__Lahore"> College of Buisness Administration&amp; Economics  NCBA&amp;E  Lahore </option>  
                                                <option <?php if ($educations->title == "Fatima_Jinnah_Women_University__FJWU__Rawalpindi" ) echo 'selected' ; ?> value="Fatima_Jinnah_Women_University__FJWU__Rawalpindi"> Fatima Jinnah Women University  FJWU  Rawalpindi </option>  
                                                <option <?php if ($educations->title == "Forman_Christian_College__FCC__Lahore" ) echo 'selected' ; ?> value="Forman_Christian_College__FCC__Lahore"> Forman Christian College  FCC  Lahore </option>  
                                                <option <?php if ($educations->title == "GIFT_University_Gujranwala" ) echo 'selected' ; ?> value="GIFT_University_Gujranwala"> GIFT University Gujranwala </option>  
                                                <option <?php if ($educations->title == "Government_College_University__GCU__Faisalabad" ) echo 'selected' ; ?> value="Government_College_University__GCU__Faisalabad"> Government College University  GCU  Faisalabad </option>  
                                                <option <?php if ($educations->title == "Government_College_University__GCU__Lahore" ) echo 'selected' ; ?> value="Government_College_University__GCU__Lahore"> Government College University  GCU  Lahore </option>  
                                                <option <?php if ($educations->title == "Hajvery_University__HU__Lahore" ) echo 'selected' ; ?> value="Hajvery_University__HU__Lahore"> Hajvery University  HU  Lahore </option>  
                                                <option <?php if ($educations->title == "Imperial_College_of_Business_Studies_Lahore" ) echo 'selected' ; ?> value="Imperial_College_of_Business_Studies_Lahore"> Imperial College of Business Studies Lahore </option>  
                                                <option <?php if ($educations->title == "Institute_of_Management_Sciences__IMS__Lahore" ) echo 'selected' ; ?> value="Institute_of_Management_Sciences__IMS__Lahore"> Institute of Management Sciences  IMS  Lahore </option>  
                                                <option <?php if ($educations->title == "Islamia_University_Bahawalpur" ) echo 'selected' ; ?> value="Islamia_University_Bahawalpur"> Islamia University Bahawalpur </option>  
                                                <option <?php if ($educations->title == "Kinnaird_College_for_Women_Lahore" ) echo 'selected' ; ?> value="Kinnaird_College_for_Women_Lahore"> Kinnaird College for Women Lahore </option>  
                                                <option <?php if ($educations->title == "Lahore_College_for_Women_University__LCWU__Lahore" ) echo 'selected' ; ?> value="Lahore_College_for_Women_University__LCWU__Lahore"> Lahore College for Women University  LCWU  Lahore </option>  
                                                <option <?php if ($educations->title == "Lahore_School_of_Economics__LSE__Lahore" ) echo 'selected' ; ?> value="Lahore_School_of_Economics__LSE__Lahore"> Lahore School of Economics  LSE  Lahore </option>  
                                                <option <?php if ($educations->title == "Lahore_University_of_Management_Sciences__LUMS__Lahore" ) echo 'selected' ; ?> value="Lahore_University_of_Management_Sciences__LUMS__Lahore"> Lahore University of Management Sciences  LUMS  Lahore </option>  
                                                <option <?php if ($educations->title == "Minhaj_University_Lahore" ) echo 'selected' ; ?> value="Minhaj_University_Lahore"> Minhaj University Lahore </option>  
                                                <option <?php if ($educations->title == "National_College_of_Arts__NCA__Lahore" ) echo 'selected' ; ?> value="National_College_of_Arts__NCA__Lahore"> National College of Arts  NCA  Lahore </option>  
                                                <option <?php if ($educations->title == "National_Textile_University__NTU__Faisalabad__Federal_Chartered" ) echo 'selected' ; ?> value="National_Textile_University__NTU__Faisalabad__Federal_Chartered"> National Textile University  NTU  Faisalabad  Federal Chartered </option>  
                                                <option <?php if ($educations->title == "National_University_of_Sciences_&amp;_Technology__NUST__Rawalpindi" ) echo 'selected' ; ?> value="National_University_of_Sciences_&amp;_Technology__NUST__Rawalpindi"> National University of Sciences &amp; Technology  NUST  Rawalpindi </option>  
                                                <option <?php if ($educations->title == "The_Superior_College_Lahore" ) echo 'selected' ; ?> value="The_Superior_College_Lahore"> The Superior College Lahore </option>  
                                                <option <?php if ($educations->title == "The_University_of_Management_&amp;_Technology__UMT__Lahore" ) echo 'selected' ; ?> value="The_University_of_Management_&amp;_Technology__UMT__Lahore"> The University of Management &amp; Technology  UMT  Lahore </option>  
                                                <option <?php if ($educations->title == "University_of_Agriculture_Faisalabad" ) echo 'selected' ; ?> value="University_of_Agriculture_Faisalabad"> University of Agriculture Faisalabad </option>  
                                                <option <?php if ($educations->title == "University_of_Arid_Agriculture_Murree_Road_Rawalpindi" ) echo 'selected' ; ?> value="University_of_Arid_Agriculture_Murree_Road_Rawalpindi"> University of Arid Agriculture Murree Road Rawalpindi </option>  
                                                <option <?php if ($educations->title == "University_of_Central_Punjab__UCP__Lahore" ) echo 'selected' ; ?> value="University_of_Central_Punjab__UCP__Lahore"> University of Central Punjab  UCP  Lahore </option>  
                                                <option <?php if ($educations->title == "University_of_Education_Lahore" ) echo 'selected' ; ?> value="University_of_Education_Lahore"> University of Education Lahore </option>  
                                                <option <?php if ($educations->title == "University_of_Engineering_&amp;_Technology__UET__Lahore" ) echo 'selected' ; ?> value="University_of_Engineering_&amp;_Technology__UET__Lahore"> University of Engineering &amp; Technology  UET  Lahore </option>  
                                                <option <?php if ($educations->title == "University_of_Engineering_&amp;_Technology__UET__Taxila" ) echo 'selected' ; ?> value="University_of_Engineering_&amp;_Technology__UET__Taxila"> University of Engineering &amp; Technology  UET  Taxila </option>  
                                                <option <?php if ($educations->title == "University_of_Faisalabad_Faisalabad" ) echo 'selected' ; ?> value="University_of_Faisalabad_Faisalabad"> University of Faisalabad Faisalabad </option>  
                                                <option <?php if ($educations->title == "University_of_Gujrat__Gujrat" ) echo 'selected' ; ?> value="University_of_Gujrat__Gujrat"> University of Gujrat  Gujrat </option>  
                                                <option <?php if ($educations->title == "University_of_Health_Sciences__UHS__Lahore" ) echo 'selected' ; ?> value="University_of_Health_Sciences__UHS__Lahore"> University of Health Sciences  UHS  Lahore </option>  
                                                <option <?php if ($educations->title == "University_of_Lahore_Lahore" ) echo 'selected' ; ?> value="University_of_Lahore_Lahore"> University of Lahore Lahore </option>  
                                                <option <?php if ($educations->title == "University_of_Sargodha_Sargodha" ) echo 'selected' ; ?> value="University_of_Sargodha_Sargodha"> University of Sargodha Sargodha </option>  
                                                <option <?php if ($educations->title == "University_of_South_Asia__USA__Lahore" ) echo 'selected' ; ?> value="University_of_South_Asia__USA__Lahore"> University of South Asia  USA  Lahore </option>  
                                                <option <?php if ($educations->title == "University_of_Veterinary_and_Animal_Sciences__UVAS__Lahore" ) echo 'selected' ; ?> value="University_of_Veterinary_and_Animal_Sciences__UVAS__Lahore"> University of Veterinary and Animal Sciences  UVAS  Lahore </option>  
                                                <option <?php if ($educations->title == "Virtual_University_of_Pakistan__VU__Lahore" ) echo 'selected' ; ?> value="Virtual_University_of_Pakistan__VU__Lahore"> Virtual University of Pakistan  VU  Lahore </option>  
                                                <option <?php if ($educations->title == "Agha_Khan_University__AKU__Karachi" ) echo 'selected' ; ?> value="Agha_Khan_University__AKU__Karachi"> Agha Khan University  AKU  Karachi </option>  
                                                <option <?php if ($educations->title == "Baqai_Medical_University_Karachi" ) echo 'selected' ; ?> value="Baqai_Medical_University_Karachi"> Baqai Medical University Karachi </option>  
                                                <option <?php if ($educations->title == "Dadabhoy_Institute_of_Higher_Education_Karachi" ) echo 'selected' ; ?> value="Dadabhoy_Institute_of_Higher_Education_Karachi"> Dadabhoy Institute of Higher Education Karachi </option>  
                                                <option <?php if ($educations->title == "Dow_University_of_Health_Sciences_Karachi" ) echo 'selected' ; ?> value="Dow_University_of_Health_Sciences_Karachi"> Dow University of Health Sciences Karachi </option>  
                                                <option <?php if ($educations->title == "Greenwich_University_Karachi" ) echo 'selected' ; ?> value="Greenwich_University_Karachi"> Greenwich University Karachi </option>  
                                                <option <?php if ($educations->title == "Hamdard_University_Karachi" ) echo 'selected' ; ?> value="Hamdard_University_Karachi"> Hamdard University Karachi </option>  
                                                <option <?php if ($educations->title == "Indus_Institute_of_Higher_EducationÂ" ) echo 'selected' ; ?> value="Indus_Institute_of_Higher_EducationÂ&nbsp;Karachi"> Indus Institute of Higher EducationÂ&nbsp;Karachi </option>  
                                                <option <?php if ($educations->title == "Indus_Valley_School_of_Art_and_Architecture_Karachi" ) echo 'selected' ; ?> value="Indus_Valley_School_of_Art_and_Architecture_Karachi"> Indus Valley School of Art and Architecture Karachi </option>  
                                                <option <?php if ($educations->title == "Institute_of_Business_&amp;_Technology_BIZTEK_Karachi" ) echo 'selected' ; ?> value="Institute_of_Business_&amp;_Technology_BIZTEK_Karachi"> Institute of Business &amp; Technology BIZTEK Karachi </option>  
                                                <option <?php if ($educations->title == "Institute_of_Business_Administration__IBA__Karachi" ) echo 'selected' ; ?> value="Institute_of_Business_Administration__IBA__Karachi"> Institute of Business Administration  IBA  Karachi </option>  
                                                <option <?php if ($educations->title == "Institute_of_Business_Management__IoBM__Karachi" ) echo 'selected' ; ?> value="Institute_of_Business_Management__IoBM__Karachi"> Institute of Business Management  IoBM  Karachi </option>  
                                                <option <?php if ($educations->title == "Iqra_University_Karachi" ) echo 'selected' ; ?> value="Iqra_University_Karachi"> Iqra University Karachi </option>  
                                                <option <?php if ($educations->title == "Isra_University_Hyderabad" ) echo 'selected' ; ?> value="Isra_University_Hyderabad"> Isra University Hyderabad </option>  
                                                <option <?php if ($educations->title == "Jinnah_University_for_Women_Karachi" ) echo 'selected' ; ?> value="Jinnah_University_for_Women_Karachi"> Jinnah University for Women Karachi </option>  
                                                <option <?php if ($educations->title == "Karachi_Institute_of_Economics_&amp;_Technology__KIET__Karachi" ) echo 'selected' ; ?> value="Karachi_Institute_of_Economics_&amp;_Technology__KIET__Karachi"> Karachi Institute of Economics &amp; Technology  KIET  Karachi </option>  
                                                <option <?php if ($educations->title == "KASB__Khadim_Ali_Shah_Bukhari__Institute_of_Technology_Karachi" ) echo 'selected' ; ?> value="KASB__Khadim_Ali_Shah_Bukhari__Institute_of_Technology_Karachi"> KASB  Khadim Ali Shah Bukhari  Institute of Technology Karachi </option>  
                                                <option <?php if ($educations->title == "Liaquat_University_of_Medical_and_Health_Sciences__LUMHS__Jamshoro_Sindh" ) echo 'selected' ; ?> value="Liaquat_University_of_Medical_and_Health_Sciences__LUMHS__Jamshoro_Sindh"> Liaquat University of Medical and Health Sciences  LUMHS  Jamshoro Sindh </option>  
                                                <option <?php if ($educations->title == "Mehran_University_of_Eng_&amp;_Technology_Jamshoro" ) echo 'selected' ; ?> value="Mehran_University_of_Eng_&amp;_Technology_Jamshoro"> Mehran University of Eng &amp; Technology Jamshoro </option>  
                                                <option <?php if ($educations->title == "Mohammad_Ali_Jinnah_University__MAJU__Karachi" ) echo 'selected' ; ?> value="Mohammad_Ali_Jinnah_University__MAJU__Karachi"> Mohammad Ali Jinnah University  MAJU  Karachi </option>  
                                                <option <?php if ($educations->title == "NED_University_of_Engineering_&amp;_Technology_Karachi" ) echo 'selected' ; ?> value="NED_University_of_Engineering_&amp;_Technology_Karachi"> NED University of Engineering &amp; Technology Karachi </option>  
                                                <option <?php if ($educations->title == "Newports_Institute_of_Communications_and_Economics_Karachi" ) echo 'selected' ; ?> value="Newports_Institute_of_Communications_and_Economics_Karachi"> Newports Institute of Communications and Economics Karachi </option>  
                                                <option <?php if ($educations->title == "Pakistan_Naval_Academy_Karachi" ) echo 'selected' ; ?> value="Pakistan_Naval_Academy_Karachi"> Pakistan Naval Academy Karachi </option>  
                                                <option <?php if ($educations->title == "Preston_Institute_of_Management_Sciences_and_Technology__PIMSAT__Karachi" ) echo 'selected' ; ?> value="Preston_Institute_of_Management_Sciences_and_Technology__PIMSAT__Karachi"> Preston Institute of Management Sciences and Technology  PIMSAT  Karachi </option>  
                                                <option <?php if ($educations->title == "Preston_University_Karachi" ) echo 'selected' ; ?> value="Preston_University_Karachi"> Preston University Karachi </option>  
                                                <option <?php if ($educations->title == "Quaid_e_Awam_University_of_Engineering_Science_&amp;_Technology_Nawabshah" ) echo 'selected' ; ?> value="Quaid_e_Awam_University_of_Engineering_Science_&amp;_Technology_Nawabshah"> Quaid e Awam University of Engineering Science &amp; Technology Nawabshah </option>  
                                                <option <?php if ($educations->title == "Shah_Abdul_Latif_University_Khairpur" ) echo 'selected' ; ?> value="Shah_Abdul_Latif_University_Khairpur"> Shah Abdul Latif University Khairpur </option>  
                                                <option <?php if ($educations->title == "Shaheed_Zulfikar_Ali_Bhutto_Institute_of_Science_&amp;_Technology__SZABIST__Karachi" ) echo 'selected' ; ?> value="Shaheed_Zulfikar_Ali_Bhutto_Institute_of_Science_&amp;_Technology__SZABIST__Karachi"> Shaheed Zulfikar Ali Bhutto Institute of Science &amp; Technology  SZABIST  Karachi </option>  
                                                <option <?php if ($educations->title == "Sindh_Agriculture_University_Tandojam" ) echo 'selected' ; ?> value="Sindh_Agriculture_University_Tandojam"> Sindh Agriculture University Tandojam </option>  
                                                <option <?php if ($educations->title == "Sir_Syed_University_of_Engg_&amp;_Technology__SSUET__Karachi" ) echo 'selected' ; ?> value="Sir_Syed_University_of_Engg_&amp;_Technology__SSUET__Karachi"> Sir Syed University of Engg &amp; Technology  SSUET  Karachi </option>  
                                                <option <?php if ($educations->title == "Sukkur_Institute_of_Business_Administration_Sukkur" ) echo 'selected' ; ?> value="Sukkur_Institute_of_Business_Administration_Sukkur"> Sukkur Institute of Business Administration Sukkur </option>  
                                                <option <?php if ($educations->title == "Textile_Institute_of_Pakistan__TIP__Karachi" ) echo 'selected' ; ?> value="Textile_Institute_of_Pakistan__TIP__Karachi"> Textile Institute of Pakistan  TIP  Karachi </option>  
                                                <option <?php if ($educations->title == "University_of_East_Hyderabad" ) echo 'selected' ; ?> value="University_of_East_Hyderabad"> University of East Hyderabad </option>  
                                                <option <?php if ($educations->title == "University_of_Karachi__UoK__Karachi" ) echo 'selected' ; ?> value="University_of_Karachi__UoK__Karachi"> University of Karachi  UoK  Karachi </option>  
                                                <option <?php if ($educations->title == "University_of_Sindh_Jamshoro" ) echo 'selected' ; ?> value="University_of_Sindh_Jamshoro"> University of Sindh Jamshoro </option>  
                                                <option <?php if ($educations->title == "Zia_ud_Din_Medical_University_Karachi" ) echo 'selected' ; ?> value="Zia_ud_Din_Medical_University_Karachi"> Zia ud Din Medical University Karachi </option>  
                                                <option <?php if ($educations->title == "Balochistan_University_of_Engineering_and_Technology_Khuzdar" ) echo 'selected' ; ?> value="Balochistan_University_of_Engineering_and_Technology_Khuzdar"> Balochistan University of Engineering and Technology Khuzdar </option>  
                                                <option <?php if ($educations->title == "Balochistan_University_of_Information_Technology_and_Management_Sciences_Quetta" ) echo 'selected' ; ?> value="Balochistan_University_of_Information_Technology_and_Management_Sciences_Quetta"> Balochistan University of Information Technology and Management Sciences Quetta </option>  
                                                <option <?php if ($educations->title == "Iqra_University_Quetta" ) echo 'selected' ; ?> value="Iqra_University_Quetta"> Iqra University Quetta </option>  
                                                <option <?php if ($educations->title == "Sardar_Bahadur_Khan_Women_University_Quetta" ) echo 'selected' ; ?> value="Sardar_Bahadur_Khan_Women_University_Quetta"> Sardar Bahadur Khan Women University Quetta </option>  
                                                <option <?php if ($educations->title == "University_of_Balochistan_Quetta" ) echo 'selected' ; ?> value="University_of_Balochistan_Quetta"> University of Balochistan Quetta </option>  
                                                <option <?php if ($educations->title == "Khyber_PakhtunkhwaÂ&nbsp;_formerly_NWFP" ) echo 'selected' ; ?> value="Khyber_PakhtunkhwaÂ&nbsp;_formerly_NWFP"> Khyber PakhtunkhwaÂ&nbsp; formerly NWFP </option>  
                                                <option <?php if ($educations->title == "Frontier_Women_University_Peshawar" ) echo 'selected' ; ?> value="Frontier_Women_University_Peshawar"> Frontier Women University Peshawar </option>  
                                                <option <?php if ($educations->title == "CECOS_University_of_Information_Technology_and_Emerging_Sciences_Peshawar" ) echo 'selected' ; ?> value="CECOS_University_of_Information_Technology_and_Emerging_Sciences_Peshawar"> CECOS University of Information Technology and Emerging Sciences Peshawar </option>  
                                                <option <?php if ($educations->title == "City_University_of_Science_&amp;_Information_Technology_Peshawar" ) echo 'selected' ; ?> value="City_University_of_Science_&amp;_Information_Technology_Peshawar"> City University of Science &amp; Information Technology Peshawar </option>  
                                                <option <?php if ($educations->title == "Gandhara_University_Peshawar" ) echo 'selected' ; ?> value="Gandhara_University_Peshawar"> Gandhara University Peshawar </option>  
                                                <option <?php if ($educations->title == "Ghulam_Ishaq_Khan_Institute_of_Engineering_Sciences_&amp;_Technology_Swabi" ) echo 'selected' ; ?> value="Ghulam_Ishaq_Khan_Institute_of_Engineering_Sciences_&amp;_Technology_Swabi"> Ghulam Ishaq Khan Institute of Engineering Sciences &amp; Technology Swabi </option>  
                                                <option <?php if ($educations->title == "Gomal_University_DI_Khan" ) echo 'selected' ; ?> value="Gomal_University_DI_Khan"> Gomal University DI Khan </option>  
                                                <option <?php if ($educations->title == "Hazara_University_Dodhial_Mansehra" ) echo 'selected' ; ?> value="Hazara_University_Dodhial_Mansehra"> Hazara University Dodhial Mansehra </option>  
                                                <option <?php if ($educations->title == "Institute_of_Management_Sciences__IMSciences__Peshawar" ) echo 'selected' ; ?> value="Institute_of_Management_Sciences__IMSciences__Peshawar"> Institute of Management Sciences  IMSciences  Peshawar </option>  
                                                <option <?php if ($educations->title == "Karakuram_International_University_Gilgit" ) echo 'selected' ; ?> value="Karakuram_International_University_Gilgit"> Karakuram International University Gilgit </option>  
                                                <option <?php if ($educations->title == "Kohat_University_of_Science_&amp;_Technology__KUST__Kohat" ) echo 'selected' ; ?> value="Kohat_University_of_Science_&amp;_Technology__KUST__Kohat"> Kohat University of Science &amp; Technology  KUST  Kohat </option>  
                                                <option <?php if ($educations->title == "Lasbelaa_University_of_Agriculture_Water_&amp;_Marine_Science_Othal" ) echo 'selected' ; ?> value="Lasbelaa_University_of_Agriculture_Water_&amp;_Marine_Science_Othal"> Lasbelaa University of Agriculture Water &amp; Marine Science Othal </option>  
                                                <option <?php if ($educations->title == "Northern_University_Nowshera_Cantonment" ) echo 'selected' ; ?> value="Northern_University_Nowshera_Cantonment"> Northern University Nowshera Cantonment </option>  
                                                <option <?php if ($educations->title == "NWFP_Agriculture_University_Peshawar" ) echo 'selected' ; ?> value="NWFP_Agriculture_University_Peshawar"> NWFP Agriculture University Peshawar </option>  
                                                <option <?php if ($educations->title == "NWFP_University_of_Engineering_&amp;_Technology_Peshawar" ) echo 'selected' ; ?> value="NWFP_University_of_Engineering_&amp;_Technology_Peshawar"> NWFP University of Engineering &amp; Technology Peshawar </option>  
                                                <option <?php if ($educations->title == "Pakistan_Military_Academy_Abbottabad" ) echo 'selected' ; ?> value="Pakistan_Military_Academy_Abbottabad"> Pakistan Military Academy Abbottabad </option>  
                                                <option <?php if ($educations->title == "Preston_University_Kohat" ) echo 'selected' ; ?> value="Preston_University_Kohat"> Preston University Kohat </option>  
                                                <option <?php if ($educations->title == "Qurtaba_University_of_Science_&amp;_Information_Technology_D_I_Khan" ) echo 'selected' ; ?> value="Qurtaba_University_of_Science_&amp;_Information_Technology_D_I_Khan"> Qurtaba University of Science &amp; Information Technology D I Khan </option>  
                                                <option <?php if ($educations->title == "Sarhad_University_of_Science_&amp;_Information_Technology_Peshawar__Approved_Distance_Education_Centers_of__SUIT__Peshawar" ) echo 'selected' ; ?> value="Sarhad_University_of_Science_&amp;_Information_Technology_Peshawar__Approved_Distance_Education_Centers_of__SUIT__Peshawar"> Sarhad University of Science &amp; Information Technology Peshawar  Approved Distance Education Centers of  SUIT  Peshawar </option>  
                                                <option <?php if ($educations->title == "University_of_Malakand_Chakdara_Dir_Malakand" ) echo 'selected' ; ?> value="University_of_Malakand_Chakdara_Dir_Malakand"> University of Malakand Chakdara Dir Malakand </option>  
                                                <option <?php if ($educations->title == "University_of_Peshawar_Peshawar" ) echo 'selected' ; ?> value="University_of_Peshawar_Peshawar"> University of Peshawar Peshawar </option>  
                                                <option <?php if ($educations->title == "University_of_Science_&amp;_Technology_Bannu" ) echo 'selected' ; ?> value="University_of_Science_&amp;_Technology_Bannu"> University of Science &amp; Technology Bannu </option>  
                                                <option <?php if ($educations->title == $educations->institute ) echo 'selected' ; ?> value="$educations->title"> <?php echo e($educations->institute); ?> </option>
                                                <option value="Other"> Other </option>
                                              </select><!-- -->
                                              <input type="text" class="form-control university_text_name_<?php echo e($university_inc); ?>" id="universityname_textbox" style="display: none;">
                                              <label class="control-label close_university_name close_university_name_<?php echo e($university_inc); ?>" id="<?php echo e($university_inc); ?>" style="display: none;">Close</label>
                                              <!-- <a href="#" class="closeOther" style="display: none;">close</a> -->
                                          </div><!-- col-md-4 -->
                                          <div class="col-md-2 university_qua_<?php echo e($university_inc); ?>">
                                              <label class="control-label">Qualification <span class="required">*</span></label>
                                              <select name="universityQualification[]" class="universityQ slct_uniqual form-control" data-rowid=<?php echo e($university_inc); ?> data-university_dd_qua='university_qua_dd<?php echo e($university_inc); ?> ' id="universityQ" >
                                                <option <?php if ($educations->qualification == "Bachelor_in_Business_Administration" ) echo 'selected' ; ?>  value="Bachelor_in_Business_Administration"> Bachelor in Business Administration </option>
                                                <option <?php if ($educations->qualification == "$educations->qualification" ) echo 'selected' ; ?>  value="<?php echo e($educations->qualification); ?>"><?php echo e($educations->qualification); ?></option>
                                                <option <?php if ($educations->qualification == "Bachelor_in_Commerce_Honours" ) echo 'selected' ; ?> value="Bachelor_in_Commerce_Honours"> Bachelor  in Commerce Honours </option>  
                                                <option <?php if ($educations->qualification == "Bachelor_in_Engineering" ) echo 'selected' ; ?> value="Bachelor_in_Engineering"> Bachelor in Engineering </option>  
                                                <option <?php if ($educations->qualification == "Bachelor_in_Science_Engineering" ) echo 'selected' ; ?> value="Bachelor_in_Science_Engineering"> Bachelor in Science Engineering </option>  
                                                <option <?php if ($educations->qualification == "in_Science_Honours" ) echo 'selected' ; ?> value="Bachelor_ in_Science_Honours"> Bachelor  in Science Honours </option>  
                                                <option <?php if ($educations->qualification == "Bachelor_in_Education" ) echo 'selected' ; ?> value="Bachelor_in_Education"> Bachelor in Education </option>  
                                                <option <?php if ($educations->qualification == "Bachelor_in_Fine_Arts" ) echo 'selected' ; ?> value="Bachelor_in_Fine_Arts"> Bachelor in Fine Arts </option>  
                                                <option <?php if ($educations->qualification == "Bachelor_in_Pharmacy" ) echo 'selected' ; ?> value="Bachelor_in_Pharmacy"> Bachelor in Pharmacy </option>  
                                                <option <?php if ($educations->qualification == "Bachelor_in_Science" ) echo 'selected' ; ?> value="Bachelor_in_Science"> Bachelor in Science </option>  
                                                <option <?php if ($educations->qualification == "Doctor_in_Pharmacy" ) echo 'selected' ; ?> value="Doctor_in_Pharmacy"> Doctor in Pharmacy </option>  
                                                <option <?php if ($educations->qualification == "Bachelor_in_Dental_Surgery" ) echo 'selected' ; ?> value="Bachelor_in_Dental_Surgery"> Bachelor in Dental Surgery </option>  
                                                <option <?php if ($educations->qualification == "Doctor_in_Veterinary_Medicine" ) echo 'selected' ; ?> value="Doctor_in_Veterinary_Medicine"> Doctor in Veterinary Medicine </option>  
                                                <option <?php if ($educations->qualification == "Bachelor_in_Law" ) echo 'selected' ; ?> value="Bachelor_in_Law"> Bachelor in Law </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Accounting" ) echo 'selected' ; ?> value="Masters_in_Accounting"> Masters in Accounting </option>  
                                                <option <?php if ($educations->qualification == "Master_in_Advertising" ) echo 'selected' ; ?> value="Master_in_Advertising"> Master in Advertising </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Agriculture" ) echo 'selected' ; ?> value="Masters_in_Agriculture"> Masters in Agriculture </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_ArtÂ&nbsp;andÂ&nbsp;Design" ) echo 'selected' ; ?> value="Masters_in_ArtÂ&nbsp;andÂ&nbsp;Design"> Masters in ArtÂ&nbsp;andÂ&nbsp;Design </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Biochemistry" ) echo 'selected' ; ?> value="Masters_in_Biochemistry"> Masters in Biochemistry </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_CivilÂ&nbsp;Engineering" ) echo 'selected' ; ?> value="Masters_in_CivilÂ&nbsp;Engineering"> Masters in CivilÂ&nbsp;Engineering </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Botany" ) echo 'selected' ; ?> value="Masters_in_Botany"> Masters in Botany </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Journalism" ) echo 'selected' ; ?> value="Masters_in_Journalism"> Masters in Journalism </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Business_Administration_Management" ) echo 'selected' ; ?> value="Masters_in_Business_Administration_Management"> Masters in Business Administration Management </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Chemical_Engineering" ) echo 'selected' ; ?> value="Masters_in_Chemical_Engineering"> Masters in Chemical Engineering </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Chemistry" ) echo 'selected' ; ?> value="Masters_in_Chemistry"> Masters in Chemistry </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Commerce" ) echo 'selected' ; ?> value="Masters_in_Commerce"> Masters in Commerce </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Communication" ) echo 'selected' ; ?> value="Masters_in_Communication"> Masters in Communication </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_ComputerÂ&nbsp;Science" ) echo 'selected' ; ?> value="Masters_in_ComputerÂ&nbsp;Science"> Masters in ComputerÂ&nbsp;Science </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Consulting" ) echo 'selected' ; ?> value="Masters_in_Consulting"> Masters in Consulting </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Mechanical_Engineering" ) echo 'selected' ; ?> value="Masters_in_Mechanical_Engineering"> Masters in Mechanical Engineering </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Economics" ) echo 'selected' ; ?> value="Masters_in_Economics"> Masters in Economics </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Education" ) echo 'selected' ; ?> value="Masters_in_Education"> Masters in Education </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Electrical_and_Electronics_Engineering" ) echo 'selected' ; ?> value="Masters_in_Electrical_and_Electronics_Engineering"> Masters in Electrical and Electronics Engineering </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_English_Literature" ) echo 'selected' ; ?> value="Masters_in_English_Literature"> Masters in English Literature </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_English_Linguistics" ) echo 'selected' ; ?> value="Masters_in_English_Linguistics"> Masters in English Linguistics </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Environmental_Health" ) echo 'selected' ; ?> value="Masters_in_Environmental_Health"> Masters in Environmental Health </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Library_Science" ) echo 'selected' ; ?> value="Masters_in_Library_Science"> Masters in Library Science </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Fashion_Merchandising" ) echo 'selected' ; ?> value="Masters_in_Fashion_Merchandising"> Masters in Fashion Merchandising </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Finance_Accounting" ) echo 'selected' ; ?> value="Masters_in_Finance_Accounting"> Masters in Finance Accounting </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Finance_&amp;_Banking" ) echo 'selected' ; ?> value="Masters_in_Finance_&amp;_Banking"> Masters in Finance &amp; Banking </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Finance" ) echo 'selected' ; ?> value="Masters_in_Finance"> Masters in Finance </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Food_Science" ) echo 'selected' ; ?> value="Masters_in_Food_Science"> Masters in Food Science </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Materials_Science" ) echo 'selected' ; ?> value="Masters_in_Materials_Science"> Masters in Materials Science </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Geography" ) echo 'selected' ; ?> value="Masters_in_Geography"> Masters in Geography </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Geology" ) echo 'selected' ; ?> value="Masters_in_Geology"> Masters in Geology </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Health_Science" ) echo 'selected' ; ?> value="Masters_in_Health_Science"> Masters in Health Science </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_History" ) echo 'selected' ; ?> value="Masters_in_History"> Masters in History </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Human_Resources" ) echo 'selected' ; ?> value="Masters_in_Human_Resources"> Masters in Human Resources </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Humanities" ) echo 'selected' ; ?> value="Masters_in_Humanities"> Masters in Humanities </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Information_Technology" ) echo 'selected' ; ?> value="Masters_in_Information_Technology"> Masters in Information Technology </option>
                                                <option <?php if ($educations->qualification == "Masters_in_Logistics" ) echo 'selected' ; ?> value="Masters_in_Logistics"> Masters in Logistics </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_International_Business" ) echo 'selected' ; ?> value="Masters_in_International_Business"> Masters in International Business </option>
                                                <option <?php if ($educations->qualification == "Masters_in_Islamic_Studies" ) echo 'selected' ; ?> value="Masters_in_Islamic_Studies"> Masters in Islamic Studies </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Law" ) echo 'selected' ; ?> value="Masters_in_Law"> Masters in Law </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Management" ) echo 'selected' ; ?> value="Masters_in_Management"> Masters in Management </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Marketing" ) echo 'selected' ; ?> value="Masters_in_Marketing"> Masters in Marketing </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Mathematics" ) echo 'selected' ; ?> value="Masters_in_Mathematics"> Masters in Mathematics </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Nursing" ) echo 'selected' ; ?> value="Masters_in_Nursing"> Masters in Nursing </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Paramedical" ) echo 'selected' ; ?> value="Masters_in_Paramedical"> Masters in Paramedical </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Pharmacy" ) echo 'selected' ; ?> value="Masters_in_Pharmacy"> Masters in Pharmacy </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Philosophy" ) echo 'selected' ; ?> value="Masters_in_Philosophy"> Masters in Philosophy </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Physics" ) echo 'selected' ; ?> value="Masters_in_Physics"> Masters in Physics </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Psychology" ) echo 'selected' ; ?> value="Masters_in_Psychology"> Masters in Psychology </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Public_Health_Education" ) echo 'selected' ; ?> value="Masters_in_Public_Health_Education"> Masters in Public Health Education </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Risk_Management" ) echo 'selected' ; ?> value="Masters_in_Risk_Management"> Masters in Risk Management </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Science" ) echo 'selected' ; ?> value="Masters_in_Science"> Masters in Science </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Social_Studies" ) echo 'selected' ; ?> value="Masters_in_Social_Studies"> Masters in Social Studies </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Sociology" ) echo 'selected' ; ?> value="Masters_in_Sociology"> Masters in Sociology </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Software_Engineering" ) echo 'selected' ; ?> value="Masters_in_Software_Engineering"> Masters in Software Engineering </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Sports" ) echo 'selected' ; ?> value="Masters_in_Sports"> Masters in Sports </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Statistics" ) echo 'selected' ; ?> value="Masters_in_Statistics"> Masters in Statistics </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Strategic_Management" ) echo 'selected' ; ?> value="Masters_in_Strategic_Management"> Masters in Strategic Management </option>  
                                                <option <?php if ($educations->qualification == "Masters_in_Zoology" ) echo 'selected' ; ?> value="Masters_in_Zoology"> Masters in Zoology </option>  
                                                <option value="Other"> Other </option>

                                              </select><!-- -->
                                              <input type="text" class="form-control university_text_qualification_<?php echo e($university_inc); ?>" style="display: none;">
                                              <label class="control-label close_university_qua close_university_qua_<?php echo e($university_inc); ?>" id="<?php echo e($university_inc); ?>" style="display: none;">Close</label> 
                                              <!-- <a href="#" class="closeOther" style="display: none;">close</a> -->
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 university_sub_<?php echo e($university_inc); ?>">
                                              <label class="control-label">Subject <span class="required">*</span></label>
                                              <select name="universitySubject[]" class="universityS slct_unisubjct form-control" data-rowid=<?php echo e($university_inc); ?> data-university_dd_sub='university_sub_dd<?php echo e($university_inc); ?> ' id="universityS">
                                                <option <?php if ($educations->subjects == $educations->subjects ) echo 'selected' ; ?> value="$educations->subjects"> <?php echo e($educations->subjects); ?> </option>
                                                <option <?php if ($educations->subjects == "Accounting" ) echo 'selected' ; ?> value="Accounting"> Accounting </option>  
                                                <option <?php if ($educations->subjects == "Additional_Mathematics" ) echo 'selected' ; ?> value="Additional_Mathematics"> Additional Mathematics </option>
                                                <option <?php if ($educations->subjects == "Advertising" ) echo 'selected' ; ?> value="Advertising"> Advertising </option>  
                                                <option <?php if ($educations->subjects == "Agriculture" ) echo 'selected' ; ?> value="Agriculture"> Agriculture </option>  
                                                <option <?php if ($educations->subjects == "Art_and_Design" ) echo 'selected' ; ?> value="Art_and_Design"> Art and Design </option>  
                                                <option <?php if ($educations->subjects == "Biochemistry" ) echo 'selected' ; ?> value="Biochemistry"> Biochemistry </option>  
                                                <option <?php if ($educations->subjects == "Biology" ) echo 'selected' ; ?> value="Biology"> Biology </option>  
                                                <option <?php if ($educations->subjects == "Botany" ) echo 'selected' ; ?> value="Botany"> Botany </option>  
                                                <option <?php if ($educations->subjects == "Business_Studies" ) echo 'selected' ; ?> value="Business_Studies"> Business Studies </option>  
                                                <option <?php if ($educations->subjects == "Chemical" ) echo 'selected' ; ?> value="Chemical"> Chemical </option>  
                                                <option <?php if ($educations->subjects == "Chemistry" ) echo 'selected' ; ?> value="Chemistry"> Chemistry </option>  
                                                <option <?php if ($educations->subjects == "Commerce" ) echo 'selected' ; ?> value="Commerce"> Commerce </option>  
                                                <option <?php if ($educations->subjects == "Communication" ) echo 'selected' ; ?> value="Communication"> Communication </option>  
                                                <option <?php if ($educations->subjects == "Computer_Science" ) echo 'selected' ; ?> value="Computer_Science"> Computer Science </option>  
                                                <option <?php if ($educations->subjects == "Economics" ) echo 'selected' ; ?> value="Economics"> Economics </option>  
                                                <option <?php if ($educations->subjects == "Education" ) echo 'selected' ; ?> value="Education"> Education </option>  
                                                <option <?php if ($educations->subjects == "Electrical_and_Electronics" ) echo 'selected' ; ?> value="Electrical_and_Electronics"> Electrical and Electronics </option>  
                                                <option <?php if ($educations->subjects == "English" ) echo 'selected' ; ?> value="English"> English </option>  
                                                <option <?php if ($educations->subjects == "English_Language" ) echo 'selected' ; ?> value="English_Language"> English Language </option>  
                                                <option <?php if ($educations->subjects == "English_Literature" ) echo 'selected' ; ?> value="English_Literature"> English Literature </option>  
                                                <option <?php if ($educations->subjects == "Environmental_Management" ) echo 'selected' ; ?> value="Environmental_Management"> Environmental Management </option>  
                                                <option <?php if ($educations->subjects == "Environmental_Health" ) echo 'selected' ; ?> value="Environmental_Health"> Environmental Health </option>  
                                                <option <?php if ($educations->subjects == "Finance" ) echo 'selected' ; ?> value="Finance"> Finance </option>  
                                                <option <?php if ($educations->subjects == "Food_&amp;_Nutrition" ) echo 'selected' ; ?> value="Food_&amp;_Nutrition"> Food &amp; Nutrition </option>  
                                                <option <?php if ($educations->subjects == "Food_Science" ) echo 'selected' ; ?> value="Food_Science"> Food Science </option>  
                                                <option <?php if ($educations->subjects == "Geography" ) echo 'selected' ; ?> value="Geography"> Geography </option>  
                                                <option <?php if ($educations->subjects == "Geology" ) echo 'selected' ; ?> value="Geology"> Geology </option>  
                                                <option <?php if ($educations->subjects == "Health_Science" ) echo 'selected' ; ?> value="Health_Science"> Health Science </option>  
                                                <option <?php if ($educations->subjects == "History" ) echo 'selected' ; ?> value="History"> History </option>  
                                                <option <?php if ($educations->subjects == "Human_&amp;_Social_Biology" ) echo 'selected' ; ?> value="Human_&amp;_Social_Biology"> Human &amp; Social Biology </option>  
                                                <option <?php if ($educations->subjects == "Human_Resources" ) echo 'selected' ; ?> value="Human_Resources"> Human Resources </option>  
                                                <option <?php if ($educations->subjects == "Humanities" ) echo 'selected' ; ?> value="Humanities"> Humanities </option>  
                                                <option <?php if ($educations->subjects == "Information_Technology" ) echo 'selected' ; ?> value="Information_Technology"> Information Technology </option>  
                                                <option <?php if ($educations->subjects == "International_Business" ) echo 'selected' ; ?> value="International_Business"> International Business </option>  
                                                <option <?php if ($educations->subjects == "Islamic_Studies" ) echo 'selected' ; ?> value="Islamic_Studies"> Islamic Studies </option>  
                                                <option <?php if ($educations->subjects == "Islamiyat" ) echo 'selected' ; ?> value="Islamiyat"> Islamiyat </option>  
                                                <option <?php if ($educations->subjects == "Journalism" ) echo 'selected' ; ?> value="Journalism"> Journalism </option>  
                                                <option <?php if ($educations->subjects == "Law" ) echo 'selected' ; ?> value="Law"> Law </option>  
                                                <option <?php if ($educations->subjects == "Library_Science" ) echo 'selected' ; ?> value="Library_Science"> Library Science </option>  
                                                <option <?php if ($educations->subjects == "Logistics" ) echo 'selected' ; ?> value="Logistics"> Logistics </option>  
                                                <option <?php if ($educations->subjects == "Management" ) echo 'selected' ; ?> value="Management"> Management </option>  
                                                <option <?php if ($educations->subjects == "Marketing" ) echo 'selected' ; ?> value="Marketing"> Marketing </option>  
                                                <option <?php if ($educations->subjects == "Mathematics" ) echo 'selected' ; ?> value="Mathematics"> Mathematics </option>  
                                                <option <?php if ($educations->subjects == "Nursing" ) echo 'selected' ; ?> value="Nursing"> Nursing </option>  
                                                <option <?php if ($educations->subjects == "Pakistan_Studies" ) echo 'selected' ; ?> value="Pakistan_Studies"> Pakistan Studies </option>  
                                                <option <?php if ($educations->subjects == "Paramedical" ) echo 'selected' ; ?> value="Paramedical"> Paramedical </option>  
                                                <option <?php if ($educations->subjects == "Pharmacy" ) echo 'selected' ; ?> value="Pharmacy"> Pharmacy </option>  
                                                <option <?php if ($educations->subjects == "Philosophy" ) echo 'selected' ; ?> value="Philosophy"> Philosophy </option>  
                                                <option <?php if ($educations->subjects == "Physics" ) echo 'selected' ; ?> value="Physics"> Physics </option>  
                                                <option <?php if ($educations->subjects == "Psychology" ) echo 'selected' ; ?> value="Psychology"> Psychology </option>  
                                                <option <?php if ($educations->subjects == "Public_Health" ) echo 'selected' ; ?> value="Public_Health"> Public Health </option>  
                                                <option <?php if ($educations->subjects == "Risk_Management" ) echo 'selected' ; ?> value="Risk_Management"> Risk Management </option>  
                                                <option <?php if ($educations->subjects == "Science" ) echo 'selected' ; ?> value="Science"> Science </option>  
                                                <option <?php if ($educations->subjects == "Sindhi" ) echo 'selected' ; ?> value="Sindhi"> Sindhi </option>  
                                                <option <?php if ($educations->subjects == "Social_Studies" ) echo 'selected' ; ?> value="Social_Studies"> Social Studies </option>  
                                                <option <?php if ($educations->subjects == "Sociology" ) echo 'selected' ; ?> value="Sociology"> Sociology </option>  
                                                <option <?php if ($educations->subjects == "Sports" ) echo 'selected' ; ?> value="Sports"> Sports </option>  
                                                <option <?php if ($educations->subjects == "Statistics" ) echo 'selected' ; ?> value="Statistics"> Statistics </option>  
                                                <option <?php if ($educations->subjects == "Strategic_Management" ) echo 'selected' ; ?> value="Strategic_Management"> Strategic Management </option>  
                                                <option <?php if ($educations->subjects == "Urdu" ) echo 'selected' ; ?> value="Urdu"> Urdu </option>  
                                                <option <?php if ($educations->subjects == "Urdu_First_Language" ) echo 'selected' ; ?> value="Urdu_First_Language"> Urdu First Language </option>  
                                                <option <?php if ($educations->subjects == "Urdu_Second_Language" ) echo 'selected' ; ?> value="Urdu_Second_Language"> Urdu Second Language </option>  
                                                <option <?php if ($educations->subjects == "World_history" ) echo 'selected' ; ?> value="World_history"> World history </option>  
                                                <option <?php if ($educations->subjects == "Zoology" ) echo 'selected' ; ?> value="Zoology"> Zoology </option>  
                                                <option value="Other"> Other </option>

                                              </select><!-- -->
                                              <input type="text" class="form-control university_text_subject_<?php echo e($university_inc); ?>" style="display: none;">
                                              <label class="control-label close_university_sub close_university_sub_<?php echo e($university_inc); ?>" id="<?php echo e($university_inc); ?>" style="display: none;">Close</label> 
                                              <!-- <a href="#" class="closeOther" style="display: none;">close</a> -->
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 university_result_<?php echo e($university_inc); ?>">
                                              <label class="control-label">Result <span class="required">*</span></label>
                                              <input type="text" class="form-control" name="" id="result_university<?php echo e($university_inc); ?>" value="<?php echo e($educations->result); ?>">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 university_year_<?php echo e($university_inc); ?>">
                                              <label class="control-label">Year <span class="required">*</span></label>
                                              <input type="text" class="form-control university_year" name="" id="university_year" value="<?php echo e($educations->year_of_completion); ?>">
                                          </div><!-- col-md-2 -->
                                        </div>
                                      </div><!-- form-body -->
                                    </div>
                                    <!-- row -->
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Add another University --> 
                                    <div class="new_row_university"></div>
                                    <div class="row">
                                      <div class="col-md-12 text-right">
                                        <div class="col-md-12">
                                          <!-- <a href="#" class="btn btn-group green">+ Add University</a> -->
                                          <input type="button" id="add_other_university"  value="+ Add Another University" class="btn btn-group green university_btn" name="addAnotherUniversity">
                                        </div><!-- col-md-12 -->
                                      </div><!-- col-md-12 -->
                                    </div><!-- row -->
                                    <!-------------------------------------------- Professional ----------------------------------------------------------->
                                    <h4 class="form-section headingBorderBottom Professional">Professional</h4>
                                    <?php $professional=1; ?>
                                    <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($educations->level==4): ?>
                                    <div class="row professional_row" style="padding-bottom: 20px;" id="add_professional_more">
                                      <div class="form-body">
                                        <?php $professional_inc=$professional++; ?>
                                        <div class="col-md-12 professional_row_<?php echo e($professional_inc); ?>" >
                                          <div class="col-md-4 professional_name_<?php echo e($professional_inc); ?>" >
                                              <label class="control-label">Professional Name <span class="required">*</span></label>
                                              <input type="text" class="form-control professional_text_name_<?php echo e($professional_inc); ?>" id="professional_name" value="<?php echo e($educations->institute); ?>">
                                          </div><!-- col-md-4 -->
                                          <div class="col-md-2 professional_qua_<?php echo e($professional_inc); ?>">
                                              <label class="control-label">Qualification <span class="required">*</span></label>
                                              <input type="text" class="professionalQ form-control professional_text_qualification_<?php echo e($professional_inc); ?>" id="professionalQ" value="<?php echo e($educations->qualification); ?>">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 professional_sub_<?php echo e($professional_inc); ?>">
                                              <label class="control-label">Subject <span class="required">*</span></label>
                                              <input type="text" class="form-control professional_text_subject_<?php echo e($professional_inc); ?>" id="professionalS" value="<?php echo e($educations->subjects); ?>">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 professional_result_<?php echo e($professional_inc); ?>">
                                              <label class="control-label">Result <span class="required">*</span></label>
                                              <input type="text" class="form-control professional_result_<?php echo e($professional_inc); ?>" name="" id="result_professional" value="<?php echo e($educations->result); ?>">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 professional_year_<?php echo e($professional_inc); ?>">
                                              <label class="control-label">Year <span class="required">*</span></label>
                                              <input type="text" class="form-control professional_year" name="" id="year_professional" value="<?php echo e($educations->year_of_completion); ?>">
                                          </div><!-- col-md-2 -->
                                        </div>
                                      </div><!-- form-body -->
                                    </div>
                                    <!-- row -->
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Add another Professional --> 
                                    <div class="new_row_professional"></div>
                                    <div class="row">
                                      <div class="col-md-12 text-right">
                                        <div class="col-md-12">
                                          <!-- <a href="#" class="btn btn-group green">+ Add Professional</a> -->
                                          <input type="button" id="add_other_professional"  value="+ Add Another Professional" class="btn btn-group green professional_btn" name="addAnotherProfessional">
                                        </div><!-- col-md-12 -->
                                      </div><!-- col-md-12 -->
                                    </div><!-- row -->
                                    <!---------------------------------------------------------- Others ---------------------------------------------------->
                                    <h4 class="form-section headingBorderBottom Others">Others</h4>
                                    <?php $others=1;
                                          $others_inc="";
                                     ?>
                                    <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($educations->level==5): ?>
                                    <div class="row others_row" style="padding-bottom: 20px;" id="add_others_more">
                                      <div class="form-body">
                                        <?php $others_inc=$others++; ?>
                                        <div class="col-md-12 others_row_<?php echo e($others_inc); ?>" >
                                          <div class="col-md-4 others_name_<?php echo e($others_inc); ?>" >
                                              <label class="control-label">Others Name <span class="required">*</span></label>
                                              <input type="text" value="<?php echo e($educations->institute); ?>" class="form-control college_text_name_<?php echo e($others_inc); ?>" id="others_name">
                                          </div><!-- col-md-4 -->
                                          <div class="col-md-2 others_qua_<?php echo e($others_inc); ?>">
                                              <label class="control-label">Qualification <span class="required">*</span></label>
                                              <input type="text" class="form-control others_text_qualification_<?php echo e($others_inc); ?>" id="othersQ" value="<?php echo e($educations->qualification); ?>">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 others_sub_<?php echo e($others_inc); ?>">
                                              <label class="control-label">Subject <span class="required">*</span></label>
                                              <input type="text" class="othersS form-control others_text_subject_<?php echo e($others_inc); ?>" id="othersS" value="<?php echo e($educations->subjects); ?>">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 others_result_<?php echo e($others_inc); ?>">
                                              <label class="control-label">Result <span class="required">*</span></label>
                                              <input type="text" class="form-control others_result_<?php echo e($others_inc); ?>" name="" id="result_others" value="<?php echo e($educations->result); ?>">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 others_year_<?php echo e($others_inc); ?>">
                                              <label class="control-label">Year <span class="required">*</span></label>
                                              <input type="text" class="form-control others_year" name="" id="others_year" value="<?php echo e($educations->year_of_completion); ?>">
                                          </div><!-- col-md-2 -->
                                        </div>
                                      </div><!-- form-body -->
                                    </div>
                                    <!-- row -->
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Add another Others --> 
                                    <div class="new_row_others"></div>
                                    <div class="row">
                                      <div class="col-md-12 text-right">
                                        <div class="col-md-12">
                                          <!-- <a href="#" class="btn btn-group green">+ Add Other</a> -->
                                          <input type="button" id="add_other_others"  value="+ Add Another Others" class="btn btn-group green others_btn" name="addAnotherOthers">
                                        </div><!-- col-md-12 -->
                                      </div><!-- col-md-12 -->
                                    </div><!-- row -->
                                  </form>
                                </div>
                                <!-- tab_education -->
                <script type="text/javascript">
                    $(document).ready(function()
                    {
                      // var schol_mask='.school_year_'+(parseInt(i)+1); 
                      // $(schol_mask).inputmask({"mask": "9999"});
                        $(".school_year").inputmask({"mask": "9999"});
                        $(".college_year").inputmask({"mask": "9999"});
                        $(".university_year").inputmask({"mask": "9999"});
                        $(".professional_year").inputmask({"mask": "9999"});
                        $(".others_year").inputmask({"mask": "9999"});
                     });
                </script>