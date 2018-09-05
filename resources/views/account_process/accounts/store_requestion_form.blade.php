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
            <span>Requisitions Form</span>
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
#requestFormAdd thead {
	    background: #ebebeb;
    color: #888;
}
#requestFormAdd tbody tr td:nth-child(2n) {
	width: 90px;
}
#requestFormAdd tbody tr td:nth-child(2n) input {
	width: 50px;
}
.width50input {
    width: 70px !important;
    padding:  6px;
}
#sample_1 th {
    background: #ebebeb;
    color: #888;
}
#sample_1 tbody tr td {vertical-align: middle;}
#sample_1_filter {float: right;margin-top: -75px;}
.btn-group>.dropdown-menu, .dropdown-toggle>.dropdown-menu, .dropdown>.dropdown-menu {
    margin-top: 10px;
    left: -117px;
}
.tooltip {z-index: 99999}
.stockdelivered {
    border-left: 5px solid #1a881a;
}
.unattended {
    border-left: 5px solid #ffc904;
}
.outofstock {
    border-left: 5px solid #ce1111;
}
@media (min-width: 768px) {
    .modal-dialog {
        width: 980px;
        margin: 30px auto;
    }
}
.theme-panel>.toggler, .theme-panel>.toggler-close {
    padding: 15px !important;
}
.theme-panel .btn-group>.dropdown-menu, 
.theme-panel .dropdown-toggle>.dropdown-menu, 
.theme-panel .dropdown>.dropdown-menu {
    margin-top: 10px;
    left: -136px;
    width: 280px;
}
.theme-panel .btn-group>.dropdown-menu:before, 
.theme-panel .dropdown-toggle>.dropdown-menu:before, 
.theme-panel .dropdown>.dropdown-menu:before {
    left: 149px !important;
}
.theme-panel .btn-group>.dropdown-menu:after, 
.theme-panel .dropdown-toggle>.dropdown-menu:after, 
.theme-panel .dropdown>.dropdown-menu:after {
    left: 150px !important;
}
#sample_1_length {
    display: none;
}
.TableLegend {
    position: absolute;
    right: 22px;
    bottom: 60px;
}
span.unattendedBox {
    background: #ffc903;
    width: 10px;
    height: 10px;
    display: block;
    float: left;
    margin: 4px 4px 0 0;
}
span.outofstockBox {
    background: #ce1111;
    width: 10px;
    height: 10px;
    display: block;
    float: left;
    margin: 4px 4px 0 0;
}
span.deliveredBox {
    background: #1a881a;
    width: 10px;
    height: 10px;
    display: block;
    float: left;
    margin: 4px 4px 0 0;
}
</style>
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-12 fixed-height" id="profileDetail_Left" style="">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Requisitions
                        </div>
                    </div><!-- portlet-title -->
                    <div class="portlet-body padding20">
                        <div class="inputs">
                            <div class="portlet-input">
                                
                            </div>


                            <div class="theme-panel hidden-xs hidden-sm"  style="right:0px;margin-top: -79px !important;">
                                <div class="toggler"> </div>
                                <div class="toggler-close"> </div>
                                <div class="theme-options">
                                    <div class="theme-option">
                                        <span> Item </span>
                                        <select id="itemsFilter" multiple="multiple">
                                            <optgroup label="Stationary" >
                                                <option value="Blue Ball Point">Blue Ball Point</option>
                                                <option value="Black Ball Point">Black Ball Point</option>
                                            </optgroup>
                                            <optgroup label="Construction" >
                                                <option value="Black Cement">Black Cement</option>
                                                <option value="White Cement">White Cement</option>
                                                <option value="Tile Bond">Tile Bond</option>
                                            </optgroup>
                                            <optgroup label="Networking" >
                                                <option value="Network Switch">Network Switch</option>
                                                <option value="USB Cable">USB Cable</option>
                                                <option value="USB Mouse">USB Mouse</option>
                                                <option value="USB Keyboard">USB Keyboard</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="theme-option">
                                        <span> Section </span>
                                        <select multiple="multiple" id="sectionFilter" class="" >
                                            <option value="">A-Level</option>
                                            <option value="">Seniors</option>
                                            <option value="">Middlers</option>
                                            <option value="">Juniors</option>
                                            <option value="">Starters</option>
                                            <option value="">ICT</option>
                                            <option value="">Admin</option>
                                        </select>
                                    </div>
                                    <div class="theme-option">
                                        <span> Status </span>
                                        <select multiple="multiple" id="statusFilter" class="" >
                                            <option value="UnAttended">UnAttended</option>
                                            <option value="outofstock">Out of stock</option>
                                            <option value="delivered">Delivered</option>
                                        </select>
                                    </div>
                                    <div class="theme-option">
                                        <span> Campus </span>
                                        <select  data-attribute="campus" id="" class=" ddlFilterTableRow page-header-option form-control input-sm">
                                            <option value="South">South</option>
                                            <option value="North">North</option>
                                        </select>
                                    </div>
                                    <div class="theme-option">
                                        <span> Urgent Requests </span>
                                        <select  data-attribute="campus" id="" class=" ddlFilterTableRow page-header-option form-control input-sm">
                                            <option value="South">Yes</option>
                                            <option value="North">No</option>
                                        </select>
                                    </div>
                                    <div class="theme-option text-center" id="staffView_filter_btn">
                                        <a href="javascript:;" class="btn uppercase green-jungle applyFilter">Apply Filter</a>
                                        <a href="javascript:;" class="btn uppercase grey-salsa clearFilter">Clear Filter</a>
                                    </div>
                                    
                                </div><!-- theme-options -->
                            </div><!-- theme-panel -->
                        </div><!-- inputs -->
                        <table class="table table-bordered table-hover " id="sample_1">
                        	<thead>
                        		<tr>
                        			<th>#</th>
                        			<th class="text-left">Requisition Number</th>
                        			<th class="text-left">Item Code</th>
                        			<th class="text-left">Item Description</th>
                        			<th class="text-center">Qty Req.</th>
                        			<th class="text-center">Section</th>
                                    <th class="text-center">Requisitioner</th>
                        			<th class="text-center">Approver</th>
                                    <th class="text-center">Qty Issued</th>
                                    <th class="text-center">Last updated</th>
                                    <th class="text-center">Remarks</th>
                        			<th class="text-center">Actions</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<tr class="stockdelivered">
                        			<td width="">3</td>
                        			<td class="text-left" width="100">1010457</td>
                        			<td class="text-left" width="100">1-5478-6</td>
                        			<td class="text-left" width=""><span class="urgentItem"><img src="img/urgentIcon.png" width="12"> </span>Ballpoint </td>
                        			<td class="text-center" width="100">10 pcs</td>
                        			<td class="text-center" width="100">Admin</td>
                                    <td class="text-center" width="100"><span class="tooltips" data-placement="top" data-original-title="Atif Naseem">ANA</span><br /><small>Sat, 14 Jul 2018</small></td>
                        			<td class="text-center" width="100">MHF</td>
                                    <td class="text-center" width="100">05 pcs</td>
                                    <td class="text-center" width="100"><span class="tooltips" data-placement="top" data-original-title="Ameer Nawaz Khan">ANK</span><br /><small>Sat, 14 Jul 2018</small></td>
                                    <td class="text-center" width="100">Item delivered to Usman</td>
                        			<td class="text-left" width="80" style="vertical-align: middle;">
                        				<div class="btn-group" style="margin-top: -10px;">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> Print Requisition  </a>
                                                </li>
                                                <li>
                                                    <a class="tooltips " data-placement="bottom" data-original-title="Approve requisition" data-toggle="modal" href="#allocateProfileModal">
                                                        <i class="icon-tag"></i> Approve </a>
                                                </li>
                                            </ul>
                                        </div>
                        			</td>
                        		</tr>
                                <tr class="outofstock">
                                    <td width="">2</td>
                                    <td class="text-left" width="100">1010457</td>
                                    <td class="text-left" width="100">1-5478-6</td>
                                    <td class="text-left" width="">Ballpoint</td>
                                    <td class="text-center" width="100">10 pcs</td>
                                    <td class="text-center" width="100">Admin</td>
                                    <td class="text-center" width="100"><span class="tooltips" data-placement="top" data-original-title="Kashif Mustafa Solangi">KMS</span><br /><small>Mon, 07 Jul 2018</small></td>
                                    <td class="text-center" width="100"><span class="tooltips" data-placement="top" data-original-title="Muhammad Faisal">MHF</span></td>
                                    <td class="text-center" width="100">-</td>
                                    <td class="text-center" width="100"><span class="tooltips" data-placement="top" data-original-title="Ameer Nawaz Khan">ANK</span><br /><small>Sat, 14 Jul 2018</small></td>
                                    <td class="text-center" width="100">Item is out of stock and will be avaialble in the coming week.</td>
                                    <td class="text-left" width="80" style="vertical-align: middle;">
                                        <div class="btn-group" style="margin-top: -10px;">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> Print Requisition  </a>
                                                </li>
                                                <li>
                                                    <a class="tooltips " data-placement="bottom" data-original-title="Approve requisition" data-toggle="modal" href="#allocateProfileModal">
                                                        <i class="icon-tag"></i> Approve </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="unattended">
                                    <td width="">1</td>
                                    <td class="text-left" width="100">1010458</td>
                                    <td class="text-left" width="100">1-5478-5</td>
                                    <td class="text-left" width="">Book/Register/Copies/Brochures - Rough Writing Pad Medium</td>
                                    <td class="text-center" width="100">10 pcs</td>
                                    <td class="text-center" width="100">Admin</td>
                                    <td class="text-center" width="100">HOL<br /><small>Fri, 04 Jul 2018</small></td>
                                    <td class="text-center" width="100">MHF</td>
                                    <td class="text-center" width="100">-</td>
                                    <td class="text-center" width="100">-</td>
                                    <td class="text-center" width="100">-</td>
                                    <td class="text-left" width="80" style="vertical-align: middle;">
                                        <div class="btn-group" style="margin-top: -10px;">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-left" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print Requisition </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> Approve </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                        	</tbody>
                        </table>
                        <div class="TableLegend">
                            <small style="float: left;margin-right: 20px;"><span class="unattendedBox"></span> Unattended</small>
                            <small style="float: left;margin-right: 20px;"><span class="outofstockBox"></span> Out of Stock</small>
                            <small style="float: left;margin-right: 20px;"><span class="deliveredBox"></span> Delivered </small>
                            <small style="float: left;margin-right: 20px;"><img src="img/urgentIcon.png" width="12" /> Urgent </small>
                        </div>
                    </div><!-- portlet-body -->
                    <div class="modal fade" id="allocateProfileModal" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                 <h3 class="modal-title">Requisition Approval</h3>
                                </div>
                                <div class="modal-body"> 
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-user"></i><font id="selected_individuals"><small>Requisition Number:</small> <b>1010457</b></font></div>
                                        </div><!-- portlet-title -->
                                        <div class="portlet-body fixedHeightmodalPortlet">
                                            <table class="table table-bordered table-hover " id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-left">Item Code</th>
                                                        <th class="text-left">Item Description</th>
                                                        <th class="text-center">Qty Req.</th>
                                                        <th class="text-center">Availability</th>
                                                        <th class="text-center">Qty Issued</th>
                                                        <th class="text-center">Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="">1</td>
                                                        <td class="text-left" width="100">1-5478-5</td>
                                                        <td class="text-left" width=""><img src="img/urgentIcon.png" width="12" /> Book/Register/Copies/Brochures - Rough Writing Pad Medium</td>
                                                        <td class="text-center" width="100">10 pcs</td>
                                                        <td class="text-center" width="100">
                                                            <input type="checkbox" class="make-switch" checked data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>">
                                                        </td>
                                                        <td class="text-center" width="100"><input class="width50input" min="0" max="3" type="number"></td>
                                                        <td class="text-center" width="100"><textarea></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="">1</td>
                                                        <td class="text-left" width="100">1-5478-5</td>
                                                        <td class="text-left" width="">Book/Register/Copies/Brochures - Rough Writing Pad Medium</td>
                                                        <td class="text-center" width="100">10 pcs</td>
                                                        <td class="text-center" width="100">
                                                            <input type="checkbox" class="make-switch" checked data-on-text="<i class='tooltips fa fa-check' data-placement='bottom' data-original-title='In Store'></i>" data-off-text="<i class='fa fa-times'></i>">
                                                        </td>
                                                        <td class="text-center" width="100"><input class="width50input" min="0" max="3" type="number"></td>
                                                        <td class="text-center" width="100"><textarea></textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><!-- portlet-body fixedHeightmodalPortlet-->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                                    <button id="updateAllocateProfile" onclick="updateProfile()" type="button" class="btn dark btn-outline active" data-dismiss="">Update</button>
                                    <!--button type="button" class="btn green">Add Badge</button -->
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->








<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->




<script type="text/javascript">

$(document).ready(function() {
    $('#itemsFilter').multiselect({
        enableFiltering: true,
        filterBehavior: 'value',
        numberDisplayed: 1
    });
    $('#sectionFilter').multiselect({
        enableFiltering: true,
        filterBehavior: 'value',
        numberDisplayed: 1
    });statusFilter
    $('#statusFilter').multiselect({
        enableFiltering: true,
        filterBehavior: 'value',
        numberDisplayed: 1
    });
});
    //Create all select box to multi select with checkbox 
    $('#requestList').multiselect({ numberDisplayed: 3 });
    //$('#departFilter').multiselect({ numberDisplayed: 3 });
    
var pagefunction = function() {
    Demo.init();
    App.init();
};



loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/datatable.js", function(){
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

</script>
<!-- END PAGE LEVEL PLUGINS -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS --></div>