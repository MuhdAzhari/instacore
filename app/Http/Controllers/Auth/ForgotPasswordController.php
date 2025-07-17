<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Filament\Notifications\Notification;
use App\Services\AuditLogger;

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

        if ($status !== Password::RESET_LINK_SENT) {
            AuditLogger::error("Password reset link failed: {$request->email}");
        }

        return match ($status) {
            Password::RESET_LINK_SENT =>
                back()->with('status', __($status)),
            default =>
                back()->withErrors(['email' => __($status)]),
        };
    }
}
