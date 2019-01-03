<?php
/******************************************************************
* Author : Rohail Aslam
*******************************************************************/

namespace App\Http\Controllers\Development;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Core\SelectionList;
use App\Models\Staff\Staff_Recruitment\Staff_recruitment_process_model as RecM;

class staff_recruitment_process extends Controller{

  public function index()
  {
    $userId = Sentinel::getUser()->id;
    
    $query_resultant = $this->Create_Query();

    //var_dump($query_resultant); exit;

    return view('master_layout.staff.staff_recruitment.staff_recruitment_process_view')
      ->with(
          array('query_resultant' => $query_resultant)
        );
  }




public function get_process(Request $request)
{
  $Stage_id = $request->input('stage');
  $Stage_info = $this->Query_Get_Form_Info($Stage_id);
  $html =  view('master_layout.staff.staff_recruitment.sr_process_view_modal_table')->with( array('Stage_info' => $Stage_info ) )->render();
  return response()->json(array('success' => true, 'html'=>$html));
}

public function Query_Get_Form_Info($Stage_id)
{
  $RecM_Obj = new RecM();
  $Where = "";

  if($Stage_id == 'Online_Application')
  {
    $Where =" and af.id in(
    select 

    cf.id
    
from atif_career.career_form as cf where cf.form_source=1

  )";
  }

  else if($Stage_id == 'Fill_part_A')
  {
    $Where =" and af.id in(
select 
 
 cf.id 

from atif_career.career_form as cf 
left join atif_career.log_career_form as lcf on lcf.form_id=cf.id
where cf.form_source=1 and lcf.id is null

  )";
  }

  else if($Stage_id == 'Overall_Walkin_applications_part_A')
  {
    $Where =" and af.id in
    (

    select 
 
cf.id
 
from atif_career.career_form as cf where cf.form_source=0

  ) ";

  }

  else if($Stage_id == 'Part_A_Screening')
{
    $Where =" and af.id in(
select 
 
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

  )";

  }

  else if($Stage_id == 'Applicants_triggered')
{
    $Where =" and af.id in (

    select 
 cf.id 
from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9
  )";

  } 

  else if($Stage_id == 'Applicants_awating')
{
    $Where =" and af.id in ( 

select 
 cf.id  
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date >= curdate() )
  )";

  }

  else if($Stage_id == 'Overall_applicants')
{
    $Where =" and af.id in(

select 
cf.id
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
   ) ";

  } 

  else if($Stage_id == 'Applicants_currently')
{
    $Where =" and af.id in(

    select 
cf.id
    from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )

  )";
  }

  else if($Stage_id == 'Overall_applicants_part_A')
{
    $Where =" and af.id in(
    select 
cf.id
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id 
and u.status_id= 1
where cf.status_id=2 
and cf.stage_id=4 
and ( u.date is null or u.date >= curdate() ))

    ";
  }

  else if($Stage_id == 'Overall_applicants_moved')
{
    $Where =" and af.id in(

select 
 
lcf.id
from atif_career.career_form as lcf where lcf.status_id=11 and lcf.stage_id=6

  )";
  }

  else if($Stage_id == 'Overall_applicants_marked')
{
    $Where =" and af.id in(

select  d.form_id  
from( 
select  (l.form_id) as form_id  from atif_career.log_career_form as l 
where l.status_id=11 and l.stage_id =4 group by l.form_id
union
select  (l.id) as form_id  from atif_career.career_form as l 
where l.status_id=11 and l.stage_id =4 group by l.id

) as d

  )";
  }

  else if($Stage_id == 'Overall_Walkin_applications')
{
    $Where =" and af.id in(
select 

cf.id

from atif_career.career_form as cf where cf.form_source=0
  )";
  }

  else if($Stage_id == 'Overall_moved_to')
  {
    $Where =" and af.id in(

select 

cf.id

from atif_career.career_form as cf where cf.form_source=0
  )";
  }

  else if($Stage_id == 'Applicants_moved_to')
  {
    $Where =" and af.id in(

select  d.form_id  
from( 
select  (l.form_id) as form_id  from atif_career.log_career_form as l 
where l.status_id=11 and l.stage_id =4 group by l.form_id
union
select  (l.id) as form_id  from atif_career.career_form as l 
where l.status_id=11 and l.stage_id =4 group by l.id

union
select 
( cf.id ) as form_id
from atif_career.career_form as cf where cf.form_source=0

) as d


  )";
  }

  else if($Stage_id == 'Overall_applicants_moved_to_Regret')
  {
    $Where =" and af.id in(
  
select 
distinct( cf.id ) as Total_form
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id )
 ) as dd
