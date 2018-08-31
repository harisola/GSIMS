<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class remittance extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'remittance';
    

    public static function verifyRemitanceStudent($student_id){
            $result=remittance::where('student_id',$student_id)->first();
            return count($result);
    }

     public function getRemitancesPaidFees(){
        $details=remittance::
            join('atif.class_list as class_info','remittance.student_id','=','class_info.id')
         ->get();
         return $details;
    }

    public static function remitanceStatus($student_id){
        $result=count(remittance::where('student_id',$student_id)->first());
            if($result=="0"){
                $status="No";
            }else{
                $status="Yes";
            }
           echo $status;
    }
}
