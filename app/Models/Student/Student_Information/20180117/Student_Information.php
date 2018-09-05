<?php

namespace App\Models\Student\Student_Information;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Student_Information extends Model
{
    public function getStudent($Grade,$Section)
	{
		$Result = DB::connection( 'mysql_att_lo' )->select('CALL `sp_get_student_grade_list`(?,?)',array($Grade,$Section));
		$i = 0;
	    foreach ($Result as $u) {
		    $pic = $this->get_Student_Pic($u->Photo_id);
		    $Result[$i]->photo500 = $pic['photo500'];
		    $Result[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }
		return $Result;
	}
	
	public function getSchoolLevelStudent()
	{
		$Result = DB::connection( 'mysql_att_lo' )->select('CALL `get_School_level_Students`()');
		$i = 0;
	    foreach ($Result as $u) {
		    $pic = $this->get_Student_Pic($u->Photo_id);
		    $Result[$i]->photo500 = $pic['photo500'];
		    $Result[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }
		return $Result;
	}


	public function getStudent_SubjectTeacher($reqGradeID,$reqSubjectID,$reqGroupID,$reqBlockID)
	{
		$query = "call atif_attendance.sp_get_student_grade_list_block('".$reqGradeID."','".$reqSubjectID."','".$reqGroupID."','".$reqBlockID."')";
		$Result = DB::connection( 'mysql_att_lo' )->select($query);
		
		
		$i = 0;
	    foreach ($Result as $u) {
		    $pic = $this->get_Student_Pic($u->Photo_id);
		    $Result[$i]->photo500 = $pic['photo500'];
		    $Result[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }

		
		return $Result;
	}
	
	
	public function Get_Badges( $Grade_id, $Section_id, $Acadmic_id )
	{
		$SQL_Query = "SELECT bg.* ,sr.abridged_name FROM gs_badges.badges as bg
		left join atif.staff_registered as sr on(sr.id = bg.created_by) WHERE
		bg.grade_id=".$Grade_id." and bg.section_id=".$Section_id." and bg.academic_session_id=".$Acadmic_id." and bg.record_deleted=0";
		return DB::connection( 'mysql_att_lo' )->select($SQL_Query);
	}
	
	public function Grd_Sctn_Badge($Grade_id,$Section_id,$Acadmic_id){
	$Query = "SELECT ID,bedge_title,bedge_code FROM gs_badges.badges as b where b.academic_session_id=".$Acadmic_id." 
	and b.grade_id=".$Grade_id." and b.section_id=".$Section_id." and b.record_deleted=0 and b.session_term_id=1";
	return DB::connection( 'mysql_att_lo' )->select($Query);	
	}
	
	public function Get_Student_Badges($Student_id)
	{
		$SQL_Query = "select  bb.ID, bb.bedge_title as Bdg_Title,
		if( bb.bedge_code ='' or bb.bedge_code is null,'-', bb.bedge_code ) as Badge_code,
		bb.bedge_color as Badge_Color
		from gs_badges.bedge_student as sb
		left join gs_badges.badges as bb
		on bb.ID= sb.bedge_id
		where sb.student_id=".$Student_id." AND sb.record_deleted=0";
		return DB::connection( 'mysql_att_lo' )->select($SQL_Query);
	}
	
	public function Get_Student_Information($GS_ID)
	{
		$Result = DB::connection( 'mysql_att_lo' )->select('CALL `sp_get_single_student_grade_list`(?)',array($GS_ID));
		
		
		$i = 0;
	    foreach ($Result as $u) {
		    $pic = $this->get_Student_Pic($u->gr_no);
		    $Result[$i]->photo500 = $pic['photo500'];
		    $Result[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }
		return $Result;
	}
	
	
	public function get_siblings_data($GRNo){
		$siblings_query =
		"SELECT * FROM atif.class_list as cl WHERE cl.gf_id =(SELECT gf_id FROM atif.student_registered as sr WHERE sr.gr_no=".$GRNo.") ORDER BY cl.year_dob ASC";
		return DB::connection( 'mysql_att_lo' )->select($siblings_query);
	}
	public function Today_Score($Grade_id, $Section_id)
	{
		$Query = "select 
sc.date as Today_Date,
sc.grade_id as Grade_id,
sc.section_id as Section_id,
sc.strength as Total_Strength,
sc.present as Today_Strength,
round(( ( sc.present  / sc.strength ) * 100 ),1) as Today_Present_Percentage,
sc.absent as Today_Absent,
round(( ( sc.absent  / sc.strength ) * 100 ),1) as Today_Absent_Percentage,
sc.score as Today_Score,
sc.score_10 as Ten_Days_Score,
sc.score_60 as Sixteen_Days_Score,
sc.rank as Today_Ranking,
sc.rank_10 as Ten_Days_Ranking,
sc.rank_60 as Sixteen_Days_Ranking,
sc.total_sections as Total_Sections 
from atif_attendance.attendance_score as sc ";

//$Query .= " where sc.date = date('2017-10-05') ";
$Query .= " where sc.date = curdate() ";

//$Query .= " where ";

		if($Section_id > 0){
			$Query .= " and ";
			$Query .= " sc.grade_id=".$Grade_id." and sc.section_id=".$Section_id."";	
			//$Query .= " group by sc.date ";
			//$Query .= " order by sc.date desc ";
			//$Query .= " limit 1 ";
		}else{
			$Query .= " and ";
			$Query .= " sc.grade_id=".$Grade_id."";	
			//$Query .= " group by sc.date ";
			//$Query .= " order by sc.date desc ";
		}
	

		//echo $Query; exit;
		return DB::connection( 'mysql_att_lo' )->select($Query);
	}
	public function Count_Fence($Grade_id, $Section_id)
	{
		$Query = "
		select 
		cl.grade_dname as Grade_Name,
cl.section_dname as Section_Name,
cl.grade_id as Grade_id,
cl.section_id as Section_id,
cl.academic_session_id as Academic_id,

sum( if( cl.std_status_category='Student',1,0) ) as Grade_Strength,
sum( if( cl.std_status_category='Fence',1,0) ) as Total_Fence,
Score.TenDaysScore as Ten_Days_Score ,
Score.SixteenDaysScore as Sixteen_Days_Score,
Score.TenDaysRanking as Ten_Days_Ranking,
Score.SixteenDaysRanking as Sixteen_Days_Ranking
		from 
		atif.class_list as cl ";
		
	$Query .= " left join( select 
sc.grade_id as Grade_id,
sc.section_id as Section_id,
sc.score_10 as TenDaysScore,
sc.score_60 as SixteenDaysScore,
sc.rank_10 as TenDaysRanking,
sc.rank_60 as SixteenDaysRanking
from atif_attendance.attendance_score as sc ";

	$Query .= " where sc.grade_id=".$Grade_id." ";
	
	if($Section_id > 0 ){ 
		$Query .= " and sc.section_id=".$Section_id." ";
	}
	
	$Query .= " order by sc.date desc limit 1 ";
	
	
	$Query .= " )  as Score ";
	$Query .= " on ";
	$Query .= "(";
	$Query .= " Score.Grade_id=cl.grade_id ";
	if($Section_id > 0 )
	{
		$Query .= " and ";
		$Query .= " Score.Section_id=cl.section_id ";
		$Query .= " ) ";
	}
	else
	{
		$Query .= " ) ";
		
	}
	
	
	$Query .= " where cl.grade_id=".$Grade_id." ";
	if($Section_id > 0 ){
		$Query .= " and  cl.section_id=".$Section_id." ";	
	}
		
		
		return DB::connection( 'mysql_att_lo' )->select($Query);

	}
	public function Fence($Grade,$Section)
	{
		$siblings_query = "";
		if($Section==0){
			$siblings_query = "select
				`cl`.`grade_name` AS `grade_name`,
				`cl`.`section_name` AS `section_name`,
				count(`cl`.`gs_id`) AS `students`,
				sum(if((`cl`.`gender` = 'G'),1,0)) AS `girl`,
				sum(if((`cl`.`gender` = 'B'),1,0)) AS `boy`,
				sum(if((`cl`.`house_short_name` = 'J'),1,0)) AS `jinnah`,
				sum(if((`cl`.`house_short_name` = 'I'),1,0)) AS `iqbal`,
				sum(if((`cl`.`house_short_name` = 'S'),1,0)) AS `syed`, 
				sum(if(cl.std_status_category='Fence',1,0)) AS Fence_Total,
				count(Att.time) as Today_Total_Presents,
				sum(if( Att.time is null, 1, 0 )) as Today_Total_Absent
				from atif.`class_list` as cl 
				left join( select * from atif_attendance.student_attendance where date = curdate() group by gs_id ) as Att
				on( Att.gs_id = cl.gs_id)
				where  ((`cl`.`std_status_category` = 'Student' or `cl`.`std_status_category` = 'Fence')) 
				and cl.grade_id=".$Grade."
				group by `cl`.`grade_name`,`cl`.`section_name`
				order by `cl`.`grade_id`,`cl`.`section_id`";
		}else{
			$siblings_query = "select
				`cl`.`grade_name` AS `grade_name`,
				`cl`.`section_name` AS `section_name`,
				count(`cl`.`gs_id`) AS `students`,
				sum(if((`cl`.`gender` = 'G'),1,0)) AS `girl`,
				sum(if((`cl`.`gender` = 'B'),1,0)) AS `boy`,
				sum(if((`cl`.`house_short_name` = 'J'),1,0)) AS `jinnah`,
				sum(if((`cl`.`house_short_name` = 'I'),1,0)) AS `iqbal`,
				sum(if((`cl`.`house_short_name` = 'S'),1,0)) AS `syed`, 
				sum(if(cl.std_status_category='Fence',1,0)) AS Fence_Total,
				count(Att.time) as Today_Total_Presents,
				sum(if( Att.time is null, 1, 0 )) as Today_Total_Absent
				from atif.`class_list` as cl 
				left join( select * from atif_attendance.student_attendance where date = curdate() group by gs_id ) as Att
				on( Att.gs_id = cl.gs_id)
				where (`cl`.`std_status_category` = 'Student' or `cl`.`std_status_category` = 'Fence') 
				and cl.grade_id=".$Grade." AND cl.section_id=".$Section." 
				group by `cl`.`grade_name`,`cl`.`section_name` 
				order by `cl`.`grade_id`,`cl`.`section_id`"; 
		}
		
		
		return DB::connection( 'mysql_att_lo' )->select($siblings_query);
	}
	
	public function Grade_Section_Teach($Grade_id,$Section_id)
	{
		$Query = "SELECT 
			sr.id as StaffID,
			sr.abridged_name AS Teacher_Name,
			sr.employee_id AS Image_ID,
			sr.gender as Gender,
			sr.user_id as User_Id,
			if(ov.teacher_type_id =1, 'Class_teacher','') AS Class_teacher,
			if(ov.teacher_type_id =2, 'Co_Teacher','') AS Co_Teacher
			FROM atif.staff_registered as sr
			
			left join 
			( select ovv.teacher_type_id, ovv.staff_id,ovv.grade_id, ovv.section_id from 	atif_role_matrix.role_class_teacher as ovv 
				where ovv.grade_id=".$Grade_id."
				and ovv.section_id=".$Section_id."
			) as ov
			
			on(ov.staff_id=sr.id)
			
			
			WHERE ov.grade_id=".$Grade_id." and ov.section_id=".$Section_id."";
			
		return  DB::connection( 'mysql_att_lo' )->select($Query);		
		
	}
	
	
	
	/**********************************************************************
    * Calling Student Pic 500px and 150px 
    * @input: 	Student PhotoID
    * @output: 	Student Pic Paths
    * Description:
    * 		If no picture found then get blankPic
    ***********************************************************************/
	public function get_Student_Pic($PhotoID){
		if (!file_exists(STUDENT_PIC_500.$PhotoID.PIC500_TYPE)){
            $PhotoID = 'NoPic';
	    }
	    $user['photo500'] = STUDENT_PIC_500.$PhotoID.PIC500_TYPE;
	    $user['photo150'] = STUDENT_PIC_150.$PhotoID.PIC150_TYPE;

	    return $user;
	}
	
	
		
	/**********************************************************************
    * Calling Student Parents Information
    * @input: 	Family id gf_id
    * Description:
    * 		Will display parents information
    ***********************************************************************/
	public function get_parents_info($gf_id){
		
		$Query = 'select 
if(fr.nic = "" or fr.nic is null, "-", fr.nic) as CNIC,
if(fr.gf_id = "" or fr.gf_id is null, "-", fr.gf_id ) Gf_id,
ifnull( fr.name , "-") as Name,
if(fr.first_name = "" or fr.first_name is null, "-", fr.first_name) as First_name,
if(fr.last_name = "" or fr.last_name is null, "-", fr.last_name) as Last_name,
if(fr.abridged_name = "" or fr.abridged_name is null, "-", fr.abridged_name) as Abridged_name,
if(fr.call_name = "" or fr.call_name is null, "-", fr.call_name) as Call_name,
if(fr.nationality_1 = "" or fr.nationality_1 is null, "-", fr.nationality_1) as Nationality_1,
if(fr.nationality_2 = "" or fr.nationality_2 is null, "-", fr.nationality_2) as Nationality_2,
if(fr.mobile_phone = "" or fr.mobile_phone is null, "-", fr.mobile_phone) as Mobile_phone,
if(fr.email = "" or fr.email is null, "-", fr.email) as Email,
if(fr.marital_status = "" or fr.marital_status is null, "-", fr.marital_status) as Marital_status,
if(fr.parent_type = "" or fr.parent_type is null, "-", fr.parent_type) as Parent_type,
if(fr.yod = "" or fr.yod is null, "-", fr.yod) as Yod,
if(fr.speciality = "" or fr.speciality is null, "-", fr.speciality) as Speciality,
if(fr.profession = "" or fr.profession is null, "-", fr.profession) as Profession
from atif.student_family_record as fr
where fr.gf_id='.$gf_id.'';

		return  DB::connection( 'mysql_att_lo' )->select($Query);	
	}
	
	/**********************************************************************
    * Calling Student Parents Job Information
    * @input: 	Family id gf_id
    * Description:
    * 		Will display parents Job information
    ***********************************************************************/
	public function student_family_work_detail($gf_id){
		$Query = 'select if(fw.gf_id = "" or fw.gf_id is null, "-", fw.gf_id) as Gf_id,
		if(fw.organization = "" or fw.organization is null, "-", fw.organization) as Organization,
		if(fw.department = "" or fw.department is null, "-", fw.department) as Department,
		if(fw.designation = "" or fw.designation is null, "-", fw.designation) as Designation,
		if(fw.work_from_year = "" or fw.work_from_year is null, "-", fw.work_from_year) as Work_from_year,
		if(fw.phone = "" or fw.phone is null, "-", fw.phone) as Phone,
		if(fw.address = "" or fw.address is null, "-", fw.address) as Address,
		if(fw.sub_region = "" or fw.sub_region is null, "-", fw.sub_region) as Sub_region,
		if(fw.region = "" or fw.region is null, "-", fw.region) as Region,
		if(fw.city = "" or fw.city is null, "-", fw.city) as City,
		if(fw.state = "" or fw.state is null, "-", fw.state) as State,
		if(fw.country = "" or fw.country is null, "-", fw.country) as Country
		from atif.student_family_work_detail as fw
		where fw.gf_id='.$gf_id.'';
		return DB::connection( 'mysql_att_lo' )->select($Query);
	}
	
	public function Create_Badge($table,$data){
		$id = DB::connection('Badge_DB')->table($table)->insertGetId( $data );
		return $id;
	}
	
	function Get_Badge($Badge_id){
		$Query = "SELECT * FROM gs_badges.badges as bg where bg.ID=".$Badge_id." AND bg.record_deleted=0";
		
		//return DB::connection( 'Badge_DB' )->table("badges")->select($Query);
		return DB::connection( 'Badge_DB' )->select($Query);
		//return DB::connection( 'Badge_DB' )->table("badges")->where('ID', $Badge_id)->first();
	}
	
	function Grade_Section_Students($Grade_id,$Section_id){
		$Query = "select cl.id, cl.abridged_name, cl.gs_id from atif.class_list as cl 
		where cl.grade_id=".$Grade_id." and cl.section_id=".$Section_id."
		AND ( cl.std_status_category = 'Student' and cl.std_status_category != 'Out' )
		group by cl.gs_id order by cl.grade_id, cl.section_id, cl.call_name";
		return DB::connection( 'default_Atif' )->select($Query);
		
	}
	
	function Get_Assinged_Badge($Badge_id){
		return DB::connection( 'Badge_DB' )->table("bedge_student")->where('bedge_id', $Badge_id)->get();
		
	}
	
	
	function Get_Assinged_Badge2($Badge_id){
		return DB::connection( 'Badge_DB' )->table("bedge_student")->where( ['bedge_id', $Badge_id],["record_deleted"=> 0 ])->get();
		
	}
	
	function Update_Badge($table,$data, $ID){
		return DB::connection( 'Badge_DB' )->table($table) ->where( $ID )->update( $data );
	}
	
	
	function Grade_10Days_Position($Grade_id){
		$Query = "select
cl.grade_name as Grade_Name,

cl.section_dname as Section_name,

count( cl.abridged_name) as Grade_Section_Total_last10Days,

count( statt.id ) as Last10Days_Total_Present

#cl.abridged_name as Student_Name,
#statt.date as Today_Date,
#statt.time as Today_Time

from atif.class_list as cl
left join(
select st.*
from atif_attendance.student_attendance as st 
where st.date >= (select atdd.date as Start_date from ( 
select
cal.*
from atif_attendance.attendance_calendar as cal
where cal.is_on =1
and cal.ii=1 
and cal.date <= curdate() and cal.date >='2017-08-01'
order by cal.id desc
limit 10 ) as atdd
order by atdd.date asc
limit 1)
) as statt
on statt.gs_id= cl.gs_id
where cl.grade_id=5 and cl.section_id in ( select cl.section_id
from atif.class_list as cl 
where cl.grade_id=5
group by cl.section_dname )
group by cl.section_id
order by cl.section_dname";
	}
	
	public function GetCurrentInfo($user_id)
	{
		$Query = "select * from atif.staff_registered as sr where sr.user_id=".$user_id." and sr.is_active=1 and sr.is_posted=1 and sr.record_deleted=0";
		return DB::connection( 'default_Atif' )->select($Query);
	

	}
	
	
	public function getfif($gf_id){
	
		$Query ="select
		sr.gs_id, sr.official_name, sr.abridged_name, sr.call_name, sr.DOB, sr.religion, 
		sr.year_of_admission, sr.grade_of_admission, sr.year_of_admission, sr.gf_id, sr.gfid, 
		sr.siblings_position,dd.siblings_total,
		sr.active_siblings_position,sr.siblings_total,
		IFNULL(sr.grade_name,'') AS grade_name, 
		IFNULL(sr.section_name,'') AS section_name, IFNULL(sr.generation_of,'') AS generation_of, 
		sr.gr_no as photo_id,sr.house_name,sr.std_status_code,
		father.name as father_name, mother.name as mother_name
		from atif.class_list as sr
		left join (select gf_id, name from atif.student_family_record where parent_type=1) as father
		on father.gf_id = sr.gf_id
		left join (select gf_id, name from atif.student_family_record where parent_type=2) as mother
		on mother.gf_id = sr.gf_id
		
		left join( 
			select * from atif.student_siblings_total_active as s where s.gf_id=".$gf_id." ) as dd
			on dd.gf_id=sr.gf_id 


		where sr.gf_id = ".$gf_id." order by sr.dob";
		
		
		return DB::connection( 'default_Atif' )->select($Query);
	}
	
	
	
	function Student_Stories($Student_id, $User_Role,$Gs_id,$Acadmic )
	{
	/*	$Stories_logs = "select * from ( select 
'User' as Log_Type,
lc.student_id as Student_id,
lc.comments as Comments_log,
lc.tag as Category,
sr.abridged_name as Fourth_column,

from_unixtime(lc.created) as Dated,
lc.register_by as User_id,
lc.modified as Updated_on,
lc.modified_by as Updated_by
from atif_student_log.log_comments as lc 

inner join atif.staff_registered as sr
on sr.id=lc.register_by

where lc.tag='".$User_Role."' and lc.student_id=".$Student_id." ";

if($User_Role=='SIS'){
$Stories_logs .= " union all
select 
'SIS' as Log_Type,
sh.student_id as Student_id,
'House Changes' as Comments_log,
'House Changes' as Category,
house.short_name as Fourth_column,
from_unixtime(sh.created) as Dated,
sh.register_by as User_id,
sh.modified as Updated_on,
sh.modified_by as Updated_by

from atif_student_log.log_student_house as sh
inner join atif.class_list as cl on cl.id=sh.student_id
inner join atif._house as house on house.id=sh.old_house_id
where sh.student_id=".$Student_id." ";

$Stories_logs .= "union
select 
'SIS' as Log_Type,
ss.student_id as Student_id,
ss.old_comments as Comments_log,
ss.academic_session_id as New_Section_id,
ss.old_section_id as Old_Section_id,
from_unixtime(ss.created) as Dated,
ss.register_by as User_id,
ss.modified as Updated_on,
ss.modified_by as Updated_by
from atif_student_log.log_student_section as ss
where ss.student_id=".$Student_id." ";


$Stories_logs .= "union
select 
'SIS' as Log_Type,
st.student_id as Student_id,
CONCAT( 'Status Change >', st.old_comments ) as Comments_log,
st.old_status_id as New_Section_id,
'' as Old_Section_id,
from_unixtime(st.created) as Dated,
st.register_by as User_id,
st.modified as Updated_on,
st.modified_by as Updated_by
from atif_student_log.log_student_status as st
where st.student_id=".$Student_id." ";
}

if( $User_Role == 'SIS' ){
$Stories_logs .= "union
select 
'SIS' as Log_Type,
'' as Student_id,
sms.message as Comments_log,
'System Generated SMS' as New_Section_id,
'System Generated SMS' as Old_Section_id,
(sms.created) as Dated,
'' as User_id,
'' as Updated_on,
'' as Updated_by

from atif_sms.sms_api_log as sms
where sms.mobile_phone=(
select replace(fr.mobile_phone,'-','') mobile from atif.student_family_record as fr
where fr.gf_id=( select cl.gf_id from atif.class_list as cl where cl.id=".$Student_id." )
and fr.mobile_phone != ''
limit 1 ) and sms.message not like '%Mr%' and sms.message not like '%Ms%' ";
}

if( $User_Role == 'SIS' || $User_Role == 'Accounts' ){
$Stories_logs .= "union 
select 
'Accounts' as Log_Type,
con.student_id as Student_id,
CONCAT( 'Concession Type:', con_type.dname, '\n Percentage: ',con.percentage,'\n Amount: ', con.amount, '\n Active from: ', con.active_from) as Comments_log,
'System Generated SMS' as New_Section_id,
'System Generated SMS' as Old_Section_id,
from_unixtime(con.created) as Dated,
con.register_by as User_id,
con.modified as Updated_on,
con.modified_by as Updated_by
from atif_student_log.log_student_concession as con
inner join  atif_fee.concession_type_parameter as con_type
where con.student_id=".$Student_id." and con.is_active=1";
}
$Stories_logs .= ") as DATA
order by Dated desc";
*/

$Stories_logs ="SELECT *
FROM (
SELECT 'User Generated' AS Log_Type, lc.student_id AS Student_id, lc.comments AS Comments_log, lc.tag AS Category,
'' as Fourth_column,
sr.abridged_name as Register_by_name,
sr.employee_id as Register_by_photo,
sr.gender as Register_by_gender,
from_unixtime(lc.created) AS Dated, 
lc.register_by AS User_id, lc.modified AS Updated_on, lc.modified_by AS Updated_by 
FROM atif_student_log.log_comments AS lc 
inner join atif.staff_registered as sr 
on sr.user_id=lc.register_by 
WHERE lc.student_id=".$Student_id." 

 
UNION 
SELECT 'System Generated' AS Log_Type, sh.student_id AS Student_id, 'House Changes' AS Comments_log, 
'SIS' AS Category, house.short_name AS Fourth_column,
sr.abridged_name as Register_by_name,
sr.employee_id as Register_by_photo,
sr.gender as Register_by_gender,
 from_unixtime(sh.created) AS Dated, sh.register_by AS User_id, sh.modified AS Updated_on, sh.modified_by AS Updated_by 
FROM atif_student_log.log_student_house AS sh 
INNER JOIN atif.class_list AS cl ON cl.id=sh.student_id  
INNER JOIN atif._house AS house ON house.id=sh.old_house_id 

inner join atif.staff_registered as sr 
on sr.id=sh.register_by 

WHERE sh.student_id=".$Student_id."  
 
UNION 
SELECT 'System Generated' AS Log_Type, ss.student_id AS Student_id, 'Section Change' AS Comments_log, 
'SIS' AS Category,
ss.old_section_id AS Old_Section_id,
sr.abridged_name as Register_by_name,
sr.employee_id as Register_by_photo,
sr.gender as Register_by_gender,
from_unixtime(ss.created) AS Dated, ss.register_by AS User_id, ss.modified AS Updated_on, ss.modified_by AS Updated_by 
FROM atif_student_log.log_student_section AS ss 
inner join atif.staff_registered as sr 
on sr.id=ss.register_by 
WHERE ss.student_id=".$Student_id."  

 
UNION 
SELECT 'System Generated' AS Log_Type, st.student_id AS Student_id,  
CONCAT('Status Change >', st.old_comments) AS Comments_log, 
'SIS' AS Category, '' AS Old_Section_id, 
sr.abridged_name as Register_by_name,
sr.employee_id as Register_by_photo,
sr.gender as Register_by_gender,
from_unixtime(st.created) AS Dated, st.register_by AS User_id, st.modified AS Updated_on, st.modified_by AS Updated_by 
FROM atif_student_log.log_student_status AS st 
 
inner join atif.staff_registered as sr 
on sr.id=st.register_by 
 
WHERE st.student_id=".$Student_id."  
 

UNION 
SELECT 'System Generated' AS Log_Type, '' AS Student_id, sms.message AS Comments_log, 
'SMS' AS Category, '' AS Old_Section_id, 
'Text Message' as Register_by_name,
'gs_logo' as Register_by_photo,
'' as Register_by_gender,
sms.created AS Dated, '' AS User_id, '' AS Updated_on, '' AS Updated_by 
FROM atif_sms.sms_api_log AS sms 
WHERE sms.mobile_phone=( 
SELECT
REPLACE(fr.mobile_phone,'-','') mobile 
FROM atif.student_family_record AS fr 
WHERE fr.gf_id=( 
SELECT cl.gf_id 
FROM atif.class_list AS cl 
WHERE cl.id=".$Student_id.") AND fr.mobile_phone != '' 
LIMIT 1) AND sms.message NOT LIKE '%Mr%' AND sms.message NOT LIKE '%Ms%'  

 
UNION 
SELECT 'System Generated' AS Log_Type, con.student_id AS Student_id, 
 CONCAT('Concession Type:', con_type.dname, ' Percentage: ', 
 con.percentage,' Amount: ', con.amount, ' Active from: ', con.active_from) AS Comments_log,
  'Accounts' AS Category, '' AS Old_Section_id, 
  sr.abridged_name as Register_by_name,
sr.employee_id as Register_by_photo,
'' as Register_by_gender,
  from_unixtime(con.created) AS Dated, con.register_by AS User_id, con.modified AS Updated_on, con.modified_by AS Updated_by 
FROM atif_student_log.log_student_concession AS con 
INNER JOIN atif_fee.concession_type_parameter AS con_type 
inner join atif.staff_registered as sr 
on sr.id=con.register_by 
WHERE con.student_id=".$Student_id." AND con.is_active=1 

 
union  
select
'System Generated' AS Log_Type,
att.id AS Student_id,
concat( 'Tap IN on <u>', DATE_FORMAT(att.date, '%a %b %e, %Y' ) , '</u> <br /> at <u>', TIME_FORMAT(att.time, '%h:%i %p'),'</u>' ) AS Comments_log,
'Attendance' AS Category,
'' AS Old_Section_id,
if( att.register_by=0,'Attendance Tap IN',
 concat( 'Modified By ',( select att_sr.abridged_name from atif.staff_registered as att_sr where att_sr.user_id=att.register_by )
) ) as  Register_by_name,

if( att.register_by=0,'gs_logo',
( select att_sr.employee_id from atif.staff_registered as att_sr where att_sr.user_id=att.register_by )
) as  Register_by_photo,
'' as Register_by_gender,
FROM_UNIXTIME( UNIX_TIMESTAMP (
STR_TO_DATE(concat( att.date, ' ', att.time),'%Y-%m-%d %H:%i:%s' ) ) )as Dated,
'' AS User_id,
'' AS Updated_on,
'' AS Updated_by 
from atif_attendance.student_attendance as att 
where 
att.gs_id='".$Gs_id."' 
and att.date >= ( select ad.start_date as Att_Starting_From from atif.class_list as cl  
inner join atif._academic_session as ad 
on ad.id=cl.academic_session_id 
where cl.id=".$Student_id." ) 


union 
 
 select
'System Generated' AS Log_Type,
att.id AS Student_id,

concat( 'Tap Out on <u>', DATE_FORMAT(att.date, '%a %b %e, %Y' ) , '</u> at <u>', TIME_FORMAT(att.time, '%h:%i %p'),'</u>' ) AS Comments_log,
'Attendance' AS Category,
'' AS Old_Section_id,
if( att.register_by=0,'Attendance Tap Out',
 concat( 'Modified By ',( select att_sr.abridged_name from atif.staff_registered as att_sr where att_sr.user_id=att.register_by )
) ) as  Register_by_name,

if( att.register_by=0,'gs_logo',
( select att_sr.employee_id from atif.staff_registered as att_sr where att_sr.user_id=att.register_by )
) as  Register_by_photo,
'' as Register_by_gender,
FROM_UNIXTIME( UNIX_TIMESTAMP (
STR_TO_DATE(concat( att.date, ' ', att.time),'%Y-%m-%d %H:%i:%s' ) ) )as Dated,
'' AS User_id,
'' AS Updated_on,
'' AS Updated_by 
from atif_attendance.student_attendance_out as att 
where 
att.gs_id='".$Gs_id."' 
and att.date >= ( select ad.start_date as Att_Starting_From from atif.class_list as cl 
inner join atif._academic_session as ad
on ad.id=cl.academic_session_id
where cl.id=".$Student_id." ) 

union 
SELECT 
'System Generated' AS Log_Type, 
'' AS Student_id,

if( acc.name != '', concat( 'Case Active ' , acc.name ), concat( ' Close Case Name ', accl.name ) ) AS Comments_log,

'Active Case' AS Category,
ac.category_id AS Old_Section_id,
sr.abridged_name as Register_by_name,
sr.employee_id as Register_by_photo,
sr.gender as Register_by_gender,
from_unixtime(ac.created) AS Dated, 
ac.register_by AS User_id, 
ac.modified AS Updated_on, 
ac.modified_by AS Updated_by

FROM atif_attendance.activecase_case ac
left join atif_attendance.activecase_category acc on
acc.id = ac.category_id
left join atif_attendance.activecase_category accl on
accl.id = ac.close_category_id

left join
atif.staff_registered as sr 
on sr.user_id = ac.register_by
where ac.gs_id = '".$Gs_id."' 



	UNION
						select 

						'Etab Marks' AS Log_Type,
						mar.student_id  AS Student_id, 

						CONCAT( 
						' Grade: ', g.dname, 
						' <br />  Subject_name: ', sub.dname,
						' <br /> Category_Name: ', cat.dname,
						' <br />  Assessment_Type: ', asType.name,
						' <br /> Assessment On: ', dt.title,
						' <br /> Obtained_Marks: ', mar.marks_obtained,
						' <br /> Max_Marks: ', dt.max_marks
						) AS Comments_log, 
						'Etab' AS Category,
						'' AS Old_Section_id, 
						sr.abridged_name as Register_by_name,
						sr.employee_id as Register_by_photo,
						sr.gender as Register_by_gender,
						from_unixtime(mar.created) AS Dated, 
						mar.register_by AS User_id, 
						mar.modified AS Updated_on,
						mar.modified_by AS Updated_by
						from atif_subject_marks.assessment_marks as mar
						inner join atif.staff_registered as sr
						on sr.id=mar.register_by 
						inner join atif_subject_grade.assessment_detail as dt
						on dt.id=mar.assessment_detail_id
						inner join atif_assessment.gradesubjectass as grdsubass
						on grdsubass.id = dt.assessment_in_grade_id
						inner join atif_assessment.assessment_category as cat
						on cat.id=grdsubass.assessment_category_id
						inner join atif_subject.programmesetup as pro
						on pro.id = grdsubass.program_id
						inner join atif_subject.subject as sub
						on sub.id=pro.subjects
						inner join atif._grade as g
						on g.id = pro.gradeID
						inner join atif_assessment.assessment_type as asType
						on asType.id=grdsubass.assessment_type_id
						where mar.student_id=".$Student_id." and dt.ignore=0
						
	


union
SELECT
'System Generated' AS Log_Type,
fb.student_id AS Student_id,
CONCAT( 
	'Bill Type ',fbtp.name,
	' <br /> Bill Title ',fb.bill_title,
	' <br /> Bill Issue Date ',DATE_FORMAT(fb.bill_issue_date, '%a %b %e, %Y' ),
	' <br /> Bill Due Date ',DATE_FORMAT(fb.bill_due_date, '%a %b %e, %Y' ),
	' <br /> Bill Amount  ',fb.total_payable ) as Comments_log,
'Accounts' AS Category,
'' AS Old_Section_id,
'Fee Bill Generated ' as Register_by_name,
'gs_logo' as Register_by_photo,
'' as Register_by_gender,
from_unixtime(fb.created) AS Dated, 
fb.register_by AS User_id,
fb.modified AS Updated_on, 
fb.modified_by AS Updated_by 
from atif_fee_student.fee_bill as fb
#left join atif_fee_student.fee_bill_received as fbr
#on ( fbr.fee_bill_id = fb.id )
left join atif_fee_student.fee_bill_type_parameter as fbtp
on fbtp.id=fb.fee_bill_type_id
where fb.student_id=".$Student_id."
and fb.academic_session_id=".$Acadmic."

union
SELECT 'System Generated' AS Log_Type,
fb.student_id AS Student_id,

CONCAT( 
	'Bill Type ',fbtp.name,
	' <br /> Bill Title ',fb.bill_title,
	' <br /> Received Date ',DATE_FORMAT(fbr.received_date, '%a %b %e, %Y' ),
	' <br /> Received Amount ', fbr.received_amount ,
	' <br /> Received Mode ', fbr.received_payment_mode,
	' <br /> Received Branch ', fbr.received_branch
	) as Comments_log,

'Accounts' AS Category,
'' AS Old_Section_id,
'Fee Bill Received ' as Register_by_name,
'gs_logo' as Register_by_photo,
'' as Register_by_gender,
from_unixtime(fbr.created) AS Dated, 
fb.register_by AS User_id,
fb.modified AS Updated_on, 
fb.modified_by AS Updated_by 
from atif_fee_student.fee_bill as fb
left join atif_fee_student.fee_bill_received as fbr
on ( fbr.fee_bill_id = fb.id )
left join atif_fee_student.fee_bill_type_parameter as fbtp
on fbtp.id=fb.fee_bill_type_id
where fb.student_id=".$Student_id."
and fb.academic_session_id=".$Acadmic."



union
select 


'System Generated' AS Log_Type,
stt.id AS Student_id,
CONCAT(  'Attendance Confirmed By CT ', from_unixtime(vt.created, '%a %b %e, %Y' ),
' <br /> Date ', from_unixtime(vt.created, '%a %b %e, %Y' )
) as Comments_log,
	

'TPA Confirmed ' AS Category,
'' AS Old_Section_id,
stt.abridged_name as Register_by_name,
stt.employee_id as Register_by_photo,
stt.gender as Register_by_gender,
from_unixtime(vt.created) AS Dated, 
stt.user_id AS User_id,
vt.modified AS Updated_on,
vt.modified_by AS Updated_by 


 from atif_attendance.attendance_verification_teacher  as vt
 
 
left join atif.staff_registered as stt
on stt.user_id=vt.user_id


where vt.date > date('2017-08-01') 
and vt.user_id=( 
select st.user_id
from atif.staff_registered as st
where st.id=( 
select Roles.staff_id from atif.class_list cl 
left join(
	select role.* from `atif_role`.`role_in_org_view` as  `role`
) as Roles
on (Roles.grade_id=cl.grade_id and Roles.section_id=cl.section_id)
where cl.gs_id='".$Gs_id."' and (   Roles.`type_id` = 15 or Roles.`type_id` = 16 ) 
and Roles.staff_id != ''
limit 1

)

) 
group by vt.date


)

AS DATA


where Dated >= ( CURDATE() - INTERVAL 90 DAY )  

ORDER BY Dated DESC";
		//echo $Stories_logs; exit;
		return DB::connection( 'default_Atif' )->select($Stories_logs);
	}
	
	protected $dbCon = 'mysql_StudentLog';
	public function Set_Comments($table,$data){
	$id = DB::connection($this->dbCon)->table($table)->insertGetId( $data );
	return $id;
	}
	
}
