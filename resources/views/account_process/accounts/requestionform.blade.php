<div id="content" style="opacity: 1;"><link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #d4d4d4 !important;
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
ul.multiselect-container.dropdown-menu {
    left: 0px;
}
#sample_1 th {
            background: #ebebeb;
            color: #888;
        }
        #sample_1 tbody tr td {vertical-align: middle;}
        #sample_1_filter {float: right;}
        .btn-group>.dropdown-menu, .dropdown-toggle>.dropdown-menu, .dropdown>.dropdown-menu {
    margin-top: 10px;
    left: -117px;
}
#requestFormAdd tr td {vertical-align: middle;}
.bootstrap-switch .bootstrap-switch-handle-on, .bootstrap-switch .bootstrap-switch-handle-off, .bootstrap-switch .bootstrap-switch-label {
    padding: 5px 12px;
    line-height: 14px !important;
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
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="modal fade" id="allocateProfileModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body"> 
                    <div class="portlet light bordered marginBottom0 padding0 ">
            
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-users font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">Requisition Form</span>
                            </div>
                        </div>
                        <div class="portlet-body customPadding">
                            
                            <div class="inputs">
                                <div class="portlet-input">
                                    <label class="control-label">Items requested</label>
                                        <select id="example-filterBehavior" multiple="multiple">
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
                                    <?php /* ?><select class="col-md-12"  data-attribute="profile" multiple="multiple" id="requestList" class="ddlFilterTableRow layout-option form-control input-sm">
                                        <optgroup label="Stationary" >
                                            <option value="">Blue Ball Point</option>
                                            <option value="">Black Ball Point</option>
                                        </optgroup>
                                        <optgroup label="Construction" >
                                            <option value="">Black Cement</option>
                                            <option value="">White Cement</option>
                                            <option value="">Tile Bond</option>
                                        </optgroup>
                                        <optgroup label="Networking" >
                                            <option value="">Network Switch</option>
                                            <option value="">USB Cable</option>
                                            <option value="">USB Mouse</option>
                                            <option value="">USB Keyboard</option>
                                        </optgroup>
                                    </select><?php */ ?>
                                </div>
                            </div><!-- inputs -->
                            <hr />
                            <div class="col-md-12 padding0">
                                <table class="table table-bordered table-hover  dataTable no-footer" id="requestFormAdd">
                                    <thead>
                                        <tr>
                                            <td>Item Name</td>
                                            <td>Qty</td>
                                            <td width="100" style="text-align: center;">Urgent</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">X</a> &nbsp; Blue Ball Point</td>
                                            <td><input type="number"> Pc</td>
                                            <td><input type="checkbox" class="make-switch" data-on-text="Yes" data-off-text="No"></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">X</a> &nbsp; Black Ball Point</td>
                                            <td><input type="number"> Pc</td>
                                            <td><input type="checkbox" class="make-switch" data-on-text="Yes" data-off-text="No"></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">X</a> &nbsp; Black Cement</td>
                                            <td><input type="number"> Kg</td>
                                            <td><input type="checkbox" class="make-switch" data-on-text="Yes" data-off-text="No"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-12 padding0">
                                    <div class="form-group">
                                        <textarea class="col-md-12" placeholder="Additional Comments" rows="4"></textarea>
                                    </div>
                                </div><!-- col-md-12 -->
                                <div class="form-actions text-center" style="float: left;width: 100%;">
                                    <button type="button" class="btn default">Clear</button>
                                    <button type="submit" class="btn blue">
                                        <i class="fa fa-check"></i> Request & Print</button>
                                </div>
                            </div><!-- col-md-12 v-->
                        </div><!-- portlet-body -->
                    </div><!-- portlet -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div><!-- modal -->
    <div class="col-md-12 fixed-height" id="profileDetail_Left" style="">
        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Requisitions
                        </div>
                        <div class="actions">
                            <div class="btn-group " data-toggle="buttons">
                                <a class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="New Request form" data-toggle="modal" href="#allocateProfileModal" aria-describedby="tooltip657335">New Request</a>
                            </div>
                        </div>
                    </div><!-- portlet-title -->
                    <div class="portlet-body padding20">
                        <table class="table table-bordered table-hover " id="sample_1">
                        	<thead>
                        		<tr>
                        			<th>#</th>
                        			<th class="text-left">Requisition Number</th>
                        			<th class="text-left">Item Code</th>
                        			<th class="text-left">Item Description</th>
                        			<th class="text-center">Qty Req.</th>
                        			<th class="text-center">Section</th>
                        			<th class="text-center">Dated</th>
                        			<th class="text-center">Approver</th>
                        			<th class="text-center">Actions</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<tr>
                        			<td width="">1</td>
                        			<td class="text-left" width="100">1010458</td>
                        			<td class="text-left" width="100">1-5478-5</td>
                        			<td class="text-left" width="">Book/Register/Copies/Brochures - Rough Writing Pad Medium</td>
                        			<td class="text-center" width="100">10 pcs</td>
                        			<td class="text-center" width="100">Admin</td>
                        			<td class="text-center" width="100"><small>Mon, 07 Jul 2018</small></td>
                        			<td class="text-center" width="100">MHF</td>
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
                                                        <i class="icon-docs"></i> Edit </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> Delete </a>
                                                </li>
                                            </ul>
                                        </div>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td width="">2</td>
                        			<td class="text-left" width="100">1010457</td>
                        			<td class="text-left" width="100">1-5478-6</td>
                        			<td class="text-left" width=""><img src="img/urgentIcon.png" width="12" /> Ballpoint</td>
                        			<td class="text-center" width="100">10 pcs</td>
                        			<td class="text-center" width="100">Admin</td>
                        			<td class="text-center" width="100"><small>Mon, 07 Jul 2018</small></td>
                        			<td class="text-center" width="100">MHF</td>
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
                                                        <i class="icon-docs"></i> Edit </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> Delete </a>
                                                </li>
                                            </ul>
                                        </div>
                        			</td>
                        		</tr>
                        	</tbody>
                        </table>
                        <div class="TableLegend">
                            <small style="float: left;margin-right: 20px;"><span class="outofstockBox"></span> Out of Stock</small>
                            <small style="float: left;margin-right: 20px;"><span class="deliveredBox"></span> Delivered </small>
                            <small style="float: left;margin-right: 20px;"><img src="img/urgentIcon.png" width="12" /> Urgent </small>
                        </div>
                    </div><!-- portlet-body -->
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
        $('#example-filterBehavior').multiselect({
            enableFiltering: true,
            filterBehavior: 'value'
        });
    });
</script>

<script type="text/javascript">

    //Create all select box to multi select with checkbox 
    $('#requestList').multiselect({ numberDisplayed: 3 });
    
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