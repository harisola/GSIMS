<?php

namespace App\Models\Accounts;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Waviers_arrears_model extends Model
{
    
    protected $dbCon = 'mysql_Career_fee_bill';


    
  
   public function getStudentsArrearsAdvanceAmount()
    {
    	$As = $this->getAcademicSession();

    	$AcademicSessionFrom = $As[0]->Academic_Session;
    	$AcademicSessionTo 	 = $As[1]->Academic_Session;

$query = "select cl.gs_id, CONCAT(LEFT(LPAD(cl.gf_id,5,0), 2), '-', RIGHT(LPAD(cl.gf_id,5,0), 3)) as gf_id, cl.abridged_name, cl.student_status_name,
					cl.grade_name, cl.section_name, cl.grade_id, cl.section_id,
					IFNULL(pet.petitioner_type, '') AS petitioner_type,
					IFNULL(pet.petitioner_title, '') AS petitioner_title,
					IFNULL(pet.petitioner_code, '') AS petitioner_code,
					IFNULL(pet.petitioner_no, '') AS petitioner_no,
					IFNULL(feebill_1.adjustment,0) as feebill_1_adjustment,IFNULL(feebill_1.bill_title, '') as feebill_1_title, IFNULL(feebill_1.total_payable,0) as feebill_1_payable, IFNULL(feebill_1.received_amount,0) as feebill_1_received,
					IFNULL(feebill_2.adjustment,0) as feebill_2_adjustment,IFNULL(feebill_2.bill_title, '') as feebill_2_title, IFNULL(feebill_2.total_payable,0) as feebill_2_payable, IFNULL(feebill_2.received_amount,0) as feebill_2_received,
					IFNULL(feebill_3.adjustment,0) as feebill_3_adjustment,IFNULL(feebill_3.bill_title, '') as feebill_3_title, IFNULL(feebill_3.total_payable,0) as feebill_3_payable, IFNULL(feebill_3.received_amount,0) as feebill_3_received,
					IFNULL(feebill_4.adjustment,0) as feebill_4_adjustment,IFNULL(feebill_4.bill_title, '') as feebill_4_title, IFNULL(feebill_4.total_payable,0) as feebill_4_payable, IFNULL(feebill_4.received_amount,0) as feebill_4_received,
					IFNULL(feebill_5.adjustment,0) as feebill_5_adjustment,IFNULL(feebill_5.bill_title, '') as feebill_5_title, IFNULL(feebill_5.total_payable,0) as feebill_5_payable, IFNULL(feebill_5.received_amount,0) as feebill_5_received,
					IFNULL(feebill_6.adjustment,0) as feebill_6_adjustment,IFNULL(feebill_6.bill_title, '') as feebill_6_title, IFNULL(feebill_6.total_payable,0) as feebill_6_payable, IFNULL(feebill_6.received_amount,0) as feebill_6_received,


					IF(feebill_6.bill_title!='', IFNULL(feebill_6.bill_title,''),
						IF(feebill_5.bill_title!='', IFNULL(feebill_5.bill_title,''),
							IF(feebill_4.bill_title!='', IFNULL(feebill_4.bill_title,''),
								IF(feebill_3.bill_title!='', IFNULL(feebill_3.bill_title,''),
									IF(feebill_2.bill_title!='', IFNULL(feebill_2.bill_title,''),
										IF(feebill_1.bill_title!='', IFNULL(feebill_1.bill_title,''), '')))))) as last_bill_title,


					IF(feebill_6.bill_title!='', IFNULL(feebill_6.total_payable,0)-IFNULL(feebill_6.received_amount,0),
						IF(feebill_5.bill_title!='', IFNULL(feebill_5.total_payable,0)-IFNULL(feebill_5.received_amount,0),
							IF(feebill_4.bill_title!='', IFNULL(feebill_4.total_payable,0)-IFNULL(feebill_4.received_amount,0),
								IF(feebill_3.bill_title!='', IFNULL(feebill_3.total_payable,0)-IFNULL(feebill_3.received_amount,0),
									IF(feebill_2.bill_title!='', IFNULL(feebill_2.total_payable,0)-IFNULL(feebill_2.received_amount,0),
										IF(feebill_1.bill_title!='', IFNULL(feebill_1.total_payable,0)-IFNULL(feebill_1.received_amount,0), IFNULL(feebill_1.adjustment,0))))))) as balance
						
					from atif.class_list cl


					left join
					(select title as petitioner_title, gf_id, petitioner_code, petitioner_no, type as petitioner_type
						from atif_gs_events.1509_petitioners group by gf_id, title) as pet on pet.gf_id = cl.gf_id

					left join
					(SELECT * FROM
						(SELECT student_id, adjustment, total_payable, received_amount, bill_title,
								IF(@prev=student_id, @cnt := @cnt + 1, @cnt := 1) AS bill_paid,
								@prev:=student_id as this_student_id

						FROM(
							SELECT fb.student_id as student_id, IFNULL(fb.adjustment,0) as adjustment, 
								fb.total_payable, fbr.received_amount, fb.bill_title

								FROM atif_fee_student.fee_bill fb

								left join (select 
									fee_bill_id, received_date, sum(received_amount) as received_amount,
									received_late_fee, received_payment_mode, received_branch,
									is_void	
									from atif_fee_student.fee_bill_received 	
									where is_void=0 and record_deleted=0	
									group by fee_bill_id) as fbr on fbr.fee_bill_id = fb.id

								where fb.academic_session_id>=$AcademicSessionFrom and fb.academic_session_id<=$AcademicSessionTo
								and fb.is_void=0 and fb.record_deleted=0
								and bill_cycle_no=1 and fee_bill_type_id=1

								order by student_id asc, received_amount desc
						) AS DATA
						JOIN (SELECT @prev := null) p
						JOIN (SELECT @cnt := 1) c
					
					order by student_id, received_amount desc) AS DATA
					where bill_paid = 1) as feebill_1 on feebill_1.student_id = cl.id

					left join
					(SELECT * FROM
						(SELECT student_id, adjustment, total_payable, received_amount, bill_title,
								IF(@prev=student_id, @cnt := @cnt + 1, @cnt := 1) AS bill_paid,
								@prev:=student_id as this_student_id

						FROM(
							SELECT fb.student_id as student_id, IFNULL(fb.adjustment,0) as adjustment, 
								fb.total_payable, fbr.received_amount, fb.bill_title

								FROM atif_fee_student.fee_bill fb

								left join (select 
									fee_bill_id, received_date, sum(received_amount) as received_amount,
									received_late_fee, received_payment_mode, received_branch,
									is_void	
									from atif_fee_student.fee_bill_received 	
									where is_void=0 and record_deleted=0	
									group by fee_bill_id) as fbr on fbr.fee_bill_id = fb.id

								where fb.academic_session_id>=$AcademicSessionFrom and fb.academic_session_id<=$AcademicSessionTo
								and fb.is_void=0 and fb.record_deleted=0
								and bill_cycle_no=2 and fee_bill_type_id=1

								order by student_id asc, received_amount desc
						) AS DATA
						JOIN (SELECT @prev := null) p
						JOIN (SELECT @cnt := 1) c
						
						order by student_id, received_amount desc) AS DATA
						where bill_paid = 1) as feebill_2 on feebill_2.student_id = cl.id
					left join
					(SELECT * FROM
						(SELECT student_id, adjustment, total_payable, received_amount, bill_title,
								IF(@prev=student_id, @cnt := @cnt + 1, @cnt := 1) AS bill_paid,
								@prev:=student_id as this_student_id

						FROM(
							SELECT fb.student_id as student_id, IFNULL(fb.adjustment,0) as adjustment, 
								fb.total_payable, fbr.received_amount, fb.bill_title

								FROM atif_fee_student.fee_bill fb

								left join (select 
									fee_bill_id, received_date, sum(received_amount) as received_amount,
									received_late_fee, received_payment_mode, received_branch,
									is_void	
									from atif_fee_student.fee_bill_received 	
									where is_void=0 and record_deleted=0	
									group by fee_bill_id) as fbr on fbr.fee_bill_id = fb.id

								where fb.academic_session_id>=$AcademicSessionFrom and fb.academic_session_id<=$AcademicSessionTo
								and fb.is_void=0 and fb.record_deleted=0
								and bill_cycle_no=3 and fee_bill_type_id=1

								order by student_id asc, received_amount desc
						) AS DATA
						JOIN (SELECT @prev := null) p
						JOIN (SELECT @cnt := 1) c
						
						order by student_id, received_amount desc) AS DATA
						where bill_paid = 1) as feebill_3 on feebill_3.student_id = cl.id

	left join
					(SELECT * FROM
						(SELECT student_id, adjustment, total_payable, received_amount, bill_title,
								IF(@prev=student_id, @cnt := @cnt + 1, @cnt := 1) AS bill_paid,
								@prev:=student_id as this_student_id

						FROM(
							SELECT fb.student_id as student_id, IFNULL(fb.adjustment,0) as adjustment, 
								fb.total_payable, fbr.received_amount, fb.bill_title

								FROM atif_fee_student.fee_bill fb

								left join (select 
									fee_bill_id, received_date, sum(received_amount) as received_amount,
									received_late_fee, received_payment_mode, received_branch,
									is_void	
									from atif_fee_student.fee_bill_received 	
									where is_void=0 and record_deleted=0	
									group by fee_bill_id) as fbr on fbr.fee_bill_id = fb.id

								where fb.academic_session_id>=$AcademicSessionFrom and fb.academic_session_id<=$AcademicSessionTo
								and fb.is_void=0 and fb.record_deleted=0
								and bill_cycle_no=4 and fee_bill_type_id=1

								order by student_id asc, received_amount desc
						) AS DATA
						JOIN (SELECT @prev := null) p
						JOIN (SELECT @cnt := 1) c
						
						order by student_id, received_amount desc) AS DATA
						where bill_paid = 1) as feebill_4 on feebill_4.student_id = cl.id

left join
					(SELECT * FROM
						(SELECT student_id, adjustment, total_payable, received_amount, bill_title,
								IF(@prev=student_id, @cnt := @cnt + 1, @cnt := 1) AS bill_paid,
								@prev:=student_id as this_student_id

						FROM(
							SELECT fb.student_id as student_id, IFNULL(fb.adjustment,0) as adjustment, 
								fb.total_payable, fbr.received_amount, fb.bill_title

								FROM atif_fee_student.fee_bill fb

								left join (select 
									fee_bill_id, received_date, sum(received_amount) as received_amount,
									received_late_fee, received_payment_mode, received_branch,
									is_void	
									from atif_fee_student.fee_bill_received 	
									where is_void=0 and record_deleted=0	
									group by fee_bill_id) as fbr on fbr.fee_bill_id = fb.id

								where fb.academic_session_id>=$AcademicSessionFrom and fb.academic_session_id<=$AcademicSessionTo
								and fb.is_void=0 and fb.record_deleted=0
								and bill_cycle_no=5 and fee_bill_type_id=1

								order by student_id asc, received_amount desc
						) AS DATA
						JOIN (SELECT @prev := null) p
						JOIN (SELECT @cnt := 1) c
						
						order by student_id, received_amount desc) AS DATA
						where bill_paid = 1) as feebill_5 on feebill_5.student_id = cl.id 



					left join
					(SELECT * FROM
						(SELECT student_id, adjustment, total_payable, received_amount, bill_title,
								IF(@prev=student_id, @cnt := @cnt + 1, @cnt := 1) AS bill_paid,
								@prev:=student_id as this_student_id

						FROM(
							SELECT fb.student_id as student_id, IFNULL(fb.adjustment,0) as adjustment, 
								fb.total_payable, fbr.received_amount, fb.bill_title

								FROM atif_fee_student.fee_bill fb

								left join (select 
									fee_bill_id, received_date, sum(received_amount) as received_amount,
									received_late_fee, received_payment_mode, received_branch,
									is_void	
									from atif_fee_student.fee_bill_received 	
									where is_void=0 and record_deleted=0	
									group by fee_bill_id) as fbr on fbr.fee_bill_id = fb.id

								where fb.academic_session_id>=$AcademicSessionFrom and fb.academic_session_id<=$AcademicSessionTo
								and fb.is_void=0 and fb.record_deleted=0
								and bill_cycle_no=6 and fee_bill_type_id=1

								order by student_id asc, received_amount desc
						) AS DATA
						JOIN (SELECT @prev := null) p
						JOIN (SELECT @cnt := 1) c
						
						order by student_id, received_amount desc) AS DATA
						where bill_paid = 1) as feebill_6 on feebill_6.student_id = cl.id";





$weeks = DB::connection($this->dbCon)->select($query);
return $weeks;

  }

  
  public function getAcademicSession()
  {
  	$query = "select distinct cl.academic_session_id as Academic_Session  from atif.class_list as cl";
  	$weeks = DB::connection($this->dbCon)->select($query);
		return $weeks;
  }







    
}
