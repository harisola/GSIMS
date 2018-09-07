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
            <span>Arrears & Adjustments</span>
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
.Adjustments {
    color: #1edc1e;
}
</style>
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-3">
        <div class="portlet light bordered padding0 marginBottom0">
            <div class="portlet-title">
                <div class="caption add_profile_label">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Add Arrears / Adjustments
                </div>
            </div><!-- portlet-title -->
            <div class="portlet-body customPadding">
                <div class="inputs">
                    <div class="portlet-input">
                        <div class="input-icon right">
                            <a class="icon-magnifier" id="btn_search" href="javascript:void(0)" onclick='fnClassList({{json_encode($class_list)}})'></a>
                            <input id="search_gsid" type="text" class="form-control form-control-solid" placeholder="GS-ID"> </div>
                    </div>
                </div>
                <hr />
                <form  id="arrear_form">
                    <div class="table-scrollable table-scrollable-borderless" id="Student_info_div_m">
                     <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div id="Student_info_div">
                                    <div class="float-left" style="width: 60px;float: left;">
                                        <img class="student-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="GF-ID: XX-XXX" src="assets/photos/sis/150x150/student/NoPic.png" width="50">
                                    </div>
                                    <div class="text-left" style="float: left;">
                                        <span class="primary-link tooltips sudent-info" data-container="body" data-placement="top" id="" data-original-title="GS-ID: XX-XXX" > No Record </span><br>

                                         <span class="class_Name GirlSta" style="margin-left:10px;">
                                            <span class="tooltips className" data-container="body" data-placement="top" data-original-title="">
                                            No Record</span>
                                            <span class="StuStatus tooltips" data-placement="top" data-original-title="Status: X" data-pin-nopin="true">X</span>
                                        </span>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr />
                    <div class="form-body">
                        <div class="row">
                         <input type="hidden" name="student_id"  />
                         <input type="hidden" name="updated_id" id="updated_id" />
                         <input type="hidden" name="arrear_flag" id="arrear_flag" />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="checkbox" id="switchChange2" class="make-switch" checked data-on-text="Arrears" data-off-text="Adjustments"><br />
                                     <i class="fa"></i>
                                    <input type="number" name="amount"  class="form-control" placeholder="Amount in Numbers" id="amount">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                     <i class="fa"></i>
                                    <textarea name="" id="description" class="form-control" placeholder="Write a desription here"></textarea>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="button" class="btn default">Cancel</button>
                        <button type="button" class="btn blue" id="add_arrears" onclick="arrearsAddUpdate()">
                            <i class="fa fa-check"></i> Add</button>
                    </div>
                    </div>
                </form>
                <div id="callout" style="display:none">
                    <div class="alert alert-success">
                        <h4>Data insert successfully</h4>
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
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Arrears & Adjustments
                        </div>
                    </div><!-- portlet-title -->
                    <div class="portlet-body padding20">
                        <div class="inputs">
                            <div class="portlet-input">
                                
                            </div>


                            <div class="theme-panel hidden-xs hidden-sm"  style="right:0px;margin-top: -79px !important;">
                                <div class="toggler" style="display: none;"> </div>
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
                        <table class="table table-bordered table-hover " width="100%" id="arrear_adjustment_table">
                            <thead>
                                <tr>
                                    <th class="text-center">GS-ID</th>
                                    <th class="text-center">Grade-Section</th>
                                    <th class="text-center">GF-ID</th>
                                    <th class="">Abridged Name<br /><small>Status</small></th>
                                    <th class="text-center">Arrears/(Adjustments)</th>
                                    <th class="">Description</th>
                                    <th class="">For Installment #</th>
                                    <th class="text-center">By</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="arrear_adjustment_table_body">
<!--                                 <tr>
                                    <td class="text-center">12-123</td>
                                    <td class="text-center">V-C</td>
                                    <td class="text-center">06-152</td>
                                    <td>Abdullah<br /><small>S-CFS</small></td>
                                    <td class="text-center">10,000</td>
                                    <td>Installment #2</td>
                                    <td class="text-center">ANA<br /><small>Thu, 19th July 2018</small></td>
                                    <td class="text-center"><a href="#">Edit</a></td>
                                </tr>
                                <tr>
                                    <td class="text-center">12-123</td>
                                    <td class="text-center">V-C</td>
                                    <td class="text-center">06-152</td>
                                    <td>Abdullah<br /><small>S-CFS</small></td>
                                    <td class="text-center"><span class="Adjustments">10,000</span></td>
                                    <td>Installment #2</td>
                                    <td class="text-center">ANA<br /><small>Thu, 19th July 2018</small></td>
                                    <td class="text-center"><a href="#">Edit</a></td>
                                </tr> -->
                                
                            </tbody>
                        </table>                        
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
    $('#search_gsid').inputmask({
        mask:'99-999',
        placeholder:'X'
    });
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

