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

    public function testInputType(): void
    {
        $this->post(uri:'/input/type',data: [
            'name' => 'Farhan',
            'married' => false,
            'birth_date' => '2006-01-21'
        ])->assertSeeText(value: 'Farhan')->assertSeeText(value: 'false')->assertSeeText(value: '2006-01-21');
    }
}
