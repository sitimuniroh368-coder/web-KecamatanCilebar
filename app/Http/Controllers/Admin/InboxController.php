<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InboxController extends Controller
{
    public function index(): View
    {
        $messages = Contact::orderByDesc('created_at')->paginate(20);

        return view('admin.inbox.index', compact('messages'));
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.inbox.index')->with('success', 'Pesan berhasil dihapus.');
    }
}


