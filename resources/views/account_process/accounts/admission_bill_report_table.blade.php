                        	<table class="table table-bordered" id="admission_report">
                        		<thead>
                        			<tr>
        				<th>S No.</th>
			                <th>Form No</th>
                                        <th>GS ID</th>
                                        <th>GF-ID</th>
                                        <th>GT-ID</th>
                                        <th>Applicant Name</th>
                                        <th>Admission Fees</th>
                                        <th>Concession</th>
                                        <th>Re-enforcement</th>
                                        <th>Computer Subscription</th>
                                        <th>Security Deposit</th>
                                        <th>Total Payable</th>
                                        <th>Recieved Amount</th>
                                        <th>Date</th>
                                        <th>Grade of Admission</th>
                                        <th>Early Joining Date</th>
                                        <th>Early Joining Grade</th>
                                        <th>First Tap in on</th>
                        			</tr>
                        		</thead>
                        		<tbody>   
                                                <?php $i=1; ?>
                                        @foreach($admission_report as $admission_bill_report_tables)
                        			<tr>
                        				<td>{{$i++}}</td>
                        				<td>{{$admission_bill_report_tables->form_no}}</td>
                                                        <td>{{$admission_bill_report_tables->gs_id}}</td>
                                                        <td>{{$admission_bill_report_tables->gfid}}</td>
                                                        <td>{{$admission_bill_report_tables->gt_id}}</td>
                                                        <td>{{$admission_bill_report_tables->official_name}}</td>
                                                        <td>{{$admission_bill_report_tables->admission_fee}}</td>
                                                        <td> 
                                                            {{ $admission_bill_report_tables->concession_amount }}

                                                                
                                                        </td>



                                                        <td>{{$admission_bill_report_tables->re_enforcement}}</td>
                                                        <td>{{$admission_bill_report_tables->computer_subcription_fee}}</td>
                                                        <td>{{$admission_bill_report_tables->security_deposit}}</td>
                                                        <td>{{$admission_bill_report_tables->total_payable}}</td>
                                                        <td>{{$admission_bill_report_tables->received_amount}}</td>
                                                        <td>{{$admission_bill_report_tables->received_date}}</td>
                                                        <td>{{$admission_bill_report_tables->applied_grade}}</td>
                                                        <td>{{$admission_bill_report_tables->eao_date}}</td>
                                                        <td>{{$admission_bill_report_tables->grade_name}}</td>
                                                        <td>{{$admission_bill_report_tables->First_Attendance_Tapin}}</td>
                        			</tr>
                                        @endforeach
                        		</tbody>
                        	</table><!-- sample_4 -->

<script type="text/javascript">
        var table = $('#admission_report');

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