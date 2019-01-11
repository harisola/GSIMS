<!-- {{dump($fs)}} -->
<!--  @if(is_null($fs))
        // whatever you need to do here
    @else 
    @endif -->
                            <!-- zk tab_parent_edit Start -->
                                <div class="tab-pane " id="tab_parent_edit">
                                   <table width="100%" border="0" class="table table-bordered">
                                      <thead class="bg-grey">
                                         <tr>
                                            <th class="text-center" width="40%">Father</th>
                                            <th class="text-center" width="20%">&nbsp;</th>
                                            <th class="text-center" width="40%">Spouse</th>
                                         </tr>
                                      </thead>
                                      <tbody id="tab_parent_table_edit">
                                         <tr>
                                            <?php //$fs=@$fs[0];?>
                                            

                                            <td class=""><input type="text" class="form-control" placeholder="Father Name" value="<?php 
                                                if(isset($fs[0]->name)){
                                                    echo $fs[0]->name;
                                                } 
                                                ?>" id="name_father"></td>
                                            <td class="text-center"><strong>Name</strong></td>
                                            <td class=""><input type="text" class="form-control" placeholder="Spouse Name" value="<?php 
                                                if(isset($fs[1]->name)){
                                                    echo $fs[1]->name;
                                                } 
                                                ?>" id="name_spouse" ></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Father Profession" value="<?php 
                                                if(isset($fs[0]->profession)){
                                                    echo $fs[0]->profession;
                                                } 
                                                ?>" id="f_profession"></td>
                                            <td class="text-center"><strong>Profession</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Spouse Profession" value="<?php 
                                                if(isset($fs[1]->profession)){
                                                    echo $fs[1]->profession;
                                                } 
                                                ?>" id="s_profession"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Father Qualification" value="<?php 
                                                if(isset($fs[0]->qualification)){
                                                    echo $fs[0]->qualification;
                                                } 
                                                ?>" id="f_qualification" ></td>
                                            <td class="text-center"><strong>Qualification</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Spouse Qualification" value="<?php 
                                                if(isset($fs[1]->qualification)){
                                                    echo $fs[1]->qualification;
                                                } 
                                                ?>" id="s_qualification"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Father Designation" value="<?php 
                                                if(isset($fs[0]->designation)){
                                                    echo $fs[0]->designation;
                                                } 
                                                ?>"  id="f_designation"></td>
                                            <td class="text-center"><strong>Designation</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Spouse Designation" value="<?php 
                                                if(isset($fs[1]->designation)){
                                                    echo $fs[1]->designation;
                                                } 
                                                ?>" id="s_designation"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Father Department" value="<?php 
                                                if(isset($fs[0]->company)){
                                                    echo $fs[0]->company;
                                                } 
                                                ?>" id="f_department"></td>
                                            <td class="text-center"><strong>Department</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Spouse Department" value="<?php 
                                                if(isset($fs[1]->company)){
                                                    echo $fs[1]->company;
                                                } 
                                                ?>" id="s_department"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Father Organisation" value="<?php 
                                                if(isset($fs[0]->department)){
                                                    echo $fs[0]->department;
                                                } 
                                                ?>" id="f_organisation"></td>
                                            <td class="text-center"><strong>Organisation</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Spouse Organisation" value="<?php 
                                                if(isset($fs[1]->department)){
                                                    echo $fs[1]->department;
                                                } 
                                                ?>" id="s_organisation"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Father CNIC" value="<?php 
                                                if(isset($fs[0]->nic)){
                                                    echo $fs[0]->nic;
                                                } 
                                                ?>" id="f_cnic"></td>
                                            <td class="text-center"><strong>CNIC</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Spouse CNIC" value="<?php 
                                                if(isset($fs[1]->nic)){
                                                    echo $fs[1]->nic;
                                                } 
                                                ?>" id="s_cnic"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Father Mobile" value="<?php 
                                                if(isset($fs[0]->mobile_phone)){
                                                    echo $fs[0]->mobile_phone;
                                                } 
                                                ?>" id="f_mobile"></td>
                                            <td class="text-center"><strong>Mobile</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Spouse Mobile" value="<?php 
                                                if(isset($fs[1]->mobile_phone)){
                                                    echo $fs[1]->mobile_phone;
                                                } 
                                                ?>" id="s_mobile"></td>
                                         </tr>
                                         <tr>
                                            <td><input type="text" class="form-control" placeholder="Father Address" value="<?php 
                                                if(isset($fs[0]->address)){
                                                    echo $fs[0]->address;
                                                } 
                                                ?>" id="f_address"></td>
                                            <td class="text-center"><strong>Address</strong></td>
                                            <td><input type="text" class="form-control" placeholder="Spouse Address" value="<?php 
                                                if(isset($fs[1]->address)){
                                                    echo $fs[1]->address;
                                                } 
                                                ?>" id="s_address"></td>
                                         </tr>
                                      </tbody>
                                   </table>
                                </div>

            <script type="text/javascript">
              $(document).ready(function(){
                $("#f_cnic").inputmask({"mask": "99999-9999999-9"});
                $("#s_cnic").inputmask({"mask": "99999-9999999-9"});
                $("#f_mobile").inputmask({"mask": "9999-9999999"});
                $("#s_mobile").inputmask({"mask": "9999-9999999"});
              });
                // $('#tab_parent_edit').validate({ // initialize the plugin
                //         // rules: {
                //         //   name_father: {
                //         //       text: true
                //         //   }
                //         //   f_cnic: {
                //         //       text: true
                //         //   }
                //         //   f_mobile:{
                //         //     text: true
                //         //   }
                //         // }
                //       });
            </script>