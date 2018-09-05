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
</style>
<link href="{{ URL::to('/css/studentLayout.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<script>

</script>

<?php
/*
 public 'Today_Date' => string '2017-10-05' (length=10)
      public 'Grade_id' => int 5
      public 'Section_id' => int 6
      public 'Total_Strength' => int 24
      public 'Today_Strength' => int 23
      public 'Today_Present_Percentage' => string '95.8' (length=4)
      public 'Today_Absent' => int 1
      public 'Today_Absent_Percentage' => string '4.2' (length=3)
      public 'Today_Score' => float 9.6
      public 'Ten_Days_Score' => float 8.4
      public 'Sixteen_Days_Score' => float 9
      public 'Today_Ranking' => int 2
      public 'Ten_Days_Ranking' => int 6
      public 'Sixteen_Days_Ranking' => int 6
      public 'Total_Sections' => int 11
*/
$ClassTitle = '';
$Grade_Name = '';
$Section_Name='';
$Fence_Total = 0;
$Grade_Grade_Total = 0;
$Grade_Grade_Total3=0;
$Today_Total_Presents = 0;
$Today_Total_Absent = 0;
$Percentage_Today_Total =0;
$Today_Score =0;
$T10Days = 0;
$T60Days = 0;
$Grade_Total_10Days = 0;
$Grade_Total_60Days = 0;
$Percentage_Today_Total_Absent=0;
$Grade_id = 0;
$Section_id = 0;

$Acadmic=0;
$Grade_Grade_Total2=0;
$Ten_Days_Ranking =  0;
$Sixteen_Days_Ranking = 0;

if( $School_level_Student == 0 ){
	
	
	if(!empty( $Fence ))
	{
		
		$Fence_Total = $Fence[0]->Total_Fence;
		/*$Grade_Grade_Total3 = $Fence[0]->Grade_Strength;
		$Ten_Days_Ranking =  $Fence[0]->Ten_Days_Ranking;
		$Sixteen_Days_Ranking = $Fence[0]->Sixteen_Days_Ranking;
		$Grade_Total_10Days = $Fence[0]->Ten_Days_Score;
		$Grade_Total_60Days = $Fence[0]->Sixteen_Days_Score;*/
		
		$ClassTitle = $Fence[0]->Grade_Name;
        if($sectionID != 0){
            $ClassTitle = $ClassTitle . '-' . $Fence[0]->Section_Name;
        }   
		$Grade_id = $Fence[0]->Grade_id;
		$Section_id = $Fence[0]->Section_id;
		$Acadmic=$Fence[0]->Academic_id;
		
	}
	
	if(!empty($Attendance_Score)){
		foreach($Attendance_Score as $Score){
			
			$Grade_Grade_Total3 += ($Score->Total_Strength - $Fence_Total);
			$Today_Total_Presents += $Score->Today_Strength;
			$Today_Total_Absent += $Score->Today_Absent;
			$Percentage_Today_Total += $Score->Today_Present_Percentage;
			$Percentage_Today_Total_Absent +=$Score->Today_Absent_Percentage;
			$Today_Score +=	$Score->Today_Score;
			$Grade_Total_10Days += $Score->Ten_Days_Score;
			$Grade_Total_60Days += $Score->Sixteen_Days_Score;
			$Ten_Days_Ranking 		+=  $Score->Ten_Days_Ranking;
			$Sixteen_Days_Ranking +=  $Score->Sixteen_Days_Ranking;
			
			
		}
	}
	
	
	if( $sectionID == 0 )
	{
		$Ten_Days_Ranking =  0;
		$Sixteen_Days_Ranking = 0;
		$Grade_Total_10Days = 0;
		$Grade_Total_60Days = 0;
		
		
		
		
        
		
		
	}else{ 
			
	}
	
}else{ 

}
?>

@php
if( $Grade_id > 0 ){
$Badges_Grade_Section = app(App\Http\Controllers\Student_Information\Master_Page\Grade::class)->Grade_Section_Badges($Grade_id,$Section_id,$Acadmic);	
}else{
$Badges_Grade_Section = array();	
}

	
@endphp

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="index.html">Students</a>
            
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?=$ClassTitle; ?></span>
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

<?php 
if( !empty($userInfo)):
$User_photo_id=$userInfo[0]->employee_id;
$User_abridged_name=$userInfo[0]->abridged_name;
else:
$User_photo_id=0;
$User_abridged_name='';
endif;
?>


