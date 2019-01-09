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

class staff_registered_employement extends Model
{
    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = 'staff_registered_employement';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function checkRecordEmployExistance($staff_id,$org){
        $details=staff_registered_employement::where([['staff_id',$staff_id],['organization',$org]])->first();
        
        return count($details);
        //echo $details;
    }

    public function updateEmployRecord($staff_id,$org,$data){
        $record=staff_registered_employement::where([['staff_id',$staff_id],['organization',$org]])->update($data);
        //echo $data;
    }
   
   

}
