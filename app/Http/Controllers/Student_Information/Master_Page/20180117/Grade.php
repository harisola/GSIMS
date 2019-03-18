<?php
/*
 * ----------------------------------------------
 * 	    Student Information Module
 * ----------------------------------------------
 *  Title: Student Information Controller.
 *	Descr: This Module Will Display All The Information Related
 *	       To Student. Such As Name,Family,Attendance, Time Scheduling
 *		   Grade Score. And Many More...
 *	Author: Kashif Solangi.
 *  Company: Generations School.
 *	Email: k.solangi@generations.edu.pk. 
		   kashif.machie@gmail.com.
 * ---------------------------------------------
 */
namespace App\Http\Controllers\Student_Information\Master_Page;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Storage;
#use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
#use App\Models\Student\Student_Information\Student_Information;

class Grade extends Controller
{
	public function Students(Request $request)
	{
	
		$userID = Sentinel::getUser()->id;
		$StdInfo = new Student_Information();
		
		$reqGradeID = 6;
		$reqSectionID = 8;
		$Grade=0;
		$Section=0;
		
		
		
		if($request->has('grade_id') && $request->has('section_id')){
			
			$reqGradeID = $request->grade_id;
			$reqSectionID = $request->section_id;
			$Grade=$reqGradeID;
			$Section=$reqSectionID;
			$Students = $StdInfo->getStudent($Grade, $Section);
			//$Fence = $StdInfo->Fence($Grade, $Section);
			$Teachers = $this->Grade_Section_Teacher( $Grade,$Section );
			$Badges = $this->Badges( $Grade,$Section );
			$School_level_Student=0;
			
			$Attendance_Score = $StdInfo->Today_Score($Grade, $Section);
			 
			$Fence = $StdInfo->Count_Fence($Grade, $Section);
			
		}else{
			$Students = $StdInfo->getSchoolLevelStudent();
			$Fence = array();
			$Teachers = array();
			$Attendance_Score=array();
			
			$Badges = '';
			$School_level_Student=1;
		}
		
		
	$Cmm_Cat = "SELECT  cc.ID as Category_id, cc.category_name as Category_name FROM atif_student_log.comment_category as cc WHERE cc.Type='Comments' AND cc.record_deleted=0";
	$CommCat = DB::connection('mysql')->select($Cmm_Cat);
	//var_dump( $CommCat ); exit;
	$userInfo = $StdInfo->GetCurrentInfo($userID);
	return view('master_layout.student.student_view')->with(array('Students' => $Students, "Fence" =>$Fence, "Tchrs" => $Teachers, "_Badges" => $Badges, 'sectionID' => $Section,"userInfo"=>$userInfo, "School_level_Student"=>$School_level_Student, "Attendance_Score"=>$Attendance_Score, "CommCat" =>$CommCat));
	
	}
	
	public function Get_Current_User_Info($userID)
	{
		
	}


