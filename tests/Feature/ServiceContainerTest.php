<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;

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
        self::assertNotSame($foo1, $foo2); 
    }

    public function testBind()
    {
        //$person = $this->app->make(Person::class);
        //self::assertNotNull($person);

        $this->app->bind(Person::class, function ($app) {
            return new Person("Farhan", "Assyauqi"); 
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Farhan', $person1->firstName);
        self::assertEquals('Farhan', $person1->firstName);
        self::assertNotSame($person1, $person2);
    }

    public function testSingleton()
    {
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Farhan", "Assyauqi"); 
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Farhan', $person1->firstName);
        self::assertEquals('Farhan', $person1->firstName);
        self::assertSame($person1, $person2);
    }
  }