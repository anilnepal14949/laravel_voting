<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_of_ideas_shows_on_main_page() {
        $categoryOne = Category::factory()->create([
            'name'=>'Category 1',
        ]);

        $categoryTwo = Category::factory()->create([
            'name'=>'Category 2',
        ]);

        $ideaOne = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title'=>'My first idea',
            'description'=>'This is my first idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'category_id' => $categoryTwo->id,
            'title'=>'My second idea',
            'description'=>'This is my second idea',
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
        $response->assertSee($categoryOne->name);
        $response->assertSee($ideaOne->description);

        $response->assertSee($ideaTwo->title);
        $response->assertSee($categoryTwo->name);
        $response->assertSee($ideaTwo->description);
    }

    public function test_single_idea_shows_correctly_on_show_page() {
        $category = Category::factory()->create([
            'name'=>'Category 1',
        ]);

        $idea = Idea::factory()->create([
            'title'=>'My first idea',
            'category_id' => $category->id,
            'description'=>'This is my first idea',
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();

        $response->assertSee($idea->title);
        $response->assertSee($category->name);
        $response->assertSee($idea->description);
    }

    public function test_ideas_are_paginated() {
        $category = Category::factory()->create([
            'name'=>'Category 1',
        ]);

        Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
            'category_id' => $category->id,
        ]);

        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My First Idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My Eleventh Idea';
        $ideaEleven->save();

        $response = $this->get('/');

        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);

        $response = $this->get('/?page=2');
        $response->assertSee($ideaEleven->title);
        $response->assertDontSee($ideaOne->title);
    }

    public function test_same_title_different_slugs() {
        $category = Category::factory()->create([
            'name'=>'Category 1',
        ]);

        $ideaOne = Idea::factory()->create([
            'title'=>'My first idea',
            'category_id' => $category->id,
            'description'=>'This is my first idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title'=>'My first idea',
            'category_id' => $category->id,
            'description'=>'This is my second idea',
        ]);

        $response = $this->get(route('idea.show', $ideaOne));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea');

        $response = $this->get(route('idea.show', $ideaTwo));
        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea-2');
    }
}
