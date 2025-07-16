<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Filament\Notifications\Notification;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return match ($status) {
            Password::RESET_LINK_SENT =>
                back()->with('status', __($status)),
            default =>
                back()->withErrors(['email' => __($status)]),
        };
    }
}
