<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function createCookie(Request $request): Response
    {
        return response("Hello Cookie")
        ->cookie("User-Id", "Farhan", 1000, "/")
        ->cookie("Is_Member", "true", 1000, "/");
    }
}
