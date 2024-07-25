<?php

namespace App\Http\Controllers;

use App\Services\NftCardService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class InventoryController extends Controller
{
    protected $nftCardService;

    public function __construct(NftCardService $nftCardService)
    {
        $this->nftCardService = $nftCardService;
    }

    public function getUserInventory(Request $request)
    {
        // Получаем access_token из куки
        $accessToken = $request->cookie('access_token');

        if (!$accessToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Вызываем метод getUserInventory из NftCardService для выполнения запроса к API
        $inventoryData = $this->nftCardService->getUserInventory($accessToken);

        // Логируем полученные данные
        Log::info('InventoryController Response:', ['data' => $inventoryData]);

        // Проверяем наличие ошибок и возвращаем результат
        if (isset($inventoryData['error'])) {
            return response()->json(['message' => $inventoryData['error']], 500);
        } else {
            return response()->json($inventoryData);
        }
    }
}