<!-- END USE PROFILE -->
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-5 borderRightDashed">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered fixed-height marginBottom0 padding0 fixed-height-NoScroll">
            <div class="showOnlyOnScroll">
                
                <div class="caption caption-md col-md-12 padding0">
                    <div class="yellowBGHead a LeftListing_headerSection padding0">
            
                    <!--  <div class="col-md-2 padding0" style="border-right:1px solid #dcdcdc;">
                        <h4 class="text-center totalAtt AttHead">
                            <span class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Att. Total" data-pin-nopin="true">24</span>
                            <span class="grayish tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Fence" data-pin-nopin="true">+2</span>    
                        </h4>
                    </div> col-md-2 -->
                    
                    <div class="col-md-12 text-center padding0">
					
                        <h3 class="classDetails">
					<?php  if( $sectionID != 0 ) { ?>
					<span class="grayish">CLASS</span> 
					<?php }else{ ?>
					<span class="grayish">GRADE</span> 
					<?php } ?>	
						
						<?=$ClassTitle;?> &nbsp; 
                        <a href="#"><img src="http://10.10.10.63/gs/components/student_listing/images/stats-.png" width="20px" data-toggle="tooltip" data-placement="top" data-original-title="Class details" data-pin-nopin="true"></a></h3>
                    </div><!-- -->
                    <!-- 
                    <div class="col-md-2 padding0" style="border-left:1px solid #dcdcdc;">
                        <h4 class="text-center todayAttScore AttHead">
                            <span class="tooltips" data-placement="bottom" data-original-title="Today's score" data-pin-nopin="true">0</span>                    
                        </h4>
                    </div> col-md-2 -->
                    
                    
                </div>
                    <!-- <h3 id="staffView_StaffList_Total" class="marginTop0 marginBottom0 uppercase">Students in Class <strong>III-S</strong></h3> -->
                </div>
            </div><!-- portlet-title -->
			<input type="hidden" name="Current_user_photo" id="Current_user_photo" value="{{$User_photo_id}}" />
			<input type="hidden" name="User_abridged_name" id="User_abridged_name" value="{{$User_abridged_name}}" />
			<?php if( $School_level_Student == 0 ){ ?>
            <div class="portlet-title">
                <div class="caption caption-md col-md-12 padding0">
                    <div class="yellowBGHead a LeftListing_headerSection padding0">
            
                    <div class="col-md-3 padding0" style="border-right:1px solid #dcdcdc;">
                        <h4 class="text-center totalAtt AttHead">
                            <span class="tooltips font-blue-sharp" data-toggle="tooltip" data-placement="bottom" data-original-title="Total" data-pin-nopin="true">{!! $Grade_Grade_Total3 !!}</span>
                            <span class="grayish smallTop tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Fence" data-pin-nopin="true">+{!! $Fence_Total !!}</span>    
                        </h4>
                        <div class="col-md-12 padding0" style="color: #888;padding-top: 10px !important;">
                            <div class="col-md-6 text-center tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Present" data-pin-nopin="true" style="font-size:18px;font-weight:bold;">
                                {!! $Today_Total_Presents  !!}
                            </div>
                            <span class="smallLineRight">&nbsp;</span>
                            <div class="col-md-6 text-center tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Present score" data-pin-nopin="true" style="width:49%;font-size:14px;">
                                {!! $Percentage_Today_Total  !!}%
                            </div>
                        </div>
                        <span class="borderBottomslim">&nbsp;</span>
                        <div class="col-md-12 padding0" style="padding-top: 10px !important;color: #888;">
                            <div class="col-md-6 text-center tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Absent" data-pin-nopin="true" style="font-size:18px;font-weight:bold;">
                                {!! $Today_Total_Absent !!}
                            </div>
                            <span class="smallLineRight">&nbsp;</span>
                            <div class="col-md-6 text-center tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="Absent score" data-pin-nopin="true" style="width:49%; font-size:14px;">
                            {!! $Percentage_Today_Total_Absent !!}%
                            </div>
                        </div><!-- 
                        <h4 class="text-center girlAtt AttHead">
                            <span class="tooltips" data-placement="bottom" data-original-title="Att.Today Girls" data-pin-nopin="true">0</span>
                            <span class="grayish tooltips" data-placement="bottom" data-original-title="Fence" data-pin-nopin="true">+2</span>
                        </h4>
                        <h4 class="text-center boyAtt AttHead">
                            <span class="tooltips" data-placement="bottom" data-original-title="Att.Today Boys" data-pin-nopin="true">0</span>
                        </h4>-->
                    </div><!-- col-md-2 -->
                 
                    <div class="col-md-6 text-center padding0">
                        <h3 class="classDetails">
						<?php  if( $sectionID != 0 ) { ?>
					<span class="grayish">CLASS</span> 
					<?php }else{ ?>
					<span class="grayish">GRADE</span> 
					<?php } ?>	
					
					 <?=$ClassTitle;?> &nbsp; 
                        <a href="#">
                            <img src="http://10.10.10.63/gs/components/student_listing/images/stats-.png" width="20px" data-toggle="tooltip" data-placement="top" data-original-title="Class details" data-pin-nopin="true">
                        </a>
                        </h3> 
                        <div class="col-md-3 padding0">
                            <img src="{!! $Tchrs['TOneImage'] !!}" width="45" class="marginRight10 maringBottom0 circleImg" style="border:1px solid #888;">
                        </div><!-- -->
                        <div class="col-md-6 padding0">
                            <h5 class="marginBottom0 text-left marginTop0" >{!! $Tchrs['TOneName'] !!}</h5>
                            <span class="onlyBorder">&nbsp;</span>
                            <h5 class="marginBottom0 text-right" style="">{!! $Tchrs['TTwoName'] !!}</h5>
                        </div><!-- -->
                        <div class="col-md-3 padding0">
                            <img src="{!! $Tchrs['TTwoImage'] !!}" width="45" class="marginRight10 maringBottom0 circleImg" style="border:1px solid #888;">
                        </div><!-- -->
                    </div><!-- -->
                    
                    <div class="col-md-3 padding0" style="border-left:1px solid #dcdcdc;">
                        
                        <h4 class="text-center todayAttScore AttHead">
                            <span class="tooltips" data-placement="bottom" data-original-title="Today's score" data-pin-nopin="true">{!! $Today_Score !!}</span>                    
                        </h4>
                        <div class="col-md-12 padding0" style="color: #666;padding-top: 10px !important;">
                            <div class="col-md-6 text-center tooltips" data-placement="bottom" data-original-title="10 Day score" data-pin-nopin="true" style="font-size:14px;">
                            {!! $Grade_Total_10Days !!}
                            </div>
                            <span class="smallLineRightGray">&nbsp;</span>
                            <div class="col-md-6 text-center tooltips" data-placement="bottom" data-original-title="10 Day score position" data-pin-nopin="true" style="width:49%;font-size:14px;">
                                {!! $Ten_Days_Ranking  !!}
                            </div>
                        </div>
                        <span class="borderBottomslim">&nbsp;</span>
                        <div class="col-md-12 padding0" style="padding-top: 10px !important;color: #666;">
                            <div class="col-md-6 text-center tooltips" data-placement="bottom" data-original-title="60 Day score" data-pin-nopin="true" style="font-size:14px;">
                                {!! $Grade_Total_60Days  !!}
                            </div>
                            <span class="smallLineRightGray">&nbsp;</span>
                            <div class="col-md-6 text-center tooltips" data-placement="bottom" data-original-title="60 Day position" data-pin-nopin="true" style="width:49%; font-size:14px;">
                               {!! $Sixteen_Days_Ranking  !!}
                            </div>
                        </div>
                        <!--
                        <h4 class="text-center TendayAttScore a AttHead">
                            <span class="tooltips" data-placement="bottom" data-original-title="10 day score" data-pin-nopin="true">0</span>                   
                        </h4>
                        <h4 class="text-center SixtydayAttScore a AttHead">
                            <span class="tooltips" data-placement="bottom" data-original-title="60 day score" data-pin-nopin="true">8.3</span>
                        </h4> -->
                        
                    </div>
                    <!-- col-md-2 -->
                    
                    
                </div>
                    <!-- <h3 id="staffView_StaffList_Total" class="marginTop0 marginBottom0 uppercase">Students in Class <strong>III-S</strong></h3> -->
                </div>
            </div><!-- portlet-title -->
           
			<?php } ?>


		   <div class="portlet-body customPadding">
                <div class="inputs">
                    <div class="portlet-input">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input id="staffView_StaffList_Search" type="text" class="form-control form-control-solid" placeholder="Search..."> </div>
                    </div>


                    <div class="theme-panel hidden-xs hidden-sm"  style="right:33px;">
                        <div class="toggler"> </div>
                        <div class="toggler-close"> </div>
                        <div class="theme-options">
                            <div class="theme-option">
                                <span> Grade </span>
                                <select id="StaffView_Filter_Profile" class="layout-option form-control input-sm">
                                    
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Status </span>
                                <select id="StaffView_Filter_Department" class="layout-option form-control input-sm">
                                    
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Gender </span>
                                <select id="StaffView_Filter_Campus" class="page-header-option form-control input-sm">
                                    
                                    <option value="G">Girl</option>
                                    <option value="B">Boy</option>
                                </select>
                            </div>
                            <?php //var_dump($Badges_Grade_Section); ?>
                            <div class="theme-option">
                                <span> Badges </span>
                                <select id="StaffView_Filter_AtdStd" class="page-header-option form-control input-sm">
                                <?php if( !empty( $Badges_Grade_Section ) ): ?>
                                <?php foreach( $Badges_Grade_Section as $as ): ?>
                                <option value="<?=$as->bedge_title;?>"><?=$as->bedge_title;?>  [<?=$as->bedge_code;?>]</option>
                                <?php endforeach; ?>
                                <?php endif; ?> 
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> House </span>
                                <select id="StaffView_Filter_Campus_House" class="page-header-option form-control input-sm">
                                    
                                </select>
                            </div>
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
                            </div -->
                            <div class="theme-option">
                                <span> By Attendance Score</span>
                                <select id="Sort_By_Attendance_Score" class="page-header-option form-control input-sm">
                                    <option value="High_to_Low">High to Low</option>
                                    <option value="Low_to_High">Low to High</option>
                                </select>
                            </div>
                            <div class="theme-option text-center" id="staffView_search_btn">
                                <a href="javascript:;" class="btn uppercase green-jungle applySearch">Apply Sorters</a>
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
                <div class="table-scrollable table-scrollable-borderless">
                
                    <table class="table table-hover table-light" id="staffView_Table_StaffList">
                        <thead>
                            <tr class="uppercase">
                                <th colspan="2"> Student </th>
                                <th class="text-center"> Profiles </th>
                                <th class="text-center"> Badges <a class="tooltips" data-placement="top" data-original-title="Add New Badge" data-toggle="modal" href="#basic_basic">+</a>
                                <th class="text-center"> Att. </th>
                            </tr>
                        </thead>
                        <!-- Static Table Row -->
                        <?php if( !empty($Students) ): ?>
                        <?php foreach($Students as $Student): ?>
                        
                        <tr>
                            <td class="fit">
                                <img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="GF-ID: <?=$Student->GF_ID;?>" src="<?=$Student->photo150;?>" /> </td>
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
                                    <p style="display:none;">{!! $SB->Bdg_Title !!}</p>
                                        <span class="badgeTeacher tooltips" data-placement="top" data-original-title="{!! $SB->Bdg_Title !!}" data-pin-nopin="true" style="border-color:{!! $SB->Badge_Color !!};color:{!! $SB->Badge_Color !!}" >{!! $SB->Badge_code !!}</span>
                                    @endforeach
                                @else
                                @endif
                            </td>
                            <td class="text-center"> 
                            <?php 
                            if( $Student->Today_Tapin_Time != 0 ){
                                $Today_Tapin_Time = date("H:i s A", strtotime( $Student->Today_Tapin_Time ) );
							}else{
                                $Today_Tapin_Time='Absent Today!';
								
							}
							
							if( $Today_Tapin_Time=='Absent Today!'){
								$Today_Tapin_Time2='Absent Today!';
							}else{
								$Today_Tapin_Time2=$Student->TitleTapInOn;
							}
                            ?>
                                <span style="width:30px; text-align:center; float:left;">
                                <img style="margin-top: 6px;" src="http://10.10.10.50/gsims/public/metronic/pages/img/<?=$Student->IconTapInOn;?>" class="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In at <?=$Today_Tapin_Time;?>" data-original-title="<?=$Today_Tapin_Time2?>" width="25">
                                </span>
                                <span class="AttStatusNeww">
                                <!-- Attendance -->
                                <span class="tenDayAttStatuss tooltips" data-container="body" data-placement="top" data-original-title="10 day status">{!! $Student->total_pf; !!}</span>
                                <span class="sixtyDayAttStatuss tooltips" data-container="body" data-placement="top" data-original-title="60 day status">{!! $Student->total_ps; !!}</span>
                                </span>
                            </td>
                            
                            
                            <td class="text-center" style="display:none;">{!! $Student->Statud_Code; !!}</td> <!--// <TD> 7 -->
                            <td class="text-center" style="display:none;">{!! $Student->House; !!}</td> <!--// <TD> 8 -->
                            <td class="text-center" style="display:none;">{!! $Student->Student_Id; !!}</td> <!--// <TD> 9 -->
                            <td class="text-center" style="display:none;">{!! $Student->GS_ID; !!}</td> <!--// <TD> 10 -->
                            <td class="text-center" style="display:none;">{!! $Student->Grade_Name; !!}</td> <!--// <TD> 11 -->
                            <td class="text-center" style="display:none;">{!! $Student->Section_Name; !!}</td> <!--// <TD> 12 -->
                            <td class="text-center" style="display:none;">{!! $Student->GF_ID; !!}</td> <!--// <TD> 13 -->
                            <td class="text-center" style="display:none;">{!! $Student->C_Name; !!}</td> <!--// <TD> 14 -->
                            <td class="text-center" style="display:none;">{!! $Student->Gender; !!}</td> <!--// <TD> 15 -->
                            <td class="text-center" style="display:none;">{!! $Student->total_pf; !!}</td> <!--// <TD> 16 -->
                            <td class="text-center" style="display:none;">{!! $Student->O_Name; !!}</td> <!--// <TD> 6 -->
                            
                            
                        </tr>
                         <?php endforeach; ?>
                        <?php else: ?>
                        <tr id="LastRow2">
                            <td colspan="4">Record Not Found!</td>
                        </tr>
                        <?php endif; ?>
                        <tr id="LastRow" style="display:none">
                            <td colspan="4">Record Not Found!</td>
                        </tr>
                       <!-- End Static Table Row -->
                    </table>
                
                
                
        <div class="modal fade" id="basic_basic" tabindex="-1" role="basic" aria-hidden="true">
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
                        <!--button type="button" class="btn green">Add Badge</button -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      

  <div class="modal fade" id="Edit_Badge_Form" tabindex="-1" role="Edit_Badge_Form" aria-hidden="true"></div>
        <!-- /.modal -->  

		
		<div class="modal fade" id="tab_content" tabindex="-1" role="basic">
