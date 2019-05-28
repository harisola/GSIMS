<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <a href="index.html">Home</a>
         <i class="fa fa-circle"></i>
      </li>
      <li>
         <span>HR Adjustment Cycle</span>
      </li>
   </ul>
   <!-- page-breadcrumb -->
</div>


<style type="text/css">
#AdjustmentCycleTable {
  width: 100%;
  vertical-align: middle;
}  
#AdjustmentCycleTable tr td {
  vertical-align: middle;
}
#AdjustmentCycleTable tr td:first-child {
  /* font-size: 18px; */
}
#AdjustmentCycleTable tr td:nth-child(2n) {
  width: 200px;
}
#AdjustmentCycleTable tr td:nth-child(3n) {
  width: 140px;
}
.monthDate select {
    width: 80px !important;
}
.monthDate span {
  width: 100px;
  text-align: left;
}
.freezeDays select {
    width: 60px !important;
}
.freezeDays span {
  width: 50px;
  text-align: left;
}
</style>

<!-- BEGIN USE PROFILE -->
<div class="row " style="margin: 20px 0 0 0 !important;">
	<div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-setting"></i>HR Adjustment Cycle </div>
            <?php /*
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                <a href="javascript:;" class="reload"> </a>
                <a href="javascript:;" class="remove"> </a>
            </div>
            */?>
        </div>
        <div class="portlet-body form fixed-height">
            <form>
              <div class="form-body">
                <table class="table table-striped table-bordered" id="AdjustmentCycleTable">
                  <thead>
                    <tr>
                      <th>for the Month of</th>
                      <th>Cut-off Date</th>
                      <th>Freeze after</th>
                      <th>Adjustment cycle Form - To</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        // foreach ($data as $all_data) {
                      ?>
                      <?php $__currentLoopData = $get_months_hr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $months_hr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <!-- get_months_hr -->
                    <tr>
                      <td >
                        <!-- < ? php echo $all_data->months; ?>  -->
                        <?php echo e($months_hr->hr_month); ?> </td>
                      <td>
                        <div class="input-group monthDate">
                          <!-- <input type="text" id='id' value="<?php //echo $all_data->id; ?>" readonly> -->
                            <select class="form-control monthwise cut_off_date1" id="cut_off_date1" data-id="<?php echo e($months_hr->monthid); ?>">
                             <option <?php if ($months_hr->hr_cut_off == 1 ) echo 'selected' ; ?> value=1>1</option>
                             <option <?php if ($months_hr->hr_cut_off == 2 ) echo 'selected' ; ?> value=2>2</option>
                             <option <?php if ($months_hr->hr_cut_off == 3 ) echo 'selected' ; ?> value=3>3</option>
                             <option <?php if ($months_hr->hr_cut_off == 4 ) echo 'selected' ; ?> value=4>4</option>
                             <option <?php if ($months_hr->hr_cut_off == 5 ) echo 'selected' ; ?> value=5>5</option>
                             <option <?php if ($months_hr->hr_cut_off == 6 ) echo 'selected' ; ?> value=6>6</option>
                             <option <?php if ($months_hr->hr_cut_off == 7 ) echo 'selected' ; ?> value=7>7</option>
                             <option <?php if ($months_hr->hr_cut_off == 8 ) echo 'selected' ; ?> value=8>8</option>
                             <option <?php if ($months_hr->hr_cut_off == 9 ) echo 'selected' ; ?> value=9>9</option>
                             <option <?php if ($months_hr->hr_cut_off == 10 ) echo 'selected' ; ?> value=10>10</option>
                             <option <?php if ($months_hr->hr_cut_off == 11 ) echo 'selected' ; ?> value=11>11</option>
                             <option <?php if ($months_hr->hr_cut_off == 12 ) echo 'selected' ; ?> value=12>12</option>
                             <option <?php if ($months_hr->hr_cut_off == 13 ) echo 'selected' ; ?> value=13>13</option>
                             <option <?php if ($months_hr->hr_cut_off == 14 ) echo 'selected' ; ?> value=14>14</option>
                             <option <?php if ($months_hr->hr_cut_off == 15 ) echo 'selected' ; ?> value=15>15</option>
                             <option <?php if ($months_hr->hr_cut_off == 16 ) echo 'selected' ; ?> value=16>16</option>
                             <option <?php if ($months_hr->hr_cut_off == 17 ) echo 'selected' ; ?> value=17>17</option>
                             <option <?php if ($months_hr->hr_cut_off == 18 ) echo 'selected' ; ?> value=18>18</option>
                             <option <?php if ($months_hr->hr_cut_off == 19 ) echo 'selected' ; ?> value=19>19</option>
                             <option <?php if ($months_hr->hr_cut_off == 20 ) echo 'selected' ; ?> value=20>20</option>
                             <option <?php if ($months_hr->hr_cut_off == 21 ) echo 'selected' ; ?> value=21>21</option>
                             <option <?php if ($months_hr->hr_cut_off == 22 ) echo 'selected' ; ?> value=22>22</option>
                             <option <?php if ($months_hr->hr_cut_off == 23 ) echo 'selected' ; ?> value=23>23</option>
                             <option <?php if ($months_hr->hr_cut_off == 24 ) echo 'selected' ; ?> value=24>24</option>
                             <option <?php if ($months_hr->hr_cut_off == 25 ) echo 'selected' ; ?> value=25>25</option>
                             <option <?php if ($months_hr->hr_cut_off == 26 ) echo 'selected' ; ?> value=26>26</option>
                             <option <?php if ($months_hr->hr_cut_off == 27 ) echo 'selected' ; ?> value=27>27</option>
                             <option <?php if ($months_hr->hr_cut_off == 28 ) echo 'selected' ; ?> value=28>28</option>
                             <option <?php if ($months_hr->hr_cut_off == 29 ) echo 'selected' ; ?> value=29>29</option>
                             <option <?php if ($months_hr->hr_cut_off == 30 ) echo 'selected' ; ?> value=30>30</option>
                             <option <?php if ($months_hr->hr_cut_off == 31 ) echo 'selected' ; ?> value=31>31</option>
                            </select>
                            <span class="input-group-addon">
                                of <?php echo e($months_hr->hr_month); ?>

                            </span>
                        </div><!-- input-group -->
                      </td>
                      <td>
                        <div class="input-group freezeDays">
                          <select class="form-control freeze_after" id="freeze_after" data-id="<?php echo e($months_hr->monthid); ?>">
                            <option <?php if ($months_hr->hr_freeze_day == 2 ) echo 'selected' ; ?> value=2>2</option>
                            <option <?php if ($months_hr->hr_freeze_day == 3 ) echo 'selected' ; ?> value=3>3</option>
                            <option <?php if ($months_hr->hr_freeze_day == 4 ) echo 'selected' ; ?> value=4>4</option>
                            <option <?php if ($months_hr->hr_freeze_day == 5 ) echo 'selected' ; ?> value=5>5</option>
                            <option <?php if ($months_hr->hr_freeze_day == 6 ) echo 'selected' ; ?> value=6>6</option>
                          </select>
                          <span class="input-group-addon">
                            days
                          </span>
                        </div><!-- input-group -->
                      </td>
                      <td>01 Jul - 20 Jul</td>
                    </tr><!-- July -->
                    <?php 
                  // } 
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <!-- June -->
                  </tbody>
                </table><!-- AdjustmentCycleTable -->
              </div><!-- form-body -->
              <div class="form-actions text-center">
                    <button type="button" class="btn default">Cancel</button>
                    <button type="submit" class="btn blue btnSubmit" id="btnSubmit">
                        <i class="fa fa-check"></i> Save</button>
                </div>
            </form>
            <!-- BEGIN FORM-->
            <?php /* code from k.solangi commneted 
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
            */ ?>
            <!-- END FORM-->
        </div>
    </div>
