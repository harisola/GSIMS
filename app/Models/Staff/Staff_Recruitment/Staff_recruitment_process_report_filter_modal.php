<?php
namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class Staff_recruitment_process_report_filter_modal extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_form';
    protected $dbCon = 'mysql_Career';


	//Arif Khan Work

	


		public function Create_query($query)
	{
    	$career = DB::connection($this->dbCon)->select($query);
		$career = collect($career)->map(function($x){ return (array) $x; })->toArray(); 
		return $career;
	}
	//arif.

				public function online_get_count_filter($date_1,$date_2,$campusFilter,$formSourceFilter)
				  {
				  	$Query = "select 
						1 as Query_num,
						count(distinct cf.id ) as online_get_count_filter
						from atif_career.career_form as cf where cf.form_source=1 
						and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
						//$getStatus = DB::connection($this->dbCon)->select($Query);


					//return $getStatus;

				  	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !="" ){
				  		$Query = "
						select 
						1 as Query_num,
						count(distinct cf.id ) as online_get_count_filter
						from atif_career.career_form as cf where cf.form_source=1 
						and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				  	}

				  	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
						$Query = "
						select 
						1 as Query_num,
						count(distinct cf.id ) as online_get_count_filter
						from atif_career.career_form as cf where cf.form_source=1 and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
					}

				  	
					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "
							select 
							1 as Query_num,
							count(distinct cf.id ) as online_get_count_filter
							from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where cf.form_source=1 and cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "
							select 
							1 as Query_num,
							count(distinct cf.id ) as online_get_count_filter
							from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where  cf.form_source=1 and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					/////AKHAN ///////////////////////////////						

					// $getStatus = DB::connection($this->dbCon)->select($Query);
					$getStatus = DB::connection($this->dbCon)->select($Query);

					 return $getStatus;


				}

				// public function online_get_count_filter($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter)
				//   {

				//   	/////AKHAN ///////////////////////////////
				//   	if( $departmentFilter !='null' && $departmentFilter !=""){
				// 		$departmentFilter = explode(",", $departmentFilter);

				// 		$Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where cf.form_source=1 and  cfd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}


				// 	if( $subjectFilter !='null' && $subjectFilter !=""){
				// 		$subjectFilter = explode(",", $subjectFilter);

				// 		$Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where cf.form_source=1 and  cfd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}


				// 	if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

				// 		 $Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where cf.form_source=1 and  cfd.depart_id IN('".implode("','", $departmentFilter)."')  and  cfd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}


					


				// 	if( $designationFilter !='null' && $designationFilter !=""){
				// 		$designationFilter = explode(",", $designationFilter);

				// 		$Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where cf.form_source=1 and  cfd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}




				// 	if( $campusFilter !='null' && $campusFilter !=""){
				// 		$campusFilter = explode(",", $campusFilter);

				// 		$Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where cf.form_source=1 and cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}

				// 	if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

				// 		 $Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where cf.form_source=1 and  cfd.level_id IN('".implode("','", $designationFilter)."')  and  cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}


				// 	if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

				// 		 $Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where  cf.form_source=1 and cfd.depart_id IN('".implode("','", $departmentFilter)."')  and  cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}



				// 	if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

				// 		 $Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where  cf.form_source=1 and cfd.level_id IN('".implode("','", $designationFilter)."')  and  cfd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}



				// 	if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

				// 		 $Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where cf.form_source=1 and cfd.level_id IN('".implode("','", $designationFilter)."')  and  cfd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}



				// 	if( $formSourceFilter !='null' && $formSourceFilter !=""){
				// 		$formSourceFilter = explode(",", $formSourceFilter);

				// 		$Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where  cf.form_source=1 and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}


				// 	/////AKHAN ///////////////////////////////


				//   	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
				// 	$Query = "
				// 		select 
				// 		1 as Query_num,
				// 		count(distinct cf.id ) as online_get_count_filter
				// 		from atif_career.career_form as cf where cf.form_source=1 and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
									
				// 	}
				// 	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){
				// 		//$departmentFilter = explode(",", $departmentFilter);

				// 		$Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id = cf.id where cf.form_source=1 and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}
				// 	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

					

				// 		//$subjectFilter = explode(",", $subjectFilter);
						
				// 		 $Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id=cf.id where cf.form_source=1 and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}

					
				// 	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

					

						
				// 		 $Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id=cf.id where cf.form_source=1 and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."') and cfd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 	}

				// 	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){

						

				// 		 $Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id=cf.id where cf.form_source=1 and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."') and cfd.level_id IN('".implode("','", $designationFilter)."') and cfd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 			}


				// 			if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


				// 			 $Query = "
				// 			select 
				// 			1 as Query_num,
				// 			count(distinct cf.id ) as online_get_count_filter
				// 			from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id=cf.id where  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.depart_id IN('".implode("','", $departmentFilter)."') and cfd.tag IN('".implode("','", $subjectFilter)."') and cfd.level_id IN('".implode("','", $designationFilter)."') and cfd.campus IN('".implode("','", $campusFilter)."')  and cf.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

				// 			}



						

				// 	$getStatus = DB::connection($this->dbCon)->select($Query);

				// 	return $getStatus;


				// }


				/////////////////////////////////////Fill PART A ONLINE/////////////////////////////////////////
			
				public function fillparta_get_count_filter($date_1,$date_2,$campusFilter,$formSourceFilter)
				  {

				  		/////AKHAN ///////////////////////////////
				  
				  	$Query = "

						select 
							2 as Query_num,
							count(distinct cf.id ) as fillparta_get_count_filter
							from atif_career.career_form as cf 
							left join atif_career.log_career_form as l on l.form_id=cf.id
							where cf.form_source=1 and l.id is null and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";


					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "
							select 
							2 as Query_num,
							count(distinct cf.id ) as fillparta_get_count_filter
							from atif_career.career_form as cf 
							left join atif_career.log_career_form as l on l.form_id=cf.id
							left join atif_career.career_form_data as cfd on cfd.form_id=l.form_id
							where cfd.campus IN('".implode("','", $campusFilter)."') and cf.form_source=1 and l.id is null and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

				



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "
							select 
							2 as Query_num,
							count(distinct cf.id ) as fillparta_get_count_filter
							from atif_career.career_form as cf 
							left join atif_career.log_career_form as l on l.form_id=cf.id
							left join atif_career.career_form_data as cfd on cfd.form_id=l.form_id
							where cf.form_source IN('".implode("','", $formSourceFilter)."')  and l.id is null and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					/////AKHAN ///////////////////////////////


				  	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){
					 $Query = "

						select 
							2 as Query_num,
							count(distinct cf.id ) as fillparta_get_count_filter
							from atif_career.career_form as cf 
							left join atif_career.log_career_form as l on l.form_id=cf.id
							where from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source=1 and l.id is null and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $campusFilter !='null' && $campusFilter !="" ){
					 $Query = "

						select 
							2 as Query_num,
							count(distinct cf.id ) as fillparta_get_count_filter
							from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id=cf.id
							left join atif_career.log_career_form as l on l.form_id=cf.id
							where from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."') and cf.form_source=1 and l.id is null and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
						}



						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $formSourceFilter !='null' && $formSourceFilter !="" ){
					 $Query = "

						select 
							2 as Query_num,
							count(distinct cf.id ) as fillparta_get_count_filter
							from atif_career.career_form as cf 
							left join atif_career.log_career_form as l on l.form_id=cf.id
							where from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') and cf.form_source=1 and l.id is null and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
						}

					


					$getfilter = DB::connection($this->dbCon)->select($Query);

					return $getfilter;
				}

			////////////////////////////PART A SCREENING///////////////////////////////////////////////////////////////

				public function Overall_applicants_moved_to_Regret_from_Part_A_screening($date_1,$date_2,$campusFilter,$formSourceFilter){



					/////AKHAN ///////////////////////////////
				 	 $Query = "
							select 9 as Query_num,
								count(distinct cf.id ) as part_a_screening 
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id left join atif_career.career_form_data as cfd on cfd.form_id=cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 

								and dd.status_id=1 and cf.stage_id=1 and  cf.form_source=1 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";


					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "
							select 9 as Query_num,
								count(distinct cf.id ) as part_a_screening 
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id left join atif_career.career_form_data as cfd on cfd.form_id=cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 

								and dd.status_id=1 and cf.stage_id=1 and cfd.campus IN('".implode("','", $campusFilter)."') 
								 and cf.form_source=1 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						

						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "
							select 9 as Query_num,
								count(distinct cf.id ) as part_a_screening 
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id left join atif_career.career_form_data as cfd on cfd.form_id=cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 

								and dd.status_id=1 and cf.stage_id=1 and cf.form_source IN('".implode("','", $formSourceFilter)."')
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					//////////////////AKHAN ///////////////////////////////

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){


						$Query = "
							select 9 as Query_num,
								count(distinct cf.id ) as part_a_screening 
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id left join atif_career.career_form_data as cfd on cfd.form_id=cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 

								and dd.status_id=1 and cf.stage_id=1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								 and cf.form_source=1 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								";
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


						$Query = "
							select 9 as Query_num,
								count(distinct cf.id ) as part_a_screening 
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id left join atif_career.career_form_data as cfd on cfd.form_id=cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 

								and dd.status_id=1 and cf.stage_id=1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and cf.form_source IN('".implode("','", $formSourceFilter)."')
								 and cf.form_source=1 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								";
						}




						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !=""){


						$Query = "
							select 9 as Query_num,
								count(distinct cf.id ) as part_a_screening 
								from atif_Career.career_form as cf
								left join ( 
								 select * from atif_career.log_career_form as cf
								 where cf.id in(   
								select max(cff.id)
								from atif_career.log_career_form as cff  
								where cff.status_id <> 10 and cff.status_id <> 12
								group by cff.form_id 
								)
								) as dd on dd.form_id = cf.id left join atif_career.career_form_data as cfd on cfd.form_id=cf.id
								where (cf.status_id=12 or cf.status_id=10 ) 

								and dd.status_id=1 and cf.stage_id=1 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and cfd.campus IN('".implode("','", $campusFilter)."')
								 and cf.form_source=1 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
								";
						}


					
						$getfilter = DB::connection($this->dbCon)->select($Query);

						return $getfilter;
				}

				////////////////////////Applicants triggered for Part_B Awaiting to be communicated/////////////////////

				public function Applicants_triggered_for_Part_B_Awaiting_to_be_communicated($date_1,$date_2,$campusFilter,$formSourceFilter){



					$Query = "
							select 
							3 as Query_num,
							count(distinct cf.id ) as Applicants_triggered_Part_B_Awaiting
							from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id=cf.id where cf.status_id=11 and cf.stage_id=9 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "
							select 
							3 as Query_num,
							count(distinct cf.id ) as Applicants_triggered_Part_B_Awaiting
							from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id=cf.id where cf.status_id=11 and cf.stage_id=9 and cfd.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "
							select 
							3 as Query_num,
							count(distinct cf.id ) as Applicants_triggered_Part_B_Awaiting
							from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id=cf.id where cf.status_id=11 and cf.stage_id=9 and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					//////////////////AKHAN ///////////////////////////////



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){
						$Query ="select 
							3 as Query_num,
							count(distinct cf.id ) as Applicants_triggered_Part_B_Awaiting
							from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
						}

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !=""){
							$Query ="select 
							3 as Query_num,
							count(distinct cf.id ) as Applicants_triggered_Part_B_Awaiting
							from atif_career.career_form as cf left join atif_career.career_form_data as cfd on cfd.form_id=cf.id
							where cf.status_id=11 and cf.stage_id=9 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cfd.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
					}


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !=""){
							$Query ="select 
							3 as Query_num,
							count(distinct cf.id ) as Applicants_triggered_Part_B_Awaiting
							from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'";
					}



					



				$getfilter = DB::connection($this->dbCon)->select($Query);

						return $getfilter;
					}

				


			////////////Applicants awating for Part B presence - Communicated for Part B//////////////////////////////
				public function applicants_awating_for_Part_B_presence_Communicated_for_Part_B($date_1,$date_2,$campusFilter,$formSourceFilter){



					/////////////AKHAN ///////////////////////////////

					$Query = "
							select 
							4 as Query_num,
							count(distinct cf.id ) as applicants_awating_for_Part_B_presence
							from atif_career.career_form as cf 
							left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
							where cf.status_id=11 and cf.stage_id=10  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date >= curdate() )";
				  	

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "
							select 
							4 as Query_num,
							count(distinct cf.id ) as applicants_awating_for_Part_B_presence
							from atif_career.career_form as cf 
							left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
							where cf.status_id=11 and cf.stage_id=10  and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date >= curdate() )";

					}

				


					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "
							select 
							4 as Query_num,
							count(distinct cf.id ) as applicants_awating_for_Part_B_presence
							from atif_career.career_form as cf 
							left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
							where cf.status_id=11 and cf.stage_id=10 and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date >= curdate() )";

					}


					//////////////////AKHAN ///////////////////////////////


					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){
					$Query ="select 
							4 as Query_num,
							count(distinct cf.id ) as applicants_awating_for_Part_B_presence
							from atif_career.career_form as cf 
							left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
							where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date >= curdate() )  ";
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !=""){
					$Query ="select 
							4 as Query_num,
							count(distinct cf.id ) as applicants_awating_for_Part_B_presence
							from atif_career.career_form as cf 
							left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
							where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date >= curdate() )  ";
					}



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $formSourceFilter !='null' && $formSourceFilter !=""){
					$Query ="select 
							4 as Query_num,
							count(distinct cf.id ) as applicants_awating_for_Part_B_presence
							from atif_career.career_form as cf 
							left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
							where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date >= curdate() )  ";
					}




						$getfilter = DB::connection($this->dbCon)->select($Query);

						return $getfilter;
					}

		////////////////Overall applicants moved to Followup for Part B presence/////////////////////////////////////////

					public function Overall_applicants_moved_to_Followup_for_Part_B_presence($date_1,$date_2,$campusFilter,$formSourceFilter){



				/////////////////////AKHAN ///////////////////////////////
				 			$Query = "
								select 
										4.1 as Query_num,
										count(distinct d.Total_form ) as Overall_applicants_moved_to_Followup_Part_B
										from(
										select 
										4.1 as Query_num,
										( l.form_id ) as Total_form
										from atif_career.log_career_form as l where l.status_id=11 
										and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 ) 

										union
										select 
										4.2 as Query_num,
										( cf.id ) as Overall_applicants_moved_to_Followup_Part_B
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
										where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() ) and  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as d";




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query = "
									select 
											4.1 as Query_num,
											count(distinct d.Total_form ) as Overall_applicants_moved_to_Followup_Part_B
											from(
											select 
											4.1 as Query_num,
											( l.form_id ) as Total_form
											from atif_career.log_career_form as l where l.status_id=11 
											and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 ) 

											union
											select 
											4.2 as Query_num,
											( cf.id ) as Overall_applicants_moved_to_Followup_Part_B
											from atif_career.career_form as cf 
											left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
											where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() ) and u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
											) as d";

					}

					


					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "
								select 
										4.1 as Query_num,
										count(distinct d.Total_form ) as Overall_applicants_moved_to_Followup_Part_B
										from(
										select 
										4.1 as Query_num,
										( l.form_id ) as Total_form
										from atif_career.log_career_form as l where l.status_id=11 
										and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 ) 

										union
										select 
										4.2 as Query_num,
										( cf.id ) as Overall_applicants_moved_to_Followup_Part_B
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
										where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() ) and  cf.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
										) as d";

					}


					//////////////////AKHAN ///////////////////////////////

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2){

							$Query = "
									select 
									4.1 as Query_num,
									count(distinct d.Total_form ) as Overall_applicants_moved_to_Followup_Part_B
									from(
									select 
									4.1 as Query_num,
									( l.form_id ) as Total_form
									from atif_career.log_career_form as l where l.status_id=11 
									and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 ) 

									union
									select 
									4.2 as Query_num,
									( cf.id ) as Overall_applicants_moved_to_Followup_Part_B
									from atif_career.career_form as cf 
									left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
									where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() ) and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
									) as d ";	
						}



						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 && $campusFilter !='null' && $campusFilter !=""){

							$Query = "
									select 
									4.1 as Query_num,
									count(distinct d.Total_form ) as Overall_applicants_moved_to_Followup_Part_B
									from(
									select 
									4.1 as Query_num,
									( l.form_id ) as Total_form
									from atif_career.log_career_form as l where l.status_id=11 
									and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 ) 

									union
									select 
									4.2 as Query_num,
									( cf.id ) as Overall_applicants_moved_to_Followup_Part_B
									from atif_career.career_form as cf 
									left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
									where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() ) and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
									) as d ";	
						}



						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 &&  $formSourceFilter !='null' && $formSourceFilter !=""){

							$Query = "
									select 
									4.1 as Query_num,
									count(distinct d.Total_form ) as Overall_applicants_moved_to_Followup_Part_B
									from(
									select 
									4.1 as Query_num,
									( l.form_id ) as Total_form
									from atif_career.log_career_form as l where l.status_id=11 
									and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 ) 

									union
									select 
									4.2 as Query_num,
									( cf.id ) as Overall_applicants_moved_to_Followup_Part_B
									from atif_career.career_form as cf 
									left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
									where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() ) and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and  cf.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
									) as d ";	
						}


						



						$getfilter = DB::connection($this->dbCon)->select($Query);

						return $getfilter;
					}

					/////////////////////////////Applicants currently in Followup for Part B presence//////////////////////////

					public function applicants_currently_in_Followup_for_Part_B_presence($date_1,$date_2,$campusFilter,$formSourceFilter){



						/////////////////////AKHAN ///////////////////////////////
				  	$Query = "select 
										4.2 as Query_num,
										count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part

										from (
										select 
										 
										( cf.id ) as Total_form
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
										where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'   and ( u.date is null or u.date < curdate() ) group by cf.id 
										) as cf";




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
										4.2 as Query_num,
										count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part

										from (
										select 
										 
										( cf.id ) as Total_form
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
										where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and u.campus IN('".implode("','", $campusFilter)."')   and ( u.date is null or u.date < curdate() ) group by cf.id 
										) as cf";

					}

					



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						
						$formSourceFilter = explode(",", $formSourceFilter);
						$Query = "select 
										4.2 as Query_num,
										count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part

										from (
										select 
										 
										( cf.id ) as Total_form
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
										where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and cf.form_source IN('".implode("','", $formSourceFilter)."')    and ( u.date is null or u.date < curdate() ) group by cf.id 
										) as cf";
					}


					//////////////////AKHAN ///////////////////////////////




						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							

						 	 $Query = "select 
										4.2 as Query_num,
										count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part

										from (
										select 
										 
										( cf.id ) as Total_form
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
										where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and ( u.date is null or u.date < curdate() ) group by cf.id 
										) as cf 
										";
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !=""){

							

						 	 $Query = "select 
										4.2 as Query_num,
										count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part

										from (
										select 
										 
										( cf.id ) as Total_form
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
										where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and u.campus IN('".implode("','", $campusFilter)."')  and ( u.date is null or u.date < curdate() ) group by cf.id 
										) as cf 
										";
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $formSourceFilter !='null' && $formSourceFilter !=""){

							

						 	 $Query = "select 
										4.2 as Query_num,
										count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part

										from (
										select 
										 
										( cf.id ) as Total_form
										from atif_career.career_form as cf 
										left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
										where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and cf.form_source IN('".implode("','", $formSourceFilter)."')   and ( u.date is null or u.date < curdate() ) group by cf.id 
										) as cf 
										";
						}

						


						$getfilter = DB::connection($this->dbCon)->select($Query);

						return $getfilter;


					}


			# Call for part b presence currently in followup 7 day passed

					public function Call_for_part_b_presence_currently_in_followup_7_day_passed($date_1,$date_2,$campusFilter,$formSourceFilter){


							/////////////////////AKHAN ///////////////////////////////

						$Query = "select 4.3 as Query_num, count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part_7_days 
								from ( select ( cf.id ) as Total_form from atif_career.career_form as cf
								 left join atif_career.career_form_data as u
								  on u.form_id=cf.id
								  and u.status_id= cf.status_id 
								 where cf.status_id=11 
								 and cf.stage_id=10
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
								 
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) group by cf.id ) as cf ";
				  

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 4.3 as Query_num, count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part_7_days 
								from ( select ( cf.id ) as Total_form from atif_career.career_form as cf
								 left join atif_career.career_form_data as u
								  on u.form_id=cf.id
								  and u.status_id= cf.status_id 
								 where cf.status_id=11 
								 and cf.stage_id=10
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
								 and  u.campus IN('".implode("','", $campusFilter)."') 
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) group by cf.id ) as cf ";

					}

					


					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 4.3 as Query_num, count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part_7_days 
								from ( select ( cf.id ) as Total_form from atif_career.career_form as cf
								 left join atif_career.career_form_data as u
								  on u.form_id=cf.id
								  and u.status_id= cf.status_id 
								 where cf.status_id=11 
								 and cf.stage_id=10
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
								 and  cf.form_source IN('".implode("','", $formSourceFilter)."') 
								 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) group by cf.id ) as cf ";
					}


					//////////////////AKHAN ///////////////////////////////





						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							

						 	 $Query = "select 4.3 as Query_num, count(distinct cf.Total_form ) as applicants_currently_in_Followup_for_Part_7_days 
								from ( select ( cf.id ) as Total_form from atif_career.career_form as cf
								 left join atif_career.career_form_data as u
								 on u.form_id=cf.id
								 and u.status_id= cf.status_id 
								 where cf.status_id=11 
								 and cf.stage_id=10
								 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
								 and  from_unixtime(cf.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								  and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) group by cf.id ) as cf 
										";
										
						}


						


						$getfilter = DB::connection($this->dbCon)->select($Query);

						return $getfilter;
					}

					

