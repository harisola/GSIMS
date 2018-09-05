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
use App\Models\Report\ReportStaffModel;

class StaffReportController extends Controller {
    public $buffer =0;
    public function attendanceReport(Request $request){
        
        $report = new ReportStaffModel();
        $yesterday_date = date("Y-m-d");  //"2017-10-23";
        echo $yesterday_date;
        //Check for holiday
        $flag = $this->checkHoliday($yesterday_date, $report);
        
        //if no holiday then run the report
        if(!$flag){
            
            $data = $report->generateReport($yesterday_date);
            $this->generateAttendanceReport($data, $yesterday_date, 'insert');
            $this->leaveReport();
        }

    }

    public function checkHoliday($date, $model){
       
        $holidaysData = $model->getStaffHolidays();
        $holidays  = [];
        foreach ($holidaysData as $key => $value) {
            array_push($holidays, $value->calendar_ID);
        }

        return in_array($date,$holidays);
    }
    public function leaveReport(){
       
        $report = new ReportStaffModel();
        $yesterday_date = date("Y-m-d"); // "2017-10-23"; 
         
        //Check for holiday
        $flag = $this->checkHoliday($yesterday_date, $report);
        //if no holiday then run the report
        if(!$flag){
            $data = $report->getAttendanceReportData($yesterday_date);
            $this->generateLeaveReport($yesterday_date, $data);
        }
    }
    
