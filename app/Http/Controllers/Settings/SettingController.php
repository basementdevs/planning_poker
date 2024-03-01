<?php

namespace App\Http\Controllers\Settings;

use App\Facades\TaskTracking;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\CreatePlatformSettingsRequest;
use App\Models\Setting;
use App\Models\TrelloSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class SettingController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function store(CreatePlatformSettingsRequest $request)
    {
        $settings = null;
        $typeSettings = null;
        DB::transaction(function () use ($request, &$settings, &$typeSettings) {
            $settings = Setting::with($request->type)->firstOrCreate([
                'user_id' => $request->user()->id,
            ]);

            $typeModel = "\App\Models\\".ucfirst($request->type).'Setting';
            $typeSettings = $typeModel::createOrUpdate($request, $settings->id);

            $settings->{$request->type}[] = $typeSettings;
            $settings->save();
        });

        if (! session()->get('settingId', false)) {
            session()->put('settingId', $settings->id);
        }
        //To refactor: Coding is repeated in PlatfromsSettingsController@cards
        $cards = collect(TaskTracking::from($typeSettings)->cards())
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
                'platform' => $request->type,
            ])->with('sucess', 'Settings was saved!');
    }

    public function list(Request $request): Response
    {
        return Inertia::render('Settings/List', [
            'settings' => [
                'trello' => TrelloSetting::all(),
            ],
        ]);
    }
}
