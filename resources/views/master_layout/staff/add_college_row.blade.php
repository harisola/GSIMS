                                    <div class="row college_row add_college_more_{{$next_div_id}}" style="padding-bottom: 20px;" id="add_college_more_{{$next_div_id}}">
                                      <div class="form-body">
                                        <div class="col-md-12 college_row_{{$next_div_id}}" >
                                          <div class="col-md-4 college_name_{{$next_div_id}}">
                                              <label class="control-label">College Name <span class="required">*</span></label>
                                              <input type="text" class="form-control college_text_name_{{$next_div_id}}" id="college_name" value="" placeholder="Enter College Name">
                                          </div><!-- col-md-4 -->
                                          <div class="col-md-2 college_qua_{{$next_div_id}}">
                                              <label class="control-label">Qualification <span class="required">*</span></label>
                                              <select name="collegeQualification[]" class="collegeQ valid form-control" data-rowid={{$next_div_id}} data-college_dd_qua='college_qua_dd{{$next_div_id}} ' id="collegeQ">
                                                <option value="">Select Qualification</option>
                                                <option value="Intermediate"> Intermediate </option>
                                                <option value="Diploma"> Diploma </option>
                                                <option value="Other"> Other </option>
                                              </select><!-- -->
                                              <input type="text" class="form-control college_text_qualification_{{$next_div_id}}" id="txt_qualification" style="display: none;">
                                              <label class="control-label close_college_qua close_college_qua_{{$next_div_id}}" id="{{$next_div_id}}" style="display: none;">Close</label>
                                              <!-- <a href="#" class="closeOther" style="display: none;">close</a> -->
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 college_sub_{{$next_div_id}}">
                                              <label class="control-label">Subject <span class="required">*</span></label>
                                              <select name="collegeSubject[]" class="collegeS slct_clgSub valid form-control college_subject_{{$next_div_id}}" data-rowid={{$next_div_id}} data-college_dd_subject='college_sub_dd{{$next_div_id}} ' id="collegeS">
                                                <option value="">Select Subject</option>
                                                <option value="Pre_Engineering"> Pre Engineering </option>
                                                <option value="Pre_Medical"> Pre Medical </option>
                                                <option value="Computer"> Computer </option>
                                                <option value="Commerce"> Commerce </option>
                                                <option value="Arts"> Arts </option>
                                                <option value="Other"> Other </option>
                                              </select>
                                              <input type="text" class="form-control college_text_subject_{{$next_div_id}}" id="txt_subject"  style="display: none;">
                                              <label class="control-label close_college_sub close_college_sub_{{$next_div_id}}" id="{{$next_div_id}}" style="display: none;">Close</label>
                                              <!-- <a href="#" class="closeOther" style="display: none;">close</a> -->
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 college_result_{{$next_div_id}}">
                                              <label class="control-label">Result <span class="required">*</span></label>
                                              <input type="text" class="form-control college_result_{{$next_div_id}}" name="" id="result_college" value="" placeholder="Enter Result">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 college_year_{{$next_div_id}}">
                                              <label class="control-label">Year <span class="required">*</span></label>
                                              <input type="text" class="form-control college_year" name="" id="year_college" value="" placeholder="Enter Year">
                                              <button type="button" class="close_college_row close_college_row_{{$next_div_id}} btn btn-danger btn-remove" id="{{$next_div_id}}">Remove</button>
                                          </div><!-- col-md-2 -->
                                        </div> 
                                      </div><!-- form-body -->
                                    </div>
        <script type="text/javascript">
            $(document).ready(function()
            {                       
                $(".college_year").inputmask({"mask": "9999"});
             });
        </script>