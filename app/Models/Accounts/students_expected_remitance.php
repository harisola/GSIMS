<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class students_expected_remitance extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'students_expected_remitances';
    

    public function verifyRemitanceStudent($student_id){
            $result=students_expected_remitance::where('student_id',$student_id)->first();
            return count($result);
    }

     public function getRemitancesPaidFees(){
        $details=students_expected_remitance::
            join('atif.class_list as class_info','students_expected_remitances.student_id','=','class_info.id')
         ->get();
         return $details;
    }





}
