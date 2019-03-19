<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounts\fee_bill;
use App\Models\Accounts\fee_bill_setup;
use App\Models\Accounts\class_list;
use App\Models\Accounts\fee_bill_received;
use App\Models\Accounts\fee_definition;
use App\Models\student\Student_Information\academic_session;
use App\Models\student\Student_Information\req_student_card;
use App\Models\Accounts\concessions_for_session;
use App\Models\Accounts\arriers_adjustment;
use App\Models\Accounts\arrear_adjustment_model;
use App\Models\Accounts\tax_amount;
use App\Models\Accounts\remittance;
use App\Models\Accounts\fee_bill_type_parameter;
use App\Models\Accounts\billing_cycle_definition;
use App\Models\Accounts\fee_bill_received_info;
use App\Models\Accounts\scholarship_for_session;
use App\Models\Accounts\students_all;
use App\Models\Accounts\student_family_records;


use App\Models\Accounts\adjustment;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\RedirectResponse;

use Carbon\Carbon;
use Sentinel;
use Fpdf;
// use FPDI;
use PDF;
use fpdi;
class AccountsController extends Controller
{

    public function __construct()
    {
        $fee_bill_setup=new fee_bill_setup;
        $this->bill_number_of_months =$fee_bill_setup->getInstallmentNumberOfMonths();
    }


    public function getStudentGeneratedBills(request $request){
        ini_set('max_execution_time', 50000); //3 minutes
        $class_list= new class_list;
        $fee_bill= new fee_bill;
        $grade_id = $request->input("Grade_id");
        $billing_cycle=        $request->input('billing_cycle_number');
        $section_name=         $request->input('Snames');
        $gs_id=            $request->input('gs_id');
        $gt_id=            $request->input('gt_id');
        $gf_id=            $request->input('gf_id');
        $std_status_id=      $request->input('status_code');
        $array_ids=explode(",",$grade_id);
        $re_generate=$request->re_generate;

        $array_section_names=explode(",",$section_name);
        if($array_ids[0]==""){
             $array_ids= implode(" ",$array_ids);
        }
        // if(!empty($array_ids)){
        //     if (@in_array("15", $array_ids) || @in_array("16", $array_ids) ){

        //     }else{
        //         return '<span style="color:red">You don"t have permission to create new bills. Please contact to Software Development department</span>';
        //     }
        // }
        // if($list['grade_id']!==15 || $list['grade_id']!==16 ){
        //     return 'bills not allow';
        // }

        if($array_section_names[0]==""){
            $array_section_names= implode(" ",$array_section_names);
        }


        if($request->get('pdf')==false){
            $list=$class_list->getStudentInformationByParamters($array_ids,$array_section_names,$gs_id,$gf_id,$gt_id,$std_status_id);
            $array_student_ids="";
            $i=0;
            foreach ($list as $lists) {
                 $array_student_ids.=$lists->gs_id.',';
                 $current_acadmic_session=$lists->academic_session_id;
                 $student_id=$lists->id;



                 if($lists->gs_id!=="" && $billing_cycle!==""){
                    if($re_generate==1){
                        $fee_bill->deleteBill($student_id,$current_acadmic_session,$billing_cycle);
                    }
                    $this->insertFeeBill($lists->gs_id,$billing_cycle);
                 }
            }

            $array_student_ids=substr_replace($array_student_ids, "", -1);
            
            $get_lastest_bills=$fee_bill->feeInformationFilter($current_acadmic_session,$billing_cycle,$array_ids,$array_section_names,$gs_id,$gf_id,$gt_id,$std_status_id);
                    return view('account_process.accounts.fee_billing_table_1',['get_lastest_bills'=>$get_lastest_bills]);

            //   if($get_lastest_bills[0]['grade_id']=='15' || $get_lastest_bills[0]['grade_id']=='16' ){
            //             return view('account_process.accounts.fee_billing_table_1',['get_lastest_bills'=>$get_lastest_bills]);

            //     }else{
            //             return '<span style="color:red">You don"t have permission to create new bills. Please contact to Software Development department</span>';

            //     }

        }else{
            $array_ids;
            @$list=$fee_bill->feeInformationFilter($current_acadmic_session,$billing_cycle,$array_ids,$array_section_names,$gs_id,$gf_id,$gt_id,$std_status_id);
            $array_student_ids="";
            foreach ($list as $lists) {
                 $lists->gs_id;
                 $array_student_ids.=$lists->gs_id.',';
                 $current_acadmic_session=$lists->academic_session_id;
            }
            $gs_ids=substr_replace($array_student_ids, "", -1);
            $this->fetchFeeBill($gs_ids);



        }

         
        

        

       
  // return response()->json(array('success' => true, 'Gname'=>$Gname,'Snames'=>$Snames,'st'=>$st ));

    }
    //  request $request

    public function uploadStudentList(){
                ini_set('max_execution_time', 50000); //3 minutes
        $class_list=  new class_list;
        $query="select 

( ifnull(s.adjustment_amount,0) - ifnull(ff.admission_fee,0) ) as Total_remaining_arriers,
s.*, ff.*

from atif_fee_student.arriers_adjustments as s 
inner join ( select * from atif_fee_Student.fee_bill as fb where fb.academic_session_id=13
and fb.bill_title='Admission' and fb.fee_bill_type_id=1
and fb.bill_due_date='2019-01-02' ) as ff
on ff.student_id = s.student_id
where s.adjustment_amount != '0' and ( ifnull(s.adjustment_amount,0) - ifnull(ff.admission_fee,0))>-1
";

        $details = DB::connection('mysql_Career_fee_bill')->select($query);

        $details= collect($details)->map(function($x){ return (array) $x; })->toArray(); 
        $i=0;
        foreach ($details as  $detail) {
          echo $i++.'<br>';
          //  echo '<br>'; 
            // @$student_id=$class_list->classListInformation($detail['gs_id'])['id'];
            // @$academic_session_id=$class_list->classListInformation($detail['gs_id'])['academic_session_id'];
                $data=array(
                        'adjustment_amount' =>$detail['Total_remaining_arriers']
                        );     
            // echo str_replace(",","",$amount);
            $details = DB::connection('mysql_Career_fee_bill')->table('arriers_adjustments')->where('student_id',$detail['student_id'])->update($data);
            
        }
        

    }

    public function updateComputerSubcription(){
        ini_set('max_execution_time', 50000); //3 minutes
        $class_list=  new class_list;
        $query="SELECT fb.gb_id,fb.academic_session_id,fb.admission_fee,fb.security_deposit,(fb.security_deposit-15000) as new_computer,('15000') as new_security_deposit from atif_fee_student.fee_bill fb 
        where fb.academic_session_id IN (9,10,11,12,13,14) 
        and fb.security_deposit > 15000";

        $details = DB::connection('mysql_Career_fee_bill')->select($query);

        $details= collect($details)->map(function($x){ return (array) $x; })->toArray(); 
        $i=0;
        foreach ($details as  $detail){
                $data=array(
                'security_deposit' =>$detail['new_security_deposit'],
                'computer_subcription_fee' =>$detail['new_computer'],
                );            
                $details = DB::connection('mysql_Career_fee_bill')
                ->table('fee_bill')
                ->where('gb_id',$detail['gb_id'])
                ->update($data);
        }
    
    }


   public function getSummerAdjustment($gs_id){
        ini_set('max_execution_time', 50000); //3 minutes
        $class_list=  new class_list;
        $query="SELECT * FROM summer_refund WHERE gs_id='$gs_id'"; 
        $details = DB::connection('mysql_Career_fee_bill')->select($query);
        $details= collect($details)->map(function($x){ return (array) $x; })->toArray(); 
        $i=0;
           return  0;
    }



