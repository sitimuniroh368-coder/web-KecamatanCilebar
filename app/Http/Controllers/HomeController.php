<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\WelcomeMessage;
use App\Models\WilayahInfo;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $news = News::orderByDesc('created_at')->limit(3)->get();
        $welcome = WelcomeMessage::first();
        $wilayah = WilayahInfo::first();

        return view('pages.home', compact('news', 'welcome', 'wilayah'));
    }
}

