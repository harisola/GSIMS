<style type="text/css">
.table-scrollable, .table-scrollable.table-scrollable-borderless, .table-scrollable>.table-bordered {
  float: left;
} 
 div#empTable_length {
    display: none !important;
}
#empTable_wrapper .row div {
  width: 100% !important;
}
#empTable_wrapper .row div.col-md-7 {
  text-align: center !important;
  margin-top: 10px !important;
}
#empTable_filter label {
  width: 100% !important;
}
#empTable_filter label input[type="search"] {
    width: 100% !important;
    padding: 15px !important;
}
#empTable_processing {
  display: none !important;
}
.theme-panel>.toggler {
    right: -33px !important;
}
.theme-panel>.toggler-close {
    right: -33px !important;
}
.theme-panel>.theme-options {
    right: -33px !important;
}
</style>

  <div class="col-md-4 borderRightDashed">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet light bordered fixed-height-NoScroll marginBottom0">

        <!-- Table -->
        




         <div class="portlet-title padding0">
            <div class="caption caption-md">
               <h3 id="staffView_StaffList_Total" class="marginTop0 marginBottom0 padding0">All Applicant</h3>
            </div>
            <div class="actions">
                <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                        <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Issue Applicant Form" id="show">Issue Application</button>
                        <a href="#DownloadOnlineForm" data-toggle="modal" class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Download Online forms" id="#">Download Forms</a>
                </div>
            </div><!-- actions -->
         </div>

         <!-- portlet-title -->
         <div class="portlet-body">
            <div id="IssueApplicationForm">

               <h4 class="text-center marginTop0" style="color: #888;">Applicant Form</h4>
               <div class="row">
                  <div class="col-md-6">
                     <input type="text" id="career_name" placeholder="Name" class="form-control form-control-solid">
                  </div>
                  <div class="col-md-6">
                     <input type="text" id="career_nic" placeholder="CNIC" class="form-control form-control-solid" >
                  </div>
               </div><!-- row -->
               <div class="row marginTop10">
                  <div class="col-md-6">
                     <input type="text" id="career_mobile" placeholder="0399-9999999" class="form-control form-control-solid">
                  </div>
                  <div class="col-md-6">
                     <input type="text" id="career_landline" placeholder="021-99999999" class="form-control form-control-solid">
                  </div>
               </div><!-- row -->
               <div class="row marginTop10">
                  <div class="col-md-6">
                     <select id="career_gender" class="form-control">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                     </select>
                  </div>
                  <div class="col-md-6">
				  
                    <select multiple="multiple" class="PositionTag multiselect" id="career_tag">
					           <option value="Management">Management</option>
                     <option value="Admin">Admin</option>
                     <option value="Teaching">Teaching</option>
                     <option value="Technical">Technical</option>
					<?php /* ?>
          <?php  if( !empty( $get_getTags ) ) : ?>
						<?php foreach($get_getTags as $Tg ): ?>
							<option value="<?php echo $Tg->name;?>"><?php echo $Tg->name;?></option>
						<?php endforeach; ?>
					<?php endif;?>
                        
          <?php */ ?>
                    </select>

                     <!-- <select id="career_tag" class="form-control">
                        <option value="Tag A">tag A</option>
                        <option value="Tag B">tag B</option>
                     </select> -->
                  </div>
               </div><!-- row -->
               <div class="row marginTop10">
                  <div class="col-md-12">
                     <textarea id="career_comments" class="form-control" placeholder="Comments"></textarea>
                  </div>
               </div><!-- row -->
               <hr />
               <div class="row">
                <div id="error_div" class="alert alert-danger" style="float: left;width: 95%;margin: 0 2% 20px; display: none;">
                  <strong>Error!</strong> The daily cronjob has failed. 
                </div>
               </div>
               <div class="row">
                  <div class="col-md-6 text-right" style="padding-right: 5px;">
                     <input type="button" id="clear_data" class="btn btn-group" value="Clear">
                  </div>
                  <div class="col-md-6" style="padding-left: 5px;">
                     <input type="button" id="print_submit" class="btn btn-group green" value="Print & Submit">
                  </div>
               </div>
            </div><!-- #IssueApplicationForm -->
            <div class="inputs">
               <?php /* <div class="portlet-input">
                  
                  <div class="input-icon right">
                     <i class="icon-magnifier"></i>
                     <input id="staffView_StaffList_Search" type="text" class="form-control form-control-solid" placeholder="Search..."> 
                  </div>
               
               
               </div>*/ ?>
               <div class="theme-panel hidden-xs hidden-sm"  style="right:33px;margin-top: 0px !important;">
                  <div class="toggler"> </div>
                  <div class="toggler-close"> </div>
                  <div class="theme-options">
                     <div class="theme-option">
                        <span> Source </span> 
						<input type="hidden" value="0" id="after_modified_date" />
                        <select data-attribute="source" multiple="multiple" id="StaffView_Filter_Profile" class="ddlFilterTableRow page-header-option form-control input-sm multiselect">
						  <option>Online</option>
                          <option>Walkin</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span>Part B</span> 
                        <select data-attribute="partB" multiple="multiple" id="StaffView_Filter_Department" class="ddlFilterTableRow page-header-option form-control input-sm multiselect">
                          <option value="CallForPartB">Call for Part B</option>
                          <option value="CommunicatedForPartB">Communicated for Part B</option>
						  <option value="CompletedPartB">Part-B completed</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span> Position </span>
                        <select data-attribute="position" multiple="multiple" id="StaffView_Filter_Position" class="ddlFilterTableRow layout-option form-control input-sm multiselect">
                          <option>Technical</option>
						   <option>Admin</option>
                          <option>Management</option>
                          <option>Teaching</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span> Current Standing </span>
                        <select data-attribute="standing" multiple="multiple" id="StaffView_Filter_AtdStd" class="ddlFilterTableRow layout-option form-control input-sm multiselect">
                          <!--option>Part B <span class="boxidentification ">&nbsp;</span></option -->
                          <option>Form Screening</option>
                          <option>Initial Interview</option>
                          <option>Formal Interview</option>
                          <option>Observation</option>
                          <option>Final Consultation</option>
						              <option>Archive</option>
						  
                        </select>
                     </div>
                     <div class="theme-option">
                        <span> Campus </span>
                        <select  data-attribute="campus" multiple="multiple" id="StaffView_Filter_Campus" class="ddlFilterTableRow page-header-option form-control input-sm multiselect">
                           <option value="South">South</option>
                           <option value="North">North</option>
                        </select>
                     </div>
					 
                     <div class="theme-option">
                        <div class="input-group date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                            <input type="date" class="form-control" name="from" id="from_date" data-attribute="from_date">
                            <span class="input-group-addon"> to </span>
                            <input type="date" class="form-control" name="to" id="to_date" data-attribute="to_date"> 
                        </div>
                        <!-- /input-group -->
                        <span class="help-block"> Applied Date </span>
                    </div>
					
					
					<div class="theme-option">
                        <div class="input-group date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                            <input type="date" class="form-control" name="from_m" id="from_date_m" data-attribute="from_date_m">
                            <span class="input-group-addon"> to </span>
                            <input type="date" class="form-control" name="to_m" id="to_date_m" data-attribute="to_date_m"> 
                        </div>
                        <!-- /input-group -->
                        <span class="help-block"> Modified Date </span>
                    </div>
					
					
					
                     <div class="theme-option text-center" id="staffView_filter_btn_Applicant">
                        <a href="javascript:;" class="btn uppercase green-jungle applyFilter_Applicant">Apply Filter</a>
                        <a href="javascript:;" class="btn uppercase grey-salsa clearFilter_Applicant">Clear Filter</a>
                     </div>
                  </div>
                  <!-- theme-options -->
               </div>
               <!-- theme-panel -->
               <?php /* 
               <div class="theme-panel hidden-xs hidden-sm" style="margin-top: 0px !important;">
                  <div class="toggler2"> </div>
                  <div class="toggler2-close"> </div>
                  <div class="theme-options2">
                     <div class="theme-option">
                        <span> By Name </span>
                        <select id="StaffView_Sort_Name" class="layout-option form-control input-sm">
                           <option value="A to Z">Ascending order (A to Z)</option>
                           <option value="Z to A">Descending order (Z to A)</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span> By Department Name </span>
                        <select id="StaffView_Sort_Department" class="layout-option form-control input-sm">
                           <option value="A to Z">Ascending order (A to Z)</option>
                           <option value="Z to A">Descending order (Z to A)</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span> By Attendance Score</span>
                        <select id="StaffView_Sort_AtdScore" class="page-header-option form-control input-sm">
                           <option value="H to L">High to Low</option>
                           <option value="L to H">Low to High</option>
                        </select>
                     </div>
                     <div class="theme-option text-center" id="staffView_sort_btn">
                        <a href="javascript:;" class="btn uppercase green-jungle applySort">Apply Sorters</a>
                        <a href="javascript:;" class="btn uppercase grey-salsa clearSort">Clear Sorters</a>
                     </div>
                  </div>
                  <!-- theme-options -->
               </div> */?>
               <!-- updated sorter -->
              <input type="hidden" id="Applicant_id" value="0" />
            </div>
            <!-- inputs -->
			
		<!--	'career_id' => string '1' (length=1)
      'gc_id' => string '18-03/000' (length=9)
      'name' => string 'Atif' (length=4)
      'email' => string 'atif.naseem22@gmail.com' (length=23)
      'mobile_phone' => string '+92-313-5521122' (length=15)
      'land_line' => string '' (length=0)
      'nic' => string '42121212121212121' (length=17)
      'gender' => string 'M' (length=1)
      'position_applied' => string 'Teaching' (length=8)
      'comments' => string 'Hello' (length=5)
      'status_id' => string '1' (length=1)
      'stage_id' => string '1' (length=1)
      'status_name' => string 'Form Screening' (length=14)
      'status_code' => string 'FS' (length=2)
      'stage_name' => string 'Allocation' (length=10)
      'stage_code' => string 'Allocation' (length=10) -->
	  
	  

 

             <div class="table-scrollable table-scrollable-borderless" id="table_data">

 
                 <table id='empTable' class='display dataTable table table-striped table-bordered table-hover dt-responsive' width="100%">

  <thead>
    <tr>
      <th class="all">Form #</th>
      <th class="all">Name</th>
      <th class="all">Postion</th>
      <th class="all">Action</th>
      <th class="none">Mobile</th>
      <th class="none">Landline: </th>
      <th class="none">CNIC</th>
      <th class="none">Standing</th>
      
      <th class="none">Apply Date:</th>
      <th class="none">Source: </th>
      <th class="none">Comments: </th>
      <th class="none">Modified date: </th>
      

  </tr>
  </thead>

