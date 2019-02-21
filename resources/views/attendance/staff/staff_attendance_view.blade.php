
<style type="text/css">
.imageCenterDefault {
    background: #f3f3f3;
    width: 420px;
    border-radius: 50% !important;
    padding: 70px;
    margin: 0 auto;
    border: 1px solid #000;
    text-align: center;
}	
.INImage {
	text-align: center;
}
.INImage img {
	border-radius: 50% !important;
	border:1px solid #000;
}
.timeShow.IN {
	background: green;
	color: #fff;
}
.timeShow.OUT {
	background: red;
	color: #fff;
}
.timeShow {
	background: #ccc;
    margin: 0 15%;
    font-size: 20px;
    padding: 10px 0;
}
.daypassBTN {
	float: right;
}
#StaffList_length {
	display: none !important;
}
#StaffList_filter {
	float: right;
}
</style>
<div class="row">
	<div class="col-md-3">
	</div><!-- col-md-3 -->
	<div class="col-md-6">
		<div class="portlet light bordered padding0 marginBottom0">
            <div class="portlet-title">
                <div class="caption add_profile_label">
                    <span class="caption-subject font-dark sbold uppercase caption_subject_profile text-center">Card Tap - Screening Gate</span>
                </div>
                <input type="button" class="btn btn-group green daypassBTN" id="dayPass" value="Day Pass">
                <input type="button" class="btn btn-group green daypassBTN" style="display: none;" id="backtoTap" value="Back to Tap">
            </div><!-- portlet-title -->
            <div class="portlet-body">
            	<div class="tapArea">
	            	<div class="requestTapIn textCenter ">
						<div class="imageCenterDefault">
							<img src="http://10.10.10.50/new_gs/gs/components/gs_theme/images/nfc_updated.png" width="160">
						</div><!-- imageCenter -->
					</div>
					<div class="requestTapIn textCenter hide">
						<div class="INImage">
							<img src="http://10.10.10.50/new_gs/gs/assets/photos/hcm/500x500/staff/1159.jpg" width="410"><br><br>
						</div><!-- imageCenter -->
						<h2 style="font-weight:normal;color:#000;" class="text-center">Muhammad Haris Ola</h2>
						<div class="timeShow IN text-center">Time IN : 07:00 AM</div>
					</div>
					<div class="requestTapIn textCenter hide">
						<div class="INImage">
							<img src="http://10.10.10.50/new_gs/gs/assets/photos/hcm/500x500/staff/1159.jpg" width="410"><br><br>
						</div><!-- imageCenter -->
						<h3 style="font-weight:normal;color:#000;" class="text-center">Muhammad Haris Ola</h3>
						<div class="timeShow OUT text-center">Time OUT : 04:00 PM</div>
					</div>
				</div><!-- tapArea -->
				<div class="allocationArea" style="display: none;">
					<ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#staffInterim" data-toggle="tab"> Staff </a>
                        </li>
                        <li>
                            <a href="#studentInterim" data-toggle="tab"> Student </a>
                        </li>
                        <li>
                            <a href="#parentCard" data-toggle="tab"> Parent </a>
                        </li>
                        <li>
                            <a href="#vendorCard" data-toggle="tab"> Vendor </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="staffInterim">
                        	<div class="issueInterim">
                        		<div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1">Staff</span>
                                    <input type="text" class="form-control" placeholder="Name, GT-ID or Name Code" aria-describedby="sizing-addon1"> 
                                </div>
                        	</div><!-- issueInterim -->
                        	<hr />
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="StaffList">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;"> GT ID </th>
                                        <th style="vertical-align: middle;"> Staff Name </th>
                                        <th style="vertical-align: middle;" class="text-center"> Name Code </th>
                                        <th style="vertical-align: middle;"> Designation<br /><small>Department </small> </th>
                                        <th style="vertical-align: middle;" class="text-center"> Interim Card # </th>
                                        <th style="vertical-align: middle;"> Date<br /><small>Time</small> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td style="vertical-align: middle;"> 06-004 </td>
                                        <td style="vertical-align: middle;"> Maliha Rafi </td>
                                        <td style="vertical-align: middle;" class="text-center"> MLR </td>
                                        <td style="vertical-align: middle;"> SH, English<br /><small>Senior Section</small> </td>
                                        <td style="vertical-align: middle;" class="text-center"> 264 </td>
                                        <td style="vertical-align: middle;"> Feb 19, 2019<br /><small> 07:28 AM</small> </td>
                                    </tr>
                                    <tr class="odd">
                                        <td style="vertical-align: middle;"> 14-014 </td>
                                        <td style="vertical-align: middle;"> Sumaira Hassan </td>
                                        <td style="vertical-align: middle;" class="text-center"> SMH </td>
                                        <td style="vertical-align: middle;"> Faculty Member<br /><small>Middle Section</small></td>
                                        <td style="vertical-align: middle;" class="text-center"> 112 </td>
                                        <td style="vertical-align: middle;"> Feb 19, 2019<br /><small> 07:25 AM</small> </td>
                                    </tr>
                                    <tr class="odd">
                                        <td style="vertical-align: middle;"> 18-054 </td>
                                        <td style="vertical-align: middle;"> Jarreer Anas </td>
                                        <td style="vertical-align: middle;" class="text-center"> JRS </td>
                                        <td style="vertical-align: middle;"> Faculty Member<br /><small>Education Technologies</small></td>
                                        <td style="vertical-align: middle;" class="text-center"> 148 </td>
                                        <td style="vertical-align: middle;"> Feb 19, 2019<br /><small> 07:29 AM</small> </td>
                                    </tr>
                                    <tr class="odd">
                                        <td style="vertical-align: middle;"> 06-004 </td>
                                        <td style="vertical-align: middle;"> Maliha Rafi </td>
                                        <td style="vertical-align: middle;" class="text-center"> MLR </td>
                                        <td style="vertical-align: middle;"> SH, English<br /><small>Senior Section</small></td>
                                        <td style="vertical-align: middle;" class="text-center"> 264 </td>
                                        <td style="vertical-align: middle;"> Feb 19, 2019<br /><small> 07:28 AM</small> </td>
                                    </tr>
                                    <tr class="odd">
                                        <td style="vertical-align: middle;"> 06-004 </td>
                                        <td style="vertical-align: middle;"> Maliha Rafi </td>
                                        <td style="vertical-align: middle;" class="text-center"> MLR </td>
                                        <td style="vertical-align: middle;"> SH, English<br /><small>Senior Section</small></td>
                                        <td style="vertical-align: middle;" class="text-center"> 264 </td>
                                        <td style="vertical-align: middle;"> Feb 19, 2019<br /><small> 07:28 AM</small> </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="studentInterim">
                            <p> Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                                craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar
                                helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art
                                party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park. </p>
                        </div>
                        <div class="tab-pane fade" id="parentCard">
                            <p> Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone
                                skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel
                                fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr. </p>
                        </div>
                        <div class="tab-pane fade" id="vendorCard">
                            <p> Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore
                                wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats
                                keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan. </p>
                        </div>
                    </div>
				</div><!-- allocationArea -->
            </div><!-- -->
        </div><!-- .portlet -->
	</div><!-- col-md-3 -->
	<div class="col-md-3">

	</div><!-- col-md-3 -->
</div><!-- row -->

<script type="text/javascript">
$(document).ready(function(){
	$("#dayPass").click(function(){
		$(".tapArea").toggle();
		$(".allocationArea").toggle();
		$("#dayPass").toggle();
		$("#backtoTap").toggle();
	});
	$("#backtoTap").click(function(){
		$(".tapArea").toggle();
		$(".allocationArea").toggle();
		$("#dayPass").toggle();
		$("#backtoTap").toggle();
	});
	//$('#interimToday').DataTable();
});


loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
            loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){ 
                  loadScript("{{ URL::to('metronic') }}/global/plugins/bootbox/bootbox.min.js", function(){ 
                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("{{ URL::to('metronic') }}/layouts/layout/scripts/demo.min.js", function(){
								loadScript("{{ URL::to('metronic') }}/global/plugins/select2/js/select2.full.min.js", function(){
                                	loadScript("{{ URL::to('metronic') }}/pages/scripts/components-select2.min.js", function(){
                                		loadScript("{{ URL::to('') }}/js/jquery.filtertable.min.js", function(){
											loadScript("{{ URL::to('metronic') }}/pages/scripts/datatable-expand.js", function(){
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
});
	
</script>