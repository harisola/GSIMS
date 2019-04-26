<?php

namespace App\Models\Accounts;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Fee_concession_model extends Model
{
    
    protected $dbCon = 'mysql_Career_fee_bill';


    
  
   public function Get_Std_fb_Info( $Gs_id )
    {
    	
$query = "select 
cl.id as Student_id,
cl.gr_no as Photo_id,
cl.abridged_name as Abridged_name,
cl.gs_id as Gs_id,
cl.gfid as Gf_id,
SUBSTRING(cl.std_status_code,1,1) as Status_code,
cl.std_status_code as Status_code_,
cl.class_no as Class_no,
cl.grade_dname as Grade_name,
cl.section_dname as Section_name,
cl.student_status_dname as Status_,
cl.academic_session_id as Academic_session,
cl.house_short_name as House_name,
if( c.concession_id is null,0, c.concession_id) as Concession_id,
if( c.concession_id is null,0,1) as Is_Concession,
tp.id as Concession_Type_id,
tp.dname as Concession_Type,
c.Installment_1 AS Installment_1,
c.Installment_2 as Installment_2,
c.Installment_3 as Installment_3,
c.Installment_4 as Installment_4,
c.Installment_5 as Installment_5,
sr.name_code as Name_code,
from_unixtime( c.created_at, '%a, %D %M %Y' ) as Dated

from atif.class_list as cl
left join atif_fee_student.concessions_for_session as c on c.student_id = cl.id
left join atif_fee_student.concession_type_parameter tp
on ( tp.id = c.concession_code_id and cl.academic_session_id = c.academic_session_id and c.record_deleted=0 )

left join atif_gs_sims.users as u on u.id = c.created_by
left join atif.staff_registered as sr on sr.gg_id = u.email";


	$query .= " where cl.gs_id = '".$Gs_id."' ";


  $weeks = DB::connection($this->dbCon)
                ->select($query);

      $i = 0;
	   	foreach ($weeks as $u) { 
		    $pic = $this->get_Student_Pic($u->Photo_id);
		    $weeks[$i]->photo500 = $pic['photo500'];
		    $weeks[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }


	return $weeks;

  }


  public function Get_Std_fb_Info2( $Gs_id )
    {
    	
$query = "select 
cl.id as Student_id,
cl.gr_no as Photo_id,
cl.abridged_name as Abridged_name,
cl.gs_id as Gs_id,
cl.gfid as Gf_id,
SUBSTRING(cl.std_status_code,1,1) as Status_code,
cl.std_status_code as Status_code_,
cl.class_no as Class_no,
cl.grade_dname as Grade_name,
cl.section_dname as Section_name,
cl.student_status_dname as Status_,
cl.academic_session_id as Academic_session,
cl.house_short_name as House_name,
if( c.concession_id is null,0, c.concession_id) as Concession_id,
if( c.concession_id is null,0,1) as Is_Concession,
tp.id as Concession_Type_id,
tp.dname as Concession_Type,
c.Installment_1 AS Installment_1,
c.Installment_2 as Installment_2,
c.Installment_3 as Installment_3,
c.Installment_4 as Installment_4,
c.Installment_5 as Installment_5,
c.Installment_6 as Installment_6,
c.Installment_7 as Installment_7,
c.Installment_8 as Installment_8,
c.Installment_9 as Installment_9,
c.Installment_10 as Installment_10,
c.Installment_11 as Installment_11,
c.Installment_12 as Installment_12,
sr.name_code as Name_code,
from_unixtime( c.modified_at, '%a, %D %M %Y' ) as Dated,
1 as ConcessionType
from atif.class_list as cl
left join atif_fee_student.concessions_for_session as c on c.student_id = cl.id
left join atif_fee_student.concession_type_parameter tp
on ( tp.id = c.concession_code_id and cl.academic_session_id = c.academic_session_id and c.record_deleted=0 )

left join atif_gs_sims.users as u on u.id = c.modified_by
left join atif.staff_registered as sr on sr.gg_id = u.email";


	$query .= " where c.concession_id = '".$Gs_id."' ";


  $weeks = DB::connection($this->dbCon)
                ->select($query);

      $i = 0;
	   	foreach ($weeks as $u) { 
		    $pic = $this->get_Student_Pic($u->Photo_id);
		    $weeks[$i]->photo500 = $pic['photo500'];
		    $weeks[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }


	return $weeks;

  }



   public function Get_Std_fb_Info3( $Gs_id )
    {
    	
$query = "select 
cl.id as Student_id,
cl.gr_no as Photo_id,
cl.abridged_name as Abridged_name,
cl.gs_id as Gs_id,
cl.gfid as Gf_id,
SUBSTRING(cl.std_status_code,1,1) as Status_code,
cl.std_status_code as Status_code_,
cl.class_no as Class_no,
cl.grade_dname as Grade_name,
cl.section_dname as Section_name,
cl.student_status_dname as Status_,
cl.academic_session_id as Academic_session,
cl.house_short_name as House_name,
if( c.id is null,0, c.id) as Concession_id,

if( c.id is null,0,1) as Is_Concession,
if(tp.id=1,111, 122 ) as Concession_Type_id,
tp.name as Concession_Type,
c.percentage AS Installment_1,
0 as Installment_2,
0 as Installment_3,
0 as Installment_4,
0 as Installment_5,
sr.name_code as Name_code,
from_unixtime( c.modified, '%a, %D %M %Y' ) as Dated,
2 as ConcessionType

from atif.class_list as cl
inner join atif_fee_student.scholarship_for_session as c on (c.student_id = cl.id and c.academic_session_id=cl.academic_session_id)
left join atif_fee_student.scholarship_defination tp
on tp.id = c.scholarship_type 


left join atif_gs_sims.users as u on u.id = c.modified_by
left join atif.staff_registered as sr on sr.gg_id = u.email";


	$query .= " where c.id = '".$Gs_id."' ";


  $weeks = DB::connection($this->dbCon)
                ->select($query);

      $i = 0;
	   	foreach ($weeks as $u) { 
		    $pic = $this->get_Student_Pic($u->Photo_id);
		    $weeks[$i]->photo500 = $pic['photo500'];
		    $weeks[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }


	return $weeks;

  }


   public function Get_Std_fb_Info_m()
    {
    /*	
$query = "select 
cl.id as Student_id,
cl.gr_no as Photo_id,
cl.abridged_name as Abridged_name,
cl.gs_id as Gs_id,
cl.gfid as Gf_id,
SUBSTRING(cl.std_status_code,1,1) as Status_code,
cl.std_status_code as Status_code_,
cl.class_no as Class_no,
cl.grade_dname as Grade_name,
cl.section_dname as Section_name,
cl.student_status_dname as Status_,
cl.academic_session_id as Academic_session,
cl.house_short_name as House_name,
if( c.concession_id is null,0, c.concession_id) as Concession_id,
if( c.concession_id is null,0,1) as Is_Concession,
tp.id as Concession_Type_id,
tp.dname as Concession_Type,
c.Installment_1 AS Installment_1,
c.Installment_2 as Installment_2,
c.Installment_3 as Installment_3,
c.Installment_4 as Installment_4,
c.Installment_5 as Installment_5,
sr.name_code as Name_code,
from_unixtime( c.modified_at, '%a, %D %M %Y' ) as Dated

from atif.class_list as cl
inner join atif_fee_student.concessions_for_session as c on c.student_id = cl.id
left join atif_fee_student.concession_type_parameter tp
on ( tp.id = c.concession_code_id and cl.academic_session_id = c.academic_session_id and c.record_deleted=0 )
left join atif_gs_sims.users as u on u.id = c.modified_by
left join atif.staff_registered as sr on sr.gg_id = u.email";*/


$query="
select 
cl.id as Student_id,
cl.gr_no as Photo_id,
cl.abridged_name as Abridged_name,
cl.gs_id as Gs_id,
cl.gfid as Gf_id,
SUBSTRING(cl.std_status_code,1,1) as Status_code,
cl.std_status_code as Status_code_,
cl.class_no as Class_no,
cl.grade_dname as Grade_name,
cl.section_dname as Section_name,
cl.student_status_dname as Status_,
cl.academic_session_id as Academic_session,
cl.house_short_name as House_name,
if( c.concession_id is null,0, c.concession_id) as Concession_id,
if( c.concession_id is null,0,1) as Is_Concession,
tp.id as Concession_Type_id,
tp.dname as Concession_Type,
c.Installment_1 AS Installment_1,
c.Installment_2 as Installment_2,
c.Installment_3 as Installment_3,
c.Installment_4 as Installment_4,
c.Installment_5 as Installment_5,
c.Installment_6 as Installment_6,
c.Installment_7 as Installment_7,
c.Installment_8 as Installment_8,
c.Installment_9 as Installment_9,
sr.name_code as Name_code,
from_unixtime( c.modified_at, '%a, %D %M %Y' ) as Dated,
1 as Table_type
from atif.class_list as cl
inner join atif_fee_student.concessions_for_session as c on c.student_id = cl.id
left join atif_fee_student.concession_type_parameter tp
on ( tp.id = c.concession_code_id and cl.academic_session_id = c.academic_session_id and c.record_deleted=0 )
left join atif_gs_sims.users as u on u.id = c.modified_by
left join atif.staff_registered as sr on sr.gg_id = u.email



union


select 
cl.id as Student_id,
cl.gr_no as Photo_id,
cl.abridged_name as Abridged_name,
cl.gs_id as Gs_id,
cl.gfid as Gf_id,
SUBSTRING(cl.std_status_code,1,1) as Status_code,
cl.std_status_code as Status_code_,
cl.class_no as Class_no,
cl.grade_dname as Grade_name,
cl.section_dname as Section_name,
cl.student_status_dname as Status_,
cl.academic_session_id as Academic_session,
cl.house_short_name as House_name,
if( cc.id is null,0, cc.id) as Concession_id,
if( cc.id is null,0,1) as Is_Concession,
#tp.id as Concession_Type_id,
if(tp.id=1,111, 122 ) as Concession_Type_id,
tp.name as Concession_Type,

cc.percentage AS Installment_1,
0 as Installment_2,
0 as Installment_3,
0 as Installment_4,
0 as Installment_5,
0 as Installment_6,
0 as Installment_7,
0 as Installment_8,
0 as Installment_9,
sr.name_code as Name_code,
from_unixtime( cc.modified, '%a, %D %M %Y' ) as Dated,
2 as Table_type

from atif.class_list as cl
inner join atif_fee_student.scholarship_for_session as cc on cc.student_id = cl.id
left join atif_fee_student.scholarship_defination tp
on tp.id= cc.scholarship_type
left join atif_gs_sims.users as u on u.id = cc.modified_by
left join atif.staff_registered as sr on sr.gg_id = u.email";


  $weeks = DB::connection($this->dbCon)
                ->select($query);

      $i = 0;
	   	foreach ($weeks as $u) { 
		    $pic = $this->get_Student_Pic($u->Photo_id);
		    $weeks[$i]->photo500 = $pic['photo500'];
		    $weeks[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }


	return $weeks;

  }




	/**********************************************************************
    * Calling Student Pic 500px and 150px 
    * @input: 	Student PhotoID
    * @output: 	Student Pic Paths
    * Description:
    * 		If no picture found then get blankPic
    *********************************************************************
  */
	public function get_Student_Pic($PhotoID){
		if (!file_exists(STUDENT_PIC_500.$PhotoID.PIC500_TYPE)){
            $PhotoID = 'NoPic';
	    }
	    $user['photo500'] = STUDENT_PIC_500.$PhotoID.PIC500_TYPE;
	    $user['photo150'] = STUDENT_PIC_150.$PhotoID.PIC150_TYPE;

	    return $user;
	}

	public function Fun_update($query)
	{
		return DB::connection($this->dbCon)->update($query);
	}

	public function Fun_insert($query)
	{
		return DB::connection($this->dbCon)->insert($query);
	}



	public function Get_Remittance()
	{

		$query = "select 
cl.id as Student_id,
cl.gr_no as Photo_id,
cl.abridged_name as Abridged_name,
cl.gs_id as Gs_id,
cl.gfid as Gf_id,
SUBSTRING(cl.std_status_code,1,1) as Status_code,
cl.std_status_code as Status_code_,
cl.class_no as Class_no,
cl.grade_dname as Grade_name,
cl.section_dname as Section_name,
cl.student_status_dname as Status_,
cl.academic_session_id as Academic_session,
cl.house_short_name as House_name,
fr.name as Father_name,
fr.mobile_phone as Father_Mobile,
sr.name_code as Name_code,
from_unixtime( c.created_at, '%a, %D %M %Y' ) as Dated

from atif.class_list as cl
inner join atif_fee_student.remittance as c on ( c.student_id = cl.id and c.remittance_status=1 and cl.academic_session_id = c.academic_id)
left join atif_gs_sims.users as u on u.id = c.register_by
left join atif.staff_registered as sr on sr.gg_id = u.email 
left join atif.student_family_record as fr
on ( fr.gf_id= cl.gf_id and fr.parent_type=1) ";
		$results = DB::connection($this->dbCon)->select($query);
		return $results;
	}



	  public function Get_Std_fb_Info_remittance( $Gs_id )
    {
    	
$query = "select 
cl.id as Student_id,
cl.gr_no as Photo_id,
cl.abridged_name as Abridged_name,
cl.gs_id as Gs_id,
cl.gfid as Gf_id,
SUBSTRING(cl.std_status_code,1,1) as Status_code,
cl.std_status_code as Status_code_,
cl.class_no as Class_no,
cl.grade_dname as Grade_name,
cl.section_dname as Section_name,
cl.student_status_dname as Status_,
cl.academic_session_id as Academic_session,
cl.house_short_name as House_name,
fr.name as Father_name,
fr.mobile_phone as Father_Mobile,
sr.name_code as Name_code,
from_unixtime( c.created_at, '%a, %D %M %Y' ) as Dated,
if( c.remittance_id is null,0,1) as Already

from atif.class_list as cl
left join atif_fee_student.remittance as c on ( c.student_id = cl.id and c.remittance_status=1 and cl.academic_session_id = c.academic_id)
left join atif_gs_sims.users as u on u.id = c.register_by
left join atif.staff_registered as sr on sr.gg_id = u.email 
left join atif.student_family_record as fr
on ( fr.gf_id= cl.gf_id and fr.parent_type=1) ";


	$query .= " where cl.gs_id = '".$Gs_id."' ";


  $weeks = DB::connection($this->dbCon)
                ->select($query);

      $i = 0;
	   	foreach ($weeks as $u) { 
		    $pic = $this->get_Student_Pic($u->Photo_id);
		    $weeks[$i]->photo500 = $pic['photo500'];
		    $weeks[$i]->photo150 = $pic['photo150'];
		    $i++;
	    }


	return $weeks;

  }


  public function GetSession()
  {
  	$query = "select s.dname as Academic_Sesssion from
atif._academic_session as s
where s.is_active=1 limit 1";
$weeks = DB::connection($this->dbCon)->select($query);
return $weeks;
  }




 public function get_query($query)
  {
  	
$weeks = DB::connection($this->dbCon)->select($query);
return $weeks;
  }



    
}
