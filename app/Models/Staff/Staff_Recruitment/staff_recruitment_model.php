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
			ct.name as stage_name, ct.name_code as stage_code, from_unixtime(c.created) as created, c.form_source,
			part_b.date as part_b_date, part_b.time as part_b_time,
			if(part_b.campus=2, 'South',if(part_b.campus=1, 'North', '')) as Campus,
			if(c.status_id != 11 and part_b.time is not null, 'Part-B completed', '') as part_b_complete,
			
			(case 
			when c.status_id=11 and c.stage_id=9 then 'CallForPartB'
			when c.status_id=11 and c.stage_id=10 then 'CommunicatedForPartB'
			when c.status_id != 11 and part_b.time is not null then 'CompletedPartB'
			else ''
			end ) as PartB,
			
			/*( case 
				when c.status_id=11  then 'CallForPartB'
				when c.status_id=11  then 'CommunicatedForPartB'
				when part_b.time is not null then 'CompletedPartB'
				else ''
			end ) as PartB,*/
			
			from_unixtime(c.created,'%Y-%m-%d') as Created_date,
			from_unixtime(c.modified,'%Y-%m-%d') as Modified_date,
				
			/*if(c.status_id=11 and c.stage_id=9, (lcf.created), (c.modified)) as log_created*/
			
			if( lcf.created is null, from_unixtime(c.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created
			
			




			from atif_career.career_form as c
			left join atif_career.career_status as cs
				on cs.id = c.status_id
			left join atif_career.career_stage as ct
				on ct.id = c.stage_id
			left join atif_career.career_form_data as part_b on part_b.form_id = c.id and part_b.status_id = 11
			
			left join (select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified
				from atif_career.log_career_form as lcf 
				order by lcf.created limit 1) as lcf
				on lcf.form_id = c.id
				
			/*left join (select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified
				from atif_career.log_career_form as lcf 
				group by lcf.form_id
				order by lcf.created, lcf.form_id) as lcf
				on lcf.form_id = c.id*/
				
	where ( c.status_id != 10 and c.status_id != 12 )
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
    public function get_recruitment_archive_data(){
	   
	   
	   	    $query = "select
			c.id as career_id, c.gc_id, c.name, c.email, c.mobile_phone, c.land_line,
			c.nic, c.gender, c.position_applied, c.comments,
			c.status_id, c.stage_id,
			cs.name as status_name, cs.name_code as status_code,
			ct.name as stage_name, ct.name_code as stage_code, from_unixtime(c.created) as created, c.form_source,
			part_b.date as part_b_date, part_b.time as part_b_time,
			if(part_b.campus=2, 'South',if(part_b.campus=1, 'North', '')) as Campus,
			if(c.status_id != 11 and part_b.time is not null, 'Part-B completed', '') as part_b_complete,
			
			(case 
			when c.status_id=11 and c.stage_id=9 then 'CallForPartB'
			when c.status_id=11 and c.stage_id=10 then 'CommunicatedForPartB'
			when c.status_id != 11 and part_b.time is not null then 'CompletedPartB'
			else ''
			end ) as PartB,
			
			
			
			from_unixtime(c.created,'%Y-%m-%d') as Created_date,
			from_unixtime(c.modified,'%Y-%m-%d') as Modified_date,
				
			
			
			if( lcf.created is null, from_unixtime(c.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created
			
			




			from atif_career.career_form as c
			left join atif_career.career_status as cs
				on cs.id = c.status_id
			left join atif_career.career_stage as ct
				on ct.id = c.stage_id
			left join atif_career.career_form_data as part_b on part_b.form_id = c.id and part_b.status_id = 11
			
			left join (select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified
				from atif_career.log_career_form as lcf 
				order by lcf.created limit 1) as lcf
				on lcf.form_id = c.id
				
			
			
			where ( c.status_id=10 or c.status_id=12 )
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
    public function get_recruitment_data_where($Where)
	{
	    $query = "select 
c.id as career_id, c.gc_id, c.name, c.email, c.mobile_phone, c.land_line,
c.nic, c.gender, c.position_applied, c.comments,
c.status_id, c.stage_id,
cs.name as status_name, cs.name_code as status_code,
ct.name as stage_name, ct.name_code as stage_code, from_unixtime(c.created) as created, c.form_source,

part_b.date as part_b_date, part_b.time as part_b_time,

if(part_b.campus=2, 'South',if(part_b.campus=1, 'North', '')) as Campus,

if(c.status_id != 11 and part_b.time is not null, 'Part-B completed', '') as part_b_complete,

(case 
when c.status_id=11 and c.stage_id=9 then 'CallForPartB'
when c.status_id=11 and c.stage_id=10 then 'CommunicatedForPartB'
when c.status_id != 11 and part_b.time is not null then 'CompletedPartB'
else ''
end ) as PartB, 
from_unixtime(c.created,'%Y-%m-%d') as Created_date,
from_unixtime(c.modified,'%Y-%m-%d') as Modified_date,
if( lcf.created is null, from_unixtime(c.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created
			
from atif_career.log_career_form as lcf
left join atif_career.career_form as c on c.id= lcf.form_id
left join atif_career.career_status as cs	on cs.id = c.status_id
left join atif_career.career_stage as ct on ct.id = c.stage_id
left join atif_career.career_form_data as part_b on part_b.form_id = c.id and part_b.status_id=11 ". $Where; 


 $query .= "  group by c.id ";
#echo $query; exit;


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
        
        $query  = "Select * from atif_career.career_status cf where cf.show = 1";
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
		
	    $query = "SELECT cf.id as Form_id, cf.name,cf.status_id AS current_status_id,cf.stage_id AS current_stage_id, cf.form_source,
cfd.status_id AS old_status_id,cfd.stage_id AS old_stage_id,cfd.comments_next_step,
cfd.comments_applicant,
cfd.comments_next_decision,cfd.comments_next_step_aloc,
cfd.date,cfd.time,cfd.tag,cfd.campus,cfd.career_grade_id,cfd.checks,
cfd.applicant_allocate,if(lcf.form_id is null,0,1) as intial_interview_presence,if(lcf_formal.form_id is null,0,1) as formal_interview_presence,if(lcf_observation.form_id is null,0,1) as observation_interview_presence,if(lcf_final_consultant.form_id is null,0,1) as final_consultant_interview_presence,
if(call_for_part_b_display.form_id is null,0,1) as call_for_part_b_display,if(form_screening_display.form_id is null,0,1) as form_screening_display
FROM atif_career.career_form cf
LEFT JOIN atif_career.career_form_data cfd ON cfd.form_id = cf.id
LEFT JOIN atif_career.log_career_form lcf ON (lcf.status_id = 2 AND lcf.form_id = cf.id AND (lcf.stage_id = 4 OR lcf.stage_id = 8))
LEFT JOIN atif_career.log_career_form lcf_formal ON (lcf_formal.status_id = 3 AND lcf_formal.form_id = cf.id AND (lcf_formal.stage_id = 4 OR lcf_formal.stage_id = 8))
LEFT JOIN atif_career.log_career_form lcf_observation ON (lcf_observation.status_id = 4 AND lcf_observation.form_id = cf.id AND (lcf_observation.stage_id = 4 OR lcf_observation.stage_id = 8))
LEFT JOIN atif_career.log_career_form lcf_final_consultant ON (lcf_final_consultant.status_id = 5 AND lcf_final_consultant.form_id = cf.id AND (lcf_final_consultant.stage_id = 4 OR lcf_final_consultant.stage_id = 8))
LEFT JOIN atif_career.log_career_form call_for_part_b_display ON (call_for_part_b_display.status_id = 11 AND call_for_part_b_display.form_id = cf.id AND (call_for_part_b_display.stage_id = 9 ))
LEFT JOIN atif_career.log_career_form form_screening_display ON (form_screening_display.status_id = 11 AND form_screening_display.form_id = cf.id AND (form_screening_display.stage_id = 4 ))
WHERE cf.id =  ".$form_id." GROUP BY cfd.id";
		

		/*
		$query = "select
		c.id, c.gc_id, c.name, c.email, c.mobile_phone, c.land_line, c.nic, c.gender, c.position_applied,
		c.status_id, cs.this_order as status_order,
		c.stage_id, cst.this_order as stage_order, c.form_source,
		part_b.comments_next_step as part_b_comments_next_step, part_b.comments_applicant as part_b_comments_applicant,
		part_b.comments_next_decision as part_b_comments_next_decision, part_b.comments_next_step_aloc as part_b_comments_next_step_aloc,
		part_b.date as part_b_date, part_b.time as part_b_time, part_b.campus as part_b_campus, part_b.career_grade_id as part_b_grade_id,
		part_b.applicant_allocate as part_b_applicant_allocate
		
		from atif_career.career_form as c
		left join atif_career.career_status as cs
			on cs.id = c.status_id
		left join atif_career.career_stage as cst
			on cst.id = c.stage_id
		
		left join (select 
			cfd.form_id, cfd.status_id,
			cfd.comments_next_step, cfd.comments_applicant, cfd.comments_next_decision, cfd.comments_next_step_aloc,
			cfd.date, cfd.time, cfd.campus, cfd.career_grade_id, cfd.applicant_allocate
			from atif_career.career_form_data as cfd
			where cfd.form_id = ".$form_id."
			and cfd.status_id = 11
			) as part_b
			on part_b.form_id = c.id
			and part_b.status_id = c.status_id
			
		where c.id = ".$form_id;
		*/
		

	    $career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
	}
	
	 public function get_getTags(){
        $query  = "select tg.id, tg.name, tg.group_name from atif_career.career_tag as tg";
        $getStatus = DB::connection($this->dbCon)->select($query);
        return $getStatus;
    }



    public function get_form_log($form_id){
        
        $query  = "SELECT (t1.`status_id` + 1) as gap_starts_at, 
       (SELECT MIN(t3.`status_id`) -1 FROM  atif_career.career_form_data t3 WHERE t3.`status_id` > t1.`status_id` and t1.status_id <= 6 and t3.status_id <= 6 and t1.`form_id` = $form_id  and t3.`form_id` = $form_id) as gap_ends_at
			FROM  atif_career.career_form_data t1 
			WHERE 
			t1.`form_id` = $form_id and
			t1.status_id <= 6 and 

			NOT EXISTS (SELECT t2.`status_id` FROM  atif_career.career_form_data t2 WHERE t2.`status_id` = t1.`status_id` + 1 and t1.status_id <= 6 and t2.status_id <= 6 and t1.`form_id` = $form_id  and t2.`form_id` = $form_id)
			HAVING gap_ends_at IS NOT NULL";
        $getStatus = DB::connection($this->dbCon)->select($query);
        return $getStatus;
    }

    public function get_deleted_id($form_id){
    	$query = "SELECT af.id as id,af.status_id as status_id FROM atif_career.career_form_data af 
			where af.form_id = ".$form_id." and af.date = '1970-01-01' and af.time = '00:00:00'   
			order by id desc limit 1";

		$result = DB::connection($this->dbCon)->select($query);
        return $result;
    }


    public function delete_id($table, $id){
    	$query = "delete from $table where id = $id";
    	//return DB::table($table)->where('id', $id)->delete();
    	return DB::connection($this->dbCon)->delete($query);
    	//return DB::delete("delete from $table where id = $id");

    }

    public function get_mark_as_presence($form_id, $current_status){
    	$query = "SELECT cf.status_id,if(lcf.form_id is null,0,1) as intial_interview_presence FROM atif_career.career_form cf LEFT JOIN atif_career.career_form_data cfd ON cfd.form_id = cf.id LEFT JOIN atif_career.log_career_form lcf ON (lcf.status_id = $current_status AND lcf.form_id = cf.id AND (lcf.stage_id = 4 OR lcf.stage_id = 8) AND cfd.status_id = $current_status  AND  cf.stage_id = 4) where cf.id = $form_id order by cfd.id desc limit 1";

		$result = DB::connection($this->dbCon)->select($query);
        return $result;
    }

    public function get_log_status($form_id,$status_id){
    	$query = "SELECT id FROM atif_career.log_career_form where form_id = ".$form_id." and status_id = ".$status_id;

		$result = DB::connection($this->dbCon)->select($query);
        return $result;
    }
	
	
	
	public function Get_Logs( $Form_id ){
		
    	 $query = "select final_data.* 
from( 
select 
cf.id as Form_id,
cf.gc_id as Form_no,
concat( 'Applicant name ', cf.name , ' Position ', cf.position_applied, ' Status ' , cs.name ) as Applicat_name,
cf.position_applied as Position_Apply,
cf.comments as Comments,
'Career Form' as Result_Type,
cf.status_id as  Status_id,
cs.name as Status_name,
cf.stage_id as Stage_id,
cst.name as Stage_name,
cf.created as Created_on,
cf.register_by as Created_by,
cf.modified as Modified_on,
cf.modified_by as Modified_by,
concat(  if( cf.form_source=1 ,'Online', 'Walkin') , ' form submission on  <strong> ', from_unixtime(cf.created, '%a %b %e, %Y %h:%i %p' ) , ' </strong>' )  as Form_Source,

sr.abridged_name as Register_by,
sr.employee_id as Photo_id,
from_unixtime(cf.created, '%a %b %e, %Y %h:%i %p' )as Dated,
from_unixtime(cf.created ) as order_Date

from atif_career.career_form as cf
left join atif.staff_registered as sr
on sr.id = cf.register_by
left join atif_Career.career_status as cs
on cs.id = cf.status_id
left join atif_Career.career_stage as cst
on cst.id=cf.stage_id

/*
union

select 
cf.form_id as Form_id,
'' as Form_no,
'' as Applicat_name,
'' as Position_Apply,
'' as Comments,
'Logs Career Form' as Result_Type,
cf.status_id as  Status_id,
cs.name as Status_name,
cf.stage_id as Stage_id,
cst.name as Stage_name,
cf.created as Created_on,
cf.register_by as Created_by,
cf.modified as Modified_on,
cf.modified_by as Modified_by,
'' as Form_Source,
sr.abridged_name as Register_by,
sr.employee_id as Photo_id,
from_unixtime(cf.modified, '%a %b %e, %Y %h:%i %p' )as Dated,
from_unixtime(cf.created ) as order_Date
from atif_career.log_career_form as cf
left join atif.staff_registered as sr
on sr.id = cf.register_by
left join atif_Career.career_status as cs
on cs.id = cf.status_id
left join atif_Career.career_stage as cst
on cst.id=cf.stage_id

*/

union
select 

cf.form_id as Form_id,
'' as Form_no,
concat( cs.name ,' ' , 'Dated ',  cf.date, ' at ', cf.time, ' Tags ',cf.tag ) as Applicat_name,
ca.dname as Position_Apply,

concat( cf.comments_next_step, '' ,cf.comments_applicant, '', cf.comments_next_decision,'',cf.comments_next_step_aloc) as Comments,
 'Career Form Data' as Result_Type,
cf.status_id as  Status_id,
cs.name as Status_name,
cf.stage_id as Stage_id,
cst.name as Stage_name,
cf.created as Created_on,
cf.register_by as Created_by,
cf.modified as Modified_on,
cf.modified_by as Modified_by,
'' as Form_Source,
sr.abridged_name as Register_by,
sr.employee_id as Photo_id,
from_unixtime(cf.modified, '%a %b %e, %Y %h:%i %p' )as Dated,
from_unixtime(cf.created ) as order_Date
from atif_career.career_form_data as cf
left join atif.staff_registered as sr
on sr.id = cf.register_by
left join atif_Career.career_status as cs
on cs.id = cf.status_id
left join atif_Career.career_stage as cst
on cst.id=cf.stage_id
left join atif_career.career_allocation as ca
on ca.id= cf.applicant_allocate
left join atif_career.career_grade as cg
on cg.id = cf.career_grade_id

/*
union
select 
cf.form_id as Form_id,
'' as Form_no,
'' as Applicat_name,
'' as Position_Apply,
'' as Comments,
'Logs Career Form Data' as Result_Type,
cf.status_id as  Status_id,
cs.name as Status_name,
cf.stage_id as Stage_id,
cst.name as Stage_name,
cf.created as Created_on,
cf.register_by as Created_by,
cf.modified as Modified_on,
cf.modified_by as Modified_by,
'' as Form_Source,
sr.abridged_name as Register_by,
sr.employee_id as Photo_id,
from_unixtime(cf.modified, '%a %b %e, %Y %h:%i %p' )as Dated,
from_unixtime(cf.created ) as order_Date
from atif_career.log_career_form_data as cf
left join atif.staff_registered as sr
on sr.id = cf.register_by
left join atif_Career.career_status as cs
on cs.id = cf.status_id
left join atif_Career.career_stage as cst
on cst.id=cf.stage_id */
) as final_data

where final_data.Form_id=".$Form_id."  

order by final_data.order_Date asc ";



	$result = DB::connection($this->dbCon)->select($query);
    return $result;
    }

	public function activeGates($form_id){
    		$query = "select * from (
select
		1 as status_id, 'Call for Part B' as status_name, form_id, group_concat(gate) as gates
		from
		(select
		lcf.form_id, 1 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 11
		and lcf.stage_id = 9
		and lcf.form_id = $form_id
	
		union 

		select
		lcf.form_id, 2 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 11
		and lcf.stage_id = 9
		and lcf.form_id = $form_id

		union 

		select
		lcf.form_id, 3 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 11
		and lcf.stage_id = 4
		and lcf.form_id = $form_id

		union

		select 
		cfd.form_id, 4 as gate
		from 
		atif_career.career_form_data as cfd
		where cfd.status_id = 11
		and cfd.stage_id = 10
		and cfd.date < curdate()
		and cfd.form_id = $form_id
		and cfd.form_id not in (select
		lcf.form_id
		from atif_career.log_career_form as lcf
		where lcf.status_id = 11
		and lcf.stage_id = 4
		and lcf.form_id = $form_id
		group by lcf.form_id)
		) as data
		group by form_id
) as data


union


select * from (
select
		2 as status_id, 'Form Screening' as status_name, form_id, group_concat(gate) as gates
		from
		(select
		lcf.form_id, 1 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 2
		and (lcf.stage_id = 1
		or lcf.stage_id = 4)
		and lcf.form_id = $form_id
		
		
		union
		
		select cf.id as form_id, '1,2,4' as gate 
		from atif_career.career_form as cf
		where cf.status_id = 2
		and cf.stage_id = 4
		and cf.id = $form_id
	
		union 

		select
		lcf.form_id, 2 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 2
		and (lcf.stage_id = 2
		or lcf.stage_id = 4)
		and lcf.form_id = $form_id

		union 

		select
		lcf.form_id, 3 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 2
		and lcf.stage_id = 3
		and lcf.form_id = $form_id

		union

		select
		lcf.form_id, 4 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 2
		and lcf.stage_id = 4
		and lcf.form_id = $form_id
		
		union

		select
		lcf.form_id, 5 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 2
		and lcf.stage_id = 5
		and lcf.form_id = $form_id
		) as data
		group by form_id

) as data


union


select * from (
select
		3 as status_id, 'Formal Interview' as status_name, form_id, group_concat(gate) as gates
		from
		(select
		lcf.form_id, 1 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 3
		and (lcf.stage_id = 1
		or lcf.stage_id = 4)
		and lcf.form_id = $form_id
		
		
		union
		
		select cf.id as form_id, '1,2,4' as gate 
		from atif_career.career_form as cf
		where cf.status_id = 3
		and cf.stage_id = 4
		and cf.id = $form_id
	
		union 

		select
		lcf.form_id, 2 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 3
		and (lcf.stage_id = 2
		or lcf.stage_id = 4)
		and lcf.form_id = $form_id

		union 

		select
		lcf.form_id, 3 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 3
		and lcf.stage_id = 3
		and lcf.form_id = $form_id

		union

		select
		lcf.form_id, 4 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 3
		and lcf.stage_id = 4
		and lcf.form_id = $form_id
		
		union

		select
		lcf.form_id, 5 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 3
		and lcf.stage_id = 5
		and lcf.form_id = $form_id
		) as data
		group by form_id

) as data


union


select * from (
select
		4 as status_id, 'Observation' as status_name, form_id, group_concat(gate) as gates
		from
		(select
		lcf.form_id, 1 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 4
		and (lcf.stage_id = 1
		or lcf.stage_id = 4)
		and lcf.form_id = $form_id
		
		
		union
		
		select cf.id as form_id, '1,2,4' as gate 
		from atif_career.career_form as cf
		where cf.status_id = 4
		and cf.stage_id = 4
		and cf.id = $form_id
	
		union 

		select
		lcf.form_id, 2 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 4
		and (lcf.stage_id = 2
		or lcf.stage_id = 4)
		and lcf.form_id = $form_id

		union 

		select
		lcf.form_id, 3 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 4
		and lcf.stage_id = 3
		and lcf.form_id = $form_id

		union

		select
		lcf.form_id, 4 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 4
		and lcf.stage_id = 4
		and lcf.form_id = $form_id
		
		union

		select
		lcf.form_id, 5 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 4
		and lcf.stage_id = 5
		and lcf.form_id = $form_id
		) as data
		group by form_id

) as data


union


select * from (
select
		5 as status_id, 'Final Consultation' as status_name, form_id, group_concat(gate) as gates
		from
		(select
		lcf.form_id, 1 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 5
		and (lcf.stage_id = 1
		or lcf.stage_id = 4)
		and lcf.form_id = $form_id
		
		
		union
		
		select cf.id as form_id, '1,2,4' as gate 
		from atif_career.career_form as cf
		where cf.status_id = 5
		and cf.stage_id = 4
		and cf.id = $form_id
	
		union 

		select
		lcf.form_id, 2 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 5
		and (lcf.stage_id = 2
		or lcf.stage_id = 4)
		and lcf.form_id = $form_id

		union 

		select
		lcf.form_id, 3 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 5
		and lcf.stage_id = 3
		and lcf.form_id = $form_id

		union

		select
		lcf.form_id, 4 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 5
		and lcf.stage_id = 4
		and lcf.form_id = $form_id
		
		union

		select
		lcf.form_id, 5 as gate
		from atif_career.log_career_form as lcf
		where lcf.status_id = 5
		and lcf.stage_id = 5
		and lcf.form_id = $form_id
		) as data
		group by form_id

) as data";
		$result = DB::connection($this->dbCon)->select($query);
    	return $result;
	}
	
	public function get_followup_logs( $Form_id ){
		
    	  $query = "Select cf.id as Form_id,
cf.gc_id as Form_no,
concat( 'Applicant name ', cf.name , ' Position ', cf.position_applied, ' Status ' , cs.name ) as Applicat_name,
cf.position_applied as Position_Apply,
cfc.comment as Comments,

'Followup' as Result_Type,
cs.name as Status_name,
cf.stage_id as Stage_id,
cst.name as Stage_name,
cfc.created as Created_on,
cfc.register_by as Created_by,
cfc.modified as Modified_on,
cfc.modified_by as Modified_by,
concat(  if( cf.form_source=1 ,'Online', 'Walkin') , ' form submission on  <strong> ', from_unixtime(cf.created, '%a %b %e, %Y %h:%i %p' ) , ' </strong>' )  as Form_Source,
sr.abridged_name as Register_by,
sr.employee_id as Photo_id,
from_unixtime(cfc.modified, '%a %b %e, %Y %h:%i %p' )as Dated
from atif_career.career_followup_comments as cfc left join atif_career.career_form as cf on cfc.form_id = cf.id 
left join atif_Career.career_status as cs

on cs.id = cf.status_id

left join atif_Career.career_stage as cst

on cst.id=cf.stage_id


left join atif.staff_registered as sr
on sr.id = cfc.register_by
where form_id = $Form_id
order by cfc.`modified` desc";



	$result = DB::connection($this->dbCon)->select($query);
    return $result;
    }
    /**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
    public function get_recruitment_followup_data(){
	    /*$query = "
select
c.id as career_id, c.gc_id, c.name, c.email, c.mobile_phone, c.land_line,
c.nic, c.gender, c.position_applied, c.comments,
c.status_id, c.stage_id,
cs.name as status_name, cs.name_code as status_code,
ct.name as stage_name, ct.name_code as stage_code, from_unixtime(c.created) as created, c.form_source,
cfd.date as call_date,  cfd.campus as Campus,if( lcf.created is null, from_unixtime(c.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,  cfd.time as call_time

from atif_career.career_form as c
left join (select cfd.*
		from (
		select cfd.*, max(cfd.date) as follow_date
			from atif_career.career_form_data as cfd
				where cfd.time is not null
				and cfd.date is not null
			group by cfd.form_id
			order by cfd.date desc
		) as cfd
		where cfd.time is not null
		and cfd.follow_date is not null
		and cfd.follow_date < curdate()
		and cfd.follow_date != '1970-01-01') as cfd

	on cfd.form_id = c.id

inner join atif_career.log_career_form as lcf
	on lcf.form_id = c.id
	and lcf.status_id = cfd.status_id
	and lcf.stage_id < 4

left join atif_career.career_status as cs
	on cs.id = c.status_id
left join atif_career.career_stage as ct
	on ct.id = c.stage_id

where c.status_id > 0

group by c.id";*/
$query = "select c.id as career_id, c.gc_id, c.name, c.email, c.mobile_phone, c.land_line,
c.nic, c.gender, c.position_applied, c.comments,
c.status_id, c.stage_id,
cs.name as status_name, cs.name_code as status_code,
ct.name as stage_name, ct.name_code as stage_code, from_unixtime(c.created) as created, c.form_source,
part_b.date as call_date,  part_b.campus as Campus,if( lcf.created is null, from_unixtime(c.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,  part_b.time as call_time


 from atif_career.career_form as c
	left join atif_career.career_form_data as part_b 
	on part_b.form_id = c.id 
	
	
	inner join atif_career.log_career_form as lcf
	on lcf.form_id = c.id
	and lcf.status_id = part_b.status_id
	and lcf.stage_id < 4

left join atif_career.career_status as cs
	on cs.id = c.status_id
	
left join atif_career.career_stage as ct
	on ct.id = c.stage_id
	
	
	
	

	
	where #c.gc_id = '18-03/0301'
	
	c.stage_id=8 
	and 
	( c.status_id != 10 ) and ( c.status_id != 0 ) and ( c.status_id != 12 )

and ( part_b.date = '1970-01-01' or part_b.date < curdate() or part_b.date is null )

group by c.id
order by c.id";



	    $career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
	}	

}