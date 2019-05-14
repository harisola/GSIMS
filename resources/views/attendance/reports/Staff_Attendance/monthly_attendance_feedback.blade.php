  <?php /*var_dump($Staff_Attendance); exit; */ 
    $LoopEnd =0;
      $LoopEnd = sizeof($Staff_Attendance);
    

   ?>
  <table class="table table-striped table-bordered table-hover" id="reportTable2">
                    <thead>
                      <tr>
                        <th>GT ID</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>&nbsp;</th>

                        @if( !empty( $Staff_Attendance[0]))
                          @foreach( $Staff_Attendance[0] as $sa )
                            <th> 
                            <?php
                              echo $sa['gen_date'];
                            ?>
                          </th>
                          @endforeach
                          
                        @endif
                        

                         

                      </tr>
                    </thead>
                    <tbody>

                      @for( $i=0; $i < $LoopEnd; $i++ )

                      <tr>
                        <?php 
                        $Gt_id='';
                        $Status_code='';

                        $Abridged_name='';
                        $Designation='';
                        $Department=''; 

                        if( !empty( $Staff_Attendance[$i] )):
                          foreach( $Staff_Attendance[$i] as $sa ):
                            $Gt_id = $sa['gt_id'];
                            $Status_code=$sa['Status_code'];
                            $Abridged_name=$sa['abridged_name'];
                            $Designation=$sa['designation'];
                            $Department=$sa['department'];

                          endforeach;
                          
                        endif;
                        ?>



                        <td rowspan="5"><?php echo $Gt_id; ?> </td>
                        <td rowspan="5"><?php echo $Status_code;?></td>
                        <td rowspan="5"><?php echo $Abridged_name;?></td>
                        <td rowspan="5"><?php echo $Designation; ?></td>
                        <td rowspan="5"><?php echo $Department;  ?></td>

                        <td>Time In</td>
                        
                         @if( !empty( $Staff_Attendance[$i] ))
                          @foreach( $Staff_Attendance[$i] as $sa )
                           <td> <?php
                              echo $sa['tap_min'];
                            ?></td>
                          @endforeach
                          
                        @endif
                        

                        
                      </tr>
                      <tr>
                        <td>Time Out</td>
                        
                         @if( !empty( $Staff_Attendance[$i] ))
                          @foreach( $Staff_Attendance[$i] as $sa )
                            <td> <?php
                              echo $sa['tap_max'];
                            ?></td>
                          @endforeach
                          
                        @endif
                        
                        
                      </tr>
                      <tr>
                        <td>W Hr</td>
                       
                         @if( !empty( $Staff_Attendance[$i] ))
                          @foreach( $Staff_Attendance[$i] as $sa )
                            <td> <?php
                              echo $sa['w_hrs'];
                            ?></td>
                          @endforeach
                          
                        @endif
                        
                       
                      </tr>
                      <tr>
                        <td>Penalty</td>
                       
                         @if( !empty( $Staff_Attendance[$i] ))
                          @foreach( $Staff_Attendance[$i] as $sa )
                            <td> <?php
                              echo $sa['fuctor_nod'];
                            ?></td>
                          @endforeach
                          
                        @endif
                        
                      
                      </tr>
                      <tr>
                        <td>Remarks</td>
                       
                         @if( !empty( $Staff_Attendance[$i] ))
                          @foreach( $Staff_Attendance[$i] as $sa )
                            <td> <?php
                              echo $sa['Remarks'];
                            ?></td>
                          @endforeach
                          
                        @endif
                        
                       
                      </tr>


                      @endfor

                    </tbody>
                  </table>









<script type="text/javascript">


var pagefunction = function() {

  Demo.init();

  App.init();

 


 

};




loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/datatable.js", function(){
  loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-responsive.min.js", function(){
    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/datatables.min.js", function(){
      loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
        loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/profile.js", function(){
          loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-managed.js", function(){
            loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery.sparkline.min.js", function(){
              loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                loadScript("http://10.10.10.50/gsims/public/metronic/layouts/layout/scripts/demo.min.js", function(){
                  loadScript("http://10.10.10.50/gsims/public/js/jquery.filtertable.min.js", function(){
                    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js",function(){
                     loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/app.min.js", pagefunction)
                   });
                  });
                });
              });
            });
          });
        });
      });
    });
  });
});

</script>
<!-- END PAGE LEVEL PLUGINS -->