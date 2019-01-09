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

class _region extends Model
{
    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = '_region';
    public $timestamps = false;
    protected $primaryKey = 'id';

    // public function checkStaffRegionRecordExistance($id){
    //     $details=_region::where('id',$id)->first();
    //     return count($details);
    //     //echo $details;
    // }

    // public function updateStaffRegionRecord($id,$data){
    //     $record=_region::where('id',$id)->update($data);
    //     //echo $data;

    // }


    public function get_region($staff_id){

        $result = _region::select('atif._region.id as region_id', 'atif._region.name as region_name')
        ->join('atif.staff_contact_info as staff_info','atif._region.id','=','staff_info.region')
        ->join('_region_sub as rs','atif._region.id','=','rs.region_id')
        ->groupby('region_id')
        ->get();

        return $result;
    }

    // public function get_sub_region($staff_id,$region_id){

    //     $result = _region::select('atif._region_sub.id as region_sub_id', 'atif._region_sub.name as region_name')
    //     ->join('atif.staff_contact_info as staff_info','atif._region_sub.id','=','staff_info.region')
    //     ->join('_region_sub as rs','atif._region.id','=','rs.region_id')
    //     ->groupby('region_id')
    //     ->get();

    //     return $result;

    // }
   

}
