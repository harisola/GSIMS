<?php
/******************************************************************
* Author : Atif Naseem
* Email : atif.naseem22@gmail.com
* Cell : +92-313-5521122
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Information\StaffInformationModel;

class Haris extends Controller
{
    public function development(){
        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $selectionList = new SelectionList();



        /***** Getting Staff Information of Login User *****/
        $user = $staffInfo->get_Staff_Info(34);


        /***** Getting Staff List *****/
        $staff = $staffInfo->get_Staff_List();



        /***** Getting Staff Filterable List *****/
        $departmentWhere = "c_bottomline != '' and c_bottomline != '..' and c_bottomline not like '%HiAce,%'
        and c_bottomline not like '%HiRoof,%'";
        $staffFilter['department'] = $selectionList->get_FieldList('atif.staff_registered', 'c_bottomline', $departmentWhere);
        $staffFilter['tt_profile'] = $selectionList->get_FieldList('atif_gs_events.tt_profile', 'name');

                /********* SMS Category *************/

        $staffCategory = $staffInfo->getCategory('atif_gs_events.comment_category');


        /**** org - page ****/
        return view('master_layout.staff.staff_view')->with(array('staff' => $staff, 'user' => $user, 'filter' => $staffFilter, 'staffCategory' => $staffCategory));
    }












    public function development_UserTeam(Request $request){
      $userID = Sentinel::getUser()->id;
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
            $StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo_UTeam($StaffReportee[$i]['role_id'], 'INDIR', $StaffReportee[$i]['name_code']);
            foreach ($StaffReportee_TRP as $trp) {
              //array_push($StaffReportee, $trp);
              array_push($staff, $trp);
            }
          }
          $i++;
        }
      }


      $StaffReportee2 = array();
      if(!empty($staffData[1]['role_id'])){
        $StaffReportee2 = $staffInfo->get_StaffReporteeInfo_UTeam($staffData[1]['role_id']);
        $StaffReportee2_SC = $staffInfo->get_StaffReporteeSCInfo_UTeam($staffData[1]['role_id']);
        foreach ($StaffReportee2 as $data) {
          array_push($staff, $data);
        }
        foreach ($StaffReportee2_SC as $data) {
          array_push($staff, $data);
        }



        
        $i = 0;
        foreach ($StaffReportee2 as $rr) {
          if($StaffReportee2[$i]['report_ok'] == 'TRP'){
            $StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo_UTeam($StaffReportee2[$i]['role_id'], 'INDIR', $StaffReportee2[$i]['name_code']);
            foreach ($StaffReportee_TRP as $trp) {
              //array_push($StaffReportee2, $trp);
              array_push($staff, $trp);
            }
          }
          $i++;
        }
      }
      /************************************************** Staff Team **************************************************/






      /***** Getting Staff Filterable List *****/
      $departmentWhere = "c_bottomline != '' and c_bottomline != '..' and c_bottomline not like '%HiAce,%'
      and c_bottomline not like '%HiRoof,%'";
      $staffFilter['department'] = $selectionList->get_FieldList('atif.staff_registered', 'c_bottomline', $departmentWhere);
      $staffFilter['tt_profile'] = $selectionList->get_FieldList('atif_gs_events.tt_profile', 'name');



      /**** if - List requires filtration ****/
      if($request->input('campus')){
        $campus = $request->input('campus');
        $index = 0;
        foreach ($staff as $staffData) {
          if(strtolower($staffData['campus']) != $campus) {
            unset($staff[$index]);
          }
          $index++;
        }
      }else if($request->input('team')){
        $team = $request->input('team');
        $index = 0;
        foreach ($staff as $staffData) {
          if($staffData['c_bottomline'] != $team) {
            unset($staff[$index]);
          }
          $index++;
        }
      }


      /**** org - page ****/
      return view('master_layout.staff.staff_view_userteam')->with(array('staff' => $staff, 'filter' => $staffFilter));
    }








    /**********************************************************************
    * Staff Information 
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   Key words
    * @output:  JSON encoded Staff Information Fields
    ***********************************************************************/
    public function getStaffInfo(Request $request){
        
        $staffID = $request->input('staff_id');
        $staffInfo = new StaffInformationModel();

        $staff['info'] = $staffInfo->getStaffInformation($staffID);
        $staff['roles'] = $staffInfo->get_StaffInfo($staff['info'][0]->gt_id);
        $staff['profile_description'] = $staffInfo->getStaff_TTProfile($staff['info'][0]->gt_id);

        if(empty($staff['profile_description'])){
          $staff['profile_description'] = '';
        }

        $staff['reporting1'] = '';
        $staff['reporting2'] = '';
        if(!empty($staff['roles'][0]['pm_report_to'])){
          $staff['reporting1'] = $staffInfo->get_StaffReportingInfo($staff['roles'][0]['pm_report_to']);
          if(!empty($staff['roles'][1]['pm_report_to'])){
            $staff['reporting2'] = $staffInfo->get_StaffReportingInfo($staff['roles'][1]['pm_report_to']);
          }
        }
        $staff['absentia'] = $staffInfo->getStaffAbsentia($staffID);

        $staff['manual'] = $staffInfo->getStaffManual($staffID);



        $staff['comments'] = $staffInfo->getStaffComments($staffID);

        echo json_encode($staff);
    }



     /**********************************************************************
    * Add Absentia 
    * Author:   Asim Bilal
    * @input:   Staff ID, date, start_time, end_time, title, description
    * @output: 
    * Date:     Jul 26, 2017 (Wed)
    ***********************************************************************/
    public function addAbsentia(Request $request){

        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $staff_id = $request->input('staff_id');
        $date = $request->input('date');
        $tap_out = $request->input('start_time');
        $tap_in = $request->input('end_time');

        $data_in = array(
          'staff_id' => $staff_id,
          'date' => $date,
          'time' => $tap_in,
          'ip4' => getHostByName(getHostName()),
          'location_id' => 17,
          'created' => time(),
          'register_by' => $userID,
          'modified' => time(),
          'modified_by' => $userID,
          'record_deleted' => 0
        );


          $data_out = array(
            'staff_id' => $staff_id,
            'date' => $date,
            'time' => $tap_out,
            'ip4' => getHostByName(getHostName()),
            'location_id' => 17,
            'created' => time(),
            'register_by' => $userID,
            'modified' => time(),
            'modified_by' => $userID,
            'record_deleted' => 0
          );

          $staff_absentia_in =  $staffInfo->insertComments('atif_attendance_staff.staff_attendance_in',$data_in);
          $staff_absentia_out =  $staffInfo->insertComments('atif_attendance_staff.staff_attendance_out',$data_out);





          $title = $request->input('title');
          $description = $request->input('description');

          $title_description = array(
            'staff_id' => $staff_id,
            'date' => $date,
            'title' => $title,
            'location_id' => 17,
            'description' => $description,
            'created' => time(),
            'created' => time(),
            'register_by' => $userID,
            'modified' => time(),
            'modified_by' => $userID,
            'record_deleted' => 0
          );


        $insert_description =  $staffInfo->insertComments('atif_gs_events.absenta_manual_description',$title_description);

        
    }


    /**********************************************************************
    * Add Manual
    * Author:   Asim Bilal
    * @input:   Staff ID, date, start_time, end_time, title, description
    * @output: 
    * Date:     Jul 26, 2017 (Wed)
    ***********************************************************************/


      public function addManual(Request $request){

        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $staff_id = $request->input('staff_id');
        $date = $request->input('date');
        $tap_in = $request->input('start_time');
        $tap_out = $request->input('end_time');

        $data_in = array(
          'staff_id' => $staff_id,
          'date' => $date,
          'time' => $tap_in,
          'ip4' => getHostByName(getHostName()),
          'location_id' => 18,
          'created' => time(),
          'register_by' => $userID,
          'modified' => time(),
          'modified_by' => $userID,
          'record_deleted' => 0
        );


          $data_out = array(
            'staff_id' => $staff_id,
            'date' => $date,
            'time' => $tap_out,
            'ip4' => getHostByName(getHostName()),
            'location_id' => 18,
            'created' => time(),
            'register_by' => $userID,
            'modified' => time(),
            'modified_by' => $userID,
            'record_deleted' => 0
          );

          $staff_absentia_in =  $staffInfo->insertComments('atif_attendance_staff.staff_attendance_in',$data_in);
          $staff_absentia_out =  $staffInfo->insertComments('atif_attendance_staff.staff_attendance_out',$data_out);


          $description = $request->input('description');

          $title_description = array(
            'staff_id' => $staff_id,
            'date' => $date,
            'description' => $description,
            'location_id' => 18,
            'created' => time(),
            'created' => time(),
            'register_by' => $userID,
            'modified' => time(),
            'modified_by' => $userID,
            'record_deleted' => 0
          );


        $insert_description =  $staffInfo->insertComments('atif_gs_events.absenta_manual_description',$title_description);

    }




     /**********************************************************************
    * Staff Information - TIF B
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  JSON encoded Staff TIF-B Fields
    * Date:     Jul 26, 2017 (Wed)
    ***********************************************************************/
    public function getStaff_tifB(Request $request){
        
        $staffID = $request->input('staff_id');
        $staffInfo = new StaffInformationModel();

        $staff['education'] = $staffInfo->getStaffQualification($staffID);
        $staff['employment'] = $staffInfo->getStaffEmployment($staffID);
        $staff['fs'] = $staffInfo->getStaffFS($staffID);
        $staff['sc'] = $staffInfo->getStaffChild($staffID);
        $staff['ac'] = $staffInfo->getStaffAlternateContact($staffID);
        $staff['other'] = $staffInfo->getStaffOtherInfo($staffID);
        
        echo json_encode($staff);
    }























    /**********************************************************************
    * Staff Information - TIF A
    * Author:   Atif Naseem, a.naseem@generations.edu.pk, +92-313-5521122 
    * @input:   Staff ID
    * @output:  HTML form, Staff TIF-B Fields
    * Date:     Jul 27, 2017 (Thu)
    ***********************************************************************/
    public function getStaff_tifA(Request $request){
    $html = '';
    if(count($request)){
      $GTID = $request->input('GTID');
      $staffInfo = new StaffInformationModel();



      $staff_2_SR = array();
      $MatrixRole_FR = array();


      /* Declaring Role 1 Variables */
      /******************************/
      $staff_PR[0]['gt_id'] = '';
      $staff_PR[0]['name_code'] = '';
      $staff_PR[0]['abridged_name'] = '';
      $staff_PR[0]['c_topline'] = '';
      $staff_PR[0]['c_bottomline'] = '';
      $staff_PR[0]['gp_id'] = '';
      $staff_PR[0]['report_ok'] = '';
      $staff_PR[0]['reporting_line'] = '';
      $staff_PR[0]['role_title_tl'] = '';

      $staff_PR_PR[0]['gt_id'] = '';
      $staff_PR_PR[0]['name_code'] = '';
      $staff_PR_PR[0]['abridged_name'] = '';
      $staff_PR_PR[0]['c_topline'] = '';
      $staff_PR_PR[0]['c_bottomline'] = '';
      $staff_PR_PR[0]['gp_id'] = '';
      $staff_PR_PR[0]['report_ok'] = '';
      $staff_PR_PR[0]['reporting_line'] = '';
      $staff_PR_PR[0]['role_title_tl'] = '';

      $staff_SR[0]['gt_id'] = '';
      $staff_SR[0]['name_code'] = '';
      $staff_SR[0]['abridged_name'] = '';
      $staff_SR[0]['c_topline'] = '';
      $staff_SR[0]['c_bottomline'] = '';
      $staff_SR[0]['gp_id'] = '';
      $staff_SR[0]['report_ok'] = '';
      $staff_SR[0]['reporting_line'] = '';
      $staff_SR[0]['role_title_tl'] = '';

      $staff_SR_PR[0]['gt_id'] = '';
      $staff_SR_PR[0]['name_code'] = '';
      $staff_SR_PR[0]['abridged_name'] = '';
      $staff_SR_PR[0]['c_topline'] = '';
      $staff_SR_PR[0]['c_bottomline'] = '';
      $staff_SR_PR[0]['gp_id'] = '';
      $staff_SR_PR[0]['report_ok'] = '';
      $staff_SR_PR[0]['reporting_line'] = '';
      $staff_SR_PR[0]['role_title_tl'] = '';

      /* Declaring Role 2 Variables */
      /******************************/
      $staff_2_PR[0]['gt_id'] = '';
      $staff_2_PR[0]['name_code'] = '';
      $staff_2_PR[0]['abridged_name'] = '';
      $staff_2_PR[0]['c_topline'] = '';
      $staff_2_PR[0]['c_bottomline'] = '';
      $staff_2_PR[0]['gp_id'] = '';
      $staff_2_PR[0]['report_ok'] = '';
      $staff_2_PR[0]['reporting_line'] = '';
      $staff_2_PR[0]['role_title_tl'] = '';

      $staff_2_PR_PR[0]['gt_id'] = '';
      $staff_2_PR_PR[0]['name_code'] = '';
      $staff_2_PR_PR[0]['abridged_name'] = '';
      $staff_2_PR_PR[0]['c_topline'] = '';
      $staff_2_PR_PR[0]['c_bottomline'] = '';
      $staff_2_PR_PR[0]['gp_id'] = '';
      $staff_2_PR_PR[0]['report_ok'] = '';
      $staff_2_PR_PR[0]['reporting_line'] = '';
      $staff_2_PR_PR[0]['role_title_tl'] = '';


      $staff_2_SR_PR[0]['gt_id'] = '';
      $staff_2_SR_PR[0]['name_code'] = '';
      $staff_2_SR_PR[0]['abridged_name'] = '';
      $staff_2_SR_PR[0]['c_topline'] = '';
      $staff_2_SR_PR[0]['c_bottomline'] = '';
      $staff_2_SR_PR[0]['gp_id'] = '';
      $staff_2_SR_PR[0]['report_ok'] = '';
      $staff_2_SR_PR[0]['reporting_line'] = '';
      $staff_2_SR_PR[0]['role_title_tl'] = '';















      /* Load Model */
      $staffData = $staffInfo->get_StaffInfo($GTID);
      $StaffReportee = array();
      $StaffReportee_SC = array();
      $StaffReportee2 = array();
      $StaffReportee2_SC = array();
      $staffTTProfile = array();




      $staffTTProfile = $staffInfo->getStaff_TTProfile($GTID);
      $Timing_Profile = '';
      $Timing_AvgWeekHrs = '';
      $Timing_StdIN = '';
      $Timing_StdOut = '';
      $Timing_FriOut = '';
      $Timing_SatHrs = '';
      $Timing_SatOffs = '';
      $Timing_SatWorking = '';
      $Timing_SatOff = '';
      $Timing_ExtOut = '';
      $Timing_ExtFrq = '';
      $Timing_JulCat = '';
      $Timing_FriOutF = '';
      $Timing_MonIn = '';
      $Timing_TueIn = '';
      $Timing_WedIn = '';
      $Timing_ThuIn = '';
      $Timing_FriIn = '';
      $Timing_SatIn = '';
      $Timing_SunIn = '';
      $Timing_MonOut = '';
      $Timing_TueOut = '';
      $Timing_WedOut = '';
      $Timing_ThuOut = '';
      $Timing_FriOut = '';
      $Timing_SatOut = '';
      $Timing_SunOut = '';
      if(!empty($staffTTProfile)){
        $Timing_Profile = $staffTTProfile[0]['time_profile'];
        $Timing_AvgWeekHrs = $staffTTProfile[0]['avg_week_hrs'];
        $Timing_StdIN = $staffTTProfile[0]['std_in'];
        $Timing_StdOut = $staffTTProfile[0]['std_out'];
        $Timing_FriOutF = $staffTTProfile[0]['fri_out'];
        $Timing_SatHrs = $staffTTProfile[0]['sat_hrs'];
        $Timing_SatOffs = $staffTTProfile[0]['sat_off'];
        $Timing_SatWorking = $staffTTProfile[0]['sat_working'];
        $Timing_SatOff = $staffTTProfile[0]['sat_off'];
        $Timing_ExtOut = $staffTTProfile[0]['ext_time'];
        $Timing_ExtFrq = $staffTTProfile[0]['ext_frequency'];
        $Timing_JulCat = $staffTTProfile[0]['ext_july'];

        if($staffTTProfile[0]['ty_name'] != 'Standard'){
          $Timing_MonIn = $staffTTProfile[0]['mon_in'];
          $Timing_TueIn = $staffTTProfile[0]['tue_in'];
          $Timing_WedIn = $staffTTProfile[0]['wed_in'];
          $Timing_ThuIn = $staffTTProfile[0]['thu_in'];
          $Timing_FriIn = $staffTTProfile[0]['fri_in'];
          $Timing_SatIn = $staffTTProfile[0]['sat_in'];
          $Timing_SunIn = $staffTTProfile[0]['sun_in'];
          $Timing_MonOut = $staffTTProfile[0]['mon_out'];
          $Timing_TueOut = $staffTTProfile[0]['tue_out'];
          $Timing_WedOut = $staffTTProfile[0]['wed_out'];
          $Timing_ThuOut = $staffTTProfile[0]['thu_out'];
          $Timing_FriOut = $staffTTProfile[0]['fri_out'];
          $Timing_SatOut = $staffTTProfile[0]['sat_out'];
          $Timing_SunOut = $staffTTProfile[0]['sun_out'];
        }
      }







      $StaffReportee_TRP = array();
      if(!empty($staffData[0]['role_id'])){
        $StaffReportee = $staffInfo->get_StaffReporteeInfo($staffData[0]['role_id']);
        $StaffReportee_SC = $staffInfo->get_StaffReporteeSCInfo($staffData[0]['role_id']);

        $i = 0;
        foreach ($StaffReportee as $rr) {
          if($StaffReportee[$i]['report_ok'] == 'TRP'){
            $StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo($StaffReportee[$i]['role_id'], 'INDIR', $StaffReportee[$i]['name_code']);
            foreach ($StaffReportee_TRP as $trp) {
              array_push($StaffReportee, $trp);
            }
          }
          $i++;
        }
      }


      $StaffReportee2 = array();
      if(!empty($staffData[1]['role_id'])){
        $StaffReportee2 = $staffInfo->get_StaffReporteeInfo($staffData[1]['role_id']);
        $StaffReportee2_SC = $staffInfo->get_StaffReporteeSCInfo($staffData[1]['role_id']);


        
        $i = 0;
        foreach ($StaffReportee2 as $rr) {
          if($StaffReportee2[$i]['report_ok'] == 'TRP'){
            $StaffReportee_TRP = $staffInfo->get_StaffReporteeInfo($StaffReportee2[$i]['role_id'], 'INDIR', $StaffReportee2[$i]['name_code']);
            foreach ($StaffReportee_TRP as $trp) {
              array_push($StaffReportee2, $trp);
            }
          }
          $i++;
        }
      }
      $i = 0;



      if(!empty($staffData[0]['pm_report_to'])){
        $staff_PR = $staffInfo->get_StaffReportingInfo_CLTRole($staffData[0]['pm_report_to'], $GTID);
      }else{
        $staff_PR = $staffInfo->get_StaffMatrixRole_CLT_Reportoo($GTID);
        if(empty($staff_PR)){
          $staff_PR = $staffInfo->get_StaffReportingInfo_SBJRole($GTID);
        }

        if(empty($staff_PR)){
          $staff_PR[0]['gt_id'] = '';
          $staff_PR[0]['name_code'] = '';
          $staff_PR[0]['abridged_name'] = '';
          $staff_PR[0]['c_topline'] = '';
          $staff_PR[0]['c_bottomline'] = '';
          $staff_PR[0]['gp_id'] = '';
          $staff_PR[0]['report_ok'] = '';
          $staff_PR[0]['reporting_line'] = '';
          $staff_PR[0]['role_title_tl'] = '';
        }
      }
      if(!empty($staffData[0]['sc_report_to'])){
        $staff_SR = $staffInfo->get_StaffReportingInfo($staffData[0]['sc_report_to']);
      }
      if(!empty($staff_PR[0]['pm_report_to'])){
        $staff_PR_PR = $staffInfo->get_StaffReportingInfo($staff_PR[0]['pm_report_to']);
      }
      if(!empty($staff_SR[0]['pm_report_to'])){
        $staff_SR_PR = $staffInfo->get_StaffReportingInfo($staff_SR[0]['pm_report_to']);
      }



      if(!empty($staffData[1]['pm_report_to'])){
        $staff_2_PR = $staffInfo->get_StaffReportingInfo($staffData[1]['pm_report_to']);
      }
      if(!empty($staffData[1]['sc_report_to'])){
        $staff_2_SR = $staffInfo->get_StaffReportingInfo($staffData[1]['sc_report_to']);
      }
      if(!empty($staff_2_PR[0]['pm_report_to'])){
        $staff_2_PR_PR = $staffInfo->get_StaffReportingInfo($staff_2_PR[0]['pm_report_to']);
      }
      if(!empty($staff_2_SR[0]['pm_report_to'])){
        $staff_2_SR_PR = $staffInfo->get_StaffReportingInfo($staff_2_SR[0]['pm_report_to']);
      }



      if(empty($staff_2_SR)){
        $staff_2_SR[0]['gt_id'] = '';
        $staff_2_SR[0]['name_code'] = '';
        $staff_2_SR[0]['abridged_name'] = '';
        $staff_2_SR[0]['c_topline'] = '';
        $staff_2_SR[0]['c_bottomline'] = '';
        $staff_2_SR[0]['gp_id'] = '';
        $staff_2_SR[0]['report_ok'] = '';
        $staff_2_SR[0]['reporting_line'] = '';
        $staff_2_SR[0]['role_title_tl'] = '';
      }



      $staffData_MatrixCLT = $staffInfo->get_StaffMatrixRole_CLT($GTID);
      $staffData_MatrixSBJ = $staffInfo->get_StaffMatrixRole_SBJ($GTID);



      $totalPF = 0;
      $totalP = 0;
      $totalSC = 0;
      $TotalStaffMembers = 0;
      $TotalStudentMemebers = 0;
      if(!empty($staffData)){
         $TotalStaffMembers = $staffData[0]['total_staff_members'];
      }
      foreach ($StaffReportee as $cal1) {
        if($cal1['reporting_type'] == 'FP'){
          $totalPF++;
        }
        $totalP++;
      }




      $totalPF2 = 0;
      $totalP2 = 0;
      $totalSC2 = 0;
      $TotalStaffMembers2 = 0;
      $TotalStudentMemebers2 = 0;
      if(!empty($staffData[1])){
         $TotalStaffMembers2 = $staffData[1]['total_staff_members'];
      }
      foreach ($StaffReportee2 as $cal2) {
        if($cal2['reporting_type'] == 'FP'){
          $totalPF2++;
        }
        $totalP2++;
      }

      

      $reporteesFundamental = $totalPF + $totalPF2;
      $reportteesSecondary = $totalSC + $totalSC2;
      $reporteesPrimary = $totalP + $totalP2;
      $reporteesTotal = $totalP+count($StaffReportee_SC)+$totalP2+count($StaffReportee2_SC);
      $membersTotal = $TotalStaffMembers + $TotalStaffMembers2;
      $classRole = '-';
      $roleTeachingTotal = 0;
      $roleTeachingBlocks = 0;
      $roleTeachingStudents = 0;
      $uniqueStudentsTotal = $staffInfo->getUniqueStudents($GTID);
      $studentBlocksTotal = 0;
      if(!empty($staffData_MatrixCLT)){
        $classRole = $staffData_MatrixCLT[0]['gp_id'];
        $roleTeachingStudents += $staffData_MatrixCLT[0]['students'];
      }
      if(!empty($staffData_MatrixSBJ)){
        foreach ($staffData_MatrixSBJ as $data) {
          $roleTeachingTotal++;
          $roleTeachingBlocks += $data['block'];
          $roleTeachingStudents += $data['students'];
        }
      }









      $html .= '<link href="'.URL("/css/staffLayout.css").'" rel="stylesheet" type="text/css" />';
      $html .= '
          <div class="RightInformation">
              <div class="RightInformation_contentSection" style="padding:0;">
                  <?php /* ?><?php */ ?>
                    <div class="summarySection col-md-12">
                      <div class="col-md-6">
                          <div class="col-md-6 paddingLeft0">
                              <div class="primaryReporting">
                                    <h4 class="PrimaryName"><span class="namePrimaryCode">'.$staff_PR[0]['name_code'].'</span><span class="abridgedPrimaryName">'.$staff_PR[0]['abridged_name'].'</span></h4>
                                    <h5 class="PrimaryTopLine">'.$staff_PR[0]['c_topline'].'</h5>
                                    <h5 class="PrimaryBottomLine">'.$staff_PR[0]['c_bottomline'].'</h5>
                                </div><!-- primaryReporting -->
                            </div><!-- col-md-6 -->
                            <div class="col-md-6 paddingRight0">
                              <div class="reportingPersonal">
                                    <h4 class="PrimaryName"><span class="namePrimaryCode">'.$staffData[0]['name_code'].'</span><span class="abridgedPersonalName">'.$staffData[0]['abridged_name'].'</span></h4>
                                    <h5 class="PrimaryTopLine">'.$staffData[0]['c_topline'].'</h5>
                                    <h5 class="PrimaryBottomLine">'.$staffData[0]['c_bottomline'].'</h5>
                                </div><!-- primaryReporting -->
                            </div><!-- col-md-6 -->
                        </div><!-- col-md-6 -->
                        <div class="col-md-6">
                          <div class="col-md-6 paddingLeft0 paddingRight0">
                              <h6 class="normalFont pull-right"><span class="leftLab3">Fundamental Reportees:</span> <strong> '.$reporteesFundamental.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Primary Reportees:</span> <strong> '.$reporteesPrimary.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Reportees:</span> <strong> '.$reporteesTotal.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Members:</span> <strong> '.$membersTotal.' </strong></h6>
                            </div><!-- -->
                            <div class="col-md-6 paddingLeft0 paddingRight0">
                                <h6 class="normalFont pull-right"><span class="leftLab3"> Total Teaching Roles:</span> <strong>'.$roleTeachingTotal.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Class Role:</span> <strong> '.$classRole.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Teaching Blocks:</span> <strong>'.$roleTeachingBlocks.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Teaching Students:</span> <strong> '.$roleTeachingStudents.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Unique Students:</span> <strong> '.$uniqueStudentsTotal.' </strong></h6>
                                <h6 class="normalFont pull-right"><span class="leftLab3">Total Student Blocks:</span> <strong> '.$studentBlocksTotal.' </strong></h6>
                            </div><!-- -->
                        </div><!-- col-md-6 -->
                    </div><!-- summarySection -->
                  <hr style="margin-top: 5px;" />
                    <div class="TimingSection col-md-12">
                      <div class="col-md-3 paddingLeft0 text-center ">
                          <h5>Timing Profile & Hours</h5>
                            <table width="100%" border="0" class="TimingSectionTable">
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="2">Timing Profile</td>
                              </tr>
                              <tr>
                                <td colspan="2"><h4 style="margin:0;font-size:16px;font-weight:bold;"> '.$Timing_Profile.' </h4></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="2">Average Weekly Hours</td>
                              </tr>
                              <tr>
                                <td colspan="2"><h4 style="margin:0;font-size:16px;font-weight:bold;"> '.$Timing_AvgWeekHrs.' </h4></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                            </table>
                        </div><!-- col-md-3 -->
                        <div class="col-md-3 paddingLeft0 text-center">
                          <h5>Full Time Parameters</h5>
                            <table width="100%" border="0" class="TimingSectionTable">
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-left">Standard IN</td>
                                <td class="text-right"><strong> '.$Timing_StdIN.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">Standard OUT</td>
                                <td class="text-right"><strong> '.$Timing_StdOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-left">Friday OUT</td>
                                <td class="text-right"><strong> '.$Timing_FriOutF.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">Saturday Hrs</td>
                                <td class="text-right"><strong> '.$Timing_SatHrs.' </strong></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                            </table>
                        </div><!-- col-md-3 -->
                        <div class="col-md-3 paddingLeft0 text-center">
                          <h5>Secondary Parameters</h5>
                            <table width="100%" border="0" class="TimingSectionTable">
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-left">Sats Working</td>
                                <td class="text-right"><strong> '.$Timing_SatWorking.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">Sats Off</td>
                                <td class="text-right"><strong> '.$Timing_SatOffs.' </strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="text-left">Ext. Out</td>
                                <td class="text-right"><strong> '.$Timing_ExtOut.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">Ext. FREQ</td>
                                <td class="text-right"><strong> '.$Timing_ExtFrq.' </strong></td>
                              </tr>
                              <tr>
                                <td class="text-left">July Category</td>
                                <td class="text-right"><strong> '.$Timing_JulCat.' </strong></td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                            </table>
                        </div><!-- col-md-3 -->
                        <div class="col-md-3 paddingLeft0 text-center">
                          <h5>Custom Timings</h5>
                            <table width="100%" border="0" class="TimingSectionTable">
                              <tr>
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Mon</td>
                                <td><strong> '.$Timing_MonIn.' </strong></td>
                                <td><strong> '.$Timing_MonOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Tue</td>
                                <td><strong> '.$Timing_TueIn.' </strong></td>
                                <td><strong> '.$Timing_TueOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Wed</td>
                                <td><strong> '.$Timing_WedIn.' </strong></td>
                                <td><strong> '.$Timing_WedOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Thu</td>
                                <td><strong> '.$Timing_ThuIn.' </strong></td>
                                <td><strong> '.$Timing_ThuOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Fri</td>
                                <td><strong> '.$Timing_FriIn.' </strong></td>
                                <td><strong> '.$Timing_FriOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>Sat</td>
                                <td><strong> '.$Timing_SatIn.' </strong></td>
                                <td><strong> '.$Timing_SatOut.' </strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                            </table>

                        </div><!-- col-md-3 -->
                    </div><!-- TimingSection -->
                    <hr style="margin-top: 5px;" />';






          $ij = 0;
          $html .= '<div class="MatrixRolesSection">
                      <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Matrix Role(s) <small>for Classes and Groups</small></h4>
                        <div class="col-md-12 paddingBottom40">
                          <div class="col-md-6 col-md-offset-3 paddingLeft0 paddingRight0">';


                      if(!empty($staffData_MatrixCLT)){
                      $ij = 1;
                      $html .= '<table width="100%" border="0" class="FunDaMentalReporting">
                                  <tr>';
                                  if(!empty($staff_PR[0]['junkRole']) && $staffData_MatrixCLT[0]['name_code'] == $staff_PR[0]['name_code']){
                                    $html .= '<td class="text-center FunRep">FR</td>';
                                  }
                          $html .= '<td class="text-center ClassTeach">'.$staffData_MatrixCLT[0]['clt_type'].'</td>
                                    <td class="text-center ClassHere">'.$staffData_MatrixCLT[0]['class'].'</td>
                                    <td class="text-center ClassSectionHere">'.$staffData_MatrixCLT[0]['gp_id'].'</td>
                                    <td class="text-center StuStrength">'.$staffData_MatrixCLT[0]['students'].'</td>
                                    <td class="text-center TopBottomLine">'.$staffData_MatrixCLT[0]['role_title_tl'].'<br />'.$staffData_MatrixCLT[0]['abridged_name'].'</td>
                                    <td class="text-center ReportingCodeName">'.$staffData_MatrixCLT[0]['name_code'].'</td>
                                  </tr>
                                </table>';

                                if($staffData_MatrixCLT[0]['lt_staff_id'] != ''){
                                  array_push($MatrixRole_FR, array('staff_id' => $staffData_MatrixCLT[0]['lt_staff_id'], 'abridged_name' => $staffData_MatrixCLT[0]['abridged_name']));
                                }
                      }
                $html .= '</div><!-- col-md-6 -->
                        </div><!-- col-md-12 -->';




              $foundFR = false;
              for($i=0; $i<=11; $i++){
              $html .= '<div class="col-md-12 paddingBottom20">
                          <div class="col-md-6">';

                            if($i==0){
                      if(!empty($staffData_MatrixSBJ[$i])){
                      $html .= '<table width="100%" border="0" class="FunDaMentalReportingChap" style="//border:1px solid #000;">
                                  <tr>
                                    <td width="10%" class="text-center SRNO">'.($i+1+$ij).'</td>
                                    <td width="20%" class="text-center SubjectName">'.$staffData_MatrixSBJ[$i]['gp_id'].'</td>
                                    <td width="5%" class="text-center StuStrength">'.$staffData_MatrixSBJ[$i]['students'].'</td>
                                    <td width="5%" class="text-center Blocks">'.$staffData_MatrixSBJ[$i]['block'].'</td>
                                    <td width="30%" class="text-center TopBottomLine">'.$staffData_MatrixSBJ[$i]['role_title_tl'].'<br />'.$staffData_MatrixSBJ[$i]['abridged_name'].'</td>
                                    <td width="10%" class="text-center NameCodeHere">'.$staffData_MatrixSBJ[$i]['name_code'].'</td>
                                    <td width="10%" class="text-center RankHere">'.$staffData_MatrixSBJ[$i]['reporting_line'].'</td>';
                                if(!empty($staff_PR[0]['junkRole']) && $staffData_MatrixSBJ[$i]['name_code'] == $staff_PR[0]['name_code'] && !$foundFR){
                                  $html .= '<td width="10%" class="text-center FunRep">FR</td>
                                            </tr>
                                          </table>';
                                  $foundFR = true;
                                }else{
                                  $html .= '<td width="10%" class="text-center FunRep White"></td>
                                            </tr>
                                          </table>';
                                }


                                if($staffData_MatrixSBJ[$i]['yt_staff_id'] != ''){
                                  array_push($MatrixRole_FR, array('staff_id' => $staffData_MatrixSBJ[$i]['yt_staff_id'], 'abridged_name' => $staffData_MatrixSBJ[$i]['abridged_name']));
                                }

                              }}else{if(!empty($staffData_MatrixSBJ[$i])){
                      $html .= '<table width="100%" border="0" class="FunDaMentalReportingChap">
                                  <tr>
                                    <td width="10%" class="text-center SRNO">'.($i+1+$ij).'</td>
                                    <td width="20%" class="text-center SubjectName">'.$staffData_MatrixSBJ[$i]['gp_id'].'</td>
                                    <td width="5%" class="text-center StuStrength">'.$staffData_MatrixSBJ[$i]['students'].'</td>
                                    <td width="5%" class="text-center Blocks">'.$staffData_MatrixSBJ[$i]['block'].'</td>
                                    <td width="30%" class="text-center TopBottomLine">'.$staffData_MatrixSBJ[$i]['role_title_tl'].'<br />'.$staffData_MatrixSBJ[$i]['abridged_name'].'</td>
                                    <td width="10%" class="text-center NameCodeHere">'.$staffData_MatrixSBJ[$i]['name_code'].'</td>
                                    <td width="10%" class="text-center RankHere">'.$staffData_MatrixSBJ[$i]['reporting_line'].'</td>';

                                if(!empty($staff_PR[0]['junkRole']) && $staffData_MatrixSBJ[$i]['name_code'] == $staff_PR[0]['name_code'] && !$foundFR){
                                  $html .= '<td width="10%" class="text-center FunRep">FR</td>
                                            </tr>
                                          </table>';
                                  $foundFR = true;
                                }else{
                                  $html .= '<td width="10%" class="text-center FunRep White"></td>
                                            </tr>
                                          </table>';
                                }
                                if($staffData_MatrixSBJ[$i]['yt_staff_id'] != ''){
                                  array_push($MatrixRole_FR, array('staff_id' => $staffData_MatrixSBJ[$i]['yt_staff_id'], 'abridged_name' => $staffData_MatrixSBJ[$i]['abridged_name']));
                                }
                              }}

                    $html .= '</div><!-- col-md-6 -->
                            <div class="col-md-6">';
                            if(!empty($staffData_MatrixSBJ[($i+12)])){
                      $html .= '<table width="100%" border="0" class="FunDaMentalReportingChap">
                                  <tr>
                                    <td class="text-center SRNO">'.($i+13+$ij).'</td>
                                    <td class="text-center SubjectName">'.$staffData_MatrixSBJ[($i+12)]['gp_id'].'</td>
                                    <td class="text-center StuStrength">'.$staffData_MatrixSBJ[($i+12)]['students'].'</td>
                                    <td class="text-center Blocks">'.$staffData_MatrixSBJ[($i+12)]['block'].'</td>
                                    <td class="text-center TopBottomLine">'.$staffData_MatrixSBJ[($i+12)]['role_title_tl'].'<br />'.$staffData_MatrixSBJ[($i+12)]['abridged_name'].'</td>
                                    <td class="text-center NameCodeHere">'.$staffData_MatrixSBJ[($i+12)]['name_code'].'</td>
                                    <td class="text-center RankHere">'.$staffData_MatrixSBJ[($i+12)]['reporting_line'].'</td>';

                                if(!empty($staff_PR[0]['junkRole']) && $staffData_MatrixSBJ[$i+12]['name_code'] == $staff_PR[0]['name_code'] && !$foundFR){
                                  $html .= '<td width="10%" class="text-center FunRep">FR</td>
                                            </tr>
                                          </table>';
                                        $foundFR = true;
                                }else{
                                  $html .= '<td width="10%" class="text-center FunRep White"></td>
                                            </tr>
                                          </table>';
                                }
                                if($staffData_MatrixSBJ[$i]['yt_staff_id'] != ''){
                                  array_push($MatrixRole_FR, array('staff_id' => $staffData_MatrixSBJ[$i]['yt_staff_id'], 'abridged_name' => $staffData_MatrixSBJ[$i]['abridged_name']));
                                }
                              }
                  $html .= '</div><!-- col-md-6 -->
                            
                        </div><!-- col-md-12 -->';
              }

    
        if(count($MatrixRole_FR)>=2){ 
            $html .= '<select id="soflow">
                       <option selected disabled>Select Fundamental Reporting</option>';

                //$MatrixRole_FR = array_unique($MatrixRole_FR);
                //$input = array_map("unserialize", array_unique(array_map("serialize", $input)));
                //$MatrixRole_FR = array_map("unserialize", array_unique(array_map("serialize", $MatrixRole_FR)));
                $MatrixRole_FR = array_unique($MatrixRole_FR, SORT_REGULAR);
                foreach ($MatrixRole_FR as $data) {
                  $html .= '<option value="'.$data['staff_id'].'">'.$data['abridged_name'].'</option>';
                }
            $html .= '</select>';
        }




          if(!empty($staff_PR[0]['junkRole'])){
            $staff_PR[0]['gt_id'] = '';
            $staff_PR[0]['name_code'] = '';
            $staff_PR[0]['abridged_name'] = '';
            $staff_PR[0]['c_topline'] = '';
            $staff_PR[0]['c_bottomline'] = '';
            $staff_PR[0]['gp_id'] = '';
            $staff_PR[0]['report_ok'] = '';
            $staff_PR[0]['reporting_line'] = '';
            $staff_PR[0]['role_title_tl'] = '';
          }

          $html .= '</div><!-- MatrixRolesSection -->
                    <hr style="margin-top: 5px;" />
                    <div class="orgChartSection">
                      <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Org Chart Roles(s) <small>for Non-Classroom Roles</small> | Role 1</h4>
                        <?php /* ?><?php */ ?>
                      <div class="no-padding col-md-10 col-md-offset-1">
                            <div class="blackSolidBorder">&nbsp;</div>
                            <div class="graySolidBorder">&nbsp;</div>
                            <div class="grayDashedBorder">&nbsp;</div>
                          <div class="col-md-12 ">
                              <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="secondLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>PRIMARY GRANDREPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_PR_PR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_PR_PR[0]['report_ok'].'</td>
                                        <td width="30%">1</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_PR_PR[0]['c_topline'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_PR_PR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_PR_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_PR_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                  
                                </div><!-- col-md-6 -->
                                <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="secondLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>SECONDARY GRANDREPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_SR_PR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_SR_PR[0]['report_ok'].'</td>
                                        <td width="30%">4</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_SR_PR[0]['c_topline'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_SR_PR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_SR_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_SR_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="firstLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>PRIMARY REPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40" bgcolor="#e5d998">'.$staff_PR[0]['gp_id'].'</td>
                                        <td width="30%" bgcolor="#ffff00">'.$staff_PR[0]['report_ok'].'</td>
                                        <td width="30%" bgcolor="#ffff00">2</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#e5d998">'.$staff_PR[0]['c_topline'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40" bgcolor="#f4ecfd">'.$staff_PR[0]['gt_id'].'</td>
                                        <td colspan="2" bgcolor="#f4ecfd">'.$staff_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#f4ecfd">'.$staff_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                                <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="firstLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>SECONDARY REPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_SR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_SR[0]['report_ok'].'</td>
                                        <td width="30%">5</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_SR[0]['c_topline'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_SR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_SR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_SR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 col-md-offset-3 text-center" style="background:#e2e2e2;padding:15px;">
                                  <table width="100%" border="1" bgcolor="#fff" class="firstLevelReporting" style="background:#fff;" >
                                      <tr>
                                        <td bgcolor="#ade4f2"><h5 style="color:#;">FR</h5></td>
                                        <td colspan="2" bgcolor="#ade4f2"><h5>ROLE A</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40" bgcolor="#e5d998">'.$staffData[0]['gp_id'].'</td>
                                        <td width="30%" bgcolor="#ffff00">'.$staffData[0]['report_ok'].'</td>
                                        <td width="30%" bgcolor="#ffff00">3</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#e5d998">'.$staffData[0]['role_title_tl'].', '.$staffData[0]['role_title_bl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40" bgcolor="#ade4f2">'.$staffData[0]['roleCode'].'</td>
                                        <td colspan="2" bgcolor="#f4ecfd">'.$staffData[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 col-md-offset-3 text-center" style="background:none;padding:15px;">
                                  <table width="100%" border="1">
                                      <tr>
                                        <td colspan="2" width="33%" height="90">Fundamental<br />Primary<br /><h5><strong>'.$totalPF.'</strong></h5></td>
                                        <td colspan="2" width="33%" height="90">Total<br />Primary<br /><h5><strong>'.$totalP.'</strong></h5></td>
                                        <td colspan="2" width="33%" height="90">Total<br />Reportee<br /><h5><strong>'.($totalP+count($StaffReportee_SC)).'</strong></h5></td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" width="50%"  height="80">Total Staff<br />Members<br /><h5><strong>'.$TotalStaffMembers.'</strong></h5></td>
                                        <td colspan="3" width="50%"  height="80">Total Student<br />Members<br /><h5><strong>'.$TotalStudentMemebers.'</strong></h5></td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                        </div><!-- col-md-12 -->
                        <hr class="smallHR" />';

                 
                 $j = 1;
                 for($i=0; $i<=count($StaffReportee); $i++) {
                 $html .=  '
                          <div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                            <div class="col-md-6">';
                              if(!empty($StaffReportee[$i])) {
                              $html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;font-size:12px;">
                                <tr>
                                  <td width="10%" bgcolor="#f5f5f5">'.($i+1).'</td>
                                  <td width="10%" bgcolor="#f5f5f5">'.$StaffReportee[$i]['reporting_type'].'</td>
                                  <td width="40%" bgcolor="#f4ecfd"><strong>'.$StaffReportee[$i]['abridged_name'].'</strong></td>
                                  <td width="20%" bgcolor="#ade4f2">'.$StaffReportee[$i]['roleCode'].'</td>
                                  <td width="20%" bgcolor="#ade4f2"> '.$StaffReportee[$i]['total_reportee'].' ('. $StaffReportee[$i]['total_staff_members'] .') </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#ffff00">'.$StaffReportee[$i]['report_ok'].'</td>';

                                  if($StaffReportee[$i]['reporting_type'] == 'INDIR'){
                                    $html .= '<td bgcolor="#ffff00">('.$StaffReportee[$i]['name_code'].')</td>';
                                  }else{
                                    $html .= '<td bgcolor="#ffff00"></td>';
                                  }

                                  $html .= '<td bgcolor="#e5d998">'.$StaffReportee[$i]['role_title_tl'].'</td>
                                  <td colspan="2" bgcolor="#e5d998">'.$StaffReportee[$i]['gp_id'].'</td>
                                </tr>
                              </table>';
                              }


                            $html .= '</div><!-- col-md-6 -->
                            <div class="col-md-6">';
                            if(!empty($StaffReportee_SC[$i])) {
                              $html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;font-size:12px;">
                                <tr>
                                  <td width="10%" bgcolor="#f5f5f5">'.($totalPF + $totalP + $j).'</td>
                                  <td width="10%" bgcolor="#f5f5f5">'.$StaffReportee_SC[$i]['reporting_type'].'</td>
                                  <td width="40%" bgcolor="#f4ecfd"><strong>'.$StaffReportee_SC[$i]['abridged_name'].'</strong></td>
                                  <td width="20%" bgcolor="#ade4f2">'.$StaffReportee_SC[$i]['roleCode'].'</td>
                                  <td width="20%" bgcolor="#ade4f2"> '.$StaffReportee_SC[$i]['total_reportee'].' ('. $StaffReportee_SC[$i]['total_staff_members'] .') </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#ffff00">'.$StaffReportee_SC[$i]['report_ok'].'</td>';

                                  if($StaffReportee_SC[$i]['reporting_type'] == 'INDIR'){
                                    $html .= '<td bgcolor="#ffff00">('.$StaffReportee_SC[$i]['name_code'].')</td>';
                                  }else{
                                    $html .= '<td bgcolor="#ffff00"></td>';
                                  }

                                  $html .= '<td bgcolor="#e5d998">'.$StaffReportee_SC[$i]['role_title_tl'].'</td>
                                  <td colspan="2" bgcolor="#e5d998">'.$StaffReportee_SC[$i]['gp_id'].'</td>
                                </tr>
                              </table>';
                              /*$html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                <tr>
                                  <td width="15%" bgcolor="#f5f5f5">'.($totalPF + $totalP + $j).'</td>
                                  <td width="15%" bgcolor="#f5f5f5">SC</td>
                                  <td width="15%" bgcolor="">INDIR</td>
                                  <td width="15%" bgcolor="">'.$StaffReportee_SC[$i]['roleCode'].'</td>
                                  <td width="40%" bgcolor="#f5f5f5">'.$StaffReportee_SC[$i]['role_title_tl'].'</td>
                                </tr>
                                <tr>
                                  <td bgcolor="#e1e1e1" colspan="2"> </td>
                                  <td bgcolor="#e1e1e1"> </td>
                                  <td bgcolor="#f5f5f5"><strong>'.$StaffReportee_SC[$i]['name_code'].'</strong></td>
                                  <td colspan="" bgcolor="#f5f5f5">'.$StaffReportee_SC[$i]['abridged_name'].'</td>
                                </tr>
                              </table>';*/

                              $j++;
                            }
                            $html .= '</div><!-- col-md-6 -->
                          </div><!-- col-md-12 -->';
                 }

                $html .= '
                    </div><!-- orgChartSection -->
                    <hr style="margin-top: 5px;" />';


          if(!empty($staffData[1])) {
          $html .= '<div class="orgChartSection">
                      <h4 class="col-md-6 col-md-offset-3 text-center MatrixRoles">Org Chart Roles(s) <small>for Non-Classroom Roles</small> | Role 2</h4>
                        <?php /* ?><?php */ ?>
                      <div class="no-padding col-md-10 col-md-offset-1">
                            <div class="blackSolidBorder">&nbsp;</div>
                            <div class="graySolidBorder">&nbsp;</div>
                            <div class="grayDashedBorder">&nbsp;</div>
                          <div class="col-md-12 ">
                              <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="secondLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>PRIMARY GRANDREPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_2_PR_PR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_2_PR_PR[0]['report_ok'].'</td>
                                        <td width="30%">1</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_PR_PR[0]['role_title_tl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_2_PR_PR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_2_PR_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_PR_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                  
                                </div><!-- col-md-6 -->
                                <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="secondLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>SECONDARY GRANDREPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_2_SR_PR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_2_SR_PR[0]['report_ok'].'</td>
                                        <td width="30%">4</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_SR_PR[0]['role_title_tl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_2_SR_PR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_2_SR_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_SR_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="firstLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>PRIMARY REPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40" bgcolor="#e5d998">'.$staff_2_PR[0]['gp_id'].'</td>
                                        <td width="30%" bgcolor="#ffff00">'.$staff_2_PR[0]['report_ok'].'</td>
                                        <td width="30%" bgcolor="#ffff00">2</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#e5d998">'.$staff_2_PR[0]['role_title_tl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40" bgcolor="#f4ecfd">'.$staff_2_PR[0]['gt_id'].'</td>
                                        <td colspan="2" bgcolor="#f4ecfd">'.$staff_2_PR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="#f4ecfd">'.$staff_2_PR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                                <div class="col-md-6 text-center">
                                  <table width="100%" border="1" class="firstLevelReporting">
                                      <tr>
                                        <td colspan="3"><h5>SECONDARY REPORTOO</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40">'.$staff_2_SR[0]['gp_id'].'</td>
                                        <td width="30%">'.$staff_2_SR[0]['report_ok'].'</td>
                                        <td width="30%">5</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_SR[0]['role_title_tl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40">'.$staff_2_SR[0]['gt_id'].'</td>
                                        <td colspan="2">'.$staff_2_SR[0]['name_code'].'</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30">'.$staff_2_SR[0]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 col-md-offset-3 text-center" style="background:#e2e2e2;padding:15px;">
                                  <table width="100%" border="1" bgcolor="#fff" class="firstLevelReporting" style="background:#fff;" >
                                      <tr>
                                        <td colspan="3" bgcolor=""><h5>ROLE 2</h5></td>
                                      </tr>
                                      <tr>
                                        <td width="30%" height="40" bgcolor="">'.$staffData[1]['gp_id'].'</td>
                                        <td width="30%" bgcolor="">'.$staffData[1]['report_ok'].'</td>
                                        <td width="30%" bgcolor="">3</td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" height="30" bgcolor="">'.$staffData[1]['role_title_tl'].', '.$staffData[1]['role_title_bl'].'</td>
                                      </tr>
                                      <tr>
                                        <td height="40" bgcolor="">'.$staffData[1]['roleCode'].'</td>
                                        <td colspan="2" bgcolor="">'.$staffData[1]['abridged_name'].'</td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                            <div class="col-md-12 paddingTop50">
                              <div class="col-md-6 col-md-offset-3 text-center" style="background:none;padding:15px;">
                                  <table width="100%" border="1">
                                      <tr>
                                        <td colspan="2" width="33%" height="90">Fundamental<br />Primary<br /><h5>'.$totalPF2.'</h5></td>
                                        <td colspan="2" width="33%" height="90">Total<br />Primary<br /><h5>'.$totalP2.'</h5></td>
                                        <td colspan="2" width="33%" height="90">Total<br />Reportee<br /><h5>'.($totalP2+count($StaffReportee2_SC)).'</h5></td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" width="50%"  height="80">Total Staff<br />Members<br /><h5>'.$TotalStaffMembers2.'</h5></td>
                                        <td colspan="3" width="50%"  height="80">Total Student<br />Members<br /><h5>'.$TotalStudentMemebers2.'</h5></td>
                                      </tr>
                                    </table>
                                </div><!-- col-md-6 -->
                            </div><!-- col-md-12 -->
                        </div><!-- col-md-12 -->
                        <hr class="smallHR" />';




              $j = 1;
              for($i=0; $i<=($totalPF2+count($StaffReportee2)); $i++) {
              $html .= '<div class="col-md-12 paddingLeft0 paddingRight0 paddingBottom20">
                          <div class="col-md-6">';

                      if(!empty($StaffReportee2[$i])) {
                      $html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                <tr>
                                  <td width="10%" bgcolor="#f5f5f5">'.($i+1).'</td>
                                  <td width="10%" bgcolor="#f5f5f5">'.$StaffReportee2[$i]['reporting_type'].'</td>
                                  <td width="40%" bgcolor="#f4ecfd"><strong>'.$StaffReportee2[$i]['abridged_name'].'</strong></td>
                                  <td width="20%" bgcolor="#ade4f2">'.$StaffReportee2[$i]['roleCode'].'</td>
                                  <td width="20%" bgcolor="#ade4f2"> '.$StaffReportee2[$i]['total_reportee'].' ('. $StaffReportee2[$i]['total_staff_members'] .') </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#ffff00">'.$StaffReportee2[$i]['report_ok'].'</td>';

                                  if($StaffReportee2[$i]['reporting_type'] == 'INDIR'){
                                    $html .= '<td bgcolor="#ffff00">('.$StaffReportee2[$i]['name_code'].')</td>';
                                  }else{
                                    $html .= '<td bgcolor="#ffff00"></td>';
                                  }

                                  $html .= '<td bgcolor="#e5d998">'.$StaffReportee2[$i]['role_title_tl'].'</td>
                                  <td colspan="2" bgcolor="#e5d998">'.$StaffReportee2[$i]['gp_id'].'</td>
                                </tr>
                              </table>';
                      }



                  $html .= '</div><!-- col-md-6 -->
                            <div class="col-md-6">';
                            if(!empty($StaffReportee2_SC[$i])) {
                              $html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                <tr>
                                  <td width="10%" bgcolor="#f5f5f5">'.($totalPF2 + $j).'</td>
                                  <td width="10%" bgcolor="#f5f5f5">'.$StaffReportee2_SC[$i]['reporting_type'].'</td>
                                  <td width="40%" bgcolor="#f4ecfd"><strong>'.$StaffReportee2_SC[$i]['abridged_name'].'</strong></td>
                                  <td width="20%" bgcolor="#ade4f2">'.$StaffReportee2_SC[$i]['roleCode'].'</td>
                                  <td width="20%" bgcolor="#ade4f2"> '.$StaffReportee2_SC[$i]['total_reportee'].' ('. $StaffReportee2_SC[$i]['total_staff_members'] .') </td>
                                </tr>
                                <tr>
                                  <td bgcolor="#ffff00">'.$StaffReportee2_SC[$i]['report_ok'].'</td>
                                  <td bgcolor="#ffff00">('.$StaffReportee2_SC[$i]['name_code'].')</td>
                                  <td bgcolor="#e5d998">'.$StaffReportee2_SC[$i]['role_title_tl'].'</td>
                                  <td colspan="2" bgcolor="#e5d998">'.$StaffReportee2_SC[$i]['gp_id'].'</td>
                                </tr>
                              </table>';
                              /*$html .= '<table width="100%" border="1" class="text-center" style="height:70px;color:#000;">
                                <tr>
                                  <td width="15%" bgcolor="#f5f5f5">'.($totalPF2 + $j).'</td>
                                  <td width="15%" bgcolor="#f5f5f5">SC</td>
                                  <td width="15%" bgcolor="">INDIR</td>
                                  <td width="15%" bgcolor="">'.$StaffReportee2_SC[$i]['roleCode'].'</td>
                                  <td width="40%" bgcolor="#f5f5f5">'.$StaffReportee2_SC[$i]['role_title_tl'].'</td>
                                </tr>
                                <tr>
                                  <td bgcolor="#e1e1e1" colspan="2"> </td>
                                  <td bgcolor="#e1e1e1"> </td>
                                  <td bgcolor="#f5f5f5"><strong>'.$StaffReportee2_SC[$i]['name_code'].'</strong></td>
                                  <td colspan="" bgcolor="#f5f5f5">'.$StaffReportee2_SC[$i]['abridged_name'].'</td>
                                </tr>
                              </table>';*/

                              $j++;
                            }
                            $html .= '</div><!-- col-md-6 -->
                          </div><!-- col-md-12 -->';
              }


          $html .= '</div><!-- orgChartSection -->';
                  }
    $html .= '</div><!-- .RightInformation_contentSection -->
          </div><!-- RightInformation -->
      ';
    }


    echo $html;
  }
}