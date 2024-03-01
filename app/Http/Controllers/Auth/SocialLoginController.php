<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
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
            $existingUser->socialUserCreateOrUpdate($user);
            auth('web')->login($existingUser);
            session()->put('settingId', Setting::first('id')?->id);

            return redirect()->intended(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Authentication failed.');
        }
    }
}
