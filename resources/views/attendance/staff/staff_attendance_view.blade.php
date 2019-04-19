
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
    width: 65%
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
#studentlist_ajax .dropdown-menu {
    display: block !important;
    position: relative !important;
    margin: 0px 0 0 0;
    padding: 5px 5px;
    width: 100%;
    border: 1px solid #888;
    border-top: 0 none;
    box-shadow: none;
    max-height: 300px;
    overflow-y: scroll;
    overflow-x: none;
}
#studentlist_ajax li.staff_list_class {
    font-family: 'Conv_calibri';
    font-size: 14px;
    font-weight: normal !important;
    padding: 5px 0;
    cursor: pointer;
}
#StaffList_ZiaKashif_filter {
    float: right;
}
#ParentList_table_filter {
    float: right;
}
#VisitorList_table_filter {
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
#AdmissionDayPassAssgin,
#AdmissionDayPass,
#ApplicantDayPassAssgin,
#ApplicantDayPass,
#VendorDayPass,
#VendorDayPassAssgin,
#WorkerDayPass,
#WorkerDayPassAssgin,
#GuestDayPassAssgin,
#GuestDayPass {
    display: none;
}
.family_tapin_time {
    /*background-color: green;
    padding-top: 50px;
    margin-top: 10px;
    margin-bottom: 50px;*/
    font-size: x-large;
    color: white;
}
.family_tapout_time {
    /*background-color: red;
    padding-top: 50px;
    margin-top: 10px;
    margin-bottom: 50px;*/
    font-size: x-large;
    color: white;
}
.Image {
    text-align: center;
}
img#staff_photo {
    border-radius: 50% !important;
    width: 60%;
    border: 1px solid #888;
}
.staffName {
    text-align: center;
    font-size: 26px;
}
</style>

