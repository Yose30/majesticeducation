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
    
    //Funciones sobreescritas
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

    public function redirectPath(){
        if(auth()->user()->tipo_id == 4){
            return '/evaluaciones';
        }
        else{
            return '/home';
        }
    }

    //Sobreescribir metodo logout para cerrar sesion, y nos ubique en la vista login
    public function logout(){
        auth()->logout(); //Para poder cerrar sesión de la aplicación
        session()->flush(); //Limpiar todas las sesiones
        return redirect('/login');
    }
    
}
