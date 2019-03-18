<?php
/******************************************************************
* Author: 	Zia Khan
* Email: 	ziaisss@gmail.com
* Cell: 	+92-342-2775588
*******************************************************************/


namespace App\Models\Staff\Staff_Attendance;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;

class staff_attendance_out extends Model
{

    protected $connection = 'mysql_AttendanceStaff';
    protected $dbCon = 'mysql';
    protected $table = 'staff_attendance_out';
    public $timestamps = false;
    protected $primaryKey = 'id';

    // public function check_staff_attendance_out($staff_id,$date,$location_id){
      
    //     $details=staff_attendance_out::where([['staff_id',$staff_id],['date',$date],['location_id',$location_id]])->get();
    //     return count($details);
    //     //echo $details;
    // }

    public function check_staff_attendance_out($staff_id,$date){
      
        $details=staff_attendance_out::where([['staff_id',$staff_id],['date',$date]])->get();
        return count($details);
        //echo $details;
    }

    public function updateStaffRegRecord($staff_id,$data){
        $record=staff_attendance_out::where('id',$staff_id)->update($data);
        //echo $data;

    }

    public function insert($table_name,$data){
        $id = DB::connection($this->dbCon)->table($table_name)->insertGetId($data);
        return $id;
    }
   

}
