        <table class="table table-bordered table-striped order-column" id="IssuanceBillReport">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;" width="200">Grade</th>
                                                        <th>Tuition Fee</th>
                                                        <th>Resources Fee</th>
                                                        <th>SC E. OPT DISC</th>
                                                        <th>Concession</th>
                                                        <th>Scholarship (A-Level)</th>
                                                        <th>Musakhar Charges</th>
                                                        <th>Yearly Charges</th>
                                                        <th>Smart Card Charges</th>
                                                        <th>Arrears without<br />Late Fee & Rollover Fee</th>
                                                        <th>Late Fee</th>
                                                        <th>Rollover Amount</th>
                                                        <th>Adjustments</th>
                                                        <th>Total Fees</th>
                                                        <th>Advance Tax</th>
                                                        <th>Grand Total with<br />Advance Tax</th>
                                                        <!-- <th> Remitance </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($report_data)) : ?>
                                                        <?php foreach ($report_data as $value) : ?> 
                                                        <tr>
                                                        <td><?=$value->Grade_name;?></td>
                                                        <td class="tution_fee"><?=$value->Total_Tuition_Fee_PG;?></td>
                                                        <td class="Total_resourdes_fee"><?=$value->Total_resourdes_fee;?></td>
                                                        <td class="scp_disc"><?=$value->SCEOPTDISC;?></td>
                                                        <td class="Total_Concession_Amount"><?=$value->Total_Concession_Amount;?></td>
                                                        <td class="Total_scholarship_amount"><?=$value->Total_scholarship_amount;?></td>
                                                        <td class="Total_musakhar_charges"><?=$value->Total_musakhar_charges;?></td>
                                                        <td class="Yearly_charges"><?=$value->Yearly_charges;?></td>
                                                        <td class="Total_card_charges"><?=$value->Total_card_charges;?></td>
                                                        <td class="Total_ArrearswithoutLateFeeRolloverFee"><?=$value->ArrearswithoutLateFeeRolloverFee;?></td>
                                                        <td class="Total_late_received"><?=$value->Total_late_received;?></td>
                                                        <td class="Total_rolover_charges"><?=$value->Total_rolover_charges;?></td>
                                                        <td class="Adjustments"><?=$value->Adjustments;?></td>
                                                        <td class="Total_Fees"><?=$value->Total_Fees;?></td>
                                                        <td class="AdvanceTax"><?=$value->AdvanceTax;?></td>
                                                        <td class="GrandTotalwithAdvanceTax"><?=$value->GrandTotalwithAdvanceTax;?></td>
                                                        
                                                        </tr>
                                                        <?php endforeach; ?>  
                                                    <?php endif; ?>    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td style="width: 200px;" width="200"><strong>Total</strong></td>
                                                        <td class="sum_tution_fee_total">-</td>
                                                        <td class="sum_Total_resourdes_fee">-</td>
                                                        <td class="sum_scp_disc">-</td>
                                                        <td class="sum_Total_Concession_Amount">-</td>
                                                        <td class="sum_Total_scholarship_amount">-</td>
                                                        <td class="sum_Total_musakhar_charges">-</td>
                                                        <td class="sum_Yearly_charges">-</td>
                                                        <td class="sum_Total_card_charges">-</td>
                                                        <td class="sum_ArrearswithoutLateFeeRolloverFee">-</td>
                                                        <td class="sum_Total_late_received">-</td>
                                                        <td class="sum_Total_rolover_charges">-</td>
                                                        <td class="sum_Adjustments">-</td>
                                                        <td class="sum_Total_Fees">-</td>
                                                        <td class="sum_AdvanceTax">-</td>
                                                        <td class="sum_GrandTotalwithAdvanceTax">-</td>
                                                        <!-- <th> Remitance </th> -->
                                                    </tr>
                                                </tfoot>
                                            </table><!-- sample_4 -->
    <script type="text/javascript">

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

