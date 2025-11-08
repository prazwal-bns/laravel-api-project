<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()) {
            $posts = Auth::user()->posts()->paginate();
            return PostResource::collection($posts);
        }

        return response()->json([
            'message' => 'Unauthorized. Please login to view your posts.'
        ], 401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $data['author_id'] = Auth::id(); 

        $post = Post::create($data);

        return response()->json([
            'message' => 'Post created successfully',
            'data' => $post
        ])
        ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {   
        abort_if(Auth::id() !== $post->author_id, 403, 'Access Forbidden.');

        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {   
        $data = $request->validated();

        abort_if(Auth::id() !== $post->author_id, 403, 'Access Forbidden.');

        $post->update($data);

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        abort_if(Auth::id() !== $post->author_id, 403, 'Access Forbidden.');
        $post->delete();

         return response()->noContent();
    }
}
