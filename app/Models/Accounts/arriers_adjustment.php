<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class arriers_adjustment extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'arriers_adjustments';
    
    public function getAllRemitanceadjustements($student_id){
    	// echo $student_id;
    	// die;
            @$total_adjustments=arriers_adjustment::where('student_id',$student_id)
            ->orderBy('id','desc')->first();
            return ($total_adjustments);
            var_dump($total_adjustments);
            if(empty($total_adjustments['adjustment_amount'])){
            	return 0;
            }else{
            	return $total_adjustments;
            }
    }

    public function InsertUpdateArriers($student_id,$amount){
        $sql="INSERT INTO atif_fee_student.arriers_adjustments (student_id, adjustment_amount)
            VALUES($student_id,$amount)
            ON DUPLICATE KEY UPDATE adjustment_amount =$amount";
            $details = DB::connection('mysql_Career_fee_bill')->insert($sql);

    }



}
