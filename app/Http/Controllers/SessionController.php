<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        $request->session()->put("userId", "Farhan");
        $request->session()->put("isMember", true);
        return "OK";
    }

}
