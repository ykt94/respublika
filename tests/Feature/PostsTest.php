<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function a_user_can_browse_posts()
    {
        $user = User::factory()
        ->has(Post::factory()->count(3))
        ->create();

        //$post = Post::factory()->create();

        $response = $this->get('/posts');

        $response->assertStatus(200);
    }
}