    public function insertFeeBill($gs_id,$bill_cycle_no){
      
        $fee_bill = new fee_bill;
        $class_list = new class_list;
        $session = new academic_session;
        $arriers_adjustment= new arriers_adjustment;
        $tax_amount= new tax_amount;
        $remittance= new remittance;
        $fee_bill_received=new fee_bill_received;
        $concession = new concessions_for_session;
        $billing_cycle_definition=new billing_cycle_definition;
        $adjustment= new adjustment;
        $scholarship_for_session=new scholarship_for_session;
        $req_student_card=new req_student_card;
        $arrear_adjustment_model= new arrear_adjustment_model;

        $billing_cycle_definition::getCurrentInstallmentNumber();
     
        $roll_over_charges=0;
        $year="";
        $applicable_taxes=0;
        $total_adjustments=0;
        $billing_cycle = "";
        $resource_fee="";
        $musakhar="";
        $yearly="";
        $lab_avc="";
        $std_status_code="";
        $tuition_fee="";
        $gross_tution_fee="";
        $south_campus_discount="";
        $gross_tution_fee="";
        $additional_charges=0;
        $total_bills_genrated="";
        $south_campus_discount="";
        $resource_fee=0;
        $std_status_code="";
        $musakhar_fee_show=false;
        $resource_fee_show=false;
        $lab_avc_fee_show=false;
        $installment_dicount_percentage="";
        $scholarship_code_1="";
        $scholarship_code_2="";
        $scholarship_percentage_1="";
        $scholarship_percentage_2="";
        $amount_exceed=false;
        $arrears=false;
        $total_arriers="";



        // $gs_id=$request->get('gs_id');
        // $bill_cycle_no=$request->get('bill_cycle_no');
        // $academic_session_id=$request->get('academic_session_id');
        $list=$class_list->getInformationByGsId($gs_id,$bill_cycle_no);
        
        // var_dump($list['academic_name']);
        //$branch_code=$this->getBranchCodeByCampus($list['campus']);//South Campus 2 North Campus =1
        //$year=$session->GetAcademicSession($branch_code)['dname'];
        $year = $list['academic_name'];
        
        //$billing_cycle=$list['bill_no'];
        $billing_cycle = $bill_cycle_no;
        $resource_fee=$list['resource_fee']*$this->bill_number_of_months;
        $difference=$list['difference']*$this->bill_number_of_months;
        $musakhar=$list['musakhar'];
        $yearly=$list['yearly'];
        $lab_avc=$list['lab_avc'];
        $student_id=$list['student_id'];
        $academic_session_id=$list['a_session_id'];
        $std_status_code=$list['std_status_code'];
        $tuition_fee=($list['tuition_fee']*$this->bill_number_of_months);
        $gross_tution_fee=($tuition_fee+$resource_fee);
        // die;
        $south_campus_discount=$concession->southCampusDiscount($list['student_id'],$list['a_session_id'],$billing_cycle);
        $gross_tution_fee=($gross_tution_fee-$difference)-($south_campus_discount*$this->bill_number_of_months);
        if($std_status_code=="S-CPT"){
             $arrears_suspended=$fee_bill->getSuspendedBarriers($list['student_id']);
             $scpt_unique_number=1;
             $fee_bill_type_id=2;
        }else{
            $arrears_suspended="";
            $scpt_unique_number=0;
            $fee_bill_type_id=1;
        }

        $student_id=$list['student_id'];
        $last_issue_date=$fee_bill->getLastBillIssueDate($student_id);
        $smartcard_charges=$req_student_card->GetSmartCardCharges($student_id,$last_issue_date);
        // if($list['grade_id']!==15 || $list['grade_id']!==16 ){
        //     return 'bills not allow';
        // }
        $total_bills_genrated=$fee_bill->countBills($list['student_id'],$list['a_session_id']);

        $bill_no=$total_bills_genrated+1;
        $fee_concession=$concession->getConcessionInformation($list['student_id'],$list['a_session_id']); 
        $installment_dicount_percentage=$this->getCurrentInstallmentPercentage($list['bill_no'],$fee_concession);
        
        @$get_scholarship_information=$scholarship_for_session->getScholarShipInformation($student_id,$academic_session_id,$list['bill_no']);
        @$scholarship_code_1=$get_scholarship_information[0]['code'];
        @$scholarship_percentage_1=$get_scholarship_information[0]['percentage'];
        if(count($get_scholarship_information)>1){
            @$scholarship_code_2=$get_scholarship_information[1]['code'];
            @$scholarship_percentage_2=$get_scholarship_information[1]['percentage'];
        }
        $total_scholarship_percentage=$scholarship_percentage_1+$scholarship_percentage_2;
        $total_scholarship_amount=$this->calculateDiscount($gross_tution_fee,
            $total_scholarship_percentage);

        $discount_total_monthly=$this->calculateDiscount(($gross_tution_fee),$installment_dicount_percentage);
        $net_discount_amount=$discount_total_monthly+$total_scholarship_amount;

        $codes=$this->getCodes($fee_concession,$discount_total_monthly);
        $yearly_charges=$billing_cycle_definition->getYearly($billing_cycle,$list['grade_id'],$list['a_session_id']);
        if(@$total_adjustments==""){
             $total_adjustments=0;
        }
        if($resource_fee>0){

             $gross_tution_fee=$gross_tution_fee;
        }else{
             $gross_tution_fee=$tuition_fee-$difference;
        }
        // $gross_tution_fee;
        // die;
        $musakhar_fee_show=$this->IncudeCharges($list['grade_id'],13,5);
        $resource_fee_show=$this->IncudeCharges($list['grade_id'],14,1);
        $lab_avc_fee_show=$this->IncudeCharges($list['grade_id'],16,15);
        
        if($musakhar_fee_show==true){
            $additional_charges=($additional_charges+($musakhar*$this->bill_number_of_months));
        }
        if($lab_avc_fee_show==true){
            $additional_charges=$additional_charges+($lab_avc*$this->bill_number_of_months);
        }
        if($smartcard_charges){
            $additional_charges=$additional_charges+($smartcard_charges);
        }

        if($yearly_charges==true){
            if($codes=='C(TC),C(TE)'){
                $yearly=0;
            }elseif($codes=='C(TE),C(TC)'){
                $yearly=0;
            } 
            if($codes=='C(TC)'){
                $yearly=0;

            }else{
                $yearly=$yearly;
            }

            $gs_id_year=explode('-',$gs_id)[0];
            if($gs_id_year==19){
                $yearly=0;
            }

            $additional_charges=$additional_charges+$yearly;
        }else{
                $yearly=0;
        }
       
        //add taxes
      
       
        // $bill_found=0;0
          //these variabes also define on top
          $total_adjustments=$adjustment->getadjustments($list['student_id']);
                if($list['grade_id']==15 && $billing_cycle==1){
                    if($total_adjustments>=0){
                         $fee_bill_type_id=9;
                        $bill_number=$this->generateBillNumber($year,84,$gs_id,$fee_bill_type_id);//get bill number
                    }else{
                        $fee_bill_type_id=8;
                        $bill_number=$this->generateBillNumber($year,83,$gs_id,$fee_bill_type_id);//get bill number
                    }
                }else{
                    $bill_number=$this->generateBillNumber($year,$billing_cycle,$gs_id);//get bill number
                }
        $bill_number_remove_dash=str_replace('-','',$bill_number)+$scpt_unique_number;
        $bill_found=$fee_bill->checkBillExistance($bill_number_remove_dash);
     
    if($bill_found<1){
        if($gs_id!="" && $billing_cycle!=""){
        
              $gross_additional_charges=$gross_tution_fee+$additional_charges;
                     // $tax_allow=$this->StudentApplicableForTaxes($list,$gross_additional_charges);
                    //purani jaga tax calcualte karna ki harmi pan ki waja sa necha kari ha
 
              $total_adjustments=$this->calculate_arrier_adjustments($list['student_id'],$billing_cycle,$list['academic_session_id'],$list['std_status_code']);
             
                if($installment_dicount_percentage==100 && $total_adjustments<=0){
                    // $total_current_bill=($gross_tution_fee+$additional_charges+$resource_fee)-@$discount_total_monthly;
                    
                    if($list['grade_id']!=15 && $list['grade_id']!=16){
                        $min_resource_fee=(480*$this->bill_number_of_months);
                        //$total_adjustments=$total_adjustments+$min_resource_fee; commited on 2-11-2019
                    }elseif($list['grade_id']!=16 && $list['grade_id']!=15){
                        $min_resource_fee=(480*$this->bill_number_of_months);
                        // $total_adjustments=$total_adjustments+$min_resource_fee;  commited on 2-11-2019
                    }else{
                        $min_resource_fee=0;
                    }

                }
               
        
               @$fee_details=$fee_bill->getLastBillByStudentId($list['student_id'],$billing_cycle,$list['academic_session_id'],$list['std_status_code']);
               @$received_amount=$fee_bill_received->getLastReceivedAmount(@$fee_details['id']);
                if($billing_cycle==2){
                   if($received_amount>200000){
                        $amount_exceed=true;
                        $adjustment_taxes=$total_adjustment_taxes=$this->calculate_adjustment_taxes($list['student_id'],$billing_cycle,$list['academic_session_id'],$list['std_status_code']);
                        $total_adjustments=-($adjustment_taxes-$total_adjustments);
                    }
                }
                
                $custom_arrear_adjustment=$arrear_adjustment_model->get_custom_pending_amount_id($list['student_id'],$billing_cycle);
                $total_adjustments=$total_adjustments+$custom_arrear_adjustment;
            
                if($total_adjustments<0){

                    $adjustment->insertUpdateAdjustment($list['student_id'],str_replace("-","",$total_adjustments));
                    $arriers_adjustment->InsertUpdateArriers($list['student_id'],0);

                }elseif($total_adjustments>0){
                    $arrears=true;
                    $taxes= $fee_bill->getLastBillTaxes($list['student_id']);
                    @$last_bill_taxes=$taxes['oc_adv_tax'];
                    @$last_taxes=$taxes['adjustment'];
                    if($last_taxes!=0){
                        $amount=($last_taxes*5)/100;
                    }
                    $previos_roll_over=$fee_bill->getLastBillRollOver($list['student_id'],$list['academic_session_id']);
                    //for temp use only next time we have to remove this line we have to remove rollover charges rollover charges only be added in rollover charges. it will never calculated in taxes
                    if($total_adjustments>1000){
                        $total_adjustments=$total_adjustments-$previos_roll_over;
                    }

                    $arriers_adjustment->InsertUpdateArriers($list['student_id'],$total_adjustments);
                    $adjustment->insertUpdateAdjustment($list['student_id'],0);

                }else{
                    $adjustment->insertUpdateAdjustment($list['student_id'],0);
                    $arriers_adjustment->InsertUpdateArriers($list['student_id'],0);
                }
                 $total_arriers=
                 $arriers_adjustment->getAllRemitanceadjustements($list['student_id'])['adjustment_amount'];//these all are arriers
                 $total_arriers_with_taxes=
                 $arriers_adjustment->getAllRemitanceadjustements($list['student_id'])['adjustment_amount'];//these all are arriers
                if($total_adjustments>0){
                        $roll_over_charges=0;
                        $total_arriers=($total_arriers-@$last_bill_taxes);
                    if($total_arriers>700){
                        $roll_over_charges=(600+400)+$previos_roll_over;
                        $fee_bill->roll_over_charges=$roll_over_charges;//insert into late fee charges column

                    }
                }

                // $arriers_adjustment->getAllRemitanceadjustements($list['student_id'])['adjustment_amount'];//these all are arriers
                $std_adjustments=$adjustment->getadjustments($list['student_id']);
                $total_adjustments=($total_arriers+$std_adjustments);

                $total_current_billing=((($gross_tution_fee+$additional_charges+$total_arriers)-$net_discount_amount));
                // die;
                $total_current_billing_with_arrears=($gross_tution_fee+$additional_charges)-$net_discount_amount;//if student paid first bill and 2nd bill paid partially e.g payable 2 lac and received 1 lac so for tax calculation

                 $total_current_billing2=(($gross_tution_fee+$additional_charges))-$net_discount_amount;
                if($amount_exceed==true){
                    $tax_allow=$this->StudentApplicableForTaxes($list,$total_current_billing,$billing_cycle);

                }else{
                    $tax_allow=$this->StudentApplicableForTaxes($list,($total_current_billing-(str_replace('-','',$std_adjustments))),$billing_cycle);

                }  
               
                $billing_amount_with_adjustment="";
                $total_current_billing;
               $tax_allow;
                if($tax_allow==0){
                    $applicable_taxes=0;
                }else{
                    if($amount_exceed==true){
                        $admission_fee=$fee_bill->getAdmissionFee($list['student_id']);
                        $total=$this->calculateDiscount($admission_fee,5);
                        $applicable_taxes=$adjustment_taxes+$total;
                    }else{
                        $total_current_billing;
                         $applicable_taxes=$this->calculateTaxes($list,$total_current_billing,$bill_cycle_no,$total_current_billing_with_arrears,$total_arriers,$total_current_billing2);
                    }
                }
                $fee_bill->fee_bill_type_id=$fee_bill_type_id;//by default 1 for regular bill
                $fee_bill->gb_id=$bill_number_remove_dash;
                $fee_bill->academic_session_id= $list['a_session_id'];
                $fee_bill->bill_cycle_no=$list['bill_no'];
                $fee_bill->bill_title=$list['title'];
                $fee_bill->bill_issue_date=$list['issue_date'];
                $fee_bill->bill_due_date=$list['due_date'];
                $fee_bill->bill_bank_valid_date=$list['bank_validity_date'];
                $fee_bill->bill_months=$this->bill_number_of_months;
                $fee_bill->student_id=$list['student_id'];

                //these columns not  required now not mandatory asif by create these columns for personal use start
                $fee_bill->fee_a='';
                $fee_bill->fee_a_discount=@$south_campus_discount;
                $fee_bill->concession_percentage=@$installment_dicount_percentage;
                $fee_bill->concession_amount=@$discount_total_monthly;
                $fee_bill->concession_code=@$codes;
                $fee_bill->fee_d_l1='';
                $fee_bill->fee_d_l2='';
                $fee_bill->fee_b='';
                $fee_bill->fee_b_discount='';
                //these columns not  required now not mandatory asif by create these columns for personal use end
                if($total_adjustments==""){
                    $total_adjustments=0;
                }

                // echo $additional_charges;
                // die;
                $fee_bill->adjustment=$total_adjustments;
                $fee_bill->arrears_suspended=$arrears_suspended;
                $fee_bill->gross_tuition_fee=$gross_tution_fee;
                                if($installment_dicount_percentage==100){
                    // $total_current_bill=($gross_tution_fee+$additional_charges+$resource_fee)-@$discount_total_monthly;
                    if($list['grade_id']!=15){
                        $resource_fee=(480*$this->bill_number_of_months);
                        $additional_charges=$additional_charges+$resource_fee;

                    }elseif($list['grade_id']!=16){
                        $resource_fee=(480*$this->bill_number_of_months);
                        $additional_charges=$additional_charges+$resource_fee;
                    }
                    
                    $total_current_bill=($total_current_billing2+$resource_fee);

                    // if($total_adjustments<0){
                    //     $total_current_bill=0;
                    // }


                }else{
                     $total_current_bill=($total_current_billing2);
                }
                 $summer_adjustments=$this->getSummerAdjustment($list['gs_id']);
                $fee_bill->additional_charges=$additional_charges-$summer_adjustments;
                 $total_current_billing2;
                $fee_bill->total_current_bill=$total_current_bill-$summer_adjustments;
                $fee_bill->difference=$difference;
                $fee_bill->summer_fee_adjustment=$summer_adjustments;
                $scholarship_percent_code_1="";
                $scholarship_percent_code_2="";
                
                if($scholarship_code_1!=""){
                    $scholarship_percent_code_1='('.$scholarship_code_1.')'.$scholarship_percentage_1;
                }
                if($scholarship_code_2!=""){
                    $scholarship_percent_code_2='('.$scholarship_code_2.')'.$scholarship_percentage_2;
                }
                $scholarship_codes=$scholarship_percent_code_1.','.$scholarship_percent_code_2;
                $fee_bill->scholarship_codes=$scholarship_codes;//it will be blank when regular bill generate
                $fee_bill->scholarship_percentage=$total_scholarship_percentage;//it will be blank when regular bill generate
                $fee_bill->scholarship_amount=$total_scholarship_amount;//it will be blank when regular bill generate
                $fee_bill->oc_surcharge="";//it will be blank when regular bill generate
                $fee_bill->oc_smartcard_charges=$smartcard_charges;
                $fee_bill->oc_suspended="";//suspended we will calculate in future it is not part of regular bill
                $fee_bill->oc_adv_tax=$applicable_taxes;
                $fee_bill->oc_late_fee="";//it wirll be update automatically after bill due date
                $fee_bill->oc_yearly=$yearly;


                $fee_bill->waive_amount="";//management will tell later need to create am new table
                $fee_bill->admission_fee="";//blank for future work
                $fee_bill->security_deposit="";//blank for future work
                $fee_bill->bill_payable=$gross_tution_fee;
                if($installment_dicount_percentage==100){
                    if($list['grade_id']!=15){
                        $resource_fee=0;
                    }elseif($list['grade_id']!=16){
                        $resource_fee=0;
                    }
                $fee_bill->total_payable=(($total_adjustments+$total_current_bill+$applicable_taxes+$roll_over_charges)-$summer_adjustments);
                 }else{
                     $fee_bill->total_payable=(((($total_adjustments+$gross_tution_fee+$additional_charges+$applicable_taxes+$roll_over_charges))-$net_discount_amount)-$summer_adjustments);
                 }               
                $fee_bill->is_void="";//not required
                $fee_bill->ip4  ="";//not required
                $fee_bill->filename="";//not required
                $fee_bill->created= Carbon::now()->timestamp ;
                $fee_bill->register_by=Sentinel::getUser()->id;
                $fee_bill->modified=Carbon::now()->timestamp;
                $fee_bill->modified_by=Sentinel::getUser()->id;
                $fee_bill->record_deleted=0;
                if($bill_found<1){
                    $fee_bill->save();
                }else{
                   // $update=fee_bill::find($bill_number_remove_dash);
                    // $update->delete();
                    // $fee_bill->save();
                }
        }
    }
        // $gb_id=$fee_bill->getLastBillNumber($list['student_id'],$list['a_session_id'])['gb_id'];
        // $path='accounts/fetch_fee_bill?gb_id='.$gb_id;
        //  return redirect($path);
        
    }


