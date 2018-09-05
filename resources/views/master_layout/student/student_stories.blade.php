<!-- BEGIN PAGE LEVEL STYLES -->
<style>
/***** BEGIN - Search Result Highlight CSS *****/
span.match{
    background-color:#f8dda9;
    border:1px solid #edd19b;
    margin:-1px;
    color:#390705;
}
/***** END - Search Result Highlight CSS *****/

.has-error .input-icon > i {
    color: #ed6b75 !important;
}
.gs_id_in_li_chat {
    transform: rotate(270deg);
    z-index: 9;
    width: 92px;
    text-align: center;
    float: left;
    height: ;
    position: absolute;
    left: -38px;
    top: 37px;
    background: #1BBC9B;
    BORDER-BOTTOM: 1px solid #1BBC9B;
    color: #fff;
    text-decoration: none;
}
.gs_id_out_li_chat,
.gs_id_out_li_chat a,
.gs_id_in_li_chat a,
.gs_id_in_li_chat {
	color: #fff;
	cursor: normal;
}
.gs_id_out_li_chat {
    transform: rotate(-270deg);
    z-index: 9;
    width: 92px;
    text-align: center;
    float: left;
    height: ;
    position: absolute;
    right: -38px;
    top: 37px;
    background: #F3565D;
    BORDER-BOTTOM: 1px solid #F3565D;
    color: #fff;
    text-decoration: none;
}
/* .out .CommentInfo {
    margin-right: 20px;
    margin-left: 0;  
}*/
.CommentInfo {
    margin-right: 0px !important;
    margin-left: 0 !important;  
}
.allSchoolClass {
    border-bottom: 1px solid #ccc;
    color: #fff;
    margin: 0 0 0px 0px;
    padding: 10px 18px;
    background: #63b5dc;
}
ul.chats {
    float: left;
    width: 100%;
    margin-top: 10px;
}
.studentInfoCom {
	width:100%;
	float:left;	
}
.multiselect.dropdown-toggle {
    width: 100%;
    text-align: left;
}
.Jinnah {
    background: #F1C40F !important; 
}
.Iqbal {
    background: #2ea15a !important; 
}
.Syed {
    background: #2377dd !important; 
}
.not_defined {
    background: #888 !important; 
}
#toTop{
        position: absolute;
    bottom: 1px;
    right: 33px;
    cursor: pointer;
    display: none;
}
#toTop2{
        position: absolute;
    bottom: 1px;
    right: 33px;
    cursor: pointer;
    display: none;
}
</style>
<link href="{{ URL::to('/css/studentLayout.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::to('/metronic/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::to('/metronic/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="index.html">Front Office</a>
            
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Student Stories</span>
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



<!-- END USE PROFILE -->
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-4 borderRightDashed">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered fixed-height marginBottom0 padding0 fixed-height-NoScroll LeftBrowseStudents">
            <div class="showOnlyOnScroll">
                <div class="caption caption-md col-md-12 padding0">
                    <div class="yellowBGHead a LeftListing_headerSection padding0">
                    <div class="col-md-12 text-center padding0">
					
                        
                    </div><!-- -->
                </div>
                </div>
            </div><!-- portlet-title -->
            <div class="portlet-title">
                <h3 class="allSchoolClass">Browse Students  </h3>
            </div><!-- portlet-title -->
           


		   <div class="portlet-body customPadding">
                <div class="inputs">
				
                    <div class="portlet-input">
                    <div class="input-icon right">
                    <i class="icon-magnifier"></i>
                    <input id="staffView_StaffList_Search" type="text" class="form-control form-control-solid" placeholder="Search..." />
					</div>
                    </div>


                    <div class="theme-panel hidden-xs hidden-sm"  style="right:33px;">
                        <div class="toggler"> </div>
                        <div class="toggler-close"> </div>
                        <div class="theme-options">
                          <div class="theme-option">
                            <span> Grade </span>
								<select multiple="multiple" data-attribute="grade" id="Multiple_Grade_id" class="ddlFilterTableRow page-header-option form-control input-sm multiselect" name="Multiple_Grade_id">
									<option value="PG">PG</option>
                                    <option value="PN">PN</option>
                                    <option value="N">N</option>
                                    <option value="KG">KG</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
									<option value="VIII">VIII</option>
                                    <option value="IX">IX</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                </select>
                            </div>
							
							<div class="theme-option" id="Full_School">
								<span> Section </span>
								<select  multiple="multiple" data-attribute="grade_section" id="Multiple_Section_id" class="ddlFilterTableRow Full_School multiselect">
								<?php foreach( $Full_School as $Sec ){ ?>
										<option value="<?=$Sec->Section_id;?>"><?=$Sec->Section_name;?></option>
								<?php } ?>
								</select>
								
							</div>
							
							<?php /* ?>
							<div class="theme-option" style="display:none" id="Section_ids">
								<span> Section </span>
								<select multiple="multiple" data-attribute="grade_section" id="Multiple_Section_id" class="ddlFilterTableRow Section_ids_full page-header-option form-control input-sm multiselect">
								<?php foreach( $Section_ids as $Sec ){ ?>
								<option value="<?=$Sec->Section_id;?>"><?=$Sec->Section_name;?></option>
								<?php } ?>
								</select>
							</div>
							<div class="theme-option" style="display:none" id="North_C">
							<span> Section </span>
							<select multiple="multiple" data-attribute="grade_section" id="Multiple_Section_id" class="ddlFilterTableRow North_C page-header-option form-control input-sm multiselect">
							<?php foreach( $North as $Sec ){ ?>
							<option value="<?=$Sec->Section_id;?>"><?=$Sec->Section_name;?></option>
							<?php } ?>
							</select>
							</div>
							<div class="theme-option" style="display:none" id="Grade_PG">
							<span> Section </span>
							<select data-attribute="grade_section" id="Multiple_Section_id" class="ddlFilterTableRow Grade_PG page-header-option form-control input-sm multiselect">
							<?php foreach( $Grade_PG as $Sec ){ ?>
							<option value="<?=$Sec->Section_id;?>"><?=$Sec->Section_name;?></option>
							<?php } ?>
							</select>
							</div>
							
							<?php */ ?>
							
							<?php /* ?>
                            <div class="theme-option">
                                <span> Grade </span>
                                <select  multiple="multiple" data-attribute="grade" id="StaffView_Filter_Grade" class="ddlFilterTableRow layout-option form-control input-sm multiselect">    
                                    <option>1</option>
                                    <option>2</option>
                                    <option>31</option>
                                </select>
                            </div><?php */?>
                            <div class="theme-option">
                                <span> House </span>
                                <select multiple="multiple" data-attribute="house" id="Multiple_Grade_id_h" class="ddlFilterTableRow layout-option form-control input-sm multiselect" name="Multiple_Grade_id_h">
                                    <option value="Jinnah">Jinnah</option>
                                    <option value="Iqbal">Iqbal</option>
                                    <option value="Syed">Syed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Gender </span>
                                <select  data-attribute="gender" id="StaffView_Filter_Gender" class="ddlFilterTableRow page-header-option form-control input-sm">
                                    <option value="G">Girl</option>
                                    <option value="B">Boy</option>
                                </select>
                            </div>
                            <?php //var_dump($Badges_Grade_Section); ?>
                            <?php /* 
                            <div class="theme-option">
                                <span> Badges </span>
                                <select multiple="multiple" data-attribute="badges" id="StaffView_Filter_Badges" class="ddlFilterTableRow page-header-option form-control input-sm">
                                <?php if( !empty( $Badges_Grade_Section ) ): ?>
                                <?php foreach( $Badges_Grade_Section as $as ): ?>
                                <option value="<?=$as->bedge_title;?>"><?=$as->bedge_title;?>  [<?=$as->bedge_code;?>]</option>
                                <?php endforeach; ?>
                                <?php endif; ?> 
                                </select>
                            </div>
                                */ ?>
                            <div class="theme-option text-center" id="staffView_filter_btn">
                                <a href="javascript:;" class="btn uppercase green-jungle applyFilter">Apply Filter</a>
                                <a href="javascript:;" class="btn uppercase grey-salsa clearFilter">Clear Filter</a>
                            </div>
                            
                        </div><!-- theme-options -->
                    </div><!-- theme-panel -->


                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="toggler2"> </div>
                        <div class="toggler2-close"> </div>
                        <div class="theme-options2">
                            <div class="theme-option">
                                <span> By Name </span>
                                <select id="Sort_By_Name" class="layout-option form-control input-sm">
                                   <option value="Ascending_order">Ascending order (A to Z)</option>
                                   <option value="Descending_order">Descending order (Z to A)</option>
                                </select>
                            </div>
                            <!--div class="theme-option">
                                <span> By Department Name </span>
                                <select id="Sort_By_Department_Name" class="layout-option form-control input-sm">
                                   <option value="Ascending_order">Ascending order (A to Z)</option>
                                   <option value="Descending_order">Descending order (Z to A)</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> By Attendance Score</span>
                                <select id="Sort_By_Attendance_Score" class="page-header-option form-control input-sm">
                                    <option value="High_to_Low">High to Low</option>
                                    <option value="Low_to_High">Low to High</option>
                                </select>
                            </div-->
                            <div class="theme-option text-center" id="staffView_search_btn">
                                <a href="javascript:;" class="btn uppercase green-jungle applySearchs">Apply Sorters</a>
                                <a href="javascript:;" class="btn uppercase grey-salsa clearSearch">Clear Sorters</a>
                            </div>
                            
                        </div><!-- theme-options -->
                    </div>
                    <!-- updated sorter -->



                  
                </div><!-- inputs -->
