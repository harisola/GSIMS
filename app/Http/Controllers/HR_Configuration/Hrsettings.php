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
		// print_r($all_data['get_months_hr'][0]);
			
		// die;
		//return view('HR.settings.hr_configurations_view')->with('pageData', $pageData);
		 return view('HR.settings.hr_configurations_view',$all_data);

		

	}



	public function update_Configurations(Request $request){

		$get_id = $request->input('get_id');
		$cut_off_date = $request->input('cut_off_date');
		$freeze_after = $request->input('freeze_after');
		$hrConfigurations = new hrConfigurations();
		if($cut_off_date != 'null' && $cut_off_date != '')
		{
			
			$hrConfigurations->updateAll($cut_off_date, $get_id);
			echo 'cut_off_date Data saved!';
		}
		else if($freeze_after != 'null' && $freeze_after != '')
		{
		
			$hrConfigurations->updateAllfrez($freeze_after, $get_id);
			echo 'freeze_after Data saved!';
		}

		
	}



	
}





