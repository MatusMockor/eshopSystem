<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit(Setting $setting)
    {
        return view('dashboard.setting.edit', [
            'setting' => $setting,
        ]);
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->update($request->validated());

        return to_route('dashboard')->with('success', 'Page setting was successfully updated');
    }
}
