<?php

namespace App\Models\Accounts;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class arrear_adjustment_model extends Model
{
    
  protected $dbCon = 'mysql_Career_fee_bill';
  protected $connection = 'mysql_Career_fee_bill';
  protected $table = 'arriers_and_adjustment_manual';

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

      $query = "SELECT arad.id,cl.gs_id, CONCAT(cl.grade_dname,'-',cl.section_dname) AS grade_name,cl.abridged_name,cl.std_status_code,arad.amount,ifnull(arad.description,'') as description,
        sr.name_code,FROM_UNIXTIME(arad.register,'%a %b %d %Y') as created_date,gfid,cl.gr_no,cl.std_status_category,cl.id as student_id,arad.is_arrears as arrears,arad.installment_id as installment_no
        FROM atif_fee_student.arriers_and_adjustment_manual arad
        LEFT JOIN atif.class_list cl ON 
        arad.student_id = cl.id
        LEFT JOIN atif.staff_registered sr ON 
        (sr.user_id = arad.register_by OR sr.user_id = arad.modified_by)";
      if($id != null){
        $query .= " where arad.id = $id";
      }

      $result = DB::connection($this->dbCon)->select($query);
      return $result;

    }

    public function get_custom_pending_amount_id($student_id,$intallment_id){
      $total_adjustments=arrear_adjustment_model::where([['student_id',$student_id],['installment_id',$intallment_id]])
      ->sum('amount');
      return $total_adjustments;
    }

  
    
}
