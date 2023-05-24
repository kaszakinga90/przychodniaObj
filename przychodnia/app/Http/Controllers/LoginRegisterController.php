<?php

namespace App\Http\Controllers;

use App\Models\Patient;    //User?
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string|max:32|unique:patient',
            'firstName' => 'required|string|max:64',
            'lastName' => 'required|string|max:64',
            'password' => 'required|min:5|confirmed'
        ]);

        Patient::create([
            'login' => $request->login,
            'FirstName' => $request->firstName,
            'LastName' => $request->lastName,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('login', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('Zostałeś zalogowany do portalu!');
        }

        return back()->withErrors([
            'login' => 'Podane dane nie są zgodne z naszą bazą.',
        ])->onlyInput('login');

    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            //return view('auth.dashboard');
            return view('auth.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
            'login' => 'Zaloguj się, aby przejść do portalu.',
        ])->onlyInput('login');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }
}
