<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::orderByDesc('created_at')->paginate(18);

        return view('admin.gallery.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:160',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        $data['image_path'] = $this->storeImage($request->file('image'));

        Gallery::create($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $this->deleteImage($gallery->image_path);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil dihapus.');
    }

    protected function storeImage($file): string
    {
        $filename = 'galeri_' . now()->format('Ymd_His') . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
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


