<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
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
        // Fetch users data from external API
        $response = Http::get('https://jsonplaceholder.typicode.com/users')->throw();
        $api_users = $response->collect();

        // Fetch posts from DB
        $posts = Post::take(50)->get();

        // Loop over each post
        $posts->each(function($post) use ($api_users){
            // Get user data from external API
            $api_user = $api_users->where('id',$post->user_id)->first();

            // If DB user is missing, then insert
            User::firstOrCreate(
                ['id' => $post->user_id],
                [
                    'name' => $api_user['name'],
                    'email' => $api_user['email'],
                    'city' => $api_user['address']['city']
                ]
            );
        });

        // This response may be unnecesary and could be removed
        return [
            'message' => "Users sucessfully migrated",
            'data' => UserResource::collection(User::whereIn('id', $posts->pluck('user_id'))->get())
        ];
    }
}