on dd.form_id = cf.id
where (cf.status_id=12 or cf.status_id=10 ) and dd.status_id=1
 
 

  )";
  }

  else if($Stage_id == 'Applicants_in_Hold')
  {
    $Where =" and af.id in(

  )";
  }

  else if($Stage_id == 'Applicant_awaiting_for_full_form')
  {
    $Where =" and af.id in(

  select 
cf.id
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
where cf.status_id=2
 and cf.stage_id=8
And ( u.date is null or u.date >= curdate() )
)";
  }

  else if($Stage_id == 'Overall_applicants_present')
  {
    $Where =" and af.id in(

select 
 
 ( f.form_id ) as Total_form
from (
select   (l.form_id) as form_id from atif_career.log_career_form as l 
where l.status_id > 1 
and l.status_id != 10 
and l.status_id != 11 
and l.status_id != 12 
and l.stage_id != 8
group by l.form_id ) as f 

  )";
  }

  else if($Stage_id == 'Applicants_currently_initial')
  {
    $Where =" and af.id in(
select 

( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id 
and u.status_id= 1
where cf.status_id=2 
and cf.stage_id=4 
and ( u.date is null or u.date >= curdate() )

  )";
  }

  else if($Stage_id == 'Overall_applicant_moved_to_regret')
  {
    $Where =" and af.id in(

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



  )";
  }

  else if($Stage_id == 'Overall_applicants_moved_to_Followup')
  {
    $Where =" and af.id in(

select 
 
 (dd.Total_form) from(
select 
 ( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
union
select
 ( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )
) as dd
 


  )";
  }

  else if($Stage_id == 'Applicants_currently_in')
  {
    $Where =" and af.id in(

select 

cf.id



from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )

  )";
  }


  else if($Stage_id == 'Overall_applicants_given')
  {
    $Where =" and af.id in(

  select 
 
cf.id 

from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=13)  
)";
  }

  else if($Stage_id == 'Overall_applicants_not_interested')
  {
    $Where =" and af.id in(
select 

cf.id

from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=6)  
  )";
  }

  else if($Stage_id == 'Intial_Interview_Communication_Not')
  {
    $Where =" and af.id in(

select 
 
lcf.id

from atif_career.career_form as lcf where lcf.status_id=1 and lcf.stage_id=6

  )";

  }
  else if($Stage_id == 'Intial_Interview_for_formal')
  {
    $Where =" and af.id in(
 select 
 
 (ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
 ( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff

  )";
  }

  else if($Stage_id == 'Present_for_Formal_Interview')
  {
    $Where =" and af.id in(

    select 
distinct cf.form_id

from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=4)  )
";
  }

  else if($Stage_id == 'awaiting_for_Next_Step_interiew')
  {
    $Where =" and af.id in(

select 
 
 ( f_data.p_date ) as Total_form 
from (
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3
) as f_data
where f_data.p_date >= curdate()

  )";
  }

  else if($Stage_id == 'Regret_from_Formal')
  {
    $Where =" and af.id in(
select 
 
 cf.id  
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
where cf.status_id=2
 and cf.stage_id=8
And ( u.date is null or u.date >= curdate() )
  )";
  }

  else if($Stage_id == 'moved_to_Followup_interview')
  {
    $Where =" and af.id in(

select 
  ff.form_id

from(


select 
curdate() as p_date,

( cf.id ) as Total_form, cf.form_id as form_id
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,

( d.date ) as Total_form, f.id as form_id

from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff

  )";
  }
  else if($Stage_id == 'currently_in_Followup_presence')
  {
    $Where =" and af.id in(

select 
 
(ff.form_id) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
( d.date ) as Total_form, f.id as form_id
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff



  )";


  }

  else if($Stage_id == 'given_extension')
  {
    $Where =" and af.id in(
select 

lcf.id

from atif_career.career_form as lcf where lcf.status_id=3 and lcf.stage_id=13
  )";
  }

  else if($Stage_id == 'Not_Interested')
  {
    $Where =" and af.id in(
select 
lcf.id
from atif_career.career_form as lcf where lcf.status_id=3 and lcf.stage_id=6
  )";
  }

  else if($Stage_id == 'moved_to_Not_Interested')
  {
    $Where =" and af.id in(
select 

lcf.id

from atif_career.career_form as lcf where lcf.status_id=2 and lcf.stage_id=6

  )";
  }

  else if($Stage_id == 'awaiting_for_Observation')
  {
    $Where =" and af.id in(

    select 

(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=4 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff

  )";
  }
  else if($Stage_id == 'marked_Present_for_job')
  {
    $Where =" and af.id in(

    select 

cf.form_id

from atif_Career.log_career_form as cf 
where cf.status_id=4
and (cf.stage_id=4)  
)";
  }
  else if($Stage_id == 'currently_in_Observatio_for')
  {
    $Where =" and af.id in(
select 

( f_data.p_date ) as Total_form 
from (
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=4
) as f_data
where f_data.p_date >= curdate()

  )";
  }
  else if($Stage_id == 'applicant_moved_to_regret_form')
  {
    $Where =" and af.id in(

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


  )";
  }
  else if($Stage_id == 'Observation_Presence_Followup')
  {
    $Where =" and af.id in(

  )";
  }
  else if($Stage_id == 'no_actions')
  {
    $Where =" and af.id in(


    select 
  ff.form_id
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
( d.date ) as Total_form, f.id as form_id
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=4 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff




  )";
  }
  else if($Stage_id == 'given_extension_from_observation')
{
    $Where =" and af.id in(
    select 
lcf.id
from atif_career.career_form as lcf where lcf.status_id=4 and lcf.stage_id=13

)";
  }
  else if($Stage_id == 'applicants_moved_to_Not_Interested_to_moved')
{
    $Where =" and af.id in(
     select 
lcf.id
from atif_career.career_form as lcf where lcf.status_id=4 and lcf.stage_id=6
  )";
  }
  else if($Stage_id == 'Observation_Communication_not_interested')
{
    $Where =" and af.id in(

      select 
lcf.id
from atif_career.career_form as lcf where lcf.status_id=4 and lcf.stage_id=6

  )";
  }
  else if($Stage_id == 'Final_consultation_awaiting')
{
    $Where =" and af.id in(


    select 
 
 (ff.form_id ) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
 ( d.date ) as Total_form, f.id as form_id
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff



  )";
  }
  else if($Stage_id == 'present_for_Final')
{
    $Where =" and af.id in(
    select 


cf.id

from atif_Career.log_career_form as cf 
where cf.status_id=5
and (cf.stage_id=4) 
)";
  }
  else if($Stage_id == 'currently_in_Final')
{
    $Where =" and af.id in(


    select 
 
 ( f_data.form_id ) as Total_form 
from (
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date, f.id as form_id
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5
) as f_data
where f_data.p_date >= curdate()


  )";
  }
  else if($Stage_id == 'Final_Cons_To')
{
    $Where =" and af.id in(
select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=5

  )";
  }
  else if($Stage_id == 'Final_Cons_Presence')
{
    $Where =" and af.id in(


    select 
 
 (ff.form_id) as Total_form

from(
select 
curdate() as p_date,
 ( cf.id ) as Total_form, cf.form_id as form_id
from atif_Career.log_career_form as cf 
where cf.status_id=5 
and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
 ( d.date ) as Total_form, f.id as form_id

from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff


  )";
  }
  else if($Stage_id == 'recenntly_in_Followup_for_F')
{
    $Where =" and af.id in(


    select 
 
 (ff.form_id) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
 ( d.date ) as Total_form, f.id as form_id
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff

  )";
  }
  else if($Stage_id == 'Followup_Extension')
{
    $Where =" and af.id in(
select 

lcf.id

from atif_career.career_form as lcf where lcf.status_id=5 and lcf.stage_id=13
  )";
  }
  else if($Stage_id == 'Consultation_presence')
{
    $Where =" and af.id in(
    select 

    lcf.id

from atif_career.career_form as lcf where lcf.status_id=5 and lcf.stage_id=6
  )";
  }
  else if($Stage_id == 'final_communication_moved')
  {
    $Where =" and af.id in(

    select 

f.id

from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(lcf.id) as id
from atif_career.log_career_form as lcf  group by lcf.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=5

  )";
  } 


