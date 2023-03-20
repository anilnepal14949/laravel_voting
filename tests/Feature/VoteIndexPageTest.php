<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeaIndex;
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

class VoteIndexPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_page_contains_idea_index_livewire_component()
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

        $this->get(route('idea.index'))
            ->assertSeeLivewire('idea-index');
    }

    public function test_index_page_correctly_receives_votes_count()
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

        $this->get(route('idea.index'))
            ->assertViewHas('ideas', function($ideas) {
                return $ideas->first()->votes_count == 2;
            });
    }

    public function test_votes_count_shows_correctly_on_index_livewire_component()
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

        Livewire::test(IdeaIndex::class, [
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

        $response = $this->actingAs($user)->get('/');

        $ideaWithVotes = $response['ideas']->items()[0];

        Livewire::actingAs($user)
            ->test(IdeaShow::class, [
                'idea' => $ideaWithVotes,
                'votesCount' => 5
            ])
            ->assertSet('hasVoted', true)
            ->assertSee('Voted');
    }
}
