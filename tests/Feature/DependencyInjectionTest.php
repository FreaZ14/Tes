<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    public function testDependencyInjection()
    {
        $foo = new Foo();
        $bar = new Bar($foo);
        $bar->setFoo($foo);
        $bar->foo = $foo;

        self::assertEquals('Foo And Bar', $bar->bar());
    }
}
