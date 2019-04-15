<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ url('/') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> Adjustment Approval   </span>
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
                                            <span class="caption-subject font-red sbold uppercase"> Adjustmet Approve List </span>
                                        </div>
                                         
                                    </div>



                                    
                                    <div class="portlet-body">
                                         
                                        <table class="table table-striped table-hover table-bordered" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th> Title </th>
                                                    <th> Full Name </th>
                                                    
                                                    
                                                    <th> Operation </th>
                                                    

                                                </tr>
                                            </thead>
                                            <!-- 
                                                  'Approval_id' => int 1
      'Approval_Status' => int 1
      'Approval_Type_id' => int 5
      'Staff_id' => int 774
      'Effected_Date' => string '2019-04-05' (length=10)
      'Approval_Title' => string 'Missed Tap Event' (length=16)
      'Photo_id' => int 1103
      'Staff_abridged_name' => string 'Kashif Mustafa' (length=14)
      'Name_code' => string 'KMS' (length=3)
      'Gender' => string 'M' (length=1)
      'Designation' => string 'Software Developer' (length=18)
      'Gt_id' => string '16-009' (length=6)
      'Photo_id_created_by' => int 1085
      'Staff_abridged_name_created_by' => string 'Hassan Ahmed' (length=12)
      'Name_code_created_by' => string 'HAK' (length=3)
      'Gender_created_by' => string 'M' (length=1)
      'Designation_created_by' => string 'HR Officer (HRIS)' (length=17)
      'Gt_id_created_by' => string '15-211' (length=6)
      'photo500' => string 'assets/photos/hcm/500x500/staff/1103.jpg' (length=40)
      'photo150' => string 'assets/photos/hcm/150x150/staff/1103.png' (length=40)
      'createdphoto500' => string 'assets/photos/hcm/500x500/staff/1085.jpg' (length=40)
      'createdphoto150' => string 'assets/photos/hcm/150x150/staff/1085.png' (length=40) 
                                            -->

                                            <tbody>

                                               @if( !empty( $Staffinfo ))

                                                @foreach( $Staffinfo as $sr ) 



                                    <tr data-eattendance_id="@php echo $sr['Eattendance_id'] @endphp" data-editid="@php echo $sr['Edit_id'] @endphp" data-edittype="@php echo $sr['Edit_type'] @endphp"  data-rowid="@php echo $sr['Approval_id'] @endphp" data-type="@php echo $sr['Approval_Title'] @endphp">
                                                    <td> @php echo $sr['Approval_Title'] @endphp </td>
                                                    <td> 
    <div class="adjustment_staff_info_container">
       <img class="user-pic rounded tooltips" data-original-title="@php echo $sr['Gt_id'] @endphp" src="@php echo $sr['photo150'] @endphp"> 
       @php  echo $sr['Staff_abridged_name'] @endphp

       @php  echo $sr['Name_code'] @endphp

       @php  echo $sr['Designation'] @endphp
    </div>

                                                        
                                                        

                                                    </td>
                                                    
                                                    

                                                    <td> @php echo $HtmlUPermission @endphp </td>
                                                     
                                                </tr>

                                                @endforeach

                                                 @endif
                                                
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

                    }); /*End Bootbox*/



                });
            });

                 });
        });
    });
});


var pagefunction = function() {


    Demo.init();
    App.init();






 
var OP_function = function Operations(Operation, Approval_id, Adjustments_Effect=null)
    {
        

        // alert( Approval_id )
        // alert( Operation )


            $.ajax({
                type:"POST",
                cache:true,
                beforeSend:function()
                { 
                    App.startPageLoading(); 
                },
                url:"{{url('/adjustment_approval_Operation')}}",
                data:{
                    Operation:Operation,Approval_id:Approval_id,Adjust_Effect:Adjustments_Effect,
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
            


    }


    var Delete_operation = function delete_approve_request(Approval_id,OType)
    {


            $.ajax({
                type:"POST",
                cache:true,
                beforeSend:function()
                { 
                    App.startPageLoading(); 
                },
                url:"{{url('/delete_approval_Operation')}}",
                data:{
                    Approval_id:Approval_id,OType:OType,
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



    }


 



    $(document).on("click", ".Adjustment_Operation", function(){
        
        
        var $row = $(this).closest("tr");
        var Approval_id = parseInt( $row.data('rowid') );

        var Operation = $(this).data('name')
        var OType = $row.data('type');


        var Edit_id        =  $row.data('editid');
        var Edit_type      =  $row.data('edittype');
        var Eattendance_id =  $row.data('eattendance_id');


        // alert( OType );
        // alert( Operation );


        // alert( Edit_id );
        // alert( Edit_type );
        // alert( Eattendance_id );

        //alert( Approval_id );



       if( OType =='Exceptional Adjustments')
        {


            bootbox.prompt({
                title: "Adjustments Effect?",
                inputType: 'radio',
                inputOptions: [
                 
                {
                    text: 'Effect on Staff Pay Role',
                    value: 1,
                },
                {
                    text: 'Effect on Staff Leave Balance',
                    value: 2,
                },

                ],
                callback: function (result) {
                    
                     
                    if( result !== null ) 
                    {
                        $row.fadeOut(300, function() { $row.remove(); });
                        OP_function(OType, Approval_id, result);    
                    }
                    
                }
            });



        } 
        else if( OType =='Absentia' )
        {

        }
        else if( OType =='Unauthorized Leave Penalties' )
        {

        }
        else if( OType =='Leave Applications' )
        {
 
 

 
        }
        else
        {

          // Missed Tap Event

          
          if( Operation == 'Operation_Edit')
          {
            editAddManual(Edit_id, Eattendance_id, Edit_type);
          }
          else if( Operation == 'Operation_Delete')
          {
            


            bootbox.confirm({
                title: "Approve",
                message: "Yes Approve Request.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result) {
                   

                    if( result==true ) 
                    {
                      $row.fadeOut(300, function() { $row.remove(); });
                      Delete_operation(Approval_id,5);
                      deleteMistapRequest(Edit_id, Eattendance_id, Edit_type);

                    }

               


                }
            });



          }
          else
          {
            
            bootbox.confirm({
                title: "Approve",
                message: "Yes Approve Request.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result) {
                   

                    if( result==true ) 
                    {
                       $row.fadeOut(300, function() { $row.remove(); });
                       OP_function(OType, Approval_id);
                    }

               


                }
            });



          } // end else Operation

          




        }



           







       

        

    });


}
</script>
<!-- Start Edit Absenia_id -->
  @include('attendance.staff.modals.absentia_edit_modal')
<!-- End Edit Absenia_id-->

<!-- Leave Application Edit Functionality Modal-->
                         
@include('attendance.staff.modals.leave_application_edit_modal')
                                
<!-- End Leave Applicaiton Modal -->

<!-- Exceptional Edit Functionality Modal-->
@include('attendance.staff.modals.exceptional_adjustment_edit_modal')

<!-- End Exceptional Modal -->

<!-- Edit Penalties -->
@include('attendance.staff.modals.penalty_edit_modal')
<!-- End Penalties -->
<!-- Edit Manual Attendance -->
@include('attendance.staff.modals.miss_tap_edit_modal')

<!-- End Manual Attendance modal -->
@include('master_layout.footer')
<script src="{{ URL::to('metronic') }}/global/scripts/hr_forms.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/scripts/global_functions.js" type="text/javascript"></script>

