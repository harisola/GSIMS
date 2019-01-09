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

class staff_registered_father_spouse extends Model
{

    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = 'staff_registered_father_spouse';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function checkStaffFatherSpouseRegRecordExistance($staff_id,$spouseType){
        $details=staff_registered_father_spouse::where([['staff_id',$staff_id],['spouseType',$spouseType]])->first();
        return count($details);
        //echo $details;
    }

    public function updateStaffFatherSpouseRegRecord($staff_id,$spouseType,$data){
        $record=staff_registered_father_spouse::where([['staff_id',$staff_id],['spouseType',$spouseType]])->update($data);
        //echo $data;

    }
   

}
