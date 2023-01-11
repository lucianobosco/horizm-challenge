<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic test example.
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
}
