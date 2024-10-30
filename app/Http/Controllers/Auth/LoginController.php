<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $email = $request->get('email');
        $password = $request->get('password');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (in_array(strtolower($email[0]), ['u', 'a', 'c'])) {
                $role = match (strtolower($email[0])) {
                    'u' => User::ROLE_STUDENT,
                    'a' => User::ROLE_ADMINISTRATIVE,
                    'c' => User::ROLE_TEACHER,
                };
                $verifyEmail = $email . '@utp.edu.pe';
                $user = \App\Models\User::where('email', $verifyEmail)->first();
                if (is_null($user)) {
                    $user = \App\Models\User::factory()->create([
                        'email' => $verifyEmail,
                        'password' => bcrypt($password)
                    ])->assignRole($role);
                    $request->merge([
                        'email' => $user->email,
                        'password' => $password
                    ]);
                }
            }
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
