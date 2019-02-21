<?php
?>

		<!--================================================== -->

		<!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo ASSETS_URL; ?>/global/plugins/jquery.min.js" type="text/javascript"></script>

         <script type='text/javascript' src="<?php echo ASSETS_URL; ?>/global/scripts/jquery.inputmask.bundle.js"></script>

            <!-- IMPORTANT: APP CONFIG -->
            <script src="<?php echo ASSETS_URL; ?>/js/app.config.js"></script>

        <script src="<?php echo ASSETS_URL; ?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS_URL; ?>/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS_URL; ?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS_URL; ?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS_URL; ?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL; ?>/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
        <script type="text/javascript" src="<?php echo ASSETS_URL; ?>/global/plugins/jquery.sparkline.js"></script>
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.7/packaged/jquery.noty.packaged.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css">

        <!-- END CORE PLUGINS -->
        

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo ASSETS_URL; ?>/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo ASSETS_URL; ?>/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS_URL; ?>/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo ASSETS_URL; ?>/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->






         






        <script type="text/javascript">

        /*
         * JS ARRAY SCRIPT STORAGE
         * Description: used with loadScript to store script path and file name
         * so it will not load twice
         */ 
            jsArray = {}


        /*
        * LOAD SCRIPTS
        * Usage:
        * Define function = myPrettyCode ()...
        * loadScript("js/my_lovely_script.js", myPrettyCode);
        */

        function loadScript(scriptName, callback) {

           if (!jsArray[scriptName]) {
              var promise = jQuery.Deferred();

              // adding the script tag to the head as suggested before
              var body = document.getElementsByTagName('body')[0],
                  script = document.createElement('script');
              script.type = 'text/javascript';
              script.src = scriptName;

              // then bind the event to the callback function
              // there are several events for cross browser compatibility
              script.onload = function() {
                 promise.resolve();
              };

              // fire the loading
              body.appendChild(script);
              
              // clear DOM reference
              //body = null;
              //script = null;

              jsArray[scriptName] = promise.promise();

           } else if (debugState)
              root.root.console.log("This script was already loaded %c: " + scriptName, debugStyle_warning);

           jsArray[scriptName].then(function () {
                   if(typeof callback === 'function')
                       callback();
           });
        }

        /* ~ END: LOAD SCRIPTS */


        function checkURL() {
            //get the url by removing the hash
            //var url = location.hash.replace(/^#/, '');
            var url = location.href.split('#').splice(1).join('#');

            if(url.substring(0, 4) == 'http'){
                if (url.indexOf("&gpp_id=") >= 0){

                }else{
                    url = 'http://10.10.10.63/gs/index.php/welcome/logininfo_ID'+'?api=4A53953C3AEF996224E5258D9588A&username='+'<?php echo $user['info'][0]->email; ?>'+'&url='+url;
                }

                window.location = url;
                return false;
            }
            //BEGIN: IE11 Work Around
            if (!url) {
            
                try {
                    var documentUrl = window.document.URL;
                    if (documentUrl) {
                        if (documentUrl.indexOf('#', 0) > 0 && documentUrl.indexOf('#', 0) < (documentUrl.length + 1)) {
                            url = documentUrl.substring(documentUrl.indexOf('#', 0) + 1);
            
                        }
            
                    }
            
                } catch (err) {}
            }
            //END: IE11 Work Around
        
            container = $('#content');

            // Do this if url exists (for page refresh, etc...)
            if (url) {
                if(url == 'dashboard'){
                    $('.nav-item.start.active').removeClass("start active");
                    $('.nav-item.open').removeClass("open");
                    $(".sub-menu").attr("style", "display:none");
                    $('.dashboard').addClass("start active open");
                }else if(url == 'haris'){
                    $('.nav-item.start.active').removeClass("start active");
                    $('.nav-item.open').removeClass("open");
                    $(".sub-menu").attr("style", "display:none");
                    $('.staff_list').addClass("start active open");
                }else if(url == 'student_layout'){
                    $('.nav-item.start.active').removeClass("start active");
                    $('.nav-item.open').removeClass("open");
                    $(".sub-menu").attr("style", "display:none");
                    $('.student_list').addClass("start active open");
                }else{
                    // remove all active class
                    $('.nav-item.start.active').removeClass("start active");
                    $('.nav-item.open').removeClass("open");
                    // match the url and add the active class
                    $('.nav-item li:has(a[href="#' + url + '"])').addClass("active open");
                    // set active class of parent
                    var t = $('.nav-item li:has(a[href="#' + url + '"])').closest('.nav-item.mark-nav').addClass("start active open");
                    //$('.nav-item.open').addClass("start active open");
                }

                var title = ($('.nav-item a[href="#' + url + '"]').text());
        
                // change page title from global var
                document.title = (title || document.title);
                
                // debugState
                if (debugState){
                    root.console.log("Page title: %c " + document.title, debugStyle_green);
                }
                
                // parse url to jquery
                loadURL(url + location.search, container);

            } else {
        
                // grab the first URL from nav
                var $this = 'dashboard'; //$('.nav-item > ul > li:first-child > a[href!="#"]');
        
                //update hash
                window.location.hash = $this;
                
                //clear dom reference
                $this = null;
        
            }
        
        }










        function loadURL(url, container) {
            // debugState
            if (debugState){
                root.root.console.log("Loading URL: %c" + url, debugStyle);
            }


            App.startPageLoading();
            $.ajax({
                type : "GET",
                url : url,
                dataType : 'html',
                cache : true, // (warning: setting it to false will cause a timestamp and will call the request twice)
                beforeSend : function() {
                    
                    //IE11 bug fix for googlemaps (delete all google map instances)
                    
                    
                    // destroy all datatable instances
                    if ( $('.dataTables_wrapper')[0] && (container[0] == $("#content")[0]) ) {
                        
                        var tables = $.fn.dataTable.fnTables(true);             
                        $(tables).each(function () {
                            
                            if($(this).find('.details-control').length != 0) {
                                $(this).find('*').addBack().off().remove();
                                $(this).dataTable().fnDestroy();
                            } else {
                                $(this).dataTable().fnDestroy();
                            }
                            
                        });
                        
                        // debugState
                        if (debugState){
                            root.console.log("✔ Datatable instances nuked!!!");
                        }
                    }
                    // end destroy
                    
                    

                    
                    // cluster destroy: destroy other instances that could be on the page 
                    // this runs a script in the current loaded page before fetching the new page
                    if ( (container[0] == $("#content")[0]) ) {

                        /*
                         * The following elements should be removed, if they have been created:
                         *
                         *  colorList
                         *  icon
                         *  picker
                         *  inline
                         *  And unbind events from elements:
                         *  
                         *  icon
                         *  picker
                         *  inline
                         *  especially $(document).on('mousedown')
                         *  It will be much easier to add namespace to plugin events and then unbind using selected namespace.
                         *  for futher ask Atif (atif.naseem22@gmail.com)
                         */
                        
                        // this function is below the pagefunction for all pages that has instances

                        if (typeof pagedestroy == 'function') { 

                          try {
                                pagedestroy(); 

                                if (debugState){
                                    root.console.log("✔ Pagedestroy()");
                               } 
                            }
                            catch(err) {
                               pagedestroy = undefined; 

                               if (debugState){
                                    root.console.log("! Pagedestroy() Catch Error");
                               } 
                          }

                        } 

                        // destroy all inline charts
                        
                        if ( $.fn.sparkline && $("#content .sparkline")[0] ) {
                            $("#content .sparkline").sparkline( 'destroy' );
                            
                            if (debugState){
                                root.console.log("✔ Sparkline Charts destroyed!");
                            } 
                        }
                        
                        if ( $.fn.easyPieChart && $("#content .easy-pie-chart")[0] ) {
                            $("#content .easy-pie-chart").easyPieChart( 'destroy' );
                            
                            if (debugState){
                                root.console.log("✔ EasyPieChart Charts destroyed!");
                            } 
                        }

                        

                        // end destory all inline charts
                        
                        // destroy form controls: Datepicker, select2, autocomplete, mask, bootstrap slider
                        
                        if ( $.fn.select2 && $("#content select.select2")[0] ) {
                            $("#content select.select2").select2('destroy');
                            
                            if (debugState){
                                root.console.log("✔ Select2 destroyed!");
                            }
                        }
                        
                        if ( $.fn.mask && $('#content [data-mask]')[0] ) {
                            $('#content [data-mask]').unmask();
                            
                            if (debugState){
                                root.console.log("✔ Input Mask destroyed!");
                            }
                        }
                        
                        if ( $.fn.datepicker && $('#content .datepicker')[0] ) {
                            $('#content .datepicker').off();
                            $('#content .datepicker').remove();
                            
                            if (debugState){
                                root.console.log("✔ Datepicker destroyed!");
                            }
                        }
                        
                        if ( $.fn.slider && $('#content .slider')[0] ) {
                            $('#content .slider').off();
                            $('#content .slider').remove();
                            
                            if (debugState){
                                root.console.log("✔ Bootstrap Slider destroyed!");
                            }
                        }
                                    
                        // end destroy form controls
                        
                        
                    }
                    // end cluster destroy
                    
                    // empty container and var to start garbage collection (frees memory)
                    pagefunction = null;
                    container.removeData().html("");
                    
                    // place cog
                    //container.html('<h1 class="ajax-loading-animation"><i class="fa fa-cog fa-spin"></i> Loading...</h1>');
                
                    // Only draw breadcrumb if it is main content material
                    if (container[0] == $("#content")[0]) {
                        
                        // clear everything else except these key DOM elements
                        // we do this because sometime plugins will leave dynamic elements behind
                        //$('body').find('> *').filter(':not(' + ignore_key_elms + ')').empty().remove();
                        
                        // draw breadcrumb
                        //drawBreadCrumb();  /* We are not using breadcrumb function right now... ! ask Atif(atif.naseem22@gmail.com) for this.
                    }
                    // end if


                    // scroll up
                    $("html, body").animate({
                        scrollTop : 0
                    }, "fast");
                },
                success : function(data) {
                    App.stopPageLoading();
                    
                    // dump data to container
                    container.css({
                        opacity : '0.0'
                    }).html(data).delay(50).animate({
                        opacity : '1.0'
                    }, 300);
                    
                    Layout.fixContentHeight(); // fix content height
                    App.initAjax(); // initialize core stuff


                    // clear data var
                    data = null;
                    container = null;
                },
                error : function(xhr, status, thrownError, error) {
                    App.stopPageLoading();
                    container.html('<h4 class="ajax-loading-error"><i class="fa fa-warning txt-color-orangeDark"></i> Error requesting <span class="txt-color-red">' + url + '</span>: ' + xhr.status + ' <span style="text-transform: capitalize;">'  + thrownError + '</span></h4>');
                },
                async : true
            });
        
        }




        // fire links with targets on different window
        $(document).on('click', '.page-sidebar a[target="_blank"]', function(e) {
            e.preventDefault();
            var $this = $(e.currentTarget);
    
            window.open($this.attr('href'));
        });
    
        // fire links with targets on same window
        $(document).on('click', '.page-sidebar a[target="_top"]', function(e) {
            e.preventDefault();
            var $this = $(e.currentTarget);
    
            window.location = ($this.attr('href'));
        });
    
        // all links with hash tags are ignored
        $(document).on('click', '.page-sidebar a[href="#"]', function(e) {
            e.preventDefault();
        });
    
        // DO on hash change
        $(window).on('hashchange', function() {
            checkURL();
        });


        checkURL();

        </script>










        <!-- User Search -->
		<script type="text/javascript">
		<?php /* #search?_token=JC6V1DZ0m3hXsiY3NuRpP45nT2uFjIHqu0H9lY8H&param= */?>
		$( document ).ready(function() {
		    $('#search-fld-form').on('submit', function(e) {
		        e.preventDefault();
		        var login_form = $('#search-fld-form').serializeArray();
		        var url = $('#search-fld-form').attr('action');
		        url = url + "?_token=" + $("input[name='_token']").val() + "&param=" + encodeURIComponent($("#search-fld").val());
		        $("#search-fld").val('');
		        window.location = url;
		    });
		}); 
		</script>





		<!-- User Logout -->
		<script type="text/javascript">
			$(document).ready(function(){

                $("#userLogout").click(function(){
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('/logout'); ?>",
                        data: {
                            _token: "<?php echo csrf_token(); ?>",
                        },
                        success: function(data)
                        {
                            //window.open('http://10.10.10.63/gs/index.php/logout', '_blank');
                            window.location = data;
                            window.location = "http://10.10.10.63/gs/index.php/logout_d";
                        }
                    }); 

                    return false;
                });
			});
		</script>





