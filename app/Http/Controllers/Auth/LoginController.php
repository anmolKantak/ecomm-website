<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

use App\User;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $providers = [
        'facebook'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  
     

    public function socialLogin($social){
       return Socialite::driver($social)->stateless()->redirect();
       
}

public function handleProviderCallback($social){
    $userSocial = Socialite::driver($social)->stateless()->user();
   //  return $user->getAvatar();
    $findUser = User::where('email',$userSocial->email)->first();
    if($findUser){
        $test = $userSocial->name;
        $test1 = array($test);
        
        return $test1;
        return "done with old";
    }else{
    $user = new User;
    $user->name = $userSocial->name;
    $user->last_name = $userSocial->name;
    $user->email = $userSocial->email;
    $user->password = bcrypt(12345678);
    
    $user->save();
    Auth::login($user);
    return "done with new";
    }
}







 
}
