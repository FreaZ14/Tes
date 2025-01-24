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
    public function testDependency()
    {
        //$foo = new Foo();
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

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

    public function testIntance()
    {
        $person = new Person("Farhan", "Assyauqi");
        $this->app->Instance(Person::class, $person);
            
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        $person3 = $this->app->make(Person::class);
        $person4 = $this->app->make(Person::class);

        self::assertEquals('Farhan', $person1->firstName);
        self::assertEquals('Farhan', $person1->firstName);
        self::assertSame($person1, $person2);
    }

    public function testDependencyInjection()
    {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });
        $this->app->singleton(Bar::class, function ($app) {
            $foo = $app->make(Foo::class);
            return new Bar($foo); 
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo, $bar1->foo);
        self::assertSame($bar1, $bar2);
    }
  }