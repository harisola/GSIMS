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

class ScreeningGate extends Controller
{
    public function mainPage(){

        $userID = Sentinel::getUser()->id;
        $get_attendance_location_model = new attendance_location;
        $staff['attendance_location'] = $get_attendance_location_model->get_location_List();
        return view('attendance.staff.staff_attendance_view')->with(array('staff' => $staff));
        Staff_interim_table_list();
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
      $get_attendance=array();
      $real_time=0;
      $Return_Data=array();
      
      if( $RFID_ID != '' )
      {
          $get_attendance_model =  new staff_attendance_in;
          $get_attendance_tapout_model =  new staff_attendance_out;
          $mytime = Carbon::now('Asia/Karachi');
          $real_time=$mytime->format('g:i A');
          $getdate=$mytime->format('Y-m-d');
          $get_attendance = $get_attendance_model->getStaffAttendanceData($RFID_ID);
          $userID = Sentinel::getUser()->id;
          $staff_id = $get_attendance[0]['staff_id'];
          $get_date = $getdate;
          $time = $real_time;
          $locationid = $request->locationid;
          $date = $request->input('date');
          $missTap = $request->input('missTap');
          $timeNow = time();
          $Today_Data = date('Y-m-d');
          $Return_Data = $get_attendance_model->CheckTapEvent($Today_Data, $staff_id);
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
    
    }

    //Live serach For staff Issue Interim Card
    public function Search_Action(Request $request){ 
      if($request->ajax()) 
      { 
        $output = ''; 
        $query = $request->get('query'); 
        if($query != ''){ 
         echo $data = DB::table('atif.staff_registered')->where('gt_id', 'like', '%'.$query.'%')
                                          ->orWhere('abridged_name', 'like', '%'.$query.'%')
                                          ->orWhere('name_code', 'like', '%'.$query.'%')
                                          ->orderBy('id', 'desc') ->get(); exit;
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

    function fetch_autocomplete(Request $request){
      if($request->get('query'))
      {
        $query = $request->get('query');
        $data = DB::table('atif.staff_registered')->where('gt_id', 'like', '%'.$query.'%')
                                            ->orWhere('abridged_name', 'like', '%'.$query.'%')
                                            ->orWhere('name_code', 'like', '%'.$query.'%')
                                            ->orderBy('id', 'desc') ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
          //$output .= '<li><a href="#">'.$row->name.'</a></li>';
          $output .= '<li class="staff_list_class">'.$row->name.' - <small style="color:#888;">'.$row->gt_id.'</small></li> <input type="hidden" class="stafflist_id"  value="'.$row->id.'" />';
        
           //return $row->id;
        }
        $output .= '</ul>';
        echo $output;
        //return $row;
        //return view('attendance.staff.staff_attendance_modal')->
        //with(array('data' => $data));

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
          $get_interim_cardno = $tmpcard_staff_used_model->checkinterim($interim);
          if( !empty($get_interim_cardno))
          {
              $tmp_card_no = $get_interim_cardno[0]->card_no;
              $Return_Data = $tmpcard_staff_used_model->checkStaffRegRecordCardExistance($Today_Data,$interim,$tmp_card_no);
              // print_r($get_interim_cardno);
              // die;
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
