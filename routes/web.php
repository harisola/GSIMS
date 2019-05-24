<?php
/******************************************************************
* Author : Atif Naseem
* Email : atif.naseem22@gmail.com
* Cell : +92-313-5521122
*******************************************************************/
define("STAFF_PIC_150", "assets/photos/hcm/150x150/staff/");
define("STAFF_PIC_500", "assets/photos/hcm/500x500/staff/");
define("STAFF_PIC150_TYPE", ".png");
define("STAFF_PIC500_TYPE", ".jpg");

define("STUDENT_PIC_150", "assets/photos/sis/150x150/student/");
define("STUDENT_PIC_500", "assets/photos/sis/500x500/student/");
define("FATHER_PIC_150", "assets/photos/sis/150x150/father/");
define("FATHER_PIC_500", "assets/photos/sis/500x500/father/");
define("MOTHER_PIC_150", "assets/photos/sis/150x150/mother/");
define("MOTHER_PIC_500", "assets/photos/sis/500x500/mother/");
define("PIC150_TYPE", ".png");
define("PIC500_TYPE", ".jpg");

define("WHERE_ACDSES_From", "11");
define("WHERE_ACDSES_To", "12");
define("WHERE_ACDSES", "academic_session_id = 11 or academic_session_id = 12");
/******************************************* Global Variables *****/
/******************************************************************/





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
    // $exitCode = Artisan::call('view:clear');

});
/************************************** Login - Dashboard - Profile - Logout *****/
/*********************************************************************************/
Route::get('/login', 'LoginController@login');
Route::post('login', 'LoginController@postLogin');
//ar
Route::post('log_user', 'LoginController@log_user');

Route::post('/logout', 'LoginController@logout');
Route::get('/logout_x', 'LoginController@logout');
Route::post('/changePassword', 'LoginController@changePassword');

Route::get('/login/google', 'LoginController@redirectToProvider');
Route::get('/login/google/callback', 'LoginController@handleProviderCallback');

//Route::get('/register', 'RegistrationController@register');
//Route::post('/register', 'RegistrationController@postRegister');

Route::group(['middleware' => 'authenticated'], function () {
	Route::get('/', 'DashboardController@dashboard');
	Route::get('/user_profile', 'UserProfileController@userProfile');
	Route::get('/calendar_events', function() {
		return '<iframe src="http://10.10.10.63/gs/index.php/master_calendar/master_calendar2" frameborder="0" style="overflow:hidden; overflow-x:hidden; overflow-y:hidden; height:100%; width:95%; position:absolute; top:0px; left:64px; right:0px; bottom:0px"></iframe>';
	});
	
	Route::get('/dashboard', 'DashboardController@user_dashboard');
	//Route::get('/dashboard', 'Development\TTProfileController@ttprofile_definition');
	Route::get('/etab_subject_report', function () {
	    return view('reports/etab/subject_report/etab_subject_report');
	});

	Route::post('/userProfileController/getOtherAdjustment','userProfileController@getOtherAdjustment');
});	
/*********************************************************************************/

