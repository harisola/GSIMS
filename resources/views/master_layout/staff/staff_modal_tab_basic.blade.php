                               <!-- zk tab_basic_edit Start -->
                                <div class="tab-pane active" id="tab_basic_edit">
                                  <form id="basic_form">
                                   <div class="form-body">
                                      <h3 class="form-section marginTop0 headingBorderBottom">Person Info</h3>
                                      <div class="row ">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Employee ID:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" value="{{ $personalInfo[0]->staff_id }}" id="employe_id" disabled="" >
                                               </div>
                                               <input type="hidden" id="staff_id" value="{{ $personalInfo[0]->staff_id }}" />
                                               <input type="hidden" id="staff_status" value="{{ $personalInfo[0]->staff_status_name }}" />
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">GT ID:</label>
                                               <div class="col-md-9">
                                                  <input type="text"  class="form-control" placeholder="" value="{{ $personalInfo[0]->gt_id }}" id="staffGTID" disabled="">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                    
                                      <hr />
                                      <div class="row marginBottom20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Staff Title:</label>
                                               <div class="col-md-9">
                                                  <select class="form-control" id="staf_title" >
                                                    <option <?php if ($personalInfo[0]->staff_title == "Mr" ) echo 'selected' ; ?> value="1">Mr</option>
                                                    <option <?php if ($personalInfo[0]->staff_title == "Ms" ) echo 'selected' ; ?> value="2">Ms</option>
                                                    <option <?php if ($personalInfo[0]->staff_title == "Mrs" ) echo 'selected' ; ?> value="3">Mrs</option>
                                                    <option <?php if ($personalInfo[0]->staff_title == "Dr" ) echo 'selected' ; ?> value="4">Dr</option>
                                                  </select>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                       
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Gender:</label>
                                               <div class="col-md-9">
                                                  <select class="form-control" id="gender_select" >
                                                    <option <?php if ($personalInfo[0]->gender == "M" ) echo 'selected' ; ?> value="M">Male</option>
                                                    <option <?php if ($personalInfo[0]->gender == "F" ) echo 'selected' ; ?> value="F">Female</option>
                                                  <select>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">CNIC Name:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control item" placeholder="CNIC Full Name" id="cnic_fullnum" value="{{ $personalInfo[0]->name }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Full Name:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="Full Name" id="full_num" maxlength="18" value="{{ $personalInfo[0]->name }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Nationality:</label>
                                               <div class="col-md-9">
                                                    <select class="form-control" id="nationality_txt" placeholder=" Select Nationality">
                                                          <option value="{{ $personalInfo[0]->nationality }}">{{ $personalInfo[0]->nationality }}</option>
                                                          <option value="AFG" <?php if ($personalInfo[0]->nationality == "AFG" ) echo 'selected' ; ?> >Afghanistan</option>
                                                          <option value="AUS" <?php if ($personalInfo[0]->nationality == "AUS" ) echo 'selected' ; ?> >Australia</option>
                                                          <option value="CAN" <?php if ($personalInfo[0]->nationality == "CAN" ) echo 'selected' ; ?> >Canada</option>
                                                          <option value="PAK" <?php if ($personalInfo[0]->nationality == "PAK" ) echo 'selected' ; ?> > Pakistan</option>
                                                          <option value="SAU" <?php if ($personalInfo[0]->nationality == "SAU" ) echo 'selected' ; ?> >Saudi Arabia</option>
                                                          <option value="UAE" <?php if ($personalInfo[0]->nationality == "UAE" ) echo 'selected' ; ?> >United Arab Emirates</option>
                                                          <option value="GBR" <?php if ($personalInfo[0]->nationality == "GBR" ) echo 'selected' ; ?> >United Kingdom</option>
                                                          <option value="USA" <?php if ($personalInfo[0]->nationality == "USA" ) echo 'selected' ; ?> >United States</option>
                                                          <option value="OTHER" <?php if ($personalInfo[0]->nationality == "OTHER" ) echo 'selected' ; ?> > Other </option>
                                                    </select>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Religion:</label>
                                               <div class="col-md-9">
                                                  <select class="form-control" id="religion_txt" >
                                                    <option value="Muslim" <?php if ($personalInfo[0]->religion == "Muslim" ) echo 'selected' ; ?> >Muslim</option>
                                                    <option value="Non-Muslim" <?php if ($personalInfo[0]->religion == "Non-Muslim" ) echo 'selected' ; ?> >Non-Muslim</option>
                                                  </select>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Name Code:</label>
                                               <div class="col-md-9">
                                                  <!-- NIC masking: XXX -->
                                                  <input type="text" class="form-control" placeholder="Name Code" minlength="3" maxlength="3" id="namecode_txt" value="{{ $personalInfo[0]->name_code }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">DOB <small>(as per NIC)</small>:</label>
                                               <div class="col-md-9">
                                                <?php $Dateofb = (($personalInfo[0]->dob)); ?>
<input type="date" class="form-control" id="dob_date" value="<?=$Dateofb;?>" />
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>

                                      <!--/row-->
                                      <!-- <hr /> -->
                                      <!-- <div class="row"> -->
                                         <!-- <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Father Name:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="Please Father Name" id="father_name_txt" >
                                               </div>
                                            </div>
                                         </div> -->
                                         <!--/span-->
                                         <!-- <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Staff Status:</label>
                                               <div class="col-md-9">
                                                  <select class="form-control" id="staff_status_txt">
                                                     <option value="1">Married</option>
                                                     <option value="2">Single</option>
                                                     <option value="3">Divorced</option>
                                                     <option value="4">Widow</option>
                                                  </select>
                                               </div>
                                            </div>
                                         </div> -->
                                         <!--/span-->
                                      <!-- </div> -->
                                      <!--/row-->
                                      <hr />
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">CNIC:</label>
                                               <div class="col-md-9">
                                                  <!-- NIC masking: XXXXX-XXXXXXX-X -->
                                                  <input type="text" class="form-control" placeholder="CNIC" id="cnic_txt" value="{{ $personalInfo[0]->nic }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Email <small>(personal)</small>:</label>
                                               <div class="col-md-9">
                                                  <input type="email"  class="form-control" placeholder="Email(Personal)" id="email_txt" name="email_txt" value="{{ $personalInfo[0]->emailpersonal }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Mobile Phone:</label>
                                               <div class="col-md-9">
                                                  <!-- Mobile phone   Masking: XXXX-XXXXXXX -->
                                                     <input type="phone" class="form-control " placeholder="" id="phonenum_txt" value="{{ $personalInfo[0]->mobile_phone }}" Required>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Landline:</label>
                                               <div class="col-md-9">
                                                  <!-- Mobile phone Masking: XXX-XXXXXXX -->
                                                    <input type="phone" class="form-control" placeholder="" id="landline_txt" value="{{ $personalInfo[0]->land_line }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <hr />
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Date of Joining:</label>
                                               <div class="col-md-9">
                                                  <input type="date" class="form-control" placeholder="" id="doj_date" value="{{ $personalInfo[0]->doj }}" disabled>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Employment Status:</label>
                                               <div class="col-md-9">
                                                 <!--  stop work here -->
                                                    <select class="form-control" id="emp_status_txt">
                                                            <option value="Permanent" <?php if ($personalInfo[0]->staff_status_name == "Permanent" ) echo 'selected' ; ?> >Permanent</option>
                                                            <option value="Contractual" <?php if ($personalInfo[0]->staff_status_name == "Contractual" ) echo 'selected' ; ?> >Contractual</option>
                                                            <option value="Family" <?php if ($personalInfo[0]->staff_status_name == "Family" ) echo 'selected' ; ?> >Family</option>
                                                            <option value="Probation" <?php if ($personalInfo[0]->staff_status_name == "Probation" ) echo 'selected' ; ?> >Probation</option>
                                                            <option value="Internship" <?php if ($personalInfo[0]->staff_status_name == "Internship" ) echo 'selected' ; ?> >Internship</option>
                                                            <option value="Substitute" <?php if ($personalInfo[0]->staff_status_name == "Substitute" ) echo 'selected' ; ?> >Substitute</option>
                                                            <option value="NonDirectStaff" <?php if ($personalInfo[0]->staff_status_name == "NonDirectStaff" ) echo 'selected' ; ?> >Non Direct Staff</option>
                                                            <option value="Resignation Notice" <?php if ($personalInfo[0]->staff_status_name == "Resignation Notice" ) echo 'selected' ; ?> >Resignation Notice</option>
                                                            <option value="Termination Notice" <?php if ($personalInfo[0]->staff_status_name == "Termination Notice" ) echo 'selected' ; ?> >Termination Notice</option>
                                                            <option value="Registration No Show" <?php if ($personalInfo[0]->staff_status_name == "Registration No Show" ) echo 'selected' ; ?> >Registration No Show</option>
                                                            <option value="Extended No Show" <?php if ($personalInfo[0]->staff_status_name == "Extended No Show" ) echo 'selected' ; ?> >Extended No Show</option>
                                                            <option value="Leave" <?php if ($personalInfo[0]->staff_status_name == "Leave" ) echo 'selected' ; ?> >Leave</option>
                                                            <option value="New Staff" <?php if ($personalInfo[0]->staff_status_name == "New Staff" ) echo 'selected' ; ?> >New Staff</option>
                                                            <option value="Re Joining" <?php if ($personalInfo[0]->staff_status_name == "Re Joining" ) echo 'selected' ; ?> >Re-Joining</option>
                                                            <option value="Resigned" <?php if ($personalInfo[0]->staff_status_name == "Resigned" ) echo 'selected' ; ?> >Resigned</option>
                                                            <option value="Terminated" <?php if ($personalInfo[0]->staff_status_name == "Terminated" ) echo 'selected' ; ?> >Terminated</option>
                                                    </select>

                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Generations Google ID:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="generation_email" value="{{ $personalInfo[0]->email }}" disabled>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Tap IN Campus:</label>
                                               <div class="col-md-9">
                                                  <select class="form-control" id="tap_in_campus" value="{{ $personalInfo[0]->campus }}">
                                                      <option value="South" <?php if ($personalInfo[0]->campus == "South" ) echo 'selected' ; ?> >South</option>
                                                      <option value="North" <?php if ($personalInfo[0]->campus == "North" ) echo 'selected' ; ?> >North</option>
                                                  </select>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row zk -->
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Marital Status:</label>
                                               <div class="col-md-9">
                                                      <select class="form-control" id="marital_status" ">
                                                          <option value="Married" <?php if ($personalInfo[0]->marital_status == "Married" ) echo 'selected' ; ?> >Married</option>
                                                          <option value="Single" <?php if ($personalInfo[0]->marital_status == "Single" ) echo 'selected' ; ?> >Single</option>
                                                          <option value="Divorced" <?php if ($personalInfo[0]->marital_status == "Divorced" ) echo 'selected' ; ?> >Divorced</option>
                                                          <option value="Widow" <?php if ($personalInfo[0]->marital_status == "Widow" ) echo 'selected' ; ?> >Widow</option>
                                                        </select>
                                               </div>
                                            </div>
                                         </div>
                                       </div>
                                       <!--/row zk -->
                                         <!--/span-->
                                      <h3 class="form-section headingBorderBottom">Address Info</h3>
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Apartment No:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="apartment_txt" value="{{ $personalInfo[0]->apartment_no }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Street Name:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="street_name_txt" value="{{ $personalInfo[0]->street_name }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row marginBottom20">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Building Name:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="building_name_txt" value="{{ $personalInfo[0]->building_name }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Plot No:</label>
                                               <div class="col-md-9">
                                                  <input type="text" class="form-control" placeholder="" id="plot_no_txt" value="{{ $personalInfo[0]->plot_no }}">
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Region:</label>
                                               <div class="col-md-9">
                                                  <!-- <input type="text" class="form-control" placeholder="" id="region_txt"> -->
                                                  <!-- Region drop down Strat -->
                                                  <!-- <input type="text" class="form-control" placeholder="" id="region_txt" value="{{ $personalInfo[0]->region }}">
 -->
                                                  <select class="form-control"  id="region_txt" >
                                                    <!-- <option  >{{ $personalInfo[0]->region }}</option> -->
                                                    
                                                  </select>
                                                  <!-- Region drop down end -->
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               <label class="control-label col-md-3 text-right paddingRight0">Sub Region:</label>
                                               <div class="col-md-9">
                                                  <!-- <input type="text" class="form-control" placeholder="" id="sub_region_txt" value="{{ $personalInfo[0]->sub_region }}"> -->
                                                  <select class="form-control"  id="sub_region_txt" >
                                        
                                                  </select>
                                               </div>
                                            </div>
                                         </div>
                                         <!--/span-->
                                      </div>
                                      <!--/row-->
                                   </div>
                                   <!-- form-body -->
                                 </form>
                                </div>
                <script type="text/javascript">
                  $(document).ready(function()
                    {
                      //$(":input").inputmask(); 
                      $("#cnic_txt").inputmask({"mask": "99999-9999999-9"});
                      $("#phonenum_txt").inputmask({"mask": "9999-9999999"});
                      $("#landline_txt").inputmask({"mask": "999-99999999"});

                      // $('#basic_form').validate({ // initialize the plugin
                      //   rules: {
                      //     email_txt: {
                      //         email: true
                      //     }
                      //     cnic_txt:{
                      //       text: true
                      //     }
                      //   }
                      // });
                    });
                </script>