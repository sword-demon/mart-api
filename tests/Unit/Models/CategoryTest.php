<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function a_category_has_many_children()
    {
        $parent = factory(Category::class)->create();

        $parent->children()->saveMany([
            factory(Category::class)->create(),
            factory(Category::class)->create(),
            factory(Category::class)->create(),
        ]);

        $this->assertCount(3, $parent->children);
    }

    public function a_category_has_only_one_parent()
    {
        $child = factory(Category::class)->create();
        $parent = factory(Category::class)->create();

        $parent->children()->save($child);

        $this->assertCount(1, $child->parent()->count());
    }
}
