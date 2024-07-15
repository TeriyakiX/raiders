<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        return Location::all(['id', 'title']);
    }

    public function show($id)
    {
        return Location::findOrFail($id);
    }

    public function store(LocationRequest $request)
    {
        $location = Location::create($request->validated());
        return new LocationResource($location);
    }

    public function update(LocationRequest $request, $id)
    {
        $location = Location::findOrFail($id);
        $location->update($request->validated());
        return new LocationResource($location);
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);

        if ($location->events()->exists()) {
            return response()->json(['error' => 'Location is used in an event'], 400);
        }

        $location->delete();

        return response()->json(['message' => 'Location deleted successfully']);
    }
}
