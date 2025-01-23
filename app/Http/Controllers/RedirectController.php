<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return "RedirectTo";
    }
    public function redirectFrom(): RedirectResponse
    {
        return redirect("/redirect/to");
    }
}
