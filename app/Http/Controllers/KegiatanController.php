<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class KegiatanController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::orderByDesc('created_at')->paginate(12);

        return view('pages.kegiatan', compact('galleries'));
    }
}


