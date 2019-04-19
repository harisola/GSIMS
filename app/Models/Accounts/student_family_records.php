<?php

namespace App\Models\Accounts;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class student_family_records extends Model
{
	   protected $connection = 'default_Atif';

    protected $dbCon = 'mysql';
    protected $table = 'student_family_record';

     public static function getFamilyData($gf_id){
                   $data=student_family_records::select('name')->where([['gf_id',$gf_id]])->first();
                      return $data;
    }



}
