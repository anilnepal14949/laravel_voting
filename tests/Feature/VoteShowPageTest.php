<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeaShow;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class VoteShowPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_page_contains_idea_show_livewire_component()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create([
            'name' => 'Category 1'
        ]);

        $status = Status::factory()->create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'title' => 'My first idea',
            'description' => 'Description of my first idea'
        ]);

        $this->get(route('idea.show', $idea))
            ->assertSeeLivewire('idea-show');
    }

    public function test_show_page_correctly_receives_votes_count()
    {
        $user = User::factory()->create();

        $user2 = User::factory()->create();

        $category = Category::factory()->create([
            'name' => 'Category 1'
        ]);

        $status = Status::factory()->create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'title' => 'My first idea',
            'description' => 'Description of my first idea'
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user2->id
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);

        $this->get(route('idea.show', $idea))
            ->assertViewHas('votesCount', 2);
    }

    public function test_votes_count_shows_correctly_on_show_livewire_component()
    {
        $user = User::factory()->create();

        $user2 = User::factory()->create();

        $category = Category::factory()->create([
            'name' => 'Category 1'
        ]);

        $status = Status::factory()->create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'title' => 'My first idea',
            'description' => 'Description of my first idea'
        ]);

        Livewire::test(IdeaShow::class, [
            'idea' => $idea,
            'votesCount' => 5
        ])
        ->assertSet('votesCount', 5);
    }

    public function test_show_voted_for_logged_in_users()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create([
            'name' => 'Category 1'
        ]);

        $status = Status::factory()->create([
            'name' => 'Open',
            'classes' => 'bg-gray-200'
        ]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
            'title' => 'My first idea',
            'description' => 'Description of my first idea'
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id
        ]);

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $idea,
                'votesCount' => 5
            ])
            ->assertSet('hasVoted', true)
            ->assertSee('Voted');
    }
}
