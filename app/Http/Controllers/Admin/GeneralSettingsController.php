<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeagueSetting;
use App\Models\MathSetting;
use App\Models\Setting;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function getAllSettings()
    {
        return Setting::all();
    }

    public function updateAllSettings(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return response()->json(['message' => 'Settings updated successfully']);
    }

    public function getAllLeagues()
    {
        return LeagueSetting::all();
    }

    public function updateAllLeagues(Request $request)
    {
        foreach ($request->all() as $league) {
            LeagueSetting::updateOrCreate(['name' => $league['name']], ['settings' => json_encode($league['settings'])]);
        }
        return response()->json(['message' => 'League settings updated successfully']);
    }

    public function getAllMathSettings()
    {
        return MathSetting::all();
    }

    public function updateAllMathSettings(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            MathSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return response()->json(['message' => 'Math settings updated successfully']);
    }
}
