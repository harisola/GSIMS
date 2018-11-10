<?php
/******************************************************************
* Author : Atif Naseem
* Email : atif.naseem22@gmail.com
* Cell : +92-313-5521122
*******************************************************************/


namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Information\StaffInformationModel;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Sentinel::check()){
            $userID = Sentinel::getUser()->id;
            $user = array();
        	/**********************************************
        	* Calling User Menu
        	***********************************************/
            $query = "call sp_getUserMenu(".$userID.")";
            $userMenu = DB::connection('mysql')->select($query);

            $LNavMenu = '';
            foreach ($userMenu as $menu) {
                if($menu->parent_id == 0){
                    $LNavMenu .= $this->buildMenu($userMenu, $menu);
                }
            }
            
            /**********************************************
            * Calling User Info
            ***********************************************/
            $query = "select
            ou.id, sr.employee_id as photo_id, sr.name_code, sr.abridged_name, sr.gender, ou.email, sr.gt_id,
            sr.id as staff_id
            from atif_gs_sims.users as nu
            left join (select
                if(email='admin', 'a.naseem' , email) as email, ou.id
                from
                    (select 
                    SUBSTRING(ou.email, 1, LOCATE('@',ou.email)-1) as email, ou.id
                    from atif.users as ou) as ou) as ou
                    on ou.email = SUBSTRING(nu.email, 1, LOCATE('@',nu.email)-1)
            left join atif.staff_registered as sr
                on sr.user_id = ou.id
            where nu.id = " . $userID . " limit 1";
            $user['info'] = DB::connection('mysql')->select($query);
            if (!file_exists(STAFF_PIC_150 . $user['info'][0]->photo_id . STAFF_PIC150_TYPE)){
                if($user['info'][0]->gender == 'M'){
                    $user['info'][0]->photo_id = 'male';
                }else if($user['info'][0]->gender == 'F'){
                    $user['info'][0]->photo_id = 'female';
                }
            }




            /**********************************************
            * Calling ByGrade Menu
            ***********************************************/
            if(isset($user['info'][0])){
                $query = "SELECT
                grade_name as dtitle, grade_id, 0 as section_id
                FROM atif.class_list_access 
                WHERE (".WHERE_ACDSES.") 
                AND (staff_id = ".$user['info'][0]->staff_id.") 
                order by complete_in_years desc, all_sections_allowed desc";
                $data = DB::connection('mysql')->select($query);
                if(isset($data)){
                    $NavMenu['ByGrade'] = $this->buildSimpleMenu($data, 'grade_section');
                }
            }else{
                $NavMenu['ByGrade'] = array();
            }




            /**********************************************
            * Calling ByGroup Menu
            ***********************************************/
            if(isset($user['info'][0])){
                $query = "SELECT
                CONCAT(cl.grade_name, '-', cl.section_name) as dtitle, cl.grade_id, cl.section_id
                FROM (SELECT
                    grade_id, grade_name as dtitle, complete_in_years
                    FROM atif.class_list_access
                    WHERE (".WHERE_ACDSES.") 
                    AND (staff_id = ".$user['info'][0]->staff_id.")) as d
                left join atif.class_list as cl
                    on cl.grade_id = d.grade_id
                group by cl.grade_id, cl.section_id
                order by d.complete_in_years desc, cl.section_id";
                $data = DB::connection('mysql')->select($query);
                if(isset($data)){
                    $NavMenu['ByGroup'] = $this->buildSimpleMenu($data, 'grade_section');
                }
            }else{
                $NavMenu['ByGroup'] = array();
            }


            /**********************************************
            * Calling MyClassGroups Menu
            ***********************************************/
            if(isset($NavMenu['ByGrade'])){
                $Group_Menu = $this->Get_Group_Menu($userID, WHERE_ACDSES_To);
            }





            /**********************************************
            * Calling Staff Team according to CardBottomLine
            ***********************************************/
            $StaffTeamMenu = $this->getCBLTeam($userID);






            /**********************************************
            * Calling Previous Portal Menus
            ***********************************************/
            /*$query = "select
            dm.id as id, dm.title as title, dm.link_type as link_type, dm.page_id as page_id, dm.module_name as module_name,
            IF(dm.url != '', CONCAT('http://10.10.10.63/gs/index.php/', dm.url), dm.url) as url,
            dm.uri as uri, dm.position as position, '_blank' as target, dm.parent_id as parent_id,
            dm.is_parent as is_parent, group_crud.menu_visible as show_menu,
            dm.dtitle as dtitle, dm.font_class as font_class, dm.font_icon as font_icon
                                        
            from atif.dyn_menu as dm
            join atif.group_crud as group_crud
                on group_crud.menu_id = dm.id
            left join atif.users_groups as users_groups
                on users_groups.group_id = group_crud.group_id

            where dm.dyn_group_id = 1
            and users_groups.user_id = ".$user['info'][0]->id."

            group by dm.id

            order by dm.position asc, dm.title asc";
            $userMenu = DB::connection('mysql')->select($query);
            foreach ($userMenu as $menu) {
                if($menu->parent_id == 0){
                    $LNavMenu .= $this->buildMenu($userMenu, $menu)s;
                }
            }*/





            /**********************************************
            * Calling Previous ETAB Portal Menus
            ***********************************************/
            $userMenu = null;
            /*
            http://10.10.10.63/gs/index.php/process/define_process?user_id=160&matrixRoleSbjTchrID=135&programmeID=489&secName=C&sectionID=3&gradeID=14&Grade=XI&subjectID=34&Subject=Biology&subjectCode=BIOL&optional=1&GPID=&gpp_id=XI-BIOL-B-3

            http://10.10.10.63/gs/index.php/process/define_process?user_id=160&matrixRoleSbjTchrID=135&programmeID=489&secName=C&sectionID=3&gradeID=14&Grade=XI&subjectID=34&Subject=Biology&subjectCode=BIOL&optional=1&GPID=&gpp_id=XI-BIOL-B-3
            */
            
            /*$query = "SELECT 
            a.id AS tSID, a.program_id AS pID, a.gp_id AS GPID, b.dname AS secName,b.id AS sectionID,c.optional AS OPT,d.id AS gradeID, d.dname AS Grade, e.id AS subjectID, e.dname AS Subject,e.code AS subjectCode, concat(d.dname, '-', e.code, right(a.gp_id, 4)) AS gpp_id,
                CONCAT('http://10.10.10.63/gs/index.php/process/define_process?user_id=', ".$user['info'][0]->staff_id.", '&matrixRoleSbjTchrID=', a.id,
                        '&programmeID=', a.program_id, '&secName=', b.dname, '&sectionID=', b.id, '&gradeID=', d.id, '&Grade=',
                        d.dname, '&subjectID=', e.id, '&Subject=', e.dname, '&subjectCode=', e.code, '&optional=', c.optional,
                        '&GPID=', '&gpp_id=', a.gp_id) as url,
                    '' as font_class, '' as font_icon, a.gp_id as dtitle
            FROM atif_role_matrix.role_subject_teacher AS a
            LEFT JOIN atif._section AS b
                on b.id =a.section_id
            LEFT JOIN atif_subject.programmesetup AS c
                on a.program_id = c.id
            LEFT JOIN atif._grade AS d
                on c.gradeID = d.id
            LEFT JOIN atif_subject.subject AS e
                ON c.subjects = e.id
            WHERE a.academic_session_id >= " . env('ACADEMIC_SESSION_FROM') . " AND a.academic_session_id <= " . env('ACADEMIC_SESSION_TO') . " AND a.staff_id = ".$user['info'][0]->staff_id;
            $userMenu = DB::connection('mysql')->select($query);


            if(!empty($userMenu)){
                $LNavMenu .= 
                '<li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">E-Tab</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">';
                foreach($userMenu as $m){
                    $LNavMenu .= 
                        '<li class="nav-item">
                            <a href="#'.$m->url.'" class="nav-link">
                                <i class="'.$m->font_class.' '.$m->font_icon.'"></i> '.$m->dtitle.'</a>
                        </li>';
                }
                $LNavMenu .=
                    '</ul>
                </li>';
            }*/
            
            $serverLURL = $this->Get_Server_Login_Link($userID, WHERE_ACDSES_To);
            return view('dashboard.dashboard')->with(array('LNavMenu' => $LNavMenu, 'user' => $user, 'LNavMenu_ByGrade' => $NavMenu['ByGrade'], 'serverLURL' => $serverLURL,
                'LNavMenu_ByGroup' => $NavMenu['ByGroup'], 'MyClassGroups' => $Group_Menu, 'StaffTeamMenu' => $StaffTeamMenu));;
        }else{
            return redirect('/login');
        }
    }








 public function buildMenu($userMenu, $menu){

        $html = '<li data-toggle="collapse" data-target="#'.$menu->target.'" class="collapsed" aria-expanded="false"">';
        $html .= '<a href="javascript:;" class="nav-link nav-toggle">
                    <i class="'.$menu->font_icon.'" data-toggle="dropdown"></i>'.$menu->dtitle.'
                    <span class="arrow "></span>
                  </a>
                  <ul class="sub-menuu collapse" id="'.$menu->target.'" aria-expanded="true" style="" role="menu">';

        $html .= $this->buildMenu2($userMenu, $menu);
        $html .= '</ul>
            </li>';
        return $html;
    }



    public function buildMenu2($userMenu, $menu){
        $html = '';
        $onGoing = false;
        foreach ($userMenu as $m){
            if($m->parent_id == $menu->id){
                if($onGoing){
                    $html .= '</ul>
                            </li>';
                }
                $html .= '<li>
                            <a href="#'.$m->url.'"> '.$m->dtitle.'
                            </a>
                            <ul class="sub-menu">';
                $onGoing = true;
                $html .= $this->buildMenu3($userMenu, $m);
            }
        }
        $html .= '</ul>
            </li>';
        return $html;
    }



    public function buildMenu3($userMenu, $menu){
        $html = '';
        foreach ($userMenu as $m) {
            if($m->parent_id == $menu->id){
                $html .= '<li class="nav-item">
                    <a href="#'.$m->url.'" class="nav-link">
                        <i class="'.$m->font_class.' '.$m->font_icon.'"></i> '.$m->dtitle.'</a>
                  </li>';
            }
        }
        return $html;
    }





    public function buildSimpleMenu($userMenu, $url){
        $html = '';
        if($url == 'grade_section'){
            foreach ($userMenu as $m) {
                $html .= '<li class="nav-item">
                    <a href="#student_layout?grade_id='.$m->grade_id.'&section_id='.$m->section_id.'" class="nav-link">
                        <i class=""></i> '.$m->dtitle.'</a>
                  </li>';
            }
        }else if($url == ''){
            foreach ($userMenu as $m) {
                $html .= '<li class="nav-item">
                    <a href="#'.$url.'" class="nav-link">
                        <i class=""></i> '.$m->dtitle.'</a>
                  </li>';
            }
        }

        return $html;
    }











    /*
     * Group Menu For E-Tab Teacher Login
    */
    
    function Get_Group_Menu($User_ID, $Academic_ID){
        
        $SQL = "select s.id as StaffID from atif.staff_registered as s where s.user_id=".$User_ID."";
        $St = DB::connection('mysql')->select($SQL);
        if(isset($St[0]->StaffID)){
            $StaffID = $St[0]->StaffID;
        }else{
            return;
        }
        
        $where = "a.academic_session_id=".$Academic_ID." AND a.staff_id = ".$StaffID;
        $query ="SELECT 
        a.id AS tSID, a.program_id AS pID, a.gp_id AS GPID, b.dname AS secName,b.id AS sectionID,c.optional AS OPT,d.id AS gradeID, d.dname AS Grade, e.id AS subjectID, e.dname AS Subject,e.code AS subjectCode, concat(d.dname, '-', e.code, right(a.gp_id, 4)) AS gpp_id, right(a.gp_id, 3) as codeGroup
        FROM atif_role_matrix.role_subject_teacher AS a
        LEFT JOIN atif._section AS b on b.id =a.section_id
        LEFT JOIN atif_subject.programmesetup AS c on a.program_id = c.id
        LEFT JOIN atif._grade AS d on c.gradeID = d.id
        LEFT JOIN atif_subject.subject AS e ON c.subjects = e.id
        WHERE ".$where;

        $Group_Menu = DB::connection('mysql')->select($query);
        $groupCode['A'] = 1;
        $groupCode['B'] = 2;
        $groupCode['C'] = 3;
        $groupCode['D'] = 4;
        $groupCode['E'] = 5;
        $groupCode['F'] = 6;
        
        $Html = '';
        if( empty($Group_Menu) ){
            $Html = '';
            $Html .= '<li class="nav-item">';
            $Html .= '<a href="javascript:;" class="nav-link nav-toggle font-grey-mint">';
            $Html .= '<i class="icon-user-following font-blue font-grey-mint"></i>';
            $Html .= '<span class="title">My Class Groups</span>';
            $Html .= '<span class="arrow"></span>';
            $Html .= '</a>';       
        } else {
            $Html = '';
            $Html .= '<li class="nav-item">';
            $Html .= '<a href="javascript:;" class="nav-link nav-toggle">';
            $Html .= '<i class="icon-user-following font-blue"></i>';
            $Html .= '<span class="title">My Class Groups</span>';
            $Html .= '<span class="arrow"></span>';
            $Html .= '</a>';
            $Html .= '<ul class="sub-menu">';

            foreach( $Group_Menu as $g ):
            $tSID         = $g->tSID;
            $pID         = $g->pID;
            $secName     = $g->secName;
            $sectionID     = $g->sectionID;
            $gradeID     = $g->gradeID;
            $Grade         = $g->Grade;
            $subjectID     = $g->subjectID;
            $Subject     = $g->Subject;
            $subjectCode= $g->subjectCode;
            $OPT = $g->OPT;
            $GPID = $g->GPID;
            $gpp_id = $g->gpp_id;
            $BlockID = (int) substr($gpp_id, -1);
            $redirectURL = '';
            $roleCode = $Grade."-".$subjectCode."-"."O-".$secName;

            if($g->OPT == 0){
                $GroupID = $g->sectionID;
                $redirectURL = 'student_layout?grade_id='.$gradeID.'&section_id='.$GroupID;
            }else{
                $GroupID = $groupCode[substr($g->codeGroup, 0, 1)];
                $redirectURL = 'student_layout_classgroup?GradeID='.$gradeID.'&SubjectID='.$subjectID.'&GroupID='.$GroupID.'&BlockID='.$BlockID.'&classTitle='.$GPID;
            }
            

                
            $encode_url = 'user_id='.$StaffID.'&matrixRoleSbjTchrID='.$tSID.'&programmeID='.$pID.'&secName='.$secName.'&sectionID='.$sectionID.'&gradeID='.$gradeID.'&Grade='.$Grade.'&subjectID='.$subjectID.'&Subject='.$Subject.'&subjectCode='.$subjectCode.'&optional='.$OPT.'&GPID='.'&gpp_id='.$gpp_id.'&codeANA=XZ3WTJc8nvFgYqxK&codeUID='.$User_ID;
            $Html .= '<li class="nav-item ">';
            // URL for redirecting
            //$Html .= '<a href="'.'http://10.10.10.63/gs/index.php/process/define_process?'.$encode_url.'" class="nav-link">';
            // URL for students list
            $Html .= '<a href="'.'#'.$redirectURL.'" class="nav-link">';
            //$Html .= '<span class="title">'.$g->subjectCode.' ['.$g->Grade.'-'.$g->secName.']</span>';
            $Html .= '<span class="title">'.$GPID.'</span>';
            $Html .= '</a>';
            $Html .= '</li>';
            endforeach;


            $Html .= '</ul>';
        }
        $Html .= '</li>';
            
        return $Html;
    }

















    /*
     * Server Login Menu
    */
    
    function Get_Server_Login_Link($User_ID, $Academic_ID){
        
        $SQL = "select s.id as StaffID from atif.staff_registered as s where s.user_id=".$User_ID."";
        $St = DB::connection('mysql')->select($SQL);
        if(isset($St[0]->StaffID)){
            $StaffID = $St[0]->StaffID;
        }else{
            return;
        }
        
        $where = "a.academic_session_id=".$Academic_ID." AND a.staff_id = ".$StaffID;
        $query ="SELECT 
        a.id AS tSID, a.program_id AS pID, a.gp_id AS GPID, b.dname AS secName,b.id AS sectionID,c.optional AS OPT,d.id AS gradeID, d.dname AS Grade, e.id AS subjectID, e.dname AS Subject,e.code AS subjectCode, concat(d.dname, '-', e.code, right(a.gp_id, 4)) AS gpp_id, right(a.gp_id, 3) as codeGroup
        FROM atif_role_matrix.role_subject_teacher AS a
        LEFT JOIN atif._section AS b on b.id =a.section_id
        LEFT JOIN atif_subject.programmesetup AS c on a.program_id = c.id
        LEFT JOIN atif._grade AS d on c.gradeID = d.id
        LEFT JOIN atif_subject.subject AS e ON c.subjects = e.id
        WHERE ".$where;

        $Group_Menu = DB::connection('mysql')->select($query);
        $groupCode['A'] = 1;
        $groupCode['B'] = 2;
        $groupCode['C'] = 3;
        $groupCode['D'] = 4;
        $groupCode['E'] = 5;
        $groupCode['F'] = 6;
        
        $Html = '';
        $encode_url = 'codeANA=XZ3WTJc8nvFgYqxK&codeUID='.$User_ID;
        
        $Html = 'http://10.10.10.63/gs/index.php/process/define_process?'.$encode_url;

        return $Html;
    }






















    public function getCBLTeam($userID){
      $staffInfo = new StaffInformationModel();
      $selectionList = new SelectionList();



      /************************************************** Staff Team **************************************************/
      $staffData = $staffInfo->get_Staff_Info($userID);
      $staffData = $staffInfo->get_StaffInfo($staffData['info'][0]->gt_id);
      
      //$staffData = $staffInfo->get_StaffInfo($staffData[0]['gt_id']);
      $StaffReportee = array();
      $StaffReportee_SC = array();
      $StaffReportee2 = array();
      $StaffReportee2_SC = array();
      $StaffReportee_TRP = array();


      $staff = array();
      if(!empty($staffData[0]['role_id'])){
        $StaffReportee = $staffInfo->get_StaffReporteeInfo_UTeam($staffData[0]['role_id']);
        $StaffReportee_SC = $staffInfo->get_StaffReporteeSCInfo_UTeam($staffData[0]['role_id']);
        foreach ($StaffReportee as $data) {
          array_push($staff, $data);
        }
        foreach ($StaffReportee_SC as $data) {
          array_push($staff, $data);
        }


        $i = 0;
        foreach ($StaffReportee as $rr) {
          if($StaffReportee[$i]['report_ok'] == 'TRP'){
            $StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo_UTeam($StaffReportee[$i]['Role_id_So'], 'INDIR', $StaffReportee[$i]['name_code']);
            foreach ($StaffReportee_TRP as $trp) {
              //array_push($StaffReportee, $trp);
              array_push($staff, $trp);
            }
          }
          $i++;
        }
      }


      $StaffReportee2 = array();
      if(!empty($staffData[0]['role_id'])){
        $StaffReportee2 = $staffInfo->get_StaffReporteeInfo_UTeam($staffData[0]['role_id']);
        $StaffReportee2_SC = $staffInfo->get_StaffReporteeSCInfo_UTeam($staffData[0]['role_id']);
        foreach ($StaffReportee2 as $data) {
          array_push($staff, $data);
        }
        foreach ($StaffReportee2_SC as $data) {
          array_push($staff, $data);
        }



        
        $i = 0;
		
		if( !empty($StaffReportee2 ))
		{
			foreach ($StaffReportee2 as $rr) {
			  if($StaffReportee2[$i]['report_ok'] == 'TRP'){
				$StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo_UTeam($StaffReportee2[$i]['Role_id_So'], 'INDIR', $StaffReportee2[$i]['name_code']);
				foreach ($StaffReportee_TRP as $trp) {
				  //array_push($StaffReportee2, $trp);
				  array_push($staff, $trp);
				}
			  }
			  $i++;
			}
		}
      }
      /************************************************** Staff Team **************************************************/






      /***** Getting Staff Filterable List *****/
      $departmentWhere = "c_bottomline != '' and c_bottomline != '..' and c_bottomline not like '%HiAce,%'
      and c_bottomline not like '%HiRoof,%'";
      $staffFilter['department'] = $selectionList->get_FieldList('atif.staff_registered', 'c_bottomline', $departmentWhere);
      $staffFilter['tt_profile'] = $selectionList->get_FieldList('atif_gs_events.tt_profile', 'name');




      $html = '';
      $functionData = array();
      foreach ($staff as $staffData) {
        if(!in_array($staffData['c_bottomline'], $functionData)){
            $url = '#staff_layout_team?team=' . urlencode($staffData['c_bottomline']);
            $html .= '<li class="nav-item ">
                        <a href="'.$url.'" class="nav-link "> '.$staffData['c_bottomline'].' </a>
                    </li>';
            array_push($functionData, $staffData['c_bottomline']);
        }
      }

      return $html;
    }







    public function user_dashboard(){
        $password = 0;
        if(Sentinel::getUser()->password == '$2y$10$WSCVGnJAbQkuyRdsjShzxOipRny6reOiE818aYU83WyF7FVvOYb6m'){$password = 1;}
        return view('dashboard/user_dashboard')->with(array('Password' => $password));
    }
}