/*************************************************************** Development *****/
/*********************************************************************************/
Route::group(['middleware' => 'authenticated'], function () {
	//zk edit add route Start
	Route::get('/ateeb_rec_modal', 'Development\Haris@AteebRecModal'); 
	Route::get('/update_staff', 'Development\Haris@Update_Staff');
	Route::get('/masterLayout/staff/add_row', 'Development\Haris@AddRow');
	
	Route::get('/screening_gate', 'Attendance\Staff\ScreeningGate@mainPage');
	Route::get('/staff_interim_card', 'Attendance\Staff\ScreeningGate@Staff_Interim_Card'); 

	Route::get('/tap_in_interim', 'Attendance\Staff\ScreeningGate@Tap_In_Interim');
	Route::post('/tap_in_staff', 'Attendance\Staff\ScreeningGate@Tap_In_Staff');

	Route::post('/fetch_familylist_autocomplete', 'Attendance\Staff\ScreeningGate@FetchFamilyListAutoComplete');
	Route::post('/fetch_autocomplete', 'Attendance\Staff\ScreeningGate@fetch_autocomplete');
	Route::get('/get_fetch_staff_pix', 'Attendance\Staff\ScreeningGate@Get_Fetch_Staff_Pix');
	Route::get('/student_parent_daypass_info', 'Attendance\Staff\ScreeningGate@StudentParentDaypassInfo');
	Route::get('/family_parent_info', 'Attendance\Staff\ScreeningGate@FamilyParentInfo');

	Route::get('/interim_table_list', 'Attendance\Staff\ScreeningGate@Staff_interim_table_list');
	Route::get('/interim_parent_table_list', 'Attendance\Staff\ScreeningGate@Parent_interim_table_list');
	Route::get('/interim_visitor_table_list', 'Attendance\Staff\ScreeningGate@Visitor_interim_table_list');

	Route::get('/parent_save_data', 'Attendance\Staff\ScreeningGate@ParentSaveData');
	Route::get('/tap_parent_save_data', 'Attendance\Staff\ScreeningGate@TapParentSaveData');
	Route::get('/admission_save_data', 'Attendance\Staff\ScreeningGate@AdmissionSaveData');
	Route::get('/tap_visitor_save_data', 'Attendance\Staff\ScreeningGate@TapVisitorSaveData');
	Route::get('/applicant_save_data', 'Attendance\Staff\ScreeningGate@ApplicantSaveData');
	Route::get('/vendor_save_data', 'Attendance\Staff\ScreeningGate@VendorSaveData');
	Route::get('/worker_save_data', 'Attendance\Staff\ScreeningGate@WorkerSaveData');
	Route::get('/guest_save_data', 'Attendance\Staff\ScreeningGate@GuestSaveData');

	Route::get('/reports', 'Attendance\Reports\Reports@mainPage');
	Route::post('/reporst_staff_attendance', 'Attendance\Reports\Reports@reporst_staff_attendance');
	Route::post('/Create_Dw', 'Attendance\Reports\Reports@Create_Dw');

	
	//zk added end route
	Route::get('/masterLayoutStaff', 'Development\Haris@development');
	//Start Arif Khan Add Routes for VEHICLE 
	Route::get('/VehicleReport', 'Attendance\Vehicle\VehicleReport@mainPage');
	Route::get('/VehicleReports', 'Attendance\Vehicle\VehicleReport@Get_Filter');
	//End Arif Khan VEHICLE  Routes
	Route::get('/staff_layout_team', 'Development\Haris@development_UserTeam');
	//Route::get('/student_layout', 'Development\StdMasterLayout@development');
	Route::get('/student_layout', 'Student_Information\Master_Page\Grade@Students');
	Route::get('/student_layout_classgroup', 'Student_Information\Master_Page\Grade@Students_SubjectTeacher');
	
	Route::post('/masterLayout/staff/getStaffInfo', 'Development\Haris@getStaffInfo');
	Route::post('/masterLayout/staff/getStaff_tifA', 'Development\Haris@getStaff_tifA');
	Route::get('/masterLayout/staff/getStaff_tifA', 'Development\Haris@getStaff_tifA');
	Route::post('/masterLayout/staff/getStaff_tifB', 'Development\Haris@getStaff_tifB');
	Route::post('/masterLayout/staff/addAbsentia', 'Development\Haris@addAbsentia');
	Route::post('/masterLayout/staff/get_cut_date', 'Development\Haris@get_cut_date');
	
	
	
	
	
	// 2017-11-20 Kashif Solangi
	Route::post('/masterLayout/staff/Edit_Get_Absentia', 'Development\Edit_delete_management_controller@Edit_Get_Absentia');
	Route::post('/masterLayout/staff/editAbsentia', 'Development\Edit_delete_management_controller@editAbsentia');
	Route::post('/masterLayout/staff/deleteAbsentia', 'Development\Edit_delete_management_controller@deleteAbsentia');
	
	
	Route::post('/masterLayout/staff/ReWriteLeave', 'Development\Edit_delete_management_controller@Get_LeaveApp');
	Route::post('/masterLayout/staff/RWriteLeave', 'Development\Edit_delete_management_controller@Edit_LeaveApp');
	Route::post('/masterLayout/staff/deleteLeaveApp', 'Development\Edit_delete_management_controller@deleteLeaveApp');
	
	
	
	Route::post('/masterLayout/staff/editPenalties', 'Development\Edit_delete_management_controller@editPenalties');
	Route::post('/masterLayout/staff/OverRightPenalties', 'Development\Edit_delete_management_controller@OverRightPenalties');
	
	Route::post('/masterLayout/staff/deletePenalties', 'Development\Edit_delete_management_controller@deletePenalties');

	
	
	
	
	Route::post('/masterLayout/staff/editAdjustment', 'Development\Edit_delete_management_controller@editAdjustment');
	Route::post('/masterLayout/staff/OverRightAdjustment', 'Development\Edit_delete_management_controller@OverRightAdjustment');
	Route::post('/masterLayout/staff/deleteAdjustment ', 'Development\Edit_delete_management_controller@deleteAdjustment');
	
	

	Route::post('/masterLayout/staff/editAddManual', 'Development\Edit_delete_management_controller@editAddManual');
	Route::post('/masterLayout/staff/OverRightAddManual', 'Development\Edit_delete_management_controller@OverRightAddManual');
	Route::post('/masterLayout/staff/deleteAddManual ', 'Development\Edit_delete_management_controller@deleteAddManual');

	Route::get('/masterLayout/staff/check_form_existance ', 'Development\Haris@deleteAddManual');

Route::get('/check_hr_form_number_existance', 'Development\Haris@checkFormNumberExistance');



	
	Route::post('/masterLayout/staff/role_distance', 'Development\Staff_role_position_distance@Layout_html');
	
	Route::post('/masterLayout/staff/role_distance2', 'Development\Staff_role_position_distance@Layout_html2');
	
	// End 2017-11-20 Kashif Solangi
	
	
	Route::post('/masterLayout/staff/addManual','Development\Haris@addManual');
	
	Route::get('/ttprofile_allocation', 'Development\TTProfileController@ttProfile_allocation');

	Route::post('/ttprofile_allocation/ttProfile_update', 'Development\TTProfileController@ttProfile_update');
	Route::post('/ttprofile_allocation/ttCustomProfile_update', 'Development\TTProfileController@ttCustomProfile_update');	
	Route::post('/ttprofile_allocation/ttProfileTimeStaff_get', 'Development\TTProfileController@ttProfileTimeStaff_get');
	Route::post('/ttprofile_allocation/ttProfileTime_get', 'Development\TTProfileController@ttProfileTime_get');

	Route::get('/ttprofile_definition', 'Development\TTProfileController@ttprofile_definition');
	Route::post('/ttprofile_definition', 'Development\TTProfileController@ttprofile_definition');
	
	// Insert Profile
	Route::post('/profileDefination/staffProfileAllocated','Development\TTProfileController@staffProfileAllocated');
	Route::post('/profileDefination/insertProfile','Development\TTProfileController@insertTtProfile');
	Route::post('/profileDefination/insertStandardProfile','Development\TTProfileController@insertStandardProfile');
	Route::post('/profileDefination/insertCustomProfile','Development\TTProfileController@insertCustomProfile');
	Route::post('/profileDefination/insertPartTimerProfile','Development\TTProfileController@insertPartTimerProfile');
	Route::post('/profileDefination/profile_description','Development\TTProfileController@profile_description');

	// Update Profile
	Route::post('/profileDefination/updateProfile','Development\TTProfileController@updateProfile');
	Route::post('/profileDefination/updateStandardProfile','Development\TTProfileController@updateStandardProfile');
	Route::post('/profileDefination/updateCustomProfile','Development\TTProfileController@updateCustomProfile');
	Route::post('/profileDefination/updatePartTimerProfile','Development\TTProfileController@updatePartTimerProfile');


	Route::post('/weekly_timesheet/update_mutiple_staff_weekly_sheet_time','Development\TTProfileWeeklyTSController@update_mutiple_staff_weekly_sheet_time');

	
	Route::get('/weekly_timesheet', 'Development\TTProfileWeeklyTSController@mainPage');

	Route::post('/weekly_timesheet/update_weekly_sheet_holidayFlag','Development\TTProfileWeeklyTSController@update_weekly_sheet_holidayFlag');
	Route::post('/weekly_timesheet/update_weekly_sheet_time_saturday','Development\TTProfileWeeklyTSController@update_weekly_sheet_time_saturday');
	Route::get('/weekly_timesheet/get_weekly_sheet_time_saturday','Development\TTProfileWeeklyTSController@get_weekly_sheet_time_saturday');
	Route::post('/weekly_timesheet/update_weekly_sheet_time','Development\TTProfileWeeklyTSController@update_weekly_sheet_time');
	Route::post('/weekly_timesheet/add_weekly_sheet_time','Development\TTProfileWeeklyTSController@add_weekly_sheet_time');	
	Route::post('/weekly_timesheet/get_weekly_sheet_time','Development\TTProfileWeeklyTSController@get_weekly_sheet_time');
			
	Route::get('/applicant_form', 'Development\ApplicantFormController@mainPage');
	Route::get('/online_applicant_form', 'Development\OnlineApplicantFormController@mainPage');
	Route::get('/staff_on_boarding', 'Development\StaffOnBoardingController@mainPage');


	Route::post('/masterLayout/staff/addAbsentia', 'Development\Haris@addAbsentia');
	//Route::post('/masterLayout/staff/addManual','Development\Haris@addManual');

	// Attendance - in - absentia
	//Route::get('/attendance_in_absentia', 'Attendance\Staff\AttendanceInAbsentia@mainPage');
		//Route::post('/masterLayout/staff/addAbsentia', 'Development\Haris@addAbsentia');


	Route::get('/masterLayout/staff/report', 'Development\StaffReportController@attendanceReport');
	Route::get('/masterLayout/staff/leaveReport', 'Development\StaffReportController@leaveReport');
	Route::post('/masterLayout/staff/getManualAttendance','Development\Haris@getManualAttendance');
	Route::post('/masterLayout/staff/getMisstap','spStaffProcess\Sp_staffProcess@getMisstap');
	Route::post('/masterLayout/staff/getAdjustment','spStaffProcess\Sp_staffProcess@getAdjustment');
	Route::post('/masterLayout/staff/getUnauthorized','spStaffProcess\Sp_staffProcess@getUnauthorized');
	Route::post('/masterLayout/staff/getLeaves','spStaffProcess\Sp_staffProcess@getLeaves');
	Route::post('/masterLayout/staff/getAbsentia','spStaffProcess\Sp_staffProcess@getAbsentia');
	Route::post('/masterLayout/staff/getLogs','spStaffProcess\Sp_staffProcess@getLogs');


	
	Route::post('/masterLayout/staff/addManual','Development\Haris@addManual');
	Route::post('/masterLayout/addPenalty','Development\Haris@addPenalty');
	Route::post('/masterLayout/addAdjustment','Development\Haris@addAdjustment');
	Route::post('/masterLayout/getDailyReport','Development\Haris@getDailyReport');
	Route::post('/masterLayout/staff/getleaveUpdate','Development\Haris@getLeaveForDailyReport');
	Route::post('/masterLayout/getYesterdayReport','Development\Haris@getYesterdayReport');
	
	Route::post('/masterLayout/getWeeklySheetTap','Development\Haris@getWeeklySheetTap');
	Route::post('/masterLayout/staff/addLeave','Development\Haris@addLeave');
	Route::post('/masterLayout/staff/get_updateLeave','Development\Haris@get_updateLeave');
	Route::post('/masterLayout/staff/LeaveUpdate','Development\Haris@LeaveUpdate');	

	// Attendance - in - absentia
	Route::get('/StaffAdjustments', 'Attendance\Staff\StaffAdjustments@mainPage');

	// Commnents (Stories)
	Route::post('/masterLayout/staff/addComments','Attendance\Staff\staffStories@addStories');

	// Manual 

	//Super Profile

	Route::get('/super_profile','Development\Super_profile@getSuperProfile');
	Route::get('/get_super_profile_modal','Development\Super_profile@getSuperProfileModal');
	Route::post('/insertSuperProfile','Development\Super_profile@insertSuperProfile');
	Route::post('/get_table_interface','Development\Super_profile@get_table_interface');
	Route::post('/getSuperProfileInteface','Development\Super_profile@getSuperProfileInteface');
	Route::post('/updateTimeIn','Development\Super_profile@updateTimeIn');
	Route::post('/updateTimeOut','Development\Super_profile@updateTimeOut');
	Route::get('/updateLevel','Development\Super_profile@updateSuperProfileLevel');
	
	Route::post('/InsertTimeIn','Development\Super_profile@InsertTimeIn');
	Route::post('/InsertTimeOut','Development\Super_profile@InsertTimeOut');

	Route::get('/sp_staff_process', 'spStaffProcess\sp_staffProcess@weeklyTimeSheetSP');
	Route::post('/updateSpOfWeeklySheet','spStaffProcess\sp_staffProcess@updateSpOfWeeklySheet');

	Route::get('/setAttendance', 'spStaffProcess\sp_staffProcess@setAttendance');
	Route::post('/updateAttendanceStaff', 'spStaffProcess\sp_staffProcess@updateAttendanceStaff');


	Route::get('/staff_payroll_adjustment', 'spStaffProcess\sp_staffProcess@staff_payroll_adjustment');
	Route::get('/student_stories', 'Student_Information\Master_Page\Gradestudent@Student_Stories');
	
	Route::post('/student/Students_Stories', 'Student_Information\Master_Page\Grade@Students_Stories');
	Route::post('/student/Stories_Back', 'Student_Information\Master_Page\Grade@Students_Stories_Back');
	
	Route::post('/student/Get_Section', 'Student_Information\Master_Page\Grade@Get_Section');

	Route::get('/Get_Section_custom', 'Student_Information\Master_Page\Grade@Get_Section_query');

	//Route::get('/VehicleReports', 'Attendance\Vehicle\VehicleReport@Get_Filter');

	// //******************** Accounts *****************************//

	Route::get('/fee_bill_setup','Account_Process\Accounts\FeeBillSetup@index');

	Route::get('/fee_bill_types','Account_Process\Accounts\FeeBillSetup@billTypes');

	Route::post('/getBillType','Account_Process\Accounts\FeeBillSetup@getBillType');

	Route::get('/arrears','Account_Process\Accounts\arrears@index');

	Route::get('/fee_billing','Account_Process\Accounts\FeeBilling@index');

	Route::post('/generate_bill_1','Account_Process\Accounts\FeeBilling@generate_bill_1');

	Route::post('/generate_bill_2','Account_Process\Accounts\FeeBilling@generate_bill_2');


	Route::post('/generate_bill_3','Account_Process\Accounts\FeeBilling@generate_bill_3');

	Route::get('/waviers_arrears','Account_Process\Accounts\WaviersArrears@index');

	Route::get('/concession','Account_Process\Accounts\ConcessionController@index');

	Route::get('/account_reports','Account_Process\Accounts\AccountReportController@index');

	Route::get('/account_reports/detail_of_receiving','Account_Process\Accounts\AccountReportController@getReceivingReport');
	Route::get('/account_reports/receiving_full','Account_Process\Accounts\AccountReportController@getFullReceivingReport');

	Route::get('/account_reports/detail_all_issuance','Account_Process\Accounts\AccountReportController@getIssuanceAllReport');
	Route::get('/account_reports/detail_of_issuance','Account_Process\Accounts\AccountReportController@getIssuanceFilterWise');

	Route::get('/account_reports/issuance_report','Account_Process\Accounts\AccountReportController@getReportInformation');

		
	Route::get('/accounts/remitance','Account_Process\Accounts\FeeBilling@remitance');

	Route::get('/accounts/fee_bill', 'Accounts\AccountsController@insertFeeBill');

	Route::get('/accounts/insertlist', 'Accounts\AccountsController@uploadStudentList');
	Route::get('/accounts/concession', 'Accounts\AccountsController@uploadList');
	Route::get('/accounts/scholarships', 'Accounts\AccountsController@uploadScholarshipList');
	Route::get('/accounts/update_bill_numbers', 'Accounts\AccountsController@UpdateBillNumbers');

	Route::get('/accounts/get_student_generated_bills', 'Accounts\AccountsController@getStudentGeneratedBills');

	Route::get('/accounts/fetch_fee_bill', 'Accounts\AccountsController@fetchFeeBill');

	Route::get('/accounts/fee_bill_cron', 'Accounts\AccountsController@studentLastPaymentRemitanceTaxesCron');


	Route::post('/remitance/search','Account_Process\Accounts\FeeBilling@search_students');


	Route::post('/Create_Remittance','Account_Process\Accounts\FeeBilling@Create_Remittance');

	Route::post('/remitance_right_side','Account_Process\Accounts\FeeBilling@remitance_right_side');

	Route::post('/concession_search','Account_Process\Accounts\ConcessionController@concession_search');

	Route::post('/concession_search2','Account_Process\Accounts\ConcessionController@concession_search2');

	Route::post('/add_concession','Account_Process\Accounts\ConcessionController@add_concession');


	Route::post('/student_concession_info','Account_Process\Accounts\ConcessionController@student_concession_info');


	Route::get('/requestion_form','Account_Process\Accounts\RequestionController@index');
	Route::get('/requestion_form/store','Account_Process\Accounts\RequestionController@storeRequestion');


	Route::post('/render_html_right_side','Account_Process\Accounts\FeeBillSetup@render_html_right_side');

	Route::post('/render_html_right_side_IS','Account_Process\Accounts\FeeBillSetup@render_html_right_side_IS');


	Route::post('/render_html_right_side_Other','Account_Process\Accounts\FeeBillSetup@render_html_right_side_Other');


	Route::post('/free_structure_post_data','Account_Process\Accounts\FeeBillSetup@free_structure_post_data');


	Route::post('/free_structure_post_data2','Account_Process\Accounts\FeeBillSetup@free_structure_post_data2');


	Route::post('/addInstallment','Account_Process\Accounts\FeeBillSetup@addInstallment');

	Route::post('/addTax','Account_Process\Accounts\FeeBillSetup@addTax');
	Route::post('/updateBillType','Account_Process\Accounts\FeeBillSetup@updateBillType');

	Route::post('/addUpdateArrear','Account_Process\Accounts\arrears@insertAndUpdateArrear');

	Route::post('/getArrearAndAdjustmentData','Account_Process\Accounts\arrears@get_arrear_and_adjustment_data');

	Route::get('/set_el_balance','Development\hr_settings@set_leave_balance');
			});	
