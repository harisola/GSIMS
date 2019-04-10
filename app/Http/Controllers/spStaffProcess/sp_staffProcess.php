<?php
namespace App\Http\Controllers\spStaffProcess;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Information\StaffInformationModel;
use App\Models\Staff\Staff_Adjustment\StaffAdjustmentModel;


class Sp_staffProcess extends Controller{
	public function weeklyTimeSheetSP(){
		return view('sp_staff_process.getWeeklyTimeSheet');
	}

	public function updateSpOfWeeklySheet(Request $request){
		$staffInfo = new StaffInformationModel();
		$from_date = $request->input('from_date');
		$to_date = $request->input('to_date');
		$staffInfo->updateWeeklyTimeSheet($from_date,$to_date);
	}


	public function setAttendance(){
		return view('sp_staff_process.setAttendanceInfo');
	}

	public function updateAttendanceStaff(Request $request){
		$staff_id = $request->input('staff_id');
		$from_date = $request->input('from_date');
		$to_date = $request->input('to_date');
		$staffInfo = new StaffInformationModel();
		$staffInfo->setAttendanceInfo($staff_id,$from_date,$to_date);
	}


	public function staff_payroll_adjustment(Request $request){
         ini_set('max_execution_time', 50000); //3 minutes

		$staffInfo = new StaffInformationModel();
		$staffAdjustment = new StaffAdjustmentModel();
		$absentia = $staffAdjustment->getStaffAbsentia();		
		$leave = $staffAdjustment->getStaffLeave();
		$penalty = $staffAdjustment->getStaffPenalty(); 
		$exception = $staffAdjustment->getStaffException();
		$misstap = $staffAdjustment->getStaffMisstap();
		$userInfo = $staffAdjustment->getLoginUserInfo(Sentinel::getUser()->id);

		/***** Getting Staff Logs *****/
		$absentiaLogs = $staffAdjustment->getStaffAbsentiaLogs();
		$leaveLogs = $staffAdjustment->getStaffLeaveLogs();
		$penaltyLogs = $staffAdjustment->getStaffPenaltyLogs();
		$exceptionLogs = $staffAdjustment->getStaffExceptionLogs(); 	
		$misstapLogs = $staffAdjustment->getStaffMisstapLogs();

		/***** Getting Staff List *****/
        $staff = $staffInfo->get_Staff_List();		
		$leaveType = $staffInfo->get('atif_gs_events.leave_type','');

		return view('attendance.staff.staff_adjustment_view2')->with(array('absentia' => $absentia, 'leave' =>$leave, 'penalty' =>$penalty,  'exception' =>$exception,  'misstap' =>$misstap, 'userInfo' => $userInfo, 'leaveType' => $leaveType, 'staff'=> $staff, 'absentiaLogs'=> $absentiaLogs, 'leaveLogs'=> $leaveLogs, 'penaltyLogs'=> $penaltyLogs, 'exceptionLogs'=> $exceptionLogs, 'misstapLogs'=> $misstapLogs));
	}

    // Get Misstap 
    public function getMisstap(Request $request){

      $staffAdjustment = new StaffAdjustmentModel();

      $misstap_data = $staffAdjustment->getStaffMisstap();
      return view('attendance.staff.staff_adjustment_misstap_table_view')->with(array('misstap_data' => $misstap_data));
      echo json_encode($misstap_data);
    }

    // Get Adjustment 
    public function getAdjustment(Request $request){

      $staffAdjustment = new StaffAdjustmentModel();

      $adjustment_data = $staffAdjustment->getStaffException();
      return view('attendance.staff.staff_adjustment_adjustment_table_view')->with(array('adjustment_data' => $adjustment_data));
      echo json_encode($adjustment_data);
    } 

    // Get Unauthorized 
    public function getUnauthorized(Request $request){

      $staffAdjustment = new StaffAdjustmentModel();

      $unauthorized_data = $staffAdjustment->getStaffPenalty();
      return view('attendance.staff.staff_adjustment_unauthorized_table_view')->with(array('unauthorized_data' => $unauthorized_data));
      echo json_encode($unauthorized_data);
    } 

    // Get Leaves 
    public function getLeaves(Request $request){

      $staffAdjustment = new StaffAdjustmentModel();

      $leaves_data = $staffAdjustment->getStaffLeave();
      return view('attendance.staff.staff_adjustment_leave_table_view')->with(array('leaves_data' => $leaves_data));
      echo json_encode($leaves_data);
    }

    // Get Absentia 
    public function getAbsentia(Request $request){

      $staffAdjustment = new StaffAdjustmentModel();

      $absentia_data = $staffAdjustment->getStaffAbsentia();
      return view('attendance.staff.staff_adjustment_absentia_table_view')->with(array('absentia_data' => $absentia_data));
      echo json_encode($absentia_data);
    }

    // Get Logs 
    public function getLogs(Request $request){

      	$staffAdjustment = new StaffAdjustmentModel();

		/***** Getting Staff Logs *****/
		$absentiaLogs = $staffAdjustment->getStaffAbsentiaLogs();
		$leaveLogs = $staffAdjustment->getStaffLeaveLogs();
		$penaltyLogs = $staffAdjustment->getStaffPenaltyLogs();
		$exceptionLogs = $staffAdjustment->getStaffExceptionLogs(); 	
		$misstapLogs = $staffAdjustment->getStaffMisstapLogs();

      return view('attendance.staff.staff_logs_table_view')->with(array('absentiaLogs'=> $absentiaLogs, 'leaveLogs'=> $leaveLogs, 'penaltyLogs'=> $penaltyLogs, 'exceptionLogs'=> $exceptionLogs, 'misstapLogs'=> $misstapLogs));
      
    }                 	
}
