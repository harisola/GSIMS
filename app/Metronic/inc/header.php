<?php
?>

<!DOCTYPE html>


<html lang="en">
    
    <!-- BEGIN HEAD --><head>
        <meta charset="utf-8" />
        <title>Generation's | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo ASSETS_URL; ?>/global/plugins/googleFont/googleFonts.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS_URL; ?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS_URL; ?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS_URL; ?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS_URL; ?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo ASSETS_URL; ?>/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS_URL; ?>/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS_URL; ?>/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS_URL; ?>/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo ASSETS_URL; ?>/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo ASSETS_URL; ?>/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo ASSETS_URL; ?>/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS_URL; ?>/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo ASSETS_URL; ?>/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-content-white page-sidebar-closed page-sidebar-fixed">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo $serverLURL; ?>">
                            <img src="<?php echo ASSETS_URL; ?>/layouts/layout/img/GSLogo.png" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->





                    
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default"> 4 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">xx pending</span> notifications</h3>
                                        <a href="#page_user_profile_1.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">just now</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> something here. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">3 mins</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> something ! </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">10 mins</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> more things. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">14 hrs</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> everything. </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->









                            
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-default"> 1 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>You have
                                            <span class="bold">X New</span> Messages</h3>
                                        <a href="#app_inbox.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                        <img src="<?php echo ASSETS_URL; ?>/layouts/layout3/img/avatar.png" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> Atif Naseem </span>
                                                        <span class="time">Just Now </span>
                                                    </span>
                                                    <span class="message"> New layout in action, ready to go... </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->















                            <!-- BEGIN CALENDAR DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-calendar"></i>
                                    <span class="badge badge-default"> 2 </span>
                                </a>
                                <ul class="dropdown-menu extended tasks">
                                    <li class="external">
                                        <h3>Upcoming
                                            <span class="bold">2 </span> events</h3>
                                        <a href="#calendar_events">view all</a>
                                    </li>
                                    <li>
                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;">
                                        <ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="photo">
                                                        <img src="<?php echo ASSETS_URL; ?>/layouts/layout3/img/avatar.png" class="img-circle" alt="">
                                                    </span>
                                                    <span class="task">
                                                        <span class="desc">Generation's Day </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="photo">
                                                        <img src="<?php echo ASSETS_URL; ?>/layouts/layout3/img/avatar.png" class="img-circle" alt="">
                                                    </span>
                                                    <span class="task">
                                                        <span class="desc">Seniors Sports Day </span>
                                                    </span>

                                                </a>
                                            </li>
                                        </ul>
                                        <div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- END CALENDAR DROPDOWN -->











                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?php echo STAFF_PIC_150 . $user['info'][0]->photo_id . STAFF_PIC150_TYPE; ?>" />
                                    <span class="username username-hide-on-mobile"> <?php echo $user['info'][0]->name_code; ?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="#user_profile">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="#calendar_events">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li>
                                    <?php /*
                                    <li>
                                        <a href="app_inbox.html">
                                            <i class="icon-envelope-open"></i> My Inbox
                                            <span class="badge badge-danger"> 3 </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_todo.html">
                                            <i class="icon-rocket"></i> My Tasks
                                            <span class="badge badge-success"> 7 </span>
                                        </a>
                                    </li>
                                    */ ?>
                                    <li class="divider"> </li>

                                    <?php /*
                                    <li>
                                        <a href="page_user_lock_1.html">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    </li>
                                    */ ?>
                                    <li>
                                        <a id="userLogout" href="#">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->




                            <?php /*
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                            */ ?>


                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
    <div class="page-quick-sidebar">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Menu
                </a>
            </li>
            <li>
                <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                    <span class="badge badge-success">7</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-bell"></i> Alerts </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-info"></i> Notifications </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-speech"></i> Activities </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-settings"></i> Settings </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="quick_sidebar_tab_1">
                <div class="page-quick-sidebar-chat-users page-sidebar" data-rail-color="#ddd" data-wrapper-class="" id="utilityMenu">


                <?php /*
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">HTML</a></li>
                          <li><a href="#">CSS</a></li>
                          <li><a href="#">JavaScript</a></li>
                        </ul>
                      </div>
                */ ?>


                    <!-- Menu Start -->
                    <div class="nav-side-menu">
                        <div class="menu-list">
                            <ul id="menu-content" class="menu-content collapse out">
                                <!-- 
                                <li>
                                    <a href="#">
                                    <i class="icon-home"></i>&nbsp; Dashboard
                                    </a>
                                </li>
                                -->

                                <?php echo $LNavMenu ?>
