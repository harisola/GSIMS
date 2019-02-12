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
class vehicle_registered extends Model
{

    public $timestamps = false;
    
      protected $connection = 'default_Atif';
      protected $dbCon = 'mysql';
      protected $table = 'vehicle_registered';

 


     public function Vechiles_Data($section_type,$section_month,$section_year){

        $sql = "select
           av.id,

           date_format(avv.`date`, '%a %d %b, %Y') as dated,
           avv.date as simple_date,
           avv.time 
        from
           atif.vehicle_registered as av 
           LEFT JOIN
              atif_attendance_vehicle.vehicle_attendance_in as avv 
              on av.id = avv.vehicle_id 

        where
           av.register_type = $section_type 
           AND MONTH(avv.date) = $section_month 
           AND YEAR(avv.date) = $section_year 
        group by
           avv.date";

          
                 $Vechiles_Data = DB::connection($this->dbcon)->select($sql);
               
                return $Vechiles_Data;


    }



}