<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\ResponseController;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
       $this->get('/response/hello')
            ->assertStatus(200)
            ->assertSeeText('Hello Response');
    }

    public function testHeader()
    {
       $this->get('/response/header')
            ->assertStatus(200)
            ->assertSeeText('Farhan')->assertSeeText('Assyauqi')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author', 'Farhan Assyauqi')
            ->assertHeader('App', 'Laravel');
    }
}       

