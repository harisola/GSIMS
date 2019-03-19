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



        public function staff_recruitment_all_reports_data(Request $request){

            ini_set('max_execution_time', 50000); 
            $depart = $request['departs'];

            $filterdata = new Staff_recruitment_report_modal();
           
             $depart = explode(" ", $depart);

              /* for($i=0;$i<count($depart);$i++){

                 $depart[$i] = explode(" ",$depart[$i]);
                }*/

                foreach ($depart as $key => $departs){


                 
                 //$all_filter_data=$filterdata->filter_report_data_hr_recruitments($depart);
                  // $all_filter_data=$filterdata->filter_report_data_hr_recruitments($departs);
                    //print_r($departs);

                     if($request->get('departs'))
                    {
                        $query = $request->get('departs');
                       for( $i = 0; $i<$query; $i++ ){



                          $data = DB::table('atif_career.career_dept')->where('id', 'like', '%'.$query[$i].'%')->get();
                                                           /* ->orWhere('abridged_name', 'like', '%'.$query.'%')
                                                            ->orWhere('name_code', 'like', '%'.$query.'%')*/


                               print_r($data);

                                     die;
                                                           
                              }                

              
                }

               
             
              

               /*echo "<pre>";
                print_r($depart);
                exit();*/
                              

            //$all_filter_data=$filterdata->filter_report_data_hr_recruitments($depart);

            //print_r($all_filter_data);
            //die;

          
             return view('master_layout/staff/staff_recruitment/reports/filter_all_data_hr_recruiment_report',['data'=>$data]);
        

       
        }

}
 
}