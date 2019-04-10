<div id="content" style="opacity: 1;"><link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #efefef !important;
}
</style>
<!-- Weekly Timesheet CSS END  -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Attendance</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Reports</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<style type="text/css">
.multiselect-selected-text {
    float: left;
}   
.caret {
    float: right;
    margin-top: 7px;
}
.multiselect.dropdown-toggle.btn.btn-default {
    width: 100%;
}
.multiselect-native-select .btn-group {
    width: 100% !important;
}
.multiselect-container {
    width: 100%;
}
#sample_4 th {
    background: #ebebeb;
    color: #888;
}
#sample_4 tbody tr td {vertical-align: middle;}

.btn-group>.dropdown-menu, .dropdown-toggle>.dropdown-menu, .dropdown>.dropdown-menu {
    margin-top: 10px;
    left: 0px;
}
.tooltip {z-index: 99999}
.customRow {
  padding: 20px;
  background: #e8bc40;
  margin: -10px 0 0 0;
}
.col-md-2 {
    margin-bottom: 22px;
}
.paddingBottom0 {
  padding-bottom: 0 !important;
}
.reportOutput {

}
table tr td {
	vertical-align:middle !important;
}
table tr:nth-child(5n) {
	border-bottom:2px solid #ccc;	
}
table tr th:nth-child(n+5) {
	width:100px !important;	
}
</style>

