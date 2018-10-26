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
                    ->leftjoin('atif.students_all as sa',function($join){
                        $join->on('sa.student_id','=','std_info.id');
                    })
                    ->join('atif.student_family_record as std_data',function($join){
                        $join->on('std_data.gf_id','=','sa.gf_id');
                        $join->on('std_data.nic','=','sa.tax_nic');
                    
                    })
                    ->join('atif_fee_student.fee_definition as fee_def',function($join){
                        $join->on('std_info.grade_id','=','fee_def.grade_id');
                        $join->on('std_info.academic_session_id','=','fee_def.academic_session_id');
                    })
                    ->leftjoin('atif.staff_child as sc','sc.gf_id','=','std_info.gf_id')
                    ->leftjoin('atif.staff_registered as sr','sr.id','=','sc.staff_id')
                    ->select(['fee_bill.*','std_info.*','std_info.abridged_name as student_name',
                    'std_info.gender','std_info.gs_id as student_gs_id',
                    'std_info.grade_name as grade_name','std_info.campus as campus',
                    'std_info.section_name as section_name','std_info.section_id as section_id',
                    'std_info.generation_of as generation_of',
                    'std_info.class_no as class_no',
                    'std_info.created as ra_created',
                    'std_info.grade_id as my_grade_id','std_data.name as parent_name',
                    'std_data.parent_type','std_data.gf_id as family_id',
                    'std_info.grade_id as std_grade_id','std_data.nic as nic',
                    'fee_def.tuition_fee as tuition_fee','fee_def.resource_fee as resource_fee',
                    'fee_def.musakhar as musakhar','sr.gt_id as gt_id','fee_bill.gb_id as gb_id_mc_a','fee_bill.scholarship_codes as sc_codes','fee_bill.scholarship_percentage as sc_percentage'])
                    ->whereIN('std_info.grade_id',$grade_id)
                    ->where("fee_bill.bill_cycle_no",$billing_cycle_number)
                    ->whereIN("fee_bill.academic_session_id",[11,12])
                    ->whereIN("std_info.std_status_code",['F-SNS','S-CFS','S-CPT','F-LLV','F-NAD','S-WNT','F-O2A'])
                    ->groupBy('std_info.id')
                    ->orderBy('generation_of', 'DESC')
                    ->orderBy('my_grade_id')
                    ->orderBy('section_id', 'ASC')
                    ->orderBy('class_no', 'ASC')
                    ->orderBy('ra_created', 'ASC')
                    ->get();
                    // print_r($details);
                    // die;
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
                    'fee_def.musakhar as musakhar','sr.gt_id as gt_id','fee_bill.gb_id as gb_id_mc_a','fee_bill.scholarship_codes as sc_codes','fee_bill.scholarship_percentage as sc_percentage'])          
                    ->whereIN('std_info.grade_id',$grade_id)
                    ->whereIN('std_info.section_name',$section_name)
                    ->whereIN("std_info.std_status_code",['F-SNS','S-CFS','S-CPT','F-LLV','F-NAD','S-WNT','F-O2A'])
                    ->groupBy('std_info.gs_id')
                    ->OrderBy('std_info.id','desc')->get();
              }elseif(!empty($gs_id) && empty($grade_id) && empty($section_id) && empty($gf_id) && empty($gt_id)){
                  $details=fee_bill::
                    join('atif.class_list as std_info','fee_bill.student_id','=','std_info.id')
                    ->leftjoin('atif.students_all as sa',function($join){
                        $join->on('sa.student_id','=','std_info.id');
                    })
                    ->leftjoin('atif.student_family_record as std_data',function($join){
                        $join->on('std_data.gf_id','=','sa.gf_id');
                        $join->on('std_data.nic','=','sa.tax_nic');
                    
                    })
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
                    'fee_def.musakhar as musakhar','sr.gt_id as gt_id','fee_bill.gb_id as gb_id_mc_a','fee_bill.scholarship_codes as sc_codes','fee_bill.scholarship_percentage as sc_percentage'])
                    ->where('std_info.gs_id',$gs_id)
                    ->whereIN("fee_bill.academic_session_id",[11,12])
                    ->whereIN("std_info.std_status_code",['F-SNS','S-CFS','S-CPT','F-LLV','F-NAD','S-WNT','F-O2A'])
                    ->where("fee_bill.bill_cycle_no",$billing_cycle_number)
                    ->groupBy('std_info.gs_id')
                    ->groupBy('fee_bill.fee_bill_type_id')
                    ->OrderBy('fee_bill.id','desc')->take(1)->get();

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


    public function getLastBillByStudentId($student_id,$billing_cycle_number="",$academic_session_id="",$status=""){
        // $details=fee_bill::where('student_id',$student_id)->select('id','total_payable','total_current_bill','oc_adv_tax','academic_session_id')->Orderby('id','desc')->first();
        $last_billing_cycle_number=$billing_cycle_number-1;
        if($status=='S-CPT'){
                $details=fee_bill::where([['student_id',$student_id],['bill_cycle_no',$last_billing_cycle_number],['academic_session_id',$academic_session_id]])
                ->select('id','total_payable','total_current_bill','oc_adv_tax','academic_session_id','adjustment')
                ->Orderby('id','asc')->get();
        }else{
            $details=fee_bill::where('student_id',$student_id)->select('id','total_payable','total_current_bill','oc_adv_tax','academic_session_id','adjustment')->Orderby('id','desc')->first();

        }
       
        return $details;
    }
    

    public function getScptBillNoDiscount($student_id,$billing_cycle_number="",$academic_session_id="",$status=""){
        // $details=fee_bill::where('student_id',$student_id)->select('id','total_payable','total_current_bill','oc_adv_tax','academic_session_id')->Orderby('id','desc')->first();
        $last_billing_cycle_number=$billing_cycle_number-1;
        if($status=='S-CPT'){
                $details=fee_bill::where([['student_id',$student_id],['bill_cycle_no',$last_billing_cycle_number],['academic_session_id',$academic_session_id]])
                ->select('id','total_payable','total_current_bill','oc_adv_tax','academic_session_id','adjustment')
                ->Orderby('id','asc')->first();
        }
       
        return $details;
    }


	public function getLastCurrentBilling($student_id){
	    	$details=fee_bill::where('student_id',$student_id)->select('id','total_current_bill')->Orderby('id','desc')->first();
	    	return $details['total_current_bill'];
	 }

     public function getScptFirstBill($student_id,$billing_cycle_number,$academic_session_id){
            $billing_cycle_number=$billing_cycle_number-1;
            $details=fee_bill::where([['student_id',$student_id],['bill_cycle_no',$billing_cycle_number],['academic_session_id',$academic_session_id]])->select('id','total_payable')->Orderby('id','asc')->first();
            return $details['total_payable'];
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
		$details=fee_bill::where('student_id',$student_id)->select('admission_fee','oc_adv_tax','id','adjustment')->Orderby('id','desc')->first();
    	return $details;   
    }

    public function getAdmissionFee($student_id,$academic_session_id=""){
        $details=fee_bill::where('student_id',$student_id)
        ->select('admission_fee','gb_id')
        ->where([['bill_title','Admission'],['bill_cycle_no',0]])
        ->whereIN('academic_session_id',[9])
        ->Orderby('id','desc')->first();
        $gb_id=$details['gb_id'];
        $bill_year=substr($gb_id,0,2);
        $c_year = date('Y');
        $c_nyear=substr($c_year,2,3);
       if($bill_year==$c_nyear){
            return $details['admission_fee'];
        }else{
            return 0;
        }
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
    public function getLastBillIssueDate($student_id){
        $counter=fee_bill::select('bill_issue_date')->where('student_id',$student_id)->Orderby('id','desc')->first();
        return $counter['bill_issue_date'];
    }




}
