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
                                                        <td><?= $i++; ?></td>
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