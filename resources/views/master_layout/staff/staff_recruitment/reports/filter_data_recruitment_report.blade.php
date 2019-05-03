                           

                  

                            <table class="table table-bordered report_table table-striped" style="margin-bottom: 0;" width="100%"  id="sample_4">
                            <thead>
                              <tr>
                                <th style="text-align: center; background: rgb(47, 53, 59); color: #fff;">Online Form Screening</th>
                                <th style="text-align: center; background: rgb(47, 53, 59); color: #fff;">Call for Part B</th>
                                <th style="text-align: center; background: rgb(47, 53, 59); color: #fff;">Full Form Screening</th>
                                 
                                 <th style="text-align: center; background: rgb(47, 53, 59); color: #fff;">Call for Part B Follow Up</th>     

                                
                              </tr>
                            </thead>

                             <tbody>

                               
                                <tr>

                               
                                    <td style="text-align: center;"><?php echo $all_count_screening[0]->online_screening_dates; ?></td>
                                    <td style="text-align: center;"><?php echo $all_count_call_for_part_b[0]->call_for_part_b_dates; ?></td>
                                    <td style="text-align: center;"><?php echo $all_count_full_screening[0]->full_screening_dates; ?></td>
                                    <td style="text-align: center;"><?php echo $all_count_call_b_follow_up[0]->follow_up_dates; ?></td>

                                  
                                </tr>
                               
                            </tbody>
                            </table>
                        <!-- <//?//php //echo $all_types_data->render(); ?> -->
                        
                                 
                         
                        <script type="text/javascript">

                                    $('#sample_4').DataTable({
                                            "destroy": true,
                                            //"scrollX": true,
                                            //"ordering": true,
                                            dom: 'Bfrtip',
                                            "pageLength": 20,
                                            
                                           "buttons": [
                                             
                                            {
                                                extend: 'excelHtml5',
                                        
                                                title: 'Recruitment_Status_Report '+$("#date_1").val()+'-TO-'+$("#date_2").val(),
                                                footer: true
                                            },
                                        ],


                                            });
    
                                </script>

                                
                               


