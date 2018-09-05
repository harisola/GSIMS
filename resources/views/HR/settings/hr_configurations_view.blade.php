<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <a href="index.html">Home</a>
         <i class="fa fa-circle"></i>
      </li>
      <li>
         <span>HR Configuaration</span>
      </li>
   </ul>
   <!-- page-breadcrumb -->
</div>




<!-- BEGIN USE PROFILE -->
<div class="row " style="margin: 20px 0 0 0 !important;">
	<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Attendance Setup </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                <a href="javascript:;" class="reload"> </a>
                <a href="javascript:;" class="remove"> </a>
            </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="#" class="horizontal-form">
                <div class="form-body">

                    <div class="alert alert-success" id="success-alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Success! </strong>
                        Data saved.
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">From</label>
                                <div class="input-group">
                                    <select class="form-control" id="day_from">
                                      <option value="15">15</option>
                                      <option value="16">16</option>
                                      <option value="17">17</option>
                                      <option value="18">18</option>
                                      <option value="19">19</option>
                                      <option value="20">20</option>
                                      <option value="21">21</option>
                                      <option value="22">22</option>
                                      <option value="23">23</option>
                                      <option value="24">24</option>
                                      <option value="25">25</option>
                                    </select>
                                    <span class="input-group-addon">
                                        of every month
                                    </span>
                                </div><!-- input-group -->
                                
                                <span class="help-block"> Payroll month start from </span>
                            </div><!-- form-group -->
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">To</label>
                                <div class="input-group">
                                    <select class="form-control" id="day_to">
                                      <option value="15">15</option>
                                      <option value="16">16</option>
                                      <option value="17">17</option>
                                      <option value="18">18</option>
                                      <option value="19">19</option>
                                      <option value="20">20</option>
                                      <option value="21">21</option>
                                      <option value="22">22</option>
                                      <option value="23">23</option>
                                      <option value="24">24</option>
                                      <option value="25">25</option>
                                    </select>
                                    <span class="input-group-addon">
                                        of every month
                                    </span>
                                </div><!-- input-group -->
                                
                                <span class="help-block"> Payroll month ends at</span>
                            </div><!-- form-group -->
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Adjustments</label>
                                <div class="input-group">
                                    <select class="form-control" id="day_buffer">
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                    </select>
                                    <span class="input-group-addon">
                                        days
                                    </span>
                                </div><!-- input-group -->
                                
                                <span class="help-block"> freeze adjustments for Payroll after month ends </span>
                            </div><!-- form-group -->
                        </div>
                        <!--/span-->
                    </div>
                    
                </div>
                <div class="form-actions text-center">
                    <button type="button" class="btn default">Cancel</button>
                    <button type="submit" class="btn blue" id="btnSubmit">
                        <i class="fa fa-check"></i> Save</button>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
</div><!-- row -->







<script type="text/javascript">
$('#day_from').val(<?php echo $pageData[0]->lock_day_start; ?>);
$('#day_to').val(<?php echo $pageData[0]->lock_day_end; ?>);
$('#day_buffer').val(<?php echo $pageData[0]->lock_day_buffer; ?>);

$('#btnSubmit').click(
  function(event){
    event.preventDefault();
    var day_from = $('#day_from').val();
    var day_to = $('#day_to').val();
    var day_buffer = $('#day_buffer').val();

    var token = "{{ csrf_token() }}";

    $.ajax({
      type: "POST",
      url: "{{url('/hr_save_configurations')}}",
      data: {
          _token: token,
          day_from: day_from,
          day_to: day_to,
          day_buffer:day_buffer
      },
      success: function(data)
      {
          //console.log('From: ' + day_from);
          //console.log(data);
          $("#success-alert").show();
          $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
              $("#success-alert").slideUp(500);
          });
      }
  });     
  }
);
</script>