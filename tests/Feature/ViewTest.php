<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\Controller;

class ViewTest extends TestCase
{
    public function testView()
    {
     $this->get('/hello')
     ->assertSeeText('Hello Farhan');

     $this->get('/hello-again')
     ->assertSeeText('Hello Farhan');
    }

    public function testNested()
    {
    $this->get('/hello-world')
    ->assertSeeText('World Farhan');
}
}
