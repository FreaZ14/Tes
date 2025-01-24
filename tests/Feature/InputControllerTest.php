<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\InputController;

class InputControllerTest extends TestCase
{
    use RefreshDatabase;

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
        ])->assertSeeText("Hello Farhan");
    }

    public function testInputType()
    {
        $this->post('/input/type', [
            'name' => 'Farhan',
            'married' => false,
            'birth_date' => '2006-21-01'
        ])->assertSeeText('Farhan')->assertSeeText("false")->assertSeeText("2006-21-01");
    }
}

