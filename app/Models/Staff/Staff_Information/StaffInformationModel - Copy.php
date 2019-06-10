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

class StaffInformationModel extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'staff_registered';
    protected $dbCon = 'mysql';




    /**********************************************************************
    * Calling Staff Info 
    * @input: 	User-ID
    * @output: 	Staff Information Fields
    ***********************************************************************/
    public function get_Staff_Info($userID){
	    $query = "select
	    ou.id, sr.employee_id as photo_id, sr.name_code, sr.abridged_name, sr.gender, ou.email, sr.gt_id, sr.id as staff_id,
	    sr.c_topline, sr.c_bottomline, sr.name, sr.nic, if(sr.gender = 'M', 'Male', 'Female') as staff_gender, DATE_FORMAT(sr.dob, '%d-%M-%Y') as dob,
	    sr.status_code, sr.mobile_phone, IF(sr.land_line='0000-0000000', '', sr.land_line) as land_line, CONCAT(ou.email, '@generations.edu.pk') as full_email,
	    ct.apartment_no, ct.building_name, ct.plot_no, ct.street_name, srg.name as sub_region, rg.name as region, ct.city, ct.country
	    from atif_gs_sims.users as nu
	    left join (select
	        if(email='admin', 'a.naseem' , email) as email, ou.id
	        from
	            (select 
	            SUBSTRING(ou.email, 1, LOCATE('@',ou.email)-1) as email, ou.id
	            from atif.users as ou) as ou) as ou
	            on ou.email = SUBSTRING(nu.email, 1, LOCATE('@',nu.email)-1)
	    left join atif.staff_registered as sr
	        on sr.user_id = ou.id
	    left join atif.staff_contact_info as ct
	    	on ct.staff_id = sr.id
	    left join atif._region as rg
	    	on rg.id = ct.region
	    left join atif._region_sub as srg
	   		on srg.id = ct.sub_region
	    where nu.id = " . $userID . " limit 1";
	    $user['info'] = DB::connection($this->dbCon)->select($query);
	    $pic = $this->get_Staff_Pic($user['info'][0]->photo_id, $user['info'][0]->gender);
	    $user['photo500'] = $pic['photo500'];
	    $user['photo150'] = $pic['photo150'];

		return $user;
	}




	/**********************************************************************
    * Calling Staff Info 
    * @input: 
    * @output: 	Staff Information Fields
    ***********************************************************************/
    public function get_Staff_List(){

	    $query = "select
	    sr.id as staff_id, sr.employee_id as photo_id, sr.gt_id, sr.name, sr.name_code, sr.abridged_name, sr.nic, sr.gender, tl.title as staff_title,
	    sr.dob, sr.doj, SUBSTRING(sr.gg_id, 1, LOCATE('@',sr.gg_id)-1) as email, IF(sr.branch_id=1, 'North', 'South') as campus,
	    sr.mobile_phone, sr.staff_category, sr.c_topline, sr.c_bottomline, st.code as status_code, st.name as status_name, MID(st.code, 3, 1) as status_name_code, ttp.name as tt_profile_name, CONCAT(st.code, ': ', st.name) as status_description,
	    if(atd.time is null, 'Absent', 'On Time') as atd_titles,

	     if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'In Buffer', 'No profile assigned'  ))))) as atd_title,
		  
		 

	    if(atd.time is null, 'awaited', concat('at ', TIME_FORMAT(atd.time, '%h:%i %p'))) as atd_content,

	    if(atd.time is null, 'AbsentIcon.png', 'OnTimeicon.png') as atd_icons,

	       if(WEEKDAY(date(curdate())) = 5  and tt.sat_working=1,
	    if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'WaitingIcon.png',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'AbsentIcon.png',
	    
	    
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'OnTimeicon.png',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'LateIcon.png',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBufferIcon.png', 'WaitingIcon.png'  )))))
		  
	    ,

	    if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'WaitingIcon.png',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'AbsentIcon.png',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'OnTimeicon.png',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'LateIcon.png',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBufferIcon.png', 'WaitingIcon.png'  )))))) as atd_icon,
		  

if(WEEKDAY(date(curdate())) = 5  and tt.sat_working=1,

if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On_Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBuffer', ''  ))))),


if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On_Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBuffer', ''  )))))) as Time_Checked



	    from atif.staff_registered as sr
	    left join atif._title_person as tl on tl.id = sr.title_person_id
	    left join atif._staffstatus as st on st.id = sr.staff_status
	    
	    left join 
		 	(select atd.staff_id, min(atd.time) as time 
			 from atif_attendance_staff.staff_attendance_in as atd 
			 where atd.date = curdate()
			 and (atd.location_id = 3 or atd.location_id = 4 or atd.location_id=18)
			 group by atd.staff_id
			) as atd on atd.staff_id = sr.id
		left join atif_gs_events.tt_profile_time_staff as tt on tt.staff_id = sr.id
		left join atif_gs_events.tt_profile as ttp on ttp.id = tt.profile_id
		
left join atif_gs_events.weekly_time_sheet as wts on ( wts.staff_id = sr.id and wts.date = curdate() )
		
		 	
		 	
		 	
	    where sr.is_active = 1 and sr.is_posted = 1 and sr.record_deleted = 0 
	    
	    group by sr.id
	    order by sr.abridged_name";
	    $staff = DB::connection($this->dbCon)->select($query);

	    $i = 0;
	    foreach ($staff as $u) {
		    $pic = $this->get_Staff_Pic($u->photo_id, $u->gender);
		    $staff[$i]->photo500 = $pic['photo500'];
		    $staff[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }

	    
		return $staff;
	}












	/**********************************************************************
    * Staff Information 
    * Author: 	Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input: 	Staff ID
    * @output: 	Staff Information Fields
    ***********************************************************************/
	public function getStaffInformation($staffID){

		$query = "select 
	    sr.id as staff_id, sr.employee_id as photo_id, sr.gt_id, sr.name, sr.name_code, sr.father_name as fathername,sr.spouse_name as spousename, sr.abridged_name,sr.leave_balance, sr.nic, sr.gender, tl.title as staff_title,
	    DATE_FORMAT(sr.dob, '%Y-%m-%d') as dob, sr.doj, sr.gg_id as email, IF(sr.branch_id=1, 'North', 'South') as campus,
	    sr.mobile_phone, sr.land_line, sr.staff_category, sr.c_topline, sr.c_bottomline, st.code as status_code, st.name as staff_status_name,
	    if(sup.religion=1 or sup.religion is null, 'Muslim', 'Non-Muslim') as religion, sup.emailpersonal, sup.nationality,
	    if(sup.employment_status=1, 'Married', if(sup.employment_status=2, 'Single', if(sup.employment_status=3, 'Divorced', if(sup.employment_status=4, 'Widow', '')))) as marital_status,
	    cnt.apartment_no, cnt.building_name, cnt.plot_no, cnt.street_name, sub_region.name as sub_region,sub_region.id as sub_region_id, region.name as region,region.id as region_id,sr.dob as date_of_birth
	    from atif.staff_registered as sr
	    left join atif._title_person as tl
	    	on tl.id = sr.title_person_id
	    left join atif._staffstatus as st
	    	on st.id = sr.staff_status
	    left join atif.staff_Registered_supporting as sup
	    	on sup.staff_id = sr.id
	    left join atif.staff_contact_info as cnt
	    	on cnt.staff_id = sr.id
	    left join atif._region as region
	    	on region.id = cnt.region
	    left join atif._region_sub as sub_region
	    	on sub_region.id = cnt.sub_region
	    where (sr.id = $staffID)
	    AND (sr.is_active = 1 and sr.is_posted = 1 and sr.record_deleted = 0)
	    limit 1";

		$staff = DB::connection($this->dbCon)->select($query);

		$i = 0;
	    foreach ($staff as $u) {
		    $pic = $this->get_Staff_Pic($u->photo_id, $u->gender);
		    $staff[$i]->photo500 = $pic['photo500'];
		    $staff[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }

		return $staff;
	}











	/**********************************************************************
    * Staff Information - TIF B
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  JSON encoded Staff TIF-B Fields
    * Date:     Jul 26, 2017 (Wed)
    ***********************************************************************/
	public function getStaffTIFB($staffID){

		$query = "select
	    sr.id as staff_id, sr.employee_id as photo_id, sr.gt_id, sr.name, sr.name_code, sr.abridged_name, sr.nic, sr.gender, tl.title as staff_title,
	    sr.dob, sr.doj, SUBSTRING(sr.gg_id, 1, LOCATE('@',sr.gg_id)-1) as email, IF(sr.branch_id=1, 'North', 'South') as campus,
	    sr.mobile_phone, sr.staff_category, sr.c_topline, sr.c_bottomline, st.code as status_code, st.name as staff_status_name
	    from atif.staff_registered as sr
	    left join atif._title_person as tl
	    	on tl.id = sr.title_person_id
	    left join atif._staffstatus as st
	    	on st.id = sr.staff_status
	    where (sr.id = $staffID)
	    AND (sr.is_active = 1 and sr.is_posted = 1 and sr.record_deleted = 0)";

		$staff = DB::connection($this->dbCon)->select($query);
		
		$i = 0;
	    foreach ($staff as $u) {
		    $pic = $this->get_Staff_Pic($u->photo_id, $u->gender);
		    $staff[$i]->photo500 = $pic['photo500'];
		    $staff[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }

		return $staff;
	}












	/**********************************************************************
    * Calling Staff Pic 500px and 150px 
    * @input: 	Staff PhotoID and Staff Gender
    * @output: 	Staff Pic Paths
    * Description:
    * 		If no picture found then get blankPic according to gender
    ***********************************************************************/
	public function get_Staff_Pic($PhotoID, $Gender){
		if (!file_exists(STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE)){
	        if($Gender == 'M'){
	            $PhotoID = 'male';
	        }else if($Gender == 'F'){
	            $PhotoID = 'female';
	        }
	    }
	    $user['photo500'] = STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE;
	    $user['photo150'] = STAFF_PIC_150 . $PhotoID . STAFF_PIC150_TYPE;


	    return $user;
	}
	/**********************************************************************
    * Calling Student Pic 500px and 150px 
    * @input: 	Student PhotoID
    * @output: 	Student Pic Paths
    * Description:
    * 		If no picture found then get blankPic
    ***********************************************************************/
	public function get_Student_Pic($PhotoID){
		if (!file_exists(STUDENT_PIC_500 . $PhotoID . PIC500_TYPE)){
            $PhotoID = 'NoPic';
	    }
	    $user['photo500'] = STUDENT_PIC_500 . $PhotoID . PIC500_TYPE;
	    $user['photo150'] = STUDENT_PIC_150 . $PhotoID . PIC150_TYPE;

	    return $user;
	}























	/**********************************************************************
    * Staff Information - TIF B
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, Basic Information
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function get_StaffInfo($GTID)
    {
        $query="select
        ro.id as role_id, sr.id as staff_id, sr.user_id, ro.roleCode,
        sr.name, sr.name_code, sr.employee_id as photo_id, sr.gender, sr.abridged_name,if(sr.branch_id = 1,'North','South') as branch,  
        SUBSTR(sr.gg_id, 1, POSITION('@' IN sr.gg_id)-1) as gg_id,
        sr.doj,sr.c_topline, sr.c_bottomline, st.code as staff_status_code,


        ro.gp_id, 

        rd.dname as domain, rd.sname as domain_sname, rd.code as domain_code, rd.color_hex as domain_color,
        rt.dname as role, rt.sname as role_sname, rt.code as role_code, rt.color_hex as role_color,
        rc.dname as catetory, rc.sname as category_sname, rc.code as category_code, rc.color_hex as category_color, rc.position as reporting_line,

        ro.role_title_tl, ro.role_title_bl, ro.total_reportee, ro.total_staff_members,

        ro.wing_id, ro.grade_id, ro.section_id, ro.subject_id, ro.is_assistant, IF(ro.is_transparent=2, 'TRP', 'OPQ') as report_ok,
        IF(ro.id=ro.fundamentalRole, ro.pm_report_to, IF(ro.fundamentalRole=0, ro.pm_report_to, ro.fundamentalRole)) as pm_report_to,
        ro.sc_report_to, ro.fundamentalRole

        from atif.staff_registered as sr
        left join atif_role_org.role_position as ro
            on ro.staff_id = sr.id
        left join atif._staffstatus as st
            on st.id = sr.staff_status

        left join atif_role_org.role_domain as rd
            on rd.id = ro.org_domain_id
        left join atif_role_org.role_type as rt
            on rt.id = ro.role_type_id
        left join atif_role_org.role_category as rc
            on rc.id = ro.staff_role_category_id

        where sr.gt_id = '".$GTID."' and ro.record_deleted=0

        order by ro.fundamentalRole desc;";


        $staff = DB::connection($this->dbCon)->select($query);
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray(); 
        return $staff;
    }






    /**********************************************************************
    * Staff Information - TIF B - TT Profile
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, Staff Time Profile
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function getStaff_TTProfile($GTID)
    {
        $query="select
			tf.name as time_profile, tt.avg_week_hrs,
			tt.sat_hrs, tt.sat_working, tt.sat_off, IF(tt.ext_time='00:00:00', '-', tt.ext_time) as ext_time, tt.ext_frequency, ty.name as ty_name,tt.daily_relax_in,tt.monthly_relax_in,
			DATE_FORMAT(tt.ext_july, '%d-%b-%Y') as ext_july,
			TIME_FORMAT(tt.mon_in, '%h:%i %p') as mon_in, 
			TIME_FORMAT(tt.tue_in, '%h:%i %p') as tue_in, 
			TIME_FORMAT(tt.wed_in, '%h:%i %p') as wed_in,  
			TIME_FORMAT(tt.thu_in, '%h:%i %p') as thu_in, 
			TIME_FORMAT(tt.fri_in, '%h:%i %p') as fri_in, 
			TIME_FORMAT(tt.sat_in, '%h:%i %p') as sat_in, 
			TIME_FORMAT(tt.sun_in, '%h:%i %p') as sun_in,
			TIME_FORMAT(tt.mon_out, '%h:%i %p') as mon_out, 
			TIME_FORMAT(tt.tue_out, '%h:%i %p') as tue_out, 
			TIME_FORMAT(tt.wed_out, '%h:%i %p') as wed_out, 
			TIME_FORMAT(tt.thu_out, '%h:%i %p') as thu_out, 
			TIME_FORMAT(tt.fri_out, '%h:%i %p') as fri_out, 
			TIME_FORMAT(tt.sat_out, '%h:%i %p') as sat_out, 
			TIME_FORMAT(tt.sun_out, '%h:%i %p') as sun_out, 
			TIME_FORMAT(IF(tt.mon_in is not null, tt.mon_in,
				IF(tt.tue_in is not null, tt.tue_in,
				IF(tt.wed_in is not null, tt.wed_in,
				IF(tt.thu_in is not null, tt.thu_in,
				IF(tt.fri_in is not null, tt.fri_in,
				IF(tt.sat_in is not null, tt.sat_in,
				IF(tt.sun_in is not null, tt.sun_in, ''
				))))))), '%h:%i %p') as std_in,
			TIME_FORMAT(IF(tt.mon_out is not null, tt.mon_out,
				IF(tt.tue_out is not null, tt.tue_out,
				IF(tt.wed_out is not null, tt.wed_out,
				IF(tt.thu_out is not null, tt.thu_out,
				IF(tt.fri_out is not null, tt.fri_out,
				IF(tt.sat_out is not null, tt.sat_out,
				IF(tt.sun_out is not null, tt.sun_out, ''
				))))))), '%h:%i %p') as std_out
			from atif_gs_events.tt_profile_time_staff as tt
			left join atif_gs_events.tt_profile as tf
				on tf.id = tt.profile_id
			left join atif_gs_events.tt_profile_type as ty
				on ty.id = tf.profile_type_id
			left join atif.staff_registered as sr
				on sr.id = tt.staff_id
			where tt.record_deleted = 0
			and sr.gt_id = '".$GTID."'

			order by tt.id desc
			limit 1";


        $staff = DB::connection($this->dbCon)->select($query);
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }





    /**********************************************************************
    * Staff Information - TIF B - Staff Reporting Information
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, Staff Reporting Information
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function get_StaffReportingInfo($RoleID)
    {
        $query="select 
		ro.id as role_id, ro.gp_id, IF(ro.is_transparent =2, 'TRP', 'OPQ') as report_ok, ro.roleCode,
		rc.position as reporting_line,
		IFNULL(ro.role_title_tl, '  ') as role_title_tl, IFNULL(ro.role_title_bl, '  ') as role_title_bl,
		sr.id as staff_id, sr.c_topline, sr.c_bottomline, CONCAT('GT ' , sr.gt_id) AS gt_id, sr.name_code, sr.name, sr.abridged_name,
		IF(ro.id=ro.fundamentalRole, ro.pm_report_to, IF(ro.fundamentalRole=0, ro.pm_report_to, ro.fundamentalRole)) as pm_report_to,
		ro.sc_report_to, ro.fundamentalRole


		from atif_role_org.role_position as ro
		left join atif.staff_registered as sr
			on sr.id = ro.staff_id
		left join atif_role_org.role_category as rc
			on rc.id = ro.staff_role_category_id
			

		where ro.id = ".$RoleID." and ro.record_deleted=0";

		#$query="call `get_StaffReportingInfo`(".$RoleID.")";

        $staff = DB::connection($this->dbCon)->select($query);
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }






    /**********************************************************************
    * Staff Information - TIF B - Class Teacher Role
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff Role-ID, GT-ID
    * @output:  Staff TIF-B, Class Teacher Role
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function get_StaffReportingInfo_CLTRole($RoleID, $GTID)
    {
        $query="select 
		ro.id as role_id, ro.gp_id, IF(ro.is_transparent =2, 'TRP', 'OPQ') as report_ok, ro.roleCode,
		rc.position as reporting_line,
		IFNULL(ro.role_title_tl, '  ') as role_title_tl, IFNULL(ro.role_title_bl, '  ') as role_title_bl,
		sr.id as staff_id, 
		IF(sr.c_topline='', sbjRole.role_title_tl,sr.c_topline) as c_topline, 
		IF(sr.c_bottomline='', sbjRole.role_title_bl, sr.c_bottomline) AS c_bottomline,
		CONCAT('GT ' , sr.gt_id) AS gt_id, 
		
		IF(sr.name_code='',sbjRole.name_code, sr.name_code) as name_code, sr.name, 
		IF(sr.abridged_name='', sbjRole.abridged_name, sr.abridged_name) as abridged_name,
		
		IF(ro.id=ro.fundamentalRole, ro.pm_report_to, IF(ro.fundamentalRole=0, ro.pm_report_to, ro.fundamentalRole)) as pm_report_to,
		ro.sc_report_to, ro.fundamentalRole


		from atif_role_org.role_position as ro
		left join atif.staff_registered as sr
			on sr.id = ro.staff_id
		left join atif_role_org.role_category as rc
			on rc.id = ro.staff_role_category_id
			
		left join (select

		".$RoleID." as sbjRoleID, clt.blocks_per_week,
		IF(clt.teacher_type_id = 1, 'CLT', 'COT') as clt_type,
		CONCAT(gg.name, '-', ss.name) as class, clt.gp_id, st_gs.students,
		IFNULL(ro.role_title_tl, '  ') as role_title_tl, IFNULL(ro.role_title_bl, '  ') as role_title_bl,
		IFNULL(lt.abridged_name, '  ') as abridged_name, IFNULL(lt.name_code, '  ') as name_code

		from atif_role_matrix.role_class_teacher as clt
		left join atif.staff_registered as sr
			on sr.id = clt.staff_id
		left join atif._grade as gg
			on gg.id = clt.grade_id
		left join atif._section as ss
			on ss.id = clt.section_id
		left join atif_role_org.role_position as ro
			on  ro.grade_id = clt.grade_id
			and ro.role_title_tl like 'yt%'
		left join atif.staff_registered as lt
			on lt.id = ro.staff_id
		left join atif.school_strength_grade_section as st_gs
			on st_gs.grade_name = gg.name
			and st_gs.section_name = ss.name

		where sr.gt_id = '".$GTID."') as sbjRole
		on sbjRole.sbjRoleID = ro.id

		where ro.id = ".$RoleID." and ro.record_deleted=0";


        $staff = DB::connection($this->dbCon)->select($query);
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }





    /**********************************************************************
    * Staff Information - TIF B - Subject Teacher Role
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, Subject Teacher Role
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function get_StaffReportingInfo_SBJRole($GTID)
    {
        $query = "select
			0 as role_id, '' as gp_id, '' as report_ok, '' as roleCode, fr.fr_staff_id,
			'' as reporting_line,
			'' as role_title_tl, '' as role_title_bl,
			srr.id as staff_id, 
			srr.c_topline as c_topline, 
			srr.c_bottomline AS c_bottomline,
			CONCAT('GT ' , srr.gt_id) AS gt_id, 

			srr.name_code as name_code, srr.name, 
			srr.abridged_name as abridged_name,

			'' as pm_report_to,
			'' as sc_report_to, '' as fundamentalRole, 'yes' as junkRole
					
			from atif_role_org.role_matrix_fr as fr
			left join atif.staff_registered as sr
				on sr.id = fr.staff_id
			left join atif.staff_registered as srr
				on srr.id = fr.fr_staff_id
				
			where sr.gt_id = '".$GTID."'";
		$staff = DB::connection($this->dbCon)->select($query);



		if(empty($staff)){
			$query="select * from
			(select
			ro.id as role_id, ro.gp_id, IF(ro.is_transparent =2, 'TRP', 'OPQ') as report_ok, ro.roleCode,
			rc.position as reporting_line,
			IFNULL(ro.role_title_tl, '  ') as role_title_tl, IFNULL(ro.role_title_bl, '  ') as role_title_bl,
			yt.id as staff_id, 
			yt.c_topline, yt.c_bottomline,
			yt.gt_id, 
			
			yt.name_code, yt.name, yt.abridged_name,
			
			IF(ro.id=ro.fundamentalRole, ro.pm_report_to, IF(ro.fundamentalRole=0, ro.pm_report_to, ro.fundamentalRole)) as pm_report_to,
			ro.sc_report_to, ro.fundamentalRole

			from atif_role_matrix.role_subject_teacher as st
			left join atif.staff_registered as sr
				on sr.id = st.staff_id
				
			left join atif_subject.programmesetup as prog
				on prog.id = st.program_id
			left join atif._grade as gg
				on gg.id = prog.gradeID
			left join atif._section as ss
				on ss.id = st.section_id
			left join atif._branch_wing_grade as ww
				on ww.grade_id = gg.id
				
			
			left join atif_role_matrix.role_subject_reporting as rsr
				on rsr.grade_id = prog.gradeID
				and rsr.subject_id = prog.subjects
				and rsr.academic_session_id >= 9
				and rsr.academic_session_id <= 10
			left join atif_role_org.role_position as ro
				on ro.id = rsr.role_position_id
			left join atif_role_org.role_category as rc
				on rc.id = ro.staff_role_category_id
			left join atif.staff_registered as yt
				on yt.id = ro.staff_id
			
			
			left join atif.school_strength_grade_section as st_gs
				on st_gs.grade_name = gg.name
				and st_gs.section_name = ss.name


			left join atif_subject.subject_selection_group as sbj_grp
				on sbj_grp.name = LEFT(RIGHT(st.gp_id,3),1)
			left join atif_subject.subjectblock as sbj_blk
				on sbj_blk.programID = st.program_id
				and sbj_blk.record_deleted = 0
				and substr(sbj_blk.`key`, 21, 1) = sbj_grp.id
				/*and sbj_blk.block = right(st.gp_id, 1)*/
			left join atif_subject.programmesetup_oblocks as oblock
				on oblock.blockID = sbj_blk.ID
				and oblock.subjectBlock = right(st.gp_id, 1)
			left join atif_subject.subject_selection_group_grade as ssgg
				on ssgg.grade_id = prog.gradeID
				and ssgg.subject_id = prog.subjects
				and ssgg.subject_selection_group_id = sbj_grp.id
				and ssgg.academic_session_id >= 9
				and ssgg.academic_session_id <= 10


			where sr.gt_id = '".$GTID."' and ro.record_deleted=0) as data

			order by abridged_name desc
			limit 1";
			$staff = DB::connection($this->dbCon)->select($query);
		}

        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }





    /**********************************************************************
    * Staff Information - TIF B - 3
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, xxx
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function get_StaffReporteeInfo($RoleID, $ReportingType=null, $NameCode=null)
    {
    	/***** ***** ***** Class Teachers for Year Tutor ***** ***** *****/
        $query = "select grade_id from atif_role_org.role_position where record_deleted=0 and id = " . $RoleID . 
        	" and (role_title_tl like 'YT%'
        	or role_title_tl like '%Mentor%')";
        $queryResult = DB::connection($this->dbCon)->select($query);
        $thisGradeID = 0;
        $queryYT = '';
        if(!empty($queryResult)){
        	$thisGradeID = $queryResult[0]->grade_id;
        	$queryYT = " UNION 
        	select
			rct.id as role_id, rct.gp_id, 'OPQ' as report_ok,
			990 as reporting_line, '' as total_reportee, stgs.students as total_staff_members,
			'Class Teacher' as role_title_tl, '' as role_title_bl,
			sr.id as staff_id, sr.c_topline, sr.c_bottomline, CONCAT('GT ' , sr.gt_id) AS gt_id, sr.name_code, sr.name, sr.abridged_name, 
			CONCAT(sr.name_code, '-T') as roleCode,
			44 as pm_report_to,
			0 as sc_report_to, rct.id as fundamentalRole, 'P' as reporting_type



			from atif_role_matrix.role_class_teacher as rct
			left join atif.staff_registered as sr
				on sr.id = rct.staff_id
			left join atif._grade as gg
				on gg.id = rct.grade_id
			left join atif._section as ss
				on ss.id = rct.section_id
			left join atif.school_strength_grade_section as stgs
				on stgs.grade_name = gg.name
				and stgs.section_name = ss.name
				

			where rct.teacher_type_id <= 2
			and rct.grade_id = $thisGradeID 



			UNION 


			select
			rct.id as role_id, rct.gp_id, 'OPQ' as report_ok,
			999 as reporting_line, '' as total_reportee, stgs.students as total_staff_members,
			'Subject Teacher' as role_title_tl, '' as role_title_bl,
			sr.id as staff_id, sr.c_topline, sr.c_bottomline, CONCAT('GT ' , sr.gt_id) AS gt_id, sr.name_code, sr.name, sr.abridged_name, 
			CONCAT(sr.name_code, '-C') as roleCode,
			66 as pm_report_to,
			0 as sc_report_to, rct.id as fundamentalRole, 'S' as reporting_type



			from atif_role_matrix.role_subject_teacher as rct
			left join atif.staff_registered as sr
				on sr.id = rct.staff_id 
			left join atif_subject.programmesetup as prg
				on prg.id = rct.program_id
			left join atif._grade as gg
				on gg.id = prg.gradeid
			left join atif._section as ss
				on ss.id = rct.section_id
			left join atif.school_strength_grade_section as stgs
				on stgs.grade_name = gg.name
				and stgs.section_name = ss.name
				
			where gg.id = $thisGradeID 
			group by rct.staff_id

			";
        }
        /***** ***** ***** Class Teachers for Year Tutor ***** ***** *****/
        /***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****/






        /***** ***** ***** Subject Teachers for Lead Teacher ***** ***** *****/
        $query = "select sr.gt_id from atif_role_org.role_position as p
		left join atif.staff_registered as sr
			on sr.id = p.staff_id
		where p.record_deleted=0 and p.id = $RoleID and p.role_title_tl like 'LT%'";
        $queryResult = DB::connection($this->dbCon)->select($query);
        $queryST = '';
        if(!empty($queryResult)){
        	$thisResult = $this->get_StaffMatrixRole_SBJ($queryResult[0]->gt_id); // Change here
        	$queryST = " UNION 
        	select
			rct.id as role_id, rct.gp_id, 'OPQ' as report_ok,
			999 as reporting_line, '' as total_reportee, stgs.students as total_staff_members,
			'Subject Teacher' as role_title_tl, '' as role_title_bl,
			sr.id as staff_id, sr.c_topline, sr.c_bottomline, CONCAT('GT ' , sr.gt_id) AS gt_id, sr.name_code, sr.name, sr.abridged_name, 
			CONCAT(sr.name_code, '-S') as roleCode,
			44 as pm_report_to,
			0 as sc_report_to, rct.id as fundamentalRole, 'P' as reporting_type



			from atif_role_matrix.role_subject_teacher as rct
			left join atif.staff_registered as sr
				on sr.id = rct.staff_id 
			left join atif_subject.programmesetup as prg
				on prg.id = rct.program_id
			left join atif._grade as gg
				on gg.id = prg.gradeid
			left join atif._section as ss
				on ss.id = rct.section_id
			left join atif.school_strength_grade_section as stgs
				on stgs.grade_name = gg.name
				and stgs.section_name = ss.name ";

			$iCounter = 1;
			foreach ($thisResult as $ddd) {
				if($iCounter == 1){
					$queryST .= " where (rct.program_id = " . $ddd['program_id'];
					
				}else{
					$queryST .= " OR rct.program_id = " . $ddd['program_id'];

				}
				$iCounter++;
			}

			$queryST .= ")";
			$queryST .= " and rct.staff_id != " . $thisResult[0]['staff_id'] . " group by rct.staff_id ";
        }
        /***** ***** ***** Subject Teachers for Lead Teacher ***** ***** *****/
        /***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***/





		if(empty($ReportingType)){
			$query="select 
			ro.id as role_id, ro.gp_id, IF(ro.is_transparent =2, 'TRP', 'OPQ') as report_ok,
			rc.position as reporting_line, ro.total_reportee, ro.total_staff_members,
			IFNULL(ro.role_title_tl, '  ') as role_title_tl, IFNULL(ro.role_title_bl, '  ') as role_title_bl,
			sr.id as staff_id, sr.c_topline, sr.c_bottomline, CONCAT('GT ' , sr.gt_id) AS gt_id, sr.name_code, sr.name, sr.abridged_name, ro.roleCode,
			IF(ro.id=ro.fundamentalRole, ro.pm_report_to, IF(ro.fundamentalRole=0, ro.pm_report_to, ro.fundamentalRole)) as pm_report_to,
			ro.sc_report_to, ro.fundamentalRole, IF(ro.id=ro.fundamentalRole, 'FP', 'P') as reporting_type


			from atif_role_org.role_position as ro
			left join atif.staff_registered as sr
				on sr.id = ro.staff_id
			left join atif_role_org.role_category as rc
				on rc.id = ro.staff_role_category_id

				
				

			where ro.pm_report_to = $RoleID and ro.record_deleted=0


			$queryYT

			$queryST

			order by reporting_line";
		}else{
			$query="select 
			ro.id as role_id, ro.gp_id, IF(ro.is_transparent =2, 'TRP', 'OPQ') as report_ok,
			rc.position as reporting_line, ro.total_reportee, ro.total_staff_members,
			IFNULL(ro.role_title_tl, '  ') as role_title_tl, IFNULL(ro.role_title_bl, '  ') as role_title_bl,
			sr.id as staff_id, sr.c_topline, sr.c_bottomline, CONCAT('GT ' , sr.gt_id) AS gt_id, '".$NameCode."' as name_code, sr.name, sr.abridged_name, ro.roleCode,
			IF(ro.id=ro.fundamentalRole, ro.pm_report_to, IF(ro.fundamentalRole=0, ro.pm_report_to, ro.fundamentalRole)) as pm_report_to,
			ro.sc_report_to, ro.fundamentalRole, '".$ReportingType."' as reporting_type


			from atif_role_org.role_position as ro
			left join atif.staff_registered as sr
				on sr.id = ro.staff_id
			left join atif_role_org.role_category as rc
				on rc.id = ro.staff_role_category_id
				

			where ro.pm_report_to = $RoleID and ro.record_deleted=0


			$queryYT

			$queryST

			order by reporting_line";
		}

		//print_r($query);exit;

        $staff = DB::connection($this->dbCon)->select($query);
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }









    /**********************************************************************
    * Staff Information - TIF B - Staff Secondary Reportee
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, Staff Secondary Reportee
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function get_StaffReporteeSCInfo($RoleID)
    {
        $query="select 
		ro.id as role_id, ro.gp_id, IF(ro.is_transparent =2, 'TRP', 'OPQ') as report_ok,
		rc.position as reporting_line, ro.total_reportee, ro.total_staff_members,
		IFNULL(ro.role_title_tl, '  ') as role_title_tl, IFNULL(ro.role_title_bl, '  ') as role_title_bl,
		sr.id as staff_id, sr.c_topline, sr.c_bottomline, CONCAT('GT ' , sr.gt_id) AS gt_id, sr.name_code, sr.name, sr.abridged_name, ro.roleCode,
		IF(ro.id=ro.fundamentalRole, ro.pm_report_to, IF(ro.fundamentalRole=0, ro.pm_report_to, ro.fundamentalRole)) as pm_report_to,
		ro.sc_report_to, ro.fundamentalRole, 'SC' as reporting_type


		from atif_role_org.role_position as ro
		left join atif.staff_registered as sr
			on sr.id = ro.staff_id
		left join atif_role_org.role_category as rc
			on rc.id = ro.staff_role_category_id
			

		where ro.sc_report_to = $RoleID and ro.record_deleted=0


		order by rc.position";


        $staff = DB::connection($this->dbCon)->select($query);
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }








    /**********************************************************************
    * Staff Information - TIF B - Matrix Role Class Teacher
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, Matrix Role Class Teacher
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function get_StaffMatrixRole_CLT($GTID)
	{
		$query = "select

		clt.blocks_per_week,
		IF(clt.teacher_type_id = 1, 'CLT', 'COT') as clt_type,
		CONCAT(gg.name, '-', ss.name) as class, clt.gp_id, st_gs.students,
		IFNULL(ro.role_title_tl, '  ') as role_title_tl, IFNULL(ro.role_title_bl, '  ') as role_title_bl,
		lt.id as lt_staff_id,
		IFNULL(lt.abridged_name, '  ') as abridged_name, IFNULL(lt.name_code, '  ') as name_code

		from atif_role_matrix.role_class_teacher as clt
		left join atif.staff_registered as sr
			on sr.id = clt.staff_id
		left join atif._grade as gg
			on gg.id = clt.grade_id
		left join atif._section as ss
			on ss.id = clt.section_id
		left join atif_role_org.role_position as ro
			on  ro.grade_id = clt.grade_id
			and ro.role_title_tl like 'yt%'
		left join atif.staff_registered as lt
			on lt.id = ro.staff_id
		left join atif.school_strength_grade_section as st_gs
			on st_gs.grade_name = gg.name
			and st_gs.section_name = ss.name

		where sr.gt_id = '".$GTID."' and ro.record_deleted=0";


        $staff = DB::connection($this->dbCon)->select($query);
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }









    /**********************************************************************
    * Staff Information - TIF B - Matrix Role Class Teacher Reportoo
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, Matrix Role Class Teacher Reportoo
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function get_StaffMatrixRole_CLT_Reportoo($GTID)
	{

		$query = "select
			0 as role_id, '' as gp_id, '' as report_ok, '' as roleCode, fr.fr_staff_id,
			'' as reporting_line,
			'' as role_title_tl, '' as role_title_bl,
			srr.id as staff_id, 
			srr.c_topline as c_topline, 
			srr.c_bottomline AS c_bottomline,
			CONCAT('GT ' , srr.gt_id) AS gt_id, 

			srr.name_code as name_code, srr.name, 
			srr.abridged_name as abridged_name,

			'' as pm_report_to,
			'' as sc_report_to, '' as fundamentalRole, 'yes' as junkRole
					
			from atif_role_org.role_matrix_fr as fr
			left join atif.staff_registered as sr
				on sr.id = fr.staff_id
			left join atif.staff_registered as srr
				on srr.id = fr.fr_staff_id
				
			where sr.gt_id = '".$GTID."'";

		$staff = DB::connection($this->dbCon)->select($query);



		if(empty($staff)){
			$query = "select

			clt.blocks_per_week,
			IF(clt.teacher_type_id = 1, 'CLT', 'COT') as clt_type,
			CONCAT(gg.name, '-', ss.name) as class, clt.gp_id, st_gs.students,
			IFNULL(ro.role_title_tl, '  ') as c_topline, IFNULL(ro.role_title_bl, '  ') as c_bottomline,
			IFNULL(lt.abridged_name, '  ') as abridged_name, IFNULL(lt.name_code, '  ') as name_code,
			'' as report_ok, '' as reporting_line, lt.gt_id as gt_id

			from atif_role_matrix.role_class_teacher as clt
			left join atif.staff_registered as sr
				on sr.id = clt.staff_id
			left join atif._grade as gg
				on gg.id = clt.grade_id
			left join atif._section as ss
				on ss.id = clt.section_id
			left join atif_role_org.role_position as ro
				on  ro.grade_id = clt.grade_id
				and ro.role_title_tl like 'yt%'
			left join atif.staff_registered as lt
				on lt.id = ro.staff_id
			left join atif.school_strength_grade_section as st_gs
				on st_gs.grade_name = gg.name
				and st_gs.section_name = ss.name

			where sr.gt_id = '".$GTID."' and ro.record_deleted=0";
			$staff = DB::connection($this->dbCon)->select($query);
		}

        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }








    /**********************************************************************
    * Staff Information - TIF B - xxx
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, xxx
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function get_StaffMatrixRole_SBJ($GTID)
    {
        $query = "select * from
		(select
		st.gp_id, IF(sbj_blk.totalStudents is null, st_gs.students, oblock.num) as students,
		IF(prog.optional = 1, IFNULL(ssgg.blocks_per_week,0), IFNULL(prog.blocks_per_week,0)) as block, 
		ro.role_title_tl, ro.role_title_bl, yt.id as yt_staff_id, yt.abridged_name, yt.name_code, rc.position as reporting_line ,st.program_id, st.staff_id
		/*sbj_blk.ID, substr(sbj_blk.`key`, 20, 1) as dkey, right(st.gp_id, 1) as gp*/

		from atif_role_matrix.role_subject_teacher as st
		left join atif.staff_registered as sr
			on sr.id = st.staff_id
			
		left join atif_subject.programmesetup as prog
			on prog.id = st.program_id
		left join atif._grade as gg
			on gg.id = prog.gradeID
		left join atif._section as ss
			on ss.id = st.section_id
		left join atif._branch_wing_grade as ww
			on ww.grade_id = gg.id
			
		
		left join atif_role_matrix.role_subject_reporting as rsr
			on rsr.grade_id = prog.gradeID
			and rsr.subject_id = prog.subjects
			and rsr.academic_session_id >= 9
			and rsr.academic_session_id <= 10
		left join atif_role_org.role_position as ro
			on ro.id = rsr.role_position_id
		left join atif_role_org.role_category as rc
			on rc.id = ro.staff_role_category_id
		left join atif.staff_registered as yt
			on yt.id = ro.staff_id
		
		
		left join atif.school_strength_grade_section as st_gs
			on st_gs.grade_name = gg.name
			and st_gs.section_name = ss.name


		left join atif_subject.subject_selection_group as sbj_grp
			on sbj_grp.name = LEFT(RIGHT(st.gp_id,3),1)
		left join atif_subject.subjectblock as sbj_blk
			on sbj_blk.programID = st.program_id
			and sbj_blk.record_deleted = 0
			and substr(sbj_blk.`key`, 21, 1) = sbj_grp.id
			/*and sbj_blk.block = right(st.gp_id, 1)*/
		left join atif_subject.programmesetup_oblocks as oblock
			on oblock.blockID = sbj_blk.ID
			and oblock.subjectBlock = right(st.gp_id, 1)
		left join atif_subject.subject_selection_group_grade as ssgg
			on ssgg.grade_id = prog.gradeID
			and ssgg.subject_id = prog.subjects
			and ssgg.subject_selection_group_id = sbj_grp.id
			and ssgg.academic_session_id >= 9
			and ssgg.academic_session_id <= 10


		where sr.gt_id = '".$GTID."' and ro.record_deleted=0) as data
		where students is not null

		order by gp_id asc";


        $staff = DB::connection($this->dbCon)->select($query);
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }









    /**********************************************************************
    * Staff Information - TIF B - Unique Students of Faculty Staff
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, Unique Students of Faculty Staff
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function getUniqueStudents($GTID)
    {
		$query = "select sum(students) as num from
			(select students from
			(select students, grade_name, section_name from
					(select
					clt.blocks_per_week,
					IF(clt.teacher_type_id = 1, 'CLT', 'COT') as clt_type,
					CONCAT(gg.name, '-', ss.name) as class, clt.gp_id, st_gs.students,
					IFNULL(ro.role_title_tl, '  ') as role_title_tl, IFNULL(ro.role_title_bl, '  ') as role_title_bl,
					IFNULL(lt.abridged_name, '  ') as abridged_name, IFNULL(lt.name_code, '  ') as name_code,
					gg.name as grade_name, ss.name as section_name
			
					from atif_role_matrix.role_class_teacher as clt
					left join atif.staff_registered as sr
						on sr.id = clt.staff_id
					left join atif._grade as gg
						on gg.id = clt.grade_id
					left join atif._section as ss
						on ss.id = clt.section_id
					left join atif_role_org.role_position as ro
						on  ro.grade_id = clt.grade_id
						and ro.role_title_tl like 'yt%'
					left join atif.staff_registered as lt
						on lt.id = ro.staff_id
					left join atif.school_strength_grade_section as st_gs
						on st_gs.grade_name = gg.name
						and st_gs.section_name = ss.name
			
					where sr.gt_id = '".$GTID."' and ro.record_deleted=0) as data
					
			UNION
			
			select students, grade_name, section_name from
					(select
					st.gp_id, IF(sbj_blk.totalStudents is null, st_gs.students, oblock.num) as students,
					IF(prog.optional = 1, IFNULL(ssgg.blocks_per_week,0), IFNULL(prog.blocks_per_week,0)) as block, 
					ro.role_title_tl, ro.role_title_bl, yt.abridged_name, yt.name_code, rc.position as reporting_line,
					gg.name as grade_name, ss.name as section_name
			
					from atif_role_matrix.role_subject_teacher as st
					left join atif.staff_registered as sr
						on sr.id = st.staff_id
						
					left join atif_subject.programmesetup as prog
						on prog.id = st.program_id
					left join atif._grade as gg
						on gg.id = prog.gradeID
					left join atif._section as ss
						on ss.id = st.section_id
					left join atif._branch_wing_grade as ww
						on ww.grade_id = gg.id
						
					
					left join atif_role_matrix.role_subject_reporting as rsr
						on rsr.grade_id = prog.gradeID
						and rsr.subject_id = prog.subjects
						and rsr.academic_session_id >= 9
						and rsr.academic_session_id <= 10
					left join atif_role_org.role_position as ro
						on ro.id = rsr.role_position_id
					left join atif_role_org.role_category as rc
						on rc.id = ro.staff_role_category_id
					left join atif.staff_registered as yt
						on yt.id = ro.staff_id
					
					
					left join atif.school_strength_grade_section as st_gs
						on st_gs.grade_name = gg.name
						and st_gs.section_name = ss.name
			
			
					left join atif_subject.subject_selection_group as sbj_grp
						on sbj_grp.name = LEFT(RIGHT(st.gp_id,3),1)
					left join atif_subject.subjectblock as sbj_blk
						on sbj_blk.programID = st.program_id
						and sbj_blk.record_deleted = 0
						and substr(sbj_blk.`key`, 21, 1) = sbj_grp.id
						/*and sbj_blk.block = right(st.gp_id, 1)*/
					left join atif_subject.programmesetup_oblocks as oblock
						on oblock.blockID = sbj_blk.ID
						and oblock.subjectBlock = right(st.gp_id, 1)
					left join atif_subject.subject_selection_group_grade as ssgg
						on ssgg.grade_id = prog.gradeID
						and ssgg.subject_id = prog.subjects
						and ssgg.subject_selection_group_id = sbj_grp.id
						and ssgg.academic_session_id >= 9
						and ssgg.academic_session_id <= 10
			
			
					where sr.gt_id = '".$GTID."' and ro.record_deleted=0
					group by gg.name, ss.name) as data
					where students is not null
			) as data
			group by grade_name, section_name
		) as data";

        $staff = DB::connection($this->dbCon)->select($query);

        if(!empty($staff)){
			return (count($staff[0])-1);
		}else{
			return 0;
		}
    }


































    /**********************************************************************
    * Staff Information - TIF B - Staff Qualification
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  Staff TIF-B, Staff Qualification
    * Date:     Jul 28, 2017 (Thu)
    ***********************************************************************/
    public function getStaffQualification($StaffID)
    {
        $query="select
		q.level, q.title, REPLACE(q.institute, '_', ' ') as institute, q.subjects, q.qualification, q.result, q.year_of_completion
		from atif.staff_registered as sr 
		left join atif.staff_registered_qualification as q
			on q.staff_id = sr.id
		where sr.id = ".$StaffID."
		order by q.year_of_completion, q.level";


        $staff = DB::connection($this->dbCon)->select($query);
        return $staff;
    }

    public function checkLeaves($StaffID,$leave_from,$leave_to)
    {
		$query="select * from atif_gs_events.leave_application la
		where la.staff_id=$StaffID and la.leave_from <= '$leave_from' AND la.leave_to >= '$leave_to'";
        $staff = DB::connection($this->dbCon)->select($query);
        return $staff;
    }


    
    /**********************************************************************
    * Staff Information - TIF B - Staff Employement
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  Staff TIF-B, Staff Employement
    * Date:     Jul 28, 2017 (Thu)
    ***********************************************************************/
    public function getStaffEmployment($StaffID)
    {
        $query="select
		q.organization, q.designation, q.department, q.classes_taught, 
		q.subject_taught, FORMAT(q.salary,0) as salary, q.from_year, q.to_year, q.reason_for_leaving, q.description
		from atif.staff_registered as sr 
		left join atif.staff_registered_employement as q
			on q.staff_id = sr.id
		where sr.id = ".$StaffID."
		order by q.from_year desc";


        $staff = DB::connection($this->dbCon)->select($query);
        return $staff;
    }
    /**********************************************************************
    * Staff Information - TIF B - Staff Father/Spouse
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  Staff TIF-B, Father/Spouse
    * Date:     Jul 28, 2017 (Thu)
    ***********************************************************************/
    public function getStaffFS($StaffID)
    {
        $query="select
		q.name, q.profession, q.qualification, q.designation, 
		q.company, q.department, q.nic, q.mobile_phone, q.address
		from atif.staff_registered as sr 
		left join atif.staff_registered_father_spouse as q
			on q.staff_id = sr.id
		where sr.id = ".$StaffID."
		order by q.spouseType";


        $staff = DB::connection($this->dbCon)->select($query);
        return $staff;
    }
    /**********************************************************************
    * Staff Information - TIF B - Staff Child
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  Staff TIF-B, Staff Child
    * Date:     Jul 28, 2017 (Thu)
    ***********************************************************************/
    public function getStaffChild($StaffID)
    {
        $query="select
		st.gs_id, st.abridged_name, st.call_name, st.gr_no as photo_id,
		cl.grade_name, cl.section_name, cl.std_status_code, IFNULL(cl.house_name,'') as house_name, IFNULL(CONCAT(cl.grade_name, '-', cl.section_name), '') as class,
		IFNULL(cl.std_status_name, 'ALUMNI') as std_status_name, IFNULL(cl.std_status_name, 'alumni') as html_class,
		concat(convert(left(lpad(`st`.`gf_id`,5,0),2) using utf8mb4),'-',convert(right(lpad(`st`.`gf_id`,5,0),3) using utf8mb4)) AS gfid
		from atif.staff_registered as sr
		left join atif.staff_child as q
			on q.staff_id = sr.id
		left join atif.student_registered as st
			on st.gf_id = q.gf_id
		left join atif.class_list as cl
			on cl.id = st.id
		where sr.id = ".$StaffID."
		group by st.gs_id
		order by st.dob";


        $staff = DB::connection($this->dbCon)->select($query);
        for($i=0; $i < count($staff); $i++){
        	$pic = $this->get_Student_Pic($staff[$i]->photo_id);
		    $staff[$i]->photo500 = $pic['photo500'];
		    $staff[$i]->photo150 = $pic['photo150'];
        }
        
        return $staff;
    }
    /**********************************************************************
    * Staff Information - TIF B - Staff Alternate Contact
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  Staff TIF-B, Alternate Contact
    * Date:     Jul 28, 2017 (Thu)
    ***********************************************************************/
    public function getStaffAlternateContact($StaffID)
    {
        $query="select
		q.name, q.address, q.email, q.phone, q.relationships, q.`type`
		from atif.staff_registered as sr
		left join atif.staff_registered_alternativecontact as q
			on q.staff_id = sr.id
		where sr.id = ".$StaffID."
		order by q.`type`";


        $staff = DB::connection($this->dbCon)->select($query);
        return $staff;
    }
    /**********************************************************************
    * Staff Information - TIF B - Staff Other Detail
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  Staff TIF-B, Other Detail: PF/Bank/Takaful/NTN
    * Date:     Jul 29, 2017 (Thu)
    ***********************************************************************/
    //add reasons column in that query for takaful table zk
    public function getStaffOtherInfo($StaffID)
    {
        $query="select
		IFNULL(b.bank_name, '-') as bank_name, IFNULL(b.branch, '-') as bank_branch,
		IFNULL(b.branch_code, '-') as branch_code, IFNULL(b.account_number, '-') as account_number,
		IF(s.providentFund=1, 'Yes', 'No') as pf, IFNULL(s.nationalTaxNumber, '-') as ntn,
		IFNULL(sr.eobi_no, '-') as eobi, IFNULL(sr.sessi_no, '-') as sessi,
		IF(t.self=1, 'Yes', 'No') as takaful_self, IF(t.children=1, 'Yes', 'No') as takaful_children,
		IF(t.spouse=1, 'Yes', 'No') as takaful_spouse, IFNULL(t.certificate_no, '-') as takaful_crt,
    	t.reasons as takaful_reasons
		from atif.staff_registered as sr
		left join atif.staff_registered_bank_account as b
			on b.staff_id = sr.id
		left join atif.staff_registered_supporting as s
			on s.staff_id = sr.id
		left join atif.staff_registered_takaful as t
			on t.staff_id = sr.id
		where sr.id = ".$StaffID."
		limit 1";


        $staff = DB::connection($this->dbCon)->select($query);
        return $staff;
    }





    /**********************************************************************
    * Staff Information - TIF B - xxx
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, xxx
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function xxxx($GTID)
    {
        $query="";


        $staff = DB::connection($this->dbCon)->select($query);
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }

    /**********************************************************************
    * Profile Allocatate
    * Author:   ROhail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   no
    * @output:  number of profile Allocated
    * Date:     Aug 29, 2017 (Tues)
    ***********************************************************************/

    public function profile_allocated(){
		$query = "select tt.id,tt.profile_type_id,if(length(tt.name) > 25,concat(substr(tt.name,1,25),'....'),tt.name ) as name,tt.name as tooltip,count(ts.staff_id) as staff_allocation
			from atif_gs_events.tt_profile tt
			left join atif_gs_events.tt_profile_time_staff ts on (ts.profile_id = tt.id and ts.record_deleted = 0)
			group by tt.id order by name";
		$query_object = DB::connection($this->dbCon)->select($query); 
		return $query_object;
	}

    /**********************************************************************
    * Update Profile Time Staff
    * @input:   Staff ID, Profile ID
    * @output:  Success or Fail
    * Date:     Sep 06, 2017 (Wed)
    ***********************************************************************/
    public function updateProfileTimeStaff($staff_id, $profile_id )
    {	
    	// $query  = "Update atif_gs_events.tt_profile_time_staff set 
	    // 			profile_id = $profile_id,
	    // 			is_on_mon = (SELECT `is_on_mon` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			is_on_tue = (SELECT `is_on_tue` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			is_on_wed = (SELECT `is_on_wed` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			is_on_thu = (SELECT `is_on_thu` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			is_on_fri = (SELECT `is_on_fri` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			is_on_sat = (SELECT `is_on_sat` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			is_on_sun = (SELECT `is_on_sun` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			mon_in = (SELECT `mon_in` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			tue_in = (SELECT `tue_in` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			wed_in = (SELECT `wed_in` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			thu_in = (SELECT `thu_in` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			fri_in = (SELECT `fri_in` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			sat_in = (SELECT `sat_in` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			sun_in = (SELECT `sun_in` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			mon_out = (SELECT `mon_out` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			tue_out = (SELECT `tue_out` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			wed_out = (SELECT `wed_out` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			thu_out = (SELECT `thu_out` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			fri_out = (SELECT `fri_out` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			sat_out = (SELECT `sat_out` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			sun_out = (SELECT `sun_out` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			avg_week_hrs = (SELECT `avg_week_hrs` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			use_ext = (SELECT `use_ext` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			ext_time = (SELECT `ext_time` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			ext_frequency = (SELECT `ext_frequency` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			ext_july = (SELECT `ext_july` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			sat_hrs = (SELECT `sat_hrs` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			sat_off = (SELECT `sat_off` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id),
	    // 			sat_working = (SELECT `sat_working` from atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id)
	    // 			where staff_id = $staff_id";



    	 $staff = DB::connection($this->dbCon)
	    		->update("UPDATE atif_gs_events.tt_profile_time_staff SET profile_id = $profile_id, is_on_mon = (SELECT `is_on_mon`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), is_on_tue = (
					SELECT `is_on_tue`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), is_on_wed = (
					SELECT `is_on_wed`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), is_on_thu = (
					SELECT `is_on_thu`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), is_on_fri = (
					SELECT `is_on_fri`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), is_on_sat = (
					SELECT `is_on_sat`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), is_on_sun = (
					SELECT `is_on_sun`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), mon_in = (
					SELECT `mon_in`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), tue_in = (
					SELECT `tue_in`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), wed_in = (
					SELECT `wed_in`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), thu_in = (
					SELECT `thu_in`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), fri_in = (
					SELECT `fri_in`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), sat_in = (
					SELECT `sat_in`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), sun_in = (
					SELECT `sun_in`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), mon_out = (
					SELECT `mon_out`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), tue_out = (
					SELECT `tue_out`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), wed_out = (
					SELECT `wed_out`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), thu_out = (
					SELECT `thu_out`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), fri_out = (
					SELECT `fri_out`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), sat_out = (
					SELECT `sat_out`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), sun_out = (
					SELECT `sun_out`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), avg_week_hrs = (
					SELECT `avg_week_hrs`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), use_ext = (
					SELECT `use_ext`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), ext_time = (
					SELECT `ext_time`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), ext_frequency = (
					SELECT `ext_frequency`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), ext_july = (
					SELECT `ext_july`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), sat_hrs = (
					SELECT `sat_hrs`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), sat_off = (
					SELECT `sat_off`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id), sat_working = (
					SELECT `sat_working`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id),daily_relax_in = (
					SELECT `daily_relax_in`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id
					),monthly_relax_in = (
					SELECT `monthly_relax_in`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id
					),daily_relax_out = (
					SELECT `daily_relax_out`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id
					),monthly_relax_out = (
					SELECT `monthly_relax_out`
					FROM atif_gs_events.tt_profile_time
					WHERE `profile_id` = $profile_id) where staff_id = $staff_id");


	   //  $staff = DB::connection($this->dbCon)
				// ->table('atif_gs_events.tt_profile_time_staff')
				// ->where(array('staff_id' => $staff_id) )
			 //    ->update(array('profile_id' => $profile_id ));

        return $staff;
    }

    /**********************************************************************
    * Insert Profile Time Staff
    * @input:   Staff ID, Profile ID
    * @output:  Success or Fail
    * Date:     Sep 06, 2017 (Wed)
    ***********************************************************************/
    public function insertProfileTimeStaff($staff_id, $profile_id )
    {
    	
	    $staff = DB::connection($this->dbCon)
	    		->insert("INSERT INTO atif_gs_events.tt_profile_time_staff (`is_on_mon`, `is_on_tue`,`is_on_wed`,`is_on_thu`,`is_on_fri`,`is_on_sat`,`is_on_sun`,`mon_in`,`tue_in`,`wed_in`,`thu_in`,`fri_in`,`sat_in`,`sun_in`,`mon_out`,`tue_out`,`wed_out`,`thu_out`,`fri_out`,`sat_out`,`sun_out`,`avg_week_hrs`,`use_ext`,`ext_time`,`ext_frequency`,`ext_july`,`sat_hrs`,`sat_off`,`sat_working`,`staff_id`,`profile_id`,`created_by`,`created`, `flexy_time` , `is_on_flexy`, `daily_relax_in` , `monthly_relax_in`, `daily_relax_out` , `monthly_relax_out`)
						SELECT `is_on_mon`, `is_on_tue`,`is_on_wed`,`is_on_thu`,`is_on_fri`,`is_on_sat`,`is_on_sun`,`mon_in`,`tue_in`,`wed_in`,`thu_in`,`fri_in`,`sat_in`,`sun_in`,`mon_out`,`tue_out`,`wed_out`,`thu_out`,`fri_out`,`sat_out`,`sun_out`,`avg_week_hrs`,`use_ext`,`ext_time`,`ext_frequency`,`ext_july`,`sat_hrs`,`sat_off`,`sat_working`, " . $staff_id . " , " . $profile_id . ", " . Sentinel::getUser()->id. "," .time() . ", `flexy_time` , `is_on_flexy`, `daily_relax_in` , `monthly_relax_in`, `daily_relax_out` , `monthly_relax_out`  FROM atif_gs_events.tt_profile_time WHERE `profile_id` = $profile_id  And  NOT EXISTS (SELECT * FROM atif_gs_events.tt_profile_time_staff WHERE profile_id = $profile_id and  `staff_id` = $staff_id);");
			    
        return $staff;
    } 

    /**********************************************************************
    * Get Profile Time 
    * @input:    Profile ID
    * @output:  Success or Fail
    * Date:     Sep 06, 2017 (Wed)
    ***********************************************************************/
    public function getProfileTime($profile_id){
    	$query = "SELECT *, (SELECT name FROM `atif_gs_events`.`tt_profile_type` WHERE `id` = ( SELECT profile_type_id FROM `atif_gs_events`.`tt_profile` WHERE `id` = tt.profile_id)) as profile,  ( SELECT name FROM `atif_gs_events`.`tt_profile` WHERE `id` = $profile_id ) as profile_name FROM `atif_gs_events`.`tt_profile_time` as tt where profile_id =".$profile_id;
	    $staff = DB::connection($this->dbCon)
			    ->select($query);

        return $staff;
    } 

    /**********************************************************************
    * Update Custom Profile Time Staff
    * @input:   Staff ID , Data - As Object
    * @output:  Success or Fail
    * Date:     Sep 06, 2017 (Wed)
    ***********************************************************************/     

	public function updateCustomProfileTimeStaff($data, $staff_id){
	    	 $staff = DB::connection($this->dbCon)
		    		->table("atif_gs_events.tt_profile_time_staff")
		    		->where(array('staff_id' =>  $staff_id))
		    		->update($data);
 			return $data;		    		
	}    

    /**********************************************************************
    * Get Profile Time Staff
    * @input:   Staff ID
    * @output:  Success or Fail
    * Date:     Sep 06, 2017 (Wed)
    ***********************************************************************/
    public function getProfileTimeStaff($staff_id)
    {
    	$query = "Select *, (SELECT name FROM `atif_gs_events`.`tt_profile_type` WHERE `id` = ( SELECT profile_type_id FROM `atif_gs_events`.`tt_profile` WHERE `id` = tt.profile_id)) as profile,  ( SELECT name FROM `atif_gs_events`.`tt_profile` WHERE `id` = tt.profile_id) as profile_name  from atif_gs_events.tt_profile_time_staff as tt where tt.staff_id =".$staff_id;
	    $staff = DB::connection($this->dbCon)
			    ->select($query);

        return $staff;
    }



    /**********************************************************************
    * Staff Information - Staff List of login user Team
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff GT-ID
    * @output:  Staff TIF-B, xxx
    * Date:     Sep 13, 2017 (Wed)
    ***********************************************************************/
    public function get_StaffReporteeInfo_UTeam($RoleID, $ReportingType=null, $NameCode=null)
    {
		
		/*$query="select
	    sr.role_id_solangi as Role_id_So, sr.id as staff_id, sr.employee_id as photo_id, sr.gt_id, sr.name, sr.name_code, sr.abridged_name, sr.nic, sr.gender, tl.title as staff_title,
	    sr.dob, sr.doj, SUBSTRING(sr.gg_id, 1, LOCATE('@',sr.gg_id)-1) as email, IF(sr.branch_id=1, 'North', 'South') as campus,
	    sr.mobile_phone, sr.staff_category, sr.c_topline, sr.c_bottomline, st.code as status_code, st.name as status_name, MID(st.code, 3, 1) as status_name_code, ttp.name as tt_profile_name, CONCAT(st.code, ': ', st.name) as status_description, sr.report_ok,
	    

	    

	   if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'In Buffer', 'No profile assigned'  ))))) as atd_title,


	    if(atd.time is null, 'awaited', concat('at ', TIME_FORMAT(atd.time, '%h:%i %p'))) as atd_content,

	    



	     if(WEEKDAY(date(curdate())) = 5  and tt.sat_working=1,
	    if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'WaitingIcon.png',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'AbsentIcon.png',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'OnTimeicon.png',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'LateIcon.png',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBufferIcon.png', 'WaitingIcon.png'  )))))
		  
	    ,

	    if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'WaitingIcon.png',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'AbsentIcon.png',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'OnTimeicon.png',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'LateIcon.png',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBufferIcon.png', 'WaitingIcon.png'  )))))) as atd_icon,
		  

if(WEEKDAY(date(curdate())) = 5  and tt.sat_working=1,

if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On_Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBuffer', ''  ))))),


if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On_Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBuffer', ''  )))))) as Time_Checked


	    from (select 
			sr.id, sr.employee_id, sr.gt_id, sr.name, sr.name_code, sr.abridged_name, sr.nic, sr.gender,
			sr.dob, sr.doj, sr.gg_id, sr.branch_id, sr.is_active, sr.is_posted, sr.record_deleted, sr.title_person_id,
			sr.mobile_phone, sr.staff_category, sr.c_topline, sr.c_bottomline, sr.staff_status,
			IF(ro.is_transparent =2, 'TRP', 'OPQ') as report_ok,ro.id as role_id_solangi

			from atif_role_org.role_position as ro
			left join atif.staff_registered as sr
				on sr.id = ro.staff_id
				
			left join atif_role_org.role_category as rc
				on rc.id = ro.staff_role_category_id
				
			where ro.pm_report_to = $RoleID  ) as sr
	    left join atif._title_person as tl
	    	on tl.id = sr.title_person_id
	    left join atif._staffstatus as st
	    	on st.id = sr.staff_status
	    left join 
		 	(select atd.staff_id, min(atd.time) as time 
			 from atif_attendance_staff.staff_attendance_in as atd 
			 where atd.date = curdate()
			 and (atd.location_id = 3 or atd.location_id = 4 or atd.location_id=18)
			 group by atd.staff_id
			) as atd
			on atd.staff_id = sr.id
		left join atif_gs_events.tt_profile_time_staff as tt
		 	on tt.staff_id = sr.id
		left join atif_gs_events.tt_profile as ttp
		 	on ttp.id = tt.profile_id
		left join atif_gs_events.weekly_time_sheet as wts on ( wts.staff_id = sr.id and wts.date = curdate() ) 	
	    where sr.is_active = 1 and sr.is_posted = 1 and sr.record_deleted = 0
	    group by sr.id
	    order by sr.abridged_name";*/

	    $query = "SELECT
 ro.id as Role_id_So,
  sr.id as staff_id, sr.employee_id as photo_id, sr.gt_id, sr.name, sr.name_code, sr.abridged_name, sr.nic, sr.gender, tl.title as staff_title,
	    sr.dob, sr.doj, SUBSTRING(sr.gg_id, 1, LOCATE('@',sr.gg_id)-1) as email, IF(sr.branch_id=1, 'North', 'South') as campus,
	    sr.mobile_phone, sr.staff_category, sr.c_topline, sr.c_bottomline, st.code as status_code, st.name as status_name, MID(st.code, 3, 1) as status_name_code, ttp.name as tt_profile_name, CONCAT(st.code, ': ', st.name) as status_description, 
		 
		 IF(ro.is_transparent =2, 'TRP', 'OPQ') as report_ok,
		 

	    

	    

	   if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'In Buffer', 'No profile assigned'  ))))) as atd_title,


	    if(atd.time is null, 'awaited', concat('at ', TIME_FORMAT(atd.time, '%h:%i %p'))) as atd_content,

	    



	     if(WEEKDAY(date(curdate())) = 5  and tt.sat_working=1,
	    if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'WaitingIcon.png',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'AbsentIcon.png',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'OnTimeicon.png',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'LateIcon.png',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBufferIcon.png', 'WaitingIcon.png'  )))))
		  
	    ,

	    if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'WaitingIcon.png',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'AbsentIcon.png',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'OnTimeicon.png',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'LateIcon.png',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBufferIcon.png', 'WaitingIcon.png'  )))))) as atd_icon,
		  

if(WEEKDAY(date(curdate())) = 5  and tt.sat_working=1,

if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On_Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBuffer', ''  ))))),


if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On_Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBuffer', ''  )))))) as Time_Checked



FROM atif_role_org.role_position AS ro
LEFT JOIN atif.staff_registered AS sr ON sr.id = ro.staff_id
LEFT JOIN atif_role_org.role_category AS rc ON rc.id = ro.staff_role_category_id
LEFT JOIN atif._title_person AS tl ON tl.id = sr.title_person_id
LEFT JOIN atif._staffstatus AS st ON st.id = sr.staff_status
LEFT JOIN 
		 	(
SELECT atd.staff_id, MIN(atd.time) AS TIME
FROM atif_attendance_staff.staff_attendance_in AS atd
WHERE atd.date = CURDATE() AND (atd.location_id = 3 OR atd.location_id = 4 OR atd.location_id=18)
GROUP BY atd.staff_id
			) AS atd ON atd.staff_id = sr.id
LEFT JOIN atif_gs_events.tt_profile_time_staff AS tt ON tt.staff_id = sr.id
LEFT JOIN atif_gs_events.tt_profile AS ttp ON ttp.id = tt.profile_id
LEFT JOIN atif_gs_events.weekly_time_sheet AS wts ON (wts.staff_id = sr.id AND wts.date = CURDATE())
WHERE (ro.pm_report_to=".$RoleID.")  
#and sr.is_active = 1 and sr.is_posted = 1 
and ro.record_deleted=0
";


        $staff = DB::connection($this->dbCon)->select($query);
        $i = 0;
	    foreach ($staff as $u) {
		    $pic = $this->get_Staff_Pic($u->photo_id, $u->gender);
		    $staff[$i]->photo500 = $pic['photo500'];
		    $staff[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }
    public function get_StaffReporteeSCInfo_UTeam($RoleID)
    {
        $query="select
	    sr.id as staff_id, sr.employee_id as photo_id, sr.gt_id, sr.name, sr.name_code, sr.abridged_name, sr.nic, sr.gender, tl.title as staff_title,
	    sr.dob, sr.doj, SUBSTRING(sr.gg_id, 1, LOCATE('@',sr.gg_id)-1) as email, IF(sr.branch_id=1, 'North', 'South') as campus,
	    sr.mobile_phone, sr.staff_category, sr.c_topline, sr.c_bottomline, st.code as status_code, st.name as status_name, MID(st.code, 3, 1) as status_name_code, ttp.name as tt_profile_name, CONCAT(st.code, ': ', st.name) as status_description, sr.report_ok,
	    if(atd.time is null, 'Absent', 'On Time') as atd_titles,
	    if(atd.time is null, 'awaited', concat('at ', TIME_FORMAT(atd.time, '%h:%i %p'))) as atd_contents,
	    if(atd.time is null, 'AbsentIcon.png', 'OnTimeicon.png') as atd_icons,

	   if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'In Buffer', 'No profile assigned'  ))))) as atd_title,


	    if(atd.time is null, 'awaited', concat('at ', TIME_FORMAT(atd.time, '%h:%i %p'))) as atd_content,

	    if(atd.time is null, 'AbsentIcon.png', 'OnTimeicon.png') as atd_icons,

	     if(WEEKDAY(date(curdate())) = 5  and tt.sat_working=1,
	    if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'WaitingIcon.png',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'AbsentIcon.png',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'OnTimeicon.png',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'LateIcon.png',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBufferIcon.png', 'WaitingIcon.png'  )))))
		  
	    ,

	    if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'WaitingIcon.png',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'AbsentIcon.png',
	    
	   if( (atd.time is not null) and ( atd.time < Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'OnTimeicon.png',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'LateIcon.png',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBufferIcon.png', 'WaitingIcon.png'  )))))) as atd_icon,
		  

if(WEEKDAY(date(curdate())) = 5  and tt.sat_working=1,

if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time <= Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On_Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBuffer', ''  ))))),


if( ( (atd.time is null) and (curtime() < TIME_FORMAT( wts.time_in, '%H:%i:%s') )), 'Waiting',
	    
	    if( ( atd.time is null ) and ( curtime() >  ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ) , 'Absent',
	    
	   if( (atd.time is not null) and ( atd.time < Time( TIME_FORMAT( wts.time_in + interval 59 second, '%H:%i:%s')) ), 'On_Time',
	   
	   if( (atd.time is not null) and ( atd.time > ADDTIME( wts.time_in, TIME_FORMAT(SEC_TO_TIME(( (tt.daily_relax_in+1)*60)),'%H:%i:%s')) ), 'Late',
	    
	    if( (atd.time is not null) and ( atd.time between 
		 Time( TIME_FORMAT( wts.time_in + INTERVAL 1 MINUTE , '%H:%i:%s')) 
		  and  Time( TIME_FORMAT( wts.time_in + INTERVAL (tt.daily_relax_in+1) MINUTE , '%H:%i:%s')) ) , 'InBuffer', ''  )))))) as Time_Checked


	    from (select 
			sr.id, sr.employee_id, sr.gt_id, sr.name, sr.name_code, sr.abridged_name, sr.nic, sr.gender,
			sr.dob, sr.doj, sr.gg_id, sr.branch_id, sr.is_active, sr.is_posted, sr.record_deleted, sr.title_person_id,
			sr.mobile_phone, sr.staff_category, sr.c_topline, sr.c_bottomline, sr.staff_status,
			IF(ro.is_transparent =2, 'TRP', 'OPQ') as report_ok


			from atif_role_org.role_position as ro
			left join atif.staff_registered as sr
				on sr.id = ro.staff_id 
			left join atif_role_org.role_category as rc
				on rc.id = ro.staff_role_category_id
				

			where ro.sc_report_to = $RoleID  ) as sr
	    left join atif._title_person as tl
	    	on tl.id = sr.title_person_id
	    left join atif._staffstatus as st
	    	on st.id = sr.staff_status
	    left join 
		 	(select atd.staff_id, min(atd.time) as time 
			 from atif_attendance_staff.staff_attendance_in as atd 
			 where atd.date = curdate()
			 and (atd.location_id = 3 or atd.location_id = 4 or atd.location_id=18)
			 group by atd.staff_id
			) as atd
			on atd.staff_id = sr.id
		left join atif_gs_events.tt_profile_time_staff as tt
		 	on tt.staff_id = sr.id
		left join atif_gs_events.tt_profile as ttp
		 	on ttp.id = tt.profile_id

		left join atif_gs_events.weekly_time_sheet as wts on ( wts.staff_id = sr.id and wts.date = curdate() ) 
		 	
	    where sr.is_active = 1 and sr.is_posted = 1 and sr.record_deleted = 0 
	    group by sr.id
	    order by sr.abridged_name";


        $staff = DB::connection($this->dbCon)->select($query);
        $i = 0;
	    foreach ($staff as $u) {
		    $pic = $this->get_Staff_Pic($u->photo_id, $u->gender);
		    $staff[$i]->photo500 = $pic['photo500'];
		    $staff[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;
    }

    public function insertStaffAbsentia($data){
    	
	    $staff = DB::connection($this->dbCon)
	    		->insert("INSERT INTO atif_gs_events.absent_in_absentia (`name` ,`description`,`date`,`start_time`,`end_time`,`staff_id`,`created` ,`created_by`,`modified` ,`modified_by` ) values(
						 '".$data['title']."','".$data['description'] ."','".$data['date'] ."','".$data['start_time'] ."','".$data['end_time'] ."',".$data['staffID'] .",'".time() ."',". Sentinel::getUser()->id .",'".time() ."',". Sentinel::getUser()->id.")") ;
			    
        return $staff;
    }
    public function getStaffAbsentia($staff_id){
    	
	     /*$query = "SELECT amd.id as Absenia_id, ai.staff_id as Staff_id,amd.title, DATE_FORMAT(amd.date,'%a %b %d %Y') AS `date`, DATE_FORMAT(ao.time,'%I:%i %p') AS From_time, DATE_FORMAT(ai.time,'%I:%i %p') AS to_time,IFNULL(amd.description,'') as description
			FROM atif_attendance_staff.staff_attendance_in ai
			JOIN atif_attendance_staff.staff_attendance_out ao ON (ao.date = ai.date AND ai.location_id = ao.location_id AND ai.staff_id = ao.staff_id)
			JOIN atif_gs_events.absenta_manual_description amd ON (amd.date = ai.date AND amd.location_id = ai.location_id  and amd.staff_id = ai.staff_id)
			WHERE ai.location_id = 17 AND ai.staff_id =".$staff_id." AND amd.record_deleted=0 group by amd.id";*/
			
			$query = "select amd.form_number as form_number,
amd.id as Absenia_id, ai.staff_id as Staff_id,amd.title, DATE_FORMAT(amd.date,'%a %b %d %Y') AS `date`, DATE_FORMAT(ao.time,'%I:%i %p') AS From_time, DATE_FORMAT(ai.time,'%I:%i %p') AS to_time,IFNULL(amd.description,'') as description
			from atif_gs_events.absenta_manual_description amd 
left join ( select *  from  atif_attendance_staff.staff_attendance_in aii where aii.staff_id=".$staff_id." ) as ai
on (  ai.staff_id = amd.staff_id and ai.created = amd.created)
left join ( select * from  atif_attendance_staff.staff_attendance_out ao where ao.staff_id=".$staff_id." ) as ao
on (  ao.date = amd.date and ai.location_id = ao.location_id and ao.created = amd.created )
where amd.staff_id=".$staff_id."
and amd.record_deleted =0
and ai.record_deleted =0 
and ao.record_deleted =0
order by amd.modified desc
";

			

	    $staff = DB::connection($this->dbCon)->select($query);
	    
		return $staff;
    }
	
	
	public function GetKashif($query){
		$staff = DB::connection($this->dbCon)->select($query);
		return $staff;
	}
	
	
		public function getStaffAbsentiaE($staff_id,$Absentia_id){
				/*$query = "SELECT 
				ai.id as IN_id,
				ai.date as In_Date,
				ai.time as In_Time,
				ao.id as  Out_id,
				ao.date as Out_Date,
				ao.time as Out_Time,
				amd.id as Des_id,
				amd.date as D_Date,
				amd.title as D_Title,
				amd.description as D_Des 
				FROM atif_attendance_staff.staff_attendance_in ai 
				JOIN atif_attendance_staff.staff_attendance_out ao ON (ao.date = ai.date AND ai.location_id = ao.location_id AND ai.staff_id = ao.staff_id)
				JOIN atif_gs_events.absenta_manual_description amd ON (amd.date = ai.date AND amd.location_id = ai.location_id)
				WHERE ai.location_id = 17 AND ai.staff_id =".$staff_id." AND amd.id=".$Absentia_id."";*/
				
				
				
				$query = "select 
				ai.id as IN_id,
		ai.date as In_Date,
		ai.time as In_Time,
		ao.id as  Out_id,
		ao.date as Out_Date,
		ao.time as Out_Time,
		amd.id as Des_id,
		amd.date as D_Date,
		amd.title as D_Title,
		amd.description as D_Des,
		amd.form_number
		
from atif_gs_events.absenta_manual_description amd 
left join ( select *  from  atif_attendance_staff.staff_attendance_in aii where aii.staff_id=".$staff_id." ) as ai
on (  ai.staff_id = amd.staff_id and ai.created = amd.created)
left join ( select * from  atif_attendance_staff.staff_attendance_out ao where ao.staff_id=".$staff_id." ) as ao
on (  ao.date = amd.date and ai.location_id = ao.location_id and ao.created = amd.created )
where amd.staff_id=".$staff_id."
and amd.record_deleted =0
and ai.record_deleted =0 
and ao.record_deleted =0
and amd.id=".$Absentia_id."";


				
				$staff = DB::connection($this->dbCon)->select($query);
				return $staff;
			}

        public function getCategory($table_name){
    	$category = DB::connection($this->dbCon)->table($table_name)->get();
    	return $category;
    }

    public function insertComments($table_name,$data){
    	$id = DB::connection($this->dbCon)->table($table_name)->insertGetId($data);
    	return $id;
    }

     public function getStaffComments($staff_id){
 



          $query="SELECT * 
FROM   (SELECT sr.id, 
               sr.name, 
               tp.title, 
               result.date, 
               result.time, 
               Date_format(date, '%a, %b %d %Y')                              AS 
                      date_format, 
               sl.description                                                 AS 
                      d_description, 
               sl.name                                                        AS 
                      location_name, 
               Time_format(time, '%h:%i %p') 
               time_12hr 
                      , 
               result.type, 
               Concat(tp.title, ' ', sr.name, ' ',' on ',
               Date_format(date, '%a, %b %d %Y'), 
               ' tap his/her card ', sl.description ,' at ', Time_format(time, '%h:%i %p')) AS 
                      description 
        FROM   (SELECT *, 
                       'tap-in' AS TYPE 
                FROM   atif_attendance_staff.staff_attendance_in si 
                WHERE  si.staff_id = $staff_id 
                UNION ALL 
                SELECT *, 
                       'tap-out' AS type 
                FROM   atif_attendance_staff.staff_attendance_out so 
                WHERE  so.staff_id = $staff_id) AS result 
               inner join atif_attendance.attendance_location sl 
                       ON sl.id = result.location_id 
               inner join atif.staff_registered sr 
                       ON sr.id = result.staff_id 
               left join atif._title_person tp 
                      ON tp.id = sr.title_person_id) AS old_data 
UNION ALL 
(SELECT hfs.staff_id                               AS id, 
        sr.name                                    AS NAME, 
        tp.title                                   AS title, 
        hfs.date                                   AS date, 
        hfs.time                                   AS time, 
        Date_format(hfs.date, '%a, %b %d %Y')      AS date_format, 
        hfs.description                            AS d_description, 
        Concat( sdd.first_name, ' ',sdd.last_name,'//',srr.employee_id,'//',sdd.id) AS location_name, 
        Time_format(hfs.time, '%h:%i %p')                AS time_12hr, 
        hfs.type                                   AS type, 
        CASE 
          WHEN 
hfs.effected_entry_table = 'atif_gs_events.absenta_manual_description' 
AND ( hfs.TYPE = 'insert' 
       OR hfs.TYPE = 'updated' ) and hfs.title!='Miss Tap' THEN 
          Concat('Absentia form', ' ', IF(hfs.type='insert',' submitted ',' edited '), ' for ', sr.abridged_name, 
          ' with following details:
       <br>
       <strong>Form-No: </strong>',hfs.form_number,'
       
       <br><strong>Title</strong>: ' 
        , hfs.title, '<br><strong>Date</strong>: ', 
          Date_format(Split_string(hfs.time_details, '///', 3), '%a, %b %d %Y'), 
          '<br><strong>Start Time: ' 
        , Time_format(Split_string(hfs.time_details, '///', 2),'%h:%i %p'), '<br>End Time: ', 
          Time_format(Split_string(hfs.time_details, '///', 1),'%h:%i %p'), '<br>', 
          IF(hfs.description <> '', Concat('Description: ', hfs.description), '') 
        ) 
        
WHEN 
hfs.effected_entry_table = 'atif_gs_events.absenta_manual_description' 
AND ( hfs.TYPE = 'delete' ) and hfs.title!='Miss Tap' THEN 
          Concat('Absentia ', ' ', 'Form No: ',hfs.form_number, ' for ', sr.abridged_name, 
          ' has been deleted')
          
  WHEN 
hfs.effected_entry_table = 'atif_gs_events.leave_application' 
AND ( hfs.TYPE = 'insert' 
       OR hfs.TYPE = 'updated' )  THEN 
          Concat('Leave Application form',IF(hfs.type='insert',' submitted ',' edited ') ,'for ', sr.abridged_name, 
          ' with following details:
       <br>
       <strong>Form-No</strong>',': ',hfs.form_number,'
       
       <br><strong>Title</strong>: ' , hfs.title, 
        
          '<br><strong>From Date: ' , Date_format(Split_string(hfs.time_details, '///', 1),'%a, %b %d %Y'), 
       '<br><strong>To Date: </strong>',Date_format(Split_string(hfs.time_details, '///', 2),'%a, %b %d %Y'), 
       '<br><strong>From Time: </strong>',IF(Split_string(hfs.time_details, '///', 4)<>'none',time_format(Split_string(hfs.time_details, '///', 3),'%h:%i %p'),'none'), 
       '<br><strong>To Time: </strong>',IF(Split_string(hfs.time_details, '///', 4)<>'none',time_format(Split_string(hfs.time_details, '///', 4),'%h:%i %p'),'none'), 
       '<br>', IF(hfs.description <> '', Concat('Description: ', hfs.description), 'none') 
        ) 
        
WHEN 
hfs.effected_entry_table = 'atif_gs_events.leave_application' 
AND ( hfs.TYPE = 'delete' ) THEN 
          Concat('Leave Application form ', ' ', 'Form No: ',hfs.form_number, ' for ', sr.abridged_name, 
          ' has been deleted')
          
          
WHEN 
hfs.effected_entry_table = 'atif_gs_events.exception_adjustment' 
AND ( hfs.TYPE = 'insert' 
       OR hfs.TYPE = 'updated' )  THEN 
          Concat('Adjustment form',IF(hfs.type='insert',' submitted ',' edited ') ,'for ', sr.abridged_name, 
          ' with following details:
       <br>
       <strong>Form-No</strong>',': ',hfs.form_number,'

      <br><strong>Title</strong>: ' , hfs.title, 

      '<br><strong>No of Days: ' , hfs.time_details, 

       '<br>', IF(hfs.description <> '', Concat('Description: ', hfs.description), '') 
        ) 
WHEN 
hfs.effected_entry_table = 'atif_gs_events.exception_adjustment' 
AND ( hfs.TYPE = 'deleted' ) THEN 
          Concat('Adjustment ', ' ', 'Form No: ',hfs.form_number, ' for ', sr.abridged_name, 
          ' has been deleted')
       
  WHEN 
hfs.effected_entry_table = 'atif_gs_events.absenta_manual_description' 
AND ( hfs.TYPE = 'insert' 
       OR hfs.TYPE = 'updated' ) AND hfs.title='Miss Tap' THEN 
          Concat('Missed Tap form',IF(hfs.type='insert',' submitted ',' edited ') ,'for ', sr.abridged_name, 
          ' with following details:
       <br>
       <strong>Form-No</strong>',': ',hfs.form_number,
          '<br><strong>Date: ' , date_format(Split_string(hfs.time_details, '///', 2),'%a, %b %d %Y'), 
        '<br><strong>Time: ' , Time_format(Split_string(hfs.time_details, '///', 1),'%h:%i %p'), 
       '<br>', IF(hfs.description <> '', Concat('Description: ', hfs.description), '') 
        ) 
WHEN 
hfs.effected_entry_table = 'atif_gs_events.absenta_manual_description' 
AND ( hfs.TYPE = 'deleted' ) AND hfs.title='Miss Tap' THEN 
          Concat('Missed Tap ', ' ', 'Form No: ',hfs.form_number, ' for ', sr.abridged_name, 
          ' has been deleted')
       
       
  WHEN 
hfs.effected_entry_table = 'atif_gs_events.daily_penalty' 
AND ( hfs.TYPE = 'insert' 
       OR hfs.TYPE = 'updated' )  THEN 
          Concat('Leave Penalty ','for ', sr.abridged_name, 
          ' with following details has been',IF(hfs.type='insert',' submitted ',' edited ') ,':
       <br>
       <strong>Form-No:</strong>',' ',hfs.form_number,'
       
       <br><strong>Penalty Title</strong>: ' , hfs.title, 
       
        '<br><strong>No of Days: ' , Split_string(hfs.time_details, '///', 1), 
       '<br><strong>From Date: </strong>',date_format(Split_string(hfs.time_details, '///', 2),'%a, %b %d %Y'), 
       '<br><strong>To Date: </strong>',date_format(Split_string(hfs.time_details, '///', 3),'%a, %b %d %Y'), 
       '<br>', IF(hfs.description <> '', Concat('Description: ', hfs.description), '') 
        )  
WHEN 
hfs.effected_entry_table = 'atif_gs_events.daily_penalty' 
AND ( hfs.TYPE = 'deleted' )  THEN 
          Concat('Leave Penalty ', ' ', 'Form No: ',hfs.form_number, ' for ', sr.abridged_name, 
          ' has been deleted')         
        
        
        
          
          ELSE NULL 
        END                                        AS description 
 FROM   atif_gs_events.hr_forms_logs hfs 
        inner join atif.staff_registered sr 
                ON sr.id = hfs.staff_id 
        inner join atif_gs_sims.users sdd 
                ON sdd.id = hfs.updated_by 
        inner join atif.staff_registered srr
					 ON srr.gg_id=sdd.email
        left join atif._title_person tp 
               ON tp.id = sr.title_person_id 
 WHERE  hfs.staff_id = $staff_id) 
ORDER  BY date DESC, 
          TIME DESC";


          // die;
	

	     $comments = DB::connection($this->dbCon)->select($query);

	    
		return $comments;
    }


    public function get($table_name, $where){
    	
    if($where == ''){
    $return_get = DB::connection($this->dbCon)->table($table_name)->get();

    }else{
    $return_get = DB::connection($this->dbCon)->table($table_name)->where($where)->get();
		}

    return $return_get;
    }


    public function get_ks($table_name,$where){
    	
    	if($where == ''){
    	$get = DB::connection($this->dbCon)->table($table_name)->get();

    	}else{
    	$get = DB::connection($this->dbCon)->table($table_name)->where($where)->get();

    	}

    	return $get;
    }

    public function generateReportByStaff($date,$staff_id){
        

        $Result = DB::connection( $this->dbCon )->select("Call atif_gs_events.Generate_Staff_Report_By_StaffID('".$date."','".$staff_id."')");
        return $Result;
    }




    public function getStaffManual($staff_id){
   $query = "select mdes.form_number,Concat(DATE_FORMAT(from_unixtime(sai.created),'%a %b %d %Y'),', at ',DATE_FORMAT(from_unixtime(sai.created),'%I:%i %p')) as created_time,
				DATE_FORMAT(sai.date,'%a %b %d %Y') as date,Date_FORMAT(sai.time,'%I:%i %p') as manual_time, mdes.id as Manual_id, mdes.description,
				sai.id as Missed_id,'In_Table' as Table_name
				from atif_attendance_staff.staff_attendance_in as sai left join atif_gs_events.absenta_manual_description mdes on sai.`created` = mdes.`created`  where sai.staff_id = ".$staff_id." and sai.location_id = 18 and mdes.record_deleted = 0

UNION 

select mdes.form_number,Concat(DATE_FORMAT(from_unixtime(sao.created),'%a %b %d %Y'),', at ',DATE_FORMAT(from_unixtime(sao.created),'%I:%i %p')) as created_time,
				DATE_FORMAT(sao.date,'%a %b %d %Y') as date,Date_FORMAT(sao.time,'%I:%i %p') as manual_time, mdes.id as Manual_id, mdes.description,
				sao.id as Missed_id, 'Out_Table' as Table_name
				from atif_attendance_staff.staff_attendance_out as sao left join atif_gs_events.absenta_manual_description mdes on sao.`created` = mdes.`created`  where sao.staff_id = ".$staff_id." and sao.location_id = 18 and mdes.record_deleted = 0 
				order by created_time desc";
				

	$staff = DB::connection($this->dbCon)->select($query);
	    
		return $staff;

    }


public function getSingleStaffManualTime($Manual_id){
		
	 $Qeury = "select * from ( 
select sai.id as Tap_id, 
				(sai.date) as Dated,
				(sai.time) as manual_time, 
				mdes.id as Manual_id, 
				mdes.description,
				mdes.form_number,
				sai.id as Missed_id,
				'In_Table' as Table_name	
				
				from atif_attendance_staff.staff_attendance_in as sai left join atif_gs_events.absenta_manual_description mdes on sai.`created` = mdes.`created`  where sai.location_id = 18 and mdes.record_deleted = 0



UNION 

select sao.id as Tap_id, 
				(sao.date) as Dated,
			(sao.time)  as manual_time,
			 mdes.id as Manual_id, mdes.description,
			 	sao.id as Missed_id, 'Out_Table' as Table_name,
			 	'form_number' as form_number
			 	


				from atif_attendance_staff.staff_attendance_out as sao left join atif_gs_events.absenta_manual_description mdes on sao.`created` = mdes.`created`  where sao.location_id = 18 and mdes.record_deleted = 0 
) as d
where d.Manual_id=".$Manual_id."";

$staff = DB::connection($this->dbCon)->select($Qeury);
	    return $staff;


	}


    public function update_data($table_name,$where,$data){
        $update_data =  DB::table($table_name)->where($where)->update($data);
        return $update_data;
    }

    public function get_leave_desscription($staff_id){
    	
    	$query  = "Select 
    	TIME_FORMAT(la.time_from,'%h:%i:%s %p') as time_from,
    	TIME_FORMAT(la.time_to,'%h:%i:%s %p') as time_to,
    	TIME_FORMAT(la.leave_approve_time_from,'%h:%i:%s %p') as leave_approve_time_from,
    	TIME_FORMAT(la.leave_approve_time_to,'%h:%i:%s %p') as leave_approve_time_to,

    	la.form_no as form_number,la.id,lt.leave_type_name,la.leave_title,DATE_FORMAT(la.leave_from,'%a, %d %b %Y') as leave_from,
			DATE_FORMAT(la.leave_to,'%a, %d %b %Y') as leave_to,
			if(la.paid_compensation=1,'Yes','No') as paid_compensation,
			if(la.paid_percentage=null,'',CONCAT(la.paid_percentage,'% paid')) as paid_percentage,
			la.leave_approve_status,DATE_FORMAT(la.leave_approve_date_from,'%a ,%d %b %Y') as leave_approve_date_from,
			DATE_FORMAT(la.leave_approve_date_to,'%a ,%d %b %Y') as leave_approve_date_to,if(la.leave_description  is null , '',la.leave_description) as leave_description
			 
			from atif_gs_events.leave_application la

			left join atif_gs_events.leave_type lt on lt.id = la.leave_type where la.staff_id = ".$staff_id." and la.record_deleted=0 order by la.modified desc";
		$leave_description = DB::connection($this->dbCon)->select($query);
		return $leave_description;
    }

    public function getAttendance($date,$staff_id){
	    $query = "SELECT
		(SELECT MIN(time) from atif_attendance_staff.staff_attendance_in sai where sai.staff_id = ".$staff_id." 
		and sai.date = '".$date."' and (sai.location_id = 4 or sai.location_id = 3) limit 1 ) as tap_in,

		(SELECT MAX(time) from atif_attendance_staff.staff_attendance_out sao where sao.staff_id = ".$staff_id." 
		and sao.date = '".$date."' and (sao.location_id = 4 or sao.location_id = 3) limit 1) as tap_out,

		(SELECT MIN(time) from atif_attendance_staff.staff_attendance_in mai where mai.staff_id = ".$staff_id." 
		and mai.date = '".$date."' and (mai.location_id = 18) limit 1) as manual_tap_in,

		(SELECT MAX(time) from atif_attendance_staff.staff_attendance_out mao where mao.staff_id = ".$staff_id." 
		and mao.date = '".$date."' and (mao.location_id = 18) limit 1) as manual_tap_out";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
    }   

	public function getPenalty($staff_id){
		$query = "SELECT dp.form_number,dp.id,dp.penalty_title,dp.penalty_day, CONCAT(DATE_FORMAT(dp.penalty_from, '%a %b %d, %Y'),'-', DATE_FORMAT(dp.penalty_to, '%a %b %d, %Y')) AS 'penalty_date', DATE_FORMAT(FROM_UNIXTIME(dp.created),'%a %b %d, %Y at %r') AS 'timestamp',dp.penalty_description
			FROM atif_gs_events.daily_penalty dp
			WHERE dp.staff_id = ".$staff_id." AND dp.record_deleted=0 order by dp.modified desc";

			
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
public function getSinglePenalty($ID){
		$query = "SELECT * 
			FROM atif_gs_events.daily_penalty dp
			WHERE dp.id = ".$ID."";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
	
	public function getExceptionAdjustment($staff_id){
	$query = "SELECT ea.form_number,ea.id, IFNULL(ea.adjustment_title,'') AS adjustment_title, ea.adjustment_day, DATE_FORMAT(FROM_UNIXTIME(ea.modified),'%a %b %d %Y, at %r') AS created, IFNULL(ea.adjustment_description,'') AS adjustment_description
			FROM atif_gs_events.exception_adjustment ea
			WHERE ea.staff_id = ".$staff_id." AND ea.record_deleted=0 order by ea.modified desc";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}

	public function getSingleExceptionAdjustment($staff_id){
		$query = "SELECT *
			FROM atif_gs_events.exception_adjustment ea
			WHERE ea.id = ".$staff_id."";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}

	public function getYesterdayReportData($date,$staff_id){        
		$query = "SELECT dar.staff_id,dar.absentia_tap_in,dar.absentia_tap_out,dar.actual_tap_in,dar.actual_tap_out,
			wts.time_in AS weeklyTapIn,wts.time_out AS weeklyTapOut,dar.remaining_buffer,dar.utlilize_buffer,dar.date,dar.compliance_one,
			dar.compliance_two,dar.daily_factor,dar.remaining_leave,dar.saturday_remaining,dar.deduction,sai.time AS absenstia_allocated_out,
			tpts.daily_relax_in  ,tpts.monthly_relax_in,
			sao.time AS absentia_allocated_in,ROUND((
			SELECT leave_balance
			FROM atif.staff_registered
			WHERE id = dar.staff_id),1) AS previous_remaing_leave
			FROM atif_gs_events.daily_attendance_report dar
			LEFT JOIN atif_gs_events.weekly_time_sheet wts ON (wts.staff_id = dar.staff_id AND wts.date = dar.date)
			LEFT JOIN atif_attendance_staff.staff_attendance_in sai ON (sai.staff_id = dar.staff_id AND sai.date = dar.date AND sai.location_id = 17)
			LEFT JOIN atif_attendance_staff.staff_attendance_out sao ON (sao.staff_id = dar.staff_id AND sao.date = dar.date AND sao.location_id = 17)
			LEFT JOIN atif_gs_events.tt_profile_time_staff tpts on (dar.staff_id = tpts.staff_id)
			WHERE dar.staff_id = ".$staff_id." AND dar.date = '".$date."'";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}

	public function getDailyReportData($staff_id,$from_date,$to_date){
		$query = "CALL atif_gs_events.`sp_get_attendance_info`(".$staff_id.",'".$from_date."','".$to_date."')";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
	public function getLeaveApprovals($staff_id,$from_date){
		$query = "SELECT * FROM atif_gs_events.leave_approved lp
		inner join atif_gs_events.leave_application la
		on la.id=lp.leave_application_id
		where la.staff_id='$staff_id' and lp.approve_date='$from_date' and la.leave_approve_status=1";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}



	public function updateWeeklyTimeSheet($from_date,$to_date){

		$query = "CALL atif_gs_events.`sp_generate_time_sheet`('".$from_date."','".$to_date."')";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;

	}

		public function updateWeeklyTimeSheetByStaff($StaffID, $from_date,$to_date){

		$query = "CALL atif_gs_events.`sp_generate_time_sheet_staff`('".$StaffID."','".$from_date."','".$to_date."')";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;

	}


	public function selectWeeklySheetTap($staff_id,$date){
		$query = "Select time_in,time_out from atif_gs_Events.weekly_time_sheet where staff_id = ".$staff_id." and date = '".$date."'";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
	        
    public function getStaffAttendance($staff_id,$date){
		$query = "Select 
			( select count(staff_attendance_in.id) from atif_attendance_staff.staff_attendance_in as staff_attendance_in
			where staff_attendance_in.staff_id = ".$staff_id." and  staff_attendance_in.date = '".$date."' and staff_attendance_in.location_id in (3,4,18) and staff_attendance_in.record_deleted=0 ) as attendance_in , 

			( select count(staff_attendance_out.id) from atif_attendance_staff.staff_attendance_out as staff_attendance_out
			where staff_attendance_out.staff_id = ".$staff_id." and  staff_attendance_out.date = '".$date."' and staff_attendance_out.location_id in (3,4,18)  and staff_attendance_out.record_deleted=0 ) as attendance_out";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}


	public function getCurrentLeave($staff_id){
		$query = "SELECT CONCAT(IFNULL(dar.remaining_leave,'10'),'/',sr.total_leaves) AS currentLeave
			FROM atif.staff_registered sr
			LEFT JOIN atif_gs_events.daily_attendance_report dar ON (dar.staff_id = sr.id AND dar.date = CURDATE() - INTERVAL 1 DAY)
			WHERE sr.id = ".$staff_id;
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}

	public function setAttendanceInfo($staff_id,$from_date,$to_date){
		$query = "CALL atif_gs_events.`sp_set_attendance_info`('".$staff_id."','".$from_date."','".$to_date."')";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
	
	
	public function Get_Staff_Role($Staff_role_id)
	{
		$query = "CALL atif_role_org.sp_get_role_upward_info('".$Staff_role_id."')";
		$result = DB::connection($this->dbCon)->select($query);
		
		$i = 0;
	    foreach ($result as $u) {
	    	if( $u->employee_id == '' )
	    	{
	    		$pic = $this->get_Staff_Pic(0, 'M');
		    	$result[$i]->photo500 = $pic['photo500'];
		    	$result[$i]->photo150 = $pic['photo150'];	

	    	}else
	    	{
	    		$pic = $this->get_Staff_Pic($u->employee_id, $u->gender);
		    	$result[$i]->photo500 = $pic['photo500'];
		    	$result[$i]->photo150 = $pic['photo150'];	
	    	}
		    
		    $i++;
	    }

	    return $result;	
	}
	
	
	public function Get_Current_Staff_Role($Staff_role_id)
	{
		$query = "CALL atif_role_org.sp_get_role_info('".$Staff_role_id."')";
		$result = DB::connection($this->dbCon)->select($query);
		
		$i = 0;
	    foreach ($result as $u) {
		    $pic = $this->get_Staff_Pic($u->employee_id, $u->gender);
		    $result[$i]->photo500 = $pic['photo500'];
		    $result[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }

	    return $result;	
	}
	
	
	
	public function Get_Current_Staff_Role_Single($Staff_role_id,$Staff_role_id_single)
	{
		$query = "CALL atif_role_org.sp_get_role_info_single( '".$Staff_role_id."', '".$Staff_role_id_single."' )";
		$result = DB::connection($this->dbCon)->select($query);
		
		$i = 0;
	    foreach ($result as $u) {
		    $pic = $this->get_Staff_Pic($u->employee_id, $u->gender);
		    $result[$i]->photo500 = $pic['photo500'];
		    $result[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }

	    return $result;	
	}

	public function profile_type(){
		$query = "SELECT id,name,dname,sname,is_day_wise,
		CASE
		        WHEN name = 'Standard' 	THEN 'standardProfile'
		        WHEN name = 'Custom' 	 	THEN 'customProfile'
		        WHEN name = 'Part Time' 	THEN 'parttimeProfile'
		        WHEN name = '24 Hours' 	THEN '24hourProfie'
		        ELSE NULL
		   END AS javascript_displayToggle
		 from atif_gs_events.tt_profile_type";

		  return DB::connection('mysql')->select($query);

	}

	// CUT OF DATE 
	public function get_cut_date(){
			$query  = "SELECT cd.name, 
			CONCAT(YEAR(CURDATE()),'-', DATE_FORMAT(NOW()- INTERVAL 1 MONTH,'%m'),'-',cd.lock_day_start) as from_date,
			DATE_ADD(CONCAT(YEAR(CURDATE()),'-', DATE_FORMAT(NOW(),'%m'),'-',cd.lock_day_end), INTERVAL cd.lock_day_buffer DAY)as to_date,curdate() as currentDate,DATE_ADD(CONCAT(YEAR(CURDATE()),'-', DATE_FORMAT(NOW(),'%m'),'-',cd.lock_day_end), INTERVAL 1 DAY) as new_payroll_start
			FROM atif_gs_events.cutoff_date_hr_attendance cd";
		return DB::connection('mysql')->select($query);
	}

	// Get Yesterday Date
	public function getYesterdayDate($staff_id){
		$query = "SELECT MAX(DATE) as 'yesterdayDate'
				    FROM 
					atif_gs_events.daily_attendance_report
					WHERE staff_id = $staff_id";
		return DB::connection('mysql')->select($query);
	}

	/*
	* Insert Daily Attendance Record
	*/

	public function insertDailyRecord($date,$staff_id){

		$insertFlag =  DB::connection($this->dbCon)->insert("INSERT INTO 
		atif_gs_events.daily_attendance_report(
		remaining_buffer,utilize_buffer,remaining_buffer_out,utilize_buffer_out,leave_balance,
		remaining_leave,saturday_remaining,compliance_in,compliance_duration,compliance_out,
		daily_factor,deduction,staff_id,date
		)

		SELECT tpts.monthly_relax_in AS 'remaining_buffer','0' AS 'utilize_buffer',
		tpts.monthly_relax_out AS 'remaining_buffer_out','0' AS 'utilize_buffer_out',
		'10' AS 'leave_balance','10' AS 'remaining_leave', '1' AS 'saturday_remaining',
		'1' AS 'compliance_in','1' AS 'compliance_duration','1' AS 'compliance_out', '0' AS 'daily_factor',
		'0' AS 'deduction',$staff_id as staff_id,'$date' as date
		FROM 
		atif_gs_events.tt_profile_time_staff tpts
		WHERE tpts.staff_id = $staff_id");

		return $insertFlag;
	}

	/*
	*
	*Update Daily Record
	*/

	public function updateDailyRecord($yesterdayDate,$staff_id,$leaveBalance,$leaveRemaining){
		$updateRecord = $staff = DB::connection($this->dbCon)
	    		->update("UPDATE atif_gs_events.daily_attendance_report dar
				LEFT JOIN atif_gs_events.tt_profile_time_staff ttpts ON ttpts.staff_id = dar.staff_id SET

				dar.remaining_buffer = ttpts.monthly_relax_in,
				dar.utilize_buffer = 0,
				dar.remaining_buffer_out = ttpts.monthly_relax_out,
				dar.utilize_buffer_out = 0,
				dar.remaining_leave = $leaveRemaining,
				dar.leave_balance = $leaveBalance,
				dar.saturday_remaining = 1,
				dar.compliance_in = 1,
				dar.compliance_duration = 1,
				dar.compliance_out = 1,
				dar.daily_factor = 1,
				dar.deduction = 0
				WHERE dar.staff_id = $staff_id AND dar.date = '$yesterdayDate'");
		return $updateRecord;
	}

	public function getRemaingLeave($yesterdayDate,$staff_id){
		$query = "SELECT *
				FROM atif_gs_events.daily_attendance_report
				WHERE DATE = '$yesterdayDate' AND staff_id = $staff_id";
		return DB::connection('mysql')->select($query);
	}

	// Get Other Adjustment
	public function getOtherAdjustment($staffID){

		$query = "select
		ea.staff_id, ea.adjustment_title as adjustment_type, ea.adjustment_description,
		dar.leave_balance as previous_el_balance, dar.deduction,
		ea.adjustment_day as adjustment,
		dar.remaining_leave as new_el_balance,
		date_format(from_unixtime(ea.created), '%a %M, %d %Y') as date, sr.name_code as register_by,
		date_format(from_unixtime(ea.created), '%Y-%m-%d') as stamp
		from atif_gs_events.exception_adjustment as ea
		left join atif_gs_events.daily_attendance_report as dar
			on dar.staff_id = ea.staff_id
			and date_format(from_unixtime(dar.created), '%Y-%m-%d') = date_format(from_unixtime(ea.created), '%Y-%m-%d')
		left join atif.staff_registered as sr
			on sr.user_id = ea.created_by
		where ea.staff_id = $staffID



		UNION



		select
		dar.staff_id, IF(sai.date is null, 'Attendance Deduction', 'Miss Tap') as adjustment_type, '' as adjustment_description,
		dar.leave_balance as previous_el_balance, dar.deduction,
		dar.deduction as adjustment,
		dar.remaining_leave as new_el_balance,
		date_format(from_unixtime(dar.created), '%a %M, %d %Y') as date, 'System' as register_by,
		dar.date as stamp
		from atif_gs_events.daily_attendance_report as dar
		left join (select
			sai.staff_id, sai.date
			from atif_attendance_staff.staff_attendance_in as sai
			where sai.staff_id = $staffID
			and sai.location_id = 18
			group by sai.date) as sai
			on sai.staff_id = dar.staff_id
			and sai.date = dar.date
		where dar.leave_balance != dar.remaining_leave
		and dar.remaining_leave != 10
		and dar.staff_id = $staffID


		order by stamp";
		return DB::connection('mysql')->select($query);

	}


	// Get Leave Approved

	public function get_leaveApproved($where){

		$query = "SELECT * FROM atif_gs_events.leave_approved where staff_id = ".$where['staff_id']." and leave_application_id = ".$where['leave_application_id'];
		return DB::connection('mysql')->select($query);
	}


 	// Get daily Leave Report For Attendance

 	public function getLeaveDailyReport($staff_id,$date){
 		 $query = "SELECT la.id,la.paid_compensation,group_concat(la.paid_percentage) as paid_percentage,group_concat(date),lp.staff_id,lp.date,lp.time_from,lp.time_to, 
			group_concat(CONCAT(IF(lp.time_from IS NOT NULL OR lp.time_from != '', CONCAT(IF(la.paid_percentage=100, '10', LEFT(la.paid_percentage, 1)), 'o'),''),',', IF(lp.time_to IS NOT NULL OR lp.time_to != '',CONCAT(IF(la.paid_percentage=100, '10', LEFT(la.paid_percentage, 1)), 'i'),''))) AS leave_time_code,
			group_concat(concat(lp.time_from,',',lp.time_to)) as leave_time
			FROM atif_gs_events.leave_application la
			left join atif_gs_events.leave_approved lp on (lp.leave_application_id = la.id and lp.date = '$date')
			where la.leave_approve_status = 1  and lp.record_deleted = 0 and la.staff_id = $staff_id and lp.date  = '$date'";
			// die;
		return DB::connection('mysql')->select($query);
 	}

}