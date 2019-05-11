<!DOCTYPE html>


<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Generation's | User Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(URL::to('metronic')); ?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(URL::to('metronic')); ?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(URL::to('metronic')); ?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(URL::to('metronic')); ?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo e(URL::to('metronic')); ?>/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(URL::to('metronic')); ?>/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo e(URL::to('metronic')); ?>/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo e(URL::to('metronic')); ?>/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo e(URL::to('metronic')); ?>/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo e(URL::to('metronic')); ?>/pages/img/GSLogo-W.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
                <!-- <h3 class="form-title font-green">Login</h3> -->
                <div id="alert" class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="errorText"> Enter username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" id="username" name="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" id="password" name="password" /> </div>
                <div class="form-actions">
                    <button id="submit" class="btn green-dark uppercase">Login</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" id="remember" value="1" />Remember
                        <span></span>
                    </label>

                </div>




                <div class="login-options">
                    <h4>Or login with</h4>
                    <ul id="socialLogin" class="social-icons">
                        <li>
                            <a class="googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
                        </li>
                    </ul>
                </div>
            
            <!-- END LOGIN FORM -->

        </div>
        <div class="copyright"> 2017-18 © Generation's. </div>
        <!--[if lt IE 9]>
<script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/respond.min.js"></script>
<script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo e(URL::to('metronic')); ?>/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo e(URL::to('metronic')); ?>/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo e(URL::to('metronic')); ?>/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->




        <script type="text/javascript">
            $(document).ready(function() {
                $('#submit').click(function() {
                    //$('<a href="http://10.10.10.63/gs/index.php/logout_d" target="blank"></a>')[0].click();

                    var token = "<?php echo e(csrf_token()); ?>";
                    var email = $("#username").val() + '@generations.edu.pk';

                     var email1 = $("#username").val();
                    var password = $("#password").val();
                    var error = false;

                    if(email === ''){
                        $("#alert").show();
                        $("#errorText").text("Username is required");
                        error = true;
                    }else if(password === ''){
                        $("#alert").show();
                        $("#errorText").text("Password is required");
                        error = true;
                    }

                    if(!error){

                        $.ajax({
                            type: "POST",
                            url: "<?php echo e(url('/login')); ?>",
                            data: {
                                _token: token,
                                email: email,
                                password: password
                            },
                            success: function(data)
                            {
                                if(data == "CN"){
                                    $("#alert").show();
                                    $("#errorText").text("Username or Password Mismatched");
                                }else{
                                    $("#alert").hide();
                                    <?php /*
                                    var rdURL = 'http://10.10.10.63/gs/index.php/welcome/logininfo_ID?api=4A53953C3AEF996224E5258D9588A&username='+$("#username").val()+'&password='+password;
                                    */ ?>
                                    window.location = data;
                                }
                            }
                        }); 
                        //ar
                        $.ajax({
                            type: "POST",
                            url: "<?php echo e(url('/log_user')); ?>",
                            data: {
                                _token: token,
                                email: email1,
                                password: password
                            },
                            success: function(data)
                            {
                                console.log(data);
                                // if(data == "CN"){
                                //     $("#alert").show();
                                //     $("#errorText").text("Username or Password Mismatched");
                                // }else{
                                //     $("#alert").hide();
                                //     <?php /*
                                //     var rdURL = 'http://10.10.10.63/gs/index.php/welcome/logininfo_ID?api=4A53953C3AEF996224E5258D9588A&username='+$("#username").val()+'&password='+password;
                                //     */ ?>
                                //     window.location = data;
                                //}
                            }
                        });                      
                    }
                });





                $('#socialLogin a').click(function() {
                    window.location = "<?php echo e(url('/login/google')); ?>";
                });
            });
        </script>
    </body>

</html>