<?php
/******************************************************************
* Author:   Atif Naseem
* Email:    atif.naseem22@gmail.com
* Cell:     +92-313-5521122
*******************************************************************/
namespace App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
class ReportStaffModel extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $dbCon = 'mysql';
    public function generateReport($date){
        
    
        $Result = DB::connection( $this->dbCon )->select("call atif_gs_events.Generate_Staff_Report('".$date."')");
        return $Result;
    }
    public function getStaffAbsentia($staff_id,$date){
        
    
        $Result = DB::connection( $this->dbCon )->select("select abridged_name as Name, 
            ( select  time  from atif_attendance_staff.`staff_attendance_in` where staff_id = staff_register_table.id and location_id in (17) and date = '".$date."' GROUP BY date ) as 'Absentia_TapOut',
            ( select  time    from atif_attendance_staff.`staff_attendance_out` where staff_id = staff_register_table.id and location_id in (17) and date = '".$date."' GROUP BY date  ) as 'Absentia_TapIn'  FROM atif.`staff_registered` as staff_register_table WHERE id =". $staff_id);
        return $Result;
    }
    public function getStaffManualTapOut($staff_id,$date){
        $Result = DB::connection( $this->dbCon )->select("select abridged_name as Name, 
                ( select  time  from atif_attendance_staff.`staff_attendance_out` where staff_id = staff_register_table.id and location_id in (18) and date = '".$date."' GROUP BY date ) as 'Actual_TapOut' FROM atif.`staff_registered` as staff_register_table WHERE id =". $staff_id);
        return $Result;
    }
    public function getStaffManualAttendance($staff_id,$date){
           $Result = DB::connection( $this->dbCon )->select("select abridged_name as Name, 
                ( select  time  from atif_attendance_staff.`staff_attendance_in` where staff_id = staff_register_table.id and location_id in (18) and date = '".$date."' GROUP BY date ) as 'Actual_TapIn',
                null as 'Absentia_Tap_In',
                null as 'Absentia_Tap_Out',
                id as staff_id,

                (select `sat_hrs` from atif_gs_events.tt_profile_time where `profile_id` = (select `profile_id` from atif_gs_events.tt_profile_time_staff where staff_id = staff_register_table.id) ) as 'sat_hours',
                
                ( select  time    from atif_attendance_staff.`staff_attendance_out` where staff_id = staff_register_table.id and location_id in (18) and date = '".$date."' GROUP BY date  ) as 'Actual_TapOut' ,
                ( select time_in from atif_gs_events.weekly_time_sheet where  date = '".$date."'  and staff_id = ". $staff_id. " group by staff_id ) as 'Weekly_TimeSheet_TapIN',
                ( select time_out from atif_gs_events.weekly_time_sheet where  date = '".$date."'  and staff_id = staff_register_table.id group by staff_id ) as 'Weekly_TimeSheet_TapOut',
                (select monthly_relax_in from atif_gs_events.tt_profile_time where `profile_id` = (select `profile_id` from atif_gs_events.tt_profile_time_staff where staff_id = staff_register_table.id) ) as 'Monthly_Buffer',
                (select `daily_relax_in` from atif_gs_events.tt_profile_time where `profile_id` = (select `profile_id` from atif_gs_events.tt_profile_time_staff where staff_id = staff_register_table.id) ) as 'Daily_Buffer',
                (SELECT max(utlilize_buffer) FROM atif_gs_events.`daily_attendance_report` WHERE staff_id = staff_register_table.id and MONTH(date) = MONTH( '".$date."')  limit 1) as 'Utilize_Buffer',
                (select monthly_relax_out from atif_gs_events.tt_profile_time where `profile_id` = (select `profile_id` from atif_gs_events.tt_profile_time_staff where staff_id = staff_register_table.id) ) as 'Monthly_Buffer_Out',
                (select `daily_relax_out` from atif_gs_events.tt_profile_time where `profile_id` = (select `profile_id` from atif_gs_events.tt_profile_time_staff where staff_id = staff_register_table.id) ) as 'Daily_Buffer_Out',
                (SELECT max(utilize_buffer_out) FROM atif_gs_events.`daily_attendance_report` WHERE staff_id = staff_register_table.id and MONTH(date) = MONTH( '".$date."')  limit 1) as 'Utilize_Buffer_out'
                FROM atif.`staff_registered` as staff_register_table WHERE id =". $staff_id);

           

            return $Result;
    }
    
    public function insertRecord($tablename,$data){
        $result = DB::connection($this->dbCon)->table($tablename)->insertGetId($data);
        if($result > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function update_data($table_name,$where,$data){
        $update_data =  DB::table($table_name)->where($where)->update($data);
        return $update_data;
    }

    public function getStaffAbsent($staff_id, $date){
        $Result = DB::connection( $this->dbCon )->select("SELECT IFNULL(
                (SELECT atr.remaining_buffer From atif_gs_events.daily_attendance_report atr where atr.staff_id = ". $staff_id ." and MONTH(atr.date) = MONTH( '".$date."')  order by atr.date desc limit 1),
                (Select ttpts.monthly_relax_in from atif_gs_events.tt_profile_time_staff ttpts where ttpts.staff_id = ". $staff_id ."  )
                ) as remaining_buffer,

                IFNULL(
                (SELECT atr.utlilize_buffer From atif_gs_events.daily_attendance_report atr where atr.staff_id = ". $staff_id ." and MONTH(atr.date) = MONTH( '".$date."') order by atr.date desc limit 1),
                0
                ) as daily_buffer");

            return $Result;
    }

    public function getAttendanceReportData( $yesterday_date ){


        $query = "select *, (select leave_balance from atif.staff_registered where id = daily_report.staff_id) as remaining_leave, (select date from atif_gs_events.daily_attendance_report where staff_id = daily_report.staff_id order by date desc limit 1,1) as backDate, (select staff_type from atif.staff_registered where id=daily_report.staff_id) as type,
            ( select time_in from atif_gs_events.weekly_time_sheet where  date = '".$yesterday_date."'  and staff_id = daily_report.staff_id group by staff_id ) as 'weekly_tap_in',
            ( select time_out from atif_gs_events.weekly_time_sheet where  date = '".$yesterday_date."'  and staff_id = daily_report.staff_id group by staff_id ) as 'weekly_tap_out' from atif_gs_events.daily_attendance_report as daily_report where date = '".$yesterday_date."' and daily_factor != 1" ;
        $Result = DB::connection($this->dbCon)->select($query);
        
        return $Result;
    }   

    public function getStaffLeaves( $staff_id ){


        $query = "select total_leaves FROM atif.`staff_registered` as staff_register_table where staff_register_table.id = ".$staff_id;
        $Result = DB::connection($this->dbCon)->select($query);
        
        return $Result;
    } 

    public function getStaffApprovedLeaves( $staff_id, $date ){


        $query = "SELECT * FROM atif_gs_events.`leave_application` where paid_compensation = 1 and leave_approve_status = 1 and staff_id = ".$staff_id . " and '".$date ."' >= leave_approve_date_from   and '".$date."' <= `leave_approve_date_to`";
    
        $Result = DB::connection($this->dbCon)->select($query);
        
        return $Result;
    }
        

    public function getStaffHolidays(){


        $query = "SELECT `calendar_ID` FROM atif_gs_events.`calendar_events_managment` where `event_ID` in (SELECT id FROM atif_gs_events.`event_category` WHERE `Type` = 'holiday') ORDER BY `calendar_events_managment`.`calendar_ID` DESC";
    
        $Result = DB::connection($this->dbCon)->select($query);
        
        return $Result;
    }
       
    
   public function getPreviousDayLeave($staff_id){
        $query = "select IFNULL((SELECT `remaining_leave` FROM  atif_gs_events.`daily_attendance_report` where `staff_id` = ".$staff_id." LIMIT 1), (SELECT `total_leaves` FROM  `atif`.`staff_registered` where `id` = ".$staff_id." )) as leaves";
    
        $Result = DB::connection($this->dbCon)->select($query);
        
        return $Result;
   } 

    public function getStaffLeavesAndFactor($staff_id, $date){


        $query = "SELECT id, date, deduction, remaining_leave from atif_gs_events.daily_attendance_report as reportTable where date >= '".$date."' and staff_id = ".$staff_id . " ORDER BY `reportTable`.`date` DESC";
    
        $Result = DB::connection($this->dbCon)->select($query);
        
        return $Result;
    }   
}