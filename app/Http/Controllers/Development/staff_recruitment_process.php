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

/*union
select 
4.1 as Query_num,
count( l.form_id ) as Total_form
from atif_career.log_career_form as l where l.status_id=11 and l.stage_id=10*/

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
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=1
where cf.status_id=2
 and cf.stage_id=8
And ( u.date is null or u.date >= curdate() )

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
union
select
count( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )
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
union
select
count( cf.id ) as Total_form
from atif_Career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id = cf.id and u.status_id=1
where cf.status_id=2 and ( u.date is null or u.date < curdate() )
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


UNION
select 
20 as Query_num,
count( cf.id ) as Total_form
from atif_career.career_form as cf 
left join atif_career.career_form_data as u on u.form_id=cf.id and u.status_id=2
where cf.status_id=3
 and cf.stage_id=8
And ( u.date is null or u.date >= curdate() )


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
where f.status_id=3 and (
case when d.date = '1970-01-01' then 
(select dd.date from atif_career.career_form_data as dd where dd.id < d.id and dd.form_id= d.form_id order by dd.id desc limit 1)
else d.date
end
)  < curdate()


) as ff";





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