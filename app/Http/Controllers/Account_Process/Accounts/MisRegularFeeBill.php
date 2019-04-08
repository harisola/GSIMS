<?php 


namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\fee_bill_mis;


class MisRegularFeeBill extends Controller
{
    public function index()
    {
        $fbmis = new fee_bill_mis();


        $MIS_Data = array();
        $BillCycle_no=5;
        $ASID_From=11;
        $ASID_To=12;
        
        $ASID = $fbmis->get_Academic_Session_id();
        if( !empty( $ASID ) )
        {
            $ASID_From=$ASID[0]->ASID;
            $ASID_To=$ASID[1]->ASID;
        }
        

       $MIS_Data =  $fbmis->Call_Mis_Sp( $BillCycle_no, $ASID_From, $ASID_To );
       
       

        return view('account_process.accounts.fee_bill_mis')->with( array( "MIS_Data"=> $MIS_Data) );
    }


    public function get_fee_bill_mis_ajax(Request $request)
    {
        $fbmis = new fee_bill_mis();

        $MIS_Data = array();
        $BillCycle_no=5;
        $ASID_From=11;
        $ASID_To=12;

        $BillDated='2019-03-15';

        $MisType = $request->input('MisType');
        
        
        


        
        
        $ASID = $fbmis->get_Academic_Session_id();

        if( !empty( $ASID ) )
        {
            $ASID_From=$ASID[0]->ASID;
            $ASID_To=$ASID[1]->ASID;
        }

        if( $MisType == 1 )
        {
            $BillCycle_no = $request->input('Billcycleno');
            $MIS_Data =  $fbmis->Call_Mis_Sp( $BillCycle_no, $ASID_From, $ASID_To );
        }
        else
        {
            // Get Admissoin MIS here...
            $BillDated = date('Y-m-d', strtotime( $request->input('BillDated') ));
            $MIS_Data =  $fbmis->Call_Mis_Sp_adm( $BillDated );
        }
        


        
        
        $html =  view('account_process.accounts.fee_bill_mis_table')->with( array('MIS_Data' => $MIS_Data ) )->render();
        return response()->json(array('success' => true, 'html'=>$html));
    }





}