<?php

namespace App\Models\Accounts;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class arrear_adjustment_model extends Model
{
    
    protected $dbCon = 'mysql_Career_fee_bill';
    //protected $table = 'arriers_adjustments';

    /*
     * To get all the record
     *
    */

    public function get_record($table_name,$where=null){

      if($where != null && $where != ''){
        $data =  DB::connection($this->dbCon)->table($table_name)->where($where)->get();
      }else{
        $data =  DB::connection($this->dbCon)->table($table_name)->get();
      }
      return $data;
    }

    /*
     * to update the record
     *
    */

    public function udpate_data($table_name,$where,$data){
      $updated_id = DB::connection($this->dbCon)->table($table_name)->where($where)->update($data);
      return $updated_id;
    }

    /*
     * Insert  the record
     *
    */
    public function insertProcedure($table_name,$data){
      $insert = DB::connection($this->dbCon)->table($table_name)->insert($data);
      return $insert;
    }

    /*
    * Get Arrear And Adjustment All Data
    *
    */

    public function get_arrear_adjustment_join($id = null){

      $query = "SELECT arad.id,cl.gs_id, CONCAT(cl.grade_dname,'-',cl.section_dname) AS grade_name,cl.abridged_name,cl.std_status_code,arad.adjustment_amount,arad.description,
        sr.name_code,DATE_FORMAT(arad.created_at, '%a %b %d %Y') as created_date,gfid,cl.gr_no,cl.std_status_category,cl.id as student_id
        FROM atif_fee_student.arriers_adjustments arad
        LEFT JOIN atif.class_list cl ON 
        arad.student_id = cl.id
        LEFT JOIN atif.staff_registered sr ON 
        (sr.user_id = arad.modified_by AND arad.modified_by <> 0)
        WHERE arad.modified_by <> 0 and arad.`status` = 0";
      if($id != null){
        $query .= " and arad.id = $id";
      }
      $result = DB::connection($this->dbCon)->select($query);
      return $result;

    }
    
}
