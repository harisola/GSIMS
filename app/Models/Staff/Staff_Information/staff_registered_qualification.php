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

class staff_registered_qualification extends Model
{
    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = 'staff_registered_qualification';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function checkRecordExistance($staff_id,$title){
        $details=staff_registered_qualification::where([['staff_id',$staff_id],['title',$title]])->first();
        
        return count($details);
        //echo $details;
    }

    public function updateRecord($staff_id,$title,$data){
        $record=staff_registered_qualification::where([['staff_id',$staff_id],['title',$title]])->update($data);
        //echo $data;
    }

    // public function deleteRecord($staff_id,$title,$data){
    //     $record=staff_registered_qualification::where([['staff_id',$staff_id],['title',$title]])->delete($data);
    //     //echo $data;
    // }
   
   

}
