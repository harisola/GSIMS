<?php

namespace App\Models\TIF_A;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class weekly_time_sheet_model extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'hijri_calendar';
    protected $dbCon = 'mysql_gsEvents';


    /**********************************************************************
    * Get Weeks
    * @input:   None
    * @output:  Success or Fail
    * Date:     Sep 14, 2017 (Wed)
    ***********************************************************************/
    public function get_weeks() {

        $query = "SELECT * from atif_gs_events.hijri_calendar where `date` >= curdate() order by date asc limit 7";
        $weeks = DB::connection($this->dbCon)
                ->select($query);
        return $weeks;
    }

    /**********************************************************************
    * Staff Profile Desc
    * @input:   None
    * @output:  Success or Fail
    * Date:     Sep 14, 2017 (Wed)
    ***********************************************************************/
    public function staff_profile_desc() {
        
        $query = "SELECT 
            wts.id,sr.abridged_name,sr.id as staff_id,
            sr.c_topline,sr.c_bottomline,wts.`date`,tp.name as profile_name,
            wts.time_in,wts.time_out
            FROM 
            atif_gs_events.weekly_time_sheet wts
            inner join atif.staff_registered sr on sr.id = wts.staff_id
            left join atif_gs_events.tt_profile_time_staff tpts on tpts.staff_id = wts.staff_id
            left join atif_gs_events.tt_profile tp on tp.id =  tpts.profile_id 

            where wts.`date` > curdate()";
            $staff = DB::connection($this->dbCon)
                ->select($query);

        return $staff;
    }


    /**********************************************************************
    * Get Staff
    * @input:   None
    * @output:  Success or Fail
    * Date:     Sep 14, 2017 (Wed)
    ***********************************************************************/
    public function get_staff() {
        
        $query = "select sr.id,sr.abridged_name,sr.c_bottomline,sr.c_topline,
                            ifnull(tp.name,'') as profile_name
                            FROM atif.staff_registered sr
                            left join atif_gs_events.tt_profile_time_staff tpts on tpts.staff_id = sr.id
                            left join atif_gs_events.tt_profile tp on tp.id = tpts.profile_id

                            where sr.is_active = 1 and sr.is_posted = 1";
        $staff = DB::connection($this->dbCon)
                ->select($query);
        return $staff;
    } 

    /**********************************************************************
    * Updation
    * @input:   table_name , where, data
    * @output:  Success or Fail
    * Date:     Sep 14, 2017 (Wed)
    ***********************************************************************/

    public function Updation($table_name,$where,$data){
        
        $updated_id = DB::connection($this->dbCon)
                    ->table($table_name)
                    ->where($where)
                    ->update($data);

        return $updated_id;

    }

    /**********************************************************************
    * Updation
    * @input:   table_name 
    * @output:  Success or Fail
    * Date:     Sep 14, 2017 (Wed)
    ***********************************************************************/

    public function get($table_name){
        
        $data = DB::connection($this->dbCon)
                    ->table($table_name)
                    ->get();

        return $data;

    }

    /**********************************************************************
    * Get Weekly Timesheet
    * @input:   $dates
    * @output:  Success or Fail
    * Date:     Sep 19, 2017 (Tue)
    ***********************************************************************/
    public function get_weekly_timesheet( $dates ) {
        $Result = DB::connection( $this->dbCon )->select('CALL `sp_get_weekly_timesheet`('.$dates.')');

        return $Result;
    }  

    public function getStaffHolidays(){


        $query = "SELECT `calendar_ID` FROM  atif_gs_events.`calendar_events_managment` where  record_deleted = 0 and `event_ID` in (SELECT id FROM  atif_gs_events.`event_category` WHERE `Type` = 'holiday') UNION SELECT date FROM `hijri_calendar` where islami_date in( SELECT `Hijri_Date` FROM atif_gs_events.`calendar_events_managment_hijri_date` where   record_deleted = 0 and `event_ID` in (SELECT id FROM atif_gs_events.`event_category` WHERE `Type` = 'holiday'))";
    
        $Result = DB::connection($this->dbCon)->select($query);
        
        return $Result;
    }
    
    public function insertData($table_name,$data){
        $id = DB::connection($this->dbCon)->table($table_name)->insertGetId($data);
        return $id;
    }
    
    public function getFilterMonths(){

        $query = 'SELECT DISTINCT DATE_FORMAT(`date`, "%b %Y") as monthFilter FROM `weekly_time_sheet` WHERE `date` >= "2017-05-31" and `date` <= "2018-05-31"   ORDER BY `monthFilter` ASC';
    
        $Result = DB::connection($this->dbCon)->select($query);
        
        return $Result;        
    }
    public function getSaturdayDatesAndMonths($filter){


        $query = 'SELECT DISTINCT DATE_FORMAT(`date`, "%a <br> <small> %d %b %Y </small>") as dateHeader, date FROM `weekly_time_sheet` WHERE DAYOFWEEK(`date`) = 7 and `date` >= "'.$filter.'" and DATE_FORMAT( "'.$filter.'" , "%b %Y") =  DATE_FORMAT(`date`, "%b %Y")  ORDER BY `dateHeader` ASC';
    
        $Result = DB::connection($this->dbCon)->select($query);
        
        return $Result;
    }

    public function updateSaturday($table_name, $data){
        

        return DB::statement("INSERT INTO $table_name 
         
        (staff_id, date, record_deleted, time_in, time_out, is_on_flexy, is_on_relaxation, flexy_time, relaxation_time, created, register_by, modified, modified_by, holidayFlag ) SELECT " . $data['staff_id'] . ", '". $data['date'] ."', ". $data['record_deleted'] ." , sat_in, sat_out, `is_on_flexy`, `is_on_relaxation`, `flexy_time`, `relaxation_time`, ". $data['created'] .", ". $data['register_by'] ." , ". $data['modified'] ." , ". $data['modified_by'] .", 0 FROM atif_gs_events.tt_profile_time_staff where `staff_id` = 1 
        ON DUPLICATE KEY UPDATE record_deleted = ". $data['record_deleted'] );
        
    }   

    /**********************************************************************
    * Get Saturday Weekly Timesheet
    * @input:   $filter_date
    * @output:  Success or Fail
    * Date:     Jan 20, 2018 (Sat)
    ***********************************************************************/
    public function get_saturday_weekly_timesheet( $filter_date ) {
        /*
        $pdo = DB::connection()->getPdo();
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);*/
        $query = "CALL atif_gs_events.sp_get_weekly_timesheet_sat('$filter_date')";
        //$query = "CALL atif_sp.`Get_ClassList_of_GradeSection_ID`('13', '2')";
        //var_dump($query);
        $Result = DB::connection( $this->dbCon )->select($query);
        return $Result;
    }                     
        

    public function updateStaffMultipleInOutTime($data){
         

        return DB::statement("UPDATE atif_gs_events.weekly_time_sheet SET time_in = '". $data['timeIn']."' ,time_out = '".$data['timeOut']."' WHERE staff_id in (".$data['ids'].") and date = '" . $data['date'] . "' ");
        
    } 

}
