<?php

use App\Http\Controllers\Admin\Character\CharacterController;
use App\Http\Controllers\Admin\Events\EventsController;
use App\Http\Controllers\Admin\GeneralSettings\GeneralSettingsController;
use App\Http\Controllers\Admin\Location\LocationController;
use App\Http\Controllers\Admin\Presets\PresetsController;
use \App\Http\Controllers\Auth\MetaMask\MetaMaskController;
use \App\Http\Controllers\Game\Game\GameController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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
    Route::post('events/{event}/go-to-event', [GameController::class, 'goToEvent']);

    Route::get('/user/inventory', [CharacterController::class, 'getInventory']);
    Route::get('/user/character/{tokenId}', [CharacterController::class, 'getCharacter']);
    Route::get('/user/village/{tokenId}', [CharacterController::class, 'getVillage']);

});

    Route::get('/user', [UserController::class, 'getUserData']);

    Route::post('auth/metamask', [MetaMaskController::class, 'loginWithMetaMask']);

    Route::get('/user/inventory', [UserController::class, 'getUserInventory']);

