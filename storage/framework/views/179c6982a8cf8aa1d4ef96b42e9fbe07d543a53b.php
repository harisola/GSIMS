<table class="table table-striped table-bordered table-hover order-column dataTable no-footer" id="ReceivingBillReport">
       <thead>
            <tr>
                <th width="100" style="width: 50px;text-align: center;">Grade</th>
                <th>Installment No.</th>
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
                
                <!-- <th> Remitance </th> -->
            </tr>
        </thead>
    <tbody>
            <?php $i=1; ?>
    <?php $__currentLoopData = $receiving_report_grade_wise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receiving_report_grade_wises): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <tr>
        <td width="100" style="width: 50px;text-align: center;"><?php echo e($receiving_report_grade_wises->grade_name); ?></td>
        <td><?php echo e($receiving_report_grade_wises->bill_cycle_no); ?></td>
        <?php 
        $amount=$receiving_report_grade_wises->total_received-$receiving_report_grade_wises->total_received_taxes;
         ?>
        <td class="total_received"><?php echo e(number_format($receiving_report_grade_wises->total_received)); ?></td>
        <td class="total_received_taxes"><?php echo e(number_format($receiving_report_grade_wises->total_received_taxes)); ?></td>
         <?php $amount=$amount-$receiving_report_grade_wises->total_payable_rollover;?>
        <td class="total_payable_rollover">
        <?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_payable_rollover))); ?></td>
        <?php $amount=$amount-$receiving_report_grade_wises->total_arrear_adjustment;?>
        <td class="total_arrear_adjustment"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_arrear_adjustment))); ?></td>
         <?php  $amount=$amount-$receiving_report_grade_wises->gross_tution_fee;?>
        
        <td class="gross_tution_fee"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->gross_tution_fee))); ?></td>        
        <?php  $amount=$amount-$receiving_report_grade_wises->total_payable_resource_fee;?>
        <td class="total_payable_resource_fee"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_payable_resource_fee))); ?></td>  
        <?php  $amount=$amount-$receiving_report_grade_wises->musakhar_charges;?>
        <td class="total_payable_yearly_charges"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->musakhar_charges))); ?></td> 
        <?php  $amount=$amount-$receiving_report_grade_wises->total_payable_yearly_charges;?>
        <td class="total_smart_card_charges"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_payable_yearly_charges))); ?></td>
        <?php  $amount=$amount-$receiving_report_grade_wises->total_smart_card_charges;?>
        <td class="total_late_fee"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_smart_card_charges))); ?></td>
                <td><?php echo e(number_format($receiving_report_grade_wises->total_late_fee)); ?></td>

        <td class="total_paybale_without_tax"><?php echo e(number_format($receiving_report_grade_wises->total_paybale_without_tax)); ?></td>
        <td class="total_paybale_with_tax"><?php echo e(number_format($receiving_report_grade_wises->total_paybale_with_tax)); ?></td>
        <td class="admission_fee"><?php echo e(number_format($receiving_report_grade_wises->admission_fee)); ?></td>
        <td class="security_deposit"><?php echo e(number_format($receiving_report_grade_wises->security_deposit)); ?></td>
        <?php  $amount=$amount-$receiving_report_grade_wises->computer_charges;?>
        <td class=""><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->computer_charges))); ?></td>
        <td class=""></td>
      
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php $__currentLoopData = $receiving_sum_report_grade_wise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receiving_report_grade_wises): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td width="100" style="width: 50px;text-align: center;">Total</td>
        <td><?php echo e($receiving_report_grade_wises->bill_cycle_no); ?></td>
        <?php 
        $amount=$receiving_report_grade_wises->total_received-$receiving_report_grade_wises->total_received_taxes;
         ?>
        <td class="total_received"><?php echo e(number_format($receiving_report_grade_wises->total_received)); ?></td>
        <td class="total_received_taxes"><?php echo e(number_format($receiving_report_grade_wises->total_received_taxes)); ?></td>
         <?php $amount=$amount-$receiving_report_grade_wises->total_payable_rollover;?>
        <td class="total_payable_rollover">
        <?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_payable_rollover))); ?></td>
        <?php $amount=$amount-$receiving_report_grade_wises->total_arrear_adjustment;?>
        <td class="total_arrear_adjustment"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_arrear_adjustment))); ?></td>
         <?php  $amount=$amount-$receiving_report_grade_wises->gross_tution_fee;?>
        
        <td class="gross_tution_fee"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->gross_tution_fee))); ?></td>        
        <?php  $amount=$amount-$receiving_report_grade_wises->total_payable_resource_fee;?>
        <td class="total_payable_resource_fee"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_payable_resource_fee))); ?></td>  
        <?php  $amount=$amount-$receiving_report_grade_wises->musakhar_charges;?>
        <td class="total_payable_yearly_charges"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->musakhar_charges))); ?></td> 
        <?php  $amount=$amount-$receiving_report_grade_wises->total_payable_yearly_charges;?>
        <td class="total_smart_card_charges"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_payable_yearly_charges))); ?></td>
        <?php  $amount=$amount-$receiving_report_grade_wises->total_smart_card_charges;?>
        <td class="total_late_fee"><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->total_smart_card_charges))); ?></td>
                <td><?php echo e(number_format($receiving_report_grade_wises->total_late_fee)); ?></td>

        <td class="total_paybale_without_tax"><?php echo e(number_format($receiving_report_grade_wises->total_paybale_without_tax)); ?></td>
        <td class="total_paybale_with_tax"><?php echo e(number_format($receiving_report_grade_wises->total_paybale_with_tax)); ?></td>
        <td class="admission_fee"><?php echo e(number_format($receiving_report_grade_wises->admission_fee)); ?></td>
        <td class="security_deposit"><?php echo e(number_format($receiving_report_grade_wises->security_deposit)); ?></td>
        <?php  $amount=$amount-$receiving_report_grade_wises->computer_charges;?>
        <td class=""><?php echo e(number_format(App\Models\Accounts\fee_bill::getAmountPaidOrNot($amount,$receiving_report_grade_wises->computer_charges))); ?></td>
        <td class=""></td>
      
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <!-- <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="sum_total_received">as</td>
            <td class="sum_total_received_taxes">as</td>
            <td class="sum_total_payable_rollover">as</td>
            <td class="sum_gross_tution_fee">as</td>
            <td class="sum_total_payable_resource_fee">as</td>
            <td class="sum_total_payable_yearly_charges">as</td>
            <td class="sum_total_smart_card_charges">as</td>
            <td class="sum_total_late_fee">as</td>
            <td class="sum_total_paybale_without_tax">as</td>
            <td class="sum_total_paybale_with_tax">as</td>
            <td class="sum_admission_fee">as</td>
            <td class="sum_security_deposit">as</td>
            <td class="">as</td>
            <td class=""></td>
        </tr> -->

    </table><!-- sample_4 -->

    <script type="text/javascript">
                var table = $('#ReceivingBillReport');

