<?php

namespace App\Http\Controllers\Attendance\Vehicle;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Report\VehicleReportModel;
use App\Models\Report\vehicle_registered_type;

use App\Models\Report\vehicle_registered;
use Illuminate\Support\Collection;


class VehicleReport extends Controller
{
    public function mainPage(){
        $userID = Sentinel::getUser()->id;
        $type_modal = new VehicleReportModel();
         $type_modal['name'] = DB::table('atif.vehicle_registered_type')->get();   

       
        return view('master_layout.vehicle.vehicle_report_view',$type_modal);
    }

   public function Get_Filter(Request $request){

        ini_set('max_execution_time', 50000); //3 minutes

        $section_type = $request['sectiontype'];
        $section_month = $request['sectionmonth'];
        $section_year = $request['sectionyear'];
        $filterdata = new VehicleReportModel();
        $filterdata1 = new vehicle_registered_type();
        $Vehicle_Registered = new vehicle_registered();  
         
            $all_vechiles=$Vehicle_Registered->Vechiles_Data($section_type,$section_month,$section_year);
           
             $type=$filterdata1->Vechiles_Data_type($section_type);

             /*$pagi = vehicle_registered_type::paginate(1); 

                $khan = $type;
                $pagi = $khan;
                */
              //print_r($type);
              //die;


            $time_data_all=$filterdata->Vechiles_Time_Data($section_month,$section_year,$section_type);
            
             $time_get_Vechiles=$filterdata->get_Vechiles_Time($section_month,$section_year);
           

                return view('master_layout/vehicle/filter_data_vehicle',
                          ['get_time_data_all'=>$time_data_all,
                           'qresultsw'=>$all_vechiles,
                           'all_types_data'=>$type,
                           //'pagi'=>$pagi,
                           'time_get_Vechiles'=>$time_get_Vechiles,
                           
                            ]);
       
        }

     
}
