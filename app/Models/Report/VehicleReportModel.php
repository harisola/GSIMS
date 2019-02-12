<?php
/******************************************************************
* Author:   Zia Khan
* Email:    ziaisss@gmail.com
* Cell:     +92-342-2775588
*******************************************************************/
namespace App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;
class VehicleReportModel extends Model
{

    public $timestamps = false;
      protected $connection = 'my_VechilesDB';
      protected $dbCon = 'mysql';
      protected $table = 'vehicle_attendance_in';


    public  function Vechiles_Time_Data($section_month,$section_year,$section_type){

        $sql = "select avv.time, avv.vehicle_id, avv.date,vr.register_type  from atif_attendance_vehicle.vehicle_attendance_in as avv left join atif.vehicle_registered vr
            on vr.id=avv.vehicle_id where MONTH(avv.date) = ".$section_month."  AND YEAR(avv.date) = ".$section_year." AND vr.register_type= ".$section_type." group by avv.vehicle_id,avv.date";

                 
                 $vechiles_data_Time = DB::connection($this->dbcon)->select($sql);
                //print_r($vechiles_data_Time);
                 //die;
                return $vechiles_data_Time;

    }

        public static  function get_Vechiles_Time($date,$vehicle_id){

         $sql = "select avv.time from atif_attendance_vehicle.vehicle_attendance_in as avv left join atif.vehicle_registered vr on vr.id=avv.vehicle_id where avv.date='".$date."' AND avv.vehicle_id = ".$vehicle_id." group by avv.vehicle_id,avv.date limit 1 ";
                 $get_vechiles = DB::connection('my_VechilesDB')->select($sql);
                // print_r($get_vechiles);
                // die;
                 //die;

                return $get_vechiles;

    }

       


}