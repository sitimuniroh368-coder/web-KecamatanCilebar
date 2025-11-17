<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LayananController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('name')->get();

        return view('pages.layanan', compact('services'));
    }

    public function show(int $id): View
    {
        $service = Service::findOrFail($id);

        return view('pages.detail_layanan', compact('service'));
    }
}


