<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $setting = Setting::first() ?? new Setting(['id' => 1]);

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:60',
            'email' => 'nullable|email|max:160',
            'whatsapp' => 'nullable|string|max:60',
            'instagram' => 'nullable|string|max:160',
            'facebook' => 'nullable|string|max:160',
        ]);

        $setting = Setting::firstOrCreate(['id' => 1]);
        $setting->fill($data);
        $setting->save();

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}


