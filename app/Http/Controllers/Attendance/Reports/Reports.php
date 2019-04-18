<?php
/******************************************************************
* Author : Zia Khan
* Email : ziaisss@gmail.com
* Cell : +92-342-2775588
*******************************************************************/
namespace App\Http\Controllers\Attendance\Reports;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\HR_Attendance\Adjustment_Approvel_model;

class Reports extends Controller
{
    public function mainPage()
    {
        $AAM = new Adjustment_Approvel_model();
        $staffinfo=$AAM->staff_info();
      return view('attendance.reports.hr_reports_view')->with(array("staffinfo"=>$staffinfo));

    }



    public function reporst_staff_attendance(Request $request)
    {
    	$Gt_id 		= $request->input("Gt_id");
    	$From_date  = $request->input("From_date");
    	$Till_date  = $request->input("Till_date");


    	$AAM = new Adjustment_Approvel_model();
    	$result = $AAM->reports_staff_attendance($Gt_id, $From_date, $Till_date);


    	 


    	$returnHTML = view('attendance.reports.staff_attendance.staff_attendance_feedback')->with( array('Staff_Attendance' => $result))->render();
		return response()->json(array('success' => true, 'html'=>$returnHTML));


    	
    }

}
