<div id="content" style="opacity: 1;"><link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #d4d4d4 !important;
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
            <span>Fee Billing</span>
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
</style>
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-12 fixed-height" id="" style="">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">New Admissions for Session 19-20
                        </div>
                    </div><!-- portlet-title -->
                    <div class="row customRow">
                        	<div class="col-md-3">
                        		<label>Date from</label>
                        		<input type="date" placeholder="From" name="" required="required" class="form-control">
                        	</div>
                        	<div class="col-md-3" id="sectionFilter_container">
                        		<label>Date to</label>
                        		<input type="date" placeholder="To" name="" required="required" class="form-control">
                        	</div>
                        	<div class="col-md-3">
                        		<label>Grade</label>
                        		<select class="form-control" id="installment_number">
                                        <option value="All" selected="">All</option>
                                        <option value="PG">PG</option>
                                        <option value="PG">PN</option>
                                        <option value="PG">N</option>
                                        <option value="PG">KG</option>
                                        <option value="PG">I</option>
                                        <option value="PG">II</option>
                                        <option value="PG">III</option>
                                        <option value="PG">IV</option>
                                        <option value="PG">V</option>
                                        <option value="PG">VI</option>
                                        <option value="PG">VII</option>
                                        <option value="PG">VIII</option>
                                        <option value="PG">IX</option>
                                        <option value="PG">X</option>
                                        <option value="PG">XI</option>
                                        <option value="PG">A1</option>
                                        <option value="PG">A2</option>
                                </select>
                        	</div>
                        	<div class="col-md-3">
                            <label>&nbsp;</label><br />
                            <input type="button" id="" data-pdf="0" class="btn btn-group green" value="Get New Admissions" style="width: 100%;">
                          </div>
                        </div><!-- row -->
                    <div class="portlet-body padding20" >
                        <hr />
                        <div class="row padding20 fee_billing_result" >
                        	<table class="table table-bordered" id="sample_3">
                        		<thead>
                        			<tr>
                        				<th>S No.</th>
        				                <th>Form No</th>
                                        <th>GS ID</th>
                                        <th>GF-ID</th>
                                        <th>GT-ID</th>
                                        <th>Applicant Name</th>
                                        <th>Admission Fees</th>
                                        <th>Concession</th>
                                        <th>Re-enforcement</th>
                                        <th>Computer Subscription</th>
                                        <th>Security Deposit</th>
                                        <th>Total Payable</th>
                                        <th>Recieved Amount</th>
                                        <th>Date</th>
                                        <th>Grade of Admission</th>
                                        <th>Early Joining Date</th>
                                        <th>Early Joining Grade</th>
                                        <th>First Tap in on</th>
                        			</tr>
                        		</thead>
                        		<tbody>                                                       
                        			<tr>
                        				<td>1</td>
                        				<td>19/1111</td>
                        				<td>19-001</td>
                        				<td>19-002</td>
                        				<td>-</td>
                        				<td>Saleem Ahmed</td>
                        				<td>40,000</td>
                        				<td>C(TC) @ 50%</td>
                        				<td>10,000</td>
                        				<td>-</td>
                        				<td>15,000</td>
                        				<td>65,000</td>
                        				<td>65,000</td>
                        				<td>2nd Feb 2019</td>
                        				<td>PN</td>
                        				<td>20th Feb 2019</td>
                        				<td>PG</td>
                        				<td>23rd Feb 2019</td>
                        			</tr>
                        		</tbody>
                        	</table><!-- sample_4 -->


                        </div><!-- row -->
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->

<!-- End content section -->
<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">
    loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/datatable.js", function(){
        loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/datatables.min.js", function(){
            loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
                loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js", function(){

                    loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-managed.js", function(){
                        loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/bootbox/bootbox.min.js", function(){
                            

                                loadScript("http://10.10.10.50/gsims/public/metronic/layouts/layout/scripts/demo.min.js", function(){
                                    loadScript("http://10.10.10.50/gsims/public/js/jquery.filtertable.min.js", function(){
                                        
                                            loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/app.min.js", pagefunction)
                                        
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
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>