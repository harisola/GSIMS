<?php /***** ***** ***** Formal Interview - JS ***** ***** *****/ ?>


<script type="text/javascript">

loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/jquery.mask.js", function(){
loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/jquery.maskedinput.min.js", function(){ });});

  // $('#career_nic').mask('99999-9999999-9', {
  //       placeholder: 'X'
  //  });
$("#career_nic").inputmask('99999-9999999-9', {
        placeholder: 'X'
   });

$('#career_landline').inputmask('999-99999999', {
    placeholder: 'X'
});

$('#career_mobile').inputmask('0399-9999999', {
    placeholder: 'X'
});


</script>