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
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Fee Billing
                        </div>
                    </div><!-- portlet-title -->
                    <div class="row customRow">
                          <div class="col-md-3">
                            <label>Select Grade</label>
                            <select id="gradeFilter" multiple="multiple">

                                        <option data-grade_id="17"  value="PG">PG</option>
                                        <option data-grade_id="1" value="PN">PN</option>
                                        <option data-grade_id="2" value="N">N</option>
                                        <option data-grade_id="3" value="KG">KG</option>
                                        <option data-grade_id="4" value="I">I</option>
                                        <option data-grade_id="5" value="II">II</option>
                                        <option data-grade_id="6" value="III">III</option>
                                        <option data-grade_id="7" value="IV">IV</option>
                                        <option data-grade_id="8" value="V">V</option>
                                        <option data-grade_id="9" value="VI">VI</option>
                                        <option data-grade_id="10" value="VII">VII</option>
                                        <option data-grade_id="11" value="VIII">VIII</option>
                                        <option data-grade_id="12" value="IX">IX</option>
                                        <option data-grade_id="13" value="X">X</option>
                                      <option data-grade_id="14" value="XI">XI</option>
                                      <option data-grade_id="15" value="A1">A1</option>
                                      <option data-grade_id="16" value="A2">A2</option>
                                      <option data-grade_id="18"  value="18">All</option>
                                </select>
                          </div>
                          <div class="col-md-3" id="sectionFilter_container">
                            <label>Select Section</label>
                            <select id="sectionFilter" multiple="multiple">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                        <option value="I">I</option>
                                </select>
                          </div>
                          <div class="col-md-3">
                            <label>Installment Number</label>
                            <select class="form-control" id="installment_number">
