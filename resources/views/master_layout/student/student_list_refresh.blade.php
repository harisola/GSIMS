				
                    <table class="table table-hover table-light" id="staffView_Table_StaffList">
                        <thead>
                            <tr class="uppercase">
                                <th colspan="2"> Student </th>
                                <th class="text-center"> Profiles </th>
                                <th class="text-center"> Badges <a class="tooltips" data-placement="top" data-original-title="Add New Badge" data-toggle="modal" href="#basic">+</a></th>
                                <th class="text-center"> Att. </th>
                            </tr>
                        </thead>
                        <!-- Static Table Row -->
						<?php if( !empty($Students) ): ?>
						<?php foreach($Students as $Student): ?>
						
                        <tr>
                            <td class="fit">
                                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="GF-ID: <?=$Student->GF_ID;?>" src="<?=$Student->photo150;?>"> </td>
                             <td class="studentView_StudentName">
                                <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" id="{!! $Student->Student_Id !!}_{!! $Student->GS_ID !!}" data-original-title="GS-ID: <?php echo $Student->GS_ID; ?>"> <?=$Student->Abridged_Name;?> </a><br />
								
								 <span class="class_Name <?=$Student->GBClass;?>" style="margin-left:10px;">
                                	<span class="tooltips className" data-container="body" data-placement="top" data-original-title="Class Roll No: <?=$Student->Roll_no;?>" >
									<?=$Student->Grade_Name?>-<?=$Student->Section_Name?></span>
									<span class="StuStatus tooltips" data-placement="top" data-original-title="Status: <?=$Student->Statud_Code;?>" data-pin-nopin="true"><?=$Student->Single_SCode;?></span>
                                </span>
								
                            </td>
                            <td class="text-center">
							<!-- //APSA -->
							<span class="ProfileB Academic tooltips" data-placement="top" data-original-title="Academic" data-pin-nopin="true"><?=$Student->P_Academic;?></span>&nbsp;
								<span class="ProfileC Parental tooltips" data-placement="top" data-original-title="Parental" data-pin-nopin="true"><?=$Student->P_Parental;?></span>&nbsp;
								<span class="ProfileD  Social tooltips" data-placement="top" data-original-title="Social" data-pin-nopin="true"><?=$Student->P_Social;?></span>&nbsp;
								<span class="ProfileA  Account tooltips" data-placement="top" data-original-title="Accounts" data-pin-nopin="true"><?=$Student->P_Accounts;?></span>
                            </td>
                            <td class="text-center">
							<!-- Badges-->
                            	@php 
								$Badges = app(App\Http\Controllers\Student_Information\Master_Page\Grade::class)->Student_Badges($Student->Student_Id)
								@endphp	
								@if(!empty( $Badges ) )
									@foreach( $Badges as $SB )
										<span class="badgeTeacher tooltips" data-placement="top" data-original-title="{!! $SB->Bdg_Title !!}" data-pin-nopin="true" style="border-color:{!! $SB->Badge_Color !!};color:{!! $SB->Badge_Color !!}" >{!! $SB->Badge_code !!}</span> 
									@endforeach
								@else
								@endif
                            </td>
                            <td class="text-center"> 
                            	<span style="width:30px; text-align:center; float:left;">
                                <img style="margin-top: 6px;" src="http://10.10.10.50/gsims/public/metronic/pages/img/OnTimeicon.png" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In at 07:29 AM" data-original-title="On Time" width="25">
                                </span>
                                <span class="AttStatusNeww">
								<!-- Attendance -->
									<?php
									/*$Ten_Days_Students = 0;
									
									$Att10Days = $Student->total_pf;
									$Att60Days = $Student->total_ps;
									
									
									$Student10Days += $Student->total_pf;
									$Student60Days += $Student->total_ps;
									
									// Grade 10 Days
									$T10Days = $Student->total_wdf;
									$T60Days = $Student->total_wds; Abridged_Name, O_Name Call_Name */
									
									?>
                                    <span class="tenDayAttStatuss tooltips" data-container="body" data-placement="top" data-original-title="10 day status">{!! $Student->total_wdf; !!}</span>
                                    <span class="sixtyDayAttStatuss tooltips" data-container="body" data-placement="top" data-original-title="60 day status">{!! $Student->total_wds; !!}</span>
                                </span>
                            </td>
							
							<td class="text-center" style="display:none;">{!! $Student->Abridged_Name; !!}</td> <!--// <TD> 6 -->
                            <td class="text-center" style="display:none;">{!! $Student->Statud_Code; !!}</td> <!--// <TD> 7 -->
							<td class="text-center" style="display:none;">{!! $Student->House; !!}</td> <!--// <TD> 8 -->
                            <td class="text-center" style="display:none;">{!! $Student->Student_Id; !!}</td> <!--// <TD> 9 -->
                            <td class="text-center" style="display:none;">{!! $Student->GS_ID; !!}</td> <!--// <TD> 10 -->
                            <td class="text-center" style="display:none;">{!! $Student->Grade_Name; !!}</td> <!--// <TD> 11 -->
                            <td class="text-center" style="display:none;">{!! $Student->Section_Name; !!}</td> <!--// <TD> 12 -->
                            <td class="text-center" style="display:none;">{!! $Student->GF_ID; !!}</td> <!--// <TD> 13 -->
							<td class="text-center" style="display:none;">{!! $Student->C_Name; !!}</td> <!--// <TD> 14 -->
							<td class="text-center" style="display:none;">{!! $Student->Gender; !!}</td> <!--// <TD> 15 -->
							<td class="text-center" style="display:none;">{!! $Student->total_ps; !!}</td> <!--// <TD> 16 -->
							
							
                        </tr>
						 <?php endforeach; ?>
                        <?php else: ?>
						<tr>
							<td colspan="4">Students Not Assigned To This Grade Section</td>
						</tr>
						<?php endif; ?>
						
                       <!-- End Static Table Row -->
                    </table>
                
				
				
		<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <h3 class="modal-title">Badge Details</h3>
                    </div>
					<div class="modal-body"> 
						<div class="portlet box blue-hoki">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shield"></i><font><font>All Badges </font></font></div>
                                <div class="actions">
                                    <a href="javascript:;" class="btn btn-default btn-sm" href="#" id="Add_New_Badge_Form_btn">
									<i class="fa fa-plus"></i><font><font> Add a New Badge</font></font></a>
							    </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="Badge_Assigned_Student_List">
                                    <thead>
                                        <tr>
                                            <th class="table-checkbox">
                                                
                                            </th>
                                            <th> Badge Title </th>
                                            <th> Created by </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php if( !empty($_Badges) ): ?>
									<?php foreach($_Badges as $Badge): ?>
										
                                        <tr class="odd gradeX">
                                            <td>
                                                <span class="badgeTeacher" style="border-color:<?=$Badge->bedge_color;?>;color:<?=$Badge->bedge_color;?>;"><?=$Badge->bedge_code;?></span>
                                            </td>
                                            <td> <?=$Badge->bedge_title;?> </td>
                                            <td>
                                                <?=$Badge->abridged_name;?>
                                            </td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-xs blue Edit_Badge" data-id="<?=$Badge->ID;?>"> Edit <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:;" class="btn btn-xs green"> Assign <i class="fa fa-link"></i>
                                                </a>
                                            </td>
                                        </tr>
									<?php endforeach; ?>
									<?php endif; ?>
									
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn green">Add Badge</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		