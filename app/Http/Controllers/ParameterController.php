<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParameterResource;
use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function index()
    {
        $parameters = Parameter::all();
        return ParameterResource::collection($parameters);
    }
}
