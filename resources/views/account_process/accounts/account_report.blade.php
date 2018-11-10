
<div id="content" style="opacity: 1;"><link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- Weekly Timesheet CSS -->
<script type="text/javascript">
    
</script>
<!-- <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js" type="text/javascript"></script> -->
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
.table-striped>tbody>tr:nth-of-type(odd) {
    /*background-color: #d4d4d4 !important;*/
}
.tabbable-custom>.tab-content {
    padding: 20px 0px 0px 0 !important;
}
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
}DetailsReceivingBillReport
#sample_4 th:first-child,
#sample_4 tbody tr td:first-child,
#IssuanceBillReport th:first-child,
#IssuanceBillReport tbody tr td:first-child,
#DetailsIssuanceBillReport th:first-child,
#DetailsIssuanceBillReport tbody tr td:first-child,
#RecevingBillReport th:first-child,
#ReceivingBillReport tbody tr td:first-child,
#DetailsReceivingBillReport th:first-child,
#DetailsReceivingBillReport tbody tr td:first-child {
    text-align:  left;
    background: #ebebeb;
    width: 300px;
    border: 1px solid #ccc;
    color: #888;
}
#sample_4 th,
#IssuanceBillReport th,
#DetailsIssuanceBillReport th,
#ReceivingBillReport th,
#DetailsReceivingBillReport th {
    background: #ebebeb;
    text-align: center;
    width: 300px;
    color: #888;
    border: 1px solid #ccc;
}
#sample_4 tbody tr td,
#IssuanceBillReport tbody tr td,
#DetailsIssuanceBillReport tbody tr td,
#ReceivingBillReport tbody tr td,
#DetailsReceivingBillReport tbody tr td {vertical-align: middle; text-align: center;}

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
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Fee Billing Reports
                        </div>
                    </div><!-- portlet-title -->
                    <div class="portlet-body" style="padding:12px 20px 15px;">
                        <div class="tabbable-custom ">
                            <ul class="nav nav-tabs ">
                                <li class="active">
                                    <a href="#tab_5_1" data-toggle="tab"> Issuance of Fee Bill </a>
                                </li>
                                <li>
                                    <a href="#tab_5_2" data-toggle="tab"> Details of Issuance </a>
                                </li>
                                <li>
                                    <a href="#tab_5_3" data-toggle="tab"> Receiving of Fee Bill </a>
                                </li>
                                <li>
                                    <a href="#tab_5_4" data-toggle="tab"> Details of Receiving </a>
                                </li>
                                <li>
                                    <a href="#tab_5_5" data-toggle="tab"> Ledger </a>
                                </li>
                                
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_5_1">
                                    <div class="row customRow">
                                        <div class="col-md-5">
                                            <label>Academic Year</label>
                                            <select class="form-control" id="">
                                                    <option value="">2018-19</option>
                                                    <option value="">2017-18</option>
                                                    <option value="">2016-17</option>
                                                    <option value="">2015-16</option>
                                                    <option value="">2014-15</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Installment Number</label>
                                            <select class="form-control" id="installment_number">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>&nbsp;</label><br />
                                            <input type="button" id="" data-pdf="0" class="btn btn-group green generate_report" value="Generate Report" style="width: 100%;">
                                        </div>
                                    </div><!-- row -->
                                    <div class="portlet-body padding20" >
                                        <div class="row padding20 fee_billing_result" >
                                            <table class="table table-bordered table-striped order-column" id="IssuanceBillReport">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;" width="200">Grade</th>
                                                        <th>Tuition Fee</th>
                                                        <th>Resources Fee</th>
                                                        <th>SC E. OPT DISC</th>
                                                        <th>Concession</th>
                                                        <th>Scholarship (A-Level)</th>
                                                        <th>Musakhar Charges</th>
                                                        <th>Yearly Charges</th>
                                                        <th>Smart Card Charges</th>
                                                        <th>Arrears without<br />Late Fee & Rollover Fee</th>
                                                        <th>Late Fee</th>
                                                        <th>Rollover Amount</th>
                                                        <th>Adjustments</th>
                                                        <th>Total Fees</th>
                                                        <th>Advance Tax</th>
                                                        <th>Grand Total with<br />Advance Tax</th>
                                                        <!-- <th> Remitance </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($report_data)) : ?>
                                                        <?php foreach ($report_data as $value) : ?> 
                                                        <tr>
                                                        <td><?=$value->Grade_name;?></td>
                                                        <td><?=$value->Total_Tuition_Fee_PG;?></td>
                                                        <td><?=$value->Total_resourdes_fee;?></td>
                                                        <td><?=$value->SCEOPTDISC;?></td>
                                                        <td><?=$value->Total_Concession_Amount;?></td>
                                                        <td><?=$value->Total_scholarship_amount;?></td>
                                                        <td><?=$value->Total_musakhar_charges;?></td>
                                                        <td><?=$value->Yearly_charges;?></td>
                                                        <td><?=$value->Total_card_charges;?></td>
                                                        <td><?=$value->ArrearswithoutLateFeeRolloverFee;?></td>
                                                        <td><?=$value->Total_late_received;?></td>
                                                        <td><?=$value->Total_rolover_charges;?></td>
                                                        <td><?=$value->Adjustments;?></td>
                                                        <td><?=$value->Total_Fees;?></td>
                                                        <td><?=$value->AdvanceTax;?></td>
                                                        <td><?=$value->GrandTotalwithAdvanceTax;?></td>
                                                        
                                                        </tr>
                                                        <?php endforeach; ?>  
                                                    <?php endif; ?>    
                                                </tbody>
                                            </table><!-- sample_4 -->
                                        </div><!-- row -->
                                    </div><!-- portlet-body -->
                                </div><!-- #tab_5_1 -->
                                <div class="tab-pane" id="tab_5_2">
                                    <div class="row customRow">
                                        <div class="col-md-2">
                                            <label>Academic Session</label>
                                            <select class="form-control" id="academic_session">
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Installment Number</label>
                                            <select class="form-control installment_number" >
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <label>GS ID</label>
                                            <input type="text" class="form-control gs_id" id="gs_id">
                                        </div>
                                        <div class="col-md-2">
                                            <label>GF ID</label>
                                            <input type="text" class="form-control gf_id" id="gf_id">
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <label>&nbsp;</label><br />
                                            <input type="button" id="" data-pdf="0" class="btn btn-group green issuance" value="Generate Report" style="width: 100%;">
                                        </div>
                                    </div><!-- row -->
                                    <div class="portlet-body padding20" >
                                        <div class="row padding20 fee_billing_result" >
                                            <table class="table table-striped table-bordered table-hover order-column dataTable no-footer" id="DetailsIssuanceBillReport">
                                                <thead>
                                                    <tr>
                                                        <th>S. No.</th>
                                                        <th>GS ID</th>
                                                        <th>GF ID</th>
                                                        <th>Status</th>
                                                        <th>Class</th>
                                                        <th>Name</th>
                                                        <th>Installment No.</th>
                                                        <th>Bill No.</th>
                                                        <th>Tuition Fee</th>
                                                        <th>Resources Fee</th>
                                                        <th>Musakhar Charges</th>
                                                        <th>Yearly Charges</th>
                                                        <th>Smart Card Charges</th>
                                                        <th>Arrears without<br />Late Fee & Rollover Fee</th>
                                                        <th>Late Fee</th>
                                                        <th>Rollover Amount</th>
                                                        <th>Total Fees without<br />Advance Tax</th>
                                                        <th>Advance Tax</th>
                                                        <th>Grand Total with<br />Advance Tax</th>
                                                        <th>Admission Fee</th>
                                                        <th>Security Deposit</th>
                                                        <th>Computer Subscription</th>
                                                        <th>Early/Preffered<br />Admission Offer</th>
                                                        
                                                        <!-- <th> Remitance </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>2.4</td>
                                                    </tr>
                                                    <tr>

                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>2.4</td>
                                                    </tr>
                                                </tbody>
                                            </table><!-- sample_4 -->
                                        </div><!-- row -->
                                    </div><!-- portlet-body -->
                                </div><!-- #tab_5_2 -->
                                <div class="tab-pane" id="tab_5_3">
                                    <div class="row customRow">
                                        <div class="col-md-5">
                                            <label>Academic Year</label>

                                            <select class="form-control" id="academic-id">
                                                @foreach($academic_session_id as $academic)
                                                    <option value="{{$academic->session_id}}">{{$academic->dname}}</option>
                                                @endforeach   
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Installment Number</label>
                                            <select class="form-control" id="installment_number-id">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>&nbsp;</label><br />
                                            <input type="button" id="" data-pdf="0" class="btn btn-group green receiving_report" value="Generate Report" style="width: 100%;">
                                        </div>
                                    </div><!-- row -->
                                    <div class="portlet-body padding20" >
                                        <div class="row padding20 fee_billing_result" >
                                            <table class="table table-bordered table-striped" id="ReceivingReportGrade">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;" width="200">Grade</th>
                                                        <th>Tuition Fee</th>
                                                        <th>Resources Fee</th>
                                                        <th>Concession</th>
                                                        <th>Scholarship (A-Level)</th>
                                                        <th>Musakhar Charges</th>
                                                        <th>Yearly Charges</th>
                                                        <th>Smart Card Charges</th>
                                                        <th>Arrears without<br />Late Fee & Rollover Fee</th>
                                                        <th>Late Fee</th>
                                                        <th>Rollover Amount</th>
                                                        <th>Adjustments</th>
                                                        <th>Total Fees</th>
                                                        <th>Advance Tax</th>
                                                        <th>Grand Total with<br />Advance Tax</th>
                                                        <th>Admission Fee</th>
                                                        <th>Security Deposit</th>
                                                        <th>Computer Subscription</th>
                                                        <th>Early/Preferred </br></th>
                                                        <!-- <th> Remitance </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                </tbody>
                                            </table><!-- sample_4 -->
                                        </div><!-- row -->
                                    </div><!-- portlet-body -->
                                </div><!-- #tab_5_5 -->
                                <div class="tab-pane" id="tab_5_4">
                                    <div class="row customRow">
                                        <div class="col-md-2">
                                            <label>Academic Year</label>
                                            <select class="form-control" id="academic-id">
                                                @foreach($academic_session_id as $academic)
                                                    <option value="{{$academic->session_id}}">{{$academic->dname}}</option>
                                                @endforeach   
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Installment Number</label>
                                            <select class="form-control" id="">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Class</label>
                                            <select class="form-control" id="grade">
                                                <option value="0" selected>Select Grade</option>
                                                @foreach($grade as $grade_id)
                                                    <option value="{{$grade_id->id}}">{{$grade_id->dname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Section</label>
                                            <select class="form-control" id="Clas">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>&nbsp;</label><br />
                                            <input type="button" id="" data-pdf="0" class="btn btn-group green " value="Generate Report" style="width: 100%;">
                                        </div>
                                    </div><!-- row -->
                                    <div class="portlet-body padding20" >
                                        <div class="row padding20 fee_billing_result" >
                                            <table class="table table-striped table-bordered table-hover order-column dataTable no-footer" id="DetailsReceivingBillReport">
                                                <thead>
                                                    <tr>
                                                        <th>S. No.</th>
                                                        <th>GS ID</th>
                                                        <th>GF ID</th>
                                                        <th>Status</th>
                                                        <th>Class</th>
                                                        <th>Name</th>
                                                        <th>Installment No.</th>
                                                        <th>Bill No.</th>
                                                        <th>Tuition Fee</th>
                                                        <th>Resources Fee</th>
                                                        <th>Musakhar Charges</th>
                                                        <th>Yearly Charges</th>
                                                        <th>Smart Card Charges</th>
                                                        <th>Arrears without<br />Late Fee & Rollover Fee</th>
                                                        <th>Late Fee</th>
                                                        <th>Rollover Amount</th>
                                                        <th>Total Fees without<br />Advance Tax</th>
                                                        <th>Advance Tax</th>
                                                        <th>Grand Total with<br />Advance Tax</th>
                                                        <th>Admission Fee</th>
                                                        <th>Security Deposit</th>
                                                        <th>Computer Subscription</th>
                                                        <th>Early/Preffered<br />Admission Offer</th>
                                                        <th>Fee Receiving Date</th>
                                                        <th>Mode of Payment<br />(Bank/Payorder/Foreign Remittance)</th>
                                                        <th>Bank Branch</th>
                                                        
                                                        <!-- <th> Remitance </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>2.4</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>2.4</td>
                                                    </tr>
                                                    <tr>

                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>2.4</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>2.4</td>
                                                    </tr>
                                                </tbody>
                                            </table><!-- sample_4 -->
                                        </div><!-- row -->
                                    </div><!-- portlet-body -->
                                </div><!-- #tab_5_4 -->
                                <div class="tab-pane" id="tab_5_5">
                                    <div class="row customRow">
                                        <div class="col-md-2">
                                            <label>Academic Year</label>
                                            <select class="form-control academic_session" id="Academic">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Installment Number</label>
                                            <select class="form-control installment_number" id="">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>GS-ID</label>
                                            <input type="text" class="form-control gs_id">
                                        </div>
                                        <div class="col-md-2">
                                            <label>&nbsp;</label><br />
                                            <input type="button" id="" data-pdf="0" class="btn btn-group green " value="Generate Report" style="width: 100%;">
                                        </div>
                                    </div><!-- row -->
                                    <div class="portlet-body padding20" >
                                        <div class="row padding20" >
                                        <div class="col-md-5">
                                            <table class="table table-striped table-bordered table-hover order-column dataTable no-footer" id="DetailsReceivingBillReport">
                                                <thead>
                                                    <tr>
                                                        <th>GS ID:</th><td></td>
                                                        </tr>
                                                        <tr>
                                                        <th>GF ID:</th><td></td>
                                                        </tr>
                                                        <tr>
                                                        <th>GR No:</th><td></td>
                                                        </tr>
                                                        <tr>
                                                        <th>Status:</th><td></td>
                                                        </tr>
                                                        <tr>
                                                        <th>Name:</th><td></td>
                                                        </tr>
                                                         <tr>
                                                        <th>Father Name</th><td></td>
                                                        </tr>
                                                         <tr>
                                                        <th>Academic Year.</th><td></td>
                                                        <!-- <th> Remitance </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table><!-- sample_4 -->
                                        </div>
                                            

                                        </div><!-- row -->
                                        <div class="row">
                                        <table class="table table-striped table-bordered table-hover order-column dataTable no-footer" id="DetailsReceivingBillReport">
                                        <thead>
                                        <tr>
                                                        
                                                        <th>Installment No.</th>
                                                        <th>Issuance Data</th>
                                                        <th>Fee Payable <br>(Fee + Tax)/th>
                                                        <th>Receiving Date</th>
                                                        <th>Fee Received</th>
                                                        <th>Late / Rollover Fee Received</th>
                                                        <th>Admission Fee Received Date</th>
                                                        <th>Admission Fee Received</th>
                                                        <th>Advance tax Received</th>
                                                        <th>Advance Fee Received Date</th>
                                                        <th>Advance Fee Received</th>
                                                        <th>Outstanding Balance</th>
                                                        
                                                        <!-- <th> Remitance </th> -->
                                                    </tr>
                                        </thead>
                                        </table>
                                            
                                        </div>
                                    </div><!-- portlet-body -->
                                </div><!-- #tab_5_4 -->
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->







<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->




<script type="text/javascript">

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
<!-- <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js" type="text/javascript"></script> -->


<!-- END PAGE LEVEL PLUGINS -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS --></div>
<script type="text/javascript" src="{{ url('/js/custom_script/data_element_extract.js') }}"></script>
<script type="text/javascript">
    var pagefunction = function(){
       var myTable =  $('#ReceivingReportGrade').dataTable({
            "ordering": false,
            "paging": false,
            "columnDefs": [
        {"className": "text-center", "targets": "_all"}
      ],
       });

        $('.receiving_report').click(function(){
            var academic_session_id = get_element_data('selectbox','#academic-id');
            var installment_id = get_element_data('selectbox','#installment_number-id');
            $.ajax({
                method:'get',
                data:{
                    academic_session_id:academic_session_id['value'],
                    installment_id:installment_id['value'],
                    '_token': '{{ csrf_token() }}'
                },
                url: url+'/account_reports/get_receiving_report',
                success:function(response){

                    var data = JSON.parse(response);
                    var installment_billing = data['installment_billing'];
                    var admission_billing = data['admission_billing'];
                    var preffered_bill = data['prefered_bill'];

                    installment_billing.forEach(function(arrayItem,index){
                        var prefered_amount = 0;
                     preffered_bill.forEach(function(preffered,preffered_index){
                        if(preffered.grade_id == arrayItem.grade_id){
                            prefered_amount = preffered.received_amount;
                        }
                     });  
                      myTable.fnAddData( 
                            [arrayItem.grade_dname,arrayItem.tution_fee,arrayItem.resource_fee,arrayItem.concession_amount,arrayItem.scholarship_amount,arrayItem.musakhar_charges,arrayItem.yearly_charges,arrayItem.smart_card_charges,arrayItem.fee_arrerars,arrayItem.late_fee,arrayItem.roll_over_charges,arrayItem.fee_adjustments,arrayItem.total_fee_without_adv_tax,arrayItem.advance_tax,arrayItem.total_fee_advance_tax,admission_billing[index].admission_amount,
                            admission_billing[index].security_deposit,arrayItem.lab_charges,prefered_amount]
                            );
                    });
                    
                }
            });

        });

        // Grade WISE RECEIVING REPORT

        $('#grade').on('change',function(e){
            var data = get_element_data('selectbox','#grade');
            $.ajax({
                method:'POST',
                data:{
                    'Grade_id':data['value'],
                    '_token': '{{ csrf_token() }}'
                },
                url: '{{url("student/Get_Section")}}',
                success:function(response){
                    console.log(response);
                }
            });
        });
    }
</script>
<script>
url=window.location.pathname;
data="";



$('.issuance').click(function(){
    var data=
    {
    'academic_session':$('#academic_session').val(),
    'installment_number':$('.installment_number').val(),
    'gs_id':$('.gs_id').val(),
    'gf_id':$('.gf_id').val(),
    }

    $.ajax({
    	data:data,
    	method:'get',
    	url: url+'/account_reports/issuance_report',
    	success:function(result){
    		$('.fee_billing_result').eq(1).html(result);
    	}
    })

});



</script>