var table = $('#IssuanceBillReport');
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


 ///sum total of all rows using jquery
rows=$('.tution_fee:visible').length;
var tution_fee_total=0;
var Total_resourdes_fee=0;
var scp_disc=0;
var Total_Concession_Amount=0;
var Total_scholarship_amount=0;
var Total_musakhar_charges=0;
var Yearly_charges=0;
var Total_card_charges=0;
var Total_ArrearswithoutLateFeeRolloverFee=0;
var Total_late_received=0;
var Total_rolover_charges=0;
var Adjustments=0;
var Total_Fees=0;
var AdvanceTax=0;
var GrandTotalwithAdvanceTax=0;
for(let i=0;i<rows;i++){
    tution_fee_total +=parseInt($('.tution_fee:visible').eq(i).text().replace(/,/g, ""));
    Total_resourdes_fee +=parseInt($('.Total_resourdes_fee:visible').eq(i).text().replace(/,/g, ""));
    scp_disc +=parseInt($('.scp_disc:visible').eq(i).text().replace(/,/g, ""));
    Total_Concession_Amount +=parseInt($('.Total_Concession_Amount:visible').eq(i).text().replace(/,/g, ""));
    Total_scholarship_amount +=parseInt($('.Total_scholarship_amount:visible').eq(i).text().replace(/,/g, ""));
    Total_musakhar_charges +=parseInt($('.Total_musakhar_charges:visible').eq(i).text().replace(/,/g, ""));
    Yearly_charges +=parseInt($('.Yearly_charges:visible').eq(i).text().replace(/,/g, ""));
    Total_card_charges +=parseInt($('.Total_card_charges:visible').eq(i).text().replace(/,/g, ""));
    Total_ArrearswithoutLateFeeRolloverFee +=parseInt($('.Total_ArrearswithoutLateFeeRolloverFee:visible').eq(i).text().replace(/,/g, ""));

    Total_late_received +=parseInt($('.Total_late_received:visible').eq(i).text().replace(/,/g, ""));
    Total_rolover_charges +=parseInt($('.Total_rolover_charges:visible').eq(i).text().replace(/,/g, ""));
    Adjustments +=parseInt($('.Adjustments:visible').eq(i).text().replace(/,/g, ""));
    Total_Fees +=parseInt($('.Total_Fees:visible').eq(i).text().replace(/,/g, ""));
    AdvanceTax +=parseInt($('.AdvanceTax:visible').eq(i).text().replace(/,/g, ""));
    GrandTotalwithAdvanceTax +=parseInt($('.GrandTotalwithAdvanceTax:visible').eq(i).text().replace(/,/g, ""));
}

    $('.sum_tution_fee_total').text(addCommas(tution_fee_total));
    $('.sum_Total_resourdes_fee').text(addCommas(Total_resourdes_fee));
    $('.sum_scp_disc').text(addCommas(scp_disc));
    $('.sum_Total_Concession_Amount').text(addCommas(Total_Concession_Amount));
    $('.sum_Total_scholarship_amount').text(addCommas(Total_scholarship_amount));
    $('.sum_Total_musakhar_charges').text(addCommas(Total_musakhar_charges));
    $('.sum_Yearly_charges').text(addCommas(Yearly_charges));
    $('.sum_Total_card_charges').text(addCommas(Total_card_charges));
    $('.sum_ArrearswithoutLateFeeRolloverFee').text(addCommas(Total_ArrearswithoutLateFeeRolloverFee));
    $('.sum_Total_late_received').text(addCommas(Total_late_received));
    $('.sum_Total_rolover_charges').text(addCommas(Total_rolover_charges));
    $('.sum_Adjustments').text(addCommas(Adjustments));
    $('.sum_Total_Fees').text(addCommas(Total_Fees));
    $('.sum_AdvanceTax').text(addCommas(AdvanceTax));
    $('.sum_GrandTotalwithAdvanceTax').text(addCommas(GrandTotalwithAdvanceTax));



    </script>