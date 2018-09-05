<?php

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Information\StaffInformationModel;
use App\Models\TIF_A\weekly_time_sheet_model;

class TTProfileWeeklyTSController extends Controller
{
    public function mainPage(){
        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $selectionList = new SelectionList();
        $weeklyTimeSheet = new weekly_time_sheet_model();


        /***** Getting Staff Information of Login User *****/
        $user = $staffInfo->get_Staff_Info(34);


        /***** Getting Staff List *****/
        //$staff = $staffInfo->get_Staff_List();

        /***** Getting Weeks *****/
        $get_weeks = $weeklyTimeSheet->get_weeks();

        /***** Getting Staff Profile Details *****/
        $staff_profile_detail = $weeklyTimeSheet->staff_profile_desc();
        
        /***** Getting Staff List *****/
        $staff = $weeklyTimeSheet->get_staff();
        
        $dates = $this->get_dates($get_weeks);

        
        $weeklyTimeSheetData =  $weeklyTimeSheet->get_weekly_timesheet( $dates );
        
        $profile_detail = $weeklyTimeSheet->get('atif_gs_events.tt_profile');
        
        $holidaysData = $weeklyTimeSheet->getStaffHolidays();
        $holidaysDates = $this->checkHoliday($holidaysData);

        $saturdayDates = $weeklyTimeSheet->getSaturdayDatesAndMonths(date('Y-m-01'));
        $saturdayWeeklyData = $weeklyTimeSheet->get_saturday_weekly_timesheet(date('Y-m-01'));
        
        $monthsData = $weeklyTimeSheet->getFilterMonths();

        /**** org - page ****/
        return view('tt_profile.profile_weeklyts6')->with(array('staff' => $staff, 'user' => $user,'get_weeks' => $get_weeks, 'weeklyTimeSheetData' => $weeklyTimeSheetData, 'profile_detail' => $profile_detail , 'holidaysDates' => $holidaysDates, 'saturdayDates' => $saturdayDates, 'monthsData' => $monthsData, 'saturdayWeeklyData' => $saturdayWeeklyData ));
    }
    public function get_dates( $weeks ){
        $dates = array();
        foreach ($weeks as $key => $value) {
            array_push( $dates, "'".$value->date."'" );
        }
        $dates = implode(',', $dates);
        return $dates;
    }
        /*
    *
    * Name: Add Weekly Sheet Time
    * Description: Add staff weekly time from sheet
    *
    */
    public function add_weekly_sheet_time(Request $request){
        if(count($request)){
            $weeklyTimeSheet = new weekly_time_sheet_model();
            $userID = Sentinel::getUser()->id;
            $staff_id = $request->input('staff_id');
            $date = $request->input('date');
            $holidayFlag = $request->input('holidayFlag');
            $time_in = $request->input('time_in');
            $time_out = $request->input('time_out');
            $data = array(
                'staff_id' => $staff_id,
                'date' => $date,
                'time_in' => $time_in,
                'time_out' => $time_out,
                'created' => time(),
                'register_by' => $userID,
                'modified' => time(),
                'holidayFlag' => $holidayFlag,
                'modified_by' => $userID,
                'record_deleted' => 0
            );
 
            //Update staff weekly time sheet        
            $updation_status = $weeklyTimeSheet->insertData('atif_gs_events.weekly_time_sheet',$data);

            echo $updation_status;
        }
    }

    
    /*
    *
    * Name: Update Weekly Time Sheet Saturday
    * Description: Change status of Saturday in time sheet
    *
    */

    public function update_weekly_sheet_saturday(Request $request){
        if(count($request)){
            $weeklyTimeSheet = new weekly_time_sheet_model();

            $flag = $request->input('saturdayFlag');
            $id = $request->input('id');
            $data = array(
                'record_deleted' => $flag
            );
            $where = array(
                'id' => $id
            );
            //Update staff weekly time sheet        
            $updation_status = $weeklyTimeSheet->Updation('atif_gs_events.weekly_time_sheet',$where,$data);

            echo $updation_status;
        }
    } 

    /*
    *
    * Name: Update Weekly Sheet holidayFlag
    * Description: Update staff weekly holiday flag from sheet
    *
    */

