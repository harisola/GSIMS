<?php
namespace App\Http\Controllers\Development;
use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_model;


class staff_recruitment_initiation_archive_ns extends Controller
{

  public function index()
  {


  	$userId = Sentinel::getUser()->id;
  	$staffRecruiment = new Staff_recruitment_model();
  	$RecruimentData = $staffRecruiment->get_recruitment_archive_data();
    $tag = $staffRecruiment->get_tag();
    $grade = $staffRecruiment->get_grade();
    $status = $staffRecruiment->get_status();
    $campus = $staffRecruiment->get_branch();
    $career_allocation = $staffRecruiment->get_allocation();
    $get_getTags = $staffRecruiment->get_getTags();

  	return view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_archive_view')
  			->with(array('staffRecruiment' => $RecruimentData,'tag'=> $tag,'grade'=>$grade,'status'=> $status,'campus' => $campus,'career_allocation'=>$career_allocation,"get_getTags"=>$get_getTags));
  }

public function allarchive(Request $request)
    {
    
$staffRecruiment = new Staff_recruitment_model();

    $Where = $this->MakeWhere($request);

    //$pathname = $request->input();
    $draw = $request->input('draw');
    $row = $request->input('start');
    $rowperpage = $request->input('length'); // Rows display per page
    $order = $request->input("order");
    $columnIndex = $order[0]['column']; // Column index
    $columns = $request->input("columns");
    $columnName = $columns[$columnIndex]['data']; // Column name
    $order = $request->input("order");
    $columnSortOrder = $order[0]['dir']; // asc or desc

    $search = $request->input("search");
    $searchValue = $search['value']; // Search value

    $searchValue = preg_replace("/[^a-zA-Z0-9-\/ ]+/", "", html_entity_decode($searchValue, ENT_QUOTES));

  ## Search 
  $searchQuery = " ";
  if($searchValue != ''){
    $searchQuery = " and ( af.gc_id like'%".$searchValue."%' or af.name like '%".$searchValue."%' or 
    af.nic like '%".$searchValue."%' 
    or af.mobile_phone like'%".$searchValue."%'  ) ";
  }

## Total number of records without filtering
$query = "select count( af.id) as allcount from atif_career.career_form as af

left join atif_career.career_status as cs
        on cs.id = af.status_id
      left join atif_career.career_stage as ct on ct.id = af.stage_id
      left join atif_career.career_form_data as part_b 
      on part_b.form_id = af.id and part_b.status_id = 11
      
      left join (select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified,
      lcf.status_id, lcf.stage_id

        from atif_career.log_career_form as lcf 
        order by lcf.created limit 1) as lcf
        on lcf.form_id = af.id
        
 WHERE 1 ".$Where." and af.id in ( select 
 
cf.id

 
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as lcf
where lcf.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id  )
 ) as dd
on dd.form_id = cf.id
where (cf.status_id=12 or cf.status_id=10 ) and dd.status_id=11 and cf.form_source=1

union 

select 
distinct( cf.id )  
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id )
 ) as dd
on dd.form_id = cf.id
where (cf.status_id=12 or cf.status_id=10 ) and dd.status_id=1

union
select 
 
f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
 
 union
 select 

( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=3



union
select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where f.status_id=12 and d.status_id=4

union
select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=5)
and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01'";
$count_result = $staffRecruiment->custom_query($query);

if(!empty($count_result))
{
  $totalRecords = $count_result[0]['allcount'];  
}
else
{
  $totalRecords = 0;
}


$sQu="select count(af.id) as allcount from atif_career.career_form as af 
left join atif_career.career_status as cs
        on cs.id = af.status_id
      left join atif_career.career_stage as ct on ct.id = af.stage_id
      left join atif_career.career_form_data as part_b 
      on part_b.form_id = af.id and part_b.status_id = 11
      
      left join (select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified,
      lcf.status_id, lcf.stage_id


        from atif_career.log_career_form as lcf 
        order by lcf.created limit 1) as lcf
        on lcf.form_id = af.id


