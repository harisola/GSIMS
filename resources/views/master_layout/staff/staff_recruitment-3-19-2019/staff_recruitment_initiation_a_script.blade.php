<?php /***** ***** ***** Form Screening - JS ***** ***** *****/ ?>
<script type="text/javascript">

//loadScript("{{ URL::to('metronic') }}/global/plugins/bootbox/bootbox.min.js",function(){});


var insertForm = function(status_id,stage_id,next_stage){

var status_id = status_id;
var stage_id = stage_id;
var next_stage = next_stage

var form_id = $('#form_id').val();
var taging = $('#ms_'+status_id).val();
var allocation_staff = $('#allocation_staff_'+status_id).val();
var allocation_grade = $('#allocation_grade_'+status_id).val();
var applicant_comment = $('#applicant_comment_'+status_id).val();
var applicant_next_step_allocation_date = $('#applicant_next_step_allocation_date_'+status_id).val();
var applicant_next_step_allocation_time = $('#applicant_next_step_allocation_time_'+status_id).val();
var applicant_next_step_allocated_campus=$('#applicant_next_step_allocated_campus_'+status_id).val();
var applicant_next_step_comment = $('#applicant_next_step_comment_'+status_id).val();
var applicant_status_comment = $('#applicant_status_comment_'+status_id).val();
var applicant_next_step_allocated_comment=$('#applicant_next_step_allocated_comment_'+status_id).val();
var applicant_next_status = $('#applicant_status_'+status_id).val();
var career_id = $('#career_id_'+status_id).val();
var depart_id = $('#depart_id_'+status_id).val();
var level_id = $('#level_id_'+status_id).val();


if(status_id == 11){
applicant_next_status = 11;
}




var cfpb_txt_date = $('#applicant_next_step_allocation_date_'+status_id);
var cfpb_txt_time = $('#applicant_next_step_allocation_time_'+status_id);
var cfpb_txt_campus = $('#applicant_next_step_allocated_campus_'+status_id);

var txt_taging = $('#ms_'+status_id);

var txt_allocation_staff = $('#allocation_staff_'+status_id);
var txt_allocation_grade = $('#allocation_grade_'+status_id);

var txt_allocation_d = $('#applicant_status_'+status_id);

var oerror=0; 
if (!$.trim( applicant_next_step_allocation_date )) {
cfpb_txt_date.closest(".KashifSolangi").addClass( "has-error" );
oerror=1;
}else 
{
cfpb_txt_date.closest(".KashifSolangi").removeClass( "has-error" );
}

if (!$.trim( applicant_next_step_allocation_time )) {
cfpb_txt_time.closest(".KashifSolangi").addClass( "has-error" );
oerror=1;
}else 
{
cfpb_txt_time.closest(".KashifSolangi").removeClass( "has-error" );    
}

if (!$.trim( applicant_next_step_allocated_campus )) {
cfpb_txt_campus.closest(".KashifSolangi").addClass( "has-error" );
oerror=1;
}
else
{
cfpb_txt_campus.closest(".KashifSolangi").removeClass( "has-error" );   
}







if (!$.trim( taging ) && applicant_next_status != 11 ) {
txt_taging.closest(".KashifSolangi").addClass( "has-error" );
oerror=1;
}else
{
txt_taging.closest(".KashifSolangi").removeClass( "has-error" );   
}


if (!$.trim( allocation_staff ) && (applicant_next_status != 11) ) 
{
txt_allocation_staff.closest(".KashifSolangi").addClass( "has-error" );
oerror=1;
}else 
{
txt_allocation_staff.closest(".KashifSolangi").removeClass( "has-error" );
}


if (!$.trim( allocation_grade ) && applicant_next_status != 11 ) 
{
txt_allocation_grade.closest(".KashifSolangi").addClass( "has-error" );
oerror=1;
}
else 
{
txt_allocation_grade.closest(".KashifSolangi").removeClass( "has-error" );   
}



if ( (status_id == 1 ) && (!$.trim( applicant_next_status )) ) 
{
txt_allocation_d.closest(".KashifSolangi").addClass( "has-error" );
oerror=1;
}
else 
{
txt_allocation_d.closest(".KashifSolangi").removeClass( "has-error" );
}


if ( (applicant_next_status === null  ) && (!$.trim( applicant_next_status )) ) 
{
txt_allocation_d.closest(".KashifSolangi").addClass( "has-error" );
oerror=1;
}
else 
{
txt_allocation_d.closest(".KashifSolangi").removeClass( "has-error" );
}







if( applicant_next_status == 10 || applicant_next_status == 12 || applicant_next_status == 14 )
{

cfpb_txt_date.closest(".KashifSolangi").removeClass( "has-error" );
cfpb_txt_time.closest(".KashifSolangi").removeClass( "has-error" );    
cfpb_txt_campus.closest(".KashifSolangi").removeClass( "has-error" );   
txt_taging.closest(".KashifSolangi").removeClass( "has-error" );   
txt_allocation_staff.closest(".KashifSolangi").removeClass( "has-error" );
txt_allocation_grade.closest(".KashifSolangi").removeClass( "has-error" );   
txt_allocation_d.closest(".KashifSolangi").removeClass( "has-error" );
oerror=0;
}   








if( oerror==0 ){

var dialog = bootbox.dialog({
title: 'Are you sure?',
message: "<p>Are you sure you want to save changes?</p>",
buttons: {
cancel: {
label: "No! cancel",
className: 'btn-danger',
callback: function(){

}
},

ok: {
label: "Yes! proceed",
className: 'btn-info',
callback: function(){


/////////////////////////////////////////////


App.startPageLoading();

$.ajax({
url: "{{url('/staff_recruitment_initiation_add')}}",
type:"POST",
cache:true,

data: {
'_token': '{{ csrf_token() }}',
applicant_status:status_id,
applicant_next_status:applicant_next_status,
stage_id:stage_id,
form_id:form_id,
taging:taging,
allocation_staff:allocation_staff,
allocation_grade:allocation_grade,
applicant_comment:applicant_comment,
applicant_next_step_allocation_date:applicant_next_step_allocation_date,
applicant_next_step_allocation_time:applicant_next_step_allocation_time,
applicant_next_step_allocated_campus:applicant_next_step_allocated_campus,
applicant_next_step_comment:applicant_next_step_comment,
applicant_status_comment:applicant_status_comment,
applicant_next_step_allocated_comment:applicant_next_step_allocated_comment,
next_stage:next_stage,
career_id:career_id,
depart_id:depart_id,
level_id:level_id,

},
success: function (response) {
App.stopPageLoading();

bootbox.dialog({
        message: "Application processed to next steps.",
        title: "Application status changed and saved.",
        buttons: {
        confirm: {
            label: " Ok! Close"
            },
        }
    });   
// Part B Expected Date And Time
    getStaffRecruitment(form_id);
    refreshTable();
//Show modal when data save 
 
    if(status_id == 11){

     $('#call_for_part_b_flag_'+form_id).html('');
     $('#table_append_'+form_id).append('<small style="color: #888;" id="expected_part_b_flag_'+form_id+'">Expected for Part B on <strong style="color:#000;">'+formatDate(applicant_next_step_allocation_date)+'</strong> at <strong style="color:#000;">'+changeTimeFormat(applicant_next_step_allocation_time)+'</strong></small>');

     $('.part_b_append_ul_'+form_id+' ul').append('<li class="call_for_part_b"  data-status="11" data-stage="4" data-form = "'+form_id+'"> <a href="" data-toggle="modal"><i class="fa fa-user"></i> Part B Presence </a> </li>');
                                         
    }



},
error: function(jqXHR, textStatus, errorThrown) {
console.log(errorThrown)
}
});


////////////////////////////////////////////////////////////////







}
}
}
});

} // end if error=0





// here 

}

