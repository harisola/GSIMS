<?php
namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\HR_Attendance\Adjustment_Approvel_model;

class AdujstmentApproval extends Controller
{
	function landingPage()
	{
		$AAM = new Adjustment_Approvel_model();
		$Link = substr(strrchr(url()->current(), "/"), 1);
		$User_id = Sentinel::getUser()->id;

		$UPermission = $AAM->Get_Permissions($Link, $User_id);
		$Staffinfo = $AAM->Get_Ajustment(); 
	    	 
		$HtmlUPermission =  $this->CreateHtml( $UPermission );
		$Data_Array =  array( "HtmlUPermission" => $HtmlUPermission, "Staffinfo"  => $Staffinfo );
		return view('attendance.adjustment_approval.adjustment_approve_full')->with( $Data_Array );
	}



	public function CreateHtml( $UPermission )
	{
		$Html = "";

		if( !empty($UPermission) )
		{

			foreach ($UPermission as $value) 
			{
				// if( $value->can_create==1)
				// {
				// 	$Html .= " <a class='Create' href='javascript:;'> Create </a> ";
				// }

				/* 
				if( $value->can_read==1){}
				
				*/

				if( $value->can_update==1)
				{
					$Html .= " <a class='Adjustment_Operation' data-name='Operation_Edit' href='javascript:;'> Edit </a> ";
				}

				if( $value->can_delete==1)
				{
					$Html .= " <a class='Adjustment_Operation' data-name='Operation_Delete' href='javascript:;'> Delete </a> ";
				}

				if( $value->can_approve==1)
				{
					$Html .= " <a class='Adjustment_Operation' data-name='Operation_Approve' href='javascript:;'> Approve </a> ";
				}
				 

				 
				 
				#$value->can_print;
				#$value->can_export;





			}

		}
		return $Html;
	}


	public function Delete_Operation( Request $request )
	{

		
		$activity_id=0;

		$Approval_id = $request->input("Approval_id");
		$activity_id = $request->input("OType");

		$Return = array();

		$User_id = Sentinel::getUser()->id;

		$activity_action_id=3;

$Query = "UPDATE `atif_gs_events`.`adjustment_approvals` SET `record_deleted`=1, `modified_by`=".$User_id."  WHERE  `id`=".$Approval_id."";

		$Trigger_Sp=1;
		$this->MyUpdateTable($Query, $Approval_id, $Trigger_Sp);

		$this->Activity_logs($Approval_id, $activity_id, $activity_action_id, $User_id);

		array_push($Return, array( "Operation_Approve" => 1 ));

		return $Return;

	}

		public function Operation(Request $request)
		{
			$Operation   = $request->input("Operation");

			$Approval_id = $request->input("Approval_id");
			
			$Adjust_Effect = $request->input("Adjust_Effect");  
 

			$User_id = Sentinel::getUser()->id;

			$Update_Query = "";

			$Return = array();

			$activity_id=0;

			$activity_action_id=0;

			$Trigger_Sp=0;

			if( $Operation=='Missed Tap Event')
			{
$Update_Query = "UPDATE `atif_gs_events`.`adjustment_approvals` SET `approve_status`='1',  `modified_by`=".$User_id."  WHERE  `id`=".$Approval_id."";
				$Trigger_Sp=1;
				$this->MyUpdateTable($Update_Query,$Approval_id, $Trigger_Sp );

				$activity_id=5;

				$activity_action_id=4;
					
				array_push($Return, array( "Operation_Approve" => 1 ));
			}
			else if( $Operation=='Exceptional Adjustments')
			{
				$Trigger_Sp=0;
				$this->ExceptionalAdjustment( $Adjust_Effect[0], $Approval_id );

				$activity_id=4;

				$activity_action_id=4;

$Update_Query = "UPDATE `atif_gs_events`.`adjustment_approvals` SET `approve_status`='1',  `modified_by`=".$User_id."  WHERE  `id`=".$Approval_id."";

				$this->MyUpdateTable($Update_Query, $Approval_id, $Trigger_Sp);

			}

			else if( $Operation =='Absentia' )
	        {

	        }
	        else if( $Operation =='Unauthorized Leave Penalties' )
	        {

	        }
	        else if( $Operation =='Leave Applications' )
	        {

	 		}
			else 
			{

			}


			$this->Activity_logs($Approval_id, $activity_id, $activity_action_id, $User_id);


			echo json_encode($Return);
			
		}



		public function MyUpdateTable($Update_Query, $Approval_id, $Trigger_Sp)
		{
			
			$AAM = new Adjustment_Approvel_model();
			 


			$AAM->MyUpdateTable_Model($Update_Query);


			if( $Approval_id > 0 && $Trigger_Sp == 1 )
			{

$Query = "SELECT ap.staff_id AS Staff_id, CURDATE() AS Cur_Date FROM `atif_gs_events`.`adjustment_approvals` AS ap WHERE ap.id= ".$Approval_id."";
				$EffedInfo = $AAM->SelectQeury($Query);	
				$Staff_id=0;
				$Cur_Date = date("Y-m-d");
				if( !empty( $EffedInfo ) )
				{
					$Staff_id = $EffedInfo[0]["Staff_id"];
					$Cur_Date = $EffedInfo[0]["Cur_Date"];

					$AAM->setAttendanceInfo($Staff_id, $Cur_Date, $Cur_Date);
				}
			}


			return TRUE;
			

		}



