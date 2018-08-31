
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
	background: #ccc;
    width: 1220px;
    height: 650px;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0.4;
}
.CSL3TillDDM3 {
	background: #888;
    width: 990px;
    height: 650px;
    position: absolute;
    top: 0;
    left:1220px;
    opacity: 0.4;	
}
.DDM3TillEnd {
	background: #666;
    width: 1300px;
    height: 650px;
    position: absolute;
    top: 0;
    left:2210px;
    opacity: 0.4;
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
        	
        </div><!-- startTillCSL2 -->
        <div class="CSL3TillDDM3">
        	
        </div><!-- startTillCSL2 -->
        <div class="DDM3TillEnd">
        	
        </div><!-- startTillCSL2 -->
    </div><!-- col-md-12 -->
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
	
	
setTimeout( function () {


           //$('#StaffList').dataTable();
            $("#StaffList").dataTable({

             "language": {
        "aria": {
            "sortAscending": ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        },
        "emptyTable": "No data available in table",
        "info": "Showing _START_ to _END_ of _TOTAL_ records",
        "infoEmpty": "No records found",
        "infoFiltered": "(filtered1 from _MAX_ total records)",
        "lengthMenu": "Show _MENU_",
        "search": "",
        "searchPlaceholder": "Search records..",
        "zeroRecords": "No matching records found",
        "paginate": {
            "previous":"Prev",
            "next": "Next",
            "last": "Last",
            "first": "First"
        }
    },


        "pagingType": "bootstrap_extended",
        "order": [[ 0, "desc" ]],
        "lengthMenu": [
            [-1, 40, 60, -1],
            [-1, 40, 60, "All"] // change per page values here
        ],

        "columnDefs": [{
            //"searchable": false,
            //"targets": [0]
        }]

            });
			
    
}, 1000 );


  }else{
    $('#error_div').show();
    $('#error_div').html(errors);
  }
  


});

$(document).on('click','.print_form',function(e){
  var data = $(this).data('walkin');
   var form_id = $(this).data('id');


   print_online(data,form_id);

});

var print_online = function(data,form_id){
     if(data == 'Online'){
    var URL = "http://10.10.10.63/gs/index.php/hcm/career_form_ajax/getPDFNow?career_id="+form_id;
    window.open(URL, '_blank');
   }
}






</script>
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_a_script')
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_b_script')
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_c_script')
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_d_script')
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_e_script')

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