$(document).on('click','.walkin, .online',function(e){


$('#process_detail').show();
$(".KashifSolangi").each(function(){
$(this).removeClass( "has-error" );
});

App.startPageLoading();

refreshForm();
var form_id = $(this).data("id");
//refreshapplicatelogs(form_id);
$('.nav-tabs a[href="#portlet_tab2_1"]').tab('show');
$('.tab-pane a[href="#portlet_tab2_1"]').tab('show');
getStaffRecruitment(form_id);

setTimeout(function(){
    App.stopPageLoading();
}, 2000); 



});
// zk start
  $('#career_id_1').on('change', function(){
    $('#depart_1').hide();
    $('#level_1').hide();

    
    var formdata =  'career_id_1='+$('#career_id_1').val()
     console.log('form data=> '+formdata);
    $.ajax({
        type:'get',
         url:'/gsims/public/get_dept',
          data:formdata,
        success:function(data){

            console.log(data);
            if(data){
              // $('#depart').show();
              // $('#level').show();
               $('#ajax_depart').html(data);
            }
            else{
                $('#query').html(data.query);
            }   
        },
        error:function(data){
            console.log(data.responseText); 
        }
    });
    });

    $('#career_id_2').on('change', function(){
    $('#depart_2').hide();
    $('#level_2').hide();
    
    var formdata =  'career_id_2='+$('#career_id_2').val()
     console.log('form data=> '+formdata);
    $.ajax({
        type:'get',
         url:'/gsims/public/get_dept2',
          data:formdata,
        success:function(data){
            console.log(data);
            if(data){
               $('#ajax_depart_2').html(data);
            }
            else{
                $('#query').html(data.query);
            }   
        },
        error:function(data){
            console.log(data.responseText); 
        }
    });
    });
