<?php
/******************************************************************
* Author:   Zia Khan
* Email:    ziaisss@gmail.com
* Cell:     +92-342-2775588
*******************************************************************/


namespace App\Models\Staff\Staff_Attendance;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Sentinel;

class student_registered extends Model
{

    protected $connection = 'default_Atif';
    protected $dbCon = 'mysql';
    protected $table = 'student_registered';
    public $timestamps = false;
    protected $primaryKey = 'student_id';

    public function getFatherPhotoPath($gf_id){
        // $this->data['stdf_150_photo_path'] = 'assets/photos/sis/150x150/father/';
        $getFatherPhotoPath = "xxx";
        // $StudentPhotoPath = $this->data['student_150_photo_path'];
        $FatherPhotoPath = 'http://10.10.10.63/gs/assets/photos/sis/150x150/father/';
        $MotherPhotoPath = 'http://10.10.10.63/gs/assets/photos/sis/150x150/mother/';
        // $StaffPhotoPath = $this->data['staff_150_photo_path'];
        $siblings = $this->getSiblingsInfo($gf_id);
        $FatherPhotoFound = false;
        $MotherPhotoFound = false;
        $getFatherPhotoPath=array();
        foreach ($siblings as $sibling) {    
            //     // var_dump($sibling['gr_no']);
            // echo $FatherPhotoPath . $sibling->gr_no . ".png";
            $PhotoID = $sibling->gr_no; 
            if (!file_exists(FATHER_PIC_500 . $PhotoID . PIC500_TYPE)){
                $PhotoID = 'NoPic';
                $FatherPhotoFound = false;
            }else{
                $FatherPhotoFound = true;
            }
            $photo500 = FATHER_PIC_500 . $PhotoID . PIC500_TYPE; 
            $photo150 = FATHER_PIC_150 . $PhotoID . PIC150_TYPE;
            array_push( $getFatherPhotoPath, array( "FATHERPIC500" => $photo500 ) );

            if(file_exists("http://10.10.10.63/gs/assets/photos/sis/150x150/father/2141.png")){ 
                $getFatherPhotoPath = "http://10.10.10.63/gs/assets/photos/sis/150x150/father/2141.png";
                $FatherPhotoFound = true;
                // var_dump($getFatherPhotoPath);
                // exit;
            
            }
        
        }

        // print_r('end');
        // exit;
        // $MaritalStatus = $this->getParentStaffInfo($gf_id);
        // // If Staff
        // if($FatherPhotoFound == false){
        //     //                     print_r('end');
        //     // exit;
        //     $ParentStaff = $this->getParentStaffInfo($gf_id);
        //     if($ParentStaff[0]->staff_gender == "M"){
        //         $getFatherPhotoPath = $StaffPhotoPath . $ParentStaff[0]->employee_id . ".png";
        //         $FatherPhotoFound = true;
        //     }
        // }

        //     //         print_r('end');
        //     // exit;

        // // If Divorced      
        // if ($FatherPhotoFound == false){            
        //     if($MaritalStatus[0]->marital_status == "Divorced"){
        //         $getFatherPhotoPath = $FatherPhotoPath . "PicDivorce_Dark.png";
        //         $FatherPhotoFound = true;
        //     }
        // }

        // // If Late
        // if ($FatherPhotoFound == false){
        //     if($MaritalStatus[0]->yod == "Late"){
        //         $getFatherPhotoPath = $FatherPhotoPath . "PicLate_Dark.png";
        //         $FatherPhotoFound = true;               
        //     }
        // }
        

        // // If NO photo found
        // if($FatherPhotoFound == false){
        //     $getFatherPhotoPath = $FatherPhotoPath . "NoPic.png";
        // }
        

        
         return $getFatherPhotoPath;
    
    }

    public function getSiblingsInfo($gf_id){
        // $result = false;

        $cQuery = "select * from atif.student_registered where gf_id = ".$gf_id." limit 1 "; 
        $query = DB::connection($this->dbCon)->select($cQuery);
        // $row = $query->result_array();
        // if(!empty($row)){
        //     if($row[0]['atd'] == 'O'){
        //         $result = false;
        //     }else{
        //         $result = true;
        //     }
        // }

        // return $result;
        return $query;

        // $query=$this->db->query($cQuery);
        // $row = $query->result_array();
        // return $row;
    
    }

