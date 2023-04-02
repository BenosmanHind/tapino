<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => ['required'],
        ],
        [
            'username.required' => 'Ce champ est obligatoire',
            'password.required' => 'Ce champ est obligatoire',
        ]
    );

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            return redirect('admin');
        }
        else{
            $error = 'Coordonnées incorrectes. Veuillez réessayer.';
            return view('auth.login',compact('error'));
            }

    }
    public function showLoginForm()
        {
            $error = null;
            return view('auth.login',compact('error'));
        }
}