<meta http-equiv="refresh" content="3600; URL=http://localhost/gsims/public/#screening_gate">
<div class="row" id="maindiv">
    <div class="col-md-3">
        <input type="hidden" name="user_id" id="user_id" value="{{$staff['UserID']}}" / >
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
        <div class="col-md-12 no-padding" style="width: 335px; text-align: center; position: absolute; top: 40%; left: 22%; background: rgb(241, 239, 239); border: 1px solid rgb(204, 204, 204); padding: 10px; z-index:99999;display:none" id="Generations_AjaxLoader">
            <img src="http://10.10.10.50/gs//components/image/gsLoader.gif" width="200"><br><hr style="margin: 7px 0;border-top: 1px solid #ccc;"> Please Wait...
        </div>
            <div class="portlet light bordered padding0 marginBottom0">
                <div class="portlet-title">
                    <div class="caption add_profile_label">
                        <span class="caption-subject font-dark sbold uppercase caption_subject_profile text-center">Card Tap - Screening Gate</span>
                    </div>
                    <input type="button" class="btn btn-group green daypassBTN" id="dayPass" value="Day Pass">
                    <input type="button" class="btn btn-group green daypassBTN" style="display: none;" id="backtoTap" value="Back to Tap">
                </div><!-- portlet-title -->
                <div class="portlet-body">
                    <div class="parent_div"><!-- parent ajax div -->
                    </div>
                    <div class="tapArea">
                        <div class="requestTapIn textCenter  rf_default">
                            <div class="row">
                            </div>
                            <div class="imageCenterDefault">
                                <img src="http://10.10.10.50/gs/components/gs_theme/images/nfc_updated.png" width="160">
                            </div><!-- imageCenter -->
                            <div id="tapin_error" align="center" ></div>
                        </div>
                        <!-- <div class="timeShow OUT text-center" style="display: none;" id="tapOut_time_admission"> Card Is Not Found In Our Record...</div> -->
                        <h4 class="record_not_found" style="display: none;">Record Not Found </h4>
                        <!-- Tapin div staff -->
                        <div class="requestTapIn textCenter  rf_tapin">
                            <div class="INImage" >
                                <img id="tapin_photo" src="" width="410"><br><br>
                            </div><!-- imageCenter get_attendance-->
                            <h2 style="font-weight:normal;color:#000;" class="text-center" id="tapin_name"></h2>
                            <div class="timeShow IN text-center" id="tapin_time"></div>
                        </div>
                        <!-- Tapout div staff-->
                        <div class="requestTapOut textCenter  rf_tapout">
                            <div class="INImage" >
                                <img id="tapout_photo" src="" width="410"><br><br>
                            </div><!-- imageCenter get_attendance-->
                            <h2 style="font-weight:normal;color:#000;" class="text-center" id="tapout_name"></h2>
                            <div class="timeShow OUT text-center" id="tapout_time"></div>
                        </div>
                         <!-- Tapout div admission-->
                        <div class="requestTapOut textCenter  rf_admission_tapout">
                            <div class="INImage" >
                                <img id="tapout_photo" src="" width="410"><br><br>
                            </div><!-- imageCenter get_attendance-->
                            <h2 style="font-weight:normal;color:#000;" class="text-center" id="admission_tapout_name"></h2>
                            <h3 style="font-weight:normal;color:#000;" class="text-center" id="admission_tapout_cardno"></h3>
                            <h3 style="font-weight:normal;color:#000;" class="text-center" id="admission_tapout_cardtypename"></h3>
                            <h3 style="font-weight:normal;color:#000;" class="text-center" id="admission_tapout_purpose"></h3>
                            <h3 style="font-weight:normal;color:#000;" class="text-center" id="admission_tapout_line"></h3>
                            <div class="timeShow IN text-center" id="admission_tapin_time"></div>
                            <div class="timeShow OUT text-center" id="admission_tapout_time"></div>
                        </div>
                        <!-- Tapin div Family -->
                        <div class="family_info_father">
                            <div class="col-md-6 text-center">
                                <img class="fatherimg" id="fatherimg" src="" class="imageCenterDefaultParent" />
                                <h5 class="father_name" id="father_name"></h5>
                            </div><!-- col-md-6 -->
                            <div class="col-md-6 text-center">
                                <img class="motherimg" id="motherimg" src="" class="imageCenterDefaultParent" />
                                <h5 class="mother_name" id="mother_name"></h5>
                            </div><!-- col-md-6 -->
                            <!-- col-md-12 -->
                            <hr />
                            <div class="col-md-12 text-center">
                                <ul class="childList family_childinfo">
                                    <!-- <ul class="childList"> -->
                                        <li class="eachChild">
                                        </li><!-- eachChild -->
                                </ul> <!-- ul -->
                            </div><!-- col-md-12 -->
                            <hr />
                            <!-- <div class="col-md-12 text-center family_tapin">
                            <div class="family_tapin_time"></div>
                            <div class="family_tapout_time"></div>
                            </div> -->
                        </div><!-- family_info_father -->
                        <div class="family_info_mother">
                            <div class="col-md-6 text-center">
                                <img class="motherimg" id="motherimg" src="" class="imageCenterDefaultParent" />
                                <h5 class="mother_name" id="mother_name"></h5>
                            </div><!-- col-md-6 -->
                            <div class="col-md-6 text-center">
                                <img class="fatherimg" id="fatherimg" src="" class="imageCenterDefaultParent" />
                                <h5 class="father_name" id="father_name"></h5>
                            </div><!-- col-md-6 -->
                            <hr />
                            <div class="col-md-12 text-center">
                                <ul class="childList family_childinfo">
                                    <!-- <ul class="childList"> -->
                                    <li class="eachChild">
                                    </li><!-- eachChild -->
                                    <!-- </ul> -->
                                </ul> <!-- ul -->
                            </div><!-- col-md-12 -->
                            <hr />  
                            <!-- <div class="family_tapin">
                            <div class="family_tapin_time"></div>
                            <div class="family_tapout_time"></div>
                            </div>    -->                       
                        </div><!-- family_info_mother -->
                        <div class="col-md-12 text-center family_tapin">
                            <div class="family_tapin_time"></div>
                            <div class="family_tapout_time"></div>
                        </div><!-- family_tapin -->
                        <!-- Tapin div Family -->
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
                                            <input type="hidden" name="search_staff_id" id="search_staff_id" class="form-control">
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
                                            <input type="hidden" name="_token_rfid" id="_token" value="<?php echo csrf_token(); ?>" / >
                                            <div id="studentlist_ajax">
                                            </div>
                                     </div>
                                    <div class="col-md-12 text-right" style="padding: 0;margin: 0;">
                                        <input id="ParentInterimCardTapBtn" type="button" class="btn btn-group green assignInterim" value="Assign Daypass" name="" data-placement="bottom" data-original-title="Assign Interim Card"data-toggle="modal" href="">
                                    </div><!-- col-md-12 -->
                                </div><!-- issueInterim -->
                                <!-- Begin Modal -->
                                <div class="modal fade 100pxwidth" id="ParentInterimCardTapmodal" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog parents_interimcard_modal">

                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <hr />
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="ParentList_table">
                                </table>
                            </div>
                            <!-- visitor Foam Goes here -->
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
                                                <div id="AdmissionDayPassAssgin">
                                                    
                                                </div>
                                                <div class="col-md-12" id="AdmissionDayPass">

                                                    <!-- <form action="" class="horizontal-form"> -->
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="admission_nic" class="form-control" placeholder="Visitor NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="admission_name" class="form-control" placeholder="Visitor Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="admission_mobile" class="form-control" placeholder="Visitor Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Purpose <span class="required">*</span></label>
                                                                        <select class="form-control" required="" id="admission_purpose">
                                                                            <option value="" disabled="disabled" selected="">Visiting Purpose</option>
                                                                            <option value="Form Issuance">Form Issuance</option>
                                                                            <option value="Form Submission">Form Submission</option>
                                                                            <option value="Assessment">Assessment</option>
                                                                            <option value="Discussion">Discussion</option>
                                                                            <option value="Offer Letter or Fee Bill">Offer Letter or Fee Bill</option>
                                                                            <option value="Further Discussion">Further Discussion</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Applicant Name <span class="required">*</span></label>
                                                                        <input type="text" id="admission_applicant" class="form-control" placeholder="Applicant/Student Name">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Admission for Grade <span class="required">*</span></label>
                                                                        <!-- <input type="text" id="admission_grade" class="form-control" placeholder="Admission for Grade"> -->
                                                                        <select class="form-control" required="" id="admission_grade">
                                                                            <option value="" disabled="disabled" selected="">Select Grade</option>
                                                                            <option value="PG">PG</option>
                                                                            <option value="PN">PN</option>
                                                                            <option value="N">N</option>
                                                                            <option value="KG">KG</option>
                                                                            <option value="I">I</option>
                                                                            <option value="II">II</option>
                                                                            <option value="III">III</option>
                                                                            <option value="IV">IV</option>
                                                                            <option value="V">V</option>
                                                                            <option value="VI">VI</option>
                                                                            <option value="VII">VII</option>
                                                                            <option value="VIII">VIII</option>
                                                                            <option value="IX">IX</option>
                                                                            <option value="X">X</option>
                                                                            <option value="XI">XI</option>
                                                                            <option value="A1">A1</option>
                                                                            <option value="A2">A2</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="admission_rfid" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="Cancel" class="btn default" id="admission_btn_default">Cancel</button>
                                                            <button type="submit" class="btn blue" id="admission_btn">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    <!-- </form> -->
                                                </div><!-- col-md-12 AdmissionDayPass -->
                                                <div id="ApplicantDayPassAssgin">
                                                    
                                                </div>
                                                <div class="col-md-12" id="ApplicantDayPass">
                                                    <!-- <form action="#" class="horizontal-form"> -->
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="applicant_nic" class="form-control" placeholder="Applicant NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="applicant_name" class="form-control" placeholder="Applicant Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="applicant_mobile" class="form-control" placeholder="Applicant Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Purpose <span class="required">*</span></label>
                                                                        <select class="form-control" required="" id="applicant_purpose">
                                                                            <option value="" disabled="disabled" selected="">Visiting Purpose</option>
                                                                            <option value="Apply">Apply</option>
                                                                            <option value="Interview">Interview</option>
                                                                            <option value="Observation">Observation</option>
                                                                        </select>
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="applicant_rfid" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default" id="applicant_btn_default">Cancel</button>
                                                            <button type="submit" class="btn blue" id="applicant_btn">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    <!-- </form> -->
                                                </div><!-- col-md-12 ApplicantDayPass -->
                                                <div id="VendorDayPassAssgin">
                                                    
                                                </div>
                                                <div class="col-md-12" id="VendorDayPass">
                                                    
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="vendor_nic" class="form-control" placeholder="Vendor NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="vendor_name" class="form-control" placeholder="Vendor Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="vendor_mobile" class="form-control" placeholder="Vendor Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Purpose <span class="required">*</span></label>
                                                                        <input type="text" maxlength="40" id="vendor_purpose" class="form-control" placeholder="Visiting Purpose">
                                                                    </div>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Visiting to <span class="required">*</span></label>
                                                                        <input type="text" maxlength="20" id="vendor_visiting" class="form-control" placeholder="Person visiting to">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department <span class="required">*</span></label>
                                                                        <input type="text" maxlength="20" id="vendor_depart" class="form-control" placeholder="Visiting Department">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="vendor_rfid" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default" id="vendor_btn_default">Cancel</button>
                                                            <button type="submit" class="btn blue" id="vendor_btn">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                </div><!-- col-md-12 VendorDayPass -->
                                                <div id="WorkerDayPassAssgin">
                                                    
                                                </div>
                                                <div class="col-md-12" id="WorkerDayPass">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text"  id="worker_nic" class="form-control" placeholder="Worker NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="worker_name" class="form-control" placeholder="Worker Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text"  id="worker_mobile" class="form-control" placeholder="Worker Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Purpose <span class="required">*</span></label>
                                                                        <input type="text" maxlength="40" id="worker_purpose" class="form-control" placeholder="Visiting Purpose">
                                                                    </div>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Visiting to <span class="required">*</span></label>
                                                                        <input type="text" maxlength="20" id="worker_visiting" class="form-control" placeholder="Person visiting to">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department <span class="required">*</span></label>
                                                                        <input type="text" maxlength="20" id="worker_depart" class="form-control" placeholder="Visiting Department">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="worker_rfid" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default" id="worker_btn_default">Cancel</button>
                                                            <button type="submit" class="btn blue" id="worker_btn">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    
                                                </div><!-- col-md-12 WorkerDayPass -->
                                                <div id="GuestDayPassAssgin">
                                                    
                                                </div>
                                                <div class="col-md-12" id="GuestDayPass">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">NIC <span class="required">*</span></label>
                                                                        <input type="text" id="guest_nic" class="form-control" placeholder="Guest NIC">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Name <span class="required">*</span></label>
                                                                        <input type="text" id="guest_name" class="form-control" placeholder="Guest Name">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile <span class="required">*</span></label>
                                                                        <input type="text" id="guest_mobile" class="form-control" placeholder="Guest Mobile">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Purpose <span class="required">*</span></label>
                                                                        <input type="text" maxlength="40" id="guest_purpose" class="form-control" placeholder="Guest Purpose">
                                                                    </div>
                                                                </div>
                                                            </div><!-- row -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Person Visiting to <span class="required">*</span></label>
                                                                        <input type="text" maxlength="20" id="guest_visiting" class="form-control" placeholder="Person visiting to">
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Visiting Department <span class="required">*</span></label>
                                                                        <input type="text" maxlength="20" id="guest_depart" class="form-control" placeholder="Visiting Department">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Card No <span class="required">*</span></label>
                                                                        <input type="text" id="guest_rfid" class="form-control tapCardField" placeholder="Tap Card after selecting this field">
                                                                    </div>
                                                                </div><!--/span-->
                                                            </div><!--/row-->
                                                            
                                                        </div>
                                                        <div class="form-actions right">
                                                            <button type="button" class="btn default" id="guest_btn_default">Cancel</button>
                                                            <button type="submit" class="btn blue" id="guest_btn">
                                                                <i class="fa fa-check"></i> Submit</button>
                                                        </div><!-- form-actions -->
                                                    
                                                </div><!-- col-md-12 GuestDayPass -->
                                                
                                                <!-- tab_basic_edit End -->
                                            </div><!-- modal-body -->
                                        </div><!-- modal-content -->
                                    </div><!-- modal-dialog -->
                                </div><!-- modal -->
                                <hr />
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="VisitorList_table" class="VisitorList_table_c">
                                </table>
                            </div>
                            <!-- visitor foam End here -->
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

    // Check User Loginid
    var userID = $('#user_id').val();
    if(userID == 35){
        alert("Rukhsar Hussain");
        refresh_page();
    }
    // else if(userID == 335){
    //     alert("Faisal HOD");
    //     refresh_page();
    // }
    // else{
    //     // alert("Other User");
    // }

    //diable keyboard on textbox
    var delay = (function(){
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $("#rfid_dec").on("input", function() {
       delay(function(){
          if ($("#rfid_dec").val().length < 8) {
              $("#rfid_dec").val("");
          }
       }, 20 );
    });

    $("#interim_dec").on("input", function() {
       delay(function(){
          if ($("#interim_dec").val().length < 8) {
              $("#interim_dec").val("");
          }
       }, 20 );
    });

    $("#admission_rfid").on("input", function() {
       delay(function(){
          if ($("#admission_rfid").val().length < 8) {
              $("#admission_rfid").val("");
          }
       }, 20 );
    });

    $("#applicant_rfid").on("input", function() {
       delay(function(){
          if ($("#applicant_rfid").val().length < 8) {
              $("#applicant_rfid").val("");
          }
       }, 20 );
    });

    $("#vendor_rfid").on("input", function() {
       delay(function(){
          if ($("#vendor_rfid").val().length < 8) {
              $("#vendor_rfid").val("");
          }
       }, 20 );
    });

    $("#worker_rfid").on("input", function() {
       delay(function(){
          if ($("#worker_rfid").val().length < 8) {
              $("#worker_rfid").val("");
          }
       }, 20 );
    });

    $("#guest_rfid").on("input", function() {
       delay(function(){
          if ($("#guest_rfid").val().length < 8) {
              $("#guest_rfid").val("");
          }
       }, 20 );
    });


    //masking Start
    $("#admission_nic").inputmask({"mask": "99999-9999999-9"});
    $("#admission_mobile").inputmask({"mask": "9999-9999999"});
    $("#applicant_nic").inputmask({"mask": "99999-9999999-9"});
    $("#applicant_mobile").inputmask({"mask": "9999-9999999"});
    $("#vendor_nic").inputmask({"mask": "99999-9999999-9"});
    $("#vendor_mobile").inputmask({"mask": "9999-9999999"});
    $("#worker_nic").inputmask({"mask": "99999-9999999-9"});
    $("#worker_mobile").inputmask({"mask": "9999-9999999"});
    $("#guest_nic").inputmask({"mask": "99999-9999999-9"});
    $("#guest_mobile").inputmask({"mask": "9999-9999999"});
    // masking End

    //clear admission modal on cancel button
    $("#admission_btn_default").click(function(){
        $('#admission_nic').val('');
        $('#admission_mobile').val('');
        $('#admission_name').val('');
        $('#admission_purpose').val('');
        $('#admission_applicant').val('');
        $('#admission_grade').val('');
        $('#admission_rfid').val('');

    });

    //clear applicant modal on cancel button
    $("#applicant_btn_default").click(function(){
        $('#applicant_nic').val('');
        $('#applicant_mobile').val('');
        $('#applicant_name').val('');
        $('#applicant_purpose').val('');
        $('#applicant_rfid').val('');

    });

    //clear vendor modal on cancel button
    $("#vendor_btn_default").click(function(){
        $('#vendor_nic').val('');
        $('#vendor_mobile').val('');
        $('#vendor_name').val('');
        $('#vendor_purpose').val('');
        $('#vendor_visiting').val('');
        $('#vendor_depart').val('');
        $('#vendor_rfid').val('');

    });

    //clear worker modal on cancel button
    $("#worker_btn_default").click(function(){
        $('#worker_nic').val('');
        $('#worker_mobile').val('');
        $('#worker_name').val('');
        $('#worker_purpose').val('');
        $('#worker_visiting').val('');
        $('#worker_depart').val('');
        $('#worker_rfid').val('');

    });

    //clear guest modal on cancel button
    $("#guest_btn_default").click(function(){
        $('#guest_nic').val('');
        $('#guest_mobile').val('');
        $('#guest_name').val('');
        $('#guest_purpose').val('');
        $('#guest_visiting').val('');
        $('#guest_depart').val('');
        $('#guest_rfid').val('');

    });


        
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
        $('.family_info').hide();
        $('.family_info_father').hide();
        $('.family_info_mother').hide();
        $('.successAssign').hide();
        $('.failAssign').hide();
        //RFID card
        $('.rf_default').show();
        $('.rf_tapin').hide();
        $('.rf_tapout').hide();
        $('#location_id').hide();
        $('#tapOut_time_admission').hide();
        $('#admission_tapin_time').hide();
        $('#admission_tapout_time').hide();
        // $('.family_tapin').hide();
        $('.family_tapin_time').hide();
        $('.family_tapout_time').hide();
        

        // $('select option[value="5"]').attr("selected",true);

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
            $("#rfid_dec").focus();
        
        });


        $("#InterimCardTapBtn").click(function(){
                if($('#search_staff_name').val() != '' && $('#search_staff_name').val().length > 4)
                { 
                    $('#interim_dec').val('');
                    $('.defaultAssign').css({'background-color':'white'});
                    $('#InterimCardTapmodal').modal({
                        show: 'false'
                    });
                    $('#Generations_AjaxLoader').show();
                    //ajax for get staff pix by staff_id
                    // var staff_id = $(".stafflist_id").val();
                    var staff_id = $('#search_staff_id').val();

                    //for Assgin DayPass Parents save data from ajax save data
                    $.ajax({
                        cache:true,
                        url:"{{url('/get_fetch_staff_pix')}}",
                        data:{ 
                            "staff_id":staff_id
                        },
                        method:"GET",
                        success:function(data)
                        {
                            // debugger;
                            $('#Generations_AjaxLoader').hide();
                            var staff_image_url = 'http://10.10.10.50/gs/'+data["get_pix"][0].photo500;
                            $('.rf_staff_default').hide();
                            $('.rf_staff').show();
                            $('.staffName').text('');
                            $('#staff_photo').attr('src',staff_image_url);
                            $('.staffName').text(data["get_pix"][0].name);
                        }
                    });
                }else{
                    //console.log("else");
                    $("#search_staff_name").attr("placeholder", "Please select Staff Name first");
                    $("#search_staff_name").css({"background-color": "#f5ef3e","color": "black"});
                    // $(this).attr("placeholder", "Type your answer here");
                }
        });

        /* By haris */
        $("#ParentInterimCardTapBtn").click(function(){
            // $('#search_staff_name').on('input', function() {

                select_gfid = $('#search_student_name').val().split('GF-ID:')[1].trim();
                if($('#search_student_name').val() != '' && $('#search_student_name').val().length >4)
                { //console.log("if");
                    $('#interim_dec').val('');
                    $('.defaultAssign').css({'background-color':'white'});
                    $('#ParentInterimCardTapmodal').modal({
                        show: 'false'
                    });
                    $('#Generations_AjaxLoader').show();
                    // $('.family_gf_id').html('Assign Daypass for GF-ID <strong>'+$('.gf_id').val()+'</strong>');
                    var Gr_no = $(".gr_no").val();
                    var Gs_id = $(".gs_no").val();

                    $('#parents_data').text("");
                    $('.childList').text("");

                     // var _token = $('input[name="_token"]').val();

                        //for Student parents daypass assign information
                        $.ajax({
                            cache:true,
                            url:"{{url('/student_parent_daypass_info')}}",
                            data:{ 
                                // "gf_id": $('.gf_id').val(),
                                "gf_id":select_gfid,
                                "Gr_no":Gr_no,
                                "Gs_id":Gs_id,
                                // "_token": "{{ csrf_token() }}",
                            },
                            method:"GET",
                            success:function(data)
                            {
                                $('#Generations_AjaxLoader').hide();
                                $('.parents_interimcard_modal').fadeIn();  
                                $('.parents_interimcard_modal').html(data);

                                
                                // console.log(data);

                            // $('#StaffList_ZiaKashif').html(data);
                            },
                            complete:function(){
                                Parent_Interim_table();
                                // setTimeout(function(){
                                //     $("#StaffList_ZiaKashif").DataTable({
                                //         "pageLength": 5,
                                //         "lengthChange": false
                                //     });  }, 2000);
                            }
                        });

                }else{
                    $("#search_student_name").attr("placeholder", "Please select Student Name first");
                    $("#search_student_name").css({"background-color": "#f5ef3e","color": "black"});
                }
        });
        // visitor foam script here
        $("#ApplicantInterimCardTapBtn").click(function(){
            $('#ApplicantInterimCardTapmodal').modal({
                show: 'false'
            });
        });
            
        $("#VisitorInterimCardTapBtn").click(function(){
            $('#AdmissionDayPassAssgin').text('');
            // $('#AdmissionDayPass').text('');
            $('#ApplicantDayPassAssgin').text('');
            // $('#ApplicantDayPass').text('');
            // $('#VendorDayPass').text('');
            $('#VendorDayPassAssgin').text('');
            // $('#WorkerDayPass').text('');
            $('#WorkerDayPassAssgin').text('');
            $('#GuestDayPassAssgin').text('');
            // $('#GuestDayPass').text('');

            $('#visitorType').val('');
            $('#admission_nic').val('');
            $('#admission_mobile').val('');
            $('#admission_name').val('');
            $('#admission_purpose').val('');
            $('#admission_applicant').val('');
            $('#admission_grade').val('');
            $('#admission_rfid').val('');
            $('#applicant_nic').val('');
            $('#applicant_mobile').val('');
            $('#applicant_name').val('');
            $('#applicant_purpose').val('');
            $('#applicant_rfid').val('');
            $('#vendor_nic').val('');
            $('#vendor_mobile').val('');
            $('#vendor_name').val('');
            $('#vendor_purpose').val('');
            $('#vendor_visiting').val('');
            $('#vendor_depart').val('');
            $('#vendor_rfid').val('');
            $('#worker_nic').val('');
            $('#worker_mobile').val('');
            $('#worker_name').val('');
            $('#worker_purpose').val('');
            $('#worker_visiting').val('');
            $('#worker_depart').val('');
            $('#worker_rfid').val('');
            $('#guest_nic').val('');
            $('#guest_mobile').val('');
            $('#guest_name').val('');
            $('#guest_purpose').val('');
            $('#guest_visiting').val('');
            $('#guest_depart').val('');
            $('#guest_rfid').val('');
            $('#VisitorInterimCardTapmodal').modal({
                show: 'false'
            });
        
        });

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
        // visitor foam script end here
        

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
        Parent_Interim_table();
        Visitor_Interim_table();

})

    function refresh_page(){
        // window.location.reload(true);
        setTimeout(function(){
            window.location.reload(1);
        }, 60*60000);    // 1 Hour = 3600 second   60*60000
    }

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
                    if ($.fn.DataTable.isDataTable("#StaffList_ZiaKashif")) {
                      $('#StaffList_ZiaKashif').DataTable().clear().destroy();
                    }
                    $("#StaffList_ZiaKashif").DataTable({
                        destroy: true,
                        "pageLength": 5,
                        "lengthChange": false,
                        searching: true
                    });
                }, 2000);
            }
        });

    }

    function Parent_Interim_table(){
        // $("#ParentList_table").DataTable().fnDestroy();
        var type_id = 1;
        var type_id1 = 8;
        var type_id2 = 9;       
        //for Parent DayPass list
        $.ajax({
            cache:true,
            url:"{{url('/interim_parent_table_list')}}",
            method:"GET",
            data:{ 
                "type_id":type_id,
                "type_id1":type_id1,
                "type_id2":type_id2
            },           
            success:function(data)
            { 
            $('#ParentList_table').html(data);
            },
            complete:function(){
                setTimeout(function(){
                    if ($.fn.DataTable.isDataTable("#ParentList_table")) {
                      $('#ParentList_table').DataTable().clear().destroy();
                    }
                    $("#ParentList_table").DataTable({
                        destroy: true,
                        "pageLength": 5,
                        "lengthChange": false,
                        searching: true
                    });
                }, 2000);

            }
        });

    }

    //Visitor table data
    function Visitor_Interim_table(){
        // $("#VisitorList_table_c").destroy();
        // var visitor_table='';
        var visitor_table;
        var type_id = 2;
        var type_id1 = 3;
        var type_id2 = 4;
        var type_id3 = 5;
        var type_id4 = 6;
        // var type_id5 = 7;
        // var type_id6 = 8;
        //for Parent DayPass list
        $.ajax({
            cache:true,
            url:"{{url('/interim_visitor_table_list')}}",
            method:"GET",
            data:{ 
                "type_id":type_id,
                "type_id1":type_id1,
                "type_id2":type_id2,
                "type_id3":type_id3,
                "type_id4":type_id4,
                // "type_id5":type_id5,
                // "type_id6":type_id6,
            },
            success:function(data)
            { 
            $('#VisitorList_table').html(data);
            },
            complete:function(){
                setTimeout(function(){
                    if ($.fn.DataTable.isDataTable("#VisitorList_table")) {
                      $('#VisitorList_table').DataTable().clear().destroy();
                    }
                    $("#VisitorList_table").DataTable({
                        // 'destroy': true,
                        destroy: true,
                        "pageLength": 5,
                        "lengthChange": false,
                        searching: true
                        // 'destroy': true,
                        // 'paging': true,
                        // 'lengthChange': true,
                        // 'searching': true,
                        // 'ordering': true,
                        // 'info': true,
                        // 'autoWidth': true  
                    });
                }, 2000);

            }
        });

    }
    
    var timeOut;
    function myTimeOut() {
            timeOut = setTimeout(function(){ 
                $('.rf_tapin').hide();
                $('.rf_tapout').hide();
                $('.parent_div').hide();
                $('.family_info').hide();
                $('.family_info_father').hide();
                $('.family_info_mother').hide();
                $('#tapOut_time_admission').hide();
                $('.rf_admission_tapout').hide();
                $('.rf_default').show();
                $('.rf_default').css({'background-color':'white'});
                $('#tapin_error').text('');
                $('.family_tapin').hide();
                $('.family_tapin_time').hide();
                $('.family_tapout_time').hide();
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
                            $('.rf_admission_tapout').hide();
                            $('.family_tapin').hide();
                            $('.family_tapin_time').hide();
                            $('.family_tapout_time').hide();

                      },
                      data: 
                      {
                            "RFID": TapEventValue,
                            "locationid": 5,
                            _token:_token,
                      },
                      success: function(result) {
                        $('#Generations_AjaxLoader').show();
                            // if(result["tapin"]==3)
                            // {
                            //     // $('.rf_default').css({'background-color':'white'});
                            //     // $('.rf_tapout').hide();
                            //     // $('.rf_tapin').hide();
                            //     // $('#rfid_dec').val('');
                            //     // $('.rf_default').hide();
                            //     // console.log('zkkkkkkkkkk');
                            //     // $('.rf_tapin').show();
                            //     // $('#rfid_dec').val('');
                            // }
                            if(result["tapin"]==2){
                                $('#Generations_AjaxLoader').hide();
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
                                $('#Generations_AjaxLoader').hide();
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
                            }else if(result["tapin"]=='Family'){
                                // debugger;
                                $('.family_tapin').show();
                                // $('.family_tapin_time').show();
                                // $('.family_tapout_time').show();

                                if(result["parent_type_name"]=='Father'){
                                    // debugger;
                                    $('#Generations_AjaxLoader').hide();
                                    $('.rf_default').css({'background-color':'white'});
                                    $('.rf_tapin').hide();
                                    $('.rf_tapout').hide();
                                    $('.family_info_mother').hide();
                                    $('#rfid_dec').val('');
                                    console.log('family_info_father');
                                    $('.family_info_father').show();
                                    $('#rfid_dec').val('');
                                    $('.rf_default').hide();
                                    // $('#fatherimg').css({'border':'red'});
                                    // $('#fatherimg').attr('src',result["fatherpic"]);
                                    // $('#father_name').text(result["Father_name"]);
                                    // $('#motherimg').attr('src',result["motherpic"]);
                                    // $('#mother_name').text(result["Mother_name"]);
                                    // myTimeOut();
                                     // if(result["parent_type"]=='Mother')
                                }
                                if(result["parent_type_name"]=='Mother'){
                                    // debugger;
                                    $('#Generations_AjaxLoader').hide();
                                    $('.rf_default').css({'background-color':'white'});
                                    $('.rf_tapin').hide();
                                    $('.rf_tapout').hide();
                                    $('.rf_default').hide();
                                    $('.family_info_father').hide();
                                    $('#rfid_dec').val('');
                                    console.log('family_info_mother');
                                    $('.family_info_mother').show();
                                    // debugger;
                                    // $('#fatherimg').attr('src',result["fatherpic"]);
                                    // $('#father_name').text(result["Father_name"]);
                                    // $('#motherimg').attr('src',result["motherpic"]);
                                    // $('#mother_name').text(result["Mother_name"]);
                                    // myTimeOut();
                                }
                                // debugger;
                                if(result["family_tap"]=='Family_tapin'){

                                    $('.family_tapin_time').show();
                                    $('.family_tapin_time:visible').css({'background-color':'green'});
                                    $('.family_tapin_time:visible').text('Time IN : '+result["timeget"]);
                                }
                                if(result["family_tap"]=='Family_tapout'){

                                    $('.family_tapout_time').show();
                                    $('.family_tapout_time:visible').css({'background-color':'red'});
                                    $('.family_tapout_time:visible').text('Time OUT : '+result["timeget"]);
                                }
                                $('.fatherimg:visible').attr('src',result["fatherpic"]);
                                $('.father_name:visible').text(result["Father_name"]);
                                $('.motherimg:visible').attr('src',result["motherpic"]);
                                $('.mother_name:visible').text(result["Mother_name"]);
                                var array = result["stdfamilyinfo"].student;
                                var newHTML = [];
                                // debugger;
                                for (var i = 0; i < array.length; i++) {
                                    newHTML.push('<span class="childInfo" >');
                                    newHTML.push('<img id="child1_img" class="imageCenterDefaultChild" src=http://10.10.10.63/gs/assets/photos/sis/150x150/student/' + array[i].gr_no + '.png>');
                                    newHTML.push('<span class="ChildName">' + array[i].call_name + '</span>');
                                    newHTML.push('<span class="childGS">' + array[i].gs_id + '</span> | <span class="stuStatus">' + array[i].std_status_code + '</span>');
                                    newHTML.push('</span>');
                                }
                                $(".eachChild").html(newHTML.join(""));
                                myTimeOut();
                            }else if(result["tapin"]=='Parent'){
                                if(result["parent_type_name"]=='Father'){
                                    $('#Generations_AjaxLoader').hide();
                                    $('.rf_default').css({'background-color':'white'});
                                    $('.rf_tapin').hide();
                                    $('.rf_tapout').hide();
                                    $('.family_info_mother').hide();
                                    $('#rfid_dec').val('');
                                    console.log('family_info_father');
                                    $('.family_info_father').show();
                                    $('#rfid_dec').val('');
                                    $('.rf_default').hide();
                                    // $('#fatherimg').css({'border':'red'});
                                    // $('#fatherimg').attr('src',result["fatherpic"]);
                                    // $('#father_name').text(result["Father_name"]);
                                    // $('#motherimg').attr('src',result["motherpic"]);
                                    // $('#mother_name').text(result["Mother_name"]);
                                    // myTimeOut();
                                     // if(result["parent_type"]=='Mother')
                                }
                                if(result["parent_type_name"]=='Mother'){
                                    // debugger;
                                    $('#Generations_AjaxLoader').hide();
                                    $('.rf_default').css({'background-color':'white'});
                                    $('.rf_tapin').hide();
                                    $('.rf_tapout').hide();
                                    $('.rf_default').hide();
                                    $('.family_info_father').hide();
                                    $('#rfid_dec').val('');
                                    console.log('family_info_mother');
                                    $('.family_info_mother').show();
                                    // debugger;
                                    // $('#fatherimg').attr('src',result["fatherpic"]);
                                    // $('#father_name').text(result["Father_name"]);
                                    // $('#motherimg').attr('src',result["motherpic"]);
                                    // $('#mother_name').text(result["Mother_name"]);
                                    // myTimeOut();
                                }
                                $('.fatherimg:visible').attr('src',result["fatherpic"]);
                                $('.father_name:visible').text(result["Father_name"]);
                                $('.motherimg:visible').attr('src',result["motherpic"]);
                                $('.mother_name:visible').text(result["Mother_name"]);
                                var array = result["stdfamilyinfo"].student;
                                var newHTML = [];
                                // debugger;
                                for (var i = 0; i < array.length; i++) {
                                    newHTML.push('<span class="childInfo" >');
                                    newHTML.push('<img id="child1_img" class="imageCenterDefaultChild" src=http://10.10.10.63/gs/assets/photos/sis/150x150/student/' + array[i].gr_no + '.png>');
                                    newHTML.push('<span class="ChildName">' + array[i].call_name + '</span>');
                                    newHTML.push('<span class="childGS">' + array[i].gs_id + '</span> | <span class="stuStatus">' + array[i].std_status_code + '</span>');
                                    newHTML.push('</span>');
                                }
                                $(".eachChild").html(newHTML.join(""));
                                myTimeOut();
                            }else if(result["tapin"]=='Admission'){
                                // debugger;
                                $('#Generations_AjaxLoader').hide();
                                // $('.rf_default').css({'background-color':'white'});
                                // $('.rf_tapin').hide();
                                // $('.rf_tapout').hide();
                                $('#rfid_dec').val('');
                                console.log('Admission');
                                // debugger;
                                // console.log(result['time']);
                                // // $('.rf_tapout').show();
                                // $('#rfid_dec').val('');
                                // $('.rf_default').show();
                                $('.rf_admission_tapout').show();
                                $('#admission_tapin_time').show();
                                $('#admission_tapout_time').show();
                                $('#admission_tapout_name').text('Admission Visitor Name : '+result["admission_name"]);
                                $('#admission_tapout_cardno').text('Admission Visitor CardNo : '+result["card_no"]); 
                                $('#admission_tapout_cardtypename').text('Type : '+result["cardtype_name"]);
                                $('#admission_tapout_purpose').text('For : '+result["purpose"]);
                                $('#admission_tapin_time').text('Time IN : '+result["timeIn"]);
                                $('#admission_tapout_time').text('Time OUT : '+result["time"]);
                                $('#admission_tapout_line').text('Thanks You For Visiting');
                                myTimeOut();
                                 // myStopTimeOut();
                                // if($('.rf_tapin:visible').length==0&&$('.rf_tapout:visible').length==0){
                                //     $('.rf_default').show();
                                // }
                            }else if(result["tapin"]=='Applicant'){
                                $('#Generations_AjaxLoader').hide();
                                // $('.rf_default').css({'background-color':'white'});
                                // $('.rf_tapin').hide();
                                // $('.rf_tapout').hide();
                                $('#rfid_dec').val('');
                                console.log('Applicant');
                                // debugger;
                                // console.log(result['time']);
                                // // $('.rf_tapout').show();
                                // $('#rfid_dec').val('');
                                // $('.rf_default').show();
                                $('.rf_admission_tapout').show();
                                $('#admission_tapin_time').show();
                                $('#admission_tapout_time').show();
                                $('#admission_tapout_name').text('Applicant Visitor Name : '+result["applicant_name"]);
                                $('#admission_tapout_cardno').text('Applicant Visitor CardNo : '+result["card_no"]); 
                                $('#admission_tapout_cardtypename').text('Type : '+result["cardtype_name"]);
                                $('#admission_tapout_purpose').text('For : '+result["purpose"]);
                                $('#admission_tapin_time').text('Time IN : '+result["timeIn"]);
                                $('#admission_tapout_time').text('Time OUT : '+result["time"]);
                                $('#admission_tapout_line').text('Thanks You For Visiting');
                                myTimeOut();
                                 // myStopTimeOut();
                                // if($('.rf_tapin:visible').length==0&&$('.rf_tapout:visible').length==0){
                                //     $('.rf_default').show();
                                // }
                            }else if(result["tapin"]=='Vendor'){
                                $('#Generations_AjaxLoader').hide();
                                // $('.rf_default').css({'background-color':'white'});
                                // $('.rf_tapin').hide();
                                // $('.rf_tapout').hide();
                                $('#rfid_dec').val('');
                                console.log('Vendor');
                                // debugger;
                                // console.log(result['time']);
                                // // $('.rf_tapout').show();
                                // $('#rfid_dec').val('');
                                // $('.rf_default').show();
                                $('.rf_admission_tapout').show();
                                $('#admission_tapin_time').show();
                                $('#admission_tapout_time').show();
                                $('#admission_tapout_name').text('Applicant Visitor Name : '+result["vendor_name"]);
                                $('#admission_tapout_cardno').text('Applicant Visitor CardNo : '+result["card_no"]); 
                                $('#admission_tapout_cardtypename').text('Type : '+result["cardtype_name"]);
                                $('#admission_tapout_purpose').text('For : '+result["purpose"]);
                                $('#admission_tapin_time').text('Time IN : '+result["timeIn"]);
                                $('#admission_tapout_time').text('Time OUT : '+result["time"]);
                                $('#admission_tapout_line').text('Thanks You For Visiting');
                                myTimeOut();
                                 // myStopTimeOut();
                                // if($('.rf_tapin:visible').length==0&&$('.rf_tapout:visible').length==0){
                                //     $('.rf_default').show();
                                // }
                            }else if(result["tapin"]=='Worker'){
                                $('#Generations_AjaxLoader').hide();
                                // $('.rf_default').css({'background-color':'white'});
                                // $('.rf_tapin').hide();
                                // $('.rf_tapout').hide();
                                $('#rfid_dec').val('');
                                console.log('Worker');
                                // debugger;
                                // console.log(result['time']);
                                // // $('.rf_tapout').show();
                                // $('#rfid_dec').val('');
                                // $('.rf_default').show();
                                $('.rf_admission_tapout').show();
                                $('#admission_tapin_time').show();
                                $('#admission_tapout_time').show();
                                $('#admission_tapout_name').text('Applicant Visitor Name : '+result["worker_name"]);
                                $('#admission_tapout_cardno').text('Applicant Visitor CardNo : '+result["card_no"]); 
                                $('#admission_tapout_cardtypename').text('Type : '+result["cardtype_name"]);
                                $('#admission_tapout_purpose').text('For : '+result["purpose"]);
                                $('#admission_tapin_time').text('Time IN : '+result["timeIn"]);
                                $('#admission_tapout_time').text('Time OUT : '+result["time"]);
                                $('#admission_tapout_line').text('Thanks You For Visiting');
                                myTimeOut();
                                 // myStopTimeOut();
                                // if($('.rf_tapin:visible').length==0&&$('.rf_tapout:visible').length==0){
                                //     $('.rf_default').show();
                                // }
                            }else if(result["tapin"]=='Guest'){
                                $('#Generations_AjaxLoader').hide();
                                // $('.rf_default').css({'background-color':'white'});
                                // $('.rf_tapin').hide();
                                // $('.rf_tapout').hide();
                                $('#rfid_dec').val('');
                                console.log('Guest');
                                // debugger;
                                // console.log(result['time']);
                                // // $('.rf_tapout').show();
                                // $('#rfid_dec').val('');
                                // $('.rf_default').show();
                                $('.rf_admission_tapout').show();
                                $('#admission_tapin_time').show();
                                $('#admission_tapout_time').show();
                                $('#admission_tapout_name').text('Applicant Visitor Name : '+result["guest_name"]);
                                $('#admission_tapout_cardno').text('Applicant Visitor CardNo : '+result["card_no"]); 
                                $('#admission_tapout_cardtypename').text('Type : '+result["cardtype_name"]);
                                $('#admission_tapout_purpose').text('For : '+result["purpose"]);
                                $('#admission_tapin_time').text('Time IN : '+result["timeIn"]);
                                $('#admission_tapout_time').text('Time OUT : '+result["time"]);
                                $('#admission_tapout_line').text('Thanks You For Visiting');
                                myTimeOut();
                                 // myStopTimeOut();
                                // if($('.rf_tapin:visible').length==0&&$('.rf_tapout:visible').length==0){
                                //     $('.rf_default').show();
                                // }
                            }else{
                                $('#Generations_AjaxLoader').hide();
                                $('.rf_default').css({'background-color':'red'});
                                $('#tapin_error').css({'color':'white'});
                                $('#tapin_error').css({'font-size':'30px'});
                                $('#tapin_error').text('Incorrect Card Data Not Found');
                                $('#rfid_dec').val('');
                                $('.rf_default').show();
                                console.log("ELSE CONDITION Inner");
                                myTimeOut();
                            }
                      },
                      error: function (result) {
                        parents_Interim_tap();
                        // $('#Generations_AjaxLoader').hide();
                        // $('.rf_default').css({'background-color':'red'});
                        // $('#tapin_error').css({'color':'white'});
                        // $('#tapin_error').css({'font-size':'30px'});
                        // $('#tapin_error').text('Incorrect Card Data Not Found');
                        // $('#rfid_dec').val('');
                        // $('.rf_default').show();
                        // console.log("ELSE CONDITION Main");
                        // myTimeOut();
                    }  
                })
                myStopTimeOut();

                // For Parent Dayass zzk
                //for Assgin DayPass Parents save data from ajax save data

                $('#Generations_AjaxLoader').show();
                function parents_Interim_tap(){
                    $.ajax({
                        cache:true,
                        url:"{{url('/tap_parent_save_data')}}",
                        data:{
                            "RFID": TapEventValue,
                            "location": 5, 
                        },
                        method:"GET",
                        success:function(data)
                        {   
                            if(data>0){
                                $('.rf_default').css({'background-color':'white'});
                                $('#rfid_dec').val('');
                                $('.rf_default').hide();
                                console.log('Parent TAPOUT');
                                $('#Generations_AjaxLoader').hide();  
                                $('.parent_div').fadeIn();  
                                $('.parent_div').html(data);
                                myTimeOut();
                            }
                            else{
                                $('#Generations_AjaxLoader').hide();
                                $('.rf_default').css({'background-color':'red'});
                                $('#tapin_error').css({'color':'white'});
                                $('#tapin_error').css({'font-size':'30px'});
                                $('#tapin_error').text('Parents Data Not Found');
                                $('#rfid_dec').val('');
                                $('.rf_default').show();
                                console.log("ELSE CONDITION Main");
                                myTimeOut();
                                // console.log('Parent else condition');
                                // $('.rf_tapout').hide();
                                // $('.rf_tapin').hide();
                                // $('#rfid_dec').val('');
                                // myTimeOut();
                                //zia
                            }
                        
                        },
                        error: function (result) {
                            $('#Generations_AjaxLoader').hide();
                            $('.rf_default').css({'background-color':'red'});
                            $('#tapin_error').css({'color':'white'});
                            $('#tapin_error').css({'font-size':'30px'});
                            $('#tapin_error').text('Incorrect Card Data Not Found');
                            $('#rfid_dec').val('');
                            $('.rf_default').show();
                            console.log("ELSE CONDITION Main");
                            myTimeOut();
                        
                        },
                        complete:function(){
                            
                        }
                    });
                }
                myStopTimeOut();

                // For Visitor Dayass zzk
                //for Assgin DayPass visitor save data from ajax save data
                // $('#Generations_AjaxLoader').show();
                //     $.ajax({
                //         cache:true,
                //         url:"{{url('/tap_visitor_save_data')}}",
                //         data:{
                //             "RFID": TapEventValue,
                //             "location": 5, 
                //         },
                //         method:"GET",
                //         success:function(data)
                //         {
                //             if(data>0){
                //                 $('.rf_default').css({'background-color':'white'});
                //                 // $('.rf_tapout').hide();
                //                 // $('.rf_tapin').hide();
                //                 $('#rfid_dec').val('');
                //                 $('.rf_default').hide();
                //                 console.log('Admission TAPOUT');
                //                 // $('.rf_tapin').show();
                //                 // $('#tapOut_time_admission').show();
                //                 // $("#tapOut_time_admission").css({"background-color": "red","color": "black"});
                //                 // $('#tapOut_time_admission').text('Card Not Found');
                //                 // console.log(data);
                //                 $('#Generations_AjaxLoader').hide();
                //                 // $('.parents_interimcard_modal').fadeOut(); 
                //                 // $('#tapOut_time_admission').html(data);
                //                 $('.parent_div').fadeIn();  
                //                 $('.parent_div').html(data);
                //                 // myTimeOut();
                //                 // $('.parents_interimcard_modal').html(data);
                //                 // console.log(data);
                //                 // $('#StaffList_ZiaKashif').html(data);
                //             }
                //             else{
                //                 $('#Generations_AjaxLoader').hide();
                //                 // $('.rf_tapout').hide();
                //                 // $('.rf_tapin').hide();
                //                 // $('#rfid_dec').val('');
                //                 // // myTimeOut();
                //                 // console.log('admission else conditiion');

                //             }
                //         },
                //         complete:function(){
                            
                //         }
                //     });
                // myStopTimeOut();
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
                            $('#tapOut_time_admission').hide();
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
            Interim_table();
        }
        else 
        {
            console.log("Error in tap_in_interim reposend");
        }


    });

    // Check Validation Addmission
    // $('#submit').click(function (e) {
    function check_validation_admission(e){
        var isValid = true;
        $('#admission_nic,#admission_name,#admission_mobile,#admission_applicant,#admission_grade,#admission_purpose').each(function () {
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
    //Addmission save data
    function admission_foam(){

        if($('#admission_rfid').val() != '' && $('#admission_rfid').val().length >9){ 
                //console.log("if");
                // $('#interim_dec').val('');
                // $('.defaultAssign').css({'background-color':'white'});
                // $('#ParentInterimCardTapmodal').modal({
                //     show: 'false'
                // });
                $('#Generations_AjaxLoader').show();
                var admission_nic = $("#admission_nic").val();
                var admission_name = $("#admission_name").val();
                var admission_mobile = $("#admission_mobile").val();
                var admission_purpose = $("#admission_purpose").val();
                var admission_applicant = $("#admission_applicant").val();
                var admission_grade = $("#admission_grade").val();
                var admission_rfid = $("#admission_rfid").val();
                var location = $("#location_id").val();
                var typeid = 2;

                //for Assgin DayPass Parents save data from ajax save data
                $.ajax({
                    cache:true,
                    url:"{{url('/admission_save_data')}}",
                    data:{ 
                        "admission_nic":admission_nic,
                        "admission_name":admission_name,
                        "admission_mobile":admission_mobile,
                        "admission_purpose":admission_purpose,
                        "admission_applicant":admission_applicant,
                        "admission_grade":admission_grade,
                        "location":location,
                        "typeid":typeid,
                        "admission_rfid":admission_rfid,
                        // "_token": "{{ csrf_token() }}",
                    },
                    method:"GET",
                    success:function(data)
                    {
                        debugger;
                        $('#Generations_AjaxLoader').hide();
                        $('#AdmissionDayPass').hide();
                        $('#AdmissionDayPassAssgin').show();
                        if(data["applicationerror"] == 'else inner')
                        {
                           $('#AdmissionDayPassAssgin').text('This Card Is Not Exsist in Database ');
                           // console.log('zk');
                        }
                        else if(data["applicationerror"] == "else main"){
                             $('#AdmissionDayPassAssgin').text('This Card Is Not Admission Visitor Card ');
                        }
                        else if(data["applicationerror"] == "pass"){
                             $('#AdmissionDayPassAssgin').text('Admission Data Save successfully');
                        }
                        else{
                            $('#AdmissionDayPassAssgin').text('Fail Admission Data Save successfully');
                            console.log(data["applicationerror"]);
                        }

                        // alert('Data save success');
                        // $('#Generations_AjaxLoader').hide();
                        // $('#AdmissionDayPass').hide();
                        // $('#AdmissionDayPassAssgin').show();
                        // $('#AdmissionDayPassAssgin').text('Admission Data Save successfully');

                        // $('.parents_interimcard_modal').fadeOut();  
                        // $('.parents_interimcard_modal').html(data);
                        // console.log('AdmissionDayPass');
                        // console.log(data);
                        myTimeOut();

                    // $('#StaffList_ZiaKashif').html(data);
                    },
                    complete:function(){
                        
                    },
                });
                myStopTimeOut();
                Visitor_Interim_table();

        }else{
                // $("#search_student_name").attr("placeholder", "Please select Student Name first");
                // $("#search_student_name").css({"background-color": "#f5ef3e","color": "black"});
        }
    
    }
    // });
    //Addmission RFID textbox value change event
    $('#admission_rfid').on('input', function() {
        check_validation_admission();
        admission_foam();
    
    });
    //Addmission button click event
    $('#admission_btn').click(function (e) {

        check_validation_admission();
        
    });

    // Check Validation Applicant
    function check_validation_applicant(){
        var isValid = true;
        $('#applicant_nic,#applicant_name,#applicant_mobile,#applicant_purpose,#applicant_rfid').each(function () {
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

    //Applicant Save data
    function applicant_foam(){

        if($('#applicant_rfid').val() != '' && $('#applicant_rfid').val().length >9){ 
                $('#Generations_AjaxLoader').show();
                var applicant_nic = $("#applicant_nic").val();
                var applicant_name = $("#applicant_name").val();
                var applicant_mobile = $("#applicant_mobile").val();
                var applicant_purpose = $("#applicant_purpose").val();
                var applicant_rfid = $("#applicant_rfid").val();
                var location = $("#location_id").val();
                var typeid = 3;

                //for Assgin DayPass Parents save data from ajax save data
                $.ajax({
                    cache:true,
                    url:"{{url('/applicant_save_data')}}",
                    data:{ 
                        "applicant_nic":applicant_nic,
                        "applicant_name":applicant_name,
                        "applicant_mobile":applicant_mobile,
                        "applicant_purpose":applicant_purpose,
                        "applicant_rfid":applicant_rfid,
                        "location":location,
                        "typeid":typeid,
                        // "_token": "{{ csrf_token() }}",
                    },
                    method:"GET",
                    success:function(data)
                    {    // debugger;
                        $('#Generations_AjaxLoader').hide();
                        $('#ApplicantDayPass').hide();
                        $('#ApplicantDayPassAssgin').show();
                        if(data["applicationerror"] == 'else inner')
                        {
                           $('#ApplicantDayPassAssgin').text('This Card Is Not Exsist in Database ');
                           console.log('zk');
                        }
                        else if(data["applicationerror"] == "else main"){
                             $('#ApplicantDayPassAssgin').text('This Card Is Not Applicant Visitor Card ');
                        }
                        else if(data["applicationerror"] == "pass"){
                             $('#ApplicantDayPassAssgin').text('Applicant Data Save successfully');
                        }
                        else{
                            $('#ApplicantDayPassAssgin').text('Fail Applicant Data Save successfully');
                            console.log(data["applicationerror"]);
                        }
                        // $('#Generations_AjaxLoader').hide();
                        // $('#ApplicantDayPass').hide();
                        // $('#ApplicantDayPassAssgin').show();
                        // $('#ApplicantDayPassAssgin').text('Applicant Data Save successfully');
                        // console.log('ApplicantDayPass');
                        // console.log(data);
                        myTimeOut();
                    },
                    complete:function(){ 
                    }
                    // error:function(){
                    //     $('#ApplicantDayPassAssgin').text(data);
                    //     // $('#ApplicantDayPassAssgin').text('Applicant Data Save successfully' +data["perror"]);
                    //     // console.log("Applicant");
                    // }
                });
                myStopTimeOut();
                Visitor_Interim_table();

        }else{
                // $("#search_student_name").attr("placeholder", "Please select Student Name first");
                // $("#search_student_name").css({"background-color": "#f5ef3e","color": "black"});
        }
    
    }

    //Applicant RFID textbox value change event
    $('#applicant_rfid').on('input', function() {
        check_validation_applicant();
        applicant_foam();
    
    });

    //Applicant button click event
    $('#applicant_btn').click(function (e) {

        check_validation_applicant();
        
    });

    // Check Validation Vendor
    function check_validation_vendor(){
        var isValid = true;
        $('#vendor_nic,#vendor_name,#vendor_mobile,#vendor_purpose,#vendor_visiting,#vendor_depart,#vendor_rfid').each(function () {
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

    //Vendor Save data
    function vendor_foam(){

        if($('#vendor_rfid').val() != '' && $('#vendor_rfid').val().length >9){ 
                $('#Generations_AjaxLoader').show();
                var vendor_nic = $("#vendor_nic").val();
                var vendor_name = $("#vendor_name").val();
                var vendor_mobile = $("#vendor_mobile").val();
                var vendor_purpose = $("#vendor_purpose").val();
                var vendor_visiting = $("#vendor_visiting").val();
                var vendor_depart = $("#vendor_depart").val();
                var vendor_rfid = $("#vendor_rfid").val();
                var location = $("#location_id").val();
                var typeid = 4;

                //for Assgin DayPass Parents save data from ajax save data
                $.ajax({
                    cache:true,
                    url:"{{url('/vendor_save_data')}}",
                    data:{ 
                        "vendor_nic":vendor_nic,
                        "vendor_name":vendor_name,
                        "vendor_mobile":vendor_mobile,
                        "vendor_purpose":vendor_purpose,
                        "vendor_visiting":vendor_visiting,
                        "vendor_depart":vendor_depart,
                        "vendor_rfid":vendor_rfid,
                        "location":location,
                        "typeid":typeid,
                        // "_token": "{{ csrf_token() }}",
                    },
                    method:"GET",
                    success:function(data)
                    {   // debugger;
                        $('#Generations_AjaxLoader').hide();
                        $('#VendorDayPass').hide();
                        $('#VendorDayPassAssgin').show();
                        if(data["applicationerror"] == 'else inner')
                        {
                           $('#VendorDayPassAssgin').text('This Card Is Not Exsist in Database ');
                           // console.log('zk');
                        }
                        
                        else if(data["applicationerror"] == "pass"){
                             $('#VendorDayPassAssgin').text('Vendor Data Save successfully');
                        }

                        else if(data["applicationerror"] == "else main"){
                             $('#VendorDayPassAssgin').text('This Card Is Not Vendor Visitor Card ');
                        }
                        else{
                            $('#VendorDayPassAssgin').text('Fail Applicant Data Save successfully');
                            console.log(data["applicationerror"]);
                        }
                        // $('#Generations_AjaxLoader').hide();
                        // $('#VendorDayPass').hide();
                        // $('#VendorDayPassAssgin').show();
                        // $('#VendorDayPassAssgin').text('Vendor Data Save successfully');
                        // console.log('VendorDayPass');
                        // console.log(data);
                        myTimeOut();
                    },
                    complete:function(){ 
                    }
                });
                myStopTimeOut();
                Visitor_Interim_table();

        }else{
                // $("#search_student_name").attr("placeholder", "Please select Student Name first");
                // $("#search_student_name").css({"background-color": "#f5ef3e","color": "black"});
        }
    
    }

    //Vendor RFID textbox value change event
    $('#vendor_rfid').on('input', function() {
        check_validation_vendor();
        vendor_foam();
    
    });

    //Vendor button click event
    $('#vendor_btn').click(function (e) {

        check_validation_vendor();
        
    });

    // Check Validation Worker
    function check_validation_worker(){
        var isValid = true;
        $('#worker_nic,#worker_name,#worker_mobile,#worker_purpose,#worker_visiting,#worker_depart,#worker_rfid').each(function () {
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

    //Worker Save data
    function worker_foam(){

        if($('#worker_rfid').val() != '' && $('#worker_rfid').val().length >9){ 
                $('#Generations_AjaxLoader').show();
                var worker_nic = $("#worker_nic").val();
                var worker_name = $("#worker_name").val();
                var worker_mobile = $("#worker_mobile").val();
                var worker_purpose = $("#worker_purpose").val();
                var worker_visiting = $("#worker_visiting").val();
                var worker_depart = $("#worker_depart").val();
                var worker_rfid = $("#worker_rfid").val();
                var location = $("#location_id").val();
                var typeid = 5;

                //for Assgin DayPass worker save data from ajax save data
                $.ajax({
                    cache:true,
                    url:"{{url('/worker_save_data')}}",
                    data:{ 
                        "worker_nic":worker_nic,
                        "worker_name":worker_name,
                        "worker_mobile":worker_mobile,
                        "worker_purpose":worker_purpose,
                        "worker_visiting":worker_visiting,
                        "worker_depart":worker_depart,
                        "worker_rfid":worker_rfid,
                        "location":location,
                        "typeid":typeid,
                        // "_token": "{{ csrf_token() }}",
                    },
                    method:"GET",
                    success:function(data)
                    {   
                        // debugger;
                        $('#Generations_AjaxLoader').hide();
                        $('#WorkerDayPass').hide();
                        $('#WorkerDayPassAssgin').show();
                        if(data["applicationerror"] == 'else inner')
                        {
                           $('#WorkerDayPassAssgin').text('This Card Is Not Exsist in Database ');
                           // console.log('zk');
                        }
                        else if(data["applicationerror"] == "pass"){
                             $('#WorkerDayPassAssgin').text('Worker Data Save successfully');
                        }
                        else if(data["applicationerror"] == "else main"){
                             $('#WorkerDayPassAssgin').text('This Card Is Not Worker Visitor Card ');
                        }
                        else{
                            $('#WorkerDayPassAssgin').text('Fail Applicant Data Save');
                            console.log(data["applicationerror"]);
                        }
                        // $('#WorkerDayPassAssgin').text('Worker Data Save successfully');
                        // console.log('WorkerDayPass');
                        // console.log(data);
                        myTimeOut();
                    },
                    complete:function(){ 
                    }
                });
                myStopTimeOut();
                Visitor_Interim_table();

        }else{
                // $("#search_student_name").attr("placeholder", "Please select Student Name first");
                // $("#search_student_name").css({"background-color": "#f5ef3e","color": "black"});
        }
    
    }

    //Worker RFID textbox value change event
    $('#worker_rfid').on('input', function() {
        check_validation_worker();
        worker_foam();
    
    });

    //Worker button click event
    $('#worker_btn').click(function (e) {

        check_validation_worker();
        
    });

    // Check Validation Guest
    function check_validation_guest(){
        var isValid = true;
        $('#guest_nic,#guest_name,#guest_mobile,#guest_purpose,#guest_visiting,#guest_depart,#guest_rfid').each(function () {
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

    //Guest Save data
    function guest_foam(){

        if($('#guest_rfid').val() != '' && $('#guest_rfid').val().length >9){ 
                $('#Generations_AjaxLoader').show();
                var guest_nic = $("#guest_nic").val();
                var guest_name = $("#guest_name").val();
                var guest_mobile = $("#guest_mobile").val();
                var guest_purpose = $("#guest_purpose").val();
                var guest_visiting = $("#guest_visiting").val();
                var guest_depart = $("#guest_depart").val();
                var guest_rfid = $("#guest_rfid").val();
                var location = $("#location_id").val();
                var typeid = 6;

                //for Assgin DayPass worker save data from ajax save data
                $.ajax({
                    cache:true,
                    url:"{{url('/guest_save_data')}}",
                    data:{ 
                        "guest_nic":guest_nic,
                        "guest_name":guest_name,
                        "guest_mobile":guest_mobile,
                        "guest_purpose":guest_purpose,
                        "guest_visiting":guest_visiting,
                        "guest_depart":guest_depart,
                        "guest_rfid":guest_rfid,
                        "location":location,
                        "typeid":typeid,
                        // "_token": "{{ csrf_token() }}",
                    },
                    method:"GET",
                    success:function(data)
                    {
                        // debugger;
                        $('#Generations_AjaxLoader').hide();
                        $('#GuestDayPass').hide();
                        $('#GuestDayPassAssgin').show();
                        if(data["applicationerror"] == 'else inner')
                        {
                           $('#GuestDayPassAssgin').text('This Card Is Not Exsist in Database ');
                           // console.log('zk');
                        }
                        else if(data["applicationerror"] == "pass"){
                             $('#GuestDayPassAssgin').text('Guest Data Save successfully');
                        }
                        else if(data["applicationerror"] == "else main"){
                             $('#GuestDayPassAssgin').text('This Card Is Not Guest Visitor Card ');
                        }
                        else{
                            $('#GuestDayPassAssgin').text('Fail Applicant Data Save');
                            console.log(data["applicationerror"]);
                        }

                        // $('#Generations_AjaxLoader').hide();
                        // $('#GuestDayPass').hide();
                        // $('#GuestDayPassAssgin').show();
                        // $('#GuestDayPassAssgin').text('Guest Data Save successfully');
                        // console.log('GuestDayPass');
                        // console.log(data);
                        myTimeOut();
                    },
                    complete:function(){ 
                    }
                });
                myStopTimeOut();
                Visitor_Interim_table();
        }else{
                // $("#search_student_name").attr("placeholder", "Please select Student Name first");
                // $("#search_student_name").css({"background-color": "#f5ef3e","color": "black"});
        }
    
    }

    //Guest RFID textbox value change event
    $('#guest_rfid').on('input', function() {
        check_validation_guest();
        guest_foam();
    
    });

    //Guest button click event
    $('#guest_btn').click(function (e) {

        check_validation_guest();
        
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
        }else if($(event.target).is('#location_id')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#location_id_parent')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#visitor_id')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#visiting_purpose')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#person_name')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#visiting_department')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#family_RFID_no')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('.visitorTypeClass')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#admission_nic')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#admission_name')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#admission_mobile')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#admission_purpose')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#admission_applicant')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#admission_grade')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#admission_rfid')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#applicant_nic')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#applicant_name')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#applicant_mobile')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#applicant_purpose')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#applicant_rfid')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#vendor_nic')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#vendor_name')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#vendor_mobile')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#vendor_purpose')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#vendor_visiting')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#vendor_depart')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#vendor_rfid')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#worker_nic')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#worker_name')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#worker_mobile')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#worker_purpose')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#worker_visiting')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#worker_depart')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#worker_rfid')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#guest_nic')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#guest_name')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#guest_mobile')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#guest_purpose')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#guest_visiting')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#guest_depart')){
            $("#rfid_dec").focusout();
        }else if($(event.target).is('#guest_rfid')){
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

    // Ajax For Staff Information
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

    //Function For ajax list click Staff
    $(document).on('click', '.staff_list_class', function(){  

        $('#search_staff_name').val($(this).text());
        $('#search_staff_id').val($(this).val());  
        $('#stafflist_ajax').fadeOut();

    });  

    //Ajax For Search Family Information
    $('#search_student_name').keyup(function(){ 
        var query = $(this).val();
        if( query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                cache:true,
                url:"{{url('/fetch_familylist_autocomplete')}}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data)
                {
                    //debugger;
                    $('#studentlist_ajax').fadeIn();  
                    $('#studentlist_ajax').html(data);
                }

            });
        } 
    });

        
    //Function For ajax list click family
    $(document).on('click', '.student_list_class', function(){ 
        console.log()
        $('#search_student_name').val($(this).text()); 

        // function getEventTarget(e) {
        //     e = e || window.event;
        //     return e.target || e.srcElement; 
        // }

        // var ul = document.getElementById('student_list_class');
        // ul.onclick = function(event) {
        //     var target = getEventTarget(event);
        //     alert(target.innerHTML);
        // }; 
        // $('#studentlist_ajax').text($(this).text());
        // $('#search_student_name').val($('.std_name').val());  
        $('#studentlist_ajax').fadeOut();

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