<!--                                 <li data-toggle="collapse" data-target="#rtl_hr" class="collapsed" aria-expanded="false">
                                    <a href="#"><i class="icon-user" data-toggle="dropdown"></i>&nbsp; HR <span class="arrow open"></span></a>
                                      <ul class="sub-menuu collapse" id="rtl_hr" aria-expanded="true" style="" role="menu">
                                        <li><a href="#ttprofile_definition">TT Profile Definition</a></li>
                                        <li><a href="#ttprofile_allocation">TT Profile Allocation</a></li>
                                        <li><a href="#weekly_timesheet">Weekly Time-Sheet</a></li>
                                        <li><a href="#super_profile">Super Profile</a></li>
                                        <li><a href="#staff_payroll_adjustment">Staff Payroll Adjustments</a></li>

                                        <li><a href="#staff_recruitment_initiation">Recruitment Initiation</a></li>

                                        <li><a href="#staff_recruitment_initiation_archive">Recruitment Archive</a></li>

                                        <li><a href="#staff_recruitment_process">Recruitment Process</a></li>
                                        <li><a href="#staff_recruitment_followup">Recruitment Followup</a></li>
                                        <li><a href="#hr_configurations">Settings - HR</a></li>
                                      </ul>
                                </li>
                                <li data-toggle="collapse" data-target="#rtl_fo" class="collapsed" aria-expanded="false">
                                    <a href="#"><i class="icon-home" data-toggle="dropdown"></i>&nbsp; Front Office <span class="arrow open"></span></a>
                                      <ul class="sub-menuu collapse" id="rtl_fo" aria-expanded="true" style="" role="menu">
                                        <li><a href="#student_stories">Student Stories</a></li>
                                      </ul>
                                </li>
                                <li data-toggle="collapse" data-target="#rtl_services" class="collapsed" aria-expanded="false">
                                    <a href="#"><i class="fa fa-dollar"></i>&nbsp; Accounts <span class="arrow"></span></a>
                                    <ul class="sub-menuu collapse" id="rtl_services" aria-expanded="true" style="">
                                      <li><a href = "#fee_billing" >Fee Billing</a></li>
                                      <li><a href = "#fee_bill_setup">Fee Bill Setup (yearly)</a></li>
                                      <li><a href = "#fee_bill_types" >Bill Types</a></li>
                                      <li><a href = "#accounts/remitance" >Remittance</a></li>
                                      <li><a href = "#arrears" >Arrears / Adjustments</a></li>

                                      <li><a href = "#waviers_arrears">Current Installment Arrears</a></li>
                                      <li><a href = "#concession">Concessions</a></li>
                                    </ul>
                                </li> 
                                <li data-toggle="collapse" data-target="#rtl_store" class="collapsed" aria-expanded="false">
                                    <a href="#"><i class="icon-social-dropbox"></i>&nbsp; Store <span class="arrow"></span></a>
                                    <ul class="sub-menuu collapse" id="rtl_store" aria-expanded="true" style="">
                                      <li><a href = "#requestion_form">Requestion Form</a></li>
                                      <li><a href = "#requestion_form/store">Requestion Form Store</a></li>
                                    </ul>
                                </li>  
                                <li data-toggle="collapse" data-target="#rtl_processes" class="collapsed" aria-expanded="false">
                                  <a href="#"><i class="fa fa-spinner"></i>&nbsp; My Processes <span class="arrow"></span></a>
                                    <ul class="sub-menuu collapse" id="rtl_processes" aria-expanded="true" style="">
                                      <li>New New 1</li>
                                      <li>New New 2</li>
                                      <li>New New 3</li>
                                    </ul>
                                </li>
                                 <li>
                                  <a href="#">
                                    <i class="fa fa-file-text-o"></i>&nbsp; Profile
                                  </a>
                                  </li>
                
                                 <li>
                                  <a href="#">
                                    <i class="fa fa fa-sitemap font-grey-cascade"></i>&nbsp; Users
                                  </a>
                                </li> -->
                                </ul>
                         </div>
                    </div>
                    <!-- Menu END -->

                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                <div class="page-quick-sidebar-alerts-list">
                    <h3 class="list-heading">General</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 4 pending tasks.
                                            <span class="label label-sm label-warning "> Take action
                                                <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> Just now </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-danger">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> New order received with
                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 30 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> Web server hardware needs to be upgraded.
                                            <span class="label label-sm label-warning"> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 2 hours </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <h3 class="list-heading">System</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 4 pending tasks.
                                            <span class="label label-sm label-warning "> Take action
                                                <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> Just now </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-default">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> New order received with
                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 30 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-warning">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> Web server hardware needs to be upgraded.
                                            <span class="label label-sm label-default "> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 2 hours </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                <div class="page-quick-sidebar-settings-list">
                    <h3 class="list-heading">General Settings</h3>
                    <ul class="list-items borderless">
                        <li> Enable Notifications
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Allow Tracking
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Log Errors
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Auto Sumbit Issues
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Enable SMS Alerts
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <h3 class="list-heading">System Settings</h3>
                    <ul class="list-items borderless">
                        <li> Security Level
                            <select class="form-control input-inline input-sm input-small">
                                <option value="1">Normal</option>
                                <option value="2" selected>Medium</option>
                                <option value="e">High</option>
                            </select>
                        </li>
                        <li> Failed Email Attempts
                            <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                        <li> Secondary SMTP Port
                            <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                        <li> Notify On System Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Notify On SMTP Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <div class="inner-content">
                        <button class="btn btn-success">
                            <i class="icon-settings"></i> Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>

</style>