<?php for($i = 1 ; $i <= 12 ; $i++): ?>
 <?php if($billing_defination->count() >= $i): ?>
  <?php $__currentLoopData = $billing_defination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php if($installment->bill_cycle_no == $i): ?>
	<div class="panel-group accordion" id="accordion3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_<?php echo e($i); ?>"> Installment # <?php echo e($i); ?> </a>
				</h4>
			</div>
			<div id="collapse_3_<?php echo e($i); ?>" class="panel-collapse in">
				<div class="panel-body">
					<form id="form_<?php echo e($i); ?>" method="POST">
						<div class="form-body">
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Adjustments Freeze Date</label>
										<input type="date" id="" name="adj_freeze_date" class="form-control" placeholder="" value="<?php echo e($installment->adjustment_freeze_date); ?>">
										<span class="help-block"> Adjustments for Installment # <?php echo e($i); ?> will not be accepted after given date </span>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Adjustments Un-Freeze Date</label>
										<input type="date" id="" name="adj_unfreez_date" class="form-control" placeholder="" value="<?php echo e($installment->adjustment_unfreeze_date); ?>">
										<span class="help-block"> Adjustments for Next Installment # <?php echo e($i); ?> will be available after given date </span>
									</div>
								</div>
								<!--/span-->
							</div><!-- row -->
							<div class="row">
								<div class="col-md-6">
								  <input type="hidden" name="academic_session_id" value="<?php echo e($academic_session_id); ?>" />
									<div class="form-group">
										<label class="control-label">Issue Date</label>
										<input type="date"  class="form-control" name="issue_date" value="<?php echo e($installment->issue_date); ?>">
											<span class="help-block"> Installment # <?php echo e($i); ?> Bill Issuance Date </span>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Due Date</label>
										<input type="date" id="" name="due_date" class="form-control" placeholder="" value="<?php echo e($installment->due_date); ?>">
											<span class="help-block"> Installment # <?php echo e($i); ?> Bill Due Date </span>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Validy Date</label>
										<input type="date" id="" name="validy_date" class="form-control" placeholder="" value="<?php echo e($installment->bank_validity_date); ?>">
										<span class="help-block"> Installment # <?php echo e($i); ?> Bank Validity Date </span>
									</div>
								</div>
								<!--/span-->
								
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<?php if($installment->yearly_charges == 1): ?>
									<?php ($checked = 'checked'); ?>
									<?php else: ?>
									<?php ($checked = ''); ?>
									<?php endif; ?>
									<input type="checkbox" id="yearly_charges_<?php echo e($i); ?>" name="yearly_charges" <?php echo e($checked); ?> />
	               					<label class="control-label">Yearly Charges Applied</label>		
									</div>
								</div>
							</div>
							<!--/row-->
						</div>
						<!-- form-body -->
						<div class="form-actions text-center">
							<button type="button" class="btn default">Cancel</button>
							<button type="button" class="btn blue" onclick="insertInstallment(<?php echo e($i); ?> )">
								<i class="fa fa-check"></i> Save
							</button>
						</div>
					</form>
					<!-- form-actions -->
				</div><!-- panel-body -->
			</div>
		</div>
	</div>
	<div id="callout_<?php echo e($i); ?>">
	</div>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php else: ?>
	<div class="panel-group accordion" id="accordion3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_<?php echo e($i); ?>"> Installment # <?php echo e($i); ?> </a>
				</h4>
			</div>
			<div id="collapse_3_<?php echo e($i); ?>" class="panel-collapse display-hide">
				<div class="panel-body">
				 <form id="form_<?php echo e($i); ?>" method="POST">
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Adjustments Freeze Date</label>
									<input type="date" id="" name="adj_freeze_date" class="form-control" placeholder="">
									<span class="help-block"> Adjustments for Installment # <?php echo e($i); ?> will not be accepted after given date </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Adjustments Un-Freeze Date</label>
										<input type="date" name="adj_unfreez_date" class="form-control">
										<span class="help-block"> Adjustments for Next Installment # <?php echo e($i); ?> will be available after given date </span>
									</div>
								</div>
								<!--/span-->
						</div><!-- row -->
						<div class="row">
							<div class="col-md-6">
							  <input type="hidden" name="academic_session_id" value="<?php echo e($academic_session_id); ?>" />
								<div class="form-group">
									<label class="control-label">Issue Date</label>
									<input type="date"  class="form-control" name="issue_date">
										<span class="help-block"> Installment # <?php echo e($i); ?> Bill Issuance Date </span>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Due Date</label>
										<input type="date" id="" name="due_date" class="form-control" placeholder="">
											<span class="help-block"> Installment # <?php echo e($i); ?> Bill Due Date </span>
										</div>
									</div>
									<!--/span-->
								</div>
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Validy Date</label>
											<input type="date" id="" name="validy_date" class="form-control" placeholder="">
												<span class="help-block"> Installment # <?php echo e($i); ?> Bank Validity Date </span>
										</div>
									</div>
										<!--/span-->
									
								</div>
								<!--/row-->
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="checkbox" id="yearly_charges_<?php echo e($i); ?>" name="yearly_charges" />
               							<label class="control-label">Yearly Charges Applied</label>		
										</div>
									</div>
								</div>
										<!--/row-->
									</div>
									<!-- form-body -->
									<div class="form-actions text-center">
										<button type="button" class="btn default">Cancel</button>
										<button type="button" class="btn blue" onclick="insertInstallment(<?php echo e($i); ?>)">
											<i class="fa fa-check"></i> Save
										</button>
									</div>
								</form>
									<!-- form-actions -->
				</div>			<!-- panel-body -->
			</div>
		</div>
	</div>
	<div id="callout_<?php echo e($i); ?>">
	</div>
   <?php endif; ?>