		public function ExceptionalAdjustment( $Adjust_Effect, $Approval_id )
		{

			$AAM = new Adjustment_Approvel_model();

			$SelectQeury = "SELECT 
				ap.staff_id AS Staff_id,
				tab.adjustment_day AS Effected_day,
				pr.payroll_id AS payroll_id,
				pr.leave_balance AS payroll_leaveBalanced,
				pr.remaining_leave AS payroll_remaining_leave,
				pr.exceptional_adjustments AS payroll_exceptional_adjustments,
				sr.leave_balance AS EL_Balanced


				FROM atif_gs_events.adjustment_approvals AS ap 
				LEFT JOIN atif_gs_events.exception_adjustment AS tab ON tab.id=ap.table_id
				LEFT OUTER JOIN atif.staff_registered AS sr ON sr.id = ap.staff_id

				LEFT OUTER JOIN 
				(
				
				SELECT d.id AS payroll_id, d.staff_id, d.leave_balance, d.remaining_leave, d.exceptional_adjustments FROM atif_gs_events.daily_attendance_report AS d 
				WHERE d.staff_id=(SELECT  ap.staff_id  FROM atif_gs_events.adjustment_approvals AS ap  WHERE ap.id=$Approval_id LIMIT 1 )
				ORDER BY d.id DESC LIMIT 1

				) AS pr ON pr.staff_id=ap.staff_id
				WHERE ap.id=$Approval_id LIMIT 1";


			$Staff_id=0;
			$Effected_day=0;
			$payroll_leaveBalanced=0;
			$payroll_remaining_leave=0;
			$payroll_exceptional_adjustments=0;
			$EL_Balanced=0;
			$payroll_id=0;



			$EffedInfo = $AAM->SelectQeury($SelectQeury);

			#var_dump($EffedInfo); exit;


			if( !empty( $EffedInfo ))
			{
				
				$Staff_id=$EffedInfo[0]["Staff_id"];
				$Effected_day=$EffedInfo[0]["Effected_day"];
				$payroll_id=$EffedInfo[0]["payroll_id"];
				$payroll_leaveBalanced=$EffedInfo[0]["payroll_leaveBalanced"];
				$payroll_remaining_leave=$EffedInfo[0]["payroll_remaining_leave"];

				$payroll_exceptional_adjustments=$EffedInfo[0]["payroll_exceptional_adjustments"];
				$EL_Balanced=$EffedInfo[0]["EL_Balanced"];


			}


			if( $Staff_id > 0 && $Effected_day != 0 )
			{

				if( $Adjust_Effect == 1 )
				{


					$payroll_leaveBalanced += $Effected_day;
					$payroll_remaining_leave += $Effected_day;

					$payroll_exceptional_adjustments += $Effected_day; 

					/*$Sql ="UPDATE `atif_gs_events`.`daily_attendance_report` SET `leave_balance`=".$payroll_leaveBalanced.", `remaining_leave`=".$payroll_remaining_leave.", `exceptional_adjustments`=".$payroll_exceptional_adjustments." WHERE  `id`=".$payroll_id.""; */

					  
					

  $Sql ="UPDATE `atif_gs_events`.`daily_attendance_report` SET `remaining_leave`='".$payroll_remaining_leave."' WHERE `id`=".$payroll_id."";




					/*$Sql ="UPDATE `atif_gs_events`.`daily_attendance_report` SET `exceptional_adjustments`=".$payroll_exceptional_adjustments." WHERE  `id`=".$payroll_id.""; */


				}
				else
				{
					$EL_Balanced += $Effected_day; 

					$Sql = "UPDATE `atif`.`staff_registered` SET `leave_balance`=".$EL_Balanced." WHERE  `id`=".$Staff_id."";
				}


				$Approvalid=0;

				$Trigger_Sp=0;

				$this->MyUpdateTable($Sql, $Approvalid, $Trigger_Sp );


				
				

			}

			return TRUE;








		}


		public function Activity_logs($post_id, $activity_id, $activity_action_id, $created_by)
		{
			$AAM = new Adjustment_Approvel_model();

			$Query = "INSERT INTO `atif_gs_events`.`activity_logs` (`post_id`, `activity_id`, `activity_action_id`, `created_by`, `created_at`) VALUES (".$post_id.", ".$activity_id.", ".$activity_action_id.", ".$created_by.", UNIX_TIMESTAMP());";
			$AAM->MyInsertTable_Model($Query);

			return TRUE;
		}



}

 

	     
	      /*public 'role_id' => int 8
	      public 'dyn_menu_id' => int 40
	      public 'menu_visible' => int 1
	      
	      */
