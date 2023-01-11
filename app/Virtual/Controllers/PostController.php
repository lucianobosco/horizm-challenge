<?php

class PostController
{
    /**
    * @OA\Post(
    *       path="/api/posts/migrate",
     *      tags={"Post"},
     *      summary="Posts migration",
     *      description="Migrate all Posts from external API",
     *      @OA\Response(
     *          response=200,
     *          description="Posts migration succeed",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="success")
     *          )
     *      ),
     *      @OA\Response(response=404, description="Resource not found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Resource not found"))),
     *      @OA\Response(response=500, description="Internal server error", @OA\JsonContent(@OA\Property(property="message", type="string", example="Server error.")))
     * )
     *
    */

    /**
    * @OA\Get(
    *       path="/api/posts/top",
     *      tags={"Post"},
     *      summary="Fetch Posts",
     *      description="Fetch top rated post for each user",
     *      @OA\Response(
     *          response=200,
     *          description="Posts fetch succeed"
     *      ),
     *      @OA\Response(response=404, description="Resource not found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Resource not found"))),
     *      @OA\Response(response=500, description="Internal server error", @OA\JsonContent(@OA\Property(property="message", type="string", example="Server error.")))
     * )
     *
    */

    /**
    * @OA\Get(
    *       path="/api/posts/{id}",
     *      tags={"Post"},
     *      summary="Fetch Posts",
     *      description="Fetch specific post",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Post ID.",
     *          @OA\Schema(
     *              type="integer",
     *              example="1"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Posts fetch succeed"
     *      ),
     *      @OA\Response(response=404, description="Resource not found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Resource not found"))),
     *      @OA\Response(response=500, description="Internal server error", @OA\JsonContent(@OA\Property(property="message", type="string", example="Server error.")))
     * )
     *
    */
}