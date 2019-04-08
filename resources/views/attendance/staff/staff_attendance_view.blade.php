
<style type="text/css">
.imageCenterDefault {
    background: #f3f3f3;
    width: 420px;
    border-radius: 50% !important;
    padding: 70px;
    margin: 0 auto;
    border: 1px solid #000;
    text-align: center;
}
.imageCenterDefaultParent {
    background: #f3f3f3;
    width: 160px;
    border-radius: 50% !important;
    padding: 0px;
    margin: 0 auto;
    border: 1px solid #000;
    text-align: center;
}	
.imageCenterDefaultChild {
    background: #f3f3f3;
    width: 100px;
    border-radius: 50% !important;
    padding: 0px;
    margin: 0 auto;
    border: 1px solid #000;
    text-align: center;
}   
.INImage {
	text-align: center;
}
.INImage img {
	border-radius: 50% !important;
	border:1px solid #000;
}
.timeShow.IN {
	background: green;
	color: #fff;
}
.timeShow.OUT {
	background: red;
	color: #fff;
}
.timeShow {
	background: #ccc;
    margin: 0 15%;
    font-size: 20px;
    padding: 10px 0;
}
.daypassBTN {
	float: right;
}
#StaffList_length {
	display: none !important;
}
#StaffList_filter {
	float: right;
}
.assignInterim {
	position: absolute;
    right: 0;
    top: -30px;
    z-index: 8;
    padding: 4px 15px;
}
#InterimCardTap {}
.modal-body {
	background: #fff;
}
.successAssign {
	text-align: center;
}
.successAssign .true {
	font-size: 140px;color: green;margin: 90px 0 0 0;
}
.failAssign {
	text-align: center;
}
.failAssign .false {
	font-size: 140px;color: red;margin: 90px 0 0 0;
}
#stafflist_ajax {
    width: 95%;
    position: absolute;
}
#stafflist_ajax .dropdown-menu {
    display: block;
    position: relative;
    margin: 30px 0 0 0;
    padding: 5px 5px;
    width: 100%;
	border: 1px solid #888;
    border-top: 0 none;
    box-shadow: none;
    max-height: 300px;
    overflow-y: scroll;
    overflow-x: none;
}
#stafflist_ajax li.staff_list_class {
    font-family: 'Conv_calibri';
    font-size: 14px;
    font-weight: normal !important;
    padding: 5px 0;
    cursor: pointer;
}
#StaffList_ZiaKashif_filter {
	float: right;
}
input#interim_dec{
    margin-top: 20px;
    background: #ffedaa;
    color: #000 !important;
}
input#interim_dec::placeholder {
    color: #585858 !important;
}
li.staff_list_class:hover {
    color: #3379b7;
}
li.student_list_class:hover {
    color: #3379b7;
}
#studentlist_ajax li.student_list_class {
    font-family: 'Conv_calibri';
    font-size: 14px;
    font-weight: normal !important;
    padding: 5px 0;
    cursor: pointer;
}
h4#error {
    color: black;
    position: absolute;
    top: 75px;
}
ul.childList {
    list-style: none;
    margin: 0;
    width: 100%;
    padding: 0;
}
ul.childList li.eachChild {
    display: inline;
}
.eachChild {
    padding: 0 10px;
}
.ChildName {
    font-size: 14px;
}
.childInfo {
    width: 20%;
    display: inline-block;
    font-size: 12px;
    margin-bottom: 20px;
}
.marginHead {
    margin-top: 0;
    padding-bottom: 10px;
}
.tapCardField{
    background: #ffedaa;
    color: #000 !important;
}
.form-actions {
    text-align: center;
    border-top: 1px solid #ccc;
    padding: 10px 0;
    margin-bottom: 20px;
}
#AdmissionDayPass,
#ApplicantDayPass,
#VendorDayPass,
#WorkerDayPass,
#GuestDayPass {
	display: none;
}
</style>
<div class="row" id="maindiv">
    <div class="col-md-3">
        <input type="number" name="rfid_dec" id="rfid_dec" autofocus value="" autocomplete="off" />
        <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>" / >
        <!-- <input type="text" name="location_id" id="location_id" value="0" /> -->
        <select name="location_id" id="location_id">
            <option> Select Location First</option>
            @foreach ($staff['attendance_location'] as $attendance_location)
            <option value="{{ $attendance_location->id }}">{{ $attendance_location->name }}</option>
            @endforeach 
        </select>
    </div><!-- col-md-3 -->

    <div class="col-md-6"> 
            <div class="portlet light bordered padding0 marginBottom0">
                <div class="portlet-title">
                    <div class="caption add_profile_label">
                        <span class="caption-subject font-dark sbold uppercase caption_subject_profile text-center">Card Tap - Screening Gate</span>
                    </div>
                    <input type="button" class="btn btn-group green daypassBTN" id="dayPass" value="Day Pass">
                    <input type="button" class="btn btn-group green daypassBTN" style="display: none;" id="backtoTap" value="Back to Tap">
                </div><!-- portlet-title -->
                <div class="portlet-body">
                    <div class="tapArea">
                        <div class="requestTapIn textCenter  rf_default">
                            <div class="row">
                                
                            </div>
                            <div class="imageCenterDefault">
                                <img src="http://10.10.10.50/gs/components/gs_theme/images/nfc_updated.png" width="160">
                            </div><!-- imageCenter -->
                            <div id="tapin_error"></div>
                        </div>
                        <h4 class="record_not_found" style="display: none;">Record Not Found </h4>
                        <!-- Tapin div -->
                        <div class="requestTapIn textCenter  rf_tapin">
                            <div class="INImage" >
                                <img id="tapin_photo" src="" width="410"><br><br>
                            </div><!-- imageCenter get_attendance-->
                            <h2 style="font-weight:normal;color:#000;" class="text-center" id="tapin_name">Muhammad Haris Ola </h2>
                            <div class="timeShow IN text-center" id="tapin_time"></div>
                        </div>
                        <!-- Tapout div -->
                        <div class="requestTapOut textCenter  rf_tapout">
                            <div class="INImage" >
                                <img id="tapout_photo" src="" width="410"><br><br>
                            </div><!-- imageCenter get_attendance-->
                            <h2 style="font-weight:normal;color:#000;" class="text-center" id="tapout_name">Muhammad Haris Ola </h2>
                            <div class="timeShow OUT text-center" id="tapout_time"></div>
                        </div>
                    </div><!-- tapArea -->
                    <div class="allocationArea" style="display: none;">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#staffInterim" data-toggle="tab"> Staff </a></li>
                            <li><a href="#parentInterim" data-toggle="tab"> Parent </a></li>
                            <li><a href="#visitorInterim" data-toggle="tab"> Visitor </a></li>
                            <?php /*
                            <li><a href="#admissionInterim" data-toggle="tab"> Admission </a></li>
                            <li><a href="#applicantInterim" data-toggle="tab"> Applicant </a></li>
                            <li><a href="#vendorInterim" data-toggle="tab"> Vendor </a></li>
                            <li><a href="#workerInterim" data-toggle="tab"> Worker </a></li>
                            <li><a href="#guestInterim" data-toggle="tab"> Guest </a></li>
                            */ ?>
                            <li><a href="#alumniInterim" data-toggle="tab"> Alumni </a></li>
                        </ul><!-- nav -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="staffInterim">
	                            <div class="issueInterim">
	                                <div class="input-group input-group-sm">
	                                    <span class="input-group-addon" id="sizing-addon1">Staff</span>
		                                    <input type="text" name="search_staff_name" id="search_staff_name" class="form-control" placeholder="Name, GT-ID or Name Code" aria-describedby="sizing-addon1">
		                                    <input type="hidden" name="_token_rfid" id="_token" value="<?php echo csrf_token(); ?>" / >
		                                    <div id="stafflist_ajax">
		                                    </div>
	                                 </div>
	                                <div class="col-md-12 text-right" style="padding: 0;margin: 0;">
	                                    <input id="InterimCardTapBtn" type="button" class="btn btn-group green assignInterim" value="Assign Interim" name="" data-placement="bottom" data-original-title="Assign Interim Card"data-toggle="modal" href="">
	                                </div><!-- col-md-12 -->
	                            </div><!-- issueInterim -->
                                <!-- Begin Modal -->
                                <div class="modal fade 100pxwidth" id="InterimCardTapmodal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title">Assign Interim - <small>Tap Interim Card</small></h3>
                                            </div>
                                            <div class="modal-body interim_card_div" style="float:left;width:100%;">
                                                <!-- tab_basic_edit Start -->
                                                @include('attendance.staff.staff_attendance_modal')
                                                <!-- tab_basic_edit End -->
                                            </div><!-- modal-body -->
                                        </div><!-- modal-content -->
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <!-- End Modal -->
                                <hr />
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="StaffList_ZiaKashif">
                                </table>
                            </div>
                            <div class="tab-pane fade" id="parentInterim">
                                <div class="issueInterim">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon" id="sizing-addon1">Family</span>
                                            <input type="text" name="search_student_name" id="search_student_name" class="form-control" placeholder="Student Name, GS-ID or GF-ID" aria-describedby="sizing-addon1">
                                            <input type="hidden" name="_token_rfid" id="_token" value="" / >
                                            <div id="studentlist_ajax">
                                            </div>
                                     </div>
                                    <div class="col-md-12 text-right" style="padding: 0;margin: 0;">
                                        <input id="ParentInterimCardTapBtn" type="button" class="btn btn-group green assignInterim" value="Assign Daypass" name="" data-placement="bottom" data-original-title="Assign Interim Card"data-toggle="modal" href="">
                                    </div><!-- col-md-12 -->
                                </div><!-- issueInterim -->
                                <!-- Begin Modal -->
                                <div class="modal fade 100pxwidth" id="ParentInterimCardTapmodal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title">Assign Daypass for GF-ID <strong>12-052</strong></h3>
                                            </div>
                                            <div class="modal-body interim_card_div" style="float:left;width:100%;">
                                                <!-- tab_basic_edit Start -->
                                                <div class="col-md-12">
                                                    <div class="col-md-6 text-center">
                                                        <img src= "http://10.10.10.63/gs/assets/photos/sis/150x150/father/166309.png" class="imageCenterDefaultParent" />
                                                        <h5>Hunaiz Mehmood</h5>
                                                    </div><!-- col-md-6 -->
                                                    <div class="col-md-6 text-center">
                                                        <img src="http://10.10.10.63/gs/assets/photos/sis/150x150/mother/166309.png" class="imageCenterDefaultParent">
                                                        <h5>Mehreen Hunaiz</h5>
                                                    </div><!-- col-md-6 -->
                                                </div><!-- col-md-12 -->
                                                <hr />
                                                <div class="col-md-12 text-center">
                                                    <ul class="childList">
                                                        <li class="eachChild">
                                                            <span class="childInfo">
                                                                <img src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/166309.png" class="imageCenterDefaultChild">
                                                                <span class="ChildName">Saleem Qureshi</span><br />
                                                                <span class="childGS">16-070</span> | <span class="stuStatus">S-CFS</span>
                                                            </span><!-- childInfo -->
                                                        </li><!-- eachChild -->
                                                        <li class="eachChild">
                                                            <span class="childInfo">
                                                                <img src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/165950.png" class="imageCenterDefaultChild">
                                                                <span class="ChildName">Saleem Qureshi</span><br />
                                                                <span class="childGS">16-070</span> | <span class="stuStatus">S-CFS</span>
                                                            </span><!-- childInfo -->
                                                        </li><!-- eachChild -->
                                                        <li class="eachChild">
                                                            <span class="childInfo">
                                                                <img src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/11049.png" class="imageCenterDefaultChild">
                                                                <span class="ChildName">Saleem Qureshi</span><br />
                                                                <span class="childGS">16-070</span> | <span class="stuStatus">S-CFS</span>
                                                            </span><!-- childInfo -->
                                                        </li><!-- eachChild -->
                                                        <li class="eachChild">
                                                            <span class="childInfo">
                                                                <img src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/166309.png" class="imageCenterDefaultChild">
                                                                <span class="ChildName">Saleem Qureshi</span><br />
                                                                <span class="childGS">16-070</span> | <span class="stuStatus">S-CFS</span>
                                                            </span><!-- childInfo -->
                                                        </li><!-- eachChild -->
                                                        <li class="eachChild">
                                                            <span class="childInfo">
                                                                <img src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/165950.png" class="imageCenterDefaultChild">
                                                                <span class="ChildName">Saleem Qureshi</span><br />
                                                                <span class="childGS">16-070</span> | <span class="stuStatus">S-CFS</span>
                                                            </span><!-- childInfo -->
                                                        </li><!-- eachChild -->
                                                    </ul><!-- ul -->
                                                </div><!-- col-md-12 -->
                                                <hr />
                                                <div class="col-md-12">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <h3 class="form-section marginHead">Visiting Form</h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Location</label>
                                                                        <select class="form-control" required="">
                                                                            <option value="" disabled="disabled" selected="">Select Location</option>
                                                                            <option value="">Screening Gate</option>
                                                                            <option value="">Basement</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visitor</label>
                                                                        <select class="form-control" required="">
                                                                            <option value="" disabled="disabled" selected="">Select Visitor</option>
                                                                            <option value="">Father</option>
                                                                            <option value="">Mother</option>
                                                                            <option value="">Both</option>
                                                                            <option value="">Other/Guardian</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Purpose</label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Purpose">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Name</label>
                                                                        <input type="text" id="" class="form-control" placeholder="Person Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department</label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Purpose">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No</label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 -->
                                                
                                                <!-- tab_basic_edit End -->
                                            </div><!-- modal-body -->
                                        </div><!-- modal-content -->
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="StaffList_ZiaKashif">
                                </table>
                            </div>
                            <div class="tab-pane fade" id="visitorInterim">
                                <div class="col-md-12 text-right" style="padding: 0;margin: 30px 0 0 0;">
                                    <input id="VisitorInterimCardTapBtn" type="button" class="btn btn-group green assignInterim" value="Assign Daypass" name="" data-placement="bottom" data-original-title="Day Pass for Admission"data-toggle="modal" href="">
                                </div><!-- col-md-12 -->
                                <div class="modal fade 100pxwidth" id="VisitorInterimCardTapmodal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title">Assign Daypass for Visitors</h3>
                                            </div>
                                            <div class="modal-body interim_card_div" style="float:left;width:100%;">
                                                <!-- tab_basic_edit Start -->
                                                <div class="col-md-12">
                                                	<div class="form-group">
                                                        <label class="control-label">Visitor type <span class="required">*</span></label>
                                                        <select class="form-control visitorTypeClass" required="" id="visitorType">
                                                            <option value="" disabled="disabled" selected="">Select Visitor type</option>
                                                            <option value="AdmissionVisit">Admission</option>
                                                            <option value="ApplicantVisit">Applicant</option>
                                                            <option value="VendorVisit">Vendor</option>
                                                            <option value="WorkerVisit">Worker</option>
                                                            <option value="GuestVisit">Guest</option>
                                                        </select>
                                                    </div><!-- form-group -->
                                                </div><!-- -->
                                                <hr />
                                                <div class="col-md-12" id="AdmissionDayPass">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visitor NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visitor Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visitor Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Purpose <span class="required">*</span></label>
                                                                        <select class="form-control" required="">
                                                                            <option value="" disabled="disabled" selected="">Visiting Purpose</option>
                                                                            <option value="">Form Issuance</option>
                                                                            <option value="">Form Submission</option>
                                                                            <option value="">Assessment</option>
                                                                            <option value="">Discussion</option>
                                                                            <option value="">Offer Letter or Fee Bill</option>
                                                                            <option value="">Further Discussion</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Applicant Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Applicant/Student Name">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Admission for Grade <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visitor Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 AdmissionDayPass -->
                                                <div class="col-md-12" id="ApplicantDayPass">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Applicant NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Applicant Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Applicant Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Purpose <span class="required">*</span></label>
                                                                        <select class="form-control" required="">
                                                                            <option value="" disabled="disabled" selected="">Visiting Purpose</option>
                                                                            <option value="">Apply</option>
                                                                            <option value="">Interview</option>
                                                                            <option value="">Observation</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 ApplicantDayPass -->
                                                <div class="col-md-12" id="VendorDayPass">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Vendor NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Vendor Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Vendor Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Purpose <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Purpose">
                                                                    </div>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Visiting to <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Person visiting to">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Department">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 VendorDayPass -->
                                                <div class="col-md-12" id="WorkerDayPass">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Worker NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Worker Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Worker Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Purpose <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Purpose">
                                                                    </div>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Visiting to <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Person visiting to">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Department">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 WorkerDayPass -->
                                                <div class="col-md-12" id="GuestDayPass">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Guest NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Guest Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Guest Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Purpose <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Guest Purpose">
                                                                    </div>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Visiting to <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Person visiting to">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Department">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 GuestDayPass -->
                                                
                                                <!-- tab_basic_edit End -->
                                            </div><!-- modal-body -->
                                        </div><!-- modal-content -->
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="StaffList_ZiaKashif">
                                </table>
                            </div>
                            


                            <div class="tab-pane fade" id="admissionInterim">
                                <div class="col-md-12 text-right" style="padding: 0;margin: 30px 0 0 0;">
                                    <input id="AdmissionInterimCardTapBtn" type="button" class="btn btn-group green assignInterim" value="Assign Daypass" name="" data-placement="bottom" data-original-title="Day Pass for Admission"data-toggle="modal" href="">
                                </div><!-- col-md-12 -->
                                <div class="modal fade 100pxwidth" id="AdmissionInterimCardTapmodal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title">Assign Daypass for Admission</h3>
                                            </div>
                                            <div class="modal-body interim_card_div" style="float:left;width:100%;">
                                                <!-- tab_basic_edit Start -->
                                                <div class="col-md-12">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visitor NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visitor Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visitor Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Purpose <span class="required">*</span></label>
                                                                        <select class="form-control" required="">
                                                                            <option value="" disabled="disabled" selected="">Visiting Purpose</option>
                                                                            <option value="">Form Issuance</option>
                                                                            <option value="">Form Submission</option>
                                                                            <option value="">Assessment</option>
                                                                            <option value="">Discussion</option>
                                                                            <option value="">Offer Letter or Fee Bill</option>
                                                                            <option value="">Further Discussion</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Applicant Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Applicant/Student Name">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Admission for Grade <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visitor Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 -->
                                                
                                                <!-- tab_basic_edit End -->
                                            </div><!-- modal-body -->
                                        </div><!-- modal-content -->
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="StaffList_ZiaKashif">
                                </table>
                            </div>
                            <div class="tab-pane fade" id="applicantInterim">
                            	<div class="col-md-12 text-right" style="padding: 0;margin: 30px 0 0 0;">
                                    <input id="ApplicantInterimCardTapBtn" type="button" class="btn btn-group green assignInterim" value="Assign Daypass" name="" data-placement="bottom" data-original-title="Day Pass for Applicant"data-toggle="modal" href="">
                                </div><!-- col-md-12 -->
                                <div class="modal fade 100pxwidth" id="ApplicantInterimCardTapmodal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title">Assign Daypass for Applicant</h3>
                                            </div>
                                            <div class="modal-body interim_card_div" style="float:left;width:100%;">
                                                <!-- tab_basic_edit Start -->
                                                <div class="col-md-12">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Applicant NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Applicant Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Applicant Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Purpose <span class="required">*</span></label>
                                                                        <select class="form-control" required="">
                                                                            <option value="" disabled="disabled" selected="">Visiting Purpose</option>
                                                                            <option value="">Apply</option>
                                                                            <option value="">Interview</option>
                                                                            <option value="">Observation</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 -->
                                                
                                                <!-- tab_basic_edit End -->
                                            </div><!-- modal-body -->
                                        </div><!-- modal-content -->
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="StaffList_ZiaKashif">
                                </table>
                            </div><!-- applicantInterim -->
                            <div class="tab-pane fade" id="vendorInterim">
                                <div class="col-md-12 text-right" style="padding: 0;margin: 30px 0 0 0;">
                                    <input id="VendorInterimCardTapBtn" type="button" class="btn btn-group green assignInterim" value="Assign Daypass" name="" data-placement="bottom" data-original-title="Vendor Visiting"data-toggle="modal" href="">
                                </div><!-- col-md-12 -->
                                <div class="modal fade 100pxwidth" id="VendorInterimCardTapmodal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title">Vendor Visiting Form</h3>
                                            </div>
                                            <div class="modal-body interim_card_div" style="float:left;width:100%;">
                                                <!-- tab_basic_edit Start -->
                                                <div class="col-md-12">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Vendor NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Vendor Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Vendor Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Purpose <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Purpose">
                                                                    </div>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Visiting to <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Person visiting to">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Department">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 -->
                                                
                                                <!-- tab_basic_edit End -->
                                            </div><!-- modal-body -->
                                        </div><!-- modal-content -->
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="StaffList_ZiaKashif">
                                </table>
                            </div>
                            <div class="tab-pane fade" id="workerInterim">
                                <div class="col-md-12 text-right" style="padding: 0;margin: 30px 0 0 0;">
                                    <input id="WorkerInterimCardTapBtn" type="button" class="btn btn-group green assignInterim" value="Assign Daypass" name="" data-placement="bottom" data-original-title="Vendor Visiting"data-toggle="modal" href="">
                                </div><!-- col-md-12 -->
                                <div class="modal fade 100pxwidth" id="WorkerInterimCardTapmodal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title">Worker Visiting Form</h3>
                                            </div>
                                            <div class="modal-body interim_card_div" style="float:left;width:100%;">
                                                <!-- tab_basic_edit Start -->
                                                <div class="col-md-12">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Worker NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Worker Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Worker Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Purpose <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Purpose">
                                                                    </div>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Visiting to <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Person visiting to">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Department">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 -->
                                                
                                                <!-- tab_basic_edit End -->
                                            </div><!-- modal-body -->
                                        </div><!-- modal-content -->
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="StaffList_ZiaKashif">
                                </table>
                            </div>
                            <div class="tab-pane fade" id="guestInterim">
                                <div class="col-md-12 text-right" style="padding: 0;margin: 30px 0 0 0;">
                                    <input id="GuestInterimCardTapBtn" type="button" class="btn btn-group green assignInterim" value="Assign Daypass" name="" data-placement="bottom" data-original-title="Vendor Visiting"data-toggle="modal" href="">
                                </div><!-- col-md-12 -->
                                <div class="modal fade 100pxwidth" id="GuestInterimCardTapmodal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title">Guest Visiting Form</h3>
                                            </div>
                                            <div class="modal-body interim_card_div" style="float:left;width:100%;">
                                                <!-- tab_basic_edit Start -->
                                                <div class="col-md-12">
                                                    <form action="#" class="horizontal-form">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Guest NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Guest Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Guest Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Purpose <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Guest Purpose">
                                                                    </div>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Visiting to <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Person visiting to">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control" placeholder="Visiting Department">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn blue">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    </form>
                                                </div><!-- col-md-12 -->
                                                
                                                <!-- tab_basic_edit End -->
                                            </div><!-- modal-body -->
                                        </div><!-- modal-content -->
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="StaffList_ZiaKashif">
                                </table>
                            </div>
                            <div class="tab-pane fade" id="alumniInterim">
                                <p> Alumni</p>
                            </div>
                        </div><!-- tab-content -->
                    </div><!-- allocationArea -->
                </div><!-- -->
            </div><!-- .portlet -->
    </div><!-- col-md-3 -->

    <div class="col-md-3">
    </div><!-- col-md-3 -->