    private function getLastBillStatus($student_id,$fee_bill,$fee_bill_received){
            $fee_details=$fee_bill->getLastBillByStudentId($list['student_id']);

            // $received_taxes=$fee_bill_received_info->getReceivedTaxes($list['student_id']); //old code
            $previous_bill_taxes = $fee_details['oc_adv_tax'];
            // $fee_details

            $admission_fee=$fee_bill->getAdmissionFee($list['student_id']);

            $received_amount= $fee_bill_received->getReceivedAmount($fee_details['id']);
            $adjustment_amount=$adjustment->getadjustments($list['student_id']);
    }

    public function StudentApplicableForTaxes($list,$gross_and_additional_charges,$billing_cycle){
            $fee_bill = new fee_bill;
            $class_list = new class_list;
            $session = new academic_session;
            $arriers_adjustment= new arriers_adjustment;
            $tax_amount= new tax_amount;
            $remittance= new remittance;
            $fee_bill_received=new fee_bill_received;
            $adjustment=new adjustment;
            $taxes=0;
            $total_adjustments=0;
            $remitance_taxes=0;
            $received_taxes=0;
            // $total_adjustments=$this->getAllRemitanceadjustements($list['student_id']);
            // remitance_taxes is real taxes  $student_id,$billing_cycle_number="",$academic_session_id="",$status=""


            //only for summer adjsutment
            $summer_refund=$this->getSummerAdjustment($list['gs_id']);
            $gross_and_additional_charges=$gross_and_additional_charges-$summer_refund;
            $received_amount=$this->calculate_arrier_adjustments($list['student_id'],$billing_cycle,$list['academic_session_id'],$list['std_status_code']);


            @$arriers_amount=$arriers_adjustment->getAllRemitanceadjustements($list['student_id'])['adjustment_amount']; 
            $admission_fee=$fee_bill->getAdmissionFee($list['student_id']);
            $adjustment_amount=$adjustment->getadjustments($list['student_id']);
            $balance=$arriers_amount+$adjustment_amount;
            $adjustment_amount2=str_replace('-','', $adjustment_amount);//simply adjustment amount without minus
            if($billing_cycle>1 && $adjustment_amount2>20000){
                $taxable_amount=$adjustment_amount2+$gross_and_additional_charges;
            }else{
                $taxable_amount=$received_amount+$gross_and_additional_charges;
            }
            $total_previous_bill_amount=$fee_bill_received->sumTotalPayments($list['student_id'],$list['a_session_id']);
            if($billing_cycle>1 && $adjustment_amount2>20000){

                $taxable_amount=$adjustment_amount2+$gross_and_additional_charges;


            }else{
                 $taxable_amount=$total_previous_bill_amount+$gross_and_additional_charges;

                if($admission_fee>0){
                    $taxable_amount=$total_previous_bill_amount+$gross_and_additional_charges+$admission_fee;
                }

            }
            $admin_set_tax_amount=$tax_amount->getTaxPercentage($list['a_session_id'])['tax_amount'];
            $taxable_amount;
            if($taxable_amount>$admin_set_tax_amount){ 
                 $taxes=1;
            }
            $student_remitance_applicable=$remittance->verifyRemitanceStudent($list['student_id']);
            $bill_numbers=$fee_bill->getAllBillNumbers($list['student_id'],$list['a_session_id']);     
            foreach ($bill_numbers as $bill_number){

                $bill_id=$bill_number->id;
                $PaymentMethod=$fee_bill_received->getPaymentMethod($bill_id)['received_payment_mode'];
                if($PaymentMethod=='Foreign Remittances'){
                    $taxes=0;
                    break;
                }
            }
            
           return $taxes;
    }

