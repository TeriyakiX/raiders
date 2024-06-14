<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Game\GeneralSettingsController;
use App\Http\Controllers\Admin\Game\LocationController;
use App\Http\Controllers\Admin\Game\PresetsController;
use App\Http\Controllers\Admin\Game\EventsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('dao/admin/game')->group(function () {

    // General settings routes
    Route::get('general/settings', [GeneralSettingsController::class, 'getAllSettings']);
    Route::put('general/settings', [GeneralSettingsController::class, 'updateAllSettings']);
    Route::get('general/leagues', [GeneralSettingsController::class, 'getAllLeagues']);
    Route::put('general/leagues', [GeneralSettingsController::class, 'updateAllLeagues']);
    Route::get('general/math', [GeneralSettingsController::class, 'getAllMathSettings']);
    Route::put('general/math', [GeneralSettingsController::class, 'updateAllMathSettings']);

    // Location routes
    Route::get('locations', [LocationController::class, 'index']);
    Route::get('locations/{id}', [LocationController::class, 'show']);
    Route::post('locations', [LocationController::class, 'store']);
    Route::delete('locations/{id}', [LocationController::class, 'destroy']);
    Route::put('locations/{id}', [LocationController::class, 'update']);

    // Preset routes
    Route::get('presets', [PresetsController::class, 'index']);
    Route::get('presets/{id}', [PresetsController::class, 'show']);
    Route::post('presets', [PresetsController::class, 'store']);
    Route::delete('presets/{id}', [PresetsController::class, 'destroy']);
    Route::put('presets/{id}', [PresetsController::class, 'update']);

    // Event routes
    Route::get('events', [EventsController::class, 'index']);
    Route::post('events', [EventsController::class, 'store']);
    Route::get('events/{id}', [EventsController::class, 'show']);
    Route::put('events/{id}', [EventsController::class, 'update']);
});
