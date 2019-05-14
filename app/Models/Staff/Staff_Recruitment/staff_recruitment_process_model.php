<?php
namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class Staff_recruitment_process_model extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_form';
    protected $dbCon = 'mysql_Career';


	public function Create_query($query)
	{
    	$career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
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

	
}		