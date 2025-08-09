<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registerProcess(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        Mail::to($data['email'])->send(new WelcomeEmail($data['name']));
        return redirect()->route('login')->with('success', 'Registration successful, please login.');

    }
    public function loginProcess(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login successful.');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function dashboard()
    {
        $notesCount = auth()->user()->notes()->count();
        return view('auth.dashboard' , compact('notesCount'));
    }

}
