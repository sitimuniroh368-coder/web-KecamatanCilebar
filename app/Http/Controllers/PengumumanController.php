<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengumumanController extends Controller
{
    public function index(Request $request): View
    {
        $announcements = Announcement::orderByDesc('created_at')->paginate(9);

        return view('pages.pengumuman', compact('announcements'));
    }

    public function show(int $id): View
    {
        $announcement = Announcement::findOrFail($id);

        return view('pages.detail_pengumuman', compact('announcement'));
    }
}


