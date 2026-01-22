<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Logger;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login'); // resources/views/auth/login.blade.php
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request, Logger $logger): Response
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Log login attempt
        $logger->log('User (' . auth()->user()->id . ' ' . auth()->user()->email . ' Admin:' . auth()->user()->super . ') logged in');

        return response()->view('home');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->view('home');
    }
}