// zk end
var getStaffRecruitment = function getStaffRecruitment(form_id){
$('#form_id').val(form_id);
$.ajax({
url: "{{url('/get_staff_recruitment')}}",
type:"POST",
cache:true,
data: {
'_token': '{{ csrf_token() }}',
form_id:form_id,


},
success: function (response) {
    // debugger;
// console.log(response);
var missed_status = JSON.parse(response).status;
var data = JSON.parse(response).data;
//console.log(missed_status);
 // console.log(data[0]['depart_id']);

$("#Applicant_id").val( data[0].Form_id  );

$('.tab-pane').each(function(){
//  $(this).removeClass('active');
});

$('.tab-pane a[href="#portlet_tab2_1"]').tab('show');

//$('.nav-tabs ul li a').each(function(i){
    //$('.nav-tabs ul li a').removeClass('active');
    // $(this).parent().addClass('active');
//});
// console.log(data);
var status = [1,2,3,4,5];
for(var i = 0;i < status.length;i++){
    $('#main_div_'+status[i]).show();
}
// console.log(data);
for(var i = 0;i < data.length;i++){

    if(data[i].old_status_id != null){
        // debugger;
        // console.log(data[i].old_status_id);
        // vaL ISSUE
        var current_status = data[i].current_status_id;
        $('#allocation_staff_'+data[i].old_status_id).val(data[i].applicant_allocate);
        $('#allocation_grade_'+data[i].old_status_id).val(data[i].career_grade_id);
        $('#applicant_comment_'+data[i].old_status_id).val(data[i].comments_applicant);
        $('#career_id_'+data[i].old_status_id).val(data[i].career_id);
        if(data[i].depart_id > 0){
            $('#depart_'+data[i].old_status_id).html('<select placeholder="Area" class="form-control" id="depart_id_'+data[i].old_status_id+'"><option value='+data[i].depart_id+'>'+data[i].departments+'</option></select>');
        }
        if(data[i].level_id > 0){
            $('#level_'+data[i].old_status_id).html('<select placeholder="Area" class="form-control" id="level_id_'+data[i].old_status_id+'"><option value='+data[i].level_id+'>'+data[i].levels+'</option></select>');
        }

        // $('#depart_jquery').html('<select placeholder="Area" class="form-control" id="depart_id_'+data[i].old_status_id+'"><option value='+data[i].depart_id+'>'+data[i].departments+'</option></select>');
        // $('#level_jquery').html('<select placeholder="Area" class="form-control" id="level_id_'+data[i].old_status_id+'"><option value='+data[i].level_id+'>'+data[i].levels+'</option></select>');
        $('#depart_id_'+data[i].old_status_id).val(data[i].depart_id);
        $('#level_id_'+data[i].old_status_id).val(data[i].level_id);


    



        $('#applicant_status_comment_'+data[i].old_status_id).val(data[i].comments_next_decision);
        if(data[i].date == '1970-01-01'){
            data[i].date = "{{date('Y-m-d')}}"
        }                            
        //$('#applicant_next_step_allocation_date_'+data[i].old_status_id).val(data[i].date);
       // $('#applicant_next_step_allocation_time_'+data[i].old_status_id).val(data[i].time);
        
        if((data[i].old_status_id==data[i].current_status_id) && (data[i].current_status_id == 14))
        {
            
            data[i].date='';
            data[i].time='';
            $('#applicant_next_step_allocation_date_'+data[i-1].old_status_id).val(data[i].date);
            $('#applicant_next_step_allocation_time_'+data[i-1].old_status_id).val(data[i].time);
            
        }else
        {
            //console.log(data[i].old_status_id + ' '+ data[i].date)
            $('#applicant_next_step_allocation_date_'+data[i].old_status_id).val(data[i].date);
            $('#applicant_next_step_allocation_time_'+data[i].old_status_id).val(data[i].time);
            
        }
        
        
        
        $('#applicant_next_step_allocated_campus_'+data[i].old_status_id).val(data[i].campus);
        $('#applicant_next_step_allocated_comment_'+data[i].old_status_id).val(data[i].comments_next_step_aloc);




        $('#applicant_next_step_comment_'+data[i].old_status_id).val(data[i].comments_next_step);
        
        if(typeof  data[i+1] != 'undefined'){
            $('#applicant_status_'+data[i].old_status_id).val(data[i+1].old_status_id);
            
        }else{
             $('#applicant_status_'+data[i].old_status_id).val(data[i].current_status_id);
        }
       
        var selectedOptions = data[i].tag.split(",");
        console.log(selectedOptions);

        $('#ms_'+data[i].old_status_id).multipleSelect('setSelects', selectedOptions);

       

        if(data[i].form_source == 1){

            if(data[i].form_screening_display == 1){
                $('#main_div_1').show();
                $('#form_screen_overlay').hide();      
            }else{
                $('#main_div_1').hide();
                $('#form_screen_overlay').show();

            }
        }else{
            $('#main_div_1').show();
            $('#form_screen_overlay').hide();
        }


        // Button Integration

        // Disable Button For Call for Part B
        if(data[i].form_screening_display == 1){
            buttonIntegration("button_11",1);     
        }else{

            buttonIntegration("button_11",0);
        }

        // Disable  Button Form Screening

        if(data[i].intial_interview_presence == 1){
            buttonIntegration("button_11",1);
            buttonIntegration("button_1",1);
             
        }else{
            buttonIntegration("button_1",0);
        }


       
      // Disable  Button Form formal_interview_presence

        if(data[i].formal_interview_presence == 1){
            buttonIntegration("button_11",1);
            buttonIntegration("button_1",1);
            buttonIntegration("button_2",1);
             
        }else{
            buttonIntegration("button_2",0);
        }

         // Disable  Button Form Observation Interview Presence
        if(data[i].observation_interview_presence == 1){
            buttonIntegration("button_11",1);
            buttonIntegration("button_1",1);
            buttonIntegration("button_2",1);
            buttonIntegration("button_3",1);

             
        }else{
            buttonIntegration("button_3",0);
        }


        // Disable  Button Form Final Consultant Interview Presence
        if(data[i].final_consultant_interview_presence == 1){
            buttonIntegration("button_11",1);
            buttonIntegration("button_1",1);
            buttonIntegration("button_2",1);
            buttonIntegration("button_3",1);
            buttonIntegration("button_4",1);

             
        }else{
            buttonIntegration("button_4",0);
        }


        // Hiddien Offer Preperation

        if(data[i].old_status_id == 6){
            

            $('#collapse_1').collapse('hide');
            $('#collapse_2').collapse('show');
           

            
            $( "#offer_preperation" ).prop( "disabled", false );
            $( "#offer_preperation" ).removeClass( "gray");
            $( "#offer_preperation" ).addClass( "green");
        }


        // Hidden Offer Procedure
        if(data[i].old_status_id == 6 && data[i].checks != ''){

            $( "#offer_procedure" ).prop( "disabled", false );
            $( "#offer_procedure" ).removeClass( "gray");
            $( "#offer_procedure" ).addClass( "green");
            $('#offer_preperation').prop("disabled", true);

        }

        // Hidden Complete CheckList
        if(data[i].old_status_id == 7 && data[i].checks != ''){

            $( "#complete_check" ).prop( "disabled", false );
            $( "#complete_check" ).removeClass( "gray");
            $( "#complete_check" ).addClass( "green");
            $('#offer_procedure').prop("disabled", true);

        }

          // Hidden Complete CheckList
        if(data[i].old_status_id == 8 && data[i].checks != ''){

            $( "#complete_check" ).prop( "disabled", true );
            // $( "#complete_check" ).removeClass( "gray");
            // $( "#complete_check" ).addClass( "green");
            // $('#offer_preperation').prop("disabled", true);

        }

        // $('#skipped_process_'+data[i].current_status_id).hide();
        // $('#presence_'+data[i].current_status_id).show();

                    
                
    }else{

        $('#allocation_staff_'+data[i].current_status_id).val('');
        $('#allocation_grade_'+data[i].current_status_id).val('');

        $('#applicant_comment_'+data[i].current_status_id).val('');
        $('#applicant_status_comment_'+data[i].current_status_id).val('');
        $('#applicant_next_step_allocation_date_'+data[i].current_status_id).val('');
        $('#applicant_next_step_allocation_time_'+data[i].current_status_id).val('');
        
        $('#applicant_next_step_allocated_campus_'+data[i].current_status_id).val('');
        $('#applicant_next_step_allocated_comment_'+data[i].current_status_id).val('');
        $('#career_id_'+data[i].current_status_id).val('');
        $('#depart_id_'+data[i].current_status_id).val('');
        $('#level_id_'+data[i].current_status_id).val('');


        $('#applicant_next_step_comment_'+data[i].current_status_id).val('');
        $('#applicant_status_'+data[i].current_status_id).val('');
        //$('#button_'+data[i].current_status_id).show();

       if(data[i].form_source == 1){

            if(data[i].form_screening_display == 1){
                $('#main_div_1').show();
                $('#form_screen_overlay').hide();      
            }else{
                $('#main_div_1').hide();
                $('#form_screen_overlay').show(); 
            }
        }else{
           $('#main_div_1').show();
            $('#form_screen_overlay').hide();
        }

    }

    $('.applicant_name_write').text(data[i].name);

    /*
    if(parseInt(data[i].current_status_id) >= 2 && parseInt(data[i].current_stage_id) >= 4){
        $('#form_screen_overlay').show();
    }else{
        $('#form_screen_overlay').hide();
    }
    */
    if(data[i].form_source == "1" && ((data[i].current_status_id == 11 && data[i].current_stage_id == 9) || (data[i].call_for_part_b_display == 1) ) ){
        $('#main_div_0').show();
    }else{
        $('#main_div_0').hide();
    }


if( ( parseInt(data[i].call_for_part_b_display) == 0) && (parseInt(data[i].form_source) == 0) && (parseInt(data[i].current_status_id)==1) && (parseInt(data[i].current_stage_id)==1) )
{
buttonIntegration("button_1",0);
}



    if(data[i].intial_interview_presence == 1){
        console.log('at intial interview presence');
        $('#previous_process_2').hide();
        $('#main_div_2').removeClass( "hide" );
        $('#presence_2').hide();
        
    }else{
        $('#previous_process_2').show();
        $('#main_div_2').addClass( "hide" );
        $('#presence_2').show();
        
    }

    if(data[i].formal_interview_presence == 1){
        $('#previous_process_3').hide();
        $('#main_div_3').removeClass( "hide" );
        $('#presence_3').hide();
        
        
    }else{
        $('#previous_process_3').show();
        $('#main_div_3').addClass( "hide" );
        $('#presence_3').show();

        
    }

    if(data[i].observation_interview_presence == 1){
        $('#previous_process_4').hide();
        $('#main_div_4').removeClass( "hide" );
        $('#presence_4').hide();
    }else{
        $('#previous_process_4').show();
        $('#main_div_4').addClass( "hide" );
        $('#presence_4').show();
    }

    if(data[i].final_consultant_interview_presence == 1){
        $('#previous_process_5').hide();
        $('#main_div_5').removeClass( "hide" );
        $('#presence_5').hide();
    }else{
        $('#previous_process_5').show();
        $('#main_div_5').addClass( "hide" );
        $('#presence_5').show();
    }

}

for(var i = 0;i < status.length ;i++){
                     
    if(missed_status.indexOf(status[i]) != -1){

       $('#previous_process_'+status[i]).hide();
       $('#presence_'+status[i]).hide();
       $('#main_div_'+status[i]).hide();
       var hideNext = status[i]+1 ;
       $('#previous_process_'+hideNext).hide();

       $('#previous_process_message_'+status[i]).show();

    } else {
        
        $('#previous_process_'+current_status).hide();
        $('#previous_process_message_'+status[i]).hide();
         
    }

}
   
for(var i = 0;i < status.length ;i++){
    
    if(status[i] != current_status){
        $('#presence_'+status[i]).hide();
    }
                     
    

}
var checklist_status = ["6","7","8"];

for(var i = 0;i < data.length;i++){
    if(data[i].old_status_id != null && checklist_status.includes( data[i].old_status_id) ){
    
        if(data[i].checks != ''  &&   data[i].checks !== null ){
            
            var checks = data[i].checks;

            checks = checks.split(',');
            
            for (var j = 0; j < checks.length; j++) {
                 
                $("#"+checks[j]).prop('checked', true);
                $("#"+checks[j]+"1").prop('checked', true);
            } 
        }                            
    }
}

var activeGates = JSON.parse(response).callForPartBGate;

for (var i = 0; i < activeGates.length; i++) {
    console.log("HERE")
    gatesActive("status"+activeGates[i].status_id, activeGates[i].gates);
        
}




},
error: function(jqXHR, textStatus, errorThrown) {
console.log(errorThrown)
}
});
}

