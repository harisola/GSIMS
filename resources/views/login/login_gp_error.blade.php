<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Generation's School | Login ID error</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="author" />


        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ URL::to('metronic') }}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ URL::to('metronic') }}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ URL::to('metronic') }}/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ URL::to('metronic') }}/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->


        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ URL::to('metronic') }}/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ URL::to('metronic') }}/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->


        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ URL::to('metronic') }}/pages/css/error.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" page-404-full-page">
        <div class="row">
            <div class="col-md-12 page-404">
                <div class="number font-red"> g+ </div>
                <div class="details">
                    <h3>Generation's official email is required.</h3>
                    <p> The login id ({{ $email }}) you used is actually not registered for login.
                        <br/>
                        <a href="{{ url('/') }}"> Return home </a> and try login again. 
                    </p>
                </div>
            </div>
        </div>
        <!--[if lt IE 9]>
<script src="{{ URL::to('metronic') }}/global/plugins/respond.min.js"></script>
<script src="{{ URL::to('metronic') }}/global/plugins/excanvas.min.js"></script> 
<script src="{{ URL::to('metronic') }}/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->


        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ URL::to('metronic') }}/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('metronic') }}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('metronic') }}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('metronic') }}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('metronic') }}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{ URL::to('metronic') }}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->


        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ URL::to('metronic') }}/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->



    </body>

</html>