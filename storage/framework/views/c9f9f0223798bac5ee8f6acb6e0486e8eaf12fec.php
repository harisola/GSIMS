 
 <table class="table table-bordered report_table table-striped" style="margin-bottom: 0;" width="100%"  id="sample_4">
                <thead>
                  <tr>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Department</th>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Initial Interview</th>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Formal Interview</th>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Observation</th> 
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Final Consultation</th>   
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Formal Inteview Follow Up</th>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Observation Follow Up</th>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Final Consultation Follow Up</th>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Offer Confirmation Follow Up</th>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Offer</th> 
                     <th style="text-align: center;background-color: #2f353b;color: #fff;"> Offer Confirmation</th>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Archive </th>
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Regret</th> 
                     <th style="text-align: center;background-color: #2f353b;color: #fff;">Not Interested</th>
                  </tr>
                </thead>

                 <tbody>
                      <?php 
                        if(!empty($data))
                          {

                           foreach ($data as  $all_filter_datas) { ?>
                              <tr>
                                  <td><?php echo $all_filter_datas->Department_name; ?></td>
                                  <td><?php echo $all_filter_datas->Initial_Interview; ?></td>
                                  <td><?php echo $all_filter_datas->Formal_Interview; ?></td>
                                  <td><?php echo $all_filter_datas->Observation; ?></td>
                                  <td><?php echo $all_filter_datas->Final_Consultation; ?></td>


                                  <td><?php echo $all_filter_datas->Formal_Inteview_Follow_Up; ?></td>
                                  <td><?php echo $all_filter_datas->Observation_Follow_Up; ?></td>
                                  <td><?php echo $all_filter_datas->Final_Consultation_Follow_Up; ?></td>
                                  <td><?php echo $all_filter_datas->Offer_Confirmation_Follow_Up; ?></td>
                                  

                                  <td><?php echo $all_filter_datas->Offer; ?></td>
                                  <td><?php echo $all_filter_datas->Offer_Confirmation; ?></td>

                                  <td><?php echo $all_filter_datas->Archive; ?></td>
                                  <td><?php echo $all_filter_datas->Regret; ?></td>
                                  <td><?php echo $all_filter_datas->Not_Interested; ?></td>
                               
                           </tr>

                        <?php
                          
                        }
                      }
                       ?>
                     
                </tbody>
 </table>

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
                          title: 'Recruitment_Status_Report_',
                          footer: true
                      },
                  ],

                });

        </script>