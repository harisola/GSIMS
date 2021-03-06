<?php

namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\bill_type_model;
use App\Models\Accounts\arrear_adjustment_model;
use Illuminate\Support\Facades\View;

class arrears extends Controller
{

    public function index(){

    	// Get Class List Student
    	$bill_type_model = new bill_type_model();
        
    	$get_classlist = $bill_type_model->get_record('atif.class_list','');


    	// load View if exists
    	if(View::exists('account_process.accounts.arrear')) {
        	return view('account_process.accounts.arrear',[
        		'class_list' => $get_classlist
        	]);
    	}

    }

    // insert or update function
    public function insertAndUpdateArrear(Request $request){
        // Model load
        $arrear_adjustment_model = new arrear_adjustment_model();
        // Ajax POST Request
        $student_id = $request->input('studentId');
        $amount = $request->input('amount');
        $description = $request->input('description');
        $state = $request->input('state');
        $bill_paid_status = 0;

        $state == 1 ? $amount = (int)$amount : $amount =  (int)("-".$amount) ; 

        $data = array(
            'student_id' => $student_id,
            'adjustment_amount' => $amount,
            'description' => $description,
            'status' => $bill_paid_status,
            'modified_by' =>  Sentinel::getUser()->id
        );

        // Update Flag
        if($request->input('updated_id')){

           $id = $request->input('updated_id');
           
           $where = array(
            'id' => $id
           );

           $arrear_adjustment_model->udpate_data('arriers_adjustments',$where,$data);

        }else{
            
            $arrear_adjustment_model->insertProcedure('arriers_adjustments',$data);
        }


    }

    // Get All the Data which was enter in the system

    public function get_arrear_and_adjustment_data(Request $request){

        $arrear_adjustment_model = new arrear_adjustment_model();

        if($request->input('id')){
            $id = $request->input('id');
            $get_arrear = $arrear_adjustment_model->get_arrear_adjustment_join($id);
            echo json_encode($get_arrear);
            
        }else{
            
            $get_arrear = $arrear_adjustment_model->get_arrear_adjustment_join($id = null);
            echo json_encode($get_arrear);
        }

    }
    

}
