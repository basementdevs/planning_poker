<?php

namespace App\Http\Controllers\Settings;

use App\Facades\TaskTracking;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PlatformSettingsController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Settings/Pick');
    }

    public function create(Request $request): RedirectResponse|Response
    {

        try {
            $settings = Setting::with($request->platform)->first();
            if (isset($settings->{$request->platform}) && $settings->{$request->platform}->count() > 0) {
                return redirect()->action([PlatformSettingsController::class, 'cards'], ['platform' => $request->platform]);
            }

            return Inertia::render('Settings/Platform', [
                'platform' => $request->platform ?? null,
                'settings' => $settings]);
        } catch (RelationNotFoundException $e) {
            $settings = Setting::first();

            return Inertia::render('Settings/Platform', [
                'platform' => $request->platform ?? null,
                'settings' => $settings]);
        }
    }

    public function cards(Request $request): mixed
    {
        $model = ("\App\Models\\".ucfirst($request->platform) ?? 'Trello').'Setting';

        $cards = collect(TaskTracking::from($model::first())->cards())
            ->map(function ($item) {
                $item = (object) $item;

                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->desc,
                    'cardRole' => $item->cardRole,
                    'labels' => $item->labels,
                    'url' => $item->url,
                ];
            });

        return Inertia::render('Settings/Cards',
            [
                'cards' => $cards,
                'platform' => $request->platform,
            ]);

    }
}
