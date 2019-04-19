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

class visitor extends Model
{
    protected $connection = 'mysql_Visitor';
    protected $dbCon = 'mysql';
    protected $table = 'visitor';
    public $timestamps = false;
    protected $primaryKey = 'id';
    // $Today_Data = date('Y-m-d');

    public function checkVisitorRecordExistance($Today_Data,$rfid_dec){

        $details=visitor::where([['created',$Today_Data],['rfid_dec',$rfid_dec]])->get();
        return count($details);
        // echo $details;
    
    }

    public function updateVisitorRegRecord($Today_Data,$rfid_dec,$data){

        $record=visitor::where([['created',$Today_Data],['rfid_dec',$rfid_dec]])->update($data);
        //echo $data;

    }

    // public function checkVisitorReg($Today_Data,$campus_id,$nic,$rfid_dec){
    //     $details=visitor::where([['created',$Today_Data],['campus_id',$campus_id],['nic',$nic],['rfid_dec',$rfid_dec]])->get();
    //     return count($details);
    //     //echo $details;
    // }

    // public function updateVisitorReg($Today_Data,$campus_id,$nic,$rfid_dec,$data){
    //     $details=visitor::where([['created',$Today_Data],['campus_id',$campus_id],['nic',$nic],['rfid_dec',$rfid_dec]])->update($data);
    //     // return count($details);
    //     //echo $details;
    // }


    public function checkVisitorReg($name,$campus_id,$nic,$rfid_dec){

        $details=visitor::where([['name',$name],['campus_id',$campus_id],['nic',$nic],['rfid_dec',$rfid_dec]])
						->orderBy('id', 'DESC')
				        ->first();

		// $details = visitor::getPdo(['id',$id])->lastInsertId();;      
        // echo $details; exit;
        return count($details);
        //echo $details;
    
    }
    public function FamilycheckVisitorReg($name,$campus_id,$nic,$rfid_dec){

        $details=visitor::where([['name',$name],['campus_id',$campus_id],['nic',$nic],['rfid_dec',$rfid_dec]])->get();
        return count($details);
        //echo $details;
    
    }

    public function updateVisitorReg($name,$campus_id,$nic,$rfid_dec,$data){

        $details=visitor::where([['name',$name],['campus_id',$campus_id],['nic',$nic],['rfid_dec',$rfid_dec]])->update($data);
        // return count($details);
        //echo $details;
    
    }

    public function checkData($rfid_dec,$date){
        // $details=visitor::where([['rfid_dec',$rfid_dec],['created',$date]])->get();
         $details = "select v.id,v.time_in,v.time_out
					from atif_visitors.visitor as v 
					where v.rfid_dec = ".$rfid_dec." 
					and from_unixtime(v.created,'%Y-%m-%d') = ".$date." "; 
        
        return count($details);
        // echo $details; exit;
    
    }

    public function insert($table_name,$data){

        $id = DB::connection($this->dbCon)->table($table_name)->insertGetId($data);
        return $id;
    
    }

    public function getParentCardInfo($card_type,$card_rfid_dec){

    	$VQuery = "select vc.card_type,vc.card_no,vc.card_rfid_dec,vc.card_rfid_hex 
    			from atif_visitors.visitor_card as vc
    			where vc.card_type = ".$card_type."
    			and vc.card_rfid_dec = ".$card_rfid_dec." ";

    	$query = DB::connection($this->dbCon)->select($VQuery);
    	return $query;

    }

    public function gettimedata($nic,$rfid_dec){

    	$VQuery = "select v.id,v.time_in,v.time_out
					from atif_visitors.visitor as v 
					where v.nic = '".$nic."'
					and v.rfid_dec = ".$rfid_dec." 
					order by id desc limit 1";

    	$query = DB::connection($this->dbCon)->select($VQuery);
    	return $query;

    }

    public function getvivitordata($rfid_dec){

    	$VQuery = "select v.campus_id,v.name,v.gender,v.nic,v.id,v.time_in,v.time_out
					from atif_visitors.visitor as v 
					where v.rfid_dec = ".$rfid_dec."
					and from_unixtime(v.created,'%Y-%m-%d') = CURRENT_DATE()";

    	$query = DB::connection($this->dbCon)->select($VQuery);
    	return $query;

    }

