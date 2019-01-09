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

class staff_registered extends Model
{

    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = 'staff_registered';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function checkStaffRegRecordExistance($staff_id){
      
        $details=staff_registered::where('id',$staff_id)->get();
        return count($details);
        //echo $details;
    }

    public function updateStaffRegRecord($staff_id,$data){
        $record=staff_registered::where('id',$staff_id)->update($data);
        //echo $data;

    }
   

}
