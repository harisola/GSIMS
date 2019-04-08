<?php
?>
			<!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse" style="height:93vh !important;">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->





                            <li class="nav-item start active open dashboard">
                                <a href="#dashboard" class="nav-link ">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <!-- Begin: Brows Menu -->
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-magnifier font-green"></i>
                                    <span class="title">Browse</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu" style="display: none;">
                                    <?php if(empty($LNavMenu_ByGroup)) { ?>
                                    <li class="nav-item open">
                                        <a href="javascript:;" class="nav-link nav-toggle font-grey-mint">
                                            <span class="title">Students</span>
                                            <span class="arrow open"></span>
                                        </a>
                                    </li>
                                    <?php } else { ?>
                                    <li class="nav-item open">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <span class="title">Students</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu" style="display: block;">
                                            <li class="nav-item">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title">By Grade</span>
                                                <span class="arrow"></span>
                                                </a>
                                                    <ul class="sub-menu" style="display: none;">
                                                        <?php if(!empty($LNavMenu_ByGrade)) {echo $LNavMenu_ByGrade;} ?>
                                                    </ul>
                                            </li>
                                            <li class="nav-item ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title">By Class</span>
                                                <span class="arrow"></span>
                                                </a>
                                                    <ul class="sub-menu">
                                                        <?php if(!empty($LNavMenu_ByGroup)) {echo $LNavMenu_ByGroup;} ?>
                                                    </ul>
                                            </li>
                                            <li class="nav-item ">
                                                <a href="#student_layout" class="nav-link "> By List </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                    <li class="nav-item  ">
                                        <?php if(empty($StaffTeamMenu)) { ?>
                                            <a href="javascript:;" class="nav-link nav-toggle font-grey-mint">
                                                <span class="title">Staff</span>
                                                <span class="arrow"></span>
                                            </a>
                                        <?php } else { ?>
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title">Staff</span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="nav-item ">
                                                    <a href="javascript:;" class="nav-link nav-toggle">
                                                    <span class="title">By Team</span>
                                                    <span class="arrow"></span>
                                                    </a>
                                                        <ul class="sub-menu">
                                                            <?php echo $StaffTeamMenu; ?>
                                                        </ul>
                                                </li>
                                                <li class="nav-item ">
                                                    <a href="javascript:;" class="nav-link nav-toggle">
                                                    <span class="title">By Campus</span>
                                                    <span class="arrow"></span>
                                                    </a>
                                                        <ul class="sub-menu">
                                                            <li class="nav-item ">
                                                                <a href="#staff_layout_team?campus=north" class="nav-link "> North </a>
                                                            </li>
                                                            <li class="nav-item ">
                                                                <a href="#staff_layout_team?campus=south" class="nav-link "> South </a>
                                                            </li>
                                                            
                                                        </ul>
                                                </li>
                                                <li class="nav-item ">
                                                    <a href="#staff_layout_team" class="nav-link ">
                                                    <span class="title">By List</span>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </li>
                            <!-- End: Brows Menu -->

                            <!-- Begin: My Class Groups -->
                            <?php echo $MyClassGroups; ?>
                            <!-- End: My Class Groups -->

                            <!-- Begin: My Processes Menu -->
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link">
                                    <i class="fa fa-spinner font-blue-hoki"></i>
                                    <span class="title">My Processes</span>
                                </a>
                            </li>
                            <!-- End: My Processes Menu -->




                            <!-- Begin: My Team Menu -->
                            <?php if(empty($StaffTeamMenu)) { ?>
                                <li class="nav-item  ">
                                    <a href="#" class="nav-link font-grey-mint">
                                        <i class="fa fa fa-sitemap font-grey-cascade"></i>
                                        <span class="title">My Team</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item  ">
                                    <a href="#staff_layout_team" class="nav-link">
                                        <i class="fa fa fa-sitemap font-grey-cascade"></i>
                                        <span class="title">My Team</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <!-- End: My Team Menu -->
                            







                            <?php //echo $LNavMenu; ?>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    <span class="copy">2019-20 &copy; Generation's School</span>
                    </div>
                    
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->