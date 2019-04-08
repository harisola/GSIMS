<?php
/******************************************************************
* Author : Zia Khan
* Email : ziaisss@gmail.com
* Cell : +92-342-2775588
*******************************************************************/
namespace App\Http\Controllers\Attendance\Reports;

use Sentinel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Core\SelectionList;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Reports extends Controller
{
    public function mainPage(){

      return view('attendance.reports.hr_reports_view');

    }

}
