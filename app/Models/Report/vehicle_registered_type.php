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
class vehicle_registered_type extends Model
{

    public $timestamps = false;
      protected $connection = 'default_Atif';
      protected $dbCon = 'mysql';
      protected $table = 'vehicle_registered_type';


     public function Vechiles_Data_type($section_type){

     $sql = "select rt.id as v_id,av.name,rt.register_type,rt.gv_id,rt.name_code,rt.van_number,rt.registration_no,rt.color_id,rt.brand_id,ma.name as make ,co.name as color_name from atif.vehicle_registered_type as av left join atif.vehicle_registered as rt on av.id = rt.register_type left join atif.vehicle_make as ma on rt.make_id = ma.id left join atif.vehicle_color as co on rt.color_id = co.id where av.id =".$section_type." and rt.is_active = 1 ORDER BY rt.van_number ASC";
       
          $Vechiles_Data = DB::connection($this->dbcon)->select($sql);
          return $Vechiles_Data;




			/*$Vechiles_Data = DB::table('atif.vehicle_registered_type')
            ->join('atif.vehicle_registered', 'vehicle_registered_type.id', '=', 'vehicle_registered.register_type')
            
            ->select('vehicle_registered.register_type', 'vehicle_registered_type.id','vehicle_registered.van_number','vehicle_registered.registration_no','vehicle_registered.brand_id','vehicle_registered_type.name')->where('vehicle_registered_type.id',$section_type)->get();
             return $Vechiles_Data;*/
	            //->paginate(2);
				//print_r($Vechiles_Data);

			   // die;


       
          
               
    }
   


   




}