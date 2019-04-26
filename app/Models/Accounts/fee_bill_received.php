<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class fee_bill_received extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'fee_bill_received';
    public $timestamps = false;

    public function getReceivedAmount($bill_id,$student_id="",$academic_session_id=""){

        //i have to get student id by bill id
        $july_fee=fee_bill_received::where(
             [

                ['fb.student_id',$student_id],
                ['fb.bill_cycle_no',5],
                ['received_date','>','2018-06-30'],
                ['received_date','<','2018-12-30'],

             ]
            )
        ->join('fee_bill as fb','fb.id','fee_bill_received.fee_bill_id')
        ->sum('received_amount');


        $fee=fee_bill_received::where([['fee_bill_id',$bill_id],['received_date','>','2018-06-30']])->sum('received_amount');
        return ($fee+$july_fee);
    }

        public function getLastJulyAmount($student_id="",$academic_session_id=""){

        //i have to get student id by bill id
                            $academic_session_id=$academic_session_id-1;

        $july_fee=fee_bill_received::where(
             [
                ['fb.student_id',$student_id],
                ['fb.bill_cycle_no',5],
                ['received_date','>','2018-06-30'],
                ['received_date','<','2018-12-30'],

             ]
            )
        ->join('fee_bill as fb','fb.id','fee_bill_received.fee_bill_id')
        ->sum('received_amount');

        return $july_fee;
    }

    public function getLastReceivedAmount($bill_id){
        $received="";
        $bill_id;

        $fee=fee_bill_received::where([['fee_bill_id',$bill_id],['received_date','>','2018-06-30']])->select('received_amount')->Orderby('id','desc')->get();
        foreach ($fee as $fees) {
            if($fees->received_amount>200000){
                $received=$fees->received_amount;
            }
        }
        return  $received;
    }


    public static function checkAmountExceed($student_id){
             $query = "SELECT fbr.received_amount as total_received FROM atif.class_list cl
            left JOIN atif_fee_student.fee_bill fb
            on fb.student_id=cl.id
            left JOIN atif_fee_student.fee_bill_received fbr
            on fbr.fee_bill_id=fb.id
            where fb.academic_session_id IN (11,12)
            and fb.bill_cycle_no in (1,2,3,4,5,6,7,8,9,10)
            and fb.student_id=$student_id";
         $fee = DB::connection('mysql_Career_fee_bill')->select($query);
         $i=0;
        foreach ($fee as $fees) {
             $i++;
            if($fees->total_received>200000){
                 $received=$fees->total_received;
            }
        }
            
            
         return $received;
    }

    

    public function getOnlylastReceived($bill_id){
                $fee=fee_bill_received::where([['fee_bill_id',$bill_id],['received_date','>','2018-06-30']])->select('received_amount')->OrderBy('id','desc')->first();
                return @$fee['received_amount'];

    }


    public function getPaymentMethod($bill_id){
		$fee=fee_bill_received::where('fee_bill_id',$bill_id)->select('received_payment_mode')->first();
    	return $fee;
    }

     public function countTotalPayments($student_id,$academic_session_id){
    	$result=fee_bill_received::where([['fee_bill.student_id',$student_id],['fee_bill.academic_session_id',$academic_session_id]])->join('fee_bill','fee_bill_received.fee_bill_id','=','fee_bill.id')->count();
    	return $result;	
    }
     public static function sumTotalPayments($student_id,$academic_session_id){
         $july_fee=fee_bill_received::where(
             [

                ['fb.student_id',$student_id],
                ['fb.bill_cycle_no',5],
                ['received_date','>','2018-06-30'],
                ['received_date','<','2018-12-30'],
             ]
            )
        ->join('fee_bill as fb','fb.id','fee_bill_received.fee_bill_id')
        ->sum('received_amount');
    $result=fee_bill_received::where([['fee_bill.student_id',$student_id],
        ['fee_bill.academic_session_id',$academic_session_id]])
        ->join('fee_bill','fee_bill_received.fee_bill_id','=','fee_bill.id')
        ->sum('received_amount');
    	return ($result+$july_fee);	
    }


}
