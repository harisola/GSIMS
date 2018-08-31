<?php

namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\waviers_arrears_model;


class WaviersArrears extends Controller
{
    public function index(){
    $model = new waviers_arrears_model();
    $Data = $model->getStudentsArrearsAdvanceAmount();
    #var_dump($Data); exit;
		return view('account_process.accounts.waviers_arrears')->with( 'concession_info',  $Data );
    }
}
