<?php

namespace App\Models\Accounts;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class students_all extends Model
{
	   protected $connection = 'default_Atif';

    protected $dbCon = 'mysql';
    protected $table = 'students_all';

     public static function getTaxnicData($student_id){
                   $parent_data=students_all::where('student_id',$student_id)->first();
                      return $parent_data;
    }



}
