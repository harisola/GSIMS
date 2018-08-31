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
                         <?php } else { ?>                        
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

                     <tr class="online selected">
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
                     </tr>
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