    public function getSiblingsInfo2($gf_id){

        // $result = false;
        //         $cQuery = "select 
        // if(fdata.staff_id is not null, fdata.employee_id, sr.gr_no ) as father_photo,
        // if(fdata.staff_id is not null, 1, 0 ) as is_Staff,
        // fdata.name as Father_name

        // from atif.student_registered as sr
        // left  join 
        // (
        // select * from atif.students_family_staff as sr where sr.parent_type = 1 and sr.gf_id = ".$gf_id."  
        // ) as fdata 
        // on fdata.gf_id = sr.gf_id
        // where sr.gf_id = ".$gf_id." and sr.active_siblings_position=1 limit 1";

        $cQuery = "select if(fdata.IsStaff is not null, fdata.employee_id, sr.gr_no ) as father_photo,
                if(fdata.IsStaff is not null, 1, 0 ) as is_Staff,fdata.name as Father_name
                from atif.student_registered as sr
                left  join 
                (select sr.nic, sr.gf_id, sr.staff_id, sr.employee_id, sr.name, sr.staff_gender, st.id as IsStaff
                 from atif.students_family_staff as sr 
                left join atif.staff_registered as st on st.nic=sr.nic
                where sr.parent_type = 1 and sr.gf_id = ".$gf_id."  
                ) as fdata 
                on fdata.gf_id = sr.gf_id
                where sr.gf_id = ".$gf_id." and sr.active_siblings_position=1 order by sr.DOB limit 1";

        $query = DB::connection($this->dbCon)->select($cQuery);
        return $query;
 
    }

    public function getSiblingsInfo3($gf_id){
        // $result = false;
        $cQuery = "select if(fdata.IsStaff is not null, fdata.employee_id, sr.gr_no ) as mother_photo,
                if(fdata.IsStaff is not null, 1, 0 ) as is_Staff,fdata.name as mother_name
                from atif.student_registered as sr
                left  join 
                (select sr.nic, sr.gf_id, sr.staff_id, sr.employee_id, sr.name, sr.staff_gender, st.id as IsStaff
                 from atif.students_family_staff as sr 
                left join atif.staff_registered as st on st.nic=sr.nic
                where sr.parent_type = 2 and sr.gf_id = ".$gf_id."  
                ) as fdata 
                on fdata.gf_id = sr.gf_id
                where sr.gf_id = ".$gf_id." and sr.active_siblings_position=1 order by sr.DOB limit 1";
        
        $query = DB::connection($this->dbCon)->select($cQuery);
        return $query;
  
    }

    public function getParentStaffInfo($gf_id){
        $cQuery = "select * from atif.students_family_staff where  parent_type = 1 and gf_id = ".$gf_id;
        $query = DB::connection($this->dbCon)->select($cQuery);          
        return $query;
    
    }

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

    public function get_Father_Pic($PhotoID){

        if (!file_exists(FATHER_PIC_500 . $PhotoID . PIC500_TYPE)){
            $PhotoID = 'NoPic';
        }
        $user['photo500'] = FATHER_PIC_500 . $PhotoID . PIC500_TYPE;
        $user['photo150'] = FATHER_PIC_150 . $PhotoID . PIC150_TYPE;
        return $user;
    
    }

}



// define("STUDENT_PIC_150", "assets/photos/sis/150x150/student/");
// define("STUDENT_PIC_500", "assets/photos/sis/500x500/student/");
// define("FATHER_PIC_150", "assets/photos/sis/150x150/father/");
// define("FATHER_PIC_500", "assets/photos/sis/500x500/father/");
// define("MOTHER_PIC_150", "assets/photos/sis/150x150/mother/");
// define("MOTHER_PIC_500", "assets/photos/sis/500x500/mother/");
// define("PIC150_TYPE", ".png");
// define("PIC500_TYPE", ".jpg");