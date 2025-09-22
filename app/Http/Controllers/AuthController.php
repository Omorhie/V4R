<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * === SIGN UP ===
     */
    public function showSignup()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $message = null;
        $status = null;

        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'username' => 'required|min:3|unique:users,username',
                'password' => 'required|min:6',
            ]);

            try {
                User::create([
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                ]);

                $message = "Sign up berhasil! Silakan login.";
                $status = "success";
            } catch (\Exception $e) {
                $message = "Gagal sign up: " . $e->getMessage();
                $status = "error";
            }
        }

        return view('auth.signup', compact('message', 'status'));
    }

    /**
     * === LOGIN ===
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('username', $user->username);
            Session::put('email', $user->email);

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    /**
     * === LOGOUT ===
     */
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
