<?php

namespace App\Http\Controllers\Auth\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

use App\Model\User;
use App\Notifications\Verification;
use Illuminate\Http\Request;


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
    protected $redirectTo = '/faculty/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.faculty.faculty_login');
    }
    protected function guard()
    {
        return Auth::guard('faculty');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
          'email' => 'required',
          'password' => 'required',
      ]);
        if (Auth::guard('faculty')->attempt(['name' => $request->email, 'password' => $request->password], $request->remember)) {
        // Log Him Now
            return redirect()->intended(route('faculty.index'));
        }else{
            return back()->with('error','Username or Password do Not Match');
        }


    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('faculty.login');
    }


}
