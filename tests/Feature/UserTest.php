<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_migrate_posts()
    {
        $this->post('/api/users/migrate')
            ->assertOk()
            ->assertJson(fn (AssertableJson $json) =>
                $json->whereAllType([
                    'data.0.id' => 'integer',
                    'data.0.name' => 'string',
                    'data.0.email' => 'string',
                    'data.0.city' => 'string',
                    'message' => 'string'
                ])
            );
    }

    /**
     * Test fetch post by id.
     *
     * @return void
     */
    public function test_get_users()
    {
        $this->getJson("/api/users")
            ->assertOk()
            ->assertJson(fn (AssertableJson $json) =>
                $json->whereAllType([
                    '0.id' => 'integer',
                    '0.name' => 'string',
                    '0.email' => 'string',
                    '0.city' => 'string',

                    '0.posts' => 'array',
                    '0.posts.0.id' => 'integer',
                    '0.posts.0.title' => 'string',
                    '0.posts.0.body' => 'string',
                    '0.posts.0.user_id' => 'integer',
                ])
            );
    }
}
