<?php
/**********************************************************************
* Author Zk,Af
* 
* @output: 	users logging
***********************************************************************/
namespace App\Models\User_logs;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class users_logs extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'users_logs';
    protected $dbCon = 'mysql';


	public function test_logs($user_id){

		$details = users::where('id',$user_id)->get();
		return $details;


	}

	public function getlastinsertid(){
		
		$qury = "select ul.id,ul.user_id,REPLACE(ul.url, 'log_user', ' ') as url 
		from atif_gs_sims.users_logs as ul
		order by ul.id desc  limit 1
		";

		$query = DB::connection($this->dbCon)->select($qury);
		return $query;
		// dd($id);
	}

}