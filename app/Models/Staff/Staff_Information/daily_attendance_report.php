<?php
/******************************************************************
* Author: 	Atif Naseem
* Email: 	atif.naseem22@gmail.com
* Cell: 	+92-313-5521122
*******************************************************************/


namespace App\Models\Staff\Staff_Information;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class daily_attendance_report extends Model
{

    protected $connection = 'mysql_gsEvents';
    protected $table = 'daily_attendance_report';
    public $timestamps = false;
    protected $primaryKey = 'id';




    
    public function updateExceptionalLeave($staff_id,$data){
    	$Carbon = new Carbon;
	 	$yesterdayDate=explode(' ', $Carbon->now()->subDays(1))[0];
	 	$myData = daily_attendance_report::where('staff_id',$staff_id)
		->OrderBy('id','desc')->take(2)->get();
		$id=$myData[1]->id;
		$data = daily_attendance_report::where('id',$id)->update($data);
		return $data;
	}

	




	




















}