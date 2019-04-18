                            <!-- zk tab_alternate_edit Start -->
                                <div class="tab-pane" id="tab_alternate_edit">
                                   <table width="100%" border="0" class="table table-bordered">
                                      <thead class="bg-grey">
                                         <tr>
                                            <th class="text-center" width="40%">Next of Kin</th>
                                            <th class="text-center" width="20%">&nbsp;</th>
                                            <th class="text-center" width="40%">Emergency Contact</th>
                                         </tr>
                                      </thead>
                                      <tbody id="tab_alternate_contact_edit">
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Next of Kin Name" value="<?php 
                                                if(isset($ac[0]->name)){
                                                    echo $ac[0]->name;
                                                } 
                                                ?>" id="nok_name_first"></td>
                                            <td class="text-center"><strong>Name</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Emergency Contact Name" value="<?php 
                                                if(isset($ac[1]->name)){
                                                    echo $ac[1]->name;
                                                } 
                                                ?>" id="nok_name_second"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Next of Kin Address" value="<?php 
                                                if(isset($ac[0]->address)){
                                                    echo $ac[0]->address;
                                                } 
                                                ?>" id="nok_address_first"></td>
                                            <td class="text-center"><strong>Address</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Emergency Contact Address" value="<?php 
                                                if(isset($ac[1]->address)){
                                                    echo $ac[1]->address;
                                                } 
                                                ?>" id="nok_address_second"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Next of Kin Email" value="<?php 
                                                if(isset($ac[0]->email)){
                                                    echo $ac[0]->email;
                                                } 
                                                ?>" id="nok_email_first"></td>
                                            <td class="text-center"><strong>Email</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Emergency Contact Email" value="<?php 
                                                if(isset($ac[1]->email)){
                                                    echo $ac[1]->email;
                                                } 
                                                ?>" id="nok_email_second"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Next of Kin Mobile" value="<?php 
                                                if(isset($ac[0]->phone)){
                                                    echo $ac[0]->phone;
                                                } 
                                                ?>" id="nok_mobile_first"></td>
                                            <td class="text-center"><strong>Mobile</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Emergency Contact Mobile" value="<?php 
                                                if(isset($ac[1]->phone)){
                                                    echo $ac[1]->phone;
                                                } 
                                                ?>" id="nok_mobile_second"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Next of Kin RealationShip" value="<?php 
                                                if(isset($ac[0]->relationships)){
                                                    echo $ac[0]->relationships;
                                                } 
                                                ?>" id="nok_relationship_first"></td>
                                            <td class="text-center"><strong>Relationship</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Emergency Contact RealationShip" value="<?php 
                                                if(isset($ac[1]->relationships)){
                                                    echo $ac[1]->relationships;
                                                } 
                                                ?>" id="nok_relationship_second"></td>
                                         </tr>
                                      </tbody>
                                   </table>
                                </div>

                      <script type="text/javascript">
                        $(document).ready(function(){
                        $("#nok_mobile_first").inputmask({"mask": "9999-9999999"});
                        $("#nok_mobile_second").inputmask({"mask": "9999-9999999"});
                        });
        /*                $('#tab_parent_edit').validate({ // initialize the plugin
                        rules: {
                          nok_name_first: {
                              text: true
                          }
                          nok_name_second: {
                              text: true
                          }
                          nok_email_first:{
                            email: true
                          }
                          nok_email_second:{
                            email: true
                          }
                          nok_mobile_first:{
                            text: true
                          }
                          nok_mobile_second:{
                            text: true
                          }
                        }
                      });
*/                      </script>