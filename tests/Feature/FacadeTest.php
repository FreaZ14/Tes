<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Config;

class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $firstname1 = config('contoh.author.first');
        $firstname2 = Config::get('contoh.author.first');

        self::assertEquals($firstname1, $firstname2);

        var_dump(Config::all());
    }
}
