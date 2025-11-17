<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WilayahInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WilayahController extends Controller
{
    public function edit(): View
    {
        $wilayah = WilayahInfo::first() ?? new WilayahInfo(['id' => 1]);

        return view('admin.wilayah.edit', compact('wilayah'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'content' => 'required|string',
            'map_iframe' => 'nullable|string',
        ]);

        $wilayah = WilayahInfo::firstOrCreate(['id' => 1]);
        $wilayah->content = $data['content'];
        $wilayah->map_iframe = $data['map_iframe'] ?? null;
        $wilayah->save();

        return back()->with('success', 'Informasi wilayah berhasil diperbarui.');
    }
}


