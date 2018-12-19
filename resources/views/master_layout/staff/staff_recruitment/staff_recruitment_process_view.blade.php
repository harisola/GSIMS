
<div class="page-bar">
 <ul class="page-breadcrumb">
  <li>
   <a href="index.html">Home</a>
   <i class="fa fa-circle"></i>
</li>
<li>
   <span>HR Recruitment Processflow</span>
</li>
</ul>
<!-- page-breadcrumb -->
</div>

@php 

   $num_1=0;
   $num_2=0;

  $num_3=0;
  $num_4=0;
  $num_4_1=0;
  $num_4_2=0;
  $num_4_3=0;
  $num_4_4=0;
  $num_4_5=0;


  $num_5=0;
  $num_6=0;

  $num_7=0;
  $num_8=0;
  $num_9=0;
  $num_10=0;
  $num_11=0;
  $num_12=0;


  $num_13=0;


  $num_14=0;
  $num_15=0;

  $num_16=0;
  $num_17=0;


  $num_18=0;


  $num_19=0;
  $num_20=0;
  $num_21=0;

  $num_22=0;

  $num_23=0;


  $num_24=0;
  $num_25=0;
  $num_26=0;
  $num_27=0;
  $num_28=0;
  $num_29=0;
  $num_30=0;



  $num_31=0;
  $num_32=0;
  $num_33=0;
  $num_34=0;
  $num_35=0;
  $num_36=0;
  $num_37=0;
  $num_38=0;
  $num_39=0;



  $num_40=0;
  $num_41=0;
  $num_42=0;
  $num_43=0;
  $num_44=0;
  $num_45=0;
  $num_46=0;
  $num_47=0;
  $num_48=0;

  




  $counter=1;
  if( !empty( $query_resultant ) ) :
    foreach($query_resultant as $r) :

        if( $r["Query_num"] == 1.0 )
          $num_1 = number_format($r["Total_form"]);

        if( $r["Query_num"] == 2.0 )
          $num_2 = number_format($r["Total_form"]);

        if( $r["Query_num"] == 3.0 )
          $num_3 = number_format($r["Total_form"]);

        if( $r["Query_num"] == 4.0 )
          $num_4 = number_format($r["Total_form"]);

        if( $r["Query_num"] == 4.1 )
          $num_4_1 = number_format($r["Total_form"]);

        if( $r["Query_num"] == 4.2 )
          $num_4_2 = number_format($r["Total_form"]);

        if( $r["Query_num"] == 4.3 )
          $num_4_3 = number_format($r["Total_form"]);

        if( $r["Query_num"] == 4.4 )
          $num_4_4 = number_format($r["Total_form"]);

        if( $r["Query_num"] == 4.5 )
          $num_4_5 = number_format($r["Total_form"]);


          if( $r["Query_num"] == 5 )
          $num_5 = number_format($r["Total_form"]);

          if( $r["Query_num"] == 6 )
          $num_6 = number_format($r["Total_form"]);

          if( $r["Query_num"] == 7.0 )
          $num_7 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 8.0 )
          $num_8 = number_format($r["Total_form"]);

          if( $r["Query_num"] == 9.0 )
          $num_9 = number_format($r["Total_form"]);

          if( $r["Query_num"] == 10.0 )
          $num_10 = number_format($r["Total_form"]);


          if( $r["Query_num"] == 11.0 )
          $num_11 = number_format($r["Total_form"]);

          if( $r["Query_num"] == 12.0 )
          $num_12 = number_format($r["Total_form"]);


          if( $r["Query_num"] == 13.0 )
          $num_13 = number_format($r["Total_form"]);

          if( $r["Query_num"] == 14.0 )
          $num_14 = number_format($r["Total_form"]);

          if( $r["Query_num"] == 15.0 )
          $num_15 = number_format($r["Total_form"]);

          if( $r["Query_num"] == 16.0 )
          $num_16 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 17.0 )
         $num_17 = number_format($r["Total_form"]);


        if( $r["Query_num"] == 18.0 )
         $num_18 = number_format($r["Total_form"]);


        if( $r["Query_num"] == 19.0 )
         $num_19 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 20.0 )
         $num_20 = number_format($r["Total_form"]);

        if( $r["Query_num"] == 21.0 )
         $num_21 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 22.0 )
         $num_22 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 23.0 )
         $num_23 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 24.0 )
         $num_24 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 25.0 )
         $num_25 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 26.0 )
         $num_26 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 27.0 )
         $num_27 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 28.0 )
         $num_28 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 29.0 )
         $num_29 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 30.0 )
         $num_30 = number_format($r["Total_form"]);



         if( $r["Query_num"] == 31.0 )
         $num_31 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 32.0 )
         $num_32 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 33.0 )
         $num_33 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 34.0 )
         $num_34 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 35.0 )
         $num_35 = number_format($r["Total_form"]);



         if( $r["Query_num"] == 36.0 )
         $num_36 = number_format($r["Total_form"]);



         if( $r["Query_num"] == 37.0 )
         $num_37 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 38.0 )
         $num_38 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 39.0 )
         $num_39 = number_format($r["Total_form"]);



         if( $r["Query_num"] == 40.0 )
         $num_40 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 41.0 )
         $num_41 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 42.0 )
         $num_42 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 43.0 )
         $num_43 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 44.0 )
         $num_44 = number_format($r["Total_form"]);


         if( $r["Query_num"] == 45.0 )
         $num_45 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 46.0 )
         $num_46 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 47.0 )
         $num_47 = number_format($r["Total_form"]);

         if( $r["Query_num"] == 48.0 )
         $num_48 = number_format($r["Total_form"]);

        





        $counter++;
    endforeach;
  endif;

 
