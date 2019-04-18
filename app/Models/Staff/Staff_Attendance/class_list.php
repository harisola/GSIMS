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

class class_list extends Model
{

    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = 'class_list';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function checkParentRegRecordExistance($Today_Data,$Staff_id){

        $details=class_list::where([['date',$Today_Data],['staff_id',$Staff_id]])->get();
        return count($details);
        //echo $details;
    
    }

    public function checkParentRegRecordCardExistance($Today_Data,$interim,$Card_no){

        $details=class_list::where([['date',$Today_Data],['org_card_hex',$interim],['tmp_card_no',$Card_no]])->get();
        return count($details);
        //echo $details;
    
    }

    public function GetParentInfoGF_ID($gf_id){

        $query = "select Da.* from(
        select 
        cl.id as student_id,
        cl.official_name,
        cl.call_name,
        cl.grade_name,
        cl.section_dname,
        cl.house_name,
        cl.gs_id,
        cl.std_status_code,
        sr.gr_no,
        'Student Data' as Data_Type 
        from atif.student_registered as sr 
        left join atif.class_list as cl on cl.id=sr.id
        where sr.gf_id= " . $gf_id . " 
        union
        select 
        0 as student_id,
        cll.name as official_name,
        if(cll.parent_type=1,'Father', 'Mother' )  as call_name,
        '' as grade_name,
        '' as section_dname,
        '' as house_name,
        '' as gs_id,
        '' as std_status_code,
        cll.nic as gr_no,
        'Parent Data' as Data_Type
        from atif.student_family_record as cll where cll.gf_id= " . $gf_id . "
        ) as Da
        order by Da.student_id";

        // $staff = DB::connection($this->dbCon)->select($query);
        
        // $i = 0;
        // foreach ($staff as $u) {
        //     $pic = $this->get_Parents_Pic($u->photo_id, $u->gender);
        //     $staff[$i]->photo500 = $pic['photo500'];
        //     $staff[$i]->photo150 = $pic['photo150'];
        //     $i++;
        // }

        // return $staff;

        $result = DB::connection($this->dbCon)->select($query);
        return $result;
    
    }

    public function get_students_by_gfid($gf_id){

        $query = "select 
                cl.id as student_id,
                cl.official_name,
                cl.call_name,
                cl.grade_name,
                cl.section_dname,
                cl.house_name,
                cl.gs_id,
                cl.std_status_code,
                cl.gr_no,
                'Student Data' as Data_Type 
                from atif.class_list as cl
                where cl.gf_id = ".$gf_id." "; 

        $result = DB::connection($this->dbCon)->select($query);
        return $result;

    }

    public function getStudentFamilyRecord($gf_id){
        
        $VQuery = "select sfr.gf_id,sfr.name,sfr.parent_type,sfr.mobile_phone,sfr.rfid_dec,sfr.nic,sfr.call_name 
                from atif.student_family_record as sfr
                left join atif.student_registered as sr on sr.gf_id=sfr.gf_id
                where sfr.gf_id = ".$gf_id." ";

        $query = DB::connection($this->dbCon)->select($VQuery);
        return $query;

    }

    //tap family card
    public function getFamilyRecord($rfid_dec){
        
        $VQuery = "select sfr.nic,sfr.gf_id,sfr.name,sfr.parent_type,sfr.mobile_phone,sfr.rfid_dec,sfr.rfid_hex
                        from atif.student_family_record as sfr
                        where sfr.rfid_dec =  ".$rfid_dec." ";

        $query = DB::connection($this->dbCon)->select($VQuery);
        return $query;

    }

    //tap family card recored for save family data
    // public function getFamilyRecord_data($rfid_dec){
    //     $VQuery = "select sfr.nic,sfr.gf_id,sfr.name,sfr.parent_type,sfr.mobile_phone,sfr.rfid_dec,sfr.rfid_hex
    //                     from atif.student_family_record as sfr
    //                     where sfr.rfid_dec  ".$rfid_dec." ";

    //     $query = DB::connection($this->dbCon)->select($VQuery);
    //     return $query;

    // }

    // public function GetStudentFamilyRecord($gf_id)
    // {

    //     $VQuery = "select sfr.gf_id,sfr.name,sfr.parent_type,sfr.mobile_phone,sfr.rfid_dec,sfr.nic,sfr.call_name 
    //             from atif.student_family_record as sfr
    //             left join atif.student_registered as sr on sr.gf_id=sfr.gf_id
    //             where sfr.gf_id = ".$gf_id." ";

    //     $query = DB::connection($this->dbCon)->select($VQuery);
    //     return $query;

    // }


    /**********************************************************************
    * Calling Parent Pic 500px and 150px 
    * @input:   GF_ID  PhotoID and Parent Gender
    * @output:  parent Pic Paths
    * Description:
    *       If no picture found then get blankPic according to gender
    ***********************************************************************/
    public function get_Parents_Pic($PhotoID, $Gender){
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
