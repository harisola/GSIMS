<div id="content" style="opacity: 1;"><link href="http://10.10.10.50/gsims/public/css/ProfileDefinition.css" rel="stylesheet" type="text/css">
<!-- Weekly Timesheet CSS -->
<style>
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #d4d4d4 !important;
}
.shortField {
    		width: 80px;
    	}
    	#FeeStructure tbody tr td:first-child {
    		background: #e0e0e0;
    	}
    	#FeeStructure.table-bordered>thead>tr>th {
		    background: #888;
		    color: #fff;
		}
.billTypeName {
	padding-left: 0;
    list-style: none;
}
.billTypeName li {
	border-bottom: 1px solid #ededed;
    padding: 10px 20px;
}
.billTypeName li.selected {
	background: #eef1f5;
	color: #000;
}
.billTypeName li.selected a {
	color: #000;
}
.billTypeName li a {
	
}
.billTypeName li a:hover {
	text-decoration: none;
    border-bottom: 1px solid #888;
}
</style>
<!-- Weekly Timesheet CSS END  -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Fee Bill Types</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->

<!-- Start Content section -->
<div class="row marginTop20">
    <div class="col-md-3 borderRightDashed">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered fixed-height marginBottom0 padding0 fixed-height-NoScroll" style="overflow: hidden;">
            
            <div class="portlet-title" style="margin-bottom: 0 !important;">
                <div class="caption">
                    <i class="fa fa-list"></i>
                    <span class="caption-subject font-dark sbold uppercase">Bill Types</span>
                </div>
                <?php /* ?>
                <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                            <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Add new profile" id="profileDefinationAdd">Add Session</button>
                    </div>
                </div>
                <?php */ ?>
            </div>
            <div class="portlet-body" style="padding-top: 0;">

                    <ul class="billTypeName list-default group">
<!--                     	<li class=""><a href="">PAO</a></li>
                    	<li class="selected"><a href="">EAO</a></li>
                    	<li><a href="">PEJMO - North Campus</a></li>
                    	<li><a href="">PEJMO - South Campus</a></li>
                    	<li><a href="">A-Level Generian PAO</a></li>
                    	<li><a href="">A-Level Generian - Non-PAO</a></li>
                    	<li><a href="">A-Level Non-Generian EAO</a></li>
                    	<li><a href="">A-Level Non-Generian - Non-EAO</a></li>
                    	<li><a href="">Regular Fee Bill</a></li>
                    	<li><a href="">Provisional Fee Bill</a></li> -->
                        <?php $__currentLoopData = $fee_bill_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $billType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class=""><a href="javascript:" onclick="mappingBillType(<?php echo e($billType->id); ?>)"><?php echo e($billType->title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
            </div><!-- portlet-body -->
        </div><!-- portlet -->
    </div><!-- col-md-4 -->
    <div class="col-md-9 fixed-height" id="profileDetail_Left" style="">
        <div class="row">
            <div class="col-md-12 ">
                <div class="portlet light bordered padding0 marginBottom0">
                    
                    <div class="portlet-title">
                        <div class="caption add_profile_label">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase caption_subject_profile bill-type-caption">Bill Type</span>
                        </div>
                    </div><!-- portlet-title -->
                    <form method="POST" action="<?php echo e(url('/updateBillType')); ?>" id="formBillType">
                    <div class="portlet-body padding20">
                        <div class="form-body">
                            <div class="row">
                            <input type="hidden" name="bill_type_id" id="bill_type_id" />
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Title &nbsp; <a href="#titleInformation" data-toggle="modal"><i class="icon-info"></i></a></label>
                                        <input type="text" name="bill_title" id="bill_title" class="form-control" placeholder="Bill Title">
                                        <span class="help-block"> <small>Limited to 100 characters</small></span>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label">Notes &nbsp; <a href="#notesInformation" data-toggle="modal"><i class="icon-info"></i></a></label>
                                        <textarea id="bill_notes" class="form-control" rows="5" name="bill_notes"></textarea>
                                        <span class="help-block"> <small>Limited to 400 characters</small> </span>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
						        </div>
						        <!-- /.modal-dialog -->
						    </div><!-- modal -->
						    <div class="modal fade" id="titleInformation" tabindex="-1" role="basic" aria-hidden="true">
						        <div class="modal-dialog">
						            <div class="modal-content">
						                <div class="modal-body"> 
						                    <img src="img/FeeBill_TitleArea.png" width="770" />
						                </div>
						            </div>
						            <!-- /.modal-content -->
						        </div>
						        <!-- /.modal-dialog -->
						    </div><!-- modal -->
						  
                           <div class="modal fade" id="notesInformation" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body"> 
                                            <img src="img/FeeBill_TextArea.png" width="770" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div><!-- modal -->
                        <div class="form-actions text-center">
                            <button type="button" class="btn default">Cancel</button>
                            <button type="button" class="btn blue" onclick="updateBill()">
                                <i class="fa fa-check"></i> Save</button>
                        </div>
                       
                        <div id="callout">
                        </div>
                    </div><!-- portlet-body -->
                    </form>
                </div><!-- portlet -->
            </div><!-- col-md-12 v-->
        </div><!-- row -->
    </div><!-- col-md-8 -->
</div><!-- row -->
<!-- End content section -->








<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">


var pagefunction = function(){

}

// Maping the bill
var mappingBillType = function(id){
    $( '.billTypeName li' ).removeClass( 'selected' );
    $( '.billTypeName' ).find( "li" ).eq(parseInt(id)- parseInt(1) ).addClass( 'selected' );
    $.ajax({
        type:"POST",
        url:"<?php echo e(url('/getBillType')); ?>",
        data:{
            id:id,
            "_token": "<?php echo e(csrf_token()); ?>",
        },
        success:function(e){
            var data = JSON.parse(e);
            $('.bill-type-caption').text(data[0].title);
            $('#bill_notes').val(data[0].notes);
            $('#bill_title').val(data[0].title);
            $('#bill_type_id').val(data[0].id);
        }
    });
}
// Update Bill
var updateBill = function(){

    var selectedForm = $('#formBillType');
    $(selectedForm).validate({              
        rules: {
            bill_title: {
                required: true,
                maxlength: 100
            },
            bill_notes:{
                required:true,
                maxlength: 400
            }

        },
        messages:{
            bill_title:{
             required: "Please Enter the title",
             maxlength: "The character length is greater then 100",
            },
            bill_notes:{
             required: "Please Enter the Notes",
             maxlength: "The character length is greater then 400",
            }
        }
    }).form(); ;

    if(selectedForm.valid()){
        $.ajax({
            type:"POST",
            url:"<?php echo e(url('/updateBillType')); ?>",
            data:{
                bill_title:$("input[name=bill_title]").val(),
                bill_notes:$('#bill_notes').val(),
                bill_type_id: $('#bill_type_id').val(),
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success:function(e){
                $('#callout').css('display','');
                $('#callout').html(e);
                $('#callout').fadeOut(3000);
                $( '.billTypeName' ).find( "li a" ).eq( parseInt($('#bill_type_id').val())- parseInt(1) ).text($("input[name=bill_title]").val());
            }
        });
    }

}
   


loadScript("http://10.10.10.50/gsims/public/metronic/global/scripts/datatable.js", function(){
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
</script>
<!-- END PAGE LEVEL PLUGINS -->

<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS --></div>