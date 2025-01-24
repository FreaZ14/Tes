<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InputController extends Controller
{
    public function hello(Request $request): string {
        $name = $request->input('name');
        return "Hello $name";
    }

    public function helloFirstName(Request $request): string 
     {
        $firstname = $request->input('name.first');
        return "Hello $firstname";
    }

    public function inputType(Request $request): string {
        $name = $request->input('name');
        $married = $request->boolean('married');
        $birthDate = $request->date('birth_date', 'Y-m-d');

        return json_encode([
            'name' => $name,
            'married' => $married,  
            'birth_date' => $birthDate->format('Y-m-d')
        ]);
    }
}
