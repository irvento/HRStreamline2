<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the activity after the user is successfully created
        ActivityLog::create([
            'user_id' => $user->id, // user_id is now properly set
            'table_name' => 'users', // the table that was affected
            'row_id' => $user->id,   // the row that was affected (the user)
            'action' => 'created',   // action type
        ]);

        // Fire the Registered event (this could be sending a welcome email, etc.)
        event(new Registered($user));

        // Log the user in after creation
        Auth::login($user);

        // Redirect the user to the dashboard or home page after registration
        return redirect(route('dashboard', absolute: false));
    }
}