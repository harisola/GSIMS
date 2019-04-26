<div id="content" style="opacity: 1;"><link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #d4d4d4 !important;
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
<!-- Weekly Timesheet CSS END  -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Concession Definition</span>
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
    <div class="col-md-3 borderRightDashed">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered marginBottom0 padding0" id="add_height_con">
            
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Add Concession</span>
                </div>
                <!--form action="http://10.10.10.50/gsims/public/#fee_billing" method="get" target="_blank">
                    <input type="submit" name="" value="Open" />

                    <input type="hidden" id="hidden_value_1" name="hidden_value_1" value="" />
                </form-->
            </div>
            <div class="portlet-body customPadding">
                <div class="inputs">
                    <div class="portlet-input">
                        <div class="input-icon right">
                            <!-- zk -->
                            <a class="icon-magnifier" id="btn_search" href="javascript:void(0)"></a>
                            <input id="Search_Student" type="text" class="form-control form-control-solid" placeholder="GS-ID"> </div>
                            <hr>
                    </div>

                </div><!-- inputs -->
            <div id="Concession_Form_info">
                <!-- form will be here -->
            </div>


            </div><!-- portlet-body -->

        </div><!-- portlet -->

    </div><!-- col-md-4 -->
    <style type="text/css">
    	#sample_1_kashif th {
		    background: #ebebeb;
		    color: #888;
		}
		#sample_1_kashif tbody tr td {vertical-align: middle;}
    </style>
    
    <div class="col-md-9 fixed-height" id="profileDetail_Left">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Concessions for Session 2018-19</b></span>
                        </div>
                    </div><!-- portlet-title -->

<div class="portlet-body padding20" id="Std_Table_Info">
<table class="table table-bordered table-hover " id="sample_1_kashif">
<thead>
<tr>
<th>Student Info</th>
<th class="text-center">Concession<br />Code</th>
<th class="text-center">Installment<br />#1</th>
<th class="text-center">Installment<br />#2</th>
<th class="text-center">Installment<br />#3</th>
<th class="text-center">Installment<br />#4</th>
<th class="text-center">Installment<br />#5</th>
<th class="text-center">Installment<br />#6</th>
<th class="text-center">Installment<br />#7</th>
<th class="text-center">By</th>
</tr>
</thead>
<tbody>
    <?php if(!empty($concession_info)) : ?>
        <?php foreach( $concession_info as $cf): 
             $Concession_id=$cf->Concession_id; 
            ?>
<tr>
<td>

<div class="float-left" style="width: 60px;float: left;">
<img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="GF-ID: <?=$cf->Gf_id;?>" src="<?=$cf->photo150;?>" width="50">
</div>
<div class="text-left" style="float: left;">
<span class="primary-link tooltips Student_info_click" data-container="body" data-placement="top" id="<?=$cf->Concession_id;?>" data-original-title="GS-ID: <?=$cf->Gs_id;?>" data-tableType="<?=$cf->Table_type;?>"> 
    <?=$cf->Abridged_name;?> </span><br>

<span class="class_Name GirlSta" style="margin-left:10px;">
<span class="tooltips className" data-container="body" data-placement="top" data-original-title="Class Roll No: <?=$cf->Class_no;?>">
<?=$cf->Grade_name;?>-<?=$cf->Section_name;?></span>
<span class="StuStatus tooltips" data-placement="top" data-original-title="Status: <?=$cf->Status_code_;?>" data-pin-nopin="true"><?=$cf->Status_code;?> </span> 
<span style="visibility: hidden"> <?=$cf->Gs_id;?> </span>
</span>
</div>

</td>

<td class="text-center"><?=$cf->Concession_Type;?></td>
<td class="text-center">
    <?php 
    
    if( !empty($cf->Installment_1) && $cf->Concession_Type_id != 9 )  
    {
        echo $cf->Installment_1.'%';
    }else 
    {
        echo ($cf->Installment_1);
    }
    ?>
 </td>
<td class="text-center">

<?php 
        if( !empty($cf->Installment_2) && $cf->Concession_Type_id != 9  )  
        {
        echo $cf->Installment_2.'%';
        }else 
        {
echo ($cf->Installment_2);
        }
    ?>
</td>
<td class="text-center">
<?php 
        if( !empty($cf->Installment_3) && $cf->Concession_Type_id != 9)  
        {
        echo $cf->Installment_3.'%';
        }else 
        {

echo ($cf->Installment_3);
        }
    ?>
</td>
<td class="text-center">
    <?php 
        if( !empty($cf->Installment_4) && $cf->Concession_Type_id != 9 )  
        {
        echo $cf->Installment_4.'%';
        }else 
        {

echo ($cf->Installment_4);
        }
    ?>
</td>
<td class="text-center">
    <?php 
        if( !empty($cf->Installment_5) && $cf->Concession_Type_id != 9 )  
        {
        echo $cf->Installment_5.'%';
        }else 
        {
 echo ($cf->Installment_5);
        }
    ?>
</td>
<td class="text-center">
    <?php 
        if( !empty($cf->Installment_6) && $cf->Concession_Type_id != 9 )  
        {
        echo $cf->Installment_6.'%';
        }else 
        {
 echo ($cf->Installment_6);
        }
    ?>
</td>
<td class="text-center">
    <?php 
        if( !empty($cf->Installment_7) && $cf->Concession_Type_id != 9 )  
        {
        echo $cf->Installment_7.'%';
        }else 
        {
 echo ($cf->Installment_7);
        }
    ?>
