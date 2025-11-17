<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\View\View;

class DesaController extends Controller
{
    public function show($slug): View
    {
        $desa = Desa::where('slug', $slug)->firstOrFail();

        return view('pages.desa_detail', compact('desa'));
    }
}
