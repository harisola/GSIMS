<?php 


namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
//use App\Models\Staff\Staff_Information\StaffInformationModel;

class MisRegularFeeBill extends Controller
{
    public function index(){
        return view('account_process.accounts.fee_bill_mis');
    }

    public function table_ajax_feebill(Request $request)
    {

        
                
                

               $iTotalRecords = 178;

               $sEcho = intval($request->input('draw') ); 



               $iDisplayLength = intval( $request->input('length'));

                $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
                $iDisplayStart = intval( $request->input('start'));
               
                
                $records = array();
                $records["data"] = array(); 

                $end = $iDisplayStart + $iDisplayLength;
                $end = $end > $iTotalRecords ? $iTotalRecords : $end;

                $status_list = array(
                    array("success" => "Pending"),
                    array("info" => "Closed"),
                    array("danger" => "On Hold"),
                    array("warning" => "Fraud")
                );

                    for($i = $iDisplayStart; $i < $end; $i++) {
                        $status = $status_list[rand(0, 2)];
                        $id = ($i + 1);
                        $records["data"][] = array(
                        '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$id.'"/><span></span></label>',
                        $id,
                        '12/09/2013',
                        'Jhon Doe',
                        'Jhon Doe',
                        '450.60$',
                        rand(1, 10),
                        '<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
                        '<a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a>',
                    );
                }

                $customActionType = $request->input('customActionType');

                if( isset( $customActionType ) )
                {
                    if ( $customActionType  == "group_action" ) 
                    {
                        $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
                        $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
                    }
                    
                }

                

                $records["draw"] = $sEcho;
                $records["recordsTotal"] = $iTotalRecords;
                $records["recordsFiltered"] = $iTotalRecords;
                
                echo json_encode($records);




    }



}