<?php
/******************************************************************
* Author: 	Zia Khan
* Email: 	ziaisss@gmail.com
* Cell: 	+92-342-2775588
*******************************************************************/


namespace App\Models\Staff\Staff_Attendance;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;

class tmpcard_staff_used extends Model
{

    protected $connection = 'mysql_AttendanceStaff';
    protected $dbCon = 'mysql';
    protected $table = 'tmpcard_staff_used';
    public $timestamps = false;
    protected $primaryKey = 'id';



    public function get_tmpcard_List(){

        $query = "select sr.gt_id,sr.abridged_name,sr.name_code,sr.c_topline,sr.c_bottomline,u.tmp_card_no,u.date,u.time
                from atif_attendance_staff.tmpcard_staff_used as u 
                left join atif.staff_registered as sr on sr.id=u.staff_id
                left join atif._tmp_rfid_cards as car on car.card_no=u.tmp_card_no
                where u.date=curdate()";
        $tmpcard = DB::connection($this->dbCon)->select($query);        
        return $tmpcard;
    }

    public function getimterimcard($tmpcard_rfid)
    {
       // $cQuery = "select tsu.staff_id,gt_id,sr.abridged_name,sr.name_code,tsu.ip4,tsu.tmp_card_no,trc.rfid_dec,
       //          tsu.date,tsu.time,tsu.created,tsu.register_by,tsu.modified,tsu.modified_by,tsu.record_deleted
       //          from atif_attendance_staff.tmpcard_staff_used as tsu
       //          left join atif.staff_registered as sr on sr.id=tsu.staff_id
       //          left join atif._tmp_rfid_cards as trc on trc.card_no=tsu.tmp_card_no
       //          where  tsu.date=curdate()
       //          and tsu.tmp_card_no=".$tmpcard_no." limit 1";
        
        $cQuery = "select tsu.staff_id,gt_id,sr.abridged_name,sr.name_code,tsu.ip4,tsu.tmp_card_no,trc.rfid_dec,
                tsu.date,tsu.time,tsu.created,tsu.register_by,tsu.modified,tsu.modified_by,tsu.record_deleted
                from atif_attendance_staff.tmpcard_staff_used as tsu
                left join atif.staff_registered as sr on sr.id=tsu.staff_id
                left join atif._tmp_rfid_cards as trc on trc.card_no=tsu.tmp_card_no
                where  tsu.date=curdate()
                and trc.rfid_dec=".$tmpcard_rfid." limit 1";
        // $row = DB::connection($this->dbCon)->select($cQuery);
        // return $row;
        $result = DB::connection($this->dbCon)->select($cQuery);
        return $result;

    }

    public function staff_reg($staff_id){
        $SqlQuery = "select
        sr.id as staff_id, sr.employee_id as photo_id, sr.gt_id, sr.name, sr.name_code, sr.abridged_name, sr.nic, sr.gender, tl.title as staff_title,
        sr.dob, sr.doj, SUBSTRING(sr.gg_id, 1, LOCATE('@',sr.gg_id)-1) as email, IF(sr.branch_id=1, 'North', 'South') as campus,
        sr.mobile_phone, sr.staff_category, sr.c_topline, sr.c_bottomline, st.code as status_code, st.name as staff_status_name
        from atif.staff_registered as sr
        left join atif._title_person as tl
            on tl.id = sr.title_person_id
        left join atif._staffstatus as st
            on st.id = sr.staff_status
        where (sr.id = $staff_id)
        AND (sr.is_active = 1 and sr.is_posted = 1 and sr.record_deleted = 0)"; 

        $result = DB::connection($this->dbCon)->select($SqlQuery);
        return $result;

    }

    //edit by zk
    public function checkinterim($interim_rfid,$interim_rfid_cardtype)
    {
       // $SqlQuery = "select trc.id,trc.card_no,trc.card_type,trc.rfid_dec,trc.rfid_hex from atif._tmp_rfid_cards as trc WHERE trc.rfid_dec = ".$interim_rfid.""; 

        $SqlQuery = "select trc.id,trc.card_no,trt.name,trc.card_type,trc.rfid_dec,trc.rfid_hex 
                    from atif._tmp_rfid_cards as trc 
                    left join atif._tmp_rfid_type as trt
                    on trt.id = trc.card_type
                    WHERE trc.rfid_dec = ".$interim_rfid." 
                    and trc.card_type = ".$interim_rfid_cardtype."";

        $result = DB::connection($this->dbCon)->select($SqlQuery);
        return $result;


    }

    public function checkStaffRegRecordExistance($Today_Data,$Staff_id){
        $details=tmpcard_staff_used::where([['date',$Today_Data],['staff_id',$Staff_id]])->get();
        return count($details);
        //echo $details;
    }

    public function checkStaffRegRecordCardExistance($Today_Data,$interim,$Card_no){
        $details=tmpcard_staff_used::where([['date',$Today_Data],['org_card_hex',$interim],['tmp_card_no',$Card_no]])->get();
        return count($details);
        //echo $details;
    }

    public function CheckTapInterim($Today_Data,$interim_rfid)
    {
        $SqlQuery = "select tsu.staff_id,gt_id,sr.abridged_name,sr.name_code,tsu.ip4,tsu.tmp_card_no,trc.rfid_dec,
                tsu.date,tsu.time,tsu.created,tsu.register_by,tsu.modified,tsu.modified_by,tsu.record_deleted
                from atif_attendance_staff.tmpcard_staff_used as tsu
                left join atif.staff_registered as sr on sr.id=tsu.staff_id
                left join atif._tmp_rfid_cards as trc on trc.card_no=tsu.tmp_card_no
                WHERE tsu.date= '".$Today_Data."'  
                and trc.rfid_dec = ".$interim_rfid." limit 1"; 

        $result = DB::connection($this->dbCon)->select($SqlQuery);
        return $result;


    }

    public function insert($table_name,$data){
        $id = DB::connection($this->dbCon)->table($table_name)->insertGetId($data);
        return $id;
    }

}