var fnClassList = function(data){
    App.startPageLoading();
    var data = jQuery.parseJSON(JSON.stringify(data));
    var searchString = $('#search_gsid').val();
    var stringToBeFound = ['X'];
    // Flag for SearchString contain X string or not
    var result =  stringToBeFound.filter(findElement => searchString.includes(stringToBeFound));
    if(typeof(result) === 'object' && result.length == 0){
        var findStudent = data.find(o => o.gs_id === searchString);
       
        // Student  
        if(typeof(findStudent) != 'undefined'){
            $('.student-pic').attr('src', "{{constant('STUDENT_PIC_150')}}"+findStudent.gr_no+".png");
            $('.student-pic').attr('data-original-title','GF-ID: '+findStudent.gfid);
            $('.sudent-info').text(findStudent.abridged_name);
            $('.sudent-info').attr('data-original-title','GS-ID: '+findStudent.gs_id);
            $('.className').text(findStudent.grade_dname+'-'+findStudent.section_dname);
            // Student Status Category
            if(findStudent.std_status_category == 'Student'){
                $('.StuStatus').text('S')
                $('.StuStatus').attr('data-original-title','Status: S');
            }else if(findStudent.std_status_category == 'Fence'){
                $('.StuStatus').text('F')
                $('.StuStatus').attr('data-original-title','Status: F');
            }else if(findStudent.std_status_category == 'Out'){
                $('.StuStatus').text('O')
                $('.StuStatus').attr('data-original-title','Status: O');
            }
            $('#amount').attr('disabled',false);
            $('#description').attr('disabled',false);
            $('#add_arrears').attr('disabled',false);
            $( "input[name=student_id]").val(findStudent.id);
            $('#updated_id').val('');
            $('#amount').val('');
            $('#description').val('');
            $("#switchChange2").bootstrapSwitch('state', true);
            App.stopPageLoading();
        }else{
            $('.student-pic').attr('src', "{{constant('STUDENT_PIC_150')}}NoPic.png");
            $('.student-pic').attr('data-original-title','GF-ID: ');
            $('.sudent-info').text('No Record Find');
            $('.sudent-info').attr('data-original-title','GS-ID: ');
            $('.className').text('No Record');
            $('.StuStatus').text('No Record');
            $('.StuStatus').attr('data-original-title','Status: No Record');
            $('#amount').attr('disabled',true);
            $('#description').attr('disabled',true);
            $('#add_arrears').attr('disabled',true);
            $( "input[name=student_id]").val();
            App.stopPageLoading();
        }
    }

}

 function arrearsAddUpdate(){

    App.startPageLoading();
    var selectedForm = $('#arrear_form');
    var updated_id = $('#updated_id').val();
    var arrear_flag = $('#arrear_flag').val();
    
    if($( "input[name=student_id]").val() == ''){
        alert('Please Enter the Student GS-ID');
        App.startPageLoading();
    }

    $(selectedForm).validate({              
        rules: {
            amount: {
                required: true
           }
        },
        messages: {
            amount:"Please Enter the amount"
        }
    }).form();

    // Get weather it is Adjustment Or Arrear  
    // Arrear = True
    // Adjustment = False

    var arrearAndAdjustmentState = 0;
    var  state = $('#switchChange2').bootstrapSwitch('state');
    state == true ? arrearAndAdjustmentState = 1 :  arrearAndAdjustmentState = 0;
    if(selectedForm.valid()){
        $.ajax({
            type:"POST",
            url:"{{ url('/addUpdateArrear') }}",
            data:{
                studentId:$( "input[name=student_id]").val(),
                state : arrearAndAdjustmentState,
                amount:$("input[name=amount]").val(),
                description:$('#description').val(),
                updated_id:updated_id,
                arrear_flag:arrear_flag,
                "_token": "{{ csrf_token() }}",
            },
            success:function(e){
                getArrearAndAdjustmentData();
                
                $('#search_gsid').val('');
                $( "input[name=student_id]").val('');
                $('#updated_id').val('');
                $('#amount').val('');
                $('#description').val('');
                $("#switchChange2").bootstrapSwitch('state', true);
                $('.student-pic').attr('src', "{{constant('STUDENT_PIC_150')}}NoPic.png");
                $('.student-pic').attr('data-original-title','GF-ID: ');
                $('.sudent-info').text('No Record Find');
                $('.sudent-info').attr('data-original-title','GS-ID: ');
                $('.className').text('No Record');
                $('.StuStatus').text('No Record');


                $('#callout').css('display','');
                $('#callout').fadeOut(3000);

            }
        });
    }
    App.stopPageLoading();
}


