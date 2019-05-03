<?php
namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class Staff_recruitment_process_filter_data_view_modal extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_form';
    protected $dbCon = 'mysql_Career';


	//Arif Khan Work

	///////////////////////////////////////////ONLINE APPLICATION////////////////////////////////////////////
	//arif    cfd.depart_id IN('".implode("','", $departmentFilter)."')
	// public function online_get_data_filter_arif($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter)

	/////////ONLINE APPLICATIONS///////////////////////////////////////////

	public function online_get_data_filter($date_1,$date_2,$campusFilter,$formSourceFilter){


		///////////////AKHAN ///////////////////////////////
		

			$Query = "select 
				af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
			      af.nic, af.gender, af.position_applied, af.comments,
			      af.status_id, af.stage_id,
			      cs.name as status_name, cs.name_code as status_code,
			      ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
			      af.form_source as form_source2,
			      d.p_date as part_b_date, 
			      d.p_time as part_b_time,
			      if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
			      '' as part_b_complete,
			      (case 
			      when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
			      when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
			      when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
			      else ''
			      end ) as PartB,
			      from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
			      from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
			      from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
			      if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
			      d.comments_next_step,
			      d.comments_applicant,
			      d.comments_next_decision,
			      d.comments_next_step_aloc
				from atif_career.career_form as af 
				left outer join (
				select 
				(
				case when s.date = '1970-01-01' then 
				(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
				and dd.form_id= s.form_id order by dd.id desc limit 1)
				else s.date
				end
				) as p_date,
				(
				case when s.date = '1970-01-01' then 
				(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
				and dd.form_id= s.form_id order by dd.id desc limit 1)
				else s.time
				end
				) as p_time,
				(
				case when s.date = '1970-01-01' then 
				(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
				and dd.form_id= s.form_id order by dd.id desc limit 1)
				else s.campus
				end
				) as p_campus,
				s.* from atif_career.career_form_data as s where s.id in(
				select 
				max( cf.id ) as latest
				from atif_career.career_form_data as cf 
				group by cf.form_id  
				)
				) 
				as d on d.form_id = af.id
				left join atif_career.career_status as cs on cs.id = af.status_id 
				left join atif_career.career_stage as ct on ct.id = af.stage_id 
				left join atif_career.career_form_data as cfd on cfd.form_id = af.id
				left join (
				select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
				from atif_career.log_career_form as lcf 
				order by lcf.created limit 1) as lcf on lcf.form_id = af.id
				WHERE af.form_source=1  and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id"; 

		
		

				  	if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
							af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
						      af.nic, af.gender, af.position_applied, af.comments,
						      af.status_id, af.stage_id,
						      cs.name as status_name, cs.name_code as status_code,
						      ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
						      af.form_source as form_source2,
						      d.p_date as part_b_date, 
						      d.p_time as part_b_time,
						      if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
						      '' as part_b_complete,
						      (case 
						      when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
						      when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
						      when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
						      else ''
						      end ) as PartB,
						      from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
						      from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
						      from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
						      if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
						      d.comments_next_step,
						      d.comments_applicant,
						      d.comments_next_decision,
						      d.comments_next_step_aloc
							from atif_career.career_form as af 
							left outer join (
							select 
							(
							case when s.date = '1970-01-01' then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
							and dd.form_id= s.form_id order by dd.id desc limit 1)
							else s.date
							end
							) as p_date,
							(
							case when s.date = '1970-01-01' then 
							(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
							and dd.form_id= s.form_id order by dd.id desc limit 1)
							else s.time
							end
							) as p_time,
							(
							case when s.date = '1970-01-01' then 
							(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
							and dd.form_id= s.form_id order by dd.id desc limit 1)
							else s.campus
							end
							) as p_campus,
							s.* from atif_career.career_form_data as s where s.id in(
							select 
							max( cf.id ) as latest
							from atif_career.career_form_data as cf 
							group by cf.form_id  
							)
							) 
							as d on d.form_id = af.id
							left join atif_career.career_status as cs on cs.id = af.status_id 
							left join atif_career.career_stage as ct on ct.id = af.stage_id 
							left join atif_career.career_form_data as cfd on cfd.form_id = af.id
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf 
							order by lcf.created limit 1) as lcf on lcf.form_id = af.id
							WHERE af.form_source=1 and  from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id"; 

					
						
					}



					

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
								af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
								      af.nic, af.gender, af.position_applied, af.comments,
								      af.status_id, af.stage_id,
								      cs.name as status_name, cs.name_code as status_code,
								      ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
								      af.form_source as form_source2,
								      d.p_date as part_b_date, 
								      d.p_time as part_b_time,
								      if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
								      '' as part_b_complete,
								      (case 
								      when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
								      when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
								      when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
								      else ''
								      end ) as PartB,
								      from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
								      from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
								      from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
								      if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
								      d.comments_next_step,
								      d.comments_applicant,
								      d.comments_next_decision,
								      d.comments_next_step_aloc
								from atif_career.career_form as af 
								left outer join (
								select 
								(
								case when s.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
								and dd.form_id= s.form_id order by dd.id desc limit 1)
								else s.date
								end
								) as p_date,
								(
								case when s.date = '1970-01-01' then 
								(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
								and dd.form_id= s.form_id order by dd.id desc limit 1)
								else s.time
								end
								) as p_time,
								(
								case when s.date = '1970-01-01' then 
								(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
								and dd.form_id= s.form_id order by dd.id desc limit 1)
								else s.campus
								end
								) as p_campus,
								s.* from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id  
								)
								) 
								as d on d.form_id = af.id
								left join atif_career.career_status as cs on cs.id = af.status_id 
								left join atif_career.career_stage as ct on ct.id = af.stage_id 
								left join atif_career.career_form_data as cfd on cfd.form_id = af.id
								left join (
								select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
								from atif_career.log_career_form as lcf 
								order by lcf.created limit 1) as lcf on lcf.form_id = af.id
								WHERE af.form_source=1 and  cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id ";

						
						// return $Query_Return;
					}


					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
						$Query = "select 
								af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
								      af.nic, af.gender, af.position_applied, af.comments,
								      af.status_id, af.stage_id,
								      cs.name as status_name, cs.name_code as status_code,
								      ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
								      af.form_source as form_source2,
								      d.p_date as part_b_date, 
								      d.p_time as part_b_time,
								      if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
								      '' as part_b_complete,
								      (case 
								      when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
								      when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
								      when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
								      else ''
								      end ) as PartB,
								      from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
								      from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
								      from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
								      if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
								      d.comments_next_step,
								      d.comments_applicant,
								      d.comments_next_decision,
								      d.comments_next_step_aloc
								from atif_career.career_form as af 
								left outer join (
								select 
								(
								case when s.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
								and dd.form_id= s.form_id order by dd.id desc limit 1)
								else s.date
								end
								) as p_date,
								(
								case when s.date = '1970-01-01' then 
								(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
								and dd.form_id= s.form_id order by dd.id desc limit 1)
								else s.time
								end
								) as p_time,
								(
								case when s.date = '1970-01-01' then 
								(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
								and dd.form_id= s.form_id order by dd.id desc limit 1)
								else s.campus
								end
								) as p_campus,
								s.* from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id  
								)
								) 
								as d on d.form_id = af.id
								left join atif_career.career_status as cs on cs.id = af.status_id 
								left join atif_career.career_stage as ct on ct.id = af.stage_id 
								left join atif_career.career_form_data as cfd on cfd.form_id = af.id
								left join (
								select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
								from atif_career.log_career_form as lcf 
								order by lcf.created limit 1) as lcf on lcf.form_id = af.id
								WHERE af.form_source=1 and  af.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id ";

						
						// return $Query_Return;
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){


						$Query = "select 
							af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
						      af.nic, af.gender, af.position_applied, af.comments,
						      af.status_id, af.stage_id,
						      cs.name as status_name, cs.name_code as status_code,
						      ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
						      af.form_source as form_source2,
						      d.p_date as part_b_date, 
						      d.p_time as part_b_time,
						      if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
						      '' as part_b_complete,
						      (case 
						      when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
						      when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
						      when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
						      else ''
						      end ) as PartB,
						      from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
						      from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
						      from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
						      if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
						      d.comments_next_step,
						      d.comments_applicant,
						      d.comments_next_decision,
						      d.comments_next_step_aloc
							from atif_career.career_form as af 
							left outer join (
							select 
							(
							case when s.date = '1970-01-01' then 
							(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
							and dd.form_id= s.form_id order by dd.id desc limit 1)
							else s.date
							end
							) as p_date,
							(
							case when s.date = '1970-01-01' then 
							(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
							and dd.form_id= s.form_id order by dd.id desc limit 1)
							else s.time
							end
							) as p_time,
							(
							case when s.date = '1970-01-01' then 
							(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
							and dd.form_id= s.form_id order by dd.id desc limit 1)
							else s.campus
							end
							) as p_campus,
							s.* from atif_career.career_form_data as s where s.id in(
							select 
							max( cf.id ) as latest
							from atif_career.career_form_data as cf 
							group by cf.form_id  
							)
							) 
							as d on d.form_id = af.id
							left join atif_career.career_status as cs on cs.id = af.status_id 
							left join atif_career.career_stage as ct on ct.id = af.stage_id 
							left join atif_career.career_form_data as cfd on cfd.form_id = af.id
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf 
							order by lcf.created limit 1) as lcf on lcf.form_id = af.id
							WHERE af.form_source=1 and  from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  af.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id"; 


					}

					
					$Query_Return = $this->Create_query($Query);
					
					return $Query_Return;


					
			}

	public function fill_part_a_online($date_1,$date_2,$campusFilter,$formSourceFilter){
		
		///////////////AKHAN ///////////////////////////////


			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
					select 
					cf.id 
					from atif_career.career_form as cf 
					left join atif_career.log_career_form as lcf on lcf.form_id=cf.id
					where cf.form_source=1 and lcf.id is null
					) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id"; 

			
		

		


		if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
					select 
					cf.id 
					from atif_career.career_form as cf 
					left join atif_career.log_career_form as lcf on lcf.form_id=cf.id
					where from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source=1 and lcf.id is null
					) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id"; 

						
						
					}



					
					

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
					select 
					cf.id 
					from atif_career.career_form as cf 
					left join atif_career.log_career_form as lcf on lcf.form_id=cf.id
					where cf.form_source=1 and  cfd.campus IN('".implode("','", $campusFilter)."') and lcf.id is null
					) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id"; 

						
						
					}



					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $campusFilter !='null' && $campusFilter !=""){
							
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
					select 
					cf.id 
					from atif_career.career_form as cf 
					left join atif_career.log_career_form as lcf on lcf.form_id=cf.id
					where from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  cfd.campus IN('".implode("','", $campusFilter)."') and cf.form_source=1 and lcf.id is null
					) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id"; 

						
						
					}




					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
					select 
					cf.id 
					from atif_career.career_form as cf 
					left join atif_career.log_career_form as lcf on lcf.form_id=cf.id
					where cf.form_source=1 and  cf.form_source IN('".implode("','", $formSourceFilter)."') and lcf.id is null
					) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id"; 


						
						
					}


					
				


					$Query_Return = $this->Create_query($Query);


		return $Query_Return;


	}


	public function Part_A_Screening($date_1,$date_2,$campusFilter,$formSourceFilter){

					

		

			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(select cf.id
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 
								and dd.status_id=1 and cf.stage_id=1 and cf.form_source=1 and
								from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

			

		

		

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(select cf.id
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 
								and dd.status_id=1 and cf.stage_id=1 and cf.form_source=1 and cfd.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id)"; 
		
										
						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(select cf.id
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 
								and dd.status_id=1 and cf.stage_id=1 and cf.form_source=1 and cf.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id)"; 
		
							
						
					}


					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(select cf.id
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 
								and dd.status_id=1 and cf.stage_id=1 and cf.form_source=1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id)"; 
		
								
						
					}


				
					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(select cf.id
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 
								and dd.status_id=1 and cf.stage_id=1 and cf.form_source=1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id)"; 
		
								

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(select cf.id
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 
								and dd.status_id=1 and cf.stage_id=1 and cf.form_source=1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY af.id)"; 
		
								

						

					}

				
		
								$Query_Return = $this->Create_query($Query);

				

								return $Query_Return;

	}



	public function Applicants_triggered($date_1,$date_2,$campusFilter,$formSourceFilter){

		

			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in (

  					  select 
						 cf.id 
						from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9
						 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";

		





					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in (

  					  select 
						 cf.id 
						from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9
						  and cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";

					
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
						

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in (

                      select cf.id
					from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9
					and cf.form_source IN('".implode("','", $formSourceFilter)."') and
					from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";
										
											
					}





					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in (

                      select cf.id
					from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9
					and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and
					from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";
										
					

						
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in (

                      select cf.id
					from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9
					and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."') and
					from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";
										
					

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in (

                      select cf.id
					from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9
					and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') and
					from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";
										
					

						

					}

					$Query_Return = $this->Create_query($Query);



					return $Query_Return;


	}


	public function Applicants_awating($date_1,$date_2,$campusFilter,$formSourceFilter){



			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in ( 

								select 
								 cf.id  
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
								where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date >= curdate() )
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";

		

				

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in ( 

								select 
								 cf.id  
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
								where cf.status_id=11 and cf.stage_id=10  and  cfd.campus IN('".implode("','", $campusFilter)."') and ( u.date is null or u.date >= curdate() )
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";


						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in ( 

								select 
								 cf.id  
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
								where cf.status_id=11 and cf.stage_id=10  and  cf.form_source IN('".implode("','", $formSourceFilter)."') and ( u.date is null or u.date >= curdate() )
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";

							
						
					}



					


					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in ( 

								select 
								 cf.id  
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
								where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and ( u.date is null or u.date >= curdate() )
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";

						
					}





					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in ( 

								select 
								 cf.id  
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
								where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and  cfd.campus IN('".implode("','", $campusFilter)."') and ( u.date is null or u.date >= curdate() )
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";

							

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in ( 

								select 
								 cf.id  
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
								where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and  cf.form_source IN('".implode("','", $formSourceFilter)."') and ( u.date is null or u.date >= curdate() )
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )   GROUP BY af.id";
						}

					
			$Query_Return = $this->Create_query($Query);


			return $Query_Return;

		}






		public function Overall_applicants($date_1,$date_2,$campusFilter,$formSourceFilter){


					

			 $Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE 

						af.id in(

					select 
					cf.id
					from atif_career.career_form as cf 
					left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
					where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
					  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  )GROUP BY af.id
						  ";

			

				

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate()  )
						 and u.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

							


						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate()  )
						 and cf.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

							
						
					}





					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate()  )
						 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

							
						
					}






					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate()  )
						  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and cfd.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

							

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate()  )
						and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and cf.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

					}

					
				$Query_Return = $this->Create_query($Query);

			return $Query_Return;

		}


		public function Applicants_currently($date_1,$date_2,$campusFilter,$formSourceFilter){


			 $Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(

						    select 
						cf.id
						    from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
						  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";
						  


					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						    select 
						cf.id
						    from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
						 and cfd.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

							


						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						    select 
						cf.id
						    from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
						 and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

						
					}



					

					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						    select 
						cf.id
						    from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
						 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

					}


					


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(

						    select 
						cf.id
						    from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
						and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

							

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(

						    select 
						cf.id
						    from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
						where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
						and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."')   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) GROUP BY af.id";

							

						

					}

					$Query_Return = $this->Create_query($Query);
				

				return $Query_Return;
			
		}



		public function Overall_applicants_part_A ($date_1,$date_2,$campusFilter,$formSourceFilter){


			
			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
						    select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id 
						and u.status_id= 1
						where cf.status_id=2 
						and cf.stage_id=4 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
						and ( u.date is null or u.date >= curdate() )) GROUP BY af.id";

			


		

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
						    select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id 
						and u.status_id= 1
						where cf.status_id=2 
						and cf.stage_id=4 and cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
						and ( u.date is null or u.date >= curdate() )) GROUP BY af.id";

						


						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
						    select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id 
						and u.status_id= 1
						where cf.status_id=2 
						and cf.stage_id=4 and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
						and ( u.date is null or u.date >= curdate() )) GROUP BY af.id";

							
						
					}



					

					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
						    select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id 
						and u.status_id= 1
						where cf.status_id=2 
						and cf.stage_id=4 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
						and ( u.date is null or u.date >= curdate() )) GROUP BY af.id";

							
						
					}


					

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
						    select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id 
						and u.status_id= 1
						where cf.status_id=2 
						and cf.stage_id=4 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
						and ( u.date is null or u.date >= curdate() )) GROUP BY af.id";

							
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(
						    select 
						cf.id
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id 
						and u.status_id= 1
						where cf.status_id=2 
						and cf.stage_id=4 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
						and ( u.date is null or u.date >= curdate() )) GROUP BY af.id";

							

					}

					$Query_Return = $this->Create_query($Query);

				



					return $Query_Return;

		}


		public function Overall_applicants_moved($date_1,$date_2,$campusFilter,$formSourceFilter){

		

			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(

						select 
						lcf.id
						from atif_career.career_form as lcf where lcf.status_id=11 and lcf.stage_id=6  and from_unixtime(lcf.created ,'%Y-%m-%d') >= '2018-10-01' )  GROUP BY af.id";

		





					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(

						select 
						lcf.id
						from atif_career.career_form as lcf where lcf.status_id=11 and lcf.stage_id=6 and cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(lcf.created ,'%Y-%m-%d') >= '2018-10-01' )  GROUP BY af.id";


						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(

						select 
						lcf.id
						from atif_career.career_form as lcf where lcf.status_id=11 and lcf.stage_id=6 and lcf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(lcf.created ,'%Y-%m-%d') >= '2018-10-01' )  GROUP BY af.id";

							
					}




					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(

						select 
						lcf.id
						from atif_career.career_form as lcf where lcf.status_id=11 and lcf.stage_id=6 and from_unixtime(lcf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(lcf.created ,'%Y-%m-%d') >= '2018-10-01' )  GROUP BY af.id";

							
						
					}


					


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(

						select 
						lcf.id
						from atif_career.career_form as lcf where lcf.status_id=11 and lcf.stage_id=6 and from_unixtime(lcf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(lcf.created ,'%Y-%m-%d') >= '2018-10-01' )  GROUP BY af.id";

							

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE af.id in(

						select 
						lcf.id
						from atif_career.career_form as lcf where lcf.status_id=11 and lcf.stage_id=6 and from_unixtime(lcf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and lcf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(lcf.created ,'%Y-%m-%d') >= '2018-10-01' )  GROUP BY af.id";

							
						

					}

					$Query_Return = $this->Create_query($Query);
						

					return $Query_Return;


		}



		public function Overall_applicants_marked($date_1,$date_2,$campusFilter,$formSourceFilter){

		

			$Query = "select 
		af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
		af.nic, af.gender, af.position_applied, af.comments,
		af.status_id, af.stage_id,
		cs.name as status_name, cs.name_code as status_code,
		ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
		af.form_source as form_source2,
		d.p_date as part_b_date, 
		d.p_time as part_b_time,
		if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
		'' as part_b_complete,
		(case 
		when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
		when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
		when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
		else ''
		end ) as PartB,
		from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
		from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
		from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
		if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
		d.comments_next_step,
		d.comments_applicant,
		d.comments_next_decision,
		d.comments_next_step_aloc
		from atif_career.career_form as af 
		left outer join (
		select 
		(
		case when s.date = '1970-01-01' then 
		(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
		and dd.form_id= s.form_id order by dd.id desc limit 1)
		else s.date
		end
		) as p_date,
		(
		case when s.date = '1970-01-01' then 
		(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
		and dd.form_id= s.form_id order by dd.id desc limit 1)
		else s.time
		end
		) as p_time,
		(
		case when s.date = '1970-01-01' then 
		(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
		and dd.form_id= s.form_id order by dd.id desc limit 1)
		else s.campus
		end
		) as p_campus,
		s.* from atif_career.career_form_data as s where s.id in(
		select 
		max( cf.id ) as latest
		from atif_career.career_form_data as cf 
		group by cf.form_id  
		)
		) 
		as d on d.form_id = af.id
		left join atif_career.career_status as cs on cs.id = af.status_id 
		left join atif_career.career_stage as ct on ct.id = af.stage_id 
		left join atif_career.career_form_data as cfd on cfd.form_id = af.id
		left join (
		select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
		from atif_career.log_career_form as lcf 
		order by lcf.created limit 1) as lcf on lcf.form_id = af.id
		WHERE  af.id in(

				select  d.form_id  
				from( 
				select  (l.form_id) as form_id  from atif_career.log_career_form as l 
				where l.status_id=11 and l.stage_id =4 group by l.form_id  
				union
				select  (l.id) as form_id  from atif_career.career_form as l 
				where l.status_id=11 and l.stage_id =4 group by l.id
				and  from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
				) as d
				
				  ) group by af.id

					 ";

			
	

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

						select (la.form_id) as id  from atif_career.log_career_form as la  
						left join atif_career.career_form_data as cfd on cfd.form_id = la.form_id
						where la.status_id=11 and la.stage_id =4  and cfd.campus IN('".implode("','", $campusFilter)."') 
						 
						
						) group by af.id
						
						";

							
						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
				$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

						select (la.form_id) as id  from atif_career.log_career_form as la  
						left join atif_career.career_form_data as cfd on cfd.form_id = la.form_id
						where la.status_id=11 and la.stage_id =4  and af.form_source IN('".implode("','", $formSourceFilter)."') 
						 
						
						) group by af.id
						
						";

						
						
					}




					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						select  d.form_id  
						from( 
						select  (l.form_id) as form_id  from atif_career.log_career_form as l 
						left join atif_career.career_form as u
										  on u.id=l.form_id
						where l.status_id=11 and l.stage_id =4 
						
						and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
						and  from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'   
						) as d
						
						  ) group by af.id";

							
						
					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						select  d.form_id  
						from( 
						select  (l.form_id) as form_id  from atif_career.log_career_form as l 
						left join atif_career.career_form_data as u
										  on u.form_id=l.form_id
						where l.status_id=11 and l.stage_id =4 
						
						and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						and  u.campus IN('".implode("','", $campusFilter)."') 
						and  from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'   
						) as d
						
						  ) group by af.id";

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					WHERE  af.id in(

						select  d.form_id  
						from( 
						select  (l.form_id) as form_id  from atif_career.log_career_form as l 
						left join atif_career.career_form as u
										  on u.id=l.form_id
						where l.status_id=11 and l.stage_id =4 
						
						and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						and  u.form_source IN('".implode("','", $formSourceFilter)."') 
						and  from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'   
						) as d
						
						  ) group by af.id";

						

					}

					$Query_Return = $this->Create_query($Query);


				return $Query_Return;
			}


		public function Overall_Walkin_applications($date_1,$date_2,$campusFilter,$formSourceFilter){

			

			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in ( select cf.id from atif_career.career_form as cf 
					 where cf.form_source=0 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

		




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in ( select cf.id from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
					 where cf.form_source=0 and uf.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						
						";

							
						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
				$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in ( select cf.id from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
					 where cf.form_source=0 and cf.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						
						
						
						";

							
						
					}



				


					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in ( select cf.id from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
					 where cf.form_source=0 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'   and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

													
					}


					



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in ( select cf.id from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
					 where cf.form_source=0 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and uf.campus IN('".implode("','", $campusFilter)."')  and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

							

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in ( select cf.id from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
					 where cf.form_source=0 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."')  and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

							

					}

					$Query_Return = $this->Create_query($Query);

			return $Query_Return;

		}


		public function Overall_Walkin_applications_part_A($date_1,$date_2,$campusFilter,$formSourceFilter){


			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in
					    (

					    select 
					 
					cf.id
					 
					from atif_career.career_form as cf where cf.form_source=0

					 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

				

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in
					    (

					    select 
					 
					cf.id
					 
					from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0
					and uf.campus IN('".implode("','", $campusFilter)."')
					 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						
						";

							


						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
				$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in
					    (

					    select 
					 
					cf.id
					 
					from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0
					and cf.form_source IN('".implode("','", $formSourceFilter)."')
					 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

						
					}




					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in
					    (

					    select 
					 
					cf.id
					 
					from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0
					 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
					 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id

						";


						
					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in
					    (

					    select 
					 
					cf.id
					 
					from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0
					 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and uf.campus IN('".implode("','", $campusFilter)."') 
					 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

							

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in
					    (

					    select 
					 
					cf.id
					 
					from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0
					 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') 
					 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

						
					}

					$Query_Return = $this->Create_query($Query);

				return $Query_Return;

		}


		public function Overall_moved_to($date_1,$date_2,$campusFilter,$formSourceFilter){

			

			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

						select 

						cf.id

						from atif_career.career_form as cf where cf.form_source=0
						  and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' ) group by af.id
						";

				



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

						select 

						cf.id

						from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0 
						 and uf.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id";

							

						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
				$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						select 

						cf.id

						from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0 
						 and cf.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id";

							
						
					}



				

					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in
					    (

					    select 
					 
					cf.id
					 
					from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0
					 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
					 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id

						";

							}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in
					    (

					    select 
					 
					cf.id
					 
					from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0
					 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and uf.campus IN('".implode("','", $campusFilter)."') 
					 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

							

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in
					    (

					    select 
					 
					cf.id
					 
					from atif_career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id where cf.form_source=0
					 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  cf uf.form_source IN('".implode("','", $formSourceFilter)."') 
					 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' )group by af.id
						";

						
					}

					$Query_Return = $this->Create_query($Query);

					return $Query_Return;

		}


		public function Applicants_moved_to($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

			

			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					select  d.form_id  
					from( 
					select  (l.form_id) as form_id  from atif_career.log_career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.form_id
					union
					select  (l.id) as form_id  from atif_career.career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.id

					union
					select 
					( cf.id ) as form_id
					from atif_career.career_form as cf where cf.form_source=0 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

					) as d


					  )group by af.id
						";

					

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					select  d.form_id  
					from( 
					select  (l.form_id) as form_id  from atif_career.log_career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.form_id
					union
					select  (l.id) as form_id  from atif_career.career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.id

					union
					select 
					( cf.id ) as form_id
					from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id
					where cf.form_source=0
					 and cfd.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

					) as d


					  )group by af.id";

							

						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
				$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					select  d.form_id  
					from( 
					select  (l.form_id) as form_id  from atif_career.log_career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.form_id
					union
					select  (l.id) as form_id  from atif_career.career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.id

					union
					select 
					( cf.id ) as form_id
					from atif_career.career_form as cf where cf.form_source=0 and cf.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

					) as d


					  )group by af.id";

							
						
					}



				

					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					select  d.form_id  
					from( 
					select  (l.form_id) as form_id  from atif_career.log_career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.form_id
					union
					select  (l.id) as form_id  from atif_career.career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.id

					union
					select 
					( cf.id ) as form_id
					from atif_career.career_form as cf where cf.form_source=0 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

					) as d


					  )group by af.id";

							}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					select  d.form_id  
					from( 
					select  (l.form_id) as form_id  from atif_career.log_career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.form_id
					union
					select  (l.id) as form_id  from atif_career.career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.id

					union
					select 
					( cf.id ) as form_id
					from atif_career.career_form as cf where cf.form_source=0 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

					) as d


					  )group by af.id";

							

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  


					af.id in(

					select  d.form_id  
					from( 
					select  (l.form_id) as form_id  from atif_career.log_career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.form_id
					union
					select  (l.id) as form_id  from atif_career.career_form as l 
					where l.status_id=11 and l.stage_id =4 group by l.id

					union
					select 
					( cf.id ) as form_id
					from atif_career.career_form as cf where cf.form_source=0 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."')  and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

					) as d


					  )group by af.id";


						
					}
						
				

					$Query_Return = $this->Create_query($Query);

				return $Query_Return;

		}

		

		
		public function Overall_applicants_moved_to_Regret($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

			

			$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
  
				    select cf.id 
				    from atif_Career.career_form as cf
				    left join ( 

				     select * from atif_career.log_career_form as cf
				     where cf.id in(   
				    select max(cff.id)
				    from atif_career.log_career_form as cff  
				    where cff.status_id <> 10 and cff.status_id <> 12
				    group by cff.form_id 
				    )
				    ) as dd on dd.form_id = cf.id
				    where (cf.status_id=12 or cf.status_id=10 ) 
				    and (dd.status_id=1 or dd.status_id=11 )
				    and cf.stage_id != 1 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

				  )group by af.id
						";




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
  
				    select cf.id 
				    from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id
				    left join ( 

				     select * from atif_career.log_career_form as cf
				     where cf.id in(   
				    select max(cff.id)
				    from atif_career.log_career_form as cff  
				    where cff.status_id <> 10 and cff.status_id <> 12
				    group by cff.form_id 
				    )
				    ) as dd on dd.form_id = cf.id
				    where (cf.status_id=12 or cf.status_id=10 ) 
				    and (dd.status_id=1 or dd.status_id=11 )
				    and cf.stage_id != 1 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
				    and cfd.campus IN('".implode("','", $campusFilter)."') 

				  )group by af.id
						";


							


						
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
									
					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
  
				    select cf.id 
				    from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id
				    left join ( 

				     select * from atif_career.log_career_form as cf
				     where cf.id in(   
				    select max(cff.id)
				    from atif_career.log_career_form as cff  
				    where cff.status_id <> 10 and cff.status_id <> 12
				    group by cff.form_id 
				    )
				    ) as dd on dd.form_id = cf.id
				    where (cf.status_id=12 or cf.status_id=10 ) 
				    and (dd.status_id=1 or dd.status_id=11 )
				    and cf.stage_id != 1 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
				    and cf.form_source IN('".implode("','", $formSourceFilter)."') 

				  )group by af.id
						";

							
						
					}





					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
  
				    select cf.id 
				    from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id
				    left join ( 

				     select * from atif_career.log_career_form as cf
				     where cf.id in(   
				    select max(cff.id)
				    from atif_career.log_career_form as cff  
				    where cff.status_id <> 10 and cff.status_id <> 12
				    group by cff.form_id 
				    )
				    ) as dd on dd.form_id = cf.id
				    where (cf.status_id=12 or cf.status_id=10 ) 
				    and (dd.status_id=1 or dd.status_id=11 )
				    and cf.stage_id != 1 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
				    and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'

				  )group by af.id
						";


					

							
						
					}


					



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
  
				    select cf.id 
				    from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id
				    left join ( 

				     select * from atif_career.log_career_form as cf
				     where cf.id in(   
				    select max(cff.id)
				    from atif_career.log_career_form as cff  
				    where cff.status_id <> 10 and cff.status_id <> 12
				    group by cff.form_id 
				    )
				    ) as dd on dd.form_id = cf.id
				    where (cf.status_id=12 or cf.status_id=10 ) 
				    and (dd.status_id=1 or dd.status_id=11 )
				    and cf.stage_id != 1 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
				    and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."')

				  )group by af.id
						";

						

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
  
				    select cf.id 
				    from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id
				    left join ( 

				     select * from atif_career.log_career_form as cf
				     where cf.id in(   
				    select max(cff.id)
				    from atif_career.log_career_form as cff  
				    where cff.status_id <> 10 and cff.status_id <> 12
				    group by cff.form_id 
				    )
				    ) as dd on dd.form_id = cf.id
				    where (cf.status_id=12 or cf.status_id=10 ) 
				    and (dd.status_id=1 or dd.status_id=11 )
				    and cf.stage_id != 1 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
				    and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."')

				  )group by af.id
						";

							

						

					}
					$Query_Return = $this->Create_query($Query);



				return $Query_Return;

		}



			public function Applicant_awaiting_for_full_form($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

						if( $date_1 =='null' || $date_1 =="" && $date_2 =='null' || $date_2 =="" && $departmentFilter =='null' || $departmentFilter =="" && $subjectFilter =='null' || $subjectFilter =="" && $designationFilter =='null' || $designationFilter =="" && $campusFilter =='null' || $campusFilter =="" && $formSourceFilter =='null' || $formSourceFilter =="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";


							$Query_Return = $this->Create_query($Query);
			
							}

			if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8 and u.depart_id IN('".implode("','", $departmentFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";


						
						$Query_Return = $this->Create_query($Query);	
					}

				if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";


									
						$Query_Return = $this->Create_query($Query);
						
					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8 and u.level_id IN('".implode("','", $designationFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";



							$Query_Return = $this->Create_query($Query);
						
					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8 and u.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";



						$Query_Return = $this->Create_query($Query);		
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and cf.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";



									
						$Query_Return = $this->Create_query($Query);
						
					}



					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";





							$Query_Return = $this->Create_query($Query);
					
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";

						$Query_Return = $this->Create_query($Query);	

					}

					if($departmentFilter !='null' && $departmentFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";

						$Query_Return = $this->Create_query($Query);
					
					}

					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";
						$Query_Return = $this->Create_query($Query);
					}


					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";

						
						$Query_Return = $this->Create_query($Query);		
					}


					if( $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8   and u.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";

							$Query_Return = $this->Create_query($Query);
						
					}


					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";

						$Query_Return = $this->Create_query($Query);
						
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";

						$Query_Return = $this->Create_query($Query);				
						
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";


						$Query_Return = $this->Create_query($Query);
					
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $designationFilter !='null' && $designationFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.level_id IN('".implode("','", $designationFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";


				$Query_Return = $this->Create_query($Query);				
				
					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){



						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";

						$Query_Return = $this->Create_query($Query);
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";
						
						$Query_Return = $this->Create_query($Query);
						

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";
					
						$Query_Return = $this->Create_query($Query);
					}

					

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";
					
						$Query_Return = $this->Create_query($Query);

					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

					      select 
					      cf.id
					      from atif_career.career_form as cf 
					      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
					      where cf.status_id=2
					       and cf.stage_id=8  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
					      And ( u.date is null or u.date >= curdate() )
					      )group by af.id
						";

					$Query_Return = $this->Create_query($Query);

					}





			
			return $Query_Return;

			}







			public function Overall_applicants_present($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

						if( $date_1 =='null' || $date_1 =="" && $date_2 =='null' || $date_2 =="" && $departmentFilter =='null' || $departmentFilter =="" && $subjectFilter =='null' || $subjectFilter =="" && $designationFilter =='null' || $designationFilter =="" && $campusFilter =='null' || $campusFilter =="" && $formSourceFilter =='null' || $formSourceFilter =="" ){




						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 

						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";




												

							$Query_Return = $this->Create_query($Query);
			
							}

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.depart_id IN('".implode("','", $departmentFilter)."')
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";

						
						$Query_Return = $this->Create_query($Query);	
					}

				if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.tag IN('".implode("','", $subjectFilter)."')
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";


									
						$Query_Return = $this->Create_query($Query);
						
					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.level_id IN('".implode("','", $designationFilter)."')
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";



							$Query_Return = $this->Create_query($Query);
						
					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.campus IN('".implode("','", $campusFilter)."')
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";



						$Query_Return = $this->Create_query($Query);		
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.form_source IN('".implode("','", $formSourceFilter)."')
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";


									
						$Query_Return = $this->Create_query($Query);
						
					}



					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."')
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";




							$Query_Return = $this->Create_query($Query);
					
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.campus IN('".implode("','", $campusFilter)."')
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";


						$Query_Return = $this->Create_query($Query);	

					}

					if($departmentFilter !='null' && $departmentFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.level_id IN('".implode("','", $designationFilter)."')
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";
						
						$Query_Return = $this->Create_query($Query);
					
					}

					if($subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.tag IN('".implode("','", $subjectFilter)."') and cfd.level_id IN('".implode("','", $designationFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";
						
						$Query_Return = $this->Create_query($Query);
					}


					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.level_id IN('".implode("','", $designationFilter)."') and cfd.campus IN('".implode("','", $campusFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";

						
						$Query_Return = $this->Create_query($Query);		
					}


					if( $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 

						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						     left join atif_career.career_form as cf on cfd.form_id = cf.id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";

							$Query_Return = $this->Create_query($Query);
						
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."')
						   	and cfd.level_id IN('".implode("','", $designationFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";




							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" &&  $campusFilter !='null' && $campusFilter){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."')
						   	and cfd.level_id IN('".implode("','", $designationFilter)."') and cfd.campus IN('".implode("','", $campusFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";




							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter && $formSourceFilter !='null' && $formSourceFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    left join atif_career.career_form as cf on cfd.form_id = cf.id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						   	and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."')
						   	and cfd.level_id IN('".implode("','", $designationFilter)."') and cfd.campus IN('".implode("','", $campusFilter)."') 
						   	and cf.form_source IN('".implode("','", $formSourceFilter)."')
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";



							$Query_Return = $this->Create_query($Query);
					
					}




					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";

						$Query_Return = $this->Create_query($Query);
						
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.tag IN('".implode("','", $subjectFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";

						$Query_Return = $this->Create_query($Query);				
						
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";

						$Query_Return = $this->Create_query($Query);
					
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $designationFilter !='null' && $designationFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.level_id IN('".implode("','", $designationFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";
						


				$Query_Return = $this->Create_query($Query);				
				
					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";
						
					

						$Query_Return = $this->Create_query($Query);
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form as cf on l.form_id = cf.id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";
						
						
						$Query_Return = $this->Create_query($Query);
						

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cf on l.form_id = cf.form_id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.depart_id IN('".implode("','", $departmentFilter)."') and cf.tag IN('".implode("','", $subjectFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";
						
					
						$Query_Return = $this->Create_query($Query);
					}

					

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."')  and cfd.level_id IN('".implode("','", $designationFilter)."') and cfd.campus IN('".implode("','", $campusFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";
					
						$Query_Return = $this->Create_query($Query);

					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

						    select 
						    ( f.form_id ) as Total_form
						    from (
						    select  (l.form_id) as form_id from atif_career.log_career_form as l 
						    left join atif_career.career_form as cf on l.form_id = cf.id
						    left join atif_career.career_form_data as cfd on cfd.form_id = l.id
						    where l.status_id > 1 
						    and l.status_id != 10 
						    and l.status_id != 11 
						    and l.status_id != 12 
						    and l.status_id != 13
						    and l.stage_id != 8
						    and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."')  and cfd.level_id IN('".implode("','", $designationFilter)."') and cfd.campus IN('".implode("','", $campusFilter)."') 
						    and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
						    group by l.form_id  ) as f

						  ) group by af.id
						";
						

					$Query_Return = $this->Create_query($Query);

					}





			
			return $Query_Return;

			}

		public function Applicants_currently_initial($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

			if( $date_1 =='null' || $date_1 =="" && $date_2 =='null' || $date_2 =="" && $departmentFilter =='null' || $departmentFilter =="" && $subjectFilter =='null' || $subjectFilter =="" && $designationFilter =='null' || $designationFilter =="" && $campusFilter =='null' || $campusFilter =="" && $formSourceFilter =='null' || $formSourceFilter =="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							

							$Query_Return = $this->Create_query($Query);
			
							}

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								    and u.depart_id IN('".implode("','", $departmentFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";

						
						$Query_Return = $this->Create_query($Query);	
					}

				if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								    and u.tag IN('".implode("','", $subjectFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
						

									
						$Query_Return = $this->Create_query($Query);
						
					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and u.level_id IN('".implode("','", $designationFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";



							$Query_Return = $this->Create_query($Query);
						
					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and u.campus IN('".implode("','", $campusFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							


						$Query_Return = $this->Create_query($Query);		
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
						

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and cf.form_source IN('".implode("','", $formSourceFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							


									
						$Query_Return = $this->Create_query($Query);
						
					}



					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and u.depart_id IN('".implode("','", $departmentFilter)."')
								     and u.tag IN('".implode("','", $subjectFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							


							$Query_Return = $this->Create_query($Query);
					
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and u.depart_id IN('".implode("','", $departmentFilter)."')   and u.campus IN('".implode("','", $campusFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							

						$Query_Return = $this->Create_query($Query);	

					}

					if($departmentFilter !='null' && $departmentFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

							
							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								    and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.level_id IN('".implode("','", $designationFilter)."') 
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							
						$Query_Return = $this->Create_query($Query);
					
					}

					if( $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							
						
						$Query_Return = $this->Create_query($Query);
					}


					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								    and u.level_id IN('".implode("','", $designationFilter)."')
								    and u.campus IN('".implode("','", $campusFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
								

						
						$Query_Return = $this->Create_query($Query);		
					}


					if( $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and u.campus IN('".implode("','", $campusFilter)."')
								      and cf.form_source IN('".implode("','", $formSourceFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							

							$Query_Return = $this->Create_query($Query);
						
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

						
							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and u.depart_id IN('".implode("','", $departmentFilter)."')
								     and u.tag IN('".implode("','", $subjectFilter)."')
								     and u.level_id IN('".implode("','", $designationFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							


							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" &&  $campusFilter !='null' && $campusFilter){

						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and u.depart_id IN('".implode("','", $departmentFilter)."')
								     and u.tag IN('".implode("','", $subjectFilter)."')
								     and u.level_id IN('".implode("','", $designationFilter)."')
								     and u.campus IN('".implode("','", $campusFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
							


							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter && $formSourceFilter !='null' && $formSourceFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and u.depart_id IN('".implode("','", $departmentFilter)."')
								     and u.tag IN('".implode("','", $subjectFilter)."')
								     and u.level_id IN('".implode("','", $designationFilter)."')
								     and u.campus IN('".implode("','", $campusFilter)."')
								      and u.form_source IN('".implode("','", $formSourceFilter)."')

								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";



							$Query_Return = $this->Create_query($Query);
					
					}




					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								    and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
						

						$Query_Return = $this->Create_query($Query);
						
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $subjectFilter !='null' && $subjectFilter !="" ){

					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								     and u.depart_id IN('".implode("','", $departmentFilter)."')
								     
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";

						$Query_Return = $this->Create_query($Query);				
						
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								     and u.depart_id IN('".implode("','", $departmentFilter)."')
								     
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";

						$Query_Return = $this->Create_query($Query);
					
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $designationFilter !='null' && $designationFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								     and u.level_id IN('".implode("','", $designationFilter)."')
								     
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
						


						$Query_Return = $this->Create_query($Query);				
				
					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								     and u.campus IN('".implode("','", $campusFilter)."')
								     
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
					

						$Query_Return = $this->Create_query($Query);
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								     and cf.form_source IN('".implode("','", $formSourceFilter)."')
								     
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
						
						$Query_Return = $this->Create_query($Query);
						

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								     and u.depart_id IN('".implode("','", $departmentFilter)."')
								     and u.tag IN('".implode("','", $subjectFilter)."')
								     
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";	
					
						$Query_Return = $this->Create_query($Query);
					}

					

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								     and u.depart_id IN('".implode("','", $departmentFilter)."')
								     and u.tag IN('".implode("','", $subjectFilter)."')
								     and u.level_id IN('".implode("','", $designationFilter)."')
								     and u.campus IN('".implode("','", $campusFilter)."')
								     
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";
					
						$Query_Return = $this->Create_query($Query);

					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(
								    select 

								    ( cf.id ) as Total_form
								    from atif_career.career_form as cf 
								    left join atif_career.career_form_data as u on u.form_id=cf.id 
								    and u.status_id= 1
								    where cf.status_id=2 
								    and cf.stage_id=4 
								     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								     and u.depart_id IN('".implode("','", $departmentFilter)."')
								     and u.tag IN('".implode("','", $subjectFilter)."')
								     and u.level_id IN('".implode("','", $designationFilter)."')
								     and u.campus IN('".implode("','", $campusFilter)."')
								     and cf.form_source IN('".implode("','", $formSourceFilter)."')
								    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								    and ( u.date is null or u.date >= curdate() )

								  ) group by af.id
						";

					$Query_Return = $this->Create_query($Query);

					}

					return $Query_Return;

					}




			public function Overall_applicant_moved_to_regret($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){



				if( $date_1 =='null' || $date_1 =="" && $date_2 =='null' || $date_2 =="" && $departmentFilter =='null' || $departmentFilter =="" && $subjectFilter =='null' || $subjectFilter =="" && $designationFilter =='null' || $designationFilter =="" && $campusFilter =='null' || $campusFilter =="" && $formSourceFilter =='null' || $formSourceFilter =="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";

							$Query_Return = $this->Create_query($Query);
			
							}

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

													$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";

						
						$Query_Return = $this->Create_query($Query);	
					}

				if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.tag IN('".implode("','", $subjectFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";

									
						$Query_Return = $this->Create_query($Query);
						
					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.level_id IN('".implode("','", $designationFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";



							$Query_Return = $this->Create_query($Query);
						
					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.campus IN('".implode("','", $campusFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";	


						$Query_Return = $this->Create_query($Query);		
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and f.form_source IN('".implode("','", $formSourceFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";



									
						$Query_Return = $this->Create_query($Query);
						
					}



					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.tag IN('".implode("','", $subjectFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";



							$Query_Return = $this->Create_query($Query);
					
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.campus IN('".implode("','", $campusFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";

						$Query_Return = $this->Create_query($Query);	

					}

					if($departmentFilter !='null' && $departmentFilter !="" && $designationFilter !='null' && $designationFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.campus IN('".implode("','", $campusFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
						
						$Query_Return = $this->Create_query($Query);
					
					}

					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.campus IN('".implode("','", $campusFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
						
						$Query_Return = $this->Create_query($Query);
					}


					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.campus IN('".implode("','", $campusFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";	

						
						$Query_Return = $this->Create_query($Query);		
					}


					if( $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.campus IN('".implode("','", $campusFilter)."') 
							      and f.form_source IN('".implode("','", $formSourceFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
						

							$Query_Return = $this->Create_query($Query);
						
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.tag IN('".implode("','", $subjectFilter)."') 
							      and cfd.level_id IN('".implode("','", $designationFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";	



							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" &&  $campusFilter !='null' && $campusFilter){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.tag IN('".implode("','", $subjectFilter)."')
							      and cfd.level_id IN('".implode("','", $designationFilter)."')  
							       and cfd.campus IN('".implode("','", $campusFilter)."')  
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";



							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter && $formSourceFilter !='null' && $formSourceFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.tag IN('".implode("','", $subjectFilter)."')
							      and cfd.level_id IN('".implode("','", $designationFilter)."')  
							       and cfd.campus IN('".implode("','", $campusFilter)."')  
							       and f.form_source IN('".implode("','", $formSourceFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";



							$Query_Return = $this->Create_query($Query);
					
					}




					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";

						

						$Query_Return = $this->Create_query($Query);
						
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							     and cfd.tag IN('".implode("','", $subjectFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
					

						$Query_Return = $this->Create_query($Query);				
						
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
					
						

						$Query_Return = $this->Create_query($Query);
					
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $designationFilter !='null' && $designationFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							     and cfd.level_id IN('".implode("','", $designationFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
						


				$Query_Return = $this->Create_query($Query);				
				
					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							     and cfd.campus IN('".implode("','", $campusFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
						
					

						$Query_Return = $this->Create_query($Query);
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							     and f.form_source IN('".implode("','", $formSourceFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
						
						$Query_Return = $this->Create_query($Query);
						

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.tag IN('".implode("','", $subjectFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
						
					
						$Query_Return = $this->Create_query($Query);
					}

					

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.tag IN('".implode("','", $subjectFilter)."') 
							      and cfd.level_id IN('".implode("','", $designationFilter)."') 
							      and cfd.campus IN('".implode("','", $campusFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
						
					
						$Query_Return = $this->Create_query($Query);

					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

							    select 
							     
							    f.id

							    from atif_career.career_form as f
							    left join atif_career.career_form_data as cfd on cfd.form_id = f.id
							    left join ( 
							    select * from atif_career.log_career_form as lf where lf.id in(
							    select max(l.id) as id
							    from atif_career.log_career_form as l  group by l.form_id )
							    ) as d
							    on d.form_id = f.id
							    where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
							     and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							     and cfd.depart_id IN('".implode("','", $departmentFilter)."') 
							      and cfd.tag IN('".implode("','", $subjectFilter)."') 
							      and cfd.level_id IN('".implode("','", $designationFilter)."') 
							      and cfd.campus IN('".implode("','", $campusFilter)."') 
							       and f.form_source IN('".implode("','", $formSourceFilter)."') 
							     and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'
							  )group by af.id
						";
						
						

					$Query_Return = $this->Create_query($Query);

					}




				return $Query_Return;

			}
			
			
			function Overall_applicants_moved_to_Followup($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

				if( $date_1 =='null' || $date_1 =="" && $date_2 =='null' || $date_2 =="" && $departmentFilter =='null' || $departmentFilter =="" && $subjectFilter =='null' || $subjectFilter =="" && $designationFilter =='null' || $designationFilter =="" && $campusFilter =='null' || $campusFilter =="" && $formSourceFilter =='null' || $formSourceFilter =="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						

							$Query_Return = $this->Create_query($Query);
			
							}

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2 
							  and  u.depart_id IN('".implode("','", $departmentFilter)."')
							  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						

						
						$Query_Return = $this->Create_query($Query);	
					}

				if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id
							   and  u.tag IN('".implode("','", $subjectFilter)."')
							   and u.status_id=1
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						
						

									
						$Query_Return = $this->Create_query($Query);
						
					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2
							    and  u.level_id IN('".implode("','", $designationFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						



							$Query_Return = $this->Create_query($Query);
						
					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  and  u.campus IN('".implode("','", $campusFilter)."')
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						
							


						$Query_Return = $this->Create_query($Query);		
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2  and  cf.form_source IN('".implode("','", $formSourceFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						


									
						$Query_Return = $this->Create_query($Query);
						
					}



					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2 and  u.depart_id IN('".implode("','", $departmentFilter)."')
							   and  u.tag IN('".implode("','", $subjectFilter)."')
							  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						



							$Query_Return = $this->Create_query($Query);
					
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2
							  and  u.depart_id IN('".implode("','", $departmentFilter)."')
							   and  u.campus IN('".implode("','", $campusFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						
						

						$Query_Return = $this->Create_query($Query);	

					}

					if($departmentFilter !='null' && $departmentFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2
							  and  u.depart_id IN('".implode("','", $departmentFilter)."')
							   and  u.level_id IN('".implode("','", $designationFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						

						$Query_Return = $this->Create_query($Query);
					
					}

					if($subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2

							  and  u.tag IN('".implode("','", $subjectFilter)."')
							   and  u.level_id IN('".implode("','", $designationFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						

						$Query_Return = $this->Create_query($Query);
					}


					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2 
							  and  u.level_id IN('".implode("','", $designationFilter)."')
							   and  u.campus IN('".implode("','", $campusFilter)."')
							  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						

						
						$Query_Return = $this->Create_query($Query);		
					}


					if( $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2

							  and  u.campus IN('".implode("','", $campusFilter)."')
							   and  u.form_source IN('".implode("','", $formSourceFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						

							$Query_Return = $this->Create_query($Query);
						
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2 

							  and  u.depart_id IN('".implode("','", $departmentFilter)."')
							   and  u.tag IN('".implode("','", $subjectFilter)."')
							   and  u.level_id IN('".implode("','", $designationFilter)."')
							  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						



							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" &&  $campusFilter !='null' && $campusFilter){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2 

							    and  u.depart_id IN('".implode("','", $departmentFilter)."')
							   and  u.tag IN('".implode("','", $subjectFilter)."')
							   and  u.level_id IN('".implode("','", $designationFilter)."')
							    and  u.campus IN('".implode("','", $campusFilter)."')
							  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						



							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter && $formSourceFilter !='null' && $formSourceFilter !=""){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2 

							  and  u.depart_id IN('".implode("','", $departmentFilter)."')
							   and  u.tag IN('".implode("','", $subjectFilter)."')
							   and  u.level_id IN('".implode("','", $designationFilter)."')
							    and  u.campus IN('".implode("','", $campusFilter)."')
							    and  cf.form_source IN('".implode("','", $formSourceFilter)."')
							  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						



							$Query_Return = $this->Create_query($Query);
					
					}




					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
							  where cf.status_id=2 
							  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
							  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						

						$Query_Return = $this->Create_query($Query);
						
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1

							  where cf.status_id=2
							  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.tag IN('".implode("','", $subjectFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						

						$Query_Return = $this->Create_query($Query);				
						
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1

							  where cf.status_id=2
							  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						

						$Query_Return = $this->Create_query($Query);
					
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $designationFilter !='null' && $designationFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1

							  where cf.status_id=2
							  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.level_id IN('".implode("','", $designationFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						


				$Query_Return = $this->Create_query($Query);				
				
					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1

							  where cf.status_id=2
							  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.campus IN('".implode("','", $campusFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						
					

						$Query_Return = $this->Create_query($Query);
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1

							  where cf.status_id=2
							  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and cf.form_source IN('".implode("','", $formSourceFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						
						
						$Query_Return = $this->Create_query($Query);
						

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1

							  where cf.status_id=2
							  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						
					
						$Query_Return = $this->Create_query($Query);
					}

					

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1

							  where cf.status_id=2
							  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						
					
						$Query_Return = $this->Create_query($Query);

					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(

							  select 
							  (dd.Total_form) from(
							  select 
							   ( cf.form_id ) as Total_form
							  from atif_Career.log_career_form as cf 
							  where cf.status_id=2 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
							  and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
							  union
							  select
							  ( cf.id ) as Total_form
							  from atif_Career.career_form as cf 
							  left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1

							  where cf.status_id=2
							  and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."')
							   and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() )
							  ) as dd

							  )group by af.id
						";
						
						

					$Query_Return = $this->Create_query($Query);

					}



				return $Query_Return;

			}



			public function Applicants_currently_in($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){



				if( $date_1 =='null' || $date_1 =="" && $date_2 =='null' || $date_2 =="" && $departmentFilter =='null' || $departmentFilter =="" && $subjectFilter =='null' || $subjectFilter =="" && $designationFilter =='null' || $designationFilter =="" && $campusFilter =='null' || $campusFilter =="" && $formSourceFilter =='null' || $formSourceFilter =="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";
							

							$Query_Return = $this->Create_query($Query);
			
							}

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.depart_id IN('".implode("','", $departmentFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";

						
						$Query_Return = $this->Create_query($Query);	
					}

				if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.tag IN('".implode("','", $subjectFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";


									
						$Query_Return = $this->Create_query($Query);
						
					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

					
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.level_id IN('".implode("','", $designationFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";



							$Query_Return = $this->Create_query($Query);
						
					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

								$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.campus IN('".implode("','", $campusFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";




						$Query_Return = $this->Create_query($Query);		
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and cf.form_source IN('".implode("','", $formSourceFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";


									
						$Query_Return = $this->Create_query($Query);
						
					}



					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";




							$Query_Return = $this->Create_query($Query);
					
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";

						

						$Query_Return = $this->Create_query($Query);	

					}

					if($departmentFilter !='null' && $departmentFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.depart_id IN('".implode("','", $departmentFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";
						
						$Query_Return = $this->Create_query($Query);
					
					}

					if( $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";
						
						$Query_Return = $this->Create_query($Query);
					}


					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";
						

						
						$Query_Return = $this->Create_query($Query);		
					}


					if( $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";

							$Query_Return = $this->Create_query($Query);
						
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.depart_id IN('".implode("','", $departmentFilter)."') 
								and u.tag IN('".implode("','", $subjectFilter)."')
								and u.level_id IN('".implode("','", $designationFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";



							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" &&  $campusFilter !='null' && $campusFilter){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.depart_id IN('".implode("','", $departmentFilter)."') 
								and u.tag IN('".implode("','", $subjectFilter)."')
								and u.level_id IN('".implode("','", $designationFilter)."')
								and u.campus IN('".implode("','", $campusFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";



							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter && $formSourceFilter !='null' && $formSourceFilter !=""){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and u.depart_id IN('".implode("','", $departmentFilter)."') 
								and u.tag IN('".implode("','", $subjectFilter)."')
								and u.level_id IN('".implode("','", $designationFilter)."')
								and u.campus IN('".implode("','", $campusFilter)."')
								and cf.form_source IN('".implode("','", $formSourceFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";




							$Query_Return = $this->Create_query($Query);
					
					}




					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";

						

						$Query_Return = $this->Create_query($Query);
						
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								and u.tag IN('".implode("','", $subjectFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";

						$Query_Return = $this->Create_query($Query);				
						
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								and u.depart_id IN('".implode("','", $departmentFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";

						$Query_Return = $this->Create_query($Query);
					
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $designationFilter !='null' && $designationFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								and u.level_id IN('".implode("','", $designationFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";
						


				$Query_Return = $this->Create_query($Query);				
				
					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								and u.campus IN('".implode("','", $campusFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";

					

						$Query_Return = $this->Create_query($Query);
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								and u.form_source IN('".implode("','", $formSourceFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";
						
						
						$Query_Return = $this->Create_query($Query);
						

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								and u.depart_id IN('".implode("','", $departmentFilter)."')
								 and u.tag IN('".implode("','", $subjectFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";
					
						$Query_Return = $this->Create_query($Query);
					}

					

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								and u.depart_id IN('".implode("','", $departmentFilter)."')
								 and u.tag IN('".implode("','", $subjectFilter)."')
								 and u.level_id IN('".implode("','", $designationFilter)."')
								  and u.campus IN('".implode("','", $campusFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";
					
						$Query_Return = $this->Create_query($Query);

					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where af.id in(

								select 

								cf.id

								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u 

								on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2
								and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								and u.depart_id IN('".implode("','", $departmentFilter)."')
								 and u.tag IN('".implode("','", $subjectFilter)."')
								 and u.level_id IN('".implode("','", $designationFilter)."')
								  and u.campus IN('".implode("','", $campusFilter)."')  and cf.form_source IN('".implode("','", $formSourceFilter)."')
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

								  ) group by af.id
						";
						

					$Query_Return = $this->Create_query($Query);

					}


			return $Query_Return;
				
			}
		
	public function Overall_applicants_given($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

		if( $date_1 =='null' || $date_1 =="" && $date_2 =='null' || $date_2 =="" && $departmentFilter =='null' || $departmentFilter =="" && $subjectFilter =='null' || $subjectFilter =="" && $designationFilter =='null' || $designationFilter =="" && $campusFilter =='null' || $campusFilter =="" && $formSourceFilter =='null' || $formSourceFilter =="" ){

					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    where cf.status_id=2 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id
						";		

							$Query_Return = $this->Create_query($Query);
			
							}

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						  
						    where cf.status_id=2 
						      and u.depart_id IN('".implode("','", $departmentFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

						
						$Query_Return = $this->Create_query($Query);	
					}

				if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						   
						    where cf.status_id=2 
						     and u.tag IN('".implode("','", $subjectFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

									
						$Query_Return = $this->Create_query($Query);
						
					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

					$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						    
						    where cf.status_id=2 
						    and u.level_id IN('".implode("','", $designationFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";



							$Query_Return = $this->Create_query($Query);
						
					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						    
						    where cf.status_id=2 
						    and u.campus IN('".implode("','", $campusFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";


						$Query_Return = $this->Create_query($Query);		
					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);
						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form as u on u.form_id = cf.form_id
						    
						    where cf.status_id=2
						    and u.form_source IN('".implode("','", $formSourceFilter)."')  
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";


									
						$Query_Return = $this->Create_query($Query);
						
					}



					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						   
						    where cf.status_id=2 
						     and u.depart_id IN('".implode("','", $departmentFilter)."') 
						    and u.tag IN('".implode("','", $subjectFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";



							$Query_Return = $this->Create_query($Query);
					
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						   
						    where cf.status_id=2 
						     and u.depart_id IN('".implode("','", $departmentFilter)."') 
						     and u.campus IN('".implode("','", $campusFilter)."')
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

						$Query_Return = $this->Create_query($Query);	

					}

					if($departmentFilter !='null' && $departmentFilter !="" && $designationFilter !='null' && $designationFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						    
						    where cf.status_id=2 
						    and u.depart_id IN('".implode("','", $departmentFilter)."') 
						     and u.level_id IN('".implode("','", $designationFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

						$Query_Return = $this->Create_query($Query);
					
					}

					if( $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						 
						    where cf.status_id=2 
						       and u.tag IN('".implode("','", $subjectFilter)."') 
						    and u.level_id IN('".implode("','", $designationFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";
						
						$Query_Return = $this->Create_query($Query);
					}


					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						    
						    where cf.status_id=2 
						    and u.level_id IN('".implode("','", $designationFilter)."') 
						     and u.campus IN('".implode("','", $campusFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

						
						$Query_Return = $this->Create_query($Query);		
					}


					if( $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

							$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						     left join atif_career.career_form as cs on u.form_id = cs.id
						    
						    where cf.status_id=2 
						    and u.campus IN('".implode("','", $campusFilter)."') 
						     and cs.form_source IN('".implode("','", $formSourceFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";
						

							$Query_Return = $this->Create_query($Query);
						
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

						
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						    
						    where cf.status_id=2 
						    and u.depart_id IN('".implode("','", $departmentFilter)."') 
						     and u.tag IN('".implode("','", $subjectFilter)."') 
						      and u.level_id IN('".implode("','", $designationFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";


							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" &&  $campusFilter !='null' && $campusFilter){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						    
						    where cf.status_id=2 
						    and u.depart_id IN('".implode("','", $departmentFilter)."') 
						     and u.tag IN('".implode("','", $subjectFilter)."') 
						      and u.level_id IN('".implode("','", $designationFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";



							$Query_Return = $this->Create_query($Query);
					
					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter && $formSourceFilter !='null' && $formSourceFilter !=""){

					echo	$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  

						    left join atif_career.career_form_data as us on us.form_id = cf.form_id
						    left join atif_career.career_form as cs on cf.form_id = cs.id
						    
						    where cf.status_id=2  and (cf.stage_id=13)  
						    and us.depart_id IN('".implode("','", $departmentFilter)."') 
						     and us.tag IN('".implode("','", $subjectFilter)."') 
						      and us.level_id IN('".implode("','", $designationFilter)."') 
						      and us.campus IN('".implode("','", $campusFilter)."') 
						      and cs.form_source IN('".implode("','", $formSourceFilter)."') 
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";



							$Query_Return = $this->Create_query($Query);
					
					}




					if( $date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
							
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						   
						    where cf.status_id=2
						    and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";
						

						$Query_Return = $this->Create_query($Query);
						
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						    
						    where cf.status_id=2 
						    and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						    and u.tag IN('".implode("','", $subjectFilter)."')
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

						$Query_Return = $this->Create_query($Query);				
						
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						      
						     
						    where cf.status_id=2 
						    and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						    and u.depart_id IN('".implode("','", $departmentFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

						$Query_Return = $this->Create_query($Query);
					
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $designationFilter !='null' && $designationFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						      
						    where cf.status_id=2 
						    and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						      and u.level_id IN('".implode("','", $designationFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";


				$Query_Return = $this->Create_query($Query);				
				
					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						      
						    where cf.status_id=2 
						    and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						      and u.campus IN('".implode("','", $campusFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

					

						$Query_Return = $this->Create_query($Query);
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){


						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						    left join atif_career.career_form as cs on u.form_id = cs.id
						     
						    where cf.status_id=2 
						     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						      and cs.form_source IN('".implode("','", $formSourceFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

					
						
						
						$Query_Return = $this->Create_query($Query);
						

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						      
						    where cf.status_id=2 
						    and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						      and u.depart_id IN('".implode("','", $departmentFilter)."') 
						      and u.tag IN('".implode("','", $subjectFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

					
					
						$Query_Return = $this->Create_query($Query);
					}

					

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){
						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						     
						    where cf.status_id=2 
						     and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						      and u.depart_id IN('".implode("','", $departmentFilter)."') 
						       and u.tag IN('".implode("','", $subjectFilter)."') 
						        and u.level_id IN('".implode("','", $designationFilter)."') 
						         and u.campus IN('".implode("','", $campusFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

					
						
					
						$Query_Return = $this->Create_query($Query);

					}




					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){

						$Query = "select 
					af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
					af.nic, af.gender, af.position_applied, af.comments,
					af.status_id, af.stage_id,
					cs.name as status_name, cs.name_code as status_code,
					ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
					af.form_source as form_source2,
					d.p_date as part_b_date, 
					d.p_time as part_b_time,
					if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
					'' as part_b_complete,
					(case 
					when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
					when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
					when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
					else ''
					end ) as PartB,
					from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
					from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
					from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,
					if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
					d.comments_next_step,
					d.comments_applicant,
					d.comments_next_decision,
					d.comments_next_step_aloc
					from atif_career.career_form as af 
					left outer join (
					select 
					(
					case when s.date = '1970-01-01' then 
					(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.date
					end
					) as p_date,
					(
					case when s.date = '1970-01-01' then 
					(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.time
					end
					) as p_time,
					(
					case when s.date = '1970-01-01' then 
					(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
					and dd.form_id= s.form_id order by dd.id desc limit 1)
					else s.campus
					end
					) as p_campus,
					s.* from atif_career.career_form_data as s where s.id in(
					select 
					max( cf.id ) as latest
					from atif_career.career_form_data as cf 
					group by cf.form_id  
					)
					) 
					as d on d.form_id = af.id
					left join atif_career.career_status as cs on cs.id = af.status_id 
					left join atif_career.career_stage as ct on ct.id = af.stage_id 
					left join atif_career.career_form_data as cfd on cfd.form_id = af.id
					left join (
					select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
					from atif_career.log_career_form as lcf 
					order by lcf.created limit 1) as lcf on lcf.form_id = af.id
					where  af.id in(
						    select 

						    ( cf.form_id ) as Total_form
						    from atif_Career.log_career_form as cf  
						    left join atif_career.career_form_data as u on u.form_id = cf.form_id
						    left join atif_career.career_form as cs on u.form_id = cs.id
						      
						    where cf.status_id=2 
						    and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
						      and u.depart_id IN('".implode("','", $departmentFilter)."') 
						       and u.tag IN('".implode("','", $subjectFilter)."') 
						        and u.level_id IN('".implode("','", $designationFilter)."') 
						         and u.campus IN('".implode("','", $campusFilter)."') 
						         and cs.form_source IN('".implode("','", $formSourceFilter)."') 
						    and (cf.stage_id=13)  
						    and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						) group by af.id";

					
						

					$Query_Return = $this->Create_query($Query);

					}



			return $Query_Return;


	}

	public function Create_query($query){

		$career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
	
	}
	
}

