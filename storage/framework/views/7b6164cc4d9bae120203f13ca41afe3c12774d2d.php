<div id="content" style="opacity: 1;"><link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #d4d4d4 !important;
}
#sample_1 thead {
    background: #cfdfe0;
}	
#sample_1_filter {
    float: right;
}
</style>
<!-- Weekly Timesheet CSS END  -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Arrears / Adjustments</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->

<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-12 fixed-height" id="profileDetail_Left" style="">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Arrears / Adjustments</span>
                        </div>
                    </div><!-- portlet-title -->
                    <div class="portlet-body padding20">
                        <div class="form-body">
	                        <table class="table table-bordered" id="sample_1">
	                                    	<thead>
	                                    		<tr>
	                                    			<th class="text-center">GS-ID</th>
	                                    			<th class="text-center">GF-ID</th>
	                                    			<th class="text-center">PET Type</th>
	                                    			<th class="text-center">PET Code</th>
	                                    			<th class="text-center">Abridged<br />Name</th>
	                                    			<th class="text-center">Grade<br />Section</th>
	                                    			<th class="text-center">Status</th>
	                                    			<th class="text-center">Last Generated<br />Bill</th>
	                                    			<th class="text-center">Arrears/Advance</th>
	                                    			<th class="text-center">Grade ID</th>
	                                    			<th class="text-center">Section ID</th>
	                                    		</tr>
	                                    	</thead>
	                                    	<tbody>
	                                    	<?php if( !empty($concession_info)) : ?>
	                                    	<?php foreach($concession_info as $cf ): ?>
	                                    		<tr>
	                                    			<td class="text-center">
	                                    			<?=$cf->gs_id;?>
	                                    			</td>
	                                    			<td class="text-center"><?=$cf->gf_id;?></td>
	                                    			<td class="text-center"><?=$cf->petitioner_type;?></td>
	                                    			<td class="text-center"><?=$cf->petitioner_code;?></td>
	                                    			<td class="text-center">
	                                    				<?=$cf->abridged_name;?></td>
	                                    			<td class="text-center">
	                                    				<?=$cf->grade_name;?>-<?=$cf->section_name;?></td>
	                                    			<td class="text-center"><?=$cf->student_status_name;?></td>
	                                    			<td class="text-center"><?=$cf->last_bill_title;?></td>
	                                    			
	                                    				

	                                    				 <?php if(intval($cf->balance)>0) { ?>                
                <td class="text-center"><font color="red"><?php echo number_format($cf->balance); ?></font></td>                
              <?php } else { ?>
                <td class="text-center"><?php echo number_format($cf->balance); ?></td>
              <?php } ?>

	                                    					
	                                    				
	                                    			<td class="text-center"><?=$cf->grade_id;?></td>
	                                    			<td class="text-center"><?=$cf->section_id;?></td>
	                                    		</tr>
	                                    	<?php endforeach;?>
	                                    	<?php endif; ?> 
	                                    		
	                                    	<!-- 	<tr>
	                                    			<td class="text-center">12-401</td>
	                                    			<td class="text-center">12-228</td>
	                                    			<td class="text-center">P4</td>
	                                    			<td class="text-center">P4-091-M</td>
	                                    			<td class="text-center">Meeta Kumari</td>
	                                    			<td class="text-center">V-S</td>
	                                    			<td class="text-center">active</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">0</td>
	                                    			<td class="text-center">8</td>
	                                    			<td class="text-center">2</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td class="text-center">12-403</td>
	                                    			<td class="text-center">98-013</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">M Aayan Anis</td>
	                                    			<td class="text-center">V-L</td>
	                                    			<td class="text-center">active</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">0</td>
	                                    			<td class="text-center">8</td>
	                                    			<td class="text-center">8</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td class="text-center">12-293</td>
	                                    			<td class="text-center">11-229</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">Eshal Inam</td>
	                                    			<td class="text-center">IV-R</td>
	                                    			<td class="text-center">active</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">0</td>
	                                    			<td class="text-center">7</td>
	                                    			<td class="text-center">5</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td class="text-center">12-293</td>
	                                    			<td class="text-center">11-229</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">Eshal Inam</td>
	                                    			<td class="text-center">IV-R</td>
	                                    			<td class="text-center">active</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">0</td>
	                                    			<td class="text-center">7</td>
	                                    			<td class="text-center">5</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td class="text-center">12-293</td>
	                                    			<td class="text-center">11-229</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">Eshal Inam</td>
	                                    			<td class="text-center">IV-R</td>
	                                    			<td class="text-center">active</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">0</td>
	                                    			<td class="text-center">7</td>
	                                    			<td class="text-center">5</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td class="text-center">12-293</td>
	                                    			<td class="text-center">11-229</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">Eshal Inam</td>
	                                    			<td class="text-center">IV-R</td>
	                                    			<td class="text-center">active</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">0</td>
	                                    			<td class="text-center">7</td>
	                                    			<td class="text-center">5</td>
	                                    		</tr>
	                                    		<tr>
	                                    			<td class="text-center">12-293</td>
	                                    			<td class="text-center">11-229</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">Eshal Inam</td>
	                                    			<td class="text-center">IV-R</td>
	                                    			<td class="text-center">active</td>
	                                    			<td class="text-center"></td>
	                                    			<td class="text-center">0</td>
	                                    			<td class="text-center">7</td>
	                                    			<td class="text-center">5</td>
	                                    		</tr> -->
	                                    	</tbody>
	                                    </table><!-- FeeStructure -->
	                        
                        </div><!-- form-body -->
                        
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->








<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">


	var pagefunction = function(){

		   Demo.init();
    App.init();



   
}

loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/datatable.js", function(){
    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/datatables.min.js", function(){
        loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/profile.js", function(){
                loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-managed.js", function(){
                    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("http://10.10.10.50/gsims/public/metronic/layouts/layout/scripts/demo.min.js", function(){
                                loadScript("http://10.10.10.50/gsims/public/js/jquery.filtertable.min.js", function(){
                                    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js",function(){
                                         loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/app.min.js", pagefunction)
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
<!-- END PAGE LEVEL PLUGINS -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS --></div>