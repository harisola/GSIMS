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
                         <td id="table_append_<?=$sr["career_id"];?>"><span  data-container="body" data-placement="top" data-original-title="<?=$sr["status_name"]?>" class="tooltips boxidentification <?=str_replace(' ', '', $sr["status_name"]);?>">&nbsp;</span><?=ucfirst($sr["name"]);?>
                         <?php /***** ***** ***** Part B ***** ***** *****/ ?>
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
                            <small style="color: #888;">Archive</small><br />
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

                         <td><?php echo date("d-M-Y", strtotime( $sr["created"])); ?> - <?php echo date("h:i A", strtotime($sr["created"])); ?> <br />
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
                                       <?php /* ?> <li class="call_for_part_b Move_To_Archive"  data-status="10" data-stage="<?=$sr["stage_id"];?>" data-form = "<?=$sr["career_id"];?>"> <?php */ ?>
									   <li class=""> 
                                           <a class="Move_To_Archive" data-form="<?=$sr["career_id"];?>" data-stage="<?=$sr["stage_id"];?>" data-nametitle="<?=$sr["name"];?>" >
                                               <i class="fa fa-user"></i> Move To Archive </a>
                                       </li>
                                     <?php } ?>
									 
									 
                                    <?php } ?>
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
				 
				 
                
                 </tbody>
             </table>
