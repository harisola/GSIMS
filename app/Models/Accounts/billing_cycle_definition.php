<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class billing_cycle_definition extends Model
{


	protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'billing_cycle_definition';
    public $timestamps = false;

    public function getYearly($bill_cycle,$grade_id,$acadmic_session){
    	$data=billing_cycle_definition::where([['grade_id',$grade_id],['academic_session_id',$acadmic_session],['bill_cycle_no',$bill_cycle]])->first();
    	if($data['yearly_charges']==0){
    		return false;
    	}else{
    		return true;
    	}

    }
}
