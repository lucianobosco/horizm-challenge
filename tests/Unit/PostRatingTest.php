<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PostRatingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_post_rating()
    {
        $post = [
            "userId" => 9,
            "id" => 89,
            "title" => "sint soluta et vel magnam aut ut sed qui",
            "body" => "repellat aut aperiam totam temporibus autem et\narchitecto magnam ut\nconsequatur qui cupiditate rerum quia soluta dignissimos nihil iure\ntempore quas est"
        ];

        $this->assertSame(37, getPostRating($post));
    }
}