/*********************************************************************************/


/************************* Staff Recuriment Process ************************/
	//Arif Khan Working
	Route::get('/staff_recruitment_initiation','Development\staff_recruitment_initiation@index');
	Route::get('/staff_recruitment_all_applicants','Development\staff_recruitment_all_applicants@index');
	Route::post('/allposts_all_app','Development\staff_recruitment_all_applicants@allposts');
	Route::get('/staff_recruitment_process','Development\staff_recruitment_process@index');
	Route::get('/staff_recruitment_process1','Development\staff_recruitment_process@process_flow');
	// Route::post( '/get_form', 'Development\staff_recruitment_process@get_process');
	Route::get( '/get_form', 'Development\staff_recruitment_process@get_process');
	Route::post('/staff_recruitment_initiation_add','Development\staff_recruitment_initiation@addFormData');
	Route::get('/staff_recruitment_process_flow_filter','Development\staff_recruitment_process_filter_report@process_flow_filter');

	
	Route::post('/staff_recruitment_initiation_addcareerform','Development\staff_recruitment_initiation@addCareerForm');
	Route::get('/hr_configurations','Development\hr_settings@configurations');
	Route::post('/hr_save_configurations','Development\hr_settings@saveConfigurations');
	Route::get('/staff_recruitment_followup','Development\hr_followup@index');
	Route::post('/staff_recruitment_followup_logs','Development\hr_followup@followupLogs');
	Route::post('/addFollowComments','Development\hr_followup@addFollowComments');
	Route::post('/update_archieve','Development\staff_recruitment_initiation_archive_ns@update_archieve');
	
	Route::post('/addcustomer','Development\staff_recruitment_initiation@addcustomer');

	Route::post('/get_staff_recruitment','Development\staff_recruitment_initiation@get_recruitment_data');

	Route::post('/update_presence','Development\staff_recruitment_initiation@mark_presence');

	Route::post('/call_for_part_b_presence','Development\staff_recruitment_initiation@call_for_part_b_presence');
	
	Route::post('/addFormDataMoveToArchive','Development\staff_recruitment_initiation@addFormDataMoveToArchive');
	
	Route::post('/loadLogs','Development\staff_recruitment_initiation@loadLogs');

	Route::post('/preperation_checks','Development\staff_recruitment_initiation@addPreperationChecks');
	
	
	Route::post('/modified_form_list','Development\staff_recruitment_initiation@modified_form_list');


	Route::post('/allposts','Development\staff_recruitment_initiation@allposts');
	//Start Arif Khan Created this All Dept Routes
	Route::get('/get_dept', 'Development\staff_recruitment_initiation@all_dept');
	Route::get('/get_dept2', 'Development\staff_recruitment_initiation@all_dept2');
	Route::get('/get_dept3', 'Development\staff_recruitment_initiation@all_dept3');
	Route::get('/get_dept4', 'Development\staff_recruitment_initiation@all_dept4');
	Route::get('/get_dept5', 'Development\staff_recruitment_initiation@all_dept5');
	//End Arif Khan Created this All Dept Routes
	Route::post('/Search_followup_list','Development\hr_followup@Search_followup_list');
	Route::post('/Followup_list','Development\hr_followup@Followup_list');


