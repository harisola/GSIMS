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

class Hr_Configuration_modal extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'hr_months';
    protected $dbCon = 'mysql';



   public function updateAll($cut_off_date, $get_id){
	  $query = "update atif_gs_sims.hr_setting set " . 
			"cut_off_date = " . $cut_off_date . ", " .
			//"freeze_after = " . $freeze_after . ", " .
			"modified = " . Carbon::now()->timestamp . ", " .
			"modified_by = " . Sentinel::getUser()->id." ".
			"where id =".$get_id 
			;
			
		DB::connection($this->mysql_gsEvents)->update($query);
	}


   public function updateAllfrez($freeze_after, $get_id){
	  $query = "update atif_gs_sims.hr_setting set " . 
			"freeze_after = " . $freeze_after . ", " .
			"modified = " . Carbon::now()->timestamp . ", " .
			"modified_by = " . Sentinel::getUser()->id." ".
			"where id =".$get_id 
			;
			
		DB::connection($this->mysql_gsEvents)->update($query);
	}


	public function cut_off_date_data(){

		$query = "select * from atif_gs_sims.hr_cutt_off_date";
		return DB::connection($this->mysql_gsEvents)->select($query);


	}

	public function freeze_after(){

		$query = "select * from atif_gs_sims.hr_freeze_after";
		return DB::connection($this->mysql_gsEvents)->select($query);


	}
	


	public function getAll(){
		$query = "select * from atif_gs_sims.hr_months";
		return DB::connection($this->mysql_gsEvents)->select($query);
	}


		public function get_months_hr(){

		$query = "select hr.id as monthid,hr_mon.months as hr_month,hr.cut_off_date as hr_cut_off,hr.freeze_after as hr_freeze_day 
			from atif_gs_sims.hr_setting as hr
			left join atif_gs_sims.hr_months as hr_mon on hr_mon.id = hr.month_id";
		return DB::connection($this->mysql_gsEvents)->select($query);


	}

	
}