    public function calculateTaxes($list,$total_current_billing,$billing_cycle="",$total_current_billing_with_arrears="",$arrears,$total_current_billing2=""){
                $fee_bill = new fee_bill;
                $class_list = new class_list;
                $session = new academic_session;
                $arriers_adjustment= new arriers_adjustment;
                $tax_amount= new tax_amount;
                $remittance= new remittance;
                $fee_bill_received=new fee_bill_received;
                $fee_bill_received_info=new fee_bill_received_info;
                $adjustment=new adjustment;
                $fee_definition = new fee_definition;

                if($arrears==true){
                    $total_current_billing=$total_current_billing;
                    $total_current_billing_with_arrears=$total_current_billing_with_arrears;
                }

                 $total_current_billing=$total_current_billing-$this->getSummerAdjustment($list['gs_id']);

                $tax_percentage=$tax_amount->getTaxPercentage($list['a_session_id'])['tax_percentage'];

                $fee_details=$fee_bill->getLastBillByStudentId($list['student_id']);

                 $last_bill_id=$fee_details['id'];
                 $last_bill_received=$fee_bill_received->getOnlylastReceived($last_bill_id);

                // $received_taxes=$fee_bill_received_info->getReceivedTaxes($list['student_id']); //old code
                // $previous_bill_taxes =$fee_bill->getLastBillTaxesByStudentId($list['student_id'],$list['a_session_id']);
                $previous_bill_taxes =$fee_bill->getOnlyLastTaxes($list['student_id'],$list['a_session_id']);

                // $fee_details
                $status=$list['std_status_code'];
                $admission_fee=$fee_bill->getAdmissionFee($list['student_id']);
                // echo $received_amount= $fee_bill_received->getReceivedAmount($fee_details['id']);
                $received_amount=$fee_bill_received->getReceivedAmount($fee_details['id']);

                if($status=='S-CPT'){

                        $fee_details=$fee_bill->getLastBillByStudentId($list['student_id'],$list['bill_cycle_no'],$list['academic_session_id'],$list['std_status_code']);
                        foreach ($fee_details as $fee_detail) {
                            if($fee_bill_received->getReceivedAmount($fee_detail->id)>0){
                                $received_amount=$fee_bill_received->getReceivedAmount($fee_detail->id);
                                $fee_bill_id=$fee_detail->id;
                                $fee_details=$fee_bill->getScptFirstBill($list['student_id'],$list['bill_cycle_no'],$list['academic_session_id']);
                                $total_payable=$fee_detail->total_payable;//get last bill total payable amount

                            }
                            $total_current_bill=$fee_detail->total_current_bill;//get last bill total payable amount
                            $previous_bill_adjsutment=$fee_detail->adjustment;//get last bill total payable amount
                            if($received_amount>200000){
                                     $received_amount=($received_amount/1.05);
                            }

                        }
                        
                  }

                
              
               if($billing_cycle>2){
                    if($received_amount>0 &&$previous_bill_taxes!=0){

                       if($received_amount>$previous_bill_taxes){
                                 $applicable_taxes=$this->calculateDiscount($total_current_billing2,$tax_percentage);
                                //if received amount greater than taxes then first system will deduct taxes by his received amount and taxes is only for current billing.
                            }else{

                                //if received amount greater than 0 (paid bill amount or  more than bill amoount)
                                    @$received_amount=$received_amount-($previous_bill_taxes+$fee_details->roll_over_charges);
                                    $applicable_taxes=$this->calculateDiscount($admission_fee+$received_amount+$total_current_billing,$tax_percentage);
                                    $applicable_taxes= $applicable_taxes-$previous_bill_taxes;
                                   if($last_bill_received>=@$fee_details['total_payable']){
                                         // $applicable_taxes=$this->calculateDiscount($admission_fee+$total_current_billing,$tax_percentage);
                                          if($billing_cycle>4){
                                             $applicable_taxes=$this->calculateDiscount($total_current_billing2,$tax_percentage);
                                         }
                                   }               
                                
                            }          
                    }else if($received_amount>0 && $previous_bill_taxes==0){


                        //if received amount greater than 0 (paid bill amount or  more than bill amoount)
                        $received_amount=$received_amount-($previous_bill_taxes+ @$fee_details->roll_over_charges);
                        $total_received_amount=$fee_bill_received->sumTotalPayments($list['student_id'],$list['academic_session_id']);
                        // $applicable_taxes=$this->calculateDiscount($admission_fee+$total_received_amount+($total_current_billing-@$fee_details->roll_over_charges),$tax_percentage);previoud code

                         @$applicable_taxes=$this->calculateDiscount($admission_fee+$total_received_amount+($total_current_billing-$fee_details->roll_over_charges),$tax_percentage);
                       // $applicable_taxes= $applicable_taxes-$previous_bill_taxes;
                    }else if(($received_amount<@$fee_details['total_payable'] && $received_amount!=0) && $previous_bill_taxes!=0){

                        //if received amount paid but less than total payable
                         $total_received_amount=$fee_bill_received->sumTotalPayments($list['student_id'],$list['academic_session_id']);
                        $applicable_taxes=$this->calculateDiscount($admission_fee+$total_current_billing_with_arrears,$tax_percentage);
                    }else if($received_amount==0){

                       $total_received_amount=$fee_bill_received->sumTotalPayments($list['student_id'],$list['academic_session_id']);
                        $total_received_amount;
                        if($received_amount>0){
                             $applicable_taxes=$this->calculateDiscount($admission_fee+$total_current_billing+$total_received_amount,$tax_percentage);


                        }else{  

                            //only for this case we get july amount by using getLastJulyAmount else july fee will get automatically in sumTotalPayments
                            $july_amount=$fee_bill_received->getLastJulyAmount($list['student_id'],$list['academic_session_id']);

                            if($total_received_amount<1){
                                 $applicable_taxes=$this->calculateDiscount($admission_fee+$total_current_billing+$total_received_amount,$tax_percentage);

                            }else{
                                  $applicable_taxes=$this->calculateDiscount($admission_fee+$total_current_billing+$total_received_amount,$tax_percentage)-$previous_bill_taxes;
                                  if($last_bill_received=="" && $previous_bill_taxes>0){
                                      $previous_bill_taxes =$fee_bill->getOnlyLastTaxes($list['student_id'],$list['a_session_id']);
                                      $applicable_taxes=$this->calculateDiscount($total_current_billing2,$tax_percentage);
                                      $applicable_taxes= $applicable_taxes+$previous_bill_taxes;
                                 }

                                 // die;
                                 

                            }
                        }
                       $applicable_taxes=$applicable_taxes;
                       //new code add for 4th installment before this code tax on taxes work propetly
                    }
                   
               }else{

                     $applicable_taxes=$this->calculateDiscount($admission_fee+$total_received_amount+$total_current_billing,$tax_percentage);
               }
               
                 if($applicable_taxes<0){
                    $applicable_taxes=-($applicable_taxes);
                 }               
                 
               return $applicable_taxes;
    }

    public function UpdateBillNumbers(){
        $class_list=  new class_list;
        $query="select * from fee_bill where fee_bill.academic_session_id=12 and fee_bill.fee_bill_type_id=9";

        $details = DB::connection('mysql_Career_fee_bill')->select($query);

        $details= collect($details)->map(function($x){ return (array) $x; })->toArray(); 
        $i=0;
        foreach ($details as  $detail) {
            $student_id=$detail['student_id'];
            $previous_bill_number=$detail['gb_id'];
            $id=$detail['id'];
            $last_digits = substr($previous_bill_number, -2);    // returns "ef"
             $new_last_digits =($last_digits-10);    // returns "ef"
             $new_bill_numbers=str_replace($last_digits,$new_last_digits,$previous_bill_number);
          // echo $i++;
          //  echo '<br>'; 
            // @$student_id=$class_list->classListInformation($detail['gs_id'])['id'];
            if(!empty($student_id)){
                $data=array(
                    'gb_id' =>$new_bill_numbers,
                     );            
                $details = DB::connection('mysql_Career_fee_bill')->table('fee_bill')
                ->where('id',$id)
                ->update($data);
            }
            
        }

    }

   
    public function studentLastPaymentRemitanceTaxesCron(){
            $fee_bill = new fee_bill;
            $class_list = new class_list;
            $session = new academic_session;
            $fee_definition = new fee_definition;
            $concession=new concessions_for_session;
            $remittance= new remittance;
            $fee_bill_received=new fee_bill_received;
            $arriers_adjustment= new arriers_adjustment;
            $lists=$remittance->getRemitancesPaidFees();
           
            foreach ($lists as $list) {
              
                    $total_previous_bill_amount=$fee_bill->sumPreviousAmount($list->student_id,$list->academic_session_id);
                    //get tax percentage for academic year 
                    //for foregin remitance
                    $payment_number=$fee_bill_received->countTotalPayments($list->student_id,$list->academic_session_id);
                    $previous_taxes=$fee_bill->getLastBillTaxes($list->student_id)['oc_adv_tax'];
                    if($payment_number==5 && $previous_taxes>1){

                            $bill_numbers=$fee_bill->getAllBillNumbers($list->student_id,$list->academic_session_id);     
                            $tax_applicable_amount=$tax_amount->getTaxPercentage($list->academic_session_id)['tax_amount'];
                                foreach ($bill_numbers as $bill_number) {
                                    $bill_id=$bill_number->id;
                                    $PaymentMethod=$fee_bill_received->getPaymentMethod($bill_id)['received_payment_mode'];
                                    if($PaymentMethod!=='Foreign Remittances'){
                                        $taxes_applicable=true;
                                        break;
                                    }
                                }
                                if($taxes_applicable==true){
                                     //calculate percentage of tax
                                        $tax_percentage=$tax_amount->getTaxPercentage($list->academic_session_id)['tax_percentage'];
                                        //last bill taxes
                                        $previous_taxes=$fee_bill->getLastBillTaxes($list->student_id)['oc_adv_tax'];
                                        //subtract tax by previous bill oc_adv_tax
                                        $calculate_tax_percentage=$this->calculateDiscount($total_previous_bill_amount,$tax_percentage);
                                        //final taxes
                                        $applicable_taxes=$calculate_tax_percentage-$previous_taxes;
                                         // getAlladjustements
                                        // $student_id=$arriers_adjustment->getAlladjustements($list['student_id']);
                                        $this->InsertAdjustment($student_id,$total,"taxes of last bills due to non-foreign payments");
                                }

                     }

            }
    

    }

    public function uploadList(){
        $class_list=  new class_list;
        $query="select tl.*,cl.id as student_id from 
        temp_lists tl
        inner join atif.class_list cl 
        on cl.gs_id=tl.gs_id 
        where 
        cl.academic_session_id 
        in (11,12) and 
        tl.billing_cycle_no=3";

        $details = DB::connection('mysql_Career_fee_bill')->select($query);

        $details= collect($details)->map(function($x){ return (array) $x; })->toArray(); 
        $i=0;
       
        foreach ($details as  $detail) {
           
            $student_id=$detail['student_id'];
            $academic_session_id=$detail['academic_session_id'];
            $billing_cycle_no=$detail['billing_cycle_no'];
            $percentage=$detail['percentage'];
            $name_code=$detail['type'];
            $concession_id=$this->getConcessionId($name_code);
            $record_exists=$this->checkStudentExists($student_id,'concessions_for_session',$academic_session_id,$billing_cycle_no,$concession_id);
            if($record_exists>0){ //for scholarships
                // $this->deleteStudent('concession_for_session',$academic_session_id,$billing_cycle_no);
                // $this->updateConcession($student_id,'concessions_for_session',$academic_session_id,$billing_cycle_no,$concession_id,$percentage);
            }else{
                // $this->insertConcessions($student_id,'concessions_for_session',$academic_session_id,$billing_cycle_no,$concession_id,$percentage);
            }
          
        }

    }

     public function uploadScholarshipList(){
        $class_list=  new class_list;
        $query="select tl.*,cl.id as student_id from 
        temp_lists tl
        inner join atif.class_list cl 
        on cl.gs_id=tl.gs_id 
        where 
        cl.academic_session_id 
        in (11,12) and 
        tl.billing_cycle_no=3";

        $details = DB::connection('mysql_Career_fee_bill')->select($query);

        $details= collect($details)->map(function($x){ return (array) $x; })->toArray(); 
        $i=0;
       
        foreach ($details as  $detail) {
           
            $student_id=$detail['student_id'];
            $academic_session_id=$detail['academic_session_id'];
            $billing_cycle_no=$detail['billing_cycle_no'];
            $percentage=$detail['percentage'];
            $type=$detail['type'];
            
            $this->deleteStudent($student_id,'scholarship_for_session',$academic_session_id,$billing_cycle_no,$type);
            $this->insertScholarShips($student_id,'scholarship_for_session',$academic_session_id,$billing_cycle_no,$type,$percentage);
            
        }

    }

