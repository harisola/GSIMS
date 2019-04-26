<?php

namespace App\Models\Accounts;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class class_list extends Model
{
      protected $connection = 'default_Atif';
      protected $dbCon = 'mysql';
      protected $table = 'class_list';

       public function getInformationByGsId($gs_id,$bill_id){
    
         $query = "select a.dname as academic_name,c.*,fd.*,bcd.*,bcd.bill_cycle_no as bill_no,c.academic_session_id as a_session_id,c.id as student_id,bcd.id as bill_id,bcd.title as title from atif.class_list as c
left join atif_fee_student.fee_definition as fd
on (fd.academic_session_id = c.academic_session_id and  fd.grade_id = c.grade_id)

left join atif_fee_student.billing_cycle_definition bcd 
on (bcd.grade_id = c.grade_id and bcd.academic_session_id = c.academic_session_id and bcd.bill_cycle_no = $bill_id)

left join atif.student_family_record sfr on (sfr.gf_id = c.gf_id and sfr.parent_type = 1)

left join atif._academic_session a on a.id = c.academic_session_id   

where c.gs_id = '".$gs_id."'";



        $details = DB::connection('mysql_Career_fee_bill')->select($query);



        $details = collect($details)->map(function($x){ return (array) $x; })->toArray(); 


        if( !empty($details)){
          return   $details[0];  
        }
        else{
          return false;
        }
        

       	 
       }


       public function arrier_adjustments($gs_id){
          $query='select 

          cl.id as Student_id, cl.abridged_name, cl.gs_id, cl.grade_name, cl.section_dname, fb.total_payable, 
          r.received_amount, 
          if( r.id is null, fb.total_payable, ( CAST(fb.total_payable AS SIGNED) - SUM( CAST(r.received_amount AS SIGNED) ) ) ) as Arrear_adjustment
          from atif.class_list_1718 as cl
          left join atif_fee_student.fee_bill as fb
          on ( fb.student_id = cl.id and fb.academic_session_id = cl.academic_session_id and fb.bill_cycle_no=5)
          left join atif_fee_student.fee_bill_received as r
          on r.fee_bill_id = fb.id
          where fb.bill_cycle_no=5
          and fb.academic_session_id in(9,10)
          and ( fb.total_payable != r.received_amount or r.id is null )
          and cl.gs_id="'.$gs_id.'"
          group by cl.gs_id';

        $details = DB::connection('mysql_Career_fee_bill')->select($query);

        $details = collect($details)->map(function($x){ return (array) $x; })->toArray(); 
        var_dump($details);

        if( !empty($details)){
          return   $details[0];  
        }
        else{
          return false;
        }
       }

        public static function student_attendance($gs_id){

          $data=class_list::where('st.gs_id',$gs_id)
          ->select('st.date as first_date')
          ->join('atif_attendance.student_attendance as st','st.gs_id','=','class_list.gs_id')
          ->orderBy('st.id','asc')
          ->first();
           return $data['first_date'];
         //  $query='SELECT st.date AS first_date FROM atif.class_list cl
         //  join atif_attendance.student_attendance st 
         //  on st.gs_id=cl.gs_id
         //  where st.gs_id="$gs_id"
         //  order by st.id asc limit 1';

         // $details = DB::connection('mysql_Career_fee_bill')->select($query);
         //  $details = collect($details)->map(function($x){ return (array) $x; })->toArray(); 

        
         // print_r($details[0]);
       }


       public function newFeesInformation($gs_id){
          $query = "SELECT fee_bill.*, cl.abridged_name AS student_name,cl.gender,cl.gf_id as gfid_integer,cl.gs_id AS student_gs_id,cl.grade_name AS grade_name,cl.campus AS campus,cl.section_name AS section_name,std_data.name AS parent_name,std_data.parent_type,std_data.gf_id AS family_id,std_data.nic AS nic,cl.grade_id AS std_grade_id, DATE_FORMAT(fee_bill.bill_issue_date,'%a %d %b ,%y') AS bill_issue_date, DATE_FORMAT(fee_bill.bill_bank_valid_date,'%a %d %b ,%y') AS bill_bank_valid_date,sr.gt_id AS gt_id,cl.grade_id AS grade_id, DATE_FORMAT(fee_bill.bill_due_date,'%a %d %b ,%y') AS bill_due_date,fee_bill.oc_yearly AS total_yearly,cl.std_status_code, CONCAT('GF ',cl.gfid) AS gf_id, CONCAT('Instalment # 06') AS fee_bill_tittle_show
          FROM atif.class_list AS cl
          LEFT JOIN atif_fee_student.fee_bill AS fee_bill ON fee_bill.student_id = cl.id
          left join atif.students_all as sa on (sa.student_id = cl.id) 
          LEFT JOIN atif.student_family_record AS std_data ON (cl.gf_id = std_data.gf_id and std_data.nic = sa.tax_nic)
          LEFT JOIN atif.staff_child sc ON sc.gf_id = cl.gf_id
          LEFT JOIN atif.staff_registered sr ON (sr.id = sc.staff_id AND sr.is_active = 1 AND sr.staff_status <> 16)
          WHERE cl.gs_id = '$gs_id' AND fee_bill.academic_session_id IN (11, 12) 
          ORDER BY fee_bill.id DESC limit 1";
          $details = DB::connection('mysql_Career_fee_bill')->select($query);

        $details = collect($details)->map(function($x){ return (array) $x; })->toArray(); 

        
        return   $details[0];


       }

