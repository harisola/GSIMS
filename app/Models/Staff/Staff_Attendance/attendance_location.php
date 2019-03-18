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

class attendance_location extends Model
{

    protected $connection = 'mysql_Attendance';
    protected $dbCon = 'mysql';
    protected $table = 'attendance_location';
    public $timestamps = false;
    protected $primaryKey = 'id';



    public function get_location_List(){

        $query = "select al.id,al.name,al.description from atif_attendance.attendance_location as al";
        $location = DB::connection($this->dbCon)->select($query);        
        return $location;
    }


}
