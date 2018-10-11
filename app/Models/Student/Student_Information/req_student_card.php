<?php

namespace App\Models\student\Student_Information;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class req_student_card extends Model
{
	protected $connection='default_Atif';
    protected $table='req_student_card';

    public function GetSmartCardCharges($student_id,$last_bill_issue_date){
        $today_date=date('Y-m-d');
        $req_student_card=req_student_card::
        where([['student_id',$student_id],['duplicate',1]])
        ->whereBetween('req_date', [$last_bill_issue_date, $today_date])
        ->sum('amount');
        // print_r($req_student_card);
        return $req_student_card;
    }

}
