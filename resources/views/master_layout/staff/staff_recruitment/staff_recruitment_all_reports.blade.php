<div id="content" style="opacity: 1;">
<link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #f1f1f1 !important;
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
            <span>HR Recruitment Report</span>
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
  background: #71A6A3;
  margin: -10px 0 0 0;
}
.DTFC_LeftHeadWrapper,
.DTFC_LeftBodyWrapper {
    background: #fff;
}
.DTFC_LeftBodyLiner .table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #ccc !important;
}
.portlet.light .dataTables_wrapper .dt-buttons {
    margin-top: 0px;
}
a.dt-button, button.dt-button, div.dt-button {
    background: #f1f1f1;
    margin-right: 10px;
    color: #000;
    border: 1px solid #ccc;
    font-size: 12px;
    padding: 6px 15px !important;
}
#sample_3 thead {
    background: #d5dbe4;
}
.dataTables_filter {
    margin-bottom: 10px;
}
</style>
<!-- Start Content section -->

     <div class="allocationArea">
               <ul class="nav nav-tabs">
                   <li class="active">
                       <a href="#staffInterim"  data-toggle="tab">Recruitment 2019 | Status Report 1</a>
                   </li>
                   <li>
                       <a href="#studentInterim" data-toggle="tab"> Recruitment 2019 | Status Report 2 </a>
                   </li>
                   
               </ul>
           <div class="tab-content">
               <div class="tab-pane fade active in" id="staffInterim">

                <form method="post" action="" id="filteration">
                    <div class="row marginTop20">
                        <div class="col-md-12 fixed-height" id="" style="">
                            <div class="row">
                                <div class="col-md-12 paddingRight0">
                                    <div class="portlet light bordered padding0 marginBottom0" >
                                        <div class="portlet-title">
                                            <div class="caption add_profile_label">
                                                <i class="icon-car font-dark"></i>
                                                <span class="caption-subject font-dark sbold uppercase caption_subject_profile"><u>HR Recruitment Report</u>
                                            </div>
                                        </div><!-- portlet-title -->
                                        <div class="row customRow">
                                              
                                              <div class="col-md-3" id="sectionFilter_container">
                                                <label>Start Date</label>
                                                
                                                    <input type="date" class="form-control" id="date_1" >

                                              </div>
                                              <div class="col-md-3">
                                                <label>End Date</label>
                                                
                                                <input type="date" class="form-control" id="date_2" >

                                              </div>
                                                  <div class="col-md-3">
                                                    <label>&nbsp;</label><br />
                                                    
                                                     <input type="button" id="filter_report" data-pdf="0" class="btn btn-group green filter_report" value="Generate Report" style="width: 100%;">
                                                  </div>
                                                </div><!-- row -->
                                            <div class="portlet-body padding20 " >
                                                <hr />
                                                <div class="row padding20 " id="CLear_all">
                                             
                                                </div><!-- row -->
                                            </div><!-- portlet-body -->
                                        </div><!-- portlet -->
                                    </div><!-- col-md-12 v-->
                                </div><!-- row -->
                            </div><!-- col-md-8 -->
                        </div><!-- row -->

                        </form>
                    </div>

                    
                        <!-- Tab Two Start -->

            <div class="tab-pane fade" id="studentInterim">
                 <form method="post" action="" id="filteration">
                    <div class="row marginTop20">
                        <div class="col-md-12 fixed-height" id="" style="">
                            <div class="row">
                                <div class="col-md-12 paddingRight0">
                                    <div class="portlet light bordered padding0 marginBottom0"  style="">
                                        <div class="portlet-title">
                                            <div class="caption add_profile_label">
                                                <i class="icon-car font-dark"></i>
                                                <span class="caption-subject font-dark sbold uppercase caption_subject_profile"><u>HR Recruitment Report</u>
                                            </div>
                                        </div><!-- portlet-title -->
                                        <div class="row customRow">


                                              <div class="col-md-3">
                                                <label>Start Date</label>
                                                
                                                    <input type="date" class="form-control" id="date_1" >

                                              </div>
                                              <div class="col-md-3">
                                                <label>End Date</label>
                                                
                                                <input type="date" class="form-control" id="date_2" >

                                              </div>



                                                <div class="col-md-3" id="departs_container" >
                                                <label>Department</label>
                                                <select id="departs" class="form-control departs" multiple="multiple">
                                                    <option value="" >Select Department</option>

                                                     <?php
                                                            foreach ($all_departments as $all_depart) {
                                                             ?>
                                                                <option value="<?php echo $all_depart->id; ?>"><?php echo $all_depart->departments; ?></option>
                                                            <?php
                                                             }
                                                            ?>
                                                          
                                                    </select>
                                              </div>


                                              <div class="col-md-3" id="sectionFilter_container">
                                                <label>Subject</label>
                                                <select id="subject" class="form-control subject">

                                                 <option value="" >Select Subject</option>>

                                                     <?php
                                                            foreach ($all_subjects as $all_subject) {
                                                             ?>
                                                                <option value="<?php echo $all_subject->id; ?>"><?php echo $all_subject->name; ?></option>
                                                            <?php
                                                             }
                                                            ?>
                                                          
                                                    </select>
                                              </div>
                                                <div class="col-md-3" id="sectionFilter_container" style="margin-top: 11px;">
                                                <label>Designation</label>
                                                <select id="desig" class="form-control desig">
                                                            <option value="" >Select Designation</option>

                                                     <?php
                                                            foreach ($all_designations as $all_desig) {
                                                             ?>
                                                                <option value="<?php echo $all_desig->id; ?>"><?php echo $all_desig->levels; ?></option>
                                                            <?php
                                                             }
                                                            ?>
                                                          
                                                    </select>
                                              </div>
                                              <div class="col-md-3" id="sectionFilter_container" style="margin-top: 11px;">
                                                <label>Campus</label>
                                                  
                                                <select id="campus" class="form-control campus">
                                                    <option value="" >Select Campus</option>
                                                            <option value="01">North</option>
                                                            <option value="02">South</option>
                                                          
                                                    </select>
                                              </div>
                                                <div class="col-md-3" id="sectionFilter_container" style="margin-top: 11px;">
                                                <label>Online/Walkin</label>

                                                <select id="Onlinew" class="form-control Onlinew">
                                                    <option value="" >Select Online/Walkin</option>
                                                            <option value="01">Online</option>
                                                            <option value="02">Walkin</option>
                                                          
                                                    </select>
                                              </div>
                                                  <div class="col-md-3">
                                                    <label>&nbsp;</label><br />
                                                    
                                                     <input type="button" id="filter_report_recuriment" data-pdf="0" class="btn btn-group green filter_report_recuriment" value="Generate Report" style="width: 100%;margin-top: 11px;">
                                                  </div>
                                                </div><!-- row -->
                                            <div class="portlet-body padding20 " >
                                                <hr />
                                                <!-- <div class="row padding20 " id="CLear_all"></div> -->
                                             <div class="row padding20 " id="all_filter_data">

                                               
                                                <!-- row -->
                                            </div><!-- portlet-body -->
                                        </div><!-- portlet -->
                                    </div><!-- col-md-12 v-->
                                </div><!-- row -->
                            </div><!-- col-md-8 -->
                        </div><!-- row -->

                        </form>
                             
                  </div>

                         

               
    </div><!-- col-md-8 -->
