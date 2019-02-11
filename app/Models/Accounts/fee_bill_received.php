<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

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
             ]
            )
        ->join('fee_bill as fb','fb.id','fee_bill_received.fee_bill_id')
        ->sum('received_amount');

        return $july_fee;
    }

    public function getLastReceivedAmount($bill_id){
        $received="";
        $fee=fee_bill_received::where([['fee_bill_id',$bill_id],['received_date','>','2018-06-30']])->select('received_amount')->Orderby('id','desc')->get();
        foreach ($fee as $fees) {
            if($fees->received_amount>200000){
                $received=$fees->received_amount;
            }
        }
        return  $received;
    }


    public function getPaymentMethod($bill_id){
		$fee=fee_bill_received::where('fee_bill_id',$bill_id)->select('received_payment_mode')->first();
    	return $fee;
    }

     public function countTotalPayments($student_id,$academic_session_id){
    	$result=fee_bill_received::where([['fee_bill.student_id',$student_id],['fee_bill.academic_session_id',$academic_session_id]])->join('fee_bill','fee_bill_received.fee_bill_id','=','fee_bill.id')->count();
    	return $result;	
    }
     public function sumTotalPayments($student_id,$academic_session_id){
        $july_fee=fee_bill_received::where(
             [

                ['fb.student_id',$student_id],
                ['fb.bill_cycle_no',5],
                ['received_date','>','2018-06-30'],
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