//Make gates active using data object and status  
function gatesActive(status, data){

var callForPartBGates = [1,2,3,4,5];
//call_for_b gates reset
for(var i = 0;i < callForPartBGates.length;i++){

var src = $("#"+status+"_"+callForPartBGates[i]).attr('src');
if(src !== undefined){
if(src.indexOf("_active.png") != -1 ){
    src = src.split("_active.png");
    src = src[0] + ".png";
    $("#"+status+"_"+callForPartBGates[i]).attr("src",src);                         
} 
}


}


//call_for_b gates
var active_gates = data; 
active_gates = active_gates.split(",");
for(var j = 0;j < active_gates.length;j++){

var src = $("#"+status+"_"+active_gates[j]).attr('src');
src = src.split(".png");
src = src[0] + "_active.png";
$("#"+status+"_"+active_gates[j]).attr("src",src);
}

}    


var refreshapplicatelogs = function(Form_id)
{
    App.startPageLoading();
    //var Form_id = $("#Applicant_id").val();
    $("#portlet_tab2_2").html('');
    $.ajax({
            type:'POST',
            data:{ '_token': '{{ csrf_token() }}', "Form_id":Form_id },
            url:"{{url('/loadLogs')}}",
            dataType: "json",
            success: function(response)
            {
                $("#portlet_tab2_2").html(response.html);

              //  setTimeout(function(){
                    App.stopPageLoading();
                //}, 3000); 

            }
        });








}

