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
            <span>Accounts</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>New Admissions</span>
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
                        		<input type="date" placeholder="From" name="" id="from_date" required="required" class="form-control">
                        	</div>
                        	<div class="col-md-3" id="sectionFilter_container">
                        		<label>Date to</label>
                        		<input type="date" placeholder="To" name="" id="to_date" required="required" class="form-control">
                        	</div>
                        	<div class="col-md-3">
                        		<label>Grade</label>
                        		<select class="form-control" id="grade_name">
                                        <option value="" selected="">All</option>
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
                        	<div class="col-md-3">
                            <label>&nbsp;</label><br />
                            <input type="button" id="" data-pdf="0" class="btn btn-group green get_report" value="Get New Admissions" style="width: 100%;">
                          </div>
                        </div><!-- row -->
                    <div class="portlet-body padding20" >
                        <hr />
                        <div class="row padding20 result" >



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
url=window.location.pathname;

    $('.get_report').click(function(){
    var data=
    {
    'from_date':$('#from_date').val(),
    'to_date':$('#to_date').val(),
    'grade_name':$('#grade_name').val(),
    }
     App.startPageLoading();

$.ajax({
    data:data,
    method:'get',
    url: url+'/account_reports/admission_report',
    success:function(result){
        $('.result').html(result);
             App.stopPageLoading();

    }
})

})
</script>

        <!-- END PAGE LEVEL PLUGINS -->

        <!--================================================== -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <!-- END PAGE LEVEL PLUGINS --></div>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>