</table>


  <?php /* ?>
			

               <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="StaffList">
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
                         <th class="all">Action.</th>
                     </tr>
                 </thead>
                 <tbody>
				 <?php if( !empty( $staffRecruiment   ) ) : ?>
					<?php foreach($staffRecruiment as $sr ) : ?>
					
					<tr class="<?= ( $sr["form_source"] == 1 ? 'online' : 'walkin') ;?> Row" data-source="<?= ( $sr["form_source"] == 1 ? 'Online' : 'Walkin') ;?>" data-position="<?=$sr["position_applied"];?>" data-standing="<?=$sr["status_name"]?>" data-campus="<?=$sr["Campus"];?>" data-id="<?=$sr["career_id"];?>" data-partB="<?=$sr["PartB"];?>" data-from_date="<?=$sr["Created_date"];?>" data-to_date="<?=$sr["Created_date"];?>" data-from_date_m="<?=($sr["Modified_date"]);?>" data-to_date_m="<?=$sr["Modified_date"];?>" data-from_date_mo="<?=$sr["log_created"];?>" data-to_date_mo="<?=$sr["log_created"];?>" >
                         <td><a data-id="<?=$sr["career_id"];?>" ><?=$sr["gc_id"];?></a></td>

                         <td id="table_append_<?=$sr["career_id"];?>">

                          <span  data-container="body" data-placement="top" data-original-title="<?=$sr["status_name"]?>" class="tooltips boxidentification <?=str_replace(' ', '', $sr["status_name"]);?>">&nbsp;</span><?=ucfirst($sr["name"]);?>
                        

                         <?php if($sr["status_id"] == 11){ ?>
                            
                            <?php if($sr['part_b_date'] == '')  { ?>
                            <br>
                            <small style="color: #888;" id="call_for_part_b_flag_<?=$sr['career_id'];?>">Call for Part B</small><br />
                            <?php } ?>


                            <?php if(!empty($sr['part_b_date'])){ ?>
                              <br>
                                <small style="color: #888;" id="expected_part_b_flag_<?=$sr['career_id'];?>">Expected for Part B on <strong style="color:#000;"><?php echo date('d M, Y', strtotime($sr['part_b_date'])); ?></strong> at <strong style="color:#000;"><?php echo date('g:i a', strtotime($sr['part_b_time'])); ?></strong></small>
                              </br>
                            <?php } ?>


                         <?php } ?>

                         
                         <?php if($sr["part_b_complete"] != "") { ?>
                          <br>
                           <small style="color: #888;" id="call_for_part_b_presence_flag_<?=$sr['career_id'];?>"><?=$sr["part_b_complete"] ?></small>
                          <br>
                          <?php } ?>
						  
						  
						  
						  
						   <?php if($sr['status_name'] == 'Archive')  { ?>
                            <br>
                            <small style="color: #888;">File For Future</small><br />
                            <?php } ?>


                            <?php if($sr['status_name'] == 'Regret')  { ?>
                            <br>
                            <small style="color: #888;">Regret</small><br />
                            <?php } ?>
                         
                         </td>

                         <td>
						 <?php 
							$str = explode(",", $sr["position_applied"]);
							if( sizeof( $str > 0 ) )
							{ 
							foreach($str as $s ): ?>
							<span class="itemSq"><?=$s;?></span> 		
							
							<?php endforeach;
							 } else{ ?>
								 
								 <span class="itemSq"><?=$sr["position_applied"];?></span> 	
							<?php }
							 ?>
						 
						 
						 
						 </td>
             <td><?=$sr["mobile_phone"];?></td>
             <td><?=$sr["land_line"];?></td> 
             <td><?=$sr["nic"];?></td>
             <td><?=$sr["status_name"]?></td>

                         
						 <td>

              <?php echo date("d-M-Y", strtotime( $sr["created"])); ?> - <?php echo date("h:i A", strtotime($sr["created"])); ?> <br />
							Modified date: <?php  echo($sr["log_created"] );   ?> 
            </td>
							
                         <td><?= ( $sr["form_source"] == 1 ? 'Online' : 'Walkin') ;?></td>
                         <td><?=$sr["comments"];?></td>

                         <?php if($sr["form_source"] == 1) { ?>
                         <td>
                             <div class="btn-group pull-right part_b_append_ul_<?=$sr['career_id'];?>">
                                 <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Action
                                     <i class="fa fa-angle-down"></i>
                                 </button>
                                 <ul class="dropdown-menu pull-right">
                                     <li class="print_form" data-walkin="<?= ( $sr["form_source"] == 1 ? 'Online' : 'Walkin') ;?>" data-id="<?=$sr["gc_id"];?>">
                                         <a href="javascript:;">
                                             <i class="fa fa-print " ></i> Print </a>
                                     </li>

                                     <?php if( ($sr["part_b_complete"] != 'Part-B completed') &&  ($sr["status_name"] != 'Archive') )  { ?>
                                       <li class="call_for_part_b" data-status="11" data-stage="9" data-form = "<?=$sr["career_id"];?>" >
                                           <a href="javascript:void(0)">
                                               <i class="fa fa-phone"></i> Call for Part B </a>
                                       </li>
                                       <?php if($sr["status_id"] == 11 &&  $sr["stage_id"] == 10) { ?>
                                       <li class="call_for_part_b" data-gc={{$sr["gc_id"]}}  data-status="11" data-stage="4" data-form = "<?=$sr["career_id"];?>">
                                           <a href="" data-toggle="modal">
                                               <i class="fa fa-user"></i> Part B Presence </a>
                                       </li>
                                     <?php } ?>
									 
									    <?php if( ($sr["PartB"] != "CompletedPartB") && ($sr["PartB"] != 'Archive') ) { ?>
                                      
									   <li class=""> 
                                           <a class="Move_To_Archive" data-form="<?=$sr["career_id"];?>" data-stage="<?=$sr["stage_id"];?>" data-nametitle="<?=$sr["name"];?>" >
                                               <i class="fa fa-user"></i> Move To Archive </a>
                                       </li>
                                     <?php } ?>
									 
									 
                                    <?php } ?>
                                 </ul>
                             </div>
                         </td> 
                         <?php } else { ?>                        
                         <td>
                             <div class="btn-group pull-right">
                                 <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Action
                                     <i class="fa fa-angle-down"></i>
                                 </button>
                                 <ul class="dropdown-menu pull-right">
                                     <li class="print_form" data-walkin="<?= ( $sr["form_source"] == 1 ? 'Online' : 'Walkin') ;?>" data-id="<?=$sr["gc_id"];?>">
                                         <a href="http://10.10.10.63/gs/index.php/hcm/career_form_ajax/get_career_form_pdf_gcid?gc_id=<?=$sr["gc_id"];?>">
                                             <i class="fa fa-print"  ></i> Print </a>
                                     </li>
                                     <li>
                                         <a href="http://10.10.10.63/gs/index.php/hcm/career_form_ajax/get_career_form_pdf_gcid?gc_id=<?=$sr["gc_id"];?>">
                                             <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                     </li>
                                     <li>
                                         <a href="javascript:;">
                                             <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                     </li>
                                 </ul>
                             </div>
                         </td>

                         <?php } ?>




                     </tr>
					<?php endforeach; ?>
				 <?php endif;?>
				 
				 </tbody>
             </table>
            
			     <?php */ ?>
   
    
							 
            </div>
			<div class="modal fade 100pxwidth" id="MoveTA" tabindex="-1" role="basic" aria-hidden="true">
        




           <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h3 class="modal-title">Move To Archive - <small id="mname_title"></small></h3>
                 </div>
                 <div class="modal-body" style="float:left;width:100%;">
                   <div class="row">
                      <div class="col-md-6">
        
                        <input type="hidden" name="Modal_Form_id" id="Modal_Form_id" value="0" />
                        <input type="hidden" name="Modal_Stage_id" id="Modal_Stage_id" value="0" />
        
                        <select class="form-control" id="career_tag_move_to_archive1" name="career_tag_move_to_archive1">
                        <option value="10">File for Future</option>
                        <option value="12">Regret</option>
                        </select>
  
                      </div><!-- col-md-6 -->
                      <div class="col-md-6">
                       <select  multiple="multiple" class="form-control ms" id="career_tag_move_to_archive2" name="career_tag_move_to_archive2">
                        <?php if( !empty( $tag ) ) { ?>
                          <?php foreach($tag as $tag)  { ?>
                            <?php echo $tag->html_tag ?>
                          <?php } ?>
                        <?php } ?>

                        </select>       
                      </div><!-- col-md-6 -->
                   </div><!-- row -->
                 </div>
                 <div class="modal-footer text-center" style="text-align:center;">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <input type="submit" class="form-control btn btn-group green" name="MoveToArch" value="Move To Archive" id="btn_MoveToArch" />
                    </div><!-- col-md-12 -->
                 </div>
              </div>
              <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
        </div>
        <!--------------------------->
            <div class="modal fade 100pxwidth" id="DownloadOnlineForm" tabindex="-1" role="basic" aria-hidden="true">
                   <div class="modal-dialog">
                      <div class="modal-content">
                         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h3 class="modal-title">Download Online forms</h3>
                         </div>
                         <div class="modal-body" style="float:left;width:100%;">
                           <div class="row">
                              <div class="col-md-6">
                                <label> From</label>
                                <input id="hr_date_from" type="date" name="" class="form-control">
                              </div><!-- col-md-6 -->
                              <div class="col-md-6">
                                <label> To</label>
                                <input id="hr_date_to" type="date" name="" class="form-control">
                              </div><!-- col-md-6 -->
                           </div><!-- row -->
                            <div class="row marginTop10">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Catefory</label>
                                      <div class="mt-checkbox-list">
                                          <label class="mt-checkbox"> Unattended
                                              <input type="checkbox" name="test" id="hr_unattended"/>
                                              <span></span>
                                          </label>
                                          <label class="mt-checkbox"> Archieve
                                              <input type="checkbox" name="test" id="hr_archieve"/>
                                              <span></span>
                                          </label>
                                          <label class="mt-checkbox"> Call for Part B
                                              <input type="checkbox" name="test" id="hr_call_for_b"/>
                                              <span></span>
                                          </label>
                                      </div><!-- form-group -->
                              </div><!-- col-md-12c-->
                            </div><!-- row -->
                         </div>
                         <div class="modal-footer text-center" style="text-align:center;">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input type="submit" id="hr_download_online_forms" class="form-control btn btn-group green" name="" value="Download">
                            </div><!-- col-md-12 -->
                         </div>
                      </div>
                      <!-- /.modal-content -->
                   </div>
                   <!-- /.modal-dialog -->
                </div>

            <div class="modal fade 100pxwidth" id="PartB" tabindex="-1" role="basic" aria-hidden="true">
                   <div class="modal-dialog">
                      <div class="modal-content">
                         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h3 class="modal-title">Call for Part B - <small>Saleem Ahmed Qureshi</small></h3>
                         </div>
                         <div class="modal-body" style="float:left;width:100%;">
                           <div class="row">
                              <div class="col-md-6">
                                <input type="date" name="" class="form-control">
                              </div><!-- col-md-6 -->
                              <div class="col-md-6">
                                <input type="time" name="" class="form-control">
                              </div><!-- col-md-6 -->
                           </div><!-- row -->
                            <div class="row marginTop10">
                              <div class="col-md-12">
                                  <textarea class="form-control"></textarea>
                              </div><!-- col-md-12c-->
                            </div><!-- row -->
                         </div>
                         <div class="modal-footer text-center" style="text-align:center;">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input type="submit" class="form-control btn btn-group green" name="" value="Communicated">
                            </div><!-- col-md-12 -->
                         </div>
                      </div>
                      <!-- /.modal-content -->
                   </div>
                   <!-- /.modal-dialog -->
                </div>
				
				
				
				
				
            <!-- table-scrollable-borderless -->
         </div>
         <!-- portlet-body -->
      </div>
      <!-- portlet -->
   </div>
   <!-- col-md-4 -->
</div>
