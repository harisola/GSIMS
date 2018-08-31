<?php
namespace App\Http\Controllers\Account_Process\Accounts;


use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\fee_bill_model;
use App\Models\Accounts\bill_type_model;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\View;


class FeeBillSetup extends Controller
{
    public function index()
    {
    	$fee_bill_model = new fee_bill_model();
    	$Academic_Session = $fee_bill_model->get_academic_sessions();

    	$ASlist = $this->get_academic_sessions_list();



      return view('account_process.accounts.fee_bill_setup')->with(array("AS"=>$Academic_Session, "ASlist" => $ASlist ));
    }

    public function billTypes(){

    	$fee_type_model = new bill_type_model();
    	$get_feeBill_type = $fee_type_model->get_record('atif_fee_student.fee_bill_type_parameter','');

    	if (View::exists('account_process.accounts.fee_bill_types')) {
        	return view('account_process.accounts.fee_bill_types',[
        		'fee_bill_type' => $get_feeBill_type
        	]);
		}
  

    }



    public function get_academic_sessions_list()
    {
    	$fee_bill_model = new fee_bill_model();
    	$Academic_Session = $fee_bill_model->get_academic_sessions();
			$Html ='';
			
			//$Html .= '<div class="table-scrollable table-scrollable-borderless">';
			$Html .= '<table class="table table-hover table-light" id="table_staffList">';
			$Html .= '<thead>';
				$Html .= '<tr class="uppercase">';
					$Html .= '<th colspan=""> Session </th>';
					$Html .= '<th class="text-center"> Created </th>';
				$Html .= '</tr>';
			$Html .= '</thead>';
			$Html .= '<tbody>';
				if( !empty($Academic_Session) ):

				foreach($Academic_Session as $a ):

				if( $a->is_active == 1 ):
					$Selected='selected';
					$Selected='';
				else :
          $Selected='';
        endif;

        //if( $a->id != 11 && $a->id != 12  ){
			$Html .= '<tr class="'.$Selected.'">';
$Html .= '<td><a href="javascript:void(0)" class="primary-link tooltips staffDefination_profile_id" data-toggle="tooltip" data-id="'.$a->id.'" data-original-title="'.$a->name.'">'.$a->dname.'</a></td>';

$Html .= '<td class="text-center">  Tue, 10 Jul 2018 - <b>ANA</b></td>';
                    		$Html .= '</tr>'; 
                    		//}
                    		
                    		endforeach;

                        endif;

                    	$Html .= '</tbody>';
                    $Html .= '</table>';
              //  $Html .= '</div>';

                return $Html;


    }



public function render_html_right_side(Request $request)
{

	
	$fee_bill_model = new fee_bill_model();

	$ASID = $request->input('ASID');

	$North = ($ASID-1);
	$South = $ASID;

	$Sessions = $North.','.$South;

	$theSessionArray = explode(', ', $Sessions);

  $RecruimentData = $fee_bill_model->Get_Fee_Definition($Sessions);







 


  $returnHTML = view('account_process.accounts.fee_bill_setup_right_side_main')->with( 'staffRecruiment',  $RecruimentData )->render();

	return response()->json(array('success' => true, 'html'=>$returnHTML));
}



public function render_html_right_side_IS(Request $request)
{
	$fee_bill_model = new fee_bill_model();
	$AS_ID = $request->input('ASID');

	$North = ($AS_ID-1);
	$South = $AS_ID;

	$Sessions = $North.','.$South;

	$theSessionArray = explode(',', $Sessions);

	$RecruimentData = $fee_bill_model->get_academic_sessions();

	$billing_defination = $fee_bill_model->get('atif_fee_student.billing_cycle_definition','academic_session_id',$theSessionArray,'bill_cycle_no');



	$returnHTML = view('account_process.accounts.fee_bill_setup_right_side_si')->with(
		[
		 'staffRecruiment' => $RecruimentData,
		 'billing_defination'=>$billing_defination,
		 'academic_session_id'=>$Sessions
		])->render();


	return response()->json(array('success' => true, 'html'=>$returnHTML));
}



public function render_html_right_side_Other(Request $request)
{

	
	$fee_bill_model = new fee_bill_model();
	$AS_ID = $request->input('ASID');

	$North = ($AS_ID-1);
	$South = $AS_ID;

	$Sessions = $North.','.$South;

	$theSessionArray = explode(',', $Sessions);

	$billing_tax = $fee_bill_model->get('atif_fee_student.tax_amount','academic_session_id',$theSessionArray,'academic_session_id');


	$RecruimentData = $fee_bill_model->get_academic_sessions();

	$returnHTML = view('account_process.accounts.fee_bill_setup_right_side_other')->with([
		'staffRecruiment'=>$RecruimentData,
		'tax_amount'=>$billing_tax,
		'academic_session_id'=>$South
		])->render();

	return response()->json(array('success' => true, 'html'=>$returnHTML));
}


public function free_structure_post_data(Request $request)
{
	$fee_bill_model = new fee_bill_model();


  

  parse_str($request->Formdata, $output);
	

  

	$Academic_id = $output['Academic_id'];
	$Session_name = $output['Session_name'];
	$Academic_dname = $output['Academic_dname'];
	$Academic_Start_date = $output['Academic_Start_date'];
	$Academic_End_date = $output['Academic_End_date'];
	
	$Definition_id = $output['Definition_id'];


	

	

	$North = $Academic_id;
  $South = ($Academic_id+1);


  $NC = "NC_".$Session_name;
  $SC = "SC_".$Session_name;
	$NowTime = time();
  
	$userID = Sentinel::getUser()->id;



	$query = "UPDATE `atif`.`_academic_session` SET `name`='".$NC."', `dname`='".$Academic_dname."', `start_date`='".$Academic_Start_date."', `end_date`='".$Academic_End_date."',`modified`='".$NowTime."', `modified_by`='".$userID."' WHERE  `id`=".$North."";

	 $fee_bill_model->Update_Fee_Definition($query);

	 $query = "UPDATE `atif`.`_academic_session` SET `name`='".$SC."', `dname`='".$Academic_dname."', `start_date`='".$Academic_Start_date."', `end_date`='".$Academic_End_date."',`modified`='".$NowTime."', `modified_by`='".$userID."' WHERE  `id`=".$South."";

	$fee_bill_model->Update_Fee_Definition($query);


	

	
foreach( $Definition_id as $d)
{
	$Tution_Fee_ = $output['Tution_Fee_'.$d];	
	$Resource_fee_ = $output['Resource_fee_'.$d];
	$Musakhar_ = $output['Musakhar_'.$d];
	$Lab_avc_ = $output['Lab_avc_'.$d];
	$Yearly_fee_ = $output['Yearly_fee_'.$d];




  $query = "UPDATE `atif_fee_student`.`fee_definition` SET `tuition_fee`='".$Tution_Fee_."', `resource_fee`='".$Resource_fee_."', `musakhar`='".$Musakhar_."', `lab_avc`='".$Lab_avc_."', `yearly`='".$Yearly_fee_."', `modified`='".$NowTime."', `modified_by`='".$userID."' WHERE  `id`=".$d.";";



	$fee_bill_model->Update_Fee_Definition($query);
}



}




public function free_structure_post_data2(Request $request)
{
	$fee_bill_model = new fee_bill_model();
	parse_str($request->Formdata, $output);
	$Session_name = $output['Session_name'];
	$Academic_dname = $output['Academic_dname'];
	$Start_Date = $output['Academic_Start_date'];
	$End_Date = $output['Academic_End_date'];
	$NowTime = time();
  $userID = Sentinel::getUser()->id;
	$Start_Date = date('Y-m-d',strtotime(  $Start_Date  ) );
	$End_Date = date('Y-m-d', strtotime(  $End_Date  ) );
	$NC_Display_Name = 'NC_'.$Session_name;
	$SC_Display_Name = 'SC_'.$Session_name;
	$Created_Date    = time();
	$Modified_Date   = time();
	$Add = 0;
	$getSession = $fee_bill_model->get_Session();
	if( !empty( $getSession ) )
	{
		foreach ($getSession as $value) 
		{
		 if( ( $value->start_date >  $Start_Date ) || ( $value->end_date >  $End_Date ))
			{
				$Add = 1;
			}
		}
  }

  if( $Start_Date > $End_Date )
  {
  	$Add = 1;
  }

	if( $Add == 0)
	{
		// insert Acadmic for North Campus
	 	$query="INSERT INTO `atif`.`_academic_session` (`branch_id`, `name`, `dname`, `start_date`, `end_date`, `is_lock`, `is_active`, `created`, `register_by`, `modified`, `modified_by`, `record_deleted`) VALUES ('1', '".$NC_Display_Name."', '".$Academic_dname."', '".$Start_Date."', '".$End_Date."', '1', '0', '".$Created_Date."', '".$userID."', '".$Modified_Date."', '".$userID."', '0');";

		$fee_bill_model->Fun_insert($query);


		$sql = "select s.id as Session_id from atif._academic_session as s
where s.name='".$NC_Display_Name."'";

$lastid_nc = $fee_bill_model->get_query($sql);
$Session_id_nc = $lastid_nc[0]->Session_id;




	// insert Acadmic for South Campus
		$query="INSERT INTO `atif`.`_academic_session` (`branch_id`, `name`, `dname`, `start_date`, `end_date`, `is_lock`, `is_active`, `created`, `register_by`, `modified`, `modified_by`, `record_deleted`) VALUES ('2', '".$SC_Display_Name."', '".$Academic_dname."', '".$Start_Date."', '".$End_Date."', '1', '0', '".$Created_Date."', '".$userID."', '".$Modified_Date."', '".$userID."', '0');";

		$lastid_sc = $fee_bill_model->Fun_insert($query);


				$sql = "select s.id as Session_id from atif._academic_session as s
where s.name='".$SC_Display_Name."'";

		$lastid_sc = $fee_bill_model->get_query($sql);
		$Session_id_sc = $lastid_sc[0]->Session_id;

	}
	
	for( $grade_id = 1; $grade_id <=5; $grade_id++ )
	{

		// Fee Definition for North Campus
		$query_nc = "INSERT INTO `atif_fee_student`.`fee_definition` (`academic_session_id`,  `grade_id`, `tuition_fee`, `resource_fee`, `musakhar`, `lab_avc`, `yearly`, `created`, `register_by`, `record_deleted`) VALUES ('".$Session_id_nc."', '".$grade_id."', '0', '0', '0', '0', '0', '".$Created_Date."', '".$userID."', '0' );";
		$fee_bill_model->Fun_insert($query_nc);	
	}


for( $grade_id = 6; $grade_id <=17; $grade_id++ )
	{

		// Fee Definition for South Campus
		if( $grade_id == 17 )
		{
			$Session_id_sc = $Session_id_nc;
		}

		$query_nc = "INSERT INTO `atif_fee_student`.`fee_definition` (`academic_session_id`,  `grade_id`, `tuition_fee`, `resource_fee`, `musakhar`, `lab_avc`, `yearly`, `created`, `register_by`, `record_deleted`) VALUES ('".$Session_id_sc."', '".$grade_id."', '0', '0', '0', '0', '0', '".$Created_Date."', '".$userID."', '0' );";

		$fee_bill_model->Fun_insert($query_nc);	
	}



	$ASlist = $this->get_academic_sessions_list();

	echo json_encode( array("html"=>$ASlist) );


}
	/*
	* Name: Add Installment
	* Procedure: Add and Update Installment
	* database:atif_fee_student
	* table:billing_cycle_defination
	*/