WHERE 1 ".$searchQuery."  ".$Where."  and  af.id in ( select 
 
cf.id

 
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as lcf
where lcf.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id  )
 ) as dd
on dd.form_id = cf.id
where (cf.status_id=12 or cf.status_id=10 ) and dd.status_id=11 and cf.form_source=1

union 

select 
distinct( cf.id )  
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id )
 ) as dd
on dd.form_id = cf.id
where (cf.status_id=12 or cf.status_id=10 ) and dd.status_id=1

union
select 
 
f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
 
 union
 select 

( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=3



union
select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where f.status_id=12 and d.status_id=4

union
select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 )
and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01'";
$scount_result = $staffRecruiment->custom_query($sQu);


if(!empty($scount_result))
{
  $totalRecordwithFilter = $scount_result[0]['allcount'];
}
else
{
  $totalRecordwithFilter = 0;
}


## Fetch records
$empQuery = "select 

af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
af.nic, af.gender, af.position_applied, af.comments,
af.status_id, af.stage_id,
cs.name as status_name, cs.name_code as status_code,
ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
af.form_source as form_source2,
part_b.date as part_b_date, part_b.time as part_b_time,
if(part_b.campus=2, 'South',if(part_b.campus=1, 'North', '')) as Campus,
if(af.status_id != 11 and part_b.time is not null, 'Part-B completed', '') as part_b_complete,

(case 
when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
when af.status_id != 11 and part_b.time is not null then 'CompletedPartB'
else ''
end ) as PartB,

from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,

from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,

if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created

from atif_career.career_form as af 

left join atif_career.career_status as cs
on cs.id = af.status_id
left join atif_career.career_stage as ct on ct.id = af.stage_id
left join atif_career.career_form_data as part_b 
on part_b.form_id = af.id and part_b.status_id = 11

left join (select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified
from atif_career.log_career_form as lcf 
order by lcf.created limit 1) as lcf
on lcf.form_id = af.id

WHERE 1 ".$searchQuery." and af.id in( select 
 
cf.id

 
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as lcf
where lcf.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id  )
 ) as dd
on dd.form_id = cf.id
where (cf.status_id=12 or cf.status_id=10 ) and dd.status_id=11 and cf.form_source=1

union 

select 
distinct( cf.id )  
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id )
 ) as dd
on dd.form_id = cf.id
where (cf.status_id=12 or cf.status_id=10 ) and dd.status_id=1

union
select 
 
f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=2
 
 union
 select 

( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=3



union
select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where f.status_id=12 and d.status_id=4

union
select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=5 )  and ( af.status_id = 10 or af.status_id = 12 ) ".$Where."
and from_unixtime(af.created ,'%Y-%m-%d') >= '2018-10-01'  
order by af.created desc  limit ".$row.",".$rowperpage;

$empRecords = $staffRecruiment->custom_query($empQuery);

$data = array();


