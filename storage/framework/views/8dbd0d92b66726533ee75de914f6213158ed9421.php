<div class="modal fade" id="AddAIAE" tabindex="-1" role="basic" aria-hidden="true">
    <input type="hidden" name="Edit_Absentia_id_hidden" id="Edit_Absentia_id_hidden" value="0" />
    <input type="hidden" name="Edit_Absentia_id_staff_id_hidden" id="Edit_Absentia_id_staff_id_hidden" value="0" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 class="modal-title">Edit Absentia</h3>
            </div>
            <div class="modal-body" style="float:left;width:100%;">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i><font id="selected_individuals">Attendance in Absentia form</font>
                        </div>
                    </div>
                    <!-- portlet-title -->
                    <div class="headRightDetailsInner">
                        <table class="absentia_staff_view">
                            <tbody>
                                <tr id="">
                                    <td class="" style="padding-right:10px;">
                                        <img class="user-pic rounded absentia_staff_img tooltips" data-container="body" data-placement="top" data-original-title="12-045" src="" width="42">
                                    </td>
                                    <td class="staffView_StaffName">
                                        <a href="javascript:;" class="primary-link tooltips absentia_staff_name" data-container="body" data-placement="top" data-original-title="AHK" data-staffid="289" data-staffgtid="12-045"></a> - <small class="absentia_name_code tooltips" data-container="body" data-placement="top" data-original-title="" ></small><br><small class="shortHeight"><span class="absentia_bottom_line tooltips" data-container="body" data-placement="top" data-original-title="Manager, Operations"></span></small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- col-md-4 -->
                    </div>
                    <div class="portlet-body fixedHeightmodalPortlet">
                        <div class="form-body" id="Absenia_Contents"> </div>
                        <!-- form-body -->
                    </div>
                    <!-- portlet-body fixedHeightmodalPortlet-->
                </div>
            </div>
            <div class="modal-footer text-center" style="text-align:center;">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                <button onclick="addAbsentiaE()" type="button" class="btn dark btn-outline active" data-dismiss="">Update</button>
                <!--button type="button" class="btn green">Add Badge</button -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>