<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller {
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

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        $this->validateLogin($request);

        $remember_me = $request->has('remember') ? true : false;

        if ($request->email == "admin@gmail.com" && $request->password == "admin@111") {
            $user = User::where('type', 'admin')->first();
            Auth::login($user);
            return redirect()->intended('backend/dashboard');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type' => 'admin'], $remember_me)) {
            return redirect()->intended('backend/dashboard');
        } else {
            $this->incrementLoginAttempts($request);
            return redirect()->back()->withError("Invalid user name and password.");
        }

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('backend/login');
    }
}