// begin: third table
table.dataTable({

        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
    "language": {
        "aria": {
            "sortAscending": ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        },
        "emptyTable": "No data available in table",
        "info": "Showing _START_ to _END_ of _TOTAL_ records",
        "infoEmpty": "No records found",
        "infoFiltered": "(filtered1 from _MAX_ total records)",
        "lengthMenu": "Show _MENU_",
        "search": "Search:",
        "zeroRecords": "No matching records found",
        "paginate": {
            "previous":"Prev",
            "next": "Next",
            "last": "Last",
            "first": "First"
        }
    },

    
    // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
    // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
    // So when dropdowns used the scrollable div should be removed.
    //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

    
    // "lengthMenu": [
    //     [6, 15, 20, -1],
    //     [6, 15, 20, "15"] // change per page values here
    // ],
    
    "ordering": false,
    dom: 'Bfrtip',
    buttons: [
    'copy', 'csv', 'excel',  'print'
    ],
     "scrollX": true,

    // // set the initial value

    "pageLength": -1,
    // "fixedColumns":   {
    //     "leftColumns": 1,
    //     "rightColumns": 1
    // },
    // "columnDefs": [{  // set default column settings
    //     'orderable': false,
    //     'targets': [0]
    // }, {
    //     "searchable": true,
    //     "targets": [0]
    // }],
    // "order": [
    //     [0, "asc"]
    // ] // set first column as a default sort by asc
});

var tableWrapper = jQuery('#DetailsReceivingBillReport_wrapper');

table.find('.group-checkable').change(function () {
    var set = jQuery(this).attr("data-set");
    var checked = jQuery(this).is(":checked");
    jQuery(set).each(function () {
        if (checked) {
            $(this).prop("checked", true);
        } else {
            $(this).prop("checked", false);
        }
    });
});



    </script>