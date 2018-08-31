<?php /***** ***** ***** Final Consultation - JS ***** ***** *****/ ?>


<script type="text/javascript">


$('.multiselect').multiselect({ includeSelectAllOption: true }); 

var tableRecords = $('#StaffList').find('.Row');
 $("#staffView_StaffList_Search").keyup(function(){
    var searchText = $("#staffView_StaffList_Search").val();
		var arr = searchText.split(' ');
        var result = "";
        for (var x=0; x<arr.length; x++)
            result+=arr[x].substring(0,1).toUpperCase()+arr[x].substring(1)+' ';
        searchText = result.substring(0, result.length-1);
        console.log(searchText);
        $(tableRecords).each(function(){
            var lineStr = $(this).text();
            console.log(searchText);
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
	

 
	$('#staffView_filter_btn_Applicant .applyFilter_Applicant').click(function() 
	{
		$('#StaffList tr').show();
		var table = $("#StaffList");
		var tr = $('#StaffList > tbody  > tr');
		multiFilter();
		$('#staffView_StaffList_Search').val('');
		var totalRow =  $('#StaffList tr:visible').length - 1;
	});
	
	
$('#staffView_filter_btn_Applicant .clearFilter_Applicant').click(function() 
{
	
	$('#StaffList tr').show();
	var totalRow =  $('#StaffList tr:visible').length - 1;
	
	$('.multiselect').val('');
	//$('.multiselect').multiselect("deselectAll", false).multiselect("refresh");
	//$(".multiselect").multiselect("clearSelection");
	
});



	
	
	

    /*
    * Function Name : multiFilter
    * Description:  Multiple select checkbox filter function used to filter data on table using multiple values from one or more select checkboxes
    */
    var multiFilter = function multiFilter(){

    var ddlFilterTableRow = $('select.ddlFilterTableRow');
   
   
       ddlFilterTableRow.attr('disabled', 'disabled');
   
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
    }
	
	

  
</script>