<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-12 fixed-height" id="" style="">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title tabbable-line paddingBottom0">
                        <div class="caption">
                            <i class="icon-share font-dark"></i>
                            <span class="caption-subject font-dark bold uppercase">Attendance Reports</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#portlet_tab3" data-toggle="tab"> Staff Attendance </a>
                            </li>
                            <li>
                                <a href="#portlet_tab2" data-toggle="tab"> Attendance Summary </a>
                            </li>
                            <li class="active">
                                <a href="#portlet_tab1" data-toggle="tab"> Monthly Attendance </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_tab1">
                                <div class="row customRow">
                                  <div class="col-md-2">
                                    <label>Date from</label>
                                    <input type="date" class="form-control" id="txt_gt_id">
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>Date to</label>
                                    <input type="date" class="form-control" id="txt_gt_id">
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>Staff name</label>
                                    <input type="text" placeholder="Staff Name" class="form-control" id="txt_gt_id">
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>Designation</label>
                                    <select id="designationFilter" multiple="multiple">
                                      <option value="">All</option>
                                      <option value="">PG</option>
                                      <option value="">PN</option>
                                    </select>
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>Department</label>
                                    <select id="departmentFilter" multiple="multiple">
                                      <option value="">All</option>
                                      <option value="">PG</option>
                                      <option value="">PN</option>
                                    </select>
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>Timing Profile</label>
                                    <select id="timingProfileFilter" multiple="multiple">
                                      <option value="">All</option>
                                      <option value="">PG</option>
                                      <option value="">PN</option>
                                    </select>
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>OC Level</label>
                                    <select id="OCLevelFilter" multiple="multiple">
                                      <option value="">All</option>
                                      <option value="">PG</option>
                                      <option value="">PN</option>
                                    </select>
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>OC Category</label>
                                    <select id="OCCategoryFilter" multiple="multiple">
                                      <option value="">All</option>
                                      <option value="">PG</option>
                                      <option value="">PN</option>
                                    </select>
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>Campus</label>
                                    <select id="CampusFilter" multiple="multiple">
                                      <option value="">All</option>
                                      <option value="">North</option>
                                      <option value="">South</option>
                                    </select>
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>Category</label>
                                    <select id="CategoryFilter" multiple="multiple">
                                      <option value="">All</option>
                                      <option value="">Domestic</option>
                                      <option value="">Admin</option>
                                    </select>
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>Status</label>
                                    <select id="StatusFilter" multiple="multiple">
                                      <option value="">All</option>
                                      <option value="">PG</option>
                                      <option value="">PN</option>
                                    </select>
                                  </div><!-- col-md-2 -->
                                  <div class="col-md-2">
                                    <label>&nbsp;</label><br />
                                    <input type="button" id="" data-re_generate="0" class="btn btn-group green Generate_Fee_Bill_1" value="Generate Report" style="width: 100%;">
                                  </div>
                                </div><!-- row -->
                                <div class="reportOutput padding20">
                                  <table class="table table-striped table-bordered table-hover" id="reportTable">
                                      <thead>
                                          <tr>
                                              <th>GT ID</th>
                                              <th>Status</th>
                                              <th>Name</th>
                                              <th>Designation</th>
                                              <th>Department</th>
                                              <th>&nbsp;</th>
                                              <th>Dec 21 - Tue</th>
                                              <th>Dec 22 - Wed</th>
                                              <th>Dec 23 - Thu</th>
                                              <th>Dec 24 - Fri</th>
                                              <th>Dec 25 - Sat</th>
                                              <th>Dec 26 - Sun</th>
                                              <th>Dec 27 - Mon</th>
                                              <th>Dec 28 - Tue</th>
                                              <th>Dec 29 - Wed</th>
                                              <th>Dec 30 - Thu</th>
                                              <th>Dec 31 - Fri</th>
                                              <th>Jan 01 - Sat</th>
                                              <th>Jan 02 - Sun</th>
                                              <th>Jan 03 - Mon</th>
                                              <th>Jan 04 - Tue</th>
                                              <th>Jan 05 - Wed</th>
                                              <th>Jan 06 - Thu</th>
                                              <th>Jan 07 - Fri</th>
                                              <th>Jan 08 - Sat</th>
                                              <th>Jan 09 - Sun</th>
                                              <th>Jan 10 - Mon</th>
                                              <th>Jan 11 - Tue</th>
                                              <th>Jan 12 - Wed</th>
                                              <th>Jan 13 - Thu</th>
                                              <th>Jan 14 - Fri</th>
                                              <th>Jan 15 - Sat</th>
                                              <th>Jan 16 - Sun</th>
                                              <th>Jan 17 - Mon</th>
                                              <th>Jan 18 - Tue</th>
                                              <th>Jan 19 - Wed</th>
                                              <th>Jan 20 - Thu</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td rowspan="5">16-070</td>
                                              <td rowspan="5">T-CPM</td>
                                              <td rowspan="5">Muhammad Haris Ola</td>
                                              <td rowspan="5">Development Coordinator</td>
                                              <td rowspan="5">Software</td>
                                              <td>Time In</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>NA</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                          </tr>
                                          <tr>
                                              <td>Time Out</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>NA</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                          </tr>
                                          <tr>
                                              <td>W Hr</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>0</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                          </tr>
                                          <tr>
                                              <td>Penalty</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>1</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                          </tr>
                                          <tr>
                                              <td>Remarks</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                          </tr>
                                          <tr>
                                              <td rowspan="5">15-076</td>
                                              <td rowspan="5">T-CPM</td>
                                              <td rowspan="5">Muhammad Faisal</td>
                                              <td rowspan="5">Head</td>
                                              <td rowspan="5">Digital Systems</td>
                                              <td>Time In</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>NA</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                          </tr>
                                          <tr>
                                              <td>Time Out</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>NA</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                          </tr>
                                          <tr>
                                              <td>W Hr</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>0</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                          </tr>
                                          <tr>
                                              <td>Penalty</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>1</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                          </tr>
                                          <tr>
                                              <td>Remarks</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                          </tr>
                                          <tr>
                                              <td rowspan="5">16-070</td>
                                              <td rowspan="5">T-CPM</td>
                                              <td rowspan="5">Muhammad Haris Ola</td>
                                              <td rowspan="5">Development Coordinator</td>
                                              <td rowspan="5">Software</td>
                                              <td>Time In</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>NA</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                              <td>06:58 AM</td>
                                              <td>06:56 AM</td>
                                          </tr>
                                          <tr>
                                              <td>Time Out</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>NA</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                              <td>04:02 PM</td>
                                              <td>04:15 PM</td>
                                          </tr>
                                          <tr>
                                              <td>W Hr</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>0</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                              <td>09:10</td>
                                              <td>09:00</td>
                                          </tr>
                                          <tr>
                                              <td>Penalty</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>1</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                              <td>0</td>
                                          </tr>
                                          <tr>
                                              <td>Remarks</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                              <td>-</td>
                                          </tr>
                                      </tbody>
                                  </table>
                                </div><!-- -->
                            </div><!-- portlet_tab1 -->
                            <div class="tab-pane" id="portlet_tab2">
                                <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                                    ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo. </p>
                                <p>
                                    <a class="btn red" href="ui_tabs_accordions_navs.html#portlet_tab2" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div><!-- portlet_tab2 -->
                            <div class="tab-pane" id="portlet_tab3">
                                <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                    consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
                                <p>
                                    <a class="btn blue" href="ui_tabs_accordions_navs.html#portlet_tab3" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div><!-- portlet_tab3 -->
                        </div><!-- tab-content -->
                    </div><!-- portlet-body -->
                </div><!-- portlet-->

            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->



