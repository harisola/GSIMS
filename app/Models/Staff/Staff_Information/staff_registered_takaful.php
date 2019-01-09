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

class staff_registered_takaful extends Model
{

    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = 'staff_registered_takaful';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function checkStafftakafulRegRecordExistance($staff_id){
        $details=staff_registered_takaful::where('staff_id',$staff_id)->first();
        return count($details);
        //echo $details;
    }

    public function updateStafftakafulRegRecord($staff_id,$data){
        $record=staff_registered_takaful::where('staff_id',$staff_id)->update($data);
        //echo $data;

    }
   

}
