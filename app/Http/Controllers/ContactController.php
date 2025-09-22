<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email',
            'message'    => 'nullable|string'
        ]);

        ContactUs::create($request->all());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
