 

 <?php



 


  $Staff_id = 0;
  $employee_id = 0;
  $gt_id = "";
  $abridged_name = "";
  $name_code = "";
  $department = "";
  $designation = "";
  $photo500    = "";
  $photo150 = "";



  if( !empty( $Staff_Attendance['Staff_data'] )): 

    $Staff_id       = $Staff_Attendance['Staff_data'][0]['Staff_id'];
    $employee_id    = $Staff_Attendance['Staff_data'][0]['employee_id'];
    $gt_id          = $Staff_Attendance['Staff_data'][0]['gt_id'];
    $abridged_name  = $Staff_Attendance['Staff_data'][0]['abridged_name'];
    $name_code      = $Staff_Attendance['Staff_data'][0]['name_code'];
    $department     = $Staff_Attendance['Staff_data'][0]['department'];
    $designation    = $Staff_Attendance['Staff_data'][0]['designation'];

    $photo500    = $Staff_Attendance['Staff_data'][0]['photo500'];
    $photo150    = $Staff_Attendance['Staff_data'][0]['photo150'];

    


  endif; ?>
 <style>
.imagearea {
    width: 80px;
    float: left;
}
.infoArea {
    float:  left;
    padding-top: 8px;
}
</style>
<div class="col-md-12">
  <div class="imagearea">
      <img src="<?php echo $photo500;?>" class="reportUserImage" />
  </div><!-- imagearea -->
  <div class="infoArea">
      <strong><?php echo $abridged_name; ?></strong> - <small><?php echo $name_code; ?></small><br />
      <strong>GT-ID:</strong> <?php echo $gt_id; ?><br />
      <?php echo $designation; ?>, <?php echo $department; ?>
  </div><!-- infoArea-->


  <input type="hidden" id="abridged_name" value="<?php echo $abridged_name; ?>" />
  <input type="hidden" id="gt_id" value="<?php echo $gt_id; ?>" />
  <input type="hidden" id="designation" value="<?php echo $designation; ?>" />
  <input type="hidden" id="department" value="<?php echo $department; ?>" />

</div>
<hr />
  

<table class="table table-striped table-bordered table-hover" id="isa_reportTable">
 
  <thead>
    <tr>
      <th>S. No</th>
      <th>Date</th>
      <!--th>Day</th-->
      <th>Time In</th>
      <th>Time Out</th>
      <th>WH</th>
      <th>Penalty</th>
      <th>Remarks</th>
    </tr>
  </thead>

 

  <tbody>
    <?php  $counter=1  ?>
    <?php if( !empty( $Staff_Attendance['Store_procedure'] )): ?>
    <?php $__currentLoopData = $Staff_Attendance['Store_procedure']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td> 
        <?php  
        echo $counter  
         ?> 
      </td>
      <td>
        <?php 
          echo date( "d D M, Y", strtotime($st->gen_date));
           ?>
      </td>
      
      <td><?php 
          echo $st->tap_min ? date("g:i s A", strtotime($st->tap_min)) : "-";
           ?></td>
      <td><?php 
          echo $st->tap_max ? date("g:i s A", strtotime($st->tap_max)) : "-";

           ?></td>
      <td><?php 
          echo $st->w_hrs ? $st->w_hrs : "-";
           ?></td>
      <td>
        <?php 
          echo $st->fuctor_nod ? $st->fuctor_nod : "-";
           ?>
      </td>
      <td>-</td>
    </tr>
    <?php  
    $counter++
     ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
   
  </tbody>
</table>










<script type="text/javascript">


var pagefunction = function() {

  Demo.init();

  App.init();

 


$('#isa_reportTable').DataTable( {
dom: 'Bfrtip',
fixedHeader: true,
"paging": false,
buttons: [
  { 'extend': 'excel', 
    'title': 'Staff_Attendance',
    customize: function (xlsx) {
        //console.log(xlsx);
        var sheet = xlsx.xl.worksheets['sheet1.xml'];
        var downrows = 5;
        var clRow = $('row', sheet);
        //update Row
        clRow.each(function () {
            var attr = $(this).attr('r');
            var ind = parseInt(attr);
            ind = ind + downrows;
            $(this).attr("r",ind);
        });
 
        // Update  row > c
        $('row c ', sheet).each(function () {
            var attr = $(this).attr('r');
            var pre = attr.substring(0, 1);
            var ind = parseInt(attr.substring(1, attr.length));
            ind = ind + downrows;
            $(this).attr("r", pre + ind);
        });
 
        function Addrow(index,data) {
            msg='<row r="'+index+'">'
            for(i=0;i<data.length;i++){
                var key=data[i].k;
                var value=data[i].v;
                msg += '<c t="inlineStr" r="' + key + index + '" s="42">';
                msg += '<is>';
                msg +=  '<t>'+value+'</t>';
                msg+=  '</is>';
                msg+='</c>';
            }
            msg += '</row>';
            return msg;
        }
 
        //insert$()
        var r1 = Addrow(2, [{ k: 'A', v: $("#abridged_name").val()  }, { k: 'B', v: $("#gt_id").val() }, { k: 'C', v: '' }]);
        var r2 = Addrow(3, [{ k: 'A', v: $("#department").val() }, { k: 'B', v: $("#designation").val() }, { k: 'C', v: ''  }]);
        //var r3 = Addrow(3, [{ k: 'A', v: '' }, { k: 'B', v: '' }, { k: 'C', v: 'ColC' }]);
        
        sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2+ sheet.childNodes[0].childNodes[1].innerHTML;
    },
    "text":'Export To Excel',
    "className": 'dt-button buttons-excel buttons-html5 btn yellow btn-outline'  
  },
]
});
    

};




loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/datatable.js", function(){
  loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-responsive.min.js", function(){
    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/datatables.min.js", function(){
      loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
        loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/profile.js", function(){
          loadScript("http://10.10.10.50/gsims/public/metronic/pages/scripts/table-datatables-managed.js", function(){
            loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery.sparkline.min.js", function(){
              loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                loadScript("http://10.10.10.50/gsims/public/metronic/layouts/layout/scripts/demo.min.js", function(){
                  loadScript("http://10.10.10.50/gsims/public/js/jquery.filtertable.min.js", function(){
                    loadScript("http://10.10.10.50/gsims/public/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js",function(){
                     loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/app.min.js", pagefunction)
                   });
                  });
                });
              });
            });
          });
        });
      });
    });
  });
});

</script>
<!-- END PAGE LEVEL PLUGINS -->