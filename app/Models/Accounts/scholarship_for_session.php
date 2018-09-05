<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class scholarship_for_session extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'scholarship_for_session';
    public $timestamps = false;


    public function getScholarShipInformation($student_id,$academic_session_id,$billing_cycle_number)
    {
    	$details=scholarship_for_session::
        join('scholarship_defination','scholarship_for_session.scholarship_type','scholarship_defination.id')
    	->where([['student_id',$student_id],['academic_session_id',$academic_session_id],['billing_cycle_no',$billing_cycle_number]])
    	->get();
    	  return $details;
    }

    
}
