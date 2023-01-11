<?php

class UserController
{
    /**
    * @OA\Get(
    *       path="/api/users",
     *      tags={"User"},
     *      summary="Fetch Users",
     *      description="Fetch users and its posts. Ordered by posts rating",
     *      @OA\Response(
     *          response=200,
     *          description="Users fetch succeed"
     *      ),
     *      @OA\Response(response=404, description="Resource not found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Resource not found"))),
     *      @OA\Response(response=500, description="Internal server error", @OA\JsonContent(@OA\Property(property="message", type="string", example="Server error.")))
     * )
     *
    */

    /**
    * @OA\Post(
    *       path="/api/users/migrate",
     *      tags={"User"},
     *      summary="Users migration",
     *      description="Migrate all Users from external API",
     *      @OA\Response(
     *          response=200,
     *          description="Users migration succeed",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="success")
     *          )
     *      ),
     *      @OA\Response(response=404, description="Resource not found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Resource not found"))),
     *      @OA\Response(response=500, description="Internal server error", @OA\JsonContent(@OA\Property(property="message", type="string", example="Server error.")))
     * )
     *
    */
}