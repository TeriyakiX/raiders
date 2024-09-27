<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\FactionResource;
use App\Models\Faction;
use Illuminate\Http\Request;

class FactionsController extends Controller
{
    public function index()
    {
        // Получаем все фракции
        $factions = Faction::all();
        return FactionResource::collection($factions); // Возвращаем ресурс фракций
    }

    public function store(FactionRequest $request) // Используем FactionRequest для валидации
    {
        $validatedData = $request->validated();

        // Создаем новую фракцию
        $faction = Faction::create($validatedData);
        return response()->json(new FactionResource($faction), 201);
    }

    public function show($id)
    {
        // Находим фракцию по ID
        $faction = Faction::findOrFail($id);
        return new FactionResource($faction); // Возвращаем ресурс фракции
    }

    public function update(FactionRequest $request, $id)
    {
        // Находим фракцию по ID
        $faction = Faction::findOrFail($id);
        $validatedData = $request->validated();

        // Обновляем фракцию
        $faction->update($validatedData);
        return new FactionResource($faction); // Возвращаем обновленный ресурс фракции
    }

    public function destroy($id)
    {
        // Находим фракцию по ID
        $faction = Faction::findOrFail($id);
        $faction->delete();

        return response()->json(['message' => 'Faction deleted successfully']);
    }
}
