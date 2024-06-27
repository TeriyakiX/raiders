<?php

namespace App\Http\Controllers\Admin\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventsController extends Controller
{
    public function index()
    {
        return Event::select('id', 'title', 'start_time', 'end_time')->get();
    }

    public function show($id)
    {
        return new EventResource(Event::with('filters')->findOrFail($id));
    }

    public function store(EventRequest $request)
    {
        $event = Event::create($request->validated());
        $this->syncFilters($event, $request->filters);

        return new EventResource($event->load('filters'));
    }

    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validated();

        $event->update($validated);
        $this->syncFilters($event, $request->filters);

        return new EventResource($event->load('filters'));
    }

    private function syncFilters(Event $event, array $filters = null)
    {
        if ($filters) {
            $filterIds = [];
            foreach ($filters as $filter) {
                $filterRecord = Filter::firstOrCreate([
                    'type' => $filter['type'],
                    'value' => $filter['value']
                ]);
                $filterIds[] = $filterRecord->id;
            }
            $event->filters()->sync($filterIds);
        }
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
