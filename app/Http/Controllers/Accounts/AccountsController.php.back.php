<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounts\fee_bill;
use App\Models\Accounts\class_list;
use App\Models\Accounts\fee_bill_received;
use App\Models\Accounts\fee_definition;
use App\Models\student\Student_Information\academic_session;
use App\Models\Accounts\concessions_for_session;
use App\Models\Accounts\arriers_adjustment;
use App\Models\Accounts\tax_amount;
use App\Models\Accounts\remittance;
use App\Models\Accounts\fee_bill_type_parameter;
use App\Models\Accounts\billing_cycle_definition;
use App\Models\Accounts\fee_bill_received_info;


use Illuminate\Http\RedirectResponse;

use Carbon\Carbon;
use Sentinel;
use Fpdf;
// use FPDI;
use PDF;
use fpdi;
class AccountsController extends Controller
{



    public function getStudentGeneratedBills(request $request){

        $class_list= new class_list;
        $fee_bill= new fee_bill;
        $grade_id = $request->input("Grade_id");
        $billing_cycle=        $request->input('billing_cycle_number');
        $section_name=         $request->input('Snames');
        $gs_id=            $request->input('gs_id');
        $gt_id=            $request->input('gt_id');
        $gf_id=            $request->input('gf_id');
        $array_ids=explode(",",$grade_id);

        $array_section_names=explode(",",$section_name);
        if($array_ids[0]==""){
            $array_ids= implode(" ",$array_ids);

        }
        if($array_section_names[0]==""){
            $array_section_names= implode(" ",$array_section_names);
        }

    

        if($request->get('pdf')==false){
        
            $list=$class_list->getStudentInformationByParamters($array_ids,$array_section_names,$gs_id,$gf_id,$gt_id);
            $array_student_ids="";
            $i=0;
            foreach ($list as $lists) {
                 $array_student_ids.=$lists->gs_id.',';
                 $current_acadmic_session=$lists->academic_session_id;

                 if($lists->gs_id!=="" && $billing_cycle!==""){
                    $this->insertFeeBill($lists->gs_id,$billing_cycle);
                 }
            }
            $array_student_ids=substr_replace($array_student_ids, "", -1);
            @$get_lastest_bills=$fee_bill->feeInformationFilter($current_acadmic_session,$billing_cycle,$array_ids,$array_section_names,$gs_id,$gf_id,$gt_id);
             return view('account_process.accounts.fee_billing_table',['get_lastest_bills'=>$get_lastest_bills]);

        }else{
            $list=$class_list->getStudentInformationByParamters($array_ids,$array_section_names,$gs_id,$gf_id,$gt_id);
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
        // $gs_id=$request->get('gs_id');
        // $bill_cycle_no=$request->get('bill_cycle_no');
        // $academic_session_id=$request->get('academic_session_id');
    	$list=$class_list->getInformationByGsId($gs_id,$bill_cycle_no);
        // var_dump($list['academic_name']);
    	//$branch_code=$this->getBranchCodeByCampus($list['campus']);//South Campus 2 North Campus =1
    	//$year=$session->GetAcademicSession($branch_code)['dname'];
        $year = $list['academic_name'];
        $applicable_taxes=0;
        $total_adjustments=0;
    	//$billing_cycle=$list['bill_no'];
        $billing_cycle = $bill_cycle_no;
        $resource_fee=$list['resource_fee'];
        $musakhar=$list['musakhar'];
        $yearly=$list['yearly'];
        $lab_avc=$list['lab_avc'];
        $std_status_code=$list['std_status_code'];
        if($std_status_code=="S-CPT"){
            $arrears_suspended=$fee_bill->getSuspendedBarriers($list['student_id']);
        }else{
            $arrears_suspended="";
        }

        $additional_charges=0;
        $total_bills_genrated=$fee_bill->countBills($list['student_id'],$list['a_session_id']);
        $south_campus_discount=$concession->southCampusDiscount($list['student_id'],$list['a_session_id'],$billing_cycle);
        $bill_no=$total_bills_genrated+1;
        $fee_concession=$concession->getConcessionInformation($list['student_id'],$list['a_session_id']);

        $installment_dicount_percentage=$this->getCurrentInstallmentPercentage($list['bill_no'],$fee_concession);
        $discount_total_monthly=$this->calculateDiscount(($list['tuition_fee']*2.4),$installment_dicount_percentage);
        $codes=$this->getCodes($fee_concession);
        
        $yearly_charges=$billing_cycle_definition->getYearly($billing_cycle,$list['grade_id'],$list['a_session_id']);
         //get tax percentage for academic year 
        //for foregin remitance
        if(@$total_adjustments==""){
             $total_adjustments=0;
        }

        if($resource_fee>0){
             $gross_tution_fee=(($list['tuition_fee']*2.4)+($resource_fee*2.4));
        }else{
             $gross_tution_fee=$list['tuition_fee']*2.4;
        }
        $musakhar_fee_show=$this->IncudeCharges($list['grade_id'],13,5);
        $resource_fee_show=$this->IncudeCharges($list['grade_id'],14,1);
        $lab_avc_fee_show=$this->IncudeCharges($list['grade_id'],16,15);
        if($musakhar_fee_show==true){
            $additional_charges=($additional_charges+($musakhar*2.4));
        }
        if($lab_avc_fee_show==true){
            $additional_charges=$additional_charges+$lab_avc;
        }
        if($yearly_charges==true){
            $additional_charges=$additional_charges+$yearly;
        }else{
            $yearly=0;
        }


        //add taxes
        
        $bill_number=$this->generateBillNumber($year,$billing_cycle,$gs_id);//get bill number
    	$bill_number_remove_dash=str_replace('-','',$bill_number);
        $bill_found=$fee_bill->checkBillExistance($bill_number_remove_dash);
        $update=fee_bill::find($bill_number_remove_dash);
        // $bill_found=0;
        if($bill_found<1 && $gs_id!=="" && $billing_cycle!==""){

                $tax_allow=$this->StudentApplicableForTaxes($list);

                // echo $total_adjustments=$class_list->arrier_adjustments($gs_id);
                $total_adjustments=$this->calculate_arrier_adjustments($list['student_id']);
                $remitance_adjustments_against_taxes=
                $arriers_adjustment->getAllRemitanceadjustements($list['student_id']);
                 if($total_adjustments>200000){
                    $tax_amount=$this->calculateDiscount($total_adjustments,5);
                    $total_adjustments=$total_adjustments-$tax_amount;
                }
                @$total_adjustments=($remitance_adjustments_against_taxes+$total_adjustments);
                if($tax_allow==0){
                    $applicable_taxes=0;
                }else{
                        $total_current_billing=$gross_tution_fee+$additional_charges+$total_adjustments;
                        $applicable_taxes=$this->calculateTaxes($list,$total_current_billing);
                        die;
                }
            	$fee_bill->fee_bill_type_id=1;//by default 1 for regular bill
            	$fee_bill->gb_id=$bill_number_remove_dash;
            	$fee_bill->academic_session_id= $list['a_session_id'];
            	$fee_bill->bill_cycle_no=$list['bill_no'];
            	$fee_bill->bill_title=$list['title'];;
            	$fee_bill->bill_issue_date=$list['issue_date'];
            	$fee_bill->bill_due_date=$list['due_date'];
            	$fee_bill->bill_bank_valid_date=$list['bank_validity_date'];
            	$fee_bill->bill_months=2.4;
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
            	$fee_bill->adjustment=$total_adjustments;
            	$fee_bill->arrears_suspended=@$arrears_suspended;
            	$fee_bill->gross_tuition_fee=$gross_tution_fee;
            	$fee_bill->additional_charges=$additional_charges;//but for future it will have some value

                if($installment_dicount_percentage==100){
                    $total_current_bill=($gross_tution_fee+$additional_charges+$resource_fee)-@$discount_total_monthly;
                }else{
                    $total_current_bill=($gross_tution_fee+$additional_charges)-@$discount_total_monthly;
                }
                $fee_bill->total_current_bill=$total_current_bill;
            	$fee_bill->oc_smartcard_charges="";//it will be blank when regular bill generate
            	$fee_bill->oc_smartcard_ids="";//it will be blank when regular bill generate
            	$fee_bill->oc_magazine="";//it will be blank when regular bill generate
            	$fee_bill->oc_surcharge="";//it will be blank when regular bill generate
            	$fee_bill->oc_suspended="";//suspended we will calculate in future it is not part of regular bill
            	$fee_bill->oc_adv_tax=$applicable_taxes;
            	$fee_bill->oc_late_fee="";//it wirll be update automatically after bill due date
            	$fee_bill->oc_yearly=$yearly;


            	$fee_bill->waive_amount="";//management will tell later need to create am new table
            	$fee_bill->admission_fee="";//blank for future work
            	$fee_bill->security_deposit="";//blank for future work
            	$fee_bill->bill_payable=$gross_tution_fee;
            	$fee_bill->total_payable=($total_adjustments+$gross_tution_fee+$additional_charges)-$discount_total_monthly;
            	$fee_bill->is_void="";//not required
            	$fee_bill->ip4	="";//not required
            	$fee_bill->filename="";//not required
            	$fee_bill->created= Carbon::now()->timestamp ;
            	$fee_bill->register_by=Sentinel::getUser()->id;
            	$fee_bill->modified=Carbon::now()->timestamp;
            	$fee_bill->modified_by=Sentinel::getUser()->id;
            	$fee_bill->record_deleted=0;
            	$fee_bill->save();
        }else{







        }
        // $gb_id=$fee_bill->getLastBillNumber($list['student_id'],$list['a_session_id'])['gb_id'];
        // $path='accounts/fetch_fee_bill?gb_id='.$gb_id;
        //  return redirect($path);
    	
    }

    public function StudentApplicableForTaxes($list){
            $fee_bill = new fee_bill;
            $class_list = new class_list;
            $session = new academic_session;
            $arriers_adjustment= new arriers_adjustment;
            $tax_amount= new tax_amount;
            $remittance= new remittance;
            $fee_bill_received=new fee_bill_received;
            $taxes=0;
            $total_adjustments=$this->calculate_arrier_adjustments($list['student_id']);
            $remitance_taxes=$arriers_adjustment->getAllRemitanceadjustements($list['student_id']);    
            $admission_fee=$fee_bill->getAdmissionFee($list['student_id']);
            $total_adjustments=$total_adjustments+$remitance_taxes;
            $total_previous_bill_amount=$fee_bill_received->sumTotalPayments($list['student_id'],$list['a_session_id']);
            $admin_set_tax_amount=$tax_amount->getTaxPercentage($list['a_session_id'])['tax_amount'];
            $total_amount=$total_previous_bill_amount+$total_adjustments+$admission_fee;
            if($total_amount>$admin_set_tax_amount){
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

    public function calculateTaxes($list,$total_current_billing){
                $fee_bill = new fee_bill;
                $class_list = new class_list;
                $session = new academic_session;
                $arriers_adjustment= new arriers_adjustment;
                $tax_amount= new tax_amount;
                $remittance= new remittance;
                $fee_bill_received=new fee_bill_received;
                $fee_bill_received_info=new fee_bill_received_info;
                
                $tax_percentage=$tax_amount->getTaxPercentage($list['a_session_id'])['tax_percentage'];
                //last bill taxes
                $bill_id=$fee_bill->getLastBillTaxes($list['student_id'])['id'];
                //subtract tax by previous bill oc_adv_tax

                $received_taxes=$fee_bill_received_info->getReceivedTaxes($list['student_id']);

                $admission_fee=$fee_bill->getAdmissionFee($list['student_id']);

                $applicable_taxes=$this->calculateDiscount(($total_current_billing-$received_taxes)+$admission_fee,$tax_percentage);
                return $applicable_taxes;
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


   public function fetchFeeBill($gs_id){

	   		$fee_bill = new fee_bill;
	    	$class_list = new class_list;
            $session = new academic_session;
            $fee_definition = new fee_definition;
            $concession=new concessions_for_session;
            $fee_bill_type_parameter=new fee_bill_type_parameter;

             // $file =  base_path() . '/vendor/setasign/fpdi/fpdi.php';
            $file =  base_path() . '/vendor/setasign/fpdi/rotation.php';
            include($file);
            $pdf= new FPDI;
            $fpdf= new Fpdf;
            $pdf->setSourceFile(base_path().'/public/pdf/final_fee_bill.pdf');
	    	// $gs_id=$request->get('gs_id');
            $exp_gs_id=explode(",",$gs_id);
            foreach ($exp_gs_id as $gs_id){

                                $feedetails=$class_list->newFeesInformation($gs_id);
                                

                $gs_id=$feedetails['student_gs_id'];
    	    	$branch_code=$this->getBranchCodeByCampus($feedetails['campus']);//South Campus 2 North Campus =1
    	    	$year=$session->GetAcademicSession($branch_code)['dname'];
    	    	$actual_year=explode('-',$year)[1];
    	    	$billing_cycle=$feedetails['bill_cycle_no'];
    	    	$gs_id_exp=explode('-',$gs_id);
    	    	$gs_sum_1=array_sum(preg_split("//", $gs_id_exp[0]));
    	    	$gs_sum_2=array_sum(preg_split("//", $gs_id_exp[1]));
    	    	$sum_year=array_sum(preg_split("//", $actual_year));
    	    	$sum_billing_cycle=array_sum(preg_split("//", $billing_cycle));
    	    	$last_id_total=$gs_sum_1+$gs_sum_2+$sum_year+$sum_billing_cycle;
    	    	$bill_last_number=substr($last_id_total, -1)+3; // returns "s"
    	    	 $bill_number=strval($actual_year).'-'.strval($billing_cycle).'-'.strval($gs_id_exp[0]).''.strval($gs_id_exp[1]).'-'.$last_id_total;
    			
    	 		$bill_number=$this->fetchFeeNumbers($feedetails);
    	    	$SorD=$this->getSonOfOrDaughterOf($feedetails['gender']);
    	    							$fee_bill_for_months =$feedetails['bill_title'];
    	    							$bill_number =$bill_number;
    	    							$student_name =$feedetails['student_name'];
    	    							$s_or_d =$SorD;
    	    							$father_name =$feedetails['parent_name'];
                                        $cnic =$feedetails['nic'];
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
                 $musakhar=$fee['musakhar'];
                 $lab_avc=$fee['lab_avc'];
                 $yearly_charges=$feedetails['total_yearly'];
                 $grade_id=$feedetails['std_grade_id'];
                 $billing_cycle=$feedetails['bill_cycle_no'];
                 $oc_adv_tax=$feedetails['oc_adv_tax'];
                 $fee_bill_type_id=$feedetails['fee_bill_type_id'];

                 $musakhar_fee_annual=0;
                 $musakhar_fee_annual=0;
                 $annual_resource_fee=0;
                 $installment_resource_fee=0;
                 $installment_dicount_percentage=$this->getCurrentInstallmentPercentage($billing_cycle,$fee_concession);
                 $concession_code=$this->getCodes($fee_concession);
                 $total_monthly_fee="";
                 $total_annual_amount="";
                 $total_this_intallment="";
                 $musakhar_fee_show=$this->IncudeCharges($grade_id,13,5);
                 $resource_fee_show=$this->IncudeCharges($grade_id,14,1);
                 $lab_avc_fee_show=$this->IncudeCharges($grade_id,16,15);
                 $parameters=$fee_bill_type_parameter->getBillParameters($fee_bill_type_id);
                  $bill_title=$parameters['title'];
                  $bill_notes=$parameters['notes'];
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
                  $this->createTable($pdf,64,$bill_title.'(with Suspended Arriers)',38,'B',8);
            }else{
                  $this->createTable($pdf,64,$bill_title,38,'B',8);
            }
            $this->setBilldescription($pdf,10,65,$bill_notes);
            if($feedetails['adjustment']!=="0"){
                  $this->rotateText($pdf,185,"",12,'',6);//arrier notes
            }
    //        $pdf->SetFont('Arial','',12);
    // $text=str_repeat('this is a word wrap test ',20);
    // // $nb=$pdf->WordWrap($text,120);
    // // $pdf->Write(5,"This paragraph has $nb lines:\n\n");
    // // $pdf->Write(5,$text);

    //         $pdf->MultiCell( 200, 40,$text, 1);





            $this->setPlaces($pdf,32,$feedetails['bill_title'],12,'B',6);//title
            $this->setPlaces($pdf,30,'bill # '.$bill_number,53,'B',6);//bill number
            $this->setPlaces($pdf,38,$feedetails['student_name'],55,'B',6);
            $this->setPlaces($pdf,41,$SorD.' '.$feedetails['parent_name'],53,'',5);
            $this->setPlaces($pdf,44,$feedetails['student_gs_id'].'                                     '.$grade_details,49,'B',5);
            $this->setPlaces($pdf,57,$feedetails['bill_issue_date'],4,'B',4);
            $this->setPlaces($pdf,57,$feedetails['bill_due_date'],32,'B',4);
            $this->setPlaces($pdf,57,$feedetails['bill_bank_valid_date'],67,'B',4);
            // $this->setPlaces($pdf,30,$bill_number,56);
            // $this->setPlaces($pdf,$bill_number,40,115+40,209);
            // 196 3rd
           // 102 2nd
           // 8 1s

            $this->setPlacesThird($pdf,32,$feedetails['bill_title'],16,'B',6);//title
            $this->setPlacesThird($pdf,30,'bill # '.$bill_number,56,'B',6);//bill number
            $this->setPlacesThird($pdf,38,$feedetails['student_name'],57,'B',6);
            $this->setPlacesThird($pdf,41,$SorD.' '.$feedetails['parent_name'],56,'',5);
            $this->setPlacesThird($pdf,44,$feedetails['student_gs_id'].'                                     '.$grade_details,57,'B',5);
            $this->setPlacesThird($pdf,57,$feedetails['bill_issue_date'],4,'B',4);
            $this->setPlacesThird($pdf,57,$feedetails['bill_due_date'],32,'B',4);
            $this->setPlacesThird($pdf,57,$feedetails['bill_bank_valid_date'],67,'B',4);

            $this->createTable($pdf,60,$feedetails['std_status_code'],34,'B',4);
            $this->createTable($pdf,60,$feedetails['gf_id'],70,'B',4);


            $this->createTable($pdf,49,$cnic,16,'B',5);




            $annual_tuition_fee=$tution_fee*12;
            $installment_tution_fee=$tution_fee*2.4;
            $this->createTable($pdf,96,'Tution Fee',8,'B',5);
            $this->createTable($pdf,96,$tution_fee,38,'',5);
            $this->createTable($pdf,96,$annual_tuition_fee,52,'',5);
            $this->createTable($pdf,96,$installment_tution_fee,67,'B',5);

            if($resource_fee_show==true){
                $annual_resource_fee=$resource_fee*12;
                $installment_resource_fee=$resource_fee*2.4;
                $this->createTable($pdf,100,'Resource Fee',9,'B',5);
                $this->createTable($pdf,100,$resource_fee,38,'',5);
                $this->createTable($pdf,100,$annual_resource_fee,52,'',5);
                $this->createTable($pdf,100,$installment_resource_fee,67,'B',5);
            }else{
                $annual_resource_fee=0;
                $installment_resource_fee=0;
            }
            if($south_campus_discount!=="0"){
                $annual_sounth_discount=$south_campus_discount*12;
                $installment_sounth_discount=$south_campus_discount*2.4;
                $this->createTable($pdf,104,'South Campus Discount',13,'B',5);
                $this->createTable($pdf,104,$south_campus_discount,38,'',5);
                $this->createTable($pdf,104,$annual_sounth_discount,52,'',5);
                $this->createTable($pdf,104,$installment_sounth_discount,67,'B',5);
            }else{
                $annual_sounth_discount=0;
                $installment_sounth_discount=0;

            }
                //gross tution fee calculation
                $total_monthly=(@$tution_fee+@$resource_fee+@$south_campus_discount);
                $total_annual=(@$annual_tuition_fee+@$annual_resource_fee)-$annual_sounth_discount;
                $total_this_intallment=(@$installment_tution_fee+@$installment_resource_fee)-$installment_sounth_discount;

                $this->createTable($pdf,109,$total_monthly,38,'',5);//sum total monthly amoun
                $this->createTable($pdf,109,$total_annual,52,'',5);//sum annual amount
                $this->createTable($pdf,109,$total_this_intallment,67,'',5);//sum this installment
                //end gross tution fee calculation
                //concession row section\
                if(!empty($concession_code)){
                    $concession_text='concession '.$concession_code;
                    $discount_total_monthly=$this->calculateDiscount($total_monthly,$installment_dicount_percentage);
                    $discount_total_annual=$this->calculateDiscount($total_annual,$installment_dicount_percentage);
                    @$discount_total_this_intallment=$this->calculateDiscount($total_this_intallment,$installment_dicount_percentage);

                    $this->createTable($pdf,114,$concession_text,10,'B',5);
                    $this->createTable($pdf,114,$installment_dicount_percentage.'%',26,'',5);//setting discount valuess
                    $this->createTable($pdf,114,@$discount_total_monthly,38,'',5);//calculate monthly amount total discpount
                    $this->createTable($pdf,114,@$discount_total_annual,52,'',5);
                    $this->createTable($pdf,114,@$discount_total_this_intallment,67,'B',5);

                }
               
                if($lab_avc_fee_show==true){
                    $annual_lab_avc_fee=$lab_avc*12;
                    $lab_avc_fee_this_month=$lab_avc*2.4;

                    $this->createTable($pdf,118,'Sports, Labs, Liberaries, Audio-Visual',15,'B',4);
                    $this->createTable($pdf,118,@$lab_avc,38,'',5);
                    $this->createTable($pdf,118,@$annual_lab_avc_fee,52,'',5);
                    $this->createTable($pdf,118,@$lab_avc_fee_this_month,67,'B',5);
                }else{
                      $annual_lab_avc_fee=0;
                      $lab_avc_fee_this_month=0;
                }
                if($musakhar!=0){
                    $musakhar_fee_annual=$musakhar*12;
                    $installment_musakhar_fee=$musakhar*2.4;
                    $this->createTable($pdf,122,'Musakhar Charges',9,'B',4);
                    $this->createTable($pdf,122,@$musakhar,38,'',5);
                    $this->createTable($pdf,122,@$musakhar_fee_annual,52,'',5);
                    $this->createTable($pdf,122,@$installment_musakhar_fee,67,'B',5);
                }else{
                    $musakhar_fee_annual=0;
                    $installment_musakhar_fee=0;    
                    $musakhar=0;
                }

                if($yearly_charges!=0){
                    $this->createTable($pdf,126,'Yearly Charges',7.5,'B',4);
                    $this->createTable($pdf,126,@$yearly_charges,67,'B',5);
                }else{
                    $yearly_charges=0;
                }
                if($installment_dicount_percentage==100){
                        $this->createTable($pdf,128,'Minimum Resource Fee',12,'B',5);
                        $this->createTable($pdf,128,$resource_fee,38,'',5);
                        $this->createTable($pdf,128,$annual_resource_fee,52,'',5);
                        $this->createTable($pdf,128,$installment_resource_fee,67,'B',5);
                        $minimum_resource_fee=$resource_fee;
                        $annual_minimum_resource_fee=$annual_resource_fee;
                        $installment_minimum_resource_fee=$installment_resource_fee;
                 }
                
                //additional charges total
                $total_charges=@$lab_avc_fee_show+@$musakhar+@$minimum_resource_fee;
                $total_charges_annual=@$musakhar_fee_annual+@$annual_lab_avc_fee+@$annual_minimum_resource_fee;
                $total_charges_paid=@$installment_musakhar_fee+@$lab_avc_fee_this_month+@$yearly_charges+@$smart_card_charges+@$installment_minimum_resource_fee;
                $this->createTable($pdf,135,$total_charges,38,'',5);//sum total monthly amoun
                $this->createTable($pdf,135,$total_charges_annual,52,'',5);//sum annual amount
                $this->createTable($pdf,135,$total_charges_paid,67,'',5);//sum this installment
                //end gross tution fee calculatio

            // $this->createTable($pdf,135,$feedetails['additional_charges'],67,'',5);//additional charges
                $total_current_billing=($total_this_intallment+$total_charges_paid)-@$discount_total_this_intallment;
                $this->createTable($pdf,142,$total_current_billing,74,'',5);//total current billing
                $tax_apply_amount=$total_current_billing+$feedetails['adjustment'];
                if($tax_apply_amount>200000){
                    $oc_adv_tax=$this->calculateDiscount($tax_apply_amount=$total_current_billing+$feedetails['adjustment'],5);
                }
                $this->createTable($pdf,148,'Advance Tax to Govt on Parents Behalf( adjustments )',23,'B',5);
                $this->createTable($pdf,148, $oc_adv_tax,67,'B',5);


                $this->createTable($pdf,154,'Arrears / Adjustments',10,'B',5);
                $this->createTable($pdf,154,$feedetails['adjustment'],67,'B',5);
                $this->createTable($pdf,161,$total_current_billing+$feedetails['adjustment']+$feedetails['oc_adv_tax'],67,'B',5);
                if($feedetails['arrears_suspended']){
                    $this->createTable($pdf,177,'SUSPENDED ARREARS (DIFFERNTIAL)',16,'B',5);
                    $this->createTable($pdf,179,'(due to court stay order dated 02-02-2017)',16,'B',4);
                    $this->createTable($pdf,177,$feedetails['arrears_suspended'],55,'B',5);
                    $this->createTable($pdf,181,'Not inclusive of Advance Tax to be edit  wherever applicable',17,'B',3);
                }

                $this->createTable($pdf,185,'in case of issue with deposit at',10,'B',3);
                $this->createTable($pdf,186,'Meezan Bank Ltd. branch please contact at',10,'B',3);
                $this->createTable($pdf,187,'021-36406139',10,'B',3);


                $this->createTable($pdf,185,'D-31 South Avenue ,S.I.T.E Karachi',67,'B',3);
                $this->createTable($pdf,186,'(92-21) 3255 2091-97',67,'B',3);
                $this->createTable($pdf,187,'billing@generations.edu.pk',67,'B',3);

                // $this->createTable($pdf,179,'(due to court stay order dated 02-02-2017)',16,'B',4);
                // $this->createTable($pdf,177,$feedetails['arrears_suspended'],55,'B',5);
                // $this->createTable($pdf,181,'Not inclusive of Advance Tax to be edit  wherever applicable',17,'B',3);                // $this->createTable($pdf,154,$feedetails['adjustment'],67,'B',5);
                // $this->createTable($pdf,161,$total_current_billing+$feedetails['adjustment']+$feedetails['oc_adv_tax'],67,'B',5);

                $i++;
        }

            // $pdf->AutoPrint(true);

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
        foreach ($concession_percentage as $concession_percentages) {
               $concession_percentages->Installment_1+$concession_percentages->Installment_1;
                  $sum+= $concession_percentages->Installment_1;
        }
        return $sum;
    }

    private function getCodes($concession_parameter){
        $codes=0;
        foreach ($concession_parameter as $fee_concessions) {
         $codes.=$fee_concessions->name_code.',';
        }
        return substr_replace($codes, "", -1);
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

        $pdf->SetXY($margin_left + 8, $margin_top);
        $pdf->Cell(10, 0,$value, $bo, 0, 'C', 0);

        $pdf->SetXY($margin_left + 102, $margin_top);
        $pdf->Cell(10, 0,$value, $bo, 0, 'C', 0);

        $pdf->SetXY($margin_left + 197, $margin_top);
        $pdf->Cell(10, 0,$value, $bo, 0, 'C', 0);

     }


    private function createParagraph($pdf,$margin_top,$value,$margin_left,$bold,$fontsize){
        $bo=0;//border of

        $pdf->SetXY($margin_left + 8, $margin_top);
        $pdf->Cell(10, 0,$pdf->WriteHTML($value), $bo, 0, 'C', 0);

        $pdf->SetXY($margin_left + 102, $margin_top);
        $pdf->Cell(10, 0,$pdf->WriteHTML($value), $bo, 0, 'C', 0);

        $pdf->SetXY($margin_left + 197, $margin_top);
        $pdf->Cell(10, 0,$pdf->WriteHTML($value), $bo, 0, 'C', 0);

     }

     private function setBilldescription($pdf,$margin_left,$margin_top,$html){
            $pdf->SetFont('Arial','','6');
            $pdf->SetXY(11,67);
            $pdf->MultiCell(80,3,  $html, 0.3);

            $pdf->SetXY(105,67);
            $pdf->MultiCell(80,3,  $html, 0.3);

            $pdf->SetXY(199,67);
            $pdf->MultiCell(80,3,  $html, 0.3);
     }





   private function rotateText($pdf,$margin_top,$value,$margin_left,$bold,$fontsize){
        $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf->RotatedText($margin_left+84,$margin_top,"* Please note that any arrears mentioned herein are siginficantly overdue and must be settled immediatley. The Due Date does not apply to Current Arrears.",90);

         $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf->RotatedText($margin_left+176,$margin_top,"* Please note that any arrears mentioned herein are siginficantly overdue and must be settled immediatley. The Due Date does not apply to Current Arrears.",90);

         $pdf->SetFont('Arial',$bold, $fontsize);
        $pdf->RotatedText($margin_left+268,$margin_top,"* Please note that any arrears mentioned herein are siginficantly overdue and must be settled immediatley. The Due Date does not apply to Current Arrears.",90);


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

    public function calculate_arrier_adjustments($student_id){
    	$fee = new fee_bill;
        $received= new fee_bill_received;        
    	// $arriers_adjustment= new arriers_adjustment;
        $fee_details=$fee->getLastBillByStudentId($student_id);

        $total_payable=$fee_details['total_payable'];//get last bill total payable amount
        // $tax=$fee_details['oc_adv_tax'];//get total advance taxes
    	$bill_id=$fee_details['id'];//get last bill if
         $total_received=$received->getReceivedAmount($bill_id);//checking last bill in fee received table exists  or not
        // if last bill not exists in fee bill received table
         $total_amount=($total_payable-$total_received);
         return $total_amount;
       
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
    private function generateBillNumber($year,$billing_cycle,$gs_id){
    	$actual_year=explode('-',$year)[1];
    	$gs_id_exp=explode('-',$gs_id);
    	$gs_sum_1=array_sum(preg_split("//", $gs_id_exp[0]));
    	$gs_sum_2=array_sum(preg_split("//", $gs_id_exp[1]));
    	$sum_year=array_sum(preg_split("//", $actual_year));
    	$sum_billing_cycle=array_sum(preg_split("//", $billing_cycle));
    	$last_id_total=$gs_sum_1+$gs_sum_2+$sum_year+$sum_billing_cycle;
    	$bill_last_number=substr($last_id_total, -1)+3; // returns "s"
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

    public function getFeeDescription(request $request){

    }
}
