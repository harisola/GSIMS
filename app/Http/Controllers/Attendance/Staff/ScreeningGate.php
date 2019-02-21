<?php 


namespace App\Http\Controllers\Attendance\Staff;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
//use App\Models\Staff\Staff_Information\StaffInformationModel;

class ScreeningGate extends Controller
{
    public function mainPage(){
        
        return view('attendance.staff.staff_attendance_view');
    }
}