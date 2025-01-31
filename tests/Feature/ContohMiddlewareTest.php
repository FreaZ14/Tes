<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Middleware\ContohMiddleware as Middleware;

class ContohMiddlewareTest extends TestCase
{
    public function testMiddlewareInvalid()
    {
       $this->get('/middleware/api')
            ->assertStatus(401)
            ->assertSeeText("Acces Denied");
    }

    public function testMiddlewareValid()
    {
        $this->withHeader('X-API-KEY', 'PZN')
            ->get('/middleware/api')
            ->assertStatus(200)
            ->assertSeeText("OK");
    }
}

