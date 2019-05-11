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
   /*table tr:nth-child(5n) {
     border-bottom:2px solid #ccc;  
   }*/
   table#as_reportTable tr:nth-child(2n) {
     border-bottom:2px solid #ccc;  
   }
   table tr th:nth-child(n+5) {
     /*width:100px !important;  */
   }
   #isa_reportTable_filter {
    float: right;
   }
   .reportUserImage {
        border-radius: 50% !important;
    border: 1px solid #000;
    width: 70px;
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
                    <input type="date" class="form-control" name="Date_From_Monthly" id="Date_From_Monthly" />
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Date to</label>
                    <input type="date" class="form-control" name="Date_To_Monthly" id="Date_To_Monthly" />
                  </div><!-- col-md-2 -->


                  <div class="col-md-2" id="container-Staff_name">
                    <label>Staff name</label>
                    

                    
                    <select id="txt_gt_id_asmry" multiple="multiple" class="txt_gt_id_asmry">
                       

                      <?php foreach ($staffinfo as $value) { ?>
                        <option value="<?php echo $value["Staff_id"]; ?>"><?php echo $value["abridged_name"]; ?></option>
                      <?php } ?>
                      
                      

                    </select>


                  </div><!-- col-md-2 -->
                  <div class="col-md-2" id="container-Designation">
                    <label>Designation</label>
                    <select id="designationFilter_asmry" multiple="multiple">
                      
                       <?php foreach ($TopLineBottomLine["Designation"] as $value) { ?>
                        <option value="<?php echo $value["Designation"]; ?>"><?php echo $value["Designation"]; ?></option>
                      <?php } ?>
                      
                    </select>
                  </div><!-- col-md-2 -->

                  <div class="col-md-2" id="container-Department">
                    <label>Department</label>
                    <select id="departmentFilter_asmry" multiple="multiple">
                       
                     
                       <?php foreach ($TopLineBottomLine["Department"] as $value) { ?>
                        <option value="<?php echo $value["Department"]; ?>"><?php echo $value["Department"]; ?></option>
                      <?php } ?>
                      
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2" id="container-Profile_name">
                    <label>Timing Profile</label>
                    <select id="timingProfileFilter_asmry" multiple="multiple">
                       <?php foreach ($TopLineBottomLine["Profile_name"] as $value) { ?>
                        <option value="<?php echo $value["Profile_id"]; ?>"><?php echo $value["Profile_name"]; ?></option>
                      <?php } ?>
                      
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>OC Level</label>
                    <select id="OCLevelFilter_asmry" multiple="multiple">
                       
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>OC Category</label>
                    <select id="OCCategoryFilter_asmry" multiple="multiple">
                     
                     
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Campus</label>
                    <select id="CampusFilter_asmry" multiple="multiple">
                      
                      <option value="1">North</option>
                      <option value="2">South</option>
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Category</label>
                    <select id="CategoryFilter_asmry" multiple="multiple">
                     
                      
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Status</label>
                    <select id="StatusFilter_asmry" multiple="multiple">
                       
                       
                         <?php foreach ($TopLineBottomLine["Status_Code"] as $value) { ?>
                        <option value="<?php echo $value["Status_id"]; ?>"><?php echo $value["Status_Code"]; ?></option>
                      <?php } ?>

                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>&nbsp;</label><br />
                    <input type="button" id="Generate_Fee_Bill_3" data-re_generate="0" class="btn btn-group green Generate_Fee_Bill_3" value="Generate Report Monthly" style="width: 100%;">
                  </div>
                </div><!-- row -->




                <div class="reportOutput padding20" id="Monthly_Attendance_Container">
                 
                </div><!-- -->


              </div><!-- portlet_tab1 -->





              <div class="tab-pane" id="portlet_tab2">
                <div class="row customRow">
                  <div class="col-md-2">
                    <label>Date from</label>
                    <input type="date" class="form-control" id="txt_gt_id_from_date">
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Date to</label>
                    <input type="date" class="form-control" id="txt_gt_id_to_date">
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Staff name</label>
                    <input type="text" placeholder="Staff Name" class="form-control" id="txt_gt_id">
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Designation</label>
                    <select id="as_designationFilter" multiple="multiple">
                      <option value="">All</option>
                      <option value="">PG</option>
                      <option value="">PN</option>
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Department</label>
                    <select id="as_departmentFilter" multiple="multiple">
                      <option value="">All</option>
                      <option value="">PG</option>
                      <option value="">PN</option>
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Timing Profile</label>
                    <select id="as_timingProfileFilter" multiple="multiple">
                      <option value="">All</option>
                      <option value="">PG</option>
                      <option value="">PN</option>
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>OC Level</label>
                    <select id="as_OCLevelFilter" multiple="multiple">
                      <option value="">All</option>
                      <option value="">PG</option>
                      <option value="">PN</option>
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>OC Category</label>
                    <select id="as_OCCategoryFilter" multiple="multiple">
                      <option value="">All</option>
                      <option value="">PG</option>
                      <option value="">PN</option>
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Campus</label>
                    <select id="as_CampusFilter" multiple="multiple">
                      <option value="">All</option>
                      <option value="">North</option>
                      <option value="">South</option>
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Category</label>
                    <select id="as_CategoryFilter" multiple="multiple">
                      <option value="">All</option>
                      <option value="">Domestic</option>
                      <option value="">Admin</option>
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Status</label>
                    <select id="as_StatusFilter" multiple="multiple">
                      <option value="">All</option>
                      <option value="">PG</option>
                      <option value="">PN</option>
                    </select>
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>&nbsp;</label><br />
                    <input type="button" id="" data-re_generate="0" class="btn btn-group green Generate_Fee_Bill_1" value="Generate Report Summary" style="width: 100%;">
                  </div>
                </div><!-- row -->
                <div class="reportOutput padding20">
                  <table class="table table-striped table-bordered table-hover" id="as_reportTable">
                    <thead>
                      <tr>
                        <th>GT ID</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>&nbsp;</th>
                        <th>Absent</th>
                        <th>Duration</th>
                        <th>Missed Tap</th>
                        <th>Total Penalty</th>
                        <th>Previous EL</th>
                        <th>Current EL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td rowspan="2">16-070</td>
                        <td rowspan="2">T-CPM</td>
                        <td rowspan="2">Muhammad Haris Ola</td>
                        <td rowspan="2">Development Coordinator</td>
                        <td rowspan="2">Software</td>
                        <td>Penalty</td>
                        <td>06:58 AM</td>
                        <td>06:56 AM</td>
                        <td>NA</td>
                        <td>06:58 AM</td>
                        <td>06:56 AM</td>
                        <td>06:58 AM</td>
                      </tr>
                      <tr>
                        <td>Days</td>
                        <td>04:02 PM</td>
                        <td>04:15 PM</td>
                        <td>NA</td>
                        <td>04:02 PM</td>
                        <td>04:15 PM</td>
                        <td>04:02 PM</td>
                      </tr>
                      <tr>
                        <td rowspan="2">15-076</td>
                        <td rowspan="2">T-CPM</td>
                        <td rowspan="2">Muhammad Faisal</td>
                        <td rowspan="2">Head</td>
                        <td rowspan="2">Digital Systems</td>
                        <td>Penalty</td>
                        <td>06:58 AM</td>
                        <td>06:56 AM</td>
                        <td>NA</td>
                        <td>06:58 AM</td>
                        <td>06:56 AM</td>
                        <td>06:58 AM</td>
                      </tr>
                      <tr>
                        <td>Days</td>
                        <td>04:02 PM</td>
                        <td>04:15 PM</td>
                        <td>NA</td>
                        <td>04:02 PM</td>
                        <td>04:15 PM</td>
                        <td>04:02 PM</td>
                      </tr>
                      <tr>
                        <td rowspan="2">16-070</td>
                        <td rowspan="2">T-CPM</td>
                        <td rowspan="2">Muhammad Haris Ola</td>
                        <td rowspan="2">Development Coordinator</td>
                        <td rowspan="2">Software</td>
                        <td>Penalty</td>
                        <td>06:58 AM</td>
                        <td>06:56 AM</td>
                        <td>NA</td>
                        <td>06:58 AM</td>
                        <td>06:56 AM</td>
                        <td>06:58 AM</td>
                      </tr>
                      <tr>
                        <td>Time Out</td>
                        <td>04:02 PM</td>
                        <td>04:15 PM</td>
                        <td>NA</td>
                        <td>04:02 PM</td>
                        <td>04:15 PM</td>
                        <td>04:02 PM</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- -->
              </div><!-- portlet_tab2 -->


              <!-- Staff Attendance Report -->
              <div class="tab-pane" id="portlet_tab3">

                <div class="row customRow">
                  <div class="col-md-2">
                    <label>Date from</label>
                    <input type="date" class="form-control" id="txt_sa_from_date">
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>Date to</label>
                    <input type="date" class="form-control" id="txt_sa_till_date">
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>GT ID</label>
                    <input type="text" placeholder="XX-XXX" class="form-control" id="txt_sa_gt_id">
                  </div><!-- col-md-2 -->
                  <div class="col-md-2">
                    <label>&nbsp;</label><br />
                    <input type="button" id="btn_staff_attendance" class="btn btn-group green" value="Generate Report" style="width: 100%;">
                  </div>
                </div><!-- row -->


                <div class="reportOutput padding20">

                 <div class="resultForInfo" id="Staff_Attendance_Container">

                 </div><!-- resultForInfo -->
              
              </div><!-- -->
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


<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS --></div>







<script type="text/javascript">

 $(document).ready(function() {
//masking function

// if ($('#txt_gs_id').length) {
//   $('#txt_gs_id').mask('99-9999', {
//     placeholder: 'X'
//   });
// }
    //Mask for GS-ID.
    

    $("#txt_gt_id").inputmask("mask", {
      "mask": "99-999"
    });


    $("#txt_gs_id").inputmask("mask", {
      "mask": "99-999"
    });

    $("#txt_sa_gt_id").inputmask("mask", {
      "mask": "99-999"
    });


     




     
      //Mask for GT-ID.


    /*$("#txt_gt_id_asmry").inputmask("mask", {
      "mask": "99-999"
    });*/
    
/*

    $('#txt_gt_id_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   }); */

   

    
    $('#as_designationFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_departmentFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_timingProfileFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_OCLevelFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_OCCategoryFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_CampusFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_CategoryFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_StatusFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });

    /* MOnthly Attendance Summary*/
    $('#designationFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#departmentFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#timingProfileFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#OCLevelFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#OCCategoryFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#CampusFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#CategoryFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#StatusFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
     



 
    

   

    /* Attendance Summary */
    $('#as_designationFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_departmentFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_timingProfileFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_OCLevelFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_OCCategoryFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_CampusFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_CategoryFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#as_StatusFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });

    /* MOnthly Attendance Summary*/
    $('#designationFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#departmentFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#timingProfileFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#OCLevelFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#OCCategoryFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#CampusFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#CategoryFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
    $('#StatusFilter').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
   });
//     $('#sectionFilter').multiselect({
//         enableFiltering: true, maxHeight: 200,
//         filterBehavior: 'value',
//         numberDisplayed: 1, enableCaseInsensitiveFiltering:true
//     });statusFilter
//     $('#statusFilter').multiselect({
//         enableFiltering: true, maxHeight: 200,
//         filterBehavior: 'value',
//         numberDisplayed: 1, enableCaseInsensitiveFiltering:true
//     });
});
//     //Create all select box to multi select with checkbox 
//     $('#requestList').multiselect({ numberDisplayed: 3 });
//     //$('#departFilter').multiselect({ numberDisplayed: 3 });

var pagefunction = function() {
  Demo.init();
  App.init();


$(document).on("click", "#btn_staff_attendance", function(){
var txt_sa_from_date  = $("#txt_sa_from_date").val();
var txt_sa_till_date  = $("#txt_sa_till_date").val();


var departmentFilter_asmry   = $("#departmentFilter_asmry").val();
var designationFilter_asmry  = $("#designationFilter_asmry").val();


var txt_sa_gt_id      = $("#txt_sa_gt_id").val();

var Report_Type='Staff_Attendance';





$.ajax({
      type:"POST",
      cache:true,
      beforeSend:function()
      { 
          App.startPageLoading(); 
      },
      url:"{{url('/reporst_staff_attendance')}}",
      data:{
          Gt_id:txt_sa_gt_id,
          From_date:txt_sa_from_date,
          Till_date:txt_sa_till_date,
          Report_Type:Report_Type,
          "_token": "{{ csrf_token() }}",
      },

      
      
      success:function(result)
      { 
        $("#Staff_Attendance_Container").html('');
        $("#Staff_Attendance_Container").html(result.html);
      },
      error: function() 
      { 
          // alert("Error occured.please try again");
          // $(placeholder).append(xhr.statusText + xhr.responseText);
          // $(placeholder).removeClass('loading');

      },
      complete: function() { App.stopPageLoading(); },
  });
            

});
    


 
 
    $('.txt_gt_id_asmry').multiselect({
      maxHeight: 200,
      buttonWidth:"100%",
      enableFiltering:true,
      enableCaseInsensitiveFiltering:true,
    });

 
   



/** Monthly Attendance **/

$(document).on("change", "#designationFilter_asmry", function(){ 
  var value = $(this).val();
  var DropdownType = "Designation";
  Create_Html_Ajax(DropdownType, value );
});


$(document).on("change", ".txt_gt_id_asmry", function(){ 
  var value = $(this).val();
  var DropdownType = "Staff_name";
  Create_Html_Ajax(DropdownType, value );
});



$(document).on("change", "#departmentFilter_asmry", function(){ 
  var value = $(this).val();
  var DropdownType = "Department";
  Create_Html_Ajax(DropdownType, value );
});
 




$(document).on("change", "#timingProfileFilter_asmry", function(){ 
  
  var value = $(this).val();
  
  var DropdownType = "Timing_Profile";
  
  Create_Html_Ajax(DropdownType, value );

});



function Create_Html_Ajax(DropdownType, value )
{

  var Date_From_Monthly    = $("#Date_From_Monthly").val();
  var Date_To_Monthly      = $("#Date_To_Monthly").val();

 


  $.ajax({
     
      type:"POST",
      cache:true,
      beforeSend:function()
      { 
          App.startPageLoading(); 
      },

      url:"{{url('/Create_Dw')}}",
      data:{
          DropdownType:DropdownType,
          value:value,
          From_date:Date_From_Monthly,
          Till_date:Date_To_Monthly,
          "_token": "{{ csrf_token() }}",
      },
      success:function(result)
      { 
        ReCreateDw(result,DropdownType);
         
      },
      error: function() 
      { 
        App.stopPageLoading();
      },
      complete: function() 
      { 
        App.stopPageLoading(); 
      },
    });



}



function ReCreateDw(result,DropdownType)
{

    if( DropdownType != 'Designation' )
    {

    
      $("#container-Designation").html('');
      $("#container-Designation").html(result.html);
      $('#designationFilter_asmry').multiselect({
       enableFiltering: true, maxHeight: 200,
       filterBehavior: 'value',
       numberDisplayed: 1, enableCaseInsensitiveFiltering:true
      });

    }


    if( DropdownType != 'Department' )
    {

    $("#container-Department").html('');
    $("#container-Department").html(result.h1);
    $('#departmentFilter_asmry').multiselect({
     enableFiltering: true, maxHeight: 200,
     filterBehavior: 'value',
     numberDisplayed: 1, enableCaseInsensitiveFiltering:true
    });


    }


     if( DropdownType != 'Timing_Profile' )
    {

      $("#container-Profile_name").html('');
      $("#container-Profile_name").html(result.h2);
      $('#timingProfileFilter_asmry').multiselect({
       enableFiltering: true, maxHeight: 200,
       filterBehavior: 'value',
       numberDisplayed: 1, enableCaseInsensitiveFiltering:true
      });

    }


    if( DropdownType != 'Staff_name' )
    {

      $("#container-Staff_name").html('');
      $("#container-Staff_name").html(result.h3);
      $('.txt_gt_id_asmry').multiselect({
       enableFiltering: true, maxHeight: 200,
       filterBehavior: 'value',
       numberDisplayed: 1, enableCaseInsensitiveFiltering:true
      });

  
    }
    





}


$(document).on("click", "#Generate_Fee_Bill_3", function(){

var Date_From_Monthly    = $("#Date_From_Monthly").val();
var Date_To_Monthly      = $("#Date_To_Monthly").val();
var txt_gt_id_asmry      = $("#txt_gt_id_asmry").val();
var departmentFilter_asmry   = $("#departmentFilter_asmry").val();
var designationFilter_asmry  = $("#designationFilter_asmry").val();
var Report_Type='Monthly_Attendance';


if( txt_gt_id_asmry == null )
{
  var txt_gt_id_asmry2 = [];
  $('select#txt_gt_id_asmry option').each(function(index, element) {
    txt_gt_id_asmry2.push($(this).val());
  })
  txt_gt_id_asmry = txt_gt_id_asmry2;
} 





$.ajax({
      type:"POST",
      cache:true,
      beforeSend:function()
      { 
          App.startPageLoading(); 
      },
      url:"{{url('/reporst_staff_attendance')}}",
      data:{
          Gt_id:txt_gt_id_asmry,
          From_date:Date_From_Monthly,
          Till_date:Date_To_Monthly,
          Report_Type:Report_Type,
          "_token": "{{ csrf_token() }}",
      },

      
      
      success:function(result)
      { 
        $("#Monthly_Attendance_Container").html('');
        $("#Monthly_Attendance_Container").html(result.html);
      },
      error: function() 
      { 
          App.stopPageLoading();

      },
      complete: function() { App.stopPageLoading(); },
  });
          

});


/** End Monthly Attendance **/

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