<?php

namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\account_reports;
use Illuminate\Support\Facades\View;
use App\Models\Accounts\fee_bill;

class AccountReportController extends Controller
{

    public function index()
    {
    	// Get Class List Student
    	$report_model = new account_reports();
        $fee_bill= new fee_bill;
        $ASession_id_From=11;
        $ASession_id_To=12;
    	$report_data = $report_model->Get_Grade_Fee_Report($ASession_id_From, $ASession_id_To);
    	
    	#var_dump($report_data); exit;

    	// load View if exists
        // $get_lastest_bills=$fee_bill->feeInformationFilter($current_acadmic_session,$billing_cycle,$array_ids,$array_section_names,$gs_id,$gf_id,$gt_id,$std_status_id);
        $grade_id=1;
        $academic_session_id=11;
        $bill_cycle_no=1;
        $issuance_report=$fee_bill->getReportByAcademicSession($grade_id,$academic_session_id,$bill_cycle_no);
        $receiving_report=$fee_bill->getReceivingReport($grade_id,$academic_session_id,$bill_cycle_no);
    	return view('account_process.accounts.account_report',
            [
                'report_data'=>  $report_data,
                'issuance_reports'=>  $issuance_report,
            ]
            );
    	

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
