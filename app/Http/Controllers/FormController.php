<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function form(): Response
    {
      return response()->view("hello.form");
    }

    public function submitForm(Request $request): Response
    {
      $name = $request->input("name");
      return response()->view("hello", [
        "name" => $name
      ]);
    }
}

