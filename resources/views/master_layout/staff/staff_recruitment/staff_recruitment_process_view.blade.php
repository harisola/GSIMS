
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
       <div class="startTillCSL3">
           <span class="OnlineFormSubmissions absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Applicants applied Online">{!! $num_1 !!} </a>
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
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants moved to Full Form Screening">{!! $num_8 !!}</a>
          </span><!-- FullFormScreening -->

          <!-- FullFormScreeningToRegret: Overall applicant moved to Regret from Full Form screening  -->
          <span class="FullFormScreeningToRegret absolute">
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Regret from Part A screening">
                {!! $num_10 !!}
              </a>
          </span><!-- FullFormScreeningToRegret -->

          <!-- FullFormScreeningtoHold: Overall applicants moved to Hold from Full Form Screening -->
          <span class="FullFormScreeningtoHold absolute">
              <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants in Hold from Full Form Screening">-</a>
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
              <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from Initial Interview">20r</a>
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
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from Formal Interview">20</a>
      </span><!-- FormalInterviewToRegret -->

      <!-- FormalInterviewPresenceFollowup: Overall applicants moved to Followup for Initial Interview presence -->
      <span class="FormalInterviewPresenceFollowup absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Formal Interview presence">{!! $num_23 !!}</a>
      </span><!-- FormalInterviewPresenceFollowup -->

      <!-- FormalInterviewPresenceFollowupCurrent: Applicants currently in Followup for Part B presence -->
      <span class="FormalInterviewPresenceFollowupCurrent absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Formal Interview presence">30</a> &nbsp;<a href="#" class="noFollow tooltips" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">(15)</a>
      </span><!-- FormalInterviewPresenceFollowupCurrent -->

      <!-- FormalInterviewFollowupExtension: Overall applicants given extension from Followup for Part B presence -->
      <span class="FormalInterviewFollowupExtension absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Formal Interview presence">14</a>
      </span><!-- FormalInterviewFollowupExtension -->

      <!-- FormalInterviewFollowupNotInterested: Overall applicants moved to Not Interested from Followup for Initial Interview presence -->
      <span class="FormalInterviewFollowupNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Formal Interview presence">09</a>
      </span><!-- FormalInterviewFollowupNotInterested -->

      <!-- FormalInterviewCommunicationNotInterested: Overall applicants moved to Not Interested from Initial Interview Communication -->
      <span class="FormalInterviewCommunicationNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Formal Interview Communication">09</a>
      </span><!-- FormalInterviewCommunicationNotInterested -->
      <!-------------------------------------------------------------------------------------------------------------------------------- -->
      <!-- FormalInterviewToObservation: Applicants awaiting for Observation  -->
      <span class="FormalInterviewToObservation absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Observation">30</a>
      </span><!-- FormalInterviewToObservation -->

      <!-- ApplicantsMarkedPresentObservation: Overall applicants marked Present for Observation -->
      <span class="ApplicantsMarkedPresentObservation absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Observation">70</a>
      </span><!-- ApplicantsMarkedPresentObservation -->

      <!-- Obsevation: Applicants currently in Formal Interview  -->
      <span class="Obsevation absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Observation, awaiting for Next Step decision ">60</a>
      </span><!-- Obsevation -->

      <!-- ObservationToRegret: Overall applicant moved to Regret from Initial Interview  -->
      <span class="ObservationToRegret absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from Observation">20</a>
      </span><!-- ObservationToRegret -->

      <!-- ObservationPresenceFollowup: Overall applicants moved to Followup for Initial Interview presence -->
      <span class="ObservationPresenceFollowup absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Observation presence">150</a>
      </span><!-- ObservationPresenceFollowup -->

      <!-- ObservationPresenceFollowupCurrent: Applicants currently in Followup for Part B presence -->
      <span class="ObservationPresenceFollowupCurrent absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Observation presence">30</a> &nbsp;<a href="#" class="noFollow tooltips" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">(15)</a>
      </span><!-- ObservationPresenceFollowupCurrent -->

      <!-- ObservationFollowupExtension: Overall applicants given extension from Followup for Part B presence -->
      <span class="ObservationFollowupExtension absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Formal Interview presence">14</a>
      </span><!-- ObservationFollowupExtension -->

      <!-- ObservationFollowupNotInterested: Overall applicants moved to Not Interested from Followup for Initial Interview presence -->
      <span class="ObservationFollowupNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Observation presence">09</a>
      </span><!-- ObservationFollowupNotInterested -->

      <!-- ObservationCommunicationNotInterested: Overall applicants moved to Not Interested from Observation Communication -->
      <span class="ObservationCommunicationNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Observation Communication">09</a>
      </span><!-- ObservationCommunicationNotInterested -->
      <!--------------------------------------------------------------------------------------------------------------------------------- -->
      <!-- ObservationToFinalCons: Applicants awaiting for Final Consultation  -->
      <span class="ObservationToFinalCons absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants awaiting for Final Consultation">30</a>
      </span><!-- ObservationToFinalCons -->

      <!-- ApplicantsMarkedPresentFinalCons: Overall applicants marked Present for Final Consultation -->
      <span class="ApplicantsMarkedPresentFinalCons absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Final Consultation">70</a>
      </span><!-- ApplicantsMarkedPresentFinalCons -->

      <!-- FinalCons: Applicants currently in Final Consultation  -->
      <span class="FinalCons absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Final Consultation, awaiting for Next Step decision ">60</a>
      </span><!-- FinalCons -->

      <!-- FinalConsToRegret: Overall applicant moved to Regret from Final Consultation  -->
      <span class="FinalConsToRegret absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicant moved to Regret from FInal Consultation">20</a>
      </span><!-- FinalConsToRegret -->

      <!-- FinalConsPresenceFollowup: Overall applicants moved to Followup for Final Consultation presence -->
      <span class="FinalConsPresenceFollowup absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Final Consultation presence">150</a>
      </span><!-- FinalCons -->

      <!-- FinalConsPresenceFollowupCurrent: Applicants currently in Followup for Final Consultation presence -->
      <span class="FinalConsPresenceFollowupCurrent absolute">
          <a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Final Consultation presence">30</a> &nbsp;<a href="#" class="noFollow tooltips" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">(15)</a>
      </span><!-- FinalConsPresenceFollowupCurrent -->

      <!-- FinalConsFollowupExtension: Overall applicants given extension from Followup for Part B presence -->
      <span class="FinalConsFollowupExtension absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Final Consultation presence">14</a>
      </span><!-- FinalConsFollowupExtension -->

      <!-- FinalConsFollowupNotInterested: Overall applicants moved to Not Interested from Followup for Final Consultation presence -->
      <span class="FinalConsFollowupNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Final Consultation presence">09</a>
      </span><!-- FinalConsFollowupNotInterested -->

      <!-- FinalConsCommunicationNotInterested: Overall applicants moved to Not Interested from Initial Interview Communication -->
      <span class="FinalConsCommunicationNotInterested absolute">
          <a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Final Consultation Communication">09</a>
      </span><!-- FinalConsCommunicationNotInterested -->
  </div><!-- startTillCSL2 -->
  <div class="DDM3TillEnd">

  </div><!-- startTillCSL2 -->
</div><!-- col-md-12 -->
</div><!-- row -->





<style>
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