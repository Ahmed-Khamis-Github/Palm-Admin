<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;



class LoginBasic extends Controller
{
 
  
  protected $redirectTo = '/admin/dashboard';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }





  public function showLoginForm()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
  }


  protected function guard()
  {
    return Auth::guard('web');
  }


  protected function credentials(Request $request)
  {
    return $request->only($this->username(), 'password');
  }

  protected function login(Request $request)
  {
    $credentials = $this->credentials($request);

    // Check for admin role during login attempt
    $credentials['role'] = 'admin';

    return $this->guard()->attempt(
      $credentials,
      $request->filled('remember')
    );
  }

  public function username()
  {
    return 'unique_id';
  }
}
