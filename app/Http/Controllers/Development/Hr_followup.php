<?php
/******************************************************************
* Author : Atif Naseem
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_model;

class Hr_followup extends Controller
{
	public function index()
	{
		$userId = Sentinel::getUser()->id;
	  	$staffRecruiment = new Staff_recruitment_model();
	  	$RecruimentData = $staffRecruiment->get_recruitment_followup_data();

	  	$tag = $staffRecruiment->get_tag();
	 



	  	$grade = $staffRecruiment->get_grade();
	  	$status = $staffRecruiment->get_status();
	  	$campus = $staffRecruiment->get_branch();
		$career_allocation = $staffRecruiment->get_allocation();
		$get_getTags = $staffRecruiment->get_getTags();

		return view('HR.followup.followup_view')->with(array('staffRecruiment' => $RecruimentData,'tag'=> $tag,'grade'=>$grade,'status'=> $status,'campus' => $campus,'career_allocation'=>$career_allocation,"get_getTags"=>$get_getTags));
	}
	public function followupLogs( Request $request ) {
	
		$staffRecruiment = new Staff_recruitment_model();
		
		$userID = Sentinel::getUser()->id;
	    $form_id = $request->input('Form_id');
		$RecruimentData = $staffRecruiment->get_followup_logs($form_id);	
			
	   	$returnHTML = view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_view_followup_logs')->with( array('staffRecruiment' => $RecruimentData,'userID'=> $userID ) )->render();
		return response()->json(array('success' => true, 'html'=>$returnHTML));
	}
	public function addFollowComments( Request $request ){
		
		$staffRecruiment = new Staff_recruitment_model();
		$followupType = $request->input('followupType');
		$comments = $request->input('comments');
		$form_id = $request->input('form_id');
		$status_id = $request->input('status_id');
		$userID = Sentinel::getUser()->id;
		$formTime = time();

		if( $followupType == 'Extension'){

			$date = $request->input('date');
			$time = $request->input('time');	
			$formData = array(
			  'date' => $date,
			  'time' => $time,
	          'created' => $formTime,
	          'register_by' => $userID,
	          'modified' => $formTime,
	          'modified_by' => $userID,
	          'record_deleted' => 0
	        );	


	        $where_career_form_data =  array(
	        						'form_id' => $form_id,
	        						'status_id' => $status_id 
	        						);

	        $careerForm = $staffRecruiment->updateFormdata('career_form_data', $where_career_form_data, $formData);	        		
		}
	
		

     	$data = array(
          'follow_type' => $followupType,
          'comment' => $comments,
          'form_id' => $form_id,
          'created' => $formTime,
          'register_by' => $userID,
          'modified' => $formTime,
          'modified_by' => $userID,
          'record_deleted' => 0
        );
        
       echo $followupData = $staffRecruiment->insertFormData('career_followup_comments',$data);



	}	
}





