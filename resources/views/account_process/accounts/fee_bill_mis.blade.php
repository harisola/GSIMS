
 <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">


        <div class="portlet-title">
            <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-blue">
                            <i class="fa fa-gift font-blue"></i>
                            <span class="caption-subject bold uppercase"> Generate MIS </span>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <div class="form-body">
                            <h4> Select MIS Type </h4>

                            <select class="btn btn-default btn-circle" data-width="10%" id="MisType">
                                <option value=""> [ Select ] </option>
                                <option value="1"> Regular Fee Bill MIS </option>
                                <option value="2"> Admission MIS </option>
                            </select>


                            
                                
                            
                                <select class="btn btn-default btn-circle" data-width="10%" id="Billcycleno" style="display:none;">
                                    <option value=""> [ Select Bill Cycle No ] </option>
                                    @for( $a=1; $a < 9; $a++ ): 
                                        <option value="{!! $a !!} "> Bill cycle {!! $a !!}</option>
                                    @endfor; 
                                    
                                </select>
                            
                            
                        </div>



                    </div>
            </div>
        </div>



         <!-- Begin: Demo Datatable 1 -->
         <div class="portlet light portlet-fit portlet-datatable bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject font-dark sbold uppercase">Ajax Datatable</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm active">
                                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                    <i class="fa fa-share"></i>
                                                    <span class="hidden-xs"> Tools </span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;"> Export to Excel </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Export to CSV </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"> Export to XML </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;"> Print Invoices </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <!--div class="table-container">
                                            <div class="table-actions-wrapper">
                                                <span> </span>
                                                <select class="table-group-action-input form-control input-inline input-small input-sm">
                                                    <option value="">Select...</option>
                                                    <option value="Cancel">Cancel</option>
                                                    <option value="Cancel">Hold</option>
                                                    <option value="Cancel">On Hold</option>
                                                    <option value="Close">Close</option>
                                                </select>
                                                <button class="btn btn-sm green table-group-action-submit">
                                                    <i class="fa fa-check"></i> Submit</button>
                                            </div-->
                                            <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                                                <thead>
                                                    <tr role="row" class="heading">
                                                        <th width="2%">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                                <span></span>
                                                            </label>
                                                        </th>
                                                        <th width="5%"> Record&nbsp;# </th>
                                                        <th width="15%"> Date </th>
                                                        <th width="200"> Customer </th>
                                                        <th width="10%"> Ship&nbsp;To </th>
                                                        <th width="10%"> Price </th>
                                                        <th width="10%"> Amount </th>
                                                        <th width="10%"> Status </th>
                                                        <th width="10%"> Actions </th>
                                                    </tr>
                                                    <!--tr role="row" class="filter">
                                                        <td> </td>
                                                        <td>
                                                            <input type="text" class="form-control form-filter input-sm" name="order_id"> </td>
                                                        <td>
                                                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                                                <input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="From">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-sm default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                                                <input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-sm default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control form-filter input-sm" name="order_customer_name"> </td>
                                                        <td>
                                                            <input type="text" class="form-control form-filter input-sm" name="order_ship_to"> </td>
                                                        <td>
                                                            <div class="margin-bottom-5">
                                                                <input type="text" class="form-control form-filter input-sm" name="order_price_from" placeholder="From" /> </div>
                                                            <input type="text" class="form-control form-filter input-sm" name="order_price_to" placeholder="To" /> </td>
                                                        <td>
                                                            <div class="margin-bottom-5">
                                                                <input type="text" class="form-control form-filter input-sm margin-bottom-5 clearfix" name="order_quantity_from" placeholder="From" /> </div>
                                                            <input type="text" class="form-control form-filter input-sm" name="order_quantity_to" placeholder="To" /> </td>
                                                        <td>
                                                            <select name="order_status" class="form-control form-filter input-sm">
                                                                <option value="">Select...</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="closed">Closed</option>
                                                                <option value="hold">On Hold</option>
                                                                <option value="fraud">Fraud</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="margin-bottom-5">
                                                                <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                                    <i class="fa fa-search"></i> Search</button>
                                                            </div>
                                                            <button class="btn btn-sm red btn-outline filter-cancel">
                                                                <i class="fa fa-times"></i> Reset</button>
                                                        </td>
                                                    </tr -->
                                                </thead>
                                                <tbody> </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: Demo Datatable 1 -->

 

    </div>
</div>

<script type="text/javascript">

 

