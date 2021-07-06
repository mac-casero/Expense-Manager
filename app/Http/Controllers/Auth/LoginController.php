<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function showLoginForm()
    {
        return response()->view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        // Checkbox value is only present when checked
        $remember = !empty($request->remember);
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if(Auth::attempt([$fieldType => $email, 'password' => $password], $remember)){
            //format access and put to cache
            // $accesses = Auth::user()->roles_unique()->with('accesses')->get();
            // $access_list = [];
            // foreach($accesses as $access){
            //     $list[$access->type] = [];
            //     foreach($access->accesses as $acc){
            //         $list[$access->type][$acc->name] = $acc->pivot->can_access;
            //     }
            //     $access_list = array_merge($access_list, $list);
            // }
            //     $access_list = array_merge($access_list, $list);

            // Cache::put('access'.Auth::user()->id, $access_list);
            return redirect()->intended('/');
        }
        else{
            return redirect()->route('login')
                ->withErrors(['login', 'Username or password is incorrect.']);
        }
    }
}
