<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/home', function () {
    return Inertia::render('Home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('settings')->group(function () {
        Route::get('platforms', [\App\Http\Controllers\Settings\PlatformSettingsController::class, 'index'])->name('settings-platform.index');
        Route::get('create', [\App\Http\Controllers\Settings\PlatformSettingsController::class, 'create'])->name('settings-platform.create');
        Route::get('cards', [\App\Http\Controllers\Settings\PlatformSettingsController::class, 'cards'])->name('settings-platform.cards');
        Route::post('store', [\App\Http\Controllers\Settings\SettingController::class, 'store'])->name('setting.store');
        //  Route::get('list', [\App\Http\Controllers\Settings\SettingController::class, 'list'])->name('setting.list');
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
