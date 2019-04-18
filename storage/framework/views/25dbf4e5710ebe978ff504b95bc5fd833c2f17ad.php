                              <!-- zk tab_other_edit Start -->
                                <div class="tab-pane" id="tab_other_edit">
                                   <div class="form-body">
                                      <h3 class="form-section marginTop0 headingBorderBottom">Other Details</h3>
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                          <!-- radio button start provident_fund -->
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Provident Fund :</label>
                                               <div class="col-md-9"  style="padding-left: 40px;">
                                                  <div class="radio-list" id="radio_ProvidentFund">
                                                        <label class="radio-inline">
                                                         <!--  <h1><?php echo e($other[0]->pf); ?></h1> -->
                                                            <input type="radio" name="PFund" value="Yes" <?php if($other[0]->pf=="Yes"){ echo "checked";}?> > Yes </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="PFund" value="No" <?php if($other[0]->pf=="No"){ echo "checked";}?> > No </label>
                                                  </div>
                                               </div>
                                            </div>
                                            <!-- radio button end provident_fund -->
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">NTN No:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="ntn_no" value="<?php echo e($other[0]->ntn); ?>">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">EOBI No:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="eobi_no" value="<?php echo e($other[0]->eobi); ?>">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">SESSI No:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="sessi_no" value="<?php echo e($other[0]->sessi); ?>">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <h3 class="form-section headingBorderBottom">Bank Details</h3>
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Bank Name : </label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="bank_name_txt" value="<?php echo e($other[0]->bank_name); ?>">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Branch :</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="bank_branch_name" value="<?php echo e($other[0]->bank_branch); ?>">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Account Number :</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="BBBB-AAAAAAAAAA" id="bank_account_number" value="<?php echo e($other[0]->account_number); ?>">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <h3 class="form-section headingBorderBottom">Takaful</h3>
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Self :</label>
                                               <div class="col-md-9"  style="padding-left: 40px;">
                                                  <div class="radio-list" id="radio_SelfTakaful">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="SelfTakaful" value="Yes" <?php if($other[0]->takaful_self=="Yes"){ echo "checked";}?> > Yes </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="SelfTakaful" value="No" <?php if($other[0]->takaful_self=="No"){ echo "checked";}?> > No </label>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Spouse :</label>
                                               <div class="col-md-9"  style="padding-left: 40px;">
                                                  <div class="radio-list">
                                                        <label class="radio-inline" id="radio_SpouseTakaful">
                                                            <input type="radio" name="SpouseTakaful" value="Yes" <?php if($other[0]->takaful_spouse=="Yes"){ echo "checked";}?> > Yes </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="SpouseTakaful" value="No" <?php if($other[0]->takaful_spouse=="No"){ echo "checked";}?> > No </label>
                                                      </div>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Children :</label>
                                               <div class="col-md-9" style="padding-left: 40px;">
                                                  <div class="radio-list">
                                                        <label class="radio-inline" id-"radio_ChildTakaful">
                                                            <input type="radio" name="ChildTakaful" value="Yes" <?php if($other[0]->takaful_children=="Yes"){ echo "checked";}?> > Yes </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="ChildTakaful" value="No" <?php if($other[0]->takaful_children=="No"){ echo "checked";}?> > No </label>
                                                      </div>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Certificate :</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="c_takaful" value="<?php echo e($other[0]->takaful_crt); ?>">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">If no, please mention the reasons (mandatory) :</label>
                                               <div class="col-md-9">
                                                  <textarea class="form-control" rows="3" id="reason_for_takaful" value=""><?php echo e($other[0]->takaful_reasons); ?></textarea>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                   </div>
                                   <!-- form-body -->
                                </div>
                <script type="text/javascript">
                  $(document).ready(function()
                    {
                      $('#bank_account_number').on('input', function() {
                        $("#bank_account_number").inputmask({"mask": "9999-9999999999"});
                      });
                      
                    });
                </script>