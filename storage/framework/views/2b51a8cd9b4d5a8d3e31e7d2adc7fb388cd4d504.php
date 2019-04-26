<table class="table table-striped table-bordered" cellspacing="0" id="datatable_ajax_demo">
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
        <?php  $counter=1  ?>
        <?php  if( !empty($MIS_Data) ) :  ?>
        <?php  foreach($MIS_Data as $d) :  ?>
        <tr role="row">
            <td> <?php  echo $counter  ?> </td>
            <td> <?php  echo $d->Bill_no  ?> </td>
            <td> <?php  echo $d->Gs_id  ?> </td>
            <td> <?php  echo $d->Abridged_name  ?> </td>
            <td> <?php  echo $d->Grade_Section  ?> </td>
            <td> <?php  echo $d->Additional_late_fee  ?> </td>
            <td> <?php  echo $d->Current_billing_amount  ?> </td>
            <td> <?php  echo $d->Arrears  ?> </td>
            <td> <?php  echo $d->Amount_before  ?> </td>
            <td> <?php  echo $d->Amount_after  ?> </td>
            <td> <?php  echo $d->Bill_due_date  ?> </td>

        </tr>
        <?php  $counter++  ?>
        <?php  endforeach  ?>
        <?php  endif  ?>

    </tbody>
</table>

                                 

<script type="text/javascript">



var pagefunction = function() {

Demo.init();
App.init();
var grid = new Datatable();

var d = new Date();
var curr_day = ("0"+ d.getDate()).slice(-2);
var curr_month = ("0"+d.getMonth()+1).slice(-2);
var curr_year = ("0"+d.getFullYear()).slice(-2);
var curr_hour = ("0"+d.getHours()).slice(-2);
var curr_min = ("0"+d.getMinutes()).slice(-2);
var curr_sec = ("0"+d.getSeconds()).slice(-2);

var CurDate = curr_day + " " + curr_month + " " + curr_year + " " + curr_hour + " " + curr_min + " " + curr_sec;

var MisType = "";
MisType = ($("#MisType").val());

var Billcycleno = 0;
Billcycleno = $("#Billcycleno").val();

var Title = "";

if( MisType == 1)
{
Title = "Fee Bill MIS Installment no " + Billcycleno + " Dated " + CurDate;
}else 
{
Title = "Admission Fee Bill MIS";
}



$('#datatable_ajax_demo').DataTable( {

dom: 'Bfrtip',
fixedHeader: true,
"paging": false,
buttons: [
{ "extend": 'excel', "title": Title, "text":'Export To Excel',"className": 'dt-button buttons-excel buttons-html5 btn yellow btn-outline'  },
]

} );




$(document).on("click", "#Btn_Get_Mis", function(){

var MisType = ($("#MisType").val());
var Billcycleno = $("#Billcycleno").val();

if( MisType != '' )
{
$("#note_danger2").hide("slow");

if( parseInt(MisType) == 1 && Billcycleno == '' )
{
    
    $("#note_danger").show("slow");
}
else 
{
    $("#note_danger").hide("slow");
}




}
else
{
$("#note_danger2").show("slow"); 
}





});


$(document).on("change", "#Billcycleno", function(){

$("#note_danger").hide("slow");


});
















$(document).on("change", "#MisType", function(){

$("#note_danger").hide("slow");
$("#note_danger2").hide("slow");

if( $(this).val() != ''  )
{
if( $(this).val() == 1 )
{
    $("#Billcycleno").show("show");
}else 
{
    $("#Billcycleno").hide("slow");
}
//Tap_Event_Ajax( $(this).val() ); 
}else 
{
$("#Billcycleno").hide("slow");
}


});







};












var pagedestroy = function(){ };

loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/datatable.js", function(){
loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/datatables/datatables.min.js", function(){
loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/profile.js", function(){

    loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/table-datatables-managed.js", function(){
        loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/table-datatables-managed.min.js", function(){

            loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery.sparkline.min.js", function(){
                loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                    loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/bootstrap-toastr/toastr.min.js", function(){	

                        loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery-validation/js/jquery.validate.min.js", function(){
                            loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery-validation/js/additional-methods.min.js", function(){

                                loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/select2/js/select2.full.min.js", function(){
                                    loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/components-select2.min.js", function(){
                                        loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/table-datatables-ajax.min.js", function(){
                                            loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/app.min.js", pagefunction);
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

