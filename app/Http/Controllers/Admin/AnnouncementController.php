<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    public function index(): View
    {
        $announcements = Announcement::orderByDesc('created_at')->paginate(15);

        return view('admin.announcements.index', compact('announcements'));
    }

    public function create(): View
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:180',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeImage($request->file('image'), 'announcement');
        }

        Announcement::create($data);

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(Announcement $announcement): View
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:180',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($announcement->image_path);
            $data['image_path'] = $this->storeImage($request->file('image'), 'announcement');
        }

        $announcement->update($data);

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Announcement $announcement): RedirectResponse
    {
        $this->deleteImage($announcement->image_path);
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Pengumuman berhasil dihapus.');
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


