<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return "Redirect To";
    }
    public function redirectFrom(): RedirectResponse
    {
        return redirect('/redirect/to');
    }
    public function redirectName(): RedirectResponse
    {
        return redirect()->route('redirect-hello', [
            'name' => 'Farhan'
        ]);
    }
}