    private function checkStudentExists($student_id,$table,$academic_session_id="",$billing_cycle_no="",$concession_id){
        $details = DB::connection('mysql_Career_fee_bill')->table($table)
        ->where([['student_id',$student_id],['academic_session_id',$academic_session_id],['concession_code_id',$concession_id]])
        ->select('student_id')
        ->first();
        // $details= collect($details)->map(function($x){ return (array) $x; })->toArray(); 
         return (count($details));
    }
    private function updateConcession($student_id,$table,$academic_session_id="",$billing_cycle_no="",$concession_id,$percentage=""){
        $data = array(
            'Installment_3' =>$percentage,
            'Installment_4' =>$percentage,
            'Installment_5' =>$percentage,
        );
        $details = DB::connection('mysql_Career_fee_bill')->table($table)
        ->where([['student_id',$student_id],
            ['academic_session_id',$academic_session_id],
            ['concession_code_id',$concession_id]])
        ->update($data);

        // $details = DB::connection('mysql_Career_fee_bill')->query($query);
        return $details;
    }




    private function deleteStudent($student_id,$table,$academic_session_id="",$billing_cycle_no="",$scholarship_type){
        // $query="DELETE FROM ".$table.'WHERE student_id='.$student_id.' AND academic_session_id='.$academic_session_id.' AND billing_cycle_no='.$billing_cycle_no ;

        $details = DB::connection('mysql_Career_fee_bill')->table($table)
        ->where([['student_id',$student_id],
            ['academic_session_id',$academic_session_id],
            ['scholarship_type',$scholarship_type]])
        ->delete();
    }

    private function insertConcessions($student_id,$table,$academic_session_id="",$billing_cycle_no="",$concession_code_id,$percentage=""){
      $data = 
            array(
                'Installment_1' =>0, 
                'Installment_2' =>0, 
                'Installment_3' =>$percentage, 
                'Installment_4' =>$percentage, 
                'Installment_5' =>$percentage,
                'student_id' =>$student_id,
                'concession_code_id' =>$concession_code_id,
                'academic_session_id' =>$academic_session_id,
              );
      $details = DB::connection('mysql_Career_fee_bill')->table($table)->insert($data);
      return $details;
    }
    private function insertScholarShips($student_id,$table,$academic_session_id="",$billing_cycle_no="",$code_id,$percentage=""){
      $data = 
            array(
                'student_id' =>$student_id, 
                'percentage' =>$percentage, 
                'scholarship_type' =>$code_id, 
                'academic_session_id' =>$academic_session_id, 
                'billing_cycle_no' =>$billing_cycle_no
              );
      $details = DB::connection('mysql_Career_fee_bill')->table('scholarship_for_session')->insert($data);
      return $details;
    }


