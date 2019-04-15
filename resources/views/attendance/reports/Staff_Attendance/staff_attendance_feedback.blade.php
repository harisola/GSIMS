<table class="table table-striped table-bordered table-hover" id="isa_reportTable">
  <thead>
    <tr>
      <th>S. No</th>
      <th>Date</th>
      <th>Day</th>
      <th>Time In</th>
      <th>Time Out</th>
      <th>WH</th>
      <th>Penalty</th>
      <th>Remarks</th>
    </tr>
  </thead>
  <tbody>
    @php $counter=1 @endphp
    @if( !empty( $Staff_Attendance ))
    @foreach( $Staff_Attendance as $st)
    <tr>
      <td> 
        @php 
        echo $counter  
        @endphp 
      </td>
      <td>
        @php
          echo $st->Dated
          @endphp
      </td>
      <td>@php
          echo $st->Day_name
          @endphp</td>
      <td>@php
          echo $st->TapIn
          @endphp</td>
      <td>@php
          echo $st->TapOut
          @endphp</td>
      <td>@php
          echo $st->Total_Working_Hours
          @endphp</td>
      <td>
        @php
          echo $st->DAR_Penality
          @endphp
      </td>
      <td>-</td>
    </tr>
    @php 
    $counter++
    @endphp

    @endforeach
    @endif
   
  </tbody>
</table>










<script type="text/javascript">


var pagefunction = function() {

  Demo.init();

  App.init();


  $(document).on("click", "#btn_staff_attendance", function(){

    var txt_sa_from_date  = $("#txt_sa_from_date").val();
    var txt_sa_till_date  = $("#txt_sa_till_date").val();
    var txt_sa_gt_id      = $("#txt_sa_gt_id").val();


    $.ajax({
      type:"POST",
      cache:true,
      beforeSend:function()
      { 
        App.startPageLoading(); 
      },
      url:"{{url('/reporst_staff_attendance')}}",
      data:{
        Gt_id:txt_sa_gt_id,
        From_date:txt_sa_from_date,
        Till_date:txt_sa_till_date,
        "_token": "{{ csrf_token() }}",
      },
      
      success:function(result)
      { 

      },
      error: function() 
      { 
          // alert("Error occured.please try again");
          // $(placeholder).append(xhr.statusText + xhr.responseText);
          // $(placeholder).removeClass('loading');

      },
      complete: function() { App.stopPageLoading(); },
      });


  });


  $("#isa_reportTable").DataTable();


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