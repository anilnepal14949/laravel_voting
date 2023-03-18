<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateIdea;
use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_idea_form_displays_correctly_when_logged_out() {
        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee('Please login to create an idea');
        $response->assertDontSee('Let us know what you would like and we\'ll take a look over!', false);
    }

    public function test_create_idea_form_displays_correctly_when_logged_in() {
        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee('Let us know what you would like and we\'ll take a look over!', false);
        $response->assertDontSee('Please login to create an idea');
    }

    public function test_main_page_contains_create_idea_livewire_component_when_logged_in() {
        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSeeLivewire('create-idea');
    }

    public function test_create_idea_form_validation_works() {
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('The title field is required');
    }

    public function test_create_idea_works_when_user_is_logged_in() {
        $user = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'My first idea')
            ->set('category', $category->id)
            ->set('description', 'This is my first idea')
            ->call('createIdea')
            ->assertRedirect('/');

        $response = $this->actingAs($user)->get(route('idea.index'));
        $response->assertSuccessful();

        $response->assertSee('My first idea');
        $response->assertSee('This is my first idea');

        $this->assertDatabaseHas('ideas', [
            'title' => 'My first idea',
            'category_id' => 1,
            'description' => 'This is my first idea',
        ]);
    }

    public function test_create_two_ideas_with_same_title_still_works_but_has_different_slugs() {
        $user = User::factory()->create();

        $category = Category::factory()->create(['name' => 'Category 1']);

        $status = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'My first idea')
            ->set('category', $category->id)
            ->set('description', 'This is my first idea')
            ->call('createIdea')
            ->assertRedirect('/');

        $this->assertDatabaseHas('ideas', [
            'title' => 'My first idea',
            'slug' => 'my-first-idea',
        ]);


        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'My first idea')
            ->set('category', $category->id)
            ->set('description', 'This is my first idea')
            ->call('createIdea')
            ->assertRedirect('/');

        $this->assertDatabaseHas('ideas', [
            'title' => 'My first idea',
            'slug' => 'my-first-idea-2',
        ]);
    }
}