    private function getConcessionId($name_code){
      
      $details = DB::connection('mysql_Career_fee_bill')->table('concession_type_parameter')->select('id')->where('name_code',$name_code)->first();
      $details= collect($details)->map(function($x){ return (array) $x; })->toArray(); 
      return $details['id'][0];
    }




public function fetchFeeBill($gs_id){

            $fee_bill = new fee_bill;
            $class_list = new class_list;
            $session = new academic_session;
            $fee_definition = new fee_definition;
            $concession=new concessions_for_session;
            $fee_bill_type_parameter=new fee_bill_type_parameter;
            $legal_data=new students_all;
            $parent_data=new student_family_records;



            $file =  base_path() . '/vendor/setasign/fpdi/rotation.php';
            include($file);
            $pdf= new FPDI;
            $fpdf= new Fpdf;
            $exp_gs_id=explode(",",$gs_id);
            $installment_dicount_percentage="";
            $musakhar_fee_show=false;
            $resource_fee_show=false;
            $lab_avc_fee_show=false;
            $yearly="";
            $south_campus_discount="";
            $total_payable="";
            $summer_adjustments="";

            foreach ($exp_gs_id as $gs_id){
                $installment_dicount_percentage="";
                $musakhar_fee_show=false;
                $resource_fee_show=false;
                $lab_avc_fee_show=false;
                $yearly="";
                $south_campus_discount="";
                $total_payable="";
                $total_current_billing="";
                $number=0;
                $difference=0;
                $feedetails=$class_list->newFeesInformation($gs_id);
                $gs_id=$feedetails['student_gs_id'];
                $branch_code=$this->getBranchCodeByCampus($feedetails['campus']);//South Campus 2 North Campus =1
                $summer_adjustments="";

                $year=$session->GetAcademicSession($branch_code)['dname'];


                if($feedetails['grade_id']==15 && $feedetails['bill_cycle_no']==1){
                        $fee_bill_type_id=9;
                        $pdf->setSourceFile(base_path().'/public/pdf/resized_final_fee_bill_alevel.pdf');
                        $bill_number=$this->generateBillNumber($year,84,$gs_id);//get bill number
                }else{
                    if($feedetails['bill_cycle_no']==2){
                                        $pdf->setSourceFile(base_path().'/public/pdf/resized_final_fee_bill_installment_2.pdf');
                      }else{
                        $pdf->setSourceFile(base_path().'/public/pdf/resized_final_fee_bill_at_com.pdf');
                     }
                }

                $actual_year=explode('-',$year)[1];
                $billing_cycle=$feedetails['bill_cycle_no'];
                $gs_id_exp=explode('-',$gs_id);
                $gs_sum_1=array_sum(preg_split("//", $gs_id_exp[0]));
                $gs_sum_2=array_sum(preg_split("//", $gs_id_exp[1]));
                $sum_year=array_sum(preg_split("//", $actual_year));
                $sum_billing_cycle=array_sum(preg_split("//", $billing_cycle));
                $last_id_total=$gs_sum_1+$gs_sum_2+$sum_year+$sum_billing_cycle;
                $bill_last_number=substr($last_id_total, -1)+3; // returns "s"
                if($feedetails['grade_id']==15 && $feedetails['bill_cycle_no']==1){
                    if($feedetails['fee_bill_type_id']==8){
                        $number=83;
                    }else{
                        $number=84;
                    }
                    $bill_number=strval($actual_year-1).'-'.strval($number).'-'.strval($gs_id_exp[0]).''.strval($gs_id_exp[1]).'-'.$last_id_total;
                }else{
                    $bill_number=$this->fetchFeeNumbers($feedetails);
                 }
            
                $minimum_resource_fee="";
                $annual_minimum_resource_fee="";
                $installment_minimum_resource_fee="";
                $SorD=$this->getSonOfOrDaughterOf($feedetails['gender']);
                                        $fee_bill_for_months =$feedetails['bill_title'];
                                        $bill_number =$bill_number;
                                        $student_name =$feedetails['student_name'];
                                        $s_or_d =$SorD;
                                        $father_name =ucwords($feedetails['parent_name']);

                                        if($father_name==""){
                                            $family_data=$parent_data->getFamilyData($feedetails['gfid_integer']);
                                            $father_name=$family_data['name'];
                                        }
                                        $cnic =$feedetails['nic'];
                                        if($cnic==""){
                                            $cnic=$legal_data->getTaxnicData($feedetails['student_id'])['tax_nic'];
                                        }
                                        $gs_id =$feedetails['student_gs_id'];
                                        $gf_id =$feedetails['family_id'];
                                        $grade_details=$feedetails['grade_name'].'-'.$feedetails['section_name'];
                                        $issue_date =$feedetails['bill_issue_date'];
                                        $due_date =$feedetails['bill_due_date'];
                                        $valid_date =$feedetails['bill_bank_valid_date'];
                                        $student_id =$feedetails['student_id'];
                                        $south_campus_discount =$feedetails['fee_a_discount'];
                                        $grade_details=$feedetails['grade_name'].'-'.$feedetails['section_name'];

                $fee=$fee_definition->feeDetailByGradeAndSession($feedetails['std_grade_id'],$feedetails['academic_session_id']);
                 $fee_concession=$concession->getConcessionInformation($student_id,$feedetails['academic_session_id']);
                
                 $tution_fee=$fee['tuition_fee'];
                 $resource_fee=$fee['resource_fee'];
                 $difference=$fee['difference'];
                 $musakhar=$fee['musakhar'];
                 $lab_avc=$fee['lab_avc'];
                 $yearly_charges=$feedetails['total_yearly'];
                 $grade_id=$feedetails['std_grade_id'];
                 $billing_cycle=$feedetails['bill_cycle_no'];
                 $oc_adv_tax=$feedetails['oc_adv_tax'];
                 $adjustments=$feedetails['adjustment'];
                 $fee_bill_type_id=$feedetails['fee_bill_type_id'];
                 $total_payable=$feedetails['total_payable'];
                 $gt_id=$feedetails['gt_id'];                 

                 $musakhar_fee_annual=0;
                 $musakhar_fee_annual=0;
                 $annual_resource_fee=0;
                 $installment_resource_fee=0;
                 $installment_dicount_percentage=$this->getCurrentInstallmentPercentage($billing_cycle,$fee_concession);
                 $concession_code=$this->getCodes($fee_concession,$installment_dicount_percentage);
                 $total_monthly_fee="";
                 $total_annual_amount="";
                 $total_this_intallment="";
                 $musakhar_fee_show=$this->IncudeCharges($grade_id,13,5);
                 $resource_fee_show=$this->IncudeCharges($grade_id,14,1);
                 $lab_avc_fee_show=$this->IncudeCharges($grade_id,16,15);

                 $parameters=$fee_bill_type_parameter->getBillParameters($fee_bill_type_id);
                  $bill_title=$parameters['title'];

                  if($feedetails['std_status_code']=="S-CPT"){
                         $bill_notes=$parameters['notes_cpt'];
                  }else{
                         $bill_notes=$parameters['notes'];
                  }
                  //for more than first billing
                  if($grade_id==15 ||$grade_id==16){
                        $bill_title='P R O V I S I O N A L   F E E   B I L L';
/*Removed on request of Imran SHb 
$bill_notes="This Provisional Fee Bill incorporates the third instalment for the Academic Session 2018-19 in compliance with the recent SCP directives.This instalment reflects fee for 1.2 months, i.e., for part of December that had not yet been billed, along with the entire month of January. Please note that due to mid-session changes in fee levels, the indicative annualized fee is for illustrative purposes only. This is a computer generated bill. If you have any queries - or notice any inconsistencies / errors, please contact on email below.";*/
/*$bill_notes="This bill reflects fee for the month of February. Please note that we have already reduced fee
as per interim orders of Supreme Court of Pakistan. A review application is pending with hon.
Supreme Court particularly regarding the summer fee refund and we will keep you appraised
on this matter. This is a computer generated bill. If you have any queries - or notice any
inconsistencies / errors, please contact on email below.
";*/
$bill_notes="This Provisional Fee Bill is the fourth instalment for the Academic Session 2018-19 and incorporates fee for the months of Feb'19 and Mar'19. In compliance with the SCP's interim orders, the bill reflects provisional adjustment of 50% of last year's summer fee.
This is a computer generated bill. If you have any queries - or notice any inconsistencies / errors, please contact on email below.
";

                  }
                 if($grade_id==17){
                    $resource_fee_show=true;
                 }        
           
            $templateId = $pdf->importPage(1);
            // get the size of the imported page
            $size = $pdf->getTemplateSize($templateId);
            $i=0;
            $pdf->AddPage('L', array($size['w'], $size['h']));
            $pdf->useTemplate($templateId);
            if($feedetails['arrears_suspended']){
                 $this->createTableHeading($pdf,62.4,$bill_title,35,'B',8);

                  // $this->createTableHeading($pdf,6$this->bill_number_of_months,$bill_title.'(with Suspended Arriers)',35,'B',8);
            }else{
                 $this->createTableHeading($pdf,61.8,$bill_title,35,'B',8);
            }
            $this->setBilldescription($pdf,11,64,$bill_notes,$fontsize="");
            // $this->rotateText($pdf,185,"",10.5,'',5);//arrier notes

            if($feedetails['adjustment']>0){
                  $this->rotateText($pdf,185,"",10.5,'',5);//arrier notes
            }
                    $this->createTable($pdf,29.5,$feedetails['fee_bill_tittle_show'],13,'B',6);//title

            // if($feedetails['grade_id']==15){
            //      if($feedetails['bill_cycle_no']==2){
            //            $this->createTable($pdf,29.5,$feedetails['fee_bill_tittle_show'],13,'B',6);//title
            //       }
            // }else{
            //     $this->createTable($pdf,29.5,$feedetails['fee_bill_tittle_show'],13,'B',6);//title

            // }

            $this->createTable($pdf,27,'Bill # '.$bill_number,55,'B',6);//bill number
            $bill_issue_date = str_replace(",", "'",$feedetails['bill_issue_date']);
            $bill_due_date = str_replace(",", "'",$feedetails['bill_due_date']);
            $bill_bank_valid_date = str_replace(",", "'",$feedetails['bill_bank_valid_date']);
            $this->createTable($pdf,36,$feedetails['student_name'],55,'B',6);
            $this->createTable($pdf,41,$SorD.' '.ucwords($father_name),55,'',5);
            $this->createTable($pdf,38.5,'GS   ',42.5,'',5);
            $this->createTable($pdf,38.5,$feedetails['student_gs_id'].'                              '.$grade_details,56.2,'B',5);
            $this->createTable($pdf,54.5,$bill_issue_date,4,'B',5);
            $this->createTable($pdf,54.5,$bill_due_date,32,'B',5);
            $this->createTable($pdf,54.5,$bill_bank_valid_date,64.5,'B',5);
            $this->createTable($pdf,46.5,$cnic,14,'B',6);
            if($feedetails['bill_cycle_no']==1){
                $this->createTable($pdf,46.5,'(in case of changes, pls inform billing@generations.edu.pk by 20th August)',50,'B',3);
             }

            $this->createTable($pdf,57.5,$feedetails['std_status_code'],32,'',4);
            $this->createTable($pdf,57.5,$feedetails['gf_id'],64.5,'',4);

            if($gt_id != null){
                $this->createTable($pdf,57.5,"GT-ID".$gt_id,4,'',4);
            }






            $annual_tuition_fee=$tution_fee*12;
            $installment_tution_fee=$tution_fee*$this->bill_number_of_months;
            $this->createTable($pdf,94,'Tuition Fee',3.3,'B',5);
            $this->createTable($pdf,94,number_format($tution_fee),34.2,'',5);
            $this->createTable($pdf,94,number_format($annual_tuition_fee),49.5,'',5);
            $this->createTable($pdf,94,number_format($installment_tution_fee),66,'B',5);

            $installment_difference=$difference*$this->bill_number_of_months;
            $annual_difference=$difference*12;

           





            if($resource_fee_show==true){
                $annual_resource_fee=$resource_fee*12;
                $installment_resource_fee=$resource_fee*$this->bill_number_of_months;
                $this->createTable($pdf,97,'Resource Fee',4.7,'B',5);
                $this->createTable($pdf,97,number_format($resource_fee),35.4,'',5);
                $this->createTable($pdf,97,number_format($annual_resource_fee),50.5,'',5);
                $this->createTable($pdf,97,number_format($installment_resource_fee),66.50,'B',5);
            }else{
                $annual_resource_fee=0;
                $installment_resource_fee=0;
            }

            if($difference>0){
                $this->createTable($pdf,100,'Reduction as per SCP Orders',11.2,'B',5);
                $this->createTable($pdf,100,'('.number_format($difference).')',34.2,'',5);
                $this->createTable($pdf,100,'('.number_format($annual_difference).')',49.5,'',5);
                $this->createTable($pdf,100,'('.number_format($installment_difference).')',66,'B',5);
            }

            if($south_campus_discount!=="0"){
                $annual_sounth_discount=$south_campus_discount*12;
                $installment_sounth_discount=$south_campus_discount*$this->bill_number_of_months;
                $this->createTable($pdf,103,'South Campus Discount',9,'B',5);
                $this->createTable($pdf,103,'('.number_format($south_campus_discount).')',34.2,'',5);
                $this->createTable($pdf,103,'('.number_format($annual_sounth_discount).')',49.5,'',5);
                $this->createTable($pdf,103,'('.number_format($installment_sounth_discount).')',66,'B',5);
            }else{
                $annual_sounth_discount=0;
                $installment_sounth_discount=0;

            }


                //gross tution fee calculation

                $total_monthly=(((@$tution_fee+@$resource_fee)-@$difference)-@$south_campus_discount);
                $total_annual=((@$annual_tuition_fee+@$annual_resource_fee)-@$annual_difference)-$annual_sounth_discount;
                $total_this_intallment=((@$installment_tution_fee+@$installment_resource_fee)-$installment_difference)-$installment_sounth_discount;

                $this->createTable($pdf,106.2,number_format($total_monthly),34.2,'',5);//sum total monthly amoun
                $this->createTable($pdf,106.2,number_format($total_annual),49.5,'',5);//sum annual amount
                $this->createTable($pdf,106.2,number_format($total_this_intallment),66,'b',5);//sum this installment
                //end gross tution fee calculation
                //concession row section\
                // $concession_code=1;
                // $lab_avc_fee_show=true;
                // $musakhar=1;
                // $yearly_charges=1;
                if(!empty($concession_code)){
                      if($grade_id==15 ||$grade_id==16){
                            $concession_text='Concession ';
                      }else{
                            $concession_text='Concession '.$concession_code;
                      }

                    $concession_text='Concession ';
                    $discount_total_monthly=$this->calculateDiscount($total_monthly,$installment_dicount_percentage);
                    $discount_total_annual=$this->calculateDiscount($total_annual,$installment_dicount_percentage);
                    @$discount_total_this_intallment=$this->calculateDiscount($total_this_intallment,$installment_dicount_percentage);
                    $concession_y=112.3;

                    $this->createTable($pdf,$concession_y,$concession_text,3.9,'B',5);
                    // $this->createTable($pdf,$concession_y,$installment_dicount_percentage.'%',26,'',5);//setting discount valuess
                    $this->createTable($pdf,$concession_y,'('.number_format(@$discount_total_monthly).')',34.5,'',5);//calculate monthly amount total discpount
                    $this->createTable($pdf,$concession_y,'('.number_format(@$discount_total_annual).')',50,'',5);
                    $this->createTable($pdf,$concession_y,'('.number_format(@$discount_total_this_intallment).')',66.2,'B',5);

                }

                if($feedetails['summer_fee_adjustment']>0){
                    // $concession_text='Concession '.$concession_code;
                    $concession_text='Provisional Summer Fee Refund ';
                    $discount_total_monthly=$this->calculateDiscount($total_monthly,$installment_dicount_percentage);
                    $discount_total_annual=$this->calculateDiscount($total_annual,$installment_dicount_percentage);
                    @$discount_total_this_intallment=$this->calculateDiscount($total_this_intallment,$installment_dicount_percentage);
                    $concession_y=128.5;

                    $this->createTable($pdf,$concession_y,$concession_text,13,'B',5);
                    // $this->createTable($pdf,$concession_y,$installment_dicount_percentage.'%',26,'',5);//setting discount valuess
                    // $this->createTable($pdf,$concession_y,'('.number_format(@$discount_total_monthly).')',34.2,'',5);//calculate monthly amount total discpount
                    // $this->createTable($pdf,$concession_y,'('.number_format(@$discount_total_annual).')',49,'',5);
                    $summer_adjustments=$feedetails['summer_fee_adjustment'];
                    $this->createTable($pdf,$concession_y,'('.number_format(@$feedetails['summer_fee_adjustment']).')',66,'B',5);

                }

                $feedetails['scholarship_codes'];
                
                if($feedetails['scholarship_amount']!=0){
                    $scholarship_codes = $feedetails['scholarship_codes'];
                    $find = ',';
                    $replace = ' ';
                    $scholarship_codes = preg_replace(strrev("/$find/"),strrev($replace),strrev($scholarship_codes),1);
                    $scholarship_codes=strrev($scholarship_codes); //output: this is my world, not my farm
                    //$scholarship_text='Scholarship '.$scholarship_codes;
                    $scholarship_text='Scholarship ';
                    $scholarship_y=110;
                    $scholarship_monthly=$feedetails['scholarship_amount']/$this->bill_number_of_months;
                    $scholarship_yearly=$scholarship_monthly*12;
                    $this->createTable($pdf,$scholarship_y,$scholarship_text,4.0,'B',5);
                    //$this->createTable($pdf,$scholarship_y,$feedetails['scholarship_percentage'].'%',26,'',5);//setting discount valuess - Code has been disabled
                    $this->createTable($pdf,$scholarship_y,'('.number_format(@$scholarship_monthly).')',34.2,'',5);//calculate monthly amount total discpount
                    $this->createTable($pdf,$scholarship_y,'('.number_format(@$scholarship_yearly).')',49.5,'',5);
                    $scholarship_amount='';
                    $scholarship_amount=number_format($feedetails['scholarship_amount']);
                    $this->createTable($pdf,$scholarship_y,'('.$scholarship_amount.')',66,'B',5);

                }


               // $lab_avc_fee_show=true;
               // $musakhar=true;
               // $yearly_charges=1;
                if($lab_avc_fee_show==true){
                    $annual_lab_avc_fee=$lab_avc*12;
                    $lab_avc_fee_this_month=$lab_avc*$this->bill_number_of_months;
                    $y_pos=118.5;
                    $this->createTable($pdf,$y_pos,'Resource Charges',7,'B',5);
                    $this->createTable($pdf,$y_pos,number_format(@$lab_avc),34.2,'',5);
                    $this->createTable($pdf,$y_pos,number_format(@$annual_lab_avc_fee),49.5,'',5);
                    $this->createTable($pdf,$y_pos,number_format(@$lab_avc_fee_this_month),66,'B',5);
                }else{
                      $annual_lab_avc_fee=0;
                      $lab_avc_fee_this_month=0;
                }
                if($musakhar!=0){
                    $musakhar_fee_annual=$musakhar*12;
                    $installment_musakhar_fee=$musakhar*$this->bill_number_of_months;
                    $this->createTable($pdf,121,'Musakhar Charges',6.9,'B',5);
                    $this->createTable($pdf,121,number_format(@$musakhar),35.5,'',5);
                    $this->createTable($pdf,121,number_format(@$musakhar_fee_annual),50.2,'',5);
                    $this->createTable($pdf,121,number_format(@$installment_musakhar_fee),67,'B',5);
                }else{
                    $musakhar_fee_annual=0;
                    $installment_musakhar_fee=0;    
                    $musakhar=0;
                }
                
                if($feedetails['oc_smartcard_charges']!=0){
                    $this->createTable($pdf,123,'Smart Card Charges',5.9,'B',4);
                    $this->createTable($pdf,123,number_format(@$feedetails['oc_smartcard_charges']),67,'B',5);
                }

                if($yearly_charges!=0){
                    $this->createTable($pdf,124,'Yearly Charges',4.7,'B',4);
                    $this->createTable($pdf,124,number_format(@$yearly_charges),67,'B',5);
                }else{
                    $yearly_charges=0;
                }
                // $installment_dicount_percentage=100;
                if($grade_id!=15 && $grade_id!=16){

                    if($installment_dicount_percentage==100){
                            //for special case only
                            $resource_fee=480;
                            $annual_resource_fee=$resource_fee*12;
                            $y_pos=125.8;
                            $installment_resource_fee=$resource_fee*$this->bill_number_of_months;
                            $this->createTable($pdf,$y_pos,'Minimum Resource Fee',9.0,'B',5);
                            $this->createTable($pdf,$y_pos,number_format($resource_fee),35.5,'',5);
                            $this->createTable($pdf,$y_pos,number_format($annual_resource_fee),50.5,'',5);
                            $this->createTable($pdf,$y_pos,number_format($installment_resource_fee),67.6,'B',5);
                            $minimum_resource_fee=$resource_fee;
                            $annual_minimum_resource_fee=$annual_resource_fee;
                            $installment_minimum_resource_fee=$installment_resource_fee;
                     }else{
                        $minimum_resource_fee="";
                        $annual_minimum_resource_fee="";
                        $installment_minimum_resource_fee="";

                     }
                 }
                
                 if($feedetails['fee_bill_type_id']==9){
                     //for pao
                     $this->createTable($pdf,123,'Admission Fee (Non-Refundable)',12.5,'B',5);
                     $this->createTable($pdf,123,number_format(33000),67,'B',5);
                     $this->createTable($pdf,127,'Waiver for Generians',7.4,'B',5);
                     $this->createTable($pdf,127,'(33,000)',67,'B',5);
                     
                   
                  
                }


                //additional charges total
                $total_charges=@$lab_avc+@$musakhar+@$minimum_resource_fee;
                $total_charges_annual=@$musakhar_fee_annual+@$annual_lab_avc_fee+@$annual_minimum_resource_fee;
                @$total_charges_paid=(@$installment_musakhar_fee+@$lab_avc_fee_this_month+@$yearly_charges+@$feedetails['oc_smartcard_charges']+@$installment_minimum_resource_fee)-@$summer_adjustments;
               
              
               

                if($total_charges_paid==0){

                    $this->createTable($pdf,132.2,"-",34.5,'',5);//sum total monthly amoun
                    $this->createTable($pdf,132.2,"-",49.5,'',5);//sum annual amount
                    $this->createTable($pdf,132.2,"-",66.1,'',5);//sum this installment
                    //end gross tution fee calculatio
                }elseif($total_charges_paid<0){

                    if($total_charges==0){
                        $this->createTable($pdf,132.2,'-',34.9,'',5);//sum total monthly amoun
                    }else{
                        $this->createTable($pdf,132.2,number_format($total_charges),34.9,'',5);//sum total monthly amoun

                    }

                    if($total_charges_annual==0){
                        $this->createTable($pdf,132.2,'-',50,'',5);//sum annual amount
                    }else{
                        $this->createTable($pdf,132.2,number_format($total_charges_annual),50,'',5);//sum annual amount
                    }

                    if($total_charges_paid==0){
                        $this->createTable($pdf,132.2,'-',66.1,'',5);//sum this installment
                    }else{
                        $this->createTable($pdf,132.2,'('.number_format(-($total_charges_paid)).')',66.1,'',5);//sum this installment
                    }
                    //end gross tution fee calculatio
                }else{
                    $this->createTable($pdf,132.2,number_format($total_charges),34.9,'',5);//sum total monthly amoun
                    $this->createTable($pdf,132.2,number_format($total_charges_annual),50,'',5);//sum annual amount
                    $this->createTable($pdf,132.2,number_format($total_charges_paid),66.1,'',5);//sum this installment                }
              }

            // $this->createTable($pdf,135,$feedetails['additional_charges'],67,'',5);//additional charges
                $total_current_billing=($total_this_intallment+$total_charges_paid)-@$discount_total_this_intallment;
                if($feedetails['total_current_bill']<0){
                    $n_total_current_billing=number_format(-$feedetails['total_current_bill']);
                    $n_total_current_billing='('.$n_total_current_billing.')';
                    $this->createTable($pdf,139.2,$n_total_current_billing,70,'B',6);//total current billing
                }else{
                    $this->createTable($pdf,139.2,number_format($feedetails['total_current_bill']),70,'B',6);//total current billing

                }
                $tax_apply_amount=$feedetails['total_current_bill']+$feedetails['adjustment'];
                // if($tax_apply_amount>200000){
                //     $oc_adv_tax=$this->calculateDiscount($tax_apply_amount=$total_current_billing+$feedetails['adjustment'],5);
                // }
                $this->createTable($pdf,152.2,"Advance Tax to Govt on Parent's Behalf (adjustable)",23,'B',5);
                if($oc_adv_tax!=0){
                    $this->createTable($pdf,152.2,number_format($oc_adv_tax),67,'B',5);
                }else{
                    $this->createTable($pdf,152.2,'-',67,'B',5);
                }
                //Preferred / Early Admission Offer
                if($grade_id==15 && $feedetails['bill_cycle_no']==1){
                    $this->createTable($pdf,145.5,'Preferred / Early Admission Offer',15,'B',5);

                }else{
                    $this->createTable($pdf,145.5,'Arrears / (Adjustments)',10,'B',5);

                }
                $total_adjustments=number_format($feedetails['adjustment']+$feedetails['roll_over_charges']);
                if(($total_adjustments)!="0"){
                    if($total_adjustments<0){
                         $total_adjustments='('.str_replace('-','', $total_adjustments).')';
                    }else{
                         $total_adjustments=$total_adjustments;
                    }
                    $this->createTable($pdf,145.5,$total_adjustments,65,'B',5);

                }else{
                         $this->createTable($pdf,145.5,'-',67,'B',5);
                }

                if($feedetails['total_payable']<0){
                        $this->createTable($pdf,159,'N/A',70,'B',6);
                        $this->createTable($pdf,166,'N/A',70,'',6);     
                }else{
                        $this->createTable($pdf,159,number_format($feedetails['total_payable']),70,'B',6);
                        if($grade_id==15 && $billing_cycle==1){
                            $this->createTable($pdf,166,'N/A',70,'',6);                
                        }else{
                            $this->createTable($pdf,166,number_format($feedetails['total_payable']+600),70,'',6);                
                        }
                    }
                
                if($feedetails['arrears_suspended']){
                        $this->createTableHeading($pdf,174,'CUMULATIVE SUSPENDED ARREARS',16,'B',5);
                        $this->createTableHeading($pdf,176,'NOT inclusive of Advance Tax - to be added whenever applicable',22,'B',4);
                        $this->createTableHeading($pdf,176,number_format($feedetails['arrears_suspended']),67.5,'B',5);
                        // $this->createTableHeading($pdf,178,'Not inclusive of Advance Tax to be edit  wherever applicable',16.5,'B',3);
                }


                $i++;
                // $pdf->SetLeftMargin(50);
        }

            // $pdf->AutoPrint(true);
            // $pdf->SetLeftMargin(500);


            $pdf->Output('fb' . '.pdf', 'I');


            exit;

    }


 

  

