<table class="table table-striped table-bordered table-hover order-column dataTable no-footer" id="DetailsReceivingBillIssuanceReport">
            <thead>
                <tr>
                    <th style="width: 100px;">S. No.</th>
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
            <tbody>
            <?php $i=0; ?>
                @foreach($issuance_data as $issuance_datas)
                <tr>
                    <td style="width: 100px;"><?= $i++; ?></td>
                    <td>{{$issuance_datas->gs_id}}</td>
                    <td>{{$issuance_datas->gfid}}</td>
                    <td>{{$issuance_datas->std_status_code}}</td>
                    <td>{{$issuance_datas->class_no}}</td>
                    <td>{{$issuance_datas->abridged_name}}</td>
                    <td>{{$issuance_datas->bill_cycle_no}}</td>
                    <td>{{$issuance_datas->gb_id}}</td>
                    <td>{{$issuance_datas->tuition_fee}}</td>
                    <td>{{$issuance_datas->resource_fee}}</td>
                    <td>{{$issuance_datas->musakhar}}</td>
                    <td>{{$issuance_datas->oc_yearly}}</td>
                    <td>{{$issuance_datas->oc_smartcard_charges}}</td>
                    <td>{{$issuance_datas->adjustment}}</td>
                    <td>{{$issuance_datas->roll_over_charges}}</td>
                    <td>{{$issuance_datas->roll_over_charges}}</td>
                    <td>{{$issuance_datas->total_fee_without_tax}}</td>
                    <td>{{$issuance_datas->oc_adv_tax}}</td>
                    <td>{{$issuance_datas->total_payable}}</td>
                    <td>{{$issuance_datas->admission_fee}}</td>
                    <td>{{$issuance_datas->security_deposit}}</td>
                    <td>{{$issuance_datas->lab_avc}}</td>
                    <td></td>
                </tr>
               @endforeach
            </tbody>
        </table><!-- sample_4 -->



                                                <script type="text/javascript">
var table = $('#DetailsReceivingBillIssuanceReport');

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
     "scrollX": true

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




    </script>