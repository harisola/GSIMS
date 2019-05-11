<?php
/******************************************************************
* Author : Zia Khan
* Email : ziaisss@gmail.com
* Cell : +92-342-2775588
*******************************************************************/
namespace App\Http\Controllers\Attendance\Reports;

use Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\HR_Attendance\Adjustment_Approvel_model;

class Reports extends Controller
{
    public function mainPage()
    {
        $AAM = new Adjustment_Approvel_model();
        $staffinfo=$AAM->staff_info();

    $TopLineBottomLine = $this->TopLineBottomLine();
    


    return view('attendance.reports.hr_reports_view')->with(array("staffinfo"=>$staffinfo, "TopLineBottomLine" => $TopLineBottomLine));

    }



    public function reporst_staff_attendance(Request $request)
    {
        $Gt_id      = $request->input("Gt_id");
        $From_date  = $request->input("From_date");
        $Till_date  = $request->input("Till_date");

        $Report_Type  = $request->input("Report_Type");


        
        $result = array();

        $AAM = new Adjustment_Approvel_model();

        if( $Report_Type == 'Staff_Attendance' )
        {
        
            $result = $AAM->reports_staff_attendance($Gt_id, $From_date, $Till_date);
            $returnHTML = view('attendance.reports.staff_attendance.staff_attendance_feedback')->with( array('Staff_Attendance' => $result))->render();



        }
        else if( $Report_Type == 'Monthly_Attendance' )
        {
            $Staff_info = array();
            if( !empty($Gt_id) )
            {
               foreach ($Gt_id as $Staff_id ) 
               {
                   $result = $AAM->reports_monthly_attendance($Staff_id, $From_date, $Till_date);
                   array_push($Staff_info, $result);
               }
                   
            }
        
            $returnHTML = view('attendance.reports.staff_attendance.monthly_attendance_feedback')->with( array('Staff_Attendance' => $Staff_info))->render();

        }
        


         


        

        return response()->json(array('success' => true, 'html'=>$returnHTML));


        
    }


    public function TopLineBottomLine( $Where=NULL, $Where_Staff=NULL )
    {
        
        $AAM = new Adjustment_Approvel_model();

        $query = "SELECT DISTINCT sr.c_bottomline AS Department FROM atif.staff_registered AS sr WHERE 1 and sr.is_posted=1 AND sr.is_active=1 ". $Where ;
        $Department =  $AAM->SelectQeury($query);


        $query = "SELECT DISTINCT sr.c_topline AS Designation FROM atif.staff_registered AS sr WHERE 1 and sr.is_posted=1 AND sr.is_active=1 ". $Where ;
        $Designation = $AAM->SelectQeury($query);



        $query = "SELECT DISTINCT safft.id AS Profile_id, safft.`name` AS Profile_name 
FROM atif_gs_events.tt_profile_time_staff AS sr 
LEFT JOIN atif_gs_events.tt_profile AS safft ON safft.id=sr.profile_id
WHERE 1 ". $Where_Staff ;


        $Profile_name = $AAM->SelectQeury($query);


        $query = "SELECT DISTINCT st.id AS Status_id, st.`code` AS Status_Code FROM atif._staffstatus AS st
LEFT JOIN atif.staff_registered AS sr ON sr.staff_status=st.id
WHERE 1 and sr.is_posted=1 AND sr.is_active=1 ". $Where;

        $Status_Code = $AAM->SelectQeury($query);


        $query = "SELECT sr.id AS Staff_id, sr.abridged_name FROM atif.staff_registered AS sr WHERE 1 and sr.is_posted=1 AND sr.is_active=1 ". $Where ;
        $Staff_info = $AAM->SelectQeury($query);



        return array(
            "Department"=>$Department, 
            "Designation"=>$Designation, 
            "Profile_name"=>$Profile_name, 
            "Status_Code"=>$Status_Code, 
            "Staff_info" => $Staff_info
        );

    }


