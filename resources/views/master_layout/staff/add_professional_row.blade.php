                              
                                    <div class="row professional_row add_professional_more_{{$next_div_id}}" style="padding-bottom: 20px;" id="add_professional_more_{{$next_div_id}}">
                                      <div class="form-body">
                                        <div class="col-md-12 professional_row_{{$next_div_id}}">
                                          <div class="col-md-4  professional_name_{{$next_div_id}}">
                                              <label class="control-label">Professional Name <span class="required">*</span></label>
                                              <input type="text" class="form-control professional_text_name_{{$next_div_id}}" id="professional_name" value="" placeholder="Enter Professional Name">
                                          </div><!-- col-md-4 -->
                                          <div class="col-md-2 professional_qua_{{$next_div_id}}">
                                              <label class="control-label">Qualification <span class="required">*</span></label>
                                              <input type="text" class="professionalQ form-control professional_text_qualification_{{$next_div_id}}" id="professionalQ" value="" placeholder="Enter Qualification">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 professional_sub_{{$next_div_id}}">
                                              <label class="control-label">Subject <span class="required">*</span></label>
                                              <input type="text" class="form-control professional_text_subject_{{$next_div_id}}" id="professionalS" value="" placeholder="Enter Subject">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 professional_result_{{$next_div_id}}">
                                              <label class="control-label">Result <span class="required">*</span></label>
                                              <input type="text" class="form-control professional_result_{{$next_div_id}}" name="" id="result_professional"  value="" placeholder="Enter Result">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 professional_year_{{$next_div_id}}">
                                              <label class="control-label">Year <span class="required">*</span></label>
                                              <input type="text" class="form-control professional_year" name="" id="year_professional"  value="" placeholder="Enter Year">
                                              <button type="button" class="close_professional_row close_professional_row_{{$next_div_id}} btn btn-danger btn-remove" id="{{$next_div_id}}">Remove</button>
                                          </div><!-- col-md-2 -->
                                        </div>
                                      </div><!-- form-body -->
                                    </div>
                <script type="text/javascript">
                    $(document).ready(function()
                    {
                        $(".professional_year").inputmask({"mask": "9999"});
                    });
                </script>