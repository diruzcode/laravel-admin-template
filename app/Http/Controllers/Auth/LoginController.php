<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Log;
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
     protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @inheritdoc
     */
    protected function credentials(Request $request)
    {

        // User must be active to login
        return array_merge(
            ['access_web' => true],
            $request->only($this->username(), 'password')
        );

    }

    /**
     * @inheritdoc
     */
    protected function authenticated(Request $request, $user)
    {
        // Registering last user login date and time
        $user->last_login = Carbon::now();
        $user->save();
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/login');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    protected function sendFailedLoginResponse(Request $request)
    {

        // Load user from database
        $user = User::where($this->username(), $request->{$this->username()})->first();

        if($user){

            if(!$user->access_web){
              return redirect()->back()->with([
                  'message' => 'La cuenta no tiene acceso a la web',
                  'level' => 'warning'
              ]);
            }

            if (\Hash::check($request->password, $user->password)) {
              return redirect()->back()->with([
                  'message' => 'Las credenciales son invalidas',
                  'level' => 'warning'
              ]);
            }

        }else{

          return redirect()->back()->with([
              'message' => 'Las credenciales son invalidas',
              'level' => 'warning'
          ]);
          
        }

    }

}
