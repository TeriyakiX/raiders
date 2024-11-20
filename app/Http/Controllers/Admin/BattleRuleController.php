<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BattleRule;
use Illuminate\Http\Request;

class BattleRuleController extends Controller
{
    public function index()
    {
        $battleRules = BattleRule::all();
        return response()->json($battleRules);
    }

    public function show($id)
    {
        $battleRule = BattleRule::find($id);

        if (!$battleRule) {
            return response()->json(['message' => 'Battle rule not found'], 404);
        }

        return response()->json($battleRule);
    }

    public function update(Request $request, $id)
    {
        $battleRule = BattleRule::find($id);

        if (!$battleRule) {
            return response()->json(['message' => 'Battle rule not found'], 404);
        }

        $validatedData = $request->validate([
            'level_difference' => 'integer',
            'attacker_win_cups' => 'integer',
            'attacker_lose_cups' => 'integer',
            'victim_win_cups' => 'integer',
            'victim_lose_cups' => 'integer',
            'attacker_frozen_duration' => 'integer',
            'victim_frozen_duration' => 'integer',
        ]);

        $battleRule->update($validatedData);

        return response()->json(['message' => 'Battle rule updated successfully', 'battle_rule' => $battleRule]);
    }
}
