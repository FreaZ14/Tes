<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
       public function testInput()
    {
        $this->get('/input/hello?name=Farhan')
            ->assertSeeText('Hello Farhan');

        $this->post('/input/hello', [
            'name' => 'Farhan'
        ])->assertSeeText('Hello Farhan');
    }
    public function testInputNested()
    {
        $this->post('/input/hello/first', [
            "name" => [
                "first" => "Farhan",
                "last" => "Assyauqi"
            ]
        ])->assertSeeText('Hello Farhan');
    }
}
