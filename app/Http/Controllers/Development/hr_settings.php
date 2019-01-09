<?php
/******************************************************************
* Author : Atif Naseem
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\HR\Configurations_model;


class Hr_settings extends Controller
{
	public function configurations(){
		$userId = Sentinel::getUser()->id;
		$hrConfigurations = new Configurations_model();
		$pageData = $hrConfigurations->getAll();
		return view('HR.settings.hr_configurations_view')->with('pageData', $pageData);
	}



	public function saveConfigurations(Request $request){
		$fromDay = $request->input('day_from');
		$toDay = $request->input('day_to');
		$bufferDay = $request->input('day_buffer');

		$hrConfigurations = new Configurations_model();
		$hrConfigurations->updateAll($fromDay, $toDay, $bufferDay);

		echo 'Data saved!';
	}

	// Set EL Balance
	public function set_leave_balance(){
		$hrConfigurations = new Configurations_model();
		$yesterday_date = date('Y/m/d',strtotime("-1 days"));
		$staffList = $hrConfigurations->getStaffHrLeave();

		foreach($staffList as $staff){
			$staffID = $hrConfigurations->getStaffID($staff->gt_id);

			//var_dump($staffID);

			if(!empty($staffID)){

					//var_dump($staffID[0]->id);

					$where  = array(
						'staff_id' => $staffID[0]->id,
						'date' => $yesterday_date
					);

					$data = array(
						'leave_balance' => $staff->el_balance,
						'remaining_leave' => $staff->el_balance

					);
					$updateAll = $hrConfigurations->get_update($where,$data);
			}		
					
				

		}
	}
}





