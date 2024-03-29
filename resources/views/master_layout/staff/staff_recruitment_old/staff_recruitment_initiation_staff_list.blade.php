
  <div class="col-md-4 borderRightDashed">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet light bordered fixed-height-NoScroll marginBottom0">
         <h3 class="headTitle">Applicants</h3>
         <div class="portlet-title padding0">
            <div class="caption caption-md">
               <h3 id="staffView_StaffList_Total" class="marginTop0 marginBottom0 padding0">Applicant</h3>
            </div>
            <div class="actions">
                <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                        <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Issue Applicant Form" id="show">Issue Application</button>
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
               <div class="portlet-input">
                  <div class="input-icon right">
                     <i class="icon-magnifier"></i>
                     <input id="staffView_StaffList_Search" type="text" class="form-control form-control-solid" placeholder="Search..."> 
                  </div>
               </div>
               <div class="theme-panel hidden-xs hidden-sm"  style="right:33px;">
                  <div class="toggler"> </div>
                  <div class="toggler-close"> </div>
                  <div class="theme-options">
                     <div class="theme-option">
                        <span> Source </span> 
                        <select data-attribute="source" multiple="multiple" id="StaffView_Filter_Profile" class="ddlFilterTableRow page-header-option form-control input-sm multiselect">
						              <option>Online</option>
                          <option>Walkin</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span> Position </span>
                        <select data-attribute="position" multiple="multiple" id="StaffView_Filter_Department" class="ddlFilterTableRow layout-option form-control input-sm multiselect">
                          <option>Technical</option>
						              <option>Admin</option>
                          <option>Management</option>
                          <option>Teaching</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span> Current Standing </span>
                        <select data-attribute="standing" multiple="multiple" id="StaffView_Filter_Department" class="ddlFilterTableRow layout-option form-control input-sm multiselect">
                          <option>Part B</option>
                          <option>Form Screening</option>
                          <option>Initial Interview</option>
                          <option>Formal Interview</option>
                          <option>Observation</option>
                          <option>Final Consultation</option>
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
                            <input type="date" class="form-control" name="from" id="from_date">
                            <span class="input-group-addon"> to </span>
                            <input type="date" class="form-control" name="to" id="to_date"> 
                        </div>
                        <!-- /input-group -->
                        <span class="help-block"> Select date range </span>
                    </div>
                     <div class="theme-option text-center" id="staffView_filter_btn_Applicant">
                        <a href="javascript:;" class="btn uppercase green-jungle applyFilter_Applicant">Apply Filter</a>
                        <a href="javascript:;" class="btn uppercase grey-salsa clearFilter_Applicant">Clear Filter</a>
                     </div>
                  </div>
                  <!-- theme-options -->
               </div>
               <!-- theme-panel -->
               <div class="theme-panel hidden-xs hidden-sm">
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
               </div>
               <!-- updated sorter -->
              
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
					
					 <tr class="<?= ( $sr["form_source"] == 1 ? 'online' : 'walkin') ;?> selected Row" data-source="<?= ( $sr["form_source"] == 1 ? 'Online' : 'Walkin') ;?>" data-position="<?=$sr["position_applied"];?>" data-standing="<?=$sr["status_name"]?>" data-campus="s" data-id="<?=$sr["career_id"];?>">
                         <td><a data-id="<?=$sr["career_id"];?>" ><?=$sr["gc_id"];?></a></td>
                         <td><?=$sr["name"];?></td>

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

                         <td><?php echo date("d-M-Y", strtotime( $sr["created"])); ?> - <?php echo date("h:i A", strtotime($sr["created"])); ?></td>
                         <td><?= ( $sr["form_source"] == 1 ? 'Online' : 'Walkin') ;?></td>
                         <td><?=$sr["comments"];?></td>
                         <?php if($sr["form_source"] == 1) { ?>
                         <td>
                             <div class="btn-group pull-right">
                                 <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Action
                                     <i class="fa fa-angle-down"></i>
                                 </button>
                                 <ul class="dropdown-menu pull-right">
                                     <li class="print_form" data-walkin="<?= ( $sr["form_source"] == 1 ? 'Online' : 'Walkin') ;?>" data-id="<?=$sr["gc_id"];?>">
                                         <a href="javascript:;">
                                             <i class="fa fa-print " ></i> Print </a>
                                     </li>
                                     <li>
                                         <a href="#PartB" data-toggle="modal">
                                             <i class="fa fa-phone"></i> Call for Part B </a>
                                     </li>
                                     <li>
                                         <a href="" data-toggle="modal">
                                             <i class="fa fa-user"></i> Part B Presence </a>
                                     </li>
                                 </ul><!-- dropdown-menu -->
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
                     <?php /* <tr class="online selected Row">
                         <td><a>18-03/0117</a></td>
                         <td>Saleem Ahmed Qureshi<br /><small style="color: #888;">Expected for Part B on <strong style="color:#000;">22 March 2018</strong> at <strong style="color:#000;">02:00 PM</strong></small></td>
                         <td><span class="itemSq">Admin</span> <span class="itemSq">Management</span> </td>
                         <td>+92-332-253-6406</td>
                         <td>61</td>
                         <td></td>
                         <td>Initial Interview</td>
                         <td>20-Mar-2018 - 12:29 AM</td>
                         <td>Online</td>
                         <td>Lorem Ipsum dolor sit amet</td>
                         <td>
                             <div class="btn-group pull-right">
                                 <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Action
                                     <i class="fa fa-angle-down"></i>
                                 </button>
                                 <ul class="dropdown-menu pull-right">
                                     <li>
                                         <a href="javascript:;">
                                             <i class="fa fa-print"></i> Print </a>
                                     </li>
                                     <li>
                                         <a href="#PartB" data-toggle="modal">
                                             <i class="fa fa-phone"></i> Call for Part B </a>
                                     </li>
                                     <li>
                                         <a href="" data-toggle="modal">
                                             <i class="fa fa-user"></i> Part B Presence </a>
                                     </li>
                                 </ul><!-- dropdown-menu -->
                             </div>
                         </td>
                     </tr> */?>
                     <!--<tr class="walkin">
                         <td><a>18-03/0116</a></td>
                         <td>Nawazuddin Siddiqui</td>
                         <td><span class="itemSq">Teaching</span> <span class="itemSq">Technical</span></td>
                         <td>+92-332-253-6406</td>
                         <td>63</td>
                         <td>2011/07/25</td>
                         <td>19-Mar-2018 - 12:29 AM</td>
                         <td>Walkin</td>
                         <td>
                             <div class="btn-group pull-right">
                                 <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                     <i class="fa fa-angle-down"></i>
                                 </button>
                                 <ul class="dropdown-menu pull-right">
                                     <li>
                                         <a href="javascript:;">
                                             <i class="fa fa-print"></i> Print </a>
                                     </li>
                                     <li>
                                         <a href="javascript:;">
                                             <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                     </li>
                                     <li>
                                         <a href="javascript:;">
                                             <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                     </li>
                                 </ul>
                             </div>
                         </td>
                     </tr -->
                     
				 </tbody>
             </table>
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
