
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



<style>
.startTillCSL3 {
    width: 1220px;
    height: 650px;
    position: absolute;
    top: 0;
    left: 0;
}
.startTillCSL3 a,
.CSL3TillDDM3 a,
.DDM3TillEnd a {
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
</style>
<!-- BEGIN USE PROFILE -->


<div class="row marginTop20">
	<div class="col-md-12 marginTop20">
    	Filter Area
    </div><!-- col-md-12 -->
	<div class="col-md-12" style="overflow-y: hidden;position:relative;">
    	<img src="img/RecruitmentProcessflow.jpg" width="3500" />
        <div class="startTillCSL3">
        	<!-- OnlineFormSubmissions: This section indicated the number of candidates submitted the Online form  -->
        	<span class="OnlineFormSubmissions absolute">
        		<a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Applicants applied Online">120</a>
        	</span><!-- fillPartA -->

        	<!-- fillPartA: This section indicated the number of candidates submitted the Online form and are waiting for Part A Screening  -->
        	<span class="fillPartA absolute">
        		<a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants applied Online and completed Part A - Awaiting for Part A screening">20</a>
        	</span><!-- fillPartA -->

        	<!-- partAScreeningToRegret: Overall applicant moved to Regret from Part A screening of Online forms -->
        	<span class="partAScreeningToRegret absolute">
        		<a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Regret from Part A screening">20</a>
        	</span><!-- partAScreeningToRegret -->

        	<!-- partAScreeningToPartBAllocation: Applicants who were called for Part B and communication to the applicant is still pending  -->
        	<span class="partAScreeningToPartBAllocation absolute">
        		<a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants triggered for Part B - Awaiting to be communicated">20</a>
        	</span><!-- partAScreeningToPartBAllocation -->

        	<!-- partAScreeningToPartBCommunicatedOverall: Overall applicants communicated for Part B -->
        	<span class="partAScreeningToPartBCommunicatedOverall absolute">
        		<a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants communicated for Part B ">30</a>
        	</span><!-- partAScreeningToPartBCommunicatedOverall -->

        	<!-- partAScreeningToPartBPresence: Applicants awaited for Part B presence -->
        	<span class="partAScreeningToPartBPresence absolute">
        		<a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants awating for Part B presence - Communicated for Part B ">50</a>
        	</span><!-- partAScreeningToPartBPresence -->

        	<!-- partAScreeningToPartBFollowupOverall: Overall applicants moved to Followup for Part B presence -->
        	<span class="partAScreeningToPartBFollowupOverall absolute">
        		<a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Followup for Part B presence">50</a>
        	</span><!-- partAScreeningToPartBFollowupOverall -->

        	<!-- partAScreeningToPartBFollowup: Applicants currently in Followup for Part B presence -->
        	<span class="partAScreeningToPartBFollowup absolute">
        		<a href="#" class="tooltips" data-container="body" data-placement="top" data-original-title="Applicants currently in Followup for Part B presence">20</a> &nbsp;<a href="#" class="noFollow tooltips" data-container="body" data-placement="top" data-original-title="7 Days passed no action taken">(10)</a>
        	</span><!-- partAScreeningToPartBFollowup -->

        	<!-- partAScreeningToPartBFollowupExtension: Overall applicants given extension from Followup for Part B presence -->
        	<span class="partAScreeningToPartBFollowupExtension absolute">
        		<a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants given extension from Followup for Part B presence">10</a>
        	</span><!-- partAScreeningToPartBFollowupExtension -->

        	<!-- partAScreeningToPartBFollowupNotInterested: Overall applicants moved to Not Interested from Followup for Part B presence -->
        	<span class="partAScreeningToPartBFollowupNotInterested absolute">
        		<a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants moved to Not Interested from Followup for Part B presence">10</a>
        	</span><!-- partAScreeningToPartBFollowupNotInterested -->

        	<!-- partAScreeningToPartBPresent: Overall applicants marked Present for Part B -->
        	<span class="partAScreeningToPartBPresent absolute">
        		<a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Part B">50</a>
        	</span><!-- partAScreeningToPartBPresent -->

        	<!-- partAScreeningToPartBPresent: Overall applicants marked Present for Part B -->
        	<span class="partAScreeningToPartBPresent absolute">
        		<a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Overall applicants marked Present for Part B">50</a>
        	</span><!-- partAScreeningToPartBPresent -->

        	<!------------------------------------------ Walkin ---------------------------------->
        	<!-- walkinFormSubmissions: Walkin applicants  -->
        	<span class="walkinFormSubmissions absolute">
        		<a href="#" class="tooltips gray" data-container="body" data-placement="top" data-original-title="Walkin applications">150</a>
        	</span><!-- partAScreeningToPartBPresent -->
        	
        </div><!-- startTillCSL2 -->
        <div class="CSL3TillDDM3">
        	
        </div><!-- startTillCSL2 -->
        <div class="DDM3TillEnd">
        	
        </div><!-- startTillCSL2 -->
    </div><!-- col-md-12 -->
</div><!-- row -->
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