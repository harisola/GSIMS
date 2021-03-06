<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class fee_bill extends Model
{
    protected $connection = 'mysql_Career_fee_bill';
    protected $table = 'fee_bill';
    public $timestamps = false;
    protected $primaryKey = 'gb_id';


    public function getFeeInformation($gs_id){
    	$details=fee_bill::
            leftjoin('atif.class_list as std_info','fee_bill.student_id','=','std_info.id')
          ->leftjoin('atif.student_family_record as std_data','std_info.gf_id','=','std_data.gf_id')
          ->select(['fee_bill.*','std_info.abridged_name as student_name','std_info.gender','std_info.gs_id as student_gs_id','std_info.grade_name as grade_name','std_info.campus as campus','std_info.section_name as section_name','std_data.name as parent_name','std_data.parent_type','std_data.gf_id as family_id','std_info.grade_id as std_grade_id'])
    	  ->where('gs_ids',$gs_id)->OrderBy('std_info.id','desc')->first();
    	  return $details;
    }

    public function feeInformationFilter($academic_session_id,$billing_cycle_number="",$grade_id,$section_name="",$gs_id="",$gf_id="",$gt_id="",$std_status_id=""){

              if(!empty($grade_id) && empty($section_id) && empty($gs_id) && empty($gf_id) && empty($gt_id)){
                    $details=fee_bill::
                    join('atif.class_list as std_info','fee_bill.student_id','=','std_info.id')
                    ->join('atif.student_family_record as std_data','std_info.gf_id','=','std_data.gf_id')
                    ->join('atif_fee_student.fee_definition as fee_def',function($join){
                        $join->on('std_info.grade_id','=','fee_def.grade_id');
                        $join->on('std_info.academic_session_id','=','fee_def.academic_session_id');
                    })
                    ->leftjoin('atif.staff_child as sc','sc.gf_id','=','std_info.gf_id')
                    ->leftjoin('atif.staff_registered as sr','sr.id','=','sc.staff_id')
                    ->select(['fee_bill.*','std_info.*','std_info.abridged_name as student_name','std_info.gender','std_info.gs_id as student_gs_id','std_info.grade_name as grade_name','std_info.campus as campus','std_info.section_name as section_name','std_data.name as parent_name','std_data.parent_type','std_data.gf_id as family_id','std_info.grade_id as std_grade_id','std_data.nic as nic','fee_def.tuition_fee as tuition_fee','fee_def.resource_fee
                     as resource_fee','fee_def.musakhar as musakhar','sr.gt_id as gt_id','fee_bill.gb_id as gb_id_mc_a'])
                    ->whereIN('std_info.grade_id',$grade_id)
                    ->where("fee_bill.bill_cycle_no",$billing_cycle_number)
                    ->whereIN("fee_bill.academic_session_id",[11,12])
                    ->whereIN("std_info.std_status_code",['S-CFS','S-CPT','F-LLV','F-NAD','S-WNT','F-O2A'])
                    ->where('std_data.parent_type',1)
                    ->OrderBy('std_info.id','desc')
                    ->groupBy('std_info.gs_id')
                    ->get();
                    return $details;
              }
              elseif(!empty($grade_id) && !empty($section_id) && empty($gs_id) && empty($gf_id) && empty($gt_id)){

                      $details=fee_bill::
                    join('atif.class_list as std_info','fee_bill.student_id','=','std_info.id')
                    ->join('atif.student_family_record as std_data','std_info.gf_id','=','std_data.gf_id')
                    ->join('atif_fee_student.fee_definition as fee_def',function($join){
                        $join->on('std_info.grade_id','=','fee_def.grade_id');
                        $join->on('std_info.academic_session_id','=','fee_def.academic_session_id');
                    })
                    ->leftjoin('atif.staff_child as sc','sc.gf_id','=','std_info.gf_id')
                    ->leftjoin('atif.staff_registered as sr','sr.id','=','sc.staff_id')
                    ->select(['fee_bill.*','std_info.*','std_info.abridged_name as student_name',
                    'std_info.gender','std_info.gs_id as student_gs_id',
                    'std_info.grade_name as grade_name','std_info.campus as campus',
                    'std_info.section_name as section_name','std_data.name as parent_name',
                    'std_data.parent_type','std_data.gf_id as family_id',
                    'std_info.grade_id as std_grade_id','std_data.nic as nic',
                    'fee_def.tuition_fee as tuition_fee','fee_def.resource_fee as resource_fee',
                    'fee_def.musakhar as musakhar','sr.gt_id as gt_id','fee_bill.gb_id as gb_id_mc_a'])            
                    ->whereIN('std_info.grade_id',$grade_id)
                    ->whereIN('std_info.section_name',$section_name)
                    ->whereIN("std_info.std_status_code",['S-CFS','S-CPT','F-LLV','F-NAD','S-WNT','F-O2A'])
                    ->where('std_data.parent_type',1)
                    ->groupBy('std_info.gs_id')
                    ->OrderBy('std_info.id','desc')->get();
              }elseif(!empty($gs_id) && empty($grade_id) && empty($section_id) && empty($gf_id) && empty($gt_id)){
                  $details=fee_bill::
                    join('atif.class_list as std_info','fee_bill.student_id','=','std_info.id')
                    ->join('atif.student_family_record as std_data','std_info.gf_id','=','std_data.gf_id')
                    ->join('atif_fee_student.fee_definition as fee_def',function($join){
                        $join->on('std_info.grade_id','=','fee_def.grade_id');
                        $join->on('std_info.academic_session_id','=','fee_def.academic_session_id');
                    })
                    ->leftjoin('atif.staff_child as sc','sc.gf_id','=','std_info.gf_id')
                    ->leftjoin('atif.staff_registered as sr','sr.id','=','sc.staff_id')
                    ->select(['fee_bill.*','std_info.*','std_info.abridged_name as student_name',
                    'std_info.gender','std_info.gs_id as student_gs_id',
                    'std_info.grade_name as grade_name','std_info.campus as campus',
                    'std_info.section_name as section_name','std_data.name as parent_name',
                    'std_data.parent_type','std_data.gf_id as family_id',
                    'std_info.grade_id as std_grade_id','std_data.nic as nic',
                    'fee_def.tuition_fee as tuition_fee','fee_def.resource_fee as resource_fee',
                    'fee_def.musakhar as musakhar','sr.gt_id as gt_id','fee_bill.gb_id as gb_id_mc_a'])
                    ->where('std_info.gs_id',$gs_id)
                    ->whereIN("fee_bill.academic_session_id",[11,12])
                    ->whereIN("std_info.std_status_code",['S-CFS','S-CPT','F-LLV','F-NAD','S-WNT','F-O2A'])
                    ->where('std_data.parent_type',1)
                    ->groupBy('std_info.gs_id')
                    ->groupBy('fee_bill.fee_bill_type_id')
                    ->OrderBy('std_info.id','desc')->take(1)->get();

              }elseif(!empty($gf_id) && empty($grade_id) && empty($section_id) && empty($gs_id) && empty($gt_id)){



              }elseif(!empty($gt_id) && empty($grade_id) && empty($section_id) && empty($gf_id) && empty($gt_id)){

                 $details=fee_bill::
                    join('atif.class_list as std_info','fee_bill.student_id','=','std_info.id')
                    ->join('atif.student_family_record as std_data','std_info.gf_id','=','std_data.gf_id')
                    ->join('atif_fee_student.fee_definition as fee_def',function($join){
                        $join->on('std_info.grade_id','=','fee_def.grade_id');
                        $join->on('std_info.academic_session_id','=','fee_def.academic_session_id');
                    })
                    ->leftjoin('atif.staff_child as sc','sc.gf_id','=','std_info.gf_id')
                    ->leftjoin('atif.staff_registered as sr','sr.id','=','sc.staff_id')
                    ->select(['fee_bill.*','std_info.*','std_info.abridged_name as student_name','std_info.gender','std_info.gs_id as student_gs_id','std_info.grade_name as grade_name','std_info.campus as campus','std_info.section_name as section_name','std_data.name as parent_name','std_data.parent_type','std_data.gf_id as family_id','std_info.grade_id as std_grade_id','std_data.nic as nic','fee_def.tuition_fee as tuition_fee','fee_def.resource_fee
                     as resource_fee','fee_def.musakhar as musakhar','sr.gt_id as gt_id','fee_bill.gb_id as gb_id'])
                    ->whereIN('std_info.gf_id',$gf_id)
                    ->where('std_data.parent_type',1)
                    ->OrderBy('std_info.id','desc')->first();


              }elseif(!empty($std_status_id) && empty($gs_id) && empty($grade_id) && empty($section_id) && empty($gf_id) && empty($gt_id)){
                 $details=fee_bill::
                    join('atif.class_list as std_info','fee_bill.student_id','=','std_info.id')
                    ->join('atif.student_family_record as std_data','std_info.gf_id','=','std_data.gf_id')
                    ->join('atif_fee_student.fee_definition as fee_def',function($join){
                        $join->on('std_info.grade_id','=','fee_def.grade_id');
                        $join->on('std_info.academic_session_id','=','fee_def.academic_session_id');
                    })
                    ->leftjoin('atif.staff_child as sc','sc.gf_id','=','std_info.gf_id')
                    ->leftjoin('atif.staff_registered as sr','sr.id','=','sc.staff_id')
                    ->select(['fee_bill.*','std_info.*','std_info.abridged_name as student_name','std_info.gender','std_info.gs_id as student_gs_id','std_info.grade_name as grade_name','std_info.campus as campus','std_info.section_name as section_name','std_data.name as parent_name','std_data.parent_type','std_data.gf_id as family_id','std_info.grade_id as std_grade_id','std_data.nic as nic','fee_def.tuition_fee as tuition_fee','fee_def.resource_fee as resource_fee','fee_def.musakhar as musakhar','sr.gt_id as gt_id'])
                    ->whereIN("fee_bill.academic_session_id",[11,12])
                    ->where("fee_bill.fee_bill_type_id",2)
                    ->where("std_info.std_status_id",$std_status_id)
                    ->where('std_data.parent_type',1)
                    ->groupBy('std_info.gs_id')
                    ->OrderBy('std_info.id','desc')->get();

                    return $details;

              }
              return $details;
              
       
    }

    public function getRemitancesPaidFees(){
    	$details=fee_bill::
    	   join('students_expected_remitances','students_expected_remitances.student_id','=','students_expected_remitances.student_id')
    	 ->join('atif.class_list as class_info','fee_bill.student_id','=','class_info.id')
    	 ->join('atif_fee_student.remittance as r on r.student_id=cl.id and r.academic_id=cl.academic_session_id')
    	 ->get();
    }

    public function checkBillExistance($gb_id){
        $details=fee_bill::where('gb_id',$gb_id)->first();
        return count($details);
    }


    public function getLastBillByStudentId($student_id){
    	$details=fee_bill::where('student_id',$student_id)->select('id','total_payable','total_current_bill')->Orderby('id','desc')->first();
    	return $details;
    }

	public function getLastCurrentBilling($student_id){
	    	$details=fee_bill::where('student_id',$student_id)->select('id','total_current_bill')->Orderby('id','desc')->first();
	    	return $details['total_current_bill'];
	 }

    public function getAllBillNumbers($student_id,$academic_session_id){
    	$details=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])->select('id')->get();
    	return $details;
    }
     public function getLastBillNumber($student_id,$academic_session_id){
    	$details=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])->select('gb_id')->Orderby('id','desc')->first();
    	return $details;
    }
    public function sumPreviousAmount($student_id,$academic_session_id){
    		$total=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])->sum('total_current_bill');
    		return $total;
    }
    public function getLastBillTaxes($student_id){
		$details=fee_bill::where('student_id',$student_id)->select('admission_fee','oc_adv_tax','id')->Orderby('id','desc')->first();
    	return $details;   
    }

    public function getAdmissionFee($student_id,$academic_session_id=""){
        $details=fee_bill::where('student_id',$student_id)
        ->select('admission_fee')
        ->whereIN('academic_session_id',[11,12])
        ->Orderby('id','desc')->first();
        return $details['admission_fee'];
    }

    public function getLastBillPaidNotPaid($student_id){
    	$details=fee_bill::where('student_id',$student_id)->select('bill_status')->Orderby('id','desc')->first();
    	return $details['bill_status'];   
    }
    public function updateBill($bill_id,$total_discount_amount){
    	$discount=fee_bill::where('gb_id',$gb_id)->update($data);
    }
	public function countBills($student_id,$academic_session_id){
    	$counter=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])->count();
    	return $counter;
    }
    public function getSuspendedBarriers($student_id){
        $counter=fee_bill::where('student_id',$student_id)->Orderby('id','desc')->first();
        return $counter['arrears_suspended'];
    }





}
