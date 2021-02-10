<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Role;
use Auth;
use DB;
use Session;


class UsersController extends Controller
{
    

    public function forgotPassword(Request $request){
         if($request -> isMethod('post')){
             $data= $request->all();
             $userCount = User::where('email',$data['email'])->count();
             if($userCount == 0){
                 return redirect()->back()->with('flash_message_error','Email does not exists!');
             }
             $userDetails = User::where('email',$data['email'])->first();
             $temp_password = str_random(8);
             $new_password = bcrypt($temp_password);
              User::where('email',$data['email'])->update(['password' => $new_password ]);

             $email = $data['email'];
             $name = $userDetails->name;
             $messageData = [
                'email' => $email,
                'name' => $name,
                'password' => $temp_password
             ];

             Mail::send('emails.forgotpassword',$messageData,function($message)use($email){
                $message->to($email)->subject('New password E-com Website!');
             });
             return redirect('/user-login')->with('flash_message_success','Please checkyour email for new password!');
             }
         return view('users.forgot_password');
     }

       public function register(Request $request){
         if($request->isMethod('post')){
         $data = $request->all();
        //for unique email
        $usersCount = User::where('email',$data['email'])->count();
        if($usersCount>0){
            return redirect()->back()->with('flash_message_error','Email already exists!!');
        }else{
            $user = new User;
            
            $user->name = $data['name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
          
           // $user->roles()->attach(Role::where('role_name','customer')->first());
           
            
          //  $user->roles()->attach(User::where('id','user_id')->first());
         //   $user-> roles() ->attach(Role::where('role_name', 'customer' ) ->first());
         
            
            $user->save();
            $user -> roles()->attach(Role::where('role_name','customer')->first());
            return redirect('/user-login')->with('flash_message_success','Registration successfull!!');
          //  $user_id ->  user-> User::with('roles')->first('id');
           // dd($user_id);
         
        }
    }
        return view('users.login_register');
     }
     
      public function login(Request $request){
          //
      }
}
