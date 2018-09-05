
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_style')


<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <a href="index.html">Home</a>
         <i class="fa fa-circle"></i>
      </li>
      <li>
         <span>HR Recruitment Initiation</span>
      </li>
   </ul>
   <!-- page-breadcrumb -->
</div>




<!-- BEGIN USE PROFILE -->
<div class="row marginTop20">
   
  @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_staff_list')


   <div class="col-md-8" id="process_detail" style="display: none;">
      <div class="portlet light bordered fixed-height-NoScroll marginBottom0">
          <div class="portlet-title tabbable-line">
              <div class="caption">
                  <i style="color:#888 !important;" class="icon-user font-dark"></i>
                  <span class="caption-subject font-dark bold uppercase "><span class="applicant_name_write" style="color: #888;">Saleem Ahmed Qureshi</span> - <span class="small">Awaiting to be Followed up</span>
              </div>
              <ul class="nav nav-tabs">
                  <li class="active">
                      <a href="#portlet_tab2_1" data-toggle="tab" aria-expanded="true"> Recruitment Process </a>
                  </li>
                  <li class="">
                      <a href="#portlet_tab2_3" data-toggle="tab" aria-expanded="false"> Logs </a>
                  </li>
                  <li class="">
                      <a href="#portlet_tab2_2" data-toggle="tab" aria-expanded="false"> Applicant Details </a>
                  </li>
                  
              </ul>
          </div>
          <div class="portlet-body">
              <div class="tab-content">
                  <div class="tab-pane active" id="portlet_tab2_1">
                        @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_a_form_screening')

                        @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_b_initial_interview')

                        @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_c_formal_interview')
                        
                        @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_d_observation')

                        @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_e_final_consultation')
                  </div><!-- portlet_tab2_1 -->
                  <div class="tab-pane" id="portlet_tab2_2">
                      
                  </div><!-- portlet_tab2_2 -->
                  <div class="tab-pane" id="portlet_tab2_3">
                      
                  </div><!-- portlet_tab2_3 -->
              </div><!-- tab-content -->
          </div><!-- portlet-body -->
      </div><!-- portlet -->
      <?php /* ?><div class="portlet light bordered fixed-height-NoScroll marginBottom0">
         <div class="portlet-title">
            <h2 class="marginTop10">Saleem Ahmed Qureshi</h2>
         </div><!-- portlet-title -->
         <div class="portlet-body">

            @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_a_form_screening')

            @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_b_initial_interview')

            @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_c_formal_interview')
            
            @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_d_observation')

            @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_e_final_consultation')
            
            
         </div><!-- portlet-body --><?php */ ?>
      </div><!-- portlet -->
   </div><!-- col-md-8 -->
</div><!-- row -->











<script>





$(document).ready(function(){
    $("#show").click(function(){
        $("#IssueApplicationForm").slideToggle( "slow" );
    });
});




$('#staffView_filter_btn .applyFilter').click(function() {
   //Remove mark
   removeMark();
   multiFilter();

   $('.toggler').show();
   $('.toggler-close').hide();
   $('.theme-panel > .theme-options').hide();
   $('#staffView_StaffList_Search').val('');

   $('.toggler2').show();
   $('.toggler2-close').hide();
   $('.theme-panel > .theme-options2').hide();
   $('#staffView_StaffList_Search').val('');

   var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
   $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
});


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





$(document).on('click','#clear_data',function(){
  $('#career_name').val('');
  $('#career_nic').val('');
  $('#career_mobile').val('');
  $('#career_landline').val('');
  $('#career_gender').val('');
  $('#career_tag').val('');
  $('#career_comments').val('');

  $('#career_name').focus();
});




