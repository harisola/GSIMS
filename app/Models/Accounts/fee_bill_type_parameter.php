<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class fee_bill_type_parameter extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table='fee_bill_type_parameter';

    public function getBillParameters($bill_type_id){
    	$paramters=fee_bill_type_parameter::where('id',$bill_type_id)->first();
    	return $paramters;
    }

}
