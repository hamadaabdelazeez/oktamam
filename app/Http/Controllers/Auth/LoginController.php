<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
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

    public function api_login(Request $request)
    {
   
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        if (ApiValidation($request->toArray(),$rules)) {
            return ApiValidation($request->toArray(),$rules);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            $request['jwt'] = str_random(40);
            
            $user = Auth::User();
            $user->jwt =  $request['jwt'];
            $user->save();
            return ApiResponse(200,[],['jwt' => $user->jwt]);
        }

    }
}
