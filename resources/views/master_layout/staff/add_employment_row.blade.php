                                <div class="row emp_row add_emp_more_{{$next_div_id}}" id="add_emp_more_{{$next_div_id}}">
                                    <div class="form-body">
                                        <div class="col-md-12 emp_row_{{$next_div_id}}">
                                            <div class="col-md-6 emp_row_org_{{$next_div_id}}">
                                                <label class="control-label">Institution / Organization <span class="required">*</span></label>
                                                <input id="emp_org" data-rowid="{{$next_div_id}}" type="text" class="form-control emp_organization" name="" value="" placeholder="Enter Institution Name here: ">
                                            </div>
                                            <div class="col-md-6 emp_class_{{$next_div_id}}">
                                                <label class="control-label">Classes Taught <span class="required">*</span></label>
                                                <textarea id="emp_classes" class="form-control" rows="4" name="" value="" placeholder="Enter Classes Taught"></textarea>
                                            </div>
                                            <div class="col-md-3 emp_desg_{{$next_div_id}}">
                                                <label class="control-label">Designation <span class="required">*</span></label>
                                                <input id="emp_desg" type="text" class="form-control" name="" value="" placeholder="Enter Designation">
                                            </div>
                                            <div class="col-md-3 emp_salary_{{$next_div_id}}">
                                                <label class="control-label">Salary <span class="required">*</span></label>
                                                <input id="emp_salary" type="text" class="form-control emp_salary" name="" value="" placeholder="Enter Salary">
                                            </div>
                                            <div class="col-md-3 emp_fromdate_{{$next_div_id}}">
                                                <label class="control-label">From <span class="required">*</span></label>
                                                <input id="emp_fyear" type="text" class="form-control emp_fyear" name="" value="" placeholder="Enter From Date">
                                            </div>
                                            <div class="col-md-3 emp_todate_{{$next_div_id}}">
                                                <div class="toyear toyear_{{$next_div_id}}">
                                                <label class="control-label">To <span class="required">*</span></label>
                                                <input id="emp_tyear" type="text" class="form-control emp_tyear emp_pre_{{$next_div_id}}" name="" value="" placeholder="Enter Todate Here">
                                                </div>
                                                <input  type="checkbox" class="to_date_check to_date_check_{{$next_div_id}}" id="check_box" data-rowid="{{$next_div_id}}"> Present
                                            </div>
                                            <div class="col-md-6 emp_reason_{{$next_div_id}}">
                                                <label class="control-label">Reason for Leaving <span class="required">*</span></label>
                                                <textarea id="emp_reason" class="form-control" name="" rows="4" value="" placeholder="Enter Reason For Leaving"></textarea>
                                            </div>
                                            <div class="col-md-6 emp_subject_{{$next_div_id}}">
                                                <label class="control-label">Subjects Taught <span class="required">*</span></label>
                                                <textarea id="emp_subject" class="form-control" rows="4" name="" value="" placeholder="Enter Subjects"></textarea>
                                            </div>
                                            <div class="btn">
                                                <button type="button" class="close_employment_row close_professional_row_{{$next_div_id}} btn btn-danger btn-remove" id="{{$next_div_id}}">Remove</button>
                                           </div>
                                        </div><!-- col-md-6 -->                                
                                    </div>
                                </div><!-- col-md-6 -->
                                <hr />

<script type="text/javascript">
        $(document).ready(function()
        {
            $(".emp_tyear").inputmask({"mask": "9999"});
            $(".emp_fyear").inputmask({"mask": "9999"});
         });
</script>