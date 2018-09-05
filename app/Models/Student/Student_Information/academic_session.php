<?php

namespace App\Models\student\Student_Information;

use Illuminate\Database\Eloquent\Model;

class academic_session extends Model
{
	protected $connection='default_Atif';
    protected $table='_academic_session';

    public function GetAcademicSession($branch_id){
    	$academic_session=academic_session::where([['branch_id',$branch_id],['is_active',1]])->first();
    	return $academic_session;
    }

}
