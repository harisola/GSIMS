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
class VehicleReportModel extends Model
{
    public $timestamps = true;
    protected $primaryKey = '';
    protected $dbCon = '';

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


}