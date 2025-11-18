<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $profile = Profile::first() ?? new Profile(['id' => 1]);

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'content' => 'required|string',
            'tugas_fungsi' => 'nullable|string',
            'sejarah' => 'nullable|string',
        ]);

        $profile = Profile::firstOrCreate(['id' => 1]);
        $profile->content = $data['content'];
        $profile->tugas_fungsi = $data['tugas_fungsi'] ?? null;
        $profile->sejarah = $data['sejarah'] ?? null;
        $profile->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}


