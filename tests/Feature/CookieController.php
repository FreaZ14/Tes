<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieController extends TestCase
{
    public function testCreateCookie(): void
    {
        $this->get(uri: '/cookie/set')
            ->assertSeeText(value: 'Hello Cookie')
            ->assertCookie(cookieName: 'User-Id', value: 'Farhan')
            ->assertCookie(cookieName: 'Is_Member', value: 'true');
    }
}