	public function addInstallment(Request $request){
		$fee_bill_model = new fee_bill_model();
		$html = '';
		$installment_id = $request->input('installment_id');
		$academic_session_id = $request->input('academic_session_id');
		$issue_date = $request->input('issue_date');
		$due_date = $request->input('due_date');
		$validy_date = $request->input('validy_date');
		$adj_freeze_date = $request->input('adj_freeze_date');
		$yearly_charges = $request->input('yearly_charges');



        $validator = Validator::make(
		    array(
		    	'issue_date_required' => $request->input('issue_date'),
		    	'due_date_requried' => $request->input('due_date'),
		    	'validy_date_required' => $request->input('validy_date'),
		    	'adj_freeze_date_required' => $request->input('adj_freeze_date')
		   	),
		    array(
		        'issue_date_required' => 'required',
		        'due_date_requried' => 'required',
		    	'validy_date_required' =>'required',
		    	'adj_freeze_date_required' => 'required'
		    )
		);

    	

			if ($validator->fails())
			{
			    // The given data did not pass validation
			    $messages = $validator->messages();
			    $html .= '<div class="alert alert-danger">';
			    foreach ($messages->all() as $message)
				{
    				
  					$html .= '<h4>'.$message.'</h4>';
  
				}
				$html .= '</div>';
				echo $html;
			}else{
				
				$whereOrIN = explode(',', $academic_session_id);
				$where = array(
					'bill_cycle_no'=>$installment_id
				);
				$insertUpdateFlag =  $fee_bill_model->insertOrUpdate('atif_fee_student.billing_cycle_definition',$where,'academic_session_id',$whereOrIN,'');
				// Either Data is Inserted Or Updated
				if($insertUpdateFlag){

					$whereOrIN = explode(',', $academic_session_id);
					$where = array(
						'bill_cycle_no'=>$installment_id
					);
					$data = array(
						'bill_cycle_no'=>$installment_id,
						'issue_date' => $issue_date,
						'due_date' => $due_date,
						'bank_validity_date'=>$validy_date,
						'adjustment_freeze_date'=>$adj_freeze_date,
						'yearly_charges' => $yearly_charges,
						'bill_months' => 2.4,
						'modified' => time(),
					    'modified_by' => Sentinel::getUser()->id,
					);

					$update =  $fee_bill_model->updateProcedure('atif_fee_student.billing_cycle_definition',$where,'academic_session_id',$whereOrIN,$data);
				}else{
					for($i = 1 ; $i <= 17; $i++){

						if($i <= 5 OR $i == 17){
							$academic_session_id =  $whereOrIN[0];
						}else{
							$academic_session_id =  $whereOrIN[1];
						}

						$data = array(
							'grade_id' => $i,
							'bill_cycle_no'=>$installment_id,
							'issue_date' => $issue_date,
							'due_date' => $due_date,
							'bank_validity_date'=>$validy_date,
							'adjustment_freeze_date'=>$adj_freeze_date,
							'bill_months' => 2.4,
							'yearly_charges' => $yearly_charges,
							'academic_session_id' => $academic_session_id,
							'title' => 'installment # '.$installment_id,
							'created' => time(),
					        'register_by' => Sentinel::getUser()->id,
					        'modified' => time(),
					        'modified_by' => Sentinel::getUser()->id,
					        'record_deleted' => 0

						);
						$insert =  $fee_bill_model->insertProcedure('atif_fee_student.billing_cycle_definition',$data);
					}
				}

				$html .= '<div class="alert alert-success">';
  				$html .= '<h4>Data insert successfully</h4>';
				$html .= '</div>';
				echo $html;
			}
	}


