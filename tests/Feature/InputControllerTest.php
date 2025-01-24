<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\InputController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    public function testInputType()
    {
        $this->post('/input/type', [
            'name' => 'Farhan',
            'married' => 'false', // String 'false' akan dikonversi ke boolean false
            'birth_date' => '2006-01-21'
        ])
        ->assertSeeText([
            'name' => 'Farhan',
            'married' => false,
            'birth_date' => "2006-01-21",
        ]);
    }
    


    
}