<!--                                         <option value="1">1</option>
 -->                                        
 <!-- <option value="2">2</option> -->
                                        <!-- <option value="3">3</option> -->
                                        <!-- <option value="4">4</option> -->
                                        <!-- <option value="5">5</option> -->
                                        
                                        <option value="7">7</option>
                                </select>
                          </div>
                          <div class="col-md-2">
                            <label>&nbsp;</label><br />
                            <input type="button" id="Generate_Fee_Bill_1" data-pdf="0" class="btn btn-group green" value="Generate Fee Bill" style="width: 100%;">
                          </div>
                          <div class="col-md-1">
                            <label>&nbsp;</label><br />
                            <input type="button" id="export_pdf" data-pdf="1" class="btn btn-group green" value="PDF" style="width: 100%;">
                          </div>

                          <div class="col-md-12 text-center">
                            <h2>OR</h2>
                          </div><!-- col-md-12 -->
                          <div class="col-md-3">
                            <label>GS-ID</label>
                            <input type="text" class="form-control" value="" id="txt_gs_id">
                          </div>
                          <div class="col-md-3" id="">
                            <label>Select Student Status</label>
                            <select id="student_status"  class="form-control">
                                <option value="">Select Status</option>
                                <option value="21">S-CFS</option>
                                <option value="2">S-CPT</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label>GT-ID</label>
                            <input type="text" class="form-control" id="txt_gt_id">
                          </div>
                          <div class="col-md-2">
                            <label>&nbsp;</label><br />
                            <input type="button" id="" data-re_generate="1" class="btn btn-group green Generate_Fee_Bill_1" value="Re-Generate Fee Bill" style="width: 100%;">
                          </div>
                          <div class="col-md-1">
                            <label>&nbsp;</label><br />
                            <input type="button" id="" data-pvs_bills="1" class="btn btn-group green Generate_Fee_Bill_1" value="Previous Bills" style="width: 100%;">
                          </div>

                        </div><!-- row -->
                    <div class="portlet-body padding20" >
                        <hr />
                        <div class="row padding20 fee_billing_result" >
                          
                        </div><!-- row -->
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
     $('#gradeFilter').multiselect({
         enableFiltering: true,
         filterBehavior: 'value',
         numberDisplayed: 1
     });
     $('#sectionFilter').multiselect({
         enableFiltering: true,
         filterBehavior: 'value',
         numberDisplayed: 1
     });
     $('#statusFilter').multiselect({
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

$(document).on("change", "#gradeFilter", function(){

   var Grade_name = [];
   var Section_name = [];
   var Status_name = [];


   $.each($("#gradeFilter option:selected"), function(){ 
    Grade_name.push($(this).val());
   });


  //if ( $.inArray('18', Grade_name) > -1 ) 

  
 App.startPageLoading(); 

if(  Grade_name.length > 0 )
  {

var Grade_names_list   =  Grade_name.join(", ");
$("#sectionFilter_container").html('');
   

    $.ajax({
       type:'POST',
       data: {'_token': '<?php echo e(csrf_token()); ?>', 
       'Gname':Grade_names_list, 
      // 'Snames':Section_names_list, 
      // 'st':Status_names_list 
        },
       url:"<?php echo e(url('/generate_bill_1')); ?>",
       dataType: "json",
       async: false,
       cache: false,
       success: function(response)
       {
       
       
       $("#sectionFilter_container").html(response.html);
       
        setTimeout(function(){ App.stopPageLoading(); 
        $("#sectionFilter").multiselect('destroy');
        $("#sectionFilter").multiselect({
        nonSelectedText: 'Select Section',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'400px'
       });

        }, 1000);
        }
       });
}else {
 

  setTimeout(function(){ App.stopPageLoading(); 
        $("#sectionFilter").multiselect('destroy');
        $("#sectionFilter").multiselect({
        nonSelectedText: 'Select Section',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'400px'
       });

        }, 1000);
  $("#sectionFilter").hide();
  $("#sectionFilter").prop("disabled", true); 
}

  if(  Grade_name.indexOf('18') > -1 )
  {
  
    $("#sectionFilter").hide();
    $("#sectionFilter").prop("disabled", true);



  }else {
   
$("#sectionFilter").multiselect("enable");
$("#sectionFilter").show();
    

  }


});





$(document).on("change", "#sectionFilter", function(){
   var Grade_name = [];
   var Section_name = [];
   var Status_name = [];


   $.each($("#gradeFilter option:selected"), function(){            
   Grade_name.push($(this).val());
   });


   $.each($("#sectionFilter option:selected"), function(){            
   Section_name.push($(this).val());
   });


   /*$.each($("#statusFilter option:selected"), function(){            
   Status_name.push($(this).val());
   });*/

   var Grade_names_list   =  Grade_name.join(", ");
   var Section_names_list =  Section_name.join(", ");
 //  var Status_names_list  =  Status_name.join(", ");


$("#statusFilter_container").html('');
   App.startPageLoading(); 

    $.ajax({
       type:'POST',
       data: {'_token': '<?php echo e(csrf_token()); ?>', 
       'Gname':Grade_names_list, 
       'Snames':Section_names_list, 
      // 'st':Status_names_list 
        },
       url:"<?php echo e(url('/generate_bill_2')); ?>",
       dataType: "json",
       async: false,
       cache: false,
       success: function(response)
       {
        
        $("#statusFilter_container").html(response.html);
       
        setTimeout(function(){ App.stopPageLoading(); 
        $("#statusFilter").multiselect('destroy');
        $("#statusFilter").multiselect({
  nonSelectedText: 'Select Status',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });

        }, 1000);


        }
       });






});





$(document).on("click", "#Generate_Fee_Bill_1,#export_pdf,.Generate_Fee_Bill_1", function(){

   var Grade_name = [];
   var Section_name = [];
   var Status_name = [];
   var Grade_id = [];
   var installment_number=$('#installment_number').val();
   var gs_id=$('#txt_gs_id').val();
   var pdf="";
   var re_generate="";
   if($(this).data('re_generate')==1){
       re_generate=$(this).data('re_generate');
   }else{
       re_generate=0;
   }
   if($(this).data('pvs_bills')==1){
       pvs_bills=$(this).data('pvs_bills');
   }else{
       pvs_bills=0;
   }


   var current_url=window.location.href.split('public/')
   var base_url=current_url[0]+'public/';
   var studentStatus =  $( "#student_status option:selected" ).val();
   if($(this).data('pdf')==1){
      pdf=1;
   }else{
     pdf=0;
   }
  $.each($("#gradeFilter option:selected"), function(){            
   Grade_id.push($(this).data('grade_id'));
   });

   $.each($("#gradeFilter option:selected"), function(){            
   Grade_name.push($(this).val());
   });


   $.each($("#sectionFilter option:selected"), function(){            
   Section_name.push($(this).val());
   });


   $.each($("#statusFilter option:selected"), function(){            
   Status_name.push($(this).val());
   });

   var Grade_id_list  =  Grade_id.join(",");
   var Grade_names_list   =  Grade_name.join(", ");
   var Section_names_list =  Section_name.join(",");
   var Status_names_list  =  Status_name.join(", ");
   var txt_gs_id =          $("#txt_gs_id").val();

 // pdf=pdf.trim();
   App.startPageLoading(); 
 if(pdf=="1"){
       if(gs_id!==""){
              App.stopPageLoading(); 
             window.open(base_url+'accounts/get_student_generated_bills?gs_id='+gs_id+'&pdf='+pdf+'&billing_cycle_number='+installment_number)

        }else{
              App.stopPageLoading(); 
             window.open(base_url+'accounts/get_student_generated_bills?Grade_id='+Grade_id_list+ 
               '&Gname='+Grade_names_list+'&billing_cycle_number='+installment_number+'&Snames='+Section_names_list+'&st='+Status_names_list+'&txt_gs_id='+txt_gs_id+'&pdf='+pdf+'&status_code='+studentStatus+'&&re_generate'+re_generate
                )        }
 
  }else{

    if(gs_id!==""){
          var  myData={'_token': '<?php echo e(csrf_token()); ?>', 
                 'gs_id':gs_id, 
                 'pdf':pdf,
                 'billing_cycle_number':installment_number,
                 're_generate':re_generate,

                }    
    }else{
          var  myData={
                 '_token': '<?php echo e(csrf_token()); ?>', 
                 'Grade_id':Grade_id_list, 
                 'Gname':Grade_names_list,
                 'billing_cycle_number':installment_number, 
                 'Snames':Section_names_list, 
                 'st':Status_names_list,
                 'status_code':studentStatus,
                 'pdf':pdf,
                 're_generate':re_generate,
                 'pvs_bills':pvs_bills,
                }
    }

     $.ajax({
               type:'GET',
               data: myData,
               url:  base_url + 'accounts/get_student_generated_bills',
                success: function(response){
                  $('.fee_billing_result').html(response);
                  App.stopPageLoading();
                }
        
            });


    



       }
    

});



};

$(document).keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
    $('.Generate_Fee_Bill_1').click();
  }
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
