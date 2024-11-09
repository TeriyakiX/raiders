<?php

use App\Http\Controllers\Admin\CharacterController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\FactionsController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PresetsController;
use App\Http\Controllers\Auth\MetaMaskController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\Game\BattleController;
use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

    // Faction routes
    Route::get('factions', [FactionsController::class, 'index']);
    Route::get('factions/{id}', [FactionsController::class, 'show']);
    Route::post('factions', [FactionsController::class, 'store']);
    Route::put('factions/{id}', [FactionsController::class, 'update']);
    Route::delete('factions/{id}', [FactionsController::class, 'destroy']);

    // Preset routes
    Route::get('presets', [PresetsController::class, 'index']);
    Route::get('presets/{id}', [PresetsController::class, 'show']);
    Route::post('presets', [PresetsController::class, 'store']);
    Route::put('presets/{id}', [PresetsController::class, 'update']);
    Route::delete('presets/{id}', [PresetsController::class, 'destroy']);

    // Event routes
    Route::get('events', [EventsController::class, 'index']);
    Route::post('events', [EventsController::class, 'store']);
    Route::get('events/{id}', [EventsController::class, 'show']);
    Route::put('events/{id}', [EventsController::class, 'update']);
    Route::post('events/{event}/go-to-event', [GameController::class, 'goToEvent']);

    Route::get('/user/inventory', [CharacterController::class, 'getInventory']);
    Route::get('/user/character/{tokenId}', [CharacterController::class, 'getCharacter']);
    Route::get('/user/village/{tokenId}', [CharacterController::class, 'getVillage']);

    Route::get('/cards/{id}', [CardController::class, 'show']);
    Route::post('/squad/add/{cardId}', [CardController::class, 'addToSquad']);
    Route::delete('/squad/remove/{cardId}', [CardController::class, 'removeFromSquad']);
    Route::get('/events/users/{event}', [GameController::class, 'showEventPage']);
    Route::get('/squad/search', [GameController::class, 'viewAvailableCards']);



    Route::apiResource('leagues', LeagueController::class);


    // Начало боя
    Route::post('/battles', [BattleController::class, 'startBattle']);
    Route::get('/battles/{battle_id}', [BattleController::class, 'getBattleStatus']);
    Route::post('/battles/perform/{battle_id}', [BattleController::class, 'completeBattle']);
    Route::get('/battles/{battle_id}/logs', [BattleController::class, 'getBattleLogs']);

    // Замораживание карты
    Route::post('/cards/{card_id}/freeze', [CardController::class, 'freezeCard']);

    // Разморозка карты
    Route::post('/cards/{card_id}/unfreeze', [CardController::class, 'unfreezeCard']);

    // Обновление очков лиги пользователя
    Route::patch('/users/{user_id}/update_league_points', [UserController::class, 'updateLeaguePoints']);
});

    Route::get('/user', [UserController::class, 'getUserData']);

    Route::post('auth/metamask', [MetaMaskController::class, 'loginWithMetaMask']);

    Route::get('/user/inventory', [InventoryController::class, 'getUserInventory']);

    Route::options('{any}', function (Request $request) {
        return response('', 200)
            ->header('Access-Control-Allow-Origin', $request->header('Origin'))
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization')
            ->header('Access-Control-Allow-Credentials', 'true');
    })->where('any', '.*');



