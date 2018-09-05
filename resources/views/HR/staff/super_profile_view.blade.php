<style>

.table-fixed-column-outter {
  position: relative;
}

.table-fixed-column-inner {
  overflow-x: scroll;
  overflow-y: visible;
      width: 89%;
    margin-left: 45%;
}

table.table-fixed-column {
  table-layout: fixed;
  width: 100%
}

table#harisOla td,
table#harisOla th {
  width: 200px;
  text-align:center;
}

table#harisOla th:first-child,
table#harisOla tr td:first-child {
	position: absolute;
	left: 0;
	width: 25%;
	text-align:left;
	height: 37px;
	line-height: 22px;
	background: #f1f1f1;
    border: 1px solid #e6e6e6;
}
table#harisOla td {
	color:#888;	
}
table#harisOla th:nth-child(2),
table#harisOla tr td:nth-child(2) {
	position: absolute;
	left: 25%;
	width: 20%;
	text-align:left;
	height: 37px;
	overflow: hidden;
	line-height: 22px;
	background: #f1f1f1;
    border: 1px solid #e6e6e6;
}

</style>
<link rel="stylesheet" type="text/css" href="{{url('metronic')}}/global/css/x-editable/bootstrap-editable.css">
<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <a href="index.html">Home</a>
         <i class="fa fa-circle"></i>
      </li>
      <li>
         <span>Super Profile</span>
      </li>
   </ul>
   <!-- page-breadcrumb -->
