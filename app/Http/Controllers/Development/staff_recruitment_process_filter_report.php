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
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_process_report_filter_modal as RecM;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_process_report_filter_step1_modal as RecM1;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_process_report_filter_step2_modal as RecM2;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_process_report_filter_step3_modal as RecM3;

class staff_recruitment_process_filter_report extends Controller{


//Arif Khan Work

public function Get_Form_Online(Request $request){

  $RecM_Obj = new RecM();
  // $Stage_id = $request->input('stage');
  $departmentFilter = $request['departmentFilter'];
  // $online_get_count_filter=$RecM_Obj->online_get_data_filter_arif($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
  $online_get_count_filter=$RecM_Obj->online_get_data_filter_arif($departmentFilter);
  
  $html =  view('master_layout.staff.staff_recruitment.sr_process_view_modal_table')->with( array('Stage_info' => $Stage_info ) )->render();
  return response()->json(array('success' => true, 'html'=>$html));

}

public function process_flow_filter(Request $request){
        

           $RecM_Obj = new RecM();
           $RecM_Obj1 = new RecM1();
           $RecM_Obj2 = new RecM2();
           $RecM_Obj3 = new RecM3();

           $date_1 = $request['date1'];
           $date_2 = $request['date2'];
           $campusFilter = $request['campusFilter'];
           $formSourceFilter = $request['formSourceFilter'];
           // i 
           $online_get_count_filter=$RecM_Obj->online_get_count_filter($date_1,$date_2,$campusFilter,$formSourceFilter);
           $fillparta_get_count_filter=$RecM_Obj->fillparta_get_count_filter($date_1,$date_2,$campusFilter,$formSourceFilter);
           $part_a_screening1 =$RecM_Obj->Overall_applicants_moved_to_Regret_from_Part_A_screening($date_1,$date_2,$campusFilter,$formSourceFilter);
            $Applicants_triggered_for_Part_B_Awaiting = $RecM_Obj->Applicants_triggered_for_Part_B_Awaiting_to_be_communicated($date_1,$date_2,$campusFilter,$formSourceFilter);
             $applicants_awating_for_Part_B = $RecM_Obj->applicants_awating_for_Part_B_presence_Communicated_for_Part_B($date_1,$date_2,$campusFilter,$formSourceFilter);
              $Overall_applicants_moved_to_Followup = $RecM_Obj->Overall_applicants_moved_to_Followup_for_Part_B_presence($date_1,$date_2,$campusFilter,$formSourceFilter);

               $applicants_currently_in_Followup_for_Part_b = $RecM_Obj->applicants_currently_in_Followup_for_Part_B_presence($date_1,$date_2,$campusFilter,$formSourceFilter);
               $Call_for_part_b_presence_currently_in_followup_7 = $RecM_Obj->Call_for_part_b_presence_currently_in_followup_7_day_passed($date_1,$date_2,$campusFilter,$formSourceFilter);
                $Overall_applicants_given_extension_Followup_for_Part_B = $RecM_Obj->Overall_applicants_given_extension_Followup_for_Part_B_presence($date_1,$date_2,$campusFilter,$formSourceFilter);

                  $Overall_applicants_moved_to_Not_Interested_from_Followup = $RecM_Obj->Overall_applicants_moved_to_Not_Interested_from_Followup_for_Part_B_presence($date_1,$date_2,$campusFilter,$formSourceFilter);

                  $Overall_applicants_marked_Present_for_Part = $RecM_Obj->Overall_applicants_marked_Present_for_Part_B($date_1,$date_2,$campusFilter,$formSourceFilter);

                    $Overall_Walkin_applications = $RecM_Obj1->Overall_Walkin_applications($date_1,$date_2,$campusFilter,$formSourceFilter);

                  

                 $departmentFilter = $request['departmentFilter'];
                  $subjectFilter = $request['subjectFilter'];
                  $designationFilter = $request['designationFilter'];

                $Overall_applicants_moved_to_Regret = $RecM_Obj1->Overall_applicants_moved_to_Regret($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

            // $online_get_count_filter=$RecM_Obj->online_get_count_filter($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

             
              $Applicants_awaiting_for_Initial_Interview = $RecM_Obj1->Applicants_awaiting_for_Initial_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


              $Overall_applicants_marked_Present_for_Initial_Interview = $RecM_Obj1->Overall_applicants_marked_Present_for_Initial_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


            $Applicants_currently_initial = $RecM_Obj1->Applicants_currently_in_Initial_Interview_awaiting_for_Next_Step_decision($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


               $Overall_applicant_moved_to_regret = $RecM_Obj1->Overall_applicant_moved_to_Regret_from_Initial_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


               $Overall_applicants_moved_to_Followup_Initial_Interview_presence = $RecM_Obj1->Overall_applicants_moved_to_Followup_for_Initial_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
                 
              $Applicants_currently_in = $RecM_Obj1->Applicants_currently_in_Followup_for_Initial_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

               $seven_Days_passed_no_action_taken = $RecM_Obj1->Days_passed_no_action_taken($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


             $Overall_applicants_given = $RecM_Obj1-> Overall_applicants_given_extension_from_Followup_for_Part_B_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


               $Overall_applicants_not_interested = $RecM_Obj1->Overall_applicants_moved_to_Not_Interested_from_Followup_for_Initial_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

              $Intial_Interview_Communication_Not = $RecM_Obj1->Overall_applicants_moved_to_Not_Interested_from_Initial_Interview_Communication($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


              $Intial_Interview_for_formal = $RecM_Obj1->Applicants_awaiting_for_Formal_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


              $Present_for_Formal_Interview = $RecM_Obj1->Overall_applicants_marked_Present_for_Formal_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

              $awaiting_for_Next_Step_interiew = $RecM_Obj1->Applicants_currently_in_Formal_Interview_awaiting_for_Next_Step_decision($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


               $Regret_from_Formal = $RecM_Obj2->Overall_applicant_moved_to_Regret_from_Formal_Interview($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

             $moved_to_Followup_interview = $RecM_Obj2->Overall_applicants_moved_to_Followup_for_Formal_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
              
               $currently_in_Followup_presence  = $RecM_Obj2->Applicants_currently_in_Followup_for_Formal_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
         
             $given_extension = $RecM_Obj2->Overall_applicants_given_extension_from_Followup_for_Formal_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


             $Not_Interested = $RecM_Obj2->Overall_applicants_moved_to_Not_Interested_from_Followup_for_Formal_Interview_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);



            $moved_to_Not_Interested = $RecM_Obj2->Overall_applicants_moved_to_Not_Interested_from_Formal_Interview_Communication($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

           $awaiting_for_Observation = $RecM_Obj2->Applicants_awaiting_for_Observation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

            $marked_Present_for_job= $RecM_Obj2->Overall_applicants_marked_Present_for_Observation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

            $currently_in_Observatio_for= $RecM_Obj2-> Applicants_currently_in_Observation_awaiting_for_Next_Step_decision($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

            $applicant_moved_to_regret_form = $RecM_Obj2-> Overall_applicant_moved_to_Regret_from_Observation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


          $Observation_Presence_Followup = $RecM_Obj2->Overall_applicants_moved_to_Followup_for_Observation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


           $no_actions = $RecM_Obj2->Applicants_currently_in_Followup_for_Observation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

          $Days_passed_no_action_taken = $RecM_Obj2->Days_passed_no_action_taken($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

          $given_extension_from_observation = $RecM_Obj2-> Overall_applicants_given_extension_from_Followup_for_Formal_Interview_presence1($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


          $applicants_moved_to_Not_Interested_to_moved = $RecM_Obj2-> Overall_applicants_moved_to_Not_Interested_from_Followup_for_Observation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

          $Final_consultation_awaiting = $RecM_Obj3-> Applicants_awaiting_for_Final_Consultation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

          $present_for_Final = $RecM_Obj3->Overall_applicants_marked_Present_for_Final_Consultation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


        $currently_in_Final = $RecM_Obj3->Applicants_currently_in_Final_Consultation_awaiting_for_Next_Step_decision($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

           $Final_Cons_To = $RecM_Obj3->Overall_applicant_moved_to_Regret_from_FInal_Consultation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

          $Final_Cons_Presence = $RecM_Obj3->Overall_applicants_moved_to_Followup_for_Final_Consultation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


        $recenntly_in_Followup_for_F = $RecM_Obj3->Applicants_currently_in_Followup_for_Final_Consultation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

         $recenntly_in_Followup_for_F1 = $RecM_Obj3-> recenntly_in_Followup_for_F_first($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

           $Followup_Extension = $RecM_Obj3->Overall_applicants_given_extension_from_Followup_focresence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);

          $Consultation_presence = $RecM_Obj3->Overall_applicants_moved_to_Not_Interested_from_Followup_for_Final_Consultation_presence($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);


         $final_communication_moved = $RecM_Obj3-> Overall_applicants_moved_to_Not_Interested_from_Final_Consultation_Communication($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);
         // zk
         // $Overall_Offer_Prep_Allocation = $RecM_Obj3->Applicants_moved_to_Offer_Preparation_from_Final_Consultation($date_1,$date_2,$departmentFilter,$subjectFilter,$designationFilter,$campusFilter,$formSourceFilter);





          return view('master_layout/staff/staff_recruitment/reports/staff_recruitment_process_follow_filter')
      ->with(array('online_get_count_filter' => $online_get_count_filter,'fillparta_get_count_filter' => $fillparta_get_count_filter,'part_a_screening'=>$part_a_screening1,'Applicants_triggered_for_Part_B_Awaiting'=>$Applicants_triggered_for_Part_B_Awaiting,'applicants_awating_for_Part_B'=>$applicants_awating_for_Part_B,'Overall_applicants_moved_to_Followup'=>$Overall_applicants_moved_to_Followup,'applicants_currently_in_Followup_for_Part_b'=>$applicants_currently_in_Followup_for_Part_b,'Call_for_part_b_presence_currently_in_followup_7'=>$Call_for_part_b_presence_currently_in_followup_7,'Overall_applicants_given_extension_Followup_for_Part_B'=>$Overall_applicants_given_extension_Followup_for_Part_B,'Overall_applicants_moved_to_Not_Interested_from_Followup'=>$Overall_applicants_moved_to_Not_Interested_from_Followup,'Overall_applicants_marked_Present_for_Part'=>$Overall_applicants_marked_Present_for_Part,'Overall_Walkin_applications'=>$Overall_Walkin_applications,'Overall_applicants_moved_to_Regret'=>$Overall_applicants_moved_to_Regret,'Applicants_awaiting_for_Initial_Interview'=>$Applicants_awaiting_for_Initial_Interview,'Overall_applicants_marked_Present_for_Initial_Interview'=>$Overall_applicants_marked_Present_for_Initial_Interview,'Applicants_currently_initial'=>$Applicants_currently_initial,'Overall_applicant_moved_to_regret'=>$Overall_applicant_moved_to_regret,'Overall_applicants_moved_to_Followup_Initial_Interview_presence'=>$Overall_applicants_moved_to_Followup_Initial_Interview_presence,'Applicants_currently_in'=>$Applicants_currently_in,'seven_Days_passed_no_action_taken'=>$seven_Days_passed_no_action_taken,'Overall_applicants_given'=>$Overall_applicants_given,'Overall_applicants_not_interested'=>$Overall_applicants_not_interested,'Intial_Interview_Communication_Not'=>$Intial_Interview_Communication_Not,'Intial_Interview_for_formal'=>$Intial_Interview_for_formal,'Present_for_Formal_Interview'=>$Present_for_Formal_Interview,'awaiting_for_Next_Step_interiew'=>$awaiting_for_Next_Step_interiew,'Regret_from_Formal'=>$Regret_from_Formal,'moved_to_Followup_interview'=>$moved_to_Followup_interview,'currently_in_Followup_presence'=>$currently_in_Followup_presence,'given_extension'=>$given_extension,'Not_Interested'=>$Not_Interested,'moved_to_Not_Interested'=>$moved_to_Not_Interested,'awaiting_for_Observation'=>$awaiting_for_Observation,'marked_Present_for_job'=>$marked_Present_for_job,'currently_in_Observatio_for'=>$currently_in_Observatio_for,'applicant_moved_to_regret_form'=>$applicant_moved_to_regret_form,'Observation_Presence_Followup'=>$Observation_Presence_Followup,'no_actions'=>$no_actions,'Days_passed_no_action_taken'=>$Days_passed_no_action_taken,'given_extension_from_observation'=>$given_extension_from_observation,'applicants_moved_to_Not_Interested_to_moved'=>$applicants_moved_to_Not_Interested_to_moved,'Final_consultation_awaiting'=>$Final_consultation_awaiting,'present_for_Final'=>$present_for_Final,'currently_in_Final'=>$currently_in_Final,'Final_Cons_To'=>$Final_Cons_To,'Final_Cons_Presence'=>$Final_Cons_Presence,'recenntly_in_Followup_for_F'=>$recenntly_in_Followup_for_F,'recenntly_in_Followup_for_F1'=>$recenntly_in_Followup_for_F1,'Followup_Extension'=>$Followup_Extension,'Consultation_presence'=>$Consultation_presence,'final_communication_moved'=>$final_communication_moved));
      }





}