if( !empty( $empRecords ) )
{  
  
foreach ($empRecords as $row) {

              $position_applied='';
              $str = explode(",",$row["position_applied"]);
              if( sizeof( $str > 0 ) )
              { 
                foreach($str as $s ): 
                  $position_applied .= '<span class="itemSq">'.$s.'</span>'; 
                endforeach;
              } else{ 
                $position_applied = '<span class="itemSq">'.$row["position_applied"].'</span>';
              }


              $action = '';
              if($row["form_source2"] == 1) { 
                $action .= '<div class="btn-group pull-right part_b_append_ul_'.$row['career_id'].'">';
                $action .= '<button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Action<i class="fa fa-angle-down"></i></button>
                <ul class="dropdown-menu pull-right">
                <li class="print_form" data-walkin="'.$row["form_source"] .'" data-id="'.$row["gc_id"].'">
                <a href="javascript:;"><i class="fa fa-print " ></i> Print </a></li>';
                if( ($row["part_b_complete"] != 'Part-B completed') &&  ($row["status_name"] != 'Archive') ) {
                  $action .= '<li class="call_for_part_b" data-status="11" data-stage="9" data-form = "'.$row["career_id"].'">
                  </li>';
                
                }
                $action .= '</ul>';
                $action .= '</div>';
              } else { 
                $action .= '<div class="btn-group pull-right">';
                $action .= '<button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Action<i class="fa fa-angle-down"></i></button>
                <ul class="dropdown-menu pull-right">
                <li class="print_form" data-walkin="'.$row["form_source"].'" data-id="'.$row["gc_id"].'">
                <a href="http://10.10.10.63/gs/index.php/hcm/career_form_ajax/get_career_form_pdf_gcid?gc_id='.$row["gc_id"].'"><i class="fa fa-print"  ></i> Print </a></li>';
                
              }


              $gc_id = '<a data-id="'.$row['career_id'].'" data-name="'.$row['name'].'" class="gc_id_form_id classSahar">'.$row['gc_id'].'</a>';
              $Landline=$row["land_line"];

              $Apply_Date=$row["Created_date"];
              $Source=$row["form_source"];
              $Comments=$row["comments"];


              $applicante_name = '<span  data-container="body" data-placement="top" data-original-title="'.$row["status_name"].'"  class="tooltips boxidentification '.str_replace(' ', '', $row["status_name"]).'">&nbsp;</span>';
              $applicante_name .= ucfirst($row["name"]);

              if($row["status_id"] == 11){ 
                if($row['part_b_date'] == ''){
                  $applicante_name .= '<br>';
                  $applicante_name .= '<small style="color: #888;" id="call_for_part_b_flag_'.$row['career_id'].'">Call for Part B</small><br />';
                }
                if(!empty($row['part_b_date'])){ 
                  $applicante_name .= '<br>';
                  $applicante_name .= '<small style="color: #888;" id="expected_part_b_flag_'.$row['career_id'].'">Expected for Part B on <strong style="color:#000;">'.
                  date('d M, Y', strtotime($row['part_b_date'])).'</strong> at <strong style="color:#000;">'.date('g:i a', strtotime($row['part_b_time'])).'</strong></small>';
                  $applicante_name .= '</br>';
                }
              }

              if($row["part_b_complete"] != "") { 
                $applicante_name .= '<br>';
                $applicante_name .= '<small style="color: #888;" id="call_for_part_b_presence_flag_'.$row['career_id'].'">'.$row["part_b_complete"].'</small>';
                $applicante_name .= '<br>';
              }
              if($row['status_name'] == 'Archive'){ 
                $applicante_name .= '<br>';
                $applicante_name .= '<small style="color: #888;">File For Future</small><br />';
              }
              if($row['status_name'] == 'Regret'){ 
                $applicante_name .= '<br>';
                $applicante_name .= '<small style="color: #888;">Regret</small><br />';
              }

              $Standing = $row["status_name"];
              $Modified_date = $row["Date_of_application"];

              $data[] = array( 
                "gc_id"=>$gc_id,
                "name"=>$applicante_name,
                "position_applied"=>$position_applied,
                "Action" => $action,
                "mobile_phone"=>$row['mobile_phone'],
                "Landline"=>$Landline,
                "nic"=>$row['nic'],
                "Standing" => $Standing,
                "Apply_Date"=>$Apply_Date,
                "Source"=>$Source,
                "Comments"=>$Comments,
                "Modified_date"=>$Modified_date
              );
  } // end foreach;

}else
{
  $data = array();
}

  ## Response
  $response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecordwithFilter,
    "iTotalDisplayRecords" => $totalRecords,
    "aaData" => $data
  );
  echo json_encode($response);
  }

 public function MakeWhere(Request $request)
 {

$from_date_m =  $request->input('from_date_m');
$To_Date_m =  $request->input('To_Date_m');
$From_Date =  $request->input('From_Date');
if(!empty($request->input('To_Date')))
{
  $To_Date =  $request->input('To_Date'); 
}
else
{
  $To_Date =  $request->input('From_Date'); 
}
if(!empty($request->input('To_Date_m')))
{
$To_Date_m =  $request->input('To_Date_m'); 
}
else
{
$To_Date_m =  $request->input('from_date_m'); 
}


  $Where = '';
  
  if( !empty( $request->input('from_date_m') ) && ( $request->input('from_date_m') != '' )  )
  {
  $Where .= " AND ( ( from_unixtime(lcf.modified, '%Y-%m-%d') >= '".$from_date_m."' and from_unixtime(lcf.modified, '%Y-%m-%d') <= '".$To_Date_m."' )
      or
      ( from_unixtime(af.modified, '%Y-%m-%d') >= '".$from_date_m."' and from_unixtime(af.modified, '%Y-%m-%d') <= '".$To_Date_m."' )
      ) "; 
    }else if( !empty( $request->input('From_Date') ) && ( $request->input('From_Date') != '' )  )
    {

      $Where .= " AND ( ( from_unixtime(lcf.created, '%Y-%m-%d') >= '".$From_Date."' and from_unixtime(lcf.created, '%Y-%m-%d') <= '".$To_Date."' )
      or
      ( from_unixtime(af.created, '%Y-%m-%d') >= '".$From_Date."' and from_unixtime(af.created, '%Y-%m-%d') <= '".$To_Date."' )
      ) "; 
    }  
    
  $searchString = ',';
   
  if( !empty( $request->input('Source') ))
  {
    $Source = $request->input('Source');
    if( strpos($Source, $searchString) !== false ) {
      $Where .= " AND ( (af.form_source=1 or af.form_source=0) )";
    }else{
      if( $Source == 'Online' ){
        $Where .= " AND ( af.form_source=1 )";
      }else{
        $Where .= " AND ( af.form_source=0 )";
      }
    }
  }
    
    
  if( !empty( $request->input('CForPartB') ))
  {
    $CForPartB = $request->input('CForPartB');
    $Status = 0; $Stage = 0;
    if( strpos($CForPartB, $searchString) !== false ) {
      $exploded_CForPartB = explode(",",$CForPartB);
      $numItems = count($exploded_CForPartB);
      $i = 0;
      $Where .= " AND ( ";
      for($counter=0; $counter < $numItems; $counter++ )
      {
        $CForPartB2 = $exploded_CForPartB[$counter]; 
        switch( $CForPartB2 )
        {
          case 'CallForPartB' : 
            $Status = 11; $Stage = 9; 
            $lcf_Status1 = 11; $lcf_Stage1 = 9; 
            $lcf_Status = 1; $lcf_Stage = 1;
            break;
          case 'CommunicatedForPartB' : 
            $Status = 11; $Stage = 10; 
            $lcf_Status = 11; $lcf_Stage = 10; 
            $lcf_Status1 = 11; $lcf_Stage1 = 10;
            break;
          case 'CompletedPartB' : 
            $Status = 11; $Stage = 4; 
            $lcf_Status = 11; $lcf_Stage = 4; 
            $lcf_Status1 = 11; $lcf_Stage1 = 4;
            break;
        }
        $Where  .= " ( ( lcf.status_id=".$lcf_Status1." and lcf.stage_id=".$lcf_Stage1." ) or ( lcf.status_id=".$lcf_Status." and lcf.stage_id=".$lcf_Stage." ) or (af.status_id=".$Status." and af.stage_id=".$Stage." ) )";
        
        if(++$i === $numItems) {}else{ $Where  .= " OR "; }
      }
      $Where .= " )  ";
    }else{
      switch( $CForPartB )
      {
        case 'CallForPartB' : 
            $Status = 11; $Stage = 9; 
            $lcf_Status1 = 11; $lcf_Stage1 = 9; 
            $lcf_Status = 1; $lcf_Stage = 1;
            break;
          case 'CommunicatedForPartB' : 
            $Status = 11; $Stage = 10; 
            $lcf_Status = 11; $lcf_Stage = 10; 
            $lcf_Status1 = 11; $lcf_Stage1 = 10;
            break;
          case 'CompletedPartB' : 
            $Status = 11; $Stage = 4; 
            $lcf_Status = 11; $lcf_Stage = 4; 
            $lcf_Status1 = 11; $lcf_Stage1 = 4;
            break;
      }
      $Where  .= " AND ( ( lcf.status_id=".$lcf_Status1." and lcf.stage_id=".$lcf_Stage1." ) or ( lcf.status_id=".$lcf_Status." and lcf.stage_id=".$lcf_Stage." ) or (af.status_id=".$Status." and af.stage_id=".$Stage." ) )";
    }
    
  } 
  
  
  /*if( !empty( $request->input('Position') ))
  {
    $Position =  $request->input('Position');
    if( strpos($Position, $searchString) !== false ) {
      $p = explode(",",$Position);
      $count_p = count($p);
      $Where .= " AND ( ". $this->makeWhereCaluse($Position, ',', 'c.position_applied', 0, 'OR', $count_p) . " ) ";
    }else{
      $Where .= " AND ( c.position_applied='".$Position."' )";
    }
  }*/

  if( !empty( $request->input('Position') ))
  {
    $Position =  $request->input('Position');
    $count_p = 0;
    if( strpos($Position, $searchString) !== false ) {
      $p = explode(",",$Position);
      $count_p = count($p);
    }else{
      #$Where .= " AND ( c.position_applied='".$Position."' )";
    }
    $Where .= " AND ( ". $this->makeWhereCaluse($Position, ',', 'af.position_applied', 0, 'OR', $count_p) . " ) ";
  } 
  
  if( !empty( $request->input('Current_Standing') ))
  {
    $Current_Standing =  $request->input('Current_Standing');
    $count_p2 = 0;
    $c=1;
    $value='';
    $skip=true;
    if( strpos($Current_Standing, $searchString) !== false ) {
      $p = explode(",",$Current_Standing);
      $count_p2 = count($p);
      $c=1;
      for($a=0; $a < $count_p2; $a++){
        
        if( $p[$a]=='Archive' ){ $c=10; }
        if($skip){ 
          $value .= $c; 
          $skip=false; 
        }else{ 
          $value .= ','.$c; 
        }
        $c++;
        
      }
      
    }else{
      $value=$Current_Standing;
      switch( $Current_Standing )
      {
        case 'Form Screening': $value=1; break; case 'Initial Interview': $value=2; break;
        case 'Formal Interview': $value=3; break; case 'Observation': $value=4; break;
        case 'Final Consultation': $value=5; break; case 'Archive': $value=10; break;
      }
    }
    $Where .= " AND ( ". $this->makeWhereCaluse($value, ',', 'af.status_id', 0, 'OR', $count_p2) . " ) ";
  }
  
  
  if( !empty( $request->input('Campus') ))
  {
    $Campus = $request->input('Campus');
    if( strpos($Campus, $searchString) !== false ) {
      $Where .= " AND ( part_b.campus=1 or part_b.campus=2 )";
    }else{
      if( $Campus == 'South' ){
        $Where .= " AND ( part_b.campus=2 )";
      }else{
        $Where .= " AND ( part_b.campus=1 )";
      }
    }
  }
  
  return $Where;
 }


  public function makeWhereCaluse($stringArray, $seprator, $makeWithName, $IsNum, $LogicOperator, $RemoveLast){
    $Strings = explode($seprator, $stringArray);

    $i = 1;
    $WhereClause = '';
    if(strpos($stringArray, $seprator)>0){
      $WhereClause = '(';
      foreach ($Strings as $dd) {
        if($dd == 'All' || (count($Strings)==$i && $RemoveLast==1)){
          break;
        }else{
          if($IsNum==0){
            $WhereClause .= $makeWithName . "= '" . $dd . "' " . $LogicOperator . " ";
          }else{
            $WhereClause .= $makeWithName . "= " . $dd . " " . $LogicOperator . " ";
          }
        }
        $i++;
      }
      $WhereClause = substr($WhereClause, 0, -(strlen($LogicOperator)+2));
      $WhereClause .= ')';
    }else{
      if($stringArray!='' && $stringArray != 'All' && $stringArray != 'All,'){
        $WhereClause = '(' . $makeWithName . "=" . "'".$stringArray."'" . ')';
      }
    }

    return $WhereClause;
  }



 public function modified_form_archive(Request $request)
{
$staffRecruiment = new Staff_recruitment_model();
$userID = Sentinel::getUser()->id;

$Where = $this->MakeWhere($request);
  
  
/*
  $RecruimentData = $staffRecruiment->get_recruitment_data_where($Where);
  #var_dump( $RecruimentData ); exit;
  $returnHTML = view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_view_reload2')->with('staffRecruiment', $RecruimentData)->render();
  return response()->json(array('success' => true, 'html'=>$returnHTML));*/

  $draw = $request->input('draw');
  $row = $request->input('start');
  $rowperpage = $request->input('length'); // Rows display per page
  $order = $request->input("order");
  $columnIndex = $order[0]['column']; // Column index
  $columns = $request->input("columns");
  $columnName = $columns[$columnIndex]['data']; // Column name
  $order = $request->input("order");
  $columnSortOrder = $order[0]['dir']; // asc or desc

  $search = $request->input("search");
  $searchValue = $search['value']; // Search value
  
  $searchValue = preg_replace("/[^a-zA-Z0-9-\/ ]+/", "", html_entity_decode($searchValue, ENT_QUOTES));


## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (af.name like '%".$searchValue."%' or 
        af.mobile_phone like '%".$searchValue."%' or 
        af.nic like'%".$searchValue."%' or af.gc_id like'%".$searchValue."%') ";
}


