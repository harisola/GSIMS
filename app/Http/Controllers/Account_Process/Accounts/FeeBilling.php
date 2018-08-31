<?php

namespace App\Http\Controllers\Account_Process\Accounts;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Accounts\fee_concession_model;


class FeeBilling extends Controller
{
    public function index()
    {
      return view('account_process.accounts.fee_billing');
    }



  /*
	* This is remitance payment function setup
	* By this page we can setup remitance payment, search student by Gs_id
	* and setup payment (Fee Bill) mood remitance or pakistani rupess.
  */
	public function remitance()
  {
    $model = new fee_concession_model();
    $return = $model->Get_Remittance();
    $session = $model->GetSession();
    return view('account_process.accounts.remitance')->with(array("AS"=>$return, "session"=>$session));
  }

  public function remitance_right_side()
  {
    $model = new fee_concession_model();
    $return = $model->Get_Remittance();

    $session = $model->GetSession();

    $returnHTML = view('account_process.accounts.remitance_right_side')->with( array( 'AS'=> $return, "session"=>$session ) )->render();

    return response()->json(array('success' => true, 'html'=>$returnHTML));


  }


  public function search_students(Request $request)
  {
    $model = new fee_concession_model();
    $Gs_id = $request->input("Gs_id");
    $return = $model->Get_Std_fb_Info_remittance($Gs_id);

   # var_dump($return); exit;


    $returnHTML = view('account_process.accounts.remitance_search_result')->with( 'concession_info',  $return )->render();

    return response()->json(array('success' => true, 'html'=>$returnHTML));


  }  


  public function Create_Remittance(Request $request) 
  {
    $model = new fee_concession_model();

    $Std_id = $request->input("Sid");
    $Academic = $request->input("Asid");
    $Gs_id = $request->input("Gs_id");

    $Time = time();
    $userID = Sentinel::getUser()->id;

    $Insert_Query = "INSERT INTO `atif_fee_student`.`remittance` (`student_id`, `remittance`, `academic_id`, `remittance_status`, `created_at`, `register_by`, `modified_at`, `modified_by`) VALUES ('".$Std_id."', '1', '".$Academic."', '1', '".$Time."', '".$userID."', '".$Time."', '".$userID."');";

    echo $return = $model->Fun_insert($Insert_Query);
  }


/*$WhereGrade = $this->makeWhereCaluse($GradeID, ',', 'af.grade_name', 0, 'OR', 1);*/

public function makeWhereCaluse($stringArray, $seprator, $makeWithName, $IsNum, $LogicOperator, $RemoveLast){
    $Strings = explode($seprator, $stringArray);

    $i = 1;
    $WhereClause = '';
    if(strpos($stringArray, $seprator)>0){
      $WhereClause = '(';
      foreach ($Strings as $dd) {
        if($dd == 'All' || (count($Strings)==$i && $RemoveLast==1)){
          break;
        }else{
          if($IsNum==0){
$WhereClause .= $makeWithName . "='".trim($dd) . "' " . $LogicOperator . " ";
          }else{
$WhereClause .= $makeWithName . "='".trim($dd)."'" . $LogicOperator . " ";
          }
        }
        $i++;
      }
      $WhereClause = substr($WhereClause, 0, -(strlen($LogicOperator)+2));
      $WhereClause .= ')';
    }else{
      if($stringArray!='' && $stringArray != 'All' && $stringArray != 'All,'){
        //$WhereClause = '(' . $makeWithName . "=".$stringArray. ')';
        $WhereClause = "(".$makeWithName."=". "'".trim($stringArray)."'" .")";
      }
    }

    return $WhereClause;
  }



  public function generate_bill_1(Request $request)
  {

    $model = new fee_concession_model();

    $Gname = $request->input("Gname");
    //$Snames = $request->input("Snames");
    //$st = $request->input("st");

    $Grd = explode(",", $Gname );

    $WhereGrade = '';
    if( sizeof($Grd) > 0 )
    {
    $WhereGrade = $this->makeWhereCaluse($Gname,',','cl.grade_name', 0,'OR', 0) ;
    }else
    {
    $WhereGrade = $WhereGrade .= $this->makeWhereCaluse($Gname,',','cl.grade_name', 0,'OR', 0) ;
    }
    $Create_Section = $this->Create_Section($WhereGrade);

    return response()->json(array('success' => true, 'html'=>$Create_Section));

  }



  public function generate_bill_2(Request $request)
  {

    $model = new fee_concession_model();

    $Gname = $request->input("Gname");
    $Snames = $request->input("Snames");
   

    $Grd = explode(",", $Gname );
    $SGrd = explode(",", $Snames );

    $WhereGrade = '';
    $WhereSection = '';

    if( sizeof($Grd) > 0 )
    {
    $WhereGrade = $this->makeWhereCaluse($Gname,',','cl.grade_name', 0,'OR', 0) ;
    }else
    {
    $WhereGrade = $this->makeWhereCaluse($Gname,',','cl.grade_name', 0,'OR', 0) ;
    }



    if( sizeof($SGrd) > 0 )
    {
    $WhereSection = $this->makeWhereCaluse($Snames,',','cl.section_dname', 0,'OR', 0) ;
    }else
    {
      $WhereSection = $this->makeWhereCaluse($Snames,',','cl.section_dname', 0,'OR', 0) ;
    }
    
    $Create_Section = $this->Create_Status($WhereGrade, $WhereSection);

return response()->json(array('success' => true, 'html'=>$Create_Section));
    

  }


  public function Create_Section($WhereGrade)
  {

$model = new fee_concession_model();

 $sql = "select distinct cl.section_dname from atif.class_list as cl
where ".$WhereGrade." order by cl.section_dname ";

$qresult = $model->get_query($sql);


    $html ='<label>Select Section</label>';
    $html .='<select id="sectionFilter" multiple="multiple">';
    if(!empty($qresult))
    {
      foreach($qresult as $q)
      {
        $html .='<option value="'.$q->section_dname.'">'.$q->section_dname.'</option>';
      }
    }
                                        
  $html .='</select>';
  return $html;

  }


  public function Create_Status($WhereGrade,$WhereSection)
  {

$model = new fee_concession_model();

    $sql = "select distinct cl.std_status_code as Status_code from atif.class_list as cl where ".$WhereGrade."  AND ".$WhereSection."";

    $qresult = $model->get_query($sql);

     $html ='<label>Select Status</label>';
    $html .='<select id="statusFilter" multiple="multiple">';
    if(!empty($qresult))
    {
      foreach($qresult as $q)
      {
        $html .='<option value="'.$q->Status_code.'">'.$q->Status_code.'</option>';
      }
    }
                                        
  $html .='</select>';
  return $html;

}




  public function generate_bill_3(Request $request)
  {

    $model = new fee_concession_model();

    $Gname = $request->input("Gname");


    if( app('request')->exists('Snames') )
    {
      $Snames = $request->input("Snames");
    }
    else
    {
      $Snames = '';
    }

    if( app('request')->exists('st') )
    {
      $st = $request->input("st");
    }
    else
    {
      $st = '';
    }


  return response()->json(array('success' => true, 'Gname'=>$Gname,'Snames'=>$Snames,'st'=>$st ));

  }




}
