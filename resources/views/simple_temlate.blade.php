<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>TT Profile Allocation</span>
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
<?php 
/************************************
* Another Example of Script loading
*************************************/ ?>
<script type="text/javascript">


    var pagefunction = function() {

        
        loadScript("{{ URL::to('metronic') }}/global/scripts/app.min.js", userFormScript);
        

        function userFormScript() {
        }
    }




    pagefunction();
</script>
<!-- END PAGE LEVEL PLUGINS -->