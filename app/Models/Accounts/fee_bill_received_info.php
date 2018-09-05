<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class fee_bill_received_info extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'fee_bill_received_info';
    public $timestamps = false;

    public function getReceivedTaxes($bill_id){
    	$fee=fee_bill_received_info::where('fee_bill_id',$bill_id)->sum('received_adv_tax');
    	return $fee;
    }

}
