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
use App\Models\Staff\Staff_Information\StaffInformationModel;
use App\Models\Staff\Staff_Adjustment\StaffAdjustmentModel;

class staff_recruitment_process extends Controller{

  public function index(){
    return view('master_layout.staff.staff_recruitment.staff_recruitment_process_view');
  }

}