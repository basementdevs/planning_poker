<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class PlatformSettingsController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Settings/PlatformSettings');
    }

    public function boards(): Response
    {
        return Inertia::render('Settings/Boards');
    }
}