## Fetch records
$empQuery = "select 

af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
      af.nic, af.gender, af.position_applied, af.comments,
      af.status_id, af.stage_id,
      cs.name as status_name, cs.name_code as status_code,
      ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
      af.form_source as form_source2,
      part_b.date as part_b_date, part_b.time as part_b_time,
      if(part_b.campus=2, 'South',if(part_b.campus=1, 'North', '')) as Campus,
      if(af.status_id != 11 and part_b.time is not null, 'Part-B completed', '') as part_b_complete,
      
      (case 
      when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
      when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
      when af.status_id != 11 and part_b.time is not null then 'CompletedPartB'
      else ''
      end ) as PartB,
      
        
      from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
      from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
        
      
      from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,

      if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created


from atif_career.career_form as af 

left join atif_career.career_status as cs on cs.id = af.status_id 
left join atif_career.career_stage as ct on ct.id = af.stage_id 
left join atif_career.career_form_data as part_b on part_b.form_id = af.id and part_b.status_id = 11 
left join (select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified,
      lcf.status_id, lcf.stage_id


        from atif_career.log_career_form as lcf 
        order by lcf.created limit 1) as lcf
        on lcf.form_id = af.id

WHERE 1 ".$searchQuery."  and  ( af.status_id = 10 or af.status_id = 12 ) ".$Where." order by af.created desc  limit ".$row.",".$rowperpage;


