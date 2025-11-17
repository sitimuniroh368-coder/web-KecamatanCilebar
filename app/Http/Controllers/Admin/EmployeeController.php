<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::orderBy('display_order')->orderBy('name')->paginate(20);

        return view('admin.employees.index', compact('employees'));
    }

    public function create(): View
    {
        return view('admin.employees.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'position' => 'required|string|max:160',
            'division' => 'nullable|string|max:120',
            'phone' => 'nullable|string|max:60',
            'email' => 'nullable|email|max:160',
            'display_order' => 'nullable|integer|min:0',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $this->storeImage($request->file('photo'));
        }

        Employee::create($data);

        return redirect()->route('admin.employees.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(Employee $employee): View
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'position' => 'required|string|max:160',
            'division' => 'nullable|string|max:120',
            'phone' => 'nullable|string|max:60',
            'email' => 'nullable|email|max:160',
            'display_order' => 'nullable|integer|min:0',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        if ($request->hasFile('photo')) {
            $this->deleteImage($employee->photo_path);
            $data['photo_path'] = $this->storeImage($request->file('photo'));
        }

        $employee->update($data);

        return redirect()->route('admin.employees.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $this->deleteImage($employee->photo_path);
        $employee->delete();

        return redirect()->route('admin.employees.index')->with('success', 'Data pegawai berhasil dihapus.');
    }

    protected function storeImage($file): string
    {
        $filename = 'pegawai_' . now()->format('Ymd_His') . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $destination = public_path('uploads');
        if (!is_dir($destination)) {
            mkdir($destination, 0775, true);
        }
        $file->move($destination, $filename);

        return $filename;
    }

    protected function deleteImage(?string $path): void
    {
        if ($path) {
            $fullPath = public_path('uploads/' . basename($path));
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
        }
    }
}