    public function generateLeaveReport($yesterday_date, $data){

        $leaves = 0;
        $deduction = 0;
        $sat_on = 1;
        $report = new ReportStaffModel();
        
        for($i=0; $i< count($data); $i++ ){
            
            //Get USer Yearly leaves by staff_id
            $leavesData = $report->getStaffLeaves($data[$i]->staff_id);

            //Get Staff Approved leaves using staff id and date
            $ApprovedLeavesData = $report->getStaffApprovedLeaves($data[$i]->staff_id, $yesterday_date);

            //Assign Remaining leaves to staff get from daily report
            $leaves = $data[$i]->remaining_leave;

            //If there is no record exists in the daily report table then assign his original leaves. 
            if($leaves === null ){
               
                $leaves = $leavesData[0]->total_leaves; 
            }

            $factor = $data[$i]->daily_factor;
            $paid_percentage = 0;

            //Assign if there any paid compensation percentage exists else zero already assigned
            if(!empty($ApprovedLeavesData[0]->paid_percentage)){
                $paid_percentage = $ApprovedLeavesData[0]->paid_percentage;
            }

            $deductionData = $this->getDeduction($yesterday_date, $factor, $paid_percentage, $leaves, $data[$i]->type, $sat_on);

            $leaves = $deductionData['leaves'];
            $deduction = $deductionData['deduction'];
           /* //if User already used his saturday leaves 
            if( !empty($data[$i]->saturday_remaining) ){
                $leaves = $data[$i]->saturday_remaining;
            }*/

        /*//Reset Saturday counter for type Admin as new month is started 
            if(!empty($data[$i]->backDate) && date("m", strtotime($data[$i]->backDate)) < date("m", strtotime($data[$i]->date)) ){
                echo "Reset Saturday";
            }*/


            //
       
            // Update Leaves of every staff
            $where = array(
                'id' => $data[$i]->staff_id
            ); 
            $record_table2 = array(
                'leave_balance' => $leaves
            );  

               
            $this->updateReport('atif.staff_registered',$where,$record_table2);            

            $where = array(
                        'id' => $data[$i]->id   
                    );
            $record_table1 = array(
                        'remaining_leave'=> $leaves,
                        'deduction' => $deduction
                    );

            $this->updateReport('atif_gs_events.daily_attendance_report',$where,$record_table1);
           
        }
    }
    public function getDeduction($date, $factor, $paid_percentage, $leaves, $type, $sat_on){
            $deduction = 0;
            //Get Day Name from date
            $day = date('l', strtotime($date));
            //Formula to get final factor for deduction
            $factor = ( $paid_percentage / 100 ) + ($factor);
            //Deduction is only done if value is less than zero 
            if( $factor < 0 ){

                //Saturday check
                if( $day == 'Saturday' ){
                    //If Saturday and type is Faculty
                    if($type == 'Faculty' && $sat_on == 1){

                        $deduction = 2 * $factor;
                    } else {
                        $deduction = 1 * $factor;
                    } 
                } else {
                    $deduction = 1 * $factor;
                }

                echo $leaves = $leaves + $deduction;              
            } else {
                echo "100% paid";
            }
            $data = array(
                'leaves' => $leaves,
                'deduction' => $deduction
                );

            return $data;
    }
    public function generateAttendanceReport ($data , $yesterday_date, $flag){
        $report = new ReportStaffModel();
        $utilize_buffer = 0;
        $remaining_buffer = 0;
        $utilize_buffer_out = 0;
        $remaining_buffer_out = 0;  
        $factor = 0;
        $compliance_one = 0;
        $compliance_two = 0;
        $manual_flag = 0;

        for($i=0; $i< count($data); $i++ ){
           
            //Check Weekly TimeSheet TapIn and Weekly TimeSheet TapOut should not be empty

            if(!empty($data[$i]->Weekly_TimeSheet_TapIN) && !empty($data[$i]->Weekly_TimeSheet_TapOut) ){
                
                $data[$i]->Weekly_TimeSheet_TapIN = date( "h:i:s", strtotime($data[$i]->Weekly_TimeSheet_TapIN) + 60);
                //Check If Actual Tap In and Actual Tap Out not found 
                if(empty($data[$i]->Actual_TapIn) && empty($data[$i]->Actual_TapOut )){
                    
                    $absentia = $report->getStaffAbsentia($data[$i]->staff_id,$yesterday_date);

                    //Check If user record exists in absentia or not Because Actual tap and out not found.
                    if( !empty($absentia[0]->Absentia_TapIn) && !empty($absentia[0]->Absentia_TapOut) ){

                        echo $data[$i]->Name." Absentia <br>";

                        $data[$i]->Absentia_Tap_Out = $absentia[0]->Absentia_TapOut;
                        $data[$i]->Absentia_Tap_In = $absentia[0]->Absentia_TapIn;

                        $remaining_buffer = $data[$i]->Monthly_Buffer;
                        $utilize_buffer = $data[$i]->Daily_Buffer;

                        $totalMin = $this->getMinutes($data[$i]->Weekly_TimeSheet_TapIN, $data[$i]->Weekly_TimeSheet_TapOut);
                        $workedMin = $this->WorkingMin($data[$i]->Weekly_TimeSheet_TapIN,$data[$i]->Weekly_TimeSheet_TapOut,$absentia[0]->Absentia_TapIn,$absentia[0]->Absentia_TapOut, null, null, $data[$i]->staff_id,$yesterday_date);
                            //Working Hours is equal as per weekly timesheet 
                            if($workedMin == $totalMin){
                                $factor = 1;
                            } else {
                                $factor =  $this->ncafCalculation($totalMin, $workedMin);
                            }                       
                    } else {
                        $report = new ReportStaffModel();
                        $manual = $report->getStaffManualAttendance($data[$i]->staff_id,$yesterday_date);
                        //Check user record was inserted manually or not
                        if(!empty($manual[0]->Actual_TapIn) && !empty($manual[0]->Actual_TapOut) ){
                            $day = date('l', strtotime($yesterday_date));
                            if( $day == 'Saturday' ){
                                //Saturday Calculation
                                $ManualCal = $this->performSaturdayCalculation($manual[0], $yesterday_date, null);
                            
                            } else {
                                //Working Days Monday To Friday
                                $ManualCal =  $this->performCalculation($manual[0],$yesterday_date, null);

                            } 
                            
                            $factor = $ManualCal['factor'];
                            $utilize_buffer = $ManualCal['utilize_Buffer'];
                            $compliance_one = $ManualCal['compliance_one'];
                            $compliance_two = $ManualCal['compliance_two'];
                            $remaining_buffer = $ManualCal['remaining_buffer'];
                            $utilize_buffer_out = $ManualCal['utilize_buffer_out'];
                            $remaining_buffer_out = $ManualCal['remaining_buffer_out'];
                            $manual_flag = 1;

                        } else {
                            $reportData = $report->getStaffAbsent($data[$i]->staff_id, $yesterday_date);
                            
                            echo $data[$i]->Name." Absent  -1  <br>";
                            $factor = -1;
                            if(count($reportData) != 0){
                                $utilize_buffer = $reportData[0]->daily_buffer;
                                $remaining_buffer = $reportData[0]->remaining_buffer;
                            }

                        }
                        
                    }
                }
                //Actual Tap In found
                else if ( !empty($data[$i]->Actual_TapIn) ){
                    $manual = $report->getStaffManualAttendance($data[$i]->staff_id,$yesterday_date);                       
                    $day = date('l', strtotime($yesterday_date));
                    if( $day == 'Saturday' ){
                        $calData = $this->performSaturdayCalculation($data[$i], $yesterday_date);
                    } else {
                        //Working Days Monday To Friday
                        //$calData = $this->performCalculation($data[$i], $yesterday_date, $manual[0]);
                        $calData = $this->performCalculation($data[$i], $yesterday_date, null);

                    }  
                    $factor = $calData['factor'];
                    $utilize_buffer = $calData['utilize_Buffer'];
                    $remaining_buffer = $calData['remaining_buffer'];
                    $compliance_one = $calData['compliance_one'];
                    $compliance_two = $calData['compliance_two'];
                    $utilize_buffer_out = $calData['utilize_buffer_out'];
                    $remaining_buffer_out = $calData['remaining_buffer_out'];

                }


                if(empty($data[$i]->Absentia_Tap_In)){
                    $data[$i]->Absentia_Tap_In = '00:00:00';
                }
                if(empty($data[$i]->Absentia_Tap_Out)){
                    $data[$i]->Absentia_Tap_Out = '00:00:00';
                }

                // Actual Tapin
                if(empty($data[$i]->Actual_TapIn) && empty($manual[0]->Actual_TapIn)){
                    $data[$i]->Actual_TapIn = '00:00:00';
                } else if(!empty($manual[0]->Actual_TapIn)){
                     $data[$i]->Actual_TapIn = $manual[0]->Actual_TapIn;
                } 
                // Actual Tapout
                if(empty($data[$i]->Actual_TapOut) && empty($manual[0]->Actual_TapOut)){
                    $data[$i]->Actual_TapOut = '00:00:00';
                } else if(!empty($manual[0]->Actual_TapOut)){
                    $data[$i]->Actual_TapOut = $manual[0]->Actual_TapOut;
                } 

                if(empty($data[$i]->Utilize_Buffer)){

                    $data[$i]->Utilize_Buffer = 0;

                }
                //Get Previous Leaves
                $previousDayLeave = $report->getPreviousDayLeave($data[$i]->staff_id);
                $data[$i]->Actual_TapIn = explode(",",$data[$i]->Actual_TapIn);
                $data[$i]->Actual_TapOut = explode(",",$data[$i]->Actual_TapOut);

                 $record_table = array(
                'absentia_tap_in' =>  $data[$i]->Absentia_Tap_Out,
                'absentia_tap_out'=>  $data[$i]->Absentia_Tap_In,
                'actual_tap_in' =>  min($data[$i]->Actual_TapIn),
                'actual_tap_out' => max($data[$i]->Actual_TapOut),
                'remaining_buffer' => $remaining_buffer,
                'utlilize_buffer' =>  $utilize_buffer,
                'compliance_one' => $compliance_one,
                'compliance_two' => $compliance_two,
                'date' => $yesterday_date,
                'staff_id' => $data[$i]->staff_id,
                'daily_factor' => $factor,
                'deduction' => $factor,
                //'remaining_leave' =>  $previousDayLeave[0]->leaves,
                'remaining_buffer_out' => $remaining_buffer_out,
                'utilize_buffer_out' => $utilize_buffer_out                
                );

                if($flag == 'insert'){
                    $this->insertReport('atif_gs_events.daily_attendance_report',$record_table);
                } else {
                    // Update Section
                    $where = array(
                        'staff_id' => $data[$i]->staff_id,
                        'date' => $yesterday_date
                    );

                   $this->updateReport('atif_gs_events.daily_attendance_report',$where,$record_table);
                   $staffReportData = $report->getStaffLeavesAndFactor($data[$i]->staff_id, $yesterday_date);
 
                   foreach ($staffReportData as $key => $value) {
                        $factor = ($factor == 1) ? 0 : $factor; 

                        $updatedFactor = 1 - $factor;
                        $result = $value->remaining_leave + $updatedFactor;
                        $where = array(
                            'id' => $value->id
                        );
                        $UpdatedReportFactor =  array(
                            'remaining_leave' => $result
                        );
                        $this->updateReport('atif_gs_events.daily_attendance_report',$where,$UpdatedReportFactor);
                        if($key == 0){

                            $this->updateReport('atif.staff_registered',
                                array(
                                'id' => $data[$i]->staff_id),
                                array(
                                'leave_balance' => $result)
                            );            

                        }
                       
                   }

                }

 
            } else {
                //echo $data[$i]->Name." Weekly TimeSheet Tap In not Found <br>";
                
            }

           
      
        }        
    }
    public function performSaturdayCalculation($data, $yesterday_date){
        
        $data->Weekly_TimeSheet_TapIN = date( "h:i:s", strtotime($data->Weekly_TimeSheet_TapIN) - 60);
        $total_min = ($data->sat_hours) * 60;
        $buffer = $data->Daily_Buffer;
        $remaining_buffer = $data->Monthly_Buffer;
        $utilize_buffer_out = $data->Utilize_Buffer_out;
        $remaining_buffer_out = $data->Monthly_Buffer_Out - $data->Utilize_Buffer_out; 
        $factor = 0;
        $compliance_one = 0;
        $compliance_two = 0;
        $report = new ReportStaffModel();
        $manualActualTapOut = $report->getStaffManualTapOut( $data->staff_id,$yesterday_date);   
             
        if(empty(!$manualActualTapOut[0]->Actual_TapOut)){
            $data->Actual_TapOut = $manualActualTapOut[0]->Actual_TapOut;
        }
        if(!empty($data->Actual_TapOut)){
           
            //Check if a user already utilize the buffer. Get utilize buffer from the daily report table
            if(isset($data->Utilize_Buffer)){

                $buffer = $data->Utilize_Buffer;
                $remaining_buffer =  $data->Monthly_Buffer - $data->Utilize_Buffer;
 
            } 
            $actualTapIn = explode(",",$data->Actual_TapIn);
            $actualTapOut = explode(',', $data->Actual_TapOut);
            $outTime = $actualTapOut = max($actualTapOut);

            $actualTapIn = min($actualTapIn);

            if($actualTapOut > $data->Weekly_TimeSheet_TapOut){
                $outTime = $data->Weekly_TimeSheet_TapOut; 
            }
            
            echo "<br>";

            echo $workedMin = $this->WorkingMin($data->Weekly_TimeSheet_TapIN,$data->Weekly_TimeSheet_TapOut,$actualTapIn ,$actualTapOut, $data->Absentia_Tap_In, $data->Absentia_Tap_Out, $data->staff_id,$yesterday_date);

            if($workedMin >= $total_min){
                echo " ".$data->Name." Saturday hours completed <br>";
                $factor = 1;

            } else {

                echo " ".$data->Name." Saturday hours Incompleted <br>";
                $factor = $this->ncafCalculation($total_min, $workedMin );
            }
            

        } else {

            echo "actual tap out not found";

        }
        $calData['factor'] = $factor;
        $calData['utilize_Buffer'] = $buffer;
        $calData['remaining_buffer'] = $remaining_buffer;
        $calData['compliance_one'] = $compliance_one;
        $calData['compliance_two'] = $compliance_two;
        $calData['utilize_buffer_out'] =  $utilize_buffer_out ;
        $calData['remaining_buffer_out'] = $remaining_buffer_out;        
        return $calData;
    }