</div><!-- row -->


<!-- End content section -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->




<script type="text/javascript">


 $(document).ready(function() {



         $('#departs').multiselect({
         enableFiltering: true,
         filterBehavior: 'value',
         numberDisplayed: 1
             });

             })

            $(document).on("change", "#departs", function(){
             var depart_name = [];
            $.each($("#departs option:selected"), function(){            
               depart_name.push($(this).val());


               });
            });





 $(document).on("click",".filter_report",function(){
    $('#Generations_AjaxLoader').show();

        var formdata =      'date_1='+$('#date_1').val()
                              +'&date_2='+$('#date_2').val()
                               
                           console.log('form data=> '+formdata);
                            $.ajax({
                                type:'get',
                                 url:'/gsims/public/staff_recruitment_report',
                                data:formdata,
                                //dataType:'json',
                                success:function(data){
                                    // $("#CLear_all").html(data);
                                    console.log(data);
                                    
                                $('#Generations_AjaxLoader').hide();
                                 //var empty= '';
                                    if(data){
                                        // $('.report_table').html('');
                                        $('#CLear_all').html(data);
                                        //data = empty;
                                    }
                                   
                                    else{
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



 $(document).on("click",".filter_report_recuriment",function(){
    $('#Generations_AjaxLoader').show();

        var formdata =      'departs='+$('#departs').val()
                              
                            
                           console.log('form data=> '+formdata);
                            $.ajax({
                                type:'get',
                                 url:'/gsims/public/staff_recruitment_all_reports_data',
                                data:formdata,
                                //dataType:'json',
                                success:function(data){
                                    
                                    console.log(data);
                                    
                                $('#Generations_AjaxLoader').hide();
                                 //var empty= '';
                                    if(data){
                                        // $('.report_table').html('');
                                        $('#all_filter_data').html(data);
                                        //data = empty;
                                    }
                                   
                                    else{
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
