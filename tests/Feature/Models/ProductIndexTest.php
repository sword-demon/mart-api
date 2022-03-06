<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function product_index_api_should_return_paginate_data()
    {
        factory(Category::class, 2)->create();
        factory(Product::class, 50)->create();

        $response = $this->json('GET', 'api/products');

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'current_page' => 1
        ]);

        $response->assertJsonStructure([
            'meta',
            'links'
        ]);

        $data = json_decode($response->getContent())->data;

        $this->assertCount(10, $data);
    }
}