var pagefunction = function() {

Demo.init();
App.init();
var grid = new Datatable();







grid.init({
            src: $("#datatable_ajax"),
            onSuccess: function (grid, response) {
                // grid:        grid object
                // response:    json object of server side ajax response
                // execute some code after table records loaded
            },
            onError: function (grid) {
                // execute some code on network or other general error  
            },
            onDataLoad: function(grid) {
                // execute some code on ajax data load
            },
            loadingMessage: 'Loading...',
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
                // So when dropdowns used the scrollable div should be removed. 
                //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
                
                // save datatable state(pagination, sort, etc) in cookie.
                "bStateSave": true, 

                 // save custom filters to the state
                "fnStateSaveParams":    function ( oSettings, sValue ) {
                    $("#datatable_ajax tr.filter .form-control").each(function() {
                        sValue[$(this).attr('name')] = $(this).val();
                    });
                   
                    return sValue;
                },

                // read the custom filters from saved state and populate the filter inputs
                "fnStateLoadParams" : function ( oSettings, oData ) {
                    //Load custom filters
                    $("#datatable_ajax tr.filter .form-control").each(function() {
                        var element = $(this);
                        if (oData[element.attr('name')]) {
                            element.val( oData[element.attr('name')] );
                        }
                    });
                    
                    return true;
                },

                "lengthMenu": [
                    [10, 20, 50, 100, 150, -1],
                    [10, 20, 50, 100, 150, "All"] // change per page values here
                ],
                "pageLength": 50, // default record count per page
                "ajax": {
                    "url": "{{url('/table_ajax_fee_bill')}}", // ajax source 
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"}

                },
                "ordering": false,
        //         dom: 'Bfrtip',
        // buttons: [
        //     'copyHtml5',
        //     'excelHtml5',
        //     'csvHtml5',
        //     'pdfHtml5'
        // ],

                "order": [
                    [1, "asc"]
                ]// set first column as a default sort by asc
            }
        });

        // handle group actionsubmit button click
        grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
            e.preventDefault();
            var action = $(".table-group-action-input", grid.getTableWrapper());
            if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
                grid.setAjaxParam("customActionType", "group_action");
                grid.setAjaxParam("customActionName", action.val());
                grid.setAjaxParam("id", grid.getSelectedRows());
                grid.getDataTable().ajax.reload();
                grid.clearAjaxParams();
            } else if (action.val() == "") {
                App.alert({
                    type: 'danger',
                    icon: 'warning',
                    message: 'Please select an action',
                    container: grid.getTableWrapper(),
                    place: 'prepend'
                });
            } else if (grid.getSelectedRowsCount() === 0) {
                App.alert({
                    type: 'danger',
                    icon: 'warning',
                    message: 'No record selected',
                    container: grid.getTableWrapper(),
                    place: 'prepend'
                });
            }
        });



















$(document).on("change", "#MisType", function(){

    if( $(this).val() != ''  )
    {
        if( $(this).val() == 1 )
        {
            $("#Billcycleno").show("show");
        }else 
        {
            $("#Billcycleno").hide("slow");
        }
        //Tap_Event_Ajax( $(this).val() ); 
    }else 
    {
        $("#Billcycleno").hide("slow");
    }


});


$(document).on("input", "#Tap_Event_II", function(){

if( $(this).val().length > 9 )
{
console.log( $(this).val());
$(this).val('');
$(this).focus();
}


});


var Tap_Event_Ajax = function (Tap_value)
{




App.startPageLoading();




$.ajax({
type:"POST",
cache:true,
url:"{{url('/calendar_test_II')}}",
data:{
Tap_value:Tap_value,
"_token": "{{ csrf_token() }}",
},
success:function(result){

console.log( result );

},

complete: function() {
App.stopPageLoading();
}


});





};





};






 





var pagedestroy = function(){ };

loadScript("{{ URL::to('metronic') }}/global/scripts/datatable.js", function(){
    loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/datatables.min.js", function(){
        loadScript("{{ URL::to('metronic') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js", function(){
        loadScript("{{ URL::to('metronic') }}/pages/scripts/profile.js", function(){

            loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.js", function(){
                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-managed.min.js", function(){

                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery.sparkline.min.js", function(){
                        loadScript("{{ URL::to('metronic') }}/global/plugins/jqvmap/jqvmap/jquery.vmap.js", function(){
                            loadScript("{{ URL::to('metronic') }}/global/plugins/bootstrap-toastr/toastr.min.js", function(){	

                                loadScript("{{ URL::to('metronic') }}/global/plugins/jquery-validation/js/jquery.validate.min.js", function(){
                                    loadScript("{{ URL::to('metronic') }}/global/plugins/jquery-validation/js/additional-methods.min.js", function(){

                                        loadScript("{{ URL::to('metronic') }}/global/plugins/select2/js/select2.full.min.js", function(){
                                            loadScript("{{ URL::to('metronic') }}/pages/scripts/components-select2.min.js", function(){
                                                loadScript("{{ URL::to('metronic') }}/pages/scripts/table-datatables-ajax.min.js", function(){
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
});
</script>

