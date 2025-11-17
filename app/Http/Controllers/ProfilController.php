<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Profile;
use App\Models\WelcomeMessage;
use App\Models\WilayahInfo;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function index(): View
    {
        $profile = Profile::first();
        $welcome = WelcomeMessage::first();
        $leaders = Employee::orderBy('display_order')->get();
        $wilayah = WilayahInfo::first();

        return view('pages.profil', compact('profile', 'welcome', 'leaders', 'wilayah'));
    }
}
