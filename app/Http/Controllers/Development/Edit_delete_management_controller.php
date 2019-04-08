<?php
/******************************************************************
* Author : Kashif Solangi
* Description: Edit delete functionalities
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Information\StaffInformationModel;
use App\Models\Staff\Staff_Information\Edit_delete_management_model;
use App\Models\Staff\Staff_Information\daily_attendance_report;
use App\Models\Staff\Staff_Information\hr_forms_log;
use App\Models\Staff\Staff_Information\hr_form_number_format;



class Edit_delete_management_controller extends StaffReportController
{
	
    public function Edit_Get_Absentia(Request $request){
		$staffInfo = new StaffInformationModel();
        $staff_id = $request->input('staff_id');
		$Absentia_id = $request->input('Absentia_id');
		
        
		$SData = $staffInfo->getStaffAbsentiaE($staff_id, $Absentia_id);
		
		// $html = ' <div class="row">
		// 			<div class="col-md-6 paddingBottom10">
		// 				<!-- form-group -->
		// 				   <div class="col-md-6 paddingBottom10">
		// 				   <div class="form-group">
		// 					  <label class="">Form Number:</label>
		// 					  <div class="">
							 
							  
		// 						 <input type="text" class="form-control" name="absentia_title_edit" id="absentia_title_edit" value="'.$SData[0]->form_number.'" />
		// 					  </div>
		// 				   </div>
		// 				   <!-- form-group -->
		// 			   <div class="form-group">
		// 				  <label class="">Title:</label>
		// 				  <div class="">
		// 				  <input type="hidden" name="Attendance_in_id" id="Attendance_in_id" value="'.$SData[0]->IN_id.'" />
		// 				  <input type="hidden" name="Attendance_out_id" id="Attendance_out_id" value="'.$SData[0]->Out_id.'" />
		// 				  <input type="hidden" name="Attendance_des_id" id="Attendance_des_id" value="'.$SData[0]->Des_id.'" />
						  
		// 					 <input type="text" class="form-control" name="absentia_title_edit" id="absentia_title_edit" value="'.$SData[0]->D_Title.'" />
		// 				  </div>
		// 			   </div>
					   

		// 			</div>
		// 			<!-- col-md-6 -->
		// 			<div class="col-md-6 paddingBottom10">
		// 			   <div class="form-group">
		// 				  <label class="">Date:</label>
		// 				  <div class="">
		// 					 <input type="date" class="form-control" name="absentia_date_edit" id="absentia_date_edit" value="'.$SData[0]->In_Date.'" />
		// 				  </div>
		// 			   </div>
		// 			   <!-- form-group -->
		// 			</div>
		// 			<!-- col-md-6 -->
		// 		 </div>
		// 		 <!-- row -->
		// 		 <div class="row">
		// 			<div class="col-md-6 paddingBottom10">
		// 			   <div class="form-group">
		// 				  <label class="">Start Time:</label>
		// 				  <div class="">
		// 					 <input type="time" class="form-control" name="absentia_startTime_edit" id="absentia_startTime_edit" value="'.$SData[0]->Out_Time.'" />
		// 				  </div>
		// 			   </div>
		// 			   <!-- form-group -->
		// 			</div>
		// 			<!-- col-md-6 -->
		// 			<div class="col-md-6 paddingBottom10">
		// 			   <div class="form-group">
		// 				  <label class="">End Time:</label>
		// 				  <div class="">
		// 					 <input type="time" class="form-control" name="absentia_endTime_edit" id="absentia_endTime_edit" value="'.$SData[0]->In_Time.'" />
		// 				  </div>
		// 			   </div>
		// 			   <!-- form-group -->
		// 			</div>
		// 			<!-- col-md-6 -->
		// 		 </div>
		// 		 <!-- row -->
		// 		 <div class="row">
		// 			<div class="col-md-12 paddingBottom10">
		// 			   <div class="form-group">
		// 				  <label class="">Description:</label>
		// 				  <div class="">
		// 					 <textarea id="absentia_description_edit" cols="85" rows="5">'.$SData[0]->D_Des.'</textarea>
		// 				  </div>
		// 			   </div>
		// 			   <!-- form-group -->
		// 			</div>
		// 			<!-- col-md-6 -->
		// 		 </div>
		// 		 <!-- row -->';

         return view('attendance.staff.absentia_form_edit')->with(array('SData' => $SData));

				 
		// $h = array('h'=>$html);
		
		// echo json_encode( $h );
	}
	
	
	/*
		Delect Absentia
		We will Update absenta_manual_description table column record_deleted to 1 it will be removed
		
	*/
	public function deleteAbsentia(Request $request){
		$userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $hr_forms_log=new hr_forms_log;
        $Absentia_id = $request->input('Absentia_id');
		$Staff_id = $request->input('Staff_id');
		
		$data = array(
           'modified' => time(),
           'modified_by' => $userID,
		   "record_deleted"=>1
        );
		
		$where  = array("id" => $Absentia_id);
        $staffInfo->update_data('atif_gs_events.absenta_manual_description',$where,$data);
		
		$GetDate = " select  date as Dated, created as Created from  atif_gs_events.absenta_manual_description where id =".$Absentia_id."";
		$Absentia = $staffInfo->GetKashif($GetDate);
		$Dated = $Absentia[0]->Dated;
		$Created = $Absentia[0]->Created;
				
		$query1 = "select id as ID from  atif_attendance_staff.staff_attendance_in ai where ai.staff_id=".$Staff_id."  and ai.date = '".$Dated."' and ai.created=".$Created."";
		$Absentia_list = $staffInfo->GetKashif($query1);
		$IN_id = $Absentia_list[0]->ID;
		$data_in = array(
			'modified' => time(),
			'modified_by' => $userID,
			"record_deleted"=>1
		);
		$where_in = array("id" => $IN_id);
		$staffInfo->update_data('atif_attendance_staff.staff_attendance_in',$where_in,$data_in);
		$query2 = "select id as ID from  atif_attendance_staff.staff_attendance_out ai  where ai.staff_id=".$Staff_id."  and ai.date = '".$Dated."' and ai.created=".$Created."";
		$Absentia_lists = $staffInfo->GetKashif($query2);
		$Out_id = $Absentia_lists[0]->ID;
		$where_out = array("id" => $Out_id);
        $staffInfo->update_data('atif_attendance_staff.staff_attendance_out',$where_out,$data_in);
		
		$staffInfo->setAttendanceInfo($Staff_id,$Dated,date("Y-m-d"));


		$logs=$hr_forms_log->getInformation('atif_gs_events.absenta_manual_description',$Absentia_id);
		

		  $hr_forms_log->staff_id=$logs['staff_id'];
          $hr_forms_log->type='delete';
          $hr_forms_log->effected_entry_table='atif_gs_events.absenta_manual_description';
          $hr_forms_log->effected_table_id=$Absentia_id;
          $hr_forms_log->title=$logs['title'];
          $hr_forms_log->description=$logs['description'];
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('h:i:s');
          $hr_forms_log->time_details=$logs['time_details'];
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();
		
	}
	public function editAbsentia(Request $request){

        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $hr_forms_log=new hr_forms_log;

        $staff_id = $request->input('staff_id');
        $date = $request->input('date');
        $tap_out = $request->input('start_time');
        $tap_in = $request->input('end_time');
        $form_number = $request->input('form_number');
		
		$Attendance_in_id = $request->input('Attendance_in_id');
		$Attendance_out_id = $request->input('Attendance_out_id');
		$Attendance_des_id = $request->input('Attendance_des_id');
		$Edit_Absentia_id_hidden = $request->input('Edit_Absentia_id_hidden');
		
		$data_in = array(
          'date' => $date,
          'time' => $tap_in,
          'ip4' => getHostByName(getHostName()),
          'modified' => time(),
          'modified_by' => $userID
        );


          $data_out = array(
            'date' => $date,
            'time' => $tap_out,
            'ip4' => getHostByName(getHostName()),
            'modified' => time(),
            'modified_by' => $userID
            
          );
		  $where_in = array("id" => $Attendance_in_id);
          $staffInfo->update_data('atif_attendance_staff.staff_attendance_in',$where_in,$data_in);
		  
		  $where_out = array("id" => $Attendance_out_id);
          $staffInfo->update_data('atif_attendance_staff.staff_attendance_out',$where_out,$data_out);
			$title = $request->input('title');
			$description = $request->input('description');

          $title_description = array(
            'date' => $date,
            'title' => $title,
            'form_number' => $form_number,
            'description' => $description,
            'modified' => time(),
            'modified_by' => $userID
          );
		$where_des = array("id" => $Attendance_des_id);
		$staff_absentia_in =  $staffInfo->update_data('atif_gs_events.absenta_manual_description',$where_des,$title_description);
		

		  $hr_forms_log->staff_id=$staff_id;
          $hr_forms_log->type='updated';
          $hr_forms_log->effected_entry_table='atif_gs_events.absenta_manual_description';
          $hr_forms_log->effected_table_id=$Attendance_des_id;
          $hr_forms_log->form_number=$form_number;
          $hr_forms_log->title=$title;
          $hr_forms_log->description=$description;
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('h:i:s');
          $hr_forms_log->time_details=$tap_in.'///'.$tap_out;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();

          // Call SP For Trigger 
		 $staffInfo->setAttendanceInfo($staff_id,$date,date("Y-m-d"));


	}
	
	
	
	
	public function Get_LeaveApp(Request $request){
		$staffInfo = new StaffInformationModel();
        $id = $request->input('id');
		$where  = array( 'id' => $id );
		$getLeave = $staffInfo->get('atif_gs_events.leave_application',$where);
		$leaveType = $staffInfo->get('atif_gs_events.leave_type','');
		$form_number=$getLeave[0]->form_no;


		
		if( $getLeave[0]->paid_percentage > 0 ){
			$paid_percentage=$getLeave[0]->paid_percentage;
		}else{ $paid_percentage=0; }
		
		
		if( $getLeave[0]->leave_approve_date_from != '' ){
			$leave_approve_date_from=$getLeave[0]->leave_approve_date_from;
		}else{ $leave_approve_date_from=0; }
		
		
		if( $getLeave[0]->leave_approve_date_to != '' ){
			$leave_approve_date_to=$getLeave[0]->leave_approve_date_to;
		}else{ $leave_approve_date_to=0; }

		if($getLeave[0]->time_from == null && $getLeave[0]->time_to == null){
			$time_from = '';
			$time_to = '';
			$checkedDisplay = 'none';
			$displayTime = 'none';
		}else{
			$time_from = $getLeave[0]->time_from;
			$time_from = $getLeave[0]->time_from;
			$checkedDisplay = 'checked';
			$displayTime = '';
		}
		@$format_code=hr_form_number_format::getFormNumberFormat(2);

		@$form_number=explode($format_code, $form_number);

		
		$html_LT = '<div class="row">';
		$html_LT .= '<div class="col-md-6 paddingBottom10">
                 <div class="form-group">
                    <label class="">Form No:</label><br>
                    <input type="text" class="form-control form_part_a" name="form_number_leave_application_a" id="form_number_leave_application_a" value="'.@$format_code.'" disabled="" />
					<input type="text" class="form-control form_part_b" name="form_number_leave_application_b" id="form_number_leave_application_b" value="'.@$form_number[1].'" />
                 </div>
              </div>
            </div>';
		$html_LT .= '<div class="row" >';
		$html_LT .= '<div class="col-md-6 paddingBottom10" id="Leave_Title_containter">
				<div class="form-group">
			<label class="">Leave Title:</label>
			<div class="">
			<input type="hidden" id="Leave_Application_id" value="'.$getLeave[0]->id.'" />
			
			<input type="hidden" id="paid_compensation_edit" value="'.$getLeave[0]->paid_compensation.'" />
			
			<input type="hidden" id="paid_percentage_edit" value="'.$paid_percentage.'" />
			
			<input type="hidden" id="leave_approve_status_edit" value="'.$getLeave[0]->leave_approve_status.'" />
			
			<input type="hidden" id="leave_approve_date_from_edit" value="'.$leave_approve_date_from.'" />
			<input type="hidden" id="leave_approve_date_to_edit" value="'.$leave_approve_date_to.'" />
			
			
			
			<input type="text" class="form-control" name="leave_title_edit" id="leave_title_edit" value="'.$getLeave[0]->leave_title.'" />
			</div>
			</div>
			</div>
			<div class="col-md-6 paddingBottom10">
			   <div class="form-group">
				  <label class="">Leave Type:</label>
				  <div class="leave_type">
					<select class="form-control" id="Select_Leave_Type_edit">
					<option value="0">Select Leave Type</option>';
					if( !empty($leaveType)):
					foreach($leaveType as $type):
					
					if( $getLeave[0]->leave_type == $type->id ) 
						$s = "selected"; 
					else 
						$s='';
					
						$html_LT .= '<option value="'.$type->id.'" '.$s.'>'.$type->leave_type_name.'</option>';
					endforeach;
					endif;
					
					
				$html_LT .= '</select>';
				$html_LT .= '</div>
			   </div>
			</div>
			</div>
			 <div class="row">
				<div class="col-md-6 paddingBottom10" id="leave_from_container">
				   <div class="form-group">
					  <label class="">From:</label>
					  <div class="">
						 <input type="date" class="form-control" name="" id="leave_from_edit" value="'.$getLeave[0]->leave_from.'">
					  </div>
				   </div>
				   <!-- form-group -->
				</div>
				<!-- col-md-6 -->
				<div class="col-md-6 paddingBottom10">
				   <div class="form-group">
					  <label class="">To:</label>
					  <div class="">
						 <input type="date" class="form-control" name="" id="leave_to_edit" value="'.$getLeave[0]->leave_to.'">
					  </div>
				   </div>
				   <!-- form-group -->
				</div>
				<!-- col-md-6 -->
			 </div>
			 <!-- row -->
			 <div class="row">
                  <div class="col-md-6 paddingBottom10">
                    <input type="checkbox" id="DayBaseLeave1" '.$checkedDisplay.' onClick=setTodate("DayBaseLeave1","leave_from_edit","leave_to_edit")> <label for="DayBaseLeave">Hourly Leave</label>
                  </div>
               </div>
               <!-- row -->
               <div class="row" id="showHourly1" style="display: '.$displayTime.';">
                  <div class="col-md-6 paddingBottom10">
                     <div class="form-group">
                        <label class="">From time:</label>
                        <div class="">
                           <input type="time" class="form-control" name="time_from_update_val"  id="time_from_update_val" value="'.$time_from.'">
                        </div>
                     </div>
                     <!-- form-group -->
                  </div>
                  <!-- col-md-6 -->
                  <div class="col-md-6 paddingBottom10">
                     <div class="form-group">
                        <label class="">To time:</label>
                        <div class="">
                           <input type="time" class="form-control" name="time_to_update_val" id="time_to_update_val" value="'.$time_to.'">
                        </div>
                     </div>
                     <!-- form-group -->
                  </div>
                  <!-- col-md-6 -->
               </div>
               <!-- row -->
			 <div class="row">
				<div class="col-md-12 paddingBottom10">
				   <div class="form-group">
					  <label class="">Additional Comments <small>(if any)</small>:</label>
					  <div class="">
						 <textarea id="leave_comment_edit" cols="85" rows="5">'.$getLeave[0]->leave_description.'</textarea>
					  </div>
				   </div>
				   <!-- form-group -->
				</div>
				<!-- col-md-6 -->
			 </div>
			 <div class="row">
				<div class="col-md-12 paddingBottom10">
				   <div class="form-group">
					  <label class="">Request for a paid Compensation</label>';
					  $html_LT .= '<div class="">';
					  if( $getLeave[0]->paid_compensation == 1 )
						  $c = "checked";
					  else
						  $c='';
					  
				    $html_LT .= '<input type="checkbox" class="make-switch" data-on-text="Yes" data-off-text="No" id="limit_edit" '.$c.'>';
						 
					  $html_LT .= '</div>';
				   $html_LT .= '</div>
				</div>
			</div>';

		$html_LT .= '<script>$("#DayBaseLeave1").change(function () {
          $("#showHourly1").fadeToggle();
        });</script>';


		
		$h = array( 'LT' => $html_LT );
		echo json_encode( $h );
		
	  
	}
	
	
	function Edit_LeaveApp( Request $request ){
		
        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $staff_id = $request->input('staff_id');
		$Leave_Application_id = $request->input('Leave_Application_id');

		
        $leave_title = $request->input('leave_title');
        $leave_type = $request->input('leave_type');
        $leave_from = $request->input('leave_from');
        $leave_to = $request->input('leave_to');
        $leave_comment = $request->input('leave_comment');
        $paid_compensation = $request->input('paid_compensation');
        $time_from = $request->input('time_from');
        $time_to = $request->input('time_to');
        $form_number = $request->input('form_number');

		$data = array(
          'leave_type' => $leave_type,
          'form_no' => $form_number,
          'leave_title' => $leave_title,
          'leave_from' => $leave_from,
          'leave_to' => $leave_to,
          'paid_compensation' => $paid_compensation,
          'leave_description' => $leave_comment,
          'time_from'=>$time_from,
          'time_to'=> $time_to,
          'modified' => time(),
          'modified_by' => $userID,
        );

          

        $where_des = array("id" => $Leave_Application_id);
		$staffInfo->update_data('atif_gs_events.leave_application',$where_des,$data);
		  $hr_forms_log=new hr_forms_log;
		  $logs=$hr_forms_log->getInformation('atif_gs_events.leave_application',$Leave_Application_id);
          $hr_forms_log->staff_id=$logs['staff_id'];
          $hr_forms_log->type='updated';
          $hr_forms_log->effected_entry_table='atif_gs_events.leave_application';
          $hr_forms_log->effected_table_id=$Leave_Application_id;
          $hr_forms_log->title=$leave_title;
          $hr_forms_log->description=$leave_comment;
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('h:i:s');
          $hr_forms_log->time_details=$leave_from.'///'.$leave_to;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();

		echo $Leave_Application_id;
		
		
	}
	
	
	public function deleteLeaveApp(Request $request){
		$userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $hr_forms_log=new hr_forms_log;
        $Action_id = $request->input('Action_id');
		$data = array(
           'modified' => time(),
           'modified_by' => $userID,
		   "record_deleted"=>1
        );
		$where  = array("id" => $Action_id);
        $staffInfo->update_data('atif_gs_events.leave_application',$where,$data);

        $logs=$hr_forms_log->getInformation('atif_gs_events.leave_application',$Action_id);
		

		  $hr_forms_log->staff_id=$logs['staff_id'];
          $hr_forms_log->type='delete';
          $hr_forms_log->effected_entry_table='atif_gs_events.leave_application';
          $hr_forms_log->effected_table_id=$Action_id;
          $hr_forms_log->title=$logs['title'];
          $hr_forms_log->description=$logs['description'];
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('h:i:s');
          $hr_forms_log->leave_type=$logs['leave_type'];
          $hr_forms_log->time_details=$logs['time_details'];
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();
		
	}
	
	
	public function editPenalties(Request $request){
		$staffInfo = new StaffInformationModel();
        $Action_id = $request->input('ID');
		
		$Penalties = $staffInfo->getSinglePenalty($Action_id);
		$html = '';
		
		//$html .= var_dump( $Penalties );
		
		if( !empty( $Penalties ) ){
			$ID = $Penalties[0]->id;
			$Staff_id = $Penalties[0]->staff_id;
			$form_number = $Penalties[0]->form_number;
			$Penalty_Title = $Penalties[0]->penalty_title;
			$Penalty_Day = $Penalties[0]->penalty_day;
			$Penalty_From = $Penalties[0]->penalty_from;
			$Penalty_To = $Penalties[0]->penalty_to;
			$Penalty_Description = $Penalties[0]->penalty_description;
			
		}
		
		return view ('attendance.staff.editpenalties',compact('ID','Staff_id','form_number','Penalty_Title','Action_id','Penalty_Day','Penalty_From','Penalty_To','Penalty_Description'));

	}
	
	
	public function OverRightPenalties(Request $request)
	{
		$staffInfo = new StaffInformationModel();
		$userID = Sentinel::getUser()->id;
		
		
		$staff_id = $request->input('Staff_id');
		$Penalty_Id  = $request->input('penalty_id_edit');
		$form_number  = $request->input('form_number');
		
		$penalty_title = $request->input('penalty_title');
		$penalty_day = $request->input('penalty_day');
		$penalty_from = $request->input('penalty_from');
		$penalty_to = $request->input('penalty_to');
		$penalty_description = $request->input('penalty_description');
		

		$data = array(
			'form_number' => $form_number,
			'penalty_title' => $penalty_title,
			'penalty_day' => $penalty_day,
			'penalty_from' => $penalty_from,
			'penalty_to' => $penalty_to,
			'penalty_description'=>$penalty_description,
			'modified' => time(),
			'modified_by' => $userID,
		);

      


      $Where_Where = array( "id" => $Penalty_Id);
	  
	  $staffInfo->update_data('atif_gs_events.daily_penalty',$Where_Where,$data);

      if($Penalty_Id > 0){

        $where = array( 'id' => $staff_id );
        $staffDescription = $staffInfo->get('atif.staff_registered',$where);
		
        $leaveBalance = $staffDescription[0]->leave_balance;
        $leaveBalance = $leaveBalance - $penalty_day;
        $update = array(
          'leave_balance' => $leaveBalance
        );

        $updation = $staffInfo->update_data('atif.staff_registered',$where,$update);


      }

	      $hr_forms_log=new hr_forms_log;
		  $logs=$hr_forms_log->getInformation('atif_gs_events.daily_penalty',$Penalty_Id);
          $hr_forms_log->staff_id=$logs['staff_id'];
          $hr_forms_log->form_number=$form_number;
          $hr_forms_log->type='updated';
          $hr_forms_log->effected_entry_table='atif_gs_events.daily_penalty';
          $hr_forms_log->effected_table_id=$Penalty_Id;
          $hr_forms_log->title=$penalty_title;
          $hr_forms_log->description=$penalty_description;
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('h:i:s');
          $hr_forms_log->time_details=$penalty_day.'///'.$penalty_from.'///'.$penalty_to;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();
      
	  $id = array( "id" => $Penalty_Id );
	  
	  echo json_encode($id);


    }
	
	
	public function deletePenalties(Request $request){
		$userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $Action_id = $request->input('Action_id');
		$data = array(
           'modified' => time(),
           'modified_by' => $userID,
		   "record_deleted"=>1
        );
		$where  = array("id" => $Action_id);

		  

        $staffInfo->update_data('atif_gs_events.daily_penalty',$where,$data);

          $hr_forms_log=new hr_forms_log;
		  $logs=$hr_forms_log->getInformation('atif_gs_events.daily_penalty',$Action_id);
          $hr_forms_log->staff_id=$logs['staff_id'];
          $hr_forms_log->type='deleted';
          $hr_forms_log->effected_entry_table='atif_gs_events.daily_penalty';
          $hr_forms_log->effected_table_id=$Action_id;
          $hr_forms_log->title=$logs['title'];
          $hr_forms_log->description=$logs['description'];
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('h:i:s');
          $hr_forms_log->time_details=$logs['time_details'];;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();
		
	}
	
	public function editAdjustment( Request $request ){
		$staffInfo = new StaffInformationModel();
        $Action_id = $request->input('ID');
		$Ad = $staffInfo->getSingleExceptionAdjustment($Action_id);
		if( !empty($Ad) ){
			$ID = $Ad[0]->id;
			$Staff_id 			= $Ad[0]->staff_id;
			$form_number 			= $Ad[0]->form_number;
			$Adjustment_Title 	= $Ad[0]->adjustment_title;
			$Adjustment_Day 	= $Ad[0]->adjustment_day;
			$Adjustment_Description = $Ad[0]->adjustment_description;
						
		}
		return view ('attendance.staff.edit_adjustment_form',compact('ID','Staff_id','form_number','Adjustment_Title','Adjustment_Day','Adjustment_Description'));
	}
	
	
	
	public function OverRightAdjustment(Request $request){
		$staffInfo = new StaffInformationModel();
		$userID = Sentinel::getUser()->id;
		$adjustment_title = $request->input('adjustment_title');
		$form_number = $request->input('form_number');
		$adjustment_no = $request->input('adjustment_no');
		$adjustment_description = $request->input('adjustment_description');
		$staff_id = $request->input('staff_id');
		$adjustment_id = $request->input('adjustment_id');
		$events = new daily_attendance_report;
		
		$data = array(
			'form_number' => $form_number,
			'adjustment_title' => $adjustment_title,
			'adjustment_day' => $adjustment_no,
			'adjustment_description'=> $adjustment_description,
			'modified' => time(),
			'modified_by' => $userID,
		);


		$where_a = array("id"=>$adjustment_id);
		$staffInfo->update_data('atif_gs_events.exception_adjustment',$where_a,$data);

		if($adjustment_id > 0){
			$where = array( 'id' => $staff_id );
			$staffDescription = $staffInfo->get('atif.staff_registered',$where);
			$leaveBalance = $staffDescription[0]->leave_balance;
			$leaveBalance = $leaveBalance + $adjustment_no;
			$update = array( 'leave_balance' => $leaveBalance );
			$updation = $staffInfo->update_data('atif.staff_registered',$where,$update);
				$hr_forms_log=new hr_forms_log;

				$logs=$hr_forms_log->getInformation('atif_gs_events.exception_adjustment',$adjustment_id);
				$hr_forms_log->staff_id=$logs['staff_id'];
				$hr_forms_log->form_number=$form_number;
				$hr_forms_log->type='updated';
				$hr_forms_log->effected_entry_table='atif_gs_events.exception_adjustment';
				$hr_forms_log->effected_table_id=$adjustment_id;
				$hr_forms_log->title=$adjustment_title;
				$hr_forms_log->description=$adjustment_description;
				$hr_forms_log->date=date('Y-m-d');
				$hr_forms_log->time=date('h:i:s');
				$hr_forms_log->time_details=$adjustment_no;
				$hr_forms_log->created_by=$userID;
				$hr_forms_log->updated_by=$userID;
				$hr_forms_log->save();
		}
		$id = array("id"=>$adjustment_id);
		 $exception_adjustment_array = array('exceptional_adjustments' =>$adjustment_no);
		 
      	 // $events->updateExceptionalLeave($staff_id,$exception_adjustment_array);

      	  
     
		echo json_encode($id);
	}
	
	
	public function deleteAdjustment(Request $request){
		$staffInfo = new StaffInformationModel();
		$userID = Sentinel::getUser()->id;
		$Action_id =0;
		$Action_id = $request->input('Action_id');
		$Ad = $staffInfo->getSingleExceptionAdjustment($Action_id);
		
		if( !empty( $Ad ) ){
			$Staff_id 			= $Ad[0]->staff_id;
			$Adjustment_Day 	= $Ad[0]->adjustment_day;
			
			$data = array(
			'modified' => time(),
			'modified_by' => $userID,
			'record_deleted' =>1
			);
		$where_a = array("id"=>$Action_id);
		$staffInfo->update_data('atif_gs_events.exception_adjustment',$where_a,$data);
		
		if($Action_id > 0){
			$where = array( 'id' => $Staff_id );
			$staffDescription = $staffInfo->get('atif.staff_registered',$where);
			$leaveBalance = $staffDescription[0]->leave_balance;
			$leaveBalance = ( $leaveBalance + $Adjustment_Day );
			$update = array( 'leave_balance' => $leaveBalance );
			$updation = $staffInfo->update_data('atif.staff_registered',$where,$update);

			$hr_forms_log=new hr_forms_log;
			$logs=$hr_forms_log->getInformation('atif_gs_events.exception_adjustment',$Action_id);
			$hr_forms_log->staff_id=$logs['staff_id'];
			$hr_forms_log->type='deleted';
			$hr_forms_log->effected_entry_table='atif_gs_events.exception_adjustment';
			$hr_forms_log->effected_table_id=$Action_id;
			$hr_forms_log->title=$logs['title'];
			$hr_forms_log->description=$logs['description'];
			$hr_forms_log->date=date('Y-m-d');
			$hr_forms_log->time=date('h:i:s');
			$hr_forms_log->time_details=$logs['time_details'];;
			$hr_forms_log->created_by=$userID;
			$hr_forms_log->updated_by=$userID;
			$hr_forms_log->save();
		}
			$id = array("id"=>$Action_id);
			echo json_encode($id);
		
		}
		
	}
	
	
	
	public function editAddManual(Request $request)
	{
		$staffInfo = new StaffInformationModel();
        $Action_id = $request->input('ID');
		$Missed_id = $request->input('Missed_id');
		$Table_name = $request->input('Table_name');
		
		$Ad = $staffInfo->getSingleStaffManualTime($Action_id);
		
		
	
		
		$html = '';
		if( !empty($Ad) )
		{
			$Tap_id = $Ad[0]->Tap_id;
			$Dated 	= $Ad[0]->Dated;
			$form_number 	= $Ad[0]->form_number;
			$manual_time 	= $Ad[0]->manual_time;
			$description = $Ad[0]->description;
			$Missed_id = $Ad[0]->Missed_id;
			$Table_name = $Ad[0]->Table_name;
		}
		return view ('attendance.staff.miss_tap_edit',compact('Staff_id','form_number','Tap_id',
					'manual_time','Dated','form_number','description','Missed_id','Table_name','Action_id'));



					

		
	}
	
	
	public function OverRightAddManual(Request $request)
	{
		$userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $hr_forms_log = new hr_forms_log();
        $Manual_id = $request->input('Manual_id');
		$Tap_id = $request->input('Tap_id');
		
		$Missed_id = $request->input('Missed_id');
		$Table_name = $request->input('Table_name');
		
        $date = $request->input('date');
        $missTap = $request->input('missTap');
        $form_number = $request->input('form_number');
		$description = $request->input('description');
		$timeNow = time();
		
        $data = array(
			'date' => $date,
			'time' => $missTap,
			'modified' => $timeNow,
			'modified_by' => $userID
        );
        
		$where2 = array("id"=>$Missed_id);
        if( $Table_name == 'In_Table'){
			$staffInfo->update_data('atif_attendance_staff.staff_attendance_in',$where2, $data);	
		}else{
			$staffInfo->update_data('atif_attendance_staff.staff_attendance_out',$where2, $data);
		}
		
		$title_description = array(
            'date' => $date,
            'description' => $description,
            'form_number' => $form_number,
            'modified' => $timeNow,
            'modified_by' => $userID
          );


        $where = array("id"=>$Manual_id);
		$staffInfo->update_data('atif_gs_events.absenta_manual_description',$where,$title_description);


		  $logs=$hr_forms_log->getInformation('atif_gs_events.absenta_manual_description',$Manual_id);
		  $hr_forms_log->staff_id=$logs['staff_id'];
          $hr_forms_log->type='updated';
          $hr_forms_log->effected_entry_table='atif_gs_events.absenta_manual_description';
          $hr_forms_log->form_number=$form_number;
          $hr_forms_log->effected_table_id=$Manual_id;
          $hr_forms_log->title=$logs['title'];
          $hr_forms_log->description=$description;
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('h:i:s');
          $hr_forms_log->time_details=$missTap.'///'.$date;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();


		
		$GetDate = " select n.staff_id as Staff_id from atif_gs_events.absenta_manual_description as n where n.id =".$Manual_id."";
		$Absentia = $staffInfo->GetKashif($GetDate);
		$Staff_id = $Absentia[0]->Staff_id;
		$staffInfo->setAttendanceInfo($Staff_id, $date, date("Y-m-d"));
		
		$id = array("id"=>$Manual_id, "Missed_id"=>$Missed_id, "Table_name"=> $Table_name );
		echo json_encode($id);
	}
	
	
	
	public function deleteAddManual(Request $request)
	{
		$userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $hr_forms_log = new hr_forms_log();

        $Action_id = $request->input('Action_id');
		
		$Missed_id = $request->input('Missed_id');
		$Table_name = $request->input('Table_name');
		
		$timeNow = time();
		$Ad = $staffInfo->getSingleStaffManualTime($Action_id);

		   $logs=$hr_forms_log->getInformation('atif_gs_events.absenta_manual_description',$Action_id);
		  $hr_forms_log->staff_id=$logs['staff_id'];
          $hr_forms_log->type='deleted';
          $hr_forms_log->effected_entry_table='atif_gs_events.absenta_manual_description';
          $hr_forms_log->effected_table_id=$Action_id;
          $hr_forms_log->title=$logs['title'];
          $hr_forms_log->description=$logs['description'];
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('h:i:s');
          $hr_forms_log->time_details=$logs['time_details'];
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();
		
		$html = '';
		if( !empty($Ad) )
		{
			$Tap_id = $Ad[0]->Tap_id;
			$Dated 	= $Ad[0]->Dated;
			$manual_time 	= $Ad[0]->manual_time;
			$description = $Ad[0]->description;
		$data = array(
			'modified' => $timeNow,
			'modified_by' => $userID,
			'record_deleted' => 1
        );
        $where2 = array("id"=>$Missed_id);
		if( $Table_name == 'In_Table'){
			$staffInfo->update_data('atif_attendance_staff.staff_attendance_in',$where2, $data);
		}else{
			$staffInfo->update_data('atif_attendance_staff.staff_attendance_out',$where2, $data);
		}

		
		$title_description = array(
			'modified' => $timeNow,
			'modified_by' => $userID,
			'record_deleted' => 1
        );
		$where = array("id"=>$Action_id);
		$staffInfo->update_data('atif_gs_events.absenta_manual_description',$where,$title_description);
		
		$GetDate = " select n.date as Dated, n.staff_id as Staff_id from atif_gs_events.absenta_manual_description as n where n.id =".$Action_id."";
		$Absentia = $staffInfo->GetKashif($GetDate);
		$Staff_id = $Absentia[0]->Staff_id;
		$Dated = $Absentia[0]->Dated;

		  
		
		$staffInfo->setAttendanceInfo($Staff_id, $Dated, date("Y-m-d"));
		
		
		}


		
		
		
		$id = array("id"=>$Action_id, "Missed_id"=>$Missed_id, "Table_name"=>$Table_name );
		echo json_encode($id);
	}
	
}