    public function GetGS_IDForTapOutParent($type_id,$rfid_dec){

    	$VQuery = "select sfr.gf_id,sfr.parent_type,v.name,v.nic,v.mobile_phone,v.rfid_dec 
					from atif_visitors.visitor as v
					left join atif.student_family_record as sfr on sfr.nic=v.nic
					where v.type_id = ".$type_id."
					and v.rfid_dec = ".$rfid_dec."
					and from_unixtime(v.created,'%Y-%m-%d') = CURRENT_DATE()"; 

		$query = DB::connection($this->dbCon)->select($VQuery);
    	return $query;

    }
    //For parent
    public function Get_Parent_table_today_recored($type_id,$type_id1,$type_id2){

    	$VQuery = "select sfr.gf_id,vt.name as cardtype,v.nic,v.no_of_persons,v.name,
    			v.purpose,v.contact_department,vc.card_no,FROM_UNIXTIME(v.time_in,'%r') as timeIn,
    			from_unixtime(v.created,'%a, %b %d %Y') as cre_date
				from atif_visitors.visitor as v
				left join atif.student_family_record as sfr on sfr.nic = v.nic
				left join atif_visitors.visitor_card as vc on vc.card_rfid_dec = v.rfid_dec
				left join atif_visitors.visitor_type as vt on vt.id = v.type_id
				where FROM_UNIXTIME(v.created,'%Y-%m-%d') =  CURRENT_DATE()
				and v.type_id in (".$type_id.",".$type_id1.",".$type_id2.") 
                group by timeIn"; 

		$query = DB::connection($this->dbCon)->select($VQuery);
    	return $query;

    }
    //For Visitor
    public function Get_visitor_table_today_recored($type_id,$type_id1,$type_id2,$type_id3,$type_id4){

    	$VQuery = "select sfr.gf_id,vt.name as cardtype,v.nic,v.no_of_persons,v.name,
    			v.purpose,v.contact_department,vc.card_no,FROM_UNIXTIME(v.time_in,'%r') as timeIn,
    			from_unixtime(v.created,'%a, %b %d %Y') as cre_date
				from atif_visitors.visitor as v
				left join atif.student_family_record as sfr on sfr.nic = v.nic
				left join atif_visitors.visitor_card as vc on vc.card_rfid_dec = v.rfid_dec
				left join atif_visitors.visitor_type as vt on vt.id = v.type_id
				where FROM_UNIXTIME(v.created,'%Y-%m-%d') =  CURRENT_DATE()
				and v.type_id in (".$type_id.",".$type_id1.",".$type_id2.",".$type_id3.",".$type_id4.") "; 

		$query = DB::connection($this->dbCon)->select($VQuery);
    	return $query;

    }

    public function Get_admission_today_recored($card_rfid_dec,$type_id){

    	$VQuery = "select v.id,sfr.gf_id,sfr.parent_type,vt.name as cardtype,v.nic,v.no_of_persons,v.name,
    			v.campus_id,v.purpose,vc.card_no,FROM_UNIXTIME(v.time_in,'%r') as timeIn,
    			from_unixtime(v.created,'%a, %b %d %Y') as cre_date
				from atif_visitors.visitor as v
				left join atif.student_family_record as sfr on sfr.nic = v.nic
				left join atif_visitors.visitor_card as vc on vc.card_rfid_dec = ".$card_rfid_dec."
				left join atif_visitors.visitor_type as vt on vt.id = ".$type_id."
				where FROM_UNIXTIME(v.created,'%Y-%m-%d') =  CURRENT_DATE()
				and v.type_id = ".$type_id." ORDER BY v.id DESC LIMIT 1 ";

		$query = DB::connection($this->dbCon)->select($VQuery);
    	return $query;

    }

    public function Get_other_today_recored($card_rfid_dec,$type_id){

    	$VQuery = "select v.id,vt.name as cardtype,v.nic,v.no_of_persons,v.name,
    			v.campus_id,v.purpose,vc.card_no,FROM_UNIXTIME(v.time_in,'%r') as timeIn,
    			from_unixtime(v.created,'%a, %b %d %Y') as cre_date
				from atif_visitors.visitor as v
				left join atif_visitors.visitor_card as vc on vc.card_rfid_dec = ".$card_rfid_dec."
				left join atif_visitors.visitor_type as vt on vt.id = ".$type_id."
				where FROM_UNIXTIME(v.created,'%Y-%m-%d') =  CURRENT_DATE()
				and v.type_id = ".$type_id." ORDER BY v.id DESC LIMIT 1 ";

		$query = DB::connection($this->dbCon)->select($VQuery);
    	return $query;

    }

    public function getCardInfo($card_rfid_dec){

    	$VQuery = "select vc.card_type,vc.card_no,vc.card_rfid_dec,vc.card_rfid_hex 
    			from atif_visitors.visitor_card as vc
    			where vc.card_rfid_dec = ".$card_rfid_dec." ";

    	$query = DB::connection($this->dbCon)->select($VQuery);
    	return $query;

    }

}