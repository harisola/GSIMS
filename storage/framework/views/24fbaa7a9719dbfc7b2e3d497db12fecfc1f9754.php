
<?php 

$Academic_id =0;

$Definition_id = 0;
$Session_name        = '';
$Academic_name       = '';
$Academic_dname      = '';
$Academic_Start_date = '';
$Academic_End_date   = '';

?>

<?php if( !empty( $staffRecruiment   ) ) : ?>
    <?php //var_dump($staffRecruiment); ?>
    <?php 
    $Academic_id         = $staffRecruiment[0]->Academic_id;
    $Session_name        = $staffRecruiment[0]->Session_name;
    $Academic_name       = $staffRecruiment[0]->Academic_name;
    $Academic_dname      = $staffRecruiment[0]->Academic_dname;
    $Academic_Start_date = $staffRecruiment[0]->Academic_Start_date;
    $Academic_End_date   = $staffRecruiment[0]->Academic_End_date;
    
    ?>

<?php endif; ?>

<div class="row">
    <div class="col-md-12 paddingRight0">
        <div class="portlet light bordered padding0 marginBottom0">
            
            <div class="portlet-title">
                <div class="caption add_profile_label">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Session - <b><?php echo e($Academic_dname); ?></b></span>
                    <input type="hidden" name="Academic_id" id="Academic_id" value="<?php echo e($Academic_id); ?>" />
                </div>
            </div><!-- portlet-title -->
            <div class="portlet-body padding20">
                <form name="registerSubmit" id="registerSubmit"> 
                     <input type="hidden" name="Academic_id" id="Academic_id" value="<?php echo e($Academic_id); ?>" />
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Session Name</label>
                                <input type="text" id="Session_name" name="Session_name" class="form-control" placeholder=" 2018-2019" value="<?php echo e($Session_name); ?>" />
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Display Name</label>
                                <input type="text" id="Academic_dname" name="Academic_dname" class="form-control" placeholder="2018-19" value="<?php echo e($Academic_dname); ?>" />
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Session Start</label>
                                <input type="date" id="Academic_Start_date" name="Academic_Start_date" class="form-control" placeholder="" value="<?php echo e($Academic_Start_date); ?>" />
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Session End</label>
                                <input type="date" id="Academic_End_date" name="Academic_End_date" class="form-control" placeholder="" value="<?php echo e($Academic_End_date); ?>" />
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                </div><!-- form-body -->
                <div class="form-body">
                    <div class="alert alert-success callout" style="display:none">
                        <strong>Success!</strong> The Profile has been inserted.
                    </div>
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li class="active">
                                <a href="#tab_15_1" data-toggle="tab"> Fee Structure </a>
                            </li>
                            <li>
                                <a href="#tab_15_2" data-id="12" data-toggle="tab" class="Installment_Setup"> Installment Setup </a>
                            </li>
                            <li>
                                <a href="#tab_15_3" data-id="12" data-toggle="tab" class="Installment_Others"> Others </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_15_1">

                                <table class="table table-bordered" id="FeeStructure">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo e($Academic_dname); ?></th>
                                            <th class="text-center">Tution Fee</th>
                                            <th class="text-center">Resorce Fee</th>
                                            <th class="text-center">Musakhar</th>
                                            <!-- Addded ZK -->
                                            <th class="text-center">Difference</th>
                                            <!-- Addded ZK -->
                                            <th class="text-center">LAB/AVC/SPT/LIB</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Yearly Charges</th>

                                            <th class="text-center">Total Yearly Charges</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if( !empty( $staffRecruiment   ) ) : ?>
                                            <?php foreach( $staffRecruiment as $sr ) : ?>

                                                <tr>

                                                    <input type="hidden" name="Grade_id[]" class="Grade_id" value="<?php echo e($sr->Grade_id); ?>" />

                                                    <input type="hidden" name="Definition_id[]" class="Definition_id" value="<?php echo e($sr->Definition_id); ?>" />

                                                    <td class="text-center"><?php echo e($sr->Grade_name); ?></td>

                                                    <input type="hidden" class="shortFields" value="Row_<?php echo e($sr->Definition_id); ?>" />

                                                    <td class="text-center">
                                                    <input type="number" class="shortField" value="<?php echo e($sr->Tuition_fee); ?>" name="Tution_Fee_<?php echo e($sr->Definition_id); ?>" /> 
                                                    </td>

                                                    <td class="text-center"><input type="number" class="shortField" value="<?php echo e($sr->Resource_fee); ?>"  name="Resource_fee_<?php echo e($sr->Definition_id); ?>" /> </td>
                                                    <td class="text-center"><input type="number" class="shortField" value="<?php echo e($sr->Musakhar); ?>" name="Musakhar_<?php echo e($sr->Definition_id); ?>" /> </td>
                                                    <!-- Addded ZK -->
                                                    <td class="text-center"><input type="number" class="shortField" value="<?php echo e($sr->Difference); ?>" name="Difference_<?php echo e($sr->Definition_id); ?>" /> </td>
                                                    <!-- Addded ZK -->
                                                    <td class="text-center"><input type="number" class="shortField" value="<?php echo e($sr->Lab_avc); ?>" name="Lab_avc_<?php echo e($sr->Definition_id); ?>"  /></td>
                                                    <td class="text-center">
                                                        <?php echo e(number_format($sr->Total, 0,'',',' )); ?>

                                                     </td>

                                                    <td class="text-center"><input type="number" class="shortField" value="<?php echo e($sr->Yearly_fee); ?>" name="Yearly_fee_<?php echo e($sr->Definition_id); ?>" /></td>

                                                     <td class="text-center">

                                                         

                                                        <?php echo e(number_format($sr->Total_year_charges, 0,'',',' )); ?>

                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>


                                    </tbody>
                                </table><!-- FeeStructure -->


                                  <div class="form-actions">
                    <div class="alert alert-success callout-updated" style="display:none">
                        <strong>Success!</strong> The Profile has been Updated.
                    </div>
                    <button type="submit" class="profileDefination_editProfileClass btn blue" id="btn_Fee_Structure">Update</button>
                    <button type="button" class="btn default clearbtn">Clear</button>
                   
                </div>


                </form>
                            </div><!-- tab_15_1 -->
                            
                            <div class="tab-pane" id="tab_15_2">

                            </div>

                            <!-- Other Tab -->
                            <div class="tab-pane" id="tab_15_3">

                            </div>
                        </div>
                    </div><!-- tabbable-line -->


                    

                </div><!-- form-body -->
              
            
            </div><!-- portlet-body -->
        </div><!-- portlet -->
    </div><!-- col-md-12 v-->
</div><!-- row -->



