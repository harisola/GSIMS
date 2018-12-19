<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;
use DateInterval;

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
    
    public static function getCurrentInstallmentNumber(){
        $data=billing_cycle_definition::select('bill_cycle_no','adjustment_freeze_date')
        ->orderBy('id','desc')->first();
        if($data['adjustment_freeze_date']>date('Y-m-d')){
            $installment_number=$data['bill_cycle_no'];
        }else{
            $installment_number=$data['bill_cycle_no'];
        }
        if($installment_number==6){
            $installment_number=1;
        }
        return $installment_number;
    }

    public static function freezeBlocks(){
        $data=billing_cycle_definition::select('bill_cycle_no','adjustment_freeze_date','adjustment_unfreeze_date')
        ->orderBy('id','desc')->first();
        $current_date=date('Y-m-d');
        $freeze_date_start=$data['adjustment_freeze_date'];
        $unfreeze_date=$data['adjustment_unfreeze_date'];
        $get_bill_cycle_no=$data['bill_cycle_no'];
        $oneweekfromnow = strtotime("+1 week", strtotime($freeze_date_start));
        $freeze_date_end = (date('Y-m-d',strtotime("+7 days",$oneweekfromnow)));
            if($current_date > $freeze_date_start && $current_date < $unfreeze_date){
                return 'Yes';
            }else{
                return 'No';
            }
    }

    // public static function freezeBlocks(){
    //  $data=billing_cycle_definition::select('bill_cycle_no','adjustment_freeze_date')
    //  ->orderBy('id','desc')->first();
    //  $current_date=date('Y-m-d');
    //  $freeze_date_start=$data['adjustment_freeze_date'];
    //  $get_bill_cycle_no=$data['bill_cycle_no'];
    //  $oneweekfromnow = strtotime("+1 week", strtotime($freeze_date_start));
    //  $freeze_date_end = (date('Y-m-d',strtotime("+7 days",$oneweekfromnow)));
    //      if($current_date > $freeze_date_start && $current_date < $freeze_date_end){
    //          return 'Yes';
    //      }else{
    //          return 'No';
    //      }
    // }

    // public static function freezeBlocks($bill_cycle){
    //  $data=billing_cycle_definition::select('bill_cycle_no','adjustment_freeze_date')
    //  ->orderBy('id','desc')->first();
    //  $current_date=date('Y-m-d');
    //  $freeze_date_start=$data['adjustment_freeze_date'];
    //  $get_bill_cycle_no=$data['bill_cycle_no'];
    //  $oneweekfromnow = strtotime("+1 week", strtotime($freeze_date_start));
    //  $freeze_date_end = (date('Y-m-d',strtotime("+7 days",$oneweekfromnow)));
    //  if($get_bill_cycle_no==$bill_cycle){
    //      if($current_date > $freeze_date_start && $current_date < $freeze_date_end){

    //          return 'Yes';
    //      }else{
    //          return 'No';
    //      }
    //  }else{
    //      return 'No';
    //  }
        
    // }
}