$Query_Return = $this->Query_Function($Where);
return $RecM_Obj->Create_query($Query_Return);

}


public function Query_Function($Where)
{
  return  $Query=" select 


af.id as career_id, af.gc_id, af.name, af.email, af.mobile_phone, af.land_line,
      af.nic, af.gender, af.position_applied, af.comments,
      af.status_id, af.stage_id,
      cs.name as status_name, cs.name_code as status_code,
      ct.name as stage_name, ct.name_code as stage_code, from_unixtime(af.created) as created, if(af.form_source=1, 'Online', 'Walkin' ) as form_source,
      af.form_source as form_source2,
      
      d.p_date as part_b_date, 
      d.p_time as part_b_time,
      
      
      if(d.p_campus=2, 'South',if(d.p_campus=1, 'North', '')) as Campus,
      
      if(af.status_id != 11 and d.p_time is not null, 'Part-B completed', '') as part_b_complete,
      
      (case 
      when af.status_id=11 and af.stage_id=9 then 'CallForPartB'
      when af.status_id=11 and af.stage_id=10 then 'CommunicatedForPartB'
      when af.status_id != 11 and d.p_time is not null then 'CompletedPartB'
      else ''
      end ) as PartB,
      
     
      
      from_unixtime(af.created,'%b %e, %Y %h:%i:%S %p') as Created_date,
      from_unixtime(af.modified,'%b %e, %Y %h:%i:%S %p') as Modified_date,
        
      
      from_unixtime(af.modified, '%b %e, %Y %h:%i:%S %p') as Date_of_application,

      if( lcf.created is null, from_unixtime(af.modified,'%Y-%m-%d'), from_unixtime(lcf.created,'%Y-%m-%d')) as log_created,
         d.comments_next_step,
      d.comments_applicant,
      d.comments_next_decision,
      d.comments_next_step_aloc 
      


      
      
from atif_career.career_form as af 
left outer join (
select 

(
case when s.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < s.id 
and dd.form_id= s.form_id order by dd.id desc limit 1)
else s.date
end
) as p_date,

(
case when s.date = '1970-01-01' then 
(select dd.time from atif_career.career_form_data as dd where dd.id < s.id 
and dd.form_id= s.form_id order by dd.id desc limit 1)
else s.time
end
) as p_time,
(
case when s.date = '1970-01-01' then 
(select dd.campus from atif_career.career_form_data as dd where dd.id < s.id 
and dd.form_id= s.form_id order by dd.id desc limit 1)
else s.campus
end
) as p_campus,


s.* from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id 
)
) 
as d on d.form_id = af.id
left join atif_career.career_status as cs on cs.id = af.status_id 
left join atif_career.career_stage as ct on ct.id = af.stage_id 
left join (
select lcf.form_id, (lcf.created) as created, (lcf.modified) as modified, lcf.status_id, lcf.stage_id
from atif_career.log_career_form as lcf 
order by lcf.created limit 1) as lcf on lcf.form_id = af.id
WHERE 1  
 ".$Where."
