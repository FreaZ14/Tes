<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class RoutingTest extends TestCase   
{
    public function testGet()
    {
        $this->get('/pzn')
            ->assertStatus(200)
            ->assertSeeText('Hello Farhan');
    }
    
    public function testRedirect()
    {
        $this->get('/youtube')
            ->assertRedirect('/pzn');
    }
    public function testNamedRoute()
    {
        $this->get('/produk/12345')
            ->assertSeeText('Link : http://localhost/products/12345');

        $this->get('/produk-redirect/12345')
            ->assertRedirect('/products/12345');
    }

    public function testRouteParameter()
    {
        $this->get('/products/1')
            ->assertSeeText('Product 1');

        $this->get('/products/2')
            ->assertSeeText('Product 2');

        $this->get('/products/1/items/XXX')
            ->assertSeeText("Products : 1, Items : XXX");

        $this->get('/products/2/items/YYY')
            ->assertSeeText("Products : 2, Items : YYY");
    }
}






