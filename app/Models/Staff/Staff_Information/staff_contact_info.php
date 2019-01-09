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

class staff_contact_info extends Model
{
    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = 'staff_contact_info';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function checkStaffContactInfoRecordExistance($staff_id){
        $details=staff_contact_info::where('staff_id',$staff_id)->first();
        return count($details);
        //echo $details;
    }

    public function updateStaffContactInfoRecord($staff_id,$data){
        $record=staff_contact_info::where('staff_id',$staff_id)->update($data);
        //echo $data;

    }
   

}
