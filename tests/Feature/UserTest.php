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
}
