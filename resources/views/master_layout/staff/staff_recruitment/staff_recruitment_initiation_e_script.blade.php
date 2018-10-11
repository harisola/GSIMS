<?php /***** ***** ***** Final Consultation - JS ***** ***** *****/ ?>
<script type="text/javascript">
$('.multiselect').multiselect({ includeSelectAllOption: true }); 
var tableRecords = $('#StaffList').find('.Row');
//Multi Filter prototype
String.prototype.replaceAll = function(search, replacement) {
   var target = this;
   return target.replace(new RegExp(search, 'g'), replacement);
};
var removeMark = function removeMark() {
   var b = document.getElementsByTagName('mark');
   while(b.length) {
	   var parent = b[ 0 ].parentNode;
	   while( b[ 0 ].firstChild ) {
		   parent.insertBefore(  b[ 0 ].firstChild, b[ 0 ] );
	   }
		parent.removeChild( b[ 0 ] );
   }
}
   
	

 $("#staffView_StaffList_Search").keyup(function(){
	//tablesolangi.destroy();
	 
    var searchText = $("#staffView_StaffList_Search").val();
		var arr = searchText.split(' ');
        var result = "";
        for (var x=0; x<arr.length; x++)
            result+=arr[x].substring(0,1).toUpperCase()+arr[x].substring(1)+' ';
			searchText = result.substring(0, result.length-1);
       
        $(tableRecords).each(function(){
            var lineStr = $(this).text();
			
          
            if( lineStr.indexOf(searchText) === -1 ){
                $(this).hide();
            }
			else 
			{
				$(this).show();
			}
        });
        var totalRow =  $('#StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 
		

	

    });
	

 	$("#StaffView_Filter_Profile").change(function() {
		

		if( $(this).val()=='Walkin' )	{
        $("#StaffView_Filter_Department").multiselect("disable");
		} else {
        $("#StaffView_Filter_Department").multiselect("enable");
        }

	});

	 
	$("#StaffView_Filter_Department").change(function() {
		$("#StaffView_Filter_AtdStd").val('');

		if( $(this).val() )	{
        $("#StaffView_Filter_AtdStd").multiselect("disable");
		} else {
        $("#StaffView_Filter_AtdStd").multiselect("enable");
        }

	});
	 
	$('#staffView_filter_btn_Applicant .applyFilter_Applicant').click(function() 
	{
		App.startPageLoading();
		$('#empTable').dataTable().fnDestroy();
		var Source 		= $.trim( $("#StaffView_Filter_Profile").val() );
		var CForPartB 	= $.trim( $("#StaffView_Filter_Department").val() );
		var Position 		 = $.trim( $("#StaffView_Filter_Position").val() );
		var Current_Standing = $.trim( $("#StaffView_Filter_AtdStd").val() );
		var Campus = $.trim( $("#StaffView_Filter_Campus").val() );
		var Applied_From_Date = $.trim( $("#from_date").val() );
		var Applied_To_Date   = $.trim( $("#to_date").val() );
		var Modified_From_Date = $.trim( $("#from_date_m").val() );
		var Modified_To_Date = $.trim( $("#to_date_m").val() );
		var keywords = $("input[type=search]").val();
		var dt = $('#empTable').dataTable({
		      'processing': true,
		      'iDisplayLength': 100,
		      'serverSide': true,
		      'serverMethod': 'post',
		      'language': { search: "" },
		      'ajax': {
		          "url": "{{ url('/modified_form_list') }}", 
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
	      $(this).parent('tr').addClass( Class_name.toLowerCase() );
	    })


	    $('.boxidentification').each(function(){
	      $(this).tooltip();
	    })


	    $('tr td:nth-child(1) > a').each(function (){
	    var ids = $(this).data('id');
	    //console.log($(this).parent());
	    $(this).closest('tr').attr("data-id",ids);
	    });


	  });

		//if( keywords != ''){ dt.search(keywords).draw();   }
 		setTimeout(function()
 		{
			$('.toggler').show();
	   		$('.toggler-close').hide();
	   		$('.theme-panel > .theme-options').hide();
			App.stopPageLoading(); 
		}, 2000);



		/*App.startPageLoading();

		if ($.trim($("#from_date_m").val()).length == 0)
		{
			var after_modified_date = $('#after_modified_date').val();
			if( after_modified_date == 1 )
			{

			$("#StaffList").DataTable().destroy();
			setTimeout(function(){ 
			App.startPageLoading();
			var pathname = $(location).attr('href');  // index.php
			$.ajax({
				type:'POST',
				data:{'_token': '{{ csrf_token() }}', 'pathname':pathname },
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
				
				
		
				
				
			}, 1000);
			
			}
			
	setTimeout(function(){
			App.startPageLoading();
			$('#StaffList tr').show();
			var table = $("#StaffList");
			var tr = $('#StaffList > tbody  > tr');
			multiFilter();
			$('#staffView_StaffList_Search').val('');
			App.stopPageLoading();
		}, 2000);
		
		setTimeout(function(){
			App.startPageLoading();
			var from_date = ( $("#from_date").val() );	
			var to_date = ( $("#to_date").val() );	
			var testing = 0;
			var CFPartB = ( $("#StaffView_Filter_Department").val() );	
			App.startPageLoading();
			if( (from_date != '') && (to_date=='') )
			{
				$(tableRecords).each(function(){
					var lineStr = $(this).attr("data-from_date");	
					if( lineStr >= from_date )
					{ 
						$(this).show(); 
					} else { 
						$(this).hide(); 
					} 
					
				});
				testing = 1;
			}
			else if( (from_date != '') && (to_date !='') ) {
				$(tableRecords).each(function(){
					var lineStr = $(this).attr("data-from_date");
					var secondDate = $(this).attr("data-to_date");
					if( lineStr >= from_date && secondDate <= to_date ){ 
						$(this).show(); 
					} else { 
						$(this).hide(); 
					} 
					
				});
				
				testing = 1;
			}else{ 
				testing = 0;
			}
			
			if( testing == 1 ){
				var totalRow =  $('#StaffList tr:visible').length - 1;
				$('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 	
			}

				
			 $('#after_modified_date').val(0);	
			App.stopPageLoading();
		}, 3000); 


		
		// end if modified date is null
		
		}else
		{
		
			// Else modified date is not null
			

	  
	   
		   
	
	App.startPageLoading();
	$("#StaffList").DataTable().destroy();
	var Source = $.trim( $("#StaffView_Filter_Profile").val() );
	var CForPartB = $.trim( $("#StaffView_Filter_Department").val() );
	var Position = $.trim( $("#StaffView_Filter_Position").val() );
	var Current_Standing = $.trim( $("#StaffView_Filter_AtdStd").val() );
	var Campus = $.trim( $("#StaffView_Filter_Campus").val() );
	var From_Date = $.trim( $("#from_date_m").val() );
	var To_Date = $.trim( $("#to_date_m").val() );
	  


$.ajax({
	type:'POST',
	data:{'_token': '{{ csrf_token() }}' , 'Source':Source, 'CForPartB':CForPartB,  'Position':Position, 'Current_Standing':Current_Standing, 'Campus':Campus, 'From_Date':From_Date, 'To_Date':To_Date,} ,
	url:"{{url('/modified_form_list')}}",
	dataType: "json",
	async: false,
	cache: false,
	success: function(response)
	{
		$('#table_data').html('');
		$('#table_data').html(response.html);
		
		$('#after_modified_date').val(1);
	}
});
				
				
	setTimeout(function(){
		
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
	}],
				  
				});
				
				
			
			
			
			
			var totalRow =  $('#StaffList tr').length - 1;
			$('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 	
			App.stopPageLoading();
		}, 2000);
		
				
						
			
		
		}*/

});

