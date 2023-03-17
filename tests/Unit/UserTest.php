<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_generate_gravatar_when_no_email_found() {
        $email = 'anilnepal14949@gmail.com';
        $user = User::factory()->create([
            'email' => $email,
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals('https://www.gravatar.com/avatar/'.md5($email).'?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png', $gravatarUrl);
    }
}
