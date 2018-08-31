<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class fee_definition extends Model
{
	protected $connection = 'mysql_Career_fee_bill';
	protected $table = 'fee_definition';
	public $timestamps = false;

    public function feeDetailByGradeAndSession($grade_id,$academic_session_id){
    	$fee=fee_definition::where([['grade_id',$grade_id],['academic_session_id',$academic_session_id]])->first();
    	return $fee;
    }

    
}