function ReloadTableData()
{
	
	$("#StaffList").DataTable().destroy();
			var pathname = $(location).attr('href');  // index.php
			// Reload After Move To Archive
			setTimeout(function(){ 
			
				$.ajax({
					type:'POST',
					data:{'_token': '{{ csrf_token() }}', 'pathname':pathname },
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
	}],
				  
				});
				
				
			}, 1000);
			
			
			
		
	
		setTimeout(function(){
			var table = $("#StaffList");
			var tr = $('#StaffList > tbody  > tr');
			//multiFilter();
			$('#staffView_StaffList_Search').val('');
			var totalRow =  $('#StaffList tr:visible').length - 1;
			//$('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 
			$('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 
	
			App.stopPageLoading();
		}, 2000);
		
		
}
	

var Create_Server_Table = function()
{


	$('.toggler').show();
   $('.toggler-close').hide();
   $('.theme-panel > .theme-options').hide();


	$('.multiselect').val('');
	$('#StaffView_Filter_Profile').multiselect("deselectAll", false).multiselect("refresh");
	$('#StaffView_Filter_Department').multiselect("deselectAll", false).multiselect("refresh");
	$('#StaffView_Filter_Position').multiselect("deselectAll", false).multiselect("refresh");
	$('#StaffView_Filter_AtdStd').multiselect("deselectAll", false).multiselect("refresh");
    $('#StaffView_Filter_Campus').multiselect("deselectAll", false).multiselect("refresh");
   
   
   $('#StaffView_Filter_Profile').val('');
   $('#StaffView_Filter_Department').val('');
   $('#StaffView_Filter_Campus').val('');
   $('#StaffView_Filter_Position').val('');
   
   $('#StaffView_Filter_AtdStd').val('');
   $('#staffView_StaffList_Search').val('');
   $('#after_modified_date').val(0);
   
   $('input[type=date]').each( function resetDate(){
	  this.value = this.defaultValue;
	} );




    var dt = $('#empTable').DataTable({
      'processing': true,
      'iDisplayLength': 100,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          "url": "{{ url('/allposts') }}", 
           "dataType": "json",
           "type": "POST",
           "data":{ _token: "{{csrf_token()}}"}
      },
      'columns': [
       

         { data: 'gc_id' },
         { data: 'name' },
         { data: 'position_applied' },
         {data:'Action'},
         { data: 'mobile_phone' },
         { data: 'Landline' },
         { data: 'nic' },
         {data: 'Standing'},
         { data: 'Apply_Date' },
         { data: 'Source' },
         { data: 'Comments' },
         { data: 'Modified_date' }

        ]
   });


  dt.on( 'draw', function () {

    $('tr td:nth-child(10)').each(function (){
      var Class_name = $(this).text();
      $(this).parent('tr').addClass( Class_name.toLowerCase() );
    })


    $('.boxidentification').each(function(){
      $(this).tooltip();
    })


    $('tr td:nth-child(1) > a').each(function (){
    var ids = $(this).data('id');
    //console.log($(this).parent());
    $(this).closest('tr').attr("data-id",ids);
    });


  });



}
	
