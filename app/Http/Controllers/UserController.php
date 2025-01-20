<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan form
    public function create()
    {
        return view('user_form'); // Mengarahkan ke file view user_form.blade.php
    }

    // Menyimpan data dari form
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Mengambil input
        $name = $request->input('name');
        $email = $request->input('email');

        // Menampilkan hasil input
        return "Data yang diterima: Name = $name, Email = $email";
    }
}
