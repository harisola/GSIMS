<?php
/******************************************************************
* Author: 	Atif Naseem
* Email: 	atif.naseem22@gmail.com
* Cell: 	+92-313-5521122
*******************************************************************/


namespace App\Models\Staff\Staff_Adjustment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;

class StaffAdjustmentModel extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'staff_registered';
    protected $dbCon = 'mysql';

    public function getStaffAbsentia(){
    
		$query = "select *, 
					aia.id as absentia_id, 
					sao.`record_deleted` as saoDeleted , 
					sai.`record_deleted` as saiDeleted , 
					TIME_FORMAT(sai.time, '%h:%i %p')  as aiaEnd_time, 
					TIME_FORMAT(sao.time, '%h:%i %p')   as aiaStart_time, 
					from_unixtime(aia.`created`, '%W, %D %b %Y at %r ') as aiaStamp , 
					from_unixtime(aia.`modified`, '%W, %D %b %Y at %r') as aiaModifiedStamp ,
					from_unixtime(aia.`modified`, '%D %b %Y') as aiaModifiedOn ,  
					aia.`description` as aiaDescription, 
					aia.title as aiaTitle, 
					DATE_FORMAT(aia.date, '%W, %d %b %Y') as applyDate, 

					from_unixtime(aia.`modified`, '%D %b %Y') as deleted_on, 
					(Select name_code from atif.staff_registered where id = aia.`modified_by`) as deleted_by 

					from 
					atif_gs_events.absenta_manual_description as aia , 
					atif.staff_registered as sr, 
					atif_attendance_staff.staff_attendance_in as sai,  
					atif_attendance_staff.staff_attendance_out as sao 

					where 
					aia.staff_id = sr.id 
					and aia.location_id = 17 
					and sai.location_id = 17 
					and sao.location_id = 17 
					and aia.created = sai.created  
					and aia.created = sao.created 
					and aia.staff_id = sai.staff_id 
					and aia.staff_id = sao.staff_id   
					 order by aiaModifiedStamp  desc";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}

    public function getStaffLeave(){
		$query = "select *, la.id as leave_id , la.record_deleted as rd,  from_unixtime(la.`created`, '%D %b %Y') as laStamp, la.`created` as sort, from_unixtime(la.`modified`, '%D %b %Y') as deleted_on,from_unixtime(la.`modified`, '%W, %D %b %Y at %r ') as modifiedStamp, from_unixtime(la.`modified`, '%D %b %Y') as laModifiedOn , (Select name_code from atif.staff_registered where id = la.`modified_by`) as deleted_by ,  DATE_FORMAT(la.leave_from, '%W, %d %b %Y') as startDate,DATE_FORMAT(la.leave_to, '%W, %d %b %Y') as endDate from atif_gs_events.leave_application as la, atif.staff_registered as sr where la.staff_id = sr.id  order by la.`modified` asc";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}

    public function getStaffPenalty(){
		$query = "select *, dp.id as penalty_id, dp.record_deleted as rd,  from_unixtime(dp.`created`, '%D %b %Y') as dpStamp , from_unixtime(dp.`modified`, '%W, %D %b %Y at %r ') as dpModifiedStamp ,from_unixtime(dp.`modified`, '%D %b %Y') as dpModifiedOn , from_unixtime(dp.`modified`, '%D %b %Y at %r') as deleted_on, (Select name_code from atif.staff_registered where id = dp.`modified_by`) as deleted_by ,  DATE_FORMAT(dp.penalty_from, '%W, %d %b %Y') as startDate,DATE_FORMAT(dp.penalty_to, '%W, %d %b %Y') as endDate from atif_gs_events.daily_penalty as dp, atif.staff_registered as sr where dp.staff_id = sr.id  order by startDate asc";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
	public function getLoginUserInfo($id){
		$query = "select * from atif.staff_registered as sr where sr.id = $id ";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;		

	}
    public function getStaffException(){
		$query = "select *, ea.id as exceptional_id, ea.record_deleted as rd,  from_unixtime(ea.`created`, '%W, %d %b %Y') as onDate ,  from_unixtime(ea.`created`, '%D %b %Y') as eaStamp,  from_unixtime(ea.`modified`, '%W, %d %b %Y at %r') as eaModifiedStamp , from_unixtime(ea.`modified`, '%D %b %Y') as eaModifiedOn , from_unixtime(ea.`modified`, '%D %b %Y') as deleted_on, (Select name_code from atif.staff_registered where id = ea.`modified_by`) as deleted_by  from atif_gs_events.exception_adjustment as ea, atif.staff_registered as sr where ea.staff_id = sr.id  order by ea.`created` asc";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}	

    public function getStaffMisstap(){
		$query = "select *, DATE_FORMAT(sai.`date`, '%W, %d %b %Y')  as missTap_date, 
						sai.record_deleted as rd,
						from_unixtime(sai.`created`, '%D %b %Y') as mtStamp , 
						from_unixtime(sai.`modified`, '%D %b %Y') as deleted_on,
						from_unixtime(sai.`modified`, '%W, %d %b %Y at %r') as modifiedStamp, 
						from_unixtime(sai.`modified`, '%D %b %Y') as misstapModifiedOn ,
						(Select name_code from atif.staff_registered where id = sai.`modified_by`) as deleted_by,
			 			Concat(DATE_FORMAT(from_unixtime(sai.created),'%a %b %d %Y'),', at ',DATE_FORMAT(from_unixtime(sai.created),'%I:%i %p')) as created_time,
						DATE_FORMAT(sai.date,'%a %b %d %Y') as date,
						Date_FORMAT(sai.time,'%I:%i %p') as manual_time, 
						mdes.id as Manual_id, 
						mdes.description as manual_description,
						sai.id as Missed_id,
						'In_Table' as Table_name
					
						from 

						atif_attendance_staff.staff_attendance_in as sai,
						atif_gs_events.absenta_manual_description as mdes,
						atif.staff_registered as sr
						where 

						sai.`created` = mdes.`created` and
						mdes.staff_id = sai.staff_id and
						sai.staff_id = sr.id and   
						sai.location_id = 18 

		UNION 

		select * , DATE_FORMAT(sao.`date`, '%W, %d %b %Y')   as missTap_date , sao.record_deleted as rd,
				from_unixtime(sao.`created`, '%D %b %Y') as mtStamp , 
				from_unixtime(sao.`modified`, '%D %b %Y') as deleted_on, 
				from_unixtime(sao.`modified`, '%W, %d %b %Y at %r') as modifiedStamp, 
				from_unixtime(sao.`modified`, '%D %b %Y') as misstapModifiedOn ,
				(Select name_code from atif.staff_registered where id = sao.`modified_by`) as deleted_by,
					Concat(DATE_FORMAT(from_unixtime(sao.created),'%a %b %d %Y'),', at ',DATE_FORMAT(from_unixtime(sao.created),'%I:%i %p')) as created_time,
						DATE_FORMAT(sao.date,'%a %b %d %Y') as date,Date_FORMAT(sao.time,'%I:%i %p') as manual_time, mdes.id as Manual_id, mdes.description as manual_description,
						sao.id as Missed_id, 'Out_Table' as Table_name
						from 
						atif_attendance_staff.staff_attendance_out as sao, 
						atif_gs_events.absenta_manual_description as mdes,
						atif.staff_registered as sr 
						where
						sao.`created` = mdes.`created` and 
						sao.staff_id = sr.id and  
						mdes.staff_id = sao.staff_id and
						sao.location_id = 18 
						order by Manual_id";
		$staff = DB::connection($this->dbCon)->select($query);
	    
		return $staff;
	}	

    public function getStaffAbsentiaLogs(){
    
		$query = " (Select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
					    lsain.this_id as absentia_id, 
                        sr.id as staff_id,
						lsaout.`record_deleted` as outDeleted , 
						lsain.`record_deleted` as inDeleted ,
						TIME_FORMAT(lsain.time, '%h:%i %p')  as aiaEnd_time, 
						TIME_FORMAT(lsaout.time, '%h:%i %p')   as aiaStart_time, 
						from_unixtime(lsain.`created`, '%D %b %Y') as aiaStamp,
					    lamd.`description` as aiaDescription, 
						lamd.title as aiaTitle,
					    DATE_FORMAT(lamd.date, '%W, %d %b %Y') as applyDate, 
						from_unixtime(lamd.`modified`, '%D %b %Y at %r') as modify_on,
						(Select name_code from atif.staff_registered where LEFT(gg_id, LOCATE('@', gg_id)-1) = (select LEFT(email, LOCATE('@', email)-1) from atif_gs_sims.users where id = lamd.`register_by`)) as modify_by,
					
					 	lamd.`modified` as usortModify,
					 	lamd.`modified` as usortCreate


					from 
						atif_gs_events.log_staff_attendance_ma as lsain,
					    atif_gs_events.log_staff_attendance_ma as lsaout,
						atif.staff_registered as sr,
					    atif_gs_events.log_absenta_manual_description lamd
					where  
					    lsain.location_id = 17 
					    and lsaout.location_id = 17 
					    and lsain.is_in = 1 
					    and lsaout.is_in = 0
						and from_unixtime(lamd.`modified`, '%Y %D %M %h %i') = from_unixtime(lsain.modified , '%Y %D %M %h %i')
						and from_unixtime(lamd.`modified`, '%Y %D %M %h %i') = from_unixtime(lsaout.modified , '%Y %D %M %h %i')
						
						and lsain.staff_id = lamd.staff_id 
						and lsaout.staff_id = lamd.staff_id 
					    and lsain.staff_id = sr.id

					     
						
					   
					)  UNION (select
					sr.employee_id as employee_id,
					sr.name as name,
					sr.name_code as name_code,
					sr.c_bottomline as c_bottomline,   
					sai.id as absentia_id,
					sr.id as staff_id, 
					sao.`record_deleted` as outDeleted , 
					sai.`record_deleted` as inDeleted , 
					TIME_FORMAT(sai.time, '%h:%i %p')  as aiaEnd_time, 
					TIME_FORMAT(sao.time, '%h:%i %p')   as aiaStart_time, 
					from_unixtime(aia.`created`, '%D %b %Y') as aiaStamp , 
					aia.`description` as aiaDescription, 
					aia.title as aiaTitle, 
					DATE_FORMAT(aia.date, '%W, %d %b %Y') as applyDate, 
					from_unixtime(aia.`modified`, '%D %b %Y at  %r') as modify_on,
					(Select name_code from atif.staff_registered where LEFT(gg_id, LOCATE('@', gg_id)-1) = (select LEFT(email, LOCATE('@', email)-1) from atif_gs_sims.users where id = aia.`modified_by`)) as modify_by,

					 aia.`modified` as usortModify,
					 aia.`modified` as usortCreate

					from 
					atif_gs_events.absenta_manual_description as aia , 
					atif.staff_registered as sr, 
					atif_attendance_staff.staff_attendance_in as sai,  
					atif_attendance_staff.staff_attendance_out as sao 


					

					where 
					aia.staff_id = sr.id 
					and aia.location_id = 17 
					and sai.location_id = 17 
					and sao.location_id = 17 
					and aia.created = sai.created  
					and aia.created = sao.created 
					and aia.staff_id = sai.staff_id 
					and aia.staff_id = sao.staff_id 



					 )
                      order by usortModify Asc
					";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}

    public function getStaffLeaveLogs(){
    
		$query = " (
				 	Select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
						sr.id as staff_id,
					    lla.this_id as leave_id, 
						lla.leave_title as leave_title, 
						lla.leave_description as leave_description,
						lla.paid_compensation as paid_compensation,
						lla.record_deleted as rd, 
						from_unixtime(lla.`created`, '%D %b %Y') as laStamp , 
						from_unixtime(lla.`modified`, '%D %b %Y at %r') as modify_on, 
						(Select name_code from atif.staff_registered where LEFT(gg_id, LOCATE('@', gg_id)-1) = (select LEFT(email, LOCATE('@', email)-1) from atif_gs_sims.users where id = lla.`modified_by`)) as modify_by,

						DATE_FORMAT(lla.leave_from, '%W, %d %b %Y') as startDate,
						DATE_FORMAT(lla.leave_to, '%W, %d %b %Y') as endDate,

						DATE_FORMAT(lla.leave_approve_date_from, '%W, %d %b %Y') as approve_to ,
						DATE_FORMAT(lla.leave_approve_date_to, '%W, %d %b %Y') as approve_from,


						lla.modified as usort


					from 
						atif_gs_events.log_leave_application as lla,
						atif.staff_registered as sr

					where  
					    lla.staff_id = sr.id
					
					order by usort Asc
					   
					) UNION (select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
						sr.id as staff_id,
					    la.id as leave_id, 
						la.leave_title as leave_title, 
						la.leave_description as leave_description,
						la.paid_compensation as paid_compensation,
				
						la.record_deleted as rd,  
						from_unixtime(la.`created`, '%D %b %Y') as laStamp , 
						from_unixtime(la.`modified`, '%D %b %Y  at %r') as modify_on, 
						(Select name_code from atif.staff_registered where LEFT(gg_id, LOCATE('@', gg_id)-1) = (select LEFT(email, LOCATE('@', email)-1) from atif_gs_sims.users where id = la .`modified_by`)) as modify_by,  
						DATE_FORMAT(la.leave_from, '%W, %d %b %Y') as startDate,
						DATE_FORMAT(la.leave_to, '%W, %d %b %Y') as endDate,
						DATE_FORMAT(la.leave_approve_date_from, '%W, %d %b %Y') as approve_to,
						DATE_FORMAT(la.leave_approve_date_to, '%W, %d %b %Y') as approve_from,


						la.modified as usort

					from 
						atif_gs_events.leave_application as la,
						atif.staff_registered as sr

					where 
						la.staff_id = sr.id   
					 ) 
					

					";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
    public function getStaffPenaltyLogs(){
    
		$query = " (
				 	Select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
						sr.id as staff_id,
						ldp.this_id as penalty_id, 
						ldp.penalty_title as penalty_title,
						ldp.penalty_description as penalty_description, 
						ldp.record_deleted as rd, 
						from_unixtime(ldp.`created`, '%D %b %Y') as dpStamp , 
						from_unixtime(ldp.`modified`, '%D %b %Y at %r') as modify_on, 

						(Select name_code from atif.staff_registered where LEFT(gg_id, LOCATE('@', gg_id)-1) = (select LEFT(email, LOCATE('@', email)-1) from atif_gs_sims.users where id = ldp.`modified_by`)) as modify_by,						 
						DATE_FORMAT(ldp.penalty_from, '%W, %d %b %Y') as startDate,
						DATE_FORMAT(ldp.penalty_to, '%W, %d %b %Y') as endDate,
						ldp.modified as usort


					from 
						atif_gs_events.	log_daily_penalty as ldp,
						atif.staff_registered as sr

					where  
					    ldp.staff_id = sr.id
					    
					   order by usort Asc

					) UNION (select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
						sr.id as staff_id,
						dp.id as penalty_id,
						dp.penalty_title as penalty_title,
						dp.penalty_description as penalty_description, 
						dp.record_deleted as rd,  
						from_unixtime(dp.`created`, '%D %b %Y') as dpStamp , 
						from_unixtime(dp.`modified`, '%D %b %Y at %r') as modify_on, 
						(Select name_code from atif.staff_registered where id = dp.`modified_by`) as modify_by ,  
						DATE_FORMAT(dp.penalty_from, '%W, %d %b %Y') as startDate,
						DATE_FORMAT(dp.penalty_to, '%W, %d %b %Y') as endDate, 
						dp.modified as usort

					from 
						atif_gs_events.daily_penalty as dp,
						atif.staff_registered as sr

					where 
						dp.staff_id = sr.id   
					 ) 
				 

					";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
    public function getStaffExceptionLogs(){
    
		$query = " (
				 	Select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
						sr.id as staff_id,
						lea.id as exceptional_id, 
						lea.record_deleted as rd,  
						lea.adjustment_title as adjustment_title , 
						lea.adjustment_day as adjustment_day,
						lea.adjustment_description  as adjustment_description, 
						from_unixtime(lea.`created`, '%W, %d %b %Y') as onDate ,  
						from_unixtime(lea.`created`, '%D %b %Y') as eaStamp , 
						from_unixtime(lea.`modified`, '%D %b %Y at %r') as modify_on, 
						(Select name_code from atif.staff_registered where id = lea.`modified_by`) as modify_by,
						lea.modified as usort

					from 
						atif_gs_events.	log_exception_adjustment as lea,
						atif.staff_registered as sr

					where  
					    lea.staff_id = sr.id
					    
					   order by usort desc
					) UNION (select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
						sr.id as staff_id,
						ea.id as exceptional_id, 
						ea.record_deleted as rd, 
						ea.adjustment_title  as adjustment_title , 
						ea.adjustment_day as adjustment_day,
						ea.adjustment_description  as adjustment_description, 
						from_unixtime(ea.`created`, '%W, %d %b %Y') as onDate ,  
						from_unixtime(ea.`created`, '%D %b %Y') as eaStamp , 
						from_unixtime(ea.`modified`, '%D %b %Y at %r') as modify_on, 
						(Select name_code from atif.staff_registered where id = ea.`modified_by`) as modify_by, 
						ea.modified as usort

					from 
						atif_gs_events.exception_adjustment as ea,
						atif.staff_registered as sr

					where 
						ea.staff_id = sr.id   
					 )  

					";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
    public function getStaffMisstapLogs(){
    
		$query = "(
				 	Select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
						sr.id as staff_id,

					 	DATE_FORMAT(lsam.`date`, '%W, %d %b %Y')   as missTap_date , lsam.record_deleted as rd,
						from_unixtime(lsam.`created`, '%D %b %Y') as mtStamp , 
						from_unixtime(lsam.`modified`, '%D %b %Y at %r') as modify_on, 
						(Select name_code from atif.staff_registered where id = lsam.`modified_by`) as modify_by,
						Concat(DATE_FORMAT(from_unixtime(lsam.created),'%a %b %d %Y'),', at ',DATE_FORMAT(from_unixtime(lsam.created),'%I:%i %p')) as created_time,
						DATE_FORMAT(lsam.date,'%a %b %d %Y') as date,
						Date_FORMAT(lsam.time,'%I:%i %p') as manual_time,
						lamd.id as Manual_id, 
						lamd.description as manual_description,
						lsam.this_id as Missed_id,


						lsam.modified as usort

					from 
						atif_gs_events.log_staff_attendance_ma as lsam, 
						atif_gs_events.log_absenta_manual_description as lamd,
						atif.staff_registered as sr 

					where  

					    from_unixtime(lsam.`modified`, '%Y %D %M %h %i') = from_unixtime(lamd.modified , '%Y %D %M %h %i') and
						lsam.staff_id = sr.id and 
						lamd.staff_id = lsam.staff_id and

						lsam.location_id = 18 
					    
					   
				) UNION (select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
						sr.id as staff_id,
						DATE_FORMAT(sai.`date`, '%W, %d %b %Y')  as missTap_date, 
						sai.record_deleted as rd,
						from_unixtime(sai.`created`, '%D %b %Y') as mtStamp , 
						from_unixtime(sai.`modified`, '%D %b %Y at %r') as modify_on, 
						(Select name_code from atif.staff_registered where id = sai.`modified_by`) as modify_by,
						Concat(DATE_FORMAT(from_unixtime(sai.created),'%a %b %d %Y'),', at ',DATE_FORMAT(from_unixtime(sai.created),'%I:%i %p')) as created_time,
						DATE_FORMAT(sai.date,'%a %b %d %Y') as date,
						Date_FORMAT(sai.time,'%I:%i %p') as manual_time, 
						mdes.id as Manual_id, 
						mdes.description as manual_description,
						sai.id as Missed_id,
						sai.modified as usort

					from 
						atif_attendance_staff.staff_attendance_in as sai,
						atif_gs_events.absenta_manual_description as mdes,
						atif.staff_registered as sr

					where 
						sai.`created` = mdes.`created` and
						sai.staff_id = mdes.staff_id and
						sai.staff_id = sr.id and   
						sai.location_id = 18   
					 ) 
				UNION (
				 	Select
						sr.employee_id as employee_id,
						sr.name as name,
						sr.name_code as name_code,
						sr.c_bottomline as c_bottomline,  
						sr.id as staff_id,

					 	DATE_FORMAT(sao.`date`, '%W, %d %b %Y')   as missTap_date , sao.record_deleted as rd,
						from_unixtime(sao.`created`, '%D %b %Y') as mtStamp , 
						from_unixtime(sao.`modified`, '%D %b %Y at %r') as modify_on, 
						(Select name_code from atif.staff_registered where id = sao.`modified_by`) as modify_by,
						Concat(DATE_FORMAT(from_unixtime(sao.created),'%a %b %d %Y'),', at ',DATE_FORMAT(from_unixtime(sao.created),'%I:%i %p')) as created_time,
						DATE_FORMAT(sao.date,'%a %b %d %Y') as date,
						Date_FORMAT(sao.time,'%I:%i %p') as manual_time, mdes.id as Manual_id, mdes.description as manual_description,
						sao.id as Missed_id,


						sao.modified as usort

					from 
						atif_attendance_staff.staff_attendance_out as sao, 
						atif_gs_events.absenta_manual_description as mdes,
						atif.staff_registered as sr 

					where  
					    sao.`created` = mdes.`created` and
					    sao.staff_id = mdes.staff_id and 
						sao.staff_id = sr.id and  
						sao.location_id = 18 
					    
					   
					) 				
				  order by usort ASC

					";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}
  	public function getStaffInfo($staff_id){
		$query = "select * from  atif.staff_registered as sr where  sr.id  = ".$staff_id;
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}				
}