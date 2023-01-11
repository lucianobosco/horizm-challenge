<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * Test post migration.
     *
     * @return void
     */
    public function test_migrate_posts()
    {
        $this->post('/api/posts/migrate')
            ->assertOk()
            ->assertJson(fn (AssertableJson $json) =>
                $json->whereAllType([
                    'data.0.id' => 'integer',
                    'data.0.title' => 'string',
                    'data.0.body' => 'string',
                    'data.0.rating' => 'integer',
                    'message' => 'string'
                ])
            )
            ->assertJsonCount(50, 'data');
    }

    /**
     * Test fetch post by id.
     *
     * @return void
     */
    public function test_get_post()
    {
        $post = Post::with('user')->latest()->first();

        $this->getJson("/api/posts/$post->id")
            ->assertOk()
            ->assertJson(fn (AssertableJson $json) =>
                $json->whereAllType([
                    'id' => 'integer',
                    'title' => 'string',
                    'body' => 'string',
                    'user' => 'string'
                ])
            )
            ->assertExactJson([
                'id' => $post->id,
                'title' => $post->title,
                'body' => $post->body,
                'user' => $post->user->name,
            ]);
    }
}