@endphp

<div class="row marginTop20">
  <div class="col-md-12 marginTop20">
       Filter Area
   </div><!-- col-md-12 -->
   <div class="col-md-12" style="overflow-y: hidden;position:relative;">
       <img src="img/RecruitmentProcessflow.jpg" width="3500" />
        <div class="modal fade" id="allocateProfileModal" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                   <h3 class="modal-title">Recruitment Applicants</h3>
                  </div>
                  <div class="modal-body"> 
                      <div class="portlet box blue-hoki">
                          <div class="portlet-title">
                              <div class="caption">
                                  <i class="fa fa-user"></i><font id="selected_individuals">-</font></div>
                          </div><!-- portlet-title -->
                          <div class="portlet-body fixedHeightmodalPortlet">
                              <div class="col-md-4 borderRightDashed">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered fixed-height-NoScroll marginBottom0">
                                   <div class="portlet-title padding0">
                                      <div class="caption caption-md">
                                         <h3 id="staffView_StaffList_Total" class="marginTop0 marginBottom0 padding0">Archived Applicants</h3>
                                      </div>
                                   </div><!-- portlet-title -->

                                   <!-- portlet-title -->
                                   <div class="portlet-body">
                                      <div class="inputs">
                                      <!-- inputs -->
                                      <div class="table-scrollable table-scrollable-borderless" id="table_data">
                                         <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="new_table">
                                             <thead>
                                                 <tr>
                                                     <th class="all">Form #</th>
                                                     <th class="all">Name</th>
                                                     <th class="all">Position</th>
                                                     <th class="none">Mobile: </th>
                                                     <th class="none">Landline: </th>
                                                     <th class="none">CNIC: </th>
                                                     <th class="none">Standing: </th>
                                                     <th class="none">Apply Date:</th>
                                                     <th class="none">Source: </th>
                                                     <th class="none">Comments: </th>
                                                     <th class="none">Modified Date:</th>
                                                      <th class="all">Action</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                          </table>
                                      </div><!-- table_data -->
                                  <!--------------------------->
                                        
                                      <!-- table-scrollable-borderless -->
                                   </div><!-- portlet-body -->
                                </div><!-- portlet -->
                             </div><!-- col-md-4 -->
                           </div>
                          </div><!-- portlet-body fixedHeightmodalPortlet-->
                      </div>
                  </div>
                  <div class="modal-footer text-center">
                      <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div><!-- modal -->
       <div class="startTillCSL3">
           <span class="OnlineFormSubmissions absolute">
              <a href="#allocateProfileModal" data-toggle="modal" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Applicants applied Online" >{!! $num_1 !!} </a>
          </span>

          <span class="fillPartA absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants applied Online and completed Part A - Awaiting for Part A screening">{!! $num_2 !!}</a>
          </span>


          <span class="partAScreeningToRegret absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Regret from Part A screening">
              {!! $num_9 !!}
            </a>
          </span><!-- partAScreeningToRegret -->

          <!-- partAScreeningToPartBAllocation: Applicants who were called for Part B and communication to the applicant is still pending  -->
          <span class="partAScreeningToPartBAllocation absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants triggered for Part B - Awaiting to be communicated">
              {!! $num_3 !!}
            </a>
          </span><!-- partAScreeningToPartBAllocation -->
          <?php /* 
          <!-- partAScreeningToPartBCommunicatedOverall: Overall applicants communicated for Part B -->
          <span class="partAScreeningToPartBCommunicatedOverall absolute">
            <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants communicated for Part B ">30</a>
          </span><!-- partAScreeningToPartBCommunicatedOverall -->
      */ ?>
           <!-- partAScreeningToPartBPresence: Applicants awaited for Part B presence -->
           <span class="partAScreeningToPartBPresence absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants awating for Part B presence - Communicated for Part B ">{!! $num_4 !!}</a>
          </span><!-- partAScreeningToPartBPresence -->

          <!-- partAScreeningToPartBFollowupOverall: Overall applicants moved to Followup for Part B presence -->
          <span class="partAScreeningToPartBFollowupOverall absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Part B presence">
              {!! $num_4_1 !!}
            </a>
          </span><!-- partAScreeningToPartBFollowupOverall -->

          <!-- partAScreeningToPartBFollowup: Applicants currently in Followup for Part B presence -->
          <span class="partAScreeningToPartBFollowup absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Part B presence">{!! $num_4_2 !!}</a> &nbsp;<a href="#" class="noFollow tooltips" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">({!! $num_4_3 !!})</a>
          </span><!-- partAScreeningToPartBFollowup -->

          <!-- partAScreeningToPartBFollowupExtension: Overall applicants given extension from Followup for Part B presence -->
          <span class="partAScreeningToPartBFollowupExtension absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Part B presence">
                {!! $num_4_4 !!}
              </a>
          </span><!-- partAScreeningToPartBFollowupExtension -->

          <!-- partAScreeningToPartBFollowupNotInterested: Overall applicants moved to Not Interested from Followup for Part B presence -->
          <span class="partAScreeningToPartBFollowupNotInterested absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Part B presence">  
              {!! $num_4_5 !!}
            </a>
          </span><!-- partAScreeningToPartBFollowupNotInterested -->

          <!-- partAScreeningToPartBPresent: Overall applicants marked Present for Part B -->
          <span class="partAScreeningToPartBPresent absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Part B"> 
               {!! $num_7 !!}
             </a>
          </span><!-- partAScreeningToPartBPresent -->


          <!------------------------------------------ Walkin ---------------------------------->


          <!-- walkinFormSubmissions: Walkin applicants  -->
          <span class="walkinFormSubmissions absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall Walkin applications"> {!! $num_5 !!} </a>
          </span><!-- walkinFormSubmissions -->

          <!-- walkinFormSubmissionsPartA: Walkin applicants fill part A  -->
          <span class="walkinFormSubmissionsPartA absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall Walkin applications Fill Part A"> {!! $num_5 !!}</a>
          </span><!-- walkinFormSubmissionsPartA -->

          <!-- partAtoPartBWalkin: Overall moved to Part B from Part A -->
          <span class="partAtoPartBWalkin absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall moved to Part B from Part A"> {!! $num_5 !!}</a>
          </span><!-- partAtoPartBWalkin -->


          <!----------------------------------- Combined  ---------------------------------------->
          <!----------------------------------- Full Form Screening Start ------------------------>

          <!-- FullFormScreening: Applicants moved to Full Form Screening -->
          <span class="FullFormScreening absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants moved to Fill Form Screening">{!! ( $num_5 + $num_7 ) !!}</a>
          </span><!-- FullFormScreening -->

          <!-- FullFormScreeningToRegret: Overall applicant moved to Regret from Full Form screening  -->
          <span class="FullFormScreeningToRegret absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Regret from Part A screening">
                {!! $num_10 !!}
              </a>
          </span><!-- FullFormScreeningToRegret -->

          <!-- FullFormScreeningtoHold: Overall applicants moved to Hold from Full Form Screening -->
          <span class="FullFormScreeningtoHold absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants in Hold from Fill Form Screening">-</a>
          </span><!-- FullFormScreeningtoHold -->

          <!-- FullFormScreeningtoInitialInterview: Applicants awaiting for Initial Interview  -->
          <span class="FullFormScreeningtoInitialInterview absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Initial Interview ">
                 {!! $num_11 !!}
              </a>
          </span><!-- FullFormScreeningtoInitialInterview -->

          <!-- ApplicantsMarkedPresentInitialInterview: Overall applicants marked Present for Part B -->
          <span class="ApplicantsMarkedPresentInitialInterview absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Initial Interview"> 
              {!! $num_12 !!}
            </a>
          </span><!-- ApplicantsMarkedPresentInitialInterview -->

          <!-- InitialInterview: Applicants currently in Initial Interview  -->
          <span class="InitialInterview absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Initial Interview, awaiting for Next Step decision ">
                {!! $num_19 !!}
                 
              </a>
          </span><!-- InitialInterview -->

          <!-- InitialInterviewToRegret: Overall applicant moved to Regret from Initial Interview  -->
          <span class="InitialInterviewToRegret absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from Initial Interview">{!! $num_30 !!}</a>
          </span><!-- InitialInterviewToRegret -->

          <!-- InitialInterviewPresenceFollowup: Overall applicants moved to Followup for Initial Interview presence -->
          <span class="InitialInterviewPresenceFollowup absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Initial Interview presence">
                 {!! $num_13 !!}
              </a>
          </span><!-- InitialInterviewPresenceFollowup -->

          <!-- InitialInterviewPresenceFollowupCurrent: Applicants currently in Followup for Part B presence -->
          <span class="InitialInterviewPresenceFollowupCurrent absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Initial Interview presence">
                 {!! $num_14 !!}
              </a> &nbsp;

              <a href="#" class="noFollow tooltips" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">
              ({!! $num_15 !!})
            </a>
          </span><!-- InitialInterviewPresenceFollowupCurrent -->

          <!-- IntialInterviewFollowupExtension: Overall applicants given extension from Followup for Part B presence -->
          <span class="IntialInterviewFollowupExtension absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Part B presence"> {!! $num_16 !!}</a>
          </span><!-- IntialInterviewFollowupExtension -->

          <!-- IntialInterviewFollowupNotInterested: Overall applicants moved to Not Interested from Followup for Initial Interview presence -->
          <span class="IntialInterviewFollowupNotInterested absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Initial Interview presence">{!! $num_17 !!}</a>
          </span><!-- IntialInterviewFollowupNotInterested -->

          <!-- IntialInterviewCommunicationNotInterested: Overall applicants moved to Not Interested from Initial Interview Communication -->
          <span class="IntialInterviewCommunicationNotInterested absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Initial Interview Communication">{!! $num_18 !!}</a>
          </span><!-- IntialInterviewCommunicationNotInterested -->
      </div><!-- startTillCSL2 -->
      <div class="CSL3TillDDM3">          
       <!-- InitialInterviewToFormalInterview: Applicants awaiting for Initial Interview  -->
       <span class="InitialInterviewToFormalInterview absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Formal Interview ">{!! $num_20 !!}</a>
      </span><!-- InitialInterviewToFormalInterview -->

      <!-- ApplicantsMarkedPresentFormalInterview: Overall applicants marked Present for Formal Interview -->
      <span class="ApplicantsMarkedPresentFormalInterview absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Formal Interview">{!! $num_21 !!}</a>
      </span><!-- ApplicantsMarkedPresentFormalInterview -->

      <!-- FormalInterview: Applicants currently in Formal Interview  -->
      <span class="FormalInterview absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Formal Interview, awaiting for Next Step decision ">{!! $num_22 !!}</a>
      </span><!-- FormalInterview -->

      <!-- FormalInterviewToRegret: Overall applicant moved to Regret from Initial Interview  -->
      <span class="FormalInterviewToRegret absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from Formal Interview">{!! $num_29 !!}</a>
      </span><!-- FormalInterviewToRegret -->

      <!-- FormalInterviewPresenceFollowup: Overall applicants moved to Followup for Initial Interview presence -->
      <span class="FormalInterviewPresenceFollowup absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Formal Interview presence">{!! $num_23 !!}</a>
      </span><!-- FormalInterviewPresenceFollowup -->

      <!-- FormalInterviewPresenceFollowupCurrent: Applicants currently in Followup for Part B presence -->
      <span class="FormalInterviewPresenceFollowupCurrent absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Formal Interview presence">{!! $num_24 !!}</a> &nbsp;<a href="#" class="noFollow tooltips" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">({!! $num_25 !!})</a>
      </span><!-- FormalInterviewPresenceFollowupCurrent -->

      <!-- FormalInterviewFollowupExtension: Overall applicants given extension from Followup for Part B presence -->
      <span class="FormalInterviewFollowupExtension absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Formal Interview presence">{!! $num_28 !!}</a>
      </span><!-- FormalInterviewFollowupExtension -->

      <!-- FormalInterviewFollowupNotInterested: Overall applicants moved to Not Interested from Followup for Initial Interview presence -->
      <span class="FormalInterviewFollowupNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Formal Interview presence">{!! $num_26 !!}</a>
      </span><!-- FormalInterviewFollowupNotInterested -->

      <!-- FormalInterviewCommunicationNotInterested: Overall applicants moved to Not Interested from Initial Interview Communication -->
      <span class="FormalInterviewCommunicationNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Formal Interview Communication">{!! $num_27 !!}</a>
      </span><!-- FormalInterviewCommunicationNotInterested -->
      <!-------------------------------------------------------------------------------------------------------------------------------- -->
      <!-- FormalInterviewToObservation: Applicants awaiting for Observation  -->
      <span class="FormalInterviewToObservation absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Observation">{!! $num_31 !!}</a>
      </span><!-- FormalInterviewToObservation -->

      <!-- ApplicantsMarkedPresentObservation: Overall applicants marked Present for Observation -->
      <span class="ApplicantsMarkedPresentObservation absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Observation">{!! $num_32 !!}</a>
      </span><!-- ApplicantsMarkedPresentObservation -->

      <!-- Obsevation: Applicants currently in Formal Interview  -->
      <span class="Obsevation absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Observation, awaiting for Next Step decision ">{!! $num_33 !!}</a>
      </span><!-- Obsevation -->

      <!-- ObservationToRegret: Overall applicant moved to Regret from Initial Interview  -->
      <span class="ObservationToRegret absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from Observation">{!! $num_38 !!}</a>
      </span><!-- ObservationToRegret -->

      <!-- ObservationPresenceFollowup: Overall applicants moved to Followup for Initial Interview presence -->
      <span class="ObservationPresenceFollowup absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Observation presence">
          {!! $num_34 !!}</a>
      </span><!-- ObservationPresenceFollowup -->

      <!-- ObservationPresenceFollowupCurrent: Applicants currently in Followup for Part B presence -->
      <span class="ObservationPresenceFollowupCurrent absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Observation presence"> {!! $num_35 !!}</a> &nbsp;<a href="#" class="noFollow tooltips" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">({!! $num_36 !!})</a>
      </span><!-- ObservationPresenceFollowupCurrent -->

      <!-- ObservationFollowupExtension: Overall applicants given extension from Followup for Part B presence -->
      <span class="ObservationFollowupExtension absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Formal Interview presence">{!! $num_39 !!}</a>
      </span><!-- ObservationFollowupExtension -->

      <!-- ObservationFollowupNotInterested: Overall applicants moved to Not Interested from Followup for Initial Interview presence -->
      <span class="ObservationFollowupNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Observation presence">{!! $num_37 !!}</a>
      </span><!-- ObservationFollowupNotInterested -->

      <!-- ObservationCommunicationNotInterested: Overall applicants moved to Not Interested from Observation Communication -->
      <span class="ObservationCommunicationNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Observation Communication">{!! $num_37 !!}</a>
      </span><!-- ObservationCommunicationNotInterested -->
      <!--------------------------------------------------------------------------------------------------------------------------------- -->
      <!-- ObservationToFinalCons: Applicants awaiting for Final Consultation  -->
      <span class="ObservationToFinalCons absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Final Consultation">{!! $num_40 !!}</a>
      </span><!-- ObservationToFinalCons -->

      <!-- ApplicantsMarkedPresentFinalCons: Overall applicants marked Present for Final Consultation -->
      <span class="ApplicantsMarkedPresentFinalCons absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Final Consultation">
          {!! $num_41 !!}</a>
      </span><!-- ApplicantsMarkedPresentFinalCons -->

      <!-- FinalCons: Applicants currently in Final Consultation  -->
      <span class="FinalCons absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Final Consultation, awaiting for Next Step decision ">
          {!! $num_42 !!}</a>
      </span><!-- FinalCons -->

      <!-- FinalConsToRegret: Overall applicant moved to Regret from Final Consultation  -->
      <span class="FinalConsToRegret absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from FInal Consultation">
          {!! $num_47 !!}</a>
      </span><!-- FinalConsToRegret -->

      <!-- FinalConsPresenceFollowup: Overall applicants moved to Followup for Final Consultation presence -->
      <span class="FinalConsPresenceFollowup absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Final Consultation presence">{!! $num_43 !!}</a>
      </span><!-- FinalCons -->

      <!-- FinalConsPresenceFollowupCurrent: Applicants currently in Followup for Final Consultation presence -->
      <span class="FinalConsPresenceFollowupCurrent absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Final Consultation presence">{!! $num_44 !!}</a> &nbsp;<a href="#" class="noFollow tooltips" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">({!! $num_45 !!})</a>
      </span><!-- FinalConsPresenceFollowupCurrent -->

      <!-- FinalConsFollowupExtension: Overall applicants given extension from Followup for Part B presence -->
      <span class="FinalConsFollowupExtension absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Final Consultation presence">{!! $num_48 !!}</a>
      </span><!-- FinalConsFollowupExtension -->

      <!-- FinalConsFollowupNotInterested: Overall applicants moved to Not Interested from Followup for Final Consultation presence -->
      <span class="FinalConsFollowupNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Final Consultation presence">{!! $num_46 !!}</a>
      </span><!-- FinalConsFollowupNotInterested -->

      <!-- FinalConsCommunicationNotInterested: Overall applicants moved to Not Interested from Initial Interview Communication -->
      <span class="FinalConsCommunicationNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Final Consultation Communication">{!! $num_47 !!}</a>
      </span><!-- FinalConsCommunicationNotInterested -->
  </div><!-- startTillCSL2 -->
  <div class="DDM3TillEnd">

  </div><!-- startTillCSL2 -->
