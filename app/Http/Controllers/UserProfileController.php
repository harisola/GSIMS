<?php
/******************************************************************
* Author : Atif Naseem
* Email : atif.naseem22@gmail.com
* Cell : +92-313-5521122
*******************************************************************/


namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff\Staff_Information\StaffInformationModel;

class UserProfileController extends Controller
{
    public function userProfile(){
    	$userID = Sentinel::getUser()->id;
		$staffInfo = new StaffInformationModel();

		$staffCategory = $staffInfo->getCategory('atif_gs_events.comment_category');



    	/***** Getting Staff Information of Login User *****/
	    $user = $staffInfo->get_Staff_Info($userID);
	    $leaveType = $staffInfo->get('atif_gs_events.leave_type','');

    	return view('user_profile.user_profile_view_processor1')->with(array(
    		'user' => $user,
    		'leaveType' => $leaveType,
    		'staffCategory' => $staffCategory
    	));
    }

    public function getOtherAdjustment(Request $request){

        $staff_id = $request->input('staff_id');

        $staffInfo = new StaffInformationModel();

        $otherAdjustment = $staffInfo->getOtherAdjustment($staff_id);

        echo json_encode($otherAdjustment);
    }
}
