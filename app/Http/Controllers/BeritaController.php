<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;   
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function index(Request $request): View
    {
        $news = News::orderByDesc('created_at')->paginate(9);

        return view('pages.berita', compact('news'));
    }

    public function show(int $id): View
    {
        $newsItem = News::findOrFail($id);

        return view('pages.detail_berita', compact('newsItem'));
    }
}