function refreshForm(){

for(var i = 1 ; i <= 5 ;i++){
$('#allocation_staff_'+i).val('');
$('#allocation_grade_'+i).val('');

$('#applicant_comment_'+i).val('');
$('#applicant_status_comment_'+i).val('');
$('#applicant_next_step_allocation_date_'+i).val('');
$('#applicant_next_step_allocation_time_'+i).val('');

$('#applicant_next_step_allocated_campus_'+i).val('');
$('#applicant_next_step_allocated_comment_'+i).val('');

$('#applicant_next_step_comment_'+i).val('');
$('#applicant_status_'+i).val('');
//arif
$('#career_id_'+i).val('');
$('#depart_id_'+i).val('');
$('#level_id_'+i).val('');





$('#ms_'+i).multipleSelect('uncheckAll');



}

$('#applicant_next_step_allocation_date_11').val('');
$('#applicant_next_step_allocation_time_11').val('');
$('#applicant_next_step_allocated_campus_11').val('');
$('#applicant_next_step_allocated_comment_11').val('');
$('#applicant_next_step_comment_11').val('');

$("input[name='preperation_checks[]']:checkbox").prop('checked',false);
$( "#offer_procedure" ).prop( "disabled", true );
$( "#complete_check" ).prop( "disabled", true );
$( "#offer_preperation" ).prop( "disabled", true );

$( "#complete_check" ).prop( "disabled", true );
$( "#offer_procedure" ).addClass( "gray");
$( "#offer_procedure" ).removeClass( "green");
$( "#complete_check" ).addClass( "gray");
$( "#complete_check" ).removeClass( "green");

$( "#offer_preperation" ).addClass( "gray");
$( "#offer_preperation" ).removeClass( "green");

//$('#collapse_2').removeClass('in');
//$('#collapse_1').addClass('in');
$('#collapse_1').collapse('show');
$('#button_11').show();
$('#collapse_2').collapse('hide');

}

