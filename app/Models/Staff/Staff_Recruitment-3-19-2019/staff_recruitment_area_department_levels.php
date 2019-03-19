<?php
namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class staff_recruitment_area_department_levels extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_area';
    protected $dbCon = 'mysql_Career';


 /**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
  

	


	public function get_area(){

		$query = "select * from career_area";

		 $career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
			}

		public function get_area_by_id($id){

		$query = "select * from career_area where id = ".$id."";

		$career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
			}



	public function get_all_dept($id){

		//$query = "select cd.id,cd.departments,cd.area_id from career_dept as cd where cd.area_id = ".$id."";
		$query = "select * from career_dept where area_id = ".$id."";
		 $career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;



	}
			


	public function all_level($id){

		//$query = "select * from career_level where area_id = ".$id."";
		$query = "select * from career_level where area_id = ".$id."";
		 $career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
			}




}