<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->




<script type="text/javascript">

 $(document).ready(function() {
//masking function

// if ($('#txt_gs_id').length) {
//   $('#txt_gs_id').mask('99-9999', {
//     placeholder: 'X'
//   });
// }
    //Mask for GS-ID.
    $("#txt_gs_id").inputmask("mask", {
        "mask": "99-999"
      });

    //Mask for GT-ID.
    $("#txt_gt_id").inputmask("mask", {
        "mask": "99-999"
      });
    $('#designationFilter').multiselect({
       enableFiltering: true,
       filterBehavior: 'value',
       numberDisplayed: 1
    });
    $('#departmentFilter').multiselect({
       enableFiltering: true,
       filterBehavior: 'value',
       numberDisplayed: 1
    });
    $('#timingProfileFilter').multiselect({
       enableFiltering: true,
       filterBehavior: 'value',
       numberDisplayed: 1
    });
    $('#OCLevelFilter').multiselect({
       enableFiltering: true,
       filterBehavior: 'value',
       numberDisplayed: 1
    });
    $('#OCCategoryFilter').multiselect({
       enableFiltering: true,
       filterBehavior: 'value',
       numberDisplayed: 1
    });
    $('#CampusFilter').multiselect({
       enableFiltering: true,
       filterBehavior: 'value',
       numberDisplayed: 1
    });
    $('#CategoryFilter').multiselect({
       enableFiltering: true,
       filterBehavior: 'value',
       numberDisplayed: 1
    });
    $('#StatusFilter').multiselect({
       enableFiltering: true,
       filterBehavior: 'value',
       numberDisplayed: 1
    });
//     $('#sectionFilter').multiselect({
//         enableFiltering: true,
//         filterBehavior: 'value',
//         numberDisplayed: 1
//     });statusFilter
//     $('#statusFilter').multiselect({
//         enableFiltering: true,
//         filterBehavior: 'value',
//         numberDisplayed: 1
//     });
 });
//     //Create all select box to multi select with checkbox 
//     $('#requestList').multiselect({ numberDisplayed: 3 });
//     //$('#departFilter').multiselect({ numberDisplayed: 3 });
    
var pagefunction = function() {
    Demo.init();
    App.init();

};




loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/datatable.js", function(){
    loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-responsive.min.js", function(){
    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/datatables.min.js", function(){
        loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/profile.js", function(){
                loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-managed.js", function(){
                    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("http://10.10.10.50/gsims/public/metronic/layouts/layout/scripts/demo.min.js", function(){
                                loadScript("http://10.10.10.50/gsims/public/js/jquery.filtertable.min.js", function(){
                                    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js",function(){
                                         loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/app.min.js", pagefunction)
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
<!-- END PAGE LEVEL PLUGINS -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS --></div>
