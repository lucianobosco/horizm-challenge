<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Migrate posts from external API.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function migrate()
    {
        // Fetch data from external API
        $response = Http::get('https://jsonplaceholder.typicode.com/posts')->throw();

        $posts = $response
            ->collect() // Convert response to collection
            ->take(50) // Take first 50 elements
            ->transform(function($post){
                // Transform object to be inserted/updated
                return [
                    'id' => $post['id'],
                    'user_id' => $post['userId'],
                    'title' => $post['title'],
                    'body' => $post['body'],
                    'rating' => getPostRating($post)
                ];
            });

        // Insert Post if missing in DB, otherwise just update the Post's body. Match by post.id
        $count = Post::upsert($posts->toArray(), ['id'], ['body']);

        // This response may be unnecesary and could be removed
        return [
            'message' => "$count posts sucessfully migrated",
            'data' => PostResource::collection(Post::whereIn('id', $posts->pluck('id'))->get())
        ];
    }
}
