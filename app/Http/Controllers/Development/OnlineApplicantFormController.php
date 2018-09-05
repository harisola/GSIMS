<?php

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Information\StaffInformationModel;

class OnlineApplicantFormController extends Controller
{
    public function mainPage(){
        $userID = Sentinel::getUser()->id;
        $staffInfo = new StaffInformationModel();
        $selectionList = new SelectionList();



        /***** Getting Staff Information of Login User *****/
        $user = $staffInfo->get_Staff_Info(34);


        /***** Getting Staff List *****/
        $staff = $staffInfo->get_Staff_List();



        /**** org - page ****/
        return view('HR.applicant_form.applicant_form_online_view')->with(array('staff' => $staff, 'user' => $user));
    }
}