// Function For Button Integration
var  buttonIntegration = function(id,flag){
if(flag == 1){
$("#"+id).hide();
}else{
$('#'+id).show();
}
}


$('.mark_present').click(function(){
var status_id =$(this).data("id");
var form_id = $('#form_id').val();
$.ajax({
url: "{{url('/update_presence')}}",
type:"POST",
cache:true,
data: {
'_token': '{{ csrf_token() }}',
form_id:form_id,
status_id:status_id
},
success:function(e){
getStaffRecruitment(form_id);
}

});
$('#previous_process_'+status_id).hide();
$('#main_div_'+status_id).removeClass( "hide" );
$('#presence_'+status_id).hide();

});


//******************************* CALL FOR PART B *****************************//
//*****************************************************************************//




$(document).on('click','.call_for_part_b',function()
{
var status_id = $(this).data('status');
var stage_id = $(this).data('stage');
var form_id = $(this).data('form');
var gc_id = $(this).data('gc');


$.ajax({
url: "{{url('/call_for_part_b_presence')}}",
type:"POST",
cache:true,
data: {
'_token': '{{ csrf_token() }}',
form_id:form_id,
status_id:status_id,
stage_id:stage_id
},
success:function(e){
//console.log(status_id); 
//console.log(stage_id);

if(status_id == 11 && stage_id == 9){


$('#table_append_'+form_id).append('<br><small style="color: #888;" id="call_for_part_b_flag_'+form_id+'">Call for Part B</small><br />');


}

if(status_id == 11 && stage_id == 4){
$('#call_for_part_b_flag_'+form_id).html('');
$('#expected_part_b_flag_'+form_id).html('');

$('#table_append_'+form_id).append('<br><small style="color: #888;" class="call_for_part_b_presence_flag_">Part B Completed</small><br />');

print_online("Online",gc_id);
}
refreshTable();
}



});

});