## Total number of records without filtering
$query = "select count(af.id) as allcount from atif_career.career_form as af 

left join atif_career.career_status as cs
        on cs.id = af.status_id
      left join atif_career.career_stage as ct on ct.id = af.stage_id
      left join atif_career.career_form_data as part_b 
      on part_b.form_id = af.id and part_b.status_id = 11
      
      left join (select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified,
      lcf.status_id, lcf.stage_id


        from atif_career.log_career_form as lcf 
        order by lcf.created limit 1) as lcf
        on lcf.form_id = af.id

WHERE 1 and ( af.status_id = 10 or af.status_id = 12 ) ".$Where." ";
$count_result = $staffRecruiment->custom_query($query);
$totalRecords = $count_result[0]['allcount'];

$sQu="select count(af.id) as allcount from atif_career.career_form as af 

left join atif_career.career_status as cs
        on cs.id = af.status_id
      left join atif_career.career_stage as ct on ct.id = af.stage_id
      left join atif_career.career_form_data as part_b 
      on part_b.form_id = af.id and part_b.status_id = 11
      
      left join (select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified,
      lcf.status_id, lcf.stage_id


        from atif_career.log_career_form as lcf 
        order by lcf.created limit 1) as lcf
        on lcf.form_id = af.id

WHERE 1 ".$searchQuery ." and  ( af.status_id = 10 or af.status_id = 12 )".$Where."  ";

