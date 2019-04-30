<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class account_reports extends Model
{
	protected $dbCon = 'mysql_Career_fee_bill';

	 public function Get_Grade_Fee_Report($ASession_id_From, $ASession_id_To,$installment_number)
    {
    	$billing_number_month=$this->billNumberOfMonths($installment_number);

    $query="SELECT 
       `std_info`.`grade_name`          AS `Grade_name`, 
      	SUM(fee_bill.gross_tuition_fee) AS Total_Tuition_Fee_PG,
      	SUM(fee_def.resource_fee) AS Total_resourdes_fee,
      	'0' AS SCEOPTDISC,
      	SUM(fee_bill.concession_amount) AS Total_Concession_Amount,
      	SUM(fee_bill.scholarship_amount) AS Total_scholarship_amount,
      	SUM(fee_def.musakhar) AS Total_musakhar_charges,
      	SUM(fee_bill.oc_yearly) AS Yearly_charges ,
      	SUM(fee_bill.oc_smartcard_charges) AS Total_card_charges  ,
      	SUM(fee_bill.roll_over_charges) AS ArrearswithoutLateFeeRolloverFee,
      	SUM('0') AS Total_late_received,
      	SUM(fee_bill.roll_over_charges) AS Total_rolover_charges,
      	SUM(fee_bill.adjustment) AS Adjustments,
      	SUM(fee_bill.bill_payable) AS Total_Fees,
      	SUM(fee_bill.oc_adv_tax) AS AdvanceTax,
      	SUM(fee_bill.total_payable) AS GrandTotalwithAdvanceTax
 
	   FROM   `fee_bill` 
       INNER JOIN `atif`.`class_list` AS `std_info` 
               ON `fee_bill`.`student_id` = `std_info`.`id` 
       LEFT JOIN `atif`.`students_all` AS `sa` 
              ON `sa`.`student_id` = `std_info`.`id` 
       INNER JOIN `atif`.`student_family_record` AS `std_data` 
               ON `std_data`.`gf_id` = `sa`.`gf_id` 
                  AND `std_data`.`nic` = `sa`.`tax_nic` 
       INNER JOIN `atif_fee_student`.`fee_definition` AS `fee_def` 
               ON `std_info`.`grade_id` = `fee_def`.`grade_id` 
                  AND `std_info`.`academic_session_id` = 
                      `fee_def`.`academic_session_id` 
       LEFT JOIN `atif`.`staff_child` AS `sc` 
              ON `sc`.`gf_id` = `std_info`.`gf_id` 
       LEFT JOIN `atif`.`staff_registered` AS `sr` 
              ON `sr`.`id` = `sc`.`staff_id` 
		WHERE   
        `fee_bill`.`bill_cycle_no` = $installment_number
       AND `fee_bill`.`academic_session_id` IN ($ASession_id_From,$ASession_id_To) 

GROUP  BY `std_info`.`grade_id` ";

      $weeks = DB::connection($this->dbCon)
                ->select($query);
      return $weeks;
    }

    public function DetailsOfIssuance($academic_session_id,$installment_number,$gs_id,$gf_id){

        if(!empty($academic_session_id) && !empty($installment_number) && empty($gs_id) && empty($gf_id)){
            $query="SELECT cl.gs_id,cl.gfid,cl.std_status_code,cl.class_no,cl.abridged_name,
            fb.bill_cycle_no,fb.gb_id,fd.tuition_fee,fd.resource_fee,fd.musakhar,fb.oc_yearly,fb.oc_smartcard_charges,
            fb.adjustment,fb.roll_over_charges,fb.roll_over_charges,
            fb.total_payable,fb.oc_adv_tax,fb.total_payable - IFNULL(fb.oc_adv_tax,0) as total_fee_without_tax,
            fb.admission_fee,fb.security_deposit,fd.lab_avc
            
            FROM atif.class_list cl
            inner join atif_fee_student.fee_bill fb 
            on fb.student_id=cl.id
            inner join atif_fee_student.fee_definition fd
            on fd.academic_session_id=fb.academic_session_id and
            fd.grade_id=cl.grade_id
            where fb.academic_session_id=$academic_session_id and fb.bill_cycle_no=$installment_number
            group by cl.std_status_code,cl.abridged_name";

        } 
        elseif(!empty($academic_session_id) && !empty($installment_number) && !empty($gs_id) && empty($gf_id)){
            $query="SELECT cl.gs_id,cl.gfid,cl.std_status_code,cl.class_no,cl.abridged_name,
            fb.bill_cycle_no,fb.gb_id,fd.tuition_fee,fd.resource_fee,fd.musakhar,fb.oc_yearly,fb.oc_smartcard_charges,
            fb.adjustment,fb.roll_over_charges,fb.roll_over_charges,
            fb.total_payable,fb.oc_adv_tax,fb.total_payable - IFNULL(fb.oc_adv_tax,0) as total_fee_without_tax,
            fb.admission_fee,fb.security_deposit,fd.lab_avc
            
            FROM atif.class_list cl
            inner join atif_fee_student.fee_bill fb 
            on fb.student_id=cl.id
            inner join atif_fee_student.fee_definition fd
            on fd.academic_session_id=fb.academic_session_id and
            fd.grade_id=cl.grade_id
            where fb.academic_session_id=$academic_session_id and fb.bill_cycle_no=$installment_number and cl.gs_id='$gs_id'
            group by cl.std_status_code,cl.abridged_name";
        }elseif(!empty($academic_session_id) && !empty($installment_number) && empty($gs_id) && !empty($gf_id)){
            $query="SELECT cl.gs_id,cl.gfid,cl.std_status_code,cl.class_no,cl.abridged_name,
            fb.bill_cycle_no,fb.gb_id,fd.tuition_fee,fd.resource_fee,fd.musakhar,fb.oc_yearly,fb.oc_smartcard_charges,
            fb.adjustment,fb.roll_over_charges,fb.roll_over_charges,
            fb.total_payable,fb.oc_adv_tax,fb.total_payable - IFNULL(fb.oc_adv_tax,0) as total_fee_without_tax,
            fb.admission_fee,fb.security_deposit,fd.lab_avc
            
            FROM atif.class_list cl
            inner join atif_fee_student.fee_bill fb 
            on fb.student_id=cl.id
            inner join atif_fee_student.fee_definition fd
            on fd.academic_session_id=fb.academic_session_id and
            fd.grade_id=cl.grade_id
            where fb.academic_session_id=$academic_session_id and fb.bill_cycle_no=$installment_number and cl.gfid='$gf_id'
            group by cl.std_status_code,cl.abridged_name";
        }

        
        $result = DB::connection($this->dbCon)
        ->select($query);
        return $result;
    }


    public function billNumberOfMonths($installment_number){
    			if($installment_number<3){
                    $billing_months=2.4;
                }elseif($installment_number==3){
                    $billing_months=1.2;
                }else{
                	$billing_months=1;
                }
                return $billing_months;
    }


}