<?php //var_dump($Students);  
/* public 'Student_Id' => int 4969
public 'O_Name' => string 'Aiman Syed' (length=10)
public 'Abridged_Name' => string 'Aiman Syed' (length=10)
public 'C_Name' => string 'Aiman' (length=5)
public 'Grade_Name' => string 'II' (length=2)
public 'Section_Name' => string 'S' (length=1)
public 'Gender' => string 'G' (length=1)
public 'GBClass' => string 'GirlSta' (length=7)
public 'House' => string 'Iqbal' (length=5)
public 'Student_Status' => string 'Student' (length=7)
public 'Statud_Code' => string 'S-CFS' (length=5)
public 'Single_SCode' => string 'S' (length=1)
public 'Roll_no' => int 2
public 'Photo_id' => int 11734
public 'GS_ID' => string '13-310' (length=6)
public 'GF_ID' => string '13-195' (length=6)
public 'Status_Color' => string 'FFFFFF' (length=6)
public 'Acadmic' => int 9
public 'Grade_id' => int 5
public 'Section_id' => int 2
public 'Cur_Term' => int 1
public 'Today_Tapin_Time' => string '0' (length=1)
public 'TitleTapInOn' => string 'Late' (length=4)
public 'IconTapInOn' => string 'AbsentIcon.png' (length=14)
public 'total_wdf' => string '8' (length=1)
public 'total_pf' => int 8
public 'total_wds' => string '8' (length=1)
public 'total_ps' => int 8
public 'P_Academic' => string 'A' (length=1)
public 'P_Social' => string 'B' (length=1)
public 'P_Parental' => string 'A' (length=1)
public 'P_Accounts' => string '-' (length=1)
public 'P_Support' => string 'A' (length=1)
public 'P_Conduct' => string 'A' (length=1)
public 'Case_ID' => null
public 'To_Time' => null
public 'Case_Solved' => null
public 'Badge_code' => string 'A+' (length=2)
public 'Bdg_Title' => string 'Testing Updating! From' (length=22)
public 'Bdg_Color' => string '#000000' (length=7)
public 'photo500' => string 'assets/photos/sis/500x500/student/11734.jpg' (length=43)
public 'photo150' => string 'assets/photos/sis/150x150/student/11734.png' (length=43)
1 => */
?>

<input type="hidden" id="abridged_name_staff" value="<?php echo $abridged_name_staff;?>" />
<input type="hidden" id="photo500_staff" value="<?php echo $Current_user_pic["photo500"];?>" />
<input type="hidden" id="photo150_staff" value="<?php echo $Current_user_pic["photo150"];?>" />


                <div class="table-scrollable table-scrollable-borderless">
                
                    <table class="table table-hover table-light" id="staffView_Table_StaffList">
                        <thead>
                            <tr class="uppercase">
                                <th colspan="2"> Student </th>
                                <th class="text-center"> Father Name<br /><small>GF-ID</small> </th>
                                
                                <th class="text-center"> Action. </th>
                            </tr>
                        </thead>
                        <!-- Static Table Row -->
                        <tbody>
						
						


                            @foreach ($students as $student)
                        	<tr class="Row" data-grade_section="{{ $student->Section_id }}"  data-grade="{{ $student->grade_name }}" data-house="{{ $student->house_name }}" data-gender="{{ $student->gender }}"  >
	                            <td class="fit">
	                                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="GF-ID: {{ $student->gfid }}" src="{{ $student->photo150 }}"> </td>
	                             <td class="studentView_StudentName">
	                                <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top" id="{{ $student->Student_id }}_{{ $student->gs_id }}" data-original-title="GS-ID: {{ $student->gs_id }}"> {{ $student->abridged_name }} </a><br>
	                                
	                                 <span class="class_Name BoySta" style="margin-left:10px;">
	                                    <span class="tooltips className" data-container="body" data-placement="top" data-original-title="Class Roll No: {{ $student->class_no }}">
	                                    {{ $student->class }}</span>
	                                    <span class="StuStatus tooltips" data-placement="top" data-original-title="Status: {{ $student->std_status_code }}" data-pin-nopin="true">S</span>
										<span class="StuStatus tooltips {{ $student->house_name }}" data-placement="top" data-original-title="House: {{ $student->house_name }}" data-pin-nopin="true"><?php  echo substr($student->house_name, 0, 1); ?></span>
	                                </span>
	                                
	                            </td>
	                            <td class="text-center">
	                            <!-- //APSA -->
	                            	{{ $student->father_name }}<br /><small style="color: #000;">{{ $student->gfid }}</small>
	                            </td>
	                            
	                            <td class="text-center"> 
                                    <a class="tooltips show_addstory_modal" data-placement="top" data-original-title="Add story" data-toggle="modal" href="#" data-id="{{ $student->gs_id }}" data-aname="{{ $student->abridged_name }}">Add Story</a>
	                            </td>
	                            
	                            <td class="text-center" style="display:none;">{{ $student->call_name }}</td> <!--// <TD> 14 -->
								<td class="text-center" style="display:none;">{{ $student->grade_name }}</td> <!--// <TD> 4 -->
								<td class="text-center" style="display:none;">{{ $student->house_name }}</td> <!--// <TD> 5 -->
								<td class="text-center" style="display:none;">{{ $student->gender }}</td> <!--// <TD> 6 -->
								<td class="text-center" style="display:none;">{{ $student->gs_id }}</td> <!--// <TD> 6 -->
								
								
								<?php /*if( $student->house_name != 'not_defined') { ?>
									<td class="text-center" style="display:none;"><?php if($student->house_name != 'not_defined') echo $student->house_name; ?></td> <!--// <TD> 5 -->
								<?php }*/ ?>
								
								<?php  /* ?>
								
	                            <td class="text-center" style="display:none;">{{ $student->std_status_code }}</td> <!--// <TD> 7 -->
	                            
	                            <td class="text-center" style="display:none;">7176</td> <!--// <TD> 9 -->
	                            <td class="text-center" style="display:none;">{{ $student->gs_id }}</td> <!--// <TD> 10 -->
	                            
	                            <td class="text-center" style="display:none;">{{ $student->grade_name }}</td> <!--// <TD> 12 -->
	                            <td class="text-center" style="display:none;">{{ $student->gfid }}</td> <!--// <TD> 13 -->
	                            <td class="text-center" style="display:none;">{{ $student->call_name }}</td> <!--// <TD> 14 -->
	                            
	                            <td class="text-center" style="display:none;">0</td> <!--// <TD> 16 -->
	                            <td class="text-center" style="display:none;">{{ $student->father_name }}</td> <!--// <TD> 6 -->
								<?php  */ ?>
	                            
	                            
	                        </tr>
                            @endforeach
							
						

                        </tbody>
                        
                       <!-- End Static Table Row -->
                    </table>
                
                








        			<!-- Add Story Modal -->  
			        <div class="modal fade" id="Add_call_story" tabindex="-1" role="basic" aria-hidden="true">
					
			            <div class="modal-dialog">
			                <div class="modal-content">
			                    <div class="modal-header">
			                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			                     <h3 class="modal-title">Add Story</h3>
			                    </div>
			                    <div class="modal-body"> 
			                   
			                    </div><!-- modal-body -->
								
	
                                                    
                                                        
														<div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-mini bootstrap-switch-id-switchChange2 bootstrap-switch-animate" style="width: 54px;">
														<div class="bootstrap-switch-container"> 
														
														
														
														<input type="checkbox" class="make-switch" id="switchChange2" name="switchChange2" data-size="mini" data-on-text="Yes" data-off-text="No">
														</div></div>
														Family
                                                    
													
													
			                    <div class="modal-footer">
									
			                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
			                        <button type="button" class="btn green" id="add_badge">Add Story</button>
			                    </div><!-- modal-footer -->
			                </div>
			                <!-- /.modal-content -->
			            </div>
			            <!-- /.modal-dialog -->
			        </div>
			        <!-- /.modal -->









      
                </div>
            </div><!-- portlet-body -->
        </div><!-- portlet -->
    </div><!-- col-md-4 -->
    
	
<div class="col-md-8" id="loadingText"></div>

