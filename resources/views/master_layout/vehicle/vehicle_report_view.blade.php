<div id="content" style="opacity: 1;">
<link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
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
            <span>Vehicle Report</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div>
        <div class="col-md-12 no-padding" style="width: 335px; text-align: center; position: absolute; top: 40%; left: 40%; background: rgb(241, 239, 239); border: 1px solid rgb(204, 204, 204); padding: 10px; z-index:99999;display:none" id="Generations_AjaxLoader">
                              <img src="http://10.10.10.50/gs//components/image/gsLoader.gif" width="200"><br><hr style="margin: 7px 0;border-top: 1px solid #ccc;"> Please Wait...
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
<form method="post" action="" id="filteration">
<div class="row marginTop20">
    <div class="col-md-12 fixed-height" id="" style="">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title">
                        <div class="caption add_profile_label">
                            <i class="icon-car font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Vehicle Report
                        </div>
                    </div><!-- portlet-title -->
                    <div class="row customRow">
                          <div class="col-md-3">
                            <label>Select Vehicle Type</label>
                            <select id="sectiontype" class="form-control sectiontype" >
                            <?php
                            foreach ($name as $type_modal) {
                             ?>
                                <option value="<?php echo $type_modal->id; ?>"><?php echo $type_modal->name; ?></option>
                            <?php
                             }
                            ?>
                            </select>
                          </div>
                          <div class="col-md-3" id="sectionFilter_container">
                            <label>Month</label>
                            <select id="sectionmonth" class="form-control sectionmonth">
                                        <option value="01">Jan</option>
                                        <option value="02">Feb</option>
                                        <option value="03">Mar</option>
                                        <option value="04">Apr</option>
                                        <option value="05">May</option>
                                        <option value="06">Jun</option>
                                        <option value="07">Jul</option>
                                        <option value="08">Aug</option>
                                        <option value="09">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                </select>
                          </div>
                          <div class="col-md-3">
                            <label>Year</label>
                            <select class="form-control" id="sectionyear">
                              <option value="2018">2017</option>
                              <option value="2018">2018</option>
                              <option value="2019">2019</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label>&nbsp;</label><br />
                            
                             <input type="button" id="filter_report" data-pdf="0" class="btn btn-group green filter_report" value="Generate Report" style="width: 100%;">
                          </div>

                          
                          
                          
                          
                          
                        </div><!-- row -->
                    <div class="portlet-body padding20 " >
                        <hr />
                        <div class="row padding20 " >
                         <table class="table table-bordered report_table"  id="sample_4">

                            

                          </table>
                          <!-- sample_4 -->

                        </div><!-- row -->
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->

</form>
<!-- End content section -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->


<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>




<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script type="text/javascript">


 $(document).on("click",".filter_report",function(){
    $('#Generations_AjaxLoader').show();
       
        var formdata =      'sectiontype='+$('#sectiontype').val()
                              +'&sectionmonth='+$('#sectionmonth').val()
                               +'&sectionyear='+$('#sectionyear').val()


                                 console.log('form data=> '+formdata);
                            $.ajax({
                                type:'get',
                                 url:'/gsims/public/VehicleReports',
                                data:formdata,
                                //dataType:'json',
                                success:function(data){
                                    console.log(data);
                                    
                                $('#Generations_AjaxLoader').hide();

                                    if(data){
                                        
                                        $('.report_table').html(data);
                                    }else{
                                         $('#rows').html("Filtered Rows : "+ 0 +" Row");
                                        $('#report_table').html('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td>Data not found.</td><td></td><td></td><td></td><td></td></tr>data not found');
                                        $('#query').html(data.query);
                                        //$('#sub_query').html(data.sub_query);
                                    }   
                                },
                                error:function(data){
                                    console.log(data.responseText); 
                                }
                            });
            
        });
       
 
//create event on click
 
               

                                 
                            

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
