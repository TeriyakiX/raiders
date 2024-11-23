<?php

use App\Http\Controllers\Admin\BattleRuleController;
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
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------|
| API Routes                                                               |
|---------------------------------------------------------------------------|
*/

/**
 * @group Admin - Game Management
 */
Route::prefix('dao/admin/game')->group(function () {
    Route::resource('battle-rules', BattleRuleController::class);
    Route::resource('factions', FactionsController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('presets', PresetsController::class);
    Route::resource('events', EventsController::class);
    Route::post('events/{event}/go-to-event', [GameController::class, 'goToEvent']);
    Route::get('parameters', [ParameterController::class, 'index']);
});

/**
 * @group Battle Operations
 */
Route::prefix('battles')->group(function () {
    Route::post('/', [BattleController::class, 'startBattle']);
    Route::get('{battle_id}', [BattleController::class, 'getBattleStatus']);
    Route::post('perform/{battle_id}', [BattleController::class, 'completeBattle']);
    Route::get('{battle_id}/logs', [BattleController::class, 'getBattleLogs']);
});

/**
 * @group Card Management
 */
Route::prefix('cards')->group(function () {
    Route::get('{id}', [CardController::class, 'show']);
    Route::post('{card_id}/freeze', [CardController::class, 'freezeCard']);
    Route::post('{card_id}/unfreeze', [CardController::class, 'unfreezeCard']);
    Route::post('squad/add/{cardId}', [CardController::class, 'addToSquad']);
    Route::delete('squad/remove/{cardId}', [CardController::class, 'removeFromSquad']);
});

/**
 * @group User Operations
 */
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'getUserData']);
    Route::get('inventory', [InventoryController::class, 'getUserInventory']);
    Route::patch('users/{user_id}/update_league_points', [UserController::class, 'updateLeaguePoints']);
});

/**
 * @group Authentication
 */
Route::post('auth/metamask', [MetaMaskController::class, 'loginWithMetaMask']);