    private function IncudeCharges($varToCheck, $high, $low) {
        if($varToCheck < $low) return false;
        if($varToCheck > $high) return false;
        return true;
    }


    private function getCurrentInstallmentPercentage($billing_cycle,$concession_percentage){
        $sum=0;
        $installment='Installment_'.$billing_cycle;
        foreach ($concession_percentage as $concession_percentages) {
               $concession_percentages->$installment+$concession_percentages->$installment;
                  $sum+= $concession_percentages->$installment;
        }
        return $sum;
    }

    private function getCodes($concession_parameter,$percentage){
        $codes="";
        
        foreach ($concession_parameter as $fee_concessions) {
         $codes.=$fee_concessions->name_code.',';
        }
        $mycode=substr_replace($codes, "", -1);
        if($percentage==0){
            return $mycode="";
        }
        return  $mycode;
    }



    private function calculateDiscount($amount,$percentage){
        $new_amount = ($percentage / 100) * $amount;
        return $new_amount;
    }


    private function setPlaces($pdf,$margin_top,$value,$margin_left,$bold,$fontsize){
        $bo=0;//border of
        $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf -> SetXY(8+$margin_left, $margin_top);
        $pdf -> Write(0, $value);
        $pdf -> SetXY(102+$margin_left, $margin_top);
        $pdf -> Write(0, $value);
   }

    private function setPlacesThird($pdf,$margin_top,$value,$margin_left,$bold,$fontsize){
        $bo=0;//border of
        $MasterX = 4;
        $MasterY = 0;
        $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf->SetXY($margin_left + 197, $margin_top);
        $pdf->Cell(10, 0,$value, $bo, 0, 'C', 0);
    }

