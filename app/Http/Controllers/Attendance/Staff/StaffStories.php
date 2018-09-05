<?php 


namespace App\Http\Controllers\Attendance\Staff;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Staff\Staff_Information\StaffInformationModel;

class StaffStories extends Controller
{
    public function addStories(Request $request){



    	$staffInfo = new StaffInformationModel();

        $userID = Sentinel::getUser()->id;
        $comments = $request->input('comment');
        $category_id = $request->input('category_id');
        $category_name = implode (",", $category_id);
        $staff_id = $request->input('staff_id');
         $time = $request->input('time');
        $data = array(
        	'comments' => $comments,
        	'category_id' => $category_name,
        	'staff_id' => $staff_id,
        	'created' => date('Y-m-d H:i:s'),
        	'created_by' => $userID,
        	'modified' => date('Y-m-d H:i:s'),
        	'modified_by' => $userID,
        	'record_deleted' => 0,
        	'date' => date('Y-m-d'),
        	'time' => $time
        );



        $result = $staffInfo->insertComments('atif_gs_events.staff_comments',$data);
        echo $result;

    }
}