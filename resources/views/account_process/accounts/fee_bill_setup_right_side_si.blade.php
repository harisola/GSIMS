@for($i = 1 ; $i <= 5 ; $i++)
 @if($billing_defination->count() >= $i)
  @foreach($billing_defination as $installment)
   @if($installment->bill_cycle_no == $i)
	<div class="panel-group accordion" id="accordion3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_{{$i}}"> Installment # {{$i}} </a>
				</h4>
			</div>
			<div id="collapse_3_{{$i}}" class="panel-collapse in">
				<div class="panel-body">
					<form id="form_{{$i}}" method="POST">
						<div class="form-body">
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Adjustments Freeze Date</label>
										<input type="date" id="" name="adj_freeze_date" class="form-control" placeholder="" value="{{$installment->adjustment_freeze_date}}">
										<span class="help-block"> Adjustments for Installment # {{ $i }} will not be accepted after given date </span>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Adjustments Un-Freeze Date</label>
										<input type="date" id="" name="" class="form-control" placeholder="" value="">
										<span class="help-block"> Adjustments for Next Installment will be available after given date </span>
									</div>
								</div>
								<!--/span-->
							</div><!-- row -->
							<div class="row">
								<div class="col-md-6">
								  <input type="hidden" name="academic_session_id" value="{{$academic_session_id}}" />
									<div class="form-group">
										<label class="control-label">Issue Date</label>
										<input type="date"  class="form-control" name="issue_date" value="{{ $installment->issue_date}}">
											<span class="help-block"> Installment # {{ $i }} Bill Issuance Date </span>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Due Date</label>
										<input type="date" id="" name="due_date" class="form-control" placeholder="" value="{{$installment->due_date}}">
											<span class="help-block"> Installment # {{ $i }} Bill Due Date </span>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Validy Date</label>
										<input type="date" id="" name="validy_date" class="form-control" placeholder="" value="{{ $installment->bank_validity_date}}">
										<span class="help-block"> Installment # {{ $i }} Bank Validity Date </span>
									</div>
								</div>
								<!--/span-->
								
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									@if($installment->yearly_charges == 1)
									@php ($checked = 'checked')
									@else
									@php ($checked = '')
									@endif
									<input type="checkbox" id="yearly_charges" name="yearly_charges" {{$checked}} />
	               					<label class="control-label">Yearly Charges Applied</label>		
									</div>
								</div>
							</div>
							<!--/row-->
						</div>
						<!-- form-body -->
						<div class="form-actions text-center">
							<button type="button" class="btn default">Cancel</button>
							<button type="button" class="btn blue" onclick="insertInstallment({{$i}})">
								<i class="fa fa-check"></i> Save
							</button>
						</div>
					</form>
					<!-- form-actions -->
				</div><!-- panel-body -->
			</div>
		</div>
	</div>
	<div id="callout_{{$i}}">
	</div>
    @endif
  @endforeach
   @else
	<div class="panel-group accordion" id="accordion3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_{{$i}}"> Installment # {{$i}} </a>
				</h4>
			</div>
			<div id="collapse_3_{{$i}}" class="panel-collapse display-hide">
				<div class="panel-body">
				 <form id="form_{{$i}}" method="POST">
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Adjustments Freeze Date</label>
									<input type="date" id="" name="adj_freeze_date" class="form-control" placeholder="">
									<span class="help-block"> Adjustments for Installment # {{ $i }} will not be accepted after given date </span>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Adjustments Un-Freeze Date</label>
										<input type="date" id="" name="" class="form-control" placeholder="" value="">
										<span class="help-block"> Adjustments for Next Installment will be available after given date </span>
									</div>
								</div>
								<!--/span-->
						</div><!-- row -->
						<div class="row">
							<div class="col-md-6">
							  <input type="hidden" name="academic_session_id" value="{{$academic_session_id}}" />
								<div class="form-group">
									<label class="control-label">Issue Date</label>
									<input type="date"  class="form-control" name="issue_date">
										<span class="help-block"> Installment # {{ $i }} Bill Issuance Date </span>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Due Date</label>
										<input type="date" id="" name="due_date" class="form-control" placeholder="">
											<span class="help-block"> Installment # {{ $i }} Bill Due Date </span>
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
												<span class="help-block"> Installment # {{ $i }} Bank Validity Date </span>
										</div>
									</div>
										<!--/span-->
									
								</div>
								<!--/row-->
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="checkbox" id="yearly_charges" name="yearly_charges" />
               							<label class="control-label">Yearly Charges Applied</label>		
										</div>
									</div>
								</div>
										<!--/row-->
									</div>
									<!-- form-body -->
									<div class="form-actions text-center">
										<button type="button" class="btn default">Cancel</button>
										<button type="button" class="btn blue" onclick="insertInstallment({{$i}})">
											<i class="fa fa-check"></i> Save
										</button>
									</div>
								</form>
									<!-- form-actions -->
				</div>			<!-- panel-body -->
			</div>
		</div>
	</div>
	<div id="callout_{{$i}}">
	</div>
   @endif
@endfor



<script type="text/javascript">
var insertInstallment = function(installment_id){
 	var selectedForm = $('#form_'+installment_id);
 	var yearly_charges = $("#yearly_charges").is(":checked");
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
    		url:"{{ url('/addInstallment')}}",
    		data:{
    			installment_id:installment_id,
    			academic_session_id:$("input[name=academic_session_id]").val(),
    			issue_date:$("input[name=issue_date]").val(),
	        	due_date:$("input[name=due_date]").val(),
	        	validy_date:$("input[name=validy_date]").val(),
	      		adj_freeze_date: $("input[name=adj_freeze_date]").val(),
	      		yearly_charges:yearly_charges,
	      		"_token": "{{ csrf_token() }}",
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