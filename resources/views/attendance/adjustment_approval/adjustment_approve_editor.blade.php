<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ url('/') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> Adjustment Approval Created, Edit and Remove </span>
        </li>
    </ul>
     
</div>
<!-- END PAGE BAR -->


<!-- BEGIN USE PROFILE -->
<div class="row">
    
    

       <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">

                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-settings font-red"></i>
                                            <span class="caption-subject font-red sbold uppercase"> Adjustmet Approval List </span>
                                        </div>
                                         
                                    </div>



                                    
                                    <div class="portlet-body">
                                         
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th> Username </th>
                                                    <th> Full Name </th>
                                                    <th> Points </th>
                                                    <th> Notes </th>
                                                    <th> Edit </th>
                                                    <th> Delete </th>
                                                    <th> Create </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> alex </td>
                                                    <td> Alex Nilson </td>
                                                    <td> 1234 </td>
                                                    <td class="center"> power user </td>
                                                    <td>
                                                        <a class="edit" href="javascript:;"> Edit </a>
                                                    </td>
                                                    <td>
                                                        <a class="delete" href="javascript:;"> Delete </a>
                                                    </td>
                                                    <td>
                                                        <a class="Create" href="javascript:;"> Create </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> lisa </td>
                                                    <td> Lisa Wong </td>
                                                    <td> 434 </td>
                                                    <td class="center"> new user </td>
                                                    <td>
                                                        <a class="edit" href="javascript:;"> Edit </a>
                                                    </td>
                                                    <td>
                                                        <a class="delete" href="javascript:;"> Delete </a>
                                                    </td>
                                                     <td>
                                                        <a class="Create" href="javascript:;"> Create </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> nick12 </td>
                                                    <td> Nick Roberts </td>
                                                    <td> 232 </td>
                                                    <td class="center"> power user </td>
                                                    <td>
                                                        <a class="edit" href="javascript:;"> Edit </a>
                                                    </td>
                                                    <td>
                                                        <a class="delete" href="javascript:;"> Delete </a>
                                                    </td>
                                                     <td>
                                                        <a class="Create" href="javascript:;"> Create </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> goldweb </td>
                                                    <td> Sergio Jackson </td>
                                                    <td> 132 </td>
                                                    <td class="center"> elite user </td>
                                                    <td>
                                                        <a class="edit" href="javascript:;"> Edit </a>
                                                    </td>
                                                    <td>
                                                        <a class="delete" href="javascript:;"> Delete </a>
                                                    </td>
                                                     <td>
                                                        <a class="Create" href="javascript:;"> Create </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> alex </td>
                                                    <td> Alex Nilson </td>
                                                    <td> 1234 </td>
                                                    <td class="center"> power user </td>
                                                    <td>
                                                        <a class="edit" href="javascript:;"> Edit </a>
                                                    </td>
                                                    <td>
                                                        <a class="delete" href="javascript:;"> Delete </a>
                                                    </td>
                                                     <td>
                                                        <a class="Create" href="javascript:;"> Create </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> webriver </td>
                                                    <td> Antonio Sanches </td>
                                                    <td> 462 </td>
                                                    <td class="center"> new user </td>
                                                    <td>
                                                        <a class="edit" href="javascript:;"> Edit </a>
                                                    </td>
                                                    <td>
                                                        <a class="delete" href="javascript:;"> Delete </a>
                                                    </td>
                                                     <td>
                                                        <a class="Create" href="javascript:;"> Create </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> gist124 </td>
                                                    <td> Nick Roberts </td>
                                                    <td> 62 </td>
                                                    <td class="center"> new user </td>
                                                    <td>
                                                        <a class="edit" href="javascript:;"> Edit </a>
                                                    </td>
                                                    <td>
                                                        <a class="delete" href="javascript:;"> Delete </a>
                                                    </td>
                                                     <td>
                                                        <a class="Create" href="javascript:;"> Create </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> alex </td>
                                                    <td> Alex Nilson </td>
                                                    <td> 1234 </td>
                                                    <td class="center"> power user </td>
                                                    <td>
                                                        <a class="edit" href="javascript:;"> Edit </a>
                                                    </td>
                                                    <td>
                                                        <a class="delete" href="javascript:;"> Delete </a>
                                                    </td>
                                                     <td>
                                                        <a class="Create" href="javascript:;"> Create </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>




</div>
<!-- END USE PROFILE -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">

loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-editable.min.js", function(){

            loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){ 
                  loadScript("{{ URL::to('metronic') }}/global/plugins/bootbox/bootbox.min.js", function(){ 
                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
                                
                                    loadScript("{{ URL::to('metronic') }}/pages/scripts/datatable-expand.js", function(){
                                            loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", pagefunction);
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


var pagefunction = function() {


    Demo.init();
    App.init();




/*

    App.startPageLoading();
    $.ajax({
    type:"POST",
    cache:true,
    url:"{{url('/calendar_test_II')}}",
    data:{
        Tap_value:Tap_value,
        "_token": "{{ csrf_token() }}",
    },
    success:function(result){ },

    complete: function() { App.stopPageLoading(); }

    });
*/

 
 

}
</script>


