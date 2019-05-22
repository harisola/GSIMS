<?php
/******************************************************************
* Author : Arif Khan
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_process_model as RecM;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_process_filter_data_view_modal as RecMD;

class staff_recruitment_process extends Controller{

  public function index(){
      $userId = Sentinel::getUser()->id;
      $query_resultant = $this->Create_Query();
      //Arif Khan Working///
      $RecM_Obj = new RecM();
      //var_dump($query_resultant); exit;
      $all_departments=$RecM_Obj->all_departments();
      $all_subjects=$RecM_Obj->all_subjects();
      $all_designations=$RecM_Obj->all_designations();
      return view('master_layout.staff.staff_recruitment.staff_recruitment_process_view')
      ->with(
          array('query_resultant' => $query_resultant,'all_departments'=>$all_departments,'all_designations'=>$all_designations,'all_subjects'=>$all_subjects)
        );
  
  }

  public function get_process(Request $request)
    {   
      $RecM_Obj = new RecMD();
      $stage = $request['stage'];
      $date_1 = $request['date1'];
      $date_2 = $request['date2'];
      $departmentFilter = $request['departmentFilter'];
      $subjectFilter = $request['subjectFilter'];
      $designationFilter = $request['designationFilter'];
      $campusFilter = $request['campusFilter'];
      $formSourceFilter = $request['formSourceFilter'];
      $Stage_info = $this->Query_Get_Form_Info($stage);
      // print_r($departmentFilter);
      // print_r($subjectFilter);
      // die;
     
      if($stage == 'Online_Application'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->online_get_data_filter($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }
      if($stage == 'Fill_part_A'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->fill_part_a_online($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Part_A_Screening'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Part_A_Screening($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }

       if($stage == 'Applicants_triggered'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicants_triggered($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }


       if($stage == 'Applicants_awating'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicants_awating($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'Overall_applicants'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicants($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'Applicants_currently'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicants_currently($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }

       if($stage == 'Overall_applicants_part_A'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicants_part_A($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }

       if($stage == 'Overall_applicants_moved'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicants_moved($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }



      if($stage == 'Overall_applicants_marked'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicants_marked($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_Walkin_applications'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Walkin_applications($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_Walkin_applications_part_A'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Walkin_applications_part_A($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'Overall_moved_to'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_moved_to($date_1,$date_2,$campusFilter,$formSourceFilter);
        // }
      }

      
      if($stage == 'Applicants_moved_to'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicants_moved_to($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'Overall_applicants_moved_to_Regret'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicants_moved_to_Regret($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }
      

        if($stage == 'Applicant_awaiting_for_full_form'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicant_awaiting_for_full_form($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_applicants_present'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicants_present($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      
  if($stage == 'Applicants_currently_initial'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicants_currently_initial($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }



      if($stage == 'Overall_applicant_moved_to_regret'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicant_moved_to_regret($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


         if($stage == 'Overall_applicants_moved_to_Followup'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicants_moved_to_Followup($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'Applicants_currently_in'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicants_currently_in($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_applicants_given'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicants_given($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'Overall_applicants_not_interested'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_applicants_not_interested($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'Intial_Interview_Communication_Not'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Intial_Interview_Communication_Not($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Intial_Interview_for_formal'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Intial_Interview_for_formal($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

          
              if($stage == 'Present_for_Formal_Interview'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Present_for_Formal_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


               if($stage == 'awaiting_for_Next_Step_interiew'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->awaiting_for_Next_Step_interiew($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }



               if($stage == 'Regret_from_Formal'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Regret_from_Formal($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

          
      


  if($stage == 'moved_to_Followup_interview'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->moved_to_Followup_interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }



  if($stage == 'currently_in_Followup_presence'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->currently_in_Followup_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

    
      if($stage == 'given_extension'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->given_extension($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Not_Interested_formal'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Not_Interested_formal($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'moved_to_Not_Interested'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          // $Stage_info=$RecM_Obj->moved_to_Not_Interested($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


       if($stage == 'awaiting_for_Observation'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->awaiting_for_Observation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }
        
if($stage == 'marked_Present_for_job'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->marked_Present_for_job($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


if($stage == 'currently_in_Observatio_for'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->currently_in_Observatio_for($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'applicant_moved_to_regret_form'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->applicant_moved_to_regret_form($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


       if($stage == 'Observation_Presence_Followup'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Observation_Presence_Followup($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


 if($stage == 'no_actions'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->no_actions($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'given_extension_from_observation'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->given_extension_from_observation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }




      if($stage == 'applicants_moved_to_Not_Interested_to_moved'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->applicants_moved_to_Not_Interested_to_moved($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

       if($stage == 'Observation_Communication_not_interested'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Observation_Communication_not_interested($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'present_for_Final'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->present_for_Final($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }




       if($stage == 'currently_in_Final'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->currently_in_Final($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


       if($stage == 'Final_Cons_To'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Final_Cons_To($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

       if($stage == 'Final_consultation_awaiting'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Final_consultation_awaiting($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'Final_Cons_Presence'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Final_Cons_Presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }



      if($stage == 'recenntly_in_Followup_for_F'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->recenntly_in_Followup_for_F($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


      if($stage == 'Followup_Extension'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Followup_Extension($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }


       if($stage == 'Consultation_presence'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Consultation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }
//ZK
      if($stage == 'Overall_Offer_Prep_Allocation'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Offer_Prep_Allocation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Offer_Prep_Allocation'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Offer_Prep_Allocation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Offer_Proc_Communication'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Offer_Proc_Communication($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }
      
      if($stage == 'Offer_Proc_Presence'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Offer_Proc_Presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_Offer_Proc_Followup'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Offer_Proc_Followup($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Applicants_InOffer_Proc_Followup'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicants_InOffer_Proc_Followup($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_Offer_Proc_Follwup_Extensions'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Offer_Proc_Follwup_Extensions($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_Offer_Proc_Not_Interested'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Offer_Proc_Not_Interested($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Applicant_InOffer_Procedure'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicant_InOffer_Procedure($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_Applicantto_Comp_Checklist'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Applicantto_Comp_Checklist($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }
      
      if($stage == 'Applicants_In_Comp_Checklist'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicants_In_Comp_Checklist($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_Applicants_Comp_Checklist_Followup'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Applicants_Comp_Checklist_Followup($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_Applicants_Extension_From_Comp_Checklist_Followup'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Applicants_Extension_From_Comp_Checklist_Followup($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Overall_Applicants_Not_Interested_From_Comp_Checklist_Followup'){
        // if($departmentFiltehelpr != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Overall_Applicants_Not_Interested_From_Comp_Checklist_Followup($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Applicants_Recruitment_Complete'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicants_Recruitment_Complete($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      if($stage == 'Applicant_Archive'){
        // if($departmentFilter != 'null' || $subjectFilter != 'null' || $designationFilter != 'null'|| $date_1 != '' || $date_2 != '' || $campusFilter != '' || $formSourceFilter != ''){

          $Stage_info=$RecM_Obj->Applicant_Archive($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
        // }
      }

      
      

      
         
      // var_dump("else");
      // die;
      // $Stage_info = $this->Query_Get_Form_Info($stage);
      // if($departmentFilter >0 && $subjectFilter >0){
      //   $Stage_info=$RecM_Obj->online_get_data_filter_arif($departmentFilter,$subjectFilter);
      // }
      $html =  view('master_layout.staff.staff_recruitment.sr_process_view_modal_table')->with( array('Stage_info' => $Stage_info ) )->render();
      return response()->json(array('success' => true, 'html'=>$html));
  }

public function Query_Get_Form_Info($Stage_id)
{
  $RecM_Obj = new RecM();
  $Where = "";

  if($Stage_id == 'Online_Application')
  {
    $Where =" and af.id in(
    select 

    cf.id
    
    from atif_career.career_form as cf where cf.form_source=1 

  )";
  }

  else if($Stage_id == 'Fill_part_A')
  {
    $Where =" and af.id in(
      select  cf.id 
      from atif_career.career_form as cf 
      left join atif_career.log_career_form as lcf on lcf.form_id=cf.id
      where cf.form_source=1 and lcf.id is null
      )";
  }

  else if($Stage_id == 'Overall_Walkin_applications_part_A')
  {
    $Where =" and af.id in(
      select 
      cf.id
      from atif_career.career_form as cf where cf.form_source=0
      )";

  }
/*select *
from atif_Career.career_form as cf where (cf.status_id=10 or cf.status_id=12)
and (cf.stage_id=9 or cf.stage_id=10)
and cf.form_source=1*/
else if($Stage_id == 'Part_A_Screening')
{
$Where =" and af.id in(select cf.id
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
and dd.status_id=1 and cf.stage_id=1 and cf.form_source=1 )";

  }

  else if($Stage_id == 'Applicants_triggered')
  {
    $Where =" and af.id in (
      select 
      cf.id 
      from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9
      )";
  } 

  else if($Stage_id == 'Applicants_awating')
{
    $Where =" and af.id in ( 

select 
 cf.id  
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date >= curdate() )
  )";

  }

  else if($Stage_id == 'Overall_applicants')
{
    $Where =" and af.id in(

select 
cf.id
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
   ) ";

  } 

  else if($Stage_id == 'Applicants_currently')
{
    $Where =" and af.id in(

    select 
cf.id
    from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )

  )";
  }

  else if($Stage_id == 'Overall_applicants_part_A')
{
    $Where =" and af.id in(
    select 
cf.id
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id 
and u.status_id= 1
where cf.status_id=2 
and cf.stage_id=4 
and ( u.date is null or u.date >= curdate() ))

    ";
  }

  else if($Stage_id == 'Overall_applicants_moved')
{
    $Where =" and af.id in(

select 
 
lcf.id
from atif_career.career_form as lcf where lcf.status_id=11 and lcf.stage_id=6

  )";
  }

  else if($Stage_id == 'Overall_applicants_marked')
{
    $Where =" and af.id in(

select  d.form_id  
from( 
select  (l.form_id) as form_id  from atif_career.log_career_form as l 
where l.status_id=11 and l.stage_id =4 group by l.form_id 
union
select  (l.id) as form_id  from atif_career.career_form as l 
where l.status_id=11 and l.stage_id =4 group by l.id

) as d

  )";
  }

  else if($Stage_id == 'Overall_Walkin_applications')
  {
    $Where =" and af.id in(
      select 
      cf.id
      from atif_career.career_form as cf where cf.form_source=0
      )";
  }

  else if($Stage_id == 'Overall_moved_to')
  {
    $Where =" and af.id in(

select 

cf.id

from atif_career.career_form as cf where cf.form_source=0
  )";
  }

  else if($Stage_id == 'Applicants_moved_to')
  {
    $Where =" and af.id in(

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
from atif_career.career_form as cf where cf.form_source=0

) as d


  )";
  }

  else if($Stage_id == 'Overall_applicants_moved_to_Regret')
  {
    $Where =" and af.id in(
  
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
    and cf.stage_id != 1

  )";
  }

  else if($Stage_id == 'Applicants_in_Hold')
  {
    $Where =" and af.id in(

  )";
  }

  else if($Stage_id == 'Applicant_awaiting_for_full_form')
  {
    $Where =" and af.id in(

      select 
      cf.id
      from atif_career.career_form as cf 
      left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
      where cf.status_id=2
       and cf.stage_id=8
      And ( u.date is null or u.date >= curdate() )
      )";
        }

  else if($Stage_id == 'Overall_applicants_present')
  {
    $Where =" and af.id in(

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
    group by l.form_id ) as f

  )";
  }

  else if($Stage_id == 'Applicants_currently_initial')
  {
    $Where =" and af.id in(
    select 

    ( cf.id ) as Total_form
    from atif_career.career_form as cf 
    left join atif_career.career_form_data as u on u.form_id=cf.id 
    and u.status_id= 1
    where cf.status_id=2 
    and cf.stage_id=4 
    and ( u.date is null or u.date >= curdate() )

  )";
  }

  else if($Stage_id == 'Overall_applicant_moved_to_regret')
  {
    $Where =" and af.id in(

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

  )";
  }

  else if($Stage_id == 'Overall_applicants_moved_to_Followup')
  {
    $Where =" and af.id in(

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

  )";
  }

  else if($Stage_id == 'Applicants_currently_in')
  {
    $Where =" and af.id in(

select 

cf.id



from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )

  )";
  }


  else if($Stage_id == 'Overall_applicants_given')
  {
    $Where =" and af.id in(
    select 

    ( cf.form_id ) as Total_form
    from atif_Career.log_career_form as cf 
    where cf.status_id=2 
    and (cf.stage_id=13)  

)";
  }

  else if($Stage_id == 'Overall_applicants_not_interested')
  {
    $Where =" and af.id in(
    select 

    cf.id

    from atif_Career.log_career_form as cf 
    where cf.status_id=2 
    and (cf.stage_id=6)  
      )";
  }

  else if($Stage_id == 'Intial_Interview_Communication_Not')
  {
    $Where =" and af.id in(

    select 
 
    lcf.id

    from atif_career.career_form as lcf where lcf.status_id=1 and lcf.stage_id=6

      )";

  }
  else if($Stage_id == 'Intial_Interview_for_formal')
  {
    $Where =" and af.id in(
 select 
 
 (ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
 ( d.date ) as Total_form
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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff

  )";
  }

  else if($Stage_id == 'Present_for_Formal_Interview')
  {
    $Where =" and af.id in(

    select 
distinct cf.form_id

from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=4)  )
";
  }

  else if($Stage_id == 'awaiting_for_Next_Step_interiew')
  {
    $Where =" and af.id in(

select 
 
 ( f_data.p_date ) as Total_form 
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
where f.status_id=3
) as f_data
where f_data.p_date >= curdate()

  )";
  }

  else if($Stage_id == 'Regret_from_Formal')
  {
    $Where =" and af.id in(
select 

( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=3
  )";
  }

  else if($Stage_id == 'moved_to_Followup_interview')
  {
    $Where =" and af.id in(

select 
  ff.form_id

from(


select 
curdate() as p_date,

( cf.id ) as Total_form, cf.form_id as form_id
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,

( d.date ) as Total_form, f.id as form_id

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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff

  )";
  }
  else if($Stage_id == 'currently_in_Followup_presence')
  {
    $Where =" and af.id in(

select 
 
(ff.form_id) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
( d.date ) as Total_form, f.id as form_id
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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff



  )";


  }

  else if($Stage_id == 'given_extension')
  {
    $Where =" and af.id in(
select 

lcf.id

from atif_career.career_form as lcf where lcf.status_id=3 and lcf.stage_id=13
  )";
  }

  else if($Stage_id == 'Not_Interested')
  {
    $Where =" and af.id in(
    select 
    lcf.id
    from atif_career.career_form as lcf where lcf.status_id=3 and lcf.stage_id=6
  )";
  }


  else if($Stage_id == 'moved_to_Not_Interested')
  {
    $Where =" and af.id in(
select 

lcf.id

from atif_career.career_form as lcf where lcf.status_id=20 and lcf.stage_id=6

  )";
  }

  else if($Stage_id == 'awaiting_for_Observation')
  {
    $Where =" and af.id in(

    select 

(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
( d.date ) as Total_form
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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff

  )";
  }
  else if($Stage_id == 'marked_Present_for_job')
  {
    $Where =" and af.id in(

    select 

cf.form_id

from atif_Career.log_career_form as cf 
where cf.status_id=4
and (cf.stage_id=4)  
)";
  }
  else if($Stage_id == 'currently_in_Observatio_for')
  {
    $Where =" and af.id in(
select 

( f_data.p_date ) as Total_form 
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
where f.status_id=4
) as f_data
where f_data.p_date >= curdate()

  )";
  }
  else if($Stage_id == 'applicant_moved_to_regret_form')
  {
    $Where =" and af.id in(

select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where f.status_id=12 and d.status_id=4
 )";
  }
  else if($Stage_id == 'Observation_Presence_Followup')
  {
    $Where =" and af.id in(
    select 

(ff.Total_form) as Total_form

from(
select 
curdate() as p_date,
  (cf.form_id)  as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=4 
and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13) 
union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
( f.id ) as Total_form

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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff


  )";
  }
  else if($Stage_id == 'no_actions')
  {
    $Where =" and af.id in(


    select 
  ff.form_id
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
( d.date ) as Total_form, f.id as form_id
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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff




  )";
  }
  else if($Stage_id == 'given_extension_from_observation')
{
    $Where =" and af.id in(
    select 
lcf.id
from atif_career.career_form as lcf where lcf.status_id=4 and lcf.stage_id=13

)";
  }
  else if($Stage_id == 'applicants_moved_to_Not_Interested_to_moved')
{
    $Where =" and af.id in(
     select 
lcf.id
from atif_career.career_form as lcf where lcf.status_id=4 and lcf.stage_id=6
  )";
  }
  else if($Stage_id == 'Observation_Communication_not_interested')
{
    $Where =" and af.id in(

      select 
lcf.id
from atif_career.career_form as lcf where lcf.status_id=4 and lcf.stage_id=6

  )";
  }
  else if($Stage_id == 'Final_consultation_awaiting')
{
    $Where =" and af.id in(


    select 
 
 (ff.form_id ) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
 ( d.date ) as Total_form, f.id as form_id
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01'   then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff



  )";
  }
  else if($Stage_id == 'present_for_Final')
{
    $Where =" and af.id in(
    select 


cf.form_id

from atif_Career.log_career_form as cf 
where cf.status_id=5
and (cf.stage_id=4)   
)";
  }
  else if($Stage_id == 'currently_in_Final')
{
    $Where =" and af.id in(


    select 
 
 ( f_data.form_id ) as Total_form 
from (
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date, f.id as form_id
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
where f_data.p_date >= curdate()


  )";
  }
  else if($Stage_id == 'Final_Cons_To')
{
    $Where =" and af.id in(
select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 

  )";
  }
  else if($Stage_id == 'Final_Cons_Presence')
{
    $Where =" and af.id in(

select  
(ff.Total_form) as Total_form
from(
select 
curdate() as p_date,
( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=5 
and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  
union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
( f.id ) as Total_form

from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff

  )";
  }
  else if($Stage_id == 'recenntly_in_Followup_for_F')
{
    $Where =" and af.id in(


    select 
 
 (ff.form_id) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
 ( d.date ) as Total_form, f.id as form_id
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff

  )";
  }
  else if($Stage_id == 'Followup_Extension')
{
    $Where =" and af.id in(
select 

lcf.id

from atif_career.career_form as lcf where lcf.status_id=5 and lcf.stage_id=13
  )";
  }
  else if($Stage_id == 'Consultation_presence')
{
    $Where =" and af.id in(
    select 

    lcf.id

from atif_career.career_form as lcf where lcf.status_id=5 and lcf.stage_id=6
  )";
  }
  else if($Stage_id == 'final_communication_moved')
  {
    $Where =" and af.id in(

    select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=5

  )";
  } 

 /* else if($Stage_id == 'Offer_Prep_Allocation')
  {
    $Where =" and af.id in(

    select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where (f.status_id=6 or f.stage_id=1 ) 
  )";
  } */