//////////////////////////Overall applicants given extension from Followup for Part B presence///////////////////////////////////

					public function Overall_applicants_given_extension_Followup_for_Part_B_presence($date_1,$date_2,$campusFilter,$formSourceFilter){


						/////////////////////AKHAN ///////////////////////////////
				  
							$Query = "select  
								4.4 as Query_num, 
								(count(l.form_id) - count(distinct(l.form_id))) as Overall_applicants_given_extension_Followup_for_Part_B 
								from atif_career.log_career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.form_id
								  where l.status_id=11  and l.stage_id=11  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01' 
								";

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

					$Query = "select  
								4.4 as Query_num, 
								(count(l.form_id) - count(distinct(l.form_id))) as Overall_applicants_given_extension_Followup_for_Part_B 
								from atif_career.log_career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.form_id
								  where l.status_id=11  and l.stage_id=11  and  u.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01' 
								";

					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						
						$formSourceFilter = explode(",", $formSourceFilter);
						$Query = "select  
								4.4 as Query_num, 
								(count(l.form_id) - count(distinct(l.form_id))) as Overall_applicants_given_extension_Followup_for_Part_B 
								from atif_career.log_career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.form_id left join atif_career.career_form as cf
										  on u.form_id=cf.id
								  where l.status_id=11  and l.stage_id=11  and  cf.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01' 
								";

					}


					//////////////////AKHAN ///////////////////////////////

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

						$Query="select  
							4.4 as Query_num, 
							(count(l.form_id) - count(distinct(l.form_id))) as Overall_applicants_given_extension_Followup_for_Part_B 
							from atif_career.log_career_form as l  where l.status_id=11  and l.stage_id=11  and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01' ";

							}


						



						$getfilter = DB::connection($this->dbCon)->select($Query);

						return $getfilter;

					}


					public function Overall_applicants_moved_to_Not_Interested_from_Followup_for_Part_B_presence($date_1,$date_2,$campusFilter,$formSourceFilter){


						/////////////////////AKHAN ///////////////////////////////
				  				$Query="select 
									4.5 as Query_num,
									count(distinct l.id ) as Overall_applicants_moved_to_Not_Interested_from_Followup
									from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id
									 where l.status_id=11 and l.stage_id=6 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";



					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

					$Query="select 
									4.5 as Query_num,
									count(distinct l.id ) as Overall_applicants_moved_to_Not_Interested_from_Followup
									from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id
									 where l.status_id=11 and l.stage_id=6 and  u.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

					
					


					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						
						$formSourceFilter = explode(",", $formSourceFilter);
						$Query="select 
									4.5 as Query_num,
									count(distinct l.id ) as Overall_applicants_moved_to_Not_Interested_from_Followup
									from atif_career.career_form as l left join atif_career.career_form_data as u
										  on u.form_id=l.id 
									 where l.status_id=11 and l.stage_id=6 and l.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
									}	

					


					//////////////////AKHAN ///////////////////////////////


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

								$Query="select 
									4.5 as Query_num,
									count(distinct l.id ) as Overall_applicants_moved_to_Not_Interested_from_Followup
									from atif_career.career_form as l where l.status_id=11 and l.stage_id=6 and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
									}


						

						$getfilter = DB::connection($this->dbCon)->select($Query);

						return $getfilter;

					}

					public function Overall_applicants_marked_Present_for_Part_B($date_1,$date_2,$campusFilter,$formSourceFilter){




						/////////////////////AKHAN ///////////////////////////////
				  /*$Query="select 7 as Query_num,
									count( d.id ) as Overall_applicants_marked_Present_for_Part
									from( 
									select (la.form_id) as id  from atif_career.log_career_form as la  
									left join atif_career.career_form_data as cfd on cfd.form_id = la.form_id
									where la.status_id=11 and la.stage_id =4 
									 group by la.form_id
									union
									select (l.id) as id  from atif_career.career_form as l 
									where l.status_id=11 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

									) as d";*/


									$Query="select 7 as Query_num,
													count( d.id ) as Overall_applicants_marked_Present_for_Part
													from( 
													select (l.form_id) as id  from atif_career.log_career_form as l  
													where l.status_id=11 and l.stage_id =4  
													union
													select (l.id) as id  from atif_career.career_form as l 
													where l.status_id=11  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

													) as d";






					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

								/*$Query="select 7 as Query_num,
									count( d.id ) as Overall_applicants_marked_Present_for_Part
									from( 
									select (la.form_id) as id  from atif_career.log_career_form as la  
									left join atif_career.career_form_data as cfd on cfd.form_id = la.form_id
									where la.status_id=11 and la.stage_id =4 and cfd.campus  IN('".implode("','", $campusFilter)."')
									 group by la.form_id
									union
									select (l.id) as id  from atif_career.career_form as l 
									where l.status_id=11 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

									) as d";*/



									$Query="select 7 as Query_num,
													count( d.id ) as Overall_applicants_marked_Present_for_Part
													from( 
													select (l.form_id) as id  from atif_career.log_career_form as l  
													where l.status_id=11 and l.stage_id =4  
													union
													select (l.id) as id  from atif_career.career_form as l 
													left join atif_career.career_form_data as cfd on cfd.form_id = l.id
													where l.status_id=11 and cfd.campus  IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

													) as d";
									}	

					


					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						/*$Query="select 7 as Query_num,
									count( d.id ) as Overall_applicants_marked_Present_for_Part
									from( 
									select (la.form_id) as id  from atif_career.log_career_form as la  
									left join atif_career.career_form as cfd on cfd.id = la.form_id
									where la.status_id=11 and la.stage_id =4 and cfd.form_source  IN('".implode("','", $formSourceFilter)."') 
									 group by la.form_id
									union
									select (l.id) as id  from atif_career.career_form as l 
									where l.status_id=11 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

									) as d";*/



									$Query="select 7 as Query_num,
													count( d.id ) as Overall_applicants_marked_Present_for_Part
													from( 
													select (l.form_id) as id  from atif_career.log_career_form as l  
													where l.status_id=11 and l.stage_id =4  
													union
													select (l.id) as id  from atif_career.career_form as l 
													where l.status_id=11 and l.form_source  IN('".implode("','", $formSourceFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

													) as d";

									}	

					


					//////////////////AKHAN ///////////////////////////////

						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){

									/*$Query=" select 7 as Query_num,
										count(distinct d.id ) as Overall_applicants_marked_Present_for_Part
										from( 
										select (l.form_id) as id  from atif_career.log_career_form as l  
										where l.status_id=11 and l.stage_id =4 and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
										

										) as d ";*/




										$Query="select 7 as Query_num,
													count( d.id ) as Overall_applicants_marked_Present_for_Part
													from( 
													select (l.form_id) as id  from atif_career.log_career_form as l  
													where l.status_id=11 and l.stage_id =4  
													union
													select (l.id) as id  from atif_career.career_form as l 
													where l.status_id=11  and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

													) as d";
									}	



									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $campusFilter !='null' && $campusFilter !=""){

									/*$Query=" select 7 as Query_num,
									count( d.id ) as Overall_applicants_marked_Present_for_Part
									from( 
									select (la.form_id) as id  from atif_career.log_career_form as la  
									left join atif_career.career_form_data as cfd on cfd.form_id = la.form_id
									where la.status_id=11 and la.stage_id =4 and  from_unixtime(la.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  
									and cfd.campus  IN('".implode("','", $campusFilter)."')  and from_unixtime(la.created ,'%Y-%m-%d') >= '2018-10-01' 
									 group by la.form_id 
								

									) as d ";*/


									$Query="select 7 as Query_num,
													count( d.id ) as Overall_applicants_marked_Present_for_Part
													from( 
													select (l.form_id) as id  from atif_career.log_career_form as l  
													where l.status_id=11 and l.stage_id =4  
													union
													select (l.id) as id  from atif_career.career_form as l 
													left join atif_career.career_form_data as cfd on cfd.form_id = l.id
													where l.status_id=11  and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
													and cfd.campus  IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

													) as d";
									}	


									if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" &&  $formSourceFilter !='null' && $formSourceFilter !=""){

									/*$Query=" select 7 as Query_num,
									count( d.id ) as Overall_applicants_marked_Present_for_Part
									from( 
									select (la.form_id) as id  from atif_career.log_career_form as la  
									left join atif_career.career_form as cfd on cfd.id = la.form_id
									where la.status_id=11 and la.stage_id =4 and  from_unixtime(la.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  
									and cfd.form_source  IN('".implode("','", $formSourceFilter)."')  and from_unixtime(la.created ,'%Y-%m-%d') >= '2018-10-01' 
									 group by la.form_id 
								

									) as d ";*/


									$Query="select 7 as Query_num,
													count( d.id ) as Overall_applicants_marked_Present_for_Part
													from( 
													select (l.form_id) as id  from atif_career.log_career_form as l  
													where l.status_id=11 and l.stage_id =4  
													union
													select (l.id) as id  from atif_career.career_form as l 
													where l.status_id=11  and  from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
													and l.form_source  IN('".implode("','", $formSourceFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

													) as d";
									}	

									

						$getfilter = DB::connection($this->dbCon)->select($Query);

						return $getfilter;




					}


		}