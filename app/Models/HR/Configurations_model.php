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
}
