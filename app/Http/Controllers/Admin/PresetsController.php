<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PresetRequest;
use App\Http\Resources\PresetResource;
use App\Models\Parameter;
use App\Models\Preset;
use Illuminate\Support\Facades\DB;

class PresetsController extends Controller
{
    public function index()
    {
        $presets = Preset::all();
        return response()->json($presets);
    }

    public function store(PresetRequest $request)
    {
        $validated = $request->validated();

        $preset = Preset::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $validated['image'],
        ]);

        $preset->parameters()->sync($validated['parameters']);

        return new PresetResource($preset);
    }

    public function show($id)
    {
        $preset = Preset::findOrFail($id);
        return response()->json($preset);
    }

    public function update(PresetRequest $request, $id)
    {
        $preset = Preset::findOrFail($id);
        $preset->update($request->validated());
        return response()->json($preset);
    }

    public function destroy($id)
    {
        $preset = Preset::findOrFail($id);
        $preset->delete();
        return response()->json(['message' => 'Preset deleted successfully']);
    }
}
