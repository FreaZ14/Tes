<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    public function testCreateSession()
    {
        $this->get('/session/create')
            ->assertSessionHas('userId', 'Farhan')
            ->assertSessionHas('isMember', true);
    }

    public function testGetSession()
    {
        $this->withSession([
            'userId' => "Farhan",
            'isMember' => "true"
        ])->get('/session/get')
            ->assertSeeText('User ID :  Farhan, Is Member : true');
    }
}