order by af.created desc";

}

  public function Create_Query()
  {

    $RecM_Obj = new RecM();

    $Query = "



select 
1 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=1

union
select 
2 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.log_career_form as l on l.form_id=cf.id
where cf.form_source=1 and l.id is null

union
select 
3 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9

union
select 
4 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date >= curdate() )

# Moved to call for part b presence followup
union
select 
4.1 as Query_num,
count( d.Total_form ) as Total_form
from(
select 
4.1 as Query_num,
( l.form_id ) as Total_form
from atif_career.log_career_form as l where l.status_id=11 
and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 )

union
select 
4.2 as Query_num,
( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
) as d

# Call for part b presence currently in followup
union
select 
4.2 as Query_num,
count( cf.Total_form ) as Total_form

from (
select 
 
( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() ) group by cf.id
) as cf

# Call for part b presence currently in followup 7 day passed
union
select 
4.3 as Query_num,
count( cf.Total_form ) as Total_form
from (
select 
 
( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() ) 
and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
group by cf.id
) as cf


union 
select  
4.4 as Query_num, 
(count(l.form_id) - count(distinct(l.form_id))) as Total_form 
from atif_career.log_career_form as l  where l.status_id=11 and l.stage_id=11 

union
select 
4.5 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=11 and l.stage_id=6


