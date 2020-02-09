<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Jobs\ForgotPasswordEmailJob;
use App\User;
use App\Candidate;
use App\State;
use App\Post;
use Auth;
use Hash;

class NewController extends Controller
{    
    public function loginform(){
        return view('login');
    }
    public function laravel(){
        return view('form');
    }
    public function forgotpassword(){
        return view('forgotPassword');
    }

    public function state(){
        $new_state = new State;
        $states = $new_state->getAll();           
        return view('state')->with('states', $states);
    }

    public function fetchdata(Request $request){

        $value = $request->get('value');
        $output = '<option value="">Select City</option>';
        $new_state = new State;
        $state = $new_state->stateName($value);     
        foreach ($state as $state){
            $cities = $state->city;
            foreach($cities as $city){                
                $output.='<option value="'.$city->name.'">'.$city->name.'</option>';
            }
        }
        echo $output;
    }

    public function visitor_count(Request $request){

        if($request->routeIs("login")){
          $id = "login_page";      
        }
        elseif($request->routeIs("register")){
          $id = "register_page";  
        }

        $ip = $request->ip();
        $posts = new Post;
        $ip_arr = json_decode($posts->recieve_ip($id));
        if(!in_array($ip, $ip_arr)){

            array_push($ip_arr, $ip);                 
            $posts->inc_count($id);
            $posts->change_ip($id, json_encode($ip_arr));
        }        
    }

    public function profile(){
        return view('profile');
    }

    public function reset_password(){
        return view('reset_password');
    }
        
    public function mailsend(Request $request){

        $this->validate($request,['email' => 'required|email']);
        $flag = 0;
        $users = User::all();
        $email = $request->input('email');        
        foreach($users as $user){
            if($user->email == $email){
                $flag = 1;
                break;
            }
        }
        if($flag == 0){
            echo "There is no account associated with this Email ID ";
        }
        else{
            echo "hello";          /*                           
            $subject = "Forgot Password";
            $message = "hello";*/
            dispatch(new  ForgotPasswordEmailJob($email));
            echo "message sent successfully";            
            //return back()->with('success','A mail has been send to your email ID.');                      
        }      
    }   
    
    public function checklogin(Request $request){

        $user_data = $request->only('email','password');
        if(Auth::attempt($user_data)){    
            return redirect('/homepage');
        }                       
        else{
            return back()->with('error','Wrong Login Details');
        }        
    }
    
    public function successlogin(){

      return view('homepage');      
    }
    
    public function logout(){
        Auth::logout();               
        return redirect('/login');                    
    }

     public function insert(Request $request){
        $this->validate($request,[

        'email' => 'required|email|max:50',
        'password' => 'required|max:8',
        'address' => 'required|max:155',
        'name' => 'required|max:20',
        'city' => 'required|max:20',
        'state' => 'required|max:20',
        'zip' => 'required|max:6|min:6'              
        ]);         
         /*echo "<pre>";
         print_r( $request->all());
         exit;   */          
        $candidates = new User;
        $candidates->email = $request->input('email');            
        $password = $request->input('password');
        $hashed = Hash::make($password);
        $candidates->password = $hashed;
        $candidates->address = $request->input('address');
        $candidates->name = $request->input('name');
        $candidates->city = $request->input('city');
        $candidates->state = $request->input('state');
        $candidates->phno = $request->input('phno');
        $candidates->zip = $request->input('zip');
        $candidates->save();                         
        return view('welcome');      
    }

    public function update(Request $request){

        $this->validate($request,[

        //'email' => 'required|email|max:50',             
        'address' => 'required|max:155',
        'name' => 'required|max:20',
        'city' => 'required|max:20',
        'state' => 'required|max:20',
        'zip' => 'required|max:6|min:6'              
        ]);         

         /*echo "<pre>";
         print_r( $request->all());
         exit;*/             
        $Userid = Auth::user()->id;             
        $candidates = User::find($Userid);                          
        $candidates->address = $request->input('address');
        $candidates->name = $request->input('name');
        $candidates->city = $request->input('city');
        $candidates->state = $request->input('state');
        $candidates->phno = $request->input('phno');
        $candidates->zip = $request->input('zip');

        $upgradedimagename = session('imgname');
        $data = session('img');
        file_put_contents('upload/'.$upgradedimagename, $data);
        $folder = "upload/".$upgradedimagename;
        $candidates->image = $folder;
        $candidates->save();                                                   
        $msg = "Changes saved Successfully.";
        return redirect(route('profile1'))->with('message', $msg);
        
    }

}   