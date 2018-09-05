<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class tax_amount extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'tax_amount';
    
    public function getTaxPercentage($academic_session_id){
            $result=tax_amount::where('academic_session_id',$academic_session_id)->select('tax_amount','tax_percentage')->first();
            return $result;
    }



}
