<?php
/******************************************************************
* Author : Rohail Aslam
*******************************************************************/

namespace App\Http\Controllers\Development;
use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_report_modal;
//use App\Models\Staff\Staff_Recruitment\staff_recruitment_area_department_levels;

class staff_recruitment_reports extends Controller
{

  public function index()
  {
     $userID = Sentinel::getUser()->id;

     $filterdata = new Staff_recruitment_report_modal();

      $all_departments=$filterdata->all_departments();
      $all_subjects=$filterdata->all_subjects();

      $all_designations=$filterdata->all_designations();
    


     return view('master_layout.staff.staff_recruitment.staff_recruitment_all_reports', ['all_departments'=>$all_departments,'all_designations'=>$all_designations,'all_subjects'=>$all_subjects]);
    
  }

//Add New Controller for Start End Date  Data By Arif Khan

   public function Get_recruitment_filter(Request $request){

        ini_set('max_execution_time', 50000); 
        $date_1 = $request['date_1'];
        $date_2 = $request['date_2'];

         $filterdata = new Staff_recruitment_report_modal();

         $all_count_screening=$filterdata->filter_report_data_online_screening($date_1,$date_2);

         $all_count_call_for_part_b=$filterdata->filter_report_data_call_for_part_b($date_1,$date_2);

         $all_count_full_screening=$filterdata->filter_report_data_full_screening($date_1,$date_2);

         $all_count_call_b_follow_up=$filterdata->filter_report_data_call_b_followup($date_1,$date_2);

        return view('master_layout/staff/staff_recruitment/reports/filter_data_recruitment_report',
                          ['all_count_screening'=>$all_count_screening,
                            'all_count_call_for_part_b'=>$all_count_call_for_part_b,
                            'all_count_full_screening'=>$all_count_full_screening,
                            'all_count_call_b_follow_up'=>$all_count_call_b_follow_up


                          ]);
      }

      //Add New Controller for Multiple  Data By Arif Khan

     public function staff_recruitment_all_reports_data(Request $request){

              ini_set('max_execution_time', 50000); 
              $departs = $request['departs'];
              $subjects = $request['subjects'];
              $date_depart1 = $request['date_depart1'];
              $date_depart2 = $request['date_depart2'];
              $designations = $request['designations'];
              $campus = $request['campus'];
              $Onlinew = $request['Onlinew'];

              $filterdata = new Staff_recruitment_report_modal();


                       if($date_depart1 !='null' && $date_depart1 !="" ){

                       $all_filter_data=$filterdata->filter_report_data_departs_dates1($date_depart1);

                      }

                     if($subjects !='null' && $subjects !=""){

                       $all_filter_data=$filterdata->filter_report_data_subjects($subjects);

                      }

                     if($departs !='null'&& $departs !=""){

                       $all_filter_data=$filterdata->filter_report_data_departs($departs);
 
                       }
                     if($departs !='null' && $departs !="" && $subjects !='null' && $subjects !=""){

                       $all_filter_data=$filterdata->filter_report_data_departs_subjects($departs,$subjects);

                      }

                     if($subjects !='null' && $subjects !="" && $campus !='null' && $campus !=""){

                       $all_filter_data=$filterdata->filter_report_data_subjects_campus_all($campus,$subjects);

                      }

                     if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !=""){

                       $all_filter_data=$filterdata->filter_report_data_departs_dates($date_depart1,$date_depart2);

                      }