var changeTimeFormat = function changeTimeFormat(time){

time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

if (time.length > 1) { // If time format correct
time = time.slice (1);  // Remove full string match value
time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
time[0] = +time[0] % 12 || 12; // Adjust hours
}
return time.join (''); // return adjusted time or original string
}

var formatDate = function formatDate(date) {

var date = new Date(date);
var month = '';
var days_alpha = ["Sun","Mon","Tues","Wed","Thu","Fri","Sat"];
var numberDay = date.getDate();
var day = date.getDay();
day = days_alpha[day];
var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec" ];
month = date.getMonth();
month = monthNames[month];
var year = date.getFullYear();

return day +" "+ month  + " "+numberDay +',' + year;
}


var refreshTable = function(){ 

var Source      = $.trim( $("#StaffView_Filter_Profile").val() );
var CForPartB   = $.trim( $("#StaffView_Filter_Department").val() );
var Position         = $.trim( $("#StaffView_Filter_Position").val() );
var Current_Standing = $.trim( $("#StaffView_Filter_AtdStd").val() );
var Campus = $.trim( $("#StaffView_Filter_Campus").val() );
var Applied_From_Date = $.trim( $("#from_date").val() );
var Applied_To_Date   = $.trim( $("#to_date").val() );
var Modified_From_Date = $.trim( $("#from_date_m").val() );
var Modified_To_Date = $.trim( $("#to_date_m").val() );
var keywords = $("input[type=search]").val();
var keywords = $("input[type=search]").val();




App.startPageLoading();
setTimeout(function(){
App.stopPageLoading();
}, 2000); 



$('#empTable').DataTable().destroy();
var dt = $('#empTable').DataTable({
'processing': true,
'iDisplayLength': 100,
'language': { search: "" },
'serverSide': true,
'serverMethod': 'post',
'ajax': {
"url": "{{ url('/allposts') }}", 
"dataType": "json",
"type": "POST",


"data":{
'_token': '{{ csrf_token() }}', 
'Source':Source, 
'CForPartB':CForPartB,  
'Position':Position, 
'Current_Standing':Current_Standing, 
'Campus':Campus, 
'From_Date':Applied_From_Date, 
'To_Date':Applied_To_Date,  
'from_date_m':Modified_From_Date, 
'To_Date_m': Modified_To_Date 
}, 

},
'columns': [ 
{ data: 'gc_id' }, { data: 'name' }, { data: 'position_applied' },
{data:'Action'}, { data: 'mobile_phone' }, { data: 'Landline' }, { data: 'nic' },
{data: 'Standing'}, { data: 'Apply_Date' }, { data: 'Source' }, { data: 'Comments' }, 
{ data: 'Modified_date' }
]
});


dt.on( 'draw', function () {

$('tr td:nth-child(10)').each(function (){
var Class_name = $(this).text();
$(this).parent('tr').addClass( Class_name.toLowerCase() );
})


$('.boxidentification').each(function(){
$(this).tooltip();
})


$('tr td:nth-child(1) > a').each(function (){
var ids = $(this).data('id');
//console.log($(this).parent());
$(this).closest('tr').attr("data-id",ids);
});


});

if( keywords != ''){
dt.search(keywords).draw();   
}


} // end table refresh



