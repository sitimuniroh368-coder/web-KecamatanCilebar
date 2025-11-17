<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function edit(): View
    {
        $welcome = WelcomeMessage::first() ?? new WelcomeMessage(['id' => 1]);

        return view('admin.welcome.edit', compact('welcome'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'camat_name' => 'required|string|max:120',
            'message' => 'required|string',
            'sekretaris_name' => 'nullable|string|max:120',
            'camat_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'sekretaris_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $welcome = WelcomeMessage::firstOrCreate(['id' => 1]);
        $welcome->fill($data);

        if ($request->hasFile('camat_photo')) {
            $welcome->camat_photo = $this->storeImage($request->file('camat_photo'), 'camat');
        }

        if ($request->hasFile('sekretaris_photo')) {
            $welcome->sekretaris_photo = $this->storeImage($request->file('sekretaris_photo'), 'sekretaris');
        }

        $welcome->save();

        return back()->with('success', 'Data sambutan berhasil diperbarui.');
    }

    protected function storeImage($file, string $prefix): string
    {
        $filename = $prefix . '_' . now()->format('Ymd_His') . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $destination = public_path('uploads');
        if (!is_dir($destination)) {
            mkdir($destination, 0775, true);
        }
        $file->move($destination, $filename);

        return $filename;
    }
}


