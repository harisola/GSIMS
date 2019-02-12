<?php
/******************************************************************
* Author:   Zia Khan
* Email:    ziaisss@gmail.com
* Cell:     +92-342-2775588
*******************************************************************/
namespace App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
class vehicle_attendance_in extends Model
{

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $dbCon = 'mysql';
    protected $table = 'vehicle_attendance_in';

    public function insertRecord($tablename,$data){
        $result = DB::connection($this->dbCon)->table($tablename)->insertGetId($data);
        if($result > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function update_data($table_name,$where,$data){
        $update_data =  DB::table($table_name)->where($where)->update($data);
        return $update_data;
    }


    public function get_query($query){
        $viewdata =  DB::connection($this->db)->select($query);
        return $viewdata;
    }
    
    public static function getVechileInTimeByIdAndDate($vechile_id,$date){
        $data=vehicle_attendance_in::select('time')->where([['si.vehicle_id',$vehicle_id],['si.date',$date]])->get();
        return $data;

    }


}