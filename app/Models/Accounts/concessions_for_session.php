<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class concessions_for_session extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'concessions_for_session';
    public $timestamps = false;


    public function getConcessionInformation($student_id,$academic_session_id)
    {
    	$details=concessions_for_session::join('concession_type_parameter','concessions_for_session.concession_code_id','concession_type_parameter.id')
    	->where([['student_id',$student_id],['academic_session_id',$academic_session_id]])
		->where('concession_code_id','<>',9)
    	->get();
    	  return $details;
    }

    public function southCampusDiscount($student_id,$academic_session_id,$billing_id)
    {
    	$details=concessions_for_session::join('concession_type_parameter','concessions_for_session.concession_code_id','concession_type_parameter.id')
    	->where([['student_id',$student_id],['academic_session_id',$academic_session_id]])
		->where('concession_code_id','=',9)
    	->sum('Installment_'.$billing_id);
    	  return $details;
    }

    public function updateConcession($student_id,$billing_cycle,$academic_session_id){
        $details=concessions_for_session::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])
        ->where('concession_code_id','<>',9)
        ->first();
        $pvs_billing="";
         if($billing_cycle!=1){
            $pvs_billing=$billing_cycle-1;
         }
        $previous_discount=$details["Installment_$pvs_billing"];


        $Installment='Installment_'.$billing_cycle;
        $data = array( $Installment =>$previous_discount);
        $result=concessions_for_session::where([['student_id',$student_id],['concession_code_id',12]])->update($data);
    }
}
