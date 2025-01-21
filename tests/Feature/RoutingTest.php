<?php

use Tests\TestCase;

class RoutingTest extends TestCase
    
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRouteParameter(): void
            {
                $this->get(uri: '/products/1')
                    ->assertSeeText(text: 'Product 1');
            
                $this->get(uri: '/products/2')
                    ->assertSeeText(text: 'Product 2');
            
                $this->get(uri: '/products/1/items/XXX')
                    ->assertSeeText(value: 'product 1 item XXX');
            
                $this->get(uri: '/products/2/items/YYY')
                    ->assertSeeText(value: 'product 2 item YYY');
            
    }

    public function testNamed()
    {
        $this->get('/produk/12345')
            ->assertSeeText('Link http://localhost/produk/12345');

        $this->get('/produk-redirect/12345')
            ->assertRedirect('/products/12345');
    }
}






