<?php
/******************************************************************
* Author : Atif Naseem
* Email : atif.naseem22@gmail.com
* Cell : +92-313-5521122
*******************************************************************/


namespace App\Http\Controllers\Development;



use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Staff\Staff_Information\StaffInformationModel;
use App\Models\Core\SelectionList;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TTProfileController extends Controller
{
    public function ttProfile_allocation(){
        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $selectionList = new SelectionList();
        /***** Getting Staff Information of Login User *****/
        $user = $staffInfo->get_Staff_Info(22);

        /***** Getting Staff List *****/
        $staff = $staffInfo->get_Staff_List();

        /***** Getting Staff Filterable List *****/
        $departmentWhere = "c_bottomline != '' and c_bottomline != '..' and c_bottomline not like '%HiAce,%'
        and c_bottomline not like '%HiRoof,%'";
        $staffFilter['department'] = $selectionList->get_FieldList('atif.staff_registered', 'c_bottomline', $departmentWhere);
        $staffFilter['tt_profile'] = $selectionList->get_FieldList('atif_gs_events.tt_profile', 'id,name');

        /**** org - page ****/
        return view('tt_profile.profile_allocation')->with(array('staff' => $staff, 'user' => $user, 'filter' => $staffFilter));
    }





    public function ttProfile_update(Request $request){
        if(count($request)){
            $staffInfo = new StaffInformationModel();
            $staff_ids = $request->input('staff_ids');
            $staff_profile = $request->input('staff_profile');
            $staff_ids = explode(',', $staff_ids);



            for ($i=0; $i < count($staff_ids) ; $i++) { 

                $updateStaffStatus = $staffInfo->updateProfileTimeStaff($staff_ids[$i], $staff_profile);
                if( $updateStaffStatus == 0 ){
                    
                    echo $insertStaffStatus = $staffInfo->insertProfileTimeStaff($staff_ids[$i], $staff_profile);
                }

                $from_date = date("Y-m-d");
                $to_date = date("Y-m-d",strtotime('+360 days'));
                $update_weeklySheet =  $staffInfo->updateWeeklyTimeSheetByStaff($staff_ids[$i], $from_date,$to_date);
                

                $this->setDailyAttendanceReport($staff_ids[$i],$staff_profile);
            }

        }
    }


    public function ttCustomProfile_update(Input $input){
        if(count($input)){
            $staffInfo = new StaffInformationModel();
            $data = Input::all();
            $staff_id = $data['staff_id'];
            if( $data['form_type'] == 'customProfileForm'){
                if($data['sat_hrs'] != '' && ($data['sat_off'] != '' || $data['sat_working'] != '')){

                    $data['is_on_sat'] = '1';
                    $sign = ($data['sat_hrs'] < 0 ? "-" : "");
                    $absMinutes = abs($data['sat_hrs']) * 60;        
                    $hh = floor($absMinutes / 60);
                    $mm = $absMinutes % 60;
                    $saturday_calculated_hour = $sign . $hh . ":" . str_pad($mm, 2, "0", STR_PAD_LEFT);

                    $hour_one = $data['mon_in'] ;
                    $hour_two = $saturday_calculated_hour;
                    $h =  strtotime($hour_one);
                    $h2 = strtotime($hour_two);

                    $minute = date("i", $h2);
                    $second = date("s", $h2);
                    $hour = date("H", $h2);


                    $convert = strtotime("+$minute minutes", $h);
                    $convert = strtotime("+$second seconds", $convert);
                    $convert = strtotime("+$hour hours", $convert);
                    $data['sat_out'] = date('H:i:s', $convert);
                    $data['sat_in'] = $data['mon_in'];
                }else{
                    $data['is_on_sat'] = '0';
                    $data['sat_out'] = '00:00:00';
                    $data['sat_in'] = '00:00:00';
                    $data['sat_hrs'] = '0';  
                }
            }            
            unset($data['_token']);
            unset($data['staff_id']);
            unset($data['form_type']);

            $staff = $staffInfo->updateCustomProfileTimeStaff($data, $staff_id);

            // Update Weekly Time Sheet
            $from_date = date("Y-m-d");
            $to_date = date("Y-m-d",strtotime('+360 days'));
            $update_weeklySheet =  $staffInfo->updateWeeklyTimeSheetByStaff($staff_id, $from_date,$to_date);
            
            return  $data;
        }
    }

    public function ttProfileTimeStaff_get(Request $request){
        if(count($request)){
            $staffInfo = new StaffInformationModel();
            $staff_id = $request->input('staff_id');
            $staff = $staffInfo->getProfileTimeStaff($staff_id);
            return $staff;
        }
    }

    public function ttProfileTime_get(Request $request){
        if(count($request)){
            $staffInfo = new StaffInformationModel();
            $staff_id = $request->input('profile_id');
            $staff = $staffInfo->getProfileTime($staff_id);
            return $staff;
        }
    }


    // public function ttProfile_definition(){
    // 	$userID = Sentinel::getUser()->id;
    // 	$staffInfo = new StaffInformationModel();

    // 	/***** Getting Staff Information of Login User *****/
	   //  $user = $staffInfo->get_Staff_Info(22);

	   //  /***** Getting Staff List *****/
	   //  $staff = $staffInfo->get_Staff_List();

    // 	/**** org - page ****/
    // 	return view('tt_profile.profile_definition')->with(array('staff' => $staff, 'user' => $user));
    // }

    public function ttProfile_definition(){
        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();

        /***** Getting Staff Information of Login User *****/
       // $user = $staffInfo->get_Staff_Info(22);


        /***** Profile Allocated To Staff *****/
        $profile_allocated = $staffInfo->profile_allocated();

        /***************** Profile Defination ****************/

        $profile_type = $staffInfo->profile_type();


        /**** org - page ****/
        return view('tt_profile.profile_definition')->with(array('profile_allocated' => $profile_allocated,'profile_type'=> $profile_type));
    }

    /**********************************************************************
    * Insert Profile
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   profileName,profileType
    * @output:  Last Inserted ID
    * Date:     Aug 29, 2017 (Tues)
    ***********************************************************************/

    public function insertTtProfile(Request $request){


        
        $profile_name = $request->input('profile_name');
        $profile_type_id = $request->input('profile_type_id');

        $data = array(
            'profile_type_id' => $profile_type_id,
            'name' => $profile_name,
            'created' => time(),
            'created_by' => Sentinel::getUser()->id,
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id,
            'record_deleted' => 0
        );

         $insertedRow =  DB::table('atif_gs_events.tt_profile')->insertGetId($data);
         echo $insertedRow;

    }

    /**********************************************************************
    * Insert Standard Profile
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   profile_id,morning_time,afternoon_time,wed_time,fri_time,ext_time,ext_frequency,july_start,sat_hour,sat_off
    * @output:  Last Inserted ID
    * Date:     Aug 29, 2017 (Tues)
    ***********************************************************************/
    public function insertStandardProfile(Request $request){

        $profile_id =   $request->input('profile_id');
        $morning_time = $request->input('morning_time');
        $afternoon_time = $request->input('afternoon_time');
        $mon_time_out = $request->input('mon_time_out');
        $tues_time_out = $request->input('tues_time_out');
        $wed_time_out = $request->input('wed_time');
        $thurs_time_out = $request->input('thurs_time_out');
        $fri_time_out = $request->input('fri_time');
        $ext_time = $request->input('ext_time');
        $ext_frequency = $request->input('ext_frequency');
        $july_start = $request->input('july_start');
        $sat_hour = $request->input('sat_hour');
        $sat_off = $request->input('sat_off');
        $sat_on = $request->input('sat_on');
        $avg_hrs = $request->input('avg_hrs');
        $flexy_time = $request->input('flexy_time');
        //$relaxation_time = $request->input('relaxtion_time');
        $daily_relax_in = $request->input('daily_relax_in');
        $daily_relax_out = $request->input('daily_relax_out');
        $monthly_relax_in = $request->input('monthly_relax_in');
        $monthly_relax_out = $request->input('monthly_relax_out');

        

        if($july_start == ''){
            $july_start = date('Y-m-d',strtotime($july_start));
        }

        // IS on Flag Morning And Afternoon
        
        $is_on_mon = $this->get_on_off_flag($morning_time,$mon_time_out);
        $is_on_tue = $this->get_on_off_flag($morning_time,$tues_time_out);
        $is_on_wed = $this->get_on_off_flag($morning_time,$wed_time_out);
        $is_on_thu = $this->get_on_off_flag($morning_time,$thurs_time_out);
        $is_on_fri = $this->get_on_off_flag($morning_time,$fri_time_out);
        $is_on_sun = 0;
   

        // Set date in week day

        if($is_on_mon == 1){
            $mon_in = $morning_time;
            $mon_out = $mon_time_out;
        }else{
            $mon_in = '00:00:00';
            $mon_out = '00:00:00';
        }

        if($is_on_tue == 1){
            $tue_in = $morning_time;
            $tue_out = $tues_time_out;
        }else{
            $tue_in = '00:00:00';
            $tue_out = '00:00:00';
        }

        if($is_on_wed == 1){
            $wed_in = $morning_time;
            $wed_out = $wed_time_out;
        }else{
            $wed_in= '00:00:00';
            $wed_out = '00:00:00';
        }

        if($is_on_thu == 1){
            $thur_in = $morning_time;
            $thur_out = $thurs_time_out;
        }else{
            $thur_in= '00:00:00';
            $thur_out = '00:00:00';
        }

        if($is_on_fri == 1){
            $fri_in = $morning_time;
            $fri_out = $fri_time_out;
        }else{
            $fri_in= '00:00:00';
            $fri_out = '00:00:00';
        }

        if($is_on_sun == 1){
            $sun_in= '00:00:00';
            $sun_out = '00:00:00';
        }else{
            $sun_in= '00:00:00';
            $sun_out = '00:00:00';
        }


        // Is On Flag on EXT Time

        if($ext_time != ''){
            $use_ext = 1;
        }else{
            $use_ext = 0;
            $ext_time = '00:00:00';
        }

        // Sat Hours Calculating

        if($sat_hour != '' && ($sat_off != '' || $sat_on != '')){
            $is_on_sat = 1;
            $sign = ($sat_hour < 0 ? "-" : "");
            $absMinutes = abs($sat_hour) * 60;        
            $hh = floor($absMinutes / 60);
            $mm = $absMinutes % 60;
            $saturday_calculated_hour = $sign . $hh . ":" . str_pad($mm, 2, "0", STR_PAD_LEFT);

            $hour_one = $morning_time ;
            $hour_two = $saturday_calculated_hour;
            $h =  strtotime($hour_one);
            $h2 = strtotime($hour_two);

            $minute = date("i", $h2);
            $second = date("s", $h2);
            $hour = date("H", $h2);


            $convert = strtotime("+$minute minutes", $h);
            $convert = strtotime("+$second seconds", $convert);
            $convert = strtotime("+$hour hours", $convert);
            $total_sat_hour = date('H:i:s', $convert);
            $sat_in = $morning_time;
        }else{
            $is_on_sat = 0;
            $total_sat_hour = '00:00:00';
            $sat_in = '00:00:00';
            $sat_hour = 0;  
        }



        // Flexy Time

        if($flexy_time > $morning_time){
            $is_on_flexy = 1;
            $flexy_time = $flexy_time;
        }else{
            $is_on_flexy = 0;
            $flexy_time = '00:00:00';
        }

        // Relaxation Time

        // if($relaxation_time > $morning_time){
        //     $is_on_relaxation = 1;
        //     $relaxation_time = $relaxation_time;
        // }else{
        //     $is_on_relaxation = 0;
        //     $relaxation_time = '00:00:00';
        // }

        // DAILY RELAXATION

        // relax in
        if(is_null($daily_relax_in)){
            $daily_relax_in =  0;
        }else{
            $daily_relax_in =  $daily_relax_in;
        }
        // relax out
        if(is_null($daily_relax_out)){
            $daily_relax_out =  0;
        }else{
            $daily_relax_out =  $daily_relax_out;
        }
        // monthly relax in
        if(is_null($monthly_relax_in)){
            $monthly_relax_in =  0;
        }else{
            $monthly_relax_in =  $monthly_relax_in;
        }
        // monthly relax out
        if(is_null($monthly_relax_out)){
            $monthly_relax_out =  0;
        }else{
            $monthly_relax_out =  $monthly_relax_out;
        }
        
        $data = array(
            'profile_id' => $profile_id,
            'is_on_mon' => $is_on_mon,
            'is_on_tue' => $is_on_tue,
            'is_on_wed' => $is_on_wed,
            'is_on_thu' => $is_on_thu,
            'is_on_fri' => $is_on_fri,
            'is_on_sat' => $is_on_sat,
            'is_on_sun' => $is_on_sun,
            'is_on_flexy' => $is_on_flexy,
            //'is_on_relaxation' => $is_on_relaxation,
            'mon_in' => $mon_in,
            'tue_in' => $tue_in,
            'wed_in' => $wed_in,
            'thu_in' => $thur_in,
            'fri_in' => $fri_in,
            'sat_in' => $sat_in,
            'sun_in' => $sun_in,
            'mon_out' => $mon_out,
            'tue_out' => $tue_out,
            'wed_out' => $wed_out,
            'thu_out' => $thur_out,
            'fri_out' => $fri_out,
            'sat_out' => $total_sat_hour,
            'sun_out' => '00:00:00',
            'avg_week_hrs' => $avg_hrs,
            'use_ext' => $use_ext,
            'ext_time' => $ext_time,
            'ext_frequency' => (int)$ext_frequency,
            'ext_july' => $july_start,
            'sat_hrs' => $sat_hour,
            'sat_off' => (int)$sat_off,
            'sat_working' => (int)$sat_on,
            'flexy_time' => $flexy_time,
            //'relaxation_time' => $relaxation_time,
            'daily_relax_in' => $daily_relax_in,
            'monthly_relax_in' => $monthly_relax_in,
            'daily_relax_out' => $daily_relax_out,
            'monthly_relax_out' => $monthly_relax_out,
            'standard_out' => $afternoon_time,
            'created' => time(),
            'created_by' => Sentinel::getUser()->id,
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id
        );

        $last_id =  DB::table('atif_gs_events.tt_profile_time')->insertGetId($data);

        echo $last_id;
        

    }

    /**********************************************************************
    * Insert Custom Profile
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   profile_id,morning_time,afternoon_time,wed_time,fri_time,ext_time,ext_frequency,july_start,sat_hour,sat_off
    * @output:  Last Inserted ID
    * Date:     Aug 29, 2017 (Tues)
    ***********************************************************************/

    function insertCustomProfile(Request $request){


        $profile_id =   $request->input('profile_id');
        $morning_time = $request->input('morning_time');
        $afternoon_time = $request->input('afternoon_time');
        $mon_time_out = $request->input('mon_time_out');
        $tues_time_out = $request->input('tues_time_out');
        $wed_time_out = $request->input('wed_time');
        $thurs_time_out = $request->input('thurs_time_out');
        $fri_time_out = $request->input('fri_time');
        $ext_time = $request->input('ext_time');
        $ext_frequency = $request->input('ext_frequency');
        $july_start = $request->input('july_start');
        $sat_hour = $request->input('sat_hour');
        $sat_off = $request->input('sat_off');
        $sat_on = $request->input('sat_on');
        $avg_hrs = $request->input('avg_hrs');
        $flexy_time = $request->input('flexy_time');
        //$relaxation_time = $request->input('relaxtion_time');
        $daily_relax_in = $request->input('daily_relax_in');
        $daily_relax_out = $request->input('daily_relax_out');
        $monthly_relax_in = $request->input('monthly_relax_in');
        $monthly_relax_out = $request->input('monthly_relax_out');

        

        if($july_start == ''){
            $july_start = date('Y-m-d',strtotime($july_start));
        }

        // IS on Flag Morning And Afternoon
        
        $is_on_mon = $this->get_on_off_flag($morning_time,$mon_time_out);
        $is_on_tue = $this->get_on_off_flag($morning_time,$tues_time_out);
        $is_on_wed = $this->get_on_off_flag($morning_time,$wed_time_out);
        $is_on_thu = $this->get_on_off_flag($morning_time,$thurs_time_out);
        $is_on_fri = $this->get_on_off_flag($morning_time,$fri_time_out);
        $is_on_sun = 0;
   

        // Set date in week day

        if($is_on_mon == 1){
            $mon_in = $morning_time;
            $mon_out = $mon_time_out;
        }else{
            $mon_in = '00:00:00';
            $mon_out = '00:00:00';
        }

        if($is_on_tue == 1){
            $tue_in = $morning_time;
            $tue_out = $tues_time_out;
        }else{
            $tue_in = '00:00:00';
            $tue_out = '00:00:00';
        }

        if($is_on_wed == 1){
            $wed_in = $morning_time;
            $wed_out = $wed_time_out;
        }else{
            $wed_in= '00:00:00';
            $wed_out = '00:00:00';
        }

        if($is_on_thu == 1){
            $thur_in = $morning_time;
            $thur_out = $thurs_time_out;
        }else{
            $thur_in= '00:00:00';
            $thur_out = '00:00:00';
        }

        if($is_on_fri == 1){
            $fri_in = $morning_time;
            $fri_out = $fri_time_out;
        }else{
            $fri_in= '00:00:00';
            $fri_out = '00:00:00';
        }

        if($is_on_sun == 1){
            $sun_in= '00:00:00';
            $sun_out = '00:00:00';
        }else{
            $sun_in= '00:00:00';
            $sun_out = '00:00:00';
        }


        // Is On Flag on EXT Time

        if($ext_time != ''){
            $use_ext = 1;
        }else{
            $use_ext = 0;
            $ext_time = '00:00:00';
        }

        // Sat Hours Calculating

        if($sat_hour != '' && ($sat_off != '' || $sat_on != '')){
            $is_on_sat = 1;
            $sign = ($sat_hour < 0 ? "-" : "");
            $absMinutes = abs($sat_hour) * 60;        
            $hh = floor($absMinutes / 60);
            $mm = $absMinutes % 60;
            $saturday_calculated_hour = $sign . $hh . ":" . str_pad($mm, 2, "0", STR_PAD_LEFT);

            $hour_one = $morning_time ;
            $hour_two = $saturday_calculated_hour;
            $h =  strtotime($hour_one);
            $h2 = strtotime($hour_two);

            $minute = date("i", $h2);
            $second = date("s", $h2);
            $hour = date("H", $h2);


            $convert = strtotime("+$minute minutes", $h);
            $convert = strtotime("+$second seconds", $convert);
            $convert = strtotime("+$hour hours", $convert);
            $total_sat_hour = date('H:i:s', $convert);
            $sat_in = $morning_time;
        }else{
            $is_on_sat = 0;
            $total_sat_hour = '00:00:00';
            $sat_in = '00:00:00';
            $sat_hour = 0;  
        }



        // Flexy Time

        if($flexy_time > $morning_time){
            $is_on_flexy = 1;
            $flexy_time = $flexy_time;
        }else{
            $is_on_flexy = 0;
            $flexy_time = '00:00:00';
        }

        // Relaxation Time

        // if($relaxation_time > $morning_time){
        //     $is_on_relaxation = 1;
        //     $relaxation_time = $relaxation_time;
        // }else{
        //     $is_on_relaxation = 0;
        //     $relaxation_time = '00:00:00';
        // }

        // DAILY RELAXATION

        // relax in
        if(is_null($daily_relax_in)){
            $daily_relax_in =  0;
        }else{
            $daily_relax_in =  $daily_relax_in;
        }
        // relax out
        if(is_null($daily_relax_out)){
            $daily_relax_out =  0;
        }else{
            $daily_relax_out =  $daily_relax_out;
        }
        // monthly relax in
        if(is_null($monthly_relax_in)){
            $monthly_relax_in =  0;
        }else{
            $monthly_relax_in =  $monthly_relax_in;
        }
        // monthly relax out
        if(is_null($monthly_relax_out)){
            $monthly_relax_out =  0;
        }else{
            $monthly_relax_out =  $monthly_relax_out;
        }
        
        $data = array(
            'profile_id' => $profile_id,
            'is_on_mon' => $is_on_mon,
            'is_on_tue' => $is_on_tue,
            'is_on_wed' => $is_on_wed,
            'is_on_thu' => $is_on_thu,
            'is_on_fri' => $is_on_fri,
            'is_on_sat' => $is_on_sat,
            'is_on_sun' => $is_on_sun,
            'is_on_flexy' => $is_on_flexy,
            //'is_on_relaxation' => $is_on_relaxation,
            'mon_in' => $mon_in,
            'tue_in' => $tue_in,
            'wed_in' => $wed_in,
            'thu_in' => $thur_in,
            'fri_in' => $fri_in,
            'sat_in' => $sat_in,
            'sun_in' => $sun_in,
            'mon_out' => $mon_out,
            'tue_out' => $tue_out,
            'wed_out' => $wed_out,
            'thu_out' => $thur_out,
            'fri_out' => $fri_out,
            'sat_out' => $total_sat_hour,
            'sun_out' => '00:00:00',
            'avg_week_hrs' => $avg_hrs,
            'use_ext' => $use_ext,
            'ext_time' => $ext_time,
            'ext_frequency' => (int)$ext_frequency,
            'ext_july' => $july_start,
            'sat_hrs' => $sat_hour,
            'sat_off' => (int)$sat_off,
            'sat_working' => (int)$sat_on,
            'flexy_time' => $flexy_time,
            //'relaxation_time' => $relaxation_time,
            'daily_relax_in' => $daily_relax_in,
            'monthly_relax_in' => $monthly_relax_in,
            'daily_relax_out' => $daily_relax_out,
            'monthly_relax_out' => $monthly_relax_out,
            'standard_out' => $afternoon_time,
            'created' => time(),
            'created_by' => Sentinel::getUser()->id,
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id
        );

        $last_id =  DB::table('atif_gs_events.tt_profile_time')->insertGetId($data);

        echo $last_id;

    }


    /**********************************************************************
    * Insert Part Timer Profile
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   profile_id,mon_in,mon_out.
    * @output:  Last Inserted ID
    * Date:     Aug 30, 2017 (Wed)
    ***********************************************************************/

    function insertPartTimerProfile(Request $request){

        $profile_id = $request->input('profile_id');
        $mon_in = $request->input('mon_in');
        $mon_out = $request->input('mon_out');
        $tue_in = $request->input('tue_in');
        $tue_out = $request->input('tue_out');
        $wed_in = $request->input('wed_in');
        $wed_out = $request->input('wed_out');
        $thu_in = $request->input('thu_in');
        $thu_out = $request->input('thu_out');
        $fri_in = $request->input('fri_in');
        $fri_out = $request->input('fri_out');
        $sat_in = $request->input('sat_in');
        $sat_out = $request->input('sat_out');
        $avg_weekly = $request->input('avg_weekly');




        // MON  Timing
        if($mon_in == null || $mon_out == null){
            $is_on_mon = 0;
            $mon_in = '00:00:00';
            $mon_out = '00:00:00';
        }else{
            $is_on_mon = 1;
        }


        // Tuesday out

        if($tue_in == null || $tue_out == null){
            $is_on_tue = 0;
            $tue_in = '00:00:00';
            $tue_out = '00:00:00';
        }else{
            $is_on_tue = 1;
        }


        // Wednesday out

        if($wed_in == null || $wed_out == null){
            $is_on_wed = 0;
            $wed_in = '00:00:00';
            $wed_out = '00:00:00';
        }else{
            $is_on_wed = 1;
        }

        // Thursday Out

        if($thu_in == null || $thu_out == null){
            $is_on_thu = 0;
            $thu_in = '00:00:00';
            $thu_out = '00:00:00';
        }else{
            $is_on_thu = 1;
        }

        // Friday Out

        if($fri_in == null || $fri_out == null){
            $is_on_fri = 0;
            $fri_in = '00:00:00';
            $fri_out = '00:00:00';
        }else{
            $is_on_fri = 1;
        }

        // Saturday Out

        if($sat_in == null || $sat_out == null){
            $is_on_sat = 0;
            $sat_in = '00:00:00';
            $sat_out = '00:00:00';
        }else{
            $is_on_sat = 1;
        }

        $sun_in = '00:00';
        $sun_out = '00:00';
        $july_start = '';


        $data = array(
            'profile_id' =>$profile_id,
            'is_on_mon' => $is_on_mon,
            'is_on_tue' => $is_on_tue,
            'is_on_wed' => $is_on_wed,
            'is_on_thu' => $is_on_thu,
            'is_on_fri' => $is_on_fri,
            'is_on_sat' => $is_on_sat,
            'is_on_sun' => 0,
            'mon_in' =>  date("H:i", strtotime($mon_in)),
            'tue_in' =>  date("H:i", strtotime($tue_in)),
            'wed_in' =>  date("H:i", strtotime($wed_in)),
            'thu_in' =>  date("H:i", strtotime($thu_in)),
            'fri_in' =>  date("H:i", strtotime($fri_in)),
            'sat_in' =>  date("H:i", strtotime($sat_in)),
            'sun_in' => $sun_in,
            'mon_out' => date("H:i", strtotime($mon_out)),
            'tue_out' => date("H:i", strtotime($tue_out)),
            'wed_out' => date("H:i", strtotime($wed_out)),
            'thu_out' => date("H:i", strtotime($thu_out)),
            'fri_out' => date("H:i", strtotime($fri_out)),
            'sat_out' => date("H:i", strtotime($sat_out)),
            'sun_out' => $sun_out,
            'avg_week_hrs' => $avg_weekly,
            'use_ext' => 0,
            'ext_time' => '00:00:00',
            'ext_frequency' => 0,
            'ext_july' => date('Y-m-d',strtotime($july_start)),
            'sat_hrs' => 0,
            'sat_off' => 0,
            'sat_working' => 0,
            'created' => time(),
            'created_by' => Sentinel::getUser()->id,
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id

        );


        $last_id = DB::table('atif_gs_events.tt_profile_time')->insertGetId($data);


    }


    /**********************************************************************
    * Profile Description
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   profile_id
    * @output:  profile_detail
    * Date:     Aug 30, 2017 (Wed)
    ***********************************************************************/

    public function profile_description(Request $request){
        $profile_id =  $request->input('profile_id');

        $staffDefination_profile_desc =  DB::table('atif_gs_events.tt_profile_time')->where('profile_id', $profile_id)->get();
        echo json_encode($staffDefination_profile_desc);
    }


    /**********************************************************************
    * Profile Updation
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   profile_id,profile_name
    * @output:  profile_detail
    * Date:     Sep 05, 2017 (Tue)
    ***********************************************************************/


    public function updateProfile(Request $request){
        $profile_id = $request->input('profile_id');
        $profile_type_id = $request->input('profile_type_id');
        $profile_name = $request->input('profile_name');

        $where = array(
            'id' => $profile_id
        );

        $data= array(
            'name' => $profile_name,
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id
        );

        $affected_row = DB::table('atif_gs_events.tt_profile')->where($where)->update($data);
        echo $affected_row;
    }

    /**********************************************************************
    * Standard Profile Updation
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   profile_id,morning_time,evening_time,
    * @output:  
    * Date:     Sep 05, 2017 (Tue)
    ***********************************************************************/


    public function updateStandardProfile(Request $request){

        $profile_id = $request->input('profile_id');
        $morning_time = $request->input('morning_time');
        $afternoon_time = $request->input('afternoon_time');
        $mon_time_out = $request->input('mon_time_out');
        $tue_time_out = $request->input('tue_time_out');
        $wed_time_out = $request->input('wed_time_out');
        $thus_time_out = $request->input('thus_time_out');
        $fri_time_out = $request->input('fri_time_out');
        $ext_time = $request->input('ext_time');
        $ext_frequency = $request->input('ext_frequency');
        $july_start = $request->input('july_start');
        $sat_hour = $request->input('sat_hour');
        $sat_off = $request->input('sat_off');
        $sat_on  = $request->input('sat_on');
        $avg_hrs = $request->input('avg_hrs');
        $flexy_time = $request->input('flexy_time');
        //$relaxation_time = $request->input('relaxtion_time');

        $daily_relax_in = $request->input('daily_relax_in');
        $daily_relax_out = $request->input('daily_relax_out');
        $monthly_relax_in = $request->input('monthly_relax_in');
        $monthly_relax_out = $request->input('monthly_relax_out');

        $where_timing_update = array(
            'profile_id' => $profile_id
        );

        // if($morning_time != '' && $afternoon_time != ''){
        //     $is_on_mon = 1;
        //     $is_on_tue = 1;
        //     $is_on_wed = 1;
        //     $is_on_thu = 1;
        //     $is_on_fri = 1;
        //     //$is_on_sat = 1;
        //     $is_on_sun = 0;
        // }else{

        //     $is_on_mon = 0;
        //     $is_on_tue = 0;
        //     $is_on_wed = 0;
        //     $is_on_thu = 0;
        //     $is_on_fri = 0;
        //     //$is_on_sat = 0;
        //     $is_on_sun = 0;

        // }


        // IS on Flag Morning And Afternoon
        
        $is_on_mon = $this->get_on_off_flag($morning_time,$mon_time_out);
        $is_on_tue = $this->get_on_off_flag($morning_time,$tue_time_out);
        $is_on_wed = $this->get_on_off_flag($morning_time,$wed_time_out);
        $is_on_thu = $this->get_on_off_flag($morning_time,$thus_time_out);
        $is_on_fri = $this->get_on_off_flag($morning_time,$fri_time_out);
        $is_on_sun = 0;
   

        // Set date in week day

        if($is_on_mon == 1){
            $mon_in = $morning_time;
            $mon_out = $mon_time_out;
        }else{
            $mon_in = '00:00:00';
            $mon_out = '00:00:00';
        }

        if($is_on_tue == 1){
            $tue_in = $morning_time;
            $tue_out = $tue_time_out;
        }else{
            $tue_in = '00:00:00';
            $tue_out = '00:00:00';
        }

        if($is_on_wed == 1){
            $wed_in = $morning_time;
            $wed_out = $wed_time_out;
        }else{
            $wed_in= '00:00:00';
            $wed_out = '00:00:00';
        }

        if($is_on_thu == 1){
            $thur_in = $morning_time;
            $thur_out = $thus_time_out;
        }else{
            $thur_in= '00:00:00';
            $thur_out = '00:00:00';
        }

        if($is_on_fri == 1){
            $fri_in = $morning_time;
            $fri_out = $fri_time_out;
        }else{
            $fri_in= '00:00:00';
            $fri_out = '00:00:00';
        }

        if($is_on_sun == 1){
            $sun_in= '00:00:00';
            $sun_out = '00:00:00';
        }else{
            $sun_in= '00:00:00';
            $sun_out = '00:00:00';
        }

        if($july_start == ''){
            $july_start = date('Y-m-d',strtotime($july_start));
        }

        // Sat Hours Calculating

        if($sat_hour != '' && ($sat_off != '' || $sat_on != '')){
            $is_on_sat = 1;
            $sign = ($sat_hour < 0 ? "-" : "");
            $absMinutes = abs($sat_hour) * 60;        
            $hh = floor($absMinutes / 60);
            $mm = $absMinutes % 60;
            $saturday_calculated_hour = $sign . $hh . ":" . str_pad($mm, 2, "0", STR_PAD_LEFT);

            $hour_one = $morning_time ;
            $hour_two = $saturday_calculated_hour;
            $h =  strtotime($hour_one);
            $h2 = strtotime($hour_two);

            $minute = date("i", $h2);
            $second = date("s", $h2);
            $hour = date("H", $h2);


            $convert = strtotime("+$minute minutes", $h);
            $convert = strtotime("+$second seconds", $convert);
            $convert = strtotime("+$hour hours", $convert);
            $total_sat_hour = date('H:i:s', $convert);
            $sat_in = $morning_time;

        }else{
            $is_on_sat = 0;
            $total_sat_hour = '00:00:00';
            $sat_in = '00:00:00';
            $sat_hour = 0;  
        }

        // Is On Flag on EXT Time

        if($ext_time != ''){
            $use_ext = 1;
        }else{
            $use_ext = 0;
        }

        // Flexy Time

        if($flexy_time > $morning_time){
            $is_on_flexy = 1;
            $flexy_time = $flexy_time;
        }else{
            $is_on_flexy = 0;
            $flexy_time = '00:00:00';
        }

        // Relaxation Time

        // if($relaxation_time > $morning_time){
        //     $is_on_relaxation = 1;
        //     $relaxation_time = $relaxation_time;
        // }else{
        //     $is_on_relaxation = 0;
        //     $relaxation_time = '00:00:00';
        // }

        // DAILY RELAXATION

        // relax in
        if(is_null($daily_relax_in)){
            $daily_relax_in =  0;
        }else{
            $daily_relax_in =  $daily_relax_in;
        }
        // relax out
        if(is_null($daily_relax_out)){
            $daily_relax_out =  0;
        }else{
            $daily_relax_out =  $daily_relax_out;
        }
        // monthly relax in
        if(is_null($monthly_relax_in)){
            $monthly_relax_in =  0;
        }else{
            $monthly_relax_in =  $monthly_relax_in;
        }
        // monthly relax out
        if(is_null($monthly_relax_out)){
            $monthly_relax_out =  0;
        }else{
            $monthly_relax_out =  $monthly_relax_out;
        }



        $data_time_update = array(
            'is_on_mon' => $is_on_mon,
            'is_on_tue' => $is_on_tue,
            'is_on_wed' => $is_on_wed,
            'is_on_thu' => $is_on_thu,
            'is_on_fri' => $is_on_fri,
            'is_on_sat' => $is_on_sat,
            'is_on_sun' => $is_on_sun,
            'is_on_flexy' => $is_on_flexy,
            'mon_in' => $morning_time,
            'tue_in' => $morning_time,
            'wed_in' => $morning_time,
            'thu_in' => $morning_time,
            'fri_in' => $morning_time,
            'sat_in' => $sat_in,
            'sun_in' => '00:00',
            'standard_out' => $afternoon_time,
            'mon_out' => $mon_time_out,
            'tue_out' => $tue_time_out,
            'wed_out' => $wed_time_out,
            'thu_out' => $thus_time_out,
            'fri_out' => $fri_time_out,
            'sat_out' => $total_sat_hour,
            'sun_out' => '00:00',
            'avg_week_hrs' => $avg_hrs,
            'use_ext' => $use_ext,
            'ext_time' => $ext_time,
            'ext_frequency' => (int)$ext_frequency,
            'ext_july' => $july_start,
            'sat_hrs' => $sat_hour,
            'sat_off' => (int)$sat_off,
            'sat_working' => (int)$sat_on,
            'flexy_time' => $flexy_time,
            //'relaxation_time' => $relaxation_time,
            'daily_relax_in' => $daily_relax_in,
            'monthly_relax_in' => $monthly_relax_in,
            'daily_relax_out' => $daily_relax_out,
            'monthly_relax_out' => $monthly_relax_out,
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id
        );


        $affected_row = DB::table('atif_gs_events.tt_profile_time')->where($where_timing_update)->update($data_time_update);
        
        // UPDATE TT PROFILE TIME STAFF
        $where_ttprofile = array(
            'profile_id' => $profile_id
        );

        $ttProfile = DB::table('atif_gs_events.tt_profile_time_staff')->where($where_ttprofile)->get();

        if(count($ttProfile) != 0){
            $affected_row = DB::table('atif_gs_events.tt_profile_time_staff')->where($where_timing_update)->update($data_time_update);
        }




    }


    /**********************************************************************
    * Custom Profile Updation
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   profile_id,morning_time,evening_time,
    * @output:  
    * Date:     Sep 05, 2017 (Tue)
    ***********************************************************************/

    public function updateCustomProfile(Request $request){



        $profile_id = $request->input('profile_id');
        $morning_time = $request->input('morning_time');
        $afternoon_time = $request->input('afternoon_time');
        
        $mon_time_out = $request->input('mon_time');
        $tue_time_out = $request->input('tue_time');
        $wed_time_out = $request->input('wed_time');
        $thus_time_out = $request->input('thus_time');
        $fri_time_out = $request->input('fri_time');

        $ext_time = $request->input('ext_time');
        $ext_frequency = $request->input('ext_frequency');
        $july_start = $request->input('july_start');
        $sat_hour = $request->input('sat_hour');
        $sat_off = $request->input('sat_off');
        $sat_on  = $request->input('sat_on');
        $avg_hrs = $request->input('avg_hrs');
        $flexy_time = $request->input('flexy_time');
        //$relaxation_time = $request->input('relaxtion_time');
        $daily_relax_in = $request->input('daily_relax_in');
        $daily_relax_out = $request->input('daily_relax_out');
        $monthly_relax_in = $request->input('monthly_relax_in');
        $monthly_relax_out = $request->input('monthly_relax_out');


      $where_timing_update = array(
            'profile_id' => $profile_id
        );

        // if($morning_time != '' && $afternoon_time != ''){
        //     $is_on_mon = 1;
        //     $is_on_tue = 1;
        //     $is_on_wed = 1;
        //     $is_on_thu = 1;
        //     $is_on_fri = 1;
        //     //$is_on_sat = 1;
        //     $is_on_sun = 0;
        // }else{

        //     $is_on_mon = 0;
        //     $is_on_tue = 0;
        //     $is_on_wed = 0;
        //     $is_on_thu = 0;
        //     $is_on_fri = 0;
        //     //$is_on_sat = 0;
        //     $is_on_sun = 0;

        // }


        // IS on Flag Morning And Afternoon
        
        $is_on_mon = $this->get_on_off_flag($morning_time,$mon_time_out);
        $is_on_tue = $this->get_on_off_flag($morning_time,$tue_time_out);
        $is_on_wed = $this->get_on_off_flag($morning_time,$wed_time_out);
        $is_on_thu = $this->get_on_off_flag($morning_time,$thus_time_out);
        $is_on_fri = $this->get_on_off_flag($morning_time,$fri_time_out);
        $is_on_sun = 0;
   

        // Set date in week day

        if($is_on_mon == 1){
            $mon_in = $morning_time;
            $mon_out = $mon_time_out;
        }else{
            $mon_in = '00:00:00';
            $mon_out = '00:00:00';
        }

        if($is_on_tue == 1){
            $tue_in = $morning_time;
            $tue_out = $tue_time_out;
        }else{
            $tue_in = '00:00:00';
            $tue_out = '00:00:00';
        }

        if($is_on_wed == 1){
            $wed_in = $morning_time;
            $wed_out = $wed_time_out;
        }else{
            $wed_in= '00:00:00';
            $wed_out = '00:00:00';
        }

        if($is_on_thu == 1){
            $thur_in = $morning_time;
            $thur_out = $thus_time_out;
        }else{
            $thur_in= '00:00:00';
            $thur_out = '00:00:00';
        }

        if($is_on_fri == 1){
            $fri_in = $morning_time;
            $fri_out = $fri_time_out;
        }else{
            $fri_in= '00:00:00';
            $fri_out = '00:00:00';
        }

        if($is_on_sun == 1){
            $sun_in= '00:00:00';
            $sun_out = '00:00:00';
        }else{
            $sun_in= '00:00:00';
            $sun_out = '00:00:00';
        }

        if($july_start == ''){
            $july_start = date('Y-m-d',strtotime($july_start));
        }

        // Sat Hours Calculating

        if($sat_hour != '' && ($sat_off != '' || $sat_on != '')){
            $is_on_sat = 1;
            $sign = ($sat_hour < 0 ? "-" : "");
            $absMinutes = abs($sat_hour) * 60;        
            $hh = floor($absMinutes / 60);
            $mm = $absMinutes % 60;
            $saturday_calculated_hour = $sign . $hh . ":" . str_pad($mm, 2, "0", STR_PAD_LEFT);

            $hour_one = $morning_time ;
            $hour_two = $saturday_calculated_hour;
            $h =  strtotime($hour_one);
            $h2 = strtotime($hour_two);

            $minute = date("i", $h2);
            $second = date("s", $h2);
            $hour = date("H", $h2);


            $convert = strtotime("+$minute minutes", $h);
            $convert = strtotime("+$second seconds", $convert);
            $convert = strtotime("+$hour hours", $convert);
            $total_sat_hour = date('H:i:s', $convert);
            $sat_in = $morning_time;

        }else{
            $is_on_sat = 0;
            $total_sat_hour = '00:00:00';
            $sat_in = '00:00:00';
            $sat_hour = 0;  
        }

        // Is On Flag on EXT Time

        if($ext_time != ''){
            $use_ext = 1;
        }else{
            $use_ext = 0;
        }

        // Flexy Time

        if($flexy_time > $morning_time){
            $is_on_flexy = 1;
            $flexy_time = $flexy_time;
        }else{
            $is_on_flexy = 0;
            $flexy_time = '00:00:00';
        }

        // Relaxation Time

        // if($relaxation_time > $morning_time){
        //     $is_on_relaxation = 1;
        //     $relaxation_time = $relaxation_time;
        // }else{
        //     $is_on_relaxation = 0;
        //     $relaxation_time = '00:00:00';
        // }

        // DAILY RELAXATION

        // relax in
        if(is_null($daily_relax_in)){
            $daily_relax_in =  0;
        }else{
            $daily_relax_in =  $daily_relax_in;
        }
        // relax out
        if(is_null($daily_relax_out)){
            $daily_relax_out =  0;
        }else{
            $daily_relax_out =  $daily_relax_out;
        }
        // monthly relax in
        if(is_null($monthly_relax_in)){
            $monthly_relax_in =  0;
        }else{
            $monthly_relax_in =  $monthly_relax_in;
        }
        // monthly relax out
        if(is_null($monthly_relax_out)){
            $monthly_relax_out =  0;
        }else{
            $monthly_relax_out =  $monthly_relax_out;
        }



        $data_time_update = array(
            'is_on_mon' => $is_on_mon,
            'is_on_tue' => $is_on_tue,
            'is_on_wed' => $is_on_wed,
            'is_on_thu' => $is_on_thu,
            'is_on_fri' => $is_on_fri,
            'is_on_sat' => $is_on_sat,
            'is_on_sun' => $is_on_sun,
            'is_on_flexy' => $is_on_flexy,
            'mon_in' => $morning_time,
            'tue_in' => $morning_time,
            'wed_in' => $morning_time,
            'thu_in' => $morning_time,
            'fri_in' => $morning_time,
            'sat_in' => $sat_in,
            'sun_in' => '00:00',
            'standard_out' => $afternoon_time,
            'mon_out' => $mon_time_out,
            'tue_out' => $tue_time_out,
            'wed_out' => $wed_time_out,
            'thu_out' => $thus_time_out,
            'fri_out' => $fri_time_out,
            'sat_out' => $total_sat_hour,
            'sun_out' => '00:00',
            'avg_week_hrs' => $avg_hrs,
            'use_ext' => $use_ext,
            'ext_time' => $ext_time,
            'ext_frequency' => (int)$ext_frequency,
            'ext_july' => $july_start,
            'sat_hrs' => $sat_hour,
            'sat_off' => (int)$sat_off,
            'sat_working' => (int)$sat_on,
            'flexy_time' => $flexy_time,
            //'relaxation_time' => $relaxation_time,
            'daily_relax_in' => $daily_relax_in,
            'monthly_relax_in' => $monthly_relax_in,
            'daily_relax_out' => $daily_relax_out,
            'monthly_relax_out' => $monthly_relax_out,
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id
        );


        $affected_row = DB::table('atif_gs_events.tt_profile_time')->where($where_timing_update)->update($data_time_update);
        
        // UPDATE TT PROFILE TIME STAFF
        $where_ttprofile = array(
            'profile_id' => $profile_id
        );

        $ttProfile = DB::table('atif_gs_events.tt_profile_time_staff')->where($where_ttprofile)->get();

        if(count($ttProfile) != 0){
            $affected_row = DB::table('atif_gs_events.tt_profile_time_staff')->where($where_timing_update)->update($data_time_update);
        }
    }

    /**********************************************************************
    * Part Timer Profile Updation
    * Author:   Rohail Aslam, r.aslam@generations.edu.pk, +92-340-2133372 
    * @input:   profile_id,mon_in,mon_out,tue_in,tue_out
    * @output:  Update Part Timer
    * Date:     Sep 06, 2017 (Wed)
    ***********************************************************************/

    public function updatePartTimerProfile(Request $request){

        $profile_id = $request->input('profile_id');
        $mon_in = $request->input('mon_in');
        $mon_out = $request->input('mon_out');
        $tue_in = $request->input('tue_in');
        $tue_out = $request->input('tue_out');
        $wed_in = $request->input('wed_in');
        $wed_out = $request->input('wed_out');
        $thu_in = $request->input('thu_in');
        $thu_out = $request->input('thu_out');
        $fri_in = $request->input('fri_in');
        $fri_out = $request->input('fri_out');
        $sat_in = $request->input('sat_in');
        $sat_out = $request->input('sat_out');
        $avg_hrs = $request->input('part_time_avg');

        // var_dump($fri_in);
        // var_dump($fri_out);
        // exit;




        // MON  Timing
        if($mon_in == null || $mon_out == null){
            $is_on_mon = 0;
            $mon_in = '00:00:00';
            $mon_out = '00:00:00';
        }else{
            $is_on_mon = 1;
        }


        // Tuesday out

        if($tue_in == null || $tue_out == null){
            $is_on_tue = 0;
            $tue_in = '00:00:00';
            $tue_out = '00:00:00';
        }else{
            $is_on_tue = 1;
        }


        // Wednesday out

        if($wed_in == null || $wed_out == null){
            $is_on_wed = 0;
            $wed_in = '00:00:00';
            $wed_out = '00:00:00';
        }else{
            $is_on_wed = 1;
        }

        // Thursday Out

        if($thu_in == null || $thu_out == null){
            $is_on_thu = 0;
            $thu_in = '00:00:00';
            $thu_out = '00:00:00';
        }else{
            $is_on_thu = 1;
        }

        // Friday Out

        if($fri_in == null || $fri_out == null){
            $is_on_fri = 0;
            $fri_in = '00:00:00';
            $fri_out = '00:00:00';
        }else{
            
            $is_on_fri = 1;
        }

        // Saturday Out

        if($sat_in == null || $sat_out == null){
            $is_on_sat = 0;
            $sat_in = '00:00:00';
            $sat_out = '00:00:00';
        }else{
            $is_on_sat = 1;
        }

        $where_timing_update = array(
            'profile_id' => $profile_id
        );

        $data_time_update = array(
            'profile_id' => $profile_id,
            'is_on_mon' => $is_on_mon,
            'is_on_tue' => $is_on_tue,
            'is_on_wed' => $is_on_wed,
            'is_on_thu' => $is_on_thu,
            'is_on_fri' => $is_on_fri,
            'is_on_sat' => $is_on_sat,
            'is_on_sun' => 0,
            'mon_in' => date("H:i", strtotime($mon_in)),
            'tue_in' => date("H:i", strtotime($tue_in)),
            'wed_in' => date("H:i", strtotime($wed_in)),
            'thu_in' => date("H:i", strtotime($thu_in)),
            'fri_in' => date("H:i", strtotime($fri_in)),
            'sat_in' => date("H:i", strtotime($sat_in)),
            'mon_out' => date("H:i", strtotime($mon_out)),
            'tue_out' => date("H:i", strtotime($tue_out)),
            'wed_out' => date("H:i", strtotime($wed_out)),
            'thu_out' => date("H:i", strtotime($thu_out)),
            'fri_out' => date("H:i", strtotime($fri_out)),
            'sat_out' => date("H:i", strtotime($sat_out)),
            'avg_week_hrs' => $avg_hrs,
            'created' => time(),
            'created_by' => Sentinel::getUser()->id,
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id

        );




        $affected_row = DB::table('atif_gs_events.tt_profile_time')->where($where_timing_update)->update($data_time_update);
        echo $affected_row;
    }

    public function staffProfileAllocated(){
        $staffInfo = new StaffInformationModel();
        /***** Profile Allocated To Staff *****/
        $profile_allocated = $staffInfo->profile_allocated();
        echo json_encode($profile_allocated);
    }

    /*
    * Set Daily Attendance Report
    *
    */
    public function setDailyAttendanceReport($staff_id,$profile_id){
        $staffInfo = new StaffInformationModel();
            /***** GET YESTERDAY DATE *****/
        $yesterdayDate = $staffInfo->getYesterdayDate($staff_id);
        if(is_null($yesterdayDate[0]->yesterdayDate)){
            /************ If Yesterday Date Not Found *****************/
            $yesterday = strtotime(date('w') == 0 ? 'last saturday' : 'yesterday');
            $yesterday = date('Y-m-d', $yesterday);
            $staffInfo->insertDailyRecord($yesterday,$staff_id);
        }else{
            $leaveCompensation = $staffInfo->getRemaingLeave($yesterdayDate[0]->yesterdayDate,$staff_id);
            $leaveBalance = $leaveCompensation[0]->leave_balance;
            $leaveRemaining = $leaveCompensation[0]->remaining_leave;
            
            /********* If Yesterday Date found ***********************/
            $staffInfo->updateDailyRecord($yesterdayDate[0]->yesterdayDate,$staff_id,$leaveBalance,$leaveRemaining);
        }

    }

    public function get_on_off_flag($morning_time,$day_time){
        
        // IS on Flag Morning And Afternoon
        $flag = 0;
        if($morning_time != '' && $day_time != ''){
            $flag = 1;
        }else{
            $flag = 0;
        }

        return $flag;

    }


}