$('#staffView_filter_btn_Applicant .clearFilter_Applicant').click(function() 
{
	
App.startPageLoading();

$("#empTable").DataTable().destroy();

setTimeout(function(){ 
Create_Server_Table();
App.stopPageLoading();
}, 1000);
	
	/*setTimeout(function(){ 
	
	
	$('#StaffList tr').show();
	
	
	$('.multiselect').val('');
	$('#StaffView_Filter_Profile').multiselect("deselectAll", false).multiselect("refresh");
	$('#StaffView_Filter_Department').multiselect("deselectAll", false).multiselect("refresh");
	$('#StaffView_Filter_Position').multiselect("deselectAll", false).multiselect("refresh");
	$('#StaffView_Filter_AtdStd').multiselect("deselectAll", false).multiselect("refresh");
    $('#StaffView_Filter_Campus').multiselect("deselectAll", false).multiselect("refresh");
   
   
   $('#StaffView_Filter_Profile').val('');
   $('#StaffView_Filter_Department').val('');
   $('#StaffView_Filter_Campus').val('');
   $('#StaffView_Filter_Position').val('');
   
   $('#StaffView_Filter_AtdStd').val('');
   $('#staffView_StaffList_Search').val('');
   $('#after_modified_date').val(0);
   
   $('input[type=date]').each( function resetDate(){
	  this.value = this.defaultValue;
	} );



	





		
		



}, 1000);






		$("#StaffList").DataTable().destroy();
			var pathname = $(location).attr('href');  // index.php
			// Reload After Move To Archive
			setTimeout(function(){ 
			
				$.ajax({
					type:'POST',
					data:{'_token': '{{ csrf_token() }}', 'pathname':pathname },
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
	}],
				  
				});
				
				
			}, 1000);
			
			
			
		
	
		setTimeout(function(){
			var table = $("#StaffList");
			var tr = $('#StaffList > tbody  > tr');
			//multiFilter();
			$('#staffView_StaffList_Search').val('');
			var totalRow =  $('#StaffList tr:visible').length - 1;
			//$('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 
			$('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 
	
			App.stopPageLoading();
		}, 2000);
		
		

*/
});



	
	
	

    /*
    * Function Name : multiFilter
    * Description:  Multiple select checkbox filter function used to filter data on table using multiple values from one or more select checkboxes
    */
    var multiFilter = function multiFilter(){

    var ddlFilterTableRow = $('select.ddlFilterTableRow');
   
   
    ddlFilterTableRow.attr('disabled', 'disabled');
	
	$("#StaffList").DataTable().destroy();
	
	var records = $('#StaffList').find('.Row');
	records.hide();
   
       var critriaAttributes = [];
       ddlFilterTableRow.each(function() {
           var $this = $(this),
               $selectedLength = $this.find(':selected').length,
               $critriaAttribute = '';
   
           if ($selectedLength > 0 && $this.val() != '0') {
               if ($selectedLength == 1) {
                   $critriaAttribute += '[data-' + $this.data('attribute') + '*="' + $this.val() + '"]';
               } else {
                   var $startDataAttribute = '[data-' + $this.data('attribute') + '*="',
                       $endDataAttribute = '"]',
                       $selectedValues = $this.val().toString();
					   

   
                   $critriaAttribute += $startDataAttribute + $selectedValues.replaceAll(',', ($endDataAttribute + ',' + $startDataAttribute)) + $endDataAttribute;
				 
               }
               critriaAttributes.push($critriaAttribute);
           }
       });
                   
   
       var $showRecords = records;
       if (critriaAttributes.length > 0) {
           $.each(critriaAttributes, function(i, filterValue) {
               $showRecords = $showRecords.filter(filterValue);
           });
       }
   
       tableRecords = $showRecords.show();
   
    ddlFilterTableRow.removeAttr('disabled');
	
	   
	$("#StaffList").dataTable({
      
	  
	  	"language": {
		"aria": {
			"sortAscending": ": activate to sort column ascending",
			"sortDescending": ": activate to sort column descending"
		},
		"emptyTable": "No data available in table",
		//"info": "Showing _START_ to _END_ of _TOTAL_ records",
		//"infoEmpty": "No records found",
		//"infoFiltered": "(filtered1 from _MAX_ total records)",
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
	}],
	
	
    });
	
	
	var totalRow =  $('#StaffList tr:visible').length - 1;
    $('#staffView_StaffList_Total').text('Applicants - ' + totalRow); 
	
    }
	
	//$(".Move_To_Archive").click( function(){
	$(document).on('click', '.Move_To_Archive', function(){
		
			

			
			$('.ms-choice').find('span').html('');
			$(".ms input[type=checkbox]").each(function(){                
			   $(this).attr("checked", false);
			   $(this).prop("checked", false);   
			   $("#career_tag_move_to_archive2").val('');
			});
   
   
			$("#Modal_Form_id").val(0);
			$("#Modal_Stage_id").val(0);
			
			var form_id = $(this).data("form");
			var stage_id = $(this).data("stage");
			var name_title = $(this).data("nametitle");
			
			
			$("#Modal_Form_id").val(form_id);
			$("#Modal_Stage_id").val(stage_id);
			
			$("#mname_title").text(name_title);


		$('#MoveTA').modal({ show: 'show',  backdrop: 'static' }); 


			
			
		}
	);
	
	$("#btn_MoveToArch").click(
		function()
		{
			var form_id = $("#Modal_Form_id").val();
			var stage_id = $("#Modal_Stage_id").val();
			var taging = $("#career_tag_move_to_archive2").val();

			var status_id = $("#career_tag_move_to_archive1").val();
			
			
			
			App.startPageLoading();
		
			
			
			
			if( parseInt( form_id ) > 0 )
			{
				$.ajax({
					type:'POST',
					data:{
						'_token': '{{ csrf_token() }}', "form_id":form_id, "status_id":status_id,"stage_id":stage_id
						

						},
					url:"{{url('/call_for_part_b_presence')}}",
					dataType: "json",
					success: function(response)
					{
						
					}
				});
				
				
				$.ajax({
					type:'POST',
					data:{ '_token': '{{ csrf_token() }}', "form_id":form_id, "status_id":status_id,"stage_id":stage_id,"taging":taging },
					url:"{{url('/addFormDataMoveToArchive')}}",
					dataType: "json",
					success: function(response)
					{
						
					}
				});
				
				
			}
			
			$('#MoveTA').modal('hide');
			
			$("#empTable").DataTable().destroy();
			var pathname = $(location).attr('href');  // index.php



			// Reload After Move To Archive
			setTimeout(function(){ 
			


			Create_Server_Table();
			App.stopPageLoading();


				/*$.ajax({
					type:'POST',
					data:{'_token': '{{ csrf_token() }}', 'pathname':pathname },
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
	}],
				  
				});
				
				
			}, 1000);
			
			
			
		
	
			setTimeout(function(){
				var table = $("#StaffList");
				var tr = $('#StaffList > tbody  > tr');
				multiFilter();
				$('#staffView_StaffList_Search').val('');
				var totalRow =  $('#StaffList tr:visible').length - 1;
				App.stopPageLoading();*/
			}, 2000); 


			
			
			
		}
	);
	

  
 
