<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class rip_student extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'rip_students';
    
    public function checkExistance($gs_id){
    	// die;
            $total_adjustments=rip_student::where('rgs_id',$gs_id)
            ->first();
            if(empty($total_adjustments['rgs_id'])){
            	 $found=0;
            }else{
           	 	$found=1;
            }
            return $found;
    }





}
