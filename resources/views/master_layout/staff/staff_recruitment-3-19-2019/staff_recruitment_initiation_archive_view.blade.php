
@include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_style')
<style type="text/css">
li.statement {
    background: #fff8f8;
    border: 1px solid #e0e0e0;
    text-align: center;
    margin-top: 16px;
}
</style>

<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <a href="index.html">Home</a>
         <i class="fa fa-circle"></i>
      </li>
      <li>
         <span>HR Recruitment Archive</span>
      </li>
   </ul>
   <!-- page-breadcrumb -->
</div>

<!-- BEGIN USE PROFILE -->
<div class="row marginTop20">
   
  @include('master_layout/staff/staff_recruitment/staff_recruitment_initiation_staff_list_archive')


     <div class="col-md-8" id="success_msg" style="display: none;"> 
      <div class="portlet light bordered marginBottom0" >
          <div class="portlet-title tabbable-line">
              <div class="caption">
                          <p>Form Realive Successfully </p>
                        </div>
                      </div>
                    </div>
                          </div>

<div class="col-md-8" id="process_detail" style="display: none;">   
		<div class="portlet light bordered fixed-height-NoScroll marginBottom0">
			<div class="portlet-title tabbable-line">
			  <div class="caption">
			      <i style="color:#888 !important;" class="icon-user font-dark"></i>
			      <span class="caption-subject font-dark bold uppercase "><span class="applicant_name_write" style="color: #888;"></span> 
			  </div><!-- caption -->
			  <div class="actions">
			            <div class="portlet-input input-inline">
			                <div class="input-icon right">
			                    <i class="icon-magnifier"></i>
			                    <input type="text" class="form-control input-circle" placeholder="search..."> </div>
			            </div>
			</div>
	        <div class="tab-pane" id=""> 
	            <div class="col-md-12 col-sm-12"> 
	            
	                <div id="Followup_Logs_container"> </div>
	              	<div class="portlet light bordered">
	            		<div class="portlet-body" id="chats">
	                     	<div class="showLogs"></div>
	        				<div class="chat-form">
	            				<div class="row">
	              					<input type="hidden" name="followupStatusID" id="followupStatusID">
	              					<input type="hidden" name="form_id" id="form_id" 
                          value="<?php echo $staffRecruiment[0]['career_id'] ?>">

                          <input type="hidden" name="form_id_hidden" id="form_id_hidden" />

	          					<div class="col-md-4">
	             					<select class="form-control" id="followupType" onchange="this.form.submit()">
			                          <option value="13"> Revive Applicant</option>                        </select>
	              					</div> 
	              				</div> 
		                        <div class="row marginTop20">
		                          <div class="col-md-12">
		                            <textarea id="followupComments" name="followupComments" class="form-control" placeholder="Comments..."></textarea>
		                          </div><!-- -->
		                        </div><!-- col-md-12 -->
		                        <div class="row marginTop20">                  
		                          <div class="col-md-12">

                                  <div id="followupCommentsErrorDiv" style="display: none;">
                                    <p>Fill the comment </p>
                                  </div>

		                            <input onclick="saveComments()" type="button" class="btn btn-group green-jungle" value="Submit">
		                          </div>
		                        </div>
		                    </div>
	    				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
  </div>
 


<script>

  var saveComments = function saveComments(){

    var followupType = $('#followupType').val(); 
    var comments = $('#followupComments').val(); 

    var form_id =  $('#form_id').val();

    var form_id_hidden =  $('#form_id_hidden').val();

    App.startPageLoading();

    if(comments == ""){
$('#followupCommentsErrorDiv').show();
}
else{
  $('#followupCommentsErrorDiv').hide();


    //insert comments
    $.ajax({
        type:'POST',
        data:{
          '_token': '{{ csrf_token() }}',
          'followupType' : followupType,
          'comments' : comments,
          'form_id' : form_id_hidden
        },
        url:"{{url('/update_archieve')}}",
        dataType: "json",
        success: function(response){

          var name = $('.applicant_name_write').text()

        
          $('#followupDate').val('');
          $('#followupTime').val('');
          $('#followupComments').val('');    

        }, 
        complete:function()
        {
          //getLogs(form_id_hidden)

          

           setTimeout(function(){
             ReloadTableDataServerSide2()
             $('#success_msg').hide('slow');
           }, 2000);


          setTimeout(function(){
            App.stopPageLoading();
          }, 3000);

        },
        error : function(err){}
    });




     $('#process_detail').hide();
$('#success_msg').show();
 
  }

  setTimeout(function(){
            App.stopPageLoading();
          }, 1000);
}


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


$('.classSahar').click(function() 
  {
var Form_id = $(this).attr("data-id");


$.ajax({
      type:'POST',
      data:{ '_token': '{{ csrf_token() }}', "Form_id":Form_id },
      url:"{{url('/loadLogs')}}",
      dataType: "json",
      success: function(response)
      {
        $("#Followup_Logs_container").html('');
        $("#Followup_Logs_container").html(response.html);
        alert(1);
      }
    });

    setTimeout(function(){
      App.stopPageLoading();
    }, 1000);

  });

  $('#staffView_filter_btn_Applicant .applyFilter_Applicant').click(function() 
  {
    App.startPageLoading();

   ReloadTableDataServerSide2();

    setTimeout(function()
    {
      $('.toggler').show();
        $('.toggler-close').hide();
        $('.theme-panel > .theme-options').hide();
      App.stopPageLoading(); 
    }, 2000);

});

