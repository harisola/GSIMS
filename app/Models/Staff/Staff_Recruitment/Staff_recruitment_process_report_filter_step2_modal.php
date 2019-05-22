<?php
namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class Staff_recruitment_process_report_filter_step2_modal extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_form';
    protected $dbCon = 'mysql_Career';


	//Arif Khan Work

	////////////////////////// Overall_applicant_moved_to_Regret_from_Formal_Interview/////////////////////////////////////

				public function Overall_applicant_moved_to_Regret_from_Formal_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter)
				  {
				  	

						///////////////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

								 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and u.depart_id IN('".implode("','", $departmentFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 			
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

								 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 	
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

								 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 			
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

									 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3  and u.level_id IN('".implode("','", $designationFilter)."')  and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 			
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

									 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and u.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 				
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 	
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 		
				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){
									 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 		
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

									 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 

									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and f.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 	
									

									}	

					//////////////////AKHAN ///////////////////////////////


				  	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
					 $Query = "select 
								29 as Query_num,
								count( f.id ) as Regret_from_Formal
								from atif_career.career_form as f
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'"; 

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

								

							 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){

								

							 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')  and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

								

							 $Query = "select 
										29 as Query_num,
										count( f.id ) as Regret_from_Formal
										from atif_career.career_form as f left join atif_career.career_form_data as u
										  on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}

						$getStatus = DB::connection($this->dbCon)->select($Query);

						return $getStatus;
			}


			public function Overall_applicants_moved_to_Followup_for_Formal_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){


				///////////////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

								  $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff";  			
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

								  $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3   and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff"; 
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

								  $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff"; 		
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

									 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff"; 			
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

									  $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff"; 			
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								  $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff"; 	
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')  order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff"; 	
				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){
									 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff"; 		
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

									 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff"; 

									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff";  	
									

									}	

					//////////////////AKHAN ///////////////////////////////

				if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){

							 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff
										";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff"; 

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){

							 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
										23 as Query_num, 
										count(ff.moved_to_Followup_interview) as moved_to_Followup_interview

										from(


										select 
										curdate() as p_date,
										( cf.id ) as moved_to_Followup_interview, cf.form_id as form_id
										from atif_Career.log_career_form as cf 
										where cf.status_id=3 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

										union
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										( d.date ) as moved_to_Followup_interview, f.id as form_id

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."')order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate() group by f.id
										) as ff";

							}

							$getStatus = DB::connection($this->dbCon)->select($Query);

						return $getStatus;


				}


				public function Applicants_currently_in_Followup_for_Formal_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){




					///////////////////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

								  $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3   and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";
 			
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

								  $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";

									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

								   $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";
		
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

									  $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";
 			
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

									  $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";
			
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								  $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";
 	
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								  $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id   and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";

				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

									 $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";
	
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

									 $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";


									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						 $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";

									

									}	

					//////////////////AKHAN ///////////////////////////////

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){

							 $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff "; 

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = " select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							 $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff ";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							 $Query = "select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff  ";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = " select 
										24 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff

										union
										select 
										25 as Query_num, 
										sum(ff.currently_in_Followup_presence) as currently_in_Followup_presence
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as currently_in_Followup_presence
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

							}

							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;
						}


						public function Overall_applicants_given_extension_from_Followup_for_Formal_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

				////////////////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and  u.depart_id IN('".implode("','", $departmentFilter)."') ";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and u.tag IN('".implode("','", $subjectFilter)."') ";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') ";

					}


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and u.level_id IN('".implode("','", $designationFilter)."') ";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and u.campus IN('".implode("','", $campusFilter)."') ";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."') ";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

						 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."')";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						  $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13  and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') ";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and l.form_source IN('".implode("','", $formSourceFilter)."') ";

					}


					/////AKHAN ///////////////////////////////




						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

						$Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l where l.status_id=3 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') ";
								}

								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') ";
								}


								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')";
								}

								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')";
								}

								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
									28 as Query_num,
									count( l.id ) as given_extension
									from atif_career.career_form as l  left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and l.form_source IN('".implode("','", $formSourceFilter)."')";
								}


								
									
						$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;



						}

						public function Overall_applicants_moved_to_Not_Interested_from_Followup_for_Formal_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

							////////////////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						  $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and u.depart_id IN('".implode("','", $departmentFilter)."') ";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and u.tag IN('".implode("','", $subjectFilter)."') ";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						  $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') ";

					}


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."') ";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and u.campus IN('".implode("','", $campusFilter)."') ";
					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')";
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."') ";
					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

						 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."') ";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						  $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						  $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and l.form_source IN('".implode("','", $formSourceFilter)."') ";

					}


					/////AKHAN ///////////////////////////////

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){

							 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l where l.status_id=3 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' ";
								}

								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter){

								//$departmentFilter = explode(",", $departmentFilter);

									 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') ";
									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


									 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')";

									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


									 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')";
									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

							
									 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')";
									}
									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


									 $Query = "select 
										26 as Query_num,
										count( l.id ) as Not_Interested
										from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=3 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and l.form_source IN('".implode("','", $formSourceFilter)."') ";
									}


								$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;
						}

  							public function Overall_applicants_moved_to_Not_Interested_from_Formal_Interview_Communication($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){




  									////////////////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						  $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6  and u.depart_id IN('".implode("','", $departmentFilter)."') ";
					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and u.tag IN('".implode("','", $subjectFilter)."') ";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						  $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') ";

					}


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and  u.level_id IN('".implode("','", $designationFilter)."') ";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and  u.campus IN('".implode("','", $campusFilter)."') ";
					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						  $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')";
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."') ";
					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

						 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') ";
					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						  $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and l.form_source IN('".implode("','", $formSourceFilter)."') ";

					}


					/////AKHAN ///////////////////////////////

  								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

								
									 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l where l.status_id=2 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'";
									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

								//$departmentFilter = explode(",", $departmentFilter);

									 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') ";
									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


									 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') ";
									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){


									 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')";
									}
									
									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


									 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')";
									}


									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


									 $Query = "select 
											27 as Query_num,
											count( l.id ) as moved_to_Not_Interested
											from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id where l.status_id=2 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and l.form_source IN('".implode("','", $formSourceFilter)."')";
									}
								 


  							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;


						}