<div class="modal-dialog" style="width:700px;">
<div class="modal-content">
<!-- 
<div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
 <h3 class="modal-title"> Family Information Form </h3>
</div>
-->
<div class="modal-body"> 
	<div class="portlet box blue-hoki">
		<div class="portlet-title">
			<div class="caption">
			<i class="fa fa-shield"></i><font><font>Family Information</font></font></div>
		</div>
		<div class="portlet-body" id="Fif_Show"></div>
	</div>
</div>
<div class="modal-footer">
<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


        <div class="modal fade" id="Add_New_Badge_Form_modal" tabindex="-1" role="Add_New_Badge_Form_modal" aria-hidden="true">
            <div class="modal-dialog">
            <!--form id="Form_Badges" class="form-horizontal" action="{!! url('/student/create/badge') !!}"name="Form_Badges" method="post" -->
        <form id="Form_Badges" class="form-horizontal" action="#" name="Form_Badges">   
        <input type="hidden" name="bookId" id="bookId" value="0" />
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close Closed_Modal" data-dismiss="modal" aria-hidden="true"></button>
                        <h3 class="modal-title">Badge Details</h3>
                    </div>
                    <div class="modal-body"> 
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-shield"></i><font><font>Add New Badge </font></font></div>
                                <div class="actions">
                                    
                                    <a href="javascript:;" class="btn btn-default btn-sm Revert_Back">
                                        <i class="icon-action-undo"></i><font><font> Bact to All Badges</font></font></a>
                                </div>
                            </div>
                            
                            <div class="portlet-body">
                            
                            
                            
                                <div class="col-md-4 paddingLeft0">
                                    <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button> Your form validation is successful!
                                </div>  
                                <div class="form-body">
                                            <div class="form-group form-md-line-input">
                                            <div class="input-icon right">
                                            <i class="fa"></i>
                                            <input type="text" class="form-control" id="Badge_Title" name="Badge_Title" placeholder="e.g. 14th August">
                                            <label for="Badge_Title">Badge Title<span class="required">*</span> </label>
                                            </div>
                                            </div>
                                            <div class="form-group form-md-line-input ">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" class="form-control" id="Badge_Code" name="Badge_Code" placeholder="e.g. A">
                                                <label for="Badge_Code">Badge Code<span class="required">*</span></label>
                                            </div>
                                            </div>
                                            <div class="form-group form-md-line-input  ">
                                                <input type="date" class="form-control" id="Expiry_Date" name="Expiry_Date" />
                                                <label for="Expiry_Date">Expiry</label>
                                            </div>
                                            <div class="form-group form-md-line-input  ">
                                                <input type="color" class="form-control" id="Badge_Color" name="Badge_Color" />
                                                <label for="Badge_Color">Color</label>
                                            </div>
                                            
                                            <div class="form-group form-md-line-input ">
                                                <select class="form-control" id="Badege_Priority" name="Badege_Priority">
                                                    <option value=""></option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                    <option value="4">Option 4</option>
                                                </select>
                                                <label for="Badege_Priority">Priority</label>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <textarea class="form-control" rows="3" id="Badge_Description" name="Badge_Description" placeholder="e.g. All the students participating for 14th August stage show are badged in this badge"></textarea>
                                                <label for="Badge_Description">Description</label>
                                            </div>
                                        </div>
                              
                                </div><!-- col-md-6 -->
                                <div class="col-md-8 paddingRight0">
                                <!--table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1"-->
                                <?php if( !empty($Students) ): ?>
                                <input id="Grade_id" name="Grade_id" value="<?=$Students[0]->Grade_id;?>" type="hidden">
                                    <input id="Section_id" name="Section_id" value="<?=$Students[0]->Section_id;?>" type="hidden">
                                    <input id="Current_Academic" name="Current_Academic" value="<?=$Students[0]->Acadmic;?>" type="hidden">
                                    <input id="Current_Term" name="Current_Term" value="<?=$Students[0]->Cur_Term;?>" type="hidden">
                                    
                                    <input id="_token" name="_token" value="<?php echo csrf_token(); ?>" type="hidden">
                                <?php endif; ?> 
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="Badge_Student_List"> 
                                    
                                        <thead>
                                            <tr>
                                               <th class="table-checkbox">#
                                                        <!--label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#Badge_Student_List .checkboxes" />
                                                            <span></span>
                                                        </label -->
                                                    </th>
                                                <th> GS-ID</small> </th>
                                                <th> Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if( !empty($Students) ): ?>
                                        <?php foreach($Students as $Student): ?>
                                        
                                           <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" name="Student_CheckBox[]" class="checkboxes" value="<?=$Student->Student_Id;?>" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> <?=$Student->GS_ID; ?></td>
                                                <td> <strong><?=$Student->Abridged_Name; ?></strong> </td>
                                                
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php endif;?>
                                         
                                        </tbody>
                                    </table>

                                </div><!-- col-md-6 -->
                                
                            </div>
                            
                         
                        </div>
                        <!-- Add Badge End -->
                    </div>
                    <div class="modal-footer">
                        <button type="Button" class="btn dark btn-outline Closed_Modal" data-dismiss="modal" id="">Cancel</button>
                        <button type="submit" class="btn green" id="Add_Badge" name="Add_Badge">Add Badge</button>
                        <!--input type="submit" class="btn green" id="Add_Badge" name="Add_Badge" value="Add Badge" /--> 
                    </div>
                </div>
                
                 </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
    


      
	  
        
                </div>
            </div><!-- portlet-body -->
        </div><!-- portlet -->
    </div><!-- col-md-4 -->
    
