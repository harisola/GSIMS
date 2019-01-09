<?php
/******************************************************************
* Author: 	
* Email: 	
* Cell: 	
*******************************************************************/


namespace App\Models\Staff\Staff_Information;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;

class staff_registered_alternativecontact extends Model
{

    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = 'staff_registered_alternativecontact';
    public $timestamps = false;
    protected $primaryKey = 'ID';

    public function checkStaffAlternativeContactRegRecordExistance($staff_id,$type){
        $details=staff_registered_alternativecontact::where([['staff_id',$staff_id],['type',$type]])->first();
        return count($details);
        //echo $details;
    }

    public function updateStaffAlternativeContactRegRecord($staff_id,$type,$data){
        $record=staff_registered_alternativecontact::where([['staff_id',$staff_id],['type',$type]])->update($data);
        //echo $data;

    }
   

}
