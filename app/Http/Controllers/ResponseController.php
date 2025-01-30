<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ResponseController extends Controller
{
    public function response(Request $request): Response
    {
        return response("Hello Response");
    }

    public function header(Request $request): Response
    {
        $body = [
            'firstname' => 'Farhan',
            'lastname' => 'Assyauqi'
        ];

        return response(json_encode($body), 200)
            ->header('Content-Type', 'application/json')
            ->withHeaders([
                'Author' => 'Farhan Assyauqi',
                'App' => 'Laravel'
            ]);
    }
    public function download(Request $request): Response
    {
        return response()
        ->view('hello', ['name' => 'Farhan']);
}
public function responseJson(Request $request): JsonResponse
{
    $body = [ 
        'firstname' => 'Farhan',
        'lastname' => 'Assyauqi'
    ];
    return response()
    ->json($body);
}
public function responseFile(Request $request): BinaryFileResponse
{
    return response()
    ->file(storage_path('app/public/Batu.png'));
}

public function responseDownload(Request $request): BinaryFileResponse
{
    return response()
    ->download(storage_path('app/public/Batu.png'));
}
}