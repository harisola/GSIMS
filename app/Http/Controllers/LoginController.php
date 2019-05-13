<?php
/******************************************************************
* Author : Atif Naseem
* Email : atif.naseem22@gmail.com
* Cell : +92-313-5521122
*******************************************************************/



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Sentinel;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

use App\Models\Staff\Staff_Information\StaffInformationModel as StaffInformationModel;

use App\Models\User_logs\users as USLM;

use App\Models\User_logs\users_logs as USLIM;

class LoginController extends Controller
{
    public function login(){
        if(Sentinel::check()){
           /* print_r();
            die;*/


            return redirect(url("/"));
        }else{
           /* print_r("else expression");
            die;*/
            return view('login.login_01');
        }
    }



 //see the method below
// clent ip




    public function log_user(Request $request){

         $RecM_Obj = new USLM();
         $StaffInformationModel = new StaffInformationModel();

         $mytime = Carbon::now('Asia/Karachi');
         // $real_time = $mytime->formate('h:i:s A');
        
            

           $email = $request['email'];

            $get_user_id=$RecM_Obj->get_user_details($email);
            $user_id = $get_user_id[0]->id;           

            if($user_id != "" )
            {

            $RecM_Obj1 = new USLIM();
            $detail = $RecM_Obj1->test_logs($user_id);
            $get_Staff = $StaffInformationModel->get_Staff_Info($user_id);
            // var_dump($get_Staff['info'][0]->name_code);
            $name_code = $get_Staff['info'][0]->name_code;
            $abridged_name = $get_Staff['info'][0]->abridged_name;
                
                // $date = $detail[0]['date'];
                $ipa = $_SERVER['REMOTE_ADDR'];

                  //$system_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);  
                

           

                    $cur_date = date('Y-m-d');
                
                    $RecM_Obj1->user_id = $user_id;
                    $RecM_Obj1->name_code = $name_code;
                    $RecM_Obj1->abridged_name = $abridged_name;
                     
                    $RecM_Obj1->date =  $cur_date;
                    $RecM_Obj1->ip4 = $ipa;
                     //$RecM_Obj1->system_user = $system_name;
                    $RecM_Obj1->created_at = $mytime;
                    
                    $RecM_Obj1->register_by = $user_id;
                     $RecM_Obj1->updated_at = $mytime;
                    
                    $RecM_Obj1->modified_by = $user_id;
                    $RecM_Obj1->record_deleted = 0;

                    $RecM_Obj1->save();

             }
            
              //return $data;
        }



    public function postLogin(Request $request){


        $query = "delete from throttle";
        DB::connection('mysql')->select($query);
         
        if($request->remember == 'on'){

           $user = Sentinel::authenticateAndRemember($request->all());



            if($user->is_active == 0){Sentinel::logout(null, true);}
        }else{

            
            $user = Sentinel::authenticate($request->all());

            if(!empty($user) && $user->is_active == 0){Sentinel::logout(null, true);}
        }


        if(Sentinel::check()){
            return url('/');
        }else{
            return "CN";
        }
    }


    public function logout(Request $request){
        Sentinel::logout();
        return redirect(url('/login'));
    }






    public function changePassword(Request $request){
        $errCtr = 0;
        $html = '';



        $hasher = Sentinel::getHasher();

        $oldPassword = $request->input('old_password');
        $password = $request->input('new_password');
        $passwordConf = $request->input('password_confirmation');

        $user = Sentinel::getUser();



        
        if(strlen($password) < 7){
            $errCtr++;
            $html .= $errCtr . '. Password must contain 7 to 15 characters.';
        }

        if(!similar_text($password, $passwordConf)){
            if($errCtr > 0){
                $html .= '<br />';
            }
            $errCtr++;
            $html .= $errCtr . '. Re-type Password is not matched with the New Password.';
        }

        if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
            if($errCtr > 0){
                $html .= '<br />';
            }
            $errCtr++;
            $html .= $errCtr . '. Current password not matched.';
        }


        if($errCtr == 0){
            Sentinel::update($user, array('password' => $password));
            return 'CN';
        }else{
            return $html;
        }
    }













    /*******************************************************
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        //$user = Socialite::driver('google')->stateless()->user();



        $html = '';


        /**********************************************
        * Calling User Info
        ***********************************************/
        $query = "select * from users as u where u.email = '".$user->email."'";
        $u['info'] = DB::connection('mysql')->select($query);



        if(!empty($u['info'])){
            $userSentinel = Sentinel::findById($u['info'][0]->id);
            Sentinel::login($userSentinel);
            return redirect('/');
        }else{
            return view('login.login_gp_error')->with('email', $user->email);
        }
    }
}