$Query_Return = $this->Query_Function($Where);
return $RecM_Obj->Create_query($Query_Return);



}


public function Query_Function($Where)
{
  return  $Query=" select 


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
left join (
select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
from atif_career.log_career_form as lcf 
order by lcf.created limit 1) as lcf on lcf.form_id = af.id

WHERE 1  
 ".$Where." and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01' ORDER BY af.created DESC
";

}

  public function Create_Query()
  {

    $RecM_Obj = new RecM();

    $Query = "



select 
1 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=1 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

union
select 
2 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.log_career_form as l on l.form_id=cf.id
where cf.form_source=1 and l.id is null and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

union
select 
3 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

union
select 
4 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date >= curdate() )

# Moved to call for part b presence followup
union
select 
4.1 as Query_num,
count( d.Total_form ) as Total_form
from(
select 
4.1 as Query_num,
( l.form_id ) as Total_form
from atif_career.log_career_form as l where l.status_id=11 
and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 ) 

union
select 
4.2 as Query_num,
( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
) as d 

# Call for part b presence currently in followup
union
select 
4.2 as Query_num,
count( cf.Total_form ) as Total_form

from (
select 
 
( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  and ( u.date is null or u.date < curdate() ) group by cf.id 
) as cf 

# Call for part b presence currently in followup 7 day passed
union
select 
4.3 as Query_num,
count( cf.Total_form ) as Total_form
from (
select 
 
( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' and ( u.date is null or u.date < curdate() ) 
and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
group by cf.id
) as cf


union 
select  
4.4 as Query_num, 
(count(l.form_id) - count(distinct(l.form_id))) as Total_form 
from atif_career.log_career_form as l  where l.status_id=11  and l.stage_id=11 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01' 

union
select 
4.5 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=11 and l.stage_id=6 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'

#zk code
union
select 
5 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=0 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

union
select 
5.1 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.log_career_form as l on l.form_id=cf.id
where cf.form_source=0 and l.id is null and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 

#zk code

union
select 
6 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.log_career_form as l on l.form_id=cf.id
where cf.form_source=0 
and l.id is not null

# Applicants_moved_to zk-ak
union 
select 235 as Query_num,
count( d.id ) as Total_form
from(
select (l.form_id) as id  from atif_career.log_career_form as l
where l.status_id= 1  and l.stage_id =4  
union 
select (l.id) as id  from atif_career.career_form as l 
where l.status_id=1 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
and (l.form_source=0 or l.form_source=1 ) 
) as d
# Applicants_moved_to zk-ak

union
select 7 as Query_num,
count( d.id ) as Total_form
from( 
select (l.form_id) as id  from atif_career.log_career_form as l  
where l.status_id=11 and l.stage_id =4 
union
select (l.id) as id  from atif_career.career_form as l 
where l.status_id=11 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'  and l.stage_id =4

) as d  

union
select 
8 as Query_num,
count( l.form_id ) as Total_form
from atif_career.log_career_form as l where l.status_id=1 and l.register_by > 0



union
select 9 as Query_num,
count( cf.id ) as Total_form 
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
and dd.status_id=1 and cf.stage_id=1 and cf.form_source=1 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


union
select 
10 as Query_num,
count( cf.id ) as Total_form
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
and cf.stage_id != 1 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

UNION
select 
11 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
where cf.status_id=2
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
 and cf.stage_id=8
And ( u.date is null or u.date >= curdate())


/*union
select 
12 as Query_num,
count( f.form_id ) as Total_form
from (
select  count(l.form_id) as form_id from atif_career.log_career_form as l 
where l.status_id = 2 
and l.status_id != 10 
and l.status_id != 11 
and l.status_id != 12 
and l.status_id != 13
and l.stage_id != 8 
and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'
group by l.form_id ) as f */

#edit add by zk
union
select 
12 as Query_num,
count( f.form_id ) as Total_form
from ( 
select (cf.form_id) as form_id from atif_career.career_form_data as cf 
left join atif_career.career_form as cfd on cfd.id = cf.form_id
left join  atif_career.log_career_form as lcf on lcf.form_id = cfd.id
where cf.status_id = 2 
and cf.status_id != 10 
and cf.status_id != 11 
and cf.status_id != 12 
and cf.status_id != 13
and cf.stage_id != 8 
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
group by cf.form_id
 )as f
#edit add by zk

union

select 
13 as Query_num,
count(dd.Total_form) from(
select 
 ( cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13) 
 
union
select
( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2
 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
 and ( u.date is null or u.date < curdate() ) group by cf.id
) as dd 


union
select 
14 as Query_num,
 count(dd.Total_form) from(
select 
 ( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.status_id=12 or cf.status_id=10 )  
union
select
 ( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
and cf.stage_id not in (6,10,12)
) as dd



union 
select
15 as Query_num,
count(dd.Total_form) from(
select 
( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.status_id=12 or cf.status_id=10 ) 
union
select
( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() ) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
and cf.stage_id not in (6,10,12)
) as dd

union 
select 
16 as Query_num,
count( distinct cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=1
and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

union 
select 17 as Query_num,
sum( d.Total_form ) as Total_form
 from (
select 
count( cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and cf.stage_id=6
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
union
select 
count( cf.id ) as Total_form
from atif_Career.career_form as cf 
where cf.status_id=2 
and cf.stage_id=6
) as d

/*select 
17 as Query_num,
count( cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and cf.stage_id=6
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  */


union
select 
18 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=1 and l.stage_id=6



union 
select 
19 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id 
and u.status_id= 1
where cf.status_id=2 
and cf.stage_id=4 
and ( u.date is null or u.date >= curdate() )


UNION
/*select 
20 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=2
where cf.status_id=3
 and cf.stage_id=8
And ( u.date is null or u.date >= curdate() )*/

select 
20 as Query_num, 
(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
where  from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and f.stage_id = 8 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd 
where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff



/* Form Interview Presence */
union 
select 
21 as Query_num, 
count( cf.id ) as Total_form 
from atif_Career.log_career_form as cf 
where cf.status_id=3 and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01' 
and (cf.stage_id=4)  


/* Form Interview, wait for next step */
union
select 
22 as Query_num, 
count( f_data.p_date ) as Total_form 
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
where f.status_id=3 and f.stage_id = 4
) as f_data
where f_data.p_date >= curdate()



/* Form Interview, wait for next step */
union
select 
23 as Query_num, 
count(ff.Total_form) as Total_form
from(
select 
curdate() as p_date,
( cf.id ) as Total_form, cf.form_id as form_id
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
( d.date ) as Total_form, f.id as form_id
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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate() group by f.id
) as ff




union
select 
24 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and f.stage_id not in (6,10,12) and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff



union
select 
25 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and f.stage_id not in (6,10,12) and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01' and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff


union
select 
26 as Query_num,
sum( d.Total_form ) as Total_form
 from (
select 
count( cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and cf.stage_id=6
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
union
select 
count( cf.id ) as Total_form
from atif_Career.career_form as cf 
where cf.status_id=3 
and cf.stage_id=6
) as d



union
select 
27 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=3 and l.stage_id=6


union
select 
28 as Query_num,
count( distinct cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'


union
select 
29 as Query_num,
count( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=3 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'


union
select 
30 as Query_num,
count( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=2 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'


# Start Formal Obervation


UNION
select 
31 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=4 and f.stage_id=8 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff



/* Form Interview Presence */
union 
select 
32 as Query_num, 
count( cf.id ) as Total_form 
from atif_Career.log_career_form as cf 
where cf.status_id=4 
and (cf.stage_id=4) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

/* Form Interview, wait for next step */
union
select 
33 as Query_num, 
count( f_data.p_date ) as Total_form 
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
where f.status_id=4  and f.stage_id =4
) as f_data
where f_data.p_date >= curdate()



/* Form Interview, wait for next step */
union
select 
34 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
curdate() as p_date,
count( Distinct (cf.form_id) ) as Total_form
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
count( d.date ) as Total_form

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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff


union
select 
35 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1 )
else d.date
end
)  <  curdate() ) as ff 




union
select 
36 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff


/*union
select 
37 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=15 and l.stage_id=8*/

union
select 
37 as Query_num,
sum( d.Total_form ) as Total_form
 from (
select 
count( cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=4 
and cf.stage_id=6
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
union
select 
count( cf.id ) as Total_form
from atif_Career.career_form as cf 
where cf.status_id=4 
and cf.stage_id=6
) as d


union
select 
38 as Query_num,
count( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where f.status_id=12 and d.status_id=4 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'


union
select 
39 as Query_num,
count( distinct cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

# End Obervation




# Final Consultation



UNION
select 
40 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1 )
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5  and f.stage_id=8 and (
case when d.date = '1970-01-01' and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff 


/* Form Interview Presence */
union 
  select 41 as Query_num, 
count( d.Total_form ) as Total_form  from (
  
  
  select 
 ( cf.id ) as Total_form 
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
  
  ) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01'
  )  group by cf.form_id ) as d
/*  wait for next step */
union
select 
42 as Query_num, 
count( f_data.p_date ) as Total_form 
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
where f.status_id=5 and f.stage_id=4
) as f_data
where f_data.p_date >= curdate()



/* Form Interview, wait for next step */
union
select 
43 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
curdate() as p_date,
count( cf.id ) as Total_form
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
count( d.date ) as Total_form
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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff 


union
select 
44 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
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
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff


/*select 
44 as Query_num,
 count(dd.Total_form) from(
select 
 ( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=5 
and (cf.status_id=12 or cf.status_id=10 )  
union
select
 ( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=5 and ( u.date is null or u.date < curdate() ) 
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
and cf.stage_id not in (6,10,12)
) as dd*/


union
select 
45 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1) 
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and  (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) <  curdate() < ( curdate() - INTERVAL 7 day ) ) as ff 


/*union
select 
46 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=5 and l.stage_id=6*/

union
select 
46 as Query_num,
sum( d.Total_form ) as Total_form
 from (
select 
count( cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=5 
and cf.stage_id=6
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'  
union
select 
count( cf.id ) as Total_form
from atif_Career.career_form as cf 
where cf.status_id=5
and cf.stage_id=6
) as d



union
select 
47 as Query_num,
count( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 and from_unixtime(f.created ,'%Y-%m-%d') >= '2018-10-01'


union
select 
48 as Query_num,
count( distinct cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=4 
and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'

# End Final Consultation

union
select 
49 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=6 and l.stage_id=8 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'

union
select 
49.2 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=7 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'

# Offer Preparation from Final Consultation Allocation
union
select
49.1 as Query_num, 
count( d.Total_form ) as Total_form  from (
select 
( cf.id ) as Total_form 
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
where cf.status_id = 6
) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01'
)  group by cf.form_id ) as d
# Offer Preparation from Final Consultation Allocation


union
select 
50 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=7 and stage_id = 8  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'

# Overall applicants marked Present for Offer Procedureion
union
select
50.1 as Query_num, 
count( d.Total_form ) as Total_form  from (
select 
( cf.id ) as Total_form 
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
where cf.status_id = 6 and cf.stage_id = 8
) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01'
)  group by cf.form_id ) as d
# Overall applicants marked Present for Offer Procedure

# Overall applicants moved to Followup for Offer Procedure
union
select 
50.2 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
curdate() as p_date,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=7 
and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  
union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id  order by dd.id desc limit 1) 
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=7 and from_unixtime(d.created ,'%Y-%m-%d') >= '2018-10-01' and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff
# Overall applicants moved to Followup for Offer Procedure

# Overall applicants moved to Extension from Followup for Offer Procedure
union
select 
50.3 as Query_num,
count( distinct cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=6 
and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
# Overall applicants moved to Extension from Followup for Offer Procedure

# Overall applicants moved to Not interested from Followup for Offer Procedure 
union
select 
50.4 as Query_num,
count( cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=7 
and cf.stage_id=6
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
# Overall applicants moved to Not interested from Followup for Offer Procedure 

union
select 
51 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=7 and stage_id = 4  and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'

# Overall applicants moved to Complete Checklist from Offer Procedure 
union
select
51.1 as Query_num, 
count( d.Total_form ) as Total_form  from (
select 
( cf.id ) as Total_form 
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
where cf.status_id = 7 and cf.stage_id = 8
) and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01'
)  group by cf.form_id ) as d
# Overall applicants moved to Complete Checklist from Offer Procedure 

union
select 
52 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=8 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'

# Overall applicants moved to Followup For Complete Checklist
union
select 
52.1 as Query_num, 
count(cf.id) as Total_form
from atif_Career.career_form as cf 
where cf.status_id=8
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
# Overall applicants moved to Followup For Complete Checklist

union
select 
53 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=9 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'

# Overall applicants moved to Extension from Followup For Complete Checklist
union
select 
53.1 as Query_num,
count( distinct cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=7 
and (cf.stage_id=13) and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
# Overall applicants moved to Extension from Followup For Complete Checklist

# Overall applicants moved to Not Interested from Followup For Complete Checklist 
union
select 
53.2 as Query_num,
count( cf.form_id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=8 
and cf.stage_id=6
and from_unixtime(cf.created ,'%Y-%m-%d') >= '2018-10-01'
# Overall applicants moved to Not Interested from Followup For Complete Checklist 

union
select 
54 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=10 and from_unixtime(l.created ,'%Y-%m-%d') >= '2018-10-01'

";


return $RecM_Obj->Create_query($Query);


/*
select 
1 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=1

union
select 
2 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=1 and cf.register_by=0 and cf.status_id < 2

union
select 
3 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9

union
select 
4 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date >= curdate() )



union
select 
4.1 as Query_num,
sum( d.Total_form ) as Total_form
from(
select 
4.1 as Query_num,
count( l.form_id ) as Total_form
from atif_career.log_career_form as l where l.status_id=11 
and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 or l.stage_id=12)
union
select 
4.2 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
) as d


union
select 
4.2 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )

union
select 
4.3 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 3 day )


union
select 
4.4 as Query_num,
(count(l.form_id) - count(distinct(l.form_id))) as Total_form
from atif_career.log_career_form as l  where l.status_id=11 and l.stage_id=11

union
select 
4.5 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=11 and l.stage_id=6


union
select 
5 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=0


union
select 
6 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=0 and cf.status_id=1 and cf.stage_id=1



union
select 7 as Query_num,
count( d.id ) as Total_form
from( 
select
cf.id 
from  atif_career.career_form as cf
left join  atif_career.log_career_form as l  on cf.id = l.form_id
where cf.form_source=1 and ( l.status_id=11  ) and (l.stage_id=4  )

group by l.form_id
) as d

union
select 
8 as Query_num,
count( cf.form_id ) as Total_form
from atif_career.career_form_data  as cf  where  cf.status_id=1 



union
select 
9 as Query_num,
count( cf.id ) as Total_form
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id  )
 ) as dd
on dd.form_id = cf.id
where cf.status_id=12 and dd.status_id=1


union
select 
10 as Query_num,
count( cf.id ) as Total_form
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id  )
 ) as dd
on dd.form_id = cf.id
where cf.status_id=12 and dd.status_id=2

UNION

select 
11 as Query_num,
sum( cf.Total_form ) as Total_form
from(

select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form

from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=2 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as cf




union
select 
12 as Query_num,
count( l.form_id ) as Total_form
from atif_career.LOG_career_form as l where l.status_id=2 and l.stage_id=4



union
select 
13 as Query_num,
sum(dd.Total_form) from(
select 
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=12 or cf.stage_id=13)  

UNION
select 
( cf.Total_form ) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=2 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id
order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as cf
) as dd



union
select 
14 as Query_num,
sum(dd.Total_form) from(
select 
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=12)  

UNION
select 
( cf.Total_form ) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=2 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id
order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as cf


) as dd


union 
select
15 as Query_num,
sum(dd.Total_form) from(
select 
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=12)  
union
select
count( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )
and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 3 day )
) as dd

union 
select 
16 as Query_num,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=13)  

union 
select 
17 as Query_num,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=6)  


union
select 
18 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=1 and l.stage_id=6



union 
select 
19 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id 
and u.status_id= 1
where cf.status_id=2 
and cf.stage_id=4 
and ( u.date is null or u.date >= curdate() )


# Form Interview  

UNION
select 
20 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=2
where cf.status_id=3
and cf.stage_id=8
And ( u.date is null or u.date >= curdate() )

# Form Interview Presence 
union 
select 
21 as Query_num, 
count( cf.id ) as Total_form 
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=4)  

#Form Interview, wait for next step 

union
  
select 
22 as Query_num, 
count( f_data.p_date ) as Total_form 

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
where f.status_id=3
) as f_data
where f_data.p_date >= curdate()

union
select 
23 as Query_num, 
sum(ff.Total_form)
from(
select 
curdate() as p_date,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=12 or cf.stage_id=13)  

union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  

< 

curdate()
) as ff








*/

  }
}