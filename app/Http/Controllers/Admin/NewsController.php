<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::orderByDesc('created_at')->paginate(15);

        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:180',
            'summary' => 'required|string|max:300',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->storeImage($request->file('image'), 'news');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:180',
            'summary' => 'required|string|max:300',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($news->image_path);
            $data['image_path'] = $this->storeImage($request->file('image'), 'news');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->deleteImage($news->image_path);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
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


