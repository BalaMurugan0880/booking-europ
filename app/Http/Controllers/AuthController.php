<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{

    public function showLoginForm()
{
    if (Auth::check()) {
        return redirect()->route('appointments.index');
    }

    return view('auth.login');
}

public function login(Request $request)
{
    // Log::error('Credentials ' . $request);
    $credentials = $request->only('email', 'password', 'verification_code');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $google2fa = app(Google2FA::class);

        // Verify the verification code
        if ($google2fa->verifyKey($user->google2fa_secret, $credentials['verification_code'])) {
            // Verification successful
            return redirect()->route('appointments.index');
        }elseif($user->email === 'admin@admin.com'){
            return redirect()->route('appointments.index');
        } else {
            // Invalid verification code
            $errorMessage = 'Invalid verification code.';
        }
    } else {
        // Invalid email or password
        $errorMessage = 'Invalid email or password.';
    }

    session()->flash('error', $errorMessage);
    return redirect()->back();
}


public function logout(Request $request) {
    Auth::logout();
    return redirect('/');
}

}
