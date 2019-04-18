<?php
/******************************************************************
* Author : Zia Khan
* Email : ziaisss@gmail.com
* Cell : +92-342-2775588
*******************************************************************/
namespace App\Http\Controllers\Attendance\Staff;

use Sentinel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Core\SelectionList;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Staff\Staff_Attendance\tmpcard_staff_used;
use App\Models\Staff\Staff_Attendance\attendance_location;
use App\Models\Staff\Staff_Attendance\staff_attendance_in;
use App\Models\Staff\Staff_Attendance\staff_attendance_out;
use App\Models\Staff\Staff_Information\StaffInformationModel;
use App\Models\Staff\Staff_Attendance\class_list;
use App\Models\Staff\Staff_Attendance\student_registered;
use App\Models\Staff\Staff_Attendance\student_family_record;
use App\Models\Staff\Staff_Attendance\visitor;

class ScreeningGate extends Controller
{
    public function mainPage(){

        $userID = Sentinel::getUser()->id;
        $get_attendance_location_model = new attendance_location;
        $staff['UserID'] = Sentinel::getUser()->id;
        $staff['attendance_location'] = $get_attendance_location_model->get_location_List();
        return view('attendance.staff.staff_attendance_view')->with(array('staff' => $staff));
        Staff_interim_table_list();
        Parent_interim_table_list();
    }

    // Attendance Tap In Time ZK
    public function GetTapTime(Request $request){
      $RFID_ID=$request->RFID;
      $mytime = Carbon::now('Asia/Karachi');
      $real_time=$mytime->format('g:i A');
      return $real_time;
    }


