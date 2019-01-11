                                   
                                    <div class="row others_row add_others_more_{{$next_div_id}}" style="padding-bottom: 20px;" id="add_others_more_{{$next_div_id}}">
                                      <div class="form-body">
                                        <div class="col-md-12 others_row_{{$next_div_id}}">
                                          <div class="col-md-4 others_name_{{$next_div_id}}">
                                              <label class="control-label">Others Name <span class="required">*</span></label>
                                              <input type="text" value="" class="form-control college_text_name_{{$next_div_id}}" id="others_name" placeholder="Enter Others Name">
                                          </div><!-- col-md-4 -->
                                          <div class="col-md-2 others_qua_{{$next_div_id}}">
                                              <label class="control-label">Qualification <span class="required">*</span></label>
                                              <input type="text" class="form-control others_text_qualification_{{$next_div_id}}" id="othersQ" value="" placeholder="Enter Qualification">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 others_sub_{{$next_div_id}}">
                                              <label class="control-label">Subject <span class="required">*</span></label>
                                              <input type="text" class="othersS form-control others_text_subject_{{$next_div_id}}" id="othersS" value="" placeholder="Enter Subject">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 others_result_{{$next_div_id}}">
                                              <label class="control-label">Result <span class="required">*</span></label>
                                              <input type="text" class="form-control others_result_{{$next_div_id}}" name="" id="result_others" value="" placeholder="Enter Result">
                                          </div><!-- col-md-2 -->
                                          <div class="col-md-2 others_year_{{$next_div_id}}">
                                              <label class="control-label">Year <span class="required">*</span></label>
                                              <input type="text" class="form-control others_year" name="" id="others_year" value="" placeholder="Enter Year">
                                              <button type="button" class="close_others_row close_others_row_{{$next_div_id}} btn btn-danger btn-remove" id="{{$next_div_id}}">Remove</button>
                                          </div><!-- col-md-2 -->
                                        </div>
                                      </div><!-- form-body -->
                                    </div>
                <script type="text/javascript">
                    $(document).ready(function()
                    {
                        $(".others_year").inputmask({"mask": "9999"});
                    });
                </script>