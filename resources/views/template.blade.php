<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Profile</span>
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







<!-- BEGIN PAGE TITLE-->
<?php /*
<h1 class="page-title"> Dashboard
    <small>dashboard & statistics</small>
</h1>
*/?>
<!-- END PAGE TITLE-->







<!-- BEGIN USE PROFILE -->
<div class="row">
</div>
<!-- END USE PROFILE -->













<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript">

    <?php /*
    // load related plugins
    loadScript("<?php echo ASSETS_URL; ?>/js/plugin/x-editable/moment.min.js", function(){
        loadScript("<?php echo ASSETS_URL; ?>/js/plugin/x-editable/jquery.mockjax.min.js", function(){
            loadScript("<?php echo ASSETS_URL; ?>/js/plugin/x-editable/x-editable.min.js", function(){
                loadScript("<?php echo ASSETS_URL; ?>/js/plugin/typeahead/typeahead.min.js", function(){
                    loadScript("<?php echo ASSETS_URL; ?>/js/plugin/typeahead/typeaheadjs.min.js", function(){
                        loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js", function(){
                            loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.colVis.min.js", function(){
                                loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.tableTools.min.js", function(){
                                    loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js", function(){
                                        loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
                                    });
                                });
                            });
                        });
                    });
                });
            });
        });
    });
    */ ?>


    var pagefunction = function() {

        
        loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", templateView_FormScript);
        

        function templateView_FormScript() {

        }
    }




    /******************************************************************************
    * Call this function only if you are not calling pageFunction with loadScript
    *******************************************************************************/
    //pagefunction();
</script>
<!-- END PAGE LEVEL PLUGINS -->








<?php 
/************************************
* Another Example of Script loading
*************************************/ ?>
<script type="text/javascript">


    var pagefunction = function() {

        
        loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", userFormScript);
        

        function userFormScript() {
            $(document).on('click','#submit_btn',function(e){
                e.preventDefault();



                /***** Further Requests of AJAX *****/
                var me = $(this);
                if ( me.data('requestRunning') ) {
                    return;
                }
                me.data('requestRunning', true);
                /***** Stop Further Request of AJAX *****/


                var username = $('#username').val();
                var password = $('#password').val();
                $.ajax({
                    type:"POST",
                    cache:true,
                    url:"{{url('/insert_data')}}",
                    data:{
                        username:username,
                        password:password,
                        "_token": "{{ csrf_token() }}",
                    },
                    success:function(f){
                        console.log(f);
                    },
                    /***** Further Requests of AJAX *****/
                    complete: function() {
                        me.data('requestRunning', false);
                    }
                    /***** Stop Further Request of AJAX *****/

                });
            });

            $(document).on('click','#cancel',function(f){
                $('#username').val('');
                $('#password').val('');
            });
        }
    }




    pagefunction();
</script>