    public function checkOutBuffer($weekly_time_out, $tapout, $daily_buffer, $remaining_buffer, $utilize_Buffer){

        if(!is_array($tapout)){
            $tapout = explode(',', $tapout);
        }
        $buffer = $daily_buffer;
        $min = 60; 
        $data = array(
            'remaining_buffer' => $remaining_buffer,
            'utilize_Buffer' => $utilize_Buffer,
            'buffer' => 0,
            'compliance_two' => 1
        );

      
        if( strtotime(max($tapout)) >= ( strtotime($weekly_time_out) - (($buffer * 60 ) - $min) ) && strtotime(max($tapout)) <  strtotime($weekly_time_out)  ){
            echo "tap out not on time...... Buffer Utilized<br>";
            //calculate total minutes used by user 
            $buffer = $this->getMinutes( $weekly_time_out, min($tapout));

            //If user had 1 minute left in buffer and weekly time sheet time was 15:59:00 and user came at 7:30:27 so user had utilized its buffer Set Buffer = 1
            if($buffer == 0){
                $buffer = 1;
            }
            //Update remaining buffer - Remaining buffer
            $data['remaining_buffer']  = $remaining_buffer - $buffer;
            $data['utilize_Buffer'] = $buffer +  $utilize_Buffer;
            $data['buffer'] = $buffer;
            $data['compliance_two'] = 0;
        }

        return $data;

    }    
    public function performCalculation($data, $yesterday_date, $manual){
         
        //If Tapin data inserted manually so used manual tapin instead of actual tapin 
        if( !empty($manual->Actual_TapIn) ){
            $data->Actual_TapIn = $manual->Actual_TapIn;
        }

        //If Tapout data inserted manually so used manual tapout instead of actual Tapout 
        if( !empty($manual->Actual_TapOut) ){
            $data->Actual_TapOut = $manual->Actual_TapOut;
        }
        $actualTapIn = explode(",",$data->Actual_TapIn);
        $weeklyTimeSheetTapIn = $data->Weekly_TimeSheet_TapIN;
        $weeklyTimeSheetTapOut = $data->Weekly_TimeSheet_TapOut;
        $buffer = $data->Daily_Buffer;
        $remaining_buffer = $data->Monthly_Buffer;
        $buffer_out = $data->Daily_Buffer_Out;
        $remaining_buffer_out = $data->Monthly_Buffer_Out;
        $utilize_buffer_out = 0;        
        $factor = 0;
        $compliance_one = 1;
        $compliance_two = 1;
        $outBufferData =[];
        $bufferFlag = 0;
        //Check if a user already utilize the buffer. Get utilize buffer from the daily report table
        if(isset($data->Utilize_Buffer)){

            $buffer = $data->Monthly_Buffer - $data->Utilize_Buffer;
            $remaining_buffer =  $buffer;
            
            if( $buffer > $data->Daily_Buffer ){
                $buffer =  $data->Daily_Buffer;

            } 
        }
        //Check if a user already utilize the buffer. Get utilize buffer from the daily report table
        if(isset($data->Utilize_Buffer_out)){

            $utilize_buffer_out = $data->Utilize_Buffer_out;

            $buffer_out = $data->Monthly_Buffer_Out - $data->Utilize_Buffer_out;
            $remaining_buffer_out =  $buffer_out;
            
            if( $buffer_out > $data->Daily_Buffer_Out  ){
                $buffer_out =  $data->Daily_Buffer_Out ;

            } 
        } 

       //Check if user tapin ontime or before time as mention in weekly time sheet
        if( strtotime(min($actualTapIn)) <= strtotime($weeklyTimeSheetTapIn) ){
            //Mark it GREEN user is on time 

            echo $data->Name."tap in On time <br>";
            echo $totalMin = $this->getMinutes($weeklyTimeSheetTapIn, $weeklyTimeSheetTapOut);

            if(empty($data->Utilize_Buffer)){
                $buffer = 0;
            }
            
                 
            //User is using ON TIME add actual Tap out time if not found using factor of 0.1 
            if(empty($data->Actual_TapOut) ){
                echo "  TAP OUT NOT FOUND  ";
                $data->Actual_TapOut = $this->addActualTime( $weeklyTimeSheetTapOut, $totalMin, 0.05 );
            }
            if(!empty($data->Actual_TapOut)){

                $actualTapOut = explode(',', $data->Actual_TapOut);
                //Out Buffer check if user try to get out eariler
                $outBufferData = $this->checkOutBuffer($weeklyTimeSheetTapOut, $actualTapOut, $buffer_out,$remaining_buffer_out, $utilize_buffer_out);
                
                $compliance_two = $outBufferData['compliance_two']; 
            
                if(strtotime(max($actualTapOut)) < strtotime(max($actualTapIn)) ){
                    echo "  TAP OUT NOT FOUND  ";
                    $data->Actual_TapOut = $this->addActualTime( $weeklyTimeSheetTapOut, $totalMin, 0.05 );      
                }
            }
            echo $workedMin = $this->WorkingMin($weeklyTimeSheetTapIn,$weeklyTimeSheetTapOut,$data->Actual_TapIn,$data->Actual_TapOut, $data->Absentia_Tap_In, $data->Absentia_Tap_Out, $data->staff_id,$yesterday_date)+ $outBufferData['buffer'];

            //Working Hours is equal as per weekly timesheet 
            if($workedMin == $totalMin){
                
                $factor = 1;
            } else {
                $factor =  $this->ncafCalculation($totalMin, $workedMin );
            }
            echo "<br>";
     
            //Check if user tapin ontime or before time as mention in daily remaining buffer
        } else if( strtotime(min($actualTapIn)) <= ( strtotime($weeklyTimeSheetTapIn) + $buffer * 60 ) ) {

            echo "In buffer";
            $bufferFlag = 1;
            echo $totalMin = $this->getMinutes($weeklyTimeSheetTapIn, $weeklyTimeSheetTapOut);
            //calculate total minutes used by user 
            $buffer = $this->getMinutes( $weeklyTimeSheetTapIn, min($actualTapIn));
            //If user had 1 minute left in buffer and weekly time sheet time was 7:30:00 and user came at 7:30:27 so user had utilized its buffer Set Buffer = 1
            if($buffer == 0){
                $buffer = 1;
            }

            //Update remaining buffer - Remaining buffer
            $remaining_buffer  = $remaining_buffer - $buffer;
            $buffer = $buffer +  $data->Utilize_Buffer;


           
            //User is using BUFFER add actual Tap out time if not found using factor of 0.1 
            if(empty($data->Actual_TapOut)){
                echo "  TAP OUT NOT FOUND  ";
                $data->Actual_TapOut = $this->addActualTime( $weeklyTimeSheetTapOut, $totalMin, 0.05 );
            }

            //Out Buffer check if user try to get out eariler
            $outBufferData = $this->checkOutBuffer($weeklyTimeSheetTapOut, $data->Actual_TapOut, $buffer_out,$remaining_buffer_out, $utilize_buffer_out)  ;

            $compliance_two = $outBufferData['compliance_two']; 
            
            echo "<br>";
            echo $workedMin = $this->WorkingMin($weeklyTimeSheetTapIn,$weeklyTimeSheetTapOut,$data->Actual_TapIn,$data->Actual_TapOut, $data->Absentia_Tap_In, $data->Absentia_Tap_Out, $data->staff_id,$yesterday_date) + $this->getMinutes($weeklyTimeSheetTapIn ,min($actualTapIn)) + $outBufferData['buffer'];

            if($workedMin >= $totalMin){
                
                $factor = 1;
            } else {
                
                $factor = $this->ncafCalculation($totalMin, $workedMin );
            }
            
        } else {
            
            //Mark it RED user is Late 
            $compliance_one = 0;

            //Again reset buffer value if user is late 
            $buffer = $data->Utilize_Buffer;
            if(empty($data->Utilize_Buffer)){
                $buffer = 0;
                
            }
            //Mark it Red user is late 
            $compliance_one = 0;
            echo "Late";
            $totalMin = $this->getMinutes($weeklyTimeSheetTapIn, $weeklyTimeSheetTapOut);
            //User is already LATE add actual Tap out time if not found using factor of 0.1 
            if(empty($data->Actual_TapOut)){
                echo "  TAP OUT NOT FOUND  ";

                $data->Actual_TapOut = $this->addActualTime( $weeklyTimeSheetTapOut, $totalMin, 0.1 );
            }

            //Out Buffer check if user try to get out eariler
            $outBufferData = $this->checkOutBuffer($weeklyTimeSheetTapOut, $data->Actual_TapOut, $buffer_out,$remaining_buffer_out, $utilize_buffer_out);

            $compliance_two = $outBufferData['compliance_two']; 

            $workedMin = $this->WorkingMin($weeklyTimeSheetTapIn,$weeklyTimeSheetTapOut, $data->Actual_TapIn,$data->Actual_TapOut, $data->Absentia_Tap_In, $data->Absentia_Tap_Out, $data->staff_id,$yesterday_date) + $outBufferData['buffer'];
            if($data->Actual_TapOut >= $weeklyTimeSheetTapOut){
               // $compliance_two = 1;
            }
            
            $factor =  $this->ncafCalculation($totalMin, $workedMin );
        }
        
            $calData['factor'] = $factor;
            if($bufferFlag == 1){
                $calData['utilize_Buffer'] = ($data->Monthly_Buffer - $remaining_buffer);
            } else {
                $calData['utilize_Buffer'] = 0;
            }

            $calData['remaining_buffer'] = $remaining_buffer;
            $calData['utilize_buffer_out'] = $outBufferData['utilize_Buffer'];
            $calData['remaining_buffer_out'] = $outBufferData['remaining_buffer'];            
            $calData['compliance_one'] = $compliance_one;
            $calData['compliance_two'] = $compliance_two;

            return $calData;

    }

