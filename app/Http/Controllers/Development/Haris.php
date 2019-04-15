<?php
/******************************************************************
* Author : Atif Naseem
* Email : atif.naseem22@gmail.com
* Cell : +92-313-5521122
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Information\_region;
use App\Models\Staff\Information\_region_sub;
use App\Models\Staff\Staff_Information\staff_registered;
use App\Models\Staff\Staff_Information\staff_contact_info;
use App\Models\Staff\Staff_Adjustment\StaffAdjustmentModel;
use App\Models\Staff\Staff_Information\StaffInformationModel;
use App\Models\Staff\Staff_Information\daily_attendance_report;
use App\Models\Staff\Staff_Information\staff_registered_takaful;
use App\Models\Staff\Staff_Information\staff_registered_supporting;
use App\Models\Staff\Staff_Information\staff_registered_employement;
use App\Models\Staff\Staff_Information\staff_registered_bank_account;
use App\Models\Staff\Staff_Information\staff_registered_qualification;
use App\Models\Staff\Staff_Information\staff_registered_father_spouse;
use App\Models\Staff\Staff_Information\staff_registered_alternativecontact;
use App\Models\Staff\Staff_Information\hr_forms_log;
use App\Models\Staff\Staff_Information\adjustment_approval;


class Haris extends StaffReportController
{
    public function development(){
        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $selectionList = new SelectionList();
  		/***** Getting Staff Information of Login User *****/
          $user = $staffInfo->get_Staff_Info(34);
  		/***** Getting Staff List *****/
          $staff = $staffInfo->get_Staff_List();
		
		
		/***** Getting Staff Filterable List *****/
        $departmentWhere = "c_bottomline != '' and c_bottomline != '..' and c_bottomline not like '%HiAce,%'
        and c_bottomline not like '%HiRoof,%'";
        $staffFilter['department'] = $selectionList->get_FieldList('atif.staff_registered', 'c_bottomline', $departmentWhere);
        $staffFilter['tt_profile'] = $selectionList->get_FieldList('atif_gs_events.tt_profile', 'name');
		/********* SMS Category *************/
		$staffCategory = $staffInfo->getCategory('atif_gs_events.comment_category');
	$leaveType = $staffInfo->get('atif_gs_events.leave_type','');
		// $leave_description = $staffInfo->get_leave_desscription($staff[0]->staff_id);
        return view('master_layout.staff.staff_view_31')->with(array('staff' => $staff, 'user' => $user, 'filter' => $staffFilter, 'staffCategory' => $staffCategory,'leaveType' => $leaveType));
    }

    //Add AnOther School Row Function...ZK. 
    public function AddRow(Request $request){
      // $userID = Sentinel::getUser()->id;
      // $staffInfo = new StaffInformationModel();
      //return view('master_layout.staff.add_school_row');
          $next_div_id= $request->next_div;
          $view_name= $request->view_name;

         return view('master_layout.staff.'.$view_name, compact('next_div_id'));
        // var_dump($next_div);
        // die;
    
    }

    //Add institute Row Function.... 
    public function Add_Employment_Row(){
      // $userID = Sentinel::getUser()->id;
      // $staffInfo = new StaffInformationModel();
        return view('master_layout.staff.add_employment_row');
    
    }

    //Add AnOther College Row Function.... 
    public function Add_College_Row(){
      // $userID = Sentinel::getUser()->id;
      // $staffInfo = new StaffInformationModel();
        return view('master_layout.staff.add_college_row');
    
    }

    //Add AnOther University Row Function.... 
    public function Add_University_Row(){
      // $userID = Sentinel::getUser()->id;
      // $staffInfo = new StaffInformationModel();
        return view('master_layout.staff.add_university_row');
    
    }

    //Add AnOther Professional Row Function.... 
    public function Add_Professional_Row(){
      // $userID = Sentinel::getUser()->id;
      // $staffInfo = new StaffInformationModel();
        return view('master_layout.staff.add_professional_row');
    
    }

    //Add AnOther Others Row Function.... 
    public function Add_Others_Row(){
      // $userID = Sentinel::getUser()->id;
      // $staffInfo = new StaffInformationModel();
        return view('master_layout.staff.add_others_row');
    
    }

    //GetStaffInfo Function
    public function getStaffInfo(Request $request){

        $staffID = $request->input('staff_id');
        $staffInfo = new StaffInformationModel();

        $staff['info'] = $staffInfo->getStaffInformation($staffID);

       // $staffRegion['region'] = $staffInfo->get_region($staffID);

        //var_dump($getStaffStatus);
        $staff['roles'] = $staffInfo->get_StaffInfo($staff['info'][0]->gt_id);
        $staff['profile_description'] = $staffInfo->getStaff_TTProfile($staff['info'][0]->gt_id);

        if(empty($staff['profile_description'])){
          $staff['profile_description'] = '';
        }

        $staff['reporting1'] = '';
        $staff['reporting2'] = '';
        if(!empty($staff['roles'][0]['pm_report_to'])){
          $staff['reporting1'] = $staffInfo->get_StaffReportingInfo($staff['roles'][0]['pm_report_to']);
          if(!empty($staff['roles'][1]['pm_report_to'])){
            $staff['reporting2'] = $staffInfo->get_StaffReportingInfo($staff['roles'][1]['pm_report_to']);
          }
        }
        $staff['absentia'] = $staffInfo->getStaffAbsentia($staffID);

        $staff['manual'] = $staffInfo->getStaffManual($staffID);



        $staff['comments'] = $staffInfo->getStaffComments($staffID);

        // print_r($staffInfo->getStaffComments($staffID));
        // die;


        $staff['leave_description']= $staffInfo->get_leave_desscription($staffID);

        $staff['penalty'] = $staffInfo->getPenalty($staffID);

        $staff['exception_adjustment'] = $staffInfo->getExceptionAdjustment($staffID);

        $staff['current_leave'] = $staffInfo->getCurrentLeave($staffID);

        $staff['get_cut_date'] = $staffInfo->get_cut_date();

       // $staff['daily_report_attendance'] = $staffInfo->getDailyReportData(date('Y-m-d'),$staffID);


        echo json_encode($staff);
    
    }

    public function development_UserTeam(Request $request){
      $userID = Sentinel::getUser()->id;
      $staffInfo = new StaffInformationModel();
      $selectionList = new SelectionList();



      /************************************************** Staff Team **************************************************/
      $staffData = $staffInfo->get_Staff_Info($userID);
      $staffData2 = $staffInfo->get_StaffInfo($staffData['info'][0]->gt_id);
      // var_dump($staffData2); exit;
      $StaffReportee = array();
      $StaffReportee_SC = array();
      $StaffReportee2 = array();
      $StaffReportee2_SC = array();
      $StaffReportee_TRP = array();
  	  $StaffReportee2 = array();
  		$staff = array();



      if(!empty($staffData2[0]['role_id'])){


        $StaffReportee = $staffInfo->get_StaffReporteeInfo_UTeam($staffData2[0]['role_id']);
        $StaffReportee_SC = $staffInfo->get_StaffReporteeSCInfo_UTeam($staffData2[0]['role_id']);
		
    		$StaffRole = $staffInfo->Get_Current_Staff_Role($staffData2[0]['role_id']);
    		$StaffRole = collect($StaffRole)->map(function($x){ return (array) $x; })->toArray();
    		
    		
    		$i=0;
    		foreach( $StaffRole as $rrr ){
    			unset( $StaffRole[$i]['id']);
    			unset( $StaffRole[$i]['roleCode']);
    		
    			unset($StaffRole[$i]['abridged_name']);
    			//unset($StaffRole[$i]['name_code']);
    			unset($StaffRole[$i]['gg_id']);
    			
    			unset($StaffRole[$i]['gt_id']);
    			unset($StaffRole[$i]['employee_id']);
    			unset($StaffRole[$i]['gender']);
    			unset($StaffRole[$i]['role_title_tl']);
    			unset($StaffRole[$i]['role_title_bl']);
    			unset($StaffRole[$i]['photo500']);
    			unset($StaffRole[$i]['photo150']);
    			//array_push($staff, $StaffRole[$i]);
    			$i++;
    		}
	     foreach ($StaffReportee as $data) {
        //array_push($staff, $data);
          if($data['photo_id'] != '')
          {
          array_push($staff, $data); 
          }
        }
		
		
		
		
		
		
		
		
        foreach ($StaffReportee_SC as $data) {
          array_push($staff, $data);
        }
		
		
        


        $i = 0;
        foreach ($StaffReportee as $rr) {
          if($StaffReportee[$i]['report_ok'] == 'TRP'){
            $StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo_UTeam($StaffReportee[$i]['Role_id_So'], 'INDIR', $StaffReportee[$i]['name_code']);
            $ii = 0;
            foreach ($StaffReportee_TRP as $trp) {
            $StaffReportee_TRP3 = $staffInfo->get_StaffReporteeInfo_UTeam($trp['Role_id_So'], 'INDIR', $StaffReportee[$i]['name_code']);

                if(!empty($StaffReportee_TRP3)):
                  foreach( $StaffReportee_TRP3 as $trp3):
                  if($trp3['photo_id'] != '')
                  {
                    array_push($staff, $trp3); 
                  }

                  endforeach;

                else:

                if($trp['photo_id'] != ''){
                  array_push($staff, $trp);
                }

                endif;

              
              
              $ii++;
            }

          }// end transperent TRP

          $i++;
        }
		
		
		
		
		
		
      // exit;
		
		
      }

	  
	
		

     
      if(!empty($staffData2[1]['role_id'])){
		  
  		$Second_Role_Id = $staffData2[1]['role_id'];
  		$StaffReportee2 = $staffInfo->get_StaffReporteeInfo_UTeam($Second_Role_Id);
  		$StaffReportee2_SC = $staffInfo->get_StaffReporteeSCInfo_UTeam( $Second_Role_Id );
		
        foreach ($StaffReportee2 as $data) {
          array_push($staff, $data);
        }
        foreach ($StaffReportee2_SC as $data) {
          array_push($staff, $data);
        }

	


        
        $i = 0;
        foreach ($StaffReportee2 as $rr) {
          if($StaffReportee2[$i]['report_ok'] == 'TRP'){
            $StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo_UTeam($StaffReportee2[$i]['Role_id_So'], 'INDIR', $StaffReportee2[$i]['name_code']);
            foreach ($StaffReportee_TRP as $trp) {
             
              array_push($staff, $trp);
            }
          }
          $i++;
        }
		
		
		
		
		
  		if( !empty( $StaffReportee2[0]["Role_id_So"]) ){
  			$StaffReportee2_staff_id =  $StaffReportee2[0]["Role_id_So"];
  			$StaffReportee2 = $staffInfo->get_StaffReporteeInfo_UTeam($StaffReportee2_staff_id);
  			if( !empty($StaffReportee2)){
  				$StaffReportee2_SC = $staffInfo->get_StaffReporteeSCInfo_UTeam( $Second_Role_Id );
  				foreach ($StaffReportee2 as $data) {
  				  array_push($staff, $data);
  				}
  				foreach ($StaffReportee2_SC as $data) {
  				  array_push($staff, $data);
  				}
  				$i = 0;
  				foreach ($StaffReportee2 as $rr) {
  				  if($StaffReportee2[$i]['report_ok'] == 'TRP'){
  					$StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo_UTeam($StaffReportee2[$i]['Role_id_So'], 'INDIR', $StaffReportee2[$i]['name_code']);
  					foreach ($StaffReportee_TRP as $trp) {
  					  
  					  array_push($staff, $trp);
  					}

  				  }
  				  $i++;
  				}
  			}// endif role exist
  		}




  	   }
	 
      /************************************************** Staff Team **************************************************/

      /***** Getting Staff Filterable List *****/
      $departmentWhere = "c_bottomline != '' and c_bottomline != '..' and c_bottomline not like '%HiAce,%'
      and c_bottomline not like '%HiRoof,%'";
      $staffFilter['department'] = $selectionList->get_FieldList('atif.staff_registered', 'c_bottomline', $departmentWhere);
      $staffFilter['tt_profile'] = $selectionList->get_FieldList('atif_gs_events.tt_profile', 'name');

      /**** if - List requires filtration ****/
      if($request->input('campus')){
        $campus = $request->input('campus');
        $index = 0;
        foreach ($staff as $staffData) {
          if(strtolower($staffData['campus']) != $campus) {
            unset($staff[$index]);
          }
          $index++;
        }
      }else if($request->input('team')){
        $team = $request->input('team');
        $index = 0;
        foreach ($staff as $staffData) {
          if($staffData['c_bottomline'] != $team) {
            unset($staff[$index]);
          }
          $index++;
        }
      }
	  
	 
    		$duplicated=array();
            $index = 0;
    		
            foreach ( $staff as $v) {
    			if(!in_array($v["name_code"], $duplicated, true)){
    				array_push($duplicated, $v["name_code"]);
    			}else{
    				unset($staff[$index]);
    			}
    			$index++;
    		}
		
		
		
		
		
		
		
		
      /**** org - page ****/
      
	 
	  
	  
	
	  
		
		
	
		
		

        /*array_push($staff, array(
        		"role_cat"=>$s['role_cat'],
        		"s1"=>$s['s1'],
        		"is_transparent"=>$s['is_transparent'],
        		"finalDistance"=>$s['finalDistance'],
        		"fst10"=>$s['fst10'],
        		"finalGrade"=>$s['finalGrade']
        		
        		)
        	);*/


		
		
    		
    		$user = $staffInfo->get_Staff_Info(34);
    		
    		
    		$staffCategory = $staffInfo->getCategory('atif_gs_events.comment_category');
    		$leaveType = $staffInfo->get('atif_gs_events.leave_type','');
    		
    		$staff = collect($staff)->map(function($x){ return (object) $x; })->toArray();
    		$staffFilter = collect($staffFilter)->map(function($x){ return (object) $x; })->toArray();
		
		
		
        return view('master_layout.staff.staff_view_31')->with(array('staff' => $staff, 'user' => $user, 'filter' => $staffFilter, 'staffCategory' => $staffCategory,'leaveType' => $leaveType));
   
    }

    /**********************************************************************
    * Staff Information Update
    * Author:   Zia Khan, z.qureshi@generations.edu.pk, +92-342-2775588
    * @input:   Key words
    * @output:  JSON encoded Staff Information Fields
    ***********************************************************************/
    //add_staff_info update values zzkk
    public function Update_Staff(Request $request){
      $staff_id=$request->staff_id;
      $staftitle=$request->staftitle;
      $genderselect=$request->genderselect;
      $cnicname=$request->cnicname;
      $fullname=$request->fullname;
      $namecodetxt=$request->namecodetxt;
      $dobdate=$request->dobdate;
      $cnictxt=$request->cnictxt;
      $phonenumtxt=$request->phonenumtxt;
      $landlinetxt=$request->landlinetxt;
      $dojdate=$request->dojdate;
      $satffstatustxt=$request->satffstatustxt;
      $tapincampus=$request->tapincampus;
      $eobino=$request->eobino;
      $sessino=$request->sessino;
      //Staff Supporting Registered
      $maritalstatus=$request->maritalstatus;
      $religiontxt=$request->religiontxt;
      $nationalitytxt=$request->nationalitytxt;
      $emailtxt=$request->emailtxt;
      $providentfund=$request->providentfund;
      $ntnno=$request->ntnno;
      //Staff Address Info Registered 
      $apartmenttxt=$request->apartmenttxt;
      $streetnametxt=$request->streetnametxt;
      $buildingnametxt=$request->buildingnametxt;
      $plotnotxt=$request->plotnotxt;
      //Staff Region Info Registered
      $regiontxt=$request->regiontxt;
      //Staff Sub Region Info Registered
      $subregiontxt=$request->subregiontxt;
      //Staff Education School
      // $staff_id=$request->staff_id;
      $sch_names=$request->sch_names;
      $sch_qualifications=$request->sch_qualifications;
      $sch_subjects=$request->sch_subjects;
      $sch_results=$request->sch_results;
      $sch_years=$request->sch_years;
      //Staff Education college
      // $staff_id=$request->staff_id;
      $col_names=$request->col_names;
      $col_qualifications=$request->col_qualifications;
      $col_subjects=$request->col_subjects;
      $col_results=$request->col_results;
      $col_years=$request->col_years;
      //Staff Education University
      // $staff_id=$request->staff_id;
      $uni_names=$request->uni_names;
      $uni_qualifications=$request->uni_qualifications;
      $uni_subjects=$request->uni_subjects;
      $uni_results=$request->uni_results;
      $uni_years=$request->uni_years;
      //Staff Education Professional
      // $staff_id=$request->staff_id;
      $pro_names=$request->pro_names;
      $pro_qualifications=$request->pro_qualifications;
      $pro_subjects=$request->pro_subjects;
      $pro_results=$request->pro_results;
      $pro_years=$request->pro_years;
      //Staff Education Others
      // $staff_id=$request->staff_id;
      $oth_names=$request->oth_names;
      $oth_qualifications=$request->oth_qualifications;
      $oth_subjects=$request->oth_subjects;
      $oth_results=$request->oth_results;
      $oth_years=$request->oth_years;
      //Staff Employment Details
      $employ_orgs=$request->employ_orgs;
      $employ_desgs=$request->employ_desgs;
      $employ_salarys=$request->employ_salarys;
      $employ_fyears=$request->employ_fyears;
      $employ_tyears=$request->employ_tyears;
      $employ_reasons=$request->employ_reasons;
      $employ_classess=$request->employ_classess;
      $employ_subjects=$request->employ_subjects;  
      //Staff Father Details
      $namefather=$request->namefather;
      $fprofession=$request->fprofession;
      $fqualification=$request->fqualification;
      $fdesignation=$request->fdesignation;
      $fdepartment=$request->fdepartment;
      $forganisation=$request->forganisation;
      $fcnic=$request->fcnic;
      $fmobile=$request->fmobile;
      $faddress=$request->faddress;
      //Staff Spouse Details 
      $namespouse=$request->namespouse;
      $sprofession=$request->sprofession;
      $squalification=$request->squalification;
      $sdesignation=$request->sdesignation;
      $sdepartment=$request->sdepartment;
      $sorganisation=$request->sorganisation;
      $scnic=$request->scnic;
      $smobile=$request->smobile;
      $saddress=$request->saddress;
      //Next Of Kin Details
      $noknamefirst=$request->noknamefirst;
      $nokaddressfirst=$request->nokaddressfirst;
      $nokemailfirst=$request->nokemailfirst;
      $nokmobilefirst=$request->nokmobilefirst;
      $nokrelationshipfirst=$request->nokrelationshipfirst;
      //Emergency Contact Details
      $noknamesecond=$request->noknamesecond;
      $nokaddresssecond=$request->nokaddresssecond;
      $nokemailsecond=$request->nokemailsecond;
      $nokmobilesecond=$request->nokmobilesecond;
      $nokrelationshipsecond=$request->nokrelationshipsecond;
      //Bank Details 
      $banknametxt=$request ->banknametxt;
      $bankbranchname=$request ->bankbranchname;
      $bankaccountnumber=$request ->bankaccountnumber;
      //Takaful Registered
      $radioSelfTakaful=$request ->radioSelfTakaful;
      $radioSpouseTakaful=$request ->radioSpouseTakaful;
      $radioChildTakaful=$request ->radioChildTakaful;
      $ctakaful=$request ->ctakaful;
      $reasonfortakaful=$request ->reasonfortakaful;

      //code code start here
      //code code end here

      //Staff Registered Code goes here///
      $staff_registered = new staff_registered;
      $tapincampus = $this->getStaffBranchId($tapincampus);
      $staftitle = $this->getStaffTitle($staftitle);
      $satffstatustxt = $this->getStaffStatus($satffstatustxt);
      $staff_reg_record_found=$staff_registered->checkStaffRegRecordExistance($staff_id);
          if($staff_reg_record_found>0){
              $data=array(
                  'title_person_id' => $staftitle,
                  'gender' => $genderselect,
                  'name' => $cnicname,
                  'abridged_name' => $fullname,
                  'name_code' => $namecodetxt,
                  'dob' => $dobdate,
                  'nic' => $cnictxt,
                  'mobile_phone' => $phonenumtxt,
                  'land_line' => $landlinetxt,
                  'doj' => $dojdate,
                  'staff_status'=> $satffstatustxt,
                  'branch_id' => $tapincampus,
                  'eobi_no' => $eobino,
                  'sessi_no' => $sessino,
              );
                  $data_get_staff_reg= $staff_registered->updateStaffRegRecord($staff_id,$data);
                  //return 'updated';
          }
          // else{
          //         $staff_registered->title_person_id = $staftitle;
          //         $staff_registered->gender = $genderselect;
          //         $staff_registered->name = $cnicname;
          //         $staff_registered->abridged_name = $fullname;
          //         $staff_registered->name_code = $namecodetxt;
          //         $staff_registered->dob = $dobdate;
          //         $staff_registered->nic = $cnictxt;
          //         $staff_registered->mobile_phone = $phonenumtxt;
          //         $staff_registered->land_line = $landlinetxt;
          //         $staff_registered->doj = $dojdate;
          //         $staff_registered->staff_status = $satffstatustxt;
          //         $staff_registered->branch_id = $tapincampus;
          //         $staff_registered->eobi_no = $eobino;
          //         $staff_registered->sessi_no = $sessino;
          //         $staff_registered->save();
          //       }

      //Staff Supporting Registered Code goes here///
      $staff_reg_support = new staff_registered_supporting;
      $providentfund =$this->getStaffProvidentFund($providentfund);
      $maritalstatus = $this->getStaffMaritalStatus($maritalstatus);
      $religiontxt = $this->getstaffReligion($religiontxt);
       $staff_reg_support_record_found=$staff_reg_support->checkStaffRegSupportRecordExistance($staff_id);
          if($staff_reg_support_record_found>0){
              $data=array(
                      'employment_status' => $maritalstatus,
                      'religion' => $religiontxt,
                      'nationality' => $nationalitytxt,
                      'emailpersonal' => $emailtxt,
                      'providentFund' => $providentfund,
                      'nationalTaxNumber' => $ntnno,
              );
                  $data_get_staff_reg_support= $staff_reg_support->updateStaffRegSupportRecord($staff_id,$data);
                  //return 'Support updated';
          }
          else{
                  $staff_reg_support->employment_status = $maritalstatus;
                  $staff_reg_support->religion = $religiontxt;
                  $staff_reg_support->nationality = $nationalitytxt;
                  $staff_reg_support->emailpersonal = $emailtxt;
                  $staff_reg_support->providentFund = $providentfund;
                  $staff_reg_support->nationalTaxNumber = $ntnno;
                  $staff_reg_support->save();
                }

      //Staff Address Registered Code goes here///
      $staff_contact_info = new staff_contact_info;
      $staff_contact_info_record_found=$staff_contact_info->checkStaffContactInfoRecordExistance($staff_id);
          if($staff_contact_info_record_found>0){
              $data=array(
                      'apartment_no' => $apartmenttxt,
                      'street_name' => $streetnametxt,
                      'building_name' => $buildingnametxt,
                      'plot_no' => $plotnotxt,
                      'region'  => $regiontxt,
                      'sub_region' => $subregiontxt,
              );
                  $data_get_staff_contact_info= $staff_contact_info->updateStaffContactInfoRecord($staff_id,$data);
                  //return 'Contact updated';
          }
          else{
                  $staff_contact_info->apartment_no = $apartmenttxt;
                  $staff_contact_info->street_name = $streetnametxt;
                  $staff_contact_info->building_name = $buildingnametxt;
                  $staff_contact_info->plot_no = $plotnotxt;
                  $staff_contact_info->regiontxt = $regiontxt;
                  $staff_contact_info->subregiontxt = $subregiontxt;
                  $staff_contact_info->save();
                }

      //Staff Region Registered Code goes here///
      //Region Staff Model

      //Staff Sub Region Registered Code goes here///

      //Staff Father Registered Code goes Start here///
      $staff_reg_father_spouse = new staff_registered_father_spouse;
      $father_record_found=$staff_reg_father_spouse->checkStaffFatherSpouseRegRecordExistance($staff_id,1);
        if($father_record_found>0){
          $data=array(
                  //'staff_id' =>$staff_id,
                  'name' =>$namefather,
                  'profession' =>$fprofession,
                  'qualification' =>$fqualification,
                  'designation' =>$fdesignation,
                  'department' =>$fdepartment,
                  'company' =>$forganisation,
                  'nic' =>$fcnic,
                  'mobile_phone' =>$fmobile,
                  'address' =>$faddress,
                   );

            $data_get_father= $staff_reg_father_spouse->updateStaffFatherSpouseRegRecord($staff_id,1,$data);
            //return 'Father update';
        }else{
          // $staff_reg_father_spouse->staff_id = $staff_id;
          // $staff_reg_father_spouse->name = $namefather;
          // $staff_reg_father_spouse->profession = $fprofession;
          // $staff_reg_father_spouse->qualification = $fqualification;
          // $staff_reg_father_spouse->designation = $fdesignation;
          // $staff_reg_father_spouse->department = $fdepartment;
          // $staff_reg_father_spouse->company = $forganisation;
          // $staff_reg_father_spouse->nic = $fcnic;
          // $staff_reg_father_spouse->mobile_phone = $fmobile;
          // $staff_reg_father_spouse->address = $faddress;
          // $staff_reg_father_spouse->save();
          //console.log('Insert');
        }
      //Staff Father Registered Code goes End here///

      //Staff Spouse Registered Code goes Start here///
      $spouse_record_found=$staff_reg_father_spouse->checkStaffFatherSpouseRegRecordExistance($staff_id,2);
          if($spouse_record_found>0){
            $data=array(
                    //'staff_id' =>$staff_id,
                    'name' =>$namespouse,
                    'profession' =>$sprofession,
                    'qualification' =>$squalification,
                    'designation' =>$sdesignation,
                    'department' =>$sdepartment,
                    'company' =>$sorganisation,
                    'nic' =>$scnic,
                    'mobile_phone' =>$smobile,
                    'address' =>$saddress,
                     );
            $data_get_spouse= $staff_reg_father_spouse->updateStaffFatherSpouseRegRecord($staff_id,2,$data);
            //return 'Spouse Update';
          }else{
            // $staff_reg_father_spouse->staff_id = $staff_id;
            // $staff_reg_father_spouse->spouseType = 2;
            // $staff_reg_father_spouse->name = $namespouse;
            // $staff_reg_father_spouse->profession = $sprofession;
            // $staff_reg_father_spouse->qualification = $squalification;
            // $staff_reg_father_spouse->designation = $sdesignation;
            // $staff_reg_father_spouse->department = $sdepartment;
            // $staff_reg_father_spouse->company = $sorganisation;
            // $staff_reg_father_spouse->nic = $scnic;
            // $staff_reg_father_spouse->mobile_phone = $smobile;
            // $staff_reg_father_spouse->address = $saddress;
            // $staff_reg_father_spouse->save();
            //console.log('Insert');
          }
      //Staff Spouse Registered Code goes End here///

      //Staff Next Of Kin Registered Code goes here start///
      $staff_reg_next_of_kin = new staff_registered_alternativecontact;
      $kin_record_found=$staff_reg_next_of_kin->checkStaffAlternativeContactRegRecordExistance($staff_id,1);
        if($kin_record_found>0){
          $data=array(
                  //'staff_id' =>$staff_id,
                  'name' =>$noknamefirst,
                  'address' =>$nokaddressfirst,
                  'email' =>$nokemailfirst,
                  'phone' =>$nokmobilefirst,
                  'relationships' =>$nokrelationshipfirst,
                   );
          $data_get_kin= $staff_reg_next_of_kin->updateStaffAlternativeContactRegRecord($staff_id,1,$data);
        }else{
          $staff_reg_next_of_kin->staff_id = $staff_id;
          $staff_reg_next_of_kin->name = $noknamefirst;
          $staff_reg_next_of_kin->address = $nokaddressfirst;
          $staff_reg_next_of_kin->email = $nokemailfirst;
          $staff_reg_next_of_kin->phone = $nokmobilefirst;
          $staff_reg_next_of_kin->relationships = $nokrelationshipfirst;
          $staff_reg_next_of_kin->save();
          //console.log('Insert');
        }
      //Staff Next Of Kin Registered Code goes here End///

      //Staff Emergency Contact Registered Code goes here start///
      $emergency_record_found=$staff_reg_next_of_kin->checkStaffAlternativeContactRegRecordExistance($staff_id,2);
        if($emergency_record_found>0){
          $data=array(
                  //'staff_id' =>$staff_id,
                  'name' =>$noknamesecond,
                  'address' =>$nokaddresssecond,
                  'email' =>$nokemailsecond,
                  'phone' =>$nokmobilesecond,
                  'relationships' =>$nokrelationshipsecond,
                   );
          $data_get_emergency= $staff_reg_next_of_kin->updateStaffAlternativeContactRegRecord($staff_id,2,$data);
        }else{
          $staff_reg_next_of_kin->staff_id = $staff_id;
          $staff_reg_next_of_kin->name = $noknamesecond;
          $staff_reg_next_of_kin->address = $nokaddresssecond;
          $staff_reg_next_of_kin->email = $nokemailsecond;
          $staff_reg_next_of_kin->phone = $nokmobilesecond;
          $staff_reg_next_of_kin->relationships = $nokrelationshipsecond;
          $staff_reg_next_of_kin->save();
          //console.log('Insert');
        }
      //Staff Emergency Contact Registered Code goes here End///

      //Staff Bank Registered Code Goes here Start///
      $staff_reg_bank_details = new staff_registered_bank_account;
      $bank_details_record_found=$staff_reg_bank_details->checkStaffBankRegRecordExistance($staff_id);
              if($bank_details_record_found>0){
                $data=array(
                        'bank_name' => $banknametxt,
                        'branch' => $bankbranchname,
                        'account_number' => $bankaccountnumber,
                         );
                $data_get= $staff_reg_bank_details->updateStaffBankRegRecord($staff_id,$data);
              }else{
                $staff_reg_bank_details->bank_name = $banknametxt;
                $staff_reg_bank_details->branch = $bankbranchname;
                $staff_reg_bank_details->account_number = $bankaccountnumber;
                $staff_reg_bank_details->save();
                //console.log('Insert');
              }
      //Staff Bank Registered Code Goes here End///

      //Staff Takaful Registered Code Goes Here Start///
      $staff_reg_takaful = new staff_registered_takaful;
      $radioSelfTakaful =$this->getStaffSelfTakaful($radioSelfTakaful);
      $radioSpouseTakaful =$this->getStaffSpouseTakaful($radioSpouseTakaful);
      $radioChildTakaful =$this->getStaffChildTakaful($radioChildTakaful);
      $takaful_record_found=$staff_reg_takaful->checkStafftakafulRegRecordExistance($staff_id);
              if($takaful_record_found>0){
                $data=array(
                        'self' => $radioSelfTakaful,              // radio button
                        'spouse' => $radioSpouseTakaful,          // radio button
                        'children' => $radioChildTakaful,        // radio button
                        'certificate_no' => $ctakaful,
                        'reasons' => $reasonfortakaful,
                         );
                $data_get= $staff_reg_takaful->updateStafftakafulRegRecord($staff_id,$data);
              }else{
                $staff_reg_takaful->self = $radioSelfTakaful;
                $staff_reg_takaful->spouse = $radioSpouseTakaful;
                $staff_reg_takaful->children = $radioChildTakaful;
                $staff_reg_takaful->certificate_no = $ctakaful;
                $staff_reg_takaful->reasons = $reasonfortakaful;
                $staff_reg_takaful->save();
                //console.log('Insert');
              }
      //Staff Takaful Registered Code Goes Here End///

      //Staff Employmnet details here
      $emp_increment=0;
      if(!empty($employ_orgs)){
            foreach ($employ_orgs as $row_number) {
                    $staff_employment = new staff_registered_employement;
                    $key=$emp_increment++;
                    $record_found=$staff_employment->checkRecordEmployExistance($staff_id,$employ_orgs[$key]);
                    if($record_found>0){

                      $data=array(
                              //'staff_id' =>$staff_id,
                              'organization' =>$employ_orgs[$key],
                              'designation' =>$employ_desgs[$key],
                              'department' =>$employ_desgs[$key],
                              'salary' =>$employ_salarys[$key],
                              'from_year' =>$employ_fyears[$key],
                              'to_year' =>$employ_tyears[$key],
                              'classes_taught' =>$employ_classess[$key],
                              'description' =>$employ_reasons[$key],
                              'reason_for_leaving' =>$employ_reasons[$key],
                              'subject_taught' =>$employ_subjects[$key],
                              );
                      $data_get= $staff_employment->updateEmployRecord($staff_id,$employ_orgs[$key],$data);
                      // var_dump($data_get);
                      // die;
                    }else{
                      $staff_employment->staff_id = $staff_id;
                      $staff_employment->organization = $employ_orgs[$key];
                      $staff_employment->designation = $employ_desgs[$key];
                      $staff_employment->department = $employ_desgs[$key];
                      $staff_employment->salary = $employ_salarys[$key];
                      $staff_employment->from_year = $employ_fyears[$key];
                      $staff_employment->to_year = $employ_tyears[$key];
                      $staff_employment->classes_taught = $employ_classess[$key];
                      $staff_employment->description = $employ_reasons[$key];
                      $staff_employment->reason_for_leaving = $employ_reasons[$key];
                      $staff_employment->subject_taught = $employ_subjects[$key];
                      $staff_employment->save();
                    }
            }
      }

      // education staff          
      $school_increment=0;
      if(!empty($sch_names)){
            foreach ($sch_names as $row_number){
                    $staff_qualification = new staff_registered_qualification;
                    $key=$school_increment++;
                    $record_found=$staff_qualification->checkRecordExistance($staff_id,$sch_names[$key]);
                    if($record_found>0){
                      $data=array(
                              //'staff_id' =>$staff_id,
                              'title' =>$sch_names[$key],
                              'level' =>1,
                              'institute' =>$sch_names[$key],
                              'subjects' =>$sch_subjects[$key],
                              'qualification' =>$sch_qualifications[$key],
                              'result' =>$sch_results[$key],
                              'year_of_completion' =>$sch_years[$key],
                               );
                      $data_get= $staff_qualification->updateRecord($staff_id,$sch_names[$key],$data);
                    }else{
                      $staff_qualification->staff_id = $staff_id;
                      $staff_qualification->level = 1;
                      $staff_qualification->title = $sch_names[$key];
                      $staff_qualification->institute = $sch_names[$key];
                      $staff_qualification->subjects = $sch_subjects[$key];
                      $staff_qualification->qualification = $sch_qualifications[$key];
                      $staff_qualification->result = $sch_results[$key];
                      $staff_qualification->year_of_completion = $sch_years[$key];
                      $staff_qualification->save();
                      //console.log('Insert');
                    }
            }
      }
      //college data Insert
      $college_increment=0;
      if(!empty($col_names)){
            foreach ($col_names as $row_number) {
                    $staff_qualification = new staff_registered_qualification;
                    $key=$college_increment++;
                    $record_found=$staff_qualification->checkRecordExistance($staff_id,$col_names[$key]);
                    if($record_found>0){

                      $data=array(
                              //'staff_id' =>$staff_id,
                              'title' =>$col_names[$key],
                              'level' =>2,
                              'institute' =>$col_names[$key],
                              'subjects' =>$col_subjects[$key],
                              'qualification' =>$col_qualifications[$key],
                              'result' =>$col_results[$key],
                              'year_of_completion' =>$col_years[$key],
                               );
                      $data_get= $staff_qualification->updateRecord($staff_id,$col_names[$key],$data);
                    }else{
                      $staff_qualification->staff_id = $staff_id;
                      $staff_qualification->level = 2;
                      $staff_qualification->title = $col_names[$key];
                      $staff_qualification->institute = $col_names[$key];
                      $staff_qualification->subjects = $col_qualifications[$key];
                      $staff_qualification->qualification = $col_subjects[$key];
                      $staff_qualification->result = $col_results[$key];
                      $staff_qualification->year_of_completion = $col_years[$key];
                      $staff_qualification->save();
                    }
            }
      }
      //university data Insert
      $university_increment=0;
      if(!empty($uni_names)){
            foreach ($uni_names as $row_number) {
                    $staff_qualification = new staff_registered_qualification;
                    $key=$university_increment++;
                    $record_found=$staff_qualification->checkRecordExistance($staff_id,$uni_names[$key]);
                    if($record_found>0){

                      $data=array(
                             // 'staff_id' =>$staff_id,
                              'title' =>$uni_names[$key],
                              'level' =>3,
                              'institute' =>$uni_names[$key],
                              'subjects' =>$uni_subjects[$key],
                              'qualification' =>$uni_qualifications[$key],
                              'result' =>$uni_results[$key],
                              'year_of_completion' =>$uni_years[$key],
                               );
                      $data_get= $staff_qualification->updateRecord($staff_id,$uni_names[$key],$data);
                    }else{
                      $staff_qualification->staff_id = $staff_id;
                      $staff_qualification->level = 3;
                      $staff_qualification->title = $uni_names[$key];
                      $staff_qualification->institute = $uni_names[$key];
                      $staff_qualification->subjects = $uni_qualifications[$key];
                      $staff_qualification->qualification = $uni_subjects[$key];
                      $staff_qualification->result = $uni_results[$key];
                      $staff_qualification->year_of_completion = $uni_years[$key];
                      $staff_qualification->save();
                    }
            }
      }
      //professional data Insert
      $professional_increment=0;
      if(!empty($pro_names)){
            foreach ($pro_names as $row_number) {
                    $staff_qualification = new staff_registered_qualification;
                    $key=$professional_increment++;
                    $record_found=$staff_qualification->checkRecordExistance($staff_id,$pro_names[$key]);
                    if($record_found>0){

                      $data=array(
                              //'staff_id' =>$staff_id,
                              'title' =>$pro_names[$key],
                              'level' =>4,
                              'institute' =>$pro_names[$key],
                              'subjects' =>$pro_subjects[$key],
                              'qualification' =>$pro_qualifications[$key],
                              'result' =>$pro_results[$key],
                              'year_of_completion' =>$pro_years[$key],
                               );
                      $data_get= $staff_qualification->updateRecord($staff_id,$pro_names[$key],$data);
                    }else{
                      $staff_qualification->staff_id = $staff_id;
                      $staff_qualification->level = 4;
                      $staff_qualification->title = $pro_names[$key];
                      $staff_qualification->institute = $pro_names[$key];
                      $staff_qualification->subjects = $pro_qualifications[$key];
                      $staff_qualification->qualification = $pro_subjects[$key];
                      $staff_qualification->result = $pro_results[$key];
                      $staff_qualification->year_of_completion = $pro_years[$key];
                      $staff_qualification->save();
                    }
            }
      }
      //others data Insert
      $others_increment=0;
      if(!empty($oth_names)){
            foreach ($oth_names as $row_number) {
                    $staff_qualification = new staff_registered_qualification;
                    $key=$others_increment++;
                    $record_found=$staff_qualification->checkRecordExistance($staff_id,$oth_names[$key]);
                    if($record_found>0){

                      $data=array(
                              //'staff_id' =>$staff_id,
                              'title' =>$oth_names[$key],
                              'level' =>5,
                              'institute' =>$oth_names[$key],
                              'subjects' =>$oth_subjects[$key],
                              'qualification' =>$oth_qualifications[$key],
                              'result' =>$oth_results[$key],
                              'year_of_completion' =>$oth_years[$key],
                               );
                      $data_get= $staff_qualification->updateRecord($staff_id,$oth_names[$key],$data);
                    }else{
                      $staff_qualification->staff_id = $staff_id;
                      $staff_qualification->level = 5;
                      $staff_qualification->title = $oth_names[$key];
                      $staff_qualification->institute = $oth_names[$key];
                      $staff_qualification->subjects = $oth_qualifications[$key];
                      $staff_qualification->qualification = $oth_subjects[$key];
                      $staff_qualification->result = $oth_results[$key];
                      $staff_qualification->year_of_completion = $oth_years[$key];
                      $staff_qualification->save();
                    }
            }
      }

    }

    private function getStaffSelfTakaful($radioSelfTakaful){
      if($radioSelfTakaful == 'No'){
        $radioSelfTakaful = 0;
      }else{
        $radioSelfTakaful = 1;
      }
      return $radioSelfTakaful;
    
    }

    private function getStaffSpouseTakaful($radioSpouseTakaful){
      if($radioSpouseTakaful == 'No'){
        $radioSpouseTakaful = 0;
      }else{
        $radioSpouseTakaful = 1;
      }
      return $radioSpouseTakaful;
    
    }

    private function getStaffChildTakaful($radioChildTakaful){
      if($radioChildTakaful == 'No'){
        $radioChildTakaful = 0;
      }else{
        $radioChildTakaful = 1;
      }
      return $radioChildTakaful;
    
    }

    private function getStaffBranchId($tapincampus){
      if($tapincampus == 'North'){
        $tapincampus = 1;
      }elseif($tapincampus == 'South'){
        $tapincampus = 2;
      }
      return $tapincampus;
    
    }

    private function getStaffTitle($staftitle){
    
      if($staftitle == 'Mr'){
        $staftitle = 1;
      }elseif ($staftitle == 'Ms'){
        $staftitle = 2;
      }elseif ($staftitle == 'Mrs'){
        $staftitle = 3;
      }elseif ($staftitle == 'Dr'){
        $staftitle = 4;
      }
      return $staftitle;
    
    }

    private function getStaffStatus($satffstatustxt){
        if($satffstatustxt == 'Permanent'){
         $satffstatustxt = 1;
       }elseif ($satffstatustxt == 'Contractual'){
         $satffstatustxt = 2;
       }elseif ($satffstatustxt == 'Family'){
         $satffstatustxt = 3;
       }elseif ($satffstatustxt == 'Probation'){
         $satffstatustxt = 4;
       }elseif ($satffstatustxt == 'Internship'){
         $satffstatustxt = 5;
       }elseif ($satffstatustxt == 'Substitute'){
         $satffstatustxt = 6;
       }elseif ($satffstatustxt == 'NonDirectStaff'){
         $satffstatustxt = 7;
       }elseif ($satffstatustxt == 'Resignation Notice'){
         $satffstatustxt = 8;
       }elseif ($satffstatustxt == 'Termination Notice'){
         $satffstatustxt = 9;
       }elseif ($satffstatustxt == 'Registration No Show'){
         $satffstatustxt = 10;
       }elseif ($satffstatustxt == 'Summer No Show'){
         $satffstatustxt = 11;
       }elseif ($satffstatustxt == 'Extended No Show'){
         $satffstatustxt = 12;
       }elseif ($satffstatustxt == 'Leave'){
         $satffstatustxt = 13;
       }elseif ($satffstatustxt == 'New Staff'){
         $satffstatustxt = 14;
       }elseif ($satffstatustxt == 'Re Joining'){
         $satffstatustxt = 15;
       }elseif ($satffstatustxt == 'Resigned'){
         $satffstatustxt = 16;
       }elseif ($satffstatustxt == 'Terminated'){
         $satffstatustxt = 17;
       }
       return $satffstatustxt;
    
    }

    private function getStaffProvidentFund($providentfund){
        if($providentfund == 'No'){
          $providentfund = 0;
        }else{$providentfund = 1;
        }
        return $providentfund;
    
    }

    private function getstaffReligion($religiontxt){
        if($religiontxt == 'Muslim'){
          $religiontxt = 1;
        }elseif($religiontxt == 'Non-Muslim'){
          $religiontxt = 0;
        }
        return $religiontxt;
    
    }

    private function getStaffMaritalStatus($maritalstatus){
        if($maritalstatus == 'Married'){
          $maritalstatus = 1;
        }elseif($maritalstatus == 'Single'){
          $maritalstatus = 2;
        }elseif($maritalstatus == 'Divorced'){
          $maritalstatus = 3;
        }elseif($maritalstatus == 'Widow'){
          $maritalstatus = 4;
        }
        return $maritalstatus;
    
    }

    public function AteebRecModal(Request $request){

            $userID = Sentinel::getUser()->id;
            $staffID = $request->input('staff_id');
            $staffInfo = new StaffInformationModel();
            $personalInfo = $staffInfo->getStaffInformation($staffID);
            $education = $staffInfo->getStaffQualification($staffID);
            $employment = $staffInfo->getStaffEmployment($staffID);
            $fs = $staffInfo->getStaffFS($staffID);
            $sc = $staffInfo->getStaffChild($staffID);
            $ac = $staffInfo->getStaffAlternateContact($staffID);
            $other = $staffInfo->getStaffOtherInfo($staffID);
            $staff_region = new _region;
            $staff_sub_region = new _region_sub;
            $regions=$staff_region->get_region($staffID);
            $sub_regions=$staff_sub_region->get_sub_region($staffID);

            // print_r($sub_regions);
            // die;

            return view('master_layout.staff.staff_recruitment_modal',[
              'personalInfo'=>$personalInfo,
              'education'=>$education,
              'employment'=>$employment,
              'fs'=>$fs,
              'sc'=>$sc,
              'ac'=>$ac,
              'other'=>$other,
              'region'=>$regions,
              'sub_region'=>$sub_regions,
            ]);

    }



     /**********************************************************************
    * Add Absentia 
    * Author:   Asim Bilal
    * @input:   Staff ID, date, start_time, end_time, title, description
    * @output: 
    * Date:     Jul 26, 2017 (Wed)
    ***********************************************************************/
    public function addAbsentia(Request $request){

        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $hr_forms_log=new hr_forms_log;
        $adjustment_approval=new adjustment_approval;
        $staff_id = $request->input('staff_id');
        $date = $request->input('date');
        $tap_out = $request->input('start_time');
        $tap_in = $request->input('end_time');
        $form_number = $request->input('form_number');
        $time = time();
    $data_in = array(
          'staff_id' => $staff_id,
          'date' => $date,
          'time' => $tap_in,
          'ip4' => getHostByName(getHostName()),
          'location_id' => 17,
          'created' => $time,
          'register_by' => $userID,
          'modified' => $time,
          'modified_by' => $userID,
          'record_deleted' => 0
        );


          $data_out = array(
            'staff_id' => $staff_id,
            'date' => $date,
            'time' => $tap_out,
            'ip4' => getHostByName(getHostName()),
            'location_id' => 17,
            'created' => $time,
            'register_by' => $userID,
            'modified' => $time,
            'modified_by' => $userID,
            'record_deleted' => 0
          );

          $staff_absentia_in =  $staffInfo->insertComments('atif_attendance_staff.staff_attendance_in',$data_in);
          $staff_absentia_out =  $staffInfo->insertComments('atif_attendance_staff.staff_attendance_out',$data_out);





          $title = $request->input('title');
          $description = $request->input('description');

          $title_description = array(
            'staff_id' => $staff_id,
            'form_number'=>$form_number,
            'date' => $date,
            'title' => $title,
            'location_id' => 17,
            'description' => $description,
            'created' => $time,
            'created' => $time,
            'register_by' => $userID,
            'modified' => $time,
            'modified_by' => $userID,
            'record_deleted' => 0
          );


          


        $insert_description =  $staffInfo->insertComments('atif_gs_events.absenta_manual_description',$title_description);

        $hr_forms_log->staff_id=$staff_id;
          $hr_forms_log->form_number=$form_number;
          $hr_forms_log->type='insert';
          $hr_forms_log->effected_entry_table='atif_gs_events.absenta_manual_description';
          $hr_forms_log->effected_table_id=$insert_description;
          $hr_forms_log->title=$title;
          $hr_forms_log->description=$description;
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date("H:i:s");
          $hr_forms_log->time_details=$tap_in.'///'.$tap_out.'///'.$date;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();
          $table_name='atif_gs_events.absenta_manual_description';
          $this->adjustmentApproval($staff_id,$table_name,$insert_description,1,$userID,$userID);

        // Call SP For Trigger 
        if($staff_absentia_in > 0 && $staff_absentia_out > 0){

          $staffInfo->setAttendanceInfo($staff_id,$date,date("Y-m-d"));

          



        }


		
    		$Last_id = array("Last_id"=>$insert_description);
    		echo json_encode($Last_id);
     
    }


    /**********************************************************************
    * Add Manual
    * Author:   Asim Bilal
    * @input:   Staff ID, date, start_time, end_time, title, description
    * @output: 
    * Date:     Jul 26, 2017 (Wed)
    ***********************************************************************/


  public function addManual(Request $request){


        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $staffAdjustment = new StaffAdjustmentModel();
        $staff_id = $request->input('staff_id');
        $date = $request->input('date');
        $missTap = $request->input('missTap');
        $form_number = $request->input('form_number');
        $timeNow = time();
        $data = array(
          'staff_id' => $staff_id,
          'date' => $date,
          'time' => $missTap,
          'ip4' => getHostByName(getHostName()),
          'location_id' => 18,
          'created' => $timeNow ,
          'register_by' => $userID,
          'modified' => time(),
          'modified_by' => $userID,
          'record_deleted' => 0
        );

        $attendanceData = $staffInfo->getStaffAttendance( $staff_id, $date );
        $tableFlag = '';
        if(!empty($attendanceData)){

           if($attendanceData[0]->attendance_in == $attendanceData[0]->attendance_out){

              $time = strtotime($missTap);
              $data['time'] = date("H:i", strtotime('+1 minutes', $time));

              $staff_manual_attendance =  $staffInfo->insertComments('atif_attendance_staff.staff_attendance_in',$data);
              $tableFlag = 'In_Table';
           } else {
              
              $time = strtotime($missTap);
              $data['time'] = date("H:i", strtotime('-1 minutes', $time));

              $staff_manual_attendance =  $staffInfo->insertComments('atif_attendance_staff.staff_attendance_out',$data);
              $tableFlag = 'Out_Table';
           
           }
        } else {
            $time = strtotime($missTap);
            $data['time'] = date("H:i", strtotime('+1 minutes', $time));

            $staff_manual_attendance =  $staffInfo->insertComments('atif_attendance_staff.staff_attendance_in',$data);
            $tableFlag = 'In_Table';
        }
          $description = $request->input('description');
          $title_description = array(
            'staff_id' => $staff_id,
            'form_number' => $form_number,
            'date' => $date,
            'description' => $description,
            'attendance_id' => $staff_manual_attendance,
            'attendance_type' => $tableFlag,
            'location_id' => 18,
            'created' => $timeNow,
            'register_by' => $userID,
            'modified' => time(),
            'modified_by' => $userID,
            'record_deleted' => 0
          );




        $insert_description =  $staffInfo->insertComments('atif_gs_events.absenta_manual_description',$title_description);

          $hr_forms_log=new hr_forms_log;
          $hr_forms_log->staff_id=$staff_id;
          $hr_forms_log->form_number=$form_number;
          $hr_forms_log->type='insert';
          $hr_forms_log->effected_entry_table='atif_gs_events.absenta_manual_description';
          $hr_forms_log->effected_table_id=$insert_description;
          $hr_forms_log->title='Miss Tap';
          $hr_forms_log->description=$description;
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('H:i:s');
          $hr_forms_log->time_details=$missTap.'///'.$date;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();

          $this->adjustmentApproval($staff_id,'atif_gs_events.absenta_manual_description',$insert_description,5,$userID,$userID);

        
        $userData = $staffInfo->get_Staff_Info($userID);

        $timestamp = strtotime( date('H:i', $timeNow) ) + 18000;
        
        $data = array(
            'date' => date('Y-m-d', $timeNow),
            'userInfo' => $userData,
            'modified' => gmdate("l, d M Y", $timeNow) . " at " .  date('h:i:s A', $timestamp),
            'missed_id' =>$staff_manual_attendance,
            'tableFlag' => $tableFlag,
            'staff_id' =>  $title_description['staff_id'],
            'staff_info' =>  $staffAdjustment->getStaffInfo( $title_description['staff_id']),
            'missed_date' => gmdate("l, d M Y", $timeNow),
            'description' => $title_description['description'],
            'tap' => date('h:i A', strtotime($data['time']) ), 
            'created' =>  gmdate("jS M Y", $timeNow) ,
            'Last_id'=>$insert_description,
            'Missed_id'=>$staff_manual_attendance,
            'Table_name'=>$tableFlag
          );

          


        return  $data;
      }


    /**********************************************************************
    * Add Leave
    * 
    * @input:   Staff ID, date, leave_from,leave_to,leave_comment,paid_compensation
    * @output:  Insert Leave into atif_gs_events.leave_application
    * Date:     1st Nov (Wed)
    ***********************************************************************/

    public function addLeave(Request $request){


        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $form_no = $request->input('leave_form_no');
        $staff_id = $request->input('staff_id');
        $leave_title = $request->input('leave_title');
        $leave_type = $request->input('leave_type');
        $leave_from = $request->input('leave_from');
        $leave_to = $request->input('leave_to');
        $leave_comment = $request->input('leave_comment');
        $paid_compensation = $request->input('paid_compensation');
        $time_from = $request->input('time_from');
        $time_to = $request->input('time_to');
        $form_number = $request->input('form_number');




        $data = array(
          'form_no' => $form_number,
          'leave_type' => $leave_type,
          'staff_id' => $staff_id,
          'leave_title' => $leave_title,
          'leave_from' => $leave_from,
          'leave_to' => $leave_to,
          'paid_compensation' => $paid_compensation,
          'leave_description' => $leave_comment,
          'time_from' => $time_from,
          'time_to' => $time_to,
          'created' => time(),
          'created_by' =>$userID,
          'modified' => time(),
          'modified_by' => $userID,
          'record_deleted' => 0
        );
         if($leave_type==1){
            $l_leave_type='Haj';
              
         }elseif ($leave_type==2) {
            $l_leave_type='Education';
              
         }elseif ($leave_type==3) {
              $l_leave_type='Seminar';
              
         }elseif ($leave_type==4) {
            $l_leave_type='Exhibition';
         }elseif ($leave_type==5) {
            $l_leave_type='Personal';
         }
         if($time_from==""){
            $time_from='none';
         }
         if($time_to==""){
            $time_to='none';
         }

          $leave =  $staffInfo->insertComments('atif_gs_events.leave_application',$data);
          $hr_forms_log=new hr_forms_log;
          $hr_forms_log->staff_id=$staff_id;
          $hr_forms_log->form_number=$form_number;
          $hr_forms_log->type='insert';
          $hr_forms_log->effected_entry_table='atif_gs_events.leave_application';
          $hr_forms_log->effected_table_id=$leave;
          $hr_forms_log->title=$leave_title;
          $hr_forms_log->leave_type=$l_leave_type;
          $hr_forms_log->description=$leave_comment;
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('H:i:s');
          $hr_forms_log->time_details=$leave_from.'///'.$leave_to.'///'.$time_from.'///'.$time_to;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();

          $this->adjustmentApproval($staff_id,'atif_gs_events.leave_application',$leave,2,$userID,$userID);

        echo $leave;
    }

    /**********************************************************************
    * Add Penalty
    * @input:   Staff ID, date, penalty_from,penalty_to,penalty_comment
    * @output:  Insert Leave into atif_gs_events.daily_penalty
    * Date:     3rd Nov (Fri)
    ***********************************************************************/

    public function addPenalty(Request $request){

      $userID = Sentinel::getUser()->id;
      $penalty_title = $request->input('penalty_title');
      $penalty_day = $request->input('penalty_day');
      $penalty_from = $request->input('penalty_from');
      $penalty_to = $request->input('penalty_to');
      $penalty_description = $request->input('penalty_description');
      $staff_id = $request->input('staff_id');
      $form_number = $request->input('form_number');

      $data = array(

          'form_number' => $form_number,
          'penalty_title' => $penalty_title,
          'penalty_day' => $penalty_day,
          'penalty_from' => $penalty_from,
          'penalty_to' => $penalty_to,
          'staff_id' => $staff_id,
          'penalty_description'=>$penalty_description,
          'created' => time(),
          'created_by' => $userID,
          'modified' => time(),
          'modified_by' => $userID,
          'record_deleted' => 0
      );

      $staffInfo = new StaffInformationModel();


      $penalty =  $staffInfo->insertComments('atif_gs_events.daily_penalty',$data);

      if($penalty > 0){

        $where = array(
          'id' => $staff_id
        );
        $staffDescription = $staffInfo->get('atif.staff_registered',$where);
        $leaveBalance = $staffDescription[0]->leave_balance;
        $leaveBalance = $leaveBalance - $penalty_day;
        
        $update = array(
          'leave_balance' => $leaveBalance
        );

        $updation = $staffInfo->update_data('atif.staff_registered',$where,$update);


      }

          $hr_forms_log=new hr_forms_log;
          $hr_forms_log->staff_id=$staff_id;
          $hr_forms_log->form_number=$form_number;
          $hr_forms_log->type='insert';
          $hr_forms_log->effected_entry_table='atif_gs_events.daily_penalty';
          $hr_forms_log->effected_table_id=$penalty;
          $hr_forms_log->title=$penalty_title;
          $hr_forms_log->description=$penalty_description;
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('H:i:s');
          $hr_forms_log->time_details=$penalty_day.'///'.$penalty_from.'///'.$penalty_to;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();
          $this->adjustmentApproval($staff_id,'atif_gs_events.daily_penalty',$penalty,3,$userID,$userID);

      
		$id = array( "id" => $penalty );
		echo json_encode($id);

    }

    /**********************************************************************
    * Add Adjustment
    * @input:   Staff ID, dajustment_title,adjustment_day,adjustment_comments
    * @output:  Insert Leave into atif_gs_events.exception_adjustment
    * Date:     4th Nov (Fri)
    ***********************************************************************/

    public function addAdjustment(Request $request){

      $userID = Sentinel::getUser()->id;
      $adjustment_title = $request->input('adjustment_title');
      $adjustment_no = $request->input('adjustment_no');
      $adjustment_description = $request->input('adjustment_description');
      $staff_id = $request->input('staff_id');
      $form_number = $request->input('form_number');
      $events = new daily_attendance_report;
	  $adjustment=0;

      $data = array(
        'form_number' => $form_number,
        'staff_id' => $staff_id,
        'adjustment_title' => $adjustment_title,
        'adjustment_day' => $adjustment_no,
        'adjustment_description'=> $adjustment_description,
        'created' => time(),
        'created_by' => $userID,
        'modified' => time(),
        'modified_by' => $userID,
        'record_deleted' => 0
      );


      $staffInfo = new StaffInformationModel();
      $adjustment =  $staffInfo->insertComments('atif_gs_events.exception_adjustment',$data);
      
      if($adjustment > 0){

        $where = array(
          'id' => $staff_id
        );
        $staffDescription = $staffInfo->get('atif.staff_registered',$where);
        $leaveBalance = $staffDescription[0]->leave_balance;
        $leaveBalance = $leaveBalance + $adjustment_no;
        $update = array(
          'leave_balance' => $leaveBalance
        );

        $updation = $staffInfo->update_data('atif.staff_registered',$where,$update);

      }

          $hr_forms_log=new hr_forms_log;
          $hr_forms_log->staff_id=$staff_id;
          $hr_forms_log->form_number=$form_number;
          $hr_forms_log->type='insert';
          $hr_forms_log->effected_entry_table='atif_gs_events.exception_adjustment';
          $hr_forms_log->effected_table_id=$adjustment;
          $hr_forms_log->title=$adjustment_title;
          $hr_forms_log->description=$adjustment_description;
          $hr_forms_log->date=date('Y-m-d');
          $hr_forms_log->time=date('H:i:s');
          $hr_forms_log->time_details=$adjustment_no;
          $hr_forms_log->created_by=$userID;
          $hr_forms_log->updated_by=$userID;
          $hr_forms_log->save();
          $this->adjustmentApproval($staff_id,'atif_gs_events.exception_adjustment',$adjustment,4,$userID,$userID);

	  
	  $id = array("id"=>$adjustment);
      $exception_adjustment_array = array('exceptional_adjustments' =>$adjustment_no);
      // $events->updateExceptionalLeave($staff_id,$exception_adjustment_array);
      
      
	  echo json_encode($id);
	  
    }


    public function getDailyReport(Request $request){


      $userID = Sentinel::getUser()->id;
      $staffInfo = new StaffInformationModel();
      $date = $request->input('date');
      $staff_id = $request->input('staff_id');
      $getReport = $staffInfo->getDailyReportData($staff_id,$date,$date);
      echo json_encode($getReport);


    }




    public function getYesterdayReport(Request $request){

      $userID = Sentinel::getUser()->id;
      $staffInfo = new StaffInformationModel();
      $date = $request->input('date');
      $staff_id = $request->input('staff_id');
      $getReport = $staffInfo->getYesterdayReportData($date,$staff_id);
      echo json_encode($getReport);

    }

    public function getWeeklySheetTap(Request $request){

      $userID = Sentinel::getUser()->id;
      $staffInfo = new StaffInformationModel();
      $date = $request->input('date');
      $staff_id = $request->input('staff_id');
      $getReport = $staffInfo->selectWeeklySheetTap($staff_id,$date);
      echo json_encode($getReport);

    } 


    public function get_updateLeave(Request $request){
      $staffInfo = new StaffInformationModel();
      $id = $request->input('id');
      $where  = array(
        'id' => $id
      );

      $getLeave = $staffInfo->get('atif_gs_events.leave_application',$where);
      echo json_encode($getLeave);
    }


    public function LeaveUpdate(Request $request){

      $userID = Sentinel::getUser()->id;
      $staffInfo = new StaffInformationModel();
      $id = $request->input('id');
      $staff_id = $request->input('staffID');
      $leave_title = $request->input('leave_title');
      $leave_type = $request->input('leave_type');
      $leave_from = $request->input('leave_from');
      $leave_to = $request->input('leave_to');
      $leave_comment = $request->input('leave_comment');
      $approve_from = $request->input('approve_from');
      $approve_to = $request->input('approve_to');
      $paid_compensation = $request->input('paid_compensation');
      $paid_compensation_percentage = $request->input('paid_compensation_percentage');
      $LeaveApproval = $request->input('LeaveApproval');
      $leave_approve_time_from = $request->input('leave_approve_time_from');
      $leave_approve_time_to = $request->input('leave_approve_time_to');


      // Check Leave Approval IF Leave Approval is 0 leave_approve_time_from = null
      // and leave_approve_time_to = null

      if($LeaveApproval == 0){
        $leave_approve_time_from = null;
        $leave_approve_time_to = null;
      }

      $where = array(
        'id' => $id
      );

      $update = array(
        'leave_type'=> $leave_type,
        'leave_title' => $leave_title,
        'leave_from' => $leave_from,
        'leave_to' => $leave_to,
        'paid_compensation' => $paid_compensation,
        'paid_percentage' => $paid_compensation_percentage,
        'leave_approve_status' => $LeaveApproval,
        'leave_approve_date_from' => $approve_from,
        'leave_approve_date_to' => $approve_to,
        'leave_description' => $leave_comment,
        'leave_approve_time_from' => $leave_approve_time_from,
        'leave_approve_time_to' => $leave_approve_time_to,
        'modified' => time() ,
        'modified_by' => $userID

      );


      $update_id = $staffInfo->update_data('atif_gs_events.leave_application',$where,$update);

     // Check wheather Leave Approval = 1 then insert or update in leave approval table depend on situation
      
      if($LeaveApproval == 1 && $leave_approve_time_from != null && $leave_approve_time_to != null){

        $dateRange =  $this->GetDays($approve_from,$approve_to);
        for($j=0; $j<sizeof($dateRange); $j++){

          $flag = 0;
          $where = array(
            'staff_id' => $staff_id,
            'leave_application_id' => $id
          );

          $existData = $staffInfo->get_leaveApproved($where);

          
          // FLAG IS FOR INDICATION THAT THE DATA IS INSERTED OR NOT.
          $flag = $this->getFlagForDateAvailable($existData,$dateRange,$j);
         

          if(empty($existData) || $flag == 1){
            $insertData = array(
              'leave_application_id' => $id,
              'date' => $dateRange[$j],
              'staff_id' => $staff_id,
              'time_from' => $leave_approve_time_from,
              'time_to' => $leave_approve_time_to,
              'created' => time(),
              'register_by' => Sentinel::getUser()->id,
              'modified' => time(),
              'modified_by' =>Sentinel::getUser()->id,
              'record_deleted' => 0
            );
            $staffInfo->insertComments('atif_gs_events.leave_approved',$insertData);
          }else{
            for($k = 0;$k < sizeof($existData);$k++){
                
              $whereExistData = array(
                'id' => $existData[$k]->id
              );
              // Check Wheather the Data is in DateRange
              if(in_array($existData[$k]->date, $dateRange)){
                 $updateData = array(
                  'time_from' => $leave_approve_time_from,
                  'time_to' => $leave_approve_time_to,
                  'modified' => time(),
                  'modified_by' =>Sentinel::getUser()->id,
                  'record_deleted' => 0
                );

                 $staffInfo->update_data('atif_gs_events.leave_approved',$whereExistData,$updateData);
              }else{
               // IF DATERANGE IS NOT MATCH THEN RECORD DELETED = 1
                $updateData = array(
                  'record_deleted' => 1
                );
                $staffInfo->update_data('atif_gs_events.leave_approved',$whereExistData,$updateData);
              }

            }

          }

        }
      }

          

      echo $update_id;
    }


    // Get Manual Address
    public function getManualAttendance(Request $request){

      $staffInfo = new StaffInformationModel();

      $date = $request->input('date');
      $staff_id = $request->input('staff_id');
      $atd_tap = $staffInfo->getAttendance($date,$staff_id);
      echo json_encode($atd_tap);
    }


   

     /**********************************************************************
    * Staff Information - TIF B
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  JSON encoded Staff TIF-B Fields
    * Date:     Jul 26, 2017 (Wed)
    ***********************************************************************/
    public function getStaff_tifB(Request $request){
        
        $staffID = $request->input('staff_id');
        $staffInfo = new StaffInformationModel();

        $staff['education'] = $staffInfo->getStaffQualification($staffID);
        $staff['employment'] = $staffInfo->getStaffEmployment($staffID);
        $staff['fs'] = $staffInfo->getStaffFS($staffID);
        $staff['sc'] = $staffInfo->getStaffChild($staffID);
        $staff['ac'] = $staffInfo->getStaffAlternateContact($staffID);
        $staff['other'] = $staffInfo->getStaffOtherInfo($staffID);
        
        echo json_encode($staff);
    }



    /**********************************************************************
    * Staff Information - TIF A
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  HTML form, Staff TIF-B Fields
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function getStaff_tifA(Request $request){
    $html = '';
    if(count($request)){
      $GTID = $request->input('GTID');
      $staffInfo = new StaffInformationModel();



      $staff_2_SR = array();
      $MatrixRole_FR = array();


      /* Declaring Role 1 Variables */
      /******************************/
      $staff_PR[0]['gt_id'] = '';
      $staff_PR[0]['name_code'] = '';
      $staff_PR[0]['abridged_name'] = '';
      $staff_PR[0]['c_topline'] = '';
      $staff_PR[0]['c_bottomline'] = '';
      $staff_PR[0]['gp_id'] = '';
      $staff_PR[0]['report_ok'] = '';
      $staff_PR[0]['reporting_line'] = '';
      $staff_PR[0]['role_title_tl'] = '';

      $staff_PR_PR[0]['gt_id'] = '';
      $staff_PR_PR[0]['name_code'] = '';
      $staff_PR_PR[0]['abridged_name'] = '';
      $staff_PR_PR[0]['c_topline'] = '';
      $staff_PR_PR[0]['c_bottomline'] = '';
      $staff_PR_PR[0]['gp_id'] = '';
      $staff_PR_PR[0]['report_ok'] = '';
      $staff_PR_PR[0]['reporting_line'] = '';
      $staff_PR_PR[0]['role_title_tl'] = '';

      $staff_SR[0]['gt_id'] = '';
      $staff_SR[0]['name_code'] = '';
      $staff_SR[0]['abridged_name'] = '';
      $staff_SR[0]['c_topline'] = '';
      $staff_SR[0]['c_bottomline'] = '';
      $staff_SR[0]['gp_id'] = '';
      $staff_SR[0]['report_ok'] = '';
      $staff_SR[0]['reporting_line'] = '';
      $staff_SR[0]['role_title_tl'] = '';

      $staff_SR_PR[0]['gt_id'] = '';
      $staff_SR_PR[0]['name_code'] = '';
      $staff_SR_PR[0]['abridged_name'] = '';
      $staff_SR_PR[0]['c_topline'] = '';
      $staff_SR_PR[0]['c_bottomline'] = '';
      $staff_SR_PR[0]['gp_id'] = '';
      $staff_SR_PR[0]['report_ok'] = '';
      $staff_SR_PR[0]['reporting_line'] = '';
      $staff_SR_PR[0]['role_title_tl'] = '';

      /* Declaring Role 2 Variables */
      /******************************/
      $staff_2_PR[0]['gt_id'] = '';
      $staff_2_PR[0]['name_code'] = '';
      $staff_2_PR[0]['abridged_name'] = '';
      $staff_2_PR[0]['c_topline'] = '';
      $staff_2_PR[0]['c_bottomline'] = '';
      $staff_2_PR[0]['gp_id'] = '';
      $staff_2_PR[0]['report_ok'] = '';
      $staff_2_PR[0]['reporting_line'] = '';
      $staff_2_PR[0]['role_title_tl'] = '';

      $staff_2_PR_PR[0]['gt_id'] = '';
      $staff_2_PR_PR[0]['name_code'] = '';
      $staff_2_PR_PR[0]['abridged_name'] = '';
      $staff_2_PR_PR[0]['c_topline'] = '';
      $staff_2_PR_PR[0]['c_bottomline'] = '';
      $staff_2_PR_PR[0]['gp_id'] = '';
      $staff_2_PR_PR[0]['report_ok'] = '';
      $staff_2_PR_PR[0]['reporting_line'] = '';
      $staff_2_PR_PR[0]['role_title_tl'] = '';


      $staff_2_SR_PR[0]['gt_id'] = '';
      $staff_2_SR_PR[0]['name_code'] = '';
      $staff_2_SR_PR[0]['abridged_name'] = '';
      $staff_2_SR_PR[0]['c_topline'] = '';
      $staff_2_SR_PR[0]['c_bottomline'] = '';
      $staff_2_SR_PR[0]['gp_id'] = '';
      $staff_2_SR_PR[0]['report_ok'] = '';
      $staff_2_SR_PR[0]['reporting_line'] = '';
      $staff_2_SR_PR[0]['role_title_tl'] = '';















      /* Load Model */
      $staffData = $staffInfo->get_StaffInfo($GTID);
      $StaffReportee = array();
      $StaffReportee_SC = array();
      $StaffReportee2 = array();
      $StaffReportee2_SC = array();
      $staffTTProfile = array();




      $staffTTProfile = $staffInfo->getStaff_TTProfile($GTID);
      $Timing_Profile = '';
      $Timing_AvgWeekHrs = '';
      $Timing_StdIN = '';
      $Timing_StdOut = '';
      $Timing_FriOut = '';
      $Timing_SatHrs = '';
      $Timing_SatOffs = '';
      $Timing_SatWorking = '';
      $Timing_SatOff = '';
      $Timing_ExtOut = '';
      $Timing_ExtFrq = '';
      $Timing_JulCat = '';
      $Timing_FriOutF = '';
      $Timing_MonIn = '';
      $Timing_TueIn = '';
      $Timing_WedIn = '';
      $Timing_ThuIn = '';
      $Timing_FriIn = '';
      $Timing_SatIn = '';
      $Timing_SunIn = '';
      $Timing_MonOut = '';
      $Timing_TueOut = '';
      $Timing_WedOut = '';
      $Timing_ThuOut = '';
      $Timing_FriOut = '';
      $Timing_SatOut = '';
      $Timing_SunOut = '';
      if(!empty($staffTTProfile)){
        $Timing_Profile = $staffTTProfile[0]['time_profile'];
        $Timing_AvgWeekHrs = $staffTTProfile[0]['avg_week_hrs'];
        $Timing_StdIN = $staffTTProfile[0]['std_in'];
        $Timing_StdOut = $staffTTProfile[0]['std_out'];
        $Timing_FriOutF = $staffTTProfile[0]['fri_out'];
        $Timing_SatHrs = $staffTTProfile[0]['sat_hrs'];
        $Timing_SatOffs = $staffTTProfile[0]['sat_off'];
        $Timing_SatWorking = $staffTTProfile[0]['sat_working'];
        $Timing_SatOff = $staffTTProfile[0]['sat_off'];
        $Timing_ExtOut = $staffTTProfile[0]['ext_time'];
        $Timing_ExtFrq = $staffTTProfile[0]['ext_frequency'];
        $Timing_JulCat = $staffTTProfile[0]['ext_july'];

        if($staffTTProfile[0]['ty_name'] != 'Standard'){
          $Timing_MonIn = $staffTTProfile[0]['mon_in'];
          $Timing_TueIn = $staffTTProfile[0]['tue_in'];
          $Timing_WedIn = $staffTTProfile[0]['wed_in'];
          $Timing_ThuIn = $staffTTProfile[0]['thu_in'];
          $Timing_FriIn = $staffTTProfile[0]['fri_in'];
          $Timing_SatIn = $staffTTProfile[0]['sat_in'];
          $Timing_SunIn = $staffTTProfile[0]['sun_in'];
          $Timing_MonOut = $staffTTProfile[0]['mon_out'];
          $Timing_TueOut = $staffTTProfile[0]['tue_out'];
          $Timing_WedOut = $staffTTProfile[0]['wed_out'];
          $Timing_ThuOut = $staffTTProfile[0]['thu_out'];
          $Timing_FriOut = $staffTTProfile[0]['fri_out'];
          $Timing_SatOut = $staffTTProfile[0]['sat_out'];
          $Timing_SunOut = $staffTTProfile[0]['sun_out'];
        }
      }





      //echo $staffData[0]['role_id']; exit;

      $StaffReportee_TRP = array();
      if(!empty($staffData[0]['role_id'])){
        $StaffReportee = $staffInfo->get_StaffReporteeInfo($staffData[0]['role_id']);
        $StaffReportee_SC = $staffInfo->get_StaffReporteeSCInfo($staffData[0]['role_id']);


        




        $i = 0;
        foreach ($StaffReportee as $rr) {
          if($StaffReportee[$i]['report_ok'] == 'TRP'){
            $StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo($StaffReportee[$i]['role_id'], 'INDIR', $StaffReportee[$i]['name_code']);

            




            foreach ($StaffReportee_TRP as $trp) {
              array_push($StaffReportee, $trp);
            }
          }
          $i++;
        }




        
      }



     # var_dump($StaffReportee); exit;

      $StaffReportee2 = array();
      if(!empty($staffData[1]['role_id'])){
        $StaffReportee2 = $staffInfo->get_StaffReporteeInfo($staffData[1]['role_id']);
        $StaffReportee2_SC = $staffInfo->get_StaffReporteeSCInfo($staffData[1]['role_id']);


        
        $i = 0;
        foreach ($StaffReportee2 as $rr) {
          if($StaffReportee2[$i]['report_ok'] == 'TRP'){
            $StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo($StaffReportee2[$i]['role_id'], 'INDIR', $StaffReportee2[$i]['name_code']);
            foreach ($StaffReportee_TRP as $trp) {
              array_push($StaffReportee2, $trp);
            }
          }
          $i++;
        }
      }
      $i = 0;



      if(!empty($staffData[0]['pm_report_to'])){
        $staff_PR = $staffInfo->get_StaffReportingInfo_CLTRole($staffData[0]['pm_report_to'], $GTID);
      }else{
        $staff_PR = $staffInfo->get_StaffMatrixRole_CLT_Reportoo($GTID);
        if(empty($staff_PR)){
          $staff_PR = $staffInfo->get_StaffReportingInfo_SBJRole($GTID);
        }

        if(empty($staff_PR)){
          $staff_PR[0]['gt_id'] = '';
          $staff_PR[0]['name_code'] = '';
          $staff_PR[0]['abridged_name'] = '';
          $staff_PR[0]['c_topline'] = '';
          $staff_PR[0]['c_bottomline'] = '';
          $staff_PR[0]['gp_id'] = '';
          $staff_PR[0]['report_ok'] = '';
          $staff_PR[0]['reporting_line'] = '';
          $staff_PR[0]['role_title_tl'] = '';
        }
      }
      if(!empty($staffData[0]['sc_report_to'])){
        $staff_SR = $staffInfo->get_StaffReportingInfo($staffData[0]['sc_report_to']);
      }
      if(!empty($staff_PR[0]['pm_report_to'])){
        $staff_PR_PR = $staffInfo->get_StaffReportingInfo($staff_PR[0]['pm_report_to']);
      }
      if(!empty($staff_SR[0]['pm_report_to'])){
        $staff_SR_PR = $staffInfo->get_StaffReportingInfo($staff_SR[0]['pm_report_to']);
      }



      if(!empty($staffData[1]['pm_report_to'])){
        $staff_2_PR = $staffInfo->get_StaffReportingInfo($staffData[1]['pm_report_to']);
      }
      if(!empty($staffData[1]['sc_report_to'])){
        $staff_2_SR = $staffInfo->get_StaffReportingInfo($staffData[1]['sc_report_to']);
      }
      if(!empty($staff_2_PR[0]['pm_report_to'])){
        $staff_2_PR_PR = $staffInfo->get_StaffReportingInfo($staff_2_PR[0]['pm_report_to']);
      }
      if(!empty($staff_2_SR[0]['pm_report_to'])){
        $staff_2_SR_PR = $staffInfo->get_StaffReportingInfo($staff_2_SR[0]['pm_report_to']);
      }



      if(empty($staff_2_SR)){
        $staff_2_SR[0]['gt_id'] = '';
        $staff_2_SR[0]['name_code'] = '';
        $staff_2_SR[0]['abridged_name'] = '';
        $staff_2_SR[0]['c_topline'] = '';
        $staff_2_SR[0]['c_bottomline'] = '';
        $staff_2_SR[0]['gp_id'] = '';
        $staff_2_SR[0]['report_ok'] = '';
        $staff_2_SR[0]['reporting_line'] = '';
        $staff_2_SR[0]['role_title_tl'] = '';
      }



      $staffData_MatrixCLT = $staffInfo->get_StaffMatrixRole_CLT($GTID);
      $staffData_MatrixSBJ = $staffInfo->get_StaffMatrixRole_SBJ($GTID);



      $totalPF = 0;
      $totalP = 0;
      $totalSC = 0;
      $TotalStaffMembers = 0;
      $TotalStudentMemebers = 0;
      if(!empty($staffData)){
         $TotalStaffMembers = $staffData[0]['total_staff_members'];
      }
      foreach ($StaffReportee as $cal1) {
        if($cal1['reporting_type'] == 'FP'){
          $totalPF++;
        }
        $totalP++;
      }




      $totalPF2 = 0;
      $totalP2 = 0;
      $totalSC2 = 0;
      $TotalStaffMembers2 = 0;
      $TotalStudentMemebers2 = 0;
      if(!empty($staffData[1])){
         $TotalStaffMembers2 = $staffData[1]['total_staff_members'];
      }
      foreach ($StaffReportee2 as $cal2) {
        if($cal2['reporting_type'] == 'FP'){
          $totalPF2++;
        }
        $totalP2++;
      }

      

      $reporteesFundamental = $totalPF + $totalPF2;
      $reportteesSecondary = $totalSC + $totalSC2;
      $reporteesPrimary = $totalP + $totalP2;
      $reporteesTotal = $totalP+count($StaffReportee_SC)+$totalP2+count($StaffReportee2_SC);
      $membersTotal = $TotalStaffMembers + $TotalStaffMembers2;
      $classRole = '-';
      $roleTeachingTotal = 0;
      $roleTeachingBlocks = 0;
      $roleTeachingStudents = 0;
      $uniqueStudentsTotal = $staffInfo->getUniqueStudents($GTID);
      $studentBlocksTotal = 0;
      if(!empty($staffData_MatrixCLT)){
        $classRole = $staffData_MatrixCLT[0]['gp_id'];
        $roleTeachingStudents += $staffData_MatrixCLT[0]['students'];
      }
      if(!empty($staffData_MatrixSBJ)){
        foreach ($staffData_MatrixSBJ as $data) {
          $roleTeachingTotal++;
          $roleTeachingBlocks += $data['block'];
          $roleTeachingStudents += $data['students'];
        }
      }









      $html .= '<link href="'.URL("/css/staffLayout.css").'" rel="stylesheet" type="text/css" />';
      $html .= '
          <div class="RightInformation">
              <div class="RightInformation_contentSection" style="padding:0;">
                  <?php /* ?><?php */ ?>
                    <div class="summarySection col-md-12">
                      <div class="col-md-6">
                          <div class="col-md-6 paddingLeft0">
                              <div class="primaryReporting">
                                    <h4 class="PrimaryName"><span class="namePrimaryCode">'.$staff_PR[0]['name_code'].'</span><span class="abridgedPrimaryName">'.$staff_PR[0]['abridged_name'].'</span></h4>
                                    <h5 class="PrimaryTopLine">'.$staff_PR[0]['c_topline'].'</h5>
                                    <h5 class="PrimaryBottomLine">'.$staff_PR[0]['c_bottomline'].'</h5>
                                </div><!-- primaryReporting -->
                            </div><!-- col-md-6 -->
                            <div class="col-md-6 paddingRight0">
                              <div class="reportingPersonal">
                                    <h4 class="PrimaryName"><span class="namePrimaryCode">'.$staffData[0]['name_code'].'</span><span class="abridgedPersonalName">'.$staffData[0]['abridged_name'].'</span></h4>
                                    <h5 class="PrimaryTopLine">'.$staffData[0]['c_topline'].'</h5>
                                    <h5 class="PrimaryBottomLine">'.$staffData[0]['c_bottomline'].'</h5>
                                </div><!-- primaryReporting -->
                            </div><!-- col-md-6 -->
                        </div><!-- col-md-6 -->
                        <div class="col-md-6">
                          <div class="col-md-6 paddingLeft0 paddingRight0">
                              <h6 class="normalFont pull-right"><span class="leftLab3">Fundamental Reportees:</span> <strong> '.$reporteesFundamental.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Primary Reportees:</span> <strong> '.$reporteesPrimary.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Reportees:</span> <strong> '.$reporteesTotal.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Members:</span> <strong> '.$membersTotal.' </strong></h6>
                            </div><!-- -->
                            <div class="col-md-6 paddingLeft0 paddingRight0">
                                <h6 class="normalFont pull-right"><span class="leftLab3"> Total Teaching Roles:</span> <strong>'.$roleTeachingTotal.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Class Role:</span> <strong> '.$classRole.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Teaching Blocks:</span> <strong>'.$roleTeachingBlocks.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Teaching Students:</span> <strong> '.$roleTeachingStudents.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Unique Students:</span> <strong> '.$uniqueStudentsTotal.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Student Blocks:</span> <strong> '.$studentBlocksTotal.' </strong></h6>
                            </div><!-- -->
                        </div><!-- col-md-6 -->
                    </div><!-- summarySection -->
                  <hr style="margin-top: 5px;" />
                    <div class="TimingSection col-md-12">
                      <div class="col-md-3 paddingLeft0 text-center ">
                          <h5>Timing Profile & Hours</h5>
                            <table width="100%" border="0" class="TimingSectionTable">
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="2">Timing Profile</td>
                              </tr>
                              <tr>
                                <td colspan="2"><h4 style="margin:0;font-size:16px;font-weight:bold;"> '.$Timing_Profile.' </h4></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="2">Average Weekly Hours</td>
                              </tr>
                              <tr>
                                <td colspan="2"><h4 style="margin:0;font-size:16px;font-weight:bold;"> '.$Timing_AvgWeekHrs.' </h4></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                            </table>
                        </div><!-- col-md-3 -->
                        <div class="col-md-3 paddingLeft0 text-center">
                          <h5>Full Time Parameters</h5>
                            <table width="100%" border="0" class="TimingSectionTable">
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-left">Standard IN</td>
                                <td class="text-right"><strong> '.$Timing_StdIN.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">Standard OUT</td>
                                <td class="text-right"><strong> '.$Timing_StdOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-left">Friday OUT</td>
                                <td class="text-right"><strong> '.$Timing_FriOutF.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">Saturday Hrs</td>
                                <td class="text-right"><strong> '.$Timing_SatHrs.' </strong></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                            </table>
                        </div><!-- col-md-3 -->
                        <div class="col-md-3 paddingLeft0 text-center">
                          <h5>Secondary Parameters</h5>
                            <table width="100%" border="0" class="TimingSectionTable">
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-left">Sats Working</td>
                                <td class="text-right"><strong> '.$Timing_SatWorking.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">Sats Off</td>
                                <td class="text-right"><strong> '.$Timing_SatOffs.' </strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-left">Ext. Out</td>
                                <td class="text-right"><strong> '.$Timing_ExtOut.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">Ext. FREQ</td>
                                <td class="text-right"><strong> '.$Timing_ExtFrq.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">July Category</td>
                                <td class="text-right"><strong> '.$Timing_JulCat.' </strong></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                            </table>
                        </div><!-- col-md-3 -->
                        <div class="col-md-3 paddingLeft0 text-center">
                          <h5>Custom Timings</h5>
                            <table width="100%" border="0" class="TimingSectionTable">
                              <tr>
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Mon</td>
                                <td><strong> '.$Timing_MonIn.' </strong></td>
                                <td><strong> '.$Timing_MonOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Tue</td>
                                <td><strong> '.$Timing_TueIn.' </strong></td>
                                <td><strong> '.$Timing_TueOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Wed</td>
                                <td><strong> '.$Timing_WedIn.' </strong></td>
                                <td><strong> '.$Timing_WedOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Thu</td>
                                <td><strong> '.$Timing_ThuIn.' </strong></td>
                                <td><strong> '.$Timing_ThuOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Fri</td>
                                <td><strong> '.$Timing_FriIn.' </strong></td>
                                <td><strong> '.$Timing_FriOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Sat</td>
                                <td><strong> '.$Timing_SatIn.' </strong></td>
                                <td><strong> '.$Timing_SatOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                            </table>

                        </div><!-- col-md-3 -->
                    </div><!-- TimingSection -->
                    <hr style="margin-top: 5px;" />';






          $ij = 0;
          $html .= '<div class="MatrixRolesSection">
                      <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Matrix Role(s) <small>for Classes and Groups</small></h4>
                        <div class="col-md-12 paddingBottom40">
                          <div class="col-md-6 col-md-offset-3 paddingLeft0 paddingRight0">';


                      if(!empty($staffData_MatrixCLT)){
                      $ij = 1;
                      $html .= '<table width="100%" border="0" class="FunDaMentalReporting">
                                  <tr>';
                                  if(!empty($staff_PR[0]['junkRole']) && $staffData_MatrixCLT[0]['name_code'] == $staff_PR[0]['name_code']){
                                    $html .= '<td class="text-center FunRep">FR</td>';
                                  }
                          $html .= '<td class="text-center ClassTeach">'.$staffData_MatrixCLT[0]['clt_type'].'</td>
                                    <td class="text-center ClassHere">'.$staffData_MatrixCLT[0]['class'].'</td>
                                    <td class="text-center ClassSectionHere">'.$staffData_MatrixCLT[0]['gp_id'].'</td>
                                    <td class="text-center StuStrength">'.$staffData_MatrixCLT[0]['students'].'</td>
                                    <td class="text-center TopBottomLine">'.$staffData_MatrixCLT[0]['role_title_tl'].'<br />'.$staffData_MatrixCLT[0]['abridged_name'].'</td>
                                    <td class="text-center ReportingCodeName">'.$staffData_MatrixCLT[0]['name_code'].'</td>
                                  </tr>
                                </table>';

                                if($staffData_MatrixCLT[0]['lt_staff_id'] != ''){
                                  array_push($MatrixRole_FR, array('staff_id' => $staffData_MatrixCLT[0]['lt_staff_id'], 'abridged_name' => $staffData_MatrixCLT[0]['abridged_name']));
                                }
                      }
                $html .= '</div><!-- col-md-6 -->
                        </div><!-- col-md-12 -->';




              $foundFR = false;
              for($i=0; $i<=11; $i++){
              $html .= '<div class="col-md-12 paddingBottom20">
                          <div class="col-md-6">';

                            if($i==0){
                      if(!empty($staffData_MatrixSBJ[$i])){
                      $html .= '<table width="100%" border="0" class="FunDaMentalReportingChap" style="//border:1px solid #000;">
                                  <tr>
                                    <td width="10%" class="text-center SRNO">'.($i+1+$ij).'</td>
                                    <td width="20%" class="text-center SubjectName">'.$staffData_MatrixSBJ[$i]['gp_id'].'</td>
                                    <td width="5%" class="text-center StuStrength">'.$staffData_MatrixSBJ[$i]['students'].'</td>
                                    <td width="5%" class="text-center Blocks">'.$staffData_MatrixSBJ[$i]['block'].'</td>
                                    <td width="30%" class="text-center TopBottomLine">'.$staffData_MatrixSBJ[$i]['role_title_tl'].'<br />'.$staffData_MatrixSBJ[$i]['abridged_name'].'</td>
                                    <td width="10%" class="text-center NameCodeHere">'.$staffData_MatrixSBJ[$i]['name_code'].'</td>
                                    <td width="10%" class="text-center RankHere">'.$staffData_MatrixSBJ[$i]['reporting_line'].'</td>';
                                if(!empty($staff_PR[0]['junkRole']) && $staffData_MatrixSBJ[$i]['name_code'] == $staff_PR[0]['name_code'] && !$foundFR){
                                  $html .= '<td width="10%" class="text-center FunRep">FR</td>
                                            </tr>
                                          </table>';
                                  $foundFR = true;
                                }else{
                                  $html .= '<td width="10%" class="text-center FunRep White"></td>
                                            </tr>
                                          </table>';
                                }


                                if($staffData_MatrixSBJ[$i]['yt_staff_id'] != ''){
                                  array_push($MatrixRole_FR, array('staff_id' => $staffData_MatrixSBJ[$i]['yt_staff_id'], 'abridged_name' => $staffData_MatrixSBJ[$i]['abridged_name']));
                                }

                              }}else{if(!empty($staffData_MatrixSBJ[$i])){
                      $html .= '<table width="100%" border="0" class="FunDaMentalReportingChap">
                                  <tr>
                                    <td width="10%" class="text-center SRNO">'.($i+1+$ij).'</td>
                                    <td width="20%" class="text-center SubjectName">'.$staffData_MatrixSBJ[$i]['gp_id'].'</td>
                                    <td width="5%" class="text-center StuStrength">'.$staffData_MatrixSBJ[$i]['students'].'</td>
                                    <td width="5%" class="text-center Blocks">'.$staffData_MatrixSBJ[$i]['block'].'</td>
                                    <td width="30%" class="text-center TopBottomLine">'.$staffData_MatrixSBJ[$i]['role_title_tl'].'<br />'.$staffData_MatrixSBJ[$i]['abridged_name'].'</td>
                                    <td width="10%" class="text-center NameCodeHere">'.$staffData_MatrixSBJ[$i]['name_code'].'</td>
                                    <td width="10%" class="text-center RankHere">'.$staffData_MatrixSBJ[$i]['reporting_line'].'</td>';

                                if(!empty($staff_PR[0]['junkRole']) && $staffData_MatrixSBJ[$i]['name_code'] == $staff_PR[0]['name_code'] && !$foundFR){
                                  $html .= '<td width="10%" class="text-center FunRep">FR</td>
                                            </tr>
                                          </table>';
                                  $foundFR = true;
                                }else{
                                  $html .= '<td width="10%" class="text-center FunRep White"></td>
                                            </tr>
                                          </table>';
                                }
                                if($staffData_MatrixSBJ[$i]['yt_staff_id'] != ''){
                                  array_push($MatrixRole_FR, array('staff_id' => $staffData_MatrixSBJ[$i]['yt_staff_id'], 'abridged_name' => $staffData_MatrixSBJ[$i]['abridged_name']));
                                }
                              }}

                    $html .= '</div><!-- col-md-6 -->
                            <div class="col-md-6">';
                            if(!empty($staffData_MatrixSBJ[($i+12)])){
                      $html .= '<table width="100%" border="0" class="FunDaMentalReportingChap">
                                  <tr>
                                    <td class="text-center SRNO">'.($i+13+$ij).'</td>
                                    <td class="text-center SubjectName">'.$staffData_MatrixSBJ[($i+12)]['gp_id'].'</td>
                                    <td class="text-center StuStrength">'.$staffData_MatrixSBJ[($i+12)]['students'].'</td>
                                    <td class="text-center Blocks">'.$staffData_MatrixSBJ[($i+12)]['block'].'</td>
                                    <td class="text-center TopBottomLine">'.$staffData_MatrixSBJ[($i+12)]['role_title_tl'].'<br />'.$staffData_MatrixSBJ[($i+12)]['abridged_name'].'</td>
                                    <td class="text-center NameCodeHere">'.$staffData_MatrixSBJ[($i+12)]['name_code'].'</td>
                                    <td class="text-center RankHere">'.$staffData_MatrixSBJ[($i+12)]['reporting_line'].'</td>';

                                if(!empty($staff_PR[0]['junkRole']) && $staffData_MatrixSBJ[$i+12]['name_code'] == $staff_PR[0]['name_code'] && !$foundFR){
                                  $html .= '<td width="10%" class="text-center FunRep">FR</td>
                                            </tr>
                                          </table>';
                                        $foundFR = true;
                                }else{
                                  $html .= '<td width="10%" class="text-center FunRep White"></td>
                                            </tr>
                                          </table>';
                                }
                                if($staffData_MatrixSBJ[$i]['yt_staff_id'] != ''){
                                  array_push($MatrixRole_FR, array('staff_id' => $staffData_MatrixSBJ[$i]['yt_staff_id'], 'abridged_name' => $staffData_MatrixSBJ[$i]['abridged_name']));
                                }
                              }
                  $html .= '</div><!-- col-md-6 -->
                            
                        </div><!-- col-md-12 -->';
              }

    
        if(count($MatrixRole_FR)>=2){ 
            $html .= '<select id="soflow">
                       <option selected disabled>Select Fundamental Reporting</option>';

                //$MatrixRole_FR = array_unique($MatrixRole_FR);
                //$input = array_map("unserialize", array_unique(array_map("serialize", $input)));
                //$MatrixRole_FR = array_map("unserialize", array_unique(array_map("serialize", $MatrixRole_FR)));
                $MatrixRole_FR = array_unique($MatrixRole_FR, SORT_REGULAR);
                foreach ($MatrixRole_FR as $data) {
                  $html .= '<option value="'.$data['staff_id'].'">'.$data['abridged_name'].'</option>';
                }
            $html .= '</select>';
        }




          if(!empty($staff_PR[0]['junkRole'])){
            $staff_PR[0]['gt_id'] = '';
            $staff_PR[0]['name_code'] = '';
            $staff_PR[0]['abridged_name'] = '';
            $staff_PR[0]['c_topline'] = '';
            $staff_PR[0]['c_bottomline'] = '';
            $staff_PR[0]['gp_id'] = '';
            $staff_PR[0]['report_ok'] = '';
            $staff_PR[0]['reporting_line'] = '';
            $staff_PR[0]['role_title_tl'] = '';
          }

          $html .= '</div><!-- MatrixRolesSection -->
                    <hr style="margin-top: 5px;" />
                    <div class="orgChartSection">
                      <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Org Chart Roles(s) <small>for Non-Classroom Roles</small> | Role 1</h4>
                        <?php /* ?><?php */ ?>
                      <div class="no-padding col-md-10 col-md-offset-1">
                            <div class="blackSolidBorder">&nbsp;</div>
                            <div class="graySolidBorder">&nbsp;</div>
                            <div class="grayDashedBorder">&nbsp;</div>
                          <div class="col-md-12 ">
                              <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="secondLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>PRIMARY GRANDREPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_PR_PR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_PR_PR[0]['report_ok'].'</td>
                                        <td width="30%">1</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_PR_PR[0]['c_topline'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_PR_PR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_PR_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_PR_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                  
                                </div><!-- col-md-6 -->';
                                
                                if(!empty($staff_SR_PR[0]['gp_id'])):

                                $html .= '<div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="secondLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>SECONDARY GRANDREPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_SR_PR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_SR_PR[0]['report_ok'].'</td>
                                        <td width="30%">4</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_SR_PR[0]['c_topline'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_SR_PR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_SR_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_SR_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div>';
                              endif;

                            $html .= '</div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="firstLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>PRIMARY REPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40" bgcolor="#e5d998">'.$staff_PR[0]['gp_id'].'</td>
                                        <td width="30%" bgcolor="#ffff00">'.$staff_PR[0]['report_ok'].'</td>
                                        <td width="30%" bgcolor="#ffff00">2</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#e5d998">'.$staff_PR[0]['c_topline'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40" bgcolor="#f4ecfd">'.$staff_PR[0]['gt_id'].'</td>
                                        <td colspan="2" bgcolor="#f4ecfd">'.$staff_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#f4ecfd">'.$staff_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                                <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="firstLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>SECONDARY REPORTOO3</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_SR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_SR[0]['report_ok'].'</td>
                                        <td width="30%"> </td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_SR[0]['c_topline'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_SR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_SR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_SR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 col-md-offset-3 text-center" style="background:#e2e2e2;padding:15px;">
                                  <table width="100%" border="1" bgcolor="#fff" class="firstLevelReporting" style="background:#fff;" >
                                      <tr>
                                        <td bgcolor="#ade4f2"><h5 style="color:#;">FR</h5></td>
                                        <td colspan="2" bgcolor="#ade4f2"><h5>ROLE A</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40" bgcolor="#e5d998">'.$staffData[0]['gp_id'].'</td>
                                        <td width="30%" bgcolor="#ffff00">'.$staffData[0]['report_ok'].'</td>
                                        <td width="30%" bgcolor="#ffff00">3</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#e5d998">'.$staffData[0]['role_title_tl'].', '.$staffData[0]['role_title_bl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40" bgcolor="#ade4f2">'.$staffData[0]['roleCode'].'</td>
                                        <td colspan="2" bgcolor="#f4ecfd">'.$staffData[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 col-md-offset-3 text-center" style="background:none;padding:15px;">
                                  <table width="100%" border="1">
                                      <tr>
                                        <td colspan="2" width="33%" height="90">Fundamental<br />Primary<br /><h5><strong>'.$totalPF.'</strong></h5></td>
                                        <td colspan="2" width="33%" height="90">Total<br />Primary<br /><h5><strong>'.$totalP.'</strong></h5></td>
                                        <td colspan="2" width="33%" height="90">Total<br />Reportee<br /><h5><strong>'.($totalP+count($StaffReportee_SC)).'</strong></h5></td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" width="50%"  height="80">Total Staff<br />Members<br /><h5><strong>'.$TotalStaffMembers.'</strong></h5></td>
                                        <td colspan="3" width="50%"  height="80">Total Student<br />Members<br /><h5><strong>'.$TotalStudentMemebers.'</strong></h5></td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                        </div><!-- col-md-12 -->
                        <hr class="smallHR" />';

                 
                 $j = 1;
                 for($i=0; $i<=count($StaffReportee); $i++) {
                 $html .=  '
                          <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                            <div class="col-md-6">';
                              if(!empty($StaffReportee[$i])) {
                              $html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;font-size:12px;">
                                <tr>
                                  <td width="10%" bgcolor="#f5f5f5">'.($i+1).'</td>
                                  <td width="10%" bgcolor="#f5f5f5">'.$StaffReportee[$i]['reporting_type'].'</td>
                                  <td width="40%" bgcolor="#f4ecfd"><strong>'.$StaffReportee[$i]['abridged_name'].'</strong></td>
                                  <td width="20%" bgcolor="#ade4f2">'.$StaffReportee[$i]['roleCode'].'</td>
                                  <td width="20%" bgcolor="#ade4f2"> '.$StaffReportee[$i]['total_reportee'].' ('. $StaffReportee[$i]['total_staff_members'] .') </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#ffff00">'.$StaffReportee[$i]['report_ok'].'</td>';

                                  if($StaffReportee[$i]['reporting_type'] == 'INDIR'){
                                    $html .= '<td bgcolor="#ffff00">('.$StaffReportee[$i]['name_code'].')</td>';
                                  }else{
                                    $html .= '<td bgcolor="#ffff00"></td>';
                                  }

                                  $html .= '<td bgcolor="#e5d998">'.$StaffReportee[$i]['role_title_tl'].'</td>
                                  <td colspan="2" bgcolor="#e5d998">'.$StaffReportee[$i]['gp_id'].'</td>
                                </tr>
                              </table>';
                              }


                            $html .= '</div><!-- col-md-6 -->
                            <div class="col-md-6">';
                            if(!empty($StaffReportee_SC[$i])) {
                              $html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;font-size:12px;">
                                <tr>
                                  <td width="10%" bgcolor="#f5f5f5">'.($totalPF + $totalP + $j).'</td>
                                  <td width="10%" bgcolor="#f5f5f5">'.$StaffReportee_SC[$i]['reporting_type'].'</td>
                                  <td width="40%" bgcolor="#f4ecfd"><strong>'.$StaffReportee_SC[$i]['abridged_name'].'</strong></td>
                                  <td width="20%" bgcolor="#ade4f2">'.$StaffReportee_SC[$i]['roleCode'].'</td>
                                  <td width="20%" bgcolor="#ade4f2"> '.$StaffReportee_SC[$i]['total_reportee'].' ('. $StaffReportee_SC[$i]['total_staff_members'] .') </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#ffff00">'.$StaffReportee_SC[$i]['report_ok'].'</td>';

                                  if($StaffReportee_SC[$i]['reporting_type'] == 'INDIR'){
                                    $html .= '<td bgcolor="#ffff00">('.$StaffReportee_SC[$i]['name_code'].')</td>';
                                  }else{
                                    $html .= '<td bgcolor="#ffff00"></td>';
                                  }

                                  $html .= '<td bgcolor="#e5d998">'.$StaffReportee_SC[$i]['role_title_tl'].'</td>
                                  <td colspan="2" bgcolor="#e5d998">'.$StaffReportee_SC[$i]['gp_id'].'</td>
                                </tr>
                              </table>';
                              /*$html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                <tr>
                                  <td width="15%" bgcolor="#f5f5f5">'.($totalPF + $totalP + $j).'</td>
                                  <td width="15%" bgcolor="#f5f5f5">SC</td>
                                  <td width="15%" bgcolor="">INDIR</td>
                                  <td width="15%" bgcolor="">'.$StaffReportee_SC[$i]['roleCode'].'</td>
                                  <td width="40%" bgcolor="#f5f5f5">'.$StaffReportee_SC[$i]['role_title_tl'].'</td>
                                </tr>
                                <tr>
                                  <td bgcolor="#e1e1e1" colspan="2"> </td>
                                  <td bgcolor="#e1e1e1"> </td>
                                  <td bgcolor="#f5f5f5"><strong>'.$StaffReportee_SC[$i]['name_code'].'</strong></td>
                                  <td colspan="" bgcolor="#f5f5f5">'.$StaffReportee_SC[$i]['abridged_name'].'</td>
                                </tr>
                              </table>';*/

                              $j++;
                            }
                            $html .= '</div><!-- col-md-6 -->
                          </div><!-- col-md-12 -->';
                 }

                $html .= '
                    </div><!-- orgChartSection -->
                    <hr style="margin-top: 5px;" />';


          if(!empty($staffData[1])) {
          $html .= '<div class="orgChartSection">
                      <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Org Chart Roles(s) <small>for Non-Classroom Roles</small> | Role 2</h4>
                        <?php /* ?><?php */ ?>
                      <div class="no-padding col-md-10 col-md-offset-1">
                            <div class="blackSolidBorder">&nbsp;</div>
                            <div class="graySolidBorder">&nbsp;</div>
                            <div class="grayDashedBorder">&nbsp;</div>
                          <div class="col-md-12 ">
                              <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="secondLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>PRIMARY GRANDREPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_2_PR_PR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_2_PR_PR[0]['report_ok'].'</td>
                                        <td width="30%">1</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_PR_PR[0]['role_title_tl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_2_PR_PR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_2_PR_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_PR_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                  
                                </div><!-- col-md-6 -->
                                <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="secondLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>SECONDARY GRANDREPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_2_SR_PR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_2_SR_PR[0]['report_ok'].'</td>
                                        <td width="30%">4</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_SR_PR[0]['role_title_tl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_2_SR_PR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_2_SR_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_SR_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="firstLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>PRIMARY REPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40" bgcolor="#e5d998">'.$staff_2_PR[0]['gp_id'].'</td>
                                        <td width="30%" bgcolor="#ffff00">'.$staff_2_PR[0]['report_ok'].'</td>
                                        <td width="30%" bgcolor="#ffff00">2</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#e5d998">'.$staff_2_PR[0]['role_title_tl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40" bgcolor="#f4ecfd">'.$staff_2_PR[0]['gt_id'].'</td>
                                        <td colspan="2" bgcolor="#f4ecfd">'.$staff_2_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#f4ecfd">'.$staff_2_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                                <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="firstLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>SECONDARY REPORTOO2</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_2_SR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_2_SR[0]['report_ok'].'</td>
                                        <td width="30%"></td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_SR[0]['role_title_tl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_2_SR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_2_SR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_SR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 col-md-offset-3 text-center" style="background:#e2e2e2;padding:15px;">
                                  <table width="100%" border="1" bgcolor="#fff" class="firstLevelReporting" style="background:#fff;" >
                                      <tr>
                                        <td colspan="3" bgcolor=""><h5>ROLE 2</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40" bgcolor="">'.$staffData[1]['gp_id'].'</td>
                                        <td width="30%" bgcolor="">'.$staffData[1]['report_ok'].'</td>
                                        <td width="30%" bgcolor="">3</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="">'.$staffData[1]['role_title_tl'].', '.$staffData[1]['role_title_bl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40" bgcolor="">'.$staffData[1]['roleCode'].'</td>
                                        <td colspan="2" bgcolor="">'.$staffData[1]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 col-md-offset-3 text-center" style="background:none;padding:15px;">
                                  <table width="100%" border="1">
                                      <tr>
                                        <td colspan="2" width="33%" height="90">Fundamental<br />Primary<br /><h5>'.$totalPF2.'</h5></td>
                                        <td colspan="2" width="33%" height="90">Total<br />Primary<br /><h5>'.$totalP2.'</h5></td>
                                        <td colspan="2" width="33%" height="90">Total<br />Reportee<br /><h5>'.($totalP2+count($StaffReportee2_SC)).'</h5></td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" width="50%"  height="80">Total Staff<br />Members<br /><h5>'.$TotalStaffMembers2.'</h5></td>
                                        <td colspan="3" width="50%"  height="80">Total Student<br />Members<br /><h5>'.$TotalStudentMemebers2.'</h5></td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                        </div><!-- col-md-12 -->
                        <hr class="smallHR" />';




              $j = 1;
              for($i=0; $i<=($totalPF2+count($StaffReportee2)); $i++) {
              $html .= '<div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                          <div class="col-md-6">';

                      if(!empty($StaffReportee2[$i])) {
                      $html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                <tr>
                                  <td width="10%" bgcolor="#f5f5f5">'.($i+1).'</td>
                                  <td width="10%" bgcolor="#f5f5f5">'.$StaffReportee2[$i]['reporting_type'].'</td>
                                  <td width="40%" bgcolor="#f4ecfd"><strong>'.$StaffReportee2[$i]['abridged_name'].'</strong></td>
                                  <td width="20%" bgcolor="#ade4f2">'.$StaffReportee2[$i]['roleCode'].'</td>
                                  <td width="20%" bgcolor="#ade4f2"> '.$StaffReportee2[$i]['total_reportee'].' ('. $StaffReportee2[$i]['total_staff_members'] .') </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#ffff00">'.$StaffReportee2[$i]['report_ok'].'</td>';

                                  if($StaffReportee2[$i]['reporting_type'] == 'INDIR'){
                                    $html .= '<td bgcolor="#ffff00">('.$StaffReportee2[$i]['name_code'].')</td>';
                                  }else{
                                    $html .= '<td bgcolor="#ffff00"></td>';
                                  }

                                  $html .= '<td bgcolor="#e5d998">'.$StaffReportee2[$i]['role_title_tl'].'</td>
                                  <td colspan="2" bgcolor="#e5d998">'.$StaffReportee2[$i]['gp_id'].'</td>
                                </tr>
                              </table>';
                      }



                  $html .= '</div><!-- col-md-6 -->
                            <div class="col-md-6">';
                            if(!empty($StaffReportee2_SC[$i])) {
                              $html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                <tr>
                                  <td width="10%" bgcolor="#f5f5f5">'.($totalPF2 + $j).'</td>
                                  <td width="10%" bgcolor="#f5f5f5">'.$StaffReportee2_SC[$i]['reporting_type'].'</td>
                                  <td width="40%" bgcolor="#f4ecfd"><strong>'.$StaffReportee2_SC[$i]['abridged_name'].'</strong></td>
                                  <td width="20%" bgcolor="#ade4f2">'.$StaffReportee2_SC[$i]['roleCode'].'</td>
                                  <td width="20%" bgcolor="#ade4f2"> '.$StaffReportee2_SC[$i]['total_reportee'].' ('. $StaffReportee2_SC[$i]['total_staff_members'] .') </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#ffff00">'.$StaffReportee2_SC[$i]['report_ok'].'</td>
                                  <td bgcolor="#ffff00">('.$StaffReportee2_SC[$i]['name_code'].')</td>
                                  <td bgcolor="#e5d998">'.$StaffReportee2_SC[$i]['role_title_tl'].'</td>
                                  <td colspan="2" bgcolor="#e5d998">'.$StaffReportee2_SC[$i]['gp_id'].'</td>
                                </tr>
                              </table>';
                              /*$html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                <tr>
                                  <td width="15%" bgcolor="#f5f5f5">'.($totalPF2 + $j).'</td>
                                  <td width="15%" bgcolor="#f5f5f5">SC</td>
                                  <td width="15%" bgcolor="">INDIR</td>
                                  <td width="15%" bgcolor="">'.$StaffReportee2_SC[$i]['roleCode'].'</td>
                                  <td width="40%" bgcolor="#f5f5f5">'.$StaffReportee2_SC[$i]['role_title_tl'].'</td>
                                </tr>
                                <tr>
                                  <td bgcolor="#e1e1e1" colspan="2"> </td>
                                  <td bgcolor="#e1e1e1"> </td>
                                  <td bgcolor="#f5f5f5"><strong>'.$StaffReportee2_SC[$i]['name_code'].'</strong></td>
                                  <td colspan="" bgcolor="#f5f5f5">'.$StaffReportee2_SC[$i]['abridged_name'].'</td>
                                </tr>
                              </table>';*/

                              $j++;
                            }
                            $html .= '</div><!-- col-md-6 -->
                          </div><!-- col-md-12 -->';
              }


          $html .= '</div><!-- orgChartSection -->';
                  }
    $html .= '</div><!-- .RightInformation_contentSection -->
          </div><!-- RightInformation -->
      ';
    }


    echo $html;
  }

  public function get_cut_date(){
    $staffInfo = new StaffInformationModel();
    $staff['get_cut_date'] = $staffInfo->get_cut_date();
    echo json_encode($staff);
  }

  // Getting Range Of Days
  public  function GetDays($sStartDate, $sEndDate){  
      // Firstly, format the provided dates.  
      // This function works best with YYYY-MM-DD  
      // but other date formats will work thanks  
      // to strtotime().  
      $sStartDate = gmdate("Y-m-d", strtotime($sStartDate));  
      $sEndDate = gmdate("Y-m-d", strtotime($sEndDate));  

      // Start the variable off with the start date  
     $aDays[] = $sStartDate;  

     // Set a 'temp' variable, sCurrentDate, with  
     // the start date - before beginning the loop  
     $sCurrentDate = $sStartDate;  

     // While the current date is less than the end date  
     while($sCurrentDate < $sEndDate){  
       // Add a day to the current date  
       $sCurrentDate = gmdate("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));  

       // Add this new day to the aDays array  
       $aDays[] = $sCurrentDate;  
     }  

     // Once the loop has finished, return the  
     // array of days.  
     return $aDays;  
   }

   public function getFlagForDateAvailable($objectData,$date,$steps){
        

        if(isset($objectData[$steps]->date) && in_array($objectData[$steps]->date,$date) ){
          return 0;
        }else{
          return 1;
        }

       
      
   }


   public function getLeaveForDailyReport(Request $request){
      $staff_id = $request->input('staff_id');
      $date = $request->input('date');

      $staffInfo = new StaffInformationModel();
      $allocated_leave =  $staffInfo->getLeaveDailyReport($staff_id,$date);
      echo json_encode($allocated_leave);
   } 

   public function adjustmentApproval($staff_id,$table_name,$table_id,$approve_type_id,$created_by,$modified_by){
      $adjustment_approval=new adjustment_approval;
      $adjustment_approval->staff_id=$staff_id;
      $adjustment_approval->table_name=$table_name;
      $adjustment_approval->table_id=$table_id;
      $adjustment_approval->approval_type_id=$approve_type_id;
      $adjustment_approval->created_by=$created_by;
      $adjustment_approval->modified_by=$modified_by;
      $adjustment_approval->save();
   } 

   public function checkFormNumberExistance(request $request){
        $staffInfo = new StaffInformationModel();
          $form_number=$request->form_number;
          $table_name=$request->table_name;
        if($table_name=='leave_application'){
          // $where = array(
          //   'form_number' => $table_name,
          // );
          $feild_name='form_no';
        }else{
          $feild_name='form_number';
        }

        $where = array(
                  $feild_name => $form_number,
                );       
        $staffDescription = $staffInfo->get('atif_gs_events.'.$table_name,$where);
        return count($staffDescription);

   }
}