<?php

namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\bill_type_model;
use App\Models\Accounts\arrear_adjustment_model;
use Illuminate\Support\Facades\View;
use App\Models\Accounts\billing_cycle_definition;

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
        $billing_cycle_definition=new billing_cycle_definition;
        $installment_id=$billing_cycle_definition->getCurrentInstallmentNumber();


        // Ajax POST Request
        $student_id = $request->input('studentId');
        $amount = $request->input('amount');
        $description = $request->input('description');
        $state = $request->input('state');
        $academic_session_id = $request->input('academic_session_id');



        $state == 1 ? $amount = (int)$amount : $amount =  (int)("-".$amount) ;


        $data = array(
            'student_id' => $student_id,
            'amount' => $amount,
            'description' => $description,
            'installment_id' => $installment_id,
            'academic_session_id' => $academic_session_id,
            'modified' => time(),
            'modified_by' =>  Sentinel::getUser()->id
        );

        // Update Flag
        if($request->input('updated_id')){

           $id = $request->input('updated_id');
           
           $where = array(
            'id' => $id
           );

           $arrear_adjustment_model->udpate_data('arriers_and_adjustment_manual',$where,$data);

        }else{
            $data = array(
                'student_id' => $student_id,
                'amount' => $amount,
                'description' => $description,
                'academic_session_id' => $academic_session_id,
                'installment_id' => $installment_id,
                'register' => time(),
                'register_by' =>  Sentinel::getUser()->id
            );
                $arrear_adjustment_model->insertProcedure('arriers_and_adjustment_manual',$data);
        }

    }

    // Get All the Data which was enter in the system

    public function get_arrear_and_adjustment_data(Request $request){

        $arrear_adjustment_model = new arrear_adjustment_model();

        // Update Arrear
        if($request->input('id')){
            
            $id = $request->input('id');
            $arrears_flag = $request->input('arrears_flag');
            $get_arrear = $arrear_adjustment_model->get_arrear_adjustment_join($id);
            echo json_encode($get_arrear);
            exit;            

        }else{
            
            $get_arrear = $arrear_adjustment_model->get_arrear_adjustment_join($id = null);
            echo json_encode($get_arrear);
        }

    }
    

}
