<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function product_show_api_should_return_a_exist_product()
    {
        $response = $this->json('GET', 'api/products/hello');

        $response->assertStatus(404);

        factory(Category::class, 1)->create();
        // create 返回的是 collection
        $product = factory(Product::class, 1)->create()->first();

        $response = $this->json('GET', 'api/products/'.$product->slug);

        $response->assertJsonFragment([
            'slug' => $product->slug
        ]);
    }
}