union
select 
5 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=0


union
select 
6 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.log_career_form as l on l.form_id=cf.id
where cf.form_source=0 
and l.id is not null



union
select 7 as Query_num,
count( d.id ) as Total_form
from( 
select (l.form_id) as id  from atif_career.log_career_form as l  
where l.status_id=11 and l.stage_id =4
union
select (l.id) as id  from atif_career.career_form as l 
where l.status_id=11 and l.stage_id =4

) as d

union
select 
8 as Query_num,
count( l.form_id ) as Total_form
from atif_career.log_career_form as l where l.status_id=1 and l.register_by > 0



union
select 
9 as Query_num,
count( cf.id ) as Total_form
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id  )
 ) as dd
on dd.form_id = cf.id
where (cf.status_id=12 or cf.status_id=10 ) and dd.status_id=11 and cf.form_source=1


union
select 
10 as Query_num,
count( cf.id ) as Total_form
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id  having l.status_id=1)
 ) as dd
on dd.form_id = cf.id
where (cf.status_id=12 or cf.status_id=10 ) and dd.status_id=1

UNION
select 
11 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
where cf.status_id=2
 and cf.stage_id=8
And ( u.date is null or u.date >= curdate() )



union
select 
12 as Query_num,
count( f.form_id ) as Total_form
from (
select  count(l.form_id) as form_id from atif_career.log_career_form as l 
where l.status_id > 1 
and l.status_id != 10 
and l.status_id != 11 
and l.status_id != 12 
and l.status_id != 13
and l.stage_id != 8
group by l.form_id ) as f


union
select 
13 as Query_num,
count(dd.Total_form) from(
select 
 ( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=13)  
union
select
( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )
) as dd


union
select 
14 as Query_num,
 count(dd.Total_form) from(
select 
 ( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.status_id=12 or cf.status_id=10 )  
union
select
 ( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )
) as dd



union 
select
15 as Query_num,
count(dd.Total_form) from(
select 
( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.status_id=12 or cf.status_id=10 ) 
union
select
( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )


and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day )
) as dd

union 
select 
16 as Query_num,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=13)  

union 
select 
17 as Query_num,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=6)  


union
select 
18 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=1 and l.stage_id=6



union 
select 
19 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id 
and u.status_id= 1
where cf.status_id=2 
and cf.stage_id=4 
and ( u.date is null or u.date >= curdate() )


UNION
/*select 
20 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=2
where cf.status_id=3
 and cf.stage_id=8
And ( u.date is null or u.date >= curdate() )*/

select 
20 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff



/* Form Interview Presence */
union 
select 
21 as Query_num, 
count( cf.id ) as Total_form 
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=4)  


/* Form Interview, wait for next step */
union
select 
22 as Query_num, 
count( f_data.p_date ) as Total_form 
from (
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3
) as f_data
where f_data.p_date >= curdate()



