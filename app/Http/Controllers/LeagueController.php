<?php

namespace App\Http\Controllers;

use App\Http\Resources\LeagueResource;
use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{

    public function index()
    {
        return LeagueResource::collection(League::all());
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cups_from' => 'required|integer',
            'cups_to' => 'required|integer',
        ]);

        $league = League::create($request->all());

        return new LeagueResource($league);
    }


    public function show(League $league)
    {
        return new LeagueResource($league);
    }


    public function update(Request $request, League $league)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cups_from' => 'required|integer',
            'cups_to' => 'required|integer',
        ]);

        $league->update($request->all());

        return new LeagueResource($league);
    }


    public function destroy(League $league)
    {
        $league->delete();

        return response()->noContent();
    }
}
