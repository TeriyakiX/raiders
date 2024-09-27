<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource\EventResource;
use App\Http\Resources\EventResource\EventShowResource;
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
    // Получение списка событий
    public function index()
    {
        $events = Event::all(); // Загружаем события без фильтров, так как они теперь в самих событиях
        return EventShowResource::collection($events); // Возвращаем поверхностный ресурс
    }

    // Создание события
    public function store(EventRequest $request) // Используем EventRequest
    {
        // Валидированные данные уже получены в $request через EventRequest
        $validatedData = $request->validated();

        // Создаём событие
        $event = Event::create($validatedData);

        return response()->json(new EventResource($event), 201);
    }

    // Обновление события
    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validated();
        Log::info('Validated data:', $validated); // Логируем валидированные данные

        $event->update($validated);

        return new EventResource($event); // Возвращаем обновленный ресурс
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
        $event = Event::findOrFail($id); // Загружаем событие без фильтров, так как фильтры больше не нужны
        return new EventResource($event); // Возвращаем полный ресурс
    }

}
