<?php 


namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
//use App\Models\Staff\Staff_Information\StaffInformationModel;

class NewAdmission extends Controller
{
    public function index(){
        
        return view('account_process.accounts.new_admission_view');
    }
}