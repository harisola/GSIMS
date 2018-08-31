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
 



  	$grade = $staffRecruiment->get_grade();
  	$status = $staffRecruiment->get_status();
  	$campus = $staffRecruiment->get_branch();
	$career_allocation = $staffRecruiment->get_allocation();
	$get_getTags = $staffRecruiment->get_getTags();

  	return view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_view')
  			->with(array('staffRecruiment' => $RecruimentData,'tag'=> $tag,'grade'=>$grade,'status'=> $status,'campus' => $campus,'career_allocation'=>$career_allocation,"get_getTags"=>$get_getTags));
  }

public function addcustomer(Request $request)
{
	$staffRecruiment = new Staff_recruitment_model();

  if( $request->input('pathname') )
  {
    $pathname = $request->input('pathname');
    $pathname = explode("/#", $pathname);

    if( !empty( $pathname[1] ) && 
      ( $pathname[1] == 'staff_recruitment_initiation_archive') 
    ){
      $RecruimentData = $staffRecruiment->get_recruitment_archive_data();  
    }else
    {
      $RecruimentData = $staffRecruiment->get_recruitment_data();  
    }

  }else
  {
    $RecruimentData = $staffRecruiment->get_recruitment_data();  
  }
  

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
        if(!empty($request->input('taging'))){
          $tag = implode( ',', $request->input('taging') );
        }else{
          $tag = '';
        }
        
        $applicant_allocate = $request->input('allocation_staff');
        if(empty($applicant_allocate)){
          $applicant_allocate = 1;
        }

        $career_grade_id = $request->input('allocation_grade');

        if(empty($career_grade_id )){
          $career_grade_id  = 1;
        }
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
          'created' => $timeNow,
          'register_by' => $userID,
          'modified' => $timeNow,
          'modified_by' => $userID,                    
          'record_deleted' => 0
        );
        
        $career_form = array(
        					'status_id' => $status_next, 
        					'stage_id' => $stage_next,
                  'modified' => time()
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


        $flag_next_status = $staffRecruiment->get_form_status($form_id, $status_next);

        $data_next_status = array(
            'form_id' => $form_id,
            'status_id' => $status_next,
            'stage_id' => 1,
            'tag' => $tag,
            'applicant_allocate' => $applicant_allocate,
            'career_grade_id' => $career_grade_id,
            'campus' => $campus,
            'created' => time(),
            'register_by' => Sentinel::getUser()->id,
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id
        );

        if( count( $flag_next_status ) == 0 ){

          $id_delete = $staffRecruiment->get_deleted_id($form_id);
          var_dump($id_delete);
          if(!empty($id_delete)){
            var_dump($id_delete[0]->id);
            $delete_career_data = $staffRecruiment->delete_id('atif_career.career_form_data', $id_delete[0]->id);

            
          }
          $RecruimentData = $staffRecruiment->insertFormData('career_form_data',$data_next_status);

          if(!empty($id_delete[0]->status_id)){
            var_dump($id_delete[0]->status_id);
            $get_log =  $staffRecruiment->get_log_status($form_id,$id_delete[0]->status_id);
            var_dump($get_log);

            foreach($get_log as $delete_log){
              $delete_log_data = $staffRecruiment->delete_id('atif_career.log_career_form', $delete_log->id); 
              var_dump($delete_log_data);
            }
            //var_dump($delete_log_data);
          }

        }else {
          $where = array(
            'form_id' => $form_id,
            'status_id' => $status_next,
            'modified' => time()
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
    	$data['data'] = $staffRecruiment->get_applicant_recruitment_data($form_id);
      $current_status = $data['data'][0];
      $current_status  = $current_status['current_status_id'];
      $data['showMarkAsPresence'] = $staffRecruiment->get_mark_as_presence($form_id, $current_status);
      $data['status'] = $staffRecruiment->get_form_log($form_id);
      $missing_status = [];
      $data['callForPartBGate'] =  $staffRecruiment->activeGates($form_id);
    	foreach ($data['status'] as $value) {
        for ($i=$value->gap_starts_at; $i <= $value->gap_ends_at; $i++) { 
          
          array_push($missing_status, intval($i) );
        }
      }

      $data['status'] = $missing_status;
      echo json_encode($data);
    }


    // Mark Presence
    public function mark_presence(Request $request){

    	$form_id  = $request->input('form_id');
    	$status_id = $request->input('status_id');

    	$staffRecruiment = new Staff_recruitment_model();

    	$career_form = array('stage_id' => 4,'status_id' => $status_id,'modified' => time() );
        // var_dump($career_form);
        $where_career_form =  array(
        	'id' => $form_id,
        	);

        $careerForm = $staffRecruiment->updateFormdata('career_form', $where_career_form, $career_form);

        
          // $data = array(
          //   'form_id' => $form_id,
          //   'status_id' => $status_id,
          //   'stage_id' => 4,
          //   'created' => time(),
          //   'register_by' => Sentinel::getUser()->id,
          //   'modified' => time(),
          //   'modified_by' => Sentinel::getUser()->id
          // );

        //  $RecruimentData = $staffRecruiment->insertFormData('career_form_data',$data);
        

    }

    public function call_for_part_b_presence(Request $request){
      $form_id = $request->input('form_id');
      $status_id = $request->input('status_id');
      $stage_id = $request->input('stage_id');

      $staffRecruiment = new Staff_recruitment_model();

      $career_form = array(
        'stage_id' => $stage_id,
        'status_id' => $status_id,
        'modified' => time(),
        'modified_by' => Sentinel::getUser()->id
        );
        // var_dump($career_form);
        $where_career_form =  array(
          'id' => $form_id,
          );

        $careerForm = $staffRecruiment->updateFormdata('career_form', $where_career_form, $career_form);

        if($status_id == 11 && $stage_id == 4)
		{
			$career_form = array('stage_id' => 1,'status_id' => 1 );
          
			$where_career_form =  array( 'id' => $form_id, );

			$careerForm = $staffRecruiment->updateFormdata('career_form', $where_career_form, $career_form);

        }

    }
	
	
	
	
	
	
	
	  public function addFormDataMoveToArchive(Request $request)
	  {
		
		$staffRecruiment = new Staff_recruitment_model();
        
        $userID = Sentinel::getUser()->id;
        $form_id = $request->input('form_id');

        $stage_id = $request->input('stage_id');
		$status_id =  $request->input('status_id');
		
        if(!empty($request->input('taging'))){
          $tag = implode( ',', $request->input('taging') );
        }else{
          $tag = '';
        }
        $applicant_allocate = 1;
        $career_grade_id  = 1;
        
		$comments_applicant = "";
        
		$comments_next_decision = "";
        $date = "1970-01-01";
        $time = "00:00:00";
        $campus = 0;
        $comments_next_step_aloc = "";
        $comments_next_step = "";
        $timeNow = time();
        $stage_next = "";
        $status_next  = "";


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
          'created' => $timeNow,
          'register_by' => $userID,
          'modified' => $timeNow,
          'modified_by' => $userID,                    
          'record_deleted' => 0
        );
        
        
		
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
		
		

        
	}
	
	
	
	
	public function loadLogs( Request $request )
{
	$staffRecruiment = new Staff_recruitment_model();
	
	
	
	$userID = Sentinel::getUser()->id;
	
    $form_id = $request->input('Form_id');
	
	$RecruimentData = $staffRecruiment->Get_Logs($form_id);	
		
   $returnHTML = view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_view_load_logs')->with( array('staffRecruiment' => $RecruimentData,'userID'=> $userID ) )->render();
	return response()->json(array('success' => true, 'html'=>$returnHTML));
}

  public function addPreperationChecks(Request $request){

    $staffRecruiment = new Staff_recruitment_model();
    $userID = Sentinel::getUser()->id;
    $status_id = $request->input('status_id');
    $stage_id = 1;
    $form_id = $request->input('form_id');
    $preperation_checks =  implode(",",$request->input('preperation_checks'));
    $flag =  $staffRecruiment->get_form_status($form_id,$status_id);
    $timeNow = time();
    $data = array(
              'form_id' => $form_id,
              'stage_id' => $stage_id,
              'status_id' => $status_id,
              'checks' => $preperation_checks,
              'created' => $timeNow,
              'register_by' => $userID,
              'modified' => $timeNow,
              'modified_by' => $userID,                    
              'record_deleted' => 0
            );    
        $form_data = array(
                'status_id' => $status_id,
                'modified' => $timeNow,
                'modified_by' => $userID  
              );
         $form_data_where = array(
            'id' => $form_id
           );    
    //Insert
    if( count( $flag ) == 0 ){
       $RecruimentData = $staffRecruiment->insertFormData('career_form_data',$data);
       $staffRecruiment->updateFormdata('atif_career.career_form', $form_data_where, $form_data);
    //Update
    } else {
        $where = array(
            'form_id' => $form_id,
            'status_id' => $status_id
           );
        $RecruimentData = $staffRecruiment->updateFormdata('atif_career.career_form_data', $where, $data);

        $staffRecruiment->updateFormdata('atif_career.career_form', $form_data_where, $form_data);
    }

  }
	

 
 
 
 
public function modified_form_list(Request $request)
{
	$staffRecruiment = new Staff_recruitment_model();
    $userID = Sentinel::getUser()->id;
	
	
		
	
	
	$From_Date =  $request->input('From_Date');
		
	if(!empty($request->input('To_Date')))
	{
		$To_Date =  $request->input('To_Date'); 
	}else
	{
		$To_Date =  $request->input('From_Date'); 
	}
	$Where = 'where ';
	
	$Where .= " ( ( from_unixtime(lcf.modified, '%Y-%m-%d') >= '".$From_Date."' and from_unixtime(lcf.modified, '%Y-%m-%d') <= '".$To_Date."' )
			or
			( from_unixtime(c.modified, '%Y-%m-%d') >= '".$From_Date."' and from_unixtime(c.modified, '%Y-%m-%d') <= '".$To_Date."' )
			) ";
		
	$searchString = ',';
	 
	if( !empty( $request->input('Source') ))
	{
		$Source = $request->input('Source');
		if( strpos($Source, $searchString) !== false ) {
			$Where .= " AND ( (c.form_source=1 or c.form_source=0) )";
		}else{
			if( $Source == 'Online' ){
				$Where .= " AND ( c.form_source=1 )";
			}else{
				$Where .= " AND ( c.form_source=0 )";
			}
		}
	}
		
	
	
		
		
	if( !empty( $request->input('CForPartB') ))
	{
		$CForPartB = $request->input('CForPartB');
		$Status = 0; $Stage = 0;
		if( strpos($CForPartB, $searchString) !== false ) {
			$exploded_CForPartB = explode(",",$CForPartB);
			$numItems = count($exploded_CForPartB);
			$i = 0;
			$Where .= " AND ( ";
			for($counter=0; $counter < $numItems; $counter++ )
			{
				$CForPartB2 = $exploded_CForPartB[$counter]; 
				switch( $CForPartB2 )
				{
					case 'CallForPartB' : 
						$Status = 11; $Stage = 9; 
						$lcf_Status1 = 11; $lcf_Stage1 = 9; 
						$lcf_Status = 1; $lcf_Stage = 1;
						break;
					case 'CommunicatedForPartB' : 
						$Status = 11; $Stage = 10; 
						$lcf_Status = 11; $lcf_Stage = 10; 
						$lcf_Status1 = 11; $lcf_Stage1 = 10;
						break;
					case 'CompletedPartB' : 
						$Status = 11; $Stage = 4; 
						$lcf_Status = 11; $lcf_Stage = 4; 
						$lcf_Status1 = 11; $lcf_Stage1 = 4;
						break;
				}
				$Where  .= " ( ( lcf.status_id=".$lcf_Status1." and lcf.stage_id=".$lcf_Stage1." ) or ( lcf.status_id=".$lcf_Status." and lcf.stage_id=".$lcf_Stage." ) or (c.status_id=".$Status." and c.stage_id=".$Stage." ) )";
				
				if(++$i === $numItems) {}else{ $Where  .= " OR "; }
			}
			$Where .= " )  ";
		}else{
			switch( $CForPartB )
			{
				case 'CallForPartB' : 
						$Status = 11; $Stage = 9; 
						$lcf_Status1 = 11; $lcf_Stage1 = 9; 
						$lcf_Status = 1; $lcf_Stage = 1;
						break;
					case 'CommunicatedForPartB' : 
						$Status = 11; $Stage = 10; 
						$lcf_Status = 11; $lcf_Stage = 10; 
						$lcf_Status1 = 11; $lcf_Stage1 = 10;
						break;
					case 'CompletedPartB' : 
						$Status = 11; $Stage = 4; 
						$lcf_Status = 11; $lcf_Stage = 4; 
						$lcf_Status1 = 11; $lcf_Stage1 = 4;
						break;
			}
			$Where  .= " AND ( ( lcf.status_id=".$lcf_Status1." and lcf.stage_id=".$lcf_Stage1." ) or ( lcf.status_id=".$lcf_Status." and lcf.stage_id=".$lcf_Stage." ) or (c.status_id=".$Status." and c.stage_id=".$Stage." ) )";
		}
		
	}	
	
	
	/*if( !empty( $request->input('Position') ))
	{
		$Position =  $request->input('Position');
		if( strpos($Position, $searchString) !== false ) {
			$p = explode(",",$Position);
			$count_p = count($p);
			$Where .= " AND ( ". $this->makeWhereCaluse($Position, ',', 'c.position_applied', 0, 'OR', $count_p) . " ) ";
		}else{
			$Where .= " AND ( c.position_applied='".$Position."' )";
		}
	}*/

	if( !empty( $request->input('Position') ))
	{
		$Position =  $request->input('Position');
		$count_p = 0;
		if( strpos($Position, $searchString) !== false ) {
			$p = explode(",",$Position);
			$count_p = count($p);
		}else{
			#$Where .= " AND ( c.position_applied='".$Position."' )";
		}
		$Where .= " AND ( ". $this->makeWhereCaluse($Position, ',', 'c.position_applied', 0, 'OR', $count_p) . " ) ";
	}	
	
	if( !empty( $request->input('Current_Standing') ))
	{
		$Current_Standing =  $request->input('Current_Standing');
		$count_p2 = 0;
		$c=1;
		$value='';
		$skip=true;
		if( strpos($Current_Standing, $searchString) !== false ) {
			$p = explode(",",$Current_Standing);
			$count_p2 = count($p);
			$c=1;
			for($a=0; $a < $count_p2; $a++){
				
				if( $p[$a]=='Archive' ){ $c=10; }
				if($skip){ 
					$value .= $c; 
					$skip=false; 
				}else{ 
					$value .= ','.$c; 
				}
				$c++;
				
			}
			
		}else{
			$value=$Current_Standing;
			switch( $Current_Standing )
			{
				case 'Form Screening': $value=1; break; case 'Initial Interview': $value=2; break;
				case 'Formal Interview': $value=3; break; case 'Observation': $value=4; break;
				case 'Final Consultation': $value=5; break; case 'Archive': $value=10; break;
			}
		}
		$Where .= " AND ( ". $this->makeWhereCaluse($value, ',', 'c.status_id', 0, 'OR', $count_p2) . " ) ";
	}
	
	
	if( !empty( $request->input('Campus') ))
	{
		$Campus = $request->input('Campus');
		if( strpos($Campus, $searchString) !== false ) {
			$Where .= " AND ( (part_b.campus=1 or part_b.campus=2) )";
		}else{
			if( $Campus == 'South' ){
				$Where .= " AND ( part_b.campus=2 )";
			}else{
				$Where .= " AND ( part_b.campus=1 )";
			}
		}
	}
	
	
	
	
	#echo $Where; exit;

  $RecruimentData = $staffRecruiment->get_recruitment_data_where($Where);
  #var_dump( $RecruimentData ); exit;
  $returnHTML = view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_view_reload2')->with('staffRecruiment', $RecruimentData)->render();
	return response()->json(array('success' => true, 'html'=>$returnHTML));
	
	
}
 
 
 
 public function makeWhereCaluse($stringArray, $seprator, $makeWithName, $IsNum, $LogicOperator, $RemoveLast){
		$Strings = explode($seprator, $stringArray);

		$i = 1;
		$WhereClause = '';
		if(strpos($stringArray, $seprator)>0){
			$WhereClause = '(';
			foreach ($Strings as $dd) {
				if($dd == 'All' || (count($Strings)==$i && $RemoveLast==1)){
					break;
				}else{
					if($IsNum==0){
						$WhereClause .= $makeWithName . "= '" . $dd . "' " . $LogicOperator . " ";
					}else{
						$WhereClause .= $makeWithName . "= " . $dd . " " . $LogicOperator . " ";
					}
				}
				$i++;
			}
			$WhereClause = substr($WhereClause, 0, -(strlen($LogicOperator)+2));
			$WhereClause .= ')';
		}else{
			if($stringArray!='' && $stringArray != 'All' && $stringArray != 'All,'){
				$WhereClause = '(' . $makeWithName . "=" . "'".$stringArray."'" . ')';
			}
		}

		return $WhereClause;
	}

}