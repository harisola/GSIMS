<?php
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
 

 /**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
    


    }