<div class="col-md-7" id="loadingText"></div>
<div class="col-md-7 fixed-height" id="StudentView_StuInfo" style="display:none;">
        <div class="headRightDetails">
            <table>
                <tr id="staffView_ProcessorBar">
                    <td class="" style="padding-right:10px;">
                        <img class="user-pic rounded tooltips" data-container="body" data-placement="top" src="" width="42">
                    </td>
                    <td class="staffView_StaffName">
                        <a href="javascript:;" class="primary-link tooltips" data-container="body" data-placement="top"></a><br>
                        <small class="shortHeight">
                            <span class="tooltips" data-container="body" data-placement="top"></span></small>
                    </td>
                </tr>
            </table><!-- col-md-4 -->
        </div>
        

        
        
  
        
        
        
        <div class="row">
            <div class="col-md-3 paddingRight0">
                <div class="profile-sidebar-portlet portlet light fixedHeight3">
                    <!-- SIDEBAR USERPIC -->
                    <input type="hidden" name="Student_id" id="Student_id" value="" />
                    <input type="hidden" name="Gs_id" id="Gs_id" value="" />
					<input type="hidden" name="Academic_id" id="Academic_id" value="" />
					
					
                    <div class="profile-userpic">
                        <img src="" class="img-responsive" alt=""> 
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"></div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                </div><!-- fixedHeight250 -->
            </div>
  
            <div class="col-md-9 paddingRight0">
                <div class="portlet light fixedHeight3">
                    <!--  -->
                    <div class="row">
                        <div class="col-md-4 borderRightDashed ">
                            <div class=" profile-desc-link ">
                                <img src="img/gsID-icon.png" width="20" style="margin-right:7px;" class="tooltips" data-container="body" data-placement="top" data-original-title="GS ID">
                                  <!-- <i class="icon-credit-card"></i> -->
                                <span class="linkLookalike profile-usertitle-gtid"></span>
                            </div><!--  -->
                            <div class="margin-top-10 profile-desc-link ">
                                <img src="http://10.10.10.50/gsims/public/metronic/pages/img/blackboard.png" width="20" 
                                style="margin-right:7px;" class="tooltips" data-container="body" 
                                data-placement="top" data-original-title="Class">
                                <span class="linkLookalike GSHouseJinnah"><strong></strong> <span class="HouseJinnah"></span>
                                </span>
                            </div><!--  -->
                            <div class="margin-top-10 profile-desc-link ">
                                <i class="fa fa-calendar-plus-o tooltips" data-container="body" data-placement="top" data-original-title="Date of Joining"></i>
                                <span class="linkLookalike year_of_admission"></span>
                            </div><!--  -->
                            <div class="margin-top-10 profile-desc-link ">
                                <i class="icon-user-follow tooltips" data-container="body" data-placement="top" data-original-title="Student Profile" ></i>
                                <span class="ProfileB Academics tooltips" data-placement="top" data-original-title="Academic" data-pin-nopin="true"></span>
                                <span class="ProfileC Parentals tooltips" data-placement="top" data-original-title="Parental" data-pin-nopin="true"></span> 
                                <span class="ProfileD  Socials tooltips" data-placement="top" data-original-title="Social" data-pin-nopin="true"></span>
                                <span class="ProfileA  Accounts tooltips" data-placement="top" data-original-title="Accounts" data-pin-nopin="true"></span>
                            </div><!--  -->
                        </div><!-- col-md-6 -->
                        <div class="col-md-4 borderRightDashed" style="height:118px;">
                            <div class="profile-desc-link" id="Badge_html">
                                <i class="icon-badge tooltips" data-placement="bottom" data-original-title="Badge" data-pin-nopin="true" ></i>
                                <span class="badgeTeacher tooltips" data-placement="bottom" data-original-title="14th August" data-pin-nopin="true" style="border-color:#93b4d6;color:#93b4d6;"></span>
                                <span class="badgeTeacher tooltips" data-placement="bottom" data-original-title="15ht August" data-pin-nopin="true" style="border-color:#e29087;color:#e29087;"></span>
                            </div><!--  -->
                            <div class="margin-top-10 profile-desc-link pull-left">
                                <span style="width:22px; text-align:center; float:left;">
                                    <img style="margin-top: 0px;" src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" 
                                    class="popovers" id="popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Tap In awaited" data-original-title="Absent" width="20">
                                </span>
                                <span class="" style="float:left;margin-top:0px;margin-left:4px;font-size: 14px;font-weight: 600;color: #5b9bd1;">  
                                    <span class=" tooltips" id="SingleSL10Days" data-container="body" data-placement="top" data-original-title="10 day status"></span> 
                                    | <span class=" tooltips" id="SingleSL60Days" data-container="body" data-placement="top" data-original-title="60 day status"></span>
                                </span>
                            </div>
                        </div><!-- col-md-4 -->
                        <div class="col-md-4">
                            <div class="row padding0">
                                <div class="col-md-12">
                                    <div class=" profile-desc-link">
                                    <img src="img/gfID-icon.png" width="20" style="margin-right:7px;" class="tooltips" data-container="body" data-placement="top" data-original-title="GF ID" id="fifIcon" />
                                    <span class="linkLookalike family_id" id="family_id"></span>
                                    </div><!--  -->
                                    <div class="margin-top-10 profile-desc-link">
									<i class="icon-user-follow tooltips" data-placement="top" data-original-title="GF Profiles" data-pin-nopin="true"></i>
									<span class="ProfileB Academic Support tooltips" data-placement="top" data-original-title="Support" data-pin-nopin="true"></span>
									<span class="ProfileC Parental Conduct tooltips" data-placement="top" data-original-title="Conduct" data-pin-nopin="true"></span> 
                                    </div><!--  -->
                                </div><!-- -->
                            </div><!-- row -->
                            <div class="row padding0 margin-top-10">
								<div class="col-md-6 paddingRight0">
                                    <div class="pull-left">
                                      <img src="" class="circleImg Father_photo img-responsive tooltips" data-placement="top" data-original-title="" data-pin-nopin="true" alt="" width="55"> 
                                    </div>
                                </div><!-- col-md-6 -->
                                <div class="col-md-6 paddingRight0">
                                    
                                    <div class="pull-left">
                                        <img src="" class="circleImg Mother_photo img-responsive tooltips" data-placement="top" data-original-title="" data-pin-nopin="true" alt="" width="55"> 
                                    </div>
                                </div><!-- col-md-6 -->
                            </div><!-- row -->
                        </div><!-- col-md-6 -->
                        
                        
                    </div>
                    
                </div><!-- fixedHeight250 -->
            </div><!-- col-md-8 -->
        </div><!-- row -->
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-body padding20">
                        <ul class="nav nav-tabs" id="credit">
                            <li class="active" data-interest="Comments"><a href="#tab_1_9" data-toggle="tab"> Stories </a></li>
						    <li class="" data-interest="Basic"><a href="#tab_1_1" data-toggle="tab"> Basic </a></li>
						    <li data-interest="sms"><a href="#tab_1_2" data-toggle="tab"> SMS </a></li>
                            <li data-interest="Attendance"><a href="#tab_1_3" data-toggle="tab"> Attendance </a></li>
                            <li data-interest="Grade"><a href="#tab_1_4" data-toggle="tab"> Grade </a></li>
                            <li data-interest="Billing"><a href="#tab_1_5" data-toggle="tab"> Billing </a></li>
                            <li data-interest="Discount"><a href="#tab_1_6" data-toggle="tab"> Discount </a></li>
                            <li data-interest="Arrears/Advance"><a href="#tab_1_7" data-toggle="tab"> Arrears/Advance </a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="tab_1_1">
                                <div class="form-body">
                                    <h3 class="form-section headingBorderBottom">Person Info</h3>
                                    
                                    <div class="row">
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 text-right paddingRight0">Abridged Name:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Abridged_Name">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 text-right paddingRight0">Call Name:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Call_Name">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 text-right paddingRight0">Official Name:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Official_Name">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 text-right paddingRight0">House:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="House">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 text-right paddingRight0">DOB:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Date_Of_Birth">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 text-right paddingRight0">Grade section:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Element_grade_section"> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 text-right paddingRight0">Gender:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Element_Gender">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    
                                    <h3 class="form-section headingBorderBottom">Parents Info</h3>
                                    <div class="row">
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Father Name: </label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Element_Father_name">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Mother Name:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Element_Mother_name"> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Father NIC:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Element_Father_cnic">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Mother NIC:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Element_Mother_cnic">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Father Mobile:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Element_Father_Mobile">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Mother Mobile:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Element_Mother_Mobile">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Father Speciality:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Father_Speciality"> - </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Mother Speciality:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Mother_Speciality"> - </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Father Profession:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Father_Profession">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Mother Profession:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Mother_Profession">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Father Organization:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Father_Organization">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Mother Organization:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Mother_Organization"> - </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Father Department:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Father_Department">  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Mother Department:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Mother_Department"> - </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Father Designation:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Father_Designation"> - </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6 padding0">
                                            <div class="form-group">
                                                <label class="control-label col-md-5 paddingRight0 text-right">Mother Designation:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static bold" id="Mother_Designation"> - </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    
                                </div><!-- form-body -->
                            </div><!-- tab_1_1 -->
                            <div class="tab-pane fade" id="tab_1_2"><h3>SMS</h3></div><!-- tab_1_2 -->
                            <div class="tab-pane fade" id="tab_1_3"><h3>Attendance</h3></div><!-- tab_1_3 -->
                            <div class="tab-pane fade" id="tab_1_4"><h3>Grade</h3></div><!-- tab_1_4 -->
                            <div class="tab-pane fade" id="tab_1_5"><h3>Billing</h3></div><!-- tab_1_5 -->
                            <div class="tab-pane fade" id="tab_1_6"><h3>Discount</h3></div><!-- tab_1_6 -->
                            <div class="tab-pane fade" id="tab_1_7"><h3>Arrears/Advance</h3></div><!-- tab_1_7 -->
                            <div class="tab-pane fade" id="tab_1_8"><h3>Log</h3></div><!-- tab_1_8 -->
							<div class="tab-pane fade active in" id="tab_1_9">
                                <div class="chat-form">
                                
									
                                	<div class="pull-left commentBox width100">
                                    	<input type="text" class="form-control borderRight0 width78" placeholder="Type a comment here..." id="Search_Area" />
                                        <div class="rightpullAbsolutes">
                                            <div class="pull-right commentType" id="commentType">
                                                <button type="button" class="btn-default btn dropdown-toggle borderRight0 show_show" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
                                                    Category &nbsp;<i class="fa fa-angle-down"></i>
                                                </button>
                                                <button type="button" style="display:none;" class="btn-default btn dropdown-toggle borderRight0 hide_hide" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
                                                    Category &nbsp;<i class="fa fa-angle-up"></i>
                                                </button>
                                                <div class="dropdown-menuu pull-right" role="menu" style="display:none;">
                                                	<h4 class="bbottom">Comment Category</h4>
                                                    <label class="mt-checkbox">
                                                        <input type="checkbox" name="CheckBox_Finance" id="CheckBox_Finance" value="CheckBox_Finance" class="CheckBox_Category" /> Finance
                                                        <span></span>
                                                    </label><br />
                                                    <label class="mt-checkbox">
                                                        <input type="checkbox" name="CheckBox_Academic" id="CheckBox_Academic" value="CheckBox_Academic" class="CheckBox_Category" /> Academic
                                                        <span></span>
                                                    </label><br />
                                                    <label class="mt-checkbox">
                                                        <input type="checkbox" name="CheckBox_ETab" id="CheckBox_ETab" value="CheckBox_ETab" class="CheckBox_Category" /> E-TAB
                                                        <span></span>
                                                    </label><br />
                                                    <label class="mt-checkbox">
                                                        <input type="checkbox" name="CheckBox_SIS" id="CheckBox_SIS" value="CheckBox_SIS" class="CheckBox_Category" /> SIS
                                                        <span></span>
                                                    </label><br />
                                                    <h4 class="bbottom">Comment for</h4>
													
                                                    <label class="mt-checkbox">
														<input type="hidden" name="CheckBox_Individual" id="CheckBox_Individual" value="CheckBox_Individual" class="CheckBox_Category" />
                                                    
                                                    </label><br />
													
                                                    <label class="mt-checkbox" style="padding-left:0px;">
                                                        <input type="hidden" name="CheckBox_Family" id="CheckBox_Family" value="CheckBox_Family" class="CheckBox_Category" /> 
														<input type="checkbox" class="make-switch" id="switchChange2" name="switchChange2" data-size="mini" data-on-text="Yes" data-off-text="No" />
														Family
                                                        <!--span></span -->
                                                    </label><br />
                                                    
                                                </div>
                                            </div><!-- commnetType -->
                                            <div class="pull-left commentButton" id="Filter_User_Comments">
                                                <button type="button"  class="btn uppercase green-jungle borderRight0" id="btn_Add_Comments" tabindex="-1">Comment</button>
                                            </div><!-- commentButton -->
                                            <div class="theme-panel hidden-xs hidden-sm">
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
                                                    <span style="padding-bottom:10px;"> Category</span>
                                                    <span style="width:100%;">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" name="Search_Cat[]" value="Accounts" /> Finance
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
                                        </div>
										
                                        </div><!-- rightpullAbsolute -->
										
                                    </div><!-- commentBox -->
									
									
                                </div>
								
								 <div class="pull-left width100">
									<div class="alert alert-warning alert-dismissable" id="Error_Commenting" style="display:none;">
									<!--button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button -->
									<strong id="Error_Commenting_1"></strong>
									</div>
									
									
								</div>
                                <div class="col-md-12" style="" data-always-visible="1" data-rail-visible1="1" id="Stories_Base">
                                    <ul class="chats">
                                        
                                    </ul>
                                </div> 
                            </div><!-- tab_1_9 -->
							
                        </div><!-- tab-content -->
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->

