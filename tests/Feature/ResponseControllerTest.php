<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
       public function testResponse(): void
    {
        $this->get(uri: '/response/hello')
            ->assertStatus(value : 200);
            ->assertSeeText(value: 'Hello response');
    }
    public function testHeader(): void
    {
        $this->get(uri: '/response/header')
            ->assertStatus(value: 200)
            ->assertSeeText(value: 'Farhan')->assertSeeText(value: 'Assyauqi')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author','Muhammad Farhan Assyauqi')
            ->assertHeader('App', 'Belajar Laravel');
}
}
