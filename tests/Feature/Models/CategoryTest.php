<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_api_should_return_sorted_roots_categories()
    {
        $categories = factory(Category::class, 3)->create();
        $categories->each(function ($category) {
            $category->update([
                'order' => $category->id
            ]);
        });

        $response = $this->json('GET', 'api/categories');

        $categories->each(function ($category) use ($response) {
            $response->assertJsonFragment([
                'slug' => $category->slug
            ]);
        });

        // 倒序验证，因为控制器里是 desc 所以这里要倒过来
        $response->assertSeeInOrder([
            $categories->last()->slug, $categories->first()->slug
        ]);
    }


}