    public function update_weekly_sheet_holidayFlag(Request $request){
        if(count($request)){
            $weeklyTimeSheet = new weekly_time_sheet_model();
            
            $holidayFlag = $request->input('holidayFlag');
            $id = $request->input('id');
            $data = array(
                'holidayFlag' => $holidayFlag
            );
            $where = array(
                'id' => $id
            );
            //Update staff weekly time sheet        
            $updation_status = $weeklyTimeSheet->Updation('atif_gs_events.weekly_time_sheet',$where,$data);

            echo $updation_status;
        }
    } 
    /*
    *
    * Name: Update Weekly Sheet Time
    * Description: Update staff weekly time from sheet
    *
    */

    public function update_weekly_sheet_time(Request $request){
        if(count($request)){
            $weeklyTimeSheet = new weekly_time_sheet_model();
            
            $type = $request->input('type');
            $time = $request->input('time');
            $id = $request->input('id');
            $data = array(
                $type => $time
            );
            $where = array(
                'id' => $id
            );
            //Update staff weekly time sheet        
            $updation_status = $weeklyTimeSheet->Updation('atif_gs_events.weekly_time_sheet',$where,$data);

            echo $updation_status;
        }
    }

    /*
    *
    * Name: Get Weekly Sheet Time
    * Description: Get staff weekly timesheet data
    *
    */

    public function get_weekly_sheet_time(Request $request){
        if(count($request)){
            $weeklyTimeSheet = new weekly_time_sheet_model();
            
            $startDate = $request->input('startDate');
            $dates = array();
            array_push($dates, $startDate);
            for ( $i = 1; $i < 7; $i++ ){
                $nextDay = date('Y-m-d', strtotime($startDate. ' + '.$i.' days'));
                array_push($dates, $nextDay );

            }
            $holidaysData = $weeklyTimeSheet->getStaffHolidays();
            $holidaysDates = $this->checkHoliday($holidaysData);
            $dates = "'".implode("','",$dates)."'";
            
            //Get staff weekly timesheet data
            $data['weeklyTimeSheetData'] =  $weeklyTimeSheet->get_weekly_timesheet( $dates );
            $data['dates'] = $dates;
            $data['holidaysDates'] = $holidaysDates;
            return $data;

        }
    }

    public function checkHoliday($data){
       
        $holidays  = [];
        foreach ($data as $key => $value) {
            array_push($holidays, $value->calendar_ID);
        }
    
        return $holidays;
    }

   /*
    * Name: Add Weekly Sheet Time
    * Description: Add staff weekly time from sheet
    *
    */
    public function update_weekly_sheet_time_saturday(Request $request){
        if(count($request)){
            $weeklyTimeSheet = new weekly_time_sheet_model();
            $userID = Sentinel::getUser()->id;
            $staff_id = $request->input('staff_id');
            $date = $request->input('date');
            $state = $request->input('state');
            $data = array(
                'staff_id' => $staff_id,
                'date' => $date,
                'created' => time(),
                'register_by' => $userID,
                'modified' => time(),
                'modified_by' => $userID,
                'record_deleted' => $state
            );
            
            //Update staff weekly time sheet        
            $updation_status = $weeklyTimeSheet->updateSaturday('atif_gs_events.weekly_time_sheet',$data);

            echo $updation_status;
        }
    }         
   /*
    * Name: Add Weekly Sheet Time
    * Description: Add staff weekly time from sheet
    *
    */
    public function get_weekly_sheet_time_saturday(Request $request){
        if(count($request)){
            $weeklyTimeSheet = new weekly_time_sheet_model();
            $date = $request->input('date');

            $data['saturdayDates'] = $weeklyTimeSheet->getSaturdayDatesAndMonths( $date );
            $data['saturdayWeeklyData'] = $weeklyTimeSheet->get_saturday_weekly_timesheet( $date );
            
            $data['monthsData'] = $weeklyTimeSheet->getFilterMonths();

            return $data;
        }
    }


   /*
    * Name: Update Weekly Sheet Time for Multiple Staff
    * Description: Add staff weekly time from sheet
    *
    */
    public function update_mutiple_staff_weekly_sheet_time (Request $request){
        if(count($request)){
            $weeklyTimeSheet = new weekly_time_sheet_model();
            $data['date'] = $request->input('date');
            $data['timeOut'] = $request->input('timeOut');
            $data['timeIn'] = $request->input('timeIn');
            $data['ids'] = $request->input('ids');

            $weeklyTimeSheet->updateStaffMultipleInOutTime( $data );
          
        }
    }         
}
