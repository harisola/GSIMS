<?php
/******************************************************************
* Author : Atif Naseem
* Email : atif.naseem22@gmail.com
* Cell : +92-313-5521122
*******************************************************************/



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login(){
        if(Sentinel::check()){
            return redirect(url("/"));
        }else{
            return view('login.login_01');
        }
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