var form1_checklist = ["NPF", "SAF", "AFRS",  "RCS",  "ED", "COC",  "PHO" ];
var form2_checklist = [ "JDC" ];
var form3_checklist = ["NPF1", "SAF1", "AFRS1", "OS1", "RCS1", "CV1", "ED1", "COC1", "EL1", "LDP1", "PHO1", "OL1", "JDC1" ];

var addChecks = function(status, form){
var form_id  = $('#form_id').val();
var preperation_checks = [];
var flag = true;
$('#'+form+' input[name^="preperation_checks"]').each(function() {

if(this.checked){
preperation_checks.push($(this).val())
//$( "."+$(this).val() ).removeClass( "error" );
} else {

var forms_checklist = [];
console.log("form:"+form)
if(form == "Offer_Preparation_Form"){

if(form1_checklist.includes($(this).val())){
    flag = false;
    $( "."+$(this).val() ).addClass( "error" );
}                    
} else if (form == "Offer_Procedure_Form") {
if(form2_checklist.includes($(this).val())){
    flag = false;
    $( "."+$(this).val() ).addClass( "error" );
}                    
} else if (form == "Complete_Checklist_Form"){
if(form3_checklist.includes($(this).val())){
    flag = false;
    $( "."+$(this).val() ).addClass( "error" );
}                    
}


}
});

if(flag){
$.ajax({
type:'POST',
data:{
    '_token': '{{ csrf_token() }}',
    'preperation_checks':preperation_checks,
    'form_id':form_id,
    'status_id':status
    },
url:"{{url('/preperation_checks')}}",
success:function(e){

    bootbox.dialog({
        message: "Your Data has been successfully.",
        title: "Saved.",
        buttons: {
        confirm: {
            label: "Ok"
            },
        }
    });   
    getStaffRecruitment(form_id);
}
});            
}

}
</script>