                            <thead>
                              <tr>
                                <th width="100" style="width: 100px !important;">S.no</th>
                                <th>Capacity</th>
                                <th>Vehicle Type</th>
                                <th>Vehicle No</th>
                                <th>Area</th>
                                 @foreach ($qresultsw as $datas)
                                    <th><small>{{$datas->dated}}</small></th>
                                @endforeach
                              </tr>
                            </thead>

                             <tbody>

                                <?php $i = 1;?>


                                    @foreach ($all_types_data as $vechile)
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td>N/A</td>
                                    <td>{{$vechile->name}}</td>
                                    <td>{{$vechile->registration_no}}</td>
                                    <td>N/A</td>

                                 @foreach ($qresultsw as $datas)
                                    <td><?=  @$mydoc=App\Models\Report\VehicleReportModel::get_Vechiles_Time($datas->simple_date,$vechile->v_id)[0]->time; ?></td>
                                 @endforeach
                                </tr>
                                 <?php $i++;?>
                                @endforeach
                           
                            </tbody>
                        <!-- <//?//php //echo $all_types_data->render(); ?> -->
                        
                                 
                         
                            <script type="text/javascript">
                                        $('#sample_4').DataTable({
                                                "scrollX": true,
                                                "ordering": false,
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