$(document).on('click','.career_gc_id',function(){


  /*
  var name = $('#career_name').val();
  var nic = $('#career_nic').val();
  var mobile = $('#career_mobile').val();
  var landline = $('#career_landline').val();
  var gender = $('#career_gender').val();
  var tag = $('#career_tag').val();
  var comments = $('#career_comments').val();
  var form_id = $('.walkin')
  */
  /***** Calling PDF *****/
  /*
  $.ajax({
      type: "GET",
      url: "http://10.10.10.63/gs/index.php/hcm/career_form_ajax/get_career_form_pdf",
      data: {
          name:name,
          nic:nic,
          mobile_phone:mobile,
          land_line:landline,
          gender:gender,
          tag:tag,
          comments:comments
      },
      success: function(data){
      },
      error: function() {

      }
  });
  */


});

$(document).on('click','#print_submit',function(){
  var name = $('#career_name').val();
  var nic = $('#career_nic').val();
  var mobile = $('#career_mobile').val();
  var landline = $('#career_landline').val();
  var gender = $('#career_gender').val();
  var tag = $('#career_tag').val();
  var comments = $('#career_comments').val();

  var errors = "";

  if(name === ""){ errors += "<strong>Name</strong> is required." }
  if(nic === ""){ if(errors !== "") { errors += "<br>"; } errors += "<strong>NIC</strong> is required." }
  if(mobile === ""){ if(errors !== "") { errors += "<br>"; } errors += "<strong>Mobile Phone</strong> is required." }
  if(gender === ""){ if(errors !== "") { errors += "<br>"; } errors += "<strong>Gender</strong> is required." }
  if(tag === "" || tag === null){ if(errors !== "") { errors += "<br>"; } errors += "<strong>Tag</strong> is required." }

  if(errors === ""){
    $('#error_div').hide();
    $.ajax({
      type:"POST",
      cache:false,
      data:{'_token': '{{ csrf_token() }}',
          name:name,
          nic:nic,
          mobile_phone:mobile,
          land_line:landline,
          gender:gender,
          tag:tag,
          comments:comments
        },
      url:"{{url('/staff_recruitment_initiation_addcareerform')}}",
      success:function(e){
        if(e.substring(0,5) === "error"){
          $('#error_div').show();
          $('#error_div').html(e.substring(5, e.length));          
        }else{
          $('#error_div').hide();
		      $('#career_name').val('');
          $('#career_nic').val('');
          $('#career_mobile').val('');
          $('#career_landline').val('');
          $('#career_gender').val('');
          $('#career_tag').val('');
          $('#career_comments').val('');
			    $('#career_name').focus();


          /***** Calling PDF *****/
          var URL = "http://10.10.10.63/gs/index.php/hcm/career_form_ajax/get_career_form_pdf_gcid?gc_id="+e;
          window.open(URL, '_blank');
          //window.location.href = URL;
          //console.log(URL);



          /***** Refresh Data *****/
		  
		  
			$.ajax({
				type:'POST',
				data:{'_token': '{{ csrf_token() }}'},
				url:"{{url('/addcustomer')}}",
				dataType: "json",
				async: false,
				cache: false,
				success: function(response)
				{
				$('#table_data').html('');
				$('#table_data').html(response.html);
				
				}
			});
			
			
			
			
	
	
		  /**/
		  
		  
        }
      }
    });
	
  }else{
    $('#error_div').show();
    $('#error_div').html(errors);
  }
  
  setInterval( function () {
    //$('#StaffList').dataTable();
    $("#StaffList").dataTable({
      "bLengthChange": false,
      "bInfo" : false,
      "aLengthMenu": [[25, 50, 70, -1], [25, 50, 70, "All"]],
      "iDisplayLength": 500
    });
    
}, 10000 );

});

$(document).on('click','.print_form',function(e){
  var data = $(this).data('walkin');
   var form_id = $(this).data('id');

   if(data == 'Online'){
    var URL = "http://10.10.10.63/gs/index.php/hcm/career_form_ajax/getPDFNow?career_id="+form_id;
    window.open(URL, '_blank');
   }


});
</script>


@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_a_script')
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_b_script')
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_c_script')
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_d_script')
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_e_script')