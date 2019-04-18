<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class fee_bill_setup extends Model
{
    protected $connection = 'mysql_Career_fee_bill';

    public static function getInstallmentNumberOfMonths(){
        $data=fee_bill_setup::select('installment_number_of_months')->first();
        return $data['installment_number_of_months'];
    }

}
