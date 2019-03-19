

								<select placeholder="Department" class="form-control" id="depart_id_5">
                                  <!-- {{@$get_depart[0]->id}} -->
                                  <!-- <option disabled="disabled" selected="">Department</option> -->
                                  <option  value="" disabled>Select Department</option> 
                                        <?php foreach($get_depart as $get_departs){
                                        ?> 
                                         <option value="<?php echo $get_departs['id']; ?>"><?php echo $get_departs['departments']; ?></option> 

                                        <?php
                                       } ?> 
                                        
                                     </select>

                                        <br />
                                     <select placeholder="Levels" class="form-control" id="level_id_5">
                                      <option  value="" disabled>Select Level</option> 
                              <!-- <option disabled="disabled" selected="">Levels</option> -->
                                   <?php foreach($get_level as $get_levels){
                                    ?>
                                      <option value="<?php echo $get_levels['id']; ?>"><?php echo $get_levels['levels']; ?></option>

                                    <?php
                                   } ?>
                                    
                                 </select><br />