$scount_result = $staffRecruiment->custom_query($sQu);
$totalRecordwithFilter = $scount_result[0]['allcount'];


#echo $empQuery; exit;

$empRecords = $staffRecruiment->custom_query($empQuery);
$data = array();
foreach ($empRecords as $row) {
  $position_applied='';
  $str = explode(",",$row["position_applied"]);
  if( sizeof( $str > 0 ) )
  { 
  foreach($str as $s ): 
  $position_applied .= '<span class="itemSq">'.$s.'</span>'; 
  endforeach;
  } else{ 
  $position_applied = '<span class="itemSq">'.$row["position_applied"].'</span>';
  }
               


$action = '';
  if($row["form_source2"] == 1) { 
  $action .= '<div class="btn-group pull-right part_b_append_ul_'.$row['career_id'].'">';
  $action .= '<button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Action<i class="fa fa-angle-down"></i></button>
<ul class="dropdown-menu pull-right">
<li class="print_form" data-walkin="'.$row["form_source"] .'" data-id="'.$row["gc_id"].'">
<a href="javascript:;"><i class="fa fa-print " ></i> Print </a></li>';
if( ($row["part_b_complete"] != 'Part-B completed') &&  ($row["status_name"] != 'Archive') ) {
$action .= '<li class="call_for_part_b" data-status="11" data-stage="9" data-form = "'.$row["career_id"].'"><a href="javascript:void(0)"><i class="fa fa-phone"></i> Call for Part B </a>
</li>';
if($row["status_id"] == 11 &&  $row["stage_id"] == 10) { 
$action .= '<li class="call_for_part_b" data-gc='.$row["gc_id"].'data-status="11" data-stage="4" data-form = "'.$row["career_id"].'">
<a href="" data-toggle="modal"><i class="fa fa-user"></i> Part B Presence </a></li>';
}
if( ($row["PartB"] != "CompletedPartB") && ($row["PartB"] != 'Archive') ) { 
$action .= '<li class=""><a class="Move_To_Archive" data-form="'.$row["career_id"].'" data-stage="'.$row["stage_id"].'" data-nametitle="'.$row["name"].'">
<i class="fa fa-user"></i> Move To Archive </a></li>';
}
}
$action .= '</ul>';
$action .= '</div>';
} else { 
$action .= '<div class="btn-group pull-right">';
$action .= '<button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Action<i class="fa fa-angle-down"></i></button>
<ul class="dropdown-menu pull-right">
<li class="print_form" data-walkin="'.$row["form_source"].'" data-id="'.$row["gc_id"].'">
<a href="http://10.10.10.63/gs/index.php/hcm/career_form_ajax/get_career_form_pdf_gcid?gc_id='.$row["gc_id"].'"><i class="fa fa-print"  ></i> Print </a></li>';

}


      $gc_id = '<a data-id="'.$row['career_id'].'" class="gc_id_form_id classSahar">'.$row['gc_id'].'</a>';
      $Landline=$row["land_line"];
      
      $Apply_Date=$row["Created_date"];
      $Source=$row["form_source"];
      $Comments=$row["comments"];
      

    $applicante_name = '<span  data-container="body" data-placement="top" data-original-title="'.$row["status_name"].'" class="tooltips boxidentification '.str_replace(' ', '', $row["status_name"]).'">&nbsp;</span>';
    $applicante_name .= ucfirst($row["name"]);

    if($row["status_id"] == 11){ 
      if($row['part_b_date'] == ''){
        $applicante_name .= '<br>';
        $applicante_name .= '<small style="color: #888;" id="call_for_part_b_flag_'.$row['career_id'].'">Call for Part B</small><br />';
      }
      if(!empty($row['part_b_date'])){ 
      $applicante_name .= '<br>';
      $applicante_name .= '<small style="color: #888;" id="expected_part_b_flag_'.$row['career_id'].'">Expected for Part B on <strong style="color:#000;">'.
      date('d M, Y', strtotime($row['part_b_date'])).'</strong> at <strong style="color:#000;">'.date('g:i a', strtotime($row['part_b_time'])).'</strong></small>';
      $applicante_name .= '</br>';
       }


      }

      if($row["part_b_complete"] != "") { 
        $applicante_name .= '<br>';
        $applicante_name .= '<small style="color: #888;" id="call_for_part_b_presence_flag_'.$row['career_id'].'">'.$row["part_b_complete"].'</small>';
        $applicante_name .= '<br>';
      }
      if($row['status_name'] == 'Archive'){ 
        $applicante_name .= '<br>';
        $applicante_name .= '<small style="color: #888;">File For Future</small><br />';
      }
      if($row['status_name'] == 'Regret'){ 
        $applicante_name .= '<br>';
        $applicante_name .= '<small style="color: #888;">Regret</small><br />';
      }


      $Standing = $row["status_name"];
      $Modified_date = $row["Date_of_application"];

   $data[] = array( 
      "gc_id"=>$gc_id,
      "name"=>$applicante_name,
      "position_applied"=>$position_applied,
      "Action" => $action,
      "mobile_phone"=>$row['mobile_phone'],
      "Landline"=>$Landline,
      "nic"=>$row['nic'],
      "Standing" => $Standing,
      "Apply_Date"=>$Apply_Date,
      "Source"=>$Source,
      "Comments"=>$Comments,
      "Modified_date"=>$Modified_date
      
   );
}

