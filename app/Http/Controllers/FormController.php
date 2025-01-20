<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Menampilkan form
    public function showForm()
    {
        return view('form');
    }

    // Menangani data dari form
    public function handleForm(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'nullable|integer',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'subscribe' => 'nullable|boolean',
            'gender' => 'required|in:male,female',
            'birth_date' => 'nullable|date',
            'comments' => 'nullable|string|max:500',
        ]);

        // Tampilkan data yang diterima
        return response()->json($validated);
    }
}