    // Attendance Tap In ZK
    public function Tap_In_Staff(Request $request){

      $RFID_ID=$request->RFID;
      $locationid=$request->locationid;
      $get_attendance=array();
      $real_time=0;
      $staff_id=0;
      $visitor_card_type=0;
      $Return_Data=array();
      $mytime = Carbon::now('Asia/Karachi');
      $real_time=$mytime->format('h:i:s A');
      $getdate=$mytime->format('Y-m-d');
      $time = $real_time;
      $timeNow = time();
      $Today_Date = date('Y-m-d');
      $userID = Sentinel::getUser()->id;
      
      if( $RFID_ID != '' )
      {
          $get_attendance_model =  new staff_attendance_in;
          $get_attendance_tapout_model =  new staff_attendance_out;
          $class_list_model = new class_list;
          $student_registered_model = new student_registered;
          $get_attendance_location_model = new attendance_location;
          $visitor_model = new visitor;
          $visitor_card = $visitor_model->getCardInfo($RFID_ID);
          if(!empty($visitor_card) ){
            $card_type = $visitor_card[0]->card_type;
            $visitor_card_info = $visitor_model->getParentCardInfo($card_type,$RFID_ID);
            $visitor_card_info_type = $visitor_card_info[0]->card_type;
            if($visitor_card_info_type == 1){
              $tapin = 'Parent';
              $visitor_card_type = $visitor_card[0]->card_type;
                $parent_data = $visitor_model->Get_admission_today_recored($RFID_ID,$visitor_card_type);
                $gf_id = $parent_data[0]->gf_id;
                $parent_type_id = $parent_data[0]->parent_type;
                $parent_nic = $parent_data[0]->nic;
                $parent_name = $parent_data[0]->name;
                $campus_id = $parent_data[0]->campus_id;
                $parent_reg_record_found = $visitor_model->checkData($RFID_ID,$Today_Date);
                if($parent_reg_record_found>0){
                    $data = array(
                      'campus_id' => $campus_id,
                      'name' => $parent_name,
                      'nic' => $parent_nic,
                      'time_out' => $timeNow,
                      'modified' => time(),
                      'modified_by' => $userID,
                      'record_deleted' => 0
                    );
                    $parent_attendance= $visitor_model->updateVisitorReg($parent_name,$campus_id,$parent_nic,$RFID_ID,$data);
                }
                // start
                if(!empty($gf_id) ){
                  $stdfamilyinfo['attendance_location'] = $get_attendance_location_model->get_location_List();
                  $stdfamilyinfo["family"] = $class_list_model->GetParentInfoGF_ID($gf_id);
                  $stdfamilyinfo["student"] = $class_list_model->get_students_by_gfid($gf_id);
                  $stdfamilyinfo["fatherpix"] = $student_registered_model->getFatherPhotoPath($gf_id);
                  $stdfamilyinfo["family_info"] = $class_list_model->getStudentFamilyRecord($gf_id);
                
                  // For Father
                  $siblings = $student_registered_model->getSiblingsInfo2($gf_id);
                  $fatherphoto500="";
                  $PhotoID = 0;
                  $father_name ="";
                  $father_name = $siblings[0]->Father_name;
                  if( $siblings[0]->is_Staff==1 )
                  {
                    $PhotoID = $siblings[0]->father_photo;
                    if (!file_exists(STAFF_PIC_500 . $PhotoID . PIC500_TYPE)){
                      $PhotoID = 'NoPic';
                    } 
                    $fatherphoto500 = STAFF_PIC_500 . $PhotoID . PIC500_TYPE; 
                  }else 
                  {
                    $PhotoID = $siblings[0]->father_photo;
                    if (!file_exists(FATHER_PIC_500 . $PhotoID . PIC500_TYPE)){
                      $PhotoID = 'NoPic';
                    } 
                    $fatherphoto500 = FATHER_PIC_500 . $PhotoID . PIC500_TYPE; 
                  }

                  //For Mother
                  $siblings2 = $student_registered_model->getSiblingsInfo3($gf_id);
                  $motherphoto500="";
                  $PhotoID = 0;
                  $mother_name ="";
                  $mother_name = $siblings2[0]->mother_name;
                  if( $siblings2[0]->is_Staff==1 )
                  {
                    $PhotoID = $siblings2[0]->mother_photo;
                    if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
                      $PhotoID = 'NoPic';
                    } 
                    $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE; 
                  }else 
                  {
                    $PhotoID = $siblings2[0]->mother_photo;
                    if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
                      $PhotoID = 'NoPic';
                    } 
                    $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE;
                  }
                  if($parent_type_id == 1 ){
                    $parent_type_name = "Father";
                  }
                  if($parent_type_id == 2 ){
                    $parent_type_name = "Mother";
                  }
                  return response()->json([
                        'parent_type_name' => $parent_type_name,
                        'tapin' => $tapin,
                        'get_attendance' => $get_attendance,
                        'timeget' => $real_time,
                        'stdfamilyinfo' => $stdfamilyinfo,  
                        'fatherpic' => $fatherphoto500,
                        'motherpic'  => $motherphoto500,
                        'Father_name' =>$father_name,
                        'Mother_name' =>$mother_name 
                  ]);

                } // end
            }if($visitor_card_info_type == 2){
                $time = $real_time;
                $tapin = 'Admission';
                $timeNow = time();
                $Today_Date = date('Y-m-d');
                $visitor_card_type = $visitor_card[0]->card_type;
                  $admission_data = $visitor_model->Get_admission_today_recored($RFID_ID,$visitor_card_type);
                  $cardtype_name = $admission_data[0]->cardtype;
                  $admission_nic = $admission_data[0]->nic;
                  $admission_name = $admission_data[0]->name;
                  $campus_id = $admission_data[0]->campus_id;
                  $purpose = $admission_data[0]->purpose;
                  $card_no = $admission_data[0]->card_no;
                  $timeIn = $admission_data[0]->timeIn;
                  $parent_reg_record_found = $visitor_model->checkData($RFID_ID,$Today_Date);
                  if($parent_reg_record_found>0){
                    $checktime = $visitor_model->gettimedata($admission_nic,$RFID_ID);
                    if($checktime[0]->time_out == 0){
                      $data = array(
                        'campus_id' => $campus_id,
                        'name' => $admission_name,
                        'nic' => $admission_nic,
                        'time_out' => $timeNow,
                        'modified' => time(),
                        'modified_by' => $userID,
                        'record_deleted' => 0
                      );
                      $admission_attendance= $visitor_model->updateVisitorReg($admission_name,$campus_id,$admission_nic,$RFID_ID,$data);
                    }
                    else{

                    }
                  }
                return response()->json([
                          'tapin' => $tapin,
                          'time' => $time,
                          'cardtype_name' => $cardtype_name,
                          'admission_name' => $admission_name,
                          'purpose' => $purpose,
                          'card_no' => $card_no,
                          'timeIn' => $timeIn
                        ]);
            
            }if($visitor_card_info_type == 3){
                $time = $real_time;
                $tapin = 'Applicant';
                $timeNow = time();
                $Today_Date = date('Y-m-d');
                $visitor_card_type = $visitor_card[0]->card_type;
                  $applicant_data = $visitor_model->Get_other_today_recored($RFID_ID,$visitor_card_type);
                  $cardtype_name = $applicant_data[0]->cardtype;
                  $applicant_nic = $applicant_data[0]->nic;
                  $applicant_name = $applicant_data[0]->name;
                  $campus_id = $applicant_data[0]->campus_id;
                  $purpose = $applicant_data[0]->purpose;
                  $card_no = $applicant_data[0]->card_no;
                  $timeIn = $applicant_data[0]->timeIn;
                  $parent_reg_record_found = $visitor_model->checkData($RFID_ID,$Today_Date);
                  if($parent_reg_record_found>0){
                    $checktime = $visitor_model->gettimedata($applicant_nic,$RFID_ID);
                    if($checktime[0]->time_out == 0){
                      $data = array(
                        'campus_id' => $campus_id,
                        'name' => $applicant_name,
                        'nic' => $applicant_nic,
                        'time_out' => $timeNow,
                        'modified' => time(),
                        'modified_by' => $userID,
                        'record_deleted' => 0
                      );
                      $admission_attendance= $visitor_model->updateVisitorReg($applicant_name,$campus_id,$applicant_nic,$RFID_ID,$data);
                    }
                    else{

                    }
                  }
                return response()->json([
                          'tapin' => $tapin,
                          'time' => $time,
                          'cardtype_name' => $cardtype_name,
                          'applicant_name' => $applicant_name,
                          'purpose' => $purpose,
                          'card_no' => $card_no,
                          'timeIn' => $timeIn
                        ]);
            
            }if($visitor_card_info_type == 4){
                $time = $real_time;
                $tapin = 'Vendor';
                $timeNow = time(); 
                $Today_Date = date('Y-m-d');
                $visitor_card_type = $visitor_card[0]->card_type;
                  $vendor_data = $visitor_model->Get_other_today_recored($RFID_ID,$visitor_card_type);
                  $cardtype_name = $vendor_data[0]->cardtype;
                  $vendor_nic = $vendor_data[0]->nic;
                  $vendor_name = $vendor_data[0]->name;
                  $campus_id = $vendor_data[0]->campus_id;
                  $purpose = $vendor_data[0]->purpose;
                  $card_no = $vendor_data[0]->card_no;
                  $timeIn = $vendor_data[0]->timeIn;
                  $parent_reg_record_found = $visitor_model->checkData($RFID_ID,$Today_Date);
                  if($parent_reg_record_found>0){
                    $checktime = $visitor_model->gettimedata($vendor_nic,$RFID_ID);
                    if($checktime[0]->time_out == 0){
                      $data = array(
                        'campus_id' => $campus_id,
                        'name' => $vendor_name,
                        'nic' => $vendor_nic,
                        'time_out' => $timeNow,
                        'modified' => time(),
                        'modified_by' => $userID,
                        'record_deleted' => 0
                      );
                      $admission_attendance= $visitor_model->updateVisitorReg($vendor_name,$campus_id,$vendor_nic,$RFID_ID,$data);
                    }
                    else{

                    }
                  }
                return response()->json([
                          'tapin' => $tapin,
                          'time' => $time,
                          'cardtype_name' => $cardtype_name,
                          'vendor_name' => $vendor_name,
                          'purpose' => $purpose,
                          'card_no' => $card_no,
                          'timeIn' => $timeIn
                        ]);
            
            }if($visitor_card_info_type == 5){
                $time = $real_time;
                $tapin = 'Worker';
                $timeNow = time(); 
                $Today_Date = date('Y-m-d');
                $visitor_card_type = $visitor_card[0]->card_type;
                  $worker_data = $visitor_model->Get_other_today_recored($RFID_ID,$visitor_card_type);
                  $cardtype_name = $worker_data[0]->cardtype;
                  $worker_nic = $worker_data[0]->nic;
                  $worker_name = $worker_data[0]->name;
                  $campus_id = $worker_data[0]->campus_id;
                  $purpose = $worker_data[0]->purpose;
                  $card_no = $worker_data[0]->card_no;
                  $timeIn = $worker_data[0]->timeIn;
                  $parent_reg_record_found = $visitor_model->checkData($RFID_ID,$Today_Date);
                  if($parent_reg_record_found>0){
                    $checktime = $visitor_model->gettimedata($worker_nic,$RFID_ID);
                    if($checktime[0]->time_out == 0){
                      $data = array(
                        'campus_id' => $campus_id,
                        'name' => $worker_name,
                        'nic' => $worker_nic,
                        'time_out' => $timeNow,
                        'modified' => time(),
                        'modified_by' => $userID,
                        'record_deleted' => 0
                      );
                      $admission_attendance= $visitor_model->updateVisitorReg($worker_name,$campus_id,$worker_nic,$RFID_ID,$data);
                    }
                    else{

                    }
                  }
                return response()->json([
                          'tapin' => $tapin,
                          'time' => $time,
                          'cardtype_name' => $cardtype_name,
                          'worker_name' => $worker_name,
                          'purpose' => $purpose,
                          'card_no' => $card_no,
                          'timeIn' => $timeIn
                        ]);
            
            }if($visitor_card_info_type == 6){
                $time = $real_time;
                $tapin = 'Guest';
                $timeNow = time(); 
                $Today_Date = date('Y-m-d');
                $visitor_card_type = $visitor_card[0]->card_type;
                  $guest_data = $visitor_model->Get_other_today_recored($RFID_ID,$visitor_card_type);
                  $cardtype_name = $guest_data[0]->cardtype;
                  $guest_nic = $guest_data[0]->nic;
                  $guest_name = $guest_data[0]->name;
                  $campus_id = $guest_data[0]->campus_id;
                  $purpose = $guest_data[0]->purpose;
                  $card_no = $guest_data[0]->card_no;
                  $timeIn = $guest_data[0]->timeIn;
                  $parent_reg_record_found = $visitor_model->checkData($RFID_ID,$Today_Date);
                  if($parent_reg_record_found>0){
                    $checktime = $visitor_model->gettimedata($guest_nic,$RFID_ID);
                    if($checktime[0]->time_out == 0){
                      $data = array(
                        'campus_id' => $campus_id,
                        'name' => $guest_name,
                        'nic' => $guest_nic,
                        'time_out' => $timeNow,
                        'modified' => time(),
                        'modified_by' => $userID,
                        'record_deleted' => 0
                      );
                      $admission_attendance= $visitor_model->updateVisitorReg($guest_name,$campus_id,$guest_nic,$RFID_ID,$data);
                    }
                    else{

                    }
                  }
                return response()->json([
                          'tapin' => $tapin,
                          'time' => $time,
                          'cardtype_name' => $cardtype_name,
                          'guest_name' => $guest_name,
                          'purpose' => $purpose,
                          'card_no' => $card_no,
                          'timeIn' => $timeIn
                        ]);
            
            }
          }
          else{
            $get_attendance = $get_attendance_model->getStaffAttendanceData($RFID_ID);
            if($get_attendance != null){
        
              //  Parent Tap code End here
              $staff_id = $get_attendance[0]['staff_id'];
              $get_date = $getdate;
              $time = $real_time;
              $locationid = $request->locationid;
              $date = $request->input('date');
              $missTap = $request->input('missTap');
              $timeNow = time();
              $Today_Data = date('Y-m-d');
              $Return_Data = $get_attendance_model->CheckTapEvent($Today_Data, $staff_id);
              // print_r($Return_Data);
              // die;
              if( !empty( $Return_Data ) )
              {

                  if( $Return_Data[0]->tap==2)
                  {
                    $data = array(
                      'staff_id' => $staff_id,
                      'date' => $get_date,
                      'time' => $time,
                      'ip4' => getHostByName(getHostName()),
                      'location_id' => $locationid,
                      'created' => $timeNow ,
                      'register_by' => $userID,
                      'modified' => time(),
                      'modified_by' => $userID,
                      'record_deleted' => 0
                    );

                    $staff_attendance =  $get_attendance_model->insert('atif_attendance_staff.staff_attendance_in',$data);
                    $tapin = 2;
                    return response()->json([
                      'tapin' => $tapin,
                      'get_attendance' => $get_attendance,
                      'timeget' => $real_time,
                      'Attendance'=>$Return_Data
                    ]);

                  }else if( $Return_Data[0]->tap==1)
                  {
                    $data = array(
                      'staff_id' => $staff_id,
                      'date' => $get_date,
                      'time' => $time,
                      'ip4' => getHostByName(getHostName()),
                      'location_id' => $locationid,
                      'created' => $timeNow ,
                      'register_by' => $userID,
                      'modified' => time(),
                      'modified_by' => $userID,
                      'record_deleted' => 0
                    );
                      
                      $staff_attendance_tapout =  $get_attendance_tapout_model->insert('atif_attendance_staff.staff_attendance_out',$data);
                      $tapin = 1  ;
                    return response()->json([
                      'tapin' => $tapin,
                      'get_attendance' => $get_attendance,
                      'timeget' => $real_time,
                      'Attendance'=>$Return_Data
                    ]);
                  }
              
              }
              else
              {
                     $data = array(
                      'staff_id' => $staff_id,
                      'date' => $get_date,
                      'time' => $time,
                      'ip4' => getHostByName(getHostName()),
                      'location_id' => $locationid,
                      'created' => $timeNow ,
                      'register_by' => $userID,
                      'modified' => time(),
                      'modified_by' => $userID,
                      'record_deleted' => 0
                    );

                    $staff_attendance =  $get_attendance_model->insert('atif_attendance_staff.staff_attendance_in',$data);
                    $tapin = 2;
                    return response()->json([
                      'tapin' => $tapin,
                      'get_attendance' => $get_attendance,
                      'timeget' => $real_time,
                      'Attendance'=>$Return_Data
                    ]);
              }
            }

            $get_family_info = $class_list_model->getFamilyRecord($RFID_ID);
            if(!empty($get_family_info) ){
              $gf_id = $get_family_info[0]->gf_id;
              $purpose = 'Family';
              $campus_id = 2;
              $parent_type_id = $get_family_info[0]->parent_type;
              $RFID_hex = $get_family_info[0]->rfid_hex;
              $mobile = $get_family_info[0]->mobile_phone;
              $nic = $get_family_info[0]->nic;
              $stdfamilyinfo['attendance_location'] = $get_attendance_location_model->get_location_List();
              $stdfamilyinfo["family"] = $class_list_model->GetParentInfoGF_ID($gf_id);
              $stdfamilyinfo["student"] = $class_list_model->get_students_by_gfid($gf_id);
              $stdfamilyinfo["fatherpix"] = $student_registered_model->getFatherPhotoPath($gf_id);
              $stdfamilyinfo["family_info"] = $class_list_model->getStudentFamilyRecord($gf_id);

              // For Father
              $siblings = $student_registered_model->getSiblingsInfo2($gf_id);
              $fatherphoto500="";
              $PhotoID = 0;
              $father_name ="";
              $father_name = $siblings[0]->Father_name;
              if( $siblings[0]->is_Staff==1 )
              {
                $PhotoID = $siblings[0]->father_photo;
                if (!file_exists(STAFF_PIC_500 . $PhotoID . PIC500_TYPE)){
                  $PhotoID = 'NoPic';
                } 
                $fatherphoto500 = STAFF_PIC_500 . $PhotoID . PIC500_TYPE; 
              }else 
              {
                $PhotoID = $siblings[0]->father_photo;
                if (!file_exists(FATHER_PIC_500 . $PhotoID . PIC500_TYPE)){
                  $PhotoID = 'NoPic';
                } 
                $fatherphoto500 = FATHER_PIC_500 . $PhotoID . PIC500_TYPE; 
              }

              //For Mother
              $siblings2 = $student_registered_model->getSiblingsInfo3($gf_id);
              $motherphoto500="";
              $PhotoID = 0;
              $mother_name ="";
              $mother_name = $siblings2[0]->mother_name;
              if( $siblings2[0]->is_Staff==1 )
              {
                $PhotoID = $siblings2[0]->mother_photo;
                if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
                  $PhotoID = 'NoPic';
                } 
                $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE; 
              }else 
              {
                $PhotoID = $siblings2[0]->mother_photo;
                if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
                  $PhotoID = 'NoPic';
                } 
                $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE;
              }

