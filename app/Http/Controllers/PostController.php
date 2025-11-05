<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'list of posts';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // get all request data
        // $data = $request->all();

        // get specific fields
        // $data = $request->only('title');
        // return $data;

        // set status code and return JSON response
        return response()->json([
            'message' => 'Post created successfully',
            'data' => [
                'title' => $request->input('title'),
                'content' => $request->input('content')
            ]
        ], 201);
        // ->setStatusCode(201);
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
                'content' => 'This is a sample post content.'
            ]
        ])
        ->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
