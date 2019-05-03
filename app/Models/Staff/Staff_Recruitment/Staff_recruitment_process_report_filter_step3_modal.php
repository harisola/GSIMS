<?php
namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class Staff_recruitment_process_report_filter_step3_modal extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_form';
    protected $dbCon = 'mysql_Career';


	//Arif Khan Work

	////////////////////////// Overall_applicant_moved_to_Regret_from_Formal_Interview/////////////////////////////////////

				public function Applicants_awaiting_for_Final_Consultation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){



					/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  dd.depart_id IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";
					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";

					}


					////////////////AKHAN ///////////////////////////////

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){	

							$Query="select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff ";
								}

								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								

							 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";
							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";
							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){


							 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')  order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";
							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							 $Query = "select 
									40 as Query_num, 
									sum(ff.Final_consultation_awaiting) as Final_consultation_awaiting
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1 )
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_consultation_awaiting
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5  and (
									case when d.date = '1970-01-01' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  >=  curdate() ) as ff";
							}



						$getStatus = DB::connection($this->dbCon)->select($Query);

						return $getStatus;

				}
				  	
				public function Overall_applicants_marked_Present_for_Final_Consultation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){


						/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' 
							  )  group by cf.form_id ) as d";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' 
							  )  group by cf.form_id ) as d";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."')  and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' 
							  )  group by cf.form_id ) as d";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' 
							  )  group by cf.form_id ) as d";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' 
							  )  group by cf.form_id ) as d";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						 $Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' 
							  )  group by cf.form_id ) as d";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						 $Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."')  and dd.tag IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' 
							  )  group by cf.form_id ) as d";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

						 $Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' 
							  )  group by cf.form_id ) as d";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						
 						$Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' 
							  )  group by cf.form_id ) as d";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						 $Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  )  and af.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01'
							  )  group by cf.form_id ) as d";

					}


					////////////////AKHAN ///////////////////////////////

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){
					$Query=" select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4)
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' and  from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							  )  group by cf.form_id ) as d";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

								

							 $Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' and  from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							  )  group by cf.form_id ) as d";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							$Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' and  from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							  )  group by cf.form_id ) as d";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){

							

							 	$Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' and  from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							  )  group by cf.form_id ) as d";

							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

								

							 $Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' and  from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
							  )  group by cf.form_id ) as d";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							  $Query = "select 41 as Query_num, 
							count( d.present_for_Final ) as present_for_Final  from (
							  
							  
							  select 
							 ( cf.id ) as present_for_Final 
							from atif_Career.log_career_form as cf 
							where cf.form_id in 

							(


							  select 


							af.id as career_id
							      
							      
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
							and dd.form_id= s.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')  order by dd.id desc limit 1)
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
							left join (
							select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
							from atif_career.log_career_form as lcf where  from_unixtime(lcf.modified ,'%Y-%m-%d') >= '2018-10-01'
							  order by lcf.created limit 1) as lcf on lcf.form_id = af.id

							WHERE af.id in (
							  
							    select 
							cf.form_id
							from atif_Career.log_career_form as cf 
							where cf.status_id=5
							and (cf.stage_id=4) 
							  
							  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' and  from_unixtime(af.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and af.form_source IN('".implode("','", $formSourceFilter)."')
							  )  group by cf.form_id ) as d";

							}

							

								$getStatus = DB::connection($this->dbCon)->select($Query);

								return $getStatus;

				}  


				public function Applicants_currently_in_Final_Consultation_awaiting_for_Next_Step_decision($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){


						/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						 $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5 
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						 $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5  
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						
 									$Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5 
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						 $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						 $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5 
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						 $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5  
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						 $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5 
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						 $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5 
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						 $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
										from (
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
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
										where f.status_id=5 
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						 $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5 and f.form_source IN('".implode("','", $formSourceFilter)."')
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

								

							  $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'
										) as f_data
										where f_data.p_date >= curdate() ";

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								

							  $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							  $Query = "select 
										42 as Query_num, 
										count( f_data.p_date ) as currently_in_Final 
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
										where f.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
										) as f_data
										where f_data.p_date >= curdate()";

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


					  $Query = "select 
								42 as Query_num, 
								count( f_data.p_date ) as currently_in_Final 
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
								where f.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								) as f_data
								where f_data.p_date >= curdate()";

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


					   $Query = "select 
								42 as Query_num, 
								count( f_data.p_date ) as currently_in_Final 
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
								where f.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' 
								) as f_data
								where f_data.p_date >= curdate()";

					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


					    $Query = "select 
								42 as Query_num, 
								count( f_data.p_date ) as currently_in_Final 
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
								where f.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."'  and f.form_source IN('".implode("','", $formSourceFilter)."')
								) as f_data
								where f_data.p_date >= curdate()";

					}

					$getStatus = DB::connection($this->dbCon)->select($Query);
					return $getStatus;

				}	


				public function Overall_applicant_moved_to_Regret_from_FInal_Consultation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

					////ZK ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
								47 as Query_num, 
								count( f_data.p_date ) as Final_Cons_To 
								from (
								select (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id 
								and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
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
								where (f.status_id=12 or f.status_id=10 )and d.status_id=5 ) as f_data
								where f_data.p_date >= curdate()";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

							$Query = "select 
								47 as Query_num,
								count( f.id ) as Final_Cons_To
								from atif_career.career_form as f left join atif_career.career_form_data as dd
							  on dd.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d 
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						 	$Query = "select 
								47 as Query_num,
								count( f.id ) as Final_Cons_To
								from atif_career.career_form as f left join atif_career.career_form_data as dd
							  on dd.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d 
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

							$Query = "select 
								47 as Query_num,
								count( f.id ) as Final_Cons_To
								from atif_career.career_form as f left join atif_career.career_form_data as dd
							  on dd.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d 
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and  dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

							$Query = "select 
								47 as Query_num,
								count( f.id ) as Final_Cons_To
								from atif_career.career_form as f left join atif_career.career_form_data as dd
							  on dd.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d 
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=5  and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						 	$Query = "select 
								47 as Query_num,
								count( f.id ) as Final_Cons_To
								from atif_career.career_form as f left join atif_career.career_form_data as dd
							  on dd.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d 
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and  dd.level_id IN('".implode("','", $designationFilter)."') and  dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						
							$Query = "select 
								47 as Query_num,
								count( f.id ) as Final_Cons_To
								from atif_career.career_form as f left join atif_career.career_form_data as dd
							  on dd.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d 
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=5  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						
								$Query = "select 
								47 as Query_num,
								count( f.id ) as Final_Cons_To
								from atif_career.career_form as f left join atif_career.career_form_data as dd
							  on dd.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d 
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						  $Query = "select 
								47 as Query_num,
								count( f.id ) as Final_Cons_To
								from atif_career.career_form as f left join atif_career.career_form_data as dd
							  on dd.form_id=f.id
								left join ( 
								select * from atif_career.log_career_form as lf where lf.id in(
								select max(l.id) as id
								from atif_career.log_career_form as l  group by l.form_id )
								) as d 
								on d.form_id = f.id
								where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						  $Query = "select 
											47 as Query_num,
											count( f.id ) as Final_Cons_To
											from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
											left join ( 
											select * from atif_career.log_career_form as lf where lf.id in(
											select max(l.id) as id
											from atif_career.log_career_form as l  group by l.form_id )
											) as d 
											on d.form_id = f.id
											where (f.status_id=12 or f.status_id=10 ) and d.status_id=5  and f.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					////////////////AKHAN ///////////////////////////////

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

						
					$Query="select 
							47 as Query_num,
							count( f.id ) as Final_Cons_To
							from atif_career.career_form as f
							left join ( 
							select * from atif_career.log_career_form as lf where lf.id in(
							select max(l.id) as id
							from atif_career.log_career_form as l  group by l.form_id )
							) as d
							on d.form_id = f.id
							where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
						}


						if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !=""){

								

							    $Query = "select 
											47 as Query_num,
											count( f.id ) as Final_Cons_To
											from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
											left join ( 
											select * from atif_career.log_career_form as lf where lf.id in(
											select max(l.id) as id
											from atif_career.log_career_form as l  group by l.form_id )
											) as d 
											on d.form_id = f.id
											where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							    $Query = "select 
											47 as Query_num,
											count( f.id ) as Final_Cons_To
											from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
											left join ( 
											select * from atif_career.log_career_form as lf where lf.id in(
											select max(l.id) as id
											from atif_career.log_career_form as l  group by l.form_id )
											) as d 
											on d.form_id = f.id
											where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							    $Query = "select 
											47 as Query_num,
											count( f.id ) as Final_Cons_To
											from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
											left join ( 
											select * from atif_career.log_career_form as lf where lf.id in(
											select max(l.id) as id
											from atif_career.log_career_form as l  group by l.form_id )
											) as d 
											on d.form_id = f.id
											where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){


							    $Query = "select 
											47 as Query_num,
											count( f.id ) as Final_Cons_To
											from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
											left join ( 
											select * from atif_career.log_career_form as lf where lf.id in(
											select max(l.id) as id
											from atif_career.log_career_form as l  group by l.form_id )
											) as d 
											on d.form_id = f.id
											where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							    $Query = "select 
											47 as Query_num,
											count( f.id ) as Final_Cons_To
											from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
											left join ( 
											select * from atif_career.log_career_form as lf where lf.id in(
											select max(l.id) as id
											from atif_career.log_career_form as l  group by l.form_id )
											) as d 
											on d.form_id = f.id
											where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
							}


							
					$getStatus = DB::connection($this->dbCon)->select($Query);
					return $getStatus;


				}

				public function Overall_applicants_moved_to_Followup_for_Final_Consultation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

						/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
								43 as Query_num, 
								sum(ff.Final_Cons_Presence) as Final_Cons_Presence

								from(
								select 
								curdate() as p_date,
								count( cf.id ) as Final_Cons_Presence
								from atif_Career.log_career_form as cf 
								where cf.status_id=5 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

								union
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
								else d.date
								end
								) as p_date,
								count( d.date ) as Final_Cons_Presence

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff ";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
								43 as Query_num, 
								sum(ff.Final_Cons_Presence) as Final_Cons_Presence

								from(
								select 
								curdate() as p_date,
								count( cf.id ) as Final_Cons_Presence
								from atif_Career.log_career_form as cf 
								where cf.status_id=5 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

								union
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
								else d.date
								end
								) as p_date,
								count( d.date ) as Final_Cons_Presence

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff ";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query = "select 
								43 as Query_num, 
								sum(ff.Final_Cons_Presence) as Final_Cons_Presence

								from(
								select 
								curdate() as p_date,
								count( cf.id ) as Final_Cons_Presence
								from atif_Career.log_career_form as cf 
								where cf.status_id=5 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

								union
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
								else d.date
								end
								) as p_date,
								count( d.date ) as Final_Cons_Presence

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff ";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query = "select 
								43 as Query_num, 
								sum(ff.Final_Cons_Presence) as Final_Cons_Presence

								from(
								select 
								curdate() as p_date,
								count( cf.id ) as Final_Cons_Presence
								from atif_Career.log_career_form as cf 
								where cf.status_id=5 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

								union
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
								else d.date
								end
								) as p_date,
								count( d.date ) as Final_Cons_Presence

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff ";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
								43 as Query_num, 
								sum(ff.Final_Cons_Presence) as Final_Cons_Presence

								from(
								select 
								curdate() as p_date,
								count( cf.id ) as Final_Cons_Presence
								from atif_Career.log_career_form as cf 
								where cf.status_id=5 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

								union
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
								else d.date
								end
								) as p_date,
								count( d.date ) as Final_Cons_Presence

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff ";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
								43 as Query_num, 
								sum(ff.Final_Cons_Presence) as Final_Cons_Presence

								from(
								select 
								curdate() as p_date,
								count( cf.id ) as Final_Cons_Presence
								from atif_Career.log_career_form as cf 
								where cf.status_id=5 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

								union
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
								else d.date
								end
								) as p_date,
								count( d.date ) as Final_Cons_Presence

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff ";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
								43 as Query_num, 
								sum(ff.Final_Cons_Presence) as Final_Cons_Presence

								from(
								select 
								curdate() as p_date,
								count( cf.id ) as Final_Cons_Presence
								from atif_Career.log_career_form as cf 
								where cf.status_id=5 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

								union
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
								else d.date
								end
								) as p_date,
								count( d.date ) as Final_Cons_Presence

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff ";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						$Query = "select 
								43 as Query_num, 
								sum(ff.Final_Cons_Presence) as Final_Cons_Presence

								from(
								select 
								curdate() as p_date,
								count( cf.id ) as Final_Cons_Presence
								from atif_Career.log_career_form as cf 
								where cf.status_id=5 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

								union
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
								else d.date
								end
								) as p_date,
								count( d.date ) as Final_Cons_Presence

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff ";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query = "select 
								43 as Query_num, 
								sum(ff.Final_Cons_Presence) as Final_Cons_Presence

								from(
								select 
								curdate() as p_date,
								count( cf.id ) as Final_Cons_Presence
								from atif_Career.log_career_form as cf 
								where cf.status_id=5 
								and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

								union
								select 
								(
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
								else d.date
								end
								) as p_date,
								count( d.date ) as Final_Cons_Presence

								from atif_career.career_form as f
								left outer join (
								select * from atif_career.career_form_data as s where s.id in(
								select 
								max( cf.id ) as latest
								from atif_career.career_form_data as cf 
								group by cf.form_id )
								) as d on d.form_id = f.id
								where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
								case when d.date = '1970-01-01' then 
								(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
								else d.date
								end
								)  < curdate()
								) as ff ";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 
									43 as Query_num, 
									sum(ff.Final_Cons_Presence) as Final_Cons_Presence

									from(
									select 
									curdate() as p_date,
									count( cf.id ) as Final_Cons_Presence
									from atif_Career.log_career_form as cf 
									where cf.status_id=5 
									and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

									union
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
									else d.date
									end
									) as p_date,
									count( d.date ) as Final_Cons_Presence

									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  < curdate()
									) as ff ";

					}


					/////AKHAN ///////////////////////////////



					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){

							  $Query = "select 
											43 as Query_num, 
											sum(ff.Final_Cons_Presence) as Final_Cons_Presence

											from(
											select 
											curdate() as p_date,
											count( cf.id ) as Final_Cons_Presence
											from atif_Career.log_career_form as cf 
											where cf.status_id=5 
											and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

											union
											select 
											(
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
											else d.date
											end
											) as p_date,
											count( d.date ) as Final_Cons_Presence

											from atif_career.career_form as f
											left outer join (
											select * from atif_career.career_form_data as s where s.id in(
											select 
											max( cf.id ) as latest
											from atif_career.career_form_data as cf 
											group by cf.form_id )
											) as d on d.form_id = f.id
											where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' order by dd.id desc limit 1)
											else d.date
											end
											)  < curdate()
											) as ff ";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								

							    $Query = "select 
											43 as Query_num, 
											sum(ff.Final_Cons_Presence) as Final_Cons_Presence

											from(
											select 
											curdate() as p_date,
											count( cf.id ) as Final_Cons_Presence
											from atif_Career.log_career_form as cf 
											where cf.status_id=5 
											and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

											union
											select 
											(
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
											else d.date
											end
											) as p_date,
											count( d.date ) as Final_Cons_Presence

											from atif_career.career_form as f
											left outer join (
											select * from atif_career.career_form_data as s where s.id in(
											select 
											max( cf.id ) as latest
											from atif_career.career_form_data as cf 
											group by cf.form_id )
											) as d on d.form_id = f.id
											where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
											else d.date
											end
											)  < curdate()
											) as ff ";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							    $Query = "select 
											43 as Query_num, 
											sum(ff.Final_Cons_Presence) as Final_Cons_Presence

											from(
											select 
											curdate() as p_date,
											count( cf.id ) as Final_Cons_Presence
											from atif_Career.log_career_form as cf 
											where cf.status_id=5 
											and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

											union
											select 
											(
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
											else d.date
											end
											) as p_date,
											count( d.date ) as Final_Cons_Presence

											from atif_career.career_form as f
											left outer join (
											select * from atif_career.career_form_data as s where s.id in(
											select 
											max( cf.id ) as latest
											from atif_career.career_form_data as cf 
											group by cf.form_id )
											) as d on d.form_id = f.id
											where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  order by dd.id desc limit 1)
											else d.date
											end
											)  < curdate()
											) as ff";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							    $Query = "select 
											43 as Query_num, 
											sum(ff.Final_Cons_Presence) as Final_Cons_Presence

											from(
											select 
											curdate() as p_date,
											count( cf.id ) as Final_Cons_Presence
											from atif_Career.log_career_form as cf 
											where cf.status_id=5 
											and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

											union
											select 
											(
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
											else d.date
											end
											) as p_date,
											count( d.date ) as Final_Cons_Presence

											from atif_career.career_form as f
											left outer join (
											select * from atif_career.career_form_data as s where s.id in(
											select 
											max( cf.id ) as latest
											from atif_career.career_form_data as cf 
											group by cf.form_id )
											) as d on d.form_id = f.id
											where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."')  order by dd.id desc limit 1)
											else d.date
											end
											)  < curdate()
											) as ff";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							    $Query = "select 
											43 as Query_num, 
											sum(ff.Final_Cons_Presence) as Final_Cons_Presence

											from(
											select 
											curdate() as p_date,
											count( cf.id ) as Final_Cons_Presence
											from atif_Career.log_career_form as cf 
											where cf.status_id=5 
											and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

											union
											select 
											(
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
											else d.date
											end
											) as p_date,
											count( d.date ) as Final_Cons_Presence

											from atif_career.career_form as f
											left outer join (
											select * from atif_career.career_form_data as s where s.id in(
											select 
											max( cf.id ) as latest
											from atif_career.career_form_data as cf 
											group by cf.form_id )
											) as d on d.form_id = f.id
											where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')  order by dd.id desc limit 1)
											else d.date
											end
											)  < curdate()
											) as ff";
							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							    $Query = "select 
											43 as Query_num, 
											sum(ff.Final_Cons_Presence) as Final_Cons_Presence

											from(
											select 
											curdate() as p_date,
											count( cf.id ) as Final_Cons_Presence
											from atif_Career.log_career_form as cf 
											where cf.status_id=5 
											and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

											union
											select 
											(
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
											else d.date
											end
											) as p_date,
											count( d.date ) as Final_Cons_Presence

											from atif_career.career_form as f
											left outer join (
											select * from atif_career.career_form_data as s where s.id in(
											select 
											max( cf.id ) as latest
											from atif_career.career_form_data as cf 
											group by cf.form_id )
											) as d on d.form_id = f.id
											where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
											else d.date
											end
											)  < curdate()
											) as ff";
							}

							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;
						}



						public function recenntly_in_Followup_for_F_first($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){


								/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){




						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')   order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

					}


					/////AKHAN ///////////////////////////////

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							$Query="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";

								}



								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

								

								$Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff";


								}


								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


								 $Query ="select 
									44 as Query_num, 
									sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
									from(
									select 
									(
									case when d.date = '1970-01-01' then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
									and dd.form_id= d.form_id order by dd.id desc limit 1)
									else d.date
									end
									) as p_date,
									count( d.date ) as recenntly_in_Followup_for_F1
									from atif_career.career_form as f
									left outer join (
									select * from atif_career.career_form_data as s where s.id in(
									select 
									max( cf.id ) as latest
									from atif_career.career_form_data as cf 
									group by cf.form_id )
									) as d on d.form_id = f.id
									where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
									case when d.date = '1970-01-01'  then 
									(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
									else d.date
									end
									)  <  curdate() ) as ff"; 



								}



								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !="" ){


							    $Query = "select 
											44 as Query_num, 
											sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
											from(
											select 
											(
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
											and dd.form_id= d.form_id order by dd.id desc limit 1)
											else d.date
											end
											) as p_date,
											count( d.date ) as recenntly_in_Followup_for_F1
											from atif_career.career_form as f
											left outer join (
											select * from atif_career.career_form_data as s where s.id in(
											select 
											max( cf.id ) as latest
											from atif_career.career_form_data as cf 
											group by cf.form_id )
											) as d on d.form_id = f.id
											where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
											case when d.date = '1970-01-01'  then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
											else d.date
											end
											)  <  curdate() ) as ff";

								}


								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){


							    $Query = "select 
											44 as Query_num, 
											sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
											from(
											select 
											(
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
											and dd.form_id= d.form_id order by dd.id desc limit 1)
											else d.date
											end
											) as p_date,
											count( d.date ) as recenntly_in_Followup_for_F1
											from atif_career.career_form as f
											left outer join (
											select * from atif_career.career_form_data as s where s.id in(
											select 
											max( cf.id ) as latest
											from atif_career.career_form_data as cf 
											group by cf.form_id )
											) as d on d.form_id = f.id
											where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
											case when d.date = '1970-01-01'  then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
											else d.date
											end
											)  <  curdate() ) as ff";

								}


								if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							    $Query = "select 
											44 as Query_num, 
											sum(ff.recenntly_in_Followup_for_F1) as recenntly_in_Followup_for_F1
											from(
											select 
											(
											case when d.date = '1970-01-01' then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
											and dd.form_id= d.form_id order by dd.id desc limit 1)
											else d.date
											end
											) as p_date,
											count( d.date ) as recenntly_in_Followup_for_F1
											from atif_career.career_form as f
											left outer join (
											select * from atif_career.career_form_data as s where s.id in(
											select 
											max( cf.id ) as latest
											from atif_career.career_form_data as cf 
											group by cf.form_id )
											) as d on d.form_id = f.id
											where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
											case when d.date = '1970-01-01'  then 
											(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
											else d.date
											end
											)  <  curdate() ) as ff";

								}

							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;


						}

						public function Applicants_currently_in_Followup_for_Final_Consultation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

								/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  dd.depart_id IN('".implode("','", $departmentFilter)."') and  dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')  order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

					}


					/////AKHAN ///////////////////////////////



							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

							  $Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";

							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

							

							    $Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){


							    $Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){


							    $Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){


							    $Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";
							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){


							    $Query = "select 
										44 as Query_num, 
										sum(ff.recenntly_in_Followup_for_F) as recenntly_in_Followup_for_F
										from(
										select 
										(
										case when d.date = '1970-01-01' then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
										and dd.form_id= d.form_id order by dd.id desc limit 1)
										else d.date
										end
										) as p_date,
										count( d.date ) as recenntly_in_Followup_for_F
										from atif_career.career_form as f
										left outer join (
										select * from atif_career.career_form_data as s where s.id in(
										select 
										max( cf.id ) as latest
										from atif_career.career_form_data as cf 
										group by cf.form_id )
										) as d on d.form_id = f.id
										where f.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
										case when d.date = '1970-01-01'  then 
										(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id and  from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."') order by dd.id desc limit 1)
										else d.date
										end
										)  <  curdate() ) as ff";
							}



							
							$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;

				}



			 public function Overall_applicants_given_extension_from_Followup_focresence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

			 		/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13  and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13  and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					


					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}




					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13  and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						 $Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						$Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

						$Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13  and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}



					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}



					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 
								48 as Query_num,
								count( l.id ) as Followup_Extension
								from atif_career.career_form as l left join atif_career.career_form_data as dd
								  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and  l.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";

					}


					/////AKHAN ///////////////////////////////




			 	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

								
							    $Query = "select 
										48 as Query_num,
										count( l.id ) as Followup_Extension
										from atif_career.career_form as l where l.status_id=5 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
							}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){
					
								
							    $Query = "select 
										48 as Query_num,
										count( l.id ) as Followup_Extension
										from atif_career.career_form as l left join atif_career.career_form_data as dd
										  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
							}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){


							    $Query = "select 
										48 as Query_num,
										count( l.id ) as Followup_Extension
										from atif_career.career_form as l left join atif_career.career_form_data as dd
										  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
							}


							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){

							    $Query = "select 
										48 as Query_num,
										count( l.id ) as Followup_Extension
										from atif_career.career_form as l left join atif_career.career_form_data as dd
										  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !=""){

							    $Query = "select 
										48 as Query_num,
										count( l.id ) as Followup_Extension
										from atif_career.career_form as l left join atif_career.career_form_data as dd
										  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
							}

							if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

							    $Query = "select 
										48 as Query_num,
									  count( l.id ) as Followup_Extension
									  from atif_career.career_form as l left join atif_career.career_form_data as dd
									  on dd.form_id=l.id where l.status_id=5 and l.stage_id=13 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and l.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
						}



			 	$getStatus = DB::connection($this->dbCon)->select($Query);

							return $getStatus;

			 }


			public function Overall_applicants_moved_to_Not_Interested_from_Followup_for_Final_Consultation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){


			 		/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						$Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and  dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}

					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						$Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and  dd.depart_id IN('".implode("','", $departmentFilter)."') and  dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						$Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						$Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and  dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						 $Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						 $Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and  dd.depart_id IN('".implode("','", $departmentFilter)."') and  dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						
							$Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						$Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and  dd.level_id IN('".implode("','", $designationFilter)."')  and  dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						$Query = "select 
								46 as Query_num,
								count( l.id ) as Consultation_presence
								from atif_career.career_form as l left join atif_career.career_form_data as dd
							  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and  l.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";

					}
					/////AKHAN //////////////////////////////
		 			if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !=""){

						
						    $Query = "select 
										46 as Query_num,
										count( l.id ) as Consultation_presence
										from atif_career.career_form as l where l.status_id=5 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01' ";
					
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

							
						    $Query = "select 
										46 as Query_num,
										count( l.id ) as Consultation_presence
										from atif_career.career_form as l left join atif_career.career_form_data as dd
									  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  ";
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" ){

						    $Query = "select 
										46 as Query_num,
										count( l.id ) as Consultation_presence
										from atif_career.career_form as l left join atif_career.career_form_data as dd
									  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  ){

					
						    $Query = " select 
										46 as Query_num,
										count( l.id ) as Consultation_presence
										from atif_career.career_form as l left join atif_career.career_form_data as dd
									  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

						    $Query = " select 
										46 as Query_num,
										count( l.id ) as Consultation_presence
										from atif_career.career_form as l left join atif_career.career_form_data as dd
									  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."')  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

						    $Query = "select 
										46 as Query_num,
										count( l.id ) as Consultation_presence
										from atif_career.career_form as l left join atif_career.career_form_data as dd
									  on dd.form_id=l.id where l.status_id=5 and l.stage_id=6 and from_unixtime(l.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and l.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					$getStatus = DB::connection($this->dbCon)->select($Query);
					return $getStatus;


			}


			public function Overall_applicants_moved_to_Not_Interested_from_Final_Consultation_Communication($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

			 		/////AKHAN ///////////////////////////////
				  	if( $departmentFilter !='null' && $departmentFilter !=""){
						$departmentFilter = explode(",", $departmentFilter);

						 $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5  and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $subjectFilter !='null' && $subjectFilter !=""){
						$subjectFilter = explode(",", $subjectFilter);

						 $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						  $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $designationFilter !='null' && $designationFilter !=""){
						$designationFilter = explode(",", $designationFilter);

						 $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $campusFilter !='null' && $campusFilter !=""){
						$campusFilter = explode(",", $campusFilter);

						 $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						  $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

						  $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

					 $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

						  $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

					if( $formSourceFilter !='null' && $formSourceFilter !=""){
						$formSourceFilter = explode(",", $formSourceFilter);

						 $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and f.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					}

			 		if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){

							
							    $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f 
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

				
					    $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

					    $Query = "select 
										47 as Query_num,
										count( f.id ) as final_communication_moved
										from atif_career.career_form as f left join atif_career.career_form_data as dd
										  on dd.form_id=f.id
										left join ( 
										select * from atif_career.log_career_form as lf where lf.id in(
										select max(l.id) as id
										from atif_career.log_career_form as l  group by l.form_id )
										) as d
										on d.form_id = f.id
										where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

						    $Query = "select 
											47 as Query_num,
											count( f.id ) as final_communication_moved
											from atif_career.career_form as f left join atif_career.career_form_data as dd
											  on dd.form_id=f.id
											left join ( 
											select * from atif_career.log_career_form as lf where lf.id in(
											select max(l.id) as id
											from atif_career.log_career_form as l  group by l.form_id )
											) as d
											on d.form_id = f.id
											where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

						    $Query = "select 
											47 as Query_num,
											count( f.id ) as final_communication_moved
											from atif_career.career_form as f left join atif_career.career_form_data as dd
											  on dd.form_id=f.id
											left join ( 
											select * from atif_career.log_career_form as lf where lf.id in(
											select max(l.id) as id
											from atif_career.log_career_form as l  group by l.form_id )
											) as d
											on d.form_id = f.id
											where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

					if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

						    $Query = "select 
											47 as Query_num,
											count( f.id ) as final_communication_moved
											from atif_career.career_form as f left join atif_career.career_form_data as dd
											  on dd.form_id=f.id
											left join ( 
											select * from atif_career.log_career_form as lf where lf.id in(
											select max(l.id) as id
											from atif_career.log_career_form as l  group by l.form_id )
											) as d
											on d.form_id = f.id
											where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					}

			 		$getStatus = DB::connection($this->dbCon)->select($Query);
					return $getStatus;


			}

			// ZK
			public function Applicants_moved_to_Offer_Preparation_from_Final_Consultation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter){

			 		// zk
				 //  	if( $departmentFilter !='null' && $departmentFilter !=""){
					// 	$departmentFilter = explode(",", $departmentFilter);

					// 	 $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as Overall_Offer_Prep_Allocation
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5  and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					// }

					// if( $subjectFilter !='null' && $subjectFilter !=""){
					// 	$subjectFilter = explode(",", $subjectFilter);

					// 	 $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					// }

					// if( $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

					// 	  $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					// }

					// if( $designationFilter !='null' && $designationFilter !=""){
					// 	$designationFilter = explode(",", $designationFilter);

					// 	 $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					// }

					// if( $campusFilter !='null' && $campusFilter !=""){
					// 	$campusFilter = explode(",", $campusFilter);

					// 	 $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					// }

					// if( $designationFilter !='null' && $designationFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

					// 	  $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					// }

					// if( $departmentFilter !='null' && $departmentFilter !="" && $campusFilter !='null' && $campusFilter !=""){

						

					// 	  $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					// }

					// if( $designationFilter !='null' && $designationFilter !="" && $departmentFilter !='null' && $departmentFilter !=""){

						

					//  $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					// }

					// if( $designationFilter !='null' && $designationFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

						

					// 	  $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and dd.level_id IN('".implode("','", $designationFilter)."')  and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					// }

					// if( $formSourceFilter !='null' && $formSourceFilter !=""){
					// 	$formSourceFilter = explode(",", $formSourceFilter);

					// 	 $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and f.form_source IN('".implode("','", $formSourceFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";

					// }

			 	// 	if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" ){

							
					// 		    $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f 
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					// }

					// if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" ){

				
					//     $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					// }

					// if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !=""){

					//     $Query = "select 
					// 					47 as Query_num,
					// 					count( f.id ) as final_communication_moved
					// 					from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 					  on dd.form_id=f.id
					// 					left join ( 
					// 					select * from atif_career.log_career_form as lf where lf.id in(
					// 					select max(l.id) as id
					// 					from atif_career.log_career_form as l  group by l.form_id )
					// 					) as d
					// 					on d.form_id = f.id
					// 					where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					// }

					// if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""){

					// 	    $Query = "select 
					// 						47 as Query_num,
					// 						count( f.id ) as final_communication_moved
					// 						from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 						  on dd.form_id=f.id
					// 						left join ( 
					// 						select * from atif_career.log_career_form as lf where lf.id in(
					// 						select max(l.id) as id
					// 						from atif_career.log_career_form as l  group by l.form_id )
					// 						) as d
					// 						on d.form_id = f.id
					// 						where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					// }

					// if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" ){

					// 	    $Query = "select 
					// 						47 as Query_num,
					// 						count( f.id ) as final_communication_moved
					// 						from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 						  on dd.form_id=f.id
					// 						left join ( 
					// 						select * from atif_career.log_career_form as lf where lf.id in(
					// 						select max(l.id) as id
					// 						from atif_career.log_career_form as l  group by l.form_id )
					// 						) as d
					// 						on d.form_id = f.id
					// 						where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					// }

					// if($date_1 !='null' && $date_1 !="" && $date_2 !='null' && $date_2 !="" && $departmentFilter !='null' && $departmentFilter !="" && $subjectFilter !='null' && $subjectFilter !="" && $designationFilter !='null' && $designationFilter !=""  && $campusFilter !='null' && $campusFilter !="" && $formSourceFilter !='null' && $formSourceFilter !=""){

					// 	    $Query = "select 
					// 						47 as Query_num,
					// 						count( f.id ) as final_communication_moved
					// 						from atif_career.career_form as f left join atif_career.career_form_data as dd
					// 						  on dd.form_id=f.id
					// 						left join ( 
					// 						select * from atif_career.log_career_form as lf where lf.id in(
					// 						select max(l.id) as id
					// 						from atif_career.log_career_form as l  group by l.form_id )
					// 						) as d
					// 						on d.form_id = f.id
					// 						where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created, '%Y-%m-%d') between  '".$date_1."' and '".$date_2."' and dd.depart_id IN('".implode("','", $departmentFilter)."') and dd.tag IN('".implode("','", $subjectFilter)."') and dd.level_id IN('".implode("','", $designationFilter)."') and dd.campus IN('".implode("','", $campusFilter)."') and f.form_source IN('".implode("','", $formSourceFilter)."')  and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'";
					// }

			 		$getStatus = DB::connection($this->dbCon)->select($Query);
					return $getStatus;


			}

}