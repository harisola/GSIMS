<?php /***** ***** ***** Form Screening - JS ***** ***** *****/ ?>
<script type="text/javascript">

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
		var applicant_next_step_allocated_campus = $('#applicant_next_step_allocated_campus_'+status_id).val();
		var applicant_next_step_comment = $('#applicant_next_step_comment_'+status_id).val();
		var applicant_status_comment = $('#applicant_status_comment_'+status_id).val();
		var applicant_next_step_allocated_comment = $('#applicant_next_step_allocated_comment_'+status_id).val();
		var applicant_next_status = $('#applicant_status_'+status_id).val();

        if(status_id == 11){
            applicant_next_status = 11;
        }




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
                    next_stage:next_stage

                },
                success: function (response) {
                    App.stopPageLoading();
                    bootbox.dialog({
                            message: "Your Data has been successfully.",
                            title: "Saved.",
                            buttons: {
                            confirm: {
                                label: "Ok"
                                },
                            }
                        });   
                    // Part B Expected Date And Time
                        getStaffRecruitment(form_id);
                        refreshTable();
                    //Show modal when data save 
                     
                        if(status_id == 11){

                        // $('#call_for_part_b_flag_'+form_id).html('');
                        // $('#table_append_'+form_id).append('<small style="color: #888;" id="expected_part_b_flag_'+form_id+'">Expected for Part B on <strong style="color:#000;">'+formatDate(applicant_next_step_allocation_date)+'</strong> at <strong style="color:#000;">'+changeTimeFormat(applicant_next_step_allocation_time)+'</strong></small>');

                        // $('.part_b_append_ul_'+form_id+' ul').append('<li class="call_for_part_b"  data-status="11" data-stage="4" data-form = "'+form_id+'"> <a href="" data-toggle="modal"><i class="fa fa-user"></i> Part B Presence </a> </li>');
                                                             
                        }

         

                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(errorThrown)
                }
            });


		
		

		
	}

	$(document).on('click','.walkin, .online',function(e){
		$('#process_detail').show();
		refreshForm();

		var form_id = $(this).data("id");
		getStaffRecruitment(form_id);

	});

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
                   
                    var missed_status = JSON.parse(response).status;
                    var data = JSON.parse(response).data;
                    //console.log(missed_status);
                    //console.log(data);
					
					$("#Applicant_id").val( data[0].Form_id  );
					
					$('.tab-pane').each(function(){
					//	$(this).removeClass('active');
					});
					$('.tab-pane a[href="#portlet_tab2_1"]').tab('show');
					
					//$('.nav-tabs ul li a').each(function(i){
						//$('.nav-tabs ul li a').removeClass('active');
						// $(this).parent().addClass('active');
					//});
					
                    var status = [1,2,3,4,5];
                    for(var i = 0;i < status.length;i++){
                        $('#main_div_'+status[i]).show();
                    }
                    
                    for(var i = 0;i < data.length;i++){
                        if(data[i].old_status_id != null){
							
                            var current_status = data[i].current_status_id;
                            $('#allocation_staff_'+data[i].old_status_id).val(data[i].applicant_allocate);
                            $('#allocation_grade_'+data[i].old_status_id).val(data[i].career_grade_id);
							$('#applicant_comment_'+data[i].old_status_id).val(data[i].comments_applicant);
                            $('#applicant_status_comment_'+data[i].old_status_id).val(data[i].comments_next_decision);
                            if(data[i].date == '1970-01-01'){
                                data[i].date = "{{date('Y-m-d')}}"
                            }                            
                            $('#applicant_next_step_allocation_date_'+data[i].old_status_id).val(data[i].date);
                            $('#applicant_next_step_allocation_time_'+data[i].old_status_id).val(data[i].time);
							
							
							
							
                            
                            $('#applicant_next_step_allocated_campus_'+data[i].old_status_id).val(data[i].campus);
                            $('#applicant_next_step_allocated_comment_'+data[i].old_status_id).val(data[i].comments_next_step_aloc);

                            $('#applicant_next_step_comment_'+data[i].old_status_id).val(data[i].comments_next_step);
                            
                            if(typeof  data[i+1] != 'undefined'){
                                $('#applicant_status_'+data[i].old_status_id).val(data[i+1].old_status_id);
                                
                            }else{
                                 $('#applicant_status_'+data[i].old_status_id).val(data[i].current_status_id);
                            }
                            //console.log("old_status_id"+data[i].old_status_id);
                           // console.log('#applicant_status_'+data[i].old_status_id);
                            var selectedOptions = data[i].tag.split(",");
                            console.log(selectedOptions);
                            $('#ms_'+data[i].old_status_id).multipleSelect('setSelects', selectedOptions);

                            // if(data[i].date != null  data[i].date != '1970-01-01'){

                            //     $('#button_'+data[i].old_status_id).hide();
                            // }else{
                            //     $('#button_'+data[i].old_status_id).show();
                            // }

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

    $(document).on('click','.call_for_part_b',function(){
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
                console.log(status_id);
                console.log(stage_id);
                if(status_id == 11 && stage_id == 9){


                   // $('#table_append_'+form_id).append('<br><small style="color: #888;" id="call_for_part_b_flag_'+form_id+'">Call for Part B</small><br />');


                }

                if(status_id == 11 && stage_id == 4){
                    //$('#call_for_part_b_flag_'+form_id).html('');
                    //$('#expected_part_b_flag_'+form_id).html('');

                    //$('#table_append_'+form_id).append('<br><small style="color: #888;" class="call_for_part_b_presence_flag_">Part B Completed</small><br />');

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

        $('#StaffList').DataTable().destroy();

        var search_content = $('.applicant_name_write').text();
       var pathname = $(location).attr('href');  // index.php
           /***** Refresh Data *****/
            $.ajax({
                type:'POST',
                data:{'_token': '{{ csrf_token() }}', 'pathname':pathname },
                url:"{{url('/addcustomer')}}",
                dataType: "json",
                async: false,
                cache: false,
                success: function(response)
                {
                $('#table_data').html('');
                $('#table_data').html(response.html);
                
                }
            });

           
            //$('#StaffList').dataTable();
            $("#StaffList").dataTable({

             "language": {
        "aria": {
            "sortAscending": ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        },
        "emptyTable": "No data available in table",
        "info": "Showing _START_ to _END_ of _TOTAL_ records",
        "infoEmpty": "No records found",
        "infoFiltered": "(filtered1 from _MAX_ total records)",
        "lengthMenu": "Show _MENU_",
        "search": "",
        "searchPlaceholder": "Search records..",
        "zeroRecords": "No matching records found",
        "paginate": {
            "previous":"Prev",
            "next": "Next",
            "last": "Last",
            "first": "First"
        }
    },


        "pagingType": "bootstrap_extended",
        "order": [[ 0, "desc" ]],
        "lengthMenu": [
            [-1, 40, 60, -1],
            [-1, 40, 60, "All"] // change per page values here
        ],

        "columnDefs": [{
            //"searchable": false,
            //"targets": [0]
        }]

            });
           var table = $('#StaffList').DataTable();
            table.search( search_content);
            table.draw();
            
            multiFilter();
			
			
			
			App.startPageLoading();
			
			setTimeout(function(){
	var from_date = ( $("#from_date").val() );	
	var to_date = ( $("#to_date").val() );	
	var testing = 0;
	
	
if ($.trim( $("#from_date").val()  ).length == 0)
{
	
}
else
{
	
	
	if( (from_date != '') && (to_date=='') )
	{
		$(tableRecords).each(function(){
			
		    var lineStr = $(this).attr("data-from_date");	
			
			
			if( lineStr >= from_date )
			{ 
				$(this).show(); 
			} else { 
				$(this).hide(); 
			} 
			
        });
		
		testing = 1;
	}
	else if( (from_date != '') && (to_date !='') ) {
		
		$(tableRecords).each(function(){
		var lineStr = $(this).attr("data-from_date");
			var secondDate = $(this).attr("data-to_date");
			if( lineStr >= from_date && secondDate <= to_date ){ 
				$(this).show(); 
			} else { 
				$(this).hide(); 
			} 
			
        });
		
		testing = 1;
	}else{ 
		testing = 0;
	}
	
	if( testing == 1 ){
		var totalRow =  $('#StaffList tr:visible').length - 1;
		$('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 	
	}
	
}
	App.stopPageLoading();
}, 2000); 


// Modified Date

setTimeout(function(){
	var from_date_m = ( $("#from_date_m").val() );	
	var to_date_m = ( $("#to_date_m").val() );	
	
	
if ($.trim( $("#from_date_m").val()  ).length == 0)
{
	
}
else
{
	var testing = 0;
	if( (from_date_m != '') && (to_date_m=='') )
	{
		$(tableRecords).each(function(){
			var lineStr_m = $(this).attr("data-from_date_mo");
			if( lineStr_m >= from_date_m ){ 
				$(this).show(); 
			} else { 
				$(this).hide(); 
			} 
			
        });
		
		testing = 1;
	}
	else if( (from_date_m != '') && (to_date_m !='') ) {
		
		$(tableRecords).each(function(){
		    
			var lineStr_m = $(this).attr("data-from_date_mo");
			var secondDate_m = $(this).attr("data-to_date_mo");
			if( (lineStr_m >= from_date_m && secondDate_m <= to_date_m) ){ 
				$(this).show(); 
			} else { 
				$(this).hide(); 
			} 
			
        });
		testing = 1;
		
	}else{ testing = 0; }
	
	if( testing == 1 ){
		var totalRow =  $('#StaffList tr:visible').length - 1;
		$('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 	
	}
}
	App.stopPageLoading();
}, 2000);

            
        
    }
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