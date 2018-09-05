


    <div class="col-md-3 borderRightDashed">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered fixed-height marginBottom0 padding0 fixed-height-NoScroll">
            
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Fee Bill Session</span>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <!-- <input type="radio" name="options" class="toggle" id="profileDefinationAdd">Add New Profile</label> -->
                            <button class="tooltips btn btn-transparent dark btn-outline btn-circle btn-sm" data-placement="bottom" data-original-title="Add new Session" id="profileDefinationAdd">Add Session</button>
                    </div>
                </div>
            </div>
            
            <div class="portlet-body customPadding">
                <div class="inputs">
                    <div class="portlet-input">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input id="staffView_StaffList_Search" type="text" class="form-control form-control-solid" placeholder="Search..."> </div>
                    </div>
                    <div class="theme-panel hidden-xs hidden-sm">
                        <div class="toggler2"> </div>
                        <div class="toggler2-close"> </div>
                        <div class="theme-options2">
                            <div class="theme-option">
                                <span> By Name </span>
                                <select id="StaffView_Sort_Name" class="layout-option form-control input-sm">
                                   <option value="A to Z">Ascending order (A to Z)</option>
                                   <option value="Z to A">Descending order (Z to A)</option>
                                </select>
                            </div>

                            <div class="theme-option text-center" id="staffView_search_btn">
                                <a href="javascript:;" class="btn uppercase green-jungle applySort">Apply Sorters</a>
                                <a href="javascript:;" class="btn uppercase grey-salsa clearSearch">Clear Sorters</a>
                            </div>
                            
                        </div><!-- theme-options -->
                    </div>
                    <!-- updated sorter -->



                    
                </div><!-- inputs -->

                <div id="Academic_Session_List">
                    <?php echo $ASlist; ?> 
                </div>

            </div><!-- portlet-body -->
        </div><!-- portlet -->
    </div><!-- col-md-4 -->
    <style type="text/css">
    	.shortField {
    		width: 80px;
    	}
    	#FeeStructure tbody tr td:first-child {
    		background: #e0e0e0;
    	}
    	#FeeStructure.table-bordered>thead>tr>th {
		    background: #888;
		    color: #fff;
		}
    </style>
    
