<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuestUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use function event;
use function redirect;

class RegisteredGuestController extends Controller
{
    public function store(GuestUserRequest $request): RedirectResponse
    {

        $user = User::create([
            'name' => $request->name,
            'is_guest' => true,
        ]);

        Auth::login($user);


        // TODO: Enter the gaming session
        // TODO: Redirect to the gaming session

        return redirect(RouteServiceProvider::HOME);
    }
}