//zk
	public function Applicants_awaiting_for_Observation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

		///////////////////////////AKHAN ///////////////////////////////

	  	if( $departmentFilter !='null' && $departmentFilter !=""){
			$departmentFilter = explode(",", $departmentFilter);

			  $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  dd.depart_id IN('".implode("','", $departmentFilter)."')  order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if( $subjectFilter !='null' && $subjectFilter !=""){
			$subjectFilter = explode(",", $subjectFilter);

			 $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			   $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if( $designationFilter !='null' && $designationFilter !=""){
			$designationFilter = explode(",", $designationFilter);

			 $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."')  order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if( $campusFilter !='null' && $campusFilter !=""){
			$campusFilter = explode(",", $campusFilter);

			 $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id   and dd.campus IN('".implode("','", $campusFilter)."')  order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			   $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			  $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id   and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

			

			  $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			

			  $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if( $formSourceFilter !='null' && $formSourceFilter !=""){
			$formSourceFilter = explode(",", $formSourceFilter);

			  $Query = "select 
						31 as Query_num, 
						sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
						from(
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
						and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as awaiting_for_Observation 
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and f.form_source IN('".implode("','", $formSourceFilter)."')  order by dd.id desc limit 1)
						else d.date
						end
						)  >=  curdate() ) as ff";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){
		
			$Query="select 
				31 as Query_num, 
				sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
				from(
				select 
				(
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
				and dd.form_id= d.form_id order by dd.id desc limit 1)
				else d.date
				end
				) as p_date,
				count( d.date ) as awaiting_for_Observation 
				from atif_career.career_form as f
				left outer join (
				select * from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id )
				) as d on d.form_id = f.id
				where f.status_id=4  and (
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' order by dd.id desc limit 1)
				else d.date
				end
				)  >=  curdate() ) as ff";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){
			//$departmentFilter = explode(",", $departmentFilter);

			$Query = "select 
				31 as Query_num, 
				sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
				from(
				select 
				(
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
				and dd.form_id= d.form_id order by dd.id desc limit 1)
				else d.date
				end
				) as p_date,
				count( d.date ) as awaiting_for_Observation 
				from atif_career.career_form as f
				left outer join (
				select * from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id )
				) as d on d.form_id = f.id
				where f.status_id=4 and (
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and dd.depart_id IN('".implode("','", $departmentFilter)."')  order by dd.id desc limit 1)
				else d.date
				end
				)  >=  curdate() ) as ff";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


			$Query = "select 
			31 as Query_num, 
			sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
			from(
			select 
			(
			case when d.date = '1970-01-01' then 
			(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
			and dd.form_id= d.form_id order by dd.id desc limit 1)
			else d.date
			end
			) as p_date,
			count( d.date ) as awaiting_for_Observation 
			from atif_career.career_form as f
			left outer join (
			select * from atif_career.career_form_data as s where s.id in(
			select 
			max( cf.id ) as latest
			from atif_career.career_form_data as cf 
			group by cf.form_id )
			) as d on d.form_id = f.id
			where f.status_id=4 and (
			case when d.date = '1970-01-01' then 
			(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
			else d.date
			end
			)  >=  curdate() ) as ff";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

			$Query = "select 
				31 as Query_num, 
				sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
				from(
				select 
				(
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
				and dd.form_id= d.form_id order by dd.id desc limit 1)
				else d.date
				end
				) as p_date,
				count( d.date ) as awaiting_for_Observation 
				from atif_career.career_form as f
				left outer join (
				select * from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id )
				) as d on d.form_id = f.id
				where f.status_id=4 and (
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
				else d.date
				end
				)  >=  curdate() ) as ff";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

			$Query = "select 
			31 as Query_num, 
			sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
			from(
			select 
			(
			case when d.date = '1970-01-01' then 
			(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
			and dd.form_id= d.form_id order by dd.id desc limit 1)
			else d.date
			end
			) as p_date,
			count( d.date ) as awaiting_for_Observation 
			from atif_career.career_form as f
			left outer join (
			select * from atif_career.career_form_data as s where s.id in(
			select 
			max( cf.id ) as latest
			from atif_career.career_form_data as cf 
			group by cf.form_id )
			) as d on d.form_id = f.id
			where f.status_id=4 and (
			case when d.date = '1970-01-01' then 
			(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
			else d.date
			end
			)  >=  curdate() ) as ff";
		
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


			$Query = "select 
				31 as Query_num, 
				sum(ff.awaiting_for_Observation ) as awaiting_for_Observation 
				from(
				select 
				(
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
				and dd.form_id= d.form_id order by dd.id desc limit 1)
				else d.date
				end
				) as p_date,
				count( d.date ) as awaiting_for_Observation 
				from atif_career.career_form as f
				left outer join (
				select * from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id )
				) as d on d.form_id = f.id
				where f.status_id=4 and (
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.campus IN('".implode("','", $campusFilter)."')and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
				else d.date
				end
				)  >=  curdate() ) as ff";
		}
			$getStatus = DB::connection($this->dbCon)->select($Query);
			return $getStatus;
	}



	public function Overall_applicants_marked_Present_for_Observation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

		///////////////////////////AKHAN ///////////////////////////////
	  	if( $departmentFilter !='null' && $departmentFilter !=""){
			$departmentFilter = explode(",", $departmentFilter);

			   $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and u.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if( $subjectFilter !='null' && $subjectFilter !=""){
			$subjectFilter = explode(",", $subjectFilter);

			  $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			    $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if( $designationFilter !='null' && $designationFilter !=""){
			$designationFilter = explode(",", $designationFilter);

			  $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and u.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if( $campusFilter !='null' && $campusFilter !=""){
			$campusFilter = explode(",", $campusFilter);

			 $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			    $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			   $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and  u.depart_id IN('".implode("','", $departmentFilter)."') and  u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

			

			  $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			

			  $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if( $formSourceFilter !='null' && $formSourceFilter !=""){
			$formSourceFilter = explode(",", $formSourceFilter);

			 $Query = "select 
							32 as Query_num, 
							count( cf.id ) as marked_Present_for_job  
							from atif_Career.log_career_form as cf left join atif_career.career_form as f
							  on f.id= cf.form_id left join atif_career.career_form_data as u
							  on u.form_id= cf.form_id
							where cf.status_id=4 
							and (cf.stage_id=4) and f.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		/////////////////////////AKHAN //////////////////////////////
		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

				$Query = "select 
					32 as Query_num, 
					count( cf.id ) as marked_Present_for_job  
					from atif_Career.log_career_form as cf left join atif_career.career_form as f
					  on f.id= cf.form_id
					where cf.status_id=4 
					and (cf.stage_id=4) and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

			//$departmentFilter = explode(",", $departmentFilter);

		 $Query = "select 
			32 as Query_num, 
			count( cf.id ) as marked_Present_for_job  
			from atif_Career.log_career_form as cf left join atif_career.career_form as f
			  on f.id= cf.form_id left join atif_career.career_form_data as u
			  on u.form_id= cf.form_id
			where cf.status_id=4 
			and (cf.stage_id=4) and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


		 $Query = "select 
			32 as Query_num, 
			count( cf.id ) as marked_Present_for_job  
			from atif_Career.log_career_form as cf left join atif_career.career_form as f
			  on f.id= cf.form_id left join atif_career.career_form_data as u
			  on u.form_id= cf.form_id
			where cf.status_id=4 
			and (cf.stage_id=4) and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){


		 $Query = "select 
			32 as Query_num, 
			count( cf.id ) as marked_Present_for_job  
			from atif_Career.log_career_form as cf left join atif_career.career_form as f
			  on f.id= cf.form_id left join atif_career.career_form_data as u
			  on u.form_id= cf.form_id
			where cf.status_id=4 
			and (cf.stage_id=4) and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


		 $Query = "select 
			32 as Query_num, 
			count( cf.id ) as marked_Present_for_job  
			from atif_Career.log_career_form as cf left join atif_career.career_form as f
			  on f.id= cf.form_id left join atif_career.career_form_data as u
			  on u.form_id= cf.form_id
			where cf.status_id=4 
			and (cf.stage_id=4) and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and  u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


		 $Query = "select 
			32 as Query_num, 
			count( cf.id ) as marked_Present_for_job  
			from atif_Career.log_career_form as cf left join atif_career.career_form as f
			  on f.id= cf.form_id left join atif_career.career_form_data as u
			  on u.form_id= cf.form_id
			where cf.status_id=4 
			and (cf.stage_id=4) and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and  u.campus IN('".implode("','", $campusFilter)."') and  f.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
		}
		$getStatus = DB::connection($this->dbCon)->select($Query);
		return $getStatus;

	}

	public function Applicants_currently_in_Observation_awaiting_for_Next_Step_decision($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

		///////////////////////////AKHAN ///////////////////////////////

		if( $departmentFilter !='null' && $departmentFilter !=""){
			$departmentFilter = explode(",", $departmentFilter);

			$Query = "select 
						33 as Query_num, 
						count( f_data.p_date ) as currently_in_Observatio_for 
						from (
						select 
						(
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date
						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and  d.depart_id IN('".implode("','", $departmentFilter)."')
						) as f_data
						where f_data.p_date >= curdate() ";
		}

		if( $subjectFilter !='null' && $subjectFilter !=""){
			$subjectFilter = explode(",", $subjectFilter);

			  $Query = "select 
								33 as Query_num, 
								count( f_data.p_date ) as currently_in_Observatio_for 
								from (
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and d.tag IN('".implode("','", $subjectFilter)."')
								) as f_data
								where f_data.p_date >= curdate() ";
		}

		if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			     $Query = "select 
								33 as Query_num, 
								count( f_data.p_date ) as currently_in_Observatio_for 
								from (
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and  d.depart_id IN('".implode("','", $departmentFilter)."') and  d.tag IN('".implode("','", $subjectFilter)."')
								) as f_data
								where f_data.p_date >= curdate() ";
		}

		if( $designationFilter !='null' && $designationFilter !=""){
			$designationFilter = explode(",", $designationFilter);

			   $Query = "select 
								33 as Query_num, 
								count( f_data.p_date ) as currently_in_Observatio_for 
								from (
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and d.level_id IN('".implode("','", $designationFilter)."')
								) as f_data
								where f_data.p_date >= curdate() ";
		}

		if( $campusFilter !='null' && $campusFilter !=""){
			$campusFilter = explode(",", $campusFilter);

			 $Query = "select 
								33 as Query_num, 
								count( f_data.p_date ) as currently_in_Observatio_for 
								from (
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and  d.campus IN('".implode("','", $campusFilter)."')
								) as f_data
								where f_data.p_date >= curdate() ";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			     $Query = "select 
								33 as Query_num, 
								count( f_data.p_date ) as currently_in_Observatio_for 
								from (
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and  d.level_id IN('".implode("','", $designationFilter)."')  and  d.campus IN('".implode("','", $campusFilter)."')
								) as f_data
								where f_data.p_date >= curdate() ";
		}

		if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			    $Query = "select 
								33 as Query_num, 
								count( f_data.p_date ) as currently_in_Observatio_for 
								from (
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and d.depart_id IN('".implode("','", $departmentFilter)."') and d.campus IN('".implode("','", $campusFilter)."')
								) as f_data
								where f_data.p_date >= curdate() ";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

			  $Query = "select 
								33 as Query_num, 
								count( f_data.p_date ) as currently_in_Observatio_for 
								from (
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and d.level_id IN('".implode("','", $designationFilter)."') and d.depart_id IN('".implode("','", $departmentFilter)."')
								) as f_data
								where f_data.p_date >= curdate() ";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			

			   $Query = "select 
								33 as Query_num, 
								count( f_data.p_date ) as currently_in_Observatio_for 
								from (
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and  d.level_id IN('".implode("','", $designationFilter)."') and  d.tag IN('".implode("','", $subjectFilter)."')
								) as f_data
								where f_data.p_date >= curdate() ";
		}

		if( $formSourceFilter !='null' && $formSourceFilter !=""){
			$formSourceFilter = explode(",", $formSourceFilter);

			 $Query = "select 
								33 as Query_num, 
								count( f_data.p_date ) as currently_in_Observatio_for 
								from (
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and f.form_source IN('".implode("','", $formSourceFilter)."')
								) as f_data
								where f_data.p_date >= curdate() ";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

			 $Query = "select 
					33 as Query_num, 
					count( f_data.p_date ) as currently_in_Observatio_for 
					from (
					select 
					(
					case when d.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
					else d.date
					end
					) as p_date
					from atif_career.career_form as f
					left outer join (
					select * from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id )
					) as d on d.form_id = f.id
					where f.status_id=4 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
					) as f_data
					where f_data.p_date >= curdate()";	

		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

			//$departmentFilter = explode(",", $departmentFilter);

			$Query = "select 
				33 as Query_num, 
				count( f_data.p_date ) as currently_in_Observatio_for 
				from (
				select 
				(
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
				else d.date
				end
				) as p_date
				from atif_career.career_form as f
				left outer join (
				select * from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id )
				) as d on d.form_id = f.id
				where f.status_id=4 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  d.depart_id IN('".implode("','", $departmentFilter)."')
				) as f_data
				where f_data.p_date >= curdate() ";

		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


			$Query = "select 
				33 as Query_num, 
				count( f_data.p_date ) as currently_in_Observatio_for 
				from (
				select 
				(
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
				else d.date
				end
				) as p_date
				from atif_career.career_form as f
				left outer join (
				select * from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id )
				) as d on d.form_id = f.id
				where f.status_id=4 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  d.depart_id IN('".implode("','", $departmentFilter)."') and  d.tag IN('".implode("','", $subjectFilter)."')
				) as f_data
				where f_data.p_date >= curdate()";

		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){


			$Query = "select 
				33 as Query_num, 
				count( f_data.p_date ) as currently_in_Observatio_for 
				from (
				select 
				(
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
				else d.date
				end
				) as p_date
				from atif_career.career_form as f
				left outer join (
				select * from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id )
				) as d on d.form_id = f.id
				where f.status_id=4 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  d.depart_id IN('".implode("','", $departmentFilter)."') and d.tag IN('".implode("','", $subjectFilter)."') and d.level_id IN('".implode("','", $designationFilter)."') 
				) as f_data
				where f_data.p_date >= curdate()";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


			$Query = "select 
				33 as Query_num, 
				count( f_data.p_date ) as currently_in_Observatio_for 
				from (
				select 
				(
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
				else d.date
				end
				) as p_date
				from atif_career.career_form as f
				left outer join (
				select * from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id )
				) as d on d.form_id = f.id
				where f.status_id=4 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  d.depart_id IN('".implode("','", $departmentFilter)."') and d.tag IN('".implode("','", $subjectFilter)."') and d.level_id IN('".implode("','", $designationFilter)."') and d.campus IN('".implode("','", $campusFilter)."') 
				) as f_data
				where f_data.p_date >= curdate()";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


			$Query = "select 
				33 as Query_num, 
				count( f_data.p_date ) as currently_in_Observatio_for 
				from (
				select 
				(
				case when d.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
				else d.date
				end
				) as p_date
				from atif_career.career_form as f
				left outer join (
				select * from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id )
				) as d on d.form_id = f.id
				where f.status_id=4 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  d.depart_id IN('".implode("','", $departmentFilter)."') and d.tag IN('".implode("','", $subjectFilter)."') and d.level_id IN('".implode("','", $designationFilter)."') and d.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."')  
				) as f_data
				where f_data.p_date >= curdate()";
		}

		$getStatus = DB::connection($this->dbCon)->select($Query);
		return $getStatus;

	}


	public function Overall_applicant_moved_to_Regret_from_Observation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

		///////////////////////////AKHAN ///////////////////////////////

	  	if( $departmentFilter !='null' && $departmentFilter !=""){
			$departmentFilter = explode(",", $departmentFilter);

			    $Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4 and u.depart_id IN('".implode("','", $departmentFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if( $subjectFilter !='null' && $subjectFilter !=""){
			$subjectFilter = explode(",", $subjectFilter);

			   $Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4 and  u.tag IN('".implode("','", $subjectFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			    $Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4 and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if( $designationFilter !='null' && $designationFilter !=""){
			$designationFilter = explode(",", $designationFilter);

			    $Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4  and  u.level_id IN('".implode("','", $designationFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if( $campusFilter !='null' && $campusFilter !=""){
			$campusFilter = explode(",", $campusFilter);

			 $Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4 and  u.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			     $Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4 and   u.level_id IN('".implode("','", $designationFilter)."')  and   u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			 $Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4 and  u.depart_id IN('".implode("','", $departmentFilter)."')  and  u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

			

			   $Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4  and  u.level_id IN('".implode("','", $designationFilter)."') and  u.depart_id IN('".implode("','", $departmentFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			

			  $Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4  and  u.level_id IN('".implode("','", $designationFilter)."')  and  u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if( $formSourceFilter !='null' && $formSourceFilter !=""){
			$formSourceFilter = explode(",", $formSourceFilter);

			$Query = "select 
								38 as Query_num,
								count( f.id ) as applicant_moved_to_regret_form
								from atif_career.career_form as f left join atif_career.career_form_data as u
							  on f.id= u.form_id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id  
								where f.status_id=12 and d.status_id=4 and  f.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){


			$Query = "select 
						38 as Query_num,
						count( f.id ) as applicant_moved_to_regret_form
						from atif_career.career_form as f
						left join ( 
						select * from atif_career.log_career_form as lf where lf.id in(
						select max(l.id) as id
						from atif_career.log_career_form as l  group by l.form_id )
						) as d
						on d.form_id = f.id  
						where f.status_id=12 and d.status_id=4 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

			//$departmentFilter = explode(",", $departmentFilter);


			 $Query = "select 
						38 as Query_num,
						count( f.id ) as applicant_moved_to_regret_form
						from atif_career.career_form as f left join atif_career.career_form_data as u
					  on f.id= u.form_id
						left join ( 
						select * from atif_career.log_career_form as lf where lf.id in(
						select max(l.id) as id
						from atif_career.log_career_form as l  group by l.form_id )
						) as d
						on d.form_id = f.id  
						where f.status_id=12 and d.status_id=4 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  u.depart_id IN('".implode("','", $departmentFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


			 $Query = "select 
				38 as Query_num,
				count( f.id ) as applicant_moved_to_regret_form
				from atif_career.career_form as f left join atif_career.career_form_data as u
			  on f.id= u.form_id
				left join ( 
				select * from atif_career.log_career_form as lf where lf.id in(
				select max(l.id) as id
				from atif_career.log_career_form as l  group by l.form_id )
				) as d
				on d.form_id = f.id  
				where f.status_id=12 and d.status_id=4 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  u.depart_id IN('".implode("','", $departmentFilter)."') and  u.tag IN('".implode("','", $subjectFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

			 $Query = "select 
				38 as Query_num,
				count( f.id ) as applicant_moved_to_regret_form
				from atif_career.career_form as f left join atif_career.career_form_data as u
			  on f.id= u.form_id
				left join ( 
				select * from atif_career.log_career_form as lf where lf.id in(
				select max(l.id) as id
				from atif_career.log_career_form as l  group by l.form_id )
				) as d
				on d.form_id = f.id  
				where f.status_id=12 and d.status_id=4 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and   u.level_id IN('".implode("','", $designationFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


			 $Query = "select 
				38 as Query_num,
				count( f.id ) as applicant_moved_to_regret_form
				from atif_career.career_form as f left join atif_career.career_form_data as u
			  on f.id= u.form_id
				left join ( 
				select * from atif_career.log_career_form as lf where lf.id in(
				select max(l.id) as id
				from atif_career.log_career_form as l  group by l.form_id )
				) as d
				on d.form_id = f.id  
				where f.status_id=12 and d.status_id=4 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and   u.level_id IN('".implode("','", $designationFilter)."') and  u.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


			$Query = "select 
				38 as Query_num,
				count( f.id ) as applicant_moved_to_regret_form
				from atif_career.career_form as f left join atif_career.career_form_data as u
			  on f.id= u.form_id
				left join ( 
				select * from atif_career.log_career_form as lf where lf.id in(
				select max(l.id) as id
				from atif_career.log_career_form as l  group by l.form_id )
				) as d
				on d.form_id = f.id  
				where f.status_id=12 and d.status_id=4 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and   u.level_id IN('".implode("','", $designationFilter)."') and  u.campus IN('".implode("','", $campusFilter)."') and  f.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
		}

		$getStatus = DB::connection($this->dbCon)->select($Query);
		return $getStatus;


	}

	public function Overall_applicants_moved_to_Followup_for_Observation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

		/////AKHAN ///////////////////////////////

		if( $departmentFilter !='null' && $departmentFilter !=""){
			$departmentFilter = explode(",", $departmentFilter);

				$Query = "select 
						34 as Query_num, 
						sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

						from(
						select 
						curdate() as p_date,
						count( Distinct (cf.form_id) ) as Observation_Presence_Followup
						from atif_Career.log_career_form as cf 
						where cf.status_id=4 
						and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

						union
						select 
						(
						case when d.date = '1970-01-01'  then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
						else d.date
						end
						) as p_date,
						count( d.date ) as Observation_Presence_Followup

						from atif_career.career_form as f
						left outer join (
						select * from atif_career.career_form_data as s where s.id in(
						select 
						max( cf.id ) as latest
						from atif_career.career_form_data as cf 
						group by cf.form_id )
						) as d on d.form_id = f.id
						where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
						case when d.date = '1970-01-01' then 
						(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
						else d.date
						end
						)  < curdate()
						) as ff
						";
		}

		if( $subjectFilter !='null' && $subjectFilter !=""){
			$subjectFilter = explode(",", $subjectFilter);

			 						$Query = "select 
										34 as Query_num, 
										sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

										from(
										select 
										curdate() as p_date,
										count( Distinct (cf.form_id) ) as Observation_Presence_Followup
										from atif_Career.log_career_form as cf 
										where cf.status_id=4 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

										union
										select 
										(
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Observation_Presence_Followup

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate()
										) as ff
										";
		}

		if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			  $Query = "select 
										34 as Query_num, 
										sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

										from(
										select 
										curdate() as p_date,
										count( Distinct (cf.form_id) ) as Observation_Presence_Followup
										from atif_Career.log_career_form as cf 
										where cf.status_id=4 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

										union
										select 
										(
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Observation_Presence_Followup

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate()
										) as ff
										";
		}

		if( $designationFilter !='null' && $designationFilter !=""){
			$designationFilter = explode(",", $designationFilter);

			 $Query = "select 
										34 as Query_num, 
										sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

										from(
										select 
										curdate() as p_date,
										count( Distinct (cf.form_id) ) as Observation_Presence_Followup
										from atif_Career.log_career_form as cf 
										where cf.status_id=4 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

										union
										select 
										(
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Observation_Presence_Followup

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate()
										) as ff
										";
		}

		if( $campusFilter !='null' && $campusFilter !=""){
			$campusFilter = explode(",", $campusFilter);

			 				$Query = "select 
										34 as Query_num, 
										sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

										from(
										select 
										curdate() as p_date,
										count( Distinct (cf.form_id) ) as Observation_Presence_Followup
										from atif_Career.log_career_form as cf 
										where cf.status_id=4 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

										union
										select 
										(
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Observation_Presence_Followup

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate()
										) as ff
										";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			

								  $Query = "select 
										34 as Query_num, 
										sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

										from(
										select 
										curdate() as p_date,
										count( Distinct (cf.form_id) ) as Observation_Presence_Followup
										from atif_Career.log_career_form as cf 
										where cf.status_id=4 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

										union
										select 
										(
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Observation_Presence_Followup

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate()
										) as ff
										";
		}

		if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

			
										$Query = "select 
										34 as Query_num, 
										sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

										from(
										select 
										curdate() as p_date,
										count( Distinct (cf.form_id) ) as Observation_Presence_Followup
										from atif_Career.log_career_form as cf 
										where cf.status_id=4 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

										union
										select 
										(
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Observation_Presence_Followup

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate()
										) as ff
										";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

			

			 $Query = "select 
										34 as Query_num, 
										sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

										from(
										select 
										curdate() as p_date,
										count( Distinct (cf.form_id) ) as Observation_Presence_Followup
										from atif_Career.log_career_form as cf 
										where cf.status_id=4 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

										union
										select 
										(
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Observation_Presence_Followup

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate()
										) as ff
										";
		}

		if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

			
			 $Query = "select 
										34 as Query_num, 
										sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

										from(
										select 
										curdate() as p_date,
										count( Distinct (cf.form_id) ) as Observation_Presence_Followup
										from atif_Career.log_career_form as cf 
										where cf.status_id=4 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

										union
										select 
										(
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Observation_Presence_Followup

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate()
										) as ff
										";
		}

		if( $formSourceFilter !='null' && $formSourceFilter !=""){
			$formSourceFilter = explode(",", $formSourceFilter);

			 $Query = "select 
										34 as Query_num, 
										sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

										from(
										select 
										curdate() as p_date,
										count( Distinct (cf.form_id) ) as Observation_Presence_Followup
										from atif_Career.log_career_form as cf 
										where cf.status_id=4 
										and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

										union
										select 
										(
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Observation_Presence_Followup

										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  < curdate()
										) as ff
										";
		}

		/////AKHAN ///////////////////////////////

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

					 $Query = "select 
								34 as Query_num, 
								sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

								from(
								select 
								curdate() as p_date,
								count( Distinct (cf.form_id) ) as Observation_Presence_Followup
								from atif_Career.log_career_form as cf 
								where cf.status_id=4 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

								union
								select 
								(
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as Observation_Presence_Followup

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff
								";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

				//$departmentFilter = explode(",", $departmentFilter);
				 $Query = "select 
							34 as Query_num, 
							sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

							from(
							select 
							curdate() as p_date,
							count( Distinct (cf.form_id) ) as Observation_Presence_Followup
							from atif_Career.log_career_form as cf 
							where cf.status_id=4 
							and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

							union
							select 
							(
							case when d.date = '1970-01-01'  then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
							else d.date
							end
							) as p_date,
							count( d.date ) as Observation_Presence_Followup

							from atif_career.career_form as f
							left outer join (
							select * from atif_career.career_form_data as s where s.id in(
							select 
							max( cf.id ) as latest
							from atif_career.career_form_data as cf 
							group by cf.form_id )
							) as d on d.form_id = f.id
							where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
							case when d.date = '1970-01-01' then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
							else d.date
							end
							)  < curdate()
							) as ff
							";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

				 $Query = "select 
							34 as Query_num, 
							sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

							from(
							select 
							curdate() as p_date,
							count( Distinct (cf.form_id) ) as Observation_Presence_Followup
							from atif_Career.log_career_form as cf 
							where cf.status_id=4 
							and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

							union
							select 
							(
							case when d.date = '1970-01-01'  then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
							else d.date
							end
							) as p_date,
							count( d.date ) as Observation_Presence_Followup

							from atif_career.career_form as f
							left outer join (
							select * from atif_career.career_form_data as s where s.id in(
							select 
							max( cf.id ) as latest
							from atif_career.career_form_data as cf 
							group by cf.form_id )
							) as d on d.form_id = f.id
							where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
							case when d.date = '1970-01-01' then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
							else d.date
							end
							)  < curdate()
							) as ff";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){

				 $Query = "select 
							34 as Query_num, 
							sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

							from(
							select 
							curdate() as p_date,
							count( Distinct (cf.form_id) ) as Observation_Presence_Followup
							from atif_Career.log_career_form as cf 
							where cf.status_id=4 
							and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

							union
							select 
							(
							case when d.date = '1970-01-01'  then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
							else d.date
							end
							) as p_date,
							count( d.date ) as Observation_Presence_Followup

							from atif_career.career_form as f
							left outer join (
							select * from atif_career.career_form_data as s where s.id in(
							select 
							max( cf.id ) as latest
							from atif_career.career_form_data as cf 
							group by cf.form_id )
							) as d on d.form_id = f.id
							where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
							case when d.date = '1970-01-01' then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
							else d.date
							end
							)  < curdate()
							) as ff";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

				 $Query = "select 
							34 as Query_num, 
							sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

							from(
							select 
							curdate() as p_date,
							count( Distinct (cf.form_id) ) as Observation_Presence_Followup
							from atif_Career.log_career_form as cf 
							where cf.status_id=4 
							and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

							union
							select 
							(
							case when d.date = '1970-01-01'  then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
							else d.date
							end
							) as p_date,
							count( d.date ) as Observation_Presence_Followup

							from atif_career.career_form as f
							left outer join (
							select * from atif_career.career_form_data as s where s.id in(
							select 
							max( cf.id ) as latest
							from atif_career.career_form_data as cf 
							group by cf.form_id )
							) as d on d.form_id = f.id
							where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
							case when d.date = '1970-01-01' then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
							else d.date
							end
							)  < curdate()
							) as ff";
		}

		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

				 $Query = "select 
							34 as Query_num, 
							sum(ff.Observation_Presence_Followup) as Observation_Presence_Followup

							from(
							select 
							curdate() as p_date,
							count( Distinct (cf.form_id) ) as Observation_Presence_Followup
							from atif_Career.log_career_form as cf 
							where cf.status_id=4 
							and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   

							union
							select 
							(
							case when d.date = '1970-01-01'  then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
							else d.date
							end
							) as p_date,
							count( d.date ) as Observation_Presence_Followup

							from atif_career.career_form as f
							left outer join (
							select * from atif_career.career_form_data as s where s.id in(
							select 
							max( cf.id ) as latest
							from atif_career.career_form_data as cf 
							group by cf.form_id )
							) as d on d.form_id = f.id
							where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
							case when d.date = '1970-01-01' then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
							else d.date
							end
							)  < curdate()
							) as ff";
		}
		$getStatus = DB::connection($this->dbCon)->select($Query);
		return $getStatus;


	}

//zk

				public function Applicants_currently_in_Followup_for_Observation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){




						/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query ="select 
								35 as Query_num, 
								sum(ff.no_actions) as no_actions
								from(
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
								and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as no_actions
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1 )
								else d.date
								end
								)  <  curdate() ) as ff";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query ="select 
								35 as Query_num, 
								sum(ff.no_actions) as no_actions
								from(
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
								and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as no_actions
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1 )
								else d.date
								end
								)  <  curdate() ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query ="select 
								35 as Query_num, 
								sum(ff.no_actions) as no_actions
								from(
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
								and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as no_actions
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  dd.depart_id IN('".implode("','", $departmentFilter)."') and  dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1 )
								else d.date
								end
								)  <  curdate() ) as ff";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query ="select 
								35 as Query_num, 
								sum(ff.no_actions) as no_actions
								from(
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
								and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as no_actions
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1 )
								else d.date
								end
								)  <  curdate() ) as ff";
					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query ="select 
								35 as Query_num, 
								sum(ff.no_actions) as no_actions
								from(
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
								and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as no_actions
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1 )
								else d.date
								end
								)  <  curdate() ) as ff";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						$Query ="select 
								35 as Query_num, 
								sum(ff.no_actions) as no_actions
								from(
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
								and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as no_actions
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1 )
								else d.date
								end
								)  <  curdate() ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

					$Query ="select 
							35 as Query_num, 
							sum(ff.no_actions) as no_actions
							from(
							select 
							(
							case when d.date = '1970-01-01' then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
							and dd.form_id= d.form_id order by dd.id desc limit 1)
							else d.date
							end
							) as p_date,
							count( d.date ) as no_actions
							from atif_career.career_form as f
							left outer join (
							select * from atif_career.career_form_data as s where s.id in(
							select 
							max( cf.id ) as latest
							from atif_career.career_form_data as cf 
							group by cf.form_id )
							) as d on d.form_id = f.id
							where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
							case when d.date = '1970-01-01'  then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  dd.depart_id IN('".implode("','", $departmentFilter)."') and  dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1 )
							else d.date
							end
							)  <  curdate() ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

						$Query ="select 
								35 as Query_num, 
								sum(ff.no_actions) as no_actions
								from(
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
								and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as no_actions
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."')  order by dd.id desc limit 1 )
								else d.date
								end
								)  <  curdate() ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query ="select 
								35 as Query_num, 
								sum(ff.no_actions) as no_actions
								from(
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
								and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as no_actions
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1 )
								else d.date
								end
								)  <  curdate() ) as ff";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query ="select 
								35 as Query_num, 
								sum(ff.no_actions) as no_actions
								from(
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
								and dd.form_id= d.form_id order by dd.id desc limit 1)
								else d.date
								end
								) as p_date,
								count( d.date ) as no_actions
								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01'  then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1 )
								else d.date
								end
								)  <  curdate() ) as ff";

					}


					/////AKHAN ///////////////////////////////

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

						$Query ="select 
									35 as Query_num, 
									sum(ff.no_actions) as no_actions
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as no_actions
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' order by dd.id desc limit 1 )
									else d.date
									end
									)  <  curdate() ) as ff ";
								}


								


									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

										//$departmentFilter = explode(",", $departmentFilter);

										$Query ="select 
												35 as Query_num, 
												sum(ff.no_actions) as no_actions
												from(
												select 
												(
												case when d.date = '1970-01-01' then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
												and dd.form_id= d.form_id order by dd.id desc limit 1)
												else d.date
												end
												) as p_date,
												count( d.date ) as no_actions
												from atif_career.career_form as f
												left outer join (
												select * from atif_career.career_form_data as s where s.id in(
												select 
												max( cf.id ) as latest
												from atif_career.career_form_data as cf 
												group by cf.form_id )
												) as d on d.form_id = f.id
												where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
												case when d.date = '1970-01-01'  then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1 )
												else d.date
												end
												)  <  curdate() ) as ff";

									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


										$Query ="select 
												35 as Query_num, 
												sum(ff.no_actions) as no_actions
												from(
												select 
												(
												case when d.date = '1970-01-01' then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
												and dd.form_id= d.form_id order by dd.id desc limit 1)
												else d.date
												end
												) as p_date,
												count( d.date ) as no_actions
												from atif_career.career_form as f
												left outer join (
												select * from atif_career.career_form_data as s where s.id in(
												select 
												max( cf.id ) as latest
												from atif_career.career_form_data as cf 
												group by cf.form_id )
												) as d on d.form_id = f.id
												where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
												case when d.date = '1970-01-01'  then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1 )
												else d.date
												end
												)  <  curdate() ) as ff";

									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){


										$Query ="select 
												35 as Query_num, 
												sum(ff.no_actions) as no_actions
												from(
												select 
												(
												case when d.date = '1970-01-01' then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
												and dd.form_id= d.form_id order by dd.id desc limit 1)
												else d.date
												end
												) as p_date,
												count( d.date ) as no_actions
												from atif_career.career_form as f
												left outer join (
												select * from atif_career.career_form_data as s where s.id in(
												select 
												max( cf.id ) as latest
												from atif_career.career_form_data as cf 
												group by cf.form_id )
												) as d on d.form_id = f.id
												where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
												case when d.date = '1970-01-01'  then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1 )
												else d.date
												end
												)  <  curdate() ) as ff";

									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


										$Query ="select 
												35 as Query_num, 
												sum(ff.no_actions) as no_actions
												from(
												select 
												(
												case when d.date = '1970-01-01' then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
												and dd.form_id= d.form_id order by dd.id desc limit 1)
												else d.date
												end
												) as p_date,
												count( d.date ) as no_actions
												from atif_career.career_form as f
												left outer join (
												select * from atif_career.career_form_data as s where s.id in(
												select 
												max( cf.id ) as latest
												from atif_career.career_form_data as cf 
												group by cf.form_id )
												) as d on d.form_id = f.id
												where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
												case when d.date = '1970-01-01'  then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1 )
												else d.date
												end
												)  <  curdate() ) as ff";

									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


										$Query ="select 
												35 as Query_num, 
												sum(ff.no_actions) as no_actions
												from(
												select 
												(
												case when d.date = '1970-01-01' then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
												and dd.form_id= d.form_id order by dd.id desc limit 1)
												else d.date
												end
												) as p_date,
												count( d.date ) as no_actions
												from atif_career.career_form as f
												left outer join (
												select * from atif_career.career_form_data as s where s.id in(
												select 
												max( cf.id ) as latest
												from atif_career.career_form_data as cf 
												group by cf.form_id )
												) as d on d.form_id = f.id
												where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
												case when d.date = '1970-01-01'  then 
												(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."')  order by dd.id desc limit 1 )
												else d.date
												end
												)  <  curdate() ) as ff";

									}

									




					$getStatus = DB::connection($this->dbCon)->select($Query);

									return $getStatus;

				}



				public function Days_passed_no_action_taken($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){


				////////////////AKHAN ///////////////////////////////

				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

								$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						 $Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')  order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

						$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  dd.level_id IN('".implode("','", $designationFilter)."') and  dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

					}


					/////AKHAN ///////////////////////////////



						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

								$Query="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";
									}



									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

										//$departmentFilter = explode(",", $departmentFilter);

										$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


										$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){


										$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."')    order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


										$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')   order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


										$Query ="select 
										36 as Query_num, 
										sum(ff.Days_passed_no_action_taken) as Days_passed_no_action_taken
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as Days_passed_no_action_taken
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."')   order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff";

									}


										$getStatus = DB::connection($this->dbCon)->select($Query);

										return $getStatus;

							}


						public function Overall_applicants_given_extension_from_Followup_for_Formal_Interview_presence1($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){


								/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query ="select 
								39 as Query_num,
								count( l.id ) as given_extension_from_observation
								from atif_career.career_form as l left join atif_career.career_form_data as u
						  on l.id= u.form_id where l.status_id=4 and l.stage_id=13  and u.depart_id IN('".implode("','", $departmentFilter)."')";


					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query ="select 
								39 as Query_num,
								count( l.id ) as given_extension_from_observation
								from atif_career.career_form as l left join atif_career.career_form_data as u
						  on l.id= u.form_id where l.status_id=4 and l.stage_id=13  and u.tag IN('".implode("','", $subjectFilter)."')";


					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						 $Query ="select 
								39 as Query_num,
								count( l.id ) as given_extension_from_observation
								from atif_career.career_form as l left join atif_career.career_form_data as u
						  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query ="select 
								39 as Query_num,
								count( l.id ) as given_extension_from_observation
								from atif_career.career_form as l left join atif_career.career_form_data as u
						  on l.id= u.form_id where l.status_id=4 and l.stage_id=13  and u.level_id IN('".implode("','", $designationFilter)."')";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query ="select 
								39 as Query_num,
								count( l.id ) as given_extension_from_observation
								from atif_career.career_form as l left join atif_career.career_form_data as u
						  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and u.campus IN('".implode("','", $campusFilter)."')";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						$Query ="select 
								39 as Query_num,
								count( l.id ) as given_extension_from_observation
								from atif_career.career_form as l left join atif_career.career_form_data as u
						  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and  u.level_id IN('".implode("','", $designationFilter)."') and  u.campus IN('".implode("','", $campusFilter)."')";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						$Query ="select 
								39 as Query_num,
								count( l.id ) as given_extension_from_observation
								from atif_career.career_form as l left join atif_career.career_form_data as u
						  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.campus IN('".implode("','", $campusFilter)."')";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

						 $Query ="select 
									39 as Query_num,
									count( l.id ) as given_extension_from_observation
									from atif_career.career_form as l left join atif_career.career_form_data as u
							  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."')";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query ="select 
								39 as Query_num,
								count( l.id ) as given_extension_from_observation
								from atif_career.career_form as l left join atif_career.career_form_data as u
						  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query ="select 
									39 as Query_num,
									count( l.id ) as given_extension_from_observation
									from atif_career.career_form as l left join atif_career.career_form_data as u
							  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and l.form_source IN('".implode("','", $formSourceFilter)."')";

					}


					/////AKHAN ///////////////////////////////

								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

									$Query ="select 
												39 as Query_num,
												count( l.id ) as given_extension_from_observation
												from atif_career.career_form as l where l.status_id=4 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'";

												}


								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

										//$departmentFilter = explode(",", $departmentFilter);

										$Query ="select 
												39 as Query_num,
												count( l.id ) as given_extension_from_observation
												from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."')";
									}


									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


										$Query ="select 
												39 as Query_num,
												count( l.id ) as given_extension_from_observation
												from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')";
									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


										$Query ="select 
												39 as Query_num,
												count( l.id ) as given_extension_from_observation
												from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')";
									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


										$Query ="select 
												39 as Query_num,
												count( l.id ) as given_extension_from_observation
												from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') ";
									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


										$Query ="select 
												39 as Query_num,
												count( l.id ) as given_extension_from_observation
												from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and l.form_source IN('".implode("','", $formSourceFilter)."')";
									}

									

									$getStatus = DB::connection($this->dbCon)->select($Query);

										return $getStatus;

						}


						public function Overall_applicants_moved_to_Not_Interested_from_Followup_for_Observation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

								/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and u.depart_id IN('".implode("','", $departmentFilter)."')";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and l.stage_id=6  and u.tag IN('".implode("','", $subjectFilter)."')";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						 $Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and l.stage_id=6  and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."')";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."')";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and u.campus IN('".implode("','", $campusFilter)."')";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						$Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						 $Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."')";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

						 $Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."')";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')";
					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
								37 as Query_num,
								count( l.id ) as applicants_moved_to_Not_Interested_to_moved
								from atif_career.career_form as l left join atif_career.career_form_data as u
									  on l.id= u.form_id where l.status_id=4 and l.stage_id=6  and l.form_source IN('".implode("','", $formSourceFilter)."')";

					}


					/////AKHAN ///////////////////////////////



							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){			

									$Query="select 
									37 as Query_num,
									count( l.id ) as applicants_moved_to_Not_Interested_to_moved
									from atif_career.career_form as l where l.status_id=4 and l.stage_id=6 and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'";
									}


									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){			
										//$departmentFilter = explode(",", $departmentFilter);
									$Query="select 
									37 as Query_num,
									count( l.id ) as applicants_moved_to_Not_Interested_to_moved
									from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."')";
									}


									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){			
									$Query="select 
									37 as Query_num,
									count( l.id ) as applicants_moved_to_Not_Interested_to_moved
									from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')";
									}


									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){	

									$Query="select 
									37 as Query_num,
									count( l.id ) as applicants_moved_to_Not_Interested_to_moved
									from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')";
									}


									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){		

									$Query="select 
									37 as Query_num,
									count( l.id ) as applicants_moved_to_Not_Interested_to_moved
									from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')";
									}

									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){	

									$Query="select 
									37 as Query_num,
									count( l.id ) as applicants_moved_to_Not_Interested_to_moved
									from atif_career.career_form as l left join atif_career.career_form_data as u
										  on l.id= u.form_id where l.status_id=4 and l.stage_id=6 and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')and u.campus IN('".implode("','", $campusFilter)."')and l.form_source IN('".implode("','", $formSourceFilter)."')";
									}

									$getStatus = DB::connection($this->dbCon)->select($Query);

										return $getStatus;
						}


						


			}