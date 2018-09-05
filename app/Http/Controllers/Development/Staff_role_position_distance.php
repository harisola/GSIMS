<?php
/******************************************************************
* Author : Kashif Solangi
* Description: Staff_role_position_distance
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Information\StaffInformationModel;
use App\Models\Staff\Staff_Information\Edit_delete_management_model;

class Staff_role_position_distance extends StaffReportController
{
	public function Layout_html(Request $request){
		
		$Staff_id = $request->input('Staff_id');
		
		
		$staffInfo = new StaffInformationModel();
		
		$Sql_query = "select p.id as Role_id, if( (right(p.roleCode,1)='A' or right(p.roleCode,1)='I'), 'Primary','Secondary') as SRole_Type from atif_role_org.role_position as p where p.staff_id=".$Staff_id."  order by p.roleCode ";
		$Staff_role = $staffInfo->GetKashif($Sql_query);
		
		$StaffRole = count($Staff_role);
		
		$ht='';
		
		if ( !empty($Staff_role) ){
			$Role_id = $Staff_role[0]->Role_id;
			
			if( $StaffRole == 1){
				$ht = $this->Single_Role_Staff_Html($Role_id,$Staff_id);
			}else{
				$ht = $this->Double_Role_Staff_Html($Staff_role,$Staff_id);	
			}
		}
		
		
		
		// Neche wale role CALL `sp_get_role_info`('125')
		// Upper walie role CALL `sp_get_role_upward_info`('125')
		
		
		
		$arr = array("ht"=>$ht);
		echo json_encode($arr);
		
	}
	
	
	
	public function Layout_html2(Request $request){
		
		
		
		$staffInfo = new StaffInformationModel();
		
		$Staffid =Sentinel::getUser()->id;
		
		
		$SQL_Get_Id = "select u.id as USER_ID from atif_gs_sims.users as gu  left join atif.staff_registered as u ON ( (u.gg_id LIKE CONCAT('%',SUBSTRING_INDEX( gu.email, '@' , 1 ),'%')) ) where gu.id=".$Staffid."";
		$User_id = $staffInfo->GetKashif($SQL_Get_Id);
		
		
		
		
		if( !empty($User_id) ){
			$Staff_id = $User_id[0]->USER_ID;	
		}else{
			$Staff_id = 0;
		}
		
		$ht='';
		
		
		if( $Staff_id > 0 ){
		$Sql_query = "select p.id as Role_id, if( (right(p.roleCode,1)='A' or right(p.roleCode,1)='I'), 'Primary','Secondary') as SRole_Type from atif_role_org.role_position as p where p.staff_id=".$Staff_id."  order by p.roleCode ";
		$Staff_role = $staffInfo->GetKashif($Sql_query);
		
		$StaffRole = count($Staff_role);
		
		
		
		
		
		if ( !empty($Staff_role) ){
			$Role_id = $Staff_role[0]->Role_id;
			
			if( $StaffRole == 1){
				$ht = $this->Single_Role_Staff_Html($Role_id,$Staff_id);
			}else{
				$ht = $this->Double_Role_Staff_Html($Staff_role,$Staff_id);	
			}
		}
		
		
		
		}else{
			
			$ht = "No Record Found!";
		}
		
		$arr = array("ht"=>$ht);
		echo json_encode($arr);
		
	}
	
	
	
	/*
		------------------------------------------------------------------
			Staff With Single Role Upper and Lower 
		------------------------------------------------------------------
	*/
	public function Single_Role_Staff_Html($Staff_role_id,$Staff_id)
	{
		$staffInfo = new StaffInformationModel();
		$Staff_role = $staffInfo->Get_Staff_Role($Staff_role_id);
		
		
		$Html = '';
		$Html .= '<div class="portlet box light">';
		$Html .= '<div class="portlet-body padding0" >';
		$Html .= '<table width="100%" class="rolesTable"> ';
		
		
		$Last_Role=0;
		$Current_Staff_Last_Role=0;
		
		// Upper Role
		if( !empty( $Staff_role ) ):
		foreach($Staff_role as $ST ):
			if($ST->gt_id != ''):
				$Html .= '<tr class="pBottom10" >';
				$Html .= '<td width="50%" class="padRight1">';
				$Percent=50;
					$Html .= $this->Staff_Upper_Role($ST,$Percent);
				$Html .= '</td>';
				$Html .= '</tr>';
				$Last_Role = $ST->id; // Current Staff Head Role id
			endif;
		endforeach;
		endif;
		//echo $Last_Role; exit;
		
		// Current Staff Role
		if( $Last_Role > 0 ){
			
			$Staff_Roles = $staffInfo->Get_Current_Staff_Role($Last_Role);
			#var_dump($Staff_Roles); exit;

			$Percent=50;
			if( !empty( $Staff_Roles ) ):
				foreach($Staff_Roles as $ST):
				
					if($ST->s1 == $Staff_id){
						
						if($ST->s1 == $Staff_id)
							$currentStaff = 'currentStaff';
						else
							$currentStaff='';
					
						$Html .= '<tr class="pBottom10 '.$currentStaff.'" >';
						$Html .= '<td width="50%" class="padRight1">';
							$Html .= $this->Current_Staff_Html($ST,$Staff_id,$Percent);
						$Html .= '</td>';
						$Html .= '</tr>';
					
						$Current_Staff_Last_Role = $ST->id; // Current Staff Head Role id
					}
				endforeach;
			endif;
		}
		
		
		// Current Staff Role Lower Staff
		if( $Current_Staff_Last_Role > 0 ){
			$Current_Staff_Last_Role = $staffInfo->Get_Current_Staff_Role($Current_Staff_Last_Role);
			$Percent=50;
			$LowerStff_id=0;
			
			if( !empty( $Current_Staff_Last_Role ) ):
				foreach($Current_Staff_Last_Role as $ST):
				
					if($ST->s1 == $Staff_id)
						$currentStaff = 'currentStaff';
					else
						$currentStaff='';
					
					
					if($LowerStff_id != $ST->s1):
					$Html .= '<tr class="pBottom10 '.$currentStaff.'" >';
					$Html .= '<td width="50%" class="padRight1">';
						$Html .= $this->Staff_Lower_Role($ST,$Staff_id,$Percent);
					$Html .= '</td>';
					$Html .= '</tr>';
					
					$Current_Staff_Last_Role = $ST->id; // Current Staff Head Role id
					$LowerStff_id=$ST->id;
					endif;
					
				endforeach;
			endif;
		}
		
		
		
		
        $Html .= '</table>';
		$Html .= '</div>';
		$Html .= '</div>';
		
		return $Html;
	}
	// Upper Staff HTML
	public function Staff_Upper_Role($ST,$Percent)
	{
		$Html_Current = '';
		//$Html_Current .= '<tr class="pBottom10" >';
		//$Html_Current .= '<td width="50%" class="padRight1">';
		
		$Html_Current .= '<table width="'.$Percent.'%">';
			$Html_Current .= '<tbody class="innerTbodyStaff">';
				$Html_Current .= '<tr class="Row" data-attendance="Absent" data-campus="South" data-profile="VP/HM" data-department="Principal, Generations School" style="display: table-row;">';
					$Html_Current .= '<td class="">';
						$Html_Current .= '<img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="'.$ST->gt_id.'" src="'.$ST->photo150.'" />';
					$Html_Current .= '</td>';
					$Html_Current .= '<td class="staffView_StaffName">';
						$Html_Current .= '<span class="leftInformationRoleStaff">';
						$Html_Current .= '<a class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="'.$ST->name_code.'" data-staffid="'.$ST->id.'" data-staffgtid="'.$ST->gt_id.'" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">';
						$Html_Current .= $ST->abridged_name;
						$Html_Current .= '</a>';
						$Html_Current .= '-';
						$Html_Current .= '<small class="tooltips" data-container="body" data-placement="top" data-original-title="'.$ST->gg_id.'">';
						$Html_Current .= $ST->name_code;
						$Html_Current .= '</small>';
						$Html_Current .= '<br>';
						$Html_Current .= '<small class="shortHeight">';
							//$Html_Current .= '<span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">';
							//$Html_Current .= $ST->finalGrade;
							//$Html_Current .= '</span>'; 
							$Html_Current .= '<span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">';
							//$Html_Current .= $ST->d10. ' '.$ST->role_cat;
							$Html_Current .= $ST->role_cat;
							$Html_Current .= '</span>'; 
							$Html_Current .= '<span class="tooltips" data-container="body" data-placement="top" data-original-title="'.$ST->role_title_tl.'"> ';
							$Html_Current .= $ST->role_title_tl;
							$Html_Current .= '</span>';
							$Html_Current .= '</small>';
						$Html_Current .= '</span>';
						$Html_Current .= '<span class="rightInformationRoleStaff">';
						$Html_Current .= '<span class="rolesRelations">';
						$Html_Current .= $ST->d10. ' '.$ST->finalGrade;
						$Html_Current .= '</span>';
						$Html_Current .= '</span>';
					$Html_Current .= '</td>';
				$Html_Current .= '</tr>';
			$Html_Current .= '</tbody>';
		$Html_Current .= '</table>';
		
		//$Html_Current .= '</td>';
		//$Html_Current .= '</tr>';
		return $Html_Current;
	}
	
	
	
	// Lower Staff HTML
	public function Staff_Lower_Role($ST, $Staff_id,$Percent)
	{
		
		if($ST->s1 == $Staff_id)
			$currentStaff = 'currentStaff';
		else
			$currentStaff='';
		
		$Html_Current = '';
		//$Html_Current .= '<tr class="pBottom10 '.$currentStaff.'" >';
		//$Html_Current .= '<td width="50%" class="padRight1">';
		
		$Html_Current .= '<table width="'.$Percent.'%">';
			$Html_Current .= '<tbody class="innerTbodyStaff">';
				$Html_Current .= '<tr class="Row" data-attendance="Absent" data-campus="South" data-profile="VP/HM" data-department="Principal, Generations School" style="display: table-row;">';
					$Html_Current .= '<td class="">';
						$Html_Current .= '<img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="'.$ST->gt_id.'" src="'.$ST->photo150.'" />';
					$Html_Current .= '</td>';
					$Html_Current .= '<td class="staffView_StaffName">';
						$Html_Current .= '<span class="leftInformationRoleStaff">';
						$Html_Current .= '<a class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="'.$ST->name_code.'" data-staffid="'.$ST->id.'" data-staffgtid="'.$ST->gt_id.'" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">';
						$Html_Current .= $ST->abridged_name;
						$Html_Current .= '</a>';
						$Html_Current .= '-';
						$Html_Current .= '<small class="tooltips" data-container="body" data-placement="top" data-original-title="'.$ST->gg_id.'">';
						$Html_Current .= $ST->name_code;
						$Html_Current .= '</small>';
						$Html_Current .= '<br>';
						$Html_Current .= '<small class="shortHeight">';
							//$Html_Current .= '<span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">';
							//$Html_Current .= $ST->finalGrade;
							//$Html_Current .= '</span>'; 
							$Html_Current .= '<span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">';
							//$Html_Current .= $ST->finalDistance. ' '.$ST->role_cat;
							$Html_Current .= $ST->role_cat;
							$Html_Current .= '</span>'; 
							$Html_Current .= '<span class="tooltips" data-container="body" data-placement="top" data-original-title="'.$ST->role_title_tl.'"> ';
							$Html_Current .= $ST->role_title_tl;
							$Html_Current .= '</span>';
							$Html_Current .= '</small>';
						$Html_Current .= '</span>';
						$Html_Current .= '<span class="rightInformationRoleStaff">';
						$Html_Current .= '<span class="rolesRelations">';
						$Html_Current .= $ST->finalDistance. ' '.$ST->finalGrade;
						$Html_Current .= '</span>';
						$Html_Current .= '</span>';
					$Html_Current .= '</td>';
				$Html_Current .= '</tr>';
			$Html_Current .= '</tbody>';
		$Html_Current .= '</table>';
	//	$Html_Current .= '</td>';
	//	$Html_Current .= '</tr>';
		return $Html_Current;
	}
	
	
	
	
	
	// Current Staff HTML
	public function Current_Staff_Html($ST, $Staff_id,$Percent)
	{
		
		if($ST->s1 == $Staff_id)
			$currentStaff = 'currentStaff';
		else
			$currentStaff='';
		
		$Html_Current = '';
		//$Html_Current .= '<tr class="pBottom10 '.$currentStaff.'" >';
		//$Html_Current .= '<td width="50%" class="padRight1">';
		
		$Html_Current .= '<table width="'.$Percent.'%">';
			$Html_Current .= '<tbody class="innerTbodyStaff">';
				$Html_Current .= '<tr class="Row" data-attendance="Absent" data-campus="South" data-profile="VP/HM" data-department="Principal, Generations School" style="display: table-row;">';
					$Html_Current .= '<td class="">';
						$Html_Current .= '<img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="'.$ST->gt_id.'" src="'.$ST->photo150.'" />';
					$Html_Current .= '</td>';
					$Html_Current .= '<td class="staffView_StaffName">';
						$Html_Current .= '<span class="leftInformationRoleStaff">';
						$Html_Current .= '<a class="primary-link tooltips profile_StaffName" data-container="body" data-placement="top" data-original-title="'.$ST->name_code.'" data-staffid="'.$ST->id.'" data-staffgtid="'.$ST->gt_id.'" data-src="http://10.10.10.50/gsims/public/metronic/pages/img/AbsentIcon.png" data-content="Tap In awaited" data-title="Absent">';
						$Html_Current .= $ST->abridged_name;
						$Html_Current .= '</a>';
						$Html_Current .= '-';
						$Html_Current .= '<small class="tooltips" data-container="body" data-placement="top" data-original-title="'.$ST->gg_id.'">';
						$Html_Current .= $ST->name_code;
						$Html_Current .= '</small>';
						$Html_Current .= '<br>';
						$Html_Current .= '<small class="shortHeight">';
							//$Html_Current .= '<span class="staffStatus T tooltips" data-container="body" data-placement="top" data-original-title="T-CPM: Permanent">';
							//$Html_Current .= $ST->finalGrade;
							//$Html_Current .= '</span>'; 
							$Html_Current .= '<span class="staffStatus A tooltips" data-container="body" data-placement="top" data-original-title="Reporting To">';
							//$Html_Current .= $ST->finalDistance. ' '.$ST->role_cat;
							$Html_Current .= $ST->role_cat;
							$Html_Current .= '</span>'; 
							$Html_Current .= '<span class="tooltips" data-container="body" data-placement="top" data-original-title="'.$ST->role_title_tl.'"> ';
							$Html_Current .= $ST->role_title_tl;
							$Html_Current .= '</span>';
							$Html_Current .= '</small>';
						$Html_Current .= '</span>';
						
						/*$Html_Current .= '<span class="rightInformationRoleStaff">';
						$Html_Current .= '<span class="rolesRelations">';
						$Html_Current .= $ST->finalDistance. ' '.$ST->finalGrade;
						$Html_Current .= '</span>';
						$Html_Current .= '</span>';*/
						
					$Html_Current .= '</td>';
				$Html_Current .= '</tr>';
			$Html_Current .= '</tbody>';
		$Html_Current .= '</table>';
	//	$Html_Current .= '</td>';
	//	$Html_Current .= '</tr>';
		return $Html_Current;
	}
	
	
	
	public function Empty_Role_Table($Percent=NULL)
	{
		$Table = '';
		$Table .= '<table width="'.$Percent.'%">';
		$Table .= '<tbody class="innerTbodyStaff"></tbody>';
		$Table .= '</table>';
		return $Table;
		
	}
	public function Double_Role_Staff_Html($Staff_role, $Staff_id)
	{
		// Two Roles
		$staffInfo = new StaffInformationModel();

		
		
		if( !empty( $Staff_role ) ):
		
			
			$Staff_role_id_one = $Staff_role[0]->Role_id;
			$Staff_role_id_Two = $Staff_role[1]->Role_id;
			
			
			// upwards roles 
			$Role_id_one = $staffInfo->Get_Staff_Role($Staff_role_id_one);
			$Role_id_Two = $staffInfo->Get_Staff_Role($Staff_role_id_Two);
			
			
			$Role_One_Counter=1;
			// Total upwards role count role 1
			foreach($Role_id_one as $rt)
			{
				if($rt->staff_id > 0 )
				{
					$Role_One_Counter++;	
				}
			}
			
			// Total upwards role count role 2
			$Role_Two_Counter=1;
			foreach($Role_id_Two as $rt)
			{
				if($rt->staff_id > 0 )
				{
					$Role_Two_Counter++;	
				}
			}
			
			
			//$CountRoleOne = count($Role_id_one);
			//$CountRoleTwo = count($Role_id_Two);
			$CountRoleOne =$Role_One_Counter;
			$CountRoleTwo =$Role_Two_Counter;
			
			
			
			$numRole1 =0;
			$numRole2 =0;
			
			if( $CountRoleOne >= $CountRoleTwo)
			{
				$LoopCounter=$CountRoleOne;
				$numRole1 = ($CountRoleOne-$CountRoleTwo);
			}else
			{
				$LoopCounter=$CountRoleTwo;	
				$numRole2 = ($CountRoleTwo-$CountRoleOne);
			}
			
		
		
		endif; // if not empty
		
		

		
		$Html = '';
		$Html .= '<div class="portlet box light"><div class="portlet-body padding0" >';
		//var_dump($CountRoleOne); exit;
		
		$Html .= '<table width="100%" class="rolesTable">';
		
		$Percent=100;
		// Double upper Role
		for($counter=0; $counter<$LoopCounter; $counter++){
			
		if
		(
			(isset( $Role_id_one[$counter]->staff_id ) && $Role_id_one[$counter]->staff_id > 0 ) 
			|| 
			(isset( $Role_id_Two[$counter]->staff_id ) && $Role_id_Two[$counter]->staff_id > 0 ) 
		):
		


		$Html .= '<tr class="pBottom10">';
			$Html .= '<td width="50%" class="padRight1">';
			if( !empty( $Role_id_one ) ) :
				if( isset( $Role_id_one[$counter]->staff_id  ) && $Role_id_one[$counter]->staff_id > 0  ):
					$Last_Role1=0;
					$Html .= $this->Staff_Upper_Role( $Role_id_one[$counter], $Percent);
					$Last_Role1 = $Role_id_one[$counter]->id; // Current Staff Head Role id
				else:
					$Percent=100;
					$Html .= $this->Empty_Role_Table($Percent);
				endif;
			endif;
		$Html .= '</td>';
		
		
		
		
		
			
			
			
			// Upper Role
			/*if( $numRole2 > $counter ){
				$Percent=100;
				$Html .= $this->Empty_Role_Table($Percent);
			}else{*/
				
			if( !empty( $Role_id_Two ) ):
				$Html .= '<td width="50%" class="padLeft1">';
				if( isset( $Role_id_Two[$counter]->staff_id  ) && $Role_id_Two[$counter]->staff_id > 0  ):
					$Last_Role2=0;
					$Html .= $this->Staff_Upper_Role($Role_id_Two[$counter],$Percent);
					$Last_Role2 = $Role_id_Two[$counter]->id; // Current Staff Head Role id
				else:
					$Percent=100;
					$Html .= $this->Empty_Role_Table($Percent);
				endif;
				$Html .='</td>';
			endif;
			//}
		
		
		$Html .='</tr>';
		
		endif;
		} // end Loop
		
	  
		
		// Current Staff Role Double
		
		$Double_Role_Array_id = array();
		/*echo "<br />";
		echo $Last_Role1;
		echo "<br />";
		echo "<br />";
		echo "<br />";
		echo $Last_Role2;
		
		echo "<br />";
		echo $Staff_role_id_one;
		echo "<br />";
		echo $Staff_role_id_Two;
		echo "<br />";
		
		exit;*/
		
		if( $Last_Role1 > 0 ){
			$Staff_Roles = $staffInfo->Get_Current_Staff_Role_Single($Last_Role1, $Staff_role_id_one);

			
			
			$Html .= '<tr class="pBottom10 currentStaff" >';
			
			$Switch = TRUE;
			$Percent=100;
			if( !empty( $Staff_Roles ) ):
				
				foreach($Staff_Roles as $ST):
				if($ST->s1 == $Staff_id){
						$Html .= '<td class="padRight1">';
							$Html .= $this->Current_Staff_Html($ST, $Staff_id, $Percent);
						$Html .= '</td>';
						$Switch = FALSE;
					array_push($Double_Role_Array_id, $ST->id );
				}
				endforeach;
				
			else:
				$Html .= '<td class="padRight1">';
				$Percent=100;
				$Html .= $this->Empty_Role_Table($Percent);			
				$Html .= '</td>';
				
			endif;
			
		}
		
		
		
		if( $Last_Role2 > 0 ){
				
			$Staff_Roles2 = $staffInfo->Get_Current_Staff_Role_Single($Last_Role2, $Staff_role_id_Two);
			
			
			$Percent=100;
			if( !empty( $Staff_Roles2 ) ):
				
				foreach($Staff_Roles2 as $ST):
				if($ST->s1 == $Staff_id){
						//$Html .= '<td class="padLeft1">';
							//$Html .= $this->Current_Staff_Html($ST, $Staff_id, $Percent);
						//$Html .= '</td>';
					array_push($Double_Role_Array_id, $ST->id );
				}
				endforeach;
			else:
			//	$Html .= '<td class="padLeft1">';
				$Percent=100;
				//$Html .= $this->Empty_Role_Table($Percent);			
				//$Html .= '</td>';
			endif;
			
			$Html .= '</tr>';
			
		}else{ 
			$Html .= '</tr>';
		}
		
		
		
		// pahnje role jee hethya wara role 
		//var_dump( $Double_Role_Array_id ); exit;
		
		if( sizeof( $Double_Role_Array_id ) > 1 ){
			
			$DRole_id_one= $Double_Role_Array_id[1]; 
			$DRole_id_Two= $Double_Role_Array_id[2];
			
			
			$DRoleIdOne = $staffInfo->Get_Current_Staff_Role($DRole_id_one);
			$DRoleIdTwo = $staffInfo->Get_Current_Staff_Role($DRole_id_Two);
			
			$CountRoleOne = count($DRoleIdOne); 
			$CountRoleTwo = count($DRoleIdTwo); 
			
			$numRole1 =0;
			$numRole2 =0;
			
			if( $CountRoleOne >= $CountRoleTwo)
			{
				$LoopCounter=$CountRoleOne;
				$numRole1 = ($CountRoleOne-$CountRoleTwo);
			}else
			{
				$LoopCounter=$CountRoleTwo;	
				$numRole2 = ($CountRoleTwo-$CountRoleOne);
			}
			
			
		$Percent=100;
		
		for($counter=0; $counter<$LoopCounter; $counter++){
			
		
		$Html .= '<tr class="pBottom10">';
		
			$Html .= '<td class="padRight1">';
			$Last_Role=0;
			
			
				
				if( !empty( $DRoleIdOne != '' ) ):
					if( isset( $DRoleIdOne[$counter]->gt_id ) ):
						$Html .= $this->Staff_Lower_Role( $DRoleIdOne[$counter],  $Staff_id, $Percent);
						$Last_Role1 = $DRoleIdOne[$counter]->id; // Current Staff Head Role id
					else:
						$Percent=100;
						$Html .= $this->Empty_Role_Table($Percent);
					endif;
				endif;
				
			
			
			$Html .= '</td>';
		
		$Html .= '<td class="padLeft1">';
			
			$Last_Role2=0;
			
			// Upper Role
			
			
			if( !empty( $DRoleIdTwo != '' ) ):
				if( isset( $DRoleIdTwo[$counter]->gt_id ) ):
					$Html .= $this->Staff_Lower_Role($DRoleIdTwo[$counter], $Staff_id, $Percent);
					$Last_Role2 = $DRoleIdTwo[$counter]->id; // Current Staff Head Role id
					
				else:
					$Percent=100;
					$Html .= $this->Empty_Role_Table($Percent);
				endif;
			endif;
				
			
			
		$Html .='</td>';
		$Html .='</tr>';
		} // end Loop
		
		
		}else{
			if( !empty( $Double_Role_Array_id  ) ) :
			$DRole_id_one= $Double_Role_Array_id[0];
			$Current_Staff_Last_Role = $staffInfo->Get_Current_Staff_Role($DRole_id_one);
			else:
			
			endif;
			
			
		}
		
		$Html .= '</table>';
		$Html .= '</div>';
		$Html .= '</div>';
		
		return $Html;
	}
}
	