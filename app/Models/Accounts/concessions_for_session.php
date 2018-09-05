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
}
