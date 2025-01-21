<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function handleForm(Request $request)
    {
        // Filter input
        $data = $request->only(['name', 'email']);
        $data['name'] = trim($data['name']);
        $data['email'] = strtolower($data['email']);

        return response()->json($data);
    }
}
