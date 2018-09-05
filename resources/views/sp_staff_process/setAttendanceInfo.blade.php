<link href="{{ URL::to('/css/ProfileDefinition.css') }}" rel="stylesheet" type="text/css" />
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #d4d4d4 !important;
}


</style>
<!-- Weekly Timesheet CSS END  -->
<!-- BEGIN PAGE BAR -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>SP Process</span>
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

<div class="col-md-12 no-padding" style="width: 335px; text-align: center; position: absolute; top: 40%; left: 40%; background: rgb(241, 239, 239); border: 1px solid rgb(204, 204, 204); padding: 10px; z-index:99999;display:none" id="Generations_AjaxLoader">
                        <img src="http://10.10.10.50/gs//components/image/gsLoader.gif" width="200"><br><hr style="margin: 7px 0;border-top: 1px solid #ccc;"> System updating time sheet...
                </div><!-- Start Content section -->


<div class="row marginTop20">
    <div class="col-md-12 fixed-height" id="" style="">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">SP Process</span>
                        </div>
                    </div><!-- portlet-title -->
                    <div class="portlet-body padding20">
                        <div class="form-body">
                        
                        <form action=""  id="">
                            <h4 class="form-section headingBorderBottom">Set Attendance Info</h4>
                            
                            <div class="row">

                                <div class="col-md-4 paddingBottom10">
                                    <div class="form-group">
                                        <label class="control-label col-md-5 text-right paddingRight0">Staff ID</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control" name="" id="staff_id" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 paddingBottom10">
                                    <div class="form-group">
                                        <label class="control-label col-md-5 text-right paddingRight0">From:</label>
                                        <div class="col-md-7">
                                            <input type="date" class="form-control" name="" id="from_date" value="<?php echo date('Y-m-d'); ?>" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4 paddingBottom10">
                                    <div class="form-group">
                                        <label class="control-label col-md-5 text-right paddingRight0">To:</label>
                                        <div class="col-md-7">
                                            <input type="date" class="form-control" name="" id="to_date" value="<?php echo date('Y-m-d'); ?>" >
                                        </div>
                                    </div>
                                </div>

                                <!--/span-->
                            </div><!-- -->
                            
                                <div class="col-md-12">
                                    <button type="button" class="btn blue" id="setAttendance">Initiate Process</button>
                                </div>

                            </form>                         
                        </div><!-- form-body -->
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

var pagefunction = function() {
    
    Demo.init();
    App.init();

    $(document).on('click','#setAttendance',function(){

        $('#Generations_AjaxLoader').show();
        var staff_id = $('#staff_id').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        $.ajax({
            type:"POST",
            cache:false,
            url:"{{url('/updateAttendanceStaff')}}",
            data:{
                "_token": "{{ csrf_token() }}",
                "staff_id":staff_id,
                "from_date":from_date,
                "to_date":to_date
            },
            success:function(e){
                $('#Generations_AjaxLoader').hide();
            }
        })
    });

}

loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){
                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
                                loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
                                    loadScript("{{URL::to('metronic')}}/global/plugins/jquery-validation/js/jquery.validate.min.js",function(){
                                         loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction)
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
<?php 
/************************************
* Another Example of Script loading
*************************************/ ?>

<!-- END PAGE LEVEL PLUGINS -->