$( document ).ready(function() {
    App.startPageLoading();
    getArrearAndAdjustmentData();
    App.stopPageLoading();
});



 function  getArrearAndAdjustmentData() {

    $('#arrear_adjustment_table_body').html('');

    
    $.ajax({

            type:"POST",
            url:"{{ url('/getArrearAndAdjustmentData') }}",
            data:{
                "_token": "{{ csrf_token() }}",
            },
            success:function(e){
                var data = JSON.parse(e);
                console.log(data);
                var html = '';
                var  amount = '';
                for ( var i = 0 ; i < data.length ; i++ ){


                    data[i].arrears == 0 ? amount = '<span class="Adjustments">'+data[i].amount+'</span>' : amount = data[i].amount;

                    html += '<tr>';
                    html += '<td class="text-center">'+data[i].gs_id+'</td>';
                    html += '<td class="text-center">'+data[i].grade_name+'</td>';
                    html += '<td class="text-center">'+data[i].gfid+'</td>';
                    html += '<td class="text-center">'+data[i].abridged_name+'<br /><small>'+data[i].std_status_code+'</small></td>';
                    html += '<td class="text-center">'+amount+'</td>'
                    html += '<td class="text-center">'+data[i].description+'</td>';
                    html += '<td class="text-center">'+data[i].installment_no+'</td>';
                    html += '<td class="text-center">'+data[i].name_code+'<br /><small>'+data[i].created_date+'</small></td>';
                    html += '<td class="text-center"><a href="javascript:void(0)" onclick=updateArrear('+data[i].id+','+data[i].arrears+')>Edit</a></td>';
                    html += '</tr>';
                }

                $('#arrear_adjustment_table').append(html);

            }

    });

}

function updateArrear(data,arrears_flag){

    App.startPageLoading();
    $.ajax({

        type:"POST",
        url:"{{ url('/getArrearAndAdjustmentData') }}",
        data:{
            id:data,
            arrears_flag:arrears_flag,
            "_token": "{{ csrf_token() }}",
        },
        success:function(e){
            var jsonData = JSON.parse(e);
            var adjustment_amount = 0;
            $('#search_gsid').val(jsonData[0].gs_id);
            $('.student-pic').attr('src', "{{constant('STUDENT_PIC_150')}}"+jsonData[0].gr_no+".png");
            $('.student-pic').attr('data-original-title','GF-ID: '+jsonData[0].gfid);
            $('.sudent-info').text(jsonData[0].abridged_name);
            $('.sudent-info').attr('data-original-title','GS-ID: '+jsonData[0].gs_id);
            $('.className').text(jsonData[0].grade_name);
            // Student Status Category
            if(jsonData[0].std_status_category == 'Student'){
                $('.StuStatus').text('S')
                $('.StuStatus').attr('data-original-title','Status: S');
            }else if(jsonData[0].std_status_category == 'Fence'){
                $('.StuStatus').text('F')
                $('.StuStatus').attr('data-original-title','Status: F');
            }else if(jsonData[0].std_status_category == 'Out'){
                $('.StuStatus').text('O')
                $('.StuStatus').attr('data-original-title','Status: O');
            }


            if(jsonData[0].arrears == 0){
                $("#switchChange2").bootstrapSwitch('state', false);
                //adjustment_amount = jsonData[0].adjustment_amount.slice(1,jsonData[0].adjustment_amount.length);

            }else{
                $("#switchChange2").bootstrapSwitch('state', true);
                //adjustment_amount = jsonData[0].adjustment_amount;
            }

            $('#amount').val(jsonData[0].amount);
            $('#description').val(jsonData[0].description);
            $( "input[name=student_id]").val(jsonData[0].student_id);
            $('#updated_id').val(jsonData[0].id);
            $('#arrear_flag').val(jsonData[0].arrears);

        }

    });
    
    App.stopPageLoading();
}


    


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
                                        loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/jquery.inputmask.bundle.js",function(){

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
});

</script>

<!-- END PAGE LEVEL PLUGINS -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS --></div>

