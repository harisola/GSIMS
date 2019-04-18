<?php
namespace App\Models\HR_Attendance;

 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Adjustment_Approvel_model extends Model
{
	protected $dbCon = 'mysql';


	public function Get_Permissions($Link, $User_id )
	{
		$query = "SELECT 
			`rm`.`role_id`, 
			`rm`.`dyn_menu_id`, 
			`rm`.`menu_visible`, 
			`rm`.`can_create`,
			`rm`.`can_read`, 
			`rm`.`can_update`, 
			`rm`.`can_delete`, 
			`rm`.`can_approve`, 
			`rm`.`can_print`, 
			`rm`.`can_export`
			FROM atif_gs_sims.role_menus AS rm 
			LEFT JOIN atif_gs_sims.role_users AS ru ON ru.role_id=rm.role_id
			WHERE rm.dyn_menu_id = ( SELECT id FROM atif_gs_sims.dyn_menu AS m WHERE m.url='".$Link."' )
			AND ru.user_id=".$User_id."";
		return DB::connection($this->dbCon)->select($query);
	}



	public function Get_Ajustment()
	{
		$query = "SELECT * FROM (
		SELECT 
		ap.id AS Approval_id,
		ap.approve_status AS Approval_Status,
		ap.approval_type_id AS Approval_Type_id,
		ap.staff_id AS Staff_id,
		DATE_FORMAT(tab.`date`, '%a %d %b, %Y' )  AS Effected_Date,
		ap.updated_at AS Dated,
		atp.activity_title AS Approval_Title,
		sr.employee_id AS Photo_id,
		sr.abridged_name AS Staff_abridged_name,
		sr.name_code AS Name_code,
		sr.gender AS Gender,
		sr.designation AS Designation,
		sr.gt_id AS Gt_id,
		src.employee_id AS Photo_id_created_by,
		src.abridged_name AS Staff_abridged_name_created_by,
		src.name_code AS Name_code_created_by,
		src.gender AS Gender_created_by,
		src.designation AS Designation_created_by,
		src.gt_id AS Gt_id_created_by,
		tab.id AS Edit_id,
		tab.attendance_type AS Edit_type,
		tab.attendance_id AS Eattendance_id
		FROM atif_gs_events.activities AS atp
		left JOIN atif_gs_events.adjustment_approvals AS ap ON ap.approval_type_id=atp.id
		LEFT JOIN atif_gs_events.absenta_manual_description AS tab ON tab.id=ap.table_id
		LEFT OUTER JOIN atif.staff_registered AS sr ON sr.id=ap.staff_id
		LEFT OUTER JOIN atif.staff_registered AS src ON src.id = ap.created_by 
		WHERE atp.id=1 AND ap.approve_status=0 AND ap.record_deleted=0
		UNION


		SELECT 
		ap.id AS Approval_id,
		ap.approve_status AS Approval_Status,
		ap.approval_type_id AS Approval_Type_id,
		ap.staff_id AS Staff_id,
		DATE_FORMAT(tab.`date`, '%a %d %b, %Y' )  AS Effected_Date,
		ap.updated_at AS Dated,
		atp.activity_title AS Approval_Title,

		sr.employee_id AS Photo_id,
		sr.abridged_name AS Staff_abridged_name,
		sr.name_code AS Name_code,
		sr.gender AS Gender,
		sr.designation AS Designation,
		sr.gt_id AS Gt_id,
		src.employee_id AS Photo_id_created_by,
		src.abridged_name AS Staff_abridged_name_created_by,
		src.name_code AS Name_code_created_by,
		src.gender AS Gender_created_by,
		src.designation AS Designation_created_by,
		src.gt_id AS Gt_id_created_by,
		tab.id AS Edit_id,
		tab.attendance_type AS Edit_type,
		tab.attendance_id AS Eattendance_id
		FROM atif_gs_events.activities AS atp
		left JOIN atif_gs_events.adjustment_approvals AS ap ON ap.approval_type_id=atp.id
		LEFT JOIN atif_gs_events.absenta_manual_description AS tab ON tab.id=ap.table_id
		LEFT OUTER JOIN atif.staff_registered AS sr ON sr.id=ap.staff_id
		LEFT OUTER JOIN atif.staff_registered AS src ON src.id = ap.created_by 
		WHERE atp.id=2 AND ap.approve_status=0 AND ap.record_deleted=0

		UNION

		SELECT 
		ap.id AS Approval_id,
		ap.approve_status AS Approval_Status,
		ap.approval_type_id AS Approval_Type_id,
		ap.staff_id AS Staff_id,
		DATE_FORMAT(tab.`date`, '%a %d %b, %Y' )  AS Effected_Date,
		ap.updated_at AS Dated,
		atp.activity_title AS Approval_Title,
		sr.employee_id AS Photo_id,
		sr.abridged_name AS Staff_abridged_name,
		sr.name_code AS Name_code,
		sr.gender AS Gender,
		sr.designation AS Designation,
		sr.gt_id AS Gt_id,
		src.employee_id AS Photo_id_created_by,
		src.abridged_name AS Staff_abridged_name_created_by,
		src.name_code AS Name_code_created_by,
		src.gender AS Gender_created_by,
		src.designation AS Designation_created_by,
		src.gt_id AS Gt_id_created_by,
		tab.id AS Edit_id,
		tab.attendance_type AS Edit_type,
		tab.attendance_id AS Eattendance_id
		FROM atif_gs_events.activities AS atp
		left JOIN atif_gs_events.adjustment_approvals AS ap ON ap.approval_type_id=atp.id
		LEFT JOIN atif_gs_events.absenta_manual_description AS tab ON tab.id=ap.table_id
		LEFT OUTER JOIN atif.staff_registered AS sr ON sr.id=ap.staff_id
		LEFT OUTER JOIN atif.staff_registered AS src ON src.id = ap.created_by 
		WHERE atp.id=3 AND ap.approve_status=0 AND ap.record_deleted=0


		UNION 


		SELECT 
		ap.id AS Approval_id,
		ap.approve_status AS Approval_Status,
		ap.approval_type_id AS Approval_Type_id,
		ap.staff_id AS Staff_id,
		DATE_FORMAT(tab.`date`, '%a %d %b, %Y' )  AS Effected_Date,
		ap.updated_at AS Dated,
		atp.activity_title AS Approval_Title,
		sr.employee_id AS Photo_id,
		sr.abridged_name AS Staff_abridged_name,
		sr.name_code AS Name_code,
		sr.gender AS Gender,
		sr.designation AS Designation,
		sr.gt_id AS Gt_id,
		src.employee_id AS Photo_id_created_by,
		src.abridged_name AS Staff_abridged_name_created_by,
		src.name_code AS Name_code_created_by,
		src.gender AS Gender_created_by,
		src.designation AS Designation_created_by,
		src.gt_id AS Gt_id_created_by,
		tab.id AS Edit_id,
		tab.attendance_type AS Edit_type,
		tab.attendance_id AS Eattendance_id
		FROM atif_gs_events.activities AS atp
		left JOIN atif_gs_events.adjustment_approvals AS ap ON ap.approval_type_id=atp.id
		LEFT JOIN atif_gs_events.absenta_manual_description AS tab ON tab.id=ap.table_id
		LEFT OUTER JOIN atif.staff_registered AS sr ON sr.id=ap.staff_id
		LEFT OUTER JOIN atif.staff_registered AS src ON src.id = ap.created_by 
		WHERE atp.id=4 AND ap.approve_status=0 AND ap.record_deleted=0

		UNION 

		SELECT 
		ap.id AS Approval_id,
		ap.approve_status AS Approval_Status,
		ap.approval_type_id AS Approval_Type_id,
		ap.staff_id AS Staff_id,
		DATE_FORMAT(tab.`date`, '%a %d %b, %Y' )  AS Effected_Date,
		ap.updated_at AS Dated,
		atp.activity_title AS Approval_Title,
		sr.employee_id AS Photo_id,
		sr.abridged_name AS Staff_abridged_name,
		sr.name_code AS Name_code,
		sr.gender AS Gender,
		sr.designation AS Designation,
		sr.gt_id AS Gt_id,
		src.employee_id AS Photo_id_created_by,
		src.abridged_name AS Staff_abridged_name_created_by,
		src.name_code AS Name_code_created_by,
		src.gender AS Gender_created_by,
		src.designation AS Designation_created_by,
		src.gt_id AS Gt_id_created_by,
		tab.id AS Edit_id,
		tab.attendance_type AS Edit_type,
		tab.attendance_id AS Eattendance_id
		FROM atif_gs_events.activities AS atp
		left JOIN atif_gs_events.adjustment_approvals AS ap ON ap.approval_type_id=atp.id
		LEFT JOIN atif_gs_events.absenta_manual_description AS tab ON tab.id=ap.table_id
		LEFT OUTER JOIN atif.staff_registered AS sr ON sr.id=ap.staff_id
		LEFT OUTER JOIN atif.staff_registered AS src ON src.id = ap.created_by 
		WHERE atp.id=5 AND ap.approve_status=0 AND ap.record_deleted=0

		) AS DATA ORDER BY Dated";


		$staff = DB::connection($this->dbCon)->select($query);
        $i = 0;
	    foreach ($staff as $u) {
		    $pic = $this->get_Staff_Pic($u->Photo_id, $u->Gender);
			$staff[$i]->photo500 = $pic['photo500'];
		    $staff[$i]->photo150 = $pic['photo150'];


		    $pic = $this->get_Staff_Pic($u->Photo_id_created_by, $u->Gender_created_by);
			$staff[$i]->createdphoto500 = $pic['photo500'];
		    $staff[$i]->createdphoto150 = $pic['photo150'];

		    $i++;
	    }
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;


	}

	
	public function get_Staff_Pic( $PhotoID, $Gender)
	{
		if (!file_exists(STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE))
		{
	        if($Gender == 'M')
	        {
	            $PhotoID = 'male';
	        }else if($Gender == 'F')
	        {
	            $PhotoID = 'female';
	        }
	    }
	    $user['photo500'] = STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE;
	    $user['photo150'] = STAFF_PIC_150 . $PhotoID . STAFF_PIC150_TYPE;


	    return $user;
	}



	public function MyUpdateTable_Model($Update_Query)
	{
		return DB::connection($this->dbCon)->update($Update_Query);
	}


	public function MyInsertTable_Model($Update_Query)
	{
		return DB::connection($this->dbCon)->insert($Update_Query);
	}


	public function SelectQeury($SelectQeury)
	{
		$staff = DB::connection($this->dbCon)->select($SelectQeury);
		
		return collect($staff)->map(function($x){ return (array) $x; })->toArray();

        
	}


	public function setAttendanceInfo($staff_id, $from_date, $to_date)
	{
		$query = "CALL atif_gs_events.`sp_set_attendance_info`('".$staff_id."','".$from_date."','".$to_date."')";
		$result = DB::connection($this->dbCon)->select($query);
		return $result;
	}

	
	public function reports_staff_attendance($gt_id, $from_date, $to_date)
	{

		//$query = "CALL atif_gs_events.`sp_staff_attendance_report`('".$gt_id."','".$from_date."','".$to_date."')";

		$Staff_q = "SELECT 
sr.id AS Staff_id, sr.employee_id, sr.gt_id, sr.abridged_name, sr.name_code, sr.gender, sr.department, sr.designation
FROM atif.staff_registered AS sr WHERE sr.gt_id='".$gt_id."'";


		$Staff_id =0;
		$staff = DB::connection($this->dbCon)->select($Staff_q);

		$Staff_id = $staff[0]->Staff_id;


		$i = 0;
		foreach ($staff as $u) {
		    $pic = $this->get_Staff_Pic($u->employee_id, $u->gender);
			$staff[$i]->photo500 = $pic['photo500'];
		    $staff[$i]->photo150 = $pic['photo150'];


		     

		    $i++;
		}
		$staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
		 





		$query = "CALL atif_gs_events.sp_get_attendance_info('".$Staff_id."','".$from_date."','".$to_date."')";
		$result = DB::connection($this->dbCon)->select($query);

		return array("Store_procedure" => $result,  "Staff_data" => $staff );
		
	}



	public function staff_info()
	{
		$Staff_q = "SELECT 
sr.id AS Staff_id, sr.employee_id, sr.gt_id, sr.abridged_name, sr.name_code, sr.gender, sr.department, sr.designation
FROM atif.staff_registered AS sr WHERE sr.is_posted=1 AND sr.is_active=1";
		$staff = DB::connection($this->dbCon)->select($Staff_q);
		return collect($staff)->map(function($x){ return (array) $x; })->toArray();
    }


}