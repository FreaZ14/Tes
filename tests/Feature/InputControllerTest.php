<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class InputControllerTest extends TestCase
{
    public function testInput(): void
    {
        $this->post(uri:'/input/hello', data: [
            'name' => 'Farhan',
        ])->assertSeeText('Hello Farhan');
    }

    public function testInputNested(): void
    {
        $this->post(uri:'/input/hello/first', data: [
            'name' => [
                'first' => 'Farhan',
                'last' => 'Assyauqi'
            ],
        ])->assertSeeText('Hello Farhan Assyauqi');
    }
}