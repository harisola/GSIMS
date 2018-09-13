<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class adjustment extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'adjustments';
    
    public function getadjustments($student_id){
    	// die;
            $total_adjustments=adjustment::where('student_id',$student_id)
            ->first();
            if(empty($total_adjustments['amount'])){
            	 $notfound=0;
            }else{
           	 	$notfound='-'.$total_adjustments['amount'];
            }
            return $notfound;
    }

    public function insertUpdateAdjustment($student_id,$amount){
            $sql="INSERT INTO adjustments (student_id,amount)
            VALUES($student_id,$amount)
            ON DUPLICATE KEY UPDATE amount =$amount";
            $details = DB::connection('mysql_Career_fee_bill')->insert($sql);
    }



}
