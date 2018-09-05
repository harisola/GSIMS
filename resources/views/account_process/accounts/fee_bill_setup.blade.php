<div id="content" style="opacity: 1;">
<link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
background-color: #d4d4d4 !important;
}
.shortField {
width: 80px;
}
#FeeStructure tbody tr td:first-child {
background: #e0e0e0;
}
#FeeStructure.table-bordered>thead>tr>th {
background: #888;
color: #fff;
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
                <span>Fee Bill Setup </span>
            </li>
        </ul>
    </div>
<!-- END PAGE BAR -->

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Session</h4>
            </div>
            <form action="#" id="form_sample_1">
                <div class="modal-body"> 
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Session Name</label>
                                    <input type="text" id="Session_name" name="Session_name" class="form-control" placeholder=" 2018-2019" value="" data-required="1" />
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Display Name</label>
                                    <input type="text" id="Academic_dname" name="Academic_dname" class="form-control" placeholder="2018-19" value="" />
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Session Start</label>
                                    <input type="date" id="Academic_Start_date" name="Academic_Start_date" class="form-control" placeholder="" value="" />
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Session End</label>
                                    <input type="date" id="Academic_End_date" name="Academic_End_date" class="form-control" placeholder="" value="" />
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div><!-- form-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal"> Close</button>
                    <button type="submit" class="btn green" id="AddNewSession">Add New Session </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-3 borderRightDashed">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered fixed-height marginBottom0 padding0 fixed-height-NoScroll">

            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Fee Bill Session</span>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Add new Session" id="profileDefinationAdd">Add Session</button>
                    </div>
                </div>
            </div>

            <div class="portlet-body customPadding">
                <div class="inputs">
                    <div class="portlet-input">
                        <div class="input-icon right">
                            <i class="icon-magnifier" style="right: 10px !important; "></i>
                            <input id="staffView_StaffList_Search" type="text" class="form-control form-control-solid" placeholder="Search..."> 
                        </div>
                    </div>
                </div><!-- inputs -->
                <input type="hidden" value="" id="Hidden_AS" name="Hidden_AS">
                <div class="table-scrollable table-scrollable-borderless" id="table_list_data">

                    <?php echo $ASlist; ?>

                </div>
            </div><!-- portlet-body -->
        </div><!-- portlet -->
    </div><!-- col-md-4 -->

<!-- Start of left side -->
    <div class="col-md-9 fixed-height" id="profileDetail_Left" style="display: none;">
            @include('account_process.accounts.fee_bill_setup_right_side_main')
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->
<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">


    var FormInputMask = function () {
    
    var handleInputMasks = function () {
        

           
     
        $("#Session_name").inputmask("mask", {
            "mask": "2099-2099"
        }); //specifying fn & options

        $("#Academic_dname").inputmask("mask", {
            "mask": "2099-99"
        }); //specifying fn & options
      
    }

   

    return {
        //main function to initiate the module
        init: function () {
            handleInputMasks();
            
        }
    };

}();




var pagefunction = function() {
Demo.init();
App.init();
FormInputMask.init(); // init metronic core componets





$(document).on("click", ".staffDefination_profile_id", function(){ 
var Academic_Session_ID = $(this).data("id");

$("#Hidden_AS").val(Academic_Session_ID);

$.ajax({
type:'POST',
data:{'_token': '{{ csrf_token() }}', 'ASID':Academic_Session_ID },
url:"{{url('/render_html_right_side')}}",
dataType: "json",
async: false,
cache: false,
success: function(response)
{
$('#profileDetail_Left').html('');
$('#profileDetail_Left').html(response.html);
$('#profileDetail_Left').show();
}
});



});

}

$(document).on("click", ".Installment_Setup", function(){ 
var Installment_Setup = $(this).data("id");


var Installment_Setup2 = $("#Hidden_AS").val();

$.ajax({
type:'POST',
data:{'_token': '{{ csrf_token() }}', 'ASID':Installment_Setup2 },
url:"{{url('/render_html_right_side_IS')}}",
dataType: "json",
async: false,
cache: false,
success: function(response)
{
$('#tab_15_2').html('');
$('#tab_15_2').html(response.html);

}
});


});



$(document).on("click", ".Installment_Others", function(){ 
var Installment_Setup = $(this).data("id");
var Installment_Setup2 = $("#Hidden_AS").val();


$.ajax({
type:'POST',
data:{'_token': '{{ csrf_token() }}', 'ASID':Installment_Setup2 },
url:"{{url('/render_html_right_side_Other')}}",
dataType: "json",
async: false,
cache: false,
success: function(response)
{
$('#tab_15_3').html('');
$('#tab_15_3').html(response.html);

}
});


});





$(document).on("click", "#btn_Fee_Structure", function(e){ 

e.preventDefault();

var Academic_Session_ID = $("#Hidden_AS").val();

bootbox.dialog({
message: "Are you sure you want?",
title: "Please Confirm.",
buttons: {
confirm: {
  label: "Yes! Updated",
  callback: function() { 
    
  
  $.ajax({
type:'POST',
data: {'_token': '{{ csrf_token() }}', 'Formdata': $("#registerSubmit").serialize() },
url:"{{url('/free_structure_post_data')}}",
dataType: "json",
async: false,
cache: false,
success: function(response)
{
console.log(response);





}
});



$.ajax({
type:'POST',
data:{'_token': '{{ csrf_token() }}', 'ASID':Academic_Session_ID },
url:"{{url('/render_html_right_side')}}",
dataType: "json",
async: false,
cache: false,
success: function(response)
{
$('#profileDetail_Left').html('');
$('#profileDetail_Left').html(response.html);
$('#profileDetail_Left').show();
}
});



}
},
cancel: {
  label: "Cancel",
  callback: function() { }
},

}
});













});

$(document).on("click", "#profileDefinationAdd", function(){
$('#basic').modal({  show: 'true',  backdrop: 'static', });
});

$(document).on("click", "#AddNewSession", function(e){
e.preventDefault();


bootbox.dialog({
message: "Are you sure you want?",
title: "Please Confirm.",
buttons: {
confirm: {
  label: "Yes! Add New Session",
  callback: function() { 
    
  
  $.ajax({
type:'POST',
data: {'_token': '{{ csrf_token() }}', 'Formdata': $("#form_sample_1").serialize() },
url:"{{url('/free_structure_post_data2')}}",
dataType: "json",
async: false,
cache: false,
success: function(response)
{
    
    $("#table_list_data").html('');
    $("#table_list_data").html(response.html);

     $('#form_sample_1')[0].reset();

}
});



}
},
cancel: {
  label: "Cancel",
  callback: function() { }
},

}
});



});










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
        </script>

        <!-- END PAGE LEVEL PLUGINS -->

        <!--================================================== -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <!-- END PAGE LEVEL PLUGINS --></div>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>