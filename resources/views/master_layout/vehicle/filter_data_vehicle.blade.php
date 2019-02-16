           <script type="text/javascript">

                                    $('#sample_4').DataTable({
                                            "destroy": true,
                                            "scrollX": true,
                                            "ordering": true,
                                            dom: 'Bfrtip',
                                            "pageLength": 20,
                                            //fixedColumns:   {
                                            //    leftColumns: 5,
                                            //},
                                           /* buttons: [
                                                {
                                                    extend: 'excelHtml5',
                                                    title: 'VehicleReport'
                                                }
                                            ]*/
                                           "buttons": [
                                             {
                                            
                                                extend: 'excelHtml5',
                                        
                                                title: 'Vechicle_Report_'+$("#sectionmonth").val()+'-'+$("#sectionyear").val(),
                                                footer: true
                                            },
                                        ],


                                            });
    
                                </script>



         <table class="table table-bordered report_table table-striped" style="margin-bottom: 0;" width="100%"  id="sample_4">
                            <thead>
                              <tr>
                               <th style="text-align: center; width: 50px;">S.NO</th>
                                <th style="text-align: center; width: 100px;">GV ID</th>
                                <th width="100">Van number</th>
                                <th width="100">Name Code</th>
                                <th>Color</th>
                                 @foreach ($qresultsw as $datas)
                                    <th width="100" style="text-align: center;"><small>{{$datas->dated}}</small></th>
                                @endforeach
                              </tr>
                            </thead>

                             <tbody>

                                <?php $i = 1;?>
                                     @foreach ($all_types_data as $vechile)
                                <tr>
                                    <td style="text-align: center;"><?php echo $i;?></td>
                                    <td>{{$vechile->gv_id}}</td>
                                    <td width="100">{{$vechile->van_number}}</td>
                                    <td>{{$vechile->name_code}}</td>
                                    <td>{{$vechile->color_name}}</td>

                                 @foreach ($qresultsw as $datas)
                                    <td style="width:120px; text-align: center;"><?=  @$mydoc=App\Models\Report\VehicleReportModel::get_Vechiles_Time($datas->simple_date,$vechile->v_id)[0]->time; ?></td>
                                 @endforeach
                                </tr>
                                 <?php $i++;?>
                                @endforeach
                           
                            </tbody>
                        <!-- <//?//php //echo $all_types_data->render(); ?> -->
                        </table>




                        
                                        
                               <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                               
                               <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