</td>


<td class="text-center">
    <?php 
        if( $cf->Name_code != '' )
        {
            echo $cf->Name_code.' <br /><small>'.$cf->Dated.'</small>';
        }else 
        {

        }
    ?>
    
</td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
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

            //zk Enter Event Start here...
    var input = document.getElementById("Search_Student");
        input.addEventListener("keyup", function(event) {
        event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("btn_search").click();
                $('#Student_info_div_m').show();
            }
    });
        //Enter Event End here...

        var FormInputMask = function () {
    
    var handleInputMasks = function () {
        

           
     
        $("#Search_Student").inputmask("mask", {
            "mask": "99-999"
        }); //specifying fn & options

       
    }

   

    return {
        //main function to initiate the module
        init: function () {
            handleInputMasks();
            
        }
    };

}();
var main_url=$('.main_url').val();
var csrf=$('.csrf').val();
 
var pagefunction = function() {
    
    Demo.init();
    App.init();
    FormInputMask.init(); // init metronic core componets

    

setTimeout(function(){ $('#sample_1_kashif').DataTable(); }, 2000);

$(document).on("click", "#btn_search", function(){
    var Gs_id = $("#Search_Student").val();
    if( Gs_id != '' ){
    //$("#hidden_value_1").val(Gs_id);
    App.startPageLoading(); 
    $.ajax({
       type:'POST',
       data: {'_token': '{{ csrf_token() }}', 'Gs_id':Gs_id },
       url:"{{url('/concession_search')}}",
       dataType: "json",
       async: false,
       cache: false,
       success: function(response)
       {
        $("#Concession_Form_info").html('');
        $("#Concession_Form_info").html(response.html);
        $("#add_height_con").addClass('fixed-height-NoScroll');
        setTimeout(function(){ App.stopPageLoading(); }, 2000);

       }
    });
}

});

$(document).on("click", "#Create_Installment", function(e){
e.preventDefault();
debugger;
// if( $("[name='Installment_1']").val() != '' && 
// $("[name='Installment_2']").val() != '' &&
// $("[name='Installment_3']").val() != '' &&
// $("[name='Installment_4']").val() != '' &&
// $("[name='Installment_5']").val() != '' &&
// $("[name='Installment_5']").val() != '' &&
// $("[name='Installment_6']").val() != '' &&
// $("[name='Installment_7']").val() != '' &&
// $("[name='Installment_8']").val() != '' &&
// $("[name='Installment_9']").val() != '' &&
// $("[name='Installment_10']").val() != '' &&
// $("[name='Installment_11']").val() != '' &&
// $("[name='Installment_12']").val() != '' ) 

// {
App.startPageLoading(); 

$.ajax({
    type:'POST',
    data: {'_token': csrf,'Formdata': $("#Form_add_concession").serialize() },
    url:main_url+'/add_concession',
    dataType: "json",
    async: false,
    cache: false,
    success: function(response)
    {
        
    var Gs_id = $("[name='Gs_id']").val();
    var Academic_session_id = $("[name='Academic_session_id']").val();

    setTimeout(function(){ App.stopPageLoading();  }, 1000);

    $.ajax({
       type:'POST',
       data: {'_token': csrf, 'Gs_id':Gs_id, 'Academic_session_id':Academic_session_id },
       url:main_url+'/student_concession_info',
       dataType: "json",
       async: false,
       cache: false,
       success: function(response)
       {
            $("#Std_Table_Info").html('');
            $("#Std_Table_Info").html(response.html);
       }
    });

    $("#Search_Student").val('');
    $("#Student_info_div").html('');
    $("[name='Student_id']").val(0);
    $("[name='Academic_session_id']").val(0);
    $("[name='concession_type']").val('');
    $("[name='Installment_1']").val('');
    $("[name='Installment_2']").val('');
    $("[name='Installment_3']").val('');
    $("[name='Installment_4']").val('');
    $("[name='Installment_5']").val('');
    $("[name='Installment_6']").val('');
    $("[name='Installment_7']").val('');
    $("[name='Installment_8']").val('');
    $("[name='Installment_9']").val('');
    $("[name='Installment_10']").val('');
    $("[name='Installment_11']").val('');
    $("[name='Installment_12']").val('');
    $("#profileDetail_Left").show('slow');
    $("#Student_info_div_m").hide('slow');

    
    

    setTimeout(function(){ 
    $('#sample_1_kashif').DataTable(); 
    $( "span" ).tooltip(); $( "img" ).tooltip();
    }, 2000);

    }
});

// }

});

$(document).on("click", ".Student_info_click", function(e){
var Gs_id = $(this).prop('id');
var tableType = $(this).attr('data-tableType');



App.startPageLoading(); 

    $.ajax({
       type:'POST',
       data: {'_token': csrf, 'Gs_id':Gs_id, 'tableType':tableType },
       url:  main_url+'/concession_search2',
       dataType: "json",
       async: false,
       cache: false,
       success: function(response)
       {
        $("#Concession_Form_info").html('');
        $("#Concession_Form_info").html(response.html);
        $("#add_height_con").addClass('fixed-height-NoScroll');
        setTimeout(function(){ App.stopPageLoading(); }, 1000);
       }
    });


});

}

loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/datatable.js", function(){
    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/datatables.min.js", function(){
        loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/form-validation.min.js", function(){
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
</script>
<!-- END PAGE LEVEL PLUGINS -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS --></div>
@include('master_layout.footer')
