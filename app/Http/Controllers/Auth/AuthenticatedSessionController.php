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
        // Authenticate the user using the request's authenticate method (no assignment to $user)
        $request->authenticate();  // This will handle the authentication and throw an error if invalid

        // After authentication, get the authenticated user from the session
        $user = Auth::user();

        // Check if the user is authenticated and has an associated employee record
        if ($user) {
            // Check if the employee relationship exists
            $employee = $user->employee;

            if ($employee && $employee->status !== 'active' && !$user->isAdmin()) {
                // Log the user out and redirect to the inactive error page
                Auth::logout();
                return redirect()->route('inactive'); // Route to the inactive error page
            }

            // If the user is active or an admin, regenerate the session
            $request->session()->regenerate();
        }

        return redirect()->intended(route('dashboard', absolute: false));
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
