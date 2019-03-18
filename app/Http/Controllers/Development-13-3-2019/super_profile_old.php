<?php

/******************************************************************
* Author: 	Rohail Aslam
* Email: 	r.aslam@generations.edu.pk
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Staff\Staff_Information\Super_Profile_Model;

class super_profile extends Controller
{

        public function __construct(){
            $this->superModel = new Super_Profile_Model();
        }


    	public function getSuperProfile(){
    		
    		$userId = Sentinel::getUser()->id;
    		// Model Load
    		$superModel = new Super_Profile_Model();

    		// Model Call
    		$profileDetail = $superModel->getProfileDetail();





    		$where  = array('Type'=>'Staff');
    		$superProfileDetail = $superModel->get('atif_gs_events.event_category',$where);
            $getSuperProfile = $superModel->getSuperProfile();
			
			//'var_dump($profileDetail);'
			 //'var_dump($superProfileDetail);'
			//'var_dump($getSuperProfile); '



    		return view('HR.staff.super_profile_view3')->with(array(
    			'profileDetail' => $profileDetail,
    			'superProfile' => $superProfileDetail,
                'getSuperProfileDetails' => $getSuperProfile,
    		));



    	}

    	public function Get_STiming($SProfile_ID,$TTProfile_ID){
			
			$superModel = new Super_Profile_Model();
			$select = '';
			$where = array( 'super_profile_id' => $SProfile_ID, "profile_id"=>$TTProfile_ID );

			return $superModel->get('atif_gs_events.super_profile_time',$where);
		}


        public function insertSuperProfile(Request $request){

                $super_profile = $request->super_profile;
                $super_profile_desc = $request->super_profile_desc;
                if($super_profile_desc == null){
                    $super_profile_desc = '';
                }
                $short_title = strtoupper(substr($super_profile, 0,2));


                $data = array(
                'Type' => 'Staff',
                'cat_name' => $super_profile,
                'cat_short_title' => $short_title,
                'cat_description' => $super_profile_desc,
                'created' => time(),
                'register_by' => Sentinel::getUser()->id,
                'modified' => time(),
                'modified_by' => Sentinel::getUser()->id
                );


                $superModel = new Super_Profile_Model();

                $super_profile_id = $superModel->insertData('atif_gs_events.event_category',$data);
                if($super_profile_id > 0){
                    $where = array( 'profile_type_id' => 1);
                    $tt_profile = $superModel->get('atif_gs_events.tt_profile','',$where);
                    foreach($tt_profile as $profile){
                        $data = array(
                            'super_profile_id' => $super_profile_id,
                            'profile_id' => $profile->id,
                            'is_on_mon' => 0,
                            'is_on_tue' => 0,
                            'is_on_wed' => 0,
                            'is_on_thu' => 0,
                            'is_on_fri' => 0,
                            'is_on_sat' => 0,
                            'is_on_sun' => 0,
                            'created' => time(),
                            'created_by' => Sentinel::getUser()->id,
                            'modified' => time(),
                            'modified_by' => Sentinel::getUser()->id,

                    );
                    echo $inserted_id = $superModel->insertData('atif_gs_events.super_profile_time',$data);
                }

            }
            
        }

        public function get_table_interface(){

            $superModel = new Super_Profile_Model();
            // GET SUPER PROFILE
            $select = '';
            $where = array(
            'Type' => 'Staff'
            );
            $super_profile_desc = $superModel->get('atif_gs_events.event_category',$where);


            // GET TT PROFILE

            $tt_profile = $superModel->getProfileDetail();


            // Get Super Profie Time

            $select = '';
            $where = '';
            $super_profile_time = $superModel->get('atif_gs_events.super_profile_time',$select,$where);


            $html = '';
            $html .= '<table width="" border="1" id="example" class="table table-striped table-bordered table-hover" style="padding:0 20px">';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th class="text-left" width="300">TT Profiles</th>';
            $html .= '<th class="no-sort text-center" width="200">TT Profile Timing</th>';

            foreach($super_profile_desc as $super_profile){
            
            $html .= '<th class="no-sort text-center" width="200" data-super_id="'.$super_profile->ID.'">'.$super_profile->cat_name.'</th>';        

            }

            $html .= '</thead>';

            $html .= '<tbody>';

            foreach($tt_profile as $tt_profile){
                
                $html .= '<tr class="">';
                $html .= '<td class="text-left" data-profile_id="'.$tt_profile->id.'"><strong>'.$tt_profile->name.'</strong></td>';
                $html .= '<td class="text-center"><div class="col-md-12 no-padding"><div class="col-md-5 no-padding">'.date("g:i A",strtotime($tt_profile->mon_in)).'</div><div class="col-md-2">-</div><div class="col-md-5 no-padding">'.date("g:i A",strtotime($tt_profile->mon_out)).'</div></div></td>';

                foreach($super_profile_desc as $super_profile){

                    foreach ($super_profile_time as $super_time) {

                        if($super_profile->ID == $super_time->super_profile_id && $super_time->profile_id == $tt_profile->id){

                            if($super_time->is_on_mon == 1){

                                $html .= '<td class="text-center" ><div class="col-md-12 no-padding"><div class="col-md-5 no-padding"><a href="#" class="MonIN" data-placement="bottom" data-title="Morning" data-profile_id="'.$super_time->profile_id.'" data-super_id="'.$super_time->super_profile_id.'" data-pk="'.$super_time->id.'" data-type="combodate">'.date("g:i A",strtotime($super_time->mon_in)).'</a></div><div class="col-md-2">-</div><div class="col-md-5 no-padding"><a href="#" class="MonOUT" data-placement="bottom" data-title="Afternoon" data-profile_id="'.$super_time->profile_id.'" data-super_id="'.$super_time->super_profile_id.'" data-pk="'.$super_time->id.'" data-type="combodate">'.date("g:i A",strtotime($super_time->mon_out)).'</a></div></div></td>';
                            }else{

                                $html .= '<td class="text-center"><div class="col-md-12 no-padding"><div class="col-md-5 no-padding"><a href="#" class="MonIN" data-placement="bottom" data-title="Morning" data-profile_id="'.$super_time->profile_id.'" data-super_id="'.$super_time->super_profile_id.'" data-pk="'.$super_time->id.'" data-type="combodate">00:00</a></div><div class="col-md-2">-</div><div class="col-md-5 no-padding"><a href="#" class="MonOUT" data-placement="bottom" data-title="Afternoon" data-profile_id="'.$super_time->profile_id.'" data-super_id="'.$super_time->super_profile_id.'" data-pk="'.$super_time->id.'" data-type="combodate">00:00</a></div></div></td>';

                            } // end if else

                        } // END IF
                        
                    } // end super time

                } // end super profile


            } // end tt profile
                
            $html .= '</tbody>';         
            $html .= '</table>';
      
            echo $html;
        }

        public function getSuperProfileInteface(){


            // Model Load
            $superModel = new Super_Profile_Model();

            // Model Call
            $profileDetail = $superModel->getProfileDetail();





            $where  = array('Type'=>'Staff');
            $superProfileDetail = $superModel->get('atif_gs_events.event_category',$where);
            $getSuperProfile = $superModel->getSuperProfile();



            $html = '';

            $html .= '<div class="table-fixed-column-outter">';
            $html .= '<div class="table-fixed-column-inner">';

            $html .= '<table class="table-fixed-column table-fixed-column table table-bordered table-striped" id="harisOla">';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th>TT Profiles</th>';
            $html .= '<th>TT Profile Timings</th>';
            if(!empty($superProfileDetail)){
                
                foreach($superProfileDetail as $p){
                    $html .= '<th>'.ucwords($p->cat_name).'</th>';
                }
               
            }
             $html .= '</tr>';

            $html .='</thead>';
            $html .= '<tbody>';

            if(!empty($profileDetail)) { 
                foreach($profileDetail as $profile) {
                $html .= '<tr>';
                $html .= '<td>'.ucwords($profile->name).'</td>';
                $html .= '<td>'. date('g:i A',strtotime($profile->mon_in)).'-'.date('g:i A',strtotime($profile->mon_out)).'</td>';
                foreach($superProfileDetail as $super) { 
                     foreach($getSuperProfile as $superDetail) {
                        if($superDetail->super_profile_id ==  $super->ID && $superDetail->profile_id == $profile->id ) { 

                $html .= '<td>';
                $html .= '<a href="javascript:void(0)"  class="MonIN" data-placement="bottom" data-title="Morning" data-profile_id ="'. $superDetail->profile_id .'" data-super_profile="'.$superDetail->super_profile_id.'" data-pk="'.$superDetail->id.'" data-type="combodate">'.$superDetail->mon_in .'</a> &nbsp; - &nbsp; ';
                                          
                $html .= '<a href="javascript:void(0)"  class="MonOUT" data-placement="bottom" data-title="Afternoon" data-profile_id ="'.$superDetail->profile_id .'" data-super_profile="'.$superDetail->super_profile_id.'" data-pk="'.$superDetail->id .'" data-type="combodate">'.$superDetail->mon_out.'</a>';
                $html .= '</td>';

                    }

                } 
            } 


            $html .= '</tr>';

        }

    }
      
            $html .= '</tbody>';
            $html .= '</table>';

            $html .= '</div>';
            $html .= '</div>';


            echo $html;
        }

        public function updateTimeIn(Request $request){

            $name = $request->input('name');
            $time = $request->input('value');
            $id = $request->input('pk');

            $where = array(
                'id' => $id
            );

            $data = array(
                'is_on_mon' => 1,
                'is_on_tue' => 1,
                'is_on_wed' => 1,
                'is_on_thu' => 1,
                'is_on_fri' => 1,
                'is_on_sat' => 1,
                'is_on_sun' => 1,
                'mon_in' => date("H:i", strtotime($time)),
                'tue_in' => date("H:i", strtotime($time)),
                'wed_in' => date("H:i", strtotime($time)),
                'thu_in' => date("H:i", strtotime($time)),
                'fri_in' => date("H:i", strtotime($time)),
                'sat_in' => date("H:i", strtotime($time)),
                'sun_in' => date("H:i", strtotime($time)),
                'modified' => time(),
                'modified_by' => Sentinel::getUser()->id
            );


            $update =  $this->superModel->update_data('atif_gs_events.super_profile_time',$where,$data);
            //echo $update;


            // $superModel = new Super_Profile_Model();
            // $from_date = date("Y-m-d");
            // $to_date = date("Y-m-d",strtotime('+3 days'));
            // $update_weeklySheet =  $superModel->updateWeeklyTimeSheet($from_date,$to_date);
        }

    public function updateTimeOut(Request $request){

        $name = $request->input('name');
        $time = $request->input('value');
        $id = $request->input('pk');

        $where = array( 'id' => $id );

        $data = array(
            'is_on_mon' => 1,
            'is_on_tue' => 1,
            'is_on_wed' => 1,
            'is_on_thu' => 1,
            'is_on_fri' => 1,
            'is_on_sat' => 1,
            'is_on_sun' => 1,
            'mon_out' => date("H:i", strtotime($time)),
            'tue_out' => date("H:i", strtotime($time)),
            'wed_out' => date("H:i", strtotime($time)),
            'thu_out' => date("H:i", strtotime($time)),
            'fri_out' => date("H:i", strtotime($time)),
            'sat_out' => date("H:i", strtotime($time)),
            'sun_out' => date("H:i", strtotime($time)),
            'modified' => time(),
            'modified_by' => Sentinel::getUser()->id
        );

        $update =  $this->superModel->update_data('atif_gs_events.super_profile_time',$where,$data);
            echo $update;

        // $superModel = new Super_Profile_Model();
        // $from_date = date("Y-m-d");
        // $to_date = date("Y-m-d",strtotime('+3 days'));
        // $update_weeklySheet =  $superModel->updateWeeklyTimeSheet($from_date,$to_date);

        }


        public function InsertTimeIn(Request $request){

            $time_in = $request->input('value');
            $profile_id = $request->input('profile_id');
            $super_profile_id = $request->input('super_profile_id');

            $where  = array(
                'profile_id' => $profile_id,
                'super_profile_id' => $super_profile_id,
            );

            $superModel = new Super_Profile_Model();

            $superProfile = $superModel->get('atif_gs_events.super_profile_time',$where);


            $data = array(
                    'super_profile_id' => $super_profile_id,
                    'profile_id'=>$profile_id,
                    'is_on_mon' => 1,
                    'is_on_tue' => 1,
                    'is_on_wed' => 1,
                    'is_on_thu' => 1,
                    'is_on_fri' => 1,
                    'is_on_sat' => 1,
                    'is_on_sun' => 1,
                    'mon_in' => date("H:i", strtotime($time_in)),
                    'tue_in' => date("H:i", strtotime($time_in)),
                    'wed_in' => date("H:i", strtotime($time_in)),
                    'thu_in' => date("H:i", strtotime($time_in)),
                    'fri_in' => date("H:i", strtotime($time_in)),
                    'sat_in' => date("H:i", strtotime($time_in)),
                    'sun_in' => date("H:i", strtotime($time_in)),
                    'modified' => time(),
                    'modified_by' => Sentinel::getUser()->id
                );


            if(count($superProfile) != 0){
                // Update

                $id = $superProfile[0]->id;
                $whereSuperProfileID = array(
                    'id' => $id
                );
                $updateSuperProfile  = $superModel->update_data('atif_gs_events.super_profile_time',$whereSuperProfileID,$data);


            }else{
                // Insert
                echo  $insertProfile = $superModel->insertSuperProfile('atif_gs_events.super_profile_time',$data);

            }

        }


        public function InsertTimeOut(Request $request){

            $time_out = $request->input('value');
            $profile_id = $request->input('profile_id');
            $super_profile_id = $request->input('super_profile_id');

            $where  = array(
                'profile_id' => $profile_id,
                'super_profile_id' => $super_profile_id,
            );

            $superModel = new Super_Profile_Model();

            $superProfile = $superModel->get('atif_gs_events.super_profile_time',$where);


            $data = array(
                    'super_profile_id' => $super_profile_id,
                    'profile_id'=>$profile_id,
                    'is_on_mon' => 1,
                    'is_on_tue' => 1,
                    'is_on_wed' => 1,
                    'is_on_thu' => 1,
                    'is_on_fri' => 1,
                    'is_on_sat' => 1,
                    'is_on_sun' => 1,
                    'mon_out' => date("H:i", strtotime($time_out)),
                    'tue_out' => date("H:i", strtotime($time_out)),
                    'wed_out' => date("H:i", strtotime($time_out)),
                    'thu_out' => date("H:i", strtotime($time_out)),
                    'fri_out' => date("H:i", strtotime($time_out)),
                    'sat_out' => date("H:i", strtotime($time_out)),
                    'sun_out' =>date("H:i", strtotime($time_out)),
                    'modified' => time(),
                    'modified_by' => Sentinel::getUser()->id
                );


            if(count($superProfile) != 0){
                // Update

                $id = $superProfile[0]->id;
                $whereSuperProfileID = array(
                    'id' => $id
                );
                $updateSuperProfile  = $superModel->update_data('atif_gs_events.super_profile_time',$whereSuperProfileID,$data);


            }else{
                // Insert
                echo  $insertProfile = $superModel->insertSuperProfile('atif_gs_events.super_profile_time',$data);

            }





        }

        
    
}