/* Form Interview, wait for next step */
union
select 
23 as Query_num, 
count(ff.Total_form) as Total_form

from(


select 
curdate() as p_date,
( cf.id ) as Total_form, cf.form_id as form_id
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)   group by cf.form_id

union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
( d.date ) as Total_form, f.id as form_id

from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate() group by f.id
) as ff





union
select 
24 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff




union
select 
25 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff


union
select 
26 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=3 and l.stage_id=6




union
select 
27 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=2 and l.stage_id=6


union
select 
28 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=3 and l.stage_id=13


union
select 
29 as Query_num,
count( f.id ) as Total_form
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
30 as Query_num,
count( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=2


# Start Formal Obervation


UNION
select 
31 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=4 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff



/* Form Interview Presence */
union 
select 
32 as Query_num, 
count( cf.id ) as Total_form 
from atif_Career.log_career_form as cf 
where cf.status_id=4
and (cf.stage_id=4) 

/* Form Interview, wait for next step */
union
select 
33 as Query_num, 
count( f_data.p_date ) as Total_form 
from (
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=4
) as f_data
where f_data.p_date >= curdate()



/* Form Interview, wait for next step */
union
select 
34 as Query_num, 
sum(ff.Total_form) as Total_form

from(
select 
curdate() as p_date,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=4 
and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form

from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=4 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff


union
select 
35 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=4 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff




union
select 
36 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=4 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff


union
select 
37 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=4 and l.stage_id=6



union
select 
38 as Query_num,
count( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where f.status_id=12 and d.status_id=4


union
select 
39 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=4 and l.stage_id=13

# End Obervation




# Final Consultation



UNION
select 
40 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  >=  curdate() ) as ff



/* Form Interview Presence */
union 
select 
41 as Query_num, 
count( cf.id ) as Total_form 
from atif_Career.log_career_form as cf 
where cf.status_id=5
and (cf.stage_id=4)  


/*  wait for next step */
union
select 
42 as Query_num, 
count( f_data.p_date ) as Total_form 
from (
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5
) as f_data
where f_data.p_date >= curdate()



/* Form Interview, wait for next step */
union
select 
43 as Query_num, 
sum(ff.Total_form) as Total_form

from(
select 
curdate() as p_date,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=5 
and (cf.stage_id=5 or cf.stage_id=6  or cf.stage_id=13)  

union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form

from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as ff


union
select 
44 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() ) as ff




union
select 
45 as Query_num, 
sum(ff.Total_form) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id 
and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=5 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  <  curdate() and from_unixtime(f.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 7 day ) ) as ff


union
select 
46 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=5 and l.stage_id=6



union
select 
47 as Query_num,
count( f.id ) as Total_form
from atif_career.career_form as f
left join ( 
select * from atif_career.log_career_form as lf where lf.id in(
select max(l.id) as id
from atif_career.log_career_form as l  group by l.form_id )
) as d
on d.form_id = f.id
where (f.status_id=12 or f.status_id=10 ) and d.status_id=5


union
select 
48 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=5 and l.stage_id=13


# End Final Consultation

";





return $RecM_Obj->Create_query($Query);


/*
select 
1 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=1

union
select 
2 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=1 and cf.register_by=0 and cf.status_id < 2

union
select 
3 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.status_id=11 and cf.stage_id=9

union
select 
4 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date >= curdate() )



union
select 
4.1 as Query_num,
sum( d.Total_form ) as Total_form
from(
select 
4.1 as Query_num,
count( l.form_id ) as Total_form
from atif_career.log_career_form as l where l.status_id=11 
and (l.stage_id=5 or l.stage_id=6 or l.stage_id=13 or l.stage_id=12)
union
select 
4.2 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
) as d


union
select 
4.2 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )

union
select 
4.3 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id= cf.status_id
where cf.status_id=11 and cf.stage_id=10 and ( u.date is null or u.date < curdate() )
and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 3 day )


union
select 
4.4 as Query_num,
(count(l.form_id) - count(distinct(l.form_id))) as Total_form
from atif_career.log_career_form as l  where l.status_id=11 and l.stage_id=11

union
select 
4.5 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=11 and l.stage_id=6


union
select 
5 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=0


union
select 
6 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf where cf.form_source=0 and cf.status_id=1 and cf.stage_id=1



union
select 7 as Query_num,
count( d.id ) as Total_form
from( 
select
cf.id 
from  atif_career.career_form as cf
left join  atif_career.log_career_form as l  on cf.id = l.form_id
where cf.form_source=1 and ( l.status_id=11  ) and (l.stage_id=4  )

group by l.form_id
) as d

union
select 
8 as Query_num,
count( cf.form_id ) as Total_form
from atif_career.career_form_data  as cf  where  cf.status_id=1 



union
select 
9 as Query_num,
count( cf.id ) as Total_form
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id  )
 ) as dd
on dd.form_id = cf.id
where cf.status_id=12 and dd.status_id=1


union
select 
10 as Query_num,
count( cf.id ) as Total_form
from atif_Career.career_form as cf
left join ( 
select * from atif_career.log_Career_form as l
where l.id in (
select max(cff.id) as id
from atif_career.log_career_form as cff  group by cff.form_id  )
 ) as dd
on dd.form_id = cf.id
where cf.status_id=12 and dd.status_id=2

UNION

select 
11 as Query_num,
sum( cf.Total_form ) as Total_form
from(

select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form

from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=2 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as cf




union
select 
12 as Query_num,
count( l.form_id ) as Total_form
from atif_career.LOG_career_form as l where l.status_id=2 and l.stage_id=4



union
select 
13 as Query_num,
sum(dd.Total_form) from(
select 
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=12 or cf.stage_id=13)  

UNION
select 
( cf.Total_form ) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=2 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id
order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as cf
) as dd



union
select 
14 as Query_num,
sum(dd.Total_form) from(
select 
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=12)  

UNION
select 
( cf.Total_form ) as Total_form
from(
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=2 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id
order by dd.id desc limit 1)
else d.date
end
)  < curdate()
) as cf


) as dd


union 
select
15 as Query_num,
sum(dd.Total_form) from(
select 
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=12)  
union
select
count( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )
and from_unixtime(cf.modified, '%Y-%m-%d') < ( curdate() - INTERVAL 3 day )
) as dd

union 
select 
16 as Query_num,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=13)  

union 
select 
17 as Query_num,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=2 
and (cf.stage_id=6)  


union
select 
18 as Query_num,
count( l.id ) as Total_form
from atif_career.career_form as l where l.status_id=1 and l.stage_id=6



union 
select 
19 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id 
and u.status_id= 1
where cf.status_id=2 
and cf.stage_id=4 
and ( u.date is null or u.date >= curdate() )


# Form Interview  

UNION
select 
20 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=2
where cf.status_id=3
and cf.stage_id=8
And ( u.date is null or u.date >= curdate() )

# Form Interview Presence 
union 
select 
21 as Query_num, 
count( cf.id ) as Total_form 
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=4)  

#Form Interview, wait for next step 

union
  
select 
22 as Query_num, 
count( f_data.p_date ) as Total_form 

from (
select 

(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date

from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3
) as f_data
where f_data.p_date >= curdate()

union
select 
23 as Query_num, 
sum(ff.Total_form)
from(
select 
curdate() as p_date,
count( cf.id ) as Total_form
from atif_Career.log_career_form as cf 
where cf.status_id=3 
and (cf.stage_id=5 or cf.stage_id=6 or cf.stage_id=12 or cf.stage_id=13)  

union
select 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
) as p_date,
count( d.date ) as Total_form
from atif_career.career_form as f
left outer join (
select * from atif_career.career_form_data as s where s.id in(
select 
max( cf.id ) as latest
from atif_career.career_form_data as cf 
group by cf.form_id )
) as d on d.form_id = f.id
where f.status_id=3 and 
(
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  

< 

curdate()
) as ff








*/

  }
}