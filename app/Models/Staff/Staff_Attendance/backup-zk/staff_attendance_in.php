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

class staff_attendance_in extends Model
{

    protected $connection = 'mysql_AttendanceStaff';
    protected $dbCon = 'mysql';
    protected $table = 'staff_attendance_in';
    public $timestamps = false;
    protected $primaryKey = 'id';


    // public function check_staff_attendance_in($staff_id,$date,$location_id){
      
    //     $details=staff_attendance_in::where([['staff_id',$staff_id],['date',$date],['location_id',$location_id]])->get();
    //     return count($details);
    //     //echo $details;
    // }

    public function check_staff_attendance_in($staff_id,$date){
      
        $details=staff_attendance_in::where([['staff_id',$staff_id],['date',$date]])->get();
        return count($details);
        //echo $details;
    }

    public function getStaffAttendanceData($RFID)
    {
       $cQuery = "select * from
        (select
                sr.id as staff_id, title.title as salutation, sr.abridged_name as name, sr.gt_id as gen_id, sr.employee_id as photo_id, 
                sr.gender, REPLACE(sr.mobile_phone, '-', '') as mobile_phone,
                IF(t.tmp_card_no > 0, 1, 0) as marked, '' as dap_color, '' as dap_code,
                IFNULL(min(i.time), '') as time_in_th, IFNULL(min(atd.time), '') as time_in_atd
                from atif.staff_registered as sr
                left join atif._title_person as title
                    on title.id = sr.title_person_id
                left join atif_attendance_staff.tmpcard_staff_used as t
                    on t.staff_id = sr.id
                    and t.date = curdate()
                left join atif_attendance_staff.staff_attendance_in as i
                    on i.staff_id = sr.id
                    and i.date = curdate()
                    and (i.location_id = 1 Or i.location_id = 2 Or i.location_id = 5 Or i.location_id = 6 Or i.location_id = 7 Or i.location_id = 8 Or i.location_id = 16)
                left join atif_attendance_staff.staff_attendance_in as atd
                    on atd.staff_id = sr.id
                    and atd.date = curdate()
                    and (atd.location_id = 3 Or atd.location_id = 4)

            where sr.rfid_dec = '".$RFID."'

        UNION

        select
        sr.id as staff_id, title.title as salutation, sr.abridged_name as name, sr.gt_id as gen_id, 
        sr.employee_id as photo_id, sr.gender, REPLACE(sr.mobile_phone, '-', '') as mobile_phone,
                IF(t.tmp_card_no > 0, 1, 0) as marked, '' as dap_color, '' as dap_code,
                IFNULL(min(i.time), '') as time_in_th, IFNULL(min(atd.time), '') as time_in_atd

        from atif_attendance_staff.tmpcard_staff_used as tmp

        left join atif._tmp_rfid_cards as cd
            on cd.card_no = tmp.tmp_card_no
        left join atif.staff_registered as sr
            on sr.id = tmp.staff_id
                left join atif._title_person as title
                    on title.id = sr.title_person_id
                left join atif_attendance_staff.tmpcard_staff_used as t
                    on t.staff_id = sr.id
                    and t.date = curdate()
                left join atif_attendance_staff.staff_attendance_in as i
                    on i.staff_id = sr.id
                    and i.date = curdate()
                    and (i.location_id = 1 Or i.location_id = 2 Or i.location_id = 5 Or i.location_id = 6 Or i.location_id = 7 Or i.location_id = 8 Or i.location_id = 16)
                left join atif_attendance_staff.staff_attendance_in as atd
                    on atd.staff_id = sr.id
                    and atd.date = curdate()
                    and (atd.location_id = 3 Or atd.location_id = 4)

        where tmp.date = curdate()
        and cd.rfid_dec = '".$RFID."') AS DATA
        where staff_id is not null";
         
        // $result = DB::connection($this->dbCon)->select($cQuery);
        // return $result;

        $staff = DB::connection($this->dbCon)->select($cQuery);
        $i = 0;
        
        foreach ($staff as $u) 
        {
            $pic = $this->get_Staff_Pic($u->photo_id, $u->gender);
            $staff[$i]->photo500 = $pic['photo500'];
            $staff[$i]->photo150 = $pic['photo150'];
            $i++;
        }
        $staff = collect($staff)->map(function($x){ return (array) $x; })->toArray();
        return $staff;






    }

    public function insert($table_name,$data){
        $id = DB::connection($this->dbCon)->table($table_name)->insertGetId($data);
        return $id;
    }