                     if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !="" && $departs !='null'){

                       $all_filter_data=$filterdata->filter_report_data_departs_dates_depart($date_depart1,$date_depart2,$departs);

                      }
 
                      if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !="" && $departs !='null' && $departs !="" && $subjects !='null' && $subjects !="" ){

                       $all_filter_data=$filterdata->filter_report_data_departs_dates_depart_all($date_depart1,$date_depart2,$departs,$subjects);

                       }
                      if($designations !='null' && $designations !=""){

                       $all_filter_data=$filterdata->filter_report_data_departs_dates_depart_desig($designations);

                      }

                      if($campus !='null'  && $campus !="" ){

                       $all_filter_data=$filterdata->filter_report_data_departs_dates_depart_campus($campus);

                      }

                     if($Onlinew !='null'  && $Onlinew !=""){

                       $all_filter_data=$filterdata->filter_report_data_departs_dates_depart_status($Onlinew);

                       }


                     if($departs !='null' && $departs !="" && $subjects !='null' && $subjects !="" && $campus !='null' && $campus !="" ){

                         $all_filter_data=$filterdata->filter_report_data_departs_dates_depart_all_compus($departs,$subjects,$campus);
                      }


                      if($departs !='null' && $departs !="" && $subjects !='null' && $subjects !="" && $campus !='null' && $campus !="" && $designations !='null' && $designations !=""){

                         $all_filter_data=$filterdata->filter_report_data_departs_dates_depart_all_compus_desig($departs,$subjects,$campus,$designations);
                      }

                     if($departs !='null' && $departs !="" && $campus !='null' && $campus !="" && $designations !='null' && $designations !=""){

                         $all_filter_data=$filterdata->filter_report_data_departs_dates_depart_compus_desig($departs,$designations,$campus);
                       }



                       if($departs !='null' && $departs !=""  && $designations !='null' && $designations !="" && $campus !='null' && $campus !=""){

                            $all_filter_data=$filterdata->filter_report_data_departs_dates_depart_compus_desig($departs,$designations,$campus);
                        }


                       if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !=""  && $campus !="" && $campus !='null' && $Onlinew !="" && $Onlinew !='null'){

                         $all_filter_data=$filterdata->filter_report_data_departs_dates_campus_online($date_depart1,$date_depart2,$campus,$Onlinew);
                          }


                      if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !="" &&  $campus !='null' && $campus !="" &&  $Onlinew !='null' && $Onlinew !="" && $departs !='null' && $departs !="" && $subjects !='null' && $subjects !="" && $designations !='null' && $designations !="" ){

                         $all_filter_data=$filterdata->filter_report_data_departs_dates_campus_online_desig_subject_all($date_depart1,$date_depart2,$departs,$subjects,$designations,$campus,$Onlinew);
                        }

                      if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !="" && $subjects !='null' && $subjects !="" && $campus !='null'  && $campus !=""   ){

                         $all_filter_data=$filterdata->filter_report_data_departs_dates_campus_subject_all($date_depart1,$date_depart2,$subjects,$campus);
                         }


                         if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !="" && $subjects !='null' && $subjects !=""){

                          $all_filter_data=$filterdata->filter_report_data_departs_dates_subject_all($date_depart1,$date_depart2,$subjects);
                         }

                          if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !="" && $campus !='null'  && $campus !=""   ){

                          $all_filter_data=$filterdata->filter_report_data_departs_dates_campus_all($date_depart1,$date_depart2,$campus);
                         }

                         if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !="" && $designations !='null'  && $designations !=""   ){

                         $all_filter_data=$filterdata->filter_report_data_departs_dates_desig_all($date_depart1,$date_depart2,$designations);
                         }


                          if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !="" && $designations !='null'  && $designations !="" && $subjects !='null'  && $subjects !="" && $departs !='null'  && $departs !=""   ){

                          $all_filter_data=$filterdata->filter_report_data_departs_dates_desig_subjects_all($date_depart1,$date_depart2,$departs,$subjects,$designations);
                         }



                           if($designations !='null'  && $designations !="" && $subjects !='null'  && $subjects !="" && $departs !='null'  && $departs !=""   ){

                          $all_filter_data=$filterdata->filter_report_subjects_desig_subjects_all($designations,$subjects,$departs);
                           }


                         if($departs !='null' && $departs !="" && $campus !='null' && $campus !=""){

                            $all_filter_data=$filterdata->filter_report_data_depart_compus($departs,$campus);
                           } 

                           if($subjects !='null' && $subjects !="" && $campus !='null' && $campus !=""){

                            $all_filter_data=$filterdata->filter_report_data_subjects_compus($subjects,$campus);
                           } 


                          if($departs !='null' && $departs !="" && $Onlinew !='null' && $Onlinew !=""){

                              $all_filter_data=$filterdata->filter_report_data_depart_online($departs,$Onlinew);
                             }

                           if($campus !='null'  && $campus !="" && $Onlinew !='null' && $Onlinew !=""){

                            $all_filter_data=$filterdata->filter_report_data_campus_online($campus,$Onlinew);
                           }

                            if($departs !='null' && $departs !="" && $campus !='null'  && $campus !="" && $Onlinew !='null' && $Onlinew !=""){

                            $all_filter_data=$filterdata->filter_report_data_campus_online_depart($departs,$campus,$Onlinew);
                               }


                           if($date_depart1 !='null' && $date_depart1 !="" && $date_depart2 !='null' && $date_depart2 !=""&& $subjects !='null'  && $subjects !="" && $designations !='null'  && $designations !=""   ){

                          $all_filter_data=$filterdata->filter_report_data_departs_dates_desig_subject($date_depart1,$date_depart2,$subjects,$designations);
                         }

                           //Select All Data //

                           if($date_depart1 =="" && $date_depart2 =="" && $departs =='null' && $subjects =='null' && $designations =='null' && $campus =="" && $Onlinew ==""){

                                 $all_filter_data=$filterdata->filter_report_data_departs_dates_depart_null();
                             }


                 return view('master_layout/staff/staff_recruitment/reports/filter_all_data_hr_recruiment_report',['data'=>$all_filter_data]);

      }

    //Add New Controller for Current Date Data By Arif Khan
      public function today_report(Request $request){

        $date_2 = $request['today_date'];
          $filterdata = new Staff_recruitment_report_modal();
        ////echo $date_1;
        /*$status_id_curr=$filterdata->get_statusid_today();
        $current_status = $status_id_curr[0]->status_id_curr;*/
        $all_filter_data=$filterdata->filter_report_data_today($date_2);

        //print_r($all_filter_data);

       // die;



         return view('master_layout/staff/staff_recruitment/reports/filter_all_data_hr_recruiment_report_today',['data'=>$all_filter_data]);

      }
  
}