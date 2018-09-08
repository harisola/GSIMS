<table class="table table-bordered" id="sample_4">
                        		<thead>
                        			<tr>
                        				<th width="100" style="width: 100px !important;">GS-ID</th>
                        				<th>Abridged Name</th>
                                                        <th>Status</th>
                                                        <th>Wing</th>
                                                        <th>Grade</th>
                                                        <th>Section</th>
                                                        <th>GF-ID</th>
                                                        <th>Father Name</th>
                                                        <th>GT-ID</th>
                                                        <th>Father NIC</th>
                                                        <th>GB ID</th>
                                                        <th>Bill Title</th>
                                                        <th>Bill Issue Date</th>
                                                        <th>Bill Due Date</th>
                                                        <th>Bank Validity Date</th>
                                                        <th>Bill Months</th>
                                                        <th>Suspendend Arriers</th>
                                                        <th>South Campus Discount</th>
                                                        <th>Concession Code</th>
                                                        <th>Discount Percent</th>
                                                        <th>Scholarship Code</th>
                                                        <th>Scholarship Percentage</th>
                                                        <th>arrears / (adjustment)</th>
                                                        <th>Roll Over Charges</th>
                                                        <th>gross tuition fee</th>
                                                        <th>additional charges</th>
                                                        <th>total current bill</th>
                                                        <th>oc smart charges</th>
                                                        <th>waive amount</th>
                                                        <th>oc adv tax</th>
                                                        <th>Resource Fee PM</th>
                                                        <th>Musakhar PM</th>
                                                        <th>Yearly</th>
                                                        <th>total payable</th>
                                                        <th>Allow Remitance</th>
                                                        <!-- <th> Remitance </th> -->
                        			</tr>
                        		</thead>
                        		<tbody>
                                                
                                                @foreach($get_lastest_bills as $get_lastest_bill)
                        			<tr>
                                                
                                                        <td>{{$get_lastest_bill->student_gs_id}}</td>
                                                        <td>{{$get_lastest_bill->student_name}}</td>
                                                        <td>{{$get_lastest_bill->std_status_code}}</td>
                                                        <td>{{$get_lastest_bill->wing_name}}</td>
                                                        <td>{{$get_lastest_bill->grade_dname}}</td>
                                                        <td>{{$get_lastest_bill->section_dname}}</td>
                                                        <td>{{$get_lastest_bill->gfid}}</td>
                                                        <td>{{$get_lastest_bill->parent_name}}</td>
                                                        <td>{{$get_lastest_bill->gt_id}}</td>
                                                        <td>{{$get_lastest_bill->nic}}</td>
                                                        <td>{{$get_lastest_bill->gb_id_mc_a}}</td>
                                                        <td>{{$get_lastest_bill->bill_title}}</td>
                                                        <td>{{$get_lastest_bill->bill_issue_date}}</td>
                                                        <td>{{$get_lastest_bill->bill_due_date}}</td>
                                                        <td>{{$get_lastest_bill->bill_bank_valid_date}}</td>
                                                        <td>2.4</td>
                                                        <td><?= number_format($get_lastest_bill->arrears_suspended) ?></td>
                                                        <td><?= number_format($get_lastest_bill->fee_a_discount)?></td>
                                                        <td>{{$get_lastest_bill->concession_code}}</td>
                                                        <td><?php 
                                                            if($get_lastest_bill->concession_percentage!=0){
                                                                echo $get_lastest_bill->concession_percentage.'%';
                                                            }
                                                            ?></td>
                                                        
                                                        <td><?= str_lreplace(","," ", $get_lastest_bill->sc_codes) ?></td>
                                                        <td><?php  
                                                                if($get_lastest_bill->sc_percentage!=0){
                                                                echo $get_lastest_bill->sc_percentage.'%';
                                                                }
                                                            ?>
                                                                
                                                            </td>
                                                       
                                                        <td><?= number_format($get_lastest_bill->adjustment)?></td>
                                                        <td>{{$get_lastest_bill->roll_over_charges}}</td>
                                                        <td><?= number_format($get_lastest_bill->gross_tuition_fee)?></td>
                                                        <td><?= number_format($get_lastest_bill->additional_charges)?></td>
                                                        <td><?= number_format($get_lastest_bill->total_current_bill)?></td>
                                                        <td>{{$get_lastest_bill->oc_smartcard_charges}}</td>
                                                        <td><?= number_format($get_lastest_bill->waive_amount)?></td>
                                                        <td><?= number_format($get_lastest_bill->oc_adv_tax)?></td>
                                                        <td><?= ($get_lastest_bill->resource_fee)*2.4; ?></td>
                                                        <td><?= ($get_lastest_bill->musakhar)*2.4; ?></td>
                                                        <td>{{$get_lastest_bill->oc_yearly}}</td>
                                                        <td><?=number_format($get_lastest_bill->total_payable)?></td>
                                                        <td><?php App\Models\Accounts\remittance::remitanceStatus($get_lastest_bill->student_id) ?></td>


                        			</tr>
                                                @endforeach
                        		</tbody>
                        	</table><!-- sample_4 -->

                                 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                               <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
                               <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
                               

                                <script type="text/javascript">
                                        $('#sample_4').DataTable({
                                                "scrollX": true,
                                                dom: 'Bfrtip',
                                                buttons: [
                                                'copy', 'csv', 'excel',  'print'
                                                ]
                                                });
                                      
                                </script>

                                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                               <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
                               <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
                               <?php 
                               function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}


                               ?>
                                