## Response
$response = array(
  
  
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecordwithFilter,
  "iTotalDisplayRecords" => $totalRecords,
  "aaData" => $data
  
);

echo json_encode($response);
}
 
   public function archiveLogs( Request $request )
{
$staffRecruiment = new Staff_recruitment_model();
    
    $userID = Sentinel::getUser()->id;
    $form_id = $request->input('Form_id');
    //$RecruimentData = $staffRecruiment->get_recruitment_archive_data($form_id);

    $RecruimentData = $staffRecruiment->Get_Logs($form_id);


  $returnHTML = view('master_layout.staff.staff_recruitment.staff_recruitment_initiation_view_load_logs')->with( array('staffRecruiment' => $RecruimentData,'userID'=> $userID ) )->render();
  return response()->json(array('success' => true, 'html'=>$returnHTML));
}


  public function update_archieve(Request $request){

    $staffRecruiment = new Staff_recruitment_model();
    $followupType = $request->input('followupType');
    $comments = $request->input('comments');
    $form_id = $request->input('form_id');
    $status_id = $request->input('status_id');
    $userID = Sentinel::getUser()->id;
    $formTime = time();

      $formData = array(
        'status_id' => 13,          
        'modified' => $formTime,
        'modified_by' => $userID
            
          );  

          $where_career_form_data =  array(
                      'id' => $form_id,
                      
                      );

          $staffRecruiment->updateFormdata('career_form', $where_career_form_data, $formData);             
   
      $data = array(
          'follow_type' => $followupType,
          'comment' => $comments,
          'form_id' => $form_id,
          'created' => $formTime,
          'register_by' => $userID,
          'modified' => $formTime,
          'modified_by' => $userID,
          'record_deleted' => 0
        );
        
         $staffRecruiment->insertFormData('career_followup_comments',$data);
         

}
}