<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $married = filter_var($request->input('married'), FILTER_VALIDATE_BOOLEAN); // Mendukung 'false' sebagai boolean
        $birthDate = $request->date('birth_date', 'Y-m-d');
    
        return json_encode([
            'name' => $name,
            'married' => $married,
            'birth_date' => $birthDate->format('Y-m-d')
        ]);
    }
    
    public function filterOnly(Request $request): string 
    {
        $name = $request->only("name.first", "name.last");
        return json_encode($name);
    }

    public function filterExcept(Request $request): string
    {
        $user = $request->except("admin");
        return json_encode($user);
    }
}
