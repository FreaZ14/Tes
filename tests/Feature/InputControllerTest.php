<?php

namespace Tests\Feature;

use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput(): void
    {
        $this->post('/input/hello', [
            'name' => 'Farhan'
        ])->assertSeeText('Hello Farhan');
    }

    public function testInputNested(): void
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Farhan',
                'last' => 'Assyauqi'
            ]
        ])->assertSeeText('Hello Farhan Assyauqi');
    }
}
