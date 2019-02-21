    <table class="table table-striped table-bordered table-hover order-column dataTable no-footer" id="DetailsIssuanceBillReport">
        <thead>
            <tr>
                <th width="100">S. No.</th>
                <th>GS ID</th>
                <th>GF ID</th>
                <th>Status</th>
                <th>Class</th>
                <th>Name</th>
                <th>Installment No.</th>
                <th>Bill No.</th>
                <th>Tuition Fee</th>
                <th>Resources Fee</th>
                <th>Musakhar Charges</th>
                <th>Yearly Charges</th>
                <th>Smart Card Charges</th>
                <th>Arrears without<br />Late Fee & Rollover Fee</th>
                <th>Late Fee</th>
                <th>Rollover Amount</th>
                <th>Total Fees without<br />Advance Tax</th>
                <th>Advance Tax</th>
                <th>Grand Total with<br />Advance Tax</th>
                <th>Admission Fee</th>
                <th>Security Deposit</th>
                <th>Computer Subscription</th>
                <th>Early/Preffered<br />Admission Offer</th>
                
                <!-- <th> Remitance </th> -->
            </tr>
        </thead>
        <?php $i=1; ?>
        @foreach($issuance_reports as $issuance_report)
               <?php 
                    if($issuance_report->bill_cycle_no<3){
                            $bill_months=2.4;
                    }elseif($issuance_report->bill_cycle_no==3){
                            $bill_months=1;
                    }else{
                            $bill_months=2;
                    }
                ?>
            <tr>
                <td  width="100">{{$i++}}</td>
                <td>{{$issuance_report->student_gs_id}}</td>
                <td>{{$issuance_report->gfid}}</td>
                <td>{{$issuance_report->std_status_code}}</td>
                <td>{{$issuance_report->grade_dname}}</td>
                <td>{{$issuance_report->student_name}}</td>
                <td>{{$issuance_report->bill_title}}</td>
                <td>{{$issuance_report->gb_id_mc_a}}</td>
                <td><?= number_format($issuance_report->tuition_fee *$bill_months)?></td>
         
                <td><?= ($issuance_report->resource_fee)*$bill_months; ?></td>
                <td><?= ($issuance_report->musakhar)*$bill_months; ?></td>

                <td>{{$issuance_report->oc_yearly}}</td>
                <td>{{$issuance_report->oc_smartcard_charges}}</td>
                <td><?= number_format($issuance_report->adjustment)?></td>
                <td></td>
                <td>{{$issuance_report->roll_over_charges}}</td>
                <td><?= $issuance_report->total_payable- $issuance_report->oc_adv_tax?></td>
                <td><?= $issuance_report->oc_adv_tax?></td>
                <td><?= $issuance_report->total_payable ?></td>
                <td><?= $issuance_report->admission_fee ?></td>
                <td><?= $issuance_report->security_deposit ?></td>
                <td><?= $issuance_report->lab_avc ?></td>
                <td></td>
            </tr>
        @endforeach
</tbody>
    </table><!-- sample_4 -->

    <script type="text/javascript">
            var table = $('#DetailsIssuanceBillReport');

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
    
    // "ordering": false,
    dom: 'Bfrtip',
    buttons: [
    'copy', 'csv', 'excel',  'print'
    ],
     "scrollX": true,

    // // set the initial value

    // "pageLength": -1,
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
        
    </script>