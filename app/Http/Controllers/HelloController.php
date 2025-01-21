<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\HelloController;
use Illuminate\Http\Request;
use App\Services\HelloService;

class HelloControllerTest extends Controller
{
    private $helloService;

    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }

    public function hello(Request $request, string $name)
    {
        return $this->helloService->hello(['name' => $name]);        
    }
}


