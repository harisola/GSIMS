<?php

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Staff\Staff_Information\StaffInformationModel;

class StdMasterLayout extends Controller
{
    public function development(){
    	$userID = Sentinel::getUser()->id;
    	$staffInfo = new StaffInformationModel();



    	/***** Getting Staff Information of Login User *****/
	    $user = $staffInfo->get_Staff_Info(22);


	    /***** Getting Staff List *****/
	    $staff = $staffInfo->get_Staff_List();




    	/**** org - page ****/
    	return view('master_layout.student.student_view')->with(array('staff' => $staff, 'user' => $user));
    }
}
