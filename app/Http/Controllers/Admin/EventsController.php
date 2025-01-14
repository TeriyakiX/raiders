<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource\EventResource;
use App\Http\Resources\EventResource\EventShowResource;
use App\Models\Event;
use App\Models\Filter;
use App\Models\Location;
use App\Models\Preset;
use App\Services\MetaMaskAuthService;
use Illuminate\Support\Facades\Log;

class EventsController extends Controller
{
    protected $metaMaskAuthService;

    public function __construct(MetaMaskAuthService $metaMaskAuthService,)
    {
        $this->metaMaskAuthService = $metaMaskAuthService;
    }
    public function index()
    {
        $events = Event::with('location', 'preset','filters')->get();

        return EventResource::collection($events);
    }

    public function store(EventRequest $request)
    {
        $validatedData = $request->validated();

        $location = Location::findOrFail($validatedData['location_id']);
        $preset = Preset::findOrFail($validatedData['preset_id']);

        // Создание события
        $event = Event::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
            'prize' => $validatedData['prize'],
            'location_id' => $location->id,
            'preset_id' => $preset->id,
        ]);

        if (!empty($validatedData['filter_ids'])) {
            $event->filters()->sync($validatedData['filter_ids']);
        }

        $event->load('location', 'preset', 'filters');

        return response()->json(new EventResource($event), 201);
    }

    // Обновление события
    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validated();

        $event->update($validated);

        if (!empty($validated['filter_ids'])) {
            $event->filters()->sync($validated['filter_ids']);
        } else {
            $event->filters()->detach();
        }

        $event->load('filters');

        return new EventResource($event);
    }

    // Удаление события
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }

    // Получение одного события
    public function show($id)
    {
        $event = Event::with('location', 'preset', 'filters')->findOrFail($id);
        return new EventResource($event);
    }

}
