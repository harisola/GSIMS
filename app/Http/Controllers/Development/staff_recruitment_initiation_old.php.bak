<?php
/******************************************************************
* Author : Rohail Aslam
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_model;


class staff_recruitment_initiation extends Controller
{

  public function index()
  {
  	$userId = Sentinel::getUser()->id;
  	$staffRecruiment = new Staff_recruitment_model();
  	$RecruimentData = $staffRecruiment->get_recruitment_data();

  	$tag = $staffRecruiment->get_tag();
    //var_dump($tag);



  	$grade = $staffRecruiment->get_grade();
  	$status = $staffRecruiment->get_status();
  	$campus = $staffRecruiment->get_branch();
	  $career_allocation = $staffRecruiment->get_allocation();
	  $get_getTags = $staffRecruiment->get_getTags();
	
	
  	return view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_view')
  			->with(array('staffRecruiment' => $RecruimentData,'tag'=> $tag,'grade'=>$grade,'status'=> $status,'campus' => $campus,'career_allocation'=>$career_allocation,"get_getTags"=>$get_getTags));
  }

public function addcustomer()
{
	$staffRecruiment = new Staff_recruitment_model();
	$RecruimentData = $staffRecruiment->get_recruitment_data();
   $returnHTML = view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_view_reload')->with('staffRecruiment', $RecruimentData)->render();
	return response()->json(array('success' => true, 'html'=>$returnHTML));
}


     /**********************************************************************
    * Add Form Data 
    * Author:   Asim Bilal
    * @input:   Staff ID, date, start_time, end_time, title, description
    * @output: 
    * Date:     Mar 22, 2018 (Thr)
    ***********************************************************************/
    public function addFormData(Request $request){
		
		$staffRecruiment = new Staff_recruitment_model();
        
        $userID = Sentinel::getUser()->id;
        $form_id = $request->input('form_id');

        $stage_id = $request->input('stage_id');
        $tag = implode( ',', $request->input('taging') );
        $applicant_allocate = $request->input('allocation_staff');
        $career_grade_id = $request->input('allocation_grade');
		$comments_applicant = $request->input('applicant_comment');
        $status_id = $request->input('applicant_status');
		$comments_next_decision = $request->input('applicant_status_comment');
        $date = $request->input('applicant_next_step_allocation_date');
        $time = $request->input('applicant_next_step_allocation_time');
        $campus = $request->input('applicant_next_step_allocated_campus');
        $comments_next_step_aloc = $request->input('applicant_next_step_allocated_comment');
        $comments_next_step = $request->input('applicant_next_step_comment');
        $timeNow = time();
        $stage_next = $request->input('next_stage');
        $status_next  = $request->input('applicant_next_status');


        $data = array(
          'form_id' => $form_id,
          'stage_id' => $stage_id,
          'tag' => $tag,
          'applicant_allocate' => $applicant_allocate,
          'career_grade_id' => $career_grade_id,
          'comments_applicant' => $comments_applicant,
          'status_id' => $status_id,
          'comments_next_decision' => $comments_next_decision,
          'date' => $date,
          'time' => $time,
          'campus' => $campus,
          'comments_next_step_aloc' => $comments_next_step_aloc,
          'comments_next_step' => $comments_next_step,
          'created' => $time,
          'register_by' => $userID,
          'modified' => $time,
          'modified_by' => $userID,                    
          'record_deleted' => 0
        );
        
        $career_form = array(
        					'status_id' => $status_next, 
        					'stage_id' => $stage_next 
        				);
        // var_dump($career_form);
        $where_career_form =  array('id' => $form_id );

        $careerForm = $staffRecruiment->updateFormdata('career_form', $where_career_form, $career_form);


        $flag = $staffRecruiment->get_form_status($form_id, $status_id);
       
        if( count( $flag ) == 0 ){

        	$RecruimentData = $staffRecruiment->insertFormData('career_form_data',$data);

        } else {
        	$where = array(
        		'form_id' => $form_id,
        		'status_id' => $status_id
        	 );
        	$RecruimentData = $staffRecruiment->updateFormdata('atif_career.career_form_data', $where, $data);
        }



			

        //echo json_encode($RecruimentData);
     
    }








    /**********************************************************************
    * Add Career Form Data 
    * Author:   Atif Naseem Ahmed
    * @input:   Name, NIC, Mobile Phone, Land Line, Gender, Tags, Comments
    * @output: 
    * Date:     Mar 22, 2018 (Thr)
    ***********************************************************************/
    public function addCareerForm(Request $request){
      $staffRecruiment = new Staff_recruitment_model();

      $Name = $request->input('name');
      $NIC = $request->input('nic');
      $MobilePhone = $request->input('mobile_phone');
      $LandLine = $request->input('land_line');
      $Gender = $request->input('gender');
      $PositionApplied = $request->input('tag');
      $Comments = $request->input('comments');

      if($staffRecruiment->NIC_exists($NIC)){
        echo 'error';
        echo '<strong>NIC</strong> already <strong>exists</strong>';
        return;
      }else if($staffRecruiment->Mobile_exists($MobilePhone)){
        echo 'error';
        echo '<strong>Mobile Phone</strong> already <strong>exists</strong>';
        return;
      }


      $GCID = $staffRecruiment->insertCareerForm($Name, $NIC, $MobilePhone, $LandLine, $Gender, $PositionApplied, $Comments);
      echo $GCID;
    }

    // **************************** GET DATA FOR MAPPING **************//

    public function get_recruitment_data(Request $request){
    	$form_id = $request->input('form_id');

    	$staffRecruiment = new Staff_recruitment_model();
    	$data = $staffRecruiment->get_applicant_recruitment_data($form_id);
    	echo json_encode($data);
    }


    // Mark Presence
    public function mark_presence(Request $request){

    	$form_id  = $request->input('form_id');
    	$status_id = $request->input('status_id');

    	$staffRecruiment = new Staff_recruitment_model();

    	$career_form = array('stage_id' => 4,'status_id' => $status_id );
        // var_dump($career_form);
        $where_career_form =  array(
        	'id' => $form_id,
        	);

        $careerForm = $staffRecruiment->updateFormdata('career_form', $where_career_form, $career_form);


    }


}