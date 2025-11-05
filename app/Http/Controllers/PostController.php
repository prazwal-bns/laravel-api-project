<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            [
                'id' => 1,
                'title' => 'First Post',
                'body' => 'This is the body of the first post.'
            ],
            [
                'id' => 2,
                'title' => 'Second Post',
                'body' => 'This is the body of the second post.'
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:2',
            'body' => ['required','string','min:5']
        ]);

        $data['author_id'] = 1; 

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
    public function show(string $id)
    {
        return response()->json([
            'message' => 'Post retrieved successfully',
            'data' => [
                'id' => $id,
                'title' => 'Sample Post',
                'body' => 'This is a sample post body.'
            ]
        ])
        ->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|min:2',
            'body' => ['required','string','min:5']
        ]);

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->nobody();
    }
}
