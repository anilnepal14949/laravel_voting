<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IdeaTest extends TestCase
{
    use RefreshDatabase;
    /**
     *
     * @test
     */
    public function check_if_idea_is_voted_by_user()
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
            'user_id' => $user->id,
            'idea_id' => $idea->id
        ]);

        $this->assertTrue($idea->isVotedByUser($user));
        $this->assertFalse($idea->isVotedByUser($user2));
        $this->assertFalse($idea->isVotedByUser(null));
    }
}
