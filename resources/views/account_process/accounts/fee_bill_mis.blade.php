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
.note.note-danger {
    margin: 0 !important;
    padding: 8px 10px !important;
    margin-top: 24px !important;
}
.portlet.light .dataTables_wrapper .dt-buttons {
    margin-top: 0px !important;
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
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">MIS for bank
                        </div>
                    </div><!-- portlet-title -->
                    <div class="row customRow">
                            <div class="col-md-3">
                                <label>MSI Type</label>
                                <select class="form-control" data-width="10%" id="MisType">
                                    <option value="0" disabled="" selected="" > [ Select MIS type ] </option>
                                    <option value="1"> Regular Fee Bill MIS </option>
                                    <option value="2"> Admission MIS </option>
                                </select>
                            </div>
                            <div class="col-md-3" id="sectionFilter_container">
                                <label id="Adm_date_picker_label" style="display: none;">Select Date</label>
                                <input class="form-control date-picker" size="16" type="text" value="" id="Adm_date_picker" style="display:none" data-width="10%" />
                                <label id="BillcyclenoLabel" style="display: none;">Select Installment</label>
                                <select class="form-control" data-width="10%" id="Billcycleno" style="display:none;">
                                <option value=""> [ Select Bill Cycle No ] </option>
                                @for( $a=1; $a < 9; $a++ ): 
                                    <option value="{!! $a !!} "> Bill cycle {!! $a !!}</option>
                                @endfor; 
                                
                            </select>
                            </div>
                            <div class="col-md-3">
                                <label>&nbsp;</label>
                                <button style="width: 100%;" type="button" data-loading-text="Loading..." class="btn btn-group green " id="Btn_Get_Mis" data-style="expand-left" data-spinner-color="#333"> Get MIS  </button>
                            </div>
                            <div class="col-md-3">
                            <div class="note note-danger" id="note_danger2" style="display:none"><p> Select MIS Type</p></div>
                            <div class="note note-danger" id="note_danger" style="display:none"><p> Select Bill Cycle number </p></div>
                          </div>
                        </div><!-- row -->
<div class="col-md-12 no-padding" style="width: 335px; text-align: center; position: absolute; top: 40%; left: 40%; background: rgb(241, 239, 239); border: 1px solid rgb(204, 204, 204); padding: 10px; z-index: 99999; display: none;" id="Generations_AjaxLoader">
                   <img src="http://10.10.10.50/gs//components/image/gsLoader.gif" width="200"><br><hr style="margin: 7px 0;border-top: 1px solid #ccc;"> Loading. Please Wait...
                </div>


                        <div class="portlet-body padding20" >
                            <hr />
                            <div class="row padding20 result" id="ajax_container" >
                                <table   class="table table-striped table-bordered" cellspacing="0" id="datatable_ajax_demo">
                                    <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%"> Record&nbsp;# </th>
                                            <th width="10%"> Bill no&nbsp;# </th>
                                            <th width="10%"> Generation student id </th>
                                            <th width="15%"> Abridged name </th>
                                            <th width="10%"> Grade section </th>
                                            <th width="5%"> Late fee </th>
                                            <th width="7%"> Current amount </th>
                                            <th width="5%"> Arrears </th>
                                            <th width="7%"> Amount before </th>
                                            <th width="7%"> Amount after </th>
                                            <th width="7%"> Bill due date </th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                  
                                        <tr role="row">
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            
                                        </tr>
                                  

                                    </tbody>

                                </table>
                            </div><!-- row -->

                        </div><!-- row -->
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->





 
<script type="text/javascript">

 

var pagefunction = function() {

Demo.init();
App.init();




$(document).on("click", "#Btn_Get_Mis", function(){

    var MisType = ($("#MisType").val());
    var Billcycleno = $("#Billcycleno").val();

    var Adm_date_picker = $("#Adm_date_picker").val();


    var $error=0;

    

    if( MisType != '' )
    {
        $("#note_danger2").hide("slow");

        if( parseInt(MisType) == 1 && Billcycleno == '' )
        {
            $("#note_danger").show("slow");
            $error=1;
        }
        else if( parseInt(MisType) == 2 && Adm_date_picker == '' )
        {
            $("#note_danger").show("slow");
            $error=1;
        }else 
        {
            $error=0;
            $("#note_danger").hide("slow");
        }
     }
    else
    {   
        $error=1;
        $("#note_danger2").show("slow"); 
    }

    if( $error==0)
    {
        Ajax_Call(MisType, Billcycleno, Adm_date_picker)
    }
    
    

});


$(document).on("change", "#Billcycleno", function(){ $("#note_danger").hide("slow"); });



function Ajax_Call(MisType,Billcycleno,Adm_date_picker)
{

    


 if( MisType != '' ) 
 {
    $('#Generations_AjaxLoader').show("slow");

    $('#ajax_container').html('');

    $.ajax({
        type:"POST",
        cache:true,
        url:"{{url('/table_ajax_fee_bill')}}",
        data:
        {
            "MisType":MisType,
            "Billcycleno":Billcycleno,
            "BillDated":Adm_date_picker,
            "_token": "{{ csrf_token() }}"
        },
        success:function(result)
        {
            $('#ajax_container').html(result.html);
        }, 
        complete:function()
        {
            $('#Generations_AjaxLoader').hide();
        }
    });



 }






}















$(document).on("change", "#MisType", function(){

    $("#note_danger").hide("slow");
    $("#note_danger2").hide("slow");

    

    

    if( $(this).val() != ''  )
    {
        if( $(this).val() == 1 )
        {
            $("#Adm_date_picker").hide("slow");
            $("#Adm_date_picker_label").hide("slow");
            $("#Billcycleno").show("show");
            $("#BillcyclenoLabel").show("show");
            
        }else 
        {
            $("#Billcycleno").hide("slow");
            $("#BillcyclenoLabel").hide("slow");
            $("#Adm_date_picker").show("slow");
            $("#Adm_date_picker_label").show("slow");
            
        }
        //Tap_Event_Ajax( $(this).val() ); 
    }else 
    {
        $("#Billcycleno").hide("slow");
        $("#Adm_date_picker").hide("slow");
    }


});


$(document).on("input", "#Tap_Event_II", function(){

if( $(this).val().length > 9 )
{
console.log( $(this).val());
$(this).val('');
$(this).focus();
}


});


var Tap_Event_Ajax = function (Tap_value)
{




App.startPageLoading();




$.ajax({
type:"POST",
cache:true,
url:"{{url('/calendar_test_II')}}",
data:{
Tap_value:Tap_value,
"_token": "{{ csrf_token() }}",
},
success:function(result){

console.log( result );

},

complete: function() {
App.stopPageLoading();
}


});





};





};






 




        
        
        
        

var pagedestroy = function(){ };

loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
        loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){

            loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.min.js", function(){

                    loadScript("{{ URL::to('metronic') }}/global/plugins/moment.min.js", function(){
                        loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js", function(){
                            loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js", function(){	

                                loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js", function(){
                                    loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js", function(){

                                        loadScript("{{ URL::to('metronic') }}/global/plugins/select2/js/select2.full.min.js", function(){
                                            loadScript("{{ URL::to('metronic') }}/pages/scripts/components-date-time-pickers.min.js", function(){
                                                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-ajax.min.js", function(){

                                                    loadScript("{{ URL::to('metronic') }}/global/plugins/ladda/spin.min.js", function(){
                                                        loadScript("{{ URL::to('metronic') }}/global/plugins/ladda/ladda.min.js", function(){
                                                            loadScript("{{ URL::to('metronic') }}/pages/scripts/ui-buttons-spinners.min.js", function(){

                                                                loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction);
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
            });
        });
        });
    });
});
</script>