</div>
<!-- END PAGE BAR -->

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Super Profile</h4>
            </div>

                <form class="form-horizontal" role="form" id="insert_super_profile">

                <div class="form-body" style="padding:20px 0;">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Super Profile Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="super_profile_name" placeholder="Enter Super Profile Name" id="super_profile">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" id="super_profile_desc">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                
                <div id="message">
                </div>

                </form>

            <div class="modal-footer" style="text-align:center;">
                
                <button type="button" class="btn green" onClick="insertSuper()" id="super_profile" >Insert Super Profile</button>
                <button type="button" class="btn gray btn-outline close2" data-dismiss="modal" >Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="portlet light bordered fixed-height marginBottom0">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bubble font-green-sharp"></i>
            <span class="caption-subject font-green-sharp sbold">Super Profile</span>
        </div>
        <div class="actions">
            <div class="btn-group">
               <a class="btn red btn-outline sbold" data-toggle="modal" href="#basic"> Add Super Profile</a>

            </div>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
          <div class="col-md-9" id="Super_Profile_Container">
            <div class="table-fixed-column-outter">
              <div class="table-fixed-column-inner">
              	<?php $TTpush = array(); ?>
				        <?php $SUpush = array(); ?>
                <table class="table-fixed-column table-fixed-column table table-bordered table-striped" id="harisOla">
                  <thead style="">
                    <tr>
                      <th>TT Profiles</th>
                      <th>TT Profile Timings</th>
                      <?php if(!empty($superProfile)) { ?>
                      <?php foreach($superProfile as $p) { ?>
                      <th><?php echo  ucwords($p->cat_name) ?></th>
                      <?php } ?>
                    </tr>
                    <?php } ?>
                    <!-- </tr> -->
                  </thead>
                  <tbody>
					<?php if(!empty($profileDetail)) { ?>
                    <?php foreach($profileDetail as $profile) { ?> 
                      <tr>
                        <td><span class="tooltips" data-original-title="<?=ucwords($profile->name) ?>"><?=ucwords($profile->name) ?></span></td>
                        <td><?php echo date('g:i A',strtotime($profile->mon_in)) ?>-<?php echo date('g:i A',strtotime($profile->mon_out)) ?></td>
						<?php foreach($superProfile as $super) { ?>
							<?php foreach($getSuperProfileDetails as $superDetail) { ?>
									<?php if($superDetail->super_profile_id ==  $super->ID && $superDetail->profile_id == $profile->id ) {  ?>
									<td>
                                      <?php if($superDetail->is_on_mon == 1) {?>
                                          <a href="javascript:void(0)"  class="MonIN" data-placement="bottom" data-title="Morning" data-profile_id ="<?php  echo $superDetail->profile_id ?>" data-super_profile="<?php echo $superDetail->super_profile_id ?>" data-pk="<?php echo $superDetail->id ?>" data-type="combodate"><?php echo date("g:i A",strtotime($superDetail->mon_in)) ?>
                                          </a> &nbsp; - &nbsp; <a href="javascript:void(0)"  class="MonOUT" data-placement="bottom" data-title="Afternoon" data-profile_id ="<?php  echo $superDetail->profile_id ?>" data-super_profile="<?php echo $superDetail->super_profile_id ?>" data-pk="<?php echo $superDetail->id ?>" data-type="combodate">
                                           <?php echo date("g:i A",strtotime($superDetail->mon_out)) ?>
                                           </a>
                                      <?php } else { ?>
                                        <a href="javascript:void(0)"  class="MonIN" data-placement="bottom" data-title="Morning" data-profile_id ="<?php  echo $superDetail->profile_id ?>" data-super_profile="<?php echo $superDetail->super_profile_id ?>" data-pk="<?php echo $superDetail->id ?>" data-type="combodate">00:00:00
                                          </a> &nbsp; - &nbsp; <a href="javascript:void(0)"  class="MonOUT" data-placement="bottom" data-title="Afternoon" data-profile_id ="<?php  echo $superDetail->profile_id ?>" data-super_profile="<?php echo $superDetail->super_profile_id ?>" data-pk="<?php echo $superDetail->id ?>" data-type="combodate"> 00:00:00
                                           </a>

                                      <?php } ?>
                                      </td>
                                      <?php } ?>

                              <?php } ?>

                        <?php } ?>


                    </tr>
                    <?php }?>

        			<?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

</div>
    </div><!-- -->



<script type="text/javascript">


var pagefunction = function() {
    Demo.init();
    App.init();




};

var insertSuper =  function(){
    var $form = $('#insert_super_profile');
    var validator = $form.validate({
        rules:{super_profile_name:"required"},
        messages:{ super_profile_name:"Please Enter Super Profile Name", },
		
    });

    //validate the form
    validator.form();

    if($form.valid()){
        var super_profile = $('#super_profile').val();
        var super_profile_desc = $('#super_profile_desc').val();
        $.ajax({
            type:"POST",
            url:"{{ url('/insertSuperProfile')}}",
            data:{
                super_profile:super_profile,
                super_profile_desc:super_profile_desc,
                 "_token": "{{ csrf_token() }}",
            },
            success:function(e){
				var html = '';
				html = html + '<div class="alert alert-info" style="margin-bottom: 0;text-align: center;"><strong>Success!</strong> A new Super Profile named <strong>"' + super_profile + '"</strong> has added successfully. </div>';
				$('#message').html(html);
            }
            



        });
    }
}



$('.close').click(function(){

     $.ajax({
        type:"POST",
        url:"{{url('/getSuperProfileInteface')}}",
        data:{
            "_token": "{{ csrf_token() }}",
        },
        success:function(res){
        console.log(res);
        $('#Super_Profile_Container').html('');
        $("#Super_Profile_Container").html(res);
        //$("#ajaxloader2").hide();
        }

    }); // end replace html ajax 

});
$('.close2').click(function(){

     $.ajax({
        type:"POST",
        url:"{{url('/getSuperProfileInteface')}}",
        data:{
            "_token": "{{ csrf_token() }}",
        },
        success:function(res){
        console.log(res);
        $('#Super_Profile_Container').html('');
        $("#Super_Profile_Container").html(res);
        //$("#ajaxloader2").hide();
        }

    }); // end replace html ajax 

});


// var updateTimeIn = function(){

//     $.fn.editable.defaults.params = function (params) {
//         params._token = "{{ csrf_token() }}";
//         return params;
//     };
//     $('.MonIN').editable({

//          type: 'text',
//          format:'h:mm A',
//          viewformat:'h:mm A',
//          template: 'h:mm a',
//          name:'mon_in',
//          url:"{{url('/updateTimeIn')}}",
//          success: function(e){
//                 console.log(e)
//         }

//     });
// }


    $(document).on('click','.MonOUT',function(){



    $.fn.editable.defaults.params = function (params) {
        params._token = "{{ csrf_token() }}";
        return params;
    };

    $('.MonOUT').editable({

     type: 'text',
     format:'h:mm A',
     viewformat:'h:mm A',
     template: 'h:mm a',
     name:'mon_in',
     url:"{{url('/updateTimeOut')}}",
     success: function(e){
            console.log(e)
    }

    });

});



$(document).on('click','.MonIN',function(){
  $.fn.editable.defaults.params = function (params) {
        params._token = "{{ csrf_token() }}";
        return params;
    };
    $('.MonIN').editable({

         type: 'text',
         format:'h:mm A',
         viewformat:'h:mm A',
         template: 'h:mm a',
         name:'mon_in',
         url:"{{url('/updateTimeIn')}}",
         success: function(e){
                console.log(e)
        }

    });

});


var pagedestroy = function(){
}

loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){
                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
                                loadScript("{{ URL::to('metronic') }}/global/plugins/jquery-validation/js/jquery.validate.min.js",function(){
                                    loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
                                        loadScript("{{ URL::to('metronic') }}/global/plugins/x-editable/bootstrap-editable.min.js",function(){
                                            loadScript("{{ URL::to('metronic') }}/global/plugins/x-editable/moment.min.js",function(){
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
});

</script>