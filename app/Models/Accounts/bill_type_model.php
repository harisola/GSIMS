<?php

namespace App\Models\Accounts;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class bill_type_model extends Model
{
    
    protected $dbCon = 'mysql_Career_fee_bill';
    protected $table = 'fee_bill_type_parameter';

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
    
}
