<?php
/******************************************************************
* Author: 	
* Email: 	
* Cell: 	
*******************************************************************/


namespace App\Models\Staff\Information;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;

class _region_sub extends Model
{
    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = '_region_sub';
    public $timestamps = false;
    protected $primaryKey = 'id';

    // public function checkStaffRegionRecordExistance($id){
    //     $details=_region_sub::where('id',$id)->first();
    //     return count($details);
    //     //echo $details;
    // }

    // public function updateStaffRegionRecord($id,$data){
    //     $record=_region_sub::where('id',$id)->update($data);
    //     //echo $data;

    // }

    public function get_sub_region($staff_id){

        $result = _region_sub::select('atif._region_sub.id as region_sub_id','atif._region_sub.region_id as region_id ', 'atif._region_sub.name as region_sub_name')
        ->join('atif.staff_contact_info as staff_info','atif._region_sub.region_id','=','staff_info.region')
        // ->join('_region_sub as rs','staff_info.region','=','rs.region_id')
        ->groupby('region_sub_id')
        ->get();
        return $result;
    }
   

}
