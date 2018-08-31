<?php
/******************************************************************
* Author: 	Atif Naseem
* Email: 	atif.naseem22@gmail.com
* Cell: 	+92-313-5521122
*******************************************************************/


namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class Staff_recruitment_model extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_form';
    protected $dbCon = 'mysql_Career';




    /**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
    public function get_recruitment_data(){
	    $query = "select
			c.id as career_id, c.gc_id, c.name, c.email, c.mobile_phone, c.land_line,
			c.nic, c.gender, c.position_applied, c.comments,
			c.status_id, c.stage_id,
			cs.name as status_name, cs.name_code as status_code,
			ct.name as stage_name, ct.name_code as stage_code, from_unixtime(c.created) as created, c.form_source


			from atif_career.career_form as c
			left join atif_career.career_status as cs
				on cs.id = c.status_id
			left join atif_career.career_stage as ct
				on ct.id = c.stage_id

			order by c.created desc";

	    $career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
	}






	/**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
    public function insertCareerForm($Name, $NIC, $MobilePhone, $LandLine, $Gender, $PositionApplied, $Comments){

    	$gcid = date('y') . '-' . str_pad(date('m'), 2, '0', STR_PAD_LEFT) . '/' ;
    	$gcquery = "select count(*) as num from atif_career.career where gc_id like '$gcid%'";
    	$career = DB::connection($this->dbCon)->select($gcquery);
    	$gcid = $gcid . str_pad(($career[0]->num+1), 4, '0', STR_PAD_LEFT);

    	$name = $Name;
    	$email = "";
    	$mobile_phone = $MobilePhone;
    	$land_line = $LandLine;
    	$nic = $NIC;
    	$gender = $Gender;
    	$position_applied = $PositionApplied;
    	$comments = "";
    	$status_id = 1;
    	$stage_id = 1;
    	$created = Carbon::now()->timestamp;
    	$register_by = Sentinel::getUser()->id;
    	$modified = $created;
    	$modified_by = $register_by;

    	$position_applied = implode(",",$position_applied);

    	/*
    	$dataset = array(
    		'gc_id' => $gcid,
    		'name' => $name,
    		'email' => $email,
    		'mobile_phone' => $mobile_phone,
    		'land_line' => $land_line,
    		'nic' => $nic,
    		'gender' => $gender,
    		'position_applied' => $position_applied,
    		'comments' => $comments,
    		'status_id' => $status_id,
    		'stage_id' => $stage_id,
    		'created' => $created,
    		'register_by' => $register_by,
    		'modified' => $modified,
    		'modified_by' => $modified_by
    	);
    	*/
    	$id = DB::connection($this->dbCon)
	    		->insert("INSERT INTO atif_career.career
	    			(gc_id, name, mobile_phone, landline, nic, gender, position_applied,created, register_by, modified, modified_by)
	    			values
	    			('$gcid', '$name', '$mobile_phone', '$land_line', '$nic', '$gender', '$position_applied', $created, $register_by, $modified, $modified_by)");
    	$id = DB::connection($this->dbCon)
	    		->insert("INSERT INTO atif_career.career_form
	    			(gc_id, name, email, mobile_phone, land_line, nic, gender, position_applied, comments,
	    			status_id, stage_id, created, register_by, modified, modified_by)
	    			values
	    			('$gcid', '$name', '$email', '$mobile_phone', '$land_line', '$nic', '$gender', '$position_applied', '$comments', $status_id, $stage_id, $created, $register_by, $modified, $modified_by)");



	    return $gcid;
	}

	public function NIC_exists($NIC){
	    $query = "select
			c.id as career_id, c.gc_id, c.name, c.email, c.mobile_phone, c.land_line,
			c.nic, c.gender, c.position_applied, c.comments,
			c.status_id, c.stage_id,
			cs.name as status_name, cs.name_code as status_code,
			ct.name as stage_name, ct.name_code as stage_code


			from atif_career.career_form as c
			left join atif_career.career_status as cs
				on cs.id = c.status_id
			left join atif_career.career_stage as ct
				on ct.id = c.stage_id

			where c.nic = '$NIC'";

	    $career = DB::connection($this->dbCon)->select($query);
	    if(!empty($career)){
	    	return true;
	    }else{
	    	return false;
	    }
	}
	public function Mobile_exists($MobilePhone){
	    $query = "select
			c.id as career_id, c.gc_id, c.name, c.email, c.mobile_phone, c.land_line,
			c.nic, c.gender, c.position_applied, c.comments,
			c.status_id, c.stage_id,
			cs.name as status_name, cs.name_code as status_code,
			ct.name as stage_name, ct.name_code as stage_code


			from atif_career.career_form as c
			left join atif_career.career_status as cs
				on cs.id = c.status_id
			left join atif_career.career_stage as ct
				on ct.id = c.stage_id

			where c.mobile_phone = '$MobilePhone'";

	    $career = DB::connection($this->dbCon)->select($query);
	    if(!empty($career)){
	    	return true;
	    }else{
	    	return false;
	    }
		
	}










	/**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
    public function get_abc(){
	    $query = "";

	    $career[''] = DB::connection($this->dbCon)->select($query);
		return $career;
	}

    public function insertFormData($table_name,$data){
    	$id = DB::connection($this->dbCon)->table($table_name)->insertGetId($data);
    	return $id;
    }
    public function updateFormdata($table_name,$where,$data){
         $update_data =  DB::connection($this->dbCon)->table($table_name)->where($where)->update($data);
        return $update_data;
    }

    public function get_form_status($form_id, $status_id){
    	
    	$query  = "Select * from atif_career.career_form_data where form_id = $form_id and status_id = $status_id";
		$getStatus = DB::connection($this->dbCon)->select($query);
		return $getStatus;
    }


    public function get_tag(){
        
//         $query  = "SELECT CONCAT(
//     group_tag, GROUP_CONCAT(option_tag SEPARATOR ''),
//     '</optgroup>') AS html_tag
// FROM
// (
// SELECT
//     c.group_name, c.name, CONCAT('<optgroup label="."', c.group_name ,'".">') AS group_tag, CONCAT('<option value="."', c.name, '".">', c.name, '</option>') AS option_tag,


//     (@groupName:=c.group_name) AS groupName
// FROM atif_career.career_tag AS c
// JOIN (
// SELECT @groupName := '') AS groupName
// JOIN (
// SELECT @optionName := '') AS optionName
// JOIN (
// SELECT @htmlTag := '') AS htmlTag
// ORDER BY group_name ASC) AS DATA
// GROUP BY group_name";
        $query = 'SELECT CONCAT(
    group_tag, GROUP_CONCAT(option_tag SEPARATOR \'\'),
    \'</optgroup>\') AS html_tag
FROM
(
SELECT
    c.group_name, c.name, CONCAT(\'<optgroup label="\', c.group_name ,\'">\') AS group_tag, CONCAT(\'<option value="\', c.name, \'">\', c.name, \'</option>\') AS option_tag,


    (@groupName:=c.group_name) AS groupName
FROM atif_career.career_tag AS c
JOIN (
SELECT @groupName := "") AS groupName
JOIN (
SELECT @optionName := "") AS optionName
JOIN (
SELECT @htmlTag := "") AS htmlTag
ORDER BY group_name ASC) AS DATA
GROUP BY group_name';
        $getStatus = DB::connection($this->dbCon)->select($query);
        return $getStatus;
    }


    public function get_grade(){
        
        $query  = "Select * from atif_career.career_grade";
        $getStatus = DB::connection($this->dbCon)->select($query);
        return $getStatus;
    }


    public function get_status(){
        
        $query  = "Select * from atif_career.career_status";
        $getStatus = DB::connection($this->dbCon)->select($query);
        return $getStatus;
    }


    public function get_branch(){
        
        $query  = "Select * from atif._branch";
        $getStatus = DB::connection($this->dbCon)->select($query);
        return $getStatus;
    }

    public function get_allocation(){
        $query  = "Select * from atif_career.career_allocation";
        $getStatus = DB::connection($this->dbCon)->select($query);
        return $getStatus;
    }


    /**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
    public function get_applicant_recruitment_data($form_id){
	    $query = "SELECT cf.name,cf.status_id AS current_status_id,cf.stage_id AS current_stage_id,
cfd.status_id AS old_status_id,cfd.stage_id AS old_stage_id,cfd.comments_next_step,
cfd.comments_applicant,
cfd.comments_next_decision,cfd.comments_next_step_aloc,
cfd.date,cfd.time,cfd.tag,cfd.campus,cfd.career_grade_id,
cfd.applicant_allocate,if(lcf.form_id is null,0,1) as intial_interview_presence,if(lcf_formal.form_id is null,0,1) as formal_interview_presence,if(lcf_observation.form_id is null,0,1) as observation_interview_presence,if(lcf_final_consultant.form_id is null,0,1) as final_consultant_interview_presence
FROM atif_career.career_form cf
LEFT JOIN atif_career.career_form_data cfd ON cfd.form_id = cf.id
LEFT JOIN atif_career.log_career_form lcf ON (lcf.status_id = 2 AND lcf.form_id = cf.id AND (lcf.stage_id = 4 OR lcf.stage_id = 8))
LEFT JOIN atif_career.log_career_form lcf_formal ON (lcf_formal.status_id = 3 AND lcf_formal.form_id = cf.id AND (lcf_formal.stage_id = 4 OR lcf_formal.stage_id = 8))
LEFT JOIN atif_career.log_career_form lcf_observation ON (lcf_observation.status_id = 4 AND lcf_observation.form_id = cf.id AND (lcf_observation.stage_id = 4 OR lcf_observation.stage_id = 8))
LEFT JOIN atif_career.log_career_form lcf_final_consultant ON (lcf_final_consultant.status_id = 5 AND lcf_final_consultant.form_id = cf.id AND (lcf_final_consultant.stage_id = 4 OR lcf_final_consultant.stage_id = 8))
WHERE cf.id = ".$form_id." GROUP BY cfd.id";

	    $career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
	}
	
	 public function get_getTags(){
        $query  = "select tg.id, tg.name, tg.group_name from atif_career.career_tag as tg";
        $getStatus = DB::connection($this->dbCon)->select($query);
        return $getStatus;
    }




}