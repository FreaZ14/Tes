<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testURLCurrent()
    {
        $this->get('/url/current?name=Farhan')
        ->assertSeeText("/url/current?name=Farhan");
    }

    public function testNamed()
    {
        $this->get('/redirect/named')
        ->assertSeeText("/redirect/name/Farhan");
    }
}