              if($parent_type_id == 1){
                $parent_type_name = "Father";
                $fathername = $father_name;
                $visitor = 'Father';
                $family_record_found=$visitor_model->checkVisitorReg($fathername,$campus_id,$nic,$RFID_ID);
                if($family_record_found>0){
                  $checktime = $visitor_model->gettimedata($nic,$RFID_ID);
                  $checkout_time = $checktime[0]->time_out;
                  if($checkout_time == 0){

                    $family_tap = "Family_tapout";
                    $data = array(
                      'location_id' => $locationid,
                      'campus_id' => $campus_id,
                      'type_id' => $parent_type_id,
                      'no_of_persons' => 1,
                      'name' => $fathername,
                      'nic' => $nic,
                      'mobile_phone' => $mobile,
                      'gender' => $visitor,
                      'description' => $purpose,
                      'rfid_dec' => $RFID_ID,
                      'rfid_hex' => $RFID_hex,
                      'time_out' => $timeNow,
                      'modified' => time(),
                      'modified_by' => $userID,
                      'record_deleted' => 0
                    );
                    $father_attendance= $visitor_model->updateVisitorReg($fathername,$campus_id,$nic,$RFID_ID,$data);

                  }else{
                      $visitor_model->location_id = $locationid;
                      $visitor_model->campus_id = $campus_id;
                      $visitor_model->type_id = $parent_type_id;
                      $visitor_model->no_of_persons = 1;
                      $visitor_model->name = $fathername;
                      $visitor_model->nic = $nic;
                      $visitor_model->mobile_phone = $mobile;
                      $visitor_model->gender = $visitor;
                      $visitor_model->purpose = 0 ;
                      $visitor_model->contact_person = 0 ;
                      $visitor_model->contact_department = 0 ;
                      $visitor_model->description = $purpose;
                      $visitor_model->rfid_dec = $RFID_ID;
                      $visitor_model->rfid_hex = $RFID_hex;
                      $visitor_model->time_in = $timeNow;
                      $visitor_model->time_out = 0;
                      $visitor_model->created = $timeNow;
                      $visitor_model->register_by = $userID;
                      $visitor_model->modified = 0;
                      $visitor_model->modified_by =0;
                      $visitor_model->record_deleted = 0;
                      $visitor_model->save();
                      $family_tap = "Family_tapin";

                  }
                }
                else{
                      $visitor_model->location_id = $locationid;
                      $visitor_model->campus_id = $campus_id;
                      $visitor_model->type_id = $parent_type_id;
                      $visitor_model->no_of_persons = 1;
                      $visitor_model->name = $fathername;
                      $visitor_model->nic = $nic;
                      $visitor_model->mobile_phone = $mobile;
                      $visitor_model->gender = $visitor;
                      $visitor_model->purpose = 0 ;
                      $visitor_model->contact_person = 0 ;
                      $visitor_model->contact_department = 0 ;
                      $visitor_model->description = $purpose;
                      $visitor_model->rfid_dec = $RFID_ID;
                      $visitor_model->rfid_hex = $RFID_hex;
                      $visitor_model->time_in = $timeNow;
                      $visitor_model->time_out = 0;
                      $visitor_model->created = $timeNow;
                      $visitor_model->register_by = $userID;
                      $visitor_model->modified = 0;
                      $visitor_model->modified_by =0;
                      $visitor_model->record_deleted = 0;
                      $visitor_model->save();
                      $family_tap = "Family_tapin";
                }

              }
              if($parent_type_id == 2){
                $parent_type_name = "Mother";
                $mothername = $mother_name;
                $visitor = 'Mother';
                $family_record_found=$visitor_model->checkVisitorReg($mothername,$campus_id,$nic,$RFID_ID);
                if($family_record_found>0){
                  $checktime = $visitor_model->gettimedata($nic,$RFID_ID);
                  $checkout_time = $checktime[0]->time_out;
                  if($checkout_time == 0){

                    $family_tap = "Family_tapout";
                    $data = array(
                      'location_id' => $locationid,
                      'campus_id' => $campus_id,
                      'type_id' => $parent_type_id,
                      'no_of_persons' => 1,
                      'name' => $mothername,
                      'nic' => $nic,
                      'mobile_phone' => $mobile,
                      'gender' => $visitor,
                      'description' => $purpose,
                      'rfid_dec' => $RFID_ID,
                      'rfid_hex' => $RFID_hex,
                      'time_out' => $timeNow,
                      'modified' => time(),
                      'modified_by' => $userID,
                      'record_deleted' => 0
                    );
                    $mother_attendance= $visitor_model->updateVisitorReg($mothername,$campus_id,$nic,$RFID_ID,$data);

                  }else{
                      $visitor_model->location_id = $locationid;
                      $visitor_model->campus_id = $campus_id;
                      $visitor_model->type_id = $parent_type_id;
                      $visitor_model->no_of_persons = 1;
                      $visitor_model->name = $mothername;
                      $visitor_model->nic = $nic;
                      $visitor_model->mobile_phone = $mobile;
                      $visitor_model->gender = $visitor;
                      $visitor_model->purpose = 0 ;
                      $visitor_model->contact_person = 0 ;
                      $visitor_model->contact_department = 0 ;
                      $visitor_model->description = $purpose;
                      $visitor_model->rfid_dec = $RFID_ID;
                      $visitor_model->rfid_hex = $RFID_hex;
                      $visitor_model->time_in = $timeNow;
                      $visitor_model->time_out = 0;
                      $visitor_model->created = $timeNow;
                      $visitor_model->register_by = $userID;
                      $visitor_model->modified = 0;
                      $visitor_model->modified_by =0;
                      $visitor_model->record_deleted = 0;
                      $visitor_model->save();
                      $family_tap = "Family_tapin";
                      $visitor_model->id;

                  }
                }
                else{
                      $visitor_model->location_id = $locationid;
                      $visitor_model->campus_id = $campus_id;
                      $visitor_model->type_id = $parent_type_id;
                      $visitor_model->no_of_persons = 1;
                      $visitor_model->name = $mothername;
                      $visitor_model->nic = $nic;
                      $visitor_model->mobile_phone = $mobile;
                      $visitor_model->gender = $visitor;
                      $visitor_model->purpose = 0 ;
                      $visitor_model->contact_person = 0 ;
                      $visitor_model->contact_department = 0 ;
                      $visitor_model->description = $purpose;
                      $visitor_model->rfid_dec = $RFID_ID;
                      $visitor_model->rfid_hex = $RFID_hex;
                      $visitor_model->time_in = $timeNow;
                      $visitor_model->time_out = 0;
                      $visitor_model->created = $timeNow;
                      $visitor_model->register_by = $userID;
                      $visitor_model->modified = 0;
                      $visitor_model->modified_by =0;
                      $visitor_model->record_deleted = 0;
                      $visitor_model->save();
                      $family_tap = "Family_tapin";
                }

              }
              $tapin = "Family";
              return response()->json([
                    'parent_type_name' => $parent_type_name,
                    'tapin' => $tapin,
                    'family_tap' => $family_tap,
                    'get_attendance' => $get_attendance,
                    'timeget' => $real_time,
                    'stdfamilyinfo' => $stdfamilyinfo,  
                    'fatherpic' => $fatherphoto500,
                    'motherpic'  => $motherphoto500,
                    'Father_name' =>$father_name,
                    'Mother_name' =>$mother_name 
              ]);                  
            }
            else{
              error_log('inner message');
            }
          }
          // Parent Tap Code start here
      } // if RFID Code not empty  
    }

    //Live serach For staff Issue Interim Card
    public function Search_Action(Request $request){ 
      if($request->ajax()) 
      { 
        $output = ''; 
        $query = $request->get('query'); 
        if($query != ''){ 
        $data = DB::table('atif.staff_registered')->where('gt_id', 'like', '%'.$query.'%')
                                          ->orWhere('abridged_name', 'like', '%'.$query.'%')
                                          ->orWhere('name_code', 'like', '%'.$query.'%')
                                          ->orderBy('id', 'desc') ->get();
        } 
        else{ 
          $data = DB::table('staff_registered')->orderBy('id', 'desc')
                                          ->get(); 
        } 
        $total_row = $data->count(); 
        if($total_row > 0){ 
          foreach($data as $row){ 
            $output .= ''.$row->gt_id.''.$row->abridged_name.''.$row->name_code.''; 
          } 
        } 
        else{ 
          $output = 'No Data Found';
        } 
        $data = array( 'table_data' => $output, 'total_data' => $total_row ); 
        echo json_encode($data); 
      } 
    
    } 

    // Attendance Tap Out ZK
    public function Tap_Out_Staff(Request $request){

    }

    // Staff Interim Card Funstion ZK
    public function Staff_interim_table_list(){

        $userID = Sentinel::getUser()->id;
        $get_attendance_model =  new staff_attendance_in;
        $get_attendance_location_model = new attendance_location;
        $tmpcard_staff_used_model = new tmpcard_staff_used;
        $staffInfo = new StaffInformationModel();
        $selectionList = new SelectionList();
        $user = $staffInfo->get_Staff_Info(34);
        $staffFilter['attendance_location'] = $get_attendance_location_model->get_location_List();
        $staffFilter['Staff_info'] = $tmpcard_staff_used_model->get_tmpcard_List();
        $departmentWhere = "c_bottomline != '' and c_bottomline != '..' and c_bottomline not like '%HiAce,%'
        and c_bottomline not like '%HiRoof,%'";
        $staffFilter['department'] = $selectionList->get_FieldList('atif.staff_registered', 'c_bottomline', $departmentWhere);
        $staffFilter['tt_profile'] = $selectionList->get_FieldList('atif_gs_events.tt_profile', 'name');
        return view('attendance.staff.staff_attendance_view_staff_list')->with(array('staffFilter' => $staffFilter));

    }

    // Staff Interim Card Funstion ZK
    public function Parent_interim_table_list(Request $request){

        $type_id = $request->type_id;
        $type_id1 = $request->type_id1;
        $type_id2 = $request->type_id2;
        $userID = Sentinel::getUser()->id;
        $visitor_model = new visitor;
        $ParentFilter = $visitor_model->Get_Parent_table_today_recored($type_id,$type_id1,$type_id2);

        return view('attendance.staff.parent_attendance_view_parent_list')->with(array('ParentFilter' => $ParentFilter));

    }

    // Visitor Interim Card Funstion ZK
    public function Visitor_interim_table_list(Request $request){

        $type_id = $request->type_id;
        $type_id1 = $request->type_id1;
        $type_id2 = $request->type_id2;
        $type_id3 = $request->type_id3;
        $type_id4 = $request->type_id4;
        $userID = Sentinel::getUser()->id;
        $visitor_model = new visitor;
        $ParentFilter = $visitor_model->Get_visitor_table_today_recored($type_id,$type_id1,$type_id2,$type_id3,$type_id4);

        return view('attendance.staff.visitor_attendance_view_parent_list')->with(array('ParentFilter' => $ParentFilter));

    }

    // staff daypass
    function fetch_autocomplete(Request $request){
      if($request->get('query')){
        $query = $request->get('query');
        $data = DB::table('atif.staff_registered')->where('gt_id', 'like', '%'.$query.'%')
                                            ->orWhere('abridged_name', 'like', '%'.$query.'%')
                                            ->orWhere('name_code', 'like', '%'.$query.'%')
                                            ->orderBy('gt_id', 'desc') ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row){
          $output .= '<li class="staff_list_class" value="'.$row->id.'">'.$row->name.' - <small style="color:#888;">'.$row->gt_id.'</small></li>
          <input type="hidden" class="stafflist_id"  value="'.$row->id.'" />
          <input type="hidden" class="Staff_photo_id" id="Staff_photo_id" value="'.$row->employee_id.'" />';
        }
        $output .= '</ul>';
        echo $output;
      
      }

    }

    // GET staff PHOTO500 by staff_id ajax get_fetch_staff_pix
    function Get_Fetch_Staff_Pix(Request $request){

      $staff_id=$request->staff_id;
      $get_attendance_model =  new staff_attendance_in;
      $get_pix = $get_attendance_model->getStaffPHOTOData($staff_id);
      if($get_pix != null){
        return response()->json([
          'get_pix' => $get_pix
          ]);
      }

    }

    //family daypass  GF ID#'.$row->gf_id.'  || GS-ID# '.$row->gs_id.'
    function FetchFamilyListAutoComplete(Request $request){
      $tmpcard_staff_used_model = new tmpcard_staff_used;
      $query = "";
      if($request->get('query')){
        $query = $request->get('query');
       
        $data = array();
        $data = $tmpcard_staff_used_model->Get_Family_list( $query); 

        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        if(  !empty($data) ){
          foreach($data as $row){
            $output .= '<li id="'.$row->gf_id.'" class="student_list_class">Student Name: '.$row->abridged_name.' || GF-ID: '.$row->gf_id.' </li> 
            <input type="hidden" class="std_name" id="student_'.$row->abridged_name.'" value="'.$row->abridged_name.'" /> 
            <input type="hidden" class="gs_id" id="student_'.$row->gs_id.'" value="'.$row->gs_id.'" />
            <input type="hidden" class="gf_id" id="student_'.$row->gf_id.'" value="'.$row->gf_id.'" />
            <input type="hidden" class="gr_no" id="student_'.$row->gr_no.'" value="'.$row->gr_no.'" />
            
            ';
          }
        
        }
        $output .= '</ul>';
        echo $output;
      
      }
    
    }

    //Parents daypass information student_parent_daypass_info
    function StudentParentDaypassInfo(Request $request){

      $gf_id=$request->gf_id;
      // $user=$request->user;
      $class_list_model = new class_list; 
      $student_registered_model = new student_registered;
      $get_attendance_location_model = new attendance_location;
      $stdfamilyinfo['attendance_location'] = $get_attendance_location_model->get_location_List();
      $stdfamilyinfo["family"] = $class_list_model->GetParentInfoGF_ID($gf_id);
      $stdfamilyinfo["student"] = $class_list_model->get_students_by_gfid($gf_id);
      $stdfamilyinfo["fatherpix"] = $student_registered_model->getFatherPhotoPath($gf_id);
    
      $stdfamilyinfo["family_info"] = $class_list_model->getStudentFamilyRecord($gf_id);

      // For Father
      $siblings = $student_registered_model->getSiblingsInfo2($gf_id);

      $fatherphoto500="";
      $PhotoID = 0;
      $father_name ="";
      $father_name = $siblings[0]->Father_name;
      if( $siblings[0]->is_Staff==1 )
      {
        $PhotoID = $siblings[0]->father_photo;
        if (!file_exists(STAFF_PIC_500 . $PhotoID . PIC500_TYPE)){
          $PhotoID = 'NoPic';
        } 
        $fatherphoto500 = STAFF_PIC_500 . $PhotoID . PIC500_TYPE; 
      }else 
      {
        $PhotoID = $siblings[0]->father_photo;
        if (!file_exists(FATHER_PIC_500 . $PhotoID . PIC500_TYPE)){
          $PhotoID = 'NoPic';
        } 
        $fatherphoto500 = FATHER_PIC_500 . $PhotoID . PIC500_TYPE; 
      }

      //For Mother
      $siblings2 = $student_registered_model->getSiblingsInfo3($gf_id);

      $motherphoto500="";
      $PhotoID = 0;
      $mother_name ="";
      $mother_name = $siblings2[0]->mother_name;
      if( $siblings2[0]->is_Staff==1 )
      {
        $PhotoID = $siblings2[0]->mother_photo;
        if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
          $PhotoID = 'NoPic';
        } 
        $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE; 
      }else 
      {
        $PhotoID = $siblings2[0]->mother_photo;
        if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
          $PhotoID = 'NoPic';
        } 
        $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE;
      }

      return view('attendance.staff.parents_interimcard_modal')->with(array('stdfamilyinfo' => $stdfamilyinfo,  "fatherpic" => $fatherphoto500, "Father_name"=>$father_name, "motherpic" => $motherphoto500, "Mother_name"=>$mother_name  ));
    
    }

    //Family daypass information family_parent_info
    function FamilyParentInfo(Request $request){

      $gf_id=$request->gf_id;
      $user=$request->user;
      $class_list_model = new class_list; 
      $student_registered_model = new student_registered;
      $get_attendance_location_model = new attendance_location;
      $stdfamilyinfo['attendance_location'] = $get_attendance_location_model->get_location_List();
      $stdfamilyinfo["family"] = $class_list_model->GetParentInfoGF_ID($gf_id);
      $stdfamilyinfo["student"] = $class_list_model->get_students_by_gfid($gf_id);
      $stdfamilyinfo["fatherpix"] = $student_registered_model->getFatherPhotoPath($gf_id);
      $stdfamilyinfo["family_info"] = $class_list_model->getStudentFamilyRecord($gf_id);

      // For Father
      $siblings = $student_registered_model->getSiblingsInfo2($gf_id);

      $fatherphoto500="";
      $PhotoID = 0;
      $father_name ="";
      $father_name = $siblings[0]->Father_name;
      if( $siblings[0]->is_Staff==1 )
      {
        $PhotoID = $siblings[0]->father_photo;
        if (!file_exists(STAFF_PIC_500 . $PhotoID . PIC500_TYPE)){
          $PhotoID = 'NoPic';
        } 
        $fatherphoto500 = STAFF_PIC_500 . $PhotoID . PIC500_TYPE; 
      }else 
      {
        $PhotoID = $siblings[0]->father_photo;
        if (!file_exists(FATHER_PIC_500 . $PhotoID . PIC500_TYPE)){
          $PhotoID = 'NoPic';
        } 
        $fatherphoto500 = FATHER_PIC_500 . $PhotoID . PIC500_TYPE; 
      }

      //For Mother
      $siblings2 = $student_registered_model->getSiblingsInfo3($gf_id);

      $motherphoto500="";
      $PhotoID = 0;
      $mother_name ="";
      $mother_name = $siblings2[0]->mother_name;
      if( $siblings2[0]->is_Staff==1 )
      {
        $PhotoID = $siblings2[0]->mother_photo;
        if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
          $PhotoID = 'NoPic';
        } 
        $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE; 
      }else 
      {
        $PhotoID = $siblings2[0]->mother_photo;
        if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
          $PhotoID = 'NoPic';
        } 
        $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE;
      }

      return view('attendance.staff.parents_interimcard_modal')->with(array('stdfamilyinfo' => $stdfamilyinfo,  "fatherpic" => $fatherphoto500, "Father_name"=>$father_name, "motherpic" => $motherphoto500, "Mother_name"=>$mother_name  ));
    
    }

    //Get Branch Id
    private function getBranchId($location){
      
      $campus_id = '';
      if($location == 4){
        $campus_id = 1;
      }elseif($location == 8){
        $campus_id = 1;
      }else{$campus_id = 2;}
      
      return $campus_id;
    
    }

    //Parents daypass Save Data parent_save_data
    public function ParentSaveData(Request $request){

      $real_time=0;
      $gf_id=$request->gf_id;
      $location=$request->location;
      $visitor=$request->visitor;
      $purpose=$request->purpose;
      $person=$request->person;
      $department=$request->department;
      $RFID_no=$request->RFID_no;
      $fathername=$request->fathername;
      $mothername=$request->mothername;
      $fathermobile=$request->fathermobile;
      $mothermobile=$request->mothermobile;
      $fathernic=$request->fathernic;
      $mothernic=$request->mothernic;
      $mytime = Carbon::now('Asia/Karachi');
      $real_time=$mytime->format('h:i:s A');
      $userID = Sentinel::getUser()->id;
      $time = $real_time;
      $timeNow = time();
      $Today_Data = date('Y-m-d');
      $campus_id = $this->getBranchId($location);
      if( $RFID_no != '' && $visitor != ''){ //If not Empty RFID_no, visitor card information
        $class_list_model = new class_list; 
        $visitor_model = new visitor;
          if($visitor == 'F' ){ // Start if father and both Visit condition true
            $visitor_card = $visitor_model->getParentCardInfo(1,$RFID_no);
            $RFID_hex = $visitor_card[0]->card_rfid_hex;
            $parent_reg_record_found=$visitor_model->checkVisitorReg($fathername,$campus_id,$fathernic,$RFID_no);
            if($parent_reg_record_found>0){
              $checktime = $visitor_model->gettimedata($fathernic,$RFID_no);
              if($checktime[0]->time_out == 0){

                $data = array(
                  'location_id' => $location,
                  'campus_id' => $campus_id,
                  'type_id' => 1,
                  'no_of_persons' => 1,
                  'name' => $fathername,
                  'nic' => $fathernic,
                  'mobile_phone' => $fathermobile,
                  'gender' => $visitor,
                  'purpose' => $purpose,
                  'contact_person' => $person,
                  'contact_department' => $department,
                  'description' => $purpose,
                  'rfid_dec' => $RFID_no,
                  'rfid_hex' => $RFID_hex,
                  'time_out' => $timeNow,
                  'modified' => time(),
                  'modified_by' => $userID,
                  'record_deleted' => 0
                );
                $parent_attendance= $visitor_model->updateVisitorReg($fathername,$campus_id,$fathernic,$RFID_no,$data);

              }else{
                  $visitor_model->location_id = $location;
                  $visitor_model->campus_id = $campus_id;
                  $visitor_model->type_id = 1;
                  $visitor_model->no_of_persons = 1;
                  $visitor_model->name = $fathername;
                  $visitor_model->nic = $fathernic;
                  $visitor_model->mobile_phone = $fathermobile;
                  $visitor_model->gender = $visitor;
                  $visitor_model->purpose = $purpose;
                  $visitor_model->contact_person = $person;
                  $visitor_model->contact_department = $department;
                  $visitor_model->description = $purpose;
                  $visitor_model->rfid_dec = $RFID_no;
                  $visitor_model->rfid_hex = $RFID_hex;
                  $visitor_model->time_in = $timeNow;
                  $visitor_model->time_out = 0;
                  $visitor_model->created = $timeNow;
                  $visitor_model->register_by = $userID;
                  $visitor_model->modified = 0;
                  $visitor_model->modified_by =0;
                  $visitor_model->record_deleted = 0;
                  $visitor_model->save();

              }
            }
            else{
                  $visitor_model->location_id = $location;
                  $visitor_model->campus_id = $campus_id;
                  $visitor_model->type_id = 1;
                  $visitor_model->no_of_persons = 1;
                  $visitor_model->name = $fathername;
                  $visitor_model->nic = $fathernic;
                  $visitor_model->mobile_phone = $fathermobile;
                  $visitor_model->gender = $visitor;
                  $visitor_model->purpose = $purpose;
                  $visitor_model->contact_person = $person;
                  $visitor_model->contact_department = $department;
                  $visitor_model->description = $purpose;
                  $visitor_model->rfid_dec = $RFID_no;
                  $visitor_model->rfid_hex = $RFID_hex;
                  $visitor_model->time_in = $timeNow;
                  $visitor_model->time_out = 0;
                  $visitor_model->created = $timeNow;
                  $visitor_model->register_by = $userID;
                  $visitor_model->modified = 0;
                  $visitor_model->modified_by =0;
                  $visitor_model->record_deleted = 0;
                  $visitor_model->save();
            }
          } // End if father and both Visit condition true
          elseif($visitor == 'M'){ // Start if Mother and both Visit condition true
            $visitor_card = $visitor_model->getParentCardInfo(1,$RFID_no);
            $RFID_hex = $visitor_card[0]->card_rfid_hex;
            $parent_reg_record_found=$visitor_model->checkVisitorReg($mothername,$campus_id,$mothernic,$RFID_no);
            if($parent_reg_record_found>0){
              $checktime = $visitor_model->gettimedata($mothernic,$RFID_no);
              if($checktime[0]->time_out == 0){

                 $data = array(
                'location_id' => $location,
                'campus_id' => $campus_id,
                'type_id' => 1,
                'no_of_persons' => 1,
                'name' => $mothername,
                'nic' => $mothernic,
                'mobile_phone' => $mothermobile,
                'gender' => $visitor,
                'purpose' => $purpose,
                'contact_person' => $person,
                'contact_department' => $department,
                'description' => $purpose,
                'rfid_dec' => $RFID_no,
                'rfid_hex' => $RFID_hex,
                'time_out' => $timeNow,
                'modified' => time(),
                'modified_by' => $userID,
                'record_deleted' => 0
              );
              $parent_attendance= $visitor_model->updateVisitorReg($mothername,$campus_id,$mothernic,$RFID_no,$data);

              }else{
                  $visitor_model->location_id = $location;
                  $visitor_model->campus_id = $campus_id;
                  $visitor_model->type_id = 1;
                  $visitor_model->no_of_persons = 1;
                  $visitor_model->name = $mothername;
                  $visitor_model->nic = $mothernic;
                  $visitor_model->mobile_phone = $mothermobile;
                  $visitor_model->gender = $visitor;
                  $visitor_model->purpose = $purpose;
                  $visitor_model->contact_person = $person;
                  $visitor_model->contact_department = $department;
                  $visitor_model->description = $purpose;
                  $visitor_model->rfid_dec = $RFID_no;
                  $visitor_model->rfid_hex = $RFID_hex;
                  $visitor_model->time_in = $timeNow;
                  $visitor_model->time_out = 0;
                  $visitor_model->created = $timeNow;
                  $visitor_model->register_by = $userID;
                  $visitor_model->modified = 0;
                  $visitor_model->modified_by =0;
                  $visitor_model->record_deleted = 0;
                  $visitor_model->save();

              }
            }
            else{
                  $visitor_model->location_id = $location;
                  $visitor_model->campus_id = $campus_id;
                  $visitor_model->type_id = 1;
                  $visitor_model->no_of_persons = 1;
                  $visitor_model->name = $mothername;
                  $visitor_model->nic = $mothernic;
                  $visitor_model->mobile_phone = $mothermobile;
                  $visitor_model->gender = $visitor;
                  $visitor_model->purpose = $purpose;
                  $visitor_model->contact_person = $person;
                  $visitor_model->contact_department = $department;
                  $visitor_model->description = $purpose;
                  $visitor_model->rfid_dec = $RFID_no;
                  $visitor_model->rfid_hex = $RFID_hex;
                  $visitor_model->time_in = $timeNow;
                  $visitor_model->time_out = 0;
                  $visitor_model->created = $timeNow;
                  $visitor_model->register_by = $userID;
                  $visitor_model->modified = 0;
                  $visitor_model->modified_by =0;
                  $visitor_model->record_deleted = 0;
                  $visitor_model->save();
            }
          } // End if Mother and both Visit condition true
          elseif($visitor == 'O'){ // Start if Other/Guardian Visit condition true
            $visitor_card_Other = $visitor_model->getParentCardInfo(8,$RFID_no);
            $RFID_hex = $visitor_card_Other[0]->card_rfid_hex;
            $parent_reg_record_found=$visitor_model->checkVisitorReg($fathername,$campus_id,$fathernic,$RFID_no);
            if($parent_reg_record_found>0){
              $checktime = $visitor_model->gettimedata($fathernic,$RFID_no);
              if($checktime[0]->time_out == 0){

                $data = array(
                  'location_id' => $location,
                  'campus_id' => $campus_id,
                  'type_id' => 8,
                  'no_of_persons' => 1,
                  'name' => $fathername,
                  'nic' => $fathernic,
                  'mobile_phone' => $fathermobile,
                  'gender' => $visitor,
                  'purpose' => $purpose,
                  'contact_person' => $person,
                  'contact_department' => $department,
                  'description' => $purpose,
                  'rfid_dec' => $RFID_no,
                  'rfid_hex' => $RFID_hex,
                  'time_out' => $timeNow,
                  'modified' => time(),
                  'modified_by' => $userID,
                  'record_deleted' => 0
                );
              $parent_attendance= $visitor_model->updateVisitorReg($fathername,$campus_id,$fathernic,$RFID_no,$data);

              }else{
                  $visitor_model->location_id = $location;
                  $visitor_model->campus_id = $campus_id;
                  $visitor_model->type_id = 8;
                  $visitor_model->no_of_persons = 1;
                  $visitor_model->name = $fathername;
                  $visitor_model->nic = $fathernic;
                  $visitor_model->mobile_phone = $fathermobile;
                  $visitor_model->gender = $visitor;
                  $visitor_model->purpose = $purpose;
                  $visitor_model->contact_person = $person;
                  $visitor_model->contact_department = $department;
                  $visitor_model->description = $purpose;
                  $visitor_model->rfid_dec = $RFID_no;
                  $visitor_model->rfid_hex = $RFID_hex;
                  $visitor_model->time_in = $timeNow;
                  $visitor_model->time_out = 0;
                  $visitor_model->created = $timeNow;
                  $visitor_model->register_by = $userID;
                  $visitor_model->modified = 0;
                  $visitor_model->modified_by =0;
                  $visitor_model->record_deleted = 0;
                  $visitor_model->save();

              }
            }
            else{
                  $visitor_model->location_id = $location;
                  $visitor_model->campus_id = $campus_id;
                  $visitor_model->type_id = 8;
                  $visitor_model->no_of_persons = 1;
                  $visitor_model->name = $fathername;
                  $visitor_model->nic = $fathernic;
                  $visitor_model->mobile_phone = $fathermobile;
                  $visitor_model->gender = $visitor;
                  $visitor_model->purpose = $purpose;
                  $visitor_model->contact_person = $person;
                  $visitor_model->contact_department = $department;
                  $visitor_model->description = $purpose;
                  $visitor_model->rfid_dec = $RFID_no;
                  $visitor_model->rfid_hex = $RFID_hex;
                  $visitor_model->time_in = $timeNow;
                  $visitor_model->time_out = 0;
                  $visitor_model->created = $timeNow;
                  $visitor_model->register_by = $userID;
                  $visitor_model->modified = 0;
                  $visitor_model->modified_by =0;
                  $visitor_model->record_deleted = 0;
                  $visitor_model->save();
            }
          } // End if Other/Guardian Visit condition true
          elseif($visitor == 'B'){ // Start if father and both Visit condition true
            $visitor_card = $visitor_model->getParentCardInfo(1,$RFID_no);
            $RFID_hex = $visitor_card[0]->card_rfid_hex;
            $parent_reg_record_found=$visitor_model->checkVisitorReg($fathername,$campus_id,$fathernic,$RFID_no);
            if($parent_reg_record_found>0){
              $checktime = $visitor_model->gettimedata($fathernic,$RFID_no);
              if($checktime[0]->time_out == 0){

                 $data = array(
                'location_id' => $location,
                'campus_id' => $campus_id,
                'type_id' => 1,
                'no_of_persons' => 2,
                'name' => $fathername,
                'nic' => $fathernic,
                'mobile_phone' => $fathermobile,
                'gender' => $visitor,
                'purpose' => $purpose,
                'contact_person' => $person,
                'contact_department' => $department,
                'description' => $purpose,
                'rfid_dec' => $RFID_no,
                'rfid_hex' => $RFID_hex,
                'time_out' => $timeNow,
                'modified' => time(),
                'modified_by' => $userID,
                'record_deleted' => 0
              );
              $parent_attendance= $visitor_model->updateVisitorReg($fathername,$campus_id,$fathernic,$RFID_no,$data);

              }else{
                  $visitor_model->location_id = $location;
                  $visitor_model->campus_id = $campus_id;
                  $visitor_model->type_id = 1;
                  $visitor_model->no_of_persons = 1;
                  $visitor_model->name = $fathername;
                  $visitor_model->nic = $fathernic;
                  $visitor_model->mobile_phone = $fathermobile;
                  $visitor_model->gender = $visitor;
                  $visitor_model->purpose = $purpose;
                  $visitor_model->contact_person = $person;
                  $visitor_model->contact_department = $department;
                  $visitor_model->description = $purpose;
                  $visitor_model->rfid_dec = $RFID_no;
                  $visitor_model->rfid_hex = $RFID_hex;
                  $visitor_model->time_in = $timeNow;
                  $visitor_model->time_out = 0;
                  $visitor_model->created = $timeNow;
                  $visitor_model->register_by = $userID;
                  $visitor_model->modified = 0;
                  $visitor_model->modified_by =0;
                  $visitor_model->record_deleted = 0;
                  $visitor_model->save();

              }
            }
            else{
                  $visitor_model->location_id = $location;
                  $visitor_model->campus_id = $campus_id;
                  $visitor_model->type_id = 1;
                  $visitor_model->no_of_persons = 1;
                  $visitor_model->name = $fathername;
                  $visitor_model->nic = $fathernic;
                  $visitor_model->mobile_phone = $fathermobile;
                  $visitor_model->gender = $visitor;
                  $visitor_model->purpose = $purpose;
                  $visitor_model->contact_person = $person;
                  $visitor_model->contact_department = $department;
                  $visitor_model->description = $purpose;
                  $visitor_model->rfid_dec = $RFID_no;
                  $visitor_model->rfid_hex = $RFID_hex;
                  $visitor_model->time_in = $timeNow;
                  $visitor_model->time_out = 0;
                  $visitor_model->created = $timeNow;
                  $visitor_model->register_by = $userID;
                  $visitor_model->modified = 0;
                  $visitor_model->modified_by =0;
                  $visitor_model->record_deleted = 0;
                  $visitor_model->save();
            }
          } // End if father and both Visit condition true
          else{
            echo 'Visitor Not Define...Please Define First' ;
          }
      } 
      else{
        echo 'Please Check Tap Card And select Visitor.';
      }

    }

    //Parents daypass Save Data tap_parent_save_data
    public function TapParentSaveData(Request $request){

      $real_time=0;
      $RFID= $request->RFID;
      $location=$request->location;
      $visitor_model = new visitor;
      $visitor_card = $visitor_model->GetGS_IDForTapOutParent(1,$RFID);
      if(@$visitor_card[0]->gf_id != 0){
        $gf_id =  $visitor_card[0]->gf_id;
        $userID = Sentinel::getUser()->id;
        $class_list_model = new class_list;
        $visitor_model = new visitor; 
        $student_registered_model = new student_registered;
        $mytime = Carbon::now('Asia/Karachi');
        $real_time=$mytime->format('h:i:s A');
        $time = $real_time;
        $timeNow = time();
        $stdfamilyinfo["family"] = $class_list_model->GetParentInfoGF_ID($gf_id);
        $stdfamilyinfo["student"] = $class_list_model->get_students_by_gfid($gf_id);
        $stdfamilyinfo["fatherpix"] = $student_registered_model->getFatherPhotoPath($gf_id);
        $stdfamilyinfo["family_info"] = $class_list_model->getStudentFamilyRecord($gf_id);
        // For Father
        $siblings = $student_registered_model->getSiblingsInfo2($gf_id);
        $fatherphoto500="";
        $PhotoID = 0;
        $father_name ="";
        $father_name = $siblings[0]->Father_name;
        if( $siblings[0]->is_Staff==1 )
        {
          $PhotoID = $siblings[0]->father_photo;
          if (!file_exists(STAFF_PIC_500 . $PhotoID . PIC500_TYPE)){
            $PhotoID = 'NoPic';
          } 
          $fatherphoto500 = STAFF_PIC_500 . $PhotoID . PIC500_TYPE; 
        }else 
        {
          $PhotoID = $siblings[0]->father_photo;
          if (!file_exists(FATHER_PIC_500 . $PhotoID . PIC500_TYPE)){
            $PhotoID = 'NoPic';
          } 
          $fatherphoto500 = FATHER_PIC_500 . $PhotoID . PIC500_TYPE; 
        }
        //For Mother
        $siblings2 = $student_registered_model->getSiblingsInfo3($gf_id);
        $motherphoto500="";
        $PhotoID = 0;
        $mother_name ="";
        $mother_name = $siblings2[0]->mother_name;
        if( $siblings2[0]->is_Staff==1 )
        {
          $PhotoID = $siblings2[0]->mother_photo;
          if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
            $PhotoID = 'NoPic';
          } 
          $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE; 
        }else 
        {
          $PhotoID = $siblings2[0]->mother_photo;
          if (!file_exists(MOTHER_PIC_500 . $PhotoID . PIC500_TYPE)){
            $PhotoID = 'NoPic';
          } 
          $motherphoto500 = MOTHER_PIC_500 . $PhotoID . PIC500_TYPE;
        }

        //srtat here
        $visitot_data = $visitor_model->getvivitordata($RFID);
        $campus_id = $visitot_data[0]->campus_id;
        $name = $visitot_data[0]->name;
        $visitor = $visitot_data[0]->gender;
        $fathernic = $visitot_data[0]->nic;

        $visitor_card = $visitor_model->getParentCardInfo(1,$RFID);
        $RFID_hex = $visitor_card[0]->card_rfid_hex;
        if( !empty( $visitor_card ) ){ //If not Empty RFID_no, visitor card information
            $parent_reg_record_found=$visitor_model->checkVisitorReg($name,$campus_id,$fathernic,$RFID);
            if($parent_reg_record_found>0){
              $checktime = $visitor_model->gettimedata($fathernic,$RFID);

              if($checktime[0]->time_out == 0){

                $data = array(
                'location_id' => $location,
                'campus_id' => $campus_id,
                'type_id' => 1,
                'no_of_persons' => 1,
                'name' => $name,
                'nic' => $fathernic,
                'rfid_dec' => $RFID,
                'rfid_hex' => $RFID_hex,
                'time_out' => $timeNow,
                'modified' => time(),
                'modified_by' => $userID,
                'record_deleted' => 0
                );
                $parent_attendance= $visitor_model->updateVisitorReg($name,$campus_id,$fathernic,$RFID,$data);

              }
            }
        }
        // end here
        return view('attendance.staff.parents')->with(array('stdfamilyinfo' => $stdfamilyinfo,  "fatherpic" => $fatherphoto500, "Father_name"=>$father_name, "motherpic" => $motherphoto500, "Mother_name"=>$mother_name,"time"=>$time  ));
      }
      else{
        return view('attendance.staff.notfound');
      }

    }

    //Admission  daypass Save Data admission_save_data
    public function AdmissionSaveData(Request $request){

      $real_time=0;
      $admission_nic = $request->admission_nic;
      $admission_name = $request->admission_name;
      $admission_mobile = $request->admission_mobile;
      $admission_purpose = $request->admission_purpose;
      $admission_applicant = $request->admission_applicant;
      $admission_grade = $request->admission_grade;
      $location= $request->location;
      $typeid = $request->typeid;
      $admission_rfid = $request->admission_rfid;
      $campus_id = $this->getBranchId($location);
      $admission_visitor = 'Admission';
      $admission_department = 'Front Office';
      $mytime = Carbon::now('Asia/Karachi');
      $real_time=$mytime->format('h:i:s A');
      $userID = Sentinel::getUser()->id;
      $time = $real_time;
      $timeNow = time();
      $Today_Date = date('Y-m-d');
      $visitor_model = new visitor;
      $visitor_card = $visitor_model->getCardInfo($admission_rfid);
      if($visitor_card != 0){
        $visitor_card_num = $visitor_model->getParentCardInfo($typeid,$admission_rfid);
        if(!empty($visitor_card_num)){
          $admission_hex = $visitor_card_num[0]->card_rfid_hex;
          $parent_reg_record_found = $visitor_model->checkVisitorRecordExistance($admission_rfid,$Today_Date);
          if($parent_reg_record_found>0){
            $checktime = $visitor_model->gettimedata($admission_nic,$admission_rfid);
            if($checktime[0]->time_out == 0){

              $data = array(
              'location_id' => $location,
              'campus_id' => $campus_id,
              'type_id' => $typeid,
              'no_of_persons' => 1,
              'name' => $admission_name,
              'nic' => $admission_nic,
              'mobile_phone' => $admission_mobile,
              'gender' => $admission_visitor,
              'purpose' => $admission_purpose,
              'contact_person' => $admission_applicant,
              'contact_department' => $admission_department,
              'description' => $admission_grade,
              'rfid_dec' => $admission_rfid,
              'rfid_hex' => $admission_hex,
              'time_out' => $timeNow,
              'modified' => time(),
              'modified_by' => $userID,
              'record_deleted' => 0
              );
              $admission_attendance= $visitor_model->updateVisitorReg($admission_name,$campus_id,$admission_nic,$admission_rfid,$data);

            }
            else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $admission_name;
                $visitor_model->nic = $admission_nic;
                $visitor_model->mobile_phone = $admission_mobile;
                $visitor_model->gender = $admission_visitor;
                $visitor_model->purpose = $admission_purpose;
                $visitor_model->contact_person = $admission_applicant;
                $visitor_model->contact_department = $admission_department;
                $visitor_model->description = $admission_grade;
                $visitor_model->rfid_dec = $admission_rfid;
                $visitor_model->rfid_hex = $admission_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();

            }
          $applicationerror= "pass";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);

          }
          else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $admission_name;
                $visitor_model->nic = $admission_nic;
                $visitor_model->mobile_phone = $admission_mobile;
                $visitor_model->gender = $admission_visitor;
                $visitor_model->purpose = $admission_purpose;
                $visitor_model->contact_person = $admission_applicant;
                $visitor_model->contact_department = $admission_department;
                $visitor_model->description = $admission_grade;
                $visitor_model->rfid_dec = $admission_rfid;
                $visitor_model->rfid_hex = $admission_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();
          $applicationerror= "pass";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
          }
        }
        else{
          $applicationerror= "else inner";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
        }

      }
      else{
          $applicationerror= "else main";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
      }

    }

    //Applicant  daypass Save Data applicant_save_data
    public function ApplicantSaveData(Request $request){

      $real_time=0;
      $applicant_nic = $request->applicant_nic;
      $applicant_name = $request->applicant_name;
      $applicant_mobile = $request->applicant_mobile;
      $applicant_purpose = $request->applicant_purpose;
      $applicant_rfid = $request->applicant_rfid;
      $location= $request->location;
      $typeid = $request->typeid;
      $campus_id = $this->getBranchId($location);
      $applicant_visitor = 'Applicant';
      $admission_department = 'HR';
      $mytime = Carbon::now('Asia/Karachi');
      $real_time=$mytime->format('h:i:s A');
      $userID = Sentinel::getUser()->id;
      $time = $real_time;
      $timeNow = time();
      $Today_Date = date('Y-m-d');
      $visitor_model = new visitor;
      $visitor_card = $visitor_model->getCardInfo($applicant_rfid);
      if($visitor_card != 0){
        $visitor_card_num = $visitor_model->getParentCardInfo($typeid,$applicant_rfid);
        if(!empty($visitor_card_num)){
          $applicant_hex = $visitor_card_num[0]->card_rfid_hex;
          $parent_reg_record_found = $visitor_model->checkVisitorRecordExistance($applicant_rfid,$Today_Date);
          if($parent_reg_record_found>0){
            $checktime = $visitor_model->gettimedata($applicant_nic,$applicant_rfid);
            if($checktime[0]->time_out == 0){

              $data = array(
              'location_id' => $location,
              'campus_id' => $campus_id,
              'type_id' => $typeid,
              'no_of_persons' => 1,
              'name' => $applicant_name,
              'nic' => $applicant_nic,
              'mobile_phone' => $applicant_mobile,
              'purpose' => $applicant_purpose,
              'description' => $applicant_visitor,
              'rfid_dec' => $applicant_rfid,
              'rfid_hex' => $applicant_hex,
              'time_out' => $timeNow,
              'modified' => time(),
              'modified_by' => $userID,
              'record_deleted' => 0
              );
              $applicant_attendance= $visitor_model->updateVisitorReg($applicant_name,$campus_id,$applicant_nic,$applicant_rfid,$data);

            }
            else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $applicant_name;
                $visitor_model->nic = $applicant_nic;
                $visitor_model->mobile_phone = $applicant_mobile;
                $visitor_model->purpose = $applicant_purpose;
                $visitor_model->description = $applicant_visitor;
                $visitor_model->rfid_dec = $applicant_rfid;
                $visitor_model->rfid_hex = $applicant_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();

            }
          $applicationerror= "pass";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);

          }
          else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $applicant_name;
                $visitor_model->nic = $applicant_nic;
                $visitor_model->mobile_phone = $applicant_mobile;
                $visitor_model->purpose = $applicant_purpose;
                $visitor_model->description = $applicant_visitor;
                $visitor_model->rfid_dec = $applicant_rfid;
                $visitor_model->rfid_hex = $applicant_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();
          $applicationerror= "pass";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
          }
        }
        else{
          $applicationerror= "else inner";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
        }      

      }
      else{
          $applicationerror= "else main";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
      }

    }

    //Vendor  daypass Save Data vendor_save_data
    public function VendorSaveData(Request $request){

      $real_time=0;
      $vendor_nic = $request->vendor_nic;
      $vendor_name = $request->vendor_name;
      $vendor_mobile = $request->vendor_mobile;
      $vendor_purpose = $request->vendor_purpose;
      $vendor_visiting = $request->vendor_visiting;
      $vendor_depart = $request->vendor_depart;
      $vendor_rfid = $request->vendor_rfid;
      $location= $request->location;
      $typeid = $request->typeid;
      $campus_id = $this->getBranchId($location);
      $vendor_description = 'Vendor';
      $mytime = Carbon::now('Asia/Karachi');
      $real_time=$mytime->format('h:i:s A');
      $userID = Sentinel::getUser()->id;
      $time = $real_time;
      $timeNow = time();
      $Today_Date = date('Y-m-d');
      $visitor_model = new visitor;
      $visitor_card = $visitor_model->getCardInfo($vendor_rfid);
      if($visitor_card != 0){
        $visitor_card_num = $visitor_model->getParentCardInfo($typeid,$vendor_rfid);
        if(!empty($visitor_card_num)){
          $vendor_hex = $visitor_card_num[0]->card_rfid_hex;
          $parent_reg_record_found = $visitor_model->checkVisitorRecordExistance($vendor_rfid,$Today_Date);
          if($parent_reg_record_found>0){
            $checktime = $visitor_model->gettimedata($vendor_nic,$vendor_rfid);
            if($checktime[0]->time_out == 0){

              $data = array(
              'location_id' => $location,
              'campus_id' => $campus_id,
              'type_id' => $typeid,
              'no_of_persons' => 1,
              'name' => $vendor_name,
              'nic' => $vendor_nic,
              'mobile_phone' => $vendor_mobile,
              'purpose' => $vendor_purpose,
              'contact_person' => $vendor_visiting,
              'contact_department' => $vendor_depart,
              'description' => $vendor_description,
              'rfid_dec' => $vendor_rfid,
              'rfid_hex' => $vendor_hex,
              'time_out' => $timeNow,
              'modified' => time(),
              'modified_by' => $userID,
              'record_deleted' => 0
              );
              $applicant_attendance= $visitor_model->updateVisitorReg($vendor_name,$campus_id,$vendor_nic,$vendor_rfid,$data);

            }
            else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $vendor_name;
                $visitor_model->nic = $vendor_nic;
                $visitor_model->mobile_phone = $vendor_mobile;
                $visitor_model->purpose = $vendor_purpose;
                $visitor_model->contact_person = $vendor_visiting;
                $visitor_model->contact_department = $vendor_depart;
                $visitor_model->description = $vendor_description;
                $visitor_model->rfid_dec = $vendor_rfid;
                $visitor_model->rfid_hex = $vendor_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();

            }
          $applicationerror= "pass";
          return response()->json([
              'applicationerror' => $applicationerror
          ]);

          }
          else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $vendor_name;
                $visitor_model->nic = $vendor_nic;
                $visitor_model->mobile_phone = $vendor_mobile;
                $visitor_model->purpose = $vendor_purpose;
                $visitor_model->contact_person = $vendor_visiting;
                $visitor_model->contact_department = $vendor_depart;
                $visitor_model->description = $vendor_description;
                $visitor_model->rfid_dec = $vendor_rfid;
                $visitor_model->rfid_hex = $vendor_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();
          $applicationerror= "pass";
          return response()->json([
              'applicationerror' => $applicationerror
          ]);
          }
        }
        else{
          $applicationerror= "else inner";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
        }

      }
      else{
          $applicationerror= "else main";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
      }

    }

    //Worker  daypass Save Data vendor_save_data
    public function WorkerSaveData(Request $request){

      $real_time=0;
      $worker_nic = $request->worker_nic;
      $worker_name = $request->worker_name;
      $worker_mobile = $request->worker_mobile;
      $worker_purpose = $request->worker_purpose;
      $worker_visiting = $request->worker_visiting;
      $worker_depart = $request->worker_depart;
      $worker_rfid = $request->worker_rfid;
      $location= $request->location;
      $typeid = $request->typeid;
      $campus_id = $this->getBranchId($location);
      $worker_description = 'Worker';
      $mytime = Carbon::now('Asia/Karachi');
      $real_time=$mytime->format('h:i:s A');
      $userID = Sentinel::getUser()->id;
      $time = $real_time;
      $timeNow = time();
      $Today_Date = date('Y-m-d');
      $visitor_model = new visitor;
      $visitor_card = $visitor_model->getCardInfo($worker_rfid);
      if($visitor_card != 0){
        $visitor_card_num = $visitor_model->getParentCardInfo($typeid,$worker_rfid);
        if(!empty($visitor_card_num)){
          $worker_hex = $visitor_card_num[0]->card_rfid_hex;
          $parent_reg_record_found = $visitor_model->checkVisitorRecordExistance($worker_rfid,$Today_Date);
          if($parent_reg_record_found>0){
            $checktime = $visitor_model->gettimedata($worker_nic,$worker_rfid);
            if($checktime[0]->time_out == 0){

              $data = array(
              'location_id' => $location,
              'campus_id' => $campus_id,
              'type_id' => $typeid,
              'no_of_persons' => 1,
              'name' => $worker_name,
              'nic' => $worker_nic,
              'mobile_phone' => $worker_mobile,
              'purpose' => $worker_purpose,
              'contact_person' => $worker_visiting,
              'contact_department' => $worker_depart,
              'description' => $worker_description,
              'rfid_dec' => $worker_rfid,
              'rfid_hex' => $worker_hex,
              'time_out' => $timeNow,
              'modified' => time(),
              'modified_by' => $userID,
              'record_deleted' => 0
              );
              $applicant_attendance= $visitor_model->updateVisitorReg($worker_name,$campus_id,$worker_nic,$worker_rfid,$data);

            }
            else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $worker_name;
                $visitor_model->nic = $worker_nic;
                $visitor_model->mobile_phone = $worker_mobile;
                $visitor_model->purpose = $worker_purpose;
                $visitor_model->contact_person = $worker_visiting;
                $visitor_model->contact_department = $worker_depart;
                $visitor_model->description = $worker_description;
                $visitor_model->rfid_dec = $worker_rfid;
                $visitor_model->rfid_hex = $worker_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();

            }
          $applicationerror= "pass";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);

          }
          else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $worker_name;
                $visitor_model->nic = $worker_nic;
                $visitor_model->mobile_phone = $worker_mobile;
                $visitor_model->purpose = $worker_purpose;
                $visitor_model->contact_person = $worker_visiting;
                $visitor_model->contact_department = $worker_depart;
                $visitor_model->description = $worker_description;
                $visitor_model->rfid_dec = $worker_rfid;
                $visitor_model->rfid_hex = $worker_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();
          $applicationerror= "pass";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
          }
        }
        else{
          $applicationerror= "else inner";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
        }

      }
      else{
          $applicationerror= "else main";
            return response()->json([
              'applicationerror' => $applicationerror
          ]);
      }

    }

    //Worker  daypass Save Data guest_save_data
    public function GuestSaveData(Request $request){

      $real_time=0;
      $guest_nic = $request->guest_nic;
      $guest_name = $request->guest_name;
      $guest_mobile = $request->guest_mobile;
      $guest_purpose = $request->guest_purpose;
      $guest_visiting = $request->guest_visiting;
      $guest_depart = $request->guest_depart;
      $guest_rfid = $request->guest_rfid;
      $location= $request->location;
      $typeid = $request->typeid;
      $campus_id = $this->getBranchId($location);
      $guest_description = 'Guest';
      $mytime = Carbon::now('Asia/Karachi');
      $real_time=$mytime->format('h:i:s A');
      $userID = Sentinel::getUser()->id;
      $time = $real_time;
      $timeNow = time();
      $Today_Date = date('Y-m-d');
      $visitor_model = new visitor;
      $visitor_card = $visitor_model->getCardInfo($guest_rfid);
      if($visitor_card != 0){
        $visitor_card_num = $visitor_model->getParentCardInfo($typeid,$guest_rfid);
        if(!empty($visitor_card_num)){
          $guest_hex = $visitor_card_num[0]->card_rfid_hex;
          $parent_reg_record_found = $visitor_model->checkVisitorRecordExistance($guest_rfid,$Today_Date);
          if($parent_reg_record_found>0){
            $checktime = $visitor_model->gettimedata($guest_nic,$guest_rfid);
            if($checktime[0]->time_out == 0){

              $data = array(
              'location_id' => $location,
              'campus_id' => $campus_id,
              'type_id' => $typeid,
              'no_of_persons' => 1,
              'name' => $guest_name,
              'nic' => $guest_nic,
              'mobile_phone' => $guest_mobile,
              'purpose' => $guest_purpose,
              'contact_person' => $guest_visiting,
              'contact_department' => $guest_depart,
              'description' => $guest_description,
              'rfid_dec' => $guest_rfid,
              'rfid_hex' => $guest_hex,
              'time_out' => $timeNow,
              'modified' => time(),
              'modified_by' => $userID,
              'record_deleted' => 0
              );
              $applicant_attendance= $visitor_model->updateVisitorReg($guest_name,$campus_id,$guest_nic,$guest_rfid,$data);

            }
            else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $guest_name;
                $visitor_model->nic = $guest_nic;
                $visitor_model->mobile_phone = $guest_mobile;
                $visitor_model->purpose = $guest_purpose;
                $visitor_model->contact_person = $guest_visiting;
                $visitor_model->contact_department = $guest_depart;
                $visitor_model->description = $guest_description;
                $visitor_model->rfid_dec = $guest_rfid;
                $visitor_model->rfid_hex = $guest_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();

            }
          $applicationerror= "pass";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);

          }
          else{
                $visitor_model->location_id = $location;
                $visitor_model->campus_id = $campus_id;
                $visitor_model->type_id = $typeid;
                $visitor_model->no_of_persons = 1;
                $visitor_model->name = $guest_name;
                $visitor_model->nic = $guest_nic;
                $visitor_model->mobile_phone = $guest_mobile;
                $visitor_model->purpose = $guest_purpose;
                $visitor_model->contact_person = $guest_visiting;
                $visitor_model->contact_department = $guest_depart;
                $visitor_model->description = $guest_description;
                $visitor_model->rfid_dec = $guest_rfid;
                $visitor_model->rfid_hex = $guest_hex;
                $visitor_model->time_in = $timeNow;
                $visitor_model->time_out = 0;
                $visitor_model->created = $timeNow;
                $visitor_model->register_by = $userID;
                $visitor_model->modified = 0;
                $visitor_model->modified_by =0;
                $visitor_model->record_deleted = 0;
                $visitor_model->save();
          $applicationerror= "pass";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
          }
        }
        else{
          $applicationerror= "else inner";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
        }

      }
      else{
        $applicationerror= "else main";
          return response()->json([
            'applicationerror' => $applicationerror
          ]);
      }

    }

    // Interim card Tap In ZK
    public function Tap_In_Interim(Request $request){
    
      $interim=$request->interim;
      $staff_id=$request->stafflist_id;
      $tmp_card_no=0;
      $get_interim=array();
      $real_time=0;
      $Return_Data=array();
      $tmpcard_staff_used_model = new tmpcard_staff_used;
      $mytime = Carbon::now('Asia/Karachi');
      $real_time=$mytime->format('g:i A');
      $getdate=$mytime->format('Y-m-d');
      $userID = Sentinel::getUser()->id;
      $get_date = $getdate;
      $time = $real_time;
      $timeNow = time();
      $Today_Data = date('Y-m-d');
      
      if( $interim != '' )
      {
          // Edit By ZK
          // $get_interim_cardno = $tmpcard_staff_used_model->checkinterim($interim);
          $get_interim_cardno = $tmpcard_staff_used_model->checkinterim($interim,3);
          if( !empty($get_interim_cardno))
          {
              $tmp_card_no = $get_interim_cardno[0]->card_no;
              $Return_Data = $tmpcard_staff_used_model->checkStaffRegRecordCardExistance($Today_Data,$interim,$tmp_card_no);
              if( $Return_Data>0 )
              {     
                  $get_interim = $tmpcard_staff_used_model->CheckTapInterim($Today_Data,$interim);
                  $InterimIn = 1;
                    return response()->json([
                      'get_interim_cardno' => $get_interim_cardno,
                      'InterimIn' => $InterimIn,
                      'get_interim' => $get_interim,
                      'Attendance'=>$Return_Data
                    ]);
              
              }else
              {
                  $data = array(
                    'staff_id' => $staff_id,
                    'tmp_card_no' => $tmp_card_no,
                    'org_card_hex' => $interim,
                    'date' => $get_date,
                    'time' => $time,
                    'ip4' => getHostByName(getHostName()),
                    'created' => $timeNow ,
                    'register_by' => $userID,
                    'modified' => time(),
                    'modified_by' => $userID,
                    'record_deleted' => 0
                  
                  );

                  $staff_interim =  $tmpcard_staff_used_model->insert('atif_attendance_staff.tmpcard_staff_used',$data);
                  $InterimIn = 2;
                  $get_interim = $tmpcard_staff_used_model->CheckTapInterim($Today_Data,$interim);
                  
                  return response()->json([
                    'InterimIn' => $InterimIn,
                    'get_interim' => $get_interim,
                    'Attendance'=>$Return_Data
                  ]);

              }
          }
          else 
          { echo "invalid Card Numer";
            $InterimIn = 3;
            return response()->json([
            'InterimIn' => $InterimIn,
            ]);
          }
      
      }
      else
      {
        $InterimIn = 3;
        return response()->json([
        'InterimIn' => $InterimIn,
        ]);
      
      }
    
    }

}
