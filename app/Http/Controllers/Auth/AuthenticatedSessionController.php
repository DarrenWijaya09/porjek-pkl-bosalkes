<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
// Proses autentikasi standar
$request->validate([
    'email' => ['required', 'email'],
    'password' => ['required'],
]);

if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

// Redirect berdasarkan email domain
$user = Auth::user();
$emailDomain = substr(strrchr($user->email, "@"), 1);

if ($emailDomain === 'admin.com') {
    return redirect()->route('admin.dashboard');
}

return redirect()->route('dashboard'); // Redirect ke public dashboard
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
