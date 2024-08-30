<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Filter;
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
        return Event::select('id', 'title', 'start_time', 'end_time')->get();
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

        Log::info('Validated data:', $validated); // Логируем валидированные данные

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

    public function show($id)
    {
        // Загрузка события вместе с пользователями
        $event = Event::with('users')->findOrFail($id);
        return new EventResource($event);
    }

}