    public function Create_Dw(Request $request)
    {
        $AAM = new Adjustment_Approvel_model();

        $DropdownType = $request->input("DropdownType");
        $Staff_id     = $request->input("value");

        $From_date    = $request->input("From_date");
        $Till_date    = $request->input("Till_date");

      
        $totalLen = sizeof($Staff_id);
       

      
       $Where=NULL;
       $Where_Staff=NULL;
       $return = array();


        if( $DropdownType == "Staff_name")
        {
            $Staff_id =  implode(",",$Staff_id);
            $Where = " AND sr.id IN (".$Staff_id.") ";
            $Where_Staff = " AND sr.staff_id IN (".$Staff_id.") ";
            /*$return = $this->TopLineBottomLine( $Where, $Where_Staff ); */

        }
        else if( $DropdownType == "Designation")
        {
            $Stafflist = array();

            $va_like = "AND ";
            $va_like .= "( ";
            $c=1;
            for($i=0; $i < $totalLen; $i++)
            {
                $va_like .= " sr.designation LIKE '%".$Staff_id[$i]."%'  ";
                if( $totalLen > $c ) { $va_like .= " OR "; }
                $c++;
            }
            $va_like .= " ) ";
            $Sql = "SELECT sr.id AS Staff_id FROM atif.staff_registered AS sr WHERE 1 ";
            $Sql .= $va_like;
            $Sql .= " AND sr.is_active=1 AND sr.is_posted=1"; 
            $DSt_id = $AAM->SelectQeury($Sql);
            foreach ($DSt_id as $v) 
            {
                $s = $v["Staff_id"];    
                array_push($Stafflist, $s);
            }
            
            $Staff_id =  implode(",",$Stafflist);



            $Where = " AND sr.id IN (".$Staff_id.") ";
            $Where_Staff = " AND sr.staff_id IN (".$Staff_id.") ";

         // end else if Designation   
        }else if( $DropdownType == "Department")
        {


            $Stafflist = array();

            $va_like = "AND ";
            $va_like .= "( ";
            $c=1;
            for($i=0; $i < $totalLen; $i++)
            {
                $va_like .= " sr.department LIKE '%".$Staff_id[$i]."%'  ";
                if( $totalLen > $c ) { $va_like .= " OR "; }
                $c++;
            }
            $va_like .= " ) ";
            $Sql = "SELECT sr.id AS Staff_id FROM atif.staff_registered AS sr WHERE 1 ";
            $Sql .= $va_like;
            $Sql .= " AND sr.is_active=1 AND sr.is_posted=1"; 
            $DSt_id = $AAM->SelectQeury($Sql);
            foreach ($DSt_id as $v) 
            {
                $s = $v["Staff_id"];    
                array_push($Stafflist, $s);
            }
            
            $Staff_id =  implode(",",$Stafflist);
            $Where = " AND sr.id IN (".$Staff_id.") ";
            $Where_Staff = " AND sr.staff_id IN (".$Staff_id.") ";

            

        } else if ( $DropdownType ==  'Timing_Profile')
        {


            $Stafflist = array();

 
             $Staff_id =  implode(",",$Staff_id);


 $Sql =  " SELECT sr.id AS Staff_ids  FROM atif.staff_registered AS sr WHERE 1 
 and sr.is_posted=1 AND sr.is_active=1 
 AND sr.id IN ( 
SELECT ttp.staff_id FROM atif_gs_events.tt_profile_time_staff AS ttp WHERE ttp.profile_id IN( ".$Staff_id." ) ) ORDER BY sr.id ";   


            $DSt_id = $AAM->SelectQeury($Sql);

            foreach ($DSt_id as $v) 
            {
                $s = $v["Staff_ids"];    
                array_push($Stafflist, $s);
            }
            
            $Staff_id =  implode(",",$Stafflist);

            


            $Where = " AND sr.id IN (".$Staff_id.") ";
            $Where_Staff = " AND sr.staff_id IN (".$Staff_id.") ";



        }
         




        $return = $this->TopLineBottomLine( $Where, $Where_Staff ); 
        $return2 = $this->Create_Html($return);  
        
        return response()->json(
            array(
                'success' => true, 
                'html'=>$return2["Designation"], 
                "h1" => $return2["Department"], 
                "h2" => $return2["Profile_name"],
                "h3" => $return2["Staff_name"]
                
            )
        );

    }



    public function Create_Html($Data)
    {
        $html_Designation = "";
        $html_Department = "";
        $html_Profile_name = "";
        $html_Staff_name = "";


        $html_Timing_Profile = "";

        

        if( !empty( $Data["Designation"] ) )
        {


            $html_Designation .= "<label>Designation</label>";
            $html_Designation .= "<select id='designationFilter_asmry' multiple='multiple'>";
            foreach ($Data["Designation"] as $value) 
            { 
                $html_Designation .= '<option value="'.$value["Designation"].'">'.$value["Designation"].'</option>';
            }
            $html_Designation .= '</select>';
        }


        if( !empty( $Data["Department"] ) )
        {


            $html_Department .= "<label>Department</label>";
            $html_Department .= "<select id='departmentFilter_asmry' multiple='multiple'>";
            foreach ($Data["Department"] as $value) 
            { 
                $html_Department .= '<option value="'.$value["Department"].'">'.$value["Department"].'</option>';
            }
            $html_Department .= '</select>';
        }





        if( !empty( $Data["Profile_name"] ) )
        {


            $html_Profile_name .= "<label>Timing Profile</label>";
            $html_Profile_name .= "<select id='timingProfileFilter_asmry' multiple='multiple'>";
            foreach ($Data["Profile_name"] as $value) 
            { 
                $html_Profile_name .= '<option value="'.$value["Profile_id"].'">'.$value["Profile_name"].'</option>';
            }
            $html_Profile_name .= '</select>';

        }



        if( !empty( $Data["Staff_info"] ) )
        {


            $html_Staff_name .= "<label>Staff name</label>";
            $html_Staff_name .= "<select id='txt_gt_id_asmry' multiple='multiple' class='txt_gt_id_asmry'> ";
            foreach ($Data["Staff_info"] as $value) 
            { 
                $html_Staff_name .= '<option value="'.$value["Staff_id"].'">'.$value["abridged_name"].'</option>';
            }
            $html_Staff_name .= '</select>';

        }




        


        





        return array(
            "Designation" => $html_Designation, 
            "Department"=>$html_Department, 
            "Profile_name" => $html_Profile_name,
            "Staff_name" => $html_Staff_name
            );

    }




  




}