		/*
	* Name: Add Tax
	* Procedure: Add and Update addTax
	* database:atif_fee_student
	* table:tax_amount
	*/

	public function addTax(Request $request){
		$fee_bill_model = new fee_bill_model();
		$html = '';
		$tax_amount_apply = $request->input('tax_amount_apply');
		$academic_session_id = $request->input('academic_session_id');
		$tax_amount_per = $request->input('tax_amount_per');

		


        $validator = Validator::make(
		    array(
		    	'tax_amount_apply_required' => $request->input('tax_amount_apply'),
		    	'tax_amount_per_required' => $request->input('tax_amount_per'),

		   	),
		    array(
		        'tax_amount_apply_required' => 'required|numeric',
		        'tax_amount_per_required' => 'required|numeric',

		    )
		);

    	

			if ($validator->fails())
			{
			    // The given data did not pass validation
			    $messages = $validator->messages();
			    $html .= '<div class="alert alert-danger">';
			    foreach ($messages->all() as $message)
				{
    				
  					$html .= '<h4>'.$message.'</h4>';
  
				}
				$html .= '</div>';
				echo $html;
			}else{
				$where = array(
					'academic_session_id'=>$academic_session_id,
					'academic_session_id'=>$academic_session_id-1
				);
				$insertUpdateFlag =  $fee_bill_model->insertOrUpdate('atif_fee_student.tax_amount',$where,'','','');

			 	// Either Data is Inserted Or Updated
				if($insertUpdateFlag){

					$data = array(
						'tax_amount'=>$tax_amount_apply,
						'tax_percentage' => $tax_amount_per,
						'modified' => time(),
					    'modified_by' => Sentinel::getUser()->id,
					);

					$update =  $fee_bill_model->updateProcedure('atif_fee_student.tax_amount',$where,null,null,$data);
				
				}else{

					$data = array(
							'academic_session_id'=>$academic_session_id,
							'tax_amount'=>$tax_amount_apply,
							'tax_percentage' => $tax_amount_per,
							'created' => time(),
					        'created_by' => Sentinel::getUser()->id,
					        'modified' => time(),
					        'modified_by' => Sentinel::getUser()->id,
					        'record_deleted' => 0

					);
					$insert =  $fee_bill_model->insertProcedure('atif_fee_student.tax_amount',$data);

					$data = array(
							'academic_session_id'=>$academic_session_id-1,
							'tax_amount'=>$tax_amount_apply,
							'tax_percentage' => $tax_amount_per,
							'created' => time(),
					        'created_by' => Sentinel::getUser()->id,
					        'modified' => time(),
					        'modified_by' => Sentinel::getUser()->id,
					        'record_deleted' => 0

					);
					$insert =  $fee_bill_model->insertProcedure('atif_fee_student.tax_amount',$data);
			}
			$html .= '<div class="alert alert-success">';
  			$html .= '<h4>Data insert successfully</h4>';
			$html .= '</div>';
			echo $html;
		}
	}

