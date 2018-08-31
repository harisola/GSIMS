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
		//console.log("applicant_next_status"+applicant_next_status);





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
                	var data = JSON.parse(response);
                	console.log(data);
                	for(var i = 0;i < data.length;i++){
                		if(data[i].old_status_id != null){
                			$('#allocation_staff_'+data[i].old_status_id).val(data[i].applicant_allocate);
                			$('#allocation_grade_'+data[i].old_status_id).val(data[i].career_grade_id);

                			$('#applicant_comment_'+data[i].old_status_id).val(data[i].comments_applicant);
                			$('#applicant_status_comment_'+data[i].old_status_id).val(data[i].comments_next_decision);
                			$('#applicant_next_step_allocation_date_'+data[i].old_status_id).val(data[i].date);
                			$('#applicant_next_step_allocation_time_'+data[i].old_status_id).val(data[i].time);
                			
                			$('#applicant_next_step_allocated_campus_'+data[i].old_status_id).val(data[i].campus);
                			$('#applicant_next_step_allocated_comment_'+data[i].old_status_id).val(data[i].comments_next_step_aloc);

                			$('#applicant_next_step_comment_'+data[i].old_status_id).val(data[i].comments_next_step);
                			$('#applicant_status_'+data[i].old_status_id).val(data[i].current_status_id);
							var selectedOptions = data[i].tag.split(",");
							$('#ms_'+data[i].old_status_id).multipleSelect('setSelects', selectedOptions);

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

                		}

                		$('.applicant_name_write').text(data[i].name);


                		if(data[i].intial_interview_presence == 1){
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
         

                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(errorThrown)
                }
            });

	});


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

            }

		});
        $('#previous_process_'+status_id).hide();
		$('#main_div_'+status_id).removeClass( "hide" );
		$('#presence_'+status_id).hide();

	});
</script>