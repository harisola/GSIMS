<?php

namespace App\Models\Accounts;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class fee_bill_model extends Model
{
    
    protected $dbCon = 'mysql_Career_fee_bill';


    
    public function get_academic_sessions() {

      $query = "select * from atif._academic_session as s where s.branch_id=2 order by s.id desc";
      $weeks = DB::connection($this->dbCon)
                ->select($query);
      return $weeks;
    }


    public function Get_Fee_Definition($Session_id)
    {
    	// $query = "select * from atif_fee_student.fee_definition as d where d.academic_session_id in (".$Session_id.")";

    $query = "select 
d.id as Definition_id,
d.academic_session_id as Academic_id,
d.grade_id as Grade_id,
d.tuition_fee as Tuition_fee,
d.resource_fee as Resource_fee,
d.musakhar as Musakhar,
d.lab_avc as Lab_avc,
( d.tuition_fee + d.resource_fee + d.musakhar + d.lab_avc ) as Total, 
d.yearly as Yearly_fee, 

( ( ( d.tuition_fee + d.resource_fee + d.musakhar + d.lab_avc ) * 12 ) + d.yearly ) as Total_year_charges,


sessions.branch_id as Branch_id, 
gen_of.grade_name as Grade_name,
SUBSTRING_INDEX( sessions.name,'_', -1 ) as Session_name,
sessions.name as Academic_name,
sessions.dname as Academic_dname, sessions.start_date as Academic_Start_date,
sessions.end_date as Academic_End_date

 from atif._academic_session as sessions
left join atif_fee_student.fee_definition as d 
on d.academic_session_id = sessions.id


left join ( select distinct ( cl.generation_of ) as g, cl.grade_id, cl.grade_name  from atif.class_list as cl order by cl.generation_of desc ) as gen_of
on gen_of.grade_id = d.grade_id

where sessions.id in (".$Session_id.") order by gen_of.g desc"; 

      $weeks = DB::connection($this->dbCon)
                ->select($query);
      return $weeks;
    }


public function Update_Fee_Definition($query)
	{
	
		return DB::connection($this->dbCon)->update($query);
	}


  public function get($table_name,$where_col,$where_param,$group_by){
    
   $data =  DB::connection($this->dbCon)->table($table_name)
                ->groupBy($group_by)
                ->whereIn($where_col, $where_param)
                ->get();
   return $data;
  }

  /*
  * Name: Insert Or Update
  * Procedure: Add OR Update Query
  */
  public function insertOrUpdate($tablename,$where=null,$whereORINCol=null,$whereORIN = null,$data=null){
    if($whereORIN != null && $whereORIN != ''){
      $exist = DB::connection($this->dbCon)->table($tablename)->orWhereIn($whereORINCol,$whereORIN)->where($where)->get();
    }else{
      $exist = DB::connection($this->dbCon)->table($tablename)->where($where)->get();
    }
  

    return count($exist);  
    
    // if(count($exist)  >0) {
    //     DB::connection($this->dbCon)->table($tablename)->orWhereIn($whereORINCol,$whereORIN)->where($where)->update($data);
    // }
    // else{
    //    DB::connection($this->dbCon)->table($tablename)->insert($data);
    // }
  }

  public function updateProcedure($tablename,$where=null,$whereORINCol=null,$whereORIN = null,$data=null){
    if($whereORIN != null || $whereORIN != ''){
      DB::connection($this->dbCon)->table($tablename)->orWhereIn($whereORINCol,$whereORIN)->where($where)->update($data);
    }else{
      DB::connection($this->dbCon)->table($tablename)->where($where)->update($data);
    }
  }

  public function insertProcedure($table_name,$data){
     $insert = DB::connection($this->dbCon)->table($table_name)->insert($data);
     return $insert;
  }


  public function get_Session(){    
    $query = "select * from atif._academic_session as s";
    $rows_array = DB::connection($this->dbCon)->select($query);
    return $rows_array;

  }


  public function Fun_insert($query)
  {
    return DB::connection($this->dbCon)->insert($query);
  }

  public function get_query($query){    
    $rows_array = DB::connection($this->dbCon)->select($query);
    return $rows_array;

  }


    
}
