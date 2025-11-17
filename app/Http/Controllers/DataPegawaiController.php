<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DataPegawaiController extends Controller
{
    public function index(): View
    {
        // Data desa diambil langsung dari view (hardcoded untuk sekarang)
        // Di masa depan bisa diambil dari database jika ada tabel Desa

        return view('pages.data_pegawai');
    }
}
