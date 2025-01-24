<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\InputController;
use Illuminate\Http\Request;

class InputControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testInputType()
    {
    $this->post('/input/type', [
        'name' => 'Farhan',
        'married' => 'true', // Kirim sebagai string
        'birth_date' => '2006-01-21'
    ])
    ->assertSeeText('Farhan')
    ->assertSeeText("true")
    ->assertSeeText("2006-01-21");
    }

    
}


