<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class account_reports extends Model
{
	protected $dbCon = 'mysql_Career_fee_bill';

	 public function Get_Grade_Fee_Report($ASession_id_From, $ASession_id_To)
    {
    	

    $query = "select 
cl.grade_name as Grade_name,
#sum((( fbr.received_amount - (d.resource_fee * fbm.bill_month) ) )) as Total_Tuition_Fee_PG,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax

from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
#left join atif_fee_Student.fee_bill_received as fbr on (fbr.fee_bill_id=fb.id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
#left join atif_fee_student.fee_bill_month as fbm on (fbm.academic_session_id=cl.academic_session_id)

/*
left join ( select card.student_id, card.req_date, card.amount from 
atif.req_student_card as card 
left join atif.class_list as cl
on cl.id = card.student_id
where card.req_date >= '2018-08-01' and card.`duplicate`=1 ) as crd
on ( crd.student_id= fb.student_id and crd.req_date >= fb.bill_issue_date and crd.req_date <= fb.bill_bank_valid_date) */
where cl.grade_dname='PG' and cl.academic_session_id=11 and fb.academic_session_id=11 and fb.bill_cycle_no=1  
#and ( fb.student_id=2901 or fb.student_id=2931 )
#Group by cl.id

union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='PN' and cl.academic_session_id=11 and fb.academic_session_id=11 and fb.bill_cycle_no=1  



union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='N' and cl.academic_session_id=11 and fb.academic_session_id=11 and fb.bill_cycle_no=1  


union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='KG' and cl.academic_session_id=11 and fb.academic_session_id=11 and fb.bill_cycle_no=1  


union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='I' and cl.academic_session_id=11 and fb.academic_session_id=11 and fb.bill_cycle_no=1  


union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='II' and cl.academic_session_id=11 and fb.academic_session_id=11 and fb.bill_cycle_no=1  


union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='III' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  


union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='IV' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  


union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='V' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  


union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='VI' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  


union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='VII' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  



union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='VIII' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  



union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='IX' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  



union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='X' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  


union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='XI' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  



union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='A1' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  



union all
select 
cl.grade_name as Grade_name,
FORMAT(sum((( (d.tuition_fee*2.4) ))),0) as Total_Tuition_Fee_PG,
FORMAT(sum(((d.resource_fee * 2.4))),0) as Total_resourdes_fee,
FORMAT(sum(ifnull(fb.fee_a_discount,0)),0) as SCEOPTDISC,
FORMAT( ( sum(ifnull(fb.concession_amount,0))),0) as Total_Concession_Amount,
FORMAT( ( sum(ifnull(fb.scholarship_amount,0))),0) as Total_scholarship_amount,
FORMAT(( sum(ifnull(d.musakhar,0))),0) as Total_musakhar_charges,
if(fb.bill_cycle_no=1,0, FORMAT(( sum(ifnull(d.yearly,0))),0))  as Yearly_charges,
FORMAT( ( sum(ifnull(fb.oc_smartcard_charges,0))),0) as Total_card_charges,
FORMAT( ( SUM(CASE WHEN fb.adjustment<0 THEN fb.adjustment ELSE 0 END)),0) as ArrearswithoutLateFeeRolloverFee,
FORMAT(( sum(ifnull(fb.oc_late_fee,0))),0) as Total_late_received,
FORMAT( ( sum(ifnull(fb.roll_over_charges,0))),0) as Total_rolover_charges,
FORMAT((SUM(CASE WHEN fb.adjustment >= 0 THEN fb.adjustment ELSE 0 END)),0) as Adjustments,
FORMAT((sum(fb.bill_payable)),0) as Total_Fees,
FORMAT((sum(ifnull(fb.oc_adv_tax,0))),0) as AdvanceTax,
FORMAT((sum(ifnull(fb.total_payable,0))),0) as GrandTotalwithAdvanceTax
from atif.class_list as cl 
left join atif_fee_student.fee_bill as fb on (fb.student_id=cl.id and fb.academic_session_id=fb.academic_session_id)
left join atif_fee_student.fee_definition as d on ( d.grade_id= cl.grade_id and d.academic_session_id=cl.academic_session_id)
where cl.grade_dname='A2' and cl.academic_session_id=12 and fb.academic_session_id=12 and fb.bill_cycle_no=1  
"; 

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


}