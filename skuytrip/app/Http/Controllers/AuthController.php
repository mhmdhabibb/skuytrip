<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        // Store the intended URL in the session if provided
        if ($request->has('intended')) {
            session(['url.intended' => $request->intended]);
        }
        
        return view('auth.login');
    }

    public function showRegisterForm(Request $request)
    {
        // Store the intended URL in the session if provided
        if ($request->has('intended')) {
            session(['url.intended' => $request->intended]);
        }
        
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Trim the email to remove any accidental spaces
        $credentials['email'] = trim($credentials['email']);

        // First check if the email exists
        $user = User::where('email', $credentials['email'])->first();
        
        if (!$user) {
            return back()->withErrors([
                'email' => 'No account found with this email address.',
            ])->withInput($request->except('password'));
        }

        // Now try to authenticate
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Redirect to the intended URL or home
            return redirect()->intended('/')->with('success', 'Welcome back! You have successfully logged in.');
        }

        // If we get here, the email exists but password was wrong
        return back()->withErrors([
            'password' => 'The password you entered is incorrect.',
        ])->withInput($request->except('password'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required'
        ], [
            'email.unique' => 'This email is already registered. Please use a different email or login.',
            'terms.required' => 'You must accept the Terms and Privacy Policy.'
        ]);

        // Trim the email to remove any accidental spaces
        $validated['email'] = trim($validated['email']);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        // Redirect to the intended URL or home
        return redirect()->intended('/')->with('success', 'Welcome to Skytrips! Your account has been created successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Get the redirect URL from the form, fallback to '/' if not provided
        $redirect = $request->input('redirect', '/');
        
        return redirect($redirect)->with('success', 'You have been successfully logged out.');
    }
} 