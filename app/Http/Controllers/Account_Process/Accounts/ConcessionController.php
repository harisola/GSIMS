<?php

namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\fee_concession_model;


class ConcessionController extends Controller
{
    public function index()
    {
        $model = new fee_concession_model();
       
        $return = $model->Get_Std_fb_Info_m();
       
    	return view('account_process.accounts.consession')->with( 'concession_info',  $return );
    }

    public function concession_search(Request $request)
    {
        $model = new fee_concession_model();
    	$Gs_id = $request->input("Gs_id");

        $return = $model->Get_Std_fb_Info($Gs_id);




    $returnHTML = view('account_process.accounts.add_concession_form')->with( 'concession_info',  $return )->render();

    return response()->json(array('success' => true, 'html'=>$returnHTML));

    }


    public function concession_search2(Request $request)
    {
        $model = new fee_concession_model();

        $Gs_id = $request->input("Gs_id");
        $tableType = $request->input("tableType");

        if( $tableType == 1)
        {
        	$return = $model->Get_Std_fb_Info2($Gs_id);	
	      }else
	      {
					$return = $model->Get_Std_fb_Info3($Gs_id);	
	      }
        




  $returnHTML = view('account_process.accounts.add_concession_form2')->with( 'concession_info',  $return )->render();

    return response()->json(array('success' => true, 'html'=>$returnHTML));

    }


    public function add_concession(Request $request)
    {
        $model = new fee_concession_model();
    	 parse_str($request->Formdata, $output);

    	 $Student_id    = $output['Student_id'];
       $Concession_id = $output['Concession_id'];
         

    	 $Academic_id = $output['Academic_session_id'];

    	 $concession_type = $output['concession_type'];

    	 $Installment_1 = $output['Installment_1'];
    	 $Installment_2 = $output['Installment_2'];
    	 $Installment_3 = $output['Installment_3'];
    	 $Installment_4 = $output['Installment_4'];
    	 $Installment_5 = $output['Installment_5'];
       $Operation = $output['Operation'];


  	
    $created_at=time();
    $userID = Sentinel::getUser()->id;

if( $Operation == 1 )
{


$Insert_query = "INSERT INTO `atif_fee_student`.`concessions_for_session` ( `student_id`, `concession_code_id`, `academic_session_id`, `Installment_1`, `Installment_2`, `Installment_3`, `Installment_4`, `Installment_5`, `created_at`, `created_by`,`modified_at`,`modified_by`) VALUES ('".$Student_id."', '".$concession_type."', '".$Academic_id."', '".$Installment_1."', '".$Installment_2."', '".$Installment_3."', '".$Installment_4."', '".$Installment_5."', '".$created_at."', '".$userID."', '".$created_at."', '".$userID."');";

	
	if( (int)$concession_type == 111 || (int)$concession_type == 122 )
	{

		if( $Installment_1 > 0 )
		{
			$billing_cycle_no=1;
		}	elseif($Installment_2 > 0 )
		{
			$billing_cycle_no=2;
		}elseif($Installment_3 > 0 )
		{
			$billing_cycle_no=3;
		}elseif($Installment_4 > 0 )
		{
			$billing_cycle_no=4;
		}else {
			$billing_cycle_no=5;
		}

		$billing_cycle_no=1;

		if( $concession_type==111){
			$concession_type2=1;
		}
		else{
			$concession_type2=2;
		}

		$Insert_query2 = "INSERT INTO `atif_fee_student`.`scholarship_for_session` ( `student_id`, `scholarship_type`, `percentage`, `academic_session_id`, `billing_cycle_no`, `created`, `created_by`, `modified`, `modified_by`, `record_deleted`) VALUES ('".$Student_id."','".$concession_type2."', '".$Installment_1."','".$Academic_id."','".$billing_cycle_no."','".$created_at."','".$userID."','".$created_at."','".$userID."',  '0');";

 		echo $return = $model->Fun_insert($Insert_query2);
	}else 
	{
		 echo $return = $model->Fun_insert($Insert_query);
	}  
    

     }else
     {
        
$query = "UPDATE `atif_fee_student`.`concessions_for_session` SET `concession_code_id`='".$concession_type."', `Installment_1`='".$Installment_1."', `Installment_2`='".$Installment_2."', `Installment_3`='".$Installment_3."', `Installment_4`='".$Installment_4."', `Installment_5`='".$Installment_5."', `modified_at`='".$created_at."', `modified_by`='".$userID."' 
    WHERE `concession_id` = ".$Concession_id." AND `student_id`=".$Student_id." AND `academic_session_id`=".$Academic_id."";


  if( (int)$concession_type == 111 || (int)$concession_type == 122 )
	{ 

		if( $concession_type==111){
			$concession_type2=1;
		}
		else{
			$concession_type2=2;
		}
		

			$up_date_query = "UPDATE `atif_fee_student`.`scholarship_for_session` SET `scholarship_type`='".$concession_type2."', `percentage`='".$Installment_1."', `modified`='".$created_at."', `modified_by`='".$userID."' WHERE  `id`=".$Concession_id."";

echo $return = $model->Fun_update($up_date_query);

	}
	else 
	{
		echo $return = $model->Fun_update($query);
	}

     
    	echo 2;
     }   

         

    	 

    	 
    	 
    	 
    	 
    	 
    }


    public function student_concession_info(Request $request)
    {
         $model = new fee_concession_model();

        $Gs_id = $request->input("Gs_id");
        $Academic_session_id = $request->input("Academic_session_id");



        #$return = $model->Get_Std_fb_Info($Gs_id);
        $return = $model->Get_Std_fb_Info_m();

$returnHTML = view('account_process.accounts.concession_right_side_table')->with( 'concession_info',  $return )->render();

    return response()->json(array('success' => true, 'html'=>$returnHTML));

    }
} 
