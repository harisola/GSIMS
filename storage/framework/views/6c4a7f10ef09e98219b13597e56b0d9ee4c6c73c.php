<div id="content" style="opacity: 1;"><link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Adjustment Approval</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<style type="text/css">
#sample_4 th {
    background: #ebebeb;
    color: #888;
}
#sample_4 tbody tr td {vertical-align: middle;}

.btn-group>.dropdown-menu, .dropdown-toggle>.dropdown-menu, .dropdown>.dropdown-menu {
    margin-top: 10px;
    left: 0px;
}
.tooltip {z-index: 99999}
.customRow {
  padding: 20px;
  background: #e8bc40;
  margin: -10px 0 0 0;
}
.portlet.light>.portlet-title {
    padding: 10px 20px 0 !important;
}
.contentArea {
	padding:20px;
}
div#PendingAprovalsAdjustments_filter {
	float:right;
}
span.staffImg img {
	width: 60px;
    border: 1px solid #ccc;
}
span.staffImg {
    float: left;
    margin-right: 10px;
}
strong.light {
	color: #909090;
    font-weight: 500;
}
td.MissedTapEvent {
    border-left: 2px solid #01a1ff !important;
}
td.ExceptionalAdjEvent {
	border-left: 2px solid #58af34  !important;
}
</style>
<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-12 fixed-height" id="" style="">
        <div class="row">
            <div class="col-md-12 paddingRight0">
                <div class="portlet light bordered padding0 marginBottom0">
                    <div class="portlet-title tabbable-line">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile">Adjustment Approvals
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#portlet_tab1" data-toggle="tab"> Pending Approvals </a>
                            </li>
                            <li>
                                <a href="#portlet_tab2" data-toggle="tab"> Approved </a>
                            </li>
                            <li >
                                <a href="#portlet_tab3" data-toggle="tab"> Disapproved </a>
                            </li>
                            <li >
                                <a href="#portlet_tab4" data-toggle="tab"> Unattended </a>
                            </li>
                        </ul>
                    </div><!-- portlet-title -->
                    <div class="portlet-body" >
                    	<div class="tab-content">
                            <div class="tab-pane active" id="portlet_tab1">
                            	<div class="row customRow">
                                  <div class="col-md-2">
                                    <label>GT-ID</label>
                                    <input type="text" class="form-control" value="" id="txt_gs_id">
                                  </div>
                                  <div class="col-md-2" id="">
                                    <label>Adjustment Type</label>
                                    <select id="student_status"  class="form-control">
                                        <option value="">Select </option>
                                        <option value="21">S-CFS</option>
                                        <option value="2">S-CPT</option>
                                    </select>
                                  </div>
                                  <div class="col-md-2">
                                    <label>From</label>
                                    <input type="date" class="form-control" id="txt_gt_id">
                                  </div>
                                  <div class="col-md-2">
                                    <label>To</label>
                                    <input type="date" class="form-control" id="txt_gt_id">
                                  </div>
                                  <div class="col-md-2">
                                    <label>Added by</label>
                                    <select id="by"  class="form-control">
                                        <option value="">Select </option>
                                        <option value="21">S-CFS</option>
                                        <option value="2">S-CPT</option>
                                    </select>
                                  </div>
                                  <div class="col-md-2">
                                    <label>&nbsp;</label><br />
                                    <input type="button" id="" data-re_generate="0" class="btn btn-group green Generate_Fee_Bill_1" value="Filter Results" style="width: 100%;">
                                  </div>
                                </div><!-- row -->
                                <div class="contentArea">
                                	<table class="table table-striped table-bordered table-hover" id="PendingAprovalsAdjustments">
                                            <thead>
                                                <tr>
                                                    <th width="10" style="text-align:center;">S No.</th>
                                                    <th> Person info </th>
                                                    <th> Approval For </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd gradeX">
                                                    <td style="text-align:center;vertical-align:middle;">1</td>
                                                    <td style="vertical-align:middle;">
                                                    	<span class="staffImg"><img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="18-052" src="assets/photos/hcm/150x150/staff/1159.png"></span>
                                                    	<strong>Muhammad Haris Ola - <small>HOL</small></strong><br />
                                                        <span><strong>GT ID:</strong>16-070</span><br />
                                                        <small><span class="tooltips" data-container="body" data-placement="top" data-original-title="Faculty  Member, Middle Section">Middle Section: Faculty  Member</span></small>
                                                    </td>
                                                    <td class="MissedTapEvent">
                                                        <span class="adjType"><strong class="light">Adjustment Type: </strong>Missed Tap</span><br />
                                                        <span class="MissedTap">
                                                        	<span><strong class="light">Attendance Date:</strong> Thu, Apr 11 2019 </span><br />
                                                            <span><strong class="light">Missed Tap Time: </strong>11:30 PM</span><br />
                                                            <span><strong class="light">Entry by: </strong><span class="tooltips" data-container="body" data-placement="top" data-original-title="Hassan Ahmed Khan">HAK</span></span><br />
                                                            <span><strong class="light">Added on: </strong>Fri Apr 26 2019, at 10:01:25 AM</span><br />
                                                            <span><strong class="light">Additional Comments: </strong>Lorem Ipsum dolor sit amet</span>
                                                        </span><!-- MissedTap -->
                                                    </td>
                                                    <td style="vertical-align:middle;">
                                                        <!-- <span class="label label-sm label-success"> Approved </span> -->
                                                        <a href="#">Approve</a> | <a href="#">Disapprove</a>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td style="text-align:center;vertical-align:middle;">2</td>
                                                    <td style="vertical-align:middle;">
                                                    	<span class="staffImg"><img class="user-pic rounded tooltips" data-container="body" data-placement="top" data-original-title="18-052" src="assets/photos/hcm/150x150/staff/1159.png"></span>
                                                    	<strong>Muhammad Haris Ola - <small>HOL</small></strong><br />
                                                        <span><strong>GT ID:</strong>16-070</span><br />
                                                        <small><span class="tooltips" data-container="body" data-placement="top" data-original-title="Faculty  Member, Middle Section">Middle Section: Faculty  Member</span></small>
                                                    </td>
                                                    <td class="ExceptionalAdjEvent">
                                                        <span class="adjType"><strong class="light">Adjustment Type: </strong>Exceptional Adjustment</span><br />
                                                        <span class="MissedTap">
                                                        	<span><strong class="light">Title:</strong> 2 days Exceptional Adjustment</span><br />
                                                        	<span><strong class="light">No of days:</strong> 2 days</span><br />
                                                            <span><strong class="light">Entry by: </strong><span class="tooltips" data-container="body" data-placement="top" data-original-title="Hassan Ahmed Khan">HAK</span></span><br />
                                                            <span><strong class="light">Added on: </strong>Fri Apr 26 2019, at 10:01:25 AM</span><br />
                                                            
                                                            <span><strong class="light">Additional Comments: </strong>Lorem Ipsum dolor sit amet</span>
                                                        </span><!-- MissedTap -->
                                                    </td>
                                                    <td style="vertical-align:middle;">
                                                        <!-- <span class="label label-sm label-success"> Approved </span> -->
                                                        <a href="#">Approve</a> | <a href="#">Disapprove</a>
                                                    </td>
                                                </tr>
                                               <!--  <tr class="odd gradeX">
                                                    <td>
                                                        2
                                                    </td>
                                                    <td> looper </td>
                                                    <td>
                                                        <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-warning"> Suspended </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        3
                                                    </td>
                                                    <td> userwow </td>
                                                    <td>
                                                        <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success"> Approved </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        4
                                                    </td>
                                                    <td> user1wow </td>
                                                    <td>
                                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-default"> Blocked </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        5
                                                    </td>
                                                    <td> restest </td>
                                                    <td>
                                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success"> Approved </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        6
                                                    </td>
                                                    <td> foopl </td>
                                                    <td>
                                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success"> Approved </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        7
                                                    </td>
                                                    <td> weep </td>
                                                    <td>
                                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success"> Approved </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        8
                                                    </td>
                                                    <td> coop </td>
                                                    <td>
                                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success"> Approved </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        9
                                                    </td>
                                                    <td> pppol </td>
                                                    <td>
                                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success"> Approved </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        10
                                                    </td>
                                                    <td> test </td>
                                                    <td>
                                                        <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success"> Approved </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        11
                                                    </td>
                                                    <td> userwow </td>
                                                    <td>
                                                        <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-default"> Blocked </span>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        12
                                                    </td>
                                                    <td> test </td>
                                                    <td>
                                                        <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-sm label-success"> Approved </span>
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                </div><!-- contentArea -->
                            </div>
                            <div class="tab-pane" id="portlet_tab2">
                                <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                                    ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
                                    et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo. </p>
                                <p>
                                    <a class="btn red" href="ui_tabs_accordions_navs.html#portlet_tab2" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div>
                            <div class="tab-pane" id="portlet_tab3">
                                <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                    consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
                                <p>
                                    <a class="btn blue" href="ui_tabs_accordions_navs.html#portlet_tab3" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div>
                            <div class="tab-pane" id="portlet_tab4">
                                <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                    consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
                                <p>
                                    <a class="btn blue" href="ui_tabs_accordions_navs.html#portlet_tab3" target="_blank"> Activate this tab via URL </a>
                                </p>
                            </div>
                        </div>
                    </div><!-- portlet-body -->
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->
<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php /* ?>

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
<?php */ ?>
<script type="text/javascript">

loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/datatable.js", function(){
    loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/datatables/datatables.min.js", function(){
        loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
			loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/table-datatables-editable.min.js", function(){
				loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/profile.js", function(){
					loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/table-datatables-managed.js", function(){
						loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/bootbox/bootbox.min.js", function(){
							loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery.sparkline.min.js", function(){
								loadScript("<?php echo e(URL::to('metronic')); ?>/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
									loadScript("<?php echo e(URL::to('metronic')); ?>/layouts/layout/scripts/demo.min.js", function(){
										loadScript("<?php echo e(URL::to('metronic')); ?>/pages/scripts/datatable-expand.js", function(){
                                            loadScript("<?php echo e(URL::to('metronic')); ?>/global/scripts/app.min.js", pagefunction);
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






 
//var OP_function = function Operations(Operation, Approval_id, Adjustments_Effect=null)
//    {
//        
//
//        // alert( Approval_id )
//        // alert( Operation )
//
//
//            $.ajax({
//                type:"POST",
//                cache:true,
//                beforeSend:function()
//                { 
//                    App.startPageLoading(); 
//                },
//                url:"<?php echo e(url('/adjustment_approval_Operation')); ?>",
//                data:{
//                    Operation:Operation,Approval_id:Approval_id,Adjust_Effect:Adjustments_Effect,
//                    "_token": "<?php echo e(csrf_token()); ?>",
//                },
//                
//                success:function(result)
//                { 
//
//                },
//                error: function() 
//                { 
//                    // alert("Error occured.please try again");
//                    // $(placeholder).append(xhr.statusText + xhr.responseText);
//                    // $(placeholder).removeClass('loading');
//
//                },
//                complete: function() { App.stopPageLoading(); },
//            });
//            
//
//
//    }
//
//
//    var Delete_operation = function delete_approve_request(Approval_id,OType)
//    {
//
//
//            $.ajax({
//                type:"POST",
//                cache:true,
//                beforeSend:function()
//                { 
//                    App.startPageLoading(); 
//                },
//                url:"<?php echo e(url('/delete_approval_Operation')); ?>",
//                data:{
//                    Approval_id:Approval_id,OType:OType,
//                    "_token": "<?php echo e(csrf_token()); ?>",
//                },
//                
//                success:function(result)
//                { 
//
//                },
//                error: function() 
//                { 
//                    // alert("Error occured.please try again");
//                    // $(placeholder).append(xhr.statusText + xhr.responseText);
//                    // $(placeholder).removeClass('loading');
//
//                },
//                complete: function() { App.stopPageLoading(); },
//            });
//
//
//
//    }
//
//
// 
//
//
//
//    $(document).on("click", ".Adjustment_Operation", function(){
//        
//        
//        var $row = $(this).closest("tr");
//        var Approval_id = parseInt( $row.data('rowid') );
//
//        var Operation = $(this).data('name')
//        var OType = $row.data('type');
//
//
//        var Edit_id        =  $row.data('editid');
//        var Edit_type      =  $row.data('edittype');
//        var Eattendance_id =  $row.data('eattendance_id');
//
//
//        // alert( OType );
//        // alert( Operation );
//
//
//        // alert( Edit_id );
//        // alert( Edit_type );
//        // alert( Eattendance_id );
//
//        //alert( Approval_id );
//
//
//
//       if( OType =='Exceptional Adjustments')
//        {
//
//
//            bootbox.prompt({
//                title: "Adjustments Effect?",
//                inputType: 'radio',
//                inputOptions: [
//                 
//                {
//                    text: 'Effect on Staff Pay Role',
//                    value: 1,
//                },
//                {
//                    text: 'Effect on Staff Leave Balance',
//                    value: 2,
//                },
//
//                ],
//                callback: function (result) {
//                    
//                     
//                    if( result !== null ) 
//                    {
//                        $row.fadeOut(300, function() { $row.remove(); });
//                        OP_function(OType, Approval_id, result);    
//                    }
//                    
//                }
//            });
//
//
//
//        } 
//        else if( OType =='Absentia' )
//        {
//
//        }
//        else if( OType =='Unauthorized Leave Penalties' )
//        {
//
//        }
//        else if( OType =='Leave Applications' )
//        {
// 
// 
//
// 
//        }
//        else
//        {
//
//          // Missed Tap Event
//
//          
//          if( Operation == 'Operation_Edit')
//          {
//            editAddManual(Edit_id, Eattendance_id, Edit_type);
//          }
//          else if( Operation == 'Operation_Delete')
//          {
//            
//
//
//            bootbox.confirm({
//                title: "Approve",
//                message: "Yes Approve Request.",
//                buttons: {
//                    cancel: {
//                        label: '<i class="fa fa-times"></i> Cancel'
//                    },
//                    confirm: {
//                        label: '<i class="fa fa-check"></i> Confirm'
//                    }
//                },
//                callback: function (result) {
//                   
//
//                    if( result==true ) 
//                    {
//                      $row.fadeOut(300, function() { $row.remove(); });
//                      Delete_operation(Approval_id,5);
//                      deleteMistapRequest(Edit_id, Eattendance_id, Edit_type);
//
//                    }
//
//               
//
//
//                }
//            });
//
//
//
//          }
//          else
//          {
//            
//            bootbox.confirm({
//                title: "Approve",
//                message: "Yes Approve Request.",
//                buttons: {
//                    cancel: {
//                        label: '<i class="fa fa-times"></i> Cancel'
//                    },
//                    confirm: {
//                        label: '<i class="fa fa-check"></i> Confirm'
//                    }
//                },
//                callback: function (result) {
//                   
//
//                    if( result==true ) 
//                    {
//                       $row.fadeOut(300, function() { $row.remove(); });
//                       OP_function(OType, Approval_id);
//                    }
//
//               
//
//
//                }
//            });
//
//
//
//          } // end else Operation
//
//          
//
//
//
//
//        }
//
//
//
//           
//
//
//
//
//
//
//
//       
//
//        
//
//    });


}
</script>
<!-- Start Edit Absenia_id -->
  <?php echo $__env->make('attendance.staff.modals.absentia_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- End Edit Absenia_id-->

<!-- Leave Application Edit Functionality Modal-->
                         
<?php echo $__env->make('attendance.staff.modals.leave_application_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                
<!-- End Leave Applicaiton Modal -->

<!-- Exceptional Edit Functionality Modal-->
<?php echo $__env->make('attendance.staff.modals.exceptional_adjustment_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- End Exceptional Modal -->

<!-- Edit Penalties -->
<?php echo $__env->make('attendance.staff.modals.penalty_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- End Penalties -->
<!-- Edit Manual Attendance -->
<?php echo $__env->make('attendance.staff.modals.miss_tap_edit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- End Manual Attendance modal -->
<?php echo $__env->make('master_layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(URL::to('metronic')); ?>/global/scripts/hr_forms.js" type="text/javascript"></script>
<script src="<?php echo e(URL::to('metronic')); ?>/global/scripts/global_functions.js" type="text/javascript"></script>

