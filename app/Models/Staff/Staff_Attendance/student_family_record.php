<?php
/******************************************************************
* Author: 	Zia Khan
* Email: 	ziaisss@gmail.com
* Cell: 	+92-342-2775588
*******************************************************************/


namespace App\Models\Staff\Staff_Attendance;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;

class student_family_record extends Model
{

    protected $connection = 'default_Atif';
    protected $dbCon = 'default_Atif';
    protected $table = 'student_registered';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public static function getFamilyData($gf_id){
                   $data=student_family_record::where([['gf_id',$gf_id]])->first();
                      return $data;
    }



}
