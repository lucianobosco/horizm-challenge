<?php

use Illuminate\Support\Str;

if (! function_exists('getPostRating')) {
    /***************************
     * Get Post model rating as per words count
     */
    function getPostRating($post)
    {
        $title_rating = Str::length($post['title']) ? Str::wordCount(str_replace("\n", "", $post['title'])) * 2 : 0; // Calculate title rating (2 points per word)
        $body_rating = Str::length($post['body']) ? Str::wordCount(str_replace("\n", "", $post['body'])) : 0; // Calculate body rating (1 point per word)

        return $title_rating + $body_rating; // Return sum
    }
}