</div><!-- col-md-12 -->
</div><!-- row -->





<style>
.modal-dialog {
    width: 80% !important;
    margin: 30px auto;
}
.startTillCSL3 a,
.CSL3TillDDM3 a,
.DDM3TillEnd a {
}
.startTillCSL3 {
    width: 1220px;
    height: 650px;
    position: absolute;
    top: 0;
    left: 0;
}

.CSL3TillDDM3 {
    width: 990px;
    height: 650px;
    position: absolute;
    top: 0;
    left:1220px;
}
.DDM3TillEnd {
    width: 1300px;
    height: 650px;
    position: absolute;
    top: 0;
    left:2210px;
}
/* CSS for individual links start here */
a.gray {
    color: #888;
    font-style: italic;
    font-weight: normal;
}
.absolute {
    position: absolute;
    font-size: 16px;
    font-weight: bold;
}
.noFollow {
    color: red;
}
.OnlineFormSubmissions {
    top: 22px;
    left: 120px;
}
.walkinFormSubmissions {
    top: 300px;
    left: 120px;
}
.walkinFormSubmissionsPartA {
    top: 300px;
    left: 120px;
}
.walkinFormSubmissionsPartA {
    top: 300px;
    left: 400px;
}
.fillPartA {
    top: 22px;
    left: 400px;
}
.partAScreeningToRegret {
    top: 50px;
    left: 624px;
}
.partAScreeningToPartBAllocation {
    top: 115px;
    left: 525px;
}
.partAScreeningToPartBPresence {
    top: 259px;
    left: 525px;
}
.partAScreeningToPartBCommunicatedOverall {
    top: 195px;
    left: 575px;
}
.partAScreeningToPartBFollowupOverall {    
    top: 405px;
    left: 575px;
}
.partAScreeningToPartBFollowup {
    top: 485px;
    left: 590px;
}
.partAScreeningToPartBFollowupExtension {
    top: 405px;
    left: 515px;
}
.partAScreeningToPartBFollowupNotInterested {
    top: 585px;
    left: 575px;
}
.partAScreeningToPartBPresent{
    top: 295px;
    left: 675px;    
}
.partAtoPartBWalkin {
    top: 325px;
    left: 615px;
}
/* */
.FullFormScreening {
    top: 325px;
    left: 795px;    
}
.FullFormScreeningToRegret {
    top: 90px;
    left: 875px;
}
.FullFormScreeningtoHold {
    top: 420px;
    left: 825px;
}
.FullFormScreeningtoInitialInterview{
    top: 325px;
    left: 1005px;
}
.ApplicantsMarkedPresentInitialInterview {
    top: 305px;
    left: 1085px;
}
.InitialInterview {
    top: 305px;
    left: 1135px;   
}
.InitialInterviewToRegret{
    top: 90px;
    left: 1185px;
}
.InitialInterviewPresenceFollowup {    
    top: 405px;
    left: 1115px;
}
.InitialInterviewPresenceFollowupCurrent {
    top: 485px;
    left: 1130px;
}
.IntialInterviewCommunicationNotInterested {
    top: 585px;
    left: 955px;
}
.IntialInterviewFollowupNotInterested {
    top: 585px;
    left: 1115px;
}
.IntialInterviewFollowupExtension {
    top: 475px;
    left: 995px;
}
/* Initial to Formal */
.InitialInterviewToFormalInterview {
    top: 325px;
    left: 105px;
}
.ApplicantsMarkedPresentFormalInterview {
    top: 305px;
    left: 185px;
}
.FormalInterview {
    top: 305px;
    left: 235px;    
}
.FormalInterviewToRegret{
    top: 90px;
    left: 285px;
}
.FormalInterviewPresenceFollowup {    
    top: 405px;
    left: 215px;
}
.FormalInterviewPresenceFollowupCurrent {
    top: 485px;
    left: 230px;
}
.FormalInterviewCommunicationNotInterested {
    top: 585px;
    left: 55px;
}
.FormalInterviewFollowupNotInterested {
    top: 585px;
    left: 215px;
}
.FormalInterviewFollowupExtension {
    top: 475px;
    left: 95px;
}
/* Formal to Obsevation */
.FormalInterviewToObservation {
    top: 325px;
    left: 425px;
}
.ApplicantsMarkedPresentObservation {
    top: 305px;
    left: 525px;
}
.Obsevation {
    top: 305px;
    left: 575px;    
}
.ObservationToRegret{
    top: 90px;
    left: 625px;
}
.ObservationPresenceFollowup {    
    top: 405px;
    left: 555px;
}
.ObservationPresenceFollowupCurrent {
    top: 485px;
    left: 570px;
}
.ObservationCommunicationNotInterested {
    top: 585px;
    left: 375px;
}
.ObservationFollowupNotInterested {
    top: 585px;
    left: 555px;
}
.ObservationFollowupExtension {
    top: 475px;
    left: 415px;
}
/* Obsevation to FinalConsultation */
.ObservationToFinalCons {
    top: 325px;
    left: 765px;
}
.ApplicantsMarkedPresentFinalCons {
    top: 305px;
    left: 855px;
}
.FinalCons {
    top: 305px;
    left: 905px;    
}
.FinalConsToRegret{
    top: 90px;
    left: 955px;
}
.FinalConsPresenceFollowup {    
    top: 405px;
    left: 885px;
}
.FinalConsPresenceFollowupCurrent {
    top: 485px;
    left: 900px;
}
.FinalConsCommunicationNotInterested {
    top: 585px;
    left: 705px;
}
.FinalConsFollowupNotInterested {
    top: 585px;
    left: 885px;
}
.FinalConsFollowupExtension {
    top: 475px;
    left: 745px;
}
/* Offer Preparation */
</style>
<!-- BEGIN USE PROFILE -->

