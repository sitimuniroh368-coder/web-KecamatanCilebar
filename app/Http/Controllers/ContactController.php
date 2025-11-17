<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use App\Models\WelcomeMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $settings = Setting::getSettings();
        $welcome = WelcomeMessage::first();
        $camatName = $welcome ? $welcome->camat_name : 'Camat Cilebar';

        return view('pages.kontak', compact('settings', 'camatName'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:160',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->route('kontak')->with('success', 'Pesan Anda telah terkirim. Terima kasih.');
    }
}

