 <table class="table table-striped table-bordered table-hover order-column dataTable no-footer" id="DetailsReceivingBillReport">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>GS ID</th>
                <th>GF ID</th>
                <th>Status</th>
                <th>Class</th>
                <th>Name</th>
                <th>Installment No.</th>
                <th>Bill No.</th>
                <th>Received Amount</th>
                <th>Advance Tax</th>
                <th>Rollover Amount</th>
                <th>Arrears without<br />Late Fee & Rollover Fee</th>
                <th>Tuition Fee</th>
                <th>Resources Fee</th>
                <th>Musakhar Charges</th>
                <th>Yearly Charges</th>
                <th>Smart Card Charges</th>
                <th>Late Fee</th>
                <th>Total Fees without<br />Advance Tax</th>
                <th>Grand Total with<br />Advance Tax</th>
                <th>Admission Fee</th>
                <th>Security Deposit</th>
                <th>Computer Subscription</th>
                <th>Early/Preffered<br />Admission Offer</th>
                <th>Fee Receiving Date</th>
                <th>Mode of Payment<br />(Bank/Payorder/Foreign Remittance)</th>
                <th>Bank Branch</th>
                
                <!-- <th> Remitance </th> -->
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
    @foreach($receiving_report_grade_wise as $receiving_report_grade_wises)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$receiving_report_grade_wises->gs_id}}</td>
        <td>{{$receiving_report_grade_wises->gfid}}</td>
        <td>{{$receiving_report_grade_wises->std_status_code}}</td>
        <td>{{$receiving_report_grade_wises->grade_name}}</td>
        <td>{{$receiving_report_grade_wises->abridged_name}}</td>
        <td>{{$receiving_report_grade_wises->bill_cycle_no}}</td>
        <td>{{$receiving_report_grade_wises->gb_id}}</td>
        <?php 
        $amount=$receiving_report_grade_wises->total_received-$receiving_report_grade_wises->total_received_taxes;
         ?>
        <td>{{$receiving_report_grade_wises->total_received}}</td>
        <td>{{$receiving_report_grade_wises->total_received_taxes}}</td>
         <?php $amount=$amount-$receiving_report_grade_wises->total_payable_rollover;?>
        <td>
        {{App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_payable_rollover)}}</td>
        <?php $amount=$amount-$receiving_report_grade_wises->total_arrear_adjustment;?>
        <td>{{App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_arrear_adjustment)}}</td>
         <?php  $amount=$amount-$receiving_report_grade_wises->gross_tution_fee;?>
        
        <td>{{App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->gross_tution_fee)}}</td>        
        <?php  $amount=$amount-$receiving_report_grade_wises->total_payable_resource_fee;?>
        <td>{{App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_payable_resource_fee)}}</td>  
        <?php  $amount=$amount-$receiving_report_grade_wises->musakhar_charges;?>
        <td>{{App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->musakhar_charges)}}</td> 
        <?php  $amount=$amount-$receiving_report_grade_wises->total_payable_yearly_charges;?>
        <td>{{App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_payable_yearly_charges)}}</td>
        <?php  $amount=$amount-$receiving_report_grade_wises->total_smart_card_charges;?>
        <td>{{App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_smart_card_charges)}}</td>
                <td>{{$receiving_report_grade_wises->total_late_fee}}</td>

        <td>{{$receiving_report_grade_wises->total_paybale_without_tax}}</td>
        <td>{{$receiving_report_grade_wises->total_paybale_with_tax}}</td>
        <td>{{$receiving_report_grade_wises->admission_fee}}</td>
        <td>{{$receiving_report_grade_wises->security_deposit}}</td>
        <?php  $amount=$amount-$receiving_report_grade_wises->computer_charges;?>
        <td>{{App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->computer_charges)}}</td>
        <td>1</td>
        <td>{{$receiving_report_grade_wises->received_date}}</td>
        <td>{{$receiving_report_grade_wises->payment_mode}}</td>
        <td>{{$receiving_report_grade_wises->received_branch}}</td>
      
    </tr>
    @endforeach
        </tbody>
    </table><!-- sample_4 -->