<?php
namespace App\Models\Staff\Staff_Recruitment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class Staff_recruitment_report_modal extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'career_form_data';
    protected $dbCon = 'mysql_Career';


 /**********************************************************************
    * Calling Career Forms
    * 
    * @output: 	All career forms as object
    ***********************************************************************/
  
 				public function filter_report_data_online_screening($date_1,$date_2){

					$query = "select COUNT(a.created) as online_screening_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d')= curdate() and a.status_id ='13'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
				}
			

				public function filter_report_data_call_for_part_b($date_1,$date_2){

					$query = "select COUNT(a.created) as call_for_part_b_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') = curdate() and a.status_id ='11'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
				}


				public function filter_report_data_full_screening($date_1,$date_2){

					$query = "select COUNT(a.created) as full_screening_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') = curdate() and a.status_id ='1'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
				}



				public function filter_report_data_call_b_followup($date_1,$date_2){

					$query = "select COUNT(a.created) as follow_up_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') = curdate() and a.status_id ='11' and a.stage_id ='5'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
				}
	


				/*public function filter_report_data_online_screening($date_1,$date_2){

					$query = "select COUNT(a.created) as online_screening_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') between '".$date_1."' and '".$date_2."' and a.status_id ='13'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
				}
			

				public function filter_report_data_call_for_part_b($date_1,$date_2){

					$query = "select COUNT(a.created) as call_for_part_b_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') between '".$date_1."' and '".$date_2."' and a.status_id ='11'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
				}


				public function filter_report_data_full_screening($date_1,$date_2){

					$query = "select COUNT(a.created) as full_screening_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') between '".$date_1."' and '".$date_2."' and a.status_id ='1'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
				}



				public function filter_report_data_call_b_followup($date_1,$date_2){

					$query = "select COUNT(a.created) as follow_up_dates
						from career_form_data as a 
						where from_unixtime(a.created, '%Y-%m-%d') between '".$date_1."' and '".$date_2."' and a.status_id ='11' and a.stage_id ='5'
						";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
				}*/


				public function all_departments(){

					$query = "select * from career_dept";

					$depart = DB::connection($this->dbCon)->select($query);
						
					return $depart;



				}

				public function all_designations(){

					$query = "select * from career_level";

					 $level = DB::connection($this->dbCon)->select($query);
					
					return $level;

				}


				public function all_subjects(){

					$query = "select * from career_tag";

					 $subjects = DB::connection($this->dbCon)->select($query);
					
					return $subjects;

				}


				public function filter_report_data_departs($departs){


					if(isset($departs)&& !empty($departs) && $departs!='null' && $departs!=''){


					$departs = explode(",", $departs);
					$query1 = "select a.depart_id,d.id,d.departments,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
	 

					FROM `career_form_data` as a 
					left join career_dept as d on a.depart_id = d.id 
					where a.depart_id IN('".implode("','", $departs)."') GROUP BY d.id  ";

					$filter = DB::connection($this->dbCon)->select($query1);
					
					return $filter;

					}

					 
				}

				public function filter_report_data_subjects($subjects){

					if(isset($subjects)&& !empty($subjects) && $subjects!='null' && $subjects!=''){
						$subjects = explode(",", $subjects);

				 	 $query ="select a.tag,a.depart_id,d.id,d.departments,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					FROM `career_form_data` as a 
					left join career_dept as d on a.depart_id = d.id 
					where a.tag  IN('".implode("','", $subjects)."') GROUP BY d.id";

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

					}

				}

				public function filter_report_data_departs_subjects($departs,$subjects){

				
					$subjects = explode(",", $subjects);
					$departs = explode(",", $departs);
					
					 $query = "select a.tag,a.depart_id,d.id,d.departments,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 FROM `career_form_data` as a 
					 left join career_dept as d on a.depart_id = d.id  
					 where  a.tag IN('".implode("','", $subjects)."') 
					 AND  a.depart_id IN('".implode("','", $departs)."') 
					 And a.status_id = 2 GROUP BY d.id" ;  
					$filter = DB::connection($this->dbCon)->select($query);

					return $filter;

									
				}
			

				public function filter_report_data_departs_dates($date_depart1,$date_depart2){

					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' and '".$date_depart2."' GROUP BY d.id
						";
					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

									
				}



				public function filter_report_data_departs_dates1($date_depart1){

					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where from_unixtime(a.created, '%Y-%m-%d') = '".$date_depart1."'  GROUP BY d.id
						";
					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

									
			}


			public function filter_report_data_departs_dates_depart($date_depart1,$date_depart2,$departs){

					$departs = explode(",", $departs);
					
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' and '".$date_depart2."' AND a.depart_id IN('".implode("','", $departs)."') GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

									
			}

			public function filter_report_data_departs_dates_depart_all($date_depart1,$date_depart2,$departs,$subjects){

					$subjects = explode(",", $subjects);
					$departs = explode(",", $departs);
					
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' and '".$date_depart2."' AND a.depart_id IN('".implode("','", $departs)."')  AND  a.depart_id IN('".implode("','", $departs)."')  GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

									
				}

			public function filter_report_data_departs_dates_depart_desig($designations){

					
					 $designations = explode(",", $designations);
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,a.level_id,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where  a.level_id IN('".implode("','", $designations)."')   GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

									
			}



			public function filter_report_data_departs_dates_depart_campus($campus){

					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,a.campus,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where  a.campus = ".$campus." GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

									
			}

			public function filter_report_data_departs_dates_depart_status($Onlinew){

					 $query = "select a.depart_id,d.id,d.departments,a.form_id,fm.id,fm.form_source,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 left join career_form as fm on a.form_id = fm.id
					 where  fm.form_source = ".$Onlinew." GROUP BY d.id
					 ";
					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

			}


			public function filter_report_data_departs_dates_depart_all_compus($departs,$subjects,$campus){

					$subjects = explode(",", $subjects);
					$departs = explode(",", $departs);
					
					 //$designations = explode(",", $designations);
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,a.level_id,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where  a.depart_id IN('".implode("','", $departs)."') AND  a.tag IN('".implode("','", $subjects)."') AND a.campus = ".$campus." GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
			}


			public function filter_report_data_departs_dates_depart_all_compus_desig($departs,$subjects,$campus,$designations){

					 $subjects = explode(",", $subjects);
					 $departs = explode(",", $departs);
					
					 $designations = explode(",", $designations);
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,a.level_id,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where  a.depart_id IN('".implode("','", $departs)."') AND  a.tag IN('".implode("','", $subjects)."') AND a.campus = ".$campus." AND  a.level_id IN('".implode("','", $designations)."') GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
			}


			public function filter_report_data_departs_dates_depart_compus_desig($departs,$designations,$campus){

					$departs = explode(",", $departs);
					
					 $designations = explode(",", $designations);
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,a.level_id,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where  a.depart_id IN('".implode("','", $departs)."') AND  a.level_id IN('".implode("','", $designations)."') AND  a.campus = ".$campus."  GROUP BY d.id
						";
					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
			}


			public function filter_report_data_departs_dates_campus_online($date_depart1,$date_depart2,$campus,$Onlinew){

				 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,fm.id,fm.form_source,
				 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
				 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
				 SUM(if( a.status_id=4,1,0 )) as Observation,
				 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
				 SUM(if( a.status_id=6,1,0 )) as Offer,
				 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
				 SUM(if( a.status_id=10,1,0 )) as Archive,
				 SUM(if( a.status_id=12,1,0 )) as Regret,
				 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

				 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
				 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
				 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
				 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
				 

				 from career_form_data as a  left join career_dept as d on a.depart_id = d.id left join career_form as fm on a.form_id = fm.id
				 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' AND '".$date_depart2."' AND  a.campus = ".$campus." AND fm.form_source = ".$Onlinew."  GROUP BY d.id
					";
				

				$filter = DB::connection($this->dbCon)->select($query);
				
				return $filter;

			}


				public function filter_report_data_departs_dates_campus_online_desig_subject_all($date_depart1,$date_depart2,$departs,$subjects,$designations,$campus,$Onlinew){

					$subjects = explode(",", $subjects);
					$departs = explode(",", $departs);
					$designations = explode(",", $designations);
					
					  $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,fm.id,fm.form_source,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id left join career_form as fm on a.form_id = fm.id
					 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' and '".$date_depart2."' AND a.depart_id IN('".implode("','", $departs)."') AND  a.tag IN('".implode("','", $subjects)."') AND  a.level_id IN('".implode("','", $designations)."') AND a.campus = ".$campus." and fm.form_source = ".$Onlinew." GROUP BY d.id
						";
					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

				}

				public function filter_report_data_departs_dates_campus_subject_all($date_depart1,$date_depart2,$subjects,$campus){

					$subjects = explode(",", $subjects);
					
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id 
					 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' and '".$date_depart2."' AND  a.campus = ".$campus." AND  a.tag IN('".implode("','", $subjects)."')  GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

				}
		
		public function filter_report_data_departs_dates_campus_all($date_depart1,$date_depart2,$campus){
					
			 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
			 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
			 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
			 SUM(if( a.status_id=4,1,0 )) as Observation,
			 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
			 SUM(if( a.status_id=6,1,0 )) as Offer,
			 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
			 SUM(if( a.status_id=10,1,0 )) as Archive,
			 SUM(if( a.status_id=12,1,0 )) as Regret,
			 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

			 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
			 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
			 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
			 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
			 

			 from career_form_data as a  left join career_dept as d on a.depart_id = d.id 
			 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' and '".$date_depart2."' AND  a.campus = ".$campus." GROUP BY d.id
				";
			
			$filter = DB::connection($this->dbCon)->select($query);
			
			return $filter;
					}


		public function filter_report_data_departs_dates_subject_all($date_depart1,$date_depart2,$subjects){


			$subjects = explode(",", $subjects);


		  	 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id 
					 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' and '".$date_depart2."'AND  a.tag IN('".implode("','", $subjects)."')  GROUP BY d.id
						";
					
					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
		}



			public function filter_report_data_departs_dates_desig_all($date_depart1,$date_depart2,$designations){


				$designations = explode(",", $designations);


				 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id 
					 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' and '".$date_depart2."'AND  a.level_id IN('".implode("','", $designations)."')  GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

			}


			public function filter_report_data_subjects_campus_all($campus,$subjects){

					$subjects = explode(",", $subjects);
					
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id 
					 where a.tag IN('".implode("','", $subjects)."') AND a.campus = ".$campus." GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

			}


				public function filter_report_data_departs_dates_desig_subjects_all($date_depart1,$date_depart2,$departs,$subjects,$designations){
					$subjects = explode(",", $subjects);
					$departs = explode(",", $departs);
					$designations = explode(",", $designations);
					
					echo $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id 
					 where from_unixtime(a.created, '%Y-%m-%d') between '".$date_depart1."' and '".$date_depart2."' AND a.depart_id IN('".implode("','", $departs)."') AND  a.tag IN('".implode("','", $subjects)."') AND  a.level_id IN('".implode("','", $designations)."') GROUP BY d.id
						";
				

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

			}


				public function filter_report_subjects_desig_subjects_all($designations,$subjects,$departs){

					$subjects = explode(",", $subjects);
					$departs = explode(",", $departs);
					$designations = explode(",", $designations);
					
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id 
					 where a.depart_id IN('".implode("','", $departs)."') AND  a.tag IN('".implode("','", $subjects)."') AND  a.level_id IN('".implode("','", $designations)."') GROUP BY d.id
						";
						$filter = DB::connection($this->dbCon)->select($query);
						return $filter;
					}



				public function filter_report_data_depart_compus($departs,$campus){

					$departs = explode(",", $departs);
					
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id 
					 where  a.depart_id IN('".implode("','", $departs)."') AND a.campus = ".$campus."  GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

					}


				public function filter_report_data_depart_online($departs,$Onlinew){


					$departs = explode(",", $departs);
					
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,fm.id,fm.form_source,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id left join career_form as fm on a.form_id = fm.id where a.depart_id IN('".implode("','", $departs)."') AND fm.form_source = ".$Onlinew."  GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
				}

				 public function filter_report_data_campus_online($Onlinew,$campus){

					$query = "select a.tag,a.depart_id,d.id,d.departments,a.created,fm.id,fm.form_source,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id left join career_form as fm on a.form_id = fm.id where a.campus = ".$campus." AND fm.form_source = ".$Onlinew."  GROUP BY d.id
						";

						$filter = DB::connection($this->dbCon)->select($query);
					
							return $filter;

				}

				public function filter_report_data_campus_online_depart($departs,$campus,$Onlinew){


					$departs = explode(",", $departs);

					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,fm.id,fm.form_source,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

				 from career_form_data as a  left join career_dept as d on a.depart_id = d.id left join career_form as fm on a.form_id = fm.id where a.depart_id IN('".implode("','", $departs)."') AND a.campus = ".$campus." AND fm.form_source = ".$Onlinew."  GROUP BY d.id
						";
						
						$filter = DB::connection($this->dbCon)->select($query);
					
							return $filter;
						}



					public function filter_report_data_subjects_compus($subjects,$campus){


					 $subjects = explode(",", $subjects);
					
					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id 
					 where  a.tag IN('".implode("','", $subjects)."') AND a.campus = ".$campus." and from_unixtime(a.created ,'%Y-%m-%d') >= '2018-10-01' GROUP BY d.id
						";
					

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

					}


					public function filter_report_data_departs_dates_depart_null(){

					 $query = "select a.depart_id,d.id,d.departments,a.form_id,fm.id,fm.form_source,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 

					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 left join career_form as fm on a.form_id = fm.id and from_unixtime(a.created ,'%Y-%m-%d') >= '2018-10-01' 
					 GROUP BY d.id
						";
					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;

									
			}


			/*public function filter_report_data_today($date_2,$status_id_curr){


					 $query = "select a.tag,a.depart_id,d.id,d.departments,a.created,
					 SUM(if( a.status_id=2,1,0 )) as Initial_Interview,
					 SUM(if( a.status_id=3,1,0 )) as Formal_Interview,
					 SUM(if( a.status_id=4,1,0 )) as Observation,
					 SUM(if( a.status_id=5,1,0 )) as Final_Consultation,
					 SUM(if( a.status_id=6,1,0 )) as Offer,
					 SUM(if( a.status_id=7,1,0 )) as Offer_Confirmation,
					 SUM(if( a.status_id=10,1,0 )) as Archive,
					 SUM(if( a.status_id=12,1,0 )) as Regret,
					 SUM(if( a.status_id=15,1,0 )) as Not_Interested,

					 SUM(if( a.status_id=3 && a.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
					 SUM(if( a.status_id=4 && a.stage_id=5 ,1,0)) as Observation_Follow_Up,
					 SUM(if( a.status_id=5 && a.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
					 SUM(if( a.status_id=7 && a.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up
					 
					 from career_form_data as a  left join career_dept as d on a.depart_id = d.id
					 where from_unixtime(a.created, '%Y-%m-%d') = '".$date_2."'
					 and a.status_id = ".$status_id_curr." ";  
					
					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;


			}

			public function get_statusid_today(){
				$query = "select a.status_id as status_id_curr from career_form_data as a  
				left join career_dept as d on a.depart_id = d.id
					 where from_unixtime(a.created, '%Y-%m-%d') = CURDATE()
					 order by a.id desc LIMIT 1 ";

					 $filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
			}*/

			
			public function filter_report_data_today($date_2){

					 $query = "select * from ( 
								select  d.departments as Department_name, 


								ifnull(dd.Initial_Interview,0) as Initial_Interview,
								ifnull(dd.Formal_Interview,0) as Formal_Interview,
								ifnull(dd.Observation,0) as Observation,
								ifnull(dd.Final_Consultation,0) as Final_Consultation,
								ifnull(dd.Offer,0) as Offer,
								ifnull(dd.Offer_Confirmation,0) as Offer_Confirmation,

								ifnull(dd.Archive,0) as Archive,
								ifnull(dd.Regret,0) as Regret,
								ifnull(dd.Not_Interested,0) as Not_Interested,


								ifnull(dd.Formal_Inteview_Follow_Up,0) as Formal_Inteview_Follow_Up,
								ifnull(dd.Observation_Follow_Up,0) as Observation_Follow_Up,
								ifnull(dd.Final_Consultation_Follow_Up,0) as Final_Consultation_Follow_Up,
								ifnull(dd.Offer_Confirmation_Follow_Up,0) as Offer_Confirmation_Follow_Up

								from atif_Career.career_dept as d 

								left join ( 
								SELECT  
								  
								de.departments,
								SUM(if( cf.status_id=2,1,0 )) as Initial_Interview,
								SUM(if( cf.status_id=3,1,0 )) as Formal_Interview,
								SUM(if( cf.status_id=4,1,0 )) as Observation,
								SUM(if( cf.status_id=5,1,0 )) as Final_Consultation,
								SUM(if( cf.status_id=6,1,0 )) as Offer,
								SUM(if( cf.status_id=7,1,0 )) as Offer_Confirmation,

								 SUM(if(cf.status_id=10,1,0 )) as Archive,
								 SUM(if(cf.status_id=12,1,0 )) as Regret,
								 SUM(if(cf.status_id=15,1,0 )) as Not_Interested,

								 SUM(if(cf.status_id=3 && cf.stage_id=5 ,1,0)) as Formal_Inteview_Follow_Up,
								 SUM(if(cf.status_id=4 && cf.stage_id=5 ,1,0)) as Observation_Follow_Up,
								 SUM(if(cf.status_id=5 && cf.stage_id=5 ,1,0)) as Final_Consultation_Follow_Up,
								 SUM(if(cf.status_id=7 && cf.stage_id=5 ,1,0)) as Offer_Confirmation_Follow_Up

								from atif_career.career_form as cf 
								left  join (  select * from atif_Career.career_form_data as cfd where cfd.id in (
								select max(cfd.id) from atif_career.career_form_data as cfd group by cfd.form_id ) ) as cfd on cfd.form_id=cf.id
								left JOIN atif_Career.career_dept AS de ON de.id=cfd.depart_id
								where from_unixtime(cf.modified, '%Y-%m-%d') = curdate()  group by cfd.depart_id ) as dd on dd.departments = d.departments ) as data

						";
						

					$filter = DB::connection($this->dbCon)->select($query);
					
					return $filter;
					
			}

}