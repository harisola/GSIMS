<?php
namespace App\Models\User_logs;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class users extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $dbCon = 'mysql';


 /**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
    public function get_user_details($email){

        $query = "select * from atif_gs_sims.users as a where a.email like  '$email%' ";
       
        $user = DB::connection($this->dbCon)->select($query);
        return $user;
	   
	  }



    }