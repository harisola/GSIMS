<?php
/******************************************************************
* Author: 	Atif Naseem
* Email: 	atif.naseem22@gmail.com
* Cell: 	+92-313-5521122
*******************************************************************/
namespace App\Models\HR;


use Sentinel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Configurations_model extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'cutoff_date_hr_attendance';
    protected $dbCon = 'mysql';



    public function updateAll($dayFrom, $dayTo, $dayBuffer){
		$query = "update atif_gs_events.cutoff_date_hr_attendance set " . 
			"lock_day_start = " . $dayFrom . ", " .
			"lock_day_end = " . $dayTo . ", " .
			"lock_day_buffer = " . $dayBuffer . ", " .
			"modified = " . Carbon::now()->timestamp . ", " .
			"modified_by = " . Sentinel::getUser()->id;
		DB::connection($this->mysql_gsEvents)->update($query);
	}



	public function getAll(){
		$query = "select * from atif_gs_events.cutoff_date_hr_attendance";
		return DB::connection($this->mysql_gsEvents)->select($query);
	}

	public function getStaffHrLeave(){
		$query = "SELECT * FROM atif_gs_events.tmp_el_balance";
		return DB::connection($this->mysql_gsEvents)->select($query);
	}

	public function getStaffID($gt_id){
		$query = "SELECT * FROM atif.staff_registered where gt_id = '".$gt_id."'";
		return DB::connection($this->mysql_gsEvents)->select($query);
	}

	public function get_update($where,$data){
		// $query = "Update atif_gs_events.daily_attendance_report set leave_balance = $el_balance , remaining_leave = $el_balance where staff_id = $staff_id and date = $yesterday_date";
		// return DB::connection($this->mysql_gsEvents)->select($query);
		$staff = DB::connection($this->mysql_gsEvents)
		    		->table("atif_gs_events.daily_attendance_report")
		    		->where($where)
		    		->update($data);
 			return $staff;
	}
}
