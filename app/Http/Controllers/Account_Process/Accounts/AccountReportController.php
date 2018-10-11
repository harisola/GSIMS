<?php

namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\account_reports;
use Illuminate\Support\Facades\View;

class AccountReportController extends Controller
{

    public function index()
    {
    	// Get Class List Student
    	$report_model = new account_reports();
        
        $ASession_id_From=11;
        $ASession_id_To=12;
    	$report_data = $report_model->Get_Grade_Fee_Report($ASession_id_From, $ASession_id_To);
    	
    	#var_dump($report_data); exit;

    	// load View if exists
    	return view('account_process.accounts.account_report')->with( 'report_data',  $report_data );
    	

	}
	
	public function getReportInformation(request $request){
		$report_model=new account_reports();
		$acadmic_session_id =$request->get('academic_session');
		$installment_number=$request->get('installment_number');
		$gs_id=$request->get('gs_id');
		$gf_id=$request->get('gf_id');
		$data=$report_model->DetailsOfIssuance($acadmic_session_id,$installment_number,$gs_id,$gf_id);
		return view('account_process.accounts.bill_issuance_table',['issuance_data'=>$data]);
	}

    

}
