<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\User;

class CharacterController extends Controller
{
    public function getInventory()
    {
        $user = auth()->user();
        $inventory = $user->characters;
        return response()->json($inventory);
    }

    public function getInventories()
    {
        $users = User::with('characters')->get();
        return response()->json($users);
    }

    public function getCharacter($tokenId)
    {
        $character = Character::where('token_id', $tokenId)->firstOrFail();
        return response()->json($character);
    }

    public function getVillage($tokenId)
    {
        $character = Character::where('token_id', $tokenId)->firstOrFail();
        $village = $character->village;
        return response()->json($village);
    }
}
