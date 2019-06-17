<div class="requestTapIn textCenter requestAssign ">
    
    <!-- hr /-->
    <div class="imageCenterDefault defaultAssign rf_staff_default">
        <img src="http://10.10.10.50/new_gs/gs/components/gs_theme/images/nfc_updated.png" width="160">
        <h4 type="hidden" name="error" id="error"> </h4>
    </div><!-- imageCenter -->
    <div class="requestTapIn textCenter  rf_staff">
        <div class="Image" >
            <img id="staff_photo" src="" width="410"><br><br>
        </div><!-- imageCenter get_attendance-->
        <div class="staffName">

        </div><!-- staffName -->
    </div>
    <div class="successAssign ">
        <span aria-hidden="true" class="icon-check true" style=""></span><br /><br />
        <select name="location_id" id="location_id">
            <option> Select Location First</option>
            <?php $__currentLoopData = $staff['attendance_location']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($attendance_location->id); ?>"><?php echo e($attendance_location->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </select>

        <h4>Interim Card # <strong class="card_no">148</strong> has been successfully assigned to <br /><br /><strong class="assign_name">Muhammad Haris Ola</strong></h4>
    </div><!-- successAssign -->
    <div class="failAssign ">
        <span aria-hidden="true" class="icon-close false" style=""></span><br /><br />
        <h4>Interim Card # <strong class="as_cardno">148</strong> has already been assigned to <br /><br /><strong class="as_name">Muhammad Faisal</strong></h4>
        <input type="button" class="btn btn-group green" value="Tap a new Interim Card" id="new_interim" name="">
    </div><!-- successAssign -->
    <div class="col-md-12">
        <!-- <form id="interim_form" action="" method=""> -->
            <input type="number" class="form-control" name="interim_dec" id="interim_dec" autofocus value="" autocomplete="off" placeholder="Select & Tap Card" />
            <h4 class="Card_information_not_found"  style="display: none;">Please Select and Tap card Here: </h4>
            <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>" / >
        <!-- </form> -->
    </div><!-- col-md-3 -->
</div>


<script type="text/javascript">
 /***** BEGIN - Document Ready Function *****
 * Author: Zia khan (Thu Feb 26, 2019)
 ****************************************************/
$(document).ready(function(){



});

</script>