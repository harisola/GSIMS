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
#sample_4 th {
    background: #ebebeb;
    color: #888;
}
#sample_4 tbody tr td {vertical-align: middle;}
#sample_4_filter {float: right;margin-top: -75px;}
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
#sample_4_length {
    display: none;
}
#btn_search {
    right: 1px !important;
    float: right;
    background: #60b360;
    color: #fff;
    padding: 10px;
    position: absolute;
}
</style>
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
            <span>Remittance</span>
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
    <div class="col-md-3">
        <div class="portlet light bordered padding0 marginBottom0">
            <div class="portlet-title">
                <div class="caption add_profile_label">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Add Remittance
                    </div>
                </div><!-- portlet-title -->
                <div class="portlet-body customPadding">
                    <div class="inputs">
                        <div class="portlet-input">
                            <div class="input-icon right">
                                <a class="icon-magnifier" id="btn_search" href="javascript:void(0)"></a>
                                <input id="Search_Student" type="text" class="form-control form-control-solid" placeholder="GS-ID"> </div>
                            </div>
                        </div>
                        <hr />
                        <div class="table-scrollable table-scrollable-borderless" id="Student_info_div_m">
                            <table style="display: none;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div id="Student_info_div">
                                                <div class="float-left" style="width: 60px;float: left;">
                                                    <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="GF-ID: 12-145" src="assets/photos/sis/150x150/student/11157.png" width="50">
                                                </div>
                                                <div class="text-left" style="float: left;">
                                                    <span class="primary-link tooltips" data-container="body" data-placement="top" id="" data-original-title="GS-ID: 12-145"> S Daniyal Ahsan </span><br>

                                                    <span class="class_Name GirlSta" style="margin-left:10px;">
                                                        <span class="tooltips className" data-container="body" data-placement="top" data-original-title="">
                                                        III-K</span>
                                                        <span class="StuStatus tooltips" data-placement="top" data-original-title="Status: S" data-pin-nopin="true">S</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-actions right" style="display: none;">
                                <button type="button" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue" id="Create_Installment">
                                    <i class="fa fa-check"></i> Expected Remittance</button>
                                </div>
                            </div>
                        </div><!--portlet-body-->
                    </div><!-- portlet  -->
                </div><!-- col-md-3 -->
                <div class="col-md-9 fixed-height" id="profileDetail_Left" style="">
                    <div class="row">
                        <div class="col-md-12 paddingRight0">
                            <div class="portlet light bordered padding0 marginBottom0">
                                <div class="portlet-title">
                                    <div class="caption add_profile_label">
                                        <i class="icon-users font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Expected Remittance for Session <?php 
                                        echo $session[0]->Academic_Sesssion;
                                        ?>
                                        </div>
                                    </div><!-- portlet-title -->

                                    <div class="portlet-body padding20" id="remitance_right_side">
                                        

                                        <table class="table table-bordered table-hover " width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="">GS-ID</th>
                                                    <th class="">GF-ID</th>
                                                    <th class="">Abridged Name</th>
                                                    <th class="">Status</th>
                                                    <th class="">Father Name<br /><small>Mobile</small></th>
                                                    <th class="">Remmitance Check by</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($AS)): ?>
                                             <?php foreach($AS as $a ): ?>

                                                  <tr>
                                                    <td><?=$a->Gs_id;?></td>
                                                    <td><?=$a->Gf_id;?></td>
                                                    <td><?=$a->Abridged_name;?></td>
                                                    <td><?=$a->Status_;?></td>
                                                    <td><?=$a->Father_name;?><br /><small><?=$a->Father_Mobile;?></small></td>
                                                    <td><?=$a->Name_code;?><small><?=$a->Dated;?></small></td>

                                                </tr>
                                            <?php endforeach; ?>
                                           <?php endif;?>

                                              
                                                

                                                
                                            </tbody>
                                        </table>                        
                                    </div><!-- portlet-body -->
                                </div><!-- portlet -->
                            </div><!-- col-md-12 v-->
                        </div><!-- row -->
                    </div><!-- col-md-8 -->
                </div><!-- row -->
                <!-- End content section -->
<script type="text/javascript">
var FormInputMask = function () { 
var handleInputMasks = function () 
{ 
    $("#Search_Student").inputmask("mask", { "mask": "99-999" });  
} 
return { 
//main function to initiate the module
init: function () 
{
    handleInputMasks();
}

};

}();

var pagefunction = function() {
Demo.init();
App.init();
FormInputMask.init(); // init metronic core componets



$(document).on("click", "#btn_search", function(){
    var Gs_id = $("#Search_Student").val();
    if( Gs_id != '' ){
    App.startPageLoading(); 
    $.ajax({
       type:'POST',
       data: {'_token': '<?php echo e(csrf_token()); ?>', 'Gs_id':Gs_id },
       url:"<?php echo e(url('/remitance/search')); ?>",
       dataType: "json",
       async: false,
       cache: false,
       success: function(response)
       {
        $("#Student_info_div_m").html('');
        $("#Student_info_div_m").html(response.html);

        setTimeout(function(){ 
            App.stopPageLoading(); 
            $( "span" ).tooltip(); 
            $( "img" ).tooltip(); 
        }, 2000);

       }
    });
}

});


$(document).on("click", "#Create_Installment", function(e){ 
   
   var Sid = $("#Student_id").val();
   var Asid = $("#Academic_session_id").val();
   var Gs_id = $("#Gs_id").val();
   App.startPageLoading(); 
   $.ajax({
       type:'POST',
       data: {'_token': '<?php echo e(csrf_token()); ?>', 'Sid':Sid, 'Asid':Asid, 'Gs_id':Gs_id },
       url:"<?php echo e(url('/Create_Remittance')); ?>",
       dataType: "json",
       async: false,
       cache: false,
       success: function(response)
       {
        $("#Student_info_div_m").html('');
        $("#Student_info_div_m").html(response.html);
        rightSide();
        setTimeout(function(){ 

            App.stopPageLoading(); 
            $( "span" ).tooltip(); 
            $( "img" ).tooltip(); 

        }, 2000);

        $("#Search_Student").val('');
        $("#Student_id").val(0);
        $("#Academic_session_id").val(0);
        $("#Gs_id").val(0);


       }
    });


});


function rightSide()
{
$.ajax({
       type:'POST',
       data: {'_token': '<?php echo e(csrf_token()); ?>' },
       url:"<?php echo e(url('/remitance_right_side')); ?>",
       dataType: "json",
       async: false,
       cache: false,
       success: function(response)
       {
        $("#remitance_right_side").html('');
        $("#remitance_right_side").html(response.html);

       $('#sample_4').DataTable();

       


       }
    });
}



};



    loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/datatable.js", function(){
        loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-responsive.min.js", function(){
            loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/datatables.min.js", function(){
                loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
                    loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/profile.js", function(){
                        loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-managed.js", function(){
                            loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js", function(){
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