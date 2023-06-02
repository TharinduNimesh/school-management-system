<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        // $this->middleware('guest')->except('logout');
        if(Auth::check()) {
            Auth::logout();
        }
    }

    public function login(Request $request) {
        $validate = $request->validate([
            'login' => ['required', 'max:20', 'min:5'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        if(Auth::attempt($validate)) {
            $path = null;
            $role = auth()->user()->role;
            if($role == "student") {
                $path = route('student.dashboard');
            } else if ($role == "teacher") {
                $path = route('teacher.dashboard');
            } else if ($role == "admin") {
                $path = route('admin.dashboard');
            } else if ($role == "librarian") {
                $path = route('library.dashboard');
            } else if ($role == "coach") {
                $path = route('sport.dashboard');
            } else if ($role == "developer") {
                $path = route('developer.dashboard');
            } else if ($role == 'officer') {
                $path = route('zonal.dashboard');
            } 

            return [
                'status' => 'success',
                'path' => $path
            ];
        } else {
            return ['status' => 'invalid'];
        }
    }
}
