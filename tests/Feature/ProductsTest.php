<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{

    use RefreshDatabase;
   
    public function test_homepage_contains_empty_products_table()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('No products found.');
    }

    public function test_homepage_contains_non_empty_products_table()
    {
        // Create a product
        $product = Product::create([ 'name' => 'Product 011', 'price' => 99.46]);

        $response = $this->get('/');
        
        $response->assertStatus(200);

        $response->assertDontSee('No products found.');

        //$response->assertSee($product->name | 'Product 01'); // Product 011 = true

        $view_products = $response->viewData('products');
        //dd($view_products);
        $this->assertEquals($product->name, $view_products->first()->name);
    }
}
