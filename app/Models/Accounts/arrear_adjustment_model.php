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

      $query = "SELECT arad.id,cl.gs_id, CONCAT(cl.grade_dname,'-',cl.section_dname) AS grade_name,cl.abridged_name,cl.std_status_code,arad.amount,arad.description,
        sr.name_code,FROM_UNIXTIME(arad.register,'%a %b %d %Y') as created_date,gfid,cl.gr_no,cl.std_status_category,cl.id as student_id,arad.is_arrears as arrears,arad.installement_id as installment_no
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
      $total_adjustments=arrear_adjustment_model::where([['student_id',$student_id],['installement_id',$intallment_id]])
      ->sum('amount');
      return $total_adjustments;
    }

    // public function get_arrear_adjustment_join($id = null,$arrear_flag = null){

    //   $query = '';

    //   if($id != null){
    //     $query .= "SELECT * FROM (";
    //   }

    //   $query .= "SELECT arad.id,cl.gs_id, CONCAT(cl.grade_dname,'-',cl.section_dname) AS grade_name,cl.abridged_name,cl.std_status_code,arad.adjustment_amount,arad.description,
    //     sr.name_code,DATE_FORMAT(arad.created_at, '%a %b %d %Y') as created_date,gfid,cl.gr_no,cl.std_status_category,cl.id as student_id,'1' as arrears
    //     FROM atif_fee_student.arriers_adjustments arad
    //     LEFT JOIN atif.class_list cl ON 
    //     arad.student_id = cl.id
    //     LEFT JOIN atif.staff_registered sr ON 
    //     (sr.user_id = arad.modified_by AND arad.modified_by <> 0)
    //     WHERE arad.modified_by <> 0
        
    //     UNION 

    //   SELECT ad.id,cl.gs_id, CONCAT(cl.grade_dname,'-',cl.section_dname) AS grade_name,cl.abridged_name,cl.std_status_code,ad.amount as 'adjustment_amount',ad.description,
    //     sr.name_code,DATE_FORMAT(ad.created_at, '%a %b %d %Y') as created_date,gfid,cl.gr_no,cl.std_status_category,cl.id as student_id,'0' as arrears
    //     FROM atif_fee_student.adjustments ad
    //     LEFT JOIN atif.class_list cl ON 
    //     ad.student_id = cl.id
    //     LEFT JOIN atif.staff_registered sr ON 
    //     (sr.user_id = ad.modified_by AND ad.modified_by <> 0)
    //     WHERE ad.modified_by <> 0";

    //   if($id != null){
    //     $query .= ") as arrear where arrear.id = $id and  arrear.arrears = $arrear_flag";
    //   }
    //   $result = DB::connection($this->dbCon)->select($query);
    //   return $result;
    // }
    
}