<?php endfor; ?>



<script type="text/javascript">
var insertInstallment = function(installment_id){
 	var selectedForm = $('#form_'+installment_id);
 	var yearly_charges = $("#yearly_charges_"+installment_id).is(":checked");
 	yearly_charges == true ? yearly_charges = 1: yearly_charges = 0;

 	$(selectedForm).validate({              
        rules: {
            issue_date: {
                required: true
            },
            due_date:{
            	required:true
            },
            validy_date:{
            	required:true
            },
            adj_freeze_date:{
            	required:true
            }
        },
        messages: {
        	issue_date:"Please enter Issue Date",
        	due_date:"Please enter Due Date",
        	validy_date:"Please enter Validy Date",
      		adj_freeze_date: "Please enter adjustment Freeze Date"
  		}
    }).form(); ;

    if(selectedForm.valid()){
    	$.ajax({
    		type:"POST",
    		url:"<?php echo e(url('/addInstallment')); ?>",
    		data:{
    			installment_id:installment_id,
    			academic_session_id:$("#form_"+installment_id+" :input[name=academic_session_id]").val(),
    			issue_date:$("#form_"+installment_id+" :input[name=issue_date]").val(),
	        	due_date:$("#form_"+installment_id+" :input[name=due_date]").val(),
	        	validy_date:$("#form_"+installment_id+" :input[name=validy_date]").val(),
	      		adj_freeze_date: $("#form_"+installment_id+" :input[name=adj_freeze_date]").val(),
	      		adj_unfreez_date : $("#form_"+installment_id+" :input[name=adj_unfreez_date]").val(),
	      		yearly_charges:yearly_charges,
	      		"_token": "<?php echo e(csrf_token()); ?>",
    		},
    		success:function(e){
    			$('#callout_'+installment_id).css('display','');
    			$('#callout_'+installment_id).html(e);
    			$('#callout_'+installment_id).fadeOut(3000);
    		}
    	});
    }
}
</script>