function ReloadTableDataServerSide2()
  {

    $('#new_table').dataTable().fnDestroy();
    var Source    = $.trim( $("#StaffView_Filter_Profile").val() );
    var CForPartB   = $.trim( $("#StaffView_Filter_Department").val() );
    var Position     = $.trim( $("#StaffView_Filter_Position").val() );
    var Current_Standing = $.trim( $("#StaffView_Filter_AtdStd").val() );
    var Campus = $.trim( $("#StaffView_Filter_Campus").val() );
    var Applied_From_Date = $.trim( $("#from_date").val() );
    var Applied_To_Date   = $.trim( $("#to_date").val() );
    var Modified_From_Date = $.trim( $("#from_date_m").val() );
    var Modified_To_Date = $.trim( $("#to_date_m").val() );
    var keywords = $("input[type=search]").val();


    var dt = $('#new_table').dataTable({
          'processing': true,
          'iDisplayLength': 100,
           'language': { search: "" },
          'serverSide': true,
          'serverMethod': 'post',
          'language': { search: "" },
          'ajax': {
              "url": "{{ url('/modified_form_archive') }}", 
               "dataType": "json",
               "type": "POST",
               "data":{
          '_token': '{{ csrf_token() }}', 
          'Source':Source, 
          'CForPartB':CForPartB,  
          'Position':Position, 
          'Current_Standing':Current_Standing, 
          'Campus':Campus, 
          'From_Date':Applied_From_Date, 
          'To_Date':Applied_To_Date,  
          'from_date_m':Modified_From_Date, 
          'To_Date_m': Modified_To_Date 
          }, 
          },
          'columns': [ 
           { data: 'gc_id' }, { data: 'name' }, { data: 'position_applied' },
           {data:'Action'}, { data: 'mobile_phone' }, { data: 'Landline' }, { data: 'nic' },
           {data: 'Standing'}, { data: 'Apply_Date' }, { data: 'Source' }, { data: 'Comments' }, 
           { data: 'Modified_date' }
           ]
       });


    dt.on( 'draw', function () {

      $('tr td:nth-child(10)').each(function (){
        var Class_name = $(this).text();
        alert(Class_name)
        $(this).parent('tr').addClass( Class_name.toLowerCase() );
      })


      $('.boxidentification').each(function(){
        $(this).tooltip();
      })


      $('tr td:nth-child(1) > a').each(function (){
      var ids = $(this).data('id');
      var ename = $(this).data('name');
      alert(ename)
      //console.log($(this).parent());
      $(this).closest('tr').attr("data-id",ids);
$(this).closest('tr').attr("data-name",ename);

      });


    });


  }
   

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
  /*
  
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
*/

  }else{
    $('#error_div').show();
    $('#error_div').html(errors);
  }
  
});


$(document).on("click", ".classSahar", function(){

var Form_id = ( $(this).attr("data-id"));
var applicant_name = $(this).attr('data-name');
$('.applicant_name_write').text(applicant_name);

App.stopPageLoading();

$('#form_id_hidden').val(Form_id);

getLogs(Form_id)

})


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


var pagefunction = function() {
   Demo.init();
   App.init();

}

function getLogs(Form_id){
    

  //$(".showLogs").html('');
 // $(".logsArea").show();
  
    App.startPageLoading(); 

    $.ajax({
      type:'POST',
      data:{ '_token': '{{ csrf_token() }}', "Form_id":Form_id },
      url:"{{url('/archiveLogs')}}",
      dataType: "json",
      success: function(response)
      {
        $("#process_detail").show();
      $("#Followup_Logs_container").html(response.html);
      //$("#followupForm_id").val(Form_id)
        
      }, 
      complete:function()
      {
        setTimeout(function(){
          App.stopPageLoading();
        }, 2000);
      }
    });

    
    
}

 setTimeout(function(){
     Create_new_table();
    }, 1000);
 

function Create_new_table()
{
   var dt = $('#new_table').DataTable({
      'processing': true,
      'iDisplayLength': 100,
      'serverSide': true,
      'serverMethod': 'post',
      'language': { search: "" },
      'ajax': {
          "url": "{{ url('/allarchive') }}", 
           "dataType": "json",
           "type": "POST",
           "data":{ _token: "{{csrf_token()}}"}
      },
      'columns': [
      
         { data: 'gc_id' },
         { data: 'name' },
          { data: 'position_applied' },
          { data: 'mobile_phone' }, 
          { data: 'Landline' },
          { data: 'nic' },
          { data: 'Standing' },
          { data: 'Apply_Date' },
          { data: 'Source' },
          { data: 'Comments' },
          { data: 'Modified_date' },
          { data: 'Action' },

       ]       
   });

  dt.on( 'draw', function () {

    $('tr td:nth-child(9)').each(function (){
      var Class_name = $(this).text();
      //alert(Class_name);
      $(this).parent('tr').addClass( Class_name.toLowerCase() );
    })


    $('.boxidentification').each(function(){
      $(this).tooltip();
    })


    $('tr td:nth-child(1) > a').each(function (){
    var ids = $(this).data('id');
    var ename = $(this).data('name');
    //console.log($(this).parent());
    $(this).closest('tr').addClass("classSahar");
    $(this).closest('tr').attr("data-id",ids);
      $(this).closest('tr').attr("data-name",ename);
    });


  });
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