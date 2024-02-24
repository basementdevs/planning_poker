<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function google()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function createOrAuth(Request $request)
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $existingUser = User::firstOrNew(['email' => $user->getEmail()]);
            if (! $existingUser->exists) {
                $existingUser->name = $user->getName();
                $existingUser->email_verified_at = Carbon::now();
                $password = bcrypt(Str::random());
                $existingUser->password = $password;
                $existingUser->save();
            }
            auth('web')->login($existingUser);

            return redirect()->intended(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Authentication failed.');
        }
    }
}
