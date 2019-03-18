<?php
/******************************************************************
* Author: 	
* Email: 	
* Cell: 	
*******************************************************************/


namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;

class career_form_data extends Model
{

    protected $connection = 'atif_career';
    protected $dbCon = 'mysql_Career';
    protected $table = 'career_form_data';
    public $timestamps = false;
    protected $primaryKey = 'id';


    public function updateFormdata($where,$data){
        $record=career_form_data::where($where)->update($data);
        //echo $data;
        return $record;

    }

        //zk
    // public function updateFormdata($table_name,$where,$data){
    //      $update_data =  DB::connection($this->dbCon)
    //                      ->table($table_name)
    //                      ->where($where)
    //                      ->update($data);
    //     return $update_data;
    // }

   

}
