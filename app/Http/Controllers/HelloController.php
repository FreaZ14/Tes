<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\HelloController;
use Illuminate\Http\Request;
use App\Services\HelloService;

class HelloControllerTest extends TestCase
{
    private HelloController $helloController;

    public function __construct(HelloController $helloController)
    {
        $this->helloController = $helloController;
    }

    public function test_hello()
    {
        $request = Request::create('/hello', 'GET', ['name' => 'Farhan']);

        $response = $this->helloController->hello($request);

        $this->assertEquals('Hello Farhan', $response->getContent());
    }
}