$("#portlet_tab2_21").click(function(){
	var Form_id = $("#Applicant_id").val();
	
	
	$("#portlet_tab2_2").html('');
	
	
	

		App.startPageLoading();	


		$.ajax({
			type:'POST',
			data:{ '_token': '{{ csrf_token() }}', "Form_id":Form_id },
			url:"{{url('/loadLogs')}}",
			dataType: "json",
			success: function(response)
			{
				$("#portlet_tab2_2").html(response.html);
			}
		});




		setTimeout(function(){
			App.stopPageLoading();
		}, 5000);	
		
});






$('#hr_download_online_forms').click(function(){
	var unattended = $("#hr_unattended").is(':checked') ? 1 : 0;
	var archieve = $("#hr_archieve").is(':checked') ? 1 : 0;$
	var call_for_b = $("#hr_call_for_b").is(':checked') ? 1 : 0;
	var date_from = $("#hr_date_from").val();
	var date_to = $("#hr_date_to").val();

	var param = "unattended=" + unattended + "&archieve=" + archieve + "&callb=" + call_for_b;
	param += "&date_from=" + date_from + "&date_to=" + date_to;

	var win = window.open('http://10.10.10.50/services/generate_career_pdf?' + param, '_blank');
	if (win) {
	    //Browser has allowed it to be opened
	    win.focus();
	} else {
	    //Browser has blocked it
	    alert('Please allow popups for this website');
	}
});
  

   
   
</script>