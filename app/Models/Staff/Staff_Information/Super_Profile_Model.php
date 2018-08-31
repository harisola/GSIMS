<?php
namespace App\Models\Staff\Staff_Information;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Super_Profile_Model extends Model{

    protected $dbCon = 'mysql';

   	/******************************************************************
	* Author: 	Rohail Aslam
	* Email: 	r.aslam@generations.edu.pk
	* Method: getProfileDetail()
	* Description : Get Profile Detail along time
	*******************************************************************/

    public function getProfileDetail(){

    	$query = "select tt.id,tt.profile_type_id,tt.name,IF(tt_time.is_on_mon = 1,tt_time.mon_in,'') as mon_in,
			IF(tt_time.is_on_mon = 1,tt_time.mon_out,'') as mon_out 
			from atif_gs_events.tt_profile tt

			left join atif_gs_events.tt_profile_time tt_time on 

			tt_time.profile_id = tt.id 

			 order by tt.created";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;

    }

    /******************************************************************
	* Author: 	Rohail Aslam
	* Email: 	r.aslam@generations.edu.pk
	* Method: get
	* Description : Selecting data from table
	*******************************************************************/

    public function get($table_name,$where){
    	
    	if($where == ''){
    		$get = DB::connection($this->dbCon)->table($table_name)->get();

    	}else{
    		$get = DB::connection($this->dbCon)->table($table_name)->where($where)->get();

    	}

    	return $get;
    }

    public function insertData($table_name,$data){
    	$id = DB::connection($this->dbCon)->table($table_name)->insertGetId($data);
    	return $id;
    }

    public function update_data($table_name,$where,$data){
        $update_data =  DB::table($table_name)->where($where)->update($data);
        return $update_data;
    }


    public function getSuperProfile(){

        $query = "Select * from atif_gs_events.super_profile_time order by super_profile_id,profile_id";
        $result = DB::connection($this->dbCon)->select($query);
        return $result;

    }

    public function updateWeeklyTimeSheet($from_date,$to_date){

        $query = "CALL atif_gs_events.`sp_generate_time_sheet`('".$from_date."','".$to_date."')";
        $result = DB::connection($this->dbCon)->select($query);
        return $result;

    }


    public function insertSuperProfile($table_name,$data){
        $id = DB::connection($this->dbCon)->table($table_name)->insertGetId($data);
        return $id;
    }
}