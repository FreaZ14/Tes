<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    public function testHello(): void
    {
        $this->get('/controller/hello/Farhan')
            ->assertSeeText(value: 'Halo Farhan');
    }
}