<div class="col-md-8 fixed-height" id="StudentView_StuInfo" style="display:;">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0 StudentRightView">
                	<div class="portlet-title">
                		<h3 class="allSchoolClass">Student Stories <name id="Student_Nalo">  </name> <a class="pull-right" id="Back_To_Main" style="margin-top: 5px; color:#fff;display:none; font-size: 16px; "> Back to all stories </a> </h3>
						
                	</div><!-- portlet-title -->
                    <div class="portlet-body padding20" style="padding-top: 9px !important;">
        				<div class="inputs">
		                    <div class="portlet-input">
		                        <div class="input-icon right">
		                            <i class="icon-magnifier"></i>
									<input type="hidden" name="Student_id_comment" id="Student_id_comment" value="0" />
		                            <input id="staffView_StaffList_Search_B" type="text" class="form-control form-control-solid" placeholder="Search..."> </div>
		                    </div>


		                    <div class="theme-panel hidden-xs hidden-sm"  style="right:0px;">
		                        <div class="toggler4"> </div>
		                        <div class="toggler4-close"> </div>
		                        <div class="theme-options4">
		                            <div class="theme-option">
                                        <span> Source </span>
                                        <select id="Sort_By_Source" class="layout-option form-control input-sm">
                                           <option value="user">User</option>
                                           <option value="system">System</option>
        
                                        </select>
                                    </div>
                                    <div class="theme-option">
                                        <span> User </span>
                                        <select id="Sort_By_User" class="layout-option form-control input-sm">
                                           <option value="2">Farah</option>
                                           <option value="37">Zulfiqar</option>
                                           <option value="231">Salman</option>
                                           <option value="36">Ayaz</option>
                                        </select>
                                    </div>
                                  
                                    <div class="theme-option">
                                        <span style="padding-bottom:10px;">Comment Category</span>
                                        <span style="width:100%;">
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="Finance" /> Finance
                                                <span></span>
                                            </label>
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="Academic" /> Academic
                                                <span></span>
                                            </label>
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="Etab" /> E-TAB
                                                <span></span>
                                            </label>
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="SIS" /> SIS
                                                <span></span>
                                            </label>
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="Family" /> Family
                                                <span></span>
                                            </label>
                                            
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="SMS" /> SMS
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="theme-option">
                                        <span style="padding-bottom:10px;width:235px;"> Communication Category</span>
                                        <span style="width:100%;">
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="CommCall" /> Call
                                                <span></span>
                                            </label>
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="CommSMS" /> SMS
                                                <span></span>
                                            </label>
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="CommWhatsapp" /> Whatsapp
                                                <span></span>
                                            </label>
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="Search_Cat[]" value="CommWalkin" /> Walkin
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="theme-option">
                                        <div class="input-group date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                            <input type="date" class="form-control" name="from" id="from_date" />
                                            <span class="input-group-addon"> to </span>
                                            <input type="date" class="form-control" name="to" id="to_date" /> 
                                        </div>
                                        <!-- /input-group -->
                                        <span class="help-block"> Select date range </span>
                                    </div>
									
									
                                    <div class="theme-option text-center" id="staffView_search_btn33">
                                        <a href="javascript:;" class="btn uppercase green-jungle applySearch">Apply Filter</a>
                                        <a href="javascript:;" class="btn uppercase grey-salsa clearSearch">Clear Filter</a>
                                    </div>
		                            
		                        </div><!-- theme-options -->
		                    </div><!-- theme-panel -->
	               		</div><!-- inputs -->
						 <div class="pull-left width100">
							<div class="alert alert-warning alert-dismissable" id="Error_Commenting" style="display:none;">
							<!--button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button -->
							<strong id="Error_Commenting_1"></strong>
							</div>
							
							
						</div>


                        
                        <div class="col-md-12" style="" data-always-visible="1" data-rail-visible1="1" id="">
						
                            <ul class="chats" id="Stories_Chats">


                                @foreach ($stories as $student)


                                @if ($login_user != $student->user_id)
                            	<li class="in">
			                		<img class="avatar" alt="" src="{{ $student->photo150 }}">
			            			<div class="message"><span class="arrow"> </span>
			            				<div class="CommentInfo">
			            					<a href="javascript:;" class="name"> <strong>{{ $student->staff_name }}</strong> </a>
				            				<span class="studentInfoCom"><span class="grayish">Student Name:</span> {{ $student->abridged_name }} </span>
                                            <span class="studentInfoCom"><span class="grayish">GS-ID:</span> {{ $student->gs_id }} </span>
                                            <span class="body"><span class="grayish">Comment:</span> {{ $student->comments }} <br> </span>
                                            <?php $tags =  explode(',', $student->tag); $c_tags =  explode(',', $student->communication_tag); ?>
                                                @foreach ($tags as $tag)
                                                <span class="commentCat TPA Confirmed "> {{ $tag }} </span>
                                                @endforeach
                                                @foreach ($c_tags as $tag)
                                                <?php if($tag != '') { ?>
                                                    <span class="commentCat communicationCat TPA Confirmed "> {{ $tag }} </span>
                                                <?php } ?>
                                                @endforeach
				            				<br>                                            
				            				<span class="commentDate"> {{ $student->date_time }} </span>
			            				</div>
			            			</div>
			                	</li>


                                @else
                                <li class="out" data-filters="User Generated" data-category="Accounts">
                                    <img class="avatar" alt="" src="{{ $student->photo150 }}">
                                    <div class="message"><span class="arrow"> </span>
                                        <div class="CommentInfo">
                                            <a href="javascript:;" class="name"> <strong>{{ $student->staff_name }}</strong> </a>
                                            <span class="studentInfoCom"><span class="grayish">Student Name:</span> {{ $student->abridged_name }} </span>
                                            <span class="studentInfoCom"><span class="grayish">GS-ID:</span> {{ $student->gs_id }} </span>
                                            <span class="body"> {{ $student->comments }} <br> </span>
                                            <?php $tags =  explode(',', $student->tag); $c_tags =  explode(',', $student->communication_tag); ?>
                                                @foreach ($tags as $tag)
                                                <span class="commentCat TPA Confirmed "> {{ $tag }} </span>
                                                @endforeach
                                                @foreach ($c_tags as $tag)
                                                <?php if($tag != '') { ?>
                                                    <span class="commentCat communicationCat TPA Confirmed "> {{ $tag }} </span>
                                                <?php } ?>
                                                @endforeach
                                            <br> 
                                            <span class="commentDate"> {{ $student->date_time }} </span>
                                        </div>
                                    </div>
                                </li>
                                @endif
			                	
                                @endforeach
								
								
								


                                <?php /*
		                		<li class="in" data-filters="System" data-category="TPA Confirmed "><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/899.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Erum Naz</strong> </a><span class="body"> Attendance Confirmed By CT Mon Nov 6, 2017 <br> Date Mon Nov 6, 2017 </span><span class="commentCat TPA Confirmed "> TPA Confirmed </span><br> <span class="commentDate"> Mon Nov 06, 2017 at 08:42 AM</span></div></li><li class="in" data-filters="System" data-category="Attendance"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Attendance Tap IN</strong> </a><span class="body"> Tap IN on <u>Mon Nov 6, 2017</u> <br> at <u>08:00 AM</u> </span><span class="commentCat Attendance"> Attendance</span><br> <span class="commentDate"> Mon Nov 06, 2017 at 08:00 AM</span></div></li><li class="in" data-filters="System" data-category="Attendance"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Attendance Tap IN</strong> </a><span class="body"> Tap IN on <u>Fri Nov 3, 2017</u> <br> at <u>07:50 AM</u> </span><span class="commentCat Attendance"> Attendance</span><br> <span class="commentDate"> Fri Nov 03, 2017 at 07:50 AM</span></div></li><li class="in" data-filters="System" data-category="TPA Confirmed "><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/899.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Erum Naz</strong> </a><span class="body"> Attendance Confirmed By CT Thu Nov 2, 2017 <br> Date Thu Nov 2, 2017 </span><span class="commentCat TPA Confirmed "> TPA Confirmed </span><br> <span class="commentDate"> Thu Nov 02, 2017 at 08:40 AM</span></div></li><li class="in" data-filters="System" data-category="Attendance"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Attendance Tap IN</strong> </a><span class="body"> Tap IN on <u>Thu Nov 2, 2017</u> <br> at <u>07:58 AM</u> </span><span class="commentCat Attendance"> Attendance</span><br> <span class="commentDate"> Thu Nov 02, 2017 at 07:58 AM</span></div></li><li class="in" data-filters="System" data-category="Attendance"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Attendance Tap IN</strong> </a><span class="body"> Tap IN on <u>Wed Nov 1, 2017</u> <br> at <u>07:53 AM</u> </span><span class="commentCat Attendance"> Attendance</span><br> <span class="commentDate"> Wed Nov 01, 2017 at 07:53 AM</span></div></li><li class="in" data-filters="System" data-category="Attendance"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Attendance Tap IN</strong> </a><span class="body"> Tap IN on <u>Tue Oct 31, 2017</u> <br> at <u>07:54 AM</u> </span><span class="commentCat Attendance"> Attendance</span><br> <span class="commentDate"> Tue Oct 31, 2017 at 07:54 AM</span></div></li><li class="in" data-filters="System" data-category="SMS"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Text Message</strong> </a><span class="body"> [GS Invitation] Come explore higher education prospects under one roof at Education Fair 2017 on Wed, Nov 1 @ Generation's South Campus 9:30 am - 12:00 noon. </span><span class="commentCat SMS"> SMS</span><br> <span class="commentDate"> Mon Oct 30, 2017 at 03:31 PM</span></div></li><li class="in" data-filters="System" data-category="TPA Confirmed "><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/899.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Erum Naz</strong> </a><span class="body"> Attendance Confirmed By CT Mon Oct 30, 2017 <br> Date Mon Oct 30, 2017 </span><span class="commentCat TPA Confirmed "> TPA Confirmed </span><br> <span class="commentDate"> Mon Oct 30, 2017 at 10:31 AM</span></div></li><li class="in" data-filters="System" data-category="Attendance"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Attendance Tap IN</strong> </a><span class="body"> Tap IN on <u>Mon Oct 30, 2017</u> <br> at <u>07:58 AM</u> </span><span class="commentCat Attendance"> Attendance</span><br> <span class="commentDate"> Mon Oct 30, 2017 at 07:58 AM</span></div></li><li class="in" data-filters="System" data-category="Attendance"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Attendance Tap IN</strong> </a><span class="body"> Tap IN on <u>Thu Oct 26, 2017</u> <br> at <u>08:06 AM</u> </span><span class="commentCat Attendance"> Attendance</span><br> <span class="commentDate"> Thu Oct 26, 2017 at 08:06 AM</span></div></li><li class="in" data-filters="System" data-category="SMS"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Text Message</strong> </a><span class="body"> [GS Invitation] You are invited to GET '17 - Exhibition of Innovation - Thu Oct 26 at 10:00 am @ Generation's South Campus. Pls bring Family SmartCard. </span><span class="commentCat SMS"> SMS</span><br> <span class="commentDate"> Wed Oct 25, 2017 at 04:04 PM</span></div></li><li class="in" data-filters="System" data-category="Attendance"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Attendance Tap IN</strong> </a><span class="body"> Tap IN on <u>Wed Oct 25, 2017</u> <br> at <u>07:53 AM</u> </span><span class="commentCat Attendance"> Attendance</span><br> <span class="commentDate"> Wed Oct 25, 2017 at 07:53 AM</span></div></li><li class="in" data-filters="System" data-category="Attendance"><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/gs_logo.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Attendance Tap IN</strong> </a><span class="body"> Tap IN on <u>Wed Oct 25, 2017</u> <br> at <u>07:53 AM</u> </span><span class="commentCat Attendance"> Attendance</span><br> <span class="commentDate"> Wed Oct 25, 2017 at 07:53 AM</span></div></li><li class="in" data-filters="System" data-category="TPA Confirmed "><img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/899.png"><div class="message"><span class="arrow"> </span><a href="javascript:;" class="name"> <strong>Erum Naz</strong> </a><span class="body"> Attendance Confirmed By CT Thu Oct 12, 2017 <br> Date Thu Oct 12, 2017 </span><span class="commentCat TPA Confirmed "> TPA Confirmed </span><br> <span class="commentDate"> Thu Oct 12, 2017 at 08:46 AM</span></div></li>
                                */ ?>

                                </ul>
								<input type="hidden" name="LoadMore_E" id="LoadMore_E" value="<?=$Stories_limit;?>" />
								<input type="hidden" name="LoadMore_E_Student_id" id="LoadMore_E_Student_id" value="0" />
								
								<a href="#" id="loadMore">Load More</a> 


                        </div> 

                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
	
	
	
