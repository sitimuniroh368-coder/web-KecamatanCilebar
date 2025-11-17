<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\View\View;

class DataPegawaiController extends Controller
{
    public function index(): View
    {
        $employees = Employee::orderBy('display_order')->orderBy('name')->get();

        $groupedEmployees = $employees->groupBy(function ($employee) {
            return $employee->division ?? 'Lainnya';
        });

        return view('pages.data_pegawai', compact('groupedEmployees'));
    }
}

