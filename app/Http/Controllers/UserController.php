<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan form
    public function create()
    {
        return view('user_form');
    }

    // Menyimpan data dari form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Akses input
        $name = $request->input('name');
        $email = $request->input('email');

        return "Data yang diterima: Name = $name, Email = $email";
    }
}