</div><!-- row -->
<!-- End content section -->

<style>



#loadMore {
    padding: 10px;
    text-align: center;
    background-color: #33739E;
    color: #fff;
    border-width: 0 1px 1px 0;
    border-style: solid;
    border-color: #fff;
    box-shadow: 0 1px 1px #ccc;
    transition: all 600ms ease-in-out;
    -webkit-transition: all 600ms ease-in-out;
    -moz-transition: all 600ms ease-in-out;
    -o-transition: all 600ms ease-in-out;
}
#loadMore:hover {
    background-color: #fff;
    color: #33739E;
}

.mt-checkbox, .mt-radio {
    margin-bottom: 8px !important;
}
.theme-option .mt-checkbox {
    margin-right: 20px;
}
h4.bbottom {
	padding-bottom: 7px;
	 border-bottom:1px solid #ccc;	
}
.dropdown-menuu {
	    background: #fafafa;
    position: absolute;
    width: 270px;
    border: 1px solid #999;
    right: 0px;
    top: 33px;
    z-index: 999999;
    height: 220px;
    padding: 5px 16px;
    box-shadow: 1px 1px 4px #000;
    overflow-y: scroll;
}
.theme-panel>.theme-options4>.theme-option>select.form-control {
    width: 241px !important;
}
.theme-panel>.toggler4, .theme-panel>.toggler4-close {
    padding: 17px !important;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    top: 3px !important;
    cursor: pointer;
}
.theme-panel>.theme-options4 {
    top: 36px !important;
}
.commentType {
	right: 164px;
    position: absolute;
}
.inputs {
	position:relative;	
}
.pull-left.commentButton {
    position: absolute;
    top: 97px;
    right: 75px;
}
.border0 {
	border: 0 none;	
}
.rightpullAbsolutes {
	    float: right;
    margin-top: -34px;	
}
.width100 {
	width:100%;	
}
.width78 {
	width: 93%;
    padding-right: 185px;	
}
.portlet-body .nav-tabs>li>a {
    padding: 10px 12px !important;
}
.dropdown-menu-right, .dropdown-menu.pull-right {
    left: auto;
    right: 0px;
    top: 24px;
}
.chat-form {
    margin-top: 15px;
    padding: 10px;
    background-color: #e9eff3;
    overflow: visible;
    clear: both;
    float: left;
    width: 100%;
    margin-bottom: 20px;
}
.md-radio {
    position: relative;
    margin: 11px 9px;
}
.md-radio label>span.inc {
    display:none;   
}
.back-to-top {
    cursor: pointer;
    position: fixed;
    bottom: 20px;
    right: 20px;
    display:none;
}
</style>

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">
    
//$('#studentCateo').multiselect({ numberDisplayed: 1 });
//$('#studentComCateo').multiselect({ numberDisplayed: 1 });

//$('#StaffView_Filter_Grade').multiselect({ numberDisplayed: 1 });
// $('#StaffView_Filter_Gender').multiselect({ numberDisplayed: 1 });
// $('#StaffView_Filter_House').multiselect({ numberDisplayed: 1 });
// $('#StaffView_Filter_Badges').multiselect({ numberDisplayed: 1 });




   //Assign table rows to tableRecords
   var tableRecords = $('#staffView_Table_StaffList').find('.Row');
   
   //Multi Filter prototype
   String.prototype.replaceAll = function(search, replacement) {
       var target = this;
       return target.replace(new RegExp(search, 'g'), replacement);
   };
   
   //Add css class selected when click on table row
   $("tbody tr").click(function() {
	$(this).addClass('selected').siblings().removeClass("selected");
   });
   
   

$(function() { $('.multiselect').multiselect({ includeSelectAllOption: true }); });

/***** BEGIN - Search Result Highlight Function *****
* Author: Atif Naseem (Thu Jul 20, 2017)
* Email: atif.naseem22@gmail.com
* Cel: +92-313-5521122
* Description: Highlight all the search text
*              in table columns.
****************************************************/

var stories_limit = 30;



$('.toggler3').show();
$('.toggler3-close').hide();
$('.theme-panel > .theme-options2').hide();
$('#staffView_StaffList_Search').val('');

$('.toggler2').show();
$('.toggler2-close').hide();
$('.theme-panel > .theme-options2').hide();
$('#staffView_StaffList_Search').val('');

$(document).on("click", ".show_addstory_modal", function (e) {
    e.preventDefault();
    var GSID = $(this).data('id');
    var aName = $(this).data('aname');


    $.get("{{url('/student/add_story')}}?gs_id="+GSID+"&abridged_name="+aName, function(data) {
        $('#Add_call_story .modal-body').html(data);
		
		$('#Dropdown_Comment_Category').multiselect();
		$('#Dropdown_Comm_Category').multiselect();
    });

    $('#Add_call_story').modal('show');
});


$(document).on("click", "#add_badge", function (e) {
    var GSID = $('#Add_call_story .modal-body #student_gsid').val();
    var StudentName = $('#Add_call_story .modal-body #student_name').val();
	var comments = $('#Add_call_story .modal-body #comments').val();
    var date_time = $('#Add_call_story .modal-body #date_time').val();
	
    var comments_cat = '';
	comments_cat = $('#Add_call_story .modal-body #Dropdown_Comment_Category').val();
	var communication_cat = '';
	
	communication_cat = $('#Add_call_story .modal-body #Dropdown_Comm_Category').val();
	
	
	
	//var date_time ='';
	
	 
	var abridged_name_staff = $('#abridged_name_staff').val();
	
	var photo500_staff = $('#photo500_staff').val(); // gpj
	var photo150_staff = $('#photo150_staff').val(); // png
	
	
var Family_State = 0;
var State = $('#switchChange2').bootstrapSwitch('state');
if(State)
{
	Family_State=1;
}
	

var values = [];
var ch=0;
var cat_tag = '';


var values2 = [];
var chck=0;
var comm_tag = '';


if( comments_cat != '' ) 
{
	var comments_cat = comments_cat.toString();
if (comments_cat.indexOf(',') == -1 ) { 
	values.push( comments_cat );
	cat_tag += '<span class="commentCat TPA Confirmed ">'+comments_cat+'</span>';
}else 
{
	var  arr = comments_cat.split(",");
	$.each(arr,function(indx,val){	
		values.push(val);
		cat_tag += '<span class="commentCat TPA Confirmed ">'+val+'</span>';
	});

}
}


if( communication_cat != '' ) 
{
	var communication_cat = communication_cat.toString();
	
	if (communication_cat.indexOf(',') == -1 ) { 
		values2.push( communication_cat );
		comm_tag += '<span class="commentCat TPA Confirmed ">'+communication_cat+'</span>';
	}else 
	{
		var  arr2 = communication_cat.split(",");
		$.each(arr2,function(indx,val){	
			values2.push(val);
			comm_tag += '<span class="commentCat TPA Confirmed ">'+val+'</span>';
		});

	}

}

/*


$('input[name^="Comment_Cat"]').each(function(i) {
	if( $(this).is(':checked') )
	{
		
		values.push( $(this).val() );
		cat_tag += '<span class="commentCat TPA Confirmed ">'+$(this).val()+'</span>';
		ch=1;
	}
});



var values2 = [];
var chck=0;
var comm_tag = '';
$('input[name^="Cmm_Cat"]').each(function(i) {
	if( $(this).is(':checked') )
	{
		values2.push($(this).val() );
		comm_tag += '<span class="commentCat TPA Confirmed ">'+$(this).val()+'</span>';
		chck=1;
	}
});*/






    App.startPageLoading();






    $.ajax({
        type:"POST",
        cache:true,
        url:"{{url('/student/add_story_db')}}",
        data:{
            gs_id:GSID,comments:comments, comments_cat: values, communication_cat:values2,Family_State:Family_State,
            "_token": "{{ csrf_token() }}",
        },
        success:function(result)
		{
			App.stopPageLoading();
			
			var html = '<li class="out" data-filters="User Generated" data-category="comments_cat">';
			html += '<img class="avatar" alt="" src="'+photo150_staff+'">';
			html += '<div class="message">';
			html += '<span class="arrow"> </span>';
			html += '<div class="CommentInfo">';
			html += '<a href="javascript:;" class="name"> <strong> '+abridged_name_staff+' </strong> </a><span class="studentInfoCom"><span class="grayish">Student Name:</span>'+StudentName+'</span><span class="studentInfoCom"><span class="grayish">GS-ID:</span>'+GSID+'</span><span class="body">'+comments+'<br></span>';
			html += cat_tag;
			html += comm_tag +'<br />';
			html += '<span class="commentDate">'+date_time+'</span>';
			html += '</div></div></li>';
			$('#Stories_Chats').prepend(html);
			$('#Add_call_story').modal('hide');
        },
        error: function(xhr, status, error) 
		{
          var err = eval("(" + xhr.responseText + ")");
          App.stopPageLoading();
          alert(err.Message);
        },
        
        complete: function() {
            App.stopPageLoading();
        
        }
        
    });
});



$("#Stories_Chats").scroll(function() {
    if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
        alert('Yes');
    } else {
        alert('No');
    }
});

$(window).scroll(function() {
	
    if($(window).scrollTop() == $(document).height() - $(window).height()) {

            App.startPageLoading();
			
            stories_limit = ( stories_limit + 30 );
            
			
            $.ajax({
                type:"POST",
                cache:true,
                url:"{{url('/student/add_more_story')}}",
                data:{
                    stories_limit:stories_limit,
                    "_token": "{{ csrf_token() }}",
                },
                success:function(result){
                    App.stopPageLoading();
                    $('#Stories_Chats').append(result);
                },
                error: function(xhr, status, error) {
                  var err = eval("(" + xhr.responseText + ")");
                  App.stopPageLoading();
                  alert(err.Message);
                },
                /***** Further Requests of AJAX *****/
                complete: function() {
                    App.stopPageLoading();
                    //me.data('studentView_studentinfo_AddStory', true);
                }
                /***** Stop Further Request of AJAX *****/
            });

            new_element.hide().appendTo('#Stories_Chats').fadeIn();
            $(window).scrollTop($(window).scrollTop()-1);
    }
});



