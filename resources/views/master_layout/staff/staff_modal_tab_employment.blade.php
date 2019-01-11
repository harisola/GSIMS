                              <!-- zk tab_employment_edit Start -->
                                <div class="tab-pane" id="tab_employment_edit">
                                    <h3 class="form-section marginTop0 headingBorderBottom">Employment History</h3>
                                    <?php $emp_incre=0 ?>
                                    @foreach ($employment as $employments)
                                    <div class="row emp_row" id="add_emp_more">
                                    <div class="form-body">
                                    <?php $emp_inc=$emp_incre++; ?>
                                        <div class="col-md-12 emp_row_{{$emp_incre}}" data-rowid="{{$emp_incre}}">
                                            <div class="col-md-6 emp_row_org_{{$emp_incre}}">
                                                <label class="control-label">Institution / Organization <span class="required">*</span></label>
                                                <input id="emp_org" data-rowid="{{$emp_incre}}" type="text" class="form-control emp_organization" name="" value="{{$employments->organization}}" >
                                            </div>
                                            <div class="col-md-6 emp_class_{{$emp_incre}}">
                                                <label class="control-label">Classes Taught <span class="required">*</span></label>
                                                <textarea id="emp_classes" class="form-control" rows="4" name="" value="">{{$employments->classes_taught}}</textarea>
                                            </div>
                                            <div class="col-md-3 emp_desg_{{$emp_incre}}">
                                                <label class="control-label">Designation <span class="required">*</span></label>
                                                <input id="emp_desg" type="text" class="form-control" name="" value="{{$employments->designation}}">
                                            </div>
                                            <div class="col-md-3 emp_salary_{{$emp_incre}}">
                                                <label class="control-label">Salary <span class="required">*</span></label>
                                                <input id="emp_salary" type="text" class="form-control emp_salary" name="" value="{{$employments->salary}}">
                                            </div>
                                            <div class="col-md-3 emp_fromdate_{{$emp_incre}}">
                                                <label class="control-label">From <span class="required">*</span></label>
                                                <input id="emp_fyear" type="text" class="form-control emp_fyear" name="" value="{{$employments->from_year}}">
                                            </div>
                                            <div class="col-md-3 emp_todate_{{$emp_incre}}">
                                                <div class="toyear toyear_{{$emp_incre}}">
                                                <label class="control-label">To <span class="required">*</span></label>
                                                <input id="emp_tyear" type="text" class="form-control emp_tyear emp_pre_{{$emp_incre}}" name="" value="{{$employments->to_year}}">
                                                </div>
                                                <input  type="checkbox" class="to_date_check to_date_check_{{$emp_incre}}" id="check_box" data-rowid="{{$emp_incre}}"> Present
                                            </div>
                                            <div class="col-md-6 emp_reason_{{$emp_incre}}">
                                                <label class="control-label">Reason for Leaving <span class="required">*</span></label>
                                                <textarea id="emp_reason" class="form-control" name="" rows="4" value="">{{$employments->reason_for_leaving}}</textarea>
                                            </div>
                                            <div class="col-md-6 emp_subject_{{$emp_incre}}">
                                                <label class="control-label">Subjects Taught <span class="required">*</span></label>
                                                <textarea id="emp_subject" class="form-control" rows="4" name="" value="">{{$employments->subject_taught}}</textarea>
                                            </div>

                                        </div><!-- col-md-6 -->
                                    </div>
                                    </div><!-- col-md-6 -->
                                    <hr />
                                    @endforeach
                                    <div class="new_row_employment"></div>
                                    <div class="row">
                                            <div class="col-md-12 text-right" style="padding-top: 20px; padding-right: 30px;">
                                                <div class="col-md-12">
                                                    <input type="button" id="add_emp_school"  value="+ Add Another Institution" class="btn btn-group green emp_btn" name="addAnotherInstitution">
                                                </div><!-- col-md-12 -->
                                            </div>
                                    </div>                                 
                                </div><!-- form-body -->
<script type="text/javascript">
        $(document).ready(function()
        {
           //$(".emp_salary").inputmask({"mask": "9999"});
            $(".emp_tyear").inputmask({"mask": "9999"});
            $(".emp_fyear").inputmask({"mask": "9999"});
        
        });
</script>