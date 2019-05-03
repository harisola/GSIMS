

<div class="col-md-12" id="" style="overflow-y: hidden;position:relative; "> 
  <img src="img/RecruitmentProcessflow.jpg" width="3500" />

        
      <div class="startTillCSL3">
       
         <span class="OnlineFormSubmissions absolute">
            <a href="#allocateProfileModal" data-toggle="modal" data-status="Online_Application" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Applicants applied Online" id="allocte_online_data" ><?php echo $online_get_count_filter[0]->online_get_count_filter?></a>
          </span>

            <span class="fillPartA absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Fill_part_A" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants applied Online and completed Part A - Awaiting for Part A screening"><?php echo $fillparta_get_count_filter[0]->fillparta_get_count_filter?></a>
          </span>

          <span class="partAScreeningToRegret absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Part_A_Screening" charset=" " 
              class="tooltips counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Regret from Part A screening">
              <?php echo $part_a_screening[0]->part_a_screening ?>
            </a>
          </span>


          <span class="partAScreeningToPartBAllocation absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_triggered" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants triggered for Part B - Awaiting to be communicated">  <?php echo $Applicants_triggered_for_Part_B_Awaiting[0]->Applicants_triggered_Part_B_Awaiting?>
              
            </a>
          </span>

            <span class="partAScreeningToPartBPresence absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_awating" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants awating for Part B presence - Communicated for Part B "><?php echo $applicants_awating_for_Part_B[0]->applicants_awating_for_Part_B_presence?> </a>
          </span> 

           <span class="partAScreeningToPartBFollowupOverall absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicants" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Part B presence"><?php echo $Overall_applicants_moved_to_Followup[0]->Overall_applicants_moved_to_Followup_Part_B?>
              
            </a>
          </span>

           <span class="partAScreeningToPartBFollowup absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_currently" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Part B presence"><?php echo $applicants_currently_in_Followup_for_Part_b[0]->applicants_currently_in_Followup_for_Part ?></a> &nbsp;

              <span  class="noFollow tooltips"  data-original-title="7 Days passed no action taken"><?php echo $Call_for_part_b_presence_currently_in_followup_7[0]->applicants_currently_in_Followup_for_Part_7_days ?></span>
          </span>

          <span class="partAScreeningToPartBFollowupExtension absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicants_part_A" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Part B presence">
                <?php echo $Overall_applicants_given_extension_Followup_for_Part_B[0]->Overall_applicants_given_extension_Followup_for_Part_B ?>
              </a>
          </span>

           <span class="partAScreeningToPartBFollowupNotInterested absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicants_moved" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Part B presence">  
              <?php echo $Overall_applicants_moved_to_Not_Interested_from_Followup[0]->Overall_applicants_moved_to_Not_Interested_from_Followup ?>
            </a>
          </span>


          <span class="partAScreeningToPartBPresent absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicants_marked" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Part B"> 
              <?php echo $Overall_applicants_marked_Present_for_Part[0]->Overall_applicants_marked_Present_for_Part ?>
             </a>
          </span>


           <span class="walkinFormSubmissions absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Walkin_applications" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall Walkin applications"><?php echo $Overall_Walkin_applications[0]->Overall_Walkin_applications ?></a>
          </span>

          <span class="walkinFormSubmissionsPartA absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Walkin_applications_part_A" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall Walkin applications Fill Part A"> <?php echo $Overall_Walkin_applications[0]->Overall_Walkin_applications ?></a>
          </span>

          
          <span class="partAtoPartBWalkin absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_moved_to" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall moved to Part B from Part A"><?php echo $Overall_Walkin_applications[0]->Overall_Walkin_applications ?></a>
          </span>

           <span class="FullFormScreening absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_moved_to" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants moved to Fill Form Screening"><?php $total_5 = $Overall_Walkin_applications[0]->Overall_Walkin_applications + $Overall_applicants_marked_Present_for_Part[0]->Overall_applicants_marked_Present_for_Part ?>

                <?php echo $total_5 ?>
        </a>
          </span>


           <span class="FullFormScreeningToRegret absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicants_moved_to_Regret" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Regret from Part A screening">
               <?php echo $Overall_applicants_moved_to_Regret[0]->Overall_applicants_moved_to_Regret ?>
              </a>
          </span>

           <span class="FullFormScreeningtoHold absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_in_Hold" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants in Hold from Fill Form Screening">-</a>
          </span>


           <span class="FullFormScreeningtoInitialInterview absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicant_awaiting_for_full_form" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Initial Interview ">
               <?php echo $Applicants_awaiting_for_Initial_Interview[0]->Applicants_awaiting_for_Initial_Interview ?>    
              </a>
          </span>


           <span class="ApplicantsMarkedPresentInitialInterview absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicants_present" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Initial Interview"> 
              <?php echo $Overall_applicants_marked_Present_for_Initial_Interview[0]->Overall_applicants_marked_Present_for_Initial_Interview ?>
            </a>
          </span>

          <span class="InitialInterview absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_currently_initial" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Initial Interview, awaiting for Next Step decision ">
                <?php echo $Applicants_currently_initial[0]->Applicants_currently_initial ?>
                 
              </a>
          </span>


           <span class="InitialInterviewToRegret absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicant_moved_to_regret" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from Initial Interview"><?php echo $Overall_applicant_moved_to_regret[0]->Overall_applicant_moved_to_regret ?> </a>
          </span>

          <span class="InitialInterviewPresenceFollowup absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicants_moved_to_Followup" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Initial Interview presence">
        <?php echo $Overall_applicants_moved_to_Followup_Initial_Interview_presence[0]->Overall_applicants_moved_to_Followup_for_Initial ?>
                
              </a>
          </span>

            <span class="InitialInterviewPresenceFollowupCurrent absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_currently_in" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Initial Interview presence">
              <?php echo $Applicants_currently_in[0]->Applicants_currently_in ?>  
              </a> &nbsp;

              <a data-toggle="modal" data-status="7_Days_passed" class="noFollow tooltips counter" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">
             (<?php echo $seven_Days_passed_no_action_taken[0]->Days_passed_no_action_taken ?>)
            </a>
          </span>


           <span class="IntialInterviewFollowupExtension absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicants_given" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Part B presence"> <?php echo $Overall_applicants_given[0]->Overall_applicants_given ?> </a>
          </span>

          <span class="IntialInterviewFollowupNotInterested absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_applicants_not_interested" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Initial Interview presence"><?php echo $Overall_applicants_not_interested[0]->Overall_applicants_not_interested ?> </a>
          </span>
             <span class="IntialInterviewCommunicationNotInterested absolute">
              <a href="#allocateProfileModal" data-toggle="modal" data-status="Intial_Interview_Communication_Not" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Initial Interview Communication"><?php echo $Intial_Interview_Communication_Not[0]->Intial_Interview_Communication_Not ?></a>
          </span>
  </div>
          <div class="CSL3TillDDM3">          
       <!-- InitialInterviewToFormalInterview: Applicants awaiting for Initial Interview  -->
       <span class="InitialInterviewToFormalInterview absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Intial_Interview_for_formal" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Formal Interview "><?php echo $Intial_Interview_for_formal[0]->Intial_Interview_for_formal ?></a>
      </span>

      <span class="ApplicantsMarkedPresentFormalInterview absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Present_for_Formal_Interview" data-stage = "" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Formal Interview"><?php echo $Present_for_Formal_Interview[0]->Present_for_Formal_Interview ?></a>
      </span>


       <span class="FormalInterview absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="awaiting_for_Next_Step_interiew" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Formal Interview, awaiting for Next Step decision "><?php echo $awaiting_for_Next_Step_interiew[0]->awaiting_for_Next_Step_interiew  ?></a>
      </span>

      <span class="FormalInterviewToRegret absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Regret_from_Formal" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from Formal Interview"> <?php echo $Regret_from_Formal[0]->Regret_from_Formal  ?></a>
      </span>

      <span class="FormalInterviewPresenceFollowup absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="moved_to_Followup_interview" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Formal Interview presence"><?php echo $moved_to_Followup_interview[0]->moved_to_Followup_interview  ?> </a>
      </span>

      <span class="FormalInterviewPresenceFollowupCurrent absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="currently_in_Followup_presence" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Formal Interview presence"><?php echo $currently_in_Followup_presence[0]->currently_in_Followup_presence  ?></a> &nbsp;
          <a  class="noFollow tooltips counter" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">(<?php echo $currently_in_Followup_presence[0]->currently_in_Followup_presence  ?>)</a>
      </span>

       <span class="FormalInterviewFollowupExtension absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="given_extension" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Formal Interview presence"><?php echo $given_extension[0]->given_extension  ?></a>
      </span>


       <span class="FormalInterviewFollowupNotInterested absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Not_Interested" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Formal Interview presence"><?php echo $Not_Interested[0]->Not_Interested  ?> </a>
      </span>



       <span class="FormalInterviewCommunicationNotInterested absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="moved_to_Not_Interested" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Formal Interview Communication"> <?php echo $moved_to_Not_Interested[0]->moved_to_Not_Interested  ?></a>
      </span>

       <span class="FormalInterviewToObservation absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status=" " class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Observation"><?php echo $awaiting_for_Observation[0]->awaiting_for_Observation  ?></a>
      </span>

       <span class="ApplicantsMarkedPresentObservation absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="marked_Present_for_job" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Observation">
          <?php echo $marked_Present_for_job[0]->marked_Present_for_job  ?> 
           </a>
      </span>

        <span class="Obsevation absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="currently_in_Observatio_for" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Observation, awaiting for Next Step decision ">  <?php echo $currently_in_Observatio_for[0]->currently_in_Observatio_for  ?> </a>
      </span>

      <span class="ObservationToRegret absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="applicant_moved_to_regret_form" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from Observation">  <?php echo $applicant_moved_to_regret_form[0]->applicant_moved_to_regret_form  ?></a>
      </span>

      <span class="ObservationPresenceFollowup absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Observation_Presence_Followup" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Observation presence">
         <?php echo $Observation_Presence_Followup[0]->Observation_Presence_Followup  ?>
         </a>
      </span>
       <span class="ObservationPresenceFollowupCurrent absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="no_actions" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Observation presence"><?php echo $no_actions[0]->no_actions  ?> </a> &nbsp;
          <a  class="noFollow tooltips counter" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">(<?php echo $Days_passed_no_action_taken[0]->Days_passed_no_action_taken  ?>)</a>
      </span>
  <span class="ObservationFollowupExtension absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="given_extension_from_observation" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Formal Interview presence"><?php echo $given_extension_from_observation[0]->given_extension_from_observation  ?> </a>
      </span>



       <span class="ObservationFollowupNotInterested absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="applicants_moved_to_Not_Interested_to_moved" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Observation presence"> <?php echo $applicants_moved_to_Not_Interested_to_moved[0]->applicants_moved_to_Not_Interested_to_moved  ?> </a>
      </span>

      <span class="ObservationToFinalCons absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Final_consultation_awaiting" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Final Consultation"> <?php echo $Final_consultation_awaiting[0]->Final_consultation_awaiting  ?> </a>
      </span>

         <span class="ApplicantsMarkedPresentFinalCons absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="present_for_Final" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Final Consultation">
            <?php echo $present_for_Final[0]->present_for_Final  ?>
          </a>
      </span>

       <span class="FinalCons absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="currently_in_Final" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Final Consultation, awaiting for Next Step decision ">
          <?php echo $currently_in_Final[0]->currently_in_Final  ?></a>
      </span>
        <!-- zk -->
       <span class="FinalConsToRegret absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Final_Cons_To" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from FInal Consultation">
         <?php echo $Final_Cons_To[0]->Final_Cons_To  ?></a>
      </span>

       <span class="FinalConsPresenceFollowup absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Final_Cons_Presence" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Final Consultation presence"> <?php echo $Final_Cons_Presence[0]->Final_Cons_Presence  ?></a>
      </span>

       <span class="FinalConsPresenceFollowupCurrent absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="recenntly_in_Followup_for_F" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Final Consultation presence"><?php echo $recenntly_in_Followup_for_F1[0]->recenntly_in_Followup_for_F1 ?></a> &nbsp;
          <span class="noFollow tooltips" data-original-title="7 Days passed no action taken">(<?php echo $recenntly_in_Followup_for_F[0]->recenntly_in_Followup_for_F  ?>)</span>
      </span>


       <span class="FinalConsFollowupExtension absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Followup_Extension" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup focresence"> <?php echo $Followup_Extension[0]->Followup_Extension  ?></a>
      </span>

      <span class="FinalConsFollowupNotInterested absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Consultation_presence" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Final Consultation presence"><?php echo $Consultation_presence[0]->Consultation_presence  ?></a>
      </span>

      <span class="FinalConsCommunicationNotInterested absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="final_communication_moved" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Final Consultation Communication"><?php echo $final_communication_moved[0]->final_communication_moved  ?> </a>
      </span>
      <!-- zk -->
      <span class="OverallOfferPrepAllocation absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Offer_Prep_Allocation" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Applicants moved to Offer Preparation from Final Consultation"></a>
      </span>
      <span class="OfferPrepAllocation absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Offer_Prep_Allocation" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants moved to Offer Preparation from Final Consultation Allocation">00</a>
      </span>
      <span class="OfferProcCommunication absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Offer_Proc_Communication" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants moved to Offer Procedure Communication from Offer Prep Allocation">00</a>
      </span>
      <span class="OfferProcPresence absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Offer_Proc_Presence" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Offer Procedure">00</a>
      </span>
      <span class="OverallOfferProcFollowup absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Offer_Proc_Followup" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Offer Procedure ">00</a>
      </span>
      <span class="ApplicantsInOfferProcFollowup absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_InOffer_Proc_Followup" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Offer Procedure Presence">00</a>
          <span class="noFollow tooltips" data-original-title="7 Days passed no action taken">(3)</span>
      </span>
      <span class="OverallOfferProcFollwupExtensions absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Offer_Proc_Follwup_Extensions" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Extension from Followup for Offer Procedure">00</a>
      </span>
      <span class="OverallOfferProcNotInterested absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Offer_Proc_Not_Interested" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not interested from Followup for Offer Procedure ">00</a>
      </span>
      <span class="ApplicantInOfferProcedure absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicant_InOffer_Procedure" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants currently in Offer Procedure from Offer preparation">00</a>
      </span>
      <span class="OverallApplicanttoCompChecklist absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Applicantto_Comp_Checklist" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Complete Checklist from Offer Procedure ">00</a>
      </span>
      <span class="ApplicantsInCompChecklist absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_In_Comp_Checklist" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants Currently in Complete Checklist ">00</a>
      </span>
      <span class="OverallApplicantsCompChecklistFollowup absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Applicants_Comp_Checklist_Followup" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup For Complete Checklist">00</a>
      </span>
      <span class="ApplicantsInCompChecklistFollowup absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_In_Comp_Checklist_Followup" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants In Followup For Complete Checklist ">00</a>
          <span class="noFollow tooltips" data-original-title="7 Days passed no action taken">(3)</span>
      </span>
      <span class="OverallApplicantsNotInterestedFromCompChecklistFollowup absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Applicants_Not_Interested_From_Comp_Checklist_Followup" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup For Complete Checklist ">00</a>
      </span>
      <span class="OverallApplicantsExtensionFromCompChecklistFollowup absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Applicants_Extension_From_Comp_Checklist_Followup" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Extension from Followup For Complete Checklist ">00</a>
      </span>
      <span class="ApplicantsRecruitmentComplete absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicants_Recruitment_Complete" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicant Recruitment Complete ">00</a>
      </span>
      <span class="OverallApplicantsAborted absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Applicants_Aborted" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants Aborted/not Interested">00</a>
      </span>
      <span class="OverallApplicantsRegretted absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Overall_Applicants_Regretted" class="tooltips gray counter" data-container="body" data-placement="top" data-original-title="Overall applicants Regretted">00</a>
      </span>
      <span class="ApplicantArchive absolute">
          <a href="#allocateProfileModal" data-toggle="modal" data-status="Applicant_Archive" class="tooltips counter" data-container="body" data-placement="top" data-original-title="Applicants in Archive ">00</a>
      </span>

 
	</div>

</div>