</div><!-- row -->







<script type="text/javascript">


 $(document).on("click",".btnSubmit",function(){


    location.reload();
       });







  $(document).ready(function(){

  })

// by zk
  $(document).on('click','.profile_StaffName',function(){
    var staffID = $(this).attr('data-staffID');
    //console.log(staffID);
    $.ajax({
        type:'GET',
        data: {
                "staff_id":staffID,
                "_token": "<?php echo e(csrf_token()); ?>"
        },
        url:'/gsims/public/ateeb_rec_modal',
        success:function(res){

          $('.modal_body_fetch').html(res);
        }
    })
  })
// by zk
 
$('#cut_off_date').val(<?php //echo $pageData[0]->lock_day_start; ?>);
$('#freeze_after').val(<?php //echo $pageData[0]->lock_day_end; ?>);
//$('#day_buffer').val(<?php //echo $pageData[0]->lock_day_buffer; ?>);

    // $(document).on("click",".monthDate",function(){
      
    // })
       

       /* $(document).on("change","#cut_off_date1",function(){
       
                 
      
           })*/

  $("select.cut_off_date1").change(function(){
    var cut_off_date = $(this).children("option:selected").val();
    var get_id = $(this).attr("data-id");
    var token = "<?php echo e(csrf_token()); ?>";
      
    $.ajax({
      type: "POST",
      url: "<?php echo e(url('/hr_save_month_data')); ?>",
      data: {
          _token: token,
          cut_off_date: cut_off_date,
          get_id:get_id,
      },
      success: function(data)
      {
        $("#success-alert").show();
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
          $("#success-alert").slideUp(500);
        });
      }
    });   
  })


  $("select.freeze_after").change(function(){
    var freeze_after = $(this).children("option:selected").val();
    var get_id = $(this).attr("data-id");
    var token = "<?php echo e(csrf_token()); ?>";
      
    $.ajax({
      type: "POST",
      url: "<?php echo e(url('/hr_save_day_data')); ?>",
      data: {
          _token: token,
          freeze_after: freeze_after,
          get_id:get_id,
      },
      success: function(data)
      {
        $("#success-alert").show();
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
          $("#success-alert").slideUp(500);
        });
      }
    });   
  })





</script>