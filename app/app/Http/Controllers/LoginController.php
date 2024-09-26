<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function index () {
        return view('auth.login',  [
            'menu' => config ('top.menu'),
            'currentPage' => 'Login'
        ]);
    }

    public function up (Request $request) {
        $validated = $request->validate ([
            'email' => 'required|email',
            'password' => 'required|min:5|max:32',
            'repeatPassword' => 'required|min:5|max:32'
        ]);

        if ($validated['password'] != $validated['repeatPassword']) {
            return back()->withErrors ([
                'repeatPassword' => 'Passwords do not match.',
            ])->onlyInput ('repeatPassword');
        }

        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password']
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('about');
        }

        return back()->withErrors([
            'email' => 'Email or password incorrect.',
        ])->onlyInput('email');
    }

    public function resetPassword (Request $request) : RedirectResponse {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