	public function getBillType(Request $request){
		$fee_type_model = new bill_type_model();
		if ($request->input('id') !== null){
			$where = array('id'=>$request->input('id'));
			$record = $fee_type_model->get_record('atif_fee_student.fee_bill_type_parameter',$where);
			echo json_encode($record);
		}
	}

	public function updateBillType(Request $request){

		$fee_type_model = new bill_type_model();
		$html = '';
		$bill_title = $request->input('bill_title');
		$bill_notes = $request->input('bill_notes');
		$bill_type_id = $request->input('bill_type_id');




        $validator = Validator::make(
		    array(
		    	'title' => $request->input('bill_title'),
		    	'bill_notes_required' => $request->input('bill_notes'),

		   	),
		    array(
		        'title' => 'required|max:100',
		        'bill_notes_required' => 'required|max:400',

		    )
		);

		if ($validator->fails()){
		    // The given data did not pass validation
		    $messages = $validator->messages();
		    $html .= '<div class="alert alert-danger">';
		    foreach ($messages->all() as $message)
			{
				
					$html .= '<h4>'.$message.'</h4>';

			}
			$html .= '</div>';
			echo $html;
		}else{
			$where = array(
				'id' => $bill_type_id
			);

			$data = array(
				'title' => $bill_title,
				'notes' => $bill_notes,
				'modified' => time(),
				'modified_by' => Sentinel::getUser()->id
			);

			$updatedFlag =  $fee_type_model->udpate_data('fee_bill_type_parameter',$where,$data);


			$html .= '<div class="alert alert-success">';
  			$html .= '<h4>Data insert successfully</h4>';
			$html .= '</div>';
			echo $html;

		}
	}

}

