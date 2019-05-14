<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
                    'sa.tax_nic as tax_nic',
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

    public function getFeeReceivingInformationGradeWise($academic_session_id="",$installment_number,$grade_id=""){

                if($installment_number<3){
                    $billing_months=2.4;
                }elseif($installment_number==3){
                    $billing_months=1.2;
                }else{
                    $billing_months=1;
                }
        if($grade_id==""){
                $query = "SELECT cl.abridged_name,cl.id,cl.grade_name, cl.gs_id,cl.gfid,cl.std_status_code,fb.bill_cycle_no,fb.gb_id,
                Sum(fbr.received_amount)  AS total_received,
                SUM(fb.oc_adv_tax) as total_payable_taxes,
                IF((Sum(fbr.received_amount)-SUM(fb.oc_adv_tax))>0,SUM(fb.oc_adv_tax),0) as total_received_taxes,
                SUM(fb.roll_over_charges) as total_payable_rollover,
                SUM(fb.adjustment) as total_arrear_adjustment,
                SUM(fbr.received_late_fee) as total_received_late,
                SUM(fd.tuition_fee *$billing_months)-SUM(fb.difference) as gross_tution_fee,
                SUM(fd.resource_fee * $billing_months) as total_payable_resource_fee,
                SUM(fd.musakhar * $billing_months) as musakhar_charges,
                SUM(fb.oc_yearly) as total_payable_yearly_charges,
                SUM(fb.oc_smartcard_charges) as total_smart_card_charges,
                SUM(fb.total_payable)-SUM(fb.oc_adv_tax) as total_paybale_without_tax,
                SUM(fb.total_payable) as total_paybale_with_tax ,
                SUM(fbr.received_late_fee) as total_late_fee,
                SUM(fb.admission_fee) as admission_fee,
                SUM(fb.security_deposit) as security_deposit,
                SUM(fd.lab_avc*$billing_months) as computer_charges,
                fbr.received_date as received_date,
                fbr.received_payment_mode as payment_mode,
                fbr.received_branch as received_branch
                FROM   atif.class_list cl 
                LEFT JOIN atif_fee_student.fee_bill fb 
                ON fb.student_id = cl.id 
                LEFT JOIN atif_fee_student.fee_bill_received fbr 
                ON fbr.fee_bill_id = fb.id 
                LEFT JOIN atif_fee_student.fee_definition fd 
                ON fd.grade_id=cl.grade_id

                WHERE  fb.academic_session_id IN ( 11, 12 ) 
                AND fb.bill_cycle_no IN (".$installment_number.") 
                AND fd.academic_session_id IN (11,12)
                GROUP  BY cl.grade_id";


        }else{
             $query = "SELECT cl.abridged_name,cl.id,cl.grade_name, cl.gs_id,cl.gfid,cl.std_status_code,fb.bill_cycle_no,fb.gb_id,
            Sum(fbr.received_amount)  AS total_received,
            SUM(fb.oc_adv_tax) as total_payable_taxes,
            IF((Sum(fbr.received_amount)-SUM(fb.oc_adv_tax))>0,SUM(fb.oc_adv_tax),0) as total_received_taxes,
            SUM(fb.roll_over_charges) as total_payable_rollover,
            SUM(fb.adjustment) as total_arrear_adjustment,
            SUM(fbr.received_late_fee) as total_received_late,
            SUM(fd.tuition_fee *$billing_months)-SUM(fb.difference) as gross_tution_fee,
            SUM(fd.resource_fee * $billing_months) as total_payable_resource_fee,
            SUM(fd.musakhar * $billing_months) as musakhar_charges,
            SUM(fb.oc_yearly) as total_payable_yearly_charges,
            SUM(fb.oc_smartcard_charges) as total_smart_card_charges,
            SUM(fb.total_payable)-SUM(fb.oc_adv_tax) as total_paybale_without_tax,
            SUM(fb.total_payable) as total_paybale_with_tax ,
            SUM(fbr.received_late_fee) as total_late_fee,
            SUM(fb.admission_fee) as admission_fee,
            SUM(fb.security_deposit) as security_deposit,
            SUM(fd.lab_avc*$billing_months) as computer_charges,
            fbr.received_date as received_date,
            fbr.received_payment_mode as payment_mode,
            fbr.received_branch as received_branch
            FROM   atif.class_list cl 
            LEFT JOIN atif_fee_student.fee_bill fb 
            ON fb.student_id = cl.id 
            LEFT JOIN atif_fee_student.fee_bill_received fbr 
            ON fbr.fee_bill_id = fb.id 
            LEFT JOIN atif_fee_student.fee_definition fd 
            ON fd.grade_id=cl.grade_id

            WHERE  fb.academic_session_id IN ( 11, 12 ) 
            AND fb.bill_cycle_no IN (".$installment_number.") 
            AND fd.academic_session_id IN (11,12)
            AND cl.grade_id in (".$grade_id.")
            GROUP  BY cl.id ";

        }
       
        $details = DB::connection('mysql_Career_fee_bill')->select($query);



        return $details;
    }


        public function getSumFeeReceivingInformationGradeWise($academic_session_id="",$installment_number,$grade_id=""){
                if($installment_number<3){
                    $billing_months=2.4;
                }else{
                    $billing_months=1.2;
                }
        if($grade_id==""){
                $query = "SELECT cl.abridged_name,cl.id,cl.grade_name, cl.gs_id,cl.gfid,cl.std_status_code,fb.bill_cycle_no,fb.gb_id,
                Sum(fbr.received_amount)  AS total_received,
                SUM(fb.oc_adv_tax) as total_payable_taxes,
                IF((Sum(fbr.received_amount)-SUM(fb.oc_adv_tax))>0,SUM(fb.oc_adv_tax),0) as total_received_taxes,
                SUM(fb.roll_over_charges) as total_payable_rollover,
                SUM(fb.adjustment) as total_arrear_adjustment,
                SUM(fbr.received_late_fee) as total_received_late,
                SUM(fd.tuition_fee *$billing_months)-SUM(fb.difference) as gross_tution_fee,
                SUM(fd.resource_fee * $billing_months) as total_payable_resource_fee,
                SUM(fd.musakhar * $billing_months) as musakhar_charges,
                SUM(fb.oc_yearly) as total_payable_yearly_charges,
                SUM(fb.oc_smartcard_charges) as total_smart_card_charges,
                SUM(fb.total_payable)-SUM(fb.oc_adv_tax) as total_paybale_without_tax,
                SUM(fb.total_payable) as total_paybale_with_tax ,
                SUM(fbr.received_late_fee) as total_late_fee,
                SUM(fb.admission_fee) as admission_fee,
                SUM(fb.security_deposit) as security_deposit,
                SUM(fd.lab_avc*$billing_months) as computer_charges,
                fbr.received_date as received_date,
                fbr.received_payment_mode as payment_mode,
                fbr.received_branch as received_branch
                FROM   atif.class_list cl 
                LEFT JOIN atif_fee_student.fee_bill fb 
                ON fb.student_id = cl.id 
                LEFT JOIN atif_fee_student.fee_bill_received fbr 
                ON fbr.fee_bill_id = fb.id 
                LEFT JOIN atif_fee_student.fee_definition fd 
                ON fd.grade_id=cl.grade_id

                WHERE  fb.academic_session_id IN ( 11, 12 ) 
                AND fb.bill_cycle_no IN (".$installment_number.") 
                AND fd.academic_session_id IN (11,12)";



        }else{
             $query = "SELECT cl.abridged_name,cl.id,cl.grade_name, cl.gs_id,cl.gfid,cl.std_status_code,fb.bill_cycle_no,fb.gb_id,
            Sum(fbr.received_amount)  AS total_received,
            SUM(fb.oc_adv_tax) as total_payable_taxes,
            IF((Sum(fbr.received_amount)-SUM(fb.oc_adv_tax))>0,SUM(fb.oc_adv_tax),0) as total_received_taxes,
            SUM(fb.roll_over_charges) as total_payable_rollover,
            SUM(fb.adjustment) as total_arrear_adjustment,
            SUM(fbr.received_late_fee) as total_received_late,
            SUM(fd.tuition_fee *$billing_months)-SUM(fb.difference) as gross_tution_fee,
            SUM(fd.resource_fee * $billing_months) as total_payable_resource_fee,
            SUM(fd.musakhar * $billing_months) as musakhar_charges,
            SUM(fb.oc_yearly) as total_payable_yearly_charges,
            SUM(fb.oc_smartcard_charges) as total_smart_card_charges,
            SUM(fb.total_payable)-SUM(fb.oc_adv_tax) as total_paybale_without_tax,
            SUM(fb.total_payable) as total_paybale_with_tax ,
            SUM(fbr.received_late_fee) as total_late_fee,
            SUM(fb.admission_fee) as admission_fee,
            SUM(fb.security_deposit) as security_deposit,
            SUM(fd.lab_avc*$billing_months) as computer_charges,
            fbr.received_date as received_date,
            fbr.received_payment_mode as payment_mode,
            fbr.received_branch as received_branch
            FROM   atif.class_list cl 
            LEFT JOIN atif_fee_student.fee_bill fb 
            ON fb.student_id = cl.id 
            LEFT JOIN atif_fee_student.fee_bill_received fbr 
            ON fbr.fee_bill_id = fb.id 
            LEFT JOIN atif_fee_student.fee_definition fd 
            ON fd.grade_id=cl.grade_id

            WHERE  fb.academic_session_id IN ( 11, 12 ) 
            AND fb.bill_cycle_no IN (".$installment_number.") 
            AND fd.academic_session_id IN (11,12)
            AND cl.grade_id in (".$grade_id.")
             ";

        }
       
        $details = DB::connection('mysql_Career_fee_bill')->select($query);



        return $details;
    }


    public function getReportByAcademicSession($grade_id,$academic_session_id,$bill_cycle_no,$gs_id){

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
                    ->where('std_info.grade_id',$grade_id)
                    ->where("fee_bill.bill_cycle_no",$bill_cycle_no)
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

            if(!empty($gs_id) && empty($section_id) && empty($gs_id) && empty($gf_id) && empty($gt_id)){
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
                    ->where('std_info.grade_id',$grade_id)
                    ->where('cl.gs_id',$gs_id)
                    ->where("fee_bill.bill_cycle_no",$bill_cycle_no)
                    ->where("fee_bill.academic_session_id",$academic_session_id)
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
              

    }
    
    public function getReceivingReport($grade_id,$academic_session_id,$bill_cycle_no){
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
                    ->join('atif_fee_student.fee_bill_received as fbr','fbr.fee_bill_id','=','fee_bill.id')
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
                    ->where('std_info.grade_id',$grade_id)
                    ->where("fee_bill.bill_cycle_no",$bill_cycle_no)
                    ->where("fee_bill.academic_session_id",$academic_session_id)
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
                ->select('id','total_payable','total_current_bill','oc_adv_tax','academic_session_id','adjustment','roll_over_charges')
                ->Orderby('id','asc')->get();
        }else{

            $details=fee_bill::where([['student_id',$student_id],['academic_session_id','<>',13],['academic_session_id','>',10]])->select('id','total_payable','total_current_bill','oc_adv_tax','academic_session_id','adjustment','roll_over_charges')->Orderby('id','desc')->first();

        }
        
        return $details;
    }

    public function getLastBillTaxesByStudentId($student_id,$academic_session_id){
            $details=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])
            ->sum('oc_adv_tax');
            return $details;

    }

    public function getOnlyLastTaxes($student_id,$academic_session_id){
            $details=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])
            ->select('oc_adv_tax')->Orderby('id','desc')->first();
            return $details['oc_adv_tax'];

    }



    // public function getThisAcadmicSessionsBillStatus()


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

    public function getLastBillRollOver($student_id,$academic_session_id){
        $details=fee_bill::select('roll_over_charges')->where([['student_id',$student_id],['academic_session_id',$academic_session_id]])->Orderby('id','desc')->first();
        return $details['roll_over_charges'];
    }

     public function getLastBillNumber($student_id,$academic_session_id){
        $details=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])->select('gb_id')->Orderby('id','desc')->first();
        return $details;
    }
    public function sumPreviousAmount($student_id,$academic_session_id){
            $total=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])->sum('total_current_bill');
            return $total;
    }

    public function getPreviousData($student_id,$academic_session_id){
            $total=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])->sum('total_current_bill','oc_adv_tax');
            return $total;
    }

    public function getLastBillTaxes($student_id){
        $details=fee_bill::where('student_id',$student_id)->select('admission_fee','oc_adv_tax','id','adjustment')->Orderby('id','desc')->first();
        return $details;   
    }

    public function sumTotalTaxes($student_id,$academic_session_id){
        $details=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id]])->sum('oc_adv_tax');
        return $details;   
    }

    // public function getAdmissionFeeDifference($student_id){
    //     $details=fee_bill::join('fee_bill_received as fbr','fbr.fee_bill_id','fee_bill.id')
    //     ->where('student_id',$student_id)
    //     ->select('admission_fee','gb_id','total_payable','computer_subcription_fee','received_amount','fee_a_discount')
    //     ->where([['bill_title','Admission'],['bill_cycle_no',0],['received_date','>','2018-06-30']])
    //     ->whereIN('academic_session_id',[9])
    //     ->Orderby('fee_bill.id','desc')->first();
    //     return $total_fee=($details['received_amount']);
    // }

    public static function getAdmissionFee($student_id,$academic_session_id=""){
        $details=fee_bill::join('fee_bill_received as fbr','fbr.fee_bill_id','fee_bill.id')
        ->where('student_id',$student_id)
        ->select('admission_fee','security_deposit','gb_id','total_payable','computer_subcription_fee','fee_a_discount','received_amount')
        ->where([['bill_title','Admission'],['bill_cycle_no',0],['received_date','>','2018-06-30']])
        ->whereIN('academic_session_id',[9])
        ->Orderby('fee_bill.id','desc')->first();
        $gb_id=$details['gb_id'];
        $bill_year=substr($gb_id,0,2);
        $c_year = date('Y')-1;
        $c_nyear=substr($c_year,2,3);
         // return $details['total_payable']-$details['security_deposit'];

       // echo $this->getAdmissionFeeDifference($student_id);
       // die;
       if($bill_year==$c_nyear){
        
                 $grand_total_fee=$details['admission_fee']+$details['computer_subcription_fee']+$details['security_deposit'];
                 if($details['received_amount']>$grand_total_fee){
                     $details['received_amount']=$details['received_amount']-$details['security_deposit'];
                     $total_income=$details['received_amount'];
                 }else{
                         $total_income=$details['admission_fee']+$details['computer_subcription_fee'];
                 }
                

                if($details['fee_a_discount']>0){
                     $discount_amount=($details['admission_fee']/100)*$details['fee_a_discount'];
                     $total_income=$total_income-$discount_amount;
                }
              
            return $total_income;
        }else{
            return 0;
        }
    }


    public static function getLastBillReceivedByStudentId($student_id,$academic_session_id=""){
        $details=fee_bill::join('fee_bill_received as fbr','fbr.fee_bill_id','fee_bill.id')
        ->where('student_id',$student_id)
        ->select('received_amount','security_deposit','gb_id','total_payable','computer_subcription_fee','fee_a_discount','received_amount')
        ->where([['received_date','>','2018-06-30'],['bill_cycle_no','=',5]])
        ->where('academic_session_id',$academic_session_id)
        ->Orderby('fbr.id','desc')->first();

        // die;
        return $details['received_amount'];
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

    public function deleteBill($student_id,$academic_session_id,$billing_cycle_number){
        $data=fee_bill::where([['student_id',$student_id],['academic_session_id',$academic_session_id],['bill_cycle_no',$billing_cycle_number]])->delete();
        return $data;
    }
    public static function getAmountPaidOrNot($amount,$fee_type){
            if($amount<0){
                return 0;
            }else{
                return $fee_type;
            } 
    }

    public static function getAdmissionFeeReport($from_date,$to_date,$grade_id){
            $query = "SELECT 

            if( 
            cl.gs_id is not null,
            (select att.date from atif_attendance.student_attendance as att where att.gs_id=cl.gs_id and att.date >= '2018-12-01' limit 1) , '' ) as First_Attendance_Tapin,


           format( fb.admission_fee, 0 ) as admission_fee ,
            fb.id,af.form_no,srr.gs_id,if(srr.gf_id!=0,concat(substr(srr.gf_id, 1, 2) , '-', substr(srr.gf_id, 3, 3) ),'')as gfid,sr.gt_id, 
            af.official_name, 
            fb.waive_amount,
            /*fb.concession_amount,*/
            /*if( fb.fee_a_discount != '0' or af.referral_applied=1, 20000, 0 ) as concession_amount,*/
            (   CASE
                WHEN referral_applied = 1 THEN format(20000,0)
                WHEN fb.fee_a_discount != '0' THEN  format( 40000  / 100 * (convert(fb.fee_a_discount, UNSIGNED INTEGER ) ), 0)
                ELSE 0
            END ) concession_amount,

            format( fb.re_enforcement,0) as re_enforcement,
            format( fb.computer_subcription_fee,0) as computer_subcription_fee,
            format( fb.security_deposit,0) as security_deposit,
            format( fb.total_payable,0) as total_payable,
            format ( fbr.received_amount,0) as received_amount,
            fbr.received_date,af.grade_name as applied_grade,from_unixtime(cl.created,'%Y-%m-%d') as eao_date,cl.grade_name FROM atif_fee_student.fee_bill fb





            inner JOIN  atif_gs_admission.admission_form as af
            ON af.form_no = if( LENGTH(af.form_no)=7,
            concat( mid(fb.gb_id, 1, 2),'/' , mid(fb.gb_id, 5, 4) ) ,
            concat( mid(fb.gb_id, 1, 2),'/' , mid(fb.gb_id, 6, 4) ) )
            AND fb.bill_title='Admission'
            AND fb.academic_session_id >= 13
            AND fb.record_deleted = 0
            and  mid(fb.gb_id, 1, 2) = '19'
            and ( mid(fb.gb_id, 3, 2) = '81' or mid(fb.gb_id, 3, 2) = '82' or mid(fb.gb_id, 3, 2) = '85' or mid(fb.gb_id, 3, 2) = '86' )
            left JOIN atif_fee_student.fee_bill_received as fbr ON fbr.fee_bill_id = fb.id




            LEFT JOIN atif.class_list cl on cl.id=fb.student_id
            left join atif.students_all as sa on (sa.student_id = fb.student_id 
                 and fb.academic_session_id>=11) 

            LEFT JOIN atif.student_family_record AS std_data ON (cl.gf_id = std_data.gf_id and std_data.nic = sa.tax_nic)
            LEFT JOIN atif.staff_child sc ON sc.gf_id = sa.gf_id
            LEFT JOIN atif.staff_registered sr ON (sr.id = sc.staff_id)
            left join atif.student_registered as srr on srr.id=fb.student_id

            where";
            if($grade_id==""){
                $query.="(fbr.received_date >= '$from_date' AND fbr.received_date <= '$to_date')
                and fb.bill_cycle_no=0
                and SUBSTR(fb.gb_id,7,1) <> '/'";
            }else{
                $query.="(fbr.received_date >= '$from_date' AND fbr.received_date <= '$to_date')
                and fb.bill_cycle_no=0
                and af.grade_name='$grade_id'
                and SUBSTR(fb.gb_id,7,1) <> '/'";
            } 
            
        return $details = DB::connection('mysql_Career_fee_bill')->select($query);
    }


    public static function getAllReceivedByStudentId($student_id){
            $query = "SELECT sum(fbr.received_amount) as total_received FROM atif.class_list cl
            left JOIN atif_fee_student.fee_bill fb
            on fb.student_id=cl.id
            left JOIN atif_fee_student.fee_bill_received fbr
            on fbr.fee_bill_id=fb.id
            where fb.academic_session_id IN (11,12)
            and fb.bill_cycle_no in (1,2,3,4,5,6,7,8,9,10)
            and fb.student_id=$student_id";
            
         $details = DB::connection('mysql_Career_fee_bill')->select($query)[0];
         $total_this_session=$details->total_received;

            $query = "SELECT fbr.received_amount FROM atif_fee_student.fee_bill fb 
            inner join atif_fee_student.fee_bill_received fbr
            on fb.id=fbr.fee_bill_id

            and fb.academic_session_id IN (9,10)
            and fb.bill_cycle_no=5
            and fbr.received_date>'2018-06-30'
            and fb.student_id=$student_id";
            
         @$details = DB::connection('mysql_Career_fee_bill')->select($query)[0];
         @$admission_fee= fee_bill::getAdmissionFee($student_id);
         return @$total_this_session+@$details->received_amount+@$admission_fee;
    }    
   

   public static function getAdmissionBill($gs_id,$billing_cycle_number,$academic_session_id){
        $last_bill_exists_date="";
        $query = "SELECT fb.bill_issue_date,fb.bill_cycle_no,cl.gs_id,fb.student_id,fb.total_current_bill,fb.oc_adv_tax,fb.total_payable,fb.adjustment,fbr.received_amount,fb.roll_over_charges,fb.id,fb.arrears_suspended FROM atif.class_list cl
        left JOIN atif_fee_student.fee_bill fb
        on fb.student_id=cl.id
        left JOIN atif_fee_student.fee_bill_received fbr
        on fbr.fee_bill_id=fb.id
        where fb.bill_cycle_no in (0)
        and cl.gs_id='$gs_id'";
        @$details = DB::connection('mysql_Career_fee_bill')->select($query)[0];
        @$issue_date= $details->bill_issue_date;
        $year=explode('-', $issue_date)[0];
        $current_year=date('Y');
        if($year==$current_year){
            $query = "SELECT fb.bill_issue_date,fb.bill_cycle_no,cl.gs_id,fb.student_id,fb.total_current_bill,fb.oc_adv_tax,fb.total_payable,fb.adjustment,fbr.received_amount,fb.roll_over_charges,fb.id,fb.arrears_suspended FROM atif.class_list cl
            left JOIN atif_fee_student.fee_bill fb
            on fb.student_id=cl.id
            left JOIN atif_fee_student.fee_bill_received fbr
            on fbr.fee_bill_id=fb.id
            where fb.bill_cycle_no !=0 and fb.academic_session_id=$academic_session_id
            and cl.gs_id='$gs_id'";
            $details = DB::connection('mysql_Career_fee_bill')->select($query)[0];
            $last_bill_exists_date= $details->bill_issue_date;
        }
        //if admission bill in currrent year and student current acadmic session bill exists

        if($last_bill_exists_date!=""){
            return false;
            //if return false it means bills will not be generate
        }else{
            return true;
            //if return false it means bills will  be generate

        }
                // if($details->bill_issue_date>)



    }



}
