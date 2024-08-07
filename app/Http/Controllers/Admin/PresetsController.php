<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PresetRequest;
use App\Models\Parameter;
use App\Models\Preset;
use Illuminate\Support\Facades\DB;

class PresetsController extends Controller
{
    public function index()
    {
        return Preset::all(['id', 'title']);
    }

    public function show($id)
    {
        $preset = Preset::with('parameters')->findOrFail($id);
        $allParameters = Parameter::all();
        $presetParameters = [];
        $selectedParameterIds = DB::table('parameter_preset')
            ->where('preset_id', $id)
            ->pluck('parameter_id')
            ->toArray();

        foreach ($allParameters as $parameter) {
            $isSelected = in_array($parameter->id, $selectedParameterIds);
            $presetParameters[] = [
                'id' => $parameter->id,
                'name' => $parameter->name,
                'level' => $parameter->level,
                'selected' => $isSelected,
            ];
        }

        return response()->json([
            'message' => 'Preset details',
            'preset' => [
                'id' => $preset->id,
                'title' => $preset->title,
                'description' => $preset->description,
                'picture' => $preset->picture,
                'parameters' => $presetParameters,
            ],
        ], 200);
    }

    public function store(PresetRequest $request)
    {
        $preset = Preset::create([
            'title' => $request->title,
            'description' => $request->description,
            'picture' => $request->picture,
        ]);

        if ($request->has('parameters')) {
            $preset->parameters()->attach($request->parameters);
        }

        $preset->load('parameters');

        return response()->json(['message' => 'Preset created successfully', 'data' => $preset], 201);
    }

    public function update(PresetRequest $request, $id)
    {
        $preset = Preset::findOrFail($id);

        $preset->update([
            'title' => $request->title,
            'description' => $request->description,
            'picture' => $request->picture,
        ]);

        if ($request->has('parameters')) {
            $preset->parameters()->sync($request->parameters);
        }

        $preset->load('parameters');

        return response()->json(['message' => 'Preset updated successfully', 'data' => $preset], 200);
    }

    public function destroy($id)
    {
        $preset = Preset::findOrFail($id);

        if ($preset->events()->exists()) {
            return response()->json(['error' => 'Preset is used in an event'], 400);
        }

        $preset->delete();

        return response()->json(['message' => 'Preset deleted successfully']);
    }
}
