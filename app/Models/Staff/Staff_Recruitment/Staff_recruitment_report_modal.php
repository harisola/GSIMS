<?php
namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class Staff_recruitment_report_modal extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_form_data';
    protected $dbCon = 'mysql_Career';


 /**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
  

	


	public function filter_report_data_online_screening($date_1,$date_2){

		$query = "select COUNT(a.created) as online_screening_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') between '".$date_1."' and '".$date_2."' and a.status_id ='13'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
			}
			

			public function filter_report_data_call_for_part_b($date_1,$date_2){

					$query = "select COUNT(a.created) as call_for_part_b_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') between '".$date_1."' and '".$date_2."' and a.status_id ='11'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
			}


			public function filter_report_data_full_screening($date_1,$date_2){

					$query = "select COUNT(a.created) as full_screening_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') between '".$date_1."' and '".$date_2."' and a.status_id ='1'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
			}



			public function filter_report_data_call_b_followup($date_1,$date_2){

					$query = "select COUNT(a.created) as follow_up_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') between '".$date_1."' and '".$date_2."' and a.status_id ='11' and a.stage_id ='5'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
			}


			public function all_departments(){

				$query = "select * from career_dept";

					 $depart = DB::connection($this->dbCon)->select($query);
					
					return $depart;



			}

			public function all_designations(){

				$query = "select * from career_level";

					 $level = DB::connection($this->dbCon)->select($query);
					
					return $level;

			}


			public function all_subjects(){

				$query = "select * from career_tag";

					 $subjects = DB::connection($this->dbCon)->select($query);
					
					return $subjects;



			}



			public function filter_report_data_hr_recruitments($departs){

				$query = "select * from career_dept where id ='".$departs."'";
				//$query = "SELECT * FROM career_dept WHERE id IN ('".$depart."')";
				 $subjects = DB::connection($this->dbCon)->select($query);
					
					 return $subjects;

			}


			
		


}