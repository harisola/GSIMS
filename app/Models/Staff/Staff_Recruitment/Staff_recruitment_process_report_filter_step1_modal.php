<?php
namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class Staff_recruitment_process_report_filter_step1_modal extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_form';
    protected $dbCon = 'mysql_Career';


	//Arif Khan Work

	/////////////////////////////////////////// Overall Walkin applications////////////////////////////////////////////

				public function Overall_Walkin_applications($date_1,$date_2,$campusFilter,$formSourceFilter)
				  {



				  	$Query="select 
								5 as Query_num,
								count(distinct cf.id ) as Overall_Walkin_applications
								from atif_career.career_form as cf left join atif_career.career_form_data as u
										  on u.form_id=cf.id 
								where cf.form_source=0 and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
				  	/////////////////////AKHAN ///////////////////////////////
				  
					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query="select 
								5 as Query_num,
								count(distinct cf.id ) as Overall_Walkin_applications
								from atif_career.career_form as cf left join atif_career.career_form_data as u
										  on u.form_id=cf.id 
								where cf.form_source=0 and u.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
								5 as Query_num,
								count(distinct cf.id ) as Overall_Walkin_applications
								from atif_career.career_form as cf left join atif_career.career_form_data as u
										  on u.form_id=cf.id 
								where cf.form_source=0 and cf.form_source IN('".implode("','", $formSourceFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									

									}	

					


					//////////////////AKHAN ///////////////////////////////


				  	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){

				  		
					 $Query = "select 
								5 as Query_num,
								count(distinct cf.id ) as Overall_Walkin_applications
								from atif_career.career_form as cf where cf.form_source=0 and   from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 




				  	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !=""){

				  		
					 $Query = "select 
								5 as Query_num,
								count(distinct cf.id ) as Overall_Walkin_applications
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as cfd on cfd.form_id = cf.id
								where cf.form_source=0 and   from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 




				  	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $formSourceFilter !='null' && $formSourceFilter !=""){

				  		
					 $Query = "select 
								5 as Query_num,
								count(distinct cf.id ) as Overall_Walkin_applications
								from atif_career.career_form as cf where cf.form_source=0 and   from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 

					

					$getStatus = DB::connection($this->dbCon)->select($Query);

					return $getStatus;


				}

				public function Overall_applicants_moved_to_Regret($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){




					$Query="select 
							10 as Query_num,
							count(distinct cf.id ) as Overall_applicants_moved_to_Regret
							from atif_Career.career_form as cf left join atif_career.career_form_data as u
							  on u.form_id=cf.id
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
							and cf.stage_id != 1 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";


					/////////////////////AKHAN ///////////////////////////////

					  if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query="select 
								10 as Query_num,
								count(distinct cf.id ) as Overall_applicants_moved_to_Regret
								from atif_Career.career_form as cf left join atif_career.career_form_data as u
								  on u.form_id=cf.id
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
								and cf.stage_id != 1 and u.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
							}	



							if( $subjectFilter !='null' && $subjectFilter !=""){
								$subjectFilter = explode(",", $subjectFilter);

								$Query="select 
								10 as Query_num,
								count(distinct cf.id ) as Overall_applicants_moved_to_Regret
								from atif_Career.career_form as cf left join atif_career.career_form_data as u
								  on u.form_id=cf.id
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
								and cf.stage_id != 1 and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
							}	



							if( $designationFilter !='null' && $designationFilter !=""){
								$designationFilter = explode(",", $designationFilter);

								$Query="select 
								10 as Query_num,
								count(distinct cf.id ) as Overall_applicants_moved_to_Regret
								from atif_Career.career_form as cf left join atif_career.career_form_data as u
								  on u.form_id=cf.id
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
								and cf.stage_id != 1 and u.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
							}	





				  if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

								$Query="select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
										from atif_Career.career_form as cf left join atif_career.career_form_data as u
										  on u.form_id=cf.id
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
										and cf.stage_id != 1 and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

					
						if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
										from atif_Career.career_form as cf left join atif_career.career_form_data as u
										  on u.form_id=cf.id
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
										and cf.stage_id != 1 and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									

									}	

					


					//////////////////AKHAN ///////////////////////////////
				


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							 $Query = "select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
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
										and cf.stage_id != 1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

							}



							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $formSourceFilter !='null' && $formSourceFilter !=""){

				  		
									 $Query = "select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
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
										and cf.stage_id != 1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
										and cf.form_source IN('".implode("','", $formSourceFilter)."') 
										 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 




						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $campusFilter !='null' && $campusFilter !=""){

				  		
									 $Query = "select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
										from atif_Career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
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
										and cf.stage_id != 1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
										and uf.campus IN('".implode("','", $campusFilter)."') 
										 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $departmentFilter !='null' && $departmentFilter !="" ){

				  		
									 $Query = "select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
										from atif_Career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
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
										and cf.stage_id != 1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
										and uf.depart_id IN('".implode("','", $departmentFilter)."') 
										 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $subjectFilter !='null' && $subjectFilter !="" ){

				  		
									 $Query = "select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
										from atif_Career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
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
										and cf.stage_id != 1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
										and uf.tag IN('".implode("','", $subjectFilter)."') 
										 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $designationFilter !='null' && $designationFilter !="" ){

				  		
									 $Query = "select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
										from atif_Career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
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
										and cf.stage_id != 1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
										and uf.level_id IN('".implode("','", $designationFilter)."') 
										 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 



						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $departmentFilter !='null' && $departmentFilter !=""  &&  $subjectFilter !='null' && $subjectFilter !=""  ){

				  		
									 $Query = "select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
										from atif_Career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
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
										and cf.stage_id != 1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
										and uf.depart_id IN('".implode("','", $departmentFilter)."') and uf.tag IN('".implode("','", $subjectFilter)."')  
										 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 



						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $departmentFilter !='null' && $departmentFilter !=""  &&  $subjectFilter !='null' && $subjectFilter !=""  && $designationFilter =='null' || $designationFilter ==""){
							$designationFilter = explode(",", $designationFilter);
				  		
									 $Query = "select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
										from atif_Career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
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
										and cf.stage_id != 1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
										and uf.depart_id IN('".implode("','", $departmentFilter)."') and uf.tag IN('".implode("','", $subjectFilter)."')  and uf.level_id IN('".implode("','", $designationFilter)."') 
										 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 



						if($departmentFilter !='null' && $departmentFilter !=""  &&  $subjectFilter !='null' && $subjectFilter !=""){
								 $Query = "select 
										10 as Query_num,
										count(distinct cf.id ) as Overall_applicants_moved_to_Regret
										from atif_Career.career_form as cf left join atif_career.career_form_data as uf on uf.form_id = cf.id
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
										and cf.stage_id != 1 
										and uf.depart_id IN('".implode("','", $departmentFilter)."') and uf.tag IN('".implode("','", $subjectFilter)."')  
										 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
						} 


							


					$getStatus = DB::connection($this->dbCon)->select($Query);

					return $getStatus;



				}



				public function Applicants_awaiting_for_Initial_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

					/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query="select 
								11 as Query_num,
								count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
								where cf.status_id=2 and u.depart_id IN('".implode("','", $departmentFilter)."') 
								and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								 and cf.stage_id=8
								And ( u.date is null or u.date >= curdate() )";
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query="select 
								11 as Query_num,
								count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
								where cf.status_id=2 and u.tag IN('".implode("','", $subjectFilter)."') 
								and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								 and cf.stage_id=8
								And ( u.date is null or u.date >= curdate() )";
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

					$Query="select 
								11 as Query_num,
								count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
								where cf.status_id=2 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')  
								and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								 and cf.stage_id=8
								And ( u.date is null or u.date >= curdate() )";
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query="select 
								11 as Query_num,
								count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
								where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."')  
								and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								 and cf.stage_id=8
								And ( u.date is null or u.date >= curdate() )";
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query="select 
								11 as Query_num,
								count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
								where cf.status_id=2 and u.campus IN('".implode("','", $campusFilter)."')  
								and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								 and cf.stage_id=8
								And ( u.date is null or u.date >= curdate() )";
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query="select 
								11 as Query_num,
								count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
								where cf.status_id=2 and u.campus IN('".implode("','", $campusFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')  
								and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								 and cf.stage_id=8
								And ( u.date is null or u.date >= curdate() )";
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query="select 
								11 as Query_num,
								count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
								where cf.status_id=2 and u.campus IN('".implode("','", $campusFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."')  
								and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								 and cf.stage_id=8
								And ( u.date is null or u.date >= curdate() )";

				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						$Query="select 
								11 as Query_num,
								count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
								where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."')  
								and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								 and cf.stage_id=8
								And ( u.date is null or u.date >= curdate() )";
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query="select 
								11 as Query_num,
								count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
								from atif_career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
								where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')  
								and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								 and cf.stage_id=8
								And ( u.date is null or u.date >= curdate() )";
									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
										11 as Query_num,
										count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
										where cf.status_id=2 and cf.form_source IN('".implode("','", $formSourceFilter)."')
										and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										 and cf.stage_id=8
										And ( u.date is null or u.date >= curdate() )";
									

									}	

					


					//////////////////AKHAN ///////////////////////////////

				

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

				$Query = "select 
						11 as Query_num,
						count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
						from atif_career.career_form as cf 
						left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
						where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
						and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
						 and cf.stage_id=8
						And ( u.date is null or u.date >= curdate() )";
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										11 as Query_num,
										count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."')
										and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										 and cf.stage_id=8
										And ( u.date is null or u.date >= curdate() )";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select 
										11 as Query_num,
										count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."')
										and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										 and cf.stage_id=8
										And ( u.date is null or u.date >= curdate() )";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){


							 $Query = "select 
										11 as Query_num,
										count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')
										and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										 and cf.stage_id=8
										And ( u.date is null or u.date >= curdate() )";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){


							 $Query = "select 
										11 as Query_num,
										count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')
										and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										 and cf.stage_id=8
										And ( u.date is null or u.date >= curdate() )";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
										11 as Query_num,
										count(distinct cf.id ) as Applicants_awaiting_for_Initial_Interview
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."')
										and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										 and cf.stage_id=8
										And ( u.date is null or u.date >= curdate() )";

							}

						$getStatus = DB::connection($this->dbCon)->select($Query);

					return $getStatus;


				}

				public function Overall_applicants_marked_Present_for_Initial_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

					/////AKHAN////////////////////////////////////////


					/////Remove Distinct form qery////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query="select 
										12 as Query_num,
										count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
										from (
										select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
										where l.status_id > 1 
										and l.status_id != 10 
										and l.status_id != 11 
										and l.status_id != 12 
										and l.status_id != 13
										and l.stage_id != 8 
										 and u.depart_id IN('".implode("','", $departmentFilter)."') 
										 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
										group by l.form_id ) as f";
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query="select 
										12 as Query_num,
										count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
										from (
										select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
										where l.status_id > 1 
										and l.status_id != 10 
										and l.status_id != 11 
										and l.status_id != 12 
										and l.status_id != 13
										and l.stage_id != 8 
										 and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
										group by l.form_id ) as f";
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query="select 
										12 as Query_num,
										count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
										from (
										select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
										where l.status_id > 1 
										and l.status_id != 10 
										and l.status_id != 11 
										and l.status_id != 12 
										and l.status_id != 13
										and l.stage_id != 8 
										and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
										group by l.form_id ) as f";
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query="select 
										12 as Query_num,
										count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
										from (
										select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
										where l.status_id > 1 
										and l.status_id != 10 
										and l.status_id != 11 
										and l.status_id != 12 
										and l.status_id != 13
										and l.stage_id != 8 
										and u.level_id IN('".implode("','", $designationFilter)."')  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
										group by l.form_id ) as f";
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query="select 
									12 as Query_num,
									count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
									from (
									select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
									where l.status_id > 1 
									and l.status_id != 10 
									and l.status_id != 11 
									and l.status_id != 12 
									and l.status_id != 13
									and l.stage_id != 8 
									and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
									group by l.form_id ) as f";
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query="select 
									12 as Query_num,
									count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
									from (
									select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
									where l.status_id > 1 
									and l.status_id != 10 
									and l.status_id != 11 
									and l.status_id != 12 
									and l.status_id != 13
									and l.stage_id != 8 
									and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
									group by l.form_id ) as f";
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query="select 
									12 as Query_num,
									count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
									from (
									select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
									where l.status_id > 1 
									and l.status_id != 10 
									and l.status_id != 11 
									and l.status_id != 12 
									and l.status_id != 13
									and l.stage_id != 8 
									and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
									group by l.form_id ) as f";

				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						$Query="select 
									12 as Query_num,
									count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
									from (
									select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
									where l.status_id > 1 
									and l.status_id != 10 
									and l.status_id != 11 
									and l.status_id != 12 
									and l.status_id != 13
									and l.stage_id != 8 
									and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
									group by l.form_id ) as f";
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query="select 
									12 as Query_num,
									count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
									from (
									select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
									where l.status_id > 1 
									and l.status_id != 10 
									and l.status_id != 11 
									and l.status_id != 12 
									and l.status_id != 13
									and l.stage_id != 8 
									and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
									group by l.form_id ) as f";
									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
									12 as Query_num,
									count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
									from (
									select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id left join atif_career.career_form as cf on u.form_id=cf.id
									where l.status_id > 1 
									and l.status_id != 10 
									and l.status_id != 11 
									and l.status_id != 12 
									and l.status_id != 13
									and l.stage_id != 8 
									and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
									group by l.form_id ) as f";
									

									}	

					


					//////////////////AKHAN ///////////////////////////////

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

					 $Query = "select 
							12 as Query_num,
							count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
							from (
							select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
							where l.status_id > 1 
							and l.status_id != 10 
							and l.status_id != 11 
							and l.status_id != 12 
							and l.status_id != 13
							and l.stage_id != 8 
							 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
							group by l.form_id ) as f  ";
				}




				if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										12 as Query_num,
										count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
										from (
										select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
										where l.status_id > 1 
										and l.status_id != 10 
										and l.status_id != 11 
										and l.status_id != 12 
										and l.status_id != 13
										and l.stage_id != 8 
										 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
										group by l.form_id ) as f";

							}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select 
									12 as Query_num,
									count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
									from (
									select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
									where l.status_id > 1 
									and l.status_id != 10 
									and l.status_id != 11 
									and l.status_id != 12 
									and l.status_id != 13
									and l.stage_id != 8 
									 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
									group by l.form_id ) as f";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){


							 $Query = "select 
									12 as Query_num,
									count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
									from (
									select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
									where l.status_id > 1 
									and l.status_id != 10 
									and l.status_id != 11 
									and l.status_id != 12 
									and l.status_id != 13
									and l.stage_id != 8 
									 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
									group by l.form_id ) as f";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							 $Query = "select 
									12 as Query_num,
									count( f.form_id ) as Overall_applicants_marked_Present_for_Initial_Interview
									from (
									select  count(l.form_id) as form_id from atif_career.log_career_form as l left join atif_career.career_form_data as u on u.form_id=l.form_id
									where l.status_id > 1 
									and l.status_id != 10 
									and l.status_id != 11 
									and l.status_id != 12 
									and l.status_id != 13
									and l.stage_id != 8 
									 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
									group by l.form_id ) as f";

							}

					$getStatus = DB::connection($this->dbCon)->select($Query);

					return $getStatus;


				}

				public function Applicants_currently_in_Initial_Interview_awaiting_for_Next_Step_decision($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

					/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

							$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and u.depart_id IN('".implode("','", $departmentFilter)."')
										and ( u.date is null or u.date >= curdate() )";
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

							$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and u.tag IN('".implode("','", $subjectFilter)."')
										and ( u.date is null or u.date >= curdate() )";
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')
										and ( u.date is null or u.date >= curdate() )";
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

							$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and u.level_id IN('".implode("','", $designationFilter)."')
										and ( u.date is null or u.date >= curdate() )";
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and u.campus IN('".implode("','", $campusFilter)."')
										and ( u.date is null or u.date >= curdate() )";
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')
										and ( u.date is null or u.date >= curdate() )";
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."')
										and ( u.date is null or u.date >= curdate() )";

				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

							$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."')
										and ( u.date is null or u.date >= curdate() )";
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')
										and ( u.date is null or u.date >= curdate() )";
									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4  and cf.form_source IN('".implode("','", $formSourceFilter)."')
										and ( u.date is null or u.date >= curdate() )";
									

									}	

					


					//////////////////AKHAN ///////////////////////////////

					
					

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							 $Query =  "select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
										and ( u.date is null or u.date >= curdate() )";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""  ){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')
										and ( u.date is null or u.date >= curdate() )";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""  ){


							 $Query = "select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."')
										and ( u.date is null or u.date >= curdate() )";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""   ){


							 $Query = "select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')
										and ( u.date is null or u.date >= curdate() )";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

								
							 $Query = "select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')
										and ( u.date is null or u.date >= curdate() )";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
										19 as Query_num,
										count(distinct cf.id ) as Applicants_currently_initial
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id 
										and u.status_id= 1
										where cf.status_id=2 
										and cf.stage_id=4 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."')
										and ( u.date is null or u.date >= curdate() )";

							}

						
					$getStatus = DB::connection($this->dbCon)->select($Query);

					return $getStatus;

				}



					public function Overall_applicant_moved_to_Regret_from_Initial_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

						/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and  u.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);
							$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and  u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and  u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

							$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and  u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and  u.campus IN('".implode("','", $campusFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and  u.campus IN('".implode("','", $campusFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

							$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and  u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and  u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and  f.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
									

									}	

					
									if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter && $formSourceFilter !='null' && $formSourceFilter !=""){

						
											$Query="select 
								30 as Query_num,
								count(distinct f.id ) as Overall_applicant_moved_to_regret
								from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 
								and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."')

								and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";


						
					
								}

					//////////////////AKHAN ///////////////////////////////

					

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							$Query = "select 
										30 as Query_num,
										count(distinct f.id ) as Overall_applicant_moved_to_regret
										from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										30 as Query_num,
										count(distinct f.id ) as Overall_applicant_moved_to_regret
										from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select 
										30 as Query_num,
										count(distinct f.id ) as Overall_applicant_moved_to_regret
										from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){


							 $Query = "select 
										30 as Query_num,
										count(distinct f.id ) as Overall_applicant_moved_to_regret
										from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){


							 $Query = "select 
										30 as Query_num,
										count(distinct f.id ) as Overall_applicant_moved_to_regret
										from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
										30 as Query_num,
										count(distinct f.id ) as Overall_applicant_moved_to_regret
										from atif_career.career_form as f left join atif_career.career_form_data as u on u.form_id=f.id 
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

							}

					$getStatus = DB::connection($this->dbCon)->select($Query);

					return $getStatus;
					}

					public function Overall_applicants_moved_to_Followup_for_Initial_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

						/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query="select 
								13 as Query_num,
								count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
								select 
								 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.log_career_form as cf 
								where cf.status_id=2 
								and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
								union
								select
								( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and  u.depart_id IN('".implode("','", $departmentFilter)."') and ( u.date is null or u.date < curdate() )
								) as dd";
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

							$Query="select 
								13 as Query_num,
								count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
								select 
								 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.log_career_form as cf 
								where cf.status_id=2 
								and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
								union
								select
								( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and  u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() )
								) as dd";
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query="select 
								13 as Query_num,
								count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
								select 
								 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.log_career_form as cf 
								where cf.status_id=2 
								and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
								union
								select
								( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() )
								) as dd";
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

							$Query="select 
								13 as Query_num,
								count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
								select 
								 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.log_career_form as cf 
								where cf.status_id=2 
								and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
								union
								select
								( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and ( u.date is null or u.date < curdate() )
								) as dd";
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query="select 
								13 as Query_num,
								count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
								select 
								 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.log_career_form as cf 
								where cf.status_id=2 
								and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
								union
								select
								( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and u.campus IN('".implode("','", $campusFilter)."') and ( u.date is null or u.date < curdate() )
								) as dd";
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
								13 as Query_num,
								count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
								select 
								 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.log_career_form as cf 
								where cf.status_id=2 
								and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
								union
								select
								( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and u.campus IN('".implode("','", $campusFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and ( u.date is null or u.date < curdate() )
								) as dd";
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
								13 as Query_num,
								count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
								select 
								 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.log_career_form as cf 
								where cf.status_id=2 
								and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
								union
								select
								( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and u.campus IN('".implode("','", $campusFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."') and ( u.date is null or u.date < curdate() )
								) as dd";

				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

							$Query="select 
								13 as Query_num,
								count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
								select 
								 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.log_career_form as cf 
								where cf.status_id=2 
								and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
								union
								select
								( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."') and ( u.date is null or u.date < curdate() )
								) as dd";
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query="select 
								13 as Query_num,
								count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
								select 
								 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.log_career_form as cf 
								where cf.status_id=2 
								and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
								union
								select
								( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
								from atif_Career.career_form as cf 
								left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
								where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() )
								) as dd";
									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
										13 as Query_num,
										count(distinct dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
										select 
										 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
										union
										select
										( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and cf.form_source IN('".implode("','", $formSourceFilter)."') and ( u.date is null or u.date < curdate() )
										) as dd";
									

									}	

					//////////////////AKHAN ///////////////////////////////
					

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							  $Query = "select 
										13 as Query_num,
										count(dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
										select 
										 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
										union
										select
										( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and ( u.date is null or u.date < curdate() )
										) as dd"; 

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										13 as Query_num,
										count(dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
										select 
										 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
										union
										select
										( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and ( u.date is null or u.date < curdate() )
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							 $Query = "select 
										13 as Query_num,
										count(dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
										select 
										 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
										union
										select
										( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() )
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							 $Query = "select 
										13 as Query_num,
										count(dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
										select 
										 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
										union
										select
										( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and ( u.date is null or u.date < curdate() )
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							 $Query = "select 
										13 as Query_num,
										count(dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
										select 
										 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
										union
										select
										( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and ( u.date is null or u.date < curdate() )
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
										13 as Query_num,
										count(dd.Overall_applicants_moved_to_Followup_for_Initial) as Overall_applicants_moved_to_Followup_for_Initial from(
										select 
										 ( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
										union
										select
										( cf.id ) as Overall_applicants_moved_to_Followup_for_Initial
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."') and ( u.date is null or u.date < curdate() )
										) as dd";

							}


							


				$getStatus = DB::connection($this->dbCon)->select($Query);

					return $getStatus;

					}


					public function Applicants_currently_in_Followup_for_Initial_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

						
						/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query="select 
									14 as Query_num,
									 count(dd.Applicants_currently_in) as Applicants_currently_in from(
									select 
									 ( cf.id ) as Applicants_currently_in
									from atif_Career.log_career_form as cf 
									where cf.status_id=2 
									and (cf.status_id=12 or cf.status_id=10 )  
									union
									select
									 ( cf.id ) as Applicants_currently_in
									from atif_Career.career_form as cf 
									left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
									where cf.status_id=2 and u.depart_id IN('".implode("','", $departmentFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
									) as dd";
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

							$Query="select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query="select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

							$Query="select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query="select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and u.campus IN('".implode("','", $campusFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and u.depart_id IN('".implode("','", $departmentFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";
				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){
									$Query="select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and u.depart_id IN('".implode("','", $departmentFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query="select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and u.level_id IN('".implode("','", $designationFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";
									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and cf.form_source IN('".implode("','", $formSourceFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";
									

									}	

					//////////////////AKHAN ///////////////////////////////

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){
							 $Query = "select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							 $Query = "select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							 $Query = "select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
										14 as Query_num,
										 count(dd.Applicants_currently_in) as Applicants_currently_in from(
										select 
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 )  
										union
										select
										 ( cf.id ) as Applicants_currently_in
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as dd";

							}

							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;

					}


					public function Days_passed_no_action_taken($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){



						/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  u.depart_id IN('".implode("','", $departmentFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

							$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  u.depart_id IN('".implode("','", $departmentFilter)."') and  u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

							$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  u.level_id IN('".implode("','", $designationFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  u.campus IN('".implode("','", $campusFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  u.level_id IN('".implode("','", $designationFilter)."') and  u.campus IN('".implode("','", $campusFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  u.depart_id IN('".implode("','", $departmentFilter)."') and  u.campus IN('".implode("','", $campusFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";
				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){
									$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  u.level_id IN('".implode("','", $designationFilter)."') and  u.depart_id IN('".implode("','", $departmentFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){
								$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  u.level_id IN('".implode("','", $designationFilter)."') and  u.tag IN('".implode("','", $subjectFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";

									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and  cf.form_source IN('".implode("','", $formSourceFilter)."')  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";
									

									}	

					//////////////////AKHAN ///////////////////////////////

					


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							
							 $Query = "select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";

							}



							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

								//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							 $Query = "select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."')  and u.tag IN('".implode("','", $subjectFilter)."')  and u.level_id IN('".implode("','", $designationFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')  and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select
										15 as Query_num,
										count(dd.Days_passed_no_action_taken) as Days_passed_no_action_taken from(
										select 
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.log_career_form as cf 
										where cf.status_id=2 
										and (cf.status_id=12 or cf.status_id=10 ) 
										union
										select
										( cf.id ) as Days_passed_no_action_taken
										from atif_Career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
										where cf.status_id=2 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.depart_id IN('".implode("','", $departmentFilter)."') and u.tag IN('".implode("','", $subjectFilter)."')  and u.level_id IN('".implode("','", $designationFilter)."') and u.campus IN('".implode("','", $campusFilter)."') and cf.form_source IN('".implode("','", $formSourceFilter)."') and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


										and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
										) as dd";

							}

							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;




					}



					public function Overall_applicants_given_extension_from_Followup_for_Part_B_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){


						/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

							$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and accf.depart_id IN('".implode("','", $departmentFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

								$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and accf.tag IN('".implode("','", $subjectFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

								$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

							$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and accf.level_id IN('".implode("','", $designationFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and accf.campus IN('".implode("','", $campusFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and accf.level_id IN('".implode("','", $designationFilter)."') and accf.campus IN('".implode("','", $campusFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.campus IN('".implode("','", $campusFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
				
							}

					if( $departmentFilter !='null' && $departmentFilter !="" && $designationFilter !='null' && $designationFilter!="" ){

					$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and accf.level_id IN('".implode("','", $designationFilter)."') and accf.depart_id IN('".implode("','", $departmentFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and accf.level_id IN('".implode("','", $designationFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and acf.form_source IN('".implode("','", $formSourceFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									

									}	


									if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

								 $Query = "select 
									16 as Query_num,
									count( cf.id ) as Overall_applicants_given
									from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
									where cf.status_id=2   and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."')and accf.level_id IN('".implode("','", $designationFilter)."')
									and accf.campus IN('".implode("','", $campusFilter)."') and acf.form_source IN('".implode("','", $formSourceFilter)."')
									and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";	
								}

					//////////////////AKHAN ///////////////////////////////

					

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							$Query = "select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id 
							where cf.status_id=2  and from_unixtime(acf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

							//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and from_unixtime(acf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							 $Query = "select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and from_unixtime(acf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";	
						}

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							 $Query = "select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and from_unixtime(acf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."') and accf.level_id IN('".implode("','", $designationFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";	
						}

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							 $Query = "select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and from_unixtime(acf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."')and accf.level_id IN('".implode("','", $designationFilter)."')
							and accf.campus IN('".implode("','", $campusFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
							16 as Query_num,
							count( cf.id ) as Overall_applicants_given
							from atif_Career.log_career_form as cf left join atif_career.career_form as acf on cf.form_id = acf.id left join atif_career.career_form_data as accf on acf.id = accf.form_id 
							where cf.status_id=2  and from_unixtime(acf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."')and accf.level_id IN('".implode("','", $designationFilter)."')
							and accf.campus IN('".implode("','", $campusFilter)."') and acf.form_source IN('".implode("','", $formSourceFilter)."')
							and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";	
						}

							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;

					}
					
						public function Overall_applicants_moved_to_Not_Interested_from_Followup_for_Initial_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){


							/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

							$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6)  and accf.depart_id IN('".implode("','", $departmentFilter)."')";
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

								$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6)  and accf.tag IN('".implode("','", $subjectFilter)."')";
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

								$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6)  and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."')";
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

							$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6)  and accf.level_id IN('".implode("','", $designationFilter)."')";
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6)  and accf.campus IN('".implode("','", $campusFilter)."')";
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6) and accf.level_id IN('".implode("','", $designationFilter)."') and accf.campus IN('".implode("','", $campusFilter)."')";
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6)  and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.campus IN('".implode("','", $campusFilter)."')";
				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

					$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6)  and accf.level_id IN('".implode("','", $designationFilter)."') and accf.depart_id IN('".implode("','", $departmentFilter)."')";
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6)  and accf.level_id IN('".implode("','", $designationFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."')";

									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query="select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id left join atif_career.career_form as cfa on cf.form_id = cfa.id
									where cf.status_id=2  
									and (cf.stage_id=6)  and cfa.form_source IN('".implode("','", $formSourceFilter)."')";
									

									}	

					//////////////////AKHAN ///////////////////////////////


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							$Query = "select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf 
									where cf.status_id=2  
									and (cf.stage_id=6) and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' "; 

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

							//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6) and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."')";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							 $Query = "select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6) and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."')";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){


							 $Query = "select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6) and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."') and accf.level_id IN('".implode("','", $designationFilter)."')";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){


							 $Query = "select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id
									where cf.status_id=2  
									and (cf.stage_id=6) and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."') and accf.level_id IN('".implode("','", $designationFilter)."') and accf.campus IN('".implode("','", $campusFilter)."')";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
									17 as Query_num,
									count( cf.id ) as Overall_applicants_not_interested
									from atif_Career.log_career_form as cf left join atif_career.career_form_data as accf on cf.form_id = accf.form_id left join atif_career.career_form as ccf on accf.form_id = ccf.id
									where cf.status_id=2  
									and (cf.stage_id=6) and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and accf.depart_id IN('".implode("','", $departmentFilter)."') and accf.tag IN('".implode("','", $subjectFilter)."') and accf.level_id IN('".implode("','", $designationFilter)."') and accf.campus IN('".implode("','", $campusFilter)."') and ccf.form_source IN('".implode("','", $formSourceFilter)."')";	
						}

						



							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;

						}


					public function Overall_applicants_moved_to_Not_Interested_from_Initial_Interview_Communication($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

						/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

							$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and cf.depart_id IN('".implode("','", $departmentFilter)."')";	
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

								$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and cf.tag IN('".implode("','", $subjectFilter)."')";	
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

								$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and cf.depart_id IN('".implode("','", $departmentFilter)."') and cf.tag IN('".implode("','", $subjectFilter)."')";	
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

							$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and cf.level_id IN('".implode("','", $designationFilter)."')";	
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and cf.campus IN('".implode("','", $campusFilter)."')";	
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and cf.depart_id IN('".implode("','", $designationFilter)."') and cf.campus IN('".implode("','", $campusFilter)."')";	
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

							$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and cf.depart_id IN('".implode("','", $departmentFilter)."') and cf.campus IN('".implode("','", $campusFilter)."')";	
				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

					$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and cf.depart_id IN('".implode("','", $departmentFilter)."') and cf.level_id IN('".implode("','", $designationFilter)."')";	
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

							$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6  and cf.level_id IN('".implode("','", $designationFilter)."') and cf.tag IN('".implode("','", $subjectFilter)."')";	

									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and l.form_source IN('".implode("','", $formSourceFilter)."')";	
									

									}	

					//////////////////AKHAN ///////////////////////////////
						

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							

						$Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
								";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

							//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.depart_id IN('".implode("','", $departmentFilter)."')";	
							}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							 $Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.depart_id IN('".implode("','", $departmentFilter)."') and cf.tag IN('".implode("','", $subjectFilter)."')";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

						

							 $Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.depart_id IN('".implode("','", $departmentFilter)."') and cf.tag IN('".implode("','", $subjectFilter)."') and cf.level_id IN('".implode("','", $designationFilter)."')";	
						}

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

							

							 $Query = "select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.depart_id IN('".implode("','", $departmentFilter)."') and cf.tag IN('".implode("','", $subjectFilter)."') and cf.level_id IN('".implode("','", $designationFilter)."') and cf.campus IN('".implode("','", $campusFilter)."') ";	
						}

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = " select 
								18 as Query_num,
								count( l.id ) as Intial_Interview_Communication_Not
								from atif_career.career_form as l left join atif_career.career_form_data as cf on cf.form_id = l.id 
								where l.status_id=1 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.depart_id IN('".implode("','", $departmentFilter)."') and cf.tag IN('".implode("','", $subjectFilter)."') and cf.level_id IN('".implode("','", $designationFilter)."') and cf.campus IN('".implode("','", $campusFilter)."') and l.form_source IN('".implode("','", $formSourceFilter)."') ";	
						}


							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;


					}


					public function Applicants_awaiting_for_Formal_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

						/////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

								$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";	
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

									$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";	
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

									$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";	
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

								$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";	
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

								$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.campus IN('".implode("','", $campusFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";		
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')    order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";	
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

								$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";	
				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";		
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

								$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";		

									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and f.form_source IN('".implode("','", $formSourceFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";	
									

									}	

					//////////////////AKHAN ///////////////////////////////
						

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){


							 $Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff ";	
						}

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

							//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff ";
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							 $Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff ";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){


							 $Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff ";	
						}



						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){


							 $Query = "select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff ";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = " select 
									20 as Query_num, 
									sum(ff.Intial_Interview_for_formal) as Intial_Interview_for_formal
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as Intial_Interview_for_formal
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=3 and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff ";	
						}



						$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;


					}

					public function Overall_applicants_marked_Present_for_Formal_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){



						///////////////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

									$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and cfa.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";		
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

										$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and cfa.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";	
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

										$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and cfa.depart_id IN('".implode("','", $departmentFilter)."') and cfa.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";		
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

									$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and cfa.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";		
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

									$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and cfa.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";			
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

									$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and cfa.level_id IN('".implode("','", $designationFilter)."') and cfa.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";	
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

									$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and cfa.depart_id IN('".implode("','", $departmentFilter)."') and cfa.campus IN('".implode("','", $campusFilter)."') and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";	
				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

							$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and cfa.level_id IN('".implode("','", $designationFilter)."') and cfa.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";		
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

									$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and cfa.level_id IN('".implode("','", $designationFilter)."') and cfa.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";		

									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id  left join atif_career.career_form as ca on cf.form_id = ca.id
										where cf.status_id=3 and ca.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";	
									

									}	

					//////////////////AKHAN ///////////////////////////////
						

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

						
							 $Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4) ";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

							//$departmentFilter = explode(",", $departmentFilter);

							 $Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id 
										where cf.status_id=3 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfa.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id
										where cf.status_id=3 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfa.depart_id IN('".implode("','", $departmentFilter)."')  and cfa.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){


							 $Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id
										where cf.status_id=3 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfa.depart_id IN('".implode("','", $departmentFilter)."')  and cfa.tag IN('".implode("','", $subjectFilter)."') and cfa.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";	
						}

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){


							 $Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id
										where cf.status_id=3 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfa.depart_id IN('".implode("','", $departmentFilter)."')  and cfa.tag IN('".implode("','", $subjectFilter)."') and cfa.level_id IN('".implode("','", $designationFilter)."') and cfa.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";	
						}

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
										21 as Query_num, 
										count( cf.id ) as Present_for_Formal_Interview 
										from atif_Career.log_career_form as cf left join atif_career.career_form_data as cfa on cf.form_id = cfa.form_id left join atif_career.career_form as cff on cfa.form_id = cff.id
										where cf.status_id=3 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfa.depart_id IN('".implode("','", $departmentFilter)."')  and cfa.tag IN('".implode("','", $subjectFilter)."') and cfa.level_id IN('".implode("','", $designationFilter)."') and cfa.campus IN('".implode("','", $campusFilter)."') and cff.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cfa.created ,'%Y-%m-%d') >= '2018-10-01' 
										and (cf.stage_id=4)";	
						}


						$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;


					}

					public function Applicants_currently_in_Formal_Interview_awaiting_for_Next_Step_decision($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){



						///////////////AKHAN////////////////////////////////////////

					if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

									$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3  
									) as f_data 
									where f_data.p_date >= curdate() ";			
									}	

				


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

										$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3  
									) as f_data 
									where f_data.p_date >= curdate() ";		
									}	

					

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

										$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
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
									where f.status_id=3  
									) as f_data 
									where f_data.p_date >= curdate() ";			
									
									}	
					
					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

									$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3 
									) as f_data 
									where f_data.p_date >= curdate() ";			
									}	
					



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

									$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3 
									) as f_data 
									where f_data.p_date >= curdate() ";				
									}	

					
					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

									$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3 
									) as f_data 
									where f_data.p_date >= curdate() ";		
									}	
					

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

									$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3  
									) as f_data 
									where f_data.p_date >= curdate() ";		
				
							}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

							$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
									) as f_data 
									where f_data.p_date >= curdate() ";			
									}	
					



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

									$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
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
									where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
									) as f_data 
									where f_data.p_date >= curdate() ";		

									}	

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1)
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
									where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
									and f.form_source IN('".implode("','", $formSourceFilter)."')) as f_data 
									where f_data.p_date >= curdate() ";		
									

									}	

					//////////////////AKHAN ///////////////////////////////

					

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							 $Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
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
									where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
									) as f_data 
									where f_data.p_date >= curdate()  ";
									}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

							//$departmentFilter = explode(",", $departmentFilter);

							  $Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
									) as f_data 
									where f_data.p_date >= curdate() ";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
									) as f_data 
									where f_data.p_date >= curdate()";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){


							 $Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
									) as f_data 
									where f_data.p_date >= curdate()";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							 $Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
									) as f_data 
									where f_data.p_date >= curdate() ";	
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
									22 as Query_num, 
									count( f_data.p_date ) as awaiting_for_Next_Step_interiew  
									from (
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
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
									where f.status_id=3 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and f.form_source IN('".implode("','", $formSourceFilter)."') 
									) as f_data 
									where f_data.p_date >= curdate()";	
						}


									

							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;


					}

		}

		