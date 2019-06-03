<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    // //Metodos sobreescritos
    // public function login(Request $request)
    // {
    //     // validar que el email existe en una base de datos
    //     $this->validateLogin($request);
        
    //     // obtener el usuario según el email
    //     $user = User::where('clave', $request->clave)->firstOrFail();
        
        
        
    //     //return \redirect()->route('login.check-email');
    // }
    
    public function username()
    {
        return 'clave';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string', 
            'password' => bcrypt($this->username()),
        ]);
    }

    
}