<style>

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
    top: 37px !important;
    cursor: pointer;
}
.theme-panel>.theme-options4 {
    top: 70px !important;
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
</style>

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">

/***** BEGIN - Search Result Highlight Function *****
* Author: Atif Naseem (Thu Jul 20, 2017)
* Email: atif.naseem22@gmail.com
* Cel: +92-313-5521122
* Description: Highlight all the search text
*              in table columns.
****************************************************/


$('.toggler3').show();
	$('.toggler3-close').hide();
	$('.theme-panel > .theme-options2').hide();
	$('#staffView_StaffList_Search').val('');
	
	$('.toggler2').show();
	$('.toggler2-close').hide();
	$('.theme-panel > .theme-options2').hide();
	$('#staffView_StaffList_Search').val('');
	
var highlightSearchResult = function() {
    var search = $('#staffView_StaffList_Search'),
        content = $('#staffView_Table_StaffList'),
        matches = $(), index = 0;
    // Listen for the text input event
    search.on('input', function(e) {
        
        // Only search for strings 2 characters or more
        if (search.val().length >= 2) {
            // Use the highlight plugin
            content.highlight(search.val(), function(found) {                
               // found.parent().parent().css('background','yellow');
            });
            
        }
        else {
            content.highlightRestore();
            
        }
    });
    


    var termPattern;
    $.fn.highlight = function(term, callback) {
        return this.each(function() {
            var elem = $(this);
            if (!elem.data('highlight-original')) {
                // Save the original element content
                
               elem.data('highlight-original', elem.html());
            } else {
                // restore the original content
                elem.highlightRestore();
            }
            termPattern = new RegExp('(' + term + ')', 'ig');
            // Search the element's contents
            walk(elem);
            // Trigger the callback
            callback && callback(elem.find('.match'));
        });
    };


    $.fn.highlightRestore = function() {
        return this.each(function() {
            var elem = $(this);
            elem.html(elem.data('highlight-original'));
        });
    };



    function walk(elem) {
        elem.contents().each(function() {
            if (this.nodeType == 3) { // text node
                if (termPattern.test(this.nodeValue)) {
                    $(this).replaceWith(this.nodeValue.replace(termPattern, '<span class="match">$1</span>'));
                }
            } else {
                walk($(this));
            }
        });
    }
};
/***** END - Search Result Highlight Function *****/


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

useNthColumn(6,'StaffView_Filter_Department');
useNthColumn(7,'StaffView_Filter_Campus_House');
useNthColumn(10,'StaffView_Filter_Profile');
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





/***** BEGIN - Tab Information - TIF-B *****/
var get_Staff_TIFB = function(staffID) {
    var html = '';
    var educationSections = ['Others', 'Professional', 'University', 'College', 'School'];
    var educationNumbers = [5, 4, 3, 2, 1]

    $.ajax({
        type:"POST",
        cache:true,
        url:"{{url('/masterLayout/staff/getStaff_tifB')}}",
        data:{
            staff_id:staffID,
            "_token": "{{ csrf_token() }}",
        },
        success:function(result){
            $('#tab_education').html('');
            $('#tab_employment').html('');
            $('#tab_parent_table').html('');
            $('#tab_staff_child').html('');
            $('#tab_alternate_contact').html('');
            $('#tab_other').html('');

            var data = jQuery.parseJSON(result);



            for(var j=0; j < educationSections.length; j++) {
                html = html+'<h4 class="form-section headingBorderBottom">'+educationSections[j]+'</h4><div class="row">';
                for (var i = 0; i < data['education'].length; i++) {
                    if(data['education'][i]['level'] === educationNumbers[j]) {
                        html = html+'<div class="col-md-6"><div class="portlet light bordered lowPadding"><div class="portlet-body"><div class="col-md-3 padding0"><img src="{{ url("/metronic/pages/img/schoolIcon.jpg") }}" class="SchoolPlaceHolder" /></div><!-- col-md-3 --><div class="col-md-9 paddingRight0"><h5 class=" marginBottom0"><strong>'+data['education'][i]['institute']+'</strong></h5><h5 class="font-grey-cascade"><strong>'+data['education'][i]['qualification']+'</strong>, '+data['education'][i]['subjects']+'</h5><div class="col-md-6 padding0"><h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-graduation"></span>&nbsp;&nbsp;&nbsp;'+data['education'][i]['result']+'</h5></div><div class="col-md-6"><h5 class="marginBottom0 font-grey-cascade marginTop0"><span aria-hidden="true" class="icon-calendar"></span>&nbsp;&nbsp;&nbsp;'+data['education'][i]['year_of_completion']+'</h5></div></div><!-- col-md-9 --></div><!-- portlet-body --></div><!-- portlet --></div><!-- col-md-6 -->';
                    }
                }
                html = html+'</div>';
            }
            $('#tab_education').html(html);




            html = '';
            if(data['employment'][0]['organization'] != null){
                for (var i = 0; i < data['employment'].length; i++) {
                    html = html+'<div class="row">';
                    html = html+'<div class="col-md-12"><div class="portlet light lowPadding2 onlyBorderBottom marginBottom0"><div class="portlet-body"><div class="col-md-1 padding0"><img src="{{ url("/metronic/pages/img/BriefacaseIcon.jpg") }}" class="SchoolPlaceHolder" /></div><!-- col-md-3 --><div class="col-md-11 paddingRight0"><h5 class=" marginBottom0 font-grey-mint marginTop0"><strong>'+data['employment'][i]['organization']+'</strong> on the position of <strong>'+data['employment'][i]['designation']+'</strong></h5><h5 class="font-grey-salsa marginBottom4"><span class="positionDetail"><i class="fa fa-money tooltips" data-container="body" data-placement="top" data-original-title="Sallary"></i> <strong>'+data['employment'][i]['salary']+'</strong></span><span class="positionDetail"><i class="fa fa-calendar tooltips" data-container="body" data-placement="top" data-original-title="Tenure"></i> <strong>'+data['employment'][i]['from_year']+'</strong> to <strong>'+data['employment'][i]['to_year']+'</strong></span><span class="positionDetail"><img src="http://10.10.10.50/gsims/public/metronic/pages/img/blackboard.png" width="20" class="tooltips" data-container="body" data-placement="top" data-original-title="Classes Taught" /> <strong>'+data['employment'][i]['classes_taught']+' </strong></span><span class="positionDetail"><i class="icon-book-open tooltips" data-container="body" data-placement="top" data-original-title="Subjects Taught"></i> <strong>'+data['employment'][i]['subject_taught']+'</strong></span></h5><p class="font-grey-salsa marginBottom0">Reason for Leaving: <span class="font-grey-mint">'+data['employment'][i]['reason_for_leaving']+'</span> </p></div><!-- col-md-9 --></div><!-- portlet-body --></div><!-- portlet --></div><!-- col-md-6 -->';
                    html = html+'</div><!-- row -->';
                }
            }
            $('#tab_employment').html(html);





            html = '';
            if(data['fs'][0]['name'] != null){
                html = '<tr><td class="">'+data['fs'][0]['name']+'</td><td class="text-center"><strong>Name</strong></td><td class="">'+data['fs'][1]['name']+'</td></tr><tr><td>'+data['fs'][0]['profession']+'</td><td class="text-center"><strong>Profession</strong></td><td>'+data['fs'][1]['profession']+'</td></tr><tr><td>'+data['fs'][0]['qualification']+'</td><td class="text-center"><strong>Qualification</strong></td><td>'+data['fs'][1]['qualification']+'</td></tr><tr><td>'+data['fs'][0]['designation']+'</td><td class="text-center"><strong>Designation</strong></td><td>'+data['fs'][1]['designation']+'</td></tr><tr><td>'+data['fs'][0]['department']+'</td><td class="text-center"><strong>Department</strong></td><td>'+data['fs'][1]['department']+'</td></tr><tr><td>'+data['fs'][0]['company']+'</td><td class="text-center"><strong>Organisation</strong></td><td>'+data['fs'][1]['company']+'</td></tr><tr><td>'+data['fs'][0]['nic']+'</td><td class="text-center"><strong>CNIC</strong></td><td>'+data['fs'][1]['nic']+'</td></tr><tr><td>'+data['fs'][0]['mobile_phone']+'</td><td class="text-center"><strong>Mobile</strong></td><td>'+data['fs'][1]['mobile_phone']+'</td></tr><tr><td>'+data['fs'][0]['address']+'</td><td class="text-center"><strong>Address</strong></td><td>'+data['fs'][1]['address']+'</td></tr>';
            }
            $('#tab_parent_table').html(html);





            html = '';
            if(data['sc'][0]['gs_id'] != null){
                for (var i = 0; i < data['sc'].length; i++) {
                    html = html+'<div class="col-md-3"><div class="mt-card-item '+data['sc'][i]['html_class']+'"><div class="mt-card-avatar mt-overlay-4"><img src="{{ url("") }}/'+data['sc'][i]['photo500']+'" /><div class="mt-overlay"><h2>'+data['sc'][i]['class']+' <span class="font-yellow-lemon">('+data['sc'][i]['house_name']+')</span></h2><div class="mt-info font-white"><div class="mt-card-content"><p class="mt-card-desc font-white">GF-ID: <strong>'+data['sc'][i]['gfid']+'</strong> ('+(i+1)+'/'+data['sc'].length+')</p><div class="mt-card-social"></div></div></div></div><!-- mt-overlay --></div><!-- mt-card-avatar --><div class="mt-card-content"><h3 class="mt-card-name">'+data['sc'][i]['abridged_name']+'</h3><p class="mt-card-desc font-grey-mint">GS-ID: <strong>'+data['sc'][i]['gs_id']+'</strong> ('+data['sc'][i]['std_status_code']+')</p></div><!-- mt-card-content --></div><!-- mt-card-item --></div><!-- col-md-3 -->';
                }
            }
            $('#tab_staff_child').html(html);





            html = '';
            if(data['ac'][0]['name'] != null){
                html = '<tr><td>'+data['ac'][0]['name']+'</td><td class="text-center"><strong>Name</strong></td><td>'+data['ac'][1]['name']+'</td></tr><tr><td>'+data['ac'][0]['address']+'</td><td class="text-center"><strong>Address</strong></td><td>'+data['ac'][1]['address']+'</td></tr><tr><td>'+data['ac'][0]['email']+'</td><td class="text-center"><strong>Email</strong></td><td>'+data['ac'][1]['email']+'</td></tr><tr><td>'+data['ac'][0]['phone']+'</td><td class="text-center"><strong>Mobile</strong></td><td>'+data['ac'][1]['phone']+'</td></tr><tr><td>'+data['ac'][0]['relationships']+'</td><td class="text-center"><strong>Relationship</strong></td><td>'+data['ac'][1]['relationships']+'</td></tr>';
            }
            $('#tab_alternate_contact').html(html);




            html = '<div class="form-body"><h3 class="form-section marginTop0 headingBorderBottom">Other Details</h3><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Provident Fund :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['pf']+' </p></div></div></div><!--/span--><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">NTN:</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['ntn']+' </p></div></div></div><!--/span--></div><!--/row--><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">EOBI/SESSI number: </label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['eobi']+' / '+data['other'][0]['sessi']+'</p></div></div></div><!--/span--></div><!--/row--><h3 class="form-section headingBorderBottom">Bank Details</h3><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Bank Name : </label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['bank_name']+' </p></div></div></div><!--/span--><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Branch :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['bank_branch']+' </p></div></div></div><!--/span--></div><!--/row--><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Account Number :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['account_number']+' </p></div></div></div><!--/span--></div><!--/row--><h3 class="form-section headingBorderBottom">Takaful</h3><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Self :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['takaful_self']+' </p></div></div></div><!--/span--><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Spouse :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['takaful_spouse']+' </p></div></div></div><!--/span--></div><!--/row--><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Children :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['takaful_children']+' </p></div></div></div><!--/span--><div class="col-md-6"><div class="form-group"><label class="control-label col-md-5">Certificate :</label><div class="col-md-7"><p class="form-control-static bold"> '+data['other'][0]['takaful_crt']+' </p></div></div></div><!--/span--></div><!--/row--></div><!-- form-body -->';
            $('#tab_other').html(html);
        }
    });
};
/***** END - Tab Information - TIF-B *****/




/***** BEGIN - Tab Information - TIF-B *****/
var get_Staff_TIFA = function(GTID) {
    /***** Posting GT-ID and retrieving data ****/
    $.ajax({
        url: "{{url('/masterLayout/staff/getStaff_tifA')}}",
        type:"POST",
        cache:true,
        data: {
          GTID: GTID,
          "_token": "{{ csrf_token() }}",
        },
        success: function (response) {
            $('#tab_1_2').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Something wrong! error: ' + textStatus);
        }
    });
};
/***** END - Tab Information - TIF-B *****/

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



  // validation using icons
    var BadgesValidation = function() {
        
        var form2 = $('#Form_Badges');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);
        
        
        
        var Grade_id = $('#Grade_id').val();
        var Section_id = $('#Section_id').val();
        var Badge_Title = $('#Badge_Title').val();
        var Badge_Code = $('#Badge_Code').val();
        var Expiry_Date = $("#Expiry_Date").val();
        var Badge_Color = $('#Badge_Color').val();
        var Badege_Priority = $('#Badege_Priority').val();
        var Badge_Description = $('#Badge_Description').val();
        var Current_Academic = $('#Current_Academic').val();
        var Current_Term = $('#Current_Term').val();
        var Student_id = $('#Student_id').val();
        
        var Student_CheckBox = $('#Student_CheckBox').val();
        
        //alert(Badge_Title)
        
        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                 Badge_Title: { required: true },
                    Badge_Code: { required: true, },
                    //Expiry_Date: { required: true,  },
                  
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success2.hide();
                    error2.show();
                    App.scrollTo(error2, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                },

                unhighlight: function (element) { // revert the change done by hightlight
                     $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

              
                  success: function (label, element) {
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
                        url:"{{url('/student/create/badge')}}",
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

            

function Reset_Fields(){
$("#Badge_Title").val('');
$("#Badge_Title").val('');
$("#Badge_Code").val('');
$("#Badege_Priority").val();
$("#Badge_Description").val('');
$("#Expiry_Date").val('');
$(".gradeX").find('input[type=checkbox]').each(function () { this.checked = false; });

        
}


function Data_Table(Table){
	
  return Table.dataTable({
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
                [10, 15, 20, -1],
                [10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,            
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
			 "ordering": false
            /*"order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
			*/
        });	
}

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
            url:"{{url('/student/detail')}}",
            data:{
                Student_id:Student_id,Gs_id:Gs_id,Active_tab,Active_tab,
                "_token": "{{ csrf_token() }}",
            },
            success:function(result){
				App.stopPageLoading();
				
               var data = jQuery.parseJSON(result);
                var d = data["SInfo"][0];
                var dd = data["Sib"];
                var Father_photo = dd.father_photo;
                var Mother_photo = dd.mother_photo;
                
                //$('.profile-userpic img').attr("src", A_URL+"/photos/sis/500x500/student/"+d.gr_no+".jpg");
                
                $("#Gs_id").val('');
                $("#Gs_id").val(d.gs_id);
				$("#Academic_id").val(d.academic_session_id);
                
                $('.profile-userpic img').attr("src", A_URL+"/"+d.photo150+"");
                $('#staffView_ProcessorBar img').attr("src", A_URL+"/"+d.photo150+"");
                
                $('.profile-usertitle-name').text(d.abridged_name);
                $('.staffView_StaffName a').text(d.abridged_name);
                $('.shortHeight span').text( d.grade_dname+"-"+d.section_dname +  " (" +d.std_status_code +")");
                
                
                
                $('.houseName').text(d.house_short_name);
                $('.profile-usertitle-gtid').text(d.gs_id + " ("+d.std_status_code+")");
                $('.GSHouseJinnah').html("<strong>"+d.grade_dname+"-"+d.section_dname+"</strong> <span class='"+d.HouseClass+"'> ("+d.house_dname+")</span>");
                var str = d.campus;
                var res = str.substr(0,1);
                $('.year_of_admission').text(d.year_of_admission + " ("+res+")");
                $('.family_id').text(d.gfid + " ("+d.active_siblings_position+"/"+d.Tt_Siblings+")" );
				$('.family_id').attr("id",d.gfid);
				$("#fifIcon").attr("data-original-title", "GF-ID: "+d.gfid);
				
				
                $('.Academics').text(d.P_Academic);
                $('.Parentals').text(d.P_Parental);
                $('.Socials').text(d.P_Social);
                $('.Accounts').text(d.P_Accounts);
                $('.Support').text(d.P_Support);
                $('.Conduct').text(d.P_Conduct);
                $('.Father_photo').attr("src", Father_photo);
                
                
                $('.Mother_photo').attr("src", Mother_photo);
                
                var Bdg = data["Bdg"];
                var Badges = '<i class="icon-badge tooltips" data-placement="bottom" data-original-title="Badge" data-pin-nopin="true" ></i>';
                $("#Badge_html").html('');  
                if (Bdg != null){
                    Badges += Bdg;
                }else{}
                $("#Badge_html").html(Badges);
                
                $('#popovers').attr("src",d.IconTapInOn);
                
                
                if( d.Today_Tapin_Time != 0 ){
                    var s = d.Today_Tapin_Time.split(":");
                    if( ( parseInt(s[0]) == 6 ) || ( parseInt(s[0]) == 7 ) || ( parseInt(s[0]) == 8 ) || ( parseInt(s[0]) == 9 ) ||
( parseInt(s[0]) == 10 ) || ( parseInt(s[0]) == 11 ) || ( parseInt(s[0]) == 12 ) ){
                        var s1=" AM";
                    }else{
                        var s1=" PM";
                    }
                $("#popovers").attr("data-content", "Tap In at " + d.Today_Tapin_Time + s1);
                $("#popovers").attr("data-original-title",d.TitleTapInOn);
                $("#popovers").attr("data-title",d.TitleTapInOn);
                }else{
                $("#popovers").attr("data-content","Today Status Absent");  
                $("#popovers").attr("data-original-title","Absent");
                $("#popovers").attr("data-title","Absent");
                }
                
                
                $("#SingleSL10Days").html(d.total_pf);
                $("#SingleSL60Days").html(d.total_ps);
                
                
				$("#Stories_Base").html('');
				$("#CheckBox_Individual").val('')
				$("#CheckBox_Individual").val(d.gs_id)
				
				
				$("#CheckBox_Family").val('')
				$("#CheckBox_Family").val(d.gfid);
                $("#Stories_Base").html(data['Stories']);
                
				
                
                $('.tooltips').tooltip();
                 //$('.popovers').tip().html(r);
                
                Person_Info(d);
                
                var FInfo = data["PInfo"][0];
                var MInfo = data["PInfo"][1];
                var FWd = data["Wd"][0];
                var MWd = data["Wd"][1];
                Parents_Info(FInfo,MInfo,FWd,MWd)
                
                
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

    /*
     * Function for Student Personal Information
    */
    function Person_Info(d)
    {
        if(d.gender=='B'){ var Gndr = "Boy"; }else{ var Gndr = "Girl"; }
        
        $("#Abridged_Name").html(d.abridged_name);
        $("#Call_Name").html(d.call_name);
        $("#Official_Name").html(d.official_name);
        $("#House").html(d.house_dname);
        $("#Date_Of_Birth").html(d.dob);
        $("#Element_grade_section").html(d.grade_name+"-"+d.section_dname);
        $("#Element_Gender").html(Gndr);
    }

/*
 * Function for Student Parento Information
 */
function Parents_Info(FInfo,MInfo,FWd,MWd)
{
    $("#Element_Father_name").html(FInfo.Name);
    $("#Element_Mother_name").html(MInfo.Name);
    $('.Father_photo').attr("data-original-title",FInfo.Name);
    $('.Mother_photo').attr("data-original-title",MInfo.Name);
    
    $("#Element_Father_cnic").html(FInfo.CNIC);
    $("#Element_Mother_cnic").html(MInfo.CNIC);
    
    $("#Element_Father_Mobile").html(FInfo.Mobile_phone);
    $("#Element_Mother_Mobile").html(MInfo.Mobile_phone);
    
    $("#Father_Speciality").html(FInfo.Speciality);
    $("#Mother_Speciality").html(MInfo.Speciality);
    
    $("#Father_Profession").html(FInfo.Profession);
    $("#Mother_Profession").html(MInfo.Profession);
    
    $("#Father_Organization").html(FWd.Organization);
    $("#Mother_Organization").html(MWd.Organization);
    
    $("#Father_Department").html(FWd.Department);
    $("#Mother_Department").html(MWd.Department);
    
    $("#Father_Designation").html(FWd.Designation);
    $("#Mother_Designation").html(MWd.Designation);
}


$('#family_id').click(function(e) {	
var Family_id = $(this).prop("id");
App.startPageLoading();
if( Family_id != '' ){

$.ajax({
	type: "POST",
	cache:true,
	url:"{{url('/student/show_fif')}}",
	data:{
		Gs_id:Family_id,
		"_token": "{{ csrf_token() }}",
	},
	dataType: "JSON",
	beforeSend: function(){},
	success: function(res){
		$("#Fif_Show").html('');
		$("#Fif_Show").html(res.fH);
		
		setTimeout(function(){ App.stopPageLoading(); $("#tab_content").modal("show"); }, 2000);
	}
	
	
	});
	
	
}	
	
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

    





    $('#staffView_Table_StaffList').filterTable({
        inputSelector: '#staffView_StaffList_Search',
        ignoreColumns: [0, 2, 3],
        
        timeout : -1,
        notFoundElement : function(){
            //$("#LastRow").show();
            alert( ".not-found" ) 
            
        },
        callback: function() {
            var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
            $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
            
            //highlightSearchResult();
            //$('.tooltips').tooltip();
            //$('.popovers').tip().html(r);
                if( totalRow == 0 ){
                $("#LastRow").show();
                }else{ 
                $("#LastRow").hide();
                }
        }
        
    });

    
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





    /***** BEGIN - Apply filter searching *****/
    $('#staffView_filter_btn .applyFilter').click(function() {
        
        var filterProfile = $('#StaffView_Filter_Profile').val() // Grade id
        var filterDepartment = $('#StaffView_Filter_Department').val() // Status
        var filterCampus = $('#StaffView_Filter_Campus').val(); // Gender
        var filterAtdStatus = $('#StaffView_Filter_Campus_House').val(); // house
        var StaffView_Filter_Badges = $('#StaffView_Filter_AtdStd').val(); // Badges


        $('#staffView_Table_StaffList tr').show();
       var table = $("#staffView_Table_StaffList");
       // var tr = table.getElementsByTagName("tr");
        var tr = $('#staffView_Table_StaffList > tbody  > tr');
        



        for (i = 0; i < tr.length; i++) {
            
            
            
            if( filterProfile != null  ){
                var td = tr[i].getElementsByTagName("td")[9];
                if (td) {
                  if (td.innerHTML.toLowerCase().indexOf(filterProfile.toLowerCase()) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }                
            }


            if(filterDepartment != null  ){
               var td = tr[i].getElementsByTagName("td")[5];
              
                if (td) {
                  if (td.innerHTML.toLowerCase().indexOf(filterDepartment.toLowerCase()) > -1) {
                    if(filterProfile == null ){
                        tr[i].style.display = "";
                    }
                  } else {
                    tr[i].style.display = "none";
                  }
                }                
            }


 // Gender
           if(filterCampus != null ) {

               
                var td = tr[i].getElementsByTagName("td")[13];
                if (td) {
                    
                    if ( td.innerHTML.toLowerCase().indexOf( filterCampus.toLowerCase() ) > -1 ) {
                      
                  if(filterProfile == null && filterDepartment == null ){
                        tr[i].style.display = "";
                    }
                    
                  } else {
                      
                        tr[i].style.display = "none";
                  }
                  
                  
                }
            }

// Badge
   if(StaffView_Filter_Badges != null ){
               var td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                  if (td.innerHTML.toLowerCase().indexOf(StaffView_Filter_Badges.toLowerCase()) > -1) {
                    if(filterProfile== null && filterDepartment== null && filterCampus== null){
                        tr[i].style.display = "";
                    }
                  } else {
                    tr[i].style.display = "none";
                  }
                }
            }
// House
            if(filterAtdStatus != null ){
               var td = tr[i].getElementsByTagName("td")[6];
                if (td) {
                  if (td.innerHTML.toLowerCase().indexOf(filterAtdStatus.toLowerCase()) > -1) {
                    if(filterProfile== null && filterDepartment== null && filterCampus== null && StaffView_Filter_Badges== null){
                        tr[i].style.display = "";
                    }
                  } else {
                    tr[i].style.display = "none";
                  }
                }
            }
            
            
            
            
            
        }



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
$(document).on("click", ".applySearch", function(){
    
        
        var By_Name                     = $('#Sort_By_Name').val();
        var By_Department_Name          = $('#Sort_By_Department_Name').val();
        var By_Attendance_Score         = $('#Sort_By_Attendance_Score').val();
        //$('#staffView_Table_StaffList tr').show();
        //var tr = $('#staffView_Table_StaffList > tbody  > tr');
        
    
       if(By_Name != null){
            if(By_Name === 'Ascending_order'){
                sortTable(1,15);
            }else if(By_Name === 'Descending_order'){
                sortTable(-1,15);
            }
        }
        
        /*if(By_Department_Name != null){
            if(By_Department_Name === 'Ascending_order'){
                sortTable(1,9);
            }else if(By_Department_Name === 'Descending_order'){
                sortTable(-1,9);
            }
        }*/
        
        if(By_Attendance_Score != null){
            if(By_Attendance_Score === 'High_to_Low'){
                sortTable(-1,14);
            }else if(By_Attendance_Score === 'Low_to_High'){
                sortTable(1,14);
            }
        }



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
        $('#StaffView_Filter_Profile').val('');
        $('#StaffView_Filter_Department').val('');
        $('#StaffView_Filter_Campus').val('');
        $('#StaffView_Filter_Campus_House').val('');
        
        $('#StaffView_Filter_AtdStd').val('');
        

        $('#staffView_StaffList_Search').val('');
        $('#staffView_Table_StaffList tr').show();

        var totalRow =  $('#staffView_Table_StaffList tr:visible').length - 1;
        $('#staffView_StaffList_Total').text('STAFF LIST - ' + totalRow);
    });
    /***** END - Cancel filter searching *****/

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
            rules: {
                 Badge_Title: { required: true },
                    Badge_Code: { required: true, },
                    //Expiry_Date: { required: true,  },
                  
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success2.hide();
                    error2.show();
                    App.scrollTo(error2, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
                },

                unhighlight: function (element) { // revert the change done by hightlight
                     $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

              
                 success: function (label, element) {
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


	$('#staffView_search_btn33 .applySearch').click(function() {
		
		var Student_id 			= $("#Student_id").val();
		var Gs_id 				= $("#Gs_id").val();
		var Sort_By_Source 		= $("#Sort_By_Source").val(); // Drop down user, system
		var Academic_id 		= $("#Academic_id").val();
		
		var Search_Cat = $('input[name^="Search_Cat"]').serialize();
		
		if( $('#Search_Cat_Finance').is(':checked') ){ var Search_Cat_Finance 	= $("#Search_Cat_Finance").val(); }else{ var Search_Cat_Finance =''; }
		if( $('#Search_Cat_Academic').is(':checked') ){ var Search_Cat_Academic 	= $("#Search_Cat_Academic").val(); }else{ var Search_Cat_Academic =''; }
		if( $('#Search_Cat_Etab').is(':checked') ){ var Search_Cat_Etab 	= $("#Search_Cat_Etab").val(); }else{ var Search_Cat_Etab =''; }
		if( $('#Search_Cat_SIS').is(':checked') ){ var Search_Cat_SIS 	= $("#Search_Cat_SIS").val(); }else{ var Search_Cat_SIS =''; }
		if( $('#Search_Cat_Family').is(':checked') ){ var Search_Cat_Family 	= $("#Search_Cat_Family").val(); }else{ var Search_Cat_Family =''; }
		
		var from_date = $("#from_date").val();
		var to_date	  = $("#to_date").val();
		
		$("#Filter_User_Comments .toggler4").hide();
		$("#Filter_User_Comments .theme-options4").show();
		$(".toggler4").show();
		$(".toggler4-close").hide();
		$(".theme-options4").hide();
		
		App.startPageLoading();
		
		setTimeout(function(){ 
			$("#Stories_Base").html(''); 
		}, 1000);
		
		var checked = []
		$("input[name='Search_Cat[]']:checked").each(function ()
		{
			checked.push($(this).val());
		});


		if( Sort_By_Source != '' ){
			setTimeout(function(){ 
			
		$.ajax({
			type:"POST",
			cache:true,
			url:"{{url('/student/search_comments')}}",
			data:{ 
				Student_id:Student_id,
				Gs_id:Gs_id,
				Academic_id:Academic_id,
				SortBySource:Sort_By_Source,
				Search_Cat_Finance:checked,
				
				from_date:from_date,
				to_date:to_date,
				"_token": "{{ csrf_token() }}", 
			},
			success:function(res){
				$(".toggler4").show();
				$(".toggler4-close").hide();
				$(".theme-options4").hide();
				
				$("#Stories_Base").html('');
				$("#Stories_Base").html(res);
			},
			
			
        });
		
		}, 2000);
		
		setTimeout(function(){ App.stopPageLoading(); }, 4000);
		
		//$("#Sort_By_Source").val(''); // Drop down user, system
		
		}// end if
		
	});
    
	
	$('#staffView_search_btn33 .clearSearch').click(function() { 
		$("input[name='Search_Cat[]']:checked").each(function ()
		{
			$(this).attr("checked",false);
		});
		
		$("#from_date").val('');
		$("#to_date").val('');
		$("#Sort_By_Source").val('');
	});

    $("#commentType .hide_hide").click(function(){
		$("#commentType .dropdown-menuu").hide();
		$("#commentType .hide_hide").hide();
		$("#commentType .show_show").show();
    });
    $("#commentType .show_show").click(function(){
		$("#commentType .dropdown-menuu").show();
		$("#commentType .hide_hide").show();
		$("#commentType .show_show").hide();
    });

	
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
                                    
                                    
                            loadScript("{{ URL::to('metronic') }}/pages/scripts/form-validation.min.js", function(){
							loadScript("{{ URL::to('metronic') }}/pages/scripts/ui-toastr.min.js", function(){
                                
                                loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
									
                                    loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
                                        loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction);
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