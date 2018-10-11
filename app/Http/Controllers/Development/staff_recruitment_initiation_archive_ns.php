<?php
namespace App\Http\Controllers\Development;
use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_model;


class staff_recruitment_initiation_archive_ns extends Controller
{

  public function index()
  {
  
 

  	$userId = Sentinel::getUser()->id;
  	$staffRecruiment = new Staff_recruitment_model();
  	$RecruimentData = $staffRecruiment->get_recruitment_archive_data();
    $tag = $staffRecruiment->get_tag();
    $grade = $staffRecruiment->get_grade();
    $status = $staffRecruiment->get_status();
    $campus = $staffRecruiment->get_branch();
    $career_allocation = $staffRecruiment->get_allocation();
    $get_getTags = $staffRecruiment->get_getTags();



  	return view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_archive_view')
  			->with(array('staffRecruiment' => $RecruimentData,'tag'=> $tag,'grade'=>$grade,'status'=> $status,'campus' => $campus,'career_allocation'=>$career_allocation,"get_getTags"=>$get_getTags));
  }


}