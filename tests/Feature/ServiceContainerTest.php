<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDependencyInjection()
    {
        //$foo = new Foo();
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Bar::class);

        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());
        self::assertNotEquals($foo1, $foo2); 
    }

    public function testBind()
    {
        $person = $this->app->make(Person::class);
        self::assertNotNull($person);
    }
}