    private function createTable($pdf,$margin_top,$value,$margin_left,$bold,$fontsize){
        $bo=0;//border of
        $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf->SetTextColor(0,0,0);

        $pdf->SetXY($margin_left + 7.2, $margin_top);
        $pdf->Cell(20, 5,$value, $bo, 0, 'C', 0);

        $pdf->SetXY($margin_left + 101, $margin_top);
        $pdf->Cell(20, 5,$value, $bo, 0, 'C', 0);

        $pdf->SetXY($margin_left + 195, $margin_top);
        $pdf->Cell(20, 5,$value, $bo, 0, 'C', 0);

     }

     private function createTableHeading($pdf,$margin_top,$value,$margin_left,$bold,$fontsize){

        $bo=0;//border of
        $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf->SetTextColor(255,255,255);

        $pdf->SetXY($margin_left + 8, $margin_top);
        $pdf->Cell(13, 5,$value, $bo, 1, 'C', 0);

        $pdf->SetXY($margin_left + 102, $margin_top);
        $pdf->Cell(13, 5,$value, $bo, 1, 'C', 0);

        $pdf->SetXY($margin_left + 196, $margin_top);
        $pdf->Cell(13, 5,$value, $bo, 1, 'C', 0);

     }


    private function createParagraph($pdf,$margin_top,$value,$margin_left,$bold,$fontsize){
        $bo=0;//border of

        $pdf->SetXY($margin_left + 8, $margin_top);
        $pdf->Cell(12, 0,$pdf->WriteHTML($value), $bo, 0, 'C', 0);

        $pdf->SetXY($margin_left + 102, $margin_top);
        $pdf->Cell(10, 0,$pdf->WriteHTML($value), $bo, 0, 'C', 0);

        $pdf->SetXY($margin_left + 197, $margin_top);
        $pdf->Cell(10, 0,$pdf->WriteHTML($value), $bo, 0, 'C', 0);

     }

     private function setBilldescription($pdf,$margin_left,$margin_top,$html,$fontsize){
            $pdf->SetFont('Arial','','6');
            $pdf->SetTextColor(0,0,0);
            $pdf->SetXY(13,67);
            $pdf->MultiCell(75,2.2,  $html, 0.3);

            $pdf->SetXY(107,67);
            $pdf->MultiCell(75,2.2,  $html, 0.3);

            $pdf->SetXY(201,67);
            $pdf->MultiCell(75,2.2,  $html, 0.3);
     }





   private function rotateText($pdf,$margin_top,$value,$margin_left,$bold,$fontsize){
        $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf->RotatedText($margin_left+83,$margin_top,"* Please note that any arrears mentioned herein are siginficantly overdue and must be settled immediatley. The Due Date does not apply to Current Arrears.",90);

         $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf->RotatedText($margin_left+177,$margin_top,"* Please note that any arrears mentioned herein are siginficantly overdue and must be settled immediatley. The Due Date does not apply to Current Arrears.",90);

         $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf->RotatedText($margin_left+270.5,$margin_top,"* Please note that any arrears mentioned herein are siginficantly overdue and must be settled immediatley. The Due Date does not apply to Current Arrears.",90);


        // $bo=0;//border of

        // $pdf->SetXY($margin_left + 8, $margin_top);
        // $pdf->Cell(10, 0,$value, $bo, 0, 'C', 0);

        // $pdf->SetXY($margin_left + 102, $margin_top);
        // $pdf->Cell(10, 0,$value, $bo, 0, 'C', 0);
        // $pdf->RotatedText(5,250,"Example of rotated text",90);
        // $pdf->SetXY($margin_left + 197, $margin_top);
        // $pdf->Cell(10, 0,$value, $bo, 0, 'C', 0);

     }


   private function fetchFeeNumbers($feedetails){
        $split_bill=$this->split_on($feedetails['gb_id'],2);
         $bill_part_one=$split_bill[0];
         $bill_split_again=$split_bill[1];
         $split_bill=$this->split_on($bill_split_again,1);
         $fee_bill_part_two=$split_bill[0];
         $split_bill=$this->split_on($split_bill[1],5);
         $fee_bill_part_three=$split_bill[0];
         $fee_bill_part_four=$split_bill[1];
           $bill_number=strval($bill_part_one).'-'.strval($fee_bill_part_two).'-'.strval($fee_bill_part_three).'-'.strval($fee_bill_part_four);
           return $bill_number;
   }

   public function split_on($string, $num) {
        $length = strlen($string);
        $output[0] = substr($string, 0, $num);
        $output[1] = substr($string, $num, $length );
        return $output;
    }

    private function getSonOfOrDaughterOf($gender){
        if ($gender=='B'){
                $getSonOfOrDaughterOf='S/O';
        }else{
                $getSonOfOrDaughterOf='D/O';
        }
        return $getSonOfOrDaughterOf;
    }

    public function calculate_arrier_adjustments($student_id,$billing_cycle_number="",$academic_session_id="",$status=""){
        $fee = new fee_bill;
        $received= new fee_bill_received;        
        // $arriers_adjustment= new arriers_adjustment;
        $received_amount=0;
        $fee_details=0;
        if($status=='S-CPT'){

                    $fee_details=$fee->getLastBillByStudentId($student_id,$billing_cycle_number,$academic_session_id,$status);
                    foreach ($fee_details as $fee_detail) {
                        if($received->getReceivedAmount($fee_detail->id)>0){
                            $received_amount=$received->getReceivedAmount($fee_detail->id);
                            $fee_bill_id=$fee_detail->id;
                            $fee_details=$fee->getScptFirstBill($student_id,$billing_cycle_number,$academic_session_id);
                            $total_payable=$fee_detail->total_payable;//get last bill total payable amount

                        }
                        $total_current_bill=$fee_detail->total_current_bill;//get last bill total payable amount
                        $previous_bill_adjsutment=$fee_detail->adjustment;//get last bill total payable amount
                        if($received_amount>200000){
                                 $received_amount=($received_amount/1.05);
                        }

                    }
                    
                    if($received_amount==0){
                            $fee_details=$fee->getScptFirstBill($student_id,$billing_cycle_number,$academic_session_id);
                            return $pendings=$fee_details;
                    }else{
                        // echo $pendings=$total_payable-$received_amount;
                           return $pendings=$total_payable-$received_amount;
                    }
        }else{
                $fee_details=$fee->getLastBillByStudentId($student_id,$billing_cycle_number,$academic_session_id,$status);
                $total_payable=$fee_details['total_payable'];//get last bill total payable amount
                $total_current_bill=$fee_details['total_current_bill'];//get last bill total payable amount
                $previous_bill_adjsutment=$fee_details['adjustment'];//get last bill total payable amount
                $previous_bill_taxes=$fee_details['oc_adv_tax'];//get last bill total payable amount
                $received_amount=$received->getReceivedAmount($fee_details['id']);
                if($billing_cycle_number==2){
                    if($received_amount>200000){
                        $received_amount=($received_amount/1.05);
                    }
                }

        }


      $last_remaining_amount=$total_payable+($previous_bill_adjsutment);
        if($total_payable==$received_amount){
            return $pendings=0;
        }
        if($last_remaining_amount<=0){
            if($total_payable<0){
                if($previous_bill_taxes>0){
                    $pendings=($previous_bill_adjsutment+$total_current_bill)+$previous_bill_taxes;
                }else{
                    $pendings=($previous_bill_adjsutment+$total_current_bill);
                }
            }else{
                    $pendings=$last_remaining_amount;
                    if($total_payable>0){//if last bill remaining adjustment and bill paid partially
                        $pendings=$total_payable-$received_amount;
                    }
            }
        }else{
           
           $pendings=$total_payable-$received_amount;
        }


        return $pendings;
    }
    public function calculate_adjustment_taxes($student_id,$billing_cycle_number="",$academic_session_id="",$status=""){
        $fee = new fee_bill;
        $received= new fee_bill_received;        
        // $arriers_adjustment= new arriers_adjustment;
                $fee_details=$fee->getLastBillByStudentId($student_id,$billing_cycle_number,$academic_session_id,$status);
                $total_payable=$fee_details['total_payable'];//get last bill total payable amount
                $total_current_bill=$fee_details['total_current_bill'];//get last bill total payable amount
                $previous_bill_adjsutment=$fee_details['adjustment'];//get last bill total payable amount
                $received_amount=$received->getReceivedAmount($fee_details['id']);
                if($received_amount>200000){
                    $received_amount_with_out_tax=($received_amount/1.05);
                }

            $pendings=$received_amount-$received_amount_with_out_tax;

        return $pendings;
    }



    private function updateScptDiscount($student_id,$billing_cycle_number="",$academic_session_id="",$status="",$concession){
        // $fee = new fee_bill;
        // $received= new fee_bill_received;        
        // // $arriers_adjustment= new arriers_adjustment;
        // $fee_details=$fee->getLastBillByStudentId($student_id,$billing_cycle_number,$academic_session_id,$status);
        // $total_payable=$fee_details['total_payable'];//get last bill total payable amount
        // $pendings=$total_payable-$received->getReceivedAmount($fee_details['id']);
        // if($pendings<=0){
        //     $concession->updateConcession($student_id,$billing_cycle_number,$academic_session_id);
        // }

        
    }



    private function InsertAdjustment($student_id,$amount,$description){
            $arriers_adjustment= new arriers_adjustment;
            // $previous=$arriers_adjustment->getAlladjustements($student_id);
            // $amount=$previous+$amount;
            $arriers_adjustment->student_id=$student_id;
            $arriers_adjustment->adjustment_amount=$amount;
            $arriers_adjustment->description=$description;
            $arriers_adjustment->save();
    }
    private function generateBillNumber($year,$billing_cycle,$gs_id,$bill_type=""){
        $actual_year=explode('-',$year)[1];
        $actual_year=$actual_year-1;
        $gs_id_exp=explode('-',$gs_id);
        $gs_sum_1=array_sum(preg_split("//", $gs_id_exp[0]));
        $gs_sum_2=array_sum(preg_split("//", $gs_id_exp[1]));
        $sum_year=array_sum(preg_split("//", $actual_year));
        $sum_billing_cycle=array_sum(preg_split("//", $billing_cycle));
        $last_id_total=$gs_sum_1+$gs_sum_2+$sum_year+$sum_billing_cycle;
        $bill_last_number=substr($last_id_total, -1)+3; // returns "s"
        if($bill_type==8){
            $last_id_total=$last_id_total-9;
        }elseif ($bill_type==9) {
            $last_id_total=$last_id_total-10;
        }else{
            $last_id_total=$last_id_total;
        }
         $bill_number=strval($actual_year).'-'.strval($billing_cycle).'-'.strval($gs_id_exp[0]).''.strval($gs_id_exp[1]).'-'.$last_id_total;
         return $bill_number;
    }

    private function getBranchCodeByCampus($CampusName){
        if($CampusName=='South Campus'){
            $code=2;
        }elseif ($CampusName=='North Campus') {
            $code=1;
        }
        return $code;
    }





}
