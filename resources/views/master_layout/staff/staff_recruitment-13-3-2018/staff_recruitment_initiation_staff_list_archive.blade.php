<style type="text/css">
.table-scrollable, .table-scrollable.table-scrollable-borderless, .table-scrollable>.table-bordered {
  float: left;
} 
 div#new_table_length {
    display: none !important;
}
#new_table_wrapper .row div {
  width: 100% !important;
}
#new_table_wrapper .row div.col-md-7 {
  text-align: center !important;
  margin-top: 10px !important;
}
#new_table_filter label {
  width: 100% !important;
}
#new_table_filter label input[type="search"] {
    width: 100% !important;
    padding: 15px !important;
}
#new_table_processing {
  display: none !important;
}
.theme-panel>.toggler {
    right: -33px !important;
}
.theme-panel>.toggler-close {
    right: -33px !important;
}
.theme-panel>.theme-options {
    right: -33px !important;
}
</style>  
  <div class="col-md-4 borderRightDashed">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet light bordered fixed-height-NoScroll marginBottom0">
         <div class="portlet-title padding0">
            <div class="caption caption-md">
               <h3 id="staffView_StaffList_Total" class="marginTop0 marginBottom0 padding0">Archived Applicants</h3>
            </div>
         </div><!-- portlet-title -->

         <!-- portlet-title -->
         <div class="portlet-body">
            <div class="inputs">
               <?php /* <div class="portlet-input">
                  
                  <div class="input-icon right">
                     <i class="icon-magnifier"></i>
                     <input id="staffView_StaffList_Search" type="text" class="form-control form-control-solid" placeholder="Search..."> 
                  </div>
               
               
               </div>*/ ?>
               <div class="theme-panel hidden-xs hidden-sm"  style="right:33px;margin-top: 0px !important;">
                  <div class="toggler"> </div>
                  <div class="toggler-close"> </div>
                  <div class="theme-options">
                     <div class="theme-option">
                        <span> Source </span> 
                        <input type="hidden" value="0" id="after_modified_date" />
                        <select data-attribute="source" multiple="multiple" id="StaffView_Filter_Profile" class="ddlFilterTableRow page-header-option form-control input-sm multiselect">
                          <option>Online</option>
                          <option>Walkin</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span>Part B</span> 
                        <select data-attribute="partB" multiple="multiple" id="StaffView_Filter_Department" class="ddlFilterTableRow page-header-option form-control input-sm multiselect">
                          <option value="CallForPartB">Call for Part B</option>
                          <option value="CommunicatedForPartB">Communicated for Part B</option>
                          <option value="CompletedPartB">Part-B completed</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span> Position </span>
                        <select data-attribute="position" multiple="multiple" id="StaffView_Filter_Position" class="ddlFilterTableRow layout-option form-control input-sm multiselect">
                          <option>Technical</option>
                          <option>Admin</option>
                          <option>Management</option>
                          <option>Teaching</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <span> Current Standing </span>
                        <select data-attribute="standing" multiple="multiple" id="StaffView_Filter_AtdStd" class="ddlFilterTableRow layout-option form-control input-sm multiselect">
                          <!--option>Part B <span class="boxidentification ">&nbsp;</span></option -->
                          <option>File for Future</option>
                          <option>Regret</option>
                        </select>
                     </div>
                     <div class="theme-option">
                        <div class="input-group date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                            <input type="date" class="form-control" name="from" id="from_date" data-attribute="from_date">
                            <span class="input-group-addon"> to </span>
                            <input type="date" class="form-control" name="to" id="to_date" data-attribute="to_date"> 
                        </div>
                        <!-- /input-group -->
                        <span class="help-block"> Applied Date </span>
                    </div>
                    <div class="theme-option">
                        <div class="input-group date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                            <input type="date" class="form-control" name="from_m" id="from_date_m" data-attribute="from_date_m">
                            <span class="input-group-addon"> to </span>
                            <input type="date" class="form-control" name="to_m" id="to_date_m" data-attribute="to_date_m"> 
                        </div>
                        <!-- /input-group -->
                        <span class="help-block"> Modified Date </span>
                    </div>
                    <div class="theme-option text-center" id="staffView_filter_btn_Applicant">
                        <a href="javascript:;" class="btn uppercase green-jungle applyFilter_Applicant">Apply Filter</a>
                        <a href="javascript:;" class="btn uppercase grey-salsa clearFilter_Applicant">Clear Filter</a>
                    </div>
                  </div>
                  <!-- theme-options -->
               </div>
               <!-- theme-panel -->
               
            <!-- inputs -->
      
    <!--  'career_id' => string '1' (length=1)
      'gc_id' => string '18-03/000' (length=9)
      'name' => string 'Atif' (length=4)
      'email' => string 'atif.naseem22@gmail.com' (length=23)
      'mobile_phone' => string '+92-313-5521122' (length=15)
      'land_line' => string '' (length=0)
      'nic' => string '42121212121212121' (length=17)
      'gender' => string 'M' (length=1)
      'position_applied' => string 'Teaching' (length=8)
      'comments' => string 'Hello' (length=5)
      'status_id' => string '1' (length=1)
      'stage_id' => string '1' (length=1)
      'status_name' => string 'Form Screening' (length=14)
      'status_code' => string 'FS' (length=2)
      'stage_name' => string 'Allocation' (length=10)
      'stage_code' => string 'Allocation' (length=10) -->
    
    
            <div class="table-scrollable table-scrollable-borderless" id="table_data">
               <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="new_table">
                   <thead>
                       <tr>
                           <th class="all">Form #</th>
                           <th class="all">Name</th>
                           <th class="all">Position</th>
                           <th class="none">Mobile: </th>
                           <th class="none">Landline: </th>
                           <th class="none">CNIC: </th>
                           <th class="none">Standing: </th>
                           <th class="none">Apply Date:</th>
                           <th class="none">Source: </th>
                           <th class="none">Comments: </th>
                           <th class="none">Modified Date:</th>
                            <th class="all">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   </tbody>
                </table>
            </div><!-- table_data -->
        <!--------------------------->
              
            <!-- table-scrollable-borderless -->
         </div>
         <!-- portlet-body -->
      </div>
      <!-- portlet -->
   </div>
   <!-- col-md-4 -->
</div>