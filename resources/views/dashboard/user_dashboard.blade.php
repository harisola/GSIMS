<?php
include(app_path().'/Metronic/inc/init.php');
?>

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dashboard</span>
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
<h1 class="page-title"> Dashboard
    <small>dashboard & statistics</small>
</h1>
<!-- END PAGE TITLE-->



<!-- BEGIN PAGE ALERTS-->
<?php if($Password == '1'){ ?>
<div id="" class="custom-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Please change your account password. <a href="#user_profile">Change Password</a></div>
<?php } ?>
<!-- END PAGE ALERTS-->



<style>
.dashboard-stat.dashboard-stat-v2 .visual {
    padding-top: 10px;
    margin-bottom: 40px;
}
.dateTPA {
    font-size: 14px;
    color: #fff;
    line-height: 24px;
}
.dashboard-stat .visual {
    width: 150px;
}
.dashboard-stat .details .number {
    padding-top: 10px;
}
.padding0 {
	padding:0;	
}
.dashboard-stat .details {
	width:50%;	
}
.TPABoxInner {
	border-right:1px solid #fff;
	font-size:18px;	
}
.TPABoxInner:last-child {
	border-right:0 none;	
}
.TPAtitle {
	font-size:14px;	
}
.borderRight {
	border-right:1px solid #fff;	
}
.dashboard-stat .details {
	right:0 !important;	
}
.dashboard-stat .details .number {
    padding-top: 10px;
    padding-right: 18px;
}
</style>
<script type="text/javascript">
    $('#demo_5').click(function(){
        bootbox.dialog({
            message: "I am a custom dialog",
            title: "Custom title",
            buttons: {
              success: {
                label: "Success!",
                className: "green",
                callback: function() {
                  alert("great success");
                }
              },
              danger: {
                label: "Danger!",
                className: "red",
                callback: function() {
                  alert("uh oh, look out!");
                }
              },
              main: {
                label: "Click ME!",
                className: "blue",
                callback: function() {
                  alert("Primary button");
                }
              }
            }
        });
    });

</script>

<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="http://google.com" target="_blank">
            <div class="visual">
            	<div class="dateTPA text-left">
                	13 September 2017
                </div><!-- dateTPA -->
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span>A1-W</span>
                </div>
                <br />
                <div class="desc col-md-12 padding0"> 
                	<div class="col-md-4 col-xs-4 padding0 text-center TPABoxInner">
                    	<span data-counter="counterup" data-value="24">0</span>
                    </div><!-- col-md-4 -->
                    <div class="col-md-4 col-xs-4 padding0 text-center TPABoxInner">
                    	<span data-counter="counterup" data-value="16">0</span>
                    </div><!-- col-md-4 -->
                    <div class="col-md-4 col-xs-4 padding0 text-center TPABoxInner">
                    	<span data-counter="counterup" data-value="8" >0</span>
                    </div><!-- col-md-4 -->
                </div>
                <div class="desc col-md-12 padding0"> 
                	<div class="col-md-4 col-xs-4 padding0 text-center TPABoxInnerr">
                    	<span class="font-grey-salt TPAtitle">T</span>
                    </div><!-- col-md-4 -->
                    <div class="col-md-4 col-xs-4 padding0 text-center TPABoxInnerr">
                    	<span class="font-grey-salt TPAtitle">P</span>
                    </div><!-- col-md-4 -->
                    <div class="col-md-4 col-xs-4 padding0 text-center TPABoxInnerr">
                    	<span class="font-grey-salt TPAtitle">A</span>
                    </div><!-- col-md-4 -->
                </div>
            </div>
        </a>
    </div>
</div>
<a class="btn dark btn-outline sbold uppercase" id="demo_5"> View Demo </a> 
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->



<!--================================================== -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::to('metronic') }}/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/horizontal-timeline/horizontal-timeline.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::to('metronic') }}/global/scripts/app.min.js" type="text/javascript"></script>
<script src="{{ URL::to('metronic') }}/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<script type="text/javascript">
    Dashboard.init();
    App.init();
</script>
<!-- END PAGE LEVEL SCRIPTS -->