/* *******************************************************************************
 * Master Page(Student)
 * ******************************************************************************* 
*/
	Route::group(['middleware' => 'authenticated'],function(){
	Route::get("/student-information",  'Student_Information\Master_Page\Grade@Students');
	Route::post("/student/detail", 'Student_Information\Master_Page\Grade@Students_Detail');
	Route::get("/student/add_story", 'Student_Information\Master_Page\Grade@add_student_story');
	Route::post("/student/add_story_db", 'Student_Information\Master_Page\Grade@add_this_student_story');
	Route::post("/student/add_more_story", 'Student_Information\Master_Page\Grade@Student_Stories_Limit');
	Route::post("/student/filter_story", 'Student_Information\Master_Page\Grade@Student_Stories_Filter');
	Route::post("/student/create/badge", 'Student_Information\Master_Page\Grade@Create_Badges_Assign');
	Route::post("/student/create/edit_badge", 'Student_Information\Master_Page\Grade@Edit_Badge_Html');
	Route::post("/student/create/edit_badge_form", 'Student_Information\Master_Page\Grade@Edit_Badge_Form_Action');
	Route::post("/student/create/list_refresh", 'Student_Information\Master_Page\Grade@Refresh_Students_List');
	Route::post("/student/show_fif", 'Student_Information\Master_Page\Grade@Show_FIF');
	
	Route::post("/student/post_comments", 'Student_Information\Master_Page\Grade@Post_Comments');
	Route::post("/student/search_comments", 'Student_Information\Master_Page\Grade@Search_Comments');
	
	Route::get("/calendar", "Calendar\Master_Calendar\Calendar@MCalendar");


	Route::get('/staff_recruitment_initiation_archive','Development\staff_recruitment_initiation_archive_ns@index');

	Route::post('/archiveLogs','Development\staff_recruitment_initiation_archive_ns@archiveLogs');


	Route::post('/modified_form_archive','Development\staff_recruitment_initiation_archive_ns@modified_form_archive');

	Route::post('/allarchive','Development\staff_recruitment_initiation_archive_ns@allarchive');

	
    //start Staff Recruiment Arif Khan

	Route::get('/staff_recruitment_reports','Development\staff_recruitment_reports@index');
	Route::get('/staff_recruitment_report','Development\staff_recruitment_reports@Get_recruitment_filter');
	Route::get('/staff_recruitment_all_reports_data','Development\staff_recruitment_reports@staff_recruitment_all_reports_data');
	Route::get('/staff_recruitment_all_reports_data_today','Development\staff_recruitment_reports@today_report');
	////END Staff Recruiment Arif Khan

	// MIS URL 
	Route::get('/mis','Account_Process\Accounts\MisRegularFeeBill@index');
	Route::post('/table_ajax_fee_bill','Account_Process\Accounts\MisRegularFeeBill@get_fee_bill_mis_ajax');

    Route::get('/new_admission','Account_Process\Accounts\AccountReportController@newAdmssionView');
    Route::get('/account_reports/admission_report','Account_Process\Accounts\AccountReportController@newAdmissionFeeBillReport');
    
    /* Adjustment Aapproval Pages URL Route */
	Route::get('/adjustment_approval', 'Development\AdujstmentApproval@landingPage');
	Route::get('/adjustment_approval_table_rows', 'Development\AdujstmentApproval@adjustmentApproveRows');
	Route::get('/adjustment_approval_Operation', 'Development\AdujstmentApproval@Operation');
	Route::get('/adjustment_disapproval_Operation', 'Development\AdujstmentApproval@disApproval');
	Route::post('/adjustment_update', 'Development\AdujstmentApproval@UpdateAdjustment');
	Route::post('/delete_approval_Operation', 'Development\AdujstmentApproval@Delete_Operation');
	
		
		
});
/* End Master Page(Student) *******************************************************/