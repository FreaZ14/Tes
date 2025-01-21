<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse(): void
    {
        $this->get('/response/hello')
            ->assertStatus(404)
            ->assertDontSeeText('hello response');
    }

    public function testHeader(): void
    {
        $this->get('/response/header')
            ->assertStatus(404)
            ->assertDontSeeText('Farhan')
            ->assertDontSeeText('Assyauqi')
            ->assertHeaderMissing('Content-Type', 'application/json')
            ->assertHeaderMissing('Author', 'Muhammad Farhan Assyauqi')
            ->assertHeaderMissing('App', 'Belajar Laravel');
            

    $response = $this->get('/response/header');
    
    $response->assertHeader('X-Custom-Header', 'CustomValue');


    }
}

