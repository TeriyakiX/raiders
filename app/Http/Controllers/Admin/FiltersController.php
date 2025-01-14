<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Filter;
use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function index()
    {
        return response()->json(Filter::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'value' => 'required|string',
        ]);

        $filter = Filter::create($data);

        return response()->json($filter, 201);
    }
}