	public function Students_SubjectTeacher(Request $request)
	{
		$userID = Sentinel::getUser()->id;
		$StdInfo = new Student_Information();
		$reqGradeID = 0;
		$reqSubjectID = 0;
		$reqGroupID = 0;
		$reqBlockID = 0;
		$classTitle = '';
		$Section=0;
		
		$School_level_Student=1;
			
		if($request->has('GradeID') && $request->has('SubjectID') && $request->has('GroupID') && $request->has('BlockID')){
			$reqGradeID = $request->GradeID;
			$reqSubjectID = $request->SubjectID;
			$reqGroupID = $request->GroupID;
			$reqBlockID = $request->BlockID;
			$classTitle = $request->classTitle;
			$School_level_Student=0;
		}


        $Students = $StdInfo->getStudent_SubjectTeacher($reqGradeID,$reqSubjectID,$reqGroupID,$reqBlockID);
		$Fence = null;
		$Teachers = null;
		$Badges = $this->Badges($reqGradeID, 0);
		
		// var_dump( $Teachers ); exit;
		//var_dump( $Students ); exit;
		
		//return view('master_layout.student.student_view_subjectteacher')->with(array('Students' => $Students, "Fence" =>$Fence, "Tchrs" => $Teachers, "_Badges" => $Badges, 'sectionID' => 0, 'cTitle' =>  $classTitle ));
		
		$userInfo = $StdInfo->GetCurrentInfo($userID);
		return view('master_layout.student.student_view_subjectteacher')->with(array('Students' => $Students, "Fence" =>$Fence, "Tchrs" => $Teachers, "_Badges" => $Badges, 'sectionID' => 0, 'cTitle' =>  $classTitle, 'sectionID' => $Section,"userInfo"=>$userInfo, "School_level_Student"=>$School_level_Student  ));
		
		
	} 


public function Student_Stories(Request $request)
{
	echo 3; exit;
	
	$query = "select
	cl.id as Student_id, cl.gs_id, cl.abridged_name, cl.call_name, cl.grade_name, cl.section_name, cl.gr_no as Photo_id,
	cl.section_id as Section_id, cl.section_dname as Section_name, 
	CONCAT(cl.grade_name, '-', cl.section_name) as class, cl.std_status_code,
	cl.gfid, sfr.name as father_name, cl.class_no, cl.house_name, cl.gender
	from atif.class_list as cl
	left join (select sfr.gf_id, sfr.name from atif.student_family_record as sfr where sfr.parent_type = 1 group by sfr.gf_id) as sfr
		on sfr.gf_id = cl.gf_id
	where cl.std_status_category = 'Student'
	order by cl.generation_of desc, cl.section_id, cl.call_name, cl.abridged_name limit 1" ;
	
	$result = DB::connection('mysql')->select($query);
	
	$uer_id = Sentinel::getUser()->id;
	
	$query_u = "select sr.abridged_name, sr.employee_id as ephoto_id, sr.gender as Gender  


from atif.staff_registered as sr 
left join atif_gs_sims.users as gu on gu.email=sr.gg_id

where gu.id=".$uer_id."";
	$result_u = DB::connection('mysql')->select($query_u);
	$Current_user_pic = array();
	if( !empty($result_u) )
	{
		$abridged_name = $result_u[0]->abridged_name;
			
		$Current_user_pic = $this->get_Staff_Pic( $result_u[0]->ephoto_id,  $result_u[0]->Gender);
		//var_dump( $pic ); exit;
		
	}else 
	{
		$abridged_name = 'Right Individual';
	}
	

		
	$i = 0;
    foreach ($result as $u) {
	    $pic = $this->get_Student_Pic($u->Photo_id);
	    $result[$i]->photo500 = $pic['photo500'];
	    $result[$i]->photo150 = $pic['photo150'];
	    $i++;
    }

	
	$Stories_limit = 30;
	$stories = $this->getStories(0, $Stories_limit);
	
    $i = 0;
    foreach ($stories as $u) {
	    $pic = $this->get_Staff_Pic($u->actions, $u->gender);
	    $stories[$i]->photo500 = $pic['photo500'];
	    $stories[$i]->photo150 = $pic['photo150'];
	    $i++;
    }

	$Section_ids = " select cl.section_id as Section_id, cl.section_dname as Section_name from atif.class_list as cl group by cl.section_id  order by cl.section_id ";
	$Section_ids = DB::connection('mysql')->select($Section_ids);
	
	$Grade_PG = " select cl.section_id as Section_id, cl.section_dname as Section_name from atif.class_list as cl where cl.grade_id = 17 group by cl.section_id ";
	$Grade_PG = DB::connection('mysql')->select($Grade_PG);
	$North = "select cl.section_id as Section_id, cl.section_dname as Section_name from atif.class_list as cl where cl.grade_id > 4 and cl.grade_id < 17 group by cl.section_id ";
	$North = DB::connection('mysql')->select($North);
	$Section_ids_full = "select cl.section_id as Section_id, cl.section_dname as Section_name from atif.class_list as cl where cl.grade_id > 4 and cl.grade_id < 17 group by cl.section_id ";
	$Section_ids_full = DB::connection('mysql')->select($Section_ids_full);
	
	
	

	
	return view('master_layout.student.student_stories')->with(['students'=>$result, 'stories'=>$stories, "Stories_limit"=>$Stories_limit, 'login_user'=>Sentinel::getUser()->id,"abridged_name_staff" => $abridged_name, "Current_user_pic"=>$Current_user_pic, "Section_ids" => $Section_ids_full, "Grade_PG" => $Grade_PG,"North" => $North, "Full_School"=>$Section_ids  ]);

}

// Function for getting Grade section name
public function Get_Section(Request $request)
{
	
	$Grade_id = $request->input('Grade_id');
	$count = count( $Grade_id );
	$result = array();
	$Query = "";
	if( $count > 0 )
	{
		$Query = " select cl.section_id as Section_id, cl.section_dname as Section_name from atif.class_list as cl ";
		if( $count == 1 )
		{
			$Query .= " where cl.grade_name='".$Grade_id[0]."'";
		}
		else
		{
			$Query .= " where ( ";
			$true = TRUE;
			$counter=1;
			foreach( $Grade_id as $Grade_ids)
			{
				$Query .= " cl.grade_name='".$Grade_ids."' ";
				if( $counter != $count )
				{
					$Query .= " OR ";
				}
				$counter++;
			}
			$Query .= " ) ";
		}
		$Query .= " group by cl.section_id ";
		$Query .= " order by cl.section_id ";
		$result = DB::connection('mysql')->select( $Query );
	}
	return  response()->json(["Section_id"=>$result]);
}

public function Students_Stories( Request $request )
{
	$Student_id = $request->input('Student_id');
	
	


    $stories = $this->Get_Student_Stories($Student_id,0, 5);

     
 	

    $i = 0;
    foreach ($stories as $u) {
		$pic = $this->get_Staff_Pic($u->actions, $u->gender);
	    $stories[$i]->photo500 = $pic['photo500'];
	    $stories[$i]->photo150 = $pic['photo150'];
		
		if( $u->abridged_name != ''){ $abridged_name = $u->abridged_name; }
			
		
	    $i++;
    }
	
	
	return  response()->json([
        'Stories' => view('master_layout.student.students_stories')->with(['stories'=>$stories,
         'login_user'=>Sentinel::getUser()->id ])->render(),
		"abridged_name"=>$abridged_name,
		"Student_id"=>$Student_id,
    ]);
	
}



public function Students_Stories_Back( Request $request )
{
	
	
	


    $Stories_limit = 30;
	$stories = $this->getStories(0, $Stories_limit);
	
    $i = 0;
    foreach ($stories as $u) {
	    $pic = $this->get_Staff_Pic($u->actions, $u->gender);
	    $stories[$i]->photo500 = $pic['photo500'];
	    $stories[$i]->photo150 = $pic['photo150'];
	    $i++;
    }
	
	return  response()->json([
        'Stories' => view('master_layout.student.students_stories')->with(['stories'=>$stories, 'login_user'=>Sentinel::getUser()->id ])->render(),
		"abridged_name"=>'',
		"Student_id"=>0,
	]);
	
}



public function Student_Stories_Limit(Request $request){
	$stories_limit = $request->input('stories_limit');
	$Student_id = (int)$request->input('Student_id');
	
	
	$stories_start = ($stories_limit - 30); 
	
	
	
	if( $Student_id == 0 )
	{
		$stories = $this->getStories($stories_start, $stories_start);	
	}
	else 
	{
		$stories = $this->Get_Student_Stories($Student_id, $stories_start, $stories_start);
	}
    
	

    $i = 0;
    $html = '';
	if( !empty( $stories ) ){
		foreach ($stories as $u) {
			
			$pic = $this->get_Staff_Pic($u->actions, $u->gender);
			
			$stories[$i]->photo500 = $pic['photo500'];
			$stories[$i]->photo150 = $pic['photo150'];




			if (Sentinel::getUser()->id != $u->user_id){
				
				$tags =  explode(',', $u->tag); $c_tags =  explode(',', $u->communication_tag);


				$html .= '<li class="in">
							<img class="avatar" alt="" src="'.$u->photo150.'">
							<div class="message"><span class="arrow"> </span>
								<div class="CommentInfo">
									<a href="javascript:;" class="name"> <strong>'.$u->staff_name.'</strong> </a>
									<span class="studentInfoCom"><span class="grayish">Student Name:</span>'.$u->abridged_name.'</span>
									<span class="studentInfoCom"><span class="grayish">GS-ID:</span>'.$u->gs_id.'</span>
									<span class="body"><span class="grayish">Comment:</span>'.$u->comments.'</span>';

									foreach($tags as $tag){
										$html .= '<span class="commentCat TPA Confirmed ">'.$tag.'</span> ';
									}
									/*foreach ($c_tags as $tag){
										if($tag != ''){
											$html .= '<span class="commentCat communicationCat TPA Confirmed "> '.$tag.' </span>';
										}
									}*/
									$html .= '<span class="commentDate">'.$u->date_time.'</span>
								</div>
							</div>
						</li>';
			}else{
				$html .= '<li class="out" data-filters="User Generated" data-category="Accounts">
							<img class="avatar" alt="" src="'.$stories[$i]->photo500.'">
							<div class="message"><span class="arrow"> </span>
								<div class="CommentInfo">
									<a href="javascript:;" class="name"> <strong>'.$stories[$i]->staff_name.'</strong> </a>
									<span class="studentInfoCom"><span class="grayish">Student Name:</span>'.$u->abridged_name.'</span>
									<span class="studentInfoCom"><span class="grayish">GS-ID:</span>'.$u->gs_id.'</span>
									<span class="body">'.$u->comments.'<br>'.$u->date_time.'</span>';
									
									if( !empty($tags) ){

										foreach($tags as $tag){
											$html .= '<span class="commentCat TPA Confirmed ">'.$tag.'</span> ';
										}
										foreach ($c_tags as $tag){
											if($tag != ''){
												$html .= '<span class="commentCat communicationCat TPA Confirmed "> '.$tag.' </span>';
											}
										}
									}
									$html .= '<span class="commentDate">'.$u->date_time.'</span>
								</div>
							</div>
						</li>';
			}
			$i++;
		}
	}
	else{
		// Comment not found!
		$html .= '<li class="in">
                	<div class="message"><span class="arrow"> </span>
            			<div class="CommentInfo">
            			<span class="body"><span class="grayish">Comment:</span>Comments Not Found!</span>
						</div>
           			</div>
               	</li>';
	}

   //echo json_encode( array(  ) );
   
   return  response()->json([ "Sl"=>$stories_limit, "h" => $html ]);
   
	//return $html;

}





public function Student_Stories_Filter(Request $request){
	$stories_limit = $request->input('stories_limit');
	$stories_start = $stories_limit - 30;


	$Sort_By_Source = $request->input('Sort_By_Source');
    $Sort_By_User = $request->input('Sort_By_User');
	$Search_Cat_Finance = $request->input('Search_Cat_Finance');
	$DateFrom = $request->input('from_date');
	$DateTo = $request->input('to_date');

    $Student_id = $request->input('Student_id');

    $Where = '';
	
    if($Sort_By_Source == 'system')
	{
		#$Where .= ' ( actions = "gs_logo" OR actions = 298 ) AND ';	
		
		
		//$Where .= ' ( actions = 0 ) AND ';	
	}
	
	if($Sort_By_Source == 'user')
	{
		#$Where .= ' (actions != 0 AND actions != 298) AND ';
		
		
		//$Where .= ' ( actions != 0 ) AND ';
	}
	
	
	//else{
    	//$Where .= ' (actions != 0 AND actions != 298) AND ';
		
		
		#$Where .= ' ( actions != "gs_logo" ) AND ';
		
	//}
	
    if($Sort_By_User != '')
	{
		$Where .= ' (actions = ' . $Sort_By_User . ') AND ';	
	}
	
	
	if( ($Sort_By_Source == '') && ($Sort_By_User == '') )
	{
		//$Where .= ' ( actions > 0 || actions = 0 ) AND ';
	}
	
	
	/*if( $Student_id > 0 )
	{ 
		$Where .= ' ( thisData.Student_id='.$Student_id.' ) AND '; 
	}*/
	
	
	
if( $Sort_By_Source == 'user' || $Sort_By_Source == '' )
	{
		
    if( isset($Search_Cat_Finance) || $Student_id > 0 ){ $Where .= '('; }
	
	if( $Student_id > 0 )
	{ 
		$Where .= ' ( cl.id='.$Student_id.' ) AND '; 
	}
	
    //if(isset($Search_Cat_Finance) && in_array("Finance", $Search_Cat_Finance)){	$Where .= " (tag like '%Finance%' OR tag like '%Accounts%') OR ";				}
	if(isset($Search_Cat_Finance) && in_array("Finance", $Search_Cat_Finance)){	$Where .= " (tag like '%Finance%' ) OR "; }
    if(isset($Search_Cat_Finance) && in_array("Academic", $Search_Cat_Finance)){	$Where .= " (tag like '%Academic%') OR ";}
    if(isset($Search_Cat_Finance) && in_array("Etab", $Search_Cat_Finance)){	$Where .= " (tag like '%Etab%') OR "; }
    if(isset($Search_Cat_Finance) && in_array("SIS", $Search_Cat_Finance)){	$Where .= " (tag like '%SIS%') OR "; }
    if(isset($Search_Cat_Finance) && in_array("Family", $Search_Cat_Finance)){	$Where .= " (tag like '%Family%') OR "; }
    if(isset($Search_Cat_Finance) && in_array("SMS", $Search_Cat_Finance)){	$Where .= " (tag like '%SMS%') OR "; }
    if(isset($Search_Cat_Finance) && in_array("CommCall", $Search_Cat_Finance)){	$Where .= " (communication_tag like '%Call%') OR ";				}
    if(isset($Search_Cat_Finance) && in_array("CommSMS", $Search_Cat_Finance)){	$Where .= " (communication_tag like '%SMS%') OR ";				}
    if(isset($Search_Cat_Finance) && in_array("CommWhatsapp", $Search_Cat_Finance)){	$Where .= " (communication_tag like '%Whatsapp%') OR ";				}
    if(isset($Search_Cat_Finance) && in_array("CommWalkin", $Search_Cat_Finance)){	$Where .= " (communication_tag like '%Walkin%') OR ";				}
	
    if($Where != '' && isset($Search_Cat_Finance) || $Student_id > 0)
	{
    	$Where = substr($Where, 0, -4); 
    	if(isset($Search_Cat_Finance) || $Student_id > 0 ){ $Where .= ')';}
    	$Where .= ' ';
    }

    if(substr($Where, -4) == 'AND ' || substr($Where, -4) == ' OR '){
    	$Where = substr($Where, 0, -4);
    }
	
}else {


if(substr($Where, -4) == 'AND ' || substr($Where, -4) == ' OR '){
    	$Where = substr($Where, 0, -4);
    }
	

}

	
    

    //if($DateFrom != ''){	$Where .= " AND (DATE_FORMAT(thisDateTime, '%Y-%m-%d') >= '$DateFrom') AND ";	}
	
   // if($DateTo != ''){	$Where .= " (DATE_FORMAT(thisDateTime, '%Y-%m-%d') <= '$DateTo') AND ";	}
	
	//if($Where != '' && $DateFrom != ''){ $Where = substr($Where, 0, -4); $Where .= ' '; }

    
	#if( $Student_id > 0 ){   $Where .= ' AND ( thisData.Student_id=3441  )'; }
	
	if( ($Sort_By_Source == '') && ($Sort_By_User == '') && $Student_id == 0 )
	{
		$stories_start=0;
		$stories_limit=30;
		
		$stories = $this->getFilteredStories( $Sort_By_Source, $stories_start, $stories_limit, $Where, $DateFrom,$DateTo,$Student_id);
		
	}else{
		$stories = $this->getFilteredStories( $Sort_By_Source, $stories_start, $stories_limit, $Where, $DateFrom,$DateTo,$Student_id);
	}

    


    $i = 0;
    $html = '';
	if( !empty( $stories ) ) {
		
	
    foreach ($stories as $u) {
	    $pic = $this->get_Staff_Pic($u->actions, $u->gender);
	    $stories[$i]->photo500 = $pic['photo500'];
	    $stories[$i]->photo150 = $pic['photo150'];


	    $tags =  explode(',', $u->tag); $c_tags =  explode(',', $u->communication_tag);
	    if (Sentinel::getUser()->id != $u->user_id){
	    	$html .= '<li class="in">
                		<img class="avatar" alt="" src="'.$u->photo150.'">
            			<div class="message"><span class="arrow"> </span>
            				<div class="CommentInfo">
            					<a href="javascript:;" class="name"> <strong>'.$stories[$i]->staff_name.'</strong> </a>
	            				<span class="studentInfoCom"><span class="grayish">Student Name:</span>'.$u->abridged_name.'</span>
                                <span class="studentInfoCom"><span class="grayish">GS-ID:</span>'.$u->gs_id.'</span>
                                <span class="body"><span class="grayish">Comment:</span>'.$u->comments.'<br>'.$u->date_time.'</span>';

                                foreach($tags as $tag){
	            					$html .= '<span class="commentCat TPA Confirmed ">'.$tag.'</span> ';
	            				}
	            				foreach ($c_tags as $tag){
	            					if($tag != ''){
		            					$html .= '<span class="commentCat communicationCat TPA Confirmed "> '.$tag.' </span>';
		            				}
	            				}
	            				$html .= '
	            				<span class="commentDate">'.$u->date_time.'</span>
            				</div>
            			</div>
                	</li>';
	    }else{
	    	$html .= '<li class="out" data-filters="User Generated" data-category="Accounts">
                        <img class="avatar" alt="" src="'.$stories[$i]->photo500.'">
                        <div class="message"><span class="arrow"> </span>
                            <div class="CommentInfo">
                                <a href="javascript:;" class="name"> <strong>'.$stories[$i]->staff_name.'</strong> </a>
                                <span class="studentInfoCom"><span class="grayish">Student Name:</span>'.$u->abridged_name.'</span>
                                <span class="studentInfoCom"><span class="grayish">GS-ID:</span>'.$u->gs_id.'</span>
                                <span class="body">'.$u->comments.'<br>'.$u->date_time.'</span>';

                                foreach($tags as $tag){
	            					$html .= '<span class="commentCat TPA Confirmed ">'.$tag.'</span> ';
	            				}
	            				foreach ($c_tags as $tag){
	            					if($tag != ''){
		            					$html .= '<span class="commentCat communicationCat TPA Confirmed "> '.$tag.' </span>';
		            				}
	            				}
	            				$html .= '
                                <span class="commentDate">'.$u->date_time.'</span>
                            </div>
                        </div>
                    </li>';
	    }
	    $i++;
    }

}else {
	$html .= '<li class="in">
                <div class="message"><span class="arrow"> </span>
                  <div class="CommentInfo">
                    <span class="body">No Record Found!</span>';
	$html .= '</div></div></li>';
}
	return $html;

}

public function getFilteredStories( $user, $lowerLimit, $upperLimit, $Where, $DateFrom, $DateTo,$Student_id)
{



		$query = "select
	thisData.*
	from
		( ";
		
		if( $user == 'system' ){
			
		$query .= " ( select 
			cl.id as Student_id, cl.gs_id, cl.abridged_name, 
			'Generations School' as staff_name,
			sms.message as comments, DATE_FORMAT(sms.created, '%a, %d %b %Y - %h:%i %p') as date_time, sms.created as thisDateTime,
			'SMS' as tag, 
			'' as communication_tag, 
			0 as actions, 'M' as gender, 0 as user_id
		
			from atif_sms.sms_api_log AS sms
			inner join atif.student_family_record as sfr
			on REPLACE(sfr.mobile_phone,'-','') = sms.mobile_phone
			inner join atif.class_list as cl
			on cl.gf_id = sfr.gf_id
		
			where sms.message NOT LIKE '%Mr%' AND sms.message NOT LIKE '%Ms%' " ;
			
			if( $DateFrom != '' && $DateTo != '' ) {
				$query .= " AND (DATE_FORMAT( sms.created, '%Y-%m-%d') >= '$DateFrom') AND (DATE_FORMAT(sms.created, '%Y-%m-%d') <= '$DateTo') ";
			}	
			
			
			if( $Student_id > 0){
				$query .= " and cl.id=".$Student_id."  ";	
			}else{
				$query .= " limit $lowerLimit, $upperLimit  ";	
			}
			$query .= "  ) ";	
			
			
			
			
			$query .= "union all
 select
	
			
			
			

			
			
			
			cl.id as Student_id,
			cl.gs_id as gs_id, 
			cl.abridged_name as abridged_name, 
			'Attendance Tap' as staff_name,
			'Threshold Attendance' as comments, 
			
			DATE_FORMAT(concat( att.date, ' ', att.time),'%a, %d %b %Y - %h:%i %p' ) as date_time,
			FROM_UNIXTIME( UNIX_TIMESTAMP ( STR_TO_DATE(concat( att.date, ' ', att.time),'%Y-%m-%d %H:%i:%s' ) ) )as thisDateTime,
			'Attendance' tag, 
			'Attendance' as communication_tag, 
			0 as actions, 
			0 as gender, 
			0 as user_id
			
			
			

from atif_attendance.student_attendance as att 
left join atif.class_list as cl
on cl.gs_id = att.gs_id
where 
att.gs_id= ( select cl.gs_id from atif.class_list as cl where cl.id=".$Student_id." ) ";

if( $DateFrom != '' && $DateTo != '' ) {
	$query .= " AND ( att.date >= '$DateFrom'  AND att.date <= '$DateTo' )  ";
}else{ 
			
$query .= " and att.date >= ( select ad.start_date as Att_Starting_From from atif.class_list as cl  
inner join atif._academic_session as ad 
on ad.id=cl.academic_session_id 
where cl.id=".$Student_id." )  ";
}			
		
		}
		else if( $user == 'user' )
		{
		
		
		
		$query .= " ( select 
			cl.id as Student_id, cl.gs_id, cl.abridged_name, lc.staff_name,
			lc.comments as comments, DATE_FORMAT(from_unixtime(lc.created), '%a, %d %b %Y - %h:%i %p') as date_time, from_unixtime(lc.created) as thisDateTime,
			lc.tag as tag, lc.communication_tag, lc.employee_id as actions, lc.gender, lc.register_by as user_id
		
			from (select
				lc.*, sr.employee_id, sr.gender, sr.name as staff_name
				from atif_student_log.log_comments as lc
				left join atif.staff_registered as sr
					on sr.user_id = lc.register_by ";
					
					if( $DateFrom != '' && $DateTo != '' ){
					$query .= " where (DATE_FORMAT(from_unixtime(lc.created), '%Y-%m-%d') >= '$DateFrom') AND (DATE_FORMAT(from_unixtime(lc.created), '%Y-%m-%d') <= '$DateTo') ";
					}
					
					if( $Student_id == 0){
						$query .= " limit $lowerLimit, $upperLimit ";
					}
					
					$query .= " ) as lc ";
					
			$query .= " inner join atif.class_list as cl
				on cl.id = lc.student_id ";	
				
			if( $Student_id > 0 || $Where != '' ){
				$query .= " WHERE $Where "; 
			}
			
			$query .= "  ) ";
				
		}
else {
	
	
	/*$query .= " ( select 
			cl.id as Student_id, cl.gs_id, cl.abridged_name, 
			'Generations School' as staff_name,
			sms.message as comments, DATE_FORMAT(sms.created, '%a, %d %b %Y - %h:%i %p') as date_time, sms.created as thisDateTime,
			'SMS' as tag, 
			'' as communication_tag, 
			0 as actions, 'M' as gender, 0 as user_id
		
			from atif_sms.sms_api_log AS sms
			inner join atif.student_family_record as sfr
			on REPLACE(sfr.mobile_phone,'-','') = sms.mobile_phone
			inner join atif.class_list as cl
			on cl.gf_id = sfr.gf_id
		
			where sms.message NOT LIKE '%Mr%' AND sms.message NOT LIKE '%Ms%' ";
			
			if( $DateFrom != '' && $DateTo != '' ){
			$query .= " AND (DATE_FORMAT(sms.created, '%Y-%m-%d') >= '$DateFrom') AND (DATE_FORMAT(sms.created, '%Y-%m-%d') <= '$DateTo') ";
			}
			
			if( $Student_id > 0){
				$query .= " and cl.id=".$Student_id."  ";	
			}else{
				$query .= " limit $lowerLimit, $upperLimit  ";	
			}
			
			$query .= "  ) ";	
			
	$query .= " UNION ";
	*/
	$query .= "( select 
			cl.id as Student_id, cl.gs_id, cl.abridged_name, lc.staff_name,
			lc.comments as comments, DATE_FORMAT(from_unixtime(lc.created), '%a, %d %b %Y - %h:%i %p') as date_time, from_unixtime(lc.created) as thisDateTime,
			lc.tag as tag, lc.communication_tag, lc.employee_id as actions, lc.gender, lc.register_by as user_id
		
			from (select
				lc.*, sr.employee_id, sr.gender, sr.name as staff_name
				from atif_student_log.log_comments as lc
				left join atif.staff_registered as sr
					on sr.user_id = lc.register_by  ";
					
			if( $DateFrom != '' && $DateTo != '' ){
				$query .= " where (DATE_FORMAT(from_unixtime(lc.created), '%Y-%m-%d') >= '$DateFrom') AND (DATE_FORMAT(from_unixtime(lc.created), '%Y-%m-%d') <= '$DateTo') ";
			}
			
			if( $Student_id == 0){
				//$query .= " limit $lowerLimit, $upperLimit ";
			}
					
			$query .= " ) as lc ";
			$query .= " inner join atif.class_list as cl
			on cl.id = lc.student_id ";	

			if( $Student_id > 0 || $Where != '' ){
				$query .= " WHERE $Where "; 
			}

			$query .= "  ) ";	
}	
				
				
				
	$query .= "	) as thisData ";
	
	//if( ( $user == 'user' || $Student_id > 0 )  && ( $Where != '') )
	//$query .= " WHERE $Where "; 
	
	$query .= " order by thisDateTime desc ";
	#print_r($query); exit;

	$result = DB::connection('mysql')->select($query);
	return $result;
	
	
	
	
}


public function getStories( $lowerLimit, $upperLimit)
{
	$query = "select
	thisData.*
	from
		(select 
			cl.gs_id, cl.abridged_name, 'Generations School' as staff_name,
			sms.message as comments, 
			DATE_FORMAT(sms.created, '%a, %d %b %Y - %h:%i %p') as date_time,
			sms.created as thisDateTime,
			'SMS' as tag, '' as communication_tag, 0 as actions, 'M' as gender, 0 as user_id
		
			from atif_sms.sms_api_log AS sms
			inner join atif.student_family_record as sfr
				on REPLACE(sfr.mobile_phone,'-','') = sms.mobile_phone
			inner join atif.class_list as cl
				on cl.gf_id = sfr.gf_id
		
			where sms.message NOT LIKE '%Mr%' AND sms.message NOT LIKE '%Ms%'
		
		
		
			UNION
		
		
		
			select 
		
			cl.gs_id, 
			cl.abridged_name, 
			lc.staff_name,
			lc.comments as comments, DATE_FORMAT(from_unixtime(lc.created), '%a, %d %b %Y - %h:%i %p') as date_time, from_unixtime(lc.created) as thisDateTime,
			lc.tag as tag, lc.communication_tag, lc.employee_id as actions, lc.gender, lc.register_by as user_id
		
			from (


			select
				lc.*, sr.employee_id, sr.gender, sr.name as staff_name
				from atif_student_log.log_comments as lc
				
				left join atif_gs_sims.users as u  on u.id=lc.register_by
				
				left join atif.staff_registered as sr 
				on sr.gg_id=u.email


					) as lc
			inner join atif.class_list as cl
				on cl.id = lc.student_id
		) as thisData 
	order by thisDateTime desc
	limit $lowerLimit, $upperLimit";

	$result = DB::connection('mysql')->select($query);
	return $result;
}


public function getStories2( $lowerLimit, $upperLimit){
	$query = "select
	thisData.*
	from
		(select 
			cl.gs_id, cl.abridged_name, 'Generations School' as staff_name,
			sms.message as comments, DATE_FORMAT(sms.created, '%a, %d %b %Y - %h:%i %p') as date_time, sms.created as thisDateTime,
			'SMS' as tag, '' as communication_tag, 0 as actions, 'M' as gender, 1 as user_id
		
			from atif_sms.sms_api_log AS sms
			inner join atif.student_family_record as sfr
				on REPLACE(sfr.mobile_phone,'-','') = sms.mobile_phone
			inner join atif.class_list as cl
				on cl.gf_id = sfr.gf_id
		
			where sms.message NOT LIKE '%Mr%' AND sms.message NOT LIKE '%Ms%'
		
		
		
			UNION
		
		
		
			select 
		
			cl.gs_id, cl.abridged_name, lc.staff_name,
			lc.comments as comments, DATE_FORMAT(from_unixtime(lc.created), '%a, %d %b %Y - %h:%i %p') as date_time, from_unixtime(lc.created) as thisDateTime,
			lc.tag as tag, lc.communication_tag, lc.employee_id as actions, lc.gender, lc.register_by as user_id
		
			from (select
				lc.*, sr.employee_id, sr.gender, sr.name as staff_name
				from atif_student_log.log_comments as lc
				
				left join atif_gs_sims.users as u  on u.id=lc.register_by
				
				left join atif.staff_registered as sr 
				on sr.gg_id=u.email )
 as lc
			inner join atif.class_list as cl
				on cl.id = lc.student_id
		) as thisData 
	order by thisDateTime desc
	limit $lowerLimit, $lowerLimit";

	$result = DB::connection('mysql')->select($query);
	return $result;
}

//Show all Student Comments//

public function Get_Student_Stories($Student_id, $lowerLimit, $upperLimit){


	$query = "select
	thisData.*
	from
		(

		select 
			cl.gs_id, cl.abridged_name, 'Generations School' as staff_name,
			sms.message as comments, DATE_FORMAT(sms.created, '%a, %d %b %Y - %h:%i %p') as date_time, sms.created as thisDateTime,
			'SMS' as tag, '' as communication_tag, 0 as actions, 0 as gender, 0 as user_id
		
			from atif_sms.sms_api_log AS sms
			inner join atif.student_family_record as sfr
				on REPLACE(sfr.mobile_phone,'-','') = sms.mobile_phone
			inner join atif.class_list as cl
				on cl.gf_id = sfr.gf_id
			where cl.id=".$Student_id." and sms.message NOT LIKE '%Mr%' AND sms.message NOT LIKE '%Ms%'
		
		
		
			UNION all
			select 
			
			cl.gs_id, 
			cl.abridged_name, 
			lc.staff_name,
			lc.comments as comments, 
			DATE_FORMAT(from_unixtime(lc.created), '%a, %d %b %Y - %h:%i %p') as date_time, 
			from_unixtime(lc.created) as thisDateTime,
			lc.tag as tag, 
			lc.communication_tag, 
			lc.employee_id as actions, 
			lc.gender, 
			lc.register_by2 as user_id
			
			from ( select
				lc.*, sr.employee_id, sr.gender, sr.name as staff_name, u.id as register_by2
				from atif_student_log.log_comments as lc
				
				 
				
				left join atif.staff_registered as sr 
				on sr.user_id=lc.register_by

					LEFT join atif_gs_sims.users as u on u.email = sr.gg_id
) as lc
			inner join atif.class_list as cl
				on cl.id = lc.student_id
			where cl.id=".$Student_id."	
			
			
			
union all
select
	cl.gs_id as gs_id, 
			cl.abridged_name as abridged_name, 
			'Attendance Tap' as staff_name,
			'Threshold Attendance' as comments, 


		

			DATE_FORMAT(concat( att.date, ' ', att.time),'%a, %d %b %Y - %h:%i %p' ) as date_time,

			FROM_UNIXTIME( UNIX_TIMESTAMP ( STR_TO_DATE(concat( att.date, ' ', att.time),'%Y-%m-%d %H:%i:%s' ) ) )as thisDateTime,
			'Attendance' tag, 
			'Attendance' as communication_tag, 
			0 as actions, 
			0 as gender, 
			0 as user_id
			
			

from atif_attendance.student_attendance as att 
left join atif.class_list as cl
on cl.gs_id = att.gs_id
where 
att.gs_id= ( select cl.gs_id from atif.class_list as cl where cl.id=".$Student_id." )
and att.date >= ( select ad.start_date as Att_Starting_From from atif.class_list as cl  
inner join atif._academic_session as ad 
on ad.id=cl.academic_session_id 
where cl.id=".$Student_id." ) 


union all
 
 select
	cl.gs_id as gs_id, 
			cl.abridged_name as abridged_name, 
			'Attendance Tap' as staff_name,
			'Threshold Attendance' as comments, 

			

			DATE_FORMAT(concat( att.date, ' ', att.time),'%a, %d %b %Y - %h:%i %p' ) as date_time,
			FROM_UNIXTIME( UNIX_TIMESTAMP ( STR_TO_DATE(concat( att.date, ' ', att.time),'%Y-%m-%d %H:%i:%s' ) ) )as thisDateTime,
			'Attendance' tag, 
			'Attendance' as communication_tag, 
			0 as actions, 
			0 as gender, 
			0 as user_id
			
from atif_attendance.student_attendance_out as att 

left join atif.class_list as cl
on cl.gs_id = att.gs_id

where 
att.gs_id=( select cl.gs_id from atif.class_list as cl where cl.id=".$Student_id.")

and att.date >= ( select ad.start_date as Att_Starting_From from atif.class_list as cl 
inner join atif._academic_session as ad
on ad.id=cl.academic_session_id
where cl.id=".$Student_id." ) 


			
			
			
			
		) as thisData 
	order by thisDateTime desc
	limit $lowerLimit, $upperLimit ";

	
	#echo $query; exit;
	
	return DB::connection('mysql')->select( $query );

	#var_dump($result); exit;

	 
}




public function get_Staff_Pic($PhotoID, $Gender){
	if (!file_exists(STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE))
	{
		
		if($Gender == 'M'){
            $PhotoID = 'male';
        }else if($Gender == 'F'){
            $PhotoID = 'female';
        }
    }

    #if($PhotoID == 298){ $PhotoID = 'gs_logo'; }
	
    $user['photo500'] = STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE;
    $user['photo150'] = STAFF_PIC_150 . $PhotoID . STAFF_PIC150_TYPE;


    return $user;
}




public function get_Student_Pic($PhotoID){
		if (!file_exists(STUDENT_PIC_500.$PhotoID.PIC500_TYPE)){
            $PhotoID = 'NoPic';
	    }
	    $user['photo500'] = STUDENT_PIC_500.$PhotoID.PIC500_TYPE;
	    $user['photo150'] = STUDENT_PIC_150.$PhotoID.PIC150_TYPE;

	    return $user;
	}

	
	// Students Badge method for badge display:
	function Student_Badges($Student_Id) {
		$StdInfo = new Student_Information();
		return  $StdInfo->Get_Student_Badges($Student_Id);
	}
	
	function Grade_Section_Badges($Grade_id,$Section_id,$Acadmic_id){
		$StdInfo = new Student_Information();
		return  $StdInfo->Grd_Sctn_Badge($Grade_id,$Section_id,$Acadmic_id);
	}
	




	
	// Students Badge method for badge display:
	function Badges( $Grade_id, $Section_id ) {
		$StdInfo = new Student_Information();
		return  $StdInfo->Get_Badges( $Grade_id, $Section_id, WHERE_ACDSES_To );
	}
	
	
	public function Students_Detail( Request $request ){
		$Student_id = $request->input('Student_id',0);
		$Gs_id = $request->input('Gs_id','00-000');
		$StdInfo = new Student_Information();
		$Student_Info = $StdInfo->Get_Student_Information($Gs_id);
		
		if( !empty($Student_Info)):
		$Gr_no = $Student_Info[0]->gr_no;
		$Gf_id = $Student_Info[0]->gf_id;
		$Siblings = $StdInfo->get_siblings_data($Gr_no);
		$Father_Mother_Photo = $this->Get_Father_Mother_Photo( $Siblings,$Gr_no );
		$Badge_Html = $this->Student_Badges_Html($Student_id);
		
		else:	
		$Student_Info = array();
		$Siblings = array();
		$Father_Mother_Photo = array();
		$Badge_Html = '';
		$Gf_id = '';
		endif;
		
		if( $Gf_id > 0 ):
		$Parent_info = $this->Student_parents_info($Gf_id);
		$Work_detail = $this->Student_parents_work_detail($Gf_id);
		else:
		$Parent_info = array();
		$Work_detail = array();
		endif;
		
		$CountSiblings = count( $Siblings );
		
		$userID = Sentinel::getUser()->id;
		
		$userGroup = $this->getUserGroup( $Student_id,$userID);
		
		$return = array( "SInfo" => $Student_Info, "Sib"=>$Father_Mother_Photo, 'Bdg'=>$Badge_Html, "PInfo"=>$Parent_info, "Wd"=>$Work_detail, "Stories"=>$userGroup,"userID"=>$userID,"Student_id"=>$Student_id,"CountSiblings"=>$CountSiblings );
		echo json_encode($return);
	}
	
	
	
	public function Get_Father_Mother_Photo($siblings_data,$Gr_no)
	{
			$father_photo_found = false;
		$mother_photo_found = false;
		$data = array();
		if( $siblings_data[0]->siblings_total > 1){
			 foreach ($siblings_data as $sibling) {
				 $Gr_no = $sibling->gr_no;
				 
				  if(!$father_photo_found){
					$father_photo = FATHER_PIC_150.$Gr_no.PIC150_TYPE;
					//if(file_exists( $father_photo )){
					if( file_exists( $father_photo ) ){
						$PhotoID=$Gr_no;
						$father_photo_found = true;
					}else{ $PhotoID = 'NoPic'; }
					$data['father_photo'] = FATHER_PIC_150.$PhotoID.PIC150_TYPE;
					
				  }
				  if(!$mother_photo_found){
					$mother_photo 	= MOTHER_PIC_150.$Gr_no.PIC150_TYPE;
					if( file_exists( $mother_photo ) ){	
						$PhotoID=$Gr_no;
						$mother_photo_found = true;
					}else{ $PhotoID = 'NoPic'; }
					$data['mother_photo'] = MOTHER_PIC_150.$PhotoID.PIC150_TYPE;
				  }
			 }
		  }else{
			  //$data["gr_no"] = $Gr_no;
				$father_photo = FATHER_PIC_150.$Gr_no.PIC150_TYPE;
				$mother_photo = MOTHER_PIC_150.$Gr_no.PIC150_TYPE;
				
				if (!file_exists(FATHER_PIC_150.$Gr_no.PIC150_TYPE)){
					$PhotoID = 'NoPic';
				}else{ $PhotoID = $Gr_no; }
				$data['father_photo'] = FATHER_PIC_150.$PhotoID.PIC150_TYPE;
				
				
				if (!file_exists(MOTHER_PIC_150.$Gr_no.PIC150_TYPE)){
					$PhotoID = 'NoPic';
				}else{ $PhotoID = $Gr_no; }
				$data['mother_photo'] = MOTHER_PIC_150.$PhotoID.PIC150_TYPE;
		
				
			}
			
			return $data;
	}
	
	
	
	function Student_Badges_Html($Student_Id) {
		$StdInfo = new Student_Information();
		$Badges = $StdInfo->Get_Student_Badges($Student_Id);
		$html = '';
		if(!empty( $Badges ) ):
			foreach( $Badges as $SB ): 
			$html .= '<span class="badgeTeacher tooltips" data-placement="bottom" data-original-title="'.$SB->Bdg_Title.'" data-pin-nopin="true" style="border-color:'.$SB->Badge_Color.';color:'.$SB->Badge_Color.';">'.$SB->Badge_code.'</span> ';
			endforeach;
		endif;
		return $html;
	}
	
	
	// Method for Grade section Teachers Information
	
	function Grade_Section_Teacher($Grade_id,$Section_id)
	{
		$Model_Obj = new Student_Information();
		$Teachers = $Model_Obj->Grade_Section_Teach($Grade_id,$Section_id);
		
		//var_dump( $Teachers ); exit;
		
		
		$Data = array();
		if( !empty($Teachers) )
		{
			if( count( $Teachers ) == 2 )
			{
				if( $Teachers[0]->Gender == 'F' )
				$Img_Type = 'female';
				else
				$Img_Type = 'male';
				
				
				
				$Tchr_one_name 		= $Teachers[0]->Teacher_Name?$Teachers[0]->Teacher_Name:'';
				//$Tchr_one_image	= $Teachers[0]->Image_ID?$Teachers[0]->Image_ID:$Img_Type;
				$Tchr_one_image		= $this->getStaff_Pic($Teachers[0]->Image_ID, $Teachers[0]->Gender );
				
				$Tchr_one_StaffID 	= $Teachers[0]->StaffID?$Teachers[0]->StaffID:0;
				$Tchr_one_User_Id 	= $Teachers[0]->User_Id?$Teachers[0]->User_Id:0;
				
				
				if( $Teachers[1]->Gender == 'F' )
				$Img_Type2 = 'female';
				else
				$Img_Type2 = 'male';
			
				$Tchr_Two_name 		= $Teachers[1]->Teacher_Name?$Teachers[1]->Teacher_Name:'';
				//$Tchr_Two_image		= $Teachers[1]->Image_ID?$Teachers[1]->Image_ID:$Img_Type2;
				$Tchr_Two_image		= $this->getStaff_Pic($Teachers[1]->Image_ID, $Teachers[1]->Gender );
				$Tchr_Two_StaffID 	= $Teachers[1]->StaffID?$Teachers[1]->StaffID:0;
				$Tchr_Two_User_Id 	= $Teachers[1]->User_Id?$Teachers[1]->User_Id:0;
				
				
				
			}else
			{
				
				
				if( $Teachers[0]->Gender == 'F' )
				$Img_Type = 'female';
				else
				$Img_Type = 'male';
			
				$Tchr_one_name 		= $Teachers[0]->Teacher_Name?$Teachers[0]->Teacher_Name:'';
				$Tchr_one_image		= $this->getStaff_Pic($Teachers[0]->Image_ID, $Teachers[0]->Gender );
				
				
				$Tchr_one_StaffID 	= $Teachers[0]->StaffID?$Teachers[0]->StaffID:0;
				$Tchr_one_User_Id 	= $Teachers[0]->User_Id?$Teachers[0]->User_Id:0;
				$Tchr_Two_name 		= '';
				$Tchr_Two_image		= $this->getStaff_Pic(0, $Teachers[0]->Gender );
				$Tchr_Two_StaffID 	= 0;
				$Tchr_Two_User_Id 	= 0;
			}
			$Data = array(
				"TOneName" => $Tchr_one_name,
				"TOneImage" => $Tchr_one_image,
				"TOneID" => $Tchr_one_StaffID,
				"TTwoName" => $Tchr_Two_name,
				"TTwoImage" => $Tchr_Two_image,
				"TTwoID" => $Tchr_Two_StaffID,
			);			
			
		}else
		{
			$Tchr_one_name 		= '';
			$Tchr_one_image		= $this->getStaff_Pic(0,'F');
			$Tchr_one_StaffID 	= 0;
			$Tchr_one_User_Id 	= 0;
			$Tchr_Two_name 		= '';
			$Tchr_Two_image		=  $this->getStaff_Pic(0,'F');
			$Tchr_Two_StaffID 	= 0;
			$Tchr_Two_User_Id 	= 0;
			$Data = array(
				"TOneName" => $Tchr_one_name,
				"TOneImage" => $Tchr_one_image,
				"TOneID" => $Tchr_one_StaffID,
				"TTwoName" => $Tchr_Two_name,
				"TTwoImage" => $Tchr_Two_image,
				"TTwoID" => $Tchr_Two_StaffID,
			);
		}
		
		return $Data;
		
	}
	
	/**********************************************************************
    * Calling Staff Pic 500px and 150px 
    * @input: 	Staff PhotoID and Staff Gender
    * @output: 	Staff Pic Paths
    * Description:
    * 		If no picture found then get blankPic according to gender
    ***********************************************************************/
	public function getStaff_Pic($PhotoID, $Gender){
		
		if (!file_exists(STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE)){
			
	        if($Gender == 'M'){
	            $PhotoID = 'male';
	        }else if($Gender == 'F'){
	            $PhotoID = 'female';
	        }
	    }
	   // $user['photo500'] = STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE;
	    $photo150 = STAFF_PIC_150 . $PhotoID . STAFF_PIC150_TYPE;
		
		return $photo150;
	}
	
	/**********************************************************************
    * Calling Student Parents Information
    * @input: 	Family id gf_id
    * Description:
    * 		Will display parents information
    ***********************************************************************/
	public function Student_parents_info($gf_id){
		$Model_Obj = new Student_Information();
		$Results = $Model_Obj->get_parents_info($gf_id);
		return $Results;
	}
	
	/**********************************************************************
    * Calling Student Parents Job Information
    * @input: 	Family id gf_id
    * Description:
    * 		Will display parents Job information
    ***********************************************************************/
	public function Student_parents_work_detail($gf_id){
		$Model_Obj = new Student_Information();
		$Results = $Model_Obj->student_family_work_detail($gf_id);
		return $Results;
	}
	
	
	public function Create_Badges_Assign( Request $request ){
		
		$Model_Obj = new Student_Information();
		
		
		$_token = $request->input('_token');
		$Grade_id = $request->input('Grade_id',0);
		$Section_id = $request->input('Section_id',0);
		$badge_title = $request->input('Badge_Title',0);
		$badge_code = $request->input('Badge_Code',0);
		$badge_color = $request->input('Badge_Color', '');
		$badge_des = $request->input('Badge_Description', '');
		$Current_Academic = $request->input('Current_Academic',0);
		
		$Current_Term = $request->input('Current_Term',0);
		$Student_id = $request->input('Student_id',0);
		$bookId = $request->input('bookId');
		
		
		if ( $request->input("Badege_Priority") != NULL ){
			$badge_priority =$request->input("Badege_Priority");
		}else{
			$badge_priority = 0;
		}
		if ( $request->input("Expiry_Date") != NULL ){
			$badge_expiry =$request->input("Expiry_Date");
		}else{
			$badge_expiry = '0000-00-00';
		}
		
		$table = "badges";
		
		$Badge_Assign = 0;
		$Badge_Last_Id=0;
		
		if( $bookId == 0 ){
			$data = array(
				"bedge_title"=>$badge_title,
				"bedge_code"=>$badge_code,
				"bedge_expiry"=>$badge_expiry,
				"bedge_color"=>$badge_color,
				"bedge_priority"=>$badge_priority,
				"bedge_description"=>$badge_des,
				"academic_session_id"=>WHERE_ACDSES_To,
				"session_term_id"=>$Current_Term,
				"grade_id"=>$Grade_id,
				"section_id"=>$Section_id,
				"created"=>time(),
				"created_by"=>1
			);
		$Badge_Last_Id = $Model_Obj->Create_Badge($table, $data );
		if( !empty($request->get('Student_CheckBox')) ){
			$students = $request->input("Student_CheckBox");
			$table="bedge_student";
			foreach($students as $student){
				$data = array(
					"bedge_id"=>$Badge_Last_Id,
					"student_id"=>$student,
					"created"=>time(),
					"created_by"=>1
				);
			$Badge_Assign = $Model_Obj->Create_Badge($table, $data );
			
			}
		}
		
		
		}
		
		$returns =array("Badge"=>$Badge_Last_Id, "Badge_Assign"=>$Badge_Assign);
		
		echo json_encode($returns);
	}
	
	
	
	
	function Edit_Badge_Html( Request $request ){
		$Model_Obj = new Student_Information();
		$Badge_Id = $request->input('Badge_Id');
		
		$Single_Badge=$Model_Obj->Get_Badge($Badge_Id);
		
		$SBList = array();
		if( !empty($Single_Badge) ) {
		
			$Students=$Model_Obj->Grade_Section_Students($Single_Badge[0]->grade_id, $Single_Badge[0]->section_id);
			$Assigned_Badge = $Model_Obj->Get_Assinged_Badge($Badge_Id);
			if( !empty($Assigned_Badge) ){
				foreach($Assigned_Badge as $list ):
					array_push( $SBList, $list->student_id );
				endforeach;
			}
			
			$Badge_Id = $Single_Badge[0]->ID;
			$bedge_title = $Single_Badge[0]->bedge_title;
			$bedge_code = $Single_Badge[0]->bedge_code;
			$bedge_expiry = $Single_Badge[0]->bedge_expiry;
			$bedge_color = $Single_Badge[0]->bedge_color;
			$bedge_description = $Single_Badge[0]->bedge_description;
			
		}else{
			$Badge_Id=0;
			$bedge_title = '';
			$bedge_code = '';
			$bedge_expiry = '';
			$bedge_color = '';
			$bedge_description = '';
		}
		
		
		
		$html = '';
		$html .= '<div class="modal-dialog">
		<form id="EditForm_Badges" class="form-horizontal" action="#" name="EditForm_Badges">	
		<input type="hidden" name="Badge_Id" id="Badge_Id" value="'.$Badge_Id.'" />
		<input id="_token" name="_token" value="'.csrf_token().'" type="hidden">
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
										
								<div class="form-body">
											<div class="form-group form-md-line-input">
											<div class="input-icon right">
											<i class="fa"></i>
                                            <input type="text" class="form-control" id="Badge_Title" name="Badge_Title" placeholder="e.g. 14th August" value="'.$bedge_title.'" />
                                            <label for="Badge_Title">Badge Title<span class="required">*</span> </label>
											</div>
                                            </div>
                                            <div class="form-group form-md-line-input ">
											<div class="input-icon right">
												<i class="fa"></i>
                                                <input type="text" class="form-control" id="Badge_Code" name="Badge_Code" placeholder="e.g. A" value="'.$bedge_code.'" />
                                                <label for="Badge_Code">Badge Code<span class="required">*</span></label>
                                            </div>
											</div>
                                            <div class="form-group form-md-line-input  ">
                                                <input type="date" class="form-control" id="Expiry_Date" name="Expiry_Date" value="'.$bedge_expiry.'" />
                                                <label for="Expiry_Date">Expiry</label>
                                            </div>
                                            <div class="form-group form-md-line-input  ">
                                                <input type="color" class="form-control" id="Badge_Color" name="Badge_Color" value="'.$bedge_color.'" />
                                                <label for="Badge_Color">Color</label>
                                            </div>
                                            <!-- //$Single_Badge->bedge_priority  //-->
											
                                            <div class="form-group form-md-line-input">
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
                                                <textarea class="form-control" rows="3" id="Badge_Description" name="Badge_Description" placeholder="e.g. All the students participating for 14th August stage show are badged in this badge">'.$bedge_description.'</textarea>
                                                <label for="Badge_Description">Description</label>
                                            </div>
                                        </div>
                              
                                </div><!-- col-md-6 -->
                                <div class="col-md-8 paddingRight0">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="Badge_Student_List2">	
									<thead>
                                      <tr>
                                        <th class="table-checkbox">#</th>
                                        <th> GS-ID</small> </th>
                                        <th> Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
									if( !empty($Students) ){
									 foreach($Students as $ab ){
										
										$html .= '<tr class="odd gradeX">';
                                        $html .= '<td>';
                                        $html .= '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">';
                                        if( !empty( $SBList ) ){
											if( in_array( $ab->id,$SBList ) ){
											$html .= '<input type="checkbox" name="Student_CheckBox[]" class="checkboxes" value="'.$ab->id.'" checked />';
											}else{
												$html .= '<input type="checkbox" name="Student_CheckBox[]" class="checkboxes" value="'.$ab->id.'" />';	
											}
										}else{
										$html .= '<input type="checkbox" name="Student_CheckBox[]" class="checkboxes" value="'.$ab->id.'" />';	
										}	
										
                                        $html .= '<span></span>';
                                        $html .= '</label>';
                                        $html .= '</td>';
                                        $html .= '<td> '.$ab->gs_id.'-'.$ab->id.'  </td>';
                                        $html .= '<td> <strong> '.$ab->abridged_name.' </strong> </td>';
                                       $html .= '</tr>';
									 }
									}
									$html .='</tbody>
                                    </table>
								</div><!-- col-md-6 -->
								
                            </div>
							
						 
                        </div>
                        <!-- Add Badge End -->
                    </div>
                    <div class="modal-footer">
					
					<div class="alert alert-danger display-hide">
									<button class="close" data-close="alert"></button> You have some form errors. Please check below.
								</div>
								<div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button> Your form validation is successful!
								</div>
								
                        <button type="Button" class="btn dark btn-outline Closed_Modal" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn green" id="Edit_Submit_btn" name="Edit_Submit_btn">Update Badge</button>
                    </div>
                </div>
				
				 </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->';
			
			$html .= '<script>
			jQuery(document).ready(function(){
				Data_Table(jQuery("#Badge_Student_List2"));
			});
			</script>';
			
		echo $html;
	}
	
	
	
	function Edit_Badge_Form_Action(Request $request){
		$Model_Obj = new Student_Information();
		$_token = $request->input('_token');
		$Badge_Id = $request->input('Badge_Id');
		
		
		$_token = $request->input('_token');
		$badge_title = $request->input('Badge_Title',0);
		$badge_code = $request->input('Badge_Code',0);
		$badge_color = $request->input('Badge_Color', '');
		$badge_des = $request->input('Badge_Description', '');
		
		
		
		
		if ( $request->input("Badege_Priority") != NULL ){
			$badge_priority =$request->input("Badege_Priority");
		}else{
			$badge_priority = 0;
		}
		if ( $request->input("Expiry_Date") != NULL ){
			$badge_expiry =$request->input("Expiry_Date");
		}else{
			$badge_expiry = '0000-00-00';
		}
		
		$table = "badges";
		$Badge_Assign = 0;
		$Badge_Last_Id=$Badge_Id;
		
		if( $Badge_Id > 0 ){
			
			$data = array(
				"bedge_title"=>$badge_title,
				"bedge_code"=>$badge_code,
				"bedge_expiry"=>$badge_expiry,
				"bedge_color"=>$badge_color,
				"bedge_priority"=>$badge_priority,
				"bedge_description"=>$badge_des,
				"modified"=>time(),
				"modified_by"=>1
			);
			// Update.
			//$Badge_Last_Id = $Model_Obj->Create_Badge($table, $data );
			
			$where = array("id"=>$Badge_Id);
			$Return_Update = $Model_Obj->Update_Badge($table,$data,$where );
		
		
		if( !empty($request->get('Student_CheckBox')) ){
			
			$students = $request->input("Student_CheckBox");
			$table="bedge_student";
			$data = array( "modified"=>time(),"modified_by"=>1,"record_deleted"=>1);
			$where = array("bedge_id"=>$Badge_Id);
			$Return_Update = $Model_Obj->Update_Badge($table,$data,$where );
			
			foreach($students as $student){
				$data = array(
					"bedge_id"=>$Badge_Last_Id,
					"student_id"=>$student,
					"modified"=>time(),
					"modified_by"=>1
				);
			$Badge_Assign = $Model_Obj->Create_Badge($table, $data );
			
			}
		}
		
		
		}
		$returns =array("Badge"=>$Badge_Last_Id, "Badge_Assign"=>$Badge_Assign);
		
		echo json_encode($returns);
		
		
		
	}
	
	
	
	function getUserGroup($Student_id, $User_ID)
	{
		$SQL = "select ug.group_id as Group_id from atif.users_groups as ug where ug.user_id=".$User_ID."";
		$St = DB::connection('mysql')->select($SQL);
		$Group_id=0;
		$User_Role = '';
		if( ( !empty($St) ) && ($St[0]->Group_id > 0) )
		{	
			$Group_id=(int)$St[0]->Group_id;
			switch( $Group_id )
			{
				case 25 :
					$User_Role = 'Academic';
				break;
				case 24 :
					$User_Role = 'Accounts';
				break;
				case 16: 
					$User_Role = 'Accounts';
				break;
				
				default:
					$User_Role = 'SIS';				
			}
		}
		
		$Get_Gs_id = "select  cl.gs_id as Gs_id, cl.academic_session_id as Acadmic from atif.class_list as cl where cl.id =  ".$Student_id." limit 1";
		$Std_Gs_id = $St = DB::connection('mysql')->select($Get_Gs_id);
		
		if( !empty($Std_Gs_id) ){ $Gs_id= $Std_Gs_id[0]->Gs_id; 
		$Acadmic= $Std_Gs_id[0]->Acadmic;
		}else{ $Gs_id=''; }
		
		
		
		
		$StdInfo = new Student_Information();
		
		$Stories = $StdInfo->Student_Stories($Student_id, $User_Role, $Gs_id,$Acadmic );
		
		return $this->Stories_Html($Stories);
		
	
	}
	
	function Stories_Html($Stories){
		
		$List = '';
		$List .= '<ul class="chats" id="Stories_Chats">';

		/*
		$List .= '<li class="in" >
                		<img class="avatar" alt="" src="assets/photos/hcm/150x150/staff/458.png">
            			<div class="message"><span class="arrow"> </span>
            				<div class="ticketTitle"><a href="#">HR01-1710-005</a></div>
            				<div class="CommentInfo">
            					<a href="javascript:;" class="name"> <strong>Static Individual</strong> </a>
	            				<span class="body"> Attendance Confirmed By CT Mon Oct 9, 2017 <br> Date Mon Oct 9, 2017 </span>
	            				<span class="commentCat TPA Confirmed "> TPA Confirmed </span><br> 
	            				<span class="commentDate"> Mon Oct 09, 2017 at 08:07 AM</span>
            				</div>
            			</div>
                	</li>';
        */
		
		if( !empty($Stories) ):
			foreach($Stories as $St):
			
				if( $St->Log_Type == 'User Generated')
					$List .= '<li class="out" data-filters="User Generated" data-category="'.$St->Category.'" >';
				else
					$List .= '<li class="in" data-filters="System" data-category="'.$St->Category.'">';
				
				if( $St->Register_by_gender != '' )
					$List .= '<img class="avatar" alt="" src="'.$this->getStaff_Pic( $St->Register_by_photo, $St->Register_by_gender).'" />';
				else
					$List .= '<img class="avatar" alt="" src="'.STAFF_PIC_150.$St->Register_by_photo.PIC150_TYPE.'" />';
			
			
				$List .= '<div class="message">';
				$List .= '<span class="arrow"> </span>';
				$List .= '<a href="javascript:;" class="name"> <strong>'.$St->Register_by_name.'</strong> </a>';
				//$List .= '<span class="datetime"> <strong></strong> on <strong>'. date("D M d, Y h:s a", strtotime($St->Dated)).'</strong> </span>';
				//$List .= '<span class="datetime"> <strong></strong> on <strong>'. date("D M d, Y", strtotime($St->Dated)).' at '. date("h:i a", strtotime($St->Dated)).'</strong> </span>';
				$List .= '<span class="body"> '.$St->Comments_log.' </span>';
				
				if ($ExCat = explode(",", $St->Category)) { 
				 foreach ( $ExCat as $Cat ) { 
					$List .= '<span class="commentCat '.$Cat.'"> '.$Cat.'</span>';
				 }
				}else{
					$List .= '<span class="commentCat '.$St->Category.'"> '.$St->Category.'</span>';
				}
				$List .= '<br /> <span class="commentDate"> '. date("D M d, Y", strtotime($St->Dated)).' at '. date("h:i A", strtotime($St->Dated)).'</span>';

				
				
				
				$List .= '</div>';
				$List .= '</li>';
				//$List .= '<li style="">'; $List .= $St->Category; $List .= '</li>';
			endforeach;
		else:
			//$List .= '<li class="in">';
			$List .= '<li class="in" style="margin-left:0px;">';
			$List .= '<div class="message" style="margin-left:0px;">';
			$List .= '<span class="arrow"> </span>';
			$List .= '<span class="body"> No Comments available. Try anothe filter. </span>';
			$List .= '<span class="commentCat"></span>';
			$List .= '</div>';
			$List .= '</li>';
		endif;

		$List .= '</ul>';
		
		return $List;
		
		
	}
	
	function Show_FIF(Request $request )
	{
		$Gs_id = $request->input('Gs_id');
		$StdInfo = new Student_Information();
		$Gs_id = (int)str_replace("-","",$Gs_id);
		$fIfno = $StdInfo->getfif($Gs_id);
		$fPhotoExists2=false;
		$mother_photo_found=false;
		$father_photo='';
		$mother_photo='';
		if( !empty( $fIfno )){
			foreach( $fIfno as $s ){
				$PhotoID = $s->photo_id;
				$father_photo2 = FATHER_PIC_150.$PhotoID.PIC150_TYPE;
				if( $fPhotoExists2 === false){
					if( file_exists($father_photo2) ){
						$father_photo = $father_photo2;
						$fPhotoExists2=true;	
					}else{
						$NoPic = 'NoPic';
						$father_photo = FATHER_PIC_150.$NoPic.PIC150_TYPE;
					}
					
					$father_photo = $father_photo2;
					
				}
				if( $mother_photo_found === false ){
					$mother_photo2 	= MOTHER_PIC_150.$PhotoID.PIC150_TYPE;
					if( file_exists( $mother_photo2 ) ){
						$mother_photo = $mother_photo2;
						$mother_photo_found = true;
					}else{
						$NoPic = 'NoPic';
						$mother_photo2 	= MOTHER_PIC_150.$NoPic.PIC150_TYPE;
					}
					
					$mother_photo = $mother_photo2;
				}
					
					
				
				
			}
		}
		
		$html = '';
		$html .= '<ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#ParentInformation">Parents</a></li>
                                <li><a data-toggle="tab" href="#Siblinginformation">Siblings</a></li>
                             </ul><!-- nav-tabs -->
							 <div class="tab-content" id="">';
							 
		$html .= '<div id="ParentInformation" class="tab-pane fade in active">';
			$html .= '<div class="col-md-2 text-right">&nbsp;</div>';
			$html .= '<div class="col-md-8 text-right">';
			$html .= '<div class="col-md-6 text-center">';
				$html .= '<img src='.$father_photo.' class="circleImg" /><br /><h4 class="text-center">'.$fIfno[0]->father_name.'</h4>';
				//$html .= print_r( $fIfno );
			$html .= '</div>';
			$html .= '<div class="col-md-6 text-center">';
				$html .= '<img src='.$mother_photo.' class="circleImg" /><br /><h4 class="text-center">'.$fIfno[0]->mother_name.'</h4>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '<div class="col-md-2 text-right">&nbsp;</div>';
		$html .= '</div><!-- ParentInformation -->';
		
		$fPhotoExists=false;
		$father_photo1='';
		$html .= '<div id="Siblinginformation" class="tab-pane fade">';
		
		if( !empty( $fIfno )){
		foreach( $fIfno as $s ){
			
		$father_photo2 = "assets/photos/sis/150x150/father/".$s->photo_id.".png";
			if( $fPhotoExists === false){
				if( file_exists($father_photo2) ){
					$father_photo1 = $father_photo2;
					$fPhotoExists=true;	
				}
			}else{}
			
			$html .= '<div class="mt-element-card mt-element-overlay">';
				$html .= '<div class="col-md-4">';
					$html .= '<div class="mt-card-item">';
						$html .= '<div class="mt-card-avatar mt-overlay-4">';
							//$html .= '<img src="http://10.10.10.63/gs/assets/photos/sis/150x150/student/'.$s->photo_id.'.png" />';
							$html .= '<img src="'.STUDENT_PIC_150.$s->photo_id.STAFF_PIC150_TYPE.'" />';
							$html .= '<div class="mt-overlay">';
								$html .= '<h2>'.$s->grade_name.'-'.$s->section_name.' <span class="House'.$s->house_name.'">('.$s->house_name.')</span></h2>';
								$html .= '<div class="mt-info font-white">';
									$html .= '<div class="mt-card-content">'; 
										$html .= '<p class="mt-card-desc font-white">GF-ID: <strong>'.$s->gfid.'</strong> ('.$s->active_siblings_position.'/'.$s->siblings_total.')</p>';
										$html .= '<div class="mt-card-social">';
											
										$html .= '</div>';
									$html .= '</div>';
								$html .= '</div>';
								
							$html .= '</div><!-- mt-overlay -->';
						$html .= '</div><!-- mt-card-avatar -->';
						$html .= '<div class="mt-card-content">';
							$html .= '<h3 class="mt-card-name">'.$s->abridged_name.'</h3>'; 
							$html .= '<p class="mt-card-desc font-grey-mint">GS-ID: <strong>'.$s->gs_id.'</strong><br />Status: <strong>'.$s->std_status_code.'</strong></p>';
						$html .= '</div><!-- mt-card-content -->';
					$html .= '</div><!-- mt-card-item -->';
				$html .= '</div><!-- col-md-3 -->';
			$html .= '</div>';												
		}
	}else{
		
	}
$html .= '</div><!-- Siblinginformation -->';
	$html .= '</div>';
	echo json_encode( array("fH"=> $html) );
		
	}
	
	
	
	function Post_Comments( Request $request ){
		$StdInfo = new Student_Information();
		$Family_id =$request->input("CBx_Family");
		$Gs_id =$request->input("Gs_id");
		$CommentsType =$request->input("CommentsType");
		$CType =$request->input("CType");
		$Comments =$request->input("Comments");
		$arrType =$request->input("arrType");
		
		/*Check if Family id is empty if not then get all students ids for that family and add record*/
		
		
		$userID = Sentinel::getUser()->id;
		
		if( $Family_id != '' ){
			$SQL = "select id from atif.class_list as cl where cl.gfid='".$Family_id."'";
		}else{
			$SQL = "select id from atif.class_list as cl where cl.gs_id='".$Gs_id."'";
		}
		
		$StList = DB::connection('mysql')->select($SQL);
		$Table='log_comments';
		$Tag_Categories='';
		$Arr=array();
		foreach( $StList as $s  ):
			foreach($arrType as $t ){
				$Arr[]=$t;
			}
			$Tag_Categories = implode(", ",$Arr);
			// Database Insertion	
			$data = array( "student_id"=>$s->id, "comments"=>$Comments, "tag"=>$Tag_Categories,"created"=>time(),"register_by"=>$userID );
			$Last_inserted = $StdInfo->Set_Comments($Table,$data);
			$Arr=array();
		endforeach;
		
		return $Last_inserted;
		
	}
	
	
	
	function Search_Comments(Request $request){
		
		$Student_id =$request->input("Student_id");
		$Gs_id =$request->input("Gs_id");
		$Academic =$request->input("Academic_id");
		
		
		$Sort_By_Source =$request->input("SortBySource");
		$Search_Cat  =	$request->input("Search_Cat_Finance");
		
		
		$from_date   =	$request->input("from_date");
		$to_date     =	$request->input("to_date");
		
		$Query = "SELECT * FROM (" ;
		
		if( $Sort_By_Source == 'user'){
		$Query .= $this->Source_User($Student_id);		
		//$Query .= $this->Sub_Queries($Gs_id,$Student_id);
		}elseif( $Sort_By_Source == 'system'){
		$Query .= $this->Source_System($Student_id);
		$Query .= $this->Sub_Queries($Gs_id,$Student_id,$Academic);
		}else{
		$Query .= $this->Source_User_System($Student_id);
		$Query .= $this->Sub_Queries($Gs_id,$Student_id,$Academic);
		}
		
	
		
		$Query .= ")  AS DATA";
		
		
		if( $from_date != '' && $to_date == '' ){
			$Query .= " where Dated >= '".$from_date."' and Dated<= curdate()";
		}
		
		if( $from_date != '' && $to_date != '' ){
			$Query .= " where Dated >= '".$from_date." 00:00:00' and Dated <= '".$to_date." 23:59:59'";
		}
		
		if( $from_date == '' && $to_date == '' ){
			$Query .= " where Log_Type != '' ";	
		}
		
		$counter=1;
		$VarBool=false;
		if( !empty($Search_Cat)){
			foreach($Search_Cat as $Cat ){
				if( sizeof($Search_Cat) > 0 ){
					if(!$VarBool){
						$Query .= " and ";
						$Query .= " ( ";	
					}
					$Query .= " Category LIKE '%".$Cat."%' ";
					if( $counter ==  sizeof($Search_Cat) ){
						$Query .= " ) ";
					}else{
						$Query .= " OR ";
					}
				}else{
					$Query .= "  Category like '%".$Cat."%' ";	
				}
				$VarBool=true;
			$counter++;
			}
		}
		
		$Query .= " ORDER BY Dated DESC"; 
		$Stories=DB::connection('mysql')->select($Query);
		return $this->Stories_Html($Stories);
	}
	
	
	
	
	public function Source_User_System($Student_id){
		$Query = "";
			$Query .= "SELECT 'User Generated' AS Log_Type, lc.student_id AS Student_id, lc.comments AS Comments_log, lc.tag AS Category, 
				'' as Fourth_column, 
				sr.abridged_name as Register_by_name, 
				sr.employee_id as Register_by_photo, 
				sr.gender as Register_by_gender,
				from_unixtime(lc.created) AS Dated, lc.register_by AS User_id, lc.modified AS Updated_on, lc.modified_by AS Updated_by 
				FROM atif_student_log.log_comments AS lc 
				left join atif_gs_sims.users as u on u.id=lc.register_by
				inner join atif.staff_registered as sr 
				on  on sr.gg_id=u.email "; 


			$Query .= " WHERE lc.student_id=".$Student_id." ";
				
			$Query .= " UNION  
			
			SELECT 'Generations SMS' AS Log_Type, '' AS Student_id, sms.message AS Comments_log, 
			'SMS' AS Category, '' AS Old_Section_id, 
			'Generations SMS' as Register_by_name,
			'gs_logo' as Register_by_photo,
			'' as Register_by_gender,

			sms.created AS Dated, '' AS User_id, '' AS Updated_on, '' AS Updated_by 
			FROM atif_sms.sms_api_log AS sms
			WHERE sms.mobile_phone=(
			SELECT
			REPLACE(fr.mobile_phone,'-','') mobile
			FROM atif.student_family_record AS fr
			WHERE fr.gf_id=(
			SELECT cl.gf_id
			FROM atif.class_list AS cl
			WHERE cl.id=".$Student_id.") AND fr.mobile_phone != ''
			LIMIT 1) AND sms.message NOT LIKE '%Mr%' AND sms.message NOT LIKE '%Ms%' "; 
				
		return $Query;
	}
	public function Source_User($Student_id)
	{
		$Query = "";
			$Query .= "SELECT 'User Generated' AS Log_Type, lc.student_id AS Student_id, lc.comments AS Comments_log, lc.tag AS Category, 
				'' as Fourth_column, 
				sr.abridged_name as Register_by_name, 
				sr.employee_id as Register_by_photo, 
				sr.gender as Register_by_gender,
				from_unixtime(lc.created) AS Dated, lc.register_by AS User_id, lc.modified AS Updated_on, lc.modified_by AS Updated_by 
				FROM atif_student_log.log_comments AS lc 
				left join atif_gs_sims.users as u on u.id=lc.register_by
				inner join atif.staff_registered as sr 
				on  on sr.gg_id=u.email"; 
				$Query .= " WHERE lc.student_id=".$Student_id." ";
				
				
				
		return $Query;
	}
	public function Source_System($Student_id)
	{
		$Query = "";
			$Query .= "SELECT 'Generations SMS' AS Log_Type, '' AS Student_id, sms.message AS Comments_log, 
			'SMS' AS Category, '' AS Old_Section_id, 
			'Generations SMS' as Register_by_name,
			'gs_logo' as Register_by_photo,
			'' as Register_by_gender,

			sms.created AS Dated, '' AS User_id, '' AS Updated_on, '' AS Updated_by 
			FROM atif_sms.sms_api_log AS sms
			WHERE sms.mobile_phone=(
			SELECT
			REPLACE(fr.mobile_phone,'-','') mobile
			FROM atif.student_family_record AS fr
			WHERE fr.gf_id=(
			SELECT cl.gf_id
			FROM atif.class_list AS cl
			WHERE cl.id=".$Student_id.") AND fr.mobile_phone != ''
			LIMIT 1) AND sms.message NOT LIKE '%Mr%' AND sms.message NOT LIKE '%Ms%' "; 
		return $Query;
	}
	
	
	public function Sub_Queries($Gs_id,$Student_id,$Academic){
		
		$Query ="";
		// Sis Request for house change
				$Query .= " UNION 
							SELECT 'House Change' AS Log_Type, sh.student_id AS Student_id, 'House Changes' AS Comments_log, 
							'SIS' AS Category, house.short_name AS Fourth_column,
							sr.abridged_name as Register_by_name,
							sr.employee_id as Register_by_photo,
							sr.gender as Register_by_gender,
							from_unixtime(sh.created) AS Dated, sh.register_by AS User_id, sh.modified AS Updated_on, sh.modified_by AS Updated_by 
							FROM atif_student_log.log_student_house AS sh 
							INNER JOIN atif.class_list AS cl ON cl.id=sh.student_id 
							INNER JOIN atif._house AS house ON house.id=sh.old_house_id 
							
				inner join atif.staff_registered as sr 
							on sr.id=sh.register_by 
							WHERE sh.student_id=".$Student_id." ";
							
						// Sis Request for section change
						$Query .= " UNION 
							SELECT 'Section Change' AS Log_Type, ss.student_id AS Student_id, 'Section Change' AS Comments_log, 
							'SIS' AS Category, 
							ss.old_section_id AS Old_Section_id, 
							sr.abridged_name as Register_by_name, 
							sr.employee_id as Register_by_photo, 
							sr.gender as Register_by_gender,
							from_unixtime(ss.created) AS Dated, ss.register_by AS User_id, ss.modified AS Updated_on, ss.modified_by AS Updated_by 
							FROM atif_student_log.log_student_section AS ss 
							inner join atif.staff_registered as sr 
							on sr.id=ss.register_by 
							WHERE ss.student_id=".$Student_id." ";
							
						// Sis request for status change
						$Query .= " UNION 
							SELECT 'Status Change' AS Log_Type, st.student_id AS Student_id, 
							CONCAT('Status Change >', st.old_comments) AS Comments_log, 
							'SIS' AS Category, '' AS Old_Section_id, 
							sr.abridged_name as Register_by_name,
							sr.employee_id as Register_by_photo, 
							sr.gender as Register_by_gender,
							from_unixtime(st.created) AS Dated, st.register_by AS User_id, st.modified AS Updated_on, st.modified_by AS Updated_by 
							FROM atif_student_log.log_student_status AS st 
							inner join atif.staff_registered as sr 
							on sr.id=st.register_by 
							WHERE st.student_id=".$Student_id." ";
							
							
						$Query .= " UNION  
							select
							'Attendance' AS Log_Type, 
							att.id AS Student_id,  
							concat( ' Attendance Tap IN on ', DATE_FORMAT(att.date, '%a %b %e, %Y' ) , ' <br />  at ', TIME_FORMAT(att.time, '%h:%i %p') ) AS Comments_log,
							'Attendance' AS Category, 
							'' AS Old_Section_id, 
							if( att.register_by=0,'Attendance TapIN', 
							
							concat( 'Modified By ',( select att_sr.abridged_name from atif.staff_registered as att_sr 


							where att_sr.user_id=att.register_by ) 
							) ) as  Register_by_name, 
							
							
							
							if( att.register_by=0,'gs_logo', 
							( select att_sr.employee_id from atif.staff_registered as att_sr where att_sr.user_id=att.register_by )
							) as  Register_by_photo,
							'' Register_by_gender,
							FROM_UNIXTIME( UNIX_TIMESTAMP (
							STR_TO_DATE(concat( att.date, ' ', att.time),'%Y-%m-%d %H:%i:%s' ) ) )as Dated, 
							'' AS User_id, 
							'' AS Updated_on, 
							'' AS Updated_by 
							
							from atif_attendance.student_attendance as att 
							where  
							att.gs_id='".$Gs_id."' 
							and att.date >= ( select ad.start_date as Att_Starting_From from atif.class_list as cl 
							inner join atif._academic_session as ad 
							on ad.id=cl.academic_session_id 
							where cl.id=".$Student_id." ) ";

					$Query .= " union  
							SELECT 
							'Active Case' AS Log_Type, 
							'' AS Student_id, 

							if( acc.name != '', concat( 'Case Active ' , acc.name ), concat( ' Close Case Name ', accl.name ) ) AS Comments_log, 

							'SIS' AS Category, 
							ac.category_id AS Old_Section_id, 
							sr.abridged_name as Register_by_name, 
							sr.employee_id as Register_by_photo, 
							sr.gender as Register_by_gender,
							from_unixtime(ac.created) AS Dated, 
							ac.register_by AS User_id, 
							ac.modified AS Updated_on, 
							ac.modified_by AS Updated_by 

							FROM atif_attendance.activecase_case ac 
							left join atif_attendance.activecase_category acc on  
							acc.id = ac.category_id  
							left join atif_attendance.activecase_category accl on 
							accl.id = ac.close_category_id 

							left join 
							atif.staff_registered as sr  
							on sr.user_id = ac.register_by   
							where ac.gs_id = '".$Gs_id."' ";	 
							
						$Query .= " UNION 
							SELECT 'System Generated' AS Log_Type, con.student_id AS Student_id, 
							CONCAT('Concession Type:', con_type.dname, ' Percentage: ', 
							con.percentage,' Amount: ', con.amount, ' Active from: ', con.active_from) AS Comments_log, 
							'Accounts' AS Category, '' AS Old_Section_id,  
							sr.abridged_name as Register_by_name, 
							sr.employee_id as Register_by_photo, 
							sr.gender as Register_by_gender,
							from_unixtime(con.created) AS Dated, con.register_by AS User_id, con.modified AS Updated_on, con.modified_by AS Updated_by  
							FROM atif_student_log.log_student_concession AS con  
							INNER JOIN atif_fee.concession_type_parameter AS con_type  
							inner join atif.staff_registered as sr  
							on sr.id=con.register_by 
							WHERE con.student_id=".$Student_id." AND con.is_active=1 "; 
							
						$Query .= " UNION 
						select 

						'Etab Marks' AS Log_Type, 
						mar.student_id  AS Student_id, 

						CONCAT( 
						' Grade: ', g.dname, 
						' <br />  Subject_name: ', sub.dname,
						' <br /> Category_Name: ', cat.dname,
						' <br />  Assessment_Type: ', asType.name,
						' <br /> Assessment On: ', dt.title,
						' <br /> Obtained_Marks: ', mar.marks_obtained,
						' <br /> Max_Marks: ', dt.max_marks
						) AS Comments_log, 
						'Etab' AS Category,
						'' AS Old_Section_id, 
						sr.abridged_name as Register_by_name,
						sr.employee_id as Register_by_photo,
						sr.gender as Register_by_gender,
						from_unixtime(mar.created) AS Dated, 
						mar.register_by AS User_id, 
						mar.modified AS Updated_on,
						mar.modified_by AS Updated_by 
						from atif_subject_marks.assessment_marks as mar 
						inner join atif.staff_registered as sr 
						on sr.id=mar.register_by  
						inner join atif_subject_grade.assessment_detail as dt  
						on dt.id=mar.assessment_detail_id 
						inner join atif_assessment.gradesubjectass as grdsubass  
						on grdsubass.id = dt.assessment_in_grade_id 
						inner join atif_assessment.assessment_category as cat 
						on cat.id=grdsubass.assessment_category_id 
						inner join atif_subject.programmesetup as pro 
						on pro.id = grdsubass.program_id 
						inner join atif_subject.subject as sub 
						on sub.id=pro.subjects 
						inner join atif._grade as g 
						on g.id = pro.gradeID 
						inner join atif_assessment.assessment_type as asType 
						on asType.id=grdsubass.assessment_type_id 
						where mar.student_id=".$Student_id." and dt.ignore=0 ";
						
			$Query .= " union
SELECT
'System Generated' AS Log_Type,
fb.student_id AS Student_id,
CONCAT( 
	'Bill Type ',fbtp.name,
	' <br /> Bill Title ',fb.bill_title,
	' <br /> Bill Issue Date ',DATE_FORMAT(fb.bill_issue_date, '%a %b %e, %Y' ),
	' <br /> Bill Due Date ',DATE_FORMAT(fb.bill_due_date, '%a %b %e, %Y' ),
	' <br /> Bill Amount  ',fb.total_payable ) as Comments_log,
'Accounts' AS Category,
'' AS Old_Section_id,
'Fee Bill Generated ' as Register_by_name,
'gs_logo' as Register_by_photo,
'' as Register_by_gender,
from_unixtime(fb.created) AS Dated, 
fb.register_by AS User_id,
fb.modified AS Updated_on, 
fb.modified_by AS Updated_by 
from atif_fee_student.fee_bill as fb
#left join atif_fee_student.fee_bill_received as fbr
#on ( fbr.fee_bill_id = fb.id )
left join atif_fee_student.fee_bill_type_parameter as fbtp
on fbtp.id=fb.fee_bill_type_id
where fb.student_id=".$Student_id."
and fb.academic_session_id=".$Academic." ";

			$Query .= " union
SELECT 'System Generated' AS Log_Type,
fb.student_id AS Student_id,

CONCAT( 
	'Bill Type ',fbtp.name,
	' <br /> Bill Title ',fb.bill_title,
	' <br /> Received Date ',DATE_FORMAT(fbr.received_date, '%a %b %e, %Y' ),
	' <br /> Received Amount ', fbr.received_amount ,
	' <br /> Received Mode ', fbr.received_payment_mode,
	' <br /> Received Branch ', fbr.received_branch
	) as Comments_log,

'Accounts' AS Category,
'' AS Old_Section_id,
'Fee Bill Received ' as Register_by_name,
'gs_logo' as Register_by_photo,
'' as Register_by_gender,
from_unixtime(fbr.created) AS Dated, 
fb.register_by AS User_id,
fb.modified AS Updated_on, 
fb.modified_by AS Updated_by 
from atif_fee_student.fee_bill as fb
left join atif_fee_student.fee_bill_received as fbr
on ( fbr.fee_bill_id = fb.id )
left join atif_fee_student.fee_bill_type_parameter as fbtp
on fbtp.id=fb.fee_bill_type_id
where fb.student_id=".$Student_id."
and fb.academic_session_id=".$Academic." ";


			$Query .= " union
select 


'System Generated' AS Log_Type,
stt.id AS Student_id,
CONCAT(  'Attendance Confirmed By CT ', from_unixtime(vt.created, '%a %b %e, %Y' ),
' <br /> Date ', from_unixtime(vt.created, '%a %b %e, %Y' )
) as Comments_log,
	

'TPA Confirmed ' AS Category,
'' AS Old_Section_id,
stt.abridged_name as Register_by_name,
stt.employee_id as Register_by_photo,
stt.gender as Register_by_gender,
from_unixtime(vt.created) AS Dated, 
stt.user_id AS User_id,
vt.modified AS Updated_on,
vt.modified_by AS Updated_by 


 from atif_attendance.attendance_verification_teacher  as vt
 
 
left join atif.staff_registered as stt
on stt.user_id=vt.user_id


where vt.date > date('2017-08-01') 
and vt.user_id=( 
select st.user_id
from atif.staff_registered as st
where st.id=( 
select Roles.staff_id from atif.class_list cl 
left join( select role.* from `atif_role`.`role_in_org_view` as  `role` ) as Roles
on (Roles.grade_id=cl.grade_id and Roles.section_id=cl.section_id)
where cl.gs_id='".$Gs_id."' and ( Roles.`type_id` = 15  or Roles.`type_id` = 16 ) 
and Roles.staff_id != ''
limit 1
)
) 
group by vt.date ";
						
						
		return $Query;				
	}
	
	
	









	public function add_student_story(Request $request){

	
		$html = '';

		$GSID = $request->input('gs_id', 0);
		$abridgedName = $request->input('abridged_name', '');
		
	$Cmm_Cat = "SELECT  cc.ID as Category_id, cc.category_name as Category_name FROM atif_student_log.comment_category as cc WHERE cc.Type='comments' AND cc.record_deleted=0";
	$CommCat = DB::connection('mysql')->select($Cmm_Cat);
	
	$Cmm_Cat2 = "SELECT  cc.ID as Category_id, cc.category_name as Category_name FROM atif_student_log.comment_category as cc WHERE cc.Type='communication' AND cc.record_deleted=0";
	$CommCat2 = DB::connection('mysql')->select($Cmm_Cat2);
	
	

		$html = '<div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-shield"></i><font><font>Add story for <strong>'.$abridgedName.'</strong> </font></font>
                        </div><!-- caption -->
                        <input type="hidden" id="student_gsid" value="'.$GSID.'">
                        <input type="hidden" id="student_name" value="'.$abridgedName.'">
                        <input type="hidden" id="date_time" value="'.date('D, d M Y-H:i A').'">
                    </div><!-- portlet-title -->
                    <div class="portlet-body">
                        <div class="row">
                        	<div class="col-md-12">
                            	<textarea style="width:100%;padding:10px;" rows="6" cols="50" id="comments" placeholder="Comments..."></textarea>
                            </div><!-- col-md-12 -->
                        </div><!-- row -->


                        <div class="row">
                        	<div class="col-md-6">
                            	<div class="form-group">
                                    <label>Comment Category</label>';
									
	$html .= '<br /><select data-attribute="profile" multiple="multiple" id="Dropdown_Comment_Category" class="ddlFilterTableRow page-header-option form-control input-sm multiselect">';
	
	 if( !empty( $CommCat ) ): 
		foreach( $CommCat as $Cat ): 
			$Cat->Category_name;
				if( $Cat->Category_name == 'ETAB' )
				{
					$strings = substr($Cat->Category_name, 0, 1).'-'.substr($Cat->Category_name, 1);
				}else 
				{
					$strings=$Cat->Category_name;
				}
			$html .= '<option value="'.$strings.'">'.$strings.'</option>';
		endforeach;
	endif;
													
	$html .= '</select>';
	
	
	
	
	
	$html .= '<div class="input-icon right">';
	
	
	$html .= '<span class="multiselect-native-select">';
	
	//$html .= '<select data-attribute="profile" multiple="multiple" id="Dropdown_Comment_Category" class="ddlFilterTableRow layout-option form-control input-sm multiselect">';
	

													
													
	//$html .= '<option value="Finance">Finance</option>';
	//$html .= '<option value="Academic">Academic</option>';
	//$html .= '<option value="E-Tab">E-Tab</option>';
	//$html .= '<option value="SIS">SIS</option>';
	//$html .= '<option value="Family">Family</option>';
	//$html .= '<option value="SMS">SMS</option>';
	
	//$html .= '</select>';
	/*$html .= '<div class="btn-group">';
	$html .= '<button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Comment Category" aria-expanded="true">';
	$html .= '<span class="multiselect-selected-text">Select Comment Category </span>';
	$html .= '<b class="caret"></b></button>';
	$html .= '<ul class="multiselect-container dropdown-menu">';
	$html .= '<li><a tabindex="0"><label class="checkbox" for="Comment_Cat[]"><input type="checkbox" name="Comment_Cat[]" value="Finance" id="Finance"> Finance</label></a></li>';
	$html .= '<li><a tabindex="1"><label class="checkbox" for="Academic"><input type="checkbox" name="Comment_Cat[]" value="Academic" id="Academic"> Academic</label></a></li>';
	$html .= '<li><a tabindex="2"><label class="checkbox" for="E-Tab"><input type="checkbox" name="Comment_Cat[]" value="E-Tab" id="E-Tab"> E-Tab</label></a></li>';
	$html .= '<li><a tabindex="3"><label class="checkbox" for="SIS"><input type="checkbox" name="Comment_Cat[]" value="SIS" for="SIS">SIS</label></a></li>';
	$html .= '<li><a tabindex="4"><label class="checkbox" for="Family"><input type="checkbox" name="Comment_Cat[]" value="Family" for="Family">Family</label></a></li>';
	$html .= '<li><a tabindex="5"><label class="checkbox" for="SMS"><input type="checkbox" name="Comment_Cat[]" value="SMS" for="SMS">SMS</label></a></li>';
	$html .= '</ul>';
	$html .= '</div>';*/
	$html .= '</span>';
	
	$html .= '</div>';
    $html .= '</div>';
    $html .= '<label></label>';
	$html .= '</div>';


	$html .= '<div class="col-md-6">
		<div class="form-group">
        	<label>Communication Category</label>';
									
	$html .= '<br /><select data-attribute="communication" multiple="multiple" id="Dropdown_Comm_Category" class="ddlFilterTableRow page-header-option form-control input-sm multiselect">';
	
	 if( !empty( $CommCat2 ) ): 
		foreach( $CommCat2 as $Cat ): 
			$Cat->Category_name;
				if( $Cat->Category_name == 'ETAB' )
				{
					$strings = substr($Cat->Category_name, 0, 1).'-'.substr($Cat->Category_name, 1);
				}else 
				{
					$strings=$Cat->Category_name;
				}
			$html .= '<option value="'.$strings.'">'.$strings.'</option>';
		endforeach;
	endif;
													
		$html .= '</select>';
		$html .= '<div class="input-icon right">';
		$html .= '<span class="multiselect-native-select">';
		$html .= '</span>';
		$html .= '</div>';
		$html .= '<!--select data-attribute="profile" multiple="multiple" id="studentComCateo" class="ddlFilterTableRow layout-option form-control input-sm">
                                           <option value="Call">Call</option>
                                           <option value="SMS">SMS</option>
                                           <option value="WhatsApp">WhatsApp</option>
                                           <option value="Walkin">Walkin</option>
                                        </select --> 
										
										
                                    </div>
                                </div>
                            </div><!-- col-md-6 -->
                        </div><!-- row -->
                        
							
													
                    </div><!-- portlet-body -->
					
					
                </div><!-- portlet -->';


		return $html;
	}




    //Add Stories Of Students// 

	public function add_this_student_story(Request $request){

		
		/*print_r("Working Page");
		die;*/

		$GSID = $request->input('gs_id', 0);
		$Family_State = $request->input('Family_State');
		$comments = $request->input('comments', '');
		
		$comments_cat ='';
		$communication_cat ='';
		
		$comments_cat = implode(",", $request->input('comments_cat', ''));
		$communication_cat = implode(",", $request->input('communication_cat', ''));
		
		if($GSID != 0){
			
		
		if( $Family_State == 1 ){
			$SQL = "
select id from atif.class_list as cl where cl.gfid= ( select cl.gfid from atif.class_list as cl where cl.gs_id='".$GSID."' )";
		}else{
			$SQL = "select id from atif.class_list as cl where cl.gs_id='".$GSID."'";
		}
		
		$StList = DB::connection('mysql')->select($SQL);
		$Table='log_comments';
		$Tag_Categories='';
		$Arr=array();




$Get_user_email = "select sr.user_id as user_id from atif_gs_sims.users as u 
left join atif.staff_registered as sr on sr.gg_id=u.email
where u.id=".Sentinel::getUser()->id; 



$Get_useremail = DB::connection('mysql')->select($Get_user_email);
foreach( $Get_useremail as $s  ):
$Getuseremail = $s->user_id;
break;
endforeach;



		
		foreach( $StList as $s  ):
			
			$result = DB::connection('mysql_StudentLog')->table('log_comments')->insert(
				[
					'student_id' => $s->id,
					'comments' => $comments,
					'tag' => $comments_cat,
					'communication_tag' => $communication_cat,
					'created' => Carbon::now()->timestamp,
					'register_by' => $Getuseremail,
					'modified' => Carbon::now()->timestamp,
					'modified_by' => $Getuseremail
				]
			);
			
			
			
		endforeach;
		
		
		
		//$StudentID = DB::connection('default_Atif')->table('class_list')->where('gs_id', $GSID)->value('id');
		
		
			
		}else{
			return 'Error!';
		}
	}






}