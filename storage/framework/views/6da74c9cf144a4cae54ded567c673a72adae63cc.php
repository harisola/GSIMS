<?php

//initilize the page
include(app_path().'/Metronic/inc/init.php');


//require UI configuration (nav, ribbon, etc.)
include(app_path().'/Metronic/inc/config.ui.php');




/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC. */



/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "my_style.css";
include(app_path().'/Metronic/inc/header.php');


//include left panel (navigation)
//follow the tree in inc/config.ui.php
include(app_path().'/Metronic/inc/nav.php');

?>



<!-- ==========================CONTENT STARTS HERE ========================== -->

<!-- MAIN PANEL -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <!-- MAIN CONTENT -->
        <div id="content">
        Loading content...
        </div>
        <!-- END MAIN CONTENT -->

    </div>
</div>
<!-- END MAIN PANEL -->






<!-- FOOTER -->
    <?php
        include(app_path().'/Metronic/inc/footer.php');
    ?>
<!-- END FOOTER -->













<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
    //include required scripts
    include(app_path().'/Metronic/inc/scripts.php');
    //include footer
?>