$(document).ready(function(){
    $('.LeftBrowseStudents').append('<div id="toTop" class="btn btn-info"><span class="glyphicon glyphicon-chevron-up"></span> Back to Top</div>');
    $(".LeftBrowseStudents").scroll(function () {
        if ($(this).scrollTop() != 0) {
            //alert("Hellow World");
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    }); 
    $('#toTop').click(function(){
        $(".LeftBrowseStudents").animate({ scrollTop: 0 }, 600);
        return false;
    });

    //$('.StudentRightView').append('<div id="toTop2" class="btn btn-info"><span class="glyphicon glyphicon-chevron-up"></span> Back to Top</div>');
    //$(".StudentRightView").scroll(function () {
    //    if ($(this).scrollTop() != 0) {
    //        //alert("Hellow World");
    //        $('#toTop2').fadeIn();
    //    } else {
    //        $('#toTop2').fadeOut();
    //    }
    //}); 
    //$('#toTop2').click(function(){
    //   $(".StudentRightView").animate({ scrollTop: 0 }, 600);
    //    return false;
    //});
});


function useNthColumn(n,dropDownType) {

   var data = [],
       i,
       yourSelect,
       unique;

   $("#staffView_Table_StaffList tr td:nth-child("+n+")").each(function () {
        data.push($(this).text());           
   });

   unique = data.filter(function(item, i, arr) {
       return i == arr.indexOf(item);
   });

   yourSelect = $('#'+dropDownType);
   //yourSelect.append("<option value='0'>[Select]</option>");
   for (i = 0; i < unique.length; i += 1) {
        yourSelect.append("<option value="+unique[i]+">"+unique[i]+"</option>");
   }
}

useNthColumn(7,'StaffView_Filter_Badges');
useNthColumn(6,'StaffView_Filter_House');
useNthColumn(10,'StaffView_Filter_Grade');
//useNthColumn(15,'StaffView_Filter_Campus');

var clearStaffInfo = function() {
    $('.profile-userpic img').attr("src", '');
    $('.profile-usertitle-name').text('');
    $('.profile-usertitle-job').text('');
    $('.profile-usertitle-gtid').text('');
    $('.profile-usertitle-email').text('');
    $('.profile-usertitle-campus').text('');
    $('.profile-usertitle-mobilePhone').text('');

    /***** TIF-B: Personal Info *****/
    $('.tifb-basics-fullName').html('');
    $('.tifb-basics-religion').html('');
    $('.tifb-basics-gender').html('');
    $('.tifb-basics-maritalStatus').html('');
    $('.tifb-basics-nic').html('');
    $('.tifb-basics-nationality').html('');
    $('.tifb-basics-dob').html('');

    /***** TIF-B: Contact Info *****/
    $('.tifb-basics-mobilePhone').html('');
    $('.tifb-basics-landLine').html('');
    $('.tifb-basics-personalEmail').html('');

    /***** TIF-B: Address Info ****/
    $('.tifb-basics-apartmentNo').html('');
    $('.tifb-basics-buildingName').html('');
    $('.tifb-basics-region').html('');
    $('.tifb-basics-streetName').html('');
    $('.tifb-basics-plotNo').html('');
    $('.tifb-basics-subRegion').html('');

    /***** TIF-B: Official Info ****/
    $('.tifb-basics-nameCode').html('');
    $('.tifb-basics-empStatus').html('');




    /***** TIF-A: Clear All ****/
    $('#tab_1_2').html('');
};







var pagefunction = function() {
    
    Demo.init();
    App.init();
    var table = $('#Badge_Student_List');
    // begin first table
	
    table.dataTable({
        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
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
            "search": "Search:",
            "zeroRecords": "No matching records found",
               "paginate": {
                   "previous":"Prev",
                   "next": "Next",
                   "last": "Last",
                   "first": "First"
              }
            },

          "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            "lengthMenu": [
                [8, 15, 20, -1],
                [8, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 8,            
            "pagingType": "bootstrap_full_number",
            "columnDefs": [
                {  // set default column settings
                    'orderable': false,
                    'targets': [0]
                }, 
                {
                    "searchable": false,
                    "targets": [0]
                },
                {
                    "className": "dt-right", 
                    //"targets": [2]
                }
            ],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });


        
        var table = $('#Badge_Assigned_Student_List');

    // begin first table
    table.dataTable({
        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
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
            "search": "Search:",
            "zeroRecords": "No matching records found",
               "paginate": {
                   "previous":"Prev",
                   "next": "Next",
                   "last": "Last",
                   "first": "First"
              }
            },

          "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            "lengthMenu": [
                [8, 15, 20, -1],
                [8, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 8,            
            "pagingType": "bootstrap_full_number",
            "columnDefs": [
                {  // set default column settings
                    'orderable': false,
                    'targets': [0]
                }, 
                {
                    "searchable": false,
                    "targets": [0]
                },
                {
                    "className": "dt-right", 
                    //"targets": [2]
                }
            ],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });
        
        

    $('#staffView_StaffInfo').hide();

    /***** BEGIN - OnClick of Staff Name staffView_StaffName *****/
    
    

    
    $('.studentView_StudentName a').click(function(e) {
        
        e.preventDefault();
        
        var Active_tab = $('ul#credit').find('li.active').data('interest');
		App.startPageLoading();
        //$('#loadingText').html('<h1 class="ajax-loading-animation"><i class="fa fa-cog fa-spin"></i> Loading...</h1>');
       // $('#loadingText').delay(1000).hide(0);
        
        $('#StudentView_StuInfo').delay(1000).show(0);


        /***** Further Requests of AJAX *****/
        var me = $(this);
        if ( me.data('studentView_studentinfo_requestRunning') ) {
            return;
        }
        me.data('studentView_studentinfo_requestRunning', true);
        /***** Stop Further Request of AJAX **** //echo ASSETS_URL; */


       
        var d = $(this).prop("id");
        var sid = d.split("_");
        var Student_id = parseInt( sid[0] );
        var Gs_id = sid[1].toString();
       // alert(Student_id)
		
		$("#Student_id").val(0);
        $("#Student_id").val(Student_id);
				
        //var A_URL = "<?php echo url('/assets'); ?>";
        var A_URL = "<?php echo url('/'); ?>";
        $('.profile-userpic img').attr("src", "<?php echo url('/assets/img/loading.png'); ?>");
        
        if( Student_id > 0 ){
        $.ajax({
            type:"POST",
            cache:true,
            url:"{{url('/student/Students_Stories')}}",
            data:{
                Student_id:Student_id,Gs_id:Gs_id,Active_tab,Active_tab,
                "_token": "{{ csrf_token() }}",
            },
            success:function(result){
				App.stopPageLoading();
				
              
				//var data = jQuery.parseJSON(result);
				
				$("#Student_Nalo").html( result.abridged_name );
				
				$('#Stories_Chats li').remove(); // when referencing by id
				$("#Stories_Chats").append( result.Stories );
				
				$("#Student_id_comment").val( result.Student_id )
				$("#LoadMore_E_Student_id").val( result.Student_id )
				$("#LoadMore_E").val(30)
				
				$("#loadMore").show();
				$("#Back_To_Main").show();
				
            },
            /***** Further Requests of AJAX *****/
            complete: function() {
                me.data('studentView_studentinfo_requestRunning', false);
            }
            /***** Stop Further Request of AJAX *****/

        });
        }// end >0
    });
    /***** END - OnClick of Staff Name *****/    

   


$(document).on("click", "#Back_To_Main", function(){
	
	App.startPageLoading();
	
		$.ajax({
		type:"POST",
		cache:true,
		url:"{{url('/student/Stories_Back')}}",
		data:{
			"_token": "{{ csrf_token() }}",
		},
		
		success:function(r){
			$("#Student_Nalo").html('');
			$("#LoadMore_E_Student_id").val(0);
			$("#loadMore").show();
			$("#LoadMore_E").val(30)
			$('#Stories_Chats li').remove(); // when referencing by id
			$("#Stories_Chats").append( r.Stories );
			$("#Back_To_Main").hide();
			App.stopPageLoading();
		},
		error: function(xhr, status, error) {
		  var err = eval("(" + xhr.responseText + ")");
		  App.stopPageLoading();
		  alert(err.Message);
		},
		
		complete: function() {
			App.stopPageLoading();
			
		}
		
	});
	
	
});

$('#loadMore').click(function(e) {
	
e.preventDefault();
var Student_id = 0;
var Stories_limit = parseInt( $("#LoadMore_E").val());
Student_id = parseInt( $("#LoadMore_E_Student_id ").val());

var StoriesLimit = 0;
StoriesLimit = parseInt(Stories_limit + 30);



App.startPageLoading();

$("#LoadMore_E").val(StoriesLimit);

	$.ajax({
		type:"POST",
		cache:true,
		url:"{{url('/student/add_more_story')}}",
		data:{
			stories_limit:StoriesLimit,Student_id,Student_id,
			"_token": "{{ csrf_token() }}",
		},
		
		success:function(r){
			App.stopPageLoading();
			
			$('#Stories_Chats').append(r.h);
			
		},
		error: function(xhr, status, error) {
		  var err = eval("(" + xhr.responseText + ")");
		  App.stopPageLoading();
		  alert(err.Message);
		},
		
		complete: function() {
			App.stopPageLoading();
			
		}
		
	});
   

			


            
           
			
		
			

	
});





 $('#btn_Add_Comments').click(function(e) {
	 
	var Search_Area = $("#Search_Area").val();
	
	var userID = $("#Login_User").val(); // Current User
	
	

	
	var CBx_Family='';
	var CBx_Individual='';
	var CommentsType='';
	var CType='';
	
	var arrType=[];
	var indFam=[];
	
	/*if( $('#CheckBox_Family').is(':checked') ){
	var CBx_Family = $("#CheckBox_Family").val();
	indFam.push('I');
	}else{
		var CBx_Individual = $("#CheckBox_Individual").val();
	
	}
	
	if( $('#CheckBox_Individual').is(':checked') ){
		indFam.push('I');
	}else{
	
	}*/
	
	
	if( $('.bootstrap-switch-mini').hasClass('bootstrap-switch-on') ) {
	var CBx_Family = $("#CheckBox_Family").val();
		indFam.push('I');
	}else{
	var CBx_Individual = $("#CheckBox_Individual").val();
	indFam.push('I');
	}
	
	
	if( $('#CheckBox_SIS').is(':checked') ){
		var CheckBox_SIS = $("#CheckBox_SIS").val();
		CommentsType='SIS';
		CType='SIS';
		arrType.push('SIS');
	}else{
		var CheckBox_SIS = '';
		
	}
	
	if( $('#CheckBox_ETab').is(':checked') ){
		var CheckBox_ETab = $("#CheckBox_ETab").val();
		CommentsType='ETab';
		CType +=' E-TAB';
		arrType.push('Etab');
	}else{
		var CheckBox_ETab = '';
		
	}
	
	if( $('#CheckBox_Academic').is(':checked') ){
		var CheckBox_Academic = $("#CheckBox_Academic").val();
		CommentsType='Academic';
		CType +=' Academic';
		arrType.push('Academic');
	}else{
		var CheckBox_Academic = '';
	}
	
	if( $('#CheckBox_Finance').is(':checked') ){
		var CheckBox_Finance = $("#CheckBox_Finance").val();
		CommentsType='Accounts';
		CType +=' Acounts';
		arrType.push('Accounts');
	}else{
		var CheckBox_Finance = '';
	}
	
	var currentdate = new Date(); 
	var cday = addZero(currentdate.getDate());
	var m = addZero(currentdate.getMonth()+1);
	var y=addZero(currentdate.getFullYear());
	var h= addZero(currentdate.getHours());
    var mn = addZero(currentdate.getMinutes());
	var s = addZero(currentdate.getSeconds());
	var cur_date = y+"-"+m+"-"+cday;
	var cur_time = h+":"+mn+ " "+s;
	
	
		var today = new Date().toLocaleDateString('en-US', {
			weekday : 'short',
			day : '2-digit',
			month : 'short',
			year : 'numeric',
			hour: '2-digit',
			minute: '2-digit'
			//second: '2-digit'
			//timeZoneName:"short"
		});

		//alert(today)
		var w = today.split(",");
		
		var weekday = w[0];
		var md = w[1];
		var yea = w[2];
		var t = w[3];
		
		var full_date = weekday+" "+md+"," +" "+yea+" "+t;
		
	
	
	var Stories_Chats = $("#Stories_Chats");
	
	if( ( Search_Area != '' ) && ( arrType.length > 0 ) && (indFam.length >0) ){
		
		$("#Error_Commenting").hide();
		
		$("#commentType .dropdown-menuu").hide();
		$("#commentType .hide_hide").hide();
		$("#commentType .show_show").show();
		
		App.startPageLoading();

		var Current_user_photo = $("#Current_user_photo").val();
		var User_abridged_name = $("#User_abridged_name").val();
		var arr = [];
		$.each(arrType,function(i,v){
		arr.push(v);	
		});	
		var Tag_Category = arr.join(", ");
		var html = '<li class="out">';
		html +='<img class="avatar" alt="" src="{{STAFF_PIC_150}}'+Current_user_photo+'{{STAFF_PIC150_TYPE}}" />';
		html +='<div class="message">';
		html +='<span class="arrow">';
		html +='</span>';
		html +='<a href="javascript:;" class="name">';
		html +='<strong>';
		html += User_abridged_name;
		html +='</strong>';
		html +='</a>';
		/*html +='<span class="datetime"> on <strong>'+full_date+'</strong> </span>';*/
		html +='<span class="body">'+ Search_Area+'</span>';
		
		$.each(arr,function(i,value){
			html +='<span class="commentCat '+value+'"> '+value+' </span>';	
		});	
		
		html +='<br /> <span class="commentDate">'+full_date+'</span>';
	
		
		html +='</div></li>';
		
		setTimeout(function(){ Stories_Chats.prepend(html); },1000);
		



		$("#Search_Area").val('')
		
	setTimeout(function(){ App.stopPageLoading(); },3000);
		$.ajax({
			type: "POST",
			cache:true,
			url:"{{url('/student/post_comments')}}",
			data:{
			CBx_Family:CBx_Family,Gs_id:CBx_Individual,CommentsType:CommentsType,CType:CType,Comments:Search_Area,arrType:arrType,
			"_token": "{{ csrf_token() }}",
			},
			dataType: "JSON",
			beforeSend: function(){},
			success: function(res){
				
			}
		});
	
	}else{
		//$("#Error_Commenting").slideToggle().delay(3000).slideToggle();
		$("#Error_Commenting").show(0).delay(3000).hide(0);
		$("#Error_Commenting_1").html('');
		if( Search_Area == '' ){
			var Desc = "Please give few comments ";
			var Title = "Empty Comments";
			//Show_Toaster(Desc,Title);	
			$("#Error_Commenting_1").append('Warning!  Please fill comments box <br />');
		}
		
		if(arrType.length == 0){
			var Desc = "Please select at least one category";
			var Title = "Select Catogory";
			//Show_Toaster(Desc,Title);	
			$("#Error_Commenting_1").append('Warning!  Please select at least one category <br />');
		}
		
		if( indFam.length ==0 ){
			var Desc = "Please select at least one Comment for";
			var Title = "Select Comment for";
			//Show_Toaster(Desc,Title);	
			$("#Error_Commenting_1").append('Warning!  Please select Comment for <br />');
		}
		
	}

});

function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}



    /***** BEGIN - on Tab Change *****/
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var selectedTab = $.trim($(e.target).text()); // activated tab
        var GTID = $('.profile-usertitle-gtid').html().substr(0, 6); // getting staff GT-ID

        if(selectedTab === 'TIF-A'){
            get_Staff_TIFA(GTID);
        }if(selectedTab === 'TIF-B'){
            get_Staff_TIFB(GTID);
        }
    });
    /***** END - on Tab Change *****/

    





    // $('#staffView_Table_StaffList').filterTable({
    //     inputSelector: '#staffView_StaffList_Search',
    //     ignoreColumns: [0, 2, 3],
        
    //     timeout : -1,
    //     notFoundElement : function(){
    //         //$("#LastRow").show();
    //         alert( ".not-found" ) 
            
    //     },
    //     callback: function() {
    //         var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
    //         $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
            
    //         //highlightSearchResult();
    //         //$('.tooltips').tooltip();
    //         //$('.popovers').tip().html(r);
    //             if( totalRow == 0 ){
    //             $("#LastRow").show();
    //             }else{ 
    //             $("#LastRow").hide();
    //             }
    //     }
        
    // });

    
    var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
    $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);             
    


    
    $("#sparkline_bar").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12], {
        type: 'bar',
        width: '100',
        barWidth: 5,
        height: '55',
        barColor: '#f36a5b',
        negBarColor: '#e02222'
    });

    $("#sparkline_bar2").sparkline([9, 11, 12, 11, 12, 10, 10, 14, 12, 11, 11, 12], {
        type: 'bar',
        width: '100',
        barWidth: 5,
        height: '55',
        barColor: '#5c9bd1',
        negBarColor: '#e02222'
    });



    /*
    * Function Name : multiFilter
    * Description:  Multiple select checkbox filter function used to filter data on table using multiple values from one or more select checkboxes
    */
    var multiFilter = function multiFilter(){

    var ddlFilterTableRow = $('select.ddlFilterTableRow');
   
   
       ddlFilterTableRow.attr('disabled', 'disabled');
   
       var records = $('#staffView_Table_StaffList').find('.Row');
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
	
	$(document).on( "change", "#Multiple_Grade_id", 
		function()
		{
			var Grade_id = $(this).val();
			var Multiple_Section_id = $("#Multiple_Section_id");
			
			$.ajax({
				type:"POST",
				url:"{{url('/student/Get_Section')}}",
				beforeSend: function(){ $("#Waiting_For_Loading").show(); },
				data: { Grade_id:Grade_id, "_token": "{{ csrf_token() }}",  },
				success:function(res){ 
					$('#Multiple_Section_id').empty();
					$('#Multiple_Section_id').multiselect('destroy');
					$.each(res.Section_id, function(index,value){
						$('#Multiple_Section_id').append("<option value=\"" + value.Section_id + "\">" + value.Section_name + "</option>");
					});
					$('#Multiple_Section_id').multiselect();
					
				},
				complete:function(){}
			});
	
		}
	);
	

    /***** BEGIN - Apply filter searching *****/
    $('#staffView_filter_btn .applyFilter').click(function() {
        
        //var filterProfile = $('#StaffView_Filter_Profile').val() // Grade id
        // var filterDepartment = $('#StaffView_Filter_Department').val() // Status
        
        // var filterAtdStatus = $('#StaffView_Filter_Campus_House').val(); // house
        // var StaffView_Filter_Badges = $('#StaffView_Filter_AtdStd').val(); // Badges


        $('#staffView_Table_StaffList tr').show();
       var table = $("#staffView_Table_StaffList");
       // var tr = table.getElementsByTagName("tr");
        var tr = $('#staffView_Table_StaffList > tbody  > tr');
        
        
       multiFilter();
		
		
	/*	var fruitvegbasket = [];
		var str='';

		$('#Multiple_Grade_id.ddlFilterTableRow').each(function () {
			if( $(this).val() != '' )
				str=$(this).val();
        });
		
		if( str != '' && str != null ){
			var lines =  str.toString().split(",");
			$.each(lines, function(key, line) {
				fruitvegbasket.push( line );
			});
		}
		
		// 
		
		var fruitvegbasket_h = [];
		var str_h='';
		
		$('#Multiple_Grade_id_h.ddlFilterTableRow').each(function () {
			if( $(this).val() != null )
				str_h=$(this).val();
        });
		
		if( str_h != '' && str_h != null ){
			
			var lines_h =  str_h.toString().split(",");
			$.each(lines_h, function(key, line) {
				fruitvegbasket_h.push( line );
			});
		}
		
		var Gender = $('#StaffView_Filter_Gender').val(); // Gender
		
		
			
//alert( fruitvegbasket_h ); // ok he



         for (i = 0; i < tr.length; i++) 
		 {
			 

		 
         
			
		
		 
             
			   

            
           if( str != null && fruitvegbasket.length > 0 ){
                 var td = tr[i].getElementsByTagName("td")[4];
                 if(td){
					if ( $.inArray(td.innerHTML, fruitvegbasket) != '-1') {	   
						tr[i].style.display = "";
					}else{
						tr[i].style.display = "none";
					}
				  
                }                
             }


             if( str_h != null && fruitvegbasket_h.length > 0 ){
                var td = tr[i].getElementsByTagName("td")[5];
				if ( td ) 
				{
					
					if ( $.inArray(td.innerHTML, fruitvegbasket_h) != '-1' ) 
					{
						tr[i].style.display = "";
                    } else 
					{
						tr[i].style.display = "none";
					}
					
                 }
             } 
			 
			 //  // Gender
            if(Gender != null ) {
				var td = tr[i].getElementsByTagName("td")[6];
                if (td) 
				{
                   if ( td.innerHTML.toLowerCase().indexOf( Gender.toLowerCase() ) > -1 ) 
				   {
                      tr[i].style.display = "";
					} 
					else 
					{
						tr[i].style.display = "none";
                    }
                  
                  
                }
             }




            
            
            
            
            
         } 

*/

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
    /***** END - Apply filter searching *****/
    
    
    
    
    
    
        /***** BEGIN - Apply filter searching *****/
//$('#staffView_search_btn .applySearch').click(function() {
$(document).on("click", ".applySearchs", function(){
    
        
        var By_Name                     = $('#Sort_By_Name').val();
       // var By_Department_Name          = $('#Sort_By_Department_Name').val();
      //  var By_Attendance_Score         = $('#Sort_By_Attendance_Score').val();
        //$('#staffView_Table_StaffList tr').show();
        //var tr = $('#staffView_Table_StaffList > tbody  > tr');
        
    
       if(By_Name != null){
            if(By_Name === 'Ascending_order'){
                sortTable(4,4);
            }else if(By_Name === 'Descending_order'){
                sortTable(-4,4);
            }
        }
        
        /*if(By_Department_Name != null){
            if(By_Department_Name === 'Ascending_order'){
                sortTable(1,9);
            }else if(By_Department_Name === 'Descending_order'){
                sortTable(-1,9);
            }
        }*/
        
        // if(By_Attendance_Score != null){
        //     if(By_Attendance_Score === 'High_to_Low'){
        //         sortTable(-1,14);
        //     }else if(By_Attendance_Score === 'Low_to_High'){
        //         sortTable(1,14);
        //     }
        // }



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
    /***** END - Apply filter searching *****/
    
    




    /***** BEGIN - Cancel filter searching *****/
    $('#staffView_filter_btn .clearFilter').click(function() {
       
        $('#StaffView_Filter_Gender').val('');
        

        $('#staffView_StaffList_Search').val('');
        $('#staffView_Table_StaffList tr').show();

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
		
		
		
		//Deselect all if selected 
		$('#Multiple_Grade_id').multiselect("deselectAll", false).multiselect("refresh");
		$('#Multiple_Section_id').multiselect("deselectAll", false).multiselect("refresh");
		$('#Multiple_Grade_id_h').multiselect("deselectAll", false).multiselect("refresh");
      
	  
		
		
		
    });
    /***** END - Cancel filter searching *****/
    var sortTable = function (f,n){
        var rows = $('#staffView_Table_StaffList tbody  tr').get();
        
       
        rows.sort(function(a, b) {

            var A = getVal(a);
            var B = getVal(b);

            if(A < B) {
                return -1*f;
            }
            if(A > B) {
                return 1*f;
            }
            return 0;
        });

        function getVal(elm){
            var v = $(elm).children('td').eq(n).text().toUpperCase();
            if($.isNumeric(v)){
                v = parseInt(v,10);
            }
            return v;
        }

        $.each(rows, function(index, row) {
            $('#staffView_Table_StaffList').children('tbody').append(row);
        });
    }
 /***** BEGIN - Apply Searching *****/
    $('#staffView_sort_btn .applySort').click(function() {

        $('.toggler').show();
        $('.toggler-close').hide();
        $('.theme-panel > .theme-options').hide();
        $('#staffView_StaffList_Search').val('');

        $('.toggler2').show();
        $('.toggler2-close').hide();
        $('.theme-panel > .theme-options2').hide();
        $('#staffView_StaffList_Search').val('');



        /**********************************
        * 0: Image
        * 1: Name and Card Bottom Line
        * 2: Attendance title and score
        * 3: Name Code
        * 4: GT-ID
        * 5: TT Profile Name
        * 6: Card Bottom Line (Department)
        * 7: Campus
        * 8: Attendance Title
        * 9: Abridged Name
		* 10:
        **********************************/
		
        var sortName = $('#StaffView_Sort_Name').find(":selected").val();
		
        if(sortName != null){
            if(sortName === 'A to Z'){
                sortTable(1,9);
            }else if(sortName === 'Z to A'){
                sortTable(-1,9);
            }
        }
        var sortDepartment = $('#StaffView_Sort_Department').find(":selected").val();
        if(sortDepartment != null){
            if(sortDepartment === 'A to Z'){
                sortTable(1,6);
            }else if(sortDepartment === 'Z to A'){
                sortTable(-1,6);
            }
        }
        var sortAtdScore= $('#StaffView_Sort_AtdScore').find(":selected").val();
        if(sortAtdScore != null){
            if(sortAtdScore === 'L to H'){
                sortTable(1,8);
            }else if(sortAtdScore === 'H to L'){
                sortTable(-1,8);
            }
        }
        

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
    });
    /***** END - Apply Searching *****/


    
$('#staffView_search_btn .clearSearch').click(function() {
   $('#StaffView_Sort_Name').val('');
        $('#StaffView_Sort_Department').val('');
        $('#StaffView_Sort_AtdScore').val('');
        
        $('#Sort_By_Name').val('');
        $('#Sort_By_Attendance_Score').val('');

        
        $('#staffView_StaffList_Search').val('');
        $('#staffView_Table_StaffList tr').show();

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
        
        
        
        
});

    /***** BEGIN - Cancel Searching *****/
    $('#staffView_sort_btn .clearSort').click(function() {
        
        $('#StaffView_Sort_Name').val('');
        $('#StaffView_Sort_Department').val('');
        $('#StaffView_Sort_AtdScore').val('');
        
        $('#Sort_By_Name').val('');
        $('#Sort_By_Attendance_Score').val('');

        $('#staffView_StaffList_Search').val('');
        $('#staffView_Table_StaffList tr').show();
        
        

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
    });
    /***** END - Cancel Searching *****/
  /* Staff List Left Section Scroll Header */
  
    $('.fixed-height-NoScroll').scroll(function() {
        var y = $(this).scrollTop();
        if (y >= 200) {
            $('.showOnlyOnScroll').fadeIn(); 
        } else {
            $('.showOnlyOnScroll').fadeOut();
        }
    });
    
    /* Staff Detail Right Section Scroll Header */
    $('#staffView_StaffInfo').scroll(function() {
        var y = $(this).scrollTop(); 
        if (y >= 100) {
            $('.headRightDetails').fadeIn(); 
        } else {
            $('.headRightDetails').fadeOut();
        }
    }); 
    
    

    
    /* Staff Detail Right Section Scroll Header */
    $('#StudentView_StuInfo').scroll(function() {
        var y = $(this).scrollTop(); 
        if (y >= 100) {
            //var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
            //$('.headTitle').text('STAFF LIST - ' + totalRow);
            $('.headRightDetails').fadeIn(); 
        } else {
            $('.headRightDetails').fadeOut();
        }
    });

$(document).on("click", "#Add_New_Badge_Form_btn", function(){
	$("#bookId").val(0);
	$("#basic_basic").modal("hide");
	$("#Add_New_Badge_Form_modal").modal("show");
});
$("#Add_Badge").click(function(e){ BadgesValidation(); });
$(document).on("click", ".Edit_Badge", function(){
	var Badge_Id = $(this).data("id");
	setTimeout(function(){ $("#basic_basic").modal("hide"); }, 3000);
	$("#bookId").val( Badge_Id );
	$.ajax({
		type:"POST",
		url:"{{url('/student/create/edit_badge')}}",
		beforeSend: function(){ $("#Waiting_For_Loading").show(); },
		data: { Badge_Id:Badge_Id, "_token": "{{ csrf_token() }}",  },
		dataType: "HTML",
		success:function(result){ $("#Edit_Badge_Form").html(result); },
		complete:function(){ }
	});
	setTimeout(function(){
		$("#Waiting_For_Loading").hide(); 
		Data_Table($('#Badge_Student_List2')); 
		$("#Edit_Badge_Form").modal("show");
	}, 3000);
});

$(document).on("click", ".Revert_Back", function(){
	$("#Add_New_Badge_Form_modal").modal("hide");
	$("#Edit_Badge_Form").modal("hide");
	$("#basic_basic").modal("show");
});	    
    
    var BadgesEditElement = function() {
        
        var form2 = $('#EditForm_Badges');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);
        
        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: 
			{
                Badge_Title: { required: true },
                Badge_Code: { required: true, },
                //Expiry_Date: { required: true,  },
            },

            invalidHandler: function (event, validator) 
			{ //display error alert on form submit              
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) 
			{ // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) 
			{ // hightlight error inputs
				$(element)
                .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

			unhighlight: function (element) { // revert the change done by hightlight
				 $(element)
					.closest('.form-group').removeClass('has-error'); // set error class to the control group
			},

              
			success: function (label, element) 
			{
				var icon = $(element).parent('.input-icon').children('i');
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
				icon.removeClass("fa-warning").addClass("fa-check");
			},
                submitHandler: function (form,element) {
                    var icon = $(element).parent('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");
                    success2.show();
                    error2.hide();
                    //form[0].submit(); 
                    var $form = $(form);
                    $.ajax({
                        type:"POST",
                        url:"{{url('/student/create/edit_badge_form')}}",
                        beforeSend: function(){ },
                        data: $form.serialize(),
                        dataType: "JSON",
                        success:function(result){
                        Reset_Fields();
                        },
                       
                    });
                    return false;
                }
            });

    }

    
    $(document).on("click","#Edit_Submit_btn", function(){
        BadgesEditElement();
    });
    
    
    /*function refreshStudentList()
    {
        
        $.ajax({
        type:"POST",
        cache:true,
        url:"{{url('/student/create/list_refresh')}}",
        data:{ "_token": "{{ csrf_token() }}", },
        dataType:"JSON",
        success:function(res)
        {
            var data = $.parseJSON(res);
            $('#container').fadeOut().html(data.html).fadeIn();    
        },
        });
        
    }*/
    
    
    $(document).on("click", ".Closed_Modal", function(){
        window.location.reload();
    });
    
    
	
function Search_Ul_Li(searchIDs) {
	

$('#Stories_Chats li').each(function(){
var category = $(this).data("category");

if( category== 'SIS' ||  category== 'Etab' || category== 'Accounts' || category== 'Academic' ){ $(this).show(); }else{ $(this).hide();}
	

});


}
$('#staffView_StaffList_Search_B').bind('keyup', function() {
   
    var searchString = $(this).val();

    $("ul li").each(function(index, value) {
        
        currentName = $(value).text()
        if( currentName.toUpperCase().indexOf(searchString.toUpperCase()) > -1) {
           $(value).show();
        } else {
            $(value).hide();
        }
        
    });
    
});
//Assign table rows to tableRecords
   var tableRecords = $('#staffView_Table_StaffList').find('.Row');
 $("#staffView_StaffList_Search").keyup(function(){
        
        var searchText = $("#staffView_StaffList_Search").val();

        //First letter of each word should be capital
        var arr = searchText.split(' ');
        var result = "";
        for (var x=0; x<arr.length; x++)
            result+=arr[x].substring(0,1).toUpperCase()+arr[x].substring(1)+' ';
        searchText = result.substring(0, result.length-1);

        $(tableRecords).each(function(){
            var lineStr = $(this).text();
            if( lineStr.indexOf(searchText) === -1 ){
                $(this).hide();
            } else {

                // //Get Html of profile_StaffName
                // var src_str = $(this).find('.profile_StaffName').html();
                // //Remove mark if html already contains
                // src_str = src_str.replace("<mark>", "" );
                // src_str = src_str.replace("</mark>", "" );
                // //Add mark on search words 
                // if(searchText !== ""){
                //     src_str = src_str.replace(searchText, "<mark>" + searchText + "</mark>");

                // }
                // //Update new html with mark on it
                // $(this).find('.profile_StaffName').html(src_str)               
                $(this).show();
            }
        });
        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow); 

    })
	
	
	
	$('#staffView_search_btn33 .applySearch').click(function() {
	
		
		var Sort_By_User='';
		
		var Student_id 			= $("#Student_id").val();
		var Gs_id 				= $("#Gs_id").val();
		var Sort_By_Source 		= $("#Sort_By_Source").val(); // Drop down user, system
		var Academic_id 		= $("#Academic_id").val();
        Sort_By_User        = $("#Sort_By_User").val();
		
		
		var LoadMore_E_Student_id        = $("#LoadMore_E_Student_id").val();
		
		if( LoadMore_E_Student_id > 0 )
		{
			$("#loadMore").hide();
		}else {
			$("#loadMore").show();
		}

		
        var Search_Cat_Finance = '';
        var Search_Cat_Academic = '';
        var Search_Cat_Etab = '';
        var Search_Cat_SIS = '';
        var Search_Cat_Family = '';
        var Search_Cat_SMS = '';
		var Search_Cat = $('input[name^="Search_Cat"]').serialize();
		if( $('#Search_Cat_Finance').is(':checked') ){ Search_Cat_Finance 	= $("#Search_Cat_Finance").val(); } else { Search_Cat_Finance =''; }
		if( $('#Search_Cat_Academic').is(':checked') ){ Search_Cat_Academic 	= $("#Search_Cat_Academic").val(); } else { Search_Cat_Academic =''; }
		if( $('#Search_Cat_Etab').is(':checked') ){ Search_Cat_Etab 	= $("#Search_Cat_Etab").val(); } else { Search_Cat_Etab =''; }
		if( $('#Search_Cat_SIS').is(':checked') ){ Search_Cat_SIS 	= $("#Search_Cat_SIS").val(); } else { Search_Cat_SIS =''; }
		if( $('#Search_Cat_Family').is(':checked') ){ Search_Cat_Family 	= $("#Search_Cat_Family").val(); } else { Search_Cat_Family =''; }
        if( $('#Search_Cat_SMS').is(':checked') ){ Search_Cat_SMS     = $("#Search_Cat_SMS").val(); } else { Search_Cat_SMS =''; }
		


        var Search_Cat_CommCall = '';
        var Search_Cat_CommSMS = '';
        var Search_Cat_CommWhatsapp = '';
        var Search_Communication_Whatsapp = '';
        var Search_Cat_CommWalkin = '';
        var Search_Communication = $('input[name^="Search_Communication"]').serialize();
        if( $('#Search_Cat_CommCall').is(':checked') ){ Search_Cat_CommCall   = $("#Search_Cat_CommCall").val(); } else { Search_Cat_CommCall =''; }
        if( $('#Search_Cat_CommSMS').is(':checked') ){ Search_Cat_CommSMS     = $("#Search_Cat_CommSMS").val(); } else { Search_Cat_CommSMS = ''; }
        if( $('#Search_Cat_CommWhatsapp').is(':checked') ){ Search_Cat_CommWhatsapp     = $("#Search_Cat_CommWhatsapp").val(); } else { Search_Cat_CommWhatsapp = ''; }
        if( $('#Search_Cat_CommWalkin').is(':checked') ){ Search_Cat_CommWalkin   = $("#Search_Cat_CommWalkin").val(); } else { Search_Cat_CommWalkin = ''; }




		var from_date = $("#from_date").val();
		var to_date	  = $("#to_date").val();
		
		$("#Filter_User_Comments .toggler4").hide();
		$("#Filter_User_Comments .theme-options4").show();
		$(".toggler4").show();
		$(".toggler4-close").hide();
		$(".theme-options4").hide();
		
		App.startPageLoading();
		
		setTimeout(function(){ 
			$("#Stories_Chats").html(''); 
		}, 1000);
		
		var checked = []
		$("input[name='Search_Cat[]']:checked").each(function ()
		{
			checked.push($(this).val());
		});

        var checked_comm = []
        $("input[name='Search_Communication[]']:checked").each(
			function ()
			{
			checked_comm.push($(this).val());
			}
		);
		
		

		if( Sort_By_Source == 'system')
		{
			Sort_By_User='';
		}
		

        //alert('Source: ' + Sort_By_Source + '  > User: ' + Sort_By_User + ' > Cat: ' + Search_Cat_Finance + ' > Comm: ' + Search_Communication_Call + ' > From: ' + from_date + ' > To: ' + to_date);

        
		if( Sort_By_Source != '' ){
			setTimeout(function(){
        		$.ajax({
        			type:"POST",
        			cache:false,
        			url:"{{url('/student/filter_story')}}",
        			data:{ 
        				stories_limit: 30,
        				Sort_By_Source:Sort_By_Source,
                        Sort_By_User:Sort_By_User,
        				Search_Cat_Finance:checked,
                        Search_Communication_Call:checked,
        				
        				from_date:from_date,
        				to_date:to_date,
						Student_id:LoadMore_E_Student_id,
        				"_token": "{{ csrf_token() }}", 
        			},
        			success:function(res){
                        
        				$(".toggler4").show();
        				$(".toggler4-close").hide();
        				$(".theme-options4").hide();
        				
        				$("#Stories_Chats").html('');
						$('#Stories_Chats li').remove();
        				$("#Stories_Chats").html(res);
						setTimeout(function(){ App.stopPageLoading(); }, 1000);
        			},
                });
    		
    		}, 2000);
    		
    		
		
		    
		
		}// end if
		
	});
    
	
	$('#staffView_search_btn33 .clearSearch').click(function() 
	{
		$("input[name='Search_Cat[]']:checked").each(function ()
		{
			$(this).attr("checked",false);
		});
        $("input[name='Search_Communication[]']:checked").each(function ()
        {
            $(this).attr("checked",false);
        });
		
		$("#from_date").val('');
		$("#to_date").val('');
		$("#Sort_By_Source").val('');
        $("#Sort_By_User").val('');
	}
	);

		$("#commentType .hide_hide").click(function(){
		$("#commentType .dropdown-menuu").hide();
		$("#commentType .hide_hide").hide();
		$("#commentType .show_show").show();
		
    });
	
    $("#commentType .show_show").click(function()
	{
		$("#commentType .dropdown-menuu").show();
		$("#commentType .hide_hide").show();
		$("#commentType .show_show").hide();
    }
	);
	

	
function Show_Toaster(Desc,Title)
{
	toastr.options = {
  "closeButton": true,
  "debug": false,
  "positionClass": "toast-top-center",
  "onclick": null,
  "showDuration": "1000",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
Command: toastr['warning'](Desc, Title)

}


};




var pagedestroy = function(){ }

loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){
                
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){
                     loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.min.js", function(){
                    
                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
					loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
					loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-toastr/toastr.min.js", function(){	
                            
                            loadScript("{{ URL::to('metronic') }}/global/plugins/jquery-validation/js/jquery.validate.min.js", function(){
                            loadScript("{{ URL::to('metronic') }}/global/plugins/jquery-validation/js/additional-methods.min.js", function(){
                                    
                                    loadScript("{{ URL::to('metronic') }}/global/plugins/select2/js/select2.full.min.js", function(){
                                        loadScript("{{ URL::to('metronic') }}/pages/scripts/components-select2.min.js", function(){
                            // loadScript("{{ URL::to('metronic') }}/pages/scripts/form-validation.min.js", function(){
							loadScript("{{ URL::to('metronic') }}/pages/scripts/ui-toastr.min.js", function(){
                                
                                loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
									
                                    loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
                                        loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction);
                                    });
                                }); 
                                });
                               // }); 
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
    });
});
</script>

<!-- BEGIN PAGE LEVEL STYLES -->
<style>
.input-icon.right > i {
    float: right;
    left: auto;
    right: 0 !important;
}

</style>