<script>
</script>

<script>
   loadScript("{{ URL::to('metronic') }}/global/plugins/bootbox/bootbox.min.js", function(){   
    loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){    

     loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){

      loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
       loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){


         loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){


             loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
              loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                  loadScript("{{ URL::to('metronic') }}/global/plugins/moment.js", function(){
                     loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js", function(){
                         loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-datepaginator/bootstrap-datepaginator.min.js", function(){
                                      // loadScript("{{ URL::to('metronic') }}/pages/scripts/ui-datepaginator.min.js", function(){
                                         loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){ 
                                             loadScript("{{ URL::to('metronic') }}/global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js", function(){
                                                 loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-markdown/lib/markdown.js", function(){
                                                     loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js", function(){
                                                         loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-summernote/summernote.min.js", function(){
                                                             loadScript("{{ URL::to('metronic') }}/pages/scripts/components-ion-sliders.js", function(){
                                                                loadScript("{{ URL::to('metronic') }}/global/plugins/time-range/js/vue.min.js", function(){
                                                                    loadScript("{{ URL::to('metronic') }}/global/plugins/select2/js/select2.full.min.js", function(){
                                                                        loadScript("{{ URL::to('metronic') }}/pages/scripts/components-select2.min.js", function(){
                                                                            loadScript("{{ URL::to('metronic') }}/global/plugins/time-range/js/flatpickr.min.js", function(){

                                                                            loadScript("{{ URL::to('metronic') }}/global/plugins/time-range/js/nouislider.min.js", function(){
                                                                            loadScript("{{ URL::to('metronic') }}/global/plugins/time-range/js/moment.min.js", function(){
                                                                            //loadScript("{{ URL::to('metronic') }}/global/plugins/time-range/js/index.js", function(){

                                                                            loadScript("{{URL::to('metronic')}}/global/plugins/jquery-validation/js/jquery.validate.js",function(){
                                                                            loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
                                                                            loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction);
                                                                            });
                                                                            });
                                                                            });
                                                                            //});
                                                                            });
                                                                        });
                                                                        });});
                                                                });
                                                            });
                                                         });
                                                     });
                                                 });
                                             });
                                         });
                                       //});
                                   });
                     });
});
});
});

});


});
});
});
});
});
</script>