              public function classListInformation($gs_id){

//grade_id, section_id,class_no=0,class_no,created,call_name

       // $details=class_list::
       //      leftjoin('atif_fee_student.fee_bill as fee_bill','fee_bill.student_id','=','class_list.id')
       //    ->leftjoin('atif.student_family_record as std_data','class_list.gf_id','=','std_data.gf_id')
       //    ->select(['fee_bill.*','class_list.abridged_name as student_name','class_list.gender','class_list.gs_id as student_gs_id','class_list.grade_name as grade_name','class_list.campus as campus','class_list.section_name as section_name','std_data.name as parent_name','std_data.parent_type','std_data.gf_id as family_id','class_list.grade_id as std_grade_id'])
       //   ->where('gs_id',$gs_id)               
       //   ->whereIn('fee_bill.academic_session_id',[11,12])->OrderBy('class_list.id','desc')->first();

          $query = "SELECT * FROM atif.class_list
          WHERE gs_id = '$gs_id'";
         $details = DB::connection('mysql_Career_fee_bill')->select($query);
        $details = collect($details)->map(function($x){ return (array) $x; })->toArray(); 
        return   $details[0];


       }

       public function getInformationAllStudents(){
       	 $StudentClassList=class_list::
       	 // join('atif.student_family_record as std_data','class_list.gf_id','=','std_data.gf_id')
       	   // join('atif.fee_definition as std_info','fee_definition.grade_id','=','std_info.grade_id')
       	   join('atif_fee_student.fee_definition as fee_definition','class_list.grade_id','=','fee_definition.grade_id')
       	  ->join('atif_fee_student.billing_cycle_definition as bill_definition','class_list.grade_id','=','bill_definition.grade_id')

       	 ->leftjoin('atif_fee_student.concession_level_definition as fee_concession','class_list.id','=','fee_concession.student_id')
       	  ->leftjoin('atif_fee_student.fee_bill_received_info as fee_bill_received_info','class_list.id','=','fee_concession.student_id')

       	 ->select(['class_list.*','fee_definition.*','fee_concession.*','bill_definition.*','bill_definition.bill_cycle_no as bill_no','fee_definition.academic_session_id as a_session_id','class_list.id as student_id'])
       	 ->get();
       	 return $StudentClassList;
       }

      public function getStudentInformationByParamters($grade_id="",$section_id="",$gs_id="",$gf_id="",$gt_id="",$std_status_id="")
       {
              if(!empty($grade_id) && empty($section_id) && empty($gs_id) && empty($gf_id) && empty($gt_id)){
                     $StudentClassList=class_list::
                       where('gs_id','<>','rs.rgs_id')
                     ->whereIn('grade_id',$grade_id)
                    ->whereIN("std_status_code",['F-SNS','S-CFS','S-CPT','F-LLV','F-NAD','S-WNT','F-O2A'])
                     ->orderBy('generation_of', 'DESC')
                     ->orderBy('grade_id')
                     ->orderBy('section_id', 'ASC')
                     ->orderBy('class_no', 'ASC')
                     ->orderBy('created', 'ASC')
                     ->get();
                    

              }
              elseif(!empty($grade_id) && !empty($section_id) && empty($gs_id) && empty($gf_id) && empty($gt_id)){

                     $StudentClassList=class_list::whereIn('grade_id',$grade_id)
                                                 ->whereIn('section_id',$section_id)
                                                 ->orderBy('generation_of', 'DESC')
                                                 ->orderBy('section_id', 'ASC')
                                                 ->orderBy('class_no', 'ASC')
                                                 ->orderBy('created', 'ASC')
                                                 ->get();
              }
              elseif(!empty($gs_id) && empty($grade_id) && empty($section_id) && empty($gf_id) && empty($gt_id)){
                     $StudentClassList=class_list::
                     where('gs_id',$gs_id)
                     // ->where('gs_id','<>','rs.rgs_id')
                     ->orderBy('generation_of', 'DESC')
                     ->orderBy('section_id', 'ASC')
                     ->orderBy('class_no', 'ASC')
                     ->orderBy('created', 'ASC')
                     ->get();

              }elseif(!empty($std_status_id) && empty($gs_id) && empty($grade_id) && empty($section_id) && empty($gf_id) && empty($gt_id)){
        
                     $StudentClassList=class_list::where('std_status_id',$std_status_id)
                     ->orderBy('gf_id', 'ASC')
                     ->get();

              }elseif(!empty($gf_id) && empty($grade_id) && empty($section_id) && empty($gs_id) && empty($gt_id)){


              }elseif(!empty($gt_id) && empty($grade_id) && empty($section_id) && empty($gf_id) && empty($gt_id)){


              }
              

              return $StudentClassList;
       }

       public static function getTaxnicData($student_id){
                     $parent_data=students_all::whereIn('student_id',$grade_id)
                                                 ->first();
                        return $parent_data;
    }

}