</div><!-- row -->

<script type="text/javascript">
     /***** BEGIN - Document Ready Function *****
     * Author: Zia khan (Thu Feb 26, 2019)
     ****************************************************/
$(document).ready(function(){









        // Interim_table();
        if(("#staffView_StaffList_Search").click){
            $("#staffView_StaffList_Search").focus();
            $("#rfid_dec").focusout();
            }
            else if(("#interim_card_div").click){
            $("#interim_dec").focus();
            $("#rfid_dec").focusout();
            }
            else{
            $("#rfid_dec").focus();
        }
        //interim card
        //$('.requestAssign').show();
        $('.defaultAssign').show();
        $('.successAssign').hide();
        $('.failAssign').hide();
        //RFID card
        $('.rf_default').show();
        $('.rf_tapin').hide();
        $('.rf_tapout').hide();
        $('#location_id').hide();
        
        $('select option[value="5"]').attr("selected",true);

        $("#dayPass").click(function(){
            $("#rfid_dec").focusout();
            $(".tapArea").toggle();
            $(".allocationArea").toggle();
            $("#dayPass").toggle();
            $("#backtoTap").toggle();
            $('.rf_default').show();
        
        });
        
        $("#backtoTap").click(function(){
            $(".tapArea").toggle();
            $(".allocationArea").toggle();
            $("#dayPass").toggle();
            $("#backtoTap").toggle();
            $('.rf_default').show();
        
        });
        $("#visitorType").click(function(){

        });
        


        $("#InterimCardTapBtn").click(function(){
            // $('#search_staff_name').on('input', function() {
                if($('#search_staff_name').val() != '' && $('#search_staff_name').val().length > 4)
                { //console.log("if");
                    $('#interim_dec').val('');
                    $('.defaultAssign').css({'background-color':'white'});
                    $('#InterimCardTapmodal').modal({
                        show: 'false'
                    }); 
                }else{
                    //console.log("else");
                    $("#search_staff_name").attr("placeholder", "Please select Staff Name first");
                    $("#search_staff_name").css({"background-color": "#f5ef3e","color": "black"});
                    // $(this).attr("placeholder", "Type your answer here");
                }
            // });
            // $("#search_staff_name").show();
            //console.log("this.length()");
        });

        /* By haris */
        $("#ParentInterimCardTapBtn").click(function(){
            // $('#search_staff_name').on('input', function() {
                if($('#search_student_name').val() != '' && $('#search_student_name').val().length >0)
                { //console.log("if");
                    $('#interim_dec').val('');
                    $('.defaultAssign').css({'background-color':'white'});
                    $('#ParentInterimCardTapmodal').modal({
                        show: 'false'
                    }); 
                }else{
                    //console.log("else");
                    $("#search_student_name").attr("placeholder", "Please select Student Name first");
                    $("#search_student_name").css({"background-color": "#f5ef3e","color": "black"});
                    // $(this).attr("placeholder", "Type your answer here");
                }
            // });
            // $("#search_staff_name").show();
            //console.log("this.length()");
        });

        $("#ApplicantInterimCardTapBtn").click(function(){
            $('#ApplicantInterimCardTapmodal').modal({
                show: 'false'
            });
        });
            
        $("#VisitorInterimCardTapBtn").click(function(){
            $('#VisitorInterimCardTapmodal').modal({
                show: 'false'
            });
        });
        $(document).ready(function() {
		  $('#visitorType').on('change', function() {
		    if (this.value == 'AdmissionVisit') {
		      $("#AdmissionDayPass").show();
		    } else {
		      $("#AdmissionDayPass").hide();
		    }
		    if (this.value == 'ApplicantVisit') {
		      $("#ApplicantDayPass").show();
		    } else {
		      $("#ApplicantDayPass").hide();
		    }
		    if (this.value == 'VendorVisit') {
		      $("#VendorDayPass").show();
		    } else {
		      $("#VendorDayPass").hide();
		    }
		    if (this.value == 'WorkerVisit') {
		      $("#WorkerDayPass").show();
		    } else {
		      $("#WorkerDayPass").hide();
		    }
		    if (this.value == 'GuestVisit') {
		      $("#GuestDayPass").show();
		    } else {
		      $("#GuestDayPass").hide();
		    }
		  });
		});
		 // $("#AdmissionInterimCardTapBtn").click(function(){
        //     $('#AdmissionInterimCardTapmodal').modal({
        //         show: 'false'
        //     });
        // });
        // $("#VendorInterimCardTapBtn").click(function(){
        //     $('#VendorInterimCardTapmodal').modal({
        //         show: 'false'
        //     });
        // });
        // $("#WorkerInterimCardTapBtn").click(function(){
        //     $('#WorkerInterimCardTapmodal').modal({
        //         show: 'false'
        //     });
        // });
        // $("#GuestInterimCardTapBtn").click(function(){
        //     $('#GuestInterimCardTapmodal').modal({
        //         show: 'false'
        //     });
        // });


        /* End by Haris */
        

        $(function() { 
            if(("#staffView_StaffList_Search").click == true)
            {
            $("#staffView_StaffList_Search").focus();
            $("#rfid_dec").focusout();
            }else{ 
            $("#rfid_dec").focus();
            }
        
        });


        Interim_table();
    })

    function Interim_table(){
        
        //for staff Interim list
        $.ajax({
            cache:true,
            url:"{{url('/interim_table_list')}}",
            method:"GET",
           
            success:function(data)
            { 
            $('#StaffList_ZiaKashif').html(data);
            },
            complete:function(){

                setTimeout(function(){
                    $("#StaffList_ZiaKashif").DataTable({
                        "pageLength": 5,
                        "lengthChange": false
                    });  }, 2000);

             

            }
        });

    }
    
    var timeOut;
    function myTimeOut() {
            timeOut = setTimeout(function(){ 
                $('.rf_tapin').hide();
                $('.rf_tapout').hide();
                $('.rf_default').show();
             }, 3000);
    }

    function myStopTimeOut() {
        clearTimeout(timeOut);
    }

    //RFID Change Event
    $('#rfid_dec').on('input', function(e) {
        //var myInterval = setInterval(function () {
        e.preventDefault();
        if( $(this).val() != '' &&  $(this).val().length > 9 ){ // This will prevent event triggering more then once
            if( $(this).val().length == 10 )
            {
                $('.rf_default').hide();            
                var TapEventValue = $(this).val();
                //tap in ajax
                var _token = $('input[name="_token_rfid"]').val();
                // var timeout= 0;
                $.ajax({
                      //type: "GET",
                      cache: true,
                      method:"POST",
                      url:'/gsims/public/tap_in_staff',
                      beforeSend:function()
                      {
                            $('.rf_tapin').hide();
                            $('.rf_tapout').hide();
                            $('.rf_default').hide();
                      },
                      data: 
                      {
                            "RFID": TapEventValue,
                            "locationid": 5,
                            _token:_token,
                      },
                      success: function(result) {
                            if(result["tapin"]==2){
                                
                                // clearTimeout(timer);
                                $('.rf_default').css({'background-color':'white'});
                                $('.rf_tapout').hide();
                                $('.rf_tapin').hide();
                                $('#rfid_dec').val('');
                                $('.rf_default').hide();
                                console.log('TAPIN');
                                $('.rf_tapin').show();
                                $('#rfid_dec').val('');
                                var image_url = 'http://10.10.10.50/gs/'+result["get_attendance"][0].photo500;
                                $('#tapin_photo').attr('src',image_url);
                                $('#tapin_time').text('Time IN : '+result["timeget"]);
                                $('#tapin_name').text(result["get_attendance"][0].salutation+' '+result["get_attendance"][0].name);
                                myTimeOut();
                                // debugger;
                                // myStopTimeOut();
                                if($('.rf_tapin:visible').length==0&&$('.rf_tapout:visible').length==0){
                                    $('.rf_default').show();
                                }
                            // e.preventDefault();
                            }else if(result["tapin"]==1){
                                $('.rf_default').css({'background-color':'white'});
                                $('.rf_tapin').hide();
                                $('.rf_tapout').hide();
                                $('#rfid_dec').val('');
                                console.log('TAPOUT');
                                $('.rf_tapout').show();
                                $('#rfid_dec').val('');
                                $('.rf_default').hide();
                                var image_url_out = 'http://10.10.10.50/gs/'+result["get_attendance"][0].photo500;
                                $('#tapout_photo').attr('src',image_url_out);
                                $('#tapout_time').text('Time OUT : '+result["timeget"]);
                                $('#tapout_name').text(result["get_attendance"][0].salutation+' '+result["get_attendance"][0].name);
                                myTimeOut();
                                // myStopTimeOut();
                                if($('.rf_tapin:visible').length==0&&$('.rf_tapout:visible').length==0){
                                    $('.rf_default').show();
                                }
                            }else{
                                console.log("ELSE CONDITION");
                            }
                      },
                      error: function (result) {
                        $('.rf_default').css({'background-color':'red'});
                            $('#rfid_dec').val('');
                            $('.rf_default').show();
                            alert('Incorrect card Or Data Not Found');
                            console.log('Error: Data Not Updated');
                      }  
                })
                myStopTimeOut();
            }
        }
        return false;

    });


    //Interim card Change Event
    $('#interim_dec').on('input', function() {
        $('.rf_default').hide();
        //tap in ajax
        if($(this).val() != '' && $(this).val().length > 9 )
        {
            // $(".Card_information_not_found").hide();
            $.ajax({
                  type: "GET",
                  cache: true,
                  url:'/gsims/public/tap_in_interim',
                  data: {
                        "interim":$('#interim_dec').val(),
                        "stafflist_id":$('.stafflist_id').val(),
                  },
                  success: function(result) 
                  {     Interim_table();
                        // console.log('funstion assgin interim');
                        console.log(result);
                        if(result["InterimIn"]==3){
                            $('.defaultAssign').css({'background-color':'white'});
                            console.log(result["InterimIn"]);
                            $('#interim_dec').val('');
                            $('.defaultAssign').show();
                            $('.successAssign').hide();
                            $('.failAssign').hide();
                            setTimeout(function(){
                               $('#error').text('');
                                $('.successAssign').hide();
                                $('.failAssign').hide();
                                $('#InterimCardTapmodal').modal('toggle');
                                $('#rfid_dec').val('');
                                $(".tapArea").toggle();
                                $(".allocationArea").toggle();
                                $("#dayPass").toggle();
                                $("#backtoTap").toggle();
                                $('.rf_default').show();
                                $("#rfid_dec").focus();
                            },3000)

                        }
                        if(result["InterimIn"]==2){
                            console.log(result["InterimIn"]);
                            $('.defaultAssign').css({'background-color':'white'});
                            $('#interim_dec').val('');
                            $('.defaultAssign').hide();
                            $('.successAssign').show();   
                            $('.card_no').text(result["get_interim"][0].tmp_card_no);
                            $('.assign_name').text(result["get_interim"][0].abridged_name);
                            setTimeout(function(){
                                $('.successAssign').hide();
                                $('.failAssign').hide();
                                $('#InterimCardTapmodal').modal('toggle');
                                $('#rfid_dec').val('');
                                $(".tapArea").toggle();
                                $(".allocationArea").toggle();
                                $("#dayPass").toggle();
                                $("#backtoTap").toggle();
                                $('.rf_default').show();
                                $("#rfid_dec").focus();
                            },3000)
                        
                        }
                        if(result["InterimIn"]==1){
                            console.log(result["InterimIn"]);
                            $('.defaultAssign').css({'background-color':'white'});
                            $('#interim_dec').val('');
                            $('.defaultAssign').hide();
                            $('.successAssign').hide();   
                            $('.failAssign').show();
                            $('.as_cardno').text(result["get_interim"][0].tmp_card_no);
                            $('.as_name').text(result["get_interim"][0].abridged_name);
                            setTimeout(function(){
                                $('.successAssign').hide(); 
                                $('.failAssign').hide();
                                $('#InterimCardTapmodal').modal('toggle');
                                $('#rfid_dec').val('');
                                $(".tapArea").toggle();
                                $(".allocationArea").toggle();
                                $("#dayPass").toggle();
                                $("#backtoTap").toggle();
                                $('.rf_default').show();
                                $("#rfid_dec").focus();
                            },3000)

                        }
                  
                  },
                  error: function (result) {
                        console.log(result["InterimIn"]);
                        $('#interim_dec').val('');
                        $('.defaultAssign').css({'background-color':'#e8b80a'});
                        $('#error').text("Record Not Found");
                        $('#error').css({'color':'black'});
                        $('.successAssign').hide();
                        $('.failAssign').hide();
                        setTimeout(function(){
                           $('#error').text('');
                        },3000)                  
                  }  
            })
        }
        else 
        {
            console.log("Error in tap_in_interim reposend");
        }


    });


    //Staff Interm Card Eventand ajax
    $('#staffView_StaffList_Search').on('input', function() {

      
    });
    //on click function 
    $(document).click(function(event){
        if($(event.target).is('.daypassBTN')) {
            // console.log('day passs in')
        }else if($(event.target).is('#search_staff_name')){
            // console.log('search staff name')
        /* haris */
        }else if($(event.target).is('#search_student_name')){
            // console.log('search student name')
        }else if($(event.target).is('#interim_dec')){
            $('#interim_dec').focus();
        }else if($(event.target).is('.requestAssign') || $(event.target).is('.defaultAssign')){
            // $('#interim_dec').focus(); 
        }else if($(event.target).is('.input-inline')){
            $("#rfid_dec").focusout();
            $('.input-inline').focus();
        }
        else if($(event.target).is('.visitorTypeClass')){
            $("#rfid_dec").focusout();
        }
        // else if($(event.target).is('#maindiv')){
        //     $("#stafflist_ajax").dispose();
        //     $("#stafflist_ajax").clear();
        //     // $('.input-inline').focus();
        //     stafflist_ajax
        // }
        else{
            $('#rfid_dec').focus();
        }
    })
    
    $( ".row" ).click(function() {
        if(("#staffView_StaffList_Search").click){

            // $("#staffView_StaffList_Search").focus();
            }else{
            //$("#rfid_dec").focus();
            $("#rfid_dec").focusout();
        }
    });

 /***** END - Document Ready Function *****/

 //zk
 /***** BEGIN - Search Result Highlight Function *****
 * Author: Zia khan (Thu Feb 26, 2019)
 * Email: ziakhan.macrosoft@gmail.com
 * Cel: +92-342-2775588
 * Description: Highlight all the search text
 *              in table columns.
 ****************************************************/
    $('#search_staff_name').keyup(function(){ 
        var query = $(this).val();
        if( query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                cache:true,
                url:"{{url('/fetch_autocomplete')}}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data)
                {
                    //debugger;
                    $('#stafflist_ajax').fadeIn();  
                    $('#stafflist_ajax').html(data);
                }

            });
        } 
    });
        

    $(document).on('click', '.staff_list_class', function(){  
        $('#search_staff_name').val($(this).text());  
        $('#stafflist_ajax').fadeOut();

    });  








loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){ 
                  loadScript("{{ URL::to('metronic') }}/global/plugins/bootbox/bootbox.min.js", function(){ 
                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
								loadScript("{{ URL::to('metronic') }}/global/plugins/select2/js/select2.full.min.js", function(){
                                	loadScript("{{ URL::to('metronic') }}/pages/scripts/components-select2.min.js", function(){
                                		loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
											loadScript("{{ URL::to('metronic') }}/pages/scripts/datatable-expand.js", function(){
                                    			loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction);
											});
										});
									});
                                  });
                                });
                            });
                        });
                    });
                });
            });
        });
    });
});
	
</script>


 <script type="text/javascript">
// $('#StaffList').datatable( {
//     responsive: true
// } );                                </script>