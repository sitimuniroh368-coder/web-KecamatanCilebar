<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DesaController extends Controller
{
    public function index(): View
    {
        $desas = Desa::orderByDesc('created_at')->paginate(15);

        return view('admin.desa.index', compact('desas'));
    }

    public function create(): View
    {
        return view('admin.desa.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100',
            'description' => 'required|string',
            'population' => 'nullable|integer|min:0',
            'area' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            'contact_person' => 'nullable|string|max:100',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:100',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'statistics' => 'nullable|json',
        ]);

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'), 'desa');
        }

        // Parse statistics if provided as JSON string
        if (!empty($data['statistics']) && is_string($data['statistics'])) {
            $data['statistics'] = json_decode($data['statistics'], true);
        }

        Desa::create($data);

        return redirect()->route('admin.desa.index')->with('success', 'Data desa berhasil ditambahkan.');
    }

    public function edit(Desa $desa): View
    {
        return view('admin.desa.edit', compact('desa'));
    }

    public function update(Request $request, Desa $desa): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100',
            'description' => 'required|string',
            'population' => 'nullable|integer|min:0',
            'area' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            'contact_person' => 'nullable|string|max:100',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:100',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'statistics' => 'nullable|json',
        ]);

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        if ($request->hasFile('image')) {
            $this->deleteImage($desa->image);
            $data['image'] = $this->storeImage($request->file('image'), 'desa');
        }

        // Parse statistics if provided as JSON string
        if (!empty($data['statistics']) && is_string($data['statistics'])) {
            $data['statistics'] = json_decode($data['statistics'], true);
        }

        $desa->update($data);

        return redirect()->route('admin.desa.index')->with('success', 'Data desa berhasil diperbarui.');
    }

    public function destroy(Desa $desa): RedirectResponse
    {
        $this->deleteImage($desa->image);
        $desa->delete();

        return redirect()->route('admin.desa.index')->with('success', 'Data desa berhasil dihapus.');
    }

    protected function storeImage($file, string $prefix): string
    {
        $filename = $prefix.'_'.now()->format('Ymd_His').'_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $destination = public_path('uploads');
        if (!is_dir($destination)) {
            mkdir($destination, 0775, true);
        }
        $file->move($destination, $filename);

        return $filename;
    }

    protected function deleteImage(?string $path): void
    {
        if ($path) {
            $fullPath = public_path('uploads/' . basename($path));
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
        }
    }
}