    /**********************************************************************
    * NCAF Calculation
    * Author:   Asim Bilal
    * @input:   Total Min, Worked Min
    * @output:  result
    ***********************************************************************/

    public function ncafCalculation($totalMin, $workedMin){

        $result =  $workedMin / $totalMin;
        $result = $result * 0.8; 
        $result = number_format($result, 1, '.', '') - 1;
        return $result;
    }

    public function weeklyTapInOut($Weekly_Time,$Actual_Time,$flag){

        
            if (strtotime($Actual_Time) >= strtotime($Weekly_Time) && $flag == 0){
                return $tap= $Weekly_Time;
            }
            else if(strtotime($Actual_Time) <= strtotime($Weekly_Time) && $flag == 1){
                return $Weekly_Time;
            }
            else{
                return $tap = $Actual_Time;
            }   
    }

    public function WorkingMin($weekly_time_in,$weekly_time_out,$actual_time_in,$actual_tap_out, $Absentia_Tap_In, $Absentia_Tap_Out, $staff_id,$yesterday_date){
     
        if(!empty($weekly_time_in) && !empty($actual_time_in)){

            $actualTapIn = explode(',', $actual_time_in);
            $actualTapIn = min($actualTapIn);

            $weeklyTimeSheetTapIn = $weekly_time_in;
            $tap_in = $this->weeklyTapInOut($weeklyTimeSheetTapIn,$actualTapIn,1);

        }

        if(!empty($weekly_time_out) && !empty($actual_tap_out)){

            $actualTapOut = explode(',', $actual_tap_out);
            $actualTapOut = max($actualTapOut);
            $weeklyTimeSheetTapOut = $weekly_time_out;
            $tap_out = $this->weeklyTapInOut($weeklyTimeSheetTapOut,$actualTapOut,0);
            
        }   
        if(!empty($Absentia_Tap_In) && !empty($Absentia_Tap_Out)){
            $report = new ReportStaffModel();
            $absentia = $report->getStaffAbsentia($staff_id,$yesterday_date);
            if(!empty($absentia[0]->Absentia_TapOut) && !empty($absentia[0]->Absentia_TapIn)){
                $workedMin = 0;
                //Check If user try to go earlier as per assign absentia time 08:30 < 09:00 then use its actual earlier time else use absentia time
                
                if($Absentia_Tap_Out <= $absentia[0]->Absentia_TapIn ){

                        $workedMin =  $this->getMinutes($tap_in, $Absentia_Tap_Out);
                } else {
                        $workedMin =  $this->getMinutes($tap_in, $absentia[0]->Absentia_TapIn);
                }
               
                
                //Check If user try to come late as per assign absentia time 11:30 < 11:00 then use its actual late time else use absentia time
                if( $Absentia_Tap_In <= $absentia[0]->Absentia_TapOut ){
                
                   $workedMin = $workedMin +  $this->getMinutes( $absentia[0]->Absentia_TapOut, $tap_out );
                } else {
                    
                   $workedMin = $workedMin +  $this->getMinutes( $Absentia_Tap_In, $tap_out );
                }

                $workedMin = $workedMin +  $this->getMinutes( $absentia[0]->Absentia_TapIn,  $absentia[0]->Absentia_TapOut);
                return $workedMin;
            }

        }
        return $this->getMinutes($tap_in, $tap_out);
        

    } 
    public function getMinutes($tap_in, $tap_out){
        $to_time = strtotime($tap_in);
        $from_time = strtotime($tap_out);
        $minCalc =  round(abs($to_time - $from_time) / 60);
        return $minCalc;
    } 

    public function addActualTime( $time, $totalMin, $factor ){
        
        return $actual_time =  date('H:i:s', strtotime($time) - ($totalMin * $factor) * 60 );       
    }

    public function insertReport($table_name,$data){
        $report = new ReportStaffModel();
        if(!empty($data)){
            $insertedRecord = $report->insertRecord($table_name,$data);
        }
    }

        //Update Record

    public function updateReport($table_name,$where,$data){

        if(!empty($table_name) && !empty($where) && !empty($data)){
                $report = new ReportStaffModel();
                $updatedRecord = $report->update_data($table_name,$where,$data);
            
        }

    }  
}