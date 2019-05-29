<?php
/******************************************************************
* Author : Atif Naseem
*******************************************************************/

namespace App\Http\Controllers\HR_Configuration;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\HR\Hr_Configuration_modal as hrConfigurations;


class Hrsettings extends Controller
{
	public function configurations_view(){

		//echo "Working....";
		$userId = Sentinel::getUser()->id;
		$hrConfigurations = new hrConfigurations();
		$all_data['data'] = $hrConfigurations->getAll();
		$all_data['all_data1'] = $hrConfigurations->cut_off_date_data();
		$all_data['freeze'] = $hrConfigurations->freeze_after();
		$all_data['get_months_hr'] = $hrConfigurations->get_months_hr();
		$all_data['get_months_last'] = $hrConfigurations->get_months_last_value();
		
		// die;
		//return view('HR.settings.hr_configurations_view')->with('pageData', $pageData);
		 return view('HR.settings.hr_configurations_view',$all_data);

		

	}  



	public function update_Configurations(Request $request){

		$get_id2 = $request->input('get_id');
		$cut_off_date = $request->input('cut_off_date');
		$freeze_after = $request->input('freeze_after');


		$pre_drpd_value = $request->input('pre_drpd_value');
		$pre_month_id = $request->input('pre_month_id');


		$get_id = $request->input('get_db_id');



		 



		 

		if( $pre_drpd_value == 31 )
		{
			$pre_drpd_value=1;
		}	
		else
		{
			$pre_drpd_value++;
		}




		$hrConfigurations = new hrConfigurations();


		$p = $hrConfigurations->get_pre_months_hr($get_id2);


		$month_start = $p[0]->month_start;

		$mdb_id = $p[0]->mdb_id;

		

		 

		$cut_off_date2 = $cut_off_date;
		if( $cut_off_date2 == 31 )
		{
			$cut_off_date2=1;
		}	
		else
		{
			$cut_off_date2++;
		}






		if($cut_off_date != 'null' && $cut_off_date != '')
		{
			
			$hrConfigurations->updateAll($cut_off_date, $get_id, $pre_drpd_value, $pre_month_id );


			$hrConfigurations->updateAll2($mdb_id, $cut_off_date2 );


			echo 'cut_off_date Data saved!';
		}
		else if($freeze_after != 'null' && $freeze_after != '')
		{


			/*print_r($pre_drpd_value);

			die;*/
		
			$hrConfigurations->updateAllfrez($freeze_after, $get_id2, $pre_drpd_value, $pre_month_id );
			

			echo 'freeze_after Data saved!';
		}






		
	}



	
}