    public function getStaffAttendance($staff_id,$date){
        $query = "Select 
            ( select count(staff_attendance_in.id) from atif_attendance_staff.staff_attendance_in as staff_attendance_in
            where staff_attendance_in.staff_id = ".$staff_id." and  staff_attendance_in.date = '".$date."' and staff_attendance_in.location_id in (3,4,18) and staff_attendance_in.record_deleted=0 ) as attendance_in , 

            ( select count(staff_attendance_out.id) from atif_attendance_staff.staff_attendance_out as staff_attendance_out
            where staff_attendance_out.staff_id = ".$staff_id." and  staff_attendance_out.date = '".$date."' and staff_attendance_out.location_id in (3,4,18)  and staff_attendance_out.record_deleted=0 ) as attendance_out";
        $result = DB::connection($this->dbCon)->select($query);
        return $result;
    }

    public function checkIsLastIN($StaffID)
    {
        $result = false;

        $cQuery = "select * from
            (select * from
                (select
                i.staff_id, i.date, i.time as time, 'I' as atd
                from atif_attendance_staff.staff_attendance_in as i
                where i.staff_id = ".$StaffID."
                and i.date = curdate()
                and i.location_id = 3
                order by i.id desc
                limit 1) as i
            
            UNION
            
            select * from
                (select
                o.staff_id, o.date, o.time as time, 'O' as atd
                from atif_attendance_staff.staff_attendance_out as o
                where o.staff_id = ".$StaffID."
                and o.date = curdate()
                and o.location_id = 3
                order by o.id desc
                limit 1) as o) 
            AS DATA
        ORDER BY DATA.time desc
        LIMIT 1";



        
        $query=$this->db->query($cQuery); 
        $row = $query->result_array();
        if(!empty($row)){
            if($row[0]['atd'] == 'O'){
                $result = false;
            }else{
                $result = true;
            }
        }

        return $result;
    }

    public function makeSMSPool($mobilePhone, $message){
        $data = array( 
            'mobile_phone' => $mobilePhone, 
            'message' => $message);
        $this->db->insert('atif_sms.sms_pool', $data);
    }

    public function get($id = NULL, $single = FALSE){
        if($id != NULL){
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db_staff_attendance->where($this->_primary_key, $id);            
            $method = 'row';
        }
        elseif($single == TRUE) {
            $method = 'row';
        }
        else{
            $method = 'result';
        }

        $this->db_staff_attendance->where('record_deleted', 0);
        if(!count($this->db_staff_attendance->ar_orderby)){
            $this->db_staff_attendance->order_by($this->_order_by);
        }
        return $this->db_staff_attendance->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = FALSE){
        $this->db_staff_attendance->where($where);
        return $this->get(NULL, $single);
    }

    public function delete(){
        $filter = $this->_primary_filter;
        $id = $fileter($id);

        if(!$id){
            return FALSE;
        }

        $this->db_staff_attendance->where($this->_primary_key, $id);
        $this->db_staff_attendance->limit(1);
        $this->db_staff_attendance->delete($this->_table_name);
    }

    // public function checkStaffRegRecordExistance($staff_id){
      
    //     $details=staff_registered::where('id',$staff_id)->get();
    //     return count($details);
    //     //echo $details;
    // }

    // public function updateStaffRegRecord($staff_id,$data){
    //     $record=staff_registered::where('id',$staff_id)->update($data);
    //     //echo $data;

    // }


    public function CheckTapEvent($Today_Data, $Staff_id)
    {
       $SqlQuery = "SELECT f.*FROM(
                    SELECT d.* 
                    FROM ( 
                    SELECT n.staff_id, n.date, n.time, 1 AS tap, n.created 
                    FROM atif_attendance_staff.staff_attendance_in AS n 
                    WHERE n.staff_id=".$Staff_id." AND n.date= CURDATE() 
                    ORDER BY n.id DESC 
                    LIMIT 1 
                    ) AS d UNION 
                    SELECT d.* 
                    FROM ( 
                    SELECT n.staff_id, n.date, n.time, 2 AS tap, n.created 
                    FROM atif_attendance_staff.staff_attendance_out AS n 
                    WHERE n.staff_id=".$Staff_id." AND n.date= CURDATE() 
                    ORDER BY n.id DESC 
                    LIMIT 1 
                    ) AS d) AS f 
                    ORDER BY f.date, f.created DESC 
                    LIMIT 1"; 



        $result = DB::connection($this->dbCon)->select($SqlQuery);
        return $result;


    }




    /**********************************************************************
    * Calling Staff Pic 500px and 150px 
    * @input:   Staff PhotoID and Staff Gender
    * @output:  Staff Pic Paths
    * Description:
    *       If no picture found then get blankPic according to gender
    ***********************************************************************/
    public function get_Staff_Pic($PhotoID, $Gender){
        if (!file_exists(STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE)){
            if($Gender == 'M'){
                $PhotoID = 'male';
            }else if($Gender == 'F'){
                $PhotoID = 'female';
            }
        }
        $user['photo500'] = STAFF_PIC_500 . $PhotoID . STAFF_PIC500_TYPE;
        $user['photo150'] = STAFF_PIC_150 . $PhotoID . STAFF_PIC150_TYPE;


        return $user;
    }



   

}
